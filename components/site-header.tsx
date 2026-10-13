import Link from "next/link";
import { LeafIcon } from "@/components/icons";
import { HeaderNavigation } from "@/components/header-navigation";
import { navigation } from "@/lib/navigation";

export function SiteHeader() {
  return (
    <header className="site-header">
      <div className="site-container header-inner">
        <Link className="brand" href="/" aria-label="Natura home">
          <span className="brand-mark"><LeafIcon /></span>
          <span>Natura<small>Grow with confidence</small></span>
        </Link>
        <HeaderNavigation items={navigation} />
      </div>
    </header>
  );
}
