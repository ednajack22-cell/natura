"use client";

import Link from "next/link";
import { usePathname, useSearchParams } from "next/navigation";
import type { ComponentType } from "react";
import {
  CalendarIcon, ContentIcon, MediaIcon, OverviewIcon, PlantIcon,
  SearchSmallIcon, SettingsIcon, TaxonomyIcon,
} from "@/components/admin/admin-icons";

type NavItem = { label: string; href: string; icon: ComponentType<{ className?: string }>; count?: number };

export function AdminNavigation({ contentCount }: { contentCount: number }) {
  const pathname = usePathname();
  const searchParams = useSearchParams();
  const currentQuery = searchParams.toString();
  const groups: Array<{ label: string; items: NavItem[] }> = [
    { label: "Workspace", items: [
      { label: "Overview", href: "/admin", icon: OverviewIcon },
      { label: "All content", href: "/admin/content", icon: ContentIcon, count: contentCount },
      { label: "Publishing calendar", href: "/admin/calendar", icon: CalendarIcon },
      { label: "Media library", href: "/admin/media", icon: MediaIcon },
      { label: "SEO health", href: "/admin/seo", icon: SearchSmallIcon },
    ] },
    { label: "More", items: [
      { label: "Plant profiles", href: "/admin/plants", icon: PlantIcon },
      { label: "Video studio", href: "/admin/video", icon: MediaIcon },
      { label: "Authors & reviewers", href: "/admin/contributors", icon: ContentIcon },
      { label: "Taxonomies", href: "/admin/taxonomies", icon: TaxonomyIcon },
      { label: "System & access", href: "/admin/settings", icon: SettingsIcon },
    ] },
  ];

  const isActive = (href: string) => {
    const [targetPath, targetQuery = ""] = href.split("?");
    if (targetPath === "/admin") return pathname === "/admin";
    if (targetQuery) return pathname === targetPath && currentQuery === targetQuery;
    if (targetPath === "/admin/content") return pathname === targetPath && !currentQuery;
    return pathname.startsWith(targetPath);
  };

  return <nav className="dashboard-nav-groups" aria-label="Administration navigation">
    {groups.map((group) => <section className="dashboard-nav-section" key={group.label}>
      <h2>{group.label}</h2>
      <div className="dashboard-nav">{group.items.map((item) => {
        const active = isActive(item.href);
        const Icon = item.icon;
        return <Link href={item.href} aria-current={active ? "page" : undefined} key={item.href}><Icon /><span>{item.label}</span>{item.count !== undefined && <small>{item.count}</small>}</Link>;
      })}</div>
    </section>)}
  </nav>;
}
