import "server-only";

import { getPublishedCalendars } from "@/lib/calendar-content";
import { getPublishedGuides } from "@/lib/guide-content";
import { getPublishedPlants } from "@/lib/plant-content";
import { getPublishedProblems } from "@/lib/problem-content";
import { getPublishedReviews } from "@/lib/review-content";
import { pinterestImagePath } from "@/lib/social-discovery";

export type DiscoveryCollection = "plants" | "problems" | "guides" | "calendars" | "reviews";
type DiscoveryItem = { title: string; description: string; path: string; label: string; updatedAt?: string };

async function safe<T>(load: () => Promise<T[]>) {
  try { return await load(); } catch { return []; }
}

export async function getDiscoveryItems(collection?: DiscoveryCollection): Promise<DiscoveryItem[]> {
  const [plants, problems, guides, calendars, reviews] = await Promise.all([
    !collection || collection === "plants" ? safe(getPublishedPlants) : [],
    !collection || collection === "problems" ? safe(getPublishedProblems) : [],
    !collection || collection === "guides" ? safe(getPublishedGuides) : [],
    !collection || collection === "calendars" ? safe(getPublishedCalendars) : [],
    !collection || collection === "reviews" ? safe(getPublishedReviews) : [],
  ]);
  return [
    ...plants.map((item) => ({ title: item.seoTitle || item.name, description: item.seoDescription || item.description, path: `/plants/${item.slug}`, label: "Plant growing guide", updatedAt: item.updatedAt })),
    ...problems.map((item) => ({ title: item.seoTitle || item.title, description: item.seoDescription || item.excerpt, path: `/plant-care/problems/${item.slug}`, label: "Plant problem guide", updatedAt: item.updatedAt })),
    ...guides.map((item) => ({ title: item.seoTitle || item.title, description: item.seoDescription || item.excerpt, path: `/small-space-gardening/guides/${item.slug}`, label: "Small-space project", updatedAt: item.updatedAt })),
    ...calendars.map((item) => ({ title: item.seoTitle || item.title, description: item.seoDescription || item.excerpt, path: `/planting-calendar/calendars/${item.slug}`, label: "Planting calendar", updatedAt: item.updatedAt })),
    ...reviews.map((item) => ({ title: item.seoTitle || item.title, description: item.seoDescription || item.excerpt, path: `/reviews/${item.slug}`, label: "Independent comparison", updatedAt: item.updatedAt })),
  ].sort((left, right) => Date.parse(right.updatedAt || "2000-01-01") - Date.parse(left.updatedAt || "2000-01-01"));
}

function xml(value: string) {
  return value.replaceAll("&", "&amp;").replaceAll("<", "&lt;").replaceAll(">", "&gt;").replaceAll('"', "&quot;").replaceAll("'", "&apos;");
}

export function buildRssFeed(base: string, feedPath: string, title: string, description: string, items: DiscoveryItem[]) {
  const entries = items.map((item) => {
    const url = `${base}${item.path}`;
    const image = `${base}${pinterestImagePath(item)}`;
    const published = new Date(item.updatedAt || "2000-01-01T00:00:00.000Z").toUTCString();
    return `<item><title>${xml(item.title)}</title><link>${xml(url)}</link><guid isPermaLink="true">${xml(url)}</guid><description>${xml(item.description)}</description><pubDate>${published}</pubDate><media:content url="${xml(image)}" medium="image" type="image/png" width="1000" height="1500" /></item>`;
  }).join("");
  return `<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/"><channel><title>${xml(title)}</title><link>${xml(base)}</link><description>${xml(description)}</description><language>en</language><atom:link href="${xml(`${base}${feedPath}`)}" rel="self" type="application/rss+xml" />${entries}</channel></rss>`;
}

export const feedLabels: Record<DiscoveryCollection, { title: string; description: string }> = {
  plants: { title: "Natura plant growing guides", description: "Practical plant profiles for containers, balconies, patios, and indoor spaces." },
  problems: { title: "Natura plant problem guides", description: "Observation-first guides to plant symptoms, possible causes, checks, and careful actions." },
  guides: { title: "Natura small-space gardening projects", description: "Source-visible, step-by-step projects for compact growing spaces." },
  calendars: { title: "Natura planting calendars", description: "Climate, hemisphere, and space-aware monthly gardening guidance." },
  reviews: { title: "Natura independent comparisons", description: "Transparent gardening comparisons with methods, evidence limits, and visible sources." },
};
