<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $nama_jamaah = htmlspecialchars($_POST['nama_jamaah']);
    $paket_diambil = htmlspecialchars($_POST['paket_diambil']);
    $isi_testimoni = htmlspecialchars($_POST['isi_testimoni']);
    $rating = htmlspecialchars($_POST['rating']);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    // Upload gambar
    $gambar = upload('uploads/testimoni/');
    if (!$gambar) {
        $gambar = 'https://via.placeholder.com/150';
    }

    $query = "INSERT INTO testimoni VALUES (NULL, '$nama_jamaah', '$paket_diambil', '$isi_testimoni', '$rating', '$gambar', '$is_featured', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'testimoni.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Testimoni</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Jamaah</label>
                        <input type="text" name="nama_jamaah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Paket yang Diambil</label>
                        <input type="text" name="paket_diambil" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Umroh Reguler 2024" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Rating (1-5)</label>
                        <select name="rating" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="5">5 Bintang</option>
                            <option value="4">4 Bintang</option>
                            <option value="3">3 Bintang</option>
                            <option value="2">2 Bintang</option>
                            <option value="1">1 Bintang</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Foto Jamaah</label>
                        <input type="file" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <div class="mb-4 mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Isi Testimoni</label>
                    <textarea name="isi_testimoni" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald">
                        <span class="ml-2 text-gray-700">Tampilkan di Beranda</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Simpan Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
