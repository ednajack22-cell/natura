import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";

export const metadata: Metadata = {
  title: "How Natura Builds Climate-Aware Garden Calendars",
  description: "Read Natura’s original research summary explaining frost-based, hemisphere-aware, and rainfall-aware garden calendar decisions.",
  alternates: { canonical: "/research/calendar-methodology" },
};

const sources = [
  {
    organisation: "University of Minnesota Extension",
    title: "Planting the vegetable garden",
    url: "https://extension.umn.edu/planting-and-growing-guides/planting-vegetable-garden",
    rightsUrl: "https://apps.extension.umn.edu/copyright.html",
    usedFor: "Soil temperature, cool- versus warm-season crops, and local frost timing.",
  },
  {
    organisation: "Colorado State University Extension",
    title: "Vegetable Gardening in the Mountains",
    url: "https://extension.colostate.edu/resource/vegetable-gardening-in-the-mountains/",
    rightsUrl: "https://marcomm.colostate.edu/copyright-guidelines/",
    usedFor: "Short frost-free seasons, cold-tolerant crops, elevation, wind, and maturity limits.",
  },
  {
    organisation: "Food and Agriculture Organization of the United Nations",
    title: "Food crop planting sequences",
    url: "https://www.fao.org/4/x3996e/x3996e36.htm",
    rightsUrl: "https://www.fao.org/publications/about-fao-publishing/permissions/",
    usedFor: "Rainy- and dry-season decisions, relay sowing, shade, irrigation, and continuous supply in tropical gardens.",
  },
  {
    organisation: "Royal Horticultural Society",
    title: "Vegetable seeds: sowing guide",
    url: "https://www.rhs.org.uk/vegetables/seeds-sowing",
    rightsUrl: "https://collections.rhs.org.uk/terms-and-conditions",
    usedFor: "Succession sowing, protected sowing, local light, and the limits of fixed dates.",
  },
] as const;

const decisions = [
  { number: "01", title: "A month is not a season everywhere", text: "January belongs to winter in much of the Northern Hemisphere and summer in much of the Southern Hemisphere. Natura therefore asks for hemisphere before matching a temperate, Mediterranean, or continental calendar." },
  { number: "02", title: "Frost and soil readiness outrank the date", text: "For frost-prone climates, a useful task depends on current forecasts, local frost estimates, workable soil, soil temperature, crop tolerance, and time to maturity. The month provides navigation, not permission." },
  { number: "03", title: "Tropical calendars follow water", text: "Across tropical regions, rainy and dry seasons begin in different months. Natura uses rainfall phase, drainage, humidity, storm risk, heat, and reliable irrigation instead of importing a northern spring-to-autumn pattern." },
  { number: "04", title: "Broad guidance remains adjustable", text: "Altitude, coast, urban heat, wind, container size, unusual weather, cultivar, and local restrictions can move a task by weeks. Every calendar therefore displays its scope and warnings." },
] as const;

export default function CalendarMethodologyPage() {
  const jsonLd = [
    { "@context": "https://schema.org", "@type": "Article", headline: "How Natura builds climate-aware garden calendars", description: metadata.description, author: { "@type": "Organization", name: "Natura Editorial Team" }, publisher: { "@type": "Organization", name: "Natura" }, mainEntityOfPage: "/research/calendar-methodology", citation: sources.map((source) => source.url) },
    { "@context": "https://schema.org", "@type": "BreadcrumbList", itemListElement: [{ "@type": "ListItem", position: 1, name: "Home", item: "/" }, { "@type": "ListItem", position: 2, name: "Planting calendar", item: "/planting-calendar" }, { "@type": "ListItem", position: 3, name: "Calendar methodology", item: "/research/calendar-methodology" }] },
  ];

  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd).replace(/</g, "\\u003c") }} />
    <section className="research-hero"><div className="site-container"><nav className="breadcrumbs" aria-label="Breadcrumb"><Link href="/planting-calendar">Planting calendar</Link><span aria-hidden="true">/</span><span aria-current="page">Research method</span></nav><p className="eyebrow"><LeafIcon /> Natura research note</p><h1>How we turn regional evidence into <em>adjustable calendars.</em></h1><p>This is an original Natura summary. It records the reasoning and provenance used by our calendars without reproducing the source publications.</p></div></section>
    <section className="section site-container research-layout"><article className="research-main"><div className="research-rights-note"><strong>No copied extension pages</strong><p>Natura paraphrases factual gardening principles and links to each publisher. Full source text, photography, tables, and branding remain on the publisher’s website unless explicit reuse permission is obtained.</p></div><p className="eyebrow">Editorial decisions</p><h2>Four rules prevent false precision.</h2><div className="research-decisions">{decisions.map((decision) => <section key={decision.number}><span>{decision.number}</span><div><h3>{decision.title}</h3><p>{decision.text}</p></div></section>)}</div></article><aside className="research-summary"><span>What Natura stores</span><ul><li>Original summaries written for Natura</li><li>Source title and organisation</li><li>Direct source and rights links</li><li>The decision each source supports</li></ul><Link className="button button-primary" href="/tools/planting-calendar">Use the calendar tool <ArrowIcon /></Link></aside></section>
    <section className="section site-container research-sources"><div className="split-heading"><div><p className="eyebrow">Source register</p><h2>Read the original evidence.</h2></div><p>Accessed for Natura’s calendar methodology in August 2026. Rights can change, so the publisher’s current terms remain authoritative.</p></div><div>{sources.map((source) => <article key={source.url}><span>{source.organisation}</span><h3>{source.title}</h3><p>{source.usedFor}</p><footer><a href={source.url} target="_blank" rel="noreferrer">Open source <ArrowIcon /></a><a href={source.rightsUrl} target="_blank" rel="noreferrer">Reuse terms</a></footer></article>)}</div></section>
  </main>;
}
