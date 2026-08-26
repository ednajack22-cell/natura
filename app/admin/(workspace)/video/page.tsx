import type { Metadata } from "next";
import Link from "next/link";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Video studio", robots: { index: false, follow: false, noarchive: true } };

const launchQueue = [
  { slug: "container-radish", format: "Long-form · 6–8 min", title: "How to grow radishes in containers from sowing to harvest", hook: "Show the finished roots first, then explain depth, spacing, moisture, and harvest timing.", shots: "Finished crop · container depth · sowing · thinning · moisture check · harvest" },
  { slug: "genovese-basil", format: "Long-form · 5–7 min", title: "How to keep balcony basil productive", hook: "Open with one healthy branching plant and demonstrate exactly where to pinch.", shots: "Healthy plant · light position · watering check · pinch point · regrowth" },
  { slug: "wilting-container-plants", format: "Short · 35–50 sec", title: "A wilting plant does not always need more water", hook: "Compare dry, waterlogged, heat-stressed, and root-bound clues before giving an action.", shots: "Leaf pattern · soil check · drainage hole · shade comparison · careful next step" },
  { slug: "aphids-edible-container-plants", format: "Short · 40–60 sec", title: "Check these signs before treating aphids", hook: "Show the insect and sticky residue clearly, then separate observation from treatment.", shots: "Leaf underside · aphid cluster · honeydew · beneficial insect check · low-impact action" },
  { slug: "powdery-mildew-balcony-plants", format: "Short · 40–60 sec", title: "Powdery mildew or ordinary leaf dust?", hook: "Use a close comparison and explain what pattern should make the viewer investigate further.", shots: "Close-up comparison · distribution · airflow · leaf removal hygiene" },
  { slug: "sow-cut-and-come-again-salad-trough", format: "Long-form · 7–9 min", title: "Build a cut-and-come-again salad trough", hook: "Start with a harvestable trough, then reproduce the project in a clear sequence.", shots: "Finished trough · drainage · mix · seed spacing · first cut · regrowth" },
] as const;

function publicHref(contentType: string, slug: string) {
  if (contentType === "plant") return `/plants/${slug}`;
  if (contentType === "problem") return `/plant-care/problems/${slug}`;
  if (contentType === "guide") return `/small-space-gardening/guides/${slug}`;
  return "/";
}

export default async function VideoStudioPage() {
  const { supabase } = await requireAdmin();
  const { data } = await supabase.from("content_items").select("id, slug, title, content_type, status").in("slug", launchQueue.map((item) => item.slug));
  const contents = data ?? [];
  return <main id="main-content"><header className="dashboard-page-header"><div><p className="dashboard-kicker">YouTube launch system</p><h1>Video studio</h1><p>Turn the strongest English Natura guides into useful demonstrations without inventing claims or separating the video from its source page.</p></div><div className="dashboard-header-stat"><span>Launch queue</span><strong>{launchQueue.length}</strong><small>3 long-form · 3 Shorts</small></div></header>
    <section className="dashboard-panel video-principles"><div><p className="dashboard-kicker">Publishing rule</p><h2>One evidence page, several useful formats.</h2></div><ol><li><strong>Promise accurately.</strong><span>The title and thumbnail must match the demonstration.</span></li><li><strong>Show the result early.</strong><span>Use the opening seconds to confirm what the viewer will learn.</span></li><li><strong>Keep limits visible.</strong><span>Climate, diagnosis, safety, and evidence boundaries stay in the script.</span></li><li><strong>Link to Natura.</strong><span>Every description points to the exact canonical guide, not the homepage.</span></li></ol></section>
    <section className="video-queue" aria-labelledby="video-queue-heading"><div className="dashboard-section-heading"><div><p className="dashboard-kicker">First production cycle</p><h2 id="video-queue-heading">English launch queue</h2></div><p>Record original footage. Reuse each long video for one Short and two Pinterest cards only when the framing remains genuinely different.</p></div>{launchQueue.map((item, index) => { const content = contents.find((entry) => entry.slug === item.slug); return <article className="dashboard-panel video-queue-card" key={item.slug}><span className="video-order">{String(index + 1).padStart(2, "0")}</span><div><p className="dashboard-kicker">{item.format}</p><h3>{item.title}</h3><p><strong>Opening:</strong> {item.hook}</p><p><strong>Shot list:</strong> {item.shots}</p><footer>{content ? <><Link href={`/admin/content/${content.id}/edit`}>Open source content</Link><Link href={publicHref(content.content_type, content.slug)} target="_blank">View public page</Link></> : <span>Source content is not available in the current database.</span>}</footer></div><span className={content?.status === "published" ? "video-ready" : "video-blocked"}>{content?.status === "published" ? "Source ready" : "Blocked"}</span></article>; })}</section>
    <section className="dashboard-panel video-checklist"><div><p className="dashboard-kicker">Before upload</p><h2>Production checklist</h2></div><ul><li>Original footage and music rights confirmed</li><li>Spoken claims match the Natura source page</li><li>English captions reviewed manually</li><li>Thumbnail is accurate and readable on mobile</li><li>Canonical Natura link and source note added</li><li>No location, account, password, dashboard, or private data visible on screen</li></ul></section>
  </main>;
}
