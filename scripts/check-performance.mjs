import { readFile } from "node:fs/promises";
import { chromium } from "@playwright/test";

const baseUrl = (process.env.NATURA_BASE_URL ?? "http://localhost:3100").replace(/\/$/, "");
const budgets = JSON.parse(await readFile(new URL("../config/performance-budgets.json", import.meta.url), "utf8"));
const routes = ["/", "/grow", "/plants/container-radish", "/tools/plant-finder"];
const browser = await chromium.launch({ channel: "chrome", headless: true });
const results = [];

try {
  for (const route of routes) {
    const context = await browser.newContext({ viewport: { width: 1365, height: 900 }, deviceScaleFactor: 1 });
    const page = await context.newPage();
    const cdp = await context.newCDPSession(page);
    await cdp.send("Network.enable");
    await cdp.send("Network.setCacheDisabled", { cacheDisabled: true });
    await page.addInitScript(() => {
      window.__naturaVitals = { lcp: 0, cls: 0, shiftSources: [] };
      new PerformanceObserver((list) => {
        const last = list.getEntries().at(-1);
        if (last) window.__naturaVitals.lcp = last.startTime;
      }).observe({ type: "largest-contentful-paint", buffered: true });
      new PerformanceObserver((list) => {
        for (const entry of list.getEntries()) {
          if (!entry.hadRecentInput) {
            window.__naturaVitals.cls += entry.value;
            window.__naturaVitals.shiftSources.push({
              value: entry.value,
              sources: entry.sources?.map(({ node }) => node ? `${node.tagName.toLowerCase()}${node.id ? `#${node.id}` : ""}${node.className ? `.${String(node.className).trim().replace(/\s+/g, ".")}` : ""}` : "unknown") ?? [],
            });
          }
        }
      }).observe({ type: "layout-shift", buffered: true });
    });

    await page.goto(`${baseUrl}${route}`, { waitUntil: "networkidle", timeout: 30_000 });
    await page.waitForTimeout(500);
    const metrics = await page.evaluate(() => {
      const resources = performance.getEntriesByType("resource");
      const transfer = (entry) => entry.transferSize || entry.encodedBodySize || 0;
      return {
        lcpMs: Math.round(window.__naturaVitals.lcp),
        cls: Number(window.__naturaVitals.cls.toFixed(4)),
        totalTransferKb: Math.round(resources.reduce((sum, entry) => sum + transfer(entry), 0) / 1024),
        javascriptTransferKb: Math.round(resources.filter((entry) => entry.initiatorType === "script").reduce((sum, entry) => sum + transfer(entry), 0) / 1024),
        requestCount: resources.length + 1,
        largestScripts: resources.filter((entry) => entry.initiatorType === "script").map((entry) => ({ name: entry.name.split("/").at(-1), kb: Math.round(transfer(entry) / 1024) })).sort((a, b) => b.kb - a.kb).slice(0, 8),
        shiftSources: window.__naturaVitals.shiftSources,
      };
    });
    results.push({ route, ...metrics });
    await context.close();
  }
} finally {
  await browser.close();
}

console.table(results.map((result) => ({
  route: result.route,
  lcpMs: result.lcpMs,
  cls: result.cls,
  totalTransferKb: result.totalTransferKb,
  javascriptTransferKb: result.javascriptTransferKb,
  requestCount: result.requestCount,
})));
const failures = [];
for (const result of results) {
  for (const [metric, limit] of Object.entries(budgets)) {
    if (result[metric] > limit) failures.push(`${result.route}: ${metric} ${result[metric]} exceeds ${limit}`);
  }
}

if (failures.length) {
  for (const result of results) {
    if (result.javascriptTransferKb > budgets.javascriptTransferKb) console.error(`${result.route} largest scripts:`, result.largestScripts);
    if (result.cls > budgets.cls) console.error(`${result.route} layout shifts:`, result.shiftSources);
  }
  console.error("Performance budget failed:\n" + failures.map((failure) => `- ${failure}`).join("\n"));
  process.exitCode = 1;
} else {
  console.log("All Natura performance budgets passed.");
}
