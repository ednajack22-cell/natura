-- Editorial links from informational content to a commercial review.
--
-- Reviews are the only pages that can earn an affiliate commission, and nothing
-- currently routes readers to them: an article about watering ends at its
-- sources, and the reviews sit behind a menu entry most readers never open.
--
-- The link is recorded rather than inferred. Matching a plant to a review by
-- category would produce links whose surrounding text has nothing to do with the
-- product, which reads as spam to a reader and to a search engine. An editor
-- chooses the pairing and writes the anchor text, so the link means something
-- where it appears.

create table public.content_review_links (
  content_id uuid not null references public.content_items(id) on delete cascade,
  review_content_id uuid not null references public.content_items(id) on delete cascade,
  -- Descriptive, keyword-bearing text. "Best balcony containers" tells a reader
  -- and a crawler what is on the other side; "click here" tells neither.
  anchor_text text not null check (char_length(anchor_text) between 3 and 120),
  -- One line of context shown with the call to action.
  context_note text not null default '' check (char_length(context_note) <= 300),
  sort_order integer not null default 1,
  created_at timestamptz not null default now(),
  primary key (content_id, review_content_id),
  constraint content_review_links_not_self check (content_id <> review_content_id)
);

create index content_review_links_review_index on public.content_review_links (review_content_id);

alter table public.content_review_links enable row level security;

create policy "Published content review links are readable" on public.content_review_links
  for select to anon, authenticated
  using (
    exists (select 1 from public.content_items c where c.id = content_review_links.content_id and c.status = 'published')
    and exists (select 1 from public.content_items r where r.id = content_review_links.review_content_id and r.content_type = 'review' and r.status = 'published')
  );

create policy "Admins manage content review links" on public.content_review_links
  for all to authenticated
  using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'))
  with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.content_review_links from anon, authenticated;
grant select on table public.content_review_links to anon;
grant select, insert, update, delete on table public.content_review_links to authenticated;
