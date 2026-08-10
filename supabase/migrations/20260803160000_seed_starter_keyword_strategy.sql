update public.content_items set
  seo_title = 'How to Grow Cherry Tomatoes in Pots',
  seo_description = 'Learn how to grow cherry tomatoes in pots with the right container size, sunlight, watering rhythm, support, feeding, and troubleshooting.',
  body = body || jsonb_build_object('seo_keyword_strategy', jsonb_build_object(
    'focus_keyword', 'how to grow cherry tomatoes in pots',
    'supporting_keywords', jsonb_build_array('cherry tomato pot size', 'watering tomatoes in containers', 'balcony tomato growing guide'),
    'search_intent', 'how-to'
  ), 'overview', 'Learn how to grow cherry tomatoes in pots with consistent watering, a generous container, reliable support, and the sunniest position you can offer.')
where content_type = 'plant' and slug = 'cherry-tomato';

update public.content_items set
  seo_title = 'How to Grow Basil Indoors in Pots',
  seo_description = 'Learn how to grow basil indoors in pots, with practical guidance on light, warmth, watering, harvesting, and common signs of plant stress.',
  body = body || jsonb_build_object('seo_keyword_strategy', jsonb_build_object(
    'focus_keyword', 'how to grow basil indoors',
    'supporting_keywords', jsonb_build_array('basil pot size', 'watering basil in pots', 'basil on a windowsill'),
    'search_intent', 'how-to'
  ), 'overview', 'Learn how to grow basil indoors with warmth, bright light, steady moisture, and regular harvesting that keeps the plant productive.')
where content_type = 'plant' and slug = 'genovese-basil';

update public.content_items set
  seo_title = 'How to Grow Strawberries in Containers',
  seo_description = 'Learn how to grow strawberries in containers on a balcony, including pot size, sunlight, watering, crown depth, harvest timing, and common problems.',
  body = body || jsonb_build_object('seo_keyword_strategy', jsonb_build_object(
    'focus_keyword', 'how to grow strawberries in containers',
    'supporting_keywords', jsonb_build_array('strawberry pot size', 'balcony strawberries', 'watering strawberries in pots'),
    'search_intent', 'how-to'
  ), 'overview', 'Learn how to grow strawberries in containers while keeping their crowns above the soil, their roots well drained, and their fruit clean and healthy.')
where content_type = 'plant' and slug = 'balcony-strawberry';
