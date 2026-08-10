import type { Metadata } from "next";
import { SectionLanding } from "@/components/section-landing";

export const metadata: Metadata = { title: "Small-Space Gardening", description: "Gardening guidance for balconies, containers, patios, and indoor spaces." };

export default function SmallSpaceGardeningPage() {
  return <SectionLanding eyebrow="Small-space gardening" title="Make a small space feel abundant." intro="Good small-space gardens are designed around weight, wind, light, access, and daily routines—not miniature versions of large gardens." items={[
    { id: "balcony", title: "Balcony", description: "Plan for exposure, railing safety, weight limits, and neighbour-friendly watering." },
    { id: "containers", title: "Containers", description: "Match pot volume, material, drainage, and growing medium to the plant." },
    { id: "patio", title: "Patio", description: "Create a flexible layout that preserves access, movement, and comfortable outdoor living." },
    { id: "indoor", title: "Indoor", description: "Work realistically with window light, temperature, humidity, and limited airflow." },
    { id: "renter-friendly", title: "Renter-friendly gardening", description: "Build a portable garden that can adapt, move, and leave no permanent damage." },
    { title: "Practical guides", description: "Follow complete, structured projects with preparation, materials, steps, and safety limits.", href: "/small-space-gardening/guides" },
  ]} />;
}
