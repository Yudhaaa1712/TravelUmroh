<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require '../koneksi.php';

$id = $_GET['id'];

if (mysqli_query($koneksi, "DELETE FROM galeri WHERE id = $id")) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'galeri.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'galeri.php';
    </script>";
}
?>
