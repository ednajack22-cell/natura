import { createServerClient } from "@supabase/ssr";
import { NextResponse, type NextRequest } from "next/server";
import type { Database } from "@/lib/supabase/database.types";

export async function updateSession(request: NextRequest) {
  let response = NextResponse.next({ request });
  const supabase = createServerClient<Database>(
    process.env.NEXT_PUBLIC_SUPABASE_URL!,
    process.env.NEXT_PUBLIC_SUPABASE_PUBLISHABLE_KEY!,
    {
      cookies: {
        getAll: () => request.cookies.getAll(),
        setAll(cookiesToSet, headers) {
          cookiesToSet.forEach(({ name, value }) => request.cookies.set(name, value));
          response = NextResponse.next({ request });
          cookiesToSet.forEach(({ name, value, options }) => response.cookies.set(name, value, options));
          Object.entries(headers).forEach(([key, value]) => response.headers.set(key, value));
        },
      },
    },
  );

  const { data } = await supabase.auth.getClaims();
  const isAdminRoute = request.nextUrl.pathname.startsWith("/admin");
  const isLoginRoute = request.nextUrl.pathname === "/admin/login";

  if (isAdminRoute && !isLoginRoute && !data?.claims) {
    if (request.method !== "GET" && request.method !== "HEAD") {
      const unauthorizedResponse = NextResponse.json({ message: "Administrator authentication is required." }, { status: 401 });
      response.cookies.getAll().forEach(({ name, value, ...options }) => unauthorizedResponse.cookies.set(name, value, options));
      unauthorizedResponse.headers.set("Cache-Control", "private, no-store");
      unauthorizedResponse.headers.set("X-Robots-Tag", "noindex, nofollow, noarchive");
      return unauthorizedResponse;
    }
    const url = request.nextUrl.clone();
    url.pathname = "/admin/login";
    url.searchParams.set("next", request.nextUrl.pathname);
    const redirectResponse = NextResponse.redirect(url);
    response.cookies.getAll().forEach(({ name, value, ...options }) => redirectResponse.cookies.set(name, value, options));
    redirectResponse.headers.set("Cache-Control", "private, no-store");
    return redirectResponse;
  }

  response.headers.set("Cache-Control", "private, no-store");
  return response;
}
