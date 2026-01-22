<?php
/**
 * CP-11 — JSON API Response
 *
 * Objetivo:
 * Asegurar endpoints JSON simples, consistentes y seguros.
 * Sin frameworks, sin HTML, sin lógica pesada en el root.
 *
 * Este archivo demuestra:
 * - Headers JSON correctos
 * - Respuesta consistente
 * - Manejo de errores controlado
 */

require __DIR__ . '/bootstrap.php';

use App\Repositories\CustomerRepository;

header('Content-Type: application/json; charset=utf-8');

try {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

    if (!$id) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error'   => 'Missing id parameter',
        ]);
        return;
    }

    $repo = new CustomerRepository();
    $customer = $repo->findByIdPrepared($id);

    if (!$customer) {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'error'   => 'Customer not found',
        ]);
        return;
    }

    echo json_encode([
        'success' => true,
        'data'    => $customer,
    ]);
} catch (Throwable $e) {
    http_response_code(500);

    // Logging interno (no exponer detalles)
    App\Support\Logger::error('API error', [
        'exception' => $e,
    ]);

    echo json_encode([
        'success' => false,
        'error'   => 'Internal server error',
    ]);
}

/**
 * Reglas implícitas:
 * - APIs responden SOLO JSON (sin HTML)
 * - Estructura consistente: success + data|error
 * - Status codes correctos
 * - Errores internos no se exponen
 * - SQL y lógica pesada viven fuera del root
 */
