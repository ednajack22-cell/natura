"use client";

import Image from "next/image";
import Link from "next/link";
import { useState } from "react";

type MediaChoice = { id: string; url: string; altText: string; credit: string | null; license: string };

export function PlantMediaPicker({ initialImage, initialAlt, assets, imageFieldName = "plantImage", altFieldName = "imageAlt" }: { initialImage: string; initialAlt: string; assets: MediaChoice[]; imageFieldName?: string; altFieldName?: string }) {
  const [imagePath, setImagePath] = useState(initialImage);
  const [imageAlt, setImageAlt] = useState(initialAlt);

  return <div className="plant-media-picker">
    <div className="editor-field-grid"><label><span>Main image URL</span><input name={imageFieldName} value={imagePath} onChange={(event) => setImagePath(event.target.value)} maxLength={500} placeholder="Choose an image below or enter a URL" /></label><label><span>Image alternative text</span><input name={altFieldName} value={imageAlt} onChange={(event) => setImageAlt(event.target.value)} maxLength={300} /></label></div>
    {assets.length ? <div className="editor-media-choices"><div><strong>Choose from media library</strong><Link href="/admin/media#upload-media">Upload another image</Link></div><div>{assets.map((asset) => <button className={imagePath === asset.url ? "selected" : ""} type="button" key={asset.id} onClick={() => { setImagePath(asset.url); setImageAlt(asset.altText); }} aria-pressed={imagePath === asset.url}><span><Image src={asset.url} alt="" fill sizes="100px" /></span><div><strong>{asset.altText}</strong><small>{asset.credit ?? "Natura"} · {asset.license.replaceAll("-", " ")}</small></div></button>)}</div></div> : <div className="editor-media-empty"><span>No uploaded media yet.</span><Link href="/admin/media#upload-media">Open the media library to upload an image</Link></div>}
  </div>;
}
