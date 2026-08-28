"use client";

import { useMemo, useState } from "react";
import type { GraphEdge, GraphNode } from "@/lib/link-graph";

const typeLabels: Record<string, string> = {
  plant: "Plants", problem: "Problems", guide: "Guides", calendar: "Calendars",
  review: "Reviews", article: "Articles", page: "Pages", tool: "Tools",
};

/** Distinct hues that hold up against the panel background. */
const typeColours: Record<string, string> = {
  plant: "#2f7d52", problem: "#a45132", guide: "#6f5733", calendar: "#7a6a2f",
  review: "#8a4a35", article: "#2f6272", page: "#5b6b61", tool: "#4a6d8a",
};

const SIZE = 900;
const CENTRE = SIZE / 2;

type Placed = GraphNode & { x: number; y: number; r: number; isHub: boolean };

/**
 * The site drawn as clusters: each page that is linked to becomes a hub, with
 * the pages linking to it arranged around it.
 *
 * The arrangement is computed, not simulated. A force layout needs a dependency
 * and settles somewhere different on every visit, which makes it useless for
 * noticing that something changed; here the same site always draws the same
 * shape, so a difference reads as a difference. Hubs are ordered by how many
 * pages point at them, so the picture is stable as content grows.
 *
 * Radius follows inbound links, which is the question the view exists to answer:
 * which pages is the site actually pointing at.
 */
