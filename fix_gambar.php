<?php
/**
 * Script untuk memperbaiki path gambar di database
 * Jalankan sekali untuk fix gambar yang sudah diupload
 */
require 'koneksi.php';

echo "<h2>Fix Gambar Path</h2>";

// Ambil semua gambar
$result = mysqli_query($koneksi, "SELECT * FROM pengaturan_gambar");

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $gambar = $row['gambar'];
        $new_gambar = $gambar;
        
        // Skip jika sudah URL external
        if (preg_match('/^https?:\/\//', $gambar)) {
            echo "<p>✓ {$row['kode']}: URL external, tidak perlu fix</p>";
            continue;
        }
        
        // Hapus prefix yang salah
        $new_gambar = preg_replace('/^(\.\.\/|\.\/|admin\/)/', '', $new_gambar);
        
        // Pastikan dimulai dengan /
        if (substr($new_gambar, 0, 1) !== '/') {
            $new_gambar = '/' . $new_gambar;
        }
        
        if ($gambar !== $new_gambar) {
            // Update database
            $id = $row['id'];
            mysqli_query($koneksi, "UPDATE pengaturan_gambar SET gambar = '$new_gambar' WHERE id = $id");
            echo "<p>✓ Fixed {$row['kode']}: <code>$gambar</code> → <code>$new_gambar</code></p>";
        } else {
            echo "<p>✓ {$row['kode']}: Path sudah benar</p>";
        }
    }
}

echo "<br><p><strong>Selesai!</strong> <a href='admin/pengaturan_gambar.php'>Kembali ke Admin</a></p>";
?>
