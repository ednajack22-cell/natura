import Link from "next/link";

export type Kpi = {
  label: string;
  value: string;
  /** Signed percentage change against the preceding period, when one exists. */
  deltaPercent?: number;
  /** What the delta is measured against, e.g. "vs previous 30 days". */
  period?: string;
  /** True when a fall is the good outcome, as with a backlog. */
  lowerIsBetter?: boolean;
  breakdown?: string;
  href?: string;
};

/**
 * The overview's opening row.
 *
 * Commercial dashboards converge on the same anatomy for a headline metric —
 * label, signed change, period, the number itself, then a one-line breakdown —
 * and on the same ordering rule: the three to five figures that matter are read
 * first, everything else is detail below. This dashboard previously opened on a
 * panel, so an editor had to read a chart before learning whether anything
 * needed them.
 *
 * A delta is shown only when there is a preceding period to compare against.
 * Inventing a baseline would be worse than showing none.
 */
export function DashboardKpiRow({ items }: { items: Kpi[] }) {
  return (
    <section className="kpi-row" aria-label="Headline metrics">
      {items.map((kpi) => {
        const improving = kpi.deltaPercent === undefined
          ? undefined
          : kpi.lowerIsBetter ? kpi.deltaPercent < 0 : kpi.deltaPercent > 0;
        const body = (
          <>
            <div className="kpi-head">
              <span className="kpi-label">{kpi.label}</span>
              {kpi.deltaPercent !== undefined && kpi.deltaPercent !== 0 && (
                <span className={`kpi-delta ${improving ? "up" : "down"}`}>
                  <span aria-hidden="true">{kpi.deltaPercent > 0 ? "↑" : "↓"}</span>
                  {Math.abs(kpi.deltaPercent)}%
                </span>
              )}
            </div>
            <strong className="kpi-value">{kpi.value}</strong>
            {kpi.period && <span className="kpi-period">{kpi.period}</span>}
            {kpi.breakdown && <span className="kpi-breakdown">{kpi.breakdown}</span>}
          </>
        );
        return kpi.href
          ? <Link className="kpi-card" href={kpi.href} key={kpi.label}>{body}</Link>
          : <article className="kpi-card" key={kpi.label}>{body}</article>;
      })}
    </section>
  );
}
