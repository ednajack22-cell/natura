-- Complete the launch targets for plants and diagnostics with source-visible,
-- original content designed for small-space and container gardeners.

insert into public.content_items (
  content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at
)
select
  'plant', 'published', seed.title, seed.slug, seed.excerpt,
  jsonb_build_object(
    'overview', seed.overview,
    'category', seed.category,
    'botanical_name', seed.botanical_name,
    'difficulty', seed.difficulty,
    'sunlight', seed.sunlight,
    'pot_size', seed.pot_size,
    'watering', seed.watering,
    'harvest', seed.harvest,
    'season', seed.season,
    'image', '/images/natura-balcony-hero.png',
    'image_alt', 'A productive collection of edible plants growing in containers on a sunlit urban balcony',
    'suitable_for', seed.suitable_for,
    'care', seed.care,
    'watch_for', seed.watch_for,
    'navigation', jsonb_build_object('section', 'grow', 'subsection', seed.subsection),
    'sources', seed.sources,
    'seo_keyword_strategy', jsonb_build_object(
      'focus_keyword', seed.focus_keyword,
      'supporting_keywords', seed.supporting_keywords,
      'search_intent', 'how-to'
    )
  ),
  seed.seo_title, seed.seo_description, now()
from (values
  (
    'Container leaf lettuce', 'container-leaf-lettuce',
    'Harvest tender lettuce leaves from a trough by sowing lightly, thinning early, and keeping the root zone evenly moist in cool conditions.',
    'Loose-leaf lettuce is one of the most space-efficient container crops. Small repeated sowings, modest light, and regular picking provide a steadier harvest than one crowded batch.',
    'Vegetable', 'Lactuca sativa', 'Easy', '3-5 hours', '8-12 L trough', 'Even moisture', '4-8 weeks', 'Spring and autumn', 'vegetables',
    array['Window boxes', 'Balcony troughs', 'Cool windowsills']::text[],
    '[{"title":"Sow a small batch","text":"Scatter seed thinly and cover lightly so seedlings have air and usable root space."},{"title":"Thin before crowding","text":"Remove surplus seedlings early and keep the strongest plants several centimetres apart for baby leaves."},{"title":"Pick outer leaves","text":"Harvest clean outer leaves regularly while leaving the centre to continue growing."}]'::jsonb,
    '[{"title":"Bitter or tough leaves","text":"Heat, drought, or delayed harvest can reduce tenderness and encourage bolting."},{"title":"Seedling loss","text":"Inspect for slugs, saturated mix, crowding, and poor airflow before resowing."}]'::jsonb,
    '[{"title":"RHS - Vegetables in containers","url":"https://www.rhs.org.uk/vegetables/containers"},{"title":"RHS - Baby salad leaves in a pot","url":"https://www.rhs.org.uk/advice/grow-your-own/containers/june-edible-container-idea/march-edible-container-idea"}]'::jsonb,
    'how to grow leaf lettuce in containers', array['lettuce window box', 'baby lettuce leaves pot', 'lettuce container watering']::text[],
    'How to Grow Leaf Lettuce in Containers',
    'Grow loose-leaf lettuce in containers with practical guidance on sowing, thinning, moisture, cool conditions, repeated harvests, and common problems.'
  ),
  (
    'Baby spinach in containers', 'baby-spinach-containers',
    'Grow baby spinach as a cool-season container crop with steady moisture, enough spacing, and prompt harvest before plants run to seed.',
    'Spinach performs best in cool conditions and can be harvested young from a trough. It is less forgiving of heat and dry roots, so timing matters more than heavy feeding.',
    'Vegetable', 'Spinacia oleracea', 'Moderate', '4-6 hours', '10-15 L trough', 'Moist, not saturated', '6-10 weeks', 'Early spring and autumn', 'vegetables',
    array['Balcony troughs', 'Window boxes', 'Cool patios']::text[],
    '[{"title":"Choose a cool window","text":"Sow when prolonged heat is unlikely and give bright light without trapping the pot against hot glass."},{"title":"Space the seedlings","text":"Thin plants so air can move between leaves and roots do not compete immediately."},{"title":"Harvest while tender","text":"Take several outer leaves from each plant or cut a planned baby-leaf batch before flower stems develop."}]'::jsonb,
    '[{"title":"Bolting","text":"Long days, heat, dry roots, or plant maturity can trigger a flower stem and smaller leaves."},{"title":"Leaf damage","text":"Check ragged holes at night for slugs and inspect pale marks for pests before treating."}]'::jsonb,
    '[{"title":"UMN Extension - Growing spinach and Swiss chard","url":"https://extension.umn.edu/vegetables/growing-spinach-and-swiss-chard"},{"title":"RHS - Vegetables in containers","url":"https://www.rhs.org.uk/vegetables/containers"}]'::jsonb,
    'how to grow baby spinach in containers', array['spinach trough spacing', 'spinach bolting heat', 'harvest baby spinach']::text[],
    'How to Grow Baby Spinach in Containers',
    'Grow baby spinach in a container with guidance on cool-season timing, spacing, moisture, harvesting, bolting, pests, and healthy leaf production.'
  ),
  (
    'Dwarf French bean', 'dwarf-french-bean-container',
    'Grow compact French beans in a warm container, then keep moisture steady through flowering and pick pods frequently to extend production.',
    'Dwarf French beans fit productive summer growing into a wide patio pot without tall supports. Warm soil, direct light, and reliable water during flowering are the main requirements.',
    'Vegetable', 'Phaseolus vulgaris', 'Easy', '6+ hours', '15-25 L wide pot', 'Regular in flower', '8-10 weeks', 'Late spring through summer', 'vegetables',
    array['Sunny balconies', 'Patios', 'Wide containers']::text[],
    '[{"title":"Wait for warm conditions","text":"Sow or plant only after cold nights have passed and place the container in a sheltered sunny position."},{"title":"Keep flowers supplied","text":"Check root-zone moisture frequently when flowers and pods appear because containers dry quickly."},{"title":"Pick every few days","text":"Harvest slim pods before seeds swell strongly to encourage the plant to form more."}]'::jsonb,
    '[{"title":"Few pods","text":"Cold, drought during flowering, or delayed picking can reduce the useful crop."},{"title":"Rust pustules","text":"Confirm coloured pustules, especially below leaves, rather than treating every brown mark as rust."}]'::jsonb,
    '[{"title":"RHS - How to grow French beans","url":"https://www.rhs.org.uk/vegetables/french-beans/grow-your-own"},{"title":"RHS - Vegetables in containers","url":"https://www.rhs.org.uk/vegetables/containers"}]'::jsonb,
    'how to grow dwarf French beans in containers', array['dwarf bean pot size', 'container bean watering', 'harvest French beans']::text[],
    'How to Grow Dwarf French Beans in Pots',
    'Grow dwarf French beans in containers with practical advice on pot width, warmth, watering during flowering, feeding, picking, and common leaf problems.'
  ),
  (
    'Dwarf mangetout pea', 'dwarf-mangetout-pea-container',
    'Use a large, cool container and low support for dwarf mangetout peas, then maintain moisture as flowers open and harvest flat pods frequently.',
    'Dwarf mangetout peas can produce a modest crop from a large container. They need more root space than their height suggests, plus support and regular moisture while pods swell.',
    'Vegetable', 'Pisum sativum', 'Moderate', '5-6 hours', '25-35 L, 45 cm wide', 'Regular in containers', '10-14 weeks', 'Spring and early summer', 'vegetables',
    array['Cool balconies', 'Patios', 'Large containers']::text[],
    '[{"title":"Use a generous container","text":"Choose a pot around 45 centimetres wide and add twiggy support before shoots begin to lean."},{"title":"Protect young plants","text":"Watch tender seedlings for slug feeding and keep the mix moist without leaving the pot in water."},{"title":"Pick flat pods often","text":"Harvest mangetout before peas swell strongly and keep checking every few days."}]'::jsonb,
    '[{"title":"Small harvest","text":"A container holds fewer plants than open ground, so expectations should remain modest."},{"title":"Powdery leaves","text":"Dry roots and poor air movement may accompany powdery mildew; inspect the coating before acting."}]'::jsonb,
    '[{"title":"RHS - How to grow peas","url":"https://www.rhs.org.uk/vegetables/peas/grow-your-own"},{"title":"RHS - Vegetables in containers","url":"https://www.rhs.org.uk/vegetables/containers"}]'::jsonb,
    'how to grow dwarf mangetout peas in containers', array['pea container size', 'dwarf pea support', 'mangetout harvest']::text[],
    'How to Grow Dwarf Mangetout Peas in Pots',
    'Grow dwarf mangetout peas in a large container with advice on sowing, support, moisture, flowering, regular harvests, powdery mildew, and realistic yields.'
  ),
  (
    'Container chives', 'container-chives',
    'Maintain a compact pot of chives with sun or partial shade, even moisture, regular cutting, and division when the clump becomes crowded.',
    'Chives are a low-maintenance perennial herb for small pots. Cutting leaves from the outside and dividing congested clumps keeps the plant productive for several seasons.',
    'Herb', 'Allium schoenoprasum', 'Easy', '3-6 hours', '5 L, 20 cm pot', 'Even moisture', '8-12 weeks', 'Spring through autumn', 'herbs',
    array['Windowsills', 'Balconies', 'Kitchen-door pots']::text[],
    '[{"title":"Plant at the same depth","text":"Keep the base of the clump level with the growing mix in a pot with open drainage holes."},{"title":"Cut leaves cleanly","text":"Snip usable leaves near the base with clean scissors instead of pulling individual tips."},{"title":"Divide crowded clumps","text":"Split an established clump every few years when growth becomes dense and weak in the centre."}]'::jsonb,
    '[{"title":"Rust pustules","text":"Orange or brown pustules and premature yellowing deserve closer inspection, especially after long leaf wetness."},{"title":"Weak regrowth","text":"Crowding, dry compost, or exhausted growing mix may reduce new leaves."}]'::jsonb,
    '[{"title":"RHS - How to grow chives","url":"https://www.rhs.org.uk/herbs/chives/grow-your-own"},{"title":"RHS - Growing herbs in containers","url":"https://www.rhs.org.uk/herbs/containers"}]'::jsonb,
    'how to grow chives in containers', array['chives pot size', 'harvest chive leaves', 'divide chive clump']::text[],
    'How to Grow Chives in Containers',
    'Grow chives in a container with practical advice on pot size, light, moisture, harvesting, edible flowers, dividing crowded clumps, and rust symptoms.'
  ),
  (
    'Flat-leaf parsley', 'flat-leaf-parsley-container',
    'Grow flat-leaf parsley in a deep container with patient germination, sun or partial shade, and consistently moist but well-drained growing mix.',
    'Parsley is compact but slow to start. Direct sowing into its final container reduces root disturbance, while steady moisture supports repeated leaf harvests.',
    'Herb', 'Petroselinum crispum', 'Easy', '3-6 hours', '6-10 L deep pot', 'Moist, not waterlogged', '10-14 weeks', 'Spring through autumn', 'herbs',
    array['Windowsills', 'Balconies', 'Part-shade patios']::text[],
    '[{"title":"Allow time to germinate","text":"Keep the surface gently moist and do not discard the sowing early because parsley can emerge slowly."},{"title":"Thin into final spacing","text":"Remove crowded seedlings so the remaining plants can form a healthy crown and root system."},{"title":"Harvest outer stems","text":"Cut the longest outside stems close to the base while leaving the centre intact."}]'::jsonb,
    '[{"title":"Yellow lower leaves","text":"Compare natural ageing with dry roots, saturated mix, and recent feeding before changing care."},{"title":"Second-year flowering","text":"Parsley is biennial and naturally sends up a flower stem in its second season."}]'::jsonb,
    '[{"title":"RHS - How to grow parsley","url":"https://www.rhs.org.uk/herbs/parsley/grow-your-own"},{"title":"RHS - Growing herbs in containers","url":"https://www.rhs.org.uk/herbs/containers"}]'::jsonb,
    'how to grow parsley in containers', array['parsley germination time', 'parsley partial shade', 'harvest flat leaf parsley']::text[],
    'How to Grow Flat-Leaf Parsley in Pots',
    'Grow flat-leaf parsley in containers with guidance on slow germination, spacing, partial shade, even moisture, harvesting, yellow leaves, and flowering.'
  ),
  (
    'Spearmint in a pot', 'spearmint-container',
    'Keep vigorous spearmint contained in its own pot, maintain moisture in warm weather, and harvest shoot tips often for compact fresh growth.',
    'Spearmint is productive in sun or partial shade and is usually easier to manage in a container than open soil. Regular cutting and occasional division prevent a congested root ball.',
    'Herb', 'Mentha spicata', 'Easy', '3-6 hours', '8-12 L pot', 'Regular in dry weather', '6-8 weeks', 'Spring through autumn', 'herbs',
    array['Balconies', 'Patios', 'Bright windowsills']::text[],
    '[{"title":"Give mint its own pot","text":"Keep the spreading rhizomes separate from slower herbs and use a container with working drainage."},{"title":"Harvest the shoot tips","text":"Pinch or cut young tips regularly to promote branching and fresh leaves."},{"title":"Divide when congested","text":"Refresh a crowded root ball by dividing healthy outer sections and replacing tired growing mix."}]'::jsonb,
    '[{"title":"Rust on leaves","text":"Look for coloured pustules and yellowing rather than assuming every brown patch is fungal rust."},{"title":"Dry edges","text":"Container mint can dry rapidly in heat, but confirm moisture below the surface before watering."}]'::jsonb,
    '[{"title":"RHS - How to grow mint","url":"https://www.rhs.org.uk/herbs/mint/grow-your-own"},{"title":"RHS - Growing herbs in containers","url":"https://www.rhs.org.uk/herbs/containers"}]'::jsonb,
    'how to grow mint in a container', array['mint pot size', 'contain mint roots', 'harvest spearmint']::text[],
    'How to Grow Spearmint in a Container',
    'Grow spearmint in a container with practical advice on containment, light, moisture, regular harvesting, dividing crowded roots, rust, and dry leaf edges.'
  ),
  (
    'Container thyme', 'container-thyme',
    'Grow culinary thyme in a small sunny pot with sharp drainage, restrained watering, and light regular trimming that avoids cutting into bare old wood.',
    'Thyme suits warm, bright containers and needs less water than leafy herbs. Free drainage and protection from prolonged winter wet are more important than frequent feeding.',
    'Herb', 'Thymus vulgaris', 'Easy', '6+ hours', '3-5 L pot', 'Allow surface to dry', 'Light harvest after establishment', 'Spring through autumn', 'herbs',
    array['Sunny balconies', 'Patios', 'Dry herb containers']::text[],
    '[{"title":"Prioritise drainage","text":"Use a pot with several drainage holes and avoid leaving the root ball in a water-filled saucer."},{"title":"Water by condition","text":"Check below the surface and water when the mix has partly dried rather than following a fixed schedule."},{"title":"Trim green growth","text":"Harvest young sprigs and lightly shape the plant without cutting deeply into leafless woody stems."}]'::jsonb,
    '[{"title":"Dark soft growth","text":"Persistently wet, cold growing mix can damage roots and stems."},{"title":"Sparse stretched shoots","text":"Low light can produce weak growth with less aroma."}]'::jsonb,
    '[{"title":"RHS - How to grow thyme","url":"https://www.rhs.org.uk/herbs/thyme/grow-your-own"},{"title":"RHS - Mediterranean herbs in a pot","url":"https://www.rhs.org.uk/advice/grow-your-own/containers/june-edible-container-idea"}]'::jsonb,
    'how to grow thyme in containers', array['thyme pot drainage', 'watering thyme in pots', 'harvest container thyme']::text[],
    'How to Grow Thyme in Containers',
    'Grow thyme in a sunny container with guidance on pot size, sharp drainage, restrained watering, harvesting green shoots, winter wet, and weak growth.'
  ),
  (
    'Container rosemary', 'container-rosemary',
    'Give rosemary a sunny, free-draining container, protect roots from prolonged cold wet conditions, and prune lightly to maintain a balanced evergreen plant.',
    'Rosemary makes a durable container centrepiece when roots stay aerated. A generous stable pot, direct light, and shelter from repeated winter saturation are essential.',
    'Herb', 'Salvia rosmarinus', 'Moderate', '6+ hours', '20-30 L, 30 cm pot', 'Let the surface dry', '3-6 months after planting', 'Year-round in mild climates', 'herbs',
    array['Sunny balconies', 'Sheltered patios', 'Large herb pots']::text[],
    '[{"title":"Use a stable draining pot","text":"Choose a container at least 30 centimetres wide and deep with open drainage holes."},{"title":"Avoid prolonged winter wet","text":"Move the pot into a rain shadow or sheltered bright position when cold rainfall keeps the mix saturated."},{"title":"Prune after growth","text":"Shorten green shoots lightly and regularly instead of cutting hard into old bare wood."}]'::jsonb,
    '[{"title":"Brown shoot tips","text":"Compare drought, cold wind, damaged roots, and saturated compost before deciding on a cause."},{"title":"Root decline","text":"Cold wet compost and oversized pots can leave rosemary roots without enough oxygen."}]'::jsonb,
    '[{"title":"RHS - How to grow rosemary","url":"https://www.rhs.org.uk/herbs/rosemary/grow-your-own"},{"title":"RHS - Mediterranean herbs in a pot","url":"https://www.rhs.org.uk/advice/grow-your-own/containers/june-edible-container-idea"}]'::jsonb,
    'how to grow rosemary in containers', array['rosemary pot size', 'rosemary winter drainage', 'prune potted rosemary']::text[],
    'How to Grow Rosemary in Containers',
    'Grow rosemary in a container with advice on pot size, full sun, free drainage, winter protection, measured watering, pruning, and root decline.'
  ),
  (
    'Compact sweet pepper', 'compact-sweet-pepper-container',
    'Grow a compact sweet pepper in the warmest bright position available, with steady root-zone moisture, measured feeding, and enough time for fruit to colour.',
    'Sweet peppers are tender fruiting plants that need warmth and direct light. Smaller-fruited varieties are often a more dependable choice for a single balcony container.',
    'Vegetable', 'Capsicum annuum', 'Moderate', '6-8 hours', '15-20 L pot', 'Steady moisture', '12-20 weeks', 'Warm months', 'vegetables',
    array['Sunny balconies', 'Patios', 'Bright indoor starts']::text[],
    '[{"title":"Start warm","text":"Raise or buy a sturdy plant and move it outside only after cold nights have passed."},{"title":"Keep moisture consistent","text":"Check the full root zone and water before severe drying while allowing surplus water to drain."},{"title":"Feed to the label","text":"Once fruit is setting, use an appropriate container feed at the labelled rate rather than adding extra fertiliser."}]'::jsonb,
    '[{"title":"Blossom-end patches","text":"Dark sunken patches at the flower end often follow irregular water supply in restricted roots."},{"title":"Sap-feeding pests","text":"Inspect leaf undersides for aphids, whitefly, or mites before choosing a response."}]'::jsonb,
    '[{"title":"RHS - How to grow sweet peppers","url":"https://www.rhs.org.uk/vegetables/peppers/grow-your-own"},{"title":"UMN Extension - Growing peppers","url":"https://extension.umn.edu/vegetables/growing-peppers"}]'::jsonb,
    'how to grow sweet peppers in containers', array['pepper container size', 'watering potted peppers', 'pepper blossom end rot']::text[],
    'How to Grow Sweet Peppers in Containers',
    'Grow compact sweet peppers in pots with practical guidance on warmth, light, steady moisture, feeding, ripening, blossom-end rot, aphids, mites, and whitefly.'
  ),
  (
    'Patio cucumber', 'patio-cucumber-container',
    'Train a compact cucumber vertically in a warm large container, maintain even moisture as fruits form, and harvest frequently before fruits become oversized.',
    'A compact or mini cucumber can use vertical space efficiently on a warm sheltered patio. Containers need close moisture checks and a secure support installed before vines become heavy.',
    'Vegetable', 'Cucumis sativus', 'Moderate', '6-8 hours', '25-35 L pot', 'Even moisture', '10-14 weeks', 'Warm months', 'vegetables',
    array['Warm patios', 'Sunny balconies', 'Small greenhouses']::text[],
    '[{"title":"Install support first","text":"Place a secure trellis or cane support before transplanting so later root disturbance is limited."},{"title":"Water the root zone","text":"Keep the mix evenly moist during flowering and fruiting while directing water away from the leaves and stem base."},{"title":"Harvest frequently","text":"Pick fruits at the useful size for the variety before they become large, seedy, or yellow."}]'::jsonb,
    '[{"title":"Powdery coating","text":"Inspect expanding white growth and review drought stress, airflow, and crowding."},{"title":"Poor fruit set","text":"Cool weather, low light, flower type, or limited pollination can affect some varieties."}]'::jsonb,
    '[{"title":"RHS - How to grow cucumbers","url":"https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own"},{"title":"UMN Extension - Growing cucumbers","url":"https://extension.umn.edu/vegetables/growing-cucumbers"}]'::jsonb,
    'how to grow patio cucumbers in containers', array['cucumber container size', 'mini cucumber trellis', 'watering container cucumber']::text[],
    'How to Grow Patio Cucumbers in Containers',
    'Grow patio cucumbers in containers with guidance on warmth, pot size, vertical support, even moisture, feeding, harvest timing, mildew, and poor fruit set.'
  )
) as seed(
  title, slug, excerpt, overview, category, botanical_name, difficulty, sunlight, pot_size, watering,
  harvest, season, subsection, suitable_for, care, watch_for, sources, focus_keyword, supporting_keywords,
  seo_title, seo_description
)
on conflict (slug) do nothing;

