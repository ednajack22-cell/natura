"use client";

import { Fragment, useMemo, useState } from "react";
import Link from "next/link";
import type { GraphEdge, GraphNode } from "@/lib/link-graph";

const typeLabels: Record<string, string> = {
  plant: "Plant", problem: "Problem", guide: "Guide", calendar: "Calendar",
  review: "Review", article: "Article", page: "Page", tool: "Tool", section: "Section",
};

type SortKey = "title" | "type" | "inbound" | "outbound";

/**
 * The internal link inventory.
 *
 * This was a drawing before, and drawing was the wrong idea: the data is a list
 * of pages with counts, and an SVG rendering of a list is worse than a list at
 * every point that matters. Text scaled with the viewBox, so 12.5px labels came
 * out at 8px and the counts at 6.4px — below the legibility floor this codebase
 * holds everywhere else. Nothing in it was a link, so a page could not be opened
 * from it. Nothing could be sorted, searched, or selected.
 *
 * As a table it sorts, filters, searches, and every row opens both the public
 * page and its editor. Relationships stay reachable: expanding a row lists what
 * links in and what it links out to, by name.
 */
export function LinkInventory({ nodes, edges }: { nodes: GraphNode[]; edges: GraphEdge[] }) {
  const [query, setQuery] = useState("");
  const [sort, setSort] = useState<{ key: SortKey; desc: boolean }>({ key: "inbound", desc: false });
  const [onlyUnlinked, setOnlyUnlinked] = useState(false);
  const [hiddenTypes, setHiddenTypes] = useState<Set<string>>(new Set());
  const [open, setOpen] = useState<string | null>(null);

  const titleById = useMemo(() => new Map(nodes.map((n) => [n.id, n])), [nodes]);

  /** Editorial links only: a listing link is automatic and says nothing. */
  const editorial = useMemo(() => edges.filter((e) => e.kind !== "listing"), [edges]);

  const relations = useMemo(() => {
    const inbound = new Map<string, GraphEdge[]>();
    const outbound = new Map<string, GraphEdge[]>();
    for (const edge of editorial) {
      (inbound.get(edge.to) ?? inbound.set(edge.to, []).get(edge.to)!).push(edge);
      (outbound.get(edge.from) ?? outbound.set(edge.from, []).get(edge.from)!).push(edge);
    }
    return { inbound, outbound };
  }, [editorial]);

  const types = useMemo(
    () => [...new Set(nodes.filter((n) => n.type !== "section").map((n) => n.type))].sort(),
    [nodes],
  );

  const rows = useMemo(() => {
    const needle = query.trim().toLowerCase();
    const filtered = nodes.filter((node) => {
      if (node.type === "section") return false;
      if (hiddenTypes.has(node.type)) return false;
      if (onlyUnlinked && node.editorialInbound > 0) return false;
      if (needle && !`${node.title} ${node.path}`.toLowerCase().includes(needle)) return false;
      return true;
    });
    const direction = sort.desc ? -1 : 1;
    return filtered.sort((a, b) => {
      if (sort.key === "title") return direction * a.title.localeCompare(b.title);
      if (sort.key === "type") return direction * (a.type.localeCompare(b.type) || a.title.localeCompare(b.title));
      if (sort.key === "outbound") return direction * (a.outbound - b.outbound) || a.title.localeCompare(b.title);
      return direction * (a.editorialInbound - b.editorialInbound) || a.title.localeCompare(b.title);
    });
  }, [nodes, query, sort, onlyUnlinked, hiddenTypes]);

  const header = (key: SortKey, label: string, numeric = false) => {
    const activeSort = sort.key === key;
    return (
      <th scope="col" className={numeric ? "numeric" : undefined} aria-sort={activeSort ? (sort.desc ? "descending" : "ascending") : "none"}>
        <button
          type="button"
          onClick={() => setSort((current) => (current.key === key ? { key, desc: !current.desc } : { key, desc: key !== "title" && key !== "type" }))}
        >
          {label}
          <span aria-hidden="true">{activeSort ? (sort.desc ? "↓" : "↑") : ""}</span>
        </button>
      </th>
    );
  };

  return (
    <div className="link-inventory">
      <div className="inventory-controls">
        <input
          type="search"
          value={query}
          onChange={(event) => setQuery(event.target.value)}
          placeholder="Search pages by title or path"
          aria-label="Search pages"
        />
        <button
          type="button"
          className={onlyUnlinked ? "tree-filter on" : "tree-filter"}
          aria-pressed={onlyUnlinked}
          onClick={() => setOnlyUnlinked((current) => !current)}
        >
          Only pages with nothing linking in
        </button>
        <div className="inventory-types">
          {types.map((type) => {
            const off = hiddenTypes.has(type);
            return (
              <button
                type="button" key={type} className={off ? "tree-filter off" : "tree-filter"} aria-pressed={!off}
                onClick={() => setHiddenTypes((current) => {
                  const next = new Set(current);
                  if (next.has(type)) next.delete(type); else next.add(type);
                  return next;
                })}
              >
                {typeLabels[type] ?? type}
                <small>{nodes.filter((n) => n.type === type).length}</small>
              </button>
            );
          })}
        </div>
      </div>

      <p className="inventory-count" aria-live="polite">
        {rows.length} of {nodes.filter((n) => n.type !== "section").length} pages
      </p>

      <div className="inventory-table-wrap">
        <table className="inventory-table">
          <thead>
            <tr>
              {header("title", "Page")}
              {header("type", "Type")}
              {header("inbound", "Linked from", true)}
              {header("outbound", "Links out", true)}
              <th scope="col"><span className="sr-only">Actions</span></th>
            </tr>
          </thead>
          <tbody>
            {rows.map((node) => {
              const expanded = open === node.id;
              const inbound = relations.inbound.get(node.id) ?? [];
              const outbound = relations.outbound.get(node.id) ?? [];
              return (
                <Fragment key={node.id}>
                  <tr className={node.editorialInbound === 0 ? "unlinked" : undefined}>
                    <th scope="row">
                      <button
                        type="button"
                        className="inventory-expand"
                        aria-expanded={expanded}
                        onClick={() => setOpen(expanded ? null : node.id)}
                      >
                        <span aria-hidden="true">{expanded ? "▾" : "▸"}</span>
                        {node.title}
                      </button>
                      <code>{node.path}</code>
                    </th>
                    <td>{typeLabels[node.type] ?? node.type}</td>
                    <td className="numeric">
                      {node.editorialInbound === 0
                        ? <span className="zero" title="No other page links here">0</span>
                        : node.editorialInbound}
                    </td>
                    <td className="numeric">{node.outbound || "—"}</td>
                    <td className="inventory-actions">
                      <a href={node.path} target="_blank" rel="noopener noreferrer">View</a>
                      <Link href={`/admin/content?type=${node.type}`}>Edit</Link>
                    </td>
                  </tr>
                  {expanded && (
                    <tr className="inventory-detail">
                      <td colSpan={5}>
                        <div>
                          <section>
                            <h3>Linked from ({inbound.length})</h3>
                            {inbound.length === 0
                              ? <p>No page links here. It is reachable from its library and the sitemap only.</p>
                              : <ul>{inbound.map((edge) => <li key={edge.from}>{titleById.get(edge.from)?.title ?? edge.from}</li>)}</ul>}
                          </section>
                          <section>
                            <h3>Links out ({outbound.length})</h3>
                            {outbound.length === 0
                              ? <p>This page links to nothing else.</p>
                              : <ul>{outbound.map((edge) => <li key={edge.to}>{titleById.get(edge.to)?.title ?? edge.to}</li>)}</ul>}
                          </section>
                        </div>
                      </td>
                    </tr>
                  )}
                </Fragment>
              );
            })}
          </tbody>
        </table>
        {rows.length === 0 && <p className="inventory-empty">No page matches those filters.</p>}
      </div>
    </div>
  );
}
