<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Manajemen Blog & Artikel</h3>
            <a href="tambah_blog.php" class="bg-emerald text-white px-4 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Artikel
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Gambar
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Judul Artikel
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Check if table exists first to avoid error if setup_blog.php wasn't run
                        $check = mysqli_query($koneksi, "SHOW TABLES LIKE 'artikel'");
                        if(mysqli_num_rows($check) > 0) {
                            $artikel = query("SELECT * FROM artikel ORDER BY created_at DESC");
                        } else {
                            $artikel = [];
                        }

                        if(empty($artikel)): ?>
                            <tr>
                                <td colspan="4" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    Belum ada data artikel.
                                </td>
                            </tr>
                        <?php else: 
                            foreach($artikel as $row) : 
                        ?>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex-shrink-0 w-20 h-20">
                                    <img class="w-full h-full rounded-md object-cover" src="../<?= $row['gambar']; ?>" alt="" />
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-bold"><?= $row['judul']; ?></p>
                                <p class="text-gray-500 text-xs truncate w-64"><?= substr(strip_tags($row['konten']), 0, 50); ?>...</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"><?= date('d M Y', strtotime($row['created_at'])); ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex gap-2">
                                    <a href="edit_blog.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:text-blue-900">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="hapus_blog.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="text-red-600 hover:text-red-900">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

</div>
</body>
</html>
