<?php
require 'includes/header.php';

$id = $_GET["id"];

if( !isset($id) ) {
    header("Location: blog.php");
    exit;
}

// Get image path to delete file
$data = query("SELECT gambar FROM artikel WHERE id = $id")[0];
$gambar = $data['gambar'];

if( delete_file($gambar) ) {
    // File deleted or didn't exist
}

// Helper function to delete file if exists
function delete_file($path) {
    if(file_exists('../' . $path)) {
        unlink('../' . $path);
        return true;
    }
    return false;
}

$query = "DELETE FROM artikel WHERE id = $id";

if( mysqli_query($koneksi, $query) ) {
    echo "
        <script>
            alert('Artikel berhasil dihapus!');
            document.location.href = 'blog.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Artikel gagal dihapus!');
            document.location.href = 'blog.php';
        </script>
    ";
}
?>
