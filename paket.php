<?php 
$pageTitle = "Paket Umroh & Haji";
$pageDesc = "Temukan paket perjalanan ibadah Umroh dan Haji terbaik dengan fasilitas bintang 5 dan pelayanan profesional.";
include 'header.php'; 
?>

<!-- Page Header -->
<section class="relative py-24 bg-gold-gradient overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1596386461350-326ea7750f69?q=80&w=2070&auto=format&fit=crop" alt="Paket Umroh" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gold-gradient"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-emerald-deep mb-6 text-shadow-gold" data-aos="fade-down">Paket Umroh & Haji</h1>
        <p class="text-emerald-deep max-w-2xl mx-auto text-lg font-light" data-aos="fade-up" data-aos-delay="100">Temukan paket perjalanan ibadah yang sesuai dengan kebutuhan dan budget Anda. Kami menyediakan berbagai pilihan paket dari Reguler hingga VIP dengan pelayanan <span class="text-emerald-deep font-bold">Premium</span>.</p>
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
                    require_once 'koneksi.php';
                    $paket_umroh = query("SELECT * FROM paket_umroh ORDER BY keberangkatan ASC");
                    
                    if (empty($paket_umroh)) : ?>
                        <div class="col-span-3 text-center py-10">
                            <p class="text-gray-500 text-lg">Belum ada paket tersedia saat ini.</p>
                        </div>
                    <?php else : 
                        foreach ($paket_umroh as $row) :
                    ?>
                    <!-- Card Dynamic -->
                    <div class="card-luxury rounded-xl overflow-hidden group flex flex-col" data-aos="fade-up">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute top-4 left-4 z-10 bg-gold-gradient backdrop-blur text-emerald-deep px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wide shadow-lg border border-gold/30">
                                <?= date('d M Y', strtotime($row['keberangkatan'])); ?>
                            </div>
                            <img src="<?= $row['gambar']; ?>" alt="<?= $row['nama_paket']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60"></div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col bg-gold-gradient">
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="font-serif text-2xl font-bold text-black"><?= $row['nama_paket']; ?></h4>
                                <span class="bg-emerald-50 text-emerald-deep text-xs px-3 py-1 rounded-full font-bold border border-emerald-100">Available</span>
                            </div>
                            <p class="text-black text-sm mb-6 border-b border-gray-100 pb-4"><?= $row['durasi']; ?></p>
                            
                            <div class="space-y-3 mb-8 flex-1">
                                <div class="flex items-center gap-4 text-gray-600 group-hover:text-emerald-deep transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-gold-dark">
                                        <i class="fa-solid fa-plane"></i>
                                    </div>
                                    <span class="text-bold font-medium"><?= $row['pesawat']; ?></span>
                                </div>
                                <div class="flex items-center gap-4 text-gray-600 group-hover:text-emerald-deep transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-gold-dark">
                                        <i class="fa-solid fa-hotel"></i>
                                    </div>
                                    <span class="text-bold font-medium"><?= $row['hotel_makkah']; ?></span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                                <div>
                                    <p class="text-xs text-black uppercase tracking-wider">Mulai dari</p>
                                    <p class="text-2xl font-serif font-bold text-black">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                                </div>
                                <a href="detail-paket.php?id=<?= $row['id']; ?>" class="px-6 py-2 border border-gold text-black hover:bg-gold-gradient hover:text-emerald-deep hover:border-transparent rounded-full text-sm font-bold transition-all shadow-sm">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>

                <!-- Pagination (Static for now) -->
                <div class="mt-16 flex justify-center gap-3">
                    <button class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:border-gold hover:text-gold transition-all hover:shadow-md">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="w-12 h-12 rounded-full bg-gold-gradient text-emerald-deep flex items-center justify-center font-bold shadow-lg transform scale-110">1</button>
                    <button class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:border-gold hover:text-gold transition-all hover:shadow-md">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
