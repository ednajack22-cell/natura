# Natura repository instructions

## Stack
- Next.js App Router, React, TypeScript strict, Tailwind CSS.
- Supabase local for PostgreSQL, Auth, and Storage.
- Server Components by default; Client Components only for required browser interaction.

## Quality gate
- Run `pnpm lint`, `pnpm typecheck`, and `pnpm build` after meaningful changes.
- Run database and RLS tests when a schema or policy changes.
- Do not add a dependency without explaining the need.

## Security
- Never commit secrets or privileged keys.
- Verify authentication and the admin role in every sensitive Server Action and Route Handler.
- Keep RLS enabled on exposed tables and test forbidden operations.
- The local Supabase stack must never be exposed to public traffic.

## SEO and content
- Every public content item needs a stable URL, unique metadata, canonical, breadcrumb, and accurate structured data.
- Keep public pages statically rendered or cached where practical.
- Use natural English, original content, and no medical or ranking guarantees.
- Cite sources for every guide. They are shown to readers by default; the site owner can hide them with the "Sources" switch in Natura Options → Guides, but they stay filled in.

## Definition of done
- The requested behavior works, empty/error/loading states are covered, accessibility is checked, no secret is exposed, tests pass, and the production build succeeds.
