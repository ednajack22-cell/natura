<?php
/**
 * Starter guides, batch 27 (harvest, storage and the year's end): eight
 * Plant Care articles on freezing vegetables and berries, drying chili
 * peppers and tomatoes, storing the harvest, the end-of-season cleanup, seeds or young
 * plants, choosing a fruit tree for a pot, and natural pest control.
 *
 * Gardening facts come from the RHS pages listed in each guide (checked
 * 18 October 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Food-safety facts (blanching, freezing,
 * drying, storage times) come only from the US National Center for Home Food
 * Preservation (University of Georgia), Colorado State University Extension
 * and the UK Food Standards Agency (labeled UK); none of the book's recipes
 * is used.
 * Rootstocks, pollination, pot sizes and hardiness in the fruit tree guide
 * are the ones given in each tree's own plant guide. Timing in the text is
 * given by season or relative to frost dates, for US and UK readers.
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

$nchfp_blanch  = array( 'title' => 'National Center for Home Food Preservation (University of Georgia) — Blanching vegetables', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/blanching-vegetables/' );
$nchfp_storage = array( 'title' => 'National Center for Home Food Preservation — How long can I store frozen foods?', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/how-long-can-i-store-frozen-foods/' );
$nchfp_pack    = array( 'title' => 'National Center for Home Food Preservation — Packaging and labelling foods', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/packaging-and-labeling-foods/' );
$nchfp_thaw    = array( 'title' => 'National Center for Home Food Preservation — Thawing and preparing foods for serving', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/thawing-and-preparing-foods-for-serving/' );
$fsa_freeze    = array( 'title' => 'UK Food Standards Agency — How to chill, freeze and defrost food safely', 'url' => 'https://www.gov.uk/government/publications/how-to-chill-freeze-and-defrost-food-safely/how-to-chill-freeze-and-defrost-food-safely' );
$rhs_prevent   = array( 'title' => 'RHS — Preventing pest and disease problems', 'url' => 'https://www.rhs.org.uk/prevention-protection/preventing-pest-and-disease-problems' );
$rhs_no_chem   = array( 'title' => 'RHS — Managing pests and diseases without chemicals', 'url' => 'https://www.rhs.org.uk/prevention-protection/controlling-pests-and-diseases-without-chemicals' );
$rhs_fruit_pot = array( 'title' => 'RHS — Fruit in containers', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/containers' );

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Harvest, storage and the year\'s end', 'natura-core' ),
	'guides' => array(
		'post' => array(
			'how-to-freeze-vegetables-from-your-pots' => array(
				'image_prompt' => 'A kitchen countertop beside a window with a balcony visible outside: a colander of freshly picked green beans and pea pods, a pan of boiling water with a wire basket, a large bowl of iced water, and a row of flat, labeled freezer bags of blanched beans and shelled peas, late summer daylight.' . $photo_end,
				'pin_prompt'   => 'Freshly picked green beans, shelled peas and sliced zucchini spread on a clean dish towel next to empty freezer bags and a marker pen, with potted bean plants on a sunny balcony in the soft background, photographed vertically from above.' . $pin_end,
				'title'        => 'How to Freeze Vegetables From Your Pots',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Most vegetables need a short blanch in boiling water before freezing: about 1½ minutes for shelled peas, 2 for leafy greens and 3 for green beans or zucchini slices, followed by the same time in cold water. Drain them well, pack them in small, airtight, labeled portions and keep them at 0 °F (-18 °C) or below.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Large pan with a lid and a wire basket', 'note' => 'Lets you lower vegetables into boiling water and lift them out in one go.', 'url' => '' ),
						array( 'name' => 'Freezer bags or rigid freezer containers', 'note' => 'Choose ones made for freezing, which keep out moisture and air.', 'url' => '' ),
						array( 'name' => 'Freezer labels or a freezer pen', 'note' => 'Write the crop and the date on every pack.', 'url' => '' ),
						array( 'name' => 'Freezer thermometer', 'note' => 'Checks that the freezer holds 0 °F (-18 °C) or below.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do I have to blanch vegetables before freezing them?', 'answer' => 'For almost all vegetables, yes. The National Center for Home Food Preservation explains that blanching stops the enzymes that spoil flavor, color and texture during frozen storage. Sweet and hot peppers are among the few exceptions that can go into the freezer raw.' ),
						array( 'question' => 'Can I blanch vegetables in the microwave?', 'answer' => 'It is not recommended. Research quoted by the National Center for Home Food Preservation found that microwaving may leave some enzymes active, which leads to off-flavors and poor texture, and it saves neither time nor energy.' ),
						array( 'question' => 'How long do frozen home-grown vegetables keep?', 'answer' => 'About 8 to 12 months at 0 °F (-18 °C) for best quality, if they were blanched and packed properly. After that they are still safe but slowly lose quality, so use the oldest packs first.' ),
						array( 'question' => 'Which crops from my pots should I not freeze?', 'answer' => 'Anything you would eat raw and crisp: lettuce, radishes and cucumbers turn limp and watery when thawed. Eat them fresh and plant little and often instead.' ),
						array( 'question' => 'Should I thaw frozen vegetables before cooking them?', 'answer' => 'Usually not. Most frozen vegetables cook best straight from the freezer in a little boiling water. Spinach and other leafy greens cook more evenly if partly thawed first.' ),
					),
					'sources'  => array(
						$nchfp_blanch,
						array( 'title' => 'National Center for Home Food Preservation — Blanching times', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/blanching-times/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing green peas', 'url' => 'https://nchfp.uga.edu/how/freeze/vegetable/freezing-green-peas/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing beans: green, snap or wax', 'url' => 'https://nchfp.uga.edu/how/freeze/vegetable/freezing-beans-green-snap-or-wax/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing greens (including spinach)', 'url' => 'https://nchfp.uga.edu/how/freeze/vegetable/freezing-greens-including-spinach/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing summer squash', 'url' => 'https://nchfp.uga.edu/how/freeze/vegetable/freezing-summer-squash/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing tomatoes', 'url' => 'https://nchfp.uga.edu/how/freeze/vegetable/freezing-tomatoes/' ),
						array( 'title' => 'National Center for Home Food Preservation — Foods that do not freeze well', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/foods-that-do-not-freeze-well/' ),
						$nchfp_storage,
						$nchfp_pack,
						$nchfp_thaw,
						$fsa_freeze,
						array( 'title' => 'RHS — Root vegetables: storing', 'url' => 'https://www.rhs.org.uk/vegetables/root-vegetables-storing' ),
						$book,
					),
				),
				'content'      =>
					$p( 'A balcony rarely gives a glut, but a few pots of beans or peas can still crop faster than you can eat them. Freezing small batches as they come keeps that surplus. The steps below follow the advice of the National Center for Home Food Preservation, a food-safety service run from the University of Georgia, with notes from the UK Food Standards Agency. Herbs have their own guide: <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Why blanching matters' ) .
					$p( 'Blanching means scalding vegetables briefly in boiling water. It stops the natural enzymes that keep working in the freezer and slowly spoil color, flavor and texture. It also cleans the surface and softens the pieces so they pack more easily.' ) .
					$p( 'Timing is the whole trick. Too short a blanch is worse than none, because it stirs the enzymes up without stopping them; too long a blanch cooks away flavor, color and vitamins.' ) .

					$h2( 'Blanch, cool and drain, step by step' ) .
					$list(
						array(
							'Pick young, tender vegetables and prepare them straight away: wash, trim and cut them to size.',
							'Bring a large pan of water to a rolling boil. Allow about 1 gallon of water per pound of vegetables (4 liters per 500 g).',
							'Lower the vegetables in a wire basket and cover the pan. Start timing when the water boils again; if it takes longer than a minute, you added too much at once.',
							'Lift the basket out and plunge it into plenty of cold or iced water for the same length of time as the blanch.',
							'Drain thoroughly. Water left on the pieces turns to ice and lowers the quality.',
						)
					) .

					$h2( 'Times for crops you grow in pots' ) .
					$p( 'Water-blanching times from the National Center for Home Food Preservation:' ) .
					$list(
						array(
							'<strong>Shelled peas:</strong> 1½ minutes. Pick them while the peas are young and sweet, before they turn starchy. See <a href="/plants/peas-in-pots/">peas in pots</a>.',
							'<strong>Snow pea and sugar snap pods:</strong> 1½ minutes for small pods, 2 for large ones.',
							'<strong>Green beans and runner beans:</strong> 3 minutes, cut into 2–4 in (5–10 cm) lengths. See <a href="/plants/green-beans-in-pots/">green beans</a> and <a href="/plants/runner-beans-in-pots/">runner beans</a>.',
							'<strong>Spinach and other leafy greens:</strong> 2 minutes, with woody stems removed. See <a href="/plants/spinach-in-pots/">spinach</a> and <a href="/plants/swiss-chard-in-pots/">Swiss chard</a>.',
							'<strong>Zucchini:</strong> 3 minutes for slices about ½ in (1 cm) thick. See <a href="/plants/zucchini-in-pots/">zucchini in pots</a>.',
							'<strong>Carrots:</strong> 2 minutes for slices or strips, 5 for small whole carrots.',
						)
					) .

					$h2( 'Vegetables that need different treatment' ) .
					$list(
						array(
							'<strong>Bell peppers</strong> can be frozen raw in halves or strips, which keeps them crisper. Blanch them (3 minutes for halves, 2 for strips) only if they will go into cooked dishes.',
							'<strong>Chili peppers</strong> need no blanching: wash them, remove the stalks and freeze them whole.',
							'<strong>Tomatoes</strong> can be frozen raw after dipping them in boiling water for 30 seconds to loosen the skins and peeling them. They collapse when thawed, so keep them for sauces and soups.',
							'<strong>Beets</strong> must be cooked until tender before freezing, then cooled, peeled and sliced. Roots from late sowings can also be <a href="/plant-care/how-to-store-your-harvest/">stored without freezing</a>.',
						)
					) .

					$h2( 'Pack, label and freeze' ) .
					$list(
						array(
							'Use freezer bags or rigid containers made for freezing. Ordinary cartons let in moisture and odours.',
							'Pack enough for one meal per bag, squeeze out as much air as you can and seal it.',
							'In rigid containers, leave about ½ in (1 cm) of space at the top for the food to expand.',
							'Label every pack with the crop and the date. The UK Food Standards Agency points out that unlabeled packs become mystery parcels.',
							'Freeze straight away, with a little space between new packs so cold air reaches them; stack them once frozen. Add only as much as the freezer can freeze within a day.',
						)
					) .
					$p( 'The National Center for Home Food Preservation advises freezing and storing food at 0 °F (-18 °C) or lower, and the UK Food Standards Agency recommends the same temperature. At that temperature, blanched vegetables keep their best quality for about 8 to 12 months. Freezer burn, the dry, pale patches on badly wrapped food, spoils the texture but does not make it unsafe.' ) .

					$h2( 'What not to freeze' ) .
					$p( 'Crops you eat raw for their crunch, such as lettuce, radishes and cucumbers, go limp and watery after freezing. Keep them for fresh eating and plant a little at a time instead: see <a href="/plant-care/succession-planting-small-spaces/">succession planting</a>. Most frozen vegetables can go straight into boiling water without thawing.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Freezing vegetables raw that need blanching, and finding them dull and tough a few months later.',
							'Blanching for less than the full time, which is worse than not blanching at all.',
							'Packing vegetables still wet from the cold water.',
							'Filling the freezer with a big batch of warm packs at once.',
							'Leaving packs unlabeled until you no longer know what or when.',
						)
					),
			),

			'how-to-freeze-berries'                   => array(
				'image_prompt' => 'A metal baking sheet lined with parchment paper on a kitchen table, covered with a single layer of raspberries, red currants and blueberries not touching each other, ready to go into the freezer, a potted raspberry cane and a blueberry bush in pots visible on the balcony through an open door, summer morning light.' . $photo_end,
				'pin_prompt'   => 'Frozen raspberries, blueberries and red currants being poured loose from a tray into a clear freezer bag, frost on the berries, a pot of strawberries on a balcony table behind, photographed vertically.' . $pin_end,
				'title'        => 'How to Freeze Berries So They Do Not Stick Together',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Spread ripe, dry berries in a single layer on a tray, freeze them until hard, then tip them into a freezer bag straight away: they stay loose, so you can pour out a handful at a time. Do not wash blueberries before freezing, and expect frozen berries to soften when thawed.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Shallow baking sheet that fits your freezer', 'note' => 'For freezing berries in one layer before bagging.', 'url' => '' ),
						array( 'name' => 'Parchment paper', 'note' => 'Stops berries freezing onto the metal.', 'url' => '' ),
						array( 'name' => 'Freezer bags or rigid freezer boxes', 'note' => 'Boxes protect soft raspberries from being crushed.', 'url' => '' ),
						array( 'name' => 'Freezer labels', 'note' => 'Note the fruit and the date.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Should I wash blueberries before freezing them?', 'answer' => 'No. The National Center for Home Food Preservation advises freezing blueberries unwashed, because washing gives them tougher skins. Rinse them when you take them out to use.' ),
						array( 'question' => 'Do I need sugar to freeze berries?', 'answer' => 'No. Small whole berries such as raspberries, blueberries, currants and blackberries freeze well plain, in what is called a dry pack. Sugar and syrup packs are options, not requirements.' ),
						array( 'question' => 'Why are my thawed raspberries mushy?', 'answer' => 'Freezing breaks the cell walls of soft fruit, so all thawed berries are softer than fresh ones. For eating on their own, serve them while a few ice crystals remain; otherwise use them in cooking, sauces or smoothies.' ),
						array( 'question' => 'How long can frozen berries be kept?', 'answer' => 'For about 8 to 12 months at 0 °F (-18 °C), the storage time the National Center for Home Food Preservation gives for fruit and vegetables. They stay safe after that, but slowly lose quality.' ),
					),
					'sources'  => array(
						array( 'title' => 'National Center for Home Food Preservation — Dry or tray packing for fruits', 'url' => 'https://nchfp.uga.edu/how/freeze/freeze-general-information/dry-or-tray-packing-for-fruits/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing raspberries', 'url' => 'https://nchfp.uga.edu/how/freeze/fruits/freezing-raspberries/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing strawberries', 'url' => 'https://nchfp.uga.edu/how/freeze/fruits/freezing-strawberries/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing blueberries', 'url' => 'https://nchfp.uga.edu/how/freeze/fruits/freezing-blueberries-or-huckleberries/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing currants', 'url' => 'https://nchfp.uga.edu/how/freeze/fruits/freezing-currants/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing gooseberries', 'url' => 'https://nchfp.uga.edu/how/freeze/fruits/freezing-gooseberries/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing blackberries', 'url' => 'https://nchfp.uga.edu/how/freeze/fruits/freezing-blackberries-or-dewberries/' ),
						$nchfp_storage,
						$nchfp_thaw,
						$fsa_freeze,
						$book,
					),
				),
				'content'      =>
					$p( 'Soft fruit from pots ripens a handful at a time, and a handful of raspberries rarely lasts more than a day or two in the fridge. Freeze each picking as it comes and you build up enough for a crumble or a pot of jam later. The method here follows the National Center for Home Food Preservation, a food-safety service based at the University of Georgia.' ) .

					$h2( 'Pick for the freezer' ) .
					$p( 'Freezing keeps quality but never improves it, so choose berries that are fully ripe and still firm, and sort out any soft, moldy or under-ripe ones. Pick on a dry day if you can, and freeze the same day. Our growing guides explain when each fruit is ripe: <a href="/plants/balcony-strawberry/">strawberries</a>, <a href="/plants/raspberries-in-pots/">raspberries</a>, <a href="/plants/blueberries-in-pots/">blueberries</a>, <a href="/plants/currants-in-pots/">currants</a> and <a href="/plants/gooseberries-in-pots/">gooseberries</a>.' ) .

					$h2( 'Prepare each fruit' ) .
					$list(
						array(
							'<strong>Raspberries and blackberries:</strong> rinse gently in cold water and drain well on paper towels.',
							'<strong>Strawberries:</strong> wash them first, then remove the green caps. Large ones can be sliced.',
							'<strong>Blueberries:</strong> remove leaves and stalks but do not wash them, which toughens the skins. Wash them after thawing.',
							'<strong>Red, white and black currants:</strong> wash in cold water and strip the berries from their stalks.',
							'<strong>Gooseberries:</strong> top and tail them, then wash. Fully ripe berries suit pies; slightly under-ripe ones suit jelly.',
						)
					) .

					$h2( 'Tray-freeze so they stay loose' ) .
					$list(
						array(
							'Line a shallow tray with parchment paper and spread the berries out in one layer, not touching.',
							'Put the tray flat in the freezer until the berries are hard.',
							'Tip them into freezer bags or boxes at once, squeeze out the air, seal and label. Left uncovered on the tray, they soon dry out and get freezer burn.',
						)
					) .
					$p( 'Because each berry froze on its own, you can pour out exactly what you need and reseal the bag. Raspberries keep their shape better in a rigid box, where nothing presses on them.' ) .

					$h2( 'How cold, and for how long' ) .
					$p( 'Keep the freezer at 0 °F (-18 °C) or below, the temperature the National Center for Home Food Preservation gives for best quality and the one the UK Food Standards Agency recommends. Plain frozen berries keep their best quality for roughly 8 to 12 months. Label each bag with the fruit and the date, and use the oldest first.' ) .

					$h2( 'Using frozen berries' ) .
					$p( 'Thawed berries are always softer than fresh ones, because ice crystals break their cells. Served on their own, they are best eaten while still slightly frozen. Otherwise use them straight from the freezer in baking, sauces, smoothies or jam. If you thaw more than you need, cook the rest rather than refreezing it raw.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Tipping freshly picked berries straight into a bag, where they freeze into one solid lump.',
							'Freezing berries that are still wet.',
							'Washing blueberries before freezing.',
							'Leaving tray-frozen berries uncovered for hours.',
							'Freezing over-ripe or bruised fruit and hoping the freezer will rescue it.',
						)
					),
			),

			'how-to-dry-chili-peppers-and-tomatoes'        => array(
				'image_prompt' => 'A string of bright red chili peppers threaded on cotton and hanging beside a sunny window, with a chili pepper plant in a terracotta pot on the sill below, and on the table in front a cooling rack of oven-dried tomato slices, dark red and shriveled, next to an empty glass storage jar, fall daylight.' . $photo_end,
				'pin_prompt'   => 'A long garland of dried red chili peppers hanging against a pale wall next to a balcony door, a potted chili pepper plant with a few ripe fruits at its foot, photographed vertically.' . $pin_end,
				'title'        => 'How to Dry Chili Peppers and Tomatoes at Home',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Thread ripe chili peppers on cotton and hang them somewhere airy until shriveled and leathery, or dry them in a dehydrator or an oven held at 140 °F (60 °C). Tomatoes need the controlled heat of a dehydrator or oven: peel and slice them, dry them until crisp, then store them in airtight jars somewhere cool, dark and dry.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Strong cotton thread and a large needle', 'note' => 'For threading chili peppers into a hanging string.', 'url' => '' ),
						array( 'name' => 'Food dehydrator with a thermostat', 'note' => 'The easiest way to hold a steady drying temperature.', 'url' => '' ),
						array( 'name' => 'Oven thermometer', 'note' => 'Checks that a low oven really stays at 140 °F (60 °C).', 'url' => '' ),
						array( 'name' => 'Clean glass jars with tight lids', 'note' => 'Show any moisture inside straight away.', 'url' => '' ),
						array( 'name' => 'Disposable gloves', 'note' => 'For cutting hot chili peppers.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I sun-dry tomatoes on my balcony?', 'answer' => 'Not reliably in a cool, damp climate. The National Center for Home Food Preservation says outdoor drying needs at least 85 °F (29 °C), humidity below 60 percent and several days, and it does not recommend drying vegetables outdoors at all. Use a dehydrator or an oven indoors.' ),
						array( 'question' => 'How do I know when dried chili peppers are ready?', 'answer' => 'Colorado State University Extension describes dried red chili peppers as shrunken, dark red pods that are still flexible. Air-dried chili peppers on a string are ready when they are shriveled and leathery all the way through, with no soft or damp patches.' ),
						array( 'question' => 'How long do home-dried tomatoes keep?', 'answer' => 'Colorado State University Extension says properly dried and stored vegetables keep well for six to twelve months. Check jars often, and throw away anything that smells off or shows mold.' ),
						array( 'question' => 'Why should I peel tomatoes before drying them?', 'answer' => 'Colorado State University Extension peels tomatoes before drying: dip them in boiling water to loosen the skins, cool them, then peel. Peeled slices dry evenly and rehydrate easily in sauces.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Preserving autumn produce (Caroline Mazzey, RHS Horticultural Advisor)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/preserving-autumn-produce' ),
						array( 'title' => 'Colorado State University Extension — Drying vegetables', 'url' => 'https://extension.colostate.edu/resource/drying-vegetables/' ),
						array( 'title' => 'National Center for Home Food Preservation — Packaging and storing dried foods', 'url' => 'https://nchfp.uga.edu/how/dry/drying-general/packaging-and-storing-dried-foods/' ),
						array( 'title' => 'National Center for Home Food Preservation — Sun drying', 'url' => 'https://nchfp.uga.edu/how/dry/drying-general/sun-drying/' ),
						array( 'title' => 'National Center for Home Food Preservation — Food dehydrators', 'url' => 'https://nchfp.uga.edu/how/dry/drying-general/food-dehydrators/' ),
						array( 'title' => 'National Center for Home Food Preservation — Freezing hot peppers', 'url' => 'https://nchfp.uga.edu/how/freeze/vegetable/freezing-hot-peppers/' ),
						$book,
					),
				),
				'content'      =>
					$p( 'One <a href="/plants/chili-peppers-in-pots/">chili pepper plant</a> can give more fruit than a household uses fresh, and a pot of <a href="/plants/cherry-tomato/">cherry tomatoes</a> often finishes with a rush. Drying removes enough water to stop the molds and bacteria that spoil food. It works well for chili peppers, which are fairly dry already, and for tomatoes given steady, controlled heat. The methods here come from Colorado State University Extension and the National Center for Home Food Preservation; herbs are covered separately in <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'What successful drying needs' ) .
					$p( 'Colorado State University Extension lists three things: enough heat to draw the moisture out without cooking the food, dry air to carry the moisture away, and good air movement. Too little heat at the start lets microbes survive and grow before the food is dry. Too much heat seals the surface, so moisture is trapped inside.' ) .

					$h2( 'Air-dry chili peppers on a string' ) .
					$p( 'An RHS horticultural advisor dries chili peppers by threading them on a needle and thread and hanging them where the air moves freely. Use ripe, unblemished fruit, push the needle through each stalk, and leave a small gap between peppers so air reaches every side. A warm, airy room away from cooking steam suits them. Wear gloves when handling hot varieties.' ) .
					$p( 'Check the string every few days and remove any pepper that softens or shows mold. They are ready when shriveled and leathery right through.' ) .

					$h2( 'Dry chili peppers faster with heat' ) .
					$p( 'In a dehydrator or oven, small red chili peppers can be dried whole, larger ones sliced. Colorado State University Extension allows 12 to 24 hours and describes the finished pods as shrunken, dark red and still flexible. It also recommends a short blanch for most vegetables before drying, to help destroy harmful bacteria, so follow its table if you dry large batches.' ) .
					$p( 'Chili peppers also freeze well whole, with no blanching. See <a href="/plant-care/how-to-freeze-vegetables-from-your-pots/">how to freeze vegetables from your pots</a>.' ) .

					$h2( 'Oven-dry or dehydrate tomatoes' ) .
					$list(
						array(
							'Use firm, ripe tomatoes. Dip them in boiling water to loosen the skins, cool them in cold water and peel them.',
							'Slice them about ½ in (1 cm) thick, or cut cherry tomatoes in half. Colorado State University Extension also dips the slices in a weak citric acid solution (1 teaspoon per liter, about a quart, of water, for 10 minutes) to help keep the color.',
							'Lay the pieces in a single, thin layer on racks or trays.',
							'Dry at about 140 °F (60 °C) until crisp. Colorado State University Extension gives 6 to 24 hours, depending on size and equipment.',
						)
					) .
					$p( 'A dehydrator with a thermostat holds that temperature easily. In an oven, set the lowest setting, prop the door open slightly so moist air escapes, and keep an oven thermometer on the rack, because many ovens run hotter or cooler than the dial says. Swap the trays round every half hour, and switch the heat off near the end, as nearly dry food scorches easily. Tomatoes picked green at the end of the season are better ripened first: see <a href="/plant-care/how-to-ripen-green-tomatoes/">how to ripen green tomatoes</a>.' ) .

					$h2( 'Why not outside in the sun?' ) .
					$p( 'The National Center for Home Food Preservation does not recommend drying vegetables outdoors: they are low in sugar and acid, so they spoil too easily when heat and humidity cannot be controlled. Even for fruit, it needs at least 85 °F (29 °C), humidity below 60 percent and several days of sun. A balcony in a cool or humid climate rarely offers that.' ) .

					$h2( 'Cool, pack and store' ) .
					$list(
						array(
							'Let everything cool completely before packing: warm food sweats in the jar, and that moisture lets mold grow.',
							'Pack into clean, dry glass jars or freezer bags, in amounts you will use at one time.',
							'Store somewhere cool, dark and dry. The warmer the store, the shorter the keeping time.',
							'Check the jars often. Pieces that have softened but are not moldy can be dried again; anything moldy goes in the trash.',
						)
					) .
					$p( 'Properly dried and stored, dried vegetables keep well for six to twelve months, according to Colorado State University Extension.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Hanging chili peppers in a steamy kitchen, where they stay damp and go moldy.',
							'Drying tomatoes in an oven that is too hot, which hardens the outside and traps moisture inside.',
							'Packing dried food while it is still warm.',
							'Storing jars on a sunny windowsill or above the stove.',
							'Trying to sun-dry vegetables in a cool, humid climate.',
						)
					),
			),

			'how-to-store-your-harvest'               => array(
				'image_prompt' => 'A cool, dim corner of a laundry room in fall: a burlap sack of maincrop potatoes, a slatted wooden tray of dry onions laid in a single layer, a braid of onions hanging on a hook, a box of beets packed in sand, and two winter squashes with hard skins on a shelf, soft light from a small window.' . $photo_end,
				'pin_prompt'   => 'Dry, papery onions spread in one layer on a wire rack in fall sun on a balcony table, with an empty potato bag and a pot of herbs nearby, photographed vertically.' . $pin_end,
				'title'        => 'How to Store Potatoes, Onions, Roots and Squash From Your Pots',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Store only sound, undamaged crops: dry maincrop potatoes for a few hours and keep them in paper sacks in a cool, dark, frost-free place; dry onions for about two weeks and keep them cool, airy and in the light; pack beets and carrots in moist sand. Cure squashes in the sun for a week or so, then keep them at 50–60 °F (10–15 °C).',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Paper or burlap sacks', 'note' => 'For maincrop potatoes: they keep out light but let moisture escape.', 'url' => '' ),
						array( 'name' => 'Slatted wooden trays or crates', 'note' => 'For onions, apples and pears in a single layer.', 'url' => '' ),
						array( 'name' => 'Net bags', 'note' => 'An alternative to trays for dry onions.', 'url' => '' ),
						array( 'name' => 'Boxes and clean sand or peat-free potting mix', 'note' => 'For packing beets and carrots.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I store new potatoes from a bag?', 'answer' => 'Not for long. The RHS says early potatoes are best eaten as soon as possible after lifting. Only maincrop potatoes are stored for winter, lifted after the leaves have yellowed and the top growth has been removed for 10 days.' ),
						array( 'question' => 'Should onions be stored in the dark?', 'answer' => 'No. Unlike potatoes, onions keep best in a light, cool, dry and airy place. The RHS warns that darkness encourages them to sprout.' ),
						array( 'question' => 'How can I store apples if I live in an apartment?', 'answer' => 'The RHS suggests putting small quantities in a plastic bag in the fridge: 4–6 lb (2–3 kg) per bag, with several holes pierced in it and the top folded over loosely. They keep for a few weeks this way.' ),
						array( 'question' => 'Can I store potatoes from a plant that had blight?', 'answer' => 'No. The RHS says you can usually still eat the crop if you harvest it quickly, but potatoes from blighted plants are not suitable for storing.' ),
						array( 'question' => 'How do I know a squash is ready to store?', 'answer' => 'The RHS looks for a tough skin, a deep, rich color and a hollow sound when tapped. Cut it with as much stalk as possible, never carry it by the stalk, and cure it before storing.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to grow potatoes', 'url' => 'https://www.rhs.org.uk/vegetables/potatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow onions', 'url' => 'https://www.rhs.org.uk/vegetables/onions/grow-your-own' ),
						array( 'title' => 'RHS — Root vegetables: storing', 'url' => 'https://www.rhs.org.uk/vegetables/root-vegetables-storing' ),
						array( 'title' => 'RHS — Pumpkins and winter squashes: storing', 'url' => 'https://www.rhs.org.uk/vegetables/pumpkins/storing' ),
						array( 'title' => 'RHS — Fruit: storing', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/storing' ),
						array( 'title' => 'RHS — Preserving autumn produce (Caroline Mazzey, RHS Horticultural Advisor)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/preserving-autumn-produce' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Some crops keep for months without a freezer, as long as they are mature, undamaged and kept in the right conditions. The catch on a balcony is space: most storage advice assumes a shed or a garage. This guide gives each crop\'s needs, so you can match them to the coolest corners you have. Garlic has its own drying and storing steps in <a href="/plants/garlic-in-pots/">garlic in pots</a>.' ) .

					$h2( 'Rules that apply to every crop' ) .
					$list(
						array(
							'Store only sound produce. Bruised, cut or diseased pieces rot first and spread rot to their neighbors, so eat those straight away.',
							'Handle crops gently when lifting and moving them.',
							'Keep pieces from touching where you can, so air moves around them.',
							'Check stores every few weeks and remove anything that starts to soften or smell.',
							'Keep rodents in mind: mice find stored crops in sheds and garages.',
						)
					) .

					$h2( 'Maincrop potatoes' ) .
					$p( 'Most potatoes grown in <a href="/plants/potatoes-in-bags/">bags</a> are earlies, which the RHS says are best eaten soon after lifting. Maincrop potatoes are the ones to keep. When their leaves turn yellow, cut off and remove all the top growth, then wait 10 days before tipping out the bag. Leave the tubers in the sun for a few hours to dry, and brush off the potting mix.' ) .
					$p( 'Store them in paper or burlap sacks, or on slatted trays, in a dry, cool, frost-free place, kept dark so they do not sprout or turn green. Check them every few weeks and plan to finish them before early spring, when they start to sprout and shrivel. Green potatoes should not be eaten.' ) .

					$h2( 'Onions' ) .
					$p( 'The RHS notes that onions can be grown in large containers. Lift them when the foliage yellows and topples, before it dies down completely, taking care not to bruise them. Dry them for about two weeks on a rack in full sun so air passes underneath; in damp weather, use a well-ventilated shed or porch.' ) .
					$p( 'Once the foliage is dry and papery, keep the onions in net bags, in single layers on trays, or braided and hung up. They need a light, cool, dry and airy spot: unlike potatoes, darkness makes them sprout. Use damaged onions first.' ) .

					$h2( 'Beets and carrots' ) .
					$p( 'Lift only roots in good condition. Twist off the leaves and pack the roots in layers of moist sand or a peat-free substitute in boxes, kept somewhere dark and frost-free. The moist packing stops them shrivelling. <a href="/plants/beets-in-pots/">Beets in pots</a> explains which sowings are worth storing; <a href="/plants/carrots-in-pots/">carrots in pots</a> covers when to lift.' ) .

					$h2( 'Winter squash and pumpkins' ) .
					$p( 'A squash for storing should stay on the plant as long as possible to build up sugar, but must come in before frost: frosted fruit will not keep. It is ready when the skin is tough and richly colored and it sounds hollow when tapped. Cut it with as much stalk as you can, because rot starts at that end.' ) .
					$p( 'Cure the fruit in the sun for about a week to ten days, covering it on frosty nights, or under glass in wet weather, without the fruits touching. Then store it somewhere well ventilated between 50 and 60 °F (10 and 15 °C). Kept like this, the RHS says, pumpkins and winter squashes can last up to six months. Growing one on a balcony is covered in <a href="/diy-projects/grow-a-squash-up-a-trellis-in-a-pot/">grow a squash up a trellis in a pot</a>.' ) .

					$h2( 'Apples and pears' ) .
					$p( 'Late-ripening varieties store longest. Pick unblemished, medium-sized fruit, ideally slightly under-ripe and with the stalk on, and lay it in single layers in slatted trays or boxes, not touching. The RHS gives an even 39–46 °F (4–7 °C) as ideal; apples are damaged below about 37 °F (3 °C), while pears tolerate down to 32 °F (0 °C). Keep fruit away from onions, paint and fertilizers, whose smells taint it, and check pears almost daily, as they ripen fast.' ) .
					$p( 'Without a cool shed or garage, small quantities of apples can go in the fridge in a pierced plastic bag for a few weeks. Choosing a tree in the first place is covered in <a href="/plant-care/how-to-choose-a-fruit-tree-for-a-pot/">how to choose a fruit tree for a pot</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Storing damaged or diseased produce with the sound crop.',
							'Trying to keep early potatoes for months.',
							'Keeping onions in a dark cupboard, where they sprout.',
							'Bringing squashes in after a frost, or skipping the curing.',
							'Storing apples next to onions or near paint.',
						)
					),
			),

			'end-of-season-balcony-cleanup'              => array(
				'image_prompt' => 'A small balcony on a still fall afternoon being cleared at the end of the season: spent tomato plants pulled and laid on a sheet, a stack of scrubbed terracotta and plastic pots drying upside down, bundled bamboo canes and plant labels in a bucket, hand pruners and a stiff brush on a low table, one pot of seedheads left standing in a corner.' . $photo_end,
				'pin_prompt'   => 'Clean, empty terracotta pots stacked upside down on a balcony floor next to a brush, a watering can and a bundle of canes, a pot of dry seedheads left standing beside them, photographed vertically.' . $pin_end,
				'title'        => 'End-of-Season Balcony Cleanup: What to Do With Your Pots in Fall',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Clear out finished crops, sending diseased plants away rather than composting them, then empty, scrub and stack pots and trays and clean, disinfect and oil your tools. Leave a few healthy seedheads and hollow stems standing, because over-tidying removes winter shelter for the insects that eat pests next year.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Stiff scrubbing brush', 'note' => 'For pots, seed trays and the blades of trowels and forks.', 'url' => '' ),
						array( 'name' => 'Garden disinfectant', 'note' => 'For pruning blades and reused pots; follow the label.', 'url' => '' ),
						array( 'name' => 'Nylon scrub pad or steel wool', 'note' => 'Removes dried sap from pruner blades.', 'url' => '' ),
						array( 'name' => 'General-purpose oil', 'note' => 'A drop on the pivot of pruners and a film on bare metal.', 'url' => '' ),
						array( 'name' => 'Old towel', 'note' => 'Dries tools so handles do not swell and metal does not rust.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I put diseased plants in my compost bin?', 'answer' => 'Not if the disease persists. The RHS says a home compost heap does not get hot enough to destroy persistent diseases, so send badly diseased material, such as blighted tomatoes, to a municipal yard-waste collection (council green waste in the UK) instead. Healthy plants can be composted.' ),
						array( 'question' => 'Should I clear away every dead leaf and stem?', 'answer' => 'No. Clear anything diseased, but where there is no sign of disease, the RHS says there is no need to be too thorough: dead stems and leaf litter shelter wildlife, including insects that hibernate in hollow stems.' ),
						array( 'question' => 'How do I sterilize hand pruners?', 'answer' => 'Clean off the dirt and sap first, then apply a garden disinfectant to the blades and leave it for 15–20 minutes, as the RHS advises, before wiping it off. Dry the blades and oil them. Disinfect the cloth or brush you used too.' ),
						array( 'question' => 'What do I do with the old potting mix from my pots?', 'answer' => 'Do not use it again for hungry crops. It can bulk out the base of a large planter or go on a compost heap; our guide to potting mix for containers covers the options.' ),
					),
					'sources'  => array(
						$rhs_prevent,
						$rhs_no_chem,
						array( 'title' => 'RHS — Cleaning hand tools', 'url' => 'https://www.rhs.org.uk/garden-jobs/cleaning-tools' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Encourage wildlife to your garden', 'url' => 'https://www.rhs.org.uk/science/conservation-biodiversity/wildlife/encourage-wildlife-to-your-garden' ),
						array( 'title' => 'RHS — Beneficial insects and bugs', 'url' => 'https://www.rhs.org.uk/wildlife/beneficial-insects-and-bugs' ),
						$book,
					),
				),
				'content'      =>
					$p( 'By mid-fall most summer crops in pots are finished. A couple of hours of clearing now stops pests and diseases carrying over to next year, keeps tools working, and leaves the balcony ready for winter crops or a rest. This guide covers the clear-up itself; protecting the pots that stay planted is in <a href="/plant-care/protect-pots-in-winter/">how to protect pots in winter</a>.' ) .

					$h2( 'Clear out finished crops' ) .
					$p( 'Pull up annual crops that have stopped producing, such as tomatoes, beans and zucchini. Look at each plant as it comes out. The RHS advises clearing up infected leaves and fruit at the end of the season to break the cycle of reinfection, and warns that a home compost heap does not get hot enough to kill persistent diseases. Anything diseased, such as plants with <a href="/problems/tomato-blight/">tomato blight</a>, stays out of your compost: dispose of it as your local waste rules allow (council green waste in the UK); healthy material can be composted.' ) .
					$p( 'Before you empty a pot, tip the root ball out and look for the white, C-shaped grubs of <a href="/problems/black-vine-weevil/">black vine weevil</a>, a common pest in containers. The spent potting mix itself can be reused in a few ways, explained in <a href="/plant-care/potting-mix-for-containers/">potting mix for containers</a>.' ) .

					$h2( 'Leave some shelter for wildlife' ) .
					$p( 'Tidiness has limits. The RHS describes it as a balance: too much tidying discourages wildlife. Where there is no sign of disease, dead leaves and old plant material give shelter, and stems left standing over winter can house hibernating insects in their hollows. Lady beetle (ladybug) adults need sheltered places to spend the winter, and lacewings hibernate in crevices and leaf litter.' ) .
					$p( 'On a balcony, that can be as simple as one pot of seedheads left until spring, or a few hollow stems bundled in a corner. Both predators are on your side next summer: see <a href="/plant-care/natural-pest-control-on-a-balcony/">natural pest control on a balcony</a>.' ) .

					$h2( 'Clean pots and trays' ) .
					$p( 'The RHS lists cleaning pots and seed trays among the jobs that slow the spread of pests and diseases. Empty them, scrub off old potting mix with a stiff brush, and pay attention to anything you will use for seedlings. Clay pots stained green with algae or white with lime can be brushed clean. Let everything dry before stacking it under cover.' ) .
					$p( 'Bring in canes, plant supports and labels too. Brush them off, let them dry and store them somewhere dry so they are ready in spring.' ) .

					$h2( 'Clean, sterilize and oil your tools' ) .
					$list(
						array(
							'Scrub soil off trowels and hand forks with a stiff brush; hose off very muddy tools, then dry them with an old towel.',
							'Rub dried sap off pruner and knife blades with a nylon scrub pad or steel wool.',
							'To kill disease, apply a garden disinfectant to the blades and leave it for 15–20 minutes before wiping it off, as the RHS describes.',
							'Dry everything, then put a drop of oil on the pivot of pruners, opening and closing them to work it in. A thin film of oil also protects bare metal from rust.',
							'Wear gloves when using oil and steel wool.',
						)
					) .
					$p( 'If you have a rain barrel, the RHS also suggests cleaning gutters and disinfecting barrels, and using tap water for cuttings and young plants.' ) .

					$h2( 'Get the pots that stay ready for winter' ) .
					$p( 'Perennial herbs, fruit and winter crops stay put. The RHS advises stopping feeding after late summer until mid-spring for most container plants. Group pots near a wall, lift them onto feet and wrap them before hard frost; <a href="/diy-projects/wrap-pots-for-winter/">wrap pots for winter</a> shows how. Empty pots can be planted with garlic or winter salads: see <a href="/plants/garlic-in-pots/">garlic</a> and <a href="/plants/asian-greens-in-pots/">Asian greens</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Composting blighted or otherwise diseased plants.',
							'Stacking dirty pots and trays, then starting seeds in them next spring.',
							'Putting pruners away wet and sticky with sap.',
							'Clearing every last stem and leaf, which removes shelter for helpful insects.',
							'Forgetting to check root balls for black vine weevil grubs as you empty pots.',
						)
					),
			),

			'seeds-or-young-plants'                   => array(
				'image_prompt' => 'A balcony table in spring with two ways of starting crops side by side: on one side seed packets, a tray of peat-free seed-starting mix and a pot of radish seedlings; on the other side a garden-center tray of sturdy dark green tomato and zucchini young plants in small pots, and a mail-order box of small plug plants just opened, soft morning light.' . $photo_end,
				'pin_prompt'   => 'A hand holding a small, sturdy, dark green tomato plug plant above an open seed packet and a tray of seedlings on a balcony table, photographed vertically.' . $pin_end,
				'title'        => 'Seeds or Young Plants: Which Should You Buy for Your Pots?',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Sow seeds for quick crops that go straight into their final pot, such as radishes, salad greens, carrots and beans: seed is cheaper and offers far more varieties. Buy young plants when you have no warm windowsill or time for crops that need a long, warm start, such as tomatoes, chili peppers and eggplants, and buy fruit as plants.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Seed of quick, direct-sown crops', 'note' => 'Radishes, salad greens and bush beans give fast results from a packet.', 'url' => '' ),
						array( 'name' => 'Peat-free seed-starting mix', 'note' => 'The RHS finds it gives more reliable germination.', 'url' => '' ),
						array( 'name' => '3–3½ in (7–9 cm) pots', 'note' => 'For potting up plug plants as soon as they arrive.', 'url' => '' ),
						array( 'name' => 'Row cover (frost cloth)', 'note' => 'Protects bought young plants on a cold night while they adjust.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Are young plants worth the extra cost?', 'answer' => 'They can be. Plants cost more than seed and come in fewer varieties, but they save weeks of starting seeds and pricking out and need no warm windowsill. For one or two tomato or chili pepper plants on a balcony, that is often a fair trade.' ),
						array( 'question' => 'What is a plug plant?', 'answer' => 'A seedling or young plant grown on its own in a small cell. The RHS notes that smaller plugs need more aftercare: they usually have to be potted up and grown on indoors until big enough to plant out.' ),
						array( 'question' => 'What should I do when plants arrive by mail?', 'answer' => 'Open the box straight away, water the plants, and pot them up or plant them as soon as you can. Then harden them off before they go outside for good.' ),
						array( 'question' => 'Are F1 seeds better?', 'answer' => 'F1 hybrids are bred to be uniform and vigorous, and often more disease resistant, but the seed costs more and plants grown from your own saved seed will not be like the parent. Open-pollinated varieties are more variable but perfectly good for most gardeners.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Sowing vegetable seeds', 'url' => 'https://www.rhs.org.uk/vegetables/seeds-sowing' ),
						array( 'title' => 'RHS — Buying: mail order plants', 'url' => 'https://www.rhs.org.uk/advice/profile?pid=604' ),
						array( 'title' => 'RHS — Buying: garden centre plants', 'url' => 'https://www.rhs.org.uk/garden-design/buying-garden-plants' ),
						array( 'title' => 'RHS — Preserving autumn produce (Caroline Mazzey, RHS Horticultural Advisor)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/preserving-autumn-produce' ),
						array( 'title' => 'RHS — How to grow potatoes', 'url' => 'https://www.rhs.org.uk/vegetables/potatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow onions', 'url' => 'https://www.rhs.org.uk/vegetables/onions/grow-your-own' ),
						$rhs_prevent,
						$book,
					),
				),
				'content'      =>
					$p( 'Every spring the same choice comes up: a rack of inexpensive seed packets, or trays of ready-grown plants for rather more. There is no single right answer. It depends on the crop, on whether you have a warm, bright windowsill, and on how much time you have in late winter and early spring. This guide helps you decide crop by crop.' ) .

					$h2( 'What seed gives you' ) .
					$list(
						array(
							'<strong>Lower cost:</strong> raising plants from seed is by far the cheapest way to fill your pots.',
							'<strong>Choice:</strong> seed catalogues offer far more varieties than garden centers sell as plants, including compact and trailing ones bred for containers.',
							'<strong>Little and often:</strong> one packet can be sown in small batches all season; see <a href="/plant-care/succession-planting-small-spaces/">succession planting</a>.',
						)
					) .
					$p( 'The cost is time and windowsill space for crops that are started indoors. <a href="/plant-care/how-to-start-seeds-indoors/">How to start seeds indoors</a> explains what that involves.' ) .

					$h2( 'What young plants give you' ) .
					$list(
						array(
							'<strong>A head start:</strong> no germination, pricking out or potting on, and a harvest sooner.',
							'<strong>No equipment:</strong> useful if you have no warm, bright windowsill in early spring.',
							'<strong>Fewer losses:</strong> a single tomato or chili pepper plant bought in late spring skips the stages where seedlings often fail.',
						)
					) .
					$p( 'The drawbacks are price and a narrower range of varieties, and you are buying someone else\'s growing, so check the plants carefully.' ) .

					$h2( 'Crop by crop: sow or buy?' ) .
					$list(
						array(
							'<strong>Sow where they will grow:</strong> radishes, salad greens, arugula, carrots, beets, green onions and peas. They are cheap from seed and quick to grow. See <a href="/plants/radishes-in-pots/">radishes</a>, <a href="/plants/salad-greens-in-pots/">salad greens</a> and <a href="/plants/carrots-in-pots/">carrots</a>.',
							'<strong>Sow or buy:</strong> zucchini, green and runner beans and cucumbers grow fast from seeds started indoors in spring, but one or two bought plants are enough for most balconies.',
							'<strong>Often better bought:</strong> tomatoes, chili peppers, bell peppers and eggplants need a long, warm start indoors from late winter. Without a heated windowsill, young plants are the easier route; see <a href="/plants/chili-peppers-in-pots/">chili peppers</a> and <a href="/plants/eggplant-in-pots/">eggplant</a>.',
							'<strong>Grown from tubers, sets or cloves:</strong> the RHS advises certified virus-free seed potatoes, and calls onion sets the easiest and fastest way to grow onions. Garlic is grown from cloves; see <a href="/plants/garlic-in-pots/">garlic in pots</a>.',
							'<strong>Always bought as plants:</strong> fruit bushes and trees, and perennial herbs such as rosemary and bay.',
						)
					) .

					$h2( 'How to pick good young plants' ) .
					$list(
						array(
							'Look for sturdy, dark green plants. The RHS says to steer clear of foliage that is dry, pale, yellowing or wilting, and of cheap, neglected plants on the discount shelf.',
							'Check the roots. Gently slide a plant out of its pot: roots that circle tightly round the outside mean it has waited too long.',
							'Look under the leaves for aphids and whitefly, and tip out a pot or two to check for vine weevil grubs, as the RHS suggests.',
							'In the UK, look for the RHS Award of Garden Merit, which an RHS horticultural advisor recommends checking for when buying vegetable seed or small plants.',
							'Do not buy tomatoes, zucchini and other tender plants too early unless you have somewhere frost-free to keep them.',
						)
					) .

					$h2( 'Plug plants and plants by post' ) .
					$p( 'Plug plants are seedlings or young plants grown in small individual cells. They are cheaper than larger potted plants, but the RHS notes that the smaller ones need more aftercare: most have to be potted up and grown on indoors until they are big enough to go out. Plants that arrive by mail should be unpacked at once, watered and potted up as soon as possible.' ) .
					$p( 'Whether you raised them or bought them, plants grown under cover need a gradual introduction to outdoor life: see <a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>.' ) .

					$h2( 'F1 seed and leftover packets' ) .
					$p( 'Packets marked F1 are hybrids, bred to be uniform, vigorous and often more resistant to disease. They cost more, and seed you save from them will not come true; <a href="/plant-care/how-to-save-seeds-from-your-plants/">how to save seeds</a> explains why. Buy only the seed you need for the season. Kept cool and dry, most leftover seed stays usable for several years, though carrot and parsnip seed loses vigour sooner.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying tomato and zucchini plants weeks before your last frost with nowhere frost-free to keep them.',
							'Choosing the biggest plant in flower over a sturdy, compact one.',
							'Leaving plug plants in their delivery box for days.',
							'Planting bought plants straight outside without hardening them off.',
							'Buying plants of quick crops such as radishes that are cheaper and easier from seed.',
						)
					),
			),

			'how-to-choose-a-fruit-tree-for-a-pot'    => array(
				'image_prompt' => 'A sunny paved patio against a warm brick wall with a row of young fruit trees in large terracotta and plastic pots: a compact apple with small green fruits, a narrow upright pear, a fig with large lobed leaves, and a small lemon tree with glossy leaves and a few yellow fruits, each pot about 18 in (45 cm) wide, late summer light.' . $photo_end,
				'pin_prompt'   => 'A young apple tree in a large pot carrying a few red apples on a small patio, a nursery label tied to its trunk, photographed vertically against a pale wall.' . $pin_end,
				'title'        => 'How to Choose a Fruit Tree for a Pot',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Start with your space: in full sun and with room for only one tree, a self-fertile plum, cherry or dwarf peach crops on its own, while most apples and pears need a partner nearby. Then check the label for a rootstock suited to containers, buy a healthy tree with roots that are not pot-bound, and plant it in a pot 18–20 in (45–50 cm) across.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Container 18–20 in (45–50 cm) across', 'note' => 'The size the RHS suggests for most fruit trees.', 'url' => '' ),
						array( 'name' => 'A soil-based potting mix (in the UK, a peat-free John Innes No. 3)', 'note' => 'Heavy and stable for a long-term pot.', 'url' => '' ),
						array( 'name' => 'Pot trolley or heavy-duty pot feet', 'note' => 'Helps move a tree under cover in winter.', 'url' => '' ),
						array( 'name' => 'Tree stake and tie', 'note' => 'Trees on dwarfing rootstocks need permanent support.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Which fruit tree is easiest to grow in a pot?', 'answer' => 'For a sunny patio with room for one tree, a self-fertile plum such as Victoria or a self-fertile cherry such as Stella is a straightforward choice. A fig is also forgiving, because it fruits better with its roots held in. Lemons and peaches are harder: lemons must come indoors in winter, and peaches need shelter from leaf curl and frost.' ),
						array( 'question' => 'Is a bare-root or a container-grown tree better?', 'answer' => 'Bare-root trees are cheaper but only sold while dormant, from fall to early spring, and must be planted quickly so the roots do not dry out. Container-grown trees cost more and can be planted almost all year, but avoid buying them in summer heat and check that the roots are not circling the pot.' ),
						array( 'question' => 'What is a maiden fruit tree?', 'answer' => 'A one-year-old tree. Maidens cost less than older trees, establish quickly and can be trained into the shape you want, for example a cordon. The RHS suggests buying a maiden if you want to train a cordon from scratch.' ),
						array( 'question' => 'Can I grow a fruit tree in a pot on a shady balcony?', 'answer' => 'Most fruit trees need sun. The one exception among our guides is the acid cherry, such as Morello, which still crops in partial shade. Peaches, figs, lemons and sweet cherries need the warmest, sunniest spot you have.' ),
					),
					'sources'  => array(
						$rhs_fruit_pot,
						array( 'title' => 'RHS — Rootstocks for fruit', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/rootstocks' ),
						array( 'title' => 'RHS — Fruit pollination', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/fruit-basics/fruit-pollination' ),
						array( 'title' => 'RHS — Planning to grow fruit', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/fruit-basics/fruit-pollination/planning-to-grow-fruit' ),
						array( 'title' => 'RHS — Buying: trees and shrubs', 'url' => 'https://www.rhs.org.uk/plants/types/trees/buying-trees-and-shrubs' ),
						array( 'title' => 'RHS — Buying: mail order plants', 'url' => 'https://www.rhs.org.uk/advice/profile?pid=604' ),
						array( 'title' => 'RHS — Apples and pears: starting a new cordon', 'url' => 'https://www.rhs.org.uk/fruit/apples/growing-and-training-as-cordons' ),
						$book,
					),
				),
				'content'      =>
					$p( 'The RHS says apples, cherries, pears and plums can all be grown in containers with the right choice of variety, and a pot keeps a tree smaller than it would grow in the ground. This guide compares the seven fruit trees we cover so you can pick one before you buy. Each tree\'s own guide then explains how to grow it.' ) .

					$h2( 'Four questions to answer first' ) .
					$list(
						array(
							'<strong>How much sun?</strong> Most fruit trees want full sun in a warm, sheltered spot. The RHS warns that some, such as peaches, need a hot, sunny site to do well.',
							'<strong>Room for one tree or two?</strong> Many fruit trees need a pollination partner. If you have space for only one, choose a self-fertile variety or check for a compatible tree in a neighbor\'s yard.',
							'<strong>Can it come under cover in winter?</strong> A lemon must spend the winter indoors, and a peach does far better with shelter from rain in winter and spring.',
							'<strong>Can your balcony take the weight?</strong> A tree in 18–20 in (45–50 cm) of wet potting mix is heavy. See <a href="/plant-care/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a>.',
						)
					) .

					$h2( 'The seven trees compared' ) .
					$p( 'Rootstocks, partners, pot sizes and RHS hardiness ratings below are those given in each plant guide.' ) .
					$list(
						array(
							'<strong><a href="/plants/apple-tree-in-pot/">Apple</a>:</strong> dwarfing M9 or M26 rootstock; most varieties need a partner from the same or a neighboring pollination group; hardy (H6); pot at least 18 in (45 cm). The widest choice of varieties.',
							'<strong><a href="/plants/pear-tree-in-pot/">Pear</a>:</strong> Quince C or Quince Eline rootstock; usually needs a partner, unless you choose a self-fertile variety; hardy (H6); pot 18–20 in (45–50 cm). Blossoms earlier than apple, so late frost is a bigger risk.',
							'<strong><a href="/plants/plum-tree-in-pot/">Plum</a>:</strong> Pixy or VVA-1 rootstock; the dessert plums suggested for pots, Blue Tit, Opal and Victoria, are self-fertile; hardy (H5); pot at least 20 in (50 cm). A good single tree.',
							'<strong><a href="/plants/cherry-tree-in-pot/">Cherry</a>:</strong> Gisela 5 rootstock; self-fertile choices include Stella, Lapins, Sunburst and the acid Morello; hardy (H6); pot 18–20 in (45–50 cm). Acid cherries are less vigorous and cope with partial shade.',
							'<strong><a href="/plants/peach-tree-in-pot/">Peach or nectarine</a>:</strong> naturally dwarf patio varieties; all self-fertile; H4; pot at least 18 in (45 cm). Challenging: very early blossom needs frost protection and hand pollination, and the tree needs shelter against peach leaf curl.',
							'<strong><a href="/plants/fig-tree-in-pot/">Fig</a>:</strong> no rootstock or partner needed; H4; starts in a pot about 1 ft (30 cm) across. Restricted roots mean more fruit, so it suits a container well. Needs your warmest wall.',
							'<strong><a href="/plants/lemon-tree-in-pot/">Lemon</a>:</strong> no partner needed; tender (H2), so it spends winter indoors in a cool, bright place; pot only slightly larger than its roots. Challenging, but the only evergreen choice here.',
						)
					) .

					$h2( 'Read the label: rootstock and pollination' ) .
					$p( 'Apples, pears, plums and cherries are grafted onto a rootstock that sets the size of the tree, and the RHS advises always choosing a dwarfing or semi-dwarfing one where space is short. The rootstock is usually printed next to the variety, for example \'Discovery\' M9. Figs, grapes and lemons are not grafted for size. The <a href="/plants/apple-tree-in-pot/">apple tree guide</a> explains rootstocks and pollination groups in full, with the rules for finding a partner.' ) .

					$h2( 'Bare-root or container-grown?' ) .
					$list(
						array(
							'<strong>Bare-root trees</strong> are lifted from the field while dormant, with no soil on the roots. The RHS says they are cheaper but only available from fall to early spring. Specialist fruit nurseries sell the widest range of varieties and rootstocks this way, often by mail order.',
							'<strong>Container-grown trees</strong> cost more but can be bought and planted almost all year. Trees planted in spring or summer need very regular watering through hot, dry spells.',
						)
					) .
					$p( 'Plant either kind as soon as you can. Keep bare roots from drying out: if planting must wait, the RHS suggests standing them in a bucket of moist potting mix.' ) .

					$h2( 'Check the tree before you pay' ) .
					$list(
						array(
							'Look at the roots. Avoid container trees with roots circling the pot, a sign they have been in it too long, and bare-root trees with torn, split or bare main roots.',
							'Walk away from any tree with pests, disease, damaged bark, or dead or distorted leaves.',
							'Avoid weak, flimsy stems that rely on a long cane to stand up.',
							'Pass over bulging, weedy pots and badly shaped trees, even at a discount.',
						)
					) .
					$p( 'A one-year-old tree, called a maiden, costs less than an older one and establishes quickly.' ) .

					$h2( 'Trained trees for a wall' ) .
					$p( 'Where floor space is tight, a cordon (a tree restricted to one or a few stems) fits against a wall or railing. The RHS describes double-U cordons as particularly suitable for containers. For apples and pears, choose a spur-bearing variety, which fruits on short side shoots: tip-bearing varieties are not suitable for cordon training. The same idea works for red currants; see <a href="/diy-projects/train-a-cordon-redcurrant/">train a cordon redcurrant</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a tree without checking its rootstock.',
							'Buying a single apple or pear that needs a partner when no compatible tree grows nearby.',
							'Choosing a peach or lemon for a cold, exposed balcony with no shelter in winter.',
							'Buying a pot-bound tree because it is already large or on offer.',
							'Picking a tip-bearing apple to train as a cordon.',
						)
					),
			),

			'natural-pest-control-on-a-balcony'       => array(
				'image_prompt' => 'A sunny balcony in early summer with vegetables and flowers mixed in pots: a bush bean in a large pot, a trough of lettuce, and pots of yellow calendula and white-flowered yarrow between them, a hover fly visiting a flower and a lady beetle on a bean leaf, a small dish of water with pebbles on the floor.' . $photo_end,
				'pin_prompt'   => 'Close view of a lady beetle larva hunting among a few aphids on a fava bean shoot growing in a pot on a balcony, an open daisy-like flower in soft focus behind, photographed vertically.' . $pin_end,
				'title'        => 'Natural Pest Control on a Balcony: A Pesticide-Free Plan',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Keep pests in check without sprays by growing healthy plants, checking them every few days, and squashing or picking off pests early. Bring in lady beetles, hover flies and lacewings with open flowers, water and winter shelter, cover vulnerable crops with mesh, and use nematodes only for slugs and vine weevil where needed.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Insect-proof mesh', 'note' => 'Keeps carrot rust fly, cabbage white butterflies and flea beetles off crops.', 'url' => '' ),
						array( 'name' => 'Sticky or pheromone traps', 'note' => 'Show when whitefly or codling moth numbers start rising.', 'url' => '' ),
						array( 'name' => 'Seed of open, daisy-type flowers', 'note' => 'Calendula and similar flowers feed adult hover flies.', 'url' => '' ),
						array( 'name' => 'Nematode biological control', 'note' => 'Targeted products for slugs or vine weevil grubs; use fresh.', 'url' => '' ),
						array( 'name' => 'A shallow container of water', 'note' => 'A tiny pond for wildlife, with a way out for small creatures.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Does the RHS recommend organic pesticides?', 'answer' => 'No. The RHS does not support the use of pesticides and recommends non-chemical options whenever they are needed. It points out that even naturally derived products such as pyrethrins are poisons, and that soap and oil sprays can kill beneficial insects too.' ),
						array( 'question' => 'Do homemade sprays with dish soap work?', 'answer' => 'The RHS advises avoiding them. Homemade brews of dish soap, essential oils and similar are not properly tested, can scorch plants and may harm a range of other creatures and the wider environment.' ),
						array( 'question' => 'Which flowers bring hover flies to a balcony?', 'answer' => 'Hover flies have short tongues, so they need open flowers with easy-to-reach pollen and nectar, such as those in the daisy and carrot families. The RHS also suggests heather, which can grow in pots and window boxes, for late summer and fall.' ),
						array( 'question' => 'Do biological controls work on a balcony?', 'answer' => 'Nematodes watered into moist potting mix can work outdoors against slugs and black vine weevil grubs. Most insect predators sold as biological controls are meant for greenhouses and conservatories: the RHS says they need daytime temperatures of at least 70 °F (21 °C) and bright light to breed.' ),
					),
					'sources'  => array(
						$rhs_no_chem,
						$rhs_prevent,
						array( 'title' => 'RHS — Biological control in the home garden', 'url' => 'https://www.rhs.org.uk/prevention-protection/biological-control-garden' ),
						array( 'title' => 'RHS — Aphid predators', 'url' => 'https://www.rhs.org.uk/biodiversity/aphid-predators' ),
						array( 'title' => 'RHS — Beneficial insects and bugs', 'url' => 'https://www.rhs.org.uk/wildlife/beneficial-insects-and-bugs' ),
						array( 'title' => 'RHS — Plants for hoverflies', 'url' => 'https://www.rhs.org.uk/wildlife/plants-for-hoverflies' ),
						array( 'title' => 'RHS — Encourage wildlife to your garden', 'url' => 'https://www.rhs.org.uk/science/conservation-biodiversity/wildlife/encourage-wildlife-to-your-garden' ),
						$book,
					),
				),
				'content'      =>
					$p( 'A balcony is a small, separate world: pests arrive on the wind or on new plants, and their predators have to find you too. The RHS does not support the use of pesticides and recommends non-chemical methods whenever control is needed. This guide is the overall plan; each pest has its own problem guide, linked below, with the diagnosis and the fix.' ) .

					$h2( 'Start with healthy plants' ) .
					$p( 'Plants grown in the right place, with the right care, resist pests and diseases better. Put sun-lovers in sun and shade-tolerant crops in shade, water steadily (see <a href="/plant-care/how-often-to-water-container-plants/">how often to water</a>), and give plants room so air moves around them. Where a resistant variety exists, such as lettuces bred to resist <a href="/problems/root-aphids/">root aphids</a>, choose it.' ) .
					$p( 'Check new plants before they join the others. The RHS suggests tipping out pots to look for black vine weevil grubs and keeping new arrivals apart for a while to watch their health.' ) .

					$h2( 'Look often, act early' ) .
					$list(
						array(
							'Check shoot tips and the undersides of leaves every few days in spring and summer, and more often on young plants.',
							'Squash small aphid colonies and pick off caterpillars and their eggs by hand.',
							'Go out on damp evenings with a flashlight to collect slugs and snails.',
							'Use sticky or pheromone traps to spot rising numbers of whitefly or codling moth, so you can act in time.',
							'Accept a little damage: insect numbers rise and fall, and harm that is only cosmetic can be tolerated.',
						)
					) .

					$h2( 'Bring in the predators' ) .
					$p( 'The RHS notes that aphids often build up early in the season, but by early to mid summer their predators frequently wipe out the colonies. Tolerating a few aphids and avoiding sprays is what keeps those predators coming.' ) .
					$list(
						array(
							'<strong>Lady beetles (ladybugs):</strong> adults and larvae eat aphids and some other insects.',
							'<strong>Hover flies:</strong> in Britain, just under half of hover fly species have aphid-eating larvae, and the adults pollinate your crops.',
							'<strong>Lacewings:</strong> the larvae feed on aphids and other small insects.',
							'<strong>Parasitoid wasps:</strong> tiny wasps that lay eggs inside aphids, leaving papery, swollen husks.',
							'<strong>Earwigs and birds:</strong> earwigs control aphids on fruit trees, and small birds such as blue tits (in the UK) feed on aphids too.',
						)
					) .

					$h2( 'Food, water and shelter on a balcony' ) .
					$list(
						array(
							'<strong>Flowers:</strong> adult hover flies have short tongues and need open flowers, such as those of the daisy and carrot families. Mix a few pots of <a href="/plants/calendula-in-pots/">calendula</a> or other open blooms among your crops, and aim for flowers from spring to fall.',
							'<strong>Water:</strong> the RHS says even a large pot of water can act as a small pond. Give it one sloping side or a few stones so small creatures can climb out.',
							'<strong>Winter shelter:</strong> lacewings hibernate in crevices and leaf litter, and lady beetle adults need sheltered spots. Leave a few hollow stems or a pot of seedheads over winter; see <a href="/plant-care/end-of-season-balcony-cleanup/">the end-of-season cleanup</a>.',
							'<strong>Earwig shelter:</strong> on a fruit tree, a flower pot loosely stuffed with hay and hung in the branches gives earwigs somewhere to hide by day.',
						)
					) .
					$p( 'Growing <a href="/plants/nasturtiums-in-pots/">nasturtiums</a> as a decoy to draw aphids and caterpillars away from crops is popular, but the RHS says the evidence for it is limited.' ) .

					$h2( 'Physical barriers' ) .
					$p( 'Covering a crop before the pest arrives is often the simplest fix. Insect-proof mesh keeps out carrot rust fly and cabbage white butterflies; netting keeps birds off fruit. See <a href="/gear/best-crop-covers/">crop covers compared</a>, <a href="/diy-projects/make-a-hoop-tunnel-for-a-trough/">make a hoop tunnel for a trough</a> and <a href="/diy-projects/net-a-fruit-bush/">net a fruit bush</a>.' ) .

					$h2( 'Biological controls, used with care' ) .
					$p( 'Nematodes, microscopic worms watered into moist potting mix, are available for slugs and for black vine weevil grubs, and work outdoors when timed to the pest\'s vulnerable stage. Because they can also infect harmless creatures, the RHS advises using them in a targeted way. Most insect predators sold by mail order, such as predatory midges and parasitoid wasps, are designed for greenhouses and conservatories, where they need warmth and bright light to breed. Introduce them before the pest builds up, but not before it is present.' ) .

					$h2( 'Keep it clean' ) .
					$p( 'Remove diseased leaves and fruit promptly, clean pots, trays and tools between uses, and pull weeds that shelter slugs or host pests. Too much tidying, though, removes shelter for helpful wildlife, so the RHS describes it as a balance.' ) .

					$h2( 'Find your pest' ) .
					$list(
						array(
							'Sap-suckers: <a href="/problems/aphids-container-plants/">aphids</a>, <a href="/problems/whiteflies/">whitefly</a>, <a href="/problems/spider-mites/">spider mites</a>, <a href="/problems/mealybugs/">mealybugs</a> and <a href="/problems/scale-insects/">scale insects</a>.',
							'Leaf eaters: <a href="/problems/slugs-and-snails/">slugs and snails</a>, <a href="/problems/caterpillars-on-brassicas/">cabbage caterpillars</a> and <a href="/problems/flea-beetle-holes-in-leaves/">flea beetles</a>.',
							'Below the surface: <a href="/problems/black-vine-weevil/">black vine weevil</a> and <a href="/problems/root-aphids/">root aphids</a>.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Spraying at the first aphid and killing the predators that would have dealt with it.',
							'Using homemade dish soap or oil sprays.',
							'Clearing every flower and dead stem, leaving predators nothing to eat or hide in.',
							'Buying biological controls for the greenhouse and releasing them on a cool balcony.',
							'Putting mesh on after the pest has already laid its eggs.',
						)
					),
			),
		),
	),
);
