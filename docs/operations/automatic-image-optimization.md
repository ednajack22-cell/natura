# Automatic image optimization

Every new upload, replacement, and crop made through Natura's media library is processed by the authenticated server before it reaches Supabase Storage.

The source may be JPEG, PNG, WebP, or AVIF and may be at most 10 MB and 40 megapixels. Natura corrects EXIF orientation, removes embedded metadata, preserves the aspect ratio, limits the longest side to 2,400 pixels, and produces a WebP file no larger than 1.5 MB. The original filename remains in media metadata for editorial traceability; the original bytes are not stored by the website upload workflow.

The Storage buckets independently accept only `image/webp` objects up to 1.5 MB, and the `media_assets` table enforces the same MIME type, size, and dimension limits for new metadata. These controls prevent a browser-side bypass from silently adding an oversized public asset.

Run `pnpm media:test` after changing the optimization rules. Existing legacy assets are not rewritten automatically; replacements pass through the current optimizer.
