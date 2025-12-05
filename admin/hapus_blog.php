<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "travel_umroh");
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('ID tidak valid!'); document.location.href='blog.php';</script>";
    exit;
}

// Get image path to delete file
$result = mysqli_query($koneksi, "SELECT gambar FROM artikel WHERE id = $id");
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $gambar = $data['gambar'];
    
    if (!empty($gambar)) {
        $imagePath = dirname(__DIR__) . '/' . $gambar;
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
    }
}

if (mysqli_query($koneksi, "DELETE FROM artikel WHERE id = $id")) {
    echo "<script>alert('Artikel berhasil dihapus!'); document.location.href='blog.php';</script>";
} else {
    echo "<script>alert('Artikel gagal dihapus!'); document.location.href='blog.php';</script>";
}
?>
