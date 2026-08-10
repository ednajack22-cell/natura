import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, SearchIcon } from "@/components/icons";
import {
  getSearchSuggestions,
  readSearchContentType,
  searchContentTypes,
  searchPublishedContent,
  type SearchContentType,
} from "@/lib/search";

export const metadata: Metadata = {
  title: "Search",
  alternates: { canonical: "/search" },
  robots: { index: false, follow: true },
};

const contentTypeLabels: Record<SearchContentType, string> = {
  plant: "Plants",
  problem: "Diagnostics",
  guide: "Guides",
  calendar: "Calendars",
  review: "Reviews",
  page: "Trust centre",
  tool: "Tools",
};

const resultActionLabels: Record<SearchContentType, string> = {
  plant: "Open plant profile",
  problem: "Open diagnostic",
  guide: "Open guide",
  calendar: "Open calendar",
  review: "Open comparison",
  page: "Open page",
  tool: "Open tool",
};

function searchHref(query: string, contentType?: SearchContentType) {
  const params = new URLSearchParams();
  if (query.trim()) params.set("q", query.trim());
  if (contentType) params.set("type", contentType);
  const suffix = params.toString();
  return suffix ? `/search?${suffix}` : "/search";
}

export default async function SearchPage({ searchParams }: { searchParams: Promise<{ q?: string; type?: string }> }) {
  const params = await searchParams;
  const query = (params.q ?? "").trim().replace(/\s+/g, " ").slice(0, 120);
  const selectedType = readSearchContentType(params.type);
  const canSearch = query.length >= 2;
  const [{ results, error }, suggestions, allResultsResponse] = await Promise.all([
    searchPublishedContent(query, selectedType),
    getSearchSuggestions(query),
    selectedType ? searchPublishedContent(query) : Promise.resolve(null),
  ]);
  const allResults = allResultsResponse?.results ?? results;
  const counts = Object.fromEntries(searchContentTypes.map((contentType) => [contentType, allResults.filter((result) => result.contentType === contentType).length])) as Record<SearchContentType, number>;

  return (
    <main id="main-content">
      <section className="search-hero">
        <div className="site-container search-shell">
          <p className="eyebrow">Natura search</p>
          <h1>What do you want to grow or solve?</h1>
          <form className="search-form" role="search">
            <SearchIcon />
            <label className="sr-only" htmlFor="site-search">Search Natura</label>
            <input
              id="site-search"
              name="q"
              defaultValue={query}
              list="natura-search-suggestions"
              minLength={2}
              maxLength={120}
              placeholder="Try basil, yellow leaves, or editorial policy…"
              autoComplete="off"
            />
            {selectedType && <input type="hidden" name="type" value={selectedType} />}
            <datalist id="natura-search-suggestions">
              {suggestions.map((suggestion) => <option value={suggestion.query} key={`${suggestion.contentType}-${suggestion.route}`}>{suggestion.label}</option>)}
            </datalist>
            <button type="submit">Search</button>
          </form>
          <p>Ranked full-text search across published plants, diagnostics, guides, calendars, comparisons, tools, and trust information.</p>
          {suggestions.length > 0 && (
            <nav className="search-suggestions" aria-label={query ? "Related searches" : "Suggested searches"}>
              <span>{query ? "Related" : "Try"}</span>
              {suggestions.slice(0, 5).map((suggestion) => <Link href={searchHref(suggestion.query)} key={`${suggestion.query}-${suggestion.route}`}>{suggestion.query}</Link>)}
            </nav>
          )}
        </div>
      </section>

      <section className="section site-container search-results-section">
        {canSearch && !error && (
          <nav className="search-filters" aria-label="Filter search results by content type">
            <Link className={!selectedType ? "active" : ""} href={searchHref(query)} aria-current={!selectedType ? "page" : undefined}>All <span>{allResults.length}</span></Link>
            {searchContentTypes.map((contentType) => (
              <Link
                className={selectedType === contentType ? "active" : ""}
                href={searchHref(query, contentType)}
                aria-current={selectedType === contentType ? "page" : undefined}
                key={contentType}
              >
                {contentTypeLabels[contentType]} <span>{counts[contentType]}</span>
              </Link>
            ))}
          </nav>
        )}

        <div className="results-heading">
          <p className="eyebrow">Published library</p>
          <h2>
            {!query ? "Search Natura’s practical gardening library" : !canSearch ? "Enter at least two characters to search" : `${results.length} result${results.length === 1 ? "" : "s"} for “${query}”`}
          </h2>
          {selectedType && canSearch && <p>Filtered to {contentTypeLabels[selectedType].toLowerCase()}. <Link href={searchHref(query)}>View every content type</Link>.</p>}
        </div>

        {error ? (
          <div className="search-status error" role="alert">
            <h2>Search is temporarily unavailable.</h2>
            <p>The published library could not be queried. Please try again after the local database is available.</p>
          </div>
        ) : results.length > 0 ? (
          <div className="search-ranked-results">
            {results.map((result, index) => (
              <Link className={`search-ranked-card ${result.contentType}`} href={result.route} key={result.id}>
                <span className="search-result-rank">{String(index + 1).padStart(2, "0")}</span>
                <div>
                  <p>{contentTypeLabels[result.contentType]} · Updated {new Intl.DateTimeFormat("en", { dateStyle: "medium" }).format(new Date(result.updatedAt))}</p>
                  <h3>{result.title}</h3>
                  <span>{result.excerpt}</span>
                </div>
                <strong>{resultActionLabels[result.contentType]} <ArrowIcon /></strong>
              </Link>
            ))}
          </div>
        ) : canSearch ? (
          <div className="empty-results">
            <h2>No published content matched this search.</h2>
            <p>Try a shorter phrase, remove the content filter, or use one of the related searches suggested above.</p>
            {selectedType && <Link className="button button-primary" href={searchHref(query)}>Search every content type</Link>}
          </div>
        ) : (
          <div className="search-start-panel">
            <div>
              <p className="eyebrow">How it works</p>
              <h2>Search by plant, symptom, task, climate, product, or policy.</h2>
            </div>
            <ul>
              <li><strong>Ranked results</strong><span>Titles and reader summaries receive the strongest relevance weight.</span></li>
              <li><strong>Prefix matching</strong><span>Partial words can surface useful published resources as you refine a query.</span></li>
              <li><strong>Focused filters</strong><span>Narrow results to plants, diagnostics, guides, calendars, reviews, tools, or trust pages.</span></li>
            </ul>
          </div>
        )}
      </section>
    </main>
  );
}
