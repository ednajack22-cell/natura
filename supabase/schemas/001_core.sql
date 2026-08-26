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
  original_name text,
  mime_type text check (mime_type is null or mime_type in ('image/jpeg', 'image/png', 'image/webp', 'image/avif')),
  file_size bigint check (file_size is null or file_size > 0),
  license text not null default 'original' check (license in ('original', 'licensed-stock', 'creative-commons', 'public-domain')),
  width integer check (width is null or width > 0),
  height integer check (height is null or height > 0),
  created_by uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now(),
  constraint media_assets_web_delivery_check check (mime_type is null or (mime_type = 'image/webp' and file_size between 1 and 1572864 and width between 1 and 2400 and height between 1 and 2400))
);

create table public.problem_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  category text not null check (category in ('watering', 'nutrition', 'pest', 'disease', 'environment', 'other')),
  urgency text not null default 'moderate' check (urgency in ('low', 'moderate', 'high')),
  symptoms text[] not null default '{}', likely_causes jsonb not null default '[]'::jsonb,
  verification_steps jsonb not null default '[]'::jsonb, recommended_actions jsonb not null default '[]'::jsonb,
  warnings text[] not null default '{}', image_url text, image_alt text, updated_at timestamptz not null default now()
);
create table public.problem_plant_links (
  problem_content_id uuid not null references public.content_items(id) on delete cascade,
  plant_content_id uuid not null references public.content_items(id) on delete cascade,
  primary key (problem_content_id, plant_content_id), check (problem_content_id <> plant_content_id)
);
create table public.guide_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  guide_type text not null check (guide_type in ('balcony', 'container', 'indoor', 'beginner', 'seasonal')),
  difficulty text not null default 'easy' check (difficulty in ('easy', 'moderate', 'advanced')),
  estimated_time_minutes integer not null default 30 check (estimated_time_minutes between 5 and 1440),
  audience text not null default '', prerequisites text[] not null default '{}', materials text[] not null default '{}',
  steps jsonb not null default '[]'::jsonb, tips text[] not null default '{}', warnings text[] not null default '{}',
  image_url text, image_alt text, updated_at timestamptz not null default now()
);
create table public.guide_plant_links (
  guide_content_id uuid not null references public.content_items(id) on delete cascade,
  plant_content_id uuid not null references public.content_items(id) on delete cascade,
  primary key (guide_content_id, plant_content_id), check (guide_content_id <> plant_content_id)
);
create table public.calendar_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  climate text not null check (climate in ('general', 'temperate', 'mediterranean', 'continental', 'tropical')),
  hemisphere text not null default 'northern' check (hemisphere in ('northern', 'southern', 'both')),
  space_type text not null default 'all' check (space_type in ('all', 'balcony', 'container', 'garden', 'indoor')),
  scope_note text not null default '', warnings text[] not null default '{}', image_url text, image_alt text, updated_at timestamptz not null default now()
);
create table public.calendar_entries (
  id uuid primary key default gen_random_uuid(), calendar_content_id uuid not null references public.content_items(id) on delete cascade,
  month smallint not null check (month between 1 and 12), activity_type text not null check (activity_type in ('plan', 'sow-indoors', 'sow-outdoors', 'plant', 'harvest', 'care', 'protect')),
  title text not null check (char_length(title) between 3 and 160), description text not null default '', priority text not null default 'normal' check (priority in ('low', 'normal', 'high')),
  sort_order smallint not null default 0, created_at timestamptz not null default now()
);
create table public.calendar_plant_links (
  calendar_content_id uuid not null references public.content_items(id) on delete cascade,
  plant_content_id uuid not null references public.content_items(id) on delete cascade,
  primary key (calendar_content_id, plant_content_id), check (calendar_content_id <> plant_content_id)
);
create table public.review_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  review_type text not null check (review_type in ('single', 'comparison', 'best-of')),
  category text not null check (category in ('seeds', 'containers', 'soil-fertilizer', 'watering-systems', 'grow-lights', 'garden-tools')),
  evidence_level text not null default 'researched' check (evidence_level in ('researched', 'hands-on', 'long-term')),
  methodology text not null default '', testing_period text not null default '',
  disclosure_type text not null default 'independent' check (disclosure_type in ('independent', 'affiliate', 'sponsored', 'product-provided')),
  disclosure_text text not null default '', verdict text not null default '', best_for text[] not null default '{}', tested_on date, updated_at timestamptz not null default now()
);
create table public.review_criteria (
  id uuid primary key default gen_random_uuid(), review_content_id uuid not null references public.content_items(id) on delete cascade,
  name text not null check (char_length(name) between 2 and 100), description text not null default '', weight numeric(5,2) not null default 0 check (weight between 0 and 100), sort_order smallint not null default 0
);
create table public.review_products (
  id uuid primary key default gen_random_uuid(), review_content_id uuid not null references public.content_items(id) on delete cascade,
  name text not null check (char_length(name) between 2 and 160), brand text not null default '', model text not null default '', product_url text, image_url text, image_alt text,
  price_note text not null default '', verdict_label text not null default '', overall_score numeric(3,1) not null check (overall_score between 0 and 10),
  pros text[] not null default '{}', cons text[] not null default '{}', specifications jsonb not null default '{}'::jsonb, is_recommended boolean not null default false, sort_order smallint not null default 0
);
create table public.review_product_scores (
  product_id uuid not null references public.review_products(id) on delete cascade, criterion_id uuid not null references public.review_criteria(id) on delete cascade,
  score numeric(3,1) not null check (score between 0 and 10), note text not null default '', primary key (product_id, criterion_id)
);
create table public.institutional_page_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  page_kind text not null check (page_kind in ('about', 'editorial-policy', 'authors', 'contact', 'legal', 'privacy', 'commercial-disclosure')),
  eyebrow text not null default '', sections jsonb not null default '[]'::jsonb check (jsonb_typeof(sections) = 'array'),
  notice text not null default '', contact_email text, last_reviewed_on date,
  requires_legal_review boolean not null default false, updated_at timestamptz not null default now()
);
create table public.plant_finder_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  min_sun_hours smallint not null default 4 check (min_sun_hours between 0 and 12),
  space_types text[] not null default array['container']::text[] check (cardinality(space_types) > 0 and space_types <@ array['windowsill', 'balcony', 'patio', 'indoor', 'container']::text[]),
  care_level text not null default 'regular' check (care_level in ('low', 'regular', 'attentive')),
  climates text[] not null default array['general']::text[] check (cardinality(climates) > 0 and climates <@ array['general', 'temperate', 'mediterranean', 'continental', 'tropical']::text[]),
  edible boolean not null default true,
  match_note text not null default '' check (char_length(match_note) <= 400),
  updated_at timestamptz not null default now()
);
create table public.plant_search_popularity (
  plant_content_id uuid primary key references public.content_items(id) on delete cascade,
  search_count bigint not null default 0 check (search_count >= 0),
  last_searched_at timestamptz not null default now()
);
create table public.editorial_contributors (
  id uuid primary key default gen_random_uuid(), slug text not null unique check (slug ~ '^[a-z0-9]+(?:-[a-z0-9]+)*$'),
  display_name text not null check (char_length(display_name) between 2 and 120), role_title text not null default '',
  bio text not null default '', expertise text[] not null default '{}', conflicts text not null default '',
  is_active boolean not null default true, is_public boolean not null default false,
  created_at timestamptz not null default now(), updated_at timestamptz not null default now()
);
create table public.content_workflows (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  author_id uuid references public.editorial_contributors(id) on delete restrict,
  reviewer_id uuid references public.editorial_contributors(id) on delete restrict,
  review_state text not null default 'unassigned' check (review_state in ('unassigned', 'in-review', 'changes-requested', 'approved')),
  review_notes text not null default '', scheduled_for timestamptz, approved_at timestamptz,
  approved_by uuid references public.profiles(id) on delete set null, updated_at timestamptz not null default now(),
  check (author_id is null or reviewer_id is null or author_id <> reviewer_id)
);

