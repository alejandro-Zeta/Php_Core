<?php
/**
 * CP-08 — Error Handling
 *
 * Objetivo:
 * Asegurar un manejo de errores seguro:
 * - No exponer detalles internos al usuario
 * - Registrar errores internamente (logging)
 * - Responder con mensajes controlados
 *
 * Este archivo demuestra:
 * - try/catch en el root (orquestación)
 * - Delegación de logging
 * - Mensajes de error amigables
 */

require __DIR__ . '/bootstrap.php';

use App\Services\DangerousOperationService;
use App\Support\Logger;

$title = 'CP-08 — Manejo de errores';
$errorMessage = null;
$result = null;

try {
    $service = new DangerousOperationService();
    $result = $service->run();
} catch (Throwable $e) {
    // Log interno (no exponer detalles)
    Logger::error('Error en operación peligrosa', [
        'exception' => $e,
    ]);

    // Mensaje seguro para el usuario
    $errorMessage = 'Ocurrió un error inesperado. Intente nuevamente más tarde.';
}

// Render
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<?php if ($errorMessage): ?>
    <p class="error"><?= htmlspecialchars($errorMessage) ?></p>
<?php else: ?>
    <p class="success">Resultado: <?= htmlspecialchars((string)$result) ?></p>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - Nunca mostrar mensajes de excepción al usuario final
 * - Logging centralizado (archivo, syslog, etc.)
 * - try/catch solo para orquestar flujo, no para lógica compleja
 * - Errores = evento interno, no feedback técnico al usuario
 *
 * Relacionado:
 * - specs/error-handling.md
 * - specs/logging.md
 */
