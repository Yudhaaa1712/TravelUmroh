<?php
/**
 * ============================================
 * ENVIRONMENT CONFIGURATION
 * ============================================
 * Store this file OUTSIDE the web root in production!
 * Or use .env with a loader like vlucas/phpdotenv
 */

return [
    // Database Configuration
    'DB_HOST'     => 'localhost',
    'DB_NAME'     => 'travel_umroh',
    'DB_USER'     => 'root',
    'DB_PASS'     => '',
    'DB_CHARSET'  => 'utf8mb4',
    
    // Application Settings
    'APP_NAME'    => 'Ababil Tour & Hajj',
    'APP_ENV'     => 'development', // 'production' in live
    'APP_DEBUG'   => true, // false in production
    'APP_URL'     => 'http://localhost/TravelUmroh',
    
    // Security Keys (generate unique values!)
    'CSRF_SECRET' => 'change-this-to-random-32-char-string',
    
    // Upload Settings
    'UPLOAD_MAX_SIZE' => 5 * 1024 * 1024, // 5MB
    'UPLOAD_DIR'      => 'uploads/',
    'ALLOWED_IMAGES'  => ['jpg', 'jpeg', 'png', 'webp', 'gif'],
    
    // Session Settings
    'SESSION_LIFETIME' => 3600, // 1 hour
    'SESSION_NAME'     => 'ABABIL_SESSION',
];
