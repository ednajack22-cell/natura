-- Provision the storage buckets from a migration.
--
-- Until now `published_images` and `draft_images` existed only because
-- `supabase/config.toml` declares them, and that file is read exclusively by the
-- local CLI. On a hosted project the buckets were simply absent: the earlier
-- `update storage.buckets ...` statement matched zero rows and reported success,
-- the storage policies pointed at nothing, and every media upload failed with no
-- migration error to explain why.
--
-- Creating them here makes `supabase db push` sufficient to stand up a working
-- environment, and keeps the delivery limits identical in local and production.

insert into storage.buckets (id, name, public, file_size_limit, allowed_mime_types)
values
  ('published_images', 'published_images', true, 1572864, array['image/webp']),
  ('draft_images', 'draft_images', false, 1572864, array['image/webp'])
on conflict (id) do update set
  public = excluded.public,
  file_size_limit = excluded.file_size_limit,
  allowed_mime_types = excluded.allowed_mime_types;
