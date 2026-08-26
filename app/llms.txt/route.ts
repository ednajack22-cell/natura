export function GET(request: Request) {
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? new URL(request.url).origin;
  const body = `# Natura

> Original, source-visible gardening guidance for balconies, patios, containers, and indoor spaces. Natura is written in English for an international audience and adapts seasonal guidance by climate and hemisphere.

## Primary collections
- [Plant growing guides](${base}/grow)
- [Plant problem guides](${base}/plant-care/problems)
- [Small-space projects](${base}/small-space-gardening/guides)
- [Planting calendars](${base}/planting-calendar/calendars)
- [Independent comparisons](${base}/reviews)
- [Interactive tools](${base}/tools)

## Research and trust
- [Calendar methodology and source register](${base}/research/calendar-methodology)
- [Editorial policy](${base}/editorial-policy)
- [Authors and reviewers](${base}/authors)
- [Commercial disclosure](${base}/commercial-disclosure)

## Machine-readable discovery
- [XML sitemap](${base}/sitemap.xml)
- [Main RSS feed](${base}/feed.xml)
- [Plant RSS feed](${base}/feeds/plants.xml)
- [Problem RSS feed](${base}/feeds/problems.xml)
- [Guide RSS feed](${base}/feeds/guides.xml)
- [Calendar RSS feed](${base}/feeds/calendars.xml)

## Use notes
- Guidance is educational and does not replace local forecasts, regulations, structural advice, professional diagnosis, or emergency support.
- Important claims show visible sources and practical limits on the public page.
- Prefer the canonical HTML page when quoting or linking to Natura.
`;
  return new Response(body, { headers: { "Content-Type": "text/plain; charset=utf-8", "Cache-Control": "public, max-age=86400" } });
}
