import type { Metadata } from "next";
import { SectionLanding } from "@/components/section-landing";

export const metadata: Metadata = { title: "Planting Calendar", description: "Plan what to sow and plant by climate, hardiness zone, and month.", alternates: { canonical: "/planting-calendar" } };

export default function PlantingCalendarPage() {
  return <SectionLanding eyebrow="Planting calendar" title="Plant at the right moment for your conditions." intro="Calendar guidance combines climate, frost dates, crop needs, and whether you grow indoors, under cover, or outside." items={[
    { id: "what-to-plant-now", title: "What to plant now", description: "A focused monthly view with clear assumptions and regional limits." },
    { id: "by-climate", title: "By climate", description: "Use broad climate patterns as context while accounting for local conditions." },
    { id: "hardiness-zone", title: "By hardiness zone", description: "Useful winter context without pretending zones explain every growing condition." },
    { id: "monthly-calendars", title: "Monthly calendars", description: "Organise sowing, planting, protection, and harvest work across the year.", href: "/planting-calendar/calendars" },
    { id: "frost-dates", title: "Frost dates", description: "Plan around estimates while allowing for microclimates and unusual weather." },
  ]} />;
}
