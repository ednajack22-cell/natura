import { buildRssFeed, getDiscoveryItems } from "@/lib/discovery-feed";

export async function GET(request: Request) {
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? new URL(request.url).origin;
  const items = await getDiscoveryItems();
  const body = buildRssFeed(base, "/feed.xml", "Natura gardening guides", "Original, source-visible gardening guidance for small spaces.", items);
  return new Response(body, { headers: { "Content-Type": "application/rss+xml; charset=utf-8", "Cache-Control": "public, max-age=3600, stale-while-revalidate=86400" } });
}
