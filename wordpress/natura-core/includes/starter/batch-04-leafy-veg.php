<?php
/**
 * Starter guides, batch 4 (leafy vegetables): lettuce, Swiss chard,
 * beetroot and spring onions grown in containers on a balcony or patio.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), used only
 * where the RHS agrees; see design/sources/BACKYARD-HARVEST.md. Hardiness
 * ratings are taken from the RHS plant page of the named variety. Months
 * are for a temperate climate such as the UK.
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
	'name'   => __( 'Lettuce, chard, beetroot and spring onions', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'lettuce-in-pots'       => array(
				'title'        => 'How to Grow Lettuce in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7, 8, 9, 10 ),
					'plant'   => array( 3, 4 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'A whole lettuce, hearted or loose-leaf, grows happily in a pot 30 cm (1 ft) or more across and as deep, as long as the compost never dries out. Loose-leaf kinds are ready to pick in four to six weeks, while hearting lettuces need around 10 to 14 weeks before you cut the head.',
				'facts'        => array(
					'short_name'     => 'Lettuce',
					'botanical_name' => 'Lactuca sativa',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun; light shade at midday in summer',
					'pot_size'       => 'At least 30 cm (1 ft) wide and deep',
					'hardiness'      => 'H2',
					'watering'       => 'Keep evenly moist; often daily in summer',
					'harvest'        => 'Loose-leaf 4–6 weeks; hearting 10–14 weeks',
					'season'         => 'Sow February to October',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose a container at least 30 cm (1 ft) wide and deep, or a growing bag, and fill it with peat-free multi-purpose compost.' ),
						array( 'point' => 'Allow about 30 cm (1 ft) for each hearting lettuce and 15 cm (6 in) for each loose-leaf one: crowded hearting types fail to firm up.' ),
						array( 'point' => 'Dry compost is the main trigger for bolting, so check the pot daily in warm spells and water early in the morning.' ),
						array( 'point' => 'Cut a hearting lettuce as soon as the centre feels firm; every lettuce flowers in the end if you wait.' ),
						array( 'point' => 'Leave a 2.5 cm (1 in) stump after cutting a head and it may sprout one or two smaller crops.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Little Gem', 'note' => 'A small cos lettuce with a sweet, crisp heart. The RHS lists it as ideal for containers and gives it an Award of Garden Merit. Rated H2.' ),
						array( 'name' => 'Tom Thumb', 'note' => 'A compact butterhead that quickly forms a solid head of soft leaves. Backyard Harvest describes it as suitable for containers.' ),
						array( 'name' => 'Salad Bowl', 'note' => 'An RHS Award of Garden Merit loose-leaf lettuce with lime-green, oak-shaped leaves. Pick the outer leaves over several weeks.' ),
						array( 'name' => 'Navara', 'note' => 'An RHS Award of Garden Merit loose-leaf lettuce with glossy dark-red leaves around a green centre.' ),
						array( 'name' => 'Lollo Rossa', 'note' => 'A loose-leaf lettuce with frilly, red-edged leaves that look good in a pot on display.' ),
						array( 'name' => 'Sioux', 'note' => 'An RHS Award of Garden Merit iceberg (crisphead) lettuce with red-tinged leaves. Crispheads are among the types slower to bolt.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 30 cm (1 ft) wide and deep, with drainage holes', 'badge' => '', 'note' => 'One hearting lettuce, or several loose-leaf plants in a longer trough.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For filling the final container.', 'url' => '' ),
						array( 'name' => 'Peat-free seed compost and a module tray', 'badge' => '', 'note' => 'For raising young plants indoors.', 'url' => '' ),
						array( 'name' => 'Plastic-free fleece or a cloche', 'badge' => '', 'note' => 'Helps early plantings settle in, and keeps birds off.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How many lettuces can I fit in one pot?', 'answer' => 'The RHS spaces hearting lettuces about 30 cm (1 ft) apart and loose-leaf ones about 15 cm (6 in). So a pot 30 cm across suits a single hearting lettuce, while a longer trough holds a short row of loose-leaf plants.' ),
						array( 'question' => 'Will lettuce grow again after I cut the head?', 'answer' => 'Often, yes. Cut through the stem to leave a stump about 2.5 cm (1 in) tall and keep watering. It should sprout new leaves for one or two smaller pickings.' ),
						array( 'question' => 'Why did my lettuce seed fail to come up in July?', 'answer' => 'High temperatures stop some lettuce varieties germinating. In a hot spell, sow in the evening, water with cold water and shade the pot until seedlings appear.' ),
						array( 'question' => 'Should I feed lettuce growing in a container?', 'answer' => 'Lettuce in the ground rarely needs it, but in a pot the RHS suggests a general-purpose organic liquid feed every two weeks through summer.' ),
						array( 'question' => 'What are the yellow patches with white fuzz under my lettuce leaves?', 'answer' => 'Most likely lettuce downy mildew, which is worse in wet weather and among crowded plants. Remove affected leaves quickly; the heart can often still be eaten. No chemicals are available to gardeners for it, so give plants room and avoid wetting the leaves.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow lettuce', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — Lactuca sativa \'Little Gem\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/112416/lactuca-sativa-little-gem/details' ),
						array( 'title' => 'RHS — Lactuca sativa \'Salad Bowl\'', 'url' => 'https://www.rhs.org.uk/plants/309312/salad-bowl-agm/details' ),
						array( 'title' => 'RHS — Lettuce downy mildew', 'url' => 'https://www.rhs.org.uk/disease/lettuce-downy-mildew' ),
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Hearting or loose-leaf: which lettuce for a pot?' ) .
					$p( 'Lettuces fall into two broad groups. Hearting lettuces build a dense centre and are cut whole, which can take up to about three months. There are three kinds: butterheads, with soft, mild leaves; cos (romaine), upright with a crisp midrib; and crispheads such as iceberg, which keep well in the fridge and resist bolting better. Loose-leaf lettuces make an open rosette instead, grow faster and let you pick single leaves from the same plant for weeks.' ) .
					$p( 'Hearting types take more room, so they are usually grown in the ground, but a large container works. Compact varieties such as Little Gem suit a balcony best. This guide is about growing each lettuce to full size; for a trough of mixed baby leaves cut young and left to regrow, see <a href="/plants/salad-leaves-in-pots/">cut-and-come-again salad leaves in pots</a>.' ) .

					$h2( 'Container and position' ) .
					$p( 'Use a pot at least 30 cm (1 ft) wide and deep, or a growing bag. Fill it with peat-free multi-purpose compost; <a href="/plant-care/compost-for-containers/">our compost guide</a> explains what a container mix needs. Give each hearting plant about 30 cm (1 ft) of space and each loose-leaf plant about 15 cm (6 in). Squeezed together, hearting lettuces stay loose and never firm up.' ) .
					$p( 'Spring and autumn plantings like a warm, sunny spot. From late spring into summer, move the pot where it gets light shade in the hottest hours: heat pushes lettuce into flower.' ) .

					$h2( 'Sowing and planting' ) .
					$p( 'Lettuce can be sown from February to October. For summer and autumn heads, sow from late March to late July. Early sowings are best started indoors: scatter seed thinly in small pots or modules of moist peat-free seed compost and keep them on a bright windowsill. Once the seedlings have a few leaves, prick them out into their own modules, then harden them off and move them to the final container from spring, under fleece or a cloche if nights are still cold.' ) .
					$p( 'You can also sow straight into the container, 1 cm (½ in) deep, then thin in stages to the spacings above. The thinnings are good to eat. Rather than one big sowing, start a few plants every couple of weeks so they do not all heart up together; <a href="/plant-care/succession-sowing-small-spaces/">succession sowing</a> explains how to plan this in a small space.' ) .
					$p( 'In very hot weather some varieties will not germinate. Sow in the evening, water with cold water and shade the pot until the seedlings show.' ) .

					$h2( 'Watering, feeding and stopping bolting' ) .
					$p( 'Steady moisture is what makes a good lettuce. A pot dries out far faster than garden soil and may need water every day in summer; see <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a> for a routine. Water early in the morning rather than in the evening, because damp compost overnight attracts slugs and favours grey mould.' ) .
					$p( 'Lettuces in containers benefit from a general-purpose organic liquid feed every fortnight through summer. Bolting, when the plant runs up a flower stem and the leaves turn bitter, comes sooner in hot, dry weather. Light shade and regular watering delay it. If bolting has spoiled crops before, choose cos or crisphead varieties, which hold out longer.' ) .

					$h2( 'When and how to harvest' ) .
					$p( 'Lettuces grow fastest in warm weather. Loose-leaf varieties can be picked in as little as four to six weeks, once leaves reach about 10 cm (4 in) long: take a few outer leaves from each plant, and more grow from the middle. Hearting lettuces take around 10 to 14 weeks.' ) .
					$p( 'Press the centre of a hearting lettuce gently. When it feels firm, cut the stem with a sharp knife, leaving a stump about 2.5 cm (1 in) tall. Do not wait for it to get bigger, as a mature lettuce soon starts to flower. Keep the stump watered and it may give you one or two smaller crops of leaves. Pick in the morning when the leaves are crisp.' ) .

					$h2( 'Lettuce through the cooler months' ) .
					$p( 'For heads in spring, the RHS suggests sowing a hardy variety such as Winter Density in September or October and keeping it in a greenhouse or cold frame, or under cloches in mild areas. The RHS rates both Little Gem and Winter Density H2, so on an open balcony lettuce needs cover in winter. Autumn and winter salads have <a href="/plants/oriental-salad-leaves-in-pots/">their own guide</a>.' ) .

					$h2( 'Pests and diseases' ) .
					$list(
						array(
							'<strong>Slugs and snails</strong> are the main threat. Raise young plants indoors so they go out sturdy, and pick slugs off by torchlight on damp evenings. The RHS advises against slug pellets of any kind.',
							'<strong>Birds</strong> peck young lettuces in early spring. A layer of fleece or chicken wire keeps them off.',
							'<strong>Aphids</strong> cluster on the leaves, and root aphids feed out of sight on the roots, making plants wilt.',
							'<strong>Downy mildew</strong> causes angular yellow patches with white mould underneath. Remove affected leaves and do not crowd plants.',
							'<strong>Grey mould</strong> appears in cool, humid summers as fuzzy grey rot. Good spacing and morning watering help.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting hearting lettuces too close together: they stay loose and floppy instead of forming a heart.',
							'Leaving a ready lettuce in the pot "to grow a bit more": it bolts and turns bitter.',
							'Sowing a whole packet at once: you get a glut, then nothing. Sow a few seeds every couple of weeks.',
							'Watering in the evening: wet compost overnight brings slugs and mould.',
							'Keeping the pot in full midday sun in July: heat and dry compost cause early flowering.',
						)
					),
				'image_prompt' => 'Three mature lettuces in a 40 cm wide terracotta trough on a sunny balcony in early summer: a compact Little Gem cos lettuce with an upright, tight, mid-green heart, a frilly red-edged Lollo Rossa, and a lime-green oak-leaved Salad Bowl lettuce with deeply lobed leaves. The compost is dark and moist, a watering can and a metal railing are softly blurred behind, morning light from the side. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a single firm cos lettuce, upright with crisp mid-green leaves and a tight heart, growing in a 30 cm round terracotta pot on a wooden balcony floor, with a small kitchen knife resting beside the pot. The pot sits in the lower half of the frame; the top third is a calm, softly blurred pale wall, empty for a title. Soft morning light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'swiss-chard-in-pots'   => array(
				'title'        => 'How to Grow Swiss Chard in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7, 8 ),
					'plant'   => array( 5 ),
					'harvest' => array( 3, 4, 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt'      => 'Swiss chard needs a big container, at least 40 cm (16 in) wide and deep, and in return gives leaves for months from a single sowing. Sow in April for summer and autumn pickings and again in July for leaves the following spring.',
				'facts'        => array(
					'short_name'     => 'Swiss chard',
					'botanical_name' => 'Beta vulgaris subsp. cicla var. flavescens',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun; tolerates light shade in summer',
					'pot_size'       => 'At least 40 cm (16 in) wide and deep',
					'hardiness'      => 'H3',
					'watering'       => 'Regularly; container compost dries quickly',
					'harvest'        => 'Outer leaves over several months',
					'season'         => 'Sow April and July for most of the year',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Use a container at least 40 cm (16 in) wide and deep, filled with peat-free multi-purpose compost.' ),
						array( 'point' => 'Sow the large seeds about 2.5 cm (1 in) deep and 10 cm (4 in) apart, then thin to 30 cm (1 ft) for full-sized plants.' ),
						array( 'point' => 'Two sowings, one in April and one in July, can keep a pot cropping for most of the year.' ),
						array( 'point' => 'Cut outer leaves at the base of the stalk and leave the centre to keep growing.' ),
						array( 'point' => 'Chard needs no feeding in fresh potting compost, only regular water.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Bright Lights', 'note' => 'An RHS Award of Garden Merit variety with stems in red, yellow and orange. Rated H3.' ),
						array( 'name' => 'Rhubarb Chard', 'note' => 'An RHS Award of Garden Merit variety with bright red stalks and puckered, purple-tinged leaves. Very ornamental in a pot.' ),
						array( 'name' => 'Charlotte', 'note' => 'An RHS Award of Garden Merit variety with dark green leaves and red veins and stalks.' ),
						array( 'name' => 'Fordhook Giant', 'note' => 'An RHS Award of Garden Merit variety: vigorous and productive, with white stems. The RHS notes that white-stemmed chards tend to be the hardiest.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 40 cm (16 in) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Room for one or two full-sized plants.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost holds enough food for chard.', 'url' => '' ),
						array( 'name' => 'Clean secateurs or kitchen scissors', 'badge' => '', 'note' => 'For cutting stalks cleanly at the base.', 'url' => '' ),
						array( 'name' => 'Insect barrier netting', 'badge' => '', 'note' => 'Keeps beet leaf miner flies off the leaves.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Is Swiss chard the same as perpetual spinach?', 'answer' => 'They are close relatives. The RHS lists perpetual spinach and leaf beet as other names for chard, which is related to beetroot rather than to true spinach. If you want true spinach, see our spinach guide.' ),
						array( 'question' => 'Can Swiss chard stay outside in a pot over winter?', 'answer' => 'Yes. Chard is hardy and survives winter outdoors, though it stops making new leaves in the cold. Bright Lights is rated H3 by the RHS. A cloche, or a move into a greenhouse, may give a few winter leaves and a faster start in spring.' ),
						array( 'question' => 'Can you eat chard stems?', 'answer' => 'Yes. The thick stems are crunchy raw, a little like celery, or can be steamed. They take slightly longer to cook than the leaves.' ),
						array( 'question' => 'What are the brown blotches inside my chard leaves?', 'answer' => 'Probably beet leaf miner. Its maggots tunnel inside the leaf, leaving pale patches that turn brown. Pick off mined leaves or squash the maggots in the leaf, and use insect barrier netting to stop the flies laying eggs.' ),
						array( 'question' => 'What should I do when chard starts to flower?', 'answer' => 'Cut off the flower stems as they appear and the plant keeps producing leaves for a while. Once it flowers in earnest it stops being productive, so compost it and sow again.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow chard', 'url' => 'https://www.rhs.org.uk/vegetables/chard/grow-your-own' ),
						array( 'title' => 'RHS — Chard [Bright Lights] (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/165063/bright-lights-agm/details' ),
						array( 'title' => 'RHS — Chard \'Rhubarb Chard\'', 'url' => 'https://www.rhs.org.uk/plants/27866/rhubarb-chard-agm/details' ),
						array( 'title' => 'RHS — Beet leaf miner', 'url' => 'https://www.rhs.org.uk/biodiversity/beet-leaf-miner' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'A long-cropping leaf for a big pot' ) .
					$p( 'Swiss chard, also sold as leaf beet, is a close relative of beetroot grown for its leaves rather than its root. It forms a clump of large, glossy leaves on thick stalks in white, yellow, orange, pink or red. Young leaves go raw into salads; bigger ones are cooked like spinach, and the stalks can be eaten too.' ) .
					$p( 'You pick a few leaves at a time and the plant keeps making more, so a spring sowing crops right through summer into autumn, and a midsummer sowing stands through winter to give early leaves the next spring. With colourful stems it also looks good among flowers on a patio.' ) .

					$h2( 'Choose the container and the spot' ) .
					$p( 'Chard grows large, with leaves at least 30 cm (1 ft) tall, so pick a container at least 40 cm (16 in) wide and deep. Fill it with peat-free multi-purpose compost; for more on mixing and refreshing it, see <a href="/plant-care/compost-for-containers/">compost for containers</a>.' ) .
					$p( 'Stand the pot in a warm, sunny place. In summer it tolerates some light shade. Choose white-stemmed varieties if your balcony is cold and exposed, as they tend to be the hardiest and most productive.' ) .

					$h2( 'Sow in spring and again in midsummer' ) .
					$p( 'The seeds are big and easy to handle. Outdoors, sow straight into the container from April to July: space them 10 cm (4 in) apart, cover with about 2.5 cm (1 in) of compost and water gently so they are not washed out. Thin the seedlings to 30 cm (1 ft) for large plants, or to 5 cm (2 in) if you only want baby leaves.' ) .
					$p( 'For an earlier start, or to keep seedlings away from slugs, sow indoors from early spring in modules of peat-free seed compost, one or two seeds per cell, and keep the stronger seedling. Harden off the young plants and move them to the container once they are at least 5 cm (2 in) tall.' ) .
					$p( 'Two sowings are usually enough: one in April for summer and autumn, and one in July for leaves the following spring. For baby salad leaves only, sow small batches every few weeks from March to August.' ) .

					$h2( 'Watering and mulching' ) .
					$p( 'Chard planted in the ground copes with dry spells once established, but a container dries out quickly, so water regularly all season; <a href="/plant-care/how-often-to-water-container-plants/">this watering guide</a> covers how to judge it. A mulch of garden compost on the surface helps hold moisture. Keep it a little away from the base of the plant so the stalks do not rot. Fresh potting compost gives chard all the food it needs.' ) .

					$h2( 'Picking the leaves' ) .
					$p( 'Take the outer leaves first, cutting each stalk cleanly at its base with secateurs or scissors. Leave several central leaves to grow on for the next picking a few weeks later. Regular light picking encourages fresh growth.' ) .
					$p( 'Once a plant is well established and at least 20 cm (8 in) tall, you can instead cut all the leaves at once, at least 5 cm (2 in) above the base. The sturdy root sprouts a new set; allow longer between cuts with this method. Leaves up to about 5 cm (2 in) long are tender enough to eat raw.' ) .

					$h2( 'Winter and flowering' ) .
					$p( 'Chard is hardy and survives winter outside without protection, but it stops growing when temperatures drop. A cloche over the pot, or a spell in a greenhouse, can give a few leaves in mild weather and a quicker restart in spring, when overwintered plants produce fresh, tender growth.' ) .
					$p( 'In hot weather, or in its second year, chard sends up flower stems. Cut them off and the plant carries on making leaves for a while longer. When flowering takes over, the plant has finished: compost it and start again with a new sowing.' ) .

					$h2( 'Pests and diseases' ) .
					$list(
						array(
							'<strong>Slugs and snails</strong> go for seedlings, especially in damp weather. Sowing indoors gets plants past the most vulnerable stage.',
							'<strong>Birds</strong> can pull up and eat young seedlings. Cover a newly sown pot with netting or fleece.',
							'<strong>Beet leaf miner</strong> maggots tunnel inside the leaves, leaving blotches that turn brown. Remove mined leaves or squeeze the mines to crush the maggots; insect barrier netting stops the flies laying eggs.',
							'<strong>Downy mildew and grey mould</strong> appear in damp weather and crowded plants. Thin to the full spacing so air moves between leaves.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a small pot: chard is a big plant and needs at least 40 cm (16 in) of width and depth.',
							'Stripping every leaf from a young plant: wait until it is at least 20 cm (8 in) tall before cutting it all.',
							'Cutting full-sized leaves too close to the base: leave at least 5 cm (2 in) of stump so the plant regrows.',
							'Piling mulch against the stalks, which can make them rot.',
							'Sowing only once: add a July sowing to have leaves the following spring.',
						)
					),
				'image_prompt' => 'A large Swiss chard plant of the variety Bright Lights growing in a 45 cm wide charcoal-grey container on a sunny patio in late summer. Broad, glossy, slightly puckered dark green leaves rise on thick upright stalks in vivid red, yellow, orange and pink; a few outer stalks have been cut cleanly at the base. The compost is dark and moist, brick paving and a wooden bench are softly blurred behind, warm afternoon sunlight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a rainbow Swiss chard plant with glossy dark green, puckered leaves on bright red, yellow and orange stalks, growing in a tall grey container on a balcony, a few freshly cut stalks lying beside the pot. The plant fills the lower half of the frame; the top third is calm, softly blurred pale sky and wall, empty for a title. Warm side light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'beetroot-in-pots'      => array(
				'title'        => 'How to Grow Beetroot in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7 ),
					'harvest' => array( 6, 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Beetroot grows well in a container at least 40 cm (16 in) wide, as long as you choose a round-rooted variety and keep it in full sun. Sow from March to July and lift the roots between golf-ball and cricket-ball size, usually 50 to 60 days after sowing.',
				'facts'        => array(
					'short_name'     => 'Beetroot',
					'botanical_name' => 'Beta vulgaris',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun',
					'pot_size'       => 'At least 40 cm (16 in) wide and deep',
					'hardiness'      => 'H3',
					'watering'       => 'Keep fairly moist; avoid swings between dry and wet',
					'harvest'        => 'Usually 50–60 days after sowing',
					'season'         => 'Sow March to July; harvest June to October',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Pick a variety with round roots rather than long ones, and a pot at least 40 cm (16 in) wide.' ),
						array( 'point' => 'Soak the seed in warm water for an hour before sowing to help it germinate.' ),
						array( 'point' => 'Sow 2.5 cm (1 in) deep, with seed clusters 10 cm (4 in) apart.' ),
						array( 'point' => 'Uneven watering makes roots split, too little makes them woody, and too much gives leaves instead of roots.' ),
						array( 'point' => 'Lift roots from golf-ball size and do not let them grow past cricket-ball size.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Boltardy', 'note' => 'An RHS Award of Garden Merit variety with round, dark red roots. Resists bolting, so it suits early sowings. Rated H3.' ),
						array( 'name' => 'Pablo', 'note' => 'An RHS Award of Garden Merit variety with smooth, round, dark red roots that can be sown right through the season and picked as baby beets or stored.' ),
						array( 'name' => 'Wodan', 'note' => 'An RHS Award of Garden Merit variety: early, with bright red round roots, good for pickling.' ),
						array( 'name' => 'Babietola di Chioggia', 'note' => 'An Italian variety whose roots show pink and white rings when sliced.' ),
						array( 'name' => 'Bull\'s Blood', 'note' => 'Glossy deep-red leaves that the RHS suggests for adding colour to salads, as well as the roots.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 40 cm (16 in) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Width matters more than depth for round varieties.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For sowing straight into the container.', 'url' => '' ),
						array( 'name' => 'Bolt-resistant beetroot seed', 'badge' => '', 'note' => 'The safer choice for March and April sowings.', 'url' => '' ),
						array( 'name' => 'Biodegradable fleece', 'badge' => '', 'note' => 'Covers early sowings to help germination.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why is my beetroot all leaves and no swelling?', 'answer' => 'Over-watering is one cause: too much water pushes leaf growth at the expense of the root. Bolting is another, set off by hot, dry spells or very cool sowing conditions. Water steadily but not excessively, and choose a bolt-resistant variety for early sowings.' ),
						array( 'question' => 'Do I need to thin beetroot seedlings?', 'answer' => 'Not if you want small, golf-ball-sized roots. For larger roots, thin the seedlings to 10 cm (4 in) apart when they are about 2.5 cm (1 in) tall, and eat the thinnings in salads.' ),
						array( 'question' => 'Can you eat beetroot leaves?', 'answer' => 'Yes. Young leaves can go raw into salads and older ones can be cooked like spinach. You can take a few from each plant while it grows, but leave at least four or five on every plant so the root keeps swelling.' ),
						array( 'question' => 'Why do several beetroot seedlings come up from one seed?', 'answer' => 'Most beetroot "seeds" are really a corky cluster of several seeds. Thin to the strongest seedling for bigger roots, or leave the clump to grow a bunch of small baby beets.' ),
						array( 'question' => 'How do I store beetroot from a pot?', 'answer' => 'Roots from June sowings onwards can be lifted in autumn and stored. Brush off the compost, twist off the leaves about 2.5 cm (1 in) above the root and pack them in dry sand, potting compost or coir in a shed or garage. Larger roots keep better than small ones.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow beetroot', 'url' => 'https://www.rhs.org.uk/vegetables/beetroot/grow-your-own' ),
						array( 'title' => 'RHS — Beta vulgaris \'Boltardy\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/107289/boltardy-agm/details' ),
						array( 'title' => 'RHS — Beta vulgaris \'Pablo\'', 'url' => 'https://www.rhs.org.uk/plants/107286/pablo-agm/details' ),
						array( 'title' => 'RHS — Beet leaf miner', 'url' => 'https://www.rhs.org.uk/biodiversity/beet-leaf-miner' ),
					),
				),
				'content'      =>
					$h2( 'Roots and leaves from one container' ) .
					$p( 'Beetroot takes up little room, especially if you pull it young, which makes it one of the easier root crops for a balcony. Besides the familiar purple-red, there are crimson, orange, yellow, white and striped varieties; paler kinds do not stain your hands, while darker ones tend to taste richer and earthier. The leaves are edible too, so a single pot gives you two crops.' ) .

					$h2( 'Pot, compost and variety' ) .
					$p( 'Choose a container at least 40 cm (16 in) wide and deep and fill it with peat-free multi-purpose compost; see <a href="/plant-care/compost-for-containers/">compost for containers</a> for what a good mix needs. Pick a variety with round or oval roots; long, tapering ones are better left for open ground. Put the pot in full sun.' ) .
					$p( 'Early sowings are prone to bolting, when the plant flowers instead of swelling its root, so for March and April choose a bolt-resistant variety such as Boltardy.' ) .

					$h2( 'Sow from March to July' ) .
					$p( 'Each corky beetroot "seed" is usually a cluster of several seeds. They can be slow to start, so soak them in warm water for an hour first. Sow outdoors from late March or April, once the soil has warmed to at least 7 °C (45 °F), and carry on until July. From late February you can try an earlier sowing of a bolt-resistant variety under biodegradable fleece or a cloche.' ) .
					$list(
						array(
							'Water the compost in the container and let it drain.',
							'Set the seed clusters 10 cm (4 in) apart and cover them with about 2.5 cm (1 in) of compost.',
							'For bunches of baby beets, sow two or three clusters together, with each group 15 cm (6 in) apart.',
							'Water again gently if the surface looks dry.',
						)
					) .
					$p( 'For a longer harvest, sow a short batch every few weeks rather than filling the pot at once; <a href="/plant-care/succession-sowing-small-spaces/">succession sowing in small spaces</a> shows how. You can also start beetroot indoors in modules, one cluster per cell 2.5 cm (1 in) deep, and plant out when the seedlings are at least 5 cm (2 in) tall, hardened off and well rooted.' ) .

					$h2( 'Thinning' ) .
					$p( 'For golf-ball roots, leave the seedlings as they are. For bigger roots, thin them when they reach about 2.5 cm (1 in) tall, keeping the strongest one every 10 cm (4 in). The pulled seedlings are good in salads. If you raised clumps in modules, plant each clump whole about 15 cm (6 in) apart and do not split it.' ) .

					$h2( 'Watering and feeding' ) .
					$p( 'Watering decides the texture of the roots. Too little and they turn woody; a dry spell followed by a soaking makes them split; too much gives lush leaves and small roots. In a container, which dries out far quicker than the ground, aim for compost that stays fairly moist; our <a href="/plant-care/how-often-to-water-container-plants/">watering guide</a> shows how to check.' ) .
					$p( 'Beetroot rarely needs feeding. If plants look weak and slow, give an organic high-nitrogen liquid fertiliser. Pull weeds by hand rather than with a tool, to avoid nicking the tops of the roots.' ) .

					$h2( 'Harvest and storage' ) .
					$p( 'Beetroot can be ready in as little as 40 days, though 50 to 60 is more usual. The best flavour and texture come at 4–7 cm (1⅓–3 in) across. Lift every other root once they reach golf-ball size and let the rest grow on, but pull them all before they pass cricket-ball size, or they may turn woody. Loosen the compost with a hand fork first.' ) .
					$p( 'You can also pick a few young leaves from each plant through the season, raw for salads or cooked like spinach, as long as each plant keeps at least four or five. Roots from June sowings onwards can be stored for winter: twist off the leaves about 2.5 cm (1 in) above the root and pack the roots in dry sand, potting compost or coir in a shed or garage.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Growing a long-rooted variety in a pot: choose round roots instead.',
							'Sowing early without a bolt-resistant variety: cold starts often trigger flowering.',
							'Leaving roots to grow huge: past cricket-ball size they turn woody.',
							'Drowning the pot: excess water grows leaves, not roots.',
							'Stripping the leaves: always leave four or five on each plant.',
						)
					),
				'image_prompt' => 'A wide 45 cm terracotta pot of beetroot on a sunny balcony in midsummer, with upright, glossy dark green leaves veined with deep red on red stalks, and the round, dark purple-red shoulders of golf-ball-sized roots showing above the dark compost. Two freshly pulled beetroots with leaves lie on the wooden floor beside the pot. Bright morning sunlight, railing softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a bunch of freshly pulled round beetroots with deep red skins and red-veined green leaves, held just above a terracotta pot of growing beetroot on a balcony. The pot and roots fill the lower half of the frame; the top third is calm, softly blurred pale wall and sky, empty for a title. Soft daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'spring-onions-in-pots' => array(
				'title'        => 'How to Grow Spring Onions in Pots',
				'type'         => 'vegetables',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5, 6, 7, 8, 9 ),
					'plant'   => array( 3, 4, 5 ),
					'harvest' => array( 3, 4, 5, 6, 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Spring onions, also called salad onions or scallions, take about two months from sowing to harvest and thrive in a sunny, warm spot in any pot from 30 cm (1 ft) wide upwards. Scatter a pinch of seed every couple of weeks from March, and sow a hardy variety in late summer for onions the following spring.',
				'facts'        => array(
					'short_name'     => 'Spring onion (salad onion)',
					'botanical_name' => 'Allium cepa, Allium fistulosum',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, sheltered',
					'pot_size'       => 'At least 30 cm (1 ft) wide',
					'hardiness'      => 'H4',
					'watering'       => 'More often than in the ground; do not let the pot dry out',
					'harvest'        => 'About 8 weeks after sowing',
					'season'         => 'Sow March to September',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Scatter seed thinly over a pot at least 30 cm (1 ft) wide and cover it with about 1 cm (½ in) of peat-free compost.' ),
						array( 'point' => 'Thin the seedlings to about 2.5 cm (1 in) apart; closer spacing invites downy mildew.' ),
						array( 'point' => 'Pull them at about 15 cm (6 in) tall, when the bulb is no more than 1–2.5 cm (½–1 in) across.' ),
						array( 'point' => 'Sow a pinch every couple of weeks from March for a steady supply.' ),
						array( 'point' => 'Sow a hardy variety in late summer or early autumn for pulling from March.' ),
					),
					'varieties'  => array(
						array( 'name' => 'White Lisbon', 'note' => 'An RHS Award of Garden Merit variety: an older, fast-growing favourite with small white bulbs. Rated H4.' ),
						array( 'name' => 'Ishikura', 'note' => 'An RHS Award of Garden Merit variety of Allium fistulosum with long white stems that do not swell into bulbs. It crops from summer to autumn without repeat sowings. Rated H5.' ),
						array( 'name' => 'Apache', 'note' => 'An RHS Award of Garden Merit variety with purple-skinned bulbs, dark green leaves and a mild flavour.' ),
						array( 'name' => 'Guardsman', 'note' => 'An RHS Award of Garden Merit variety with tall, upright leaves, slow to form bulbs.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 30 cm (1 ft) wide, with drainage holes', 'badge' => '', 'note' => 'Enough for a generous scatter of seed.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each sowing.', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Some protection against onion fly.', 'url' => '' ),
						array( 'name' => 'Biodegradable fleece', 'badge' => '', 'note' => 'Covers hardy autumn sowings in harsh weather.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How long do spring onions take to grow?', 'answer' => 'About two months from sowing to pulling. The RHS plant page for White Lisbon says harvesting can usually start eight weeks after sowing.' ),
						array( 'question' => 'Can spring onions survive winter in a pot?', 'answer' => 'Hardy varieties can. Sow them in late summer or early autumn; they make small, sturdy plants before winter and are ready from March. Cover the pot with fleece or a cloche in harsh weather. White Lisbon is rated H4 by the RHS, hardy through most of the UK.' ),
						array( 'question' => 'Do spring onions need thinning?', 'answer' => 'Thin them to about 2.5 cm (1 in) apart. Crowded plants are more prone to downy mildew, and the thinnings can go straight into a salad.' ),
						array( 'question' => 'Why do my spring onions taste so strong?', 'answer' => 'They have grown too big. Young salad onions are sweet and mild, and the flavour gets stronger as they grow. Pull them at about 15 cm (6 in) tall and keep sowing small batches.' ),
						array( 'question' => 'What is the difference between Ishikura and ordinary spring onions?', 'answer' => 'Ishikura belongs to a different species, Allium fistulosum. Its long stems stay straight instead of forming a bulb, and one sowing gives a long harvest from summer into autumn, so you need fewer repeat sowings.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow salad onions', 'url' => 'https://www.rhs.org.uk/vegetables/salad-onions/grow-your-own' ),
						array( 'title' => 'RHS — Allium cepa \'White Lisbon\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/112442/white-lisbon-agm/details' ),
						array( 'title' => 'RHS — Allium fistulosum \'Ishikura\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/257216/ishikura-agm/details' ),
						array( 'title' => 'RHS — Onion fly', 'url' => 'https://www.rhs.org.uk/biodiversity/onion-fly' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why spring onions suit a small pot' ) .
					$p( 'Spring onions are quick, tidy and happy in a container. They are varieties of the common onion (Allium cepa) or of a related species, Allium fistulosum. Some form a small round white or purple bulb, others stay straight like slim leeks. You pull them young and eat them raw or in stir-fries.' ) .

					$h2( 'Pot and position' ) .
					$p( 'A pot at least 30 cm (1 ft) wide is enough. Peat-free multi-purpose compost suits them (<a href="/plant-care/compost-for-containers/">our compost guide</a> covers the details). Stand the pot in a warm, sunny, sheltered spot near the kitchen door, so you can pull a few as you cook. Spring onions have a small root system, which is why rich compost and steady moisture matter.' ) .

					$h2( 'Sowing' ) .
					$p( 'Water the compost well, scatter the seed thinly over the surface and cover it with about 1 cm (½ in) of compost. Outdoor sowings can start in March and continue through summer. A pinch of seed every couple of weeks keeps them coming without a glut; the <a href="/plant-care/succession-sowing-small-spaces/">succession sowing guide</a> has a simple plan. Ishikura is the exception: one sowing crops over a long period.' ) .
					$p( 'If you want an early crop, sow in modules indoors in March, harden the young plants off and move them out in spring, a few centimetres apart, watering before and after planting. Young plants are also sold in spring and early summer if you only need a few.' ) .

					$h2( 'Thinning and care' ) .
					$p( 'Thin the seedlings to about 2.5 cm (1 in) apart and use the thinnings in salads. Plants left closer together are more likely to suffer from downy mildew. Pull out any weeds, as spring onions grow poorly when they compete for light and moisture.' ) .
					$p( 'In the ground, salad onions only need water in long dry spells, but a pot dries out quickly, especially in hot weather, so water it more often; <a href="/plant-care/how-often-to-water-container-plants/">our watering guide</a> explains how to check.' ) .

					$h2( 'Harvesting' ) .
					$p( 'Spring onions generally reach a usable size about two months after sowing. They are at their best young, around 15 cm (6 in) tall, with a bulb no wider than 1–2.5 cm (½–1 in), depending on the variety. Pull them as you need them. The longer they grow, the stronger the taste.' ) .

					$h2( 'A winter-hardy sowing' ) .
					$p( 'Hardy varieties sown in late summer or early autumn grow into small, tough plants before winter and can be pulled from March. Cover the pot with biodegradable fleece or a cloche in harsh weather or cold areas. White Lisbon is rated H4 by the RHS and Ishikura H5.' ) .

					$h2( 'Pests and diseases' ) .
					$list(
						array(
							'<strong>Onion fly</strong> maggots feed on roots and bulbs and can kill seedlings; older plants show yellowing, wilting outer leaves. Damage is worst in June and July. Insect-proof mesh gives some protection.',
							'<strong>Onion downy mildew</strong> damages the leaves in damp, crowded conditions. Thin to the right spacing.',
							'<strong>Onion white rot</strong> is a serious fungal disease that yellows the leaves and rots the roots and bulb.',
							'<strong>Slugs and snails</strong> can eat young seedlings in damp weather.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing too thickly and never thinning: crowded onions are prone to mildew.',
							'Letting them grow on for weeks: they lose their sweet, mild taste.',
							'Sowing the whole packet in one go instead of a pinch every couple of weeks.',
							'Using a summer variety for an autumn sowing: choose a hardy one to stand the winter.',
							'Forgetting that a pot needs more water than a bed, especially in hot weather.',
						)
					),
				'image_prompt' => 'A 30 cm round glazed blue pot packed with a dense clump of spring onions on a sunny, sheltered balcony in early summer. The plants have straight, hollow, upright blue-green leaves about 15 cm tall above slim white stems; a few have been pulled and lie on the edge of the pot, showing small white bulbs and fine white roots. Dark moist compost, wooden decking and a railing softly blurred behind, bright morning light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a small bunch of freshly pulled spring onions with slim white stems, small white bulbs and hollow green leaves, resting on the rim of a pot of growing spring onions on a balcony. The pot fills the lower half of the frame; the top third is calm, softly blurred pale wall, empty for a title. Soft daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
