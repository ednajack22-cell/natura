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

## Audience

Natura is written **for the United States first** and adapted for the UK.
American spelling and terms, imperial units first, timing counted from the
reader's own frost dates (which works in both countries), USDA zones shown
next to the RHS hardiness rating.

## Facts: the non-negotiable rules

1. **Every fact must come from a source** you fetched: a US land-grant
   university extension service (e.g. extension.umn.edu, extension.psu.edu,
   extension.illinois.edu, ucanr.edu, extension.colostate.edu) or the RHS
   (rhs.org.uk), then the book *Backyard Harvest* (see
   `BACKYARD-HARVEST.md`). No fact from memory.
2. Timing (weeks before or after the last spring frost, days to harvest)
   comes from a US extension source. Hardiness ratings come from the RHS
   plant page (the theme turns them into USDA zones). If sources disagree,
   follow the extension for US practice and the RHS for hardiness.
3. Do not copy sentences from any source. Write your own plain English.
4. No invented numbers, ratings, statistics, prices, experts, reviews or
   personal experience ("we tested", "in our garden"). Natura has not tested
   these: write as a guide, not a diary.
5. No pesticide or chemical recommendations beyond what the RHS or a US
   extension says is suitable for home gardeners, and never metaldehyde slug
   bait. Prefer prevention and hand methods.
6. No peat: say "peat-free potting mix".
7. Units: imperial first, metric in brackets: `12 in (30 cm)`,
   `5 gallons (19 litres)`, `40 °F (4 °C)`. Round sensibly; do not add false
   precision when converting.
8. Never name months for sowing or planting in the text: say "6–8 weeks
   before your last spring frost", "after your last frost", "in late
   summer, about 10 weeks before your first fall frost". Seasons (spring,
   summer, fall, winter) are fine.
9. Varieties: only name a variety if a source names it as suitable, and say
   what the source says about it.
10. Structured data must match what is visible: every FAQ answer must be
    in the guide's own words and true.

## Style

- American spelling (color, fertilizer, center, gray, mold), short
  sentences, second person ("you"), practical. Each `h2` section answers
  one question.
- Write for a reader with a balcony, patio, deck or windowsill, not a
  vegetable plot. Always give the container size and the position.
- `excerpt`: two sentences that answer the guide's question directly.

## American terms (use the left column)

| Use | Not |
| --- | --- |
| potting mix | compost (bagged growing medium) |
| compost | garden compost (homemade, decomposed matter) |
| fertilizer, feed | fertiliser |
| row cover, frost cloth | fleece |
| zucchini | courgette |
| eggplant | aubergine |
| arugula | rocket |
| cilantro (leaves), coriander (seeds) | coriander (leaves) |
| beets | beetroot |
| bok choy | pak choi |
| green onions, scallions | spring onions |
| fava beans | broad beans |
| bush beans, pole beans, green beans | French beans |
| bell peppers | sweet peppers |
| chili peppers | chillies |
| Asian greens | oriental salad leaves |
| salad greens | salad leaves |
| fall | autumn |
| gray mold | grey mould |
| spider mites | red spider mite |
| carrot rust fly | carrot fly |
| black vine weevil | vine weevil |
| grow bag | growing bag |
| succession planting | succession sowing |
| start seeds indoors | sow indoors |
| yard | garden (US meaning of the plot) — "garden" is fine for the plants |
| faucet, hose | tap, hosepipe |
| trash | rubbish |

Soil-based mixes: John Innes is a UK product. Say "a soil-based potting
mix (in the UK, a peat-free John Innes No. 3)".

## Timing data (plant guides)

Each plant guide carries `timing`, in weeks relative to the reader's last
spring frost (negative = before), from a US extension source:

```php
'timing' => array(
	'start_indoors' => array( -8, -6 ),   // start seeds indoors, if done
	'sow_outdoors'  => array( -4, 2 ),    // direct sowing outside, if done
	'plant_out'     => array( 0, 2 ),     // transplant or plant outside
	'fall_sow'      => array( -10, -8 ),  // weeks before the FIRST fall frost, if a fall crop is possible
	'harvest_days'  => array( 60, 80 ),   // days from sowing or transplant to first harvest, if the source gives it
),
```

