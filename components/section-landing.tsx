import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";

type LandingItem = { title: string; description: string; id?: string; href?: string };
export function SectionLanding({ eyebrow, title, intro, items }: { eyebrow: string; title: string; intro: string; items: LandingItem[] }) {
  return <main id="main-content"><section className="landing-hero"><div className="site-container landing-hero-inner"><p className="eyebrow"><LeafIcon />{eyebrow}</p><h1>{title}</h1><p>{intro}</p><Link className="button button-primary" href="/start-here">Start with Natura <ArrowIcon /></Link></div></section><section className="section site-container"><div className="landing-grid">{items.map((item)=><article className="landing-card" id={item.id} key={item.title}><h2>{item.title}</h2><p>{item.description}</p>{item.href ? <Link className="text-link" href={item.href}>Explore collection <ArrowIcon /></Link> : <span className="landing-coming-soon">Collection in development</span>}</article>)}</div></section></main>;
}
