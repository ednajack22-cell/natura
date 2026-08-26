drop function if exists public.get_monthly_growing_tasks(integer, text, text, integer);

create or replace function public.get_monthly_growing_tasks(
  requested_month integer default 1,
  requested_climate text default 'general',
  requested_hemisphere text default 'both',
  requested_space text default 'all',
  result_limit integer default 8
)
returns table (
  entry_id uuid,
  activity_type text,
  title text,
  description text,
  priority text,
  calendar_title text,
  calendar_slug text,
  calendar_climate text,
  calendar_hemisphere text,
  calendar_space text,
  context_score integer,
  scope_note text,
  warnings text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select greatest(1, least(coalesce(requested_month, 1), 12)) as month,
      case when requested_climate in ('general', 'temperate', 'mediterranean', 'continental', 'tropical') then requested_climate else 'general' end as climate,
      case when requested_hemisphere in ('northern', 'southern', 'both') then requested_hemisphere else 'both' end as hemisphere,
      case when requested_space in ('all', 'balcony', 'container', 'garden', 'indoor') then requested_space else 'all' end as space,
      greatest(1, least(coalesce(result_limit, 8), 24)) as safe_limit
  ), ranked_calendars as (
    select profile.content_id, content.title, content.slug, profile.climate, profile.hemisphere, profile.space_type, profile.scope_note, profile.warnings,
      (case when input.climate = profile.climate then 40 when input.climate = 'general' or profile.climate = 'general' then 25 else 5 end +
       case when input.hemisphere = profile.hemisphere then 30 when input.hemisphere = 'both' or profile.hemisphere = 'both' then 20 else 0 end +
       case when input.space = profile.space_type then 30 when input.space = 'all' or profile.space_type = 'all' then 20 else 5 end)::integer as context_score
    from public.calendar_profiles profile
    join public.content_items content on content.id = profile.content_id
    cross join input
    where content.content_type = 'calendar' and content.status = 'published'
  ), closest as (
    select * from ranked_calendars order by context_score desc, title limit 1
  )
  select entry.id, entry.activity_type, entry.title, entry.description, entry.priority,
    closest.title, closest.slug, closest.climate, closest.hemisphere, closest.space_type, closest.context_score, closest.scope_note, closest.warnings
  from closest
  join public.calendar_entries entry on entry.calendar_content_id = closest.content_id
  cross join input
  where entry.month = input.month
  order by case entry.priority when 'high' then 0 when 'normal' then 1 else 2 end, entry.sort_order, entry.title
  limit (select safe_limit from input);
$$;

