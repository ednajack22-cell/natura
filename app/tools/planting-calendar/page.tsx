import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { calendarSpaceFromProfile, getGardenProfile } from "@/lib/garden-profile";
import { calendarClimateOptions, calendarHemisphereOptions, calendarSpaceOptions, getMonthlyTasks, getSeasonTool, type CalendarClimate, type CalendarHemisphere, type CalendarSpace } from "@/lib/season-tools";

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"] as const;
const climateLabels: Record<CalendarClimate, string> = { general: "General / not sure", temperate: "Temperate", mediterranean: "Mediterranean", continental: "Continental", tropical: "Tropical" };
const hemisphereLabels: Record<CalendarHemisphere, string> = { both: "Not sure / both", northern: "Northern Hemisphere", southern: "Southern Hemisphere" };
const spaceLabels: Record<CalendarSpace, string> = { all: "Any growing space", balcony: "Balcony", container: "Containers", garden: "In-ground garden", indoor: "Indoors" };

function option<T extends string>(value: string | undefined, options: readonly T[], fallback: T): T {
  return options.includes(value as T) ? value as T : fallback;
}

export async function generateMetadata(): Promise<Metadata> {
  const tool = await getSeasonTool("planting-calendar");
  return { title: tool.seoTitle, description: tool.seoDescription, alternates: { canonical: "/tools/planting-calendar" } };
}

