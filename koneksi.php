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
if (!function_exists('query')) {
    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
}

// Function to upload image with SEO friendly name & WebP support
// Compatible with both old and new calling methods:
// Old: upload('uploads/haji/') - uses $_FILES['gambar']
// New: upload($_FILES['gambar'], 'haji') - passes file array
if (!function_exists('upload')) {
    function upload($param1 = null, $param2 = 'uploads/') {
        // Detect calling method
        if (is_array($param1)) {
            // New method: upload($_FILES['gambar'], 'folder')
            $file = $param1;
            $target_dir = $param2;
        } else {
            // Old method: upload('uploads/folder/')
            $file = $_FILES['gambar'] ?? null;
            $target_dir = $param1 ?? 'uploads/';
            // Clean up target_dir - remove 'uploads/' prefix if exists
            $target_dir = preg_replace('/^uploads\//', '', $target_dir);
            $target_dir = trim($target_dir, '/');
        }
        
        if (!$file || empty($file['name'])) {
            return false;
        }
        
        $namaFile = $file['name'];
        $ukuranFile = $file['size'];
        $error = $file['error'];
        $tmpName = $file['tmp_name'];

        // Check if image is uploaded
        if( $error === 4 ) {
            return false;
        }

        // Check valid extension
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiAsli = strtolower(end($ekstensiGambar));
        
        if( !in_array($ekstensiAsli, $ekstensiGambarValid) ) {
            return false;
        }

        // Check size (max 2MB)
        if( $ukuranFile > 2000000 ) {
            return false;
        }

        // SEO Friendly Filename: nama-file-asli-uniqid
        $namaBase = pathinfo($namaFile, PATHINFO_FILENAME);
        $namaBase = preg_replace('/[^a-zA-Z0-9]/', '-', $namaBase);
        $namaBase = preg_replace('/-+/', '-', $namaBase);
        $namaBase = trim($namaBase, '-');
        $namaBase = strtolower($namaBase);
        if (empty($namaBase)) $namaBase = 'image';

        // Get the root directory
        $root_dir = dirname(__FILE__) . '/';
        $full_target_dir = $root_dir . 'uploads/' . $target_dir . '/';
        
        // Ensure directory exists
        if (!file_exists($full_target_dir)) {
            mkdir($full_target_dir, 0777, true);
        }

        // Try to convert to WebP
        if (function_exists('imagewebp') && in_array($ekstensiAsli, ['jpg', 'jpeg', 'png'])) {
            $namaFileBaru = $namaBase . '-' . uniqid() . '.webp';
            $targetPath = $full_target_dir . $namaFileBaru;
            
            $image = null;
            if ($ekstensiAsli == 'jpeg' || $ekstensiAsli == 'jpg') 
                $image = @imagecreatefromjpeg($tmpName);
            elseif ($ekstensiAsli == 'png')
                $image = @imagecreatefrompng($tmpName);
                
            if ($image) {
                imagewebp($image, $targetPath, 80);
                imagedestroy($image);
                return 'uploads/' . $target_dir . '/' . $namaFileBaru;
            }
        }

        // Fallback: Use original extension
        $namaFileBaru = $namaBase . '-' . uniqid() . '.' . $ekstensiAsli;
        move_uploaded_file($tmpName, $full_target_dir . $namaFileBaru);

        return 'uploads/' . $target_dir . '/' . $namaFileBaru;
    }
}


// Function to get website image by code
if (!function_exists('getGambar')) {
    function getGambar($kode, $default = '') {
        global $koneksi;
        
        // Check if table exists
        $check = mysqli_query($koneksi, "SHOW TABLES LIKE 'pengaturan_gambar'");
        if (!$check || mysqli_num_rows($check) == 0) {
            return $default;
        }
        
        $result = mysqli_query($koneksi, "SELECT gambar FROM pengaturan_gambar WHERE kode = '$kode' LIMIT 1");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $gambar = $row['gambar'];
            
            // Fix path jika bukan URL external
            if (!preg_match('/^https?:\/\//', $gambar)) {
                // Deteksi base URL dari script path
                $script_name = $_SERVER['SCRIPT_NAME'] ?? '';
                $base_url = '';
                
                // Ambil folder pertama dari path (e.g., /TravelUmroh)
                if (preg_match('/^(\/[^\/]+)/', $script_name, $matches)) {
                    $base_url = $matches[1];
                }
                
                // Hapus prefix yang salah
                $gambar = preg_replace('/^(\.\.\/|\.\/|admin\/|\/)/', '', $gambar);
                // Tambahkan base URL
                $gambar = $base_url . '/' . $gambar;
            }
            return $gambar;
        }
        return $default;
    }
}
?>
