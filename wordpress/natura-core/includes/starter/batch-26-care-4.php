<?php
/**
 * Starter guides, batch 26 (watering, feeding and shelter): eight Plant Care
 * articles on watering in a heat wave, watering seedlings and new plants,
 * telling overwatering from underwatering, reading a fertilizer label,
 * acidic (ericaceous) potting mix, composting on a balcony, cloches and mini
 * greenhouses, and supports for climbing crops. Written for the United
 * States first (American spelling and terms, imperial units first), adapted
 * for the UK.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from the Clemson Home & Garden Information Center fertilizer-label
 * fact sheet and the Iowa State University Extension vermicompost page
 * (checked 19 October 2026), and from Jo Whittingham, Backyard Harvest (DK,
 * 2011), pp. 9, 12–13, 15, 17, 42–43, 88–89, 99, 115, 118–119, 122–123,
 * 189, 243–245; see design/sources/BACKYARD-HARVEST.md. Where the book and
 * the RHS differ, the RHS is followed (for example, the RHS gives
 * strawberries under cloches at least a week ahead, and a compost bin a
 * quarter to a half of green waste). UK-only products and label rules are
 * labeled as such. Routine watering, potting mix and feeding belong to their
 * own posts and are linked, not repeated. Seasons replace the UK month
 * names.
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

$rhs_water_pots = array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' );
$rhs_veg_water  = array( 'title' => 'RHS — Watering vegetables and fruit', 'url' => 'https://www.rhs.org.uk/vegetables/watering' );
$rhs_absorb     = array( 'title' => 'RHS — How plants absorb water', 'url' => 'https://www.rhs.org.uk/advice/understanding-plants/how-plants-absorb-water' );
$rhs_lose       = array( 'title' => 'RHS — How plants lose water', 'url' => 'https://www.rhs.org.uk/advice/understanding-plants/how-plants-lose-water' );
$rhs_sources    = array( 'title' => 'RHS — Collecting, storing and reusing water', 'url' => 'https://www.rhs.org.uk/garden-jobs/water-collecting-storing-and-using' );
$rhs_fert       = array( 'title' => 'RHS — Fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertilisers' );
$rhs_leafmould  = array( 'title' => 'RHS — Leafmould', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/leaf-mould' );

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Watering, feeding and shelter', 'natura-core' ),
	'guides' => array(
		'post' => array(
			'watering-pots-in-a-heat-wave'                => array(
				'image_prompt' => 'A small sunny city balcony in high summer, several pots of tomatoes, zucchini and herbs pulled back from the hot railing into the shade of the wall and grouped together on a large plastic tray, a metal watering can resting beside them, dark freshly watered potting mix, late evening golden light.' . $photo_end,
				'pin_prompt'   => 'A watering can spout pouring water gently onto the potting mix at the base of a tomato plant in a large pot on a shaded balcony, evening light, photographed vertically.' . $pin_end,
				'title'        => 'How to Keep Pots Alive in a Heat Wave',
				'topic'        => 'watering',
				'excerpt'      => 'In a heat wave, check your pots morning and evening, and water slowly at the base of each plant early or late in the day until the potting mix is soaked. Move pots off hot paving into shade, group them together, keep feeding container crops as usual but hold off on pruning, and save stored rainwater for the plants that need it most.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Large plastic tray', 'note' => 'Holds a group of pots together and catches the water that runs through, so you can pour it back.', 'url' => '' ),
						array( 'name' => 'Shade cloth or an old sheet', 'note' => 'Temporary shade for pots that cannot be moved out of the sun.', 'url' => '' ),
						array( 'name' => 'Rain barrel with a lid', 'note' => 'Stored rainwater to fall back on when hose use is restricted (a hosepipe ban in the UK).', 'url' => '' ),
						array( 'name' => 'Fine spray bottle', 'note' => 'For misting runner bean flowers in hot, dry spells.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Should I water pots in the middle of a hot day?', 'answer' => 'Not as a habit. At midday much of the water evaporates before it reaches the roots, so the RHS advises watering early in the morning, or in the evening. The exception is a pot that has dried out and is collapsing: water it at the base straight away rather than wait.' ),
						array( 'question' => 'Can I use dishwater on my vegetable pots during a drought?', 'answer' => 'The RHS suggests keeping gray water for ornamental plants. If you do use it on edibles, keep it to crops that will be cooked, never salad greens, use it within 24 hours, avoid water with bleach, disinfectant or dishwasher salt, and alternate it with rainwater or tap water.' ),
						array( 'question' => 'Should I stop feeding container plants in a heat wave?', 'answer' => 'No. The RHS says most garden plants gain nothing from extra fertilizer in a drought, but container plants still need their regular feed, every other week until early fall. Water first so the feed goes onto moist potting mix, and do not add extra feeds.' ),
						array( 'question' => 'Is it worth moving pots out of the sun?', 'answer' => 'Yes. Pots on hot paving or against a sunny wall dry out fastest, and metal ones heat the potting mix. Moving them into shade, close together, cuts water loss; a sheet or shade cloth helps the ones you cannot move.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — What not to do in a heatwave and drought (Guy Barter)', 'url' => 'https://www.rhs.org.uk/garden-inspiration/get-gardening/what-not-to-do-in-a-heatwave-and-drought' ),
						array( 'title' => 'RHS — Heatwave tips for community gardens', 'url' => 'https://www.rhs.org.uk/get-involved/community-gardening/heatwave-tips' ),
						array( 'title' => 'RHS — How to reduce water use during a heatwave', 'url' => 'https://www.rhs.org.uk/garden-inspiration/conditions/reduce-water-use-during-heatwave' ),
						$rhs_water_pots,
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — Watering', 'url' => 'https://www.rhs.org.uk/garden-jobs/watering' ),
						$rhs_veg_water,
						$rhs_lose,
						$rhs_sources,
						$book,
					),
				),
				'content'      =>
					$p( 'Hot weather speeds up the loss of water through the leaves, and a plant in a pot has only a small volume of potting mix to replace it from. A balcony adds sun and wind on top. The everyday routine is covered in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>; this page is about getting pots through the hot spell itself.' ) .

					$h2( 'Check every pot morning and evening' ) .
					$p( 'In hot weather the RHS suggests checking containers twice a day, and on a balcony plants can need water twice a day or more in summer. Test the potting mix with a fingertip a third of the way into the pot, and water if it is dry at that depth. Small pots, terracotta and anything facing south or west dry out first, so look at those before the rest.' ) .

					$h2( 'Water early or late, and at the base' ) .
					$p( 'Water in the early morning, when less evaporates and the plant has water for the day ahead, or in the evening. In the heat of the day much of it is lost before it reaches the roots. Aim the spout at the potting mix under the leaves: fill the pot to the rim, let it sink in, then fill it once more. A quick splash over the top only wets the surface.' ) .
					$p( 'Keep water off the leaves in bright sun. Droplets sitting on hairy leaves can focus the light and burn small patches; see <a href="/problems/leaf-scorch/">brown, crisp leaves after hot sun or wind</a>.' ) .

					$h2( 'Get pots off hot surfaces and into shade' ) .
					$list(
						array(
							'Move pots off hot paving and away from sunny walls into the shadiest spot you have.',
							'Stand them close together on a tray: grouped pots shade each other and keep the air around them cooler and more humid, and the tray catches the runoff.',
							'Shade pots and hanging baskets that must stay in direct sun with shade cloth or an old sheet.',
							'Watch metal containers, which heat up quickly and bake the potting mix, and unglazed terracotta, which dries fast.',
						)
					) .
					$p( 'Do not leave pots sitting in a full tray for hours after watering: tip the runoff back onto the potting mix or onto another plant. A surface layer of gravel or bark also slows drying; see <a href="/how-to-mulch-pots/">how to mulch pots</a>.' ) .

					$h2( 'Crops that need extra care in the heat' ) .
					$list(
						array(
							'<strong>Tomatoes, eggplants and peppers:</strong> they need steady watering through flowering and fruiting. A pot that dries out and is then soaked can give <a href="/problems/tomatoes-splitting/">split fruit</a> and <a href="/problems/blossom-end-rot/">blossom end rot</a>.',
							'<strong>Zucchini:</strong> the RHS says they need constant moisture right through to harvest.',
							'<strong>Runner beans:</strong> in hot, dry weather the flowers may fail to set pods. Soak the potting mix at the base of the plants and mist the flowers with a fine spray.',
							'<strong>Lettuce and other salad greens:</strong> drought makes them run to seed. In very hot weather, lettuce seed may not germinate at all: sow in the evening into potting mix you have wetted first to cool it, and stand the pot in light shade.',
							'<strong>Strawberries and blueberries:</strong> keep them well watered from flowering until you pick.',
							'<strong>Mediterranean herbs</strong> such as rosemary lose water slowly through narrow leaves, so take care not to overwater them.',
						)
					) .

					$h2( 'Feeding and pruning in hot weather' ) .
					$p( 'Container crops are the exception to the RHS advice not to feed in a drought: keep giving them their usual feed every other week until early fall, always on potting mix you have just watered. Do not add extra feeds, and leave heavy pruning until it is cooler, because both push out soft new growth when the plant is already struggling to take up water. Light jobs such as picking off dead flowers are fine. Routine feeding is in <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a>.' ) .

					$h2( 'Make the water go further' ) .
					$list(
						array(
							'Use stored rainwater first, and clean the rain barrel once it is empty so it is ready for fall rain.',
							'Give water to vegetables, fruit, containers and anything newly planted before tough, established plants.',
							'Dishwater and bath water can go on ornamental pots; on edibles, keep it to crops that will be cooked.',
							'Put spare seedlings and plants that will not come to much on the compost pile rather than keep watering them.',
						)
					) .

					$h2( 'After the heat' ) .
					$p( 'A little wilting in the afternoon is often temporary, and scorched plants usually grow out of it once the weather breaks. If a plant is still limp early in the morning, the potting mix needs checking; <a href="/overwatered-or-underwatered/">overwatered or underwatered?</a> helps you tell which.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Watering at noon, when much of it evaporates.',
							'Sprinkling a little over the leaves instead of soaking the potting mix at the base.',
							'Leaving pots on hot paving or against a sun-baked wall.',
							'Pruning hard or giving extra feeds in the middle of a hot spell.',
							'Using gray water on salad greens.',
						)
					),
			),

			'watering-seedlings-and-new-plants'          => array(
				'image_prompt' => 'A windowsill in spring with a seed tray of small lettuce and tomato seedlings in dark peat-free seed-starting mix, a small watering can with a fine brass rose held just above them releasing a gentle shower, a few young plants in 3½ in (9 cm) pots beside the tray, soft morning light from the window.' . $photo_end,
				'pin_prompt'   => 'A young zucchini plant just planted into a large pot on a balcony, potting mix freshly watered and dark around its stem, a small watering can beside the pot, photographed vertically from slightly above.' . $pin_end,
				'title'        => 'How to Water Seedlings and Newly Planted Pots',
				'topic'        => 'watering',
				'excerpt'      => 'Keep seed-starting mix moist but never soggy, and water it gently with a fine rose, a small can or a mist sprayer, checking under the surface because peat-free mixes can look dry when they are not. Young plants you have just potted up or planted out need a good soak at planting time and close watching for about two weeks, sometimes daily in warm weather.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Small watering can with a fine rose', 'note' => 'A gentle shower that does not wash seed or potting mix about.', 'url' => '' ),
						array( 'name' => 'Mist sprayer', 'note' => 'For surface-sown seed and tiny seedlings, where even a fine rose is too much.', 'url' => '' ),
						array( 'name' => 'Shallow tray', 'note' => 'Lets you lift a whole batch of seedlings to judge its weight.', 'url' => '' ),
						array( 'name' => 'Peat-free seed-starting mix', 'note' => 'Moisten it before you sow.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How can I tell if a seed tray needs water?', 'answer' => 'Lift it. A tray that has dried out feels noticeably lighter than one that is still moist. Peat-free mixes can look dry on top while the mix below is damp, so the weight, or a fingertip pushed just under the surface, is a better guide than the color.' ),
						array( 'question' => 'Why do young plants wilt the day after I move them?', 'answer' => 'Moving a plant disturbs its fine roots and briefly breaks the flow of water into it, so a short wilt and a pause in growth are common. Water the plant well before you move it and again straight after, and keep an eye on it for the next few days.' ),
						array( 'question' => 'How long do new plants need extra watering?', 'answer' => 'Until their roots grow out into the new potting mix. Backyard Harvest suggests keeping young plants well watered for about two weeks after planting, and the RHS notes that young and newly planted plants can need water daily in warm, dry weather.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Using peat-free compost for seeds and cuttings', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/using-peat-free-compost-for-seeds-and-cuttings' ),
						array( 'title' => 'RHS — Watering', 'url' => 'https://www.rhs.org.uk/garden-jobs/watering' ),
						$rhs_veg_water,
						$rhs_water_pots,
						$rhs_absorb,
						$rhs_lose,
						$rhs_sources,
						array( 'title' => 'RHS — Damping off', 'url' => 'https://www.rhs.org.uk/disease/damping-off' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Seedlings and young plants have small roots that cannot go far looking for water, so they suffer first when the potting mix dries out, and they are also the easiest to drown. This page covers the weeks from sowing until a new plant has rooted into its pot. The sowing method itself is in <a href="/how-to-start-seeds-indoors/">how to start seeds indoors</a>.' ) .

					$h2( 'Moisten the mix before you sow' ) .
					$p( 'Water the seed-starting mix before the seed goes in, so it is moist but not soggy. The RHS points out that a saturated mix is colder, which slows germination. If you sow into a trough outside, water the furrow first so there is moisture at the depth where the seed will sit, then keep the surface moist afterwards.' ) .

					$h2( 'Use a gentle flow' ) .
					$p( 'A watering can with a fine rose gives a soft shower that does not dig out the seed. For more control, the RHS suggests a small can or even a mist sprayer, which suits seed sown on the surface. Water lightly and keep the mix at the same level of moisture all the way through germination: never dried out, never sitting wet.' ) .

					$h2( 'Check under the surface' ) .
					$p( 'Peat-free mixes, especially those containing composted bark, often hold water for longer than peat did, and they tend to look dry on top while still moist underneath. That makes them easy to overwater. Feel just below the surface, or lift the tray or pot to judge its weight, before you reach for the can.' ) .
					$p( 'The RHS recommends tap water (mains water) for seedlings in pots and trays, because stored rainwater can carry the organisms that cause collapse; our guide to <a href="/problems/damping-off-seedlings/">damping off</a> covers prevention.' ) .

					$h2( 'Potting on and planting out' ) .
					$list(
						array(
							'Water young plants before you move them, so the root ball is moist.',
							'Handle them gently: fine roots and root hairs tear easily, and damaged ones take up less water.',
							'Firm the potting mix around the root ball, then water well so it settles into close contact with the roots.',
							'Young plants that arrive by mail as plugs should be unpacked, planted and watered as soon as they come.',
						)
					) .
					$p( 'Tender plants raised indoors also need <a href="/how-to-harden-off-seedlings/">hardening off</a> before they go outside for good.' ) .

					$h2( 'The first two weeks' ) .
					$p( 'Newly planted crops are the ones most at risk of drying out until their roots spread into the new potting mix. Backyard Harvest advises keeping them well watered for about two weeks while they settle. The RHS notes that young and newly planted plants can need water every day in warm, dry weather. Look for the first signs of wilting or yellowing leaves and water promptly if you see them, but check the potting mix first: a new plant in a large pot of wet mix needs air at its roots more than another drink.' ) .

					$h2( 'Not every crop wants the same' ) .
					$list(
						array(
							'<strong>Peas and fava beans:</strong> while young, too much water pushes leafy growth and can reduce the crop. Keep them moist rather than wet until they flower.',
							'<strong>Tomatoes and eggplants:</strong> water them in thoroughly to help them establish.',
							'<strong>Lettuce, chard and other leafy crops:</strong> they need water at every stage, starting now.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing into dry seed-starting mix and then flooding the tray.',
							'Watering seed trays with a full-flow spout that washes the seed into a corner.',
							'Judging a peat-free mix by its dry-looking surface.',
							'Planting out without watering the young plant first.',
							'Forgetting new plants during their first warm week.',
						)
					),
			),

			'overwatered-or-underwatered'                => array(
				'image_prompt' => 'Two young basil plants in matching terracotta pots on a balcony table, the left one wilted with dry pale potting mix pulling slightly away from the rim, the right one also drooping but with dark, glistening wet potting mix and water standing in its saucer, soft overcast daylight.' . $photo_end,
				'pin_prompt'   => 'A hand pushing a finger into the potting mix of a drooping pepper plant in a pot on a balcony, the pot lifted slightly on one side, photographed vertically.' . $pin_end,
				'title'        => 'Overwatered or Underwatered? How to Tell What Your Pot Needs',
				'topic'        => 'watering',
				'excerpt'      => 'A wilting plant in a pot can be short of water or standing in too much, because roots in waterlogged potting mix cannot take up water either. Feel the mix a third of the way down and lift the pot before you do anything: dry and light means water it, wet and heavy means let it drain and wait.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Pot feet', 'note' => 'Raise pots off the floor so the drainage holes can empty.', 'url' => '' ),
						array( 'name' => 'Saucers you can empty easily', 'note' => 'Catch runoff in summer; remove them in winter.', 'url' => '' ),
						array( 'name' => 'Watering can with a long spout', 'note' => 'Puts water on the potting mix rather than the leaves.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Why are there drops of water on the edges of my leaves in the morning?', 'answer' => 'That is probably guttation. At night some plants push out excess water through tiny pores at the leaf edges, and the drops look like dew. The RHS notes it is often a sign of overwatering, so check the potting mix before you water again.' ),
						array( 'question' => 'Can a plant wilt even though the potting mix is wet?', 'answer' => 'Yes. In waterlogged potting mix the roots run short of oxygen and stop taking up water, so the plant wilts as if it were dry. Adding more water makes it worse; let the pot drain and dry out a little first.' ),
						array( 'question' => 'Do pots need watering in winter?', 'answer' => 'Rain is often enough in winter, but check evergreen plants in containers during dry, windy spells. Wet potting mix does less harm in cold weather than in summer, when roots need more oxygen, but pots should still drain freely; take saucers away over winter.' ),
					),
					'sources'  => array(
						$rhs_absorb,
						$rhs_lose,
						array( 'title' => 'RHS — Waterlogging and flooding', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/waterlogging-flooding' ),
						$rhs_water_pots,
						$rhs_veg_water,
						array( 'title' => 'RHS — Watering', 'url' => 'https://www.rhs.org.uk/garden-jobs/watering' ),
						array( 'title' => 'RHS — Weather damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/weather-damage' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Drooping leaves usually send us straight for the watering can. Yet a plant in a pot can droop for two opposite reasons, and the RHS notes that houseplants are often killed with kindness when wilting is mistaken for thirst. This page helps you work out which problem you have. The day-to-day routine is in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .

					$h2( 'Why both problems look the same' ) .
					$p( 'In dry potting mix, the column of water that runs from the roots to the leaves is broken, the cells lose their firmness and the plant goes limp. In waterlogged mix, water fills the air spaces, the roots run out of oxygen and stop working, and the water supply to the leaves fails just the same. A waterlogged plant is, in effect, short of water, which is why the symptoms are so easily confused.' ) .

					$h2( 'Check before you water' ) .
					$list(
						array(
							'<strong>Feel the potting mix about a third of the way down the pot.</strong> Dry at that depth means water; damp means wait.',
							'<strong>Lift the pot, or tip it slightly.</strong> After a few goes you will know how a dry pot feels compared with a freshly watered one.',
							'<strong>Look underneath.</strong> A saucer full of water or a blocked drainage hole keeps the bottom of the pot sodden even when the top looks dry.',
							'<strong>Do not trust the surface.</strong> Peat-free potting mix often looks dry on top when it is moist below.',
						)
					) .

					$h2( 'Signs of too little water' ) .
					$list(
						array(
							'Leaves droop and do not pick up overnight; drooping first thing in the morning is a typical sign of drought.',
							'Over weeks: slow, stunted growth, few flowers, small fruit and leaves falling early.',
							'More trouble from pests and powdery mildew, which is more common on plants kept too dry.',
							'Salad greens and other crops prone to bolting run to seed.',
						)
					) .

					$h2( 'Signs of too much water' ) .
					$list(
						array(
							'Potting mix still wet several days after watering, often with a full saucer underneath.',
							'Yellowing, falling leaves, and dead patches along the middle of the leaves.',
							'Roots that are black and rotten when you ease the plant out of its pot.',
							'Droplets along the leaf edges early in the morning (guttation), or water-soaked patches on the leaves that later turn corky (edema). Both usually ease when you water less.',
							'Slugs and snails thrive, and the base of the stems can rot.',
						)
					) .
					$p( 'Cold, wet potting mix in spring also holds young plants back; see <a href="/problems/pale-stunted-plants/">stunted, pale plants in pots</a>.' ) .

					$h2( 'Afternoon drooping that recovers' ) .
					$p( 'On warm, windy days, leaves can lose water faster than the roots can replace it, even from moist potting mix. The plant sags in the afternoon and is upright again by morning, once its leaf pores have closed and the air has cooled. If the mix is damp a third of the way down, this temporary wilting does not need more water; shade and shelter help more. If the plant is still limp in the morning, check again.' ) .

					$h2( 'When the problem is swings between the two' ) .
					$p( 'Letting a pot get very dry and then soaking it causes trouble of its own. Tomatoes swell suddenly and split, and the calcium that travels with the water fails to reach the fruit, so they get <a href="/problems/blossom-end-rot/">blossom end rot</a>; apples get bitter pit for the same reason. Too much water can split carrots. For split tomatoes, see <a href="/problems/tomatoes-splitting/">why tomatoes split</a>.' ) .

					$h2( 'Putting it right' ) .
					$list(
						array(
							'<strong>Too dry:</strong> water slowly at the base until the potting mix is wet right through, filling the pot to the rim and letting it soak in, then repeating. Keep checking daily in warm weather.',
							'<strong>Too wet:</strong> empty the saucer, clear the drainage holes and stand the pot on feet. Wait until the mix is dry a third of the way down before watering again.',
							'<strong>After a waterlogged spell:</strong> the damaged roots make the plant more sensitive to drought, so water it thoroughly in the next dry spell.',
							'<strong>Rotten roots or yellow leaves that stay yellow:</strong> see <a href="/problems/yellow-leaves-container-plants/">yellow leaves on container plants</a> for repotting and the other causes.',
						)
					) .
					$p( 'Summer waterlogging does more harm than winter wet, because roots need more oxygen when they are growing fast.' ),
			),

			'how-to-read-a-fertilizer-label'             => array(
				'image_prompt' => 'Three generic fertilizer containers with plain unbranded labels on a wooden potting bench on a patio, a bottle of liquid fertilizer, a tub of granules and a small bag of pellets, beside a measuring cup and a pot of flowering tomato plants, soft daylight, labels blank or blurred.' . $photo_end,
				'pin_prompt'   => 'A hand holding a plain bottle of liquid plant food with a blurred, unreadable label beside a potted chili pepper plant on a balcony table, photographed vertically.' . $pin_end,
				'title'        => 'How to Read a Fertilizer Label',
				'topic'        => 'soil-feeding',
				'excerpt'      => 'The three numbers on a fertilizer label give its nitrogen, phosphorus and potassium content, always in that order, as percentages by weight. On US labels the second and third numbers are phosphate (P2O5) and potash (K2O), oxide forms rather than the elements; UK packs print the same oxide figures and often add the element figure in brackets, so compare like with like when you weigh up two products.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'All-purpose liquid fertilizer with trace elements', 'note' => 'Look for nitrogen, phosphorus, potassium and a list of trace elements on the label.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid fertilizer', 'note' => 'The potassium (potash) figure is clearly the highest of the three.', 'url' => '' ),
						array( 'name' => 'Measuring cup', 'note' => 'The dose on the label only works if you measure it.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is Growmore a balanced fertilizer?', 'answer' => 'Growmore is a UK product. Its label reads 7:7:7 in oxide terms, but as elements it is 7 percent nitrogen, 3.1 percent phosphorus and 5.8 percent potassium, so the RHS describes it as a high-nitrogen feed rather than a truly balanced one. US labels compare the oxide figures instead: Clemson Extension calls a fertilizer with equal numbers, such as 10-10-10, balanced.' ),
						array( 'question' => 'What does chelated or sequestered iron mean on a label?', 'answer' => 'The iron is bound to another compound that keeps it available to plants across a wider range of pH. Without it, iron is only easily taken up in acid conditions, which is why chelated iron is used for iron shortage on lime-hating plants.' ),
						array( 'question' => 'Is a plant food with no nutrient figures worth buying?', 'answer' => 'Be cautious. In the UK, products sold outside the fertilizer rules can be offered as plant foods without stating what they contain, and the RHS warns they may hold very little nutrient. A label with an N-P-K analysis tells you what you are paying for.' ),
						array( 'question' => 'Does organic on a fertilizer pack mean it is approved for organic growing?', 'answer' => 'Not necessarily. On a fertilizer, organic means it comes from plant or animal material. In organic growing the word means avoiding synthetic inputs, and some mined minerals that are not organic in the first sense are still accepted under most organic guidelines.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Fertiliser labels explained', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertiliser-labels-explained' ),
						$rhs_fert,
						array( 'title' => 'RHS — Nutrition: feeding plants', 'url' => 'https://www.rhs.org.uk/garden-jobs/nutrition-feeding-plants' ),
						array( 'title' => 'RHS — Peat-free compost choices', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/peat-free' ),
						array( 'title' => 'Clemson Home & Garden Information Center — Reading a fertilizer label', 'url' => 'https://hgic.clemson.edu/factsheet/reading-a-fertilizer-label/' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Fertilizer packs can look like a chemistry test, but the label is there to help. In the US, state fertilizer laws require the maker to guarantee the nutrient content printed on it, called the guaranteed analysis; in Great Britain the contents of a label are also set by law. Either way, one pack can be compared fairly with another. This page explains what the numbers and words mean. When and how often to feed is covered in <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a>.' ) .

					$h2( 'What every label has to show' ) .
					$p( 'On a US bag, Clemson Extension lists the fertilizer grade (the three numbers), the guaranteed analysis by weight, the total nitrogen and its sources, which tell you how much of it is slow-release, and any secondary nutrients such as calcium, magnesium and sulfur. A UK label, the RHS says, must show:' ) .
					$list(
						array(
							'A set description of the product, such as "NPK fertilizer".',
							'The content of the three main nutrients: nitrogen (N), phosphorus (P) and potassium (K).',
							'How soluble the phosphorus is.',
							'Any other nutrients present, such as magnesium (Mg), and trace elements.',
							'Any pesticide in the product, as in lawn weed-and-feed, with a legal statement.',
							'An EC declaration, if the product is EC approved.',
						)
					) .

					$h2( 'The three numbers' ) .
					$p( 'The figures always run in the same order: nitrogen, then phosphorus, then potassium. Each is a percentage of the product by weight; the rest of the bag is a carrier that helps you spread it. As a rough guide from the RHS, nitrogen drives leaves and stems, phosphorus supports roots and shoots, and potassium supports flowers, fruit and cold hardiness. A pack reading 0–0–48 contains potassium and nothing else of the three.' ) .

					$h2( 'Oxide figures and element figures' ) .
					$p( 'Here is the part that catches people out. US labels give phosphorus as phosphate (P2O5) and potassium as potash (K2O), and Clemson Extension notes these figures are usually just read as N-P-K. UK labels also give phosphorus and potassium as their oxides (phosphorus pentoxide and potassium oxide), but often add the actual element in brackets afterwards. The element is what feeds the plant. The RHS example is Growmore, a UK feed: its oxide figures read 7:7:7, but its element figures are 7:3.1:5.8, which makes it a high-nitrogen feed rather than the balanced one many people assume.' ) .
					$p( 'When you compare two products, make sure you compare the same kind of figure. Labels for Ireland and the EU give the element values, which the RHS uses because they are the simplest to read, so a figure quoted by the RHS can look lower than the oxide number on a US bag of the same product.' ) .

					$h2( 'Matching the ratio to the crop' ) .
					$list(
						array(
							'<strong>Higher first number:</strong> extra nitrogen for leafy growth. Ammonium sulfate (sulphate of ammonia in the UK, 21–0–0) is an extreme example.',
							'<strong>Higher third number:</strong> extra potassium for flowering and cropping, as in tomato fertilizers and potassium sulfate (sulphate of potash, 0–0–48).',
							'<strong>Three similar numbers:</strong> sold as general-purpose, all-purpose or multipurpose. These are complete fertilizers with all three main nutrients.',
							'<strong>Zeros plus a symbol:</strong> Epsom salts read 0–0–0 plus Mg, a single-nutrient product for magnesium shortage.',
						)
					) .
					$p( 'For pots, that usually means an all-purpose fertilizer for leafy crops and young plants, and a high-potassium one for fruiting crops once they flower. Clemson Extension notes that soilless container mixes, with no mineral soil, benefit from all three nutrients. If the label recommends a particular potting mix to go with it, the RHS says to take that seriously: different mixes hold different balances of nutrients.' ) .

					$h2( 'Other words you will see' ) .
					$list(
						array(
							'<strong>Complete or straight:</strong> a complete (compound) fertilizer contains all three main nutrients; a straight one supplies mainly one, usually to correct a shortage.',
							'<strong>Trace elements (micronutrients):</strong> boron, copper, iron, manganese, molybdenum and zinc, needed in tiny amounts. With a soilless potting mix, a fertilizer that lists them is the better choice.',
							'<strong>Calcium, magnesium and sulfur:</strong> the other three major nutrients, added to many fertilizers.',
							'<strong>Controlled-release:</strong> granules with a porous coat that let fertilizer out into the potting mix as they take up water.',
							'<strong>Slow-release:</strong> on a UK pack, organic products broken down by soil organisms over many months. On a US label, the nitrogen sources show how much is slow-release, often listed as water-insoluble nitrogen.',
							'<strong>Chelated or sequestered:</strong> a micronutrient, usually iron, held in a form that stays available whatever the pH.',
							'<strong>Organic or inorganic:</strong> organic fertilizers come from plants or animals and are usually weaker and slower; inorganic ones are made chemically or mined, and act faster.',
							'<strong>Biostimulant:</strong> a product meant to help plants use nutrients or cope with stress. It does not supply nutrients itself, so it is often sold mixed with a fertilizer.',
						)
					) .

					$h2( 'Liquid, powder or granules' ) .
					$p( 'Liquids and soluble powders diluted in a watering can act quickly, and the RHS rates them best for plants in containers. Powders, pellets and granules are scattered around plants or mixed into the potting mix at planting time. A homemade liquid such as <a href="/diy-projects/make-comfrey-liquid-fertilizer/">comfrey fertilizer</a> has no printed analysis, and its strength varies.' ) .

					$h2( 'What the label cannot tell you' ) .
					$list(
						array(
							'Quality: lumps, how well it dissolves and what it is made from are not covered. Fertilizers sold to gardeners are almost always fine on these points.',
							'Some agricultural fertilizers use potassium chloride, which certain garden plants dislike; garden products rarely do.',
							'Whether the plant can use it: nutrients stay locked up when the potting mix is dry or its pH is extreme, so check the watering first. See <a href="/overwatered-or-underwatered/">overwatered or underwatered?</a>',
						)
					) .

					$h2( 'Follow the dose' ) .
					$p( 'The label also gives the rate, the timing and how to apply the product. Measure it every time and never make it stronger. More fertilizer than the plant can use is wasted, can harm the life in the potting mix, and can wash out and pollute water.' ),
			),

			'acidic-potting-mix-for-pots'                => array(
				'image_prompt' => 'A patio corner with three glazed pots of acid-loving plants grouped beside a green rain barrel: a blueberry bush with blue berries, a low trailing cranberry plant with glossy red berries, and a small pink-flowered heather, the potting mix topped with brown pine-needle mulch, soft late summer light.' . $photo_end,
				'pin_prompt'   => 'A watering can filling from the spigot of a rain barrel next to a potted blueberry bush on a balcony, photographed vertically.' . $pin_end,
				'title'        => 'Acidic Potting Mix: Which Pot Plants Need It and Why',
				'topic'        => 'soil-feeding',
				'excerpt'      => 'Acidic potting mix, sold in the UK as ericaceous compost, is a lime-free mix with a lower pH, made for acid-loving plants. Among edible crops for pots, blueberries and cranberries need it; most vegetables, herbs and other fruit do not, and grow best close to neutral, around pH 6.5.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Peat-free potting mix for acid-loving plants (ericaceous compost in the UK)', 'note' => 'Check that the bag says both that it is for acid-loving plants and that it is peat-free.', 'url' => '' ),
						array( 'name' => 'Liquid fertilizer for acid-loving plants', 'note' => 'Made to go with an acid mix and supply its trace elements.', 'url' => '' ),
						array( 'name' => 'Rain barrel', 'note' => 'Rainwater does not push the pH up as hard tap water does.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I grow vegetables in acidic potting mix?', 'answer' => 'It is not a good idea. Most vegetables and herbs do best at around pH 6.5, where nutrients are most available. In very acid conditions some nutrients wash out more easily and phosphates are locked up below about pH 5.1. Use an ordinary peat-free all-purpose potting mix for them.' ),
						array( 'question' => 'Can I test the mix in my pot with a soil pH kit?', 'answer' => 'The RHS lists home pH tests as suitable for garden soils, not potting mix. For pots, rely on buying the right mix, watering with rainwater and watching the young leaves for yellowing.' ),
						array( 'question' => 'Which other fruit besides blueberries needs an acidic mix?', 'answer' => 'Cranberries. The RHS describes them as needing moist, acidic, lime-free conditions, ideally around pH 4.5, and names \'Pilgrim\' and \'Redstar\' as good varieties for containers.' ),
						array( 'question' => 'Can I water acid-loving pot plants with water from a dehumidifier?', 'answer' => 'For ornamental plants, yes: the RHS says condensed water suits many of them, including plants that need soft water. Rainwater from a covered rain barrel remains the first choice, and for edibles stick to rainwater or tap water.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Soil: understanding pH and testing', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/ph-and-testing-soil' ),
						array( 'title' => 'RHS — Acidifying soil', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/acidifying-soil' ),
						array( 'title' => 'RHS — Peat-free compost choices', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/peat-free' ),
						array( 'title' => 'RHS — Rhododendrons on alkaline soils', 'url' => 'https://www.rhs.org.uk/plants/rhododendron/on-alkaline-soil' ),
						array( 'title' => 'RHS — Fascinating facts: cranberries', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/fascinating-facts-cranberries' ),
						array( 'title' => 'RHS — How to grow hardy heathers', 'url' => 'https://www.rhs.org.uk/plants/types/heathers/growing-guide' ),
						$rhs_sources,
						$rhs_fert,
						$rhs_leafmould,
						$book,
					),
				),
				'content'      =>
					$p( 'Lime-hating, acid-loving plants are called ericaceous by British gardeners: rhododendrons, camellias, heathers and blueberries are the classic examples. A container lets you give these plants the acid root run that many garden soils cannot. This page explains which plants need it and how to keep a pot acid. To choose a bag, see <a href="/gear/best-potting-mix-for-containers/">the best potting mix for pots</a>; for blueberry care in detail, see <a href="/plants/blueberries-in-pots/">blueberries in pots</a>.' ) .

					$h2( 'pH in two minutes' ) .
					$p( 'The pH scale runs from 0 to 14. Seven is neutral, anything lower is acid and anything higher is alkaline, or limy. The RHS calls pH 6.5, slightly acid, the best general-purpose level: nutrients are most available there and a wide range of plants thrive, lime-haters excepted. Fruit and vegetables cope with most levels short of the extremes.' ) .

					$h2( 'Why lime-haters struggle in ordinary potting mix' ) .
					$p( 'As conditions become more alkaline, iron and manganese become harder for roots to take up. Acid-loving plants are the first to suffer: their young leaves turn yellow between green veins, a condition called lime-induced chlorosis. If you see that pattern, our guide to <a href="/problems/yellow-between-the-veins/">yellowing between the veins</a> explains how to confirm and treat it.' ) .

					$h2( 'Which pot plants need it' ) .
					$list(
						array(
							'<strong>Blueberries:</strong> the main edible crop that needs it, with an ideal pH of 4.5 to 5.5.',
							'<strong>Cranberries:</strong> a moist, acid, lime-free mix, ideally around pH 4.5. The RHS names \'Pilgrim\' and \'Redstar\' as good for containers.',
							'<strong>Ornamental lime-haters:</strong> camellias, smaller rhododendrons and azaleas, Pieris and most heathers. Rhododendrons grow best between pH 4.5 and 6.0.',
						)
					) .
					$p( 'Everything else you are likely to grow on a balcony, from tomatoes and herbs to strawberries, currants and fruit trees, grows in an ordinary peat-free potting mix; each plant guide names the right one.' ) .

					$h2( 'Choose a peat-free mix' ) .
					$p( 'Peat used to be the standard way of making a potting mix acid, and the RHS no longer recommends it. The range of peat-free acid mixes is smaller than for all-purpose ones, but good ones exist, and with a fertilizer for acid-loving plants they supply all the nutrients and trace elements these plants need. Look for both on the bag: for acid-loving plants, and peat-free.' ) .

					$h2( 'Water with rainwater' ) .
					$p( 'Rainwater is naturally soft and low in minerals, with the right pH for acid-lovers. Tap water carries minerals, especially in hard-water areas, and used week after week it gradually raises the pH of the potting mix. Keep a rain barrel, and use tap water only as a backup in a drought. Some other options:' ) .
					$list(
						array(
							'<strong>Softened water:</strong> fine for a short while, but sodium builds up over time, so the RHS does not recommend it long term.',
							'<strong>Boiled tap water:</strong> loses some calcium, but not enough to suit plants that need soft water.',
							'<strong>Water from a dehumidifier:</strong> suits ornamental acid-lovers.',
						)
					) .

					$h2( 'Do not try to acidify ordinary potting mix' ) .
					$p( 'Sulfur and other acidifying products are sold for garden soil, and the RHS lists them as unsuitable for potting mix; home pH kits are likewise designed for soil. In a pot, start with an acidic mix instead. Even then the pH creeps up over time with the water you add, so refresh or replace the mix every few years as part of <a href="/how-to-repot-container-plants/">repotting</a>.' ) .

					$h2( 'Mulch and feed to match' ) .
					$p( 'Pine needles rot down into an acid leaf mold that the RHS recommends for mulching acid-loving plants; collect them in a separate bag from other leaves. For feeding, choose a liquid fertilizer for acid-loving plants, or one containing chelated (sequestered) iron, which stays available whatever the pH. When and how often to feed is in <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting a blueberry or camellia in ordinary all-purpose potting mix.',
							'Assuming every acidic mix is peat-free.',
							'Watering acid-lovers with hard tap water all summer.',
							'Adding sulfur or other soil acidifiers to a pot.',
							'Using an acidic mix for vegetables and herbs that prefer near-neutral conditions.',
						)
					),
			),

			'composting-on-a-balcony'                    => array(
				'image_prompt' => 'A tidy shaded corner of a small balcony with a compact stacking worm bin of three plastic trays on short legs, a sealed bokashi bucket with a spigot beside it, a small bowl of vegetable peelings and eggshells on top, potted herbs nearby, soft overcast daylight.' . $photo_end,
				'pin_prompt'   => 'Hands lifting the top tray of a worm bin on a balcony to show dark crumbly worm compost, a pot of chard in the background, photographed vertically.' . $pin_end,
				'title'        => 'Can You Make Compost on a Balcony?',
				'topic'        => 'soil-feeding',
				'excerpt'      => 'Yes, on a small scale. A worm bin turns vegetable peelings into rich compost and a liquid fertilizer, and a sealed bokashi bin ferments almost any food waste, cooked food included, though its contents need finishing in a compost bin or the ground; a small bin works too if you mix soft green waste with dry brown material.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Stacking worm bin with a liquid sump', 'note' => 'Compost forms in the trays and the liquid drains to the bottom.', 'url' => '' ),
						array( 'name' => 'Composting worms (red wigglers; brandling or tiger worms in the UK)', 'note' => 'Garden earthworms will not do the job.', 'url' => '' ),
						array( 'name' => 'Bokashi kit: two airtight buckets with spigots, plus bran', 'note' => 'Two buckets let one ferment while you fill the other.', 'url' => '' ),
						array( 'name' => 'Compact lidded compost bin', 'note' => 'For brown waste and bokashi pre-compost, if you have room.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will a worm bin smell on a balcony?', 'answer' => 'A worm bin that is looked after should not, but the RHS warns that a neglected one can, and small flies are common. Smells usually mean too much food or too much wet: drain the liquid, add shredded paper or cardboard, and stop feeding until the worms catch up. Iowa State University Extension suggests burying food under the bedding to keep fruit flies and smells down.' ),
						array( 'question' => 'What should not go into a bokashi bin?', 'answer' => 'Almost all food waste can go in, including cooked food, bread and meat. Avoid a lot of liquid, oil or grease, moldy or rotten food, and large bones, which take a long time to break down.' ),
						array( 'question' => 'Do I need a compost accelerator?', 'answer' => 'No. The RHS says a good balance of green and brown material and some air are enough; accelerators and added lime are not needed.' ),
						array( 'question' => 'Can I compost diseased plants from my pots?', 'answer' => 'Backyard Harvest advises against it, along with perennial weeds and cooked food in an ordinary compost bin. Put diseased plants out with the household trash instead.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Composting', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/composting' ),
						array( 'title' => 'RHS — Worm composting', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/worm-composting' ),
						array( 'title' => 'RHS — How to recycle food waste with bokashi', 'url' => 'https://www.rhs.org.uk/garden-inspiration/get-gardening/bokashi' ),
						array( 'title' => 'RHS — How to stop throwing away food waste, with or without a garden', 'url' => 'https://www.rhs.org.uk/garden-inspiration/get-gardening/recycling-food-composting' ),
						array( 'title' => 'Iowa State University Extension — How to create and use vermicompost', 'url' => 'https://yardandgarden.extension.iastate.edu/how-to/how-create-and-use-vermicompost' ),
						$rhs_leafmould,
						$book,
					),
				),
				'content'      =>
					$p( 'Compost, the homemade kind, is different from the bagged potting mix your plants grow in; that is covered in <a href="/potting-mix-for-containers/">potting mix for containers</a>. The RHS notes that only in the very smallest spaces is a compost bin hard to fit or fill, and suggests worm composting there instead. On a balcony you have three options, and many people combine two of them.' ) .

					$h2( 'Choose a method' ) .
					$list(
						array(
							'<strong>Worm bin:</strong> turns raw kitchen scraps and a little soft plant waste into compost and a liquid fertilizer. It needs some care and has a start-up cost, and it is not a full replacement for a compost bin.',
							'<strong>Bokashi bin:</strong> ferments almost all food waste in a sealed bucket with very little smell, so it can sit indoors. The result is not finished compost and must go into a bin or the ground.',
							'<strong>Small compost bin:</strong> cheap to run, but slower in small sizes and needs a balance of materials.',
						)
					) .

					$h2( 'Running a worm bin' ) .
					$p( 'Composting worms, sold as red wigglers (Eisenia fetida) in the US and as brandling, red or tiger worms in the UK, are smaller and darker than garden earthworms, which are no use here. The RHS says they work best between 64 and 77 °F (18–25 °C) and slow down below 50 °F (10 °C) and above 86 °F (30 °C); Iowa State University Extension gives 55–77 °F (13–25 °C), with 65–70 °F (18–21 °C) ideal. On a balcony, that means a sheltered spot out of the summer sun and the worst of the winter cold.' ) .
					$list(
						array(
							'Start with a 3 in (8 cm) layer of moist bedding, such as old potting mix, shredded paper or the coir supplied, then no more than 3–4 in (8–10 cm) of scraps. Leave it for a week while the worms settle.',
							'Add small amounts often, chopped up. Stop for a few days if the last lot is not being eaten.',
							'Raw vegetables and fruit, tea bags, coffee grounds, eggshells and a little bread are fine. Keep onions, garlic and citrus peel to small amounts; Iowa State University Extension suggests leaving onion, garlic, peppers and citrus out altogether.',
							'Leave out meat, fish, bones, dairy and fat, which attract pests and flies.',
							'Drain the liquid regularly and dilute it one part to ten parts water before using it as a fertilizer.',
						)
					) .
					$p( 'A full worm bin takes about 8 to 12 months. With stacking trays, the worms move up and you take the finished compost from the bottom tray. An established worm bin can be left without food for up to four weeks while you are away, but drain it first so it does not become waterlogged.' ) .

					$h2( 'Using a bokashi bin' ) .
					$p( 'Bokashi pickles food waste with bran that carries fermenting bacteria. Sprinkle bran in the empty bucket, add food in layers of 1½ in (3–4 cm), each with a handful of bran, and press it down to squeeze out air. Keep the lid shut and the bucket out of direct sun, and drain the liquid, called bokashi tea, every couple of days. Diluted one to ten, it can feed plants.' ) .
					$p( 'When the bucket is full, leave it for about two weeks while you fill the second one. It should smell sharp and slightly sweet, like vinegar; black or green mold means it is rotting rather than fermenting. The fermented waste is still acidic, so it is not ready to plant into: it breaks down quickly in a compost bin, or, if you have a bed below, can be buried and left two weeks before planting on top.' ) .

					$h2( 'A small compost bin' ) .
					$p( 'If you have a shady corner, a compact bin can take plant waste from your pots, peelings, and shredded paper and cardboard. Balance it: the RHS suggests a quarter to a half soft green material and the rest dry, chopped brown material. A slimy, smelly bin has too much green and too little air, so add brown waste and keep the rain off; a dry, fibrous one needs water and more green waste. On a hard floor, add a few shovelfuls of garden soil to start it off. Small bins are slower than big ones and can take six months to two years.' ) .
					$p( 'Wet compost and full bins are heavy, so think about weight on a balcony; see <a href="/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a>.' ) .

					$h2( 'Leaf mold in a bag' ) .
					$p( 'Fallen leaves make leaf mold with no bin at all. Fill a trash bag with leaves, wet them if they are dry, pierce the bag with holes, tie it loosely and stack it out of the way. Most leaves take about two years. Gather them from quiet streets rather than main roads, and pick out any litter. Pine needles kept in a separate bag give an acid leaf mold for <a href="/acidic-potting-mix-for-pots/">acid-loving plants</a>.' ) .

					$h2( 'Using what you make' ) .
					$list(
						array(
							'Worm compost is rich in nitrogen and potassium: use it as a top dressing for pots.',
							'Compost and young leaf mold make a mulch on top of the potting mix in large pots.',
							'Leaf mold more than two years old can go into homemade seed-starting or potting mixes.',
							'Diluted worm bin liquid and bokashi tea are fertilizers of variable strength; for the routine, see <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a>.',
							'Cleaned seafood and nut shells, which do not rot, make a decorative mulch for containers.',
						)
					),
			),

			'cloches-and-mini-greenhouses-on-a-balcony'  => array(
				'image_prompt' => 'A sheltered balcony against a brick wall in early spring, a tall clear plastic mini greenhouse with its front panel rolled up over a grow bag of young tomato plants, and beside it a trough of lettuce seedlings under a clear bell cloche and a cut-down plastic bottle over a single zucchini seedling, bright morning light.' . $photo_end,
				'pin_prompt'   => 'A clear plastic bell cloche raised on one side over a young strawberry plant in a pot on a balcony floor, photographed vertically.' . $pin_end,
				'title'        => 'How to Use Cloches and Mini Greenhouses on a Balcony',
				'topic'        => 'light-position',
				'excerpt'      => 'Cloches cover a single pot or a short trough, and mini greenhouses are tall, shelved covers that shelter taller tender crops such as tomatoes in a grow bag. Both warm the potting mix, keep off wind and rain and give earlier crops, as long as you anchor them, open them on sunny days, close them at night and water underneath yourself.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Rigid clear plastic bell cloche with a vent', 'note' => 'Covers one plant or a small pot; the vent lets out heat.', 'url' => '' ),
						array( 'name' => 'Tall plastic mini greenhouse', 'note' => 'Fits over a grow bag of tomatoes. Anchor it to the wall.', 'url' => '' ),
						array( 'name' => 'Wire hoops and row cover', 'note' => 'A low tunnel over a trough of salad greens.', 'url' => '' ),
						array( 'name' => 'Pegs, ties or weights', 'note' => 'Light covers must be fixed down against gusts.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How much earlier will strawberries crop under a cloche?', 'answer' => 'The RHS says cloches should give fruit at least a week ahead of uncovered plants, and an unheated greenhouse about two weeks. Open the cover on warm, still days so insects can reach the flowers.' ),
						array( 'question' => 'Do plants under a cloche need watering?', 'answer' => 'Yes. The cover keeps the rain off, so plants under it depend on you, and in a pot there is no surrounding soil for water to seep in from. Lift the cloche and water the potting mix directly.' ),
						array( 'question' => 'Can I grow a tomato in a mini greenhouse on a balcony?', 'answer' => 'Yes. Tall models are made to cover a grow bag of tomatoes and add warmth for quicker ripening. Put it in a sunny, sheltered spot against a wall, anchor it firmly, and open the front on warm days.' ),
						array( 'question' => 'Why did my seedlings wilt under a cloche on a sunny day?', 'answer' => 'They probably overheated. Closed covers heat up fast in sun. Open or lift them on sunny days and put them back in the evening.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						array( 'title' => 'RHS — Coldframes and mini-greenhouses', 'url' => 'https://www.rhs.org.uk/garden-features/coldframes-and-mini-greenhouses' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — Fleece and crop covers', 'url' => 'https://www.rhs.org.uk/prevention-protection/fleece-and-crop-covers' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Cloches and mini greenhouses do the job of a greenhouse in miniature, and they fit on a balcony where a greenhouse never could. Used well, they lengthen the season at both ends. To build your own low frame, see <a href="/diy-projects/make-a-mini-cold-frame/">make a mini cold frame for a balcony</a>; this page covers choosing covers and living with them.' ) .

					$h2( 'Which cover does what' ) .
					$list(
						array(
							'<strong>Bell cloche:</strong> a dome of rigid plastic or glass over one plant or a small cluster. If it has no vent holes, raise one side slightly.',
							'<strong>Plastic bottle:</strong> a cut-down bottle covers one seedling for free, but it must be well anchored, suffers from condensation and should come off quickly once the plant grows.',
							'<strong>Tunnel cloche:</strong> row cover, plastic film or mesh stretched over wire hoops, long enough to cover a trough.',
							'<strong>Cold frame:</strong> a low box with a sloping clear lid, good for trays of seedlings.',
							'<strong>Mini greenhouse:</strong> an upright cover with shelves and an opening on one side. It takes taller plants than a frame, but the shelves shade what is below, and many have no way of adjusting the ventilation, so the temperature swings.',
						)
					) .

					$h2( 'What they are good for' ) .
					$list(
						array(
							'<strong>Warming the potting mix:</strong> a cloche can raise the soil temperature underneath by up to 18 °F (10 °C). Put it in place at least a week before sowing or planting.',
							'<strong>A longer season:</strong> warmer conditions can add three to four weeks at either end of the cropping season.',
							'<strong>Hardening off</strong> young plants; see <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>.',
							'<strong>Shelter:</strong> covers keep off wind, hail and heavy rain. Out of the wind, salad greens, spinach and other leafy crops grow faster and softer.',
							'<strong>Some protection from pests and disease:</strong> cloches stop birds, though row cover or insect mesh are better against insects. Well-ventilated covers keep leaves dry, which reduces airborne diseases such as tomato blight.',
							'<strong>Fall and winter:</strong> salad greens and chard keep cropping for longer under cover, and late bush tomatoes and chili peppers are buffered against the first light frosts.',
						)
					) .

					$h2( 'A mini greenhouse for tender crops' ) .
					$p( 'From late spring, a mini greenhouse gives tomatoes, eggplants and chili peppers extra warmth, which speeds ripening and can enlarge the crop. Tall models fit over a grow bag of tomatoes. Stand it against a wall: with a large surface and a small volume of air inside, a mini greenhouse exposed on every side heats and cools unevenly, and the wall evens this out. Keep tall plants on the floor and use the shelves for small pots that can cope with some shade.' ) .

					$h2( 'Open by day, close at night' ) .
					$p( 'Plants hidden under covers are easy to forget. On sunny days, open or lift the covers so the plants do not overheat; close them again in the evening while nights are still cold. Strawberries, zucchini and other crops pollinated by insects need the covers open on warm, still days, or the fruit may not set. Check for weeds and pests whenever you open them.' ) .

					$h2( 'Water them yourself' ) .
					$p( 'Covers keep the rain off. A cloche in open ground can rely on some water soaking in from the sides, but a pot cannot, so lift the cover and water the potting mix under it. Ventilation also matters here: still, damp air under a closed cover encourages fungal diseases such as gray mold.' ) .

					$h2( 'Fix everything down' ) .
					$p( 'Lightweight frames and plastic covers are cheap and easy to move, which is exactly why the wind takes them. Peg or weight plastic cloches, and anchor a mini greenhouse firmly to something solid. The balcony safety checks for frames, including rigid plastic rather than glass, are in the <a href="/diy-projects/make-a-mini-cold-frame/">mini cold frame project</a>.' ) .

					$h2( 'What covers cannot do' ) .
					$p( 'Cloches, frames and mini greenhouses protect against mild frosts only. Heavier grades of row cover (frost cloth) add about 4 °F (2 °C) of frost protection. For a hard winter, see <a href="/protect-pots-in-winter/">how to protect pots in winter</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving covers closed on a sunny morning.',
							'Forgetting to water plants that no longer get rain.',
							'Standing a mini greenhouse in the open, away from a wall, without anchoring it.',
							'Keeping strawberries covered all day while they flower.',
							'Expecting a cloche to save tender plants in a hard frost.',
						)
					),
			),

			'supports-for-climbing-crops'                => array(
				'image_prompt' => 'A sunny balcony against a pale wall with three large pots of climbing crops on their supports: peas with curling tendrils clinging to green netting, pole beans twining up a tepee of bamboo stakes, and a tall single-stem tomato tied loosely with soft jute twine to a single tall stake, summer daylight.' . $photo_end,
				'pin_prompt'   => 'Close view of a pea tendril curled tightly around a strand of garden netting next to a pot on a balcony, photographed vertically.' . $pin_end,
				'title'        => 'Which Support for Which Climbing Crop in a Pot',
				'topic'        => 'light-position',
				'excerpt'      => 'Match the support to the way the crop climbs: peas and cucumbers hold on with tendrils, so give them netting or twiggy sticks; pole beans twist their stems, so they want smooth stakes; tomatoes cannot hold on at all, so tie them to a stake or wind them up a string. Put the support in at planting time and make it strong enough for the full crop and the wind.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Bamboo stakes, 8 ft (2.5 m)', 'note' => 'For pole beans, tall single-stem tomatoes and cucumber tepees.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused garden netting', 'note' => 'Gives tendrils plenty to grip.', 'url' => '' ),
						array( 'name' => 'Natural-fiber garden twine', 'note' => 'Jute, hemp or cotton; it lasts one to three years and can be composted.', 'url' => '' ),
						array( 'name' => 'Twiggy prunings', 'note' => 'Free supports for shorter peas and bush beans.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do dwarf peas need any support in a pot?', 'answer' => 'Only a little. The RHS says dwarf varieties need little or no support and shorter ones manage with a few twiggy sticks. Once they get going, the plants cling to each other and largely hold themselves up.' ),
						array( 'question' => 'Can pole beans grow up netting?', 'answer' => 'Yes. The RHS lists netting and trellis as well as canes (stakes). Beans climb by twisting their stems, so they grip a smooth upright support best, and young plants may need tying in to get started.' ),
						array( 'question' => 'What should I tie tomatoes with?', 'answer' => 'Soft garden twine or strips of fabric, tied loosely so the stem has room to thicken. Avoid wire, which cuts into stems as they grow.' ),
						array( 'question' => 'Can cucumbers share a tepee with beans?', 'answer' => 'They can. Backyard Harvest suggests outdoor cucumbers can scramble over a tepee of stakes too, and the RHS lists a wigwam of tall canes among the supports for outdoor cucumbers. Use a large container and tie the stems in at first.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to tie in climbers', 'url' => 'https://www.rhs.org.uk/plants/types/climbers/how-to-tie-in-climbers' ),
						array( 'title' => 'RHS — Creative veg supports (Katherine Liu)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/creative-veg-supports' ),
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow runner beans', 'url' => 'https://www.rhs.org.uk/vegetables/runner-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow squashes', 'url' => 'https://www.rhs.org.uk/vegetables/squash/grow-your-own' ),
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Growing upward gives a big crop from a small patch of floor, which is why climbers suit a balcony. The trick is matching the support to the plant, because crops climb in quite different ways. Building a stake tepee step by step is covered in <a href="/diy-projects/make-a-bean-tepee-in-a-pot/">make a bean tepee in a pot</a>.' ) .

					$h2( 'Three ways crops climb' ) .
					$list(
						array(
							'<strong>Tendrils</strong> (peas, cucumbers, squashes): thin curling threads that wrap around anything narrow. They need lots of small things to grab, such as netting or branched sticks.',
							'<strong>Twining stems</strong> (pole beans and runner beans): the whole stem spirals around the support. A smooth upright stake or pole suits them best.',
							'<strong>No grip at all</strong> (tomatoes): the stems cannot hold on, so you attach them by hand as they grow.',
						)
					) .

					$h2( 'Peas: netting or twiggy sticks' ) .
					$p( 'Dwarf peas need little or no support, and shorter varieties manage with a few twiggy sticks pushed into the pot. Taller varieties need netting or chicken wire fixed to stakes or posts. Some reach 6 ft (1.8 m) and become top-heavy, so the support must be tall and sturdy, especially in a windy spot. Pea tendrils look delicate but hold on very firmly. For pot sizes and varieties, see <a href="/plants/peas-in-pots/">peas in pots</a>.' ) .

					$h2( 'Pole beans: smooth stakes' ) .
					$p( 'Pole beans and runner beans need tall supports, about 8 ft (2.5 m) bamboo stakes or hazel poles, put in before you sow or plant. A tepee of five or more stakes tied at the top suits a large container. Tie each young plant loosely to its stake to start it off, especially if wind or rain knocks it about; after that it will twist upward on its own. When the beans reach the top, pinch out the tips. Bush beans need only short twiggy sticks between the plants to keep them upright and lift the pods. See <a href="/plants/green-beans-in-pots/">green beans</a> and <a href="/plants/runner-beans-in-pots/">runner beans</a> in pots.' ) .

					$h2( 'Tomatoes: a stake or a string' ) .
					$p( 'Tall single-stem tomatoes (indeterminate types, grown as cordons) need a tall, sturdy stake, or a vertical string tied to something overhead and anchored under the root ball when you plant. Tie the main stem to the stake at regular intervals, loosely enough for it to thicken, or wind the string gently around the top of the stem as it grows. Bush (determinate) tomatoes usually stand on their own, but add short stakes if heavy fruit clusters start to droop. Trailing types in hanging baskets need nothing. The rest of the routine is in <a href="/plants/cherry-tomato/">how to grow cherry tomatoes</a>.' ) .

					$h2( 'Cucumbers and squashes: netting, tepees or trellis' ) .
					$p( 'Outdoor cucumbers climb a tepee of tall stakes, stout netting held up by posts, or a trellis or wires on a wall. Put the support in at planting so the tendrils have something to catch, and tie the stems in at first. Trailing squashes can be trained up a strong trellis or tepee too, but the fruit is heavy: choose small-fruited varieties and cradle each fruit in a netting or burlap sling. Some zucchini are sold as climbing varieties for stakes or wires. See <a href="/plants/cucumbers-in-pots/">cucumbers in pots</a> and <a href="/plants/zucchini-in-pots/">zucchini in pots</a>.' ) .

					$h2( 'Tying in without damage' ) .
					$list(
						array(
							'Use soft natural-fiber twine for annual crops, or strips of fabric for heavier stems. Never wire, which cuts in as stems thicken.',
							'A simple double knot is fine for light, soft growth. For heavy stems and windy spots, use a figure eight: loop around the stem, cross the ends, loop around the support and knot, so the stem cannot rub.',
							'Place each tie just above a leaf or side shoot so it cannot slide down.',
							'Check ties now and then and loosen any that are biting in.',
						)
					) .

					$h2( 'Make it strong enough for a balcony' ) .
					$p( 'A support covered in leaves and fruit carries a lot of weight and catches the wind like a sail. Tie tepees firmly where the stakes cross and again lower down so they cannot splay. Put supports in before or at planting, so you do not damage roots later. Reused materials work well: old netting, prunings, even a child\'s outgrown play structure. Where to put tall pots out of the wind is covered in <a href="/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Giving peas a bare stake with nothing for their tendrils to grip.',
							'Waiting until plants flop over before adding the support.',
							'Tying tomato stems tightly, or with wire.',
							'Choosing a support too short or flimsy for the variety\'s full height.',
							'Leaving young beans to blow about instead of guiding them onto their stakes.',
						)
					) .
					$p( 'To build one, follow our step-by-step projects: <a href="/diy-projects/make-a-pea-netting-support/">pea netting</a>, <a href="/diy-projects/make-a-string-support-for-tomatoes/">strings for tomatoes</a> and <a href="/diy-projects/fix-a-wire-trellis-to-a-wall/">a wire trellis on a wall</a>. To compare stakes, nets and ties before you buy, see <a href="/gear/best-plant-supports-for-pots/">our guide to plant supports</a>.' ),
			),
		),
	),
);
