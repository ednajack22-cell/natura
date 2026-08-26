import { expect, test } from "@playwright/test";

test("the homepage exposes its primary content and search foundations", async ({ page, request }) => {
  await page.goto("/");

  await expect(page).toHaveTitle(/Natura/i);
  await expect(page.getByRole("heading", { level: 1 })).toContainText("better decisions");
  await expect(page.locator("html")).toHaveAttribute("lang", "en");
  await expect(page.locator('a[href="#main-content"]')).toContainText("Skip to content");
  await expect(page.locator("main#main-content")).toBeVisible();

  const robots = await request.get("/robots.txt");
  expect(robots.ok()).toBeTruthy();
  const robotsText = await robots.text();
  expect(robotsText).toContain("OAI-SearchBot");
  expect(robotsText).toContain("Claude-SearchBot");
  expect(robotsText).toContain("PerplexityBot");
  expect(robotsText).toContain("Disallow: /admin/");
  expect(robotsText).toContain("Disallow: /healthz");

  const llms = await request.get("/llms.txt");
  expect(llms.ok()).toBeTruthy();
  expect(await llms.text()).toContain("Natura");
});

test("public responses include the baseline browser security policy", async ({ request }) => {
  const response = await request.get("/");
  expect(response.headers()["x-content-type-options"]).toBe("nosniff");
  expect(response.headers()["x-frame-options"]).toBe("SAMEORIGIN");
  expect(response.headers()["referrer-policy"]).toBe("strict-origin-when-cross-origin");
  expect(response.headers()["permissions-policy"]).toContain("camera=()");
  expect(response.headers()["content-security-policy"]).toContain("object-src 'none'");
  expect(response.headers()["content-security-policy"]).toContain("frame-ancestors 'self'");
});

test("a plant guide exposes article metadata and a Pinterest destination", async ({ page }) => {
  await page.goto("/plants/container-radish");

  await expect(page.getByRole("heading", { level: 1 })).toContainText(/radish/i);
  await expect(page.locator('link[rel="canonical"]')).toHaveAttribute("href", /\/plants\/container-radish$/);
  await expect(page.locator('meta[property="og:type"]')).toHaveAttribute("content", "article");

  const pinterestLink = page.getByRole("link", { name: "Save to Pinterest" });
  await expect(pinterestLink).toHaveAttribute("href", /pinterest\.com\/pin\/create\/button/);
  const destination = new URL((await pinterestLink.getAttribute("href")) ?? "");
  expect(destination.searchParams.get("url")).toMatch(/\/plants\/container-radish$/);
  expect(destination.searchParams.get("media")).toBeTruthy();
});

test("the garden profile is saved as a device preference and reused", async ({ page, context }) => {
  await context.clearCookies();
  await page.goto("/tools/garden-profile");

  await page.getByLabel("Broad climate").selectOption("temperate");
  await page.getByLabel("Hemisphere").selectOption("southern");
  await page.getByLabel("Growing space").selectOption("balcony");
  await page.getByLabel("Direct sunlight").selectOption("6");
  await page.getByLabel("Wind and site exposure").selectOption("windy");
  await page.getByRole("button", { name: /Save my garden profile/i }).click();

  await expect(page).toHaveURL(/\/tools\/garden-profile\?saved=1$/);
  await expect(page.getByRole("status")).toContainText("Garden profile saved");
  const summary = page.locator(".garden-profile-summary");
  await expect(summary).toContainText("Temperate");
  await expect(summary).toContainText("Southern Hemisphere");
  await expect(summary).toContainText("Frequently windy");
});

test("private and sensitive paths remain inaccessible", async ({ page, request }) => {
  for (const path of ["/.env", "/.env.local", "/package.json", "/supabase/config.toml", "/.git/config", "/Natura_Suivi_Implementation_Priorites.docx"]) {
    const response = await request.get(path);
    expect(response.status(), `${path} must not be publicly readable`).toBe(404);
  }

  await page.goto("/admin/video");
  await expect(page).toHaveURL(/\/admin\/login/);
  await expect(page.getByLabel("Password")).toBeVisible();
});

test("the health endpoint checks the application dependency without exposing details", async ({ request }) => {
  const response = await request.get("/healthz");
  expect(response.status()).toBe(200);
  expect(await response.json()).toEqual({ status: "ok" });
  expect(response.headers()["cache-control"]).toContain("no-store");
  expect(response.headers()["x-robots-tag"]).toContain("noindex");
});

test("the image processor rejects unauthenticated uploads", async ({ request }) => {
  const response = await request.post("/admin/media/process", {
    multipart: {
      intent: "upload",
      bucket: "draft_images",
      altText: "Unauthorized upload test",
      credit: "",
      license: "original",
      file: { name: "test.jpg", mimeType: "image/jpeg", buffer: Buffer.from("not an image") },
    },
  });
  expect(response.status(), await response.text()).toBe(401);
});
