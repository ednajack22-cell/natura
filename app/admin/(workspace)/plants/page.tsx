import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { PlantIcon, PlusIcon } from "@/components/admin/admin-icons";
import { plants } from "@/lib/plants";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Plant profiles" };

export default async function PlantProfilesPage() {
  const { supabase } = await requireAdmin();
  const { data, error } = await supabase.from("content_items").select("id, title, slug, status, updated_at").eq("content_type", "plant").order("updated_at", { ascending: false });
  if (error) throw new Error("Unable to load plant profiles.");

  const cards = plants.map((plant) => ({ ...plant, record: data.find((item) => item.slug === plant.slug) }));
  const completion = Math.min(Math.round((data.length / 15) * 100), 100);

  return <main id="main-content">
    <header className="dashboard-page-header"><div><p className="dashboard-kicker">Knowledge collection</p><h1>Plant profiles</h1><p>Build and maintain Natura’s expert plant library.</p></div><Link className="dashboard-primary-action" href="/admin/content/new"><PlusIcon />Add plant profile</Link></header>

    <section className="plant-progress-card"><div><span><PlantIcon /></span><div><p className="dashboard-kicker light">Launch collection</p><h2>{data.length} of 15 profiles ready</h2><p>Complete the essential collection before Natura’s public launch.</p></div></div><div className="plant-progress-score"><strong>{completion}%</strong><div><i style={{ width: `${completion}%` }} /></div></div></section>

    <section className="admin-plant-grid">
      {cards.map((plant) => <article className="admin-plant-card" key={plant.slug}><div className="admin-plant-image"><Image src={plant.image} alt={plant.imageAlt} fill sizes="(max-width: 800px) 100vw, 33vw" /><span className={`content-status ${plant.record?.status ?? "draft"}`}>{plant.record?.status ?? "Local profile"}</span></div><div><p>{plant.category}</p><h2>{plant.name}</h2><small>{plant.botanicalName}</small><div className="admin-plant-meta"><span>{plant.difficulty}</span><span>{plant.sunlight} sun</span></div><footer><Link href={plant.record ? `/admin/content/${plant.record.id}/edit` : `/admin/content/new?type=plant`}>{plant.record ? "Edit profile" : "Create database record"}</Link><Link href={`/plants/${plant.slug}`} target="_blank">Public preview ↗</Link></footer></div></article>)}
      <Link className="admin-plant-card plant-add-card" href="/admin/content/new?type=plant"><PlantIcon /><h2>Add the next plant</h2><p>Expand the starter collection with a complete expert profile.</p><span><PlusIcon /> Create profile</span></Link>
    </section>
  </main>;
}
