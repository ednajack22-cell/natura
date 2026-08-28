import "server-only";

import { requireAdmin } from "@/lib/auth";

export type GraphNode = {
  id: string;
  slug: string;
  title: string;
  type: string;
  status: string;
  /** Public path, so a node can be opened straight from the map. */
  path: string;
  inbound: number;
  outbound: number;
  /** Inbound links from another page's body, ignoring the listing that indexes it. */
  editorialInbound: number;
};

export type GraphEdge = { from: string; to: string; kind: "listing" | "editorial" | "gear" };

export type LinkGraph = {
  nodes: GraphNode[];
  edges: GraphEdge[];
  /**
   * Pages no other page's body points at. They are indexed by their listing and
   * the sitemap, which is enough to be found and not enough to be recommended.
   */
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
 * Fixed pages: routes that exist in the application rather than as content rows.
 *
 * Leaving them out made the map describe the content library instead of the
 * site. They are also the pages that distribute the most internal links, since
 * each listing points at everything it indexes, so a link map without them shows
 * almost none of the linking that actually exists.
 *
 * `indexes` names the content type a listing enumerates, which is how those
 * links are recovered.
 */
const fixedPages: Array<{ id: string; title: string; path: string; type: string; indexes?: string; parent?: string }> = [
  { id: "route:home", title: "Home", path: "/", type: "section" },
  { id: "route:start-here", title: "Start here", path: "/start-here", type: "section", parent: "route:home" },
  { id: "route:search", title: "Search", path: "/search", type: "section", parent: "route:home" },
  { id: "route:grow", title: "Plant library", path: "/grow", type: "section", indexes: "plant", parent: "route:home" },
  { id: "route:learn", title: "Articles", path: "/learn", type: "section", indexes: "article", parent: "route:home" },
  { id: "route:plant-care", title: "Plant care", path: "/plant-care", type: "section", parent: "route:home" },
  { id: "route:problems", title: "Problem library", path: "/plant-care/problems", type: "section", indexes: "problem", parent: "route:plant-care" },
  { id: "route:small-space", title: "Small-space gardening", path: "/small-space-gardening", type: "section", parent: "route:home" },
  { id: "route:guides", title: "Guide library", path: "/small-space-gardening/guides", type: "section", indexes: "guide", parent: "route:small-space" },
  { id: "route:calendar", title: "Planting calendar", path: "/planting-calendar", type: "section", parent: "route:home" },
  { id: "route:calendars", title: "Calendar library", path: "/planting-calendar/calendars", type: "section", indexes: "calendar", parent: "route:calendar" },
  { id: "route:tools", title: "Tools", path: "/tools", type: "section", indexes: "tool", parent: "route:home" },
  { id: "route:garden-profile", title: "Garden profile", path: "/tools/garden-profile", type: "section", parent: "route:tools" },
  { id: "route:reviews", title: "Reviews", path: "/reviews", type: "section", indexes: "review", parent: "route:home" },
  { id: "route:methodology", title: "Calendar methodology", path: "/research/calendar-methodology", type: "section", parent: "route:calendar" },
];

/**
 * Every published page and the links between them.
 *
 * Three kinds of link, kept apart because they answer different questions. A
 * listing link is automatic — a library page points at everything it indexes, so
 * it says nothing about editorial judgement. An editorial link is a deliberate
 * connection written into a page. A gear link runs from writing to a review, and
 * is the only kind that can earn.
 *
 * "Orphan" therefore means no editorial or gear link points at the page, not
 * that nothing does: almost everything has a listing link, and counting those
 * would hide the gap rather than show it.
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

  const contentNodes: GraphNode[] = (items ?? []).map((item) => ({
    id: item.id,
    slug: item.slug,
    title: item.title,
    type: item.content_type,
    status: item.status,
    path: (publicPath[item.content_type] ?? ((slug: string) => `/${slug}`))(item.slug),
    inbound: 0,
    outbound: 0,
    editorialInbound: 0,
  }));

  // A fixed route can collide with a content page: /start-here is declared here
  // for the menu structure and also exists as an institutional page. The content
  // row wins, since it is the thing an editor can actually change, and the fixed
  // entry is dropped so the page is drawn once rather than twice.
  const contentPaths = new Set(contentNodes.map((node) => node.path));
  const routeNodes: GraphNode[] = fixedPages.filter((page) => !contentPaths.has(page.path)).map((page) => ({
    id: page.id,
    slug: page.path,
    title: page.title,
    type: page.type,
    status: "published",
    path: page.path,
    inbound: 0,
    outbound: 0,
    editorialInbound: 0,
  }));

  const nodes = [...routeNodes, ...contentNodes];
  const known = new Set(nodes.map((node) => node.id));

  const editorial: GraphEdge[] = [
    ...(reviewLinks ?? []).map((l) => ({ from: l.content_id, to: l.review_content_id, kind: "gear" as const })),
    ...(problemLinks ?? []).map((l) => ({ from: l.problem_content_id, to: l.plant_content_id, kind: "editorial" as const })),
    ...(guideLinks ?? []).map((l) => ({ from: l.guide_content_id, to: l.plant_content_id, kind: "editorial" as const })),
    ...(calendarLinks ?? []).map((l) => ({ from: l.calendar_content_id, to: l.plant_content_id, kind: "editorial" as const })),
  ].filter((edge) => known.has(edge.from) && known.has(edge.to));

  const listing: GraphEdge[] = [
    // Each library points at everything it indexes.
    ...fixedPages.flatMap((page) =>
      page.indexes
        ? contentNodes.filter((node) => node.type === page.indexes).map((node) => ({ from: page.id, to: node.id, kind: "listing" as const }))
        : [],
    ),
    // And the section pages hang off the pages above them.
    ...fixedPages.flatMap((page) => (page.parent ? [{ from: page.parent, to: page.id, kind: "listing" as const }] : [])),
    // Institutional pages are reached from the footer, which every page carries.
    ...contentNodes.filter((node) => node.type === "page").map((node) => ({ from: "route:home", to: node.id, kind: "listing" as const })),
  ];

  const pathToId = new Map(nodes.map((node) => [node.path, node.id]));
  const fixedById = new Map(fixedPages.map((page) => [page.id, page]));
  const resolve = (id: string) => {
    const fixed = fixedById.get(id);
    if (!fixed) return id;
    return pathToId.get(fixed.path) ?? id;
  };
  const edges = [...listing, ...editorial]
    .map((edge) => ({ ...edge, from: resolve(edge.from), to: resolve(edge.to) }))
    .filter((edge) => edge.from !== edge.to && known.has(edge.from) && known.has(edge.to));

  const byId = new Map(nodes.map((node) => [node.id, node]));
  for (const edge of edges) {
    const from = byId.get(edge.from);
    const to = byId.get(edge.to);
    if (from) from.outbound += 1;
    if (to) {
      to.inbound += 1;
      if (edge.kind !== "listing") to.editorialInbound += 1;
    }
  }

  return { nodes, edges, orphans: nodes.filter((node) => node.type !== "section" && node.editorialInbound === 0) };
}
