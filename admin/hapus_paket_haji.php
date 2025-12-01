<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require '../koneksi.php';

$id = $_GET['id'];

if (mysqli_query($koneksi, "DELETE FROM paket_haji WHERE id = $id")) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'paket_haji.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'paket_haji.php';
    </script>";
}
?>
