"use client";

import { useEffect, useMemo, useRef, useState } from "react";
import { useRouter } from "next/navigation";

export type PaletteEntry = {
  label: string;
  href: string;
  group: string;
  hint?: string;
};

/**
 * Keyboard navigation for the workspace.
 *
 * The studio has twelve screens and hundreds of content items, and reaching any
 * of them meant a trip through the sidebar. Cmd+K — Ctrl+K away from a Mac —
 * opens a filter over both, the shortcut editors already expect from every other
 * tool they use.
 *
 * The entry list is prepared on the server and passed in, so opening costs
 * nothing and typing filters locally.
 */
export function CommandPalette({ entries }: { entries: PaletteEntry[] }) {
  const [open, setOpen] = useState(false);

  useEffect(() => {
    const onKey = (event: KeyboardEvent) => {
      if ((event.metaKey || event.ctrlKey) && event.key.toLowerCase() === "k") {
        event.preventDefault();
        setOpen((current) => !current);
      }
    };
    window.addEventListener("keydown", onKey);
    return () => window.removeEventListener("keydown", onKey);
  }, []);

  // The dialog is mounted only while open, so its query and selection start
  // clean each time rather than being reset from an effect.
  return open ? <PaletteDialog entries={entries} onClose={() => setOpen(false)} /> : null;
}

function PaletteDialog({ entries, onClose }: { entries: PaletteEntry[]; onClose: () => void }) {
  const router = useRouter();
  const [query, setQuery] = useState("");
  const [index, setIndex] = useState(0);
  const inputRef = useRef<HTMLInputElement>(null);

  useEffect(() => {
    const onKey = (event: KeyboardEvent) => { if (event.key === "Escape") onClose(); };
    window.addEventListener("keydown", onKey);
    return () => window.removeEventListener("keydown", onKey);
  }, [onClose]);

  const matches = useMemo(() => {
    const needle = query.trim().toLowerCase();
    const pool = needle
      ? entries.filter((entry) => `${entry.label} ${entry.group} ${entry.hint ?? ""}`.toLowerCase().includes(needle))
      : entries;
    return pool.slice(0, 12);
  }, [entries, query]);

  const go = (href: string) => {
    onClose();
    router.push(href);
  };

  return (
    <div className="palette-backdrop" role="presentation" onClick={onClose}>
      <div
        className="palette"
        role="dialog"
        aria-modal="true"
        aria-label="Command palette"
        onClick={(event) => event.stopPropagation()}
      >
        <input
          ref={inputRef}
          autoFocus
          value={query}
          onChange={(event) => { setQuery(event.target.value); setIndex(0); }}
          onKeyDown={(event) => {
            if (event.key === "ArrowDown") { event.preventDefault(); setIndex((i) => Math.min(i + 1, matches.length - 1)); }
            if (event.key === "ArrowUp") { event.preventDefault(); setIndex((i) => Math.max(i - 1, 0)); }
            if (event.key === "Enter" && matches[index]) { event.preventDefault(); go(matches[index].href); }
          }}
          placeholder="Jump to a screen or a piece of content…"
          aria-label="Search screens and content"
          aria-activedescendant={matches[index] ? `palette-option-${index}` : undefined}
        />
        {matches.length === 0 ? (
          <p className="palette-empty">Nothing matches “{query}”.</p>
        ) : (
          <ul role="listbox" aria-label="Results">
            {matches.map((entry, entryIndex) => (
              <li
                id={`palette-option-${entryIndex}`}
                key={`${entry.href}-${entry.label}`}
                role="option"
                aria-selected={entryIndex === index}
                className={entryIndex === index ? "active" : ""}
                onMouseEnter={() => setIndex(entryIndex)}
                onClick={() => go(entry.href)}
              >
                <span>{entry.label}</span>
                <small>{entry.hint ? `${entry.group} · ${entry.hint}` : entry.group}</small>
              </li>
            ))}
          </ul>
        )}
        <footer>
          <span><kbd>↑</kbd><kbd>↓</kbd> move</span>
          <span><kbd>↵</kbd> open</span>
          <span><kbd>esc</kbd> close</span>
        </footer>
      </div>
    </div>
  );
}
