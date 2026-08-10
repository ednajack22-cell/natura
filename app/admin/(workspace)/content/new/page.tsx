import type { Metadata } from "next";
import Link from "next/link";
import { PlusIcon } from "@/components/admin/admin-icons";
import { createDraft } from "@/app/admin/content/new/actions";
import { editorialSections } from "@/lib/navigation";

export const metadata: Metadata = { title: "New content" };

const errors: Record<string, string> = {
  invalid: "Check the required fields, the URL slug, and the public destination.",
  duplicate: "That slug already belongs to another content item.",
  save: "The draft could not be saved. Please try again.",
};

export default async function NewDraftPage({ searchParams }: { searchParams: Promise<{ error?: string; type?: string }> }) {
  const { error, type } = await searchParams;
  const defaultType = ["plant", "problem", "guide", "calendar", "tool", "review", "page"].includes(type ?? "") ? type : "guide";
  const defaultSection = defaultType === "plant" ? "grow" : defaultType === "problem" ? "plant-care" : defaultType === "guide" ? "small-space-gardening" : defaultType === "calendar" ? "planting-calendar" : defaultType === "tool" ? "tools" : defaultType === "review" ? "reviews" : "institutional";
  const defaultSubsection = defaultType === "plant" ? "plant-guides" : defaultType === "problem" ? "plant-problems" : defaultType === "guide" ? "balcony" : defaultType === "calendar" ? "monthly-calendars" : defaultType === "review" ? "containers" : defaultType === "page" ? "about" : "";

  return <main id="main-content" className="dashboard-editor">
    <header className="dashboard-page-header compact"><div><Link className="dashboard-back-link" href="/admin/content">← Content library</Link><p className="dashboard-kicker">Editorial workspace</p><h1>Create new content</h1><p>Create the record, connect it to the public navigation, then continue directly in the full editor.</p></div></header>
    <section className="editor-card dashboard-form-card">
      <div className="form-card-heading"><span><PlusIcon /></span><div><h2>Content identity</h2><p>Required information for a safe private draft.</p></div></div>
      {error && <div className="form-alert" role="alert">{errors[error] ?? errors.save}</div>}
      <form className="editor-form" action={createDraft}>
        <div className="form-grid"><label><span>Content type</span><select name="contentType" defaultValue={defaultType} required><option value="plant">Plant profile</option><option value="problem">Plant problem</option><option value="guide">Guide</option><option value="calendar">Calendar</option><option value="tool">Tool</option><option value="review">Review</option><option value="page">Page</option></select></label><label><span>Publishing state</span><div className="locked-status"><i />Private draft</div><small>Publishing becomes available after the required fields are completed.</small></label></div>
        <label><span>Title</span><input name="title" minLength={3} maxLength={160} placeholder="Growing mint in a container" required /></label>
        <label><span>URL slug</span><div className="slug-field"><span>natura.local/</span><input name="slug" pattern="[a-z0-9]+(?:-[a-z0-9]+)*" placeholder="growing-mint-container" required /></div></label>
        <div className="form-grid"><label><span>Public section</span><select name="publicSection" defaultValue={defaultSection} required>{editorialSections.map((section) => <option value={section.value} key={section.value}>{section.label}</option>)}</select><small>This connects the content to Natura’s main navigation.</small></label><label><span>Subsection</span><select name="subsection" defaultValue={defaultSubsection}><option value="">No subsection yet</option>{editorialSections.map((section) => <optgroup label={section.label} key={section.value}>{section.children.map((child) => <option value={child.value} key={`${section.value}-${child.value}`}>{child.label}</option>)}</optgroup>)}</select></label></div>
        <label><span>Short summary</span><textarea name="excerpt" maxLength={500} rows={4} placeholder="Explain what the reader will learn and why it matters." /></label>
        <div className="creation-next-step"><strong>What happens next?</strong><p>Saving creates the draft and opens its editor immediately. You can then write the content, complete SEO, request review, preview, and publish.</p></div>
        <div className="editor-actions"><Link className="button button-secondary" href="/admin/content">Cancel</Link><button className="button button-primary" type="submit">Create and continue</button></div>
      </form>
    </section>
  </main>;
}
