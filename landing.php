<?php
/**
 * Landing Page Dinamis - Programmatic SEO untuk setiap Kota
 * URL: /travel-umrah-{city}
 * Menggunakan header.php dan footer.php utama
 */

require_once 'config/koneksi.php';
require_once 'includes/cities_data.php';

// Ambil slug kota dari URL
$citySlug = isset($_GET['city']) ? strtolower(trim($_GET['city'])) : '';

// Validasi kota
$cityData = getCityBySlug($citySlug);

if (!$cityData) {
    // Redirect ke halaman utama jika kota tidak valid
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: index.php');
    exit;
}

// Generate konten dinamis
$content = generateCityContent($citySlug, $cityData);
$nextDeparture = getNextDeparture($citySlug);
$availableSlots = getAvailableSlots($citySlug);

// Meta tags untuk header.php
$pageTitle = "Paket Umrah dari {$cityData['name']}";
$pageDesc = "Travel Umrah terpercaya untuk jamaah {$cityData['name']}, {$cityData['province']}. Berangkat dari Bandara {$cityData['airport']}. Fasilitas lengkap, bimbingan profesional.";

// WA pre-filled message
$waMessage = rawurlencode("Assalamualaikum saya dari {$cityData['name']} ingin bertanya tentang paket umrah");
$waNumber = "6281261288354";
$waLink = "https://wa.me/{$waNumber}?text={$waMessage}";

// Ambil paket umrah FEATURED dari database (sama dengan homepage)
$packages = query("SELECT * FROM paket_umroh WHERE is_featured = 1 ORDER BY created_at DESC LIMIT 3");

// Include header utama
include 'includes/header.php';
?>

<!-- JSON-LD Schema: TravelAgency -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "TravelAgency",
    "name": "Ababil Tour & Hajj",
    "description": "Travel Umrah dan Haji terpercaya melayani jamaah dari <?= $cityData['name']; ?>",
    "url": "https://ababiltour.com/travel-umrah-<?= $citySlug; ?>",
    "areaServed": {
        "@type": "City",
        "name": "<?= $cityData['name']; ?>",
        "containedInPlace": {
            "@type": "State",
            "name": "<?= $cityData['province']; ?>"
        }
    }
}
</script>

