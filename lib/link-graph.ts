import "server-only";

import { requireAdmin } from "@/lib/auth";

export type GraphNode = {
  id: string;
  slug: string;
  title: string;
  type: string;
  status: string;
  /** Public path, so a node can be opened straight from the graph. */
  path: string;
  inbound: number;
  outbound: number;
};

export type GraphEdge = { from: string; to: string; kind: string };

export type LinkGraph = {
  nodes: GraphNode[];
  edges: GraphEdge[];
  /** Published pages nothing links to. They rely entirely on the menu and the sitemap. */
  orphans: GraphNode[];
};

const publicPath: Record<string, (slug: string) => string> = {
  plant: (slug) => `/plants/${slug}`,
  problem: (slug) => `/plant-care/problems/${slug}`,
  guide: (slug) => `/small-space-gardening/guides/${slug}`,
  calendar: (slug) => `/planting-calendar/calendars/${slug}`,
  review: (slug) => `/reviews/${slug}`,
  article: (slug) => `/learn/${slug}`,
  page: (slug) => `/${slug}`,
  tool: (slug) => `/tools/${slug}`,
};

/**
 * Every published page and the editorial links between them.
 *
 * Internal linking decides which pages accumulate authority and which readers
 * ever reach, and until now it could only be judged by opening pages one at a
 * time. Reading it as a whole makes two things visible that a list cannot: which
 * pages nothing points at, and whether the commercial pages are actually being
 * fed by the informational ones.
 *
 * The link tables are read directly rather than through the public content
 * libraries, because this view is about structure, not about rendering any one
 * page.
 */
export async function getLinkGraph(): Promise<LinkGraph> {
  const { supabase } = await requireAdmin();

  const [{ data: items }, { data: reviewLinks }, { data: problemLinks }, { data: guideLinks }, { data: calendarLinks }] =
    await Promise.all([
      supabase.from("content_items").select("id, slug, title, content_type, status").eq("status", "published").order("content_type"),
      supabase.from("content_review_links").select("content_id, review_content_id"),
      supabase.from("problem_plant_links").select("problem_content_id, plant_content_id"),
      supabase.from("guide_plant_links").select("guide_content_id, plant_content_id"),
      supabase.from("calendar_plant_links").select("calendar_content_id, plant_content_id"),
    ]);

  const nodes: GraphNode[] = (items ?? []).map((item) => ({
    id: item.id,
    slug: item.slug,
    title: item.title,
    type: item.content_type,
    status: item.status,
    path: (publicPath[item.content_type] ?? ((slug: string) => `/${slug}`))(item.slug),
    inbound: 0,
    outbound: 0,
  }));
  const known = new Set(nodes.map((node) => node.id));

  const edges: GraphEdge[] = [
    ...(reviewLinks ?? []).map((l) => ({ from: l.content_id, to: l.review_content_id, kind: "gear" })),
    ...(problemLinks ?? []).map((l) => ({ from: l.problem_content_id, to: l.plant_content_id, kind: "plant" })),
    ...(guideLinks ?? []).map((l) => ({ from: l.guide_content_id, to: l.plant_content_id, kind: "plant" })),
    ...(calendarLinks ?? []).map((l) => ({ from: l.calendar_content_id, to: l.plant_content_id, kind: "plant" })),
  ].filter((edge) => known.has(edge.from) && known.has(edge.to));

  const byId = new Map(nodes.map((node) => [node.id, node]));
  for (const edge of edges) {
    const from = byId.get(edge.from);
    const to = byId.get(edge.to);
    if (from) from.outbound += 1;
    if (to) to.inbound += 1;
  }

  return { nodes, edges, orphans: nodes.filter((node) => node.inbound === 0) };
}
