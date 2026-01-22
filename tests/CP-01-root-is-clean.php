<?php
/**
 * CP-01 — Root is clean
 *
 * Objetivo:
 * Verificar que el directorio root solo contiene rutas públicas
 * y no lógica de negocio, clases ni SQL.
 *
 * Este archivo NO es un test automático.
 * Es un contrato ejecutable y ejemplo normativo.
 */

// Ejemplo válido de ruta en el root:

require __DIR__ . '/bootstrap.php';

// Input mínimo
$id = $_GET['id'] ?? null;

// Delegación de lógica
if ($id) {
    $service = new App\Services\ExampleService();
    $data = $service->getData($id);
}

// Renderizado
include __DIR__ . '/../includes/layout/header.php';
?>

<h1>Página válida en el root</h1>

<?php if (!empty($data)): ?>
    <pre><?= htmlspecialchars(print_r($data, true)) ?></pre>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - No hay SQL en este archivo
 * - No se definen clases
 * - No hay lógica compleja
 * - El HTML es simple o delega a includes
 */
