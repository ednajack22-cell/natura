import { NextResponse } from "next/server";
import { createClient } from "@/lib/supabase/server";

export const dynamic = "force-dynamic";

const responseHeaders = {
  "Cache-Control": "no-store",
  "X-Robots-Tag": "noindex, nofollow, noarchive, nosnippet, noimageindex",
};

export async function GET() {
  try {
    const supabase = await createClient();
    const { error } = await supabase
      .from("content_items")
      .select("id", { count: "exact", head: true })
      .eq("status", "published");

    if (error) throw error;

    return NextResponse.json({ status: "ok" }, { status: 200, headers: responseHeaders });
  } catch {
    return NextResponse.json({ status: "degraded" }, { status: 503, headers: responseHeaders });
  }
}
