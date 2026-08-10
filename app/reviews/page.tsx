import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedReviews } from "@/lib/review-content";

export const metadata: Metadata = { title: "Reviews and comparisons", description: "Transparent gardening comparisons with visible methods, evidence levels, criteria, limits, and commercial disclosures.", alternates: { canonical: "/reviews" }, robots: { index: true, follow: true } };

const labels: Record<string, string> = { seeds: "Seeds", containers: "Containers", "soil-fertilizer": "Soil & fertilizer", "watering-systems": "Watering systems", "grow-lights": "Grow lights", "garden-tools": "Garden tools" };

export default async function ReviewsPage({ searchParams }: { searchParams: Promise<{ category?: string }> }) {
  const reviews = await getPublishedReviews();
  const category = (await searchParams).category ?? "all";
  const visible = reviews.filter((review) => category === "all" || review.category === category);
  const filterHref = (value: string) => value === "all" ? "/reviews" : `/reviews?category=${value}`;
  return <main id="main-content"><section className="review-library-hero"><div className="site-container"><p className="eyebrow"><LeafIcon /> Independent buying guidance</p><h1>Compare the evidence.<br /><em>Choose with confidence.</em></h1><p>Every Natura comparison states what was assessed, how the scores were formed, what we did not test, and whether a commercial relationship exists.</p></div></section><section className="section site-container"><div className="problem-library-heading"><div><p className="eyebrow">Review library</p><h2>Recommendations with visible reasoning.</h2></div><p>{visible.length} published comparison{visible.length === 1 ? "" : "s"}.</p></div><nav className="review-filters" aria-label="Filter reviews by category"><Link className={category === "all" ? "active" : ""} href={filterHref("all")}>All</Link>{Object.entries(labels).map(([value, label]) => <Link className={category === value ? "active" : ""} href={filterHref(value)} key={value}>{label}</Link>)}</nav>{visible.length ? <div className="review-card-grid">{visible.map((review) => <Link className="review-card" href={`/reviews/${review.slug}`} key={review.id}><div className="review-card-top"><span>{labels[review.category] ?? review.category}</span><i>{review.evidenceLevel === "researched" ? "Research-based" : review.evidenceLevel === "hands-on" ? "Hands-on" : "Long-term test"}</i></div><h2>{review.title}</h2><p>{review.excerpt}</p><dl><div><dt>Compared</dt><dd>{review.products.length} options</dd></div><div><dt>Criteria</dt><dd>{review.criteria.length}</dd></div><div><dt>Disclosure</dt><dd>{review.disclosureType}</dd></div></dl><strong>Read the comparison <ArrowIcon /></strong></Link>)}</div> : <div className="empty-results"><h2>No published review in this category yet.</h2><p>Choose another category or return to all comparisons.</p></div>}</section></main>;
}
