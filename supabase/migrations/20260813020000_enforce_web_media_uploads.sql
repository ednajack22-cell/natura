update storage.buckets
set file_size_limit = 1572864,
    allowed_mime_types = array['image/webp']::text[]
where id in ('draft_images', 'published_images');

alter table public.media_assets
  add constraint media_assets_web_delivery_check
  check (
    mime_type is null
    or (
      mime_type = 'image/webp'
      and file_size between 1 and 1572864
      and width between 1 and 2400
      and height between 1 and 2400
    )
  ) not valid;
