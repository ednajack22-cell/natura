import { expect, test } from "@playwright/test";

type PageAudit = {
  title: string;
  description: string | null;
  canonical: string | null;
  h1Count: number;
  mainCount: number;
  missingAltSources: string[];
  duplicateIds: string[];
  invalidJsonLd: number;
  internalLinks: string[];
  replacementCharacters: boolean;
};

function normalizeUrl(value: string) {
  const url = new URL(value);
  url.hash = "";
  if (url.pathname !== "/") url.pathname = url.pathname.replace(/\/$/, "");
  return url.toString().replace(/\/$/, "");
}

test("every public sitemap page has a healthy rendered document", async ({ page, request, baseURL }) => {
  test.setTimeout(12 * 60_000);
  const sitemapResponse = await request.get("/sitemap.xml");
  expect(sitemapResponse.ok()).toBeTruthy();
  const sitemap = await sitemapResponse.text();
  const urls = [...sitemap.matchAll(/<loc>([^<]+)<\/loc>/g)].map((match) => match[1]);
  expect(urls.length).toBeGreaterThanOrEqual(60);
  const sitemapPaths = new Set(urls.map((url) => new URL(url).pathname));

  const issues: string[] = [];
  const links = new Set<string>();
  let currentPath = "";
  page.on("pageerror", (error) => issues.push(`${currentPath}: browser exception: ${error.message}`));
  page.on("console", (message) => {
    if (message.type() === "error") issues.push(`${currentPath}: console error: ${message.text()}`);
  });

  for (const url of urls) {
    currentPath = new URL(url).pathname;
    const response = await page.goto(url, { waitUntil: "domcontentloaded", timeout: 45_000 });
    if (!response || response.status() >= 400) {
      issues.push(`${currentPath}: HTTP ${response?.status() ?? "no response"}`);
      continue;
    }
    await page.waitForTimeout(200);

    const audit = await page.evaluate<PageAudit>(() => {
      const ids = [...document.querySelectorAll<HTMLElement>("[id]")].map((element) => element.id);
      const duplicateIds = [...new Set(ids.filter((id, index) => id && ids.indexOf(id) !== index))];
      let invalidJsonLd = 0;
      for (const script of document.querySelectorAll<HTMLScriptElement>('script[type="application/ld+json"]')) {
        try { JSON.parse(script.textContent || ""); } catch { invalidJsonLd += 1; }
      }
      return {
        title: document.title.trim(),
        description: document.querySelector<HTMLMetaElement>('meta[name="description"]')?.content.trim() ?? null,
        canonical: document.querySelector<HTMLLinkElement>('link[rel="canonical"]')?.href ?? null,
        h1Count: document.querySelectorAll("h1").length,
        mainCount: document.querySelectorAll("main#main-content").length,
        missingAltSources: [...document.querySelectorAll<HTMLImageElement>("img:not([alt])")].map((image) => image.currentSrc || image.src),
        duplicateIds,
        invalidJsonLd,
        internalLinks: [...document.querySelectorAll<HTMLAnchorElement>("a[href]")].map((anchor) => anchor.href),
        replacementCharacters: document.body.innerText.includes("�"),
      };
    });

    if (!audit.title) issues.push(`${currentPath}: missing document title`);
    if (!audit.description) issues.push(`${currentPath}: missing meta description`);
    if (!audit.canonical) issues.push(`${currentPath}: missing canonical URL`);
    else if (normalizeUrl(audit.canonical) !== normalizeUrl(url)) issues.push(`${currentPath}: canonical points to ${audit.canonical}`);
    if (audit.h1Count !== 1) issues.push(`${currentPath}: expected one H1, found ${audit.h1Count}`);
    if (audit.mainCount !== 1) issues.push(`${currentPath}: expected one main#main-content, found ${audit.mainCount}`);
    if (audit.missingAltSources.length) issues.push(`${currentPath}: images without alt: ${audit.missingAltSources.join(", ")}`);
    if (audit.duplicateIds.length) issues.push(`${currentPath}: duplicate IDs: ${audit.duplicateIds.join(", ")}`);
    if (audit.invalidJsonLd) issues.push(`${currentPath}: ${audit.invalidJsonLd} invalid JSON-LD block(s)`);
    if (audit.replacementCharacters) issues.push(`${currentPath}: contains a Unicode replacement character`);

    for (const href of audit.internalLinks) {
      const target = new URL(href, url);
      if (target.origin === new URL(baseURL!).origin && !target.hash) links.add(`${target.pathname}${target.search}`);
    }
  }

  expect(issues, issues.join("\n")).toEqual([]);

  const nonSitemapLinks = [...links].filter((link) => !sitemapPaths.has(new URL(link, baseURL).pathname));
  for (const link of nonSitemapLinks) {
    const response = await request.get(link, { maxRedirects: 0, timeout: 60_000 });
    if (response.status() >= 400) issues.push(`${link}: broken internal link returned HTTP ${response.status()}`);
  }

  expect(issues, issues.join("\n")).toEqual([]);
});
