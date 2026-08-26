update public.content_items
set body = jsonb_set(
  body,
  '{image}',
  to_jsonb(replace(body ->> 'image', '.png', '.jpg')),
  true
)
where body ->> 'image' in (
  '/images/balcony-strawberry.png',
  '/images/cherry-tomato.png',
  '/images/container-radish.png',
  '/images/genovese-basil.png',
  '/images/natura-balcony-hero.png'
);
