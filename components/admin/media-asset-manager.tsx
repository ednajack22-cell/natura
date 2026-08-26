"use client";

import Image from "next/image";
import Link from "next/link";
import { useRouter } from "next/navigation";
import { MouseEvent, useRef, useState, useTransition } from "react";
import { deleteMediaAsset, moveMediaAsset, updateMediaMetadata, type MediaActionResult } from "@/app/admin/media/actions";

type Usage = { content_id: string; content_type: string; title: string; slug: string; status: string; usage_location: string };
export type ManagedMediaAsset = {
  id: string; bucket: string; objectPath: string; url: string; altText: string; credit: string | null; license: string;
  originalName: string | null; mimeType: string | null; fileSize: number | null; width: number | null; height: number | null; usages: Usage[];
};

const allowedTypes = new Set(["image/jpeg", "image/png", "image/webp", "image/avif"]);
const maxSize = 10 * 1024 * 1024;

async function dimensions(file: Blob) {
  const bitmap = await createImageBitmap(file);
  const result = { width: bitmap.width, height: bitmap.height };
  bitmap.close();
  return result;
}

async function replaceWithOptimizedFile(assetId: string, file: File) {
  const formData = new FormData();
  formData.set("intent", "replace");
  formData.set("assetId", assetId);
  formData.set("file", file);
  const response = await fetch("/admin/media/process", { method: "POST", body: formData });
  const result = await response.json() as { message?: string };
  if (!response.ok) throw new Error(result.message || "The image could not be processed.");
  return result.message || "Image optimized and replaced.";
}

function canvasBlob(canvas: HTMLCanvasElement, type: string) {
  return new Promise<Blob>((resolve, reject) => canvas.toBlob((blob) => blob ? resolve(blob) : reject(new Error("The browser could not create the crop.")), type, .9));
}

