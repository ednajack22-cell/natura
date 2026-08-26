insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values (
  'plant', 'published', 'Container radish', 'container-radish',
  'Grow crisp salad radishes in a compact container by combining cool conditions, steady moisture, loose growing mix, and timely harvesting.',
  jsonb_build_object(
    'overview', 'Grow salad radishes in containers as a quick cool-season crop. A loose growing mix, even moisture, enough space between seedlings, and harvesting as soon as roots reach a useful size help preserve their crisp texture.',
    'category', 'Vegetable', 'botanical_name', 'Raphanus sativus', 'difficulty', 'Easy',
    'sunlight', '4–6 hours', 'pot_size', '8–12 L trough', 'watering', 'Even moisture', 'harvest', '3–5 weeks',
    'season', 'Spring and late summer', 'image', '/images/container-radish.png',
    'image_alt', 'Red salad radishes growing at soil level in a weathered terracotta container on a sunny balcony',
    'suitable_for', jsonb_build_array('Balcony troughs', 'Window boxes', 'Cool-season containers'),
    'care', jsonb_build_array(
      jsonb_build_object('title', 'Sow into a loose mix', 'text', 'Use a free-draining container mix and a trough deep enough for the variety. Break up firm pockets before sowing so roots can expand evenly.'),
      jsonb_build_object('title', 'Thin early', 'text', 'Remove crowded seedlings while they are small. Radishes grown too close together often produce leaves without useful roots.'),
      jsonb_build_object('title', 'Keep moisture steady', 'text', 'Check below the surface and water before the root zone dries completely, while allowing surplus water to drain.'),
      jsonb_build_object('title', 'Harvest without delay', 'text', 'Pull a sample root once the shoulders are visible. Harvest the batch promptly when roots reach the expected size, before texture turns fibrous.')
    ),
    'watch_for', jsonb_build_array(
      jsonb_build_object('title', 'Split roots', 'text', 'Uneven moisture can contribute to cracking. Compare recent dry periods and heavy watering before changing the routine.'),
      jsonb_build_object('title', 'Leaves but few roots', 'text', 'Crowding, heat, delayed harvest, or unsuitable feeding can favour foliage over swollen roots.')
    ),
    'navigation', jsonb_build_object('section', 'grow', 'subsection', 'vegetables'),
    'sources', jsonb_build_array(
      jsonb_build_object('title', 'UMN Extension — Growing radishes in home gardens', 'url', 'https://extension.umn.edu/vegetables/growing-radishes'),
      jsonb_build_object('title', 'RHS — How to grow radishes', 'url', 'https://www.rhs.org.uk/vegetables/radishes/grow-your-own'),
      jsonb_build_object('title', 'Penn State Extension — Container Vegetable Gardening: Four Keys to Success', 'url', 'https://extension.psu.edu/container-vegetable-gardening-four-keys-to-success')
    ),
    'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'how to grow radishes in containers', 'supporting_keywords', jsonb_build_array('radish container depth', 'watering radishes in pots', 'when to harvest radishes'), 'search_intent', 'how-to')
  ),
  'How to Grow Radishes in Containers',
  'Grow radishes in containers with practical guidance on sowing depth, spacing, light, steady moisture, harvest timing, and common root problems.', now()
)
on conflict (slug) do nothing;

insert into public.plant_finder_profiles (content_id, min_sun_hours, space_types, care_level, climates, edible, match_note)
select id, 4, array['balcony', 'patio', 'windowsill', 'container'], 'regular', array['general', 'temperate', 'mediterranean', 'continental'], true,
  'A quick cool-season crop for troughs and window boxes; harvest promptly and protect the root zone from prolonged heat.'
from public.content_items where slug = 'container-radish'
on conflict (content_id) do nothing;

