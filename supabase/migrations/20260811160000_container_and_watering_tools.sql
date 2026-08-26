create or replace function public.calculate_container_size(
  plant_group text default 'leafy-herb',
  plant_count integer default 1,
  growth_duration text default 'annual'
)
returns table (
  minimum_liters integer,
  preferred_liters integer,
  minimum_depth_cm integer,
  approximate_diameter_cm integer,
  guidance text[],
  assumptions text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select
      case when plant_group in ('leafy-herb', 'compact-fruit', 'fruiting-crop', 'root-crop', 'climbing-crop') then plant_group else 'leafy-herb' end as plant_group,
      greatest(1, least(coalesce(plant_count, 1), 6)) as plant_count,
      case when growth_duration in ('annual', 'perennial') then growth_duration else 'annual' end as growth_duration
  ), baseline as (
    select input.*,
      case input.plant_group when 'leafy-herb' then 3 when 'compact-fruit' then 5 when 'fruiting-crop' then 20 when 'root-crop' then 12 else 25 end::numeric as liters_per_plant,
      case input.plant_group when 'leafy-herb' then 20 when 'compact-fruit' then 25 when 'fruiting-crop' then 35 when 'root-crop' then 30 else 40 end as base_depth
    from input
  ), calculated as (
    select baseline.*,
      ceil(liters_per_plant * plant_count * case when plant_count > 1 then 0.85 else 1 end * case when growth_duration = 'perennial' then 1.25 else 1 end)::integer as preferred
    from baseline
  )
  select
    greatest(2, ceil(calculated.preferred * 0.75)::integer),
    calculated.preferred,
    calculated.base_depth + case when calculated.growth_duration = 'perennial' then 5 else 0 end,
    ceil(power((calculated.preferred * 1000 * 4) / (pi() * 0.8), 1.0 / 3.0))::integer,
    array[
      format('Aim for about %s L in total; %s L is the practical lower limit.', calculated.preferred, greatest(2, ceil(calculated.preferred * 0.75)::integer)),
      format('Keep at least %s cm of usable root depth.', calculated.base_depth + case when calculated.growth_duration = 'perennial' then 5 else 0 end),
      case when calculated.plant_count > 1 then 'Shared containers need even spacing and uninterrupted drainage across the full base.' else 'One plant per container makes root space and watering easier to manage.' end,
      case when calculated.plant_group in ('fruiting-crop', 'climbing-crop') then 'Choose a stable container and add support before the root ball fills the pot.' when calculated.plant_group = 'root-crop' then 'Depth and a stone-free growing mix matter more than a decorative wide rim.' else 'Leave a small watering lip below the rim instead of filling the pot completely.' end
    ]::text[],
    array[
      'The estimate assumes a container with drainage holes and a suitable growing mix.',
      'Dimensions are approximate because pot shapes taper and manufacturers report volume differently.',
      'Cultivar vigor, rootstock, climate, and pruning can move the useful size above this range.'
    ]::text[]
  from calculated;
$$;

