"use client";

import { useCallback, useEffect, useMemo, useRef, useState } from "react";
import type { GraphEdge, GraphNode } from "@/lib/link-graph";

const typeLabels: Record<string, string> = {
  plant: "Plants", problem: "Problems", guide: "Guides", calendar: "Calendars",
  review: "Reviews", article: "Articles", page: "Pages", tool: "Tools", section: "Section pages",
};

const typeColours: Record<string, string> = {
  plant: "#2f7d52", problem: "#a45132", guide: "#6f5733", calendar: "#7a6a2f",
  review: "#8a4a35", article: "#2f6272", page: "#5b6b61", tool: "#4a6d8a", section: "#173126",
};

const WIDTH = 900;
const DOT_X = 470;          // every page sits on one vertical line
const GROUP_GAP = 22;
const HEADER_HEIGHT = 34;
const ROW_HEIGHT = 24;

type Row = GraphNode & { x: number; y: number; r: number; isHeader: boolean };

/**
 * The site as a tree, with editorial links drawn over it.
 *
 * The previous drawing placed every page on a spiral and joined them with lines,
 * which produced 2104 crossings over 144 edges — unreadable whatever the colours.
 * Most of those lines carried no information: 70 of them ran from a library to
 * something it lists, and that relationship is containment, which position shows
 * without drawing anything at all.
 *
 * So listing links became indentation, and only the 74 editorial links are drawn.
 * They arc through a gutter beside the column, which is legible because every
 * page sits on one vertical line and an arc can only ever bulge one way.
 */
