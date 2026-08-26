import { ImageResponse } from "next/og";

export const runtime = "nodejs";

function text(value: string | null, fallback: string, limit: number) {
  const normalized = value?.replace(/\s+/g, " ").trim();
  return (normalized || fallback).slice(0, limit);
}

export async function GET(request: Request) {
  const url = new URL(request.url);
  const title = text(url.searchParams.get("title"), "Practical gardening for small spaces", 120);
  const description = text(url.searchParams.get("description"), "Source-visible guidance for containers, balconies, patios, and indoor growing.", 180);
  const label = text(url.searchParams.get("label"), "Natura guide", 50);
  const heroUrl = new URL("/images/natura-balcony-hero.jpg", request.url).toString();

  return new ImageResponse(
    <div style={{ width: "100%", height: "100%", display: "flex", flexDirection: "column", background: "#f3efe3", color: "#173b28", fontFamily: "Georgia, serif" }}>
      <div style={{ height: 760, position: "relative", display: "flex", overflow: "hidden" }}>
        {/* eslint-disable-next-line @next/next/no-img-element */}
        <img src={heroUrl} alt="" width="1000" height="760" style={{ width: "100%", height: "100%", objectFit: "cover" }} />
        <div style={{ position: "absolute", inset: 0, display: "flex", background: "linear-gradient(180deg, rgba(8,35,22,0.05) 35%, rgba(8,35,22,0.82) 100%)" }} />
        <div style={{ position: "absolute", left: 72, right: 72, bottom: 62, display: "flex", justifyContent: "space-between", alignItems: "center", color: "white", fontFamily: "Arial, sans-serif" }}>
          <span style={{ display: "flex", padding: "14px 22px", borderRadius: 999, background: "#d69a2d", color: "#183c29", fontSize: 25, fontWeight: 800, letterSpacing: 2, textTransform: "uppercase" }}>{label}</span>
          <span style={{ fontSize: 28, fontWeight: 800, letterSpacing: 3 }}>NATURA</span>
        </div>
      </div>
      <div style={{ flex: 1, display: "flex", flexDirection: "column", padding: "76px 72px 60px" }}>
        <div style={{ width: 92, height: 8, display: "flex", background: "#d69a2d", marginBottom: 38 }} />
        <div style={{ display: "flex", fontSize: title.length > 72 ? 62 : 72, lineHeight: 1.03, letterSpacing: -2, fontWeight: 700 }}>{title}</div>
        <div style={{ display: "flex", marginTop: 34, maxWidth: 820, color: "#486454", fontFamily: "Arial, sans-serif", fontSize: 31, lineHeight: 1.42 }}>{description}</div>
        <div style={{ marginTop: "auto", paddingTop: 44, borderTop: "2px solid #cbd3c6", display: "flex", justifyContent: "space-between", alignItems: "center", fontFamily: "Arial, sans-serif", color: "#173b28" }}>
          <span style={{ fontSize: 24, fontWeight: 700 }}>Observe · compare · grow</span>
          <span style={{ fontSize: 22 }}>natura gardening</span>
        </div>
      </div>
    </div>,
    {
      width: 1000,
      height: 1500,
      headers: { "Cache-Control": "public, max-age=86400, stale-while-revalidate=604800" },
    },
  );
}
