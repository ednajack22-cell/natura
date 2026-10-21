<?php
/**
 * Starter guides, batch 17 (fruit trees in pots): cherry, peach and
 * nectarine, pear, plum and a grapevine grown in large containers.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), only where
 * the RHS agrees with the book; see design/sources/BACKYARD-HARVEST.md.
 * US advice comes from the extension pages listed in each guide (checked
 * 19 October 2026). Rootstock basics and pollination groups are explained
 * on apple-tree-in-pot; these guides link to it. The 'months' data is the
 * UK calendar, from the RHS crop calendars. 'timing' holds only plant_out,
 * from University of Minnesota Extension, which advises planting potted
 * trees and vines once the threat of spring frost has passed.
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

$rhs_containers = array(
	'title' => 'RHS — Fruit in containers',
	'url'   => 'https://www.rhs.org.uk/fruit/fruit-trees/containers',
);

$umn_stone = array(
	'title' => 'University of Minnesota Extension — Growing stone fruits in the home garden',
	'url'   => 'https://extension.umn.edu/fruit/growing-stone-fruits-home-garden',
);

return array(
	'name'   => __( 'Fruit trees in pots', 'natura-core' ),
	'guides' => array(
		'plant' => array(

			/* ------------------------------------------------------------ */
			'cherry-tree-in-pot'  => array(
				'title'   => 'How to Grow a Cherry Tree in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 6, 7, 8 ),
				),
				'timing'  => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt' => 'A cherry tree will crop in a container 18–20 in (45–50 cm) wide and deep if it is grafted on the semi-dwarfing Gisela 5 rootstock and is a self-fertile variety, so one tree is enough. Sweet cherries want your sunniest spot; tart (acid) cherries such as Morello grow less vigorously and still fruit in partial shade.',
				'facts'   => array(
					'short_name'     => 'Cherry',
					'botanical_name' => 'Prunus avium (sweet); Prunus cerasus (tart or acid)',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun for sweet cherries; tart cherries cope with partial shade',
					'pot_size'       => 'At least 18–20 in (45–50 cm) wide and deep',
					'hardiness'      => 'H6',
					'watering'       => 'Regular in dry spells; never waterlogged, and go gently as fruit ripens',
					'harvest'        => 'Early to late summer, depending on the variety',
					'season'         => 'Plant potted trees after your last spring frost; in mild areas, while dormant from late fall to early spring',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Check the label for Gisela 5: the RHS names this semi-dwarfing rootstock for cherries in containers.' ),
						array( 'point' => 'Pick a self-fertile cherry such as Stella, Lapins, Sunburst or the tart Morello if you have room for just one tree.' ),
						array( 'point' => 'Tart cherries are less vigorous than sweet ones, which makes them the easier choice for a pot.' ),
						array( 'point' => 'Heavy watering or a soaking just before picking can make ripe cherries split.' ),
						array( 'point' => 'Prune straight after harvest in mid- to late summer, never in winter, to reduce the risk of silver leaf and bacterial canker.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Stella', 'note' => 'Sweet, self-fertile cherry that the RHS lists for pots. Award of Garden Merit; large, rich-flavored black fruit picked in midsummer, though they can split in wet weather.' ),
						array( 'name' => 'Lapins', 'note' => 'Sweet and self-fertile, on the RHS list of cherries for pots. Award of Garden Merit; heavy crops of big dark red cherries ready in midsummer.' ),
						array( 'name' => 'Sunburst', 'note' => 'A self-fertile sweet cherry the RHS names for container growing, with very dark red fruit in midsummer.' ),
						array( 'name' => 'Morello', 'note' => 'A tart cherry for cooking and jam. Award of Garden Merit, self-fertile, crops in mid- to late summer and even fruits on a north-facing site.' ),
					),
					'products'   => array(
						array( 'name' => 'Terracotta pot or half-barrel at least 18–20 in (45–50 cm) wide and deep', 'badge' => '', 'note' => 'The RHS suggests either for a cherry.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'Or peat-free all-purpose potting mix with some horticultural grit mixed in.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused netting and stakes', 'badge' => '', 'note' => 'To keep birds off the crop once the fruit begins to color.', 'url' => '' ),
						array( 'name' => 'Row cover (frost cloth)', 'badge' => '', 'note' => 'Thrown over the blossom on nights when frost is forecast.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which rootstock should a cherry tree in a pot be grafted on?', 'answer' => 'The RHS recommends Gisela 5, a semi-dwarfing rootstock that holds a cherry to about 10–13 ft (3–4 m) in open ground and suits containers. Colt, the other common cherry rootstock, is semi-vigorous and makes a tree of 20–26 ft (6–8 m) in the ground.' ),
						array( 'question' => 'Do I need two cherry trees to get fruit?', 'answer' => 'Not if you choose well. Tart cherries such as Morello are self-fertile, and so are many modern sweet cherries, including Stella, Lapins and Sunburst. Some sweet varieties, such as Kordia and Summer Sun, need a partner that flowers at the same time.' ),
						array( 'question' => 'Why have my potted cherries split?', 'answer' => 'Too much water, from heavy watering or a spell of very wet weather, just as the fruit ripens makes the skins crack. Keep the potting mix evenly moist rather than soaked in summer, and pick ripe cherries before heavy rain if you can.' ),
						array( 'question' => 'When should I prune a cherry tree in a container?', 'answer' => 'Once the crop is picked, usually in mid- to late summer, on a dry day with dry weather forecast for the next two days. The RHS advises this timing because silver leaf and bacterial canker are less likely to get in. A young tree can also be shaped a little in early spring.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow cherries', 'url' => 'https://www.rhs.org.uk/fruit/cherries/grow-your-own' ),
						$rhs_containers,
						array( 'title' => 'RHS — Fruit pollination', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/fruit-basics/fruit-pollination' ),
						array( 'title' => 'RHS — Prunus avium (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/13950/prunus-avium/details' ),
						array( 'title' => 'RHS — Prunus cerasus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/160703/prunus-cerasus/details' ),
						$umn_stone,
						$book,
					),
				),
				'content' =>
					$h2( 'Sweet or tart cherry?' ) .
					$p( 'Sweet cherries come from Prunus avium and are the ones you eat straight from the tree. Tart cherries, also called sour, pie or acid cherries, come from Prunus cerasus and are grown for cooking, jam and pies. For a container, the difference matters: the RHS points out that tart cherries are naturally less vigorous, so they are better suited to life in a pot. They also crop in partial shade, while a sweet cherry needs a sunny position to ripen sweet fruit. Where winters are cold, University of Minnesota Extension notes that tart cherries are the cherries best adapted to northern climates.' ) .
					$p( 'Whichever you choose, buy a grafted tree from a reputable supplier. A cherry grown from a store-bought pit becomes far too large, is slow to fruit, and carries a biosecurity risk.' ) .

					$h2( 'Rootstock and pollination' ) .
					$p( 'A cherry\'s size is set by the rootstock it is grafted on. For a pot, look for Gisela 5 on the label. It is semi-dwarfing and keeps the tree to about 10–13 ft (3–4 m) even in open ground; a container restricts it further. The way rootstocks work is explained in our <a href="/plants/apple-tree-in-pot/">apple tree in a pot</a> guide.' ) .
					$p( 'On a patio there is often room for only one tree, so choose a self-fertile variety. All tart cherries are self-fertile, and so are many modern sweet ones. Even so, a self-fertile tree usually crops better when another cherry flowering at the same time grows nearby.' ) .

					$h2( 'Pot, potting mix and position' ) .
					$p( 'The RHS recommends a container at least 18–20 in (45–50 cm) wide and just as deep. A terracotta pot or a half-barrel both work. Fill it with a loam-rich, soil-based potting mix (British gardeners can use peat-free John Innes No. 3), or peat-free all-purpose potting mix with some horticultural grit mixed in. More on mixes is in <a href="/potting-mix-for-containers/">potting mix for containers</a>.' ) .
					$p( 'The RHS suggests standing a sweet cherry against a sunny south- or southwest-facing wall, out of the wind. Where spring weather swings between warm days and frosty nights, University of Minnesota Extension warns that heat trapped against the south side of a building can make stone fruit bloom too early, so a spot a little away from the wall may be safer. A tart cherry tolerates a shadier corner. Avoid a frost pocket: late frosts damage the blossom, and shelter helps bees reach the flowers.' ) .

					$h2( 'When to plant' ) .
					$p( 'In cold-winter regions, University of Minnesota Extension recommends waiting until spring frosts are over before planting a potted cherry. Where winters are mild, the RHS prefers the dormant season, from late fall to early spring, when bare-root trees are on sale; pot-grown cherries can go in at other times, but skip hot, dry spells. Water a potted tree well beforehand, or soak a bare-root one in a bucket for half an hour.' ) .
					$p( 'The book Backyard Harvest suggests moving a young fruit tree each fall into a pot about 4 in (10 cm) wider at the top until it reaches full size. For the method, and for refreshing the potting mix once the tree is in its last pot, see <a href="/how-to-repot-container-plants/">how to repot container plants</a>.' ) .

					$h2( 'Water, feed and protect the blossom' ) .
					$p( 'A potted cherry needs water through every dry spell from spring to fall, so that the potting mix stays evenly moist; the routine is in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>. Never leave the pot standing in water, especially in winter, when roots in sodden potting mix can rot. In summer, ease off a little as the fruit ripens to avoid split cherries.' ) .
					$p( 'Feed every two weeks from mid-spring to late summer with an organic high-potassium liquid fertilizer, or scatter a general-purpose granular fertilizer on the potting mix each spring. Our <a href="/how-to-fertilize-container-plants/">feeding guide</a> covers both.' ) .
					$p( 'Cherry blossom is easily hurt by frost. On a cold night, drape row cover or an old sheet over a small tree and take it off in the morning so pollinating insects can get in. A pot can also be wheeled into a porch or greenhouse while it flowers.' ) .

					$h2( 'Beat the birds and pick' ) .
					$p( 'Birds strip cherries quickly. Before the fruit starts to color, cover the tree or single branches with plastic-free or reused netting held taut on stakes or poles, so no bird gets tangled. A small tree in a pot can instead spend the fruiting weeks in a greenhouse or sunroom.' ) .
					$p( 'Cherries do not ripen once they are off the tree, so wait until they are fully ripe. Pick in dry weather, holding the stalk rather than the fruit, which bruises easily.' ) .

					$h2( 'Prune in summer' ) .
					$p( 'Prune every year straight after harvest, in mid- to late summer, on a dry day with two more dry days forecast. Summer pruning lowers the risk of silver leaf and bacterial canker. Pruning keeps the tree compact and easier to net, and replaces old wood: tart cherries carry nearly all their fruit on shoots that grew the year before. The RHS prunes cherries in the same way as plums; see our <a href="/plants/plum-tree-in-pot/">plum tree in a pot</a> guide.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a cherry on Colt rootstock for a pot: it is semi-vigorous and grows far larger than Gisela 5.',
							'Choosing a sweet variety that is not self-fertile when no other cherry grows nearby.',
							'Pruning in winter, when silver leaf and bacterial canker infect more easily.',
							'Watering heavily as the fruit ripens, which splits the skins.',
							'Leaving netting until the cherries are red: by then the birds have found them.',
						)
					),
				'image_prompt' => 'A compact cherry tree about 6 ft (1.8 m) tall growing in a large terracotta pot 20 in (50 cm) across on a sunny south-facing patio in midsummer. The tree has a short staked trunk, glossy oval leaves with finely serrated edges, and clusters of shiny dark red cherries hanging in pairs on long thin stalks. A light plastic-free net is folded on the paving beside the pot. Warm morning sunlight, cherries in sharp focus, a brick wall softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a small cherry tree in a large terracotta pot on a sunny brick patio in midsummer, glossy serrated oval leaves and bunches of ripe dark red cherries on long stalks filling the lower two thirds of the frame. The top third is calm, softly blurred pale sky and wall. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			/* ------------------------------------------------------------ */
			'peach-tree-in-pot'   => array(
				'title'   => 'How to Grow a Peach or Nectarine Tree in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun' ),
				'space'   => array( 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 7, 8, 9 ),
				),
				'timing'  => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt' => 'Choose a naturally dwarf peach such as Bonanza or Garden Lady, or the nectarine Nectarella, and plant it in a container at least 18 in (45 cm) wide and deep on a warm, sunny, sheltered patio. A pot has one big advantage: you can move the tree under cover in winter and spring, which keeps peach leaf curl off and frost off the early blossom.',
				'facts'   => array(
					'short_name'     => 'Peach and nectarine',
					'botanical_name' => 'Prunus persica; nectarine: Prunus persica var. nectarina',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun, in the warmest sheltered spot you have',
					'pot_size'       => 'At least 18 in (45 cm) wide and deep',
					'hardiness'      => 'H4',
					'watering'       => 'Keep the potting mix evenly moist, above all while the fruit swells',
					'harvest'        => 'Midsummer to early fall, depending on the variety',
					'season'         => 'Plant potted trees after your last spring frost; in mild areas, while dormant from late fall to early spring',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Buy a dwarf, patio-type variety: the RHS names Bonanza, Crimson Bonfire and Garden Lady for peaches, and Nectarella for nectarines.' ),
						array( 'point' => 'Peaches and nectarines are all self-fertile, so a single tree can crop.' ),
						array( 'point' => 'They flower very early, sometimes in late winter, so frost on the blossom is the main threat to the crop.' ),
						array( 'point' => 'Keep the tree dry under cover from leaf fall until late spring to prevent peach leaf curl.' ),
						array( 'point' => 'Brush pollen from flower to flower with a soft paintbrush, and thin the fruitlets to about 8 in (20 cm) apart.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Bonanza (peach)', 'note' => 'Described by the RHS as a naturally dwarf peach well suited to containers. Self-fertile and fruits young; large yellow-fleshed fruit in late summer.' ),
						array( 'name' => 'Garden Lady (peach)', 'note' => 'Another naturally dwarf peach the RHS recommends for containers, with sweet yellow-fleshed fruit in late summer. Self-fertile.' ),
						array( 'name' => 'Crimson Bonfire (peach)', 'note' => 'A dwarf, self-fertile peach with deep purple leaves that the RHS calls ideal for containers. Deep orange-red fruit in late summer.' ),
						array( 'name' => 'Rochester (peach)', 'note' => 'On the RHS list of peaches for pots. Large yellow-fleshed fruit, flowers later than many varieties, and is one of the peaches claimed to have some resistance to leaf curl.' ),
						array( 'name' => 'Nectarella (nectarine)', 'note' => 'A dwarf, slow-growing nectarine the RHS describes as ideal for pots. Its dense leaves can hide the fruit, and hand pollination is essential for a good crop.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 18 in (45 cm) wide and deep, with good drainage', 'badge' => '', 'note' => 'Roots rot in cold, soggy potting mix, so check the holes stay clear.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'The kind of mix the RHS suggests for a potted peach.', 'url' => '' ),
						array( 'name' => 'Small soft paintbrush', 'badge' => '', 'note' => 'For hand pollinating the early flowers.', 'url' => '' ),
						array( 'name' => 'Clear plastic sheeting or a lean-to cover', 'badge' => '', 'note' => 'Keeps rain off the buds from leaf fall to late spring against leaf curl.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How do I stop peach leaf curl on a tree in a pot?', 'answer' => 'Keep rain off the tree. The fungus needs wet conditions to infect the new leaves in spring, so move the pot into a greenhouse, porch or under a plastic lean-to after leaf fall and keep it dry there until late spring. In the UK, no fungicide for leaf curl is available to home gardeners. In the US, UC IPM advises a preventive spray of a fixed copper fungicide or chlorothalonil each year after the leaves fall, following the label; spraying once symptoms show does not help.' ),
						array( 'question' => 'Is a nectarine grown any differently from a peach?', 'answer' => 'No. A nectarine is a smooth-skinned form of peach and is grown in exactly the same way. The RHS notes that nectarines usually need a little more warmth to ripen in the UK, so in a cool climate give one your most sheltered, sunniest spot or an unheated greenhouse.' ),
						array( 'question' => 'Why should I pollinate my peach by hand?', 'answer' => 'Peaches are self-fertile, but they flower so early in spring that few insects are flying. Over several dry, sunny days, dab a small soft paintbrush into the center of each flower in turn. A tree flowering in a greenhouse or porch must always be pollinated this way.' ),
						array( 'question' => 'When is a peach ready to pick?', 'answer' => 'When it is fully colored and the flesh close to the stalk feels soft. Cup it in your palm and lift gently: a ripe peach comes away easily. Fruit on one tree ripens over a period, so check every day or two.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow peaches', 'url' => 'https://www.rhs.org.uk/fruit/peaches/grow-your-own' ),
						array( 'title' => 'RHS — How to grow nectarines', 'url' => 'https://www.rhs.org.uk/fruit/nectarines/grow-your-own' ),
						array( 'title' => 'RHS — Peach leaf curl', 'url' => 'https://www.rhs.org.uk/disease/peach-leaf-curl' ),
						$rhs_containers,
						array( 'title' => 'RHS — Prunus persica (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/156648/prunus-persica/details' ),
						array( 'title' => 'RHS — Prunus persica var. nectarina (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/160710/prunus-persica-var-nectarina-f/details' ),
						$umn_stone,
						array( 'title' => 'UC IPM (University of California) — Peach leaf curl', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/peach-leaf-curl/' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Peach or nectarine?' ) .
					$p( 'A nectarine is a peach with smooth skin instead of a velvety one. Both are grown in exactly the same way, so this guide covers the two. Nectarines usually need slightly warmer conditions to ripen in a cool climate such as the UK; in a cool area, an unheated greenhouse or hoop house gives them the best chance.' ) .
					$p( 'The RHS rates peaches H4, hardy in most of the UK. The tree survives winter outside; it is the early blossom, and the new leaves in a wet spring, that need your help, and a pot makes both easy to protect.' ) .

					$h2( 'Choose a dwarf variety' ) .
					$p( 'For a container, buy a naturally compact variety. Patio peaches bred for pots reach only about 6 ft (1.8 m) and need little pruning. The RHS names Bonanza, Crimson Bonfire and Garden Lady among peaches, and Nectarella among nectarines. Standard peaches are usually grafted on St Julian A, a rootstock the RHS also lists for pots.' ) .
					$p( 'Every peach and nectarine is self-fertile, so one tree is enough and you do not need to think about a pollination partner. Avoid growing one from a supermarket pit: it may not suit the local climate, can take years to fruit and brings a biosecurity risk.' ) .

					$h2( 'Pot, potting mix and a warm spot' ) .
					$p( 'Use a container at least 18 in (45 cm) wide and deep, with drainage holes that stay clear as the roots fill the pot. Fill it with soil-based potting mix, for which the usual choice in Britain is peat-free John Innes No. 3; see <a href="/potting-mix-for-containers/">potting mix for containers</a>. Stand it in full sun on a sheltered patio or courtyard; the RHS suggests a south- or southwest-facing wall behind it for extra warmth. An unheated greenhouse suits it for all or part of the year.' ) .
					$p( 'University of Minnesota Extension\'s advice for cold areas is to plant potted stone fruit after the last frost risk. In gentler climates the RHS plants a dormant tree between late fall and early spring; container-grown trees can be planted at other times, but not in hot, dry weather.' ) .

					$h2( 'Prevent peach leaf curl' ) .
					$p( 'Peach leaf curl is a fungus that makes new leaves pucker, thicken and turn red soon after they open in spring, later with a whitish bloom of spores. Badly infected leaves drop and the tree loses vigor. It infects only in wet conditions, so the RHS\'s answer is to keep the shoots dry.' ) .
					$list(
						array(
							'<strong>Cover from leaf fall to late spring.</strong> After the leaves fall, move the pot into a greenhouse or porch, or stand it under a plastic lean-to against a wall. The RHS uses a lean-to open at the ends at its Wisley garden; it also protects the blossom from frost.',
							'<strong>Pollinate by hand under cover.</strong> Insects cannot reach a tree indoors, so brush the flowers yourself (see below).',
							'<strong>Pick off infected leaves early,</strong> the RHS suggests, before the white spores appear. A second flush of leaves will grow and is not reinfected.',
							'<strong>Sprays differ by country.</strong> In the UK, there are no fungicides for peach leaf curl available to home gardeners. In the US, UC IPM recommends a preventive spray of a fixed copper fungicide or chlorothalonil each year just after the leaves fall, with a second spray in late winter before the buds swell in wet areas; always follow the label. Spraying once the leaves have curled does not work.',
							'<strong>Resistant varieties help.</strong> The RHS says Rochester shows some resistance. UC IPM lists Frost, Indian Free, Muir and Q-1-8 as resistant peaches and Kreibich as a resistant nectarine, and notes that Redhaven and most varieties derived from it are tolerant.',
						)
					) .

					$h2( 'Frost, pollination and thinning' ) .
					$p( 'Peaches flower in early spring and sometimes in late winter. If frost is forecast and the tree is outside, cover it overnight with row cover or burlap held on stakes so it does not touch the flowers, then uncover it by day. Over several dry, sunny days, dab a soft paintbrush into the center of each flower in turn to move the pollen.' ) .
					$p( 'When the young fruits are between hazelnut and walnut size, thin them so the rest sit about 8 in (20 cm) apart. Take off misshapen, badly placed or small ones first; where fruitlets are bunched, cut some in half with pruning shears and they will fall without harming the shoot.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Keep the potting mix evenly moist through the growing season, especially in early to midsummer when the fruit swells; uneven watering makes unripe fruit drop. Our <a href="/how-often-to-water-container-plants/">watering guide</a> has the routine. Feed every two weeks with an organic high-potassium liquid fertilizer, or add a general-purpose granular fertilizer each spring, as described in <a href="/how-to-fertilize-container-plants/">how to feed container plants</a>.' ) .

					$h2( 'Prune in spring or summer, then harvest' ) .
					$p( 'Like other stone fruit, a peach is pruned only in spring or summer, on a dry day, to avoid silver leaf and bacterial canker. Prune a newly planted tree soon after its buds open; a free-standing tree after fruiting. The fruit forms almost entirely on shoots made the previous year, so pruning swaps old fruited wood for young shoots. Naturally compact varieties need little or none.' ) .
					$p( 'Before the fruit colors, protect it from birds and squirrels with fruit sleeves or netting, or move the pot under cover. Pick when the peach is fully colored and soft near the stalk, and eat it as soon as you can.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving a potted peach out in the winter and spring rain, which lets leaf curl in.',
							'Relying on bees for the early flowers instead of pollinating with a brush.',
							'Leaving every fruitlet on: the crop is small, crowded and slow to ripen.',
							'Pruning in fall or winter, when silver leaf and bacterial canker spread.',
							'Letting the pot dry out while the fruit is swelling.',
						)
					),
				'image_prompt' => 'A dwarf patio peach tree about 4 ft (1.2 m) tall in a large glazed terracotta pot 18 in (45 cm) across on a warm, sheltered stone patio against a sunny wall in late summer. Long, narrow, glossy lance-shaped leaves crowd the short branches, and several round peaches with velvety yellow skin heavily flushed red sit close to the stems. Golden late-afternoon light, the fruit in sharp focus, the wall softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact peach tree in a large terracotta pot against a warm sunny wall in summer, long narrow green leaves and ripe red-flushed velvety peaches in the lower two thirds of the frame. The top third is calm, softly blurred warm wall and sky. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			/* ------------------------------------------------------------ */
			'pear-tree-in-pot'    => array(
				'title'   => 'How to Grow a Pear Tree in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun' ),
				'space'   => array( 'patio' ),
				'months'  => array(
					'plant'   => array( 10, 11, 12, 1, 2, 3, 4 ),
					'harvest' => array( 8, 9, 10 ),
				),
				'timing'  => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt' => 'For a pear in a pot, buy a tree on the dwarfing Quince C or Quince Eline rootstock and plant it in a heavy container 18–20 in (45–50 cm) wide and deep, in a warm, sunny, sheltered spot. Most pears need a second variety flowering nearby, unless you choose a self-fertile one such as the narrow, upright Obelisk.',
				'facts'   => array(
					'short_name'     => 'Pear',
					'botanical_name' => 'Pyrus communis',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, sheltered from wind and late frost',
					'pot_size'       => '18–20 in (45–50 cm) wide and deep, heavy enough not to blow over',
					'hardiness'      => 'H6',
					'watering'       => 'Steady moisture through the growing season, more as the fruit sets',
					'harvest'        => 'Late summer to mid-fall; ripen the fruit indoors',
					'season'         => 'Plant potted trees after your last spring frost; in mild areas, while dormant from mid-fall to mid-spring',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'The rootstock for a pot is Quince C or Quince Eline; Quince A grows too big.' ),
						array( 'point' => 'Pears blossom well before apples, so late frosts are a bigger risk: bring the pot under cover on frosty nights.' ),
						array( 'point' => 'Check whether a pear tree grows in a neighbor\'s yard before buying a partner, or pick a self-fertile variety.' ),
						array( 'point' => 'Harvest pears while still firm and let them finish ripening in a cool, dark place.' ),
						array( 'point' => 'Thin a heavy crop in midsummer to one or two fruits per cluster to avoid a poor crop the year after.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Obelisk', 'note' => 'The compact variety the RHS suggests for containers. A self-fertile dwarf pear of columnar shape, reaching about 8 ft (2.5 m), with late-picked green fruit flushed red.' ),
						array( 'name' => 'Concorde (pollination group 3)', 'note' => 'On the RHS list of pears suited to pots. Award of Garden Merit; a compact tree that crops reliably and starts fruiting young.' ),
						array( 'name' => 'Beth (group 4)', 'note' => 'On the RHS list of pears suited to pots. Award of Garden Merit; an early variety with small, sweet yellow-green fruit on a compact tree.' ),
						array( 'name' => 'Conference (group 3)', 'note' => 'On the RHS list of pears suited to pots. Award of Garden Merit; a mid-season pear with very good flavor when fully ripe.' ),
					),
					'products'   => array(
						array( 'name' => 'Heavy pot 18–20 in (45–50 cm) wide and deep', 'badge' => '', 'note' => 'Weight keeps the tree upright in wind.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'The kind of mix the RHS recommends for pears in pots.', 'url' => '' ),
						array( 'name' => 'Tree stake and tie', 'badge' => '', 'note' => 'Put in at planting time.', 'url' => '' ),
						array( 'name' => 'Slatted trays or crates', 'badge' => '', 'note' => 'For ripening picked pears without them touching.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What rootstock is best for a pear tree in a container?', 'answer' => 'A dwarfing quince rootstock: Quince C or Quince Eline. In the ground these give a tree of 8–10 ft (2.5–3 m), and they start fruiting slightly sooner than trees on the semi-vigorous Quince A, which reaches 10–15 ft (3–4.5 m).' ),
						array( 'question' => 'Why pick pears before they are ripe?', 'answer' => 'Pears finish ripening best off the tree. Pick them when they are firm and swollen and the skin has started to change color, then keep them somewhere cool and dark. Early varieties soften in about a week; late ones can take months. Press near the stalk: slight give means it is ready to eat.' ),
						array( 'question' => 'Can I grow just one pear tree on a patio?', 'answer' => 'Yes, if it is self-fertile, like Obelisk, or if another pear grows within reach in a nearby yard. Failing that, plant two varieties whose blossom overlaps; Concorde (group 3) and Beth (group 4), for example, are close enough in flowering time.' ),
						array( 'question' => 'Why did my potted pear drop its small fruit in summer?', 'answer' => 'Some loss in early summer is natural and is called the June drop. Heavy losses usually mean the tree went short of water while the fruit was forming, which the RHS says matters most on dwarfing rootstocks, where a small tree carries a big crop.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow pears', 'url' => 'https://www.rhs.org.uk/fruit/pears/grow-your-own' ),
						array( 'title' => 'RHS — Pears: choosing cultivars', 'url' => 'https://www.rhs.org.uk/fruit/pears/choosing-cultivars' ),
						$rhs_containers,
						array( 'title' => 'RHS — Fruit pollination', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/fruit-basics/fruit-pollination' ),
						array( 'title' => 'RHS — Pyrus communis (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/14227/pyrus-communis-f/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing pears in the home garden', 'url' => 'https://extension.umn.edu/fruit/growing-pears-home-garden' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Pick a quince rootstock' ) .
					$p( 'Pears are not sold on their own roots, which would give a tree of 20 ft (6 m) or more. Instead they are grafted onto quince. For a pot, the RHS recommends the dwarfing Quince C or Quince Eline. Quince A is semi-vigorous and suits a tree in the ground or an espalier, not a container. If rootstocks are new to you, our <a href="/plants/apple-tree-in-pot/">apple tree in a pot</a> guide explains how they work.' ) .
					$p( 'Backyard Harvest likewise recommends compact varieties on semi-dwarfing rootstocks for containers, and suggests asking a fruit nursery which varieties suit your space.' ) .

					$h2( 'Sort out pollination before you buy' ) .
					$p( 'Most pears set a good crop only when another pear variety flowering at the same time is close by. Look over the fence first: a pear tree in a neighbor\'s yard may do the job. If there is none, you can grow two compatible varieties, or choose one that is self-fertile or partly self-fertile. Pears are matched with pears only; an apple will not pollinate them.' ) .
					$p( 'On the RHS list of pears for pots, Concorde and Conference are in pollination group 3 and Beth in group 4, so any two of them flower close enough together.' ) .

					$h2( 'Container, potting mix and site' ) .
					$p( 'Choose a container 18–20 in (45–50 cm) wide and deep that is heavy and stable enough not to tip over in strong wind. Fill it with a peat-free mix that contains loam, sold in the UK as John Innes No. 3; <a href="/potting-mix-for-containers/">potting mix for containers</a> explains why. Set it on a warm, sunny, sheltered patio facing south or west.' ) .
					$p( 'For cold regions, University of Minnesota Extension says to plant a pear bought in a pot after the danger of spring frost is over, and a bare-root one as soon as the soil can be worked. Where winters are gentler, the RHS plants during dormancy, from mid-fall to mid-spring. Avoid hot, dry spells and frozen weather. Soak a bare-root tree for half an hour first, plant it at the depth it grew before, and fix it to a stake.' ) .

					$h2( 'Guard the early blossom' ) .
					$p( 'Pears flower significantly earlier than apples, so a late frost or a cold spring storm can wipe out the flowers or keep bees away. When frost is forecast during flowering, bring the pot indoors overnight or cover a small tree with row cover or burlap. A sheltered spot also helps pollinating insects.' ) .

					$h2( 'Water, feed and repot' ) .
					$p( 'Water whenever the weather is dry so the potting mix stays evenly moist, ideally with stored rainwater in the early morning or evening; <a href="/how-often-to-water-container-plants/">how often to water container plants</a> has more. A pear in a pot benefits from an organic high-potassium liquid fertilizer every two weeks through the growing season, or a handful of general-purpose granules each spring (<a href="/how-to-fertilize-container-plants/">feeding guide</a>).' ) .
					$p( 'The RHS pear guide suggests repotting into a larger container every few years, in spring, and top-dressing with fresh potting mix in between. Once the pot is as big as you can manage, trim the roots lightly and return the tree to the same pot. The steps are in <a href="/how-to-repot-container-plants/">how to repot container plants</a>.' ) .

					$h2( 'Thin, prune and pick' ) .
					$p( 'A pear sheds some fruitlets of its own accord in early summer. If it still carries a heavy load by midsummer, thin it: one fruit per cluster on a trained tree, two on a free-standing one, 4–6 in (10–15 cm) apart. This helps the remaining pears ripen and makes it less likely the tree will rest the following year.' ) .
					$p( 'Prune a free-standing pear in winter and a trained one, such as a cordon, in late summer. Pick the fruit firm and swollen, when the skin starts to change color. Taste early varieties; later ones part from the branch when lifted and twisted. Store them on slatted trays in a cool, dark place, not touching, and check often.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting a pear on Quince A in a pot, where it grows too vigorously.',
							'Using a light pot that blows over once the tree is in leaf.',
							'Expecting a lone, non-self-fertile pear to crop with no partner nearby.',
							'Leaving pears to ripen fully on the tree instead of finishing them indoors.',
							'Letting the potting mix dry while the fruitlets are forming, which makes them drop.',
						)
					),
				'image_prompt' => 'A slender, upright dwarf pear tree about 6 ft (1.8 m) tall in a heavy frost-proof terracotta pot 20 in (50 cm) across, standing on a sunny west-facing patio in early fall. The tree has glossy oval mid-green leaves with finely toothed edges and several plump, classic pear-shaped green fruits with a light red flush hanging close to the stem. A wooden stake and tie support the trunk. Soft evening sunlight, the pears in sharp focus, a backyard fence blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a narrow columnar pear tree in a large terracotta pot on a sunny patio in late summer, glossy oval leaves and green pears with a red blush in the lower two thirds of the frame. The top third is calm, softly blurred sky and greenery. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			/* ------------------------------------------------------------ */
			'plum-tree-in-pot'    => array(
				'title'   => 'How to Grow a Plum Tree in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun' ),
				'space'   => array( 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 7, 8, 9, 10 ),
				),
				'timing'  => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt' => 'A compact, self-fertile dessert plum such as Blue Tit, Opal or Victoria, grafted on Pixy or VVA-1, will fruit in a pot at least 20 in (50 cm) wide and deep. Give it a warm, sunny, sheltered spot, water and feed from mid-spring to late summer, and thin the young fruit so the branches do not snap.',
				'facts'   => array(
					'short_name'     => 'Plum',
					'botanical_name' => 'Prunus domestica',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun in a warm, sheltered spot',
					'pot_size'       => 'At least 20 in (50 cm) wide and deep',
					'hardiness'      => 'H5',
					'watering'       => 'Regular in dry spells; never leave the pot standing in water',
					'harvest'        => 'Midsummer to mid-fall, depending on the variety',
					'season'         => 'Plant potted trees after your last spring frost; in mild areas, while dormant from late fall to early spring',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Look for Pixy or VVA-1 on the label: both are semi-dwarfing plum rootstocks the RHS suggests for containers.' ),
						array( 'point' => 'Choose a dessert plum: the RHS finds no culinary variety suitable for pots, while Blue Tit, Opal and Victoria grow well in one.' ),
						array( 'point' => 'Plum blossom opens in early to mid-spring and is easily killed by frost, so shelter or cover the tree on cold nights.' ),
						array( 'point' => 'Thin the fruitlets in early summer: plums overcrop and laden branches can break.' ),
						array( 'point' => 'Prune young trees in early spring and established ones in summer, never in the dormant season.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Blue Tit', 'note' => 'Named by the RHS for growing in a pot. Award of Garden Merit; compact, self-fertile and reliable, it flowers late, which makes it a good choice where spring frosts are likely. Crops in late summer.' ),
						array( 'name' => 'Opal', 'note' => 'A dessert plum the RHS says grows well in containers. Award of Garden Merit; self-fertile and very reliable, with reddish-purple fruit early in the plum season, at the start of late summer.' ),
						array( 'name' => 'Victoria', 'note' => 'The classic plum, listed by the RHS for containers. Award of Garden Merit; self-fertile, for eating fresh or cooking, ready as summer turns to fall.' ),
					),
					'products'   => array(
						array( 'name' => 'Terracotta pot or half-barrel at least 20 in (50 cm) wide and deep', 'badge' => '', 'note' => 'The minimum size the RHS gives for a plum.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'For a tree that stays in its pot for years.', 'url' => '' ),
						array( 'name' => 'Organic high-potassium liquid fertilizer', 'badge' => '', 'note' => 'Every two weeks from mid-spring to late summer.', 'url' => '' ),
						array( 'name' => 'Row cover or an old bedsheet', 'badge' => '', 'note' => 'To cover the blossom on frosty nights.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Which plum varieties grow best in a container?', 'answer' => 'The RHS lists three dessert plums for pots: Blue Tit, Opal and Victoria, all self-fertile. It does not recommend any cooking plum for container growing. Blue Tit is compact and flowers late, which helps where spring frosts are common.' ),
						array( 'question' => 'How much should I thin the fruit on a potted plum?', 'answer' => 'In early summer, reduce the young plums to one every 2–3 in (5–8 cm), or a pair every 6 in (15 cm). Plums tend to set more than the branches can carry. If a tree still ends up heavily laden, prop up the branches in mid- and late summer.' ),
						array( 'question' => 'Why must plum trees not be pruned in winter?', 'answer' => 'Pruning cuts made in the dormant season or in mid- to late fall let in silver leaf and bacterial canker. Prune a young plum in early spring once its buds open and an established one in summer, on a dry day with dry weather forecast for two days.' ),
						array( 'question' => 'How do I know when plums are ripe?', 'answer' => 'Leave them on the tree until they feel soft when you squeeze gently, which is when the flavor is best. They ripen a few at a time, so pick over the tree several times, handling the fruit carefully because it bruises.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow plums', 'url' => 'https://www.rhs.org.uk/fruit/plums/grow-your-own' ),
						array( 'title' => 'RHS — Plums: choosing cultivars', 'url' => 'https://www.rhs.org.uk/fruit/plums/choosing-cultivars' ),
						$rhs_containers,
						array( 'title' => 'RHS — Prunus domestica (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/84405/prunus-domestica-d-c/details' ),
						$umn_stone,
						$book,
					),
				),
				'content' =>
					$h2( 'A dessert plum on a semi-dwarfing rootstock' ) .
					$p( 'Plums crop best in the ground, but a compact tree on a small rootstock does well in a large pot. There is no truly dwarfing plum rootstock, so the RHS recommends the semi-dwarfing Pixy or VVA-1. On Pixy a bush reaches 10–12 ft (3–4 m) in open ground and on VVA-1 about 10 ft (3 m); the pot keeps it smaller. St Julian A and Wavit are semi-vigorous and Brompton is vigorous. Our <a href="/plants/apple-tree-in-pot/">apple tree in a pot</a> guide explains rootstocks in general.' ) .
					$p( 'For variety, stay with dessert plums. The RHS says no cooking plum suits a container, but Blue Tit, Opal and Victoria grow well in one. All three are self-fertile, so a single tree on its own can set fruit. University of Minnesota Extension also notes that European plums are self-compatible, though they generally crop more heavily with a second variety nearby.' ) .

					$h2( 'Pot and potting mix' ) .
					$p( 'A plum needs a container at least 20 in (50 cm) wide and deep; a terracotta pot or a half-barrel is ideal. Use a soil-based potting mix, which UK garden centers sell as peat-free John Innes No. 3; more in <a href="/potting-mix-for-containers/">potting mix for containers</a>. Trees in pots need more care than those in the ground, so plan to water and feed through the whole growing season.' ) .
					$p( 'Backyard Harvest recommends knocking a young potted fruit tree out each fall, teasing out the edge of the roots, and moving it into a container roughly 4 in (10 cm) wider at the top, until it is full sized. Our <a href="/how-to-repot-container-plants/">repotting guide</a> covers the method.' ) .

					$h2( 'A warm, sheltered position' ) .
					$p( 'Plums are among the first fruit trees to flower, in early to mid-spring. The tree is hardy, but frost easily kills the blossom and strong wind keeps bees away, so stand the pot in full sun out of the wind. In a cool climate, the RHS suggests a south-, southwest- or west-facing wall for extra warmth; where spring swings between warm spells and frost, University of Minnesota Extension advises against crowding stone fruit against the south side of a building, which can bring the blossom out too early.' ) .
					$p( 'University of Minnesota Extension, writing for a cold climate, puts potted stone fruit trees in after the danger of spring frost. Elsewhere the RHS favors the dormant season, late fall to early spring, which is also when container-grown trees settle best. If a frost is forecast while the tree is in flower, drape row cover or an old sheet over it for the night and remove it in the morning, or wheel the pot into a porch, greenhouse or other sheltered place.' ) .

					$h2( 'Water and feed through summer' ) .
					$p( 'Water regularly in dry spells to keep the potting mix evenly moist, but do not let the pot stand in water, especially in winter; see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>. A dry pot makes young fruit fall. From mid-spring to late summer, give an organic high-potassium liquid fertilizer every two weeks; a spring sprinkling of general-purpose granules is the alternative (<a href="/how-to-fertilize-container-plants/">feeding guide</a>).' ) .

					$h2( 'Thin the crop and support branches' ) .
					$p( 'Plums are inclined to set too much fruit, and a laden branch can snap. In early summer, reduce the fruitlets to one every 2–3 in (5–8 cm) or a pair every 6 in (15 cm). On a small potted tree this is quick. If the crop is still heavy, prop up the branches in mid- and late summer.' ) .

					$h2( 'Prune at the right time' ) .
					$p( 'Plums fruit on one- and two-year-old wood as well as older shoots. Prune every year, but only in the growing season: a young tree in early spring after its buds open, an established one in summer. Avoid the dormant season and mid- to late fall, when silver leaf and bacterial canker infect cuts. Choose a dry day with more dry days forecast. In a pot, a small open-centered bush with three or four main branches is the simplest shape; Blue Tit on Pixy or VVA-1 can also be trained as a cordon against wires or a stake.' ) .

					$h2( 'Harvest' ) .
					$p( 'Leave plums on the tree until they feel soft when squeezed gently: that is when they taste best. They ripen gradually, so expect to pick several times. Handle them carefully, as they bruise. Net the tree if birds take too many. Extra fruit can be eaten fresh, pitted and frozen, or made into jam. University of Minnesota Extension says plums keep 3–5 weeks if refrigerated promptly after picking.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Buying a plum on St Julian A or Brompton for a pot: both grow too large.',
							'Choosing a cooking plum, which the RHS does not recommend for containers.',
							'Pruning in winter or fall, which invites silver leaf and bacterial canker.',
							'Leaving every fruitlet on until a branch breaks under the weight.',
							'Letting the potting mix dry out while the plums are forming, so they drop.',
						)
					),
				'image_prompt' => 'A compact plum tree about 6 ft (1.8 m) tall in a large terracotta pot 20 in (50 cm) across on a sunny, sheltered patio in late summer, an open goblet of three or four branches above a short trunk. Oval, finely toothed mid-green leaves, and branches hung with oval reddish-purple plums with a faint dusty bloom on the skin. Warm afternoon light, the plums in sharp focus, a stone wall softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a small plum tree in a large terracotta pot on a sunny patio in late summer, oval toothed leaves and clusters of ripe reddish-purple plums with a soft bloom in the lower two thirds of the frame. The top third is calm, softly blurred pale wall and sky. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			/* ------------------------------------------------------------ */
			'grapevine-in-pot'    => array(
				'title'   => 'How to Grow a Grapevine in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun' ),
				'space'   => array( 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 8, 9, 10 ),
				),
				'timing'  => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt' => 'A grapevine in a pot is trained as a standard, a small lollipop-shaped tree on one stem, which suits a patio or a greenhouse. Start it in a pot about 12–15 in (30–38 cm) across and move it on to a final pot 18 in (45 cm) wide and deep; from the fourth summer expect five or six bunches a year.',
				'facts'   => array(
					'short_name'     => 'Grapevine',
					'botanical_name' => 'Vitis vinifera',
					'difficulty'     => 'Challenging',
					'sun'            => 'Full sun; your warmest spot outdoors, or a greenhouse or sunroom',
					'pot_size'       => 'Start at 12–15 in (30–38 cm); final pot 18 in (45 cm) wide and deep',
					'hardiness'      => 'H5',
					'watering'       => 'Regular watering through the growing season',
					'harvest'        => 'Late summer to mid-fall, depending on the variety',
					'season'         => 'Plant potted vines after your last spring frost; in mild areas, while dormant from late fall to early spring',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Train a potted vine as a standard: a clear stem 2–4 ft (60–120 cm) tall topped by a head of short fruiting spurs.' ),
						array( 'point' => 'Use a heavy clay pot, because a standard is top heavy, and pot on gradually to a final size of 18 in (45 cm).' ),
						array( 'point' => 'Do the main pruning in early winter; later cuts bleed sap.' ),
						array( 'point' => 'A vine needs a winter chill to flower: keep it out of heated rooms for at least four to six weeks below 41 °F (5 °C).' ),
						array( 'point' => 'Black vine weevil grubs can eat the roots of a vine in a pot, so check the potting mix if growth is poor.' ),
					),
					'varieties'  => array(
						array( 'name' => 'New York Muscat', 'note' => 'One of the grapes the RHS lists for pots, needing no pollinator. A dessert grape for growing outdoors, with sweet, muscat-flavored reddish-black bunches ripening in mid-fall.' ),
						array( 'name' => 'Siegerrebe', 'note' => 'Listed by the RHS for pot culture. A reliable white grape for outdoors with small, intensely aromatic fruit in early fall, for dessert, juice or wine.' ),
						array( 'name' => 'Seyval Blanc', 'note' => 'Listed by the RHS for pot culture. A heavy-cropping white grape mostly used for wine, suited to outdoor growing in warmer regions of the UK.' ),
					),
					'products'   => array(
						array( 'name' => 'Heavy clay pot, 12–15 in (30–38 cm) to start, 18 in (45 cm) final', 'badge' => '', 'note' => 'Weight steadies a top-heavy standard.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'The RHS suggests a soil-based mix for vines in pots.', 'url' => '' ),
						array( 'name' => 'Sturdy bamboo stake', 'badge' => '', 'note' => 'Supports the main stem from planting.', 'url' => '' ),
						array( 'name' => 'Umbrella-style standard support', 'badge' => '', 'note' => 'Holds up the shoots once they carry heavy bunches.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'What size pot does a grapevine need?', 'answer' => 'Plant a young vine in a pot about 12–15 in (30–38 cm) across and deep, then move it into a slightly larger one each time it needs it, aiming for a final pot 18 in (45 cm) wide and deep. Choose heavy clay, because a standard vine is top heavy.' ),
						array( 'question' => 'When will a potted grapevine give its first grapes?', 'answer' => 'Trained as a standard, it can carry its first bunch in the fourth summer. After that, allow one bunch per fruiting shoot, five or six in total. Letting more develop gives poor bunches that may not ripen.' ),
						array( 'question' => 'Can a grapevine in a pot stay in a heated sunroom all year?', 'answer' => 'No. A vine needs a cold rest to form flower buds. If it lives somewhere heated all year, move it outdoors for four to six weeks in winter when temperatures are below 41 °F (5 °C).' ),
						array( 'question' => 'Why is my grapevine bleeding sap after pruning?', 'answer' => 'It was pruned too late. From midwinter onward the sap starts to rise, and cuts made then, or large cuts into old wood, can bleed. Nothing stops it; it ends when the vine starts growing. Finish pruning by midwinter next time.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow grapes', 'url' => 'https://www.rhs.org.uk/fruit/grapes/grow-your-own' ),
						array( 'title' => 'RHS — Grapes: training as a standard', 'url' => 'https://www.rhs.org.uk/fruit/grapes/training-as-standard' ),
						$rhs_containers,
						array( 'title' => 'RHS — Vitis vinifera (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/134401/vitis-vinifera/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing grapes in the home garden', 'url' => 'https://extension.umn.edu/fruit/growing-grapes-home-garden' ),
					),
				),
				'content' =>
					$h2( 'Why a standard suits a pot' ) .
					$p( 'In the ground, a grapevine is a vigorous climber that needs wires on a wall, a pergola or a greenhouse frame. In a container it is trained as a standard instead: one clear stem with a rounded head of short branches, like a lollipop. The crop is modest, but the RHS calls it the best option when space is very limited, and the vine looks good on a patio.' ) .
					$p( 'Because it is not tied to anything in the ground, a standard can be moved. Push an outdoor variety into a greenhouse in spring for earlier growth and protection from late frost, and again in late summer to help the grapes ripen. A longer season gives sweeter fruit.' ) .

					$h2( 'Choose an outdoor variety' ) .
					$p( 'Dessert grapes need warmth and are usually grown under glass in the UK; wine grapes cope better outdoors in milder areas there. For pots, the RHS lists Seyval Blanc, Siegerrebe and New York Muscat, all able to fruit without a pollinator. Vines in pots do not need a particular rootstock. If yours is grafted, keep the graft point well above the potting mix.' ) .
					$p( 'Keep dogs away from the plant: the RHS warns that grapes are harmful to dogs if eaten.' ) .

					$h2( 'Pot, potting mix and planting' ) .
					$p( 'Where winters are cold, University of Minnesota Extension advises planting potted grapevines once the threat of spring frost has passed, and bare-root vines as soon as the soil can be worked. In milder areas, the RHS plants a dormant vine between late fall and early spring; early spring is a good time if the pot will live outside. Start with a pot about 12–15 in (30–38 cm) across and deep, filled with peat-free soil-based potting mix (<a href="/potting-mix-for-containers/">potting mix for containers</a> explains the choice). Use heavy clay for stability. Plant a pot-grown vine at its old depth and a bare-root one with the top roots just under the surface. Push a sturdy stake in at the same time.' ) .
					$p( 'Move the vine on into a slightly bigger pot as it grows, until it reaches a final size of 18 in (45 cm) wide and deep; see <a href="/how-to-repot-container-plants/">how to repot container plants</a>. Stand it in your warmest, sunniest spot outdoors, or in a greenhouse or sunroom.' ) .

					$h2( 'Train the stem and head' ) .
					$p( 'Build the stem slowly over several years before letting the head form. In the first winter, cut the vine back to a strong bud about 6 in (15 cm) from the base, keeping at least two buds above any graft. Tie one strong shoot to the stake and remove the others.' ) .
					$list(
						array(
							'<strong>Each following winter,</strong> cut the main stem back by about half, into firm brown wood, and remove its side-shoots so the stem stays clear.',
							'<strong>In summer,</strong> trim side-shoots on the stem to five leaves and keep tying in the leader.',
							'<strong>Once the stem reaches the height you want</strong> (usually 2–4 ft, 60–120 cm), let five or six shoots grow at the top. Stop them at five leaves, and later regrowth at one leaf.',
							'<strong>The following winter,</strong> cut those shoots back to two or three buds. These stubs, called spurs, carry the fruiting shoots from then on.',
						)
					) .

					$h2( 'Prune and thin an established vine' ) .
					$p( 'Do the main pruning in early winter, when the vine is fully dormant: cut the previous year\'s shoots back to one or two buds. Thin out a few of the oldest spurs each year once they become crowded. Rub off any shoots that appear on the trunk.' ) .
					$p( 'In late spring, trim each fruiting shoot to two leaves beyond its bunch, and stop shoots without fruit at five leaves. Keep one bunch per shoot, five or six in all. The bunches are heavy, so tie the shoots to the stake maypole-fashion or use an umbrella-style support.' ) .

					$h2( 'Water, feed and winter chill' ) .
					$p( 'A vine in a container needs regular watering through the growing season (see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>). Start feeding a month after growth begins in spring with an organic high-potassium liquid fertilizer every two to three weeks, and stop when the grapes start to color, because feeding then can spoil their flavor; more in <a href="/how-to-fertilize-container-plants/">how to feed container plants</a>.' ) .
					$p( 'Vines need a cold spell to set flower buds. A vine kept somewhere heated all year should go outside for four to six weeks in winter, when it is below 41 °F (5 °C).' ) .

					$h2( 'Harvest and problems' ) .
					$p( 'Grapes ripen from late summer to mid-fall. Taste them: they are ready when sweet and soft, and they do not ripen further once picked. Cut whole bunches with their stalk. Net the vine if birds raid it.' ) .
					$p( 'If a potted vine grows poorly despite good care, tip it out and look for small white C-shaped grubs: black vine weevil larvae can eat most of the roots. Vines also suffer from fungal diseases including <a href="/problems/powdery-mildew/">powdery mildew</a>, and under glass from <a href="/problems/spider-mites/">spider mites</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Pruning after midwinter, which makes the cuts bleed sap.',
							'Letting a young vine fruit too soon: wait for the fourth summer.',
							'Keeping the vine warm all winter so it never gets the chill it needs to flower.',
							'Leaving more than five or six bunches, which then fail to ripen.',
							'Using a light plastic pot that tips over under a top-heavy standard.',
						)
					),
				'image_prompt' => 'A standard-trained grapevine in a heavy terracotta pot 18 in (45 cm) across on a sunny patio in early fall: a straight clear woody trunk about 3 ft (1 m) tall tied to a bamboo stake, topped by a rounded head of short spurs with large, palmately lobed, toothed green leaves just starting to turn yellow. Five or six bunches of ripe reddish-black grapes hang below the head. Warm low fall sun, the bunches in sharp focus, a house wall softly blurred behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a lollipop-shaped standard grapevine in a large terracotta pot on a sunny patio in fall, clear woody trunk, lobed green leaves and hanging bunches of dark grapes in the lower two thirds of the frame. The top third is calm, softly blurred warm wall and sky. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