create index content_items_public_index on public.content_items (content_type, published_at desc) where status = 'published';
create index content_items_search_index on public.content_items using gin (to_tsvector('english', coalesce(title, '') || ' ' || coalesce(excerpt, '')));
create index media_assets_created_index on public.media_assets (created_at desc);
create index problem_profiles_category_index on public.problem_profiles (category, urgency);
create index problem_plant_links_plant_index on public.problem_plant_links (plant_content_id);
create index guide_profiles_type_index on public.guide_profiles (guide_type, difficulty);
create index guide_plant_links_plant_index on public.guide_plant_links (plant_content_id);
create index calendar_profiles_filter_index on public.calendar_profiles (climate, hemisphere, space_type);
create index calendar_entries_month_index on public.calendar_entries (calendar_content_id, month, sort_order);
create index calendar_plant_links_plant_index on public.calendar_plant_links (plant_content_id);
create index review_profiles_filter_index on public.review_profiles (category, review_type, evidence_level);
create index review_criteria_order_index on public.review_criteria (review_content_id, sort_order);
create index review_products_order_index on public.review_products (review_content_id, sort_order);
create index institutional_page_profiles_kind_index on public.institutional_page_profiles (page_kind, last_reviewed_on desc);
create index plant_finder_profiles_spaces_index on public.plant_finder_profiles using gin (space_types);
create index plant_finder_profiles_climates_index on public.plant_finder_profiles using gin (climates);
create index editorial_contributors_active_index on public.editorial_contributors (is_active, display_name);
create index content_workflows_schedule_index on public.content_workflows (scheduled_for) where scheduled_for is not null;
create index content_workflows_review_index on public.content_workflows (review_state, updated_at desc);

create or replace function public.media_asset_usage(p_asset_id uuid)
returns table (content_id uuid, content_type text, title text, slug text, status public.content_status, usage_location text)
language sql stable security invoker set search_path = ''
as $$
  with asset as (select object_path from public.media_assets where id = p_asset_id), references_found as (
    select c.id, c.content_type, c.title, c.slug, c.status, 'content body'::text as usage_location from public.content_items c cross join asset a where c.body::text like '%' || a.object_path || '%'
    union all select c.id, c.content_type, c.title, c.slug, c.status, 'diagnostic image'::text from public.problem_profiles p join public.content_items c on c.id = p.content_id cross join asset a where coalesce(p.image_url, '') like '%' || a.object_path || '%'
    union all select c.id, c.content_type, c.title, c.slug, c.status, 'guide image'::text from public.guide_profiles g join public.content_items c on c.id = g.content_id cross join asset a where coalesce(g.image_url, '') like '%' || a.object_path || '%'
    union all select c.id, c.content_type, c.title, c.slug, c.status, 'calendar image'::text from public.calendar_profiles calendar join public.content_items c on c.id = calendar.content_id cross join asset a where coalesce(calendar.image_url, '') like '%' || a.object_path || '%'
    union all select c.id, c.content_type, c.title, c.slug, c.status, 'review product image'::text from public.review_products product join public.content_items c on c.id = product.review_content_id cross join asset a where coalesce(product.image_url, '') like '%' || a.object_path || '%'
  )
  select distinct references_found.* from references_found order by title, usage_location;
$$;

revoke all on function public.media_asset_usage(uuid) from public, anon;
grant execute on function public.media_asset_usage(uuid) to authenticated;

create or replace function public.prevent_used_media_asset_deletion()
returns trigger language plpgsql security invoker set search_path = '' as $$
begin
  if exists (select 1 from public.media_asset_usage(old.id)) then
    raise exception 'Media asset is still used by editorial content.' using errcode = 'P0001';
  end if;
  return old;
end;
$$;

create trigger prevent_used_media_asset_deletion before delete on public.media_assets
for each row execute procedure public.prevent_used_media_asset_deletion();

alter table public.profiles enable row level security;
alter table public.content_items enable row level security;
alter table public.media_assets enable row level security;
alter table public.problem_profiles enable row level security;
alter table public.problem_plant_links enable row level security;
alter table public.guide_profiles enable row level security;
alter table public.guide_plant_links enable row level security;
alter table public.calendar_profiles enable row level security;
alter table public.calendar_entries enable row level security;
alter table public.calendar_plant_links enable row level security;
alter table public.review_profiles enable row level security;
alter table public.review_criteria enable row level security;
alter table public.review_products enable row level security;
alter table public.review_product_scores enable row level security;
alter table public.institutional_page_profiles enable row level security;
alter table public.plant_finder_profiles enable row level security;
alter table public.plant_search_popularity enable row level security;
alter table public.editorial_contributors enable row level security;
alter table public.content_workflows enable row level security;

create policy "Published content is readable" on public.content_items for select to anon, authenticated using (status = 'published');
create policy "Admins read all content" on public.content_items for select to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins create content" on public.content_items for insert to authenticated with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins update content" on public.content_items for update to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins delete content" on public.content_items for delete to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

