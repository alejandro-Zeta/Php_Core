# START_PROJECT.prompt.md
## Prompt Template — Start New Project (PHP Core Agent-Safe)

Use this prompt to start a NEW project based on PHP Core Agent-Safe.

---

## 🎯 Prompt

You are working with the repository **PHP Core Agent-Safe v1.0.0**.

Context:
- This is a NEW project cloned from the core template.
- The core structure MUST NOT be modified.
- No frameworks are allowed.

Initial decisions:
- Database: [MYSQL | POSTGRES | MONGO]
- Use Docker for local development: [YES | NO]

Tasks:
1. If Docker is enabled:
   - Assume Docker is already configured and running.
   - Use the database defined by the selected Docker setup.
   - Do NOT create or modify Docker files.

2. Create INITIAL SPECS only (NO implementation yet):
   - Database schema spec (tables / collections, fields, relations).
   - Optional domain specs if relevant.

Rules:
- Output ONLY Markdown specs.
- Place specs under `.agent/specs/`.
- Do NOT generate PHP code.
- Do NOT generate SQL migrations.
- Do NOT generate repositories, pages, or services.

Constraints:
- Follow PHP Core Agent-Safe conventions.
- Keep specs simple and explicit.
- Avoid implementation details.

Output:
- One or more Markdown spec files.

---

## 📝 Notes

- This prompt is a TEMPLATE.
- Replace values in brackets before use.
- Specs define project truth; code comes later.

Project: PHP Core Agent-Safe  
Version: v1.0.0