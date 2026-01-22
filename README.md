# PHP Core Agent-Safe — v1.0.0

> **For AI agents:** read `AGENT.md` and `AGENT_PROMPT.md` before writing any code.

Template base para construir aplicaciones en **PHP puro**, sin frameworks, de forma **ordenada, explícita y segura**, diseñado para ser utilizado tanto por desarrolladores humanos como por **agentes de IA que escriben código**.

Este proyecto **no es una aplicación final**.  
Es un **core estable + contrato arquitectónico** sobre el cual crear proyectos reales.

---

## 🎯 Objetivos del proyecto

- Evitar frameworks pesados (Laravel, Symfony, etc.)
- Forzar buenas prácticas por estructura, no por teoría
- Reducir ambigüedad al trabajar con agentes de IA
- Mantener PHP simple, legible y explícito
- Separar claramente rutas, lógica, UI, configuración y servicios

---

## 🧠 Principios clave

- **Page-as-Controller**: cada archivo `.php` en el root es una ruta pública
- **Root limpio**: sin SQL, sin lógica pesada, sin clases
- **Includes como componentes**: layout y UI reutilizable
- **Clases PSR-4**: toda la lógica vive en `/classes`
- **SQL explícito + prepared statements**
- **Configuración separada**
- **Logging centralizado**
- **Sin helpers mágicos**
- **Composer solo para autoload y SDKs**

---

## 📁 Estructura del proyecto

```
/
├─ README.md
├─ AGENT.md
├─ AGENT_PROMPT.md
├─ bootstrap.php
├─ index.php
├─ .env.example
├─ config/
├─ classes/
├─ includes/
├─ tests/
├─ storage/
├─ docker/          (opcional)
└─ .agent/
   ├─ specs/
   └─ templates/
```

---

## 🚀 Requisitos

- PHP >= 8.1
- Composer
- Docker (opcional)

---

## ⚙️ Instalación rápida

```bash
composer install
cp .env.example .env
php -S localhost:8000
```

---

## 🤖 Uso con agentes de IA

- `AGENT.md`: contrato corto del agente
- `AGENT_PROMPT.md`: reglas operativas completas
- `.agent/specs/`: verdad del proyecto (dominio, DB, módulos)
- `.agent/templates/`: plantillas de prompts (cómo pedir trabajo)

---

## 🧩 Flujo recomendado con IA

1. **START_PROJECT.prompt.md** → crear specs iniciales
2. **ADD_MODULE.prompt.md** → definir un módulo
3. **IMPLEMENT_MODULE_FROM_SPEC.prompt.md** → implementar código

> Specs deciden.  
> Prompts preguntan.  
> Código ejecuta.

---

## 🧪 Checkpoints

La carpeta `/tests` define los checkpoints (CP-01 a CP-16).  
Romper un checkpoint rompe el contrato del proyecto.

---

## 📦 Versionado

Semantic Versioning.

### v1.0.0
- Primera versión estable
- Core funcional y agent-safe

---

## 📄 Licencia

MIT
