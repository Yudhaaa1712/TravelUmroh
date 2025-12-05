<?php
/**
 * ============================================
 * BOOTSTRAP FILE - Initialize Application
 * ============================================
 * Include this file at the top of every script
 * 
 * @package TravelUmroh
 * @version 2.0.0
 */

declare(strict_types=1);

// Error reporting based on environment
$config = require __DIR__ . '/app.php';

if ($config['APP_DEBUG']) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    ini_set('error_log', __DIR__ . '/../logs/php_errors.log');
}

// Autoload core classes
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../core/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Initialize security
Security::initSession();

// ============================================
// LEGACY COMPATIBILITY LAYER
// ============================================
// These functions maintain backward compatibility
// with existing code while using the new secure core

/**
 * @deprecated Use Database::select() instead
 */
if (!function_exists('query')) {
    function query(string $sql): array
    {
        // WARNING: This is for legacy support only
        // New code should use Database::select() with prepared statements
        return Database::select($sql);
    }
}

/**
 * @deprecated Use ImageUploader class instead
 */
if (!function_exists('upload')) {
    function upload($param1 = null, $param2 = ''): string|false
    {
        // Detect calling method for backward compatibility
        if (is_array($param1)) {
            $file = $param1;
            $subfolder = $param2;
        } else {
            $file = $_FILES['gambar'] ?? null;
            $subfolder = $param1 ?? '';
            $subfolder = preg_replace('/^uploads\//', '', $subfolder);
            $subfolder = trim($subfolder, '/');
        }

        if (!$file || empty($file['name'])) {
            return false;
        }

        $uploader = new ImageUploader();
        return $uploader->upload($file, $subfolder);
    }
}

/**
 * Get image from settings
 */
if (!function_exists('getGambar')) {
    function getGambar(string $kode, string $default = ''): string
    {
        $result = Database::selectOne(
            "SELECT gambar FROM pengaturan_gambar WHERE kode = :kode LIMIT 1",
            ['kode' => $kode]
        );

        if (!$result) {
            return $default;
        }

        $gambar = $result['gambar'];

        // Fix path for local files
        if (!preg_match('/^https?:\/\//', $gambar)) {
            $config = require __DIR__ . '/app.php';
            $baseUrl = rtrim($config['APP_URL'], '/');
            $gambar = preg_replace('/^(\.\.\/|\.\/|admin\/|\/)/', '', $gambar);
            $gambar = $baseUrl . '/' . $gambar;
        }

        return $gambar;
    }
}

// Legacy mysqli connection for gradual migration
// Remove this once all code is migrated to PDO
$koneksi = null;
try {
    $koneksi = new mysqli(
        $config['DB_HOST'],
        $config['DB_USER'],
        $config['DB_PASS'],
        $config['DB_NAME']
    );
    $koneksi->set_charset('utf8mb4');
} catch (Exception $e) {
    // Will use PDO instead
}
