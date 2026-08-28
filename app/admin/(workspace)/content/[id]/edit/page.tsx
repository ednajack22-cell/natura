import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ChevronIcon } from "@/components/admin/admin-icons";
import { PublishingControls } from "@/components/admin/publishing-controls";
import { PlantMediaPicker } from "@/components/admin/plant-media-picker";
import { PlantFinderProfileFields } from "@/components/admin/plant-finder-profile-fields";
import { ProblemProfileFields } from "@/components/admin/problem-profile-fields";
import { GuideProfileFields } from "@/components/admin/guide-profile-fields";
import { CalendarProfileFields } from "@/components/admin/calendar-profile-fields";
import { ReviewProfileFields } from "@/components/admin/review-profile-fields";
import { InstitutionalPageFields } from "@/components/admin/institutional-page-fields";
import { ArticleProfileFields } from "@/components/admin/article-profile-fields";
import { EditorialWorkflowFields } from "@/components/admin/editorial-workflow-fields";
import { updateContent } from "@/app/admin/content/[id]/edit/actions";
import { requireAdmin } from "@/lib/auth";
import { contentTypeLabels, publicSectionLabels, readEditorialBody, statusLabels } from "@/lib/editorial";
import { editorialSections } from "@/lib/navigation";
import { auditSeo } from "@/lib/seo-audit";
import { getPlant } from "@/lib/plants";

export const metadata: Metadata = { title: "Content editor" };

const messages: Record<string, string> = {
  invalid: "Check the fields highlighted by their requirements.", duplicate: "This URL slug is already in use.",
  incomplete: "Publishing requires a useful summary, at least 80 characters of content, and an SEO description of at least 70 characters.",
  seo: "Publication is blocked until the mandatory SEO checks are resolved. Save the article, then review the report below.",
  "override-required": "Choose whether to correct the report or explicitly confirm “Publish anyway”.",
  "plant-incomplete": "Complete the botanical name, growing conditions, main image, alternative text, and at least two care steps before publishing this plant profile.",
  workflow: "Assign a responsible author and a different reviewer before submitting or approving this content.",
  "schedule-incomplete": "Scheduling requires an approved review, complete publication checks, and a future date.",
  save: "The content could not be saved.",
};

function bodyText(value: unknown, fallback = "") { return typeof value === "string" ? value : fallback; }
function bodyList(value: unknown, fallback: string[] = []) { return Array.isArray(value) && value.every((entry) => typeof entry === "string") ? value : fallback; }
function bodySteps(value: unknown, fallback: Array<{ title: string; text: string }> = []) {
  if (!Array.isArray(value)) return fallback;
  const parsed = value.flatMap((entry) => entry && typeof entry === "object" && !Array.isArray(entry) && typeof entry.title === "string" && typeof entry.text === "string" ? [{ title: entry.title, text: entry.text }] : []);
  return parsed.length ? parsed : fallback;
}
function specificationsText(value: unknown) { if (!value || typeof value !== "object" || Array.isArray(value)) return ""; return Object.entries(value).flatMap(([key, detail]) => typeof detail === "string" ? [`${key} | ${detail}`] : []).join("\n"); }

