<?php 
$pageTitle = "Testimoni Jamaah";
$pageDesc = "Kisah inspiratif dan pengalaman nyata para jamaah yang telah berangkat umroh dan haji bersama kami.";
include 'header.php'; 
?>

<!-- Hero Section -->
<section class="relative h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?= getGambar('testimoni_hero', 'https://images.unsplash.com/photo-1565019001609-9af23d80a1b4?q=80&w=2070'); ?>" alt="Testimoni" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/60"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>
    </div>
    <div class="relative z-10 text-center px-4" data-aos="fade-up">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-4">Testimoni Jamaah</h1>
        <p class="text-xl text-gold-light max-w-2xl mx-auto">Kisah inspiratif dan pengalaman spiritual para tamu Allah bersama Ababil Tour.</p>
    </div>
</section>

<!-- Testimonial Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16 border-b border-gray-200 pb-12">
            <div class="text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="text-4xl font-serif font-bold text-gold-dark mb-2">4.9/5</div>
                <div class="text-sm text-gray-500 uppercase tracking-wider">Rating Google</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-serif font-bold text-gold-dark mb-2">10k+</div>
                <div class="text-sm text-gray-500 uppercase tracking-wider">Jamaah Puas</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-serif font-bold text-gold-dark mb-2">98%</div>
                <div class="text-sm text-gray-500 uppercase tracking-wider">Repeat Order</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl font-serif font-bold text-gold-dark mb-2">24/7</div>
                <div class="text-sm text-gray-500 uppercase tracking-wider">Support</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            require_once 'koneksi.php';
            $testimoni = query("SELECT * FROM testimoni ORDER BY created_at DESC");
            
            if (empty($testimoni)) : ?>
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada testimoni.</p>
                </div>
            <?php else : 
                foreach ($testimoni as $row) :
            ?>
            <!-- Card Dynamic -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 relative group hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up">
                <div class="absolute top-6 right-8 text-6xl text-gold/10 font-serif">"</div>
                <div class="flex items-center gap-4 mb-6">
                    <img src="<?= !empty($row['gambar']) ? $row['gambar'] : 'https://i.pravatar.cc/100?u=' . $row['id']; ?>" alt="<?= $row['nama_jamaah']; ?>" class="w-16 h-16 rounded-full object-cover border-2 border-gold p-1">
                    <div>
                        <h4 class="font-bold text-lg text-emerald-deep"><?= $row['nama_jamaah']; ?></h4>
                        <p class="text-xs text-gray-500 uppercase tracking-wider"><?= $row['paket_diambil']; ?></p>
                    </div>
                </div>
                <div class="flex text-gold mb-4 text-sm">
                    <?php for($i=0; $i<$row['rating']; $i++) echo '<i class="fa-solid fa-star"></i>'; ?>
                </div>
                <p class="text-gray-600 italic leading-relaxed">"<?= $row['isi_testimoni']; ?>"</p>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center gap-3">
            <button class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:border-gold hover:text-gold transition-all hover:shadow-md">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="w-12 h-12 rounded-full bg-gold-gradient text-emerald-deep flex items-center justify-center font-bold shadow-lg transform scale-110">1</button>
            <button class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:border-gold hover:text-gold transition-all hover:shadow-md">2</button>
            <button class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:border-gold hover:text-gold transition-all hover:shadow-md">3</button>
            <button class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:border-gold hover:text-gold transition-all hover:shadow-md">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-emerald-deep relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="font-serif text-3xl md:text-4xl font-bold text-white mb-6">Ingin Merasakan Pengalaman Serupa?</h2>
        <p class="text-gold-light text-lg mb-8 max-w-2xl mx-auto">Segera daftarkan diri Anda dan keluarga untuk keberangkatan selanjutnya. Kursi terbatas!</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="paket.php" class="px-8 py-4 bg-gold-gradient text-emerald-deep font-bold rounded-full hover:shadow-lg hover:scale-105 transition-all">
                Lihat Jadwal Paket
            </a>
            <a href="https://wa.me/6281234567890" class="px-8 py-4 border border-gold text-gold font-bold rounded-full hover:bg-gold hover:text-emerald-deep transition-all">
                Konsultasi Gratis <i class="fa-brands fa-whatsapp ml-2"></i>
            </a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
