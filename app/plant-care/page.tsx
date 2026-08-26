import type { Metadata } from "next";
import { SectionLanding } from "@/components/section-landing";

export const metadata: Metadata = { title: "Plant Care", description: "Understand watering, soil, pests, diseases, and plant symptoms.", alternates: { canonical: "/plant-care" } };

export default function PlantCarePage() {
  return <SectionLanding eyebrow="Plant care" title="Observe first. Treat second." intro="Plant problems rarely have one universal answer. Compare symptoms, recent changes, weather, watering, and growing conditions before choosing a response." items={[
    { id: "watering", title: "Watering", description: "Read the plant, pot, soil, and weather instead of following a fixed calendar." },
    { id: "soil-fertilizer", title: "Soil & fertilizer", description: "Support healthy roots with suitable structure, drainage, nutrients, and measured feeding." },
    { id: "pests", title: "Pests", description: "Identify the organism and begin with the least disruptive proportionate response." },
    { id: "diseases", title: "Diseases", description: "Compare patterns, recent conditions, and look-alike symptoms before taking action." },
    { id: "plant-problems", title: "Plant problems", description: "Use observable symptoms to narrow possible causes without overconfident diagnosis.", href: "/plant-care/problems" },
    { id: "observation-guide", title: "Observation guide", description: "Record symptoms, moisture, distribution, and recent changes before comparing published guides.", href: "/tools/guided-diagnosis" },
    { id: "seasonal-care", title: "Seasonal care", description: "Adjust feeding, watering, pruning, protection, and expectations as conditions change." },
  ]} />;
}
