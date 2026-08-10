import { NextResponse } from "next/server";
import { getPublishedCalendar } from "@/lib/calendar-content";
import { buildCalendarPdf } from "@/lib/calendar-pdf";

export const runtime = "nodejs";

const monthNames = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];

export async function GET(request: Request, { params }: { params: Promise<{ slug: string }> }) {
  const calendar = await getPublishedCalendar((await params).slug);
  if (!calendar) return NextResponse.json({ error: "Calendar not found" }, { status: 404 });
  const rawMonths = new URL(request.url).searchParams.get("months");
  const selectedMonths = rawMonths ? [...new Set(rawMonths.split(",").map(Number).filter((month) => Number.isInteger(month) && month >= 1 && month <= 12))].sort((a, b) => a - b) : [];
  const customSelection = rawMonths !== null;
  if (customSelection && selectedMonths.length === 0) return NextResponse.json({ error: "Choose at least one valid month" }, { status: 400 });
  const bytes = await buildCalendarPdf(calendar, { months: customSelection ? selectedMonths : undefined, includeCover: !customSelection });
  const selectionSuffix = customSelection ? selectedMonths.map((month) => monthNames[month - 1]).join("-") : "full-year";
  const filename = `${calendar.slug}-${selectionSuffix}.pdf`.replace(/[^a-z0-9.-]+/g, "-");
  return new NextResponse(Buffer.from(bytes), {
    headers: {
      "Content-Type": "application/pdf",
      "Content-Disposition": `attachment; filename="${filename}"`,
      "Cache-Control": "public, max-age=300, stale-while-revalidate=3600",
    },
  });
}
