<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium mb-8">Dashboard</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-emerald">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-emerald/10 text-emerald">
                        <i class="fa-solid fa-plane-departure text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <?php $umroh_count = count(query("SELECT * FROM paket_umroh")); ?>
                        <h4 class="text-2xl font-bold text-gray-700"><?= $umroh_count; ?></h4>
                        <p class="text-gray-500 text-sm">Paket Umroh</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-gold">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-gold/10 text-gold">
                        <i class="fa-solid fa-mosque text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <?php $haji_count = count(query("SELECT * FROM paket_haji")); ?>
                        <h4 class="text-2xl font-bold text-gray-700"><?= $haji_count; ?></h4>
                        <p class="text-gray-500 text-sm">Paket Haji</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                        <i class="fa-solid fa-users text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <?php $testi_count = count(query("SELECT * FROM testimoni")); ?>
                        <h4 class="text-2xl font-bold text-gray-700"><?= $testi_count; ?></h4>
                        <p class="text-gray-500 text-sm">Testimoni</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                        <i class="fa-solid fa-images text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <?php $galeri_count = count(query("SELECT * FROM galeri")); ?>
                        <h4 class="text-2xl font-bold text-gray-700"><?= $galeri_count; ?></h4>
                        <p class="text-gray-500 text-sm">Galeri Foto</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-8">
            <h4 class="text-xl font-bold text-gray-700 mb-4">Selamat Datang, Admin!</h4>
            <p class="text-gray-600">
                Selamat datang di panel admin Ababil Tour & Hajj. Di sini Anda dapat mengelola semua konten website, mulai dari paket perjalanan, data muthawif, testimoni jamaah, hingga galeri foto.
            </p>
            <div class="mt-6">
                <a href="paket_umroh.php" class="inline-block bg-emerald text-white px-6 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                    <i class="fa-solid fa-plus mr-2"></i> Tambah Paket Umroh
                </a>
            </div>
        </div>
    </div>
</main>

</div> <!-- End Flex -->
</body>
</html>
