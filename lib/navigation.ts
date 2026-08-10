export type NavigationChild = {
  label: string;
  href: string;
  description: string;
};

export type NavigationItem = {
  label: string;
  href: string;
  description: string;
  children: readonly NavigationChild[];
};

export const navigation: readonly NavigationItem[] = [
  {
    label: "Grow",
    href: "/grow",
    description: "Choose, sow, and grow plants with confidence.",
    children: [
      { label: "Vegetables", href: "/grow#vegetables", description: "Productive crops for pots and compact beds." },
      { label: "Herbs", href: "/grow#herbs", description: "Kitchen herbs for windowsills and balconies." },
      { label: "Fruits", href: "/grow#fruits", description: "Compact fruit plants and container varieties." },
      { label: "Flowers", href: "/grow#flowers", description: "Useful, resilient flowers for small spaces." },
      { label: "Growing from seed", href: "/grow#growing-from-seed", description: "From germination to healthy seedlings." },
      { label: "Plant guides", href: "/grow#plant-guides", description: "Complete profiles for individual plants." },
    ],
  },
  {
    label: "Small-Space Gardening",
    href: "/small-space-gardening",
    description: "Design around light, weight, wind, and daily life.",
    children: [
      { label: "Balcony", href: "/small-space-gardening#balcony", description: "Safe, productive gardens above ground." },
      { label: "Containers", href: "/small-space-gardening#containers", description: "Choose pots, drainage, and growing media." },
      { label: "Patio", href: "/small-space-gardening#patio", description: "Flexible layouts for outdoor living areas." },
      { label: "Indoor", href: "/small-space-gardening#indoor", description: "Light, humidity, and realistic indoor crops." },
      { label: "Renter-friendly", href: "/small-space-gardening#renter-friendly", description: "Portable gardens without permanent changes." },
      { label: "Practical guides", href: "/small-space-gardening/guides", description: "Step-by-step projects with materials, preparation, and clear limits." },
    ],
  },
  {
    label: "Plant Care",
    href: "/plant-care",
    description: "Observe symptoms before choosing a treatment.",
    children: [
      { label: "Watering", href: "/plant-care#watering", description: "Read plants, soil, weather, and containers." },
      { label: "Soil & fertilizer", href: "/plant-care#soil-fertilizer", description: "Build healthy roots without overfeeding." },
      { label: "Pests", href: "/plant-care#pests", description: "Identify common pests and respond proportionately." },
      { label: "Diseases", href: "/plant-care#diseases", description: "Recognize patterns and reduce spread." },
      { label: "Plant problems", href: "/plant-care/problems", description: "Compare symptoms, likely causes, and verification steps." },
      { label: "Seasonal care", href: "/plant-care#seasonal-care", description: "Adjust care as conditions change." },
    ],
  },
  {
    label: "Planting Calendar",
    href: "/planting-calendar",
    description: "Plan around climate, frost, and crop needs.",
    children: [
      { label: "What to plant now", href: "/planting-calendar#what-to-plant-now", description: "A practical view of the current month." },
      { label: "By climate", href: "/planting-calendar#by-climate", description: "Recommendations for broad climate patterns." },
      { label: "By hardiness zone", href: "/planting-calendar#hardiness-zone", description: "Winter context with clear limitations." },
      { label: "Monthly calendars", href: "/planting-calendar#monthly-calendars", description: "Sowing and planting tasks month by month." },
      { label: "Dynamic calendars", href: "/planting-calendar/calendars", description: "Filter month-by-month tasks by climate and growing space." },
      { label: "Frost dates", href: "/planting-calendar#frost-dates", description: "Use local estimates without false precision." },
    ],
  },
  {
    label: "Tools",
    href: "/tools",
    description: "Transparent calculators for better decisions.",
    children: [
      { label: "Plant finder", href: "/tools#plant-finder", description: "Match plants to light, space, and care." },
      { label: "Planting calendar", href: "/tools#calendar-tool", description: "Explore timing for your conditions." },
      { label: "Watering calculator", href: "/tools#watering-calculator", description: "Build an observation-based routine." },
      { label: "Pot size calculator", href: "/tools#pot-size-calculator", description: "Estimate a practical container range." },
      { label: "Garden planner", href: "/tools#garden-planner", description: "Plan a compact, workable growing space." },
    ],
  },
  {
    label: "Reviews",
    href: "/reviews",
    description: "Transparent comparisons with clear criteria.",
    children: [
      { label: "Seeds", href: "/reviews?category=seeds", description: "Variety, quantity, freshness, and value." },
      { label: "Containers", href: "/reviews?category=containers", description: "Drainage, durability, weight, and fit." },
      { label: "Soil & fertilizer", href: "/reviews?category=soil-fertilizer", description: "Ingredients, suitability, and claims." },
      { label: "Watering systems", href: "/reviews?category=watering-systems", description: "Reliability and practical small-space use." },
      { label: "Grow lights", href: "/reviews?category=grow-lights", description: "Coverage, control, heat, and placement." },
      { label: "Garden tools", href: "/reviews?category=garden-tools", description: "Useful tools without unnecessary clutter." },
    ],
  },
] as const;

export const editorialSections = [...navigation.map((item) => ({
  value: item.href.slice(1),
  label: item.label,
  children: item.children.map((child) => ({
    value: child.href.includes("#") ? child.href.split("#")[1] : child.label.toLowerCase().replaceAll(/[^a-z0-9]+/g, "-").replaceAll(/(^-|-$)/g, ""),
    label: child.label,
  })),
})), {
  value: "institutional",
  label: "Institutional pages",
  children: [
    { value: "about", label: "About Natura" },
    { value: "editorial-policy", label: "Editorial policy" },
    { value: "authors", label: "Authors and reviewers" },
    { value: "contact", label: "Contact" },
    { value: "legal", label: "Legal notice" },
    { value: "privacy", label: "Privacy policy" },
    { value: "commercial-disclosure", label: "Commercial disclosure" },
  ],
}];
