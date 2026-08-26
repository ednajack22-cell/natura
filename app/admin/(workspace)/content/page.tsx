import type { Metadata } from "next";
import Link from "next/link";
import { ContentIcon, PlusIcon, SearchSmallIcon } from "@/components/admin/admin-icons";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Content library" };

const statusLabel: Record<string, string> = { draft: "Draft", review: "In review", published: "Published", archived: "Archived" };
const typeLabel: Record<string, string> = { plant: "Plant profile", problem: "Plant problem", guide: "Guide", calendar: "Calendar", tool: "Tool", review: "Review", page: "Page" };

export default async function ContentLibraryPage({ searchParams }: { searchParams: Promise<{ q?: string; status?: string; type?: string }> }) {
  const { supabase } = await requireAdmin();
  const params = await searchParams;
  const { data, error } = await supabase.from("content_items").select("id, title, slug, excerpt, content_type, status, updated_at").order("updated_at", { ascending: false });
  if (error) throw new Error("Unable to load the content library.");

  const query = params.q?.trim().toLowerCase() ?? "";
  const content = data.filter((item) => {
    const matchesQuery = !query || `${item.title} ${item.slug} ${item.excerpt ?? ""}`.toLowerCase().includes(query);
    const matchesStatus = !params.status || params.status === "all" || item.status === params.status;
    const matchesType = !params.type || params.type === "all" || item.content_type === params.type;
    return matchesQuery && matchesStatus && matchesType;
  });
  const published = data.filter((item) => item.status === "published").length;
  const pending = data.filter((item) => item.status === "draft" || item.status === "review").length;

  return <main id="main-content">
    <header className="dashboard-page-header"><div><p className="dashboard-kicker">Editorial inventory</p><h1>Content library</h1><p>Organise, search, and monitor every Natura article from one place.</p></div><Link className="dashboard-primary-action" href="/admin/content/new"><PlusIcon />New content</Link></header>

    <section className="library-summary-strip"><div><strong>{data.length}</strong><span>All content</span></div><div><strong>{published}</strong><span>Published</span></div><div><strong>{pending}</strong><span>Draft or review</span></div></section>

    <section className="dashboard-panel content-library-panel">
      <form className="content-filters" action="/admin/content">
        <label className="content-filter-search"><SearchSmallIcon /><span className="sr-only">Search library</span><input name="q" defaultValue={params.q} placeholder="Search title, slug, or summary…" /></label>
        <label><span className="sr-only">Filter by status</span><select name="status" defaultValue={params.status ?? "all"}><option value="all">All statuses</option><option value="draft">Draft</option><option value="review">In review</option><option value="published">Published</option><option value="archived">Archived</option></select></label>
        <label><span className="sr-only">Filter by type</span><select name="type" defaultValue={params.type ?? "all"}><option value="all">All content types</option><option value="plant">Plant profiles</option><option value="problem">Plant problems</option><option value="guide">Guides</option><option value="calendar">Calendars</option><option value="tool">Tools</option><option value="review">Reviews</option><option value="page">Pages</option></select></label>
        <button type="submit">Apply filters</button>
      </form>

      {content.length ? <div className="dashboard-table content-library-table">
        <div className="dashboard-table-head"><span>Content</span><span>Type</span><span>Status</span><span>Updated</span><span>Actions</span></div>
        {content.map((item) => <div className="dashboard-table-row" key={item.id}><Link className="content-title-cell" href={`/admin/content/${item.id}/edit`}><span className="content-symbol"><ContentIcon /></span><span><strong>{item.title}</strong><small>/{item.slug}</small></span></Link><span>{typeLabel[item.content_type] ?? item.content_type}</span><span><i className={`status-dot ${item.status}`} />{statusLabel[item.status]}</span><time dateTime={item.updated_at}>{new Intl.DateTimeFormat("en", { month: "short", day: "numeric", year: "numeric" }).format(new Date(item.updated_at))}</time><div className="content-row-actions"><Link href={`/admin/content/${item.id}/edit`}>{item.status === "published" ? "Edit published" : "Edit"}</Link><Link href={`/admin/content/${item.id}/edit#seo-report`}>SEO report</Link></div></div>)}
      </div> : <div className="dashboard-empty"><ContentIcon /><h2>No content found</h2><p>Try changing the filters or create a new private draft.</p><Link className="dashboard-primary-action" href="/admin/content/new"><PlusIcon />Create content</Link></div>}
      <footer className="content-library-footer"><span>Showing {content.length} of {data.length} items</span><span>Editor access is protected by your administrator session.</span></footer>
    </section>
  </main>;
}