export function LinkGraphView({ nodes, edges }: { nodes: GraphNode[]; edges: GraphEdge[] }) {
  const [hovered, setHovered] = useState<string | null>(null);
  const [pinned, setPinned] = useState<string | null>(null);
  const [hiddenTypes, setHiddenTypes] = useState<Set<string>>(new Set());

  const active = pinned ?? hovered;

  const types = useMemo(
    () => [...new Set(nodes.map((n) => n.type))].sort((a, b) => (typeLabels[a] ?? a).localeCompare(typeLabels[b] ?? b)),
    [nodes],
  );

  const { placed, drawnEdges } = useMemo(() => {
    const visible = nodes.filter((n) => !hiddenTypes.has(n.type));
    const byId = new Map(visible.map((n) => [n.id, n]));
    const live = edges.filter((e) => byId.has(e.from) && byId.has(e.to));

    // A hub is any page something points at. Its satellites are the pages that
    // point at it; a page pointing at several hubs is drawn beside the first,
    // sorted so the choice never changes between visits.
    const hubIds = [...new Set(live.map((e) => e.to))]
      .sort((a, b) => (byId.get(b)!.inbound - byId.get(a)!.inbound) || a.localeCompare(b));

    const claimed = new Set(hubIds);
    const satellites = new Map<string, string[]>(hubIds.map((id) => [id, []]));
    for (const edge of [...live].sort((a, b) => a.from.localeCompare(b.from))) {
      if (claimed.has(edge.from)) continue;
      claimed.add(edge.from);
      satellites.get(edge.to)!.push(edge.from);
    }

    const loose = visible.filter((n) => !claimed.has(n.id)).sort((a, b) => a.type.localeCompare(b.type) || a.title.localeCompare(b.title));

    const out: Placed[] = [];
    const hubRingRadius = hubIds.length > 1 ? CENTRE - 190 : 0;

    hubIds.forEach((hubId, index) => {
      const hub = byId.get(hubId)!;
      const angle = (index / Math.max(hubIds.length, 1)) * Math.PI * 2 - Math.PI / 2;
      const hx = CENTRE + Math.cos(angle) * hubRingRadius;
      const hy = CENTRE + Math.sin(angle) * hubRingRadius;
      out.push({ ...hub, x: hx, y: hy, r: Math.min(11 + hub.inbound * 1.7, 30), isHub: true });

      const kids = satellites.get(hubId)!;
      const spread = Math.min(24 + kids.length * 4, 78);
      kids.forEach((childId, childIndex) => {
        const child = byId.get(childId)!;
        // Fan the satellites outward, away from the centre of the picture.
        const offset = ((childIndex + 0.5) / Math.max(kids.length, 1) - 0.5) * Math.PI * 1.35;
        const childAngle = angle + offset;
        out.push({
          ...child,
          x: hx + Math.cos(childAngle) * spread,
          y: hy + Math.sin(childAngle) * spread,
          r: 5,
          isHub: false,
        });
      });
    });

    // Pages nothing links to sit on the outer edge, visibly apart.
    loose.forEach((node, index) => {
      const angle = (index / Math.max(loose.length, 1)) * Math.PI * 2 - Math.PI / 2;
      out.push({ ...node, x: CENTRE + Math.cos(angle) * (CENTRE - 26), y: CENTRE + Math.sin(angle) * (CENTRE - 26), r: 4.5, isHub: false });
    });

    return { placed: out, drawnEdges: live };
  }, [nodes, edges, hiddenTypes]);

  const positions = useMemo(() => new Map(placed.map((n) => [n.id, n])), [placed]);

  const connected = useMemo(() => {
    if (!active) return null;
    const set = new Set<string>([active]);
    for (const edge of drawnEdges) {
      if (edge.from === active) set.add(edge.to);
      if (edge.to === active) set.add(edge.from);
    }
    return set;
  }, [active, drawnEdges]);

  const activeNode = active ? positions.get(active) : undefined;
  // Big hubs keep a permanent label; everything else is named on demand.
  const alwaysLabelled = placed.filter((n) => n.isHub && n.r >= 18);

  return (
    <div className="link-graph">
      <div className="link-graph-legend">
        {types.map((type) => {
          const off = hiddenTypes.has(type);
          return (
            <button
              type="button"
              key={type}
              className={off ? "off" : ""}
              aria-pressed={!off}
              onClick={() => setHiddenTypes((current) => {
                const next = new Set(current);
                if (next.has(type)) next.delete(type); else next.add(type);
                return next;
              })}
            >
              <i style={{ background: typeColours[type] ?? "#7d8a83" }} aria-hidden="true" />
              {typeLabels[type] ?? type}
              <small>{nodes.filter((n) => n.type === type).length}</small>
            </button>
          );
        })}
        {pinned && <button type="button" className="link-graph-clear" onClick={() => setPinned(null)}>Clear selection</button>}
      </div>

      <div className="link-graph-canvas">
        <svg viewBox={`0 0 ${SIZE} ${SIZE}`} role="img" aria-label={`Internal link map of ${placed.length} published pages`}>
          <g className="link-graph-edges">
            {drawnEdges.map((edge, index) => {
              const from = positions.get(edge.from);
              const to = positions.get(edge.to);
              if (!from || !to) return null;
              const dim = connected ? !(connected.has(edge.from) && connected.has(edge.to)) : false;
              return (
                <line
                  key={index}
                  x1={from.x} y1={from.y} x2={to.x} y2={to.y}
                  className={`${edge.kind === "gear" ? "gear" : "plain"}${dim ? " dim" : ""}`}
                />
              );
            })}
          </g>

          <g>
            {placed.map((node) => {
              const dim = connected ? !connected.has(node.id) : false;
              const isActive = node.id === active;
              return (
                <circle
                  key={node.id}
                  cx={node.x} cy={node.y} r={isActive ? node.r + 2 : node.r}
                  fill={typeColours[node.type] ?? "#7d8a83"}
                  className={`${dim ? "dim" : ""}${isActive ? " active" : ""}`}
                  onMouseEnter={() => setHovered(node.id)}
                  onMouseLeave={() => setHovered(null)}
                  onClick={() => setPinned((current) => (current === node.id ? null : node.id))}
                  onFocus={() => setHovered(node.id)}
                  onBlur={() => setHovered(null)}
                  onKeyDown={(event) => { if (event.key === "Enter" || event.key === " ") { event.preventDefault(); setPinned(node.id); } }}
                  tabIndex={0}
                  role="button"
                  aria-label={`${node.title}, ${node.inbound} inbound links`}
                >
                  <title>{`${node.title} — ${node.inbound} inbound, ${node.outbound} outbound`}</title>
                </circle>
              );
            })}
          </g>

          {/* Names: permanent inside the largest hubs, on demand for the rest. */}
          <g className="link-graph-labels" aria-hidden="true">
            {alwaysLabelled.map((node) => (
              <text key={node.id} x={node.x} y={node.y + 3} className="hub-label">
                {node.title.length > 16 ? `${node.title.slice(0, 15)}…` : node.title}
              </text>
            ))}
            {activeNode && !alwaysLabelled.some((n) => n.id === activeNode.id) && (
              <g className="floating-label">
                <rect
                  x={activeNode.x - Math.min(activeNode.title.length * 3.6, 130) - 8}
                  y={activeNode.y - activeNode.r - 30}
                  width={Math.min(activeNode.title.length * 7.2, 268) + 16}
                  height={24}
                  rx={6}
                />
                <text x={activeNode.x} y={activeNode.y - activeNode.r - 13}>
                  {activeNode.title.length > 36 ? `${activeNode.title.slice(0, 35)}…` : activeNode.title}
                </text>
              </g>
            )}
          </g>
        </svg>

        <div className="link-graph-readout" aria-live="polite">
          {activeNode ? (
            <>
              <span style={{ color: typeColours[activeNode.type] }}>{typeLabels[activeNode.type] ?? activeNode.type}</span>
              <strong>{activeNode.title}</strong>
              <dl>
                <div><dt>Linked from</dt><dd>{activeNode.inbound}</dd></div>
                <div><dt>Links out</dt><dd>{activeNode.outbound}</dd></div>
              </dl>
              <a href={activeNode.path} target="_blank" rel="noopener noreferrer">{activeNode.path}</a>
              {pinned === activeNode.id && <small>Click the page again to release it.</small>}
            </>
          ) : (
            <>
              <span>Map</span>
              <strong>{placed.length} published pages, {drawnEdges.length} editorial links</strong>
              <p>Hover a page to trace what connects to it, or click to keep it selected. Circle size follows inbound links; pages on the outer edge have none.</p>
            </>
          )}
        </div>
      </div>
    </div>
  );
}
