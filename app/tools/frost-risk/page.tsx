import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { frostExposureFromProfile, getGardenProfile, profileUsesContainers } from "@/lib/garden-profile";
import { assessFrostRisk, frostExposureOptions, getSeasonTool, toleranceOptions, type FrostExposure, type PlantTolerance } from "@/lib/season-tools";

const toleranceLabels: Record<PlantTolerance, string> = { tender: "Tender — protect before frost", "half-hardy": "Half-hardy — tolerates light cold", hardy: "Hardy — broad frost tolerance" };
const exposureLabels: Record<FrostExposure, string> = { sheltered: "Sheltered", open: "Open and exposed", windy: "Frequently windy" };
const riskLabels: Record<string, string> = { low: "Low indicated risk", watch: "Watch conditions", high: "High risk", critical: "Critical protection decision" };

function option<T extends string>(value: string | undefined, options: readonly T[], fallback: T): T {
  return options.includes(value as T) ? value as T : fallback;
}

export async function generateMetadata(): Promise<Metadata> {
  const tool = await getSeasonTool("frost-risk");
  return { title: tool.seoTitle, description: tool.seoDescription, alternates: { canonical: "/tools/frost-risk" } };
}

export default async function FrostRiskPage({ searchParams }: { searchParams: Promise<{ check?: string; low?: string; tolerance?: string; exposure?: string; container?: string }> }) {
  const [params, gardenProfile] = await Promise.all([searchParams, getGardenProfile()]);
  const submitted = params.check === "1";
  const parsedLow = Number.parseFloat(params.low ?? "2");
  const forecastLowC = Number.isFinite(parsedLow) ? Math.max(-30, Math.min(parsedLow, 20)) : 2;
  const tolerance = option(params.tolerance, toleranceOptions, "tender");
  const exposure = option(params.exposure, frostExposureOptions, gardenProfile ? frostExposureFromProfile(gardenProfile.exposure) : "sheltered");
  const containerized = submitted ? params.container === "1" : gardenProfile ? profileUsesContainers(gardenProfile.space) : true;
  const [tool, response] = await Promise.all([getSeasonTool("frost-risk"), submitted ? assessFrostRisk({ forecastLowC, tolerance, exposure, containerized }) : Promise.resolve(null)]);
  const structuredData = { "@context": "https://schema.org", "@type": "WebApplication", name: tool.title, description: tool.seoDescription, applicationCategory: "LifestyleApplication", operatingSystem: "Any", offers: { "@type": "Offer", price: "0", priceCurrency: "USD" } };
  const result = response?.result;

  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(structuredData).replace(/</g, "\\u003c") }} />
    <section className="finder-hero calculator-hero frost-hero"><div className="site-container finder-hero-grid"><div>
      <nav className="breadcrumbs" aria-label="Breadcrumb"><Link href="/tools">Tools</Link><span aria-hidden="true">/</span><span aria-current="page">Frost risk check</span></nav>
      <p className="eyebrow"><LeafIcon /> Cold-weather tool</p><h1>{tool.title}</h1><p className="profile-lead">{tool.excerpt}</p>
    </div><aside className="finder-method-note"><span>Forecast required</span><p>{tool.overview}</p></aside></div></section>
    <section className="section site-container finder-layout calculator-layout">
      <form className="finder-form" method="get" action="/tools/frost-risk"><input type="hidden" name="check" value="1" />{gardenProfile && <p className="personalization-note"><span>Exposure and container context start from your saved profile.</span><Link href="/tools/garden-profile">Edit profile</Link></p>}<div className="finder-form-heading"><p className="eyebrow">Tonight’s conditions</p><h2>Use a current local forecast.</h2><p>Enter the forecast minimum, not the current temperature.</p></div><div className="finder-field-grid">
        <label htmlFor="frost-low"><span>Forecast minimum (°C)</span><input id="frost-low" name="low" type="number" min="-30" max="20" step="0.5" defaultValue={forecastLowC} required /><small>Copy this from a trusted, recently updated local source.</small></label>
        <label htmlFor="frost-tolerance"><span>Plant tolerance</span><select id="frost-tolerance" name="tolerance" defaultValue={tolerance}>{toleranceOptions.map((item) => <option value={item} key={item}>{toleranceLabels[item]}</option>)}</select></label>
        <label htmlFor="frost-exposure"><span>Exposure</span><select id="frost-exposure" name="exposure" defaultValue={exposure}>{frostExposureOptions.map((item) => <option value={item} key={item}>{exposureLabels[item]}</option>)}</select></label>
        <label className="season-checkbox" htmlFor="frost-container"><input id="frost-container" name="container" type="checkbox" value="1" defaultChecked={containerized} /><span>Plant is growing in a container</span></label>
      </div><button className="button button-primary" type="submit">Assess this forecast <ArrowIcon /></button></form>
      <div className="calculator-results" aria-live="polite">
        {!submitted && <div className="finder-empty"><span>01</span><h2>Your cautious risk assessment will appear here.</h2><p>This tool does not fetch or predict weather. It interprets the temperature you provide with plant and exposure context.</p></div>}
        {submitted && result && <><div className="finder-results-heading"><div><p className="eyebrow">Protection decision</p><h2>{riskLabels[result.riskLevel] ?? result.riskLevel}</h2></div><span className={`frost-score ${result.riskLevel}`}>{result.riskScore}<small>/ 6</small></span></div>
          {response.source === "fallback" && <p className="finder-status" role="status"><strong>Local assessment shown.</strong> The database function was unavailable, so Natura applied the same cautious rules locally.</p>}
          <article className={`frost-risk-card ${result.riskLevel}`}><div><small>Entered forecast low</small><strong>{forecastLowC}°C</strong></div><div><small>Broad caution threshold</small><strong>{result.thresholdC}°C</strong></div><p>{result.explanation}</p></article>
          <p className="calculator-warning" role="note"><strong>Recheck the forecast.</strong> Duration, local cold pockets, plant age, wet foliage, acclimation, and cultivar can change the real outcome.</p>
          <div className="calculator-guidance"><h3>Actions for these inputs</h3><ol>{result.actions.map((action, index) => <li key={action}><span>{String(index + 1).padStart(2, "0")}</span><p>{action}</p></li>)}</ol></div>
          <aside className="calculator-assumptions"><strong>Assumptions and limits</strong><ul>{result.assumptions.map((assumption) => <li key={assumption}>{assumption}</li>)}</ul></aside>
        </>}
      </div>
    </section>
    <section className="site-container finder-limits"><div><p className="eyebrow eyebrow-light">After the cold night</p><h2>Return to the monthly plan.</h2></div><div><p>Once immediate protection is handled, use the seasonal calendar to review sowing, planting, care, harvest, and protection work for the month.</p><Link className="button button-light" href="/tools/planting-calendar">View monthly tasks <ArrowIcon /></Link></div></section>
  </main>;
}
