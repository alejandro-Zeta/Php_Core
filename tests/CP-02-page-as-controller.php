<?php
/**
 * CP-02 — Page as Controller
 *
 * Objetivo:
 * Demostrar el patrón page-as-controller:
 * - El archivo del root actúa como controlador mínimo
 * - Orquesta input, llamadas a clases y render
 * - No contiene lógica de negocio compleja
 *
 * Este archivo es un contrato ejecutable.
 */

require __DIR__ . '/bootstrap.php';

use App\Repositories\CustomerRepository;

// Input
$customerId = isset($_GET['id']) ? (int) $_GET['id'] : null;

// Control mínimo
$customer = null;
if ($customerId) {
    $repo = new CustomerRepository();
    $customer = $repo->findById($customerId);
}

// Render (layout + vista simple)
$title = 'Detalle de Cliente';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<?php if ($customer): ?>
    <ul>
        <li>ID: <?= (int) $customer['id'] ?></li>
        <li>Nombre: <?= htmlspecialchars($customer['name']) ?></li>
        <li>Email: <?= htmlspecialchars($customer['email']) ?></li>
    </ul>
<?php else: ?>
    <p>Cliente no encontrado.</p>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - El archivo del root NO contiene SQL
 * - La lógica de acceso a datos vive en /classes
 * - El HTML es simple y legible
 * - El archivo coordina, no decide
 */
