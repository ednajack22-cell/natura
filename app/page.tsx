import Image from "next/image";
import Link from "next/link";
import { ArrowIcon, LeafIcon, SearchIcon } from "@/components/icons";
import { PlantCard } from "@/components/plant-card";
import { getPublishedPlants } from "@/lib/plant-content";

const pathways = [
  { number: "01", title: "Choose the right plant", text: "Match light, space, season, and available time before you buy.", href: "/grow", className: "path-featured" },
  { number: "02", title: "Read the symptoms", text: "Compare likely causes before reaching for a treatment.", href: "/plant-care", className: "" },
  { number: "03", title: "Plan the season", text: "Build a useful planting rhythm around your local conditions.", href: "/planting-calendar", className: "" },
];

export default async function Home() {
  const plants = await getPublishedPlants();
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
              <div><strong>{plants.length}</strong><span>complete starter profiles</span></div>
              <div><strong>100%</strong><span>small-space focused</span></div>
              <div><strong>0</strong><span>miracle claims</span></div>
            </div>
          </div>

          <div className="premium-hero-media">
            <Image
              src="/images/natura-balcony-hero.png"
              alt="A thriving edible balcony garden in warm morning light"
              fill
              priority
              sizes="(max-width: 980px) 100vw, 52vw"
            />
            <div className="hero-media-shade" />
            <div className="hero-journal-card">
              <span>Today in the garden</span>
              <strong>Check soil moisture before the afternoon heat.</strong>
              <small>2 minute task · Container care</small>
            </div>
            <div className="hero-season-pill"><span>Late summer</span><strong>Grow with the light you have</strong></div>
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
          <div><p className="eyebrow">The first collection</p><h2 id="featured-plants">Start with plants that earn their space.</h2></div>
          <div><p>Every profile connects light, pot size, watering, timing, and common problems in one practical view.</p><Link className="text-link" href="/grow">Browse the growing library <ArrowIcon /></Link></div>
        </div>
        <div className="plant-grid">
          {plants.map((plant, index) => <PlantCard plant={plant} priority={index === 0} key={plant.slug} />)}
        </div>
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
          <div className="seasonal-copy"><p className="eyebrow">Seasonal intelligence</p><h2>Your garden changes every week. Your advice should too.</h2><p>Planting calendars and care reminders will adapt recommendations to climate, exposure, and growing space.</p><Link className="button button-primary" href="/planting-calendar">Explore the calendar <ArrowIcon /></Link></div>
          <div className="seasonal-list"><article><span>Now</span><div><strong>Observe</strong><p>Light, heat, wind, and soil moisture.</p></div></article><article><span>Next</span><div><strong>Act</strong><p>Choose the smallest useful intervention.</p></div></article><article><span>Later</span><div><strong>Learn</strong><p>Record what changed and improve the next cycle.</p></div></article></div>
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