export default async function PlantingCalendarToolPage({ searchParams }: { searchParams: Promise<{ show?: string; month?: string; climate?: string; hemisphere?: string; space?: string }> }) {
  const [params, gardenProfile] = await Promise.all([searchParams, getGardenProfile()]);
  const submitted = params.show === "1";
  const parsedMonth = Number.parseInt(params.month ?? String(new Date().getMonth() + 1), 10);
  const month = Number.isFinite(parsedMonth) ? Math.max(1, Math.min(parsedMonth, 12)) : 1;
  const climate = option(params.climate, calendarClimateOptions, gardenProfile?.climate ?? "general");
  const hemisphere = option(params.hemisphere, calendarHemisphereOptions, gardenProfile?.hemisphere ?? "both");
  const space = option(params.space, calendarSpaceOptions, gardenProfile ? calendarSpaceFromProfile(gardenProfile.space) : "all");
  const needsHemisphere = submitted && hemisphere === "both" && climate !== "general" && climate !== "tropical";
  const [tool, response] = await Promise.all([getSeasonTool("planting-calendar"), submitted && !needsHemisphere ? getMonthlyTasks({ month, climate, hemisphere, space }) : Promise.resolve(null)]);
  const structuredData = { "@context": "https://schema.org", "@type": "WebApplication", name: tool.title, description: tool.seoDescription, applicationCategory: "LifestyleApplication", operatingSystem: "Any", offers: { "@type": "Offer", price: "0", priceCurrency: "USD" } };
  const result = response?.result;
  const exactContext = (result?.contextScore ?? 0) >= 90;

  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(structuredData).replace(/</g, "\\u003c") }} />
    <section className="finder-hero calculator-hero season-hero"><div className="site-container finder-hero-grid"><div>
      <nav className="breadcrumbs" aria-label="Breadcrumb"><Link href="/tools">Tools</Link><span aria-hidden="true">/</span><span aria-current="page">Monthly planting tasks</span></nav>
      <p className="eyebrow"><LeafIcon /> Seasonal planning tool</p><h1>{tool.title}</h1><p className="profile-lead">{tool.excerpt}</p>
    </div><aside className="finder-method-note"><span>How the context works</span><p>{tool.overview}</p></aside></div></section>
    <section className="section site-container finder-layout calculator-layout">
      <form className="finder-form" method="get" action="/tools/planting-calendar"><input type="hidden" name="show" value="1" />{gardenProfile && <p className="personalization-note"><span>Starting with your saved garden profile.</span><Link href="/tools/garden-profile">Edit profile</Link></p>}<div className="finder-form-heading"><p className="eyebrow">Month and context</p><h2>Find the closest published calendar.</h2></div><div className="finder-field-grid">
        <label htmlFor="calendar-month"><span>Month</span><select id="calendar-month" name="month" defaultValue={month}>{months.map((label, index) => <option value={index + 1} key={label}>{label}</option>)}</select></label>
        <label htmlFor="calendar-climate"><span>Broad climate</span><select id="calendar-climate" name="climate" defaultValue={climate}>{calendarClimateOptions.map((item) => <option value={item} key={item}>{climateLabels[item]}</option>)}</select><small>Choose “General” if you are unsure.</small></label>
        <label htmlFor="calendar-hemisphere"><span>Hemisphere</span><select id="calendar-hemisphere" name="hemisphere" defaultValue={hemisphere}>{calendarHemisphereOptions.map((item) => <option value={item} key={item}>{hemisphereLabels[item]}</option>)}</select><small>Required for temperate, Mediterranean, and continental seasons.</small></label>
        <label htmlFor="calendar-space"><span>Growing space</span><select id="calendar-space" name="space" defaultValue={space}>{calendarSpaceOptions.map((item) => <option value={item} key={item}>{spaceLabels[item]}</option>)}</select></label>
      </div><button className="button button-primary" type="submit">Show monthly tasks <ArrowIcon /></button></form>
      <div className="calculator-results" aria-live="polite">
        {!submitted && <div className="finder-empty"><span>01</span><h2>Your monthly task list will appear here.</h2><p>Natura will identify the published calendar used and tell you when your requested context is only a close match.</p></div>}
        {needsHemisphere && <div className="finder-empty"><span>↕</span><h2>Choose Northern or Southern Hemisphere.</h2><p>The same month belongs to opposite seasons across the equator, so Natura will not guess this part of your context.</p></div>}
        {submitted && result && <><div className="finder-results-heading"><div><p className="eyebrow">{months[month - 1]} plan</p><h2>{result.tasks.length ? `${result.tasks.length} useful tasks` : "No tasks found"}</h2></div><span className={`context-match ${exactContext ? "exact" : "closest"}`}>{exactContext ? "Strong context match" : "Closest available context"}</span></div>
          {response.source === "fallback" && <p className="finder-status" role="status"><strong>Local calendar shown.</strong> The database function was unavailable, so Natura used the same published-calendar matching rules locally.</p>}
          <article className="season-context"><div><small>Calendar used</small><strong>{result.calendarTitle}</strong></div><div><small>Published context</small><strong>{result.calendarClimate || "Not specified"} · {result.calendarHemisphere || "Not specified"} hemisphere · {result.calendarSpace || "Not specified"}</strong></div><p>{result.scopeNote || "Always adjust timing with current local conditions."}</p></article>
          {result.tasks.length > 0 ? <div className="season-task-list">{result.tasks.map((task, index) => <article className="season-task-card" key={task.id}><span>{String(index + 1).padStart(2, "0")}</span><div><p>{task.activityType} · {task.priority} priority</p><h3>{task.title}</h3><p>{task.description}</p></div></article>)}</div> : <div className="finder-empty season-empty"><span>00</span><h3>No published task for this month.</h3><p>Try another month or review the complete calendar below.</p></div>}
          {result.warnings.length > 0 && <aside className="calculator-assumptions"><strong>Timing limits</strong><ul>{result.warnings.map((warning) => <li key={warning}>{warning}</li>)}</ul></aside>}
          {result.calendarSlug && <Link className="text-link season-source-link" href={`/planting-calendar/calendars/${result.calendarSlug}`}>Open the complete published calendar <ArrowIcon /></Link>}
        </>}
      </div>
    </section>
    <section className="site-container finder-limits"><div><p className="eyebrow eyebrow-light">Cold-night decision</p><h2>Check the forecast before acting.</h2></div><div><p>A monthly calendar cannot predict a local cold night. If temperatures may approach your plant’s tolerance, use a trusted forecast in the frost tool.</p><Link className="button button-light" href="/tools/frost-risk">Check frost risk <ArrowIcon /></Link><Link className="calendar-method-link" href="/research/calendar-methodology">Read how Natura adapts external sources</Link></div></section>
  </main>;
}
