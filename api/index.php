<?php

// Diagnostic endpoint
if (isset($_GET['_test'])) {
    header('Content-Type: text/plain');
    echo 'PHP VERSION: ' . PHP_VERSION . "\n";
    echo 'APP_KEY set: ' . (getenv('APP_KEY') ? 'YES' : 'NO') . "\n";
    echo 'DB_HOST: ' . (getenv('DB_HOST') ?: 'not set') . "\n";
    echo 'DB_PORT: ' . (getenv('DB_PORT') ?: 'not set') . "\n";
    echo 'DB_DATABASE: ' . (getenv('DB_DATABASE') ?: 'not set') . "\n";
    echo 'SESSION_DRIVER: ' . (getenv('SESSION_DRIVER') ?: 'not set') . "\n";
    echo 'APP_DEBUG: ' . (getenv('APP_DEBUG') ?: 'not set') . "\n";
    echo "\n-- FILES CHECK --\n";
    echo 'vendor/autoload.php: ' . (file_exists(__DIR__ . '/../vendor/autoload.php') ? 'EXISTS' : 'MISSING') . "\n";
    echo 'bootstrap/cache/packages.php: ' . (file_exists(__DIR__ . '/../bootstrap/cache/packages.php') ? 'EXISTS' : 'MISSING') . "\n";
    echo '/tmp/bootstrap/cache/packages.php: ' . (file_exists('/tmp/bootstrap/cache/packages.php') ? 'EXISTS' : 'MISSING') . "\n";
    echo "\n-- DB CONNECTION TEST --\n";
    try {
        $pdo = new PDO(
            'mysql:host=' . getenv('DB_HOST') . ';port=' . (getenv('DB_PORT') ?: 3306) . ';dbname=' . getenv('DB_DATABASE') . ';charset=utf8mb4',
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD'),
            [PDO::ATTR_TIMEOUT => 5, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        echo "DB: CONNECTED\n";
    } catch (\Exception $e) {
        echo "DB: FAILED - " . $e->getMessage() . "\n";
    }
    exit();
}

ini_set('display_errors', '1');
error_reporting(E_ALL);

// Vercel: semua writable paths ke /tmp
is_dir('/tmp/views') || mkdir('/tmp/views', 0777, true);
is_dir('/tmp/bootstrap/cache') || mkdir('/tmp/bootstrap/cache', 0777, true);
is_dir('/tmp/storage/logs') || mkdir('/tmp/storage/logs', 0777, true);

// Redirect VIEW compiled path
putenv('VIEW_COMPILED_PATH=/tmp/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';

// Redirect bootstrap cache (packages.php & services.php) ke /tmp agar bisa ditulis
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/'
);

if ($uri !== '/' && file_exists(__DIR__ . '/../public' . $uri)) {
    return false;
}

$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'] ?? 'localhost';

require __DIR__ . '/../public/index.php';
