create table public.editorial_contributors (
  id uuid primary key default gen_random_uuid(),
  slug text not null unique check (slug ~ '^[a-z0-9]+(?:-[a-z0-9]+)*$'),
  display_name text not null check (char_length(display_name) between 2 and 120),
  role_title text not null default '',
  bio text not null default '',
  expertise text[] not null default '{}',
  conflicts text not null default '',
  is_active boolean not null default true,
  is_public boolean not null default false,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create table public.content_workflows (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  author_id uuid references public.editorial_contributors(id) on delete restrict,
  reviewer_id uuid references public.editorial_contributors(id) on delete restrict,
  review_state text not null default 'unassigned' check (review_state in ('unassigned', 'in-review', 'changes-requested', 'approved')),
  review_notes text not null default '',
  scheduled_for timestamptz,
  approved_at timestamptz,
  approved_by uuid references public.profiles(id) on delete set null,
  updated_at timestamptz not null default now(),
  check (author_id is null or reviewer_id is null or author_id <> reviewer_id)
);

create index editorial_contributors_active_index on public.editorial_contributors (is_active, display_name);
create index content_workflows_schedule_index on public.content_workflows (scheduled_for) where scheduled_for is not null;
create index content_workflows_review_index on public.content_workflows (review_state, updated_at desc);

alter table public.editorial_contributors enable row level security;
alter table public.content_workflows enable row level security;

create policy "Public contributors are readable" on public.editorial_contributors
  for select to anon, authenticated using (is_public);
create policy "Admins manage contributors" on public.editorial_contributors
  for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Admins manage content workflows" on public.content_workflows
  for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.editorial_contributors, public.content_workflows from anon, authenticated;
grant select on public.editorial_contributors to anon;
grant select, insert, update, delete on public.editorial_contributors, public.content_workflows to authenticated;

alter table public.editorial_events drop constraint if exists editorial_events_action_check;
alter table public.editorial_events add constraint editorial_events_action_check
  check (action in ('created', 'updated', 'status_changed', 'archived', 'review_assigned', 'review_approved', 'scheduled', 'restored'));

create or replace function public.log_content_workflow_event()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
begin
  if new.reviewer_id is distinct from old.reviewer_id and new.reviewer_id is not null then
    insert into public.editorial_events (content_id, action, metadata, actor_id)
    values (new.content_id, 'review_assigned', jsonb_build_object('reviewer_id', new.reviewer_id), auth.uid());
  end if;
  if new.review_state = 'approved' and old.review_state is distinct from 'approved' then
    insert into public.editorial_events (content_id, action, metadata, actor_id)
    values (new.content_id, 'review_approved', jsonb_build_object('approved_at', new.approved_at), auth.uid());
  end if;
  if new.scheduled_for is distinct from old.scheduled_for and new.scheduled_for is not null then
    insert into public.editorial_events (content_id, action, metadata, actor_id)
    values (new.content_id, 'scheduled', jsonb_build_object('scheduled_for', new.scheduled_for), auth.uid());
  end if;
  return new;
end;
$$;

create trigger log_content_workflow_event_after_update
  after update on public.content_workflows
  for each row execute procedure public.log_content_workflow_event();

create or replace function public.restore_content_revision(target_revision_id bigint)
returns uuid
language plpgsql
security definer set search_path = ''
as $$
declare
  target_content_id uuid;
  target_version integer;
  stored_snapshot jsonb;
  previous_state public.content_status;
begin
  if not exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin') then
    raise exception 'Administrator role required';
  end if;

  select revision.content_id, revision.version, revision.snapshot
    into target_content_id, target_version, stored_snapshot
    from public.content_revisions revision
    where revision.id = target_revision_id;
  if target_content_id is null then raise exception 'Revision not found'; end if;

  select status into previous_state from public.content_items where id = target_content_id for update;
  update public.content_items set
    title = stored_snapshot ->> 'title',
    slug = stored_snapshot ->> 'slug',
    excerpt = stored_snapshot ->> 'excerpt',
    body = coalesce(stored_snapshot -> 'body', '{}'::jsonb),
    seo_title = stored_snapshot ->> 'seo_title',
    seo_description = stored_snapshot ->> 'seo_description',
    status = 'draft',
    published_at = null,
    updated_at = now()
  where id = target_content_id;

  insert into public.editorial_events (content_id, action, previous_status, next_status, metadata, actor_id)
  values (target_content_id, 'restored', previous_state, 'draft', jsonb_build_object('revision_id', target_revision_id, 'version', target_version, 'mode', 'restore-as-draft'), auth.uid());
  return target_content_id;
end;
$$;

create or replace function public.publish_due_content()
returns integer
language plpgsql
security definer set search_path = ''
as $$
declare published_count integer;
begin
  if not exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin') then
    raise exception 'Administrator role required';
  end if;
  update public.content_items content set
    status = 'published', published_at = coalesce(content.published_at, now()), updated_at = now()
  from public.content_workflows workflow
  where workflow.content_id = content.id
    and workflow.scheduled_for is not null and workflow.scheduled_for <= now()
    and workflow.review_state = 'approved' and content.status <> 'published';
  get diagnostics published_count = row_count;
  return published_count;
end;
$$;

revoke all on function public.restore_content_revision(bigint), public.publish_due_content() from public, anon;
grant execute on function public.restore_content_revision(bigint), public.publish_due_content() to authenticated;

insert into public.editorial_contributors (slug, display_name, role_title, bio, expertise, conflicts, is_active, is_public) values
  ('natura-editorial-team', 'Natura Editorial Team', 'Editorial author', 'Internal pre-launch author identity used to assign responsibility while named contributor profiles are being prepared.', array['Small-space gardening', 'Plant care', 'Editorial research'], 'Internal placeholder; replace with verified contributor identities before public launch.', true, false),
  ('natura-review-desk', 'Natura Review Desk', 'Editorial reviewer', 'Internal pre-launch review identity used for quality assurance and publication approvals.', array['Source verification', 'SEO quality', 'Publication review'], 'Internal placeholder; not a public expert biography.', true, false)
on conflict (slug) do nothing;

insert into public.content_workflows (content_id, author_id, review_state, approved_at)
select content.id, author.id, case when content.status = 'published' then 'approved' else 'unassigned' end,
  case when content.status = 'published' then content.published_at else null end
from public.content_items content
cross join public.editorial_contributors author
where author.slug = 'natura-editorial-team'
on conflict (content_id) do nothing;
