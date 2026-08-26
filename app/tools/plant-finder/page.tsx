import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { finderSpaceFromProfile, getGardenProfile } from "@/lib/garden-profile";
import {
  finderCareOptions,
  finderCategoryOptions,
  finderClimateOptions,
  finderDifficultyOptions,
  finderSortOptions,
  finderSpaceOptions,
  findSuitablePlants,
  getPlantFinderTool,
  type FinderCare,
  type FinderCategory,
  type FinderClimate,
  type FinderDifficulty,
  type FinderSort,
  type FinderSpace,
} from "@/lib/plant-finder";

export async function generateMetadata(): Promise<Metadata> {
  const tool = await getPlantFinderTool();
  return {
    title: tool.seoTitle,
    description: tool.seoDescription,
    alternates: { canonical: "/tools/plant-finder" },
  };
}

const spaceLabels: Record<FinderSpace, string> = { any: "Any compact space", windowsill: "Windowsill", balcony: "Balcony", patio: "Patio", indoor: "Indoors", container: "Container garden" };
const careLabels: Record<FinderCare, string> = { low: "Low — occasional attention", regular: "Regular — a few checks each week", attentive: "Attentive — frequent checks" };
const climateLabels: Record<FinderClimate, string> = { general: "Not sure / general", temperate: "Temperate", mediterranean: "Mediterranean", continental: "Continental", tropical: "Tropical" };
const categoryLabels: Record<FinderCategory, string> = { all: "All plant types", vegetable: "Vegetables", herb: "Herbs", fruit: "Fruit" };
const difficultyLabels: Record<FinderDifficulty, string> = { any: "Any difficulty", easy: "Easy", moderate: "Moderate" };
const sortLabels: Record<FinderSort, string> = { match: "Best match first", name: "Plant name A–Z", ease: "Easiest first" };

function selectOption<T extends string>(value: string | undefined, options: readonly T[], fallback: T): T {
  return options.includes(value as T) ? value as T : fallback;
}

function matchLabel(score: number) {
  if (score >= 85) return "Strong match";
  if (score >= 60) return "Workable match";
  return "Limited match";
}

