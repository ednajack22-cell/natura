create type public.user_role as enum ('admin');
create type public.content_status as enum ('draft', 'review', 'published', 'archived');

create table public.profiles (
  id uuid primary key references auth.users(id) on delete cascade,
  role public.user_role not null default 'admin',
  display_name text,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create or replace function public.handle_new_admin_user()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
begin
  if coalesce(new.raw_app_meta_data ->> 'natura_admin', 'false') = 'true' then
    insert into public.profiles (id, role, display_name)
    values (new.id, 'admin', coalesce(new.raw_user_meta_data ->> 'display_name', split_part(new.email, '@', 1)))
    on conflict (id) do update set
      role = 'admin',
      display_name = excluded.display_name,
      updated_at = now();
  end if;
  return new;
end;
$$;

create trigger on_admin_user_created
  after insert or update of raw_app_meta_data, raw_user_meta_data on auth.users
  for each row execute procedure public.handle_new_admin_user();

create table public.content_items (
  id uuid primary key default gen_random_uuid(),
  content_type text not null check (content_type in ('plant', 'problem', 'guide', 'calendar', 'tool', 'review', 'page')),
  status public.content_status not null default 'draft',
  title text not null check (char_length(title) between 3 and 160),
  slug text not null unique check (slug ~ '^[a-z0-9]+(?:-[a-z0-9]+)*$'),
  excerpt text,
  body jsonb not null default '{}'::jsonb,
  seo_title text check (seo_title is null or char_length(seo_title) <= 70),
  seo_description text check (seo_description is null or char_length(seo_description) <= 180),
  published_at timestamptz,
  created_by uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now(),
  constraint published_content_has_date check (status <> 'published' or published_at is not null)
);

create table public.media_assets (
  id uuid primary key default gen_random_uuid(),
  bucket text not null default 'published_images',
  object_path text not null unique,
  alt_text text not null check (char_length(alt_text) between 3 and 300),
  credit text,
  width integer check (width is null or width > 0),
  height integer check (height is null or height > 0),
  created_by uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now()
);

create index content_items_public_index on public.content_items (content_type, published_at desc) where status = 'published';
create index content_items_search_index on public.content_items using gin (to_tsvector('english', coalesce(title, '') || ' ' || coalesce(excerpt, '')));

alter table public.profiles enable row level security;
alter table public.content_items enable row level security;
alter table public.media_assets enable row level security;

create policy "Published content is readable" on public.content_items for select to anon, authenticated using (status = 'published');
create policy "Admins read all content" on public.content_items for select to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins create content" on public.content_items for insert to authenticated with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins update content" on public.content_items for update to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins delete content" on public.content_items for delete to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

create policy "Users read their profile" on public.profiles for select to authenticated using (id = auth.uid());
create policy "Published media metadata is readable" on public.media_assets for select to anon, authenticated using (exists (select 1 from public.content_items c where c.status = 'published' and c.body::text like '%' || media_assets.id::text || '%'));
create policy "Admins manage media metadata" on public.media_assets for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.profiles, public.content_items, public.media_assets from anon, authenticated;
grant select on public.content_items, public.media_assets to anon;
grant select, insert, update, delete on public.content_items, public.media_assets to authenticated;
grant select on public.profiles to authenticated;

create policy "Published images are readable" on storage.objects for select to anon, authenticated using (bucket_id = 'published_images');
create policy "Admins manage images" on storage.objects for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
