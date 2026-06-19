<?php

$mimeMap = [
    'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png',
    'gif' => 'image/gif',  'webp' => 'image/webp', 'svg' => 'image/svg+xml',
    'ico' => 'image/x-icon', 'css' => 'text/css', 'js' => 'application/javascript',
    'woff' => 'font/woff', 'woff2' => 'font/woff2', 'ttf' => 'font/ttf',
];
$blocked = ['php', 'env', 'log'];

function serveFile(string $path, array $mimeMap, array $blocked): bool {
    if (!is_file($path)) return false;
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    if (in_array($ext, $blocked)) return false;
    header('Content-Type: ' . ($mimeMap[$ext] ?? 'application/octet-stream'));
    header('Cache-Control: public, max-age=86400');
    readfile($path);
    exit;
}

// Serve static files for Vercel (all requests are routed through index.php)
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if ($requestPath && $requestPath !== '/') {
    // Handle /storage/ — uploaded files live in /tmp on Vercel
    if (str_starts_with($requestPath, '/storage/')) {
        $tmpFile = '/tmp/storage/app/public' . substr($requestPath, strlen('/storage'));
        serveFile($tmpFile, $mimeMap, $blocked);
    }

    // Handle other static files inside public/
    $staticFile = __DIR__ . $requestPath;
    $realPublic = realpath(__DIR__);
    $realFile   = realpath($staticFile);
    if ($realFile && $realPublic && str_starts_with($realFile, $realPublic)) {
        serveFile($realFile, $mimeMap, $blocked);
    }
}

// PHP built-in server (local development)
if (php_sapi_name() === 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($file)) {
        return false;
    }
}

define('LARAVEL_START', microtime(true));

ini_set('display_errors', '1');
error_reporting(E_ALL);

// Setup writable directories in /tmp (untuk Vercel read-only filesystem)
foreach ([
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0775, true);
}

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

$app->handleRequest(Illuminate\Http\Request::capture());
