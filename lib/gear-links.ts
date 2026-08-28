import "server-only";

import { createClient } from "@/lib/supabase/public";

export type GearLink = {
  reviewSlug: string;
  reviewTitle: string;
  anchorText: string;
  contextNote: string;
};

/**
 * Editorial links from a piece of informational content to a review.
 *
 * Reviews are the only pages that can earn a commission, so this is the route
 * between the writing that attracts readers and the page that pays for it. The
 * pairings are chosen by an editor rather than derived from a category, because
 * a link only works when the text around it is genuinely about the thing being
 * linked.
 */
export async function getGearLinks(contentId: string): Promise<GearLink[]> {
  const supabase = await createClient();

  const { data: links, error } = await supabase
    .from("content_review_links")
    .select("review_content_id, anchor_text, context_note, sort_order")
    .eq("content_id", contentId)
    .order("sort_order");
  if (error || !links?.length) return [];

  const { data: reviews } = await supabase
    .from("content_items")
    .select("id, slug, title")
    .eq("content_type", "review")
    .eq("status", "published")
    .in("id", links.map((link) => link.review_content_id));
  if (!reviews?.length) return [];

  return links.flatMap((link) => {
    const review = reviews.find((entry) => entry.id === link.review_content_id);
    if (!review) return [];
    return [{
      reviewSlug: review.slug,
      reviewTitle: review.title,
      anchorText: link.anchor_text,
      contextNote: link.context_note,
    }];
  });
}