revoke all on function public.get_monthly_growing_tasks(integer, text, text, text, integer) from public;
grant execute on function public.get_monthly_growing_tasks(integer, text, text, text, integer) to anon, authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values
  ('calendar', 'published', 'Climate-first monthly garden checklist', 'general-climate-first-calendar', 'A twelve-month observation checklist for readers who are still identifying their climate, hemisphere, frost pattern, and rainfall rhythm.', jsonb_build_object(
    'overview', 'Use this calendar to collect the local information that a fixed global schedule cannot supply. It deliberately avoids crop-specific sowing dates until climate, hemisphere, frost, heat, rainfall, and growing space are known.',
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'RHS — Vegetable seeds: sowing guide', 'url', 'https://www.rhs.org.uk/vegetables/seeds-sowing'),
      jsonb_build_object('title', 'Oregon State University Extension — Croptime and weather-based scheduling', 'url', 'https://extension.oregonstate.edu/impact/croptime-helps-vegetable-growers-fine-tune-planting-harvest-schedules')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'garden calendar by climate and hemisphere', 'supporting_keywords', jsonb_build_array('monthly garden checklist', 'climate based planting calendar'), 'search_intent', 'informational')
  ), 'Garden Calendar by Climate and Hemisphere | Natura', 'Build a monthly garden routine from local climate, hemisphere, frost, rainfall, light, and growing-space observations.', now()),
  ('calendar', 'published', 'Temperate Northern Hemisphere planting calendar', 'temperate-northern-calendar', 'A condition-aware twelve-month rhythm for frost-prone temperate gardens and containers in the Northern Hemisphere.', jsonb_build_object(
    'overview', 'This calendar follows a broad cool-winter, warm-summer temperate pattern. Use local last- and first-frost estimates, soil temperature, current forecasts, and cultivar maturity rather than treating the month as permission to plant.',
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'RHS — Vegetable seeds: sowing guide', 'url', 'https://www.rhs.org.uk/vegetables/seeds-sowing'),
      jsonb_build_object('title', 'University of Minnesota Extension — Planting the vegetable garden', 'url', 'https://extension.umn.edu/planting-and-growing-guides/planting-vegetable-garden'),
      jsonb_build_object('title', 'Oregon State University Extension — Growing Your Own', 'url', 'https://extension.oregonstate.edu/catalog/em-9027-growing-your-own')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'temperate northern hemisphere planting calendar', 'supporting_keywords', jsonb_build_array('temperate vegetable garden calendar', 'planting by frost date'), 'search_intent', 'informational')
  ), 'Temperate Northern Hemisphere Planting Calendar', 'Plan a temperate Northern Hemisphere garden month by month using frost dates, soil temperature, weather, and crop maturity.', now()),
  ('calendar', 'published', 'Temperate Southern Hemisphere planting calendar', 'temperate-southern-calendar', 'A condition-aware twelve-month rhythm for frost-prone temperate gardens and containers in the Southern Hemisphere.', '{}'::jsonb, 'Temperate Southern Hemisphere Planting Calendar', 'Plan a temperate Southern Hemisphere garden month by month using frost dates, soil temperature, weather, and crop maturity.', now()),
  ('calendar', 'published', 'Mediterranean Southern Hemisphere container calendar', 'mediterranean-southern-calendar', 'A twelve-month container-growing rhythm for mild wet winters and hot dry summers in Southern Hemisphere Mediterranean climates.', jsonb_build_object(
    'overview', 'Use this as a broad Southern Hemisphere Mediterranean pattern, not a city-specific schedule. The arrival of useful autumn rain, heatwaves, water restrictions, coastal exposure, altitude, and local frost can shift every task.',
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'Australian Bureau of Agricultural and Resource Economics — Southern Australia autumn break', 'url', 'https://www.agriculture.gov.au/abares/products/weekly_update/weekly-update-11424'),
      jsonb_build_object('title', 'FAO — Properties of dryland cropping systems', 'url', 'https://www.fao.org/4/V9926E/v9926e03.htm')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'mediterranean southern hemisphere planting calendar', 'supporting_keywords', jsonb_build_array('southern hemisphere container calendar', 'dry summer garden calendar'), 'search_intent', 'informational')
  ), 'Mediterranean Southern Hemisphere Calendar', 'Plan containers through wet winters and dry summers in Southern Hemisphere Mediterranean climates with local weather checks.', now()),
  ('calendar', 'published', 'Continental Northern Hemisphere planting calendar', 'continental-northern-calendar', 'A short-season twelve-month garden rhythm for cold winters, late frosts, warm summers, and rapid seasonal transitions.', jsonb_build_object(
    'overview', 'Continental conditions vary widely. This calendar prioritises frost-free season length, soil readiness, short-maturity cultivars, hardening off, wind, and protection of container roots.',
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'Colorado State University Extension — Vegetable gardening in the mountains', 'url', 'https://extension.colostate.edu/resource/vegetable-gardening-in-the-mountains/'),
      jsonb_build_object('title', 'University of Minnesota Extension — Planting the vegetable garden', 'url', 'https://extension.umn.edu/planting-and-growing-guides/planting-vegetable-garden')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'continental northern hemisphere planting calendar', 'supporting_keywords', jsonb_build_array('short season vegetable calendar', 'cold winter garden calendar'), 'search_intent', 'informational')
  ), 'Continental Northern Hemisphere Planting Calendar', 'Plan a cold-winter continental garden around frost-free days, soil readiness, short varieties, and fast seasonal changes.', now()),
  ('calendar', 'published', 'Continental Southern Hemisphere planting calendar', 'continental-southern-calendar', 'A short-season twelve-month garden rhythm for Southern Hemisphere locations with cold winters and rapid seasonal transitions.', '{}'::jsonb, 'Continental Southern Hemisphere Planting Calendar', 'Plan a Southern Hemisphere continental garden around frost-free days, soil readiness, short varieties, and fast seasonal changes.', now()),
  ('calendar', 'published', 'Tropical rainfall-aware garden calendar', 'tropical-rainfall-aware-calendar', 'A twelve-month decision cycle that follows local wet and dry seasons instead of assuming Northern or Southern temperate seasons.', jsonb_build_object(
    'overview', 'Tropical planting decisions are often controlled more by local rainfall, drainage, humidity, heat, storms, and access to irrigation than by the month number. Identify the current local rainfall phase before using each task.',
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'FAO — Food crop planting sequences for home gardens', 'url', 'https://www.fao.org/4/x3996e/x3996e36.htm'),
      jsonb_build_object('title', 'FAO — Improving nutrition through home gardening', 'url', 'https://www.fao.org/4/v5290e/v5290e04.htm'),
      jsonb_build_object('title', 'University of Hawaiʻi CTAHR — Planting the home garden', 'url', 'https://www.ctahr.hawaii.edu/oc/freepubs/pdf/GHGS-31.pdf')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'tropical garden calendar rainy dry season', 'supporting_keywords', jsonb_build_array('tropical vegetable planting calendar', 'rainfall based garden planning'), 'search_intent', 'informational')
  ), 'Tropical Garden Calendar by Rainy and Dry Season', 'Plan a tropical garden through local rainfall, drainage, heat, humidity, irrigation, and storm conditions rather than imported seasons.', now())
