<?php
/**
 * Auto-Generate XML Sitemap untuk Programmatic SEO
 * Akses: /sitemap.php atau /sitemap.xml (via .htaccess)
 */

require_once 'includes/cities_data.php';

// Set header XML
header('Content-Type: application/xml; charset=utf-8');

// Base URL website
$baseUrl = 'https://ababiltour.com';

// Tanggal hari ini untuk lastmod
$today = date('Y-m-d');

// Ambil semua kota
$cities = getAllCities();

// Output XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    
    <!-- Homepage -->
    <url>
        <loc><?= $baseUrl; ?>/</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <!-- Main Pages -->
    <url>
        <loc><?= $baseUrl; ?>/paket.php</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    
    <url>
        <loc><?= $baseUrl; ?>/haji.php</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc><?= $baseUrl; ?>/galeri.php</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    
    <url>
        <loc><?= $baseUrl; ?>/testimoni.php</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    
    <url>
        <loc><?= $baseUrl; ?>/blog.php</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc><?= $baseUrl; ?>/kontak.php</loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    
    <!-- Programmatic SEO: City Landing Pages -->
<?php foreach ($cities as $slug => $city): ?>
    <url>
        <loc><?= $baseUrl; ?>/travel-umrah-<?= $slug; ?></loc>
        <lastmod><?= $today; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        <image:image>
            <image:loc><?= $baseUrl; ?>/images/umrah-<?= $slug; ?>.jpg</image:loc>
            <image:title>Paket Umrah dari <?= htmlspecialchars($city['name']); ?></image:title>
            <image:caption>Travel Umrah terpercaya untuk jamaah <?= htmlspecialchars($city['name']); ?>, <?= htmlspecialchars($city['province']); ?></image:caption>
        </image:image>
    </url>
<?php endforeach; ?>
    
</urlset>
