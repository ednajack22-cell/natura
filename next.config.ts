import type { NextConfig } from "next";

const isDevelopment = process.env.NODE_ENV !== "production";

/**
 * Ad and consent origins.
 *
 * AdSense will not render at all under a `'self'`-only script policy, and
 * Google's certified consent message (required for EEA and UK traffic) is
 * served from `fundingchoicesmessages.google.com`. These lists are the minimum
 * that lets both work; they are only added when a publisher id is configured,
 * so a site running without ads keeps the stricter policy.
 */
const adsConfigured = /^ca-pub-\d{16}$/.test(process.env.NEXT_PUBLIC_ADSENSE_CLIENT_ID ?? "");

const adScriptOrigins = [
  "https://pagead2.googlesyndication.com",
  "https://partner.googleadservices.com",
  "https://tpc.googlesyndication.com",
  "https://www.googletagservices.com",
  "https://adservice.google.com",
  "https://fundingchoicesmessages.google.com",
];
const adFrameOrigins = [
  "https://googleads.g.doubleclick.net",
  "https://tpc.googlesyndication.com",
  "https://www.google.com",
];
const adConnectOrigins = [
  "https://pagead2.googlesyndication.com",
  "https://googleads.g.doubleclick.net",
  "https://adservice.google.com",
  "https://fundingchoicesmessages.google.com",
  "https://csi.gstatic.com",
];
const adImageOrigins = [
  "https://pagead2.googlesyndication.com",
  "https://tpc.googlesyndication.com",
  "https://googleads.g.doubleclick.net",
  "https://www.google.com",
  "https://www.gstatic.com",
];

const join = (values: string[]) => (values.length ? ` ${values.join(" ")}` : "");
const ads = (values: string[]) => (adsConfigured ? join(values) : "");
const dev = (value: string) => (isDevelopment ? ` ${value}` : "");

const contentSecurityPolicy = [
  "default-src 'self'",
  `script-src 'self' 'unsafe-inline'${dev("'unsafe-eval'")}${ads(adScriptOrigins)}`,
  "style-src 'self' 'unsafe-inline'",
  `img-src 'self' data: blob: https://*.supabase.co${dev("http://127.0.0.1:54321 http://localhost:54321")}${ads(adImageOrigins)}`,
  "font-src 'self' data:",
  `connect-src 'self' https://*.supabase.co${dev("http://127.0.0.1:54321 http://localhost:54321 ws://localhost:* ws://127.0.0.1:*")}${ads(adConnectOrigins)}`,
  "object-src 'none'",
  "base-uri 'self'",
  `frame-src 'self'${ads(adFrameOrigins)}`,
  "frame-ancestors 'self'",
  "form-action 'self'",
].join("; ");

const securityHeaders = [
  { key: "X-Content-Type-Options", value: "nosniff" },
  { key: "X-Frame-Options", value: "SAMEORIGIN" },
  { key: "X-DNS-Prefetch-Control", value: "off" },
  { key: "Cross-Origin-Opener-Policy", value: "same-origin" },
  { key: "Referrer-Policy", value: "strict-origin-when-cross-origin" },
  { key: "Permissions-Policy", value: "camera=(), microphone=(), geolocation=()" },
  { key: "Content-Security-Policy", value: contentSecurityPolicy },
  ...(isDevelopment ? [] : [{ key: "Strict-Transport-Security", value: "max-age=63072000; includeSubDomains; preload" }]),
];

const privateRobotsHeader = { key: "X-Robots-Tag", value: "noindex, nofollow, noarchive, nosnippet, noimageindex" };

const nextConfig: NextConfig = {
  poweredByHeader: false,
  images: { formats: ["image/avif", "image/webp"], dangerouslyAllowLocalIP: isDevelopment, remotePatterns: [
    ...(isDevelopment ? [
      { protocol: "http" as const, hostname: "127.0.0.1", port: "54321", pathname: "/storage/v1/object/public/**" },
      { protocol: "http" as const, hostname: "localhost", port: "54321", pathname: "/storage/v1/object/public/**" },
      { protocol: "http" as const, hostname: "127.0.0.1", port: "54321", pathname: "/storage/v1/object/sign/**" },
      { protocol: "http" as const, hostname: "localhost", port: "54321", pathname: "/storage/v1/object/sign/**" },
    ] : []),
    { protocol: "https", hostname: "*.supabase.co", pathname: "/storage/v1/object/public/**" },
    { protocol: "https", hostname: "*.supabase.co", pathname: "/storage/v1/object/sign/**" },
  ] },
  async headers() {
    return [
      { source: "/:path*", headers: securityHeaders },
      { source: "/admin/:path*", headers: [privateRobotsHeader, { key: "Cache-Control", value: "private, no-store" }] },
      { source: "/api/:path*", headers: [privateRobotsHeader] },
      { source: "/healthz", headers: [privateRobotsHeader, { key: "Cache-Control", value: "no-store" }] },
      { source: "/tools/garden-profile/save", headers: [privateRobotsHeader, { key: "Cache-Control", value: "private, no-store" }] },
      { source: "/ads.txt", headers: [{ key: "Content-Type", value: "text/plain; charset=utf-8" }] },
    ];
  },
};

export default nextConfig;
