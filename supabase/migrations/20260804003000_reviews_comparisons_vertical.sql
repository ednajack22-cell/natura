create table public.review_profiles (
  content_id uuid primary key references public.content_items(id) on delete cascade,
  review_type text not null check (review_type in ('single', 'comparison', 'best-of')),
  category text not null check (category in ('seeds', 'containers', 'soil-fertilizer', 'watering-systems', 'grow-lights', 'garden-tools')),
  evidence_level text not null default 'researched' check (evidence_level in ('researched', 'hands-on', 'long-term')),
  methodology text not null default '',
  testing_period text not null default '',
  disclosure_type text not null default 'independent' check (disclosure_type in ('independent', 'affiliate', 'sponsored', 'product-provided')),
  disclosure_text text not null default '',
  verdict text not null default '',
  best_for text[] not null default '{}',
  tested_on date,
  updated_at timestamptz not null default now()
);

create table public.review_criteria (
  id uuid primary key default gen_random_uuid(),
  review_content_id uuid not null references public.content_items(id) on delete cascade,
  name text not null check (char_length(name) between 2 and 100),
  description text not null default '',
  weight numeric(5,2) not null default 0 check (weight between 0 and 100),
  sort_order smallint not null default 0
);

create table public.review_products (
  id uuid primary key default gen_random_uuid(),
  review_content_id uuid not null references public.content_items(id) on delete cascade,
  name text not null check (char_length(name) between 2 and 160),
  brand text not null default '',
  model text not null default '',
  product_url text,
  image_url text,
  image_alt text,
  price_note text not null default '',
  verdict_label text not null default '',
  overall_score numeric(3,1) not null check (overall_score between 0 and 10),
  pros text[] not null default '{}',
  cons text[] not null default '{}',
  specifications jsonb not null default '{}'::jsonb,
  is_recommended boolean not null default false,
  sort_order smallint not null default 0
);

create table public.review_product_scores (
  product_id uuid not null references public.review_products(id) on delete cascade,
  criterion_id uuid not null references public.review_criteria(id) on delete cascade,
  score numeric(3,1) not null check (score between 0 and 10),
  note text not null default '',
  primary key (product_id, criterion_id)
);

create index review_profiles_filter_index on public.review_profiles (category, review_type, evidence_level);
create index review_criteria_order_index on public.review_criteria (review_content_id, sort_order);
create index review_products_order_index on public.review_products (review_content_id, sort_order);

alter table public.review_profiles enable row level security;
alter table public.review_criteria enable row level security;
alter table public.review_products enable row level security;
alter table public.review_product_scores enable row level security;

