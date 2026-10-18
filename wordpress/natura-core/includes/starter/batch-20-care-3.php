<?php
/**
 * Starter guides, batch 20 (choosing pots and planning a small space): six
 * Plant Care articles on choosing containers, mulching pots, hand
 * pollination, and three choosing guides (windowsill, shady balcony,
 * beginners) that compare crops and link to their plant guides.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the two differ, the RHS is
 * followed. Pot sizes and harvest times in the choosing guides are the
 * ones given in each crop's own plant guide. Months are for a temperate
 * climate such as the UK.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

$p    = 'natura_core_demo_p';
$h2   = 'natura_core_demo_h2';
$list = 'natura_core_demo_list';

$book = array(
	'title' => 'Jo Whittingham, Backyard Harvest: A Year-Round Guide to Growing Fruit and Vegetables (DK, 2011)',
	'url'   => '',
);

$rhs_containers = array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' );
$rhs_veg_pots   = array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' );

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Choosing pots and planning a small space', 'natura-core' ),
	'guides' => array(
		'post' => array(
			'how-to-choose-pots-for-vegetables'          => array(
				'image_prompt' => 'A row of empty containers on a sunny balcony floor, ready for planting: an unglazed terracotta pot, a lightweight plastic pot in a terracotta colour, a wooden trough, a galvanised metal tub and an old enamel washing-up bowl with holes drilled in its base, one pot tipped slightly to show the drainage holes underneath, a bag of peat-free compost leaning against the wall, soft morning light.' . $photo_end,
				'pin_prompt'   => 'A wide terracotta pot, a tall plastic pot and a wooden crate lined with an old compost bag standing together on a small balcony, a young tomato plant waiting in its nursery pot beside them, photographed vertically from slightly above.' . $pin_end,
				'title'        => 'How to Choose Pots for Growing Vegetables',
				'topic'        => 'soil-feeding',
				'excerpt'      => 'Pick a container with drainage holes and as much compost as your space and floor allow: for most vegetables, aim for about 45 cm (18 in) wide and deep. Then choose the material by its trade-offs: terracotta dries fast and can crack in frost, plastic is light and holds water, metal heats up, wood eventually rots.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Containers with drainage holes in the base', 'note' => 'The one feature every pot must have.', 'url' => '' ),
						array( 'name' => 'Frost-proof terracotta pots', 'note' => 'Labelled frost-proof, not just frost-resistant, for pots left outside all year.', 'url' => '' ),
						array( 'name' => 'Pots made from recycled plastic', 'note' => 'Light to carry up stairs and slower to dry out than clay.', 'url' => '' ),
						array( 'name' => 'Pot feet or bricks', 'note' => 'Lift pots so the drainage holes stay clear.', 'url' => '' ),
						array( 'name' => 'Growing bags', 'note' => 'Cheap, light and often filled with reasonable compost.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is terracotta or plastic better for vegetables?', 'answer' => 'Neither is better in every case. Unglazed terracotta is porous, so the compost dries out sooner, and it can crack in frost. Plastic is lighter, holds moisture longer and costs less, but it can degrade in sunlight. On a hot, windy balcony, a pot that holds water longer means less watering.' ),
						array( 'question' => 'Can I grow vegetables in a container with no drainage holes?', 'answer' => 'Not safely. Water collects at the bottom, the compost becomes waterlogged and the roots can rot. Drill or punch holes in the base of any container you reuse, including buckets, tubs and old sinks.' ),
						array( 'question' => 'What is the minimum pot size for vegetables?', 'answer' => 'The RHS suggests aiming for containers at least 45 cm (18 in) deep and wide; smaller pots dry out and run short of nutrients sooner. Quick, shallow-rooted crops such as radishes and salad leaves manage in a 30 cm (1 ft) wide pot; each plant guide gives the size for its crop.' ),
						array( 'question' => 'Are metal planters a good idea on a sunny balcony?', 'answer' => 'They are frost-proof and long-lasting, but metal heats up quickly in summer and gets very cold in winter, and the roots feel both extremes.' ),
					),
					'sources'  => array(
						$rhs_containers,
						$rhs_veg_pots,
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'The container decides how much water and food a vegetable can reach, how often you will water, and how much weight sits on your balcony. Get it right and the rest of the season is easier. This guide covers the choice itself: size, shape and material.' ) .

					$h2( 'Start with drainage holes' ) .
					$p( 'The RHS calls drainage holes essential. Without them, water gathers at the bottom, the compost turns sodden and the roots can rot, especially in winter. Check every pot you buy, and make holes in anything you reuse. Standing pots on pot feet or bricks keeps the holes clear.' ) .

					$h2( 'Go as big as your space allows' ) .
					$p( 'More compost holds more water and more food. Small containers can leave vegetables short of moisture and nutrients, so the RHS suggests aiming for pots at least 45 cm (18 in) deep and wide. A large pot also dries out more slowly than a small one, and a few big containers are less work, and often look better, than many small ones.' ) .
					$p( 'Some crops manage with less. These sizes come from our plant guides:' ) .
					$list(
						array(
							'<strong>About 30 cm (1 ft) wide:</strong> <a href="/plants/radishes-in-pots/">radishes</a>, <a href="/plants/salad-greens-in-pots/">salad leaves</a> and <a href="/plants/green-onions-in-pots/">spring onions</a>.',
							'<strong>About 40–45 cm (16–18 in) wide:</strong> <a href="/plants/beets-in-pots/">beetroot</a>, <a href="/plants/swiss-chard-in-pots/">Swiss chard</a>, <a href="/plants/peas-in-pots/">peas</a> and one <a href="/plants/zucchini-in-pots/">courgette</a> plant.',
							'<strong>20–30 litres per plant:</strong> a <a href="/plants/cherry-tomato/">cherry tomato</a>.',
							'<strong>45–50 cm (18–20 in) wide and deep:</strong> fruit trees such as the <a href="/plants/apple-tree-in-pot/">apple</a> and <a href="/plants/pear-tree-in-pot/">pear</a>.',
						)
					) .
					$p( 'The exception is a single long-lived plant such as a bay or a lemon. Give it a pot only a little larger than its root ball: surplus compost stays wet and can rot the roots. Our guide to <a href="/plant-care/how-to-repot-container-plants/">repotting</a> explains how to move it up in stages.' ) .

					$h2( 'Think about shape' ) .
					$list(
						array(
							'<strong>Shallow bowls</strong> dry out quickly, so keep them for small, drought-tolerant plants such as thyme.',
							'<strong>Tall, narrow pots</strong> blow over easily, especially with a tall crop in them. Put a layer of bricks or stones in the base for weight, and stand them in a sheltered spot.',
							'<strong>Urn-shaped pots</strong>, wider in the middle than at the rim, make it hard to get the plant out later. Avoid them for anything you will keep for years.',
							'<strong>Troughs and window boxes</strong> suit rows of quick crops and fit along a railing or ledge.',
						)
					) .

					$h2( 'Compare the materials' ) .
					$list(
						array(
							'<strong>Terracotta and clay:</strong> attractive and long-lasting if looked after, but unglazed pots are porous, so the compost dries sooner. Terracotta can also crack in frost: for pots that stay out all winter, buy ones sold as frost-proof rather than frost-resistant.',
							'<strong>Plastic:</strong> lighter than terracotta, slower to dry out and much cheaper, in many colours and finishes. It can break down in strong sun and may not be recyclable, so look for pots made from recycled plastic.',
							'<strong>Metal:</strong> frost-proof, durable and modern-looking, but expensive, and it heats up fast in summer and turns very cold in winter. Some metals corrode over time.',
							'<strong>Wood:</strong> troughs, crates and half-barrels are inexpensive and sustainable. Wood rots in time; lining it with an old compost bag with holes punched in the base, or painting it with wood preserver, makes it last longer.',
							'<strong>Recycled containers:</strong> almost any large container can grow food, from a tin bath or an old sink to a metal dustbin. Empty compost bags work for potatoes. Make drainage holes first.',
						)
					) .
					$p( 'Plants are just as happy in a plain plastic pot or a growing bag as in an expensive one, as long as the water can drain away. Spend on size before looks.' ) .

					$h2( 'Weight and wind on a balcony' ) .
					$p( 'Plastic and growing bags weigh far less than clay, which matters when you carry compost up stairs or have a floor limit. Large pots of wet compost are heavy whatever they are made of; our guide to <a href="/plant-care/how-to-arrange-pots-in-a-small-space/">arranging pots in a small space</a> covers where to put the heaviest ones and how to plan around wind.' ) .

					$h2( 'Special containers' ) .
					$list(
						array(
							'<strong>Growing bags:</strong> often good value, with reasonable compost already inside. The RHS lists them among the options for strawberries.',
							'<strong>Strawberry pots with side pockets:</strong> they look attractive, but the RHS finds they make healthy, productive plants harder to keep. A large plain pot is easier: see our <a href="/plants/balcony-strawberry/">strawberry guide</a>.',
							'<strong>Self-watering pots:</strong> a water reservoir in the base cuts down daily watering. You can <a href="/diy-projects/self-watering-pot/">make one yourself</a>.',
						)
					) .
					$p( 'Whatever you choose, fill it with peat-free compost suited to the crop; <a href="/plant-care/potting-mix-for-containers/">compost for containers</a> explains which.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a pot with no drainage holes, or forgetting to make them in a reused one.',
							'Choosing many small pots that need water twice a day in July.',
							'Putting a small plant straight into a huge pot, so the extra compost stays wet.',
							'Leaving frost-resistant (rather than frost-proof) terracotta outside all winter.',
							'Standing a tall, narrow pot in the windiest corner with nothing heavy in the base.',
						)
					),
			),

			'how-to-mulch-pots'                          => array(
				'image_prompt' => 'Close view of three pots on a sunny patio table, each topped with a different mulch: a terracotta pot of thyme dressed with pale grey grit, a blueberry bush in a glazed pot with a layer of chipped pine bark, and a pot of chard covered with dark crumbly garden compost kept clear of the stems, late spring light.' . $photo_end,
				'pin_prompt'   => 'A hand scattering fine gravel around a young rosemary plant in a terracotta pot on a balcony, with a small bag of grit beside it, photographed vertically from above.' . $pin_end,
				'title'        => 'How to Mulch Pots and Containers',
				'topic'        => 'watering',
				'excerpt'      => 'A mulch is a layer of material such as garden compost, chipped bark or gravel spread over the compost in a pot, which slows the loss of water from the surface. Choose the material to suit the plant, lay it on moist compost and keep it off the stems.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Chipped or composted bark', 'note' => 'A tidy organic mulch for shrubs and fruit in pots.', 'url' => '' ),
						array( 'name' => 'Horticultural grit or fine gravel', 'note' => 'For thyme, rosemary and other plants that dislike damp around their stems.', 'url' => '' ),
						array( 'name' => 'Composted pine bark or pine needles', 'note' => 'An acid mulch for blueberries.', 'url' => '' ),
						array( 'name' => 'Straw or strawberry mats', 'note' => 'Keeps ripening strawberries off damp compost.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Does mulching mean I can water my pots less?', 'answer' => 'A little less, but not much. Mulch slows evaporation from the compost surface, but the RHS points out that most water leaves a pot through the leaves, so you still need to check and water regularly.' ),
						array( 'question' => 'Can I use mushroom compost as a mulch?', 'answer' => 'It is better avoided. Spent mushroom compost often contains some peat, which the RHS no longer recommends, and it is alkaline, so it does not suit acid-loving plants such as blueberries.' ),
						array( 'question' => 'What is the white mould under my bark mulch?', 'answer' => 'Usually the threads of harmless fungi that feed on dead organic matter. The RHS says there is no need to remove the mulch or the fungus.' ),
						array( 'question' => 'Can I feed a pot without removing the mulch?', 'answer' => 'Yes. The RHS says there is no need to remove a mulch before applying fertiliser: watering carries it down to the roots. See our guide to feeding container plants for the routine.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Mulches and mulching', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/mulch' ),
						array( 'title' => 'RHS — How to mulch with organic matter', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/how-to-mulch-with-organic-matter' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'RHS — Fruit trees: feeding and mulching', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/feeding-and-mulching' ),
						array( 'title' => 'RHS — How to grow thyme', 'url' => 'https://www.rhs.org.uk/herbs/thyme/grow-your-own' ),
						array( 'title' => 'RHS — How to grow blueberries', 'url' => 'https://www.rhs.org.uk/fruit/blueberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — Powdery mildews', 'url' => 'https://www.rhs.org.uk/disease/powdery-mildews' ),
					),
				),
				'content'      =>
					$p( 'In a garden, mulch is spread over whole beds. In a pot it covers only a small circle of compost, but it still does useful work: it slows drying, keeps weeds out and evens out the temperature around the roots. This guide covers what to use on which plants, and how to lay it.' ) .

					$h2( 'What a mulch does in a pot' ) .
					$list(
						array(
							'It reduces the water lost by evaporation from the compost surface.',
							'It shields the roots from extremes of heat and cold.',
							'It stops weed seeds that blow in from germinating, because they get no light.',
							'An organic mulch slowly adds nutrients and organic matter as it breaks down.',
						)
					) .
					$p( 'Be realistic about the first point. Most of the water a potted plant uses goes out through its leaves, so a mulch helps but never replaces regular watering; <a href="/plant-care/how-often-to-water-container-plants/">how often to water</a> covers the routine. On its powdery mildew page, the RHS also suggests mulch to help the compost hold water.' ) .

					$h2( 'Organic or mineral mulch?' ) .
					$p( '<strong>Organic mulches</strong> rot down and need topping up: garden compost, leafmould, chipped or composted bark, and straw. <strong>Mineral mulches</strong> such as gravel, grit, slate, pebbles, shells or tumbled glass last for years and look decorative, but add no nutrients. Avoid anything made of plastic.' ) .
					$p( 'Colour matters in a sunny spot. A dark mulch warms the compost in the sun, while a light one such as pale gravel reflects sunlight and keeps the roots cooler.' ) .

					$h2( 'Which mulch for which plant' ) .
					$list(
						array(
							'<strong>Thyme, rosemary and other Mediterranean herbs:</strong> grit or gravel. The RHS warns that an organic mulch can hold too much moisture around low, spreading thyme; a layer of grit keeps the foliage off damp compost. See <a href="/plants/thyme-in-pots/">thyme</a> and <a href="/plants/rosemary-in-pots/">rosemary</a>.',
							'<strong>Blueberries:</strong> an acid organic mulch 5–7.5 cm (2–3 in) deep in late winter or early spring: pine bark, pine needles or leafmould, never manure. More in our <a href="/plants/blueberries-in-pots/">blueberry guide</a>.',
							'<strong>Strawberries:</strong> once the fruits start to form, slip straw, a biodegradable mat or a strawberry collar under them so they stay clean and dry. Take straw away in autumn, when it can shelter slugs and fungal disease.',
							'<strong>Fruit trees and bushes in large pots:</strong> chipped bark or garden compost, kept clear of the trunk.',
							'<strong>Leafy crops such as chard:</strong> a thin layer of garden compost helps hold moisture; keep it away from the stalks.',
						)
					) .

					$h2( 'When to mulch' ) .
					$p( 'Mid to late spring and autumn are the usual times, and a new planting can be mulched at any time of year. Always lay mulch on compost that is already moist, after removing any weeds, and never when the compost is frozen: mulch keeps in the conditions it covers, wet or dry.' ) .

					$h2( 'How to do it' ) .
					$list(
						array(
							'Water the pot well first, or mulch after rain.',
							'Pull out any weeds.',
							'Spread the mulch evenly over the compost. In the open ground the RHS recommends at least 5 cm (2 in); in a pot, keep the layer below the rim so water does not wash it over the edge.',
							'Leave a gap around stems and trunks: mulch piled against them can soften the bark and let disease in.',
							'Top up organic mulch as it rots away, rather than piling fresh layers on top of old ones, which can form a crust that water struggles to get through.',
						)
					) .
					$p( 'If you only have freshly chipped wood, store it for a few weeks before use. Fresh chippings encourage soil microorganisms that use up nitrogen the plant needs.' ) .

					$h2( 'Problems to watch for' ) .
					$list(
						array(
							'Mulch gives slugs and snails a place to hide: check under it, especially around leafy crops. See <a href="/problems/slugs-and-snails/">slugs and snails</a>.',
							'Birds may scatter loose mulch across a balcony.',
							'Bought organic mulch can carry weed seeds, pests or diseases, so buy from a reliable source.',
							'White threads of fungus in an organic mulch are harmless.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Spreading mulch over dry compost, which then stays dry underneath.',
							'Piling mulch up against stems and trunks.',
							'Using an organic mulch around thyme and other plants that rot in damp.',
							'Putting manure or mushroom compost around blueberries.',
							'Assuming a mulched pot no longer needs checking in hot weather.',
						)
					),
			),

			'how-to-hand-pollinate-fruit-and-vegetables' => array(
				'image_prompt' => 'Close-up of a courgette plant in a large pot on a sunny balcony: a hand holding a picked male flower with its petals removed, its pollen-covered centre pressed into an open yellow female flower that has a small green courgette behind it, large lobed leaves around, summer morning light.' . $photo_end,
				'pin_prompt'   => 'A small soft paintbrush touching the centre of a white strawberry flower on a potted plant under a clear cloche on a balcony, photographed vertically.' . $pin_end,
				'title'        => 'How to Hand-Pollinate Fruit and Vegetables',
				'topic'        => 'light-position',
				'excerpt'      => 'Hand pollination is only worth doing where insects cannot reach the flowers or are scarce: crops under cover, early-flowering peaches, and courgettes in a cold spell. Move pollen with a soft paintbrush, or for courgettes press a male flower into the female ones.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Small soft paintbrush', 'note' => 'For strawberries, peaches, nectarines and aubergines.', 'url' => '' ),
						array( 'name' => 'Plant labels', 'note' => 'Mark the female flowers you have pollinated.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I tell a male courgette flower from a female one?', 'answer' => 'A female flower has a small swelling, the future courgette, at its base. A male flower sits on a plain, thin stalk with no swelling behind it.' ),
						array( 'question' => 'Why does my young courgette plant have only male flowers?', 'answer' => 'Young plants usually produce male flowers first. Female flowers follow as the plant matures and the season goes on, and the balance evens out. Cold, dull weather can also delay them.' ),
						array( 'question' => 'Do I need to hand-pollinate my lemon tree?', 'answer' => 'No. Citrus plants are self-fertile and their flowers do not need help. Raising the humidity around the plant, especially indoors in winter, helps more.' ),
						array( 'question' => 'Should I hand-pollinate crops growing outside on my balcony?', 'answer' => 'Usually not. Bees and other insects do the job outdoors. Help only when flowers fail to set fruit in a long cold, wet or windy spell, or when the plants are under a cover that keeps insects out.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Courgette, marrow, pumpkin and squash: fruit and flowering problems', 'url' => 'https://www.rhs.org.uk/problems/courgette-marrow-pumpkin-and-squash' ),
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow peaches', 'url' => 'https://www.rhs.org.uk/fruit/peaches/grow-your-own' ),
						array( 'title' => 'RHS — How to grow nectarines', 'url' => 'https://www.rhs.org.uk/fruit/nectarines/grow-your-own' ),
						array( 'title' => 'RHS — How to grow aubergines', 'url' => 'https://www.rhs.org.uk/vegetables/aubergines/grow-your-own' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow grapes', 'url' => 'https://www.rhs.org.uk/fruit/grapes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow citrus', 'url' => 'https://www.rhs.org.uk/fruit/citrus/grow-your-own' ),
						array( 'title' => 'RHS — Fruit pollination', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/fruit-basics/fruit-pollination' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Most fruit and fruiting vegetables need pollen moved onto their flowers before fruit can form. Bees, bumblebees, flies, beetles and wasps normally do this. Hand pollination means doing the insects\' job yourself, and it only pays off in a few situations: when a cover keeps insects away, when a crop flowers before many insects are about, or in a cold spell that keeps them grounded.' ) .

					$h2( 'When it is worth doing' ) .
					$list(
						array(
							'Plants in a greenhouse, cold frame, porch or under a cloche, where insects find it hard to get in.',
							'Peaches and nectarines, which flower in early spring when few insects are flying.',
							'Courgettes and squashes in a cool, dull early summer, when small fruits shrivel or rot because they were not pollinated.',
						)
					) .
					$p( 'If your crops are outside and setting fruit, leave the insects to it.' ) .

					$h2( 'Courgettes, squashes and pumpkins' ) .
					$p( 'These plants carry separate male and female flowers on the same plant. The female has a tiny fruit at its base; the male has none. Pollen has to travel from a male flower to a female one, which insects usually manage. When they do not, the RHS method is simple:' ) .
					$list(
						array(
							'Find a male flower that is fully open and pick it.',
							'Gently pull off its petals to expose the pollen-covered centre.',
							'Press that centre into the middle of an open female flower.',
							'Move on to the next female: one male flower can pollinate several.',
						)
					) .
					$p( 'Early in the season young plants often make only male flowers, so there is nothing to pollinate yet. In very hot weather, or in a stuffy greenhouse, the opposite can happen and male flowers become scarce. Growing tips are in our <a href="/plants/zucchini-in-pots/">courgette guide</a>.' ) .

					$h2( 'Strawberries under cover' ) .
					$p( 'Potted strawberries moved into an unheated greenhouse or cold frame in February, or covered with cloches, crop earlier than plants left outside. The covers also keep insects off the flowers. Either brush each open flower lightly with a soft paintbrush, or lift the covers during the day while the plants are in flower so insects can visit. More in our <a href="/plants/balcony-strawberry/">strawberry guide</a>.' ) .

					$h2( 'Peaches and nectarines' ) .
					$p( 'Both are self-fertile, but their blossom opens so early that insects are scarce. Over several dry, sunny days, dab a small soft brush into the centre of each flower in turn. A tree moved into a greenhouse or porch to escape frost must always be pollinated this way. Our <a href="/plants/peach-tree-in-pot/">peach tree guide</a> covers frost protection at flowering time.' ) .

					$h2( 'Aubergines, tomatoes and grapes under glass' ) .
					$list(
						array(
							'<strong>Aubergines:</strong> open the doors and vents on warm days so insects can get in, mist the flowers, or brush them with a small paintbrush. See <a href="/plants/eggplant-in-pots/">aubergines</a>.',
							'<strong>Tomatoes:</strong> no brush needed; tap or gently shake the trusses when the flowers are fully open, and keep the vents open.',
							'<strong>Grapes:</strong> mostly wind-pollinated. Under glass, at about midday on a dry, sunny day, shake the stems or run a cupped hand over each bunch of flowers. See <a href="/plants/grapevine-in-pot/">grapevines</a>.',
						)
					) .

					$h2( 'Crops that do not need your help' ) .
					$list(
						array(
							'<strong>Citrus:</strong> self-fertile; the flowers need no hand pollination. See the <a href="/plants/lemon-tree-in-pot/">lemon tree guide</a>.',
							'<strong>Figs:</strong> the fruit forms without pollination. See the <a href="/plants/fig-tree-in-pot/">fig guide</a>.',
							'<strong>French beans:</strong> their flowers pollinate themselves.',
							'<strong>Apples and pears:</strong> most need a second variety that flowers at the same time, which a paintbrush cannot replace.',
							'<strong>All-female greenhouse cucumbers:</strong> must not be pollinated at all, or the fruit can taste bitter; see <a href="/plants/cucumbers-in-pots/">cucumbers</a>.',
						)
					) .
					$p( 'If flowers on tomatoes, peppers or beans drop without setting, heat, dry compost or hunger are often to blame rather than missing insects: see <a href="/problems/flowers-dropping-off/">why flowers fall off</a>.' ) .

					$h2( 'Bring in the insects' ) .
					$p( 'Hand pollination is a back-up. A sheltered spot helps bees find your crops, so does opening covers on warm days. Avoid spraying insecticides on plants in flower, because they kill pollinating insects too.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Hand-pollinating outdoor crops that insects are already pollinating.',
							'Brushing flowers on a damp, dull day: choose dry, sunny weather.',
							'Pulling off all the male courgette flowers to eat before the females open.',
							'Pollinating an all-female cucumber.',
							'Keeping covers closed all day while strawberries are in flower.',
						)
					),
			),

			'vegetables-on-a-windowsill'                 => array(
				'image_prompt' => 'A bright south-facing kitchen windowsill holding a row of edible plants in matching pots: a pot of Genovese basil with glossy leaves, a compact chilli plant with small red fruits, a clump of chives, curly parsley and a shallow tray of pea shoot microgreens, sunlight coming through the glass from one side.' . $photo_end,
				'pin_prompt'   => 'A kitchen windowsill seen from inside the room, with pots of basil, parsley and a small chilli plant lined up against the glass and a tray of microgreens in front, photographed vertically.' . $pin_end,
				'title'        => 'Vegetables on a Windowsill: Which Crops Grow Well Indoors',
				'topic'        => 'light-position',
				'excerpt'      => 'The crops that do best on a windowsill are small, quick or happy in a modest pot: microgreens, salad leaves, soft herbs such as basil and parsley, and compact chillies and peppers. Big plants and deep-rooted crops belong outside, where they have room.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Waterproof trays or saucers', 'note' => 'Protect the sill from water running out of the pots.', 'url' => '' ),
						array( 'name' => 'Shallow seed trays', 'note' => 'For microgreens.', 'url' => '' ),
						array( 'name' => 'Narrow troughs', 'note' => 'Fit a deep sill and hold a row of salad or herbs.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Which way should a windowsill for vegetables face?', 'answer' => 'The more light the better. South- and west-facing sills are the brightest. On a darker sill, leafy crops and parsley cope better than chillies or basil, which want sun.' ),
						array( 'question' => 'Can I grow tomatoes on a windowsill?', 'answer' => 'Backyard Harvest suggests heat-loving crops such as tomatoes can grow indoors if you choose small varieties, so the plants do not block the light. Our cherry tomato guide is written for a balcony, where a plant gets more light and room.' ),
						array( 'question' => 'Why are my windowsill herbs leaning towards the glass?', 'answer' => 'The light reaches them from one side only, so they grow towards it. Turn the pots every day or two. Pale, stretched growth means the spot is too dark: see our guide to leggy seedlings.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to grow microgreens (school gardening)', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/food-growing/growing-microgreens' ),
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — How to grow basil', 'url' => 'https://www.rhs.org.uk/herbs/basil/grow-your-own' ),
						array( 'title' => 'RHS — How to grow parsley', 'url' => 'https://www.rhs.org.uk/herbs/parsley/grow-your-own' ),
						array( 'title' => 'RHS — How to grow mint', 'url' => 'https://www.rhs.org.uk/herbs/mint/grow-your-own' ),
						array( 'title' => 'RHS — How to grow coriander', 'url' => 'https://www.rhs.org.uk/herbs/coriander/grow-your-own' ),
						array( 'title' => 'RHS — How to grow dill', 'url' => 'https://www.rhs.org.uk/herbs/dill/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — How to grow sweet peppers', 'url' => 'https://www.rhs.org.uk/vegetables/peppers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — Herbs for shade', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/herbs-for-shade' ),
						$book,
					),
				),
				'content'      =>
					$p( 'A windowsill is warm and sheltered, but it is narrow and the light comes from one side. That rules out large plants and favours crops that are small, fast, or content in a modest pot. This page helps you choose; each crop\'s own guide explains how to grow it.' ) .

					$h2( 'What makes a crop suit a windowsill' ) .
					$list(
						array(
							'<strong>Light:</strong> the brightest sills face south or west. Leafy crops and parsley put up with less light than chillies and basil.',
							'<strong>Size:</strong> the pot has to fit the sill, and the plant must not grow so big that it blocks the window. Backyard Harvest advises choosing small varieties of heat-loving crops for this reason.',
							'<strong>Speed:</strong> a crop you cut within weeks repays a small space better than one that takes months.',
						)
					) .

					$h2( 'Quickest: microgreens' ) .
					$p( '<a href="/plants/microgreens-on-a-windowsill/">Microgreens</a> are the best fit of all: a shallow tray, a harvest about one to three weeks after sowing, and they can be sown at any time of year. Kale is among the crops the RHS suggests for them.' ) .

					$h2( 'Salad leaves' ) .
					$p( '<a href="/plants/salad-greens-in-pots/">Cut-and-come-again salad leaves</a> need a trough about 30 cm (1 ft) wide and give a first cut in about four weeks in summer, nearer eight when it is cool. The RHS suggests keeping autumn sowings on a sunny windowsill through winter. For hardier winter leaves such as mizuna and mustards, see <a href="/plants/asian-greens-in-pots/">oriental salad leaves</a>.' ) .

					$h2( 'Herbs that do well indoors' ) .
					$list(
						array(
							'<strong><a href="/plants/genovese-basil/">Basil</a>:</strong> the classic windowsill herb, because it is tender and wants warmth and sun. A 3–5 litre pot per plant, with leaves to pick a few weeks after planting.',
							'<strong><a href="/plants/parsley-in-pots/">Parsley</a>:</strong> copes with less light than most herbs and, in its curly form, stays short enough for a sill. It needs a pot at least 25 cm (10 in) wide and deep.',
							'<strong><a href="/plants/chives-in-pots/">Chives</a> and <a href="/plants/mint-in-pots/">mint</a>:</strong> both die back outdoors in winter; a pot brought in to a sunny sill in autumn keeps giving leaves.',
						)
					) .

					$h2( 'Herbs that are harder indoors' ) .
					$list(
						array(
							'<strong><a href="/plants/cilantro-in-pots/">Coriander</a>:</strong> grows on a sill but does not last; the RHS notes it can turn leggy if kept indoors for long. Treat it as a short-term crop.',
							'<strong><a href="/plants/dill-in-pots/">Dill</a>:</strong> can be sown indoors at any time of year for a sunny sill, but plants are bushier when light levels are higher, and it wants a pot about 30 cm (12 in) wide and deep.',
						)
					) .

					$h2( 'Fruiting crops for a sunny sill' ) .
					$list(
						array(
							'<strong><a href="/plants/chili-peppers-in-pots/">Chillies</a>:</strong> the RHS says compact varieties can be grown on a sunny windowsill indoors. A 22 cm (9 in) pot per plant, with chillies from midsummer to autumn.',
							'<strong><a href="/plants/bell-peppers-in-pots/">Sweet peppers</a>:</strong> dwarf and compact varieties can grow even on a kitchen windowsill, one plant to a pot at least 30 cm (1 ft) wide. Give them your warmest, brightest sill.',
						)
					) .
					$p( 'If their flowers drop without forming fruit, see <a href="/problems/flowers-dropping-off/">why flowers fall off</a>.' ) .

					$h2( 'What to leave outside' ) .
					$p( 'Crops that need a large container do not fit a sill: potatoes, courgettes, beans, peas, fruit bushes and trees. The windowsill is still useful for them as a place to start seeds in spring; see <a href="/plant-care/how-to-start-seeds-indoors/">sowing seeds indoors</a>. If you have a balcony as well, our guide to <a href="/plant-care/how-to-arrange-pots-in-a-small-space/">arranging pots in a small space</a> helps you divide crops between the two.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Putting sun-lovers such as chillies on a dim north-facing sill.',
							'Choosing tall varieties that shade the rest of the window.',
							'Expecting a supermarket pot of coriander to last all summer indoors.',
							'Forgetting to turn the pots, so plants lean and stretch.',
							'Letting water drain onto the sill: stand every pot in a tray.',
						)
					),
			),

			'what-to-grow-on-a-shady-balcony'            => array(
				'image_prompt' => 'A north-facing balcony in soft, even daylight with no direct sun, holding containers of leafy crops: a trough of loose-leaf lettuce and rocket, a pot of glossy Swiss chard with red stems, a lush pot of mint, flat-leaved parsley, and a redcurrant bush in a large pot against the wall with strings of red berries.' . $photo_end,
				'pin_prompt'   => 'A shaded corner of a balcony with pots of parsley, chives and a large pot of Swiss chard with colourful stems against a pale wall, photographed vertically in soft daylight.' . $pin_end,
				'title'        => 'What to Grow on a Shady Balcony',
				'topic'        => 'light-position',
				'excerpt'      => 'In partial or light shade, grow leaves rather than fruit: lettuce, salad leaves, rocket, spinach, chard, kale and herbs such as parsley, mint and chives. Currants, gooseberries and acid cherries also crop in some shade, but tomatoes, chillies, beans and Mediterranean herbs need sun.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Pale gravel mulch', 'note' => 'Reflects some light back up to the plants.', 'url' => '' ),
						array( 'name' => 'Troughs about 30 cm wide', 'note' => 'Suit most leafy crops on this page.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is a north-facing balcony too dark for vegetables?', 'answer' => 'Not for leafy crops and some fruit. If it gets bright daylight but little direct sun, lettuce, salad leaves, chard, parsley, mint and redcurrants are realistic. Fruiting vegetables such as tomatoes and chillies are not.' ),
						array( 'question' => 'Will fruit bushes crop in the shade?', 'answer' => 'Several will, with a trade-off. The RHS says redcurrants grow well in partial shade, even against a north-facing wall, though the fruit ripens later and is less sweet. Gooseberries, blackcurrants and blueberries also tolerate some shade, and raspberries fruit in light shade with a smaller crop.' ),
						array( 'question' => 'Do pots in the shade need less water?', 'answer' => 'Generally yes: the RHS notes that pots on a north- or east-facing site lose water more slowly than sunnier ones. Keep checking, though, because wind and an overhang that blocks rain can still leave the compost dry.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Herbs for shade', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/herbs-for-shade' ),
						array( 'title' => 'RHS — How to grow edibles on your balcony (Julie Henderson)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/how-to-grow-edibles-on-your-balcony' ),
						array( 'title' => 'RHS — How to grow lettuces', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — How to grow rocket', 'url' => 'https://www.rhs.org.uk/vegetables/rocket/grow-your-own' ),
						array( 'title' => 'RHS — How to grow spinach', 'url' => 'https://www.rhs.org.uk/vegetables/spinach/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chard', 'url' => 'https://www.rhs.org.uk/vegetables/chard/grow-your-own' ),
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — How to grow mizuna and mibuna', 'url' => 'https://www.rhs.org.uk/vegetables/mizuna-mibuna/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chervil', 'url' => 'https://www.rhs.org.uk/herbs/chervil/grow-your-own' ),
						array( 'title' => 'RHS — How to grow sorrel', 'url' => 'https://www.rhs.org.uk/herbs/sorrel/grow-your-own' ),
						array( 'title' => 'RHS — How to grow redcurrants', 'url' => 'https://www.rhs.org.uk/fruit/redcurrants/grow-your-own' ),
						array( 'title' => 'RHS — How to grow gooseberries', 'url' => 'https://www.rhs.org.uk/fruit/gooseberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow blueberries', 'url' => 'https://www.rhs.org.uk/fruit/blueberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow raspberries', 'url' => 'https://www.rhs.org.uk/fruit/raspberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cherries', 'url' => 'https://www.rhs.org.uk/fruit/cherries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
					),
				),
				'content'      =>
					$p( 'Crops grown for their leaves cope with far less light than crops grown for their fruit. That is the main rule for a shady balcony: grow leaves, add the few fruits that put up with shade, and leave fruiting vegetables to sunnier spots. This page compares the options; follow the links for how to grow each one.' ) .

					$h2( 'How shady is your balcony?' ) .
					$p( 'Watch it for a day in late spring. If it is bright but gets little or no direct sun, or sun for only part of the day, most crops on this page will grow. If tall buildings or a deep overhang keep it dim all day, stick to the leafy crops and herbs. Since you cannot change the aspect, pick crops that match it.' ) .

					$h2( 'Leafy vegetables' ) .
					$list(
						array(
							'<strong><a href="/plants/lettuce-in-pots/">Lettuce</a>:</strong> sunny spots are best in spring, but light shade in summer helps stop it running to seed. Loose-leaf types are ready in 4–6 weeks; pot at least 30 cm (1 ft) wide and deep.',
							'<strong><a href="/plants/salad-greens-in-pots/">Salad leaves</a> and <a href="/plants/arugula-in-pots/">rocket</a>:</strong> both suit light shade, which the RHS recommends for summer sowings to delay bolting. A first cut in about a month; 30 cm wide troughs.',
							'<strong><a href="/plants/spinach-in-pots/">Spinach</a>:</strong> grows in sun or partial shade. Baby leaves in about a month.',
							'<strong><a href="/plants/asian-greens-in-pots/">Mizuna and other oriental leaves</a>:</strong> grow in sun or semi-shade, and an RHS adviser suggests mizuna for a balcony with good light but no direct sun.',
							'<strong><a href="/plants/swiss-chard-in-pots/">Swiss chard</a>:</strong> prefers sun but tolerates light shade in summer, and keeps giving leaves for months. Needs a bigger pot, about 40 cm (16 in) wide and deep.',
							'<strong><a href="/plants/kale-in-pots/">Kale</a>:</strong> likes sun but copes in light shade, cropping from autumn into spring. One plant per 30 cm (1 ft) pot.',
							'<strong><a href="/plants/bok-choy-in-pots/">Pak choi</a>:</strong> a cool, lightly shaded spot suits summer crops.',
						)
					) .

					$h2( 'Herbs' ) .
					$list(
						array(
							'<strong><a href="/plants/parsley-in-pots/">Parsley</a>:</strong> grows well in partial shade and fills gaps below taller plants.',
							'<strong><a href="/plants/mint-in-pots/">Mint</a> and <a href="/plants/chives-in-pots/">chives</a>:</strong> both are happy in partial shade and come back every year.',
							'<strong><a href="/plants/chervil-in-pots/">Chervil</a>:</strong> actually prefers light shade, because hot sun makes it flower early.',
							'<strong><a href="/plants/sorrel-in-pots/">Sorrel</a> and <a href="/plants/lemon-balm-in-pots/">lemon balm</a>:</strong> both grow in sun or partial shade.',
							'<strong><a href="/plants/cilantro-in-pots/">Coriander</a>:</strong> summer sowings benefit from some shade, which slows bolting.',
						)
					) .

					$h2( 'Fruit that tolerates shade' ) .
					$list(
						array(
							'<strong><a href="/plants/currants-in-pots/">Redcurrants and blackcurrants</a>:</strong> redcurrants grow well in partial shade, even on a north-facing wall, though they ripen later and taste less sweet. Blackcurrants cope with light shade. Pot at least 45 cm (18 in) wide.',
							'<strong><a href="/plants/gooseberries-in-pots/">Gooseberries</a>:</strong> sweetest in sun but tolerate some shade, including a north-facing wall.',
							'<strong><a href="/plants/blueberries-in-pots/">Blueberries</a>:</strong> a reasonable crop in partial shade.',
							'<strong><a href="/plants/raspberries-in-pots/">Raspberries</a>:</strong> fruit in light shade, with a smaller crop.',
							'<strong><a href="/plants/cherry-tree-in-pot/">Acid cherries</a>:</strong> crop well in partial shade, unlike sweet cherries, which need sun.',
							'<strong>Alpine strawberries:</strong> small, aromatic berries in sun or light shade. Ordinary strawberries crop and taste best in full sun; see our <a href="/plants/balcony-strawberry/">strawberry guide</a>.',
						)
					) .

					$h2( 'What will struggle' ) .
					$p( 'Tomatoes, chillies, sweet peppers, aubergines, courgettes, cucumbers and beans all need full sun and warmth to flower and ripen fruit. Thyme, rosemary and sage also want full sun. Keep all of these for a sunnier spot.' ) .

					$h2( 'Making the most of limited light' ) .
					$list(
						array(
							'Stand the tallest plants where they will not cut off light from the smaller ones.',
							'Try a pale gravel mulch: light-coloured mulch reflects sunlight back up rather than absorbing it.',
							'Water less often than on a sunny balcony, but still check the compost: an overhang can keep rain off.',
						)
					) .
					$p( 'For where to put each pot, see <a href="/plant-care/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Trying tomatoes or chillies because they are the crops you most want.',
							'Treating a dim, all-day-shade corner like light shade.',
							'Overwatering: shaded pots dry out more slowly.',
							'Ignoring slugs, which like cool, damp corners.',
							'Expecting shade-grown fruit to be as sweet or as early as fruit grown in sun.',
						)
					),
			),

			'best-vegetables-for-beginners-in-pots'      => array(
				'image_prompt' => 'A sunny balcony in early summer with a first-year kitchen garden in pots: a trough of radishes with red roots showing, a trough of mixed salad leaves, a pot of dwarf French beans in flower, a potato growing bag with lush leaves, a pot of strawberries with ripening fruit and a pot of chives with purple flowers.' . $photo_end,
				'pin_prompt'   => 'A small balcony with five easy crops in pots: radishes, salad leaves, chives, dwarf beans and strawberries, arranged on the floor and a low shelf, photographed vertically.' . $pin_end,
				'title'        => 'Best Vegetables for Beginners in Pots',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Start with crops that are quick, forgiving and happy in a modest container: radishes, salad leaves, spring onions, dwarf French beans, potatoes in a bag, chives, mint and strawberries. Add a tomato once you are used to daily watering.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Two or three troughs about 30 cm wide', 'note' => 'Enough for radishes, salad leaves and spring onions.', 'url' => '' ),
						array( 'name' => 'A potato growing bag', 'note' => 'One seed potato per 30 cm of width.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'note' => 'Suits all the annual crops on this page.', 'url' => '' ),
						array( 'name' => 'Seed or young plants with the RHS AGM label', 'note' => 'An RHS adviser suggests looking for the Award of Garden Merit when buying.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'What is the easiest vegetable to grow in a pot?', 'answer' => 'Radishes are hard to beat: sown straight into a pot at least 30 cm (1 ft) wide and deep, they are ready in about four to six weeks. Cut-and-come-again salad leaves are a close second.' ),
						array( 'question' => 'Should a beginner grow from seed or buy plants?', 'answer' => 'Either, as long as you avoid the fiddly stages. An RHS adviser suggests crops you can sow where they will grow, or buying small plug plants or ready-grown plants, so there is no pricking out or potting on.' ),
						array( 'question' => 'How many pots should I start with?', 'answer' => 'Fewer than you think. An RHS adviser\'s tip for balconies is to grow only what you love and not crowd the space. A handful of large containers is easier to water than many small ones.' ),
					),
					'sources'  => array(
						$rhs_containers,
						$rhs_veg_pots,
						array( 'title' => 'RHS — How to grow edibles on your balcony (Julie Henderson)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/how-to-grow-edibles-on-your-balcony' ),
						array( 'title' => 'RHS — How to grow radishes', 'url' => 'https://www.rhs.org.uk/vegetables/radishes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow potatoes', 'url' => 'https://www.rhs.org.uk/vegetables/potatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'The RHS describes containers as ideal for beginners growing small amounts of vegetables or herbs. The trick is to start with crops that forgive mistakes and reward you quickly. This page compares the easiest options by pot size, light and time to harvest; each link leads to the full growing guide.' ) .

					$h2( 'What makes a crop beginner-friendly' ) .
					$list(
						array(
							'<strong>Quick:</strong> a harvest within weeks keeps you going and leaves time to try again.',
							'<strong>Sown where it grows:</strong> seeds that go straight into the final pot avoid pricking out and potting on.',
							'<strong>Small pot:</strong> a crop that fits a 30 cm (1 ft) trough needs less compost and less carrying.',
							'<strong>Forgiving:</strong> annual crops last one season, so a failure is soon behind you. Backyard Harvest makes the same point: you can be bold.',
						)
					) .

					$h2( 'Fastest results: radishes, salad leaves and spring onions' ) .
					$list(
						array(
							'<strong><a href="/plants/radishes-in-pots/">Radishes</a>:</strong> about 4–6 weeks from sowing, in a pot at least 30 cm (1 ft) wide and deep. Sun, or light shade in midsummer.',
							'<strong><a href="/plants/salad-greens-in-pots/">Salad leaves</a>:</strong> a first cut in about four weeks in summer, and the plants regrow. A 30 cm wide trough; sun or light shade.',
							'<strong><a href="/plants/green-onions-in-pots/">Spring onions</a>:</strong> about eight weeks, in the same size of trough, in full sun.',
						)
					) .
					$p( 'All three are worth sowing a little at a time; see <a href="/plant-care/succession-planting-small-spaces/">succession sowing</a>.' ) .

					$h2( 'A bigger pot, a bigger harvest' ) .
					$list(
						array(
							'<strong><a href="/plants/green-beans-in-pots/">Dwarf French beans</a>:</strong> the first pods eight to ten weeks after sowing, then picking for weeks. A pot 30–45 cm (12–18 in) wide in a warm, sunny spot; no tall supports needed.',
							'<strong><a href="/plants/potatoes-in-bags/">Potatoes in a bag</a>:</strong> planted in late March or April, first earlies are ready in June or July. A bag at least 30 cm (12 in) wide and deep, in full sun.',
							'<strong><a href="/plants/peas-in-pots/">Peas</a>:</strong> easy, though they need a pot at least 45 cm (18 in) wide and some twigs to climb.',
						)
					) .

					$h2( 'Plant once, pick for years: herbs and strawberries' ) .
					$list(
						array(
							'<strong><a href="/plants/chives-in-pots/">Chives</a>:</strong> a perennial that regrows every spring, in a pot about 20 cm (8 in) wide; sun or partial shade.',
							'<strong><a href="/plants/mint-in-pots/">Mint</a>:</strong> spreads vigorously, which is why it is grown in a pot of its own. Sun or partial shade.',
							'<strong><a href="/plants/balcony-strawberry/">Strawberries</a>:</strong> three plants fit a 30 cm pot and crop from early summer. A sunny spot.',
						)
					) .

					$h2( 'Your first step up: tomatoes and courgettes' ) .
					$p( 'An RHS adviser suggests a couple of bush tomatoes for a balcony. A <a href="/plants/cherry-tomato/">cherry tomato</a> is a little more demanding than the crops above: it needs 20–30 litres of compost, your sunniest spot and steady daily watering, and starts cropping about 60–80 days after planting out. <a href="/plants/zucchini-in-pots/">Courgettes</a> are easy but large: one plant fills a 45 cm (18 in) pot. Try one of either in your first year, beside the quick crops.' ) .

					$h2( 'Match crops to your light' ) .
					$p( 'Beans, potatoes, spring onions, strawberries and tomatoes need full sun. Radishes, salad leaves, chives and mint manage in partial shade too. If your space is shady, start with <a href="/plant-care/what-to-grow-on-a-shady-balcony/">what to grow on a shady balcony</a>; if you have only a windowsill, see <a href="/plant-care/vegetables-on-a-windowsill/">vegetables on a windowsill</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing a whole packet at once, then facing a glut and a gap.',
							'Buying lots of small pots instead of a few large ones: see <a href="/plant-care/how-to-choose-pots-for-vegetables/">choosing pots</a>.',
							'Starting with slow, demanding crops such as aubergines.',
							'Growing things you do not actually like to eat.',
							'Forgetting that pots need checking for water every day in summer.',
						)
					),
			),
		),
	),
);