create policy "Users read their profile" on public.profiles for select to authenticated using (id = auth.uid());
create policy "Published media metadata is readable" on public.media_assets for select to anon, authenticated using (exists (select 1 from public.content_items c where c.status = 'published' and c.body::text like '%' || media_assets.id::text || '%'));
create policy "Admins manage media metadata" on public.media_assets for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published problem profiles are readable" on public.problem_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = problem_profiles.content_id and c.content_type = 'problem' and c.status = 'published'));
create policy "Admins manage problem profiles" on public.problem_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published problem links are readable" on public.problem_plant_links for select to anon, authenticated using (exists (select 1 from public.content_items problem where problem.id = problem_plant_links.problem_content_id and problem.status = 'published') and exists (select 1 from public.content_items plant where plant.id = problem_plant_links.plant_content_id and plant.status = 'published'));
create policy "Admins manage problem links" on public.problem_plant_links for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published guide profiles are readable" on public.guide_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = guide_profiles.content_id and c.content_type = 'guide' and c.status = 'published'));
create policy "Admins manage guide profiles" on public.guide_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published guide links are readable" on public.guide_plant_links for select to anon, authenticated using (exists (select 1 from public.content_items guide where guide.id = guide_plant_links.guide_content_id and guide.status = 'published') and exists (select 1 from public.content_items plant where plant.id = guide_plant_links.plant_content_id and plant.status = 'published'));
create policy "Admins manage guide links" on public.guide_plant_links for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published calendar profiles are readable" on public.calendar_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = calendar_profiles.content_id and c.content_type = 'calendar' and c.status = 'published'));
create policy "Admins manage calendar profiles" on public.calendar_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published calendar entries are readable" on public.calendar_entries for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = calendar_entries.calendar_content_id and c.content_type = 'calendar' and c.status = 'published'));
create policy "Admins manage calendar entries" on public.calendar_entries for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published calendar links are readable" on public.calendar_plant_links for select to anon, authenticated using (exists (select 1 from public.content_items calendar where calendar.id = calendar_plant_links.calendar_content_id and calendar.status = 'published') and exists (select 1 from public.content_items plant where plant.id = calendar_plant_links.plant_content_id and plant.status = 'published'));
create policy "Admins manage calendar links" on public.calendar_plant_links for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review profiles are readable" on public.review_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = review_profiles.content_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review profiles" on public.review_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review criteria are readable" on public.review_criteria for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = review_criteria.review_content_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review criteria" on public.review_criteria for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review products are readable" on public.review_products for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = review_products.review_content_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review products" on public.review_products for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review scores are readable" on public.review_product_scores for select to anon, authenticated using (exists (select 1 from public.review_products product join public.content_items c on c.id = product.review_content_id where product.id = review_product_scores.product_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review scores" on public.review_product_scores for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published institutional profiles are readable" on public.institutional_page_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = institutional_page_profiles.content_id and c.content_type = 'page' and c.status = 'published'));
create policy "Admins manage institutional profiles" on public.institutional_page_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published plant finder profiles are readable" on public.plant_finder_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = plant_finder_profiles.content_id and c.content_type = 'plant' and c.status = 'published'));
create policy "Admins manage plant finder profiles" on public.plant_finder_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Public contributors are readable" on public.editorial_contributors for select to anon, authenticated using (is_public);
create policy "Admins manage contributors" on public.editorial_contributors for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins manage content workflows" on public.content_workflows for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.profiles, public.content_items, public.media_assets, public.guide_profiles, public.guide_plant_links, public.calendar_profiles, public.calendar_entries, public.calendar_plant_links from anon, authenticated;
grant select on public.content_items, public.media_assets to anon;
grant select, insert, update, delete on public.content_items, public.media_assets to authenticated;
grant select on public.problem_profiles, public.problem_plant_links to anon;
grant select, insert, update, delete on public.problem_profiles, public.problem_plant_links to authenticated;
grant select on public.guide_profiles, public.guide_plant_links to anon;
grant select, insert, update, delete on public.guide_profiles, public.guide_plant_links to authenticated;
grant select on public.calendar_profiles, public.calendar_entries, public.calendar_plant_links to anon;
grant select, insert, update, delete on public.calendar_profiles, public.calendar_entries, public.calendar_plant_links to authenticated;
revoke all on table public.review_profiles, public.review_criteria, public.review_products, public.review_product_scores from anon, authenticated;
grant select on public.review_profiles, public.review_criteria, public.review_products, public.review_product_scores to anon;
grant select, insert, update, delete on public.review_profiles, public.review_criteria, public.review_products, public.review_product_scores to authenticated;
revoke all on table public.institutional_page_profiles from anon, authenticated;
grant select on public.institutional_page_profiles to anon;
grant select, insert, update, delete on public.institutional_page_profiles to authenticated;
revoke all on table public.plant_finder_profiles from anon, authenticated;
grant select on public.plant_finder_profiles to anon;
grant select, insert, update, delete on public.plant_finder_profiles to authenticated;
revoke all on table public.plant_search_popularity from anon, authenticated;
revoke all on table public.editorial_contributors, public.content_workflows from anon, authenticated;
grant select on public.editorial_contributors to anon;
grant select, insert, update, delete on public.editorial_contributors, public.content_workflows to authenticated;
grant select on public.profiles to authenticated;

create policy "Published images are readable" on storage.objects for select to anon, authenticated using (bucket_id = 'published_images');
create policy "Admins manage images" on storage.objects for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

update storage.buckets set file_size_limit = 1572864, allowed_mime_types = array['image/webp']::text[] where id in ('draft_images', 'published_images');
create table public.content_revisions (
  id bigint generated always as identity primary key,
  content_id uuid not null references public.content_items(id) on delete cascade,
  version integer not null check (version > 0),
  snapshot jsonb not null,
  created_by uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now(),
  unique (content_id, version)
);

create table public.editorial_events (
  id bigint generated always as identity primary key,
  content_id uuid references public.content_items(id) on delete cascade,
  action text not null check (action in ('created', 'updated', 'status_changed', 'archived', 'review_assigned', 'review_approved', 'scheduled', 'restored')),
  previous_status public.content_status,
  next_status public.content_status,
  metadata jsonb not null default '{}'::jsonb,
  actor_id uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now()
);

create index content_items_admin_filter_index on public.content_items (status, content_type, updated_at desc);
create index content_revisions_content_index on public.content_revisions (content_id, version desc);
create index editorial_events_content_index on public.editorial_events (content_id, created_at desc);

alter table public.content_revisions enable row level security;
alter table public.editorial_events enable row level security;

create policy "Admins read content revisions" on public.content_revisions
  for select to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

create policy "Admins read editorial events" on public.editorial_events
  for select to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.content_revisions, public.editorial_events from anon, authenticated;
grant select on public.content_revisions, public.editorial_events to authenticated;

create or replace function public.capture_content_revision()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
declare
  next_version integer;
begin
  select coalesce(max(r.version), 0) + 1
    into next_version
    from public.content_revisions r
    where r.content_id = old.id;

  insert into public.content_revisions (content_id, version, snapshot, created_by)
  values (old.id, next_version, to_jsonb(old), auth.uid());

  return new;
end;
$$;

create or replace function public.log_editorial_event()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
declare
  event_action text;
begin
  if tg_op = 'INSERT' then
    event_action := 'created';
    insert into public.editorial_events (content_id, action, next_status, actor_id)
    values (new.id, event_action, new.status, coalesce(auth.uid(), new.created_by));
  else
    event_action := case
      when new.status = 'archived' and old.status <> 'archived' then 'archived'
      when new.status is distinct from old.status then 'status_changed'
      else 'updated'
    end;
    insert into public.editorial_events (content_id, action, previous_status, next_status, actor_id)
    values (new.id, event_action, old.status, new.status, auth.uid());
  end if;

  return new;
end;
$$;

create trigger capture_content_revision_before_update
  before update on public.content_items
  for each row execute procedure public.capture_content_revision();

create trigger log_editorial_event_after_change
  after insert or update on public.content_items
  for each row execute procedure public.log_editorial_event();

create or replace function public.log_content_workflow_event()
returns trigger language plpgsql security definer set search_path = '' as $$
begin
  if new.reviewer_id is distinct from old.reviewer_id and new.reviewer_id is not null then
    insert into public.editorial_events (content_id, action, metadata, actor_id) values (new.content_id, 'review_assigned', jsonb_build_object('reviewer_id', new.reviewer_id), auth.uid());
  end if;
  if new.review_state = 'approved' and old.review_state is distinct from 'approved' then
    insert into public.editorial_events (content_id, action, metadata, actor_id) values (new.content_id, 'review_approved', jsonb_build_object('approved_at', new.approved_at), auth.uid());
  end if;
  if new.scheduled_for is distinct from old.scheduled_for and new.scheduled_for is not null then
    insert into public.editorial_events (content_id, action, metadata, actor_id) values (new.content_id, 'scheduled', jsonb_build_object('scheduled_for', new.scheduled_for), auth.uid());
  end if;
  return new;
end; $$;
create trigger log_content_workflow_event_after_update after update on public.content_workflows for each row execute procedure public.log_content_workflow_event();

create or replace function public.restore_content_revision(target_revision_id bigint)
returns uuid language plpgsql security definer set search_path = '' as $$
declare target_content_id uuid; target_version integer; stored_snapshot jsonb; previous_state public.content_status;
begin
  if not exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin') then raise exception 'Administrator role required'; end if;
  select revision.content_id, revision.version, revision.snapshot into target_content_id, target_version, stored_snapshot from public.content_revisions revision where revision.id = target_revision_id;
  if target_content_id is null then raise exception 'Revision not found'; end if;
  select status into previous_state from public.content_items where id = target_content_id for update;
  update public.content_items set title = stored_snapshot->>'title', slug = stored_snapshot->>'slug', excerpt = stored_snapshot->>'excerpt', body = coalesce(stored_snapshot->'body', '{}'::jsonb), seo_title = stored_snapshot->>'seo_title', seo_description = stored_snapshot->>'seo_description', status = 'draft', published_at = null, updated_at = now() where id = target_content_id;
  insert into public.editorial_events (content_id, action, previous_status, next_status, metadata, actor_id) values (target_content_id, 'restored', previous_state, 'draft', jsonb_build_object('revision_id', target_revision_id, 'version', target_version, 'mode', 'restore-as-draft'), auth.uid());
  return target_content_id;