export default async function PlantFinderPage({ searchParams }: { searchParams: Promise<{ find?: string; sun?: string; space?: string; care?: string; climate?: string; category?: string; difficulty?: string; sort?: string }> }) {
  const [params, gardenProfile] = await Promise.all([searchParams, getGardenProfile()]);
  const hasSubmitted = params.find === "1";
  const numericSun = Number.parseInt(params.sun ?? String(gardenProfile?.sunHours ?? 4), 10);
  const sunHours = [2, 4, 6, 8].includes(numericSun) ? numericSun : 4;
  const space = selectOption(params.space, finderSpaceOptions, gardenProfile ? finderSpaceFromProfile(gardenProfile.space) : "any");
  const care = selectOption(params.care, finderCareOptions, "regular");
  const climate = selectOption(params.climate, finderClimateOptions, gardenProfile?.climate ?? "general");
  const category = selectOption(params.category, finderCategoryOptions, "all");
  const difficulty = selectOption(params.difficulty, finderDifficultyOptions, "any");
  const sort = selectOption(params.sort, finderSortOptions, "match");
  const [tool, response] = await Promise.all([
    getPlantFinderTool(),
    hasSubmitted ? findSuitablePlants({ sunHours, space, care, climate, category, difficulty, sort }) : Promise.resolve(null),
  ]);
  const structuredData = {
    "@context": "https://schema.org",
    "@type": "WebApplication",
    name: tool.title,
    description: tool.seoDescription,
    applicationCategory: "LifestyleApplication",
    operatingSystem: "Any",
    offers: { "@type": "Offer", price: "0", priceCurrency: "USD" },
  };

  return (
    <main id="main-content">
      <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(structuredData).replace(/</g, "\\u003c") }} />
      <section className="finder-hero">
        <div className="site-container finder-hero-grid">
          <div>
            <nav className="breadcrumbs" aria-label="Breadcrumb"><Link href="/tools">Tools</Link><span aria-hidden="true">/</span><span aria-current="page">Plant finder</span></nav>
            <p className="eyebrow"><LeafIcon /> Interactive tool</p>
            <h1>{tool.title}</h1>
            <p className="profile-lead">{tool.excerpt}</p>
          </div>
          <aside className="finder-method-note">
            <span>How matching works</span>
            <p>{tool.overview}</p>
          </aside>
        </div>
      </section>

      <section className="section site-container finder-layout">
        <form className="finder-form" method="get" action="/tools/plant-finder">
          <input type="hidden" name="find" value="1" />
          {gardenProfile && <p className="personalization-note"><span>Light, climate, and space start from your saved profile.</span><Link href="/tools/garden-profile">Edit profile</Link></p>}
          <div className="finder-form-heading"><p className="eyebrow">Your conditions</p><h2>Describe the space you actually have.</h2><p>Choose the closest answer. You can run the finder again as conditions change.</p></div>
          <div className="finder-field-grid">
            <label htmlFor="finder-sun"><span>Direct sunlight per day</span><select id="finder-sun" name="sun" defaultValue={String(sunHours)}><option value="2">About 2 hours</option><option value="4">About 4 hours</option><option value="6">About 6 hours</option><option value="8">8 hours or more</option></select><small>Count direct sun on leaves, not general daylight.</small></label>
            <label htmlFor="finder-space"><span>Growing space</span><select id="finder-space" name="space" defaultValue={space}>{finderSpaceOptions.map((option) => <option value={option} key={option}>{spaceLabels[option]}</option>)}</select><small>Pick the setup that creates the strongest constraint.</small></label>
            <label htmlFor="finder-care"><span>Care rhythm</span><select id="finder-care" name="care" defaultValue={care}>{finderCareOptions.map((option) => <option value={option} key={option}>{careLabels[option]}</option>)}</select><small>Be realistic about watering and observation time.</small></label>
            <label htmlFor="finder-climate"><span>Broad climate</span><select id="finder-climate" name="climate" defaultValue={climate}>{finderClimateOptions.map((option) => <option value={option} key={option}>{climateLabels[option]}</option>)}</select><small>This does not replace local frost or heat information.</small></label>
            <label htmlFor="finder-category"><span>Plant type</span><select id="finder-category" name="category" defaultValue={category}>{finderCategoryOptions.map((option) => <option value={option} key={option}>{categoryLabels[option]}</option>)}</select><small>Use this to focus the shortlist on a crop group.</small></label>
            <label htmlFor="finder-difficulty"><span>Difficulty</span><select id="finder-difficulty" name="difficulty" defaultValue={difficulty}>{finderDifficultyOptions.map((option) => <option value={option} key={option}>{difficultyLabels[option]}</option>)}</select><small>Difficulty is based on the complete Natura growing profile.</small></label>
            <label htmlFor="finder-sort"><span>Sort results</span><select id="finder-sort" name="sort" defaultValue={sort}>{finderSortOptions.map((option) => <option value={option} key={option}>{sortLabels[option]}</option>)}</select><small>Matching score remains visible with every sorting method.</small></label>
          </div>
          <div className="finder-form-actions"><button className="button button-primary" type="submit">Find suitable plants <ArrowIcon /></button><Link href="/tools/plant-finder">Reset filters</Link></div>
        </form>

        <div className="finder-results" aria-live="polite">
          {!hasSubmitted && <div className="finder-empty"><span>01</span><h2>Your shortlist will appear here.</h2><p>We compare light, space, care effort, and broad climate. Every result includes its score and the reasons behind it.</p></div>}
          {hasSubmitted && response && <>
            <div className="finder-results-heading"><div><p className="eyebrow">Your shortlist</p><h2>{response.results.length ? `${response.results.length} plants for these conditions.` : "No suitable plants found yet."}</h2></div><p>Scores compare the current Natura plant library, not every plant that exists.</p></div>
            <div className="finder-active-filters" aria-label="Selected plant finder conditions"><span>{sunHours}+ hours sun</span><span>{spaceLabels[space]}</span><span>{climateLabels[climate]}</span><span>{categoryLabels[category]}</span><span>{difficultyLabels[difficulty]}</span><span>{sortLabels[sort]}</span></div>
            {response.source === "fallback" && <p className="finder-status" role="status"><strong>Local recommendations shown.</strong> The live matching service was unavailable, so Natura used the same transparent rules against its starter plant library.</p>}
            {response.results.length > 0 ? <div className="finder-result-list">{response.results.map((plant, index) => <article className="finder-result-card" key={plant.slug}>
              <div className="finder-result-media"><Image src={plant.image} alt={plant.imageAlt} fill sizes="(max-width: 760px) 100vw, 260px" /><span>#{index + 1}</span></div>
              <div className="finder-result-copy"><div className="finder-result-title"><div><span>{plant.category}</span><h3>{plant.name}</h3><p>{plant.botanicalName}</p></div><div className={`finder-score score-${matchLabel(plant.score).split(" ")[0].toLowerCase()}`}><strong>{plant.score}</strong><span>/100</span><small>{matchLabel(plant.score)}</small></div></div><p>{plant.tagline}</p><ul>{plant.reasons.map((reason) => <li key={reason}>{reason}</li>)}</ul><div className="finder-facts"><span><small>Light</small>{plant.sunlight}</span><span><small>Container</small>{plant.potSize}</span><span><small>Care</small>{plant.difficulty}</span></div><Link className="text-link" href={`/plants/${plant.slug}`}>Open the complete growing guide <ArrowIcon /></Link></div>
            </article>)}</div> : <div className="finder-empty"><span>?</span><h3>Try a broader setup.</h3><p>Choose “Any compact space,” increase the available care level, or check again as the plant library grows.</p></div>}
          </>}
        </div>
      </section>

      <section className="site-container finder-limits"><div><p className="eyebrow eyebrow-light">Read before planting</p><h2>A shortlist, not a guarantee.</h2></div><ul><li>Measure direct sun over several days because buildings and seasons change exposure.</li><li>Use local frost, heat, and wind information before deciding when to plant.</li><li>Check the complete plant guide for container size, watering, and safety considerations.</li></ul></section>
    </main>
  );
}
