"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { z } from "zod";
import { requireAdmin } from "@/lib/auth";
import { readEditorialBody } from "@/lib/editorial";
import { auditSeo } from "@/lib/seo-audit";

const updateSchema = z.object({
  title: z.string().trim().min(3).max(160),
  slug: z.string().trim().min(3).max(160).regex(/^[a-z0-9]+(?:-[a-z0-9]+)*$/),
  excerpt: z.string().trim().max(500),
  overview: z.string().trim().max(12000),
  seoTitle: z.string().trim().max(70),
  seoDescription: z.string().trim().max(180),
  focusKeyword: z.string().trim().max(120), supportingKeywords: z.string().trim().max(800),
  searchIntent: z.enum(["", "informational", "how-to", "comparison", "transactional", "navigational"]),
  publicSection: z.enum(["grow", "small-space-gardening", "plant-care", "planting-calendar", "tools", "reviews", "institutional"]),
  subsection: z.string().trim().max(80),
  sources: z.string().trim().max(5000),
  botanicalName: z.string().trim().max(180), plantCategory: z.string().trim().max(80),
  difficulty: z.string().trim().max(40), sunlight: z.string().trim().max(80), potSize: z.string().trim().max(80),
  watering: z.string().trim().max(100), harvest: z.string().trim().max(80), season: z.string().trim().max(120),
  plantImage: z.string().trim().max(300), imageAlt: z.string().trim().max(240), suitableFor: z.string().trim().max(1200),
  careSteps: z.string().trim().max(5000), watchFor: z.string().trim().max(3000),
  finderMinSunHours: z.coerce.number().int().min(0).max(12),
  finderSpaces: z.array(z.enum(["windowsill", "balcony", "patio", "indoor", "container"])).min(1).max(5),
  finderCare: z.enum(["low", "regular", "attentive"]),
  finderClimates: z.array(z.enum(["general", "temperate", "mediterranean", "continental", "tropical"])).min(1).max(5),
  finderEdible: z.boolean(), finderMatchNote: z.string().trim().max(400),
  problemCategory: z.enum(["watering", "nutrition", "pest", "disease", "environment", "other"]),
  urgency: z.enum(["low", "moderate", "high"]),
  symptoms: z.string().trim().max(3000), likelyCauses: z.string().trim().max(5000),
  verificationSteps: z.string().trim().max(5000), recommendedActions: z.string().trim().max(5000),
  warnings: z.string().trim().max(3000), problemImage: z.string().trim().max(500), problemImageAlt: z.string().trim().max(300),
  relatedPlants: z.array(z.string().uuid()).max(100),
  guideType: z.enum(["balcony", "container", "indoor", "beginner", "seasonal"]),
  guideDifficulty: z.enum(["easy", "moderate", "advanced"]),
  estimatedTime: z.coerce.number().int().min(5).max(1440), guideAudience: z.string().trim().max(500),
  guidePrerequisites: z.string().trim().max(3000), guideMaterials: z.string().trim().max(4000),
  guideSteps: z.string().trim().max(8000), guideTips: z.string().trim().max(3000), guideWarnings: z.string().trim().max(3000),
  guideImage: z.string().trim().max(500), guideImageAlt: z.string().trim().max(300), guideRelatedPlants: z.array(z.string().uuid()).max(100),
  calendarClimate: z.enum(["general", "temperate", "mediterranean", "continental", "tropical"]),
  calendarHemisphere: z.enum(["northern", "southern", "both"]), calendarSpaceType: z.enum(["all", "balcony", "container", "garden", "indoor"]),
  calendarScopeNote: z.string().trim().max(600), calendarWarnings: z.string().trim().max(3000),
  calendarImage: z.string().trim().max(500), calendarImageAlt: z.string().trim().max(300),
  calendarMonths: z.array(z.string().trim().max(6000)).length(12), calendarRelatedPlants: z.array(z.string().uuid()).max(100),
  reviewType: z.enum(["single", "comparison", "best-of"]),
  reviewCategory: z.enum(["seeds", "containers", "soil-fertilizer", "watering-systems", "grow-lights", "garden-tools"]),
  reviewEvidenceLevel: z.enum(["researched", "hands-on", "long-term"]),
  reviewMethodology: z.string().trim().max(5000), reviewTestingPeriod: z.string().trim().max(160),
  reviewDisclosureType: z.enum(["independent", "affiliate", "sponsored", "product-provided"]),
  reviewDisclosureText: z.string().trim().max(1600), reviewVerdict: z.string().trim().max(3000), reviewBestFor: z.string().trim().max(1600),
  reviewTestedOn: z.string().trim().max(20),
  reviewCriteria: z.array(z.object({ name: z.string().trim().max(100), description: z.string().trim().max(800), weight: z.coerce.number().min(0).max(100) })).max(12),
  reviewProducts: z.array(z.object({ name: z.string().trim().max(160), brand: z.string().trim().max(120), model: z.string().trim().max(120), productUrl: z.string().trim().max(500), priceNote: z.string().trim().max(240), verdictLabel: z.string().trim().max(160), overallScore: z.coerce.number().min(0).max(10), recommended: z.boolean(), pros: z.string().trim().max(2200), cons: z.string().trim().max(2200), specifications: z.string().trim().max(2200), imageUrl: z.string().trim().max(500), imageAlt: z.string().trim().max(300), scores: z.array(z.coerce.number().min(0).max(10)).max(12) })).max(20),
  articleTopic: z.enum(["growing-science", "seasonal", "sustainability", "spaces", "beginners", "materials"]),
  articleEyebrow: z.string().trim().max(80),
  articleReadingTime: z.coerce.number().int().min(1).max(90),
  articleLastReviewedOn: z.string().trim().max(20),
  articleImage: z.string().trim().max(500), articleImageAlt: z.string().trim().max(300),
  articleTakeaways: z.array(z.string().trim().max(240)).max(8),
  articleSections: z.array(z.object({ heading: z.string().trim().max(140), body: z.string().trim().max(8000) })).max(24),
  articleGearLinks: z.array(z.object({ reviewId: z.string().uuid(), anchorText: z.string().trim().min(3).max(120), contextNote: z.string().trim().max(300) })).max(2),
  pageKind: z.enum(["about", "editorial-policy", "authors", "contact", "legal", "privacy", "commercial-disclosure"]),
  pageEyebrow: z.string().trim().max(80), pageNotice: z.string().trim().max(1200),
  pageContactEmail: z.union([z.literal(""), z.string().trim().email().max(254)]), pageLastReviewedOn: z.string().trim().max(20),
  pageRequiresLegalReview: z.boolean(),
  pageSections: z.array(z.object({ heading: z.string().trim().max(140), body: z.string().trim().max(4000) })).max(20),
  workflowAuthorId: z.union([z.literal(""), z.string().uuid()]), workflowReviewerId: z.union([z.literal(""), z.string().uuid()]),
  workflowReviewNotes: z.string().trim().max(3000), workflowScheduledFor: z.string().trim().max(40),
  seoOverride: z.boolean(),
  intent: z.enum(["save", "review", "approve", "schedule", "unschedule", "publish", "publish_override", "archive"]),
});

