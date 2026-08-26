import "server-only";

import { createClient } from "@/lib/supabase/public";
import type { Json } from "@/lib/supabase/database.types";

export type InstitutionalSection = { heading: string; body: string };
export type PublishedInstitutionalPage = {
  id: string;
  slug: string;
  title: string;
  excerpt: string;
  overview: string;
  pageKind: string;
  eyebrow: string;
  notice: string;
  contactEmail?: string;
  lastReviewedOn?: string;
  requiresLegalReview: boolean;
  sections: InstitutionalSection[];
  seoTitle?: string;
  seoDescription?: string;
  updatedAt: string;
  sources: Array<{ title: string; url?: string }>;
};

function object(value: Json | undefined) { return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {}; }
function sections(value: Json): InstitutionalSection[] {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => { const item = object(entry); return typeof item.heading === "string" && typeof item.body === "string" ? [{ heading: item.heading, body: item.body }] : []; });
}
function sources(value: Json | undefined) {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => { const item = object(entry); return typeof item.title === "string" ? [{ title: item.title, url: typeof item.url === "string" ? item.url : undefined }] : []; });
}

export async function getPublishedInstitutionalPages(): Promise<PublishedInstitutionalPage[]> {
  const supabase = await createClient();
  const { data: contents, error } = await supabase.from("content_items").select("id, slug, title, excerpt, body, seo_title, seo_description, updated_at").eq("content_type", "page").eq("status", "published").order("title");
  if (error || !contents?.length) return [];
  const { data: profiles } = await supabase.from("institutional_page_profiles").select("content_id, page_kind, eyebrow, sections, notice, contact_email, last_reviewed_on, requires_legal_review").in("content_id", contents.map((item) => item.id));
  return contents.flatMap((content) => {
    const profile = profiles?.find((entry) => entry.content_id === content.id);
    if (!profile) return [];
    const body = object(content.body);
    return [{
      id: content.id, slug: content.slug, title: content.title, excerpt: content.excerpt ?? "", overview: typeof body.overview === "string" ? body.overview : "",
      pageKind: profile.page_kind, eyebrow: profile.eyebrow, notice: profile.notice, contactEmail: profile.contact_email ?? undefined,
      lastReviewedOn: profile.last_reviewed_on ?? undefined, requiresLegalReview: profile.requires_legal_review,
      sections: sections(profile.sections), seoTitle: content.seo_title ?? undefined, seoDescription: content.seo_description ?? undefined,
      updatedAt: content.updated_at, sources: sources(body.sources),
    }];
  });
}

export async function getPublishedInstitutionalPage(slug: string) { return (await getPublishedInstitutionalPages()).find((page) => page.slug === slug); }
