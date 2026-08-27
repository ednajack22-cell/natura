"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { z } from "zod";
import { requireAdmin } from "@/lib/auth";

const draftSchema = z.object({
  title: z.string().trim().min(3).max(160),
  slug: z.string().trim().min(3).max(160).regex(/^[a-z0-9]+(?:-[a-z0-9]+)*$/),
  contentType: z.enum(["plant", "problem", "guide", "calendar", "tool", "review", "page", "article"]),
  excerpt: z.string().trim().max(500).optional(),
  publicSection: z.enum(["grow", "small-space-gardening", "plant-care", "planting-calendar", "tools", "reviews", "institutional"]),
  subsection: z.string().trim().max(80).regex(/^[a-z0-9]+(?:-[a-z0-9]+)*$/).optional(),
});

export async function createDraft(formData: FormData) {
  const result = draftSchema.safeParse({
    title: formData.get("title"),
    slug: formData.get("slug"),
    contentType: formData.get("contentType"),
    excerpt: formData.get("excerpt") || undefined,
    publicSection: formData.get("publicSection"),
    subsection: formData.get("subsection") || undefined,
  });
  if (!result.success) redirect("/admin/content/new?error=invalid");

  const { supabase, user } = await requireAdmin();
  const { data, error } = await supabase.from("content_items").insert({
    title: result.data.title,
    slug: result.data.slug,
    content_type: result.data.contentType,
    excerpt: result.data.excerpt ?? null,
    status: "draft",
    body: {
      stage: "draft",
      blocks: [],
      navigation: { section: result.data.publicSection, subsection: result.data.subsection ?? "" },
      sources: [],
    },
    created_by: user.id,
  }).select("id").single();

  if (error?.code === "23505") redirect("/admin/content/new?error=duplicate");
  if (error || !data) redirect("/admin/content/new?error=save");
  const { data: defaultAuthor } = await supabase.from("editorial_contributors").select("id").eq("slug", "natura-editorial-team").maybeSingle();
  const { error: workflowError } = await supabase.from("content_workflows").insert({ content_id: data.id, author_id: defaultAuthor?.id ?? null });
  if (workflowError) redirect(`/admin/content/${data.id}/edit?error=save`);
  revalidatePath("/admin");
  revalidatePath("/admin/content");
  redirect(`/admin/content/${data.id}/edit?created=1`);
}
