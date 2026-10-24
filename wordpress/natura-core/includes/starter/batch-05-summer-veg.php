<?php
/**
 * Starter guides, batch 5: summer vegetables for a large pot or bag on a
 * balcony or patio (zucchini, green beans, peas and potatoes).
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS agrees; see design/sources/BACKYARD-HARVEST.md. Hardiness
 * ratings come from the RHS plant profiles listed. Timing (weeks from the
 * reader's last spring frost, days to harvest) comes from the US extension
 * pages listed in each guide (checked 18 October 2026). The 'months' data
 * is the UK calendar.
 *
 * General container advice is not repeated here: each guide links to the
 * pages that own watering, potting mix and seed saving.
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

$csu_guide = array(
	'title' => 'Colorado State University Extension — Vegetable planting guide',
	'url'   => 'https://extension.colostate.edu/resource/vegetable-planting-guide/',
);

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

$water_link   = '<a href="/how-often-to-water-container-plants/">how often to water container plants</a>';
$compost_link = '<a href="/potting-mix-for-containers/">potting mix for containers</a>';
$seed_link    = '<a href="/how-to-save-seeds-from-your-plants/">saving seed from your plants</a>';

return array(
	'name'   => __( 'Summer veg in pots', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'zucchini-in-pots'   => array(
				'title'        => 'How to Grow Zucchini in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( 0, 0 ),
					'harvest_days' => array( 50, 50 ),
				),
				'excerpt'      => 'One compact zucchini plant in a container at least 18 in (45 cm) wide can keep a household supplied all summer, as long as it stands in a warm, sunny, sheltered spot. Sow it around your last spring frost, or start it indoors a couple of weeks before it can go out, and cut the fruits small and often.',
				'facts'        => array(
					'short_name'     => 'Zucchini',
					'botanical_name' => 'Cucurbita pepo',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, warm and out of the wind',
					'pot_size'       => 'At least 18 in (45 cm) wide, one plant per container',
					'hardiness'      => 'H2',
					'watering'       => 'Thirsty: keep the potting mix moist, possibly every day in hot spells',
					'harvest'        => 'Midsummer into fall, at 4–5 in (10–12.5 cm) long',
					'season'         => 'Tender annual, sown in spring for a summer crop',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Pick a compact or bush variety; trailing kinds need far more room than a balcony can give.' ),
						array( 'point' => 'Give each plant its own container, 18 in (45 cm) across or more, or share a grow bag between two compact plants.' ),
						array( 'point' => 'Sow seeds on their edge indoors at 65–70 °F (18–21 °C), only 2–3 weeks before the plants can go outside.' ),
						array( 'point' => 'Once the first fruits begin to swell, give a high-potash liquid fertilizer every 10 to 14 days.' ),
						array( 'point' => 'Cut zucchini at 4–5 in (10–12.5 cm): forgotten fruits turn into huge, tough marrows within days.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Astia (AGM)', 'note' => 'The RHS calls it a compact variety suitable for large containers, with slim, even fruits. Its RHS profile gives a height of about 1½–3 ft (0.5–1 m) and a spread of 3–5 ft (1–1.5 m).' ),
						array( 'name' => 'Defender (AGM)', 'note' => 'Described by the RHS as very popular and an abundant cropper when picked regularly. Its RHS profile gives a spread of about 1½–3 ft (0.5–1 m), but the RHS does not single it out for pots.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 18 in (45 cm) wide, with drainage holes', 'badge' => '', 'note' => 'One plant per container.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'badge' => '', 'note' => 'A grow bag also works for one or two compact plants.', 'url' => '' ),
						array( 'name' => 'Peat-free seed-starting mix and 3 in (7.5 cm) pots', 'badge' => '', 'note' => 'For starting seeds indoors.', 'url' => '' ),
						array( 'name' => 'High-potash liquid fertilizer (tomato fertilizer)', 'badge' => '', 'note' => 'Every 10–14 days once fruits start to swell.', 'url' => '' ),
						array( 'name' => 'Sharp knife or pruners', 'badge' => '', 'note' => 'For a clean cut when harvesting.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How many zucchini plants fit on a small balcony?', 'answer' => 'Usually one, or two compact plants sharing a grow bag. Even a compact variety can spread over 3 ft (1 m), and the RHS says a single plant can give three or four fruits a week in good weather, which is plenty for most households.' ),
						array( 'question' => 'Why do my baby zucchini go soft and rot at the tip?', 'answer' => 'In early summer this is normally down to cool weather: the flowers are poorly pollinated, so the tiny fruits fail. It usually sorts itself out once the weather warms up. Remove the failed fruits as you find them.' ),
						array( 'question' => 'Can I eat zucchini flowers?', 'answer' => 'Yes. Take the male flowers, the ones on a plain stalk with no small fruit behind them, so the plant keeps producing zucchini. They can go into salads, or be fried or stuffed.' ),
						array( 'question' => 'Should I cut off zucchini leaves?', 'answer' => 'Only the tatty ones and any covered in powdery mildew. Removing them lets sun reach the fruits and makes them easier to find.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						array( 'title' => 'RHS — Courgette \'Astia\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/265848/astia-agm/details' ),
						array( 'title' => 'RHS — Courgette \'Defender\'', 'url' => 'https://www.rhs.org.uk/plants/112370/defender-agm/details' ),
						array( 'title' => 'RHS — Cucumber mosaic virus', 'url' => 'https://www.rhs.org.uk/disease/cucumber-mosaic-virus' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$csu_guide,
						array( 'title' => 'University of Minnesota Extension — Growing summer squash and zucchini', 'url' => 'https://extension.umn.edu/vegetables/growing-summer-squash-and-zucchini' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Is a pot big enough for a zucchini?' ) .
					$p( 'Yes, if you choose the right kind. Zucchini are vigorous, tender plants that sprawl over about 10 sq ft (1 square meter) in open ground. Bush and compact varieties stay tidier, and the RHS suggests them for large containers and grow bags when you have no soil to plant in.' ) .
					$p( 'Expect one plant to fill most of a small balcony corner with its broad, lobed leaves. In return it crops heavily over the summer, and the yellow flowers are edible too.' ) .

					$h2( 'What size container, and where to put it?' ) .
					$p( 'Use a container 18 in (45 cm) wide or more and plant a single zucchini in the middle. A peat-free all-purpose or soil-based potting mix suits it; for more on mixes, see our guide to ' . $compost_link . '. A standard grow bag holds one compact plant, or two at a squeeze.' ) .
					$p( 'Zucchini want warmth, sun and shelter. A south- or west-facing corner shielded from the wind suits them, and leave room around the pot for the leaves to spread.' ) .

					$h2( 'When and how to sow zucchini' ) .
					$p( 'Colorado State University Extension puts summer squash, zucchini included, among the tender crops you can sow from seed around your average last spring frost date. The University of Minnesota Extension adds a useful check: wait until the soil is at least 70 °F (21 °C) 2 in (5 cm) down. Sow two or three seeds, 1 in (2.5 cm) deep, straight into the final container, cover them with a cloche or row cover, and keep only the strongest seedling.' ) .
					$p( 'Starting seeds indoors gives more reliable germination and keeps the soft seedlings away from slugs and snails, but squash roots dislike being disturbed. Colorado State University Extension advises using small, young transplants no more than 2–3 weeks from seeding, so start them only a couple of weeks before the plants can go outside:' ) .
					$list(
						array(
							'Push one seed on its edge, ½ in (13 mm) deep, into a 3 in (7.5 cm) pot of moist peat-free seed-starting mix.',
							'Keep the pots at 65–70 °F (18–21 °C), on a heat mat or on a sunny windowsill under a clear lid or plastic bag.',
							'Take the cover off as soon as the seedlings appear, and keep them in good light.',
						)
					) .
					$p( 'Garden centers also sell young plants in late spring.' ) .

					$h2( 'Moving the plant outside' ) .
					$p( 'Zucchini cannot stand frost. Harden young plants off first, then plant them out once all danger of frost has passed and the weather has warmed. Ease each plant out of its pot without breaking up the root ball, set it in the center of its container, firm gently and water it in well.' ) .

					$h2( 'Watering and feeding a zucchini in a pot' ) .
					$p( 'Zucchini drink a lot, especially in a container and once they start fruiting. Keep the potting mix evenly moist; in hot weather that can mean watering every day. Pour the water around the base rather than over the leaves, which helps keep powdery mildew away, and on hot days water early in the morning if you can, so less is lost to evaporation. Our guide to ' . $water_link . ' explains how to check a pot. A <a href="/diy-projects/make-a-bottle-watering-funnel/">bottle watering funnel</a> sunk beside the plant at planting time takes water straight down to the roots.' ) .
					$p( 'Plants in containers also need feeding. Once the first fruits begin to swell, give a high-potash liquid fertilizer such as tomato fertilizer every 10 to 14 days.' ) .

					$h2( 'When to pick zucchini' ) .
					$p( 'Colorado State University Extension gives about 50 days from sowing to a typical first harvest. Zucchini taste best small and tender, at about 4–5 in (10–12.5 cm) long. Cut them off with a knife or pruners rather than twisting, so the plant is not damaged. Frequent picking keeps new fruits coming, and in good weather you may be cutting several a week from midsummer into fall. A fruit missed under the leaves soon swells into a large, tough marrow.' ) .
					$p( 'If you want flowers to eat, take the male ones. Female flowers have a small zucchini behind them; leave those on the plant.' ) .

					$h2( 'Slugs, mildew and fruits that fail' ) .
					$p( 'Slugs and snails eat young plants, flowers and small fruits. Planting out a sturdy plant rather than a tiny seedling helps, and on mild, damp evenings you can pick them off by hand. The RHS also suggests watering in the morning rather than the evening, which gives them less help at night.' ) .
					$p( 'In a cool early summer, plants may set no fruit, or the tiny fruits may rot. This comes from poor pollination and usually stops when the weather warms. Later in the season, powdery mildew often whitens the older leaves: cut off the worst affected ones. A plant with yellow-mottled, crinkled leaves, stunted growth and lumpy fruit is a different matter: that points to <a href="/problems/cucumber-mosaic-virus/">cucumber mosaic virus</a>, spread by aphids, and the plant cannot be cured. Zucchini cross easily with other squashes, so saved seed is unreliable; see our guide to ' . $seed_link . '.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a trailing variety, which soon outgrows a balcony.',
							'Using a container narrower than 18 in (45 cm): it dries out too fast for such a thirsty plant.',
							'Planting out before the weather is warm: zucchini are tender and stall in the cold.',
							'Watering over the leaves in the evening, which invites mildew and slugs.',
							'Going away for a few days without asking someone to pick: the fruits turn into marrows and the plant slows down.',
						)
					),
				'image_prompt' => 'A compact bush zucchini plant growing in a wide 20 in (50 cm) charcoal-gray plastic container on a sunny patio of pale stone slabs, in midsummer. Very large, deeply lobed, dark green leaves with silvery mottling and prickly hollow stalks rise from a short central crown. Two bright yellow trumpet-shaped flowers are open, and three slim, glossy dark green zucchini about 5 in (12 cm) long sit low among the stalks near the potting mix. A garden wall and a watering can softly blurred in the background, warm morning sunlight.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of a compact zucchini plant in a wide gray container on a sunny patio, its big lobed dark green leaves spreading over the rim, a yellow trumpet flower open and slim green zucchini visible near the base. The container and plant fill the lower two thirds; the top third is a calm, softly blurred pale wall with empty space.' . $pin_end,
			),

			'green-beans-in-pots' => array(
				'title'        => 'How to Grow Green Beans in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6, 7 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( 0, 0 ),
					'harvest_days' => array( 60, 60 ),
				),
				'excerpt'      => 'Bush beans are one of the easiest crops for a pot: sow them 6 in (15 cm) apart in a container 12–18 in (30–45 cm) wide and they need no support at all. Pole beans crop for longer but want a much larger, heavier container and a teepee of tall stakes.',
				'facts'        => array(
					'short_name'     => 'Green bean',
					'botanical_name' => 'Phaseolus vulgaris',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, warm and sheltered',
					'pot_size'       => 'Bush: 12–18 in (30–45 cm) wide. Pole: at least 30 in (75 cm) wide and 18 in (45 cm) deep',
					'hardiness'      => 'H2',
					'watering'       => 'Regular, and more once flowers and pods form',
					'harvest'        => 'Midsummer into fall; bush types start about 60 days after sowing',
					'season'         => 'Tender annual, sown from around the last spring frost to midsummer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Bush varieties grow to about 18 in (45 cm) and simply spill over the rim of the pot.' ),
						array( 'point' => 'Sow 2 in (5 cm) deep in the pot around your last spring frost date, once the weather has warmed.' ),
						array( 'point' => 'Sow a fresh pot of bush beans every few weeks until midsummer: each batch only crops for a few weeks.' ),
						array( 'point' => 'From the first flowers, feed every two weeks with a high-potassium liquid fertilizer.' ),
						array( 'point' => 'Harvest pods at 6–8 in (15–20 cm), while they still snap cleanly and before the beans show through.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Boston (AGM)', 'note' => 'A dwarf (bush) bean the RHS describes as sturdy, about 18 in (45 cm) tall, with long, tender pods.' ),
						array( 'name' => 'Sprite (AGM)', 'note' => 'Dwarf, with long, pencil-thin pods that are stringless and tender, according to the RHS.' ),
						array( 'name' => 'Purple Teepee', 'note' => 'A dwarf variety on the RHS list. Its dark purple pods are easy to spot among the leaves and turn green when cooked.' ),
						array( 'name' => 'Cobra (AGM)', 'note' => 'A climbing (pole) bean the RHS recommends for a heavy crop of stringless pods over a long period. Only for a very large container with tall stakes.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 12–18 in (30–45 cm) wide, with drainage holes', 'badge' => '', 'note' => 'For bush beans.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'badge' => '', 'note' => 'Fresh potting mix for each sowing.', 'url' => '' ),
						array( 'name' => 'Bamboo stakes, 8 ft (2.5 m)', 'badge' => '', 'note' => 'Only for pole beans, tied into a teepee.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertilizer (tomato fertilizer)', 'badge' => '', 'note' => 'Every two weeks once flowering starts.', 'url' => '' ),
						array( 'name' => 'Row cover or a cloche', 'badge' => '', 'note' => 'Protects early outdoor sowings.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Bush or pole beans: which is better in a container?', 'answer' => 'Bush beans, for most balconies. They need a pot only 12–18 in (30–45 cm) wide and no support, and they crop within about eight to ten weeks. Pole beans give pods for longer but need a container at least 30 in (75 cm) wide, heavy enough not to topple, and 8 ft (2.5 m) stakes.' ),
						array( 'question' => 'How many green bean plants go in one pot?', 'answer' => 'Space bush beans about 6 in (15 cm) apart each way, so a pot 12–18 in (30–45 cm) across holds a small group. For pole beans, keep one plant at the foot of each stake.' ),
						array( 'question' => 'Why have my green beans stopped producing pods?', 'answer' => 'Most often the pods were left on too long, or the potting mix dried out at flowering time. Pick every few days and keep the pot moist. Bush beans also have a short season, which is why a second sowing a few weeks later helps.' ),
						array( 'question' => 'Are green beans safe to eat raw?', 'answer' => 'No. The RHS warns that raw pods and beans are harmful if eaten, for people and for dogs, so always cook them.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — French bean \'Boston\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/252065/boston-agm/details' ),
						array( 'title' => 'RHS — French bean \'Sprite\'', 'url' => 'https://www.rhs.org.uk/plants/112383/sprite-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$csu_guide,
						$book,
					),
				),
				'content'      =>
					$h2( 'Bush or pole: which beans suit a pot?' ) .
					$p( 'Green beans come in two forms. Bush varieties (called dwarf French beans in the UK) are bushy, reach about 18 in (45 cm) and start cropping quickly, which makes them a natural fit for a balcony. Pole varieties twine up to 6 ft (2 m); they take longer to start but then give pods from midsummer into early fall if you keep picking.' ) .
					$p( 'Either type can grow in a container in a warm, sunny, sheltered spot. Bush beans are the simpler choice; pole beans make sense if you have a large, sturdy container and want height on a patio.' ) .

					$h2( 'Choosing the container' ) .
					$list(
						array(
							'<strong>Bush beans:</strong> a pot 12–18 in (30–45 cm) wide. No stakes are needed: the plants tumble over the edge.',
							'<strong>Pole beans:</strong> a container at least 30 in (75 cm) wide and 18 in (45 cm) deep, heavy enough not to blow over once the beans are up their stakes.',
						)
					) .
					$p( 'Use a peat-free all-purpose or soil-based mix; our page on ' . $compost_link . ' covers the choice. On a windy balcony, stand a pole bean container against a wall where the teepee is sheltered.' ) .

					$h2( 'Sowing green beans' ) .
					$p( 'Beans are tender. According to Colorado State University Extension, bean seed can go in around the average date of your last spring frost, once the soil has warmed. Sow straight into the final pot. Set bush bean seeds 2 in (5 cm) deep and 6 in (15 cm) apart. For pole beans, push a teepee of 8 ft (2.5 m) stakes into the container first, sow two seeds at the foot of each stake, and remove the weaker seedling if both come up.' ) .
					$p( 'For the earliest pods, you can also start seeds indoors a little before that. Put one bean, 2 in (5 cm) deep, in each small pot or deep cell of moist peat-free all-purpose potting mix, and stand them on a heat mat or on a warm, sunny windowsill. The seedlings grow fast in good light.' ) .
					$p( 'Bush beans only crop for a few weeks, so sow another pot every few weeks until midsummer for a longer supply. Our guide to <a href="/succession-planting-small-spaces/">succession planting in a small space</a> explains how to plan it.' ) .

					$h2( 'Planting out young bean plants' ) .
					$p( 'Indoor-raised or bought plants go outside only once all danger of frost has passed, after they have been hardened off. Water them well before and after planting, and space them 6 in (15 cm) apart. With pole beans, put one plant at the base of each stake and loosely tie the shoot on to start it climbing.' ) .

					$h2( 'Water, feed and training' ) .
					$p( 'Beans are thirsty, and containers dry out quickly, so water regularly and more generously once the plants flower and set pods. For a routine that fits your pot, see ' . $water_link . '.' ) .
					$p( 'In a container, start feeding when the first flowers appear: a high-potassium liquid fertilizer such as tomato fertilizer, every two weeks. Pole beans need a little training: tie in any stems that come away from the stakes, especially in wind, and pinch out the tops once they reach the top of the support. That encourages side-shoots lower down and keeps the crop within reach.' ) .

					$h2( 'Picking green beans' ) .
					$p( 'Colorado State University Extension gives about 60 days from sowing to a typical first harvest of snap beans; the RHS says bush types start eight to ten weeks after sowing. Pick the pods when they are 6–8 in (15–20 cm) long, snap easily and the beans inside cannot yet be seen as bumps. Look carefully, as green pods hide well among the leaves. Picking often makes the plant produce more; bush beans give several weeks of pods, pole beans much longer. Always cook green beans: the RHS warns that raw pods and beans are harmful.' ) .
					$p( 'Bean flowers pollinate themselves, so seed saved from them usually comes true. Our guide to ' . $seed_link . ' explains how to dry and store it.' ) .

					$h2( 'Pests to look out for' ) .
					$p( 'Green beans are generally trouble-free. Slugs and snails go for seedlings and young plants, so check on damp evenings and remove them by hand. Black bean aphids can cluster on the shoot tips; see <a href="/problems/aphids-container-plants/">aphids on container plants</a>. If flowers fall without forming pods, our page on <a href="/problems/flowers-dropping-off/">flowers dropping off</a> goes through the causes.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing outdoors into cold potting mix: beans are tender and the seed sits there without sprouting.',
							'Growing pole beans in a light pot that topples once the teepee fills with leaves.',
							'Letting the potting mix dry out while the plants are flowering.',
							'Leaving pods to get long and lumpy, which stops new ones forming.',
							'Making a single sowing of bush beans and expecting pods all summer.',
						)
					),
				'image_prompt' => 'A round 16 in (40 cm) terracotta pot on a sunny balcony floor holding a group of bushy bush bean plants about 16 in (40 cm) tall, in midsummer. Each leaf is made of three broad, pointed, mid-green leaflets. Small white flowers are visible, and slender, smooth, pencil-thin green pods about 6 in (15 cm) long hang in bunches, some spilling over the rim of the pot. No stakes. A metal balcony railing and a few other pots softly blurred behind, bright afternoon light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of bush bean plants in a terracotta pot on a sunny balcony, slim green pods hanging over the rim among three-part leaves and small white flowers. The pot fills the lower two thirds of the frame; the top third is a soft, out-of-focus pale sky and railing with empty space.' . $pin_end,
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
				'timing'       => array(
					'sow_outdoors' => array( -4, -2 ),
					'harvest_days' => array( 60, 65 ),
				),
				'excerpt'      => 'Peas crop best in the ground, but dwarf varieties and quick snow peas do well enough in a container 18 in (45 cm) wide in a sunny, sheltered spot. Sow seeds 3 in (7.5 cm) apart as early as 2–4 weeks before your last spring frost, give them twiggy sticks to climb, and expect a modest but very sweet harvest.',
				'facts'        => array(
					'short_name'     => 'Pea',
					'botanical_name' => 'Pisum sativum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, sheltered',
					'pot_size'       => 'At least 18 in (45 cm) wide',
					'hardiness'      => 'H2',
					'watering'       => 'Regular; a container dries out fast, especially in flower',
					'harvest'        => 'Early summer to fall, depending on sowing date and type',
					'season'         => 'Sown from early spring to early summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Snow peas and sugar snaps are the easiest peas and are eaten pod and all, so nothing is wasted.' ),
						array( 'point' => 'Choose a dwarf or short variety for a pot; tall ones can reach 6 ft (1.8 m).' ),
						array( 'point' => 'Sow 2 in (5 cm) deep and 3 in (7.5 cm) apart once the potting mix is about 50 °F (10 °C), or start them indoors a few weeks earlier.' ),
						array( 'point' => 'Push in twiggy sticks, stakes or a strip of chicken wire when you sow or plant.' ),
						array( 'point' => 'Feed every two weeks with a high-potassium liquid fertilizer from the first flowers, and keep picking.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Delikett (AGM)', 'note' => 'A sugar snap pea with an RHS Award of Garden Merit. Its RHS plant page gives a height of 3–5 ft (1–1.5 m), so give it tall supports. Eat the whole pods, or leave them to mature and shell the peas.' ),
						array( 'name' => 'Cascadia (AGM)', 'note' => 'A sugar snap the RHS describes as quick to mature and fairly compact, with short, tasty pods.' ),
						array( 'name' => 'Kelvedon Wonder (AGM)', 'note' => 'An early garden pea for shelling (a "first early" in the UK), according to the RHS; it can also be grown as a later main crop.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 18 in (45 cm) wide, with drainage holes', 'badge' => '', 'note' => 'A wide trough works well for a short row.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For the container and for starting seeds indoors.', 'url' => '' ),
						array( 'name' => 'Twiggy pea sticks, short stakes or chicken wire', 'badge' => '', 'note' => 'Peas climb with tendrils and need something thin to grip.', 'url' => '' ),
						array( 'name' => 'High-potassium organic liquid fertilizer', 'badge' => '', 'note' => 'Every two weeks once flowering starts.', 'url' => '' ),
						array( 'name' => 'Fine netting', 'badge' => '', 'note' => 'Keeps pigeons off if they visit your balcony.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Snow peas, sugar snaps or garden peas: which should I sow in a pot?', 'answer' => 'Snow peas or sugar snaps. The RHS says they are the easiest peas to grow and tend to crop more heavily. You eat the whole pod, which matters when a container only holds a few plants. Garden peas need shelling, so the same pot gives you less to eat.' ),
						array( 'question' => 'When are snow pea and sugar snap pods ready?', 'answer' => 'At about 3 in (7.5 cm) long, just as the peas inside start to form. Garden peas for shelling are ready when the pods look well filled. The lowest pods ripen first, so start picking at the bottom.' ),
						array( 'question' => 'What is the white powder on my pea leaves?', 'answer' => 'Probably powdery mildew. It is more likely when the potting mix in a pot dries out, so water regularly and pour the water onto the potting mix, not the leaves. Some varieties, such as \'Jaguar\', are listed by the RHS for their resistance.' ),
						array( 'question' => 'Can I pick pea shoots from plants grown for pods?', 'answer' => 'A few. The tips of young plants taste of fresh peas, but taking many from each plant reduces the crop.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						array( 'title' => 'RHS — Pea \'Cascadia\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/163112/cascadia-agm/details' ),
						array( 'title' => 'RHS — Pea \'Delikett\'', 'url' => 'https://www.rhs.org.uk/plants/163113/delikett-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						$csu_guide,
						array( 'title' => 'University of Minnesota Extension — Growing peas in home gardens', 'url' => 'https://extension.umn.edu/vegetables/growing-peas' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Which peas grow well in a container?' ) .
					$p( 'The RHS is honest about peas: they do best in the ground, and a container only holds a few plants, so the harvest is small. Still, a pot of peas picked minutes before eating is a treat, and the right type makes the most of the space.' ) .
					$p( 'There are three kinds. Garden peas are shelled. Snow peas (mangetout in the UK) have flat, stringless pods and sugar snaps have fleshy, rounded ones; both are eaten whole and picked before the peas mature. For a pot, go for a dwarf or short variety, ideally a snow pea or sugar snap. Tall varieties reach 6 ft (1.8 m) and become top-heavy.' ) .

					$h2( 'Early or main-crop varieties?' ) .
					$p( 'In the UK, peas are sold as first earlies, second earlies or main crops. The earlier the type, the shorter the plant and the sooner it crops: for UK conditions the RHS gives about 12 weeks from sowing for first earlies, 13–14 for second earlies and 14–16 for main crops. The University of Minnesota Extension says most varieties need about 60 days of growth before harvest, and Colorado State University Extension gives a typical 65 days; the seed packet gives the figure for your variety. Among garden peas, smooth-seeded varieties are hardier and suit the first sowings, while wrinkled ones are sweeter and are sown from late spring.' ) .

					$h2( 'Pot size and position' ) .
					$p( 'A pea container needs to be 18 in (45 cm) across or more. Holes in the base are essential, and peat-free all-purpose potting mix suits peas well (our page on ' . $compost_link . ' goes into detail). Peas like a sunny, sheltered spot, and they grow well in a cool spring.' ) .

					$h2( 'Sowing peas, indoors or straight in the pot' ) .
					$p( '<strong>In the container.</strong> Peas are hardy: Colorado State University Extension says they can be sown as early as 2–4 weeks before your average last spring frost, as soon as the soil has dried enough to work. Wait until the potting mix has warmed to about 50 °F (10 °C), then sow the seeds 2 in (5 cm) deep and 3 in (7.5 cm) apart. Do not sow into very wet potting mix, where seed can rot. Set the supports in at the same time.' ) .
					$p( '<strong>Indoors.</strong> A few weeks earlier, in late winter, sow into deep cells, small pots or cardboard toilet-paper tubes of peat-free all-purpose potting mix, about 2 in (5 cm) deep: one seed per tube or cell, up to three per pot. This is safer from mice, which dig up newly sown peas. Keep the seedlings in good light, harden them off, and plant them out 3 in (7.5 cm) apart in early spring, once they are about 8 in (20 cm) tall. Peas resent root disturbance; to sow a whole row in one piece, see how to <a href="/diy-projects/sow-peas-in-a-gutter/">sow peas in a gutter</a>.' ) .
					$p( 'Sow a small batch every few weeks until early summer, or sow an early and a main-crop variety together, for pods over a longer period.' ) .

					$h2( 'Supports for peas in a pot' ) .
					$p( 'Peas climb with fine tendrils. Apart from the shortest dwarf types, they need something to scramble up: twiggy pea sticks pushed in between the plants, short bamboo stakes, or a cylinder of chicken wire inside the rim. Check the height on the seed packet and make the support at least that tall and firmly anchored, especially on a windy balcony.' ) .

					$h2( 'Watering and feeding' ) .
					$p( 'Potting mix in a container can dry out quickly, so regular watering is essential; general advice is in ' . $water_link . '. Give a thorough soak when the plants start to flower and again two weeks later, which helps the pods fill. Aim the water at the potting mix and keep the leaves dry, as damp foliage and dry roots both encourage powdery mildew.' ) .
					$p( 'Peas in a container also benefit from feeding: from the first flowers, use a high-potassium organic liquid fertilizer such as tomato fertilizer every two weeks.' ) .

					$h2( 'Harvesting, and what can go wrong' ) .
					$p( 'Pick snow peas and sugar snaps at about 3 in (7.5 cm), just as the peas begin to form, and garden peas once the pods are plump. Plants crop for several weeks, starting at the bottom. Keep picking: if pods are left to mature, the plants stop flowering. Peas are sweetest eaten straight away.' ) .
					$p( 'Pests are the main worry. Mice take freshly sown seed, slugs and snails eat seedlings, and pigeons strip the leaves, so a light net over the container may be needed. In the UK, pea moth caterpillars feed inside the pods, so check them as you shell. To keep seed for next year, see ' . $seed_link . '. For pea shoots grown in a tray and cut young, see our guide to <a href="/plants/microgreens-on-a-windowsill/">microgreens on a windowsill</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a tall main-crop variety that grows far beyond its support.',
							'Sowing into cold, soggy potting mix, where the seed rots before it sprouts.',
							'Leaving the support until the plants flop over.',
							'Letting the pot dry out at flowering, which brings small pods and mildew.',
							'Leaving pods to fatten on the plant, which ends the crop early.',
						)
					),
				'image_prompt' => 'A wide rectangular wooden trough on a sunny balcony in early summer, planted with a short row of dwarf sugar snap pea plants about 2 ft (60 cm) tall climbing a cluster of twiggy hazel pea sticks. Pale blue-green paired oval leaflets, large leafy stipules and fine curling tendrils gripping the twigs. Small white butterfly-shaped flowers and several plump, rounded, bright green pods about 3 in (7 cm) long hanging low on the plants. A balcony railing and soft city background blurred, morning light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of dwarf sugar snap peas climbing twiggy sticks in a wooden trough on a sunny balcony, white flowers and plump green pods hanging among blue-green leaves and curling tendrils. The trough and plants fill the lower two thirds; the top third is a calm, softly blurred pale sky with empty space.' . $pin_end,
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
				'timing'       => array(
					'plant_out'    => array( -2, 0 ),
					'harvest_days' => array( 49, 56 ),
				),
				'excerpt'      => 'Early potatoes grow well in a grow bag, sack or tub at least 12 in (30 cm) wide and deep, with one seed potato for every 12 in (30 cm) of width. Start the bag half full, top it up with potting mix as the shoots grow, and tip it out for new potatoes in early summer.',
				'facts'        => array(
					'short_name'     => 'Potato',
					'botanical_name' => 'Solanum tuberosum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, open and frost-free',
					'pot_size'       => 'Bag, sack or pot at least 12 in (30 cm) wide and deep; one seed potato per 12 in (30 cm) of width',
					'hardiness'      => 'H2',
					'watering'       => 'Regular through the season, even after rain',
					'harvest'        => 'New potatoes from early summer; about 7–8 weeks after planting',
					'season'         => 'Planted in early spring, up to 2 weeks before the last frost',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Grow early varieties: the plants are smaller and ready sooner than main-crop (late) potatoes.' ),
						array( 'point' => 'Buy certified virus-free seed potatoes, and chit early varieties in a cool, bright, frost-free place for four to six weeks if you can.' ),
						array( 'point' => 'Put 6 in (15 cm) of peat-free all-purpose potting mix in the bag, set the seed potatoes just below the surface, then keep adding potting mix as they grow.' ),
						array( 'point' => 'Keep shoots safe from frost: move the bag under cover or cover the plants on cold nights.' ),
						array( 'point' => 'Harvest early potatoes when the flowers open or the buds drop; the tubers should be about the size of a hen\'s egg.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Sharpe\'s Express (AGM)', 'note' => 'A first early the RHS lists as suitable for containers, with smooth skin and pale flesh.' ),
						array( 'name' => 'Casablanca (AGM)', 'note' => 'A first early the RHS lists as suitable for containers; good for fries, baking or boiling.' ),
						array( 'name' => 'Charlotte (AGM)', 'note' => 'A popular second early salad potato with yellow tubers, recommended by the RHS.' ),
					),
					'products'   => array(
						array( 'name' => 'Potato grow bag or sack, or a pot at least 12 in (30 cm) wide and deep', 'badge' => '', 'note' => 'Some bags have a flap near the base for harvesting.', 'url' => '' ),
						array( 'name' => 'Certified seed potatoes (early variety)', 'badge' => '', 'note' => 'Not grocery store potatoes.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'Enough to fill the bag almost to the rim over the season.', 'url' => '' ),
						array( 'name' => 'Organic all-purpose granular fertilizer or organic liquid fertilizer', 'badge' => '', 'note' => 'Mix in at planting, or feed once the potting mix runs low.', 'url' => '' ),
						array( 'name' => 'Egg cartons or a seed tray', 'badge' => '', 'note' => 'For chitting.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How many seed potatoes go in one bag?', 'answer' => 'One for every 12 in (30 cm) of width. A bag or pot 12 in (30 cm) across takes one seed potato; a wider bag takes more.' ),
						array( 'question' => 'Do I have to chit seed potatoes?', 'answer' => 'No. Chitting (pre-sprouting) gives early varieties a head start, so they crop a few weeks sooner, but unchitted tubers still grow well. There is little point chitting main-crop potatoes.' ),
						array( 'question' => 'Can I use an old potting mix bag to grow potatoes?', 'answer' => 'Yes. The RHS suggests reusing old sacks or large potting mix bags, as long as you pierce holes in the bottom so extra water can drain out.' ),
						array( 'question' => 'Are green potatoes safe to eat?', 'answer' => 'No. Potatoes turn green when light reaches them and are then potentially poisonous, so throw green ones away. Keeping the tubers covered with potting mix as the plant grows prevents it.' ),
						array( 'question' => 'Can I grow potatoes for Christmas in a bag?', 'answer' => 'Yes, with prepared, cold-stored seed potatoes planted in midsummer to late summer. Keep the container in a greenhouse or another bright, frost-free place, which also protects the plants from blight.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow potatoes', 'url' => 'https://www.rhs.org.uk/vegetables/potatoes/grow-your-own' ),
						array( 'title' => 'RHS — Potato scabs', 'url' => 'https://www.rhs.org.uk/disease/potato-scabs' ),
						array( 'title' => 'RHS — Potato \'Sharpe\'s Express\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/199780/sharpes-express-agm/details' ),
						array( 'title' => 'RHS — Potato \'Casablanca\'', 'url' => 'https://www.rhs.org.uk/plants/301266/casablanca-agm/details' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$csu_guide,
						array( 'title' => 'University of Minnesota Extension — Growing potatoes in home gardens', 'url' => 'https://extension.umn.edu/vegetables/growing-potatoes' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why grow potatoes in a bag?' ) .
					$p( 'Potatoes usually need a whole row in a vegetable garden, but a few plants in a large container give a decent crop of new potatoes. Harvesting is easy too: you tip the bag out and pick up the tubers, with no fork to spear them.' ) .
					$p( 'Early varieties are the ones to grow. They make smaller plants, mature faster, and are lifted by midsummer. The RHS says UK first earlies can be ready in as little as 12 weeks; the University of Minnesota Extension says you can dig new potatoes about seven to eight weeks after planting. Blight is also less likely to affect early varieties, and it is less common in dry summers.' ) .
					$p( 'Check the texture on the label as well as the timing: varieties are either waxy or floury (starchy), so pick one that suits the way you cook. Main-crop (late) potatoes stay in the ground from late summer into fall and give bigger potatoes for roasting, baking and storing, but they take far longer to fill a bag.' ) .

					$h2( 'What to grow them in' ) .
					$p( 'Any container at least 12 in (30 cm) wide and deep will do. Purpose-made potato grow bags and sacks work well, and some have a flap near the base so you can reach in for a few tubers. An old sack or a large, empty potting mix bag can be reused, but make drainage holes in the bottom first. Stand it in full sun, in an open spot where late frosts do not linger.' ) .

					$h2( 'Seed potatoes and chitting' ) .
					$p( 'Start from certified virus-free seed potatoes, sold in late winter and spring; mail-order suppliers have the widest range. Chitting means letting the tubers sprout before planting. It is optional, but it brings early varieties on a few weeks sooner.' ) .
					$p( 'Stand the seed potatoes in egg cartons or a seed tray, with the end that has most buds (eyes) facing up, in a cool, bright, frost-free room. Start about four to six weeks before you plan to plant; by then the shoots should be about 2 in (5 cm) long.' ) .

					$h2( 'Planting a potato bag step by step' ) .
					$list(
						array(
							'Plant in early spring: Colorado State University Extension says potatoes can go in as early as 0–2 weeks before your average last spring frost, once the soil has dried enough to work. Plant second earlies a little after first earlies.',
							'Put about 6 in (15 cm) of peat-free all-purpose potting mix in the bottom of the bag, so it is roughly half full.',
							'Lay one seed potato per 12 in (30 cm) of width on the potting mix, shoots upward, and cover it so it sits just below the surface.',
							'Water well, then keep the potting mix moist but not soggy.',
						)
					) .
					$p( 'Potatoes in containers need feeding. Either mix an organic all-purpose fertilizer into the potting mix at planting, or start an organic liquid fertilizer when the potting mix runs short of nutrients; with many peat-free all-purpose mixes that is after about six weeks. For general advice on refreshing old potting mix, see ' . $compost_link . '.' ) .

					$h2( 'Topping up as the shoots grow' ) .
					$p( 'In the ground, potatoes are hilled: soil is drawn over the stems so the new tubers stay in the dark. In a bag you do the same with potting mix. Each time the shoots poke well above the surface, add more potting mix around them, and keep going until the level is just below the rim. Tubers that see the light turn green and should not be eaten.' ) .
					$p( 'Young shoots are easily damaged by frost in spring. Keep a bag in a frost-free place such as a greenhouse or porch until all danger of frost has passed, or, if a cold night is forecast, cover the shoots with a cloche, burlap, straw or more potting mix.' ) .

					$h2( 'Watering a potato bag' ) .
					$p( 'Water regularly through the whole season. The leaves form a canopy that sheds rain over the edge of the bag, so the potting mix can stay dry even after a wet day; check it with your finger. Our guide to ' . $water_link . ' has a simple routine.' ) .

					$h2( 'Harvesting new potatoes' ) .
					$p( 'First earlies are usually ready in early summer and second earlies in midsummer. A good sign is when the plants flower or the flower buds drop. Scrape back a little potting mix to look: the tubers should be about the size of a hen\'s egg. If they are still small, cover them up and wait.' ) .
					$p( 'When they are ready, tip the bag onto a sheet or into a wheelbarrow and gather the potatoes by hand, discarding any green ones. Collect every tuber, as any left behind can sprout and carry disease. New potatoes taste best eaten soon after lifting.' ) .
					$p( 'Some slugs live underground and tunnel into tubers, mostly main-crop potatoes in damp fall weather. If the leaves develop fast-spreading brown, watery patches in warm, wet weather, see <a href="/problems/tomato-blight/">tomato and potato blight</a>. Rough, corky patches on the skins at harvest usually mean common scab, encouraged by dry potting mix while the tubers are forming; see <a href="/problems/potato-scab/">potato scab</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting potatoes from the grocery store instead of certified seed potatoes.',
							'Filling the bag to the top at planting time, which leaves no room to cover the stems later.',
							'Assuming rain has watered the bag: the leaves often keep it off.',
							'Leaving young shoots out on a frosty night.',
							'Eating potatoes that have turned green.',
						)
					),
				'image_prompt' => 'A tall dark green fabric potato grow bag about 16 in (40 cm) wide standing on a sunny patio in early summer, its sides rolled to just below the rim and filled with dark peat-free potting mix. A bushy potato plant grows from it: upright green stems with matte, mid-green compound leaves made of oval leaflets, and a few clusters of small white star-shaped flowers with yellow centers. Beside the bag, a handful of freshly harvested small cream-skinned new potatoes rest on the soil-dusted paving. Soft background of a brick wall, warm morning light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of a potato plant in flower growing in a green fabric grow bag on a sunny patio, with small white star-shaped flowers and a few freshly dug new potatoes beside the bag. The bag and plant fill the lower two thirds of the frame; the top third is a calm, softly blurred brick wall with empty space.' . $pin_end,
			),
		),
	),
);
