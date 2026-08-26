import "server-only";

import { getPublishedCalendars } from "@/lib/calendar-content";
import { readEditorialBody } from "@/lib/editorial";
import { createClient } from "@/lib/supabase/server";

export const calendarClimateOptions = ["general", "temperate", "mediterranean", "continental", "tropical"] as const;
export const calendarHemisphereOptions = ["both", "northern", "southern"] as const;
export const calendarSpaceOptions = ["all", "balcony", "container", "garden", "indoor"] as const;
export const toleranceOptions = ["tender", "half-hardy", "hardy"] as const;
export const frostExposureOptions = ["sheltered", "open", "windy"] as const;
export type CalendarClimate = (typeof calendarClimateOptions)[number];
export type CalendarHemisphere = (typeof calendarHemisphereOptions)[number];
export type CalendarSpace = (typeof calendarSpaceOptions)[number];
export type PlantTolerance = (typeof toleranceOptions)[number];
export type FrostExposure = (typeof frostExposureOptions)[number];

export type ToolEditorial = { title: string; excerpt: string; overview: string; seoTitle: string; seoDescription: string };
export type MonthlyTask = { id: string; activityType: string; title: string; description: string; priority: string };
export type MonthlyTasksResult = { tasks: MonthlyTask[]; calendarTitle: string; calendarSlug: string; calendarClimate: string; calendarHemisphere: string; calendarSpace: string; contextScore: number; scopeNote: string; warnings: string[] };
export type FrostResult = { thresholdC: number; riskLevel: string; riskScore: number; explanation: string; actions: string[]; assumptions: string[] };

const defaults: Record<"planting-calendar" | "frost-risk", ToolEditorial> = {
  "planting-calendar": { title: "Monthly planting tasks", excerpt: "See the most useful published sowing, planting, care, harvest, and protection tasks for a selected month and broad context.", overview: "This tool retrieves tasks from Natura published calendars and labels the climate and space context used. A close match is useful for planning, but temperature, frost, heat, and local forecasts still decide the timing.", seoTitle: "Monthly Planting Tasks by Climate and Space | Natura", seoDescription: "Explore published monthly planting and container-care tasks by broad climate and growing space, with context and timing limits." },
  "frost-risk": { title: "Frost risk check", excerpt: "Turn a trusted forecast low into a cautious plant-protection decision using tolerance, exposure, and container context.", overview: "Enter the minimum temperature from a current local forecast. Natura then combines it with a broad plant tolerance group, exposure, and container-root vulnerability. The result is a planning aid, not a weather forecast or survival guarantee.", seoTitle: "Plant Frost Risk Check for Pots and Gardens | Natura", seoDescription: "Assess broad frost risk from a trusted forecast low, plant tolerance, exposure, and container context, with cautious protection steps." },
};

export async function getSeasonTool(slug: keyof typeof defaults): Promise<ToolEditorial> {
  const fallback = defaults[slug];
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.from("content_items").select("title, excerpt, body, seo_title, seo_description").eq("content_type", "tool").eq("status", "published").eq("slug", slug).maybeSingle();
    if (error || !data) return fallback;
    const body = readEditorialBody(data.body);
    return { title: data.title, excerpt: data.excerpt ?? fallback.excerpt, overview: body.overview ?? fallback.overview, seoTitle: data.seo_title ?? fallback.seoTitle, seoDescription: data.seo_description ?? fallback.seoDescription };
  } catch { return fallback; }
}

async function fallbackMonthlyTasks(month: number, climate: CalendarClimate, hemisphere: CalendarHemisphere, space: CalendarSpace): Promise<MonthlyTasksResult> {
  const calendars = await getPublishedCalendars().catch(() => []);
  const ranked = calendars.map((calendar) => ({ calendar, score: (climate === calendar.climate ? 40 : climate === "general" || calendar.climate === "general" ? 25 : 5) + (hemisphere === calendar.hemisphere ? 30 : hemisphere === "both" || calendar.hemisphere === "both" ? 20 : 0) + (space === calendar.spaceType ? 30 : space === "all" || calendar.spaceType === "all" ? 20 : 5) })).sort((a, b) => b.score - a.score || a.calendar.title.localeCompare(b.calendar.title));
  const closest = ranked[0];
  if (!closest) return { tasks: [], calendarTitle: "No published calendar", calendarSlug: "", calendarClimate: "", calendarHemisphere: "", calendarSpace: "", contextScore: 0, scopeNote: "", warnings: ["No published calendar is currently available for this month."] };
  return { tasks: closest.calendar.entries.filter((entry) => entry.month === month).map((entry) => ({ id: entry.id, activityType: entry.activityType, title: entry.title, description: entry.description, priority: entry.priority })), calendarTitle: closest.calendar.title, calendarSlug: closest.calendar.slug, calendarClimate: closest.calendar.climate, calendarHemisphere: closest.calendar.hemisphere, calendarSpace: closest.calendar.spaceType, contextScore: closest.score, scopeNote: closest.calendar.scopeNote, warnings: closest.calendar.warnings };
}

