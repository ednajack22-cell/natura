import type { Metadata } from "next";
import type { ReactNode } from "react";
import { AdminShell } from "@/components/admin/admin-shell";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = {
  title: { default: "Editorial Studio", template: "%s | Natura Studio" },
  robots: { index: false, follow: false, noarchive: true },
};
export const dynamic = "force-dynamic";

export default async function AdminWorkspaceLayout({ children }: { children: ReactNode }) {
  const { supabase, user, profile } = await requireAdmin();
  const [{ count }, coverageResponse] = await Promise.all([
    supabase.from("content_items").select("id", { count: "exact", head: true }),
    supabase.rpc("admin_launch_content_coverage"),
  ]);
  const coverage = coverageResponse.data ?? [];
  const completed = coverage.reduce((sum, item) => sum + Math.min(item.published_count, item.launch_target), 0);
  const target = coverage.reduce((sum, item) => sum + item.launch_target, 0);

  return <AdminShell
    name={profile.display_name ?? "Administrator"}
    email={user.email ?? "admin@natura.local"}
    contentCount={count ?? 0}
    launchPercent={target ? Math.round(completed / target * 100) : 0}
    readyLaunchTypes={coverage.filter((item) => item.coverage_status === "ready").length}
    launchTypeCount={coverage.length}
  >{children}</AdminShell>;
}
