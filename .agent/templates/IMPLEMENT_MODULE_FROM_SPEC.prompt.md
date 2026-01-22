# IMPLEMENT_MODULE_FROM_SPEC.prompt.md
## Prompt Template — Implement Module From Spec (PHP Core Agent-Safe)

Use this prompt to IMPLEMENT a module that has already been
DESCRIBED AND APPROVED via specs.

---

## 🎯 Prompt

You are working inside an existing project based on
**PHP Core Agent-Safe v1.0.0**.

Context:
- The project already exists and is running.
- One or more specs describing a module already exist under `.agent/specs/`.
- These specs are APPROVED and define project truth.
- The core structure MUST NOT be modified.
- No frameworks are allowed.

Input:
- Module name: [MODULE_NAME]
- Specs to implement:
  - [LIST SPEC FILES HERE]

Tasks:

1. Read and follow the provided specs strictly.
2. Implement the module using existing project conventions.
3. Generate ONLY the files required to implement the module.

Implementation scope may include:
- Page-as-Controller routes in the root
- Repository classes under `/classes/Repositories`
- Validator classes under `/classes/Validators`
- Service classes under `/classes/Services` (if required)
- UI includes under `/includes/ui`

Rules:
- DO NOT modify the core structure.
- DO NOT refactor existing code.
- DO NOT invent new patterns.
- DO NOT add new dependencies.
- DO NOT generate specs or documentation.
- DO NOT generate SQL migrations unless explicitly requested.

Mandatory constraints:
- Follow checkpoints CP-01 to CP-16.
- Use prepared statements for DB access.
- Validate input before persistence.
- Escape all HTML output.
- Use Logger for error handling.

Output:
- Only implementation code files.
- Each file must include its intended path.
- No explanations unless explicitly requested.

---

## 📝 Notes

- Specs define WHAT must be built.
- This prompt defines HOW to build it.
- If a spec is unclear or contradictory, ASK before implementing.

Project: PHP Core Agent-Safe  
Version: v1.0.0