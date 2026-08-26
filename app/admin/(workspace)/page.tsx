import type { Metadata } from "next";
import Link from "next/link";
import { CalendarIcon, ChevronIcon, ContentIcon, TrendIcon } from "@/components/admin/admin-icons";
import { MonetizationPanel } from "@/components/admin/monetization-panel";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Overview" };

const statusLabel: Record<string, string> = { draft: "Draft", review: "In review", published: "Published", archived: "Archived" };
const typeLabel: Record<string, string> = { plant: "Plant profile", problem: "Plant problem", guide: "Guide", calendar: "Calendar", tool: "Tool", review: "Review", page: "Page" };

export default async function AdminOverviewPage() {
  const { supabase, profile } = await requireAdmin();
  const [contentResponse, auditResponse, coverageResponse, workflowResponse, reviewProductResponse] = await Promise.all([
    supabase.from("content_items").select("id, title, slug, content_type, status, updated_at, published_at").order("updated_at", { ascending: false }),
    supabase.rpc("admin_content_seo_audit"),
    supabase.rpc("admin_launch_content_coverage"),
    supabase.from("content_workflows").select("content_id, review_state, scheduled_for").not("scheduled_for", "is", null),
    supabase.from("review_products").select("id, review_content_id, product_url"),
  ]);
  if (contentResponse.error || auditResponse.error || coverageResponse.error || workflowResponse.error) throw new Error("Unable to load the editorial dashboard.");
  const content = contentResponse.data ?? [];
  const audit = auditResponse.data ?? [];
  const coverage = coverageResponse.data ?? [];
  const workflows = workflowResponse.data ?? [];

  const count = (status: string) => content.filter((item) => item.status === status).length;
  const published = count("published");
  const drafts = count("draft");
  const review = count("review");
  const firstName = (profile.display_name ?? "Administrator").split(" ")[0];
  const currentDate = new Date();
  const today = new Intl.DateTimeFormat("en", { weekday: "long", month: "long", day: "numeric" }).format(currentDate);
  const pipelineMax = Math.max(content.length, 1);
  const seoNeedsWork = audit.filter((item) => item.seo_score < 75).length;
  const missingPublicAuthors = audit.filter((item) => !item.public_author).length;
  const publishedChecks = new Set(audit.filter((item) => item.seo_score < 75 || !item.public_author).map((item) => item.content_id));
  const attentionIds = new Set(content.filter((item) => item.status === "draft" || item.status === "review").map((item) => item.id));
  publishedChecks.forEach((id) => attentionIds.add(id));
  const coverageCompleted = coverage.reduce((sum, item) => sum + Math.min(item.published_count, item.launch_target), 0);
  const coverageTarget = coverage.reduce((sum, item) => sum + item.launch_target, 0);
  const coveragePercent = coverageTarget ? Math.round(coverageCompleted / coverageTarget * 100) : 0;
  const readyTypes = coverage.filter((item) => item.coverage_status === "ready").length;
  const remainingFor = (type: string) => coverage.find((item) => item.content_type === type)?.remaining_count ?? 0;
  const contentById = new Map(content.map((item) => [item.id, item]));
  const now = currentDate.getTime();
  const sevenDaysFromNow = now + 7 * 24 * 60 * 60 * 1000;
  const unpublishedSchedule = workflows.filter((entry) => entry.scheduled_for && contentById.get(entry.content_id)?.status !== "published");
  const dueNow = unpublishedSchedule.filter((entry) => new Date(entry.scheduled_for!).getTime() <= now).length;
  const scheduledNextWeek = unpublishedSchedule.filter((entry) => {
    const scheduledAt = new Date(entry.scheduled_for!).getTime();
    return scheduledAt > now && scheduledAt <= sevenDaysFromNow;
  }).length;
  const publishedReviewIds = new Set(content.filter((item) => item.content_type === "review" && item.status === "published").map((item) => item.id));
  const liveReviewProducts = (reviewProductResponse.data ?? []).filter((product) => publishedReviewIds.has(product.review_content_id));
  const productsMissingLinks = liveReviewProducts.filter((product) => !product.product_url).length;

  const priorityTasks: Array<{ label: string; title: string; href: string; tone: string }> = [];
  if (dueNow) priorityTasks.push({ label: "Due now", title: `${dueNow} scheduled item${dueNow === 1 ? "" : "s"} ready to evaluate`, href: "/admin/calendar", tone: "clay" });
  if (review) priorityTasks.push({ label: "Editorial review", title: `${review} item${review === 1 ? "" : "s"} waiting for a decision`, href: "/admin/content?status=review", tone: "blue" });
  if (missingPublicAuthors) priorityTasks.push({ label: "Responsibility", title: `${missingPublicAuthors} public author gap${missingPublicAuthors === 1 ? "" : "s"} to resolve`, href: "/admin/contributors", tone: "green" });
  if (seoNeedsWork) priorityTasks.push({ label: "SEO health", title: `${seoNeedsWork} published page${seoNeedsWork === 1 ? "" : "s"} below 75`, href: "/admin/seo", tone: "amber" });
  if (drafts) priorityTasks.push({ label: "Drafting", title: `${drafts} private draft${drafts === 1 ? "" : "s"} in progress`, href: "/admin/content?status=draft", tone: "amber" });

  return <main id="main-content">
    <header className="dashboard-page-header">
      <div><p className="dashboard-kicker">{today}</p><h1>Welcome back, {firstName}.</h1><p>Start with today’s priorities, then monitor the wider editorial programme.</p></div>
    </header>

    <section className="dashboard-kpi-grid" aria-label="Editorial key figures">
      <article><span className="kpi-icon blue"><TrendIcon /></span><div><p>Published</p><strong>{published}</strong><small>Visible to readers</small></div><em>{Math.round((published / pipelineMax) * 100)}%</em></article>
      <article><span className="kpi-icon amber"><ContentIcon /></span><div><p>Needs attention</p><strong>{attentionIds.size}</strong><small>Unique items · {drafts + review} workflow · {publishedChecks.size} published checks</small></div><em className="neutral">Queue</em></article>
      <article><span className="kpi-icon clay"><CalendarIcon /></span><div><p>Next 7 days</p><strong>{scheduledNextWeek}</strong><small>Planned publications</small></div><em className="neutral">Schedule</em></article>
    </section>

    <section className="dashboard-action-center" aria-labelledby="action-center-title">
      <div><p className="dashboard-kicker">Priority queue</p><h2 id="action-center-title">To do today</h2><span>Work is ordered by publishing risk and editorial readiness.</span></div>
      {priorityTasks.length ? priorityTasks.slice(0, 4).map((task) => <Link href={task.href} key={`${task.label}-${task.href}`}><i className={task.tone} /><span><small>{task.label}</small><strong>{task.title}</strong></span><ChevronIcon /></Link>) : <div className="dashboard-action-clear" role="status"><TrendIcon /><span><strong>You’re all caught up.</strong><small>No editorial task needs immediate attention.</small></span></div>}
    </section>

    <section className="dashboard-overview-grid">
      <article className="dashboard-panel pipeline-panel">
        <div className="panel-heading"><div><p className="dashboard-kicker">Workflow</p><h2>Editorial pipeline</h2></div><Link href="/admin/content">View library <ChevronIcon /></Link></div>
        <div className="pipeline-list">
          {[{ label: "Draft", value: drafts, tone: "amber" }, { label: "In review", value: review, tone: "blue" }, { label: "Published", value: published, tone: "green" }].map((item) => <div key={item.label}><div><span><i className={item.tone} />{item.label}</span><strong>{item.value}</strong></div><div className="pipeline-track"><i className={item.tone} style={{ width: `${Math.max((item.value / pipelineMax) * 100, item.value ? 8 : 0)}%` }} /></div></div>)}
        </div>
      </article>

      <article className="dashboard-panel launch-panel launch-collection-panel">
        <p className="dashboard-kicker light">Launch collection</p><h2>{readyTypes}/{coverage.length} content targets ready.</h2><div className="launch-score"><strong>{coveragePercent}%</strong><span>{coverageCompleted} of {coverageTarget} target items</span></div><div className="launch-track"><i style={{ width: `${coveragePercent}%` }} /></div><div className="launch-mini-grid">{coverage.map((item) => <span key={item.content_type}><i className={item.coverage_status} />{typeLabel[item.content_type] ?? item.content_type}<strong>{item.published_count}/{item.launch_target}</strong></span>)}</div><Link href="/admin/seo">Open launch coverage <ChevronIcon /></Link>
      </article>
    </section>

    <section className="dashboard-lower-grid">
      <article className="dashboard-panel recent-panel">
        <div className="panel-heading"><div><p className="dashboard-kicker">Latest activity</p><h2>Recent content</h2></div><Link href="/admin/content">View all <ChevronIcon /></Link></div>
        <div className="dashboard-table">
          <div className="dashboard-table-head"><span>Content</span><span>Type</span><span>Status</span><span>Updated</span></div>
          {content.slice(0, 5).map((item) => <div className="dashboard-table-row" key={item.id}><Link className="recent-content-link" href={`/admin/content/${item.id}/edit`}><strong>{item.title}</strong><small>/{item.slug}</small></Link><span>{typeLabel[item.content_type] ?? item.content_type}</span><span><i className={`status-dot ${item.status}`} />{statusLabel[item.status]}</span><time dateTime={item.updated_at}>{new Intl.DateTimeFormat("en", { month: "short", day: "numeric" }).format(new Date(item.updated_at))}</time></div>)}
        </div>
      </article>

      <aside className="dashboard-side-stack">
        <article className="dashboard-panel focus-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Editorial focus</p><h2>Next up</h2></div></div><ol><li><span>01</span><div><strong>Complete plant collection</strong><small>{remainingFor("plant")} profiles remaining</small></div></li><li><span>02</span><div><strong>Expand diagnostics</strong><small>{remainingFor("problem")} guides remaining</small></div></li><li><span>03</span><div><strong>Approve public authors</strong><small>{missingPublicAuthors} published items use the editorial desk fallback</small></div></li></ol></article>
        <MonetizationPanel productsMissingLinks={productsMissingLinks} totalProducts={liveReviewProducts.length} />
      </aside>
    </section>
  </main>;
}
