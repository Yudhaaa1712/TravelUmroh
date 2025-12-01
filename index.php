<?php include 'header.php'; ?>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070&auto=format&fit=crop" alt="Masjidil Haram" class="w-full h-full object-cover animate-float" style="animation-duration: 20s; transform: scale(1.1);">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
        <div class="mb-4 inline-block" data-aos="fade-down">
            <span class="px-4 py-1 rounded-full border border-gold text-gold text-xs uppercase tracking-[0.3em] bg-black/30 backdrop-blur-sm">Premium Umroh & Hajj Services</span>
        </div>
        <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-8 leading-tight text-shadow-gold" data-aos="fade-up" data-aos-delay="100">
            Perjalanan Suci <br>
            <span class="text-gold-gradient italic">Berkelas & Mulia</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-200 mb-12 max-w-3xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            Rasakan ketenangan ibadah dengan fasilitas bintang lima. Kami menghadirkan pengalaman Umroh yang tidak hanya nyaman, tetapi juga penuh kemewahan dan kekhusyukan.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center" data-aos="fade-up" data-aos-delay="300">
            <a href="paket.php" class="group relative px-10 py-4 bg-gold-gradient text-white font-bold rounded-full overflow-hidden shadow-[0_0_20px_rgba(197,160,40,0.5)] hover:shadow-[0_0_30px_rgba(197,160,40,0.8)] transition-all transform hover:-translate-y-1">
                <span class="relative z-10 flex items-center gap-2 text-emerald-deep">
                    Lihat Paket <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
            <a href="https://wa.me/6281234567890" class="px-10 py-4 glass-gold text-emerald-deep font-bold rounded-full border border-gold hover:bg-white transition-all transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-2">
                Konsultasi VIP <i class="fa-brands fa-whatsapp text-xl"></i>
            </a>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce text-gold">
        <div class="flex flex-col items-center gap-2">
            <span class="text-[10px] uppercase tracking-widest text-white/70">Scroll Down</span>
            <i class="fa-solid fa-chevron-down text-2xl"></i>
        </div>
    </div>
</section>

<!-- Stats Counter -->
<section class="relative z-20 -mt-20 px-4">
    <div class="container mx-auto">
        <div class="bg-white rounded-2xl shadow-2xl border-b-4 border-gold overflow-hidden">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-100">
                <div class="p-8 text-center group hover:bg-yellow-50 transition-colors" data-aos="fade-up" data-aos-delay="0">
                    <div class="text-4xl md:text-5xl font-bold font-serif text-gold-dark mb-2 group-hover:scale-110 transition-transform">15+</div>
                    <div class="text-xs uppercase tracking-widest text-gray-500">Tahun Pengalaman</div>
                </div>
                <div class="p-8 text-center group hover:bg-yellow-50 transition-colors" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl md:text-5xl font-bold font-serif text-gold-dark mb-2 group-hover:scale-110 transition-transform">10k+</div>
                    <div class="text-xs uppercase tracking-widest text-gray-500">Jamaah Terlayani</div>
                </div>
                <div class="p-8 text-center group hover:bg-yellow-50 transition-colors" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl md:text-5xl font-bold font-serif text-gold-dark mb-2 group-hover:scale-110 transition-transform">100%</div>
                    <div class="text-xs uppercase tracking-widest text-gray-500">Kepastian Berangkat</div>
                </div>
                <div class="p-8 text-center group hover:bg-yellow-50 transition-colors" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl md:text-5xl font-bold font-serif text-gold-dark mb-2 group-hover:scale-110 transition-transform">4.9</div>
                    <div class="text-xs uppercase tracking-widest text-gray-500">Rating Kepuasan</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Packages -->
