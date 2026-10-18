<?php
/**
 * Starter guides, batch 10: fruiting vegetables for a warm, sunny balcony
 * or patio (sweet peppers, aubergines and cucumbers in pots).
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS confirms it; see design/sources/BACKYARD-HARVEST.md.
 * Hardiness ratings come from the RHS plant profiles listed. Months are for
 * a temperate climate such as the UK.
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
	'name'   => __( 'Fruiting vegetables', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'bell-peppers-in-pots' => array(
				'title'        => 'How to Grow Sweet Peppers in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Sweet peppers grow well in a pot at least 30 cm (1 ft) wide, as long as you give them your warmest, sunniest spot. Sow indoors in spring, move the plants outside only when nights stay above 12 °C (54 °F), and water and feed steadily for a crop from August.',
				'facts'        => array(
					'short_name'     => 'Sweet pepper',
					'botanical_name' => 'Capsicum annuum (Grossum Group)',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, warm and sheltered',
					'pot_size'       => 'At least 30 cm (1 ft) wide, one plant per pot',
					'hardiness'      => 'H1c',
					'watering'       => 'Keep the compost evenly moist; daily in hot weather',
					'harvest'        => 'Outdoors from August until early autumn',
					'season'         => 'Sow late winter to spring; tender annual',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow indoors at 18–21 °C (65–70 °F): late March or early April for plants that will live outside.' ),
						array( 'point' => 'Plant one pepper in a pot at least 30 cm (1 ft) wide, filled with peat-free multi-purpose compost.' ),
						array( 'point' => 'Move pots outside in late May or June, once nights stay above 12 °C (54 °F), after two weeks of hardening off.' ),
						array( 'point' => 'Feed weekly with a high-potassium liquid fertiliser from the first flowers, and never let the pot dry out.' ),
						array( 'point' => 'Pick regularly: fruits left to ripen fully slow down the next ones.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Redskin (AGM)', 'note' => 'The RHS describes it as compact and ideal for containers. Blocky fruits about 8 cm long that turn from green to bright red.' ),
						array( 'name' => 'Mohawk (AGM)', 'note' => 'A dwarf pepper to about 50 cm tall that the RHS calls ideal for patio pots. Bell-shaped fruits up to 9 cm long ripen from dark green to bright yellow.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 30 cm (1 ft) wide, with drainage holes', 'badge' => '', 'note' => 'One plant per pot. A bigger pot dries out less quickly.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each plant.', 'url' => '' ),
						array( 'name' => 'Bamboo canes and soft garden twine', 'badge' => '', 'note' => 'Pepper stems are brittle and can snap under a heavy crop.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertiliser (tomato feed)', 'badge' => '', 'note' => 'Weekly from the first flowers.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece', 'badge' => '', 'note' => 'Covers plants at the end of the season to help the last fruits ripen.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I grow sweet peppers on a balcony?', 'answer' => 'Yes, if it is warm, sunny and sheltered. Peppers grow best above 15 °C (59 °F), so choose a compact variety, plant it in a pot at least 30 cm (1 ft) wide and put it in your sunniest spot, ideally against a south-facing wall. Expect a smaller crop than in a greenhouse.' ),
						array( 'question' => 'Why are the flower buds falling off my pepper plant?', 'answer' => 'The most common reason is dry compost. Peppers need a steady supply of water, and pots dry out fast in summer. Check the compost every day in hot weather and water before it dries out.' ),
						array( 'question' => 'Why are my peppers staying green?', 'answer' => 'Peppers need warmth and a long season to change colour, and outdoors they may not ripen before temperatures fall in early autumn. Green peppers are fine to eat. Late in the season, cover the plant with fleece or bring the pot indoors to help the last fruits ripen.' ),
						array( 'question' => 'Should I pinch out the tips of my pepper plants?', 'answer' => 'It is not needed. Pinching out the tip at about 30 cm (1 ft) gives more peppers that are smaller, but it can delay fruiting, which matters outdoors where the season is short.' ),
						array( 'question' => 'What are the dark patches on the ends of my peppers?', 'answer' => 'This is blossom end rot. It is caused by a lack of calcium reaching the fruit, usually because the compost has been allowed to dry out. Affected fruits cannot be saved, but steady watering protects the next ones.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow sweet peppers', 'url' => 'https://www.rhs.org.uk/vegetables/peppers/grow-your-own' ),
						array( 'title' => 'RHS — Sweet pepper \'Redskin\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/241707/redskin-agm/details' ),
						array( 'title' => 'RHS — Sweet pepper \'Mohawk\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/241706/mohawk-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Blossom end rot', 'url' => 'https://www.rhs.org.uk/problems/blossom-end-rot' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Can sweet peppers grow outside in a pot?' ) .
					$p( 'Sweet peppers are tender plants that need lots of sun and steady warmth. In the UK they crop best under cover, but in a warm, sheltered spot they can succeed outside, especially in a mild area or a long, hot summer. A pot helps: you can put it exactly where the sun and shelter are best.' ) .
					$p( 'The plants are small, usually about 60 cm (2 ft) tall and 30 cm (1 ft) wide. Compact and dwarf varieties suit a sunny balcony or patio, and even a bright kitchen windowsill. Varieties with smaller fruits ripen sooner, so they are the safer choice outdoors.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot at least 30 cm (1 ft) wide, with drainage holes, and plant one pepper in the centre. Fill it with peat-free multi-purpose compost. Two or three plants can share a standard growing bag instead.' ) .
					$p( 'Give the pot your warmest, sunniest place, ideally beside a south-facing wall, out of the wind. Peppers cope with nights down to 12 °C (54 °F) but grow much better above 15 °C (59 °F). Very high heat is not good either: over 30 °C (86 °F) fruiting can drop.' ) .

					$h2( 'Sow, or buy young plants' ) .
					$list(
						array(
							'For plants that will live outside, sow indoors in late March or early April.',
							'Seeds need 18–21 °C (65–70 °F) to germinate: use a heated propagator or a warm windowsill.',
							'Once seedlings appear, keep them at 16–18 °C (60–64 °F) in bright light, with the compost evenly moist.',
							'When each seedling has two true leaves, move it into its own 7.5–9 cm (3–3.5 in) pot and keep it warm.',
						)
					) .
					$p( 'If you do not have a warm, bright place for seedlings, buy young plants in late spring. Grafted plants are more vigorous and should crop more reliably in cooler conditions.' ) .

					$h2( 'Move the pot outside' ) .
					$p( 'Keep young plants indoors until at least late May. Before moving them out for good, harden them off for a couple of weeks: put them outside by day and bring them in at night, so they get used to wind and cooler air. Plant them into their final pot in late May or June, at the same depth as before, once nights are reliably above 12 °C (54 °F).' ) .

					$h2( 'Water, feed and support' ) .
					$p( 'Peppers need a steady supply of water. Keep the compost evenly moist: if the pot dries out, the flower buds may drop. In hot, dry weather, be ready to water every day. Irregular watering can also cause blossom end rot, a dark, sunken patch at the end of the fruit.' ) .
					$p( 'Once the first flowers open, feed every week with a high-potassium liquid fertiliser such as tomato feed. Push a sturdy cane in beside the plant and tie the main stem to it as it grows. The stems are brittle: if the plant carries a heavy crop, add more canes and tie the laden side-shoots to them with soft twine.' ) .

					$h2( 'Harvest' ) .
					$p( 'Outdoors, peppers usually start in August and finish when temperatures fall in early autumn. Pick them when they are swollen and glossy. Most turn from green to red, and some to yellow, orange or purple; they get sweeter as they colour.' ) .
					$p( 'You can pick at any colour. Leaving fruits on the plant until fully ripe slows down the ones that follow, so picking some while still green keeps the plant producing. Towards the end of the season, cover the plant with fleece or bring the pot indoors to help the last fruits ripen.' ) .

					$h2( 'Pests to watch for' ) .
					$p( 'Aphids like pepper plants. Check the shoot tips and the undersides of the leaves often, and rub off small colonies before they build up. Other sap-sucking pests, such as red spider mite and whitefly, are more likely in dry conditions and under cover.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Moving plants outside too early: wait until nights stay above 12 °C (54 °F).',
							'Choosing a large-fruited variety for outdoors: smaller fruits ripen in a shorter season.',
							'Letting the pot dry out: flower buds drop and fruits can get blossom end rot.',
							'Skipping the cane: brittle stems can snap under the weight of the fruit.',
							'Leaving every fruit to ripen fully: pick regularly so more follow.',
						)
					),
				'image_prompt' => 'A compact sweet pepper plant about 50 cm tall growing in a 30 cm terracotta pot on a sunny balcony, against a warm south-facing brick wall, in late summer. Glossy, dark green, oval pointed leaves on a bushy, branching plant held up by a single bamboo cane tied with soft twine. Several blocky bell peppers hang from the stems: most still glossy green, two turning bright red. A few small white star-shaped flowers are visible. Bright afternoon sunlight, a metal balcony railing softly blurred in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact sweet pepper plant in a 30 cm terracotta pot on a sunny balcony, set against a warm brick wall. Glossy dark green leaves, a bamboo cane with soft twine, and blocky bell peppers in green and bright red hanging low on the plant. The pot and plant fill the lower two thirds of the frame; the top third is a calm, softly blurred wall and pale sky with empty space. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'eggplant-in-pots'    => array(
				'title'        => 'How to Grow Aubergines in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 1, 2, 3 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 8, 9, 10 ),
				),
				'excerpt'      => 'Aubergines can crop in a pot outdoors, but only in a hot, sunny, sheltered spot and with a compact, small-fruited variety. Sow indoors in early March, plant into a 30 cm (1 ft) pot after the last frost, and water and feed steadily for fruits from August.',
				'facts'        => array(
					'short_name'     => 'Aubergine',
					'botanical_name' => 'Solanum melongena',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun, the hottest and most sheltered spot you have',
					'pot_size'       => 'At least 30 cm (1 ft) across, one plant per pot',
					'hardiness'      => 'H1c',
					'watering'       => 'Steady moisture; daily in hot weather',
					'harvest'        => 'From August into autumn',
					'season'         => 'At least five months from sowing to harvest',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose a compact, small-fruited variety: these cope better with the UK climate.' ),
						array( 'point' => 'For plants that will grow outside, sow indoors in early March; seeds need at least 21 °C (70 °F).' ),
						array( 'point' => 'Plant one aubergine in a pot at least 30 cm (1 ft) across, after the last frost, in your warmest, sunniest spot.' ),
						array( 'point' => 'Water often and feed every two weeks with a high-potassium liquid fertiliser once the first flowers appear.' ),
						array( 'point' => 'Pick fruits while the skin is still glossy; dull skin means over-ripe and possibly bitter.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Galine (AGM)', 'note' => 'Compact and bushy, ideal for containers according to the RHS. Purple fruits about the size of very large eggs.' ),
						array( 'name' => 'Kaberi (AGM)', 'note' => 'A compact plant for a pot on a patio, with a heavy crop of small, egg-shaped, dark purple fruits that mature quickly.' ),
						array( 'name' => 'Bonica (AGM)', 'note' => 'Early cropping, with large, glossy, deep purple fruits. Taller, at about 1.2 m, so it needs firm support.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 30 cm (1 ft) across, with drainage holes', 'badge' => '', 'note' => 'One plant per pot.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each plant.', 'url' => '' ),
						array( 'name' => 'Sturdy bamboo canes and soft twine', 'badge' => '', 'note' => 'Aubergines get top-heavy once fruits form.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertiliser (tomato feed)', 'badge' => '', 'note' => 'Every two weeks from the first flowers.', 'url' => '' ),
						array( 'name' => 'Plastic-free fleece or a cloche', 'badge' => '', 'note' => 'For the first couple of weeks outside, and for late fruits in autumn.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can aubergines grow outside in the UK?', 'answer' => 'They can fruit outdoors in very mild areas or in long, hot summers, but they do best in a greenhouse. On a balcony or patio, choose a compact, small-fruited variety and give it the hottest, sunniest, most sheltered spot you have, such as beside a sunny wall.' ),
						array( 'question' => 'Why is my aubergine flowering but not fruiting?', 'answer' => 'Most often the weather or the spot is too cool: aubergines need lots of sun and heat and a long season. Dry compost is another cause, so keep the moisture steady. Under cover, open doors and vents on warm days so insects can reach the flowers, or pollinate them with a small paintbrush.' ),
						array( 'question' => 'How do I know when an aubergine is ready to pick?', 'answer' => 'Pick when the fruit is full sized, well coloured and has a glossy skin. Once the skin turns dull, the fruit is probably over-ripe and may taste bitter. Cut through the stalk a few centimetres above the fruit.' ),
						array( 'question' => 'Are the prickles on my aubergine normal?', 'answer' => 'Yes. Some plants have small spines on the stems and around the fruit stalk, so take care when tying them in and picking.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow aubergines', 'url' => 'https://www.rhs.org.uk/vegetables/aubergines/grow-your-own' ),
						array( 'title' => 'RHS — Aubergine \'Galine\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/112358/galine-agm/details' ),
						array( 'title' => 'RHS — Aubergine \'Kaberi\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/370562/kaberi-agm/details' ),
						array( 'title' => 'RHS — Aubergine \'Bonica\'', 'url' => 'https://www.rhs.org.uk/plants/119121/bonica-agm/details' ),
						array( 'title' => 'RHS — Blossom end rot', 'url' => 'https://www.rhs.org.uk/problems/blossom-end-rot' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Can you grow aubergines on a balcony?' ) .
					$p( 'Aubergines are tender plants that need a lot of warmth. They crop best in a greenhouse, but they can fruit outside in very mild areas or in a long, hot summer. They also need a long season: at least five months from sowing to harvest.' ) .
					$p( 'Your best chance outdoors is a compact variety with small fruits, as these cope better with the UK climate. Grow it in a pot, where you can give it the hottest, sunniest and most sheltered place on the balcony or patio.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot at least 30 cm (1 ft) across, with drainage holes, filled with peat-free multi-purpose compost. Plant one aubergine in the centre, or two in a standard growing bag.' ) .
					$p( 'Position matters more than anything else. Pick a really warm, sunny, sheltered spot, such as beside a sunny wall or on a south-facing patio, out of the wind.' ) .

					$h2( 'Sow indoors' ) .
					$list(
						array(
							'For plants that will grow outside, sow indoors in early March. Earlier sowings, from January, suit a heated greenhouse.',
							'Seeds need at least 21 °C (70 °F) to germinate: use a heated propagator or a warm place indoors, and check daily.',
							'As soon as seedlings appear, move them to a warm, bright windowsill and keep them at 16–18 °C (60–64 °F).',
							'When they have their first true leaves, move each one into its own 7.5 cm (3 in) pot.',
						)
					) .
					$p( 'If you cannot give seedlings that much warmth, buy young plants in spring or early summer. Grafted plants cost more but are more vigorous, and should cope better with cooler conditions outdoors.' ) .

					$h2( 'Move the pot outside' ) .
					$p( 'Aubergines must not go outside until after the last frost, usually in late May or early June. Harden the plants off first, putting them out by day and bringing them in at night, so their growth is not checked. Plant at the same depth they were growing before, and push in a cane for support. For the first couple of weeks outside, cover the plant with a cloche or plastic-free fleece to help it settle.' ) .

					$h2( 'Water, feed and support' ) .
					$p( 'Aubergines need a steady supply of moisture to grow and crop. Plants in pots are especially quick to dry out and may need water every day in hot weather; a drip watering system helps keep it even. Uneven watering can also lead to blossom end rot: a sunken, dark patch at the flower end of the fruit.' ) .
					$p( 'Once the first flowers appear, feed every two weeks with an organic high-potassium liquid fertiliser. When the plant is about 30 cm (1 ft) tall, pinch out the tip of the main stem to make it branch and carry more fruit. Aubergines can get top-heavy: tie the main stem to a sturdy cane, and add more canes for the side-shoots once fruits form.' ) .

					$h2( 'Help the fruits ripen' ) .
					$p( 'On a large-fruited variety, remove any further flowers once five or six fruits have started to form. Small-fruited varieties can carry many more. From late summer, pinch off new fruits as they start, because they are unlikely to ripen in time.' ) .
					$p( 'If fruits are still not ripe by late September, cover the plant with a plastic-free crop cover, or move the pot indoors before the nights turn cold.' ) .

					$h2( 'Harvest' ) .
					$p( 'You can usually start picking in August. Cut each fruit when it is full sized, well coloured and glossy, through the stalk a few centimetres above the fruit. A dull skin means the fruit is probably over-ripe and may be bitter. Picking regularly encourages more fruits to develop. Some plants have small spines, so take care.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Putting plants outside before the last frost: aubergines are tender and need warmth.',
							'Choosing a large-fruited variety for outdoors: compact, small-fruited types are more reliable.',
							'Letting the pot dry out in summer: the plant needs steady moisture to fruit.',
							'Leaving late fruits to form after late summer: they will not ripen.',
							'Picking too late: once the skin goes dull, the fruit may be bitter.',
						)
					),
				'image_prompt' => 'A compact aubergine plant about 60 cm tall in a 30 cm dark grey glazed pot on a sunny patio beside a warm south-facing wall, in late summer. Large, broad, slightly downy grey-green leaves with wavy edges, a few pale purple star-shaped flowers with yellow centres, and three small, egg-shaped, glossy dark purple fruits hanging on green spiny calyxes. The main stem is tied to a bamboo cane with soft twine. Bright warm sunlight, terracotta paving softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact aubergine plant in a 30 cm dark grey glazed pot on a sunny patio against a warm wall. Broad grey-green downy leaves, pale purple flowers and small glossy, egg-shaped dark purple fruits, the stem tied to a bamboo cane. The plant fills the lower two thirds of the frame; the top third is a calm, softly blurred sunlit wall with empty space. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'cucumbers-in-pots'     => array(
				'title'        => 'How to Grow Cucumbers in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Outdoor (ridge) cucumbers are happy in a container at least 30 cm (1 ft) wide and deep, trained up canes or netting in a warm, sunny, sheltered spot. Sow indoors in late April, plant out in June once nights stay above 12 °C (53 °F), and keep the compost moist for crunchy fruits from mid-summer.',
				'facts'        => array(
					'short_name'     => 'Cucumber',
					'botanical_name' => 'Cucumis sativus',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, warm and sheltered',
					'pot_size'       => 'At least 30 cm (1 ft) wide and deep, one plant per pot',
					'hardiness'      => 'H1c',
					'watering'       => 'Keep the compost evenly moist; daily in hot spells',
					'harvest'        => 'Summer to early autumn outdoors',
					'season'         => 'Sow indoors in late April for outdoor plants',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'On an open balcony or patio, grow an outdoor (ridge) variety: it needs insects to pollinate its flowers.' ),
						array( 'point' => 'Sow indoors in late April, one seed per 10 cm (4 in) pot, 1–2 cm (½–¾ in) deep, at about 21 °C (70 °F).' ),
						array( 'point' => 'Plant out from early June, once nights stay above 12 °C (53 °F), one plant per pot at least 30 cm (1 ft) wide and deep.' ),
						array( 'point' => 'Put the supports in at planting time: a cane wigwam, netting or a trellis against a wall.' ),
						array( 'point' => 'Water at the base, feed every 10–14 days, and pick often to keep the plant cropping.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Marketmore (AGM)', 'note' => 'An outdoor (ridge) variety recommended by the RHS. Heavy cropping, with dark green fruits up to about 20 cm long.' ),
						array( 'name' => 'Lili (AGM)', 'note' => 'Listed by the RHS for a greenhouse or outdoors. Reliable, mainly female flowers, good resistance to downy mildew; best outdoors in warmer areas.' ),
						array( 'name' => 'Mini Munch (AGM)', 'note' => 'An all-female mini cucumber with snack-sized fruits about 7 cm long. The RHS lists it as a greenhouse variety, so grow it under cover such as a large coldframe.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 30 cm (1 ft) wide and deep, with drainage holes', 'badge' => '', 'note' => 'One cucumber plant per pot.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For the pot; use peat-free seed compost for sowing.', 'url' => '' ),
						array( 'name' => 'Tall bamboo canes, plant netting or a trellis', 'badge' => '', 'note' => 'Gives the tendrils something to cling to and keeps fruits clean.', 'url' => '' ),
						array( 'name' => 'General liquid fertiliser and tomato feed', 'badge' => '', 'note' => 'General feed first, then high-potash feed once flowering starts.', 'url' => '' ),
						array( 'name' => 'Sharp knife or secateurs', 'badge' => '', 'note' => 'Cut the fruits cleanly instead of pulling.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I grow cucumbers on a balcony?', 'answer' => 'Yes. Choose an outdoor (ridge) variety, plant it in a container at least 30 cm (1 ft) wide and deep, and train it up canes, netting or a trellis in a warm, sunny spot sheltered from wind. Growing upwards takes very little floor space.' ),
						array( 'question' => 'Should I remove the male flowers from my cucumber?', 'answer' => 'Not on an outdoor variety. Its female flowers, the ones with a tiny fruit behind them, must be pollinated to make cucumbers, so leave the male flowers on. Only all-female greenhouse varieties need male flowers removed, because pollinated fruits may taste bitter.' ),
						array( 'question' => 'What is the white powder on my cucumber leaves?', 'answer' => 'Most likely powdery mildew, a fungus that spreads over the leaves and weakens the plant. Water at the base rather than over the leaves, keep the compost from drying out, and choose a mildew-resistant variety next time.' ),
						array( 'question' => 'Why are my cucumber leaves yellow, mottled and twisted?', 'answer' => 'This can be cucumber mosaic virus, which aphids spread between plants. There is no cure: remove and destroy the plant promptly, wash your hands and tools, and keep weeds down near your pots.' ),
						array( 'question' => 'How big should cucumbers be when I pick them?', 'answer' => 'It depends on the variety: mini cucumbers at about 8 cm (3 in), small-fruited ones at about 15 cm (6 in) and full-sized ones at 20–25 cm (8–10 in). They should be evenly green and firm. Yellowish, swollen or soft fruits are over-ripe.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — Cucumber \'Marketmore\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/119342/marketmore-agm/details' ),
						array( 'title' => 'RHS — Cucumber \'Lili\'', 'url' => 'https://www.rhs.org.uk/plants/378137/lili-agm/details' ),
						array( 'title' => 'RHS — Cucumber \'Mini Munch\'', 'url' => 'https://www.rhs.org.uk/plants/293192/mini-munch-agm/details' ),
						array( 'title' => 'RHS — Cucumber mosaic virus', 'url' => 'https://www.rhs.org.uk/disease/cucumber-mosaic-virus' ),
						array( 'title' => 'RHS — Powdery mildews', 'url' => 'https://www.rhs.org.uk/disease/powdery-mildews' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Which cucumber for a balcony or patio?' ) .
					$p( 'Cucumbers are tender climbing or scrambling plants. Trained up a support they take very little floor space, so they suit a small patio or a balcony with a sunny wall. They need warmth and plenty of moisture to crop well.' ) .
					$p( 'There are two main kinds. Outdoor varieties, often called ridge cucumbers, grow in a sunny, sheltered spot outside; they start later and finish earlier than greenhouse types, but still crop well in warm weather. Indoor varieties are bred for a greenhouse, polytunnel or large coldframe. Mini and small-fruited varieties give lots of fruits that are ready sooner than long ones; many of them, such as \'Mini Munch\', are greenhouse varieties, so check the packet before you grow one outside.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Give each cucumber its own pot, at least 30 cm (1 ft) wide and deep, with drainage holes and peat-free multi-purpose compost; a standard growing bag takes two.' ) .
					$p( 'Choose the warmest, sunniest spot you have, sheltered from wind. A south- or west-facing wall with a trellis is ideal on a balcony.' ) .

					$h2( 'Sow indoors' ) .
					$list(
						array(
							'For plants that will grow outdoors, sow in late April.',
							'Fill 10 cm (4 in) pots with peat-free seed compost and water well.',
							'Sow one seed per pot, 1–2 cm (½–¾ in) deep, ideally on its side.',
							'Keep the pots at about 21 °C (70 °F) in a heated propagator, or cover with a clear plastic bag on a warm, sunny windowsill.',
							'Seedlings appear after a week or two. Remove the cover and keep them warm, in bright light and watered.',
						)
					) .
					$p( 'Plants are ready to move to their final pot after about a month, once they are growing strongly. If you only want one or two plants, buying young plants in late spring is a simple alternative.' ) .

					$h2( 'Plant out and put up supports' ) .
					$p( 'Harden the plants off for a couple of weeks, then plant them out from early June, once local temperatures are reliably above 12 °C (53 °F). Water the plant well beforehand and handle the root ball gently so growth is not checked. Firm it in and water generously.' ) .
					$p( 'Put the supports in at planting time, so the tendrils have something to grip. In a pot, a wigwam of tall bamboo canes works well, or stout netting held up on stakes, or a trellis or wires fixed to a wall. Whatever you use, make it strong enough for a plant loaded with fruit, especially on a windy balcony. Tie the stems in at first, and again later if they wander or come loose.' ) .

					$h2( 'Pinch out to get more fruit' ) .
					$p( 'Restricting growth helps the plant put its energy into fruit. On an outdoor cucumber, pinch out the growing tip once the plant has seven leaves, to encourage side-shoots. Pinch out the tips of any side-shoots without flowers once they also have seven leaves.' ) .
					$p( 'Outdoor varieties carry both male and female flowers. The female flowers have a tiny cucumber behind them and must be pollinated by insects, so leave the male flowers in place. Only all-female greenhouse varieties need their occasional male flowers removed.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Keep the compost evenly moist, especially once fruits are forming; in hot spells, pots may need water every day. Water at the base of the plant and try to keep the leaves dry, as wet leaves encourage powdery mildew. Do not let water sit around the neck of the stem, which can rot. Water in the cooler part of the day, ideally the morning, and use rainwater when you can.' ) .
					$p( 'Feed plants in pots every 10–14 days with a general liquid fertiliser. Once they start flowering, switch to a high-potash feed such as tomato feed to encourage fruit.' ) .

					$h2( 'Harvest' ) .
					$p( 'Outdoor cucumbers crop through summer into early autumn, depending on the weather. Pick mini cucumbers at about 8 cm (3 in), small-fruited ones at about 15 cm (6 in) and full-sized ones at 20–25 cm (8–10 in). They should be evenly green and firm. Cut the stalk cleanly with a sharp knife or secateurs rather than pulling. Fruits grow quickly, so check every few days; picking often keeps more coming.' ) .

					$h2( 'Pests and diseases' ) .
					$p( 'Powdery mildew and red spider mite weaken plants, especially in dry air. Steady watering helps, and mildew-resistant varieties are available. Cucumber mosaic virus is more serious: leaves turn yellow, mottled and distorted and the plant is stunted. Aphids spread it, and there is no cure, so destroy affected plants promptly and wash your hands and tools before touching healthy ones. Slugs and snails may also attack young plants; growing upwards keeps the fruits out of their reach.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting out too early: wait until temperatures stay above 12 °C (53 °F).',
							'Growing a greenhouse variety on an open balcony: choose an outdoor (ridge) type.',
							'Removing the male flowers of an outdoor cucumber: the female flowers need them for pollination.',
							'Watering over the leaves or around the stem: water at the base, into the compost.',
							'Leaving fruits too long: they turn yellow and soft, and the plant slows down.',
						)
					),
				'image_prompt' => 'An outdoor ridge cucumber plant growing in a 35 cm deep black plastic pot on a sunny balcony in mid-summer, climbing a wigwam of tall bamboo canes against a warm south-facing wall. Large, rough, heart-shaped green leaves with shallow lobes, thin curling tendrils gripping the canes, bright yellow five-petalled flowers, and two straight dark green cucumbers about 20 cm long hanging clear of the compost, with a tiny fruit behind one female flower. Bright morning sunlight, balcony railing softly blurred in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of an outdoor cucumber plant in a deep pot on a sunny balcony, climbing a tall bamboo cane wigwam against a warm wall. Large heart-shaped green leaves, curling tendrils, yellow flowers and straight dark green cucumbers hanging along the stems. The plant and canes fill the lower two thirds of the frame; the top third is calm, softly blurred sunlit wall and sky with empty space. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
