import { NextResponse } from "next/server";
import { recordPlantSearchInterest } from "@/lib/plant-popularity";
import { readSearchContentType } from "@/lib/search";

export async function POST(request: Request) {
  const requestUrl = new URL(request.url);
  const origin = request.headers.get("origin");
  if (origin && origin !== requestUrl.origin) {
    return new NextResponse("Invalid search origin.", { status: 403 });
  }

  const formData = await request.formData();
  const query = String(formData.get("q") ?? "").trim().replace(/\s+/g, " ").slice(0, 120);
  const contentType = readSearchContentType(String(formData.get("type") ?? ""));

  if ((!contentType || contentType === "plant") && query.length >= 2) {
    await recordPlantSearchInterest(query);
  }

  const destination = new URL("/search", requestUrl.origin);
  if (query) destination.searchParams.set("q", query);
  if (contentType) destination.searchParams.set("type", contentType);
  return NextResponse.redirect(destination, 303);
}
