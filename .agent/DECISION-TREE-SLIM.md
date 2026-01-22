# Decision Tree (Slim)

1) ¿Es una ruta pública?
- Sí → archivo .php en /
- No → clase en /classes o include en /includes

2) ¿Hay HTML visible?
- Sí → usar includes de layout/UI
- No → probablemente API JSON o service

3) ¿Es HTMX?
- Sí → responder fragmento (partial), no layout completo
- No → render completo

4) ¿Toca DB?
- Sí → Repository en /classes, prepared statements, validación explícita
- No → lógica simple o service externo

5) ¿Integra SDK externo?
- Sí → /classes/Services + config/services.php
- No → mantener simple

6) ¿Reutilizable?
- Sí → /classes o /includes/ui
- No → mantener dentro de la ruta con mínimo control
