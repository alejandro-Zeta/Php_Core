<?php
/**
 * CP-03 — No SQL in root
 *
 * Objetivo:
 * Asegurar que los archivos del root NO contengan SQL.
 * Todo acceso a datos debe vivir en /classes (Repository/Service).
 *
 * Este archivo muestra:
 * - Un anti-pattern (comentado) de SQL en root
 * - El patrón correcto usando un Repository
 */

require __DIR__ . '/bootstrap.php';

use App\Repositories\CustomerRepository;

// -------------------------
// ❌ ANTI-PATTERN (PROHIBIDO)
// -------------------------
// $pdo = new PDO($dsn, $user, $pass);
// $stmt = $pdo->query("SELECT * FROM customers WHERE id = " . $_GET['id']);
// $customer = $stmt->fetch();

// -------------------------
// ✅ PATRÓN CORRECTO
// -------------------------
$customerId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$customer = null;
if ($customerId) {
    $repo = new CustomerRepository();
    $customer = $repo->findById($customerId);
}

// Render
$title = 'CP-03 — No SQL en el root';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<p>Este archivo demuestra que el root no contiene SQL. El acceso a datos se delega a un Repository.</p>

<?php if ($customer): ?>
    <p><strong>Cliente:</strong> <?= htmlspecialchars($customer['name']) ?></p>
<?php else: ?>
    <p>No hay cliente (o no se pasó id).</p>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - El root no usa PDO directamente (salvo healthchecks explícitos del template, si existieran).
 * - El root no construye queries, ni concatena input.
 * - Repository encapsula SQL y usa prepared statements (ver CP-06).
 */
