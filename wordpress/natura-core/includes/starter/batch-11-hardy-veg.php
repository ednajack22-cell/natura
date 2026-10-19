<?php
/**
 * Starter guides, batch 11 (hardy vegetables): kale, bok choy, garlic and
 * carrots grown in containers on a balcony or patio.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS confirms it; see design/sources/BACKYARD-HARVEST.md.
 * Timing (weeks from the reader's frost dates, days to harvest) comes from
 * the US extension pages listed in each guide (checked 19 October 2026).
 * Where an extension gives calendar dates for a stated frost date (the
 * University of Maryland calendar uses a last frost of April 15 and a first
 * frost of October 25), the dates were converted to weeks from those frost
 * dates. The 'months' data is the UK calendar.
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

$umd_calendar = array(
	'title' => 'University of Maryland Extension — When to plant vegetables',
	'url'   => 'https://extension.umd.edu/resource/when-plant-vegetables',
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
				'timing'       => array(
					'sow_outdoors' => array( -5, -4 ),
					'plant_out'    => array( -5, -4 ),
					'fall_sow'     => array( -16, -10 ),
					'harvest_days' => array( 50, 55 ),
				),
				'excerpt'      => 'Kale grows well in a pot if you choose a compact variety such as Dwarf Green Curled and give each plant a container 12 in (30 cm) wide and deep. It is one of the hardiest leafy crops, so a single pot can give you fresh leaves from fall right through winter.',
				'facts'        => array(
					'short_name'     => 'Kale',
					'botanical_name' => 'Brassica oleracea (Acephala Group)',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun; copes with light shade',
					'pot_size'       => '12 in (30 cm) wide and deep for one plant',
					'hardiness'      => 'H7',
					'watering'       => 'Regularly; do not let the potting mix dry out',
					'harvest'        => 'Fall to spring, a few leaves at a time',
					'season'         => 'Plant out 4–5 weeks before your last spring frost; sow again in summer for fall',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose a compact variety and give each plant its own pot of peat-free all-purpose potting mix, 12 in (30 cm) across and as deep.' ),
						array( 'point' => 'Set plants out, or sow ½ in (1 cm) deep, 4–5 weeks before your last spring frost; sow again 10–16 weeks before your first fall frost for a winter crop.' ),
						array( 'point' => 'Plant deeply, with the lowest leaves at the surface of the potting mix, so the plant is well anchored.' ),
						array( 'point' => 'Pick two or three lower leaves per plant at a time, from fall through winter into spring.' ),
						array( 'point' => 'Cover with insect-proof mesh to keep off caterpillars, aphids and pigeons.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Dwarf Green Curled', 'note' => 'The RHS suggests it for containers. A dwarf curly kale for winter cropping, around 2 ft (60 cm) tall, so it suits a windy spot and is unlikely to need staking. Rated H7.' ),
						array( 'name' => 'Starbor', 'note' => 'An RHS Award of Garden Merit variety. Compact, and suitable for smaller spaces. Utah State University Extension lists it at about 55 days, with excellent cold hardiness.' ),
						array( 'name' => 'Yurok', 'note' => 'An RHS Award of Garden Merit variety. A Tuscan-style F1 kale with narrow, puckered leaves on compact plants.' ),
						array( 'name' => 'Red Russian', 'note' => 'The RHS names it as a good salad kale, with colorful leaves for picking young. Utah State University Extension lists it as purple, at about 50 days.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 12 in (30 cm) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Room for one mature plant.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For sowing and for the final pot.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh and hoops or stakes', 'badge' => '', 'note' => 'Keeps caterpillars, flea beetles and pigeons off the leaves.', 'url' => '' ),
						array( 'name' => 'Organic-based nitrogen-rich fertilizer', 'badge' => '', 'note' => 'Kale in containers benefits from a feed.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can kale stay outside in a pot all winter?', 'answer' => 'Yes. Kale is one of the hardiest leafy vegetables, and the compact variety Dwarf Green Curled is rated H7 by the RHS, the highest hardiness rating. Its main value is the fresh leaves it gives in the coldest months.' ),
						array( 'question' => 'How big a pot does kale need?', 'answer' => 'For one mature plant, a pot 12 in (30 cm) wide and deep, with a compact variety. For baby salad leaves, any large container works, with plants about 3 in (7.5 cm) apart.' ),
						array( 'question' => 'Can I grow kale on a windowsill?', 'answer' => 'Not as full-sized plants, but you can grow it as microgreens. Sow seed thickly in a small tray of damp peat-free seed-starting mix on a sunny windowsill, and the seedlings are ready to eat in two or three weeks.' ),
						array( 'question' => 'How do I pick kale without killing the plant?', 'answer' => 'Take two or three of the lower leaves from each plant at a time and leave the top growing. Regular picking encourages more leaves.' ),
						array( 'question' => 'What is eating holes in my kale?', 'answer' => 'Usually cabbage caterpillars, pigeons, flea beetles or slugs and snails. Insect-proof mesh over the pot is the best protection, and you can pick caterpillars off by hand.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — Brassica oleracea (Acephala Group) \'Dwarf Green Curled\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/135049/brassica-oleracea-(acephala-group)-dwarf-green-curled/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'Utah State University Extension — How to grow kale in your garden', 'url' => 'https://extension.usu.edu/yardandgarden/research/kale-in-the-garden' ),
						$umd_calendar,
						$book,
					),
				),
				'content'      =>
					$h2( 'Why kale suits a winter balcony' ) .
					$p( 'Kale is a member of the cabbage family and one of the hardiest leafy vegetables. It grows slowly and steadily through summer, then keeps giving leaves through fall, winter and spring, when little else is growing. Because you pick a few leaves at a time rather than the whole plant, even one pot gives a long harvest.' ) .
					$p( 'Most kale grows large, up to 3 ft (90 cm) tall, so for a pot choose a compact variety. Most kales are biennial: they crop until they flower in their second year, then are finished.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'A pot 12 in (30 cm) wide and deep holds one mature plant of a compact variety such as Dwarf Green Curled. Use peat-free all-purpose potting mix and a pot with drainage holes. Growing in a container is also a way round club root, a soil disease of cabbage-family plants.' ) .
					$p( 'Put the pot in a sunny spot. Kale prefers sun but copes with light shade. Dwarf Green Curled stays around 2 ft (60 cm) tall, which makes it a good choice for a windy balcony.' ) .

					$h2( 'Sow' ) .
					$p( 'Utah State University Extension advises setting kale plants out 4–5 weeks before your last spring frost, and sowing seed where it will grow at the same time. Young plants are not seriously harmed by temperatures down to 25 °F (−4 °C). For a fall and winter crop, the University of Maryland Extension calendar has kale sown again in summer, roughly 10–16 weeks before the first fall frost.' ) .
					$p( 'To start seeds indoors, sow into modules of peat-free seed-starting mix: make a hole ½ in (1 cm) deep in each, sow two seeds, and remove the weaker seedling if both come up. Indoor sowing also keeps seedlings safe from slugs and snails.' ) .
					$p( 'You can also sow straight into the final pot in a warm, sunny spot: sow three seeds where the plant will grow, then thin to the strongest seedling when they appear.' ) .
					$p( 'For baby salad leaves, scatter the seed thinly over a large container, cover with about ½ in (1 cm) of potting mix and water well. Sow small batches over several weeks for a longer supply.' ) .

					$h2( 'Plant out deeply' ) .
					$p( 'When young plants are 4–6 in (10–15 cm) tall, harden off indoor-sown plants and move them to their final pot. Plant them deeper than before, with the lowest leaves at the surface of the potting mix. Kale becomes top-heavy, and deep planting helps anchor it. Firm the potting mix and water well.' ) .

					$h2( 'Water, feed and protect' ) .
					$list(
						array(
							'<strong>Water</strong> regularly: potting mix in a pot dries out much faster than garden soil, especially in summer.',
							'<strong>Feed</strong>: kale in containers benefits from an organic-based, nitrogen-rich fertilizer.',
							'<strong>Tidy</strong>: remove faded lower leaves to keep air moving around the plant and deter fungal diseases.',
							'<strong>Cover</strong> the plant with insect-proof mesh on hoops or stakes, against caterpillars, flea beetles, aphids and pigeons.',
							'<strong>Support</strong> taller varieties with a sturdy stake in fall if your balcony is exposed, so winter gales do not rock the roots loose.',
						)
					) .

					$h2( 'Harvest through winter' ) .
					$p( 'Utah State University Extension gives Starbor about 55 days and Red Russian about 50 days to maturity. Pick two or three of the lower leaves from each plant at a time and leave the top to keep growing. Regular picking encourages more leaves, and a plant set out in summer goes on cropping from early fall through winter into spring. Frost improves the flavor of fall kale.' ) .
					$p( 'For salad, start cutting when plants are 4–6 in (10–15 cm) tall. Pick single leaves, or cut the whole rosette: it should sprout again for a second crop.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Growing a full-size variety in a small pot: choose a compact one such as Dwarf Green Curled.',
							'Planting at the old depth: set young plants deep, with the lowest leaves at the surface of the potting mix.',
							'Leaving the plant uncovered: caterpillars and pigeons can strip the leaves. Use insect-proof mesh.',
							'Stripping the whole plant at once: take two or three lower leaves at a time.',
							'Forgetting to water a pot in summer: kale in containers needs regular watering.',
						)
					),
				'image_prompt' => 'A single compact curly kale plant growing in a 12 in (30 cm) wide charcoal-gray frost-proof pot on a small city balcony in late fall. The plant is mature, about 20 in (50 cm) tall, with a sturdy short stem and many deeply frilled, tightly curled mid-green leaves; the lowest leaves have been picked, leaving neat leaf scars on the stem. A light frost glistens on the leaf edges, the potting mix is dark and moist, a wooden balcony floor and metal railing are softly blurred behind. Low, cool morning sunlight from the side. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact curly kale plant in a charcoal-gray pot on a balcony in late fall, with deeply frilled, tightly curled mid-green leaves on a short sturdy stem and a light frost on the leaf edges. The pot sits in the lower half of the frame; the top third is calm, softly blurred pale sky and wall, empty for a title. Cool morning side light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'bok-choy-in-pots' => array(
				'title'        => 'How to Grow Bok Choy in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6, 7, 8 ),
					'plant'   => array( 5 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( -2, 3 ),
					'fall_sow'     => array( -11, -7 ),
				),
				'excerpt'      => 'Bok choy is one of the fastest crops for a pot: baby leaves can be ready in about four weeks, and full heads in eight to ten. Sow it in spring or late summer in a container at least 12 in (30 cm) wide, and keep the potting mix moist so it does not bolt.',
				'facts'        => array(
					'short_name'     => 'Bok choy (pak choi)',
					'botanical_name' => 'Brassica rapa Chinensis Group',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun in spring and fall; light shade in summer',
					'pot_size'       => 'At least 12 in (30 cm) wide',
					'hardiness'      => 'H5',
					'watering'       => 'Regularly, in the morning; never let it dry out',
					'harvest'        => 'Baby leaves in about 30 days; heads in 45–75 days',
					'season'         => 'Sow around your last spring frost, and again in late summer for fall',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Use a pot at least 12 in (30 cm) wide: smaller containers dry out too fast.' ),
						array( 'point' => 'Sow ¾ in (2 cm) deep in peat-free potting mix; seeds come up in about a week.' ),
						array( 'point' => 'Sow in spring and late summer: hot, dry weather and cold snaps make bok choy bolt.' ),
						array( 'point' => 'Thin to 3–4 in (8–10 cm) for baby leaves, or 10–12 in (25–30 cm) for full heads.' ),
						array( 'point' => 'Water in the morning and keep the potting mix moist all the time.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Summer Breeze', 'note' => 'An RHS Award of Garden Merit variety with good resistance to bolting, and to heat and cold. Pick as baby leaves or let it form full stems.' ),
						array( 'name' => 'Glacier', 'note' => 'An RHS Award of Garden Merit variety bred in Britain. Slower to bolt, with a long cropping season, broad white stems and deep green leaves.' ),
						array( 'name' => 'Red Choi', 'note' => 'An RHS Award of Garden Merit variety with purple-red leaves, green undersides and green stems.' ),
						array( 'name' => 'Ivory', 'note' => 'Crisp white stems and dark green, fleshy leaves.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 12 in (30 cm) wide, with drainage holes', 'badge' => '', 'note' => 'A grow bag also works for baby leaves.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'Fresh potting mix for each sowing.', 'url' => '' ),
						array( 'name' => 'Bolt-resistant bok choy seed', 'badge' => '', 'note' => 'Worth choosing if you sow in summer.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Keeps flea beetles off for unmarked leaves.', 'url' => '' ),
						array( 'name' => 'Row cover (frost cloth)', 'badge' => '', 'note' => 'Protects early and late sowings from cold snaps.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why has my bok choy gone to flower?', 'answer' => 'Bok choy bolts easily. Hot, dry weather is the usual trigger, and cold can do it too: University of Minnesota Extension notes that a late frost or more than a week of nights below 50 °F (10 °C) is likely to make young plants bolt once it warms up. Cut off the flower stems before the buds open and eat them, then harvest the rest of the plant straight away. Next time, sow in spring or late summer, choose a bolt-resistant variety, and keep the potting mix moist.' ),
						array( 'question' => 'How long does bok choy take to grow?', 'answer' => 'Baby leaves can be ready in about 30 days. Semi-mature and full-sized heads take about 45 to 75 days.' ),
						array( 'question' => 'Can I still eat bok choy leaves full of tiny holes?', 'answer' => 'Yes. The holes are made by flea beetles, and the damage is only cosmetic. If you want unmarked leaves, cover the pot with insect-proof mesh.' ),
						array( 'question' => 'Can I grow bok choy in shade?', 'answer' => 'In summer, light shade is actually better, because it helps stop the plants bolting. Early and late sowings do best in a warm, sheltered, sunny spot.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow pak choi', 'url' => 'https://www.rhs.org.uk/vegetables/pak-choi/grow-your-own' ),
						array( 'title' => 'RHS — Brassica rapa Chinensis Group (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/122198/brassica-rapa-chinensis-group/details' ),
						array( 'title' => 'RHS — Pak choi \'Summer Breeze\'', 'url' => 'https://www.rhs.org.uk/plants/303557/brassica-rapa-chinensis-group-summer-breeze/details' ),
						array( 'title' => 'RHS — Pak choi \'Glacier\'', 'url' => 'https://www.rhs.org.uk/plants/316083/brassica-rapa-chinensis-group-glacier/details' ),
						$umd_calendar,
						array( 'title' => 'University of Minnesota Extension — Growing Chinese cabbage and bok choy', 'url' => 'https://extension.umn.edu/vegetables/growing-chinese-cabbage-and-bok-choy' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'A quick crop for cool weather' ) .
					$p( 'Bok choy, also called pak choi, is an Asian member of the cabbage family. It forms an upright rosette of broad white or pale green stems and large green or dark purple leaves. You can pick it young as salad greens in as little as four weeks, or let it grow for eight to ten weeks into a full head for stir-fries.' ) .
					$p( 'It likes cool, damp weather. Spring and late summer to fall suit it best. In hot, dry midsummer it tends to bolt, which means it flowers early and the plant is spoiled.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a container at least 12 in (30 cm) wide, or a grow bag, filled with peat-free all-purpose potting mix. Smaller pots dry out too quickly. For full-sized heads, give each plant 10–12 in (25–30 cm) of space.' ) .
					$p( 'For spring and late-summer sowings, choose a warm, sheltered, sunny spot. For summer crops, a cool place in light shade helps stop bolting.' ) .

					$h2( 'Sow' ) .
					$list(
						array(
							'In spring, the University of Maryland Extension calendar has bok choy sown outdoors from about 2 weeks before to 3 weeks after the last spring frost. You can also start seeds indoors in modules of peat-free seed-starting mix.',
							'For a fall crop, sow again in late summer, about 7–11 weeks before your first fall frost.',
							'Sow thinly, ¾ in (2 cm) deep. Seeds come up in about a week.',
							'Protect early and late sowings from cold with a cloche or row cover.',
							'Sow a small batch every few weeks for a steady supply.',
						)
					) .
					$p( 'Thin the seedlings in stages and eat the thinnings. Leave 3–4 in (8–10 cm) between plants for baby leaves, 8 in (20 cm) for semi-mature heads and 10–12 in (25–30 cm) for full-sized heads. Module-raised plants can go out from late spring once they are at least 4 in (10 cm) tall and hardened off.' ) .

					$h2( 'Water to stop bolting' ) .
					$p( 'Bok choy grows best in potting mix that never dries out, and potting mix dries quickly, so water regularly. Morning is the best time: the plants have water through the day, while damp potting mix overnight can attract slugs and snails. Avoid watering in the midday heat, when much of it evaporates.' ) .
					$p( 'Cold is the other trigger. University of Minnesota Extension warns that young plants hit by a late frost, or by more than a week of nights below 50 °F (10 °C), are likely to bolt once warm weather returns, so keep row cover handy for spring sowings.' ) .
					$p( 'If you sow in summer, choose a bolt-resistant variety and pick the plants as salad greens or semi-mature heads. If flower stems appear, cut them before the buds open and add them to salads or stir-fries, then harvest the whole plant: it only gets worse. Plants sown at the same time are likely to follow, so pick those soon too.' ) .

					$h2( 'Harvest' ) .
					$list(
						array(
							'<strong>Baby leaves</strong>: from about 30 days, snip a few leaves from each plant. They keep producing until they start to flower.',
							'<strong>Semi-mature and full-sized heads</strong>: after 45–75 days, while still compact and firm, cut through the base of the stem with a sharp knife.',
						)
					) .
					$p( 'The harvest runs from early summer to fall, and sometimes later for plants under a cloche or in a greenhouse. Cook the heads lightly, so the stems stay crunchy.' ) .

					$h2( 'Pests' ) .
					$p( 'Slugs and snails love the juicy leaves, especially of seedlings in damp weather. Tiny holes in the leaves are caused by flea beetles; the damage is only cosmetic, and insect-proof mesh keeps them off. As a cabbage-family plant, bok choy can also attract cabbage caterpillars, pigeons and cabbage root fly (cabbage maggot), though root fly should not be a problem for fast baby-leaf crops.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing in midsummer heat without a bolt-resistant variety: the plants flower before they are ready.',
							'Using a small pot: it dries out too fast. Choose one at least 12 in (30 cm) wide.',
							'Letting the potting mix dry out: dry conditions trigger bolting.',
							'Watering in the evening: damp potting mix overnight attracts slugs.',
							'Sowing too thickly and never thinning: crowded plants grow weakly.',
						)
					),
				'image_prompt' => 'A wide 14 in (35 cm) terracotta-colored trough of bok choy on a sunny patio table in early fall. Six compact, semi-mature plants each form an upright rosette of broad, smooth, bright white leaf stalks that widen at the base, topped by glossy, spoon-shaped, dark green leaves with a pale midrib. The potting mix is dark and moist, a pair of small kitchen scissors rests beside the trough, and a brick wall and green foliage blur in the background. Soft, warm, late-afternoon daylight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of semi-mature bok choy plants in a terracotta-colored trough on a balcony, showing upright rosettes of broad, smooth white leaf stalks and glossy, spoon-shaped dark green leaves. The trough fills the lower half of the frame; the top third is calm, softly blurred pale wall, empty for a title. Soft, warm daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
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
				'timing'       => array(
					'fall_sow'     => array( 1, 2 ),
					'harvest_days' => array( 250, 270 ),
				),
				'excerpt'      => 'Plant garlic cloves in fall in a pot at least 10 in (25 cm) deep, 6 in (15 cm) apart, with the tips 1 in (2.5 cm) below the surface. Leave the pot outside in full sun over winter, because garlic needs the cold, and lift the bulbs the following summer when the leaves turn yellow.',
				'facts'        => array(
					'short_name'     => 'Garlic',
					'botanical_name' => 'Allium sativum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun',
					'pot_size'       => 'At least 10 in (25 cm) deep',
					'hardiness'      => 'H4',
					'watering'       => 'In dry spells in spring and early summer; stop when leaves yellow',
					'harvest'        => 'Late spring to summer, when the leaves turn yellow',
					'season'         => 'Plant in fall, 1–2 weeks after your first fall frost',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Buy named garlic varieties from a garden center or seed supplier, not supermarket bulbs.' ),
						array( 'point' => 'Plant in fall: most varieties need one to two months at 32–50 °F (0–10 °C) to form a good bulb.' ),
						array( 'point' => 'Use a pot at least 10 in (25 cm) deep; plant cloves flat end down, 6 in (15 cm) apart, tips 1 in (2.5 cm) deep.' ),
						array( 'point' => 'Water in dry spells in spring and early summer, but stop once the leaves start to yellow.' ),
						array( 'point' => 'Lift when the leaves turn yellow, dry the bulbs for two to four weeks, then store them cool and dry.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Solent Wight', 'note' => 'An RHS Award of Garden Merit softneck variety, well adapted to the British climate. Stores well.' ),
						array( 'name' => 'Germidour', 'note' => 'An RHS Award of Garden Merit softneck variety. Well known and reliable, with large bulbs.' ),
						array( 'name' => 'Cristo', 'note' => 'An RHS Award of Garden Merit softneck variety with white bulbs: strong flavor, light aroma.' ),
						array( 'name' => 'Arno', 'note' => 'A softneck variety with ivory-white skin that stores well.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 10 in (25 cm) deep, with drainage holes', 'badge' => '', 'note' => 'Choose a frost-proof pot: it stays outside all winter.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'Fill the pot to just below the rim.', 'url' => '' ),
						array( 'name' => 'Named garlic bulbs for planting', 'badge' => '', 'note' => 'Sold in fall and spring by garden centers and mail-order suppliers.', 'url' => '' ),
						array( 'name' => 'Row cover or plastic-free netting', 'badge' => '', 'note' => 'Stops birds pulling up the cloves before they root.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I plant garlic from the supermarket?', 'answer' => 'It is not recommended. Supermarket garlic may not suit your climate, so the results can be disappointing, and it can bring in diseases. The RHS says this of the UK, and University of Minnesota Extension says grocery-store garlic does not do well in Minnesota. Buy named varieties from a garden center or seed supplier.' ),
						array( 'question' => 'Why did my garlic not split into cloves?', 'answer' => 'Usually because it did not get enough cold over winter. Most varieties need one to two months at 32–50 °F (0–10 °C), which is why garlic is planted in fall and the pot left outside.' ),
						array( 'question' => 'Should I cut off the flower stem?', 'answer' => 'Yes. Snip it off as soon as it starts to form, so the plant puts its energy into the bulb. The bulb also stores better. Picked young, while still in bud, the flower stalks (scapes) are good sautéed or roasted.' ),
						array( 'question' => 'How do I know when garlic is ready?', 'answer' => 'When the leaves turn yellow. Fall-planted garlic is usually ready from late spring to early summer, and spring-planted garlic from midsummer to early fall. Do not leave it too long: late-lifted bulbs open up and store less well.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow garlic', 'url' => 'https://www.rhs.org.uk/vegetables/garlic/grow-your-own' ),
						array( 'title' => 'RHS — Allium sativum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/858/allium-sativum/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'University of Minnesota Extension — Growing garlic in home gardens', 'url' => 'https://extension.umn.edu/vegetables/growing-garlic' ),
						array( 'title' => 'University of Maryland Extension — Growing garlic in a home garden', 'url' => 'https://extension.umd.edu/resource/garlic' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why garlic is easy in a pot' ) .
					$p( 'Garlic needs very little care: no sowing, no thinning, just a pot of potting mix, some sun and a cold winter. It grows from cloves, the segments of a bulb, and most varieties need a spell of cold to form a good bulb. So you plant it in fall, leave the pot outside, and lift the bulbs the following summer. A pot is also a good answer if your only soil is heavy and wet, which makes garlic more prone to disease.' ) .

					$h2( 'Hardneck or softneck?' ) .
					$list(
						array(
							'<strong>Softneck</strong> garlic has smaller, tightly packed cloves, seldom flowers, and stores longest: up to about a year.',
							'<strong>Hardneck</strong> garlic has fewer, larger cloves with a stronger flavor. It readily sends up flower stems, and it stores for about four to six months.',
						)
					) .
					$p( 'Buy named varieties from a garden center or seed supplier. Supermarket garlic may not suit your climate, and it can carry diseases. Elephant garlic is sold alongside garlic but is closer to a leek, and it needs a long, warm season.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot at least 10 in (25 cm) deep, with drainage holes, filled with peat-free all-purpose potting mix. The width decides how many cloves fit: each needs about 6 in (15 cm) of space. Put the pot in full sun, in a sheltered spot. Choose a frost-proof pot, since it stays outside all winter.' ) .

					$h2( 'Plant the cloves' ) .
					$list(
						array(
							'Plant in fall. University of Minnesota Extension advises planting cloves one to two weeks after your first killing frost. Some varieties are sold for planting in late winter and early spring, but spring-planted cloves give smaller bulbs.',
							'Split the bulb into single cloves just before planting.',
							'Push each clove in flat end down, pointed end up, with the tip 1 in (2.5 cm) below the surface.',
							'Space the cloves 6 in (15 cm) apart.',
							'Cover the pot with row cover or plastic-free netting until the cloves have rooted: birds sometimes pull them up.',
						)
					) .
					$p( 'Garlic is rated H4 by the RHS, which means hardy through most of the UK. The cold is not a problem; it is what the plant needs to make a bulb with several cloves.' ) .

					$h2( 'Care through spring' ) .
					$p( 'Potting mix in a pot dries out quickly, so check it in dry spells in spring and early summer and water when needed: this helps the bulbs swell. Water the potting mix, not the leaves, as wet foliage encourages fungal problems. Once the bulbs are large and the leaves begin to yellow, stop watering, or the bulbs may rot.' ) .
					$p( 'Snip off any flower stems as soon as they appear, so the energy goes into the bulb. Picked young, the stalks (scapes) can be cooked. You can also take a few green leaves for salads while the bulbs grow.' ) .

					$h2( 'Harvest, dry and store' ) .
					$p( 'Garlic is ready when the leaves turn yellow: fall-planted garlic from late spring to early summer, spring-planted from midsummer to early fall. University of Maryland Extension puts fall-planted garlic at about 250–270 days from planting to maturity. Do not delay, or the bulbs open up and keep less well. Ease them out with a hand fork and handle them gently: bruised bulbs do not store.' ) .
					$p( 'Dry the bulbs in a single layer in the sun, or in a dry, airy place, avoiding heat above 86 °F (30 °C). After two to four weeks, when the leaves rustle, cut them off and store the bulbs somewhere cool and dry, at 41–50 °F (5–10 °C).' ) .

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
				'image_prompt' => 'A deep, round, frost-proof gray stone-effect pot of garlic on a sunny patio in late spring. Six garlic plants grow evenly spaced, each with a cluster of long, flat, narrow, strap-shaped blue-green leaves about 16 in (40 cm) tall rising from a single stem; the lower leaf tips are just starting to yellow. The surface of the potting mix is dark and slightly dry; terracotta paving and a low brick wall blur behind. Bright, clear morning sunlight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a deep gray pot of garlic plants on a sunny patio in late spring, with clusters of long, flat, narrow blue-green leaves rising from single stems and a few freshly lifted white garlic bulbs with roots and papery skins resting on the paving beside the pot. The pot fills the lower half; the top third is calm, softly blurred pale wall and sky, empty for a title. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
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
				'timing'       => array(
					'sow_outdoors' => array( -3, -2 ),
					'fall_sow'     => array( -12, -10 ),
					'harvest_days' => array( 70, 100 ),
				),
				'excerpt'      => 'Carrots grow well in pots if you match the variety to the depth: small, round-rooted carrots suit most containers, while long-rooted ones need a deep pot or can be pulled young. Sow thinly where they are to grow and cover the pot with insect-proof mesh against carrot rust fly.',
				'facts'        => array(
					'short_name'     => 'Carrot',
					'botanical_name' => 'Daucus carota subsp. sativus',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun',
					'pot_size'       => 'Round types in most pots; long types need a deep one',
					'hardiness'      => 'H7',
					'watering'       => 'Regularly in a pot; keep moisture even',
					'harvest'        => 'About 70–100 days after sowing; baby carrots sooner',
					'season'         => 'Sow 2–3 weeks before your last spring frost, and again in summer for fall',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose small, round-rooted varieties for most pots; long-rooted carrots need a deep container.' ),
						array( 'point' => 'Sow thinly, straight into the final pot, and cover with about ½ in (1 cm) of peat-free potting mix.' ),
						array( 'point' => 'Thin seedlings to at least 2 in (5 cm) apart; sowing sparsely avoids thinning, which attracts carrot rust fly.' ),
						array( 'point' => 'Cover the whole pot with insect-proof mesh: it is the most effective protection against carrot rust fly.' ),
						array( 'point' => 'Water regularly and evenly: pots dry out fast, and uneven watering splits the roots.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Parmex', 'note' => 'Small, sweet, rounded roots 2–3 in (5–7 cm) long. The RHS notes it can be grown in containers.' ),
						array( 'name' => 'Rondo', 'note' => 'An egg-shaped root about 2 in (5 cm) long and almost as wide, with tall, feathery leaves.' ),
						array( 'name' => 'Nantes and Amsterdam types', 'note' => 'The RHS suggests these for containers, sown from late winter for an early-summer harvest. Early Nantes is an early variety.' ),
						array( 'name' => 'Flyaway', 'note' => 'An RHS Award of Garden Merit main-season variety with good resistance to carrot rust fly. Less susceptible, not immune.' ),
					),
					'products'   => array(
						array( 'name' => 'Deep pot or trough with drainage holes', 'badge' => '', 'note' => 'The RHS suggests at least 18 in (45 cm) deep and wide for vegetables in containers, to cut down on watering.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'Stone-free, so roots grow straight.', 'url' => '' ),
						array( 'name' => 'Round-rooted carrot seed', 'badge' => '', 'note' => 'The easiest choice for most containers.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Covers the whole pot to keep carrot rust fly out.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How deep does a pot for carrots need to be?', 'answer' => 'It depends on the variety. Small, round-rooted carrots, with roots around 2–3 in (5–7 cm) long, suit most containers. Long-rooted carrots need a deep container, or you can pull them young as baby carrots. For vegetables in pots in general, the RHS suggests aiming for at least 18 in (45 cm) deep and wide, so the potting mix does not dry out as fast.' ),
						array( 'question' => 'How do I stop carrot rust fly in a pot?', 'answer' => 'Cover the whole pot with insect-proof mesh: RHS research found a complete cover works better than a barrier around the crop. Sow thinly so you do not need to thin, as the smell of pulled seedlings attracts the fly, and use fresh potting mix rather than mix that grew carrots last year.' ),
						array( 'question' => 'Can I sow carrots in modules and transplant them?', 'answer' => 'It is better not to. Transplanting disturbs the root and leads to forked or misshapen carrots. Sow them straight into the pot where they will grow.' ),
						array( 'question' => 'Why have my carrots split?', 'answer' => 'Usually uneven watering: a dry pot followed by a soaking. Pots dry out faster than the ground, so water regularly and keep the potting mix evenly moist.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow carrots', 'url' => 'https://www.rhs.org.uk/vegetables/carrots/grow-your-own' ),
						array( 'title' => 'RHS — Daucus carota subsp. sativus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/158355/daucus-carota-subsp-sativus/details' ),
						array( 'title' => 'RHS — Carrot fly', 'url' => 'https://www.rhs.org.uk/biodiversity/carrot-rust-fly' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Daucus carota \'Parmex\'', 'url' => 'https://www.rhs.org.uk/plants/107446/daucus-carota-parmex/details' ),
						array( 'title' => 'RHS — Daucus carota \'Rondo\'', 'url' => 'https://www.rhs.org.uk/plants/246954/daucus-carota-rondo/details' ),
						array( 'title' => 'Utah State University Extension — How to grow carrots in your garden', 'url' => 'https://extension.usu.edu/yardandgarden/research/carrots-in-the-garden' ),
						array( 'title' => 'University of Maryland Extension — Growing carrots in a home garden', 'url' => 'https://extension.umd.edu/resource/growing-carrots-home-garden' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Match the carrot to the pot' ) .
					$p( 'Carrots grow well in containers, which makes them a good crop for a balcony or patio. The key is root length. Small, round-rooted varieties such as Parmex, whose roots are 2–3 in (5–7 cm) long, are ideal for most containers. Long-rooted carrots need a deep container; in a shallow pot, pull them young as baby carrots.' ) .
					$p( 'Carrots come in purple, white and yellow as well as orange. Early varieties are for sowing from early spring; main-season varieties from late spring to midsummer.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot or trough with drainage holes, filled with peat-free all-purpose potting mix. Bagged potting mix has no stones, which in the ground make roots fork. For vegetables in containers, the RHS suggests aiming for at least 18 in (45 cm) deep and wide: smaller pots need watering and feeding much more often. Use fresh potting mix, not mix that grew carrots last year, as it may hold carrot rust fly.' ) .
					$p( 'Put the pot in full sun.' ) .

					$h2( 'Sow straight into the pot' ) .
					$list(
						array(
							'Sow where the carrots will grow: transplanting disturbs the root and makes carrots fork.',
							'Scatter the seed as thinly as you can and cover it with about ½ in (1 cm) of potting mix. Water well.',
							'Be patient: carrot seed can be slow to come up.',
							'If you need to thin, leave at least 2 in (5 cm) between plants. Overcrowding distorts the roots.',
							'Sow a small batch every three to four weeks for a steady supply.',
						)
					) .
					$p( 'Utah State University Extension advises sowing carrots 2–3 weeks before your last spring frost, once the soil has reached 40 °F (4 °C), and sowing again every few weeks until midsummer. For a fall crop, University of Maryland Extension suggests sowing 10–12 weeks before your first fall frost. Earlier sowings need a cloche or row cover over the pot, because carrot seed will not come up in cold potting mix.' ) .

					$h2( 'Keep carrot rust fly out' ) .
					$p( 'Carrot rust fly is a small, low-flying black fly. Its slender, creamy-yellow maggots, up to ⅜ in (9 mm) long, tunnel into the roots and leave rusty brown scars that can rot. Two or three generations can hatch between late spring and fall.' ) .
					$list(
						array(
							'<strong>Cover the pot completely</strong> with insect-proof mesh from sowing. RHS research found a complete cover is more effective than a barrier around the crop.',
							'<strong>Sow sparsely</strong> so you do not need to thin: the smell of pulled seedlings attracts egg-laying flies.',
							'<strong>Keep the mesh on</strong> and put it back as soon as you have finished weeding or watering.',
							'<strong>Time it</strong>: in the UK, the RHS notes that carrots sown after late spring miss the first generation, and carrots lifted before late summer miss the second.',
							'<strong>Choose a less susceptible variety</strong> such as Flyaway. None is fully resistant.',
						)
					) .

					$h2( 'Water evenly' ) .
					$p( 'In the ground, carrots rarely need watering. In a pot, which dries out much faster, water regularly. Keep the moisture even: roots can split when the potting mix swings between dry and wet.' ) .

					$h2( 'Harvest' ) .
					$p( 'Utah State University Extension says carrots are generally mature 70–100 days after sowing; the RHS allows about 12–16 weeks in the cooler UK. Baby carrots are ready in a month or two. Pull them as soon as they are big enough to use: the biggest roots are not the tastiest, and spring sowings are best young, sweet and crunchy. Loosen the potting mix first so the roots do not snap. Main-season carrots can be picked through summer into fall.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Growing long carrots in a shallow pot: choose round types, or pull long ones young.',
							'Sowing in modules and transplanting: the roots fork. Sow direct.',
							'Sowing thickly and thinning: crowded roots distort, and thinning attracts carrot rust fly.',
							'Leaving the pot uncovered: a full cover of insect-proof mesh is the best protection.',
							'Watering unevenly: the roots split.',
						)
					),
				'image_prompt' => 'A wide, deep, dark green plastic-free planter of carrots on a sunny balcony in summer. Feathery, finely divided, bright green carrot foliage about 10 in (25 cm) tall fills the pot, and a few small, round, bright orange carrots, about the size of a golf ball, have just been pulled and rest on the dark potting mix with their leafy tops attached. A fine white insect-proof mesh cover is folded back at one side. Wooden decking and a metal railing blur in the background. Bright, natural midday light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a deep dark green planter of carrots on a sunny balcony, with feathery, finely divided bright green foliage and a small bunch of freshly pulled round orange carrots, leafy tops attached, lying on the potting mix in front. The planter fills the lower half; the top third is calm, softly blurred pale sky and wall, empty for a title. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
