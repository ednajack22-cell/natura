import "server-only";

import { createClient } from "@/lib/supabase/server";
import { getPlant, plants, type PlantProfile } from "@/lib/plants";
import { readEditorialBody } from "@/lib/editorial";
import type { Json } from "@/lib/supabase/database.types";

export type PublishedPlant = PlantProfile & {
  seoTitle?: string;
  seoDescription?: string;
  updatedAt?: string;
};

type ContentPlantRow = {
  title: string;
  slug: string;
  excerpt: string | null;
  body: Json;
  seo_title: string | null;
  seo_description: string | null;
  updated_at: string;
};

function text(value: Json | undefined, fallback: string) {
  return typeof value === "string" && value.trim() ? value : fallback;
}

function list(value: Json | undefined, fallback: string[]) {
  return Array.isArray(value) && value.every((entry) => typeof entry === "string") ? value : fallback;
}

function steps(value: Json | undefined, fallback: Array<{ title: string; text: string }>) {
  if (!Array.isArray(value)) return fallback;
  const parsed = value.flatMap((entry) => {
    if (!entry || typeof entry !== "object" || Array.isArray(entry)) return [];
    const item = entry as Record<string, Json | undefined>;
    return typeof item.title === "string" && typeof item.text === "string" ? [{ title: item.title, text: item.text }] : [];
  });
  return parsed.length ? parsed : fallback;
}

function mapPlant(row: ContentPlantRow): PublishedPlant {
  const fallback: PlantProfile = getPlant(row.slug) ?? {
    slug: row.slug, name: row.title, botanicalName: "", category: "Plant", tagline: row.excerpt ?? "",
    description: row.excerpt ?? "", image: "/images/natura-balcony-hero.png", imageAlt: "Natura plant guide",
    difficulty: "Easy", sunlight: "See guide", potSize: "See guide", watering: "Observe the soil",
    harvest: "Varies", season: "Adapt to local conditions", suitableFor: [], care: [], watchFor: [],
  };
  const body = readEditorialBody(row.body);
  const difficulty = text(body.difficulty, fallback.difficulty);
  return {
    slug: row.slug,
    name: row.title,
    botanicalName: text(body.botanical_name, fallback.botanicalName),
    category: text(body.category, fallback.category),
    tagline: row.excerpt || fallback.tagline,
    description: text(body.overview, row.excerpt || fallback.description),
    image: text(body.image, fallback.image),
    imageAlt: text(body.image_alt, fallback.imageAlt),
    difficulty: difficulty === "Moderate" ? "Moderate" : "Easy",
    sunlight: text(body.sunlight, fallback.sunlight),
    potSize: text(body.pot_size, fallback.potSize),
    watering: text(body.watering, fallback.watering),
    harvest: text(body.harvest, fallback.harvest),
    season: text(body.season, fallback.season),
    suitableFor: list(body.suitable_for, fallback.suitableFor),
    care: steps(body.care, fallback.care),
    watchFor: steps(body.watch_for, fallback.watchFor),
    seoTitle: row.seo_title ?? undefined,
    seoDescription: row.seo_description ?? undefined,
    updatedAt: row.updated_at,
  };
}

export async function getPublishedPlants(): Promise<PublishedPlant[]> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.from("content_items")
      .select("title, slug, excerpt, body, seo_title, seo_description, updated_at")
      .eq("content_type", "plant").eq("status", "published").order("title");
    if (error || !data?.length) return plants;
    return data.map(mapPlant);
  } catch {
    return plants;
  }
}

export async function getPublishedPlant(slug: string): Promise<PublishedPlant | undefined> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.from("content_items")
      .select("title, slug, excerpt, body, seo_title, seo_description, updated_at")
      .eq("content_type", "plant").eq("status", "published").eq("slug", slug).maybeSingle();
    if (error) return getPlant(slug);
    return data ? mapPlant(data) : undefined;
  } catch {
    return getPlant(slug);
  }
}
