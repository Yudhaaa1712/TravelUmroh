<?php
// Handle ini HARUS di atas sebelum output apapun
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require '../koneksi.php';

// Cek apakah tabel sudah ada, jika belum buat
$check_table = mysqli_query($koneksi, "SHOW TABLES LIKE 'pengaturan_gambar'");
if(mysqli_num_rows($check_table) == 0) {
    // Buat tabel
    $create_table = "CREATE TABLE IF NOT EXISTS pengaturan_gambar (
        id INT PRIMARY KEY AUTO_INCREMENT,
        kode VARCHAR(50) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        deskripsi TEXT,
        gambar VARCHAR(500) NOT NULL,
        kategori VARCHAR(50) DEFAULT 'umum',
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    mysqli_query($koneksi, $create_table);
}

// Insert/Update default data - selalu jalankan untuk memastikan semua ada
$defaults = [
    // Beranda
    ['hero_bg', 'Background Hero Beranda', 'Gambar/Video latar belakang utama di halaman beranda', 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070', 'beranda'],
    ['why_choose_us', 'Gambar Kenapa Memilih Kami', 'Gambar di section Kenapa Memilih Kami', 'https://images.unsplash.com/photo-1537181534458-75f69493922c?q=80&w=1976', 'beranda'],
    
    // Tentang Kami
    ['about_hero', 'Background Hero Tentang Kami', 'Gambar header halaman Tentang Kami', 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070', 'tentang'],
    ['about_profile', 'Gambar Profil Perusahaan', 'Gambar di section profil perusahaan', 'https://images.unsplash.com/photo-1577046848358-4623c085f0ea?q=80&w=2070', 'tentang'],
    ['about_ceo', 'Foto CEO/Direktur', 'Foto direktur utama', 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974', 'tentang'],
    
    // Paket Umroh
    ['paket_hero', 'Background Hero Paket Umroh', 'Gambar header halaman Paket Umroh', 'https://images.unsplash.com/photo-1596386461350-326ea7750f69?q=80&w=2070', 'paket'],
    
    // Haji
    ['haji_hero', 'Background Hero Haji', 'Gambar header halaman Haji', 'https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=2070', 'haji'],
    ['haji_content', 'Gambar Konten Haji', 'Gambar di section konten Haji', 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070', 'haji'],
    
    // Galeri
    ['galeri_hero', 'Background Hero Galeri', 'Gambar header halaman Galeri', 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070', 'galeri'],
    
    // Testimoni
    ['testimoni_hero', 'Background Hero Testimoni', 'Gambar header halaman Testimoni', 'https://images.unsplash.com/photo-1565019001609-9af23d80a1b4?q=80&w=2070', 'testimoni'],
    
    // Blog
    ['blog_hero', 'Background Hero Blog', 'Gambar header halaman Blog', 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=2070', 'blog'],
    
    // Kontak
    ['kontak_hero', 'Background Hero Kontak', 'Gambar header halaman Kontak', 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=2074', 'kontak'],
];

foreach($defaults as $d) {
    mysqli_query($koneksi, "INSERT IGNORE INTO pengaturan_gambar (kode, nama, deskripsi, gambar, kategori) VALUES ('$d[0]', '$d[1]', '$d[2]', '$d[3]', '$d[4]')");
}

// Handle update SEBELUM output apapun
$alert_message = '';
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $gambar_url = trim($_POST['gambar_url'] ?? '');
    $gambar = null;
    
    // Prioritas: URL dulu, baru file upload
    if (!empty($gambar_url)) {
        $gambar = $gambar_url;
    } else if (isset($_FILES['gambar']) && !empty($_FILES['gambar']['name']) && $_FILES['gambar']['error'] == 0) {
        // Ada file yang diupload
        $gambar = upload('uploads/website/');
        if (!$gambar) {
            // Upload gagal
            header("Location: pengaturan_gambar.php?error=upload");
            exit;
        }
    }
    
    if ($gambar) {
        $gambar = mysqli_real_escape_string($koneksi, $gambar);
        mysqli_query($koneksi, "UPDATE pengaturan_gambar SET gambar = '$gambar' WHERE id = $id");
        header("Location: pengaturan_gambar.php?success=1");
        exit;
    } else {
        header("Location: pengaturan_gambar.php?error=empty");
        exit;
    }
}

// Set alert message berdasarkan parameter
if (isset($_GET['success'])) {
    $alert_message = 'success';
}
if (isset($_GET['error'])) {
    $error_type = $_GET['error'];
    if ($error_type === 'upload') {
        $alert_message = 'upload_failed';
    } else if ($error_type === 'empty') {
        $alert_message = 'no_file';
    } else {
        $alert_message = 'error';
    }
}

// Ambil semua gambar
$gambar_list = query("SELECT * FROM pengaturan_gambar ORDER BY kategori, nama");

// Group by kategori
$grouped = [];
foreach($gambar_list as $g) {
    $grouped[$g['kategori']][] = $g;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Gambar - Admin Ababil Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#C5A028',
                        emerald: '#064E3B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

<?php include 'includes/sidebar.php'; ?>

<?php if($alert_message === 'success'): ?>
<script>alert('Gambar berhasil diupdate!');</script>
<?php elseif($alert_message === 'upload_failed'): ?>
<script>alert('Upload gagal! Pastikan file gambar valid (JPG/PNG/WebP, max 2MB)');</script>
<?php elseif($alert_message === 'no_file'): ?>
<script>alert('Tidak ada file atau URL yang dipilih!');</script>
<?php elseif($alert_message === 'error'): ?>
<script>alert('Terjadi kesalahan. Silakan coba lagi.');</script>
<?php endif; ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Pengaturan Gambar Website</h3>
                <p class="text-gray-500 mt-1">Kelola gambar-gambar statis yang tampil di website</p>
            </div>
        </div>

        <!-- Info Box -->
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg">
            <div class="flex items-start">
                <i class="fa-solid fa-circle-info text-blue-500 mt-1 mr-3"></i>
                <div>
                    <p class="text-blue-700 font-medium">Cara Menggunakan</p>
                    <p class="text-blue-600 text-sm">Klik tombol "Ubah" untuk mengganti gambar/video. Anda bisa:</p>
                    <ul class="text-blue-600 text-sm mt-1 list-disc list-inside">
                        <li>Upload file gambar (JPG, PNG, WebP)</li>
                        <li>Paste URL gambar dari internet (Unsplash, dll)</li>
                        <li><strong>Hero Beranda:</strong> Bisa pakai video YouTube atau file MP4!</li>
                    </ul>
                </div>
            </div>
        </div>

        <?php if(empty($grouped)): ?>
        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6 rounded-r-lg">
            <p class="text-yellow-700">Belum ada data gambar. Silakan refresh halaman ini untuk membuat data default.</p>
        </div>
        <?php endif; ?>

        <?php foreach($grouped as $kategori => $items): ?>
        <!-- Kategori Section -->
        <div class="mb-8">
            <h4 class="text-lg font-bold text-gray-700 mb-4 flex items-center gap-2 uppercase tracking-wider">
                <?php 
                $icons = [
                    'beranda' => 'fa-home',
                    'tentang' => 'fa-building',
                    'paket' => 'fa-plane',
                    'haji' => 'fa-mosque'
                ];
                $icon = $icons[$kategori] ?? 'fa-image';
                ?>
                <i class="fa-solid <?= $icon ?> text-emerald"></i>
                Halaman <?= ucfirst($kategori) ?>
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                // Deteksi base URL
                $base_url = dirname(dirname($_SERVER['SCRIPT_NAME']));
                if ($base_url === '\\' || $base_url === '/') $base_url = '';
                
                foreach($items as $item): 
                    // Fix gambar path
                    $gambar_src = $item['gambar'];
                    // Jika path lokal (bukan URL http)
                    if (!preg_match('/^https?:\/\//', $gambar_src)) {
                        // Hapus prefix yang salah
                        $gambar_src = preg_replace('/^(\.\.\/|\.\/|admin\/|\/)/', '', $gambar_src);
                        // Tambahkan base URL + /
                        $gambar_src = $base_url . '/' . $gambar_src;
                    }
                ?>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow">
                    <!-- Image Preview -->
                    <div class="relative h-48 bg-gray-200">
                        <img src="<?= htmlspecialchars($gambar_src) ?>" alt="<?= htmlspecialchars($item['nama']) ?>" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://placehold.co/400x300/1a1a1a/gold?text=No+Image';">
                        <div class="absolute top-2 right-2">
                            <span class="bg-black/60 text-white text-xs px-2 py-1 rounded-full backdrop-blur">
                                <?= $item['kode'] ?>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Info -->
                    <div class="p-4">
                        <h5 class="font-bold text-gray-800 mb-1"><?= htmlspecialchars($item['nama']) ?></h5>
                        <p class="text-gray-500 text-sm mb-4"><?= htmlspecialchars($item['deskripsi']) ?></p>
                        
                        <button onclick="openModal(<?= $item['id'] ?>, '<?= addslashes($item['nama']) ?>', '<?= addslashes($item['gambar']) ?>')" 
                                class="w-full py-2 bg-emerald text-white rounded-lg hover:bg-emerald/90 transition-colors font-medium text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-pen-to-square"></i> Ubah Gambar
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<!-- Modal Edit Gambar -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl">
        <div class="p-6 border-b border-gray-100">
            <div class="flex justify-between items-center">
                <h4 class="text-xl font-bold text-gray-800" id="modalTitle">Ubah Gambar</h4>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>
        </div>
        
        <form action="pengaturan_gambar.php" method="post" enctype="multipart/form-data" class="p-6">
            <input type="hidden" name="id" id="modalId">
            
            <!-- Preview -->
            <div class="mb-4">
                <p class="text-sm font-medium text-gray-600 mb-2">Preview Saat Ini:</p>
                <img id="modalPreview" src="" class="w-full h-40 object-cover rounded-lg border bg-gray-100" onerror="this.onerror=null; this.src='https://placehold.co/400x200/1a1a1a/gold?text=Preview';">
            </div>
            
            <!-- Tab Switch -->
            <div class="flex gap-2 mb-4">
                <button type="button" onclick="switchModalTab('upload')" id="modal-tab-upload" class="px-4 py-2 rounded-lg bg-emerald text-white font-medium text-sm transition-colors">
                    <i class="fa-solid fa-upload mr-1"></i> Upload File
                </button>
                <button type="button" onclick="switchModalTab('url')" id="modal-tab-url" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-700 font-medium text-sm transition-colors">
                    <i class="fa-solid fa-link mr-1"></i> URL Internet
                </button>
            </div>

            <!-- Upload File -->
            <div id="modal-input-upload" class="block mb-4">
                <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-2 text-sm">
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WebP. Max 2MB</p>
            </div>

            <!-- URL Internet -->
            <div id="modal-input-url" class="hidden mb-4">
                <input type="url" name="gambar_url" id="modalUrlInput" placeholder="https://images.unsplash.com/... atau https://youtube.com/watch?v=..." class="w-full border rounded-lg p-2 text-sm">
                <p class="text-xs text-gray-500 mt-1">Paste URL gambar atau video YouTube</p>
                
                <!-- Quick Select -->
                <div class="mt-3">
                    <p class="text-xs font-bold text-gray-600 mb-2">Pilih Cepat Gambar:</p>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="setModalUrl('https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Masjidil Haram</button>
                        <button type="button" onclick="setModalUrl('https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Ka'bah</button>
                        <button type="button" onclick="setModalUrl('https://images.unsplash.com/photo-1537633552985-df8429e8048b?q=80&w=2070')" class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded hover:bg-green-200">Madinah</button>
                        <button type="button" onclick="setModalUrl('https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=2070')" class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded hover:bg-yellow-200">Haji</button>
                    </div>
                    <p class="text-xs font-bold text-gray-600 mb-2 mt-3">🎬 Pilih Video (Hero):</p>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="setModalUrl('https://www.youtube.com/watch?v=9mKQoS0sC7A')" class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded hover:bg-red-200"><i class="fa-brands fa-youtube mr-1"></i>Umroh Video 1</button>
                        <button type="button" onclick="setModalUrl('https://www.youtube.com/watch?v=Qr7dL4t8UGE')" class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded hover:bg-red-200"><i class="fa-brands fa-youtube mr-1"></i>Ka'bah Drone</button>
                    </div>
                </div>
            </div>
            
            <div class="flex gap-3">
                <button type="button" onclick="closeModal()" class="flex-1 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                    Batal
                </button>
                <button type="submit" name="update" class="flex-1 py-2 bg-emerald text-white rounded-lg hover:bg-emerald/90 transition-colors font-medium">
                    <i class="fa-solid fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id, nama, gambar) {
    document.getElementById('modalId').value = id;
    document.getElementById('modalTitle').textContent = 'Ubah: ' + nama;
    document.getElementById('modalPreview').src = gambar;
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
    document.querySelector('input[name="gambar"]').value = '';
    document.querySelector('input[name="gambar_url"]').value = '';
    switchModalTab('upload');
}

function switchModalTab(type) {
    const uploadDiv = document.getElementById('modal-input-upload');
    const urlDiv = document.getElementById('modal-input-url');
    const tabUpload = document.getElementById('modal-tab-upload');
    const tabUrl = document.getElementById('modal-tab-url');
    
    if (type === 'upload') {
        uploadDiv.classList.remove('hidden');
        urlDiv.classList.add('hidden');
        tabUpload.classList.remove('bg-gray-300', 'text-gray-700');
        tabUpload.classList.add('bg-emerald', 'text-white');
        tabUrl.classList.remove('bg-emerald', 'text-white');
        tabUrl.classList.add('bg-gray-300', 'text-gray-700');
        document.querySelector('input[name="gambar_url"]').value = '';
    } else {
        uploadDiv.classList.add('hidden');
        urlDiv.classList.remove('hidden');
        tabUrl.classList.remove('bg-gray-300', 'text-gray-700');
        tabUrl.classList.add('bg-emerald', 'text-white');
        tabUpload.classList.remove('bg-emerald', 'text-white');
        tabUpload.classList.add('bg-gray-300', 'text-gray-700');
        document.querySelector('input[name="gambar"]').value = '';
    }
}

function setModalUrl(url) {
    document.getElementById('modalUrlInput').value = url;
    document.getElementById('modalPreview').src = url;
}

document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>

</div>
</body>
</html>
