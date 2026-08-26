import type { MetadataRoute } from "next";
import { getPublishedCalendars } from "@/lib/calendar-content";
import { getPublishedGuides } from "@/lib/guide-content";
import { getPublishedPlants } from "@/lib/plant-content";
import { getPublishedProblems } from "@/lib/problem-content";
import { getPublishedReviews } from "@/lib/review-content";
import { getPublishedInstitutionalPages } from "@/lib/institutional-content";

const routes = ["", "/grow", "/small-space-gardening", "/small-space-gardening/guides", "/plant-care", "/plant-care/problems", "/planting-calendar", "/planting-calendar/calendars", "/research/calendar-methodology", "/tools", "/tools/garden-profile", "/tools/plant-finder", "/tools/planting-calendar", "/tools/frost-risk", "/tools/garden-planner", "/tools/guided-diagnosis", "/tools/pot-size-calculator", "/tools/watering-calculator", "/reviews", "/search", "/start-here"];

export default async function sitemap(): Promise<MetadataRoute.Sitemap> {
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? "http://localhost:3000";
  const [plants, problems, guides, calendars, reviews, institutionalPages] = await Promise.all([getPublishedPlants(), getPublishedProblems(), getPublishedGuides(), getPublishedCalendars(), getPublishedReviews(), getPublishedInstitutionalPages()]);
  const dynamicRoutes = [
    ...plants.map((plant) => `/plants/${plant.slug}`),
    ...problems.map((problem) => `/plant-care/problems/${problem.slug}`),
    ...guides.map((guide) => `/small-space-gardening/guides/${guide.slug}`),
    ...calendars.map((calendar) => `/planting-calendar/calendars/${calendar.slug}`),
    ...reviews.map((review) => `/reviews/${review.slug}`),
    ...institutionalPages.map((page) => `/${page.slug}`),
  ];
  return [...routes, ...dynamicRoutes].map((route) => ({
    url: `${base}${route}`,
    lastModified: new Date(),
    changeFrequency: route === "" ? "weekly" : "monthly",
    priority: route === "" ? 1 : dynamicRoutes.includes(route) ? .8 : .7,
  }));
}