function parseSources(value: string) {
  return value.split(/\r?\n/).map((line) => line.trim()).filter(Boolean).map((line) => {
    const [title, ...urlParts] = line.split("|");
    return { title: title.trim(), url: urlParts.join("|").trim() || undefined };
  });
}

function parseLines(value: string) { return value.split(/\r?\n/).map((line) => line.trim()).filter(Boolean); }
function parseSteps(value: string) {
  return parseLines(value).map((line) => { const [title, ...textParts] = line.split("|"); return { title: title.trim(), text: textParts.join("|").trim() }; }).filter((entry) => entry.title && entry.text);
}
function parseCalendarEntries(months: string[]) {
  const allowedTypes = new Set(["plan", "sow-indoors", "sow-outdoors", "plant", "harvest", "care", "protect"]);
  const allowedPriorities = new Set(["low", "normal", "high"]);
  return months.flatMap((value, monthIndex) => parseLines(value).flatMap((line, sortOrder) => {
    const [activityType = "", title = "", description = "", priorityRaw = "normal"] = line.split("|").map((part) => part.trim());
    if (!allowedTypes.has(activityType) || title.length < 3 || !description) return [];
    return [{ month: monthIndex + 1, activity_type: activityType, title, description, priority: allowedPriorities.has(priorityRaw) ? priorityRaw : "normal", sort_order: sortOrder + 1 }];
  }));
}
function parseJsonField(value: FormDataEntryValue | null, fallback: unknown) { try { return JSON.parse(typeof value === "string" ? value : "") as unknown; } catch { return fallback; } }
function parseSpecifications(value: string) { return Object.fromEntries(parseLines(value).flatMap((line) => { const [label, ...parts] = line.split("|"); const detail = parts.join("|").trim(); return label.trim() && detail ? [[label.trim(), detail]] : []; })); }