insert into public.plant_finder_profiles (
  content_id, min_sun_hours, space_types, care_level, climates, edible, match_note
)
select content.id, seed.min_sun_hours, seed.space_types, seed.care_level, seed.climates, true, seed.match_note
from (values
  ('container-leaf-lettuce', 3::smallint, array['windowsill','balcony','patio','container']::text[], 'regular', array['general','temperate','mediterranean','continental']::text[], 'A compact cool-season crop that benefits from afternoon shelter in hot climates.'),
  ('baby-spinach-containers', 4::smallint, array['windowsill','balcony','patio','container']::text[], 'regular', array['general','temperate','continental']::text[], 'Best where spring or autumn conditions stay cool enough to delay bolting.'),
  ('dwarf-french-bean-container', 6::smallint, array['balcony','patio','container']::text[], 'regular', array['general','temperate','mediterranean','continental']::text[], 'A warm-season crop for a wide pot; steady water matters once flowers appear.'),
  ('dwarf-mangetout-pea-container', 5::smallint, array['balcony','patio','container']::text[], 'regular', array['general','temperate','continental']::text[], 'Choose a dwarf cultivar and expect a modest harvest from one large container.'),
  ('container-chives', 3::smallint, array['windowsill','balcony','patio','indoor','container']::text[], 'low', array['general','temperate','mediterranean','continental']::text[], 'A resilient perennial herb for repeated cutting in sun or partial shade.'),
  ('flat-leaf-parsley-container', 3::smallint, array['windowsill','balcony','patio','indoor','container']::text[], 'regular', array['general','temperate','mediterranean','continental']::text[], 'Patient germination and even moisture are more important than intense sun.'),
  ('spearmint-container', 3::smallint, array['windowsill','balcony','patio','indoor','container']::text[], 'regular', array['general','temperate','mediterranean','continental']::text[], 'Keep vigorous roots in their own pot and divide the clump when crowded.'),
  ('container-thyme', 6::smallint, array['windowsill','balcony','patio','container']::text[], 'low', array['general','temperate','mediterranean','continental']::text[], 'A low-care sunny herb only where the pot drains freely.'),
  ('container-rosemary', 6::smallint, array['balcony','patio','container']::text[], 'regular', array['general','temperate','mediterranean']::text[], 'Give the evergreen root ball bright light and protection from prolonged winter wet.'),
  ('compact-sweet-pepper-container', 6::smallint, array['windowsill','balcony','patio','indoor','container']::text[], 'attentive', array['general','temperate','mediterranean','continental','tropical']::text[], 'A tender fruiting plant that rewards warmth, direct light, and steady moisture.'),
  ('patio-cucumber-container', 6::smallint, array['balcony','patio','container']::text[], 'attentive', array['general','temperate','mediterranean','continental','tropical']::text[], 'Use a compact cultivar, a large pot, and secure vertical support in a warm position.')
) as seed(slug, min_sun_hours, space_types, care_level, climates, match_note)
join public.content_items content on content.slug = seed.slug and content.content_type = 'plant'
on conflict (content_id) do update set
  min_sun_hours = excluded.min_sun_hours,
  space_types = excluded.space_types,
  care_level = excluded.care_level,
  climates = excluded.climates,
  edible = excluded.edible,
  match_note = excluded.match_note,
  updated_at = now();

