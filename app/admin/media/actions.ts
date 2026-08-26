"use server";

import { revalidatePath } from "next/cache";
import { z } from "zod";
import { requireAdmin } from "@/lib/auth";

export type MediaActionResult = { ok: boolean; message: string };

const assetIdSchema = z.string().uuid();
const metadataSchema = z.object({
  id: assetIdSchema,
  altText: z.string().trim().min(3).max(300),
  credit: z.string().trim().max(200),
  license: z.enum(["original", "licensed-stock", "creative-commons", "public-domain"]),
});

function refreshMediaPages() {
  revalidatePath("/admin/media");
  revalidatePath("/admin/content");
}

export async function updateMediaMetadata(input: unknown): Promise<MediaActionResult> {
  const parsed = metadataSchema.safeParse(input);
  if (!parsed.success) return { ok: false, message: "Check the alternative text, credit, and licence." };
  const { supabase } = await requireAdmin();
  const { error } = await supabase.from("media_assets").update({
    alt_text: parsed.data.altText,
    credit: parsed.data.credit || null,
    license: parsed.data.license,
    updated_at: new Date().toISOString(),
  }).eq("id", parsed.data.id);
  if (error) return { ok: false, message: "The media metadata could not be saved." };
  return { ok: true, message: "Media details saved." };
}

export async function moveMediaAsset(input: unknown): Promise<MediaActionResult> {
  const parsed = z.object({ id: assetIdSchema, targetBucket: z.enum(["draft_images", "published_images"]) }).safeParse(input);
  if (!parsed.success) return { ok: false, message: "The requested visibility is invalid." };
  const { supabase } = await requireAdmin();
  const { data: asset, error: assetError } = await supabase.from("media_assets")
    .select("id, bucket, object_path, mime_type")
    .eq("id", parsed.data.id)
    .single();
  if (assetError || !asset) return { ok: false, message: "The media asset no longer exists." };
  if (asset.bucket === parsed.data.targetBucket) return { ok: true, message: "The media visibility is already up to date." };

  if (parsed.data.targetBucket === "draft_images") {
    const { data: usage, error: usageError } = await supabase.rpc("media_asset_usage", { p_asset_id: asset.id });
    if (usageError) return { ok: false, message: "Media usage could not be verified." };
    if (usage.length) return { ok: false, message: "This image is in use and cannot be moved back to private drafts." };
  }

  const { data: file, error: downloadError } = await supabase.storage.from(asset.bucket).download(asset.object_path);
  if (downloadError || !file) return { ok: false, message: "The stored image could not be read." };
  const { error: uploadError } = await supabase.storage.from(parsed.data.targetBucket).upload(asset.object_path, file, {
    contentType: asset.mime_type ?? file.type,
    cacheControl: parsed.data.targetBucket === "published_images" ? "31536000" : "3600",
    upsert: false,
  });
  if (uploadError) return { ok: false, message: "The image could not be copied to the target library." };

  const { error: metadataError } = await supabase.from("media_assets").update({
    bucket: parsed.data.targetBucket,
    updated_at: new Date().toISOString(),
  }).eq("id", asset.id);
  if (metadataError) {
    await supabase.storage.from(parsed.data.targetBucket).remove([asset.object_path]);
    return { ok: false, message: "The visibility change could not be recorded." };
  }
  const { error: removeError } = await supabase.storage.from(asset.bucket).remove([asset.object_path]);
  if (removeError) {
    await supabase.from("media_assets").update({ bucket: asset.bucket, updated_at: new Date().toISOString() }).eq("id", asset.id);
    await supabase.storage.from(parsed.data.targetBucket).remove([asset.object_path]);
    return { ok: false, message: "The original object could not be removed; no visibility change was kept." };
  }

  refreshMediaPages();
  return { ok: true, message: parsed.data.targetBucket === "published_images" ? "Image published and ready for editors." : "Image moved to private drafts." };
}

export async function deleteMediaAsset(input: unknown): Promise<MediaActionResult> {
  const parsed = assetIdSchema.safeParse(input);
  if (!parsed.success) return { ok: false, message: "The requested media asset is invalid." };
  const { supabase } = await requireAdmin();
  const { data: asset, error: assetError } = await supabase.from("media_assets").select("*").eq("id", parsed.data).single();
  if (assetError || !asset) return { ok: false, message: "The media asset no longer exists." };
  const { data: usage, error: usageError } = await supabase.rpc("media_asset_usage", { p_asset_id: asset.id });
  if (usageError) return { ok: false, message: "Media usage could not be verified." };
  if (usage.length) return { ok: false, message: `Remove this image from ${usage.length} editorial location${usage.length === 1 ? "" : "s"} before deleting it.` };

  const { error: metadataError } = await supabase.from("media_assets").delete().eq("id", asset.id);
  if (metadataError) return { ok: false, message: metadataError.message.includes("still used") ? "This image is still used by editorial content." : "The media record could not be deleted." };
  const { error: storageError } = await supabase.storage.from(asset.bucket).remove([asset.object_path]);
  if (storageError) {
    const { error: restoreError } = await supabase.from("media_assets").insert(asset);
    return { ok: false, message: restoreError ? "The storage object could not be removed; manual cleanup is required." : "The storage object could not be removed, so the media record was restored." };
  }
  refreshMediaPages();
  return { ok: true, message: "Unused media deleted from storage and the library." };
}
