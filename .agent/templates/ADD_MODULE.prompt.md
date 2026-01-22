# ADD_MODULE.prompt.md
## Prompt Template — Add New Module (PHP Core Agent-Safe)

Use this prompt to add a NEW MODULE to an EXISTING project
based on PHP Core Agent-Safe.

---

## 🎯 Prompt

You are working inside an existing project based on
**PHP Core Agent-Safe v1.0.0**.

Context:
- The project already exists and is running.
- The core structure MUST NOT be modified.
- No frameworks are allowed.
- Existing modules must not be broken.

Module to add:
- Module name: [MODULE_NAME]
- Domain description:
  [DESCRIBE THE MODULE DOMAIN AND RESPONSIBILITY]

Database:
- Uses existing database schema: [YES | NO]
- If NO, describe new tables / collections at spec level only.

Tasks:

1. Create SPECS ONLY for the new module:
   - Domain spec (entities, responsibilities)
   - Database changes spec (if applicable)
   - Optional UI / pages overview (high level)

2. Specs must:
   - Be written in Markdown
   - Be placed under `.agent/specs/`
   - Reference existing specs when relevant
   - Avoid implementation details

Rules:
- DO NOT generate PHP code.
- DO NOT generate SQL migrations.
- DO NOT modify existing files.
- DO NOT refactor the core.
- DO NOT invent new architecture patterns.

Constraints:
- Follow existing conventions and checkpoints.
- Keep specs explicit and minimal.
- Respect separation of concerns.

Output:
- One or more Markdown spec files describing the new module only.

---

## 📝 Notes

- This prompt is a TEMPLATE.
- Replace placeholders before use.
- Specs define WHAT the module is.
- Implementation will be requested separately.

Project: PHP Core Agent-Safe  
Version: v1.0.0