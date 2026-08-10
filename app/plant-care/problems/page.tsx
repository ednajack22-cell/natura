import type { Metadata } from "next";
import Link from "next/link";
import { ArrowIcon, LeafIcon } from "@/components/icons";
import { getPublishedProblems } from "@/lib/problem-content";

export const metadata: Metadata = {
  title: "Plant problem diagnostics",
  description: "Compare observable symptoms, likely causes, verification steps, and careful actions before treating a plant problem.",
  alternates: { canonical: "/plant-care/problems" },
};

const labels: Record<string, string> = { watering: "Watering & roots", nutrition: "Nutrition", pest: "Pests", disease: "Diseases", environment: "Environment", other: "Other" };

export default async function ProblemsPage({ searchParams }: { searchParams: Promise<{ category?: string }> }) {
  const problems = await getPublishedProblems();
  const selectedCategory = (await searchParams).category ?? "all";
  const categories = [...new Set(problems.map((problem) => problem.category))];
  const visibleProblems = selectedCategory === "all" ? problems : problems.filter((problem) => problem.category === selectedCategory);

  return <main id="main-content">
    <section className="problem-library-hero"><div className="site-container"><p className="eyebrow"><LeafIcon /> Observation-led diagnostics</p><h1>Read the symptom.<br /><em>Test the likely cause.</em></h1><p>Plant symptoms often overlap. Natura helps you compare recent conditions and choose the smallest useful intervention.</p></div></section>
    <section className="section site-container">
      <div className="problem-library-heading"><div><p className="eyebrow">Diagnostic library</p><h2>Start with what you can observe.</h2></div><p>{visibleProblems.length} diagnostic{visibleProblems.length === 1 ? "" : "s"} shown, connected to relevant plant guides.</p></div>
      <nav className="problem-filters" aria-label="Filter diagnostics by category"><Link className={selectedCategory === "all" ? "active" : ""} href="/plant-care/problems">All problems</Link>{categories.map((category) => <Link className={selectedCategory === category ? "active" : ""} href={`/plant-care/problems?category=${category}`} key={category}>{labels[category] ?? category}</Link>)}</nav>
      {visibleProblems.length ? <div className="problem-card-grid">{visibleProblems.map((problem) => <Link className="problem-card" href={`/plant-care/problems/${problem.slug}`} key={problem.id}><div><span>{labels[problem.category] ?? problem.category}</span><i className={`urgency-${problem.urgency}`}>{problem.urgency} attention</i></div><h2>{problem.title}</h2><p>{problem.excerpt}</p><ul>{problem.symptoms.slice(0, 3).map((symptom) => <li key={symptom}>{symptom}</li>)}</ul><strong>Open diagnostic <ArrowIcon /></strong></Link>)}</div> : <div className="empty-results"><h2>No diagnostics match this category.</h2><p>Choose another category to continue exploring.</p></div>}
    </section>
  </main>;
}
