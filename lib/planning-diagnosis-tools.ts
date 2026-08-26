import "server-only";

import { readEditorialBody } from "@/lib/editorial";
import { getPublishedProblems } from "@/lib/problem-content";
import { createClient } from "@/lib/supabase/server";

export const planningSpaceOptions = ["balcony", "patio", "indoor", "small-garden"] as const;
export const accessStyleOptions = ["edge-only", "central-path", "walk-through"] as const;
export const observedSignOptions = ["yellowing", "wilting", "spots", "insects", "poor-growth"] as const;
export const moistureOptions = ["dry", "moist", "wet", "unknown"] as const;
export const distributionOptions = ["older-leaves", "new-growth", "whole-plant", "isolated"] as const;
export const recentChangeOptions = ["none", "watering", "feeding", "temperature", "move-repot"] as const;

export type PlanningSpace = (typeof planningSpaceOptions)[number];
export type AccessStyle = (typeof accessStyleOptions)[number];
export type ObservedSign = (typeof observedSignOptions)[number];
export type MoistureCondition = (typeof moistureOptions)[number];
export type DistributionPattern = (typeof distributionOptions)[number];
export type RecentChange = (typeof recentChangeOptions)[number];

type ToolSlug = "garden-planner" | "guided-diagnosis";
type ToolEditorial = { title: string; excerpt: string; overview: string; seoTitle: string; seoDescription: string };
export type PlannerResult = { totalAreaM2: number; growingAreaM2: number; accessReservedPercent: number; suggestedModules: number; moduleWidthCm: number; layoutNote: string; priorities: string[]; checks: string[]; safetyNote: string };
export type ObservationResult = { attentionLevel: string; categoryHint: string; summary: string; observationChecks: string[]; avoidActions: string[]; assumptions: string[] };
export type ObservationMatch = { id: string; title: string; slug: string; excerpt: string; category: string; urgency: string; score: number; reasons: string[]; symptoms: string[]; verificationSteps: Array<{ title: string; text: string }>; warnings: string[] };

const defaults: Record<ToolSlug, ToolEditorial> = {
  "garden-planner": { title: "Small-space garden planner", excerpt: "Turn a measured footprint into a reachable container layout with visible access, light, and safety limits.", overview: "This tool estimates growing area and movable planning modules after reserving space for access. It cannot verify structural loading, wind exposure, drainage, waterproofing, escape routes, or permission to install a garden.", seoTitle: "Small-Space Garden Planner for Containers | Natura", seoDescription: "Estimate reachable growing area and container planning modules from measured dimensions, access, light, and space type, with safety limits." },
  "guided-diagnosis": { title: "Plant observation guide", excerpt: "Organize visible symptoms, moisture, distribution, and recent changes before comparing published plant-problem guides.", overview: "This guided observation tool helps the reader record a pattern and retrieve relevant published diagnostic guides. It does not identify diseases, pests, deficiencies, or root conditions and never replaces suitable local expertise.", seoTitle: "Plant Symptom Observation Guide | Natura", seoDescription: "Organize plant symptoms, moisture, distribution, and recent changes, then compare relevant published diagnostic guides without an automatic diagnosis." },
};

export async function getPlanningTool(slug: ToolSlug): Promise<ToolEditorial> {
  const fallback = defaults[slug];
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.from("content_items").select("title, excerpt, body, seo_title, seo_description").eq("content_type", "tool").eq("status", "published").eq("slug", slug).maybeSingle();
    if (error || !data) return fallback;
    const body = readEditorialBody(data.body);
    return { title: data.title, excerpt: data.excerpt ?? fallback.excerpt, overview: body.overview ?? fallback.overview, seoTitle: data.seo_title ?? fallback.seoTitle, seoDescription: data.seo_description ?? fallback.seoDescription };
  } catch { return fallback; }
}

