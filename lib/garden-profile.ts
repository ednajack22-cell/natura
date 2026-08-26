import "server-only";

import { cookies } from "next/headers";
import type { FinderSpace } from "@/lib/plant-finder";
import type { CalendarSpace, FrostExposure } from "@/lib/season-tools";
import type { Exposure } from "@/lib/garden-calculators";

export const gardenClimateOptions = ["general", "temperate", "mediterranean", "continental", "tropical"] as const;
export const gardenHemisphereOptions = ["northern", "southern"] as const;
export const gardenSpaceOptions = ["windowsill", "balcony", "patio", "indoor", "container", "garden"] as const;
export const gardenSunOptions = [2, 4, 6, 8] as const;
export const gardenExposureOptions = ["sheltered", "open", "windy"] as const;

export type GardenClimate = (typeof gardenClimateOptions)[number];
export type GardenHemisphere = (typeof gardenHemisphereOptions)[number];
export type GardenSpace = (typeof gardenSpaceOptions)[number];
export type GardenSunHours = (typeof gardenSunOptions)[number];
export type GardenExposure = (typeof gardenExposureOptions)[number];
export type GardenProfile = { climate: GardenClimate; hemisphere: GardenHemisphere; space: GardenSpace; sunHours: GardenSunHours; exposure: GardenExposure };

export const gardenProfileCookie = "natura_garden_profile";
export const gardenClimateLabels: Record<GardenClimate, string> = { general: "Not sure / general", temperate: "Temperate", mediterranean: "Mediterranean", continental: "Continental", tropical: "Tropical" };
export const gardenHemisphereLabels: Record<GardenHemisphere, string> = { northern: "Northern Hemisphere", southern: "Southern Hemisphere" };
export const gardenSpaceLabels: Record<GardenSpace, string> = { windowsill: "Windowsill", balcony: "Balcony", patio: "Patio", indoor: "Indoors", container: "Container garden", garden: "In-ground garden" };
export const gardenSunLabels: Record<GardenSunHours, string> = { 2: "About 2 hours", 4: "About 4 hours", 6: "About 6 hours", 8: "8 hours or more" };
export const gardenExposureLabels: Record<GardenExposure, string> = { sheltered: "Sheltered", open: "Open and exposed", windy: "Frequently windy" };

export function parseGardenProfile(value: string | undefined): GardenProfile | null {
  if (!value) return null;
  try {
    const candidate = JSON.parse(value) as Partial<GardenProfile>;
    if (!gardenClimateOptions.includes(candidate.climate as GardenClimate)) return null;
    if (!gardenHemisphereOptions.includes(candidate.hemisphere as GardenHemisphere)) return null;
    if (!gardenSpaceOptions.includes(candidate.space as GardenSpace)) return null;
    if (!gardenSunOptions.includes(candidate.sunHours as GardenSunHours)) return null;
    if (!gardenExposureOptions.includes(candidate.exposure as GardenExposure)) return null;
    return candidate as GardenProfile;
  } catch {
    return null;
  }
}

export async function getGardenProfile() {
  const cookieStore = await cookies();
  return parseGardenProfile(cookieStore.get(gardenProfileCookie)?.value);
}

export function calendarSpaceFromProfile(space: GardenSpace): CalendarSpace {
  if (space === "balcony") return "balcony";
  if (space === "indoor" || space === "windowsill") return "indoor";
  if (space === "garden") return "garden";
  return "container";
}

export function finderSpaceFromProfile(space: GardenSpace): FinderSpace {
  if (space === "garden") return "any";
  if (space === "windowsill" || space === "balcony" || space === "patio" || space === "indoor" || space === "container") return space;
  return "any";
}

export function wateringExposureFromProfile(profile: GardenProfile): Exposure {
  if (profile.space === "indoor" || profile.space === "windowsill") return "indoor";
  if (profile.exposure === "windy") return "windy";
  if (profile.exposure === "open") return "sunny";
  return "sheltered";
}

export function frostExposureFromProfile(exposure: GardenExposure): FrostExposure {
  return exposure;
}

export function profileUsesContainers(space: GardenSpace) {
  return space !== "garden";
}