export function LinkGraphView({ nodes, edges }: { nodes: GraphNode[]; edges: GraphEdge[] }) {
  const [hovered, setHovered] = useState<string | null>(null);
  const [pinned, setPinned] = useState<string | null>(null);
  const [hiddenTypes, setHiddenTypes] = useState<Set<string>>(new Set());
  /** Sections start closed: fourteen headings fit on a screen, seventy rows do not. */
  const [expanded, setExpanded] = useState<Set<string>>(new Set());
  /** The actionable view: only pages no other page recommends. */
  const [onlyUnlinked, setOnlyUnlinked] = useState(false);
  const [view, setView] = useState({ k: 1, x: 0, y: 0 });
  const [grabbing, setGrabbing] = useState(false);

  const svgRef = useRef<SVGSVGElement>(null);
  const sceneRef = useRef<SVGGElement>(null);
  const dragRef = useRef<{ startX: number; startY: number; movedFar: boolean; originX: number; originY: number; id: string | null } | null>(null);

  const active = pinned ?? hovered;

  const types = useMemo(
    () => [...new Set(nodes.map((n) => n.type))].sort((a, b) => (typeLabels[a] ?? a).localeCompare(typeLabels[b] ?? b)),
    [nodes],
  );

  const { rows, arcs, height, summaries } = useMemo(() => {
    const visible = nodes.filter((n) => !hiddenTypes.has(n.type));
    const byId = new Map(visible.map((n) => [n.id, n]));

    // Listing links describe containment, so they build the tree instead of
    // being drawn: a page appears under the library that lists it.
    const childrenOf = new Map<string, string[]>();
    const hasParent = new Set<string>();
    for (const edge of edges) {
      if (edge.kind !== "listing") continue;
      if (!byId.has(edge.from) || !byId.has(edge.to)) continue;
      if (hasParent.has(edge.to)) continue;
      hasParent.add(edge.to);
      const list = childrenOf.get(edge.from) ?? [];
      list.push(edge.to);
      childrenOf.set(edge.from, list);
    }

    const sections = visible
      .filter((n) => n.type === "section")
      .sort((a, b) => (childrenOf.get(b.id)?.length ?? 0) - (childrenOf.get(a.id)?.length ?? 0) || a.title.localeCompare(b.title));

    const placedRows: Row[] = [];
    let y = 28;

    const pushGroup = (header: GraphNode | null, members: GraphNode[], label?: string) => {
      if (!members.length && !header) return;
      if (header) {
        placedRows.push({ ...header, x: DOT_X, y, r: 7, isHeader: true });
      } else if (label) {
        placedRows.push({
          id: `label:${label}`, slug: "", title: label, type: "section", status: "published", path: "",
          inbound: 0, outbound: 0, editorialInbound: 0, x: DOT_X, y, r: 0, isHeader: true,
        });
      }
      y += HEADER_HEIGHT;
      for (const member of members) {
        placedRows.push({ ...member, x: DOT_X, y, r: 5, isHeader: false });
        y += ROW_HEIGHT;
      }
      y += GROUP_GAP;
    };

    const shown = new Set<string>();
    const summaries = new Map<string, { total: number; unlinked: number }>();
    for (const section of sections) {
      const all = (childrenOf.get(section.id) ?? [])
        .map((id) => byId.get(id))
        .filter((n): n is GraphNode => Boolean(n) && n!.type !== "section")
        .sort((a, b) => b.editorialInbound - a.editorialInbound || a.title.localeCompare(b.title));
      const members = onlyUnlinked ? all.filter((n) => n.editorialInbound === 0) : all;
      summaries.set(section.id, { total: all.length, unlinked: all.filter((n) => n.editorialInbound === 0).length });
      shown.add(section.id);
      all.forEach((m) => shown.add(m.id));
      // A closed section still shows its heading and its counts.
      pushGroup(section, expanded.has(section.id) ? members : []);
    }

    const leftoversAll = visible.filter((n) => !shown.has(n.id)).sort((a, b) => a.type.localeCompare(b.type) || a.title.localeCompare(b.title));
    const leftovers = onlyUnlinked ? leftoversAll.filter((n) => n.editorialInbound === 0) : leftoversAll;
    if (leftoversAll.length) {
      summaries.set("label:Not listed anywhere", { total: leftoversAll.length, unlinked: leftoversAll.filter((n) => n.editorialInbound === 0).length });
      pushGroup(null, expanded.has("label:Not listed anywhere") ? leftovers : [], "Not listed anywhere");
    }

    const rowById = new Map(placedRows.map((r) => [r.id, r]));
    const drawn = edges
      .filter((e) => e.kind !== "listing" && rowById.has(e.from) && rowById.has(e.to))
      .map((e) => ({ ...e, a: rowById.get(e.from)!, b: rowById.get(e.to)! }));

    return { rows: placedRows, arcs: drawn, height: y + 20, summaries };
  }, [nodes, edges, hiddenTypes, expanded, onlyUnlinked]);

  const connected = useMemo(() => {
    if (!active) return null;
    const set = new Set<string>([active]);
    for (const arc of arcs) {
      if (arc.from === active) set.add(arc.to);
      if (arc.to === active) set.add(arc.from);
    }
    return set;
  }, [active, arcs]);

  const activeRow = active ? rows.find((r) => r.id === active) : undefined;

  const zoomBy = useCallback((factor: number, clientX?: number, clientY?: number) => {
    const svg = svgRef.current;
    setView((current) => {
      const k = Math.min(Math.max(current.k * factor, 0.35), 4);
      const ratio = k / current.k;
      if (!svg || clientX === undefined || clientY === undefined) {
        const cx = WIDTH / 2, cy = 300;
        return { k, x: cx - (cx - current.x) * ratio, y: cy - (cy - current.y) * ratio };
      }
      const box = svg.getBoundingClientRect();
      const px = ((clientX - box.left) / box.width) * WIDTH;
      const py = ((clientY - box.top) / box.height) * (box.height / box.width) * WIDTH;
      return { k, x: px - (px - current.x) * ratio, y: py - (py - current.y) * ratio };
    });
  }, []);

  useEffect(() => {
    const svg = svgRef.current;
    if (!svg) return;
    const onWheel = (event: WheelEvent) => {
      if (!event.ctrlKey && !event.metaKey) return; // plain scroll should still scroll the page
      event.preventDefault();
      zoomBy(event.deltaY < 0 ? 1.12 : 1 / 1.12, event.clientX, event.clientY);
    };
    svg.addEventListener("wheel", onWheel, { passive: false });
    return () => svg.removeEventListener("wheel", onWheel);
  }, [zoomBy]);

  return (
    <div className="link-tree">
      <div className="link-graph-legend">
        {types.filter((t) => t !== "section").map((type) => {
          const off = hiddenTypes.has(type);
          return (
            <button
              type="button" key={type} className={off ? "off" : ""} aria-pressed={!off}
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
        <button
          type="button"
          className={onlyUnlinked ? "tree-filter on" : "tree-filter"}
          aria-pressed={onlyUnlinked}
          onClick={() => setOnlyUnlinked((current) => !current)}
        >
          Only pages with nothing linking in
        </button>
        <button
          type="button"
          className="tree-filter"
          onClick={() => setExpanded((current) => (current.size ? new Set() : new Set(rows.filter((r) => r.isHeader).map((r) => r.id))))}
        >
          {expanded.size ? "Collapse all" : "Expand all"}
        </button>
        {pinned && <button type="button" className="link-graph-clear" onClick={() => setPinned(null)}>Clear selection</button>}
        <span className="link-graph-zoom">
          <button type="button" onClick={() => zoomBy(1 / 1.25)} aria-label="Zoom out">−</button>
          <b>{Math.round(view.k * 100)}%</b>
          <button type="button" onClick={() => zoomBy(1.25)} aria-label="Zoom in">+</button>
          <button type="button" onClick={() => setView({ k: 1, x: 0, y: 0 })} disabled={view.k === 1 && view.x === 0 && view.y === 0}>Reset</button>
        </span>
      </div>

      <div className="link-tree-canvas">
        <svg
          ref={svgRef}
          viewBox={`0 0 ${WIDTH} ${height}`}
          role="img"
          aria-label={`Site structure: ${rows.filter((r) => !r.isHeader).length} pages and ${arcs.length} editorial links`}
          className={grabbing ? "grabbing" : ""}
          onPointerDown={(event) => {
            dragRef.current = { id: null, startX: event.clientX, startY: event.clientY, movedFar: false, originX: view.x, originY: view.y };
            setGrabbing(true);
            event.currentTarget.setPointerCapture(event.pointerId);
          }}
          onPointerMove={(event) => {
            const drag = dragRef.current;
            if (!drag) return;
            const dx = event.clientX - drag.startX, dy = event.clientY - drag.startY;
            if (!drag.movedFar && Math.hypot(dx, dy) > 4) drag.movedFar = true;
            if (!drag.movedFar) return;
            const box = event.currentTarget.getBoundingClientRect();
            const scale = WIDTH / box.width;
            setView((current) => ({ ...current, x: drag.originX + dx * scale, y: drag.originY + dy * scale }));
          }}
          onPointerUp={(event) => {
            const drag = dragRef.current;
            dragRef.current = null;
            setGrabbing(false);
            if (event.currentTarget.hasPointerCapture(event.pointerId)) event.currentTarget.releasePointerCapture(event.pointerId);
            if (drag && !drag.movedFar && !drag.id) setPinned(null);
          }}
          onPointerCancel={() => { dragRef.current = null; setGrabbing(false); }}
        >
          <g ref={sceneRef} transform={`translate(${view.x} ${view.y}) scale(${view.k})`}>
            <g className="link-tree-arcs">
              {/* Only the selected page draws its links. Seventy-four arcs sharing
                  one gutter overlap into noise, and the counts beside each row
                  already answer what has no link without drawing anything. */}
              {(active ? arcs.filter((arc) => arc.from === active || arc.to === active) : []).map((arc, index) => {
                const dim = false;
                const span = Math.min(46 + Math.abs(arc.b.y - arc.a.y) * 0.22, 300);
                return (
                  <path
                    key={index}
                    d={`M ${DOT_X} ${arc.a.y} C ${DOT_X + span} ${arc.a.y}, ${DOT_X + span} ${arc.b.y}, ${DOT_X} ${arc.b.y}`}
                    className={`${arc.kind === "gear" ? "gear" : "editorial"}${dim ? " dim" : ""}`}
                  />
                );
              })}
            </g>

            <g>
              {rows.map((row) => {
                const dim = connected && !row.isHeader ? !connected.has(row.id) : false;
                const isActive = row.id === active;
                return (
                  <g key={row.id} className={`link-tree-row${dim ? " dim" : ""}${isActive ? " active" : ""}`}>
                    {row.isHeader ? (
                      <g
                        className="tree-header"
                        role="button"
                        tabIndex={0}
                        aria-expanded={expanded.has(row.id)}
                        aria-label={`${row.title}, ${summaries.get(row.id)?.total ?? 0} pages`}
                        onClick={() => setExpanded((current) => {
                          const next = new Set(current);
                          if (next.has(row.id)) next.delete(row.id); else next.add(row.id);
                          return next;
                        })}
                        onKeyDown={(event) => {
                          if (event.key !== "Enter" && event.key !== " ") return;
                          event.preventDefault();
                          setExpanded((current) => {
                            const next = new Set(current);
                            if (next.has(row.id)) next.delete(row.id); else next.add(row.id);
                            return next;
                          });
                        }}
                      >
                        <rect className="tree-header-hit" x={16} y={row.y - 14} width={DOT_X + 300} height={30} rx={6} />
                        <text className="tree-chevron" x={26} y={row.y + 4}>{expanded.has(row.id) ? "▾" : "▸"}</text>
                        <text className="tree-section" x={44} y={row.y + 4}>{row.title.toUpperCase()}</text>
                        <text className="tree-path" x={44} y={row.y + 19}>{row.path}</text>
                        <text className="tree-summary" x={DOT_X + 300} y={row.y + 4}>
                          {(() => {
                            const summary = summaries.get(row.id);
                            if (!summary || summary.total === 0) return "empty";
                            return summary.unlinked > 0
                              ? `${summary.total} pages · ${summary.unlinked} with nothing linking in`
                              : `${summary.total} pages`;
                          })()}
                        </text>
                        <line className="tree-rule" x1={26} y1={row.y + 26} x2={DOT_X + 300} y2={row.y + 26} />
                      </g>
                    ) : (
                      <>
                        <text className="tree-title" x={48} y={row.y + 4}>
                          {row.title.length > 46 ? `${row.title.slice(0, 45)}…` : row.title}
                        </text>
                        <text className="tree-count" x={DOT_X - 96} y={row.y + 4}>
                          {row.editorialInbound > 0 ? `${row.editorialInbound} in` : "—"}
                        </text>
                        <text className="tree-count" x={DOT_X - 46} y={row.y + 4}>
                          {row.outbound > 0 ? `${row.outbound} out` : ""}
                        </text>
                      </>
                    )}
                    {!row.isHeader && (
                      <circle
                        cx={DOT_X} cy={row.y} r={isActive ? row.r + 2 : row.r}
                        fill={typeColours[row.type] ?? "#7d8a83"}
                        onMouseEnter={() => setHovered(row.id)}
                        onMouseLeave={() => setHovered(null)}
                        onPointerDown={(event) => { event.stopPropagation(); dragRef.current = null; }}
                        onClick={() => setPinned((current) => (current === row.id ? null : row.id))}
                        onFocus={() => setHovered(row.id)}
                        onBlur={() => setHovered(null)}
                        onKeyDown={(event) => { if (event.key === "Enter" || event.key === " ") { event.preventDefault(); setPinned(row.id); } }}
                        tabIndex={0}
                        role="button"
                        aria-label={`${row.title}, ${row.editorialInbound} editorial links in, ${row.outbound} out`}
                      >
                        <title>{`${row.title} — ${row.editorialInbound} in, ${row.outbound} out`}</title>
                      </circle>
                    )}
                  </g>
                );
              })}
            </g>
          </g>
        </svg>

        <div className="link-graph-readout" aria-live="polite">
          {activeRow ? (
            <>
              <span style={{ color: typeColours[activeRow.type] }}>{typeLabels[activeRow.type] ?? activeRow.type}</span>
              <strong>{activeRow.title}</strong>
              <dl>
                <div><dt>Linked from</dt><dd>{activeRow.editorialInbound}</dd></div>
                <div><dt>Links out</dt><dd>{activeRow.outbound}</dd></div>
              </dl>
              <a href={activeRow.path} target="_blank" rel="noopener noreferrer">{activeRow.path}</a>
              {pinned === activeRow.id && <small>Click the page again, or the background, to release it.</small>}
            </>
          ) : (
            <>
              <span>Structure</span>
              <strong>{rows.filter((r) => !r.isHeader).length} pages, {arcs.length} editorial links</strong>
              <p>
                Pages are grouped under the library that lists them, so containment is shown by position rather than
                drawn. Hover or click a page to draw its editorial links. A row marked “—” has no page recommending it.
              </p>
            </>
          )}
        </div>
      </div>
    </div>
  );
}
