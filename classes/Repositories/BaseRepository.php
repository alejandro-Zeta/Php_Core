<?php
namespace App\Repositories;

use PDO;
use RuntimeException;

/**
 * BaseRepository
 *
 * Provee conexión PDO y helpers comunes.
 * Cumple CP-03, CP-06.
 */
abstract class BaseRepository
{
    protected PDO $db;

    public function __construct()
    {
        $cfg = config('database');

        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $cfg['driver'],
            $cfg['host'],
            $cfg['port'],
            $cfg['database'],
            $cfg['charset']
        );

        try {
            $this->db = new PDO(
                $dsn,
                $cfg['username'],
                $cfg['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (\Throwable $e) {
            throw new RuntimeException('Database connection failed');
        }
    }
}
