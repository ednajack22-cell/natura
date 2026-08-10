import type { Metadata } from "next";
import Link from "next/link";
import { ChevronIcon, ContentIcon, PlantIcon, PlusIcon, TrendIcon } from "@/components/admin/admin-icons";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Overview" };

const statusLabel: Record<string, string> = { draft: "Draft", review: "In review", published: "Published", archived: "Archived" };
const typeLabel: Record<string, string> = { plant: "Plant profile", problem: "Plant problem", guide: "Guide", calendar: "Calendar", tool: "Tool", review: "Review", page: "Page" };

export default async function AdminOverviewPage() {
  const { supabase, profile } = await requireAdmin();
  const { data: content, error } = await supabase
    .from("content_items")
    .select("id, title, slug, content_type, status, updated_at, published_at")
    .order("updated_at", { ascending: false });
  if (error) throw new Error("Unable to load the editorial dashboard.");

  const count = (status: string) => content.filter((item) => item.status === status).length;
  const published = count("published");
  const drafts = count("draft");
  const review = count("review");
  const plantCount = content.filter((item) => item.content_type === "plant").length;
  const firstName = (profile.display_name ?? "Administrator").split(" ")[0];
  const today = new Intl.DateTimeFormat("en", { weekday: "long", month: "long", day: "numeric" }).format(new Date());
  const pipelineMax = Math.max(content.length, 1);

  return <main id="main-content">
    <header className="dashboard-page-header">
      <div><p className="dashboard-kicker">{today}</p><h1>Good morning, {firstName}.</h1><p>Here is what is happening across Natura’s editorial workspace.</p></div>
      <Link className="dashboard-primary-action" href="/admin/content/new"><PlusIcon />Create content</Link>
    </header>

    <section className="dashboard-kpi-grid" aria-label="Editorial key figures">
      <article><span className="kpi-icon green"><ContentIcon /></span><div><p>Total content</p><strong>{content.length}</strong><small>Across the whole library</small></div><em><TrendIcon /> Live</em></article>
      <article><span className="kpi-icon blue"><TrendIcon /></span><div><p>Published</p><strong>{published}</strong><small>Visible to readers</small></div><em>{Math.round((published / pipelineMax) * 100)}%</em></article>
      <article><span className="kpi-icon amber"><ContentIcon /></span><div><p>Needs attention</p><strong>{drafts + review}</strong><small>{drafts} drafts · {review} in review</small></div><em className="neutral">Queue</em></article>
      <article><span className="kpi-icon clay"><PlantIcon /></span><div><p>Plant profiles</p><strong>{plantCount}</strong><small>Goal: 15 for launch</small></div><em>{Math.round((plantCount / 15) * 100)}%</em></article>
    </section>

    <section className="dashboard-overview-grid">
      <article className="dashboard-panel pipeline-panel">
        <div className="panel-heading"><div><p className="dashboard-kicker">Workflow</p><h2>Editorial pipeline</h2></div><Link href="/admin/content">View library <ChevronIcon /></Link></div>
        <div className="pipeline-list">
          {[{ label: "Draft", value: drafts, tone: "amber" }, { label: "In review", value: review, tone: "blue" }, { label: "Published", value: published, tone: "green" }].map((item) => <div key={item.label}><div><span><i className={item.tone} />{item.label}</span><strong>{item.value}</strong></div><div className="pipeline-track"><i className={item.tone} style={{ width: `${Math.max((item.value / pipelineMax) * 100, item.value ? 8 : 0)}%` }} /></div></div>)}
        </div>
      </article>

      <article className="dashboard-panel launch-panel">
        <p className="dashboard-kicker light">Launch readiness</p><h2>Build the trusted starter collection.</h2><div className="launch-score"><strong>{plantCount}</strong><span>/ 15 plant profiles</span></div><div className="launch-track"><i style={{ width: `${Math.min((plantCount / 15) * 100, 100)}%` }} /></div><p>Complete the first 15 expert profiles before public launch.</p><Link href="/admin/plants">Manage plant profiles <ChevronIcon /></Link>
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
        <article className="dashboard-panel focus-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Editorial focus</p><h2>Next up</h2></div></div><ol><li><span>01</span><div><strong>Complete plant collection</strong><small>{Math.max(15 - plantCount, 0)} profiles remaining</small></div></li><li><span>02</span><div><strong>Review private drafts</strong><small>{drafts} items waiting</small></div></li><li><span>03</span><div><strong>Prepare media library</strong><small>Add credits and alt text</small></div></li></ol></article>
        <article className="dashboard-panel quick-panel"><p className="dashboard-kicker">Quick actions</p><Link href="/admin/content/new"><PlusIcon /><span><strong>New content</strong><small>Start a private draft</small></span><ChevronIcon /></Link><Link href="/admin/media"><ContentIcon /><span><strong>Media library</strong><small>Review visual assets</small></span><ChevronIcon /></Link></article>
      </aside>
    </section>
  </main>;
}
