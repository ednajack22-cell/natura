"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { useEffect, useRef } from "react";
import { ChevronIcon, CloseIcon, MenuIcon, SearchIcon } from "@/components/icons";
import type { PublicNavigationItem } from "@/lib/navigation";

/**
 * The menu is the only part of the header that needs the browser: it marks the
 * section the reader is in, and it has to close itself after a link is followed.
 *
 * The header lives in the root layout, so it survives client-side navigation.
 * Without the effect below, the mobile sheet stayed open over the page the
 * reader had just asked for, and a desktop dropdown stayed open under the
 * cursor because the clicked link kept focus.
 *
 * Both menus are plain links and a native <details>, so they still open and
 * navigate before this script loads, or without it.
 */
export function HeaderNavigation({ items }: { items: readonly PublicNavigationItem[] }) {
  const pathname = usePathname();
  const mobileMenu = useRef<HTMLDetailsElement>(null);
  const desktopNav = useRef<HTMLElement>(null);

  useEffect(() => {
    mobileMenu.current?.removeAttribute("open");
    const focused = document.activeElement;
    if (focused instanceof HTMLElement && desktopNav.current?.contains(focused)) focused.blur();
  }, [pathname]);

  useEffect(() => {
    const closeOnEscape = (event: KeyboardEvent) => {
      const menu = mobileMenu.current;
      if (event.key !== "Escape" || !menu?.open) return;
      menu.open = false;
      menu.querySelector("summary")?.focus();
    };
    document.addEventListener("keydown", closeOnEscape);
    return () => document.removeEventListener("keydown", closeOnEscape);
  }, []);

  const isCurrentSection = (item: PublicNavigationItem) =>
    item.matches.some((prefix) => pathname === prefix || pathname.startsWith(`${prefix}/`));
  const currentPage = (href: string) => (pathname === href ? "page" : undefined);

  return (
    <>
      <nav className="desktop-nav" aria-label="Primary navigation" ref={desktopNav}>
        <ul>
          {items.map((item) => (
            <li className={`nav-item${item.children.length ? " has-menu" : ""}${isCurrentSection(item) ? " is-current" : ""}`} key={item.href}>
              <Link className="nav-link" href={item.href} aria-current={currentPage(item.href)}>
                {item.label}
                {item.children.length > 0 && <ChevronIcon className="nav-chevron" />}
              </Link>
              {item.children.length > 0 && (
                <div className={`nav-dropdown${item.children.length > 4 ? " nav-dropdown-wide" : ""}`}>
                  {item.children.map((child) => (
                    <Link href={child.href} key={child.href} aria-current={currentPage(child.href)}>
                      <strong>{child.label}</strong>
                      <span>{child.description}</span>
                    </Link>
                  ))}
                </div>
              )}
            </li>
          ))}
        </ul>
      </nav>

      <form className="header-search-form" role="search" method="post" action="/search/submit">
        <label className="sr-only" htmlFor="header-search-input">Search Natura</label>
        <SearchIcon />
        <input id="header-search-input" name="q" type="search" placeholder="Search plants, problems…" maxLength={120} />
        <button type="submit">Search</button>
      </form>

      <Link className="header-icon-button header-search-link" href="/search" aria-label="Search Natura">
        <SearchIcon />
      </Link>

      <details className="mobile-menu" ref={mobileMenu}>
        <summary className="header-icon-button">
          <MenuIcon className="mobile-menu-open" />
          <CloseIcon className="mobile-menu-close" />
          <span>Menu</span>
        </summary>
        <div className="mobile-sheet">
          <form className="mobile-search" role="search" method="post" action="/search/submit">
            <label className="sr-only" htmlFor="mobile-search-input">Search Natura</label>
            <SearchIcon />
            <input id="mobile-search-input" name="q" type="search" placeholder="Search plants, problems…" maxLength={120} />
            <button type="submit">Search</button>
          </form>
          <nav aria-label="Mobile navigation">
            <ul className="mobile-nav">
              {items.map((item) => (
                <li className={isCurrentSection(item) ? "is-current" : undefined} key={item.href}>
                  {item.children.length === 0 ? (
                    <Link className="mobile-nav-link" href={item.href} aria-current={currentPage(item.href)}>
                      <span>{item.label}<small>{item.description}</small></span>
                    </Link>
                  ) : (
                    <details className="mobile-nav-group">
                      <summary className="mobile-nav-link">
                        <span>{item.label}<small>{item.description}</small></span>
                        <ChevronIcon />
                      </summary>
                      <ul>
                        {item.children.map((child) => (
                          <li key={child.href}>
                            <Link href={child.href} aria-current={currentPage(child.href)}>{child.label}</Link>
                          </li>
                        ))}
                      </ul>
                    </details>
                  )}
                </li>
              ))}
            </ul>
          </nav>
        </div>
      </details>
    </>
  );
}
