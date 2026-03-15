<?php
// db_tester/config.php
// Update these values for movex-org.com/9ja or your local XAMPP setup.

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'movecdxj_9ja');
define('DB_USER', 'movecdxj_9ja');
define('DB_PASS', 'July1972@123');
define('APP_NAME', 'Movex DB Tester');

date_default_timezone_set('Africa/Lagos');

function movex_db(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $pdo;
}
