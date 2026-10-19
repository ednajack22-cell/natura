<?php
/**
 * Starter guides, batch 2: kitchen herbs, chili peppers, a lemon tree in a
 * pot, and aphids.
 *
 * Facts from the RHS pages listed in each guide (checked 17 October 2026),
 * US land-grant extension pages (University of Minnesota, University of
 * Wisconsin–Madison, University of Maryland, Colorado State and Oregon
 * State; timing checked 18 October 2026), and Jo Whittingham, Backyard
 * Harvest (DK, 2011). The 'months' data is the UK calendar; 'timing'
 * counts weeks from the reader's own last spring frost.
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

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Kitchen herbs, chili peppers and citrus', 'natura-core' ),
	'guides' => array(
		'plant'   => array(
			'parsley-in-pots'   => array(
				'title'        => 'How to Grow Parsley in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill', 'balcony' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7, 8 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'start_indoors' => array( -8, -6 ),
					'sow_outdoors'  => array( 0, 0 ),
				),
				'excerpt'      => 'Parsley grows well in a pot at least 10 in (25 cm) wide and deep, in sun or part shade. It is slow to germinate, so be patient, then pick the outer stems regularly from late spring to fall and sow fresh plants each year.',
				'facts'        => array(
					'short_name'     => 'Parsley',
					'botanical_name' => 'Petroselinum crispum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun or partial shade',
					'pot_size'       => 'At least 10 in (25 cm) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the potting mix evenly moist',
					'harvest'        => 'Late spring to fall',
					'season'         => 'Start indoors 6–8 weeks before the last frost; sow outdoors after it, to late summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Fill a pot at least 10 in (25 cm) across and 10 in (25 cm) deep with peat-free all-purpose potting mix.' ),
						array( 'point' => 'Sow about ½ in (1 cm) deep; seedlings can take a month or more to appear.' ),
						array( 'point' => 'Keep the potting mix evenly moist and move the pot into shade in hot, sunny spells.' ),
						array( 'point' => 'Pick a few outer stems at a time, near the base; regular picking means more leaves.' ),
						array( 'point' => 'Treat it as an annual: sow fresh plants each year rather than keeping old ones.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Flat-leaved parsley', 'note' => 'Tends to have a stronger flavor, and the plants grow taller.' ),
						array( 'name' => 'Curly parsley', 'note' => 'More decorative, with a slightly milder flavor; shorter plants.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 10 in (25 cm) wide and deep', 'badge' => '', 'note' => 'With drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For sowing and growing on.', 'url' => '' ),
						array( 'name' => 'Organic balanced liquid fertilizer', 'badge' => '', 'note' => 'Every few weeks for plants in pots.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why is my parsley taking so long to come up?', 'answer' => 'Parsley is slow to germinate, often a month or more. Keep the potting mix moist and wait: seedlings should appear within six weeks.' ),
						array( 'question' => 'Can I keep parsley for a second year?', 'answer' => 'It is not worth it. Parsley is a biennial: in its second year it flowers and sets seed, and the leaves become coarser and more bitter. Sow new plants each year.' ),
						array( 'question' => 'Can I grow parsley indoors?', 'answer' => 'Yes. Start seeds on a sunny windowsill in early spring, and keep a plant or two growing there. In winter, bringing a pot indoors keeps it productive.' ),
						array( 'question' => 'Should I soak parsley seed before sowing?', 'answer' => 'The RHS does not mention it, but the University of Minnesota suggests soaking the seed in warm water for up to 24 hours before sowing to help germination.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow parsley', 'url' => 'https://www.rhs.org.uk/herbs/parsley/grow-your-own' ),
						array( 'title' => 'RHS — Petroselinum crispum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/41248/petroselinum-crispum/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing parsley', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/growing-parsley' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Flat or curly?' ) .
					$p( 'Both grow the same way. Flat-leaved parsley tends to have a stronger flavor and grows taller; curly parsley is more decorative, slightly milder, and shorter, which suits a windowsill.' ) .

					$h2( 'Pot and position' ) .
					$p( 'Parsley needs a pot of 10 in (25 cm) or more in width and depth, with drainage holes and peat-free all-purpose potting mix. It grows in full sun or partial shade, so it is one of the few herbs that copes with a balcony that only gets part of the day\'s sun.' ) .

					$h2( 'Sow, and be patient' ) .
					$p( 'The University of Minnesota Extension suggests starting seeds indoors, on a sunny windowsill, 6–8 weeks before your last spring frost, or sowing outdoors once the danger of frost has passed; outdoor sowings can carry on to late summer. Sow about ½ in (1 cm) deep in moist potting mix, either straight into the final pot or in cell trays to plant out when the seedlings are 4–6 in (10–15 cm) tall.' ) .
					$p( 'Parsley is slow: germination often takes a month or more, and seedlings should appear within six weeks. Keep the potting mix moist in the meantime. Thin the seedlings to 6–12 in (15–30 cm) apart.' ) .

					$h2( 'Water and fertilize' ) .
					$p( 'Keep the potting mix evenly moist but not waterlogged. In hot, sunny spells, move the pot into shade. Plants in pots benefit from an organic, balanced liquid fertilizer every few weeks.' ) .

					$h2( 'Harvest' ) .
					$p( 'Pick from late spring to fall. Take a few leafy stems from the outside of the plant, snipping them near the base. Regular picking encourages more leaves.' ) .

					$h2( 'Winter and the second year' ) .
					$p( 'Parsley dies down over winter. To keep it productive, bring the pot indoors, into a greenhouse or cold frame, or cover it with a cloche. Parsley is a biennial: in its second summer it flowers and sets seed, and the leaves turn coarse and more bitter. It is not worth keeping plants into a second year; sow fresh ones instead.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Giving up on the seed too early: allow up to six weeks.',
							'Letting the pot dry out in summer: move it to shade in hot spells.',
							'Stripping the center of the plant: pick the outer stems.',
							'Keeping old plants: second-year parsley flowers and turns bitter.',
						)
					),
				'image_prompt' => 'A lush flat-leaved parsley plant with bright green, deeply divided leaflets growing in a 10-inch terracotta pot on a sunny kitchen windowsill, a few stems freshly snipped near the base, small kitchen scissors beside the pot, soft morning light from the window.' . $photo_end,
				'pin_prompt'   => 'A bushy curly parsley plant and a flat-leaved parsley plant side by side in matching terracotta pots on a wooden balcony shelf, bright green foliage, soft daylight, photographed vertically from slightly above.' . $pin_end,
			),

			'chives-in-pots'    => array(
				'title'        => 'How to Grow Chives in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4 ),
					'plant'   => array( 3, 4, 5, 9, 10 ),
					'harvest' => array( 4, 5, 6, 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt'      => 'Chives are one of the easiest herbs for a pot: a clump in a container at least 8 in (20 cm) wide and deep gives mild onion-flavored leaves from spring to fall. Snip them often, cut the clump back after flowering, and divide it every three or four years.',
				'facts'        => array(
					'short_name'     => 'Chives',
					'botanical_name' => 'Allium schoenoprasum',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun or partial shade',
					'pot_size'       => 'At least 8 in (20 cm) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the potting mix evenly moist',
					'harvest'        => 'Spring to fall',
					'season'         => 'Perennial; dies back in winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Buy a small plant, or start seeds ¼–½ in (0.5–1 cm) deep indoors in early spring.' ),
						array( 'point' => 'Use a peat-free soil-based potting mix in a container at least 8 in (20 cm) wide and deep.' ),
						array( 'point' => 'Snip the leaves just above the base; the more you cut, the more they grow.' ),
						array( 'point' => 'After flowering, cut the whole clump down to about 2 in (5 cm) for fresh leaves.' ),
						array( 'point' => 'Divide clumps every three or four years, in spring or fall.' ),
					),
					'varieties'  => array(),
					'products'   => array(
						array( 'name' => 'Pot at least 8 in (20 cm) wide and deep', 'badge' => '', 'note' => 'One clump per pot, with drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'Holds moisture and lasts several years.', 'url' => '' ),
						array( 'name' => 'Herb scissors', 'badge' => '', 'note' => 'For snipping leaves near the base.', 'url' => '' ),
					),
					'faq'          => array(
						array( 'question' => 'Are chive flowers edible?', 'answer' => 'Yes. Both the leaves and the pompom flowers, which appear in late spring and summer, are edible.' ),
						array( 'question' => 'Can I grow chives indoors in winter?', 'answer' => 'Yes. Chives die back in fall; to keep picking, pot up a clump and bring it indoors onto a sunny windowsill. Growth is slow in winter\'s poor light, and the plant may die back a little; do not fertilize it until spring.' ),
						array( 'question' => 'How much sun do chives need?', 'answer' => 'They grow in sun or partial shade. The University of Minnesota suggests six to eight hours of direct light is best.' ),
						array( 'question' => 'What pests affect chives?', 'answer' => 'Chives are generally trouble-free, but aphids and leek rust can appear.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chives', 'url' => 'https://www.rhs.org.uk/herbs/chives/grow-your-own' ),
						array( 'title' => 'RHS — Allium schoenoprasum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/859/allium-schoenoprasum/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing chives', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/growing-chives' ),
						array( 'title' => 'University of Wisconsin–Madison Extension — Chives, Allium schoenoprasum', 'url' => 'https://hort.extension.wisc.edu/articles/chives-allium-schoenoprasum/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Start from a plant or from seed' ) .
					$p( 'The quickest start is a small plant: chives are widely sold in 3½ in (9 cm) pots and can be potted up at any time of year, though spring is ideal. To grow them from seed, start seeds indoors in early spring, in a warm, bright place, ¼–½ in (0.5–1 cm) deep. Plant the seedlings out when they are about 4 in (10 cm) tall, after hardening them off.' ) .
					$p( 'Clumps and seedlings go outside once the danger of frost has passed, as the University of Minnesota and University of Wisconsin–Madison extensions both advise.' ) .

					$h2( 'Pot and position' ) .
					$p( 'Fill a container at least 8 in (20 cm) wide and deep with a peat-free soil-based potting mix. If you grow several clumps, space them at least 6 in (15 cm) apart. Chives grow in sun or partial shade.' ) .

					$h2( 'Water' ) .
					$p( 'Plants in containers dry out more quickly than in the ground, so water through the growing season to keep the potting mix evenly moist.' ) .

					$h2( 'Harvest, and cut back after flowering' ) .
					$p( 'Snip the leaves with scissors just above the base. The more often you harvest, the more new leaves the plant produces. Pompom flowers appear in late spring and summer: they are edible too. After flowering, cut the whole clump down to about 2 in (5 cm), and fresh leaves follow in a few weeks.' ) .

					$h2( 'Winter' ) .
					$p( 'Chives are hardy (RHS rating H6) and die back in fall, returning in spring. To keep picking, pot up a clump and bring it onto a sunny windowsill for winter. Growth is slow indoors in winter light; hold off fertilizing until spring.' ) .

					$h2( 'Divide every few years' ) .
					$p( 'Lift and divide clumps every three or four years, in spring or fall. Replant the pieces in fresh potting mix: one pot becomes several.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Cutting only the tips: snip near the base so new leaves grow.',
							'Letting the pot dry out in summer.',
							'Leaving the clump undivided for years: it gets crowded and less productive.',
						)
					),
				'image_prompt' => 'A dense clump of chives with thin, hollow, upright dark green leaves and several round lilac-purple pompom flowers, growing in a gray glazed pot on a sunny balcony table, early summer light.' . $photo_end,
				'pin_prompt'   => 'Close view of chives in a terracotta pot with lilac pompom flowers, a small bunch of freshly snipped chive leaves lying beside the pot on a wooden balcony floor, soft daylight.' . $pin_end,
			),

			'chili-peppers-in-pots'  => array(
				'title'        => 'How to Grow Chili Peppers in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'start_indoors' => array( -10, -8 ),
					'plant_out'     => array( 2, 2 ),
					'harvest_days'  => array( 70, 85 ),
				),
				'excerpt'      => 'Chili peppers need warmth and a long season, so start them indoors 8–10 weeks before your last spring frost. Grow one plant per 9 in (22 cm) pot in the sunniest, most sheltered spot you have, fertilize weekly once they flower, and pick the first fruit green to get a bigger crop.',
				'facts'        => array(
					'short_name'     => 'Chili pepper',
					'botanical_name' => 'Capsicum annuum',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, sheltered',
					'pot_size'       => '9 in (22 cm) pot per plant',
					'hardiness'      => 'H1c',
					'watering'       => 'Evenly moist; daily in hot weather',
					'harvest'        => 'Midsummer to fall',
					'season'         => 'Start indoors 8–10 weeks before the last spring frost',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Start seeds indoors 8–10 weeks before your last spring frost, at around 70 °F (21 °C).' ),
						array( 'point' => 'Grow one plant per 9 in (22 cm) pot of peat-free all-purpose potting mix.' ),
						array( 'point' => 'Keep indoors until nights stay at 54 °F (12 °C) or more, usually at least two weeks after your last frost.' ),
						array( 'point' => 'Once flowering starts, feed weekly with a high-potassium liquid fertilizer.' ),
						array( 'point' => 'Pick early fruit green: it keeps the plant flowering and the crop larger.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Compact varieties', 'note' => 'The RHS notes that compact varieties can be grown on a sunny windowsill indoors.' ),
					),
					'products'   => array(
						array( 'name' => 'Seedling heat mat or warm windowsill', 'badge' => '', 'note' => 'Seeds need about 70 °F (21 °C) to germinate.', 'url' => '' ),
						array( 'name' => '9 in (22 cm) pots', 'badge' => '', 'note' => 'One per plant, with drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For the final pots.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertilizer', 'badge' => 'Start at first flowers', 'note' => 'Tomato fertilizer works for chili peppers.', 'url' => '' ),
						array( 'name' => 'Short stakes and soft twine', 'badge' => '', 'note' => 'Stems laden with fruit can be brittle.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why are the flowers falling off my chili plant?', 'answer' => 'Most often the potting mix dried out: flower buds may fall if plants get too dry. Very hot days and nights can also make flowers drop. Water so the mix stays evenly moist.' ),
						array( 'question' => 'Can I keep my chili plant over winter?', 'answer' => 'Yes, if you have somewhere heated. Prune it back to a manageable size, keep it in a warm, bright place such as a windowsill or sunroom, and water sparingly until spring.' ),
						array( 'question' => 'Should I pinch out the tip?', 'answer' => 'It is optional. Pinching out the tip at around 1 ft (30 cm) gives a bigger crop of smaller fruit, but it can delay fruiting.' ),
						array( 'question' => 'Do I need gloves to handle chili peppers?', 'answer' => 'It is wise. Chili peppers can irritate skin and eyes: wear gloves when picking and preparing hot varieties, and keep them away from your eyes.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — Capsicum annuum Jalapeño (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/210489/capsicum-annuum-var-annuum-longum-group-jalape%C3%B1o/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing peppers', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/growing-peppers' ),
						array( 'title' => 'University of Maryland Extension — Growing peppers in a home garden', 'url' => 'https://extension.umd.edu/resource/growing-peppers-home-garden' ),
						array( 'title' => 'Colorado State University Extension — Vegetable planting guide', 'url' => 'https://extension.colostate.edu/resource/vegetable-planting-guide/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Sow early, and warm' ) .
					$p( 'Chili peppers need a long, warm season, so start them indoors early: the University of Maryland Extension advises 8–10 weeks before your last spring frost, and up to 12 weeks for some types. The seeds need around 70 °F (21 °C): a seedling heat mat is ideal, though a warm windowsill should work. Once up, keep the seedlings at 60–64 °F (16–18 °C) in bright light.' ) .

					$h2( 'Pot on in stages' ) .
					$p( 'When seedlings are about 1 in (2–3 cm) tall, move each into its own small pot. When roots show through the base, move them into 5 in (13 cm) pots, and finally into a 9 in (22 cm) pot of peat-free all-purpose potting mix, one plant per pot.' ) .

					$h2( 'Where to grow them' ) .
					$p( 'Chili peppers do best with warmth and shelter: a greenhouse, sunroom or cold frame, or outdoors in a sheltered, sun-baked spot on a patio or balcony. Compact varieties can grow on a sunny windowsill indoors.' ) .
					$p( 'Keep them inside until nights are reliably at least 54 °F (12 °C). Colorado State University Extension puts peppers among the very tender crops that go out typically two or more weeks after the average last spring frost. Harden them off for two to three weeks first. They grow better above 59 °F (15 °C); above 86 °F (30 °C), fruiting can drop.' ) .

					$h2( 'Water, fertilize and support' ) .
					$p( 'Keep the potting mix evenly moist and be ready to water daily in hot, dry weather: flower buds may fall if plants get too dry. As soon as flowering starts, feed weekly with an organic, high-potassium liquid fertilizer. Use several stakes per plant, as stems laden with fruit can be brittle.' ) .

					$h2( 'Harvest' ) .
					$p( 'Under cover, picking runs from midsummer into fall. The University of Maryland Extension gives 70–85 days from planting out for most sweet and hot types, and 90–120 days for habanero types. To get the most chili peppers, pick them while still green: letting the first fruit ripen on the plant holds back new flowers and makes the total harvest much smaller. Leave the later fruit to color if you want them red; green ones picked earlier can also finish ripening in the kitchen. Wear gloves for hot varieties, which can irritate skin and eyes. A glut keeps well: chili peppers can be frozen, dried or pickled for winter.' ) .

					$h2( 'Keeping a plant over winter' ) .
					$p( 'With somewhere heated, a chili plant can live on. Prune it back to a manageable size, keep it warm and bright on a windowsill or in a sunroom, and water sparingly until spring.' ) .

					$h2( 'Pests to watch' ) .
					$p( 'Aphids, spider mites and greenhouse whitefly are the usual pests, especially indoors, and gray mold can appear in damp, still air. Check the undersides of leaves regularly.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Starting too late: chili peppers need a long season.',
							'Putting plants out before nights reach 54 °F (12 °C).',
							'Letting the potting mix dry out: the flowers drop.',
							'Leaving the first fruit to ripen on the plant: the crop ends up smaller.',
						)
					),
				'image_prompt' => 'A compact chili pepper plant with glossy dark green leaves, small white flowers and a mix of green and bright red slender chili peppers, growing in a 9-inch terracotta pot on a sunny, sheltered balcony against a warm brick wall, a short bamboo stake supporting the stem.' . $photo_end,
				'pin_prompt'   => 'A chili plant laden with shiny red and green chili peppers in a terracotta pot on a sunny windowsill, photographed vertically from the side, warm late-summer light.' . $pin_end,
			),

			'lemon-tree-in-pot' => array(
				'title'        => 'How to Grow a Lemon Tree in a Pot',
				'type'         => 'fruit',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				// No calendar: fruit ripens over 9–12 months, at no fixed time.
				// No timing: no extension source gives frost-relative dates for a potted lemon.
				'excerpt'      => 'A lemon tree can live in a pot for years: outside in a sunny, sheltered spot in summer, and indoors somewhere cool and bright in winter. Water with care, especially in winter, use citrus fertilizer, and expect fruit to take nine to twelve months to ripen.',
				'facts'        => array(
					'short_name'     => 'Lemon',
					'botanical_name' => 'Citrus × limon',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun, sheltered; bright light in winter',
					'pot_size'       => 'Only slightly larger than the root ball',
					'hardiness'      => 'H2',
					'watering'       => 'Just moist in summer; let the surface dry a little in winter',
					'harvest'        => 'Fruit ripens over 9–12 months',
					'season'         => 'Outside in summer, indoors in winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Lemons cannot take frost: wherever winters bring frost, bring the pot in as soon as nights start to cool in fall.' ),
						array( 'point' => 'Keep it somewhere bright in winter; the RHS gives a minimum night temperature of 50 °F (10 °C) for lemons.' ),
						array( 'point' => 'Use peat-free citrus potting mix, or a soil-based potting mix with about 20 percent grit, in a pot only slightly larger than the roots.' ),
						array( 'point' => 'Use a summer citrus fertilizer from early spring to mid-fall, then a winter citrus fertilizer.' ),
						array( 'point' => 'Never leave the pot standing in water: winter overwatering is one of the commonest problems.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Meyer', 'note' => 'A compact lemon with rounded orange-yellow fruit up to 3 in (8 cm) across, rated H2 by the RHS. Oregon State University describes it as a lemon and mandarin hybrid that stays 3–4 ft (90–120 cm) tall in a container.' ),
					),
					'products'   => array(
						array( 'name' => 'Peat-free citrus potting mix', 'badge' => '', 'note' => 'Or a soil-based potting mix with about 20 percent grit or coarse sand.', 'url' => '' ),
						array( 'name' => 'Summer and winter citrus fertilizers', 'badge' => '', 'note' => 'Two different fertilizers for the two halves of the year.', 'url' => '' ),
						array( 'name' => 'Pebble tray', 'badge' => '', 'note' => 'Stand the pot on wet gravel, water below the surface, for humidity indoors.', 'url' => '' ),
						array( 'name' => 'Pot feet', 'badge' => '', 'note' => 'Keeps the pot out of standing water.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why is my lemon tree dropping its leaves?', 'answer' => 'Usually drafts, temperatures too low or too high in winter, often with too much water. Keep it in a bright, cool room away from cold drafts and hot air, and let the surface of the potting mix dry a little between waterings in winter.' ),
						array( 'question' => 'Why is my lemon tree dropping its flowers indoors?', 'answer' => 'Usually dry roots and dry air. Water before the potting mix dries out completely and stand the pot on a tray of wet gravel indoors.' ),
						array( 'question' => 'How long do lemons take to ripen?', 'answer' => 'Nine to twelve months, so a tree often carries flowers and fruit at the same time. Cut them off with pruners when ripe.' ),
						array( 'question' => 'Does a lemon tree need a partner to fruit?', 'answer' => 'No. Lemon trees are self-fertile.' ),
						array( 'question' => 'What are the white fluffy patches or brown bumps on the stems?', 'answer' => 'Fluffy white wax is mealybug; small brown bumps are scale insects. Both leave sticky honeydew and sooty mold and are found all year on citrus indoors. Spider mites cause mottled leaves from spring to fall.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow citrus', 'url' => 'https://www.rhs.org.uk/fruit/citrus/grow-your-own' ),
						array( 'title' => 'RHS — Citrus problems', 'url' => 'https://www.rhs.org.uk/problems/citrus' ),
						array( 'title' => 'RHS — Citrus × limon (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/91243/citrus-%C3%97-limon-f/details' ),
						array( 'title' => 'RHS — Citrus × limon \'Meyer\'', 'url' => 'https://www.rhs.org.uk/plants/29386/citrus-%C3%97-limon-meyer-f/details' ),
						array( 'title' => 'Oregon State University Extension — How to grow Meyer lemons', 'url' => 'https://extension.oregonstate.edu/news/how-grow-meyer-lemons-successfully-pacific-northwest' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Summer outside, winter inside' ) .
					$p( 'Lemons cannot take frost (RHS rating H2), and in the UK they will not reliably survive winters outdoors, even in the warmest parts. Wherever your winters bring frost, the rhythm is simple: outside in a sunny, sheltered spot in summer, inside in winter.' ) .
					$p( 'Bring the tree in as soon as night temperatures start to dip in fall. Move it out again only when nights are warm, which may mean waiting until early summer, and harden it off gradually over a few weeks first.' ) .

					$h2( 'Where to keep it in winter' ) .
					$p( 'A lemon needs plenty of light in winter and a cool room rather than a heated living room: centrally heated rooms are usually too warm and too dry. The RHS gives a minimum winter night temperature of 50 °F (10 °C) for lemons, though some cope with less. Keep it away from cold drafts and from blasts of hot air. A bright, unheated porch or sunroom is ideal.' ) .
					$p( 'Indoor air is dry. Stand the pot on a tray of gravel or clay pebbles, with the water level kept below the surface. In summer, misting early in the morning helps too.' ) .

					$h2( 'Pot and potting mix' ) .
					$p( 'A young tree can stay in its pot for several years. When roots show through the drainage holes, repot in spring into a pot only slightly larger than the root ball: overpotting causes problems. Use peat-free citrus potting mix, or a soil-based potting mix (a peat-free John Innes No. 2 or No. 3 in the UK) with about 20 percent coarse sand or grit mixed in. In the years between repotting, replace the top inch or two of potting mix.' ) .

					$h2( 'Water with care' ) .
					$p( 'In summer, water regularly, ideally with rainwater, keeping the potting mix just moist; check it daily. In winter, let the surface of the mix dry out partly, then water thoroughly with lukewarm rainwater. Overwatering in winter is one of the commonest problems: never leave the pot standing in water.' ) .

					$h2( 'Fertilize through the year' ) .
					$p( 'From early spring to mid-fall, use a summer citrus fertilizer, which is high in nitrogen. From late fall to early spring, switch to a winter citrus fertilizer. Follow the dilution on the label.' ) .

					$h2( 'Flowers and fruit' ) .
					$p( 'Lemons are self-fertile, so one tree is enough. The fruit ripens slowly, over nine to twelve months. On a tree about 3 ft (1 m) tall, keep no more than 20 fruits, and thin the rest while small. Cut ripe lemons with pruners. A grafted tree usually fruits after two or three years.' ) .
					$p( 'If you would like a second citrus, the RHS names some kumquats, limes and calamondin oranges as fairly easy too, but check how much warmth each needs in winter: it gives about 45 °F (7 °C) or more for kumquats and at least 55 °F (13 °C) for calamondins, against as little as 41 °F (5 °C) for some lemons. Kumquats are the one citrus that can carry a heavy crop of their small fruits without thinning.' ) .

					$h2( 'Pruning' ) .
					$p( 'In late winter, thin crowded branches and cut back leggy stems by up to two-thirds. In summer, shorten strong new shoots to keep them within the crown. Flowers form on the tips of new sideshoots, so do not over-prune, and hard-prune no more than one branch a year.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving it outside into fall: bring it in as nights cool.',
							'Keeping it next to a radiator or heating vent, or in a cold draft: both cause leaf drop.',
							'Watering on a schedule in winter: let the surface dry a little first.',
							'Moving it into a much bigger pot: go up only slightly.',
							'Using one fertilizer all year: switch between summer and winter citrus fertilizers.',
						)
					),
				'image_prompt' => 'A young lemon tree about 3 ft tall with glossy dark green leaves, a few white fragrant flowers and several yellow and green lemons, growing in a large terracotta pot on a sunny, sheltered patio against a pale wall, pot raised on pot feet.' . $photo_end,
				'pin_prompt'   => 'A potted lemon tree with ripe yellow lemons and white blossoms standing in a bright sunroom by a window in winter light, the pot on a tray of gray gravel.' . $pin_end,
			),
		),

		'problem' => array(
			'aphids-container-plants' => array(
				'title'        => 'What Are the Tiny Green or Black Bugs on My Plants? (Aphids)',
				'excerpt'      => 'Clusters of tiny green, black or pink insects on shoot tips and under young leaves are aphids. Squash them, check plants often, and let ladybugs, hoverflies and lacewings do the rest: by midsummer, predators often wipe colonies out.',
				'plants'       => array( 'chili-peppers-in-pots', 'parsley-in-pots', 'chives-in-pots', 'salad-greens-in-pots', 'cherry-tomato', 'balcony-strawberry', 'lemon-tree-in-pot' ),
				'parts'        => array( 'leaves', 'stems', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Aphids on shoot tips and young leaves',
							'sign'     => 'Clusters of small insects, up to about ¼ in (1–7 mm) long, green, black, yellow, pink or white; curled or distorted new leaves',
							'check'    => 'Look at the shoot tips, flower buds and the underside of young leaves: many aphid species gather there. White cast skins on the leaves below are another sign. Ants running up and down the stems often mean aphids, as ants collect their honeydew.',
							'fix'      => 'Squash colonies between finger and thumb, and check the plant again every few days. Pinch out heavily infested shoot tips, as the RHS suggests for black bean aphids on beans. Where you can, tolerate a few: they feed the ladybugs, hoverflies and lacewings that control them.',
							'recovery' => 'New growth comes through normal once numbers fall. Leaves that are already curled stay that way.',
						),
						array(
							'cause'    => 'Honeydew and sooty mold',
							'sign'     => 'Leaves sticky to the touch, or covered with a black, sooty film',
							'check'    => 'Aphids excrete a sugary liquid, honeydew, and black sooty molds grow on it. If the leaves below a colony are sticky or black, the aphids above are the cause.',
							'fix'      => 'Deal with the aphids first. The sooty mold can be wiped off with a damp cloth.',
							'recovery' => 'Wiped leaves recover; the mold does not come back once the aphids are gone.',
						),
						array(
							'cause'    => 'Root aphids',
							'sign'     => 'Plants wilt, stunt or discolor although the potting mix is moist; white waxy powder on the roots',
							'check'    => 'Tip the plant out of its pot and look at the roots. Small aphids, about ⅛ in (2–3 mm) long, with a white waxy covering, mean root aphids. Lettuce root aphid peaks in late summer.',
							'fix'      => 'Wash the potting mix off the roots and repot the plant into fresh mix. Check the roots of new plug plants before planting. Cover salad crops with fine insect-proof mesh from late spring to late summer.',
							'recovery' => 'Lightly affected plants pick up in fresh potting mix; badly affected salad plants are best replaced.',
						),
					),
					'products' => array(
						array( 'name' => 'Fine insect-proof mesh', 'note' => 'Keeps aphids off salad crops from late spring to late summer.', 'url' => '' ),
						array( 'name' => 'Magnifying glass', 'note' => 'Aphids from 1/25 in (1 mm) long are easy to miss without one.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Should I spray aphids with an insecticide?', 'answer' => 'The RHS recommends not using pesticides, organic ones included, because they reduce wildlife, including the predators that control aphids. Squashing, pinching out infested tips and encouraging predators are usually enough.' ),
						array( 'question' => 'Can I wash aphids off with water?', 'answer' => 'The University of Minnesota suggests knocking aphids off plants with a strong spray of water. On a balcony, use a gentle jet that will not damage soft growth or soak the floor below.' ),
						array( 'question' => 'Are beans with black bean aphids still edible?', 'answer' => 'Yes. On fava beans, heavy infestations of black bean aphid (blackfly) can mean fewer pods, but the beans inside are undamaged and perfectly edible.' ),
						array( 'question' => 'Why do I get aphids on indoor plants in winter?', 'answer' => 'Aphids are most active in spring and summer outdoors, but indoors they can breed all year round. Check windowsill herbs and overwintered chili peppers regularly.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Aphids', 'url' => 'https://www.rhs.org.uk/biodiversity/aphids' ),
						array( 'title' => 'RHS — Aphid predators', 'url' => 'https://www.rhs.org.uk/biodiversity/aphid-predators' ),
						array( 'title' => 'RHS — Blackfly (black bean aphid)', 'url' => 'https://www.rhs.org.uk/biodiversity/blackfly' ),
						array( 'title' => 'RHS — Root aphids', 'url' => 'https://www.rhs.org.uk/biodiversity/root-aphids' ),
						array( 'title' => 'RHS — Biological control in the garden', 'url' => 'https://www.rhs.org.uk/prevention-protection/biological-control-garden' ),
						array( 'title' => 'University of Minnesota Extension — Aphids', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/yard-and-garden-insects/aphids' ),
						$book,
					),
				),
				'content'      =>
					$list(
						array(
							'Check shoot tips and the undersides of young leaves every few days in spring and summer.',
							'Squash small colonies as soon as you see them.',
							'Grow flowers near your pots to bring in hoverflies, which also pollinate crops.',
							'Leave some aphids for the predators: by early to midsummer, ladybugs, hoverflies and lacewings often wipe out colonies.',
							'Indoors or in a greenhouse, biological controls such as parasitic wasps and predatory midges work from spring to early fall, in warm, bright conditions.',
						)
					),
				'image_prompt' => 'Close-up of a cluster of small green aphids on the tender shoot tip and underside of a young chili pepper leaf, slightly curled new leaves, a ladybug approaching along the stem, plant in a terracotta pot on a balcony, clean and realistic, not gross.' . $photo_end,
				'pin_prompt'   => 'Macro photograph of green aphids on a pale green shoot tip of a potted herb, with a red ladybug nearby, soft daylight, blurred balcony background.' . $pin_end,
			),
		),
	),
);
