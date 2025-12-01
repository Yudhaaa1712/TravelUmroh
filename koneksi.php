<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "travel_umroh";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Function to query and return array
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// Function to upload image
function upload($target_dir = 'uploads/') {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Check if image is uploaded
    if( $error === 4 ) {
        return false;
    }

    // Check valid extension
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    // Check size (max 2MB)
    if( $ukuranFile > 2000000 ) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    // Generate new filename
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // Ensure directory exists
    if (!file_exists('../' . $target_dir)) {
        mkdir('../' . $target_dir, 0777, true);
    }

    move_uploaded_file($tmpName, '../' . $target_dir . $namaFileBaru);

    return $target_dir . $namaFileBaru;
}
?>
