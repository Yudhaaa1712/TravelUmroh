<?php 
require_once '../config/koneksi.php';

// Proses form jika submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $peran = mysqli_real_escape_string($koneksi, $_POST['peran']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $instagram = mysqli_real_escape_string($koneksi, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($koneksi, $_POST['facebook']);
    
    // Handle gambar
    $gambar = '';
    if (!empty($_POST['gambar_url'])) {
        $gambar = $_POST['gambar_url'];
    } elseif (!empty($_FILES['gambar']['name'])) {
        $gambar = upload($_FILES['gambar'], 'muthawif');
    }
    
    $query = "INSERT INTO muthawif (nama, peran, deskripsi, gambar, instagram, facebook, created_at) 
              VALUES ('$nama', '$peran', '$deskripsi', '$gambar', '$instagram', '$facebook', NOW())";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: muthawif.php?success=1');
        exit;
    } else {
        $error = 'Gagal menambahkan muthawif: ' . mysqli_error($koneksi);
    }
}

include 'includes/header.php'; 
include 'includes/sidebar.php'; 
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Tambah Muthawif / Tour Leader</h3>
            <a href="muthawif.php" class="text-gray-600 hover:text-gray-900">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $error; ?>
        </div>
        <?php endif; ?>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap *</label>
                        <input type="text" name="nama" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Peran / Jabatan *</label>
                        <input type="text" name="peran" placeholder="contoh: Ketua Muthawif" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto (Upload File)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Atau URL Gambar</label>
                        <input type="url" name="gambar_url" placeholder="https://example.com/foto.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi / Bio</label>
                        <textarea name="deskripsi" rows="4" placeholder="Biografi singkat muthawif..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Instagram</label>
                        <input type="text" name="instagram" placeholder="@username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Facebook</label>
                        <input type="text" name="facebook" placeholder="username atau URL" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="bg-emerald text-white px-6 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Muthawif
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
</body>
</html>
