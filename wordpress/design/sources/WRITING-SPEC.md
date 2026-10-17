# Writing spec for Natura starter guides

Instructions for anyone (person or agent) writing a batch of starter guides.
The site is in English; this spec is in English so writers can follow it
exactly. The owner's notes on the source book are in French in
`BACKYARD-HARVEST.md`.

## Where guides go

- One PHP file per batch in `wordpress/natura-core/includes/starter/`,
  named `batch-NN-topic.php`. Copy the structure of
  `batch-01-autumn.php` exactly: it returns
  `array( 'name' => __( '…', 'natura-core' ), 'guides' => array( 'plant' => …, 'problem' => …, 'post' => …, 'project' => … ) )`.
- Use the helpers `$p`, `$h2`, `$list` defined at the top of the file, as
  in batch 1. Escape apostrophes in single-quoted PHP strings (`\'`).
- Run `php -l` on the file. It must pass.
- Never edit other batch files or plugin code.

## Facts: the non-negotiable rules

1. **Every fact must come from a source** you fetched: the RHS
   (rhs.org.uk) first, a university extension service second, and the
   book *Backyard Harvest* (see `BACKYARD-HARVEST.md`, which lists page
   numbers and what not to reuse). No fact from memory.
2. If the RHS and the book disagree, follow the RHS.
3. Do not copy sentences from any source. Write your own plain English.
4. No invented numbers, ratings, statistics, prices, experts, reviews or
   personal experience ("we tested", "in our garden"). Natura has not tested
   these: write as a guide, not a diary.
5. No pesticide or chemical recommendations beyond what the RHS says is
   available to home gardeners, and never metaldehyde slug pellets. Prefer
   prevention and hand methods.
6. No peat: say "peat-free compost".
7. Units: metric first, imperial in brackets: `30 cm (1 ft)`, `4 °C (39 °F)`.
8. Months are for a temperate climate such as the UK.
9. Varieties: only name a variety if a source names it as suitable, and say
   what the source says about it.
10. Structured data must match what is visible: every FAQ answer must be
    in the guide's own words and true.

## Style

- British spelling (colour, fertiliser, centre), short sentences, second
  person ("you"), practical. Each `h2` section answers one question.
- Write for a reader with a balcony, patio or windowsill, not a vegetable
  plot. Always give the container size and the position.
- `excerpt`: two sentences that answer the guide's question directly.

## Shape of each type

**plant** (growing guide), keys:
`title` ("How to Grow X in Pots"), `type` (vegetables | herbs | fruit),
`sun` (any of full-sun, part-shade, shade), `space` (any of windowsill,
balcony, patio), `months` (sow / plant / harvest: arrays of month numbers),
`excerpt`, `facts` (short_name, botanical_name, difficulty Easy|Moderate|Challenging,
sun, pot_size, hardiness H1a–H7 only from the RHS plant page, watering,
harvest, season), `lists` → `key_points` (5 × point), `varieties`
(name, note), `products` (name, badge '', note, url ''), `faq` (3–5),
`sources` (title, url), then `content` (6–8 sections, ending with
"Common mistakes to avoid"), `image_prompt`, `pin_prompt`.

**problem** (plant problem guide), keys: `title` (a question the reader
types, e.g. "Why Are There Holes in My Leaves?"), `excerpt`, `plants`
(slugs of plant guides it affects, from the list below), `parts` (any of
leaves, flowers-fruit, stems, roots-compost, whole-plant), `lists` →
`causes` (cause, sign, check, fix, recovery), `products`, `faq`,
`sources`, `content` (a short prevention list), `image_prompt`,
`pin_prompt`.

**post** (Plant Care article), keys: `title`, `topic` (watering |
soil-feeding | light-position | seasonal-care), `excerpt`, `lists` →
`products`, `faq`, `sources`, `content`, `image_prompt`, `pin_prompt`.

**project** (DIY project), keys: `title` ("Make a …"), `category`
(planters | watering | supports | vertical), `excerpt`, `facts`
(project_method: always `adapted`; difficulty Beginner|Intermediate|Advanced;
time; cost Low|Medium|High; size), `plants` (slugs), `lists` → `checks`
(point: balcony safety such as weight, drainage, wind), `materials`
(name, quantity, url ''), `tools` (name, url ''), `steps` (title, text,
tip), `faq`, `sources`, `content`, `image_prompt`, `pin_prompt`.

## Image prompts

Each guide carries two prompts for an AI image generator, in English:

- `image_prompt`: the main photo, landscape 3:2. A realistic photograph,
  natural daylight, of the plant or scene the guide is about, in a pot on
  a balcony, patio or windowsill. Name the pot, the setting, the light, the
  growth stage, and what must be visible. End with: "Photorealistic, natural
  light, shallow depth of field, no text, no people's faces, no logos."
- `pin_prompt`: the Pinterest image, portrait 2:3 (1000 × 1500 px). The
  same subject photographed vertically, with calm empty space in the top
  third for a title to be added later in Canva. End with: "Vertical 2:3,
  photorealistic, empty space at the top for text, no text in the image."

Prompts must describe the plant correctly (leaf shape, colour, habit) so
the image is botanically right.

## Plant guide addresses (for links and `plants`)

Existing: cherry-tomato, genovese-basil, balcony-strawberry,
salad-leaves-in-pots, radishes-in-pots, mint-in-pots, parsley-in-pots,
chives-in-pots, chillies-in-pots, lemon-tree-in-pot.
Being written in parallel (you may link to them): thyme-in-pots,
rosemary-in-pots, sage-in-pots, coriander-in-pots, lettuce-in-pots,
swiss-chard-in-pots, beetroot-in-pots, spring-onions-in-pots,
courgettes-in-pots, french-beans-in-pots, peas-in-pots,
potatoes-in-bags, blueberries-in-pots, raspberries-in-pots,
fig-tree-in-pot, oregano-in-pots, bay-tree-in-pot, dill-in-pots,
lemon-balm-in-pots, sweet-peppers-in-pots, aubergines-in-pots,
cucumbers-in-pots, kale-in-pots, pak-choi-in-pots, garlic-in-pots,
carrots-in-pots, currants-in-pots, gooseberries-in-pots,
apple-tree-in-pot, nasturtiums-in-pots.
