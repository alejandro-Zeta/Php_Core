<?php
/**
 * config/services.php
 *
 * Configuración de servicios externos (APIs, SDKs, Bedrock, etc.).
 */

return [
    'bedrock' => [
        'region' => $_ENV['BEDROCK_REGION'] ?? 'us-east-1',
        'model'  => $_ENV['BEDROCK_MODEL'] ?? 'default',
        'key'    => $_ENV['BEDROCK_KEY'] ?? null,
        'secret' => $_ENV['BEDROCK_SECRET'] ?? null,
    ],
];
