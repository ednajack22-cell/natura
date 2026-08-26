-- Remove the brand suffix from stored SEO titles.
--
-- The root layout already applies the title template "%s | Natura", so a stored
-- seo_title ending in "| Natura" renders twice:
--   "Pot Size Calculator for Container Plants | Natura | Natura"
--
-- Eight seeded tool pages carry the suffix, and those are the pages the site
-- depends on for search traffic. Google truncates the tail, so the duplicate
-- costs real estate in the result and reads as careless.

update public.content_items
set seo_title = btrim(regexp_replace(seo_title, '\s*\|\s*Natura\s*$', ''))
where seo_title like '%| Natura';
