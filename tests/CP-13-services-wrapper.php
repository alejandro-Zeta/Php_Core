<?php
/**
 * CP-13 — External Services Wrapper
 *
 * Objetivo:
 * Asegurar que toda integración con servicios externos (APIs, SDKs, Bedrock, etc.)
 * esté encapsulada en una clase Service dedicada.
 *
 * Este archivo demuestra:
 * - Uso de un Service como wrapper
 * - Configuración separada
 * - El root no conoce detalles del SDK
 */

require __DIR__ . '/bootstrap.php';

use App\Services\ExternalExampleService;

$title = 'CP-13 — Servicios externos encapsulados';

$result = null;
$errorMessage = null;

try {
    $service = new ExternalExampleService();
    $result = $service->execute('demo-input');
} catch (Throwable $e) {
    App\Support\Logger::error('External service failure', [
        'exception' => $e,
    ]);
    $errorMessage = 'No fue posible completar la operación externa.';
}

// Render
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<?php if ($errorMessage): ?>
    <p class="error"><?= htmlspecialchars($errorMessage) ?></p>
<?php else: ?>
    <p class="success">Resultado del servicio: <?= htmlspecialchars((string)$result) ?></p>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - El root NO instancia SDKs directamente
 * - Los servicios externos viven en /classes/Services
 * - Configuración vía /config/services.php
 * - Manejo de errores y retries dentro del Service
 *
 * Ejemplos típicos:
 * - Bedrock SDK
 * - APIs REST externas
 * - Servicios de correo, pagos, etc.
 */
