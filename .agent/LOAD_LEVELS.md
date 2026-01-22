# Load Levels (Token-Aware)

Este repo está diseñado para que un agente cargue SOLO lo necesario.

## L0 — Contracto mínimo (cargar SIEMPRE)
Objetivo: recordar reglas duras del proyecto en pocos tokens.
Archivos:
- AGENT.md
- START-HERE.md (solo la sección "Quick Start" si ya conoce el repo)

## L1 — Navegación y decisiones (cargar SOLO si hay dudas)
Objetivo: decidir qué tocar, dónde poner cada cosa.
Archivos:
- TASK_LOAD_MAP.md (cuando la tarea no es obvia)
- DECISION-TREE-SLIM.md (si hay ambigüedad)

## L2 — Specs por tema (cargar SOLO 1–2)
Objetivo: implementar sin inventar.
Regla: por tarea, cargar únicamente la spec más relevante.
Ejemplos:
- HTMX: specs/htmx.md
- DB: specs/database-management.md
- API: specs/api.md
- Seguridad: specs/security.md

## L3 — Código real y tests (preferido sobre Markdown)
Objetivo: copiar patrones correctos desde código ejecutable.
Prioridad:
1) /tests (checkpoints)
2) /examples (end-to-end)
3) /includes y /classes (patrones reales)

Regla de oro: si hay un ejemplo en código real, NO dupliques el ejemplo en Markdown.