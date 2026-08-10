create table public.content_revisions (
  id bigint generated always as identity primary key,
  content_id uuid not null references public.content_items(id) on delete cascade,
  version integer not null check (version > 0),
  snapshot jsonb not null,
  created_by uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now(),
  unique (content_id, version)
);

create table public.editorial_events (
  id bigint generated always as identity primary key,
  content_id uuid references public.content_items(id) on delete cascade,
  action text not null check (action in ('created', 'updated', 'status_changed', 'archived')),
  previous_status public.content_status,
  next_status public.content_status,
  metadata jsonb not null default '{}'::jsonb,
  actor_id uuid references public.profiles(id) on delete set null,
  created_at timestamptz not null default now()
);

create index content_items_admin_filter_index on public.content_items (status, content_type, updated_at desc);
create index content_revisions_content_index on public.content_revisions (content_id, version desc);
create index editorial_events_content_index on public.editorial_events (content_id, created_at desc);

alter table public.content_revisions enable row level security;
alter table public.editorial_events enable row level security;

create policy "Admins read content revisions" on public.content_revisions
  for select to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

create policy "Admins read editorial events" on public.editorial_events
  for select to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.content_revisions, public.editorial_events from anon, authenticated;
grant select on public.content_revisions, public.editorial_events to authenticated;

create or replace function public.capture_content_revision()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
declare
  next_version integer;
begin
  select coalesce(max(r.version), 0) + 1
    into next_version
    from public.content_revisions r
    where r.content_id = old.id;

  insert into public.content_revisions (content_id, version, snapshot, created_by)
  values (old.id, next_version, to_jsonb(old), auth.uid());

  return new;
end;
$$;

create or replace function public.log_editorial_event()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
declare
  event_action text;
begin
  if tg_op = 'INSERT' then
    event_action := 'created';
    insert into public.editorial_events (content_id, action, next_status, actor_id)
    values (new.id, event_action, new.status, coalesce(auth.uid(), new.created_by));
  else
    event_action := case
      when new.status = 'archived' and old.status <> 'archived' then 'archived'
      when new.status is distinct from old.status then 'status_changed'
      else 'updated'
    end;
    insert into public.editorial_events (content_id, action, previous_status, next_status, actor_id)
    values (new.id, event_action, old.status, new.status, auth.uid());
  end if;

  return new;
end;
$$;

create trigger capture_content_revision_before_update
  before update on public.content_items
  for each row execute procedure public.capture_content_revision();

create trigger log_editorial_event_after_change
  after insert or update on public.content_items
  for each row execute procedure public.log_editorial_event();
