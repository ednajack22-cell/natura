import type { MetadataRoute } from "next";
export default function manifest(): MetadataRoute.Manifest { return { name: "Natura", short_name: "Natura", description: "Practical gardening for small spaces", start_url: "/", display: "standalone", background_color: "#fffdf8", theme_color: "#204f38" }; }
