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
  const { count } = await supabase.from("content_items").select("id", { count: "exact", head: true });

  return <AdminShell
    name={profile.display_name ?? "Administrator"}
    email={user.email ?? "admin@natura.local"}
    contentCount={count ?? 0}
  >{children}</AdminShell>;
}
