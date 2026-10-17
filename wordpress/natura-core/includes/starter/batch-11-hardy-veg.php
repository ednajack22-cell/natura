<?php
/**
 * Starter guides, batch 11 (hardy vegetables): kale, pak choi, garlic and
 * carrots grown in containers on a balcony or patio.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS confirms it; see design/sources/BACKYARD-HARVEST.md.
 * Months are for a temperate climate such as the UK.
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

return array(
	'name'   => __( 'Hardy vegetables', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'kale-in-pots'     => array(
				'title'        => 'How to Grow Kale in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6 ),
					'plant'   => array( 5, 6, 7 ),
					'harvest' => array( 1, 2, 3, 4, 10, 11, 12 ),
				),
				'excerpt'      => 'Kale grows well in a pot if you choose a compact variety such as Dwarf Green Curled and give each plant a container 30 cm (1 ft) wide and deep. It is one of the hardiest leafy crops, so a single pot can give you fresh leaves from autumn right through winter.',
				'facts'        => array(
					'short_name'     => 'Kale',
					'botanical_name' => 'Brassica oleracea (Acephala Group)',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun; copes with light shade',
					'pot_size'       => '30 cm (1 ft) wide and deep for one plant',
					'hardiness'      => 'H7',
					'watering'       => 'Regularly; do not let the compost dry out',
					'harvest'        => 'Autumn to spring, a few leaves at a time',
					'season'         => 'Sow March to June',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose a compact variety and give each plant a pot 30 cm (1 ft) wide and deep, filled with peat-free multi-purpose compost.' ),
						array( 'point' => 'Sow from March to June, 1 cm (½ in) deep, and plant out from May to July.' ),
						array( 'point' => 'Plant deeply, with the lowest leaves at the compost surface, so the plant is well anchored.' ),
						array( 'point' => 'Pick two or three lower leaves per plant at a time, from autumn through winter into spring.' ),
						array( 'point' => 'Cover with insect-proof mesh to keep off caterpillars, aphids and pigeons.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Dwarf Green Curled', 'note' => 'The RHS suggests it for containers. A dwarf curly kale for winter cropping, around 60 cm tall, so it suits a windy spot and is unlikely to need staking. Rated H7.' ),
						array( 'name' => 'Starbor', 'note' => 'An RHS Award of Garden Merit variety. Compact, and suitable for smaller spaces.' ),
						array( 'name' => 'Yurok', 'note' => 'An RHS Award of Garden Merit variety. A Tuscan-style F1 kale with narrow, puckered leaves on compact plants.' ),
						array( 'name' => 'Red Russian', 'note' => 'The RHS names it as a good salad kale, with colourful leaves for picking young.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 30 cm (1 ft) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Room for one mature plant.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For sowing and for the final pot.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh and hoops or canes', 'badge' => '', 'note' => 'Keeps caterpillars, flea beetles and pigeons off the leaves.', 'url' => '' ),
						array( 'name' => 'Organic-based nitrogen-rich fertiliser', 'badge' => '', 'note' => 'Kale in containers benefits from a feed.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can kale stay outside in a pot all winter?', 'answer' => 'Yes. Kale is one of the hardiest leafy vegetables, and the compact variety Dwarf Green Curled is rated H7 by the RHS, the highest hardiness rating. Its main value is the fresh leaves it gives in the coldest months.' ),
						array( 'question' => 'How big a pot does kale need?', 'answer' => 'For one mature plant, a pot 30 cm (1 ft) wide and deep, with a compact variety. For baby salad leaves, any large container works, with plants about 7.5 cm (3 in) apart.' ),
						array( 'question' => 'Can I grow kale on a windowsill?', 'answer' => 'Not as full-sized plants, but you can grow it as microgreens. Sow seed thickly in a small tray of damp peat-free seed compost on a sunny windowsill, and the seedlings are ready to eat in two or three weeks.' ),
						array( 'question' => 'How do I pick kale without killing the plant?', 'answer' => 'Take two or three of the lower leaves from each plant at a time and leave the top growing. Regular picking encourages more leaves.' ),
						array( 'question' => 'What is eating holes in my kale?', 'answer' => 'Usually cabbage caterpillars, pigeons, flea beetles or slugs and snails. Insect-proof mesh over the pot is the best protection, and you can pick caterpillars off by hand.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — Brassica oleracea (Acephala Group) \'Dwarf Green Curled\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/135049/brassica-oleracea-(acephala-group)-dwarf-green-curled/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why kale suits a winter balcony' ) .
					$p( 'Kale is a member of the cabbage family and one of the hardiest leafy vegetables. It grows slowly and steadily through summer, then keeps giving leaves through autumn, winter and spring, when little else is growing. Because you pick a few leaves at a time rather than the whole plant, even one pot gives a long harvest.' ) .
					$p( 'Most kale grows large, up to 90 cm (3 ft) tall, so for a pot choose a compact variety. Most kales are biennial: they crop until they flower in their second year, then are finished.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'A pot 30 cm (1 ft) wide and deep holds one mature plant of a compact variety such as Dwarf Green Curled. Use peat-free multi-purpose compost and a pot with drainage holes. Growing in a container is also a way round club root, a soil disease of cabbage-family plants.' ) .
					$p( 'Put the pot in a sunny spot. Kale prefers sun but copes with light shade. Dwarf Green Curled stays around 60 cm (2 ft) tall, which makes it a good choice for a windy balcony.' ) .

					$h2( 'Sow' ) .
					$p( 'Sow from March to June. Indoors, sow into modules of peat-free multi-purpose compost: make a hole 1 cm (½ in) deep in each, sow two seeds, and remove the weaker seedling if both come up. Indoor sowing also keeps seedlings safe from slugs and snails.' ) .
					$p( 'You can also sow straight into the final pot in a warm, sunny spot: sow three seeds where the plant will grow, then thin to the strongest seedling when they appear.' ) .
					$p( 'For baby salad leaves, scatter the seed thinly over a large container, cover with about 1 cm (½ in) of compost and water well. Sow small batches over several weeks for a longer supply.' ) .

					$h2( 'Plant out deeply' ) .
					$p( 'In late spring or early summer, when young plants are 10–15 cm (4–6 in) tall, harden off indoor-sown plants and move them to their final pot. Plant them deeper than before, with the lowest leaves at the compost surface. Kale becomes top-heavy, and deep planting helps anchor it. Firm the compost and water well.' ) .

					$h2( 'Water, feed and protect' ) .
					$list(
						array(
							'<strong>Water</strong> regularly: compost in a pot dries out much faster than garden soil, especially in summer.',
							'<strong>Feed</strong>: kale in containers benefits from an organic-based, nitrogen-rich fertiliser.',
							'<strong>Tidy</strong>: remove faded lower leaves to keep air moving around the plant and deter fungal diseases.',
							'<strong>Cover</strong> the plant with insect-proof mesh on hoops or canes, against caterpillars, flea beetles, aphids and pigeons.',
							'<strong>Support</strong> taller varieties with a sturdy cane in autumn if your balcony is exposed, so winter gales do not rock the roots loose.',
						)
					) .

					$h2( 'Harvest through winter' ) .
					$p( 'Kale is ready from about September onwards. Pick two or three of the lower leaves from each plant at a time and leave the top to keep growing. Regular picking encourages more leaves, and the plant goes on cropping through winter into spring.' ) .
					$p( 'For salad, start cutting when plants are 10–15 cm (4–6 in) tall. Pick single leaves, or cut the whole rosette: it should sprout again for a second crop.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Growing a full-size variety in a small pot: choose a compact one such as Dwarf Green Curled.',
							'Planting at the old depth: set young plants deep, with the lowest leaves at the compost surface.',
							'Leaving the plant uncovered: caterpillars and pigeons can strip the leaves. Use insect-proof mesh.',
							'Stripping the whole plant at once: take two or three lower leaves at a time.',
							'Forgetting to water a pot in summer: kale in containers needs regular watering.',
						)
					),
				'image_prompt' => 'A single compact curly kale plant growing in a 30 cm wide charcoal-grey frost-proof pot on a small city balcony in late autumn. The plant is mature, about 50 cm tall, with a sturdy short stem and many deeply frilled, tightly curled mid-green leaves; the lowest leaves have been picked, leaving neat leaf scars on the stem. A light frost glistens on the leaf edges, the compost is dark and moist, a wooden balcony floor and metal railing are softly blurred behind. Low, cool morning sunlight from the side. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact curly kale plant in a charcoal-grey pot on a balcony in late autumn, with deeply frilled, tightly curled mid-green leaves on a short sturdy stem and a light frost on the leaf edges. The pot sits in the lower half of the frame; the top third is calm, softly blurred pale sky and wall, empty for a title. Cool morning side light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'pak-choi-in-pots' => array(
				'title'        => 'How to Grow Pak Choi in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6, 7, 8 ),
					'plant'   => array( 5 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'Pak choi is one of the fastest crops for a pot: baby leaves can be ready in about four weeks, and full heads in eight to ten. Sow it in spring or late summer in a container at least 30 cm (1 ft) wide, and keep the compost moist so it does not bolt.',
				'facts'        => array(
					'short_name'     => 'Pak choi (bok choy)',
					'botanical_name' => 'Brassica rapa Chinensis Group',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun in spring and autumn; light shade in summer',
					'pot_size'       => 'At least 30 cm (1 ft) wide',
					'hardiness'      => 'H5',
					'watering'       => 'Regularly, in the morning; never let it dry out',
					'harvest'        => 'Baby leaves in about 30 days; heads in 45–75 days',
					'season'         => 'Best sown in spring and late summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Use a pot at least 30 cm (1 ft) wide: smaller containers dry out too fast.' ),
						array( 'point' => 'Sow 2 cm (¾ in) deep in peat-free compost; seeds come up in about a week.' ),
						array( 'point' => 'Sow in spring and late summer: hot, dry weather and cold snaps make pak choi bolt.' ),
						array( 'point' => 'Thin to 8–10 cm (3–4 in) for baby leaves, or 25–30 cm (10–12 in) for full heads.' ),
						array( 'point' => 'Water in the morning and keep the compost moist all the time.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Summer Breeze', 'note' => 'An RHS Award of Garden Merit variety with good resistance to bolting, and to heat and cold. Pick as baby leaves or let it form full stems.' ),
						array( 'name' => 'Glacier', 'note' => 'An RHS Award of Garden Merit variety bred in Britain. Slower to bolt, with a long cropping season, broad white stems and deep green leaves.' ),
						array( 'name' => 'Red Choi', 'note' => 'An RHS Award of Garden Merit variety with purple-red leaves, green undersides and green stems.' ),
						array( 'name' => 'Ivory', 'note' => 'Crisp white stems and dark green, fleshy leaves.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 30 cm (1 ft) wide, with drainage holes', 'badge' => '', 'note' => 'A growing bag also works for baby leaves.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each sowing.', 'url' => '' ),
						array( 'name' => 'Bolt-resistant pak choi seed', 'badge' => '', 'note' => 'Worth choosing if you sow in summer.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Keeps flea beetles off for unmarked leaves.', 'url' => '' ),
						array( 'name' => 'Biodegradable fleece', 'badge' => '', 'note' => 'Protects early and late sowings from cold snaps.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why has my pak choi gone to flower?', 'answer' => 'Pak choi bolts easily. Hot, dry weather is the usual trigger, and a cold snap can do it too. Cut off the flower stems before the buds open and eat them, then harvest the rest of the plant straight away. Next time, sow in spring or late summer, choose a bolt-resistant variety, and keep the compost moist.' ),
						array( 'question' => 'How long does pak choi take to grow?', 'answer' => 'Baby leaves can be ready in about 30 days. Semi-mature and full-sized heads take about 45 to 75 days.' ),
						array( 'question' => 'What are the tiny holes in the leaves?', 'answer' => 'Flea beetles. The damage is only cosmetic. If you want unmarked leaves, cover the pot with insect-proof mesh.' ),
						array( 'question' => 'Can I grow pak choi in shade?', 'answer' => 'In summer, light shade is actually better, because it helps stop the plants bolting. Early and late sowings do best in a warm, sheltered, sunny spot.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow pak choi', 'url' => 'https://www.rhs.org.uk/vegetables/pak-choi/grow-your-own' ),
						array( 'title' => 'RHS — Brassica rapa Chinensis Group (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/122198/brassica-rapa-chinensis-group/details' ),
						array( 'title' => 'RHS — Pak choi \'Summer Breeze\'', 'url' => 'https://www.rhs.org.uk/plants/303557/brassica-rapa-chinensis-group-summer-breeze/details' ),
						array( 'title' => 'RHS — Pak choi \'Glacier\'', 'url' => 'https://www.rhs.org.uk/plants/316083/brassica-rapa-chinensis-group-glacier/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'A quick crop for cool weather' ) .
					$p( 'Pak choi, also called bok choy, is an oriental member of the cabbage family. It forms an upright rosette of broad white or pale green stems and large green or dark purple leaves. You can pick it young as salad leaves in as little as four weeks, or let it grow for eight to ten weeks into a full head for stir-fries.' ) .
					$p( 'It likes cool, damp weather. Spring and late summer to autumn suit it best. In hot, dry midsummer it tends to bolt, which means it flowers early and the plant is spoiled.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a container at least 30 cm (1 ft) wide, or a growing bag, filled with peat-free multi-purpose compost. Smaller pots dry out too quickly. For full-sized heads, give each plant 25–30 cm (10–12 in) of space.' ) .
					$p( 'For spring and late-summer sowings, choose a warm, sheltered, sunny spot. For summer crops, a cool place in light shade helps stop bolting.' ) .

					$h2( 'Sow' ) .
					$list(
						array(
							'Sow outdoors from late spring, once there is no risk of frost, or indoors in modules of peat-free seed compost from spring.',
							'Sow thinly, 2 cm (¾ in) deep. Seeds come up in about a week.',
							'Protect early and late sowings from cold with a cloche or biodegradable fleece.',
							'Sow a small batch every few weeks for a steady supply.',
						)
					) .
					$p( 'Thin the seedlings in stages and eat the thinnings. Leave 8–10 cm (3–4 in) between plants for baby leaves, 20 cm (8 in) for semi-mature heads and 25–30 cm (10–12 in) for full-sized heads. Module-raised plants can go out from late spring once they are at least 10 cm (4 in) tall and hardened off.' ) .

					$h2( 'Water to stop bolting' ) .
					$p( 'Pak choi grows best in compost that never dries out, and potting compost dries quickly, so water regularly. Morning is the best time: the plants have water through the day, while damp compost overnight can attract slugs and snails. Avoid watering in the midday heat, when much of it evaporates.' ) .
					$p( 'If you sow in summer, choose a bolt-resistant variety and pick the plants as salad leaves or semi-mature heads. If flower stems appear, cut them before the buds open and add them to salads or stir-fries, then harvest the whole plant: it only gets worse. Plants sown at the same time are likely to follow, so pick those soon too.' ) .

					$h2( 'Harvest' ) .
					$list(
						array(
							'<strong>Baby leaves</strong>: from about 30 days, snip a few leaves from each plant. They keep producing until they start to flower.',
							'<strong>Semi-mature and full-sized heads</strong>: after 45–75 days, while still compact and firm, cut through the base of the stem with a sharp knife.',
						)
					) .
					$p( 'The harvest runs from early summer to autumn, and sometimes later for plants under a cloche or in a greenhouse. Cook the heads lightly, so the stems stay crunchy.' ) .

					$h2( 'Pests' ) .
					$p( 'Slugs and snails love the juicy leaves, especially of seedlings in damp weather. Tiny holes in the leaves are caused by flea beetles; the damage is only cosmetic, and insect-proof mesh keeps them off. As a cabbage-family plant, pak choi can also attract cabbage caterpillars, pigeons and cabbage root fly, though root fly should not be a problem for fast baby-leaf crops.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing in midsummer heat without a bolt-resistant variety: the plants flower before they are ready.',
							'Using a small pot: it dries out too fast. Choose one at least 30 cm (1 ft) wide.',
							'Letting the compost dry out: dry conditions trigger bolting.',
							'Watering in the evening: damp compost overnight attracts slugs.',
							'Sowing too thickly and never thinning: crowded plants grow weakly.',
						)
					),
				'image_prompt' => 'A wide 35 cm terracotta-coloured trough of pak choi on a sunny patio table in early autumn. Six compact, semi-mature plants each form an upright rosette of broad, smooth, bright white leaf stalks that widen at the base, topped by glossy, spoon-shaped, dark green leaves with a pale midrib. The compost is dark and moist, a pair of small kitchen scissors rests beside the trough, and a brick wall and green foliage blur in the background. Soft, warm, late-afternoon daylight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of semi-mature pak choi plants in a terracotta-coloured trough on a balcony, showing upright rosettes of broad, smooth white leaf stalks and glossy, spoon-shaped dark green leaves. The trough fills the lower half of the frame; the top third is calm, softly blurred pale wall, empty for a title. Soft, warm daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'garlic-in-pots'   => array(
				'title'        => 'How to Grow Garlic in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'plant'   => array( 2, 3, 10, 11, 12 ),
					'harvest' => array( 5, 6, 7, 8 ),
				),
				'excerpt'      => 'Plant garlic cloves in autumn in a pot at least 25 cm (10 in) deep, 15 cm (6 in) apart, with the tips 2.5 cm (1 in) below the surface. Leave the pot outside in full sun over winter, because garlic needs the cold, and lift the bulbs the following summer when the leaves turn yellow.',
				'facts'        => array(
					'short_name'     => 'Garlic',
					'botanical_name' => 'Allium sativum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun',
					'pot_size'       => 'At least 25 cm (10 in) deep',
					'hardiness'      => 'H4',
					'watering'       => 'In dry spells in spring and early summer; stop when leaves yellow',
					'harvest'        => 'Late spring to summer, when the leaves turn yellow',
					'season'         => 'Plant mid-autumn to early winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Buy named garlic varieties from a garden centre or seed supplier, not supermarket bulbs.' ),
						array( 'point' => 'Plant in autumn: most varieties need one to two months at 0–10 °C (32–50 °F) to form a good bulb.' ),
						array( 'point' => 'Use a pot at least 25 cm (10 in) deep; plant cloves flat end down, 15 cm (6 in) apart, tips 2.5 cm (1 in) deep.' ),
						array( 'point' => 'Water in dry spells in spring and early summer, but stop once the leaves start to yellow.' ),
						array( 'point' => 'Lift when the leaves turn yellow, dry the bulbs for two to four weeks, then store them cool and dry.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Solent Wight', 'note' => 'An RHS Award of Garden Merit softneck variety, well adapted to the British climate. Stores well.' ),
						array( 'name' => 'Germidour', 'note' => 'An RHS Award of Garden Merit softneck variety. Well known and reliable, with large bulbs.' ),
						array( 'name' => 'Cristo', 'note' => 'An RHS Award of Garden Merit softneck variety with white bulbs: strong flavour, light aroma.' ),
						array( 'name' => 'Arno', 'note' => 'A softneck variety with ivory-white skin that stores well.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 25 cm (10 in) deep, with drainage holes', 'badge' => '', 'note' => 'Choose a frost-proof pot: it stays outside all winter.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fill the pot to just below the rim.', 'url' => '' ),
						array( 'name' => 'Named garlic bulbs for planting', 'badge' => '', 'note' => 'Sold in autumn and spring by garden centres and mail-order suppliers.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece or plastic-free netting', 'badge' => '', 'note' => 'Stops birds pulling up the cloves before they root.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I plant garlic from the supermarket?', 'answer' => 'It is not recommended. Supermarket garlic may not suit the British climate, so the results can be disappointing, and it can bring in diseases. Buy named varieties from a garden centre or seed supplier.' ),
						array( 'question' => 'Why did my garlic not split into cloves?', 'answer' => 'Usually because it did not get enough cold over winter. Most varieties need one to two months at 0–10 °C (32–50 °F), which is why garlic is planted in autumn and the pot left outside.' ),
						array( 'question' => 'Should I cut off the flower stem?', 'answer' => 'Yes. Snip it off as soon as it starts to form, so the plant puts its energy into the bulb. The bulb also stores better. Picked young, while still in bud, the flower stalks (scapes) are good sautéed or roasted.' ),
						array( 'question' => 'How do I know when garlic is ready?', 'answer' => 'When the leaves turn yellow. Autumn-planted garlic is usually ready from late spring to early summer, and spring-planted garlic from midsummer to early autumn. Do not leave it too long: late-lifted bulbs open up and store less well.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow garlic', 'url' => 'https://www.rhs.org.uk/vegetables/garlic/grow-your-own' ),
						array( 'title' => 'RHS — Allium sativum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/858/allium-sativum/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why garlic is easy in a pot' ) .
					$p( 'Garlic needs very little care: no sowing, no thinning, just a pot of compost, some sun and a cold winter. It grows from cloves, the segments of a bulb, and most varieties need a spell of cold to form a good bulb. So you plant it in autumn, leave the pot outside, and lift the bulbs the following summer. A pot is also a good answer if your only soil is heavy and wet, which makes garlic more prone to disease.' ) .

					$h2( 'Hardneck or softneck?' ) .
					$list(
						array(
							'<strong>Softneck</strong> garlic has smaller, tightly packed cloves, seldom flowers, and stores longest: up to about a year.',
							'<strong>Hardneck</strong> garlic has fewer, larger cloves with a stronger flavour. It readily sends up flower stems, and it stores for about four to six months.',
						)
					) .
					$p( 'Buy named varieties from a garden centre or seed supplier. Supermarket garlic may not suit the British climate, and it can carry diseases. Elephant garlic is sold alongside garlic but is closer to a leek, and it needs a long, warm season.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot at least 25 cm (10 in) deep, with drainage holes, filled with peat-free multi-purpose compost. The width decides how many cloves fit: each needs about 15 cm (6 in) of space. Put the pot in full sun, in a sheltered spot. Choose a frost-proof pot, since it stays outside all winter.' ) .

					$h2( 'Plant the cloves' ) .
					$list(
						array(
							'Plant from mid-autumn to early winter. Some varieties are sold for planting in late winter and early spring.',
							'Split the bulb into single cloves just before planting.',
							'Push each clove in flat end down, pointed end up, with the tip 2.5 cm (1 in) below the surface.',
							'Space the cloves 15 cm (6 in) apart.',
							'Cover the pot with fleece or plastic-free netting until the cloves have rooted: birds sometimes pull them up.',
						)
					) .
					$p( 'Garlic is rated H4 by the RHS, which means hardy through most of the UK. The cold is not a problem; it is what the plant needs to make a bulb with several cloves.' ) .

					$h2( 'Care through spring' ) .
					$p( 'Compost in a pot dries out quickly, so check it in dry spells in spring and early summer and water when needed: this helps the bulbs swell. Water the compost, not the leaves, as wet foliage encourages fungal problems. Once the bulbs are large and the leaves begin to yellow, stop watering, or the bulbs may rot.' ) .
					$p( 'Snip off any flower stems as soon as they appear, so the energy goes into the bulb. Picked young, the stalks (scapes) can be cooked. You can also take a few green leaves for salads while the bulbs grow.' ) .

					$h2( 'Harvest, dry and store' ) .
					$p( 'Garlic is ready when the leaves turn yellow: autumn-planted garlic from late spring to early summer, spring-planted from midsummer to early autumn. Do not delay, or the bulbs open up and keep less well. Ease them out with a hand fork and handle them gently: bruised bulbs do not store.' ) .
					$p( 'Dry the bulbs in a single layer in the sun, or in a dry, airy place, avoiding heat above 30 °C (86 °F). After two to four weeks, when the leaves rustle, cut them off and store the bulbs somewhere cool and dry, at 5–10 °C (41–50 °F).' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting supermarket garlic: buy named varieties for planting.',
							'Planting in late spring or keeping the pot indoors: without enough cold, bulbs may not split into cloves.',
							'Planting too shallow: cloves that sit too near the surface can turn green and store badly.',
							'Watering after the leaves yellow: the bulbs may rot.',
							'Lifting too late: the bulbs split open and store less well.',
						)
					),
				'image_prompt' => 'A deep, round, frost-proof grey stone-effect pot of garlic on a sunny patio in late spring. Six garlic plants grow evenly spaced, each with a cluster of long, flat, narrow, strap-shaped blue-green leaves about 40 cm tall rising from a single stem; the lower leaf tips are just starting to yellow. The compost surface is dark and slightly dry; terracotta paving and a low brick wall blur behind. Bright, clear morning sunlight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a deep grey pot of garlic plants on a sunny patio in late spring, with clusters of long, flat, narrow blue-green leaves rising from single stems and a few freshly lifted white garlic bulbs with roots and papery skins resting on the paving beside the pot. The pot fills the lower half; the top third is calm, softly blurred pale wall and sky, empty for a title. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'carrots-in-pots'  => array(
				'title'        => 'How to Grow Carrots in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'Carrots grow well in pots if you match the variety to the depth: small, round-rooted carrots suit most containers, while long-rooted ones need a deep pot or can be pulled young. Sow thinly where they are to grow and cover the pot with insect-proof mesh against carrot fly.',
				'facts'        => array(
					'short_name'     => 'Carrot',
					'botanical_name' => 'Daucus carota subsp. sativus',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun',
					'pot_size'       => 'Round types in most pots; long types need a deep one',
					'hardiness'      => 'H7',
					'watering'       => 'Regularly in a pot; keep moisture even',
					'harvest'        => 'About 12–16 weeks after sowing; baby carrots sooner',
					'season'         => 'Sow February to July',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose small, round-rooted varieties for most pots; long-rooted carrots need a deep container.' ),
						array( 'point' => 'Sow thinly, straight into the final pot, and cover with about 1 cm (½ in) of peat-free compost.' ),
						array( 'point' => 'Thin seedlings to at least 5 cm (2 in) apart; sowing sparsely avoids thinning, which attracts carrot fly.' ),
						array( 'point' => 'Cover the whole pot with insect-proof mesh: it is the most effective protection against carrot fly.' ),
						array( 'point' => 'Water regularly and evenly: pots dry out fast, and uneven watering splits the roots.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Parmex', 'note' => 'Small, sweet, rounded roots 5–7 cm long. The RHS notes it can be grown in containers.' ),
						array( 'name' => 'Rondo', 'note' => 'An egg-shaped root about 5 cm long and almost as wide, with tall, feathery leaves.' ),
						array( 'name' => 'Nantes and Amsterdam types', 'note' => 'The RHS suggests these for containers, sown from February for a June harvest. Early Nantes is an early variety.' ),
						array( 'name' => 'Flyaway', 'note' => 'An RHS Award of Garden Merit main-season variety with good resistance to carrot fly. Less susceptible, not immune.' ),
					),
					'products'   => array(
						array( 'name' => 'Deep pot or trough with drainage holes', 'badge' => '', 'note' => 'The RHS suggests at least 45 cm (18 in) deep and wide for vegetables in containers, to cut down on watering.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Stone-free, so roots grow straight.', 'url' => '' ),
						array( 'name' => 'Round-rooted carrot seed', 'badge' => '', 'note' => 'The easiest choice for most containers.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Covers the whole pot to keep carrot fly out.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How deep does a pot for carrots need to be?', 'answer' => 'It depends on the variety. Small, round-rooted carrots, with roots around 5–7 cm long, suit most containers. Long-rooted carrots need a deep container, or you can pull them young as baby carrots. For vegetables in pots in general, the RHS suggests aiming for at least 45 cm (18 in) deep and wide, so the compost does not dry out as fast.' ),
						array( 'question' => 'How do I stop carrot fly in a pot?', 'answer' => 'Cover the whole pot with insect-proof mesh: RHS research found a complete cover works better than a barrier around the crop. Sow thinly so you do not need to thin, as the smell of pulled seedlings attracts the fly, and use fresh compost rather than compost that grew carrots last year.' ),
						array( 'question' => 'Can I sow carrots in modules and transplant them?', 'answer' => 'It is better not to. Transplanting disturbs the root and leads to forked or misshapen carrots. Sow them straight into the pot where they will grow.' ),
						array( 'question' => 'Why have my carrots split?', 'answer' => 'Usually uneven watering: a dry pot followed by a soaking. Pots dry out faster than the ground, so water regularly and keep the compost evenly moist.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow carrots', 'url' => 'https://www.rhs.org.uk/vegetables/carrots/grow-your-own' ),
						array( 'title' => 'RHS — Daucus carota subsp. sativus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/158355/daucus-carota-subsp-sativus/details' ),
						array( 'title' => 'RHS — Carrot fly', 'url' => 'https://www.rhs.org.uk/biodiversity/carrot-fly' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Daucus carota \'Parmex\'', 'url' => 'https://www.rhs.org.uk/plants/107446/daucus-carota-parmex/details' ),
						array( 'title' => 'RHS — Daucus carota \'Rondo\'', 'url' => 'https://www.rhs.org.uk/plants/246954/daucus-carota-rondo/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Match the carrot to the pot' ) .
					$p( 'Carrots grow well in containers, which makes them a good crop for a balcony or patio. The key is root length. Small, round-rooted varieties such as Parmex, whose roots are 5–7 cm long, are ideal for most containers. Long-rooted carrots need a deep container; in a shallow pot, pull them young as baby carrots.' ) .
					$p( 'Carrots come in purple, white and yellow as well as orange. Early varieties are for sowing from early spring; main-season varieties from late spring to midsummer.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot or trough with drainage holes, filled with peat-free multi-purpose compost. Bought compost has no stones, which in the ground make roots fork. For vegetables in containers, the RHS suggests aiming for at least 45 cm (18 in) deep and wide: smaller pots need watering and feeding much more often. Use fresh compost, not compost that grew carrots last year, as it may hold carrot fly.' ) .
					$p( 'Put the pot in full sun.' ) .

					$h2( 'Sow straight into the pot' ) .
					$list(
						array(
							'Sow where the carrots will grow: transplanting disturbs the root and makes carrots fork.',
							'Scatter the seed as thinly as you can and cover it with about 1 cm (½ in) of compost. Water well.',
							'Be patient: carrot seed can be slow to come up.',
							'If you need to thin, leave at least 5 cm (2 in) between plants. Overcrowding distorts the roots.',
							'Sow a small batch every three to four weeks for a steady supply.',
						)
					) .
					$p( 'The main sowing season is April to early July. Early varieties can be sown in February or March if the pot is covered with a cloche or biodegradable fleece, because carrot seed will not come up in cold compost.' ) .

					$h2( 'Keep carrot fly out' ) .
					$p( 'Carrot fly is a small, low-flying black fly. Its slender, creamy-yellow maggots, up to 9 mm (⅜ in) long, tunnel into the roots and leave rusty brown scars that can rot. Two or three generations can hatch between late spring and autumn.' ) .
					$list(
						array(
							'<strong>Cover the pot completely</strong> with insect-proof mesh from sowing. RHS research found a complete cover is more effective than a barrier around the crop.',
							'<strong>Sow sparsely</strong> so you do not need to thin: the smell of pulled seedlings attracts egg-laying flies.',
							'<strong>Keep the mesh on</strong> and put it back as soon as you have finished weeding or watering.',
							'<strong>Time it</strong>: carrots sown after mid-May miss the first generation, and carrots lifted before late August miss the second.',
							'<strong>Choose a less susceptible variety</strong> such as Flyaway. None is fully resistant.',
						)
					) .

					$h2( 'Water evenly' ) .
					$p( 'In the ground, carrots rarely need watering. In a pot, which dries out much faster, water regularly. Keep the moisture even: roots can split when the compost swings between dry and wet.' ) .

					$h2( 'Harvest' ) .
					$p( 'Carrots are ready about 12–16 weeks after sowing, and baby carrots in a month or two. Pull them as soon as they are big enough to use: the biggest roots are not the tastiest, and spring sowings are best young, sweet and crunchy. Loosen the compost first so the roots do not snap. Main-season carrots can be picked through summer into autumn.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Growing long carrots in a shallow pot: choose round types, or pull long ones young.',
							'Sowing in modules and transplanting: the roots fork. Sow direct.',
							'Sowing thickly and thinning: crowded roots distort, and thinning attracts carrot fly.',
							'Leaving the pot uncovered: a full cover of insect-proof mesh is the best protection.',
							'Watering unevenly: the roots split.',
						)
					),
				'image_prompt' => 'A wide, deep, dark green plastic-free planter of carrots on a sunny balcony in summer. Feathery, finely divided, bright green carrot foliage about 25 cm tall fills the pot, and a few small, round, bright orange carrots, about the size of a golf ball, have just been pulled and rest on the dark compost with their leafy tops attached. A fine white insect-proof mesh cover is folded back at one side. Wooden decking and a metal railing blur in the background. Bright, natural midday light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a deep dark green planter of carrots on a sunny balcony, with feathery, finely divided bright green foliage and a small bunch of freshly pulled round orange carrots, leafy tops attached, lying on the compost in front. The planter fills the lower half; the top third is calm, softly blurred pale sky and wall, empty for a title. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
