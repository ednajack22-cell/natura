create table public.plant_search_popularity (
  plant_content_id uuid primary key references public.content_items(id) on delete cascade,
  search_count bigint not null default 0 check (search_count >= 0),
  last_searched_at timestamptz not null default now()
);

alter table public.plant_search_popularity enable row level security;

revoke all on table public.plant_search_popularity from anon, authenticated;

create or replace function public.record_plant_search_interest(search_query text)
returns uuid
language plpgsql
volatile
security definer
set search_path = ''
as $$
declare
  normalized_query text := lower(regexp_replace(trim(coalesce(search_query, '')), '\s+', ' ', 'g'));
  matched_content_id uuid;
begin
  if char_length(normalized_query) < 2 or char_length(normalized_query) > 80 then
    return null;
  end if;

  select content.id
  into matched_content_id
  from public.content_items content
  where content.content_type = 'plant'
    and content.status = 'published'
    and (
      lower(content.title) = normalized_query
      or replace(lower(content.slug), '-', ' ') = normalized_query
      or to_tsvector('english', coalesce(content.title, '') || ' ' || coalesce(content.excerpt, ''))
        @@ plainto_tsquery('english', normalized_query)
    )
  order by
    case
      when lower(content.title) = normalized_query then 0
      when replace(lower(content.slug), '-', ' ') = normalized_query then 1
      else 2
    end,
    ts_rank(
      to_tsvector('english', coalesce(content.title, '') || ' ' || coalesce(content.excerpt, '')),
      plainto_tsquery('english', normalized_query)
    ) desc,
    content.title
  limit 1;

  if matched_content_id is null then
    return null;
  end if;

  insert into public.plant_search_popularity (plant_content_id, search_count, last_searched_at)
  values (matched_content_id, 1, now())
  on conflict (plant_content_id) do update set
    search_count = public.plant_search_popularity.search_count + 1,
    last_searched_at = now();

  return matched_content_id;
end;
$$;

create or replace function public.get_most_searched_plants(result_limit integer default 6)
returns table (
  content_id uuid,
  slug text,
  search_count bigint,
  last_searched_at timestamptz
)
language sql
stable
security definer
set search_path = ''
as $$
  select
    content.id,
    content.slug,
    popularity.search_count,
    popularity.last_searched_at
  from public.plant_search_popularity popularity
  join public.content_items content on content.id = popularity.plant_content_id
  where content.content_type = 'plant'
    and content.status = 'published'
    and popularity.search_count > 0
  order by popularity.search_count desc, popularity.last_searched_at desc, content.title
  limit greatest(1, least(coalesce(result_limit, 6), 24));
$$;

revoke all on function public.record_plant_search_interest(text) from public;
revoke all on function public.get_most_searched_plants(integer) from public;
grant execute on function public.record_plant_search_interest(text) to anon, authenticated;
grant execute on function public.get_most_searched_plants(integer) to anon, authenticated;
