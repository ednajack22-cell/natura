import type { Metadata } from "next";
import { saveContributor } from "@/app/admin/contributors/actions";
import { ContentIcon, PlusIcon } from "@/components/admin/admin-icons";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Contributors" };

const errors: Record<string, string> = { invalid: "Check the contributor fields and URL slug.", duplicate: "That contributor slug is already used.", save: "The contributor could not be saved." };

export default async function ContributorsPage({ searchParams }: { searchParams: Promise<{ saved?: string; error?: string }> }) {
  const query = await searchParams;
  const { supabase } = await requireAdmin();
  const [{ data: contributors, error }, { data: workflows }] = await Promise.all([
    supabase.from("editorial_contributors").select("id, slug, display_name, role_title, bio, expertise, conflicts, is_active, is_public, updated_at").order("display_name"),
    supabase.from("content_workflows").select("author_id, reviewer_id"),
  ]);
  if (error) throw new Error("Unable to load editorial contributors.");
  const assignments = (id: string) => ({ authored: (workflows ?? []).filter((entry) => entry.author_id === id).length, reviewed: (workflows ?? []).filter((entry) => entry.reviewer_id === id).length });

  return <main id="main-content"><header className="dashboard-page-header"><div><p className="dashboard-kicker">Editorial responsibility</p><h1>Authors and reviewers</h1><p>Manage internal assignments now and prepare verified public contributor profiles for launch.</p></div></header>
    {query.saved && <div className="editor-notice success" role="status">Contributor saved successfully.</div>}{query.error && <div className="editor-notice error" role="alert">{errors[query.error] ?? errors.save}</div>}
    <section className="contributors-layout"><article className="dashboard-panel contributors-list"><div className="panel-heading"><div><p className="dashboard-kicker">Directory</p><h2>{contributors.length} contributors</h2></div><span className="module-note">Internal and public identities</span></div>
      <div className="contributor-cards">{contributors.map((contributor) => { const counts = assignments(contributor.id); return <details key={contributor.id}><summary><span className="content-symbol"><ContentIcon /></span><div><strong>{contributor.display_name}</strong><small>{contributor.role_title || "Role not specified"}</small></div><div className="contributor-counts"><span>{counts.authored} author</span><span>{counts.reviewed} review</span></div><i className={contributor.is_active ? "active" : "inactive"}>{contributor.is_active ? "Active" : "Inactive"}</i></summary><form action={saveContributor} className="contributor-form"><input type="hidden" name="id" value={contributor.id} /><div className="editor-field-grid"><label><span>Display name</span><input name="displayName" defaultValue={contributor.display_name} required /></label><label><span>Profile slug</span><input name="slug" defaultValue={contributor.slug} required /></label></div><label><span>Role title</span><input name="roleTitle" defaultValue={contributor.role_title} /></label><label><span>Biography</span><textarea name="bio" rows={5} defaultValue={contributor.bio} /></label><label><span>Expertise</span><textarea name="expertise" rows={4} defaultValue={contributor.expertise.join("\n")} /><small>One area per line.</small></label><label><span>Conflicts and disclosures</span><textarea name="conflicts" rows={3} defaultValue={contributor.conflicts} /></label><div className="contributor-checks"><label><input type="checkbox" name="isActive" value="yes" defaultChecked={contributor.is_active} /> Available for assignment</label><label><input type="checkbox" name="isPublic" value="yes" defaultChecked={contributor.is_public} /> Public biography approved</label></div><button type="submit">Save contributor</button></form></details>; })}</div>
    </article><aside className="dashboard-panel contributor-create"><div className="form-card-heading"><span><PlusIcon /></span><div><h2>Add contributor</h2><p>Create an internal author or reviewer identity.</p></div></div><form action={saveContributor} className="contributor-form"><input type="hidden" name="id" value="" /><label><span>Display name</span><input name="displayName" required /></label><label><span>Profile slug</span><input name="slug" pattern="[a-z0-9]+(?:-[a-z0-9]+)*" required /></label><label><span>Role title</span><input name="roleTitle" /></label><label><span>Biography</span><textarea name="bio" rows={4} /></label><label><span>Expertise</span><textarea name="expertise" rows={3} placeholder="Container gardening\nPlant health" /></label><label><span>Conflicts and disclosures</span><textarea name="conflicts" rows={3} /></label><div className="contributor-checks"><label><input type="checkbox" name="isActive" value="yes" defaultChecked /> Available for assignment</label><label><input type="checkbox" name="isPublic" value="yes" /> Public biography approved</label></div><button type="submit">Create contributor</button></form></aside></section>
  </main>;
}
