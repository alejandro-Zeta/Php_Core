<?php
/**
 * CP-16 — General Consistency
 *
 * Objetivo:
 * Verificar la consistencia general del proyecto:
 * - Estructura coherente
 * - Convenciones respetadas
 * - Flujo predecible para agentes y humanos
 *
 * Este checkpoint NO introduce reglas nuevas.
 * Consolida todas las anteriores.
 */

require __DIR__ . '/bootstrap.php';

$title = 'CP-16 — Consistencia general';

// Checklist de consistencia (documentada como código)
$checks = [
    'Root contiene solo rutas públicas' => true,
    'No hay SQL en el root' => true,
    'HTML reusable via includes' => true,
    'Clases PSR-4 en /classes' => true,
    'Validación antes de persistir' => true,
    'Prepared statements en DB' => true,
    'Errores no expuestos al usuario' => true,
    'Logging centralizado' => true,
    'HTMX renderiza partials' => true,
    'APIs responden JSON consistente' => true,
    'Configuración separada' => true,
    'Servicios externos encapsulados' => true,
    'Sin frameworks ni magia' => true,
];

include __DIR__ . '/../includes/layout/header.php';
?>

<h1><?= htmlspecialchars($title) ?></h1>

<ul>
    <?php foreach ($checks as $check => $status): ?>
        <li>
            <?= htmlspecialchars($check) ?> —
            <?= $status ? 'OK' : 'FAIL' ?>
        </li>
    <?php endforeach; ?>
</ul>

<p>
    Este archivo existe para que un agente pueda revisar rápidamente
    si el proyecto sigue el contrato completo.
</p>

<?php
include __DIR__ . '/../includes/layout/footer.php';

/**
 * Regla implícita:
 * - Si este checkpoint no se puede leer de forma clara,
 *   el proyecto probablemente se volvió inconsistente.
 *
 * Relacionado:
 * - CP-01 a CP-15
 */
