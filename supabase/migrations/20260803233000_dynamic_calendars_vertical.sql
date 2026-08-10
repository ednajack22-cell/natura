create table public.calendar_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  climate text not null check (climate in ('general', 'temperate', 'mediterranean', 'continental', 'tropical')),
  hemisphere text not null default 'northern' check (hemisphere in ('northern', 'southern', 'both')),
  space_type text not null default 'all' check (space_type in ('all', 'balcony', 'container', 'garden', 'indoor')),
  scope_note text not null default '',
  warnings text[] not null default '{}',
  image_url text,
  image_alt text,
  updated_at timestamptz not null default now()
);

create table public.calendar_entries (
  id uuid primary key default gen_random_uuid(),
  calendar_content_id uuid not null references public.content_items(id) on delete cascade,
  month smallint not null check (month between 1 and 12),
  activity_type text not null check (activity_type in ('plan', 'sow-indoors', 'sow-outdoors', 'plant', 'harvest', 'care', 'protect')),
  title text not null check (char_length(title) between 3 and 160),
  description text not null default '',
  priority text not null default 'normal' check (priority in ('low', 'normal', 'high')),
  sort_order smallint not null default 0,
  created_at timestamptz not null default now()
);

create table public.calendar_plant_links (
  calendar_content_id uuid not null references public.content_items(id) on delete cascade,
  plant_content_id uuid not null references public.content_items(id) on delete cascade,
  primary key (calendar_content_id, plant_content_id),
  check (calendar_content_id <> plant_content_id)
);

create index calendar_profiles_filter_index on public.calendar_profiles (climate, hemisphere, space_type);
create index calendar_entries_month_index on public.calendar_entries (calendar_content_id, month, sort_order);
create index calendar_plant_links_plant_index on public.calendar_plant_links (plant_content_id);

alter table public.calendar_profiles enable row level security;
alter table public.calendar_entries enable row level security;
alter table public.calendar_plant_links enable row level security;

create policy "Published calendar profiles are readable" on public.calendar_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = calendar_profiles.content_id and c.content_type = 'calendar' and c.status = 'published'));
create policy "Admins manage calendar profiles" on public.calendar_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published calendar entries are readable" on public.calendar_entries for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = calendar_entries.calendar_content_id and c.content_type = 'calendar' and c.status = 'published'));
create policy "Admins manage calendar entries" on public.calendar_entries for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published calendar links are readable" on public.calendar_plant_links for select to anon, authenticated using (exists (select 1 from public.content_items calendar where calendar.id = calendar_plant_links.calendar_content_id and calendar.status = 'published') and exists (select 1 from public.content_items plant where plant.id = calendar_plant_links.plant_content_id and plant.status = 'published'));
create policy "Admins manage calendar links" on public.calendar_plant_links for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.calendar_profiles, public.calendar_entries, public.calendar_plant_links from anon, authenticated;
grant select on public.calendar_profiles, public.calendar_entries, public.calendar_plant_links to anon;
grant select, insert, update, delete on public.calendar_profiles, public.calendar_entries, public.calendar_plant_links to authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values ('calendar', 'published', 'Mediterranean container planting calendar', 'mediterranean-container-calendar',
  'A practical month-by-month rhythm for edible containers in a mild Mediterranean climate, with local weather checks built into every decision.',
  '{"overview":"Use this calendar as a sequence of observations, not fixed instructions. Coastal exposure, altitude, wind, heat, container size, and unusual weather can move a task by several weeks. Check local forecasts and soil conditions before sowing, planting, or protecting crops.","navigation":{"section":"planting-calendar","subsection":"monthly-calendars"},"sources":[],"seo_keyword_strategy":{"focus_keyword":"mediterranean container planting calendar","supporting_keywords":["what to plant each month mediterranean climate","balcony planting calendar","container vegetable calendar"],"search_intent":"informational"}}',
  'Mediterranean Container Planting Calendar', 'Plan edible containers month by month in a Mediterranean climate, including sowing, planting, harvesting, care, heat protection, and local-weather checks.', now())
on conflict (slug) do nothing;

insert into public.calendar_profiles (content_id, climate, hemisphere, space_type, scope_note, warnings)
select id, 'mediterranean', 'northern', 'container', 'Designed for mild-winter Northern Hemisphere locations with hot, dry summers and container-based growing.',
  array['Local frost, heatwaves, altitude, wind, and coastal exposure can shift tasks by several weeks.', 'Do not sow or plant by date alone; confirm current temperature, soil moisture, and the short-term forecast.']
