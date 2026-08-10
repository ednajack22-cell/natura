import "server-only";

import { createClient } from "@/lib/supabase/server";
import type { Json } from "@/lib/supabase/database.types";

export type CalendarEntry = { id: string; month: number; activityType: string; title: string; description: string; priority: "low" | "normal" | "high"; sortOrder: number };
export type CalendarProfile = {
  id: string; slug: string; title: string; excerpt: string; overview: string; climate: string; hemisphere: string; spaceType: string;
  scopeNote: string; warnings: string[]; imageUrl?: string; imageAlt?: string; seoTitle?: string; seoDescription?: string; updatedAt: string;
  entries: CalendarEntry[]; relatedPlants: Array<{ id: string; slug: string; title: string }>;
};

function object(value: Json | undefined) { return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {}; }

export async function getPublishedCalendars(): Promise<CalendarProfile[]> {
  const supabase = await createClient();
  const { data: contents, error } = await supabase.from("content_items").select("id, slug, title, excerpt, body, seo_title, seo_description, updated_at").eq("content_type", "calendar").eq("status", "published").order("title");
  if (error || !contents?.length) return [];
  const ids = contents.map((item) => item.id);
  const [{ data: profiles }, { data: entries }, { data: links }] = await Promise.all([
    supabase.from("calendar_profiles").select("content_id, climate, hemisphere, space_type, scope_note, warnings, image_url, image_alt").in("content_id", ids),
    supabase.from("calendar_entries").select("id, calendar_content_id, month, activity_type, title, description, priority, sort_order").in("calendar_content_id", ids).order("month").order("sort_order"),
    supabase.from("calendar_plant_links").select("calendar_content_id, plant_content_id").in("calendar_content_id", ids),
  ]);
  const plantIds = [...new Set((links ?? []).map((link) => link.plant_content_id))];
  const { data: plants } = plantIds.length ? await supabase.from("content_items").select("id, slug, title").in("id", plantIds).eq("status", "published") : { data: [] };
  return contents.flatMap((content) => {
    const profile = profiles?.find((entry) => entry.content_id === content.id);
    if (!profile) return [];
    const body = object(content.body);
    const relatedIds = new Set((links ?? []).filter((link) => link.calendar_content_id === content.id).map((link) => link.plant_content_id));
    return [{
      id: content.id, slug: content.slug, title: content.title, excerpt: content.excerpt ?? "", overview: typeof body.overview === "string" ? body.overview : "",
      climate: profile.climate, hemisphere: profile.hemisphere, spaceType: profile.space_type, scopeNote: profile.scope_note, warnings: profile.warnings,
      imageUrl: profile.image_url ?? undefined, imageAlt: profile.image_alt ?? undefined, seoTitle: content.seo_title ?? undefined, seoDescription: content.seo_description ?? undefined, updatedAt: content.updated_at,
      entries: (entries ?? []).filter((entry) => entry.calendar_content_id === content.id).map((entry) => ({ id: entry.id, month: entry.month, activityType: entry.activity_type, title: entry.title, description: entry.description, priority: entry.priority === "high" ? "high" : entry.priority === "low" ? "low" : "normal", sortOrder: entry.sort_order })),
      relatedPlants: (plants ?? []).filter((plant) => relatedIds.has(plant.id)),
    }];
  });
}

export async function getPublishedCalendar(slug: string) { return (await getPublishedCalendars()).find((calendar) => calendar.slug === slug); }
export async function getCalendarsForPlantSlug(slug: string) { return (await getPublishedCalendars()).filter((calendar) => calendar.relatedPlants.some((plant) => plant.slug === slug)); }
