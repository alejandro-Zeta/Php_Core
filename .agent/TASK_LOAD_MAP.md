# Task Load Map (Qué cargar según tarea)

Regla: L0 siempre. Luego solo lo mínimo.

| Tarea | Cargar | Implementar |
|------|--------|-------------|
| Nueva página HTML | L0 + specs/views-and-layout.md | / + /includes |
| Nueva ruta con lógica | L0 + specs/core.md | / + /classes |
| Partial HTMX | L0 + specs/htmx.md | / + /includes/ui |
| Endpoint JSON | L0 + specs/api.md | / (o /api) + /classes |
| DB (CRUD) | L0 + specs/database-management.md + specs/validation.md | /classes/*Repository |
| Logging/errores | L0 + specs/error-handling.md + specs/logging.md | bootstrap + helpers |
| Seguridad | L0 + specs/security.md | global + inputs |
| Deploy | L0 + specs/deployment.md | infra |
| Performance | L0 + specs/performance.md | db + caching |

Si existe /tests o /examples: cargar L3 (código) antes que Markdown.
