import Link from "next/link";
import { ArrowIcon, LeafIcon, SearchIcon } from "@/components/icons";
import { navigation } from "@/lib/navigation";

export function SiteHeader() {
  return <>
    <div className="announcement-bar"><div className="site-container"><span>Independent guidance for real growing spaces</span><Link href="/grow">Explore the first plant collection <ArrowIcon /></Link></div></div>
    <header className="site-header">
      <div className="site-container header-inner">
        <Link className="brand" href="/" aria-label="Natura home"><span className="brand-mark"><LeafIcon /></span><span>Natura<small>Grow with confidence</small></span></Link>
        <nav className="desktop-nav" aria-label="Primary navigation">
          {navigation.map((item) => item.children.length === 0 ? (
            <div className="nav-group nav-group-plain" key={item.href}>
              <Link className="nav-group-link" href={item.href}>{item.label}</Link>
            </div>
          ) : (
            <div className="nav-group" key={item.href}>
              <Link className="nav-group-link" href={item.href}>{item.label}<span aria-hidden="true">⌄</span></Link>
              <div className="nav-mega-menu">
                <div className="nav-mega-intro"><small>Explore</small><h2>{item.label}</h2><p>{item.description}</p><Link href={item.href}>View overview <ArrowIcon /></Link></div>
                <div className="nav-mega-links">{item.children.map((child) => <Link href={child.href} key={child.href}><strong>{child.label}</strong><span>{child.description}</span></Link>)}</div>
              </div>
            </div>
          ))}
        </nav>
        <form className="header-search-form" role="search" method="post" action="/search/submit">
            <label className="sr-only" htmlFor="header-search-input">Search Natura</label>
            <SearchIcon />
            <input id="header-search-input" name="q" type="search" placeholder="Search plants, problems, articles" maxLength={120} />
            <button type="submit">Search</button>
          </form>
          <Link className="button header-search header-search-fallback" href="/search" aria-label="Search Natura"><SearchIcon /><span>Search</span></Link>
        <details className="mobile-menu"><summary>Menu</summary><nav className="mobile-panel" aria-label="Mobile navigation">{navigation.map((item) => item.children.length === 0 ? <Link className="mobile-nav-link" href={item.href} key={item.href}>{item.label}</Link> : <details className="mobile-nav-group" key={item.href}><summary>{item.label}<span>+</span></summary><div><Link className="mobile-overview-link" href={item.href}>View overview</Link>{item.children.map((child) => <Link href={child.href} key={child.href}>{child.label}</Link>)}</div></details>)}<Link className="mobile-search-link" href="/search"><SearchIcon />Search Natura</Link></nav></details>
      </div>
    </header>
  </>;
}