end; $$;

create or replace function public.publish_due_content()
returns integer language plpgsql security definer set search_path = '' as $$
declare published_count integer;
begin
  if not exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin') then raise exception 'Administrator role required'; end if;
  update public.content_items content set status = 'published', published_at = coalesce(content.published_at, now()), updated_at = now()
  from public.content_workflows workflow where workflow.content_id = content.id and workflow.scheduled_for is not null and workflow.scheduled_for <= now() and workflow.review_state = 'approved' and content.status <> 'published';
  get diagnostics published_count = row_count;
  return published_count;
end; $$;
revoke all on function public.restore_content_revision(bigint), public.publish_due_content() from public, anon;
grant execute on function public.restore_content_revision(bigint), public.publish_due_content() to authenticated;

create or replace function public.find_suitable_plants(requested_sun_hours integer default 4, requested_space text default 'container', requested_care text default 'regular', requested_climate text default 'general', result_limit integer default 6)
returns table (content_id uuid, title text, slug text, excerpt text, body jsonb, score integer, reasons text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select greatest(0, least(coalesce(requested_sun_hours, 4), 12)) as sun_hours,
      case when requested_space in ('any', 'windowsill', 'balcony', 'patio', 'indoor', 'container') then requested_space else 'container' end as space_type,
      case when requested_care in ('low', 'regular', 'attentive') then requested_care else 'regular' end as care_level,
      case when requested_climate in ('general', 'temperate', 'mediterranean', 'continental', 'tropical') then requested_climate else 'general' end as climate,
      greatest(1, least(coalesce(result_limit, 6), 24)) as safe_limit
  ), scored as (
    select content.id as content_id, content.title, content.slug, content.excerpt, content.body,
      profile.min_sun_hours, profile.space_types, profile.care_level, profile.climates, profile.match_note, input.*,
      greatest(0, 40 - greatest(profile.min_sun_hours - input.sun_hours, 0) * 12) as light_score,
      case when input.space_type = 'any' or input.space_type = any(profile.space_types) then 25 else 0 end as space_score,
      case when (case input.care_level when 'low' then 1 when 'regular' then 2 else 3 end) >= (case profile.care_level when 'low' then 1 when 'regular' then 2 else 3 end) then 20 when (case profile.care_level when 'low' then 1 when 'regular' then 2 else 3 end) - (case input.care_level when 'low' then 1 when 'regular' then 2 else 3 end) = 1 then 8 else 0 end as care_score,
      case when input.climate = 'general' or 'general' = any(profile.climates) or input.climate = any(profile.climates) then 15 else 3 end as climate_score
    from public.plant_finder_profiles profile join public.content_items content on content.id = profile.content_id cross join input
    where content.content_type = 'plant' and content.status = 'published'
  )
  select scored.content_id, scored.title, scored.slug, scored.excerpt, scored.body,
    (scored.light_score + scored.space_score + scored.care_score + scored.climate_score)::integer,
    array_remove(array[
      case when scored.sun_hours >= scored.min_sun_hours then 'Light level meets this plant''s baseline.' else format('It usually performs better with about %s hours of direct light.', scored.min_sun_hours) end,
      case when scored.space_type = 'any' then 'Works in one or more compact-space setups.' when scored.space_type = any(scored.space_types) then format('Suitable for a %s setup.', replace(scored.space_type, '-', ' ')) else 'This space type is not an ideal fit.' end,
      case when scored.care_score = 20 then 'The care rhythm fits the time you can provide.' when scored.care_score = 8 then 'Possible, but it may need a little more attention.' else 'Its care needs may exceed your preferred routine.' end,
      case when scored.climate = 'general' or 'general' = any(scored.climates) or scored.climate = any(scored.climates) then 'Compatible with the broad climate selected.' else 'Check local temperature and frost conditions carefully.' end,
      nullif(scored.match_note, '')
    ], null)::text[]
  from scored order by (scored.light_score + scored.space_score + scored.care_score + scored.climate_score) desc, scored.title
  limit (select safe_limit from input);
$$;
revoke all on function public.find_suitable_plants(integer, text, text, text, integer) from public;
grant execute on function public.find_suitable_plants(integer, text, text, text, integer) to anon, authenticated;

create or replace function public.record_plant_search_interest(search_query text)
returns uuid
language plpgsql
volatile
security definer
set search_path = ''
as $$
declare
  normalized_query text := lower(regexp_replace(trim(coalesce(search_query, '')), '\s+', ' ', 'g'));
  matched_content_id uuid;
begin
  if char_length(normalized_query) < 2 or char_length(normalized_query) > 80 then return null; end if;
  select content.id into matched_content_id
  from public.content_items content
  where content.content_type = 'plant' and content.status = 'published'
    and (lower(content.title) = normalized_query or replace(lower(content.slug), '-', ' ') = normalized_query
      or to_tsvector('english', coalesce(content.title, '') || ' ' || coalesce(content.excerpt, '')) @@ plainto_tsquery('english', normalized_query))
  order by case when lower(content.title) = normalized_query then 0 when replace(lower(content.slug), '-', ' ') = normalized_query then 1 else 2 end,
    ts_rank(to_tsvector('english', coalesce(content.title, '') || ' ' || coalesce(content.excerpt, '')), plainto_tsquery('english', normalized_query)) desc,
    content.title
  limit 1;
  if matched_content_id is null then return null; end if;
  insert into public.plant_search_popularity (plant_content_id, search_count, last_searched_at)
  values (matched_content_id, 1, now())
  on conflict (plant_content_id) do update set search_count = public.plant_search_popularity.search_count + 1, last_searched_at = now();
  return matched_content_id;
end;
$$;

create or replace function public.get_most_searched_plants(result_limit integer default 6)
returns table (content_id uuid, slug text, search_count bigint, last_searched_at timestamptz)
language sql
stable
security definer
set search_path = ''
as $$
  select content.id, content.slug, popularity.search_count, popularity.last_searched_at
  from public.plant_search_popularity popularity
  join public.content_items content on content.id = popularity.plant_content_id
  where content.content_type = 'plant' and content.status = 'published' and popularity.search_count > 0
  order by popularity.search_count desc, popularity.last_searched_at desc, content.title
  limit greatest(1, least(coalesce(result_limit, 6), 24));
$$;

revoke all on function public.record_plant_search_interest(text) from public;
revoke all on function public.get_most_searched_plants(integer) from public;
grant execute on function public.record_plant_search_interest(text) to anon, authenticated;
grant execute on function public.get_most_searched_plants(integer) to anon, authenticated;

