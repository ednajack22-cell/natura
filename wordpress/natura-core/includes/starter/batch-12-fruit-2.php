<?php
/**
 * Starter guides, batch 12 (more fruit): currants, gooseberries and a dwarf
 * apple tree in large pots.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), only where
 * the RHS confirms the book; see design/sources/BACKYARD-HARVEST.md. Months
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
	'name'   => __( 'More fruit', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'currants-in-pots'     => array(
				'title'   => 'How to Grow Currants in Pots',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'balcony', 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 7, 8 ),
				),
				'excerpt' => 'Redcurrants and whitecurrants grow well in a pot at least 45 cm (18 in) wide, in sun or light shade, and crop in July and August. Blackcurrants are more vigorous: choose a compact variety and expect a few good years in a pot before it needs to go in the ground.',
				'facts'   => array(
					'short_name'     => 'Currants',
					'botanical_name' => 'Ribes rubrum (red and white); Ribes nigrum (black)',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun; copes with light shade',
					'pot_size'       => 'At least 45 cm (18 in) wide; 45 cm deep for blackcurrants',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the compost evenly moist from spring to autumn',
					'harvest'        => 'July and August, depending on the variety',
					'season'         => 'Plant November to March',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Use a pot at least 45 cm (18 in) wide, filled with a soil-based compost such as peat-free John Innes No 3.' ),
						array( 'point' => 'Red and white currants are happy in a pot for years; blackcurrants only manage a few years, so pick a compact variety.' ),
						array( 'point' => 'Feed every two weeks in the growing season with a high-potassium liquid feed.' ),
						array( 'point' => 'Net the bush as soon as the berries start to colour, or birds will take them.' ),
						array( 'point' => 'Prune every winter: blackcurrants for young stems, red and white currants for an open framework.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Blackcurrant \'Ben Sarek\'', 'note' => 'The RHS lists it as a compact variety, with heavy crops of large berries on short bunches, and names it as one that copes with a pot for a few years.' ),
						array( 'name' => 'Blackcurrant \'Ben Connan\'', 'note' => 'RHS Award of Garden Merit. Compact plants and large, tasty berries that all ripen at once, so you can cut whole bunches.' ),
						array( 'name' => 'Redcurrant \'Jonkheer van Tets\'', 'note' => 'RHS Award of Garden Merit. Heavy crops of sweet currants on long bunches, among the earliest to ripen.' ),
						array( 'name' => 'Redcurrant \'Red Lake\'', 'note' => 'RHS Award of Garden Merit. Large, sweet, dark red currants from late July.' ),
						array( 'name' => 'Whitecurrant \'Blanka\'', 'note' => 'RHS Award of Garden Merit. Very large crops of sweet, almost see-through berries.' ),
						array( 'name' => 'Whitecurrant \'White Grape\'', 'note' => 'RHS Award of Garden Merit. Large, sweet berries in midsummer.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 45 cm (18 in) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Room for a bush to settle in for several years.', 'url' => '' ),
						array( 'name' => 'Peat-free John Innes No 3 compost', 'badge' => '', 'note' => 'A soil-based mix that lasts longer in a pot than multi-purpose compost.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid feed', 'badge' => '', 'note' => 'Every two weeks from spring to late summer.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused fruit netting', 'badge' => '', 'note' => 'Keeps birds off the ripening berries. Pull it taut.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece', 'badge' => '', 'note' => 'For frosty nights while the bush is in flower.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which currant is best for a pot?', 'answer' => 'Redcurrants and whitecurrants are the easiest: they grow well in containers for many years. Blackcurrants are larger and more vigorous, so they only do well in a pot for a few years. If you want blackcurrants, choose a compact variety such as \'Ben Sarek\'.' ),
						array( 'question' => 'Can I grow currants in a shady spot?', 'answer' => 'Red and white currants crop best in full sun but still do well in light shade, even against a north-facing wall. The berries ripen later and taste less sweet. Blackcurrants also prefer sun but cope with a little shade.' ),
						array( 'question' => 'Do I need two currant bushes for fruit?', 'answer' => 'No. Black, red and white currants have self-fertile flowers, so a single bush can crop on its own.' ),
						array( 'question' => 'Why did my currants flower but give hardly any fruit?', 'answer' => 'A late frost may have damaged the flowers. If frost is forecast while the bush is in flower, cover it overnight with fleece held up on canes, and take the cover off in the morning so insects can reach the flowers.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow blackcurrants', 'url' => 'https://www.rhs.org.uk/fruit/blackcurrants/grow-your-own' ),
						array( 'title' => 'RHS — How to grow redcurrants', 'url' => 'https://www.rhs.org.uk/fruit/redcurrants/grow-your-own' ),
						array( 'title' => 'RHS — How to grow whitecurrants', 'url' => 'https://www.rhs.org.uk/fruit/whitecurrants/grow-your-own' ),
						array( 'title' => 'RHS — Redcurrant and whitecurrant pruning and training', 'url' => 'https://www.rhs.org.uk/fruit/redcurrants/redcurrant-pruning-and-training' ),
						array( 'title' => 'RHS — Ribes nigrum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/106234/ribes-nigrum-b/details' ),
						array( 'title' => 'RHS — Ribes rubrum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/15884/ribes-rubrum/details' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Which currants suit a pot' ) .
					$p( 'Redcurrants and whitecurrants are the best currants for containers. Whitecurrants are simply a pale form of redcurrant, with the same habit and a similar tart taste, and both grow happily in a large pot for years. They can also be bought as standards, with a bushy head on a single tall stem, which take up little floor space.' ) .
					$p( 'Blackcurrants are bigger and more vigorous. In a pot they do well for a few years, especially compact varieties such as \'Ben Sarek\' and \'Ben Gairn\', but once they start to fruit poorly they are better planted in the ground.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot at least 45 cm (18 in) wide; for blackcurrants, make it 45 cm (18 in) deep as well. Fill it with a soil-based compost such as peat-free John Innes No 3, which holds its structure in a pot for longer than multi-purpose compost.' ) .
					$p( 'Currants fruit best in full sun, but red and white currants also crop in light shade, such as against a north-facing wall, where the berries ripen later and are less sweet. Choose a sheltered corner, out of strong wind and away from frost pockets: a late frost can damage the flowers and cut the crop.' ) .

					$h2( 'Plant' ) .
					$p( 'The best time to plant is while the bush is dormant, from November to March. Potted plants can go in at other times of year, but they settle in best in the dormant season. Water the plant well in its old pot before you start.' ) .
					$list(
						array(
							'Half-fill the new pot with compost.',
							'Set red and white currants at the same depth as they were growing before.',
							'Plant blackcurrants about 5 cm (2 in) deeper than before: this encourages strong new shoots from the base.',
							'Fill around the roots, firm gently to remove air pockets, and water thoroughly.',
						)
					) .
					$p( 'Prune a new blackcurrant straight after planting in the dormant season, cutting all the stems down to one or two buds above the compost. You lose the first year\'s crop, but the bush grows plenty of new stems from below.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Currants in pots need a steady supply of water from spring to autumn. Check the compost often in dry spells and keep it evenly moist. Water in the early morning or the evening, ideally with stored rainwater. With blackcurrants, avoid a sudden heavy soaking while the fruit ripens, as it can split the skins.' ) .
					$p( 'Feed every two weeks through the growing season with a high-potassium liquid feed, or scatter a handful of general-purpose granular fertiliser on the compost each spring.' ) .

					$h2( 'Repot every few years' ) .
					$p( 'Every few years, in spring, move the bush into a larger pot of fresh peat-free compost. When it is in the largest pot you can manage, tip it out, tease away the loose compost, trim the roots lightly and replant it in the same pot with fresh compost. In the years between, scrape off the top layer of compost and replace it with fresh.' ) .

					$h2( 'Prune in winter' ) .
					$p( 'Blackcurrants and red currants fruit in different ways, so they are pruned differently.' ) .
					$list(
						array(
							'<strong>Blackcurrants</strong> fruit best on young stems. On a bush four years old or more, cut up to a third of the oldest, darkest stems down to the base each winter. In the first three years, just remove weak or low shoots.',
							'<strong>Red and white currants</strong> fruit at the base of last year\'s shoots and on short spurs on older wood, so keep a permanent framework of branches. In late winter, shorten last season\'s growth on the main branches by a quarter to a half, cut side-shoots back to one or two buds, and keep the centre open.',
						)
					) .
					$p( 'Winter prunings make new plants: hardwood cuttings about 20 cm (8 in) long, taken from young, healthy wood between mid-autumn and late winter, root well pushed into a pot of compost.' ) .

					$h2( 'Harvest and protect the crop' ) .
					$p( 'Currants ripen from early July to late August, depending on the variety. With most red and white currants and modern blackcurrants, the whole bunch, called a strig, ripens at once: cut it off and strip the berries in the kitchen. Older blackcurrant varieties ripen from the top of the bunch down, so pick those berries one by one.' ) .
					$p( 'Birds love currants. Cover the bush with taut, plastic-free or reused netting as soon as the berries start to colour. If frost threatens while the bush is in flower, cover it overnight with fleece on canes and remove it in the morning so pollinating insects can reach the flowers.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Keeping a blackcurrant in a pot for too long: once it fruits poorly, plant it in the ground.',
							'Letting the compost dry out in summer: pot-grown currants need regular water.',
							'Pruning blackcurrants like redcurrants: blackcurrants need old stems removed, redcurrants a permanent framework.',
							'Netting too late: cover the bush when the berries first change colour.',
							'Using loose netting: birds get tangled in it. Keep it taut.',
						)
					),
				'image_prompt' => 'A redcurrant bush about 1 m tall growing in a large round terracotta pot, about 45 cm wide, on a sunny paved patio beside a brick wall in July. Long hanging bunches of glossy, translucent red berries droop from the woody branches among bright green, three- to five-lobed leaves with toothed edges. A few bunches of pearly white currants are visible on a second bush in the background. Soft late-morning sunlight, a few berries in sharp focus. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close view of a redcurrant bush in a large terracotta pot on a sunny patio in July, with long hanging bunches of glossy red berries and bright green three- to five-lobed leaves filling the lower two thirds of the frame. The top third is a calm, softly blurred brick wall in warm daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'gooseberries-in-pots' => array(
				'title'   => 'How to Grow Gooseberries in Pots',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'balcony', 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 6, 7, 8 ),
				),
				'excerpt' => 'Gooseberries are hardy, self-fertile bushes that grow well in a pot at least 40 cm (16 in) wide and deep, in sun or light shade. Keep the compost moist, feed with a high-potassium feed, keep the bush open by pruning, and pick from June to August.',
				'facts'   => array(
					'short_name'     => 'Gooseberry',
					'botanical_name' => 'Ribes uva-crispa',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun for the sweetest fruit; tolerates some shade',
					'pot_size'       => 'At least 40 cm (16 in) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the compost evenly moist, especially while the fruit swells',
					'harvest'        => 'June (under-ripe) to August (ripe)',
					'season'         => 'Plant November to March',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Use a pot at least 40 cm (16 in) wide and deep with plenty of drainage holes, filled with peat-free John Innes No 3.' ),
						array( 'point' => 'Give it a sheltered spot: the stems are brittle and can snap in wind when laden with fruit.' ),
						array( 'point' => 'Feed with a high-potassium feed, not a nitrogen-rich one, which encourages mildew.' ),
						array( 'point' => 'Prune to keep the centre open, which helps against mildew and makes picking easier.' ),
						array( 'point' => 'Check the bush for sawfly larvae from April, low down in the centre.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Greenfinch', 'note' => 'RHS Award of Garden Merit. A cooking gooseberry that resists mildew, stays fairly compact and is not too spiny.' ),
						array( 'name' => 'Invicta', 'note' => 'RHS Award of Garden Merit. A cooking gooseberry with heavy crops and good flavour. Mature plants resist mildew well, though young plants can still be affected.' ),
						array( 'name' => 'Leveller', 'note' => 'RHS Award of Garden Merit. A dessert gooseberry with large yellow berries and an exceptional flavour.' ),
						array( 'name' => 'Whinham\'s Industry', 'note' => 'RHS Award of Garden Merit. Red berries, good fresh or cooked.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 40 cm (16 in) wide and deep, with plenty of drainage holes', 'badge' => '', 'note' => 'Excess water must drain freely, or the roots can rot.', 'url' => '' ),
						array( 'name' => 'Peat-free John Innes No 3 compost', 'badge' => '', 'note' => 'A soil-based mix that suits a long-lived bush.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid feed', 'badge' => '', 'note' => 'Every two weeks in the growing season.', 'url' => '' ),
						array( 'name' => 'Thorn-proof gloves', 'badge' => '', 'note' => 'Gooseberry stems are prickly.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused fruit netting', 'badge' => '', 'note' => 'Against bullfinches in winter and birds in summer.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I grow a gooseberry on a shady balcony?', 'answer' => 'Yes, if it gets some sun. Gooseberries crop best and give the sweetest fruit in sun, but they tolerate light shade and can even be grown against a north-facing wall. Pick a sheltered spot, as the stems snap easily in wind.' ),
						array( 'question' => 'What is the white powder on my gooseberries?', 'answer' => 'Most likely American gooseberry mildew. It starts as grey-white patches on young shoots, leaves and berries and turns brown. The berries are still edible once you rub it off. Cut off and dispose of affected shoot tips, keep the bush open, avoid nitrogen-rich feeds and clear fallen leaves in autumn.' ),
						array( 'question' => 'Something has stripped the leaves off my gooseberry. What is it?', 'answer' => 'Probably gooseberry sawfly. Its green, black-spotted larvae start low in the centre of the bush and eat their way outwards. Check from April, and pick the larvae off by hand where you can. The bush usually survives, but next year\'s crop may be smaller.' ),
						array( 'question' => 'Should I pick gooseberries green or ripe?', 'answer' => 'Both. In June, pick every other berry while still green for cooking; the ones left grow larger. In July and August, pick the rest when ripe and sweet, gently, as they burst easily.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow gooseberries', 'url' => 'https://www.rhs.org.uk/fruit/gooseberries/grow-your-own' ),
						array( 'title' => 'RHS — Gooseberry pruning and training', 'url' => 'https://www.rhs.org.uk/fruit/gooseberries/gooseberry-pruning-and-training' ),
						array( 'title' => 'RHS — Ribes uva-crispa (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/15898/ribes-uva-crispa/details' ),
						array( 'title' => 'RHS — Gooseberry mildew', 'url' => 'https://www.rhs.org.uk/disease/gooseberry-mildew' ),
						array( 'title' => 'RHS — Gooseberry sawfly', 'url' => 'https://www.rhs.org.uk/biodiversity/gooseberry-sawfly' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Why grow a gooseberry in a pot' ) .
					$p( 'Gooseberries are hardy, robust bushes that rarely turn up in shops, so they are well worth growing yourself. Their flowers are self-fertile, so one bush is enough. In the ground a bush reaches about 1–1.5 m (3½–5 ft) tall and wide; in a pot it stays manageable with pruning. You can also buy a standard, a bushy head on a stem about 1 m (3¼ ft) tall, which leaves room for smaller pots underneath.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a pot at least 40 cm (16 in) wide and deep, with plenty of drainage holes, and fill it with a soil-based compost such as peat-free John Innes No 3.' ) .
					$p( 'Gooseberries crop best and taste sweetest in sun, but tolerate some shade. Shelter matters more: the stems are brittle and can snap in wind, especially when heavy with fruit. Avoid frost pockets, as late frost damages the flowers, and avoid enclosed corners with still air, where mildew thrives.' ) .

					$h2( 'Plant' ) .
					$p( 'Late autumn is the ideal time, as the bush has time to settle before spring, but you can plant a potted gooseberry at any time from November to March. Set it at the same depth it was growing before, with the top of the old compost level with the new. Firm it in and water well. A standard needs a sturdy cane or stake to hold the stem.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Gooseberries in pots need a steady supply of water through the growing season. Check the compost regularly and keep it evenly moist, especially while the bush is flowering and the berries are swelling. Water in the morning or evening, ideally with rainwater. As the roots fill the pot, check that water still drains freely: waterlogged compost can rot the roots.' ) .
					$p( 'Feed every two weeks in the growing season with a high-potassium liquid feed, or mix a handful of high-potassium granular fertiliser into the fresh compost when you top-dress in spring. Avoid nitrogen-rich feeds: they cause soft, sappy growth that mildew attacks.' ) .

					$h2( 'Prune for an open bush' ) .
					$p( 'Gooseberry branches are flexible and droop under the weight of the fruit, and an unpruned bush soon becomes a tangle. Wear thorn-proof gloves, start by removing dead or damaged shoots, then in winter:' ) .
					$list(
						array(
							'Every year or two, remove one to three older, less fruitful branches so new ones replace them.',
							'Cut out low branches that will touch the compost or the floor once laden, or prune them to an upward-facing bud.',
							'Keep the centre open: good airflow reduces mildew and makes picking easier.',
						)
					) .
					$p( 'Every few years, in spring, repot into a larger pot of fresh peat-free compost. Once the pot is as big as you can manage, refresh the compost and lightly trim the roots instead. In other years, replace the top layer of compost with fresh. Prunings 30 cm (1 ft) long from young, healthy bushes can be rooted as hardwood cuttings.' ) .

					$h2( 'Harvest in two pickings' ) .
					$p( 'Gooseberries ripen from late June to early August, depending on the variety. Pick in two rounds: in June, take every other berry while still green and firm, for jam, pies and sauces. The berries left on the bush grow larger. In July and August, pick the rest once ripe for the best flavour. Pick with the stalk attached, and handle ripe berries gently as they burst easily.' ) .

					$h2( 'Mildew, sawfly and birds' ) .
					$list(
						array(
							'<strong>American gooseberry mildew</strong> shows from early summer as grey-white patches on leaves, shoot tips and berries, later turning brown. Cut off and dispose of affected shoot tips as soon as you see them, clear fallen leaves in autumn, and choose a resistant variety such as \'Greenfinch\' or \'Invicta\'. The RHS advises against fungicides.',
							'<strong>Gooseberry sawfly</strong> larvae are green with black dots. They hatch low in the centre of the bush and strip the leaves as they move outwards. Check from April and remove them by hand where practical.',
							'<strong>Birds</strong> peck the buds in winter (bullfinches) and eat the ripening berries in summer. Cover the bush with taut, plastic-free or reused netting at those times.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'A windy spot: the brittle stems snap when laden with fruit.',
							'Nitrogen-rich feeds or manure: soft growth invites mildew.',
							'Letting the pot dry out while the berries swell.',
							'Leaving the centre crowded: still air encourages mildew and makes picking painful.',
							'Spotting sawfly too late: check low in the bush from April.',
						)
					),
				'image_prompt' => 'A gooseberry bush about 80 cm tall in a large glazed blue ceramic pot, about 40 cm wide, on a sheltered balcony in early July, in soft morning sun. Arching, thorny woody stems carry small, deeply lobed green leaves, and translucent oval green berries with faint pale veins hang singly beneath the branches. A few berries in sharp focus in the foreground; railings and a wooden floor softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a gooseberry bush in a large glazed blue pot on a sheltered balcony in July, with arching thorny stems, small deeply lobed green leaves and translucent oval green berries hanging beneath the branches in the lower two thirds. The top third is calm, softly blurred pale wall and sky. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'apple-tree-in-pot'    => array(
				'title'   => 'How to Grow an Apple Tree in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun' ),
				'space'   => array( 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 8, 9, 10, 11 ),
				),
				'excerpt' => 'Yes, you can grow an apple tree in a pot: choose one grafted on a dwarfing rootstock such as M9 or M26, in a container at least 45 cm (18 in) across, on a warm, sunny, sheltered patio. Most apples need a pollination partner of another variety flowering nearby, so check the pollination group before you buy.',
				'facts'   => array(
					'short_name'     => 'Apple',
					'botanical_name' => 'Malus domestica',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, in a warm, sheltered spot',
					'pot_size'       => 'At least 45 cm (18 in) across; 45–50 cm (18–20 in) is typical',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the compost evenly moist from spring to autumn',
					'harvest'        => 'August to November, depending on the variety',
					'season'         => 'Plant November to March',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Buy a tree on a dwarfing rootstock such as M9 or M26: the rootstock decides how big the tree grows.' ),
						array( 'point' => 'Use a pot at least 45 cm (18 in) across, filled with peat-free John Innes No 3, on a south- or west-facing patio.' ),
						array( 'point' => 'Most apples need another variety from the same or a neighbouring pollination group nearby.' ),
						array( 'point' => 'Water steadily all summer: a dry pot makes the fruit drop early and the leaf edges brown.' ),
						array( 'point' => 'Repot every year or two while young, then top-dress and refresh the compost in the same pot.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Discovery (pollination group 3)', 'note' => 'Listed by the RHS as suited to pots. RHS Award of Garden Merit; an early dessert apple with red skin and a superb flavour.' ),
						array( 'name' => 'Greensleeves (group 3)', 'note' => 'Listed by the RHS as suited to pots. RHS Award of Garden Merit; a mid-season dessert apple with reliable crops of crisp, juicy fruit.' ),
						array( 'name' => 'Sunset (group 3)', 'note' => 'Listed by the RHS as suited to pots. RHS Award of Garden Merit; a mid-season dessert apple with reliable, heavy crops.' ),
						array( 'name' => 'Fiesta (group 3)', 'note' => 'Listed by the RHS as suited to pots. RHS Award of Garden Merit; a late dessert apple that is reliable and stores well.' ),
						array( 'name' => 'Howgate Wonder (group 4)', 'note' => 'A cooking apple listed by the RHS as suited to pots. RHS Award of Garden Merit; late season, with huge fruit for baking.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 45–50 cm (18–20 in) across, with drainage holes', 'badge' => '', 'note' => 'Clay is heavy and stable; plastic is lighter and easier to move.', 'url' => '' ),
						array( 'name' => 'Peat-free John Innes No 3 compost', 'badge' => '', 'note' => 'The RHS calls it ideal for fruit in containers.', 'url' => '' ),
						array( 'name' => 'Tree stake and tree tie', 'badge' => '', 'note' => 'Dwarfing rootstocks need permanent support.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid feed', 'badge' => '', 'note' => 'Every two weeks in the growing season.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which rootstock is best for an apple tree in a pot?', 'answer' => 'The RHS recommends a dwarfing rootstock, M9 or M26, for container growing, and describes M26 as ideal for containers. Semi-dwarfing MM106 makes a much larger tree, up to about 4 m (13 ft) in the ground. The rootstock is usually printed on the label next to the variety, for example \'Discovery\' M9.' ),
						array( 'question' => 'Do I need two apple trees to get fruit?', 'answer' => 'Usually you need a second variety that flowers at the same time, from the same or a neighbouring pollination group. In a built-up area a neighbour\'s apple or crab apple tree within about 18 m (55 ft) may do the job. A few varieties are self-fertile and set fruit on their own.' ),
						array( 'question' => 'How often should I water an apple tree in a pot?', 'answer' => 'Regularly through spring and summer, aiming to keep the compost evenly moist: let the surface dry a little between waterings, but never let it become bone dry. Short of water, the tree drops its fruit before it ripens and the leaf edges turn brown.' ),
						array( 'question' => 'Can a potted apple tree stay outside in winter?', 'answer' => 'Yes. Apples are rated H6 by the RHS, hardy throughout the UK and northern Europe, and hardy fruit in pots can stay outdoors over winter.' ),
						array( 'question' => 'Why is my young tree not allowed to fruit?', 'answer' => 'The RHS advises removing the fruitlets in the year after planting, and leaving only a couple in the second year, so the young tree puts its energy into roots and branches first.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow apples', 'url' => 'https://www.rhs.org.uk/fruit/apples/grow-your-own' ),
						array( 'title' => 'RHS — Fruit in containers', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/containers' ),
						array( 'title' => 'RHS — Rootstocks for fruit', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/rootstocks' ),
						array( 'title' => 'RHS — Fruit pollination', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/fruit-basics/fruit-pollination' ),
						array( 'title' => 'RHS — Apples: choosing cultivars', 'url' => 'https://www.rhs.org.uk/fruit/apples/choosing-cultivars' ),
						array( 'title' => 'RHS — Malus domestica (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/60558/malus-domestica-f/details' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Start with the right rootstock' ) .
					$p( 'Apple trees are grafted onto a rootstock, which controls how vigorous the tree is and how big it grows. For a pot, the RHS recommends a dwarfing rootstock: M9 or M26. M26 is described as ideal for containers. M27 is even more dwarfing but needs fertile conditions and does not suit weak varieties, while MM106 is semi-dwarfing and makes a much larger tree, up to about 4 m (13 ft) in the ground.' ) .
					$p( 'The rootstock is usually printed on the label or in the catalogue next to the variety name, for example \'Discovery\' M9. Check it before you buy. Growing in a pot also restricts the roots, which keeps the tree smaller than it would be in the ground.' ) .

					$h2( 'Choose a pollination partner' ) .
					$p( 'Most apples cannot pollinate their own flowers. They need another variety nearby that flowers at the same time. To make this easy, apples are sorted into numbered pollination groups by flowering time: choose two trees from the same group or from neighbouring groups, for example two from group 3, or one from group 3 and one from group 4.' ) .
					$list(
						array(
							'<strong>Short of space?</strong> In a town there may already be apple trees nearby. The RHS rule of thumb is that partners should be within about 18 m (55 ft) of each other.',
							'<strong>Crab apples</strong> are good pollinators, with plenty of flowers over a long period.',
							'<strong>Self-fertile varieties</strong> set fruit on their own, though even these crop better with a partner.',
							'<strong>Triploid varieties</strong> such as \'Bramley\'s Seedling\' and \'Ribston Pippin\' have mostly sterile pollen and need two other compatible trees. They are a poor choice for a single pot.',
						)
					) .

					$h2( 'Pot, compost and position' ) .
					$p( 'Use a container at least 45 cm (18 in) across; 45–50 cm (18–20 in) suits most fruit trees. Clay pots are heavy and stable, plastic ones lighter and easier to move. Fill with a good loam-based compost such as peat-free John Innes No 3.' ) .
					$p( 'Apples like full sun and a warm, sheltered spot that is not prone to late frosts, which damage the blossom. A south- or west-facing patio is ideal.' ) .

					$h2( 'Plant and stake' ) .
					$p( 'Plant while the tree is dormant, from November to March. Potted trees can be planted at other times, but avoid hot, dry weather. Water the tree in its old pot first, tease out some of the outer roots, and plant it at the same level as before, with the soil mark on the stem at the surface of the compost. Firm it in and water well.' ) .
					$p( 'The RHS lists trees on M27, M9 and M26 rootstocks as needing a permanent stake. Put the stake in at planting time and fix the trunk to it with a tree tie.' ) .
					$p( 'Be patient with fruit: remove any fruitlets in the year after planting and leave only a couple in the second year, so the young tree builds roots and branches first.' ) .

					$h2( 'Water and feed through summer' ) .
					$p( 'An apple tree in a pot needs a steady supply of water throughout the growing season. Water generously, let the surface of the compost dry a little before the next watering, but never let it become bone dry. Water close to the base of the tree, early in the morning or late in the evening, ideally with stored rainwater. A tree that goes short of water in summer drops its fruit before it ripens, and its leaves brown at the edges.' ) .
					$p( 'Feed every two weeks during the growing season with a high-potassium liquid feed, or sprinkle a handful of general-purpose granular fertiliser on the compost each spring.' ) .

					$h2( 'Repot and top-dress' ) .
					$p( 'To stop the roots becoming pot-bound, move a young tree into a slightly larger pot every year or every other year, after the leaves have fallen or in spring. Once it is in its final pot, tip it out every other year, trim the roots, and replace about a third of the compost with fresh. In the years between, scrape off the top layer of compost and replace it.' ) .

					$h2( 'Thin, prune and harvest' ) .
					$p( 'Apple trees often set more fruit than they can carry and shed some naturally in early summer, the June drop. Thinning the rest in early July gives larger, better fruit. Prune a free-standing tree in winter; trained forms such as cordons are pruned in late summer.' ) .
					$p( 'Pick apples as they ripen, from late summer into autumn depending on the variety: when they have swollen, started to colour and taste sweet. Cup the apple in your hand, lift and twist gently: a ripe one comes away with its stalk.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying without checking the rootstock: semi-dwarfing MM106 grows too big for a pot.',
							'Buying a lone tree that needs a partner, with no compatible apple nearby.',
							'Letting the pot dry out in summer: the fruit drops before it ripens.',
							'Leaving a tree in the same compost for years: repot, root-prune and top-dress.',
							'Letting a newly planted tree carry a full crop: remove the fruitlets in the first year.',
						)
					),
				'image_prompt' => 'A young dwarf apple tree about 1.5 m tall, grafted on a dwarfing rootstock, growing in a large frost-proof terracotta pot about 50 cm across on a sunny south-facing stone patio in September. The tree has a short tied trunk with a wooden stake, a small open head of branches with oval, finely toothed mid-green leaves, and a few ripe red-flushed apples hanging on short spurs. Warm afternoon sunlight, the apples in sharp focus, a house wall softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a small dwarf apple tree in a large terracotta pot on a sunny stone patio in early autumn, with a staked trunk, oval toothed green leaves and several ripe red-flushed apples in the lower two thirds of the frame. The top third is calm, softly blurred pale wall and warm sky. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
