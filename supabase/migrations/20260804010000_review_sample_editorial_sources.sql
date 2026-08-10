update public.content_items
set
  title = 'Self-watering container comparison for balconies',
  seo_title = 'Self-Watering Container Comparison for Balconies',
  body = jsonb_set(
    jsonb_set(
      body,
      '{overview}',
      to_jsonb('This self-watering container comparison examines three common systems through documented design characteristics and practical balcony constraints. Reservoir planters can reduce daily watering pressure, but their drainage, visibility, heat response, and maintenance differ. This is a researched comparison, not a hands-on product test.'::text)
    ),
    '{sources}',
    '[
      {"title":"Self Watering Containers - Illinois Extension","url":"https://extension.illinois.edu/blogs/hort-home-landscape/2015-06-22-self-watering-containers"},
      {"title":"Container Drainage Options - Illinois Extension","url":"https://extension.illinois.edu/container-gardens/container-drainage-options"},
      {"title":"Fertilizing and watering container plants - University of Minnesota Extension","url":"https://extension.umn.edu/gardening-minnesota/fertilizing-and-watering-container-plants"}
    ]'::jsonb
  ),
  updated_at = now()
where slug = 'self-watering-container-types-balconies';

update public.content_items
set body = jsonb_set(body, '{seo_keyword_strategy,focus_keyword}', to_jsonb('self watering container comparison'::text))
where slug = 'self-watering-container-types-balconies';
