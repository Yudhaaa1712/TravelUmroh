<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Artikel Baru</h3>

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                        Judul Artikel
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="judul" name="judul" type="text" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="konten">
                        Konten Artikel
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-64" id="konten" name="konten" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gambar">
                        Gambar Utama
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="gambar" name="gambar" type="file" required>
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WebP. Max 2MB.</p>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90" type="submit" name="submit">
                        Simpan Artikel
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
    $judul = htmlspecialchars($_POST['judul']);
    $konten = $_POST['konten']; // Allow HTML for content if needed, or sanitize if using WYSIWYG
    
    // Create Slug
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Upload Image
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO artikel (judul, slug, konten, gambar) VALUES ('$judul', '$slug', '$konten', '$gambar')";
    
    if(mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Artikel berhasil ditambahkan!');
                document.location.href = 'blog.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan artikel!');
              </script>";
    }
}
?>

</div>
</body>
</html>
