import "server-only";

import { createClient } from "@/lib/supabase/server";
import type { Json } from "@/lib/supabase/database.types";

export type DiagnosticStep = { title: string; text: string };
export type ProblemProfile = {
  id: string; slug: string; title: string; excerpt: string; overview: string; category: string;
  urgency: "low" | "moderate" | "high"; symptoms: string[]; likelyCauses: DiagnosticStep[];
  verificationSteps: DiagnosticStep[]; recommendedActions: DiagnosticStep[]; warnings: string[];
  imageUrl?: string; imageAlt?: string; seoTitle?: string; seoDescription?: string; updatedAt: string;
  relatedPlants: Array<{ id: string; slug: string; title: string }>;
};

function object(value: Json | undefined) { return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {}; }
function steps(value: Json | undefined): DiagnosticStep[] {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => { const item = object(entry); return typeof item.title === "string" && typeof item.text === "string" ? [{ title: item.title, text: item.text }] : []; });
}

export async function getPublishedProblems(): Promise<ProblemProfile[]> {
  const supabase = await createClient();
  const { data: contents, error } = await supabase.from("content_items").select("id, slug, title, excerpt, body, seo_title, seo_description, updated_at").eq("content_type", "problem").eq("status", "published").order("title");
  if (error || !contents?.length) return [];
  const ids = contents.map((item) => item.id);
  const [{ data: profiles }, { data: links }] = await Promise.all([
    supabase.from("problem_profiles").select("content_id, category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings, image_url, image_alt").in("content_id", ids),
    supabase.from("problem_plant_links").select("problem_content_id, plant_content_id").in("problem_content_id", ids),
  ]);
  const plantIds = [...new Set((links ?? []).map((link) => link.plant_content_id))];
  const { data: plants } = plantIds.length ? await supabase.from("content_items").select("id, slug, title").in("id", plantIds).eq("status", "published") : { data: [] };
  return contents.flatMap((content) => {
    const profile = profiles?.find((entry) => entry.content_id === content.id);
    if (!profile) return [];
    const body = object(content.body);
    const relatedIds = new Set((links ?? []).filter((link) => link.problem_content_id === content.id).map((link) => link.plant_content_id));
    return [{
      id: content.id, slug: content.slug, title: content.title, excerpt: content.excerpt ?? "", overview: typeof body.overview === "string" ? body.overview : "",
      category: profile.category, urgency: profile.urgency === "high" ? "high" : profile.urgency === "low" ? "low" : "moderate", symptoms: profile.symptoms, likelyCauses: steps(profile.likely_causes),
      verificationSteps: steps(profile.verification_steps), recommendedActions: steps(profile.recommended_actions), warnings: profile.warnings,
      imageUrl: profile.image_url ?? undefined, imageAlt: profile.image_alt ?? undefined, seoTitle: content.seo_title ?? undefined,
      seoDescription: content.seo_description ?? undefined, updatedAt: content.updated_at,
      relatedPlants: (plants ?? []).filter((plant) => relatedIds.has(plant.id)),
    }];
  });
}

export async function getPublishedProblem(slug: string) { return (await getPublishedProblems()).find((problem) => problem.slug === slug); }
export async function getProblemsForPlantSlug(slug: string) { return (await getPublishedProblems()).filter((problem) => problem.relatedPlants.some((plant) => plant.slug === slug)); }
