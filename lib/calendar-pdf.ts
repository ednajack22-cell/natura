import { PDFDocument, StandardFonts, rgb, type PDFFont, type PDFPage } from "pdf-lib";
import type { CalendarProfile } from "@/lib/calendar-content";

const PAGE_WIDTH = 595.28;
const PAGE_HEIGHT = 841.89;
const MARGIN = 48;
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const activityLabels: Record<string, string> = { plan: "Plan", "sow-indoors": "Sow indoors", "sow-outdoors": "Sow outdoors", plant: "Plant", harvest: "Harvest", care: "Care", protect: "Protect" };
const palette = { forest: rgb(0.08, 0.22, 0.16), green: rgb(0.16, 0.36, 0.25), gold: rgb(0.78, 0.59, 0.29), cream: rgb(0.98, 0.97, 0.93), ink: rgb(0.12, 0.18, 0.15), muted: rgb(0.38, 0.44, 0.4), line: rgb(0.85, 0.87, 0.84), white: rgb(1, 1, 1), warning: rgb(0.96, 0.9, 0.78) };

function safeText(value: string) {
  return value.normalize("NFKD").replace(/[\u0300-\u036f]/g, "").replace(/[\u2018\u2019]/g, "'").replace(/[\u201c\u201d]/g, '"').replace(/[\u2013\u2014]/g, "-").replace(/\u2026/g, "...").replace(/[^\x20-\x7E]/g, " ").replace(/\s+/g, " ").trim();
}

function wrapText(text: string, font: PDFFont, size: number, width: number) {
  const words = safeText(text).split(" ").filter(Boolean);
  const lines: string[] = [];
  let line = "";
  for (const word of words) {
    const next = line ? `${line} ${word}` : word;
    if (font.widthOfTextAtSize(next, size) <= width) line = next;
    else { if (line) lines.push(line); line = word; }
  }
  if (line) lines.push(line);
  return lines;
}

function drawLines(page: PDFPage, text: string, options: { x: number; y: number; width: number; font: PDFFont; size: number; color?: ReturnType<typeof rgb>; lineHeight?: number; maxLines?: number }) {
  const lineHeight = options.lineHeight ?? options.size * 1.35;
  const lines = wrapText(text, options.font, options.size, options.width).slice(0, options.maxLines);
  lines.forEach((line, index) => page.drawText(line, { x: options.x, y: options.y - index * lineHeight, size: options.size, font: options.font, color: options.color ?? palette.ink }));
  return options.y - lines.length * lineHeight;
}

function addFooter(page: PDFPage, regular: PDFFont, pageNumber: number, totalPages: number, slug: string) {
  page.drawLine({ start: { x: MARGIN, y: 33 }, end: { x: PAGE_WIDTH - MARGIN, y: 33 }, thickness: .7, color: palette.line });
  page.drawText(`Natura  |  natura.local/planting-calendar/calendars/${safeText(slug)}`, { x: MARGIN, y: 18, size: 7, font: regular, color: palette.muted });
  page.drawText(`${pageNumber} / ${totalPages}`, { x: PAGE_WIDTH - MARGIN - 28, y: 18, size: 7, font: regular, color: palette.muted });
}

