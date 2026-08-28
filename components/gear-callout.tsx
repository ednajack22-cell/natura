import Link from "next/link";
import { ArrowIcon } from "@/components/icons";
import type { GearLink } from "@/lib/gear-links";

/**
 * Routes a reader from informational writing to the review that can earn from
 * their decision.
 *
 * Two shapes, because the two jobs are different. The lead sentence sits near
 * the top of the article, where a link carries more weight and where a reader
 * who already knows what they want can leave immediately. The card sits partway
 * down for the reader who has been convinced by the article itself.
 *
 * The anchor text is written by an editor and describes the destination, which
 * is what tells a crawler — and a reader deciding whether to click — what is on
 * the other side.
 */
export function GearCallout({ links, variant }: { links: GearLink[]; variant: "lead" | "card" }) {
  if (!links.length) return null;

  if (variant === "lead") {
    const link = links[0];
    return (
      <p className="gear-lead">
        Choosing equipment for this?{" "}
        <Link href={`/reviews/${link.reviewSlug}`}>{link.anchorText}</Link>
        {link.contextNote ? ` — ${link.contextNote}` : "."}
      </p>
    );
  }

  return (
    <aside className="gear-card" aria-label="Related equipment guidance">
      <p className="eyebrow">Before you buy</p>
      {links.map((link) => (
        <div className="gear-card-entry" key={link.reviewSlug}>
          <Link href={`/reviews/${link.reviewSlug}`}>
            {link.anchorText}
            <ArrowIcon />
          </Link>
          {link.contextNote && <p>{link.contextNote}</p>}
        </div>
      ))}
      <small>Our comparisons state the criteria and the commercial relationship on every page.</small>
    </aside>
  );
}
