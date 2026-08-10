alter table public.content_items
  add column search_vector tsvector generated always as (
    setweight(to_tsvector('english'::regconfig, coalesce(title, '')), 'A') ||
    setweight(to_tsvector('english'::regconfig, coalesce(seo_title, '')), 'A') ||
    setweight(to_tsvector('english'::regconfig, coalesce(excerpt, '')), 'B') ||
    setweight(to_tsvector('english'::regconfig, coalesce(seo_description, '')), 'B') ||
    setweight(to_tsvector('english'::regconfig, coalesce(body::text, '')), 'C')
  ) stored;

drop index if exists public.content_items_search_index;
create index content_items_search_index
  on public.content_items using gin (search_vector)
  where status = 'published';

create or replace function public.search_prefix_query(search_query text)
returns tsquery
language sql
immutable
parallel safe
set search_path = ''
as $$
  select case
    when count(*) = 0 then null::tsquery
    else to_tsquery('english'::regconfig, string_agg(quote_literal(lexeme) || ':*', ' & '))
  end
  from unnest(tsvector_to_array(to_tsvector('english'::regconfig, coalesce(search_query, '')))) as lexeme;
$$;

create or replace function public.search_published_content(
  search_query text,
  filter_content_type text default null,
  result_limit integer default 24
)
returns table (
  id uuid,
  content_type text,
  title text,
  slug text,
  excerpt text,
  route text,
  rank double precision,
  updated_at timestamptz
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select
      trim(regexp_replace(lower(coalesce(search_query, '')), '\s+', ' ', 'g')) as normalized_query,
      case when filter_content_type in ('plant', 'problem', 'guide', 'calendar', 'tool', 'review', 'page') then filter_content_type end as content_filter,
      greatest(1, least(coalesce(result_limit, 24), 60)) as safe_limit
  ), queries as (
    select
      input.*,
      websearch_to_tsquery('english'::regconfig, input.normalized_query) as full_query,
      public.search_prefix_query(input.normalized_query) as prefix_query
    from input
  )
  select
    content.id,
    content.content_type,
    content.title,
    content.slug,
    content.excerpt,
    case content.content_type
      when 'plant' then '/plants/' || content.slug
      when 'problem' then '/plant-care/problems/' || content.slug
      when 'guide' then '/small-space-gardening/guides/' || content.slug
      when 'calendar' then '/planting-calendar/calendars/' || content.slug
      when 'review' then '/reviews/' || content.slug
      when 'page' then '/' || content.slug
      when 'tool' then '/tools/' || content.slug
    end as route,
    (
      ts_rank_cd(content.search_vector, queries.full_query, 32) +
      coalesce(ts_rank_cd(content.search_vector, queries.prefix_query, 32), 0) * 0.45 +
      case
        when lower(content.title) = queries.normalized_query then 3
        when lower(content.title) like queries.normalized_query || '%' then 1.5
        when lower(content.title) like '%' || queries.normalized_query || '%' then 0.75
        else 0
      end +
      case when lower(coalesce(content.excerpt, '')) like '%' || queries.normalized_query || '%' then 0.25 else 0 end
    )::double precision as rank,
    content.updated_at
  from public.content_items content
  cross join queries
  where content.status = 'published'
    and char_length(queries.normalized_query) >= 2
    and (queries.content_filter is null or content.content_type = queries.content_filter)
    and (
      (numnode(queries.full_query) > 0 and content.search_vector @@ queries.full_query) or
      (queries.prefix_query is not null and content.search_vector @@ queries.prefix_query)
    )
  order by rank desc, content.updated_at desc, content.title
  limit (select safe_limit from queries);
$$;

create or replace function public.suggest_published_searches(
  search_query text default '',
  suggestion_limit integer default 8
)
returns table (
  query text,
  label text,
  content_type text,
  route text
)
language sql
stable
security invoker
set search_path = ''
as $$
  with input as (
    select
      trim(regexp_replace(lower(coalesce(search_query, '')), '\s+', ' ', 'g')) as normalized_query,
      greatest(1, least(coalesce(suggestion_limit, 8), 16)) as safe_limit
  ), prepared as (
    select input.*, public.search_prefix_query(input.normalized_query) as prefix_query
    from input
  )
  select
    coalesce(nullif(content.body #>> '{seo_keyword_strategy,focus_keyword}', ''), content.title) as query,
    content.title as label,
    content.content_type,
    case content.content_type
      when 'plant' then '/plants/' || content.slug
      when 'problem' then '/plant-care/problems/' || content.slug
      when 'guide' then '/small-space-gardening/guides/' || content.slug
      when 'calendar' then '/planting-calendar/calendars/' || content.slug
      when 'review' then '/reviews/' || content.slug
      when 'page' then '/' || content.slug
      when 'tool' then '/tools/' || content.slug
    end as route
  from public.content_items content
  cross join prepared
  where content.status = 'published'
    and (
      prepared.normalized_query = '' or
      (prepared.prefix_query is not null and content.search_vector @@ prepared.prefix_query)
    )
  order by
    case when lower(content.title) like prepared.normalized_query || '%' then 0 else 1 end,
    content.updated_at desc,
    content.title
  limit (select safe_limit from prepared);
$$;

revoke all on function public.search_prefix_query(text), public.search_published_content(text, text, integer), public.suggest_published_searches(text, integer) from public;
grant execute on function public.search_prefix_query(text), public.search_published_content(text, text, integer), public.suggest_published_searches(text, integer) to anon, authenticated;
