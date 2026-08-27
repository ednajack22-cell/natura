import "server-only";

import { createClient } from "@/lib/supabase/public";
import type { Json } from "@/lib/supabase/database.types";

export type ArticleSection = { heading: string; body: string };

export type PublishedArticle = {
  id: string;
  slug: string;
  title: string;
  excerpt: string;
  overview: string;
  topic: string;
  eyebrow: string;
  sections: ArticleSection[];
  keyTakeaways: string[];
  imageUrl?: string;
  imageAlt?: string;
  readingTimeMinutes: number;
  lastReviewedOn?: string;
  seoTitle?: string;
  seoDescription?: string;
  updatedAt: string;
  publishedAt?: string;
  sources: Array<{ title: string; url?: string }>;
};

/** Topic labels, in the order they should appear to a reader. */
export const articleTopics = [
  { value: "beginners", label: "Getting started", description: "The groundwork, explained without jargon." },
  { value: "growing-science", label: "How plants work", description: "What is happening inside the plant, and why it matters." },
  { value: "seasonal", label: "Through the year", description: "How conditions change, and what changes with them." },
  { value: "spaces", label: "Working with your space", description: "Light, weight, wind, and the limits of a small space." },
  { value: "materials", label: "Soil and materials", description: "What things are made of, and what that means for growing." },
  { value: "sustainability", label: "Growing responsibly", description: "Water, waste, peat, and what the evidence supports." },
] as const;

export function articleTopicLabel(value: string) {
  return articleTopics.find((topic) => topic.value === value)?.label ?? value;
}

function object(value: Json | undefined) {
  return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {};
}

function sections(value: Json): ArticleSection[] {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => {
    const item = object(entry);
    return typeof item.heading === "string" && typeof item.body === "string" ? [{ heading: item.heading, body: item.body }] : [];
  });
}

function strings(value: Json): string[] {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => (typeof entry === "string" && entry.trim() ? [entry] : []));
}

function sources(value: Json | undefined) {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => {
    const item = object(entry);
    return typeof item.title === "string" ? [{ title: item.title, url: typeof item.url === "string" ? item.url : undefined }] : [];
  });
}

export async function getPublishedArticles(): Promise<PublishedArticle[]> {
  const supabase = await createClient();
  const { data: contents, error } = await supabase
    .from("content_items")
    .select("id, slug, title, excerpt, body, seo_title, seo_description, updated_at, published_at")
    .eq("content_type", "article")
    .eq("status", "published")
    .order("published_at", { ascending: false });
  if (error || !contents?.length) return [];

  const { data: profiles } = await supabase
    .from("article_profiles")
    .select("content_id, topic, eyebrow, sections, key_takeaways, image_url, image_alt, reading_time_minutes, last_reviewed_on")
    .in("content_id", contents.map((item) => item.id));

  return contents.flatMap((content) => {
    const profile = profiles?.find((entry) => entry.content_id === content.id);
    if (!profile) return [];
    const body = object(content.body);
    return [{
      id: content.id,
      slug: content.slug,
      title: content.title,
      excerpt: content.excerpt ?? "",
      overview: typeof body.overview === "string" ? body.overview : "",
      topic: profile.topic,
      eyebrow: profile.eyebrow,
      sections: sections(profile.sections),
      keyTakeaways: strings(profile.key_takeaways),
      imageUrl: profile.image_url ?? undefined,
      imageAlt: profile.image_alt ?? undefined,
      readingTimeMinutes: profile.reading_time_minutes,
      lastReviewedOn: profile.last_reviewed_on ?? undefined,
      seoTitle: content.seo_title ?? undefined,
      seoDescription: content.seo_description ?? undefined,
      updatedAt: content.updated_at,
      publishedAt: content.published_at ?? undefined,
      sources: sources(body.sources),
    }];
  });
}

export async function getPublishedArticle(slug: string) {
  return (await getPublishedArticles()).find((article) => article.slug === slug);
}

export async function getArticlesByTopic(topic: string) {
  return (await getPublishedArticles()).filter((article) => article.topic === topic);
}
