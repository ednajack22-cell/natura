import type { Metadata } from "next";
import { TaxonomyIcon } from "@/components/admin/admin-icons";
import { editorialSections } from "@/lib/navigation";

export const metadata: Metadata = { title: "Taxonomies" };

export default function TaxonomiesPage() {
  return <main id="main-content"><header className="dashboard-page-header"><div><p className="dashboard-kicker">Information architecture</p><h1>Taxonomies</h1><p>The public menu and editorial classification now share the same controlled structure.</p></div></header><section className="taxonomy-grid">{editorialSections.map((section) => <article className="dashboard-panel taxonomy-card" key={section.value}><div><TaxonomyIcon /><h2>{section.label}</h2><span>{section.children.length} subsections</span></div><ul>{section.children.map((child) => <li key={child.value}><span>{child.label}</span><code>{child.value}</code></li>)}</ul></article>)}</section></main>;
}
