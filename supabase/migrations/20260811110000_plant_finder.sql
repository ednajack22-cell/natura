create table public.plant_finder_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  min_sun_hours smallint not null default 4 check (min_sun_hours between 0 and 12),
  space_types text[] not null default array['container']::text[] check (
    cardinality(space_types) > 0 and
    space_types <@ array['windowsill', 'balcony', 'patio', 'indoor', 'container']::text[]
  ),
  care_level text not null default 'regular' check (care_level in ('low', 'regular', 'attentive')),
  climates text[] not null default array['general']::text[] check (
    cardinality(climates) > 0 and
    climates <@ array['general', 'temperate', 'mediterranean', 'continental', 'tropical']::text[]
  ),
  edible boolean not null default true,
  match_note text not null default '' check (char_length(match_note) <= 400),
  updated_at timestamptz not null default now()
);

create index plant_finder_profiles_spaces_index on public.plant_finder_profiles using gin (space_types);
create index plant_finder_profiles_climates_index on public.plant_finder_profiles using gin (climates);

alter table public.plant_finder_profiles enable row level security;

create policy "Published plant finder profiles are readable" on public.plant_finder_profiles
for select to anon, authenticated using (
  exists (
    select 1 from public.content_items content
    where content.id = plant_finder_profiles.content_id
      and content.content_type = 'plant'
      and content.status = 'published'
  )
);

create policy "Admins manage plant finder profiles" on public.plant_finder_profiles
for all to authenticated using (
  exists (select 1 from public.profiles profile where profile.id = auth.uid() and profile.role = 'admin')
) with check (
  exists (select 1 from public.profiles profile where profile.id = auth.uid() and profile.role = 'admin')
);

revoke all on table public.plant_finder_profiles from anon, authenticated;
grant select on public.plant_finder_profiles to anon;
grant select, insert, update, delete on public.plant_finder_profiles to authenticated;

create or replace function public.find_suitable_plants(
  requested_sun_hours integer default 4,
  requested_space text default 'container',
  requested_care text default 'regular',
  requested_climate text default 'general',
  result_limit integer default 6
)
returns table (
  content_id uuid,
  title text,
  slug text,
  excerpt text,
  body jsonb,
  score integer,
  reasons text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select
      greatest(0, least(coalesce(requested_sun_hours, 4), 12)) as sun_hours,
      case when requested_space in ('any', 'windowsill', 'balcony', 'patio', 'indoor', 'container') then requested_space else 'container' end as space_type,
      case when requested_care in ('low', 'regular', 'attentive') then requested_care else 'regular' end as care_level,
      case when requested_climate in ('general', 'temperate', 'mediterranean', 'continental', 'tropical') then requested_climate else 'general' end as climate,
      greatest(1, least(coalesce(result_limit, 6), 24)) as safe_limit
  ), scored as (
    select
      content.id as content_id,
      content.title,
      content.slug,
      content.excerpt,
      content.body,
      profile.min_sun_hours,
      profile.space_types,
      profile.care_level,
      profile.climates,
      profile.match_note,
      input.*,
      greatest(0, 40 - greatest(profile.min_sun_hours - input.sun_hours, 0) * 12) as light_score,
      case when input.space_type = 'any' or input.space_type = any(profile.space_types) then 25 else 0 end as space_score,
      case
        when (case input.care_level when 'low' then 1 when 'regular' then 2 else 3 end) >=
             (case profile.care_level when 'low' then 1 when 'regular' then 2 else 3 end) then 20
        when (case profile.care_level when 'low' then 1 when 'regular' then 2 else 3 end) -
             (case input.care_level when 'low' then 1 when 'regular' then 2 else 3 end) = 1 then 8
        else 0
      end as care_score,
      case when input.climate = 'general' or 'general' = any(profile.climates) or input.climate = any(profile.climates) then 15 else 3 end as climate_score
    from public.plant_finder_profiles profile
    join public.content_items content on content.id = profile.content_id
    cross join input
    where content.content_type = 'plant' and content.status = 'published'
  )
  select
    scored.content_id,
    scored.title,
    scored.slug,
    scored.excerpt,
    scored.body,
    (scored.light_score + scored.space_score + scored.care_score + scored.climate_score)::integer as score,
    array_remove(array[
      case when scored.sun_hours >= scored.min_sun_hours then 'Light level meets this plant''s baseline.' else format('It usually performs better with about %s hours of direct light.', scored.min_sun_hours) end,
      case when scored.space_type = 'any' then 'Works in one or more compact-space setups.' when scored.space_type = any(scored.space_types) then format('Suitable for a %s setup.', replace(scored.space_type, '-', ' ')) else 'This space type is not an ideal fit.' end,
      case when scored.care_score = 20 then 'The care rhythm fits the time you can provide.' when scored.care_score = 8 then 'Possible, but it may need a little more attention.' else 'Its care needs may exceed your preferred routine.' end,
      case when scored.climate = 'general' or 'general' = any(scored.climates) or scored.climate = any(scored.climates) then 'Compatible with the broad climate selected.' else 'Check local temperature and frost conditions carefully.' end,
      nullif(scored.match_note, '')
    ], null)::text[] as reasons
  from scored
  order by score desc, title
  limit (select safe_limit from input);
