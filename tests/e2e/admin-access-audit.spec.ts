import { expect, test } from "@playwright/test";

const adminEmail = process.env.NATURA_TEST_ADMIN_EMAIL;
const adminPassword = process.env.NATURA_TEST_ADMIN_PASSWORD;
const workspaceRoutes = [
  "/admin",
  "/admin/calendar",
  "/admin/content",
  "/admin/content/new",
  "/admin/contributors",
  "/admin/media",
  "/admin/plants",
  "/admin/seo",
  "/admin/settings",
  "/admin/taxonomies",
  "/admin/video",
] as const;

test("anonymous readers are kept outside every editorial workspace page", async ({ request }) => {
  for (const path of workspaceRoutes) {
    const response = await request.get(path, { maxRedirects: 0 });
    expect(response.status(), path).toBe(307);
    expect(response.headers().location, path).toMatch(/^\/admin\/login\?next=/);
    expect(response.headers()["cache-control"], path).toContain("no-store");
  }
});

test("the public site explains that reader profiles are not accounts", async ({ page }) => {
  await page.goto("/tools/garden-profile");
  await expect(page.getByText("It is not an account", { exact: false })).toBeVisible();
  await expect(page.getByRole("link", { name: "Editorial team sign-in" })).toHaveAttribute("href", "/admin");

  await page.goto("/admin/login");
  await expect(page.getByText("Not a reader account")).toBeVisible();
  await expect(page.getByText("Readers use Natura without signing in", { exact: false })).toBeVisible();
});

test("an administrator can render every editorial workspace page", async ({ page }) => {
  test.setTimeout(6 * 60_000);
  test.skip(!adminEmail || !adminPassword, "Local administrator credentials are not configured.");

  await page.goto("/admin/login");
  await page.getByLabel("Email address").fill(adminEmail!);
  await page.getByLabel("Password").fill(adminPassword!);
  await page.getByRole("button", { name: "Sign in securely" }).click();
  await expect(page).toHaveURL(/\/admin$/, { timeout: 60_000 });

  const issues: string[] = [];
  let currentPath = "/admin";
  page.on("pageerror", (error) => issues.push(`${currentPath}: ${error.message}`));
  const routes: string[] = [...workspaceRoutes];

  for (let index = 0; index < routes.length; index += 1) {
    currentPath = routes[index];
    const response = await page.goto(currentPath, { waitUntil: "domcontentloaded", timeout: 60_000 });
    await page.waitForTimeout(200);
    if (!response || response.status() >= 400) issues.push(`${currentPath}: HTTP ${response?.status() ?? "no response"}`);
    const mainCount = await page.locator("main#main-content").count();
    const h1Count = await page.getByRole("heading", { level: 1 }).count();
    if (mainCount !== 1) issues.push(`${currentPath}: expected one main, found ${mainCount}`);
    if (h1Count !== 1) issues.push(`${currentPath}: expected one H1, found ${h1Count}`);

    if (currentPath === "/admin/content") {
      const editPath = await page.locator('a[href^="/admin/content/"][href$="/edit"]').first().getAttribute("href");
      if (!editPath) issues.push("/admin/content: no editable content link found");
      else routes.push(editPath, editPath.replace(/\/edit$/, "/history"), editPath.replace(/\/edit$/, "/preview"));
    }
  }

  await page.goto("/admin/settings");
  await expect(page.getByRole("heading", { name: "Access model" })).toBeVisible();
  await expect(page.getByText("Public reader")).toBeVisible();
  await expect(page.getByText("Garden Profile", { exact: true })).toBeVisible();
  await expect(page.getByText("Administrator", { exact: true }).last()).toBeVisible();
  expect(issues, issues.join("\n")).toEqual([]);
});

test("an authenticated administrator cannot upload from a foreign origin", async ({ page }) => {
  test.skip(!adminEmail || !adminPassword, "Local administrator credentials are not configured.");

  await page.goto("/admin/login");
  await page.getByLabel("Email address").fill(adminEmail!);
  await page.getByLabel("Password").fill(adminPassword!);
  await page.getByRole("button", { name: "Sign in securely" }).click();
  await expect(page).toHaveURL(/\/admin$/, { timeout: 60_000 });

  const response = await page.request.post("/admin/media/process", {
    headers: { origin: "https://attacker.invalid" },
    multipart: {
      intent: "upload",
      bucket: "draft_images",
      altText: "Cross-origin upload test",
      credit: "",
      license: "original",
      file: { name: "test.jpg", mimeType: "image/jpeg", buffer: Buffer.from("not an image") },
    },
  });
  expect(response.status(), await response.text()).toBe(403);
});
