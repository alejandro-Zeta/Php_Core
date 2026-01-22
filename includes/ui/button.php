<?php
/**
 * includes/ui/button.php
 *
 * Componente UI: Button
 *
 * Variables esperadas:
 * - $label: string
 * - $href: string|null
 * - $type: primary | secondary
 */

$label = $label ?? 'Button';
$href  = $href ?? null;
$type  = $type ?? 'primary';

$class = $type === 'secondary' ? 'btn-secondary' : 'btn-primary';
?>

<?php if ($href): ?>
    <a href="<?= htmlspecialchars($href) ?>" class="btn <?= htmlspecialchars($class) ?>">
        <?= htmlspecialchars($label) ?>
    </a>
<?php else: ?>
    <button class="btn <?= htmlspecialchars($class) ?>">
        <?= htmlspecialchars($label) ?>
    </button>
<?php endif; ?>
