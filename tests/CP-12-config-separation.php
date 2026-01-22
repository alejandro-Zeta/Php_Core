<?php
/**
 * CP-12 — Configuration Separation
 *
 * Objetivo:
 * Asegurar que la configuración esté separada del código:
 * - Nada hardcodeado en rutas o clases
 * - Uso de archivos en /config
 * - Acceso centralizado a configuración
 *
 * Este archivo demuestra:
 * - Carga de configuración
 * - Uso desde el root
 * - No dependencia directa de variables de entorno dispersas
 */

require __DIR__ . '/bootstrap.php';

// Ejemplo de acceso a configuración (helper o arreglo central)
$dbConfig = config('database');      // p.ej. /config/database.php
$appConfig = config('app');          // p.ej. /config/app.php
$serviceCfg = config('services');    // p.ej. /config/services.php

$title = 'CP-12 — Configuración separada';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<ul>
    <li>App name: <?= htmlspecialchars($appConfig['name'] ?? 'N/A') ?></li>
    <li>DB host: <?= htmlspecialchars($dbConfig['host'] ?? 'N/A') ?></li>
    <li>Services configured: <?= isset($serviceCfg) ? 'Sí' : 'No' ?></li>
</ul>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - No hardcodear credenciales ni settings
 * - La configuración vive en /config
 * - El código accede vía helper o contenedor simple (config())
 * - Variables de entorno se leen UNA vez (bootstrap) y se exponen como config
 *
 * Relacionado:
 * - CP-13 (Servicios externos)
 * - specs/configuration.md
 */
