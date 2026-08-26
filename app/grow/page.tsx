import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { PlantCard } from "@/components/plant-card";
import { getPublishedPlants } from "@/lib/plant-content";

/**
 * Published content changes when an editor publishes, not per visitor, so the
 * rendered page is cached and refreshed hourly. Editing an item revalidates its
 * path immediately, so this is only the ceiling on staleness.
 */
export const revalidate = 3600;


export const metadata: Metadata = { title: "Plant growing guides", description: "Practical growing guides for productive plants that fit balconies, windowsills, patios, and containers.", alternates: { canonical: "/grow" } };

const filters = ["All plants", "Vegetables", "Herbs", "Fruit", "Easy starters", "Full sun"];

export default async function GrowPage() {
  const plants = await getPublishedPlants();
  return <main id="main-content">
    <section className="library-hero"><div className="site-container library-hero-grid"><div><p className="eyebrow"><LeafIcon /> Plant library</p><h1>Choose a plant that fits <em>your real life.</em></h1><p>Start with light, space, season, and the time you can realistically give. The right plant is easier to care for from day one.</p><Link className="button button-primary" href="/start-here">Find your starting point <ArrowIcon /></Link></div><aside className="library-note"><span>Before you choose</span><strong>Watch your space for one full day.</strong><p>Note when direct sun arrives, when it leaves, and where wind is strongest.</p></aside></div></section>
    <section className="section site-container"><div className="library-toolbar"><div><p className="eyebrow">Curated collection</p><h2>Plants worth the space they take.</h2></div><div className="filter-row" aria-label="Plant categories">{filters.map((filter, index) => <span className={index === 0 ? "active" : ""} key={filter}>{filter}</span>)}</div></div><div className="plant-grid">{plants.map((plant) => <PlantCard plant={plant} key={plant.slug} />)}</div></section>
    <section className="site-container library-principle"><p className="eyebrow eyebrow-light">The Natura standard</p><h2>No universal recipes.</h2><p>Every guide explains the conditions behind the recommendation, the signs to observe, and when advice may need to change.</p></section>
  </main>;
}