function fallbackPlan(input: { widthCm: number; depthCm: number; accessStyle: AccessStyle; sunHours: number; spaceType: PlanningSpace }): PlannerResult {
  const totalAreaM2 = Math.round(input.widthCm * input.depthCm / 100) / 100;
  const accessReservedPercent = { "edge-only": 10, "central-path": 32, "walk-through": 42 }[input.accessStyle];
  const growingAreaM2 = Math.round(totalAreaM2 * (100 - accessReservedPercent)) / 100;
  const lightDensity = input.sunHours < 3 ? .58 : input.sunHours < 6 ? .78 : 1;
  const moduleWidthCm = input.sunHours < 4 ? 45 : 40;
  const suggestedModules = Math.max(1, Math.min(24, Math.floor(growingAreaM2 * lightDensity / Math.pow(moduleWidthCm / 100, 2))));
  const layoutNote = input.accessStyle === "edge-only" ? "Keep the centre clear and arrange movable modules along reachable edges." : input.accessStyle === "central-path" ? "Reserve one continuous central access strip and place modules on both sides without narrowing the route." : "Keep a continuous route from entry to exit; use the remaining edges for compact, movable modules.";
  const priorities = [input.sunHours < 3 ? "Prioritize shade-tolerant foliage and observation before adding more modules." : input.sunHours < 6 ? "Use the brightest zone for fruiting plants and the softer edges for leafy crops." : "Group plants by water demand and protect containers from extreme afternoon heat.", input.spaceType === "indoor" ? "Keep plants close to usable natural light without blocking windows, ventilation, or access." : "Place taller plants where they will not shade smaller modules or obstruct neighbours.", "Leave every container reachable for watering, inspection, pruning, and safe removal."];
  const checks = ["Measure the clear usable footprint again, including doors, drains, railings, and furniture movement.", input.spaceType === "balcony" ? "Ask the building owner or a qualified professional to confirm structural load, fixing, drainage, and escape-route limits." : "Confirm drainage, waterproofing, safe access, and any property or landlord restrictions.", "Test the layout with empty containers before adding wet compost, plants, water reservoirs, or trellises.", "Keep fire, emergency, and everyday circulation routes fully open."];
  return { totalAreaM2, growingAreaM2, accessReservedPercent, suggestedModules, moduleWidthCm, layoutNote, priorities, checks, safetyNote: "This is a spatial planning estimate only. It does not verify structural load, waterproofing, drainage capacity, wind safety, fire rules, landlord permission, or safe fixing." };
}

export async function planSmallSpace(input: { widthCm: number; depthCm: number; accessStyle: AccessStyle; sunHours: number; spaceType: PlanningSpace }): Promise<{ result: PlannerResult; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("plan_small_growing_space", { width_cm: input.widthCm, depth_cm: input.depthCm, access_style: input.accessStyle, sun_hours: input.sunHours, space_type: input.spaceType });
    const row = data?.[0];
    if (error || !row) return { result: fallbackPlan(input), source: "fallback" };
    return { result: { totalAreaM2: Number(row.total_area_m2), growingAreaM2: Number(row.growing_area_m2), accessReservedPercent: row.access_reserved_percent, suggestedModules: row.suggested_modules, moduleWidthCm: row.module_width_cm, layoutNote: row.layout_note, priorities: row.priorities, checks: row.checks, safetyNote: row.safety_note }, source: "database" };
  } catch { return { result: fallbackPlan(input), source: "fallback" }; }
}

function fallbackObservation(input: { observedSign: ObservedSign; moisture: MoistureCondition; distribution: DistributionPattern; recentChange: RecentChange }): ObservationResult {
  const attentionLevel = (input.observedSign === "wilting" && input.moisture === "wet") || input.observedSign === "insects" ? "prompt" : input.observedSign === "spots" || input.moisture === "wet" ? "watch" : "routine";
  const categoryHint = input.observedSign === "insects" ? "pest" : input.observedSign === "spots" ? "disease" : input.observedSign === "poor-growth" ? "nutrition" : ["dry", "wet"].includes(input.moisture) || ["yellowing", "wilting"].includes(input.observedSign) ? "watering" : "environment";
  const signCheck: Record<ObservedSign, string> = { yellowing: "Note whether yellowing starts between veins, at leaf edges, or uniformly across the leaf.", wilting: "Compare leaf posture before and after the coolest part of the day; heat wilt can differ from persistent root stress.", spots: "Check both leaf surfaces and note whether spots are dry, soft, spreading, ringed, or associated with damaged tissue.", insects: "Inspect leaf undersides, growing tips, stems, and nearby plants for insects, cast skins, webbing, honeydew, or chewing.", "poor-growth": "Compare new growth size, colour, spacing, and rate with older healthy growth." };
  const moistureCheck: Record<MoistureCondition, string> = { dry: "Check moisture several centimetres below the surface and confirm whether the root ball has pulled away from the container.", wet: "Confirm drainage holes are open and note how many days the growing mix has remained wet.", moist: "Do not infer root moisture from the surface alone; compare several depths without damaging roots.", unknown: "Check moisture below the surface before deciding whether water is part of the pattern." };
  const distributionCheck: Record<DistributionPattern, string> = { "older-leaves": "Compare the oldest affected leaves with healthy new growth; age-related loss and mobile nutrient patterns often begin low.", "new-growth": "Inspect the newest leaves and growing point for distortion, pale tissue, pests, or recent cold damage.", isolated: "Look for a local cause such as contact damage, a single wet pocket, sun scorch, or one pest cluster.", "whole-plant": "A whole-plant pattern deserves a review of roots, temperature, light, watering, and recent care changes together." };
  const recentCheck: Partial<Record<RecentChange, string>> = { watering: "Record what changed in watering amount, frequency, drainage, or reservoir use.", feeding: "Record product, concentration, timing, and whether the growing mix was already dry or stressed.", temperature: "Compare the symptom timing with recent heat, cold, wind, or rapid indoor temperature changes.", "move-repot": "Check whether light, root space, compost, drainage, or exposure changed during the move or repot." };
  return { attentionLevel, categoryHint, summary: `Treat ${input.observedSign.replaceAll("-", " ")} as an observation, not a diagnosis. Compare the ${input.distribution.replaceAll("-", " ")} pattern with moisture, recent changes, and the healthy parts of the plant before acting.`, observationChecks: ["Photograph the whole plant and one affected area in clear light so the pattern can be compared tomorrow.", signCheck[input.observedSign], moistureCheck[input.moisture], distributionCheck[input.distribution], recentCheck[input.recentChange]].filter((item): item is string => Boolean(item)), avoidActions: ["Do not apply fertilizer, pesticide, fungicide, or repeated watering only because one symptom label seems to fit.", input.moisture === "wet" ? "Do not add more water until drainage and moisture below the surface have been checked." : "", ["spots", "insects"].includes(input.observedSign) ? "Avoid spreading material between plants; clean tools and keep the affected plant apart while you inspect it." : "", "Do not remove large amounts of partly healthy foliage before the pattern and cause are clearer."].filter(Boolean), assumptions: ["This guide uses broad visual and care-history categories and cannot identify a pathogen, pest species, deficiency, or root condition.", "More than one cause can be present at the same time.", "Rapid collapse, extensive rot, suspected poisoning, or a safety hazard requires suitable local expert help."] };
}

