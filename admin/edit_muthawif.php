<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: muthawif.php');
    exit;
}
$result = query("SELECT * FROM muthawif WHERE id = " . (int)$id);
if (empty($result)) {
    header('Location: muthawif.php');
    exit;
}
$muthawif = $result[0];

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $peran = htmlspecialchars($_POST['peran']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $instagram = htmlspecialchars($_POST['instagram']);
    $facebook = htmlspecialchars($_POST['facebook']);
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload('uploads/muthawif/');
    }

    $update_id = (int)$muthawif['id'];
    $query = "UPDATE muthawif SET
                nama = '$nama',
                peran = '$peran',
                deskripsi = '$deskripsi',
                instagram = '$instagram',
                facebook = '$facebook',
                gambar = '$gambar'
              WHERE id = $update_id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'muthawif.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Edit Muthawif</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $muthawif['gambar']; ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $muthawif['nama']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Peran / Jabatan</label>
                        <input type="text" name="peran" value="<?= $muthawif['peran']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Pembimbing Ibadah">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Link Instagram</label>
                        <input type="text" name="instagram" value="<?= $muthawif['instagram']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Link Facebook</label>
                        <input type="text" name="facebook" value="<?= $muthawif['facebook']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                        <img src="../<?= $muthawif['gambar']; ?>" width="100" class="mb-2">
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= $muthawif['deskripsi']; ?></textarea>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Update Muthawif
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
