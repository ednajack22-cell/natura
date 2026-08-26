create or replace function public.get_monthly_growing_tasks(
  requested_month integer default 1,
  requested_climate text default 'general',
  requested_space text default 'container',
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
      case when requested_space in ('all', 'balcony', 'container', 'garden', 'indoor') then requested_space else 'container' end as space,
      greatest(1, least(coalesce(result_limit, 8), 24)) as safe_limit
  ), ranked_calendars as (
    select profile.content_id, content.title, content.slug, profile.climate, profile.space_type, profile.scope_note, profile.warnings,
      (case when input.climate = profile.climate then 50 when input.climate = 'general' or profile.climate = 'general' then 35 else 10 end +
       case when input.space = profile.space_type then 35 when input.space = 'all' or profile.space_type = 'all' then 25 else 5 end)::integer as context_score
    from public.calendar_profiles profile
    join public.content_items content on content.id = profile.content_id
    cross join input
    where content.content_type = 'calendar' and content.status = 'published'
  ), closest as (
    select * from ranked_calendars order by context_score desc, title limit 1
  )
  select entry.id, entry.activity_type, entry.title, entry.description, entry.priority,
    closest.title, closest.slug, closest.climate, closest.space_type, closest.context_score, closest.scope_note, closest.warnings
  from closest
  join public.calendar_entries entry on entry.calendar_content_id = closest.content_id
  cross join input
  where entry.month = input.month
  order by case entry.priority when 'high' then 0 when 'normal' then 1 else 2 end, entry.sort_order, entry.title
  limit (select safe_limit from input);
$$;

create or replace function public.assess_frost_risk(
  forecast_low_c numeric default 2,
  plant_tolerance text default 'tender',
  exposure text default 'sheltered',
  containerized boolean default true
)
returns table (
  tolerance_threshold_c numeric,
  risk_level text,
  risk_score integer,
  explanation text,
  actions text[],
  assumptions text[]
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select greatest(-30::numeric, least(coalesce(forecast_low_c, 2), 20::numeric)) as forecast_low_c,
      case when plant_tolerance in ('tender', 'half-hardy', 'hardy') then plant_tolerance else 'tender' end as plant_tolerance,
      case when exposure in ('sheltered', 'open', 'windy') then exposure else 'sheltered' end as exposure,
      coalesce(containerized, true) as containerized
  ), baseline as (
    select input.*, case input.plant_tolerance when 'tender' then 5 when 'half-hardy' then 0 else -5 end::numeric as threshold
    from input
  ), scored as (
    select baseline.*,
      (case when forecast_low_c >= threshold + 3 then 0 when forecast_low_c >= threshold then 1 when forecast_low_c >= threshold - 3 then 2 else 3 end +
       case when forecast_low_c <= threshold + 3 then case exposure when 'windy' then 2 when 'open' then 1 else 0 end else 0 end +
       case when forecast_low_c <= threshold + 3 and containerized then 1 else 0 end)::integer as raw_score
    from baseline
  ), prepared as (
    select scored.*, greatest(0, least(raw_score, 6)) as score from scored
  )
  select prepared.threshold,
    case when score <= 1 then 'low' when score = 2 then 'watch' when score <= 4 then 'high' else 'critical' end,
    score,
    format('The forecast low is %s°C and this broad plant group begins needing caution around %s°C. Exposure and container roots adjust the final risk.', prepared.forecast_low_c, prepared.threshold),
    array_remove(array[
      case when score <= 1 then 'Continue monitoring the local forecast; no frost action is indicated by these inputs.' else 'Confirm the latest hourly local forecast, including frost advisories and expected duration.' end,
      case when score >= 2 and prepared.containerized then 'Move manageable pots beside a sheltered wall or into a suitable protected place before temperatures fall.' end,
      case when score >= 3 then 'Use breathable horticultural fleece without crushing foliage, and remove or vent it after conditions improve.' end,
      case when score >= 3 then 'Protect container roots as well as leaves; small pots cool faster than garden soil.' end,
      case when score >= 5 then 'Treat this as an urgent protection decision and prioritize the most tender or irreplaceable plants.' end,
      'Do not use heaters, flames, or sealed plastic covers around plants.'
    ], null)::text[],
    array[
      'The entered temperature must come from a current, trusted local forecast.',
      'A broad tolerance group cannot represent cultivar, plant age, acclimation, frost duration, humidity, or microclimate.',
      'Cold air can pool on balconies, patios, and low areas even when a general forecast is slightly warmer.'
    ]::text[]
  from prepared;
$$;

revoke all on function public.get_monthly_growing_tasks(integer, text, text, integer), public.assess_frost_risk(numeric, text, text, boolean) from public;
grant execute on function public.get_monthly_growing_tasks(integer, text, text, integer), public.assess_frost_risk(numeric, text, text, boolean) to anon, authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at) values
  ('tool', 'published', 'Monthly planting tasks', 'planting-calendar', 'See the most useful published sowing, planting, care, harvest, and protection tasks for a selected month and broad context.', jsonb_build_object('stage', 'published', 'overview', 'This tool retrieves tasks from Natura published calendars and labels the climate and space context used. A close match is useful for planning, but temperature, frost, heat, and local forecasts still decide the timing.', 'navigation', jsonb_build_object('section', 'tools', 'subsection', 'calendar-tool'), 'sources', jsonb_build_array(jsonb_build_object('title', 'Natura published planting calendars')), 'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'monthly planting tasks', 'supporting_keywords', jsonb_build_array('what to plant this month', 'container gardening calendar', 'monthly garden jobs'), 'search_intent', 'informational')), 'Monthly Planting Tasks by Climate and Space | Natura', 'Explore published monthly planting and container-care tasks by broad climate and growing space, with context and timing limits.', now()),
  ('tool', 'published', 'Frost risk check', 'frost-risk', 'Turn a trusted forecast low into a cautious plant-protection decision using tolerance, exposure, and container context.', jsonb_build_object('stage', 'published', 'overview', 'Enter the minimum temperature from a current local forecast. Natura then combines it with a broad plant tolerance group, exposure, and container-root vulnerability. The result is a planning aid, not a weather forecast or survival guarantee.', 'navigation', jsonb_build_object('section', 'tools', 'subsection', 'frost-risk'), 'sources', jsonb_build_array(jsonb_build_object('title', 'Natura conservative frost-risk methodology')), 'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'plant frost risk checker', 'supporting_keywords', jsonb_build_array('protect container plants from frost', 'frost temperature for tender plants', 'balcony frost risk'), 'search_intent', 'how-to')), 'Plant Frost Risk Check for Pots and Gardens | Natura', 'Assess broad frost risk from a trusted forecast low, plant tolerance, exposure, and container context, with cautious protection steps.', now())
on conflict (slug) do nothing;

insert into public.content_workflows (content_id, author_id, reviewer_id, review_state, approved_at)
select tool.id, author.id, reviewer.id, 'approved', coalesce(tool.published_at, now())
from public.content_items tool
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where tool.slug in ('planting-calendar', 'frost-risk') and tool.content_type = 'tool'
on conflict (content_id) do nothing;
