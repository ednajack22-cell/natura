import Link from "next/link";
import type { PublicEditorialMeta } from "@/lib/editorial-meta";

function displayDate(value?: string) {
  return value ? new Intl.DateTimeFormat("en", { dateStyle: "medium" }).format(new Date(value)) : "Date pending";
}

export function ArticleByline({ meta }: { meta: PublicEditorialMeta }) {
  const updated = meta.updatedAt ?? meta.publishedAt;
  return <aside className="site-container article-byline" aria-label="Editorial responsibility and freshness"><div><span>Prepared by</span>{meta.authorName ? <Link href={`/authors#${meta.authorSlug}`}>{meta.authorName}</Link> : <strong>Natura Editorial Desk</strong>}</div>{meta.reviewerName && <div><span>Reviewed by</span><Link href={`/authors#${meta.reviewerSlug}`}>{meta.reviewerName}</Link></div>}<div><span>Last updated</span><time dateTime={updated}>{displayDate(updated)}</time></div>{!meta.authorName && <p>Named contributor profiles are still being verified for public launch.</p>}</aside>;
}
