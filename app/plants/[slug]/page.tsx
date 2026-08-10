import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedPlant } from "@/lib/plant-content";
import { getProblemsForPlantSlug } from "@/lib/problem-content";
import { getGuidesForPlantSlug } from "@/lib/guide-content";
import { getCalendarsForPlantSlug } from "@/lib/calendar-content";

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> {
  const slug = (await params).slug;
  const plant = await getPublishedPlant(slug);
  if (!plant) return {};
  return { title: plant.seoTitle || `${plant.name} growing guide`, description: plant.seoDescription || plant.description, alternates: { canonical: `/plants/${plant.slug}` }, openGraph: { images: [{ url: plant.image, alt: plant.imageAlt }] } };
}

export default async function PlantPage({ params }: { params: Promise<{ slug: string }> }) {
  const slug = (await params).slug;
  const [plant, relatedProblems, relatedGuides, relatedCalendars] = await Promise.all([getPublishedPlant(slug), getProblemsForPlantSlug(slug), getGuidesForPlantSlug(slug), getCalendarsForPlantSlug(slug)]);
  if (!plant) notFound();
  const structuredData = { "@context": "https://schema.org", "@type": "Article", headline: `${plant.name} growing guide`, description: plant.description, image: plant.image, about: { "@type": "Thing", name: plant.botanicalName }, publisher: { "@type": "Organization", name: "Natura" } };
  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(structuredData).replace(/</g, "\\u003c") }} />
    <section className="plant-profile-hero"><div className="site-container plant-profile-grid"><div className="plant-profile-media"><Image src={plant.image} alt={plant.imageAlt} fill priority sizes="(max-width: 900px) 100vw, 48vw" /><span>{plant.category}</span></div><div className="plant-profile-copy"><Link className="back-link" href="/grow">← Plant library</Link><p className="eyebrow"><LeafIcon /> Complete growing guide</p><h1>{plant.name}</h1><p className="plant-latin">{plant.botanicalName}</p><p className="profile-lead">{plant.description}</p><div className="profile-tags">{plant.suitableFor.map((item) => <span key={item}>{item}</span>)}</div></div></div></section>
    <section className="site-container profile-facts" aria-label="Essential growing facts"><article><span>Difficulty</span><strong>{plant.difficulty}</strong></article><article><span>Direct light</span><strong>{plant.sunlight}</strong></article><article><span>Container</span><strong>{plant.potSize}</strong></article><article><span>Water</span><strong>{plant.watering}</strong></article><article><span>First harvest</span><strong>{plant.harvest}</strong></article></section>
    <section className="section site-container profile-content"><div className="profile-main"><p className="eyebrow">The growing method</p><h2>Give it the conditions it needs.</h2><div className="care-steps">{plant.care.map((step, index) => <article key={step.title}><span>0{index + 1}</span><div><h3>{step.title}</h3><p>{step.text}</p></div></article>)}</div></div><aside className="profile-aside"><div className="season-card"><span>Best growing window</span><strong>{plant.season}</strong><p>Adjust this timing to your local temperatures and exposure.</p></div><div className="watch-card"><p className="eyebrow">Watch for</p>{plant.watchFor.map((item) => <article key={item.title}><h3>{item.title}</h3><p>{item.text}</p></article>)}</div></aside></section>
    <section className="site-container profile-next"><div><p className="eyebrow eyebrow-light">Keep learning</p><h2>Observation is your best gardening tool.</h2><p>Use symptoms, recent weather, and soil moisture together before changing your care routine.</p></div><Link className="button button-light" href="/plant-care">Explore plant care <ArrowIcon /></Link></section>
    {relatedProblems.length > 0 && <section className="section site-container related-problems"><div className="split-heading"><div><p className="eyebrow">Problems connected to this plant</p><h2>Compare symptoms before you treat.</h2></div><p>These diagnostic guides include {plant.name.toLowerCase()} among the plants that may show similar symptoms.</p></div><div className="related-problem-links">{relatedProblems.map((problem) => <Link href={`/plant-care/problems/${problem.slug}`} key={problem.id}><span>{problem.category}</span><strong>{problem.title}</strong><ArrowIcon /></Link>)}</div></section>}
    {relatedGuides.length > 0 && <section className="section site-container related-problems"><div className="split-heading"><div><p className="eyebrow">Projects using this plant</p><h2>Put the growing profile into practice.</h2></div><p>These step-by-step guides include {plant.name.toLowerCase()} in their suggested plant selection.</p></div><div className="related-problem-links">{relatedGuides.map((guide) => <Link href={`/small-space-gardening/guides/${guide.slug}`} key={guide.id}><span>{guide.guideType}</span><strong>{guide.title}</strong><ArrowIcon /></Link>)}</div></section>}
    {relatedCalendars.length > 0 && <section className="section site-container related-problems"><div className="split-heading"><div><p className="eyebrow">Seasonal timing</p><h2>Place this plant in a monthly routine.</h2></div><p>These calendars connect {plant.name.toLowerCase()} to tasks adapted to climate and growing space.</p></div><div className="related-problem-links">{relatedCalendars.map((calendar) => <Link href={`/planting-calendar/calendars/${calendar.slug}`} key={calendar.id}><span>{calendar.climate} · {calendar.spaceType}</span><strong>{calendar.title}</strong><ArrowIcon /></Link>)}</div></section>}
  </main>;
}
