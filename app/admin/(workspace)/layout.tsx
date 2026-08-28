import type { Metadata } from "next";
import type { ReactNode } from "react";
import { AdminShell } from "@/components/admin/admin-shell";
import { CommandPalette, type PaletteEntry } from "@/components/admin/command-palette";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = {
  title: { default: "Editorial Studio", template: "%s | Natura Studio" },
  robots: { index: false, follow: false, noarchive: true },
};
export const dynamic = "force-dynamic";

export default async function AdminWorkspaceLayout({ children }: { children: ReactNode }) {
  const { supabase, user, profile } = await requireAdmin();
  const [{ count }, coverageResponse, { data: paletteItems }] = await Promise.all([
    supabase.from("content_items").select("id", { count: "exact", head: true }),
    supabase.rpc("admin_launch_content_coverage"),
    supabase.from("content_items").select("id, title, content_type, status").order("updated_at", { ascending: false }).limit(200),
  ]);
  const coverage = coverageResponse.data ?? [];
  const completed = coverage.reduce((sum, item) => sum + Math.min(item.published_count, item.launch_target), 0);
  const target = coverage.reduce((sum, item) => sum + item.launch_target, 0);

  // Screens first, then content, so an empty query offers navigation rather
  // than an arbitrary slice of the library.
  const paletteEntries: PaletteEntry[] = [
    { label: "Overview", href: "/admin", group: "Screen" },
    { label: "All content", href: "/admin/content", group: "Screen" },
    { label: "New content", href: "/admin/content/new", group: "Screen" },
    { label: "Publishing calendar", href: "/admin/calendar", group: "Screen" },
    { label: "Media library", href: "/admin/media", group: "Screen" },
    { label: "SEO health", href: "/admin/seo", group: "Screen" },
    { label: "Internal links", href: "/admin/links", group: "Screen" },
    { label: "Plant profiles", href: "/admin/plants", group: "Screen" },
    { label: "Video studio", href: "/admin/video", group: "Screen" },
    { label: "Authors and reviewers", href: "/admin/contributors", group: "Screen" },
    { label: "Taxonomies", href: "/admin/taxonomies", group: "Screen" },
    { label: "Settings", href: "/admin/settings", group: "Screen" },
    { label: "Export the library as CSV", href: "/admin/content/export", group: "Action" },
    ...(paletteItems ?? []).map((item) => ({
      label: item.title,
      href: `/admin/content/${item.id}/edit`,
      group: "Content",
      hint: `${item.content_type} · ${item.status}`,
    })),
  ];

  return <AdminShell
    name={profile.display_name ?? "Administrator"}
    email={user.email ?? "admin@natura.local"}
    contentCount={count ?? 0}
    launchPercent={target ? Math.round(completed / target * 100) : 0}
    readyLaunchTypes={coverage.filter((item) => item.coverage_status === "ready").length}
    launchTypeCount={coverage.length}
  ><CommandPalette entries={paletteEntries} />{children}</AdminShell>;
}
