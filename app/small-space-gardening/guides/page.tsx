import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedGuides } from "@/lib/guide-content";

export const metadata: Metadata = {
  title: "Small-space gardening guides",
  description: "Step-by-step guides for balconies, containers, patios, and realistic indoor growing spaces.",
  alternates: { canonical: "/small-space-gardening/guides" },
};

const labels: Record<string, string> = { balcony: "Balcony", container: "Containers", indoor: "Indoor", beginner: "Beginner", seasonal: "Seasonal" };

export default async function GuidesPage({ searchParams }: { searchParams: Promise<{ type?: string }> }) {
  const guides = await getPublishedGuides();
  const selectedType = (await searchParams).type ?? "all";
  const types = [...new Set(guides.map((guide) => guide.guideType))];
  const visibleGuides = selectedType === "all" ? guides : guides.filter((guide) => guide.guideType === selectedType);
  return <main id="main-content">
    <section className="guide-library-hero"><div className="site-container"><p className="eyebrow"><LeafIcon /> Practical field guides</p><h1>Plan the space.<br /><em>Build it one step at a time.</em></h1><p>Clear projects for real balconies, containers, patios, and indoor growing areas—with the constraints explained before the shopping list.</p></div></section>
    <section className="section site-container"><div className="problem-library-heading"><div><p className="eyebrow">Guide library</p><h2>Start with one manageable project.</h2></div><p>{visibleGuides.length} guide{visibleGuides.length === 1 ? "" : "s"} shown, with materials, preparation, and ordered steps.</p></div><nav className="problem-filters" aria-label="Filter guides by type"><Link className={selectedType === "all" ? "active" : ""} href="/small-space-gardening/guides">All guides</Link>{types.map((type) => <Link className={selectedType === type ? "active" : ""} href={`/small-space-gardening/guides?type=${type}`} key={type}>{labels[type] ?? type}</Link>)}</nav>{visibleGuides.length ? <div className="guide-card-grid">{visibleGuides.map((guide) => <Link className="guide-card" href={`/small-space-gardening/guides/${guide.slug}`} key={guide.id}><div><span>{labels[guide.guideType] ?? guide.guideType}</span><i>{guide.difficulty}</i></div><h2>{guide.title}</h2><p>{guide.excerpt}</p><dl><div><dt>Time</dt><dd>{guide.estimatedTimeMinutes} min</dd></div><div><dt>Steps</dt><dd>{guide.steps.length}</dd></div></dl><strong>Open guide <ArrowIcon /></strong></Link>)}</div> : <div className="empty-results"><h2>No guides match this filter.</h2><p>Choose another guide type to continue.</p></div>}</section>
  </main>;
}
