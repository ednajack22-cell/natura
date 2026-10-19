<?php
/**
 * Starter guides, batch 22 (vegetables, third set): kohlrabi, onions and
 * shallots, chicory and endive, winter squash, Florence fennel and
 * mushrooms from a kit.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from Penn State Extension for button mushrooms, and from Jo
 * Whittingham, Backyard Harvest (DK, 2011), used only where the RHS agrees;
 * see design/sources/BACKYARD-HARVEST.md. Hardiness ratings come from the
 * RHS plant profiles listed. Timing (weeks from the reader's frost dates,
 * days to harvest) comes from the US extension pages listed in each guide
 * (checked 19 October 2026). The 'months' data is the UK calendar.
 *
 * Forcing chicory, growing a squash up a trellis, storing the harvest and
 * bolting have their own pages; these guides link to them instead of
 * repeating them. Mushrooms have no sun or hardiness facts on purpose: no
 * source gives them.
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

$rhs_veg_pots = array(
	'title' => 'RHS — Vegetables in containers',
	'url'   => 'https://www.rhs.org.uk/vegetables/containers',
);

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Kohlrabi, onions, chicory, squash, fennel and mushrooms', 'natura-core' ),
	'guides' => array(
		'plant' => array(

			'kohlrabi-in-pots'            => array(
				'title'        => 'How to Grow Kohlrabi in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7, 8 ),
					'plant'   => array( 4, 5 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( -4, -2 ),
					'harvest_days' => array( 50, 50 ),
				),
				'excerpt'      => 'Kohlrabi makes a fast crop of mini veg in a container 1 ft (30 cm) across and deep or larger, standing in sun or light shade. Sow small batches from spring to late summer, keep the potting mix moist and pull each swollen stem when it is between golf-ball and tennis-ball size.',
				'facts'        => array(
					'short_name'     => 'Kohlrabi',
					'botanical_name' => 'Brassica oleracea Gongylodes Group',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun or semi-shade',
					'pot_size'       => 'At least 1 ft (30 cm) wide and deep, plants 6 in (15 cm) apart',
					'hardiness'      => 'H3',
					'watering'       => 'Keep evenly moist: dry potting mix makes the stems woody',
					'harvest'        => 'Golf-ball to tennis-ball size, from about six weeks as baby veg',
					'season'         => 'Sow from 2–4 weeks before your last spring frost until late summer; harvest late spring to early winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'The part you eat is a swollen stem that sits on top of the potting mix, not a root, so a pot 1 ft (30 cm) deep is plenty.' ),
						array( 'point' => 'Cold is the main enemy early in the year: be ready to cover early sowings, or wait for steady temperatures above 50 °F (10 °C) before sowing or planting outside.' ),
						array( 'point' => 'Move seedlings raised in cells on while they are still under 2 in (5 cm) tall; bigger ones settle badly.' ),
						array( 'point' => 'For fall and early-winter picking, sow a purple variety in mid- to late summer, as these are the hardier types.' ),
						array( 'point' => 'Pick young. Left to grow large, kohlrabi loses its sweetness and turns fibrous, especially in a hot, dry spell.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Kolibri (AGM)', 'note' => 'A compact purple kohlrabi with white flesh. The RHS profile says it matures in under eight weeks from sowing and is best eaten young. Rated H3.' ),
						array( 'name' => 'Olivia (AGM)', 'note' => 'Green-skinned and slow to bolt, with good tolerance of mildew. The RHS suggests it for sowing in succession about every three weeks. Rated H3.' ),
						array( 'name' => 'Korist (AGM)', 'note' => 'A green, globe-shaped variety that the RHS recommends for early sowings, with resistance to downy mildew. Rated H3.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 12 in (30 cm) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Holds a small group of plants for mini veg.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'To fill the pot.', 'url' => '' ),
						array( 'name' => 'Seed-starting cell tray', 'badge' => '', 'note' => 'For early sowings indoors, two seeds per cell.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Keeps cabbage white butterflies (imported cabbageworm) off the leaves.', 'url' => '' ),
						array( 'name' => 'Cloche or row cover', 'badge' => '', 'note' => 'For late plants when frost is forecast.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What part of kohlrabi do you eat?', 'answer' => 'Mainly the round, swollen stem just above the potting mix, peeled and then grated raw, sliced into salads or lightly cooked. The young leaves can also be cooked like kale.' ),
						array( 'question' => 'How big should kohlrabi be when I pick it?', 'answer' => 'Somewhere between a golf ball and a tennis ball. In a pot, the RHS suggests pulling it at golf-ball size. Larger stems tend to be woody and less sweet.' ),
						array( 'question' => 'Why did my kohlrabi flower instead of swelling?', 'answer' => 'It bolted. Cold weather early in the season, a sudden change of temperature when moving plants outside, heat and dry potting mix can all trigger it. Sow later outdoors, harden seedlings off gradually and keep the pot moist.' ),
						array( 'question' => 'Can kohlrabi stay out in winter?', 'answer' => 'Purple varieties sown in late summer can be picked into early winter in milder areas. Cover them with a cloche or row cover once cold weather arrives, and pick the rest before hard frosts.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow kohlrabi', 'url' => 'https://www.rhs.org.uk/vegetables/kohl-rabi/grow-your-own' ),
						array( 'title' => 'RHS — Kohlrabi Kolibri (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/251818/kolibri-agm/details' ),
						array( 'title' => 'RHS — Kohlrabi Olivia', 'url' => 'https://www.rhs.org.uk/plants/251820/olivia-agm/details' ),
						array( 'title' => 'RHS — Kohlrabi Korist', 'url' => 'https://www.rhs.org.uk/plants/112393/korist-agm/details' ),
						array( 'title' => 'Colorado State University Extension — Vegetable planting guide', 'url' => 'https://extension.colostate.edu/resource/vegetable-planting-guide/' ),
						array( 'title' => 'University of Minnesota Extension — Growing kohlrabi in home gardens', 'url' => 'https://extension.umn.edu/vegetables/growing-kohlrabi' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why kohlrabi suits a small space' ) .
					$p( 'Kohlrabi is a cabbage relative grown for its fat, round stem, which can be green, white or purple outside and is pale and crisp within. The flavor is mild and sweet, somewhere between broccoli and a gentle turnip. It grows faster than most brassicas, so it fits into gaps between other crops: baby stems can be ready in about six weeks, full-size ones in roughly twelve.' ) .
					$p( 'The RHS says it does best in the ground but works in a large container, especially picked small. If you like the idea of a quick root-like crop, <a href="/plants/turnips-in-pots/">turnips in pots</a> follow the same pick-them-young approach.' ) .

					$h2( 'Pot, potting mix and position' ) .
					$p( 'The RHS minimum is 1 ft (30 cm) both across and deep, with holes in the base. Fill the pot with a peat-free all-purpose potting mix (more on mixes in <a href="/plant-care/potting-mix-for-containers/">potting mix for containers</a>). Kohlrabi likes sun, but some varieties tolerate partial shade in summer, which helps on an east- or west-facing balcony. Final spacing is 6 in (15 cm) between plants.' ) .

					$h2( 'Sowing straight into the pot' ) .
					$p( 'From early spring to midsummer, or into late summer where falls are mild, water the potting mix, scatter seed thinly and cover it with about ½ in (1.5 cm) of potting mix. Seedlings usually show within two weeks. When they are 1 in (2.5 cm) tall or have their first true leaves, thin them to 6 in (15 cm) apart. Small batches every few weeks keep a steady supply; see <a href="/plant-care/succession-planting-small-spaces/">succession planting in small spaces</a>.' ) .
					$p( 'Colorado State University Extension groups kohlrabi with the hardy crops that can be sown outside 2–4 weeks before your last spring frost, and gives about 50 days from sowing to harvest. Early sowings are still a gamble: a cold spell at the seedling stage is one of the commonest reasons the stems never swell. The RHS suggests holding back until it is reliably above 50 °F (10 °C), and Minnesota Extension links late frosts and long runs of cold nights with plants that flower before they swell. If you sow at the early end, keep a cloche or row cover ready for cold nights.' ) .

					$h2( 'Starting plants indoors' ) .
					$p( 'In a cold area, make the first sowings indoors in a cell tray of peat-free seed-starting mix, two seeds per cell ½ in (1.5 cm) deep, and remove the weaker seedling if both come up (<a href="/plant-care/how-to-start-seeds-indoors/">how to start seeds indoors</a> covers the basics). About three to four weeks after they appear, and while they are no more than 2 in (5 cm) tall, harden them off over a couple of weeks (<a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>) and plant them 6 in (15 cm) apart. Aim for mid- to late spring: kohlrabi also moves badly in hot weather.' ) .

					$h2( 'Water, mesh and weeding' ) .
					$list(
						array(
							'<strong>Water</strong>: a shortage slows growth and makes the stems woody, and drought can trigger flowering. Keep the potting mix evenly moist; <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a> sets out a routine.',
							'<strong>Mulch</strong>: a layer of compost on the surface, added once plants are growing well, helps hold moisture in.',
							'<strong>Protect</strong>: cover plants with insect-proof mesh against cabbage white butterflies (the imported cabbageworm), and watch young plants for slugs in damp weather (see <a href="/problems/slugs-and-snails/">slugs and snails</a>).',
							'<strong>Weed by hand</strong>: pull weeds near the stems rather than using a tool, which can nick the swelling stem.',
						)
					) .

					$h2( 'Harvest and the cold months' ) .
					$p( 'Pull or cut each plant once the stem reaches golf-ball to tennis-ball size. With repeated sowings, the RHS says harvests can run from late spring to late fall, and into early winter in milder places. Purple varieties are hardier and slower, so they are the ones to sow in late summer for fall picking. Backyard Harvest also notes that frost damages the last plants, so put a cloche or row cover over them when wintry weather is forecast, or simply pick them first.' ) .
					$p( 'Kohlrabi is usually less troubled by brassica pests than slower relatives because it is in the pot for such a short time. Caterpillars are the most likely problem: see <a href="/problems/caterpillars-on-brassicas/">caterpillars on brassicas</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing outside in early spring cold, which makes plants flower before the stem swells.',
							'Moving seedlings once they are taller than 2 in (5 cm).',
							'Letting the pot dry out in summer, which leaves the stems tough.',
							'Waiting for a big kohlrabi: past tennis-ball size, quality drops quickly.',
							'Leaving the leaves uncovered in summer, when caterpillars can strip them.',
						)
					),
				'image_prompt' => 'A wide terracotta-colored pot about 14 in (35 cm) across on a sunny balcony in late spring, holding four young kohlrabi plants. Each has a smooth, round, purple swollen stem the size of a golf ball sitting on top of dark peat-free potting mix, with long thin leaf stalks rising from the sides of the ball and broad, blue-green, slightly waxy cabbage-like leaves. Railings and potted herbs softly blurred behind, gentle morning light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of purple kohlrabi plants in a terracotta-colored pot on a balcony, round purple stems with leaf stalks springing from them and blue-green leaves. The pot fills the lower half; the top third is a calm, softly blurred pale wall, empty for a title.' . $pin_end,
			),

			'onions-and-shallots-in-pots' => array(
				'title'        => 'How to Grow Onions and Shallots in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 1, 2, 3, 4, 5, 8, 9 ),
					'plant'   => array( 1, 2, 3, 4, 9, 10, 11, 12 ),
					'harvest' => array( 6, 7, 8, 9 ),
				),
				'timing'       => array(
					'plant_out'    => array( -4, -2 ),
					'harvest_days' => array( 110, 110 ),
				),
				'excerpt'      => 'Plant onion sets in a tub no less than 18 in (45 cm) across and as deep, or shallot sets in one at least 1 ft (30 cm) wide and deep, filled with peat-free soil-based potting mix in full sun. Push each set in until only the tip shows, water while the bulbs form, then lift them in summer once the leaves yellow and flop.',
				'facts'        => array(
					'short_name'     => 'Onion and shallot',
					'botanical_name' => 'Allium cepa; shallots are Allium cepa Aggregatum Group',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, warm spot',
					'pot_size'       => 'Onions: 18 in (45 cm) wide and deep. Shallots: 1 ft (30 cm) wide and deep',
					'hardiness'      => 'H3',
					'watering'       => 'More often than in the ground; stop once bulbs have swollen in midsummer',
					'harvest'        => 'Summer, when the leaves turn yellow and fall over; about 110 days from sets',
					'season'         => 'Plant sets 2–4 weeks before your last spring frost, or hardy types in fall and winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sets (small, immature bulbs) are the easiest start: each onion set makes one bulb, each shallot set a cluster of several.' ),
						array( 'point' => 'Heat-treated sets are much less likely to flower early, which spoils the bulb for storing.' ),
						array( 'point' => 'Pick a soil-based potting mix that is peat-free (UK gardeners can use John Innes No. 3); the RHS says shallots generally do not do well in grow bags.' ),
						array( 'point' => 'Snap off any flower stem as soon as it appears, and eat those bulbs first.' ),
						array( 'point' => 'Harvest before the foliage has died right down, and handle the bulbs gently so they do not bruise.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Sturon (AGM)', 'note' => 'A traditional, reliable onion with straw-colored, semi-round bulbs that keep well, according to the RHS. Rated H3.' ),
						array( 'name' => 'Centurion (AGM)', 'note' => 'An early onion with golden-brown skin that the RHS says crops reliably and stores well. Rated H3.' ),
						array( 'name' => 'Marshalls Red Fen', 'note' => 'A red onion whose sets can go in during fall for an early-summer harvest, says the RHS. Rated H3.' ),
						array( 'name' => 'Longor (AGM)', 'note' => 'A long, banana-shaped shallot with pink flesh. The RHS says one set produces up to eight shallots that store well. Rated H3.' ),
						array( 'name' => 'Matador (AGM)', 'note' => 'A shallot raised from seed, one bulb per seed, with red-brown skin; high-yielding and a good keeper according to the RHS. Rated H3.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 18 in (45 cm) wide and deep', 'badge' => '', 'note' => 'For onions; shallots manage in 1 ft (30 cm).', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'Holds moisture and lasts longer than a soilless mix.', 'url' => '' ),
						array( 'name' => 'Heat-treated onion or shallot sets', 'badge' => '', 'note' => 'Less prone to bolting.', 'url' => '' ),
						array( 'name' => 'Organic-based general liquid fertilizer', 'badge' => '', 'note' => 'An occasional feed for shallots in pots, spring to midsummer.', 'url' => '' ),
						array( 'name' => 'Reused row cover or netting', 'badge' => '', 'note' => 'Stops birds pulling up new sets.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What is the difference between onions and shallots in a pot?', 'answer' => 'Shallots are a type of small, sweet onion. A shallot set splits into a cluster of new bulbs, while an onion set grows into one larger bulb. Shallots fit a slightly smaller container, 1 ft (30 cm) wide and deep against 18 in (45 cm) for onions.' ),
						array( 'question' => 'Why are birds pulling my onion sets out?', 'answer' => 'Birds often tug at newly planted sets before they root. Push any you find back in, and lay reused row cover or netting over the pot until the sets are anchored.' ),
						array( 'question' => 'Can I plant onions and shallots in fall?', 'answer' => 'Yes, with overwintering (Japanese) onion sets and the shallot varieties sold for fall and winter planting. They give an earlier crop. Avoid it if your potting mix tends to stay soggy in winter, as the sets can rot.' ),
						array( 'question' => 'Should I bend the onion tops over to ripen them?', 'answer' => 'No. The RHS no longer recommends bending the leaves or loosening the bulbs. Wait until the foliage yellows and topples by itself, then lift the bulbs before it has died down completely.' ),
						array( 'question' => 'Can I grow shallots from seed?', 'answer' => 'Yes, though it is slower. Each seed makes a single bulb, so sow five or six per cell in late winter, thin to three or four and plant the clump without splitting it.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow onions', 'url' => 'https://www.rhs.org.uk/vegetables/onions/grow-your-own' ),
						array( 'title' => 'RHS — How to grow shallots', 'url' => 'https://www.rhs.org.uk/vegetables/shallots/grow-your-own' ),
						array( 'title' => 'RHS — Onion Sturon (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/112439/sturon-agm/details' ),
						array( 'title' => 'RHS — Shallot Longor', 'url' => 'https://www.rhs.org.uk/plants/148633/longor-agm/details' ),
						array( 'title' => 'RHS — Onion fly', 'url' => 'https://www.rhs.org.uk/biodiversity/onion-fly' ),
						array( 'title' => 'Colorado State University Extension — Vegetable planting guide', 'url' => 'https://extension.colostate.edu/resource/vegetable-planting-guide/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Bulb onions and shallots in a container' ) .
					$p( 'This guide is about onions and shallots grown to full-size bulbs for keeping. If you want thin green onions to pull young, see <a href="/plants/green-onions-in-pots/">green onions in pots</a>; garlic, planted in a similar way but at a different time, has its own page at <a href="/plants/garlic-in-pots/">garlic in pots</a>.' ) .
					$p( 'Both crops take little room and look after themselves, but they need a warm, sunny spot and potting mix that drains well. The RHS suggests containers when the ground is too wet or there is no ground at all, which makes them a fair choice for a sunny patio.' ) .

					$h2( 'Pot size and potting mix' ) .
					$p( 'Onions want a tub no smaller than 18 in (45 cm) across and the same depth; shallots manage with 1 ft (30 cm) each way. Fill with peat-free soil-based potting mix, which holds water and nutrients well and keeps its structure all season. Both crops have small root systems, which is why a rich, moisture-holding mix matters. <a href="/plant-care/potting-mix-for-containers/">Potting mix for containers</a> explains the difference between soil-based and all-purpose mixes.' ) .

					$h2( 'Planting sets' ) .
					$p( 'Most onion sets go in from early to mid-spring for a harvest from midsummer to early fall. Colorado State University Extension puts onions among the hardy crops that can be planted 2–4 weeks before your last spring frost, and gives about 110 days from planting sets to harvest. Overwintering, or Japanese, onions are planted in fall and are ready in early to midsummer. Shallot sets can be planted in spring, and some varieties in fall or winter.' ) .
					$list(
						array(
							'Onions: press each set about ¾ in (2 cm) into the potting mix so the tip just shows, 4–6 in (10–15 cm) apart. Wider spacing gives bigger bulbs.',
							'Shallots: set them with the tip at the surface, 6–8 in (15–20 cm) apart, as each one spreads into a cluster.',
							'Firm the potting mix around each set and water it in.',
							'Skip fall planting if the container sits where it stays wet all winter.',
						)
					) .

					$h2( 'Growing from seed instead' ) .
					$p( 'Seed is cheaper and offers more varieties, but needs more care. The plants must be growing strongly by late spring, because lengthening days set off bulb formation, and more leaves at that point mean bigger bulbs. Sow onions indoors from midwinter to early spring, ½ in (1.3 cm) deep in cells; shallots in late winter, five or six seeds per cell, thinned to three or four. Plant the clumps out whole in spring after hardening them off. Backyard Harvest also describes sowing in clumps of several seeds to grow bunches of smaller bulbs. For the technique, see <a href="/plant-care/how-to-start-seeds-indoors/">how to start seeds indoors</a>.' ) .

					$h2( 'Care through spring and summer' ) .
					$list(
						array(
							'<strong>Water</strong>: pots need watering more often than the ground, especially while roots are forming. Pour onto the potting mix, not over the leaves, which encourages fungal disease. Stop once the bulbs have swollen in midsummer, or spring-planted bulbs will not keep as well.',
							'<strong>Feed</strong>: the RHS suggests an occasional organic-based general liquid feed for shallots in containers from spring to midsummer; for onions it relies on a rich potting mix at planting. See <a href="/plant-care/how-to-fertilize-container-plants/">how to feed container plants</a>.',
							'<strong>Weed</strong>: the narrow leaves cast little shade, so weeds sprout easily and compete. Pull them out by hand.',
							'<strong>Flower stems</strong>: remove them as soon as they appear; a bulb that tried to flower will not store.',
						)
					) .
					$p( 'Onion maggots, the larvae of the onion fly, feed on roots and bulbs, making the outer leaves yellow and wilt; in the UK, the RHS says the pest is most common in central and eastern England and does most damage in early to midsummer. Early flowering is usually caused by cold in spring; <a href="/problems/plants-bolting/">plants bolting</a> explains it.' ) .

					$h2( 'Lifting and drying the crop' ) .
					$p( 'When the leaves turn yellow and flop over, ease the bulbs out with a hand fork, taking care not to bruise them; use any damaged ones straight away. Pull shallot clusters apart into single bulbs. To keep them, dry them for about two weeks in a single layer on a rack, in full sun or, in wet weather, somewhere airy under cover. The rest of the method is in <a href="/plant-care/how-to-store-your-harvest/">how to store your harvest</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Burying sets completely instead of leaving the tip at the surface.',
							'Planting large sets that are not heat-treated, which are more likely to bolt.',
							'Using a grow bag for shallots, which the RHS says rarely does well.',
							'Watering spring-planted bulbs after midsummer, which shortens their storage life.',
							'Carrying on into fall after the leaves have died right back, instead of lifting on time.',
						)
					),
				'image_prompt' => 'A deep, square, gray container about 18 in (45 cm) across on a sunny patio in early summer, filled with onion plants grown from sets. Each plant has upright, hollow, tubular, blue-green leaves and a round golden-brown bulb half-showing at the surface of dark potting mix. In a smaller pot beside it, a cluster of reddish-brown shallot bulbs sits at the surface with similar narrow tubular leaves. Warm paving and a sunny wall blurred behind.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of onions growing in a deep gray container on a sunny patio, golden bulbs swelling at the potting mix surface below upright tubular blue-green leaves. The container sits low in the frame; the top third is a soft, empty pale sky, kept clear for a title.' . $pin_end,
			),

			'chicory-and-endive-in-pots'  => array(
				'title'        => 'How to Grow Chicory and Endive in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7, 8 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'fall_sow' => array( -13, -13 ),
				),
				'excerpt'      => 'Radicchio, sugarloaf chicory and endive (frisée and escarole) all grow in a pot 1 ft (30 cm) or more across, of peat-free all-purpose potting mix, in sun or light summer shade. Sow them from late spring to late summer, not earlier, keep them watered and cut whole heads from late summer into fall and winter.',
				'facts'        => array(
					'short_name'     => 'Chicory and endive',
					'botanical_name' => 'Cichorium intybus (chicory); Cichorium endivia (endive)',
					'difficulty'     => 'Moderate',
					'sun'            => 'Sun, or partial shade in summer',
					'pot_size'       => 'At least 1 ft (30 cm) wide; a 16 in (40 cm) pot holds up to three full-size endives',
					'hardiness'      => 'H5 (radicchio and sugarloaf chicory); H3 (endive)',
					'watering'       => 'Regular: dry potting mix makes the leaves bitter and the plants flower',
					'harvest'        => 'Heads from late summer to mid-fall; escarole into winter under cover',
					'season'         => 'Sow late spring to late summer, about three months before your first fall frost for a fall crop; avoid early outdoor sowings',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Do not sow too early outside: cold spells make young chicory and endive flower instead of forming heads.' ),
						array( 'point' => 'Radicchio and sugarloaf chicory blanch themselves, because their outer leaves shade the heart.' ),
						array( 'point' => 'Endive is more bitter; cover the center of a mature, dry plant for about two weeks to pale and sweeten it.' ),
						array( 'point' => 'For leaves in winter, sow escarole (broad-leaved endive) in late summer and cover it from mid-fall.' ),
						array( 'point' => 'After cutting a radicchio or sugarloaf head, leave the stump: it often grows a second, smaller one.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Palla Rossa (AGM)', 'note' => 'A radicchio with maroon-green, white-veined leaves and a firm heart, harvested from early to late fall according to the RHS. Rated H5.' ),
						array( 'name' => 'Pan di Zucchero (AGM)', 'note' => 'Sugarloaf chicory: upright, light green heads with a crisp heart that the RHS says blanches well. Rated H5.' ),
						array( 'name' => 'Leonardo', 'note' => 'A radicchio for late summer and fall whose large heads turn red as nights get colder, says the RHS. Rated H5.' ),
						array( 'name' => 'Pancalieri (AGM)', 'note' => 'A frisée endive with finely cut outer leaves and an almost self-blanching creamy heart. Rated H3.' ),
						array( 'name' => 'Natacha (AGM)', 'note' => 'A broad-leaved escarole that the RHS describes as hardy and slow to bolt, a good choice for winter. Rated H3.' ),
					),
					'products'   => array(
						array( 'name' => 'Container 12–16 in (30–40 cm) wide, with drainage holes', 'badge' => '', 'note' => 'One radicchio or up to three endives in the larger size.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For sowing or planting.', 'url' => '' ),
						array( 'name' => 'General-purpose liquid feed', 'badge' => '', 'note' => 'Every two weeks in summer for plants in pots.', 'url' => '' ),
						array( 'name' => 'Large plate or upturned pot with its holes taped over', 'badge' => '', 'note' => 'For blanching endive.', 'url' => '' ),
						array( 'name' => 'Cloche or row cover', 'badge' => '', 'note' => 'For fall and winter heads.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What is the difference between chicory and endive?', 'answer' => 'They are close relatives. Chicory includes red radicchio, green sugarloaf and the forcing type that makes chicons. Endive comes as curly frisée or broad-leaved escarole (Batavian). All have a pleasantly bitter taste and are grown in much the same way.' ),
						array( 'question' => 'Does radicchio need blanching?', 'answer' => 'Usually not. The outer leaves wrap the heart and keep light off it, so the inner leaves are already paler and milder. You can tie the outer leaves together loosely, or cover the head with a bucket, for a couple of weeks if you want it milder still.' ),
						array( 'question' => 'How do I blanch endive in a pot?', 'answer' => 'Wait until a plant is mature and the leaves are dry. Then tie the head loosely, put a plate over the center, or cover the whole plant with an upturned pot with its holes blocked. Check after about two weeks, longer in cool fall weather. Blanch a few at a time, as they spoil quickly afterwards.' ),
						array( 'question' => 'How do I get chicons from chicory roots?', 'answer' => 'That needs a forcing variety such as Witloof, lifted in late fall and grown on in the dark. It is a separate project: see force chicory in a pot.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chicory', 'url' => 'https://www.rhs.org.uk/vegetables/chicory/grow-your-own' ),
						array( 'title' => 'RHS — How to grow endive', 'url' => 'https://www.rhs.org.uk/vegetables/endive/grow-your-own' ),
						array( 'title' => 'RHS — Radicchio Palla Rossa (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/194685/palla-rossa-agm/details' ),
						array( 'title' => 'RHS — Endive Natacha (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/295461/natacha-agm/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing lettuce, endive and radicchio', 'url' => 'https://extension.umn.edu/vegetables/growing-lettuce-endive-and-radicchio' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Which chicories and endives to grow' ) .
					$p( 'This page covers the heading types grown for fall and early-winter salads: red radicchio, green sugarloaf chicory, curly frisée and broad escarole. Forcing chicory is a different job, done indoors in winter, and has its own step-by-step page: <a href="/diy-projects/force-chicory-in-a-pot/">force chicory in a pot</a>. Mizuna, mustards and other winter salad greens are in <a href="/plants/asian-greens-in-pots/">Asian greens in pots</a>.' ) .
					$list(
						array(
							'<strong>Radicchio</strong>: a tight head of deep red, white-veined leaves; the color usually deepens from late summer as nights get cooler.',
							'<strong>Sugarloaf</strong>: a tall green head like a cos lettuce, sweeter than other chicories.',
							'<strong>Frisée</strong>: a loose rosette of fine, frilly leaves, more tolerant of hot weather.',
							'<strong>Escarole</strong>: broad, flat leaves on a sturdier plant, the one to choose for winter.',
						)
					) .

					$h2( 'Container and position' ) .
					$p( 'One chicory head needs a pot 1 ft (30 cm) or more across, of peat-free all-purpose potting mix. The RHS says a 16 in (40 cm) pot takes up to three full-size endives, or six smaller plants for cut-and-come-again picking. Both crops like an open, sunny spot but cope with partial shade in summer.' ) .

					$h2( 'When and how to sow' ) .
					$p( 'Timing matters more than anything. Sown too early outside, both crops tend to flower without forming a head.' ) .
					$list(
						array(
							'Radicchio and sugarloaf: sow indoors in mid- to late spring, or straight into the pot in early to midsummer, ½ in (1 cm) deep. Thin to one plant per 1 ft (30 cm).',
							'Endive: seed needs potting mix at 59 °F (15 °C) or more to germinate, so sow outdoors from late spring to late summer, or indoors from late winter with a bolt-resistant variety. Thin to 9–15 in (23–38 cm).',
							'Winter escarole: sow in late summer.',
							'For a fall crop, the University of Minnesota Extension suggests sowing about three months before your average first fall frost.',
							'Indoor seedlings go out once the weather is reliably warm, from late spring, after hardening off (<a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>).',
						)
					) .

					$h2( 'Water and feeding' ) .
					$p( 'In a pot the potting mix dries quickly in summer, and a dry spell both sends plants to flower and makes the leaves taste harsher. Water regularly (see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>) and give a general-purpose liquid feed every two weeks through summer. Check for slugs, which love the tender centers, especially under any cover; <a href="/problems/slugs-and-snails/">slugs and snails</a> lists safe ways to deal with them.' ) .

					$h2( 'Blanching for milder leaves' ) .
					$p( 'Radicchio and sugarloaf need no help. Endive is more bitter, so once a plant is mature, exclude light from its heart. Make sure the leaves are dry first, or they rot. Tie the head together loosely, lay a plate or tile over the center, or cover the whole plant with an upturned pot. The RHS gives about two weeks, longer in cool fall weather; the center should then be pale and tender.' ) .

					$h2( 'Harvesting and winter cover' ) .
					$p( 'Radicchio and sugarloaf heads are ready from late summer to mid-fall. Cut them at the base with a sharp knife and leave the stump, which may sprout a second, smaller head. Whole endive heads are ready about three months after sowing. Pick before the first frosts, or put a cloche or row cover over the pot; the RHS covers escarole from mid-fall onwards. Backyard Harvest adds that cold, wet weather can make them rot, so a sheltered spot under cover helps in late fall. Discard the tough outer leaves in the kitchen: the pale heart is the best part.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing outdoors in early spring, when cold makes the plants bolt.',
							'Letting the pot dry out in summer, which turns the leaves very bitter.',
							'Covering wet endive leaves to blanch them, which makes them rot.',
							'Blanching every plant at once: they spoil within days once pale.',
							'Pulling up the root after cutting a radicchio head instead of letting it regrow.',
						)
					),
				'image_prompt' => 'Two containers about 14 in (35 cm) across on a sheltered balcony in fall light. One holds a radicchio with a tight, round head of glossy deep red leaves with bright white veins, framed by looser green outer leaves. The other holds a frisée endive, a wide rosette of finely cut, frilly bright green leaves with a pale creamy-yellow center. Dew on the leaves, wooden decking and a few fallen leaves blurred in the background.' . $photo_end,
				'pin_prompt'   => 'Vertical close photograph of a red radicchio head with white veins in a pot on a fall balcony, a frilly green frisée endive in a second pot just behind. The pots fill the lower half; the top third is soft, empty, pale gray sky for a title.' . $pin_end,
			),

			'winter-squash-in-pots'       => array(
				'title'        => 'How to Grow Winter Squash in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'patio', 'balcony' ),
				'months'       => array(
					'sow'     => array( 4, 5 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 8, 9, 10 ),
				),
				'timing'       => array(
					'start_indoors' => array( -3, -3 ),
					'plant_out'     => array( 0, 0 ),
					'harvest_days'  => array( 60, 100 ),
				),
				'excerpt'      => 'Most winter squashes do best in the ground, but a small-fruited or compact bush variety can crop in a container at least 18 in (45 cm) wide in a warm, sunny, sheltered spot. Plant it out once all danger of frost has passed, water and feed generously, and let the fruits ripen fully on the plant before cutting them in fall.',
				'facts'        => array(
					'short_name'     => 'Winter squash',
					'botanical_name' => 'Cucurbita maxima, C. moschata or C. pepo',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun, warm and sheltered',
					'pot_size'       => 'One plant in a container at least 18 in (45 cm) wide',
					'hardiness'      => 'H2',
					'watering'       => 'Heavy, especially once fruits form; keep water off the leaves',
					'harvest'        => 'Late summer to fall, always before the first frost; 60–100 days, depending on the variety',
					'season'         => 'Start indoors about 3 weeks before planting out; plant out once all danger of frost has passed',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Be realistic: the RHS says only smaller varieties suit large containers, and most squashes fare best in open ground.' ),
						array( 'point' => 'Pick a compact bush type or a small-fruited trailing one; giants and big trailing varieties will not work in a pot.' ),
						array( 'point' => 'Squash is killed by frost, so nothing goes outside until all danger of frost has passed.' ),
						array( 'point' => 'Once the first fruits start to swell, give a high-potassium liquid feed every 10–14 days.' ),
						array( 'point' => 'Leave the fruits to ripen in full sun on the plant, and cut them with a long stalk before frost.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Harlequin (AGM)', 'note' => 'An early, compact, bushy acorn squash with striped fruits of around 1½ lb (700 g). The RHS calls it a good alternative for smaller gardens because it does not trail for yards, though support may help keep fruit off the ground. Rated H2.' ),
						array( 'name' => 'Sweet Dumpling (AGM)', 'note' => 'Small, cream fruits striped with green and with orange flesh. Backyard Harvest names it as one that can be grown in a container up a tepee. Rated H2.' ),
						array( 'name' => 'Jack be Little', 'note' => 'A trailing pumpkin-type squash with palm-sized, ribbed orange fruits, about ten per plant according to the RHS, which can keep for up to 12 months once ripe. Rated H2.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 18 in (45 cm) wide, with drainage holes', 'badge' => '', 'note' => 'One plant per container.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'badge' => '', 'note' => 'Either works for squash in a container.', 'url' => '' ),
						array( 'name' => '3 in (7.5 cm) pots', 'badge' => '', 'note' => 'For sowing one seed each indoors.', 'url' => '' ),
						array( 'name' => 'Organic-based high-potassium liquid fertilizer', 'badge' => '', 'note' => 'Every 10–14 days once fruits swell.', 'url' => '' ),
						array( 'name' => 'Tile or small board', 'badge' => '', 'note' => 'To lift a fruit off damp potting mix.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What is the difference between summer and winter squash?', 'answer' => 'Summer squashes, such as patty pans, have thin skins and are picked young to eat straight away, like zucchini. Winter squashes, such as butternuts and acorn squashes, are left to ripen fully and harden their skins, so they can be stored into winter.' ),
						array( 'question' => 'Bush or trailing squash for a container?', 'answer' => 'A compact bush type stays put in its container but still spreads about 3 ft (1 m). A small-fruited trailing type needs to be trained up a strong support to fit a balcony. Large trailing varieties, which run for several yards, are not suited to pots.' ),
						array( 'question' => 'How can I tell a winter squash is ripe?', 'answer' => 'The RHS looks for a deep, rich color, a tough skin and a hollow sound when you tap it. Keep it on the plant as long as you can for the best flavor, but always cut it before a frost.' ),
						array( 'question' => 'Why are the leaves of my squash turning white?', 'answer' => 'That is very likely powdery mildew, which is encouraged when the potting mix dries out. Water regularly at the base of the plant and leave space around the container for air to move.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow squashes', 'url' => 'https://www.rhs.org.uk/vegetables/squash/grow-your-own' ),
						array( 'title' => 'RHS — How to grow pumpkins', 'url' => 'https://www.rhs.org.uk/vegetables/pumpkins/grow-your-own' ),
						array( 'title' => 'RHS — Squash Harlequin (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/318439/harlequin-agm/details' ),
						array( 'title' => 'RHS — Squash Sweet Dumpling', 'url' => 'https://www.rhs.org.uk/plants/267553/sweet-dumpling-agm/details' ),
						array( 'title' => 'RHS — Squash Jack be Little', 'url' => 'https://www.rhs.org.uk/plants/199839/jack-be-little/details' ),
						array( 'title' => 'RHS — Squash Crown Prince', 'url' => 'https://www.rhs.org.uk/plants/237223/crown-prince-agm/details' ),
						array( 'title' => 'RHS — Courgette, marrow, pumpkin and squash problems', 'url' => 'https://www.rhs.org.uk/problems/courgette-marrow-pumpkin-and-squash' ),
						array( 'title' => 'University of Maryland Extension — Growing winter squash in a home garden', 'url' => 'https://extension.umd.edu/resource/growing-winter-squash-home-garden/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Can a winter squash really grow in a pot?' ) .
					$p( 'Honestly, it is one of the harder crops for a container. The RHS says squashes need plenty of space and most do best in the ground; even bush types spread to about 3 ft (90 cm). It does allow that smaller varieties can be grown in large containers, and Backyard Harvest suggests small-fruited ones trained upwards where space is tight. Expect a handful of fruits rather than a big harvest.' ) .
					$p( 'Zucchini is a far easier container crop from the same family; see <a href="/plants/zucchini-in-pots/">zucchini in pots</a>. Winter squash is worth trying if you have a warm, sunny, sheltered corner and want something to store.' ) .

					$h2( 'Choose a variety that fits' ) .
					$p( 'There are two routes. A compact bush variety, such as Harlequin, stays low in its container and does not trail away across the floor. A small-fruited trailing variety, such as Sweet Dumpling or Jack be Little, can be tied up a sturdy support so it takes wall space rather than floor space. The whole method for training one upwards is in <a href="/diy-projects/grow-a-squash-up-a-trellis-in-a-pot/">grow a squash up a trellis in a pot</a>. Avoid big trailing types such as Crown Prince, whose vines reach about 10 ft (3 m).' ) .

					$h2( 'Container and spot' ) .
					$p( 'Plant one squash in a container at least 18 in (45 cm) across, filled with peat-free all-purpose or soil-based potting mix (see <a href="/plant-care/potting-mix-for-containers/">potting mix for containers</a>). It needs full sun and warmth. Leave room around the container: crowded, still air encourages fungal diseases.' ) .

					$h2( 'From seed to planting out' ) .
					$p( 'University of Maryland Extension suggests starting squash indoors about 3 weeks before planting time, which comes once all danger of frost has passed and the soil has warmed. Push a single seed edgeways into a small 3 in (7.5 cm) pot, about ½ in (13 mm) down, and keep it warm, ideally 65–70 °F (18–21 °C); <a href="/plant-care/how-to-start-seeds-indoors/">how to start seeds indoors</a> covers the routine. Buying a young plant in late spring is a simpler option if you only want one. Squash is tender, so harden it off before it goes out (<a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>), and handle the young plant gently: Maryland advises disturbing the roots as little as possible. Expect 60–100 days to maturity, depending on the variety.' ) .

					$h2( 'Water, feed and ripen' ) .
					$list(
						array(
							'<strong>Water</strong>: squashes are thirsty, above all when fruiting. Pour water onto the potting mix, not the leaves, ideally in the morning or evening. Lack of water encourages <a href="/problems/powdery-mildew/">powdery mildew</a>.',
							'<strong>Feed</strong>: in a container, start an organic-based, high-potassium liquid fertilizer every 10–14 days once the first fruits swell.',
							'<strong>Lift the fruit</strong>: slip a tile or board under any fruit resting on damp potting mix, so it does not rot.',
							'<strong>Let in the sun</strong>: near harvest time, cut away some leaves shading the fruits to help them ripen, as both the RHS and Backyard Harvest suggest.',
						)
					) .
					$p( 'If small fruits shrivel early in a cool summer, poor pollination is the usual reason; it often stops as the weather warms.' ) .

					$h2( 'Harvesting and curing' ) .
					$p( 'The riper a winter squash is when you cut it, the better it keeps, so leave it on the plant as long as possible, but bring it in before any frost: frosted fruit will not store. Cut it with at least 4 in (10 cm) of stalk, and never carry it by the stalk. Cure the fruits by leaving them somewhere sunny for one to two weeks until the skins toughen, then keep them in an airy place at 50–60 °F (10–15 °C), not touching. Depending on the variety, they last three months or more. The full storage routine is in <a href="/plant-care/how-to-store-your-harvest/">how to store your harvest</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting a large trailing variety in a pot, where it soon outgrows its space.',
							'Putting plants outside before the last frost.',
							'Letting a big plant in a container go short of water once fruits form.',
							'Cutting the fruit too early or too close, leaving a soft spot that rots in store.',
							'Letting a vine climb a railing or hang over the edge, where a falling fruit could hurt someone.',
						)
					),
				'image_prompt' => 'A large, round, dark green container about 20 in (50 cm) across on a sunny, sheltered patio in early fall, holding one compact bush winter squash plant. Broad, rounded, slightly lobed leaves with a rough texture, a yellow trumpet-shaped flower, and three small acorn-shaped squashes with deep ribs, striped green, yellow and orange, resting on the potting mix, one sitting on a small terracotta tile. Low warm sun, brick wall blurred behind.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of small striped acorn squashes ripening on a compact squash plant in a large green container on a sunny patio, broad rough leaves around them. The container fills the lower half; the top third is a calm, softly blurred warm wall with empty space for a title.' . $pin_end,
			),

			'florence-fennel-in-pots'     => array(
				'title'        => 'How to Grow Florence Fennel in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6, 7 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10, 11 ),
				),
				'timing'       => array(
					'start_indoors' => array( -6, -4 ),
					'plant_out'     => array( 0, 0 ),
					'harvest_days'  => array( 60, 90 ),
				),
				'excerpt'      => 'Florence fennel forms a bulb in a large pot of peat-free all-purpose potting mix, up to three plants in one about 16 in (40 cm) wide, in a warm, sheltered, sunny spot. The secret is to sow in early summer, disturb the roots as little as possible and never let the potting mix dry out, or it flowers instead of swelling.',
				'facts'        => array(
					'short_name'     => 'Florence fennel',
					'botanical_name' => 'Foeniculum vulgare var. azoricum',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun, warm and sheltered',
					'pot_size'       => 'About 16 in (40 cm) wide for up to three plants',
					'hardiness'      => 'H5',
					'watering'       => 'Constant: the potting mix should never dry out',
					'harvest'        => 'Late summer and fall, at 2–6 in (5–15 cm) across; 60–90 days, depending on the variety',
					'season'         => 'Start indoors 4–6 weeks before your last spring frost, or sow outdoors in early to midsummer; plant out once frost has passed',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Bolting is the big risk: cold in spring, root disturbance and dry potting mix all make fennel flower instead of forming a bulb.' ),
						array( 'point' => 'Choose a bolt-resistant variety, and wait until early summer to sow outdoors.' ),
						array( 'point' => 'Sow one seed per cell indoors, or sow straight into the pot, so the roots are never broken.' ),
						array( 'point' => 'Water often; container plants are the most likely to dry out and bolt.' ),
						array( 'point' => 'Harvest at any size from 2 in (5 cm), and always before the bulb lengthens and sends up a flower stem.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Dragon (AGM)', 'note' => 'A compact F1 hybrid about 30 in (75 cm) tall that the RHS describes as resistant to bolting and yellowing. Rated H5.' ),
						array( 'name' => 'Rondo (AGM)', 'note' => 'A Florence fennel variety on the RHS list of recommended varieties. Rated H5.' ),
					),
					'products'   => array(
						array( 'name' => 'Container about 16 in (40 cm) wide, with drainage holes', 'badge' => '', 'note' => 'Up to three bulbs, or more as mini veg.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'To fill the container.', 'url' => '' ),
						array( 'name' => 'Seed-starting cell tray', 'badge' => '', 'note' => 'One seed per cell keeps the root ball whole.', 'url' => '' ),
						array( 'name' => 'Cloche or row cover', 'badge' => '', 'note' => 'For cold nights after planting out.', 'url' => '' ),
						array( 'name' => 'Rain barrel or watering can', 'badge' => '', 'note' => 'The RHS suggests rainwater where possible.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why did my fennel bolt without making a bulb?', 'answer' => 'Florence fennel flowers easily when its growth is checked. The usual causes are cold weather early on, damage to the roots when it was moved, or potting mix that dried out. Sow later, sow into cells or straight into the pot, and keep the potting mix moist.' ),
						array( 'question' => 'Is Florence fennel the same as herb fennel?', 'answer' => 'No. They are close relatives, but herb fennel is grown for its leaves and seeds and does not make a bulb. Check the seed packet says Florence or bulb fennel.' ),
						array( 'question' => 'Will fennel grow back after cutting the bulb?', 'answer' => 'Partly. If you cut just below the bulb and leave the base and roots, it sends up small, feathery shoots you can use in salads, but it will not form a second bulb.' ),
						array( 'question' => 'How do I make fennel bulbs whiter and sweeter?', 'answer' => 'When the base starts to swell, draw potting mix up around it. Covering the bulb from the light blanches it, which also steadies the plant and shields it from early frosts.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow Florence fennel', 'url' => 'https://www.rhs.org.uk/vegetables/florence-fennel/grow-your-own' ),
						array( 'title' => 'RHS — Florence fennel Dragon (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/378128/dragon-agm/details' ),
						array( 'title' => 'RHS — Florence fennel Rondo', 'url' => 'https://www.rhs.org.uk/plants/246768/rondo-agm/details' ),
						array( 'title' => 'Utah State University Extension — How to grow fennel in your garden', 'url' => 'https://extension.usu.edu/yardandgarden/research/fennel-in-the-garden' ),
						$rhs_veg_pots,
						$book,
					),
				),
				'content'      =>
					$h2( 'A tricky crop worth a try' ) .
					$p( 'Florence fennel, or bulb fennel, is grown for the white, swollen base of its leaf stalks, which tastes sweet and gently of aniseed. It is an expensive vegetable to buy and takes little room, so the RHS counts it suitable for containers. It is not the easiest, though: it does best in warm, damp summers and needs steady growth from start to finish.' ) .
					$p( 'Herb fennel is a different, taller plant grown for its leaves and seeds, and it does not make a bulb.' ) .

					$h2( 'Container, potting mix and spot' ) .
					$p( 'A container about 16 in (40 cm) across holds up to three full-size plants spaced 1 ft (30 cm) apart, or more planted 4–6 in (10–15 cm) apart and picked as mini bulbs. Fill it with peat-free all-purpose potting mix and stand it in a warm, sunny, sheltered spot. Fennel hates soggy roots as much as dry ones, so make sure the container drains well.' ) .

					$h2( 'Sow at the right time' ) .
					$p( 'Early sowings bolt easily, so patience pays. The RHS suggests sowing outdoors in early to midsummer, thinly in shallow rows about ½ in (1.5 cm) deep, or straight into the container, then thinning gradually to the final spacing; the thinnings go into salads. Backyard Harvest gives the same warning about cold soil.' ) .
					$p( 'For an earlier crop, Utah State University Extension suggests starting seeds indoors 4–6 weeks before your last spring frost. Sow one seed per cell so the whole root ball can be moved intact; <a href="/plant-care/how-to-start-seeds-indoors/">how to start seeds indoors</a> explains cell trays. Plant out once frost has passed, after careful hardening off (<a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>), at the same depth as before. Keep a cloche or row cover handy if cold nights are forecast. Utah State adds that fennel is sensitive to transplant shock, so sowing where it will grow often gives better results, and that bulbs take about 60–90 days to mature, depending on the variety.' ) .

					$h2( 'Keep it growing steadily' ) .
					$list(
						array(
							'<strong>Water</strong>: the potting mix must never dry out. Containers are the most at risk, so check them often in summer, use rainwater where you can and water early in the day; see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>.',
							'<strong>Mulch</strong>: a layer of compost on top, added once plants are growing well, holds moisture in.',
							'<strong>Weed by hand</strong>: weeds compete for water and shelter slugs, which eat young plants (see <a href="/problems/slugs-and-snails/">slugs and snails</a>).',
							'<strong>Blanch</strong>: when the base begins to swell, pull potting mix up around it, which whitens and sweetens the bulb.',
						)
					) .

					$h2( 'Why fennel bolts' ) .
					$p( 'If a plant suddenly stretches upwards and the base lengthens instead of rounding out, it is starting to flower, and the bulb will turn woody. Cold in spring, broken roots and dry potting mix are the three triggers. Even bolt-resistant varieties can flower in cold or drought. <a href="/problems/plants-bolting/">Plants bolting</a> explains what can be saved.' ) .

					$h2( 'When and how to harvest' ) .
					$p( 'Bulbs are usually ready in late summer and fall at 4–6 in (10–15 cm) across, but you can cut them at any size from 2 in (5 cm). Use a sharp knife just below the bulb and leave the base and roots in the potting mix: they produce small leafy shoots for salads. The chopped young feathery leaves are edible too.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing outdoors in spring, before the weather has warmed up.',
							'Sowing in an open seed tray and transplanting the seedlings, which damages the roots.',
							'Leaving the container to dry out on a hot day.',
							'Buying herb fennel seed by mistake: check the packet says Florence or bulb fennel.',
							'Waiting too long, until the bulb lengthens and turns woody.',
						)
					),
				'image_prompt' => 'A wide, pale gray container about 16 in (40 cm) across on a warm, sunny balcony in late summer, holding three Florence fennel plants. Each has a fat, white, slightly flattened bulb of overlapping leaf bases sitting at the potting mix surface, pale green stalks rising from it and a cloud of very fine, feathery, bright green foliage about 2 ft (60 cm) tall. Soft evening light, railings and a blurred city view behind.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of Florence fennel in a pale gray pot on a sunny balcony, white swollen bulbs at the base and tall, airy, feathery green leaves. The pot sits in the lower half; the top third is empty, softly blurred sky, kept clear for a title.' . $pin_end,
			),

			'mushrooms-from-a-kit'        => array(
				'title'        => 'How to Grow Mushrooms From a Kit',
				'type'         => 'vegetables',
				'sun'          => array(),
				'space'        => array(),
				'months'       => array(
					'sow'     => array(),
					'plant'   => array(),
					'harvest' => array(),
				),
				'excerpt'      => 'A fresh mushroom kit grows indoors at any time of year: keep it moist as its instructions say, out of direct sun, and pick the mushrooms before the caps soften. Gray oyster kits are an easy start, while white and brown cap kits need a moist covering layer before they crop.',
				'facts'        => array(
					'short_name'     => 'Mushrooms',
					'botanical_name' => 'Agaricus bisporus (white and brown cap); Pleurotus ostreatus (gray oyster)',
					'difficulty'     => 'Easy',
					'sun'            => '',
					'pot_size'       => 'The box or bag the kit comes in',
					'hardiness'      => '',
					'watering'       => 'Watering and misting as the kit instructions say',
					'harvest'        => 'In flushes; timing depends on the kit',
					'season'         => 'Any time of year indoors',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Buy a freshly made kit and follow its own instructions for timing, watering and temperature.' ),
						array( 'point' => 'Mushrooms do not need darkness: a spot away from direct sunlight is what matters.' ),
						array( 'point' => 'White and brown cap kits only fruit after the colonized compost is covered with a moist casing layer.' ),
						array( 'point' => 'Mushrooms crop in waves, called flushes, and the first two give most of the harvest.' ),
						array( 'point' => 'Put a spent kit in the yard or compost only if the mushroom is native where you live; the RHS gives this advice for Britain.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Gray oyster', 'note' => 'The RHS feature on home kits names it as a great beginner choice, and it is native to Britain.' ),
						array( 'name' => 'White cap (button)', 'note' => 'The familiar supermarket mushroom. Backyard Harvest describes it as one of the quickest and easiest to grow from a kit.' ),
						array( 'name' => 'Brown cap (chestnut)', 'note' => 'A brown form of the same mushroom, grown in the same way as white caps, according to Backyard Harvest.' ),
					),
					'products'   => array(
						array( 'name' => 'Freshly made mushroom growing kit', 'badge' => '', 'note' => 'The RHS, writing for UK buyers, suggests an independent grower that offers support.', 'url' => '' ),
						array( 'name' => 'Hand mister or plant spray', 'badge' => '', 'note' => 'For kits that need misting.', 'url' => '' ),
						array( 'name' => 'Sharp knife', 'badge' => '', 'note' => 'For cutting clusters cleanly.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Do mushrooms need to grow in the dark?', 'answer' => 'No. Penn State Extension notes that darkness is not a requirement, and Backyard Harvest says a kit just needs to be out of direct sunlight. The RHS adds that many gourmet kits, such as oysters, need some light, so a bright spot without direct sun suits them.' ),
						array( 'question' => 'How long does a mushroom kit take to crop?', 'answer' => 'It varies with the type of mushroom and the kit, so follow the timing printed on yours. Oyster kits can be quick: the RHS says some mushrooms double in size every 12 to 24 hours once they start.' ),
						array( 'question' => 'Will my kit produce more than one crop?', 'answer' => 'Often, yes. The RHS says a second or third crop is possible, though weaker. In commercial growing, Penn State notes that the first two flushes give most of the yield.' ),
						array( 'question' => 'What should I do with a finished kit?', 'answer' => 'Only put it in the garden or the compost if it contains a native species, such as gray oyster in Britain. The RHS warns that a non-native fungus could spread through the soil and become invasive.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow your own mushrooms at home', 'url' => 'https://www.rhs.org.uk/advice/hub-content/features/grow-mushrooms' ),
						array( 'title' => 'RHS — Grow your own mushrooms outdoors', 'url' => 'https://www.rhs.org.uk/biodiversity/grow-your-own-mushrooms-outdoors' ),
						array( 'title' => 'Penn State Extension — Basic procedures for Agaricus mushroom growing', 'url' => 'https://extension.psu.edu/basic-procedures-for-agaricus-mushroom-growing' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'A crop for a shelf, not a pot' ) .
					$p( 'Mushrooms are not plants and need no sun, bags of potting mix or balcony space. A kit sits indoors on a shelf or worktop and can be started in any month; in warm weather it may need misting more often. It is a good crop for winter, when there is little to do outside.' ) .
					$p( 'Kits come in two broad kinds. Gourmet kits, most often oyster mushrooms, are a block or bag of colonized material that you open, water or mist, and harvest from. White and brown cap kits, the familiar button and chestnut mushrooms, come as a tray of compost and spawn that needs a few extra steps.' ) .

					$h2( 'Choosing a kit' ) .
					$p( 'The RHS advice is to buy a freshly made, good-quality kit, ideally from an independent grower who will help if something goes wrong (its advice is written for UK buyers). Gray oyster is its suggested beginner mushroom; other easy native types include tarragon oyster, velvet shank and poplar fieldcap. Backyard Harvest recommends white and brown caps as the quickest and easiest of the traditional kinds.' ) .

					$h2( 'Where to put it' ) .
					$p( 'Darkness is not needed. Penn State Extension, writing about button mushrooms, notes that they are usually grown without light but do not require it, and Backyard Harvest places a kit simply out of direct sun. Many oyster-type kits actually need light, so the RHS suggests a bright spot away from direct sunlight, where you can also watch them grow.' ) .

					$h2( 'Button and chestnut kits step by step' ) .
					$p( 'These follow the method commercial growers use, scaled down. The order matters more than the dates, which vary between kits:' ) .
					$list(
						array(
							'Moisten the compost in the tray and mix the spawn lightly into the surface, as the kit directs.',
							'Keep it covered and damp while fine white threads, the mycelium, spread through the compost.',
							'Once the surface is covered in white threads, spread the casing layer supplied with the kit over it and keep it moist. Penn State explains that this covering is what switches the fungus from spreading to producing mushrooms.',
							'Keep the casing damp but not soggy until small pinheads appear, then pick as they grow.',
						)
					) .
					$p( 'Backyard Harvest gives a temperature of about 59 °F (15 °C) for a white cap kit. Penn State says commercial growers keep the air at 60–66 °F (15–17 °C) while mushrooms are forming. For waiting times, rely on the leaflet with your kit.' ) .

					$h2( 'Picking and later flushes' ) .
					$p( 'Mushrooms swell fast once they start. Penn State says button mushrooms are picked before the cap turns soft, and that crops come in waves called flushes or breaks, with the first two giving most of the yield. The RHS says a kit may give a second or third crop, smaller each time; keep watering or misting between them as the instructions say.' ) .

					$h2( 'When the kit is finished' ) .
					$p( 'A spent kit can go on the compost heap or into the garden only if the mushroom is a native species, such as gray oyster in Britain. The RHS warns that a non-native fungus could spread through the soil and become invasive. If you want to go further, the RHS also explains growing native mushrooms outdoors in grow bags or on logs.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a kit that has sat on a shelf for months: the RHS stresses a freshly made one.',
							'Standing the kit in direct sun.',
							'Letting the surface or casing dry out between waterings.',
							'Leaving mushrooms until the caps go soft and open.',
							'Tipping a non-native spent kit onto the garden or yard.',
						)
					),
				'image_prompt' => 'A cardboard mushroom growing box open on a wooden kitchen shelf in soft indirect daylight, its moist dark brown casing layer dotted with clusters of small, smooth, white button mushrooms with rounded closed caps, some tiny pinheads between them. A clear gray oyster kit bag beside it shows fan-shaped, soft gray oyster mushrooms growing in a cluster from a slit in the side. Kitchen tiles blurred behind, no direct sun.' . $photo_end,
				'pin_prompt'   => 'Vertical close photograph of white button mushrooms pushing up through a moist dark casing layer in a kit box on a kitchen shelf, soft indirect light. The box fills the lower half; the top third is a calm, plain, softly blurred pale wall, empty for a title.' . $pin_end,
			),
		),
	),
);
