import Link from "next/link";
import { adSlotIds, adsenseEnabled } from "@/lib/monetization";

type MonetizationPanelProps = {
  /** Published review products that carry no outgoing link. */
  productsMissingLinks: number;
  /** Products on published reviews, linked or not. */
  totalProducts: number;
};

/**
 * Revenue readiness at a glance.
 *
 * A product on a published review with no outgoing link earns nothing, and
 * nothing in the editor flags it — the review still passes every publication
 * check. Surfacing the count here is the only place an editor sees the gap.
 */
export function MonetizationPanel({ productsMissingLinks, totalProducts }: MonetizationPanelProps) {
  const unitsConfigured = Boolean(adSlotIds.inline || adSlotIds.leaderboard);
  const linked = totalProducts - productsMissingLinks;
  const linkedPercent = totalProducts ? Math.round((linked / totalProducts) * 100) : 0;

  return (
    <article className="dashboard-panel monetization-panel">
      <div className="panel-heading">
        <div>
          <p className="dashboard-kicker">Revenue readiness</p>
          <h2>Monetization</h2>
        </div>
      </div>

      <dl className="monetization-checks">
        <div>
          <dt>Ad tag</dt>
          <dd>
            <i className={`status-dot ${adsenseEnabled ? "published" : "draft"}`} />
            {adsenseEnabled ? "Publisher id configured" : "No publisher id in this environment"}
          </dd>
        </div>
        <div>
          <dt>Ad units</dt>
          <dd>
            <i className={`status-dot ${unitsConfigured ? "published" : "draft"}`} />
            {unitsConfigured ? "At least one unit configured" : "Placeholders only — units not set"}
          </dd>
        </div>
        <div>
          <dt>ads.txt</dt>
          <dd>
            <i className={`status-dot ${adsenseEnabled ? "published" : "draft"}`} />
            {adsenseEnabled ? "Served from the publisher id" : "Empty until a publisher id is set"}
          </dd>
        </div>
      </dl>

      {totalProducts > 0 && (
        <div className="monetization-links">
          <div className="monetization-links-heading">
            <strong>Product links</strong>
            <span>{linkedPercent}%</span>
          </div>
          <div className="monetization-bar" role="presentation">
            <span style={{ width: `${linkedPercent}%` }} />
          </div>
          {productsMissingLinks > 0 ? (
            <p>
              {productsMissingLinks} product{productsMissingLinks === 1 ? "" : "s"} on published reviews
              {productsMissingLinks === 1 ? " has" : " have"} no outgoing link and cannot earn anything.
              {" "}
              <Link href="/admin/content?type=review">Open the reviews</Link>
            </p>
          ) : (
            <p>Every product on a published review has an outgoing link.</p>
          )}
        </div>
      )}
    </article>
  );
}
