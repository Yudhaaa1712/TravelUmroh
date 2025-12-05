<?php
/**
 * ============================================
 * IMAGE UPLOADER CLASS - Secure & Optimized
 * ============================================
 * 
 * Features:
 * - MIME type validation (not just extension!)
 * - WebP conversion & resize
 * - Secure filename generation
 * - Prevents directory traversal
 * 
 * @package TravelUmroh
 * @version 2.0.0
 */

declare(strict_types=1);

class ImageUploader
{
    private array $config;
    private array $errors = [];
    
    // Real MIME types for images
    private const VALID_MIMES = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp',
    ];

    public function __construct()
    {
        $this->config = require dirname(__DIR__) . '/config/app.php';
    }

    /**
     * Upload and process image
     * 
     * @param array $file $_FILES['fieldname']
     * @param string $subfolder Subfolder in uploads/
     * @param int $maxWidth Max width for resize (0 = no resize)
     * @return string|false Relative path or false on failure
     */
    public function upload(array $file, string $subfolder = '', int $maxWidth = 1200): string|false
    {
        $this->errors = [];

        // Validate file array
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            $this->errors[] = 'No file uploaded or invalid upload.';
            return false;
        }

        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->errors[] = $this->getUploadError($file['error']);
            return false;
        }

        // Validate file size
        if ($file['size'] > $this->config['UPLOAD_MAX_SIZE']) {
            $this->errors[] = 'File too large. Maximum: ' . ($this->config['UPLOAD_MAX_SIZE'] / 1024 / 1024) . 'MB';
            return false;
        }

        // Validate MIME type using finfo (not file extension!)
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!array_key_exists($mimeType, self::VALID_MIMES)) {
            $this->errors[] = 'Invalid file type. Allowed: JPG, PNG, GIF, WebP';
            return false;
        }

        // Generate secure filename
        $extension = self::VALID_MIMES[$mimeType];
        $filename = $this->generateFileName($extension);

        // Sanitize subfolder (prevent directory traversal)
        $subfolder = $this->sanitizePath($subfolder);

        // Build target path
        $baseDir = dirname(__DIR__) . '/' . $this->config['UPLOAD_DIR'];
        $targetDir = $baseDir . $subfolder . '/';
        $targetPath = $targetDir . $filename;

        // Ensure directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                $this->errors[] = 'Failed to create upload directory.';
                return false;
            }
        }

        // Create .htaccess to disable script execution in uploads folder
        $this->createHtaccess($baseDir);

        // Check if GD library is available
        if (!extension_loaded('gd')) {
            // Fallback: Just move the file without processing
            $targetPath = $targetDir . $filename;
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $this->config['UPLOAD_DIR'] . $subfolder . '/' . $filename;
            } else {
                $this->errors[] = 'Failed to upload file.';
                return false;
            }
        }

        // Process image with GD
        try {
            $image = $this->createImage($file['tmp_name'], $mimeType);
            
            if ($image === false) {
                $this->errors[] = 'Failed to process image.';
                return false;
            }

            // Resize if needed
            if ($maxWidth > 0) {
                $image = $this->resize($image, $maxWidth);
            }

            // Convert to WebP for better performance
            $webpFilename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
            $webpPath = $targetDir . $webpFilename;

            if (function_exists('imagewebp')) {
                imagewebp($image, $webpPath, 85);
                imagedestroy($image);
                return $this->config['UPLOAD_DIR'] . $subfolder . '/' . $webpFilename;
            }

            // Fallback: save in original format
            $this->saveImage($image, $targetPath, $mimeType);
            imagedestroy($image);

            return $this->config['UPLOAD_DIR'] . $subfolder . '/' . $filename;

        } catch (Exception $e) {
            $this->errors[] = 'Image processing failed.';
            return false;
        }
    }

    /**
     * Get upload errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Generate secure random filename
     */
    private function generateFileName(string $extension): string
    {
        return sprintf(
            '%s_%s.%s',
            date('Ymd_His'),
            bin2hex(random_bytes(8)),
            $extension
        );
    }

    /**
     * Sanitize path to prevent directory traversal
     */
    private function sanitizePath(string $path): string
    {
        // Remove any directory traversal attempts
        $path = str_replace(['..', '\\'], '', $path);
        $path = preg_replace('/[^a-zA-Z0-9\/_-]/', '', $path);
        return trim($path, '/');
    }

    /**
     * Create image resource from file
     */
    private function createImage(string $path, string $mimeType): \GdImage|false
    {
        return match ($mimeType) {
            'image/jpeg' => @imagecreatefromjpeg($path),
            'image/png'  => @imagecreatefrompng($path),
            'image/gif'  => @imagecreatefromgif($path),
            'image/webp' => @imagecreatefromwebp($path),
            default      => false,
        };
    }

    /**
     * Resize image proportionally
     */
    private function resize(\GdImage $image, int $maxWidth): \GdImage
    {
        $width = imagesx($image);
        $height = imagesy($image);

        if ($width <= $maxWidth) {
            return $image;
        }

        $ratio = $maxWidth / $width;
        $newWidth = $maxWidth;
        $newHeight = (int) ($height * $ratio);

        $resized = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG
        imagealphablending($resized, false);
        imagesavealpha($resized, true);
        
        imagecopyresampled(
            $resized, $image,
            0, 0, 0, 0,
            $newWidth, $newHeight, $width, $height
        );

        imagedestroy($image);
        return $resized;
    }

    /**
     * Save image in original format
     */
    private function saveImage(\GdImage $image, string $path, string $mimeType): bool
    {
        return match ($mimeType) {
            'image/jpeg' => imagejpeg($image, $path, 85),
            'image/png'  => imagepng($image, $path, 8),
            'image/gif'  => imagegif($image, $path),
            'image/webp' => imagewebp($image, $path, 85),
            default      => false,
        };
    }

    /**
     * Create .htaccess to prevent script execution in uploads
     */
    private function createHtaccess(string $dir): void
    {
        $htaccess = $dir . '.htaccess';
        if (!file_exists($htaccess)) {
            $content = <<<HTACCESS
# Disable script execution
<FilesMatch "\.(php|phtml|php3|php4|php5|pl|py|jsp|asp|htm|html|shtml|sh|cgi)$">
    Require all denied
</FilesMatch>

# Disable directory listing
Options -Indexes

# Set correct MIME types
<IfModule mod_mime.c>
    AddType image/webp .webp
</IfModule>
HTACCESS;
            file_put_contents($htaccess, $content);
        }
    }

    /**
     * Get human-readable upload error
     */
    private function getUploadError(int $code): string
    {
        return match ($code) {
            UPLOAD_ERR_INI_SIZE   => 'File exceeds server limit.',
            UPLOAD_ERR_FORM_SIZE  => 'File exceeds form limit.',
            UPLOAD_ERR_PARTIAL    => 'File upload was interrupted.',
            UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Server configuration error.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file.',
            UPLOAD_ERR_EXTENSION  => 'Upload blocked by extension.',
            default               => 'Unknown upload error.',
        };
    }

    /**
     * Delete uploaded file
     */
    public static function delete(string $path): bool
    {
        if (empty($path)) return true;
        
        $fullPath = dirname(__DIR__) . '/' . $path;
        
        if (file_exists($fullPath) && is_file($fullPath)) {
            return unlink($fullPath);
        }
        
        return true;
    }
}
