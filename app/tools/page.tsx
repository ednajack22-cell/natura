import type { Metadata } from "next";
import { SectionLanding } from "@/components/section-landing";

export const metadata: Metadata = { title: "Tools", description: "Practical garden calculators and planners with transparent assumptions." };

export default function ToolsPage() {
  return <SectionLanding eyebrow="Tools" title="Simple tools for better growing decisions." intro="Every Natura tool explains its inputs, assumptions, and limits so the result supports judgement instead of replacing it." items={[
    { id: "plant-finder", title: "Plant finder", description: "Match plants to light, space, climate, and the care you can provide." },
    { id: "calendar-tool", title: "Planting calendar", description: "Explore useful sowing and planting windows for your broad conditions." },
    { id: "watering-calculator", title: "Watering calculator", description: "Build a check routine based on plant, pot, weather, and exposure." },
    { id: "pot-size-calculator", title: "Pot size calculator", description: "Estimate a useful container range and understand the trade-offs." },
    { id: "garden-planner", title: "Garden planner", description: "Organise containers, access, light, and plant needs in a compact space." },
  ]} />;
}
