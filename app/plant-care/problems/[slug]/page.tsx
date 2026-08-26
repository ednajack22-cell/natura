import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { ArticleByline } from "@/components/article-byline";
import { getPublishedProblem, getPublishedProblems } from "@/lib/problem-content";
import { breadcrumbSchema, editorialAuthorSchema, getPublicEditorialMeta } from "@/lib/editorial-meta";
import { editorialSocialMetadata } from "@/lib/social-discovery";

/**
 * Prerender every published item at build time. Wrapped because a build must
 * not fail when the database is unreachable: returning no parameters simply
 * defers each page to its first request, where the same cache then applies.
 */
export async function generateStaticParams() {
  try {
    return (await getPublishedProblems()).map((entry) => ({ slug: entry.slug }));
  } catch {
    return [];
  }
}


/**
 * Published content changes when an editor publishes, not per visitor, so the
 * rendered page is cached and refreshed hourly. Editing an item revalidates its
 * path immediately, so this is only the ceiling on staleness.
 */
export const revalidate = 3600;


export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const problem = await getPublishedProblem((await params).slug);
  if (!problem) return {};
  const title = problem.seoTitle || problem.title;
  const description = problem.seoDescription || problem.excerpt;
  const canonicalPath = `/plant-care/problems/${problem.slug}`;
  return { title, description, alternates: { canonical: canonicalPath }, ...editorialSocialMetadata({ title, description, canonicalPath, label: "Plant problem guide", updatedAt: problem.updatedAt, originalImage: problem.imageUrl ? { url: problem.imageUrl, alt: problem.imageAlt || problem.title } : undefined }) };
}

export default async function ProblemPage({ params }: { params: Promise<{ slug: string }> }) {
  const slug = (await params).slug;
  const [problem, editorialMeta] = await Promise.all([getPublishedProblem(slug), getPublicEditorialMeta(slug)]);
  if (!problem) notFound();
  const jsonLd = [
    { "@context": "https://schema.org", "@type": "Article", headline: problem.title, description: problem.excerpt, author: editorialAuthorSchema(editorialMeta), datePublished: editorialMeta.publishedAt, dateModified: editorialMeta.updatedAt ?? problem.updatedAt, about: problem.relatedPlants.map((plant) => ({ "@type": "Thing", name: plant.title })), publisher: { "@type": "Organization", name: "Natura" }, mainEntityOfPage: `/plant-care/problems/${problem.slug}` },
    breadcrumbSchema([{ name: "Home", item: "/" }, { name: "Plant care", item: "/plant-care" }, { name: "Problems", item: "/plant-care/problems" }, { name: problem.title, item: `/plant-care/problems/${problem.slug}` }]),
  ];
  return <main id="main-content"><script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd).replace(/</g, "\\u003c") }} /><section className="diagnostic-hero"><div className="site-container diagnostic-hero-grid"><div><Link className="back-link" href="/plant-care/problems">← Diagnostic library</Link><p className="eyebrow"><LeafIcon /> Plant problem diagnostic</p><h1>{problem.title}</h1><p>{problem.excerpt}</p><div className="diagnostic-badges"><span>{problem.category.replaceAll("-", " ")}</span><span className={`urgency-${problem.urgency}`}>{problem.urgency} attention</span></div></div><aside><strong>Before you act</strong><p>A symptom can have several causes. Check moisture, drainage, recent weather, light, and recent care changes together.</p></aside></div></section><ArticleByline meta={editorialMeta} /><section className="section site-container diagnostic-layout"><div className="diagnostic-main"><p className="eyebrow">What this symptom means</p><h2>Observe the pattern before changing care.</h2><p className="diagnostic-overview">{problem.overview}</p><section><h2>Symptoms to compare</h2><ul className="symptom-list">{problem.symptoms.map((symptom) => <li key={symptom}>{symptom}</li>)}</ul></section><section><h2>Likely causes</h2><div className="diagnostic-step-list">{problem.likelyCauses.map((cause, index) => <article key={cause.title}><span>0{index + 1}</span><div><h3>{cause.title}</h3><p>{cause.text}</p></div></article>)}</div></section><section><h2>Verification steps</h2><div className="diagnostic-step-list check">{problem.verificationSteps.map((step, index) => <article key={step.title}><span>{index + 1}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</div></section><section><h2>Recommended actions</h2><div className="diagnostic-step-list action">{problem.recommendedActions.map((step, index) => <article key={step.title}><span>{index + 1}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</div></section>{problem.sources.length > 0 && <section className="article-sources public-source-list"><p className="eyebrow">Sources</p><h2>References used</h2><ol>{problem.sources.map((source) => <li key={`${source.title}-${source.url ?? ""}`}>{source.url ? <a href={source.url} rel="noreferrer" target="_blank">{source.title}</a> : source.title}</li>)}</ol></section>}</div><aside className="diagnostic-aside">{problem.warnings.length > 0 && <div className="diagnostic-warning"><strong>Important caution</strong>{problem.warnings.map((warning) => <p key={warning}>{warning}</p>)}</div>}<div className="related-plants-card"><p className="eyebrow">Related plants</p><h2>Check the growing guide.</h2>{problem.relatedPlants.map((plant) => <Link href={`/plants/${plant.slug}`} key={plant.id}>{plant.title}<ArrowIcon /></Link>)}</div></aside></section></main>;
}