export async function buildCalendarPdf(calendar: CalendarProfile, options: { months?: number[]; includeCover?: boolean } = {}) {
  const pdf = await PDFDocument.create();
  const regular = await pdf.embedFont(StandardFonts.Helvetica);
  const bold = await pdf.embedFont(StandardFonts.HelveticaBold);
  const selectedMonths = new Set((options.months?.length ? options.months : months.map((_, index) => index + 1)).filter((month) => month >= 1 && month <= 12));
  const includeCover = options.includeCover ?? true;
  const availableCardHeight = PAGE_HEIGHT - 210 - 125;
  const monthPages = months.flatMap((_, monthIndex) => {
    if (!selectedMonths.has(monthIndex + 1)) return [];
    const entries = calendar.entries.filter((entry) => entry.month === monthIndex + 1);
    if (!entries.length) return [{ monthIndex, entries, continuation: false }];
    const chunks: typeof entries[] = [];
    let current: typeof entries = [];
    let usedHeight = 0;
    for (const entry of entries) {
      const titleLines = wrapText(entry.title, bold, 14, PAGE_WIDTH - MARGIN * 2 - 32).length;
      const descriptionLines = wrapText(entry.description, regular, 9.5, PAGE_WIDTH - MARGIN * 2 - 32).length;
      const cardHeight = Math.max(112, 80 + Math.max(0, titleLines - 1) * 16 + descriptionLines * 13);
      if (current.length && usedHeight + cardHeight + 12 > availableCardHeight) { chunks.push(current); current = []; usedHeight = 0; }
      current.push(entry);
      usedHeight += cardHeight + 12;
    }
    if (current.length) chunks.push(current);
    return chunks.map((chunk, index) => ({ monthIndex, entries: chunk, continuation: index > 0 }));
  });
  const totalPages = (includeCover ? 1 : 0) + monthPages.length;
  pdf.setTitle(safeText(calendar.title));
  pdf.setAuthor("Natura");
  pdf.setSubject("Condition-aware twelve-month planting calendar");
  pdf.setKeywords([calendar.climate, calendar.hemisphere, calendar.spaceType, "planting calendar"]);

  if (includeCover) {
    const cover = pdf.addPage([PAGE_WIDTH, PAGE_HEIGHT]);
    cover.drawRectangle({ x: 0, y: 0, width: PAGE_WIDTH, height: PAGE_HEIGHT, color: palette.forest });
    cover.drawRectangle({ x: 0, y: 0, width: 14, height: PAGE_HEIGHT, color: palette.gold });
    cover.drawText("NATURA", { x: MARGIN, y: PAGE_HEIGHT - 72, size: 15, font: bold, color: palette.white });
    cover.drawText("CONDITION-AWARE GROWING", { x: MARGIN, y: PAGE_HEIGHT - 91, size: 7.5, font: bold, color: palette.gold });
    cover.drawText("TWELVE-MONTH PLANTING CALENDAR", { x: MARGIN, y: PAGE_HEIGHT - 175, size: 9, font: bold, color: palette.gold });
    let y = drawLines(cover, calendar.title, { x: MARGIN, y: PAGE_HEIGHT - 225, width: PAGE_WIDTH - MARGIN * 2, font: bold, size: 31, color: palette.white, lineHeight: 36, maxLines: 4 });
    y -= 18;
    y = drawLines(cover, calendar.excerpt, { x: MARGIN, y, width: PAGE_WIDTH - MARGIN * 2 - 25, font: regular, size: 12, color: rgb(.82, .86, .82), lineHeight: 18, maxLines: 5 });
    const context = `${calendar.climate.toUpperCase()}   |   ${calendar.hemisphere.toUpperCase()} HEMISPHERE   |   ${calendar.spaceType.toUpperCase()}`;
    cover.drawText(safeText(context), { x: MARGIN, y: Math.max(230, y - 42), size: 8.5, font: bold, color: palette.white });
    cover.drawRectangle({ x: MARGIN, y: 92, width: PAGE_WIDTH - MARGIN * 2, height: 88, color: rgb(.12, .28, .2), borderColor: rgb(.28, .43, .34), borderWidth: 1 });
    cover.drawText("HOW TO USE THIS CALENDAR", { x: MARGIN + 18, y: 152, size: 8, font: bold, color: palette.gold });
    drawLines(cover, calendar.scopeNote, { x: MARGIN + 18, y: 132, width: PAGE_WIDTH - MARGIN * 2 - 36, font: regular, size: 9.5, color: palette.white, lineHeight: 13, maxLines: 4 });
    cover.drawText("Check local forecasts and growing conditions before acting.", { x: MARGIN, y: 54, size: 8, font: regular, color: rgb(.74, .8, .76) });
  }

  monthPages.forEach(({ monthIndex, entries, continuation }, pageIndex) => {
    const month = months[monthIndex];
    const page = pdf.addPage([PAGE_WIDTH, PAGE_HEIGHT]);
    page.drawRectangle({ x: 0, y: 0, width: PAGE_WIDTH, height: PAGE_HEIGHT, color: palette.cream });
    page.drawRectangle({ x: 0, y: PAGE_HEIGHT - 148, width: PAGE_WIDTH, height: 148, color: palette.forest });
    page.drawText(String(monthIndex + 1).padStart(2, "0"), { x: MARGIN, y: PAGE_HEIGHT - 62, size: 10, font: bold, color: palette.gold });
    page.drawText(`${month.toUpperCase()}${continuation ? " - CONTINUED" : ""}`, { x: MARGIN, y: PAGE_HEIGHT - 105, size: continuation ? 23 : 29, font: bold, color: palette.white });
    page.drawText(`${safeText(calendar.climate)} climate  |  ${safeText(calendar.spaceType)}  |  ${safeText(calendar.hemisphere)} hemisphere`, { x: MARGIN, y: PAGE_HEIGHT - 130, size: 8, font: regular, color: rgb(.79, .84, .8) });
    const totalMonthEntries = calendar.entries.filter((entry) => entry.month === monthIndex + 1).length;
    page.drawText(`${totalMonthEntries} PRIORITY TASK${totalMonthEntries === 1 ? "" : "S"}${continuation ? " - CONTINUED" : ""}`, { x: MARGIN, y: PAGE_HEIGHT - 183, size: 8, font: bold, color: palette.green });
    let cardY = PAGE_HEIGHT - 210;
    entries.forEach((entry) => {
      const titleLines = wrapText(entry.title, bold, 14, PAGE_WIDTH - MARGIN * 2 - 32);
      const descriptionLines = wrapText(entry.description, regular, 9.5, PAGE_WIDTH - MARGIN * 2 - 32);
      const cardHeight = Math.max(112, 80 + Math.max(0, titleLines.length - 1) * 16 + descriptionLines.length * 13);
      page.drawRectangle({ x: MARGIN, y: cardY - cardHeight, width: PAGE_WIDTH - MARGIN * 2, height: cardHeight, color: palette.white, borderColor: entry.priority === "high" ? palette.gold : palette.line, borderWidth: entry.priority === "high" ? 1.4 : .8 });
      page.drawText(safeText(activityLabels[entry.activityType] ?? entry.activityType).toUpperCase(), { x: MARGIN + 16, y: cardY - 24, size: 7, font: bold, color: palette.green });
      const priority = safeText(entry.priority).toUpperCase();
      const priorityWidth = bold.widthOfTextAtSize(priority, 7);
      page.drawText(priority, { x: PAGE_WIDTH - MARGIN - 16 - priorityWidth, y: cardY - 24, size: 7, font: bold, color: entry.priority === "high" ? palette.gold : palette.muted });
      const titleBottom = drawLines(page, entry.title, { x: MARGIN + 16, y: cardY - 52, width: PAGE_WIDTH - MARGIN * 2 - 32, font: bold, size: 14, color: palette.ink, lineHeight: 16 });
      drawLines(page, entry.description, { x: MARGIN + 16, y: titleBottom - 7, width: PAGE_WIDTH - MARGIN * 2 - 32, font: regular, size: 9.5, color: palette.muted, lineHeight: 13 });
      cardY -= cardHeight + 12;
    });
    if (calendar.warnings.length) {
      page.drawRectangle({ x: MARGIN, y: 57, width: PAGE_WIDTH - MARGIN * 2, height: 56, color: palette.warning });
      page.drawText("BEFORE ACTING", { x: MARGIN + 14, y: 92, size: 7, font: bold, color: rgb(.43, .31, .14) });
      drawLines(page, calendar.warnings[0], { x: MARGIN + 14, y: 77, width: PAGE_WIDTH - MARGIN * 2 - 28, font: regular, size: 7.5, color: rgb(.43, .31, .14), lineHeight: 10, maxLines: 2 });
    }
    addFooter(page, regular, pageIndex + 1 + (includeCover ? 1 : 0), totalPages, calendar.slug);
  });

  return pdf.save();
}
