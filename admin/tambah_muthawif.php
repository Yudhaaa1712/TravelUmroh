<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $peran = htmlspecialchars($_POST['peran']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $instagram = htmlspecialchars($_POST['instagram']);
    $facebook = htmlspecialchars($_POST['facebook']);

    // Upload gambar
    $gambar = upload('uploads/muthawif/');
    if (!$gambar) {
        $gambar = 'https://via.placeholder.com/150';
    }

    $query = "INSERT INTO muthawif VALUES (NULL, '$nama', '$peran', '$deskripsi', '$gambar', '$instagram', '$facebook', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'muthawif.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Muthawif</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Peran (Contoh: Pembimbing Ibadah)</label>
                        <input type="text" name="peran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Link Instagram (Opsional)</label>
                        <input type="text" name="instagram" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Link Facebook (Opsional)</label>
                        <input type="text" name="facebook" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <div class="mb-4 mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
