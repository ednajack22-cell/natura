create table public.problem_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  category text not null check (category in ('watering', 'nutrition', 'pest', 'disease', 'environment', 'other')),
  urgency text not null default 'moderate' check (urgency in ('low', 'moderate', 'high')),
  symptoms text[] not null default '{}',
  likely_causes jsonb not null default '[]'::jsonb,
  verification_steps jsonb not null default '[]'::jsonb,
  recommended_actions jsonb not null default '[]'::jsonb,
  warnings text[] not null default '{}',
  image_url text,
  image_alt text,
  updated_at timestamptz not null default now()
);

create table public.problem_plant_links (
  problem_content_id uuid not null references public.content_items(id) on delete cascade,
  plant_content_id uuid not null references public.content_items(id) on delete cascade,
  primary key (problem_content_id, plant_content_id),
  check (problem_content_id <> plant_content_id)
);

create index problem_profiles_category_index on public.problem_profiles (category, urgency);
create index problem_plant_links_plant_index on public.problem_plant_links (plant_content_id);

alter table public.problem_profiles enable row level security;
alter table public.problem_plant_links enable row level security;

create policy "Published problem profiles are readable" on public.problem_profiles for select to anon, authenticated using (
  exists (select 1 from public.content_items c where c.id = problem_profiles.content_id and c.content_type = 'problem' and c.status = 'published')
);
create policy "Admins manage problem profiles" on public.problem_profiles for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published problem links are readable" on public.problem_plant_links for select to anon, authenticated using (
  exists (select 1 from public.content_items problem where problem.id = problem_plant_links.problem_content_id and problem.status = 'published')
  and exists (select 1 from public.content_items plant where plant.id = problem_plant_links.plant_content_id and plant.status = 'published')
);
create policy "Admins manage problem links" on public.problem_plant_links for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.problem_profiles, public.problem_plant_links from anon, authenticated;
grant select on public.problem_profiles, public.problem_plant_links to anon;
grant select, insert, update, delete on public.problem_profiles, public.problem_plant_links to authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values ('problem', 'published', 'Yellow leaves in container plants', 'yellow-leaves-container-plants',
  'Use leaf position, watering history, drainage, and growth pattern to narrow the likely cause of yellow leaves.',
  '{"overview":"Yellow leaves are a symptom, not a diagnosis. Start with where yellowing appears, how quickly it developed, and what changed in watering, drainage, light, temperature, or feeding.","navigation":{"section":"plant-care","subsection":"plant-problems"},"sources":[],"seo_keyword_strategy":{"focus_keyword":"why are my container plant leaves turning yellow","supporting_keywords":["yellow leaves overwatering","plant leaves yellow nutrient deficiency","yellow leaves poor drainage"],"search_intent":"informational"}}',
  'Why Container Plant Leaves Turn Yellow', 'Yellow leaves can signal watering, drainage, root, light, or nutrient problems. Compare the pattern before changing your plant care routine.', now())
on conflict (slug) do nothing;

insert into public.problem_profiles (content_id, category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings)
select id, 'watering', 'moderate', array['Older lower leaves turn yellow', 'Compost stays wet for several days', 'New growth may appear pale or slow'],
  '[{"title":"Excess water or poor drainage","text":"Roots short of oxygen cannot function normally, especially when the pot has blocked holes or dense compost."},{"title":"Natural leaf ageing","text":"One or two older leaves may yellow as the plant redirects resources to new growth."},{"title":"Nutrient or root stress","text":"Broad pale growth can follow exhausted compost, cold roots, damaged roots, or unsuitable pH."}]',
  '[{"title":"Check the moisture below the surface","text":"Test several centimetres deep rather than judging only the dry top layer."},{"title":"Inspect drainage and recent changes","text":"Confirm water can leave the pot and note recent repotting, feeding, heat, cold, or relocation."}]',
  '[{"title":"Correct the condition, not the colour","text":"Adjust watering, drainage, light, or feeding only after the pattern supports that cause."},{"title":"Remove only fully yellow leaves","text":"Keep partly green leaves unless damaged or diseased because they still support the plant."}]',
  array['Do not add fertiliser automatically to a stressed or waterlogged plant.']
from public.content_items where slug = 'yellow-leaves-container-plants'
on conflict (content_id) do nothing;

insert into public.problem_plant_links (problem_content_id, plant_content_id)
select problem.id, plant.id from public.content_items problem cross join public.content_items plant
where problem.slug = 'yellow-leaves-container-plants' and plant.slug in ('cherry-tomato','genovese-basil','balcony-strawberry')
on conflict do nothing;