on conflict (slug) do update set
  title = excluded.title, excerpt = excluded.excerpt,
  body = case when excluded.body = '{}'::jsonb then public.content_items.body else excluded.body end,
  seo_title = excluded.seo_title, seo_description = excluded.seo_description,
  status = 'published', published_at = coalesce(public.content_items.published_at, now()), updated_at = now();

update public.content_items southern
set body = jsonb_set(
  jsonb_set(northern.body, '{overview}', to_jsonb('This calendar follows a broad cool-winter, warm-summer temperate pattern in the Southern Hemisphere. Use local last- and first-frost estimates, soil temperature, current forecasts, and cultivar maturity rather than treating the month as permission to plant.'::text), true),
  '{seo_keyword_strategy,focus_keyword}', to_jsonb('temperate southern hemisphere planting calendar'::text), true
)
from public.content_items northern
where southern.slug = 'temperate-southern-calendar'
  and northern.slug = 'temperate-northern-calendar';

update public.content_items southern
set body = jsonb_set(
  jsonb_set(northern.body, '{overview}', to_jsonb('Southern Hemisphere continental conditions vary widely. This calendar prioritises frost-free season length, soil readiness, short-maturity cultivars, hardening off, wind, and protection of container roots.'::text), true),
  '{seo_keyword_strategy,focus_keyword}', to_jsonb('continental southern hemisphere planting calendar'::text), true
)
from public.content_items northern
where southern.slug = 'continental-southern-calendar'
  and northern.slug = 'continental-northern-calendar';