export function MediaAssetManager({ asset }: { asset: ManagedMediaAsset }) {
  const router = useRouter();
  const replacementRef = useRef<HTMLInputElement>(null);
  const [isPending, startTransition] = useTransition();
  const [message, setMessage] = useState<MediaActionResult | null>(null);
  const [previewUrl, setPreviewUrl] = useState(asset.url);
  const [cropRatio, setCropRatio] = useState("1:1");
  const [focusX, setFocusX] = useState(50);
  const [focusY, setFocusY] = useState(50);

  function run(action: () => Promise<MediaActionResult>, refresh = true) {
    setMessage(null);
    startTransition(async () => {
      const result = await action();
      setMessage(result);
      if (result.ok && refresh) router.refresh();
    });
  }

  function saveMetadata(event: MouseEvent<HTMLButtonElement>) {
    const form = event.currentTarget.form;
    if (!form || !form.reportValidity()) return;
    const data = new FormData(form);
    run(() => updateMediaMetadata({ id: asset.id, altText: data.get("altText"), credit: data.get("credit"), license: data.get("license") }), false);
  }

  async function replaceFile(file: File) {
    if (!allowedTypes.has(file.type)) return setMessage({ ok: false, message: "Use a JPEG, PNG, WebP, or AVIF image." });
    if (!file.size || file.size > maxSize) return setMessage({ ok: false, message: "The replacement must be smaller than 10 MB." });
    setMessage({ ok: true, message: "Validating the replacement…" });
    try {
      const size = await dimensions(file);
      if (size.width < 320 || size.height < 240 || size.width * size.height > 40_000_000) throw new Error("Use an image between 320 × 240 and 40 megapixels.");
      const resultMessage = await replaceWithOptimizedFile(asset.id, file);
      setMessage({ ok: true, message: resultMessage });
      setPreviewUrl(`${asset.url}${asset.url.includes("?") ? "&" : "?"}v=${Date.now()}`);
    } catch (error) {
      setMessage({ ok: false, message: error instanceof Error ? error.message : "The image could not be replaced." });
    } finally {
      if (replacementRef.current) replacementRef.current.value = "";
    }
  }

  async function cropCurrentImage() {
    setMessage({ ok: true, message: "Creating the crop…" });
    try {
      const response = await fetch(previewUrl, { cache: "no-store" });
      if (!response.ok) throw new Error("The current image could not be loaded for cropping.");
      const bitmap = await createImageBitmap(await response.blob());
      const [ratioWidth, ratioHeight] = cropRatio.split(":").map(Number);
      const targetRatio = ratioWidth / ratioHeight;
      let sourceWidth = bitmap.width;
      let sourceHeight = bitmap.height;
      if (sourceWidth / sourceHeight > targetRatio) sourceWidth = sourceHeight * targetRatio;
      else sourceHeight = sourceWidth / targetRatio;
      const sourceX = (bitmap.width - sourceWidth) * (focusX / 100);
      const sourceY = (bitmap.height - sourceHeight) * (focusY / 100);
      const canvas = document.createElement("canvas");
      canvas.width = Math.round(sourceWidth);
      canvas.height = Math.round(sourceHeight);
      canvas.getContext("2d")?.drawImage(bitmap, sourceX, sourceY, sourceWidth, sourceHeight, 0, 0, canvas.width, canvas.height);
      bitmap.close();
      const blob = await canvasBlob(canvas, "image/webp");
      if (blob.size > maxSize) throw new Error("The cropped image is larger than 10 MB.");
      const name = `${(asset.originalName ?? "image").replace(/\.[^.]+$/, "")}-cropped.webp`;
      const resultMessage = await replaceWithOptimizedFile(asset.id, new File([blob], name, { type: "image/webp" }));
      setMessage({ ok: true, message: resultMessage });
      setPreviewUrl(`${asset.url}${asset.url.includes("?") ? "&" : "?"}v=${Date.now()}`);
    } catch (error) {
      setMessage({ ok: false, message: error instanceof Error ? error.message : "The image could not be cropped." });
    }
  }

  const isPrivate = asset.bucket === "draft_images";
  return <article className="managed-media-card">
    <div className="media-thumb"><Image src={previewUrl} alt={asset.altText} fill sizes="(max-width: 800px) 100vw, 33vw" unoptimized={isPrivate} /></div>
    <div className="managed-media-summary"><div><span className={`media-visibility ${isPrivate ? "private" : "public"}`}>{isPrivate ? "Private draft" : "Published"}</span><strong>{asset.originalName ?? asset.objectPath.split("/").at(-1)}</strong><small>{asset.width && asset.height ? `${asset.width} × ${asset.height}` : "Dimensions unavailable"} · {asset.fileSize ? `${Math.round(asset.fileSize / 1024)} KB` : "Size unavailable"}</small></div><span className={asset.usages.length ? "media-usage used" : "media-usage"}>{asset.usages.length ? `${asset.usages.length} use${asset.usages.length === 1 ? "" : "s"}` : "Unused"}</span></div>
    <details className="media-manager-details"><summary>Manage image</summary><div className="media-manager-body">
      <form className="media-metadata-form"><label><span>Alternative text</span><input name="altText" defaultValue={asset.altText} minLength={3} maxLength={300} required /></label><label><span>Creator or source credit</span><input name="credit" defaultValue={asset.credit ?? ""} maxLength={200} /></label><label><span>Usage licence</span><select name="license" defaultValue={asset.license}><option value="original">Original Natura image</option><option value="licensed-stock">Licensed stock</option><option value="creative-commons">Creative Commons</option><option value="public-domain">Public domain</option></select></label><button type="button" onClick={saveMetadata} disabled={isPending}>Save details</button></form>
      <section className="media-file-tools"><div><strong>Replace file</strong><small>Keeps the same media URL and editorial links. The replacement is optimized automatically.</small></div><label className="media-file-button">Choose replacement<input ref={replacementRef} type="file" accept="image/jpeg,image/png,image/webp,image/avif" onChange={(event) => { const file = event.target.files?.[0]; if (file) void replaceFile(file); }} /></label></section>
      <section className="media-crop-tools"><div><strong>Crop current image</strong><small>Choose a ratio and the horizontal/vertical focus.</small></div><div className="media-crop-grid"><label><span>Ratio</span><select value={cropRatio} onChange={(event) => setCropRatio(event.target.value)}><option value="1:1">Square · 1:1</option><option value="4:3">Landscape · 4:3</option><option value="3:2">Photo · 3:2</option><option value="16:9">Wide · 16:9</option></select></label><label><span>Horizontal focus · {focusX}%</span><input type="range" min="0" max="100" value={focusX} onChange={(event) => setFocusX(Number(event.target.value))} /></label><label><span>Vertical focus · {focusY}%</span><input type="range" min="0" max="100" value={focusY} onChange={(event) => setFocusY(Number(event.target.value))} /></label><button type="button" onClick={() => void cropCurrentImage()}>Apply crop</button></div></section>
      <section className="media-usage-panel"><strong>Editorial usage</strong>{asset.usages.length ? <ul>{asset.usages.map((usage) => <li key={`${usage.content_id}-${usage.usage_location}`}><Link href={`/admin/content/${usage.content_id}/edit`}>{usage.title}</Link><span>{usage.content_type} · {usage.status} · {usage.usage_location}</span></li>)}</ul> : <p>No content currently references this image.</p>}</section>
      <section className="media-danger-zone"><div><strong>Visibility and deletion</strong><small>Published images can be selected in editors. Used images cannot be made private or deleted.</small></div><div><button type="button" disabled={isPending || (!isPrivate && asset.usages.length > 0)} onClick={() => run(() => moveMediaAsset({ id: asset.id, targetBucket: isPrivate ? "published_images" : "draft_images" }))}>{isPrivate ? "Publish image" : "Move to private drafts"}</button><button className="danger" type="button" disabled={isPending || asset.usages.length > 0} onClick={() => { if (window.confirm("Delete this unused image from storage and the media library?")) run(() => deleteMediaAsset(asset.id)); }}>Delete unused image</button></div></section>
      {message && <p className={message.ok ? "media-action-message success" : "media-action-message error"} role={message.ok ? "status" : "alert"}>{message.message}</p>}
    </div></details>
  </article>;
}
