<?php
/**
 * Starter guides, batch 16 (more vegetables): fava beans, runner beans and
 * turnips grown in containers on a balcony or patio.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS agrees; see design/sources/BACKYARD-HARVEST.md. Hardiness
 * ratings come from the RHS plant profiles listed. The 'timing' data
 * (weeks from the last spring frost, days to harvest) comes from Oregon
 * State University Extension, University of Wisconsin-Madison Extension,
 * Colorado State University Extension, University of New Hampshire
 * Extension and University of Minnesota Extension, checked 19 October 2026.
 * The 'months' data is the UK calendar.
 *
 * Green beans, peas and bean supports have their own pages; these guides
 * link to them instead of repeating them.
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
	'name'   => __( 'Fava beans, runner beans and turnips', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'fava-beans-in-pots'  => array(
				'title'        => 'How to Grow Fava Beans in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 10, 11 ),
					'plant'   => array( 4, 5 ),
					'harvest' => array( 5, 6, 7, 8 ),
				),
				'excerpt'      => 'Fava beans crop in a pot if you choose a dwarf variety such as The Sutton and give it a container at least 15 in (40 cm) wide in a sunny, sheltered corner. Sown from late winter to spring, they give some of the first home-grown pods of the year, from late spring into summer.',
				'facts'        => array(
					'short_name'     => 'Fava bean (broad bean)',
					'botanical_name' => 'Vicia faba',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, out of strong wind',
					'pot_size'       => 'At least 15 in (40 cm) wide, plants 6 in (15 cm) apart',
					'hardiness'      => 'H3',
					'watering'       => 'Often: pots dry out faster than open ground',
					'harvest'        => 'Late spring to late summer, depending on sowing date',
					'season'         => 'Sow from late winter to late spring, or in fall in mild areas',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Grow a dwarf variety: the tall ones need stakes and string, which a balcony pot cannot hold.' ),
						array( 'point' => 'Push each seed 2 in (5 cm) into the potting mix, scar downwards, 6 in (15 cm) from its neighbors.' ),
						array( 'point' => 'Once the lowest pods have set, pinch out the soft tip of each stem to slow black bean aphids.' ),
						array( 'point' => 'From the first flowers, give a high-potassium liquid fertilizer every two weeks.' ),
						array( 'point' => 'Pick pods while they are plump but small, before the scar on each bean turns black.' ),
					),
					'varieties'  => array(
						array( 'name' => 'The Sutton (AGM)', 'note' => 'The RHS calls this dwarf variety ideal for containers and windy sites. It stays under 20 in (50 cm), should not need support, and can be sown in late winter or early to mid-spring, or in fall under cloches. Rated H3.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 15 in (40 cm) wide, with drainage holes', 'badge' => '', 'note' => 'Room for a small group of dwarf plants.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'badge' => '', 'note' => 'Either suits fava beans in a container.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertilizer (tomato fertilizer)', 'badge' => '', 'note' => 'Every two weeks from flowering.', 'url' => '' ),
						array( 'name' => 'Twiggy sticks', 'badge' => '', 'note' => 'Only if dwarf plants start to lean.', 'url' => '' ),
						array( 'name' => 'Cloche or plastic-free row cover', 'badge' => '', 'note' => 'For fall or late-winter sowings in cold spells.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Do dwarf fava beans need staking in a pot?', 'answer' => 'Usually not. Planted close together, dwarf plants hold each other up. If a few start to flop, push some twiggy sticks into the potting mix among them.' ),
						array( 'question' => 'When should I pinch out the tops of fava beans?', 'answer' => 'When the lowest flowers have turned into small pods. Removing the soft tip sends the plant\'s energy into the pods and takes away the growth black bean aphids like best. The tips are good to eat, steamed or stir-fried.' ),
						array( 'question' => 'How do I know fava beans are ready to pick?', 'answer' => 'The pods look full but are still fairly small. Open one: the scar where each bean joins the pod should be white or green. Once it turns black, the beans are getting tough.' ),
						array( 'question' => 'What are the brown spots on my fava bean leaves?', 'answer' => 'Most likely chocolate spot, a fungal disease that starts as small red-brown spots and spreads in cool, damp, crowded conditions. Give plants space and air, and throw infected plants away at the end of the season. Small dusty brown spots with a pale yellow ring are broad bean rust.' ),
						array( 'question' => 'Can fava beans be sown in fall for a pot on a balcony?', 'answer' => 'Only in a mild area or a very sheltered spot. The Sutton can be sown in mid to late fall and kept under cloches through winter for an earlier crop. Elsewhere, wait until late winter or spring.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow broad beans', 'url' => 'https://www.rhs.org.uk/vegetables/broad-beans/grow-your-own' ),
						array( 'title' => 'RHS — Vicia faba \'The Sutton\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/107295/the-sutton-agm/details' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — Broad bean chocolate spot', 'url' => 'https://www.rhs.org.uk/disease/broad-bean-chocolate-spot' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why fava beans earn a place on a balcony' ) .
					$p( 'Fava beans, called broad beans in the UK, are one of the first crops of the year. Sown in late winter or spring, they flower early and fill their pods from late spring, when most summer vegetables are still small. They are tough, need little attention, and a few sowings a few weeks apart spread the harvest across the summer.' ) .
					$p( 'Most varieties grow tall and need a framework of stakes and string. For a container, pick a dwarf variety: these reach about 20 in (50 cm), cope better with wind and usually prop each other up.' ) .

					$h2( 'Choose the container and the spot' ) .
					$p( 'A container 15 in (40 cm) across or wider holds a small group of dwarf plants. Drainage holes are essential, and either a peat-free all-purpose mix or a soil-based one will do: <a href="/potting-mix-for-containers/">potting mix for containers</a> compares them. Stand it where it gets sun and some shelter from wind.' ) .

					$h2( 'Sowing fava beans' ) .
					$p( 'From late winter, you can start seeds under cover, one per small pot or module of peat-free all-purpose potting mix, 2 in (5 cm) deep with the scar pointing down. This keeps them away from mice, which dig up and eat the large seeds, and from slugs; see <a href="/how-to-start-seeds-indoors/">how to start seeds indoors</a> for the basics.' ) .
					$p( 'From early to late spring you can sow straight into the final container instead: set each seed 2 in (5 cm) deep, scar down, and 6 in (15 cm) apart. Two or three batches a few weeks apart give a longer picking season; our guide to <a href="/succession-planting-small-spaces/">succession planting in small spaces</a> shows how to plan them.' ) .
					$p( 'In a mild area or a very sheltered corner, a hardy variety can also go in during mid to late fall, with a cloche or row cover over it in cold spells, for pods as early as late spring.' ) .

					$h2( 'Planting out young plants' ) .
					$p( 'Pot-raised or bought plants go outside in early to mid-spring. Harden them off first so they do not stall (see <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>), then set them 6 in (15 cm) apart in the container and water them in.' ) .

					$h2( 'Water, fertilize and pinch out' ) .
					$list(
						array(
							'<strong>Water</strong>: in a container, fava beans need watering often through the season, and a good soak matters most once they flower. For a routine, see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.',
							'<strong>Fertilize</strong>: when the first flowers open, feed every two weeks with a high-potassium liquid fertilizer, for example a tomato fertilizer.',
							'<strong>Support</strong>: dwarf plants rarely need it, but a few twiggy sticks will hold up any that lean.',
							'<strong>Pinch out</strong>: when the bottom flowers have formed small pods, nip off the top of each stem. The plant puts its effort into the pods, and black bean aphids lose their favorite feeding spot. Cook the tips like spinach.',
						)
					) .

					$h2( 'Picking fava beans' ) .
					$p( 'Pods form first at the bottom of the plant and can fill up quickly, so look every few days. For shelling, pick while the pods are full but not yet large: small beans are the sweetest. Check the scar on a bean; if it has turned black, the beans are past their best. For eating whole, pick pods at about 2 in (5 cm) long.' ) .
					$p( 'Cut the pods off with scissors or pruners rather than pulling, so the stems are not damaged. Regular picking encourages more pods. When the plants are finished, cut them down to the base and compost the tops. Beans store nitrogen in their roots, so the RHS suggests leaving the roots in place. A container cleared in early or midsummer can then take a sowing of <a href="/plants/beets-in-pots/">beets</a>.' ) .

					$h2( 'Pests and diseases' ) .
					$p( 'Fava beans are robust, but a few problems are common. Black bean aphids (blackfly) gather on the soft tips in spring and summer; pinching out helps, and our page on <a href="/problems/aphids-container-plants/">aphids on container plants</a> covers the rest. Slugs and snails eat young shoots (see <a href="/problems/slugs-and-snails/">slugs and snails</a>). Pea and bean weevils cut neat notches in leaf edges in spring, which looks alarming but rarely harms the crop.' ) .
					$p( 'Chocolate spot, a fungus, shows as red-brown spots that darken and spread in cool, damp weather. There is no fungicide for home gardeners, so prevention is the answer: do not crowd the plants, keep the pot in an airy spot, and throw out infected plants at the end of the season rather than saving their seed.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a tall variety for a pot: it topples without stakes. Grow a dwarf one.',
							'Sowing outdoors into cold, wet potting mix in winter, where seeds rot or mice find them.',
							'Leaving the soft tips on once pods have set, which invites black bean aphids.',
							'Letting the pods grow big and leathery: young beans taste much better.',
							'Packing plants tightly in a damp, still corner, where chocolate spot spreads.',
						)
					),
				'image_prompt' => 'A wide, round, dark gray container about 18 in (45 cm) across on a sunny patio in early summer, holding a group of compact dwarf fava bean plants about 18 in (45 cm) tall. The plants have upright, square-sectioned stems with gray-green, oval, slightly fleshy leaflets in pairs, a few white flowers with black blotches still open near the top, and short, fat, glossy green pods held upright along the lower stems. The soft growing tips have been pinched out. Pavers and a brick wall softly blurred behind, bright morning sun.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of dwarf fava bean plants in a dark gray container on a sunny patio, with gray-green paired leaflets, white-and-black flowers and plump green pods along the stems. The container sits in the lower half of the frame; the top third is a calm, softly blurred pale wall and sky, empty for a title.' . $pin_end,
			),

			'runner-beans-in-pots' => array(
				'title'        => 'How to Grow Runner Beans in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5, 6, 7 ),
					'plant'   => array( 5, 6, 7 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( 0, 0 ),
					'harvest_days' => array( 70, 85 ),
				),
				'excerpt'      => 'Runner beans grow in containers either as dwarf plants in a pot 12–18 in (30–45 cm) wide, or as climbers in a heavy tub 30 in (75 cm) across with tall stakes. Start them once all danger of frost has passed, water generously and pick the pods every two or three days so the plants keep flowering into fall.',
				'facts'        => array(
					'short_name'     => 'Runner bean',
					'botanical_name' => 'Phaseolus coccineus',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, in a sheltered position',
					'pot_size'       => 'Dwarf: 12–18 in (30–45 cm) wide. Climbing: 30 in (75 cm) wide and 18 in (45 cm) deep',
					'hardiness'      => 'H2',
					'watering'       => 'Frequent and generous, especially from flowering',
					'harvest'        => 'Midsummer to early fall, every two to three days',
					'season'         => 'Frost-tender; sow outdoors after your last spring frost, into midsummer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Runner beans are killed by frost: keep them indoors or unsown until all danger of frost has passed.' ),
						array( 'point' => 'Dwarf varieties stay at about 18 in (45 cm) and suit a smaller pot; climbers need a big, heavy tub and 8 ft (2.5 m) stakes.' ),
						array( 'point' => 'Water often and deeply: runner beans crop best with moist roots and cool, damp summers.' ),
						array( 'point' => 'Fertilize every two weeks with a high-potassium organic liquid fertilizer once the flowers appear.' ),
						array( 'point' => 'Pick pods at about 8–10 in (20–25 cm), before the beans inside swell, or the plant stops flowering.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Hestia', 'note' => 'A dwarf runner bean that the RHS describes as bushy, compact, up to 18 in (45 cm) tall and well suited to containers. Red and white flowers are followed by long, straight, stringless pods. Rated H2.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 12–18 in (30–45 cm) wide, with drainage holes', 'badge' => '', 'note' => 'For a dwarf variety.', 'url' => '' ),
						array( 'name' => 'Heavy tub 30 in (75 cm) wide and 18 in (45 cm) deep', 'badge' => '', 'note' => 'For climbing varieties, so the plants do not pull it over.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'badge' => '', 'note' => 'To fill the final container.', 'url' => '' ),
						array( 'name' => 'Bamboo stakes or hazel poles, 8 ft (2.5 m)', 'badge' => '', 'note' => 'Five or more per container for climbers.', 'url' => '' ),
						array( 'name' => 'High-potassium organic liquid fertilizer', 'badge' => '', 'note' => 'Every two weeks from the first flowers.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Dwarf or climbing runner beans: which is better for a balcony?', 'answer' => 'Dwarf runner beans are easier: they grow to about 18 in (45 cm), fit a pot 12–18 in (30–45 cm) wide and crop quickly, though they give a smaller harvest. Climbers produce for longer but need a heavy container 30 in (75 cm) across, tall stakes and a spot sheltered from wind.' ),
						array( 'question' => 'How often should I pick runner beans?', 'answer' => 'Ideally every two to three days. If pods are left to ripen their seeds, the plant stops making flowers and the crop ends. Regular picking can keep it going for eight weeks or more.' ),
						array( 'question' => 'When can runner beans go outside?', 'answer' => 'Only once all danger of frost has passed in your area. Harden indoor-raised plants off first. Seed sown straight into a pot needs warm potting mix, about 54 °F (12 °C), to come up.' ),
						array( 'question' => 'Can you eat runner bean pods raw?', 'answer' => 'No. The RHS lists raw runner bean pods and beans as harmful if eaten, for people and for dogs. Always cook them.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow runner beans', 'url' => 'https://www.rhs.org.uk/vegetables/runner-beans/grow-your-own' ),
						array( 'title' => 'RHS — Phaseolus coccineus \'Hestia\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/292718/phaseolus-coccineus-hestia/details' ),
						array( 'title' => 'RHS — Runner beans: failure to set pods', 'url' => 'https://www.rhs.org.uk/problems/runner-beans-failure-to-set-pods' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'Oregon State University Extension — Plant scarlet runner beans first when soils are chilly', 'url' => 'https://extension.oregonstate.edu/news/plant-scarlet-runner-beans-first-when-soils-are-chilly' ),
						array( 'title' => 'University of Wisconsin-Madison Extension — Scarlet runner bean, Phaseolus coccineus', 'url' => 'https://hort.extension.wisc.edu/articles/scarlet-runner-bean-phaseolus-coccineus/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Runner beans in a small space' ) .
					$p( 'Runner beans, often sold in the US as scarlet runner beans, are vigorous, productive and easy, and they make the most of a small space because climbing types grow upwards. Their red, white, pink or two-tone flowers are decorative too, so a tepee of beans in a tub is an attractive feature on a patio. They like sun, a rich root run and plenty of moisture, and they do especially well in cool, wet summers.' ) .
					$p( 'There are two kinds. Climbing varieties need tall supports and take longer to start, but then crop from midsummer to early fall. Dwarf varieties stay low, start sooner and give fewer pods; the RHS rates them as particularly suitable for containers and exposed sites.' ) .

					$h2( 'Pick the right container' ) .
					$list(
						array(
							'<strong>Dwarf runner beans</strong>: a pot 12–18 in (30–45 cm) wide, with plants about 1 ft (30 cm) apart. A few short twiggy sticks among them keep the pods off the potting mix.',
							'<strong>Climbing runner beans</strong>: a tub 30 in (75 cm) across and 18 in (45 cm) deep, heavy enough to stay upright once the plants are covered in leaves.',
						)
					) .
					$p( 'Use peat-free potting mix, either all-purpose or soil-based (more on that in <a href="/potting-mix-for-containers/">potting mix for containers</a>) and choose a sunny spot out of strong wind, which also helps bees find the flowers. Put the supports in before you sow: our project <a href="/diy-projects/make-a-bean-tepee-in-a-pot/">make a bean tepee in a pot</a> shows how to build one.' ) .

					$h2( 'Sowing runner beans' ) .
					$p( 'Runner beans cannot take frost. For an earlier crop, or in a cold area, University of Wisconsin-Madison Extension says you can start seeds indoors a few weeks before your average last frost. Push a single seed 2 in (5 cm) down into a small pot or deep module of damp peat-free all-purpose potting mix, and keep the pots somewhere bright at more than 54 °F (12 °C). The seedlings grow fast and need regular water. Our guide on <a href="/how-to-start-seeds-indoors/">how to start seeds indoors</a> has more detail.' ) .
					$p( 'To sow outside, wait until the danger of frost has passed and the potting mix has warmed up; Oregon State University Extension aims for soil around 60 °F (16 °C) for dependable germination. Sow 2 in (5 cm) deep and 6 in (15 cm) apart in the final container. With climbers, sow two seeds by each stake and pull out the smaller seedling if both germinate.' ) .

					$h2( 'Planting out' ) .
					$p( 'Plants raised indoors or bought in go out once frost danger has passed, after a careful hardening off (see <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>). Set one plant at the foot of each stake, water it in, and tie the stem loosely to the stake to get it started. Protect young plants from slugs and snails.' ) .

					$h2( 'Watering, fertilizing and training' ) .
					$p( 'Runner beans are thirsty, and plants in containers dry out fast, so water often and generously, above all once they flower and start to form pods. Our page on <a href="/how-often-to-water-container-plants/">how often to water container plants</a> helps you set a routine.' ) .
					$p( 'In a container, feed with an organic high-potassium liquid product, for instance a tomato fertilizer, at two-week intervals from the first flowers. Tie in any stems that blow loose. When climbers reach the top of their stakes, cut off the extra growth: side shoots then form lower down, the crop stays within reach and the plant is less top-heavy in wind.' ) .

					$h2( 'Harvesting runner beans' ) .
					$p( 'The first pods usually come around midsummer; University of Wisconsin-Madison Extension lists named varieties producing beans about 70 to 85 days after sowing. Pick them young, at about 8–10 in (20–25 cm), when they snap cleanly and the beans inside are still small and pale. Check every two or three days: once a pod is allowed to mature, the plant stops flowering. With regular picking, cropping carries on for eight weeks or more. Cook runner beans before eating; the RHS warns that raw pods and beans are harmful.' ) .
					$p( 'If you want to keep some beans for next year, our guide on <a href="/how-to-save-seeds-from-your-plants/">saving seeds from your plants</a> explains how.' ) .

					$h2( 'When things go wrong' ) .
					$p( 'Flowers that fall without making pods are the most common complaint, often early in the season, in hot weather or when the roots are dry; <a href="/problems/flowers-dropping-off/">why flowers drop off</a> goes through the causes. If birds peck the flowers, a dwarf variety such as Hestia is easy to cover with netting.' ) .
					$p( 'Slugs and snails attack young plants (see <a href="/problems/slugs-and-snails/">slugs and snails</a>), and black bean aphids can build up on the shoot tips (see <a href="/problems/aphids-container-plants/">aphids</a>). In warm, dry spells, look under the leaves for <a href="/problems/spider-mites/">spider mites</a>. Rust and halo blight sometimes appear but are less common.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Putting plants out before the last frost: one cold night can kill them.',
							'Growing climbers in a small or light pot that blows over.',
							'Letting the potting mix dry out at flowering time.',
							'Missing a few days of picking, so old pods stop the plant flowering.',
							'Spraying insecticide on flowering plants, which also kills the bees that pollinate them.',
						)
					),
				'image_prompt' => 'A large, heavy, square dark green tub about 30 in (75 cm) across on a sunny patio in late summer, with a tepee of tall bamboo stakes covered in climbing runner bean plants. The vines twine around the stakes, with large, heart-shaped, three-part mid-green leaves, clusters of bright scarlet flowers, and long, slightly rough, flat green pods about 8 in (20 cm) long hanging at eye level. A brick wall and a few pots softly blurred behind, warm afternoon sun.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of climbing runner beans on a tall bamboo tepee in a large dark green tub on a sunny patio, with scarlet flower clusters, broad three-part leaves and long flat green pods hanging down. The tepee rises through the lower two thirds of the frame; the top third is calm, softly blurred pale sky, empty for a title.' . $pin_end,
			),

			'turnips-in-pots'      => array(
				'title'        => 'How to Grow Turnips in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7, 8 ),
					'plant'   => array( 3, 4 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( -4, -2 ),
					'harvest_days' => array( 50, 60 ),
				),
				'excerpt'      => 'Turnips are a fast root crop for a pot: sow a pinch of seed in a container at least 16 in (40 cm) wide, thin to 4 in (10 cm), and early varieties can be pulled as small, sweet roots in about six weeks. Sow little and often from 2–4 weeks before your last spring frost until late summer, and eat the young leaves too.',
				'facts'        => array(
					'short_name'     => 'Turnip',
					'botanical_name' => 'Brassica rapa (Rapifera Group)',
					'difficulty'     => 'Easy',
					'sun'            => 'Sunny, in a cool spot',
					'pot_size'       => 'At least 16 in (40 cm) wide',
					'hardiness'      => 'H3',
					'watering'       => 'Regularly; dry potting mix makes woody, split roots',
					'harvest'        => 'About 6 weeks for early varieties, 10 weeks for main-crop types',
					'season'         => 'Sow outdoors from 2–4 weeks before your last spring frost to late summer; late winter under cover',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose a container at least 16 in (40 cm) wide and grow the roots as baby vegetables.' ),
						array( 'point' => 'Scatter the seed thinly, cover it with 1 in (2 cm) of potting mix, then thin the seedlings to 4 in (10 cm) apart.' ),
						array( 'point' => 'Early varieties go in from early spring to early summer; main-crop types from midsummer to late summer.' ),
						array( 'point' => 'Pull roots between golf-ball and tennis-ball size; larger ones turn woody and bitter.' ),
						array( 'point' => 'Cover the pot with insect-proof mesh against cabbage maggots and flea beetles.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Tokyo Cross (AGM)', 'note' => 'The RHS describes a very quick, pure white, globe-shaped turnip, often ready 35–60 days from sowing, and suitable for container growing. Rated H3.' ),
						array( 'name' => 'Oasis (AGM)', 'note' => 'A small, ivory-white turnip that is slow to bolt and can be picked at any size. The RHS lists it as suitable for containers and good raw. Rated H3.' ),
						array( 'name' => 'Atlantic', 'note' => 'An early variety with a purple top and white base. The RHS calls it ideal as baby turnips and suitable for containers, and it can be sown under cloches in late winter. Rated H6.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 16 in (40 cm) wide, with drainage holes', 'badge' => '', 'note' => 'For a crop of baby roots.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'badge' => '', 'note' => 'For sowing straight into the container.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Keeps cabbage maggots and flea beetles off all season.', 'url' => '' ),
						array( 'name' => 'Biodegradable row cover', 'badge' => '', 'note' => 'For early sowings and for late roots in cold weather.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How big should turnips be when you pull them?', 'answer' => 'Golf-ball size for eating raw and tennis-ball size for cooking. Roots left to grow bigger than a tennis ball tend to become woody and bitter.' ),
						array( 'question' => 'Can you eat turnip leaves?', 'answer' => 'Yes. Pick young leaves as a cut-and-come-again crop and eat them raw for a peppery taste, or cook larger leaves, up to 6 in (15 cm), like spinach. If you want good roots, only take a few leaves from each plant.' ),
						array( 'question' => 'Why are my turnips small and woody?', 'answer' => 'Usually dry potting mix. Without regular water the roots stay small, turn woody and may split, and the plants can flower early, which stops the roots swelling. Roots left too long in the pot also go woody.' ),
						array( 'question' => 'Is a turnip the same as a rutabaga?', 'answer' => 'No, though in the UK a rutabaga is called a swede, and in some parts of the UK swedes are called turnips. A rutabaga has a larger root with orange and purple coloring; a turnip is smaller, usually white or purple-topped, and quicker to grow.' ),
						array( 'question' => 'Can turnips stay in their pot over winter?', 'answer' => 'Not safely. The roots are not fully hardy, so pull late sowings before hard frosts. In a mild area you can leave them under row cover or a cloche and lift them as needed, or store pulled roots in trays of moist coir or sand somewhere cool and frost-free.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow turnips', 'url' => 'https://www.rhs.org.uk/vegetables/turnips/grow-your-own' ),
						array( 'title' => 'RHS — Turnip \'Tokyo Cross\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/112513/tokyo-cross-agm/details' ),
						array( 'title' => 'RHS — Turnip \'Oasis\'', 'url' => 'https://www.rhs.org.uk/plants/221572/oasis-agm/details' ),
						array( 'title' => 'RHS — Turnip \'Atlantic\'', 'url' => 'https://www.rhs.org.uk/plants/122199/atlantic/details' ),
						array( 'title' => 'RHS — Cabbage root fly', 'url' => 'https://www.rhs.org.uk/biodiversity/cabbage-root-fly' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'Colorado State University Extension — Vegetable planting guide', 'url' => 'https://extension.colostate.edu/resource/vegetable-planting-guide/' ),
						array( 'title' => 'University of Minnesota Extension — Planting vegetables in midsummer for fall harvest', 'url' => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/planting-vegetables-in-midsummer-for-fall-harvest' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why turnips suit a pot' ) .
					$p( 'Turnips are a quick, compact root from the cabbage family. They form small round or flattened roots, white or purple-skinned, that can be ready six weeks after sowing, and the leaves are edible as well. In a container they are best grown as baby vegetables: pulled small, when they are sweet and tender enough to eat raw.' ) .
					$p( 'They grow best in cool weather. Spring sowings come up fast; in hot, dry spells the seed germinates less well and the plants are more likely to bolt. Because they are so quick, turnips are handy for filling a pot between two slower crops.' ) .

					$h2( 'Container, potting mix and position' ) .
					$p( 'Use a container at least 16 in (40 cm) wide, with drainage holes, filled with peat-free all-purpose potting mix (see <a href="/potting-mix-for-containers/">potting mix for containers</a> for more). Put it somewhere warm and sunny.' ) .

					$h2( 'Sowing turnips' ) .
					$p( 'Water the potting mix first, scatter the seed thinly over the surface, cover it with 1 in (2 cm) of potting mix and firm it gently. When the seedlings are up, thin them to 4 in (10 cm) apart for baby roots. The thinnings make a good salad.' ) .
					$p( 'Turnips cope with cold, and Colorado State University Extension lists them for sowing outside from 2–4 weeks ahead of your last spring frost, once the soil is dry enough to work. Early varieties are sown from early spring to early summer for summer roots, and main-crop types from midsummer to late summer for fall. A small pinch of seed every few weeks gives a steady supply instead of a glut; see <a href="/succession-planting-small-spaces/">succession planting in small spaces</a>.' ) .
					$p( 'For the earliest roots, start a hardy variety indoors in late winter, in modules of peat-free seed-starting mix, 1 in (2 cm) deep: two seeds per cell, keeping the stronger one, or up to four left together as a clump. Harden them off and plant them out in early spring without splitting the clumps.' ) .

					$h2( 'Watering and care' ) .
					$p( 'Steady moisture is what makes a good turnip. If the potting mix dries out, the roots stay small and woody, may split, and the plant may bolt. A container dries fast in summer, so check it often; <a href="/how-often-to-water-container-plants/">how often to water container plants</a> gives a routine. Pull weeds by hand so you do not nick the tops of the roots.' ) .

					$h2( 'Harvesting roots and leaves' ) .
					$p( 'Early varieties can be ready in about six weeks, main-crop types in about ten; University of Minnesota Extension gives turnips 50 to 60 days to maturity. Pull early roots from late spring to early fall, at golf-ball size to eat raw or tennis-ball size to cook. Do not leave them to grow larger, as they become woody and bitter. Main-crop roots are lifted from mid-fall.' ) .
					$p( 'The leaves, or turnip greens, can be picked from spring. Young ones are peppery in salads; larger ones, up to 6 in (15 cm), cook like spinach, and the plant grows more. If roots are the goal, take only a few leaves per plant.' ) .
					$p( 'Turnip roots are not fully hardy. Lift late sowings before harsh frost, or in a mild area leave them under row cover or a cloche and pull them as needed. Spare roots keep for several weeks in trays of moist coir or sand in a cool, frost-free place. Our page on <a href="/protect-pots-in-winter/">protecting pots in winter</a> covers the container itself.' ) .

					$h2( 'Pests to watch for' ) .
					$p( 'Seedlings need protecting from slugs (see <a href="/problems/slugs-and-snails/">slugs and snails</a>), and birds sometimes eat the leaves. As cabbage-family plants, turnips also attract <a href="/problems/flea-beetle-holes-in-leaves/">flea beetles</a> and caterpillars.' ) .
					$p( 'The cabbage maggot, the larva of the cabbage root fly, is the main threat to the roots. These white maggots, up to about ⅜ in (9 mm) long, tunnel into turnips from spring to early fall, and every generation of the fly can spoil a root crop. Cover the container with insect-proof mesh from sowing and keep it on all season.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Letting roots grow past tennis-ball size, when they turn tough.',
							'Sowing the whole packet at once instead of a pinch every few weeks.',
							'Forgetting to thin, so the roots crowd each other and stay tiny.',
							'Leaving the pot dry in summer: woody, split roots and early flowering follow.',
							'Growing without a mesh cover where cabbage maggots are about.',
						)
					),
				'image_prompt' => 'A round, light gray container about 16 in (40 cm) wide on a sunny balcony in late spring, densely planted with young turnips. Upright rosettes of rough, lobed, bright green leaves about 8 in (20 cm) tall rise from the potting mix, and the tops of small, smooth white roots with purple shoulders sit half above the surface. A few freshly pulled golf-ball-sized white and purple turnips, leaves attached, lie beside the pot on wooden decking. Metal railing softly blurred behind, clear morning light.' . $photo_end,
				'pin_prompt'   => 'Vertical photograph of young turnips in a light gray container on a sunny balcony, with rough, lobed, bright green leaves and small round white roots with purple tops showing at the surface, a few pulled turnips beside the pot. The pot fills the lower half of the frame; the top third is calm, softly blurred pale sky, empty for a title.' . $pin_end,
			),
		),
	),
);
