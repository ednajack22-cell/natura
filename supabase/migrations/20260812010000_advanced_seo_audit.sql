create or replace function public.content_public_route(content_type text, slug text)
returns text
language sql
immutable
security invoker
set search_path = ''
as $$
  select case content_type
    when 'plant' then '/plants/' || slug
    when 'problem' then '/plant-care/problems/' || slug
    when 'guide' then '/small-space-gardening/guides/' || slug
    when 'calendar' then '/planting-calendar/calendars/' || slug
    when 'tool' then '/tools/' || slug
    when 'review' then '/reviews/' || slug
    when 'page' then '/' || slug
    else '/' || slug
  end;
$$;

create or replace function public.admin_content_seo_audit()
returns table (
  content_id uuid,
  content_type text,
  title text,
  slug text,
  route text,
  focus_keyword text,
  search_intent text,
  seo_score integer,
  issues text[],
  days_since_update integer,
  author_name text,
  reviewer_name text,
  public_author boolean,
  inbound_links integer
)
language sql
stable
security invoker
set search_path = ''
as $$
  with relations as (
    select problem_content_id as target_id from public.problem_plant_links
    union all select plant_content_id from public.problem_plant_links
    union all select guide_content_id from public.guide_plant_links
    union all select plant_content_id from public.guide_plant_links
    union all select calendar_content_id from public.calendar_plant_links
    union all select plant_content_id from public.calendar_plant_links
  ), inbound as (
    select target_id, count(*)::integer as link_count from relations group by target_id
  ), prepared as (
    select content.*, workflow.review_state, author.display_name as author_name, reviewer.display_name as reviewer_name,
      coalesce(author.is_public, false) as public_author,
      coalesce(inbound.link_count, 0) as inbound_links,
      nullif(trim(content.body #>> '{seo_keyword_strategy,focus_keyword}'), '') as focus_keyword,
      nullif(trim(content.body #>> '{seo_keyword_strategy,search_intent}'), '') as search_intent,
      case when jsonb_typeof(content.body -> 'sources') = 'array' then jsonb_array_length(content.body -> 'sources') else 0 end as sources_count,
      coalesce(content.body #>> '{navigation,section}', '') as navigation_section,
      coalesce(content.body ->> 'overview', '') as overview,
      (current_date - content.updated_at::date)::integer as days_since_update
    from public.content_items content
    left join public.content_workflows workflow on workflow.content_id = content.id
    left join public.editorial_contributors author on author.id = workflow.author_id
    left join public.editorial_contributors reviewer on reviewer.id = workflow.reviewer_id
    left join inbound on inbound.target_id = content.id
    where content.status = 'published'
  )
  select prepared.id, prepared.content_type, prepared.title, prepared.slug,
    public.content_public_route(prepared.content_type, prepared.slug), prepared.focus_keyword, prepared.search_intent,
    (case when char_length(coalesce(prepared.seo_title, prepared.title)) between 30 and 60 then 15 when char_length(coalesce(prepared.seo_title, prepared.title)) between 15 and 70 then 8 else 0 end +
     case when char_length(coalesce(prepared.seo_description, '')) between 120 and 160 then 15 when char_length(coalesce(prepared.seo_description, '')) >= 70 then 8 else 0 end +
     case when char_length(coalesce(prepared.excerpt, '')) >= 80 then 10 when char_length(coalesce(prepared.excerpt, '')) >= 40 then 5 else 0 end +
     case when char_length(prepared.overview) >= 80 then 10 else 0 end +
     case when prepared.focus_keyword is not null and prepared.search_intent is not null then 15 when prepared.focus_keyword is not null then 7 else 0 end +
     case when prepared.sources_count > 0 then 10 else 0 end +
     case when prepared.navigation_section <> '' then 5 else 0 end +
     case when prepared.author_name is not null then 5 else 0 end +
     case when prepared.reviewer_name is not null and prepared.review_state = 'approved' then 5 else 0 end +
     case when prepared.public_author then 5 else 0 end +
     case when prepared.days_since_update <= 365 then 5 else 0 end)::integer,
    array_remove(array[
      case when char_length(coalesce(prepared.seo_title, prepared.title)) not between 15 and 70 then 'Search title is missing or outside the supported length.' end,
      case when char_length(coalesce(prepared.seo_description, '')) < 70 then 'Meta description is missing or too short.' end,
      case when char_length(coalesce(prepared.excerpt, '')) < 40 then 'Reader summary is too short.' end,
      case when char_length(prepared.overview) < 80 then 'Core overview is too thin.' end,
      case when prepared.focus_keyword is null then 'Primary search query is missing.' end,
      case when prepared.search_intent is null then 'Search intent is missing.' end,
      case when prepared.sources_count = 0 then 'No editorial source is recorded.' end,
      case when prepared.navigation_section = '' then 'Navigation section is missing.' end,
      case when prepared.author_name is null then 'No responsible author is assigned.' end,
      case when prepared.reviewer_name is null or prepared.review_state <> 'approved' then 'No distinct approved reviewer is assigned.' end,
      case when not prepared.public_author then 'The assigned author does not yet have an approved public profile.' end,
      case when prepared.days_since_update > 365 then 'Freshness review is overdue.' end,
      case when prepared.content_type in ('plant', 'problem', 'guide', 'calendar') and prepared.inbound_links = 0 then 'No structured inbound relationship is recorded.' end
    ], null)::text[],
    prepared.days_since_update, prepared.author_name, prepared.reviewer_name, prepared.public_author, prepared.inbound_links
  from prepared
  order by 8 asc, prepared.title;
$$;

create or replace function public.admin_keyword_cannibalization()
returns table (focus_keyword text, content_count integer, content_ids uuid[], titles text[], routes text[])
language sql
stable
security invoker
set search_path = ''
as $$
  with targets as (
    select content.id, content.title, public.content_public_route(content.content_type, content.slug) as route,
      regexp_replace(lower(trim(content.body #>> '{seo_keyword_strategy,focus_keyword}')), '[^a-z0-9]+', ' ', 'g') as normalized_keyword
    from public.content_items content
    where content.status = 'published' and nullif(trim(content.body #>> '{seo_keyword_strategy,focus_keyword}'), '') is not null
  )
  select normalized_keyword, count(*)::integer, array_agg(id order by title), array_agg(title order by title), array_agg(route order by title)
  from targets group by normalized_keyword having count(*) > 1 order by count(*) desc, normalized_keyword;
$$;

create or replace function public.admin_internal_link_audit()
returns table (relation_type text, source_title text, source_route text, target_title text, target_route text, link_status text)
language sql
stable
security invoker
set search_path = ''
as $$
  with relations as (
    select 'problem-plant'::text as relation_type, problem_content_id as source_id, plant_content_id as target_id from public.problem_plant_links
    union all select 'guide-plant', guide_content_id, plant_content_id from public.guide_plant_links
    union all select 'calendar-plant', calendar_content_id, plant_content_id from public.calendar_plant_links
  )
  select relations.relation_type, source.title, public.content_public_route(source.content_type, source.slug), target.title, public.content_public_route(target.content_type, target.slug),
    case when source.status = 'published' and target.status = 'published' then 'ok' when source.status = 'published' then 'broken-target' else 'inactive-source' end
  from relations
  join public.content_items source on source.id = relations.source_id
  join public.content_items target on target.id = relations.target_id
  order by 6 desc, 2, 4;
$$;

create or replace function public.admin_launch_content_coverage()
returns table (content_type text, published_count integer, launch_target integer, remaining_count integer, coverage_status text)
language sql
stable
security invoker
set search_path = ''
as $$
  with targets(content_type, launch_target) as (values ('plant', 15), ('problem', 10), ('guide', 5), ('calendar', 1), ('tool', 7), ('review', 3), ('page', 7)), counts as (
    select content.content_type, count(*)::integer as published_count from public.content_items content where content.status = 'published' group by content.content_type
  )
  select targets.content_type, coalesce(counts.published_count, 0), targets.launch_target,
    greatest(targets.launch_target - coalesce(counts.published_count, 0), 0),
    case when coalesce(counts.published_count, 0) >= targets.launch_target then 'ready' when coalesce(counts.published_count, 0) >= greatest(1, targets.launch_target / 2) then 'in-progress' else 'gap' end
  from targets left join counts using (content_type) order by targets.content_type;
$$;

create or replace function public.get_public_editorial_meta(content_slug text)
returns table (author_name text, author_slug text, reviewer_name text, reviewer_slug text, published_at timestamptz, updated_at timestamptz)
language sql
stable
security definer
set search_path = ''
as $$
  select author.display_name, author.slug, reviewer.display_name, reviewer.slug, content.published_at, content.updated_at
  from public.content_items content
  left join public.content_workflows workflow on workflow.content_id = content.id
  left join public.editorial_contributors author on author.id = workflow.author_id and author.is_public
  left join public.editorial_contributors reviewer on reviewer.id = workflow.reviewer_id and reviewer.is_public and workflow.review_state = 'approved'
  where content.slug = content_slug and content.status = 'published'
  limit 1;
$$;

revoke all on function public.content_public_route(text, text), public.admin_content_seo_audit(), public.admin_keyword_cannibalization(), public.admin_internal_link_audit(), public.admin_launch_content_coverage(), public.get_public_editorial_meta(text) from public;
grant execute on function public.content_public_route(text, text), public.get_public_editorial_meta(text) to anon, authenticated;
grant execute on function public.admin_content_seo_audit(), public.admin_keyword_cannibalization(), public.admin_internal_link_audit(), public.admin_launch_content_coverage() to authenticated;
