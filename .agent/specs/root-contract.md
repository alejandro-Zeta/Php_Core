# Root Contract (Rutas Públicas)

El directorio `/` define las rutas públicas de la aplicación.

## Qué SÍ puede haber
- Archivos `.php` que representen páginas o endpoints
- Control mínimo: obtener input, llamar clases, renderizar includes
- Detección de HTMX / API

## Qué NO puede haber
- Queries SQL largas
- Lógica de negocio compleja
- Clases definidas en el root
- HTML duplicado o layouts grandes inline
- Configuración hardcodeada

## Reglas obligatorias
1) Cada archivo del root es una ruta.
2) Si la lógica crece, moverla a `/classes`.
3) HTML reutilizable → `/includes`.
4) Configuración → `/config`.
5) Errores: no mostrar detalles al usuario.
6) Root debe ser fácil de leer en < 2 minutos.

Relacionado:
- CP-01, CP-02, CP-03
