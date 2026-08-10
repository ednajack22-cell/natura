import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { LeafIcon } from "@/components/icons";
import { getPublishedInstitutionalPage } from "@/lib/institutional-content";

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const page = await getPublishedInstitutionalPage((await params).slug);
  if (!page) return {};
  return { title: page.seoTitle || page.title, description: page.seoDescription || page.excerpt, alternates: { canonical: `/${page.slug}` }, robots: { index: true, follow: true } };
}

export default async function InstitutionalPage({ params }: { params: Promise<{ slug: string }> }) {
  const page = await getPublishedInstitutionalPage((await params).slug);
  if (!page) notFound();
  const pageLd = { "@context": "https://schema.org", "@type": page.pageKind === "about" ? "AboutPage" : page.pageKind === "contact" ? "ContactPage" : "WebPage", name: page.title, description: page.excerpt, dateModified: page.updatedAt, publisher: { "@type": "Organization", name: "Natura" }, url: `/${page.slug}` };
  const breadcrumbLd = { "@context": "https://schema.org", "@type": "BreadcrumbList", itemListElement: [{ "@type": "ListItem", position: 1, name: "Home", item: "/" }, { "@type": "ListItem", position: 2, name: page.title, item: `/${page.slug}` }] };
  return <main id="main-content"><script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify([pageLd, breadcrumbLd]).replace(/</g, "\u003c") }} />
    <section className="institutional-hero"><div className="site-container institutional-hero-grid"><div><Link className="back-link" href="/">← Natura home</Link><p className="eyebrow"><LeafIcon /> {page.eyebrow || "Natura trust centre"}</p><h1>{page.title}</h1><p>{page.excerpt}</p></div><aside><span>Document record</span><dl><div><dt>Last reviewed</dt><dd>{page.lastReviewedOn ? new Intl.DateTimeFormat("en", { dateStyle: "long" }).format(new Date(`${page.lastReviewedOn}T00:00:00`)) : "Review date pending"}</dd></div><div><dt>Status</dt><dd>{page.requiresLegalReview ? "Pre-launch review required" : "Editorially reviewed"}</dd></div></dl></aside></div></section>
    <section className="section site-container institutional-layout"><article className="institutional-main">{page.notice && <div className="institutional-notice" role="note"><strong>Important context</strong><p>{page.notice}</p></div>}<section className="institutional-overview"><p className="eyebrow">Overview</p><p>{page.overview}</p></section>{page.sections.map((section, index) => <section id={`section-${index + 1}`} key={`${section.heading}-${index}`}><span>{String(index + 1).padStart(2, "0")}</span><div><h2>{section.heading}</h2>{section.body.split(/\n{2,}/).map((paragraph) => <p key={paragraph}>{paragraph}</p>)}</div></section>)}{page.pageKind === "contact" && page.contactEmail && <section className="institutional-contact"><span>@</span><div><h2>Contact Natura</h2><p>Use this address for editorial corrections, source questions, privacy requests, and general feedback.</p><a href={`mailto:${page.contactEmail}`}>{page.contactEmail}</a></div></section>}{page.sources.length > 0 && <section className="article-sources"><p className="eyebrow">Reference framework</p><h2>Sources used for this page</h2><ol>{page.sources.map((source) => <li key={`${source.title}-${source.url ?? ""}`}>{source.url ? <a href={source.url} rel="noreferrer" target="_blank">{source.title}</a> : source.title}</li>)}</ol></section>}</article><aside className="institutional-side-rail"><p className="eyebrow">On this page</p>{page.sections.map((section, index) => <a href={`#section-${index + 1}`} key={`${section.heading}-nav`}>{section.heading}</a>)}{page.pageKind === "contact" && page.contactEmail && <a href={`mailto:${page.contactEmail}`}>Email Natura</a>}<small>Institutional content is maintained through Natura&apos;s protected editorial dashboard.</small></aside></section>
  </main>;
}
