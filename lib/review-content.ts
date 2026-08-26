import "server-only";

import { createClient } from "@/lib/supabase/public";
import type { Json } from "@/lib/supabase/database.types";

export type ReviewCriterion = { id: string; name: string; description: string; weight: number };
export type ReviewProduct = {
  id: string; name: string; brand: string; model: string; productUrl?: string; imageUrl?: string; imageAlt?: string;
  priceNote: string; verdictLabel: string; overallScore: number; pros: string[]; cons: string[];
  specifications: Record<string, string>; recommended: boolean; scores: Record<string, number>;
};
export type PublishedReview = {
  id: string; slug: string; title: string; excerpt: string; overview: string; reviewType: string; category: string;
  evidenceLevel: string; methodology: string; testingPeriod: string; disclosureType: string; disclosureText: string;
  verdict: string; bestFor: string[]; testedOn?: string; seoTitle?: string; seoDescription?: string; updatedAt: string;
  sources: Array<{ title: string; url?: string }>; criteria: ReviewCriterion[]; products: ReviewProduct[];
};

function object(value: Json | undefined) { return value && typeof value === "object" && !Array.isArray(value) ? value as Record<string, Json | undefined> : {}; }
function specifications(value: Json): Record<string, string> {
  const source = object(value);
  return Object.fromEntries(Object.entries(source).flatMap(([key, item]) => typeof item === "string" ? [[key, item]] : []));
}
function sources(value: Json | undefined) {
  if (!Array.isArray(value)) return [];
  return value.flatMap((entry) => { const item = object(entry); return typeof item.title === "string" ? [{ title: item.title, url: typeof item.url === "string" ? item.url : undefined }] : []; });
}

export async function getPublishedReviews(): Promise<PublishedReview[]> {
  const supabase = await createClient();
  const { data: contents, error } = await supabase.from("content_items").select("id, slug, title, excerpt, body, seo_title, seo_description, updated_at").eq("content_type", "review").eq("status", "published").order("updated_at", { ascending: false });
  if (error || !contents?.length) return [];
  const ids = contents.map((item) => item.id);
  const [{ data: profiles }, { data: criteria }, { data: products }] = await Promise.all([
    supabase.from("review_profiles").select("content_id, review_type, category, evidence_level, methodology, testing_period, disclosure_type, disclosure_text, verdict, best_for, tested_on").in("content_id", ids),
    supabase.from("review_criteria").select("id, review_content_id, name, description, weight, sort_order").in("review_content_id", ids).order("sort_order"),
    supabase.from("review_products").select("id, review_content_id, name, brand, model, product_url, image_url, image_alt, price_note, verdict_label, overall_score, pros, cons, specifications, is_recommended, sort_order").in("review_content_id", ids).order("sort_order"),
  ]);
  const productIds = (products ?? []).map((product) => product.id);
  const { data: scores } = productIds.length ? await supabase.from("review_product_scores").select("product_id, criterion_id, score").in("product_id", productIds) : { data: [] };
  return contents.flatMap((content) => {
    const profile = profiles?.find((entry) => entry.content_id === content.id);
    if (!profile) return [];
    const body = object(content.body);
    const reviewCriteria = (criteria ?? []).filter((item) => item.review_content_id === content.id).map((item) => ({ id: item.id, name: item.name, description: item.description, weight: Number(item.weight) }));
    const reviewProducts = (products ?? []).filter((item) => item.review_content_id === content.id).map((item) => ({
      id: item.id, name: item.name, brand: item.brand, model: item.model, productUrl: item.product_url ?? undefined,
      imageUrl: item.image_url ?? undefined, imageAlt: item.image_alt ?? undefined, priceNote: item.price_note,
      verdictLabel: item.verdict_label, overallScore: Number(item.overall_score), pros: item.pros, cons: item.cons,
      specifications: specifications(item.specifications), recommended: item.is_recommended,
      scores: Object.fromEntries((scores ?? []).filter((score) => score.product_id === item.id).map((score) => [score.criterion_id, Number(score.score)])),
    }));
    return [{
      id: content.id, slug: content.slug, title: content.title, excerpt: content.excerpt ?? "", overview: typeof body.overview === "string" ? body.overview : "",
      reviewType: profile.review_type, category: profile.category, evidenceLevel: profile.evidence_level, methodology: profile.methodology,
      testingPeriod: profile.testing_period, disclosureType: profile.disclosure_type, disclosureText: profile.disclosure_text,
      verdict: profile.verdict, bestFor: profile.best_for, testedOn: profile.tested_on ?? undefined,
      seoTitle: content.seo_title ?? undefined, seoDescription: content.seo_description ?? undefined, updatedAt: content.updated_at,
      sources: sources(body.sources), criteria: reviewCriteria, products: reviewProducts,
    }];
  });
}

export async function getPublishedReview(slug: string) { return (await getPublishedReviews()).find((review) => review.slug === slug); }
