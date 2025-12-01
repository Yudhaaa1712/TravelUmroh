<?php include 'header.php'; ?>

<!-- Page Header -->
<section class="relative h-[60vh] overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop" alt="Detail Paket" class="w-full h-full object-cover animate-float" style="animation-duration: 30s; transform: scale(1.1);">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/90"></div>
    </div>
    <div class="absolute bottom-0 left-0 w-full p-8 md:p-16">
        <div class="container mx-auto px-4">
            <div data-aos="fade-up">
                <span class="bg-gold-gradient text-emerald-deep px-4 py-1 rounded-full text-sm font-bold uppercase tracking-widest mb-6 inline-block shadow-lg">Promo Spesial</span>
                <h1 class="font-serif text-4xl md:text-6xl font-bold text-white mb-4 text-shadow-gold">Paket Umroh Reguler 9 Hari</h1>
                <div class="flex items-center gap-6 text-white/90 text-lg">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-calendar-days text-gold"></i> 15 Agustus 2025</span>
                    <span class="hidden md:flex items-center gap-2"><i class="fa-solid fa-plane text-gold"></i> Saudi Airlines</span>
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
                
                <!-- Gallery -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100" data-aos="fade-up">
                    <h3 class="font-serif text-2xl font-bold text-emerald-deep mb-6 border-b border-gray-100 pb-4 flex items-center gap-3">
                        <i class="fa-solid fa-images text-gold"></i> Galeri Perjalanan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="overflow-hidden rounded-xl group relative h-64">
                            <img src="https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 cursor-pointer">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                        </div>
                        <div class="overflow-hidden rounded-xl group relative h-64">
                            <img src="https://images.unsplash.com/photo-1565552629477-ginv9382?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 cursor-pointer">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                        </div>
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
                                <p class="text-sm text-gray-500 leading-relaxed">Saudi Airlines (Direct Jeddah)<br>Tanpa Transit</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 group">
                            <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark text-2xl group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shadow-sm">
                                <i class="fa-solid fa-hotel"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">Hotel Makkah</h4>
                                <p class="text-sm text-gray-500 leading-relaxed">Anjum Hotel (★5)<br>100m dari Masjidil Haram</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 group">
                            <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark text-2xl group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shadow-sm">
                                <i class="fa-solid fa-mosque"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">Hotel Madinah</h4>
                                <p class="text-sm text-gray-500 leading-relaxed">Rove Hotel (★5)<br>50m dari Masjid Nabawi</p>
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

                <!-- Itinerary Accordion -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100" data-aos="fade-up">
                    <h3 class="font-serif text-2xl font-bold text-emerald-deep mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                        <i class="fa-solid fa-route text-gold"></i> Rencana Perjalanan
                    </h3>
                    <div class="space-y-4">
                        <!-- Day 1 -->
                        <div class="border border-gray-100 rounded-xl overflow-hidden hover:border-gold/30 transition-colors">
                            <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50/50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleAccordion('day1')">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-full bg-emerald-deep text-white flex items-center justify-center text-sm font-bold">1</span>
                                    <span class="font-bold text-gray-900 text-lg">Jakarta - Jeddah - Makkah</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-gray-400 transition-transform" id="icon-day1"></i>
                            </button>
                            <div id="day1" class="hidden px-6 py-6 bg-white border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed pl-12">Berkumpul di Bandara Soekarno Hatta 4 jam sebelum keberangkatan di Lounge Executive. Proses check-in dan imigrasi dibantu tim handling. Penerbangan menuju Jeddah. Tiba di Jeddah, ambil miqat, lalu menuju Makkah menggunakan Bus Luxury untuk Check-in hotel dan melaksanakan Umroh pertama.</p>
                            </div>
                        </div>
                        
                        <!-- Day 2 -->
                        <div class="border border-gray-100 rounded-xl overflow-hidden hover:border-gold/30 transition-colors">
                            <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50/50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleAccordion('day2')">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-full bg-emerald-deep text-white flex items-center justify-center text-sm font-bold">2</span>
                                    <span class="font-bold text-gray-900 text-lg">Memperbanyak Ibadah di Makkah</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-gray-400 transition-transform" id="icon-day2"></i>
                            </button>
                            <div id="day2" class="hidden px-6 py-6 bg-white border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed pl-12">Memperbanyak ibadah di Masjidil Haram (Shalat fardhu berjamaah, Tawaf sunnah, Tilawah Al-Qur'an). Kajian rutin bersama Ustadz pembimbing setelah Ashar.</p>
                            </div>
                        </div>

                        <!-- Day 3 -->
                        <div class="border border-gray-100 rounded-xl overflow-hidden hover:border-gold/30 transition-colors">
                            <button class="w-full px-6 py-5 text-left bg-gray-50 hover:bg-yellow-50/50 flex justify-between items-center focus:outline-none transition-colors" onclick="toggleAccordion('day3')">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-full bg-emerald-deep text-white flex items-center justify-center text-sm font-bold">3</span>
                                    <span class="font-bold text-gray-900 text-lg">Ziarah Kota Makkah</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-gray-400 transition-transform" id="icon-day3"></i>
                            </button>
                            <div id="day3" class="hidden px-6 py-6 bg-white border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed pl-12">Mengunjungi Jabal Tsur, Padang Arafah, Jabal Rahmah, Muzdalifah, Mina, dan Jabal Nur. Bagi yang ingin Umroh kedua bisa mengambil miqat di Ji'ranah. Makan siang menu khas Timur Tengah.</p>
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
                            <h2 class="text-5xl font-serif font-bold text-emerald-deep mb-2">Rp 28.5<span class="text-2xl">Jt</span></h2>
                            <p class="text-xs text-gold-dark font-medium bg-yellow-50 inline-block px-2 py-1 rounded">*Harga dapat berubah sewaktu-waktu</p>
                        </div>

                        <div class="bg-emerald-50/50 border border-emerald-100 p-5 rounded-xl mb-8 flex items-center justify-between">
                            <span class="text-gray-700 font-medium flex items-center gap-2"><i class="fa-solid fa-chair text-emerald-deep"></i> Sisa Seat</span>
                            <span class="text-emerald-deep font-bold text-xl">12 Kursi</span>
                        </div>

                        <div class="space-y-4">
                            <a href="https://wa.me/6281234567890?text=Assalamualaikum,%20saya%20tertarik%20dengan%20Paket%20Umroh%20Reguler%209%20Hari" class="block w-full py-4 bg-gold-gradient text-emerald-deep font-bold text-center rounded-xl hover:shadow-lg hover:scale-105 transition-all shadow-md group">
                                <span class="flex items-center justify-center gap-2">
                                    <i class="fa-brands fa-whatsapp text-xl"></i> Booking via WhatsApp
                                </span>
                            </a>
                            <button class="block w-full py-4 border-2 border-gold text-gold-dark font-bold text-center rounded-xl hover:bg-gold hover:text-white hover:border-transparent transition-all">
                                <i class="fa-solid fa-file-pdf mr-2"></i> Download Brosur PDF
                            </button>
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

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>

<?php include 'footer.php'; ?>
