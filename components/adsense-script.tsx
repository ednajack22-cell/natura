import Script from "next/script";
import { adsenseClientId, adsenseEnabled } from "@/lib/monetization";

/**
 * Loads the AdSense tag, which also delivers Google's certified consent message
 * (Privacy & messaging) to visitors in the EEA and the UK. Nothing is requested
 * when no publisher id is configured, so local development stays free of
 * third-party scripts.
 *
 * `afterInteractive` keeps the tag out of the critical path: the content and the
 * tools finish rendering first, and the ads load once the page is usable.
 */
export function AdSenseScript() {
  if (!adsenseEnabled) return null;

  return (
    <Script
      id="adsense-tag"
      async
      strategy="afterInteractive"
      crossOrigin="anonymous"
      src={`https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=${adsenseClientId}`}
    />
  );
}
