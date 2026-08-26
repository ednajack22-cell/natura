import "server-only";

import { getPublishedPlants, type PublishedPlant } from "@/lib/plant-content";
import { createClient } from "@/lib/supabase/server";

export type PopularPlantCollection = {
  plants: PublishedPlant[];
  totalPlants: number;
  rankedCount: number;
  totalSearches: number;
};

export async function getMostSearchedPlants(limit = 6): Promise<PopularPlantCollection> {
  const safeLimit = Math.max(1, Math.min(limit, 24));
  const plants = await getPublishedPlants();

  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("get_most_searched_plants", { result_limit: safeLimit });
    if (error || !data) throw error;

    const bySlug = new Map(plants.map((plant) => [plant.slug, plant]));
    const rankedPlants = data.flatMap((row) => bySlug.get(row.slug) ?? []);
    const rankedSlugs = new Set(rankedPlants.map((plant) => plant.slug));
    const starterPlants = plants.filter((plant) => !rankedSlugs.has(plant.slug));

    return {
      plants: [...rankedPlants, ...starterPlants].slice(0, safeLimit),
      totalPlants: plants.length,
      rankedCount: rankedPlants.length,
      totalSearches: data.reduce((total, row) => total + Number(row.search_count), 0),
    };
  } catch {
    return { plants: plants.slice(0, safeLimit), totalPlants: plants.length, rankedCount: 0, totalSearches: 0 };
  }
}

export async function recordPlantSearchInterest(query: string) {
  const normalizedQuery = query.trim().replace(/\s+/g, " ").slice(0, 80);
  if (normalizedQuery.length < 2) return;

  try {
    const supabase = await createClient();
    await supabase.rpc("record_plant_search_interest", { search_query: normalizedQuery });
  } catch {
    // Search remains available when the optional aggregate counter is unavailable.
  }
}
