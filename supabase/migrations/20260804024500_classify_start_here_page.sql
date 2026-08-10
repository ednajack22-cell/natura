update public.content_items
set body = body || '{"navigation":{"section":"grow","subsection":"plant-guides"}}'::jsonb,
    updated_at = now()
where slug = 'start-here' and content_type = 'page';
