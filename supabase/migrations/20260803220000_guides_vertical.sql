create table public.guide_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  guide_type text not null check (guide_type in ('balcony', 'container', 'indoor', 'beginner', 'seasonal')),
  difficulty text not null default 'easy' check (difficulty in ('easy', 'moderate', 'advanced')),
  estimated_time_minutes integer not null default 30 check (estimated_time_minutes between 5 and 1440),
  audience text not null default '',
  prerequisites text[] not null default '{}',
  materials text[] not null default '{}',
  steps jsonb not null default '[]'::jsonb,
  tips text[] not null default '{}',
  warnings text[] not null default '{}',
  image_url text,
  image_alt text,
  updated_at timestamptz not null default now()
);

create table public.guide_plant_links (
  guide_content_id uuid not null references public.content_items(id) on delete cascade,
  plant_content_id uuid not null references public.content_items(id) on delete cascade,
  primary key (guide_content_id, plant_content_id),
  check (guide_content_id <> plant_content_id)
);

create index guide_profiles_type_index on public.guide_profiles (guide_type, difficulty);
create index guide_plant_links_plant_index on public.guide_plant_links (plant_content_id);

alter table public.guide_profiles enable row level security;
alter table public.guide_plant_links enable row level security;

create policy "Published guide profiles are readable" on public.guide_profiles for select to anon, authenticated using (
  exists (select 1 from public.content_items c where c.id = guide_profiles.content_id and c.content_type = 'guide' and c.status = 'published')
);
create policy "Admins manage guide profiles" on public.guide_profiles for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published guide links are readable" on public.guide_plant_links for select to anon, authenticated using (
  exists (select 1 from public.content_items guide where guide.id = guide_plant_links.guide_content_id and guide.status = 'published')
  and exists (select 1 from public.content_items plant where plant.id = guide_plant_links.plant_content_id and plant.status = 'published')
);
create policy "Admins manage guide links" on public.guide_plant_links for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.guide_profiles, public.guide_plant_links from anon, authenticated;
grant select on public.guide_profiles, public.guide_plant_links to anon;
grant select, insert, update, delete on public.guide_profiles, public.guide_plant_links to authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values ('guide', 'published', 'Start a balcony herb garden', 'start-balcony-herb-garden',
  'Build a practical first herb garden by reading your light, choosing suitable containers, and starting with a manageable group of plants.',
  '{"overview":"A useful balcony herb garden begins with honest observation: how many hours of direct light reach the space, how exposed it is to wind, and how easily you can water. Start small, use containers with drainage, and group plants only when their moisture needs are compatible.","navigation":{"section":"small-space-gardening","subsection":"balcony"},"sources":[],"seo_keyword_strategy":{"focus_keyword":"how to start a balcony herb garden","supporting_keywords":["best herbs for a balcony","herb garden container size","balcony herb garden for beginners"],"search_intent":"how-to"}}',
  'How to Start a Balcony Herb Garden', 'Start a balcony herb garden with practical advice on light, containers, drainage, watering, plant choice, wind protection, and an easy first layout.', now())
on conflict (slug) do nothing;

insert into public.guide_profiles (content_id, guide_type, difficulty, estimated_time_minutes, audience, prerequisites, materials, steps, tips, warnings)
select id, 'balcony', 'easy', 45, 'First-time balcony gardeners with a small sunny or partly sunny outdoor space.',
  array['Observe the balcony light for a full day', 'Confirm that containers can drain safely', 'Choose a reachable watering point'],
  array['Three containers with drainage holes', 'Peat-free multipurpose compost', 'Saucers or pot feet where appropriate', 'Two or three compatible herbs', 'Watering can'],
  '[{"title":"Map the light and wind","text":"Record direct sun in the morning, midday, and afternoon, then identify the most sheltered position that remains practical to reach."},{"title":"Choose fewer, better containers","text":"Use stable pots with drainage holes and enough compost volume to avoid extreme drying. Do not crowd every herb into one small container."},{"title":"Match herbs to the conditions","text":"Choose sun-loving Mediterranean herbs for bright, drier positions and keep moisture-loving herbs in separate containers where watering can be adjusted."},{"title":"Plant at the correct depth","text":"Keep each plant at roughly the same soil level it had in its nursery pot, firm gently, and water thoroughly once."},{"title":"Build a simple care rhythm","text":"Check moisture with a finger before watering, harvest little and often, and review wind and heat exposure during extreme weather."}]',
  array['Place frequently harvested herbs closest to the door', 'Use separate pots for herbs with very different watering needs', 'Leave room for air movement and mature plant size'],
  array['Check balcony load and building rules before adding large or heavy containers', 'Secure light pots and tall plants where wind could dislodge them']
from public.content_items where slug = 'start-balcony-herb-garden'
on conflict (content_id) do nothing;

insert into public.guide_plant_links (guide_content_id, plant_content_id)
select guide.id, plant.id from public.content_items guide cross join public.content_items plant
where guide.slug = 'start-balcony-herb-garden' and plant.slug in ('genovese-basil')
on conflict do nothing;
