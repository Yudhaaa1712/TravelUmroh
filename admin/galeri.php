<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Manajemen Galeri</h3>
            <a href="tambah_galeri.php" class="bg-emerald text-white px-4 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Foto
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Foto</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $galeri = query("SELECT * FROM galeri ORDER BY created_at DESC");
                        foreach($galeri as $row) : 
                        ?>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex-shrink-0 w-24 h-24">
                                    <?php 
                                    $gambarSrc = $row['gambar'];
                                    // Jika bukan URL external, tambahkan ../
                                    if (!preg_match('/^https?:\/\//', $gambarSrc)) {
                                        $gambarSrc = '../' . $gambarSrc;
                                    }
                                    ?>
                                    <img class="w-full h-full rounded-lg object-cover" src="<?= $gambarSrc; ?>" alt="<?= $row['judul']; ?>" onerror="this.src='https://placehold.co/200x200/1a1a1a/gold?text=No+Image'" />
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-bold"><?= $row['judul']; ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <?= $row['kategori']; ?>
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex gap-2">
                                    <a href="edit_galeri.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:text-blue-900">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="hapus_galeri.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="text-red-600 hover:text-red-900">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</div>
</body>
</html>
