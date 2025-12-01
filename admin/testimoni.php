<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Manajemen Testimoni</h3>
            <a href="tambah_testimoni.php" class="bg-emerald text-white px-4 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Testimoni
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Foto</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Jamaah</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Paket</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rating</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $testimoni = query("SELECT * FROM testimoni ORDER BY created_at DESC");
                        foreach($testimoni as $row) : 
                        ?>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex-shrink-0 w-12 h-12">
                                    <img class="w-full h-full rounded-full object-cover border border-gray-200" src="../<?= $row['gambar']; ?>" alt="" />
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-bold"><?= $row['nama_jamaah']; ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-600 whitespace-no-wrap"><?= $row['paket_diambil']; ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="text-gold text-xs">
                                    <?php for($i=0; $i<$row['rating']; $i++) echo '<i class="fa-solid fa-star"></i>'; ?>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex gap-2">
                                    <a href="edit_testimoni.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:text-blue-900">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="hapus_testimoni.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="text-red-600 hover:text-red-900">
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
