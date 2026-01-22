<?php
/**
 * bootstrap.php
 *
 * Punto de entrada común para TODAS las rutas.
 * Cumple CP-01 a CP-16.
 */

// -----------------------------
// Autoload (Composer / PSR-4)
// -----------------------------
require_once __DIR__ . '/vendor/autoload.php';

// -----------------------------
// Environment
// -----------------------------
if (file_exists(__DIR__ . '/.env')) {
    foreach (parse_ini_file(__DIR__ . '/.env') as $key => $value) {
        $_ENV[$key] = $value;
    }
}

// -----------------------------
// Config loader
// -----------------------------
function config(string $key): array
{
    static $config = [];

    if (!isset($config[$key])) {
        $path = __DIR__ . '/config/' . $key . '.php';
        if (!file_exists($path)) {
            throw new RuntimeException("Config file not found: {$key}");
        }
        $config[$key] = require $path;
    }

    return $config[$key];
}

// -----------------------------
// Error handling (global)
// -----------------------------
set_exception_handler(function (Throwable $e) {
    App\Support\Logger::error('Unhandled exception', [
        'exception' => $e,
    ]);

    http_response_code(500);
    echo 'Internal Server Error';
    exit;
});

// -----------------------------
// Session (if needed)
// -----------------------------
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// -----------------------------
// Security headers (baseline)
// -----------------------------
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');

// -----------------------------
// HTMX helper (optional)
// -----------------------------
function isHtmx(): bool
{
    return isset($_SERVER['HTTP_HX_REQUEST']);
}