"use client";

import Link from "next/link";
import { usePathname, useSearchParams } from "next/navigation";
import type { ComponentType } from "react";
import {
  CalendarIcon, ContentIcon, GuideIcon, MediaIcon, OverviewIcon, PlantIcon,
  PlusIcon, ProblemIcon, ReviewIcon, SettingsIcon, TaxonomyIcon, ToolIcon,
} from "@/components/admin/admin-icons";

type NavItem = { label: string; href: string; icon: ComponentType<{ className?: string }>; count?: number };

export function AdminNavigation({ contentCount }: { contentCount: number }) {
  const pathname = usePathname();
  const searchParams = useSearchParams();
  const currentQuery = searchParams.toString();
  const groups: Array<{ label: string; items: NavItem[] }> = [
    { label: "Workspace", items: [{ label: "Overview", href: "/admin", icon: OverviewIcon }] },
    { label: "Editorial", items: [
      { label: "All content", href: "/admin/content", icon: ContentIcon, count: contentCount },
      { label: "New content", href: "/admin/content/new", icon: PlusIcon },
      { label: "Drafts", href: "/admin/content?status=draft", icon: ContentIcon },
      { label: "In review", href: "/admin/content?status=review", icon: ReviewIcon },
      { label: "Published", href: "/admin/content?status=published", icon: ContentIcon },
    ] },
    { label: "Knowledge base", items: [
      { label: "Plant profiles", href: "/admin/plants", icon: PlantIcon },
      { label: "Plant problems", href: "/admin/content?type=problem", icon: ProblemIcon },
      { label: "Guides", href: "/admin/content?type=guide", icon: GuideIcon },
      { label: "Calendars", href: "/admin/content?type=calendar", icon: CalendarIcon },
      { label: "Tools", href: "/admin/content?type=tool", icon: ToolIcon },
      { label: "Reviews", href: "/admin/content?type=review", icon: ReviewIcon },
      { label: "Institutional pages", href: "/admin/content?type=page", icon: ContentIcon },
      { label: "Authors & reviewers", href: "/admin/contributors", icon: ContentIcon },
      { label: "Taxonomies", href: "/admin/taxonomies", icon: TaxonomyIcon },
    ] },
    { label: "Operations", items: [
      { label: "Media library", href: "/admin/media", icon: MediaIcon },
      { label: "Editorial calendar", href: "/admin/calendar", icon: CalendarIcon },
      { label: "Settings", href: "/admin/settings", icon: SettingsIcon },
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
