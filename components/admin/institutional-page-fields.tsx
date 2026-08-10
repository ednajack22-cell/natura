"use client";

import { useState } from "react";

export type InstitutionalSectionDraft = { heading: string; body: string };

type Props = {
  profile: {
    pageKind: string;
    eyebrow: string;
    notice: string;
    contactEmail: string;
    lastReviewedOn: string;
    requiresLegalReview: boolean;
    sections: InstitutionalSectionDraft[];
  };
};

const pageKinds = [
  ["about", "About Natura"],
  ["editorial-policy", "Editorial policy"],
  ["authors", "Authors and reviewers"],
  ["contact", "Contact"],
  ["legal", "Legal notice / terms"],
  ["privacy", "Privacy policy"],
  ["commercial-disclosure", "Commercial disclosure"],
] as const;

export function InstitutionalPageFields({ profile }: Props) {
  const [sections, setSections] = useState(profile.sections.length ? profile.sections : [
    { heading: "Purpose", body: "" },
    { heading: "What readers should know", body: "" },
  ]);

  const update = (index: number, key: keyof InstitutionalSectionDraft, value: string) => setSections((current) => current.map((section, itemIndex) => itemIndex === index ? { ...section, [key]: value } : section));
  const move = (index: number, direction: -1 | 1) => setSections((current) => {
    const target = index + direction;
    if (target < 0 || target >= current.length) return current;
    const next = [...current];
    [next[index], next[target]] = [next[target], next[index]];
    return next;
  });

  return <section className="dashboard-panel editor-section" id="institutional-profile">
    <div className="editor-section-heading"><span>03</span><div><p className="dashboard-kicker">Trust centre</p><h2>Institutional page profile</h2><small>Structured, reviewable information for Natura&apos;s identity, policies, contacts, and disclosures.</small></div></div>
    <div className="editor-field-grid">
      <label><span>Page purpose</span><select name="pageKind" defaultValue={profile.pageKind}>{pageKinds.map(([value, label]) => <option value={value} key={value}>{label}</option>)}</select></label>
      <label><span>Eyebrow label</span><input name="pageEyebrow" defaultValue={profile.eyebrow} maxLength={80} placeholder="About Natura" /></label>
    </div>
    <label><span>Important notice</span><textarea name="pageNotice" defaultValue={profile.notice} rows={3} maxLength={1200} placeholder="Optional context, limitation, or pre-launch notice shown prominently." /><small>Use this for legal-review status, scope limitations, or another disclosure that must not be missed.</small></label>
    <div className="editor-field-grid">
      <label><span>Public contact email</span><input name="pageContactEmail" type="email" defaultValue={profile.contactEmail} maxLength={254} placeholder="editorial@example.com" /><small>Required for the Contact page.</small></label>
      <label><span>Last reviewed</span><input name="pageLastReviewedOn" type="date" defaultValue={profile.lastReviewedOn} /></label>
    </div>
    <label className="institutional-review-check"><input name="pageRequiresLegalReview" type="checkbox" value="yes" defaultChecked={profile.requiresLegalReview} /><span><strong>Legal or operator review required</strong><small>Keep this active until the organisation identity, jurisdiction, data flows, and public contact details are confirmed.</small></span></label>
    <div className="institutional-section-builder">
      <div className="institutional-builder-heading"><div><span>Page sections</span><small>Use descriptive headings and complete reader-facing paragraphs.</small></div><button type="button" onClick={() => setSections((current) => [...current, { heading: "", body: "" }])}>+ Add section</button></div>
      {sections.map((section, index) => <article className="institutional-section-card" key={index}>
        <header><strong>Section {String(index + 1).padStart(2, "0")}</strong><div><button type="button" aria-label={`Move section ${index + 1} up`} disabled={index === 0} onClick={() => move(index, -1)}>↑</button><button type="button" aria-label={`Move section ${index + 1} down`} disabled={index === sections.length - 1} onClick={() => move(index, 1)}>↓</button><button type="button" disabled={sections.length <= 2} onClick={() => setSections((current) => current.filter((_, itemIndex) => itemIndex !== index))}>Remove</button></div></header>
        <label><span>Heading</span><input value={section.heading} maxLength={140} onChange={(event) => update(index, "heading", event.target.value)} /></label>
        <label><span>Content</span><textarea value={section.body} rows={5} maxLength={4000} onChange={(event) => update(index, "body", event.target.value)} /></label>
      </article>)}
    </div>
    <input type="hidden" name="pageSectionsJson" value={JSON.stringify(sections)} />
  </section>;
}
