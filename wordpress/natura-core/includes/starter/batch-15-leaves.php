<?php
/**
 * Starter guides, batch 15 (rocket, spinach and winter leaves): rocket,
 * spinach, autumn and winter salads, leeks and microgreens grown in
 * containers on a balcony, patio or windowsill.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS agrees (winter salads p. 155, 166 and 216; leek 'King
 * Richard' in a pot p. 225); see design/sources/BACKYARD-HARVEST.md.
 * Hardiness ratings come from the RHS plant pages. Months are for a
 * temperate climate such as the UK.
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
	'name'   => __( 'Rocket, spinach and winter leaves', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'arugula-in-pots'                => array(
				'title'        => 'How to Grow Rocket in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7, 8, 9 ),
					'harvest' => array( 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'excerpt'      => 'Rocket is one of the easiest leaves for a pot: sow it thinly in a container at least 30 cm (1 ft) wide and you can start picking four to six weeks later. Salad rocket runs to seed quickly in summer heat, so sow a little every few weeks, or grow perennial wild rocket for a longer harvest.',
				'facts'        => array(
					'short_name'     => 'Rocket (arugula)',
					'botanical_name' => 'Eruca vesicaria subsp. sativa',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun in spring and autumn; light shade in midsummer',
					'pot_size'       => 'At least 30 cm (1 ft) wide',
					'hardiness'      => 'H4',
					'watering'       => 'Regularly in warm weather; do not let it dry out',
					'harvest'        => 'From 4–6 weeks after sowing',
					'season'         => 'Sow February to September',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Salad rocket is an annual that crops for a month or two; wild rocket is a perennial that keeps going for years.' ),
						array( 'point' => 'Pick a pot, trough or window box of 30 cm (1 ft) or more across and fill it with peat-free multi-purpose compost.' ),
						array( 'point' => 'Scatter seed thinly and cover it lightly; seedlings show within a few days.' ),
						array( 'point' => 'In June and July, move the pot into light shade so salad rocket is slower to flower.' ),
						array( 'point' => 'Take a few leaves from every plant rather than stripping one, so they all recover quickly.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Victoria', 'note' => 'An RHS recommended salad rocket with dark green, rounded leaves and a strong peppery taste.' ),
						array( 'name' => 'Sky Rocket', 'note' => 'An RHS recommended salad rocket with upright, fast-growing, strongly flavoured leaves.' ),
						array( 'name' => 'Runway', 'note' => 'An RHS recommended salad rocket with deeply toothed, peppery leaves.' ),
						array( 'name' => 'Wild rocket (Diplotaxis tenuifolia)', 'note' => 'A separate perennial plant with narrow, deeply cut leaves and a hotter flavour. It grows more slowly but crops over a much longer period.' ),
					),
					'products'   => array(
						array( 'name' => 'Trough, window box or pot at least 30 cm (1 ft) wide, with drainage holes', 'badge' => '', 'note' => 'Larger containers dry out less quickly.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For sowing straight into the final container.', 'url' => '' ),
						array( 'name' => 'Salad or wild rocket seed', 'badge' => '', 'note' => 'One packet covers many small sowings.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Optional: keeps flea beetles off for unmarked leaves.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What is the difference between wild rocket and salad rocket?', 'answer' => 'Salad rocket is an annual with larger, softer, milder leaves; it crops for a month or two and dies after flowering. Wild rocket is a perennial with narrow, divided, hotter leaves. It grows more slowly, but keeps cropping after it flowers and can last several years.' ),
						array( 'question' => 'Why has my rocket flowered so quickly?', 'answer' => 'Salad rocket flowers readily in hot, dry weather, and crowded plants flower sooner. Pinching out the flower stems buys a little time, but once it bolts the harvest is over. Sow again, thin seedlings to 15 cm (6 in), keep the compost moist and give summer sowings light shade.' ),
						array( 'question' => 'Can I eat rocket flowers?', 'answer' => 'Yes. The small four-petalled flowers have the same peppery bite as the leaves and can go into salads.' ),
						array( 'question' => 'Can rocket grow through winter?', 'answer' => 'With some cover, yes. Seed sown in August and September can crop into winter if the plants are kept in a greenhouse or another protected spot, and wild rocket may keep producing under a cloche or cold frame, then start again in early spring.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow rocket', 'url' => 'https://www.rhs.org.uk/vegetables/rocket/grow-your-own' ),
						array( 'title' => 'RHS — Eruca vesicaria subsp. sativa (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/73475/eruca-vesicaria-subsp-sativa/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
					),
				),
				'content'      =>
					$h2( 'Salad rocket or wild rocket?' ) .
					$p( 'Rocket, also sold as arugula or roquette, belongs to the mustard family. Two different plants go by the name, and they behave quite differently in a pot:' ) .
					$list(
						array(
							'<strong>Salad rocket</strong> (Eruca vesicaria subsp. sativa) is an annual. Its leaves are bigger, softer and milder. It gives pickings for a month or two, flowers fast in hot weather and then dies, so it needs sowing again and again.',
							'<strong>Wild rocket</strong> (Diplotaxis tenuifolia) is a perennial. Its long, deeply divided leaves taste hotter. It is slower to get going but crops through summer and autumn, carries on after flowering, and can live for several years in the same pot.',
						)
					) .
					$p( 'On a small balcony, a pot of each works well: wild rocket for a steady supply, and salad rocket for quick, tender leaves.' ) .

					$h2( 'Container and position' ) .
					$p( 'Almost any container suits rocket: a patio pot, a window box, a hanging basket or a growing bag. Go for something at least 30 cm (1 ft) wide, because a bigger volume of compost stays moist for longer. Fill it with peat-free multi-purpose compost; <a href="/plant-care/potting-mix-for-containers/">compost for containers</a> explains what a pot needs from it.' ) .
					$p( 'Spring and late-summer sowings do best in sun. For sowings made in early and midsummer, pick a cooler spot in light shade: salad rocket lasts longer there before it flowers.' ) .

					$h2( 'Sowing rocket' ) .
					$p( 'Sow from February to September. In February and March, start the seed indoors on a bright windowsill, in small pots or modules of moist peat-free seed compost; <a href="/plant-care/how-to-start-seeds-indoors/">sowing seeds indoors</a> covers the method. From April to early September you can sow outside.' ) .
					$list(
						array(
							'Moisten the compost in the final container.',
							'Scatter the seed thinly across the surface.',
							'Cover with a fine layer of compost, firm it gently and water well.',
							'Seedlings appear in just a few days. Thin them to about 15 cm (6 in) apart and eat the thinnings: crowded rocket bolts sooner.',
						)
					) .
					$p( 'Indoor-raised plants can go outside when they are about 10 cm (4 in) tall, after <a href="/plant-care/how-to-harden-off-seedlings/">hardening off</a>. Salad rocket is short-lived, so sow a small batch every few weeks; <a href="/plant-care/succession-planting-small-spaces/">succession sowing</a> explains how to plan it.' ) .

					$h2( 'Keep it from bolting' ) .
					$p( 'Rocket needs very little care beyond water and watching for slugs and snails. Compost in a container dries out quickly in warm weather, and dry plants run to seed early, so check the pot often; <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a> has the routine.' ) .
					$p( 'During hot spells, carry the pot into the shade to delay flowering. Pinching out flower stems on salad rocket helps for a short while only. Wild rocket keeps making leaves after it flowers; if it gets big and sprawling, trim it back and fresh growth follows.' ) .

					$h2( 'Picking rocket' ) .
					$p( 'The first leaves are usually ready four to six weeks after sowing. Young leaves are the mildest and most tender, and regular picking keeps new ones coming. Work along the pot taking a few leaves from each plant: a plant stripped bare is slow to recover. For the general method of cutting and regrowth, see <a href="/plants/salad-greens-in-pots/">cut-and-come-again salad leaves</a>.' ) .
					$p( 'Older leaves are still good lightly cooked or stirred into a sauce. The flowers are edible too. Once salad rocket has bolted, pull it out and use the pot for the next sowing.' ) .

					$h2( 'Pests' ) .
					$p( 'Slugs and snails go for seedlings and young plants, so check pots after damp nights. Flea beetles can pepper the leaves with tiny holes; the damage is only cosmetic, and <a href="/problems/flea-beetle-holes-in-leaves/">our flea beetle guide</a> explains how to keep them off.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing a whole packet at once: salad rocket only lasts a month or two, so sow little and often.',
							'Leaving seedlings crowded: thin them, or the plants flower early.',
							'Keeping salad rocket in full sun in July: move the pot to light shade.',
							'Picking one plant bare: spread your picking across the whole pot.',
							'Expecting wild rocket to be as quick as salad rocket: it is slower, but lasts far longer.',
						)
					),
				'image_prompt' => 'A rectangular terracotta-coloured trough of young salad rocket on a sunny balcony ledge in late spring. The plants are about 12 cm tall, with bright green, lobed leaves that are wider and rounded at the tips, a few leaves already picked from each plant. A pair of kitchen scissors rests on the trough edge; a metal railing and pale city buildings are softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a round grey pot of wild rocket on a balcony table, the plant a loose clump of long, narrow, deeply cut dark green leaves with a few small pale yellow four-petalled flowers. The pot sits in the lower half of the frame; the top third is calm, softly blurred pale wall, empty for a title. Soft summer daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'spinach-in-pots'               => array(
				'title'        => 'How to Grow Spinach in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 8, 9 ),
					'harvest' => array( 3, 4, 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'Spinach grows well in a pot of 30 cm (1 ft) or more across and as deep, sown in spring or in late summer and early autumn. It likes mild weather and moist compost: heat, cold or a dry pot make it bolt, so sow small batches and keep watering.',
				'facts'        => array(
					'short_name'     => 'Spinach',
					'botanical_name' => 'Spinacia oleracea',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun or light shade; shade at midday in summer',
					'pot_size'       => 'At least 30 cm (1 ft) wide and deep',
					'hardiness'      => 'H4',
					'watering'       => 'Often, in the morning; never let the pot dry out',
					'harvest'        => 'Baby leaves in about a month, larger leaves in two',
					'season'         => 'Sow in spring and late summer to early autumn',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Spinach grows best at mild temperatures, ideally 15–20 °C (60–70 °F), so spring and autumn suit it far better than midsummer.' ),
						array( 'point' => 'Sow straight into the final pot, 2.5 cm (1 in) deep: moving seedlings can make spinach bolt.' ),
						array( 'point' => 'Thin seedlings to 7.5 cm (3 in), then eat every other plant so the rest stand about 15 cm (6 in) apart.' ),
						array( 'point' => 'Water in the morning; damp compost overnight invites slugs and downy mildew.' ),
						array( 'point' => 'For winter leaves, choose a hardy variety and move the pot under cover before the cold sets in.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Missouri', 'note' => 'Holds the RHS Award of Garden Merit. The RHS describes it as slow to bolt and ideal for quick crops in containers.' ),
						array( 'name' => 'Amazon', 'note' => 'Holds the RHS Award of Garden Merit. Rounded, glossy leaves, resistant to downy mildew and bolting.' ),
						array( 'name' => 'Medania', 'note' => 'Holds the RHS Award of Garden Merit. Deep green, slightly puckered, tender leaves.' ),
						array( 'name' => 'Mikado', 'note' => 'Holds the RHS Award of Garden Merit. An oriental spinach with an upright habit and large, pointed leaves.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough 30 cm (1 ft) or more across and deep, with drainage holes', 'badge' => '', 'note' => 'A growing bag is an alternative.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each sowing.', 'url' => '' ),
						array( 'name' => 'Bolt-resistant spinach seed', 'badge' => '', 'note' => 'Worth having for spring sowings.', 'url' => '' ),
						array( 'name' => 'Cloche or biodegradable fleece', 'badge' => '', 'note' => 'For early spring and overwintered pots.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why does my spinach keep running to seed?', 'answer' => 'Spinach bolts when growth is checked: by hot, dry weather, by cold, or by a pot that dries out. Sow in spring or early autumn rather than midsummer, keep the compost moist, give the pot midday shade in warm weather, and choose a variety described as slow to bolt.' ),
						array( 'question' => 'Can I sow spinach indoors and plant it out?', 'answer' => 'You can, but it is usually better sown where it will grow, because transplanting can make it bolt. If you want an early start, sow one seed per module so the roots are barely disturbed when you plant it out at about 10 cm (4 in) tall.' ),
						array( 'question' => 'Is perpetual spinach the same plant?', 'answer' => 'No. Perpetual spinach is a type of leaf beet, close to chard, and crops for many months from one sowing. It is grown like <a href="/plants/swiss-chard-in-pots/">Swiss chard</a>.' ),
						array( 'question' => 'What leaf crop can I grow instead of spinach in hot summers?', 'answer' => 'New Zealand spinach (Tetragonia tetragonoides) is a different, tender plant that grows well in heat and full sun, and is used in the same way.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow spinach', 'url' => 'https://www.rhs.org.uk/vegetables/spinach/grow-your-own' ),
						array( 'title' => 'RHS — Spinacia oleracea (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/105498/spinacia-oleracea/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'A crop for the cool seasons' ) .
					$p( 'Spinach is fast and compact, which makes it a good fit for a pot. It has one weakness: it bolts, sending up a flower stalk that turns the leaves bitter. Mild weather, ideally between 15 and 20 °C (60–70 °F), and compost that never dries out keep it leafy. That is why the best sowings are in spring and from late summer into early autumn.' ) .
					$p( 'Savoy types have big, crinkled leaves; smooth-leaved types are flatter, more upright and usually tougher, and they cope with warm weather a little better. For leaves through winter, check the packet and choose a hardy variety.' ) .

					$h2( 'Pot and position' ) .
					$p( 'A growing bag, or a pot no less than 30 cm (1 ft) across and as deep, holds enough compost not to dry out too fast. Peat-free multi-purpose compost suits it; <a href="/plant-care/potting-mix-for-containers/">our compost guide</a> covers what makes a good mix.' ) .
					$p( 'Spinach grows in sun or light shade. Spring and winter crops need the sunniest spot you have; in summer, a place out of the hot midday sun holds off bolting.' ) .

					$h2( 'When and how to sow' ) .
					$list(
						array(
							'<strong>Mid to late spring</strong> for leaves in late spring and summer. Very early sowings tend to bolt; protect them with a cloche or fleece.',
							'<strong>Late summer to early autumn</strong> for leaves in autumn and early spring, using a hardy variety. Wait if late summer is still very hot, but sow early enough for plants to establish before winter.',
						)
					) .
					$p( 'Scatter the seed thinly 2.5 cm (1 in) deep across the moist compost and water it in. Spinach is best sown where it is to grow. Repeat every few weeks in each season for a steady supply; <a href="/plant-care/succession-planting-small-spaces/">succession sowing</a> shows how to time it.' ) .

					$h2( 'Thinning and spacing' ) .
					$p( 'When the seedlings are big enough to handle, thin them to 7.5 cm (3 in) apart, keeping the strongest. A few weeks later, pull every second plant for salad, leaving the rest about 15 cm (6 in) apart. Good spacing lets air move around the leaves, which helps prevent downy mildew. If you only want baby leaves, you can skip thinning.' ) .

					$h2( 'Watering and winter cover' ) .
					$p( 'Spinach is thirsty, and plants in containers are especially at risk: a lack of water halts growth and brings on flowering. Check the pot often and water early in the day. Watering in the evening leaves the compost damp overnight, which attracts slugs and snails and favours downy mildew. <a href="/plant-care/how-often-to-water-container-plants/">Our watering guide</a> covers the routine.' ) .
					$p( 'From October, cover overwintering plants with a cloche or biodegradable fleece unless you live somewhere mild, or move the pot into a greenhouse or cold frame before hard weather. Give early spring sowings the same protection.' ) .

					$h2( 'Harvest' ) .
					$p( 'Baby leaves can be ready in about a month and full-sized leaves in about two. Either pick a few leaves from every plant every few weeks until they start to flower, or wait until the plants are well established and cut the lot just above the base: plants with good roots usually regrow for at least one more cut. Leaves shrink a lot when cooked, so pick plenty.' ) .
					$p( 'As soon as a flower stalk appears, the leaves turn bitter. Pull the plant out and compost it.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing in midsummer heat: germination is poor and plants bolt.',
							'Starting it in trays and moving it: sow direct, or one seed per module.',
							'Letting the pot dry out even once: growth checks and flowering follows.',
							'Crowding the plants: thin to 15 cm (6 in) to keep downy mildew away.',
							'Choosing any variety for an autumn sowing: pick a hardy one to stand the winter.',
						)
					),
				'image_prompt' => 'A wide, deep charcoal-grey pot of young spinach on a lightly shaded patio in spring. The plants are compact rosettes of smooth, glossy, dark green oval leaves on short stalks, about 15 cm tall, evenly spaced in dark moist compost, with a few outer leaves freshly picked. A wooden fence and green foliage are softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a hand-sized bunch of fresh baby spinach leaves, smooth and dark green, lying in a small wooden bowl beside a pot of growing spinach rosettes on a balcony floor. The pot and bowl sit in the lower half of the frame; the top third is calm, softly blurred pale wall, empty for a title. Soft morning light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'asian-greens-in-pots' => array(
				'title'        => 'How to Grow Winter and Oriental Salad Leaves in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 7, 8, 9 ),
					'harvest' => array( 9, 10, 11, 12, 1, 2 ),
				),
				'excerpt'      => 'Mizuna, mibuna, oriental mustards and hardy lettuce are the salads to sow from midsummer to early autumn for picking through the colder months. Sow them in a pot at least 30 cm (1 ft) wide and keep it under a cloche, in a cold frame or on a sunny windowsill once winter arrives.',
				'facts'        => array(
					'short_name'     => 'Mizuna and oriental salad leaves',
					'botanical_name' => 'Brassica rapa subsp. nipposinica var. laciniata (mizuna)',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun; light shade in warm weather',
					'pot_size'       => 'At least 30 cm (1 ft) wide',
					'hardiness'      => 'H5',
					'watering'       => 'Regularly while growing; sparingly under cover in winter',
					'harvest'        => 'First baby leaves in about a month; slow regrowth in winter',
					'season'         => 'Sow July to September for autumn and winter',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow oriental leaves from midsummer onwards: spring sowings tend to flower instead of making leaves.' ),
						array( 'point' => 'Mizuna, mibuna, mustards, komatsuna, corn salad, land cress and hardy lettuce all suit autumn and winter pots.' ),
						array( 'point' => 'A container at least 30 cm (1 ft) wide holds enough compost to stay moist.' ),
						array( 'point' => 'In winter, keep the pot under a cloche, in a cold frame or greenhouse, or indoors on a sunny windowsill.' ),
						array( 'point' => 'Expect slow regrowth after each cut in the cold months: sow enough to pick from several plants.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Mizuna', 'note' => 'Loose rosettes of feathery, serrated leaves with a mild peppery taste. The RHS rates it H5.' ),
						array( 'name' => 'Mizuna Kyoto', 'note' => 'The RHS recommends it as a well-flavoured, very hardy mizuna that can be sown all year round.' ),
						array( 'name' => 'Mibuna', 'note' => 'Denser clumps of narrow, smooth-edged dark green leaves with a light mustard flavour.' ),
						array( 'name' => 'Mustard Red Giant', 'note' => 'Purple, frilly-edged leaves that the RHS describes as usable in salads even into winter. Rated H5.' ),
						array( 'name' => 'Lettuce Winter Density', 'note' => 'A hardy cos lettuce with an RHS Award of Garden Merit, for sowing in September or October under cover.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 30 cm (1 ft) wide, with drainage holes', 'badge' => '', 'note' => 'Light enough to carry under cover when frost comes.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For sowing and growing on.', 'url' => '' ),
						array( 'name' => 'Winter salad seed mix', 'badge' => '', 'note' => 'Mixes often combine mizuna, rocket and mustards.', 'url' => '' ),
						array( 'name' => 'Cloche or small cold frame', 'badge' => '', 'note' => 'Keeps winter rain and frost off the leaves.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why did my mizuna flower when I sowed it in spring?', 'answer' => 'Cold weather followed by lengthening days makes oriental greens flower early, and hot, dry spells do the same. That is why they are best sown from midsummer onwards, as days shorten.' ),
						array( 'question' => 'What is the difference between mizuna and mibuna?', 'answer' => 'Both are Japanese greens. Mizuna has feathery, serrated leaves and a mild peppery taste; mibuna makes bigger, denser clumps of narrow, smooth-edged leaves with a light mustard flavour.' ),
						array( 'question' => 'Do winter salads need protection on a balcony?', 'answer' => 'For steady picking, yes. The plants are hardy, but harsh, wet weather spoils the leaves. A cloche, a cold frame or an unheated greenhouse keeps them in good condition; in winter they can also sit on a sunny windowsill indoors.' ),
						array( 'question' => 'Are mustard leaves too hot for salad?', 'answer' => 'Young mustard leaves are milder and add a spicy note to mixed salads. Larger leaves are stronger and are better lightly cooked or stir-fried.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow mizuna and mibuna', 'url' => 'https://www.rhs.org.uk/vegetables/mizuna-mibuna/grow-your-own' ),
						array( 'title' => 'RHS — Vegetables: growing for winter', 'url' => 'https://www.rhs.org.uk/vegetables/growing-for-winter' ),
						array( 'title' => 'RHS — Cut and come again salads', 'url' => 'https://www.rhs.org.uk/vegetables/cut-come-again-salads' ),
						array( 'title' => 'RHS — How to grow lettuce', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — Brassica rapa subsp. nipposinica var. laciniata (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/201459/brassica-rapa-subsp-nipposinica-var-laciniata/details' ),
						array( 'title' => 'RHS — Brassica juncea \'Red Giant\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/280714/brassica-juncea-red-giant/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Salads for the dark half of the year' ) .
					$p( 'Most summer salads give up as the days shorten, but a group of tough, leafy plants keeps going. Oriental greens such as mizuna and mibuna are cool-season crops: they grow best in the mild, damp weather of autumn, and late sowings carry on into winter with a little shelter. Alongside them, the RHS suggests oriental mustards, komatsuna, corn salad (lamb\'s lettuce), land cress and rocket, plus hardy winter lettuce.' ) .
					$p( 'This guide is about timing and shelter for these cold-season leaves. For summer pots of mixed baby leaves, see <a href="/plants/salad-greens-in-pots/">cut-and-come-again salad leaves</a>; for whole heads of lettuce, see <a href="/plants/lettuce-in-pots/">lettuce in pots</a>. Rocket has <a href="/plants/arugula-in-pots/">its own guide</a> too.' ) .

					$h2( 'Choose your leaves' ) .
					$list(
						array(
							'<strong>Mizuna</strong>: loose rosettes about 20 cm (8 in) tall of finely cut, feathery leaves. Mild and peppery. The RHS rates it H5, hardy in most of the UK even in severe winters.',
							'<strong>Mibuna</strong>: narrow, strap-like, smooth-edged leaves with a gentle mustard flavour.',
							'<strong>Oriental mustards</strong>: from mild to hot. Red Giant has purple, frilly leaves and is also rated H5.',
							'<strong>Corn salad and land cress</strong>: small, hardy leaves for the coldest months.',
							'<strong>Winter lettuce</strong>: hardy varieties such as Winter Density, sown in September or October and kept under cover.',
						)
					) .
					$p( 'Winter salad seed mixes often combine several of these in one packet.' ) .

					$h2( 'When to sow' ) .
					$p( 'Timing matters more than anything else. Oriental leaves sown in spring tend to bolt, because cold nights and lengthening days push them into flower. Sow from midsummer onwards instead, in July and August outdoors, and in late summer or early autumn for plants that will spend winter under cover. Spinach and winter lettuce also go in around September for picking through winter; <a href="/plants/spinach-in-pots/">spinach in pots</a> covers that crop in detail.' ) .
					$p( 'Sow small batches a few weeks apart, so one pot is coming on while you pick another.' ) .

					$h2( 'Sowing in a pot' ) .
					$p( 'Choose a container at least 30 cm (1 ft) wide, as smaller ones dry out too fast, and fill it with peat-free multi-purpose compost (<a href="/plant-care/potting-mix-for-containers/">compost for containers</a> has more on choosing it). Scatter the seed thinly or sow in short rows about 1 cm (½ in) deep, then water. Mizuna and mibuna come up in about a week.' ) .
					$p( 'For pickings of small leaves, thin the plants to 10–15 cm (4–6 in) apart; for bigger leaves, give them about 20 cm (8 in). Seed can also be started in modules indoors and planted into the pot after a few weeks; <a href="/plant-care/how-to-start-seeds-indoors/">sowing seeds indoors</a> explains how.' ) .

					$h2( 'Shelter through winter' ) .
					$p( 'These plants are hardy, but cold rain and wind soon ruin tender leaves. To keep pickings coming, give the pot some cover before winter sets in:' ) .
					$list(
						array(
							'a cloche or plastic-free fleece over the pot outside, enough in mild areas;',
							'a cold frame on the balcony floor; you can build one with <a href="/diy-projects/make-a-mini-cold-frame/">our mini cold frame project</a>;',
							'an unheated greenhouse or porch;',
							'a sunny windowsill indoors, which also works for autumn-sown salads.',
						)
					) .
					$p( 'Growth is slow in the depths of winter, so the pot needs much less water than in summer; check it rather than watering by habit. For general cold-weather care of containers, see <a href="/plant-care/protect-pots-in-winter/">protecting pots in winter</a>.' ) .

					$h2( 'Picking in the cold months' ) .
					$p( 'Start taking baby leaves about a month after sowing, once the plants are 8–10 cm (3–4 in) tall. Take a few outer leaves from each plant; mizuna can give up to five pickings this way before it flowers. You can also cut whole rosettes after six to eight weeks, about 5 cm (2 in) above the compost, and they should sprout again.' ) .
					$p( 'In winter, even under cover, plants take much longer to regrow after a cut. Pick lightly from many plants rather than heavily from a few. When spring comes and the plants try to flower, the buds and flowers of mizuna and mibuna are edible too.' ) .

					$h2( 'Pests' ) .
					$p( 'Oriental greens are tough and fairly trouble-free. Slugs and snails like the young plants, especially in damp weather. Flea beetles are a common problem on these leaves; see <a href="/problems/flea-beetle-holes-in-leaves/">tiny holes in leaves</a>. As members of the cabbage family, they can also attract <a href="/problems/caterpillars-on-brassicas/">caterpillars</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing mizuna and mustards in early spring: they flower instead of leafing up.',
							'Leaving the pot uncovered in a wet, windy winter: the leaves get battered.',
							'Cutting the whole pot hard in December: regrowth is very slow until spring.',
							'Sowing too late in autumn: plants need to be growing well before the coldest weather.',
							'Watering a winter pot as often as a summer one: growth is slow and soggy compost does no good.',
						)
					),
				'image_prompt' => 'A wide wooden trough of winter salad leaves inside a small clear-lidded cold frame on a city balcony in late autumn. Visible plants: feathery, finely cut bright green mizuna rosettes, frilly purple-red mustard leaves, and small rosettes of dark green lamb\'s lettuce, all about 10–15 cm tall in moist dark compost. The lid is propped open; low, soft autumn sunlight and a blurred railing behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a terracotta pot of mixed winter salad leaves, feathery green mizuna and frilly purple mustard, on a sunny indoor windowsill on a grey winter day, a light frost visible on the glass. The pot sits in the lower half of the frame; the top third is calm, softly blurred pale window light, empty for a title. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'leeks-in-pots'                 => array(
				'title'        => 'How to Grow Leeks in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'patio', 'balcony' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6 ),
					'plant'   => array( 5, 6, 7 ),
					'harvest' => array( 8, 9, 10, 11, 12, 1, 2, 3 ),
				),
				'excerpt'      => 'Leeks are happiest in the ground, but a large, deep pot can grow baby leeks easily and a few full-sized ones with care: the RHS suggests four or five mature leeks in a container about 40 cm (16 in) wide. Sow in spring, plant the seedlings deep when they are pencil-thick, and pick from late summer through winter.',
				'facts'        => array(
					'short_name'     => 'Leek',
					'botanical_name' => 'Allium porrum',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun; tolerates partial shade',
					'pot_size'       => 'About 40 cm (16 in) wide and deep for 4–5 mature leeks',
					'hardiness'      => 'H4',
					'watering'       => 'Regularly all season in a container; keep water off the leaves',
					'harvest'        => 'Baby leeks after about 2 months; full size after about 6',
					'season'         => 'Sow February to June; plant May to July',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Baby leeks are the easiest leek crop for a pot; mature ones need a large, deep container and steady care.' ),
						array( 'point' => 'Sow 1.5 cm (¾ in) deep from late winter indoors, or in March and April outside.' ),
						array( 'point' => 'Transplant when seedlings are about 20 cm (8 in) tall and as thick as a pencil.' ),
						array( 'point' => 'Drop each one into a hole 15 cm (6 in) deep and fill the hole with water, not compost.' ),
						array( 'point' => 'Hardy leeks can stay in the pot through winter and be pulled as you need them.' ),
					),
					'varieties'  => array(
						array( 'name' => 'King Richard', 'note' => 'An early variety. Backyard Harvest describes it as suitable for pots, standing until December in milder areas and needing no earthing up.' ),
						array( 'name' => 'Krypton', 'note' => 'Holds the RHS Award of Garden Merit. Compact, upright plants that mature from December from a spring sowing.' ),
						array( 'name' => 'Stamford', 'note' => 'Holds the RHS Award of Garden Merit. An early, high-yielding F1 hybrid that bulks up quickly and evenly.' ),
						array( 'name' => 'Oarsman', 'note' => 'Holds the RHS Award of Garden Merit. A British-bred F1 hybrid for winter, resistant to rust.' ),
					),
					'products'   => array(
						array( 'name' => 'Large, deep pot about 40 cm (16 in) wide, with drainage holes', 'badge' => '', 'note' => 'Room for four or five mature leeks, or more baby leeks.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For the final container.', 'url' => '' ),
						array( 'name' => 'Peat-free seed compost and modules', 'badge' => '', 'note' => 'For sowing indoors in late winter.', 'url' => '' ),
						array( 'name' => 'Large dibber or old trowel handle', 'badge' => '', 'note' => 'Makes the deep planting holes.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Covers the pot against leek pests.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How many leeks fit in one pot?', 'answer' => 'The RHS suggests four or five mature leeks in a pot about 40 cm (16 in) wide, set 15–20 cm (6–8 in) apart. Baby leeks can go closer, about 10 cm (4 in) apart, so the same pot holds more.' ),
						array( 'question' => 'Why plant leeks in deep holes?', 'answer' => 'Deep planting keeps the lower stem in the dark, so it grows into the long white shank you eat. It also anchors the plant against winter wind.' ),
						array( 'question' => 'What should I do if my leek flowers?', 'answer' => 'Cut off the flower stalk as soon as you see it, or the centre of the leek turns tough and fibrous. The tightly closed buds, called scapes, are good lightly cooked.' ),
						array( 'question' => 'Can leeks stay in a pot outside all winter?', 'answer' => 'Yes. Leeks are hardy, and the RHS rates the species H4. Established plants need no frost protection, and winter varieties can be pulled whenever you want them. Frost may even sweeten the flavour.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow leeks', 'url' => 'https://www.rhs.org.uk/vegetables/leeks/grow-your-own' ),
						array( 'title' => 'RHS — Allium porrum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/106043/allium-porrum/details' ),
						array( 'title' => 'RHS — Leek moth', 'url' => 'https://www.rhs.org.uk/biodiversity/leek-moth' ),
						array( 'title' => 'RHS — Vegetables: growing for winter', 'url' => 'https://www.rhs.org.uk/vegetables/growing-for-winter' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Can you really grow leeks in a pot?' ) .
					$p( 'Leeks suit open ground best, and they take their time: about six months from sowing to full size. In a container, the RHS says baby leeks are the easiest option, while full-sized leeks are possible if you look after them well. The reward is a winter crop that stands outside in the cold and waits until you need it.' ) .
					$p( 'If space is tight, grow baby leeks: they are ready in a couple of months and can be planted closer together. For full-sized stems, choose a winter variety and a big pot.' ) .

					$h2( 'The pot and the position' ) .
					$p( 'Choose a large, deep container with drainage holes; one about 40 cm (16 in) wide holds four or five mature leeks. Fill it with peat-free multi-purpose compost; <a href="/plant-care/potting-mix-for-containers/">compost for containers</a> covers what to look for. Start with fresh compost rather than a pot that has just grown onions, garlic or chives: the RHS advises against growing leeks where members of the onion family grew in recent years.' ) .
					$p( 'Stand the pot in full sun if you can, though leeks tolerate partial shade.' ) .

					$h2( 'Sowing' ) .
					$p( 'For an early start, sow indoors from late winter. Fill small pots or modules with peat-free seed compost, sow thinly about 1.5 cm (¾ in) deep, and keep them in good light above 10 °C (50 °F). Move them on to bigger pots if roots appear at the base. After about eight weeks they should reach 20 cm (8 in).' ) .
					$p( 'Outdoors, the main sowing months are March and April; later varieties can follow in May and June for winter and spring picking. Cold spells can make early sowings bolt, so cover them with fleece if temperatures drop.' ) .

					$h2( 'Planting deep' ) .
					$p( 'Leeks are ready to move when they are about 20 cm (8 in) tall and pencil-thick. <a href="/plant-care/how-to-harden-off-seedlings/">Harden off</a> indoor-raised plants first. Then:' ) .
					$list(
						array(
							'Make holes in the compost about 15 cm (6 in) deep and 5 cm (2 in) across, with a large dibber or trowel handle.',
							'Space them 15–20 cm (6–8 in) apart, or about 10 cm (4 in) for baby leeks.',
							'Trim the roots of each seedling to about 2.5 cm (1 in) with scissors.',
							'Drop one leek into each hole and fill the hole with water. This settles the compost around the roots; there is no need to backfill.',
						)
					) .

					$h2( 'Care through summer' ) .
					$p( 'In the ground, leeks only need water in long dry spells, but in a container the compost dries out quickly, so water regularly all season; see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>. Aim at the compost rather than the leaves: wet foliage encourages leek rust, a fungus that causes orange spots.' ) .
					$p( 'Several insects attack leeks, including allium leaf miner and leek moth, whose caterpillars leave white patches on the leaves and then tunnel into the stems; <a href="/problems/leek-moth/">leek moth and allium leaf miner</a> shows how to tell them apart. Covering the pot with insect-proof mesh keeps them out. If a leek starts to flower, remove the stalk straight away.' ) .

					$h2( 'Harvest and winter' ) .
					$p( 'Leeks can be pulled at any size. Start with a few small ones from late summer, which leaves more room for the rest to thicken. Ease each one out gently, taking only what you need. Late varieties stand through winter into spring: leeks are hardy, and established plants need no frost protection.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Using a small or shallow pot: leeks need depth for their long stems.',
							'Planting at surface level: set them deep so the shank blanches.',
							'Backfilling the planting holes: water them in and let the compost settle by itself.',
							'Splashing the leaves when watering: it encourages rust.',
							'Ignoring a flower stalk: the stem soon turns tough.',
						)
					),
				'image_prompt' => 'A tall, deep dark-green ceramic pot about 40 cm wide on a sunny patio in early winter, holding five mature leeks with straight, thick white shanks rising into fans of flat, blue-green, strap-shaped leaves about 60 cm tall. A light frost on the leaf tips; one leek lies freshly pulled on the paving beside the pot, roots and white stem visible. Brick wall softly blurred behind, low winter sun. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a tall pot of leeks on a balcony in late autumn, the plants showing upright white stems and fans of flat blue-green leaves. The pot sits in the lower half of the frame; the top third is calm, softly blurred pale sky, empty for a title. Cool, soft daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'microgreens-on-a-windowsill'   => array(
				'title'        => 'How to Grow Microgreens on a Windowsill',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill' ),
				'months'       => array(
					'sow'     => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
					'harvest' => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'excerpt'      => 'Microgreens are vegetable and herb seedlings sown thickly in a shallow tray of compost and cut once their first true leaves appear, usually one to three weeks after sowing. A bright windowsill is all they need, so you can grow them in any month of the year.',
				'facts'        => array(
					'short_name' => 'Microgreens',
					'difficulty' => 'Easy',
					'sun'        => 'A warm, bright or sunny windowsill',
					'pot_size'   => 'A shallow seed tray or tub with drainage holes',
					'watering'   => 'Keep the compost damp but never soggy',
					'harvest'    => 'About 1–3 weeks after sowing',
					'season'     => 'All year indoors',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Microgreens are a way of growing, not a type of seed: many familiar crops can be cut as seedlings.' ),
						array( 'point' => 'Use a shallow tray with drainage holes, filled with peat-free seed compost or sieved multi-purpose compost.' ),
						array( 'point' => 'Sow far more thickly than usual, then cover with just a dusting of compost.' ),
						array( 'point' => 'Keep the tray warm and bright; germination is best at 18–22 °C (65–72 °F).' ),
						array( 'point' => 'Cut just above the compost with clean scissors once the first true leaves open, and rinse before eating.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Radish', 'note' => 'One of the seeds the RHS suggests for microgreens; red-stemmed types add colour.' ),
						array( 'name' => 'Kale', 'note' => 'The RHS says all varieties work as microgreens, ready in two or three weeks; red and purple ones look striking.' ),
						array( 'name' => 'Beetroot', 'note' => 'Suggested by the RHS; Bull\'s Blood gives dark red seedlings.' ),
						array( 'name' => 'Cress, mustard and chard', 'note' => 'Further crops the RHS lists as suitable for microgreens, alongside turnip.' ),
						array( 'name' => 'Coriander, purple basil, fenugreek and amaranth', 'note' => 'Herb and leaf options the RHS suggests trying side by side for a taste test.' ),
					),
					'products'   => array(
						array( 'name' => 'Shallow seed tray with drainage holes', 'badge' => '', 'note' => 'A clean fruit punnet or food tub with holes added also works.', 'url' => '' ),
						array( 'name' => 'Peat-free seed compost', 'badge' => '', 'note' => 'Fine and low in nutrients, which seedlings need.', 'url' => '' ),
						array( 'name' => 'Clear lid or propagator top', 'badge' => '', 'note' => 'Keeps seeds warm and moist while they germinate.', 'url' => '' ),
						array( 'name' => 'Small watering can with a fine rose, or a mister', 'badge' => '', 'note' => 'Wets the compost without flattening the seedlings.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Are microgreens the same as sprouts?', 'answer' => 'No. Microgreens grow in compost in the light and are cut above the surface once the first true leaves appear. Sprouts are germinated in water, usually in a jar, with no compost at all; see <a href="/diy-projects/grow-sprouts-in-a-jar/">sprouting seeds in a jar</a>.' ),
						array( 'question' => 'When are microgreens ready to cut?', 'answer' => 'The first pair of leaves after germination are seed leaves. When the next pair, the true leaves, opens and the seedlings look sturdy, they are ready. Taste as you go: the flavour develops as they grow.' ),
						array( 'question' => 'Can I use ordinary multi-purpose compost?', 'answer' => 'Yes, if you sieve it first to remove lumps, so the tiny seeds sit in even contact with it. Peat-free seed compost is finer and needs no sieving.' ),
						array( 'question' => 'Do microgreens grow back after cutting?', 'answer' => 'Treat each tray as a single harvest. Cut what you need, then compost the rest and sow a fresh tray. For leaves that regrow, grow baby salad leaves in a larger pot instead.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — Growing microgreens (school gardening)', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/food-growing/growing-microgreens' ),
						array( 'title' => 'RHS — Grow micro greens (family activity)', 'url' => 'https://www.rhs.org.uk/education-learning/children-young-people/family-activities/grow-it/microgreens' ),
						array( 'title' => 'RHS — How to grow kale (sowing microgreens)', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
					),
				),
				'content'      =>
					$h2( 'What microgreens are' ) .
					$p( 'Microgreens are not a special kind of seed. The word describes a method: seeds of ordinary vegetables and herbs, such as radish, beetroot, cress or kale, are sown densely and cut very young, just after the first true leaves appear. At that stage they are small but full of flavour.' ) .
					$p( 'They grow in compost, in the light, and you cut the stems above the surface. That makes them different from sprouts, which are started in a jar of water rather than compost; that method has its own guide: <a href="/diy-projects/grow-sprouts-in-a-jar/">sprouting seeds in a jar</a>.' ) .

					$h2( 'Which seeds to use' ) .
					$p( 'The RHS suggests cress, radish, chard, turnip, mustard and beetroot, and every variety of kale works too. For something different, try coriander, purple basil, fenugreek, amaranth or Greek cress. Sowing two or three kinds in separate trays lets you compare how fast they come up and how they taste.' ) .

					$h2( 'Tray and compost' ) .
					$p( 'Any shallow container works if water can drain out: a seed tray, a clean fruit punnet or a food tub with holes made in the base. Fill it with peat-free seed compost, or with multi-purpose compost that you have sieved to remove the lumps. Tap the tray on a hard surface to settle out air pockets, then water the compost with a fine rose until it is damp but not waterlogged.' ) .

					$h2( 'Sowing a tray' ) .
					$list(
						array(
							'Scatter the seed evenly over the surface. You can sow much more thickly than for any other crop, because the seedlings are cut long before they need space.',
							'Sprinkle a thin layer of compost over the top, just enough to hide the seed.',
							'Write the crop and the date on a label and push it in at the edge.',
							'Put a clear lid over the tray, or an upturned clear food tray, to hold in warmth and moisture until the seeds germinate.',
						)
					) .

					$h2( 'Light, warmth and water' ) .
					$p( 'Stand the tray on a warm, sunny windowsill or in another bright spot indoors. Seeds germinate best between 18 and 22 °C (65–72 °F). Keep the compost moist but never soggy, watering gently or misting, because the seedlings are delicate.' ) .
					$p( 'Seedlings stretching thin and pale towards the glass are short of light; <a href="/problems/leggy-seedlings/">leggy seedlings</a> explains the causes. Crowded seedlings in damp, still air can also collapse at the base, which is <a href="/problems/damping-off-seedlings/">damping off</a>: clean trays and fresh compost help prevent it.' ) .

					$h2( 'Cutting your microgreens' ) .
					$p( 'Most trays are ready in one to three weeks; kale takes about two to three. The first leaves to open are the seed leaves, and the pair after them are the true leaves, shaped more like the grown plant. Once the true leaves appear and the seedlings look sturdy, cut the stems just above the compost with clean scissors. Rinse them, then add them to salads, sandwiches and wraps, or scatter them over a finished dish.' ) .
					$p( 'Because they grow indoors, you can sow a new tray every week or two through the whole year, including the darkest months.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Burying the seed deeply: a dusting of compost is enough.',
							'Using a container with no holes: the compost can become waterlogged.',
							'Leaving the tray in a dim corner: seedlings stretch and flop.',
							'Letting the compost dry out: the delicate seedlings need a steady supply of moisture.',
							'Forgetting to taste: the flavour develops as the seedlings grow, so try a few as they come on.',
						)
					),
				'image_prompt' => 'Three shallow black seed trays of dense microgreens on a bright white kitchen windowsill: purple-stemmed radish seedlings with rounded green seed leaves, dark red beetroot seedlings, and blue-green kale seedlings just opening their first small true leaves, all about 5–8 cm tall in fine dark compost. A pair of small scissors and a few cut seedlings lie in front. Soft daylight from the window. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a single shallow tray of thick, upright radish microgreens with pink stems and bright green rounded seed leaves on a sunny windowsill, a small label pushed in at one edge. The tray sits in the lower half of the frame; the top third is calm, softly blurred bright window, empty for a title. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
