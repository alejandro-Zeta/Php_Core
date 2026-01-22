<?php
/**
 * CP-05 — PSR-4 Classes
 *
 * Objetivo:
 * Verificar el uso correcto de clases bajo PSR-4 en /classes,
 * con namespaces claros y responsabilidades únicas.
 *
 * Este archivo demuestra:
 * - Autoload via Composer
 * - Uso de namespaces App\*
 * - Separación entre ruta (root) y clases
 */

require __DIR__ . '/bootstrap.php';

use App\Services\GreetingService;

// Control mínimo
$name = isset($_GET['name']) ? trim($_GET['name']) : 'Invitado';

// Delegación a clase PSR-4
$service = new GreetingService();
$message = $service->greet($name);

// Render
$title = 'CP-05 — Clases PSR-4';
include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>
<p><?= htmlspecialchars($message) ?></p>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - Las clases viven en /classes bajo namespace App\
 * - El root NO define clases
 * - Cada clase tiene una responsabilidad clara
 * - Autoloading via Composer (PSR-4)
 *
 * Ejemplo esperado (no definido aquí):
 * /classes/Services/GreetingService.php
 */
