<?php 
require_once '../koneksi.php';

// Proses form jika submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_jamaah = mysqli_real_escape_string($koneksi, $_POST['nama_jamaah']);
    $paket_diambil = mysqli_real_escape_string($koneksi, $_POST['paket_diambil']);
    $rating = mysqli_real_escape_string($koneksi, $_POST['rating']);
    $isi_testimoni = mysqli_real_escape_string($koneksi, $_POST['isi_testimoni']);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    
    // Handle gambar
    $gambar = '';
    if (!empty($_POST['gambar_url'])) {
        $gambar = $_POST['gambar_url'];
    } elseif (!empty($_FILES['gambar']['name'])) {
        $gambar = upload($_FILES['gambar'], 'testimoni');
    }
    
    $query = "INSERT INTO testimoni (nama_jamaah, paket_diambil, isi_testimoni, rating, gambar, is_featured, created_at) 
              VALUES ('$nama_jamaah', '$paket_diambil', '$isi_testimoni', '$rating', '$gambar', '$is_featured', NOW())";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: testimoni.php?success=1');
        exit;
    } else {
        $error = 'Gagal menambahkan testimoni: ' . mysqli_error($koneksi);
    }
}

include 'includes/header.php'; 
include 'includes/sidebar.php'; 
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Tambah Testimoni</h3>
            <a href="testimoni.php" class="text-gray-600 hover:text-gray-900">
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
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Jamaah *</label>
                        <input type="text" name="nama_jamaah" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Paket yang Diambil</label>
                        <input type="text" name="paket_diambil" placeholder="contoh: Umrah Reguler 9 Hari" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Rating (1-5) *</label>
                        <select name="rating" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                            <option value="4">⭐⭐⭐⭐ (4)</option>
                            <option value="3">⭐⭐⭐ (3)</option>
                            <option value="2">⭐⭐ (2)</option>
                            <option value="1">⭐ (1)</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Jamaah (Upload)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Atau URL Gambar</label>
                        <input type="url" name="gambar_url" placeholder="https://example.com/foto.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Isi Testimoni *</label>
                        <textarea name="isi_testimoni" rows="5" required placeholder="Ceritakan pengalaman jamaah saat umrah..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald"></textarea>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald">
                            <span class="ml-2 text-gray-700">Tampilkan di Homepage (Featured)</span>
                        </label>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="bg-emerald text-white px-6 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
</body>
</html>
