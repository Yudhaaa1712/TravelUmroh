<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $kategori = htmlspecialchars($_POST['kategori']);

    // Upload gambar
    $gambar = upload('uploads/galeri/');
    if (!$gambar) {
        $gambar = 'https://via.placeholder.com/400x300';
    }

    $query = "INSERT INTO galeri VALUES (NULL, '$judul', '$kategori', '$gambar', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'galeri.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Foto Galeri</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Judul Foto</label>
                        <input type="text" name="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                        <select name="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Makkah">Makkah</option>
                            <option value="Madinah">Madinah</option>
                            <option value="Jamaah">Jamaah</option>
                            <option value="Hotel">Fasilitas Hotel</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">File Foto</label>
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Upload Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
