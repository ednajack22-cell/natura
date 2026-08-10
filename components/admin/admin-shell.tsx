import Link from "next/link";
import type { ReactNode } from "react";
import { logout } from "@/app/admin/actions";
import { LeafIcon } from "@/components/icons";
import { AdminNavigation } from "@/components/admin/admin-navigation";
import { PlusIcon, SearchSmallIcon } from "@/components/admin/admin-icons";

type AdminShellProps = {
  children: ReactNode;
  name: string;
  email: string;
  contentCount: number;
};

export function AdminShell({ children, name, email, contentCount }: AdminShellProps) {
  const initials = name.split(/\s+/).map((part) => part[0]).join("").slice(0, 2).toUpperCase();

  return <div className="admin-app-shell">
    <aside className="dashboard-sidebar">
      <Link className="dashboard-brand" href="/admin">
        <span><LeafIcon /></span>
        <div><strong>Natura</strong><small>Editorial Studio</small></div>
      </Link>
      <AdminNavigation contentCount={contentCount} />
      <div className="dashboard-sidebar-card">
        <span>Launch collection</span><strong>20% complete</strong><div><i /></div><p>3 of 15 plant profiles ready.</p>
      </div>
      <div className="dashboard-sidebar-user"><span>{initials}</span><div><strong>{name}</strong><small>{email}</small></div></div>
    </aside>

    <div className="dashboard-main">
      <header className="dashboard-topbar">
        <details className="dashboard-mobile-menu"><summary><span /><span /><span /><b>Menu</b></summary><div><AdminNavigation contentCount={contentCount} /></div></details>
        <form className="dashboard-search" action="/admin/content">
          <SearchSmallIcon /><label className="sr-only" htmlFor="dashboard-search">Search content</label><input id="dashboard-search" name="q" placeholder="Search content, plants, or guides…" />
        </form>
        <div className="dashboard-topbar-actions">
          <span className="environment-pill"><i />Local</span>
          <Link className="dashboard-new-button" href="/admin/content/new"><PlusIcon />New content</Link>
          <details className="dashboard-account"><summary>{initials}</summary><div><strong>{name}</strong><small>{email}</small><form action={logout}><button type="submit">Sign out</button></form></div></details>
        </div>
      </header>
      <div className="dashboard-page">{children}</div>
    </div>
  </div>;
}
