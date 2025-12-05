<?php
/**
 * ============================================
 * DATABASE CLASS - Secure PDO Implementation
 * ============================================
 * Singleton Pattern with Prepared Statements
 * 
 * @package TravelUmroh
 * @version 2.0.0
 */

declare(strict_types=1);

class Database
{
    private static ?PDO $instance = null;
    private static array $config = [];

    /**
     * Get PDO instance (Singleton)
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$config = require dirname(__DIR__) . '/config/app.php';
            
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                self::$config['DB_HOST'],
                self::$config['DB_NAME'],
                self::$config['DB_CHARSET']
            );

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
            ];

            try {
                self::$instance = new PDO($dsn, self::$config['DB_USER'], self::$config['DB_PASS'], $options);
            } catch (PDOException $e) {
                // Log to file, never expose to user
                self::logError($e->getMessage());
                
                if (self::$config['APP_DEBUG']) {
                    throw new Exception('Database connection failed: ' . $e->getMessage());
                }
                throw new Exception('Terjadi kesalahan sistem. Silakan coba lagi.');
            }
        }

        return self::$instance;
    }

    /**
     * Get config value
     */
    public static function getConfig(string $key, $default = null)
    {
        if (empty(self::$config)) {
            self::$config = require dirname(__DIR__) . '/config/app.php';
        }
        return self::$config[$key] ?? $default;
    }

    /**
     * Execute SELECT query with params
     * 
     * @param string $sql The SQL query with placeholders
     * @param array $params The parameters to bind
     * @return array
     */
    public static function select(string $sql, array $params = []): array
    {
        try {
            $stmt = self::getInstance()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            self::logError($e->getMessage() . ' | Query: ' . $sql);
            return [];
        }
    }

    /**
     * Execute SELECT and return single row
     */
    public static function selectOne(string $sql, array $params = []): ?array
    {
        $result = self::select($sql, $params);
        return $result[0] ?? null;
    }

    /**
     * Execute INSERT query
     * 
     * @param string $table Table name
     * @param array $data Associative array of column => value
     * @return int|false Last insert ID or false
     */
    public static function insert(string $table, array $data): int|false
    {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
            
            $stmt = self::getInstance()->prepare($sql);
            $stmt->execute($data);
            
            return (int) self::getInstance()->lastInsertId();
        } catch (PDOException $e) {
            self::logError($e->getMessage());
            return false;
        }
    }

    /**
     * Execute UPDATE query
     * 
     * @param string $table Table name
     * @param array $data Associative array of column => value
     * @param string $where WHERE clause with placeholders
     * @param array $whereParams Parameters for WHERE clause
     * @return bool
     */
    public static function update(string $table, array $data, string $where, array $whereParams = []): bool
    {
        try {
            $set = [];
            foreach (array_keys($data) as $column) {
                $set[] = "{$column} = :{$column}";
            }
            
            $sql = "UPDATE {$table} SET " . implode(', ', $set) . " WHERE {$where}";
            
            $stmt = self::getInstance()->prepare($sql);
            $stmt->execute(array_merge($data, $whereParams));
            
            return true;
        } catch (PDOException $e) {
            self::logError($e->getMessage());
            return false;
        }
    }

    /**
     * Execute DELETE query
     * 
     * @param string $table Table name
     * @param string $where WHERE clause with placeholders
     * @param array $params Parameters
     * @return bool
     */
    public static function delete(string $table, string $where, array $params = []): bool
    {
        try {
            $sql = "DELETE FROM {$table} WHERE {$where}";
            $stmt = self::getInstance()->prepare($sql);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            self::logError($e->getMessage());
            return false;
        }
    }

    /**
     * Execute raw query (for complex queries)
     */
    public static function query(string $sql, array $params = []): bool
    {
        try {
            $stmt = self::getInstance()->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            self::logError($e->getMessage());
            return false;
        }
    }

    /**
     * Log errors to file
     */
    private static function logError(string $message): void
    {
        $logFile = dirname(__DIR__) . '/logs/database_' . date('Y-m-d') . '.log';
        $logDir = dirname($logFile);
        
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        $logMessage = sprintf(
            "[%s] %s | IP: %s | URI: %s\n",
            date('Y-m-d H:i:s'),
            $message,
            $_SERVER['REMOTE_ADDR'] ?? 'CLI',
            $_SERVER['REQUEST_URI'] ?? 'CLI'
        );
        
        error_log($logMessage, 3, $logFile);
    }
}
