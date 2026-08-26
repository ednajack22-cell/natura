import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { ArrowIcon, LeafIcon, SearchIcon } from "@/components/icons";
import { PlantCard } from "@/components/plant-card";
import { getMostSearchedPlants } from "@/lib/plant-popularity";
import { calendarSpaceFromProfile, gardenClimateLabels, gardenHemisphereLabels, gardenSpaceLabels, getGardenProfile } from "@/lib/garden-profile";

export const revalidate = 3600;
export const metadata: Metadata = { alternates: { canonical: "/" } };

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"] as const;
const climatePathways = [
  { label: "Temperate", climate: "temperate" },
  { label: "Mediterranean", climate: "mediterranean" },
  { label: "Continental", climate: "continental" },
  { label: "Tropical", climate: "tropical" },
] as const;

const pathways = [
  { number: "01", title: "Choose the right plant", text: "Match light, space, season, and available time before you buy.", href: "/grow", className: "path-featured" },
  { number: "02", title: "Read the symptoms", text: "Compare likely causes before reaching for a treatment.", href: "/plant-care", className: "" },
  { number: "03", title: "Plan the season", text: "Build a useful planting rhythm around your local conditions.", href: "/planting-calendar", className: "" },
];

export default async function Home() {
  const month = new Date().getMonth() + 1;
  const [popularCollection, gardenProfile] = await Promise.all([getMostSearchedPlants(6), getGardenProfile()]);
  const plants = popularCollection.plants;
  const calendarHref = gardenProfile
    ? `/tools/planting-calendar?show=1&month=${month}&climate=${gardenProfile.climate}&hemisphere=${gardenProfile.hemisphere}&space=${calendarSpaceFromProfile(gardenProfile.space)}`
    : `/tools/planting-calendar?month=${month}&climate=general&hemisphere=both&space=all`;
  const profileContext = gardenProfile ? `${gardenClimateLabels[gardenProfile.climate]} · ${gardenHemisphereLabels[gardenProfile.hemisphere]} · ${gardenSpaceLabels[gardenProfile.space]}` : "Choose climate and growing space first";
  const seasonalActions = [
    { label: "01", title: "Choose a broad climate", text: "Start with the closest climate pattern, then refine the advice with local frost, heat, and rainfall." },
    { label: "02", title: "Set hemisphere and growing space", text: "North and south reverse the seasons, while a windowsill, balcony, container, and in-ground garden behave differently in the same city." },
    { label: "03", title: "Check current conditions", text: "Use a trusted local forecast and root-zone moisture before sowing, watering, planting, or protecting." },
  ];
  return (
    <main id="main-content">
      <section className="premium-hero">
        <div className="site-container premium-hero-grid">
          <div className="premium-hero-copy">
            <p className="eyebrow"><LeafIcon /> Gardening for real homes</p>
            <h1>A beautiful garden starts with <em>better decisions.</em></h1>
            <p className="hero-intro">Independent growing guidance for balconies, patios, windowsills, and containers—clear enough to use today, careful enough to trust.</p>
            <div className="hero-actions">
              <Link className="button button-primary" href="/grow">Explore plant guides <ArrowIcon /></Link>
              <Link className="button button-secondary" href="/search"><SearchIcon /> Search Natura</Link>
            </div>
            <div className="hero-proof">
              <div><strong>{popularCollection.totalPlants}</strong><span>complete starter profiles</span></div>
              <div><strong>100%</strong><span>small-space focused</span></div>
              <div><strong>0</strong><span>miracle claims</span></div>
            </div>
          </div>

          <div className="premium-hero-media">
            <Image
              src="/images/natura-balcony-hero.jpg"
              alt="A thriving edible balcony garden in warm morning light"
              fill
              preload
              sizes="(max-width: 980px) 100vw, 52vw"
            />
            <div className="hero-media-shade" />
            <div className="hero-journal-card">
              <span>{gardenProfile ? "Your saved garden profile" : "Plan for your location"}</span>
              <strong>{profileContext}</strong>
              <small>{months[month - 1]} · {gardenProfile ? `${gardenProfile.sunHours}+ hours sun · ${gardenProfile.exposure}` : "worldwide contexts · local checks required"}</small>
            </div>
            <div className="hero-season-pill"><span>{months[month - 1]}</span><strong>Plan from conditions, not dates</strong></div>
          </div>
        </div>
      </section>

      <section className="editorial-strip" aria-label="Natura principles">
        <div className="site-container editorial-strip-inner">
          <span>Field-tested structure</span><i />
          <span>Source-aware advice</span><i />
          <span>Designed for small spaces</span><i />
          <span>Honest product guidance</span>
        </div>
      </section>

      <section className="section site-container" aria-labelledby="featured-plants">
        <div className="split-heading">
          <div><p className="eyebrow">Popular plant guides</p><h2 id="featured-plants">The plants readers search for most.</h2></div>
          <div><p>The order is based on anonymous, aggregate searches made inside Natura. No reader identity or raw search history is displayed.</p><Link className="text-link" href="/grow">Browse the growing library <ArrowIcon /></Link></div>
        </div>
        <div className="plant-grid">
          {plants.map((plant, index) => <PlantCard plant={plant} priority={index === 0} key={plant.slug} />)}
        </div>
        <div className="collection-footer"><p>{popularCollection.rankedCount > 0 ? `Ranked from ${popularCollection.totalSearches} matched searches across the current leading guides; new slots use the wider starter library.` : "Search activity is still building, so starter guides fill the list until readers create a reliable ranking."}</p><Link className="button button-secondary" href="/grow">View all {popularCollection.totalPlants} plant profiles <ArrowIcon /></Link></div>
      </section>

      <section className="decision-section">
        <div className="site-container">
          <div className="decision-intro"><p className="eyebrow eyebrow-light">A calmer way to grow</p><h2>Start with the decision in front of you.</h2><p>Natura is organised around real gardening moments—not an endless list of disconnected articles.</p></div>
          <div className="decision-grid">
            {pathways.map((path) => (
              <Link className={`decision-card ${path.className}`} href={path.href} key={path.title}>
                <span>{path.number}</span><div><h3>{path.title}</h3><p>{path.text}</p></div><ArrowIcon />
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="section site-container seasonal-section">
        <div className="seasonal-card">
          <div className="seasonal-orbit" aria-hidden="true"><span /><span /><span /></div>
          <div className="seasonal-copy"><p className="eyebrow">{months[month - 1]} · {gardenProfile ? "your saved context" : "choose your context"}</p><h2>Seasonal guidance starts with where you grow.</h2><p>{gardenProfile ? `Natura will start from ${profileContext.toLowerCase()}, then keep local forecasts and observed conditions in control.` : "Natura does not treat one climate or hemisphere as the default. Select the closest broad context, then confirm every action against local conditions."}</p>{!gardenProfile && <div className="seasonal-climate-links" aria-label="Choose a broad climate">{climatePathways.map((item) => <Link href={`/tools/planting-calendar?month=${month}&climate=${item.climate}&hemisphere=both&space=all`} key={item.climate}>{item.label}</Link>)}</div>}<Link className="button button-primary" href={calendarHref}>{gardenProfile ? "Open my monthly plan" : "Choose climate, hemisphere, and space"} <ArrowIcon /></Link>{gardenProfile && <Link className="text-link" href="/tools/garden-profile">Edit my garden profile</Link>}</div>
          <div className="seasonal-list">{seasonalActions.map((action) => <article key={action.label}><span>{action.label}</span><div><strong>{action.title}</strong><p>{action.text}</p></div></article>)}</div>
        </div>
      </section>

      <section className="site-container premium-cta">
        <div><p className="eyebrow eyebrow-light">Natura is taking root</p><h2>Build a garden that fits your life.</h2></div>
        <p>Begin with a guided assessment of your light, space, climate, and available time.</p>
        <Link className="button button-light" href="/start-here">Start with Natura <ArrowIcon /></Link>
      </section>
    </main>
  );
}
