# Natura repository instructions

Natura is an English site about growing food in pots on balconies, patios
and windowsills. It earns money from AdSense, Pinterest traffic and
affiliate links. More than 80% of Pinterest visitors are on a phone.

## What is active
- **The live site is WordPress**: the `natura` theme in `wordpress/natura`
  and the `natura-core` plugin in `wordpress/natura-core`. All new work goes
  there unless the site owner asks otherwise.
- The Next.js and Supabase app at the repository root (`app/`, `components/`,
  `lib/`, `supabase/`, `tests/`) is the **previous version**. It is kept for
  reference only. Do not develop it further. Its rules are in "Previous
  version" at the end of this file.
- Read `wordpress/design/BLUEPRINT.md` (page structure and revenue
  placement), `wordpress/design/THEME-OPTIONS.md` (Natura Options panel) and
  `wordpress/README.md` before changing a page.

## Stack
- Classic WordPress theme in PHP 8.1+ for WordPress 6.5+, with no page
  builder and no build step. Plain CSS in `assets/css`, small vanilla
  JavaScript only where the browser needs it.
- The theme handles presentation. Content data (custom post types, taxonomies
  and `_natura_*` fields) lives in the plugin, so content survives a change
  of theme.
- Site settings live in Natura Options (theme mods, plus the
  `natura_sections` option for Show/Hide switches), not in code.
- Text domains: `natura` for the theme and `natura-core` for the plugin.

## Way of working
- Finish one page completely before starting the next. The order is set in
  `BLUEPRINT.md`.
- Before building a page, study competitors and current best practice, and
  record what was kept and why in `wordpress/design/`.
- Every new block on the site gets a Show/Hide switch in Natura Options.
  Every editable text gets a field with a sensible default.
- Site content is in English. Documentation in `wordpress/design/` and
  replies to the site owner are in French. Code and commit messages are in
  English.

## Quality gate (WordPress)
- Run `php -l` on every changed PHP file.
- Test in a local WordPress, for example WordPress Playground with
  `WP_DEBUG` on. Pages must show no PHP notice, warning or error.
- Check every changed page at 320, 375, 768, 1024, 1280 and 1920 px wide.
  There must be no horizontal scroll and no cut-off content.
- Check the admin side as well: saving, resetting and permissions.
- Rebuild the installable zips with `wordpress/build-zips.sh` and raise the
  theme or plugin version when files change.
- Do not add a plugin, library or external service without explaining the
  need. Fonts are hosted locally.

## Security (WordPress)
- Never commit secrets, API keys or passwords. This includes the Stitch key,
  which stays in an environment variable.
- Escape all output at the point of display (`esc_html`, `esc_attr`,
  `esc_url`, `wp_kses_post`).
- Sanitize all input before saving it.
- Every admin action checks a nonce and a capability (`edit_theme_options`
  for site settings, `edit_post` for content). Test that editors and
  subscribers are refused.
- Never install, commit or reuse nulled or pirated themes and plugins, even
  for study.
- The local test site must never be exposed to public traffic.

## Mobile and speed
- Design for the phone first, then widen.
- Touch targets are at least 44 × 44 px. Body text is at least 16 px.
- Images:
  - Give each image width and height and a `sizes` value that matches how
    it is shown.
  - Serve WebP subsizes.
  - Lazy-load everything below the first screen.
  - The main image of the page is never lazy-loaded.
- Reserve space for ads and embeds so the page does not jump.
- Aim for good Core Web Vitals on mobile: LCP under 2.5 s, CLS under 0.1,
  INP under 200 ms.

## Revenue: ads, affiliation and Pinterest
- **Ads**
  - No ad above the title or before the first useful answer.
  - A guide has at most 2 in-content ads, 1 sticky sidebar ad and 1 end
    block.
  - Each ad is labelled "Advertisement".
  - Each ad slot can be switched off in Natura Options.
- **Affiliation**
  - The disclosure appears before the first affiliate link on the page.
  - Links use `rel="sponsored nofollow"`.
  - No prices are written into the page. Use "Check price" instead.
- **Pinterest**
  - Every guide has a vertical pin image and a pin description.
  - Small images are marked `nopin`.

## SEO and content
- Every public content item needs a stable URL, unique metadata, canonical,
  breadcrumb, and accurate structured data.
- Keep public pages cached where practical. Do not add server work to page
  loads that a cache could serve.
- Use natural English, original content, and no medical or ranking
  guarantees.
- Cite sources for every guide. They are shown to readers by default; the
  site owner can hide them with the "Sources" switch in Natura Options →
  Guides, but they stay filled in.
- Invent nothing, demo content included. That means no statistics, ratings,
  reviews, experts, badges, save counts or facts that do not exist. Demo
  text must come from real information.
- Structured data must describe only what readers can see. For example, a
  hidden FAQ also leaves the FAQ data.
- A list or condition page with too few items (fewer than 6) is `noindex`.

## Definition of done
- The requested behaviour works.
- Empty, error and loading states are covered, including a fresh site with no
  content and every Show/Hide switch turned off.
- Accessibility is checked:
  - visible focus;
  - text contrast of at least 4.5:1;
  - labels on form fields;
  - meaningful alt text;
  - a logical heading order.
- Mobile widths pass.
- No secret is exposed.
- The local site shows no PHP notice.
- The changes are committed and pushed, and the site owner gets a short
  summary in French.

## Previous version: Next.js and Supabase (reference only)
These rules applied to the root app. They still apply if that code is ever
touched again.
- Next.js App Router, React, TypeScript strict, Tailwind CSS. Supabase local
  for PostgreSQL, Auth, and Storage. Server Components by default.
- Run `pnpm lint`, `pnpm typecheck`, and `pnpm build` after meaningful
  changes. Run database and RLS tests when a schema or policy changes.
- Verify authentication and the admin role in every sensitive Server Action
  and Route Handler.
- Keep RLS enabled on exposed tables and test forbidden operations.
- The local Supabase stack must never be exposed to public traffic.
