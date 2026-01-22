# Agent Contract (PHP Core, No Frameworks)

Este proyecto define cómo escribir aplicaciones en PHP puro, de forma ordenada y consistente, sin frameworks (no Laravel).

## Principios
- Root = rutas: cada archivo .php en / es una ruta pública.
- HTML/HTMX vive en las rutas o en includes (componentes).
- Lógica pesada NO vive en /: va a clases PSR-4 en /classes.
- SQL raw (sin ORM). Seguridad y validación explícitas.
- Preferir código real (/tests, /examples) sobre texto.

## Reglas duras
1) No inventes frameworks, ORMs, routers, containers DI complejos.
2) No metas queries SQL largas en el root.
3) No dupliques HTML: usa /includes (layout + UI).
4) Todo lo compartido debe ser reusable: function/helpers mínimos o clases.
5) Errores: no exponer detalles al usuario; log interno.
6) Inputs: validar y sanear siempre; usar prepared statements.
7) Mantener simple: explícito > mágico.

## Flujo para cualquier tarea
1) Identificar: ¿página? ¿api json? ¿htmx partial? ¿db? ¿nuevo paquete composer?
2) Cargar niveles: L0 siempre, L1 si hay duda, L2 solo spec del tema.
3) Implementar en el lugar correcto (root vs classes vs includes).
4) Agregar/actualizar checkpoint o test si aplica.

## Donde empezar
Leer .agent/START-HERE.md.

El resto de las instrucciones del agente viven en el directorio `.agent/`.
No cargarlas salvo que la tarea lo requiera.
