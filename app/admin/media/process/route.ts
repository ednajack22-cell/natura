import { NextResponse } from "next/server";
import { z } from "zod";
import { createClient } from "@/lib/supabase/server";
import { imageUploadLimits, optimizeImageForWeb } from "@/lib/media/image-optimization";

export const runtime = "nodejs";
export const dynamic = "force-dynamic";

const requestSchema = z.discriminatedUnion("intent", [
  z.object({
    intent: z.literal("upload"),
    altText: z.string().trim().min(3).max(300),
    credit: z.string().trim().max(200),
    license: z.enum(["original", "licensed-stock", "creative-commons", "public-domain"]),
    bucket: z.enum(["draft_images", "published_images"]),
  }),
  z.object({ intent: z.literal("replace"), assetId: z.string().uuid() }),
]);

function cleanName(value: string) {
  return value.normalize("NFKD").replace(/[\u0300-\u036f]/g, "").toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-|-$/g, "").slice(0, 70) || "image";
}

function kilobytes(bytes: number) {
  return `${Math.max(1, Math.round(bytes / 1024))} KB`;
}

async function getAdmin() {
  const supabase = await createClient();
  const { data: { user }, error: userError } = await supabase.auth.getUser();
  if (userError || !user) return null;
  const { data: profile, error: profileError } = await supabase.from("profiles").select("role").eq("id", user.id).single();
  if (profileError || profile?.role !== "admin") return null;
  return { supabase, user };
}

export async function POST(request: Request) {
  const requestUrl = new URL(request.url);
  const origin = request.headers.get("origin");
  if (!origin || origin !== requestUrl.origin) {
    return NextResponse.json({ message: "Invalid upload origin." }, { status: 403 });
  }

  const admin = await getAdmin();
  if (!admin) return NextResponse.json({ message: "Administrator authentication is required." }, { status: 401 });

  try {
    const formData = await request.formData();
    const file = formData.get("file");
    if (!(file instanceof File) || !file.size) return NextResponse.json({ message: "Choose an image to upload." }, { status: 400 });
    if (file.size > imageUploadLimits.maxInputBytes) return NextResponse.json({ message: "The source image must be smaller than 10 MB." }, { status: 413 });

    const rawInput = Object.fromEntries(Array.from(formData.entries()).filter(([key]) => key !== "file"));
    const parsed = requestSchema.safeParse(rawInput);
    if (!parsed.success) return NextResponse.json({ message: "The media request is incomplete or invalid." }, { status: 400 });

    const optimized = await optimizeImageForWeb(Buffer.from(await file.arrayBuffer()), file.type);
    const message = `Optimized automatically: ${kilobytes(optimized.originalBytes)} → ${kilobytes(optimized.data.length)}, ${optimized.width} × ${optimized.height} WebP.`;

    if (parsed.data.intent === "upload") {
      const month = new Date().toISOString().slice(0, 7);
      const baseName = cleanName(file.name.replace(/\.[^.]+$/, ""));
      const objectPath = `uploads/${month}/${crypto.randomUUID()}-${baseName}.${optimized.extension}`;
      const { error: uploadError } = await admin.supabase.storage.from(parsed.data.bucket).upload(objectPath, optimized.data, {
        contentType: optimized.mimeType,
        cacheControl: parsed.data.bucket === "published_images" ? "31536000" : "3600",
        upsert: false,
      });
      if (uploadError) throw new Error("The optimized image could not be stored.");

      const { error: metadataError } = await admin.supabase.from("media_assets").insert({
        bucket: parsed.data.bucket,
        object_path: objectPath,
        alt_text: parsed.data.altText,
        credit: parsed.data.credit || null,
        original_name: file.name,
        mime_type: optimized.mimeType,
        file_size: optimized.data.length,
        license: parsed.data.license,
        width: optimized.width,
        height: optimized.height,
        created_by: admin.user.id,
      });
      if (metadataError) {
        await admin.supabase.storage.from(parsed.data.bucket).remove([objectPath]);
        throw new Error("The optimized image metadata could not be recorded.");
      }

      return NextResponse.json({ message });
    }

    const { data: asset, error: assetError } = await admin.supabase.from("media_assets")
      .select("id, bucket, object_path, mime_type")
      .eq("id", parsed.data.assetId)
      .single();
    if (assetError || !asset) return NextResponse.json({ message: "The media asset no longer exists." }, { status: 404 });

    const { data: previousFile, error: downloadError } = await admin.supabase.storage.from(asset.bucket).download(asset.object_path);
    if (downloadError || !previousFile) throw new Error("The existing image could not be backed up before replacement.");
    const previousBytes = Buffer.from(await previousFile.arrayBuffer());

    const { error: replaceError } = await admin.supabase.storage.from(asset.bucket).update(asset.object_path, optimized.data, {
      contentType: optimized.mimeType,
      cacheControl: asset.bucket === "published_images" ? "31536000" : "3600",
      upsert: true,
    });
    if (replaceError) throw new Error("The optimized replacement could not be stored.");

    const { error: metadataError } = await admin.supabase.from("media_assets").update({
      original_name: file.name,
      mime_type: optimized.mimeType,
      file_size: optimized.data.length,
      width: optimized.width,
      height: optimized.height,
      updated_at: new Date().toISOString(),
    }).eq("id", asset.id);
    if (metadataError) {
      await admin.supabase.storage.from(asset.bucket).update(asset.object_path, previousBytes, {
        contentType: asset.mime_type ?? previousFile.type,
        cacheControl: asset.bucket === "published_images" ? "31536000" : "3600",
        upsert: true,
      });
      throw new Error("The replacement metadata could not be recorded, so the previous file was restored.");
    }

    return NextResponse.json({ message });
  } catch (error) {
    return NextResponse.json({ message: error instanceof Error ? error.message : "The image could not be processed." }, { status: 400 });
  }
}
