import { adsenseEnabled, adsensePublisherId } from "@/lib/monetization";

/**
 * `ads.txt` declares who is authorised to sell this site's ad inventory.
 * Without it AdSense reports "earnings at risk" and buyers bid less, so it is
 * generated from the configured publisher id rather than hand-maintained.
 *
 * `f08c47fec0942fa0` is Google's certification authority id and is the same for
 * every Google publisher.
 */
export function GET() {
  if (!adsenseEnabled) {
    return new Response("# No ad partner configured for this environment.\n", {
      status: 200,
      headers: { "Content-Type": "text/plain; charset=utf-8", "Cache-Control": "public, max-age=3600" },
    });
  }

  const body = `google.com, ${adsensePublisherId()}, DIRECT, f08c47fec0942fa0\n`;

  return new Response(body, {
    status: 200,
    headers: { "Content-Type": "text/plain; charset=utf-8", "Cache-Control": "public, max-age=86400" },
  });
}
