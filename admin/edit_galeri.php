<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: galeri.php');
    exit;
}
$result = query("SELECT * FROM galeri WHERE id = " . (int)$id);
if (empty($result)) {
    header('Location: galeri.php');
    exit;
}
$galeri = $result[0];

if (isset($_POST['submit'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload('uploads/galeri/');
    }

    $update_id = (int)$galeri['id'];
    $query = "UPDATE galeri SET
                judul = '$judul',
                kategori = '$kategori',
                gambar = '$gambar'
              WHERE id = $update_id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'galeri.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Edit Foto Galeri</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $galeri['gambar']; ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Judul Foto</label>
                        <input type="text" name="judul" value="<?= $galeri['judul']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                        <select name="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Makkah" <?= ($galeri['kategori'] == 'Makkah') ? 'selected' : ''; ?>>Makkah</option>
                            <option value="Madinah" <?= ($galeri['kategori'] == 'Madinah') ? 'selected' : ''; ?>>Madinah</option>
                            <option value="Jamaah" <?= ($galeri['kategori'] == 'Jamaah') ? 'selected' : ''; ?>>Jamaah</option>
                            <option value="Hotel" <?= ($galeri['kategori'] == 'Hotel') ? 'selected' : ''; ?>>Fasilitas Hotel</option>
                            <option value="Lainnya" <?= ($galeri['kategori'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">File Foto</label>
                        <img src="../<?= $galeri['gambar']; ?>" width="100" class="mb-2">
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Update Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
