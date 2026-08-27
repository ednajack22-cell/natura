import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { articleTopics, getPublishedArticles } from "@/lib/article-content";
import { breadcrumbSchema } from "@/lib/editorial-meta";

export const revalidate = 3600;

export const metadata: Metadata = {
  title: "Learn",
  description:
    "Explanatory gardening articles: how plants actually work, what growing media are made of, and how conditions change through the year.",
  alternates: { canonical: "/learn" },
};

export default async function LearnPage() {
  const articles = await getPublishedArticles();

  const breadcrumbLd = breadcrumbSchema([
    { name: "Home", item: "/" },
    { name: "Learn", item: "/learn" },
  ]);

  const byTopic = articleTopics
    .map((topic) => ({ ...topic, articles: articles.filter((article) => article.topic === topic.value) }))
    .filter((topic) => topic.articles.length > 0);

  return (
    <main id="main-content">
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(breadcrumbLd).replace(/</g, "\\u003c") }}
      />

      <section className="learn-hero">
        <div className="site-container">
          <p className="eyebrow"><LeafIcon /> Understand what you are growing</p>
          <h1>Learn</h1>
          <p className="learn-lead">
            Not every question starts with a problem or a plan. These articles explain how plants respond to light,
            water and temperature, what growing media are actually made of, and why the same advice stops working when
            conditions change.
          </p>
        </div>
      </section>

      <section className="section site-container">
        {articles.length === 0 ? (
          <div className="learn-empty">
            <h2>The first articles are being written.</h2>
            <p>
              In the meantime, the plant guides and the diagnostic library already cover a great deal of the same
              ground.
            </p>
            <div className="learn-empty-links">
              <Link className="button button-primary" href="/grow">Browse plant guides <ArrowIcon /></Link>
              <Link className="button button-secondary" href="/plant-care/problems">Diagnose a problem <ArrowIcon /></Link>
            </div>
          </div>
        ) : (
          byTopic.map((topic) => (
            <section className="learn-topic" key={topic.value}>
              <div className="learn-topic-heading">
                <div>
                  <p className="eyebrow">{topic.label}</p>
                  <h2>{topic.description}</h2>
                </div>
                <span>{topic.articles.length} article{topic.articles.length === 1 ? "" : "s"}</span>
              </div>
              <div className="learn-card-grid">
                {topic.articles.map((article) => (
                  <article className="learn-card" key={article.slug}>
                    <Link href={`/learn/${article.slug}`}>
                      <p className="eyebrow">{article.eyebrow || topic.label}</p>
                      <h3>{article.title}</h3>
                      <p>{article.excerpt}</p>
                      <footer>
                        <span>{article.readingTimeMinutes} min read</span>
                        <ArrowIcon />
                      </footer>
                    </Link>
                  </article>
                ))}
              </div>
            </section>
          ))
        )}
      </section>
    </main>
  );
}
