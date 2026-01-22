<?php
/**
 * index.php
 *
 * Ruta principal de la aplicación.
 * Page-as-Controller puro.
 */

require __DIR__ . '/bootstrap.php';

$title = 'Home';

// Render layout
include __DIR__ . '/includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<p>Proyecto PHP Core Agent-Safe funcionando correctamente.</p>

<?php
include __DIR__ . '/includes/layout/footer.php';
