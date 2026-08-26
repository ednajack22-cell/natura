-- Complete the launch collection with four practical guides and two
-- independent, research-based comparisons.

update public.content_items
set body = body || jsonb_build_object(
  'sources', jsonb_build_array(
    jsonb_build_object('title', 'RHS - Growing herbs in containers', 'url', 'https://www.rhs.org.uk/herbs/containers'),
    jsonb_build_object('title', 'Penn State Extension - Container vegetable gardening', 'url', 'https://extension.psu.edu/container-vegetable-gardening-four-keys-to-success')
  )
), updated_at = now()
where slug = 'start-balcony-herb-garden' and content_type = 'guide';

insert into public.content_items (
  content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at
)
values
  (
    'guide', 'published', 'Sow a cut-and-come-again salad trough', 'sow-cut-and-come-again-salad-trough',
    'Set up a shallow edible trough with loose-leaf lettuce, spinach, and radish, then sow in small batches for repeated cool-season harvests.',
    jsonb_build_object(
      'overview', 'A productive salad trough is a timing project more than a packing exercise. Use a container deeper than 15 centimetres, preserve drainage, sow thinly, and leave part of the surface unsown so the next small batch can follow.',
      'navigation', jsonb_build_object('section', 'small-space-gardening', 'subsection', 'container'),
      'sources', jsonb_build_array(
        jsonb_build_object('title', 'RHS - Baby salad leaves in a pot', 'url', 'https://www.rhs.org.uk/advice/grow-your-own/containers/april-edible-container-idea/march-edible-container-idea'),
        jsonb_build_object('title', 'RHS - Vegetables in containers', 'url', 'https://www.rhs.org.uk/vegetables/containers')
      ),
      'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'how to grow a salad trough', 'supporting_keywords', jsonb_build_array('cut and come again salad container', 'lettuce spinach radish trough', 'succession sowing salad leaves'), 'search_intent', 'how-to')
    ),
    'How to Grow a Cut-and-Come-Again Salad Trough',
    'Build a salad trough with lettuce, spinach, and radish using practical guidance on depth, drainage, thin sowing, succession, moisture, and repeated harvests.',
    now()
  ),
  (
    'guide', 'published', 'Plant a Mediterranean herb container', 'plant-mediterranean-herb-container',
    'Combine rosemary and thyme in a sunny, free-draining container while keeping mint and moisture-loving herbs in separate pots.',
    jsonb_build_object(
      'overview', 'Mediterranean herbs share a preference for direct light and drainage, but they still need enough root space. Rosemary provides structure and thyme can occupy the edge; vigorous mint and thirstier herbs belong in separate containers.',
      'navigation', jsonb_build_object('section', 'small-space-gardening', 'subsection', 'container'),
      'sources', jsonb_build_array(
        jsonb_build_object('title', 'RHS - Mediterranean herbs in a pot', 'url', 'https://www.rhs.org.uk/advice/grow-your-own/containers/june-edible-container-idea'),
        jsonb_build_object('title', 'RHS - Growing herbs in containers', 'url', 'https://www.rhs.org.uk/herbs/containers')
      ),
      'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'Mediterranean herb container', 'supporting_keywords', jsonb_build_array('rosemary thyme container', 'sunny herb pot drainage', 'herbs with similar watering needs'), 'search_intent', 'how-to')
    ),
    'How to Plant a Mediterranean Herb Container',
    'Plant rosemary and thyme in a sunny Mediterranean herb container with guidance on drainage, spacing, compatible watering, harvesting, and winter wet.',
    now()
  ),
  (
    'guide', 'published', 'Sow dwarf beans and peas in containers', 'sow-dwarf-beans-and-peas-containers',
    'Plan warm-season dwarf French beans and cool-season mangetout peas as separate container crops with suitable depth, spacing, and support.',
    jsonb_build_object(
      'overview', 'Beans and peas are both legumes, but they should not be treated as one sowing. Dwarf peas prefer a cool start and low support, while French beans need warmer conditions after frost risk has passed. Separate containers make timing and watering easier.',
      'navigation', jsonb_build_object('section', 'small-space-gardening', 'subsection', 'container'),
      'sources', jsonb_build_array(
        jsonb_build_object('title', 'RHS - How to grow French beans', 'url', 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own'),
        jsonb_build_object('title', 'RHS - How to grow peas', 'url', 'https://www.rhs.org.uk/vegetables/peas/grow-your-own'),
        jsonb_build_object('title', 'RHS - Vegetables in containers', 'url', 'https://www.rhs.org.uk/vegetables/containers')
      ),
      'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'dwarf beans and peas in containers', 'supporting_keywords', jsonb_build_array('dwarf French bean pot', 'mangetout pea container support', 'container legumes small space'), 'search_intent', 'how-to')
    ),
    'Growing Dwarf Beans and Peas in Containers',
    'Grow dwarf French beans and mangetout peas in separate containers with practical advice on timing, pot size, spacing, support, moisture, and harvest.',
    now()
  ),
  (
    'guide', 'published', 'Set up warm-season fruiting containers', 'set-up-warm-season-fruiting-containers',
    'Prepare separate large containers for tomato, sweet pepper, and patio cucumber with secure supports, reliable drainage, and a measured care routine.',
    jsonb_build_object(
      'overview', 'Tomatoes, peppers, and cucumbers need warmth and direct light, but each plant should have its own adequate root volume. Install supports before growth becomes heavy, preserve safe drainage, and make moisture checks more frequent as flowers and fruits develop.',
      'navigation', jsonb_build_object('section', 'small-space-gardening', 'subsection', 'balcony'),
      'sources', jsonb_build_array(
        jsonb_build_object('title', 'RHS - How to grow cucumbers', 'url', 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own'),
        jsonb_build_object('title', 'RHS - How to grow sweet peppers', 'url', 'https://www.rhs.org.uk/vegetables/peppers/grow-your-own'),
        jsonb_build_object('title', 'Penn State Extension - Container vegetable gardening', 'url', 'https://extension.psu.edu/container-vegetable-gardening-four-keys-to-success')
      ),
      'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'warm season vegetables in containers', 'supporting_keywords', jsonb_build_array('tomato pepper cucumber pots', 'fruiting crop container setup', 'balcony vegetable support'), 'search_intent', 'how-to')
    ),
    'Warm-Season Fruiting Containers for Balconies',
    'Set up tomato, pepper, and patio cucumber containers with guidance on root volume, drainage, supports, warmth, watering, feeding, and balcony safety.',
    now()
  )
on conflict (slug) do nothing;

insert into public.guide_profiles (
  content_id, guide_type, difficulty, estimated_time_minutes, audience,
  prerequisites, materials, steps, tips, warnings
)
select content.id, seed.guide_type, seed.difficulty, seed.estimated_time_minutes, seed.audience,
  seed.prerequisites, seed.materials, seed.steps, seed.tips, seed.warnings
from (values
  (
    'sow-cut-and-come-again-salad-trough', 'container', 'easy', 35,
    'Beginner gardeners with a cool bright balcony, windowsill, or patio and space for one draining trough.',
    array['Confirm four or more hours of useful light','Choose a cool planting window','Confirm drainage will not affect neighbours below']::text[],
    array['Trough at least 15 cm deep with drainage holes','Peat-free multipurpose growing mix','Lettuce, spinach, and radish seed','Fine-rose watering can','Labels and clean scissors']::text[],
    '[{"title":"Divide the surface into sowing zones","text":"Mark three crop zones and reserve one short section for a later sowing rather than filling every centimetre at once."},{"title":"Pre-moisten and level the mix","text":"Fill below the rim, moisten evenly, and lightly firm the surface without compressing the full root zone."},{"title":"Sow each crop to its label","text":"Scatter small salad seed thinly and sow radish at the packet depth and spacing; label every zone with the date."},{"title":"Thin and inspect seedlings","text":"Remove crowded seedlings early, check for slug feeding and saturated patches, and direct water below stronger leaves."},{"title":"Harvest and resow in sequence","text":"Pick outer leaves or cut a small zone above the growing point, pull radishes promptly, and use the reserved space for the next batch."}]'::jsonb,
    array['A small batch every two weeks is easier to use than one large simultaneous crop','Move the trough out of severe afternoon heat when practical','Record sowing and first harvest dates for the next cycle']::text[],
    array['Do not eat unidentified seedlings or decorative plants mixed into the trough','Use only clean containers and growing media suitable for edible crops']::text[]
  ),
  (
    'plant-mediterranean-herb-container', 'container', 'easy', 40,
    'Small-space gardeners with a sunny sheltered position for a perennial herb container.',
    array['Observe at least six hours of direct light','Confirm the container can drain freely','Choose a stable location before filling']::text[],
    array['Container at least 30 cm wide with drainage holes','Peat-free free-draining growing mix','One young rosemary plant','One or two thyme plants','Watering can and clean secateurs']::text[],
    '[{"title":"Keep incompatible herbs separate","text":"Reserve mint, parsley, and other moisture-loving herbs for different pots so one watering pattern does not stress every plant."},{"title":"Position the structural plant","text":"Place rosemary slightly off-centre at the same depth as its nursery pot, leaving room for air and future growth."},{"title":"Add thyme around the edge","text":"Space thyme without burying stems and keep the final growing-mix level below the container rim."},{"title":"Water once and verify drainage","text":"Water thoroughly after planting, confirm surplus water exits, and never leave the container standing in a full saucer."},{"title":"Build a restrained care rhythm","text":"Let the surface partly dry, harvest green shoots lightly, and protect the container from prolonged cold winter wet."}]'::jsonb,
    array['Place the pot where harvested sprigs are easy to reach','Rotate only when one-sided light creates uneven growth','Replace or divide crowded plants before the container becomes woody and congested']::text[],
    array['A heavy filled container may exceed safe balcony loading or be difficult to move','Do not drill or fix supports into building fabric without permission and suitable expertise']::text[]
  ),
  (
    'sow-dwarf-beans-and-peas-containers', 'seasonal', 'moderate', 50,
    'Container gardeners who want two compact legume crops in their appropriate seasons.',
    array['Choose dwarf cultivars suitable for containers','Plan peas for cool conditions and beans after frost','Provide separate containers for each crop']::text[],
    array['One 45 cm wide pea container','One 30-45 cm wide bean container','Peat-free multipurpose growing mix','Low twiggy support or netting for peas','Seeds, labels, and watering can']::text[],
    '[{"title":"Schedule the crops separately","text":"Sow dwarf mangetout in the cool part of the season and wait for reliably warm conditions before sowing French beans."},{"title":"Install pea support first","text":"Anchor low twiggy sticks or suitable netting before sowing so later work does not disturb roots."},{"title":"Sow to crop-specific depth","text":"Follow the packet, keep pea and bean labels distinct, and sow a small backup rather than overcrowding the final pot."},{"title":"Maintain moisture through flowering","text":"Check containers at root depth and avoid severe drying once flowers and pods are forming."},{"title":"Harvest little and often","text":"Pick flat mangetout and slim bean pods every few days, recording which sowing window produced a useful crop."}]'::jsonb,
    array['Dwarf beans usually need no tall support','Pea harvests from one container will be modest','A later salad sowing can reuse the pea container after harvest']::text[],
    array['Secure all supports against wind without attaching them unsafely to railings','Do not sow tender beans outside solely by calendar date; use actual local frost and temperature conditions']::text[]
  ),
  (
    'set-up-warm-season-fruiting-containers', 'balcony', 'moderate', 75,
    'Gardeners with a warm sunny outdoor space who can manage three separate large containers.',
    array['Measure at least six hours of direct light','Confirm local frost risk has passed','Check building rules, load, wind, and drainage routes']::text[],
    array['Separate large containers for tomato, pepper, and cucumber','Peat-free container growing mix','Stable tomato support and cucumber trellis','Pot feet where appropriate','Watering can and labelled crop feed']::text[],
    '[{"title":"Place empty containers first","text":"Choose reachable sheltered positions and verify stability, access, and safe drainage before adding growing mix."},{"title":"Install permanent supports","text":"Anchor tomato and cucumber supports inside stable containers before roots and vines make later adjustment difficult."},{"title":"Plant without burying crowns or stems","text":"Follow the crop profile, preserve each root ball, and keep the final level below the rim for effective watering."},{"title":"Verify the first drainage cycle","text":"Water each pot thoroughly once, confirm free outflow, and correct blocked holes or standing outer pots immediately."},{"title":"Increase observation as fruit develops","text":"Check moisture more often during heat and fruiting, feed only to the product label, and harvest before fruit becomes overmature."}]'::jsonb,
    array['Use the largest practical movable pot rather than several undersized ones','Keep watering records during the first hot week','Inspect leaf undersides and fruit ends before choosing a pest or nutrient response']::text[],
    array['Natura cannot verify balcony structural load, waterproofing, fixings, wind risk, or permission','Never allow runoff to create a slip hazard or fall onto people and property below']::text[]
  )
) as seed(slug, guide_type, difficulty, estimated_time_minutes, audience, prerequisites, materials, steps, tips, warnings)
join public.content_items content on content.slug = seed.slug and content.content_type = 'guide'
on conflict (content_id) do nothing;

insert into public.guide_plant_links (guide_content_id, plant_content_id)
select guide.id, plant.id
from (values
  ('start-balcony-herb-garden', 'genovese-basil'),
  ('start-balcony-herb-garden', 'container-chives'),
  ('start-balcony-herb-garden', 'flat-leaf-parsley-container'),
  ('start-balcony-herb-garden', 'spearmint-container'),
  ('start-balcony-herb-garden', 'container-thyme'),
  ('start-balcony-herb-garden', 'container-rosemary'),
  ('sow-cut-and-come-again-salad-trough', 'container-leaf-lettuce'),
  ('sow-cut-and-come-again-salad-trough', 'baby-spinach-containers'),
  ('sow-cut-and-come-again-salad-trough', 'container-radish'),
  ('plant-mediterranean-herb-container', 'container-thyme'),
  ('plant-mediterranean-herb-container', 'container-rosemary'),
  ('sow-dwarf-beans-and-peas-containers', 'dwarf-french-bean-container'),
  ('sow-dwarf-beans-and-peas-containers', 'dwarf-mangetout-pea-container'),
  ('set-up-warm-season-fruiting-containers', 'cherry-tomato'),
  ('set-up-warm-season-fruiting-containers', 'compact-sweet-pepper-container'),
  ('set-up-warm-season-fruiting-containers', 'patio-cucumber-container')
) as relation(guide_slug, plant_slug)
join public.content_items guide on guide.slug = relation.guide_slug and guide.content_type = 'guide'
join public.content_items plant on plant.slug = relation.plant_slug and plant.content_type = 'plant'
on conflict do nothing;

insert into public.content_items (
  content_type, status, title, slug, excerpt, body, seo_title, seo_description, published_at
)
values
  (
    'review', 'published', 'Balcony container materials compared', 'balcony-container-materials-comparison',
    'Compare recycled plastic, unglazed terracotta, and glazed ceramic containers through moisture, movement, heat, durability, and maintenance constraints.',
    jsonb_build_object(
      'overview', 'Container material changes watering frequency, total moving weight, temperature response, and winter care, but it cannot compensate for poor size or blocked drainage. This research-based comparison covers material formats rather than specific products.',
      'navigation', jsonb_build_object('section', 'reviews', 'subsection', 'containers'),
      'sources', jsonb_build_array(
        jsonb_build_object('title', 'Illinois Extension - Container material choices', 'url', 'https://extension.illinois.edu/container-gardens/container-material-choices'),
        jsonb_build_object('title', 'RHS - Growing plants in containers', 'url', 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers'),
        jsonb_build_object('title', 'Penn State Extension - Container vegetable gardening', 'url', 'https://extension.psu.edu/container-vegetable-gardening-four-keys-to-success')
      ),
      'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'balcony container materials comparison', 'supporting_keywords', jsonb_build_array('terracotta vs plastic plant pots', 'best pot material balcony', 'glazed ceramic container drainage'), 'search_intent', 'comparison')
    ),
    'Balcony Container Materials Compared',
    'Compare recycled plastic, terracotta, and glazed ceramic pots for balcony growing, including moisture, weight, heat, stability, durability, and maintenance.',
    now()
  ),
  (
    'review', 'published', 'Vegetable starting methods compared', 'vegetable-starting-methods-comparison',
    'Compare direct sowing, module-raised seedlings, and purchased transplants by crop suitability, root disturbance, timing, equipment, cost, and recovery options.',
    jsonb_build_object(
      'overview', 'No starting method is best for every vegetable. Direct sowing protects sensitive roots and reduces equipment, modules improve timing control for selected crops, and purchased transplants reduce setup while narrowing cultivar choice. This is a researched method comparison, not a controlled crop trial.',
      'navigation', jsonb_build_object('section', 'reviews', 'subsection', 'seeds'),
      'sources', jsonb_build_array(
        jsonb_build_object('title', 'RHS - Seed-sowing techniques', 'url', 'https://www.rhs.org.uk/advice/beginners-guide/vegetable-basics/soil-preparation/seed-sowing-techniques'),
        jsonb_build_object('title', 'RHS - Vegetable seeds and sowing', 'url', 'https://www.rhs.org.uk/vegetables/seeds-sowing'),
        jsonb_build_object('title', 'Penn State Extension - Seeds or transplants?', 'url', 'https://extension.psu.edu/starting-your-summer-vegetable-garden-seeds-or-transplants')
      ),
      'seo_keyword_strategy', jsonb_build_object('focus_keyword', 'direct sowing vs transplants', 'supporting_keywords', jsonb_build_array('seed modules comparison', 'buy vegetable transplants', 'best way to start vegetables'), 'search_intent', 'comparison')
    ),
    'Direct Sowing vs Modules vs Transplants',
    'Compare direct sowing, module seedlings, and purchased vegetable transplants by crop fit, root disturbance, timing, space, cost, and recovery options.',
    now()
  )
on conflict (slug) do nothing;

insert into public.review_profiles (
  content_id, review_type, category, evidence_level, methodology, testing_period,
  disclosure_type, disclosure_text, verdict, best_for
)
select content.id, 'comparison', seed.category, 'researched', seed.methodology, 'Research reviewed in August 2026',
  'independent', 'Natura has no commercial relationship with the options compared. No product was supplied, no affiliate link is included, and no purchase is required to use this comparison.',
  seed.verdict, seed.best_for
from (values
  (
    'balcony-container-materials-comparison', 'containers',
    'We compared three common container material formats against five balcony-specific criteria using horticultural guidance on porosity, weight, temperature, durability, and maintenance. Scores describe predictable format characteristics; Natura did not run a controlled growing trial or assess individual brands.',
    'Light-coloured recycled plastic is the most flexible all-round format where movement and moisture retention matter. Glazed ceramic suits a stable permanent position. Unglazed terracotta is useful for plants that tolerate quicker drying, but it increases watering demand and needs winter protection.',
    array['Balconies where filled pots may need moving','Gardeners balancing watering effort and stability','Choosing a format before comparing individual products']::text[]
  ),
  (
    'vegetable-starting-methods-comparison', 'seeds',
    'We compared three vegetable-starting methods against five criteria using extension and horticultural guidance. Scores reflect method-level tradeoffs and crop suitability; they are not germination rates, yield predictions, local planting dates, or results from a controlled Natura trial.',
    'Direct sowing is the best default for radish, beans, peas, and many quick crops when conditions are suitable. Modules add timing control for selected crops, while purchased transplants offer convenience for warm long-season plants such as peppers and tomatoes.',
    array['Beginners choosing between seed and young plants','Small spaces with limited indoor propagation room','Matching a starting method to the crop rather than habit']::text[]
  )
) as seed(slug, category, methodology, verdict, best_for)
join public.content_items content on content.slug = seed.slug and content.content_type = 'review'
on conflict (content_id) do nothing;

insert into public.review_criteria (review_content_id, name, description, weight, sort_order)
select review.id, seed.name, seed.description, seed.weight, seed.sort_order
from (values
  ('balcony-container-materials-comparison', 'Moisture stability', 'How the material changes evaporation and the frequency of root-zone checks.', 25::numeric, 1::smallint),
  ('balcony-container-materials-comparison', 'Movement and weight', 'How practical the filled format is to position, rotate, shelter, or remove.', 20::numeric, 2::smallint),
  ('balcony-container-materials-comparison', 'Heat and wind fit', 'How the format handles direct sun, temperature swings, and exposed positions.', 20::numeric, 3::smallint),
  ('balcony-container-materials-comparison', 'Durability', 'Expected resistance to impact, sunlight, frost, and repeated seasonal use.', 20::numeric, 4::smallint),
  ('balcony-container-materials-comparison', 'Maintenance and cost', 'Cleaning, winter care, replacement risk, availability, and typical entry cost.', 15::numeric, 5::smallint),
  ('vegetable-starting-methods-comparison', 'Crop suitability', 'How many launch crops fit the method without avoidable root or timing problems.', 30::numeric, 1::smallint),
  ('vegetable-starting-methods-comparison', 'Root protection', 'How well the method avoids transplant shock or disturbance to the harvested root.', 20::numeric, 2::smallint),
  ('vegetable-starting-methods-comparison', 'Timing control', 'Ability to start around cold conditions and establish a usable planting window.', 20::numeric, 3::smallint),
  ('vegetable-starting-methods-comparison', 'Space and equipment', 'Indoor space, trays, lighting, hardening-off work, and storage required.', 15::numeric, 4::smallint),
  ('vegetable-starting-methods-comparison', 'Cost and recovery', 'Entry cost, seed choice, backup capacity, and ease of replacing a failed start.', 15::numeric, 5::smallint)
) as seed(review_slug, name, description, weight, sort_order)
join public.content_items review on review.slug = seed.review_slug and review.content_type = 'review'
where not exists (
  select 1 from public.review_criteria existing
  where existing.review_content_id = review.id and existing.name = seed.name
);

insert into public.review_products (
  review_content_id, name, brand, model, price_note, verdict_label, overall_score,
  pros, cons, specifications, is_recommended, sort_order
)
select review.id, seed.name, '', '', seed.price_note, seed.verdict_label, seed.overall_score,
  seed.pros, seed.cons, seed.specifications, seed.is_recommended, seed.sort_order
from (values
  ('balcony-container-materials-comparison', 'Light-coloured recycled plastic', 'Usually the lowest to mid-range entry cost', 'Most flexible all-round format', 8.2::numeric, array['Light enough to move before extreme weather','Retains moisture longer than porous clay','Available in many useful sizes']::text[], array['Can degrade in prolonged sunlight','Dark versions may heat the root zone','End-of-life recycling varies locally']::text[], '{"Porosity":"Non-porous","Movement":"Light before filling","Winter care":"Inspect for brittleness and damage"}'::jsonb, true, 1::smallint),
  ('balcony-container-materials-comparison', 'Unglazed terracotta', 'Mid-range, with large high-quality pots costing more', 'Best for faster-drying conditions', 6.5::numeric, array['Porous wall allows faster drying','Stable feel in moderate sizes','Long service life when protected']::text[], array['Needs more frequent watering','Can crack after freezing when wet','Heavier and breakable']::text[], '{"Porosity":"High","Movement":"Moderate to heavy","Winter care":"Dry and protect from frost"}'::jsonb, false, 2::smallint),
  ('balcony-container-materials-comparison', 'Glazed ceramic or stoneware', 'Often the highest initial cost', 'Best for a stable permanent position', 7.4::numeric, array['Lower water loss than unglazed clay','Good stability in sheltered positions','Durable finish when frost-safe']::text[], array['Heavy and difficult to relocate','Can chip or crack on impact','Drainage holes must be checked carefully']::text[], '{"Porosity":"Low when fully glazed","Movement":"Heavy","Winter care":"Follow frost-rating and drainage guidance"}'::jsonb, false, 3::smallint),
  ('vegetable-starting-methods-comparison', 'Direct sowing in the final container', 'Lowest equipment cost when seed is available', 'Best default for roots and quick crops', 8.4::numeric, array['No transplant shock','Low equipment and compost use','Easy to resow a failed small batch']::text[], array['Weather and pests affect emergence','Tender crops may start too late','Requires careful thinning and moisture']::text[], '{"Best examples":"Radish, beans, peas, salad leaves","Main requirement":"Suitable final-container temperature","Backup":"Reserve seed for a second sowing"}'::jsonb, true, 1::smallint),
  ('vegetable-starting-methods-comparison', 'Module-raised seedlings', 'Moderate cost for trays, mix, and suitable light', 'Best for timing control', 7.6::numeric, array['Starts selected crops under protection','Uses modules efficiently','Provides backup plants before final spacing']::text[], array['Needs bright indoor or protected space','Requires hardening off','Poor handling can disturb roots']::text[], '{"Best examples":"Lettuce, selected herbs, backup cucumbers","Main requirement":"Bright controlled growing space","Backup":"Raise one or two spare modules"}'::jsonb, false, 2::smallint),
  ('vegetable-starting-methods-comparison', 'Purchased young transplants', 'Highest per-plant cost but minimal propagation equipment', 'Best for convenience and long-season crops', 7.5::numeric, array['Reduces indoor seed-starting work','Offers an established plant immediately','Useful where the growing season is short']::text[], array['Narrower cultivar choice','Quality and hardening history vary','Failed plants cost more to replace']::text[], '{"Best examples":"Tomato, pepper, selected herbs","Main requirement":"Healthy suitable plant from a trusted source","Backup":"Inspect before purchase and acclimatise"}'::jsonb, false, 3::smallint)
) as seed(review_slug, name, price_note, verdict_label, overall_score, pros, cons, specifications, is_recommended, sort_order)
join public.content_items review on review.slug = seed.review_slug and review.content_type = 'review'
where not exists (
  select 1 from public.review_products existing
  where existing.review_content_id = review.id and existing.name = seed.name
);

insert into public.review_product_scores (product_id, criterion_id, score, note)
select product.id, criterion.id,
  case review.slug
    when 'balcony-container-materials-comparison' then
      case product.sort_order
        when 1 then (array[8.5, 9.0, 7.5, 7.5, 8.5])[criterion.sort_order]
        when 2 then (array[5.5, 6.5, 7.0, 6.5, 7.5])[criterion.sort_order]
        else (array[8.0, 5.5, 8.0, 8.0, 6.5])[criterion.sort_order]
      end
    else
      case product.sort_order
        when 1 then (array[8.0, 10.0, 6.0, 9.0, 9.0])[criterion.sort_order]
        when 2 then (array[8.0, 7.0, 9.0, 5.5, 7.0])[criterion.sort_order]
        else (array[6.5, 8.0, 9.0, 9.0, 4.5])[criterion.sort_order]
      end
  end,
  ''
from public.review_products product
join public.content_items review on review.id = product.review_content_id
join public.review_criteria criterion on criterion.review_content_id = review.id
where review.slug in ('balcony-container-materials-comparison', 'vegetable-starting-methods-comparison')
on conflict (product_id, criterion_id) do nothing;

insert into public.content_workflows (
  content_id, author_id, reviewer_id, review_state, review_notes, approved_at
)
select content.id, author.id, reviewer.id, 'approved',
  'Launch batch three: source-visible original guidance reviewed for practical limits, comparison transparency, and public structure.',
  content.published_at
from public.content_items content
join public.editorial_contributors author on author.slug = 'natura-editorial-team'
join public.editorial_contributors reviewer on reviewer.slug = 'natura-review-desk'
where content.slug in (
  'sow-cut-and-come-again-salad-trough',
  'plant-mediterranean-herb-container',
  'sow-dwarf-beans-and-peas-containers',
  'set-up-warm-season-fruiting-containers',
  'balcony-container-materials-comparison',
  'vegetable-starting-methods-comparison'
)
on conflict (content_id) do update set
  author_id = excluded.author_id,
  reviewer_id = excluded.reviewer_id,
  review_state = excluded.review_state,
  review_notes = excluded.review_notes,
  approved_at = excluded.approved_at;
