<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $nama_paket = htmlspecialchars($_POST['nama_paket']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga = htmlspecialchars($_POST['harga']);
    $durasi = htmlspecialchars($_POST['durasi']);
    $pesawat = htmlspecialchars($_POST['pesawat']);
    $hotel_makkah = htmlspecialchars($_POST['hotel_makkah']);
    $hotel_madinah = htmlspecialchars($_POST['hotel_madinah']);
    $keberangkatan = htmlspecialchars($_POST['keberangkatan']);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    // Upload gambar
    $gambar = upload('uploads/paket/');
    if (!$gambar) {
        $gambar = 'https://via.placeholder.com/400x300'; // Default if failed
    }

    $query = "INSERT INTO paket_umroh VALUES (NULL, '$nama_paket', '$deskripsi', '$harga', '$durasi', '$pesawat', '$hotel_makkah', '$hotel_madinah', '$keberangkatan', '$gambar', '$is_featured', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'paket_umroh.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
        </script>";
    }
}
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Paket Umroh</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Paket</label>
                        <input type="text" name="nama_paket" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Durasi (Contoh: 9 Hari)</label>
                        <input type="text" name="durasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Keberangkatan</label>
                        <input type="date" name="keberangkatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Maskapai Pesawat</label>
                        <input type="text" name="pesawat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Makkah</label>
                        <input type="text" name="hotel_makkah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Madinah</label>
                        <input type="text" name="hotel_madinah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Paket</label>
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <div class="mb-4 mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald">
                        <span class="ml-2 text-gray-700">Tampilkan di Beranda (Featured)</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
</body>
</html>
