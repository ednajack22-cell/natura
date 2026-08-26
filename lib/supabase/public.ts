import "server-only";
import { createClient as createSupabaseClient } from "@supabase/supabase-js";
import type { Database } from "@/lib/supabase/database.types";
import { getSupabasePublicEnv } from "@/lib/supabase/env";

/**
 * A Supabase client for reading published content.
 *
 * The cookie-backed client in `./server` reads `cookies()`, and any page that
 * touches it is rendered on demand for every visitor. Public content does not
 * depend on who is asking — row level security already restricts anonymous
 * reads to published rows — so reading it through a cookie-free client lets
 * those pages be prerendered and revalidated on a schedule instead.
 *
 * That matters here: the site lives on search traffic, and time to first byte
 * feeds Core Web Vitals. It also keeps the database out of the path of most
 * requests.
 *
 * Never use this for anything that depends on the signed-in administrator, or
 * for writes. Those belong to `./server`, which carries the session.
 *
 * The client is created once per server instance; it holds no per-request state.
 */
let client: ReturnType<typeof createSupabaseClient<Database>> | undefined;

export function createClient() {
  if (!client) {
    const { url, publishableKey } = getSupabasePublicEnv();
    client = createSupabaseClient<Database>(url, publishableKey, {
      auth: { persistSession: false, autoRefreshToken: false, detectSessionInUrl: false },
    });
  }
  return client;
}
