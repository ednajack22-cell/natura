create or replace function public.plan_small_growing_space(
  width_cm numeric default 200,
  depth_cm numeric default 120,
  access_style text default 'edge-only',
  sun_hours integer default 6,
  space_type text default 'balcony'
)
returns table (
  total_area_m2 numeric,
  growing_area_m2 numeric,
  access_reserved_percent integer,
  suggested_modules integer,
  module_width_cm integer,
  layout_note text,
  priorities text[],
  checks text[],
  safety_note text
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select greatest(50::numeric, least(coalesce(width_cm, 200), 600::numeric)) as width_cm,
      greatest(40::numeric, least(coalesce(depth_cm, 120), 600::numeric)) as depth_cm,
      case when access_style in ('edge-only', 'central-path', 'walk-through') then access_style else 'edge-only' end as access_style,
      greatest(0, least(coalesce(sun_hours, 6), 12)) as sun_hours,
      case when space_type in ('balcony', 'patio', 'indoor', 'small-garden') then space_type else 'balcony' end as space_type
  ), prepared as (
    select input.*,
      round((input.width_cm * input.depth_cm / 10000), 2) as total_area,
      case input.access_style when 'edge-only' then 10 when 'central-path' then 32 else 42 end as reserve_percent,
      case when input.sun_hours < 3 then 0.58 when input.sun_hours < 6 then 0.78 else 1.0 end as light_density
    from input
  ), planned as (
    select prepared.*,
      round(total_area * (100 - reserve_percent) / 100, 2) as growing_area,
      case when sun_hours < 4 then 45 else 40 end as module_width
    from prepared
  )
  select planned.total_area, planned.growing_area, planned.reserve_percent,
    greatest(1, least(24, floor(planned.growing_area * planned.light_density / power(planned.module_width / 100.0, 2))::integer)),
    planned.module_width,
    case planned.access_style
      when 'edge-only' then 'Keep the centre clear and arrange movable modules along reachable edges.'
      when 'central-path' then 'Reserve one continuous central access strip and place modules on both sides without narrowing the route.'
      else 'Keep a continuous route from entry to exit; use the remaining edges for compact, movable modules.'
    end,
    array[
      case when planned.sun_hours < 3 then 'Prioritize shade-tolerant foliage and observation before adding more modules.' when planned.sun_hours < 6 then 'Use the brightest zone for fruiting plants and the softer edges for leafy crops.' else 'Group plants by water demand and protect containers from extreme afternoon heat.' end,
      case planned.space_type when 'indoor' then 'Keep plants close to usable natural light without blocking windows, ventilation, or access.' else 'Place taller plants where they will not shade smaller modules or obstruct neighbours.' end,
      'Leave every container reachable for watering, inspection, pruning, and safe removal.'
    ]::text[],
    array[
      'Measure the clear usable footprint again, including doors, drains, railings, and furniture movement.',
      case when planned.space_type = 'balcony' then 'Ask the building owner or a qualified professional to confirm structural load, fixing, drainage, and escape-route limits.' else 'Confirm drainage, waterproofing, safe access, and any property or landlord restrictions.' end,
      'Test the layout with empty containers before adding wet compost, plants, water reservoirs, or trellises.',
      'Keep fire, emergency, and everyday circulation routes fully open.'
    ]::text[],
    'This is a spatial planning estimate only. It does not verify structural load, waterproofing, drainage capacity, wind safety, fire rules, landlord permission, or safe fixing.'
  from planned;
$$;

