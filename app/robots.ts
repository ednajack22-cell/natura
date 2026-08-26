import type { MetadataRoute } from "next";

const publicSearchAgents = ["OAI-SearchBot", "ChatGPT-User", "Claude-SearchBot", "Claude-User", "PerplexityBot", "Perplexity-User", "Googlebot", "Bingbot"];

export default function robots(): MetadataRoute.Robots {
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? "http://localhost:3000";
  const publicRules = { allow: "/", disallow: ["/admin/", "/api/", "/healthz"] };
  return {
    rules: [
      { userAgent: publicSearchAgents, ...publicRules },
      { userAgent: "*", ...publicRules },
    ],
    sitemap: `${base}/sitemap.xml`,
    host: base,
  };
}
