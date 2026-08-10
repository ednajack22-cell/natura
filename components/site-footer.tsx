import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";

export function SiteFooter() {
  return (
    <footer className="site-footer"><div className="site-container">
      <div className="footer-top"><div><p className="footer-kicker">Natura field notes</p><h2>Useful ideas, timed to the season.</h2></div><Link className="button button-light" href="/planting-calendar">Open the planting calendar <ArrowIcon /></Link></div>
      <div className="footer-grid"><div className="footer-brand"><Link className="brand brand-inverse" href="/"><span className="brand-mark brand-mark-light"><LeafIcon /></span><span>Natura<small>Grow with confidence</small></span></Link><p>Independent, source-aware gardening guidance for balconies, patios, containers, and indoor spaces.</p></div>
        <div className="footer-column"><h2>Grow</h2><Link href="/grow">Plant guides</Link><Link href="/plants/cherry-tomato">Cherry tomato</Link><Link href="/plants/genovese-basil">Genovese basil</Link><Link href="/plants/balcony-strawberry">Strawberry</Link></div>
        <div className="footer-column"><h2>Plan & solve</h2><Link href="/planting-calendar">Planting calendar</Link><Link href="/plant-care">Plant care</Link><Link href="/tools">Tools</Link><Link href="/search">Search</Link></div>
        <div className="footer-column"><h2>Natura</h2><Link href="/start-here">Start here</Link><Link href="/about">About</Link><Link href="/editorial-policy">Editorial policy</Link><Link href="/authors">Authors</Link><Link href="/contact">Contact</Link><Link href="/admin">Administration</Link></div>
      </div>
      <div className="footer-bottom"><span>© 2026 Natura. Built carefully, grown continuously.</span><nav aria-label="Legal information"><Link href="/privacy-policy">Privacy</Link><Link href="/legal-notice">Legal</Link><Link href="/commercial-disclosure">Commercial disclosure</Link></nav></div>
    </div></footer>
  );
}
