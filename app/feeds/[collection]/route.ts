import { buildRssFeed, feedLabels, getDiscoveryItems, type DiscoveryCollection } from "@/lib/discovery-feed";

const collections = new Set<DiscoveryCollection>(["plants", "problems", "guides", "calendars", "reviews"]);

export async function GET(request: Request, { params }: { params: Promise<{ collection: string }> }) {
  const requested = (await params).collection.replace(/\.xml$/, "") as DiscoveryCollection;
  if (!collections.has(requested)) return new Response("Feed not found", { status: 404 });
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? new URL(request.url).origin;
  const path = `/feeds/${requested}.xml`;
  const items = await getDiscoveryItems(requested);
  const feed = feedLabels[requested];
  return new Response(buildRssFeed(base, path, feed.title, feed.description, items), { headers: { "Content-Type": "application/rss+xml; charset=utf-8", "Cache-Control": "public, max-age=3600, stale-while-revalidate=86400" } });
}
