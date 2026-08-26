update public.content_items
set body = jsonb_set(
      body,
      '{overview}',
      to_jsonb('The current Natura build runs locally. It does not operate advertising, newsletter, or contact-form services. A visitor may explicitly save a small garden profile in a first-party preference cookie so climate-aware tools can be prefilled on that device. Natura may also increment a plant-level aggregate counter when a search matches a published plant. Neither feature stores a name, account, address, precise location, or raw search query.'::text),
      true
    ),
    updated_at = now()
where slug = 'privacy-policy'
  and content_type = 'page';

update public.institutional_page_profiles
set sections = '[
  {"heading":"Current local build","body":"The development site runs on a local computer with local Supabase services. It is not intended for public traffic, and advertising, newsletter, and contact-form collection are not active."},
  {"heading":"Optional garden-profile preference","body":"If a visitor chooses Save my garden profile, Natura sets the first-party natura_garden_profile preference cookie on that device. It contains only the selected climate, hemisphere, growing-space type, broad direct-light band, and exposure. It does not contain a name, account, address, or precise location. The cookie is HttpOnly, uses SameSite=Lax, expires after at most one year, and can be removed at any time from My garden profile."},
  {"heading":"Aggregate plant-search ranking","body":"When a visitor submits an all-content or plant search, Natura checks whether the words match a published plant. If they do, one plant-level counter is incremented. The popularity table stores the plant identifier, a total count, and the latest matching time. It does not store the raw search words, an IP address, an account identifier, or a reader identity."},
  {"heading":"Information that may exist locally","body":"Administrator account data, editorial content, revisions, media metadata, aggregate plant-search counts, the optional device preference, and technical logs may exist in the local development environment. Access to administrative data is restricted to the authorised administrator workflow."},
  {"heading":"Before public deployment","body":"The final notice must name the operator and explain actual hosting logs, cookies, analytics, advertising, forms, processors, transfers, retention, legal bases, rights, and contact routes. Consent controls must match the technologies actually enabled."},
  {"heading":"Requests and updates","body":"A monitored privacy contact and applicable regulator information must be added after the operating jurisdiction is selected. This page should be reviewed whenever collection or processing changes."}
]'::jsonb,
    updated_at = now()
where content_id = (
  select id from public.content_items where slug = 'privacy-policy' and content_type = 'page'
);
