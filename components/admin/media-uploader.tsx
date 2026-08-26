"use client";

import { useRef, useState } from "react";
import { useRouter } from "next/navigation";

const allowedTypes = new Set(["image/jpeg", "image/png", "image/webp", "image/avif"]);
const maxSize = 10 * 1024 * 1024;

export function MediaUploader() {
  const router = useRouter();
  const formRef = useRef<HTMLFormElement>(null);
  const [state, setState] = useState<{ tone: "idle" | "working" | "success" | "error"; message: string }>({ tone: "idle", message: "" });

  async function upload(formData: FormData) {
    const file = formData.get("file");
    const altText = String(formData.get("altText") ?? "").trim();
    const bucket = formData.get("visibility") === "published_images" ? "published_images" : "draft_images";
    if (!(file instanceof File) || !file.size) return setState({ tone: "error", message: "Choose an image to upload." });
    if (!allowedTypes.has(file.type)) return setState({ tone: "error", message: "Use a JPEG, PNG, WebP, or AVIF image." });
    if (file.size > maxSize) return setState({ tone: "error", message: "The image must be smaller than 10 MB." });
    if (altText.length < 3) return setState({ tone: "error", message: "Alternative text is required for accessibility." });

    setState({ tone: "working", message: "Optimizing and uploading the image…" });
    try {
      formData.set("intent", "upload");
      formData.set("bucket", bucket);
      const response = await fetch("/admin/media/process", { method: "POST", body: formData });
      const result = await response.json() as { message?: string };
      if (!response.ok) throw new Error(result.message || "The image could not be processed.");
      formRef.current?.reset();
      setState({ tone: "success", message: `${result.message} ${bucket === "draft_images" ? "Saved as a private draft." : "Published to the editor library."}` });
      router.refresh();
    } catch (error) {
      setState({ tone: "error", message: error instanceof Error ? error.message : "The image could not be uploaded." });
    }
  }

  return <form ref={formRef} action={upload} className="dashboard-panel media-upload-card" id="upload-media">
    <div className="panel-heading"><div><p className="dashboard-kicker">Secure import</p><h2>Upload a new image</h2></div><span className="module-note">Automatic WebP · maximum source 10 MB</span></div>
    <div className="media-upload-grid"><label className="media-file-field"><span>Image file</span><input name="file" type="file" accept="image/jpeg,image/png,image/webp,image/avif" required /><small>JPEG, PNG, WebP or AVIF. Natura automatically limits the longest side to 2,400 px and the stored file to 1.5 MB.</small></label><label><span>Alternative text</span><input name="altText" minLength={3} maxLength={300} placeholder="Describe what is useful in the image" required /><small>Describe the visible subject and context; do not repeat keywords mechanically.</small></label><label><span>Creator or source credit</span><input name="credit" maxLength={200} placeholder="Photographer, organisation, or source" /></label><label><span>Usage licence</span><select name="license" defaultValue="original" required><option value="original">Original Natura image</option><option value="licensed-stock">Licensed stock</option><option value="creative-commons">Creative Commons</option><option value="public-domain">Public domain</option></select></label><label><span>Initial visibility</span><select name="visibility" defaultValue="draft_images"><option value="draft_images">Private draft (recommended)</option><option value="published_images">Published editor library</option></select><small>Private drafts require an explicit publication action before editors can select them.</small></label></div>
    <div className="media-upload-footer"><button type="submit" disabled={state.tone === "working"}>{state.tone === "working" ? "Uploading…" : "Upload to media library"}</button>{state.message && <p className={state.tone} role={state.tone === "error" ? "alert" : "status"}>{state.message}</p>}</div>
  </form>;
}
