import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedPlants } from "@/lib/plant-content";
import { getPublishedGuides } from "@/lib/guide-content";

/**
 * Every tool page ended where its result did. A reader who had just worked out a
 * pot size or a frost date had two links to follow, both back into the tool
 * index, and nothing connecting the answer to the guidance that explains it.
 *
 * That is a loss on both counts this site depends on: search engines read the
 * tools as unconnected leaves, and the reader never reaches the content or the
 * comparisons that carry the commercial links.
 *
 * A layout carries the block once for every tool rather than repeating it in
 * seven pages, and the shared cookie-free client means the queries are cached
 * alongside the content pages.
 */
export default async function ToolsLayout({ children }: { children: React.ReactNode }) {
  const [plants, guides] = await Promise.all([getPublishedPlants(), getPublishedGuides()]);

  const featuredPlants = plants.slice(0, 4);
  const featuredGuides = guides.slice(0, 3);

  if (!featuredPlants.length && !featuredGuides.length) return <>{children}</>;

  return (
    <>
      {children}
      <aside className="tool-next-steps" aria-labelledby="tool-next-steps-heading">
        <div className="site-container">
          <div className="tool-next-steps-heading">
            <p className="eyebrow"><LeafIcon /> Put the answer to work</p>
            <h2 id="tool-next-steps-heading">Where to go from here.</h2>
            <p>A number is only the start. These guides explain the reasoning behind it and what to watch next.</p>
          </div>

          <div className="tool-next-steps-grid">
            {featuredPlants.length > 0 && (
              <section>
                <h3>Growing guides</h3>
                <ul>
                  {featuredPlants.map((plant) => (
                    <li key={plant.slug}>
                      <Link href={`/plants/${plant.slug}`}>
                        <span>{plant.name}</span>
                        <ArrowIcon />
                      </Link>
                    </li>
                  ))}
                </ul>
                <Link className="tool-next-steps-more" href="/grow">Browse every plant <ArrowIcon /></Link>
              </section>
            )}

            {featuredGuides.length > 0 && (
              <section>
                <h3>Step-by-step projects</h3>
                <ul>
                  {featuredGuides.map((guide) => (
                    <li key={guide.slug}>
                      <Link href={`/small-space-gardening/guides/${guide.slug}`}>
                        <span>{guide.title}</span>
                        <ArrowIcon />
                      </Link>
                    </li>
                  ))}
                </ul>
                <Link className="tool-next-steps-more" href="/small-space-gardening/guides">All guides <ArrowIcon /></Link>
              </section>
            )}

            <section className="tool-next-steps-equipment">
              <h3>Choosing equipment</h3>
              <p>
                Our comparisons set out the criteria and the trade-offs before naming an option, with the
                commercial relationship stated on every page.
              </p>
              <Link className="button button-secondary" href="/reviews">
                Read the comparisons
                <ArrowIcon />
              </Link>
            </section>
          </div>
        </div>
      </aside>
    </>
  );
}
