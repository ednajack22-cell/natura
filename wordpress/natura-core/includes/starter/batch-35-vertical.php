<?php
/**
 * Starter guides, batch 35 (Small Spaces): the place guide for vertical
 * gardens. A place guide is a hub: it gives the advice that is particular to
 * growing upward when floor space is short (climbers on trellis, netting and
 * canes; shelves, tiers and towers; wall pockets and other small planters;
 * hanging baskets; the shade tall plants cast on short ones; fixings and
 * permission; watering a setup that dries out fast) and links to the guides
 * and projects that already explain supports, tying in, baskets and drip
 * kits. This guide has no plant tag, so the theme lists no plants under it,
 * and the text names crops only as examples.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from these pages, all checked 23 October 2026: Virginia
 * Cooperative Extension (Settlage and Hessler), Vertical Gardening Using
 * Trellises, Stakes, and Cages (HORT-189NP, read as the PDF in Virginia
 * Tech's VTechWorks repository); NC State Extension, Vegetable Gardening in
 * Small Spaces; Utah State University Extension, Creating Sustainable School
 * and Home Gardens: Vertical Gardening, and Ogden Botanical Gardens, Garden
 * Techniques for Limited Space; Colorado State University Extension,
 * Container Gardens; RHS How to grow veg when you're short on space, Green
 * walls, Growing plants in containers, How to water containers, Hanging
 * baskets, How to plant a hanging basket, How to grow climbers and wall
 * shrubs, Roof gardens and balconies, Gardening when you rent, How to grow
 * French beans, How to grow cucumbers and How to grow strawberries. No load
 * or weight figure is given, because none of the sources states one for
 * walls, fences, railings or baskets. Seasons replace month names.
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
	'name'   => __( 'Small Spaces: vertical gardens', 'natura-core' ),
	'guides' => array(
		'space' => array(
			'vertical-gardens' => array(
				'image_prompt' => 'A narrow sunny patio against a pale brick wall in summer, planted almost entirely upward: pole beans with heart-shaped leaves and slender green pods twining up taut galvanized wires fixed to the wall above a long trough, a cucumber with rough, lobed leaves and curling tendrils gripping green plastic netting on canes in a second trough, a row of felt pocket planters on the wall holding loose-leaf lettuce and parsley, a hanging basket of trailing strawberries with red fruit on a sturdy wall bracket, and a short trough of lettuce on the sunny side in front of the climbers, a thin black drip line running along the foot of the wall, soft midday light.' . $photo_end,
				'pin_prompt'   => 'A sunny wall turned into a food garden, photographed vertically: pole beans climbing wires above a trough, felt pocket planters of lettuce and herbs, a hanging basket of strawberries on a strong bracket and a low trough of salad greens in front, warm summer light.' . $pin_end,
				'title'        => 'How to Grow Food Up Walls, Fences and Trellises',
				'short_name'   => 'Vertical gardens',
				'order'        => 5,
				'space_term'   => '',
				'excerpt'      => 'Train climbing crops such as pole beans, peas and cucumbers up netting, wires or canes, and use shelves, wall pockets and hanging baskets for small crops. Then plan for what height brings: short plants on the sunny side, fixings agreed with the owner, and small planters that dry out fast.',
				'related'      => array(
					'post'    => array( 'supports-for-climbing-crops' ),
					'project' => array(
						'fix-a-wire-trellis-to-a-wall',
						'plant-a-vegetable-hanging-basket',
						'make-a-pea-netting-support',
						'set-up-a-drip-irrigation-kit',
						'grow-a-squash-up-a-trellis-in-a-pot',
						'plant-a-strawberry-planter',
					),
					'gear'    => array(
						'best-plant-supports-for-pots',
						'best-drip-irrigation-kit-for-pots',
					),
				),
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Trellis netting with a mesh of 4 in (10 cm) or less', 'note' => 'Small enough for tendrils to find, open enough to reach through when you pick.', 'url' => '' ),
						array( 'name' => 'Long trough to stand at the foot of a trellis', 'note' => 'Gives climbers a deep root run along the base of a wall or fence.', 'url' => '' ),
						array( 'name' => 'Open shelf unit or plant stand', 'note' => 'Holds several small pots at different heights against a wall.', 'url' => '' ),
						array( 'name' => 'Fabric or plastic wall pocket planter', 'note' => 'Turns a blank wall or fence into space for salad greens and herbs.', 'url' => '' ),
						array( 'name' => 'Drip watering kit with a timer', 'note' => 'Waters many small planters at once, slowly and at the roots.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How large should the holes in trellis netting be for vegetables?', 'answer' => 'Virginia Cooperative Extension suggests netting or fencing with openings no more than about 4 in (10 cm) across, so that climbing crops can catch hold easily. A mesh that size is also wide enough to slip a hand through when you harvest.' ),
						array( 'question' => 'Which side of a trellis should shorter crops go on?', 'answer' => 'Put small sun-loving crops, such as bush beans, peppers and eggplant, on the south side of taller climbers so they are not shaded. Lettuce and other cool-season leaves can go on the shady side, where the climbers keep them cooler.' ),
						array( 'question' => 'Can I grow food on a fence I do not own?', 'answer' => 'Only with the owner\'s permission: the RHS reminds renters that fixing anything to a wall or fence needs the property owner\'s agreement. Without it, stand a trough in front of the fence with its own canes, netting frame or obelisk, so nothing touches the fence itself.' ),
						array( 'question' => 'Do wall pocket planters need more watering than ordinary pots?', 'answer' => 'Usually, yes. Each pocket holds only a little potting mix, and small, shallow containers dry out faster than large ones. The RHS notes that living wall systems often need irrigation, so plan for a drip line or a self-watering design before you plant.' ),
						array( 'question' => 'How do I support heavy fruit on a climbing plant?', 'answer' => 'Give each fruit a sling. NC State suggests tying a piece of hose or netting to the support as a hammock for melons, and Virginia Cooperative Extension mentions slings made from old T-shirts or mesh bags. The sling takes the weight off the stalk.' ),
					),
					'sources'  => array(
						array( 'title' => 'Virginia Cooperative Extension (Settlage and Hessler) — Vertical Gardening Using Trellises, Stakes, and Cages (HORT-189NP)', 'url' => 'https://vtechworks.lib.vt.edu/handle/10919/99560' ),
						array( 'title' => 'NC State Extension — Vegetable Gardening in Small Spaces', 'url' => 'https://content.ces.ncsu.edu/mini-gardening' ),
						array( 'title' => 'Utah State University Extension — Creating Sustainable School and Home Gardens: Vertical Gardening', 'url' => 'https://qanr.usu.edu/smart-foodscapes/files/Vertical_Gardening_May2024.pdf' ),
						array( 'title' => 'Utah State University Extension, Ogden Botanical Gardens — Garden Techniques for Limited Space', 'url' => 'https://extension.usu.edu/ogdenbotanicalgardens/edible-garden-techniques' ),
						array( 'title' => 'Colorado State University Extension — Container Gardens', 'url' => 'https://extension.colostate.edu/resource/container-gardens/' ),
						array( 'title' => 'RHS — How to grow veg when you\'re short on space', 'url' => 'https://www.rhs.org.uk/garden-inspiration/grow-your-own/how-to-grow-veg-small-spaces' ),
						array( 'title' => 'RHS — Green walls', 'url' => 'https://www.rhs.org.uk/garden-features/green-walls' ),
						array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'RHS — Hanging baskets', 'url' => 'https://www.rhs.org.uk/container-gardening/hanging-baskets' ),
						array( 'title' => 'RHS — How to plant a hanging basket', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-plant-a-hanging-basket' ),
						array( 'title' => 'RHS — How to grow climbers and wall shrubs', 'url' => 'https://www.rhs.org.uk/plants/types/climbers/growing-guide' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — Gardening when you rent', 'url' => 'https://www.rhs.org.uk/garden-inspiration/garden-types/how-to-garden-when-you-rent' ),
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
					),
				),
				'content'      =>
					$p( 'When the floor is full, the walls, fences and railings around it are still empty. Growing upward turns that space into planting room, whether you have a balcony, a patio, a deck or a narrow side yard. Virginia Cooperative Extension adds that crops trained upward are easier to pick, tend to give cleaner fruit and get more air through their leaves, which lowers the pressure from disease. This guide covers what changes when a garden goes vertical. Supports, tying in and the individual crops have their own pages, linked as you go.' ) .

					$h2( 'Three ways to use height' ) .
					$list(
						array(
							'<strong>Climbers on a support.</strong> Crops with long vines, such as pole beans, peas, cucumbers, melons, small squashes and tall (indeterminate) tomatoes, grow in a trough or large pot and climb a trellis, netting or canes above it.',
							'<strong>Planters fixed or hung up high.</strong> Wall pockets, hanging baskets and window boxes lift small, shallow-rooted crops such as salad greens, herbs and strawberries off the floor.',
							'<strong>Pots stacked on a frame.</strong> Shelves, ladders, tiered stands and towers hold many small pots in the footprint of one.',
						)
					) .
					$p( 'Most small spaces end up using all three. The rest of this guide takes them one at a time, then deals with what they share: shade, fixings and water.' ) .

					$h2( 'Climbers on trellis, netting and canes' ) .
					$p( 'Climbing crops hold on in different ways: peas and cucumbers wrap tendrils around thin strands, pole beans twist their whole stem around a pole, and tomatoes have to be tied. <a href="/supports-for-climbing-crops/">Which support for which climbing crop</a> matches each one to its support. What matters in a vertical setup is the frame as a whole:' ) .
					$list(
						array(
							'<strong>Put the root run at the foot of the support.</strong> NC State suggests standing a window box at the base of a trellis or fence and training peas, beans or cucumbers up from it. A long trough does the same job with more room for roots.',
							'<strong>Choose the right mesh.</strong> Virginia Cooperative Extension advises openings no more than about 4 in (10 cm) across, so the plants can climb easily. Guide or tie young shoots onto it until they take hold.',
							'<strong>Build for the full crop.</strong> Whatever you use, from bamboo canes to a wire panel, it has to carry the plant and all its fruit, the same publication warns. Climbing beans, for example, reach about 6 ft (2 m), according to the RHS, and need supports to match.',
							'<strong>Cradle heavy fruit.</strong> Melons and squashes hang heavy from a vine. NC State suggests a hammock of netting or hose tied to the fence under each fruit; Virginia Cooperative Extension mentions slings cut from old T-shirts or mesh bags.',
						)
					) .
					$p( 'Climbers need a big container: the RHS says climbing beans do best in the ground but can be grown in large containers, and that they keep cropping for longer than dwarf beans. The step-by-step projects are <a href="/projects/make-a-pea-netting-support/">a pea netting support for a trough</a>, <a href="/projects/make-a-bean-tepee-in-a-pot/">a bean tepee in a pot</a>, <a href="/projects/make-a-string-support-for-tomatoes/">a string support for tomatoes</a> and <a href="/projects/grow-a-squash-up-a-trellis-in-a-pot/">a squash up a trellis</a>. Crop by crop, see <a href="/plants/peas-in-pots/">peas</a>, <a href="/plants/green-beans-in-pots/">green beans</a>, <a href="/plants/runner-beans-in-pots/">runner beans</a>, <a href="/plants/cucumbers-in-pots/">cucumbers</a> and <a href="/plants/melons-in-pots/">melons</a> in pots.' ) .
					$p( 'A row of climbers can also double as a screen. NC State describes cucumbers on a fence as a good temporary screen, and its figures suggest that 6 to 8 ft (1.8 to 2.4 m) of fence can give enough cucumbers to eat fresh and to pickle.' ) .

					$h2( 'Shelves, ladders, tiered stands and towers' ) .
					$p( 'A frame of shelves puts many pots against a wall or fence in very little floor space. The RHS suggests open-shelved stands (étagères) and plant theaters for balconies and corners, an old wooden ladder with a pot of herbs on each rung, and wooden shelving that can serve as a living screen, even on casters so it can be moved. Utah State University Extension lists stackable planters, shelving and garden towers among the ready-made options, and points out that buckets, cans, pipes and old fencing can be reused too.' ) .
					$list(
						array(
							'<strong>Keep it steady.</strong> The RHS warns that tall, narrow containers blow over easily, especially with tall plants in them. Put the heaviest pots on the lowest shelf, a few bricks or stones in the base of tall pots, and the whole stand in a sheltered spot.',
							'<strong>Give each tier enough light.</strong> Upper shelves shade lower ones. Put the crops that need the most sun at the top and front, and leafy crops lower down.',
							'<strong>Be wary of side pockets for strawberries.</strong> The RHS says the traditional strawberry pots with planting holes round the sides look good but make it harder to keep plants healthy and productive. A trough raised on a stand is simpler; see <a href="/projects/plant-a-strawberry-planter/">plant a raised strawberry planter</a> and <a href="/plants/balcony-strawberry/">strawberries in pots</a>.',
						)
					) .

					$h2( 'Wall pockets, gutters and other small planters' ) .
					$p( 'Pocket planters made of fabric or plastic hang on a wall, fence or window ledge and fill a bare surface quickly. The RHS suggests them for fruit, salad greens and herbs, and its green walls guide names edible crops that suit wall systems, among them strawberries, Swiss chard, chives, lettuce, parsley and arugula. Lengths of plastic gutter are sometimes used in the same way, but they are shallow, and the RHS says shallow containers dry out quickly and suit small, drought-tolerant plants best. For a gutter used as a seed tray, see <a href="/projects/sow-peas-in-a-gutter/">make a gutter seed tray for peas</a>.' ) .
					$p( 'Every one of these holds only a little potting mix. The RHS points out that small and shallow containers dry out faster than large ones, and that living wall systems often need irrigation. A few habits help:' ) .
					$list(
						array(
							'<strong>Group plants by their needs.</strong> The RHS advises choosing plants for a wall that share similar light and moisture needs, which keeps watering simple.',
							'<strong>Match the plants to the wall.</strong> If the wall gets less than half a day of sun in midsummer, the RHS recommends plants that tolerate shade, which for food means leafy crops and herbs rather than fruiting ones. See <a href="/what-to-grow-on-a-shady-balcony/">what to grow on a shady balcony</a>.',
							'<strong>Start small.</strong> The RHS suggests putting plants into wall systems as small as possible, ideally as plugs, and names spring as the best time to plant, when growth is picking up.',
							'<strong>Mind the rain shadow.</strong> Walls, fences and eaves keep rain off the plants beside them, so the RHS says those plants need particular attention to watering, especially in summer.',
						)
					) .

					$h2( 'Hanging baskets for food' ) .
					$p( 'A hanging basket uses air that would otherwise be empty. The RHS lists herbs, salad greens, trailing (tumbling) tomatoes and strawberries among the edible plants that suit one. <a href="/projects/plant-a-vegetable-hanging-basket/">Plant a vegetable hanging basket</a> shows how to line, fill and plant it; here is what to plan before it goes up.' ) .
					$list(
						array(
							'<strong>Plan the watering first.</strong> The RHS notes that baskets dry out faster than other containers and lose water easily. Check them every day in summer by nudging the basket from below: if it feels light, it needs water.',
							'<strong>Hang it where you can water it.</strong> If the basket is too heavy to lift down, the RHS suggests a hose on a fine spray. A basket that dries out completely is hard to rewet, so pour slowly.',
							'<strong>Think about the weight.</strong> A soil-based potting mix helps a long-term planting but, as the RHS reminds us, it makes the basket heavier. Hang it from a strong bracket on a solid wall, with well-supported fixings.',
							'<strong>Catch what runs through.</strong> If a basket dries to the point of wilting, the RHS suggests a bucket underneath to catch the water that runs out, so you can pour it back.',
						)
					) .

					$h2( 'Place tall plants so they do not shade short ones' ) .
					$p( 'A wall of beans or cucumbers casts a long shadow, which can help or hinder the pots around it. Virginia Cooperative Extension advises putting short, sun-loving crops such as bush beans, eggplant and peppers on the south side of taller crops so they still get full sun. The shade on the other side is useful: lettuce may benefit from the cooler conditions there, and Utah State\'s Ogden Botanical Gardens notes that trellises can shade cool-weather crops.' ) .
					$p( 'Use the space beneath climbers while they are small. The same Virginia Tech publication suggests quick crops such as radishes, turnips and lettuce at their feet, picked before the taller plants fill in. Where a spot gets sun for only part of the day, such as next to a building, NC State prefers morning sun. <a href="/how-to-arrange-pots-in-a-small-space/">How to arrange pots in a small space</a> covers mapping the sun around your space.' ) .

					$h2( 'Fixings, weight and permission' ) .
					$p( 'Anything you screw, clamp or hang on a wall, fence or railing has to carry wet potting mix, plants, fruit and the push of the wind. The RHS advises making sure that the fixings for any trellis or screen are well supported. Heavy containers belong near load-bearing walls, it adds, and containers filled with a lightweight mix may need fixing in place so they do not blow over. None of the sources gives a safe load for a wall, fence or railing, so when in doubt, ask the building\'s owner or manager; for a roof or balcony, the RHS recommends a chartered structural engineer or a surveyor.' ) .
					$p( 'Ask before you drill. The RHS reminds renters that they need the property owner\'s permission to attach anything to a wall or fence, and that climbers can just as well scramble up canes or obelisks standing in their own pots. A freestanding frame in a heavy trough avoids fixings altogether. When you do have permission, <a href="/projects/fix-a-wire-trellis-to-a-wall/">fix wires or trellis to a wall</a> shows how to space the wires and keep them clear of the surface. Balcony rules and railings are covered in <a href="/small-spaces/balconies/">growing food on a balcony</a>.' ) .

					$h2( 'Water a vertical garden without spending all day on it' ) .
					$p( 'A wall of small planters and baskets can mean dozens of separate pots to water, many of them hard to reach. Watering by hand still works, and <a href="/how-often-to-water-container-plants/">how often to water container plants</a> explains how to judge it. For a bigger setup, consider an automatic system:' ) .
					$list(
						array(
							'<strong>Drip irrigation.</strong> The RHS suggests drip systems where you have many baskets, because they deliver water slowly and straight to the roots. A timer helps, but the settings still need changing as plants grow and the weather shifts. Most kits need clean water under pressure from a faucet. See <a href="/projects/set-up-a-drip-irrigation-kit/">set up a drip watering kit</a> and <a href="/gear/best-drip-irrigation-kit-for-pots/">the best drip irrigation kits for pots</a>.',
							'<strong>Self-watering containers.</strong> Colorado State notes that self-watering systems may cut down on watering. The same page adds that research in Colorado found water-holding gels did not hold enough water to stretch the time between waterings. See <a href="/projects/self-watering-pot/">make a self-watering pot</a>.',
							'<strong>Aspect.</strong> A south- or west-facing wall dries pots faster than a north- or east-facing one, the RHS notes, so planters on a sunny wall need the closest watch.',
						)
					) .
					$p( 'Going away? <a href="/watering-pots-when-on-holiday/">Watering pots while you are away</a> covers the options.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Putting the support in after the climbers have started to sprawl.',
							'Using a frame too flimsy for the weight of a full crop of fruit.',
							'Standing peppers and other short sun-lovers in the shadow of a bean wall.',
							'Filling a wall with tiny pockets and no plan for watering them in summer.',
							'Fixing brackets or trellis to a wall or fence without the owner\'s permission.',
							'Hanging a basket so high that you cannot check or water it easily.',
						)
					),
			),
		),
	),
);
