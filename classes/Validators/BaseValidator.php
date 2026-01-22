<?php
namespace App\Validators;

/**
 * BaseValidator
 *
 * Clase base para validadores explícitos.
 * Cumple CP-07.
 */
abstract class BaseValidator
{
    protected array $errors = [];

    abstract public function validate(array $input): array;

    protected function require(string $field, array $input, string $message): void
    {
        if (empty($input[$field])) {
            $this->errors[] = $message;
        }
    }

    protected function email(string $field, array $input, string $message): void
    {
        if (!filter_var($input[$field] ?? null, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = $message;
        }
    }
}
