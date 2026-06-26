<?php

// Paling awal: test apakah PHP berjalan sama sekali
if (isset($_GET['_test'])) {
    header('Content-Type: text/plain');
    echo 'PHP VERSION: ' . PHP_VERSION . "\n";
    echo 'VERCEL: ' . (getenv('VERCEL') ?: 'not set') . "\n";
    echo 'APP_KEY set: ' . (getenv('APP_KEY') ? 'YES (' . strlen(getenv('APP_KEY')) . ' chars)' : 'NO') . "\n";
    echo 'DB_HOST: ' . (getenv('DB_HOST') ?: 'not set') . "\n";
    echo 'SESSION_DRIVER: ' . (getenv('SESSION_DRIVER') ?: 'not set') . "\n";
    echo 'CACHE_STORE: ' . (getenv('CACHE_STORE') ?: 'not set') . "\n";
    echo 'VIEW_COMPILED_PATH: ' . (getenv('VIEW_COMPILED_PATH') ?: 'not set') . "\n";
    echo '/tmp writable: ' . (is_writable('/tmp') ? 'YES' : 'NO') . "\n";
    exit();
}

ini_set('display_errors', '1');
error_reporting(E_ALL);

// Vercel: /tmp/views writable for Blade template compilation
is_dir('/tmp/views') || mkdir('/tmp/views', 0777, true);
putenv('VIEW_COMPILED_PATH=/tmp/views');

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