create policy "Published review profiles are readable" on public.review_profiles for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = review_profiles.content_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review profiles" on public.review_profiles for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review criteria are readable" on public.review_criteria for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = review_criteria.review_content_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review criteria" on public.review_criteria for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review products are readable" on public.review_products for select to anon, authenticated using (exists (select 1 from public.content_items c where c.id = review_products.review_content_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review products" on public.review_products for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));
create policy "Published review scores are readable" on public.review_product_scores for select to anon, authenticated using (exists (select 1 from public.review_products product join public.content_items c on c.id = product.review_content_id where product.id = review_product_scores.product_id and c.content_type = 'review' and c.status = 'published'));
create policy "Admins manage review scores" on public.review_product_scores for all to authenticated using (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin')) with check (exists (select 1 from public.profiles p where p.id = auth.uid() and p.role = 'admin'));

revoke all on table public.review_profiles, public.review_criteria, public.review_products, public.review_product_scores from anon, authenticated;
grant select on public.review_profiles, public.review_criteria, public.review_products, public.review_product_scores to anon;
grant select, insert, update, delete on public.review_profiles, public.review_criteria, public.review_products, public.review_product_scores to authenticated;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values ('review', 'published', 'Self-watering container types for balconies', 'self-watering-container-types-balconies',
  'Compare three self-watering container systems for a small balcony, including drainage safety, water visibility, heat resilience, and maintenance.',
  '{"overview":"Self-watering containers can reduce daily watering pressure, but the label covers very different systems. We compared three common formats through documented design characteristics and practical balcony constraints. This is a researched comparison, not a hands-on product test.","navigation":{"section":"reviews","subsection":"containers"},"sources":[],"seo_keyword_strategy":{"focus_keyword":"best self watering container type for balcony","supporting_keywords":["self watering planter comparison","wicking pot for balcony","self watering container drainage"],"search_intent":"comparison"}}',
  'Self-Watering Container Types for Balconies', 'Compare built-in reservoirs, wick inserts, and double-pot systems for balcony growing, including drainage, heat, maintenance, and small-space suitability.', now())
on conflict (slug) do nothing;

insert into public.review_profiles (content_id, review_type, category, evidence_level, methodology, disclosure_type, disclosure_text, verdict, best_for)
select id, 'comparison', 'containers', 'researched',
  'We compared the design of three common self-watering container formats against five balcony-specific criteria. Scores reflect documented features and predictable use constraints; Natura did not conduct a controlled growing trial for this article.',
  'independent', 'Natura has no commercial relationship with the systems compared here. No product was supplied and no affiliate link is included.',
  'A built-in reservoir planter is the clearest all-round choice when it includes a visible overflow and water-level indicator. A modular wick insert is more flexible for existing pots, while a double-pot setup suits experimentation on a smaller budget.',
  array['Gardeners who miss occasional watering days', 'Sunny balconies where containers dry quickly', 'Small spaces that need controlled drainage']
from public.content_items where slug = 'self-watering-container-types-balconies'
on conflict (content_id) do nothing;

insert into public.review_criteria (review_content_id, name, description, weight, sort_order)
select review.id, criterion.name, criterion.description, criterion.weight, criterion.sort_order
from public.content_items review cross join (values
  ('Drainage safety', 'How clearly the system prevents prolonged waterlogging and handles overflow.', 30, 1),
  ('Water visibility', 'How easily a gardener can see or infer the remaining reservoir level.', 20, 2),
  ('Heat resilience', 'How well the design limits rapid heating and evaporation on an exposed balcony.', 20, 3),
  ('Maintenance', 'The effort needed to refill, clean, inspect, and reset the system.', 15, 4),
  ('Small-space fit', 'Stability, footprint, and practicality in a compact outdoor area.', 15, 5)
) as criterion(name, description, weight, sort_order)
where review.slug = 'self-watering-container-types-balconies'
and not exists (select 1 from public.review_criteria existing where existing.review_content_id = review.id);

insert into public.review_products (review_content_id, name, brand, model, price_note, verdict_label, overall_score, pros, cons, specifications, is_recommended, sort_order)
select review.id, product.name, '', '', product.price_note, product.verdict_label, product.overall_score, product.pros, product.cons, product.specifications::jsonb, product.is_recommended, product.sort_order
from public.content_items review cross join (values
  ('Built-in reservoir planter', 'Usually the highest initial cost', 'Best all-round format', 8.6, array['Integrated overflow is easy to inspect', 'Optional level gauges make refilling clearer', 'Stable single-piece design'], array['Takes more storage space', 'Reservoir can still overheat in dark containers'], '{"Typical setup":"Planter with separated reservoir","Best feature":"Visible overflow and optional gauge"}', true, 1),
  ('Modular wick insert', 'Mid-range; reuses a compatible outer pot', 'Best for adapting existing pots', 7.8, array['Flexible across several pot styles', 'Wicks can be replaced', 'Easy to dismantle for cleaning'], array['Fit varies by outer pot', 'Requires careful overflow planning'], '{"Typical setup":"Insert, platform, and wicks","Best feature":"Adaptability"}', false, 2),
  ('Double-pot cachepot setup', 'Lowest-cost experimental option', 'Best budget experiment', 6.9, array['Can be assembled from existing containers', 'Simple principle', 'Easy to prototype at small scale'], array['Water level is often difficult to see', 'Poorly matched pots can become unstable', 'Drainage safety depends on the setup'], '{"Typical setup":"Nursery pot above a separate reservoir","Best feature":"Low entry cost"}', false, 3)
) as product(name, price_note, verdict_label, overall_score, pros, cons, specifications, is_recommended, sort_order)
where review.slug = 'self-watering-container-types-balconies'
and not exists (select 1 from public.review_products existing where existing.review_content_id = review.id);

insert into public.review_product_scores (product_id, criterion_id, score, note)
select product.id, criterion.id,
  case product.sort_order
    when 1 then (array[9.0, 9.0, 7.5, 8.5, 8.5])[criterion.sort_order]
    when 2 then (array[7.5, 7.0, 8.0, 8.0, 8.5])[criterion.sort_order]
    else (array[6.0, 5.5, 7.5, 7.0, 7.5])[criterion.sort_order]
  end,
  ''
from public.review_products product
join public.review_criteria criterion on criterion.review_content_id = product.review_content_id
join public.content_items review on review.id = product.review_content_id
where review.slug = 'self-watering-container-types-balconies'
on conflict (product_id, criterion_id) do nothing;
