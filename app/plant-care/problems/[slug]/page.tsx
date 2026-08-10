import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedProblem } from "@/lib/problem-content";

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const problem = await getPublishedProblem((await params).slug);
  if (!problem) return {};
  return { title: problem.seoTitle || problem.title, description: problem.seoDescription || problem.excerpt, alternates: { canonical: `/plant-care/problems/${problem.slug}` } };
}

export default async function ProblemPage({ params }: { params: Promise<{ slug: string }> }) {
  const problem = await getPublishedProblem((await params).slug);
  if (!problem) notFound();
  const jsonLd = { "@context": "https://schema.org", "@type": "Article", headline: problem.title, description: problem.excerpt, dateModified: problem.updatedAt, about: problem.relatedPlants.map((plant) => ({ "@type": "Thing", name: plant.title })), publisher: { "@type": "Organization", name: "Natura" } };
  return <main id="main-content"><script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd).replace(/</g, "\\u003c") }} /><section className="diagnostic-hero"><div className="site-container diagnostic-hero-grid"><div><Link className="back-link" href="/plant-care/problems">← Diagnostic library</Link><p className="eyebrow"><LeafIcon /> Plant problem diagnostic</p><h1>{problem.title}</h1><p>{problem.excerpt}</p><div className="diagnostic-badges"><span>{problem.category.replaceAll("-", " ")}</span><span className={`urgency-${problem.urgency}`}>{problem.urgency} attention</span></div></div><aside><strong>Before you act</strong><p>A symptom can have several causes. Check moisture, drainage, recent weather, light, and recent care changes together.</p></aside></div></section><section className="section site-container diagnostic-layout"><div className="diagnostic-main"><p className="eyebrow">What this symptom means</p><h2>Observe the pattern before changing care.</h2><p className="diagnostic-overview">{problem.overview}</p><section><h2>Symptoms to compare</h2><ul className="symptom-list">{problem.symptoms.map((symptom) => <li key={symptom}>{symptom}</li>)}</ul></section><section><h2>Likely causes</h2><div className="diagnostic-step-list">{problem.likelyCauses.map((cause, index) => <article key={cause.title}><span>0{index + 1}</span><div><h3>{cause.title}</h3><p>{cause.text}</p></div></article>)}</div></section><section><h2>Verification steps</h2><div className="diagnostic-step-list check">{problem.verificationSteps.map((step, index) => <article key={step.title}><span>{index + 1}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</div></section><section><h2>Recommended actions</h2><div className="diagnostic-step-list action">{problem.recommendedActions.map((step, index) => <article key={step.title}><span>{index + 1}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</div></section></div><aside className="diagnostic-aside">{problem.warnings.length > 0 && <div className="diagnostic-warning"><strong>Important caution</strong>{problem.warnings.map((warning) => <p key={warning}>{warning}</p>)}</div>}<div className="related-plants-card"><p className="eyebrow">Related plants</p><h2>Check the growing guide.</h2>{problem.relatedPlants.map((plant) => <Link href={`/plants/${plant.slug}`} key={plant.id}>{plant.title}<ArrowIcon /></Link>)}</div></aside></section></main>;
}