create or replace function public.calculate_container_size(plant_group text default 'leafy-herb', plant_count integer default 1, growth_duration text default 'annual')
returns table (minimum_liters integer, preferred_liters integer, minimum_depth_cm integer, approximate_diameter_cm integer, guidance text[], assumptions text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select case when plant_group in ('leafy-herb', 'compact-fruit', 'fruiting-crop', 'root-crop', 'climbing-crop') then plant_group else 'leafy-herb' end as plant_group,
      greatest(1, least(coalesce(plant_count, 1), 6)) as plant_count,
      case when growth_duration in ('annual', 'perennial') then growth_duration else 'annual' end as growth_duration
  ), baseline as (
    select input.*, case input.plant_group when 'leafy-herb' then 3 when 'compact-fruit' then 5 when 'fruiting-crop' then 20 when 'root-crop' then 12 else 25 end::numeric as liters_per_plant,
      case input.plant_group when 'leafy-herb' then 20 when 'compact-fruit' then 25 when 'fruiting-crop' then 35 when 'root-crop' then 30 else 40 end as base_depth from input
  ), calculated as (
    select baseline.*, ceil(liters_per_plant * plant_count * case when plant_count > 1 then 0.85 else 1 end * case when growth_duration = 'perennial' then 1.25 else 1 end)::integer as preferred from baseline
  )
  select greatest(2, ceil(calculated.preferred * 0.75)::integer), calculated.preferred,
    calculated.base_depth + case when calculated.growth_duration = 'perennial' then 5 else 0 end,
    ceil(power((calculated.preferred * 1000 * 4) / (pi() * 0.8), 1.0 / 3.0))::integer,
    array[format('Aim for about %s L in total; %s L is the practical lower limit.', calculated.preferred, greatest(2, ceil(calculated.preferred * 0.75)::integer)), format('Keep at least %s cm of usable root depth.', calculated.base_depth + case when calculated.growth_duration = 'perennial' then 5 else 0 end), case when calculated.plant_count > 1 then 'Shared containers need even spacing and uninterrupted drainage across the full base.' else 'One plant per container makes root space and watering easier to manage.' end, case when calculated.plant_group in ('fruiting-crop', 'climbing-crop') then 'Choose a stable container and add support before the root ball fills the pot.' when calculated.plant_group = 'root-crop' then 'Depth and a stone-free growing mix matter more than a decorative wide rim.' else 'Leave a small watering lip below the rim instead of filling the pot completely.' end]::text[],
    array['The estimate assumes a container with drainage holes and a suitable growing mix.', 'Dimensions are approximate because pot shapes taper and manufacturers report volume differently.', 'Cultivar vigor, rootstock, climate, and pruning can move the useful size above this range.']::text[]
  from calculated;
$$;

create or replace function public.calculate_watering_check(plant_need text default 'moderate', pot_liters integer default 10, exposure text default 'sheltered', temperature_band text default 'mild', drainage text default 'balanced')
returns table (check_interval_hours integer, soil_test_depth_cm integer, morning_check_recommended boolean, routine text[], warning text, assumptions text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select case when plant_need in ('low', 'moderate', 'high') then plant_need else 'moderate' end as plant_need,
      greatest(1, least(coalesce(pot_liters, 10), 100)) as pot_liters,
      case when exposure in ('indoor', 'sheltered', 'sunny', 'windy') then exposure else 'sheltered' end as exposure,
      case when temperature_band in ('cool', 'mild', 'warm', 'hot') then temperature_band else 'mild' end as temperature_band,
      case when drainage in ('fast', 'balanced', 'retentive') then drainage else 'balanced' end as drainage
  ), scored as (
    select input.*, (case input.plant_need when 'low' then 72 when 'moderate' then 36 else 24 end) + (case when input.pot_liters < 5 then -12 when input.pot_liters > 15 then 12 else 0 end) + (case input.exposure when 'indoor' then 8 when 'sunny' then -8 when 'windy' then -10 else 0 end) + (case input.temperature_band when 'cool' then 12 when 'warm' then -6 when 'hot' then -12 else 0 end) + (case input.drainage when 'fast' then -8 when 'retentive' then 12 else 0 end) as raw_hours from input
  ), prepared as (
    select scored.*, greatest(6, least(raw_hours, 96))::integer as interval_hours, case when pot_liters < 5 then 2 when pot_liters <= 15 then 3 else 5 end as test_depth from scored
  )
  select prepared.interval_hours, prepared.test_depth, prepared.interval_hours <= 24,
    array[format('Check the growing mix about every %s hours while these conditions persist.', prepared.interval_hours), format('Test moisture about %s cm below the surface, away from the pot edge.', prepared.test_depth), 'Water only when the plant-specific test indicates it is needed, then wet the root zone thoroughly and let excess drain.', case when prepared.interval_hours <= 24 then 'In demanding conditions, check in the morning and re-check later only if the plant or mix shows clear need.' else 'Reset the routine after rain, a temperature change, moving the pot, or repotting.' end]::text[],
    'This is an observation reminder, not a watering schedule. Never water solely because the interval has elapsed.',
    array['The estimate assumes drainage holes are open and the pot is not standing in water.', 'Wind, sun reflected by walls, root density, and recent rain can change moisture loss quickly.', 'Seedlings, newly transplanted plants, succulents, and dormant plants need more specific judgement.']::text[]
  from prepared;
$$;
revoke all on function public.calculate_container_size(text, integer, text), public.calculate_watering_check(text, integer, text, text, text) from public;
grant execute on function public.calculate_container_size(text, integer, text), public.calculate_watering_check(text, integer, text, text, text) to anon, authenticated;

create or replace function public.get_monthly_growing_tasks(requested_month integer default 1, requested_climate text default 'general', requested_hemisphere text default 'both', requested_space text default 'all', result_limit integer default 8)
returns table (entry_id uuid, activity_type text, title text, description text, priority text, calendar_title text, calendar_slug text, calendar_climate text, calendar_hemisphere text, calendar_space text, context_score integer, scope_note text, warnings text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select greatest(1, least(coalesce(requested_month, 1), 12)) as month,
      case when requested_climate in ('general', 'temperate', 'mediterranean', 'continental', 'tropical') then requested_climate else 'general' end as climate,
      case when requested_hemisphere in ('northern', 'southern', 'both') then requested_hemisphere else 'both' end as hemisphere,
      case when requested_space in ('all', 'balcony', 'container', 'garden', 'indoor') then requested_space else 'all' end as space,
      greatest(1, least(coalesce(result_limit, 8), 24)) as safe_limit
  ), ranked_calendars as (
    select profile.content_id, content.title, content.slug, profile.climate, profile.hemisphere, profile.space_type, profile.scope_note, profile.warnings,
      (case when input.climate = profile.climate then 40 when input.climate = 'general' or profile.climate = 'general' then 25 else 5 end + case when input.hemisphere = profile.hemisphere then 30 when input.hemisphere = 'both' or profile.hemisphere = 'both' then 20 else 0 end + case when input.space = profile.space_type then 30 when input.space = 'all' or profile.space_type = 'all' then 20 else 5 end)::integer as context_score
    from public.calendar_profiles profile join public.content_items content on content.id = profile.content_id cross join input
    where content.content_type = 'calendar' and content.status = 'published'
  ), closest as (select * from ranked_calendars order by context_score desc, title limit 1)
  select entry.id, entry.activity_type, entry.title, entry.description, entry.priority, closest.title, closest.slug, closest.climate, closest.hemisphere, closest.space_type, closest.context_score, closest.scope_note, closest.warnings
  from closest join public.calendar_entries entry on entry.calendar_content_id = closest.content_id cross join input
  where entry.month = input.month
  order by case entry.priority when 'high' then 0 when 'normal' then 1 else 2 end, entry.sort_order, entry.title
  limit (select safe_limit from input);
$$;

