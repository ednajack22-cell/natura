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

const SIZE = 760;
const CENTRE = SIZE / 2;

/**
 * The whole site as one picture.
 *
 * Positions are computed here rather than simulated: a force layout would need a
 * dependency and would place the same site differently on every visit, which
 * makes it useless for noticing that something changed. Nodes sit on a ring,
 * grouped into arcs by type, so the shape is stable between visits and a missing
 * or newly connected page is visible as a difference rather than a redraw.
 *
 * Radius follows inbound links, so the pages the site actually points at read as
 * the largest — which is the question this view exists to answer.
 */
export function LinkGraphView({ nodes, edges }: { nodes: GraphNode[]; edges: GraphEdge[] }) {
  const [active, setActive] = useState<string | null>(null);
  const [hiddenTypes, setHiddenTypes] = useState<Set<string>>(new Set());

  const types = useMemo(
    () => [...new Set(nodes.map((n) => n.type))].sort((a, b) => (typeLabels[a] ?? a).localeCompare(typeLabels[b] ?? b)),
    [nodes],
  );

  const visible = useMemo(() => nodes.filter((n) => !hiddenTypes.has(n.type)), [nodes, hiddenTypes]);

  const placed = useMemo(() => {
    const ordered = [...visible].sort((a, b) => a.type.localeCompare(b.type) || a.title.localeCompare(b.title));
    const gap = 0.12; // radians of breathing room between type arcs
    return ordered.map((node, index) => {
      const angle = (index / Math.max(ordered.length, 1)) * Math.PI * 2 - Math.PI / 2 + gap;
      const radius = CENTRE - 90;
      return {
        ...node,
        x: CENTRE + Math.cos(angle) * radius,
        y: CENTRE + Math.sin(angle) * radius,
        r: Math.min(4 + node.inbound * 2.2, 15),
      };
    });
  }, [visible]);

  const positions = useMemo(() => new Map(placed.map((n) => [n.id, n])), [placed]);
  const drawnEdges = useMemo(
    () => edges.filter((e) => positions.has(e.from) && positions.has(e.to)),
    [edges, positions],
  );

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
      </div>

      <div className="link-graph-canvas">
        <svg viewBox={`0 0 ${SIZE} ${SIZE}`} role="img" aria-label={`Internal link map of ${placed.length} published pages`}>
          <g className="link-graph-edges">
            {drawnEdges.map((edge, index) => {
              const from = positions.get(edge.from)!;
              const to = positions.get(edge.to)!;
              const dim = connected ? !(connected.has(edge.from) && connected.has(edge.to)) : false;
              return (
                <path
                  key={index}
                  d={`M ${from.x} ${from.y} Q ${CENTRE} ${CENTRE} ${to.x} ${to.y}`}
                  className={`${edge.kind === "gear" ? "gear" : "plain"}${dim ? " dim" : ""}`}
                />
              );
            })}
          </g>
          <g>
            {placed.map((node) => {
              const dim = connected ? !connected.has(node.id) : false;
              return (
                <circle
                  key={node.id}
                  cx={node.x}
                  cy={node.y}
                  r={node.r}
                  fill={typeColours[node.type] ?? "#7d8a83"}
                  className={dim ? "dim" : ""}
                  onMouseEnter={() => setActive(node.id)}
                  onMouseLeave={() => setActive(null)}
                  tabIndex={0}
                  onFocus={() => setActive(node.id)}
                  onBlur={() => setActive(null)}
                >
                  <title>{`${node.title} — ${node.inbound} inbound, ${node.outbound} outbound`}</title>
                </circle>
              );
            })}
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
            </>
          ) : (
            <>
              <span>Map</span>
              <strong>{placed.length} published pages, {drawnEdges.length} editorial links</strong>
              <p>Hover or tab to a page to trace what connects to it. Circle size follows inbound links.</p>
            </>
          )}
        </div>
      </div>
    </div>
  );
}
