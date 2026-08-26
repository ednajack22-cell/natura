export type SeoAuditInput = {
  title: string;
  slug: string;
  excerpt: string;
  overview: string;
  seoTitle: string;
  seoDescription: string;
  section: string;
  subsection: string;
  sourcesCount: number;
  imageAlt?: string;
  contentType: string;
  focusKeyword: string;
  supportingKeywords: string[];
  searchIntent: string;
};

export type SeoCheck = {
  id: string;
  label: string;
  detail: string;
  status: "pass" | "warning" | "error";
  blocking: boolean;
  weight: number;
};

export function auditSeo(input: SeoAuditInput) {
  const hasPublicTemplate = input.contentType === "plant" || input.contentType === "problem" || input.contentType === "guide" || input.contentType === "calendar" || input.contentType === "tool" || input.contentType === "review" || input.contentType === "page";
  const effectiveTitle = input.seoTitle || input.title;
  const words = input.overview.trim() ? input.overview.trim().split(/\s+/).length : 0;
  const normalize = (value: string) => value.normalize("NFKD").replace(/[\u0300-\u036f]/g, "").toLowerCase().replace(/[^a-z0-9]+/g, " ").trim();
  const focusKeyword = normalize(input.focusKeyword);
  const titleText = normalize(effectiveTitle);
  const mainText = normalize(`${input.excerpt} ${input.overview}`);
  const fullText = `${titleText} ${mainText}`;
  const keywordOccurrences = focusKeyword ? fullText.split(focusKeyword).length - 1 : 0;
  const keywordDensity = words ? (keywordOccurrences / words) * 100 : 0;
  const supportingCoverage = input.supportingKeywords.filter((keyword) => mainText.includes(normalize(keyword))).length;
  const checks: SeoCheck[] = [
    {
      id: "title",
      label: "Search title",
      detail: effectiveTitle.length >= 30 && effectiveTitle.length <= 60 ? `${effectiveTitle.length} characters — useful search length.` : `${effectiveTitle.length} characters — aim for roughly 30–60 without forcing keywords.`,
      status: effectiveTitle.length >= 30 && effectiveTitle.length <= 60 ? "pass" : effectiveTitle.length >= 15 && effectiveTitle.length <= 70 ? "warning" : "error",
      blocking: effectiveTitle.length < 3 || effectiveTitle.length > 70,
      weight: 12,
    },
    {
      id: "description",
      label: "Meta description",
      detail: input.seoDescription.length >= 120 && input.seoDescription.length <= 160 ? `${input.seoDescription.length} characters — ready.` : `${input.seoDescription.length} characters — aim for 120–160 with a specific benefit.`,
      status: input.seoDescription.length >= 120 && input.seoDescription.length <= 160 ? "pass" : input.seoDescription.length >= 70 ? "warning" : "error",
      blocking: input.seoDescription.length < 70,
      weight: 14,
    },
    {
      id: "slug",
      label: "Stable URL",
      detail: input.slug.length <= 60 ? `/${input.slug} is concise and readable.` : `/${input.slug} is valid but longer than recommended.`,
      status: /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(input.slug) && input.slug.length <= 60 ? "pass" : "warning",
      blocking: !/^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(input.slug),
      weight: 8,
    },
    {
      id: "summary",
      label: "Reader summary",
      detail: input.excerpt.length >= 80 ? "The summary clearly introduces the page." : `${input.excerpt.length} characters — explain the reader outcome more clearly.`,
      status: input.excerpt.length >= 80 ? "pass" : input.excerpt.length >= 40 ? "warning" : "error",
      blocking: input.excerpt.length < 40,
      weight: 10,
    },
    {
      id: "content",
      label: "Useful core content",
      detail: words >= 300 ? `${words} words in the saved overview.` : `${words} words — quality matters more than length, but this is still a thin draft.`,
      status: words >= 300 ? "pass" : words >= 80 ? "warning" : "error",
      blocking: input.overview.length < 80,
      weight: 14,
    },
    {
      id: "navigation",
      label: "Navigation and internal discovery",
      detail: input.subsection ? `Assigned to ${input.section} / ${input.subsection}.` : `Assigned to ${input.section}, but no subsection is selected.`,
      status: input.section && input.subsection ? "pass" : input.section ? "warning" : "error",
      blocking: !input.section,
      weight: 8,
    },
    {
      id: "sources",
      label: "Sources and trust",
      detail: input.sourcesCount > 0 ? `${input.sourcesCount} editorial source${input.sourcesCount === 1 ? "" : "s"} recorded.` : "No editorial source has been recorded.",
      status: input.sourcesCount > 0 ? "pass" : "warning",
      blocking: false,
      weight: 8,
    },
    {
      id: "image",
      label: "Image accessibility",
      detail: input.contentType === "page" ? "The institutional template does not require a decorative hero image." : input.imageAlt ? "The main image has alternative text." : "No main image alt text is available yet.",
      status: input.contentType === "page" || input.imageAlt ? "pass" : "warning",
      blocking: false,
      weight: 5,
    },
    {
      id: "template",
      label: "Technical template",
      detail: input.contentType === "plant" ? "The public plant template generates one H1, a canonical URL, a breadcrumb, editorial attribution and Article structured data." : input.contentType === "problem" ? "The public diagnostic template generates one H1, a canonical URL, a breadcrumb, editorial attribution and Article structured data." : input.contentType === "guide" ? "The public guide template generates one H1, a canonical URL, a breadcrumb, editorial attribution and HowTo structured data." : input.contentType === "calendar" ? "The public calendar template generates one H1, a canonical URL, a breadcrumb, editorial attribution and CollectionPage structured data." : input.contentType === "tool" ? "The public tool template generates one H1, a stable canonical URL, a breadcrumb and WebApplication structured data." : input.contentType === "review" ? "The public comparison template generates one H1, a canonical URL, breadcrumbs, editorial attribution, Article and ItemList structured data." : input.contentType === "page" ? "The institutional template generates one H1, a canonical URL, robots rules, breadcrumbs and the appropriate AboutPage, ContactPage, or WebPage schema." : "This content type does not have a complete public article template yet.",
      status: hasPublicTemplate ? "pass" : "error",
      blocking: !hasPublicTemplate,
      weight: 5,
    },
    {
      id: "keyword-target",
      label: "Primary search query",
      detail: !focusKeyword ? "No primary search query has been defined." : `${input.focusKeyword} · ${input.searchIntent || "intent not selected"} · ${titleText.includes(focusKeyword) ? "present in title" : "missing from title"} · ${mainText.includes(focusKeyword) ? "covered in content" : "missing from content"}.`,
      status: focusKeyword && input.searchIntent && titleText.includes(focusKeyword) && mainText.includes(focusKeyword) ? "pass" : focusKeyword ? "warning" : "error",
      blocking: !focusKeyword || !input.searchIntent,
      weight: 12,
    },
    {
      id: "keyword-language",
      label: "Natural keyword coverage",
      detail: keywordDensity > 3 && keywordOccurrences >= 4 ? `${keywordOccurrences} exact repetitions may look forced. Rewrite naturally and use related terms.` : `${keywordOccurrences} exact primary-query mention${keywordOccurrences === 1 ? "" : "s"}; ${supportingCoverage}/${input.supportingKeywords.length} supporting queries are naturally covered. Google does not require a fixed keyword density.`,
      status: keywordDensity > 3 && keywordOccurrences >= 4 ? "warning" : focusKeyword && (supportingCoverage > 0 || input.supportingKeywords.length === 0) ? "pass" : "warning",
      blocking: false,
      weight: 4,
    },
  ];

  const earned = checks.reduce((sum, check) => sum + (check.status === "pass" ? check.weight : check.status === "warning" ? check.weight * .55 : 0), 0);
  const score = Math.round(earned);
  return {
    score,
    checks,
    publishReady: !checks.some((check) => check.blocking),
    errors: checks.filter((check) => check.status === "error").length,
    warnings: checks.filter((check) => check.status === "warning").length,
  };
}
