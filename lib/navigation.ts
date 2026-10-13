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
    label: "Learn",
    href: "/learn",
    description: "Explanatory writing that is not tied to one plant.",
    children: [
      { label: "Getting started", href: "/learn#beginners", description: "The groundwork, explained without jargon." },
      { label: "How plants work", href: "/learn#growing-science", description: "What happens inside the plant, and why it matters." },
      { label: "Through the year", href: "/learn#seasonal", description: "How conditions change, and what changes with them." },
      { label: "Working with your space", href: "/learn#spaces", description: "Light, weight, wind, and the limits of a small space." },
      { label: "Soil and materials", href: "/learn#materials", description: "What things are made of, and what that means." },
      { label: "Growing responsibly", href: "/learn#sustainability", description: "Water, waste, peat, and what the evidence supports." },
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

/** A menu entry, plus the path prefixes that count as being inside it. */
export type PublicNavigationItem = NavigationItem & { matches: readonly string[] };

/**
 * The public menu.
 *
 * Organised by what brings a reader here — growing something, fixing something,
 * building something, reading, working out a number, choosing equipment — rather than by
 * content type.
 *
 * Three rules hold this together, and all of them matter for search as much as
 * for readers:
 *
 *   1. Every entry is a page. No anchors dressed up as destinations.
 *   2. Every section the site is built from has an entry, Articles included,
 *      even while it is still filling up. "Start here" is not a section, so it
 *      stays out until it carries a real guided path.
 *   3. A submenu only where there is a real choice to make. Two groups carry
 *      one; everything else is a single tap, which is what most readers arriving
 *      from Pinterest on a phone will use.
 */
export const navigation: readonly PublicNavigationItem[] = [
  {
    label: "Plants",
    href: "/grow",
    description: "How to grow each plant, and when.",
    matches: ["/grow", "/plants", "/planting-calendar"],
    children: [
      { label: "All plant guides", href: "/grow", description: "Complete growing profiles for every plant we cover." },
      { label: "Plant finder", href: "/tools/plant-finder", description: "Match plants to your light, space, and care time." },
      { label: "What to plant this month", href: "/tools/planting-calendar", description: "This month's tasks for your climate and space." },
      { label: "Planting calendars", href: "/planting-calendar/calendars", description: "Month-by-month calendars by climate." },
    ],
  },
  {
    label: "Problems",
    href: "/plant-care/problems",
    description: "Something looks wrong. Work out what it is.",
    matches: ["/plant-care"],
    children: [],
  },
  {
    label: "Projects",
    href: "/small-space-gardening/guides",
    description: "Step-by-step builds for balconies and containers.",
    matches: ["/small-space-gardening"],
    children: [],
  },
  {
    label: "Articles",
    href: "/learn",
    description: "Why things happen: light, water, soil, temperature.",
    matches: ["/learn"],
    children: [],
  },
  {
    label: "Tools",
    href: "/tools",
    description: "Work out the number instead of guessing it.",
    matches: ["/tools"],
    children: [
      { label: "Plant finder", href: "/tools/plant-finder", description: "Match plants to your light, space, and care time." },
      { label: "Pot size calculator", href: "/tools/pot-size-calculator", description: "Estimate a practical container range." },
      { label: "Watering routine", href: "/tools/watering-calculator", description: "A soil-check routine you can actually follow." },
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
    matches: ["/reviews"],
    children: [],
  },
] as const;

export const editorialSections = [...editorialTaxonomy.map((item) => ({
  value: item.href.slice(1),
  label: item.label,
  /** Where content filed here appears publicly. */
  path: item.href,
  children: item.children.map((child) => ({
    value: child.href.includes("#") ? child.href.split("#")[1] : child.label.toLowerCase().replaceAll(/[^a-z0-9]+/g, "-").replaceAll(/(^-|-$)/g, ""),
    label: child.label,
  })),
})), {
  value: "institutional",
  label: "Institutional pages",
  // Institutional pages render at the site root, one path per page.
  path: "/",
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