async function fallbackMatches(input: { observedSign: ObservedSign; moisture: MoistureCondition; distribution: DistributionPattern }): Promise<ObservationMatch[]> {
  const problems = await getPublishedProblems().catch(() => []);
  return problems.map((problem) => {
    const search = `${problem.title} ${problem.excerpt} ${problem.symptoms.join(" ")}`.toLowerCase();
    const signMatch = input.observedSign === "yellowing" ? search.includes("yellow") : input.observedSign === "wilting" ? search.includes("wilt") : input.observedSign === "spots" ? search.includes("spot") || search.includes("lesion") : input.observedSign === "insects" ? search.includes("insect") || search.includes("pest") : search.includes("slow") || search.includes("growth");
    const categoryMatch = (input.observedSign === "insects" && problem.category === "pest") || (input.observedSign === "spots" && problem.category === "disease") || (input.observedSign === "poor-growth" && problem.category === "nutrition") || (["yellowing", "wilting"].includes(input.observedSign) && problem.category === "watering");
    const score = (signMatch ? 55 : 0) + (categoryMatch ? 20 : 0) + (input.moisture === "wet" && problem.category === "watering" ? 15 : 0) + (input.distribution === "older-leaves" && search.includes("older") ? 10 : 0);
    return { id: problem.id, title: problem.title, slug: problem.slug, excerpt: problem.excerpt, category: problem.category, urgency: problem.urgency, score, reasons: [signMatch ? "The published symptom language overlaps with the selected visible sign." : "", input.moisture === "wet" && problem.category === "watering" ? "The selected moisture condition is relevant to this watering and root guide." : "", input.distribution === "older-leaves" && search.includes("older") ? "The guide explicitly discusses older leaves." : ""].filter(Boolean), symptoms: problem.symptoms, verificationSteps: problem.verificationSteps, warnings: problem.warnings };
  }).filter((problem) => problem.score > 0).sort((a, b) => b.score - a.score).slice(0, 4);
}

function parseSteps(value: unknown): Array<{ title: string; text: string }> {
  if (!Array.isArray(value)) return [];
  return value.flatMap((item) => item && typeof item === "object" && "title" in item && "text" in item && typeof item.title === "string" && typeof item.text === "string" ? [{ title: item.title, text: item.text }] : []);
}

export async function guideObservation(input: { observedSign: ObservedSign; moisture: MoistureCondition; distribution: DistributionPattern; recentChange: RecentChange }): Promise<{ observation: ObservationResult; matches: ObservationMatch[]; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const [observationResponse, matchesResponse] = await Promise.all([
      supabase.rpc("guide_plant_observation", { observed_sign: input.observedSign, moisture_condition: input.moisture, distribution_pattern: input.distribution, recent_change: input.recentChange }),
      supabase.rpc("find_guided_problem_matches", { observed_sign: input.observedSign, moisture_condition: input.moisture, distribution_pattern: input.distribution, result_limit: 4 }),
    ]);
    const row = observationResponse.data?.[0];
    if (observationResponse.error || matchesResponse.error || !row) return { observation: fallbackObservation(input), matches: await fallbackMatches(input), source: "fallback" };
    return { observation: { attentionLevel: row.attention_level, categoryHint: row.category_hint, summary: row.summary, observationChecks: row.observation_checks, avoidActions: row.avoid_actions, assumptions: row.assumptions }, matches: (matchesResponse.data ?? []).map((match) => ({ id: match.content_id, title: match.title, slug: match.slug, excerpt: match.excerpt, category: match.category, urgency: match.urgency, score: match.match_score, reasons: match.reasons, symptoms: match.symptoms, verificationSteps: parseSteps(match.verification_steps), warnings: match.warnings })), source: "database" };
  } catch { return { observation: fallbackObservation(input), matches: await fallbackMatches(input), source: "fallback" }; }
}
