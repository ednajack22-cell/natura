import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedCalendars } from "@/lib/calendar-content";

export const metadata: Metadata = { title: "Dynamic planting calendars", description: "Explore month-by-month planting calendars by climate, hemisphere, and growing space.", alternates: { canonical: "/planting-calendar/calendars" }, robots: { index: true, follow: true } };

export default async function CalendarsPage({ searchParams }: { searchParams: Promise<{ climate?: string; space?: string }> }) {
  const calendars = await getPublishedCalendars();
  const filters = await searchParams;
  const climate = filters.climate ?? "all";
  const space = filters.space ?? "all";
  const climates = [...new Set(calendars.map((calendar) => calendar.climate))];
  const spaces = [...new Set(calendars.map((calendar) => calendar.spaceType))];
  const visible = calendars.filter((calendar) => (climate === "all" || calendar.climate === climate) && (space === "all" || calendar.spaceType === space));
  const filterHref = (nextClimate: string, nextSpace: string) => { const query = new URLSearchParams(); if (nextClimate !== "all") query.set("climate", nextClimate); if (nextSpace !== "all") query.set("space", nextSpace); return `/planting-calendar/calendars${query.size ? `?${query}` : ""}`; };
  return <main id="main-content"><section className="calendar-library-hero"><div className="site-container"><p className="eyebrow"><LeafIcon /> Condition-aware calendars</p><h1>Use the month.<br /><em>Confirm the conditions.</em></h1><p>Monthly guidance organised around climate, growing space, and observable weather—not dates treated as guarantees.</p></div></section><section className="section site-container"><div className="problem-library-heading"><div><p className="eyebrow">Calendar library</p><h2>Choose the closest useful context.</h2></div><p>{visible.length} calendar{visible.length === 1 ? "" : "s"} shown with twelve-month task coverage.</p></div><div className="calendar-filter-groups"><nav aria-label="Filter calendars by climate"><span>Climate</span><Link className={climate === "all" ? "active" : ""} href={filterHref("all", space)}>All</Link>{climates.map((item) => <Link className={climate === item ? "active" : ""} href={filterHref(item, space)} key={item}>{item}</Link>)}</nav><nav aria-label="Filter calendars by growing space"><span>Space</span><Link className={space === "all" ? "active" : ""} href={filterHref(climate, "all")}>All</Link>{spaces.map((item) => <Link className={space === item ? "active" : ""} href={filterHref(climate, item)} key={item}>{item}</Link>)}</nav></div>{visible.length ? <div className="calendar-card-grid">{visible.map((calendar) => <Link className="calendar-card" href={`/planting-calendar/calendars/${calendar.slug}`} key={calendar.id}><div><span>{calendar.climate}</span><i>{calendar.spaceType}</i></div><h2>{calendar.title}</h2><p>{calendar.excerpt}</p><dl><div><dt>Months</dt><dd>{new Set(calendar.entries.map((entry) => entry.month)).size}/12</dd></div><div><dt>Tasks</dt><dd>{calendar.entries.length}</dd></div><div><dt>Hemisphere</dt><dd>{calendar.hemisphere}</dd></div></dl><strong>Open calendar <ArrowIcon /></strong></Link>)}</div> : <div className="empty-results"><h2>No calendar matches these filters.</h2><p>Broaden the climate or growing-space selection.</p></div>}</section></main>;
}
