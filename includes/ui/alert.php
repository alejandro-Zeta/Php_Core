<?php
/**
 * includes/ui/alert.php
 *
 * Componente UI: Alert
 *
 * Variables esperadas:
 * - $type: success | error | warning | info
 * - $message: string
 */

$type = $type ?? 'info';
$message = $message ?? '';

$classes = [
    'success' => 'alert-success',
    'error'   => 'alert-error',
    'warning' => 'alert-warning',
    'info'    => 'alert-info',
];

$class = $classes[$type] ?? $classes['info'];
?>

<div class="alert <?= htmlspecialchars($class) ?>">
    <?= htmlspecialchars($message) ?>
</div>
