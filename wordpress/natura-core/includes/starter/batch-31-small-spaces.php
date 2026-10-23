<?php
/**
 * Starter guides, batch 31 (Small Spaces): the first place guide, Balconies.
 * A place guide is a hub: it gives the advice that is particular to growing
 * on a balcony (sun from one direction, wind, weight and building rules,
 * water and the neighbors below, the year on a balcony) and links to the
 * guides that already explain watering, potting mix, pots, supports and
 * winter care. The plants that suit a balcony are listed by the theme from
 * the "balcony" plant tag, so the text has no plant-by-plant list.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from these pages, all checked 23 October 2026: RHS Roof
 * gardens and balconies, Greening balconies and roof gardens, How to grow
 * edibles on your balcony, Gardening when you rent, and How to water
 * containers; NC State Extension, Vegetable Gardening in Small Spaces;
 * Cornell University (Steve Reiners), No yard? Grow vegetables in
 * containers; Oregon State University Extension, Container gardening; Clemson
 * Home & Garden Information Center, Container Vegetable Gardening; Colorado
 * State University Extension, Container Gardens; UMass Amherst, Container
 * Gardening with Vegetables; UC Master Gardeners of Merced County, Container
 * Vegetable Gardening in the Central Valley. Hours of sun follow the
 * extension pages (they differ slightly; the ranges given cover them). No
 * load figure is given, because none of the sources states one for
 * balconies. Seasons replace month names.
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
	'name'   => __( 'Small Spaces: place guides', 'natura-core' ),
	'guides' => array(
		'space' => array(
			'balconies' => array(
				'image_prompt' => 'A narrow apartment balcony on an upper floor of a brick building in summer, seen from the open doorway: a long, low trough of loose-leaf lettuce and parsley along the floor, a bush tomato with green and red fruit in a large plastic pot on a wheeled plant caddy against the house wall, pole beans climbing strings on a wooden trellis fixed to the wall, a herb window box held by brackets on the inside of a metal railing, every pot standing on a saucer, a slatted wooden screen at one end and rooftops in the soft background, late afternoon sun.' . $photo_end,
				'pin_prompt'   => 'A small sunny balcony filled with food plants, photographed vertically from the doorway: pole beans climbing a wall trellis, a tomato in a large pot on a wheeled caddy, a trough of lettuce and herbs on the floor and a herb box on the inside of the railing, city rooftops softly blurred behind.' . $pin_end,
				'title'        => 'How to Grow Food on a Balcony',
				'short_name'   => 'Balconies',
				'order'        => 1,
				'space_term'   => 'balcony',
				'excerpt'      => 'Count the hours of direct sun first: leafy crops manage with a few, while tomatoes and other fruiting crops want six or more. Then plan for what makes a balcony different: wind, a floor with a weight limit, rules about fixing things to walls and railings, and runoff onto the neighbors below.',
				'related'      => array(
					'post'    => array(
						'how-to-arrange-pots-in-a-small-space',
						'what-to-grow-on-a-shady-balcony',
						'how-to-choose-pots-for-vegetables',
						'succession-planting-small-spaces',
						'protect-pots-in-winter',
					),
					'problem' => array( 'leaf-scorch' ),
					'project' => array(
						'plant-a-herb-window-box',
						'fix-a-wire-trellis-to-a-wall',
						'self-watering-pot',
					),
					'gear'    => array( 'best-watering-can-for-a-balcony' ),
				),
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Saucers or drip trays for every pot', 'note' => 'Catch the water that runs out of the drainage holes, so it stays on your balcony.', 'url' => '' ),
						array( 'name' => 'Plant caddy or dolly with wheels', 'note' => 'Lets you roll a large pot to follow the sun or out of a storm.', 'url' => '' ),
						array( 'name' => 'Long, low trough', 'note' => 'Sits steady in the wind and suits rows of leafy crops.', 'url' => '' ),
						array( 'name' => 'Slatted or mesh screen', 'note' => 'Slows the wind instead of making it swirl.', 'url' => '' ),
						array( 'name' => 'Lightweight plastic or fiberglass pots', 'note' => 'Lighter on the floor and slower to dry out than unglazed clay.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do I need permission to grow vegetables on a rented balcony?', 'answer' => 'Anything you screw, clamp or hang on a wall or railing needs the property owner\'s permission first, and you may have to remove it when you leave. Ask the landlord or building manager, and read the lease and any building rules, before buying large containers or fixings.' ),
						array( 'question' => 'How do I stop water dripping onto the balcony below?', 'answer' => 'Stand every pot on a saucer or tray that is wider than its base, and pour slowly so the saucer catches the runoff instead of overflowing. Empty saucers a few hours after watering, and never hang containers outside the railing, where their runoff falls straight down.' ),
						array( 'question' => 'Which direction should a balcony face for growing vegetables?', 'answer' => 'South- and west-facing balconies are usually the warmest and sunniest, which suits tomatoes, peppers and beans. East- and north-facing ones are cooler and shadier, so they suit leafy crops and herbs better. What counts in the end is the number of hours of direct sun the pots actually get.' ),
						array( 'question' => 'Can I grow food on a high, windy balcony?', 'answer' => 'Yes, with some shelter. Use long, low containers that are hard to tip, put the tallest plants against the house wall and tie them in, and add a slatted or mesh screen on the windward side. Expect to water more often, because wind dries plants out.' ),
						array( 'question' => 'Will bees find flowers on an upper-floor balcony?', 'answer' => 'Often they do. An RHS horticultural adviser found pollinators visiting the blueberries on her third-floor balcony. Pest predators can be scarcer that high up, though, so check plants often and pick pests off by hand.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — Greening balconies and roof gardens', 'url' => 'https://www.rhs.org.uk/garden-inspiration/garden-types/balconies-roof-gardens' ),
						array( 'title' => 'RHS — How to grow edibles on your balcony (Julie Henderson)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/how-to-grow-edibles-on-your-balcony' ),
						array( 'title' => 'RHS — Gardening when you rent', 'url' => 'https://www.rhs.org.uk/garden-inspiration/garden-types/how-to-garden-when-you-rent' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'NC State Extension — Vegetable Gardening in Small Spaces', 'url' => 'https://content.ces.ncsu.edu/mini-gardening' ),
						array( 'title' => 'Cornell University (Steve Reiners) — No yard? Grow vegetables (and more) in containers', 'url' => 'https://cals.cornell.edu/school-integrative-plant-science/school-sections/horticulture-section/outreach-and-extension/pandemic-vegetable-gardening/pandemic-vegetable-gardening-2021-archive/no-yard-grow-vegetables-and-more-containers' ),
						array( 'title' => 'Oregon State University Extension — Container gardening: Grow vegetables even without yard space', 'url' => 'https://extension.oregonstate.edu/news/container-gardening-grow-vegetables-even-without-yard-space' ),
						array( 'title' => 'Clemson Home & Garden Information Center — Container Vegetable Gardening', 'url' => 'https://hgic.clemson.edu/factsheet/container-vegetable-gardening/' ),
						array( 'title' => 'Colorado State University Extension — Container Gardens', 'url' => 'https://extension.colostate.edu/resource/container-gardens/' ),
						array( 'title' => 'UMass Amherst — Container Gardening with Vegetables', 'url' => 'https://www.umass.edu/agriculture-food-environment/home-lawn-garden/fact-sheets/container-gardening-with-vegetables' ),
						array( 'title' => 'UC Master Gardeners of Merced County — Container Vegetable Gardening in the Central Valley', 'url' => 'https://ucanr.edu/site/uc-master-gardeners-merced-county/article/container-vegetable-gardening-central-valley' ),
					),
				),
				'content'      =>
					$p( 'A balcony is a container garden with a few rules of its own. The sun comes from one direction, the wind is often stronger up there, the floor can carry only so much, and somebody may live right underneath. This guide deals with those points. The crops that do well on a balcony are listed below it, each with its own growing guide, and the general skills of pot growing, such as watering and choosing a potting mix, have their own pages, linked as you go.' ) .

					$h2( 'How many hours of direct sun does your balcony get?' ) .
					$p( 'Light decides what you can grow, so measure it before you buy seeds. South- and west-facing balconies tend to be warm and sunny; east- and north-facing ones are cooler and shadier. The balcony above yours, side walls and nearby buildings all cut the hours further. On a clear day, note when the sun first reaches the floor where the pots will stand and when it leaves; the RHS suggests keeping a simple diary of where the sun falls.' ) .
					$p( 'Extension services group crops by the hours of direct sun they need. Their figures differ a little, but the pattern is the same:' ) .
					$list(
						array(
							'<strong>About 2 to 4 hours:</strong> crops grown for their leaves, such as lettuce, spinach, Swiss chard and many herbs. Cornell notes that a spot in full shade suits shade-loving flowers better than vegetables. See <a href="/what-to-grow-on-a-shady-balcony/">what to grow on a shady balcony</a>.',
							'<strong>About 4 to 6 hours:</strong> root crops as well, such as radishes, beets and carrots.',
							'<strong>6 hours or more:</strong> crops grown for their fruit, such as tomatoes, peppers, eggplant, cucumbers and beans. They have to grow, flower and set fruit, and Oregon State and Cornell put their need at 6 to 8 hours, with more being better.',
						)
					) .
					$p( 'You can stretch the light a little. Clemson\'s Home & Garden Information Center notes that pale, reflective surfaces around plants, such as a white-painted wall, add some light, and that a dolly or platform on casters lets you roll a big pot to wherever the sun is. On a balcony, that also lets you move plants out of the way of a storm.' ) .

					$h2( 'Shelter plants from the wind' ) .
					$p( 'The higher the balcony, the more wind it catches. Wind bends and breaks stems, tips pots over and, just as important, makes plants lose water faster: Cornell advises protecting container vegetables from wind to cut their water demand, and Clemson suggests checking pots twice a day in hot, dry or windy weather. Brown, crisp leaf edges after a gusty spell are usually <a href="/problems/leaf-scorch/">leaf scorch</a>.' ) .
					$list(
						array(
							'<strong>Filter the wind, do not block it.</strong> A slatted or mesh screen slows it down; a solid one can make it swirl. Where to put the screen and the pots is covered in <a href="/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a>.',
							'<strong>Keep the center of gravity low.</strong> The RHS recommends long, low planters for exposed spots. A tall plant in a light pot needs a heavier container, as Colorado State points out.',
							'<strong>Tie tall plants in.</strong> Climbers and other tall plants need fixing securely to the building or the railing, with permission if you rent (see the next section).',
							'<strong>Bring plants in from the edge in a storm.</strong> Move pots to the most sheltered corner before heavy rain, hail or strong wind.',
						)
					) .

					$h2( 'Check the rules and the weight before you buy big pots' ) .
					$p( 'A balcony that projects out from the building can carry only a limited load, and the RHS warns that the weight restrictions on such balconies are strict. Large containers of wet potting mix, the plants in them and the people using the space all count. Ask your landlord or building manager what the balcony is designed to carry, or have a structural engineer check it, before you add anything big. Heavy pots belong next to a load-bearing wall; plan the rest with <a href="/how-to-arrange-pots-in-a-small-space/">our layout guide</a>.' ) .
					$p( 'You can lighten the load. The RHS suggests fiberglass, plastic or lightweight metal containers, which also hold moisture longer than terracotta. Soilless potting mixes weigh two to three times less than mixes containing soil, according to Colorado State, though a soil-based mix holds water better and steadies a tall plant. The trade-offs between materials are compared in <a href="/how-to-choose-pots-for-vegetables/">how to choose pots for vegetables</a>.' ) .
					$p( 'If you rent, ask before you fix anything to a wall, railing or floor. The RHS reminds tenants that they may have to remove anything they add and return the space to how they found it. Climbers can scramble up canes or an obelisk in a heavy pot instead of a wall trellis. In a condo or apartment building, the association or management may also have rules about what can stand on a balcony or hang from its railing, so check those too.' ) .
					$p( 'Railing planters and window boxes save floor space, but a box full of damp potting mix is heavy. Keep it on the inside of the railing and hold it with brackets made for the load: <a href="/projects/plant-a-herb-window-box/">plant a herb window box</a> shows how. For a wall trellis, see <a href="/projects/fix-a-wire-trellis-to-a-wall/">fix wires or trellis to a balcony wall</a>.' ) .

					$h2( 'Water without bothering the neighbors' ) .
					$p( 'Many balconies have no outdoor faucet. The RHS suggests the largest watering can you can carry comfortably that still fits under the kitchen faucet; <a href="/gear/best-watering-can-for-a-balcony/">our watering can guide</a> covers what to look for. Remember, too, that the balcony above often keeps rain off your pots, so they need water even after a wet day.' ) .
					$p( 'Pots should be watered until water runs out of the base, and Clemson points out that on an upstairs balcony this can land on the neighbor below. Plan for the runoff from the start:' ) .
					$list(
						array(
							'Stand every pot on a saucer or tray, as the UC Master Gardeners advise for balconies. Clemson suggests large trays filled with coarse marble chips.',
							'Empty saucers a few hours after watering so the potting mix does not stay soaked, and take them away in winter, as the RHS advises. Pour the water onto another pot rather than over the edge.',
							'Do not let a hose or a full can overflow the rim. Pour slowly so the water soaks in.',
							'An automatic system saves carrying water, but the RHS says excess runoff should be led to a drain. See <a href="/projects/set-up-a-drip-irrigation-kit/">set up a drip watering kit</a>, or <a href="/projects/self-watering-pot/">make a self-watering pot</a>, which holds water in a reservoir instead of letting it run out.',
						)
					) .
					$p( 'For a watering routine, see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>; for hot spells, <a href="/watering-pots-in-a-heat-wave/">keeping pots alive in a heat wave</a>.' ) .

					$h2( 'Containers that work on a balcony' ) .
					$p( 'Sun, wind and a small volume of potting mix dry pots out fast, so the RHS and the extension services agree that fewer, larger containers are easier than many small ones. If you do use small pots, the RHS prefers plastic, metal or fiberglass to terracotta because they lose less moisture. Fabric grow bags are portable, as the UC Master Gardeners note; see <a href="/gear/best-grow-bags/">the best grow bags</a>.' ) .
					$p( 'Hard surfaces get hot in full sun. Clemson advises protecting plants from heat reflected off paving and suggests raising pots on pallets or similar so air moves beneath them. Pot feet lift pots too, which the RHS recommends so the roots do not sit waterlogged.' ) .

					$h2( 'Make the most of a small floor' ) .
					$list(
						array(
							'<strong>Grow up.</strong> Peas, pole beans and cucumbers climb, and NC State suggests putting a window box or trough at the foot of a trellis to train them upward. Oregon State adds that railings can serve as supports too. Clemson points out that planter boxes with trellises can even create a cool, shady corner on an apartment balcony. See <a href="/supports-for-climbing-crops/">which support for which climbing crop</a>.',
							'<strong>Hang a basket.</strong> A basket on a strong bracket uses wall space; see <a href="/projects/plant-a-vegetable-hanging-basket/">plant a vegetable hanging basket</a>.',
							'<strong>Pick compact varieties.</strong> Look for dwarf, bush or miniature types, which the extension services recommend for small containers. Each plant guide names suitable ones.',
							'<strong>Replant as you harvest.</strong> When spring crops finish, Oregon State suggests sowing the same containers with crops for late summer and fall. <a href="/succession-planting-small-spaces/">Succession planting</a> explains how to keep each pot busy.',
							'<strong>Keep room to sit.</strong> An RHS adviser who gardens on a small balcony suggests growing only what you love most, so the space stays a place to relax rather than an obstacle course.',
						)
					) .
					$p( 'Raising seedlings takes room most balconies do not have. The same RHS adviser favors crops you can sow straight into their final container, or small plants bought ready to go in; <a href="/seeds-or-young-plants/">seeds or young plants</a> compares the two.' ) .

					$h2( 'Pests and pollinators up high' ) .
					$p( 'Height changes the wildlife. The RHS notes that roof gardens and balconies tend to have fewer slugs and snails, and its adviser found bees and other pollinators reaching her third-floor balcony. The insects that eat pests may be scarce up there, though, so look over plants regularly and remove pests by hand while numbers are small. <a href="/natural-pest-control-on-a-balcony/">Natural pest control on a balcony</a> sets out the full plan.' ) .

					$h2( 'A balcony through the year' ) .
					$list(
						array(
							'<strong>Spring and fall</strong> are the RHS\'s preferred times to plant trees, shrubs and perennials on a balcony, fruit bushes included, because they settle in before the harshest weather.',
							'<strong>Fall:</strong> Clemson suggests moving container plants to a sheltered place to protect them from early frosts. A <a href="/projects/make-a-mini-cold-frame/">mini cold frame</a> or a cloche extends the season for salad crops; see <a href="/cloches-and-mini-greenhouses-on-a-balcony/">cloches and mini greenhouses on a balcony</a>.',
							'<strong>Winter:</strong> pots still need water when the potting mix is not frozen, according to the RHS. Colorado State warns that overwintering plants outdoors in containers is difficult, and that porous pots can crack as damp potting mix freezes and thaws. <a href="/protect-pots-in-winter/">Protect pots in winter</a> and <a href="/projects/wrap-pots-for-winter/">wrap pots for winter</a> cover what to do. A <a href="/plants/lemon-tree-in-pot/">lemon tree</a> enjoys a balcony in summer but needs a suitable place to spend the winter.',
							'<strong>The end of the season:</strong> with no yard to spread it on, spent potting mix needs a plan. <a href="/potting-mix-for-containers/">Potting mix for containers</a> covers refreshing and reusing it, and <a href="/composting-on-a-balcony/">composting on a balcony</a> covers plant waste; the end-of-season tasks are in <a href="/end-of-season-balcony-cleanup/">the end-of-season balcony cleanup</a>.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing tomatoes and peppers for a balcony that gets only a few hours of sun.',
							'Buying large pots before finding out what the balcony can carry.',
							'Screwing brackets into a rented balcony without asking.',
							'Watering until it pours through, with no saucer underneath.',
							'Placing a tall plant in a light pot in the windiest corner.',
							'Filling every inch with pots, leaving no room to reach them or to sit.',
						)
					),
			),
		),
	),
);
