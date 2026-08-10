import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedGuide } from "@/lib/guide-content";

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const guide = await getPublishedGuide((await params).slug);
  if (!guide) return {};
  return { title: guide.seoTitle || guide.title, description: guide.seoDescription || guide.excerpt, alternates: { canonical: `/small-space-gardening/guides/${guide.slug}` } };
}

export default async function GuidePage({ params }: { params: Promise<{ slug: string }> }) {
  const guide = await getPublishedGuide((await params).slug);
  if (!guide) notFound();
  const jsonLd = { "@context": "https://schema.org", "@type": "HowTo", name: guide.title, description: guide.excerpt, totalTime: `PT${guide.estimatedTimeMinutes}M`, supply: guide.materials.map((item) => ({ "@type": "HowToSupply", name: item })), step: guide.steps.map((step, index) => ({ "@type": "HowToStep", position: index + 1, name: step.title, text: step.text })), dateModified: guide.updatedAt, publisher: { "@type": "Organization", name: "Natura" } };
  return <main id="main-content"><script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd).replace(/</g, "\\u003c") }} /><section className="guide-detail-hero"><div className="site-container guide-detail-grid"><div><Link className="back-link" href="/small-space-gardening/guides">← Guide library</Link><p className="eyebrow"><LeafIcon /> Step-by-step project</p><h1>{guide.title}</h1><p>{guide.excerpt}</p><div className="guide-facts"><span>{guide.guideType}</span><span>{guide.difficulty}</span><span>{guide.estimatedTimeMinutes} minutes</span></div></div><aside><span>Designed for</span><strong>{guide.audience}</strong></aside></div></section><section className="section site-container guide-detail-layout"><div className="guide-detail-main"><p className="eyebrow">Before you begin</p><h2>Make the constraints part of the plan.</h2><p className="diagnostic-overview">{guide.overview}</p><div className="guide-preparation"><section><h2>Prerequisites</h2><ul>{guide.prerequisites.map((item) => <li key={item}>{item}</li>)}</ul></section><section><h2>Materials</h2><ul>{guide.materials.map((item) => <li key={item}>{item}</li>)}</ul></section></div><section className="guide-steps"><p className="eyebrow">Method</p><h2>Follow the project in order.</h2>{guide.steps.map((step, index) => <article key={step.title}><span>{String(index + 1).padStart(2, "0")}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</section></div><aside className="guide-side-rail">{guide.tips.length > 0 && <section className="guide-tip-card"><p className="eyebrow">Field notes</p>{guide.tips.map((tip) => <p key={tip}>{tip}</p>)}</section>}{guide.warnings.length > 0 && <section className="diagnostic-warning"><strong>Safety and limits</strong>{guide.warnings.map((warning) => <p key={warning}>{warning}</p>)}</section>}{guide.relatedPlants.length > 0 && <section className="related-plants-card"><p className="eyebrow">Plants in this guide</p><h2>Open the growing profiles.</h2>{guide.relatedPlants.map((plant) => <Link href={`/plants/${plant.slug}`} key={plant.id}>{plant.title}<ArrowIcon /></Link>)}</section>}</aside></section></main>;
}