insert into public.content_items (
  content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at
)
select
  'problem', 'published', seed.title, seed.slug, seed.excerpt,
  jsonb_build_object(
    'overview', seed.overview,
    'navigation', jsonb_build_object('section', 'plant-care', 'subsection', 'plant-problems'),
    'sources', seed.sources,
    'seo_keyword_strategy', jsonb_build_object(
      'focus_keyword', seed.focus_keyword,
      'supporting_keywords', seed.supporting_keywords,
      'search_intent', 'informational'
    )
  ),
  seed.seo_title, seed.seo_description, now()
from (values
  ('Spider mites on warm container plants', 'spider-mites-container-plants', 'Look for fine pale mottling, mites and eggs below leaves, and delicate webbing before linking dry-weather damage to spider mites.', 'Two-spotted spider mites are tiny sap-feeding arachnids that reproduce quickly in warm dry conditions. Mottling alone is not proof, so inspect the leaf undersides with bright light or magnification.', '[{"title":"RHS - Glasshouse red spider mite","url":"https://www.rhs.org.uk/biodiversity/glasshouse-red-spider-mite"},{"title":"RHS - Protecting biodiversity and plant health","url":"https://www.rhs.org.uk/science/plant-health-in-gardens/protect-your-garden"}]'::jsonb, 'spider mites on container plants', array['fine webbing under leaves','mottled plant leaves','two spotted spider mite']::text[], 'Spider Mites on Container Plants', 'Identify possible spider mites from leaf mottling, tiny mites, eggs, and fine webbing, then use proportionate non-chemical management for container plants.'),
  ('Whitefly on protected edible plants', 'whitefly-edible-container-plants', 'Confirm clouds of small white insects, scale-like nymphs below leaves, honeydew, and sooty mould before managing possible whitefly.', 'Whiteflies are sap-feeding insects that thrive in warm protected conditions. Adults fly when disturbed, while flat nymphs remain below leaves; both stages should be checked before taking action.', '[{"title":"RHS - Glasshouse whitefly","url":"https://www.rhs.org.uk/biodiversity/glasshouse-whitefly"},{"title":"RHS - Indoor plant sap feeders","url":"https://www.rhs.org.uk/biodiversity/indoor-plants-sap-feeding-insects"}]'::jsonb, 'whitefly on edible container plants', array['white insects under leaves','whitefly honeydew','sooty mould vegetables']::text[], 'Whitefly on Edible Container Plants', 'Identify possible whitefly from flying adults, nymphs, honeydew, and sooty mould, then manage warm protected edible plants without broad treatment.'),
  ('Root rot and waterlogged containers', 'root-rot-waterlogged-containers', 'Compare persistent wetness, poor drainage, dark roots, stem-base decay, yellowing, and wilting before suspecting root rot in a container.', 'Root decline can result from oxygen-starved waterlogged mix, damaged roots, cold saturated conditions, or a root-rotting organism. The visible top growth rarely identifies which cause is present.', '[{"title":"RHS - Growing plants in containers","url":"https://www.rhs.org.uk/container-gardening/growing-plants-in-containers"},{"title":"RHS - Phytophthora root rot","url":"https://www.rhs.org.uk/disease/phytophthora-root-rot"}]'::jsonb, 'root rot in container plants', array['waterlogged pot roots','dark soft plant roots','container drainage problems']::text[], 'Root Rot and Waterlogged Containers', 'Compare wet compost, drainage, dark roots, stem-base decay, yellowing, and wilting before responding to possible root rot in a container plant.'),
  ('Blossom-end rot on tomatoes and peppers', 'blossom-end-rot-containers', 'Recognise the dark sunken patch at the flower end of tomato or pepper fruit and correct irregular root-zone moisture for later fruits.', 'Blossom-end rot is a physiological disorder rather than an infectious disease. Restricted roots and uneven water supply can limit calcium movement into developing tomato and pepper fruits.', '[{"title":"RHS - Blossom end rot","url":"https://www.rhs.org.uk/advice/profile?pid=395"},{"title":"RHS - Tomato fruit ripening problems","url":"https://www.rhs.org.uk/problems/tomatoes-fruit-ripening-problems"}]'::jsonb, 'blossom end rot in containers', array['black patch bottom tomato','pepper blossom end rot','irregular watering fruit']::text[], 'Blossom-End Rot in Container Crops', 'Identify blossom-end rot on tomatoes and peppers, understand its connection with irregular moisture, and protect later fruits without unnecessary pesticides.'),
  ('Rust pustules on edible plants', 'rust-pustules-edible-plants', 'Distinguish coloured spore pustules, usually below leaves, from general brown spots before managing possible rust on herbs and vegetables.', 'Rusts are host-specific fungal diseases that form yellow, orange, brown, black, or white pustules. Similar coloured damage can have other causes, so confirm raised or powdery spore structures.', '[{"title":"RHS - Rust diseases","url":"https://www.rhs.org.uk/disease/rust-diseases"},{"title":"RHS - Protecting biodiversity and plant health","url":"https://www.rhs.org.uk/science/plant-health-in-gardens/protect-your-garden"}]'::jsonb, 'rust on edible plants', array['orange pustules under leaves','rust on mint chives beans','plant leaf spore spots']::text[], 'Rust Pustules on Edible Plants', 'Identify possible rust from coloured pustules and leaf spots, review wetness and airflow, and manage affected edible plants with proportionate hygiene.'),
  ('Slug and snail feeding on seedlings', 'slug-snail-seedling-damage', 'Use ragged holes, slime trails, missing seedlings, damp conditions, and night inspection to confirm targeted slug or snail feeding.', 'Some slugs and snails feed on soft seedlings, but many also recycle dead material and support garden wildlife. Confirm fresh feeding and protect only the vulnerable plants rather than trying to eradicate them.', '[{"title":"RHS - Slugs and snails","url":"https://www.rhs.org.uk/biodiversity/slugs-and-snails"},{"title":"RHS - Vegetable seed sowing","url":"https://www.rhs.org.uk/vegetables/seeds-sowing"}]'::jsonb, 'slug damage on seedlings', array['ragged holes seedlings','slime trails plant pots','snails eating container plants']::text[], 'Slug and Snail Damage on Seedlings', 'Confirm slug or snail feeding from ragged holes, slime trails, night activity, and missing seedlings, then protect vulnerable container plants selectively.')
) as seed(title, slug, excerpt, overview, sources, focus_keyword, supporting_keywords, seo_title, seo_description)
on conflict (slug) do nothing;

