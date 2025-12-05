<?php
/**
 * ============================================
 * SECURITY CLASS - CSRF & Session Management
 * ============================================
 * 
 * @package TravelUmroh
 * @version 2.0.0
 */

declare(strict_types=1);

class Security
{
    /**
     * Initialize secure session
     */
    public static function initSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            $config = require dirname(__DIR__) . '/config/app.php';
            
            // Secure session settings
            ini_set('session.cookie_httponly', '1');
            ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) ? '1' : '0');
            ini_set('session.use_strict_mode', '1');
            ini_set('session.cookie_samesite', 'Lax');
            
            session_name($config['SESSION_NAME']);
            session_start();
            
            // Regenerate session ID periodically to prevent fixation
            if (!isset($_SESSION['_last_regenerate'])) {
                $_SESSION['_last_regenerate'] = time();
            } elseif (time() - $_SESSION['_last_regenerate'] > 300) { // Every 5 minutes
                session_regenerate_id(true);
                $_SESSION['_last_regenerate'] = time();
            }
        }
    }

    /**
     * Regenerate session ID (call after login!)
     */
    public static function regenerateSession(): void
    {
        session_regenerate_id(true);
        $_SESSION['_last_regenerate'] = time();
    }

    /**
     * Generate CSRF token
     */
    public static function generateCsrfToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Get CSRF hidden input field
     */
    public static function csrfField(): string
    {
        return sprintf(
            '<input type="hidden" name="csrf_token" value="%s">',
            self::generateCsrfToken()
        );
    }

    /**
     * Verify CSRF token
     */
    public static function verifyCsrfToken(?string $token = null): bool
    {
        $token = $token ?? ($_POST['csrf_token'] ?? '');
        
        if (empty($_SESSION['csrf_token']) || empty($token)) {
            return false;
        }
        
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    /**
     * Check CSRF and die if invalid
     */
    public static function requireCsrf(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !self::verifyCsrfToken()) {
            http_response_code(403);
            die('Invalid CSRF token. Please refresh the page and try again.');
        }
    }

    /**
     * Check if user is logged in
     */
    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['login']) && $_SESSION['login'] === true;
    }

    /**
     * Require authentication
     */
    public static function requireAuth(): void
    {
        if (!self::isLoggedIn()) {
            header('Location: login.php');
            exit;
        }
    }

    /**
     * Sanitize output for HTML (prevent XSS)
     */
    public static function escape(?string $string): string
    {
        return htmlspecialchars($string ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * Alias for escape
     */
    public static function e(?string $string): string
    {
        return self::escape($string);
    }

    /**
     * Sanitize input
     */
    public static function sanitize(string $input): string
    {
        return trim(strip_tags($input));
    }

    /**
     * Validate integer ID
     */
    public static function validateId($id): int
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false || $id < 1) {
            return 0;
        }
        return $id;
    }

    /**
     * Hash password securely
     */
    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID, [
            'memory_cost' => 65536,
            'time_cost' => 4,
            'threads' => 3,
        ]);
    }

    /**
     * Verify password
     */
    public static function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /**
     * Rate limiting check (simple implementation)
     */
    public static function checkRateLimit(string $key, int $maxAttempts = 5, int $decaySeconds = 300): bool
    {
        $attempts = $_SESSION['rate_limit'][$key] ?? ['count' => 0, 'expires' => 0];
        
        if (time() > $attempts['expires']) {
            $attempts = ['count' => 0, 'expires' => time() + $decaySeconds];
        }
        
        if ($attempts['count'] >= $maxAttempts) {
            return false;
        }
        
        $attempts['count']++;
        $_SESSION['rate_limit'][$key] = $attempts;
        
        return true;
    }

    /**
     * Set flash message
     */
    public static function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    /**
     * Get and clear flash message
     */
    public static function getFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }
}

/**
 * Helper function for escaping output
 */
function e(?string $string): string
{
    return Security::escape($string);
}

/**
 * Helper function for CSRF field
 */
function csrf_field(): string
{
    return Security::csrfField();
}
