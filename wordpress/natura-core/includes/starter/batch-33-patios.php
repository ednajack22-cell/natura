<?php
/**
 * Starter guides, batch 33 (Small Spaces): the place guide for patios and
 * small yards. A place guide is a hub: it gives the advice that is
 * particular to growing on paving or in a tiny city yard (sun and shade
 * between walls and fences, pots on hot paving, a small bed in the ground,
 * testing city soil before growing food in it, climbers on fences, water and
 * room to sit) and links to the guides that already explain watering, pots,
 * raised beds and supports. The plants that suit a patio are listed by the
 * theme from the "patio" plant tag, so the text has no plant-by-plant list.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from these pages, all checked 23 October 2026: US EPA,
 * Brownfields and Urban Agriculture: Interim Guidelines for Safe Gardening
 * Practices; UMass Amherst Soil and Plant Nutrient Testing Laboratory, Soil
 * Lead Contamination; University of Minnesota, Urban Gardens and Soil
 * Contaminants; University of Illinois Extension, Lead in Garden Soils;
 * Cornell Cooperative Extension NYC, Healthy Soils, Healthy Communities, and
 * the New York State Department of Health brochure Healthy Gardening that it
 * hosts; University of Minnesota Extension, Rain barrels; RHS Microclimates:
 * assessing your garden, Wall-side borders, Ideas for growing veg in small
 * spaces, and Six stylish small garden design ideas; NC State Extension,
 * Vegetable Gardening in Small Spaces; Clemson Home & Garden Information
 * Center, Container Vegetable Gardening; UC Master Gardeners of
 * Tulare-Kings, How to: square foot garden; UW-Extension (Taylor County),
 * Square Foot Gardening class notes; Garden Gate magazine, Patio protection.
 * Soil lead bands are given only as the UMass laboratory states them, and
 * the reader is sent to a local lab and extension office for the meaning of
 * a result. No load figure and no statistic is given. Seasons replace month
 * names.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

$p    = 'natura_core_demo_p';
$h2   = 'natura_core_demo_h2';
$list = 'natura_core_demo_list';

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Small Spaces: patios and small yards', 'natura-core' ),
	'guides' => array(
		'space' => array(
			'patios-and-small-yards' => array(
				'image_prompt' => 'A small paved city backyard in summer enclosed by a tall wooden fence and a brick wall: a low wooden raised bed of loose-leaf lettuce and Swiss chard with red stems in the sunniest corner, pole beans climbing strings on a wire trellis fixed to the fence, a bush tomato in a large pot standing on small pot feet on gray concrete pavers, a few herb pots grouped together, a coiled garden hose on a wall reel, and a small bistro table with two chairs left clear in the middle, warm late afternoon sun across the paving.' . $photo_end,
				'pin_prompt'   => 'A small sunny city yard with paving, photographed vertically: a raised bed of salad greens against a wooden fence, beans climbing a trellis on the fence above it, a tomato in a large pot raised on pot feet, and a bistro table and chair with space to sit, a brick wall softly blurred behind.' . $pin_end,
				'title'        => 'How to Grow Food on a Patio or in a Small Yard',
				'short_name'   => 'Patios & small yards',
				'order'        => 3,
				'space_term'   => 'patio',
				'excerpt'      => 'Map where the sun falls between the walls and fences, then grow in pots raised off the hot paving or in a small bed. Before you grow food in city ground, have the soil tested for lead; if it is high, use raised beds or containers filled with clean soil.',
				'related'      => array(
					'project' => array(
						'build-a-small-raised-bed-on-a-patio',
						'fix-a-wire-trellis-to-a-wall',
					),
					'post'    => array(
						'how-to-arrange-pots-in-a-small-space',
						'supports-for-climbing-crops',
						'watering-pots-in-a-heat-wave',
						'how-to-mulch-pots',
						'succession-planting-small-spaces',
					),
					'gear'    => array(
						'best-drip-irrigation-kit-for-pots',
						'best-plant-supports-for-pots',
					),
				),
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Pot feet or risers', 'note' => 'Lift pots off the paving so water drains away and air reaches the surface underneath.', 'url' => '' ),
						array( 'name' => 'Soil test for lead and other metals', 'note' => 'From a university or certified lab; ask your local extension office which one to use.', 'url' => '' ),
						array( 'name' => 'Landscape fabric', 'note' => 'A layer under a raised bed that stands on soil you are unsure about.', 'url' => '' ),
						array( 'name' => 'Garden hose on a wall reel', 'note' => 'Brings water to the far corner of the yard and stays out from underfoot.', 'url' => '' ),
						array( 'name' => 'Tomato growing cage', 'note' => 'Keeps a tall plant upright in a pot that you may want to move.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is it safe to grow vegetables in the soil of a city backyard?', 'answer' => 'Often it is, but you cannot tell by looking. Old paint, past traffic and earlier uses of the land can leave lead and other contaminants in the ground. Have a sample tested before you plant food crops in it, and ask your local extension office to help you read the result.' ),
						array( 'question' => 'Where in a yard is lead in the soil usually highest?', 'answer' => 'Close to the walls of older buildings, where flakes of lead-based paint have fallen, and near busy roads. Lead hardly moves once it is in the soil, so these spots stay high for a very long time. Test them separately from the rest of the yard.' ),
						array( 'question' => 'Do raised beds make contaminated soil safe for growing food?', 'answer' => 'Extension services name raised beds filled with soil from a clean source as the most effective option. Lay landscape fabric under the bed, keep paths covered with mulch, stones or bricks, and keep washing hands and produce, because dust and splashed soil are the main way contaminants reach people.' ),
						array( 'question' => 'What can I grow along a shady north-facing fence?', 'answer' => 'Leafy crops cope with a few hours of sun, so they are the best choice there. The north side of a wall or fence also escapes the extremes of heat and cold. Keep tomatoes, beans and other fruiting crops for the sunniest side of the yard.' ),
						array( 'question' => 'Can I water vegetables with water from a rain barrel?', 'answer' => 'University of Minnesota Extension advises against letting rain barrel water touch any part of a plant you eat, because roof water can carry germs and metals. Use it on flowers and shrubs, or pour it carefully at the base of tall, trellised crops so it never reaches the harvest.' ),
						array( 'question' => 'Why do pots on a concrete patio dry out so quickly?', 'answer' => 'Paving soaks up the sun and throws heat back at the plants, so a small volume of potting mix loses water fast. Group pots so their leaves shade one another, lift them off the surface, and move them or give them shade at the hottest time of day.' ),
					),
					'sources'  => array(
						array( 'title' => 'US EPA — Brownfields and Urban Agriculture: Interim Guidelines for Safe Gardening Practices', 'url' => 'https://www.epa.gov/sites/production/files/2015-05/documents/bf_urban_ag.pdf' ),
						array( 'title' => 'UMass Amherst Soil and Plant Nutrient Testing Laboratory — Soil Lead Contamination', 'url' => 'https://www.umass.edu/agriculture-food-environment/soil-plant-nutrient-testing-laboratory/fact-sheets/soil-lead-fact-sheet' ),
						array( 'title' => 'University of Minnesota — Urban Gardens and Soil Contaminants: A Gardener\'s Guide to Healthy Soil', 'url' => 'https://soiltest.cfans.umn.edu/sites/soiltest.cfans.umn.edu/files/2024-07/urbangardenssoilcontaminants2010.pdf' ),
						array( 'title' => 'University of Illinois Extension — Lead in Garden Soils', 'url' => 'https://extension.illinois.edu/sites/default/files/lead_in_soil_factsheet_2019.pdf' ),
						array( 'title' => 'Cornell Cooperative Extension NYC — Healthy Soils, Healthy Communities', 'url' => 'https://nyc.cce.cornell.edu/healthy-soils-healthy-communities/' ),
						array( 'title' => 'New York State Department of Health — Healthy Gardening (brochure hosted by Cornell Cooperative Extension NYC)', 'url' => 'https://nyc.cce.cornell.edu/files/2015/10/NYS-DOH-Healthy-Gardening-Brochure-1lz061u.pdf' ),
						array( 'title' => 'University of Minnesota Extension — Rain barrels', 'url' => 'https://extension.umn.edu/water-wisely-start-your-own-backyard/rain-barrels' ),
						array( 'title' => 'RHS — Microclimates: assessing your garden', 'url' => 'https://www.rhs.org.uk/garden-design/microclimates-assessing-garden' ),
						array( 'title' => 'RHS — Wall-side borders', 'url' => 'https://www.rhs.org.uk/plants/for-places/wall-side' ),
						array( 'title' => 'RHS — Ideas for growing veg in small spaces', 'url' => 'https://www.rhs.org.uk/garden-inspiration/grow-your-own/how-to-grow-veg-small-spaces' ),
						array( 'title' => 'RHS — Six stylish small garden design ideas', 'url' => 'https://www.rhs.org.uk/garden-inspiration/garden-types/small-gardens' ),
						array( 'title' => 'NC State Extension — Vegetable Gardening in Small Spaces', 'url' => 'https://content.ces.ncsu.edu/mini-gardening' ),
						array( 'title' => 'Clemson Home & Garden Information Center — Container Vegetable Gardening', 'url' => 'https://hgic.clemson.edu/factsheet/container-vegetable-gardening/' ),
						array( 'title' => 'UC Master Gardeners of Tulare-Kings Counties — How to: Square Foot Garden', 'url' => 'https://ccfruitandnuts.ucanr.edu/sites/default/files/2022-03/365338.pdf' ),
						array( 'title' => 'UW-Extension, Taylor County — Square Foot Gardening (class notes)', 'url' => 'https://taylor.extension.wisc.edu/files/2025/01/Square-Foot-Gardening-Edit-2013.pdf' ),
						array( 'title' => 'Garden Gate — Patio protection', 'url' => 'https://www.gardengatemagazine.com/articles/enotes/all/patio-protection' ),
					),
				),
				'content'      =>
					$p( 'A patio or a pocket-sized city yard gives you something a balcony cannot: solid ground, room for a small bed and, often, a faucet nearby. It also brings its own questions. Walls and fences decide where the sun falls, paving heats up and holds water on the surface, and the soil in an older neighborhood may hold lead or other contaminants from the past. This guide covers those points. The crops that suit a patio are listed below it, each with its own growing guide, and general pot-growing skills have their own pages, linked as you go. If you garden off the ground instead, see <a href="/small-spaces/balconies/">growing food on a balcony</a>.' ) .

					$h2( 'Where does the sun fall between your walls and fences?' ) .
					$p( 'In a small yard, the neighbors\' walls, your own fence and the house itself cast moving shadows, so a corner that is bright at noon can be in shade by mid-afternoon. The RHS suggests walking around the space and noting the warm, sheltered spots, the windy corridors and the dark, sunless corners. It adds a useful trick: our eyes adjust so well to dim light that a phone camera judges shade more honestly than we do.' ) .
					$list(
						array(
							'<strong>Note the hours of direct sun</strong> for each spot where you might put a pot or a bed. How many hours each kind of crop needs is set out in <a href="/small-spaces/balconies/">the balcony guide</a>; leafy crops cope with far less than tomatoes or beans.',
							'<strong>Prefer morning sun beside a building.</strong> Where a spot only gets light for part of the day, NC State Extension says the morning sun is the better half to have.',
							'<strong>Use warm walls for warm crops.</strong> According to the RHS, a south-facing wall soaks up heat during the day and gives it back at night, which helps fruit ripen. The north side of a wall or fence is cooler but more even, without extremes of hot or cold, which suits leafy crops.',
							'<strong>Watch for the dry strip.</strong> A wall keeps rain off the ground at its foot. The RHS describes a rain shadow up to about 3 ft (1 m) wide, where soil stays dry unless you water it.',
						)
					) .
					$p( 'Solid fences shelter a yard, but the RHS notes that they also make the wind swirl and gust, which stresses plants; narrow passages between buildings are worse still. Put the pots that need shelter on the calm side, and save the gusty passage for something tough or for storage.' ) .

					$h2( 'Pots on paving: heat, drainage and stains' ) .
					$p( 'Paving changes how a container behaves. Clemson\'s Home & Garden Information Center warns that pots can dry out very quickly on a concrete patio in full sun, and that light reflected off the pavement can overheat plants. It suggests three fixes: group containers so their leaves shade the potting mix, stand pots on pallets or similar so air moves underneath, and move or shade them during the hottest part of the day. For the watering routine itself, see <a href="/watering-pots-in-a-heat-wave/">keeping pots alive in a heat wave</a>, and for a cooler surface on the potting mix, <a href="/how-to-mulch-pots/">how to mulch pots</a>.' ) .
					$p( 'A pot that sits flat on paving can also leave a ring on the stone. Garden Gate magazine suggests lifting pots on small feet, even upturned cans, so they touch the surface as little as possible and the water drains away quickly. Before you set out heavy containers, look at where water runs across the paving after rain, so the runoff from pots heads to a drain or open ground rather than toward a door.' ) .
					$p( 'A ground-level patio does not have the strict weight limits of a balcony, so large containers are an option. Sizes and materials are compared in <a href="/how-to-choose-pots-for-vegetables/">how to choose pots for vegetables</a>, and <a href="/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a> shows how to group them.' ) .

					$h2( 'Test city soil before you grow food in it' ) .
					$p( 'Ground in a town or city has a history, and some of it stays in the soil. The University of Minnesota names lead, arsenic and cadmium as the main concerns in urban areas, along with soot-related compounds called PAHs. Lead comes mostly from old lead-based paint and from the leaded gasoline of the past, and UMass Amherst notes that it persists in soil for hundreds of years. Illinois Extension notes that flaking paint raises the lead in the soil right next to older buildings, and that lead stays in the top few inches and hardly moves, so a contaminated spot stays that way unless something is done.' ) .
					$p( 'The University of Minnesota points out that in long-established residential areas these contaminants are usually at levels that pose no health risk, but only a test tells you for sure. Cornell\'s Healthy Soils, Healthy Communities project, which tested soil in New York City community gardens, studied practical ways to garden safely: compost, mulch, barriers and the choice of crops. The steps below follow the EPA\'s guidance and the extension services.' ) .
					$list(
						array(
							'<strong>Find out what the land was used for.</strong> The EPA suggests starting with the site\'s history. Homes with old paint, parking areas, gas stations, dry cleaners, workshops and railroad tracks each point to different contaminants, so tell the lab what you are worried about.',
							'<strong>Have it tested.</strong> Ask your local extension office which lab to use, and ask for a total lead test: UMass explains that the lead screen in a routine nutrient test is only a rough guide. UMass advises taking samples from the top 6 to 8 in (15 to 20 cm) where vegetables will grow, and Illinois Extension recommends sampling the food garden and any children\'s play area separately rather than mixing them.',
							'<strong>Read the result with help.</strong> Results are given in parts per million (ppm), and the thresholds that apply vary from state to state. The UMass lab, for example, advises growing leafy and root crops only in raised beds of clean soil when total lead is between 400 and 999 ppm, and growing no food in the ground at all above that. Your extension office can tell you what your number means where you live.',
							'<strong>Or skip the test and bring in clean soil.</strong> The University of Minnesota points out that, where testing for many contaminants would be costly, it can make more sense to assume the ground is contaminated and grow in raised beds filled with soil from a source known to be clean.',
						)
					) .

					$h2( 'If the soil is contaminated: beds, barriers and habits' ) .
					$p( 'Contaminated ground does not mean giving up on fresh food. The extension services agree that the main risk comes from swallowing or breathing in soil and dust, not from what the plants take up, so the aim is to keep you, your harvest and your children away from the old soil.' ) .
					$list(
						array(
							'<strong>Build raised beds or use containers.</strong> Minnesota calls raised beds the most effective alternative to contaminated native soil. Illinois Extension suggests laying landscape fabric on the ground first and filling with clean topsoil and compost, and the New York State Department of Health suggests at least 10 in (25 cm) of clean soil. <a href="/diy-projects/build-a-small-raised-bed-on-a-patio/">Build a small raised bed on a patio</a> shows the construction; containers of potting mix work just as well.',
							'<strong>Cover the bare ground.</strong> The EPA suggests covering soil and paths with mulch, landscape fabric, stones or bricks. Minnesota recommends a thick mulch, about 4 in (10 cm), and covering bare soil where children play.',
							'<strong>Keep beds away from old walls and busy streets,</strong> or put a fence or hedge between the garden and the road to catch dust, as the EPA and UMass advise.',
							'<strong>Help the soil hold on to metals.</strong> Adding compost and keeping the pH near neutral, about 6.5 to 7.0 according to UMass and Illinois Extension, makes lead less available to plants. A soil test tells you whether lime is needed.',
							'<strong>Favor fruiting crops in the ground.</strong> Minnesota and Illinois note that tomatoes, peppers, beans and other fruiting crops take up and carry less contamination than root crops, leafy greens and herbs, which are better grown in clean soil.',
							'<strong>Keep good habits.</strong> Wear gloves, wash your hands after gardening, leave muddy shoes at the door, peel root crops, remove the outer leaves of leafy crops and wash all produce before you eat or store it.',
						)
					) .

					$h2( 'A small bed in a tiny yard' ) .
					$p( 'Where the ground is open, or the test comes back clean, a bed lets you grow more than pots will. Before digging, the EPA reminds US gardeners to call 811 so buried utility lines are marked. Beds along a house wall need extra thought: the RHS warns that the soil there is often shallow, full of rubble and edged by footings and drains, and that added soil must stay below the damp-proof course. Combined with the rain shadow, and the extra lead often found near old foundations, a spot a little way out from the wall is usually the better choice.' ) .
					$p( 'To pack a small bed, several extension programs teach square-foot gardening. The bed is divided into 1 ft (30 cm) squares and planted by the spacing on the seed packet, as the UC Master Gardeners of Tulare-Kings and UW-Extension class notes explain:' ) .
					$list(
						array(
							'One plant per square for crops spaced 12 in (30 cm) apart, such as a pepper or a cabbage.',
							'Four per square for 6 in (15 cm) spacing, such as lettuce.',
							'Nine per square for 4 in (10 cm) spacing, such as spinach.',
							'Sixteen per square for the smallest crops, such as radishes and carrots.',
						)
					) .
					$p( 'Keep the bed no more than 4 ft (1.2 m) wide so you never step on the soil, or about 2 ft (60 cm) when it stands against a fence and you can reach it from one side only, as the UW-Extension notes advise. When a square is harvested, the UC sheet suggests adding a trowel of compost and replanting it with something different; <a href="/succession-planting-small-spaces/">succession planting in small spaces</a> shows how to plan that.' ) .

					$h2( 'Use fences and walls for climbers' ) .
					$p( 'In a small yard, the boundary is often the biggest growing surface you have. NC State Extension calls fences ideal for vining crops such as peas, beans, cucumbers and melons, and suggests setting a window box or trough at the foot of a fence or trellis to train them up. Heavy melons need a sling of netting or old hose tied to the fence to carry each fruit.' ) .
					$list(
						array(
							'<strong>Add wires or a trellis</strong> to a wall or fence you own, or with the owner\'s permission: <a href="/diy-projects/fix-a-wire-trellis-to-a-wall/">fix wires or trellis to a wall</a>. Which support suits which crop is in <a href="/supports-for-climbing-crops/">supports for climbing crops</a>.',
							'<strong>Grow from a pot</strong> where the base of the fence is paved: <a href="/diy-projects/grow-a-squash-up-a-trellis-in-a-pot/">grow a squash up a trellis in a pot</a> or <a href="/diy-projects/make-a-bean-tepee-in-a-pot/">make a bean tepee in a pot</a>.',
							'<strong>Shelve pots up the wall.</strong> The RHS suggests a plant theater of open shelves, or fabric planting pockets fixed to a wall or fence, for herbs, salad greens and fruit.',
						)
					) .

					$h2( 'Water within reach' ) .
					$p( 'A yard often has an outdoor faucet, which makes a hose or a <a href="/diy-projects/set-up-a-drip-irrigation-kit/">drip watering kit</a> practical; see <a href="/gear/best-drip-irrigation-kit-for-pots/">the best drip irrigation kit for pots</a>. Put the thirstiest pots closest to the water, and remember that Clemson expects pots on hot paving to need water daily, or even twice a day, in hot, sunny weather.' ) .
					$p( 'A rain barrel on a downspout is tempting, but University of Minnesota Extension advises keeping that water off any edible part of a plant, because water from a roof can carry fecal germs and metals from roofing materials. Use it for flowers, shrubs and houseplants, or pour it at the base of tall, trellised crops such as tomatoes and cucumbers so it never touches what you pick.' ) .

					$h2( 'Keep room to sit' ) .
					$p( 'A small yard is also where you eat and relax, so plan the crops around the life of the space. The RHS describes a small urban garden as an outdoor room and suggests putting a planter of salad greens or herbs near the barbecue, where you can snip as you cook. Tomatoes in wire growing cages stay upright and can be moved when you need the room, and the UC Master Gardeners suggest setting a bed as close to the house as you can, for convenience. Leave a clear path to every pot and a spot for a chair, so the harvest is part of the space rather than an obstacle course.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting tomatoes in the corner that the fence shades for half the day.',
							'Digging a vegetable bed in city soil without a lead test.',
							'Building a bed right against an old painted wall, in its rain shadow.',
							'Standing pots flat on hot concrete with nothing to lift or shade them.',
							'Watering lettuce and herbs with rain barrel water.',
							'Filling the whole yard with pots and beds, leaving nowhere to sit.',
						)
					),
			),
		),
	),
);
