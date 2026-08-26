import { readFile } from "node:fs/promises";
import path from "node:path";
import { expect, test } from "@playwright/test";

const adminEmail = process.env.NATURA_TEST_ADMIN_EMAIL;
const adminPassword = process.env.NATURA_TEST_ADMIN_PASSWORD;

test("an administrator upload is optimized automatically and remains removable", async ({ page }) => {
  test.setTimeout(120_000);
  test.skip(!adminEmail || !adminPassword, "Local administrator credentials are not configured.");

  await page.goto("/admin/login");
  await page.getByLabel("Email address").fill(adminEmail!);
  await page.getByLabel("Password").fill(adminPassword!);
  await page.getByRole("button", { name: "Sign in securely" }).click();
  await expect(page).toHaveURL(/\/admin$/, { timeout: 60_000 });

  await page.goto("/admin/media");
  const uploadName = `natura-e2e-optimization-${Date.now()}.jpg`;
  const uploadForm = page.locator("form").filter({ has: page.getByLabel("Image file") });
  await uploadForm.getByLabel("Image file").setInputFiles({
    name: uploadName,
    mimeType: "image/jpeg",
    buffer: await readFile(path.join(process.cwd(), "public", "images", "cherry-tomato.jpg")),
  });
  await uploadForm.getByLabel("Alternative text").fill("A cherry tomato plant used to verify automatic image optimization");
  const uploadResponsePromise = page.waitForResponse(
    (response) => response.url().endsWith("/admin/media/process") && response.request().method() === "POST",
    { timeout: 60_000 },
  );
  await uploadForm.getByRole("button", { name: "Upload to media library" }).click();
  const uploadResponse = await uploadResponsePromise;
  expect(uploadResponse.ok(), await uploadResponse.text()).toBeTruthy();
  await expect(page.getByRole("status")).toContainText("Optimized automatically", { timeout: 30_000 });

  const uploadedCard = page.locator(".managed-media-card").filter({ hasText: uploadName });
  await expect(uploadedCard).toContainText(/\d+ KB/);
  await uploadedCard.getByText("Manage image").click();
  page.once("dialog", (dialog) => dialog.accept());
  const deleteResponsePromise = page.waitForResponse(
    (response) => response.url().endsWith("/admin/media") && response.request().method() === "POST",
    { timeout: 60_000 },
  );
  await uploadedCard.getByRole("button", { name: "Delete unused image" }).click();
  const deleteResponse = await deleteResponsePromise;
  expect(deleteResponse.ok()).toBeTruthy();
  await page.reload();
  await expect(page.locator(".managed-media-card").filter({ hasText: uploadName })).toHaveCount(0);
});
