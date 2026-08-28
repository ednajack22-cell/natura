import type { Metadata } from "next";
import Link from "next/link";
import { LinkGraphView } from "@/components/admin/link-graph-view";
import { getLinkGraph } from "@/lib/link-graph";

export const metadata: Metadata = { title: "Internal links", robots: { index: false, follow: false } };
export const dynamic = "force-dynamic";

export default async function InternalLinksPage() {
  const { nodes, edges, orphans } = await getLinkGraph();

  const gearEdges = edges.filter((edge) => edge.kind === "gear").length;
  const reviews = nodes.filter((node) => node.type === "review");
  const reviewsWithoutInbound = reviews.filter((review) => review.inbound === 0);

  return (
    <main id="main-content">
      <header className="dashboard-page-header">
        <div>
          <p className="dashboard-kicker">Site structure</p>
          <h1>Internal links</h1>
          <p>Every published page and the editorial links between them. Internal linking decides which pages accumulate authority and which ones readers ever reach.</p>
        </div>
      </header>

      <section className="kpi-row" aria-label="Link summary">
        <article className="kpi-card">
          <div className="kpi-head"><span className="kpi-label">Published pages</span></div>
          <strong className="kpi-value">{nodes.length}</strong>
          <span className="kpi-breakdown">{edges.length} editorial links between them</span>
        </article>
        <article className="kpi-card">
          <div className="kpi-head"><span className="kpi-label">Links to reviews</span></div>
          <strong className="kpi-value">{gearEdges}</strong>
          <span className="kpi-breakdown">{gearEdges === 0 ? "Nothing routes readers to a commercial page" : "From articles into the pages that can earn"}</span>
        </article>
        <article className="kpi-card">
          <div className="kpi-head"><span className="kpi-label">Reviews with no inbound link</span></div>
          <strong className="kpi-value">{reviewsWithoutInbound.length}</strong>
          <span className="kpi-breakdown">{reviews.length ? `of ${reviews.length} published` : "No published review"}</span>
        </article>
        <article className="kpi-card">
          <div className="kpi-head"><span className="kpi-label">Pages nothing links to</span></div>
          <strong className="kpi-value">{orphans.length}</strong>
          <span className="kpi-breakdown">Reachable only through the menu and the sitemap</span>
        </article>
      </section>

      <section className="dashboard-panel">
        <div className="panel-heading">
          <div>
            <p className="dashboard-kicker">The whole site at once</p>
            <h2>Link map</h2>
          </div>
        </div>
        <LinkGraphView nodes={nodes} edges={edges} />
      </section>

      {orphans.length > 0 && (
        <section className="dashboard-panel">
          <div className="panel-heading">
            <div>
              <p className="dashboard-kicker">Worth a look</p>
              <h2>Pages nothing links to</h2>
            </div>
          </div>
          <p className="orphan-note">
            These are reachable through the menu and the sitemap, which is enough to be indexed but not enough to be
            recommended. Linking to them from a related page is the cheapest improvement available here.
          </p>
          <ul className="orphan-list">
            {orphans.slice(0, 24).map((node) => (
              <li key={node.id}>
                <Link href={`/admin/content?type=${node.type}`}>{node.title}</Link>
                <code>{node.path}</code>
              </li>
            ))}
          </ul>
          {orphans.length > 24 && <p className="orphan-note">and {orphans.length - 24} more.</p>}
        </section>
      )}
    </main>
  );
}
