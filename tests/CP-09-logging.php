<?php
/**
 * CP-09 — Centralized Logging
 *
 * Objetivo:
 * Asegurar que el logging sea centralizado y consistente.
 * No usar error_log disperso ni prints para debug.
 *
 * Este archivo demuestra:
 * - Uso de un Logger central
 * - Niveles de log
 * - Contexto estructurado
 */

require __DIR__ . '/bootstrap.php';

use App\Support\Logger;

$title = 'CP-09 — Logging centralizado';

// Ejemplos de logging
Logger::info('Página accedida', [
    'route' => 'cp-09',
    'user_id' => $_SESSION['user_id'] ?? null,
]);

try {
    // Simulación de evento
    if (random_int(0, 1)) {
        throw new RuntimeException('Evento simulado');
    }

    Logger::notice('Operación ejecutada correctamente');
    $message = 'Operación completada sin errores.';
} catch (Throwable $e) {
    Logger::error('Fallo en operación', [
        'exception' => $e,
    ]);
    $message = 'Se registró un error interno.';
}

// Render
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>
<p><?= htmlspecialchars($message) ?></p>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - Todo log pasa por Logger central
 * - No usar echo/var_dump para debug en producción
 * - Incluir contexto estructurado
 * - Separar niveles: info, notice, warning, error, critical
 *
 * Relacionado:
 * - CP-08 (manejo de errores)
 * - specs/logging.md
 */
