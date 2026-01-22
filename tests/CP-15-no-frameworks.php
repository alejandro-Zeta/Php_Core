<?php
/**
 * CP-15 — No Frameworks / No Magic
 *
 * Objetivo:
 * Asegurar que el proyecto se mantenga en PHP puro:
 * - Sin frameworks (Laravel, Symfony, Slim, etc.)
 * - Sin contenedores DI complejos
 * - Sin helpers mágicos ni abstracciones opacas
 *
 * Este archivo demuestra:
 * - PHP explícito
 * - Flujo visible
 * - Dependencias claras
 */

require __DIR__ . '/bootstrap.php';

// ❌ PROHIBIDO (ejemplos, NO usar)
// use Illuminate\Support\Facades\DB;
// app()->make('service');
// Route::get('/test', fn() => 'no');

// ✅ PATRÓN CORRECTO
use App\Services\SimpleService;

$title = 'CP-15 — PHP puro, sin frameworks';

$service = new SimpleService();
$result = $service->run();

// Render
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>
<p>Resultado del servicio: <?= htmlspecialchars((string)$result) ?></p>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - No usar frameworks ni microframeworks
 * - No usar contenedores DI automáticos
 * - No usar facades mágicos
 * - Preferir código explícito y fácil de seguir
 * - Composer solo para librerías y SDKs (no framework)
 *
 * Relacionado:
 * - CP-01 a CP-05 (estructura base)
 */
