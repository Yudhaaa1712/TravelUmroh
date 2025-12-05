<?php 
require_once '../koneksi.php';

// Proses form jika submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_paket = mysqli_real_escape_string($koneksi, $_POST['nama_paket']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $durasi = mysqli_real_escape_string($koneksi, $_POST['durasi']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $keberangkatan = mysqli_real_escape_string($koneksi, $_POST['keberangkatan']);
    $pesawat = mysqli_real_escape_string($koneksi, $_POST['pesawat']);
    $hotel_makkah = mysqli_real_escape_string($koneksi, $_POST['hotel_makkah']);
    $hotel_madinah = mysqli_real_escape_string($koneksi, $_POST['hotel_madinah']);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    
    // Handle gambar
    $gambar = '';
    if (!empty($_POST['gambar_url'])) {
        $gambar = $_POST['gambar_url'];
    } elseif (!empty($_FILES['gambar']['name'])) {
        $gambar = upload($_FILES['gambar'], 'paket');
    }
    
    $query = "INSERT INTO paket_umroh (nama_paket, deskripsi, durasi, harga, keberangkatan, pesawat, hotel_makkah, hotel_madinah, gambar, is_featured, created_at) 
              VALUES ('$nama_paket', '$deskripsi', '$durasi', '$harga', '$keberangkatan', '$pesawat', '$hotel_makkah', '$hotel_madinah', '$gambar', '$is_featured', NOW())";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: paket_umroh.php?success=1');
        exit;
    } else {
        $error = 'Gagal menambahkan paket: ' . mysqli_error($koneksi);
    }
}

include 'includes/header.php'; 
include 'includes/sidebar.php'; 
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Tambah Paket Umroh</h3>
            <a href="paket_umroh.php" class="text-gray-600 hover:text-gray-900">
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
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Paket *</label>
                        <input type="text" name="nama_paket" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Durasi *</label>
                        <input type="text" name="durasi" placeholder="contoh: 9 Hari 8 Malam" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp) *</label>
                        <input type="number" name="harga" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Keberangkatan *</label>
                        <input type="date" name="keberangkatan" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pesawat</label>
                        <input type="text" name="pesawat" placeholder="contoh: Garuda Indonesia" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Makkah</label>
                        <input type="text" name="hotel_makkah" placeholder="contoh: Hilton Suites Makkah" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Madinah</label>
                        <input type="text" name="hotel_madinah" placeholder="contoh: Pullman Zamzam Madinah" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar (Upload File)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Atau URL Gambar</label>
                        <input type="url" name="gambar_url" placeholder="https://example.com/gambar.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" placeholder="Deskripsi paket umrah..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald"></textarea>
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
                        <i class="fa-solid fa-save mr-2"></i> Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
</body>
</html>
