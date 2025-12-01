<?php 
$pageTitle = "Hubungi Kami";
$pageDesc = "Informasi kontak, alamat kantor, dan layanan konsultasi 24 jam Ababil Tour & Hajj Pekanbaru.";
include 'header.php'; 
?>

<!-- Hero Section -->
<section class="relative h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gold-gradient"></div>
    </div>
    <div class="relative z-10 text-center px-4" data-aos="fade-up">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-emerald-deep mb-4">Hubungi Kami</h1>
        <p class="text-xl text-emerald-deep max-w-2xl mx-auto">Kami siap melayani kebutuhan informasi perjalanan ibadah Anda.</p>
    </div>
</section>

<!-- Contact Content -->
<section class="py-20 bg-white relative">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Contact Info & Map -->
            <div data-aos="fade-right">
                <h2 class="text-gold-dark font-bold tracking-[0.3em] uppercase mb-4 text-sm">Informasi Kontak</h2>
                <h3 class="font-serif text-4xl font-bold text-emerald-deep mb-8">Kunjungi Kantor Kami</h3>
                
                <div class="space-y-8 mb-12">
                    <div class="flex items-start gap-6 group">
                        <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shrink-0">
                            <i class="fa-solid fa-location-dot text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 mb-2">Alamat Kantor</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Jl. Jend. Sudirman No. 45<br>
                                Pekanbaru, Riau<br>
                                28282
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-6 group">
                        <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shrink-0">
                            <i class="fa-solid fa-phone text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 mb-2">Telepon & WhatsApp</h4>
                            <p class="text-gray-600 mb-1">+62 21 723 4567 (Kantor)</p>
                            <p class="text-gray-600">+62 812 3456 7890 (WhatsApp)</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6 group">
                        <div class="w-14 h-14 rounded-full bg-gold/10 flex items-center justify-center text-gold-dark group-hover:bg-gold-gradient group-hover:text-emerald-deep transition-all duration-300 shrink-0">
                            <i class="fa-solid fa-envelope text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 mb-2">Email</h4>
                            <p class="text-gray-600">info@ababiltour.com</p>
                            <p class="text-gray-600">cs@ababiltour.com</p>
                        </div>
                    </div>
                </div>

                <!-- Map Embed -->
                <div class="rounded-2xl overflow-hidden shadow-lg border-2 border-gold/30 h-[300px] relative group">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127669.0506076352!2d101.37163614068228!3d0.505086204068228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab80690ee7b1%3A0x94dde92c3823dbe4!2sPekanbaru%2C%20Pekanbaru%20City%2C%20Riau!5e0!3m2!1sen!2sid!4v1625637199547!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div class="absolute inset-0 pointer-events-none border-4 border-transparent group-hover:border-gold/50 transition-colors duration-300 rounded-2xl"></div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-50 p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100" data-aos="fade-left">
                <h3 class="font-serif text-3xl font-bold text-emerald-deep mb-6">Kirim Pesan</h3>
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gold focus:ring-2 focus:ring-gold/20 outline-none transition-all" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">No. WhatsApp</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gold focus:ring-2 focus:ring-gold/20 outline-none transition-all" placeholder="0812...">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gold focus:ring-2 focus:ring-gold/20 outline-none transition-all" placeholder="email@contoh.com">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">Subjek</label>
                        <select id="subject" name="subject" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gold focus:ring-2 focus:ring-gold/20 outline-none transition-all bg-white">
                            <option value="">Pilih Topik</option>
                            <option value="umroh">Paket Umroh</option>
                            <option value="haji">Paket Haji</option>
                            <option value="partnership">Kerjasama</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-gold focus:ring-2 focus:ring-gold/20 outline-none transition-all" placeholder="Tulis pesan Anda disini..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-gold-gradient text-emerald-deep font-bold rounded-lg hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
                        Kirim Pesan <i class="fa-solid fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
