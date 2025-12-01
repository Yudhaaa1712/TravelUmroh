<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Manajemen Paket Umroh</h3>
            <a href="tambah_paket_umroh.php" class="bg-emerald text-white px-4 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Paket
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
                                Nama Paket
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Harga
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Keberangkatan
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Featured
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $paket = query("SELECT * FROM paket_umroh ORDER BY created_at DESC");
                        foreach($paket as $row) : 
                        ?>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex-shrink-0 w-20 h-20">
                                    <img class="w-full h-full rounded-md object-cover" src="../<?= $row['gambar']; ?>" alt="" />
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-bold"><?= $row['nama_paket']; ?></p>
                                <p class="text-gray-500 text-xs"><?= $row['durasi']; ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-bold text-gold-dark">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"><?= date('d M Y', strtotime($row['keberangkatan'])); ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <?php if($row['is_featured']) : ?>
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Yes</span>
                                    </span>
                                <?php else : ?>
                                    <span class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                        <span class="relative">No</span>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex gap-2">
                                    <a href="edit_paket_umroh.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:text-blue-900">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="hapus_paket_umroh.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="text-red-600 hover:text-red-900">
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
