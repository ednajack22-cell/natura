<?php
/**
 * Starter guides, batch 5: summer vegetables for a large pot or bag on a
 * balcony or patio (courgettes, French beans, peas and potatoes).
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS agrees; see design/sources/BACKYARD-HARVEST.md. Hardiness
 * ratings come from the RHS plant profiles listed. Months are for a
 * temperate climate such as the UK.
 *
 * General container advice is not repeated here: each guide links to the
 * pages that own watering, compost and seed saving.
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

$water_link   = '<a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>';
$compost_link = '<a href="/plant-care/compost-for-containers/">compost for containers</a>';
$seed_link    = '<a href="/plant-care/how-to-save-seeds-from-your-plants/">saving seed from your plants</a>';

return array(
	'name'   => __( 'Summer veg in pots', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'courgettes-in-pots'   => array(
				'title'        => 'How to Grow Courgettes in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'excerpt'      => 'One compact courgette plant in a container at least 45 cm (18 in) wide can keep a household supplied all summer, as long as it stands in a warm, sunny, sheltered spot. Raise it indoors in April or May, move it outside after the frosts, and cut the fruits small and often.',
				'facts'        => array(
					'short_name'     => 'Courgette',
					'botanical_name' => 'Cucurbita pepo',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, warm and out of the wind',
					'pot_size'       => 'At least 45 cm (18 in) wide, one plant per container',
					'hardiness'      => 'H2',
					'watering'       => 'Thirsty: keep the compost moist, possibly every day in hot spells',
					'harvest'        => 'July to October, at 10–12.5 cm (4–5 in) long',
					'season'         => 'Tender annual, sown in spring for a summer crop',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Pick a compact or bush variety; trailing kinds need far more room than a balcony can give.' ),
						array( 'point' => 'Give each plant its own container, 45 cm (18 in) across or more, or share a growing bag between two compact plants.' ),
						array( 'point' => 'Sow seeds on their edge indoors in April or early May at 18–21 °C (65–70 °F).' ),
						array( 'point' => 'Once the first fruits begin to swell, give a high-potash liquid feed every 10 to 14 days.' ),
						array( 'point' => 'Cut courgettes at 10–12.5 cm (4–5 in): forgotten fruits turn into marrows within days.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Astia (AGM)', 'note' => 'The RHS calls it a compact variety suitable for large containers, with slim, even fruits. Its RHS profile gives a height of 0.5–1 m and a spread of 1–1.5 m.' ),
						array( 'name' => 'Defender (AGM)', 'note' => 'Described by the RHS as very popular and an abundant cropper when picked regularly. Its RHS profile gives a spread of 0.5–1 m, but the RHS does not single it out for pots.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 45 cm (18 in) wide, with drainage holes', 'badge' => '', 'note' => 'One plant per container.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose or soil-based compost', 'badge' => '', 'note' => 'A growing bag also works for one or two compact plants.', 'url' => '' ),
						array( 'name' => 'Peat-free seed compost and 7.5 cm (3 in) pots', 'badge' => '', 'note' => 'For sowing indoors.', 'url' => '' ),
						array( 'name' => 'High-potash liquid fertiliser (tomato feed)', 'badge' => '', 'note' => 'Every 10–14 days once fruits start to swell.', 'url' => '' ),
						array( 'name' => 'Sharp knife or secateurs', 'badge' => '', 'note' => 'For a clean cut when harvesting.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How many courgette plants fit on a small balcony?', 'answer' => 'Usually one, or two compact plants sharing a growing bag. Even a compact variety can spread over a metre, and the RHS says a single plant can give three or four fruits a week in good weather, which is plenty for most households.' ),
						array( 'question' => 'Why do my baby courgettes go soft and rot at the tip?', 'answer' => 'In early summer this is normally down to cool weather: the flowers are poorly pollinated, so the tiny fruits fail. It usually sorts itself out once the weather warms up. Remove the failed fruits as you find them.' ),
						array( 'question' => 'Can I eat courgette flowers?', 'answer' => 'Yes. Take the male flowers, the ones on a plain stalk with no small fruit behind them, so the plant keeps producing courgettes. They can go into salads, or be fried or stuffed.' ),
						array( 'question' => 'Should I cut off courgette leaves?', 'answer' => 'Only the tatty ones and any covered in powdery mildew. Removing them lets sun reach the fruits and makes them easier to find.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						array( 'title' => 'RHS — Courgette \'Astia\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/265848/astia-agm/details' ),
						array( 'title' => 'RHS — Courgette \'Defender\'', 'url' => 'https://www.rhs.org.uk/plants/112370/defender-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Is a pot big enough for a courgette?' ) .
					$p( 'Yes, if you choose the right kind. Courgettes are vigorous, tender plants that sprawl over about a square metre in open ground. Bush and compact varieties stay tidier, and the RHS suggests them for large containers and growing bags when you have no soil to plant in.' ) .
					$p( 'Expect one plant to fill most of a small balcony corner with its broad, lobed leaves. In return it crops heavily over the summer, and the yellow flowers are edible too.' ) .

					$h2( 'What size container, and where to put it?' ) .
					$p( 'Use a container 45 cm (18 in) wide or more and plant a single courgette in the middle. Fill it with peat-free multi-purpose or soil-based compost; for more on mixes, see our guide to ' . $compost_link . '. A standard growing bag holds one compact plant, or two at a squeeze.' ) .
					$p( 'Courgettes want warmth, sun and shelter. A south- or west-facing corner shielded from the wind suits them, and leave room around the pot for the leaves to spread.' ) .

					$h2( 'Sowing courgettes indoors' ) .
					$list(
						array(
							'Sow in April or early May, so the plants are a good size by early summer.',
							'Push one seed on its edge, 13 mm (½ in) deep, into a 7.5 cm (3 in) pot of moist peat-free seed compost.',
							'Keep the pots at 18–21 °C (65–70 °F), in a heated propagator or on a sunny windowsill under a clear lid or plastic bag.',
							'Take the cover off as soon as the seedlings appear, and keep them in good light.',
						)
					) .
					$p( 'Raising them indoors gives more reliable germination and keeps the soft seedlings away from slugs and snails. In a warm area you can instead sow two or three seeds, 2.5 cm (1 in) deep, straight into the final container in late May or early June, cover them with a cloche or plastic-free fleece, and keep only the strongest seedling. Garden centres also sell young plants in late spring.' ) .

					$h2( 'Moving the plant outside' ) .
					$p( 'Courgettes cannot stand frost. Harden young plants off first, then plant them out in early summer, once the weather has warmed. Ease each plant out of its pot without breaking up the root ball, set it in the centre of its container, firm gently and water it in well.' ) .

					$h2( 'Watering and feeding a courgette in a pot' ) .
					$p( 'Courgettes drink a lot, especially in a container and once they start fruiting. Keep the compost evenly moist; in hot weather that can mean watering every day. Pour the water around the base rather than over the leaves, which helps keep powdery mildew away, and on hot days water early in the morning if you can, so less is lost to evaporation. Our guide to ' . $water_link . ' explains how to check a pot. A <a href="/diy-projects/make-a-bottle-watering-funnel/">bottle watering funnel</a> sunk beside the plant at planting time takes water straight down to the roots.' ) .
					$p( 'Plants in containers also need feeding. Once the first fruits begin to swell, give a high-potash liquid fertiliser such as tomato feed every 10 to 14 days.' ) .

					$h2( 'When to pick courgettes' ) .
					$p( 'They taste best small and tender, at about 10–12.5 cm (4–5 in) long. Cut them off with a knife or secateurs rather than twisting, so the plant is not damaged. Frequent picking keeps new fruits coming, and in good weather you may be cutting several a week from July into October. A fruit missed under the leaves soon swells into a marrow.' ) .
					$p( 'If you want flowers to eat, take the male ones. Female flowers have a small courgette behind them; leave those on the plant.' ) .

					$h2( 'Slugs, mildew and fruits that fail' ) .
					$p( 'Slugs and snails eat young plants, flowers and small fruits. Planting out a sturdy plant rather than a tiny seedling helps, and on mild, damp evenings you can pick them off by hand. The RHS also suggests watering in the morning rather than the evening, which gives them less help at night.' ) .
					$p( 'In a cool early summer, plants may set no fruit, or the tiny fruits may rot. This comes from poor pollination and usually stops when the weather warms. Later in the season, powdery mildew often whitens the older leaves: cut off the worst affected ones. Courgettes cross easily with other squashes, so saved seed is unreliable; see our guide to ' . $seed_link . '.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a trailing variety, which soon outgrows a balcony.',
							'Using a container narrower than 45 cm (18 in): it dries out too fast for such a thirsty plant.',
							'Planting out before the weather is warm: courgettes are tender and stall in the cold.',
							'Watering over the leaves in the evening, which invites mildew and slugs.',
							'Going away for a few days without asking someone to pick: the fruits turn into marrows and the plant slows down.',
						)
					),
				'image_prompt' => 'A compact bush courgette plant growing in a wide 50 cm charcoal-grey plastic container on a sunny patio of pale stone slabs, in midsummer. Very large, deeply lobed, dark green leaves with silvery mottling and prickly hollow stalks rise from a short central crown. Two bright yellow trumpet-shaped flowers are open, and three slim, glossy dark green courgettes about 12 cm long sit low among the stalks near the compost. A garden wall and a watering can softly blurred in the background, warm morning sunlight.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of a compact courgette plant in a wide grey container on a sunny patio, its big lobed dark green leaves spreading over the rim, a yellow trumpet flower open and slim green courgettes visible near the base. The container and plant fill the lower two thirds; the top third is a calm, softly blurred pale wall with empty space.' . $pin_end,
			),

			'french-beans-in-pots' => array(
				'title'        => 'How to Grow French Beans in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6, 7 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Dwarf French beans are one of the easiest crops for a pot: sow them 15 cm (6 in) apart in a container 30–45 cm (12–18 in) wide and they need no support at all. Climbing varieties crop for longer but want a much larger, heavier container and a wigwam of tall canes.',
				'facts'        => array(
					'short_name'     => 'French bean',
					'botanical_name' => 'Phaseolus vulgaris',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, warm and sheltered',
					'pot_size'       => 'Dwarf: 30–45 cm (12–18 in) wide. Climbing: at least 75 cm (30 in) wide and 45 cm (18 in) deep',
					'hardiness'      => 'H2',
					'watering'       => 'Regular, and more once flowers and pods form',
					'harvest'        => 'July to October; dwarf types start eight to ten weeks after sowing',
					'season'         => 'Tender annual, sown from late April to July',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Dwarf varieties grow to about 45 cm (18 in) and simply spill over the rim of the pot.' ),
						array( 'point' => 'Sow 5 cm (2 in) deep, indoors from late April or outside in the pot once frosts are over.' ),
						array( 'point' => 'Sow a fresh pot of dwarf beans every few weeks until midsummer: each batch only crops for a few weeks.' ),
						array( 'point' => 'From the first flowers, feed every fortnight with a high-potassium liquid fertiliser.' ),
						array( 'point' => 'Harvest pods at 15–20 cm (6–8 in), while they still snap cleanly and before the beans show through.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Boston (AGM)', 'note' => 'A dwarf bean the RHS describes as sturdy, about 45 cm tall, with long, tender pods.' ),
						array( 'name' => 'Sprite (AGM)', 'note' => 'Dwarf, with long, pencil-thin pods that are stringless and tender, according to the RHS.' ),
						array( 'name' => 'Purple Teepee', 'note' => 'A dwarf variety on the RHS list. Its dark purple pods are easy to spot among the leaves and turn green when cooked.' ),
						array( 'name' => 'Cobra (AGM)', 'note' => 'A climbing bean the RHS recommends for a heavy crop of stringless pods over a long period. Only for a very large container with tall canes.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 30–45 cm (12–18 in) wide, with drainage holes', 'badge' => '', 'note' => 'For dwarf beans.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose or loam-based compost', 'badge' => '', 'note' => 'Fresh compost for each sowing.', 'url' => '' ),
						array( 'name' => 'Bamboo canes, 2.5 m (8 ft)', 'badge' => '', 'note' => 'Only for climbing beans, tied into a wigwam.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertiliser (tomato feed)', 'badge' => '', 'note' => 'Every two weeks once flowering starts.', 'url' => '' ),
						array( 'name' => 'Plastic-free fleece or a cloche', 'badge' => '', 'note' => 'Protects early outdoor sowings.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Dwarf or climbing French beans: which is better in a container?', 'answer' => 'Dwarf beans, for most balconies. They need a pot only 30–45 cm (12–18 in) wide and no support, and they crop within eight to ten weeks. Climbing beans give pods for longer but need a container at least 75 cm (30 in) wide, heavy enough not to topple, and 2.5 m (8 ft) canes.' ),
						array( 'question' => 'How many French bean plants go in one pot?', 'answer' => 'Space dwarf beans about 15 cm (6 in) apart each way, so a pot 30–45 cm (12–18 in) across holds a small group. For climbing beans, keep one plant at the foot of each cane.' ),
						array( 'question' => 'Why have my French beans stopped producing pods?', 'answer' => 'Most often the pods were left on too long, or the compost dried out at flowering time. Pick every few days and keep the pot moist. Dwarf beans also have a short season, which is why a second sowing a few weeks later helps.' ),
						array( 'question' => 'Are French beans safe to eat raw?', 'answer' => 'No. The RHS warns that raw pods and beans are harmful if eaten, for people and for dogs, so always cook them.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — French bean \'Boston\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/252065/boston-agm/details' ),
						array( 'title' => 'RHS — French bean \'Sprite\'', 'url' => 'https://www.rhs.org.uk/plants/112383/sprite-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Dwarf or climbing: which beans suit a pot?' ) .
					$p( 'French beans come in two forms. Dwarf varieties are bushy, reach about 45 cm (18 in) and start cropping quickly, which makes them a natural fit for a balcony. Climbing varieties twine up to 2 m (6 ft); they take longer to start but then give pods from midsummer into early autumn if you keep picking.' ) .
					$p( 'Either type can grow in a container in a warm, sunny, sheltered spot. Dwarf beans are the simpler choice; climbers make sense if you have a large, sturdy container and want height on a patio.' ) .

					$h2( 'Choosing the container' ) .
					$list(
						array(
							'<strong>Dwarf beans:</strong> a pot 30–45 cm (12–18 in) wide. No canes are needed: the plants tumble over the edge.',
							'<strong>Climbing beans:</strong> a container at least 75 cm (30 in) wide and 45 cm (18 in) deep, heavy enough not to blow over once the beans are up their canes.',
						)
					) .
					$p( 'Fill it with peat-free multi-purpose or loam-based compost; our page on ' . $compost_link . ' covers the choice. On a windy balcony, stand a climbing bean container against a wall where the wigwam is sheltered.' ) .

					$h2( 'Sowing French beans' ) .
					$p( 'For the earliest pods, sow indoors from late April. Put one bean, 5 cm (2 in) deep, in each small pot or deep module of moist peat-free multi-purpose compost, and stand them in a propagator or on a warm, sunny windowsill. The seedlings grow fast in good light.' ) .
					$p( 'Or wait until the frosts are over, usually late May or early June, and sow straight into the final pot. Set dwarf bean seeds 5 cm (2 in) deep and 15 cm (6 in) apart. For climbers, push a wigwam of 2.5 m (8 ft) canes into the container first, sow two seeds at the foot of each cane, and remove the weaker seedling if both come up.' ) .
					$p( 'Dwarf beans only crop for a few weeks, so sow another pot every few weeks until midsummer for a longer supply. Our guide to <a href="/plant-care/succession-sowing-small-spaces/">succession sowing in a small space</a> explains how to plan it.' ) .

					$h2( 'Planting out young bean plants' ) .
					$p( 'Indoor-raised or bought plants go outside only after the last frost, once they have been hardened off. Water them well before and after planting, and space them 15 cm (6 in) apart. With climbing beans, put one plant at the base of each cane and loosely tie the shoot on to start it climbing.' ) .

					$h2( 'Water, feed and training' ) .
					$p( 'Beans are thirsty, and containers dry out quickly, so water regularly and more generously once the plants flower and set pods. For a routine that fits your pot, see ' . $water_link . '.' ) .
					$p( 'In a container, start feeding when the first flowers appear: a high-potassium liquid fertiliser such as tomato feed, every fortnight. Climbing beans need a little training: tie in any stems that come away from the canes, especially in wind, and pinch out the tops once they reach the top of the support. That encourages side-shoots lower down and keeps the crop within reach.' ) .

					$h2( 'Picking French beans' ) .
					$p( 'Pick the pods when they are 15–20 cm (6–8 in) long, snap easily and the beans inside cannot yet be seen as bumps. Look carefully, as green pods hide well among the leaves. Picking often makes the plant produce more; dwarf beans give several weeks of pods, climbers much longer. Always cook French beans: the RHS warns that raw pods and beans are harmful.' ) .
					$p( 'French bean flowers pollinate themselves, so seed saved from them usually comes true. Our guide to ' . $seed_link . ' explains how to dry and store it.' ) .

					$h2( 'Pests to look out for' ) .
					$p( 'French beans are generally trouble-free. Slugs and snails go for seedlings and young plants, so check on damp evenings and remove them by hand. Black aphids (blackfly) can cluster on the shoot tips; see <a href="/problems/aphids-container-plants/">aphids on container plants</a>. If flowers fall without forming pods, our page on <a href="/problems/flowers-dropping-off/">flowers dropping off</a> goes through the causes.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing outdoors before the frosts are over: beans are tender and the seed sits in cold compost.',
							'Growing climbing beans in a light pot that topples once the wigwam fills with leaves.',
							'Letting the compost dry out while the plants are flowering.',
							'Leaving pods to get long and lumpy, which stops new ones forming.',
							'Making a single sowing of dwarf beans and expecting pods all summer.',
						)
					),
				'image_prompt' => 'A round 40 cm terracotta pot on a sunny balcony floor holding a group of bushy dwarf French bean plants about 40 cm tall, in midsummer. Each leaf is made of three broad, pointed, mid-green leaflets. Small white flowers are visible, and slender, smooth, pencil-thin green pods about 15 cm long hang in bunches, some spilling over the rim of the pot. No canes. A metal balcony railing and a few other pots softly blurred behind, bright afternoon light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of dwarf French bean plants in a terracotta pot on a sunny balcony, slim green pods hanging over the rim among three-part leaves and small white flowers. The pot fills the lower two thirds of the frame; the top third is a soft, out-of-focus pale sky and railing with empty space.' . $pin_end,
			),

			'peas-in-pots'         => array(
				'title'        => 'How to Grow Peas in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6 ),
					'plant'   => array( 3, 4 ),
					'harvest' => array( 6, 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Peas crop best in the ground, but dwarf varieties and quick mangetouts do well enough in a container 45 cm (18 in) wide in a sunny, sheltered spot. Sow seeds 7.5 cm (3 in) apart from March, give them twiggy sticks to climb, and expect a modest but very sweet harvest.',
				'facts'        => array(
					'short_name'     => 'Pea',
					'botanical_name' => 'Pisum sativum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, sheltered',
					'pot_size'       => 'At least 45 cm (18 in) wide',
					'hardiness'      => 'H2',
					'watering'       => 'Regular; a container dries out fast, especially in flower',
					'harvest'        => 'June to October, depending on sowing date and type',
					'season'         => 'Sown from late winter to early summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Mangetouts and sugarsnaps are the easiest peas and are eaten pod and all, so nothing is wasted.' ),
						array( 'point' => 'Choose a dwarf or short variety for a pot; tall ones can reach 1.8 m (6 ft).' ),
						array( 'point' => 'Sow 5 cm (2 in) deep and 7.5 cm (3 in) apart once the compost is about 10 °C (50 °F), or start them indoors in February or March.' ),
						array( 'point' => 'Push in twiggy sticks, canes or a strip of chicken wire when you sow or plant.' ),
						array( 'point' => 'Feed fortnightly with a high-potassium liquid feed from the first flowers, and keep picking.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Delikett (AGM)', 'note' => 'A sugarsnap pea with an RHS Award of Garden Merit. Its RHS plant page gives a height of 1–1.5 m (3–5 ft), so give it tall supports. Eat the whole pods, or leave them to mature and shell the peas.' ),
						array( 'name' => 'Cascadia (AGM)', 'note' => 'A sugarsnap the RHS describes as quick to mature and fairly compact, with short, tasty pods.' ),
						array( 'name' => 'Kelvedon Wonder (AGM)', 'note' => 'A first early garden pea for shelling, according to the RHS; it can also be grown as a maincrop.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 45 cm (18 in) wide, with drainage holes', 'badge' => '', 'note' => 'A wide trough works well for a short row.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For the container and for indoor sowing.', 'url' => '' ),
						array( 'name' => 'Twiggy pea sticks, short canes or chicken wire', 'badge' => '', 'note' => 'Peas climb with tendrils and need something thin to grip.', 'url' => '' ),
						array( 'name' => 'High-potassium organic liquid feed', 'badge' => '', 'note' => 'Every two weeks once flowering starts.', 'url' => '' ),
						array( 'name' => 'Fine netting', 'badge' => '', 'note' => 'Keeps pigeons off if they visit your balcony.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Mangetout, sugarsnap or garden peas: which should I sow in a pot?', 'answer' => 'Mangetout or sugarsnap. The RHS says they are the easiest peas to grow and tend to crop more heavily. You eat the whole pod, which matters when a container only holds a few plants. Garden peas need shelling, so the same pot gives you less to eat.' ),
						array( 'question' => 'When are mangetout and sugarsnap pods ready?', 'answer' => 'At about 7.5 cm (3 in) long, just as the peas inside start to form. Garden peas for shelling are ready when the pods look well filled. The lowest pods ripen first, so start picking at the bottom.' ),
						array( 'question' => 'What is the white powder on my pea leaves?', 'answer' => 'Probably powdery mildew. It is more likely when the compost in a pot dries out, so water regularly and pour the water onto the compost, not the leaves. Some varieties, such as \'Jaguar\', are listed by the RHS for their resistance.' ),
						array( 'question' => 'Can I pick pea shoots from plants grown for pods?', 'answer' => 'A few. The tips of young plants taste of fresh peas, but taking many from each plant reduces the crop.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						array( 'title' => 'RHS — Pea \'Cascadia\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/163112/cascadia-agm/details' ),
						array( 'title' => 'RHS — Pea \'Delikett\'', 'url' => 'https://www.rhs.org.uk/plants/163113/delikett-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Which peas grow well in a container?' ) .
					$p( 'The RHS is honest about peas: they do best in the ground, and a container only holds a few plants, so the harvest is small. Still, a pot of peas picked minutes before eating is a treat, and the right type makes the most of the space.' ) .
					$p( 'There are three kinds. Garden peas are shelled. Mangetouts have flat, stringless pods and sugarsnaps have fleshy, rounded ones; both are eaten whole and picked before the peas mature. For a pot, go for a dwarf or short variety, ideally a mangetout or sugarsnap. Tall varieties reach 1.8 m (6 ft) and become top-heavy.' ) .

					$h2( 'Earlies or maincrop?' ) .
					$p( 'Peas are sold as first earlies, second earlies or maincrops. The earlier the type, the shorter the plant and the sooner it crops: the RHS gives about 12 weeks from sowing for first earlies, 13–14 for second earlies and 14–16 for maincrops. Among garden peas, smooth-seeded varieties are hardier and suit the first sowings, while wrinkled ones are sweeter and are sown from late spring.' ) .

					$h2( 'Pot size and position' ) .
					$p( 'A pea container needs to be 45 cm (18 in) across or more. Holes in the base are essential, and peat-free multi-purpose compost suits peas well (our page on ' . $compost_link . ' goes into detail). Peas like a sunny, sheltered spot, and they grow well in a cool spring.' ) .

					$h2( 'Sowing peas, indoors or straight in the pot' ) .
					$p( '<strong>In the container.</strong> From March, once the compost has warmed to about 10 °C (50 °F), sow the seeds 5 cm (2 in) deep and 7.5 cm (3 in) apart. Do not sow into very wet compost, where seed can rot. Set the supports in at the same time.' ) .
					$p( '<strong>Indoors.</strong> In February or March, sow into deep modules, small pots or cardboard toilet-roll tubes of peat-free multi-purpose compost, about 5 cm (2 in) deep: one seed per tube or module, up to three per pot. This is safer from mice, which dig up newly sown peas. Keep the seedlings in good light, harden them off, and plant them out 7.5 cm (3 in) apart in March or April, once they are about 20 cm (8 in) tall. Peas resent root disturbance; to sow a whole row in one piece, see how to <a href="/diy-projects/sow-peas-in-a-gutter/">sow peas in a gutter</a>.' ) .
					$p( 'Sow a small batch every few weeks until June, or sow an early and a maincrop variety together, for pods over a longer period.' ) .

					$h2( 'Supports for peas in a pot' ) .
					$p( 'Peas climb with fine tendrils. Apart from the shortest dwarf types, they need something to scramble up: twiggy pea sticks pushed in between the plants, short bamboo canes, or a cylinder of chicken wire inside the rim. Check the height on the seed packet and make the support at least that tall and firmly anchored, especially on a windy balcony.' ) .

					$h2( 'Watering and feeding' ) .
					$p( 'Compost in a container can dry out quickly, so regular watering is essential; general advice is in ' . $water_link . '. Give a thorough soak when the plants start to flower and again two weeks later, which helps the pods fill. Aim the water at the compost and keep the leaves dry, as damp foliage and dry roots both encourage powdery mildew.' ) .
					$p( 'Peas in a container also benefit from feeding: from the first flowers, use a high-potassium organic liquid feed such as tomato feed once a fortnight.' ) .

					$h2( 'Harvesting, and what can go wrong' ) .
					$p( 'Pick mangetouts and sugarsnaps at about 7.5 cm (3 in), just as the peas begin to form, and garden peas once the pods are plump. Plants crop for several weeks, starting at the bottom. Keep picking: if pods are left to mature, the plants stop flowering. Peas are sweetest eaten straight away.' ) .
					$p( 'Pests are the main worry. Mice take freshly sown seed, slugs and snails eat seedlings, and pigeons strip the leaves, so a light net over the container may be needed. Pea moth caterpillars feed inside the pods, so check them as you shell. To keep seed for next year, see ' . $seed_link . '. For pea shoots grown in a tray and cut young, see our guide to <a href="/plants/microgreens-on-a-windowsill/">microgreens on a windowsill</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a tall maincrop that grows far beyond its support.',
							'Sowing into cold, soggy compost, where the seed rots before it sprouts.',
							'Leaving the support until the plants flop over.',
							'Letting the pot dry out at flowering, which brings small pods and mildew.',
							'Leaving pods to fatten on the plant, which ends the crop early.',
						)
					),
				'image_prompt' => 'A wide rectangular wooden trough on a sunny balcony in early summer, planted with a short row of dwarf sugarsnap pea plants about 60 cm tall climbing a cluster of twiggy hazel pea sticks. Pale blue-green paired oval leaflets, large leafy stipules and fine curling tendrils gripping the twigs. Small white butterfly-shaped flowers and several plump, rounded, bright green pods about 7 cm long hanging low on the plants. A balcony railing and soft city background blurred, morning light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of dwarf sugarsnap peas climbing twiggy sticks in a wooden trough on a sunny balcony, white flowers and plump green pods hanging among blue-green leaves and curling tendrils. The trough and plants fill the lower two thirds; the top third is a calm, softly blurred pale sky with empty space.' . $pin_end,
			),

			'potatoes-in-bags'     => array(
				'title'        => 'How to Grow Potatoes in Bags and Sacks',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'plant'   => array( 3, 4 ),
					'harvest' => array( 6, 7, 8 ),
				),
				'excerpt'      => 'Early potatoes grow well in a grow bag, sack or tub at least 30 cm (12 in) wide and deep, with one seed potato for every 30 cm (12 in) of width. Start the bag half full, top it up with compost as the shoots grow, and tip it out for new potatoes from June.',
				'facts'        => array(
					'short_name'     => 'Potato',
					'botanical_name' => 'Solanum tuberosum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, open and frost-free',
					'pot_size'       => 'Bag, sack or pot at least 30 cm (12 in) wide and deep; one seed potato per 30 cm (12 in) of width',
					'hardiness'      => 'H2',
					'watering'       => 'Regular through the season, even after rain',
					'harvest'        => 'First earlies June–July, second earlies July–August',
					'season'         => 'Planted late March to April',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Grow early varieties: the plants are smaller and ready sooner than maincrops.' ),
						array( 'point' => 'Buy certified virus-free seed potatoes, and chit earlies in a cool, bright, frost-free place for four to six weeks if you can.' ),
						array( 'point' => 'Put 15 cm (6 in) of peat-free multi-purpose compost in the bag, set the seed potatoes just below the surface, then keep adding compost as they grow.' ),
						array( 'point' => 'Keep shoots safe from frost: move the bag under cover or cover the plants on cold nights.' ),
						array( 'point' => 'Harvest earlies when the flowers open or the buds drop; the tubers should be about the size of a hen\'s egg.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Sharpe\'s Express (AGM)', 'note' => 'A first early the RHS lists as suitable for containers, with smooth skin and pale flesh.' ),
						array( 'name' => 'Casablanca (AGM)', 'note' => 'A first early the RHS lists as suitable for containers; good for chipping, baking or boiling.' ),
						array( 'name' => 'Charlotte (AGM)', 'note' => 'A popular second early salad potato with yellow tubers, recommended by the RHS.' ),
					),
					'products'   => array(
						array( 'name' => 'Potato grow bag or sack, or a pot at least 30 cm (12 in) wide and deep', 'badge' => '', 'note' => 'Some bags have a flap near the base for harvesting.', 'url' => '' ),
						array( 'name' => 'Certified seed potatoes (early variety)', 'badge' => '', 'note' => 'Not supermarket potatoes.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Enough to fill the bag almost to the rim over the season.', 'url' => '' ),
						array( 'name' => 'Organic general-purpose fertiliser or organic liquid feed', 'badge' => '', 'note' => 'Mix in at planting, or feed once the compost runs low.', 'url' => '' ),
						array( 'name' => 'Egg boxes or a seed tray', 'badge' => '', 'note' => 'For chitting.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How many seed potatoes go in one bag?', 'answer' => 'One for every 30 cm (12 in) of width. A bag or pot 30 cm across takes one seed potato; a wider bag takes more.' ),
						array( 'question' => 'Do I have to chit seed potatoes?', 'answer' => 'No. Chitting gives early varieties a head start, so they crop a few weeks sooner, but unchitted tubers still grow well. There is little point chitting maincrops.' ),
						array( 'question' => 'Can I use an old compost bag to grow potatoes?', 'answer' => 'Yes. The RHS suggests reusing old sacks or large compost bags, as long as you pierce holes in the bottom so extra water can drain out.' ),
						array( 'question' => 'Are green potatoes safe to eat?', 'answer' => 'No. Potatoes turn green when light reaches them and are then potentially poisonous, so throw green ones away. Keeping the tubers covered with compost as the plant grows prevents it.' ),
						array( 'question' => 'Can I grow potatoes for Christmas in a bag?', 'answer' => 'Yes, with prepared, cold-stored seed potatoes planted in July or early August. Keep the container in a greenhouse or another bright, frost-free place, which also protects the plants from blight.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow potatoes', 'url' => 'https://www.rhs.org.uk/vegetables/potatoes/grow-your-own' ),
						array( 'title' => 'RHS — Potato \'Sharpe\'s Express\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/199780/sharpes-express-agm/details' ),
						array( 'title' => 'RHS — Potato \'Casablanca\'', 'url' => 'https://www.rhs.org.uk/plants/301266/casablanca-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why grow potatoes in a bag?' ) .
					$p( 'Potatoes usually need a whole row in a vegetable plot, but a few plants in a large container give a decent crop of new potatoes. Harvesting is easy too: you tip the bag out and pick up the tubers, with no fork to spear them.' ) .
					$p( 'Early varieties are the ones to grow. They make smaller plants, mature faster, and are lifted by midsummer. Blight is also less likely to affect them, and it is less common in dry summers.' ) .

					$h2( 'What to grow them in' ) .
					$p( 'Any container at least 30 cm (12 in) wide and deep will do. Purpose-made potato grow bags and sacks work well, and some have a flap near the base so you can reach in for a few tubers. An old sack or a large, empty compost bag can be reused, but make drainage holes in the bottom first. Stand it in full sun, in an open spot where late frosts do not linger.' ) .

					$h2( 'Seed potatoes and chitting' ) .
					$p( 'Start from certified virus-free seed potatoes, sold in late winter and spring; mail-order suppliers have the widest range. Chitting means letting the tubers sprout before planting. It is optional, but it brings early varieties on a few weeks sooner.' ) .
					$p( 'Stand the seed potatoes in egg boxes or a seed tray, with the end that has most buds (eyes) facing up, in a cool, bright, frost-free room. Start in late January in a mild area, or up to early March somewhere colder. After four to six weeks the shoots should be about 5 cm (2 in) long.' ) .

					$h2( 'Planting a potato bag step by step' ) .
					$list(
						array(
							'Plant first earlies around late March and second earlies in early to mid-April, a little later in cold areas.',
							'Put about 15 cm (6 in) of peat-free multi-purpose compost in the bottom of the bag, so it is roughly half full.',
							'Lay one seed potato per 30 cm (12 in) of width on the compost, shoots upwards, and cover it so it sits just below the surface.',
							'Water well, then keep the compost moist but not soggy.',
						)
					) .
					$p( 'Potatoes in containers need feeding. Either mix an organic general-purpose fertiliser into the compost at planting, or start an organic liquid feed when the compost runs short of nutrients; with many peat-free multi-purpose composts that is after about six weeks. For general advice on refreshing old compost, see ' . $compost_link . '.' ) .

					$h2( 'Topping up as the shoots grow' ) .
					$p( 'In the ground, potatoes are earthed up: soil is drawn over the stems so the new tubers stay in the dark. In a bag you do the same with compost. Each time the shoots poke well above the surface, add more compost around them, and keep going until the level is just below the rim. Tubers that see the light turn green and should not be eaten.' ) .
					$p( 'Young shoots are easily damaged by frost in April and May. Keep a bag in a frost-free place such as a greenhouse or porch until the frosts are over, or, if a cold night is forecast, cover the shoots with a cloche, hessian, straw or more compost.' ) .

					$h2( 'Watering a potato bag' ) .
					$p( 'Water regularly through the whole season. The leaves form a canopy that sheds rain over the edge of the bag, so the compost can stay dry even after a wet day; check it with your finger. Our guide to ' . $water_link . ' has a simple routine.' ) .

					$h2( 'Harvesting new potatoes' ) .
					$p( 'First earlies are usually ready in June and July, second earlies in July and August. A good sign is when the plants flower or the flower buds drop. Scrape back a little compost to look: the tubers should be about the size of a hen\'s egg. If they are still small, cover them up and wait.' ) .
					$p( 'When they are ready, tip the bag onto a sheet or into a wheelbarrow and gather the potatoes by hand, discarding any green ones. Collect every tuber, as any left behind can sprout and carry disease. New potatoes taste best eaten soon after lifting.' ) .
					$p( 'Some slugs live underground and tunnel into tubers, mostly maincrops in damp autumn weather. If the leaves develop fast-spreading brown, watery patches in warm, wet weather, see <a href="/problems/tomato-blight/">tomato and potato blight</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting potatoes from the supermarket instead of certified seed potatoes.',
							'Filling the bag to the top at planting time, which leaves no room to cover the stems later.',
							'Assuming rain has watered the bag: the leaves often keep it off.',
							'Leaving young shoots out on a frosty night.',
							'Eating potatoes that have turned green.',
						)
					),
				'image_prompt' => 'A tall dark green fabric potato grow bag about 40 cm wide standing on a sunny patio in early summer, its sides rolled to just below the rim and filled with dark peat-free compost. A bushy potato plant grows from it: upright green stems with matt, mid-green compound leaves made of oval leaflets, and a few clusters of small white star-shaped flowers with yellow centres. Beside the bag, a handful of freshly harvested small cream-skinned new potatoes rest on the compost-dusted paving. Soft background of a brick wall, warm morning light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of a potato plant in flower growing in a green fabric grow bag on a sunny patio, with small white star-shaped flowers and a few freshly dug new potatoes beside the bag. The bag and plant fill the lower two thirds of the frame; the top third is a calm, softly blurred brick wall with empty space.' . $pin_end,
			),
		),
	),
);
