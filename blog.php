<?php
require 'config/koneksi.php';

$pageTitle = "Blog & Artikel Terbaru";
$pageDesc = "Dapatkan informasi terbaru seputar tips umroh, haji, dan berita terkini dari Ababil Tour.";

include 'includes/header.php';

// Check if table exists
$check_table = mysqli_query($koneksi, "SHOW TABLES LIKE 'artikel'");
if(mysqli_num_rows($check_table) > 0) {
    $articles = query("SELECT * FROM artikel ORDER BY created_at DESC");
} else {
    $articles = [];
}
?>

<!-- Page Header -->
<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?= getGambar('blog_hero', 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=2070'); ?>" alt="Blog" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-emerald-deep/80"></div>
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')]"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="font-serif text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up">Artikel & Berita</h1>
        <p class="text-gold-light text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Informasi terkini seputar ibadah Umroh, Haji, dan tips perjalanan islami.</p>
    </div>
</section>

<!-- Blog List -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php if(empty($articles)): ?>
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada artikel yang diterbitkan.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($articles as $a): ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group" data-aos="fade-up">
                        <div class="relative h-56 overflow-hidden">
                            <img src="<?php echo !empty($a['gambar']) ? $a['gambar'] : 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=800&auto=format&fit=crop'; ?>" alt="<?php echo $a['judul']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-gold text-emerald-deep text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                <?php echo date('d M Y', strtotime($a['created_at'])); ?>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-serif text-xl font-bold text-emerald-deep mb-3 line-clamp-2 group-hover:text-gold-dark transition-colors">
                                <a href="detail-blog.php?id=<?php echo $a['id']; ?>">
                                    <?php echo $a['judul']; ?>
                                </a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3 text-sm leading-relaxed">
                                <?php echo substr(strip_tags($a['konten']), 0, 150) . '...'; ?>
                            </p>
                            <a href="detail-blog.php?id=<?php echo $a['id']; ?>" class="inline-flex items-center text-gold-dark font-semibold text-sm hover:text-emerald-deep transition-colors">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