create or replace function public.assess_frost_risk(forecast_low_c numeric default 2, plant_tolerance text default 'tender', exposure text default 'sheltered', containerized boolean default true)
returns table (tolerance_threshold_c numeric, risk_level text, risk_score integer, explanation text, actions text[], assumptions text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select greatest(-30::numeric, least(coalesce(forecast_low_c, 2), 20::numeric)) as forecast_low_c,
      case when plant_tolerance in ('tender', 'half-hardy', 'hardy') then plant_tolerance else 'tender' end as plant_tolerance,
      case when exposure in ('sheltered', 'open', 'windy') then exposure else 'sheltered' end as exposure,
      coalesce(containerized, true) as containerized
  ), baseline as (
    select input.*, case input.plant_tolerance when 'tender' then 5 when 'half-hardy' then 0 else -5 end::numeric as threshold from input
  ), scored as (
    select baseline.*, (case when forecast_low_c >= threshold + 3 then 0 when forecast_low_c >= threshold then 1 when forecast_low_c >= threshold - 3 then 2 else 3 end + case when forecast_low_c <= threshold + 3 then case exposure when 'windy' then 2 when 'open' then 1 else 0 end else 0 end + case when forecast_low_c <= threshold + 3 and containerized then 1 else 0 end)::integer as raw_score from baseline
  ), prepared as (select scored.*, greatest(0, least(raw_score, 6)) as score from scored)
  select prepared.threshold, case when score <= 1 then 'low' when score = 2 then 'watch' when score <= 4 then 'high' else 'critical' end, score,
    format('The forecast low is %s°C and this broad plant group begins needing caution around %s°C. Exposure and container roots adjust the final risk.', prepared.forecast_low_c, prepared.threshold),
    array_remove(array[case when score <= 1 then 'Continue monitoring the local forecast; no frost action is indicated by these inputs.' else 'Confirm the latest hourly local forecast, including frost advisories and expected duration.' end, case when score >= 2 and prepared.containerized then 'Move manageable pots beside a sheltered wall or into a suitable protected place before temperatures fall.' end, case when score >= 3 then 'Use breathable horticultural fleece without crushing foliage, and remove or vent it after conditions improve.' end, case when score >= 3 then 'Protect container roots as well as leaves; small pots cool faster than garden soil.' end, case when score >= 5 then 'Treat this as an urgent protection decision and prioritize the most tender or irreplaceable plants.' end, 'Do not use heaters, flames, or sealed plastic covers around plants.'], null)::text[],
    array['The entered temperature must come from a current, trusted local forecast.', 'A broad tolerance group cannot represent cultivar, plant age, acclimation, frost duration, humidity, or microclimate.', 'Cold air can pool on balconies, patios, and low areas even when a general forecast is slightly warmer.']::text[]
  from prepared;
$$;
revoke all on function public.get_monthly_growing_tasks(integer, text, text, text, integer), public.assess_frost_risk(numeric, text, text, boolean) from public;
grant execute on function public.get_monthly_growing_tasks(integer, text, text, text, integer), public.assess_frost_risk(numeric, text, text, boolean) to anon, authenticated;

create or replace function public.plan_small_growing_space(width_cm numeric default 200, depth_cm numeric default 120, access_style text default 'edge-only', sun_hours integer default 6, space_type text default 'balcony')
returns table (total_area_m2 numeric, growing_area_m2 numeric, access_reserved_percent integer, suggested_modules integer, module_width_cm integer, layout_note text, priorities text[], checks text[], safety_note text)
language sql stable security invoker set search_path = '' as $$
  with input as (
    select greatest(50::numeric, least(coalesce(width_cm, 200), 600::numeric)) as width_cm, greatest(40::numeric, least(coalesce(depth_cm, 120), 600::numeric)) as depth_cm,
      case when access_style in ('edge-only', 'central-path', 'walk-through') then access_style else 'edge-only' end as access_style, greatest(0, least(coalesce(sun_hours, 6), 12)) as sun_hours,
      case when space_type in ('balcony', 'patio', 'indoor', 'small-garden') then space_type else 'balcony' end as space_type
  ), prepared as (
    select input.*, round((input.width_cm * input.depth_cm / 10000), 2) as total_area, case input.access_style when 'edge-only' then 10 when 'central-path' then 32 else 42 end as reserve_percent,
      case when input.sun_hours < 3 then 0.58 when input.sun_hours < 6 then 0.78 else 1.0 end as light_density from input
  ), planned as (
    select prepared.*, round(total_area * (100 - reserve_percent) / 100, 2) as growing_area, case when sun_hours < 4 then 45 else 40 end as module_width from prepared
  )
  select planned.total_area, planned.growing_area, planned.reserve_percent,
    greatest(1, least(24, floor(planned.growing_area * planned.light_density / power(planned.module_width / 100.0, 2))::integer)), planned.module_width,
    case planned.access_style when 'edge-only' then 'Keep the centre clear and arrange movable modules along reachable edges.' when 'central-path' then 'Reserve one continuous central access strip and place modules on both sides without narrowing the route.' else 'Keep a continuous route from entry to exit; use the remaining edges for compact, movable modules.' end,
    array[case when planned.sun_hours < 3 then 'Prioritize shade-tolerant foliage and observation before adding more modules.' when planned.sun_hours < 6 then 'Use the brightest zone for fruiting plants and the softer edges for leafy crops.' else 'Group plants by water demand and protect containers from extreme afternoon heat.' end, case planned.space_type when 'indoor' then 'Keep plants close to usable natural light without blocking windows, ventilation, or access.' else 'Place taller plants where they will not shade smaller modules or obstruct neighbours.' end, 'Leave every container reachable for watering, inspection, pruning, and safe removal.']::text[],
    array['Measure the clear usable footprint again, including doors, drains, railings, and furniture movement.', case when planned.space_type = 'balcony' then 'Ask the building owner or a qualified professional to confirm structural load, fixing, drainage, and escape-route limits.' else 'Confirm drainage, waterproofing, safe access, and any property or landlord restrictions.' end, 'Test the layout with empty containers before adding wet compost, plants, water reservoirs, or trellises.', 'Keep fire, emergency, and everyday circulation routes fully open.']::text[],
    'This is a spatial planning estimate only. It does not verify structural load, waterproofing, drainage capacity, wind safety, fire rules, landlord permission, or safe fixing.' from planned;
$$;

