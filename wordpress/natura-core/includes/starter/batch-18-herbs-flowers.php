<?php
/**
 * Starter guides, batch 18: more herbs and an edible flower for pots
 * (French tarragon, chervil, lemon verbena, calendula, sorrel).
 *
 * Facts from the RHS pages listed in each guide (checked 18 October 2026),
 * Illinois Extension and University of Wisconsin-Madison Extension for lemon
 * verbena, which has no RHS grow-your-own page, and Jo Whittingham,
 * Backyard Harvest (DK, 2011), used only where the RHS agrees. Months are
 * for a temperate climate such as the UK.
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
	'name'   => __( 'More herbs and edible flowers', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'french-tarragon-in-pots' => array(
				'title'        => 'How to Grow French Tarragon in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 3, 4, 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'French tarragon is the tarragon cooks want, and a pot suits it best because you can carry it out of the cold and wet in winter. Buy a young plant, set it in gritty peat-free compost in a pot at least 20 cm (8 in) wide and deep, and give it full sun and shelter.',
				'facts'        => array(
					'short_name'     => 'French tarragon',
					'botanical_name' => 'Artemisia dracunculus French',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun in a sheltered spot',
					'pot_size'       => 'At least 20 cm (8 in) wide and deep for one plant',
					'hardiness'      => 'H4',
					'watering'       => 'Check often in summer; keep on the dry side in cool weather',
					'harvest'        => 'Young shoot tips from spring to autumn',
					'season'         => 'Herbaceous perennial; dies back in autumn, regrows in spring',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Buy a French tarragon plant: it rarely sets seed, so packets of tarragon seed are almost always the Russian kind.' ),
						array( 'point' => 'Plant one in a pot at least 20 cm (8 in) wide and deep, in peat-free soil-based compost with up to a quarter grit.' ),
						array( 'point' => 'Stand it in full sun, out of the wind.' ),
						array( 'point' => 'Nip off stems carrying flower buds so the plant keeps making leaves.' ),
						array( 'point' => 'In winter, move the pot somewhere dry, such as a porch, a greenhouse or under the eaves of a wall.' ),
					),
					'varieties'  => array(
						array( 'name' => 'French tarragon (Artemisia dracunculus French)', 'note' => 'The RHS calls it the better tarragon for cooking: smooth, slender leaves, peppery with a hint of liquorice. Around 50–75 cm tall and 30 cm wide. Rated H4. Sold as plants only.' ),
						array( 'name' => 'Russian tarragon (A. dracunculus Russian)', 'note' => 'Bigger and tougher, up to about 1 m tall, and rated H6 by the RHS. Easy from seed, but its flavour is grassier and slightly bitter.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 20 cm wide and deep, with plenty of drainage holes', 'badge' => '', 'note' => 'Light enough to carry under cover in winter.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based compost', 'badge' => '', 'note' => 'Holds its structure for several years.', 'url' => '' ),
						array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Up to 25 per cent by volume for sharper drainage.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why can I not find French tarragon seeds?', 'answer' => 'French tarragon seldom flowers or produces viable seed in the UK, so it is sold as young plants. Seed packets labelled simply "tarragon" usually contain Russian tarragon, which is hardier but has a weaker, grassier flavour.' ),
						array( 'question' => 'How can I tell French tarragon from Russian tarragon?', 'answer' => 'French tarragon is the smaller, daintier plant, with slender smooth leaves and a warm aniseed taste. Russian tarragon grows taller and more vigorous and tastes grassy and a little bitter. Plants vary, so rub a leaf and smell it before you buy.' ),
						array( 'question' => 'My tarragon has disappeared in autumn: is it dead?', 'answer' => 'Probably not. Tarragon is a herbaceous perennial: the top growth dies after the first hard frost and new shoots come from the base in spring. Keep the pot dry and sheltered over winter, then cut away last year\'s dead stems in spring, down to the lowest new shoots.' ),
						array( 'question' => 'How long does a tarragon plant last?', 'answer' => 'Not many years. Tarragon, the French kind especially, is short-lived, so divide the clump every few years in spring or root softwood cuttings in summer to keep young, productive plants coming.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow tarragon', 'url' => 'https://www.rhs.org.uk/herbs/tarragon/grow-your-own' ),
						array( 'title' => 'RHS — Artemisia dracunculus French (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/217000/artemisia-dracunculus-french/details' ),
						array( 'title' => 'RHS — Artemisia dracunculus var. inodora, Russian tarragon (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/41862/artemisia-dracunculus-var-inodora/details' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'French or Russian tarragon?' ) .
					$p( 'Both are forms of Artemisia dracunculus, and both have narrow leaves with a hint of aniseed. French tarragon is the one prized in the kitchen: a slim, upright plant about 50–75 cm (20–30 in) tall and 30 cm (1 ft) wide, with smooth leaves that taste peppery and faintly of liquorice. It goes into béarnaise sauce and with chicken, fish, eggs and mushrooms.' ) .
					$p( 'Russian tarragon is coarser and much larger, reaching about 1 m (3½ ft), and its flavour is grassier with a slight bitterness. It shrugs off UK winters, which French tarragon does not. For a balcony, grow the French kind in a pot that you can move.' ) .

					$h2( 'Buy a plant, not seed' ) .
					$p( 'French tarragon hardly ever flowers and sets seed in the UK, so you buy it as a young plant in spring or summer from a garden centre or herb nursery. Plants sold under either name can vary a lot, so go in person if you can and crush a leaf: you want a warm, aniseed smell. One plant gives enough leaves for most kitchens.' ) .
					$p( 'If you only find seed, it is Russian tarragon. Sow it from spring to early summer, thinly, on moist peat-free seed compost, barely covered, and pot the seedlings into 7.5 cm (3 in) pots once they have several leaves. Our guide to <a href="/plant-care/how-to-sow-seeds-indoors/">sowing seeds indoors</a> covers the method.' ) .

					$h2( 'Pot, compost and position' ) .
					$p( 'Give one plant a container at least 20 cm (8 in) wide and the same depth, with plenty of holes in the base. Use a peat-free soil-based compost and add grit, as much as 25 per cent by volume, so that surplus water drains away quickly.' ) .
					$p( 'Plant from mid-spring to early summer. Tarragon wants the warmest, sunniest corner you have, sheltered from wind. If the plant was raised indoors, acclimatise it first; see <a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>.' ) .

					$h2( 'Watering and care through summer' ) .
					$p( 'Established tarragon copes with drought, but a pot dries out much faster than open ground, so look at the compost regularly in summer and water when it is dry. Wet roots are the bigger danger: never leave the pot standing in water, and water less as the weather cools. For a routine, see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>; feeding is covered in <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.' ) .
					$p( 'Pinch out any stem that starts to form flower buds. That keeps the plant producing leaves for longer.' ) .

					$h2( 'Picking tarragon' ) .
					$p( 'Start picking when new growth appears in spring and carry on into autumn. Take the soft tips of the shoots often; this encourages more young growth. Strip the leaves from the stem and chop them finely. They taste best fresh. Dried tarragon is milder, and the leaves can also be frozen: see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Getting French tarragon through winter' ) .
					$p( 'The RHS rates French tarragon H4, but cold combined with wet is what kills it. After the first hard frost the stems die down, which is normal. Move the pot under cover for the winter, into an unheated greenhouse or a porch. With no room inside, put it close to a building where rain does not reach. In spring, cut the old dead stems back to the lowest new shoots. Our <a href="/plant-care/protect-pots-in-winter/">winter pot protection guide</a> covers wrapping pots in a hard frost.' ) .

					$h2( 'Keep young plants coming' ) .
					$p( 'Tarragon is a short-lived perennial, and the French kind tends to fade after a few years. Divide the clump in spring every few years, which is the simplest way to propagate it, and replant a healthy piece in fresh compost. You can also take softwood cuttings from new growth in summer.' ) .
					$p( 'In a warm, sunny, well-drained spot it is rarely ill. Rust and powdery mildew sometimes appear; for the white coating, see <a href="/problems/powdery-mildew/">powdery mildew</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying tarragon seed and expecting the French flavour: seed gives the Russian kind.',
							'Planting it in a border with heavy, damp soil: a pot drains better and can move.',
							'Leaving the pot in winter rain: shelter it from the wet.',
							'Throwing the plant away in autumn because it has died back: it regrows in spring.',
							'Letting it flower: pinch out the buds to keep the leaves coming.',
						)
					),
				'image_prompt' => 'A French tarragon plant with slender upright stems and narrow, smooth, lance-shaped glossy green leaves, a soft feathery look, growing in a 20 cm terracotta pot topped with grit on a sunny, sheltered balcony beside a brick wall, summer morning light.' . $photo_end,
				'pin_prompt'   => 'A pot of French tarragon with narrow, smooth, bright green leaves on upright stems standing on a small wooden patio table, a few cut shoot tips and a small dish of chopped leaves beside it, photographed vertically.' . $pin_end,
			),

			'chervil-in-pots'         => array(
				'title'        => 'How to Grow Chervil in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7, 8 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'Chervil is a fast, short-lived herb with lacy, parsley-like leaves and a gentle aniseed taste, and it prefers a cool, lightly shaded pot to a hot one. Sow it straight into a container at least 25 cm (10 in) wide and deep, start picking about eight weeks later, and sow again every few weeks.',
				'facts'        => array(
					'short_name'     => 'Chervil',
					'botanical_name' => 'Anthriscus cerefolium',
					'difficulty'     => 'Easy',
					'sun'            => 'Light shade, especially in summer',
					'pot_size'       => 'At least 25 cm (10 in) wide and deep',
					'hardiness'      => 'H4',
					'watering'       => 'Keep moist; a dry pot makes it flower early',
					'harvest'        => 'About 8 weeks after sowing, until it flowers',
					'season'         => 'Sow March to August',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow directly into a container at least 25 cm (10 in) wide and deep, about 1 cm (½ in) deep, in peat-free multi-purpose compost.' ),
						array( 'point' => 'Put the pot in light shade: hot sun makes chervil run to flower.' ),
						array( 'point' => 'Begin picking once plants are 10 cm (4 in) tall, roughly eight weeks after sowing.' ),
						array( 'point' => 'Sow a small batch every few weeks from spring to late summer.' ),
						array( 'point' => 'Add the leaves at the end of cooking: heat kills the delicate flavour.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Plain (flat-leaved) chervil', 'note' => 'The usual form, with finely divided leaves and a mild aniseed taste.' ),
						array( 'name' => 'Curly-leaved chervil', 'note' => 'A form with crimped leaves, listed by the RHS as an alternative.' ),
						array( 'name' => '\'Vertissimo\'', 'note' => 'Named by the RHS as slow to bolt, which helps in summer.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 25 cm wide and deep, with drainage holes', 'badge' => '', 'note' => 'Room for the long tap root.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each sowing.', 'url' => '' ),
						array( 'name' => 'Chervil seed', 'badge' => '', 'note' => 'Use within a year: the seed does not keep well.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why does chervil go to seed so quickly?', 'answer' => 'It is a biennial grown as an annual, and it flowers fairly soon whatever you do. Heat and dry compost speed this up. Keep the pot moist and lightly shaded, try a slow-bolting variety such as \'Vertissimo\', and sow fresh seed every few weeks so a young pot is always coming on.' ),
						array( 'question' => 'Can I transplant chervil seedlings?', 'answer' => 'Yes, but do it early, when they are about 5 cm (2 in) tall and before the long tap root forms. Sowing in modules keeps the root disturbance low. Sowing straight into the final pot is simpler still.' ),
						array( 'question' => 'Can I pick chervil in winter?', 'answer' => 'Possibly into early winter. Sow in late summer and keep the pot under a cloche, in a cold frame or in a greenhouse; plants still growing well in a container can be moved into a greenhouse in autumn.' ),
						array( 'question' => 'How do I cook with chervil?', 'answer' => 'Use it raw in salads, or stir it into hot dishes just before serving, because cooking destroys its delicate anise flavour. It suits eggs, chicken and fish, and is a classic herb in French cooking.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chervil', 'url' => 'https://www.rhs.org.uk/herbs/chervil/grow-your-own' ),
						array( 'title' => 'RHS — Anthriscus cerefolium (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/1345/anthriscus-cerefolium/details' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'What chervil is like' ) .
					$p( 'Chervil (Anthriscus cerefolium) looks rather like parsley, with soft, finely cut leaves, but its taste is subtler, with a light note of aniseed. It is a biennial usually treated as an annual, and in flower it carries small clusters of white blooms on stems 30–60 cm (1–2 ft) tall. Shops rarely sell it, which makes a pot of your own worthwhile.' ) .

					$h2( 'Container, compost and a cool spot' ) .
					$p( 'Choose a container at least 25 cm (10 in) deep and wide, with drainage holes, and use peat-free multi-purpose compost. Chervil grows a long tap root, which is one reason it dislikes being moved.' ) .
					$p( 'Unlike most herbs, chervil does best out of strong sun. A spot in light shade keeps it leafy for longer. In a heatwave, carry the pot somewhere shadier.' ) .

					$h2( 'Sowing chervil' ) .
					$list(
						array(
							'<strong>In the pot outside:</strong> from April to August, scatter the seed thinly on moist compost and cover it with about 1 cm (½ in) more. Seedlings can take up to three weeks to appear in cool weather.',
							'<strong>Indoors for an early start:</strong> from early spring, sow on a sunny windowsill, ideally in modules. Seedlings usually show in 5–10 days.',
							'<strong>Thin or plant out:</strong> thin crowded seedlings to about 15 cm (6 in) apart. Move indoor-sown plants into their final pot from mid-spring, when they are around 5 cm (2 in) tall, before the tap root develops.',
						)
					) .
					$p( 'The slender seeds are about 5 mm long and easy to handle. They stay viable for only about a year, so buy fresh packets. Water right after sowing and keep the compost moist. For a steady supply, start a new pot every few weeks; our <a href="/plant-care/succession-sowing-small-spaces/">succession sowing guide</a> explains how to plan it.' ) .

					$h2( 'Keep it from bolting' ) .
					$p( 'Chervil will flower fairly soon whatever you do, and once it flowers the leaves lose their quality. Hot, dry conditions bring this on faster. Water regularly, because compost in a pot dries quickly in warm weather (see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>), and keep summer sowings in part shade. If a pot bolts anyway, the <a href="/problems/plants-bolting/">bolting guide</a> explains what is going on.' ) .
					$p( 'When plants start to flower, pull them out and sow again, or leave one or two to set seed. Chervil self-seeds readily; if you collect seed, sow it within a year.' ) .

					$h2( 'Harvesting the leaves' ) .
					$p( 'Leaves are usually ready about eight weeks after sowing, once plants reach 10 cm (4 in). Pick a few soft young leaves from each plant so they keep growing. When you need a big bunch, cut every stem back to 5–7.5 cm (2–3 in) above the compost: a healthy plant sends up a second flush.' ) .
					$p( 'Use the leaves raw, or add them to hot food just before serving: the flavour does not survive cooking.' ) .

					$h2( 'Autumn and early winter pickings' ) .
					$p( 'For leaves later in the year, sow in late summer and protect the plants with a cloche or keep them in a cold frame or greenhouse. A pot that is still growing well can simply be carried into a greenhouse in autumn.' ) .

					$h2( 'Pests' ) .
					$p( 'The soft young foliage attracts aphids; see <a href="/problems/aphids-container-plants/">aphids on container plants</a>. Slugs, snails and caterpillars may also eat young growth.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Giving it the sunniest spot: chervil prefers light shade.',
							'Transplanting big plants: move them while small, or sow where they will grow.',
							'Sowing one big batch: little and often gives leaves for months.',
							'Using old seed: chervil seed loses viability after about a year.',
							'Cooking the leaves for long: add them at the very end.',
						)
					),
				'image_prompt' => 'A 25 cm grey pot of young chervil with soft, bright green, finely divided fern-like leaves, similar to flat-leaf parsley but lacier, growing in light shade on a balcony floor next to a north-facing wall, a few tiny white flower umbels just starting on one stem.' . $photo_end,
				'pin_prompt'   => 'Lush chervil with delicate, lacy, bright green leaves in a pale ceramic pot on a shaded patio table, a pair of kitchen scissors and a small bowl of freshly cut sprigs beside it, photographed vertically.' . $pin_end,
			),

			'lemon-verbena-in-pot'    => array(
				'title'        => 'How to Grow Lemon Verbena in a Pot',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'plant'   => array( 5, 6 ),
				),
				'excerpt'      => 'Lemon verbena is a frost-tender shrub with intensely lemon-scented leaves for tea, drinks and desserts, and a pot lets you carry it indoors before the frosts. Give it full sun, free-draining peat-free compost and regular feeding in summer, then move it to a bright, frost-free place for the winter, when it loses its leaves.',
				'facts'        => array(
					'short_name'     => 'Lemon verbena',
					'botanical_name' => 'Aloysia citrodora',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, sheltered',
					'pot_size'       => 'A deep pot with plenty of drainage holes, small enough to carry indoors',
					'hardiness'      => 'H3',
					'watering'       => 'Evenly moist, never soggy',
					'harvest'        => 'Leaves through the growing season; best just before flowering',
					'season'         => 'Deciduous shrub; outside after the last frost, under cover in winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Grow it in a pot with good drainage so it can come under cover before the first frost.' ),
						array( 'point' => 'Use a peat-free, loam-based potting compost and give it the sunniest sheltered spot you have.' ),
						array( 'point' => 'Feed with a general-purpose liquid fertiliser about every two weeks in summer.' ),
						array( 'point' => 'Pick leaves often; the flavour peaks just before the flowers open.' ),
						array( 'point' => 'In early to mid-spring, cut last year\'s shoots back to one or two buds from the woody framework.' ),
					),
					'varieties'  => array(),
					'products'   => array(
						array( 'name' => 'Deep pot with drainage holes', 'badge' => '', 'note' => 'Light enough to carry indoors in autumn.', 'url' => '' ),
						array( 'name' => 'Peat-free loam-based potting compost', 'badge' => '', 'note' => 'The RHS suggests a loam-based mix for plants under glass.', 'url' => '' ),
						array( 'name' => 'General-purpose liquid fertiliser', 'badge' => '', 'note' => 'About every two weeks in the growing season.', 'url' => '' ),
						array( 'name' => 'Secateurs', 'badge' => '', 'note' => 'For the spring prune and for taking cuttings.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why has my lemon verbena lost all its leaves?', 'answer' => 'It is deciduous, so dropping its leaves as the weather turns cold is normal. A plant kept cool indoors rests in a semi-dormant state over winter. Keep it in a bright, frost-free place, water so the compost does not dry out, and wait for spring.' ),
						array( 'question' => 'Can lemon verbena stay outside all winter?', 'answer' => 'The RHS rates it H3, which means it is only half hardy. In mild, sheltered gardens it may survive in the ground with a mulch over the roots, but a plant in a pot is more exposed. Move it into a frost-free porch, greenhouse or cool, bright room before the first frost.' ),
						array( 'question' => 'What can I use lemon verbena leaves for?', 'answer' => 'Use them wherever you want a lemon flavour: in tea and cold drinks, fruit salads, desserts, sauces and marinades for fish or poultry. Some of the lemon taste fades with cooking, so add the leaves late. The scent stays strong when the leaves are dried.' ),
						array( 'question' => 'How do I replace an old, woody lemon verbena?', 'answer' => 'Take cuttings. Soft tip cuttings root easily, and young plants grow fast and have better leaves than an old woody one. Once the new plants are growing well, you can retire the old plant.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — Aloysia citrodora, lemon verbena (plant profile and hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/284648/aloysia-citrodora/details' ),
						array( 'title' => 'RHS — Pruning shrubs that flower in summer and autumn (pruning group 6)', 'url' => 'https://www.rhs.org.uk/plants/types/shrubs/summer-autumn-pruning-guide' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						array( 'title' => 'Illinois Extension — Herb gardening: lemon verbena', 'url' => 'https://extension.illinois.edu/herbs/lemon-verbena' ),
						array( 'title' => 'University of Wisconsin-Madison Extension — Lemon-scented plants', 'url' => 'https://hort.extension.wisc.edu/articles/lemon-scented-plants/' ),
					),
				),
				'content'      =>
					$h2( 'A tender shrub with a strong lemon scent' ) .
					$p( 'Lemon verbena (Aloysia citrodora, also sold as A. triphylla or Lippia citriodora) is a deciduous shrub from South America. Its narrow, pointed leaves smell powerfully of lemon when touched, and in summer it carries loose sprays of tiny white or pale lilac flowers. Where winters are mild it can reach 1.5–2.5 m (5–8 ft), but it stays much smaller in a container.' ) .
					$p( 'The RHS rates it H3, half hardy. That is why a pot makes sense on a balcony or patio: you grow it outside in summer and carry it under cover for the winter.' ) .

					$h2( 'Choosing the pot and compost' ) .
					$p( 'Pick a pot with plenty of holes in the base and a size you can still lift or wheel indoors. Herbs that stay in a pot for years appreciate a deep root run. Fill it with a peat-free, loam-based potting compost, which the RHS recommends for lemon verbena grown under glass. More on mixes in <a href="/plant-care/compost-for-containers/">compost for containers</a>.' ) .
					$p( 'Buy plants in late spring, once frosts are over: herbs planted in cold, wet compost often suffer root damage. If a plant has spent its life in a warm shop, harden it off gradually; see <a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>.' ) .

					$h2( 'Sun, water and food' ) .
					$p( 'In a cool climate lemon verbena needs full sun and a sheltered position. Keep the compost evenly moist through summer without letting it become soggy, and check pots often in hot spells (our <a href="/plant-care/how-often-to-water-container-plants/">watering guide</a> has the routine).' ) .
					$p( 'It is a hungry plant in a pot. Illinois Extension suggests a general-purpose liquid fertiliser about every two weeks during the growing season; the general method is in <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.' ) .

					$h2( 'Picking and using the leaves' ) .
					$p( 'Pick leaves whenever you need them through the growing season. Regular picking also keeps the plant tidy. The flavour is best just before the flower spikes open.' ) .
					$p( 'Infuse the leaves for tea, or use them in cold drinks, fruit salads, desserts, sauces and marinades for fish and chicken. Heat dulls the lemon flavour a little. The scent survives drying well; for storing leaves, see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Bringing it in for winter' ) .
					$p( 'Move the pot indoors before the first frost and stand it in a bright place, such as a cool porch, greenhouse or unheated room. As temperatures fall the plant drops its leaves and rests in a semi-dormant state. Keep the compost slightly moist but never soggy, and feed less often than in summer. Our guide to <a href="/plant-care/protect-pots-in-winter/">protecting pots in winter</a> covers the rest.' ) .
					$p( 'Return it outside in late spring, after the last frost.' ) .

					$h2( 'Pruning and new plants' ) .
					$p( 'Lemon verbena belongs to RHS pruning group 6, the shrubs that flower on the current year\'s growth. In early to mid-spring, cut the previous year\'s stems back to within one or two buds of the woody framework and remove thin, weak or dead shoots. Do not prune in winter: frost can damage the new shoots that follow.' ) .
					$p( 'As a plant ages, it turns woody and its leaves get poorer. Soft tip cuttings root readily and grow quickly, so keep a young plant or two on the go and replace the old one. The RHS lists the plant as generally free of pests and diseases.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving the pot out after the first frost: it is only half hardy.',
							'Panicking when the leaves drop in autumn: it is deciduous.',
							'Feeding as hard in winter as in summer: cut back while it rests.',
							'Pruning in winter: wait for early to mid-spring.',
							'Keeping one old plant for years: root cuttings to replace it.',
						)
					),
				'image_prompt' => 'A bushy lemon verbena shrub about 60 cm tall with narrow, pointed, bright green leaves held in groups of three along the stems and loose sprays of tiny white to pale lilac flowers at the tips, growing in a large terracotta pot on a sunny, sheltered patio, late summer light.' . $photo_end,
				'pin_prompt'   => 'A lemon verbena plant with long, narrow, pointed bright green leaves in a terracotta pot on a sunny balcony, a glass teapot with a few fresh leaves infusing on a small table beside it, photographed vertically.' . $pin_end,
			),

			'calendula-in-pots'       => array(
				'title'        => 'How to Grow Calendula (Pot Marigold) in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 9, 10 ),
					'harvest' => array( 6, 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Calendula, or pot marigold, is an easy hardy annual whose orange or yellow petals are edible, with a slightly peppery taste. Sow it in spring or autumn in a pot of fairly lean peat-free compost, keep it in sun, and deadhead often for flowers from summer into autumn.',
				'facts'        => array(
					'short_name'     => 'Calendula',
					'botanical_name' => 'Calendula officinalis',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun for most flowers; tolerates light shade',
					'pot_size'       => 'Allow about 30 cm (1 ft) per plant, the RHS spacing',
					'hardiness'      => 'H5',
					'watering'       => 'Regularly in summer; never waterlogged',
					'harvest'        => 'Petals from summer to early autumn',
					'season'         => 'Hardy annual; sow in spring or in September–October',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow from late March to May, or in September and October for earlier flowers next year.' ),
						array( 'point' => 'Allow about 30 cm (1 ft) of pot space for each plant.' ),
						array( 'point' => 'Avoid rich compost and extra fertiliser when sowing: lush growth means fewer flowers.' ),
						array( 'point' => 'Deadhead often and pinch out the shoot tips to keep plants bushy and flowering.' ),
						array( 'point' => 'Eat only the petals of plants you are sure are Calendula officinalis.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Calendula officinalis Fiesta Gitana Group', 'note' => 'Holds the RHS Award of Garden Merit. A bushy annual about 30 cm tall with double flowers in light orange and yellow, sometimes two-toned. A good size for pots. Rated H5.' ),
						array( 'name' => 'Calendula officinalis \'Indian Prince\'', 'note' => 'Taller, at 0.5–1 m on the RHS profile. Better for a large patio pot than a window box.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough with drainage holes', 'badge' => '', 'note' => 'Roughly 30 cm of width per plant.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'No extra fertiliser at sowing time.', 'url' => '' ),
						array( 'name' => 'Calendula seed', 'badge' => '', 'note' => 'One packet sows several pots.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Are calendula petals safe to eat?', 'answer' => 'The RHS lists pot marigold (Calendula officinalis) among edible flowers, with a peppery taste and strong colour. Be certain of the plant: French marigold is a different species, so check the botanical name. People prone to pollen allergies should not eat flowers, and bought plants not labelled for culinary use need at least three months of growing on before you pick.' ),
						array( 'question' => 'Is calendula the same as a French marigold?', 'answer' => 'No. Calendula officinalis is pot marigold, a hardy annual with slightly hairy, aromatic leaves and daisy-like flowers. French marigold is a separate summer bedding plant with a much more pungent flavour. Look for Calendula officinalis on the seed packet.' ),
						array( 'question' => 'Should I sow calendula in autumn or spring?', 'answer' => 'Both work. Autumn sowings in September or October survive winter and flower much earlier the next year, though they may need a cloche or fleece in hard frost. Spring sowings, from late March to May, flower later in summer.' ),
						array( 'question' => 'Will calendula come back next year?', 'answer' => 'Each plant lives only one season, but calendula often self-seeds. Leave a few flower heads to set seed, or collect it and sow it yourself.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — Calendula (pot marigold)', 'url' => 'https://www.rhs.org.uk/plants/calendula' ),
						array( 'title' => 'RHS — Calendula officinalis (plant profile and hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/62350/calendula-officinalis/details' ),
						array( 'title' => 'RHS — Calendula officinalis Fiesta Gitana Group', 'url' => 'https://www.rhs.org.uk/plants/106085/calendula-officinalis-fiesta-gitana-group/details' ),
						array( 'title' => 'RHS — Edible flowers', 'url' => 'https://www.rhs.org.uk/herbs/edible-flowers' ),
						array( 'title' => 'RHS — How to sow hardy annuals in spring', 'url' => 'https://www.rhs.org.uk/plants/types/annuals-biennials/sowing-spring' ),
						array( 'title' => 'RHS — How to grow hardy annuals from seed in autumn', 'url' => 'https://www.rhs.org.uk/plants/types/annuals-biennials/sowing-autumn' ),
						array( 'title' => 'RHS — How to grow annuals and biennials', 'url' => 'https://www.rhs.org.uk/plants/types/annuals-biennials/growing-guide' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Pot marigold, the edible one' ) .
					$p( 'Calendula officinalis is a bushy hardy annual with slightly hairy, aromatic leaves and daisy-like flowers, usually bright orange but also cream, pale yellow or pale orange, sometimes with a dark centre. It flowers from summer into early autumn and draws in bees and other pollinators.' ) .
					$p( 'French marigold, a summer bedding plant, is a different plant altogether, so check the botanical name on the packet. This guide is about calendula only; for another flower you can eat, see <a href="/plants/nasturtiums-in-pots/">nasturtiums in pots</a>.' ) .

					$h2( 'Pot, compost and light' ) .
					$p( 'Calendula is unfussy and does well in poor, dry soil; very wet or very rich conditions give weak growth. Use a pot or trough with drainage holes and peat-free multi-purpose compost, and add no fertiliser at sowing time. The RHS spaces plants 30–37 cm (12–15 in) apart, so give each one about 30 cm (1 ft) of container width.' ) .
					$p( 'It flowers best in full sun, puts up with light shade, and will not flower in deep shade. Most plants reach 45–60 cm (18 in–2 ft); compact kinds such as Fiesta Gitana stay around 30 cm (1 ft).' ) .

					$h2( 'When and how to sow' ) .
					$list(
						array(
							'<strong>Spring:</strong> from late March to May, once the compost is no longer cold and wet. Plants flower later in summer.',
							'<strong>Autumn:</strong> in September and October. The young plants overwinter and flower much earlier the next year. Cover them with a cloche or fleece if a hard frost is forecast.',
							'<strong>Method:</strong> scatter the seed thinly over moist compost, cover it lightly and water with a fine rose. Thin the seedlings to the final spacing.',
							'<strong>Under cover:</strong> you can also sow in pots at about 18 °C (64 °F), then grow the seedlings on cooler, around 15 °C (59 °F), harden them off and plant them out.',
						)
					) .
					$p( 'For sowing indoors step by step, see <a href="/plant-care/how-to-sow-seeds-indoors/">how to sow seeds indoors</a>. Crowded seedlings can collapse with <a href="/problems/damping-off-seedlings/">damping off</a>, so sow thinly.' ) .

					$h2( 'Deadhead for more flowers' ) .
					$p( 'Pinch out the growing tips of young plants to make them bushier. Once flowering starts, remove faded flowers regularly: the plant keeps making new buds instead of setting seed. Cut plants back after the main flush.' ) .
					$p( 'Annuals in pots dry out quickly, so water regularly through summer without leaving the compost soggy; see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>. To boost flowering in a container, the RHS suggests an occasional high-potassium liquid feed such as tomato feed.' ) .

					$h2( 'Picking petals for the kitchen' ) .
					$p( 'The petals have a gentle peppery taste and bright colour. Scatter them over salads, or stir them into soups, stews and puddings. Pick young flowers on a dry morning, before the sun is strong, and give each one a shake to dislodge insects.' ) .
					$p( 'Be sure of the plant before eating any flower. A bought plant not sold for eating should grow on for at least three months before you pick, and only from its later flowers, to reduce pesticide residues. Anyone with a pollen allergy should avoid eating flowers. The petals can also be dried; see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Aphids and powdery mildew' ) .
					$p( 'Calendula can attract aphids and get powdery mildew, especially late in the season. No pesticides are approved for home gardeners to use on edible flowers, so cut back affected growth and let the plant regrow. See <a href="/problems/aphids-container-plants/">aphids on container plants</a> and <a href="/problems/powdery-mildew/">powdery mildew</a>.' ) .

					$h2( 'Seeds for next year' ) .
					$p( 'Each plant dies at the end of its season, but calendula self-seeds readily. Leave a few heads to ripen, or collect the seed and sow it yourself; <a href="/plant-care/how-to-save-seeds-from-your-plants/">how to save seeds</a> explains the steps.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Feeding at sowing time or using rich compost: you get leaves, not flowers.',
							'Forgetting to deadhead: the plant sets seed and stops flowering.',
							'Putting the pot in deep shade: it will not bloom.',
							'Mixing it up with French marigold: check the botanical name.',
							'Spraying flowers you plan to eat: no pesticide is approved for that.',
						)
					),
				'image_prompt' => 'A terracotta trough of pot marigolds, Calendula officinalis, with bright orange and soft yellow double daisy-like flowers above oblong, slightly hairy, pale green leaves, on a sunny balcony railing in high summer, a bee on one flower.' . $photo_end,
				'pin_prompt'   => 'Orange calendula flowers in a terracotta pot on a sunny patio, a small bowl of loose orange petals and a salad scattered with petals on a table beside it, photographed vertically.' . $pin_end,
			),

			'sorrel-in-pots'          => array(
				'title'        => 'How to Grow Sorrel in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6 ),
					'plant'   => array( 3, 4, 5, 6 ),
					'harvest' => array( 3, 4, 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'Sorrel is a hardy perennial with sharp, lemony leaves that you can pick from spring to autumn for many years. Plant it in a pot at least 30 cm (12 in) wide and 20 cm (8 in) deep, in sun or part shade, and cut off the flower stems so it keeps producing tender leaves.',
				'facts'        => array(
					'short_name'     => 'Sorrel',
					'botanical_name' => 'Rumex acetosa',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun or partial shade',
					'pot_size'       => 'At least 30 cm (12 in) wide and 20 cm (8 in) deep',
					'hardiness'      => 'H7',
					'watering'       => 'Keep the compost evenly moist in summer; avoid winter waterlogging',
					'harvest'        => 'Young leaves from spring to autumn',
					'season'         => 'Hardy perennial; dies back in winter, regrows in spring',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Use a container at least 30 cm (12 in) wide and 20 cm (8 in) deep, filled with half soil-based, half multi-purpose peat-free compost.' ),
						array( 'point' => 'Sun or partial shade both suit it; shade the pot during hot spells.' ),
						array( 'point' => 'Two or three plants are enough for most households.' ),
						array( 'point' => 'Snip off flower stems to keep fresh leaves coming and stop self-seeding.' ),
						array( 'point' => 'Divide the clump every four or five years to keep it productive.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Common sorrel (Rumex acetosa)', 'note' => 'A UK native with an upright clump of green leaves about 50 cm tall and wide, and a sour, lemony, slightly astringent taste. Its flower spikes can top 1 m. Rated H7.' ),
						array( 'name' => 'French or buckler-leaf sorrel (R. scutatus)', 'note' => 'Low and spreading, with juicy, grey-green, shield-shaped leaves and a citrus flavour. Rated H6. \'Silver Shield\' has silvery-green leaves.' ),
						array( 'name' => 'Red-veined sorrel (R. sanguineus)', 'note' => 'Green leaves with dark red veins and stems, sharp-tasting and decorative. Clumps reach 40–60 cm tall and about 30 cm wide.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 30 cm wide and 20 cm deep, with drainage holes', 'badge' => '', 'note' => 'A trough suits French sorrel\'s spreading habit.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based and multi-purpose compost', 'badge' => '', 'note' => 'Mixed half and half.', 'url' => '' ),
						array( 'name' => 'Sorrel seed or young plants', 'badge' => '', 'note' => 'Plants are mostly sold in spring and summer.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which sorrel is best for a pot?', 'answer' => 'All three garden sorrels grow in containers. French sorrel stays low and spreads, with mild citrus leaves for salads. Common sorrel is upright with a sharper taste. Red-veined sorrel is the most decorative. The RHS rates them all hardy across the UK.' ),
						array( 'question' => 'Is sorrel safe to eat?', 'answer' => 'The young leaves are eaten raw in salads or cooked like spinach, but the RHS notes that sorrel is harmful if eaten in large amounts, and suggests gloves when handling it. Use it as a sharp seasoning in modest quantities rather than as a main vegetable.' ),
						array( 'question' => 'Why are my sorrel leaves tough and bitter?', 'answer' => 'They are probably old. Sorrel leaves get tougher and more bitter with age, and flowering plants put less into new leaves. Remove old leaves and flower stems, keep the pot watered, and pick the young growth that follows.' ),
						array( 'question' => 'Does sorrel die in winter?', 'answer' => 'The leaves die back over winter and the plant sprouts again in spring. In a pot, the risk is waterlogged compost rotting the roots, so move it to a sheltered spot out of the rain.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow sorrel', 'url' => 'https://www.rhs.org.uk/herbs/sorrel/grow-your-own' ),
						array( 'title' => 'RHS — Rumex acetosa, common sorrel (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/41751/rumex-acetosa/details' ),
						array( 'title' => 'RHS — Rumex scutatus, French sorrel (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/16171/rumex-scutatus/details' ),
					),
				),
				'content'      =>
					$h2( 'Three sorrels to choose from' ) .
					$p( 'Sorrel is a long-lived perennial grown for its tangy leaves. They give salads, soups, sauces and egg dishes a fresh citrus sharpness. Three species are commonly grown, all hardy throughout the UK.' ) .
					$list(
						array(
							'<strong>French or buckler-leaf sorrel</strong> (Rumex scutatus): low and mat-forming, 15–45 cm (6–18 in) tall but spreading to about 1 m (3 ft), with juicy, grey-green, shield-shaped leaves. The best choice for salads.',
							'<strong>Common sorrel</strong> (R. acetosa): a native plant forming an upright clump about 50 cm (20 in) high and wide, with sour, lemony leaves. Its dock-like flower spikes can pass 1 m.',
							'<strong>Red-veined sorrel</strong> (a form of wood dock, R. sanguineus): rosettes of green leaves with dark red veins, 40–60 cm (16–24 in) tall, as good to look at as to eat.',
						)
					) .

					$h2( 'Pot, compost and position' ) .
					$p( 'A container at least 30 cm (12 in) across and 20 cm (8 in) deep is enough. Fill it with a 50:50 mix of peat-free soil-based and peat-free multi-purpose compost; the RHS notes that sorrel crops best in rich soil that holds moisture. A pot also stops it spreading through a border.' ) .
					$p( 'Sorrel grows in full sun or partial shade. Space plants 20–30 cm (8–12 in) apart, which in practice means two or three to a large trough.' ) .

					$h2( 'Sow seed or buy plants' ) .
					$p( 'All three sorrels come easily from seed. Indoors, sow about 1 cm (½ in) deep in modules of peat-free seed compost on a windowsill or in a propagator; at around 15 °C (59 °F) seedlings appear in one to two weeks. Pot them into 7.5 cm (3 in) pots when they have several leaves, and move them outside in late spring or early summer after <a href="/plant-care/how-to-harden-off-seedlings/">hardening off</a>.' ) .
					$p( 'You can also sow straight into the container outdoors from mid-spring to early summer, sparingly, and thin the seedlings to the spacing above. Young plants are sold in spring and summer and can go in from spring to early summer.' ) .

					$h2( 'Watering through the year' ) .
					$p( 'Compost in a pot dries out fast in warm weather, so check it often and keep it evenly moist; our <a href="/plant-care/how-often-to-water-container-plants/">container watering guide</a> has the routine. In hot, sunny spells, move the pot into shade to cut down on watering.' ) .
					$p( 'Winter brings the opposite problem. Waterlogged compost can rot the roots, so put the pot near a building where rain does not reach. The <a href="/plant-care/protect-pots-in-winter/">winter pot guide</a> has more on sheltering containers.' ) .

					$h2( 'Picking sorrel' ) .
					$p( 'Pick young leaves from the moment growth starts in spring until autumn. Regular picking keeps new, tender leaves coming; older ones turn tough and bitter, so strip those off. Use the leaves raw in salads and sandwiches, chopped over cooked food, or steamed like spinach.' ) .
					$p( 'The RHS plant profiles warn that sorrel is harmful if eaten in large amounts and suggest wearing gloves to handle it. Treat it as a sharp flavouring and use a few leaves at a time.' ) .

					$h2( 'Flower stems, dividing and pests' ) .
					$p( 'Cut out flower stems as they appear. This keeps the plant making leaves and stops it seeding itself everywhere; common sorrel\'s tall spikes in particular are best removed. Every four or five years, in spring or autumn, divide congested clumps and replant a vigorous piece in fresh compost.' ) .
					$p( 'Sorrel is usually robust. Protect seedlings and young leaves from <a href="/problems/slugs-and-snails/">slugs and snails</a>. Aphids sometimes gather on soft new growth, but treatment is rarely needed.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving the flower stems on: leaf production drops and seedlings pop up everywhere.',
							'Picking only big old leaves: they are tough and bitter.',
							'Eating it by the bowlful: use sorrel in small amounts.',
							'Letting the pot sit wet in winter: shelter it from rain.',
							'Never dividing it: an old, crowded clump crops poorly.',
						)
					),
				'image_prompt' => 'A wide 35 cm pot of common sorrel with upright clumps of bright green, arrow-shaped leaves, next to a smaller pot of red-veined sorrel with green leaves and dark red veins, on a partly shaded balcony in late spring.' . $photo_end,
				'pin_prompt'   => 'A trough of sorrel with fresh, arrow-shaped green leaves on a balcony ledge, a handful of picked young leaves on a wooden board beside it, photographed vertically from slightly above.' . $pin_end,
			),
		),
	),
);
