<?php 
$pageTitle = "Ibadah Haji Khusus & Furoda";
$pageDesc = "Program Haji Plus dan Haji Furoda (Mujamalah) langsung berangkat tanpa antri dengan visa resmi.";
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?= getGambar('haji_hero', 'https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=2070'); ?>" alt="Haji" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/60"></div>
    </div>
    <div class="relative z-10 text-center px-4" data-aos="fade-up">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-4">Ibadah Haji</h1>
        <p class="text-xl text-gold-light max-w-2xl mx-auto">Sempurnakan Rukun Islam kelima dengan pelayanan terbaik dan bimbingan sesuai sunnah.</p>
    </div>
</section>

<!-- Introduction -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Program Haji</h2>
                <h3 class="font-serif text-4xl font-bold text-emerald-deep mb-6">Menuju Baitullah dengan <span class="text-gold-gradient">Kenyamanan & Kepastian</span></h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Kami menyediakan program Haji Khusus (Haji Plus) dan Haji Furoda (Mujamalah) dengan fasilitas bintang 5. Fokus kami adalah kenyamanan ibadah Anda, mulai dari manasik di tanah air hingga pelaksanaan rukun haji di tanah suci.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-check-circle text-gold text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-emerald-deep">Haji Furoda (Langsung Berangkat)</h4>
                            <p class="text-sm text-gray-500">Tanpa antri, visa resmi undangan kerajaan Saudi Arabia.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-check-circle text-gold text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-emerald-deep">Haji Plus (Kuota Resmi)</h4>
                            <p class="text-sm text-gray-500">Masa tunggu lebih singkat dibanding haji reguler (5-7 tahun).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="absolute -top-4 -right-4 w-full h-full border-2 border-gold rounded-2xl"></div>
                <img src="<?= getGambar('haji_content', 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop'); ?>" alt="Manasik Haji" class="relative rounded-2xl shadow-2xl w-full object-cover h-[400px]">
            </div>
        </div>
    </div>
</section>

<!-- Packages -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Pilihan Paket</h2>
            <h3 class="font-serif text-4xl font-bold text-emerald-deep">Paket Haji Eksklusif</h3>
            <div class="w-24 h-1 bg-gold-gradient mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            require_once 'config/koneksi.php';
            $paket_haji = query("SELECT * FROM paket_haji ORDER BY created_at DESC");
            
            if (empty($paket_haji)) : ?>
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada paket haji tersedia saat ini.</p>
                </div>
            <?php else : 
                foreach ($paket_haji as $row) :
                    $is_furoda = ($row['tipe_haji'] == 'Furoda');
            ?>
            <!-- Package Card - Brochure Style (Same as Umroh) -->
            <div class="group relative" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Image Container - Full Brochure Display -->
                    <div class="relative bg-gradient-to-br from-emerald-900 to-emerald-700">
                        <!-- Badge -->
                        <div class="absolute top-4 left-4 z-20 <?= $is_furoda ? 'bg-gold-gradient text-emerald-deep' : 'bg-gold text-emerald-deep'; ?> px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide shadow-lg">
                            <i class="fa-solid fa-kaaba mr-1"></i><?= $is_furoda ? 'Furoda' : 'Haji Plus'; ?>
                        </div>
                        
                        <?php if($is_furoda): ?>
                        <div class="absolute top-4 right-4 z-20 bg-emerald-deep text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                            Langsung Berangkat
                        </div>
                        <?php endif; ?>
                        
                        <!-- Brochure Image - Full Display -->
                        <div class="relative aspect-[3/4] overflow-hidden">
                            <img src="<?= !empty($row['gambar']) ? $row['gambar'] : 'https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=800'; ?>" 
                                 alt="<?= $row['nama_paket']; ?>" 
                                 class="w-full h-full object-contain bg-gradient-to-b from-gray-100 to-gray-200 transform group-hover:scale-105 transition-transform duration-700" 
                                 loading="lazy">
                        </div>
                    </div>
                    
                    <!-- Info Footer -->
                    <div class="p-5 bg-white">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs text-emerald-deep font-bold bg-emerald-50 px-3 py-1 rounded-full">
                                <i class="fa-solid fa-calendar mr-1"></i><?= $row['estimasi_keberangkatan']; ?>
                            </span>
                            <span class="text-xs <?= $is_furoda ? 'text-gold-dark bg-yellow-50' : 'text-blue-600 bg-blue-50'; ?> font-bold px-3 py-1 rounded-full">
                                <i class="fa-solid fa-<?= $is_furoda ? 'bolt' : 'clock'; ?> mr-1"></i><?= $is_furoda ? 'Visa Mujamalah' : 'Kuota Resmi'; ?>
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
                                <span class="truncate"><?= $row['hotel_makkah']; ?> (Makkah)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-building text-gold w-4"></i>
                                <span class="truncate"><?= $row['hotel_madinah']; ?> (Madinah)</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div>
                                <p class="text-xs text-gray-400">Mulai dari</p>
                                <p class="text-xl font-bold text-gold-dark">$ <?= number_format($row['harga_usd'], 0, ',', '.'); ?></p>
                            </div>
                            <a href="https://wa.me/6281261288354?text=Assalamualaikum%20saya%20tertarik%20dengan%20paket%20<?= rawurlencode($row['nama_paket']); ?>" target="_blank" class="<?= $is_furoda ? 'bg-gold-gradient text-emerald-deep' : 'bg-emerald-deep text-white'; ?> px-5 py-2.5 rounded-full text-sm font-bold hover:shadow-lg transition-all">
                                Daftar <i class="fa-solid fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Timeline Info -->
<section class="py-20 bg-emerald-deep text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <h2 class="font-serif text-3xl md:text-4xl font-bold mb-4">Alur Pendaftaran Haji</h2>
            <p class="text-gray-300">Proses mudah dan transparan menuju tanah suci</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div class="relative">
                <div class="w-16 h-16 mx-auto bg-gold rounded-full flex items-center justify-center text-2xl font-bold mb-4">1</div>
                <h4 class="font-bold text-lg mb-2">Konsultasi</h4>
                <p class="text-sm text-gray-300">Diskusi paket dan persyaratan dengan tim kami.</p>
            </div>
            <div class="relative">
                <div class="w-16 h-16 mx-auto bg-gold rounded-full flex items-center justify-center text-2xl font-bold mb-4">2</div>
                <h4 class="font-bold text-lg mb-2">Pendaftaran</h4>
                <p class="text-sm text-gray-300">Penyerahan dokumen dan pembayaran DP.</p>
            </div>
            <div class="relative">
                <div class="w-16 h-16 mx-auto bg-gold rounded-full flex items-center justify-center text-2xl font-bold mb-4">3</div>
                <h4 class="font-bold text-lg mb-2">Proses Visa</h4>
                <p class="text-sm text-gray-300">Pengurusan visa dan perlengkapan haji.</p>
            </div>
            <div class="relative">
                <div class="w-16 h-16 mx-auto bg-gold rounded-full flex items-center justify-center text-2xl font-bold mb-4">4</div>
                <h4 class="font-bold text-lg mb-2">Keberangkatan</h4>
                <p class="text-sm text-gray-300">Manasik pemantapan dan berangkat ke tanah suci.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
