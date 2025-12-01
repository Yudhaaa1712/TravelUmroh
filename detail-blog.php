<?php
require 'koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Check if table exists
$check_table = mysqli_query($koneksi, "SHOW TABLES LIKE 'artikel'");
if(mysqli_num_rows($check_table) > 0) {
    $data = query("SELECT * FROM artikel WHERE id = $id");
} else {
    $data = [];
}

if(empty($data)) {
    // Redirect or show 404
    echo "<script>alert('Artikel tidak ditemukan!'); window.location='blog.php';</script>";
    exit;
}

$article = $data[0];
$pageTitle = $article['judul'];
$pageDesc = substr(strip_tags($article['konten']), 0, 155);

include 'header.php';
?>

<!-- Article Header -->
<section class="relative h-[50vh] min-h-[400px] overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo $article['gambar'] ? $article['gambar'] : 'https://via.placeholder.com/1920x1080'; ?>" alt="<?php echo $article['judul']; ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
    </div>
    <div class="absolute bottom-0 left-0 w-full p-8 md:p-16">
        <div class="container mx-auto px-4 max-w-4xl">
            <div data-aos="fade-up">
                <a href="blog.php" class="inline-flex items-center text-white/80 hover:text-gold mb-6 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Blog
                </a>
                <h1 class="font-serif text-3xl md:text-5xl font-bold text-white mb-6 leading-tight text-shadow-gold">
                    <?php echo $article['judul']; ?>
                </h1>
                <div class="flex items-center gap-6 text-white/90 text-sm md:text-base">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-calendar-days text-gold"></i> <?php echo date('d F Y', strtotime($article['created_at'])); ?></span>
                    <span class="flex items-center gap-2"><i class="fa-solid fa-user text-gold"></i> Admin</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <article class="prose prose-lg prose-emerald max-w-none text-gray-700 leading-relaxed font-light">
            <?php echo nl2br($article['konten']); ?>
        </article>
        
        <!-- Share -->
        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-between">
            <span class="font-bold text-emerald-deep">Bagikan Artikel:</span>
            <div class="flex gap-4">
                <a href="#" class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:opacity-80 transition-opacity"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center hover:opacity-80 transition-opacity"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-sky-500 text-white flex items-center justify-center hover:opacity-80 transition-opacity"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
