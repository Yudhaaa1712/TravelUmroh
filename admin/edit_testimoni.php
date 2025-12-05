<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: testimoni.php');
    exit;
}
$result = query("SELECT * FROM testimoni WHERE id = " . (int)$id);
if (empty($result)) {
    header('Location: testimoni.php');
    exit;
}
$testimoni = $result[0];

if (isset($_POST['submit'])) {
    $nama_jamaah = htmlspecialchars($_POST['nama_jamaah']);
    $paket_diambil = htmlspecialchars($_POST['paket_diambil']);
    $isi_testimoni = htmlspecialchars($_POST['isi_testimoni']);
    $rating = htmlspecialchars($_POST['rating']);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload('uploads/testimoni/');
    }

    $update_id = (int)$testimoni['id'];
    $query = "UPDATE testimoni SET
                nama_jamaah = '$nama_jamaah',
                paket_diambil = '$paket_diambil',
                isi_testimoni = '$isi_testimoni',
                rating = '$rating',
                gambar = '$gambar',
                is_featured = '$is_featured'
              WHERE id = $update_id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'testimoni.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Edit Testimoni</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $testimoni['gambar']; ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Jamaah</label>
                        <input type="text" name="nama_jamaah" value="<?= $testimoni['nama_jamaah']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Paket yang Diambil</label>
                        <input type="text" name="paket_diambil" value="<?= $testimoni['paket_diambil']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Umroh Reguler 2024">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Rating (1-5)</label>
                        <input type="number" name="rating" min="1" max="5" value="<?= $testimoni['rating']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Jamaah</label>
                        <img src="../<?= $testimoni['gambar']; ?>" width="100" class="mb-2">
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Isi Testimoni</label>
                    <textarea name="isi_testimoni" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?= $testimoni['isi_testimoni']; ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald" <?= $testimoni['is_featured'] ? 'checked' : ''; ?>>
                        <span class="ml-2 text-gray-700">Jadikan Featured (Tampil di Beranda)</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Update Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
