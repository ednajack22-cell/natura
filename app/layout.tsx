import type { Metadata } from "next";
import { SiteFooter } from "@/components/site-footer";
import { SiteHeader } from "@/components/site-header";
import "./globals.css";

export const metadata: Metadata = {
  metadataBase: new URL(process.env.NEXT_PUBLIC_SITE_URL ?? "http://localhost:3000"),
  title: {
    default: "Natura | Practical gardening for small spaces",
    template: "%s | Natura",
  },
  description:
    "Practical, trustworthy guidance for growing plants on balconies, patios, indoors, and in containers.",
  applicationName: "Natura",
  openGraph: {
    type: "website",
    siteName: "Natura",
    locale: "en_US",
    images: [{ url: "/images/natura-balcony-hero.png", width: 1536, height: 1024, alt: "Natura balcony garden" }],
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en" className="h-full scroll-smooth antialiased" data-scroll-behavior="smooth" suppressHydrationWarning>
      <body className="min-h-full" suppressHydrationWarning>
        <a className="skip-link" href="#main-content">Skip to content</a>
        <SiteHeader />
        {children}
        <SiteFooter />
      </body>
    </html>
  );
}