insert into public.content_items (content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at)
values
  ('problem', 'published', 'Wilting in container plants', 'wilting-container-plants',
   'Compare root-zone moisture, heat, drainage, and recovery time before deciding whether a wilted container plant needs water.',
   jsonb_build_object(
     'overview', 'Wilting means the leaves and stems have lost firmness, but it does not identify one cause. A dry root ball, saturated roots, temporary heat stress, transplant shock, or damaged roots can produce a similar outline, so compare moisture and timing first.',
     'navigation', jsonb_build_object('section', 'plant-care', 'subsection', 'plant-problems'),
     'sources', jsonb_build_array(
       jsonb_build_object('title', 'UMN Extension — Fertilizing and watering container plants', 'url', 'https://extension.umn.edu/gardening-minnesota/fertilizing-and-watering-container-plants'),
       jsonb_build_object('title', 'RHS — How to grow houseplants', 'url', 'https://www.rhs.org.uk/plants/types/houseplants/growing-guide')
     ),
     'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'why is my container plant wilting', 'supporting_keywords', jsonb_build_array('wilting wet soil', 'plant wilting in heat', 'dry root ball container'), 'search_intent', 'informational')
   ),
   'Why Is My Container Plant Wilting?',
   'A wilted container plant may be dry, waterlogged, overheated, or root-stressed. Compare moisture, timing, drainage, and recovery before acting.', now()),
  ('problem', 'published', 'Aphids on edible container plants', 'aphids-edible-container-plants',
   'Confirm live aphid colonies, cast skins, sticky honeydew, and distorted new growth before choosing the least disruptive response.',
   jsonb_build_object(
     'overview', 'Aphids are small sap-feeding insects that often gather on soft shoots, buds, stems, and leaf undersides. A few aphids rarely justify broad treatment; first confirm the insects, the amount of distortion, and whether natural predators are already present.',
     'navigation', jsonb_build_object('section', 'plant-care', 'subsection', 'plant-problems'),
     'sources', jsonb_build_array(
       jsonb_build_object('title', 'RHS — Aphids', 'url', 'https://www.rhs.org.uk/biodiversity/aphids'),
       jsonb_build_object('title', 'UMN Extension — Aphids in home yards and gardens', 'url', 'https://extension.umn.edu/yard-and-garden-insects/aphids')
     ),
     'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'aphids on edible container plants', 'supporting_keywords', jsonb_build_array('aphids under leaves', 'sticky honeydew plants', 'non chemical aphid control'), 'search_intent', 'informational')
   ),
   'Aphids on Edible Container Plants',
   'Identify aphids from live colonies, distorted shoots, honeydew, and cast skins, then choose proportionate non-chemical management for container plants.', now()),
  ('problem', 'published', 'Powdery mildew on balcony plants', 'powdery-mildew-balcony-plants',
   'Recognise powdery growth on leaves and review airflow, crowding, drought stress, and plant susceptibility before changing care.',
   jsonb_build_object(
     'overview', 'Powdery mildews are host-specific fungi that can leave white powdery growth on leaves and shoots. Crowding, still air, susceptible varieties, excess soft growth, and repeated drought stress can increase the problem, but similar pale marks should be inspected closely.',
     'navigation', jsonb_build_object('section', 'plant-care', 'subsection', 'plant-problems'),
     'sources', jsonb_build_array(
       jsonb_build_object('title', 'RHS — Powdery mildews: symptoms and control', 'url', 'https://www.rhs.org.uk/disease/powdery-mildews'),
       jsonb_build_object('title', 'RHS — Protecting biodiversity and plant health', 'url', 'https://www.rhs.org.uk/science/plant-health-in-gardens/protect-your-garden')
     ),
     'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'powdery mildew on balcony plants', 'supporting_keywords', jsonb_build_array('white powder on plant leaves', 'powdery mildew airflow', 'powdery mildew drought stress'), 'search_intent', 'informational')
   ),
   'Powdery Mildew on Balcony Plants',
   'Compare white powdery growth, leaf distortion, airflow, crowding, and drought stress before managing powdery mildew on balcony and container plants.', now())
on conflict (slug) do nothing;

