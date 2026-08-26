import fs from "node:fs";
import { createClient } from "@supabase/supabase-js";

const env = {};
for (const line of fs.readFileSync(".env.local", "utf8").split(/\r?\n/)) {
  const separator = line.indexOf("=");
  if (separator > 0) env[line.slice(0, separator)] = line.slice(separator + 1).replace(/^"|"$/g, "");
}

const supabase = createClient(env.NEXT_PUBLIC_SUPABASE_URL, env.NEXT_PUBLIC_SUPABASE_PUBLISHABLE_KEY);
const { data: auth, error: authError } = await supabase.auth.signInWithPassword({ email: env.NATURA_LOCAL_ADMIN_EMAIL, password: env.NATURA_LOCAL_ADMIN_PASSWORD });
if (authError || !auth.user) throw authError ?? new Error("Local administrator unavailable.");

const objectPath = "uploads/2026-08/natura-balcony-hero.jpg";
const { data: existing } = await supabase.from("media_assets").select("id").eq("object_path", objectPath).maybeSingle();
if (existing) {
  console.log(`Bundled hero already registered: ${existing.id}`);
  process.exit(0);
}

const bytes = fs.readFileSync("public/images/natura-balcony-hero.jpg");
const { error: uploadError } = await supabase.storage.from("published_images").upload(objectPath, bytes, { contentType: "image/jpeg", cacheControl: "31536000", upsert: false });
if (uploadError) throw uploadError;

const { data: asset, error: metadataError } = await supabase.from("media_assets").insert({
  bucket: "published_images", object_path: objectPath, alt_text: "A thriving edible balcony garden in warm morning light",
  credit: "Natura", license: "original", original_name: "natura-balcony-hero.jpg", mime_type: "image/jpeg",
  file_size: bytes.length, width: 1536, height: 1024, created_by: auth.user.id,
}).select("id").single();
if (metadataError) {
  await supabase.storage.from("published_images").remove([objectPath]);
  throw metadataError;
}
console.log(`Bundled hero registered: ${asset.id}`);
