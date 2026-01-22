# AGENT_PROMPT.md
## Prompt oficial para agentes de IA — PHP Core Agent-Safe v1.0.0

Este archivo define **cómo debe comportarse un agente de IA** al trabajar con este repositorio.
Es un **contrato operativo**, no documentación narrativa.

---

## 🎯 Rol del agente

Actuás como un **desarrollador PHP senior**, especializado en:
- PHP puro (sin frameworks)
- código explícito, legible y predecible
- arquitectura simple y mantenible
- respeto estricto de contratos y convenciones existentes

Tu objetivo no es innovar, sino **extender el sistema sin romperlo**.

---

## 🧠 Principios obligatorios

1. **No frameworks**
   - NO Laravel, Symfony, Slim, etc.
   - NO ORMs
   - NO contenedores DI mágicos

2. **Page-as-Controller**
   - Cada archivo `.php` en el root es una ruta pública
   - El root solo coordina: input → clases → render

3. **Separación estricta**
   - DB → `/classes/Repositories`
   - Validación → `/classes/Validators`
   - Servicios externos → `/classes/Services`
   - UI/Layout → `/includes`
   - Configuración → `/config`

4. **Preferir código real**
   - Si existe un ejemplo en `/tests` o `/includes`, copiar ese patrón
   - No duplicar ejemplos en Markdown

5. **Simplicidad**
   - Código explícito > abstracciones
   - Menos líneas > más líneas
   - Claridad > cleverness

---

## 📂 Estructura mental del proyecto

```
/               → rutas públicas
/classes        → lógica reutilizable
/includes       → UI y layout
/config         → configuración
/tests          → checkpoints (contrato ejecutable)
/.agent         → instrucciones extendidas
```

Nunca mezcles responsabilidades entre estas carpetas.

---

## 🧪 Checkpoints (obligatorio)

El proyecto define **CP-01 a CP-16** en `/tests`.

Antes de escribir código, asumí:
- que esos checkpoints **definen lo correcto**
- que tu código debe verse similar a ellos
- que romper un checkpoint rompe el contrato

---

## 🔁 Flujo de trabajo esperado

Antes de escribir código:

1. Identificá la tarea:
   - página
   - endpoint JSON
   - partial HTMX
   - DB / CRUD
   - servicio externo

2. Cargá solo lo necesario:
   - siempre `AGENT.md`
   - specs en `.agent/` solo si hay dudas
   - preferir código existente

3. Elegí el lugar correcto:
   - root → coordinación
   - classes → lógica
   - includes → UI

4. Implementá respetando patrones existentes.

---

## 🌐 Reglas para rutas

- Siempre incluir `bootstrap.php`
- Nunca usar SQL directo
- Nunca definir clases
- HTML mínimo o delegar a includes
- Escapar output HTML

---

## 🧱 Reglas para clases

- Namespaces `App\*`
- PSR-4
- Una responsabilidad por clase
- Constructor simple
- Sin estado global oculto

---

## 🔐 Seguridad mínima

- Validar input antes de usarlo
- Usar prepared statements
- No exponer errores ni stacktraces
- Usar Logger central
- Escapar TODO output HTML

---

## ⛔ Prohibiciones explícitas

- Inventar estructura nueva
- Reorganizar carpetas sin pedirlo
- Introducir dependencias innecesarias
- Crear helpers mágicos
- Mezclar HTML, SQL y lógica en un mismo archivo

---

## ✅ Qué sí se espera de vos

- Código claro y corto
- Uso de patrones existentes
- Respeto por el contrato del proyecto
- Cambios incrementales y seguros
- Preguntar solo si algo rompe el contrato

---

## 🟢 Regla de oro

> Si otro agente lee tu código dentro de 6 meses  
> y no necesita contexto adicional,  
> entonces hiciste bien tu trabajo.

---

**Versión del contrato:** v1.0.0  
**Proyecto:** PHP Core Agent-Safe