<section class="py-24 bg-gold-gradient relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-64 h-64 bg-gold/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-emerald-deep/5 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-emerald-deep font-bold tracking-[0.3em] uppercase mb-4 text-sm">Pilihan Terbaik</h2>
            <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-4">Koleksi Paket Exclusive</h3>
            <div class="w-32 h-1 bg-emerald-deep mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php
            require_once 'koneksi.php';
            $featured_paket = query("SELECT * FROM paket_umroh WHERE is_featured = 1 ORDER BY created_at DESC LIMIT 3");
            
            if (empty($featured_paket)) : ?>
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada paket featured saat ini.</p>
                </div>
            <?php else : 
                foreach ($featured_paket as $row) :
            ?>
            <!-- Package Card Dynamic -->
            <div class="card-luxury rounded-xl overflow-hidden group relative z-10" data-aos="fade-up">
                <div class="relative h-72 overflow-hidden">
                    <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur text-emerald-deep px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wide shadow-lg border border-gold/30">
                        Promo Spesial
                    </div>
                    <img src="<?= $row['gambar']; ?>" alt="<?= $row['nama_paket']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6">
                        <p class="text-gold-light font-medium tracking-wide mb-1">Keberangkatan <?= date('d M Y', strtotime($row['keberangkatan'])); ?></p>
                        <h4 class="font-serif text-2xl font-bold text-white group-hover:text-gold transition-colors"><?= $row['nama_paket']; ?></h4>
                    </div>
                </div>
                <div class="p-8 bg-white relative">
                    <div class="absolute -top-6 right-6 w-12 h-12 bg-gold-gradient rounded-full flex items-center justify-center text-emerald-deep shadow-lg group-hover:rotate-12 transition-transform">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    
                    <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                        <span class="text-gray-500 text-sm"><?= $row['durasi']; ?></span>
                        <span class="text-emerald-deep font-bold bg-emerald-50 px-2 py-1 rounded text-xs">Available</span>
                    </div>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center gap-4 text-gray-600 group-hover:text-emerald-deep transition-colors">
                            <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-gold-dark">
                                <i class="fa-solid fa-plane"></i>
                            </div>
                            <span class="text-sm font-medium"><?= $row['pesawat']; ?></span>
                        </div>
                        <div class="flex items-center gap-4 text-gray-600 group-hover:text-emerald-deep transition-colors">
                            <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-gold-dark">
                                <i class="fa-solid fa-hotel"></i>
                            </div>
                            <span class="text-sm font-medium"><?= $row['hotel_makkah']; ?></span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Mulai dari</p>
                            <p class="text-3xl font-serif font-bold text-gold-dark">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                        </div>
                        <a href="detail-paket.php?id=<?= $row['id']; ?>" class="w-12 h-12 rounded-full border border-gold text-gold hover:bg-gold-gradient hover:text-emerald-deep hover:border-transparent flex items-center justify-center transition-all shadow-md group-hover:shadow-gold/50">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
            <a href="paket.php" class="inline-flex items-center gap-3 text-emerald-deep font-bold hover:text-gold-dark transition-colors text-lg tracking-wide uppercase border-b-2 border-transparent hover:border-gold-dark pb-1">
                Lihat Semua Paket <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</section>

