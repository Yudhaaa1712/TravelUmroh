<?php include 'header.php'; ?>

<!-- Hero Section -->
<section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gold-gradient"></div>
    </div>
    <div class="relative z-10 text-center px-4" data-aos="fade-up">
        <h1 class="font-serif text-5xl md:text-6xl font-bold text-emerald-deep mb-4">Galeri Momen</h1>
        <p class="text-xl text-emerald-deep max-w-2xl mx-auto">Dokumentasi perjalanan ibadah para tamu Allah bersama Ababil Tour.</p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Tabs (Visual Only for now) -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
            <button class="px-6 py-2 rounded-full bg-gold text-white font-bold shadow-lg">Semua</button>
            <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gold hover:text-white transition-colors">Makkah</button>
            <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gold hover:text-white transition-colors">Madinah</button>
            <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gold hover:text-white transition-colors">Jamaah</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="gallery-grid">
            <?php
            require_once 'koneksi.php';
            $galeri = query("SELECT * FROM galeri ORDER BY created_at DESC");
            
            if (empty($galeri)) : ?>
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada foto di galeri.</p>
                </div>
            <?php else : 
                foreach ($galeri as $row) :
            ?>
            <!-- Gallery Item -->
            <div class="group relative h-80 rounded-2xl overflow-hidden cursor-pointer shadow-lg" data-aos="fade-up">
                <img src="<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 p-6">
                        <span class="text-gold text-xs font-bold uppercase tracking-wider mb-2 block"><?= $row['kategori']; ?></span>
                        <h3 class="text-white font-serif text-xl font-bold"><?= $row['judul']; ?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 z-[60] bg-black/95 hidden flex items-center justify-center p-4">
    <button onclick="closeModal()" class="absolute top-6 right-6 text-white hover:text-gold transition-colors">
        <i class="fa-solid fa-xmark text-4xl"></i>
    </button>
    <div class="max-w-5xl w-full max-h-[90vh] relative">
        <img id="modalImage" src="" alt="Full View" class="w-full h-full object-contain max-h-[85vh] rounded-lg shadow-2xl border border-gold/20">
        <p id="modalCaption" class="text-center text-white mt-4 font-serif text-xl"></p>
    </div>
</div>

<script>
    function openModal(element) {
        const img = element.querySelector('img');
        const caption = element.querySelector('p').innerText;
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        
        modalImg.src = img.src;
        modalCaption.innerText = caption;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Close on click outside
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

<?php include 'footer.php'; ?>