export default async function ContentEditorPage({ params, searchParams }: { params: Promise<{ id: string }>; searchParams: Promise<{ error?: string; saved?: string; created?: string; restored?: string }> }) {
  const { id } = await params;
  const query = await searchParams;
  const { supabase } = await requireAdmin();
  const [{ data: item, error }, { data: events }, { count: revisionCount }, { data: mediaAssets }, { data: storedFinderProfile }, { data: storedProblemProfile }, { data: problemPlantLinks }, { data: plantChoices }, { data: storedGuideProfile }, { data: guidePlantLinks }, { data: storedCalendarProfile }, { data: calendarEntries }, { data: calendarPlantLinks }, { data: storedReviewProfile }, { data: reviewCriteria }, { data: reviewProducts }, { data: reviewScores }, { data: storedInstitutionalProfile }, { data: storedArticleProfile }, { data: storedWorkflow }, { data: contributors }] = await Promise.all([
    supabase.from("content_items").select("id, title, slug, excerpt, content_type, status, body, seo_title, seo_description, published_at, created_at, updated_at").eq("id", id).single(),
    supabase.from("editorial_events").select("id, action, previous_status, next_status, created_at").eq("content_id", id).order("created_at", { ascending: false }).limit(5),
    supabase.from("content_revisions").select("id", { count: "exact", head: true }).eq("content_id", id),
    supabase.from("media_assets").select("id, object_path, bucket, alt_text, credit, license").order("created_at", { ascending: false }).limit(24),
    supabase.from("plant_finder_profiles").select("min_sun_hours, space_types, care_level, climates, edible, match_note").eq("content_id", id).maybeSingle(),
    supabase.from("problem_profiles").select("category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings, image_url, image_alt").eq("content_id", id).maybeSingle(),
    supabase.from("problem_plant_links").select("plant_content_id").eq("problem_content_id", id),
    supabase.from("content_items").select("id, slug, title").eq("content_type", "plant").order("title"),
    supabase.from("guide_profiles").select("guide_type, difficulty, estimated_time_minutes, audience, prerequisites, materials, steps, tips, warnings, image_url, image_alt").eq("content_id", id).maybeSingle(),
    supabase.from("guide_plant_links").select("plant_content_id").eq("guide_content_id", id),
    supabase.from("calendar_profiles").select("climate, hemisphere, space_type, scope_note, warnings, image_url, image_alt").eq("content_id", id).maybeSingle(),
    supabase.from("calendar_entries").select("month, activity_type, title, description, priority, sort_order").eq("calendar_content_id", id).order("month").order("sort_order"),
    supabase.from("calendar_plant_links").select("plant_content_id").eq("calendar_content_id", id),
    supabase.from("review_profiles").select("review_type, category, evidence_level, methodology, testing_period, disclosure_type, disclosure_text, verdict, best_for, tested_on").eq("content_id", id).maybeSingle(),
    supabase.from("review_criteria").select("id, name, description, weight, sort_order").eq("review_content_id", id).order("sort_order"),
    supabase.from("review_products").select("id, name, brand, model, product_url, image_url, image_alt, price_note, verdict_label, overall_score, pros, cons, specifications, is_recommended, sort_order").eq("review_content_id", id).order("sort_order"),
    supabase.from("review_product_scores").select("product_id, criterion_id, score"),
    supabase.from("institutional_page_profiles").select("page_kind, eyebrow, sections, notice, contact_email, last_reviewed_on, requires_legal_review").eq("content_id", id).maybeSingle(),
    supabase.from("article_profiles").select("topic, eyebrow, sections, key_takeaways, image_url, image_alt, reading_time_minutes, last_reviewed_on").eq("content_id", id).maybeSingle(),
    supabase.from("content_workflows").select("author_id, reviewer_id, review_state, review_notes, scheduled_for, approved_at").eq("content_id", id).maybeSingle(),
    supabase.from("editorial_contributors").select("id, display_name, role_title").eq("is_active", true).order("display_name"),
  ]);
  if (error || !item) notFound();

  const body = readEditorialBody(item.body);
  const section = body.navigation?.section ?? (item.content_type === "plant" ? "grow" : item.content_type === "problem" ? "plant-care" : item.content_type === "guide" ? "small-space-gardening" : item.content_type === "calendar" ? "planting-calendar" : item.content_type === "review" ? "reviews" : "institutional");
  const subsection = body.navigation?.subsection ?? (item.content_type === "problem" ? "plant-problems" : item.content_type === "guide" ? "balcony" : item.content_type === "calendar" ? "monthly-calendars" : item.content_type === "review" ? "containers" : "");
  const sources = (body.sources ?? []).map((source) => `${source.title}${source.url ? ` | ${source.url}` : ""}`).join("\n");
  const checks = [Boolean(item.title), (item.excerpt?.length ?? 0) >= 40, (body.overview?.length ?? 0) >= 80, (item.seo_description?.length ?? 0) >= 70, (body.sources?.length ?? 0) > 0];
  const completion = Math.round((checks.filter(Boolean).length / checks.length) * 100);
  const rawBody = body as Record<string, unknown>;
  const fallbackPlant = item.content_type === "plant" ? getPlant(item.slug) : undefined;
  const plantProfile = item.content_type === "plant" ? {
    botanicalName: bodyText(rawBody.botanical_name, fallbackPlant?.botanicalName), category: bodyText(rawBody.category, fallbackPlant?.category),
    difficulty: bodyText(rawBody.difficulty, fallbackPlant?.difficulty ?? "Easy"), sunlight: bodyText(rawBody.sunlight, fallbackPlant?.sunlight),
    potSize: bodyText(rawBody.pot_size, fallbackPlant?.potSize), watering: bodyText(rawBody.watering, fallbackPlant?.watering),
    harvest: bodyText(rawBody.harvest, fallbackPlant?.harvest), season: bodyText(rawBody.season, fallbackPlant?.season),
    image: bodyText(rawBody.image, fallbackPlant?.image), imageAlt: bodyText(rawBody.image_alt, fallbackPlant?.imageAlt),
    suitableFor: bodyList(rawBody.suitable_for, fallbackPlant?.suitableFor).join("\n"), care: bodySteps(rawBody.care, fallbackPlant?.care).map((entry) => `${entry.title} | ${entry.text}`).join("\n"),
    watchFor: bodySteps(rawBody.watch_for, fallbackPlant?.watchFor).map((entry) => `${entry.title} | ${entry.text}`).join("\n"),
  } : undefined;
  const finderProfile = item.content_type === "plant" ? { minSunHours: storedFinderProfile?.min_sun_hours ?? 4, spaces: storedFinderProfile?.space_types ?? ["container"], care: storedFinderProfile?.care_level ?? "regular", climates: storedFinderProfile?.climates ?? ["general"], edible: storedFinderProfile?.edible ?? true, matchNote: storedFinderProfile?.match_note ?? "" } : undefined;
  const plantReady = !plantProfile || Boolean(plantProfile.botanicalName && plantProfile.category && plantProfile.sunlight && plantProfile.potSize && plantProfile.image && plantProfile.imageAlt && plantProfile.care.split("\n").filter(Boolean).length >= 2 && finderProfile?.spaces.length && finderProfile.climates.length && finderProfile.matchNote);
  const problemProfile = item.content_type === "problem" ? {
    category: storedProblemProfile?.category ?? "other",
    urgency: storedProblemProfile?.urgency ?? "moderate",
    symptoms: (storedProblemProfile?.symptoms ?? []).join("\n"),
    likelyCauses: bodySteps(storedProblemProfile?.likely_causes).map((entry) => `${entry.title} | ${entry.text}`).join("\n"),
    verificationSteps: bodySteps(storedProblemProfile?.verification_steps).map((entry) => `${entry.title} | ${entry.text}`).join("\n"),
    recommendedActions: bodySteps(storedProblemProfile?.recommended_actions).map((entry) => `${entry.title} | ${entry.text}`).join("\n"),
    warnings: (storedProblemProfile?.warnings ?? []).join("\n"),
    image: storedProblemProfile?.image_url ?? "",
    imageAlt: storedProblemProfile?.image_alt ?? "",
  } : undefined;
  const problemReady = !problemProfile || Boolean(problemProfile.symptoms.split("\n").filter(Boolean).length >= 2 && problemProfile.likelyCauses && problemProfile.verificationSteps && problemProfile.recommendedActions);
  const guideProfile = item.content_type === "guide" ? {
    guideType: storedGuideProfile?.guide_type ?? "beginner",
    difficulty: storedGuideProfile?.difficulty ?? "easy",
    estimatedTime: storedGuideProfile?.estimated_time_minutes ?? 30,
    audience: storedGuideProfile?.audience ?? "",
    prerequisites: (storedGuideProfile?.prerequisites ?? []).join("\n"),
    materials: (storedGuideProfile?.materials ?? []).join("\n"),
    steps: bodySteps(storedGuideProfile?.steps).map((entry) => `${entry.title} | ${entry.text}`).join("\n"),
    tips: (storedGuideProfile?.tips ?? []).join("\n"),
    warnings: (storedGuideProfile?.warnings ?? []).join("\n"),
    image: storedGuideProfile?.image_url ?? "",
    imageAlt: storedGuideProfile?.image_alt ?? "",
  } : undefined;
  const guideReady = !guideProfile || Boolean(guideProfile.audience && guideProfile.prerequisites.split("\n").filter(Boolean).length && guideProfile.materials.split("\n").filter(Boolean).length && guideProfile.steps.split("\n").filter(Boolean).length >= 4);
  const calendarMonthEntries = Object.fromEntries(Array.from({ length: 12 }, (_, index) => [index + 1, (calendarEntries ?? []).filter((entry) => entry.month === index + 1).map((entry) => `${entry.activity_type} | ${entry.title} | ${entry.description} | ${entry.priority}`).join("\n")]));
  const calendarProfile = item.content_type === "calendar" ? {
    climate: storedCalendarProfile?.climate ?? "general",
    hemisphere: storedCalendarProfile?.hemisphere ?? "northern",
    spaceType: storedCalendarProfile?.space_type ?? "all",
    scopeNote: storedCalendarProfile?.scope_note ?? "",
    warnings: (storedCalendarProfile?.warnings ?? []).join("\n"),
    image: storedCalendarProfile?.image_url ?? "",
    imageAlt: storedCalendarProfile?.image_alt ?? "",
    monthEntries: calendarMonthEntries,
  } : undefined;
  const calendarReady = !calendarProfile || Boolean(calendarProfile.scopeNote && Object.values(calendarProfile.monthEntries).every((value) => value.trim().length > 0));
  const reviewProfile = item.content_type === "review" ? {
    reviewType: storedReviewProfile?.review_type ?? "comparison", category: storedReviewProfile?.category ?? "containers",
    evidenceLevel: storedReviewProfile?.evidence_level ?? "researched", methodology: storedReviewProfile?.methodology ?? "",
    testingPeriod: storedReviewProfile?.testing_period ?? "", disclosureType: storedReviewProfile?.disclosure_type ?? "independent",
    disclosureText: storedReviewProfile?.disclosure_text ?? "", verdict: storedReviewProfile?.verdict ?? "",
    bestFor: (storedReviewProfile?.best_for ?? []).join("\n"), testedOn: storedReviewProfile?.tested_on ?? "",
    criteria: (reviewCriteria ?? []).map((criterion) => ({ name: criterion.name, description: criterion.description, weight: Number(criterion.weight) })),
    products: (reviewProducts ?? []).map((product) => ({ name: product.name, brand: product.brand, model: product.model, productUrl: product.product_url ?? "", priceNote: product.price_note, verdictLabel: product.verdict_label, overallScore: Number(product.overall_score), recommended: product.is_recommended, pros: product.pros.join("\n"), cons: product.cons.join("\n"), specifications: specificationsText(product.specifications), imageUrl: product.image_url ?? "", imageAlt: product.image_alt ?? "", scores: (reviewCriteria ?? []).map((criterion) => Number((reviewScores ?? []).find((score) => score.product_id === product.id && score.criterion_id === criterion.id)?.score ?? 0)) })),
  } : undefined;
  const reviewReady = !reviewProfile || Boolean(reviewProfile.methodology.length >= 80 && reviewProfile.disclosureText.length >= 20 && reviewProfile.verdict.length >= 40 && reviewProfile.criteria.length >= 3 && reviewProfile.products.length >= 2 && reviewProfile.criteria.reduce((sum, criterion) => sum + criterion.weight, 0) === 100 && reviewProfile.products.every((product) => product.pros && product.cons && product.verdictLabel && product.scores.length === reviewProfile.criteria.length));
  const institutionalSections = Array.isArray(storedInstitutionalProfile?.sections) ? storedInstitutionalProfile.sections.flatMap((entry) => entry && typeof entry === "object" && !Array.isArray(entry) && typeof entry.heading === "string" && typeof entry.body === "string" ? [{ heading: entry.heading, body: entry.body }] : []) : [];
  const articleSections = Array.isArray(storedArticleProfile?.sections) ? storedArticleProfile.sections.flatMap((entry) => entry && typeof entry === "object" && !Array.isArray(entry) && typeof entry.heading === "string" && typeof entry.body === "string" ? [{ heading: entry.heading, body: entry.body }] : []) : [];
  const articleTakeaways = Array.isArray(storedArticleProfile?.key_takeaways) ? storedArticleProfile.key_takeaways.flatMap((entry) => typeof entry === "string" ? [entry] : []) : [];
  const articleProfile = item.content_type === "article" ? {
    topic: storedArticleProfile?.topic ?? "beginners",
    eyebrow: storedArticleProfile?.eyebrow ?? "",
    readingTimeMinutes: storedArticleProfile?.reading_time_minutes ?? 5,
    lastReviewedOn: storedArticleProfile?.last_reviewed_on ?? "",
    imageUrl: storedArticleProfile?.image_url ?? "",
    imageAlt: storedArticleProfile?.image_alt ?? "",
    keyTakeaways: articleTakeaways,
    sections: articleSections,
  } : undefined;
  // Articles are not gated on completeness; the SEO panel still reports on them.
  const articleReady = true;
  const institutionalProfile = item.content_type === "page" && section === "institutional" ? {
    pageKind: storedInstitutionalProfile?.page_kind ?? "about", eyebrow: storedInstitutionalProfile?.eyebrow ?? "Natura trust centre",
    notice: storedInstitutionalProfile?.notice ?? "", contactEmail: storedInstitutionalProfile?.contact_email ?? "",
    lastReviewedOn: storedInstitutionalProfile?.last_reviewed_on ?? "", requiresLegalReview: storedInstitutionalProfile?.requires_legal_review ?? true,
    sections: institutionalSections,
  } : undefined;
  const institutionalReady = !institutionalProfile || Boolean(institutionalProfile.eyebrow && institutionalProfile.lastReviewedOn && institutionalProfile.sections.length >= 2 && institutionalProfile.sections.every((entry) => entry.heading.length >= 3 && entry.body.length >= 80) && (institutionalProfile.pageKind !== "contact" || institutionalProfile.contactEmail));
  const typeProfileReady = plantReady && problemReady && guideReady && calendarReady && reviewReady && institutionalReady && articleReady;
  const workflow = { authorId: storedWorkflow?.author_id ?? "", reviewerId: storedWorkflow?.reviewer_id ?? "", reviewState: storedWorkflow?.review_state ?? "unassigned", reviewNotes: storedWorkflow?.review_notes ?? "", scheduledFor: storedWorkflow?.scheduled_for ?? "" };
  const workflowReady = Boolean(workflow.authorId && workflow.reviewerId && workflow.authorId !== workflow.reviewerId && workflow.reviewState === "approved");
  const linkedPlantIds = new Set((problemPlantLinks ?? []).map((entry) => entry.plant_content_id));
  const linkedGuidePlantIds = new Set((guidePlantLinks ?? []).map((entry) => entry.plant_content_id));
  const linkedCalendarPlantIds = new Set((calendarPlantLinks ?? []).map((entry) => entry.plant_content_id));
  const mediaChoices = (mediaAssets ?? []).filter((asset) => asset.bucket === "published_images").map((asset) => ({ id: asset.id, url: supabase.storage.from(asset.bucket).getPublicUrl(asset.object_path).data.publicUrl, altText: asset.alt_text, credit: asset.credit, license: asset.license }));
  const keywordRaw = rawBody.seo_keyword_strategy && typeof rawBody.seo_keyword_strategy === "object" && !Array.isArray(rawBody.seo_keyword_strategy) ? rawBody.seo_keyword_strategy as Record<string, unknown> : {};
  const focusKeyword = bodyText(keywordRaw.focus_keyword);
  const supportingKeywords = bodyList(keywordRaw.supporting_keywords).join(", ");
  const searchIntent = bodyText(keywordRaw.search_intent);
  const seoAudit = auditSeo({
    title: item.title,
    slug: item.slug,
    excerpt: item.excerpt ?? "",
    overview: [body.overview ?? "", plantProfile?.care ?? "", plantProfile?.watchFor ?? "", problemProfile?.symptoms ?? "", problemProfile?.likelyCauses ?? "", problemProfile?.verificationSteps ?? "", problemProfile?.recommendedActions ?? "", guideProfile?.prerequisites ?? "", guideProfile?.materials ?? "", guideProfile?.steps ?? "", guideProfile?.tips ?? "", calendarProfile?.scopeNote ?? "", calendarProfile?.warnings ?? "", ...Object.values(calendarMonthEntries), reviewProfile?.methodology ?? "", reviewProfile?.verdict ?? "", ...(reviewProfile?.products.map((product) => `${product.name} ${product.pros} ${product.cons}`) ?? []), ...(institutionalProfile?.sections.map((entry) => `${entry.heading} ${entry.body}`) ?? []), ...(articleProfile?.sections.map((entry) => `${entry.heading} ${entry.body}`) ?? []), ...(articleProfile?.keyTakeaways ?? [])].filter(Boolean).join(" "),
    seoTitle: item.seo_title ?? "",
    seoDescription: item.seo_description ?? "",
    section,
    subsection,
    sourcesCount: body.sources?.length ?? 0,
    imageAlt: plantProfile?.imageAlt ?? problemProfile?.imageAlt ?? guideProfile?.imageAlt ?? calendarProfile?.imageAlt ?? reviewProfile?.products.find((product) => product.imageAlt)?.imageAlt,
    contentType: item.content_type,
    focusKeyword,
    supportingKeywords: bodyList(keywordRaw.supporting_keywords),
    searchIntent,
  });
  const action = updateContent.bind(null, item.id);

  return <main id="main-content" className="content-editor-page">
    <header className="editor-command-bar"><div><Link href="/admin/content">Content library</Link><ChevronIcon /><span>{item.title}</span></div><div><Link className="editor-preview-button" href={`/admin/content/${item.id}/preview`} target="_blank">Preview</Link><span className={`editor-status ${item.status}`}><i />{statusLabels[item.status]}</span></div></header>
    {(query.created || query.saved || query.restored) && <div className="editor-notice success" role="status">{query.created ? "Draft created. Continue with the content, SEO, and sources below." : query.restored ? `Version ${query.restored} restored safely as a private draft.` : `Changes saved: ${query.saved}.`}</div>}
    {item.status === "published" && <div className="editor-notice live" role="status"><strong>Published content.</strong> Saving changes updates the live local article and automatically records the previous version in history.</div>}
    {query.error && <div className="editor-notice error" role="alert">{messages[query.error] ?? messages.save}</div>}

    <form action={action} className="professional-editor-form">
      <div className="editor-main-column">
        <section className="dashboard-panel editor-section" id="details"><div className="editor-section-heading"><span>01</span><div><p className="dashboard-kicker">Identity</p><h1>{item.title}</h1><small>{contentTypeLabels[item.content_type as keyof typeof contentTypeLabels]} · Last updated {new Intl.DateTimeFormat("en", { dateStyle: "medium", timeStyle: "short" }).format(new Date(item.updated_at))}</small></div></div><div className="editor-field-grid"><label><span>Title</span><input name="title" defaultValue={item.title} minLength={3} maxLength={160} required /></label><label><span>Content type</span><input value={contentTypeLabels[item.content_type as keyof typeof contentTypeLabels]} disabled /></label></div><label><span>URL slug</span><div className="slug-field"><span>natura.local/</span><input name="slug" defaultValue={item.slug} pattern="[a-z0-9]+(?:-[a-z0-9]+)*" required /></div></label><label><span>Reader summary</span><textarea name="excerpt" defaultValue={item.excerpt ?? ""} rows={4} maxLength={500} /><small>A clear 40–500 character summary is required before publishing.</small></label></section>

        <section className="dashboard-panel editor-section" id="content"><div className="editor-section-heading"><span>02</span><div><p className="dashboard-kicker">Structured content</p><h2>Core article</h2><small>The shared editorial introduction, completed by the specialised fields below.</small></div></div><label><span>Overview and practical guidance</span><textarea className="editor-body-field" name="overview" defaultValue={body.overview ?? ""} rows={14} placeholder="Write the useful core of this page. Explain the context, the observations to make, and the practical steps…" maxLength={12000} /><small>Minimum recommended for publication: 80 characters. Use the specialised block to structure the operational details.</small></label></section>

        {plantProfile && finderProfile && <section className="dashboard-panel editor-section" id="plant-profile"><div className="editor-section-heading"><span>03</span><div><p className="dashboard-kicker">Plant database</p><h2>Growing profile</h2><small>These structured fields feed the public plant card and complete growing guide.</small></div></div><div className="editor-field-grid"><label><span>Botanical name</span><input name="botanicalName" defaultValue={plantProfile.botanicalName} maxLength={180} /></label><label><span>Category</span><select name="plantCategory" defaultValue={plantProfile.category}><option>Vegetable</option><option>Herb</option><option>Fruit</option><option>Flower</option><option>Houseplant</option></select></label></div><div className="editor-field-grid plant-field-grid"><label><span>Difficulty</span><select name="difficulty" defaultValue={plantProfile.difficulty}><option>Easy</option><option>Moderate</option></select></label><label><span>Direct light</span><input name="sunlight" defaultValue={plantProfile.sunlight} maxLength={80} /></label><label><span>Container size</span><input name="potSize" defaultValue={plantProfile.potSize} maxLength={80} /></label><label><span>Watering</span><input name="watering" defaultValue={plantProfile.watering} maxLength={100} /></label><label><span>First harvest</span><input name="harvest" defaultValue={plantProfile.harvest} maxLength={80} /></label><label><span>Best season</span><input name="season" defaultValue={plantProfile.season} maxLength={120} /></label></div><PlantMediaPicker initialImage={plantProfile.image} initialAlt={plantProfile.imageAlt} assets={mediaChoices} /><PlantFinderProfileFields profile={finderProfile} /><label><span>Suitable spaces</span><textarea name="suitableFor" defaultValue={plantProfile.suitableFor} rows={4} maxLength={1200} /><small>One space or use case per line.</small></label><label><span>Care method</span><textarea name="careSteps" defaultValue={plantProfile.care} rows={8} maxLength={5000} /><small>One step per line: Title | Practical guidance. At least two steps are required.</small></label><label><span>Problems to watch</span><textarea name="watchFor" defaultValue={plantProfile.watchFor} rows={5} maxLength={3000} /><small>One problem per line: Title | What to observe.</small></label></section>}

        {problemProfile && <ProblemProfileFields profile={problemProfile} assets={mediaChoices} plants={plantChoices ?? []} linkedPlantIds={linkedPlantIds} />}
        {guideProfile && <GuideProfileFields profile={guideProfile} assets={mediaChoices} plants={plantChoices ?? []} linkedPlantIds={linkedGuidePlantIds} />}
        {calendarProfile && <CalendarProfileFields profile={calendarProfile} assets={mediaChoices} plants={plantChoices ?? []} linkedPlantIds={linkedCalendarPlantIds} />}
        {reviewProfile && <ReviewProfileFields profile={reviewProfile} />}
        {institutionalProfile && <InstitutionalPageFields profile={institutionalProfile} />}
        {articleProfile && <ArticleProfileFields profile={articleProfile} />}

        <section className="dashboard-panel editor-section" id="distribution"><div className="editor-section-heading"><span>{plantProfile || problemProfile || guideProfile || calendarProfile || reviewProfile || institutionalProfile || articleProfile ? "04" : "03"}</span><div><p className="dashboard-kicker">Distribution</p><h2>Public navigation</h2><small>Connect this content to the menu described in Natura’s plan.</small></div></div><div className="editor-field-grid"><label><span>Main section</span><select name="publicSection" defaultValue={section}>{editorialSections.map((entry) => <option value={entry.value} key={entry.value}>{entry.label}</option>)}</select></label><label><span>Subsection</span><select name="subsection" defaultValue={subsection}><option value="">No subsection</option>{editorialSections.map((entry) => <optgroup label={entry.label} key={entry.value}>{entry.children.map((child) => <option value={child.value} key={`${entry.value}-${child.value}`}>{child.label}</option>)}</optgroup>)}</select></label></div><div className="distribution-path"><span>Public destination</span><strong>{publicSectionLabels[section] ?? section}{subsection ? ` / ${subsection.replaceAll("-", " ")}` : ""}</strong></div></section>

        <section className="dashboard-panel editor-section" id="seo"><div className="editor-section-heading"><span>04</span><div><p className="dashboard-kicker">Discoverability</p><h2>SEO, keywords and search appearance</h2><small>Plan one useful search intent, then write naturally for the reader.</small></div></div><div className="keyword-strategy-box"><div className="editor-field-grid"><label><span>Primary search query</span><input name="focusKeyword" defaultValue={focusKeyword} maxLength={120} placeholder="how to grow cherry tomatoes in pots" /><small>Use the real phrase a reader would search, preferably a specific long-tail query.</small></label><label><span>Search intent</span><select name="searchIntent" defaultValue={searchIntent}><option value="">Select intent</option><option value="informational">Learn / informational</option><option value="how-to">Complete a task / how-to</option><option value="comparison">Compare options</option><option value="transactional">Choose or buy</option><option value="navigational">Find a specific page</option></select></label></div><label><span>Supporting queries</span><input name="supportingKeywords" defaultValue={supportingKeywords} maxLength={800} placeholder="cherry tomato pot size, watering tomatoes in containers, balcony tomatoes" /><small>Comma-separated related questions and concepts. They should broaden the answer, not be repeated mechanically.</small></label></div><label><span>SEO title</span><input name="seoTitle" defaultValue={item.seo_title ?? ""} maxLength={70} placeholder={item.title} /><small>{item.seo_title?.length ?? 0}/70 characters</small></label><label><span>Meta description</span><textarea name="seoDescription" defaultValue={item.seo_description ?? ""} maxLength={180} rows={3} placeholder="Describe the practical value of this page for search visitors." /><small>{item.seo_description?.length ?? 0}/180 characters</small></label><div className="search-preview"><small>natura.local › {item.slug}</small><strong>{item.seo_title || item.title}</strong><p>{item.seo_description || item.excerpt || "Add an SEO description to preview the search result."}</p></div></section>

        <section className="dashboard-panel editor-section seo-report-section" id="seo-report"><div className="editor-section-heading"><span>05</span><div><p className="dashboard-kicker">Pre-publication control</p><h2>SEO and keyword report</h2><small>This report analyses the last saved version of the article.</small></div></div><div className="ranking-reality-note"><strong>Ranking reality check</strong><p>This report checks relevance and page quality; it cannot promise a Google position. Real queries, impressions, clicks and average position become measurable only after launch in Google Search Console.</p></div><div className="seo-report-summary"><div className={`seo-score ${seoAudit.publishReady ? "ready" : "blocked"}`}><strong>{seoAudit.score}</strong><span>/100</span></div><div><strong>{seoAudit.publishReady ? "Mandatory checks passed" : "Publication blocked"}</strong><p>{seoAudit.errors} error{seoAudit.errors === 1 ? "" : "s"} and {seoAudit.warnings} recommendation{seoAudit.warnings === 1 ? "" : "s"}. Warnings improve quality but do not block publication.</p></div></div><div className="seo-check-grid">{seoAudit.checks.map((check) => <article className={`seo-check ${check.status}`} key={check.id}><span>{check.status === "pass" ? "✓" : check.status === "warning" ? "!" : "×"}</span><div><div><strong>{check.label}</strong>{check.blocking && <small>Required</small>}</div><p>{check.detail}</p></div></article>)}</div><p className="seo-report-footnote">After editing a field, save the article to refresh this report before publishing.</p></section>

        <section className="dashboard-panel editor-section" id="sources"><div className="editor-section-heading"><span>06</span><div><p className="dashboard-kicker">Trust</p><h2>Sources and verification</h2><small>One source per line in the format: Title | URL.</small></div></div><label><span>Editorial sources</span><textarea name="sources" defaultValue={sources} rows={6} placeholder="University extension guide | https://example.org/source" maxLength={5000} /></label></section>
        <EditorialWorkflowFields contributors={(contributors ?? []).map((person) => ({ id: person.id, displayName: person.display_name, roleTitle: person.role_title }))} workflow={workflow} />
      </div>

      <aside className="editor-rail">
        <nav className="dashboard-panel editor-outline" aria-label="Editor sections"><p className="dashboard-kicker">On this page</p><a href="#details">Identity</a><a href="#content">Content</a>{plantProfile && <a href="#plant-profile">Plant profile</a>}{problemProfile && <a href="#problem-profile">Diagnostic profile</a>}{guideProfile && <a href="#guide-profile">Guide project</a>}{calendarProfile && <a href="#calendar-profile">Monthly calendar</a>}{reviewProfile && <a href="#review-profile">Comparison desk</a>}{institutionalProfile && <a href="#institutional-profile">Institutional profile</a>}{articleProfile && <a href="#article-profile">Article profile</a>}<a href="#distribution">Distribution</a><a href="#seo">SEO fields</a><a href="#seo-report">SEO report <span className={seoAudit.publishReady && typeProfileReady && workflowReady ? "ready" : "blocked"}>{seoAudit.score}</span></a><a href="#sources">Sources</a><a href="#workflow">Workflow</a></nav>
        <section className="dashboard-panel editor-readiness"><div><p className="dashboard-kicker">Readiness</p><strong>{completion}%</strong></div><div className="readiness-track"><i style={{ width: `${completion}%` }} /></div><ul><li className={checks[0] ? "done" : ""}>Title complete</li><li className={checks[1] ? "done" : ""}>Reader summary</li><li className={checks[2] ? "done" : ""}>Core content</li><li className={checks[3] ? "done" : ""}>SEO description</li><li className={checks[4] ? "done" : ""}>At least one source</li></ul></section>
        <PublishingControls status={item.status} seoScore={seoAudit.score} publishReady={seoAudit.publishReady} plantReady={typeProfileReady && workflowReady} reviewState={workflow.reviewState} scheduledFor={workflow.scheduledFor} />
        <section className="dashboard-panel editor-history"><div><p className="dashboard-kicker">History</p><span>{revisionCount ?? 0} revisions</span></div>{events?.length ? <ol>{events.map((event) => <li key={event.id}><i className={`status-dot ${event.next_status ?? "draft"}`} /><div><strong>{event.action.replaceAll("_", " ")}</strong><small>{event.previous_status && event.next_status && event.previous_status !== event.next_status ? `${statusLabels[event.previous_status]} → ${statusLabels[event.next_status]}` : new Intl.DateTimeFormat("en", { month: "short", day: "numeric", hour: "numeric", minute: "2-digit" }).format(new Date(event.created_at))}</small></div></li>)}</ol> : <p className="history-empty">History begins with the next saved change.</p>}<Link className="history-link" href={`/admin/content/${item.id}/history`}>Compare and restore versions</Link></section>
      </aside>
    </form>
  </main>;
}
