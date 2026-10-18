<?php
/**
 * Starter guides, batch 23: herb fennel, compact blackberries, melons,
 * rhubarb and a dwarf apricot tree grown in containers.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026); hardiness ratings come from the RHS plant pages. Jo Whittingham,
 * Backyard Harvest (DK, 2011) is used only where the RHS agrees; see
 * design/sources/BACKYARD-HARVEST.md. Rootstock basics and pollination
 * groups are explained on apple-tree-in-pot, hand pollination on
 * how-to-hand-pollinate-fruit-and-vegetables; these guides link to them.
 * Months are for a temperate climate such as the UK.
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
	'name'   => __( 'Fennel, blackberries, melons, rhubarb and apricots', 'natura-core' ),
	'guides' => array(
		'plant' => array(

			/* ------------------------------------------------------------ */
			'fennel-herb-in-pots'  => array(
				'title'        => 'How to Grow Herb Fennel in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 6, 7, 8, 9, 10 ),
				),
				'excerpt'      => 'Herb fennel is a hardy perennial grown for its feathery, aniseed-flavoured leaves, flowers and seeds, and it does well in a heavy pot at least 30 cm (1 ft) wide and deep in a warm, sunny, sheltered corner. Sow it straight into that pot in spring, keep the compost moist, pick leaves from early summer and cut the dead stems down before new shoots appear the following spring.',
				'facts'        => array(
					'short_name'     => 'Herb fennel',
					'botanical_name' => 'Foeniculum vulgare; bronze fennel: Foeniculum vulgare \'Purpureum\'',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun in a warm, sheltered spot',
					'pot_size'       => 'At least 30 cm (1 ft) wide and deep, heavy and stable',
					'hardiness'      => 'H5',
					'watering'       => 'Steady moisture in a pot; never waterlogged',
					'harvest'        => 'Leaves from early summer to autumn; seeds from late summer',
					'season'         => 'Sow mid- to late spring; plant out in late spring or early summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Herb fennel makes no bulb: it is a tall perennial that can reach about 2 m (6½ ft), grown for leaves, flowers and seeds.' ),
						array( 'point' => 'Its long tap root hates being moved, so sow where the plant will grow or move module-raised seedlings out while still small.' ),
						array( 'point' => 'Choose a weighty container and a spot out of the wind: tall stems can tip a light pot over.' ),
						array( 'point' => 'Cut flower stems off, or trim the plant to about 30 cm (1 ft) a few times in summer, if you want a steady supply of fresh leaves.' ),
						array( 'point' => 'It self-seeds freely, so gather the seedheads or pull up stray seedlings while they are tiny.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Common (green) fennel', 'note' => 'Foeniculum vulgare, with bright green feathery leaves and flat heads of yellow flowers. The RHS notes that leaves, flowers and seeds all taste of aniseed.' ),
						array( 'name' => 'Bronze fennel (\'Purpureum\')', 'note' => 'Young leaves are bronze-purple and age to a dark grey-green. The RHS says it is grown the same way as the green form and is just as good in the kitchen.' ),
					),
					'products'   => array(
						array( 'name' => 'Heavy pot at least 30 cm (1 ft) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Glazed ceramic or terracotta resists tipping better than light plastic.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'The mix the RHS suggests for fennel in a container.', 'url' => '' ),
						array( 'name' => 'Herb fennel seed (green or bronze)', 'badge' => '', 'note' => 'Check the packet says herb fennel, not Florence fennel.', 'url' => '' ),
						array( 'name' => 'Bamboo cane and soft twine', 'badge' => '', 'note' => 'Holds the flower stems upright on a windy balcony.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Is herb fennel the same plant as the fennel bulbs sold in shops?', 'answer' => 'No. Shop bulbs come from Florence fennel, Foeniculum vulgare var. azoricum, a close relative grown as a vegetable. Herb fennel forms no swollen base: it is a long-lived plant cut for its leaves and seeds. Both are often sold simply as fennel, so read the seed packet or plant label.' ),
						array( 'question' => 'Does fennel come back each year in a container?', 'answer' => 'Yes. It is hardy (RHS rating H5). The stems turn brown and die back in autumn, and new shoots push up from the base in spring. Cut the old stems to compost level before the new growth starts so you do not snap it.' ),
						array( 'question' => 'How do I stop fennel seeding all over my balcony?', 'answer' => 'Remove some or all of the flower heads before the seed drops, or cut the heads for the kitchen once they ripen. Any seedlings that do appear in other pots are easy to pull while they are small, before the tap root goes deep.' ),
						array( 'question' => 'Why does my potted fennel keep blowing over?', 'answer' => 'The flowering stems are tall and catch the wind, and a light pot gives them no anchor. Move the plant into a heavier container, stand it in a sheltered corner and tie the tallest stems to a cane.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow fennel (herb)', 'url' => 'https://www.rhs.org.uk/herbs/fennel/grow-your-own' ),
						array( 'title' => 'RHS — Foeniculum vulgare (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/24472/foeniculum-vulgare/details' ),
						array( 'title' => 'RHS — Foeniculum vulgare \'Purpureum\'', 'url' => 'https://www.rhs.org.uk/plants/43739/foeniculum-vulgare-purpureum/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Herb fennel or Florence fennel?' ) .
					$p( 'Two plants share the name. Herb fennel, Foeniculum vulgare, is a hardy perennial with soft, thread-like leaves and tall stems topped with flat clusters of small yellow flowers in summer. It forms a clump up to about 2 m (6½ ft) tall that dies down every autumn and regrows from the base in spring. The leaves, flowers and seeds are all edible, with a warm aniseed taste, and the flowers draw in pollinating insects.' ) .
					$p( 'If you want the crisp white bulbs, you need the annual vegetable instead: see <a href="/plants/florence-fennel-in-pots/">how to grow Florence fennel in pots</a>. Herb fennel also looks a little like dill, but it is taller and lives for years; dill is covered in <a href="/plants/dill-in-pots/">dill in pots</a>.' ) .

					$h2( 'Pot, compost and a sheltered spot' ) .
					$p( 'One plant needs 30 cm (1 ft) of width and depth as a minimum; fill the pot with peat-free multi-purpose compost. Pick a heavy, stable pot: a full-grown plant is tall and top-heavy, and the RHS warns it can easily be blown over. Fennel likes free-draining conditions and its roots can rot if they sit wet, so make sure the drainage holes are clear. More on mixes is in <a href="/plant-care/compost-for-containers/">compost for containers</a>.' ) .
					$p( 'Stand the pot in full sun, somewhere warm and out of strong gusts. Because it grows so tall, Backyard Harvest suggests placing it behind lower herbs, so on a balcony it works well at the back of a group of pots, where it adds height without shading the others.' ) .

					$h2( 'Sow it where it will grow' ) .
					$p( 'Fennel resents root disturbance, so the simplest route is to sow straight into its final pot from mid-spring. Sow about 1 cm (½ in) deep and thin the seedlings as they grow; the thinnings can go into a salad. If you prefer to start indoors in spring, sow one seed per module in peat-free seed compost, as explained in <a href="/plant-care/how-to-sow-seeds-indoors/">how to sow seeds indoors</a>.' ) .
					$p( 'Module-raised plants must go outside while they are still very young, before the tap root develops. Water them first, <a href="/plant-care/how-to-harden-off-seedlings/">harden them off</a>, then slide each one out and plant it at the same depth without breaking up the root ball. Young plants from a nursery can be planted in late spring and early summer. Shelter seedlings from <a href="/problems/slugs-and-snails/">slugs and snails</a>.' ) .

					$h2( 'Watering and support' ) .
					$p( 'In open ground an established fennel copes with drought, but a plant in a pot depends on you. Check it every few days through the growing season and water when the compost starts to dry, aiming for steady moisture rather than a soaking. The routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>. The RHS says fennel needs no feeding.' ) .
					$p( 'On an exposed balcony, push a cane into the pot and loosely tie in the flower stems once they start to stretch upwards.' ) .

					$h2( 'Picking leaves and flowers' ) .
					$p( 'Snip sprigs of young leaves whenever you need them from early summer to autumn; regular picking encourages more. Add them to salads and cooking or infuse them as a tea; the flowers are edible too.' ) .
					$p( 'Once flower stems form, leaf production slows. For leaves only, cut those stems out as they appear. Another option from the RHS is to cut the whole plant back to about 30 cm (1 ft) several times during the season, which brings a fresh flush of tender foliage each time.' ) .

					$h2( 'Collecting fennel seed' ) .
					$p( 'Seeds ripen from late summer and can be used green over the summer or dried. To dry them, cut whole seedheads as they ripen, drop them into a paper bag and leave them until the seeds are dry and fall away, then keep the seeds in an airtight jar. Saved seed can also be sown the next spring; <a href="/plant-care/how-to-save-seeds-from-your-plants/">how to save seeds from your plants</a> covers the basics.' ) .
					$p( 'Seedheads left on the plant feed birds, but any seed that drops will sprout, often in neighbouring pots. Seedlings usually come true to the parent, so a stray green or bronze fennel can be lifted while tiny and potted up.' ) .

					$h2( 'Autumn and spring tidy-up' ) .
					$p( 'In autumn the stems turn brown. You can leave them standing over winter, where they look striking in frost and shelter overwintering insects. In late winter or early spring, cut them down to compost level before the new shoots appear. Aphids sometimes gather on the soft new growth in spring, but the RHS says they do no significant harm; see <a href="/problems/aphids-container-plants/">aphids on container plants</a> if numbers build up.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying Florence fennel seed by mistake and waiting for leaves that never become a perennial clump.',
							'Growing it in a light plastic pot on a windy balcony, where the first summer gust knocks it over.',
							'Transplanting an older seedling with a long tap root, which often fails to recover.',
							'Leaving every flower head to shed seed, then weeding fennel out of every pot nearby.',
							'Cutting the old stems late, after the new shoots have started, and damaging them.',
						)
					),
				'image_prompt' => 'A tall clump of herb fennel growing in a heavy dark-glazed ceramic pot about 35 cm wide on a sunny, sheltered balcony in midsummer. Fine, thread-like feathery leaves, bright green on some stems and bronze-purple on a second plant behind, rise on smooth upright stems about 1.2 m tall, topped with flat umbrella-shaped clusters of tiny yellow flowers. A hoverfly rests on one flower head. Lower pots of thyme and parsley sit in front. Warm afternoon light, the feathery foliage in sharp focus.' . $photo_end,
				'pin_prompt'   => 'Close-up of feathery green and bronze fennel leaves and a flat head of small yellow flowers in a tall ceramic pot on a sunny balcony, photographed vertically from slightly below so the stems rise into a clear pale sky.' . $pin_end,
			),

			/* ------------------------------------------------------------ */
			'blackberries-in-pots' => array(
				'title'        => 'How to Grow Blackberries in Pots',
				'type'         => 'fruit',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'plant'   => array( 10, 11, 12, 1, 2, 3 ),
					'harvest' => array( 7, 8, 9 ),
				),
				'excerpt'      => 'Yes, if you choose one of the few compact, thornless blackberries, such as Little Black Prince or Loch Tay, and plant it in a pot at least 45 cm (18 in) wide and deep filled with loam-based compost. Full-size blackberries and hybrids such as tayberries are far too vigorous for a container.',
				'facts'        => array(
					'short_name'     => 'Blackberry',
					'botanical_name' => 'Rubus fruticosus agg.',
					'difficulty'     => 'Moderate',
					'sun'            => 'Sun for the biggest crop; fruits in light shade',
					'pot_size'       => 'At least 45 cm (18 in) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Regular throughout the growing season',
					'harvest'        => 'Mid-summer to early autumn, by variety',
					'season'         => 'Plant mid-autumn to early spring',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Only compact varieties belong in a pot: ordinary blackberries can spread 2.5–4 m (8–13 ft).' ),
						array( 'point' => 'Thornless canes make pruning, tying in and picking far easier in a small space.' ),
						array( 'point' => 'Cut every stem down to 20–25 cm (8–10 in) straight after planting: you lose the first summer\'s fruit but gain strong new canes.' ),
						array( 'point' => 'Most blackberries fruit on canes that grew the year before, so remove fruited canes at the base after picking.' ),
						array( 'point' => 'Pick a berry only when it is completely black and shiny: it will not ripen further once off the plant.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Little Black Prince', 'note' => 'Named by the RHS as a compact blackberry for containers that needs no supports, reaching about 1 m (3¼ ft) tall and wide. Thornless; the RHS describes it as ever-bearing, cropping over three or four months.' ),
						array( 'name' => 'Loch Tay', 'note' => 'RHS Award of Garden Merit. A compact, semi-upright, thornless blackberry about 1–1.5 m (3¼–5 ft) tall, with sweet fruit early in the season.' ),
						array( 'name' => 'Loch Ness', 'note' => 'RHS Award of Garden Merit. Compact and thornless, with heavy crops from mid-August until the first frosts. Larger than the two above at 1.5–2.5 m (5–8 ft); Backyard Harvest notes it can be grown in a container.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 45 cm (18 in) wide and deep, with drainage holes', 'badge' => '', 'note' => 'The minimum the RHS gives for compact blackberries.', 'url' => '' ),
						array( 'name' => 'Peat-free loam-based compost (John Innes No 3 type)', 'badge' => '', 'note' => 'Heavy, long-lasting and stable for a permanent pot.', 'url' => '' ),
						array( 'name' => 'Thick gardening gloves', 'badge' => '', 'note' => 'The RHS advises them for the many blackberries that carry sharp prickles.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused netting and canes', 'badge' => '', 'note' => 'To keep birds off the ripening berries.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which blackberry is small enough for a pot?', 'answer' => 'Look for a compact, thornless variety. The RHS names Little Black Prince, about 1 m (3¼ ft) tall and wide, as suitable for a container without supports, and recommends Loch Tay and Loch Ness as compact varieties. Loch Ness grows larger, up to about 2.5 m (8 ft), so it needs the biggest pot and a wall or support.' ),
						array( 'question' => 'Will a newly planted blackberry fruit in its first summer?', 'answer' => 'Usually not. The RHS advises cutting all stems down to 20–25 cm (8–10 in) after planting, which removes this year\'s fruiting wood. The plant then sends up vigorous new canes in spring, and those carry the first proper crop the following summer.' ),
						array( 'question' => 'Can I grow a tayberry or loganberry in a container?', 'answer' => 'They are a poor fit. The RHS describes tayberries as vigorous plants spreading 2.5–4 m (8–13 ft), and its container advice covers only compact blackberries. If you love hybrid berries, they are better trained along wires on a wall or fence in open ground.' ),
						array( 'question' => 'Why do some of my blackberries stay red and hard?', 'answer' => 'Berries that ripen unevenly can be a sign of red berry mite, a microscopic pest that the RHS lists on blackberries. A berry may also simply be unripe: wait until it is entirely black and glossy before picking.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow blackberries and hybrid berries', 'url' => 'https://www.rhs.org.uk/fruit/blackberries/grow-your-own' ),
						array( 'title' => 'RHS — Rubus fruticosus agg. (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/16132/rubus-fruticosus-agg/details' ),
						array( 'title' => 'RHS — Blackberry \'Little Black Prince\'', 'url' => 'https://www.rhs.org.uk/plants/357375/rubus-idaeus-little-black-prince/details' ),
						array( 'title' => 'RHS — Blackberry \'Loch Tay\'', 'url' => 'https://www.rhs.org.uk/plants/238174/blackberry-loch-tay-agm/details' ),
						array( 'title' => 'RHS — Blackberry \'Loch Ness\'', 'url' => 'https://www.rhs.org.uk/plants/75680/blackberry-loch-ness-agm/details' ),
						array( 'title' => 'RHS — Tayberry', 'url' => 'https://www.rhs.org.uk/plants/50568/tayberry-agm/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Pick a compact, thornless variety' ) .
					$p( 'Garden blackberries give bigger, sweeter fruit than hedgerow brambles, but most are vigorous scramblers that need several metres of wall or fence. The RHS says a few compact varieties can be grown in large pots, and these are the only sensible choice for a balcony or patio. Thornless canes are a real advantage in a small space, where you brush past the plant every day.' ) .
					$p( 'Little Black Prince is the smallest the RHS names, at about 1 m (3¼ ft), and needs no supports. Loch Tay is a little taller and semi-upright. Loch Ness crops heavily but can reach 2.5 m (8 ft), so it suits a large pot against a sunny wall. Hybrid berries such as tayberries and loganberries are grown in the same way in the ground, but they are too vigorous for a container.' ) .

					$h2( 'Container, compost and position' ) .
					$p( 'Use a pot at least 45 cm (18 in) wide and deep and fill it with a good loam-based compost, such as a peat-free John Innes No 3 type, which holds moisture and stays stable for years. See <a href="/plant-care/compost-for-containers/">compost for containers</a> for how loam-based and multi-purpose mixes differ.' ) .
					$p( 'A sunny, sheltered spot gives the best crop, although blackberries still fruit in light shade. Avoid anywhere the pot will sit in water: the plants dislike waterlogged roots.' ) .

					$h2( 'Planting and the first year' ) .
					$p( 'The ideal time is from mid-autumn to early spring. Pot-grown plants can go in at any time of year, as long as the weather is not hot and dry. Set the plant at the same depth it grew in its nursery pot and water it in well.' ) .
					$p( 'Straight after planting, cut every stem back to a healthy bud 20–25 cm (8–10 in) above the compost. It feels drastic, and it means no berries the first summer, but it pushes the plant to send up strong new canes. Tie these loosely to a cane or wire as they grow; they fruit the following year.' ) .

					$h2( 'Support, pruning and training' ) .
					$p( 'Most blackberries crop on canes that grew the previous spring and summer. Each year after picking, cut the canes that have fruited right down to the base and tie in the new ones in their place. Keeping this year\'s new canes bundled loosely in the centre while the older ones fruit makes it easy to tell them apart. The idea is close to pruning a summer raspberry, explained in <a href="/plants/raspberries-in-pots/">raspberries in pots</a>.' ) .
					$p( 'Little Black Prince is different: the RHS describes it as ever-bearing, fruiting on both one- and two-year-old stems, so follow the pruning advice that comes with the plant. For a taller variety against a wall, horizontal wires spaced about 45 cm (18 in) apart give the canes something to be tied to; see <a href="/diy-projects/fix-a-wire-trellis-to-a-wall/">fix a wire trellis to a wall</a>.' ) .

					$h2( 'Water, mulch and feed' ) .
					$p( 'A blackberry in the ground rarely needs watering once settled, but in a pot it needs regular water right through the growing season so the compost never dries out; <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a> has the routine. A layer of organic mulch in early spring, kept clear of the stems, helps hold moisture. For a feeding plan suited to fruit in pots, see <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.' ) .

					$h2( 'When to pick blackberries' ) .
					$p( 'Depending on the variety, berries ripen from mid-summer into early autumn. Check every few days and take only those that are entirely black, plump and glossy; they often come away with the core still in place. Picked blackberries stay fresh for only a day or two, so eat them quickly or see <a href="/plant-care/how-to-freeze-berries/">how to freeze berries</a>.' ) .
					$p( 'Birds find ripe fruit fast. Drape plastic-free or reused netting over a frame of canes so it stays taut and away from the berries; <a href="/diy-projects/net-a-fruit-bush/">net a fruit bush</a> shows how.' ) .

					$h2( 'Pests and problems' ) .
					$list(
						array(
							'<strong>Raspberry beetle:</strong> grubs damage the fruit of blackberries as well as raspberries. The signs and the RHS approach are in <a href="/plants/raspberries-in-pots/">raspberries in pots</a>.',
							'<strong>Grey mould:</strong> fuzzy grey rot on berries in damp weather. See <a href="/problems/grey-mould/">grey mould</a>.',
							'<strong>Aphids:</strong> sap-sucking insects on shoot tips and flower stalks. See <a href="/problems/aphids-container-plants/">aphids on container plants</a>.',
							'<strong>Red berry mite:</strong> a microscopic mite that makes blackberries ripen unevenly.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a full-size or hybrid berry for a pot because it was the only one on sale.',
							'Skipping the hard cut after planting in the hope of fruit in year one.',
							'Leaving old fruited canes in place, so the plant becomes a tangle that crops less.',
							'Picking berries that are still partly red: they do not sweeten after picking.',
							'Using a small pot that dries out within hours on a sunny balcony.',
						)
					),
				'image_prompt' => 'A compact thornless blackberry about 1 m tall growing in a large grey fibreclay pot 45 cm wide on a sunny patio in early August. Upright green canes carry leaves made of three to five toothed, oval leaflets, and clusters of glossy black, ripe blackberries hang beside firm red and green unripe ones and a few white five-petalled flowers. A small bowl of picked blackberries sits on the paving beside the pot. Warm morning light, the berries in sharp focus.' . $photo_end,
				'pin_prompt'   => 'Close-up of a cluster of shiny ripe black blackberries and a few red unripe ones on a thornless cane, a large pot and a sunny balcony softly blurred behind, photographed vertically.' . $pin_end,
			),

			/* ------------------------------------------------------------ */
			'melons-in-pots'       => array(
				'title'        => 'How to Grow Melons in Pots',
				'type'         => 'fruit',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 4, 5 ),
					'plant'   => array( 5, 6 ),
					'harvest' => array( 8, 9 ),
				),
				'excerpt'      => 'You can, but in a cool climate it is a gamble: the RHS says melons are best grown in a greenhouse or polytunnel, and only a few cantaloupe varieties ripen outdoors in a very warm, sheltered spot. Give one plant a 40 cm (16 in) pot, keep it under a cold frame or mini greenhouse if you can, and expect up to four fruits in late summer at best.',
				'facts'        => array(
					'short_name'     => 'Melon',
					'botanical_name' => 'Cucumis melo',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun in the warmest, most sheltered spot you have',
					'pot_size'       => 'At least 40 cm (16 in) wide and deep, one plant per pot',
					'hardiness'      => 'H1C',
					'watering'       => 'Evenly moist but never soggy; keep water off the leaves',
					'harvest'        => 'Late summer outdoors; late July to early autumn under glass',
					'season'         => 'Sow mid-April to mid-May; plant out once nights stay above 12–15 °C (54–59 °F)',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Be realistic: outdoors in the UK a melon only ripens in a hot, sheltered spot, and a cold frame or mini greenhouse improves the odds.' ),
						array( 'point' => 'Choose a cantaloupe type: the RHS says only a few varieties suit growing outside, so check the description.' ),
						array( 'point' => 'Seeds need 18–21 °C (64–70 °F) to germinate, so sow indoors in a propagator or on a warm, sunny windowsill.' ),
						array( 'point' => 'Do not move plants out until nights stay above 12–15 °C (54–59 °F), usually in June.' ),
						array( 'point' => 'Limit an outdoor plant to about four fruits and stop feeding once they start to ripen.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Emir', 'note' => 'RHS Award of Garden Merit. A cantaloupe bred for duller UK summers: best in a greenhouse, but the RHS says it can crop outdoors under cloches or fleece. Sweet orange flesh.' ),
						array( 'name' => 'Alvaro', 'note' => 'RHS Award of Garden Merit. A cantaloupe with pale yellow, green-striped skin and sweet, aromatic orange flesh in late summer.' ),
						array( 'name' => 'Ogen', 'note' => 'RHS Award of Garden Merit. A cantaloupe with small round fruits about 15 cm across and very sweet pale green flesh; the RHS plant page treats it as a greenhouse melon.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 40 cm (16 in) wide and deep, or a growing bag', 'badge' => '', 'note' => 'One melon plant per pot or per standard growing bag.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'The mix the RHS suggests for melons in containers.', 'url' => '' ),
						array( 'name' => 'Heated propagator', 'badge' => '', 'note' => 'Holds the 18–21 °C seeds need to germinate.', 'url' => '' ),
						array( 'name' => 'Sturdy canes, trellis or netting, plus soft netting for slings', 'badge' => '', 'note' => 'To train the stems up and cradle heavy fruit.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid feed', 'badge' => '', 'note' => 'From the time the fruits are walnut-sized.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can a melon ripen outside on a balcony in the UK?', 'answer' => 'Sometimes, but not reliably. The RHS says melons do best in a greenhouse or polytunnel and that some cantaloupe varieties may fruit outdoors in warm places. On a hot, sunny, sheltered balcony you may get a few fruits in late summer; a cold frame or mini greenhouse gives you a much better chance.' ),
						array( 'question' => 'How many melons will one plant in a pot produce?', 'answer' => 'Plan on no more than four from a plant grown outside, which the RHS gives as the most that usually ripen before the season ends. Under glass a plant can carry four to six. Remove extra fruits so the ones you keep reach full size.' ),
						array( 'question' => 'How can I tell when a melon is ready to pick?', 'answer' => 'Smell it: a ripe melon gives off a strong, sweet melon scent. The stalk also starts to crack where it joins the fruit, and the end opposite the stalk gives slightly when pressed. Eat it soon after picking, as melons do not keep well.' ),
						array( 'question' => 'Is a watermelon easier to grow in a pot than a melon?', 'answer' => 'No. The RHS advises growing watermelons in a greenhouse or polytunnel for the best chance in the UK, and choosing a variety suited to cooler climates or a compact one such as Little Darling.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow melons', 'url' => 'https://www.rhs.org.uk/fruit/melons/grow-your-own' ),
						array( 'title' => 'RHS — Cucumis melo \'Emir\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/293236/emir-agm/details' ),
						array( 'title' => 'RHS — Cucumis melo \'Alvaro\'', 'url' => 'https://www.rhs.org.uk/plants/293239/alvaro-agm/details' ),
						array( 'title' => 'RHS — Cucumis melo \'Ogen\'', 'url' => 'https://www.rhs.org.uk/plants/112426/ogen-agm/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'What a pot can realistically achieve' ) .
					$p( 'Melons are tender annuals related to cucumbers, with long scrambling stems, big leaves and tendrils. They need warmth, humidity and a steady supply of water to make sweet fruit, and the RHS rates them H1C: they can only grow outside in summer. Its advice for the UK is clear: a greenhouse or polytunnel gives the best results, and only some varieties may fruit outdoors in warm places.' ) .
					$p( 'On a balcony or patio, that means treating a melon as an experiment. A hot, south-facing, sheltered spot gives you a chance of a few fruits in late summer. A large cold frame or a mini greenhouse raises the odds considerably; see <a href="/plant-care/cloches-and-mini-greenhouses-on-a-balcony/">cloches and mini greenhouses on a balcony</a>. In a cool, windy or shady spot, a melon has little chance of ripening.' ) .

					$h2( 'Choose a cantaloupe' ) .
					$p( 'Two kinds of sweet melon grow in the UK. Cantaloupes, with rough skin and scented orange flesh, are the RHS\'s choice for growing outside, although only a few varieties are suitable. Honeydews, with smooth yellow skin and pale green flesh, are best kept for a greenhouse. Varieties with the RHS Award of Garden Merit performed well in trials. Grafted plants crop more reliably but cost more, and buying one or two young plants in spring saves you raising them from seed.' ) .
					$p( 'Do not sow seed saved from a supermarket melon: the RHS warns of biosecurity risks.' ) .

					$h2( 'Sowing in spring' ) .
					$p( 'Sow from mid-April to mid-May. Push two seeds about 1.5 cm (½ in) deep into a small pot roughly 7.5 cm (3 in) across. They need 18–21 °C (64–70 °F) to germinate, so a heated propagator is ideal, though a constantly warm, sunny windowsill may do. Seedlings appear in about a week; if both come up, pull out the weaker one. Keep them warm, well lit and watered. The general method is in <a href="/plant-care/how-to-sow-seeds-indoors/">how to sow seeds indoors</a>.' ) .

					$h2( 'Planting into the pot' ) .
					$p( 'When a plant has three or four leaves and nights stay reliably above 12–15 °C (54–59 °F), usually from early June, it can go outside. Acclimatise it gradually, as a sudden drop in temperature can check its growth or kill it; see <a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>.' ) .
					$p( 'Set a single melon in the middle of a pot that measures 40 cm (16 in) or more across and in depth, using peat-free multi-purpose compost, or one plant in a standard growing bag (<a href="/diy-projects/plant-up-a-growing-bag/">plant up a growing bag</a>). Keep the stem at the same level it grew before: Backyard Harvest warns that planting too deep invites rot at the neck of the stem.' ) .

					$h2( 'Training, pollinating and thinning' ) .
					$p( 'Growing the stems up strong canes, trellis or netting saves floor space. Pinch out the growing tip once the plant has five leaves, keep the four strongest side shoots that follow and remove the rest. Ideas for frames are in <a href="/plant-care/supports-for-climbing-crops/">supports for climbing crops</a>.' ) .
					$p( 'Melons carry separate male and female flowers, and a female flower has a tiny fruit behind it. Bees usually do the work outdoors, but under a cover it is safer to transfer pollen yourself; the method is in <a href="/plant-care/how-to-hand-pollinate-fruit-and-vegetables/">how to hand-pollinate fruit and vegetables</a>.' ) .
					$p( 'When the young fruits are about 2.5 cm (1 in) across, keep the best one or two on each side shoot and remove the other flowers and fruits. Pinch out each side shoot two or three leaves beyond the fruit. Outdoors, aim for four fruits at most. As they swell, cradle each one in a sling of netting tied to the support.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Keep the compost evenly moist but never saturated, and water at the base rather than over the leaves, which encourages fungal disease. Morning watering with rainwater is best. A melon in a pot may need water every day in hot spells. The general routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .
					$p( 'Every 10–14 days in early to mid-summer, give an organic-based general liquid feed. Once the fruits are the size of walnuts, switch to a high-potassium feed at the same interval. When the fruits begin to ripen and the leaves start to fade in late summer, stop feeding and water less.' ) .

					$h2( 'Ripening, picking and problems' ) .
					$p( 'Outdoor melons ripen in late summer, and plants decline quickly once nights turn cold, so cover them with fleece or a cloche by late summer to buy time. A fruit is ready when it smells strongly of melon, the stalk begins to crack and the base gives a little under gentle pressure.' ) .
					$list(
						array(
							'<strong>Red spider mite:</strong> thrives in hot, dry air; see <a href="/problems/red-spider-mite/">red spider mite</a>.',
							'<strong>Powdery mildew:</strong> more likely after the compost has dried out; see <a href="/problems/powdery-mildew/">powdery mildew</a>.',
							'<strong>Slugs and snails:</strong> attack young plants; see <a href="/problems/slugs-and-snails/">slugs and snails</a>.',
							'<strong>Mosaic virus:</strong> melons share it with cucumbers and courgettes; see <a href="/plants/cucumbers-in-pots/">cucumbers in pots</a>.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Expecting a greenhouse harvest from a pot on a cool or windy balcony.',
							'Planting out in May while nights still drop below 12 °C (54 °F).',
							'Burying the stem deeper than it grew in its small pot.',
							'Letting a plant set many fruits, so none of them ripen before autumn.',
							'Splashing the leaves every evening instead of watering the compost in the morning.',
						)
					),
				'image_prompt' => 'A single cantaloupe melon plant growing in a large black plastic pot 40 cm wide inside a small open-fronted mini greenhouse on a hot, south-facing balcony in August. Bristly, rounded, shallowly lobed green leaves and curling tendrils climb a bamboo and string frame. One round melon about 12 cm across with netted, greenish-yellow skin hangs in a sling of green netting tied to the frame, with a few small yellow flowers above. Bright late-summer sun.' . $photo_end,
				'pin_prompt'   => 'A netted cantaloupe melon resting in a netting sling on a climbing plant in a pot on a sunny balcony, lobed leaves and tendrils around it, photographed vertically from the side.' . $pin_end,
			),

			/* ------------------------------------------------------------ */
			'rhubarb-in-a-pot'     => array(
				'title'        => 'How to Grow Rhubarb in a Pot',
				'type'         => 'fruit',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'patio' ),
				'months'       => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 4, 5, 6 ),
				),
				'excerpt'      => 'Yes: the RHS says rhubarb grows well in a large container at least 50 cm (20 in) deep and wide, filled with peat-free soil-based compost, ideally with a compact variety. Plant the crown with its bud just above the surface, water it through spring and summer, and wait until the third year before pulling stalks freely.',
				'facts'        => array(
					'short_name'     => 'Rhubarb',
					'botanical_name' => 'Rheum × hybridum',
					'difficulty'     => 'Easy',
					'sun'            => 'Open and sunny; copes with light shade',
					'pot_size'       => 'At least 50 cm (20 in) deep and wide',
					'hardiness'      => 'H5',
					'watering'       => 'Regularly in spring and summer; never waterlogged',
					'harvest'        => 'April to June, a few stalks in year two and freely from year three',
					'season'         => 'Plant bare-root crowns November to March',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Choose a compact variety and a pot at least 50 cm (20 in) deep and wide with plenty of drainage holes.' ),
						array( 'point' => 'Plant so the crown\'s tip sits just above the compost: buried buds tend to rot.' ),
						array( 'point' => 'Take nothing in the first year and only a few stalks in the second.' ),
						array( 'point' => 'Twist stalks away from the base rather than cutting them, and never take more than a third at once.' ),
						array( 'point' => 'The leaves are poisonous: eat only the stalks, but the leaves are safe to compost.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Fulton\'s Strawberry Surprise', 'note' => 'RHS Award of Garden Merit. Bright red stalks with a well-balanced flavour on a plant about 0.5–1 m (1½–3¼ ft) across; the RHS notes it can be grown in large containers. Picks in May and June.' ),
						array( 'name' => 'Raspberry Red', 'note' => 'RHS Award of Garden Merit. Heavy crops of sweet, rich red stalks from April to June on a plant of similar compact size. Also suitable for forcing.' ),
						array( 'name' => 'Timperley Early', 'note' => 'RHS Award of Garden Merit. An early, heavy-cropping variety that the RHS recommends for forcing. It spreads wider, up to 1.5–2.5 m (5–8 ft), so it needs a big pot.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 50 cm (20 in) deep and wide, with several drainage holes', 'badge' => '', 'note' => 'A half-barrel or large plastic tub works.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based compost (John Innes No 3 type)', 'badge' => '', 'note' => 'Lasts for years in a long-term pot.', 'url' => '' ),
						array( 'name' => 'Rhubarb forcer or tall bucket', 'badge' => '', 'note' => 'Blocks the light for an early crop of pale, tender stalks.', 'url' => '' ),
						array( 'name' => 'Pot feet', 'badge' => '', 'note' => 'Keep the base out of standing water in winter.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Are rhubarb leaves poisonous?', 'answer' => 'Yes. The leaves contain oxalic acid and must not be eaten. The RHS says the stalks do not build up enough of it to be harmful, even late in the season. You can put the leaves on the compost heap, where the acid breaks down.' ),
						array( 'question' => 'Why should rhubarb be pulled and not cut?', 'answer' => 'A cut leaves a stump on the crown that is likely to rot. Hold a young stalk low down and twist it gently outwards so it comes away cleanly from the base.' ),
						array( 'question' => 'Why is my rhubarb sending up a tall flower spike?', 'answer' => 'Some varieties flower more readily than others, and flowering is more common after a wet summer, with too much high-nitrogen feed or on old, undivided crowns. Cut the flower stem at its base as soon as you see it so it does not weaken the plant.' ),
						array( 'question' => 'Can rhubarb growing in a container be forced?', 'answer' => 'Yes, if the plant is strong and well established. In mid-winter, cover it with a forcer or a tall bucket to shut out all light. Pale, tender stalks are ready four to eight weeks later. Afterwards, uncover the plant, pick nothing more from it that year and do not force it again the next winter.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow rhubarb', 'url' => 'https://www.rhs.org.uk/vegetables/rhubarb/grow-your-own' ),
						array( 'title' => 'RHS — Rhubarb (cultivation, harvesting and problems)', 'url' => 'https://www.rhs.org.uk/fruit/rhubarb/grow-your-own' ),
						array( 'title' => 'RHS — Rheum × hybridum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/113552/rheum-x-hybridum/details' ),
						array( 'title' => 'RHS — Rheum × hybridum \'Fulton\'s Strawberry Surprise\'', 'url' => 'https://www.rhs.org.uk/plants/126771/fultons-strawberry-surprise-agm/details' ),
						array( 'title' => 'RHS — Rheum × hybridum \'Raspberry Red\'', 'url' => 'https://www.rhs.org.uk/plants/241741/raspberry-red-agm/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Is a pot big enough for rhubarb?' ) .
					$p( 'Rhubarb is a hardy perennial grown for its leaf stalks. In open ground it forms a clump 1.5 m (5 ft) wide or more and can crop for ten years or longer, so in a container it needs plenty of root room. The RHS suggests a container when your soil is short or gets waterlogged, and gives a minimum of 50 cm (20 in) deep and wide. Pick a compact variety; Fulton\'s Strawberry Surprise and Raspberry Red both stay at about 0.5–1 m (1½–3¼ ft) across.' ) .
					$p( 'Strictly, rhubarb is a vegetable, but it is cooked and eaten like fruit, in crumbles, pies and compotes.' ) .

					$h2( 'Planting the crown' ) .
					$p( 'Dormant bare-root crowns are sold from November to March and should be planted soon after they arrive. Potted rhubarb can be planted at any time, though spring and autumn are best; avoid very hot, dry weather. Buy from a reputable supplier so the plant is healthy and free of viruses.' ) .
					$p( 'Make sure the container has plenty of drainage holes and fill it with peat-free soil-based compost, leaving room at the top for watering; Backyard Harvest suggests finishing about 5 cm (2 in) below the rim. Set the plant so its main bud, where the leaf stalks emerge, sits just above the compost surface, then water it in well. See <a href="/plant-care/compost-for-containers/">compost for containers</a> for why a loam-based mix suits a long-term pot.' ) .
					$p( 'Stand the pot in an open, sunny spot; light shade is fine. Avoid a frost pocket, as late frosts can damage the young stalks.' ) .

					$h2( 'Watering, mulching and feeding' ) .
					$p( 'In a container the compost dries out quickly, so water regularly from spring to late summer and keep it moist but never soggy: waterlogged compost rots the roots. Never leave the pot sitting in a saucer of water, especially in winter. Our <a href="/plant-care/how-often-to-water-container-plants/">watering guide</a> covers the routine. In hot, dry spells growth slows or stops altogether.' ) .
					$p( 'Each spring, spread about 7 cm (2½ in) of well-rotted organic matter on the surface without covering the crown. If growth is slow, the RHS suggests a high-nitrogen, organic-based fertiliser in spring or summer; see <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.' ) .

					$h2( 'When and how to harvest' ) .
					$p( 'Patience pays here. Pick nothing in the first year, only a few stalks in the second, and harvest normally from the third. Most varieties are ready from April or May. Choose a young stalk about 30 cm (1 ft) long whose leaf has just opened, hold it near the base and twist it gently away. Take no more than a third of the stalks at once, and stop in late June or early July so the plant can build up strength.' ) .
					$p( 'Cut the leaf off straight away and put it in the compost bin: rhubarb leaves are poisonous, but the stalks are safe to eat. Fresh stalks keep in the fridge for a couple of weeks and can be frozen; see <a href="/plant-care/how-to-freeze-vegetables-from-your-pots/">how to freeze vegetables from your pots</a>.' ) .

					$h2( 'Forcing an early crop' ) .
					$p( 'For sweeter, pale pink stalks weeks ahead of the main crop, cover a strong, established plant in mid-winter with a rhubarb forcer, a tall bucket or a dustbin so the shoots grow in total darkness. An early variety such as Timperley Early responds best. Check often once stalks appear; they are usually ready four to eight weeks after covering.' ) .
					$p( 'Forcing weakens the crown. Remove the cover after the forced crop, leave the plant to grow normally for the rest of the year without picking, and force a different plant, or none, the following winter.' ) .

					$h2( 'Winter care and dividing' ) .
					$p( 'Rhubarb needs a cold spell to start growing again in spring, so it needs no winter protection. In autumn, let the leaves die back naturally, then clear them away so the buds are exposed to the cold. Remove any flower stems at the base as soon as they appear in spring or summer.' ) .
					$p( 'After about five years, or sooner if the stalks become thin and crowded, lift the plant while it is dormant and slice the crown into pieces, each with a portion of root and at least one bud. Pieces from the outside of the clump are more vigorous than the old centre. Replant one into fresh compost and share the rest; <a href="/plant-care/how-to-repot-container-plants/">how to repot container plants</a> explains the steps.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Using a pot shallower than 50 cm (20 in), which dries out fast and cramps the crown.',
							'Burying the crown, or letting the pot stand in water, both of which cause rot.',
							'Harvesting heavily in the first two years before the plant is established.',
							'Cutting stalks with a knife and leaving stumps that rot.',
							'Forcing a young or weak plant, or the same plant two winters running.',
						)
					),
				'image_prompt' => 'A healthy rhubarb plant growing in a large galvanised metal tub about 50 cm wide and deep on a sunny brick patio in May. Thick, glossy red and pink leaf stalks about 30 cm long rise from the crown and carry very large, crinkled, bright green leaves shaped like broad hearts. A few pulled stalks with their leaves trimmed off lie across the rim of the tub. Soft spring sunlight, the red stalks in sharp focus.' . $photo_end,
				'pin_prompt'   => 'Bright red rhubarb stalks rising from a large metal tub on a patio, huge crinkled green leaves above, photographed vertically from a low angle.' . $pin_end,
			),

			/* ------------------------------------------------------------ */
			'apricot-tree-in-pot'  => array(
				'title'        => 'How to Grow an Apricot Tree in a Pot',
				'type'         => 'fruit',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'patio' ),
				'months'       => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 7, 8 ),
				),
				'excerpt'      => 'Yes: the RHS says apricots can be grown in a 45 cm (18 in) or larger pot of peat-free John Innes No 3 on a warm, sunny, sheltered patio, and a dwarf variety such as Garden Aprigold is the best choice. Every apricot is self-fertile, so one tree is enough, but its very early blossom needs protecting from frost and pollinating by hand.',
				'facts'        => array(
					'short_name'     => 'Apricot',
					'botanical_name' => 'Prunus armeniaca',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun on a warm, sheltered south- or west-facing patio',
					'pot_size'       => 'At least 45 cm (18 in) across',
					'hardiness'      => 'H4',
					'watering'       => 'Steady moisture all season, above all while the fruit swells',
					'harvest'        => 'Late July to August',
					'season'         => 'Plant November to March',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'A naturally dwarf variety is the easiest choice: the RHS calls Garden Aprigold ideal in pots.' ),
						array( 'point' => 'All apricots are self-fertile, so a single tree can crop without a partner.' ),
						array( 'point' => 'Blossom opens very early in spring; cover it on frosty nights or wheel the pot under cover.' ),
						array( 'point' => 'Unlike its peach relative, an apricot is seldom troubled by peach leaf curl.' ),
						array( 'point' => 'Dwarf patio apricots are less cold-tolerant than big trees, so give them shelter in a cold winter.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Garden Aprigold', 'note' => 'A naturally compact, self-fertile apricot that the RHS describes as well suited to containers. It grows to about 1–1.5 m (3¼–5 ft), needs little or no pruning and crops in July.' ),
						array( 'name' => 'Tomcot', 'note' => 'Self-fertile and, according to the RHS, reliable in cool climates in southern and central UK. Large orange fruit with a crimson blush in mid- to late July. A larger tree, 2.5–4 m (8–13 ft) on the RHS plant page, so check its rootstock.' ),
						array( 'name' => 'Moorpark', 'note' => 'A self-fertile, late variety on the RHS list, with golden-orange, red-flushed fruit ripening in mid- to late August.' ),
					),
					'products'   => array(
						array( 'name' => 'Container at least 45 cm (18 in) across, with good drainage', 'badge' => '', 'note' => 'Roots rot in cold, wet compost in winter.', 'url' => '' ),
						array( 'name' => 'Peat-free John Innes No 3 compost', 'badge' => '', 'note' => 'The loam-based mix the RHS suggests for apricots in pots.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece and bamboo canes', 'badge' => '', 'note' => 'To tent over the blossom on frosty nights without touching it.', 'url' => '' ),
						array( 'name' => 'Small soft paintbrush and a hand mister', 'badge' => '', 'note' => 'For pollinating the early flowers.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Do I need two apricot trees to get fruit?', 'answer' => 'No. Every apricot variety is self-fertile, so a single tree on a patio can crop. It still needs help with pollination, because it flowers so early that few insects are flying.' ),
						array( 'question' => 'Does an apricot in a pot get peach leaf curl?', 'answer' => 'Rarely. The RHS says peach leaf curl, which troubles its close relatives the peach and the nectarine, is seldom a problem on apricots. The main threats are frost on the blossom, poor pollination and diseases such as bacterial canker and silver leaf.' ),
						array( 'question' => 'Which rootstock suits an apricot in a container?', 'answer' => 'The RHS lists St Julien A and Torinel for apricots in containers. Torinel is semi-dwarfing, making a tree of 3–3.5 m (10–11 ft) in open ground; St Julien A is semi-vigorous, at 4.5–5 m (15–16 ft). A pot keeps either smaller. Naturally dwarf varieties such as Garden Aprigold stay compact anyway.' ),
						array( 'question' => 'Why did my apricot blossom but give no fruit?', 'answer' => 'Usually frost or poor pollination. Blossom damaged by frost cannot set fruit, and early flowers may never be visited by insects. Cover the tree on frosty nights or move it under cover while it flowers, and brush pollen between the flowers yourself.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow apricots', 'url' => 'https://www.rhs.org.uk/fruit/apricots/grow-your-own' ),
						array( 'title' => 'RHS — Fruit in containers', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/containers' ),
						array( 'title' => 'RHS — Prunus armeniaca \'Garden Aprigold\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/175410/prunus-armeniaca-garden-aprigold-(f)/details' ),
						array( 'title' => 'RHS — Prunus armeniaca \'Tomcot\'', 'url' => 'https://www.rhs.org.uk/plants/196180/tomcot/details' ),
						array( 'title' => 'RHS — Prunus armeniaca \'Moorpark\'', 'url' => 'https://www.rhs.org.uk/plants/126376/moorpark/details' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Can an apricot crop in a pot?' ) .
					$p( 'Apricots love sun and are grown much like peaches, their close relatives. In the UK they fruit best with extra warmth, which is why they are often fan-trained on a sunny wall. A pot is a good alternative: the RHS lists containers as a way to grow them, and a potted tree can be moved under cover while it flowers and in a hard winter. The RHS rates the varieties below H4, hardy through most of the UK, but warns that dwarf patio trees are less tolerant of cold than big trees in the ground.' ) .
					$p( 'Do not raise a tree from a shop-bought apricot stone: it may not suit the UK climate, may never fruit reliably and carries a biosecurity risk.' ) .

					$h2( 'Choose a dwarf tree' ) .
					$p( 'A naturally compact variety is the simplest option, because it stays small with little pruning. The RHS singles out Garden Aprigold, at about 1–1.5 m (3¼–5 ft). Other apricots are grafted on a rootstock that limits their size; for containers the RHS lists St Julien A or the semi-dwarfing Torinel. How rootstocks work is covered in our <a href="/plants/apple-tree-in-pot/">apple tree in a pot</a> guide, and <a href="/plant-care/how-to-choose-a-fruit-tree-for-a-pot/">how to choose a fruit tree for a pot</a> compares the options.' ) .
					$p( 'Pollination partners are not a concern: every apricot is self-fertile.' ) .

					$h2( 'Pot, compost and position' ) .
					$p( 'Use a container at least 45 cm (18 in) across and fill it with peat-free John Innes No 3 or a similar loam-based mix. Check that the drainage holes stay clear as the roots fill the pot, since roots rot in cold, wet compost. Stand it in full sun on a warm, sheltered patio facing south or west, away from frost pockets and cold winds.' ) .
					$p( 'Autumn is the best moment to plant, and anywhere from November to March works while the tree is dormant. Container-grown trees are sold all year but settle less readily outside that window.' ) .

					$h2( 'Frost and hand pollination' ) .
					$p( 'Apricot blossom opens very early in spring and even a light frost can kill the flowers. When frost is forecast, drape fleece, hessian or an old sheet over canes so it does not touch the blossom, and uncover the tree by day for light and insects. Alternatively, wheel the pot into a porch, greenhouse or other sheltered spot until flowering is over.' ) .
					$p( 'Few insects are about so early, so pollinate by hand over several dry, sunny days, ideally around midday. Dab a small soft brush into each flower in turn; the RHS adds that a light mist of water afterwards helps the pollen stick, as long as the flowers dry before dark. A tree under cover must always be pollinated this way. More detail is in <a href="/plant-care/how-to-hand-pollinate-fruit-and-vegetables/">how to hand-pollinate fruit and vegetables</a>.' ) .

					$h2( 'Water, feed and repot' ) .
					$p( 'A potted apricot needs a steady supply of water through the growing season, most of all in early to mid-summer while the fruit swells. Water early or late in the day, ideally with rainwater. The routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .
					$p( 'Feed it every fortnight in the growing season with an organic high-potassium liquid fertiliser, or sprinkle a handful of general-purpose granular feed on the compost in spring, as set out in <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>. Every few years in spring, move it into a slightly larger pot; once that is no longer practical, replace the loose compost and lightly trim the roots, and top-dress in the years between. See <a href="/plant-care/how-to-repot-container-plants/">how to repot container plants</a>.' ) .

					$h2( 'Thinning, pruning and winter shelter' ) .
					$p( 'Apricots rarely need thinning. If a tree sets a very heavy crop, wait until the fruitlets are the size of cherries in late spring and reduce pairs and clusters so the rest are 5–8 cm (2–3 in) apart, taking misshapen or shaded ones first.' ) .
					$p( 'Prune only in spring or summer, on a dry day with two dry days to follow, to limit silver leaf and bacterial canker. Shape a newly planted tree in early spring and an established one after fruiting. Garden Aprigold needs little or none; bush-shaped trees are pruned like plums, as in our <a href="/plants/plum-tree-in-pot/">plum tree in a pot</a> guide.' ) .
					$p( 'In colder areas, move the pot to a sheltered spot or an unheated greenhouse for winter; <a href="/plant-care/protect-pots-in-winter/">protect pots in winter</a> has the details.' ) .

					$h2( 'Picking apricots' ) .
					$p( 'Birds and squirrels go for apricots too: before the fruit starts to colour, slip sleeves over it, cover the tree with taut, plastic-free netting, or move the pot under cover. Apricots ripen from late July into August. A ripe one is soft and deeply coloured: cup it in your palm, lift and twist, and it comes away easily. Handle the fruit gently, as it bruises easily, and eat it within a few days or dry it.' ) .
					$p( 'A tree that flowers but sets nothing has usually suffered frost or poor pollination; fruit that never ripens points to too little sun and warmth. See <a href="/problems/few-flowers-or-fruit/">few flowers or fruit</a> for other causes.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a vigorous apricot on a large rootstock for a small patio.',
							'Leaving the blossom uncovered on a frosty night in early spring.',
							'Counting on bees for flowers that open before most insects are flying.',
							'Pruning in autumn or winter, when silver leaf and bacterial canker get in.',
							'Leaving a dwarf patio tree in an exposed spot through a severe winter.',
						)
					),
				'image_prompt' => 'A dwarf apricot tree about 1.3 m tall in a large terracotta pot 45 cm across on a warm, sheltered stone patio against a sunny south-facing wall in late July. Broad, rounded-oval, pointed, glossy green leaves on reddish stalks, and many round apricots with smooth, slightly velvety golden-orange skin and a crimson blush on the sunny side, held close to the short branches. Bright summer sun, fruit in sharp focus, wall softly blurred.' . $photo_end,
				'pin_prompt'   => 'Close-up of ripe golden-orange apricots with a red blush among broad glossy leaves on a small tree in a terracotta pot on a sunny patio, photographed vertically.' . $pin_end,
			),
		),
	),
);