<!-- Tour Leaders Section -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Pembimbing Ibadah</h2>
            <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-4">Muthawif & Tour Leader</h3>
            <div class="w-24 h-1 bg-gold-gradient mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $muthawif = query("SELECT * FROM muthawif ORDER BY created_at DESC LIMIT 4");
            
            if (empty($muthawif)) : ?>
                <div class="col-span-4 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada data muthawif.</p>
                </div>
            <?php else : 
                foreach ($muthawif as $row) :
            ?>
            <!-- Leader Dynamic -->
            <div class="group relative" data-aos="fade-up">
                <div class="relative h-96 rounded-2xl overflow-hidden shadow-lg">
                    <img src="<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-deep/90 via-transparent to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 text-center transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h4 class="font-serif text-xl font-bold text-white mb-1"><?= $row['nama']; ?></h4>
                        <p class="text-gold text-sm uppercase tracking-wider mb-4"><?= $row['peran']; ?></p>
                        <div class="flex justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            <?php if($row['instagram']): ?>
                            <a href="<?= $row['instagram']; ?>" class="text-white hover:text-gold"><i class="fa-brands fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if($row['facebook']): ?>
                            <a href="<?= $row['facebook']; ?>" class="text-white hover:text-gold"><i class="fa-brands fa-facebook"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-gold-gradient relative">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 text-[20rem] text-gold/5 font-serif leading-none">"</div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-emerald-deep font-bold tracking-[0.3em] uppercase mb-4 text-sm">Testimoni Jamaah</h2>
            <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-4">Kata Mereka Tentang Kami</h3>
            <div class="w-24 h-1 bg-emerald-deep mx-auto rounded-full"></div>
        </div>

        <!-- Swiper Testimonial -->
        <div class="swiper testimonialSwiper pb-14 px-4">
            <div class="swiper-wrapper">
                <?php
                $testimoni = query("SELECT * FROM testimoni WHERE is_featured = 1 ORDER BY created_at DESC LIMIT 9");
                
                if (empty($testimoni)) : ?>
                    <div class="swiper-slide text-center py-10">
                        <p class="text-gray-500 text-lg">Belum ada testimoni.</p>
                    </div>
                <?php else : 
                    foreach ($testimoni as $row) :
                ?>
                <!-- Testimonial Slide -->
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 relative h-full flex flex-col" data-aos="fade-up">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="<?= $row['gambar']; ?>" alt="<?= $row['nama_jamaah']; ?>" class="w-14 h-14 rounded-full border-2 border-gold object-cover flex-shrink-0">
                            <div>
                                <h4 class="font-bold text-gray-900"><?= $row['nama_jamaah']; ?></h4>
                                <p class="text-xs text-gray-500"><?= $row['paket_diambil']; ?></p>
                            </div>
                        </div>
                        <div class="mb-4 text-gold text-sm">
                            <?php for($i=0; $i<$row['rating']; $i++) echo '<i class="fa-solid fa-star"></i>'; ?>
                        </div>
                        <p class="text-gray-600 italic leading-relaxed flex-grow">"<?= $row['isi_testimoni']; ?>"</p>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Galeri Kegiatan</h2>
            <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-4">Dokumentasi Perjalanan</h3>
            <div class="w-24 h-1 bg-gold-gradient mx-auto rounded-full"></div>
        </div>

        <div class="swiper gallerySwiper pb-14 px-4">
            <div class="swiper-wrapper">
                <?php
                $galeri = query("SELECT * FROM galeri ORDER BY created_at DESC LIMIT 10");
                
                if (empty($galeri)) : ?>
                    <div class="swiper-slide text-center py-10">
                        <p class="text-gray-500 text-lg">Belum ada foto galeri.</p>
                    </div>
                <?php else : 
                    foreach ($galeri as $row) :
                ?>
                <!-- Gallery Slide -->
                <div class="swiper-slide h-auto">
                    <div class="group relative h-80 rounded-2xl overflow-hidden cursor-pointer shadow-lg" data-aos="fade-up">
                        <img src="<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-6">
                                <span class="text-gold text-xs font-bold uppercase tracking-wider mb-2 block"><?= $row['kategori']; ?></span>
                                <h3 class="text-white font-serif text-xl font-bold"><?= $row['judul']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Pertanyaan Umum</h2>
            <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-4">Sering Ditanyakan</h3>
            <div class="w-24 h-1 bg-gold-gradient mx-auto rounded-full"></div>
        </div>

        <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
            <!-- FAQ 1 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleFAQ('faq1')">
                    <span class="font-bold text-gray-900 text-lg">Apa saja persyaratan pendaftaran Umroh?</span>
                    <i class="fa-solid fa-plus text-gold transition-transform duration-300" id="icon-faq1"></i>
                </button>
                <div id="faq1" class="hidden px-6 py-6 bg-white border-t border-gray-100 text-gray-600 leading-relaxed">
                    Persyaratan umum meliputi Paspor asli yang masih berlaku minimal 7 bulan, Buku Vaksin Meningitis, Pas foto terbaru background putih, KTP & KK asli, dan Buku Nikah bagi suami istri.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleFAQ('faq2')">
                    <span class="font-bold text-gray-900 text-lg">Apakah harga paket sudah termasuk perlengkapan?</span>
                    <i class="fa-solid fa-plus text-gold transition-transform duration-300" id="icon-faq2"></i>
                </button>
                <div id="faq2" class="hidden px-6 py-6 bg-white border-t border-gray-100 text-gray-600 leading-relaxed">
                    Ya, harga paket kami sudah termasuk perlengkapan Umroh lengkap seperti Koper, Tas Paspor, Kain Ihram/Mukena, Bahan Batik, Buku Doa, dan Air Zamzam 5 Liter.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleFAQ('faq3')">
                    <span class="font-bold text-gray-900 text-lg">Bagaimana sistem pembayarannya?</span>
                    <i class="fa-solid fa-plus text-gold transition-transform duration-300" id="icon-faq3"></i>
                </button>
                <div id="faq3" class="hidden px-6 py-6 bg-white border-t border-gray-100 text-gray-600 leading-relaxed">
                    Pembayaran dapat dilakukan dengan DP (Down Payment) minimal Rp 5.000.000 per jamaah untuk booking seat. Pelunasan dilakukan paling lambat 30 hari sebelum keberangkatan.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleFAQ('faq4')">
                    <span class="font-bold text-gray-900 text-lg">Apakah ada pendampingan selama di Tanah Suci?</span>
                    <i class="fa-solid fa-plus text-gold transition-transform duration-300" id="icon-faq4"></i>
                </button>
                <div id="faq4" class="hidden px-6 py-6 bg-white border-t border-gray-100 text-gray-600 leading-relaxed">
                    Tentu saja. Setiap grup akan didampingi oleh Tour Leader dari Jakarta dan Muthawif (pembimbing ibadah) yang berpengalaman dan bermukim di Saudi Arabia selama 24 jam.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFAQ(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
        }
    }
