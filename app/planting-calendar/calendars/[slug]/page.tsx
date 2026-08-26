import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowIcon, DownloadIcon, LeafIcon } from "@/components/icons";
import { CalendarPdfSelector } from "@/components/calendar-pdf-selector";
import { ArticleByline } from "@/components/article-byline";
import { PinterestSaveLink } from "@/components/pinterest-save-link";
import { getPublishedCalendar } from "@/lib/calendar-content";
import { breadcrumbSchema, editorialAuthorSchema, getPublicEditorialMeta } from "@/lib/editorial-meta";
import { editorialSocialMetadata } from "@/lib/social-discovery";

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const activityLabels: Record<string, string> = { plan: "Plan", "sow-indoors": "Sow indoors", "sow-outdoors": "Sow outdoors", plant: "Plant", harvest: "Harvest", care: "Care", protect: "Protect" };

export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }): Promise<Metadata> { const calendar = await getPublishedCalendar((await params).slug); if (!calendar) return {}; const title = calendar.seoTitle || calendar.title; const description = calendar.seoDescription || calendar.excerpt; const canonicalPath = `/planting-calendar/calendars/${calendar.slug}`; return { title, description, alternates: { canonical: canonicalPath }, robots: { index: true, follow: true }, ...editorialSocialMetadata({ title, description, canonicalPath, label: "Planting calendar", updatedAt: calendar.updatedAt, originalImage: calendar.imageUrl ? { url: calendar.imageUrl, alt: calendar.imageAlt || calendar.title } : undefined }) }; }

export default async function CalendarPage({ params, searchParams }: { params: Promise<{ slug: string }>; searchParams: Promise<{ month?: string }> }) {
  const slug = (await params).slug;
  const [calendar, editorialMeta] = await Promise.all([getPublishedCalendar(slug), getPublicEditorialMeta(slug)]);
  if (!calendar) notFound();
  const requestedMonth = Number((await searchParams).month);
  const selectedMonth = Number.isInteger(requestedMonth) && requestedMonth >= 1 && requestedMonth <= 12 ? requestedMonth : new Date().getMonth() + 1;
  const visibleEntries = calendar.entries.filter((entry) => entry.month === selectedMonth);
  const jsonLd = [
    { "@context": "https://schema.org", "@type": "CollectionPage", name: calendar.title, description: calendar.excerpt, author: editorialAuthorSchema(editorialMeta), datePublished: editorialMeta.publishedAt, dateModified: editorialMeta.updatedAt ?? calendar.updatedAt, publisher: { "@type": "Organization", name: "Natura" }, mainEntityOfPage: `/planting-calendar/calendars/${calendar.slug}`, hasPart: calendar.entries.map((entry) => ({ "@type": "CreativeWork", name: `${months[entry.month - 1]}: ${entry.title}`, description: entry.description })) },
    breadcrumbSchema([{ name: "Home", item: "/" }, { name: "Planting calendar", item: "/planting-calendar" }, { name: "Calendars", item: "/planting-calendar/calendars" }, { name: calendar.title, item: `/planting-calendar/calendars/${calendar.slug}` }]),
  ];
  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd).replace(/</g, "\\u003c") }} />
    <section className="calendar-detail-hero"><div className="site-container calendar-detail-grid"><div><Link className="back-link" href="/planting-calendar/calendars">← Calendar library</Link><p className="eyebrow"><LeafIcon /> Twelve-month growing rhythm</p><h1>{calendar.title}</h1><p>{calendar.excerpt}</p><div className="calendar-context"><span>{calendar.climate}</span><span>{calendar.hemisphere} hemisphere</span><span>{calendar.spaceType}</span></div><div className="calendar-hero-actions"><a className="calendar-download-button" href={`/api/calendars/${calendar.slug}/pdf`}><DownloadIcon /> Download PDF</a><a href="#year-overview">View the full year</a></div></div><aside><span>Scope</span><strong>{calendar.scopeNote}</strong></aside></div></section>
    <ArticleByline meta={editorialMeta} />
    <PinterestSaveLink title={calendar.seoTitle || calendar.title} description={calendar.seoDescription || calendar.excerpt} canonicalPath={`/planting-calendar/calendars/${calendar.slug}`} label="Planting calendar" />
    <section className="section site-container calendar-detail-layout"><div className="calendar-main"><p className="eyebrow">Calendar method</p><h2>Read the month, then check reality.</h2><p className="diagnostic-overview">{calendar.overview}</p>
      <p className="calendar-research-link"><Link href="/research/calendar-methodology">Read the Natura research note and source register <ArrowIcon /></Link></p><section className="calendar-year-overview" id="year-overview"><div className="calendar-year-heading"><div><p className="eyebrow">Annual overview</p><h2>Your growing year at a glance.</h2></div><span>{calendar.entries.length} planned tasks</span></div><div className="calendar-year-grid">{months.map((month, index) => { const monthEntries = calendar.entries.filter((entry) => entry.month === index + 1); return <Link className={selectedMonth === index + 1 ? "active" : ""} href={`/planting-calendar/calendars/${calendar.slug}?month=${index + 1}#selected-month`} key={month}><div><span>{String(index + 1).padStart(2, "0")}</span><strong>{month}</strong><i>{monthEntries.length}</i></div><ul>{monthEntries.slice(0, 3).map((entry) => <li key={entry.id}>{entry.title}</li>)}</ul><small>{monthEntries.length > 3 ? `+${monthEntries.length - 3} more tasks` : "Open month"}</small></Link>; })}</div></section>
      <nav className="month-selector" aria-label="Choose a month">{months.map((month, index) => <Link aria-current={selectedMonth === index + 1 ? "page" : undefined} href={`/planting-calendar/calendars/${calendar.slug}?month=${index + 1}#selected-month`} key={month}><span>{String(index + 1).padStart(2, "0")}</span>{month.slice(0, 3)}</Link>)}</nav><section className="month-task-section" id="selected-month"><div><p className="eyebrow">Selected month</p><h2>{months[selectedMonth - 1]}</h2><span>{visibleEntries.length} task{visibleEntries.length === 1 ? "" : "s"}</span></div><div className="calendar-task-list">{visibleEntries.map((entry) => <article className={`priority-${entry.priority}`} key={entry.id}><div><span>{activityLabels[entry.activityType] ?? entry.activityType}</span><i>{entry.priority}</i></div><h3>{entry.title}</h3><p>{entry.description}</p></article>)}</div></section></div><aside className="calendar-side-rail"><CalendarPdfSelector slug={calendar.slug} initialMonth={selectedMonth} />{calendar.warnings.length > 0 && <section className="calendar-caution"><p className="eyebrow">Before acting</p>{calendar.warnings.map((warning) => <p key={warning}>{warning}</p>)}</section>}{calendar.relatedPlants.length > 0 && <section className="related-plants-card"><p className="eyebrow">Plants in this calendar</p><h2>Open the growing profiles.</h2>{calendar.relatedPlants.map((plant) => <Link href={`/plants/${plant.slug}`} key={plant.id}>{plant.title}<ArrowIcon /></Link>)}</section>}</aside></section>
  </main>;
}