insert into public.calendar_profiles (content_id, climate, hemisphere, space_type, scope_note, warnings)
select content.id, seed.climate, seed.hemisphere, seed.space_type, seed.scope_note, seed.warnings
from (values
  ('general-climate-first-calendar', 'general', 'both', 'all', 'For readers who need a neutral observation framework before choosing a regional calendar.', array['This checklist does not provide crop-specific sowing dates.','Use a trusted local forecast, frost history, and rainfall information before acting.']::text[]),
  ('temperate-northern-calendar', 'temperate', 'northern', 'all', 'For broad Northern Hemisphere temperate patterns with a cool winter, spring frost transition, warm summer, and autumn frost return.', array['Local frost dates, maritime influence, altitude, and urban heat can shift tasks by several weeks.']::text[]),
  ('temperate-southern-calendar', 'temperate', 'southern', 'all', 'For broad Southern Hemisphere temperate patterns with a cool winter, spring frost transition, warm summer, and autumn frost return.', array['Local frost dates, maritime influence, altitude, and urban heat can shift tasks by several weeks.']::text[]),
  ('mediterranean-southern-calendar', 'mediterranean', 'southern', 'container', 'For Southern Hemisphere locations with broadly mild wet winters and hot dry summers, especially container growing.', array['The useful autumn rain may arrive early, late, or not at all.','Heatwaves, water restrictions, wind, altitude, and coastal exposure can shift tasks.']::text[]),
  ('continental-northern-calendar', 'continental', 'northern', 'all', 'For Northern Hemisphere locations with cold winters, a restricted frost-free season, warm summers, and rapid transitions.', array['Confirm local frost-free days and soil readiness; high elevation can shorten the season further.']::text[]),
  ('continental-southern-calendar', 'continental', 'southern', 'all', 'For Southern Hemisphere locations with cold winters, a restricted frost-free season, warm summers, and rapid transitions.', array['Confirm local frost-free days and soil readiness; high elevation can shorten the season further.']::text[]),
  ('tropical-rainfall-aware-calendar', 'tropical', 'both', 'all', 'For tropical and subtropical home gardens where wet and dry seasons, humidity, storms, and irrigation access matter more than hemisphere labels.', array['Rainy and dry seasons occur in different months across tropical regions.','Use local rainfall, flood, cyclone, heat, and water guidance before acting.']::text[])
) as seed(slug, climate, hemisphere, space_type, scope_note, warnings)
join public.content_items content on content.slug = seed.slug and content.content_type = 'calendar'
on conflict (content_id) do update set climate = excluded.climate, hemisphere = excluded.hemisphere, space_type = excluded.space_type, scope_note = excluded.scope_note, warnings = excluded.warnings, updated_at = now();

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select calendar.id, task.month, task.activity_type, task.title, task.description, task.priority, 10
from public.content_items calendar
cross join (values
  (1, 'plan', 'Map the local growing season', 'Record hemisphere, broad climate, average frost window, rainfall pattern, and the limits of your growing space before choosing crops.', 'high'),
  (2, 'care', 'Measure usable direct light', 'Track direct sun on leaves at several times of day; seasonal sun angle and nearby buildings can change the result.', 'normal'),
  (3, 'plan', 'Check the next temperature threshold', 'Use a trusted forecast and crop tolerance to identify frost, cold-soil, or extreme-heat constraints.', 'high'),
  (4, 'care', 'Review water and drainage', 'Check how quickly the root zone dries, where water collects, and whether containers drain freely.', 'high'),
  (5, 'sow-outdoors', 'Trial one small succession', 'When local conditions fit the crop, sow a small amount and record emergence instead of committing the whole space.', 'normal'),
  (6, 'care', 'Inspect before treating', 'Check leaf undersides, new growth, stems, and roots; identify a likely cause before choosing any treatment.', 'normal'),
  (7, 'protect', 'Reassess the current weather extreme', 'Adapt shade, wind protection, watering checks, or frost protection to observed conditions, not the calendar label.', 'high'),
  (8, 'care', 'Review container fertility', 'Look for slowed growth, exhausted mix, salt buildup, and root crowding before feeding or repotting.', 'normal'),
  (9, 'plan', 'Plan the next seasonal transition', 'Work back from likely frost, heat, or rainfall changes using crop maturity and establishment time.', 'high'),
  (10, 'protect', 'Prepare proportionate protection', 'Secure supports and prepare suitable fleece, shade, drainage, or storm shelter only for risks supported by local conditions.', 'normal'),
  (11, 'harvest', 'Review harvest and storage', 'Harvest at the crop’s useful stage and note which produce needs prompt use, curing, or suitable storage.', 'normal'),
  (12, 'plan', 'Record results for the next cycle', 'Keep the dates, temperatures, rainfall, successes, and failures that will make next year’s local calendar more accurate.', 'high')
) as task(month, activity_type, title, description, priority)
where calendar.slug = 'general-climate-first-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = calendar.id and existing.month = task.month and existing.title = task.title);

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select calendar.id, task.month, task.activity_type, task.title, task.description, task.priority, 10
from public.content_items calendar
cross join (values
  (1, 'plan', 'Plan from frost records, not hope', 'Review local first and last frost estimates, crop maturity, and available protected space before ordering or starting seed.', 'high'),
  (2, 'sow-indoors', 'Start only crops that need a long lead', 'Use adequate light and avoid starting fast crops too early; weak, crowded seedlings are not an advantage.', 'normal'),
  (3, 'sow-outdoors', 'Test soil readiness for cool crops', 'When soil is workable and within the crop’s germination range, begin small sowings of suitable cool-season crops.', 'high'),
  (4, 'care', 'Build cool-season successions', 'Sow small batches of salads, radish, peas, or other locally suitable cool crops and harden protected seedlings gradually.', 'normal'),
  (5, 'plant', 'Wait for tender-crop conditions', 'Plant frost-tender crops only after local frost risk and soil conditions are suitable; keep protection ready for an unusual cold night.', 'high'),
  (6, 'care', 'Support active summer growth', 'Secure climbing crops, check containers frequently, mulch suitable beds, and water from root-zone observations.', 'normal'),
  (7, 'plan', 'Count back from first frost', 'Use days to maturity plus slower late-season growth to decide which autumn crops still have time to finish.', 'high'),
  (8, 'sow-outdoors', 'Start suitable autumn crops', 'Sow cool-season greens and roots that can mature before severe cold, using shade or careful watering during hot spells.', 'normal'),
  (9, 'harvest', 'Harvest tender crops before damaging cold', 'Watch the current forecast, continue hardy crops, and avoid assuming the average first frost is a deadline.', 'high'),
  (10, 'protect', 'Prepare beds and containers for colder weather', 'Clear diseased material, protect remaining suitable crops, and keep drainage open as rainfall and cold increase.', 'normal'),
  (11, 'protect', 'Protect exposed container roots', 'Small containers cool faster than garden soil; move suitable pots or insulate root zones when forecasts justify it.', 'high'),
  (12, 'plan', 'Review the season and stored produce', 'Record actual frost dates and crop performance, check stored produce, and revise next season’s shortlist.', 'normal')
) as task(month, activity_type, title, description, priority)
where calendar.slug = 'temperate-northern-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = calendar.id and existing.month = task.month and existing.title = task.title);

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select southern.id, ((northern.month + 5) % 12) + 1, northern.activity_type, northern.title, northern.description, northern.priority, northern.sort_order
from public.content_items southern
join public.content_items northern_content on northern_content.slug = 'temperate-northern-calendar'
join public.calendar_entries northern on northern.calendar_content_id = northern_content.id
where southern.slug = 'temperate-southern-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = southern.id and existing.month = ((northern.month + 5) % 12) + 1 and existing.title = northern.title);

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select calendar.id, task.month, task.activity_type, task.title, task.description, task.priority, 10
from public.content_items calendar
cross join (values
  (1, 'protect', 'Protect roots and plan for a short season', 'Check stored seed, identify short-maturity cultivars, and protect exposed containers from deep freezing and drying wind.', 'high'),
  (2, 'sow-indoors', 'Count back carefully from frost-free conditions', 'Start only long-lead crops with enough light, using the local frost-free date as an estimate rather than a promise.', 'normal'),
  (3, 'plan', 'Do not rush frozen or saturated soil', 'Inspect thaw depth, drainage, and forecast trends; prepare equipment and protected sowing space while outdoor soil remains unsuitable.', 'high'),
  (4, 'sow-outdoors', 'Begin hardy crops when soil is workable', 'Use soil temperature and current frost risk for small sowings of suitable greens, peas, radish, and other hardy crops.', 'high'),
  (5, 'plant', 'Harden seedlings through rapid transitions', 'Expose seedlings gradually to wind, sun, and cool nights; delay tender crops until local frost danger has passed.', 'high'),
  (6, 'care', 'Use the short warm window well', 'Support and monitor fast-maturing warm crops, keep roots evenly moist, and secure protection against wind or hail where relevant.', 'normal'),
  (7, 'care', 'Maintain growth through heat and wind', 'Check containers frequently, reduce avoidable stress, and continue short successions only when maturity fits the remaining season.', 'normal'),
  (8, 'plan', 'Count back from the likely first frost', 'Prioritise quick cool-season crops and stop sowing plants unlikely to mature before cold and low light slow growth.', 'high'),
  (9, 'harvest', 'Respond to early frost forecasts', 'Harvest or protect tender crops, continue cold-tolerant crops where suitable, and secure containers against wind.', 'high'),
  (10, 'protect', 'Close the season without spreading problems', 'Remove diseased debris, clean supports, keep useful hardy crops, and prepare containers for freeze-thaw cycles.', 'normal'),
  (11, 'protect', 'Insulate vulnerable containers', 'Move manageable pots to appropriate shelter and prevent waterlogged mix from freezing around roots.', 'high'),
  (12, 'plan', 'Measure the season you actually had', 'Record frost-free days, slow-maturing failures, wind exposure, and successful varieties for the next short-season plan.', 'normal')
) as task(month, activity_type, title, description, priority)
where calendar.slug = 'continental-northern-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = calendar.id and existing.month = task.month and existing.title = task.title);

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select southern.id, ((northern.month + 5) % 12) + 1, northern.activity_type, northern.title, northern.description, northern.priority, northern.sort_order
from public.content_items southern
join public.content_items northern_content on northern_content.slug = 'continental-northern-calendar'
join public.calendar_entries northern on northern.calendar_content_id = northern_content.id
where southern.slug = 'continental-southern-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = southern.id and existing.month = ((northern.month + 5) % 12) + 1 and existing.title = northern.title);

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select southern.id, ((northern.month + 5) % 12) + 1, northern.activity_type, northern.title, northern.description, northern.priority, northern.sort_order
from public.content_items southern
join public.content_items northern_content on northern_content.slug = 'mediterranean-container-calendar'
join public.calendar_entries northern on northern.calendar_content_id = northern_content.id
where southern.slug = 'mediterranean-southern-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = southern.id and existing.month = ((northern.month + 5) % 12) + 1 and existing.title = northern.title);

