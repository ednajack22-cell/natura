import type { Metadata } from "next";
import { SectionLanding } from "@/components/section-landing";

export const metadata: Metadata = { title: "Tools", description: "Practical garden calculators and planners with transparent assumptions.", alternates: { canonical: "/tools" } };

export default function ToolsPage() {
  return <SectionLanding eyebrow="Tools" title="Simple tools for better growing decisions." intro="Every Natura tool explains its inputs, assumptions, and limits so the result supports judgement instead of replacing it." items={[
    { id: "garden-profile", title: "My garden profile", description: "Save climate, hemisphere, space, light, and exposure on this device to prefill Natura tools.", href: "/tools/garden-profile" },
    { id: "plant-finder", title: "Plant finder", description: "Match plants to light, space, climate, and the care you can provide.", href: "/tools/plant-finder" },
    { id: "calendar-tool", title: "Monthly planting tasks", description: "Find published sowing, planting, care, harvest, and protection tasks for a month and broad context.", href: "/tools/planting-calendar" },
    { id: "frost-risk", title: "Frost risk check", description: "Interpret a trusted forecast low using plant tolerance, exposure, and container context.", href: "/tools/frost-risk" },
    { id: "watering-calculator", title: "Watering routine", description: "Build an observation-first soil-check routine based on plant, pot, temperature, drainage, and exposure.", href: "/tools/watering-calculator" },
    { id: "pot-size-calculator", title: "Pot size calculator", description: "Estimate a useful container volume, depth, and approximate diameter with visible assumptions.", href: "/tools/pot-size-calculator" },
    { id: "garden-planner", title: "Small-space garden planner", description: "Reserve access, estimate reachable growing area, and organize movable planning modules.", href: "/tools/garden-planner" },
    { id: "guided-diagnosis", title: "Plant observation guide", description: "Organize visible symptoms and compare only relevant published diagnostic guides.", href: "/tools/guided-diagnosis" },
  ]} />;
}
