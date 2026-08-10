"use client";

import { useRef, useState } from "react";
import { useRouter } from "next/navigation";
import { createClient } from "@/lib/supabase/client";

const allowedTypes = new Set(["image/jpeg", "image/png", "image/webp", "image/avif"]);
const extensions: Record<string, string> = { "image/jpeg": "jpg", "image/png": "png", "image/webp": "webp", "image/avif": "avif" };
const maxSize = 10 * 1024 * 1024;

function cleanName(value: string) {
  return value.normalize("NFKD").replace(/[\u0300-\u036f]/g, "").toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-|-$/g, "").slice(0, 70) || "image";
}

async function readDimensions(file: File) {
  const bitmap = await createImageBitmap(file);
  const result = { width: bitmap.width, height: bitmap.height };
  bitmap.close();
  return result;
}

export function MediaUploader() {
  const router = useRouter();
  const formRef = useRef<HTMLFormElement>(null);
  const [state, setState] = useState<{ tone: "idle" | "working" | "success" | "error"; message: string }>({ tone: "idle", message: "" });

  async function upload(formData: FormData) {
    const file = formData.get("file");
    const altText = String(formData.get("altText") ?? "").trim();
    const credit = String(formData.get("credit") ?? "").trim();
    const license = String(formData.get("license") ?? "original");
    if (!(file instanceof File) || !file.size) return setState({ tone: "error", message: "Choose an image to upload." });
    if (!allowedTypes.has(file.type)) return setState({ tone: "error", message: "Use a JPEG, PNG, WebP, or AVIF image." });
    if (file.size > maxSize) return setState({ tone: "error", message: "The image must be smaller than 10 MB." });
    if (altText.length < 3) return setState({ tone: "error", message: "Alternative text is required for accessibility." });

    setState({ tone: "working", message: "Validating and uploading the image…" });
    try {
      const dimensions = await readDimensions(file);
      if (dimensions.width < 320 || dimensions.height < 240) throw new Error("The image is too small. Minimum dimensions are 320 × 240 pixels.");
      if (dimensions.width * dimensions.height > 40_000_000) throw new Error("The image dimensions are too large.");
      const supabase = createClient();
      const { data: auth } = await supabase.auth.getUser();
      if (!auth.user) throw new Error("Your administrator session has expired.");
      const month = new Date().toISOString().slice(0, 7);
      const baseName = cleanName(file.name.replace(/\.[^.]+$/, ""));
      const objectPath = `uploads/${month}/${crypto.randomUUID()}-${baseName}.${extensions[file.type]}`;
      const { error: uploadError } = await supabase.storage.from("published_images").upload(objectPath, file, { contentType: file.type, cacheControl: "31536000", upsert: false });
      if (uploadError) throw uploadError;
      const { error: metadataError } = await supabase.from("media_assets").insert({
        bucket: "published_images", object_path: objectPath, alt_text: altText, credit: credit || null,
        original_name: file.name, mime_type: file.type, file_size: file.size, license,
        width: dimensions.width, height: dimensions.height, created_by: auth.user.id,
      });
      if (metadataError) {
        await supabase.storage.from("published_images").remove([objectPath]);
        throw metadataError;
      }
      formRef.current?.reset();
      setState({ tone: "success", message: "Image uploaded and added to the media library." });
      router.refresh();
    } catch (error) {
      setState({ tone: "error", message: error instanceof Error ? error.message : "The image could not be uploaded." });
    }
  }

  return <form ref={formRef} action={upload} className="dashboard-panel media-upload-card" id="upload-media">
    <div className="panel-heading"><div><p className="dashboard-kicker">Secure import</p><h2>Upload a new image</h2></div><span className="module-note">JPEG, PNG, WebP or AVIF · maximum 10 MB</span></div>
    <div className="media-upload-grid"><label className="media-file-field"><span>Image file</span><input name="file" type="file" accept="image/jpeg,image/png,image/webp,image/avif" required /><small>Minimum 320 × 240 pixels. The original filename is preserved in metadata.</small></label><label><span>Alternative text</span><input name="altText" minLength={3} maxLength={300} placeholder="Describe what is useful in the image" required /><small>Describe the visible subject and context; do not repeat keywords mechanically.</small></label><label><span>Creator or source credit</span><input name="credit" maxLength={200} placeholder="Photographer, organisation, or source" /></label><label><span>Usage licence</span><select name="license" defaultValue="original" required><option value="original">Original Natura image</option><option value="licensed-stock">Licensed stock</option><option value="creative-commons">Creative Commons</option><option value="public-domain">Public domain</option></select></label></div>
    <div className="media-upload-footer"><button type="submit" disabled={state.tone === "working"}>{state.tone === "working" ? "Uploading…" : "Upload to media library"}</button>{state.message && <p className={state.tone} role={state.tone === "error" ? "alert" : "status"}>{state.message}</p>}</div>
  </form>;
}