create or replace function public.guide_plant_observation(
  observed_sign text default 'yellowing',
  moisture_condition text default 'unknown',
  distribution_pattern text default 'whole-plant',
  recent_change text default 'none'
)
returns table (
  attention_level text,
  category_hint text,
  summary text,
  observation_checks text[],
  avoid_actions text[],
  assumptions text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select case when observed_sign in ('yellowing', 'wilting', 'spots', 'insects', 'poor-growth') then observed_sign else 'yellowing' end as sign,
      case when moisture_condition in ('dry', 'moist', 'wet', 'unknown') then moisture_condition else 'unknown' end as moisture,
      case when distribution_pattern in ('older-leaves', 'new-growth', 'whole-plant', 'isolated') then distribution_pattern else 'whole-plant' end as distribution,
      case when recent_change in ('none', 'watering', 'feeding', 'temperature', 'move-repot') then recent_change else 'none' end as recent_change
  )
  select
    case when (input.sign = 'wilting' and input.moisture = 'wet') or input.sign = 'insects' then 'prompt' when input.sign = 'spots' or input.moisture = 'wet' then 'watch' else 'routine' end,
    case when input.sign = 'insects' then 'pest' when input.sign = 'spots' then 'disease' when input.sign = 'poor-growth' then 'nutrition' when input.moisture in ('dry', 'wet') or input.sign in ('yellowing', 'wilting') then 'watering' else 'environment' end,
    format('Treat %s as an observation, not a diagnosis. Compare the %s pattern with moisture, recent changes, and the healthy parts of the plant before acting.', replace(input.sign, '-', ' '), replace(input.distribution, '-', ' ')),
    array_remove(array[
      'Photograph the whole plant and one affected area in clear light so the pattern can be compared tomorrow.',
      case input.sign when 'yellowing' then 'Note whether yellowing starts between veins, at leaf edges, or uniformly across the leaf.' when 'wilting' then 'Compare leaf posture before and after the coolest part of the day; heat wilt can differ from persistent root stress.' when 'spots' then 'Check both leaf surfaces and note whether spots are dry, soft, spreading, ringed, or associated with damaged tissue.' when 'insects' then 'Inspect leaf undersides, growing tips, stems, and nearby plants for insects, cast skins, webbing, honeydew, or chewing.' else 'Compare new growth size, colour, spacing, and rate with older healthy growth.' end,
      case input.moisture when 'dry' then 'Check moisture several centimetres below the surface and confirm whether the root ball has pulled away from the container.' when 'wet' then 'Confirm drainage holes are open and note how many days the growing mix has remained wet.' when 'moist' then 'Do not infer root moisture from the surface alone; compare several depths without damaging roots.' else 'Check moisture below the surface before deciding whether water is part of the pattern.' end,
      case input.distribution when 'older-leaves' then 'Compare the oldest affected leaves with healthy new growth; age-related loss and mobile nutrient patterns often begin low.' when 'new-growth' then 'Inspect the newest leaves and growing point for distortion, pale tissue, pests, or recent cold damage.' when 'isolated' then 'Look for a local cause such as contact damage, a single wet pocket, sun scorch, or one pest cluster.' else 'A whole-plant pattern deserves a review of roots, temperature, light, watering, and recent care changes together.' end,
      case input.recent_change when 'watering' then 'Record what changed in watering amount, frequency, drainage, or reservoir use.' when 'feeding' then 'Record product, concentration, timing, and whether the growing mix was already dry or stressed.' when 'temperature' then 'Compare the symptom timing with recent heat, cold, wind, or rapid indoor temperature changes.' when 'move-repot' then 'Check whether light, root space, compost, drainage, or exposure changed during the move or repot.' else null end
    ], null)::text[],
    array_remove(array[
      'Do not apply fertilizer, pesticide, fungicide, or repeated watering only because one symptom label seems to fit.',
      case when input.moisture = 'wet' then 'Do not add more water until drainage and moisture below the surface have been checked.' end,
      case when input.sign in ('spots', 'insects') then 'Avoid spreading material between plants; clean tools and keep the affected plant apart while you inspect it.' end,
      'Do not remove large amounts of partly healthy foliage before the pattern and cause are clearer.'
    ], null)::text[],
    array[
      'This guide uses broad visual and care-history categories and cannot identify a pathogen, pest species, deficiency, or root condition.',
      'More than one cause can be present at the same time.',
      'Rapid collapse, extensive rot, suspected poisoning, or a safety hazard requires suitable local expert help.'
    ]::text[]
  from input;
$$;

