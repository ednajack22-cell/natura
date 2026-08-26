import "server-only";

import { readEditorialBody } from "@/lib/editorial";
import { createClient } from "@/lib/supabase/server";

export const plantGroupOptions = ["leafy-herb", "compact-fruit", "fruiting-crop", "root-crop", "climbing-crop"] as const;
export const durationOptions = ["annual", "perennial"] as const;
export const waterNeedOptions = ["low", "moderate", "high"] as const;
export const exposureOptions = ["indoor", "sheltered", "sunny", "windy"] as const;
export const temperatureOptions = ["cool", "mild", "warm", "hot"] as const;
export const drainageOptions = ["fast", "balanced", "retentive"] as const;

export type PlantGroup = (typeof plantGroupOptions)[number];
export type GrowthDuration = (typeof durationOptions)[number];
export type WaterNeed = (typeof waterNeedOptions)[number];
export type Exposure = (typeof exposureOptions)[number];
export type TemperatureBand = (typeof temperatureOptions)[number];
export type Drainage = (typeof drainageOptions)[number];

export type ToolEditorial = { title: string; excerpt: string; overview: string; seoTitle: string; seoDescription: string };
export type ContainerResult = { minimumLiters: number; preferredLiters: number; minimumDepthCm: number; approximateDiameterCm: number; guidance: string[]; assumptions: string[] };
export type WateringResult = { checkIntervalHours: number; soilTestDepthCm: number; morningCheckRecommended: boolean; routine: string[]; warning: string; assumptions: string[] };

const defaults: Record<"pot-size-calculator" | "watering-calculator", ToolEditorial> = {
  "pot-size-calculator": {
    title: "Pot size calculator",
    excerpt: "Estimate a useful container volume and root depth from plant habit, plant count, and growing duration.",
    overview: "This calculator estimates a practical container range from broad root and growth habits. It explains its assumptions because cultivar vigor, pot shape, climate, and pruning can change the useful size.",
    seoTitle: "Pot Size Calculator for Container Plants | Natura",
    seoDescription: "Estimate a practical pot volume, diameter, and root depth for herbs, fruiting crops, roots, and climbing plants.",
  },
  "watering-calculator": {
    title: "Watering routine",
    excerpt: "Build a soil-check routine from plant need, pot volume, exposure, temperature, and drainage.",
    overview: "The tool estimates when to inspect the growing mix. It deliberately does not tell you to water on a fixed schedule: moisture, plant response, recent rain, and drainage decide whether water is needed.",
    seoTitle: "Container Watering Check Routine | Natura",
    seoDescription: "Create an observation-first soil-check routine for container plants using pot size, exposure, heat, and drainage.",
  },
};

export async function getCalculatorTool(slug: keyof typeof defaults): Promise<ToolEditorial> {
  const fallback = defaults[slug];
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.from("content_items").select("title, excerpt, body, seo_title, seo_description").eq("content_type", "tool").eq("status", "published").eq("slug", slug).maybeSingle();
    if (error || !data) return fallback;
    const body = readEditorialBody(data.body);
    return { title: data.title, excerpt: data.excerpt ?? fallback.excerpt, overview: body.overview ?? fallback.overview, seoTitle: data.seo_title ?? fallback.seoTitle, seoDescription: data.seo_description ?? fallback.seoDescription };
  } catch {
    return fallback;
  }
}

function fallbackContainer(plantGroup: PlantGroup, plantCount: number, growthDuration: GrowthDuration): ContainerResult {
  const litersByGroup: Record<PlantGroup, number> = { "leafy-herb": 3, "compact-fruit": 5, "fruiting-crop": 20, "root-crop": 12, "climbing-crop": 25 };
  const depthByGroup: Record<PlantGroup, number> = { "leafy-herb": 20, "compact-fruit": 25, "fruiting-crop": 35, "root-crop": 30, "climbing-crop": 40 };
  const preferredLiters = Math.ceil(litersByGroup[plantGroup] * plantCount * (plantCount > 1 ? .85 : 1) * (growthDuration === "perennial" ? 1.25 : 1));
  const minimumLiters = Math.max(2, Math.ceil(preferredLiters * .75));
  const minimumDepthCm = depthByGroup[plantGroup] + (growthDuration === "perennial" ? 5 : 0);
  const approximateDiameterCm = Math.ceil(Math.cbrt((preferredLiters * 1000 * 4) / (Math.PI * .8)));
  return {
    minimumLiters, preferredLiters, minimumDepthCm, approximateDiameterCm,
    guidance: [`Aim for about ${preferredLiters} L in total; ${minimumLiters} L is the practical lower limit.`, `Keep at least ${minimumDepthCm} cm of usable root depth.`, plantCount > 1 ? "Shared containers need even spacing and uninterrupted drainage across the full base." : "One plant per container makes root space and watering easier to manage.", ["fruiting-crop", "climbing-crop"].includes(plantGroup) ? "Choose a stable container and add support before the root ball fills the pot." : plantGroup === "root-crop" ? "Depth and a stone-free growing mix matter more than a decorative wide rim." : "Leave a small watering lip below the rim instead of filling the pot completely."],
    assumptions: ["The estimate assumes a container with drainage holes and a suitable growing mix.", "Dimensions are approximate because pot shapes taper and manufacturers report volume differently.", "Cultivar vigor, rootstock, climate, and pruning can move the useful size above this range."],
  };
}

