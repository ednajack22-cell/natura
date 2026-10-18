<?php
/**
 * Starter guides, batch 21 (more balcony projects): four DIY projects
 * adapted from sources: a herb window box, comfrey liquid feed, wrapping
 * pots for winter and a raised strawberry planter.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the two differ, the RHS is
 * followed. Months are for a temperate climate such as the UK.
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
	'name'   => __( 'More balcony projects', 'natura-core' ),
	'guides' => array(
		'project' => array(
			'plant-a-herb-window-box'     => array(
				'image_prompt' => 'A long terracotta-coloured window box fixed with black metal brackets below a kitchen window on a sunny brick wall, planted with low grey-green sage, tiny-leaved thyme, upright needle-leaved rosemary and round-leaved oregano, a thin layer of pale gravel on the compost, late spring morning light.' . $photo_end,
				'pin_prompt'   => 'A herb window box seen from inside an open kitchen window, with thyme, sage, oregano and a young rosemary growing in gritty compost and a pair of kitchen scissors on the sill, photographed vertically.' . $pin_end,
				'title'        => 'Plant a Herb Window Box',
				'category'     => array( 'planters' ),
				'plants'       => array( 'thyme-in-pots', 'sage-in-pots', 'rosemary-in-pots', 'oregano-in-pots' ),
				'excerpt'      => 'Fill a box at least 20 cm deep with gritty peat-free compost and plant thyme, sage, rosemary and oregano together, because they all like sun and sharp drainage. Fix the box firmly before you fill it: wet compost is heavy, and nothing should be able to fall or drip on the people below.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About an hour, plus fixing the brackets',
					'cost'           => 'Low',
					'size'           => 'One box, at least 20 cm (8 in) deep',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'A box of damp compost and plants weighs far more than the empty box. Use brackets or restraints rated for that load, fixed into solid masonry, and check them every spring.' ),
						array( 'point' => 'On a balcony, keep the box on the inside of the railing. A box hung outside it, or resting loose on an outer sill, can be blown or knocked off.' ),
						array( 'point' => 'Water drains out of the holes in the base. Make sure it cannot run onto a neighbour\'s window, a balcony below or the pavement.' ),
						array( 'point' => 'Balconies often carry strict weight limits. Ask the building manager before adding heavy planters, and keep them close to the wall.' ),
					),
					'materials' => array(
						array( 'name' => 'Window box with drainage holes, at least 20 cm (8 in) deep', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Window box brackets or a restraint bar, with fixings for masonry', 'quantity' => '1 set', 'url' => '' ),
						array( 'name' => 'Peat-free loam-based compost', 'quantity' => 'Enough to fill the box', 'url' => '' ),
						array( 'name' => 'Coarse grit', 'quantity' => 'Up to a quarter of the compost volume', 'url' => '' ),
						array( 'name' => 'Young herb plants: thyme, sage, rosemary, oregano or marjoram', 'quantity' => 'One for every 15–20 cm (6–8 in) of box', 'url' => '' ),
						array( 'name' => 'Gravel for the surface (optional)', 'quantity' => 'A thin layer', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Drill, masonry bit and spirit level', 'url' => '' ),
						array( 'name' => 'Bucket or trug for mixing compost', 'url' => '' ),
						array( 'name' => 'Trowel', 'url' => '' ),
						array( 'name' => 'Watering can with a rose', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Fix the box first', 'text' => 'Screw the brackets or restraint into solid wall, level, and set the empty box in place. Check it cannot slide or tip before any compost goes in.', 'tip' => 'Lifting a full box onto brackets is heavy and risky; fill it where it will stay.' ),
						array( 'title' => 'Mix a gritty compost', 'text' => 'Herbs from hot, dry hillsides hate wet roots. Mix coarse grit into peat-free loam-based compost, up to a quarter of the volume.', 'tip' => 'Locally sourced grit has a smaller environmental cost than perlite.' ),
						array( 'title' => 'Part-fill and arrange', 'text' => 'Fill the box part of the way. Stand the herbs, still in their pots, along it about 15–20 cm (6–8 in) apart,', 'tip' => '' ),
						array( 'title' => 'Plant at the right height', 'text' => 'Knock each plant out of its pot and set it so the top of its root ball sits about 2.5 cm (1 in) below the rim. That gap leaves room to water.', 'tip' => '' ),
						array( 'title' => 'Fill, firm and water', 'text' => 'Fill round the roots with the gritty mix, firm it gently with your fingers and water thoroughly.', 'tip' => 'Watch where the first water drains, and move a drip tray or the box if it lands somewhere it should not.' ),
						array( 'title' => 'Top with gravel (optional)', 'text' => 'A thin layer of gravel on the surface helps hold in moisture and keeps the leaves clean of splashed compost.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Which herbs can share one window box?', 'answer' => 'Thyme, sage, rosemary, oregano or marjoram, and winter savory all like the same sunny, well-drained conditions, so they grow happily side by side. Chives want richer, moister compost, and mint needs a pot of its own because its roots spread through everything.' ),
						array( 'question' => 'Are supermarket herb pots good for a window box?', 'answer' => 'Often not. They are usually raised under glass and tend to be too soft and crowded to settle outdoors. Herb plants from a nursery or garden centre, bought once the weather warms up in late spring, cope better.' ),
						array( 'question' => 'When is the best time to plant a herb window box?', 'answer' => 'Late spring. Herbs planted in winter can suffer root damage in cold, wet compost.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						array( 'title' => 'RHS — Grow your own Mediterranean herbs in a pot', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/containers/june-edible-container-idea' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Why a window box suits herbs' ) .
					$p( 'Most kitchen herbs are small, shallow-rooted plants that you pick a sprig at a time, so a box just outside the window puts them within reach while you cook. The woody Mediterranean herbs also share one set of needs, sun and sharp drainage, which makes them easy companions in a single container.' ) .
					$h2( 'Growing each herb' ) .
					$p( 'This project covers building and planting the box. For harvesting, pruning and winter care, see the guides to <a href="/plants/thyme-in-pots/">thyme</a>, <a href="/plants/sage-in-pots/">sage</a>, <a href="/plants/rosemary-in-pots/">rosemary</a> and <a href="/plants/oregano-in-pots/">oregano</a>. Chives and mint are better in separate pots: see <a href="/plants/chives-in-pots/">chives</a> and <a href="/plants/mint-in-pots/">mint</a>. Small boxes dry out and go hungry faster than big pots, so follow <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a> and <a href="/plant-care/how-to-fertilize-container-plants/">how to feed container plants</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (p. 85) recommends window boxes for herbs you want to pick from the kitchen window. The compost mix, spacing and planting depth follow the RHS guides to herbs in containers; we left out the layer of crocks some older advice suggests, because the RHS no longer recommends it. The weight and balcony points come from the RHS guide to roof gardens and balconies. Fixing the box before filling it and checking where the water drips are common-sense safety points we added. We have not built this exact version ourselves.' ),
			),

			'make-comfrey-liquid-fertilizer'  => array(
				'image_prompt' => 'A black plastic bucket with a tight lid, half-lifted to show dark green comfrey leaves held under water by a brick, standing in the corner of a balcony beside a watering can and a rinsed plastic milk bottle with a blank label, gardening gloves on the floor, soft overcast light.' . $photo_end,
				'pin_prompt'   => 'Gloved hands pouring dark brown comfrey liquid from a labelled bottle into a watering can of water on a balcony, the diluted feed the colour of weak tea, a large tomato pot behind, photographed vertically.' . $pin_end,
				'title'        => 'Make a Comfrey Liquid Feed',
				'category'     => array( 'watering' ),
				'plants'       => array( 'cherry-tomato', 'balcony-strawberry', 'zucchini-in-pots', 'chili-peppers-in-pots' ),
				'excerpt'      => 'Pack comfrey leaves into a lidded bucket, weigh them down, cover them with water and leave them for two to four weeks until a dark liquid forms. Dilute it about one part to ten with water and pour it onto moist compost around hungry fruiting plants.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => '20 minutes, then 2–4 weeks of waiting',
					'cost'           => 'Low',
					'size'           => 'One lidded bucket',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'The liquid smells strongly. Keep the lid on, and stand the bucket in a ventilated corner away from your own and your neighbours\' windows and doors.' ),
						array( 'point' => 'A bucket full of water and leaves is heavy. Fill it where it will stand, on the floor and against the wall.' ),
						array( 'point' => 'Wear gloves, and long sleeves when cutting comfrey. Do not eat or drink while handling the feed, and wash your hands afterwards.' ),
						array( 'point' => 'Never put homemade feed in a sprayer: the RHS warns against it so that you do not breathe in the microbes.' ),
					),
					'materials' => array(
						array( 'name' => 'Comfrey leaves, fresh (or comfrey pellets sold as animal feed)', 'quantity' => 'Enough to fill the bucket loosely', 'url' => '' ),
						array( 'name' => 'Bucket with a tight-fitting lid', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Brick or stone', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Rinsed plastic milk or juice bottles with lids', 'quantity' => '2–3', 'url' => '' ),
						array( 'name' => 'Labels and a marker', 'quantity' => 'One per bottle', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Gloves', 'url' => '' ),
						array( 'name' => 'Secateurs or shears', 'url' => '' ),
						array( 'name' => 'Sieve and funnel', 'url' => '' ),
						array( 'name' => 'Watering can with a rose', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Gather the leaves', 'text' => 'Wearing gloves, cut comfrey leaves and pull off any tough stems and flowers. Leaves picked once the plant has flowered, or from midsummer to early autumn, are the richest.', 'tip' => 'If you collect comfrey anywhere other than your own garden, ask the owner first.' ),
						array( 'title' => 'Pack the bucket', 'text' => 'Press the leaves into the bucket so they fit snugly without being crushed to a pulp.', 'tip' => '' ),
						array( 'title' => 'Weigh down and cover', 'text' => 'Set a brick on top to hold the leaves under, pour in water until they are submerged, and close the lid.', 'tip' => 'With dried pellets instead of fresh leaves, adding water is essential to start the rotting.' ),
						array( 'title' => 'Wait and check', 'text' => 'Look in once a week. After about two to four weeks, depending on the weather, the leaves will have rotted and the liquid turned dark brown or black. That is when it is ready.', 'tip' => 'Lift the lid away from your face.' ),
						array( 'title' => 'Strain and bottle', 'text' => 'Pour the liquid through a sieve into the bottles, then cap and label them. Add the leftover sludge to a compost bin if you have one.', 'tip' => '' ),
						array( 'title' => 'Dilute before use', 'text' => 'Mix roughly one part of the liquid with ten parts of water, aiming for the colour of weak tea. Pour it from a can with a rose onto compost that is already moist.', 'tip' => 'Never use it neat.' ),
					),
					'faq'       => array(
						array( 'question' => 'How long does comfrey feed keep?', 'answer' => 'It is best used fresh. If you must store it, keep it in capped bottles somewhere cool and dark and aim to use it within three months. If a bottle starts to bulge, unscrew the cap slowly to let the gas out, then close it again.' ),
						array( 'question' => 'Can I make comfrey feed without a comfrey plant?', 'answer' => 'Yes. Comfrey pellets, sold as feed for pets and ponies, can be steeped in water in the same way. Nettle leaves work too: wear gloves to pick them.' ),
						array( 'question' => 'Which comfrey is best for making feed?', 'answer' => 'Symphytum × uplandicum \'Bocking 14\' is the usual choice. It is sterile, so it does not self-seed around the garden.' ),
						array( 'question' => 'Why does comfrey feed suit fruiting plants?', 'answer' => 'Comfrey is usually high in potassium, the nutrient that supports flowers and fruit.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Homemade fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/homemade-fertilisers' ),
						array( 'title' => 'RHS — Three ways to use comfrey to feed your plants', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/making-comfrey-feed' ),
						array( 'title' => 'RHS — Why comfrey is the superplant you need', 'url' => 'https://www.rhs.org.uk/garden-inspiration/plants-we-love/why-comfrey-is-the-superplant-you-need' ),
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Soft green leaves are full of nutrients. Left to rot under water, they release them into the liquid, which you then thin down and pour on as a plant food. Comfrey is a favourite because it is easy to grow and rich in potassium. The result is free, but its strength varies from batch to batch and it is weaker than bought fertiliser.' ) .
					$h2( 'When to use it' ) .
					$p( 'Because it is weaker, a homemade feed goes on little and often rather than in one big drench. It is most useful for plants in containers and crops in active growth, such as tomatoes and strawberries; established shrubs do not need it. For the season and the timing, see <a href="/plant-care/how-to-fertilize-container-plants/">how to feed container plants</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The method, the dilution, the storage advice and the safety warnings come from three RHS pages on comfrey and homemade fertilisers. The RHS pages differ slightly: one says fresh leaves need no added water and should be diluted one to twenty, while the comfrey guides cover the leaves with water and dilute about one to ten. We follow the comfrey guides. Keeping the bucket away from windows and filling it where it will stand are common-sense points we added for balconies. We have not made this exact batch ourselves.' ),
			),

			'wrap-pots-for-winter'        => array(
				'image_prompt' => 'Close view of hands in gardening gloves tying garden twine round a large terracotta pot wrapped in clear bubble polythene, the base of the pot left uncovered and standing on pot feet, a dormant blueberry bush in the pot, a frosty balcony floor and a brick wall behind, cold early winter light.' . $photo_end,
				'pin_prompt'   => 'Three pots on a balcony, one wrapped in bubble polythene and two in hessian over straw, all tied with twine and grouped against a wall, a light frost on the floor, photographed vertically.' . $pin_end,
				'title'        => 'Wrap Pots for Winter, Step by Step',
				'category'     => array( 'planters' ),
				'plants'       => array( 'bay-tree-in-pot', 'fig-tree-in-pot', 'blueberries-in-pots', 'rosemary-in-pots', 'apple-tree-in-pot' ),
				'excerpt'      => 'Wind bubble polythene or hessian round the sides of the pot, keep the base and drainage holes uncovered, and tie it with twine so the wind cannot pull it loose. Take the wrapping off during long mild spells so the pot does not sweat, and put it back when the cold returns.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 15 minutes per pot',
					'cost'           => 'Low',
					'size'           => 'Any pot that stays outside',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Loose plastic or hessian catches the wind. Tie every wrap firmly so nothing can blow off the balcony.' ),
						array( 'point' => 'Keep the drainage holes open. A wrap that seals the base keeps the compost wet, which is as harmful as frost.' ),
						array( 'point' => 'Move big pots before you wrap them, not after: a wrapped pot is harder to grip.' ),
					),
					'materials' => array(
						array( 'name' => 'Bubble polythene, re-used if possible', 'quantity' => 'Enough to go round each pot with an overlap', 'url' => '' ),
						array( 'name' => 'Hessian sacking or re-used fleece (alternative)', 'quantity' => 'As above', 'url' => '' ),
						array( 'name' => 'Straw (optional, for extra insulation)', 'quantity' => 'A few handfuls per pot', 'url' => '' ),
						array( 'name' => 'Garden twine', 'quantity' => 'A ball', 'url' => '' ),
						array( 'name' => 'Clear polythene sheet (only for straw wraps in wet spells)', 'quantity' => '1 piece per pot', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Tape measure or a length of string', 'url' => '' ),
						array( 'name' => 'Gloves', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Wrap before the first frost', 'text' => 'Have your materials ready by early autumn and put the wraps on at the first frost warning, which usually comes between September and November.', 'tip' => '' ),
						array( 'title' => 'Measure and cut', 'text' => 'Run a string round the widest part of the pot and cut the bubble polythene or hessian a little longer, so the ends overlap. Make it as tall as the pot, from just above the base to the rim.', 'tip' => '' ),
						array( 'title' => 'Wind it round the sides', 'text' => 'Hold one end against the pot and wind the sheet round it, overlapping the ends. Leave the base and the drainage holes uncovered.', 'tip' => '' ),
						array( 'title' => 'Tie it in place', 'text' => 'Tie twine round the pot near the top and again near the bottom, tight enough that the wrap cannot slip or flap.', 'tip' => 'A bow is easier to undo on a mild day than a knot.' ),
						array( 'title' => 'Add straw for extra cover (optional)', 'text' => 'For more insulation, pack straw round the sides of the pot and hold it in with a layer of hessian or netting tied with twine. In long wet spells, add a polythene sheet over the straw so it does not soak up rain and rot.', 'tip' => '' ),
						array( 'title' => 'Unwrap in mild spells', 'text' => 'When a long run of mild weather is forecast, take the wraps off so the pot and plant do not sweat and rot underneath, and put them back when it turns cold again.', 'tip' => '' ),
						array( 'title' => 'Remove in spring', 'text' => 'Once the risk of frost has passed and new growth has started, take the wraps off, ideally on a dull day. Dry bubble polythene can be rolled up and kept for next year.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Can I line a clay pot instead of wrapping it?', 'answer' => 'Yes, when you are planting a tree. Backyard Harvest suggests lining the inside of a clay pot with bubble plastic before planting, in colder areas, to protect the roots from hard frost. Line the sides only and keep the drainage holes clear.' ),
						array( 'question' => 'Should a wrapped pot stay wrapped all winter?', 'answer' => 'Not without a break. During long mild spells, take the wrap off so moisture does not build up under it, and replace it when frost is forecast again.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Overwintering tender plants: wrapping', 'url' => 'https://www.rhs.org.uk/prevention-protection/overwintering-tender-plants-wrapping' ),
						array( 'title' => 'RHS — Preventing winter damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/preventing-winter-damage' ),
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'Which pots to wrap, and why' ) .
					$p( 'This page covers only the hands-on wrapping. For why roots in pots are at risk, which pots and plants need protecting, and what else to do before winter, read <a href="/plant-care/protect-pots-in-winter/">how to protect pots and container plants in winter</a>.' ) .
					$h2( 'Choosing a material' ) .
					$p( 'The RHS and Backyard Harvest both list bubble polythene, hessian, fleece and straw. Choose re-used material where you can. Straw needs a layer of hessian or netting to hold it in and, in wet weather, a waterproof sheet on top. Whatever you use, tie it firmly and leave the base open.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 204–205) describes wrapping pots in bubble plastic, fleece or hessian, leaving the drainage holes clear, and lining clay pots before planting trees. The timing, the straw method and the advice on mild spells and unwrapping come from the RHS guides to wrapping and to preventing winter damage. Measuring with string, tying near the top and bottom, and moving pots before wrapping are common-sense steps we added. We have not wrapped this exact set of pots ourselves.' ),
			),

			'plant-a-strawberry-planter'  => array(
				'image_prompt' => 'A long wooden trough planted with a row of strawberry plants with three-lobed, toothed bright green leaves, white five-petalled flowers and ripe red berries hanging over the front edge, the trough standing on a sturdy low wooden plant stand against a sunny balcony wall, early summer light.' . $photo_end,
				'pin_prompt'   => 'Ripe red strawberries dangling over the rim of a raised trough planter on a sunny balcony, leaves and white flowers above, photographed vertically from the side.' . $pin_end,
				'title'        => 'Plant a Raised Strawberry Planter',
				'category'     => array( 'vertical' ),
				'plants'       => array( 'balcony-strawberry' ),
				'excerpt'      => 'Plant strawberries about 20 cm apart in a long trough of peat-free compost and raise it on a sturdy stand so the berries hang clean over the edge. The RHS warns that the classic pots with side pockets make healthy plants harder to keep, so a simple raised trough is the better choice.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About an hour',
					'cost'           => 'Low',
					'size'           => 'One trough; one plant per 20 cm (8 in) of length',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Use a stand made to carry a full trough, standing level on the balcony floor beside the wall. A railing or ledge is no place for it.' ),
						array( 'point' => 'Check that water draining from the trough lands on your own floor, not on a neighbour or the street.' ),
						array( 'point' => 'If you net the fruit against birds, keep the net taut and tied down so birds cannot get caught in it and the wind cannot lift it.' ),
					),
					'materials' => array(
						array( 'name' => 'Long trough or window box with drainage holes', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Sturdy plant stand or low bench that holds the trough securely', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose or soil-based compost', 'quantity' => 'Enough to fill the trough', 'url' => '' ),
						array( 'name' => 'Strawberry plants, potted or bare-root', 'quantity' => 'One for every 20 cm (8 in) of trough', 'url' => '' ),
						array( 'name' => 'Netting and canes (optional)', 'quantity' => 'To cover the trough', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Trowel', 'url' => '' ),
						array( 'name' => 'Scissors, to trim bare roots', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Set up the stand', 'text' => 'Place the stand in a sunny, sheltered spot, level and against the wall, and stand the empty trough on it. Make sure it is steady before you fill it.', 'tip' => 'Raising the trough keeps the fruit off the floor, where slugs are more likely to reach it.' ),
						array( 'title' => 'Fill with compost', 'text' => 'Fill the trough with peat-free multi-purpose or soil-based compost to just below the rim.', 'tip' => '' ),
						array( 'title' => 'Prepare the plants', 'text' => 'Potted plants go in as they are. For bare-root runners, trim long roots back to about 10 cm (4 in) and spread them out in the planting hole.', 'tip' => 'Planting time runs from September to April. Cold-stored plants put in during spring can crop within about 60 days.' ),
						array( 'title' => 'Plant along the front edge', 'text' => 'Space the plants about 20 cm (8 in) apart, close to the front of the trough so the fruit will hang over it. Set the base of each crown level with the compost: too deep and it rots, too high and it dries out.', 'tip' => '' ),
						array( 'title' => 'Water in', 'text' => 'Water around the plants to settle the compost, keeping the water off the crowns.', 'tip' => 'Water in the morning, so any splashes dry before night.' ),
						array( 'title' => 'Net before the fruit ripens (optional)', 'text' => 'Push short canes into the corners and stretch netting over them, fastened firmly. Take it off after harvest.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Are strawberry pots with side pockets worth buying?', 'answer' => 'The RHS says the traditional pots with planting holes round the sides look attractive but make it harder to keep the plants healthy and productive. A plain trough or large pot is easier to water evenly.' ),
						array( 'question' => 'Why grow strawberries in a raised planter?', 'answer' => 'Grown in containers, strawberries avoid the soil diseases that build up in old beds, and the fruit is less likely to be eaten by slugs and snails. Raised up, the berries hang clean over the rim.' ),
						array( 'question' => 'How often should I replace the plants?', 'answer' => 'Strawberries are prone to disease, so plants are usually replaced every three years. Runners from your own plants can be potted up to replace older ones.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — How to plant and grow strawberries', 'url' => 'https://www.rhs.org.uk/garden-inspiration/grow-your-own/plant-bare-root-strawberries' ),
						array( 'title' => 'RHS — Crops in pots', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/crops-in-pots' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A long trough gives every plant the same depth of compost and the same light, which makes watering simple. Raising it on a stand lifts the trusses clear of the floor, so the berries hang over the edge where they stay clean and are easy to see and pick.' ) .
					$h2( 'Looking after the plants' ) .
					$p( 'Watering, feeding and choosing varieties are covered in <a href="/plants/balcony-strawberry/">how to grow strawberries on a balcony</a>. Plants in containers are more at risk from <a href="/problems/black-vine-weevil/">vine weevil</a>, and damp weather can bring <a href="/problems/gray-mold/">grey mould</a> to the fruit.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The compost, spacing, crown depth, planting season and the warning about side-pocket pots come from the RHS strawberry guides; the RHS crops-in-pots feature notes that the fruit stays clean hanging over the rim. Cold-stored plants and replacing plants every three years come from Backyard Harvest (pp. 82 and 133–135). The stand, the drainage check and placing the plants along the front edge are common-sense points we added. We have not built this exact version ourselves.' ),
			),
		),
	),
);
