<?php
/**
 * Starter guides, batch 9: more herbs and an edible flower for pots
 * (oregano and marjoram, bay, dill, lemon balm, nasturtiums).
 *
 * Facts from the RHS pages listed in each guide (checked 2026-10-17),
 * University of Wisconsin-Madison Extension where the RHS is silent on
 * nasturtium sowing, and Jo Whittingham, Backyard Harvest (DK, 2011),
 * used only where the RHS confirms it. Timing comes from the US extension
 * pages listed in each guide (checked 2026-10-19). The 'months' data
 * is the UK calendar; 'timing' counts weeks from the reader's own last
 * spring frost.
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
	'name'   => __( 'More herbs and flowers', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'oregano-in-pots'    => array(
				'title'        => 'How to Grow Oregano and Marjoram in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'start_indoors' => array( -10, -6 ),
					'sow_outdoors'  => array( 0, 0 ),
					'plant_out'     => array( 0, 0 ),
				),
				'excerpt'      => 'Oregano is a compact, drought-tolerant Mediterranean herb that grows well in a pot at least 6 in (15 cm) wide and deep, in full sun and gritty, free-draining potting mix. Pick it from late spring to fall, trim it in late spring, and keep the pot out of winter wet.',
				'facts'        => array(
					'short_name'     => 'Oregano',
					'botanical_name' => 'Origanum vulgare',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, in a warm spot',
					'pot_size'       => 'At least 6 in (15 cm) wide and deep for one young plant',
					'hardiness'      => 'H6',
					'watering'       => 'Water in dry spells; never let the potting mix become waterlogged',
					'harvest'        => 'Late spring to fall; best before the flowers open',
					'season'         => 'Perennial; plant out once frost has passed',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Use a pot at least 6 in (15 cm) wide and deep, with drainage holes, for one young plant.' ),
						array( 'point' => 'Fill it with a peat-free soil-based potting mix mixed with up to a quarter horticultural grit by volume.' ),
						array( 'point' => 'Give it the warmest, sunniest spot you have.' ),
						array( 'point' => 'Water in dry spells, but never let the potting mix stay waterlogged, especially in winter.' ),
						array( 'point' => 'Pick sprigs often: the leaves taste best before the flowers open.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Origanum vulgare \'Compactum\'', 'note' => 'Holds the RHS Award of Garden Merit. Low-growing, with small, strongly aromatic leaves. The RHS rates it H5.' ),
						array( 'name' => 'Origanum vulgare \'Hot and Spicy\'', 'note' => 'Award of Garden Merit. Soft, gray-green leaves with a distinct heat and a robust flavor.' ),
						array( 'name' => 'Origanum vulgare \'Gold Nugget\'', 'note' => 'Award of Garden Merit. Golden-yellow leaves with a sweet flavor, and pale pink flowers.' ),
						array( 'name' => 'Origanum vulgare \'Aureum\'', 'note' => 'Award of Garden Merit. Bright golden-yellow leaves with a warm flavor. Grows in full sun or partial shade.' ),
						array( 'name' => 'Sweet marjoram (Origanum majorana)', 'note' => 'Milder, sweeter leaves than oregano, but frost-tender (rated H2). Start it indoors in spring and keep it under cover in winter.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 6 in (15 cm) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Large enough for one young plant.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'A soil-based mix suits oregano.', 'url' => '' ),
						array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Mix in up to a quarter by volume to improve drainage.', 'url' => '' ),
						array( 'name' => 'Herb snips', 'badge' => '', 'note' => 'For regular picking and trimming faded flower stems.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What is the difference between oregano and marjoram?', 'answer' => 'Both belong to the genus Origanum, and the names are often swapped. Origanum vulgare and its varieties are usually sold as oregano, although the wild plant is also called wild marjoram. Sweet marjoram (O. majorana) and pot marjoram (O. onites) are generally called marjoram. Oregano leaves smell more pungent and thyme-like; marjoram is milder and sweeter, and less hardy.' ),
						array( 'question' => 'Can oregano stay outside in winter?', 'answer' => 'Origanum vulgare and its varieties are reliably hardy: the RHS rates the species H6. The real danger is wet potting mix, which rots the roots. Move the pot to a sheltered place, such as next to a wall where rain does not reach. Sweet marjoram is frost-tender and needs to come under cover.' ),
						array( 'question' => 'Does oregano in a pot need feeding?', 'answer' => 'Very little. It grows well in fairly poor potting mix. Once a plant has been in the same pot for more than a year, scatter a little granular all-purpose fertilizer over the pot in late spring or early summer.' ),
						array( 'question' => 'Can I keep picking oregano in winter?', 'answer' => 'Possibly. A pot brought indoors in fall may keep producing leaves if it has enough warmth and light.' ),
						array( 'question' => 'What are the orange spots on my oregano?', 'answer' => 'Probably mint rust, a fungus that also attacks marjoram. It causes dusty orange, yellow and black spots on the leaves and distorted shoots. No fungicide is available for herbs grown for eating. Remove affected plants promptly, before the black spores form; then replant with healthy plants in fresh potting mix.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow oregano', 'url' => 'https://www.rhs.org.uk/herbs/oregano/grow-your-own' ),
						array( 'title' => 'RHS — Origanum vulgare (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/11923/origanum-vulgare/details' ),
						array( 'title' => 'RHS — Origanum majorana (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/11919/origanum-majorana/details' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						array( 'title' => 'RHS — Mint rust', 'url' => 'https://www.rhs.org.uk/disease/mint-rust' ),
						array( 'title' => 'UC Statewide IPM Program — Cultural tips for growing oregano', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/oregano/cultural-tips/index.html' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Oregano or marjoram?' ) .
					$p( 'Oregano and marjoram are close relatives in the genus Origanum, and their names are often mixed up. What garden centers sell as oregano is usually Origanum vulgare or one of its varieties. Sweet marjoram (O. majorana) and pot marjoram (O. onites) are the plants generally called marjoram.' ) .
					$p( 'Oregano has a stronger, more pungent, thyme-like smell; marjoram is milder and sweeter. Oregano is also the hardier of the two. Both form clumps of small aromatic leaves with pink, mauve or white flowers in summer, and bees and butterflies love the flowers.' ) .

					$h2( 'Choose the pot, potting mix and spot' ) .
					$p( 'For one young plant, use a pot at least 6 in (15 cm) wide and deep, with drainage holes in the base. Fill it with a soil-based potting mix (UK gardeners can use peat-free John Innes No. 2), and mix in horticultural grit, up to a quarter of the volume, so water drains away freely.' ) .
					$p( 'Oregano comes from the Mediterranean and wants the warmest, sunniest spot on your balcony or patio. Plants usually grow 1–2 ft (30–60 cm) tall and wide, depending on the variety. Oregano also grows happily in a larger pot alongside other sun-lovers such as thyme and sage.' ) .

					$h2( 'Buy a plant or sow seed' ) .
					$p( 'Most people buy oregano as a young plant. Buy in person if you can, so you can choose the scent you like, and look in the herb section: some varieties, such as \'Kent Beauty\' and \'Rosenkuppel\', are bred for looks rather than flavor. Plants settle in quickly when potted up once the risk of frost has passed.' ) .
					$list(
						array(
							'To grow from seed, start seeds indoors 6–10 weeks before your last spring frost, as the UC Statewide IPM Program suggests, on the surface of moist peat-free seed-starting mix. The seeds are tiny: do not cover them.',
							'Cover the tray with a clear plastic bag or put it in a propagator. Seeds germinate well at around 68 °F (20 °C) and come up in one to three weeks.',
							'Keep the seedlings warm and bright, and water without overdoing it: seedlings are prone to damping off.',
							'When they have several leaves, pot each one on into a 3 in (7.5 cm) pot of soil-based potting mix.',
							'Harden them off and move them outside once the risk of spring frost has passed.',
						)
					) .
					$p( 'You can also sow straight into the pot outdoors after your last spring frost.' ) .

					$h2( 'Water and fertilize' ) .
					$p( 'Oregano is drought-tolerant, but potting mix in a pot dries out quickly in hot, sunny weather. Water during dry spells, and never let the pot become waterlogged. Feeding is rarely needed: after a year or more in the same pot, a sprinkle of all-purpose granular fertilizer in late spring or early summer is enough.' ) .

					$h2( 'Pick, trim and dry' ) .
					$p( 'Snip a few shoots whenever you need them, from late spring to fall, and strip off the leaves. Regular picking keeps the plant bushy. The flavor is best before the flowers open, and the flowers themselves are edible in salads.' ) .
					$p( 'In late spring, trim established plants to keep them compact and remove dead or straggly stems. Cut off the flower stems once the flowers fade. Oregano dries well: see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Winter' ) .
					$p( 'Origanum vulgare is reliably hardy, but winter wet rots its roots. Move the pot to a sheltered spot, such as close to a wall where rain does not reach. Some less common species are less hardy: check the label, and bring sweet marjoram, which is frost-tender, into a greenhouse or indoors.' ) .

					$h2( 'Pests and diseases' ) .
					$p( 'Oregano in a sunny spot and free-draining potting mix is generally healthy. Mint rust, a fungus that also attacks marjoram, causes dusty orange, yellow and black spots on the leaves. No fungicide is available for culinary herbs: remove affected plants promptly. Mint moth caterpillars sometimes feed on the leaves but can usually be tolerated, and leafhoppers can cause a coarse pale mottling in spring and summer.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Using a rich, moisture-holding potting mix without grit: the roots rot.',
							'Leaving the pot in winter rain: move it to a sheltered spot.',
							'Buying an ornamental variety for the kitchen: choose from the herb section.',
							'Letting the plant flower before you pick: the flavor is best before flowering.',
							'Treating sweet marjoram as hardy: it needs protection from frost.',
						)
					),
				'image_prompt' => 'A bushy oregano plant with small, oval, soft green leaves on upright and spreading stems, topped with clusters of tiny pink-mauve flowers, growing in an 8-inch terracotta pot on a sunny balcony floor beside a pot of thyme, a bee visiting the flowers, warm afternoon sun.' . $photo_end,
				'pin_prompt'   => 'A compact oregano plant with small oval green leaves in a terracotta pot on a sunny patio table, a few freshly cut sprigs and a small bunch tied with twine for drying beside it, photographed vertically from slightly above.' . $pin_end,
			),

			'bay-tree-in-pot'    => array(
				'title'        => 'How to Grow a Bay Tree in a Pot',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'plant'   => array( 3, 4, 5 ),
					'harvest' => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				// No timing: no US extension source found gives frost-relative planting dates for a potted bay.
				'excerpt'      => 'Bay is an evergreen Mediterranean shrub that grows well in a pot of peat-free soil-based potting mix, in a warm, sheltered spot in sun or light shade. Water and fertilize it through summer, repot it every two or three years, and protect it from hard frost, cold wind and winter wet.',
				'facts'        => array(
					'short_name'     => 'Bay',
					'botanical_name' => 'Laurus nobilis',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun or light shade, sheltered from wind',
					'pot_size'       => 'Slightly larger than its current pot; go up a size every 2–3 years',
					'hardiness'      => 'H4',
					'watering'       => 'Check often in summer; never let it become waterlogged',
					'harvest'        => 'All year round',
					'season'         => 'Evergreen; plant in spring',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Move a new bay into a pot only slightly larger than the one it came in.' ),
						array( 'point' => 'Use a peat-free soil-based potting mix with some horticultural grit.' ),
						array( 'point' => 'Choose a warm, sheltered spot in full sun or light shade, out of strong winds.' ),
						array( 'point' => 'Feed every two or three weeks from mid-spring to late summer, and repot every two or three years.' ),
						array( 'point' => 'Protect the pot and plant from hard frost and winter wet.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Bay (Laurus nobilis)', 'note' => 'Holds the RHS Award of Garden Merit. The classic culinary bay, with glossy, dark green, richly aromatic leaves.' ),
						array( 'name' => 'Golden bay (Laurus nobilis \'Aurea\')', 'note' => 'Award of Garden Merit. Yellow-tinged aromatic leaves, at their brightest in winter and spring. Usually from specialist nurseries.' ),
						array( 'name' => 'Willow-leaved bay (Laurus nobilis f. angustifolia)', 'note' => 'Award of Garden Merit. Narrow, wavy-edged, aromatic leaves that can also be used in cooking.' ),
					),
					'products'   => array(
						array( 'name' => 'Frost-proof pot with drainage holes', 'badge' => '', 'note' => 'Only slightly larger than the current root ball; bay stays outside all winter.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'For planting and for each repotting.', 'url' => '' ),
						array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Improves drainage and makes the pot more stable.', 'url' => '' ),
						array( 'name' => 'Organic-based all-purpose liquid fertilizer', 'badge' => '', 'note' => 'Every two or three weeks from mid-spring to late summer.', 'url' => '' ),
						array( 'name' => 'Frost cloth (row cover)', 'badge' => '', 'note' => 'Covers smaller plants on nights of harsh frost.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can a bay tree in a pot stay outside in winter?', 'answer' => 'Usually, yes. The RHS rates bay H4, hardy through most of the UK, but plants in pots are more exposed to cold and wet. Group pots together, wrap the pot in old blankets or bubble wrap, or move it to a sheltered place such as a porch or the lee of a wall. If a harsh frost is forecast, cover smaller plants overnight with frost cloth, burlap or an old sheet.' ),
						array( 'question' => 'Why are my bay leaves yellow or spotted?', 'answer' => 'Spotted or yellowing leaves can mean the roots are too wet, or that a potted plant needs repotting. Leaves at the shoot tips that thicken, curl at the edges and turn pale yellow are the work of bay sucker, a small sap-sucking insect.' ),
						array( 'question' => 'How do I keep a bay tree small?', 'answer' => 'Bay responds well to pruning. Trim clipped shapes in summer, shorten new growth on a natural shrub in spring or summer, and do any hard pruning in mid- to late spring. Growing it in a pot also keeps it smaller than in the ground, where it can eventually reach 33 ft (10 m).' ),
						array( 'question' => 'Should I use bay leaves fresh or dried?', 'answer' => 'Both work. Fresh leaves have a stronger, slightly bitter flavor; dried ones are subtler. Dry them in a warm room, flattened between the pages of an old book if you like, store them in an airtight jar and use them within a few months. You can also freeze them.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow bay', 'url' => 'https://www.rhs.org.uk/herbs/bay/grow-your-own' ),
						array( 'title' => 'RHS — Laurus nobilis (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/9876/laurus-nobilis/details' ),
						array( 'title' => 'RHS — Bay sucker', 'url' => 'https://www.rhs.org.uk/biodiversity/bay-sucker' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why bay suits a pot' ) .
					$p( 'Bay, also called sweet bay or bay laurel, is an evergreen Mediterranean shrub or small tree with dark green, glossy, aromatic leaves. In the ground it can eventually reach 33 ft (10 m), but in a container it stays manageable, and you can move it to shelter in a cold spell. It is also a classic for clipping into a ball, cone or lollipop-shaped standard, either side of a door.' ) .

					$h2( 'Choose the pot, potting mix and spot' ) .
					$p( 'Spring is the best time to pot a bay. Choose a container with drainage holes, only slightly larger than the one the plant came in. Fill it with a soil-based potting mix; in the UK, choose peat-free John Innes No. 2 or No. 3. Mix in some horticultural grit: it improves drainage and makes the pot more stable in the wind.' ) .
					$p( 'Stand the pot in a warm, sheltered place in full sun or light shade, out of strong winds. On a balcony or patio, that often means a spot close to the house wall.' ) .

					$h2( 'Water and fertilize' ) .
					$p( 'A bay in a pot depends on you for water. Check the potting mix regularly, especially in summer, and water when it is drying out. Never let it stay waterlogged, above all in winter, or the roots may rot.' ) .
					$p( 'From mid-spring to late summer, feed every two or three weeks with an organic-based, all-purpose liquid fertilizer.' ) .

					$h2( 'Prune and shape' ) .
					$p( 'Trim clipped shapes in summer to keep them neat and dense. Use pruners rather than hedge shears: shears cut through leaves and leave brown, unsightly edges. On a lollipop standard, pull off any shoots that sprout from the roots as soon as you see them.' ) .
					$p( 'On a natural, unclipped bush, shorten new growth in spring or summer where needed. Bay copes well with hard pruning, best done in mid- to late spring. Cut out any shoots damaged by frost in spring. If it is not trimmed too often, bay bears clusters of pale yellow flowers in spring that attract pollinators.' ) .

					$h2( 'Repot every two or three years' ) .
					$p( 'Move a potted bay into a slightly larger container every two or three years, using fresh peat-free soil-based potting mix. When the pot is already as big as you can manage, trim the roots instead, refresh the potting mix and put the plant back in the same pot.' ) .

					$h2( 'Protect it in winter' ) .
					$p( 'Bay is hardy, but harsh frost and cold winds can scorch the leaves and kill some of the top growth, and cold, wet potting mix can rot the roots. Plants in pots are the most exposed, because the whole root ball can freeze.' ) .
					$list(
						array(
							'Group pots together and move them to a sheltered spot, such as a porch or the lee of a wall.',
							'Wrap the pot in old blankets or reused bubble wrap.',
							'When a harsh frost is forecast, cover smaller plants overnight with frost cloth, burlap or an old bed sheet.',
							'In very cold areas, move the pot into a greenhouse for winter.',
						)
					) .

					$h2( 'Pick and dry the leaves' ) .
					$p( 'Because bay is evergreen, you can pick leaves whenever you need them, all year. Use them in soups, stews, stocks and sauces, and take them out before serving: they barely soften in cooking. Bay is also the key ingredient of a bouquet garni.' ) .
					$p( 'To keep bay leaves, follow our guide on <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Moving a small bay into a huge pot: go up one size at a time.',
							'Letting the potting mix stay waterlogged in winter: wet roots rot.',
							'Standing it in a windy, exposed corner: cold winds damage the leaves.',
							'Clipping with hedge shears: use pruners for a neat finish.',
							'Forgetting to fertilize and repot: a potted bay relies on you for nutrients.',
						)
					),
				'image_prompt' => 'A young bay tree trained as a lollipop standard, with a dense ball of glossy, dark green, pointed oval leaves on a single clear stem, growing in a heavy gray frost-proof pot beside a front door on a sheltered patio, soft morning sun.' . $photo_end,
				'pin_prompt'   => 'A bushy bay plant with glossy dark green pointed leaves in a terracotta pot against a sunny house wall on a balcony, a few picked bay leaves on a small wooden board beside it, photographed vertically.' . $pin_end,
			),

			'dill-in-pots'       => array(
				'title'        => 'How to Grow Dill in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( -2, -1 ),
				),
				'excerpt'      => 'Dill grows well in a pot at least 12 in (30 cm) wide and deep, sown where it is to grow, in a warm, sunny, sheltered spot. Start picking leaves about six weeks after sowing, water in dry spells to stop it bolting, and sow a small batch every few weeks for leaves into fall.',
				'facts'        => array(
					'short_name'     => 'Dill',
					'botanical_name' => 'Anethum graveolens',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, sheltered from strong wind',
					'pot_size'       => 'At least 12 in (30 cm) wide and deep',
					'hardiness'      => 'H4',
					'watering'       => 'Water in dry spells; pots dry out fast in warm weather',
					'harvest'        => 'Leaves from about 6 weeks after sowing',
					'season'         => 'Annual; sow from 1–2 weeks before the last spring frost to midsummer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow straight into the final pot: dill dislikes having its roots disturbed.' ),
						array( 'point' => 'Use a pot at least 12 in (30 cm) wide and deep, filled with peat-free all-purpose potting mix.' ),
						array( 'point' => 'Choose a compact variety such as \'Domino\' or \'Diana\' for containers.' ),
						array( 'point' => 'Water during dry spells: hot, dry conditions make dill flower early.' ),
						array( 'point' => 'Sow a small batch every few weeks from 1–2 weeks before your last spring frost until midsummer.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Domino', 'note' => 'Holds the RHS Award of Garden Merit. Bushy and compact, with plenty of aromatic leaves, and slow to bolt. Suitable for containers.' ),
						array( 'name' => 'Diana', 'note' => 'A compact variety that the RHS lists as suitable for container growing.' ),
						array( 'name' => 'Tetra', 'note' => 'Bushy and slow to bolt.' ),
						array( 'name' => 'Dukat', 'note' => 'Vigorous plants with lots of well-flavored leaves.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 12 in (30 cm) wide and deep', 'badge' => '', 'note' => 'Deep enough for dill\'s tap root, with drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For sowing straight into the pot.', 'url' => '' ),
						array( 'name' => 'Seed of a compact dill variety', 'badge' => '', 'note' => 'Compact types such as \'Domino\' suit containers.', 'url' => '' ),
						array( 'name' => 'Herb scissors', 'badge' => '', 'note' => 'For snipping leaves without pulling at the plant.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why has my dill flowered so soon?', 'answer' => 'Dill tends to bolt, or flower early, in hot, dry weather, and leaf growth then slows. Water during dry spells, pick the leaves regularly, cut off flower stems as they form, and grow a slow-to-bolt variety such as \'Domino\' or \'Tetra\'. Sowing a new batch every few weeks keeps fresh leaves coming.' ),
						array( 'question' => 'Can I grow dill on a windowsill?', 'answer' => 'Yes. Dill can be sown indoors at any time of year if the plants will stay on a sunny windowsill. They grow bushier when light levels are higher, from spring to late summer.' ),
						array( 'question' => 'Can I transplant dill seedlings?', 'answer' => 'Carefully. Dill dislikes root disturbance, so sowing straight into the final pot is best. If you sow in cell trays, water them first and plant out about four weeks after sowing, before a long tap root forms, without disturbing the root ball. Harden off indoor-raised plants before they go outside.' ),
						array( 'question' => 'How do I collect dill seed?', 'answer' => 'Leave a few plants to flower. In late summer or fall, when the seeds are dry and brown, cut the stems, put each seedhead in a paper bag and hang them upside down until the seeds drop. Store them in an airtight container for cooking or for sowing next spring.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow dill', 'url' => 'https://www.rhs.org.uk/herbs/dill/grow-your-own' ),
						array( 'title' => 'RHS — Anethum graveolens (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/43298/anethum-graveolens/details' ),
						array( 'title' => 'RHS — Anethum graveolens \'Domino\'', 'url' => 'https://www.rhs.org.uk/plants/344766/anethum-graveolens-domino/details' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						array( 'title' => 'University of Illinois Extension — Dill', 'url' => 'https://extension.illinois.edu/herbs/dill' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'What dill is like' ) .
					$p( 'Dill is an annual herb grown mainly for its soft, feathery leaves, which taste fresh with a light hint of aniseed. It flowers, sets seed and dies in one season. In the open it can reach 5 ft (1.5 m), but it usually flowers and stops growing at around 3 ft (90 cm). The flowers and seeds are edible too, and the tiny yellow flowers attract pollinators.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Grow dill in peat-free all-purpose potting mix, in a container 12 in (30 cm) or more wide and deep with drainage holes. Compact varieties such as \'Domino\' and \'Diana\' are the best choice for pots.' ) .
					$p( 'Dill wants a warm, sunny place, sheltered from strong wind. It dislikes cold, soggy conditions, so avoid a shady corner where the potting mix stays wet.' ) .

					$h2( 'Sow straight into the pot' ) .
					$p( 'Dill grows a tap root and resents being moved, so sowing where it will grow works best. The University of Illinois Extension sows outdoors one to two weeks before the last spring frost; keep sowing until midsummer.' ) .
					$list(
						array(
							'Water the potting mix and let it drain.',
							'Sow the seed thinly over the surface.',
							'Cover it with about ½ in (1 cm) of potting mix.',
							'Keep the potting mix moist while the seedlings come up.',
							'Sow another small batch every few weeks (Illinois Extension suggests every two weeks) for a steady supply of young leaves.',
						)
					) .
					$p( 'To start dill indoors, sow one seed per cell in peat-free seed-starting mix and keep it no cooler than 59 °F (15 °C). Seeds come up in one to two weeks. Plant the young plants into their pot about four weeks after sowing, before the tap root grows long, and harden them off first. You can plant several young plants of a compact variety together in one large container.' ) .

					$h2( 'Water to stop it bolting' ) .
					$p( 'Hot, dry weather makes dill flower early, which gardeners call bolting, and leaf growth then stops. Potting mix in a pot dries out very quickly in warm weather, so check it often and water during dry spells.' ) .

					$h2( 'Pick the leaves' ) .
					$p( 'Start picking about six weeks after sowing. Snip a few leaves at a time and always leave at least a third of the plant to keep growing. Regular picking, or pinching out the shoot tips, keeps plants bushy and delays flowering. If you only want leaves, cut off flower stems as they appear.' ) .
					$p( 'Use the leaves quickly: they wilt soon after picking, even in the fridge. To keep dill for later, see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Flowers and seeds' ) .
					$p( 'If you have room for a second pot, let a few plants flower. The flowers can go in salads or a jar of pickles, and the seeds ripen in late summer and fall. Collect them when they are dry and brown. Seeds left on the plant drop and come up as new seedlings; move them while they are small, before they form a tap root.' ) .

					$h2( 'Pests' ) .
					$p( 'The delicate young leaves attract slugs and snails, so protect seedlings and young plants and remove any slugs you find. Aphids may also cluster on the shoots.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Transplanting cell-grown seedlings late: move them before the tap root forms, or sow straight into the pot.',
							'Using a shallow pot: choose one at least 12 in (30 cm) deep.',
							'Letting the potting mix dry out in summer: dill runs to flower.',
							'Sowing everything at once: sow little and often instead.',
							'Stripping the plant bare: always leave at least a third.',
						)
					),
				'image_prompt' => 'Young dill plants with soft, feathery, thread-like blue-green leaves growing densely in a deep 12-inch gray pot on a sunny, sheltered balcony, a few stems snipped for the kitchen, no flowers yet, bright summer daylight.' . $photo_end,
				'pin_prompt'   => 'A deep pot of feathery blue-green dill on a sunny patio, with one taller stem carrying flat clusters of tiny yellow flowers, photographed vertically against a pale wall.' . $pin_end,
			),

			'lemon-balm-in-pots' => array(
				'title'        => 'How to Grow Lemon Balm in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6 ),
					'plant'   => array( 3, 4, 5 ),
					'harvest' => array( 4, 5, 6, 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'start_indoors' => array( -6, -4 ),
				),
				'excerpt'      => 'Lemon balm is a fully hardy, easy perennial herb that spreads and self-seeds, so a container 10 in (25 cm) or more across and deep keeps it in check. Grow it in sun or part shade, keep the potting mix evenly moist, pick the young leaves from spring to fall and cut it back hard after flowering.',
				'facts'        => array(
					'short_name'     => 'Lemon balm',
					'botanical_name' => 'Melissa officinalis',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun or partial shade',
					'pot_size'       => 'At least 10 in (25 cm) wide and deep',
					'hardiness'      => 'H7',
					'watering'       => 'Keep the potting mix evenly moist; never waterlogged',
					'harvest'        => 'Spring to fall; the youngest leaves taste best',
					'season'         => 'Perennial; dies back in winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Keep it in its own pot, 10 in (25 cm) or more wide and deep, to stop it spreading.' ),
						array( 'point' => 'Use a peat-free soil-based potting mix, in sun or partial shade.' ),
						array( 'point' => 'Keep the potting mix evenly moist, but never waterlogged, especially in winter.' ),
						array( 'point' => 'Cut the whole plant down after flowering, before it sets seed, for a fresh crop of leaves.' ),
						array( 'point' => 'Divide it every few years, in spring or fall.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Lemon balm (Melissa officinalis)', 'note' => 'The standard type: vigorous, with a strong lemon flavor. Widely sold as seed or plants.' ),
						array( 'name' => 'All Gold', 'note' => 'Yellow leaves with good fragrance and flavor. Best in light shade.' ),
						array( 'name' => 'Aurea', 'note' => 'Leaves splashed with yellow at the edges, with a strong lemon flavor.' ),
						array( 'name' => 'Lime Balm', 'note' => 'A lime-scented form. Named varieties are often sold only as plants.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 10 in (25 cm) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Keeps the plant from spreading.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'For planting and for each division.', 'url' => '' ),
						array( 'name' => 'Herb snips', 'badge' => '', 'note' => 'For picking and the cut-back after flowering.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Will lemon balm take over?', 'answer' => 'It can. Lemon balm is vigorous, spreads into a large clump in a few years and self-seeds freely. A pot keeps the clump in check, and cutting the plant down straight after flowering, before seeds form, stops seedlings popping up elsewhere.' ),
						array( 'question' => 'Why has my lemon balm died back?', 'answer' => 'That is normal in fall. Lemon balm is a herbaceous perennial: it dies down once temperatures drop and grows again in spring. Cut off the faded stems by early spring, before new growth starts.' ),
						array( 'question' => 'Can I make tea from lemon balm?', 'answer' => 'Yes. Infuse fresh leaves in hot water. You can also dry leaves for tea in winter, although the flavor is much milder than fresh.' ),
						array( 'question' => 'Why does my lemon balm look tatty in summer?', 'answer' => 'Plants often look straggly after flowering. Powdery mildew, a white dusty coating, and leafhoppers, which leave pale mottling, can also mark the leaves. Cut the plant down to just above the base and fresh shoots soon follow.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow lemon balm', 'url' => 'https://www.rhs.org.uk/herbs/lemon-balm/grow-your-own' ),
						array( 'title' => 'RHS — Melissa officinalis (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/11040/melissa-officinalis/details' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						array( 'title' => 'University of Wisconsin-Madison Extension — Lemon balm, Melissa officinalis', 'url' => 'https://hort.extension.wisc.edu/articles/lemon-balm-melissa-officinalis/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why grow lemon balm in a pot' ) .
					$p( 'Lemon balm is one of the easiest and hardiest lemon-scented herbs you can grow. It forms a large, leafy clump with flower stems up to 3 ft (90 cm) tall, and its small white summer flowers are rich in nectar and loved by bees. Its name, Melissa, comes from the Greek for honeybee.' ) .
					$p( 'It is also vigorous: it spreads and self-seeds freely, and can take time to remove once established. A pot keeps it where you want it.' ) .

					$h2( 'Pot, potting mix and position' ) .
					$p( 'Use a pot at least 10 in (25 cm) wide and deep, with drainage holes, filled with a peat-free soil-based potting mix. Lemon balm is happy in sun or partial shade, so it suits a balcony that only gets part of the day\'s sun. Yellow-leaved varieties are best in light shade.' ) .

					$h2( 'Sow or plant' ) .
					$p( 'One or two plants are plenty for most kitchens. Bought plants can go into pots at any time of year, though spring is ideal.' ) .
					$list(
						array(
							'Start seeds indoors 4–6 weeks before your last spring frost, as the University of Wisconsin-Madison Extension suggests, in a small pot of peat-free seed-starting mix. Cover the seed with only a very thin layer of fine mix: some light helps it germinate.',
							'Cover the pot with a clear plastic bag, or use a heated propagator, in a warm, bright spot. Seedlings can take up to three weeks to appear.',
							'Remove the cover when they come up and keep the mix slightly moist.',
							'Harden off indoor-raised plants and move them outside from late spring, once they are 2–3 in (5–8 cm) tall.',
							'Or sow outdoors from late spring to early summer, straight into a pot of peat-free soil-based potting mix.',
						)
					) .

					$h2( 'Water' ) .
					$p( 'In a pot, lemon balm needs watering to keep the potting mix evenly moist through spring and summer. Avoid waterlogging: cold, soggy potting mix in winter can rot the roots.' ) .

					$h2( 'Pick and cut back' ) .
					$p( 'Pick leaves whenever you need them from spring to fall. Choose the youngest leaves and use them fresh, when the flavor is best, in salads, chicken and fish dishes, fruit salads and desserts, or infused as tea.' ) .
					$p( 'After flowering the plant looks straggly and the leaves turn tatty. Cut the whole plant down to just above the base, straight after flowering and before seeds form. It soon sends up a fresh flush of leaves. In fall it dies back; dried leaves make a milder winter tea.' ) .

					$h2( 'Divide and take cuttings' ) .
					$p( 'Every few years, in spring or fall, tip the plant out and divide the clump into smaller pieces. Replant one in fresh potting mix and give the rest away. Division is the easiest way to keep a named variety, because seedlings often differ from the parent. Softwood cuttings, taken from mid-spring to early summer, root readily, even in a jar of water.' ) .

					$h2( 'Winter and problems' ) .
					$p( 'Lemon balm is fully hardy: the RHS rates it H7. The risk in winter is wet, not cold, so move pots to a sheltered spot out of heavy rain. Lemon balm is generally healthy. Powdery mildew and leafhoppers sometimes mark the leaves; cut back affected stems and new shoots follow.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting it in a shared bed or pot: it spreads and crowds out other herbs.',
							'Leaving the flowers to set seed: seedlings appear everywhere.',
							'Letting the pot sit in winter rain: the roots rot.',
							'Picking old, tough leaves: the young ones have the best flavor.',
							'Never dividing it: the clump becomes large and unruly.',
						)
					),
				'image_prompt' => 'A lush clump of lemon balm with bright green, heart-shaped, crinkled leaves with scalloped edges, filling a wide 12-inch glazed pot on a partly shaded balcony, young shoot tips ready for picking, soft dappled daylight.' . $photo_end,
				'pin_prompt'   => 'A pot of lemon balm with fresh green heart-shaped, scallop-edged leaves on a balcony table, a glass teapot with a few sprigs of leaves beside it, photographed vertically in soft daylight.' . $pin_end,
			),

			'nasturtiums-in-pots' => array(
				'title'        => 'How to Grow Nasturtiums in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 6, 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'start_indoors' => array( -6, -4 ),
					'sow_outdoors'  => array( 0, 0 ),
				),
				'excerpt'      => 'Nasturtiums are fast, easy annuals for sunny patio pots, window boxes and hanging baskets, and their leaves, flower buds and seeds have a strong peppery taste. Start them indoors 4–6 weeks before your last spring frost or sow outside once frost has passed, skip rich potting mix, water pots often in summer and check the leaves for caterpillars and aphids.',
				'facts'        => array(
					'short_name'     => 'Nasturtium',
					'botanical_name' => 'Tropaeolum majus',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, sheltered from strong wind',
					'pot_size'       => 'Large patio pot, window box or hanging basket',
					'hardiness'      => 'H3',
					'watering'       => 'Regularly all summer; pots dry out quickly',
					'harvest'        => 'Leaves, buds and flowers from early summer to fall',
					'season'         => 'Annual; flowers early summer into fall',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose bushy varieties for patio pots and window boxes, and trailing ones for hanging baskets.' ),
						array( 'point' => 'Start seeds indoors 4–6 weeks before your last spring frost, or sow outdoors once frost has passed, about ½ in (1 cm) deep.' ),
						array( 'point' => 'Give them full sun and avoid rich potting mix, which gives leaves instead of flowers.' ),
						array( 'point' => 'Water pots regularly all summer: they dry out very quickly.' ),
						array( 'point' => 'Check under the leaves for cabbage white eggs and caterpillars, and for black bean aphids.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Whirlybird Series', 'note' => 'Dwarf, bushy plants, about 9½ in (24 cm) tall in the RHS description, with single or semi-double flowers held above the leaves. Good for pots.' ),
						array( 'name' => 'Alaska Salmon Orange (Alaska Series)', 'note' => 'A dwarf, bushy plant about 1 ft (30 cm) tall, with leaves splashed creamy white and orange flowers from early summer to mid-fall. The RHS notes its leaves and flowers are edible.' ),
						array( 'name' => 'Black Velvet (Tom Thumb Series)', 'note' => 'A bushy plant to about 1 ft (30 cm), with velvety dark red flowers from summer into early fall.' ),
						array( 'name' => 'Empress of India', 'note' => 'An older, compact variety with dark leaves and crimson flowers, described by the University of Wisconsin as good in containers.' ),
						array( 'name' => 'Darjeeling Double', 'note' => 'A climbing, trailing type that can reach 8 ft (2.5 m). Needs a support or a high basket to trail from.' ),
					),
					'products'   => array(
						array( 'name' => 'Window box or large patio pot with drainage holes', 'badge' => '', 'note' => 'For bushy varieties.', 'url' => '' ),
						array( 'name' => 'Hanging basket', 'badge' => '', 'note' => 'For trailing varieties to spill over the edge.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'Avoid adding rich manure or extra fertilizer.', 'url' => '' ),
						array( 'name' => 'Slow-release fertilizer', 'badge' => '', 'note' => 'A little mixed into the potting mix at planting time.', 'url' => '' ),
						array( 'name' => 'Gardening gloves', 'badge' => '', 'note' => 'The RHS lists nasturtium as a skin allergen.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which parts of a nasturtium can I eat?', 'answer' => 'The leaves, young flower buds, flowers and seeds of Tropaeolum majus are edible, with a strong peppery flavor, so use them sparingly. Use the whole flower, or just the petals for a milder taste. Young leaves taste better than old ones, which can turn bitter. Eat only plants you are sure of, and if a plant was not sold for culinary use, grow it on for at least three months and only pick the later flowers.' ),
						array( 'question' => 'Why are my nasturtiums all leaves and no flowers?', 'answer' => 'The potting mix is probably too rich. Nasturtiums flower best in full sun and fairly poor potting mix; rich, fertile conditions give lush leaves at the expense of flowers. Add only a little slow-release fertilizer at planting, and deadhead regularly to keep flowers coming.' ),
						array( 'question' => 'Do nasturtiums keep pests off other plants?', 'answer' => 'Some gardeners grow them to draw caterpillars and aphids away from nearby crops, and aphids certainly love them. The RHS notes that the evidence for this is anecdotal and that scientific support remains limited. Treat it as a bonus, not as pest control.' ),
						array( 'question' => 'Will my nasturtiums come back next year?', 'answer' => 'The plants are annuals, and their soft stems and leaves are very sensitive to frost, so they finish in fall. They often self-seed, but the seedlings may differ from the parent. For a particular variety, buy fresh, named seed each year.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow annual nasturtiums', 'url' => 'https://www.rhs.org.uk/plants/nasturtiums/annual-nasturtiums/how-to-grow-annual-nasturtiums' ),
						array( 'title' => 'RHS — Annual nasturtiums', 'url' => 'https://www.rhs.org.uk/plants/nasturtiums/annual-nasturtiums' ),
						array( 'title' => 'RHS — Tropaeolum majus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/85362/tropaeolum-majus/details' ),
						array( 'title' => 'RHS — Edible flowers', 'url' => 'https://www.rhs.org.uk/herbs/edible-flowers' ),
						array( 'title' => 'University of Wisconsin-Madison Extension — Nasturtium, Tropaeolum majus', 'url' => 'https://hort.extension.wisc.edu/articles/nasturtium-tropaeolum-majus/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Bushy or trailing: pick the right type' ) .
					$p( 'Annual nasturtiums are fast-growing plants from Central and South America, with round, umbrella-like leaves on long stalks and trumpet-shaped flowers in cream, yellow, orange and red. They flower from early summer into fall.' ) .
					$list(
						array(
							'<strong>Dwarf, bushy types</strong>, such as the Whirlybird Series, stay around 1 ft (30 cm) tall or less. They suit patio pots and window boxes.',
							'<strong>Trailing and climbing types</strong>, such as \'Darjeeling Double\', can reach 8 ft (2.5 m). Let them spill from a hanging basket or a balcony planter, or give them a support to climb.',
						)
					) .

					$h2( 'Pot, potting mix and position' ) .
					$p( 'Choose a large patio pot, a window box or a hanging basket with drainage holes, and fill it with peat-free all-purpose potting mix. Mix a little slow-release fertilizer into the potting mix at planting time, and add nothing richer: in fertile conditions nasturtiums make lush leaves and few flowers.' ) .
					$p( 'Put the pot in full sun, sheltered from strong winds. The more sun, the more flowers.' ) .

					$h2( 'Sow' ) .
					$p( 'Nasturtiums flower quickly from seed, so they are easy to start yourself.' ) .
					$list(
						array(
							'Indoors, the University of Wisconsin-Madison Extension starts seeds 4–6 weeks before the last spring frost. Move the young plants outside after the last frost, once hardened off.',
							'Outdoors, sow straight into the pot once all danger of frost has passed, in late spring or early summer.',
							'Sow about ½ in (1 cm) deep: the seeds germinate in the dark. Soaking them for a few hours or overnight first can help.',
							'Seedlings usually appear in seven to ten days and grow fast in warm weather.',
						)
					) .
					$p( 'If you buy small plug plants in spring, pot each one into a 3–3½ in (7–9 cm) pot and keep it in a bright, frost-free place, with the potting mix just moist, until it is time to plant out.' ) .

					$h2( 'Water and care' ) .
					$p( 'Nasturtiums grow fast without a deep root system, so pots, window boxes and baskets need regular watering all summer: they dry out very quickly. Pinch out the growing tips to make plants branch, and deadhead regularly for more flowers.' ) .
					$p( 'For climbing types, give them a support with narrow uprights, such as wire mesh, a metal obelisk or string, for the leaf stalks to twine around. Wear gloves when handling the plants: the RHS lists nasturtium as a skin allergen.' ) .

					$h2( 'Pick for the kitchen' ) .
					$p( 'The leaves, young flower buds, flowers and seeds are all edible and taste strongly peppery, so a few go a long way in a salad or pasta dish. Use whole flowers, or just the petals for a milder flavor. Pick young leaves, as older ones can be bitter, and pick flowers young, on a dry morning.' ) .
					$p( 'Only eat flowers you can identify with certainty. If a plant was not sold for culinary use, grow it on for at least three months to reduce the risk of pesticide residues, and only pick the later flowers. People prone to allergies, especially to pollen, should not eat flowers.' ) .

					$h2( 'Caterpillars and aphids' ) .
					$p( 'Cabbage white butterflies (in the UK, both the large and small whites) lay their eggs under nasturtium leaves, and the caterpillars can strip enough foliage to reduce flowering. Check the plants often and pick off eggs and young caterpillars by hand.' ) .
					$p( 'Aphids love nasturtiums, especially black bean aphids, also called blackfly. Ladybugs, hover flies, ground beetles, parasitic wasps and earwigs all eat them, so encourage these predators. Pinch out badly infested shoot tips or flower buds. Some gardeners grow nasturtiums to lure pests away from other crops, but the RHS says the evidence for this is limited.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting out before the last frost: the soft leaves and stems are very sensitive to frost.',
							'Fertilizing heavily or using rich potting mix: you get leaves instead of flowers.',
							'Forgetting to water baskets and window boxes: they dry out fast in summer.',
							'Missing the eggs under the leaves: check plants for caterpillars every few days.',
							'Putting a trailing variety in a small pot with no room to spill: match the type to the container.',
						)
					),
				'image_prompt' => 'Bushy nasturtium plants with round, shield-shaped, blue-green leaves on long stalks and bright orange, yellow and red trumpet-shaped spurred flowers spilling over a long terracotta window box on a sunny balcony railing, summer afternoon light.' . $photo_end,
				'pin_prompt'   => 'A hanging basket overflowing with trailing nasturtiums, round blue-green leaves and orange and scarlet flowers, hanging against a pale wall on a sunny patio, a few picked flowers and leaves on a plate below, photographed vertically.' . $pin_end,
			),
		),
	),
);