insert into public.problem_profiles (content_id, category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings)
select content.id, seed.category, seed.urgency, seed.symptoms, seed.likely_causes, seed.verification_steps, seed.recommended_actions, seed.warnings
from (values
  ('wilting-container-plants', 'watering', 'moderate',
   array['Leaves or soft stems lose firmness', 'The pattern may improve during the cool part of the day', 'The growing mix may be very dry or remain wet for several days'],
   '[{"title":"Dry root zone","text":"A small, porous, or root-filled pot can lose available moisture quickly, especially in heat and wind."},{"title":"Saturated or damaged roots","text":"Roots in persistently wet mix may lack oxygen and become unable to supply the leaves normally."},{"title":"Temporary heat or transplant stress","text":"Strong sun, hot wind, or recent root disturbance can cause a temporary loss of firmness even when moisture is present."}]'::jsonb,
   '[{"title":"Check moisture at several depths","text":"Compare the surface, middle, and lower root zone without assuming a dry surface means a dry root ball."},{"title":"Compare timing and recovery","text":"Note whether the plant recovers in cooler conditions and whether wilting started after heat, repotting, or a watering change."},{"title":"Inspect drainage","text":"Confirm excess water can leave and that the pot is not standing in a full saucer or sealed outer container."}]'::jsonb,
   '[{"title":"Respond to the measured condition","text":"Water a genuinely dry root ball thoroughly, or pause and correct drainage when the mix is persistently wet."},{"title":"Reduce temporary stress","text":"Shelter a recently moved or heat-stressed pot while preserving appropriate light for the plant."}]'::jsonb,
   array['Do not water repeatedly without checking below the surface.', 'Rapid collapse with soft, dark tissue may require local horticultural advice or disposal of affected material.']),
  ('aphids-edible-container-plants', 'pest', 'low',
   array['Clusters of small insects on tips or leaf undersides', 'Curled or distorted young leaves', 'Sticky honeydew or white cast skins'],
   '[{"title":"Aphid colony","text":"Aphids feed on sap and often gather on young, soft growth where they can be seen directly."},{"title":"Look-alike residue or insects","text":"Cast skins, whitefly, scale insects, and harmless debris can be confused at a glance, so confirm movement and body shape."}]'::jsonb,
   '[{"title":"Inspect new growth closely","text":"Check shoot tips, buds, stems, and both leaf surfaces in good light."},{"title":"Look for honeydew and predators","text":"Sticky residue, ants, ladybirds, hoverfly larvae, or lacewing larvae help describe the wider pattern."}]'::jsonb,
   '[{"title":"Tolerate small populations where practical","text":"A few aphids are part of the garden food web and may be reduced by natural enemies."},{"title":"Remove local colonies mechanically","text":"On a manageable container plant, wipe, pinch, prune only badly distorted tips, or dislodge insects with water where runoff is safe."},{"title":"Check again before escalating","text":"Monitor new growth and avoid repeated broad treatment when the population is already falling."}]'::jsonb,
   array['Avoid broad-spectrum pesticides that can harm aphid predators and other wildlife.', 'Wash edible harvests and follow all local product labels if any regulated treatment is considered.']),
  ('powdery-mildew-balcony-plants', 'disease', 'moderate',
   array['White powdery spots or coating on leaves and shoots', 'Young leaves may curl or distort', 'The coating returns or expands after wiping'],
   '[{"title":"Powdery mildew fungi","text":"Host-specific powdery mildews grow on plant surfaces and can reduce vigour when infection is extensive."},{"title":"Conditions favouring susceptible growth","text":"Crowding, still air, excess nitrogen, and repeated drought stress can make susceptible plants more vulnerable."},{"title":"A look-alike deposit","text":"Dust, mineral residue, spray deposits, or other leaf damage may resemble a pale coating without behaving like fungal growth."}]'::jsonb,
   '[{"title":"Test the pattern","text":"Inspect both leaf surfaces and compare affected and healthy growth; note whether powdery areas spread over several days."},{"title":"Review spacing and stress","text":"Check airflow, crowding, recent dry periods, feeding, and whether the plant or variety is known to be susceptible."}]'::jsonb,
   '[{"title":"Remove limited affected material","text":"Remove badly affected leaves or shoots without stripping most of the plant, then clean tools."},{"title":"Improve the growing conditions","text":"Increase spacing and airflow, maintain steady root-zone moisture, and avoid excessive nitrogen feeding."},{"title":"Plan the next crop","text":"Where the problem repeats, choose less susceptible varieties and avoid placing vulnerable plants in still, crowded positions."}]'::jsonb,
   array['Do not use homemade sprays or fungicides without checking plant suitability, local rules, and label directions.', 'Avoid composting heavily diseased material where local guidance recommends disposal.'])
) as seed(slug, category, urgency, symptoms, likely_causes, verification_steps, recommended_actions, warnings)
join public.content_items content on content.slug = seed.slug
on conflict (content_id) do nothing;

insert into public.problem_plant_links (problem_content_id, plant_content_id)
select problem.id, plant.id
from public.content_items problem
cross join public.content_items plant
where problem.slug in ('wilting-container-plants', 'aphids-edible-container-plants', 'powdery-mildew-balcony-plants')
  and plant.slug in ('cherry-tomato', 'genovese-basil', 'balcony-strawberry', 'container-radish')
on conflict do nothing;

insert into public.content_workflows (content_id, author_id, reviewer_id, review_state, review_notes, approved_at)
select content.id, author.id, reviewer.id, 'approved', 'Launch batch one: source-informed original content reviewed for cautious language and public structure.', content.published_at
from public.content_items content
cross join public.editorial_contributors author
cross join public.editorial_contributors reviewer
where content.slug in ('container-radish', 'wilting-container-plants', 'aphids-edible-container-plants', 'powdery-mildew-balcony-plants')
  and author.slug = 'natura-editorial-team'
  and reviewer.slug = 'natura-review-desk'
on conflict (content_id) do update set reviewer_id = excluded.reviewer_id, review_state = excluded.review_state, review_notes = excluded.review_notes, approved_at = excluded.approved_at;