create or replace function public.guide_plant_observation(observed_sign text default 'yellowing', moisture_condition text default 'unknown', distribution_pattern text default 'whole-plant', recent_change text default 'none')
returns table (attention_level text, category_hint text, summary text, observation_checks text[], avoid_actions text[], assumptions text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select case when observed_sign in ('yellowing', 'wilting', 'spots', 'insects', 'poor-growth') then observed_sign else 'yellowing' end as sign,
      case when moisture_condition in ('dry', 'moist', 'wet', 'unknown') then moisture_condition else 'unknown' end as moisture,
      case when distribution_pattern in ('older-leaves', 'new-growth', 'whole-plant', 'isolated') then distribution_pattern else 'whole-plant' end as distribution,
      case when recent_change in ('none', 'watering', 'feeding', 'temperature', 'move-repot') then recent_change else 'none' end as recent_change
  )
  select case when (input.sign = 'wilting' and input.moisture = 'wet') or input.sign = 'insects' then 'prompt' when input.sign = 'spots' or input.moisture = 'wet' then 'watch' else 'routine' end,
    case when input.sign = 'insects' then 'pest' when input.sign = 'spots' then 'disease' when input.sign = 'poor-growth' then 'nutrition' when input.moisture in ('dry', 'wet') or input.sign in ('yellowing', 'wilting') then 'watering' else 'environment' end,
    format('Treat %s as an observation, not a diagnosis. Compare the %s pattern with moisture, recent changes, and the healthy parts of the plant before acting.', replace(input.sign, '-', ' '), replace(input.distribution, '-', ' ')),
    array_remove(array['Photograph the whole plant and one affected area in clear light so the pattern can be compared tomorrow.', case input.sign when 'yellowing' then 'Note whether yellowing starts between veins, at leaf edges, or uniformly across the leaf.' when 'wilting' then 'Compare leaf posture before and after the coolest part of the day; heat wilt can differ from persistent root stress.' when 'spots' then 'Check both leaf surfaces and note whether spots are dry, soft, spreading, ringed, or associated with damaged tissue.' when 'insects' then 'Inspect leaf undersides, growing tips, stems, and nearby plants for insects, cast skins, webbing, honeydew, or chewing.' else 'Compare new growth size, colour, spacing, and rate with older healthy growth.' end, case input.moisture when 'dry' then 'Check moisture several centimetres below the surface and confirm whether the root ball has pulled away from the container.' when 'wet' then 'Confirm drainage holes are open and note how many days the growing mix has remained wet.' when 'moist' then 'Do not infer root moisture from the surface alone; compare several depths without damaging roots.' else 'Check moisture below the surface before deciding whether water is part of the pattern.' end, case input.distribution when 'older-leaves' then 'Compare the oldest affected leaves with healthy new growth; age-related loss and mobile nutrient patterns often begin low.' when 'new-growth' then 'Inspect the newest leaves and growing point for distortion, pale tissue, pests, or recent cold damage.' when 'isolated' then 'Look for a local cause such as contact damage, a single wet pocket, sun scorch, or one pest cluster.' else 'A whole-plant pattern deserves a review of roots, temperature, light, watering, and recent care changes together.' end, case input.recent_change when 'watering' then 'Record what changed in watering amount, frequency, drainage, or reservoir use.' when 'feeding' then 'Record product, concentration, timing, and whether the growing mix was already dry or stressed.' when 'temperature' then 'Compare the symptom timing with recent heat, cold, wind, or rapid indoor temperature changes.' when 'move-repot' then 'Check whether light, root space, compost, drainage, or exposure changed during the move or repot.' else null end], null)::text[],
    array_remove(array['Do not apply fertilizer, pesticide, fungicide, or repeated watering only because one symptom label seems to fit.', case when input.moisture = 'wet' then 'Do not add more water until drainage and moisture below the surface have been checked.' end, case when input.sign in ('spots', 'insects') then 'Avoid spreading material between plants; clean tools and keep the affected plant apart while you inspect it.' end, 'Do not remove large amounts of partly healthy foliage before the pattern and cause are clearer.'], null)::text[],
    array['This guide uses broad visual and care-history categories and cannot identify a pathogen, pest species, deficiency, or root condition.', 'More than one cause can be present at the same time.', 'Rapid collapse, extensive rot, suspected poisoning, or a safety hazard requires suitable local expert help.']::text[] from input;
$$;

create or replace function public.find_guided_problem_matches(observed_sign text default 'yellowing', moisture_condition text default 'unknown', distribution_pattern text default 'whole-plant', result_limit integer default 4)
returns table (content_id uuid, title text, slug text, excerpt text, category text, urgency text, match_score integer, reasons text[], symptoms text[], verification_steps jsonb, warnings text[])
language sql stable security invoker set search_path = '' as $$
  with input as (
    select case when observed_sign in ('yellowing', 'wilting', 'spots', 'insects', 'poor-growth') then observed_sign else 'yellowing' end as sign, case when moisture_condition in ('dry', 'moist', 'wet', 'unknown') then moisture_condition else 'unknown' end as moisture, case when distribution_pattern in ('older-leaves', 'new-growth', 'whole-plant', 'isolated') then distribution_pattern else 'whole-plant' end as distribution, greatest(1, least(coalesce(result_limit, 4), 12)) as safe_limit
  ), prepared as (
    select content.id, content.title, content.slug, content.excerpt, profile.category, profile.urgency, profile.symptoms, profile.verification_steps, profile.warnings, lower(concat_ws(' ', content.title, content.excerpt, array_to_string(profile.symptoms, ' '))) as search_text, input.* from public.content_items content join public.problem_profiles profile on profile.content_id = content.id cross join input where content.content_type = 'problem' and content.status = 'published'
  ), scored as (
    select prepared.*, (case when sign = 'yellowing' and search_text like '%yellow%' then 55 when sign = 'wilting' and search_text like '%wilt%' then 55 when sign = 'spots' and (search_text like '%spot%' or search_text like '%lesion%') then 55 when sign = 'insects' and (search_text like '%insect%' or search_text like '%pest%') then 55 when sign = 'poor-growth' and (search_text like '%slow%' or search_text like '%growth%') then 55 else 0 end + case when (sign = 'insects' and category = 'pest') or (sign = 'spots' and category = 'disease') or (sign = 'poor-growth' and category = 'nutrition') or (sign in ('yellowing', 'wilting') and category = 'watering') then 20 else 0 end + case when moisture = 'wet' and category = 'watering' then 15 else 0 end + case when distribution = 'older-leaves' and search_text like '%older%' then 10 else 0 end)::integer as score from prepared
  )
  select scored.id, scored.title, scored.slug, scored.excerpt, scored.category, scored.urgency, scored.score,
    array_remove(array[case when scored.score >= 55 then 'The published symptom language overlaps with the selected visible sign.' end, case when scored.category = 'watering' and scored.moisture in ('dry', 'wet') then 'The selected moisture condition is relevant to this watering and root guide.' end, case when scored.distribution = 'older-leaves' and scored.search_text like '%older%' then 'The guide explicitly discusses older leaves.' end], null)::text[], scored.symptoms, scored.verification_steps, scored.warnings
  from scored where scored.score > 0 order by scored.score desc, scored.title limit (select safe_limit from input);
$$;

revoke all on function public.plan_small_growing_space(numeric, numeric, text, integer, text), public.guide_plant_observation(text, text, text, text), public.find_guided_problem_matches(text, text, text, integer) from public;
grant execute on function public.plan_small_growing_space(numeric, numeric, text, integer, text), public.guide_plant_observation(text, text, text, text), public.find_guided_problem_matches(text, text, text, integer) to anon, authenticated;

create or replace function public.content_public_route(content_type text, slug text) returns text language sql immutable security invoker set search_path = '' as $$
  select case content_type when 'plant' then '/plants/' || slug when 'problem' then '/plant-care/problems/' || slug when 'guide' then '/small-space-gardening/guides/' || slug when 'calendar' then '/planting-calendar/calendars/' || slug when 'tool' then '/tools/' || slug when 'review' then '/reviews/' || slug when 'page' then '/' || slug else '/' || slug end;
$$;

