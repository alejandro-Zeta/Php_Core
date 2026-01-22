<?php
/**
 * CP-06 — Prepared Statements
 *
 * Objetivo:
 * Asegurar que todo acceso a base de datos use prepared statements.
 * No concatenar input del usuario en queries SQL.
 *
 * Este archivo demuestra:
 * - Delegación a Repository
 * - Uso de prepared statements
 * - Tipado y saneamiento básico de input
 */

require __DIR__ . '/bootstrap.php';

use App\Repositories\CustomerRepository;

// Input (saneado)
$customerId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$customer = null;
if ($customerId) {
    $repo = new CustomerRepository();
    $customer = $repo->findByIdPrepared($customerId);
}

// Render
$title = 'CP-06 — Prepared Statements';
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
    <p>No se encontró el cliente o no se pasó ID.</p>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - Nunca concatenar input en SQL
 * - Usar PDO con prepare + execute
 * - El Repository encapsula el acceso a datos
 *
 * Ejemplo esperado en Repository (referencial):
 *
 * $stmt = $pdo->prepare('SELECT * FROM customers WHERE id = :id');
 * $stmt->execute(['id' => $id]);
 */
