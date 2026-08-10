import "server-only";
import { createClient } from "@/lib/supabase/server";

export const searchContentTypes = ["plant", "problem", "guide", "calendar", "review", "page", "tool"] as const;
export type SearchContentType = (typeof searchContentTypes)[number];

export type SearchResult = {
  id: string;
  contentType: SearchContentType;
  title: string;
  slug: string;
  excerpt: string;
  route: string;
  rank: number;
  updatedAt: string;
};

export type SearchSuggestion = {
  query: string;
  label: string;
  contentType: SearchContentType;
  route: string;
};

export function readSearchContentType(value: string | undefined) {
  return searchContentTypes.find((contentType) => contentType === value);
}

export async function searchPublishedContent(query: string, contentType?: SearchContentType) {
  const normalizedQuery = query.trim().replace(/\s+/g, " ").slice(0, 120);
  if (normalizedQuery.length < 2) return { results: [] as SearchResult[], error: null };

  const supabase = await createClient();
  const { data, error } = await supabase.rpc("search_published_content", {
    search_query: normalizedQuery,
    filter_content_type: contentType ?? undefined,
    result_limit: 36,
  });

  if (error) return { results: [] as SearchResult[], error: "Search is temporarily unavailable." };
  return {
    results: data.map((result) => ({
      id: result.id,
      contentType: result.content_type as SearchContentType,
      title: result.title,
      slug: result.slug,
      excerpt: result.excerpt ?? "Open this published Natura resource.",
      route: result.route,
      rank: result.rank,
      updatedAt: result.updated_at,
    })),
    error: null,
  };
}

export async function getSearchSuggestions(query: string) {
  const normalizedQuery = query.trim().replace(/\s+/g, " ").slice(0, 120);
  const supabase = await createClient();
  const { data, error } = await supabase.rpc("suggest_published_searches", {
    search_query: normalizedQuery,
    suggestion_limit: 8,
  });

  if (error) return [] as SearchSuggestion[];
  return data.map((suggestion) => ({
    query: suggestion.query,
    label: suggestion.label,
    contentType: suggestion.content_type as SearchContentType,
    route: suggestion.route,
  }));
}