Leave out any key the source does not support. Perennials and fruit trees
usually have only `plant_out` (or nothing). Keep the existing `months`
key unchanged: it is the UK calendar and is used until the new calendar
replaces it.

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
salad-greens-in-pots, radishes-in-pots, mint-in-pots, parsley-in-pots,
chives-in-pots, chili-peppers-in-pots, lemon-tree-in-pot.
Being written in parallel (you may link to them): thyme-in-pots,
rosemary-in-pots, sage-in-pots, cilantro-in-pots, lettuce-in-pots,
swiss-chard-in-pots, beets-in-pots, green-onions-in-pots,
zucchini-in-pots, green-beans-in-pots, peas-in-pots,
potatoes-in-bags, blueberries-in-pots, raspberries-in-pots,
fig-tree-in-pot, oregano-in-pots, bay-tree-in-pot, dill-in-pots,
lemon-balm-in-pots, bell-peppers-in-pots, eggplant-in-pots,
cucumbers-in-pots, kale-in-pots, bok-choy-in-pots, garlic-in-pots,
carrots-in-pots, currants-in-pots, gooseberries-in-pots,
apple-tree-in-pot, nasturtiums-in-pots.
Second wave (you may link to them too): arugula-in-pots, spinach-in-pots,
asian-greens-in-pots, leeks-in-pots, microgreens-on-a-windowsill,
fava-beans-in-pots, runner-beans-in-pots, turnips-in-pots,
cherry-tree-in-pot, peach-tree-in-pot, pear-tree-in-pot, plum-tree-in-pot,
grapevine-in-pot, french-tarragon-in-pots, chervil-in-pots,
lemon-verbena-in-pot, calendula-in-pots, sorrel-in-pots.

## Book text

The extracted text of *Backyard Harvest* is in the session scratchpad:
`book/clean.txt` (part 1), `book/p2clean.txt` (part 2) and
`book/p3/clean.txt` (part 3). Use `grep -n` to find a topic. Page numbers
are in `BACKYARD-HARVEST.md`. Never copy its sentences.


## No duplicate content (read before writing)

Two pages that answer the same question compete in Google and one of them
is dropped. Each page on Natura answers **one question that no other page
answers**.

1. Before writing, read every existing guide close to your topic (grep the
   batch files in `natura-core/includes/starter/` and
   `natura-core/includes/demo-content.php`). Where a topic is covered
   elsewhere, write one sentence and link to that page
   (`/plants/slug/`, `/problems/slug/`, `/slug/` (Plant Care articles live at the site root),
   `/diy-projects/slug/`, `/gear/slug/`); do not explain it again.
2. Never reuse a title, an excerpt, a FAQ question, a key point or a
   paragraph from another guide, even reworded. FAQ questions must be
   unique across the whole site.
3. General container advice (drainage, peat-free compost, watering in hot
   weather) gets one short sentence and a link to the guide that owns it,
   not a section.
4. `wordpress/tools/check-duplicates.php` must report nothing for your
   file.

Who owns which question (pages that sit close together):

| Page | Owns | Does not cover (link instead) |
| --- | --- | --- |
| salad-greens-in-pots | cut-and-come-again mixed leaves | whole lettuces, winter leaves |
| lettuce-in-pots | whole hearting and loose-leaf lettuces grown to full size | cut-and-come-again |
| asian-greens-in-pots | winter and autumn salads in pots (mizuna, mustards, winter lettuce) | summer cut-and-come-again |
| spinach-in-pots | spinach only | other leaves |
| microgreens-on-a-windowsill | seedlings grown in compost on a tray, cut young | sprouts in a jar |
| grow-sprouts-in-a-jar (DIY) | seeds sprouted in water in a jar, no compost | microgreens |
| how-to-fertilize-container-plants (post) | how and when to feed pots | diagnosing deficiencies |
| deficiency problem guides | recognising one deficiency and fixing it | general feeding routine |
| potting-mix-for-containers (post) | what pots need from compost, mixing, refreshing and reusing it | which bag to buy |
| best-potting-mix-for-containers (gear) | choosing and buying a bag of compost | how to refresh or reuse |
| how-to-start-seeds-indoors (post) | sowing method | leggy-seedlings, damping-off-seedlings (problems) |
| how-to-water... posts | watering routine | holiday watering (its own post) |
| nasturtiums-in-pots, calendula-in-pots | each flower | no separate edible-flowers post |
