<?php
include 'koneksi.php';

$sql = "CREATE TABLE IF NOT EXISTS artikel (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    konten TEXT NOT NULL,
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($koneksi, $sql)) {
    echo "Tabel artikel berhasil dibuat.";
    
    // Insert dummy data if empty
    $check = mysqli_query($koneksi, "SELECT * FROM artikel");
    if (mysqli_num_rows($check) == 0) {
        $judul = "Tips Persiapan Umroh Pertama Kali";
        $slug = "tips-persiapan-umroh-pertama-kali";
        $konten = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $gambar = "uploads/blog-dummy.jpg"; // Placeholder
        
        $insert = "INSERT INTO artikel (judul, slug, konten, gambar) VALUES ('$judul', '$slug', '$konten', '$gambar')";
        mysqli_query($koneksi, $insert);
        echo "<br>Data dummy berhasil ditambahkan.";
    }
} else {
    echo "Error creating table: " . mysqli_error($koneksi);
}
?>
