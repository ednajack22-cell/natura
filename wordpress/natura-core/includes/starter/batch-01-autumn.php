<?php
/**
 * Starter guides, batch 1 (autumn 2026): winter protection for pots, and
 * three easy crops for a balcony or windowsill.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Months are for a temperate climate
 * such as the UK.
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
	'name'   => __( 'Autumn 2026', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'salad-leaves-in-pots' => array(
				'title'   => 'How to Grow Cut-and-Come-Again Salad Leaves in Pots',
				'type'    => 'vegetables',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'windowsill', 'balcony' ),
				'months'  => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7, 8, 9 ),
					'harvest' => array( 3, 4, 5, 6, 7, 8, 9, 10, 11 ),
				),
				'excerpt' => 'Salad leaves are the quickest crop you can grow in a pot: sow a trough of mixed leaves and you can start cutting in about four weeks in summer. Cut them and they grow back, so one sowing gives two or three pickings.',
				'facts'   => array(
					'short_name' => 'Salad leaves',
					'difficulty' => 'Easy',
					'sun'        => 'Sun; light shade in hot weather',
					'pot_size'   => 'At least 30 cm (1 ft) wide',
					'watering'   => 'Keep the compost moist; daily in summer',
					'harvest'    => 'About 4 weeks in summer, around 8 in cool weather',
					'season'     => 'Sow February to September',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Sow in a container at least 30 cm (1 ft) wide, 1 cm (½ in) deep, in peat-free compost.' ),
						array( 'point' => 'Start cutting when the leaves are about 10 cm (4 in) tall.' ),
						array( 'point' => 'Cut above a 2.5 cm (1 in) stump, or pick the outer leaves: the plants regrow.' ),
						array( 'point' => 'Expect two or three pickings from each sowing, then sow again.' ),
						array( 'point' => 'Keep the pot out of the midday sun in summer to stop the plants running to seed.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Loose-leaf lettuce', 'note' => 'Mild leaves that regrow well after cutting. For spring and summer.' ),
						array( 'name' => 'Rocket', 'note' => 'Peppery leaves ready in a few weeks. Turns bitter as the leaves get older, so cut it young.' ),
						array( 'name' => 'Mizuna and mustards', 'note' => 'Mild to hot oriental leaves that cope with cool weather. Good for autumn and winter sowings under cover.' ),
						array( 'name' => 'Lamb\'s lettuce (corn salad)', 'note' => 'Small leaves that keep coming through winter. Wash well: grit collects between the stems.' ),
					),
					'products'   => array(
						array( 'name' => 'Trough or window box, at least 30 cm wide, with drainage holes', 'badge' => '', 'note' => 'Fits a windowsill or a balcony railing.', 'url' => '' ),
						array( 'name' => 'Peat-free seed or multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost each sowing.', 'url' => '' ),
						array( 'name' => 'Mixed salad leaf seed', 'badge' => '', 'note' => 'A cut-and-come-again mix gives a range of leaves from one packet.', 'url' => '' ),
						array( 'name' => 'Sharp kitchen scissors', 'badge' => '', 'note' => 'A clean cut lets the plants regrow quickly.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I grow salad leaves on a windowsill in winter?', 'answer' => 'Yes. Sow in autumn and keep the pot on a sunny windowsill, or under cover outside. Growth is slower in winter: allow around eight weeks before the first cut, and longer for the leaves to grow back.' ),
						array( 'question' => 'Why have my salad leaves gone bitter?', 'answer' => 'Hot, dry weather makes many salad plants flower early (bolt), and the leaves turn bitter. Keep the compost moist, move the pot out of the midday sun, and sow a fresh batch.' ),
						array( 'question' => 'Do salad leaves in pots need feeding?', 'answer' => 'Usually not. Fresh compost holds enough food for the few weeks a sowing lasts. Sow each new batch into fresh compost.' ),
						array( 'question' => 'How often should I sow?', 'answer' => 'Sow a small batch every few weeks. When one pot is past its best after two or three cuts, the next one is ready.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — Growing vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Which leaves to grow' ) .
					$p( 'Many leafy crops grow back after cutting. Loose-leaf lettuce, rocket, cress, lamb\'s lettuce, young spinach, chard, kale, mizuna, mibuna, pak choi, mustards, endive and chicory can all be picked as baby leaves. A ready-made cut-and-come-again mix gives you a little of several in one packet.' ) .
					$p( 'Pick by season. In spring and summer, lettuce and rocket do well. For autumn and winter sowings under cover, choose leaves that cope with short, cool days: rocket, mizuna, mustards, loose-leaf lettuce and lamb\'s lettuce.' ) .

					$h2( 'Choose the pot and the spot' ) .
					$p( 'Use a container at least 30 cm (1 ft) wide with drainage holes, such as a trough or window box. Fill it with peat-free seed or multi-purpose compost.' ) .
					$p( 'Salad leaves like a sunny spot in spring and autumn. In summer, a place in light shade, out of the midday sun, keeps them leafy for longer. In winter, a sunny windowsill or a sheltered spot under cover keeps them growing.' ) .

					$h2( 'Sow' ) .
					$list(
						array(
							'Water the compost first and let it drain.',
							'Scatter the seed thinly over the surface, or sow in short rows, about 1 cm (½ in) deep.',
							'Cover lightly with compost and water gently with a fine rose.',
							'Seedlings can be thinned to about 5 cm (2 in) apart, and the thinnings eaten.',
						)
					) .
					$p( 'You can sow indoors from February, and outdoors through spring and summer. Autumn sowings can stay on a sunny windowsill, or under cover outside, through winter. For a steady supply, sow a small batch every few weeks.' ) .

					$h2( 'Cut and let them grow back' ) .
					$p( 'In summer the first leaves can be ready in about four weeks; in cooler weather it takes around eight. Start when the plants are about 10 cm (4 in) tall. There are two ways to pick:' ) .
					$list(
						array(
							'<strong>Pick the outer leaves</strong> a few at a time, and more grow from the centre.',
							'<strong>Cut the whole pot</strong> with scissors, leaving a stump about 2.5 cm (1 in) high. Keep it watered and new leaves appear within a few weeks.',
						)
					) .
					$p( 'Each sowing usually gives two or three pickings. After that the leaves get tougher: empty the pot onto the compost heap and sow again in fresh compost.' ) .

					$h2( 'Water, and stop them bolting' ) .
					$p( 'Salad leaves have shallow roots and dry out fast in a pot: in summer, check the compost every day and water when the surface feels dry. Hot, dry weather makes many salad plants flower early, which gardeners call bolting, and the leaves turn bitter. Steady watering and a little shade at midday help. Fresh compost holds enough food for a sowing, so feeding is usually not needed.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing too thickly: crowded seedlings are more likely to collapse from damping off. Scatter seed thinly.',
							'Cutting below the growing point: leave a stump of about 2.5 cm so the plants can regrow.',
							'Letting the pot dry out in summer: the plants bolt and turn bitter.',
							'Keeping one pot going for months: sow a fresh batch every few weeks instead.',
						)
					),
			),

			'radishes-in-pots'     => array(
				'title'   => 'How to Grow Radishes in Pots',
				'type'    => 'vegetables',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'balcony', 'patio' ),
				'months'  => array(
					'sow'     => array( 3, 4, 5, 6, 8 ),
					'harvest' => array( 4, 5, 6, 7, 8, 9, 10 ),
				),
				'excerpt' => 'Summer radishes are ready in about four to six weeks, which makes them one of the fastest crops for a pot. Sow a few seeds every few weeks, keep the compost moist, and pull them while they are small and crisp.',
				'facts'   => array(
					'short_name'     => 'Radish',
					'botanical_name' => 'Raphanus sativus',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun; light shade in midsummer',
					'pot_size'       => 'At least 30 cm (1 ft) wide and deep',
					'hardiness'      => 'H3',
					'watering'       => 'Little and often; never let the pot dry out',
					'harvest'        => 'About 4–6 weeks after sowing',
					'season'         => 'Spring, early summer and late summer',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Use a container at least 30 cm (1 ft) wide and deep, filled with peat-free multi-purpose compost.' ),
						array( 'point' => 'Sow 1 cm (½ in) deep and 2.5–5 cm (1–2 in) apart.' ),
						array( 'point' => 'Seedlings appear in 7–10 days; roots are ready in about four to six weeks.' ),
						array( 'point' => 'Keep the compost evenly moist: dry roots fail to swell, uneven watering splits them.' ),
						array( 'point' => 'Avoid sowing in hot, dry weather, when radishes run to seed.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Cherry Belle', 'note' => 'Small, round, red roots with a mild taste. Quick to mature.' ),
						array( 'name' => 'French Breakfast', 'note' => 'Longer, red and white roots, crunchy and mild. Ready in about a month from sowing.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough at least 30 cm wide and deep', 'badge' => '', 'note' => 'Room for a short row or a ring of radishes, with drainage holes.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'Fresh compost for each sowing.', 'url' => '' ),
						array( 'name' => 'Summer radish seed', 'badge' => '', 'note' => 'One packet lasts several sowings.', 'url' => '' ),
						array( 'name' => 'Fine insect mesh', 'badge' => '', 'note' => 'Keeps flea beetles off spring sowings.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why are my radishes all leaves and no root?', 'answer' => 'Most often the compost dried out, so the roots failed to swell, or the plants ran to seed in hot, dry weather. Sow the next batch in spring or late summer, out of the midday sun, and keep the compost moist.' ),
						array( 'question' => 'Why are my radishes woody or very hot?', 'answer' => 'They are probably too old, or grew slowly. Pull radishes when they are about 2.5 cm (1 in) across, and keep sowing small batches rather than one big one.' ),
						array( 'question' => 'What are the tiny holes in the leaves?', 'answer' => 'Flea beetles. They are small black beetles that pepper the leaves with holes, mostly in spring. The damage is usually only cosmetic; fine mesh over the pot keeps them off.' ),
						array( 'question' => 'Can I grow radishes indoors?', 'answer' => 'Radishes want an open, sunny site, so a pot outside on a balcony or patio is the better choice. Indoors, they need your sunniest window.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow radishes', 'url' => 'https://www.rhs.org.uk/vegetables/radishes/grow-your-own' ),
						array( 'title' => 'RHS — Raphanus sativus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/105558/raphanus-sativus/details' ),
						array( 'title' => 'University of Minnesota Extension — Growing radishes', 'url' => 'https://extension.umn.edu/vegetables/growing-radishes' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Choose the pot and the spot' ) .
					$p( 'Radishes need a container at least 30 cm (1 ft) wide and deep, with drainage holes, filled with peat-free multi-purpose compost. A deeper pot holds more water, which matters: radishes in containers dry out easily.' ) .
					$p( 'Give them an open, sunny spot. In midsummer, light shade is fine, and a place out of the midday sun helps stop them running to seed.' ) .

					$h2( 'Sow' ) .
					$list(
						array(
							'Water the compost and let it drain.',
							'Sow the seeds 1 cm (½ in) deep and 2.5–5 cm (1–2 in) apart. At that spacing there is no need to thin.',
							'Cover, water gently, and keep the compost moist. Seedlings appear in 7–10 days.',
						)
					) .
					$p( 'Sow in spring, early summer and late summer. Skip the hottest, driest weeks of summer, when radishes tend to bolt and make no root. Rather than one big sowing, sow a few seeds every few weeks: radishes are best eaten fresh, and they do not keep their crunch if left in the pot.' ) .

					$h2( 'Water little and often' ) .
					$p( 'Watering decides the crop. Roots that go short of water fail to swell, and uneven watering, a dry pot followed by a soaking, makes them split. Check the compost every day in warm weather and water before it dries out.' ) .

					$h2( 'Harvest' ) .
					$p( 'Summer radishes are usually ready about four to six weeks after sowing; early sowings in cool weather take six to eight. Pull them when the roots are about 2.5 cm (1 in) across. Left longer, or grown slowly, they turn pithy, woody and very hot.' ) .

					$h2( 'Pests' ) .
					$p( 'Flea beetles are tiny black beetles that make small holes in the leaves, mostly in spring. The damage is usually cosmetic and does not stop the roots growing. Fine insect mesh over the pot keeps them off. Slugs may also eat young seedlings.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing all the seed at once: sow a few every few weeks for a steady supply.',
							'Letting the pot dry out: the roots stay small or split.',
							'Sowing in a heatwave: the plants run to seed.',
							'Leaving them too long: they become woody and hot. Pull them small.',
						)
					),
			),

			'mint-in-pots'         => array(
				'title'   => 'How to Grow Mint in Pots',
				'type'    => 'herbs',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'windowsill', 'balcony', 'patio' ),
				'months'  => array(
					'plant'   => array( 3, 4, 5, 9, 10 ),
					'harvest' => array( 5, 6, 7, 8, 9, 10 ),
				),
				'excerpt' => 'Mint spreads fast through underground stems, so a pot is the best place for it. Give it moist compost in sun or part shade, pick it often, cut it back after flowering, and divide it every few years to keep it vigorous.',
				'facts'   => array(
					'short_name'     => 'Mint (spearmint)',
					'botanical_name' => 'Mentha spicata',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun or partial shade',
					'hardiness'      => 'H7',
					'watering'       => 'Keep the compost evenly moist',
					'harvest'        => 'Late spring to autumn',
					'season'         => 'Perennial; dies back in winter',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Grow mint in its own pot: its underground stems spread and crowd out other plants.' ),
						array( 'point' => 'Use peat-free multi-purpose or soil-based compost, in sun or part shade.' ),
						array( 'point' => 'Keep the compost evenly moist, and move the pot to shade in hot weather.' ),
						array( 'point' => 'Pick often from late spring to autumn; cut the plant down to 5 cm after flowering.' ),
						array( 'point' => 'Divide and repot every few years, in spring or autumn.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Spearmint (Mentha spicata)', 'note' => 'The classic garden mint for mint sauce, salads and tea. Very hardy.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot with drainage holes, one size up from the root ball', 'badge' => '', 'note' => 'Move up a size at a time: mint dislikes a pot far too big for it.', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'badge' => '', 'note' => 'For potting and for each division.', 'url' => '' ),
						array( 'name' => 'Herb scissors or snips', 'badge' => '', 'note' => 'For regular picking and the summer cut-back.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I plant mint with other herbs in the same pot?', 'answer' => 'It is better on its own. Mint spreads through underground stems and soon takes over a shared pot, crowding out slower herbs such as thyme or parsley.' ),
						array( 'question' => 'Why has my mint died back in winter?', 'answer' => 'That is normal. Mint is a herbaceous perennial: the stems die back in winter and new shoots come up in spring. Cut the old stems down any time from late autumn to spring.' ),
						array( 'question' => 'Can I grow mint indoors in winter?', 'answer' => 'Yes. Bring a pot indoors in autumn and keep it on a sunny windowsill for leaves through winter.' ),
						array( 'question' => 'What are the orange spots on my mint?', 'answer' => 'Probably mint rust, a fungus that makes dusty orange spots on the leaves and stems. No fungicide is approved for use on mint. Remove affected plants, including their underground stems, before the black spores form, and start again with healthy plants in fresh compost.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow mint', 'url' => 'https://www.rhs.org.uk/herbs/mint/grow-your-own' ),
						array( 'title' => 'RHS — Mentha spicata (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/11055/mentha-spicata/details' ),
						array( 'title' => 'RHS — Mint rust', 'url' => 'https://www.rhs.org.uk/disease/mint-rust' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Why mint belongs in a pot' ) .
					$p( 'Mint is one of the easiest herbs to grow, and that is its problem: it spreads through underground stems called rhizomes, and in a bed it soon takes over. In a pot of its own it stays where you put it, close to the kitchen.' ) .

					$h2( 'Pot, compost and position' ) .
					$p( 'Choose a pot with drainage holes and fill it with peat-free multi-purpose or soil-based compost. If you start from a young plant or seedling, a 7.5 cm (3 in) pot will do at first; move it into a larger pot as it fills out, one size at a time. The RHS advises against overpotting mint.' ) .
					$p( 'Mint grows in full sun or partial shade. A balcony or patio that gets sun for part of the day is ideal.' ) .

					$h2( 'Water and pick' ) .
					$p( 'Keep the compost evenly moist. In hot weather, move the pot to a shadier spot so it does not dry out.' ) .
					$p( 'Pick from late spring to autumn. The more you pick, the more the plant produces. Pinch off the shoot tips, which keeps the plant bushy.' ) .

					$h2( 'Cut back after flowering' ) .
					$p( 'When mint has finished flowering, cut the whole plant down to about 5 cm (2 in) from the base. It soon sends up a fresh flush of leaves for picking.' ) .

					$h2( 'Winter' ) .
					$p( 'Spearmint is very hardy: the RHS rates it H7, hardy in the coldest European winters. It dies back in winter and grows again in spring. Cut the old stems down any time from late autumn to spring. For fresh leaves through winter, bring a pot indoors in autumn and keep it on a sunny windowsill.' ) .

					$h2( 'Divide and repot every few years' ) .
					$p( 'In a pot, mint fills the compost with roots and loses vigour after a few years. Divide it in spring or autumn: tip the plant out, break or cut off healthy pieces with roots and shoots, and replant them in fresh compost. Extra pieces make plants to give away.' ) .

					$h2( 'Mint rust' ) .
					$p( 'Mint rust is a fungus that causes dusty orange spots on stems and leaves, from spring to autumn, later turning yellow or black. No fungicide is available for use on mint. Remove affected plants, including their underground stems, before the black spores form, and replant healthy pieces in fresh compost.' ),
			),
		),

		'post'  => array(
			'protect-pots-in-winter' => array(
				'title'   => 'How to Protect Pots and Container Plants in Winter',
				'topic'   => 'seasonal-care',
				'excerpt' => 'Roots in a pot are far more exposed to frost than roots in the ground, and winter rain can waterlog the compost. Raise pots off the ground, group them by a wall, wrap the pots in frosty spells, and bring tender plants indoors.',
				'lists'   => array(
					'products' => array(
						array( 'name' => 'Pot feet', 'note' => 'Lift pots so water drains away and terracotta stays drier.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece', 'note' => 'Covers plants on frosty nights; heavier grades give about 2 °C of protection.', 'url' => '' ),
						array( 'name' => 'Bubble wrap or hessian', 'note' => 'Wraps the pot to keep the roots from freezing.', 'url' => '' ),
						array( 'name' => 'Frost-proof pots', 'note' => 'For plants that stay outside all winter.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do plants in pots need watering in winter?', 'answer' => 'Less often, but sometimes. Evergreens, and plants under cover or in the rain shadow of a wall, can dry out: check them at least weekly. Plants that lose their leaves seldom need water. Avoid watering when frost is forecast.' ),
						array( 'question' => 'Should I feed container plants in winter?', 'answer' => 'No. Feeding is not necessary in the winter months. Start again in spring when growth resumes.' ),
						array( 'question' => 'Is frost-resistant terracotta the same as frost-proof?', 'answer' => 'No. Terracotta is prone to cracking in winter, and the RHS advises choosing pots sold as frost-proof, not just frost-resistant, for anything that stays outside.' ),
						array( 'question' => 'Which plants should come indoors?', 'answer' => 'Tender plants that cannot survive frost: basil, citrus, olives, and tender perennials such as pelargoniums and fuchsias. Move them before the first frost to a frost-free place, which means a night-time minimum of about 4 °C (39 °F).' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Preventing winter damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/preventing-winter-damage' ),
						array( 'title' => 'RHS — Frost damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/frost-damage' ),
						array( 'title' => 'RHS — Growing trees in containers', 'url' => 'https://www.rhs.org.uk/plants/types/trees/container-growing' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						$book,
					),
				),
				'content' =>
					$p( 'Plants that shrug off a frost in the ground can be killed by the same frost in a pot. Their roots sit just a few centimetres from the cold air, on every side, instead of deep in the earth. On a balcony or patio, winter brings two dangers: compost that freezes solid, and compost that stays waterlogged for weeks.' ) .

					$h2( 'Lift pots off the ground' ) .
					$p( 'Waterlogged compost, especially in winter, can rot the roots and kill the plant. Keep the drainage holes clear by standing pots on pot feet or bricks, and remove saucers and trays before winter. Terracotta pots that stay drier are also less likely to crack.' ) .

					$h2( 'Group pots by a wall' ) .
					$p( 'Grouping containers close together near the house wall helps protect their roots from the cold. A wall also casts a rain shadow, which keeps the compost from becoming saturated. On a balcony, move pots back from the railing, out of the wind, where they are sheltered on several sides.' ) .

					$h2( 'Wrap the pots when frost is forecast' ) .
					$p( 'The main danger in winter is the compost freezing. Wrap the pot itself, not just the plant, in bubble wrap, hessian or straw, held in place with twine, and do it at the first sign of frost. Leave the drainage holes clear. Small pots and thin terracotta are most at risk; heavy, thick pots hold up better.' ) .
					$p( 'For the plant on top, horticultural fleece helps on frosty nights: heavier grades give about 2 °C of protection. In very wet spells, move pots under temporary cover until the compost has dried out a little.' ) .

					$h2( 'Bring tender plants indoors' ) .
					$p( 'Some plants cannot survive any frost. Basil needs a frost-free greenhouse, conservatory or sunny windowsill. Citrus and olives should move to a frost-free place, with a night-time minimum of about 4 °C (39 °F). Move tender perennials such as pelargoniums and fuchsias before the first frost.' ) .

					$h2( 'Choose frost-proof pots' ) .
					$p( 'Terracotta is prone to cracking in winter. For anything that stays outside, choose pots sold as frost-proof, not just frost-resistant.' ) .

					$h2( 'Winter care checklist' ) .
					$list(
						array(
							'Pots on feet or bricks, saucers removed.',
							'Pots grouped together, close to a wall and out of the wind.',
							'Bubble wrap, hessian or fleece ready for frosty nights.',
							'Tender plants indoors before the first frost.',
							'Evergreens checked at least weekly for water; no watering when frost is forecast.',
							'No feeding until spring.',
						)
					),
			),
		),
	),
);
