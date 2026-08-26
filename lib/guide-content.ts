import "server-only";

import { createClient } from "@/lib/supabase/public";
import type { Json } from "@/lib/supabase/database.types";

export type GuideStep = { title: string; text: string };
export type GuideProfile = {
  id: string;
  slug: string;
  title: string;
  excerpt: string;
  overview: string;
  guideType: string;
  difficulty: "easy" | "moderate" | "advanced";
  estimatedTimeMinutes: number;
  audience: string;
  prerequisites: string[];
  materials: string[];
  steps: GuideStep[];
  tips: string[];
  warnings: string[];
  imageUrl?: string;
  imageAlt?: string;
  seoTitle?: string;
  seoDescription?: string;
  updatedAt: string;
  sources: Array<{ title: string; url?: string }>;
  relatedPlants: Array<{ id: string; slug: string; title: string }>;
};

function object(value: Json | undefined) { return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {}; }
function steps(value: Json | undefined): GuideStep[] {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => { const item = object(entry); return typeof item.title === "string" && typeof item.text === "string" ? [{ title: item.title, text: item.text }] : []; });
}
function sources(value: Json | undefined) {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => {
    const item = object(entry);
    return typeof item.title === "string"
      ? [{ title: item.title, url: typeof item.url === "string" ? item.url : undefined }]
      : [];
  });
}

export async function getPublishedGuides(): Promise<GuideProfile[]> {
  const supabase = await createClient();
  const { data: contents, error } = await supabase.from("content_items").select("id, slug, title, excerpt, body, seo_title, seo_description, updated_at").eq("content_type", "guide").eq("status", "published").order("title");
  if (error || !contents?.length) return [];
  const ids = contents.map((item) => item.id);
  const [{ data: profiles }, { data: links }] = await Promise.all([
    supabase.from("guide_profiles").select("content_id, guide_type, difficulty, estimated_time_minutes, audience, prerequisites, materials, steps, tips, warnings, image_url, image_alt").in("content_id", ids),
    supabase.from("guide_plant_links").select("guide_content_id, plant_content_id").in("guide_content_id", ids),
  ]);
  const plantIds = [...new Set((links ?? []).map((link) => link.plant_content_id))];
  const { data: plants } = plantIds.length ? await supabase.from("content_items").select("id, slug, title").in("id", plantIds).eq("status", "published") : { data: [] };
  return contents.flatMap((content) => {
    const profile = profiles?.find((entry) => entry.content_id === content.id);
    if (!profile) return [];
    const body = object(content.body);
    const relatedIds = new Set((links ?? []).filter((link) => link.guide_content_id === content.id).map((link) => link.plant_content_id));
    return [{
      id: content.id,
      slug: content.slug,
      title: content.title,
      excerpt: content.excerpt ?? "",
      overview: typeof body.overview === "string" ? body.overview : "",
      guideType: profile.guide_type,
      difficulty: profile.difficulty === "advanced" ? "advanced" : profile.difficulty === "moderate" ? "moderate" : "easy",
      estimatedTimeMinutes: profile.estimated_time_minutes,
      audience: profile.audience,
      prerequisites: profile.prerequisites,
      materials: profile.materials,
      steps: steps(profile.steps),
      tips: profile.tips,
      warnings: profile.warnings,
      imageUrl: profile.image_url ?? undefined,
      imageAlt: profile.image_alt ?? undefined,
      seoTitle: content.seo_title ?? undefined,
      seoDescription: content.seo_description ?? undefined,
      updatedAt: content.updated_at,
      sources: sources(body.sources),
      relatedPlants: (plants ?? []).filter((plant) => relatedIds.has(plant.id)),
    }];
  });
}

export async function getPublishedGuide(slug: string) { return (await getPublishedGuides()).find((guide) => guide.slug === slug); }
export async function getGuidesForPlantSlug(slug: string) { return (await getPublishedGuides()).filter((guide) => guide.relatedPlants.some((plant) => plant.slug === slug)); }
