import type { Metadata } from "next";
import Link from "next/link";
import { ChevronIcon, ContentIcon, SearchSmallIcon, TrendIcon } from "@/components/admin/admin-icons";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "SEO health" };
const typeLabels: Record<string, string> = { plant: "Plants", problem: "Diagnostics", guide: "Guides", calendar: "Calendars", tool: "Tools", review: "Reviews", page: "Trust pages" };

export default async function SeoHealthPage() {
  const { supabase } = await requireAdmin();
  const [auditResponse, cannibalizationResponse, linksResponse, coverageResponse] = await Promise.all([
    supabase.rpc("admin_content_seo_audit"),
    supabase.rpc("admin_keyword_cannibalization"),
    supabase.rpc("admin_internal_link_audit"),
    supabase.rpc("admin_launch_content_coverage"),
  ]);
  if (auditResponse.error || cannibalizationResponse.error || linksResponse.error || coverageResponse.error) throw new Error("Unable to load the SEO health report.");
  const audit = auditResponse.data ?? [];
  const cannibalization = cannibalizationResponse.data ?? [];
  const links = linksResponse.data ?? [];
  const coverage = coverageResponse.data ?? [];
  const average = audit.length ? Math.round(audit.reduce((sum, item) => sum + item.seo_score, 0) / audit.length) : 0;
  const needsWork = audit.filter((item) => item.seo_score < 75).length;
  const publicAuthors = audit.filter((item) => item.public_author).length;
  const brokenLinks = links.filter((link) => link.link_status === "broken-target");
  const readyTypes = coverage.filter((item) => item.coverage_status === "ready").length;

  return <main id="main-content"><header className="dashboard-page-header"><div><p className="dashboard-kicker">Advanced discoverability</p><h1>SEO health</h1><p>Review search intent, competing targets, editorial responsibility, freshness, structured links, and launch coverage in one place.</p></div><Link className="dashboard-primary-action" href="/admin/content"><ContentIcon />Open library</Link></header>
    <section className="dashboard-kpi-grid seo-kpi-grid" aria-label="SEO health summary"><article><span className="kpi-icon green"><TrendIcon /></span><div><p>Average score</p><strong>{average}</strong><small>Across {audit.length} published items</small></div><em>/100</em></article><article><span className="kpi-icon amber"><ContentIcon /></span><div><p>Needs work</p><strong>{needsWork}</strong><small>Published items below 75</small></div><em className="neutral">Queue</em></article><article><span className="kpi-icon blue"><SearchSmallIcon /></span><div><p>Competing targets</p><strong>{cannibalization.length}</strong><small>Duplicate primary queries</small></div><em>{cannibalization.length ? "Review" : "Clear"}</em></article><article><span className="kpi-icon clay"><ContentIcon /></span><div><p>Public authors</p><strong>{publicAuthors}</strong><small>Items with approved profiles</small></div><em>{audit.length ? Math.round(publicAuthors / audit.length * 100) : 0}%</em></article></section>
    <section className="seo-dashboard-grid"><article className="dashboard-panel seo-health-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Published inventory</p><h2>Page-level audit</h2></div><span>{audit.length} pages</span></div><div className="seo-health-table"><div className="seo-health-head"><span>Content</span><span>Score</span><span>Responsibility</span><span>Freshness</span></div>{audit.map((item) => <article key={item.content_id}><div><Link href={`/admin/content/${item.content_id}/edit`}>{item.title}</Link><small>{typeLabels[item.content_type] ?? item.content_type} · {item.focus_keyword || "No target query"}</small></div><strong className={item.seo_score >= 85 ? "good" : item.seo_score >= 70 ? "watch" : "poor"}>{item.seo_score}</strong><div><span>{item.author_name || "No author"}</span><small>{item.public_author ? "Public profile" : "Private or missing profile"}</small></div><div><span>{item.days_since_update} days</span><small>{item.inbound_links} structured link{item.inbound_links === 1 ? "" : "s"}</small></div>{item.issues.length > 0 && <details><summary>{item.issues.length} issue{item.issues.length === 1 ? "" : "s"}</summary><ul>{item.issues.map((issue) => <li key={issue}>{issue}</li>)}</ul></details>}</article>)}</div></article>
      <aside className="seo-dashboard-side"><article className="dashboard-panel seo-launch-card"><p className="dashboard-kicker">Launch collection</p><h2>{readyTypes}/{coverage.length} content targets ready</h2><div>{coverage.map((item) => <div key={item.content_type}><span>{typeLabels[item.content_type] ?? item.content_type}</span><strong>{item.published_count}/{item.launch_target}</strong><i className={item.coverage_status} style={{ width: `${Math.min(item.published_count / item.launch_target * 100, 100)}%` }} /></div>)}</div></article><article className="dashboard-panel seo-safety-card"><p className="dashboard-kicker">Structured links</p><h2>{brokenLinks.length ? `${brokenLinks.length} broken target${brokenLinks.length === 1 ? "" : "s"}` : "No broken targets"}</h2><p>{links.length} plant-to-content relationships checked. Foreign keys protect deleted records; this report also catches unpublished targets.</p>{brokenLinks.map((link) => <div key={`${link.source_route}-${link.target_route}`}><strong>{link.source_title}</strong><span>→ {link.target_title}</span></div>)}</article></aside>
    </section>
    <section className="dashboard-panel seo-cannibal-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Search intent separation</p><h2>Primary-query conflicts</h2></div></div>{cannibalization.length ? <div>{cannibalization.map((group) => <article key={group.focus_keyword}><div><strong>{group.focus_keyword}</strong><span>{group.content_count} targets</span></div><ul>{group.titles.map((title, index) => <li key={group.content_ids[index]}><Link href={`/admin/content/${group.content_ids[index]}/edit`}>{title}</Link><small>{group.routes[index]}</small></li>)}</ul></article>)}</div> : <div className="dashboard-empty seo-clear-state"><SearchSmallIcon /><h2>No exact primary-query conflicts</h2><p>Every published focus keyword currently has one target page. Related supporting queries may still overlap and should be reviewed editorially.</p></div>}</section>
    <section className="dashboard-panel seo-method-note"><div><p className="dashboard-kicker">Method boundary</p><h2>This is readiness, not ranking.</h2></div><p>The score checks saved metadata, intent, sources, authorship, review, freshness, and structured relationships. Google impressions, clicks, indexing, Core Web Vitals, and real ranking positions require production monitoring after launch.</p><Link href="/admin/content">Review content <ChevronIcon /></Link></section>
  </main>;
}
