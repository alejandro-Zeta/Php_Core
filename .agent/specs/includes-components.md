# Includes as Components

Los includes funcionan como componentes simples de UI y layout.
Su objetivo es evitar duplicación de HTML y mantener el root limpio.

---

## Estructura recomendada

```
/includes
├─ layout/
│  ├─ head.php
│  ├─ header.php
│  ├─ nav.php
│  ├─ aside.php
│  └─ footer.php
└─ ui/
   ├─ alert.php
   ├─ button.php
   └─ table.php
```

---

## Reglas obligatorias

1. Un include **NO** accede a la base de datos.
2. Un include **NO** contiene lógica de negocio.
3. Un include **NO** define clases.
4. Un include **NO** incluye otros archivos de forma implícita.
5. El include solo renderiza HTML (y JS mínimo si aplica).

---

## Paso de datos al include

Los datos deben definirse **antes** del include, de forma explícita.

```php
$title = 'Dashboard';
$userName = $user['name'] ?? 'Invitado';

include __DIR__ . '/includes/layout/header.php';
```

Dentro del include se utilizan solo las variables definidas previamente.

---

## Includes de layout

Los includes de layout definen la estructura general de la página.

Ejemplos:
- `head.php`: `<head>`, meta tags, CSS, JS global
- `header.php`: header superior
- `nav.php`: navegación principal
- `aside.php`: panel lateral
- `footer.php`: pie de página

Estos archivos **no** deben contener lógica condicional compleja.

---

## Includes de UI

Los includes de UI son componentes reutilizables:

- alertas
- botones
- tablas
- formularios simples

Ejemplo de uso:

```php
$type = 'success';
$message = 'Datos guardados correctamente';

include __DIR__ . '/includes/ui/alert.php';
```

---

## Anti-patterns (prohibido)

- Includes que ejecutan SQL
- Includes que validan input
- Includes que dependen de `$_POST`, `$_GET` o `$_SESSION`
- Includes con `require` o `include` internos ocultos
- Includes con más de una responsabilidad

---

## Relación con checkpoints

Este documento está asociado a:
- CP-04 — Uso correcto de includes
- CP-02 — Page-as-controller

Si un include viola estas reglas, el checkpoint correspondiente falla.
