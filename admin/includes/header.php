<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Autoload core classes
spl_autoload_register(function ($class) {
    $file = dirname(dirname(__DIR__)) . '/core/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Connect to database
$koneksi = mysqli_connect("localhost", "root", "", "travel_umroh");

// Query helper function
if (!function_exists('query')) {
    function query($sql) {
        global $koneksi;
        $result = mysqli_query($koneksi, $sql);
        if (!$result) {
            error_log("MySQL Error: " . mysqli_error($koneksi) . " | Query: " . $sql);
            return [];
        }
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

// Upload helper function
if (!function_exists('upload')) {
    function upload($targetDir = 'uploads/') {
        $file = $_FILES['gambar'] ?? null;
        
        if (!$file || empty($file['name']) || $file['error'] === 4) {
            return false;
        }
        
        $namaFile = $file['name'];
        $ukuranFile = $file['size'];
        $tmpName = $file['tmp_name'];
        
        // Check valid extension
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        
        if (!in_array($ekstensi, $ekstensiValid)) {
            return false;
        }
        
        // Max 5MB
        if ($ukuranFile > 5000000) {
            return false;
        }
        
        // Clean target dir
        $targetDir = preg_replace('/^uploads\//', '', $targetDir);
        $targetDir = trim($targetDir, '/');
        
        // Generate new filename
        $namaFileBaru = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '-', $namaFile);
        
        // Full path - Fix: Go up 2 levels from admin/includes to reach root
        $rootDir = dirname(dirname(__DIR__)) . '/';
        $fullTargetDir = $rootDir . 'uploads/' . $targetDir . '/';
        
        // Create directory if not exists
        if (!file_exists($fullTargetDir)) {
            mkdir($fullTargetDir, 0777, true);
        }
        
        // Move file
        if (move_uploaded_file($tmpName, $fullTargetDir . $namaFileBaru)) {
            return 'uploads/' . $targetDir . '/' . $namaFileBaru;
        }
        
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ababil Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#C5A028',
                        emerald: '#064E3B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