insert into public.calendar_entries (calendar_content_id, month, activity_type, title, description, priority, sort_order)
select calendar.id, task.month, task.activity_type, task.title, task.description, task.priority, 10
from public.content_items calendar
cross join (values
  (1, 'plan', 'Identify the current rainfall phase', 'Use local rainfall records and forecasts to label the present period as wet, dry, transitional, or unusually variable.', 'high'),
  (2, 'care', 'Inspect drainage under real rain or irrigation', 'Check how quickly containers and beds drain; raised or sheltered growing may be needed where roots remain saturated.', 'high'),
  (3, 'plan', 'Set a realistic dry-season water budget', 'Match crop area and succession size to reliable water access instead of planting more than can be maintained.', 'high'),
  (4, 'protect', 'Use shade only when heat stress supports it', 'Observe midday wilting, leaf scorch, and root-zone temperature before adding ventilated shade or moving containers.', 'normal'),
  (5, 'care', 'Reduce wet-season disease pressure', 'Increase spacing and airflow, water only when needed, remove badly affected material, and avoid automatic treatment.', 'high'),
  (6, 'sow-outdoors', 'Sow small, staggered batches', 'Relay sow suitable locally adapted crops so harvests overlap without creating a glut or exposing the whole crop to one storm.', 'normal'),
  (7, 'protect', 'Prepare for local storm risks', 'Secure containers and supports, clear drainage routes, and follow official cyclone, flood, or severe-weather guidance.', 'high'),
  (8, 'care', 'Review leaching and root-zone fertility', 'Heavy rain can move nutrients while dry-season irrigation can build salts; inspect growth and the growing mix before feeding.', 'normal'),
  (9, 'plan', 'Choose crops for heat and humidity', 'Prefer locally recommended crops and cultivars whose temperature, disease, and day-length needs fit the current season.', 'high'),
  (10, 'care', 'Inspect pests before they multiply', 'Check new growth and leaf undersides frequently; use identification and proportionate controls rather than routine spraying.', 'normal'),
  (11, 'harvest', 'Harvest promptly and continue the relay', 'Pick at the useful stage, remove declining plants, and replant small areas only when the next rainfall phase supports it.', 'normal'),
  (12, 'plan', 'Record the local wet and dry cycle', 'Note rain onset, dry spells, storm damage, irrigation demand, and successful crops to build a genuinely local calendar.', 'high')
) as task(month, activity_type, title, description, priority)
where calendar.slug = 'tropical-rainfall-aware-calendar'
  and not exists (select 1 from public.calendar_entries existing where existing.calendar_content_id = calendar.id and existing.month = task.month and existing.title = task.title);

