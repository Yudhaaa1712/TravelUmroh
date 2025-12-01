<?php
header('Content-type: application/xml');
include 'koneksi.php';

// Detect Base URL dynamically
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['PHP_SELF']);
$base_url = $protocol . "://" . $host . $path . "/";
// Ensure no double slashes at the end if path is root
if (substr($base_url, -2) == "//") {
    $base_url = substr($base_url, 0, -1);
}

echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";

// Static Pages
$pages = ['index.php', 'tentang-kami.php', 'paket.php', 'haji.php', 'galeri.php', 'testimoni.php', 'kontak.php', 'blog.php'];

foreach($pages as $page) {
    echo "<url>";
    echo "<loc>" . $base_url . $page . "</loc>";
    echo "<changefreq>monthly</changefreq>";
    echo "<priority>0.8</priority>";
    echo "</url>";
}

// Paket Umroh
$query = mysqli_query($koneksi, "SELECT id, nama_paket FROM paket_umroh");
if($query) {
    while($row = mysqli_fetch_assoc($query)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['nama_paket'])));
        echo "<url>";
        echo "<loc>" . $base_url . "paket/" . $row['id'] . "/" . $slug . "</loc>";
        echo "<changefreq>weekly</changefreq>";
        echo "<priority>0.9</priority>";
        echo "</url>";
    }
}

// Blog Articles
$check_table = mysqli_query($koneksi, "SHOW TABLES LIKE 'artikel'");
if(mysqli_num_rows($check_table) > 0) {
    $query = mysqli_query($koneksi, "SELECT id, judul, created_at FROM artikel");
    if($query) {
        while($row = mysqli_fetch_assoc($query)) {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['judul'])));
            echo "<url>";
            echo "<loc>" . $base_url . "blog/" . $row['id'] . "/" . $slug . "</loc>";
            echo "<lastmod>" . date('Y-m-d', strtotime($row['created_at'])) . "</lastmod>";
            echo "<changefreq>monthly</changefreq>";
            echo "<priority>0.7</priority>";
            echo "</url>";
        }
    }
}

echo "</urlset>";
?>
