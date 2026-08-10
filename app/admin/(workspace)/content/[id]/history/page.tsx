import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { restoreRevision } from "@/app/admin/content/[id]/history/actions";
import { requireAdmin } from "@/lib/auth";
import { readEditorialBody } from "@/lib/editorial";
import type { Json } from "@/lib/supabase/database.types";

export const metadata: Metadata = { title: "Version history" };

function object(value: Json) { return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {}; }
function text(value: Json | undefined) { return typeof value === "string" ? value : ""; }

export default async function VersionHistoryPage({ params, searchParams }: { params: Promise<{ id: string }>; searchParams: Promise<{ version?: string; error?: string }> }) {
  const { id } = await params; const query = await searchParams;
  const { supabase } = await requireAdmin();
  const [{ data: item, error }, { data: revisions }, { data: events }] = await Promise.all([
    supabase.from("content_items").select("id, title, slug, excerpt, status, body, seo_title, seo_description, updated_at").eq("id", id).single(),
    supabase.from("content_revisions").select("id, version, snapshot, created_at, created_by").eq("content_id", id).order("version", { ascending: false }).limit(50),
    supabase.from("editorial_events").select("id, action, metadata, created_at").eq("content_id", id).order("created_at", { ascending: false }).limit(20),
  ]);
  if (error || !item) notFound();
  const requestedVersion = Number(query.version);
  const selected = (revisions ?? []).find((revision) => revision.version === requestedVersion) ?? revisions?.[0];
  const snapshot = selected ? object(selected.snapshot) : {};
  const snapshotBody = object(snapshot.body ?? {});
  const currentBody = readEditorialBody(item.body);
  const comparisons = selected ? [
    ["Title", text(snapshot.title), item.title], ["URL slug", text(snapshot.slug), item.slug], ["Status", text(snapshot.status), item.status],
    ["Reader summary", text(snapshot.excerpt), item.excerpt ?? ""], ["SEO title", text(snapshot.seo_title), item.seo_title ?? ""],
    ["Meta description", text(snapshot.seo_description), item.seo_description ?? ""], ["Core overview", text(snapshotBody.overview), currentBody.overview ?? ""],
  ] : [];
  const restore = restoreRevision.bind(null, item.id);
  const errorMessages: Record<string, string> = { confirmation: "Confirm that restoration creates a private draft.", missing: "That revision no longer exists.", restore: "The revision could not be restored." };

  return <main id="main-content" className="history-page"><header className="dashboard-page-header compact"><div><Link className="dashboard-back-link" href={`/admin/content/${item.id}/edit`}>← Back to editor</Link><p className="dashboard-kicker">Revision control</p><h1>{item.title}</h1><p>Compare the current record with a saved version and restore deliberately as a private draft.</p></div></header>
    {query.error && <div className="editor-notice error" role="alert">{errorMessages[query.error] ?? errorMessages.restore}</div>}
    <section className="history-layout"><aside className="dashboard-panel version-list"><div><p className="dashboard-kicker">Saved versions</p><strong>{revisions?.length ?? 0}</strong></div>{revisions?.length ? <nav aria-label="Saved versions">{revisions.map((revision) => <Link className={selected?.id === revision.id ? "active" : ""} href={`/admin/content/${item.id}/history?version=${revision.version}`} key={revision.id}><span>Version {revision.version}</span><small>{new Intl.DateTimeFormat("en", { dateStyle: "medium", timeStyle: "short" }).format(new Date(revision.created_at))}</small></Link>)}</nav> : <p>No previous version has been captured yet. Save a change in the editor to create one.</p>}</aside>
      <div className="history-main">{selected ? <><article className="dashboard-panel comparison-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Side-by-side comparison</p><h2>Version {selected.version} vs current</h2></div><span className="module-note">{comparisons.filter(([, before, current]) => before !== current).length} changed fields</span></div><div className="comparison-table"><div className="comparison-head"><span>Field</span><span>Version {selected.version}</span><span>Current</span></div>{comparisons.map(([label, before, current]) => <div className={before !== current ? "changed" : ""} key={label}><strong>{label}</strong><p>{before || "—"}</p><p>{current || "—"}</p></div>)}</div></article>
        <article className="dashboard-panel restore-panel"><div><p className="dashboard-kicker">Safe restoration</p><h2>Restore version {selected.version} as draft</h2><p>The current record is preserved automatically as a new revision. Restoration never republishes content and does not overwrite specialised plant, diagnostic, guide, calendar, review, or institutional profile tables.</p></div><form action={restore}><input type="hidden" name="revisionId" value={selected.id} /><input type="hidden" name="version" value={selected.version} /><label><input type="checkbox" name="confirmation" value="restore-as-draft" required /><span>I understand that the core article and SEO fields will be restored and the item will become a private draft.</span></label><button type="submit">Restore version {selected.version}</button></form></article></> : <div className="dashboard-panel dashboard-empty"><h2>No comparison available</h2><p>Return to the editor and save a change to capture the first previous version.</p></div>}
      </div><aside className="dashboard-panel version-events"><p className="dashboard-kicker">Audit trail</p><ol>{(events ?? []).map((event) => <li key={event.id}><strong>{event.action.replaceAll("_", " ")}</strong><small>{new Intl.DateTimeFormat("en", { dateStyle: "medium", timeStyle: "short" }).format(new Date(event.created_at))}</small></li>)}</ol></aside></section>
  </main>;
}
