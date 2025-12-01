<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$id = $_GET['id'];
$data = query("SELECT * FROM artikel WHERE id = $id")[0];
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Edit Artikel</h3>

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $data['gambar']; ?>">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                        Judul Artikel
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="judul" name="judul" type="text" value="<?= $data['judul']; ?>" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="konten">
                        Konten Artikel
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-64" id="konten" name="konten" required><?= $data['konten']; ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gambar">
                        Gambar Utama
                    </label>
                    <div class="mb-2">
                        <img src="../<?= $data['gambar']; ?>" width="100" class="rounded">
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="gambar" name="gambar" type="file">
                    <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90" type="submit" name="submit">
                        Update Artikel
                    </button>
                    <a href="blog.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul = htmlspecialchars($_POST['judul']);
    $konten = $_POST['konten'];
    $gambarLama = $_POST['gambarLama'];
    
    // Create Slug
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Check if new image uploaded
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE artikel SET 
                judul = '$judul',
                slug = '$slug',
                konten = '$konten',
                gambar = '$gambar'
              WHERE id = $id";
    
    if(mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Artikel berhasil diupdate!');
                document.location.href = 'blog.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengupdate artikel!');
              </script>";
    }
}
?>

</div>
</body>
</html>
