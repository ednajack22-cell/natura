import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { ArticleByline } from "@/components/article-byline";
import { AdSlot } from "@/components/ad-slot";
import { GearCallout } from "@/components/gear-callout";
import { articleTopicLabel, getPublishedArticle, getPublishedArticles } from "@/lib/article-content";
import { breadcrumbSchema, editorialAuthorSchema, getPublicEditorialMeta } from "@/lib/editorial-meta";
import { editorialSocialMetadata } from "@/lib/social-discovery";
import { getGearLinks } from "@/lib/gear-links";

export const revalidate = 3600;

/**
 * Prerender every published article. Wrapped because a build must not fail when
 * the database is unreachable: with no parameters each page falls back to its
 * first request, where the same cache applies.
 */
export async function generateStaticParams() {
  try {
    return (await getPublishedArticles()).map((article) => ({ slug: article.slug }));
  } catch {
    return [];
  }
}

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const article = await getPublishedArticle((await params).slug);
  if (!article) return {};
  const title = article.seoTitle || article.title;
  const description = article.seoDescription || article.excerpt;
  const canonicalPath = `/learn/${article.slug}`;
  return {
    title,
    description,
    alternates: { canonical: canonicalPath },
    robots: { index: true, follow: true },
    ...editorialSocialMetadata({ title, description, canonicalPath, label: articleTopicLabel(article.topic), updatedAt: article.updatedAt }),
  };
}

export default async function ArticlePage({ params }: { params: Promise<{ slug: string }> }) {
  const slug = (await params).slug;
  const [article, editorialMeta] = await Promise.all([getPublishedArticle(slug), getPublicEditorialMeta(slug)]);
  if (!article) notFound();

  const gearLinks = await getGearLinks(article.id);

  const related = (await getPublishedArticles())
    .filter((entry) => entry.topic === article.topic && entry.slug !== article.slug)
    .slice(0, 3);

  const articleLd = {
    "@context": "https://schema.org",
    "@type": "Article",
    headline: article.title,
    description: article.excerpt,
    author: editorialAuthorSchema(editorialMeta),
    datePublished: editorialMeta.publishedAt ?? article.publishedAt,
    dateModified: editorialMeta.updatedAt ?? article.updatedAt,
    publisher: { "@type": "Organization", name: "Natura" },
    mainEntityOfPage: `/learn/${article.slug}`,
    ...(article.imageUrl ? { image: article.imageUrl } : {}),
    articleSection: articleTopicLabel(article.topic),
    wordCount: article.sections.reduce((total, section) => total + section.body.split(/\s+/).length, 0),
  };
  const breadcrumbLd = breadcrumbSchema([
    { name: "Home", item: "/" },
    { name: "Learn", item: "/learn" },
    { name: article.title, item: `/learn/${article.slug}` },
  ]);

  return (
    <main id="main-content">
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify([articleLd, breadcrumbLd]).replace(/</g, "\\u003c") }}
      />

      <section className="article-hero">
        <div className="site-container">
          <Link className="back-link" href="/learn">← Learn</Link>
          <p className="eyebrow"><LeafIcon /> {article.eyebrow || articleTopicLabel(article.topic)}</p>
          <h1>{article.title}</h1>
          <p className="article-lead">{article.excerpt}</p>
          <div className="article-facts">
            <span>{articleTopicLabel(article.topic)}</span>
            <span>{article.readingTimeMinutes} min read</span>
            {article.lastReviewedOn && (
              <span>Reviewed {new Intl.DateTimeFormat("en", { dateStyle: "medium" }).format(new Date(article.lastReviewedOn))}</span>
            )}
          </div>
        </div>
      </section>

      <ArticleByline meta={editorialMeta} />

      <div className="site-container">
        <AdSlot placement="leaderboard" label="Before the article body" />
      </div>

      <section className="section site-container article-layout">
        <div className="article-main">
          {article.keyTakeaways.length > 0 && (
            <aside className="article-takeaways" aria-labelledby="article-takeaways-heading">
              <h2 id="article-takeaways-heading">In short</h2>
              <ul>
                {article.keyTakeaways.map((takeaway) => <li key={takeaway}>{takeaway}</li>)}
              </ul>
            </aside>
          )}

          {article.overview && <p className="article-overview">{article.overview}</p>}

          <GearCallout links={gearLinks} variant="lead" />

          {article.sections.map((section, index) => (
            <section key={section.heading}>
              <h2>{section.heading}</h2>
              {section.body.split(/\n{2,}/).map((paragraph) => <p key={paragraph.slice(0, 40)}>{paragraph}</p>)}
              {index === 1 && <GearCallout links={gearLinks} variant="card" />}
              {index === 1 && <AdSlot placement="inline" label="After the second section of an article" />}
            </section>
          ))}

          <AdSlot placement="inline" label="After the article body" />

          {article.sources.length > 0 && (
            <section className="article-sources public-source-list">
              <p className="eyebrow">Sources</p>
              <h2>References used</h2>
              <ol>
                {article.sources.map((source) => (
                  <li key={`${source.title}-${source.url ?? ""}`}>
                    {source.url ? <a href={source.url} rel="noopener noreferrer" target="_blank">{source.title}</a> : source.title}
                  </li>
                ))}
              </ol>
            </section>
          )}
        </div>

        <aside className="article-side-rail">
          {related.length > 0 && (
            <section>
              <p className="eyebrow">More on {articleTopicLabel(article.topic).toLowerCase()}</p>
              {related.map((entry) => (
                <Link href={`/learn/${entry.slug}`} key={entry.slug}>
                  {entry.title}
                  <ArrowIcon />
                </Link>
              ))}
            </section>
          )}
          <section className="article-side-tools">
            <p className="eyebrow">Put it into practice</p>
            <Link href="/tools/plant-finder">Find a plant for your space <ArrowIcon /></Link>
            <Link href="/plant-care/problems">Diagnose a symptom <ArrowIcon /></Link>
            <Link href="/grow">Browse plant guides <ArrowIcon /></Link>
          </section>
        </aside>
      </section>
    </main>
  );
}
