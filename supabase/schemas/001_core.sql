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
  created_at timestamptz not null default now()
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
create index editorial_contributors_active_index on public.editorial_contributors (is_active, display_name);
create index content_workflows_schedule_index on public.content_workflows (scheduled_for) where scheduled_for is not null;
create index content_workflows_review_index on public.content_workflows (review_state, updated_at desc);

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
revoke all on table public.editorial_contributors, public.content_workflows from anon, authenticated;
grant select on public.editorial_contributors to anon;
grant select, insert, update, delete on public.editorial_contributors, public.content_workflows to authenticated;
grant select on public.profiles to authenticated;

create policy "Published images are readable" on storage.objects for select to anon, authenticated using (bucket_id = 'published_images');
create policy "Admins manage images" on storage.objects for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
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
