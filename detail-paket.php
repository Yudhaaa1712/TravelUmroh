<?php
require 'koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = query("SELECT * FROM paket_umroh WHERE id = $id");

if(empty($data)) {
    echo "<script>alert('Paket tidak ditemukan!'); window.location='paket.php';</script>";
    exit;
}

$paket = $data[0];
$pageTitle = $paket['nama_paket'];
$pageDesc = substr(strip_tags($paket['deskripsi']), 0, 160);

// Format harga
$harga_format = number_format($paket['harga'], 0, ',', '.');
$tanggal_berangkat = date('d F Y', strtotime($paket['keberangkatan']));

include 'header.php';
?>

<!-- Page Header -->
<section class="relative h-[60vh] overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo $paket['gambar']; ?>" alt="<?php echo $paket['nama_paket']; ?>" class="w-full h-full object-cover animate-float" style="animation-duration: 30s; transform: scale(1.1);">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/90"></div>
    </div>
    <div class="absolute bottom-0 left-0 w-full p-8 md:p-16">
        <div class="container mx-auto px-4">
            <div data-aos="fade-up">
                <span class="bg-gold-gradient text-emerald-deep px-4 py-1 rounded-full text-sm font-bold uppercase tracking-widest mb-6 inline-block shadow-lg">
                    <?php echo $paket['is_featured'] ? 'Promo Spesial' : 'Paket Reguler'; ?>
                </span>
                <h1 class="font-serif text-4xl md:text-6xl font-bold text-white mb-4 text-shadow-gold"><?php echo $paket['nama_paket']; ?></h1>
                <div class="flex items-center gap-6 text-white/90 text-lg">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-calendar-days text-gold"></i> <?php echo $tanggal_berangkat; ?></span>
                    <span class="hidden md:flex items-center gap-2"><i class="fa-solid fa-plane text-gold"></i> <?php echo $paket['pesawat']; ?></span>
                    <span class="flex items-center gap-2"><i class="fa-solid fa-clock text-gold"></i> <?php echo $paket['durasi']; ?> Hari</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50 relative">
    <!-- Background Pattern -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-5">
        <div class="absolute top-20 right-0 w-96 h-96 bg-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-0 w-96 h-96 bg-emerald-deep rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Left Content (70%) -->
            <div class="lg:w-[70%] space-y-10">
                
                <!-- Deskripsi -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100" data-aos="fade-up">
                    <h3 class="font-serif text-2xl font-bold text-emerald-deep mb-6 border-b border-gray-100 pb-4 flex items-center gap-3">
                        <i class="fa-solid fa-file-lines text-gold"></i> Deskripsi Paket
                    </h3>
                    <div class="prose prose-emerald max-w-none text-gray-600">
                        <?php echo nl2br($paket['deskripsi']); ?>
                    </div>
                </div>

                <!-- Fasilitas -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100" data-aos="fade-up">
                    <h3 class="font-serif text-2xl font-bold text-emerald-deep mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                        <i class="fa-solid fa-star text-gold"></i> Fasilitas Utama
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex items-start gap-5 group">
                            <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark text-2xl group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shadow-sm">
                                <i class="fa-solid fa-plane"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">Penerbangan</h4>
                                <p class="text-sm text-gray-500 leading-relaxed"><?php echo $paket['pesawat']; ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 group">
                            <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark text-2xl group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shadow-sm">
                                <i class="fa-solid fa-hotel"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">Hotel Makkah</h4>
                                <p class="text-sm text-gray-500 leading-relaxed"><?php echo $paket['hotel_makkah']; ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 group">
                            <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark text-2xl group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shadow-sm">
                                <i class="fa-solid fa-mosque"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">Hotel Madinah</h4>
                                <p class="text-sm text-gray-500 leading-relaxed"><?php echo $paket['hotel_madinah']; ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 group">
                            <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark text-2xl group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shadow-sm">
                                <i class="fa-solid fa-utensils"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">Konsumsi</h4>
                                <p class="text-sm text-gray-500 leading-relaxed">Full Board Menu Indonesia<br>Prasmanan 3x Sehari</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sticky Sidebar (30%) -->
            <aside class="lg:w-[30%]">
                <div class="sticky top-28 space-y-8">
                    <!-- Booking Card -->
                    <div class="card-luxury rounded-2xl overflow-hidden p-8 bg-white relative" data-aos="fade-left">
                        <div class="absolute top-0 inset-x-0 h-2 bg-gold-gradient"></div>
                        <div class="text-center mb-8">
                            <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-medium">Harga Mulai Dari</p>
                            <h2 class="text-4xl font-serif font-bold text-emerald-deep mb-2">Rp <?php echo $harga_format; ?></h2>
                            <p class="text-xs text-gold-dark font-medium bg-yellow-50 inline-block px-2 py-1 rounded">*Harga dapat berubah sewaktu-waktu</p>
                        </div>

                        <div class="space-y-4">
                            <a href="https://wa.me/6281234567890?text=Assalamualaikum,%20saya%20tertarik%20dengan%20<?php echo urlencode($paket['nama_paket']); ?>" class="block w-full py-4 bg-gold-gradient text-emerald-deep font-bold text-center rounded-xl hover:shadow-lg hover:scale-105 transition-all shadow-md group">
                                <span class="flex items-center justify-center gap-2">
                                    <i class="fa-brands fa-whatsapp text-xl"></i> Booking via WhatsApp
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Contact Support -->
                    <div class="bg-emerald-deep p-8 rounded-2xl shadow-xl text-white relative overflow-hidden" data-aos="fade-left" data-aos-delay="100">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-2xl -mr-10 -mt-10"></div>
                        <h4 class="font-serif text-xl font-bold mb-4 text-gold-gradient">Butuh Bantuan?</h4>
                        <p class="text-emerald-100 text-sm mb-6 leading-relaxed">Tim konsultan kami siap membantu Anda 24/7 untuk merencanakan ibadah terbaik Anda.</p>
                        <div class="flex items-center gap-4 bg-white/10 p-4 rounded-xl backdrop-blur-sm border border-white/10">
                            <div class="w-12 h-12 rounded-full bg-gold-gradient flex items-center justify-center text-emerald-deep shadow-lg">
                                <i class="fa-solid fa-phone-volume text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-emerald-200 uppercase tracking-wider">Hotline 24 Jam</p>
                                <p class="font-bold text-xl font-serif tracking-wide">+62 21 8090 1234</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>

<!-- JSON-LD Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "<?php echo $paket['nama_paket']; ?>",
  "image": "<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF']) . '/' . $paket['gambar']; ?>",
  "description": "<?php echo $pageDesc; ?>",
  "offers": {
    "@type": "Offer",
    "url": "<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>",
    "priceCurrency": "IDR",
    "price": "<?php echo $paket['harga']; ?>",
    "availability": "https://schema.org/InStock",
    "priceValidUntil": "<?php echo date('Y-m-d', strtotime('+1 month')); ?>"
  }
}
</script>

<?php include 'footer.php'; ?>