from public.content_items where slug = 'mediterranean-container-calendar'
on conflict (content_id) do nothing;

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select calendar.id, entry.month, entry.activity_type, entry.title, entry.description, entry.priority, entry.sort_order
from public.content_items calendar cross join (values
  (1, 'plan', 'Review light and container drainage', 'Map winter sun, clean drainage holes, and replace only exhausted or compacted growing medium.', 'normal', 1),
  (1, 'sow-indoors', 'Start slow warm-season crops indoors', 'Where reliable warmth and strong light are available, begin a small batch of peppers or aubergines.', 'low', 2),
  (2, 'sow-indoors', 'Start tomatoes under protection', 'Sow a manageable number with warmth and strong light; delay if seedlings would become weak indoors.', 'normal', 1),
  (2, 'care', 'Refresh perennial herbs', 'Trim damaged growth lightly and check rosemary, thyme, and oregano containers for drainage.', 'normal', 2),
  (3, 'sow-outdoors', 'Sow quick cool-season crops', 'Try radish, salad leaves, coriander, or chard where conditions are mild and moisture can be maintained.', 'normal', 1),
  (3, 'plant', 'Pot up strawberries and hardy herbs', 'Keep strawberry crowns level with the surface and allow space for airflow.', 'high', 2),
  (4, 'plant', 'Move tender crops out gradually', 'Harden plants off and wait through any unusual cold or damaging wind before permanent placement.', 'high', 1),
  (4, 'sow-outdoors', 'Sow basil when nights are warm', 'Basil needs reliably warm conditions; keep a protected backup if nights remain cool.', 'normal', 2),
  (5, 'care', 'Install support before plants are heavy', 'Stake tomatoes early and confirm containers remain stable in wind.', 'normal', 1),
  (5, 'plant', 'Complete warm-season planting', 'Plant tomatoes, basil, and other warm crops once nights and forecasts are suitable.', 'high', 2),
  (6, 'care', 'Shift to heat-aware watering', 'Check moisture early, water deeply when needed, and use mulch without blocking stems.', 'high', 1),
  (6, 'harvest', 'Harvest herbs little and often', 'Take small regular cuts to encourage branching and remove flowering stems where leaf production is the goal.', 'normal', 2),
  (7, 'protect', 'Protect roots during extreme heat', 'Shade dark containers, move sensitive plants out of reflected afternoon heat, and check moisture more often.', 'high', 1),
  (7, 'harvest', 'Pick tomatoes as they ripen', 'Harvest regularly and inspect plants while picking for stress, pests, or split fruit.', 'normal', 2),
  (8, 'sow-indoors', 'Prepare autumn salad seedlings', 'Start small batches in a cooler protected position rather than sowing into extreme heat.', 'normal', 1),
  (8, 'care', 'Remove exhausted summer growth', 'Clear only finished or unhealthy material and keep productive plants supported and watered.', 'normal', 2),
  (9, 'sow-outdoors', 'Sow the main autumn salad succession', 'Use salad leaves, coriander, radish, and other suitable cool-season crops as heat eases.', 'high', 1),
  (9, 'plant', 'Replant containers for autumn', 'Refresh only the medium that needs replacing and choose crops for the available autumn light.', 'normal', 2),
  (10, 'plant', 'Set out hardy leafy crops and herbs', 'Use sheltered positions and avoid crowding as light levels and drying slow down.', 'normal', 1),
  (10, 'care', 'Reduce watering frequency', 'Continue checking below the surface, but expect containers to dry more slowly.', 'high', 2),
  (11, 'protect', 'Prepare for wind and cold rain', 'Secure containers, raise vulnerable pots for drainage, and move tender herbs to protection if necessary.', 'high', 1),
  (11, 'harvest', 'Use cool-season leaves regularly', 'Harvest outer leaves and keep the centre growing where the crop allows.', 'normal', 2),
  (12, 'plan', 'Record what worked this year', 'Note successful positions, container sizes, watering problems, and varieties before planning the next cycle.', 'normal', 1),
  (12, 'protect', 'Keep roots out of standing water', 'Check saucers after rain and maintain airflow around overwintering plants.', 'high', 2)
) as entry(month, activity_type, title, description, priority, sort_order)
where calendar.slug = 'mediterranean-container-calendar'
on conflict do nothing;

insert into public.calendar_plant_links (calendar_content_id, plant_content_id)
select calendar.id, plant.id from public.content_items calendar cross join public.content_items plant
where calendar.slug = 'mediterranean-container-calendar' and plant.slug in ('cherry-tomato', 'genovese-basil', 'balcony-strawberry')
on conflict do nothing;
