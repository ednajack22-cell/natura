"use client";

import { useEffect, useRef } from "react";
import { adSlotIds, adsenseClientId, adsenseEnabled } from "@/lib/monetization";

declare global {
  interface Window {
    adsbygoogle?: unknown[];
  }
}

/**
 * Reserved heights per placement. The placeholder and the real unit share these
 * values so the page never shifts when an ad fills, whether or not a slot is
 * configured. Cumulative Layout Shift is a ranking signal and this site's
 * traffic depends on search, so the reservation is not optional.
 */
const reservedHeight = {
  leaderboard: { base: 260, wide: 106 },
  inline: { base: 260, wide: 262 },
} as const;

export type AdPlacement = keyof typeof reservedHeight;

type AdSlotProps = {
  /** Overrides the ad unit id configured for this placement. Rarely needed. */
  slotId?: string;
  placement?: AdPlacement;
  /** Short reason this slot exists, shown only in the local placeholder. */
  label?: string;
};

export function AdSlot({ slotId, placement = "inline", label }: AdSlotProps) {
  const pushed = useRef(false);
  const unitId = slotId ?? adSlotIds[placement];
  const live = adsenseEnabled && Boolean(unitId);

  useEffect(() => {
    if (!live || pushed.current) return;
    pushed.current = true;
    try {
      (window.adsbygoogle = window.adsbygoogle ?? []).push({});
    } catch {
      /* An ad failing to initialise must never break the page around it. */
    }
  }, [live]);

  const heights = reservedHeight[placement];
  const style = {
    "--ad-height": `${heights.base}px`,
    "--ad-height-wide": `${heights.wide}px`,
  } as React.CSSProperties;

  if (!live) {
    return (
      <aside className={`ad-slot ad-slot-${placement} ad-slot-placeholder`} style={style} aria-hidden="true">
        <span>Ad space reserved</span>
        {label ? <small>{label}</small> : null}
      </aside>
    );
  }

  return (
    <aside className={`ad-slot ad-slot-${placement}`} style={style} aria-label="Advertisement">
      <span className="ad-slot-label">Advertisement</span>
      <ins
        className="adsbygoogle"
        style={{ display: "block" }}
        data-ad-client={adsenseClientId}
        data-ad-slot={unitId}
        data-ad-format="auto"
        data-full-width-responsive="true"
      />
    </aside>
  );
}