export async function getMonthlyTasks(input: { month: number; climate: CalendarClimate; hemisphere: CalendarHemisphere; space: CalendarSpace }): Promise<{ result: MonthlyTasksResult; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("get_monthly_growing_tasks", { requested_month: input.month, requested_climate: input.climate, requested_hemisphere: input.hemisphere, requested_space: input.space, result_limit: 8 });
    const first = data?.[0];
    if (error || !first) return { result: await fallbackMonthlyTasks(input.month, input.climate, input.hemisphere, input.space), source: "fallback" };
    return { result: { tasks: data.map((row) => ({ id: row.entry_id, activityType: row.activity_type, title: row.title, description: row.description, priority: row.priority })), calendarTitle: first.calendar_title, calendarSlug: first.calendar_slug, calendarClimate: first.calendar_climate, calendarHemisphere: first.calendar_hemisphere, calendarSpace: first.calendar_space, contextScore: first.context_score, scopeNote: first.scope_note, warnings: first.warnings }, source: "database" };
  } catch { return { result: await fallbackMonthlyTasks(input.month, input.climate, input.hemisphere, input.space), source: "fallback" }; }
}

function fallbackFrost(input: { forecastLowC: number; tolerance: PlantTolerance; exposure: FrostExposure; containerized: boolean }): FrostResult {
  const thresholdC = { tender: 5, "half-hardy": 0, hardy: -5 }[input.tolerance];
  let score = input.forecastLowC >= thresholdC + 3 ? 0 : input.forecastLowC >= thresholdC ? 1 : input.forecastLowC >= thresholdC - 3 ? 2 : 3;
  if (input.forecastLowC <= thresholdC + 3) score += input.exposure === "windy" ? 2 : input.exposure === "open" ? 1 : 0;
  if (input.forecastLowC <= thresholdC + 3 && input.containerized) score += 1;
  score = Math.max(0, Math.min(score, 6));
  const riskLevel = score <= 1 ? "low" : score === 2 ? "watch" : score <= 4 ? "high" : "critical";
  const actions = [score <= 1 ? "Continue monitoring the local forecast; no frost action is indicated by these inputs." : "Confirm the latest hourly local forecast, including frost advisories and expected duration.", score >= 2 && input.containerized ? "Move manageable pots beside a sheltered wall or into a suitable protected place before temperatures fall." : "", score >= 3 ? "Use breathable horticultural fleece without crushing foliage, and remove or vent it after conditions improve." : "", score >= 3 ? "Protect container roots as well as leaves; small pots cool faster than garden soil." : "", score >= 5 ? "Treat this as an urgent protection decision and prioritize the most tender or irreplaceable plants." : "", "Do not use heaters, flames, or sealed plastic covers around plants."].filter(Boolean);
  return { thresholdC, riskLevel, riskScore: score, explanation: `The forecast low is ${input.forecastLowC}°C and this broad plant group begins needing caution around ${thresholdC}°C. Exposure and container roots adjust the final risk.`, actions, assumptions: ["The entered temperature must come from a current, trusted local forecast.", "A broad tolerance group cannot represent cultivar, plant age, acclimation, frost duration, humidity, or microclimate.", "Cold air can pool on balconies, patios, and low areas even when a general forecast is slightly warmer."] };
}

export async function assessFrostRisk(input: { forecastLowC: number; tolerance: PlantTolerance; exposure: FrostExposure; containerized: boolean }): Promise<{ result: FrostResult; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("assess_frost_risk", { forecast_low_c: input.forecastLowC, plant_tolerance: input.tolerance, exposure: input.exposure, containerized: input.containerized });
    const row = data?.[0];
    if (error || !row) return { result: fallbackFrost(input), source: "fallback" };
    return { result: { thresholdC: Number(row.tolerance_threshold_c), riskLevel: row.risk_level, riskScore: row.risk_score, explanation: row.explanation, actions: row.actions, assumptions: row.assumptions }, source: "database" };
  } catch { return { result: fallbackFrost(input), source: "fallback" }; }
}