</script>

<!-- Why Choose Us -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Kenapa Memilih Kami?</h2>
                <h3 class="font-serif text-4xl md:text-5xl font-bold text-emerald-deep mb-8 leading-tight">Melayani Tamu Allah dengan <span class="text-gold-gradient">Sepenuh Hati</span></h3>
                <p class="text-gray-600 mb-8 leading-relaxed text-lg font-light">
                    Kami mengerti bahwa perjalanan ke Tanah Suci adalah momen sakral yang dinantikan seumur hidup. Oleh karena itu, kami berkomitmen memberikan pelayanan terbaik agar Anda bisa fokus beribadah dengan khusyuk.
                </p>
                
                <ul class="space-y-6">
                    <li class="flex items-start gap-6 group">
                        <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark mt-1 group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300">
                            <i class="fa-solid fa-check text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 mb-1">Legalitas Terjamin</h4>
                            <p class="text-gray-500">Resmi terdaftar di Kemenag RI sebagai penyelenggara Umroh & Haji.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-6 group">
                        <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark mt-1 group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300">
                            <i class="fa-solid fa-user-tie text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 mb-1">Pembimbing Bersertifikat</h4>
                            <p class="text-gray-500">Didampingi Muthawif berpengalaman lulusan Timur Tengah.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-6 group">
                        <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark mt-1 group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300">
                            <i class="fa-solid fa-star text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 mb-1">Fasilitas Premium</h4>
                            <p class="text-gray-500">Hotel dekat Masjidil Haram & Nabawi, menu masakan Indonesia.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-gold/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-emerald-deep/20 rounded-full blur-3xl"></div>
                
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1537181534458-75f69493922c?q=80&w=1976&auto=format&fit=crop" alt="Pelayanan Jamaah" class="w-full object-cover hover:scale-105 transition-transform duration-700">
                    
                    <!-- Floating Badge -->
                    <div class="absolute bottom-8 right-8 bg-white/90 backdrop-blur p-4 rounded-xl shadow-lg border border-gold/30 max-w-xs">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="User">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="User">
                            </div>
                            <div class="text-xs font-bold text-emerald-deep">+2k Jamaah</div>
                        </div>
                        <p class="text-xs text-gray-600 italic">"Pelayanan sangat memuaskan, hotel dekat sekali dengan masjid."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var swiperTesti = new Swiper(".testimonialSwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    });

    var swiperGallery = new Swiper(".gallerySwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });
</script>

<?php include 'footer.php'; ?>
