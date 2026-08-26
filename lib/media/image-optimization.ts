import sharp, { type Metadata } from "sharp";

export const imageUploadLimits = {
  maxInputBytes: 10 * 1024 * 1024,
  maxOutputBytes: 1536 * 1024,
  maxDimension: 2400,
  maxInputPixels: 40_000_000,
  minWidth: 320,
  minHeight: 240,
} as const;

const allowedDeclaredTypes = new Set(["image/jpeg", "image/png", "image/webp", "image/avif"]);
const allowedDecodedFormats = new Set(["jpeg", "png", "webp", "avif", "heif"]);

export type OptimizedImage = {
  data: Buffer;
  width: number;
  height: number;
  mimeType: "image/webp";
  extension: "webp";
  originalBytes: number;
};

export async function optimizeImageForWeb(input: Buffer, declaredType: string): Promise<OptimizedImage> {
  if (!allowedDeclaredTypes.has(declaredType)) throw new Error("Use a JPEG, PNG, WebP, or AVIF image.");
  if (!input.length || input.length > imageUploadLimits.maxInputBytes) throw new Error("The source image must be smaller than 10 MB.");

  let metadata: Metadata;
  try {
    metadata = await sharp(input, { limitInputPixels: imageUploadLimits.maxInputPixels, failOn: "warning" }).metadata();
  } catch {
    throw new Error("The file is not a valid supported image or its dimensions are unsafe.");
  }

  if (!metadata.format || !allowedDecodedFormats.has(metadata.format)) throw new Error("The decoded image format is not supported.");
  if ((metadata.pages ?? 1) !== 1) throw new Error("Animated or multi-page images are not supported.");
  if (!metadata.width || !metadata.height || metadata.width < imageUploadLimits.minWidth || metadata.height < imageUploadLimits.minHeight) {
    throw new Error("The image is too small. Minimum dimensions are 320 × 240 pixels.");
  }
  if (metadata.width * metadata.height > imageUploadLimits.maxInputPixels) throw new Error("The image dimensions exceed 40 megapixels.");

  const attempts = [
    { dimension: 2400, quality: 82 },
    { dimension: 2400, quality: 74 },
    { dimension: 2000, quality: 72 },
    { dimension: 1600, quality: 68 },
  ];

  for (const attempt of attempts) {
    const result = await sharp(input, { limitInputPixels: imageUploadLimits.maxInputPixels, failOn: "warning" })
      .rotate()
      .resize({ width: attempt.dimension, height: attempt.dimension, fit: "inside", withoutEnlargement: true })
      .webp({ quality: attempt.quality, alphaQuality: 85, effort: 4, smartSubsample: true, preset: "photo" })
      .toBuffer({ resolveWithObject: true });

    if (result.data.length <= imageUploadLimits.maxOutputBytes) {
      return {
        data: result.data,
        width: result.info.width,
        height: result.info.height,
        mimeType: "image/webp",
        extension: "webp",
        originalBytes: input.length,
      };
    }
  }

  throw new Error("The image could not be reduced below the 1.5 MB web-delivery limit.");
}
