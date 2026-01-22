<?php
/**
 * config/app.php
 *
 * Configuración general de la aplicación.
 */

return [
    'name' => 'PHP Core Agent-Safe',
    'env'  => $_ENV['APP_ENV'] ?? 'local',
    'debug' => ($_ENV['APP_DEBUG'] ?? 'false') === 'true',
];
