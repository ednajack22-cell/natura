"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { z } from "zod";
import { requireAdmin } from "@/lib/auth";

const contributorSchema = z.object({
  id: z.union([z.literal(""), z.string().uuid()]),
  displayName: z.string().trim().min(2).max(120),
  slug: z.string().trim().min(2).max(120).regex(/^[a-z0-9]+(?:-[a-z0-9]+)*$/),
  roleTitle: z.string().trim().max(160),
  bio: z.string().trim().max(3000),
  expertise: z.string().trim().max(1200),
  conflicts: z.string().trim().max(2000),
  isActive: z.boolean(),
  isPublic: z.boolean(),
});

function lines(value: string) { return value.split(/\r?\n/).map((item) => item.trim()).filter(Boolean); }

export async function saveContributor(formData: FormData) {
  const parsed = contributorSchema.safeParse({
    id: formData.get("id") ?? "", displayName: formData.get("displayName"), slug: formData.get("slug"),
    roleTitle: formData.get("roleTitle") ?? "", bio: formData.get("bio") ?? "", expertise: formData.get("expertise") ?? "",
    conflicts: formData.get("conflicts") ?? "", isActive: formData.get("isActive") === "yes", isPublic: formData.get("isPublic") === "yes",
  });
  if (!parsed.success) redirect("/admin/contributors?error=invalid");
  const { supabase } = await requireAdmin();
  const values = {
    display_name: parsed.data.displayName, slug: parsed.data.slug, role_title: parsed.data.roleTitle,
    bio: parsed.data.bio, expertise: lines(parsed.data.expertise), conflicts: parsed.data.conflicts,
    is_active: parsed.data.isActive, is_public: parsed.data.isPublic, updated_at: new Date().toISOString(),
  };
  const { error } = parsed.data.id
    ? await supabase.from("editorial_contributors").update(values).eq("id", parsed.data.id)
    : await supabase.from("editorial_contributors").insert(values);
  if (error?.code === "23505") redirect("/admin/contributors?error=duplicate");
  if (error) redirect("/admin/contributors?error=save");
  revalidatePath("/admin/contributors");
  revalidatePath("/admin/content");
  redirect("/admin/contributors?saved=1");
}
