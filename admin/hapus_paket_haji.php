<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "travel_umroh");
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('ID tidak valid!'); document.location.href='paket_haji.php';</script>";
    exit;
}

if (mysqli_query($koneksi, "DELETE FROM paket_haji WHERE id = $id")) {
    echo "<script>alert('Data berhasil dihapus!'); document.location.href='paket_haji.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); document.location.href='paket_haji.php';</script>";
}
?>
