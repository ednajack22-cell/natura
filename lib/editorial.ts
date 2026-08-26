import type { Json } from "@/lib/supabase/database.types";

export const contentTypeLabels = {
  plant: "Plant profile",
  problem: "Plant problem",
  guide: "Guide",
  calendar: "Calendar",
  tool: "Tool",
  review: "Review",
  page: "Page",
} as const;

export const statusLabels = {
  draft: "Draft",
  review: "In review",
  published: "Published",
  archived: "Archived",
} as const;

export const publicSectionLabels: Record<string, string> = {
  grow: "Grow",
  "small-space-gardening": "Small-Space Gardening",
  "plant-care": "Plant Care",
  "planting-calendar": "Planting Calendar",
  tools: "Tools",
  reviews: "Reviews",
  institutional: "Institutional pages",
};

export type EditorialBody = {
  stage?: string;
  overview?: string;
  blocks?: Json[];
  navigation?: { section?: string; subsection?: string };
  sources?: Array<{ title: string; url?: string }>;
  [key: string]: Json | undefined;
};

export function readEditorialBody(value: Json): EditorialBody {
  if (value && typeof value === "object" && !Array.isArray(value)) return value as EditorialBody;
  return {};
}

export function publicPreviewPath(type: string, slug: string) {
  if (type === "plant") return `/plants/${slug}`;
  if (type === "problem") return `/plant-care/problems/${slug}`;
  if (type === "guide") return `/small-space-gardening/guides/${slug}`;
  if (type === "calendar") return `/planting-calendar/calendars/${slug}`;
  if (type === "tool") return `/tools/${slug}`;
  if (type === "review") return `/reviews/${slug}`;
  if (type === "page") return `/${slug}`;
  return null;
}
