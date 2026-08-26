import AxeBuilder from "@axe-core/playwright";
import { expect, test } from "@playwright/test";

const publicPages = [
  "/",
  "/grow",
  "/plants/container-radish",
  "/tools",
  "/tools/garden-profile",
  "/tools/planting-calendar",
  "/plant-care/problems",
  "/plant-care/problems/wilting-container-plants",
  "/small-space-gardening/guides/start-balcony-herb-garden",
  "/planting-calendar/calendars/general-climate-first-calendar",
  "/reviews/self-watering-container-types-balconies",
  "/about",
  "/admin/login",
];

for (const path of publicPages) {
  test(`${path} has no automatically detectable serious accessibility issue`, async ({ page }) => {
    await page.goto(path);
    await expect(page.locator("main#main-content")).toBeVisible();
    await expect(page.getByRole("heading", { level: 1 })).toHaveCount(1);

    const results = await new AxeBuilder({ page })
      .withTags(["wcag2a", "wcag2aa", "wcag21a", "wcag21aa"])
      .analyze();
    const blockingViolations = results.violations.filter(({ impact }) => impact === "serious" || impact === "critical");
    const summary = blockingViolations.flatMap((violation) => violation.nodes.map((node) => ({
      rule: violation.id,
      target: node.target,
      message: node.any[0]?.message ?? node.failureSummary,
    })));

    expect(blockingViolations, JSON.stringify(summary, null, 2)).toEqual([]);
  });
}
