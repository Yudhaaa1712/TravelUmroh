<?php 
$pageTitle = "Tentang Kami - Profil Perusahaan";
$pageDesc = "Mengenal lebih dekat Ababil Tour & Hajj, penyelenggara perjalanan ibadah umroh dan haji terpercaya sejak 2010.";
include 'header.php'; 
?>

<!-- Hero Section -->
<section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop" alt="Tentang Kami" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>
    </div>
    <div class="relative z-10 text-center px-4" data-aos="fade-up">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-4">Tentang Kami</h1>
        <p class="text-xl text-gold-light max-w-2xl mx-auto">Mengenal lebih dekat mitra perjalanan ibadah terpercaya Anda.</p>
    </div>
</section>

<!-- Company Profile -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Profil Perusahaan</h2>
                <h3 class="font-serif text-4xl font-bold text-emerald-deep mb-6">Ababil Tour & Hajj</h3>
                <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                    Berdiri sejak tahun 2010, Ababil Tour & Hajj telah melayani ribuan jamaah dari seluruh Indonesia untuk menunaikan ibadah Umroh dan Haji. Kami berkomitmen untuk memberikan pelayanan prima dengan mengutamakan kenyamanan, keamanan, dan kekhusyukan ibadah.
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                    Dengan motto <span class="text-gold-dark font-bold italic">"Melayani Tamu Allah Sepenuh Hati"</span>, kami terus berinovasi menghadirkan paket-paket perjalanan yang berkualitas, fasilitas hotel bintang lima yang dekat dengan Masjidil Haram dan Masjid Nabawi, serta bimbingan ibadah sesuai sunnah.
                </p>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="border-l-4 border-gold pl-4">
                        <h4 class="font-bold text-2xl text-emerald-deep">15+</h4>
                        <p class="text-sm text-gray-500">Tahun Pengalaman</p>
                    </div>
                    <div class="border-l-4 border-gold pl-4">
                        <h4 class="font-bold text-2xl text-emerald-deep">10k+</h4>
                        <p class="text-sm text-gray-500">Jamaah Berangkat</p>
                    </div>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-gold/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-emerald-deep/10 rounded-full blur-2xl"></div>
                <img src="https://images.unsplash.com/photo-1577046848358-4623c085f0ea?q=80&w=2070&auto=format&fit=crop" alt="Office Team" class="relative rounded-2xl shadow-2xl w-full object-cover h-[500px]">
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-gold-gradient relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-5"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Vision -->
            <div class="bg-white p-10 rounded-2xl shadow-xl border-t-4 border-emerald-deep" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-emerald-deep rounded-full flex items-center justify-center text-gold mb-6 text-2xl">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h3 class="font-serif text-3xl font-bold text-gray-900 mb-4">Visi Kami</h3>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi penyelenggara perjalanan ibadah Umroh dan Haji yang amanah, profesional, dan terdepan di Indonesia, serta memberikan pelayanan berkualitas global demi kenyamanan tamu-tamu Allah.
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-white p-10 rounded-2xl shadow-xl border-t-4 border-emerald-deep" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-emerald-deep rounded-full flex items-center justify-center text-gold mb-6 text-2xl">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h3 class="font-serif text-3xl font-bold text-gray-900 mb-4">Misi Kami</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-gold mt-1"></i>
                        <span>Memberikan pelayanan terbaik dengan fasilitas premium.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-gold mt-1"></i>
                        <span>Membimbing jamaah beribadah sesuai tuntunan Al-Quran dan Sunnah.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-gold mt-1"></i>
                        <span>Menjamin kepastian keberangkatan dan keamanan jamaah.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-gold mt-1"></i>
                        <span>Membangun silaturahmi dan kekeluargaan dengan para jamaah.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CEO Message / Leadership -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-50 rounded-3xl p-8 md:p-16 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-gold/10 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
            
            <div class="flex flex-col md:flex-row items-center gap-12 relative z-10">
                <div class="w-48 h-48 md:w-64 md:h-64 shrink-0 rounded-full overflow-hidden border-4 border-gold shadow-xl" data-aos="zoom-in">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop" alt="CEO" class="w-full h-full object-cover">
                </div>
                <div class="text-center md:text-left" data-aos="fade-left">
                    <i class="fa-solid fa-quote-left text-4xl text-gold/30 mb-4 block"></i>
                    <h3 class="font-serif text-2xl md:text-3xl font-bold text-emerald-deep mb-4 italic">
                        "Kami tidak hanya mengantar Anda ke Tanah Suci, tetapi kami menemani perjalanan spiritual Anda untuk mencapai kemabruran."
                    </h3>
                    <div class="mt-6">
                        <h4 class="font-bold text-xl text-gray-900">H. Muhammad Abdullah, Lc. MA</h4>
                        <p class="text-gold-dark font-medium">Direktur Utama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Legalitas -->
<section class="py-20 bg-emerald-deep text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-gold font-bold tracking-[0.3em] uppercase mb-4 text-sm">Legalitas & Izin</h2>
            <h3 class="font-serif text-3xl md:text-4xl font-bold">Resmi & Terpercaya</h3>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-center opacity-80">
            <!-- Placeholders for logos -->
            <div class="p-6 bg-white/5 rounded-xl hover:bg-white/10 transition-colors" data-aos="fade-up" data-aos-delay="100">
                <i class="fa-solid fa-file-shield text-5xl mb-4 text-gold"></i>
                <p class="text-sm font-bold">SK Kemenag RI</p>
                <p class="text-xs text-gray-400">No. 123 Tahun 2020</p>
            </div>
            <div class="p-6 bg-white/5 rounded-xl hover:bg-white/10 transition-colors" data-aos="fade-up" data-aos-delay="200">
                <i class="fa-solid fa-plane-circle-check text-5xl mb-4 text-gold"></i>
                <p class="text-sm font-bold">IATA Accredited</p>
                <p class="text-xs text-gray-400">International Air Transport</p>
            </div>
            <div class="p-6 bg-white/5 rounded-xl hover:bg-white/10 transition-colors" data-aos="fade-up" data-aos-delay="300">
                <i class="fa-solid fa-handshake text-5xl mb-4 text-gold"></i>
                <p class="text-sm font-bold">Anggota ASITA</p>
                <p class="text-xs text-gray-400">Association of Tours & Travel</p>
            </div>
            <div class="p-6 bg-white/5 rounded-xl hover:bg-white/10 transition-colors" data-aos="fade-up" data-aos-delay="400">
                <i class="fa-solid fa-kaaba text-5xl mb-4 text-gold"></i>
                <p class="text-sm font-bold">Provider Visa</p>
                <p class="text-xs text-gray-400">Direct Saudi Arabia</p>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
