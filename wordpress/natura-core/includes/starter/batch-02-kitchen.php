<?php
/**
 * Starter guides, batch 2: kitchen herbs, chillies, a lemon tree in a pot,
 * and aphids.
 *
 * Facts from the RHS pages listed in each guide (checked 17 October 2026),
 * University of Minnesota and Oregon State University Extension where the
 * RHS is silent, and Jo Whittingham, Backyard Harvest (DK, 2011).
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
	'name'   => __( 'Kitchen herbs, chillies and citrus', 'natura-core' ),
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
				'excerpt'      => 'Parsley grows well in a pot at least 25 cm wide and deep, in sun or part shade. It is slow to germinate, so be patient, then pick the outer stems regularly from late spring to autumn and sow fresh plants each year.',
				'facts'        => array(
					'short_name'     => 'Parsley',
					'botanical_name' => 'Petroselinum crispum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun or partial shade',
					'pot_size'       => 'At least 25 cm (10 in) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the compost evenly moist',
					'harvest'        => 'Late spring to autumn',
					'season'         => 'Sow early spring to late summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Use a pot at least 25 cm (10 in) wide and deep, filled with peat-free multi-purpose compost.' ),
						array( 'point' => 'Sow about 1 cm (½ in) deep; seedlings can take a month or more to appear.' ),
						array( 'point' => 'Keep the compost evenly moist and move the pot into shade in hot, sunny spells.' ),
						array( 'point' => 'Pick a few outer stems at a time, near the base; regular picking means more leaves.' ),
						array( 'point' => 'Treat it as an annual: sow fresh plants each year rather than keeping old ones.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Flat-leaved parsley', 'note' => 'Tends to have a stronger flavour, and the plants grow taller.' ),
						array( 'name' => 'Curly parsley', 'note' => 'More decorative, with a slightly milder flavour; shorter plants.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 25 cm wide and deep', 'badge' => '', 'note' => 'With drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For sowing and growing on.', 'url' => '' ),
						array( 'name' => 'Organic balanced liquid feed', 'badge' => '', 'note' => 'Every few weeks for plants in pots.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why is my parsley taking so long to come up?', 'answer' => 'Parsley is slow to germinate, often a month or more. Keep the compost moist and wait: seedlings should appear within six weeks.' ),
						array( 'question' => 'Can I keep parsley for a second year?', 'answer' => 'It is not worth it. Parsley is a biennial: in its second year it flowers and sets seed, and the leaves become coarser and more bitter. Sow new plants each year.' ),
						array( 'question' => 'Can I grow parsley indoors?', 'answer' => 'Yes. Sow in early spring on a sunny windowsill, and keep a plant or two growing there. In winter, bringing a pot indoors keeps it productive.' ),
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
					$p( 'Both grow the same way. Flat-leaved parsley tends to have a stronger flavour and grows taller; curly parsley is more decorative, slightly milder, and shorter, which suits a windowsill.' ) .

					$h2( 'Pot and position' ) .
					$p( 'Use a pot at least 25 cm (10 in) wide and deep, with drainage holes, filled with peat-free multi-purpose compost. Parsley grows in full sun or partial shade, so it is one of the few herbs that copes with a balcony that only gets part of the day\'s sun.' ) .

					$h2( 'Sow, and be patient' ) .
					$p( 'Sow outdoors from mid-spring to late summer, or indoors on a sunny windowsill from early spring. Sow about 1 cm (½ in) deep in moist compost, either straight into the final pot or in modules to plant out when the seedlings are 10–15 cm (4–6 in) tall.' ) .
					$p( 'Parsley is slow: germination often takes a month or more, and seedlings should appear within six weeks. Keep the compost moist in the meantime. Thin the seedlings to 15–30 cm (6–12 in) apart.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Keep the compost evenly moist but not waterlogged. In hot, sunny spells, move the pot into shade. Plants in pots benefit from an organic, balanced liquid feed every few weeks.' ) .

					$h2( 'Harvest' ) .
					$p( 'Pick from late spring to autumn. Take a few leafy stems from the outside of the plant, snipping them near the base. Regular picking encourages more leaves.' ) .

					$h2( 'Winter and the second year' ) .
					$p( 'Parsley dies down over winter. To keep it productive, bring the pot indoors, into a greenhouse or coldframe, or cover it with a cloche. Parsley is a biennial: in its second summer it flowers and sets seed, and the leaves turn coarse and more bitter. It is not worth keeping plants into a second year; sow fresh ones instead.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Giving up on the seed too early: allow up to six weeks.',
							'Letting the pot dry out in summer: move it to shade in hot spells.',
							'Stripping the centre of the plant: pick the outer stems.',
							'Keeping old plants: second-year parsley flowers and turns bitter.',
						)
					),
				'image_prompt' => 'A lush flat-leaved parsley plant with bright green, deeply divided leaflets growing in a 25 cm terracotta pot on a sunny kitchen windowsill, a few stems freshly snipped near the base, small kitchen scissors beside the pot, soft morning light from the window.' . $photo_end,
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
				'excerpt'      => 'Chives are one of the easiest herbs for a pot: a clump in a container at least 20 cm wide and deep gives mild onion-flavoured leaves from spring to autumn. Snip them often, cut the clump back after flowering, and divide it every three or four years.',
				'facts'        => array(
					'short_name'     => 'Chives',
					'botanical_name' => 'Allium schoenoprasum',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun or partial shade',
					'pot_size'       => 'At least 20 cm (8 in) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the compost evenly moist',
					'harvest'        => 'Spring to autumn',
					'season'         => 'Perennial; dies back in winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Buy a small plant, or sow 0.5–1 cm (¼–½ in) deep indoors in early spring.' ),
						array( 'point' => 'Use peat-free soil-based compost in a container at least 20 cm (8 in) wide and deep.' ),
						array( 'point' => 'Snip the leaves just above the base; the more you cut, the more they grow.' ),
						array( 'point' => 'After flowering, cut the whole clump down to about 5 cm (2 in) for fresh leaves.' ),
						array( 'point' => 'Divide clumps every three or four years, in spring or autumn.' ),
					),
					'varieties'  => array(),
					'products'   => array(
						array( 'name' => 'Pot at least 20 cm wide and deep', 'badge' => '', 'note' => 'One clump per pot, with drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based compost', 'badge' => '', 'note' => 'Holds moisture and lasts several years.', 'url' => '' ),
						array( 'name' => 'Herb scissors', 'badge' => '', 'note' => 'For snipping leaves near the base.', 'url' => '' ),
					),
					'faq'          => array(
						array( 'question' => 'Are chive flowers edible?', 'answer' => 'Yes. Both the leaves and the pompom flowers, which appear in late spring and summer, are edible.' ),
						array( 'question' => 'Can I grow chives indoors in winter?', 'answer' => 'Yes. Chives die back in autumn; to keep picking, pot up a clump and bring it indoors onto a sunny windowsill. Growth is slow in winter\'s poor light, and the plant may die back a little; do not feed it until spring.' ),
						array( 'question' => 'How much sun do chives need?', 'answer' => 'They grow in sun or partial shade. The University of Minnesota suggests six to eight hours of direct light is best.' ),
						array( 'question' => 'What pests affect chives?', 'answer' => 'Chives are generally trouble-free, but aphids and leek rust can appear.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chives', 'url' => 'https://www.rhs.org.uk/herbs/chives/grow-your-own' ),
						array( 'title' => 'RHS — Allium schoenoprasum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/859/allium-schoenoprasum/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing chives', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/growing-chives' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Start from a plant or from seed' ) .
					$p( 'The quickest start is a small plant: chives are widely sold in 9 cm (3½ in) pots and can be planted at any time of year, though spring is ideal. To sow, use early spring indoors, in a warm, bright place, 0.5–1 cm (¼–½ in) deep. Plant the seedlings out when they are about 10 cm (4 in) tall, after hardening them off.' ) .

					$h2( 'Pot and position' ) .
					$p( 'Fill a container at least 20 cm (8 in) wide and deep with peat-free soil-based compost. If you grow several clumps, space them at least 15 cm (6 in) apart. Chives grow in sun or partial shade.' ) .

					$h2( 'Water' ) .
					$p( 'Plants in containers dry out more quickly than in the ground, so water through the growing season to keep the compost evenly moist.' ) .

					$h2( 'Harvest, and cut back after flowering' ) .
					$p( 'Snip the leaves with scissors just above the base. The more often you harvest, the more new leaves the plant produces. Pompom flowers appear in late spring and summer: they are edible too. After flowering, cut the whole clump down to about 5 cm (2 in), and fresh leaves follow in a few weeks.' ) .

					$h2( 'Winter' ) .
					$p( 'Chives are hardy (RHS rating H6) and die back in autumn, returning in spring. To keep picking, pot up a clump and bring it onto a sunny windowsill for winter. Growth is slow indoors in winter light; hold off feeding until spring.' ) .

					$h2( 'Divide every few years' ) .
					$p( 'Lift and divide clumps every three or four years, in spring or autumn. Replant the pieces in fresh compost: one pot becomes several.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Cutting only the tips: snip near the base so new leaves grow.',
							'Letting the pot dry out in summer.',
							'Leaving the clump undivided for years: it gets crowded and less productive.',
						)
					),
				'image_prompt' => 'A dense clump of chives with thin, hollow, upright dark green leaves and several round lilac-purple pompom flowers, growing in a grey glazed pot on a sunny balcony table, early summer light.' . $photo_end,
				'pin_prompt'   => 'Close view of chives in a terracotta pot with lilac pompom flowers, a small bunch of freshly snipped chive leaves lying beside the pot on a wooden balcony floor, soft daylight.' . $pin_end,
			),

			'chillies-in-pots'  => array(
				'title'        => 'How to Grow Chillies in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Chillies need warmth and a long season, so sow them indoors from late winter. Grow one plant per 22 cm pot in the sunniest, most sheltered spot you have, feed weekly once they flower, and pick the first fruit green to get a bigger crop.',
				'facts'        => array(
					'short_name'     => 'Chilli pepper',
					'botanical_name' => 'Capsicum annuum',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, sheltered',
					'pot_size'       => '22 cm (9 in) pot per plant',
					'hardiness'      => 'H1c',
					'watering'       => 'Evenly moist; daily in hot weather',
					'harvest'        => 'Midsummer to autumn',
					'season'         => 'Sow late winter to mid-spring',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow indoors from late winter to mid-spring, at around 21 °C (70 °F).' ),
						array( 'point' => 'Grow one plant per 22 cm (9 in) pot of peat-free multi-purpose compost.' ),
						array( 'point' => 'Keep indoors until nights stay at 12 °C (54 °F) or more, usually late May or early June.' ),
						array( 'point' => 'Once flowering starts, feed weekly with a high-potassium liquid feed.' ),
						array( 'point' => 'Pick early fruit green: it keeps the plant flowering and the crop larger.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Compact varieties', 'note' => 'The RHS notes that compact varieties can be grown on a sunny windowsill indoors.' ),
					),
					'products'   => array(
						array( 'name' => 'Heated propagator or warm windowsill', 'badge' => '', 'note' => 'Seeds need about 21 °C to germinate.', 'url' => '' ),
						array( 'name' => '22 cm (9 in) pots', 'badge' => '', 'note' => 'One per plant, with drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For the final pots.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid feed', 'badge' => 'Start at first flowers', 'note' => 'Tomato feed works for chillies.', 'url' => '' ),
						array( 'name' => 'Short canes and soft twine', 'badge' => '', 'note' => 'Stems laden with fruit can be brittle.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why are the flowers falling off my chilli plant?', 'answer' => 'Most often the compost dried out: flower buds may fall if plants get too dry. Very hot days and nights can also make flowers drop. Water so the compost stays evenly moist.' ),
						array( 'question' => 'Can I keep my chilli plant over winter?', 'answer' => 'Yes, if you have somewhere heated. Prune it back to a manageable size, keep it in a warm, bright place such as a windowsill or conservatory, and water sparingly until spring.' ),
						array( 'question' => 'Should I pinch out the tip?', 'answer' => 'It is optional. Pinching out the tip at around 30 cm (1 ft) gives a bigger crop of smaller fruit, but it can delay fruiting.' ),
						array( 'question' => 'Do I need gloves to handle chillies?', 'answer' => 'It is wise. Chillies can irritate skin and eyes: wear gloves when picking and preparing hot varieties, and keep them away from your eyes.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — Capsicum annuum Jalapeño (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/210489/capsicum-annuum-var-annuum-longum-group-jalape%C3%B1o/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing peppers', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/growing-peppers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Sow early, and warm' ) .
					$p( 'Chillies need a long, warm season, so start them indoors from late winter to mid-spring. The seeds need around 21 °C (70 °F): a heated propagator is ideal, though a warm windowsill should work. Once up, keep the seedlings at 16–18 °C (60–64 °F) in bright light.' ) .

					$h2( 'Pot on in stages' ) .
					$p( 'When seedlings are 2–3 cm (1 in) tall, move each into its own small pot. When roots show through the base, move them into 13 cm (5 in) pots, and finally into a 22 cm (9 in) pot of peat-free multi-purpose compost, one plant per pot.' ) .

					$h2( 'Where to grow them' ) .
					$p( 'Chillies do best with warmth and shelter: a greenhouse, conservatory or coldframe, or outdoors in a sheltered, sun-baked spot on a patio or balcony. Compact varieties can grow on a sunny windowsill indoors.' ) .
					$p( 'Keep them inside until nights are reliably at least 12 °C (54 °F), usually by late May or early June, and harden them off for two to three weeks first. They grow better above 15 °C (59 °F); above 30 °C (86 °F), fruiting can drop.' ) .

					$h2( 'Water, feed and support' ) .
					$p( 'Keep the compost evenly moist and be ready to water daily in hot, dry weather: flower buds may fall if plants get too dry. As soon as flowering starts, feed weekly with an organic, high-potassium liquid feed. Use several canes per plant, as stems laden with fruit can be brittle.' ) .

					$h2( 'Harvest' ) .
					$p( 'Under cover, picking runs from midsummer into autumn; outdoors it should start by August. To get the most chillies, pick them while still green: letting the first fruit ripen on the plant holds back new flowers and makes the total harvest much smaller. Leave the later fruit to colour if you want them red. Wear gloves for hot varieties, which can irritate skin and eyes.' ) .

					$h2( 'Keeping a plant over winter' ) .
					$p( 'With somewhere heated, a chilli plant can live on. Prune it back to a manageable size, keep it warm and bright on a windowsill or in a conservatory, and water sparingly until spring.' ) .

					$h2( 'Pests to watch' ) .
					$p( 'Aphids, glasshouse red spider mite and glasshouse whitefly are the usual pests, especially indoors, and grey mould can appear in damp, still air. Check the undersides of leaves regularly.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing too late: chillies need a long season.',
							'Putting plants out before nights reach 12 °C.',
							'Letting the compost dry out: the flowers drop.',
							'Leaving the first fruit to ripen on the plant: the crop ends up smaller.',
						)
					),
				'image_prompt' => 'A compact chilli pepper plant with glossy dark green leaves, small white flowers and a mix of green and bright red slender chillies, growing in a 22 cm terracotta pot on a sunny, sheltered balcony against a warm brick wall, a short bamboo cane supporting the stem.' . $photo_end,
				'pin_prompt'   => 'A chilli plant laden with shiny red and green chillies in a terracotta pot on a sunny windowsill, photographed vertically from the side, warm late-summer light.' . $pin_end,
			),

			'lemon-tree-in-pot' => array(
				'title'        => 'How to Grow a Lemon Tree in a Pot',
				'type'         => 'fruit',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				// No calendar: fruit ripens over 9–12 months, at no fixed time.
				'excerpt'      => 'A lemon tree can live in a pot for years: outside in a sunny, sheltered spot in summer, and indoors somewhere cool and bright in winter. Water with care, especially in winter, feed with citrus feed, and expect fruit to take nine to twelve months to ripen.',
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
						array( 'point' => 'Lemons will not reliably survive a UK winter outdoors: bring the pot in as soon as nights start to cool in autumn.' ),
						array( 'point' => 'Keep it somewhere bright in winter; the RHS gives a minimum night temperature of 10 °C (50 °F) for lemons.' ),
						array( 'point' => 'Use peat-free citrus compost, or soil-based compost with about 20 per cent grit, in a pot only slightly larger than the roots.' ),
						array( 'point' => 'Feed summer citrus feed from late March to October, then winter citrus feed.' ),
						array( 'point' => 'Never leave the pot standing in water: winter overwatering is one of the commonest problems.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Meyer', 'note' => 'A compact lemon with rounded orange-yellow fruit up to 8 cm across, rated H2 by the RHS. Oregon State University describes it as a lemon and mandarin hybrid that stays 3–4 ft (90–120 cm) tall in a container.' ),
					),
					'products'   => array(
						array( 'name' => 'Peat-free citrus compost', 'badge' => '', 'note' => 'Or a soil-based compost with about 20 per cent grit or sharp sand.', 'url' => '' ),
						array( 'name' => 'Summer and winter citrus feeds', 'badge' => '', 'note' => 'Two different feeds for the two halves of the year.', 'url' => '' ),
						array( 'name' => 'Gravel tray', 'badge' => '', 'note' => 'Stand the pot on wet gravel, water below the surface, for humidity indoors.', 'url' => '' ),
						array( 'name' => 'Pot feet', 'badge' => '', 'note' => 'Keeps the pot out of standing water.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why is my lemon tree dropping its leaves?', 'answer' => 'Usually draughts, temperatures too low or too high in winter, often with too much water. Keep it in a bright, cool room away from cold draughts and hot air, and let the compost surface dry a little between waterings in winter.' ),
						array( 'question' => 'Why are the flowers falling off?', 'answer' => 'Dry roots and dry air. Water before the compost dries out completely and stand the pot on a tray of wet gravel indoors.' ),
						array( 'question' => 'How long do lemons take to ripen?', 'answer' => 'Nine to twelve months, so a tree often carries flowers and fruit at the same time. Cut them off with secateurs when ripe.' ),
						array( 'question' => 'Does a lemon tree need a partner to fruit?', 'answer' => 'No. Lemon trees are self-fertile.' ),
						array( 'question' => 'What are the white fluffy patches or brown bumps on the stems?', 'answer' => 'Fluffy white wax is mealybug; small brown bumps are scale insects. Both leave sticky honeydew and sooty mould and are found all year on citrus indoors. Red spider mite causes mottled leaves from March to October.' ),
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
					$p( 'Lemons will not reliably survive winters outdoors, even in the warmest parts of the UK (RHS rating H2: no frost). The rhythm is simple: outside in a sunny, sheltered spot in summer, inside in winter.' ) .
					$p( 'Bring the tree in as soon as night temperatures start to dip in autumn. Move it out again only when nights are warm, which may mean waiting until mid-June, and harden it off gradually over a few weeks first.' ) .

					$h2( 'Where to keep it in winter' ) .
					$p( 'A lemon needs plenty of light in winter and a cool room rather than a heated living room: centrally heated rooms are usually too warm and too dry. The RHS gives a minimum winter night temperature of 10 °C (50 °F) for lemons, though some cope with less. Keep it away from cold draughts and from blasts of hot air. A bright, unheated porch or conservatory is ideal.' ) .
					$p( 'Indoor air is dry. Stand the pot on a tray of gravel or clay pellets, with the water level kept below the surface. In summer, misting early in the morning helps too.' ) .

					$h2( 'Pot and compost' ) .
					$p( 'A young tree can stay in its pot for several years. When roots show through the drainage holes, repot in spring into a pot only slightly larger than the root ball: overpotting causes problems. Use peat-free citrus compost, or a soil-based compost such as John Innes No 2 or No 3 with about 20 per cent sharp sand or grit mixed in. In the years between repotting, replace the top few centimetres of compost.' ) .

					$h2( 'Water with care' ) .
					$p( 'In summer, water regularly, ideally with rainwater, keeping the compost just moist; check it daily. In winter, let the surface of the compost dry out partly, then water thoroughly with tepid rainwater. Overwatering in winter is one of the commonest problems: never leave the pot standing in water.' ) .

					$h2( 'Feed through the year' ) .
					$p( 'From late March to October, use a summer citrus feed, which is high in nitrogen. From November to mid-March, switch to a winter citrus feed. Follow the dilution on the label.' ) .

					$h2( 'Flowers and fruit' ) .
					$p( 'Lemons are self-fertile, so one tree is enough. The fruit ripens slowly, over nine to twelve months. On a tree about 1 m (3 ft) tall, keep no more than 20 fruits, and thin the rest while small. Cut ripe lemons with secateurs. A grafted tree usually fruits after two or three years.' ) .

					$h2( 'Pruning' ) .
					$p( 'In February, thin crowded branches and cut back leggy stems by up to two-thirds. In summer, shorten strong new shoots to keep them within the crown. Flowers form on the tips of new sideshoots, so do not over-prune, and hard-prune no more than one branch a year.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving it outside into autumn: bring it in as nights cool.',
							'Keeping it next to a radiator, or in a cold draught: both cause leaf drop.',
							'Watering on a schedule in winter: let the surface dry a little first.',
							'Moving it into a much bigger pot: go up only slightly.',
							'Using one feed all year: switch between summer and winter citrus feeds.',
						)
					),
				'image_prompt' => 'A young lemon tree about 1 m tall with glossy dark green leaves, a few white fragrant flowers and several yellow and green lemons, growing in a large terracotta pot on a sunny, sheltered patio against a pale wall, pot raised on pot feet.' . $photo_end,
				'pin_prompt'   => 'A potted lemon tree with ripe yellow lemons and white blossoms standing in a bright conservatory by a window in winter light, the pot on a tray of grey gravel.' . $pin_end,
			),
		),

		'problem' => array(
			'aphids-container-plants' => array(
				'title'        => 'What Are the Tiny Green or Black Bugs on My Plants? (Aphids)',
				'excerpt'      => 'Clusters of tiny green, black or pink insects on shoot tips and under young leaves are aphids. Squash them, check plants often, and let ladybirds, hoverflies and lacewings do the rest: by midsummer, predators often wipe colonies out.',
				'plants'       => array( 'chillies-in-pots', 'parsley-in-pots', 'chives-in-pots', 'salad-leaves-in-pots', 'cherry-tomato', 'balcony-strawberry', 'lemon-tree-in-pot' ),
				'parts'        => array( 'leaves', 'stems', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Aphids on shoot tips and young leaves',
							'sign'     => 'Clusters of small insects, 1–7 mm long, green, black, yellow, pink or white; curled or distorted new leaves',
							'check'    => 'Look at the shoot tips, flower buds and the underside of young leaves: many aphid species gather there. White cast skins on the leaves below are another sign. Ants running up and down the stems often mean aphids, as ants collect their honeydew.',
							'fix'      => 'Squash colonies between finger and thumb, and check the plant again every few days. Pinch out heavily infested shoot tips, as the RHS suggests for blackfly on beans. Where you can, tolerate a few: they feed the ladybirds, hoverflies and lacewings that control them.',
							'recovery' => 'New growth comes through normal once numbers fall. Leaves that are already curled stay that way.',
						),
						array(
							'cause'    => 'Honeydew and sooty mould',
							'sign'     => 'Leaves sticky to the touch, or covered with a black, sooty film',
							'check'    => 'Aphids excrete a sugary liquid, honeydew, and black sooty moulds grow on it. If the leaves below a colony are sticky or black, the aphids above are the cause.',
							'fix'      => 'Deal with the aphids first. The sooty mould can be wiped off with a damp cloth.',
							'recovery' => 'Wiped leaves recover; the mould does not come back once the aphids are gone.',
						),
						array(
							'cause'    => 'Root aphids',
							'sign'     => 'Plants wilt, stunt or discolour although the compost is moist; white waxy powder on the roots',
							'check'    => 'Tip the plant out of its pot and look at the roots. Small aphids, 2–3 mm long, with a white waxy covering, mean root aphids. Lettuce root aphid peaks in August.',
							'fix'      => 'Wash the compost off the roots and repot the plant into fresh compost. Check the roots of new plug plants before planting. Cover salad crops with fine insect-proof mesh from May to August.',
							'recovery' => 'Lightly affected plants pick up in fresh compost; badly affected salad plants are best replaced.',
						),
					),
					'products' => array(
						array( 'name' => 'Fine insect-proof mesh', 'note' => 'Keeps aphids off salad crops from May to August.', 'url' => '' ),
						array( 'name' => 'Magnifying glass', 'note' => 'Aphids from 1 mm long are easy to miss without one.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Should I spray aphids with an insecticide?', 'answer' => 'The RHS recommends not using pesticides, organic ones included, because they reduce wildlife, including the predators that control aphids. Squashing, pinching out infested tips and encouraging predators are usually enough.' ),
						array( 'question' => 'Can I wash aphids off with water?', 'answer' => 'The University of Minnesota suggests knocking aphids off plants with a strong spray of water. On a balcony, use a gentle jet that will not damage soft growth or soak the floor below.' ),
						array( 'question' => 'Are beans with blackfly still edible?', 'answer' => 'Yes. On broad beans, heavy blackfly can mean fewer pods, but the beans inside are undamaged and perfectly edible.' ),
						array( 'question' => 'Why do I get aphids on indoor plants in winter?', 'answer' => 'Aphids are most active in spring and summer outdoors, but indoors they can breed all year round. Check windowsill herbs and overwintered chillies regularly.' ),
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
							'Leave some aphids for the predators: by early to midsummer, ladybirds, hoverflies and lacewings often wipe out colonies.',
							'Indoors or in a greenhouse, biological controls such as parasitic wasps and predatory midges work from late March to September, in warm, bright conditions.',
						)
					),
				'image_prompt' => 'Close-up of a cluster of small green aphids on the tender shoot tip and underside of a young chilli pepper leaf, slightly curled new leaves, a ladybird approaching along the stem, plant in a terracotta pot on a balcony, clean and realistic, not gross.' . $photo_end,
				'pin_prompt'   => 'Macro photograph of green aphids on a pale green shoot tip of a potted herb, with a red ladybird nearby, soft daylight, blurred balcony background.' . $pin_end,
			),
		),
	),
);
