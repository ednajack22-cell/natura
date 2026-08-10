update public.content_items set body = body || jsonb_build_object(
  'overview', 'Compact cherry tomatoes reward consistent watering, a large container, and the sunniest position you can offer.',
  'category', 'Vegetable', 'botanical_name', 'Solanum lycopersicum var. cerasiforme', 'difficulty', 'Moderate',
  'sunlight', '6–8 hours', 'pot_size', '20–30 L', 'watering', 'Deep and regular', 'harvest', '60–80 days',
  'season', 'Late spring to early autumn', 'image', '/images/cherry-tomato.png',
  'image_alt', 'A compact cherry tomato plant fruiting in a terracotta container',
  'suitable_for', jsonb_build_array('Sunny balconies', 'Patios', 'Large containers'),
  'care', jsonb_build_array(
    jsonb_build_object('title','Give it real sun','text','Choose the warmest position available, with at least six hours of direct light. Rotate the pot weekly if light arrives from one side.'),
    jsonb_build_object('title','Use a generous container','text','One plant needs a pot of at least 20 litres, drainage holes, and a stable support installed at planting time.'),
    jsonb_build_object('title','Keep moisture even','text','Water deeply when the top layer begins to dry. Large swings between dry and soaked soil can split fruit and stress roots.'),
    jsonb_build_object('title','Feed after flowering','text','Once flowers appear, use a balanced tomato feed according to its label. More fertiliser is not always better.')
  ),
  'watch_for', jsonb_build_array(
    jsonb_build_object('title','Leaf curl','text','Often linked to heat or irregular watering. Check moisture and recent conditions before treating for pests.'),
    jsonb_build_object('title','Blossom-end rot','text','A dark patch at the fruit base is commonly associated with inconsistent moisture affecting calcium uptake.')
  ),
  'navigation', jsonb_build_object('section','grow','subsection','vegetables')
) where content_type = 'plant' and slug = 'cherry-tomato';

update public.content_items set body = body || jsonb_build_object(
  'overview', 'Basil grows quickly when warmth, bright light, and steady moisture come together—and regular harvesting keeps it productive.',
  'category', 'Herb', 'botanical_name', 'Ocimum basilicum ''Genovese''', 'difficulty', 'Easy',
  'sunlight', '4–6 hours', 'pot_size', '3–5 L', 'watering', 'Evenly moist', 'harvest', '30–45 days',
  'season', 'Warm months or indoors', 'image', '/images/genovese-basil.png',
  'image_alt', 'A lush Genovese basil plant in an ivory ceramic pot by a window',
  'suitable_for', jsonb_build_array('Windowsills', 'Sheltered balconies', 'Kitchen gardens'),
  'care', jsonb_build_array(
    jsonb_build_object('title','Prioritise warmth','text','Basil dislikes cold nights and draughts. Keep it above 15°C and away from cold glass in winter.'),
    jsonb_build_object('title','Water the compost','text','Water at soil level when the surface starts to dry, then let excess water drain fully.'),
    jsonb_build_object('title','Harvest from the top','text','Pinch stems just above a pair of leaves. This encourages branching and a fuller plant.'),
    jsonb_build_object('title','Remove flower buds','text','If leaves are your priority, pinch out early flower spikes so the plant keeps producing tender growth.')
  ),
  'watch_for', jsonb_build_array(
    jsonb_build_object('title','Drooping leaves','text','Check the compost first. Basil can wilt from both thirst and waterlogged roots.'),
    jsonb_build_object('title','Pale growth','text','Low light, exhausted compost, or overcrowded supermarket pots are common causes.')
  ),
  'navigation', jsonb_build_object('section','grow','subsection','herbs')
) where content_type = 'plant' and slug = 'genovese-basil';

update public.content_items set body = body || jsonb_build_object(
  'overview', 'Strawberries suit compact spaces beautifully, provided their crowns stay above the soil and their roots never sit in water.',
  'category', 'Fruit', 'botanical_name', 'Fragaria × ananassa', 'difficulty', 'Easy',
  'sunlight', '6+ hours', 'pot_size', '3 L per plant', 'watering', 'Regular at soil level', 'harvest', '12–16 weeks',
  'season', 'Spring to midsummer', 'image', '/images/balcony-strawberry.png',
  'image_alt', 'A fruiting strawberry plant in a weathered terracotta bowl on a balcony',
  'suitable_for', jsonb_build_array('Balcony ledges', 'Hanging baskets', 'Window boxes'),
  'care', jsonb_build_array(
    jsonb_build_object('title','Keep crowns clear','text','Plant with the crown—the point where leaves meet roots—level with the surface, never buried.'),
    jsonb_build_object('title','Aim for morning sun','text','Six hours of light supports flowering and flavour. In very hot climates, light afternoon shade can reduce stress.'),
    jsonb_build_object('title','Water without soaking fruit','text','Direct water to the compost and maintain even moisture while berries are swelling.'),
    jsonb_build_object('title','Protect the harvest','text','Lift fruit away from wet compost and use a light mesh if birds regularly visit your balcony.')
  ),
  'watch_for', jsonb_build_array(
    jsonb_build_object('title','Grey mould','text','Remove affected fruit, improve airflow, and avoid wetting leaves and berries late in the day.'),
    jsonb_build_object('title','Few flowers','text','Too much nitrogen, too little light, or immature plants can delay flowering.')
  ),
  'navigation', jsonb_build_object('section','grow','subsection','fruit')
) where content_type = 'plant' and slug = 'balcony-strawberry';
