import "server-only";

import { createClient } from "@/lib/supabase/public";

export type PublicEditorialMeta = {
  authorName?: string;
  authorSlug?: string;
  reviewerName?: string;
  reviewerSlug?: string;
  publishedAt?: string;
  updatedAt?: string;
};

export async function getPublicEditorialMeta(slug: string): Promise<PublicEditorialMeta> {
  try {
    const supabase = await createClient();
    const { data, error } = await supabase.rpc("get_public_editorial_meta", { content_slug: slug });
    const row = data?.[0];
    if (error || !row) return {};
    return { authorName: row.author_name ?? undefined, authorSlug: row.author_slug ?? undefined, reviewerName: row.reviewer_name ?? undefined, reviewerSlug: row.reviewer_slug ?? undefined, publishedAt: row.published_at ?? undefined, updatedAt: row.updated_at ?? undefined };
  } catch { return {}; }
}

export function editorialAuthorSchema(meta: PublicEditorialMeta) {
  return meta.authorName ? { "@type": "Person", name: meta.authorName, url: `/authors#${meta.authorSlug}` } : { "@type": "Organization", name: "Natura Editorial Desk" };
}

export function breadcrumbSchema(items: Array<{ name: string; item: string }>) {
  return { "@context": "https://schema.org", "@type": "BreadcrumbList", itemListElement: items.map((item, index) => ({ "@type": "ListItem", position: index + 1, name: item.name, item: item.item })) };
}
