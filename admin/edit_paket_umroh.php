<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$id = $_GET['id'];
$paket = query("SELECT * FROM paket_umroh WHERE id = $id")[0];

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
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload('uploads/paket/');
    }

    $query = "UPDATE paket_umroh SET
                nama_paket = '$nama_paket',
                deskripsi = '$deskripsi',
                harga = '$harga',
                durasi = '$durasi',
                pesawat = '$pesawat',
                hotel_makkah = '$hotel_makkah',
                hotel_madinah = '$hotel_madinah',
                keberangkatan = '$keberangkatan',
                gambar = '$gambar',
                is_featured = '$is_featured'
              WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'paket_umroh.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
        </script>";
    }
}
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Edit Paket Umroh</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $paket['gambar']; ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Paket</label>
                        <input type="text" name="nama_paket" value="<?= $paket['nama_paket']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (IDR)</label>
                        <input type="number" name="harga" value="<?= $paket['harga']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Durasi</label>
                        <input type="text" name="durasi" value="<?= $paket['durasi']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: 9 Hari">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Keberangkatan</label>
                        <input type="date" name="keberangkatan" value="<?= $paket['keberangkatan']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pesawat</label>
                        <input type="text" name="pesawat" value="<?= $paket['pesawat']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Makkah</label>
                        <input type="text" name="hotel_makkah" value="<?= $paket['hotel_makkah']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Madinah</label>
                        <input type="text" name="hotel_madinah" value="<?= $paket['hotel_madinah']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Paket</label>
                        <img src="../<?= $paket['gambar']; ?>" width="100" class="mb-2">
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= $paket['deskripsi']; ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald" <?= $paket['is_featured'] ? 'checked' : ''; ?>>
                        <span class="ml-2 text-gray-700">Jadikan Featured (Tampil di Beranda)</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Update Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
