# Checkpoints (Executable)

Los checkpoints definen qué significa “cumplir” este proyecto.
No contienen ejemplos largos: el código vive en /tests.

Regla: si hay duda, revisar el checkpoint correspondiente.

| CP | Qué valida | Archivo |
|----|-----------|---------|
| CP-01 | El root solo contiene rutas | tests/CP-01-root-is-clean.php |
| CP-02 | Page-as-controller | tests/CP-02-page-as-controller.php |
| CP-03 | No hay SQL en el root | tests/CP-03-no-sql-in-root.php |
| CP-04 | HTML reusable via includes | tests/CP-04-includes-used.php |
| CP-05 | Clases PSR-4 | tests/CP-05-psr4-classes.php |
| CP-06 | Prepared statements | tests/CP-06-prepared-statements.php |
| CP-07 | Validación explícita | tests/CP-07-validation.php |
| CP-08 | Manejo de errores seguro | tests/CP-08-error-handling.php |
| CP-09 | Logging centralizado | tests/CP-09-logging.php |
| CP-10 | HTMX como partial | tests/CP-10-htmx-partial.php |
| CP-11 | API JSON consistente | tests/CP-11-api-json.php |
| CP-12 | Config separada | tests/CP-12-config-separation.php |
| CP-13 | Servicios externos encapsulados | tests/CP-13-services-wrapper.php |
| CP-14 | Seguridad básica | tests/CP-14-security-basics.php |
| CP-15 | Sin frameworks | tests/CP-15-no-frameworks.php |
| CP-16 | Consistencia general | tests/CP-16-consistency.php |

Regla: ningún checkpoint se documenta dos veces.
