<?php
namespace App\Support;

/**
 * Logger
 *
 * Logger centralizado y simple.
 * Cumple CP-08 y CP-09.
 */
class Logger
{
    protected static string $logFile = __DIR__ . '/../../storage/app.log';

    protected static function write(string $level, string $message, array $context = []): void
    {
        $date = date('Y-m-d H:i:s');

        $entry = [
            'date' => $date,
            'level' => strtoupper($level),
            'message' => $message,
            'context' => $context,
        ];

        $line = json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL;

        @file_put_contents(self::$logFile, $line, FILE_APPEND | LOCK_EX);
    }

    public static function info(string $message, array $context = []): void
    {
        self::write('info', $message, $context);
    }

    public static function notice(string $message, array $context = []): void
    {
        self::write('notice', $message, $context);
    }

    public static function warning(string $message, array $context = []): void
    {
        self::write('warning', $message, $context);
    }

    public static function error(string $message, array $context = []): void
    {
        self::write('error', $message, $context);
    }

    public static function critical(string $message, array $context = []): void
    {
        self::write('critical', $message, $context);
    }
}
