"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { requireAdmin } from "@/lib/auth";

export async function publishDueContent() {
  const { supabase } = await requireAdmin();
  const { data, error } = await supabase.rpc("publish_due_content");
  if (error) redirect("/admin/calendar?error=publish");
  revalidatePath("/"); revalidatePath("/admin"); revalidatePath("/admin/content"); revalidatePath("/admin/calendar"); revalidatePath("/sitemap.xml");
  redirect(`/admin/calendar?published=${data ?? 0}`);
}
