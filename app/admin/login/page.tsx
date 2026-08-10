import type { Metadata } from "next";
import Link from "next/link";
import { LeafIcon } from "@/components/icons";
import { login } from "@/app/admin/login/actions";

export const metadata: Metadata = { title: "Administrator sign in", robots: { index: false, follow: false, noarchive: true } };

export default async function AdminLoginPage({ searchParams }: { searchParams: Promise<{ error?: string }> }) {
  const { error } = await searchParams;
  return <main id="main-content" className="login-shell"><section className="login-card"><div className="login-brand"><span className="brand-mark"><LeafIcon /></span><div><span>Natura</span><small>Private editorial workspace</small></div></div><p className="eyebrow">Administrator access</p><h1>Welcome back.</h1><p>Sign in to review, prepare, and publish Natura’s editorial content.</p>{error && <div className="form-alert" role="alert">{error === "forbidden" ? "This account does not have administrator access." : "The email address or password is incorrect."}</div>}<form className="login-form" action={login}><label htmlFor="email">Email address</label><input id="email" name="email" type="email" autoComplete="username" required /><label htmlFor="password">Password</label><input id="password" name="password" type="password" autoComplete="current-password" minLength={12} required /><button className="button button-primary" type="submit">Sign in securely</button></form><div className="login-security"><strong>Local and private</strong><p>This authentication service currently runs only on your computer through Supabase local.</p></div><Link className="back-link" href="/">← Return to Natura</Link></section></main>;
}
