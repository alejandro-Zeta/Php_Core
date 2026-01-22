<?php
/**
 * CP-04 — Includes as Components
 *
 * Objetivo:
 * Verificar el uso correcto de includes para layout y UI,
 * evitando duplicación de HTML en el root.
 *
 * Este archivo demuestra:
 * - Layout compuesto por includes
 * - UI reutilizable
 * - Root sin HTML duplicado
 */

require __DIR__ . '/bootstrap.php';

// Datos para layout
$title = 'CP-04 — Includes como componentes';
$userName = 'Usuario Demo';

// Render layout
include __DIR__ . '/../includes/layout/head.php';
include __DIR__ . '/../includes/layout/header.php';
include __DIR__ . '/../includes/layout/nav.php';
include __DIR__ . '/../includes/layout/aside.php';
?>

<main>
    <h1><?= htmlspecialchars($title) ?></h1>

    <?php
    // UI component
    $type = 'success';
    $message = 'Los includes se están usando correctamente.';
    include __DIR__ . '/../includes/ui/alert.php';
    ?>

    <p>Este contenido vive en la ruta, pero el layout y la UI se delegan.</p>
</main>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Reglas implícitas:
 * - El root NO define layout completo inline
 * - El HTML repetible vive en /includes
 * - Los includes no acceden a DB ni contienen lógica de negocio
 * - El root solo compone componentes
 */
