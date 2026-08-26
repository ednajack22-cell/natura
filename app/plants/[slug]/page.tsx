import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { ArticleByline } from "@/components/article-byline";
import { PinterestSaveLink } from "@/components/pinterest-save-link";
import { getPublishedPlant, getPublishedPlants } from "@/lib/plant-content";
import { getProblemsForPlantSlug } from "@/lib/problem-content";
import { getGuidesForPlantSlug } from "@/lib/guide-content";
import { getCalendarsForPlantSlug } from "@/lib/calendar-content";
import { breadcrumbSchema, editorialAuthorSchema, getPublicEditorialMeta } from "@/lib/editorial-meta";
import { editorialSocialMetadata } from "@/lib/social-discovery";

/**
 * Prerender every published item at build time. Wrapped because a build must
 * not fail when the database is unreachable: returning no parameters simply
 * defers each page to its first request, where the same cache then applies.
 */
export async function generateStaticParams() {
  try {
    return (await getPublishedPlants()).map((entry) => ({ slug: entry.slug }));
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


const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"] as const;

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const slug = (await params).slug;
  const plant = await getPublishedPlant(slug);
  if (!plant) return {};
  const title = plant.seoTitle || `${plant.name} growing guide`;
  const description = plant.seoDescription || plant.description;
  const canonicalPath = `/plants/${plant.slug}`;
  return { title, description, alternates: { canonical: canonicalPath }, ...editorialSocialMetadata({ title, description, canonicalPath, label: "Plant growing guide", updatedAt: plant.updatedAt, originalImage: { url: plant.image, alt: plant.imageAlt } }) };
}

export default async function PlantPage({ params }: { params: Promise<{ slug: string }> }) {
  const slug = (await params).slug;
  const currentMonth = new Date().getMonth() + 1;
  const [plant, relatedProblems, relatedGuides, relatedCalendars, editorialMeta] = await Promise.all([getPublishedPlant(slug), getProblemsForPlantSlug(slug), getGuidesForPlantSlug(slug), getCalendarsForPlantSlug(slug), getPublicEditorialMeta(slug)]);
  if (!plant) notFound();
  const currentCalendarTasks = relatedCalendars.flatMap((calendar) => calendar.entries.filter((entry) => entry.month === currentMonth).map((entry) => ({ ...entry, calendar })));
  const structuredData = [
    { "@context": "https://schema.org", "@type": "Article", headline: `${plant.name} growing guide`, description: plant.description, image: plant.image, about: { "@type": "Thing", name: plant.botanicalName }, author: editorialAuthorSchema(editorialMeta), datePublished: editorialMeta.publishedAt, dateModified: editorialMeta.updatedAt ?? plant.updatedAt, publisher: { "@type": "Organization", name: "Natura" }, mainEntityOfPage: `/plants/${plant.slug}` },
    breadcrumbSchema([{ name: "Home", item: "/" }, { name: "Plants", item: "/grow" }, { name: plant.name, item: `/plants/${plant.slug}` }]),
  ];
  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(structuredData).replace(/</g, "\\u003c") }} />
    <section className="plant-profile-hero"><div className="site-container plant-profile-grid"><div className="plant-profile-media"><Image src={plant.image} alt={plant.imageAlt} fill preload sizes="(max-width: 900px) 100vw, 48vw" /><span>{plant.category}</span></div><div className="plant-profile-copy"><Link className="back-link" href="/grow">← Plant library</Link><p className="eyebrow"><LeafIcon /> Complete growing guide</p><h1>{plant.name}</h1><p className="plant-latin">{plant.botanicalName}</p><p className="profile-lead">{plant.description}</p><div className="profile-tags">{plant.suitableFor.map((item) => <span key={item}>{item}</span>)}</div></div></div></section>
    <ArticleByline meta={editorialMeta} />
    <PinterestSaveLink title={plant.seoTitle || `${plant.name} growing guide`} description={plant.seoDescription || plant.description} canonicalPath={`/plants/${plant.slug}`} label="Plant growing guide" />
    <section className="site-container profile-facts" aria-label="Essential growing facts"><article><span>Difficulty</span><strong>{plant.difficulty}</strong></article><article><span>Direct light</span><strong>{plant.sunlight}</strong></article><article><span>Container</span><strong>{plant.potSize}</strong></article><article><span>Water</span><strong>{plant.watering}</strong></article><article><span>First harvest</span><strong>{plant.harvest}</strong></article></section>
    <nav className="site-container profile-section-nav" aria-label="On this growing guide"><span>On this page</span><a href="#growing-method">Growing method</a>{relatedProblems.length > 0 && <a href="#problems">Problems</a>}{relatedGuides.length > 0 && <a href="#projects">Projects</a>}{relatedCalendars.length > 0 && <a href="#seasonal-timing">Seasonal timing</a>}{plant.sources.length > 0 && <a href="#sources">Sources</a>}</nav>
    {currentCalendarTasks.length > 0 && <section className="site-container plant-now-panel" aria-labelledby="plant-now-heading"><div><p className="eyebrow">Useful in {months[currentMonth - 1]}</p><h2 id="plant-now-heading">Calendar priorities for this growing context.</h2><p>This plant is linked to a broader container calendar. A task may concern the surrounding garden rather than this plant directly; local heat, frost, wind, and root-zone moisture still decide the timing.</p></div><div className="plant-now-tasks">{currentCalendarTasks.slice(0, 3).map((task) => <article key={task.id}><span>{task.activityType.replaceAll("-", " ")}</span><h3>{task.title}</h3><p>{task.description}</p><Link href={`/planting-calendar/calendars/${task.calendar.slug}?month=${currentMonth}#selected-month`}>Open {months[currentMonth - 1]} calendar <ArrowIcon /></Link></article>)}</div></section>}
    <section className="section site-container profile-content" id="growing-method"><div className="profile-main"><p className="eyebrow">The growing method</p><h2>Give it the conditions it needs.</h2><div className="care-steps">{plant.care.map((step, index) => <article key={step.title}><span>0{index + 1}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</div></div><aside className="profile-aside"><div className="season-card"><span>Best growing window</span><strong>{plant.season}</strong><p>Adjust this timing to your local temperatures and exposure.</p></div><div className="watch-card"><p className="eyebrow">Watch for</p>{plant.watchFor.map((item) => <article key={item.title}><h3>{item.title}</h3><p>{item.text}</p></article>)}</div></aside></section>
    <section className="site-container profile-next"><div><p className="eyebrow eyebrow-light">Keep learning</p><h2>Observation is your best gardening tool.</h2><p>Use symptoms, recent weather, and soil moisture together before changing your care routine.</p></div><div className="profile-next-actions"><Link className="button button-light" href="/tools/plant-finder">Find another plant <ArrowIcon /></Link><Link className="button button-light" href="/plant-care">Explore plant care <ArrowIcon /></Link></div></section>
    {relatedProblems.length > 0 && <section className="section site-container related-problems" id="problems"><div className="split-heading"><div><p className="eyebrow">Problems connected to this plant</p><h2>Compare symptoms before you treat.</h2></div><p>These diagnostic guides include {plant.name.toLowerCase()} among the plants that may show similar symptoms.</p></div><div className="related-problem-links">{relatedProblems.map((problem) => <Link href={`/plant-care/problems/${problem.slug}`} key={problem.id}><span>{problem.category}</span><strong>{problem.title}</strong><ArrowIcon /></Link>)}</div></section>}
    {relatedGuides.length > 0 && <section className="section site-container related-problems" id="projects"><div className="split-heading"><div><p className="eyebrow">Projects using this plant</p><h2>Put the growing profile into practice.</h2></div><p>These step-by-step guides include {plant.name.toLowerCase()} in their suggested plant selection.</p></div><div className="related-problem-links">{relatedGuides.map((guide) => <Link href={`/small-space-gardening/guides/${guide.slug}`} key={guide.id}><span>{guide.guideType}</span><strong>{guide.title}</strong><ArrowIcon /></Link>)}</div></section>}
    {relatedCalendars.length > 0 && <section className="section site-container related-problems" id="seasonal-timing"><div className="split-heading"><div><p className="eyebrow">Seasonal timing</p><h2>Place this plant in a monthly routine.</h2></div><p>These calendars connect {plant.name.toLowerCase()} to tasks adapted to climate and growing space.</p></div><div className="related-problem-links">{relatedCalendars.map((calendar) => <Link href={`/planting-calendar/calendars/${calendar.slug}`} key={calendar.id}><span>{calendar.climate} · {calendar.spaceType}</span><strong>{calendar.title}</strong><ArrowIcon /></Link>)}</div></section>}
    {plant.sources.length > 0 && <section className="section site-container article-sources public-source-list" id="sources"><p className="eyebrow">Sources</p><h2>References used for this guide</h2><ol>{plant.sources.map((source) => <li key={`${source.title}-${source.url ?? ""}`}>{source.url ? <a href={source.url} rel="noreferrer" target="_blank">{source.title}</a> : source.title}</li>)}</ol></section>}
  </main>;
}