export async function calculateContainer(input: { plantGroup: PlantGroup; plantCount: number; growthDuration: GrowthDuration }): Promise<{ result: ContainerResult; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("calculate_container_size", { plant_group: input.plantGroup, plant_count: input.plantCount, growth_duration: input.growthDuration });
    const row = data?.[0];
    if (error || !row) return { result: fallbackContainer(input.plantGroup, input.plantCount, input.growthDuration), source: "fallback" };
    return { result: { minimumLiters: row.minimum_liters, preferredLiters: row.preferred_liters, minimumDepthCm: row.minimum_depth_cm, approximateDiameterCm: row.approximate_diameter_cm, guidance: row.guidance, assumptions: row.assumptions }, source: "database" };
  } catch {
    return { result: fallbackContainer(input.plantGroup, input.plantCount, input.growthDuration), source: "fallback" };
  }
}

function fallbackWatering(input: { plantNeed: WaterNeed; potLiters: number; exposure: Exposure; temperature: TemperatureBand; drainage: Drainage }): WateringResult {
  let hours = { low: 72, moderate: 36, high: 24 }[input.plantNeed];
  hours += input.potLiters < 5 ? -12 : input.potLiters > 15 ? 12 : 0;
  hours += { indoor: 8, sheltered: 0, sunny: -8, windy: -10 }[input.exposure];
  hours += { cool: 12, mild: 0, warm: -6, hot: -12 }[input.temperature];
  hours += { fast: -8, balanced: 0, retentive: 12 }[input.drainage];
  const checkIntervalHours = Math.max(6, Math.min(hours, 96));
  const soilTestDepthCm = input.potLiters < 5 ? 2 : input.potLiters <= 15 ? 3 : 5;
  return {
    checkIntervalHours, soilTestDepthCm, morningCheckRecommended: checkIntervalHours <= 24,
    routine: [`Check the growing mix about every ${checkIntervalHours} hours while these conditions persist.`, `Test moisture about ${soilTestDepthCm} cm below the surface, away from the pot edge.`, "Water only when the plant-specific test indicates it is needed, then wet the root zone thoroughly and let excess drain.", checkIntervalHours <= 24 ? "In demanding conditions, check in the morning and re-check later only if the plant or mix shows clear need." : "Reset the routine after rain, a temperature change, moving the pot, or repotting."],
    warning: "This is an observation reminder, not a watering schedule. Never water solely because the interval has elapsed.",
    assumptions: ["The estimate assumes drainage holes are open and the pot is not standing in water.", "Wind, sun reflected by walls, root density, and recent rain can change moisture loss quickly.", "Seedlings, newly transplanted plants, succulents, and dormant plants need more specific judgement."],
  };
}

export async function calculateWatering(input: { plantNeed: WaterNeed; potLiters: number; exposure: Exposure; temperature: TemperatureBand; drainage: Drainage }): Promise<{ result: WateringResult; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("calculate_watering_check", { plant_need: input.plantNeed, pot_liters: input.potLiters, exposure: input.exposure, temperature_band: input.temperature, drainage: input.drainage });
    const row = data?.[0];
    if (error || !row) return { result: fallbackWatering(input), source: "fallback" };
    return { result: { checkIntervalHours: row.check_interval_hours, soilTestDepthCm: row.soil_test_depth_cm, morningCheckRecommended: row.morning_check_recommended, routine: row.routine, warning: row.warning, assumptions: row.assumptions }, source: "database" };
  } catch {
    return { result: fallbackWatering(input), source: "fallback" };
  }
}
