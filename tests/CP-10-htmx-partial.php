<?php
/**
 * CP-10 — HTMX Partial Rendering
 *
 * Objetivo:
 * Asegurar el uso correcto de HTMX:
 * - Detectar requests HTMX
 * - Renderizar SOLO el fragmento necesario
 * - No renderizar layout completo en HTMX
 *
 * Este archivo demuestra:
 * - Detección por header HX-Request
 * - Reutilización de includes UI
 */

require __DIR__ . '/bootstrap.php';

$isHtmx = isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true';

// Datos simulados
$items = [
    ['id' => 1, 'name' => 'Item A'],
    ['id' => 2, 'name' => 'Item B'],
    ['id' => 3, 'name' => 'Item C'],
];

// Si es HTMX, renderizar SOLO el partial
if ($isHtmx) {
    include __DIR__ . '/../includes/ui/items-list.php';
    return;
}

// Caso normal (no HTMX): layout completo
$title = 'CP-10 — HTMX Partial';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<div 
    hx-get="/cp-10.php"
    hx-trigger="load"
    hx-target="#items"
    hx-swap="innerHTML"
>
    <div id="items">Cargando...</div>
</div>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - HTMX = fragmentos, no layout completo
 * - Detectar HTMX por header, no por URL
 * - Reutilizar includes UI para partials
 * - El root decide qué renderizar, no duplica HTML
 */