insert into public.problem_profiles (
  content_id, category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings
)
select content.id, seed.category, seed.urgency, seed.symptoms, seed.likely_causes, seed.verification_steps, seed.recommended_actions, seed.warnings
from (values
  ('spider-mites-container-plants', 'pest', 'moderate', array['Fine pale or bronze mottling on leaves','Tiny moving mites or round eggs below leaves','Fine webbing in heavier infestations']::text[], '[{"title":"Two-spotted spider mites","text":"These sap-feeding mites reproduce rapidly on warm dry plants and can cause mottling and early leaf loss."},{"title":"A look-alike stress pattern","text":"Heat, spray damage, nutrient stress, or other sap feeders can produce pale marks without mites or webbing."}]'::jsonb, '[{"title":"Inspect below several leaves","text":"Use bright light or magnification to look for moving mites, eggs, shed skins, and fine webbing."},{"title":"Compare the environment","text":"Note recent heat, dry air, plant crowding, and whether nearby plants show a similar pattern."}]'::jsonb, '[{"title":"Isolate and clean locally","text":"Separate badly affected movable pots and remove only heavily damaged leaves while preserving useful foliage."},{"title":"Use water where suitable","text":"Rinse leaf undersides on plants that tolerate it and repeat inspection rather than relying on one treatment."},{"title":"Support natural control","text":"Avoid broad insecticides that can kill predators and worsen mite outbreaks."}]'::jsonb, array['Mites are not insects, and products labelled only for insects may be ineffective or harmful.','Check any regulated product label for the crop, pest, location, and harvest interval.']::text[]),
  ('whitefly-edible-container-plants', 'pest', 'moderate', array['Small white-winged insects fly when foliage is disturbed','Flat pale scale-like nymphs below leaves','Sticky honeydew or black sooty mould']::text[], '[{"title":"Glasshouse whitefly","text":"Adults and nymphs feed below leaves and reproduce quickly in warm protected spaces."},{"title":"Another sap-feeding insect","text":"Aphids, scale insects, and other whitefly species can also produce honeydew or pale remains."}]'::jsonb, '[{"title":"Disturb and inspect","text":"Gently move the plant to check whether white adults fly, then inspect leaf undersides for fixed oval nymphs."},{"title":"Check new plants and neighbours","text":"Look for the same stages on recent purchases and nearby warm-grown hosts."}]'::jsonb, '[{"title":"Remove local sources","text":"Remove badly infested leaves and unwanted host weeds without stripping most of the plant."},{"title":"Monitor adults carefully","text":"Use traps only as a monitoring aid and consider their risk to non-target insects."},{"title":"Consider biological control early","text":"In an enclosed growing area, suitable commercially supplied natural enemies work best before populations become heavy."}]'::jsonb, array['Do not assume every small white object is whitefly; aphid skins remain on upper surfaces and do not fly.','Follow crop and harvest restrictions for any regulated treatment.']::text[]),
  ('root-rot-waterlogged-containers', 'disease', 'high', array['Growing mix remains wet for several days','Roots are dark, soft, sparse, or smell decayed','Leaves yellow or wilt despite wet compost']::text[], '[{"title":"Oxygen-starved roots","text":"Blocked drainage, an oversized pot, dense mix, or a standing saucer can keep the root zone saturated."},{"title":"Root-rotting organisms","text":"Several fungi and fungus-like organisms can decay roots and the stem base, especially in persistently wet conditions."},{"title":"Cold or physical root injury","text":"Cold wet compost, recent repotting, or damaged roots can cause a similar decline."}]'::jsonb, '[{"title":"Confirm drainage and moisture depth","text":"Check holes, saucers, outer pots, and moisture through the root ball rather than only the surface."},{"title":"Inspect roots without unnecessary damage","text":"If decline is serious, slide the root ball out once and compare firm pale roots with soft dark tissue."},{"title":"Check the stem base","text":"Look for local dark soft decay and record whether the problem is spreading rapidly."}]'::jsonb, '[{"title":"Stop standing water","text":"Empty full saucers and outer pots and restore open drainage without repeatedly disturbing the roots."},{"title":"Match the response to damage","text":"For limited non-infectious waterlogging, allow aeration and correct the pot setup; severe decay may require disposal and clean replacement material."},{"title":"Clean reusable equipment","text":"Wash pots and tools before reuse when infectious root rot is suspected."}]'::jsonb, array['Do not reuse suspect growing mix around healthy plants.','Rapid stem-base collapse or repeated losses may require local diagnostic advice.']::text[]),
  ('blossom-end-rot-containers', 'environment', 'moderate', array['Circular green-brown to black patch at the flower end of fruit','The patch becomes sunken and firm or leathery','Tomato or pepper foliage may otherwise look healthy']::text[], '[{"title":"Irregular water supply","text":"A restricted or repeatedly dry root zone can interrupt calcium movement into developing fruit."},{"title":"Concentrated feeding in dry mix","text":"Fertiliser applied to dry roots can further restrict water uptake and worsen the disorder."},{"title":"A different fruit lesion","text":"Sunscald, splitting, infection, and physical injury affect different positions or produce different tissue changes."}]'::jsonb, '[{"title":"Check the position on the fruit","text":"Confirm the patch is at the end furthest from the stem where the flower was attached."},{"title":"Review moisture swings","text":"Compare pot size, hot days, root filling, dry periods, and heavy recovery watering."},{"title":"Inspect several fruits","text":"Separate older damaged fruits from newly forming fruit that can still develop normally."}]'::jsonb, '[{"title":"Restore consistent moisture","text":"Check the root zone more often and water thoroughly before it dries severely while retaining drainage."},{"title":"Remove unusable fruit","text":"Affected tissue will not recover; remove badly damaged fruits when practical so later growth can continue."},{"title":"Feed only moist roots","text":"Follow the fertiliser label and apply only when the growing mix is already moist."}]'::jsonb, array['Calcium leaf sprays do not reliably correct calcium supply to fruit.','Pesticides do not treat this physiological disorder.']::text[]),
  ('rust-pustules-edible-plants', 'disease', 'moderate', array['Pale leaf spots develop coloured pustules','Powdery pustules are often concentrated below leaves','Heavily affected leaves yellow and may fall early']::text[], '[{"title":"A host-specific rust fungus","text":"Different rust fungi infect particular host plants and form several colours or spore stages."},{"title":"Another leaf spot or residue","text":"Insect damage, mineral deposits, spray marks, and other diseases may lack raised spore pustules."}]'::jsonb, '[{"title":"Inspect both leaf surfaces","text":"Look for raised or powdery structures and compare several leaves before identifying a rust pattern."},{"title":"Check host and timing","text":"Record the plant, recent prolonged leaf wetness, airflow, and whether the pattern is spreading."}]'::jsonb, '[{"title":"Remove limited affected leaves","text":"Pick off a small number of affected leaves early without stripping the plant of most foliage."},{"title":"Reduce prolonged leaf wetness","text":"Water the root zone, improve spacing, and avoid excess nitrogen that drives soft growth."},{"title":"Clean tools and debris","text":"Use proportionate hygiene and follow host-specific disposal guidance where available."}]'::jsonb, array['Rust fungi have narrow host ranges; a rust on one plant may not threaten every nearby crop.','No broad fungicide recommendation should replace host-specific local guidance for edible crops.']::text[]),
  ('slug-snail-seedling-damage', 'pest', 'low', array['Ragged irregular holes in soft leaves','Seedlings disappear or are cut near soil level','Fresh slime trails or night-time feeding']::text[], '[{"title":"Targeted slug or snail feeding","text":"A few species feed on tender seedlings and soft shoots, particularly in damp mild conditions."},{"title":"Another chewing animal","text":"Caterpillars, beetles, birds, and physical damage can create holes without slime or night sightings."}]'::jsonb, '[{"title":"Inspect after dark","text":"Use a torch on a damp mild evening and check rims, pot feet, leaf undersides, and nearby shelter."},{"title":"Match fresh damage with evidence","text":"Look for fresh slime, rasped edges, and actual animals rather than blaming every old hole."}]'::jsonb, '[{"title":"Protect the vulnerable stage","text":"Raise sturdy transplants, use a suitable cloche, and reduce hiding places immediately beside young containers."},{"title":"Hand-pick where practical","text":"Move confirmed feeders away from vulnerable pots during night checks while preserving wider garden wildlife."},{"title":"Change watering timing","text":"Water early in the day where suitable so the surface is less wet during peak night activity."}]'::jsonb, array['Most slug and snail species are decomposers or wildlife food; eradication is neither practical nor desirable.','Do not use unproven sharp or irritating barriers where they may harm people, pets, or wildlife.']::text[])
) as seed(slug, category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings)
join public.content_items content on content.slug = seed.slug and content.content_type = 'problem'
on conflict (content_id) do nothing;