create or replace function public.find_guided_problem_matches(
  observed_sign text default 'yellowing',
  moisture_condition text default 'unknown',
  distribution_pattern text default 'whole-plant',
  result_limit integer default 4
)
returns table (
  content_id uuid,
  title text,
  slug text,
  excerpt text,
  category text,
  urgency text,
  match_score integer,
  reasons text[],
  symptoms text[],
  verification_steps jsonb,
  warnings text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select case when observed_sign in ('yellowing', 'wilting', 'spots', 'insects', 'poor-growth') then observed_sign else 'yellowing' end as sign,
      case when moisture_condition in ('dry', 'moist', 'wet', 'unknown') then moisture_condition else 'unknown' end as moisture,
      case when distribution_pattern in ('older-leaves', 'new-growth', 'whole-plant', 'isolated') then distribution_pattern else 'whole-plant' end as distribution,
      greatest(1, least(coalesce(result_limit, 4), 12)) as safe_limit
  ), prepared as (
    select content.id, content.title, content.slug, content.excerpt, profile.category, profile.urgency, profile.symptoms, profile.verification_steps, profile.warnings,
      lower(concat_ws(' ', content.title, content.excerpt, array_to_string(profile.symptoms, ' '))) as search_text,
      input.*
    from public.content_items content
    join public.problem_profiles profile on profile.content_id = content.id
    cross join input
    where content.content_type = 'problem' and content.status = 'published'
  ), scored as (
    select prepared.*,
      (case when sign = 'yellowing' and search_text like '%yellow%' then 55 when sign = 'wilting' and search_text like '%wilt%' then 55 when sign = 'spots' and (search_text like '%spot%' or search_text like '%lesion%') then 55 when sign = 'insects' and (search_text like '%insect%' or search_text like '%pest%') then 55 when sign = 'poor-growth' and (search_text like '%slow%' or search_text like '%growth%') then 55 else 0 end +
       case when (sign = 'insects' and category = 'pest') or (sign = 'spots' and category = 'disease') or (sign = 'poor-growth' and category = 'nutrition') or (sign in ('yellowing', 'wilting') and category = 'watering') then 20 else 0 end +
       case when moisture = 'wet' and category = 'watering' then 15 else 0 end +
       case when distribution = 'older-leaves' and search_text like '%older%' then 10 else 0 end)::integer as score
    from prepared
  )
  select scored.id, scored.title, scored.slug, scored.excerpt, scored.category, scored.urgency, scored.score,
    array_remove(array[
      case when scored.score >= 55 then 'The published symptom language overlaps with the selected visible sign.' end,
      case when scored.category = 'watering' and scored.moisture in ('dry', 'wet') then 'The selected moisture condition is relevant to this watering and root guide.' end,
      case when scored.distribution = 'older-leaves' and scored.search_text like '%older%' then 'The guide explicitly discusses older leaves.' end
    ], null)::text[],
    scored.symptoms, scored.verification_steps, scored.warnings
  from scored
  where scored.score > 0
  order by scored.score desc, scored.title
  limit (select safe_limit from input);
$$;

revoke all on function public.plan_small_growing_space(numeric, numeric, text, integer, text), public.guide_plant_observation(text, text, text, text), public.find_guided_problem_matches(text, text, text, integer) from public;
grant execute on function public.plan_small_growing_space(numeric, numeric, text, integer, text), public.guide_plant_observation(text, text, text, text), public.find_guided_problem_matches(text, text, text, integer) to anon, authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at) values
  ('tool', 'published', 'Small-space garden planner', 'garden-planner', 'Turn a measured footprint into a reachable container layout with visible access, light, and safety limits.', jsonb_build_object('stage', 'published', 'overview', 'This tool estimates growing area and movable planning modules after reserving space for access. It cannot verify structural loading, wind exposure, drainage, waterproofing, escape routes, or permission to install a garden.', 'navigation', jsonb_build_object('section', 'tools', 'subsection', 'garden-planner'), 'sources', jsonb_build_array(jsonb_build_object('title', 'Natura small-space planning method')), 'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'small space garden planner', 'supporting_keywords', jsonb_build_array('balcony container layout', 'patio garden planner', 'small garden access plan'), 'search_intent', 'how-to')), 'Small-Space Garden Planner for Containers | Natura', 'Estimate reachable growing area and container planning modules from measured dimensions, access, light, and space type, with safety limits.', now()),
  ('tool', 'published', 'Plant observation guide', 'guided-diagnosis', 'Organize visible symptoms, moisture, distribution, and recent changes before comparing published plant-problem guides.', jsonb_build_object('stage', 'published', 'overview', 'This guided observation tool helps the reader record a pattern and retrieve relevant published diagnostic guides. It does not identify diseases, pests, deficiencies, or root conditions and never replaces suitable local expertise.', 'navigation', jsonb_build_object('section', 'tools', 'subsection', 'guided-diagnosis'), 'sources', jsonb_build_array(jsonb_build_object('title', 'Natura observation-led diagnostic method')), 'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'plant symptom observation guide', 'supporting_keywords', jsonb_build_array('compare plant symptoms', 'yellow leaves diagnosis guide', 'plant problem checklist'), 'search_intent', 'informational')), 'Plant Symptom Observation Guide | Natura', 'Organize plant symptoms, moisture, distribution, and recent changes, then compare relevant published diagnostic guides without an automatic diagnosis.', now())
on conflict (slug) do nothing;

insert into public.content_workflows (content_id, author_id, reviewer_id, review_state, approved_at)
select tool.id, author.id, reviewer.id, 'approved', coalesce(tool.published_at, now())
from public.content_items tool
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where tool.slug in ('garden-planner', 'guided-diagnosis') and tool.content_type = 'tool'
on conflict (content_id) do nothing;
