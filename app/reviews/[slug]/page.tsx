import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { LeafIcon, ArrowIcon } from "@/components/icons";
import { ArticleByline } from "@/components/article-byline";
import { AdSlot } from "@/components/ad-slot";
import { getPublishedReview, getPublishedReviews } from "@/lib/review-content";
import { breadcrumbSchema, editorialAuthorSchema, getPublicEditorialMeta } from "@/lib/editorial-meta";
import { editorialSocialMetadata } from "@/lib/social-discovery";
import { isCommercialRelationship, productLinkNotice, productLinkRel } from "@/lib/monetization";

/**
 * Prerender every published item at build time. Wrapped because a build must
 * not fail when the database is unreachable: returning no parameters simply
 * defers each page to its first request, where the same cache then applies.
 */
export async function generateStaticParams() {
  try {
    return (await getPublishedReviews()).map((entry) => ({ slug: entry.slug }));
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
  const review = await getPublishedReview((await params).slug);
  if (!review) return {};
  const title = review.seoTitle || review.title;
  const description = review.seoDescription || review.excerpt;
  const canonicalPath = `/reviews/${review.slug}`;
  return {
    title,
    description,
    alternates: { canonical: canonicalPath },
    robots: { index: true, follow: true },
    ...editorialSocialMetadata({ title, description, canonicalPath, label: "Independent comparison", updatedAt: review.updatedAt }),
  };
}

export default async function ReviewDetailPage({ params }: { params: Promise<{ slug: string }> }) {
  const slug = (await params).slug;
  const [review, editorialMeta] = await Promise.all([getPublishedReview(slug), getPublicEditorialMeta(slug)]);
  if (!review) notFound();

  const commercial = isCommercialRelationship(review.disclosureType);
  const linkRel = productLinkRel(review.disclosureType);
  const linkNotice = productLinkNotice(review.disclosureType);

  const articleLd = {
    "@context": "https://schema.org",
    "@type": "Article",
    headline: review.title,
    description: review.excerpt,
    author: editorialAuthorSchema(editorialMeta),
    datePublished: editorialMeta.publishedAt,
    dateModified: editorialMeta.updatedAt ?? review.updatedAt,
    publisher: { "@type": "Organization", name: "Natura" },
    mainEntityOfPage: `/reviews/${review.slug}`,
  };
  const noteList = (items: string[]) =>
    items.length
      ? {
          "@type": "ItemList",
          itemListElement: items.map((item, index) => ({ "@type": "ListItem", position: index + 1, name: item })),
        }
      : undefined;

  const itemListLd = {
    "@context": "https://schema.org",
    "@type": "ItemList",
    name: review.title,
    itemListOrder: "https://schema.org/ItemListOrderDescending",
    numberOfItems: review.products.length,
    itemListElement: review.products.map((product, index) => ({
      "@type": "ListItem",
      position: index + 1,
      item: {
        "@type": "Product",
        name: product.name,
        ...(product.brand ? { brand: { "@type": "Brand", name: product.brand } } : {}),
        ...(product.model ? { model: product.model } : {}),
        ...(product.imageUrl ? { image: product.imageUrl } : {}),
        ...(product.productUrl ? { url: product.productUrl } : {}),
        review: {
          "@type": "Review",
          name: product.verdictLabel || `${product.name} review`,
          reviewRating: {
            "@type": "Rating",
            ratingValue: product.overallScore,
            bestRating: 10,
            worstRating: 0,
          },
          author: editorialAuthorSchema(editorialMeta),
          datePublished: editorialMeta.publishedAt,
          ...(noteList(product.pros) ? { positiveNotes: noteList(product.pros) } : {}),
          ...(noteList(product.cons) ? { negativeNotes: noteList(product.cons) } : {}),
        },
      },
    })),
  };

  const breadcrumbLd = breadcrumbSchema([
    { name: "Home", item: "/" },
    { name: "Reviews", item: "/reviews" },
    { name: review.title, item: `/reviews/${review.slug}` },
  ]);

  return (
    <main id="main-content">
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify([articleLd, itemListLd, breadcrumbLd]).replace(/</g, "\\u003c") }}
      />

      <section className="review-detail-hero">
        <div className="site-container review-detail-grid">
          <div>
            <Link className="back-link" href="/reviews">← Review library</Link>
            <p className="eyebrow"><LeafIcon /> Transparent comparison</p>
            <h1>{review.title}</h1>
            <p>{review.excerpt}</p>
            <div className="review-evidence-tags">
              <span>{review.reviewType}</span>
              <span>{review.evidenceLevel === "researched" ? "Research-based — not hands-on" : review.evidenceLevel}</span>
              <span>Updated {new Intl.DateTimeFormat("en", { dateStyle: "medium" }).format(new Date(review.updatedAt))}</span>
            </div>
          </div>
          <aside>
            <span>Our verdict</span>
            <strong>{review.verdict}</strong>
          </aside>
        </div>
      </section>

      <ArticleByline meta={editorialMeta} />

      <section className="site-container review-disclosure" aria-label="Commercial disclosure">
        <strong>Commercial disclosure</strong>
        <p>{review.disclosureText}</p>
        {commercial ? (
          <p className="review-disclosure-plain">
            Some links below are {review.disclosureType} links. Using them costs you nothing extra and never changes
            our scores, which are set before any link is added.
          </p>
        ) : null}
      </section>

      <section className="section site-container review-detail-layout">
        <div className="review-detail-main">
          <p className="eyebrow">Context</p>
          <h2>What this comparison can—and cannot—tell you.</h2>
          <p className="diagnostic-overview">{review.overview}</p>

          <section className="review-comparison">
            <div className="review-section-heading">
              <div>
                <p className="eyebrow">Side by side</p>
                <h2>Comparison summary</h2>
              </div>
              <span>Scores /10</span>
            </div>
            <div className="review-table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>Option</th>
                    <th>Overall</th>
                    {review.criteria.map((criterion) => <th key={criterion.id}>{criterion.name}</th>)}
                    <th><span className="sr-only">Where to buy</span></th>
                  </tr>
                </thead>
                <tbody>
                  {review.products.map((product) => (
                    <tr key={product.id}>
                      <th>
                        {product.name}
                        {product.recommended && <small>Recommended</small>}
                      </th>
                      <td><strong>{product.overallScore.toFixed(1)}</strong></td>
                      {review.criteria.map((criterion) => (
                        <td key={criterion.id}>{product.scores[criterion.id]?.toFixed(1) ?? "—"}</td>
                      ))}
                      <td className="review-table-action">
                        {product.productUrl ? (
                          <a href={product.productUrl} rel={linkRel} target="_blank">
                            Check price
                            <span className="sr-only"> for {product.name} (opens in a new tab)</span>
                          </a>
                        ) : "—"}
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </section>

          <AdSlot placement="inline" label="Between the comparison table and the detailed findings" />

          <section className="review-products">
            <p className="eyebrow">Detailed findings</p>
            <h2>Strengths, limits, and fit.</h2>
            {review.products.map((product, index) => (
              <article key={product.id} className={product.recommended ? "recommended" : ""}>
                <header>
                  <span>{String(index + 1).padStart(2, "0")}</span>
                  <div>
                    <small>{product.verdictLabel}</small>
                    <h3>{product.name}</h3>
                    <p>{product.priceNote}</p>
                  </div>
                  <strong>{product.overallScore.toFixed(1)}<small>/10</small></strong>
                </header>
                <div className="review-pros-cons">
                  <div>
                    <h4>Strengths</h4>
                    <ul>{product.pros.map((item) => <li key={item}>{item}</li>)}</ul>
                  </div>
                  <div>
                    <h4>Limits</h4>
                    <ul>{product.cons.map((item) => <li key={item}>{item}</li>)}</ul>
                  </div>
                </div>
                {Object.keys(product.specifications).length > 0 && (
                  <dl>
                    {Object.entries(product.specifications).map(([key, value]) => (
                      <div key={key}>
                        <dt>{key}</dt>
                        <dd>{value}</dd>
                      </div>
                    ))}
                  </dl>
                )}
                {product.productUrl && (
                  <div className="review-product-cta">
                    <a className="button button-buy" href={product.productUrl} rel={linkRel} target="_blank">
                      Check current price
                      <span className="sr-only"> for {product.name} (opens in a new tab)</span>
                      <ArrowIcon />
                    </a>
                    {linkNotice ? <small>{linkNotice}</small> : <small>Editorial reference — we earn nothing from this link.</small>}
                  </div>
                )}
              </article>
            ))}
          </section>

          <section className="review-method">
            <p className="eyebrow">Method</p>
            <h2>How we assessed the options.</h2>
            <p>{review.methodology}</p>
            <div>
              {review.criteria.map((criterion) => (
                <article key={criterion.id}>
                  <strong>{criterion.name}<span>{criterion.weight}%</span></strong>
                  <p>{criterion.description}</p>
                </article>
              ))}
            </div>
          </section>

          {review.sources.length > 0 && (
            <section className="article-sources">
              <p className="eyebrow">Sources</p>
              <h2>References used</h2>
              <ol>
                {review.sources.map((source) => (
                  <li key={`${source.title}-${source.url ?? ""}`}>
                    {source.url ? <a href={source.url} rel="noopener noreferrer" target="_blank">{source.title}</a> : source.title}
                  </li>
                ))}
              </ol>
            </section>
          )}
        </div>

        <aside className="review-side-rail">
          <section>
            <p className="eyebrow">Best suited to</p>
            <ul>{review.bestFor.map((item) => <li key={item}>{item}</li>)}</ul>
          </section>
          <section>
            <p className="eyebrow">Evidence record</p>
            <dl>
              <div><dt>Evidence</dt><dd>{review.evidenceLevel}</dd></div>
              <div><dt>Relationship</dt><dd>{review.disclosureType}</dd></div>
              {review.testingPeriod && <div><dt>Period</dt><dd>{review.testingPeriod}</dd></div>}
              {review.testedOn && <div><dt>Tested</dt><dd>{review.testedOn}</dd></div>}
            </dl>
          </section>
        </aside>
      </section>
    </main>
  );
}
