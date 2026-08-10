"use client";

import { useState } from "react";

type PublishingControlsProps = {
  status: string;
  seoScore: number;
  publishReady: boolean;
  plantReady: boolean;
  reviewState: string;
  scheduledFor: string;
};

export function PublishingControls({ status, seoScore, publishReady, plantReady, reviewState, scheduledFor }: PublishingControlsProps) {
  const [overrideConfirmed, setOverrideConfirmed] = useState(false);
  const blocked = !publishReady || !plantReady;

  return <section className="dashboard-panel editor-publish-card">
    <p className="dashboard-kicker">Workflow</p>
    <div className="publish-workflow-state"><span>Review</span><strong>{reviewState.replaceAll("-", " ")}</strong>{scheduledFor && <small>Scheduled {new Intl.DateTimeFormat("en", { dateStyle: "medium", timeStyle: "short" }).format(new Date(scheduledFor))}</small>}</div>
    <button name="intent" value="save" type="submit">{status === "published" ? "Update published article" : "Save without publishing"}</button>
    <button className="secondary" name="intent" value="review" type="submit">Submit for review</button>
    {reviewState !== "approved" && <button className="secondary approve" name="intent" value="approve" type="submit">Approve editorial review</button>}
    {status !== "published" && <button className="secondary schedule" name="intent" value="schedule" type="submit" disabled={reviewState !== "approved"}>Schedule publication</button>}
    {scheduledFor && <button className="secondary" name="intent" value="unschedule" type="submit">Remove schedule</button>}
    <a className="seo-report-link" href="#seo-report">Review SEO report · {seoScore}/100</a>
    {!blocked ? <>
      <button className="publish" name="intent" value="publish" type="submit">Publish content</button>
      <small>The mandatory checks are complete. Review recommendations before publishing.</small>
    </> : <div className="publish-decision" role="group" aria-label="Publication decision">
      <strong>Publication needs your decision</strong>
      <p>You can keep the article unpublished and correct it later, or explicitly accept the risks and publish it now.</p>
      <a href="#seo-report">Choice 1 · Review and correct the report</a>
      <label><input name="seoOverride" type="checkbox" value="acknowledged" checked={overrideConfirmed} onChange={(event) => setOverrideConfirmed(event.target.checked)} /><span><b>Choice 2 · Publish anyway</b>I understand that the article has unresolved quality or SEO issues.</span></label>
      <button className="publish override" name="intent" value="publish_override" type="submit" disabled={!overrideConfirmed}>Publish anyway</button>
    </div>}
    {status !== "archived" && <button className="archive" name="intent" value="archive" type="submit">Archive</button>}
  </section>;
}
