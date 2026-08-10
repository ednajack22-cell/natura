"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { z } from "zod";
import { requireAdmin } from "@/lib/auth";

export async function restoreRevision(contentId: string, formData: FormData) {
  const parsed = z.object({ contentId: z.string().uuid(), revisionId: z.coerce.number().int().positive(), version: z.coerce.number().int().positive(), confirmation: z.literal("restore-as-draft") }).safeParse({
    contentId, revisionId: formData.get("revisionId"), version: formData.get("version"), confirmation: formData.get("confirmation"),
  });
  if (!parsed.success) redirect(`/admin/content/${contentId}/history?error=confirmation`);
  const { supabase } = await requireAdmin();
  const { data: revision, error: readError } = await supabase.from("content_revisions").select("id, content_id, version").eq("id", parsed.data.revisionId).eq("content_id", parsed.data.contentId).single();
  if (readError || !revision || revision.version !== parsed.data.version) redirect(`/admin/content/${contentId}/history?error=missing`);
  const { data: restoredId, error } = await supabase.rpc("restore_content_revision", { target_revision_id: revision.id });
  if (error || restoredId !== parsed.data.contentId) redirect(`/admin/content/${contentId}/history?error=restore`);
  revalidatePath("/admin"); revalidatePath("/admin/content"); revalidatePath(`/admin/content/${contentId}/edit`); revalidatePath(`/admin/content/${contentId}/history`); revalidatePath("/sitemap.xml");
  redirect(`/admin/content/${contentId}/edit?restored=${revision.version}`);
}
