<?php
/**
 * DELETE UMRAH PACKAGE
 */
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Connect to database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "travel_umroh";
$koneksi = mysqli_connect($host, $user, $pass, $db);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('ID tidak valid!'); document.location.href='paket_umroh.php';</script>";
    exit;
}

// Get image path before delete
$result = mysqli_query($koneksi, "SELECT gambar FROM paket_umroh WHERE id = $id");
$paket = mysqli_fetch_assoc($result);

// Delete from database
if (mysqli_query($koneksi, "DELETE FROM paket_umroh WHERE id = $id")) {
    // Delete image file if local
    if ($paket && !empty($paket['gambar']) && !preg_match('/^https?:\/\//', $paket['gambar'])) {
        $imagePath = dirname(__DIR__) . '/' . $paket['gambar'];
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
    }
    
    echo "<script>alert('Paket berhasil dihapus!'); document.location.href='paket_umroh.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus paket: " . mysqli_error($koneksi) . "'); document.location.href='paket_umroh.php';</script>";
}
?>
