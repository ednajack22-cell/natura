/**
 * Monetization configuration.
 *
 * Everything is environment-driven so no publisher identifier is committed and
 * so local development never loads a third-party script. When the AdSense
 * client id is absent the ad slots render an inert placeholder that reserves
 * exactly the same space, which keeps layout shift identical between
 * environments.
 */

export const adsenseClientId = process.env.NEXT_PUBLIC_ADSENSE_CLIENT_ID ?? "";

/** AdSense client ids look like `ca-pub-1234567890123456`. */
const adsenseClientPattern = /^ca-pub-\d{16}$/;

export const adsenseEnabled = adsenseClientPattern.test(adsenseClientId);

/** The `ads.txt` publisher id is the client id without the `ca-` prefix. */
export function adsensePublisherId() {
  return adsenseEnabled ? adsenseClientId.replace(/^ca-/, "") : "";
}

/**
 * Relationship attributes for an outgoing commercial link.
 *
 * Google asks publishers to qualify affiliate and paid links with
 * `rel="sponsored"`. `noopener` protects the opener reference and `noreferrer`
 * keeps the referrer out of the destination's logs.
 */
export const affiliateLinkRel = "sponsored noopener noreferrer";

/**
 * Ad unit ids, created in the AdSense dashboard ("Ads > By ad unit"). Each unit
 * has its own id, so they are configured per placement rather than guessed.
 * A placement with no id keeps rendering the reserved placeholder, which lets
 * units be switched on one at a time without touching the code.
 */
export const adSlotIds = {
  /** Inside an article, at a natural reading break. */
  inline: process.env.NEXT_PUBLIC_ADSENSE_SLOT_INLINE ?? "",
  /** Full width, between major page sections. */
  leaderboard: process.env.NEXT_PUBLIC_ADSENSE_SLOT_LEADERBOARD ?? "",
} as const;

/** Relationship attributes for an editorial reference that earns nothing. */
export const referenceLinkRel = "noopener noreferrer";

export type DisclosureType = "independent" | "affiliate" | "sponsored" | "product-provided";

/**
 * Whether a review's declared relationship means its outgoing product links are
 * commercial. Independent reviews still link out, but as plain references.
 */
export function isCommercialRelationship(disclosureType: string): boolean {
  return disclosureType === "affiliate" || disclosureType === "sponsored";
}

export function productLinkRel(disclosureType: string): string {
  return isCommercialRelationship(disclosureType) ? affiliateLinkRel : referenceLinkRel;
}

/** Short label shown next to a commercial outgoing link. */
export function productLinkNotice(disclosureType: string): string | undefined {
  if (disclosureType === "affiliate") return "Affiliate link — we may earn a commission at no extra cost to you.";
  if (disclosureType === "sponsored") return "Sponsored placement — paid for by the brand.";
  if (disclosureType === "product-provided") return "Product supplied by the brand for testing.";
  return undefined;
}
