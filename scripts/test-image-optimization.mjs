import assert from "node:assert/strict";
import { readFile } from "node:fs/promises";
import sharp from "sharp";
import { imageUploadLimits, optimizeImageForWeb } from "../lib/media/image-optimization.ts";

const source = await readFile(new URL("../public/images/cherry-tomato.jpg", import.meta.url));
const optimized = await optimizeImageForWeb(source, "image/jpeg");

assert.equal(optimized.mimeType, "image/webp");
assert.ok(optimized.width <= imageUploadLimits.maxDimension);
assert.ok(optimized.height <= imageUploadLimits.maxDimension);
assert.ok(optimized.data.length <= imageUploadLimits.maxOutputBytes);
assert.equal((await sharp(optimized.data).metadata()).format, "webp");

await assert.rejects(
  () => optimizeImageForWeb(Buffer.from("not an image"), "image/png"),
  /valid supported image/,
);

console.log(`Image optimization test passed: ${source.length} → ${optimized.data.length} bytes, ${optimized.width} × ${optimized.height} WebP.`);
