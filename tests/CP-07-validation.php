<?php
/**
 * CP-07 — Input Validation
 *
 * Objetivo:
 * Asegurar que TODO input del usuario sea validado y saneado
 * antes de ser utilizado (DB, lógica, servicios externos).
 *
 * Este archivo demuestra:
 * - Validación explícita
 * - Separación entre validación y persistencia
 * - Manejo de errores de validación
 */

require __DIR__ . '/bootstrap.php';

use App\Validators\CustomerValidator;
use App\Repositories\CustomerRepository;

// Input crudo
$input = [
    'name'  => $_POST['name']  ?? '',
    'email' => $_POST['email'] ?? '',
];

// Validación
$validator = new CustomerValidator();
$errors = $validator->validate($input);

$success = false;
if (empty($errors)) {
    $repo = new CustomerRepository();
    $repo->create($input);
    $success = true;
}

// Render
$title = 'CP-07 — Validación de input';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<?php if ($success): ?>
    <p class="success">Cliente creado correctamente.</p>
<?php else: ?>
    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - Nunca confiar en $_POST / $_GET directamente
 * - Validar antes de persistir o usar
 * - La validación vive fuera del root (Validator)
 * - El root solo orquesta flujo y render
 *
 * Ejemplo esperado:
 * /classes/Validators/CustomerValidator.php
 */
