<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Catch fatal errors and output them visibly (for Vercel debugging)
register_shutdown_function(function () {
    $e = error_get_last();
    if ($e && in_array($e['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        if (!headers_sent()) {
            http_response_code(500);
            header('Content-Type: text/html; charset=UTF-8');
        }
        echo '<h2>PHP Fatal Error</h2><pre>' . htmlspecialchars($e['message']) . "\n" . $e['file'] . ':' . $e['line'] . '</pre>';
    }
});

set_exception_handler(function (\Throwable $e) {
    if (!headers_sent()) {
        http_response_code(500);
        header('Content-Type: text/html; charset=UTF-8');
    }
    echo '<h2>' . htmlspecialchars(get_class($e)) . '</h2>';
    echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<pre>' . htmlspecialchars($e->getFile() . ':' . $e->getLine()) . '</pre>';
});

// Vercel: redirect Blade compiled views to /tmp (only writable dir on serverless)
if (getenv('VERCEL') || getenv('VERCEL_ENV')) {
    is_dir('/tmp/views') || mkdir('/tmp/views', 0777, true);
    putenv('VIEW_COMPILED_PATH=/tmp/views');
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
