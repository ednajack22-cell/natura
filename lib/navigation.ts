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

/**
 * The editorial taxonomy.
 *
 * This is how the workspace classifies content, and stored items carry these
 * section and subsection values, so entries must not be renamed or removed
 * without migrating the content that references them.
 *
 * It used to double as the public menu. That coupling is why the menu described
 * how the site was built rather than why a reader came: six content types, and
 * twenty-two of its forty-four entries were anchors onto four landing pages
 * rather than destinations of their own.
 */
export const editorialTaxonomy: readonly NavigationItem[] = [
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
      { label: "My garden profile", href: "/tools/garden-profile", description: "Save broad conditions to personalise Natura tools." },
      { label: "Plant finder", href: "/tools/plant-finder", description: "Match plants to light, space, and care." },
      { label: "Monthly planting tasks", href: "/tools/planting-calendar", description: "Explore published tasks for a month and broad context." },
      { label: "Frost risk check", href: "/tools/frost-risk", description: "Interpret a trusted forecast low cautiously." },
      { label: "Watering routine", href: "/tools/watering-calculator", description: "Build an observation-based soil-check routine." },
      { label: "Pot size calculator", href: "/tools/pot-size-calculator", description: "Estimate a practical container range." },
      { label: "Garden planner", href: "/tools/garden-planner", description: "Plan a compact, reachable growing space." },
      { label: "Observation guide", href: "/tools/guided-diagnosis", description: "Organize symptoms before comparing guides." },
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

/**
 * The public menu.
 *
 * Organised by what brings a reader here — starting out, growing something,
 * fixing something, working out a number, choosing equipment — rather than by
 * content type. Three of the old groups (Grow, Small-Space Gardening, Plant
 * Care) all applied to a beginner whose basil is failing on a balcony, which
 * left nothing to choose between them.
 *
 * Two rules hold this together, and both matter for search as much as for
 * readers:
 *
 *   1. Every entry is a page. No anchors dressed up as destinations.
 *   2. Nothing is listed before it holds content. The old menu offered six
 *      equipment categories when four were empty, and a menu that promises more
 *      than the site has costs trust, while the thin pages behind it cost
 *      ranking. Equipment categories now surface on the reviews page itself,
 *      where they can reflect what actually exists.
 */
export const navigation: readonly NavigationItem[] = [
  {
    label: "Start here",
    href: "/start-here",
    description: "New to growing in a small space? Begin with the essentials.",
    children: [],
  },
  {
    label: "Plants",
    href: "/grow",
    description: "What to grow, and how to grow it well.",
    children: [
      { label: "All plant guides", href: "/grow", description: "Complete profiles for every plant we cover." },
      { label: "Step-by-step projects", href: "/small-space-gardening/guides", description: "Build a herb trough, a salad crate, a fruiting container." },
      { label: "Small-space setup", href: "/small-space-gardening", description: "Work with the light, weight, and wind you actually have." },
      { label: "Planting calendars", href: "/planting-calendar/calendars", description: "Month-by-month tasks for your climate and space." },
    ],
  },
  {
    label: "Problems",
    href: "/plant-care/problems",
    description: "Something looks wrong. Work out what it is.",
    children: [
      { label: "Diagnose a symptom", href: "/plant-care/problems", description: "Compare symptoms, likely causes, and how to verify each one." },
      { label: "Observation guide", href: "/tools/guided-diagnosis", description: "Organise what you are seeing before drawing a conclusion." },
      { label: "Care basics", href: "/plant-care", description: "Watering, soil, pests, and seasonal adjustments." },
    ],
  },
  {
    label: "Learn",
    href: "/learn",
    description: "Understand how growing actually works, beyond any single plant.",
    children: [],
  },
  {
    label: "Tools",
    href: "/tools",
    description: "Work out the number instead of guessing it.",
    children: [
      { label: "Plant finder", href: "/tools/plant-finder", description: "Match plants to your light, space, and care time." },
      { label: "Pot size calculator", href: "/tools/pot-size-calculator", description: "Estimate a practical container range." },
      { label: "Watering routine", href: "/tools/watering-calculator", description: "Build a soil-check routine you can actually follow." },
      { label: "Frost risk check", href: "/tools/frost-risk", description: "Read a forecast low without false precision." },
      { label: "Monthly planting tasks", href: "/tools/planting-calendar", description: "What to do this month, for your conditions." },
      { label: "Garden planner", href: "/tools/garden-planner", description: "Lay out a compact, reachable growing space." },
      { label: "Observation guide", href: "/tools/guided-diagnosis", description: "Turn symptoms into a checklist worth acting on." },
      { label: "My garden profile", href: "/tools/garden-profile", description: "Save your conditions once; every tool uses them." },
    ],
  },
  {
    label: "Gear",
    href: "/reviews",
    description: "What to buy, with the criteria and the commercial relationship stated.",
    children: [],
  },
] as const;

export const editorialSections = [...editorialTaxonomy.map((item) => ({
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
