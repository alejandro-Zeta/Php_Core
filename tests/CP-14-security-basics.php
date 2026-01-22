<?php
/**
 * CP-14 — Basic Security Practices
 *
 * Objetivo:
 * Asegurar prácticas básicas de seguridad en la aplicación:
 * - Sanitización de output
 * - Headers de seguridad
 * - Manejo correcto de sesiones
 *
 * Este archivo demuestra:
 * - Escape de output HTML
 * - Headers mínimos de seguridad
 * - Sesión inicializada de forma controlada
 */

require __DIR__ . '/bootstrap.php';

// Headers de seguridad básicos (normalmente centralizados en bootstrap)
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-XSS-Protection: 1; mode=block');

// Sesión (si aplica)
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Input simulado
$username = $_GET['user'] ?? '<script>alert("xss")</script>';

// Render
$title = 'CP-14 — Seguridad básica';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>

<p>Usuario: <?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?></p>

<p>Este checkpoint demuestra sanitización de output y headers de seguridad.</p>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - TODO output HTML debe ser escapado
 * - Headers de seguridad deben estar presentes
 * - No confiar en input del usuario
 * - Sesiones inicializadas explícitamente
 *
 * Relacionado:
 * - CP-07 (validación)
 * - CP-08 (manejo de errores)
 * - specs/security.md
 */
