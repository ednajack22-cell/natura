<?php
/**
 * Starter guides, batch 38 (grow your own food, 2): two Plant Care articles,
 * on planning a year of harvests from a few pots counted from the reader's
 * own frost dates, and on collecting and using rainwater on a balcony or
 * patio.
 *
 * Sources (all checked 24 October 2026):
 * - Planning: Colorado State University Extension, Vegetable Planting Guide
 *   (GardenNotes #720: hardy, semi-hardy, tender and very tender crops
 *   relative to the average last spring frost); University of Minnesota
 *   Extension, Planting the vegetable garden and Planting vegetables in
 *   midsummer for fall harvest (days to maturity and cold hardiness of fall
 *   crops, fertilizer before a second crop); Virginia Cooperative Extension
 *   (Virginia Tech), Fall Vegetable Gardening 426-334 (counting back from
 *   the first fall frost, fall factor, frost-tender factor, crops that may
 *   survive winter, changing crop families, cold frames); RHS, Vegetables
 *   in containers (crops that follow one another in the same pot) and
 *   Container maintenance (winter care of pots); RHS school gardening,
 *   Growing microgreens (sown all year on a windowsill); University of
 *   Minnesota Extension, Lighting for indoor plants.
 * - Rainwater: University of Minnesota Extension, Rain barrels; Colorado
 *   State University Extension, Rainwater Collection in Colorado (6.707);
 *   Texas A&M AgriLife Extension, Rainwater Harvesting (catchment area,
 *   storage, landscaping); University of Arkansas Cooperative Extension,
 *   Step-by-step rain barrel construction (weight, tipping, children,
 *   mosquito screens); RHS, Collecting, storing and reusing water; US EPA,
 *   Soak Up the Rain: Rain Barrels.
 * Timing is given by season or relative to frost dates, never by month.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

$p    = 'natura_core_demo_p';
$h2   = 'natura_core_demo_h2';
$list = 'natura_core_demo_list';

$csu_guide  = array( 'title' => 'Colorado State University Extension — Vegetable Planting Guide (GardenNotes #720)', 'url' => 'https://extension.colostate.edu/resource/vegetable-planting-guide/' );
$umn_plant  = array( 'title' => 'University of Minnesota Extension — Planting the vegetable garden', 'url' => 'https://extension.umn.edu/planting-and-growing-guides/planting-vegetable-garden' );
$umn_fall   = array( 'title' => 'University of Minnesota Extension — Planting vegetables in midsummer for fall harvest', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/planting-vegetables-in-midsummer-for-fall-harvest' );
$vt_fall    = array( 'title' => 'Virginia Cooperative Extension (Virginia Tech) — Fall Vegetable Gardening, publication 426-334', 'url' => 'https://accomack.ext.vt.edu/content/dam/pubs_ext_vt_edu/426/426-334/SPES-801.pdf' );
$rhs_cont   = array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' );
$rhs_maint  = array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' );
$rhs_micro  = array( 'title' => 'RHS — Growing microgreens (school gardening)', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/food-growing/growing-microgreens' );
$umn_light  = array( 'title' => 'University of Minnesota Extension — Lighting for indoor plants', 'url' => 'https://extension.umn.edu/planting-and-growing-guides/lighting-indoor-plants' );
$umn_rain   = array( 'title' => 'University of Minnesota Extension — Rain barrels', 'url' => 'https://extension.umn.edu/water-wisely-start-your-own-backyard/rain-barrels' );
$csu_rain   = array( 'title' => 'Colorado State University Extension — Rainwater Collection in Colorado (6.707)', 'url' => 'https://extension.colostate.edu/topic-areas/natural-resources/rainwater-collection-colorado-6-707/' );
$tamu_roof  = array( 'title' => 'Texas A&M AgriLife Extension — Rainwater Harvesting: Catchment Area', 'url' => 'https://rainwaterharvesting.tamu.edu/catchment-area/' );
$tamu_store = array( 'title' => 'Texas A&M AgriLife Extension — Rainwater Harvesting: Storage', 'url' => 'https://rainwaterharvesting.tamu.edu/storage/' );
$tamu_land  = array( 'title' => 'Texas A&M AgriLife Extension — Rainwater Harvesting: Landscaping', 'url' => 'https://rainwaterharvesting.tamu.edu/landscaping/' );
$uaex_rain  = array( 'title' => 'University of Arkansas Cooperative Extension — Step-by-step rain barrel construction', 'url' => 'https://www.uaex.uada.edu/environment-nature/water/docs/Step%20by%20step%20Rain%20Barrel%20Construction.pdf' );
$rhs_water  = array( 'title' => 'RHS — Collecting, storing and reusing water', 'url' => 'https://www.rhs.org.uk/garden-jobs/water-collecting-storing-and-using' );
$epa_rain   = array( 'title' => 'US EPA — Soak Up the Rain: Rain Barrels', 'url' => 'https://www.epa.gov/soakuptherain/soak-rain-rain-barrels' );

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Grow your own food (2)', 'natura-core' ),
	'guides' => array(
		'post' => array(
			'plan-a-year-of-harvests-small-space' => array(
				'image_prompt' => 'A sunny apartment balcony in early fall with a row of pots at different stages: a large pot of cherry tomatoes still bearing red fruit, a trough of young kale and spinach seedlings freshly sown in dark potting mix, a pot of garlic shoots, and a clear plastic cloche beside an empty pot, a paper seed packet and a pencil on a small wooden table.' . $photo_end,
				'pin_prompt'   => 'Four matching terracotta-colored plastic pots lined up on a balcony floor, showing a year of crops: crinkled green kale leaves, a bushy pea plant on a short cane, a tomato plant with red cherry tomatoes, and a tray of microgreens, soft daylight, photographed vertically from slightly above.' . $pin_end,
				'title'        => 'How to Plan a Year of Harvests in a Small Space',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'Start from your two frost dates: grow cool-season crops in spring before your last frost and again from late summer, counted back from your first fall frost, and fill the same pots with warm-season crops in between. Hardy crops carry pots through winter, and a windowsill covers the coldest weeks.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Three or four pots or troughs at least 12 in (30 cm) deep', 'note' => 'Enough to keep one crop growing while the next one goes in.', 'url' => '' ),
						array( 'name' => 'Fresh peat-free potting mix', 'note' => 'To top up or refill pots between crops.', 'url' => '' ),
						array( 'name' => 'Balanced general-purpose fertilizer', 'note' => 'Replaces the food the last crop used before you sow the next one.', 'url' => '' ),
						array( 'name' => 'Cloche or row cover', 'note' => 'Stretches the fall harvest past the first light frosts.', 'url' => '' ),
						array( 'name' => 'Notebook or garden calendar', 'note' => 'Write down your frost dates and what went into each pot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I find out my average frost dates?', 'answer' => 'Ask your state\'s Cooperative Extension service, which publishes local planting guides; University of Minnesota Extension, for example, points Midwest gardeners to the Midwestern Regional Climate Center\'s freeze-date map. Remember that the date is an average: Virginia Tech notes that real frosts move from year to year.' ),
						array( 'question' => 'Why do fall crops take longer than the days on the seed packet?', 'answer' => 'Days shorten and nights cool as fall goes on, so plants grow more slowly. Virginia Tech calls this the fall factor and adds about two weeks to the packet figure when counting back from the first fall frost.' ),
						array( 'question' => 'Which fall crops keep going after the first frost?', 'answer' => 'University of Minnesota Extension rates kale, collards and cabbage as the hardiest, coping down to about 20 °F (-7 °C). Beets, peas and green onions survive temperatures in the high 20s °F, and lettuce, spinach and Swiss chard survive a light frost. Bush beans and basil are killed by it.' ),
						array( 'question' => 'Should I follow a crop with the same crop in the same pot?', 'answer' => 'Better not. Virginia Tech suggests planting a crop from a different family from the one that grew there before, which helps you avoid some pests and diseases. Follow peas with leafy greens, for example, rather than with more peas.' ),
						array( 'question' => 'What is there to pick in the middle of winter?', 'answer' => 'Hardy leaves that came through the cold, such as kale, spinach and parsley, where your winters allow it, plus microgreens on a bright windowsill indoors. The RHS says microgreens can be sown at any time of year.' ),
					),
					'sources'  => array(
						$csu_guide,
						$umn_plant,
						$umn_fall,
						$vt_fall,
						$rhs_cont,
						$rhs_maint,
						$rhs_micro,
						$umn_light,
					),
				),
				'content'      =>
					$p( 'A few pots can give you something to pick in most seasons if each one is planned for the whole year rather than for one summer crop. The plan below works anywhere because it hangs on two dates: your average last spring frost and your average first fall frost. Sowing little and often is a different technique, covered in <a href="/succession-planting-small-spaces/">succession planting</a>; this guide is about which kind of crop fills each pot, season by season.' ) .

					$h2( 'Start with your two frost dates' ) .
					$p( 'Write down your average last spring frost and your average first fall frost. Spring sowing counts forward from the first date, and fall sowing counts back from the second. University of Minnesota Extension stresses knowing the first frost date so late crops mature before cold weather damages them. Your local Cooperative Extension office can give you both dates. Treat them as averages: Virginia Tech points out that real frosts vary from year to year with local conditions, and a sheltered balcony against a warm wall may escape a frost that hits an open yard.' ) .
					$p( 'Every <a href="/plants/">plant guide</a> on Natura has a "When to plant" section that turns these dates into weeks for that crop. Use this guide for the overall plan and the plant guides for exact timing.' ) .

					$h2( 'Sort your crops into cool and warm' ) .
					$p( 'Colorado State University Extension groups vegetables by how much cold they take, and those groups decide where each crop sits in your year:' ) .
					$list(
						array(
							'<strong>Hardy cool-season crops</strong> such as lettuce, peas, radishes, spinach, kohlrabi and turnips grow in days as cool as 40 °F (4 °C) and can go out as early as 2–4 weeks before your last spring frost.',
							'<strong>Semi-hardy cool-season crops</strong> such as beets, carrots, parsley and Swiss chard go out from 0–2 weeks before your last frost.',
							'<strong>Tender crops</strong> such as beans, cucumbers and summer squash are sown from seed around the date of your last frost.',
							'<strong>Very tender crops</strong> such as tomatoes, peppers and eggplants usually go out 2 weeks or more after your last frost, once days are reliably warm.',
						)
					) .
					$p( 'Cool-season crops prefer about 60–80 °F (16–27 °C) and lose quality in hot weather, which is why Colorado State describes them as sown in early spring and again in midsummer for a fall harvest. That gives the year its shape: cool crops at both ends, warm crops in the middle.' ) .

					$h2( 'A season-by-season plan' ) .
					$list(
						array(
							'<strong>Late winter to early spring (before your last frost):</strong> sow hardy crops outside in pots, such as <a href="/plants/peas-in-pots/">peas</a>, <a href="/plants/radishes-in-pots/">radishes</a>, <a href="/plants/spinach-in-pots/">spinach</a> and <a href="/plants/lettuce-in-pots/">lettuce</a>, and start tomatoes and peppers indoors. University of Minnesota Extension notes that cool-season crops have to mature before hot weather arrives.',
							'<strong>Around and after your last frost:</strong> as the first spring crops finish, move warm-season crops into those pots, such as a <a href="/plants/cherry-tomato/">cherry tomato</a>, <a href="/plants/bell-peppers-in-pots/">bell peppers</a>, <a href="/plants/green-beans-in-pots/">bush beans</a> and <a href="/plants/zucchini-in-pots/">zucchini</a>.',
							'<strong>Summer:</strong> warm-season crops crop and fill the space. Lettuce may bolt and turn bitter in summer heat, so University of Minnesota Extension suggests enjoying it in spring or waiting for cooler weather to sow again; see <a href="/problems/plants-bolting/">plants bolting</a>.',
							'<strong>Late summer (counted back from your first fall frost):</strong> sow a second round of cool-season crops in any pot that has come free, such as <a href="/plants/kale-in-pots/">kale</a>, spinach, <a href="/plants/beets-in-pots/">beets</a> and <a href="/plants/asian-greens-in-pots/">Asian greens</a>.',
							'<strong>Fall:</strong> pick the last tender crops before frost, harvest fall greens and plant <a href="/plants/garlic-in-pots/">garlic</a> for the following summer.',
							'<strong>Winter:</strong> hardy crops stand outside where winters allow, and a windowsill takes over for fresh leaves.',
						)
					) .

					$h2( 'Count back from your first fall frost' ) .
					$p( 'Virginia Tech gives a simple sum for the latest date you can sow a fall crop. Start with the days to maturity on the seed packet, add the days you expect to keep picking, then add about two weeks as a fall factor, because shorter, cooler days slow growth. For crops killed by frost, such as beans, cucumbers, squash and tomatoes, add two more weeks, since they need to mature before the frost. The total is the number of days to count back from your first fall frost. Choose the fastest-maturing varieties for late sowings.' ) .
					$p( 'For example, kale with 50 days on the packet plus about 14 days for the fall factor means sowing roughly 9 weeks before your first fall frost. Kale tolerates frost, so it needs no extra two weeks; bush beans at the same 50 days would need about 11 weeks. University of Minnesota Extension lists kale and others in the cabbage family as the safest choices for midsummer sowing, because an early frost will not kill them before they are ready, and notes that peas sown in summer take longer than spring peas, about 70–80 days.' ) .

					$h2( 'Reuse the same pots through the year' ) .
					$p( 'In a small space each pot can grow two or three crops a year. The RHS gives pairings for containers that work well on a balcony:' ) .
					$list(
						array(
							'<a href="/plants/fava-beans-in-pots/">Fava beans</a> or <a href="/plants/peas-in-pots/">snow peas</a> in spring, followed by beets or salad greens for late summer.',
							'Early <a href="/plants/carrots-in-pots/">carrots</a>, followed by bush beans.',
							'Spinach, which runs to seed quickly, followed by zucchini.',
							'Small lettuces, followed by <a href="/plants/leeks-in-pots/">leeks</a> for winter.',
							'<a href="/plants/green-onions-in-pots/">Green onions</a>, followed in summer by short carrots for fall.',
						)
					) .
					$p( 'Before the second crop goes in, University of Minnesota Extension advises mixing in a balanced fertilizer to replace what the first crop used, and clearing out old roots and stems, or waiting one to two weeks for them to break down, because leftover debris can hinder germination. Virginia Tech suggests choosing a crop from a different family from the one before. A pot that has grown a hungry crop all summer may need part of its potting mix replaced: <a href="/potting-mix-for-containers/">how to fill, refresh and reuse potting mix</a> explains when and how.' ) .

					$h2( 'Stretch the fall and carry pots through winter' ) .
					$p( 'Some crops can stand outside into winter. Virginia Tech lists kale, spinach, bunching onions, lettuce, parsley and carrots among crops that may survive all winter in the garden, to be picked as needed or in early spring, and notes that cabbage-family crops and spinach do not need picking the moment frost comes. Pots are more exposed than garden beds, though: the RHS suggests grouping containers close to a house wall to protect the roots, and covering plants or moving pots to shelter when frost is likely. <a href="/protect-pots-in-winter/">How to protect pots in winter</a> covers this in detail.' ) .
					$p( 'A cover adds a few weeks at each end of the year. Virginia Tech advises closing a cold frame on frosty nights and opening it again once the morning air warms. See <a href="/cloches-and-mini-greenhouses-on-a-balcony/">cloches and mini greenhouses on a balcony</a>, or build a <a href="/diy-projects/make-a-mini-cold-frame/">mini cold frame</a>.' ) .

					$h2( 'Bring the harvest indoors for the coldest weeks' ) .
					$p( 'When the balcony is at its quietest, a windowsill keeps something growing. The RHS says microgreens can be sown at any time of year on a windowsill, and many are ready within a few weeks: see <a href="/plants/microgreens-on-a-windowsill/">microgreens on a windowsill</a>. University of Minnesota Extension notes that an unobstructed south-facing window gives the most natural light, and culinary herbs such as basil need a brightly lit spot. Which crops cope indoors is covered in <a href="/vegetables-on-a-windowsill/">vegetables on a windowsill</a> and the <a href="/small-spaces/windowsills-and-indoors/">windowsills and indoors</a> guide.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planning only the summer, so pots stand empty from fall to spring.',
							'Sowing fall crops by the date on the packet without adding time for shorter, cooler days.',
							'Putting tomatoes and peppers out on the average last frost date instead of after it.',
							'Sowing the second crop straight into exhausted potting mix with no added food.',
							'Following a crop with another from the same family in the same pot.',
							'Leaving hardy crops in pots out in the open on frosty nights instead of grouping them by a wall.',
						)
					),
			),

			'collect-rainwater-balcony-patio'     => array(
				'image_prompt' => 'A small paved patio beside a house wall: a slim green plastic rain barrel with a closed lid stands on a sturdy, level stand under a downspout fitted with a diverter, a metal watering can under its spigot, and pots of tomatoes on canes, flowering shrubs and herbs nearby, after rain with wet paving and soft daylight.' . $photo_end,
				'pin_prompt'   => 'A slimline rain barrel with a tight lid on a raised stand next to a downspout on a compact patio, a watering can filling from the spigot, potted plants around it, photographed vertically.' . $pin_end,
				'title'        => 'How to Collect and Use Rainwater on a Balcony or Patio',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'Where you have a downspout and permission, a slim rain barrel with a lid, a screen and an overflow is the simplest way to store rain; without one, any lidded container in the open will do. Keep it level, covered and drained in winter, and use it mainly on ornamentals and the soil of tall crops.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Slimline rain barrel with a tight lid and spigot', 'note' => 'Slim models fit narrow spaces; check that the lid closes securely.', 'url' => '' ),
						array( 'name' => 'Downspout diverter kit', 'note' => 'Sends rain from the downspout into the barrel; only with the owner\'s permission.', 'url' => '' ),
						array( 'name' => 'Sturdy stand made for rain barrels', 'note' => 'Lifts the spigot high enough for a watering can on a firm, level base.', 'url' => '' ),
						array( 'name' => 'Fine mesh screen', 'note' => 'Covers every opening, including the overflow, against mosquitoes and debris.', 'url' => '' ),
						array( 'name' => 'Watering can', 'note' => 'Lets you pour stored rain at the base of each plant.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is it legal to collect rainwater where I live?', 'answer' => 'It depends on where you live, so check before you start. Some US states regulate it: Colorado State University Extension explains that Colorado allows most homes up to two rain barrels holding 110 gallons (about 415 liters) in total, for outdoor use on the same property. The RHS says collecting roof water is legal in the UK.' ),
						array( 'question' => 'How heavy is a full rain barrel?', 'answer' => 'Very heavy. University of Arkansas Cooperative Extension works it out at about 8.3 lb per US gallon (1 kg per liter), so a full 55-gallon barrel weighs about 460 lb (210 kg). That is why it needs a firm, level base and, on a balcony, the building\'s approval.' ),
						array( 'question' => 'How do I stop mosquitoes breeding in stored rainwater?', 'answer' => 'Keep a tight lid on and cover every opening, the overflow included, with screen as fine as window screening. Colorado State University Extension also advises emptying the barrel completely at least once a month and disconnecting it from the downspout if you will be away for more than a week.' ),
						array( 'question' => 'Which roofs give the cleanest rainwater?', 'answer' => 'The RHS favors a roof with a decent pitch and a fairly clean surface. Texas A&M AgriLife Extension adds that steep roofs wash clean faster than flat ones, metal roofs shed contaminants easily, asphalt shingles are fine for landscape watering, and wood shingles and lead flashing are best avoided.' ),
						array( 'question' => 'What should I do with a rain barrel before winter?', 'answer' => 'In areas where it freezes, drain it completely, scrub it out and store it upside down or covered, with the hose and screen kept indoors. University of Minnesota Extension warns that water left inside can freeze, expand and crack the barrel.' ),
					),
					'sources'  => array(
						$umn_rain,
						$csu_rain,
						$tamu_roof,
						$tamu_store,
						$tamu_land,
						$uaex_rain,
						$rhs_water,
						$epa_rain,
					),
				),
				'content'      =>
					$p( 'Rain falling on a roof or a balcony is free water, and the RHS calls it the best choice for watering most plants: it is soft, low in minerals and has the right pH, even for acid-lovers such as <a href="/plants/blueberries-in-pots/">blueberries</a>. In a small space the challenge is where to store it safely and what to use it on. This guide covers both; for the short caution about rain barrels near vegetables in a yard, see the <a href="/small-spaces/patios-and-small-yards/">patios and small yards</a> guide.' ) .

					$h2( 'Check the rules and ask first' ) .
					$p( 'Rainwater collection is regulated in some US states. Colorado is the best-known example: Colorado State University Extension explains that most households there may use up to two rain barrels with a combined 110 gallons (about 415 liters), fed only from rooftop downspouts, with a sealable lid, and only for outdoor use on the same property. The RHS notes that collecting rain from roofs is legal in the UK. Check what applies where you live before you buy.' ) .
					$p( 'If you rent or live in a condo, ask the landlord or building management before fitting anything to a downspout or putting a heavy container on a balcony. In Colorado, a homeowners association cannot ban rain barrels but can set reasonable rules on where they go and what they look like, according to Colorado State.' ) .

					$h2( 'Choose a container that fits your space' ) .
					$list(
						array(
							'<strong>A rain barrel on a downspout.</strong> If a downspout runs past your patio, a diverter sends rain into a barrel. Most rain barrels hold 50–55 gallons (190–210 liters), says University of Minnesota Extension, and usually come with a spigot and hose, an overflow outlet and a screen.',
							'<strong>A slimline barrel.</strong> Where space is short, the RHS points to slim and decorative models, which can be linked together to store more.',
							'<strong>A lidded container in the open.</strong> With no downspout, Colorado State notes that any container that catches rain shed from a roof or patio can collect it. Choose one with a tight lid you open to catch rain and close afterwards.',
						)
					) .
					$p( 'Even a small roof collects a lot of water. In dry south-east England, the RHS estimates that a small shed roof yields about 660–925 gallons (2,500–3,500 liters) a year.' ) .

					$h2( 'Weight and a stable base' ) .
					$p( 'Water is heavy. University of Arkansas Cooperative Extension puts a US gallon at about 8.3 lb (1 kg per liter), which makes a full 55-gallon barrel about 460 lb (210 kg). On a balcony, that load needs the building\'s approval; the <a href="/small-spaces/balconies/">balconies</a> guide covers weight limits.' ) .
					$p( 'The RHS advises standing a barrel on a firm, level stand or on bricks, and University of Minnesota Extension suggests raising it on blocks or wood so a watering can fits under the spigot and the barrel drains more fully. The Arkansas guide adds a warning: raising a barrel improves the flow but makes it easier to tip, so secure it against wind, heavy rain and knocks.' ) .

					$h2( 'Keep it covered for children, pets and mosquitoes' ) .
					$list(
						array(
							'Keep the lid secured so children and animals cannot get in. Texas A&M AgriLife Extension makes safety the main goal of any storage container.',
							'Cover every opening, the overflow included, with screen as fine as window screening: the Arkansas guide notes that anything larger lets mosquitoes in to breed.',
							'Empty the barrel completely at least once a month, and disconnect it from the downspout if you will be away for more than a week, as Colorado State advises.',
							'Make sure everyone knows the water is not for drinking: the Arkansas guide suggests a "non-potable" label, or removing the faucet handle when not in use.',
						)
					) .

					$h2( 'Plan for the overflow' ) .
					$p( 'A barrel fills fast in a downpour. Fit the overflow, which University of Minnesota Extension says prevents the barrel from spilling over, and lead it into a bed, the base of a tree or another spot away from buildings. On a balcony, send it to a drain, never over the edge onto the space below. A screen or filter at the inlet keeps out leaves and seeds, and the RHS recommends keeping gutters clear so debris does not rot in the water.' ) .

					$h2( 'What to water with stored rain' ) .
					$p( 'University of Minnesota Extension rates rain barrel water a good choice for ornamental plants, shrubs and houseplants, and the RHS recommends it for established plants. Texas A&M AgriLife Extension notes that rainwater is free of the salts that harm root growth, and recommends applying only what plants need, ideally through drip irrigation.' ) .
					$p( 'Food crops need more care. The US EPA points out that water running over a roof can pick up bacteria from birds and other animals and chemicals from roofing materials. University of Minnesota Extension therefore advises keeping it off any part of a plant you eat, watering by hand at the base, never overhead, and using it only on tall, trellised crops and fruit bushes where it cannot touch the harvest. Avoid it on salad greens and herbs.' ) .
					$p( 'The roof matters too. Texas A&M AgriLife Extension says a steep roof sheds dirt faster than a flatter one, metal roofs shed contaminants easily, asphalt shingles are fine for watering landscape plants, and wood shingles and lead flashing should be avoided. Colorado State describes first-flush diverters, which send away the first, dirtiest gallons of each storm. The RHS keeps stored rain off seedlings, which tap water suits better: see <a href="/problems/damping-off-seedlings/">damping off</a>.' ) .

					$h2( 'Clean it and empty it before winter' ) .
					$p( 'University of Minnesota Extension suggests fall as the time to drain the barrel completely, clear out debris and scrub the inside with water and detergent, then rinse. Where winters freeze, store it upside down or covered, with the hose and screen indoors: water left inside can freeze, expand and crack it. The RHS adds that if stored water starts to smell, you should empty and clean the barrel rather than add chemicals. Once it is drained, fit a temporary downspout extension so snowmelt runs away from the house.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Setting up a barrel without checking local rules or asking the landlord.',
							'Putting a full barrel on a balcony without knowing what the floor can carry.',
							'Raising a barrel on a wobbly stack of bricks.',
							'Leaving the lid loose or the overflow unscreened.',
							'Splashing stored rain over salad greens and herbs.',
							'Leaving water in the barrel through a freezing winter.',
						)
					),
			),
		),
	),
);
