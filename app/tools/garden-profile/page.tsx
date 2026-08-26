import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import {
  calendarSpaceFromProfile,
  gardenClimateLabels,
  gardenClimateOptions,
  gardenExposureLabels,
  gardenExposureOptions,
  gardenHemisphereLabels,
  gardenHemisphereOptions,
  gardenSpaceLabels,
  gardenSpaceOptions,
  gardenSunLabels,
  gardenSunOptions,
  getGardenProfile,
} from "@/lib/garden-profile";

export const metadata: Metadata = {
  title: "My Garden Profile",
  description: "Save climate, hemisphere, growing space, direct light, and exposure on this device to prefill Natura’s garden tools.",
  alternates: { canonical: "/tools/garden-profile" },
};

export default async function GardenProfilePage({ searchParams }: { searchParams: Promise<{ saved?: string; cleared?: string; error?: string }> }) {
  const [profile, status] = await Promise.all([getGardenProfile(), searchParams]);
  const defaults = profile ?? { climate: "general" as const, hemisphere: "" as const, space: "balcony" as const, sunHours: 4 as const, exposure: "sheltered" as const };
  const calendarHref = profile ? `/tools/planting-calendar?show=1&month=${new Date().getMonth() + 1}&climate=${profile.climate}&hemisphere=${profile.hemisphere}&space=${calendarSpaceFromProfile(profile.space)}` : "/tools/planting-calendar";

  const jsonLd = { "@context": "https://schema.org", "@type": "WebApplication", name: "My Garden Profile", description: metadata.description, applicationCategory: "LifestyleApplication", operatingSystem: "Any" };

  return <main id="main-content">
    <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd).replace(/</g, "\\u003c") }} />
    <section className="garden-profile-hero"><div className="site-container"><nav className="breadcrumbs" aria-label="Breadcrumb"><Link href="/tools">Tools</Link><span aria-hidden="true">/</span><span aria-current="page">Garden profile</span></nav><p className="eyebrow"><LeafIcon /> Device-only preference</p><h1>Tell Natura where <em>you grow.</em></h1><p>Save five broad conditions on this device. Natura will use them as starting values, while every tool still lets you change the inputs.</p></div></section>
    <section className="section site-container garden-profile-layout"><form className="garden-profile-form" method="post" action="/tools/garden-profile/save"><div><p className="eyebrow">Your growing context</p><h2>Set practical defaults.</h2><p>No account, name, address, or precise location is requested.</p></div>{status.saved === "1" && <p className="profile-save-status" role="status">Garden profile saved on this device.</p>}{status.cleared === "1" && <p className="profile-save-status" role="status">Saved garden profile removed.</p>}{status.error === "1" && <p className="profile-save-status error" role="alert">Choose a valid value for every field.</p>}<div className="garden-profile-fields">
      <label htmlFor="profile-climate"><span>Broad climate</span><select id="profile-climate" name="climate" defaultValue={defaults.climate}>{gardenClimateOptions.map((item) => <option value={item} key={item}>{gardenClimateLabels[item]}</option>)}</select><small>Choose general if you are still identifying it.</small></label>
      <label htmlFor="profile-hemisphere"><span>Hemisphere</span><select id="profile-hemisphere" name="hemisphere" defaultValue={defaults.hemisphere} required><option value="" disabled>Choose Northern or Southern</option>{gardenHemisphereOptions.map((item) => <option value={item} key={item}>{gardenHemisphereLabels[item]}</option>)}</select><small>This prevents January from being treated as the same season everywhere.</small></label>
      <label htmlFor="profile-space"><span>Growing space</span><select id="profile-space" name="space" defaultValue={defaults.space}>{gardenSpaceOptions.map((item) => <option value={item} key={item}>{gardenSpaceLabels[item]}</option>)}</select></label>
      <label htmlFor="profile-sun"><span>Direct sunlight</span><select id="profile-sun" name="sunHours" defaultValue={defaults.sunHours}>{gardenSunOptions.map((item) => <option value={item} key={item}>{gardenSunLabels[item]}</option>)}</select><small>Count direct sun on leaves, not general daylight.</small></label>
      <label htmlFor="profile-exposure"><span>Wind and site exposure</span><select id="profile-exposure" name="exposure" defaultValue={defaults.exposure}>{gardenExposureOptions.map((item) => <option value={item} key={item}>{gardenExposureLabels[item]}</option>)}</select></label>
    </div><button className="button button-primary" type="submit">Save my garden profile <ArrowIcon /></button></form><aside className="garden-profile-summary"><p className="eyebrow">{profile ? "Saved profile" : "How it helps"}</p>{profile ? <><h2>Your current defaults</h2><dl><div><dt>Climate</dt><dd>{gardenClimateLabels[profile.climate]}</dd></div><div><dt>Hemisphere</dt><dd>{gardenHemisphereLabels[profile.hemisphere]}</dd></div><div><dt>Space</dt><dd>{gardenSpaceLabels[profile.space]}</dd></div><div><dt>Light</dt><dd>{gardenSunLabels[profile.sunHours]}</dd></div><div><dt>Exposure</dt><dd>{gardenExposureLabels[profile.exposure]}</dd></div></dl><Link className="button button-light" href={calendarHref}>Open my monthly plan <ArrowIcon /></Link><Link href="/tools/plant-finder">Open the Plant Finder</Link><form method="post" action="/tools/garden-profile/save"><input type="hidden" name="intent" value="clear" /><button type="submit">Remove saved profile</button></form></> : <><h2>One setup, fewer repeated choices.</h2><ul><li>Prefills the planting calendar</li><li>Prefills the Plant Finder</li><li>Sets exposure in frost and watering tools</li><li>Personalises seasonal links on the homepage</li></ul></>}</aside></section>
    <section className="site-container garden-profile-privacy"><div><p className="eyebrow eyebrow-light">Privacy</p><h2>Stored on this device only.</h2></div><p>Natura saves one essential preference cookie containing only the five values above. It is not an account, does not contain a precise location, and can be removed here at any time.</p><Link className="button button-light" href="/privacy-policy">Read the privacy notice <ArrowIcon /></Link></section>
  </main>;
}