export async function updateContent(contentId: string, formData: FormData) {
  const id = z.string().uuid().safeParse(contentId);
  const result = updateSchema.safeParse({
    title: formData.get("title"), slug: formData.get("slug"), excerpt: formData.get("excerpt") ?? "",
    overview: formData.get("overview") ?? "", seoTitle: formData.get("seoTitle") ?? "",
    seoDescription: formData.get("seoDescription") ?? "", publicSection: formData.get("publicSection"),
    focusKeyword: formData.get("focusKeyword") ?? "", supportingKeywords: formData.get("supportingKeywords") ?? "", searchIntent: formData.get("searchIntent") ?? "",
    subsection: formData.get("subsection") ?? "", sources: formData.get("sources") ?? "",
    botanicalName: formData.get("botanicalName") ?? "", plantCategory: formData.get("plantCategory") ?? "",
    difficulty: formData.get("difficulty") ?? "", sunlight: formData.get("sunlight") ?? "", potSize: formData.get("potSize") ?? "",
    watering: formData.get("watering") ?? "", harvest: formData.get("harvest") ?? "", season: formData.get("season") ?? "",
    plantImage: formData.get("plantImage") ?? "", imageAlt: formData.get("imageAlt") ?? "", suitableFor: formData.get("suitableFor") ?? "",
    careSteps: formData.get("careSteps") ?? "", watchFor: formData.get("watchFor") ?? "",
    finderMinSunHours: formData.get("finderMinSunHours") ?? "4", finderSpaces: formData.getAll("finderSpaces").length ? formData.getAll("finderSpaces") : ["container"],
    finderCare: formData.get("finderCare") ?? "regular", finderClimates: formData.getAll("finderClimates").length ? formData.getAll("finderClimates") : ["general"],
    finderEdible: formData.get("finderEdible") === "yes", finderMatchNote: formData.get("finderMatchNote") ?? "",
    problemCategory: formData.get("problemCategory") ?? "other", urgency: formData.get("urgency") ?? "moderate",
    symptoms: formData.get("symptoms") ?? "", likelyCauses: formData.get("likelyCauses") ?? "",
    verificationSteps: formData.get("verificationSteps") ?? "", recommendedActions: formData.get("recommendedActions") ?? "",
    warnings: formData.get("warnings") ?? "", problemImage: formData.get("problemImage") ?? "", problemImageAlt: formData.get("problemImageAlt") ?? "",
    relatedPlants: formData.getAll("relatedPlants"),
    guideType: formData.get("guideType") ?? "beginner", guideDifficulty: formData.get("guideDifficulty") ?? "easy",
    estimatedTime: formData.get("estimatedTime") ?? "30", guideAudience: formData.get("guideAudience") ?? "",
    guidePrerequisites: formData.get("guidePrerequisites") ?? "", guideMaterials: formData.get("guideMaterials") ?? "",
    guideSteps: formData.get("guideSteps") ?? "", guideTips: formData.get("guideTips") ?? "", guideWarnings: formData.get("guideWarnings") ?? "",
    guideImage: formData.get("guideImage") ?? "", guideImageAlt: formData.get("guideImageAlt") ?? "", guideRelatedPlants: formData.getAll("guideRelatedPlants"),
    calendarClimate: formData.get("calendarClimate") ?? "general", calendarHemisphere: formData.get("calendarHemisphere") ?? "northern", calendarSpaceType: formData.get("calendarSpaceType") ?? "all",
    calendarScopeNote: formData.get("calendarScopeNote") ?? "", calendarWarnings: formData.get("calendarWarnings") ?? "",
    calendarImage: formData.get("calendarImage") ?? "", calendarImageAlt: formData.get("calendarImageAlt") ?? "",
    calendarMonths: Array.from({ length: 12 }, (_, index) => formData.get(`calendarMonth${index + 1}`) ?? ""), calendarRelatedPlants: formData.getAll("calendarRelatedPlants"),
    reviewType: formData.get("reviewType") ?? "comparison", reviewCategory: formData.get("reviewCategory") ?? "containers",
    reviewEvidenceLevel: formData.get("reviewEvidenceLevel") ?? "researched", reviewMethodology: formData.get("reviewMethodology") ?? "",
    reviewTestingPeriod: formData.get("reviewTestingPeriod") ?? "", reviewDisclosureType: formData.get("reviewDisclosureType") ?? "independent",
    reviewDisclosureText: formData.get("reviewDisclosureText") ?? "", reviewVerdict: formData.get("reviewVerdict") ?? "",
    reviewBestFor: formData.get("reviewBestFor") ?? "", reviewTestedOn: formData.get("reviewTestedOn") ?? "",
    reviewCriteria: parseJsonField(formData.get("reviewCriteriaJson"), []), reviewProducts: parseJsonField(formData.get("reviewProductsJson"), []),
    articleTopic: formData.get("articleTopic") ?? "beginners", articleEyebrow: formData.get("articleEyebrow") ?? "",
    articleReadingTime: formData.get("articleReadingTime") ?? "5", articleLastReviewedOn: formData.get("articleLastReviewedOn") ?? "",
    articleImage: formData.get("articleImage") ?? "", articleImageAlt: formData.get("articleImageAlt") ?? "",
    articleTakeaways: parseJsonField(formData.get("articleTakeawaysJson"), []),
    articleSections: parseJsonField(formData.get("articleSectionsJson"), []),
    articleGearLinks: parseJsonField(formData.get("articleGearLinksJson"), []),
    pageKind: formData.get("pageKind") ?? "about", pageEyebrow: formData.get("pageEyebrow") ?? "",
    pageNotice: formData.get("pageNotice") ?? "", pageContactEmail: formData.get("pageContactEmail") ?? "",
    pageLastReviewedOn: formData.get("pageLastReviewedOn") ?? "", pageRequiresLegalReview: formData.get("pageRequiresLegalReview") === "yes",
    pageSections: parseJsonField(formData.get("pageSectionsJson"), []),
    workflowAuthorId: formData.get("workflowAuthorId") ?? "", workflowReviewerId: formData.get("workflowReviewerId") ?? "",
    workflowReviewNotes: formData.get("workflowReviewNotes") ?? "", workflowScheduledFor: formData.get("workflowScheduledFor") ?? "",
    seoOverride: formData.get("seoOverride") === "acknowledged",
    intent: formData.get("intent"),
  });
  if (!id.success || !result.success) redirect(`/admin/content/${contentId}/edit?error=invalid`);

  const { supabase, user } = await requireAdmin();
  const [{ data: existing, error: readError }, { data: existingWorkflow }] = await Promise.all([
    supabase.from("content_items").select("body, status, content_type").eq("id", contentId).single(),
    supabase.from("content_workflows").select("author_id, reviewer_id, review_state, review_notes, scheduled_for, approved_at, approved_by").eq("content_id", contentId).maybeSingle(),
  ]);
  if (readError || !existing) redirect("/admin/content?error=missing");

  const currentBody = readEditorialBody(existing.body);
  const sources = parseSources(result.data.sources);
  const rawBody = currentBody as Record<string, unknown>;
  const seoAudit = auditSeo({
    title: result.data.title,
    slug: result.data.slug,
    excerpt: result.data.excerpt,
    overview: [result.data.overview, result.data.careSteps, result.data.watchFor, result.data.symptoms, result.data.likelyCauses, result.data.verificationSteps, result.data.recommendedActions, result.data.guidePrerequisites, result.data.guideMaterials, result.data.guideSteps, result.data.guideTips, result.data.calendarScopeNote, result.data.calendarWarnings, ...result.data.calendarMonths, result.data.reviewMethodology, result.data.reviewVerdict, ...result.data.reviewProducts.map((product) => `${product.name} ${product.pros} ${product.cons}`), ...result.data.pageSections.map((section) => `${section.heading} ${section.body}`), ...result.data.articleSections.map((section) => `${section.heading} ${section.body}`), ...result.data.articleTakeaways].filter(Boolean).join(" "),
    seoTitle: result.data.seoTitle,
    seoDescription: result.data.seoDescription,
    section: result.data.publicSection,
    subsection: result.data.subsection,
    sourcesCount: sources.length,
    imageAlt: existing.content_type === "article" ? result.data.articleImageAlt : existing.content_type === "problem" ? result.data.problemImageAlt : existing.content_type === "guide" ? result.data.guideImageAlt : existing.content_type === "calendar" ? result.data.calendarImageAlt : result.data.imageAlt || (typeof rawBody.image_alt === "string" ? rawBody.image_alt : undefined),
    contentType: existing.content_type,
    focusKeyword: result.data.focusKeyword,
    supportingKeywords: result.data.supportingKeywords.split(",").map((keyword) => keyword.trim()).filter(Boolean),
    searchIntent: result.data.searchIntent,
  });
  const care = parseSteps(result.data.careSteps);
  const plantReady = existing.content_type !== "plant" || Boolean(result.data.botanicalName && result.data.plantCategory && result.data.sunlight && result.data.potSize && result.data.plantImage && result.data.imageAlt && care.length >= 2 && result.data.finderSpaces.length && result.data.finderClimates.length && result.data.finderMatchNote);
  const problemReady = existing.content_type !== "problem" || Boolean(parseLines(result.data.symptoms).length >= 2 && parseSteps(result.data.likelyCauses).length && parseSteps(result.data.verificationSteps).length && parseSteps(result.data.recommendedActions).length);
  const guideReady = existing.content_type !== "guide" || Boolean(result.data.guideAudience && parseLines(result.data.guidePrerequisites).length && parseLines(result.data.guideMaterials).length && parseSteps(result.data.guideSteps).length >= 4);
  const parsedCalendarEntries = parseCalendarEntries(result.data.calendarMonths);
  const calendarReady = existing.content_type !== "calendar" || Boolean(result.data.calendarScopeNote && new Set(parsedCalendarEntries.map((entry) => entry.month)).size === 12);
  // A single-product review has exactly one product; comparisons need at least two.
  const minimumProducts = result.data.reviewType === "single" ? 1 : 2;
  const reviewReady = existing.content_type !== "review" || Boolean(result.data.reviewMethodology.length >= 80 && result.data.reviewDisclosureText.length >= 20 && result.data.reviewVerdict.length >= 40 && result.data.reviewCriteria.length >= 3 && result.data.reviewProducts.length >= minimumProducts && result.data.reviewCriteria.every((criterion) => criterion.name.length >= 2 && criterion.description.length >= 20) && result.data.reviewCriteria.reduce((sum, criterion) => sum + criterion.weight, 0) === 100 && result.data.reviewProducts.every((product) => product.name.length >= 2 && parseLines(product.pros).length && parseLines(product.cons).length && product.verdictLabel && product.scores.length === result.data.reviewCriteria.length));
  // Articles publish at the editor decision. Completeness is a judgement the
  // desk makes, not a threshold the code enforces.
  const articleReady = true;
  const isInstitutionalPage = existing.content_type === "page" && result.data.publicSection === "institutional";
  const pageReady = !isInstitutionalPage || Boolean(result.data.pageEyebrow && result.data.pageLastReviewedOn && !result.data.pageRequiresLegalReview && result.data.pageSections.length >= 2 && result.data.pageSections.every((section) => section.heading.length >= 3 && section.body.length >= 80) && (result.data.pageKind !== "contact" || result.data.pageContactEmail));
  const typeProfileReady = plantReady && problemReady && guideReady && calendarReady && reviewReady && pageReady && articleReady;
  const assignmentsReady = Boolean(result.data.workflowAuthorId && result.data.workflowReviewerId && result.data.workflowAuthorId !== result.data.workflowReviewerId);
  const assignmentChanged = result.data.workflowAuthorId !== (existingWorkflow?.author_id ?? "") || result.data.workflowReviewerId !== (existingWorkflow?.reviewer_id ?? "");
  let nextReviewState = existingWorkflow?.review_state ?? "unassigned";
  let approvedAt = existingWorkflow?.approved_at ?? null;
  let approvedBy = existingWorkflow?.approved_by ?? null;
  let scheduledFor = existingWorkflow?.scheduled_for ?? null;
  if (assignmentChanged) { nextReviewState = "unassigned"; approvedAt = null; approvedBy = null; scheduledFor = null; }
  if (result.data.intent === "review") {
    if (!assignmentsReady) redirect(`/admin/content/${contentId}/edit?error=workflow#workflow`);
    nextReviewState = "in-review"; approvedAt = null; approvedBy = null; scheduledFor = null;
  }
  if (result.data.intent === "approve") {
    if (!assignmentsReady) redirect(`/admin/content/${contentId}/edit?error=workflow#workflow`);
    nextReviewState = "approved"; approvedAt = new Date().toISOString(); approvedBy = user.id;
  }
  const requestedSchedule = result.data.workflowScheduledFor ? new Date(result.data.workflowScheduledFor) : null;
  if (result.data.intent === "schedule") {
    if (existing.status === "published" || nextReviewState !== "approved" || !requestedSchedule || Number.isNaN(requestedSchedule.valueOf()) || requestedSchedule <= new Date() || !seoAudit.publishReady || !typeProfileReady) redirect(`/admin/content/${contentId}/edit?error=schedule-incomplete#workflow`);
    scheduledFor = requestedSchedule.toISOString();
  }
  if (result.data.intent === "unschedule") scheduledFor = null;
  const workflowReady = assignmentsReady && nextReviewState === "approved";
  const wantsPublication = result.data.intent === "publish" || result.data.intent === "publish_override";
  const overrideAccepted = result.data.intent === "publish_override" && result.data.seoOverride;
  if (wantsPublication && (!seoAudit.publishReady || !typeProfileReady || !workflowReady) && !overrideAccepted) redirect(`/admin/content/${contentId}/edit?error=override-required#seo-report`);
  const status = ["review", "approve", "schedule"].includes(result.data.intent) ? "review" : wantsPublication ? "published" : result.data.intent === "archive" ? "archived" : existing.status;
  const plantFields = existing.content_type === "plant" ? {
    botanical_name: result.data.botanicalName,
    category: result.data.plantCategory,
    difficulty: result.data.difficulty,
    sunlight: result.data.sunlight,
    pot_size: result.data.potSize,
    watering: result.data.watering,
    harvest: result.data.harvest,
    season: result.data.season,
    image: result.data.plantImage,
    image_alt: result.data.imageAlt,
    suitable_for: parseLines(result.data.suitableFor),
    care,
    watch_for: parseSteps(result.data.watchFor),
  } : {};
  const { error } = await supabase.from("content_items").update({
    title: result.data.title,
    slug: result.data.slug,
    excerpt: result.data.excerpt || null,
    seo_title: result.data.seoTitle || null,
    seo_description: result.data.seoDescription || null,
    status,
    published_at: status === "published" ? (existing.status === "published" ? undefined : new Date().toISOString()) : existing.status === "published" ? undefined : null,
    updated_at: new Date().toISOString(),
    body: {
      ...currentBody,
      stage: status,
      overview: result.data.overview,
      navigation: { section: result.data.publicSection, subsection: result.data.subsection },
      sources,
      seo_keyword_strategy: { focus_keyword: result.data.focusKeyword, supporting_keywords: result.data.supportingKeywords.split(",").map((keyword) => keyword.trim()).filter(Boolean), search_intent: result.data.searchIntent },
      ...plantFields,
      ...(wantsPublication ? { publication_control: { decision: overrideAccepted ? "override" : "approved", seo_score: seoAudit.score, blocking_checks: seoAudit.checks.filter((check) => check.blocking && check.status !== "pass").map((check) => check.id), type_profile_complete: typeProfileReady, workflow_complete: workflowReady, decided_at: new Date().toISOString() } } : {}),
    },
  }).eq("id", contentId);

  if (error?.code === "23505") redirect(`/admin/content/${contentId}/edit?error=duplicate`);
  if (error) redirect(`/admin/content/${contentId}/edit?error=save`);

  const { error: workflowError } = await supabase.from("content_workflows").upsert({
    content_id: contentId, author_id: result.data.workflowAuthorId || null, reviewer_id: result.data.workflowReviewerId || null,
    review_state: nextReviewState, review_notes: result.data.workflowReviewNotes, scheduled_for: scheduledFor,
    approved_at: approvedAt, approved_by: approvedBy, updated_at: new Date().toISOString(),
  });
  if (workflowError) redirect(`/admin/content/${contentId}/edit?error=save`);

  if (existing.content_type === "plant") {
    const { error: finderProfileError } = await supabase.from("plant_finder_profiles").upsert({
      content_id: contentId,
      min_sun_hours: result.data.finderMinSunHours,
      space_types: result.data.finderSpaces,
      care_level: result.data.finderCare,
      climates: result.data.finderClimates,
      edible: result.data.finderEdible,
      match_note: result.data.finderMatchNote,
      updated_at: new Date().toISOString(),
    });
    if (finderProfileError) redirect(`/admin/content/${contentId}/edit?error=save`);
  }

  let relatedPlants: Array<{ id: string; slug: string }> = [];
  if (existing.content_type === "problem") {
    if (result.data.relatedPlants.length) {
      const { data } = await supabase.from("content_items").select("id, slug").eq("content_type", "plant").in("id", result.data.relatedPlants);
      relatedPlants = data ?? [];
    }
    const { error: profileError } = await supabase.from("problem_profiles").upsert({
      content_id: contentId,
      category: result.data.problemCategory,
      urgency: result.data.urgency,
      symptoms: parseLines(result.data.symptoms),
      likely_causes: parseSteps(result.data.likelyCauses),
      verification_steps: parseSteps(result.data.verificationSteps),
      recommended_actions: parseSteps(result.data.recommendedActions),
      warnings: parseLines(result.data.warnings),
      image_url: result.data.problemImage || null,
      image_alt: result.data.problemImageAlt || null,
      updated_at: new Date().toISOString(),
    });
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);
    const { error: deleteLinksError } = await supabase.from("problem_plant_links").delete().eq("problem_content_id", contentId);
    if (deleteLinksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    if (relatedPlants.length) {
      const { error: linksError } = await supabase.from("problem_plant_links").insert(relatedPlants.map((plant) => ({ problem_content_id: contentId, plant_content_id: plant.id })));
      if (linksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    }
  }
  if (existing.content_type === "guide") {
    if (result.data.guideRelatedPlants.length) {
      const { data } = await supabase.from("content_items").select("id, slug").eq("content_type", "plant").in("id", result.data.guideRelatedPlants);
      relatedPlants = data ?? [];
    }
    const { error: profileError } = await supabase.from("guide_profiles").upsert({
      content_id: contentId,
      guide_type: result.data.guideType,
      difficulty: result.data.guideDifficulty,
      estimated_time_minutes: result.data.estimatedTime,
      audience: result.data.guideAudience,
      prerequisites: parseLines(result.data.guidePrerequisites),
      materials: parseLines(result.data.guideMaterials),
      steps: parseSteps(result.data.guideSteps),
      tips: parseLines(result.data.guideTips),
      warnings: parseLines(result.data.guideWarnings),
      image_url: result.data.guideImage || null,
      image_alt: result.data.guideImageAlt || null,
      updated_at: new Date().toISOString(),
    });
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);
    const { error: deleteLinksError } = await supabase.from("guide_plant_links").delete().eq("guide_content_id", contentId);
    if (deleteLinksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    if (relatedPlants.length) {
      const { error: linksError } = await supabase.from("guide_plant_links").insert(relatedPlants.map((plant) => ({ guide_content_id: contentId, plant_content_id: plant.id })));
      if (linksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    }
  }
  if (existing.content_type === "calendar") {
    if (result.data.calendarRelatedPlants.length) {
      const { data } = await supabase.from("content_items").select("id, slug").eq("content_type", "plant").in("id", result.data.calendarRelatedPlants);
      relatedPlants = data ?? [];
    }
    const { error: profileError } = await supabase.from("calendar_profiles").upsert({
      content_id: contentId,
      climate: result.data.calendarClimate,
      hemisphere: result.data.calendarHemisphere,
      space_type: result.data.calendarSpaceType,
      scope_note: result.data.calendarScopeNote,
      warnings: parseLines(result.data.calendarWarnings),
      image_url: result.data.calendarImage || null,
      image_alt: result.data.calendarImageAlt || null,
      updated_at: new Date().toISOString(),
    });
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);
    const { error: deleteEntriesError } = await supabase.from("calendar_entries").delete().eq("calendar_content_id", contentId);
    if (deleteEntriesError) redirect(`/admin/content/${contentId}/edit?error=save`);
    if (parsedCalendarEntries.length) {
      const { error: entriesError } = await supabase.from("calendar_entries").insert(parsedCalendarEntries.map((entry) => ({ calendar_content_id: contentId, ...entry })));
      if (entriesError) redirect(`/admin/content/${contentId}/edit?error=save`);
    }
    const { error: deleteLinksError } = await supabase.from("calendar_plant_links").delete().eq("calendar_content_id", contentId);
    if (deleteLinksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    if (relatedPlants.length) {
      const { error: linksError } = await supabase.from("calendar_plant_links").insert(relatedPlants.map((plant) => ({ calendar_content_id: contentId, plant_content_id: plant.id })));
      if (linksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    }
  }
  if (existing.content_type === "review") {
    const { error: profileError } = await supabase.from("review_profiles").upsert({
      content_id: contentId, review_type: result.data.reviewType, category: result.data.reviewCategory,
      evidence_level: result.data.reviewEvidenceLevel, methodology: result.data.reviewMethodology,
      testing_period: result.data.reviewTestingPeriod, disclosure_type: result.data.reviewDisclosureType,
      disclosure_text: result.data.reviewDisclosureText, verdict: result.data.reviewVerdict,
      best_for: parseLines(result.data.reviewBestFor), tested_on: result.data.reviewTestedOn || null, updated_at: new Date().toISOString(),
    });
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);
    const { error: deleteProductsError } = await supabase.from("review_products").delete().eq("review_content_id", contentId);
    if (deleteProductsError) redirect(`/admin/content/${contentId}/edit?error=save`);
    const { error: deleteCriteriaError } = await supabase.from("review_criteria").delete().eq("review_content_id", contentId);
    if (deleteCriteriaError) redirect(`/admin/content/${contentId}/edit?error=save`);
    const criteriaRows = result.data.reviewCriteria.flatMap((criterion, index) => criterion.name.length >= 2 ? [{ review_content_id: contentId, name: criterion.name, description: criterion.description, weight: criterion.weight, sort_order: index + 1 }] : []);
    const { data: savedCriteria, error: criteriaError } = criteriaRows.length ? await supabase.from("review_criteria").insert(criteriaRows).select("id, sort_order") : { data: [], error: null };
    if (criteriaError || !savedCriteria) redirect(`/admin/content/${contentId}/edit?error=save`);
    const productRows = result.data.reviewProducts.flatMap((product, index) => product.name.length >= 2 ? [{ review_content_id: contentId, name: product.name, brand: product.brand, model: product.model, product_url: product.productUrl || null, image_url: product.imageUrl || null, image_alt: product.imageAlt || null, price_note: product.priceNote, verdict_label: product.verdictLabel, overall_score: product.overallScore, pros: parseLines(product.pros), cons: parseLines(product.cons), specifications: parseSpecifications(product.specifications), is_recommended: product.recommended, sort_order: index + 1 }] : []);
    const { data: savedProducts, error: productsError } = productRows.length ? await supabase.from("review_products").insert(productRows).select("id, sort_order") : { data: [], error: null };
    if (productsError || !savedProducts) redirect(`/admin/content/${contentId}/edit?error=save`);
    const scoreRows = savedProducts.flatMap((product) => {
      const productDraft = result.data.reviewProducts[product.sort_order - 1];
      return savedCriteria.map((criterion) => ({ product_id: product.id, criterion_id: criterion.id, score: productDraft.scores[criterion.sort_order - 1] ?? 0, note: "" }));
    });
    if (scoreRows.length) {
      const { error: scoresError } = await supabase.from("review_product_scores").insert(scoreRows);
      if (scoresError) redirect(`/admin/content/${contentId}/edit?error=save`);
    }
  }
  if (existing.content_type === "article") {
    const { error: profileError } = await supabase.from("article_profiles").upsert({
      content_id: contentId,
      topic: result.data.articleTopic,
      eyebrow: result.data.articleEyebrow,
      sections: result.data.articleSections.filter((section) => section.heading && section.body),
      key_takeaways: result.data.articleTakeaways.filter(Boolean),
      image_url: result.data.articleImage || null,
      image_alt: result.data.articleImageAlt || null,
      reading_time_minutes: result.data.articleReadingTime,
      last_reviewed_on: result.data.articleLastReviewedOn || null,
      updated_at: new Date().toISOString(),
    });
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);

    // Replace rather than merge: the editor submits the complete set.
    const { error: clearLinksError } = await supabase.from("content_review_links").delete().eq("content_id", contentId);
    if (clearLinksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    if (result.data.articleGearLinks.length) {
      const { error: linksError } = await supabase.from("content_review_links").insert(
        result.data.articleGearLinks.map((link, index) => ({
          content_id: contentId,
          review_content_id: link.reviewId,
          anchor_text: link.anchorText,
          context_note: link.contextNote,
          sort_order: index + 1,
        })),
      );
      if (linksError) redirect(`/admin/content/${contentId}/edit?error=save`);
    }
  }
  if (isInstitutionalPage) {
    const { error: profileError } = await supabase.from("institutional_page_profiles").upsert({
      content_id: contentId, page_kind: result.data.pageKind, eyebrow: result.data.pageEyebrow,
      sections: result.data.pageSections, notice: result.data.pageNotice, contact_email: result.data.pageContactEmail || null,
      last_reviewed_on: result.data.pageLastReviewedOn || null, requires_legal_review: result.data.pageRequiresLegalReview,
      updated_at: new Date().toISOString(),
    });
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);
  } else if (existing.content_type === "page") {
    const { error: profileError } = await supabase.from("institutional_page_profiles").delete().eq("content_id", contentId);
    if (profileError) redirect(`/admin/content/${contentId}/edit?error=save`);
  }
  revalidatePath("/admin");
  revalidatePath("/admin/content");
  revalidatePath("/admin/contributors");
  revalidatePath("/admin/calendar");
  revalidatePath(`/admin/content/${contentId}/edit`);
  revalidatePath("/");
  revalidatePath("/grow");
  revalidatePath("/plant-care");
  revalidatePath("/plant-care/problems");
  if (existing.content_type === "problem") revalidatePath(`/plant-care/problems/${result.data.slug}`);
  revalidatePath("/small-space-gardening");
  revalidatePath("/small-space-gardening/guides");
  if (existing.content_type === "guide") revalidatePath(`/small-space-gardening/guides/${result.data.slug}`);
  revalidatePath("/planting-calendar");
  revalidatePath("/planting-calendar/calendars");
  if (existing.content_type === "calendar") revalidatePath(`/planting-calendar/calendars/${result.data.slug}`);
  revalidatePath("/reviews");
  if (existing.content_type === "review") revalidatePath(`/reviews/${result.data.slug}`);
  if (existing.content_type === "page") revalidatePath(`/${result.data.slug}`);
  relatedPlants.forEach((plant) => revalidatePath(`/plants/${plant.slug}`));
  if (existing.content_type === "article") { revalidatePath("/learn"); revalidatePath(`/learn/${result.data.slug}`); }
  revalidatePath("/search");
  revalidatePath(`/plants/${result.data.slug}`);
  revalidatePath("/sitemap.xml");
  redirect(`/admin/content/${contentId}/edit?saved=${result.data.intent}`);
}
