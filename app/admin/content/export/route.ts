import { requireAdmin } from "@/lib/auth";

export const dynamic = "force-dynamic";

/** RFC 4180: quote every field, and double any quote inside one. */
function cell(value: unknown) {
  const text = value === null || value === undefined ? "" : String(value);
  return `"${text.replaceAll('"', '""')}"`;
}

/**
 * The content library as a CSV.
 *
 * Editorial planning happens in spreadsheets whatever the workspace offers, and
 * without an export that means retyping the library by hand. Rows follow the
 * same order the library shows, so the file matches what the editor was just
 * looking at.
 */
export async function GET() {
  const { supabase } = await requireAdmin();

  const [{ data: items, error }, { data: audit }] = await Promise.all([
    supabase
      .from("content_items")
      .select("title, slug, content_type, status, excerpt, seo_title, seo_description, published_at, updated_at")
      .order("updated_at", { ascending: false }),
    supabase.rpc("admin_content_seo_audit"),
  ]);

  if (error) {
    return new Response("Unable to export the content library.", { status: 500 });
  }

  const scoreBySlug = new Map((audit ?? []).map((entry) => [entry.slug, entry.seo_score]));

  const header = ["Title", "Slug", "Type", "Status", "SEO score", "SEO title", "SEO description", "Excerpt", "Published", "Updated"];
  const rows = (items ?? []).map((item) => [
    item.title,
    item.slug,
    item.content_type,
    item.status,
    scoreBySlug.get(item.slug) ?? "",
    item.seo_title ?? "",
    item.seo_description ?? "",
    item.excerpt ?? "",
    item.published_at ? item.published_at.slice(0, 10) : "",
    item.updated_at.slice(0, 10),
  ]);

  // The BOM makes Excel read the file as UTF-8; without it accented titles break.
  const csv = `﻿${[header, ...rows].map((row) => row.map(cell).join(",")).join("\r\n")}\r\n`;
  const stamp = new Date().toISOString().slice(0, 10);

  return new Response(csv, {
    status: 200,
    headers: {
      "Content-Type": "text/csv; charset=utf-8",
      "Content-Disposition": `attachment; filename="natura-content-${stamp}.csv"`,
      "Cache-Control": "private, no-store",
    },
  });
}
