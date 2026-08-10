import type { Metadata } from "next";
import Image from "next/image";
import { MediaIcon, PlusIcon } from "@/components/admin/admin-icons";
import { MediaUploader } from "@/components/admin/media-uploader";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Media library" };

const websiteAssets = [
  { src: "/images/home-hero-garden.png", name: "Homepage garden", type: "Editorial hero", alt: "A calm premium container garden" },
  { src: "/images/cherry-tomato.png", name: "Cherry tomato", type: "Plant profile", alt: "Cherry tomato growing in a terracotta pot" },
  { src: "/images/genovese-basil.png", name: "Genovese basil", type: "Plant profile", alt: "Genovese basil in an ivory pot" },
  { src: "/images/balcony-strawberry.png", name: "Balcony strawberry", type: "Plant profile", alt: "Strawberry plant in a balcony container" },
];

export default async function MediaLibraryPage() {
  const { supabase } = await requireAdmin();
  const { data, error } = await supabase.from("media_assets").select("id, alt_text, object_path, bucket, credit, license, original_name, mime_type, file_size, width, height, created_at").order("created_at", { ascending: false });
  if (error) throw new Error("Unable to load media assets.");
  const uploadedAssets = data.map((asset) => ({ ...asset, url: supabase.storage.from(asset.bucket).getPublicUrl(asset.object_path).data.publicUrl }));

  return <main id="main-content">
    <header className="dashboard-page-header"><div><p className="dashboard-kicker">Visual assets</p><h1>Media library</h1><p>Import imagery, document rights, and prepare accessible visuals for publication.</p></div><a className="dashboard-primary-action" href="#upload-media"><PlusIcon />Upload media</a></header>
    <section className="media-summary-grid"><article><span><MediaIcon /></span><div><strong>{websiteAssets.length + data.length}</strong><small>Visual assets</small></div></article><article><span>Aa</span><div><strong>{websiteAssets.length + data.filter((asset) => asset.alt_text).length}</strong><small>With alt text</small></div></article><article><span>DB</span><div><strong>{data.length}</strong><small>In local storage</small></div></article></section>
    <MediaUploader />
    <section className="dashboard-panel media-library-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Website assets</p><h2>Current collection</h2></div><span className="module-note">Bundled with the initial Natura design</span></div><div className="media-grid">{websiteAssets.map((asset) => <article key={asset.src}><div className="media-thumb"><Image src={asset.src} alt={asset.alt} fill sizes="(max-width: 800px) 50vw, 25vw" /></div><div><strong>{asset.name}</strong><span>{asset.type}</span><small><i /> Alt text ready</small></div></article>)}</div></section>
    {uploadedAssets.length > 0 && <section className="dashboard-panel media-library-panel"><div className="panel-heading"><div><p className="dashboard-kicker">Supabase Storage</p><h2>Uploaded media</h2></div><span className="module-note">{uploadedAssets.length} assets ready for the editor</span></div><div className="media-grid uploaded-media-grid">{uploadedAssets.map((asset) => <article key={asset.id}><div className="media-thumb"><Image src={asset.url} alt={asset.alt_text} fill sizes="(max-width: 800px) 100vw, 25vw" /></div><div><strong>{asset.original_name ?? asset.object_path.split("/").at(-1)}</strong><span>{asset.width && asset.height ? `${asset.width} × ${asset.height}` : "Dimensions unavailable"} · {asset.file_size ? `${Math.round(asset.file_size / 1024)} KB` : "Size unavailable"}</span><small><i />{asset.alt_text}</small><dl><div><dt>Credit</dt><dd>{asset.credit ?? "Natura"}</dd></div><div><dt>Licence</dt><dd>{asset.license.replaceAll("-", " ")}</dd></div></dl></div></article>)}</div></section>}
  </main>;
}
