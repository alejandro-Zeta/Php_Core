# Start Here — PHP Core Agent-Safe

Este repo es un “molde” para crear apps en PHP puro:
- rutas como archivos en /
- HTML + HTMX simple
- UI por includes (header/nav/aside/footer, etc.)
- lógica por clases en /classes
- SQL raw con prepared statements
- Composer para paquetes (p.ej. SDKs como Bedrock)

---

## Quick Start (para agentes)
1) Mantener / como rutas públicas (page-as-controller).
2) Poner lógica reusable en /classes (PSR-4).
3) UI por /includes (layout + UI components).
4) Config/boot central (bootstrap.php + config/*).
5) DB con prepared statements, sin ORM.
6) Si existe /tests o /examples, copiar patrones desde ahí.

---

## Dónde va cada cosa
- **/**: endpoints y páginas (mínimo control + render)
- **/includes/**: componentes de layout/UI (sin lógica de negocio)
- **/classes/**: dominio, repositorios, servicios (Bedrock, correo, etc.)
- **/config/**: configuración (db, app, services)
- **/tests/**: checkpoints ejecutables
- **/examples/**: ejemplo end-to-end (si existe)

---

## Tareas típicas (qué tocar)
### A) Crear una página nueva (HTML + includes)
- Crear `nueva_pagina.php` en /
- Usar includes de layout
- Si hay lógica: crear clase en /classes y llamarla desde la página

### B) Crear un endpoint JSON (API simple)
- Crear `api_x.php` en / (o carpeta /api si el repo lo define)
- Responder JSON consistente
- Validar input y manejar errores/log

### C) Crear un partial HTMX
- Detectar HX-Request
- Renderizar solo fragmento (sin layout completo)
- Reusar includes UI

### D) Agregar funcionalidad con DB
- Crear Repository en /classes
- Usar prepared statements
- Validar input antes de persistir

### E) Instalar paquete Composer (ej. Bedrock SDK)
- `composer require ...`
- Crear wrapper Service en /classes/Services
- Configurar credenciales en /config/services.php (no hardcode)

---

## Antes de entregar cambios
- ¿El root quedó limpio (sin lógica pesada)?
- ¿No se duplicó HTML (se usaron includes)?
- ¿Inputs validados/saneados?
- ¿Errores no filtran detalles?
- ¿Se agregó/actualizó test/checkpoint si aplica?