<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-br from-emerald-deep to-emerald-900 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?= getGambar('paket_hero', 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070'); ?>" alt="Umrah <?= $cityData['name']; ?>" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-emerald-deep/90"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="text-sm mb-6 text-gold-light">
            <a href="index.php" class="hover:text-white">Home</a>
            <span class="mx-2">/</span>
            <a href="paket.php" class="hover:text-white">Paket Umrah</a>
            <span class="mx-2">/</span>
            <span class="text-white"><?= $cityData['name']; ?></span>
        </nav>
        
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-block bg-gold/20 border border-gold/50 px-4 py-2 rounded-full text-gold text-sm mb-4">
                    <i class="fa-solid fa-location-dot mr-2"></i>
                    Melayani Jamaah dari <?= $cityData['name']; ?>
                </div>
                
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    <?= $content['headline']; ?>
                </h1>
                
                <p class="text-lg text-gray-200 mb-8 leading-relaxed">
                    <?= $content['intro']; ?>
                </p>
                
                <div class="flex flex-wrap gap-4 mb-8">
                    <div class="bg-white/10 backdrop-blur px-4 py-3 rounded-lg">
                        <p class="text-gold text-sm">Keberangkatan Terdekat</p>
                        <p class="text-white font-bold"><?= $nextDeparture; ?></p>
                    </div>
                    <div class="bg-white/10 backdrop-blur px-4 py-3 rounded-lg">
                        <p class="text-gold text-sm">Kursi Tersedia</p>
                        <p class="text-white font-bold"><?= $availableSlots; ?> Seat</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur px-4 py-3 rounded-lg">
                        <p class="text-gold text-sm">Berangkat dari</p>
                        <p class="text-white font-bold">Bandara <?= $cityData['airport']; ?></p>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a href="<?= $waLink; ?>" target="_blank" class="inline-flex items-center gap-2 bg-green-500 text-white px-8 py-4 rounded-full font-bold hover:bg-green-600 transition-all hover:scale-105 shadow-lg">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                        Konsultasi Gratis via WA
                    </a>
                    <a href="#paket" class="inline-flex items-center gap-2 bg-gold text-emerald-deep px-8 py-4 rounded-full font-bold hover:bg-gold-light transition-all hover:scale-105 shadow-lg">
                        <i class="fa-solid fa-box"></i>
                        Lihat Paket
                    </a>
                </div>
            </div>
            
            <div class="hidden lg:block">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800" alt="Umrah dari <?= $cityData['name']; ?>" class="rounded-2xl shadow-2xl" loading="lazy">
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gold/20 rounded-full flex items-center justify-center text-gold">
                                <i class="fa-solid fa-star text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Rating</p>
                                <p class="font-bold text-emerald-deep">4.9/5 <span class="text-gray-400 font-normal">(1.2K+ Review)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-emerald-deep mb-4">
                Kenapa <?= $cityData['local_call'] ?? 'Jamaah ' . $cityData['name']; ?> Memilih Kami?
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?= $content['features']; ?></p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6 bg-gray-50 rounded-2xl hover:shadow-lg transition-shadow" data-aos="fade-up">
                <div class="w-16 h-16 bg-gold/20 rounded-full flex items-center justify-center text-gold mx-auto mb-4">
                    <i class="fa-solid fa-plane text-2xl"></i>
                </div>
                <h3 class="font-bold text-emerald-deep mb-2">Bandara <?= $cityData['airport']; ?></h3>
                <p class="text-gray-600 text-sm">Berangkat dari bandara terdekat, embarkasi <?= $cityData['embarkasi'] ?? 'Jakarta'; ?></p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-2xl hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-gold/20 rounded-full flex items-center justify-center text-gold mx-auto mb-4">
                    <i class="fa-solid fa-clock text-2xl"></i>
                </div>
                <h3 class="font-bold text-emerald-deep mb-2">Waktu Tempuh</h3>
                <p class="text-gray-600 text-sm">Estimasi <?= $cityData['travel_time'] ?? '10 jam'; ?> ke Tanah Suci (<?= $cityData['timezone'] ?? 'WIB'; ?>)</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-2xl hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-gold/20 rounded-full flex items-center justify-center text-gold mx-auto mb-4">
                    <i class="fa-solid fa-user-tie text-2xl"></i>
                </div>
                <h3 class="font-bold text-emerald-deep mb-2">Ustadz Pembimbing</h3>
                <p class="text-gray-600 text-sm">Bimbingan ibadah sesuai sunnah dari awal hingga kembali ke <?= $cityData['name']; ?></p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-2xl hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-gold/20 rounded-full flex items-center justify-center text-gold mx-auto mb-4">
                    <i class="fa-solid fa-shield-halved text-2xl"></i>
                </div>
                <h3 class="font-bold text-emerald-deep mb-2">Izin Resmi PPIU</h3>
                <p class="text-gray-600 text-sm">Terdaftar Kemenag RI, melayani <?= $cityData['population'] ?? '500 ribu'; ?> penduduk <?= $cityData['name']; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Info Kota Section - UNIK PER KOTA -->
<section class="py-16 bg-gradient-to-br from-gold/10 to-gold/5">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="font-serif text-3xl font-bold text-emerald-deep mb-6">
                    Info Perjalanan dari <?= $cityData['name']; ?>
                </h2>
                <p class="text-gray-600 mb-8">
                    <?= $cityData['local_call'] ?? 'Jamaah dari ' . $cityData['name']; ?> dapat berangkat umrah dengan nyaman melalui jalur embarkasi <?= $cityData['embarkasi'] ?? 'Jakarta'; ?>. 
                    Dengan mayoritas penduduk <?= $cityData['majority_ethnic'] ?? 'lokal'; ?>, kami memahami kebutuhan ibadah masyarakat <?= $cityData['province']; ?>.
                </p>
                
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-white p-4 rounded-xl shadow">
                        <p class="text-gold font-bold text-sm mb-1"><i class="fa-solid fa-mosque mr-2"></i>Landmark</p>
                        <p class="text-emerald-deep font-medium"><?= $cityData['landmark'] ?? 'Masjid Agung'; ?></p>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow">
                        <p class="text-gold font-bold text-sm mb-1"><i class="fa-solid fa-users mr-2"></i>Populasi</p>
                        <p class="text-emerald-deep font-medium"><?= $cityData['population'] ?? '500 ribu'; ?> jiwa</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow">
                        <p class="text-gold font-bold text-sm mb-1"><i class="fa-solid fa-globe mr-2"></i>Zona Waktu</p>
                        <p class="text-emerald-deep font-medium"><?= $cityData['timezone'] ?? 'WIB'; ?></p>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow">
                        <p class="text-gold font-bold text-sm mb-1"><i class="fa-solid fa-utensils mr-2"></i>Kuliner Khas</p>
                        <p class="text-emerald-deep font-medium"><?= $cityData['local_food'] ?? 'Kuliner Lokal'; ?></p>
                    </div>
                </div>
                
                <a href="<?= $waLink; ?>" target="_blank" class="inline-flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-full font-bold hover:bg-green-600 transition-all">
                    <i class="fa-brands fa-whatsapp"></i>
                    Tanya Info Lebih Lanjut
                </a>
            </div>
            
            <div class="relative" data-aos="fade-left">
                <div class="bg-white p-6 rounded-2xl shadow-xl">
                    <h3 class="font-bold text-emerald-deep text-xl mb-4">
                        <i class="fa-solid fa-route mr-2 text-gold"></i>
                        Rute Perjalanan dari <?= $cityData['name']; ?>
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-emerald-deep rounded-full flex items-center justify-center text-white font-bold">1</div>
                            <div>
                                <p class="font-medium text-gray-900">Berkumpul di <?= $cityData['name']; ?></p>
                                <p class="text-sm text-gray-500">Meeting point area <?= $cityData['landmark'] ?? 'Masjid Agung'; ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-emerald-deep rounded-full flex items-center justify-center text-white font-bold">2</div>
                            <div>
                                <p class="font-medium text-gray-900">Menuju Bandara <?= $cityData['airport']; ?></p>
                                <p class="text-sm text-gray-500">Check-in dan boarding</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-emerald-deep rounded-full flex items-center justify-center text-white font-bold">3</div>
                            <div>
                                <p class="font-medium text-gray-900">Transit/Direct via Embarkasi <?= $cityData['embarkasi'] ?? 'Jakarta'; ?></p>
                                <p class="text-sm text-gray-500">Perjalanan <?= $cityData['travel_time'] ?? '10 jam'; ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gold rounded-full flex items-center justify-center text-emerald-deep font-bold">
                                <i class="fa-solid fa-kaaba"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Tiba di Tanah Suci</p>
                                <p class="text-sm text-gray-500">Madinah atau Makkah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Packages Section - SAME AS HOMEPAGE -->
<section id="paket" class="py-24 bg-gray-50 relative overflow-hidden">
    <div class="absolute top-20 left-10 w-64 h-64 bg-gold/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-emerald-deep/5 rounded-full blur-3xl"></div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-emerald-deep font-bold tracking-[0.3em] uppercase mb-4 text-sm">Pilihan Terbaik</h2>
            <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-4">Paket Umrah untuk <?= $cityData['name']; ?></h3>
            <div class="w-32 h-1 bg-emerald-deep mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php if (!empty($packages)): 
                foreach ($packages as $row):
            ?>
            <!-- Package Card - Brochure Style -->
            <div class="group relative" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Image Container - Full Brochure Display -->
                    <div class="relative bg-gradient-to-br from-emerald-900 to-emerald-700">
                        <!-- Badge -->
                        <div class="absolute top-4 left-4 z-20 bg-gold text-emerald-deep px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide shadow-lg">
                            <i class="fa-solid fa-fire mr-1"></i> Promo
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
                                <i class="fa-solid fa-calendar-days mr-1"></i><?= $row['durasi']; ?>
                            </span>
                            <span class="text-xs text-gray-500">
                                <i class="fa-solid fa-plane-departure mr-1"></i><?= date('d M Y', strtotime($row['keberangkatan'])); ?>
                            </span>
                        </div>
                        
                        <h3 class="font-serif text-lg font-bold text-emerald-deep mb-2 line-clamp-2 group-hover:text-gold-dark transition-colors">
                            <?= $row['nama_paket']; ?>
                        </h3>
                        
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                            <i class="fa-solid fa-hotel text-gold"></i>
                            <span class="truncate"><?= $row['hotel_makkah']; ?></span>
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
            <?php endforeach; else: ?>
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada paket featured saat ini.</p>
                    <a href="paket.php" class="inline-block mt-4 text-gold hover:text-gold-dark">Lihat semua paket →</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
            <a href="paket.php" class="inline-flex items-center gap-3 text-emerald-deep font-bold hover:text-gold-dark transition-colors text-lg tracking-wide uppercase border-b-2 border-transparent hover:border-gold-dark pb-1">
                Lihat Semua Paket <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-emerald-deep to-emerald-800">
    <div class="container mx-auto px-4 text-center">
        <h2 class="font-serif text-3xl md:text-4xl font-bold text-white mb-4" data-aos="fade-up">
            Siap Berangkat Umrah dari <?= $cityData['name']; ?>?
        </h2>
        <p class="text-gold-light text-lg mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            <?= $content['cta']; ?>
        </p>
        <a href="<?= $waLink; ?>" target="_blank" class="inline-flex items-center gap-3 bg-green-500 text-white px-10 py-5 rounded-full text-xl font-bold hover:bg-green-600 transition-all hover:scale-105 shadow-2xl" data-aos="fade-up" data-aos-delay="200">
            <i class="fa-brands fa-whatsapp text-3xl"></i>
            Chat Sekarang - GRATIS Konsultasi
        </a>
        <p class="text-white/60 text-sm mt-4">Balasan cepat, CS online 24 jam</p>
    </div>
</section>

<!-- Other Cities -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="font-serif text-2xl font-bold text-emerald-deep mb-8 text-center">
            Kami Juga Melayani Kota Lainnya
        </h2>
        <div class="flex flex-wrap justify-center gap-3">
            <?php 
            $allCities = getAllCities();
            $displayCities = array_slice($allCities, 0, 20);
            foreach ($displayCities as $slug => $city): 
                if ($slug !== $citySlug):
            ?>
            <a href="landing.php?city=<?= $slug; ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gold hover:text-emerald-deep transition-colors text-sm">
                <?= $city['name']; ?>
            </a>
            <?php 
                endif;
            endforeach; 
            ?>
            <a href="paket.php" class="px-4 py-2 bg-emerald-deep text-white rounded-full hover:bg-emerald-800 transition-colors text-sm">
                Lihat Semua →
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
