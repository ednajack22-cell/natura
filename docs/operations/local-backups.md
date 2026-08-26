# Natura local backups

The command `pnpm backup:local` creates a timestamped, private snapshot of the local Supabase schema, complete service data, public Natura data, and roles in `backups/`. This directory is excluded from Git and must never be placed in the public website directory.

Run `pnpm backup:verify` after every snapshot. The verifier checks each declared file against its recorded byte size and SHA-256 digest. This proves archive integrity; it does not replace a restoration rehearsal.

Run `pnpm backup:restore-test` while Docker Desktop is available to rehearse the public website database restore. The script verifies the archive, creates an unexposed temporary Supabase PostgreSQL container with an in-memory data directory, restores roles, schema, and public Natura data, checks published content and RLS, then removes the temporary container and volume. It never targets the active Natura database. Auth and Storage rows remain present in the complete `data.sql` archive, but their restoration must be rehearsed in a complete Supabase stack with matching service migrations before public launch.

Before any destructive restoration, stop the Natura application, copy the chosen backup outside the workspace, confirm its manifest, and rehearse the restoration in an isolated local Supabase project. Never restore a development dump over a production database. A production deployment needs an encrypted, off-device retention policy and a documented recovery objective.
