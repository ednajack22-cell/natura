import type { Metadata } from "next";
import Image from "next/image";
import { MediaIcon, PlusIcon } from "@/components/admin/admin-icons";
import { MediaAssetManager, type ManagedMediaAsset } from "@/components/admin/media-asset-manager";
import { MediaUploader } from "@/components/admin/media-uploader";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Media library" };

const websiteAssets = [
  { src: "/images/natura-balcony-hero.jpg", name: "Homepage garden", type: "Editorial hero", alt: "A calm premium container garden" },
  { src: "/images/cherry-tomato.jpg", name: "Cherry tomato", type: "Plant profile", alt: "Cherry tomato growing in a terracotta pot" },
  { src: "/images/genovese-basil.jpg", name: "Genovese basil", type: "Plant profile", alt: "Genovese basil in an ivory pot" },
  { src: "/images/balcony-strawberry.jpg", name: "Balcony strawberry", type: "Plant profile", alt: "Strawberry plant in a balcony container" },
];

export default async function MediaLibraryPage() {
  const { supabase } = await requireAdmin();
  const { data, error } = await supabase.from("media_assets").select("id, alt_text, object_path, bucket, credit, license, original_name, mime_type, file_size, width, height, created_at, updated_at").order("created_at", { ascending: false });
  if (error) throw new Error("Unable to load media assets.");

  const uploadedAssets: ManagedMediaAsset[] = await Promise.all(data.map(async (asset) => {
    const url = asset.bucket === "published_images"
      ? supabase.storage.from(asset.bucket).getPublicUrl(asset.object_path).data.publicUrl
      : (await supabase.storage.from(asset.bucket).createSignedUrl(asset.object_path, 3600)).data?.signedUrl;
    const { data: usages, error: usageError } = await supabase.rpc("media_asset_usage", { p_asset_id: asset.id });
    if (!url) throw new Error("Unable to create a secure media preview.");
    if (usageError) throw new Error("Unable to inspect media usage.");
    return {
      id: asset.id,
      bucket: asset.bucket,
      objectPath: asset.object_path,
      url,
      altText: asset.alt_text,
      credit: asset.credit,
      license: asset.license,
      originalName: asset.original_name,
      mimeType: asset.mime_type,
      fileSize: asset.file_size,
      width: asset.width,
      height: asset.height,
      usages,
    };
  }));
  const privateCount = data.filter((asset) => asset.bucket === "draft_images").length;
  const usedCount = uploadedAssets.filter((asset) => asset.usages.length > 0).length;

  return <main id="main-content">
    <header className="dashboard-page-header"><div><p className="dashboard-kicker">Visual assets</p><h1>Media library</h1><p>Import imagery, document rights, and prepare accessible visuals for publication.</p></div><a className="dashboard-primary-action" href="#upload-media"><PlusIcon />Upload media</a></header>
    <section className="media-summary-grid"><article><span><MediaIcon /></span><div><strong>{websiteAssets.length + data.length}</strong><small>Visual assets</small></div></article><article><span>Aa</span><div><strong>{websiteAssets.length + data.filter((asset) => asset.alt_text).length}</strong><small>With alt text</small></div></article><article><span>PR</span><div><strong>{privateCount}</strong><small>Private drafts</small></div></article><article><span>US</span><div><strong>{usedCount}</strong><small>Used in content</small></div></article></section>
    <MediaUploader />
    <section className="dashboard-panel media-library-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Website assets</p><h2>Current collection</h2></div><span className="module-note">Bundled with the initial Natura design</span></div><div className="media-grid">{websiteAssets.map((asset) => <article key={asset.src}><div className="media-thumb"><Image src={asset.src} alt={asset.alt} fill sizes="(max-width: 800px) 50vw, 25vw" /></div><div><strong>{asset.name}</strong><span>{asset.type}</span><small><i /> Alt text ready</small></div></article>)}</div></section>
    {uploadedAssets.length > 0 && <section className="dashboard-panel media-library-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Supabase Storage</p><h2>Managed media</h2></div><span className="module-note">{uploadedAssets.length} assets · private drafts and published library</span></div><div className="managed-media-grid">{uploadedAssets.map((asset) => <MediaAssetManager key={asset.id} asset={asset} />)}</div></section>}
  </main>;
}
