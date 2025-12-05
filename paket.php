<?php 
$pageTitle = "Paket Umroh & Haji";
$pageDesc = "Temukan paket perjalanan ibadah Umroh dan Haji terbaik dengan fasilitas bintang 5 dan pelayanan profesional.";
include 'includes/header.php'; 
?>

<!-- Page Header -->
<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?= getGambar('paket_hero', 'https://images.unsplash.com/photo-1596386461350-326ea7750f69?q=80&w=2070'); ?>" alt="Paket Umroh" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/60"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-6 text-shadow-gold" data-aos="fade-down">Paket Umroh & Haji</h1>
        <p class="text-gold-light max-w-2xl mx-auto text-lg font-light" data-aos="fade-up" data-aos-delay="100">Temukan paket perjalanan ibadah yang sesuai dengan kebutuhan dan budget Anda. Kami menyediakan berbagai pilihan paket dari Reguler hingga VIP dengan pelayanan <span class="text-gold font-bold">Premium</span>.</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-20 bg-gray-50 relative">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-10">
            
            <!-- Package Grid -->
            <div class="lg:w-full">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php
                    require_once 'config/koneksi.php';
                    $paket_umroh = query("SELECT * FROM paket_umroh ORDER BY keberangkatan ASC");
                    
                    if (empty($paket_umroh)) : ?>
                        <div class="col-span-3 text-center py-10">
                            <p class="text-gray-500 text-lg">Belum ada paket tersedia saat ini.</p>
                        </div>
                    <?php else : 
                        foreach ($paket_umroh as $row) :
                    ?>
                    <!-- Card Dynamic -->
                    <!-- Package Card - Brochure Style -->
                    <div class="group relative" data-aos="fade-up">
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <!-- Image Container - Full Brochure Display -->
                            <div class="relative bg-gradient-to-br from-emerald-900 to-emerald-700">
                                <!-- Badge -->
                                <div class="absolute top-4 left-4 z-20 bg-gold text-emerald-deep px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide shadow-lg">
                                    <i class="fa-solid fa-calendar-days mr-1"></i><?= date('d M Y', strtotime($row['keberangkatan'])); ?>
                                </div>
                                
                                <!-- Brochure Image - Full Display -->
                                <div class="relative aspect-[3/4] overflow-hidden">
                                    <img src="<?= !empty($row['gambar']) ? $row['gambar'] : 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800'; ?>" 
                                         alt="<?= $row['nama_paket']; ?>" 
                                         class="w-full h-full object-contain bg-gradient-to-b from-gray-100 to-gray-200 transform group-hover:scale-105 transition-transform duration-700" 
                                         loading="lazy">
                                </div>
                            </div>
                            
                            <!-- Info Footer -->
                            <div class="p-5 bg-white">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs text-emerald-deep font-bold bg-emerald-50 px-3 py-1 rounded-full">
                                        <i class="fa-solid fa-clock mr-1"></i><?= $row['durasi']; ?>
                                    </span>
                                    <span class="text-xs text-green-600 font-bold bg-green-50 px-3 py-1 rounded-full">
                                        <i class="fa-solid fa-check mr-1"></i>Available
                                    </span>
                                </div>
                                
                                <h3 class="font-serif text-lg font-bold text-emerald-deep mb-2 line-clamp-2 group-hover:text-gold-dark transition-colors">
                                    <?= $row['nama_paket']; ?>
                                </h3>
                                
                                <div class="space-y-2 text-sm text-gray-500 mb-4">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-plane text-gold w-4"></i>
                                        <span class="truncate"><?= $row['pesawat']; ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-hotel text-gold w-4"></i>
                                        <span class="truncate"><?= $row['hotel_makkah']; ?></span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div>
                                        <p class="text-xs text-gray-400">Mulai dari</p>
                                        <p class="text-xl font-bold text-gold-dark">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                                    </div>
                                    <a href="detail-paket.php?id=<?= $row['id']; ?>" class="bg-emerald-deep text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-gold hover:text-emerald-deep transition-all shadow-lg hover:shadow-gold/30">
                                        Detail <i class="fa-solid fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
