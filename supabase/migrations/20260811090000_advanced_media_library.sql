alter table public.media_assets
  add column updated_at timestamptz not null default now();

create or replace function public.media_asset_usage(p_asset_id uuid)
returns table (
  content_id uuid,
  content_type text,
  title text,
  slug text,
  status public.content_status,
  usage_location text
)
language sql
stable
security invoker
set search_path = ''
as $$
  with asset as (
    select object_path
    from public.media_assets
    where id = p_asset_id
  ), references_found as (
    select c.id, c.content_type, c.title, c.slug, c.status, 'content body'::text as usage_location
    from public.content_items c
    cross join asset a
    where c.body::text like '%' || a.object_path || '%'

    union all

    select c.id, c.content_type, c.title, c.slug, c.status, 'diagnostic image'::text
    from public.problem_profiles p
    join public.content_items c on c.id = p.content_id
    cross join asset a
    where coalesce(p.image_url, '') like '%' || a.object_path || '%'

    union all

    select c.id, c.content_type, c.title, c.slug, c.status, 'guide image'::text
    from public.guide_profiles g
    join public.content_items c on c.id = g.content_id
    cross join asset a
    where coalesce(g.image_url, '') like '%' || a.object_path || '%'

    union all

    select c.id, c.content_type, c.title, c.slug, c.status, 'calendar image'::text
    from public.calendar_profiles calendar
    join public.content_items c on c.id = calendar.content_id
    cross join asset a
    where coalesce(calendar.image_url, '') like '%' || a.object_path || '%'

    union all

    select c.id, c.content_type, c.title, c.slug, c.status, 'review product image'::text
    from public.review_products product
    join public.content_items c on c.id = product.review_content_id
    cross join asset a
    where coalesce(product.image_url, '') like '%' || a.object_path || '%'
  )
  select distinct references_found.*
  from references_found
  order by title, usage_location;
$$;

revoke all on function public.media_asset_usage(uuid) from public, anon;
grant execute on function public.media_asset_usage(uuid) to authenticated;

create or replace function public.prevent_used_media_asset_deletion()
returns trigger
language plpgsql
security invoker
set search_path = ''
as $$
begin
  if exists (select 1 from public.media_asset_usage(old.id)) then
    raise exception 'Media asset is still used by editorial content.' using errcode = 'P0001';
  end if;
  return old;
end;
$$;

create trigger prevent_used_media_asset_deletion
  before delete on public.media_assets
  for each row execute procedure public.prevent_used_media_asset_deletion();