insert into public.problem_plant_links (problem_content_id, plant_content_id)
select problem.id, plant.id
from (values
  ('spider-mites-container-plants', 'cherry-tomato'),
  ('spider-mites-container-plants', 'genovese-basil'),
  ('spider-mites-container-plants', 'balcony-strawberry'),
  ('spider-mites-container-plants', 'flat-leaf-parsley-container'),
  ('spider-mites-container-plants', 'spearmint-container'),
  ('spider-mites-container-plants', 'compact-sweet-pepper-container'),
  ('spider-mites-container-plants', 'patio-cucumber-container'),
  ('whitefly-edible-container-plants', 'cherry-tomato'),
  ('whitefly-edible-container-plants', 'genovese-basil'),
  ('whitefly-edible-container-plants', 'compact-sweet-pepper-container'),
  ('whitefly-edible-container-plants', 'patio-cucumber-container'),
  ('root-rot-waterlogged-containers', 'cherry-tomato'),
  ('root-rot-waterlogged-containers', 'genovese-basil'),
  ('root-rot-waterlogged-containers', 'balcony-strawberry'),
  ('root-rot-waterlogged-containers', 'container-radish'),
  ('root-rot-waterlogged-containers', 'container-leaf-lettuce'),
  ('root-rot-waterlogged-containers', 'baby-spinach-containers'),
  ('root-rot-waterlogged-containers', 'dwarf-french-bean-container'),
  ('root-rot-waterlogged-containers', 'dwarf-mangetout-pea-container'),
  ('root-rot-waterlogged-containers', 'container-chives'),
  ('root-rot-waterlogged-containers', 'flat-leaf-parsley-container'),
  ('root-rot-waterlogged-containers', 'spearmint-container'),
  ('root-rot-waterlogged-containers', 'container-thyme'),
  ('root-rot-waterlogged-containers', 'container-rosemary'),
  ('root-rot-waterlogged-containers', 'compact-sweet-pepper-container'),
  ('root-rot-waterlogged-containers', 'patio-cucumber-container'),
  ('blossom-end-rot-containers', 'cherry-tomato'),
  ('blossom-end-rot-containers', 'compact-sweet-pepper-container'),
  ('rust-pustules-edible-plants', 'baby-spinach-containers'),
  ('rust-pustules-edible-plants', 'dwarf-french-bean-container'),
  ('rust-pustules-edible-plants', 'container-chives'),
  ('rust-pustules-edible-plants', 'spearmint-container'),
  ('slug-snail-seedling-damage', 'container-radish'),
  ('slug-snail-seedling-damage', 'container-leaf-lettuce'),
  ('slug-snail-seedling-damage', 'baby-spinach-containers'),
  ('slug-snail-seedling-damage', 'dwarf-french-bean-container'),
  ('slug-snail-seedling-damage', 'dwarf-mangetout-pea-container'),
  ('slug-snail-seedling-damage', 'container-chives'),
  ('slug-snail-seedling-damage', 'flat-leaf-parsley-container'),
  ('slug-snail-seedling-damage', 'patio-cucumber-container')
) as relation(problem_slug, plant_slug)
join public.content_items problem on problem.slug = relation.problem_slug and problem.content_type = 'problem'
join public.content_items plant on plant.slug = relation.plant_slug and plant.content_type = 'plant'
on conflict do nothing;

insert into public.content_workflows (
  content_id, author_id, reviewer_id, review_state, review_notes, approved_at
)
select
  content.id, author.id, reviewer.id, 'approved',
  'Launch batch two: original source-informed content reviewed for practical scope, cautious diagnostic language, and structured public presentation.',
  content.published_at
from public.content_items content
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where content.slug in (
  'container-leaf-lettuce', 'baby-spinach-containers', 'dwarf-french-bean-container',
  'dwarf-mangetout-pea-container', 'container-chives', 'flat-leaf-parsley-container',
  'spearmint-container', 'container-thyme', 'container-rosemary',
  'compact-sweet-pepper-container', 'patio-cucumber-container',
  'spider-mites-container-plants', 'whitefly-edible-container-plants',
  'root-rot-waterlogged-containers', 'blossom-end-rot-containers',
  'rust-pustules-edible-plants', 'slug-snail-seedling-damage'
)
on conflict (content_id) do update set
  author_id = excluded.author_id,
  reviewer_id = excluded.reviewer_id,
  review_state = excluded.review_state,
  review_notes = excluded.review_notes,
  approved_at = excluded.approved_at;
