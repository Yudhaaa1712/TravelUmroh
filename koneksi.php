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

// Function to upload image with SEO friendly name & WebP support
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
    $ekstensiAsli = strtolower(end($ekstensiGambar));
    
    if( !in_array($ekstensiAsli, $ekstensiGambarValid) ) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    // Check size (max 2MB)
    if( $ukuranFile > 2000000 ) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    // SEO Friendly Filename: nama-file-asli-uniqid
    $namaBase = pathinfo($namaFile, PATHINFO_FILENAME);
    // Sanitize: remove special chars, replace spaces with dashes
    $namaBase = preg_replace('/[^a-zA-Z0-9]/', '-', $namaBase);
    $namaBase = preg_replace('/-+/', '-', $namaBase); // Remove duplicate dashes
    $namaBase = trim($namaBase, '-');
    $namaBase = strtolower($namaBase);

    // Ensure directory exists
    if (!file_exists('../' . $target_dir)) {
        mkdir('../' . $target_dir, 0777, true);
    }

    // Try to convert to WebP
    if (function_exists('imagewebp') && in_array($ekstensiAsli, ['jpg', 'jpeg', 'png'])) {
        $namaFileBaru = $namaBase . '-' . uniqid() . '.webp';
        $targetPath = '../' . $target_dir . $namaFileBaru;
        
        $image = null;
        if ($ekstensiAsli == 'jpeg' || $ekstensiAsli == 'jpg') 
            $image = imagecreatefromjpeg($tmpName);
        elseif ($ekstensiAsli == 'png')
            $image = imagecreatefrompng($tmpName);
            
        if ($image) {
            // Convert to WebP with 80% quality
            imagewebp($image, $targetPath, 80);
            imagedestroy($image);
            return $target_dir . $namaFileBaru;
        }
    }

    // Fallback: Use original extension if WebP conversion fails or not supported
    $namaFileBaru = $namaBase . '-' . uniqid() . '.' . $ekstensiAsli;
    move_uploaded_file($tmpName, '../' . $target_dir . $namaFileBaru);

    return $target_dir . $namaFileBaru;
}
?>
