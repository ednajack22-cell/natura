import "server-only";

import { createClient } from "@/lib/supabase/server";
import { getPublishedPlants, type PublishedPlant } from "@/lib/plant-content";
import { readEditorialBody } from "@/lib/editorial";

export const finderSpaceOptions = ["any", "windowsill", "balcony", "patio", "indoor", "container"] as const;
export const finderCareOptions = ["low", "regular", "attentive"] as const;
export const finderClimateOptions = ["general", "temperate", "mediterranean", "continental", "tropical"] as const;
export const finderCategoryOptions = ["all", "vegetable", "herb", "fruit"] as const;
export const finderDifficultyOptions = ["any", "easy", "moderate"] as const;
export const finderSortOptions = ["match", "name", "ease"] as const;

export type FinderSpace = (typeof finderSpaceOptions)[number];
export type FinderCare = (typeof finderCareOptions)[number];
export type FinderClimate = (typeof finderClimateOptions)[number];
export type FinderCategory = (typeof finderCategoryOptions)[number];
export type FinderDifficulty = (typeof finderDifficultyOptions)[number];
export type FinderSort = (typeof finderSortOptions)[number];
export type FinderInputs = { sunHours: number; space: FinderSpace; care: FinderCare; climate: FinderClimate; category: FinderCategory; difficulty: FinderDifficulty; sort: FinderSort };
export type FinderResult = PublishedPlant & { score: number; reasons: string[] };

export type PlantFinderTool = {
  title: string;
  excerpt: string;
  overview: string;
  seoTitle: string;
  seoDescription: string;
};

const defaultTool: PlantFinderTool = {
  title: "Plant finder",
  excerpt: "Match edible plants to your available light, growing space, broad climate, and preferred care rhythm.",
  overview: "Use four practical signals to shortlist plants that fit your space. The result is a transparent starting point, not a guarantee: observe your real light, temperature, wind, and watering conditions before planting.",
  seoTitle: "Plant Finder for Small Spaces | Natura",
  seoDescription: "Find edible plants suited to your sunlight, balcony or indoor space, climate, and care routine with transparent matching reasons.",
};

type FallbackProfile = { minSunHours: number; spaces: FinderSpace[]; care: FinderCare; climates: FinderClimate[]; note: string };
const fallbackProfiles: Record<string, FallbackProfile> = {
  "cherry-tomato": { minSunHours: 6, spaces: ["balcony", "patio", "container"], care: "attentive", climates: ["general", "temperate", "mediterranean", "continental"], note: "Give the container steady water and support the stems as fruit develops." },
  "genovese-basil": { minSunHours: 4, spaces: ["windowsill", "balcony", "indoor", "container"], care: "regular", climates: ["general", "temperate", "mediterranean", "tropical"], note: "Harvest the tips often and protect the plant from cold nights." },
  "balcony-strawberry": { minSunHours: 6, spaces: ["balcony", "patio", "container"], care: "regular", climates: ["general", "temperate", "mediterranean", "continental"], note: "Keep flowers in good light and the crown just above the growing mix." },
};

const careRank: Record<FinderCare, number> = { low: 1, regular: 2, attentive: 3 };

function fallbackScore(plant: PublishedPlant, input: FinderInputs): FinderResult {
  const profile = fallbackProfiles[plant.slug] ?? { minSunHours: 6, spaces: ["container"] as FinderSpace[], care: "regular" as FinderCare, climates: ["general"] as FinderClimate[], note: "Check the full growing guide before planting." };
  const lightScore = Math.max(0, 40 - Math.max(profile.minSunHours - input.sunHours, 0) * 12);
  const spaceScore = input.space === "any" || profile.spaces.includes(input.space) ? 25 : 0;
  const careDifference = careRank[profile.care] - careRank[input.care];
  const careScore = careDifference <= 0 ? 20 : careDifference === 1 ? 8 : 0;
  const climateScore = input.climate === "general" || profile.climates.includes("general") || profile.climates.includes(input.climate) ? 15 : 3;
  return {
    ...plant,
    score: lightScore + spaceScore + careScore + climateScore,
    reasons: [
      input.sunHours >= profile.minSunHours ? "Light level meets this plant's baseline." : `It usually performs better with about ${profile.minSunHours} hours of direct light.`,
      input.space === "any" ? "Works in one or more compact-space setups." : profile.spaces.includes(input.space) ? `Suitable for a ${input.space} setup.` : "This space type is not an ideal fit.",
      careScore === 20 ? "The care rhythm fits the time you can provide." : careScore === 8 ? "Possible, but it may need a little more attention." : "Its care needs may exceed your preferred routine.",
      climateScore === 15 ? "Compatible with the broad climate selected." : "Check local temperature and frost conditions carefully.",
      profile.note,
    ],
  };
}

async function fallbackResults(input: FinderInputs) {
  const plants = await getPublishedPlants();
  return refineResults(plants.map((plant) => fallbackScore(plant, input)), input);
}

function refineResults(results: FinderResult[], input: FinderInputs) {
  const filtered = results.filter((plant) => {
    const categoryMatches = input.category === "all" || plant.category.toLowerCase() === input.category;
    const difficultyMatches = input.difficulty === "any" || plant.difficulty.toLowerCase() === input.difficulty;
    return categoryMatches && difficultyMatches;
  });

  filtered.sort((a, b) => {
    if (input.sort === "name") return a.name.localeCompare(b.name);
    if (input.sort === "ease") {
      const difficultyDifference = Number(a.difficulty !== "Easy") - Number(b.difficulty !== "Easy");
      if (difficultyDifference) return difficultyDifference;
    }
    return b.score - a.score || a.name.localeCompare(b.name);
  });

  return filtered.slice(0, 6);
}

export async function getPlantFinderTool(): Promise<PlantFinderTool> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.from("content_items").select("title, excerpt, body, seo_title, seo_description").eq("content_type", "tool").eq("status", "published").eq("slug", "plant-finder").maybeSingle();
    if (error || !data) return defaultTool;
    const body = readEditorialBody(data.body);
    return {
      title: data.title,
      excerpt: data.excerpt ?? defaultTool.excerpt,
      overview: body.overview ?? defaultTool.overview,
      seoTitle: data.seo_title ?? defaultTool.seoTitle,
      seoDescription: data.seo_description ?? defaultTool.seoDescription,
    };
  } catch {
    return defaultTool;
  }
}

export async function findSuitablePlants(input: FinderInputs): Promise<{ results: FinderResult[]; source: "database" | "fallback" }> {
  try {
    const supabase = await createClient();
    const [{ data, error }, plants] = await Promise.all([
      supabase.rpc("find_suitable_plants", {
        requested_sun_hours: input.sunHours,
        requested_space: input.space,
        requested_care: input.care,
        requested_climate: input.climate,
        result_limit: 24,
      }),
      getPublishedPlants(),
    ]);
    if (error || !data?.length) return { results: await fallbackResults(input), source: "fallback" };
    const bySlug = new Map(plants.map((plant) => [plant.slug, plant]));
    const results = refineResults(data.flatMap((row) => {
      const plant = bySlug.get(row.slug);
      return plant ? [{ ...plant, score: row.score, reasons: row.reasons }] : [];
    }), input);
    return { results, source: "database" };
  } catch {
    return { results: await fallbackResults(input), source: "fallback" };
  }
}
