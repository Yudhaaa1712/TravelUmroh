<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $nama_paket = htmlspecialchars($_POST['nama_paket']);
    $tipe_haji = htmlspecialchars($_POST['tipe_haji']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga_usd = htmlspecialchars($_POST['harga_usd']);
    $estimasi = htmlspecialchars($_POST['estimasi']);
    $pesawat = htmlspecialchars($_POST['pesawat']);
    $hotel_makkah = htmlspecialchars($_POST['hotel_makkah']);
    $hotel_madinah = htmlspecialchars($_POST['hotel_madinah']);

    // Upload gambar
    $gambar = upload('uploads/haji/');
    if (!$gambar) {
        $gambar = 'https://via.placeholder.com/400x300';
    }

    $query = "INSERT INTO paket_haji VALUES (NULL, '$nama_paket', '$tipe_haji', '$deskripsi', '$harga_usd', '$estimasi', '$hotel_makkah', '$hotel_madinah', '$pesawat', '$gambar', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'paket_haji.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Paket Haji</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Paket</label>
                        <input type="text" name="nama_paket" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tipe Haji</label>
                        <select name="tipe_haji" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Plus">Haji Plus (Kuota)</option>
                            <option value="Furoda">Haji Furoda (Mujamalah)</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (USD)</label>
                        <input type="number" name="harga_usd" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Estimasi Keberangkatan</label>
                        <input type="text" name="estimasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: 5-7 Tahun / Langsung Berangkat" required>
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
