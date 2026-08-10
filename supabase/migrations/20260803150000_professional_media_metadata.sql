alter table public.media_assets
  alter column bucket set default 'published_images',
  add column original_name text,
  add column mime_type text check (mime_type is null or mime_type in ('image/jpeg', 'image/png', 'image/webp', 'image/avif')),
  add column file_size bigint check (file_size is null or file_size > 0),
  add column license text not null default 'original' check (license in ('original', 'licensed-stock', 'creative-commons', 'public-domain'));

create index media_assets_created_index on public.media_assets (created_at desc);
