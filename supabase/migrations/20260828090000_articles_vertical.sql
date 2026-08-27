-- Articles: explanatory writing that is not tied to one plant, one symptom, or
-- one procedure.
--
-- Every existing type answers a task. A plant profile assumes you chose the
-- plant, a problem assumes something is wrong, a guide assumes you are building
-- something, a calendar assumes you are scheduling. Nothing carried a reader who
-- simply wants to understand why leaves yellow, what potting compost is made of,
-- or how watering should change in a heatwave.
--
-- That reader is also the one worth the most editorially: they arrive from a
-- broad search, read longer, and return.

alter table public.content_items drop constraint if exists content_items_content_type_check;
alter table public.content_items add constraint content_items_content_type_check
  check (content_type in ('plant', 'problem', 'guide', 'calendar', 'tool', 'review', 'page', 'article'));

create table public.article_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  topic text not null check (topic in ('growing-science', 'seasonal', 'sustainability', 'spaces', 'beginners', 'materials')),
  eyebrow text not null default '',
  -- Ordered [{ "heading": text, "body": text }]. The same shape institutional
  -- pages use, so the editor and the renderer stay consistent.
  sections jsonb not null default '[]'::jsonb check (jsonb_typeof(sections) = 'array'),
  -- Short standalone statements. They open the article for a scanning reader and
  -- are the part search engines quote.
  key_takeaways jsonb not null default '[]'::jsonb check (jsonb_typeof(key_takeaways) = 'array'),
  image_url text,
  image_alt text,
  reading_time_minutes integer not null default 5 check (reading_time_minutes between 1 and 90),
  -- Explanatory writing ages. Recording the review date lets the desk find what
  -- has gone stale, and lets the page tell the reader.
  last_reviewed_on date,
  updated_at timestamptz not null default now()
);

create index article_profiles_topic_index on public.article_profiles (topic, last_reviewed_on desc);

alter table public.article_profiles enable row level security;

create policy "Published article profiles are readable" on public.article_profiles
  for select to anon, authenticated
  using (exists (select 1 from public.content_items c where c.id = article_profiles.content_id and c.content_type = 'article' and c.status = 'published'));
create policy "Admins manage article profiles" on public.article_profiles
  for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.article_profiles from anon, authenticated;
grant select on table public.article_profiles to anon;
grant select, insert, update, delete on table public.article_profiles to authenticated;
