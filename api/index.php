<?php

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