create or replace function public.admin_content_seo_audit()
returns table (content_id uuid, content_type text, title text, slug text, route text, focus_keyword text, search_intent text, seo_score integer, issues text[], days_since_update integer, author_name text, reviewer_name text, public_author boolean, inbound_links integer)
language sql stable security invoker set search_path = '' as $$
  with relations as (
    select problem_content_id as target_id from public.problem_plant_links union all select plant_content_id from public.problem_plant_links union all select guide_content_id from public.guide_plant_links union all select plant_content_id from public.guide_plant_links union all select calendar_content_id from public.calendar_plant_links union all select plant_content_id from public.calendar_plant_links
  ), inbound as (select target_id, count(*)::integer as link_count from relations group by target_id), prepared as (
    select content.*, workflow.review_state, author.display_name as author_name, reviewer.display_name as reviewer_name, coalesce(author.is_public, false) as public_author, coalesce(inbound.link_count, 0) as inbound_links,
      nullif(trim(content.body #>> '{seo_keyword_strategy,focus_keyword}'), '') as focus_keyword, nullif(trim(content.body #>> '{seo_keyword_strategy,search_intent}'), '') as search_intent,
      case when jsonb_typeof(content.body -> 'sources') = 'array' then jsonb_array_length(content.body -> 'sources') else 0 end as sources_count,
      coalesce(content.body #>> '{navigation,section}', '') as navigation_section, coalesce(content.body ->> 'overview', '') as overview, (current_date - content.updated_at::date)::integer as days_since_update
    from public.content_items content left join public.content_workflows workflow on workflow.content_id = content.id left join public.editorial_contributors author on author.id = workflow.author_id left join public.editorial_contributors reviewer on reviewer.id = workflow.reviewer_id left join inbound on inbound.target_id = content.id where content.status = 'published'
  )
  select prepared.id, prepared.content_type, prepared.title, prepared.slug, public.content_public_route(prepared.content_type, prepared.slug), prepared.focus_keyword, prepared.search_intent,
    (case when char_length(coalesce(prepared.seo_title, prepared.title)) between 30 and 60 then 15 when char_length(coalesce(prepared.seo_title, prepared.title)) between 15 and 70 then 8 else 0 end + case when char_length(coalesce(prepared.seo_description, '')) between 120 and 160 then 15 when char_length(coalesce(prepared.seo_description, '')) >= 70 then 8 else 0 end + case when char_length(coalesce(prepared.excerpt, '')) >= 80 then 10 when char_length(coalesce(prepared.excerpt, '')) >= 40 then 5 else 0 end + case when char_length(prepared.overview) >= 80 then 10 else 0 end + case when prepared.focus_keyword is not null and prepared.search_intent is not null then 15 when prepared.focus_keyword is not null then 7 else 0 end + case when prepared.sources_count > 0 then 10 else 0 end + case when prepared.navigation_section <> '' then 5 else 0 end + case when prepared.author_name is not null then 5 else 0 end + case when prepared.reviewer_name is not null and prepared.review_state = 'approved' then 5 else 0 end + case when prepared.public_author then 5 else 0 end + case when prepared.days_since_update <= 365 then 5 else 0 end)::integer,
    array_remove(array[case when char_length(coalesce(prepared.seo_title, prepared.title)) not between 15 and 70 then 'Search title is missing or outside the supported length.' end, case when char_length(coalesce(prepared.seo_description, '')) < 70 then 'Meta description is missing or too short.' end, case when char_length(coalesce(prepared.excerpt, '')) < 40 then 'Reader summary is too short.' end, case when char_length(prepared.overview) < 80 then 'Core overview is too thin.' end, case when prepared.focus_keyword is null then 'Primary search query is missing.' end, case when prepared.search_intent is null then 'Search intent is missing.' end, case when prepared.sources_count = 0 then 'No editorial source is recorded.' end, case when prepared.navigation_section = '' then 'Navigation section is missing.' end, case when prepared.author_name is null then 'No responsible author is assigned.' end, case when prepared.reviewer_name is null or prepared.review_state <> 'approved' then 'No distinct approved reviewer is assigned.' end, case when not prepared.public_author then 'The assigned author does not yet have an approved public profile.' end, case when prepared.days_since_update > 365 then 'Freshness review is overdue.' end, case when prepared.content_type in ('plant', 'problem', 'guide', 'calendar') and prepared.inbound_links = 0 then 'No structured inbound relationship is recorded.' end], null)::text[],
    prepared.days_since_update, prepared.author_name, prepared.reviewer_name, prepared.public_author, prepared.inbound_links from prepared order by 8 asc, prepared.title;
$$;

create or replace function public.admin_keyword_cannibalization() returns table (focus_keyword text, content_count integer, content_ids uuid[], titles text[], routes text[])
language sql stable security invoker set search_path = '' as $$
  with targets as (select content.id, content.title, public.content_public_route(content.content_type, content.slug) as route, regexp_replace(lower(trim(content.body #>> '{seo_keyword_strategy,focus_keyword}')), '[^a-z0-9]+', ' ', 'g') as normalized_keyword from public.content_items content where content.status = 'published' and nullif(trim(content.body #>> '{seo_keyword_strategy,focus_keyword}'), '') is not null)
  select normalized_keyword, count(*)::integer, array_agg(id order by title), array_agg(title order by title), array_agg(route order by title) from targets group by normalized_keyword having count(*) > 1 order by count(*) desc, normalized_keyword;
$$;

create or replace function public.admin_internal_link_audit() returns table (relation_type text, source_title text, source_route text, target_title text, target_route text, link_status text)
language sql stable security invoker set search_path = '' as $$
  with relations as (select 'problem-plant'::text as relation_type, problem_content_id as source_id, plant_content_id as target_id from public.problem_plant_links union all select 'guide-plant', guide_content_id, plant_content_id from public.guide_plant_links union all select 'calendar-plant', calendar_content_id, plant_content_id from public.calendar_plant_links)
  select relations.relation_type, source.title, public.content_public_route(source.content_type, source.slug), target.title, public.content_public_route(target.content_type, target.slug), case when source.status = 'published' and target.status = 'published' then 'ok' when source.status = 'published' then 'broken-target' else 'inactive-source' end from relations join public.content_items source on source.id = relations.source_id join public.content_items target on target.id = relations.target_id order by 6 desc, 2, 4;
$$;

create or replace function public.admin_launch_content_coverage() returns table (content_type text, published_count integer, launch_target integer, remaining_count integer, coverage_status text)
language sql stable security invoker set search_path = '' as $$
  with targets(content_type, launch_target) as (values ('plant', 15), ('problem', 10), ('guide', 5), ('calendar', 1), ('tool', 7), ('review', 3), ('page', 7)), counts as (select content.content_type, count(*)::integer as published_count from public.content_items content where content.status = 'published' group by content.content_type)
  select targets.content_type, coalesce(counts.published_count, 0), targets.launch_target, greatest(targets.launch_target - coalesce(counts.published_count, 0), 0), case when coalesce(counts.published_count, 0) >= targets.launch_target then 'ready' when coalesce(counts.published_count, 0) >= greatest(1, targets.launch_target / 2) then 'in-progress' else 'gap' end from targets left join counts using (content_type) order by targets.content_type;
$$;

create or replace function public.get_public_editorial_meta(content_slug text) returns table (author_name text, author_slug text, reviewer_name text, reviewer_slug text, published_at timestamptz, updated_at timestamptz)
language sql stable security definer set search_path = '' as $$
  select author.display_name, author.slug, reviewer.display_name, reviewer.slug, content.published_at, content.updated_at from public.content_items content left join public.content_workflows workflow on workflow.content_id = content.id left join public.editorial_contributors author on author.id = workflow.author_id and author.is_public left join public.editorial_contributors reviewer on reviewer.id = workflow.reviewer_id and reviewer.is_public and workflow.review_state = 'approved' where content.slug = content_slug and content.status = 'published' limit 1;
$$;

revoke all on function public.content_public_route(text, text), public.admin_content_seo_audit(), public.admin_keyword_cannibalization(), public.admin_internal_link_audit(), public.admin_launch_content_coverage(), public.get_public_editorial_meta(text) from public;
grant execute on function public.content_public_route(text, text), public.get_public_editorial_meta(text) to anon, authenticated;
grant execute on function public.admin_content_seo_audit(), public.admin_keyword_cannibalization(), public.admin_internal_link_audit(), public.admin_launch_content_coverage() to authenticated;