insert into public.content_workflows (content_id, author_id, reviewer_id, review_state, approved_at)
select calendar.id, author.id, reviewer.id, 'approved', coalesce(calendar.published_at, now())
from public.content_items calendar
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where calendar.slug in ('general-climate-first-calendar','temperate-northern-calendar','temperate-southern-calendar','mediterranean-southern-calendar','continental-northern-calendar','continental-southern-calendar','tropical-rainfall-aware-calendar')
on conflict (content_id) do update set author_id = excluded.author_id, reviewer_id = excluded.reviewer_id, review_state = 'approved', approved_at = excluded.approved_at, updated_at = now();

update public.content_items
set excerpt = 'See published monthly tasks for a selected climate, hemisphere, growing space, and month.',
    body = jsonb_set(body, '{overview}', to_jsonb('This tool retrieves tasks from Natura published calendars and labels the climate, hemisphere, and growing-space context used. A close match is useful for planning, but soil temperature, frost, heat, rainfall, and local forecasts still decide the timing.'::text), true),
    seo_title = 'Monthly Planting Tasks by Climate and Hemisphere',
    seo_description = 'Explore monthly planting tasks by climate, hemisphere, and growing space, with transparent context matching and local-condition limits.',
    updated_at = now()
where slug = 'planting-calendar' and content_type = 'tool';