$$;

revoke all on function public.find_suitable_plants(integer, text, text, text, integer) from public;
grant execute on function public.find_suitable_plants(integer, text, text, text, integer) to anon, authenticated;

insert into public.plant_finder_profiles (content_id, min_sun_hours, space_types, care_level, climates, edible, match_note)
select content.id, seed.min_sun_hours, seed.space_types, seed.care_level, seed.climates, true, seed.match_note
from (values
  ('cherry-tomato', 6::smallint, array['balcony', 'patio', 'container']::text[], 'attentive', array['general', 'temperate', 'mediterranean', 'continental']::text[], 'Give the container steady water and support the stems as fruit develops.'),
  ('genovese-basil', 4::smallint, array['windowsill', 'balcony', 'indoor', 'container']::text[], 'regular', array['general', 'temperate', 'mediterranean', 'tropical']::text[], 'Harvest the tips often and protect the plant from cold nights.'),
  ('balcony-strawberry', 6::smallint, array['balcony', 'patio', 'container']::text[], 'regular', array['general', 'temperate', 'mediterranean', 'continental']::text[], 'Keep flowers in good light and the crown just above the growing mix.')
) as seed(slug, min_sun_hours, space_types, care_level, climates, match_note)
join public.content_items content on content.slug = seed.slug and content.content_type = 'plant'
on conflict (content_id) do update set
  min_sun_hours = excluded.min_sun_hours,
  space_types = excluded.space_types,
  care_level = excluded.care_level,
  climates = excluded.climates,
  edible = excluded.edible,
  match_note = excluded.match_note,
  updated_at = now();

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values (
  'tool',
  'published',
  'Plant finder',
  'plant-finder',
  'Match edible plants to your available light, growing space, broad climate, and preferred care rhythm.',
  jsonb_build_object(
    'stage', 'published',
    'overview', 'Use four practical signals to shortlist plants that fit your space. The result is a transparent starting point, not a guarantee: observe your real light, temperature, wind, and watering conditions before planting.',
    'navigation', jsonb_build_object('section', 'tools', 'subsection', 'plant-finder'),
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'Natura plant growing profiles'),
      jsonb_build_object('title', 'Transparent matching methodology described on this page')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'plant finder for small spaces', 'supporting_keywords', jsonb_build_array('balcony plant finder', 'plants by sunlight', 'container plant selector'), 'search_intent', 'informational')
  ),
  'Plant Finder for Small Spaces | Natura',
  'Find edible plants suited to your sunlight, balcony or indoor space, climate, and care routine with transparent matching reasons.',
  now()
)
on conflict (slug) do nothing;

insert into public.content_workflows (content_id, author_id, reviewer_id, review_state, approved_at)
select tool.id, author.id, reviewer.id, 'approved', coalesce(tool.published_at, now())
from public.content_items tool
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where tool.slug = 'plant-finder' and tool.content_type = 'tool'
on conflict (content_id) do nothing;