create or replace function public.calculate_watering_check(
  plant_need text default 'moderate',
  pot_liters integer default 10,
  exposure text default 'sheltered',
  temperature_band text default 'mild',
  drainage text default 'balanced'
)
returns table (
  check_interval_hours integer,
  soil_test_depth_cm integer,
  morning_check_recommended boolean,
  routine text[],
  warning text,
  assumptions text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select
      case when plant_need in ('low', 'moderate', 'high') then plant_need else 'moderate' end as plant_need,
      greatest(1, least(coalesce(pot_liters, 10), 100)) as pot_liters,
      case when exposure in ('indoor', 'sheltered', 'sunny', 'windy') then exposure else 'sheltered' end as exposure,
      case when temperature_band in ('cool', 'mild', 'warm', 'hot') then temperature_band else 'mild' end as temperature_band,
      case when drainage in ('fast', 'balanced', 'retentive') then drainage else 'balanced' end as drainage
  ), scored as (
    select input.*,
      (case input.plant_need when 'low' then 72 when 'moderate' then 36 else 24 end) +
      (case when input.pot_liters < 5 then -12 when input.pot_liters > 15 then 12 else 0 end) +
      (case input.exposure when 'indoor' then 8 when 'sunny' then -8 when 'windy' then -10 else 0 end) +
      (case input.temperature_band when 'cool' then 12 when 'warm' then -6 when 'hot' then -12 else 0 end) +
      (case input.drainage when 'fast' then -8 when 'retentive' then 12 else 0 end) as raw_hours
    from input
  ), prepared as (
    select scored.*, greatest(6, least(raw_hours, 96))::integer as interval_hours,
      case when pot_liters < 5 then 2 when pot_liters <= 15 then 3 else 5 end as test_depth
    from scored
  )
  select
    prepared.interval_hours,
    prepared.test_depth,
    prepared.interval_hours <= 24,
    array[
      format('Check the growing mix about every %s hours while these conditions persist.', prepared.interval_hours),
      format('Test moisture about %s cm below the surface, away from the pot edge.', prepared.test_depth),
      'Water only when the plant-specific test indicates it is needed, then wet the root zone thoroughly and let excess drain.',
      case when prepared.interval_hours <= 24 then 'In demanding conditions, check in the morning and re-check later only if the plant or mix shows clear need.' else 'Reset the routine after rain, a temperature change, moving the pot, or repotting.' end
    ]::text[],
    'This is an observation reminder, not a watering schedule. Never water solely because the interval has elapsed.',
    array[
      'The estimate assumes drainage holes are open and the pot is not standing in water.',
      'Wind, sun reflected by walls, root density, and recent rain can change moisture loss quickly.',
      'Seedlings, newly transplanted plants, succulents, and dormant plants need more specific judgement.'
    ]::text[]
  from prepared;
$$;

revoke all on function public.calculate_container_size(text, integer, text), public.calculate_watering_check(text, integer, text, text, text) from public;
grant execute on function public.calculate_container_size(text, integer, text), public.calculate_watering_check(text, integer, text, text, text) to anon, authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at) values
  ('tool', 'published', 'Pot size calculator', 'pot-size-calculator', 'Estimate a useful container volume and root depth from plant habit, plant count, and growing duration.', jsonb_build_object('stage', 'published', 'overview', 'This calculator estimates a practical container range from broad root and growth habits. It explains its assumptions because cultivar vigor, pot shape, climate, and pruning can change the useful size.', 'navigation', jsonb_build_object('section', 'tools', 'subsection', 'pot-size-calculator'), 'sources', jsonb_build_array(jsonb_build_object('title', 'Natura container-growing methodology')), 'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'plant pot size calculator', 'supporting_keywords', jsonb_build_array('container size for vegetables', 'pot volume calculator', 'root depth for pots'), 'search_intent', 'informational')), 'Pot Size Calculator for Container Plants | Natura', 'Estimate a practical pot volume, diameter, and root depth for herbs, fruiting crops, roots, and climbing plants.', now()),
  ('tool', 'published', 'Watering routine', 'watering-calculator', 'Build a soil-check routine from plant need, pot volume, exposure, temperature, and drainage.', jsonb_build_object('stage', 'published', 'overview', 'The tool estimates when to inspect the growing mix. It deliberately does not tell you to water on a fixed schedule: moisture, plant response, recent rain, and drainage decide whether water is needed.', 'navigation', jsonb_build_object('section', 'tools', 'subsection', 'watering-calculator'), 'sources', jsonb_build_array(jsonb_build_object('title', 'Natura observation-first watering methodology')), 'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'container watering routine', 'supporting_keywords', jsonb_build_array('when to check pot soil', 'balcony plant watering', 'watering plants in hot weather'), 'search_intent', 'how-to')), 'Container Watering Check Routine | Natura', 'Create an observation-first soil-check routine for container plants using pot size, exposure, heat, and drainage.', now())
on conflict (slug) do nothing;

insert into public.content_workflows (content_id, author_id, reviewer_id, review_state, approved_at)
select tool.id, author.id, reviewer.id, 'approved', coalesce(tool.published_at, now())
from public.content_items tool
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where tool.slug in ('pot-size-calculator', 'watering-calculator') and tool.content_type = 'tool'
on conflict (content_id) do nothing;
