"use client";

export default function PlantFinderError({ reset }: { reset: () => void }) {
  return <main id="main-content"><section className="section site-container"><div className="finder-empty"><span>!</span><h1>The plant finder could not load.</h1><p>Your choices were not changed. Try the request again, or return to the tools overview.</p><button className="button button-primary" type="button" onClick={() => reset()}>Try again</button></div></section></main>;
}
