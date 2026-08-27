"use client";

import { useState } from "react";

export type ArticleSectionDraft = { heading: string; body: string };

type Props = {
  profile: {
    topic: string;
    eyebrow: string;
    readingTimeMinutes: number;
    lastReviewedOn: string;
    imageUrl: string;
    imageAlt: string;
    keyTakeaways: string[];
    sections: ArticleSectionDraft[];
  };
};

const topics = [
  ["beginners", "Getting started"],
  ["growing-science", "How plants work"],
  ["seasonal", "Through the year"],
  ["spaces", "Working with your space"],
  ["materials", "Soil and materials"],
  ["sustainability", "Growing responsibly"],
] as const;

export function ArticleProfileFields({ profile }: Props) {
  const [sections, setSections] = useState(profile.sections.length ? profile.sections : [
    { heading: "", body: "" },
    { heading: "", body: "" },
    { heading: "", body: "" },
  ]);
  const [takeaways, setTakeaways] = useState(profile.keyTakeaways.length ? profile.keyTakeaways : ["", ""]);

  const updateSection = (index: number, key: keyof ArticleSectionDraft, value: string) =>
    setSections((current) => current.map((section, i) => (i === index ? { ...section, [key]: value } : section)));

  const move = (index: number, direction: -1 | 1) => setSections((current) => {
    const target = index + direction;
    if (target < 0 || target >= current.length) return current;
    const next = [...current];
    [next[index], next[target]] = [next[target], next[index]];
    return next;
  });

  return (
    <section className="dashboard-panel editor-section" id="article-profile">
      <div className="editor-section-heading">
        <span>03</span>
        <div>
          <p className="dashboard-kicker">Explanatory writing</p>
          <h2>Article profile</h2>
          <small>For questions that are not about one plant, one symptom, or one procedure.</small>
        </div>
      </div>

      <div className="editor-field-grid">
        <label>
          <span>Topic</span>
          <select name="articleTopic" defaultValue={profile.topic}>
            {topics.map(([value, label]) => <option value={value} key={value}>{label}</option>)}
          </select>
        </label>
        <label>
          <span>Eyebrow label</span>
          <input name="articleEyebrow" defaultValue={profile.eyebrow} maxLength={80} placeholder="Plant physiology" />
        </label>
      </div>

      <div className="editor-field-grid">
        <label>
          <span>Reading time (minutes)</span>
          <input name="articleReadingTime" type="number" min={1} max={90} defaultValue={profile.readingTimeMinutes} />
          <small>Roughly 200 words per minute. It sets reader expectations before the first scroll.</small>
        </label>
        <label>
          <span>Last reviewed</span>
          <input name="articleLastReviewedOn" type="date" defaultValue={profile.lastReviewedOn} />
          <small>Explanatory writing ages. This is how the desk finds what has gone stale.</small>
        </label>
      </div>

      <div className="editor-field-grid">
        <label>
          <span>Header image URL</span>
          <input name="articleImage" defaultValue={profile.imageUrl} maxLength={500} />
        </label>
        <label>
          <span>Image alt text</span>
          <input name="articleImageAlt" defaultValue={profile.imageAlt} maxLength={300} />
        </label>
      </div>

      <div className="institutional-section-builder">
        <div className="institutional-builder-heading">
          <div>
            <span>Key takeaways</span>
            <small>Complete standalone sentences. They open the article and are the part search engines quote.</small>
          </div>
          <button type="button" onClick={() => setTakeaways((current) => [...current, ""])}>+ Add takeaway</button>
        </div>
        {takeaways.map((takeaway, index) => (
          <label key={index} className="article-takeaway-field">
            <span>Takeaway {index + 1}</span>
            <div>
              <input
                value={takeaway}
                maxLength={240}
                onChange={(event) => setTakeaways((current) => current.map((item, i) => (i === index ? event.target.value : item)))}
              />
              <button type="button" disabled={takeaways.length <= 2} onClick={() => setTakeaways((current) => current.filter((_, i) => i !== index))}>Remove</button>
            </div>
          </label>
        ))}
      </div>

      <div className="institutional-section-builder">
        <div className="institutional-builder-heading">
          <div>
            <span>Article sections</span>
            <small>One idea per section. Separate paragraphs with a blank line.</small>
          </div>
          <button type="button" onClick={() => setSections((current) => [...current, { heading: "", body: "" }])}>+ Add section</button>
        </div>
        {sections.map((section, index) => (
          <article className="institutional-section-card" key={index}>
            <header>
              <strong>Section {String(index + 1).padStart(2, "0")}</strong>
              <div>
                <button type="button" aria-label={`Move section ${index + 1} up`} disabled={index === 0} onClick={() => move(index, -1)}>↑</button>
                <button type="button" aria-label={`Move section ${index + 1} down`} disabled={index === sections.length - 1} onClick={() => move(index, 1)}>↓</button>
                <button type="button" disabled={sections.length <= 3} onClick={() => setSections((current) => current.filter((_, i) => i !== index))}>Remove</button>
              </div>
            </header>
            <label>
              <span>Heading</span>
              <input value={section.heading} maxLength={140} onChange={(event) => updateSection(index, "heading", event.target.value)} />
            </label>
            <label>
              <span>Content</span>
              <textarea value={section.body} rows={7} maxLength={8000} onChange={(event) => updateSection(index, "body", event.target.value)} />
            </label>
          </article>
        ))}
      </div>

      <input type="hidden" name="articleSectionsJson" value={JSON.stringify(sections)} />
      <input type="hidden" name="articleTakeawaysJson" value={JSON.stringify(takeaways.filter((item) => item.trim()))} />
    </section>
  );
}
