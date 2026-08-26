import { NextResponse } from "next/server";
import {
  gardenClimateOptions,
  gardenExposureOptions,
  gardenHemisphereOptions,
  gardenProfileCookie,
  gardenSpaceOptions,
  gardenSunOptions,
  type GardenProfile,
} from "@/lib/garden-profile";

export async function POST(request: Request) {
  const requestUrl = new URL(request.url);
  const origin = request.headers.get("origin");
  if (origin && origin !== requestUrl.origin) return new NextResponse("Invalid profile origin.", { status: 403 });

  const formData = await request.formData();
  const destination = new URL("/tools/garden-profile", requestUrl.origin);

  if (formData.get("intent") === "clear") {
    destination.searchParams.set("cleared", "1");
    const clearedResponse = NextResponse.redirect(destination, 303);
    clearedResponse.cookies.delete(gardenProfileCookie);
    return clearedResponse;
  }

  const climate = String(formData.get("climate") ?? "");
  const hemisphere = String(formData.get("hemisphere") ?? "");
  const space = String(formData.get("space") ?? "");
  const sunHours = Number(formData.get("sunHours"));
  const exposure = String(formData.get("exposure") ?? "");

  if (!gardenClimateOptions.includes(climate as GardenProfile["climate"]) ||
      !gardenHemisphereOptions.includes(hemisphere as GardenProfile["hemisphere"]) ||
      !gardenSpaceOptions.includes(space as GardenProfile["space"]) ||
      !gardenSunOptions.includes(sunHours as GardenProfile["sunHours"]) ||
      !gardenExposureOptions.includes(exposure as GardenProfile["exposure"])) {
    destination.searchParams.set("error", "1");
    return NextResponse.redirect(destination, 303);
  }

  const profile: GardenProfile = { climate: climate as GardenProfile["climate"], hemisphere: hemisphere as GardenProfile["hemisphere"], space: space as GardenProfile["space"], sunHours: sunHours as GardenProfile["sunHours"], exposure: exposure as GardenProfile["exposure"] };
  destination.searchParams.set("saved", "1");
  const savedResponse = NextResponse.redirect(destination, 303);
  savedResponse.cookies.set(gardenProfileCookie, JSON.stringify(profile), {
    httpOnly: true,
    sameSite: "lax",
    secure: process.env.NODE_ENV === "production",
    path: "/",
    maxAge: 60 * 60 * 24 * 365,
  });
  return savedResponse;
}
