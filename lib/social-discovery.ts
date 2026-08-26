import type { Metadata } from "next";

type SocialContent = {
  title: string;
  description: string;
  canonicalPath: string;
  label: string;
  updatedAt?: string;
  originalImage?: { url: string; alt: string };
};

export function pinterestImagePath(input: Pick<SocialContent, "title" | "description" | "label">) {
  const query = new URLSearchParams({
    title: input.title.slice(0, 120),
    description: input.description.slice(0, 180),
    label: input.label.slice(0, 50),
  });
  return `/social/pin?${query.toString()}`;
}

export function editorialSocialMetadata(input: SocialContent): Pick<Metadata, "openGraph" | "twitter"> {
  const pinImage = {
    url: pinterestImagePath(input),
    width: 1000,
    height: 1500,
    alt: `${input.title} — Natura gardening guide`,
  };
  const images = [pinImage, ...(input.originalImage ? [{ ...input.originalImage }] : [])];
  return {
    openGraph: {
      type: "article",
      siteName: "Natura",
      locale: "en_US",
      title: input.title,
      description: input.description,
      url: input.canonicalPath,
      modifiedTime: input.updatedAt,
      authors: ["Natura Editorial Desk"],
      images,
    },
    twitter: {
      card: "summary_large_image",
      title: input.title,
      description: input.description,
      images: [pinImage.url],
    },
  };
}
