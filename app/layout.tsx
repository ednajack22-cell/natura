import type { Metadata } from "next";
import { Inter } from "next/font/google";
import { SiteFooter } from "@/components/site-footer";
import { SiteHeader } from "@/components/site-header";
import { AdSenseScript } from "@/components/adsense-script";
import "./globals.css";

/**
 * The stylesheet has always asked for Inter, but nothing ever loaded it: no
 * next/font, no @font-face, no stylesheet link. Most visitors were served the
 * system fallback instead of the typeface the design was built around.
 *
 * next/font self-hosts the files at build time, so there is no third-party
 * request and no extra round-trip, and "swap" keeps text visible while it loads.
 */
const inter = Inter({ subsets: ["latin"], display: "swap", variable: "--font-inter" });

export const metadata: Metadata = {
  metadataBase: new URL(process.env.NEXT_PUBLIC_SITE_URL ?? "http://localhost:3000"),
  title: {
    default: "Natura | Practical gardening for small spaces",
    template: "%s | Natura",
  },
  description:
    "Practical, trustworthy guidance for growing plants on balconies, patios, indoors, and in containers.",
  applicationName: "Natura",
  alternates: {
    types: { "application/rss+xml": "/feed.xml" },
  },
  openGraph: {
    type: "website",
    siteName: "Natura",
    locale: "en_US",
    images: [{ url: "/images/natura-balcony-hero.jpg", width: 1536, height: 1024, alt: "Natura balcony garden" }],
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en" className={`${inter.variable} h-full scroll-smooth antialiased`} data-scroll-behavior="smooth" suppressHydrationWarning>
      <body className="min-h-full" suppressHydrationWarning>
        <a className="skip-link" href="#main-content">Skip to content</a>
        <SiteHeader />
        {children}
        <SiteFooter />
        <AdSenseScript />
      </body>
    </html>
  );
}
