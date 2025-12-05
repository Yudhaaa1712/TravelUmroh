<?php 
$pageTitle = "Ibadah Haji Khusus & Furoda";
$pageDesc = "Program Haji Plus dan Haji Furoda (Mujamalah) langsung berangkat tanpa antri dengan visa resmi.";
include 'header.php'; 
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-5xl mx-auto">
            <?php
            require_once 'koneksi.php';
            $paket_haji = query("SELECT * FROM paket_haji ORDER BY created_at DESC");
            
            if (empty($paket_haji)) : ?>
                <div class="col-span-2 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada paket haji tersedia saat ini.</p>
                </div>
            <?php else : 
                foreach ($paket_haji as $row) :
                    $is_furoda = ($row['tipe_haji'] == 'Furoda');
                    $border_class = $is_furoda ? 'border-gold' : 'border-gray-100 hover:border-gold';
                    $badge_class = $is_furoda ? 'bg-white/20 backdrop-blur' : 'bg-gold';
                    $badge_text = $is_furoda ? 'Visa Mujamalah' : 'Kuota Resmi';
            ?>
            <!-- Dynamic Card -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl group border <?= $border_class; ?> relative transition-all duration-300" data-aos="fade-up">
                <?php if($is_furoda): ?>
                    <div class="absolute top-0 inset-x-0 h-2 bg-gold-gradient"></div>
                    <div class="absolute top-4 right-4 bg-gold-gradient text-emerald-deep px-4 py-1 rounded-full text-xs font-bold uppercase shadow-lg z-10">Langsung Berangkat</div>
                <?php endif; ?>
                
                <div class="relative h-64">
                    <img src="<?= !empty($row['gambar']) ? $row['gambar'] : 'https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=800&auto=format&fit=crop'; ?>" alt="<?= $row['nama_paket']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-colors"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <span class="<?= $badge_class; ?> px-3 py-1 rounded text-xs font-bold uppercase tracking-wider mb-2 inline-block"><?= $badge_text; ?></span>
                        <h4 class="font-serif text-3xl font-bold"><?= $row['nama_paket']; ?></h4>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Estimasi Keberangkatan</p>
                            <p class="font-bold text-emerald-deep"><?= $row['estimasi_keberangkatan']; ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500 mb-1">Mulai dari</p>
                            <p class="text-2xl font-serif font-bold text-gold-dark">$ <?= number_format($row['harga_usd'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8 text-gray-600">
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check text-gold"></i> <?= $row['pesawat']; ?></li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check text-gold"></i> <?= $row['hotel_makkah']; ?> (Makkah)</li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check text-gold"></i> <?= $row['hotel_madinah']; ?> (Madinah)</li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Saya%20tertarik%20dengan%20<?= urlencode($row['nama_paket']); ?>" class="block w-full py-4 <?= $is_furoda ? 'bg-gold-gradient text-emerald-deep' : 'bg-emerald-deep text-white hover:bg-gold-dark'; ?> text-center font-bold rounded-lg transition-all">
                        <?= $is_furoda ? 'Daftar Sekarang' : 'Konsultasi & Pendaftaran'; ?>
                    </a>
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

<?php include 'footer.php'; ?>
