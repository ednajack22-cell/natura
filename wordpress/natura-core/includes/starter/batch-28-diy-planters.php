<?php
/**
 * Starter guides, batch 28 (planters and simple watering): six DIY
 * projects adapted from sources: a planter from a reused container, a
 * growing bag, a small raised bed on a patio, forcing chicory, a drip
 * watering kit and a humidity tray.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from Colorado State University Extension for the drip kit, and
 * from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the RHS and the book differ,
 * the RHS is followed. Months are for a temperate climate such as the UK.
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

$rhs_balcony = array(
	'title' => 'RHS — Roof gardens and balconies',
	'url'   => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies',
);

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Planters and simple watering', 'natura-core' ),
	'guides' => array(
		'project' => array(
			'make-a-planter-from-a-recycled-container' => array(
				'image_prompt' => 'A row of reused containers on a sunny patio against a brick wall: a large cleaned paint tin, a galvanised metal bucket and an old wooden wine crate lined with a cut-open compost bag, each standing on two bricks, planted with flat-leaved parsley, a chilli plant with glossy green and red fruit, and chives with hollow tubular leaves, a cordless drill resting on the paving, late spring light.' . $photo_end,
				'pin_prompt'   => 'Close view of a clean tin can with a row of punched holes round its base, planted with a young basil plant with bright green oval leaves, standing on a tile on a balcony floor, photographed vertically from a low angle.' . $pin_end,
				'title'        => 'Make a Planter From a Recycled Container',
				'category'     => array( 'planters' ),
				'plants'       => array( 'parsley-in-pots', 'chives-in-pots', 'chillies-in-pots', 'potatoes-in-bags' ),
				'excerpt'      => 'Almost any sturdy container can grow food once it is scrubbed clean and has holes punched or drilled in its base. Line wood or anything full of gaps, raise it on bricks or tiles, and fill it with peat-free compost.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => '20–40 minutes per container',
					'cost'           => 'Low',
					'size'           => 'From a tin can for one herb to a dustbin for potatoes',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Reuse only things that are solid enough to carry wet compost. A large metal bin or crate full of damp compost is much heavier than it looks, so plan where it will stand before you fill it.' ),
						array( 'point' => 'Metal heats up fast in summer sun and gets very cold in winter. Stand metal containers where they are shaded at the hottest part of the day, or keep them for summer crops.' ),
						array( 'point' => 'Drill and cut on a stable surface, with gloves on and the container clamped or held steady. File or tape any sharp edge left by a punched hole.' ),
						array( 'point' => 'Look where the water will drain before you plant, and keep it off a neighbour\'s balcony or the street below.' ),
					),
					'materials' => array(
						array( 'name' => 'Sturdy container: tin can, metal bucket or tub, wooden crate, old sink or dustbin', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Old compost bag or plastic sheet, for lining wood', 'quantity' => 'Enough to line the sides and base', 'url' => '' ),
						array( 'name' => 'Horticultural fleece or shade netting, for containers full of gaps', 'quantity' => 'Enough to line the inside', 'url' => '' ),
						array( 'name' => 'Bricks or tiles to stand it on', 'quantity' => '2–4', 'url' => '' ),
						array( 'name' => 'Peat-free compost (soil-based for a plant you keep more than a year)', 'quantity' => 'Enough to fill the container', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Drill with a metal or wood bit, or a screwdriver and hammer for thin tins', 'url' => '' ),
						array( 'name' => 'Scrubbing brush and washing-up water', 'url' => '' ),
						array( 'name' => 'Gloves', 'url' => '' ),
						array( 'name' => 'Staple gun or drawing pins, for linings', 'url' => '' ),
						array( 'name' => 'Trowel and watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Pick a container that will last', 'text' => 'Choose something durable and big enough for the crop. The RHS suggests plastic-free items as the best things to reuse: metal lasts outdoors, while a plastic colander or thin plastic tub tends to warp and break down in strong sun. Solid wood stays sturdy when wet; chipboard and MDF do not.', 'tip' => 'A deep container suits potatoes: see the potato guide for the size.' ),
						array( 'title' => 'Clean it thoroughly', 'text' => 'Wash out any food, paint or soil, rinse well and let it dry.', 'tip' => '' ),
						array( 'title' => 'Make the drainage holes', 'text' => 'Punch holes all round the base of a thin tin with a screwdriver, or drill them through thicker metal and wood. Several holes spread across the base drain better than one in the middle.', 'tip' => 'Drill slowly, and start with a small bit on metal.' ),
						array( 'title' => 'Line it if needed', 'text' => 'Line untreated wood with an old compost bag or plastic sheet to slow rotting, and cut slits in the lining over the drainage holes. A crate or basket with wide gaps needs a lining of fleece or netting to hold the compost in.', 'tip' => '' ),
						array( 'title' => 'Raise it off the floor', 'text' => 'Set the container on bricks or tiles in its final spot, so the holes are never sitting in a puddle.', 'tip' => '' ),
						array( 'title' => 'Fill and plant', 'text' => 'Fill with peat-free compost, plant, firm gently and water well. For anything you will keep for more than a year, use a soil-based mix with a slow-release fertiliser.', 'tip' => 'Give each herb its own tin rather than crowding several into one.' ),
					),
					'faq'       => array(
						array( 'question' => 'Can I grow herbs in old tin cans?', 'answer' => 'Yes. The RHS suggests cleaned tins with holes punched round the base for parsley, sage, mint, basil, chives or thyme, one herb per tin. Biscuit tins work too, but they are shallow, so choose shallow-rooted plants.' ),
						array( 'question' => 'Do I need to line a wooden crate before planting?', 'answer' => 'It is worth doing. Untreated wood rots in time, and a lining of old compost bag slows that down and stops compost washing out through the gaps. Leave the drainage holes open.' ),
						array( 'question' => 'Is a metal bucket a good pot for vegetables?', 'answer' => 'It can be, once it has drainage holes. Metal is durable and frost-proof, but it gets hot in summer and very cold in winter, and the roots feel both. Position it out of the fiercest afternoon sun.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — DIY planters for small spaces', 'url' => 'https://www.rhs.org.uk/get-involved/grow-with-it/diy-planters-for-small-spaces' ),
						array( 'title' => 'RHS School Gardening — Container gardening', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/getting-started/container-gardening' ),
						array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
						array( 'title' => 'RHS — How to make a raised bed', 'url' => 'https://www.rhs.org.uk/garden-features/how-to-make-a-raised-bed' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Roots do not care what the outside of a pot looks like. They need enough compost, air and water, and a way for extra water to escape. Give an old tin, tub or crate those things and it does the same job as a bought pot, for little or no money.' ) .
					$h2( 'Before you choose' ) .
					$p( 'How big a container each crop needs, and how the materials compare, is covered in <a href="/plant-care/how-to-choose-pots-for-vegetables/">how to choose pots for vegetables</a>. For which compost to use, see <a href="/plant-care/compost-for-containers/">compost for containers</a>. To grow potatoes in a dustbin or an old compost sack, follow <a href="/plants/potatoes-in-bags/">potatoes in bags</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 8 and 84–85) says almost any large, durable, well-drained container suits crops, and suggests old cans, metal tubs, crates and bags. Cleaning tins, punching holes, avoiding plastic colanders and MDF, and preferring plastic-free items come from the RHS guide to DIY planters; the linings and the bricks under the pot come from the RHS school container guide and the RHS raised bed guide. Clamping the container while drilling and taping sharp edges are safety points we added. We have not built these exact planters ourselves.' ),
			),

			'plant-up-a-growing-bag'                   => array(
				'image_prompt' => 'A peat-free growing bag lying flat on a sunny balcony floor against a warm rendered wall, two young tomato plants with hairy stems and divided serrated leaves planted in square holes cut in the plastic, each tied loosely to a bamboo cane, a watering can beside the bag, early summer morning light.' . $photo_end,
				'pin_prompt'   => 'Hands with a knife cutting a square planting hole in the top of a growing bag on a patio, two potted pepper plants with glossy pointed leaves waiting beside it, photographed vertically from above.' . $pin_end,
				'title'        => 'Plant Up a Growing Bag',
				'category'     => array( 'planters' ),
				'plants'       => array( 'cherry-tomato', 'sweet-peppers-in-pots', 'aubergines-in-pots', 'cucumbers-in-pots', 'lettuce-in-pots', 'leeks-in-pots' ),
				'excerpt'      => 'Lay the bag flat in its final sunny, sheltered spot, cut planting holes in the top and drainage slits underneath, then plant and put in supports straight away. After that, keep the compost evenly moist: a bag dries out and floods more easily than a big pot.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 30 minutes',
					'cost'           => 'Low',
					'size'           => 'One standard growing bag',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Once watered, a full bag is too heavy to move safely. Put it where it will stay before you cut it, ideally near a load-bearing wall on a balcony.' ),
						array( 'point' => 'Drainage slits let water out underneath. Slide a tray under the bag if the run-off could reach the balcony below or stain the floor.' ),
						array( 'point' => 'Supports must not lean on or be tied to the railing. Use a wall, a freestanding frame or canes held in the bag.' ),
						array( 'point' => 'Cut away from your hand with a sharp knife, on the bag lying flat.' ),
					),
					'materials' => array(
						array( 'name' => 'Peat-free growing bag', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Young plants: tomatoes, peppers, aubergines or cucumbers; or lettuce plants or seed', 'quantity' => 'Usually two or three fruiting plants per bag', 'url' => '' ),
						array( 'name' => 'Canes, or strings and a frame, for tall crops', 'quantity' => 'One or more per plant', 'url' => '' ),
						array( 'name' => 'Soft garden twine', 'quantity' => 'A ball', 'url' => '' ),
						array( 'name' => 'Tray or plastic sheet to stand the bag on (optional)', 'quantity' => '1', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Sharp knife or scissors', 'url' => '' ),
						array( 'name' => 'Trowel', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Wait for warm nights', 'text' => 'Plant tender crops once nights are free of frost, usually mid-May in mild areas. Tomatoes want temperatures reliably above 16 °C (60 °F).', 'tip' => 'Keep fleece handy for an unexpectedly cold night.' ),
						array( 'title' => 'Lay the bag in place', 'text' => 'Put the bag flat in a sunny, sheltered spot, such as against a warm wall, on a tray if you want to catch run-off.', 'tip' => '' ),
						array( 'title' => 'Cut holes and slits', 'text' => 'Cut a square planting hole in the top for each plant, spaced evenly along the bag. Turn it carefully or reach underneath to make a few slits in the base so water can drain.', 'tip' => 'Make the drainage slits before the bag is planted and watered, while it is still light.' ),
						array( 'title' => 'Plant', 'text' => 'Scoop out a little compost, set each plant in and firm it. Tomatoes can go in deeply, up to the first small seed leaves on the stem. For salads, plant lettuces in the holes, or sow seed on the firmed compost, cover it thinly and water gently.', 'tip' => '' ),
						array( 'title' => 'Add supports now', 'text' => 'Put in canes or strings for tall crops on planting day, because they grow fast. Large plants in a bag may need several canes each; tie the stems loosely, as they can be brittle.', 'tip' => 'Pushing canes in now avoids spearing roots later.' ),
						array( 'title' => 'Water in and keep it even', 'text' => 'Water each plant well to settle the compost. From then on, check the bag every day in warm weather and feed fruiting crops once the first fruits form.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'When should I plant tomatoes in a growing bag?', 'answer' => 'When nights are frost-free and temperatures stay above about 16 °C (60 °F), which in mild areas is usually from mid-May. In colder areas, or on an exposed balcony, wait longer.' ),
						array( 'question' => 'Can I grow lettuce in a growing bag?', 'answer' => 'Yes. A bag suits lettuce and other salad leaves as well as tomatoes. Plant young lettuces in holes along the top, or sow salad seed thinly on the surface and cover it lightly.' ),
						array( 'question' => 'Why do plants in growing bags need so much attention to watering?', 'answer' => 'The bag holds a shallow layer of compost, so the water supply swings quickly between too dry and too wet. Those swings are a common cause of split tomatoes. Little and often, checked daily, keeps it steadier.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Grow your own tomatoes in a pot', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/containers/may-edible-container-idea' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chillies', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — Tomato splitting and cracking', 'url' => 'https://www.rhs.org.uk/problems/tomatoes-fruit-splitting-and-cracking' ),
						$rhs_balcony,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A growing bag is a pillow of compost in its own plastic skin. Lying flat, it gives fruiting crops a long, shallow root run on a hard floor, with no pot to buy or fill. Backyard Harvest notes that it works indoors or out, for anything from tomatoes and peppers to salads and leeks.' ) .
					$h2( 'Choosing the bag and the plants' ) .
					$p( 'Which bag to buy, and how many plants of each crop one bag holds, are compared in <a href="/gear/best-grow-bags/">the best growing bags</a>. For a cordon tomato, a hanging string is an easy support: see <a href="/diy-projects/make-a-string-support-for-tomatoes/">make a string support for tomatoes</a>. Feeding through the summer is explained in <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Cutting planting holes and drainage slits, the frost-free planting date, deep planting for tomatoes and the warning about uneven watering come from the RHS tomato pages. The several-canes advice comes from the RHS chilli guide, and sowing salads in bags from the RHS salad guide. Backyard Harvest (pp. 82, 85, 99, 101 and 114) lists the crops and says to put supports in at once. The tray, the cutting safety and keeping supports off the railing are common-sense points we added. We have not planted this exact bag ourselves.' ),
			),

			'build-a-small-raised-bed-on-a-patio'      => array(
				'image_prompt' => 'A low square raised bed made of two stacked wooden pallet collars standing on grey stone paving in a sunny patio corner, a row of small drainage holes drilled near the base of the boards, filled with dark crumbly soil and planted with loose-leaf lettuces, a strawberry plant with three-lobed toothed leaves and a row of radish seedlings, a gap left between the bed and the house wall, spring light.' . $photo_end,
				'pin_prompt'   => 'A small wooden raised bed on a paved patio filled with salad leaves and strawberries, a watering can on the paving beside it, photographed vertically from slightly above.' . $pin_end,
				'title'        => 'Build a Small Raised Bed on a Patio',
				'category'     => array( 'planters' ),
				'plants'       => array( 'salad-leaves-in-pots', 'lettuce-in-pots', 'balcony-strawberry', 'radishes-in-pots' ),
				'excerpt'      => 'On paving, a raised bed needs plenty of drainage holes low in its sides and a free-draining mix of topsoil, sharp sand and garden compost. Keep it narrow enough to reach the middle, and build it only on a ground-level patio, never on a balcony or roof.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => 'A weekend, then about two weeks for the soil to settle',
					'cost'           => 'Medium',
					'size'           => 'Under 1.2–1.5 m (4–5 ft) wide; 30 cm (1 ft) deep for salads, 45 cm (18 in) or more for fruit bushes',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'This is a project for a patio on the ground. A bed full of soil is far heavier than pots, and balconies suspended from a building have strict weight limits: never build one on a balcony or roof without a chartered structural engineer.' ),
						array( 'point' => 'Water leaves through the sides onto the paving. Check that it will run towards a drain or open ground, not towards the house, a doorway or a neighbour\'s side.' ),
						array( 'point' => 'Leave a gap between the bed and the house wall, so wet soil is not piled against it.' ),
						array( 'point' => 'Do not use old railway sleepers soaked in creosote: they are no longer permitted in gardens.' ),
						array( 'point' => 'Heavy timbers and bags of topsoil need two people to lift. Wear gloves and sturdy shoes.' ),
					),
					'materials' => array(
						array( 'name' => 'Frame: wooden pallet collars, a raised bed kit, or durable timber or recycled-plastic boards', 'quantity' => 'Enough for one bed, one or two layers high', 'url' => '' ),
						array( 'name' => 'Coach screws and corner battens (for layered timber)', 'quantity' => 'As needed', 'url' => '' ),
						array( 'name' => 'Water-based wood preservative (for untreated wood)', 'quantity' => '1 small tin', 'url' => '' ),
						array( 'name' => 'Old compost bags or recycled plastic sheet, to line untreated wood', 'quantity' => 'Enough for the inside walls', 'url' => '' ),
						array( 'name' => 'Weed-suppressing fabric (on tarmac)', 'quantity' => 'The size of the base', 'url' => '' ),
						array( 'name' => 'Topsoil, sharp sand (horticultural, not builder\'s) and garden compost or leafmould', 'quantity' => 'Seven parts topsoil, four of sand, three of compost', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Drill and drill bits', 'url' => '' ),
						array( 'name' => 'Spirit level and tape measure', 'url' => '' ),
						array( 'name' => 'Screwdriver or impact driver', 'url' => '' ),
						array( 'name' => 'Buckets or a wheelbarrow, and a spade for mixing', 'url' => '' ),
						array( 'name' => 'Gloves', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Pick the spot', 'text' => 'Most crops need full sun, so choose a south- or west-facing part of the patio, away from overhanging trees. Watch where rain runs off the paving: that is where the bed\'s water will go too.', 'tip' => 'Make it small enough to reach the centre from the edge without stretching.' ),
						array( 'title' => 'Prepare the base', 'text' => 'Sweep the paving clear. On tarmac, lay weed-suppressing fabric first.', 'tip' => '' ),
						array( 'title' => 'Assemble the frame', 'text' => 'Stack pallet collars, screw a kit together, or lay timbers and fix them with long coach screws. If you build in layers, overlap the joints and screw battens inside each corner to tie the layers together. Check it is level along every side and across the diagonals.', 'tip' => 'Treat untreated wood with a water-based preservative to make it last longer.' ),
						array( 'title' => 'Drill drainage holes', 'text' => 'On a hard surface, water cannot soak away underneath, so drill plenty of holes through the sides near the bottom. In a brick bed, leave open joints in the lowest courses instead.', 'tip' => '' ),
						array( 'title' => 'Line untreated wood', 'text' => 'Fix old compost bags or recycled plastic against the inside walls, keeping the drainage holes uncovered.', 'tip' => '' ),
						array( 'title' => 'Mix and fill', 'text' => 'For a bed on paving, mix seven parts topsoil with four parts sharp sand and three parts garden compost or leafmould. Fill to about 5 cm (2 in) below the rim and firm it down.', 'tip' => 'Mix in a wheelbarrow or on a sheet next to the bed, a few buckets at a time.' ),
						array( 'title' => 'Let it settle', 'text' => 'Leave the bed for a couple of weeks, top up any level that has sunk, and then sow or plant.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Can I build a raised bed straight onto paving?', 'answer' => 'Yes, as long as the water can escape. Drill plenty of drainage holes low in the sides of a timber bed, use a gritty mix with extra sharp sand, and expect to refresh the soil now and then, as you would in a large container.' ),
						array( 'question' => 'Is treated timber safe for a vegetable raised bed?', 'answer' => 'An RHS adviser says modern treated wood and new sleepers do not contain the harmful chemicals of old ones and are fine for edible crops. Old creosoted railway sleepers are a different matter and are no longer permitted in gardens.' ),
						array( 'question' => 'Can I fill a raised bed with bags of compost alone?', 'answer' => 'It is better to fill it mainly with soil. Compost breaks down and the level slumps within a few seasons, while topsoil stays put. Mix in compost or manure to enrich it.' ),
						array( 'question' => 'How deep does a patio raised bed need to be?', 'answer' => 'About 30 cm (1 ft) is enough for salad leaves and strawberries. Fruit bushes and other larger plants need 45 cm (18 in) or more. Deeper beds take more soil and need watering more often in hot weather.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to make a raised bed', 'url' => 'https://www.rhs.org.uk/garden-features/how-to-make-a-raised-bed' ),
						array( 'title' => 'RHS — Raised beds (Leigh Hunt)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/raised-beds' ),
						array( 'title' => 'RHS School Gardening — Creating raised beds', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/getting-started/creating-raised-beds' ),
						$rhs_balcony,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A raised bed is a large, bottomless container. On a patio it turns bare paving into a small plot with a deep root run, and it warms up quickly in spring. Because it drains so freely, it also dries out faster than ground soil, so plan your watering from the start.' ) .
					$h2( 'Looking after the bed' ) .
					$p( 'Check the soil a finger\'s depth down and water when it is dry there, more often after warm, windy days; <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a> gives a routine. A mulch on the surface helps hold moisture. A water butt, if you have a downpipe nearby, gives you rainwater for the bed. On a balcony, grow in pots and troughs instead: <a href="/plant-care/how-to-arrange-pots-in-a-small-space/">arranging pots in a small space</a> shows how to place heavy ones.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The construction steps, the drainage holes for hard surfaces, the soil mix, depths and widths come from the RHS guide to making a raised bed; weed fabric on tarmac comes from the RHS school guide, and pallet collars, filling with soil and treated timber from an RHS adviser\'s feature. Backyard Harvest (pp. 8 and 33) says a well-drained bed can stand on a patio, suggests beds no wider than 1.2 m (4 ft), and warns that any frame must carry the weight of the soil. The balcony warning follows the RHS guide to roof gardens and balconies. We added three common-sense safety points of our own: the gap from the house wall, checking where the water runs, and lifting in pairs. This exact bed has not been built by Natura.' ),
			),

			'force-chicory-in-a-pot'                   => array(
				'image_prompt' => 'A large plastic pot of compost on a kitchen table in winter, five trimmed chicory roots set upright with their crowns at the surface, tight pale cream-yellow chicons about 15 cm tall with crisp, closely wrapped leaves sprouting from them, an upturned black pot with taped drainage holes lifted off beside it, soft indoor daylight.' . $photo_end,
				'pin_prompt'   => 'Pale yellow-white forced chicory heads with tightly folded leaves growing from roots in a pot, an upturned pot lifted away to reveal them, photographed vertically on a wooden worktop.' . $pin_end,
				'title'        => 'Force Chicory in a Pot for Winter Chicons',
				'category'     => array( 'planters' ),
				'plants'       => array(),
				'excerpt'      => 'Grow forcing chicory roots in summer, lift and trim them in November, then plant a few upright in a large pot of moist compost and cover it so no light gets in. At 10–15 °C, pale chicons are ready to cut in about a month, and the stump may give a second, smaller one.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => '30 minutes to pot up, then about 4 weeks in the dark',
					'cost'           => 'Low',
					'size'           => 'About five roots in a 25 cm (10 in) pot',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'The cover must shut out all light. Tape over the holes of an upturned pot, or the chicons turn green and bitter.' ),
						array( 'point' => 'Indoors, stand the pot on a saucer so water cannot spoil a floor or table.' ),
						array( 'point' => 'In summer, keep the container of growing chicory somewhere stable and inside the railing, as you would any pot of crops.' ),
					),
					'materials' => array(
						array( 'name' => 'Seed of a forcing chicory, such as \'Witloof\'', 'quantity' => '1 packet', 'url' => '' ),
						array( 'name' => 'Container at least 30 cm (1 ft) wide, for growing the roots', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Peat-free multi-purpose compost', 'quantity' => 'Enough for both pots', 'url' => '' ),
						array( 'name' => 'Box of sand, for storing the roots', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Forcing pot, about 25 cm (10 in) across, with a saucer', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Cover: a second pot of the same size, a bucket or black polythene', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Waterproof tape', 'quantity' => 'A few strips', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Trowel', 'url' => '' ),
						array( 'name' => 'Sharp knife', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Grow the roots in summer', 'text' => 'Sow forcing chicory in May or June, 1 cm (½ in) deep, in a pot of peat-free multi-purpose compost no narrower than 30 cm (1 ft), and thin the seedlings to 15 cm (6 in) apart. Water well in dry spells and give a general-purpose liquid feed every fortnight through summer.', 'tip' => 'Sowing too early in cold weather can make chicory bolt.' ),
						array( 'title' => 'Lift and trim in November', 'text' => 'Tip out or dig up the plants. Throw away any root less than 2.5 cm (1 in) across at the crown, and cut the leaves off the rest about 2.5 cm (1 in) above the crown.', 'tip' => 'Backyard Harvest suggests leaving the roots in a shed for a week before trimming.' ),
						array( 'title' => 'Store them in sand', 'text' => 'Lay the roots flat in a box of sand and keep them somewhere cool, such as a shed, until you want to force them.', 'tip' => '' ),
						array( 'title' => 'Pot up a few at a time', 'text' => 'Plant about five roots upright in a 25 cm (10 in) pot of moist peat-free multi-purpose compost, with the crowns showing at the surface.', 'tip' => 'Force a few roots every few weeks for a steady supply.' ),
						array( 'title' => 'Shut out the light', 'text' => 'Cover the pot with an upturned pot of the same size with its holes taped over, a bucket, or black polythene such as an old compost sack. Keep it indoors at 10–15 °C (50–59 °F).', 'tip' => 'Lift the cover only briefly, in dim light, to check the compost and water it.' ),
						array( 'title' => 'Cut the chicons', 'text' => 'After about four weeks, when the pale heads are about 15 cm (6 in) tall, cut them off at the base with a sharp knife.', 'tip' => '' ),
						array( 'title' => 'Go for a second crop', 'text' => 'Water the stumps, cover the pot again and wait: a smaller second chicon may grow. If nothing appears, put the roots on the compost heap.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'What temperature do chicory roots need for forcing?', 'answer' => 'The RHS suggests 10–15 °C (50–59 °F), in complete darkness. Backyard Harvest gives about 10 °C (50 °F). Chicons are usually ready in three to four weeks.' ),
						array( 'question' => 'Can I force radicchio or sugarloaf chicory?', 'answer' => 'Not in the same way. Radicchio and sugarloaf chicory blanch themselves: their outer leaves shade the heart. Forcing is for Belgian (forcing) chicory such as \'Witloof\'.' ),
						array( 'question' => 'How do I keep chicons fresh after cutting?', 'answer' => 'Wrap them so no light reaches them and keep them in the fridge. Light turns them green.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow chicory', 'url' => 'https://www.rhs.org.uk/vegetables/chicory/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Forcing chicory spends the summer building up a fat root. Brought indoors in winter and kept in total darkness, the root uses that store to push up a tight bud of leaves that never see light. The result, called a chicon, is pale, crisp and much less bitter than green chicory leaves.' ) .
					$h2( 'Growing chicory for leaves' ) .
					$p( 'Radicchio and sugarloaf types are grown for their heads or as cut-and-come-again leaves, not for forcing. For salads you can pick over and over, see <a href="/plants/salad-leaves-in-pots/">salad leaves in pots</a>, and for winter leaves <a href="/plants/oriental-salad-leaves-in-pots/">oriental salad leaves in pots</a>. Starting seedlings indoors is explained in <a href="/plant-care/how-to-sow-seeds-indoors/">how to sow seeds indoors</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Sowing, the container size, lifting in November, the trim height, storing in sand, five roots per 25 cm pot, the temperature, the size at harvest and the second chicon all come from the RHS chicory guide. Backyard Harvest (pp. 35, 95, 97, 185 and 216) describes the same method and adds watering only in the dark and wrapping chicons in the fridge; where its trim height (2 cm) differs, we follow the RHS. The saucer and keeping the pot steady are common-sense points we added. We have not forced this exact batch ourselves.' ),
			),

			'set-up-a-drip-watering-kit'               => array(
				'image_prompt' => 'A drip watering kit being installed on a sunny patio: a battery timer, a small filter and a pressure regulator screwed in a line onto an outside tap on a brick wall, thin black supply pipe running along the foot of the wall past large pots of tomato, pepper and courgette plants, a thin feeder tube rising into each pot to a dripper held by a small stake near the stem.' . $photo_end,
				'pin_prompt'   => 'Close view of a small dripper on a plastic stake pushed into moist compost beside the stem of a pepper plant with glossy green fruit, a thin black tube curling away, photographed vertically.' . $pin_end,
				'title'        => 'Set Up a Drip Watering Kit for Pots',
				'category'     => array( 'watering' ),
				'plants'       => array( 'cherry-tomato', 'sweet-peppers-in-pots', 'courgettes-in-pots', 'cucumbers-in-pots' ),
				'excerpt'      => 'Fit the timer, filter and pressure regulator to an outside tap with a double check valve, run the supply pipe along your pots, and peg one or more drippers over each root ball. Flush the pipe, cap the end, then test it and adjust the timer until the compost is moist but not soaked.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => 'One to two hours, plus a few days of checking',
					'cost'           => 'Medium',
					'size'           => 'A group of pots within reach of one outside tap',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'UK water regulations require a double check valve on outside taps used for hoses and irrigation. Many new taps have one built in; if yours does not, fit one before anything else.' ),
						array( 'point' => 'On a balcony or roof, make sure any water that runs out of the pots goes to a drain outlet, not over the edge.' ),
						array( 'point' => 'Run the pipe along the base of the wall and clip it down, so nobody trips over it.' ),
					),
					'materials' => array(
						array( 'name' => 'Drip kit: supply pipe, thin feeder tubes, drippers, stakes, connectors and end caps', 'quantity' => '1 kit', 'url' => '' ),
						array( 'name' => 'Tap timer', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Filter and pressure regulator, if not in the kit', 'quantity' => '1 each', 'url' => '' ),
						array( 'name' => 'Double check valve, if the tap has none', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Pipe clips', 'quantity' => 'A few per metre', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Sharp scissors or a pipe cutter', 'url' => '' ),
						array( 'name' => 'Hole punch for drip pipe (often in the kit)', 'url' => '' ),
						array( 'name' => 'Bucket of warm water, to soften pipe ends', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Group the pots', 'text' => 'Move the pots you want to water into a line or cluster near the tap. Pots that need similar amounts of water are easiest to run together.', 'tip' => '' ),
						array( 'title' => 'Build the head at the tap', 'text' => 'Screw the parts onto the tap in the order the kit shows; a typical order is backflow protection, then the timer, then the filter, then the pressure regulator. Household pressure is higher than drip parts are made for, and the filter keeps grit out of the drippers.', 'tip' => 'Leaving out the filter or the regulator is one of the commonest mistakes.' ),
						array( 'title' => 'Lay the supply pipe', 'text' => 'Connect the supply pipe to the head and run it along the foot of the wall past every pot, clipping it as you go. Keep the run short.', 'tip' => 'Pipe uncoiled in the sun for an hour is easier to straighten.' ),
						array( 'title' => 'Add a dripper for each pot', 'text' => 'Punch a hole in the supply pipe opposite each pot, push in a feeder tube and lead it up into the pot. Peg the dripper on its stake over the root ball, close to the plant. Big, thirsty plants may need two drippers.', 'tip' => 'Pressure-compensating drippers give the same flow whether a pot sits near the tap or at the far end.' ),
						array( 'title' => 'Flush and cap', 'text' => 'Turn the water on with the far end open to flush out any dirt, then fit the end cap.', 'tip' => '' ),
						array( 'title' => 'Test and set the timer', 'text' => 'Run the system and watch every dripper. Afterwards, feel the compost a finger\'s depth down in each pot. Set the timer so the root zone is moist but water is not pouring from the base, and change it as the weather and the plants change.', 'tip' => 'Too much water washes food out of reach of the roots.' ),
					),
					'faq'       => array(
						array( 'question' => 'Where should a dripper go in a pot?', 'answer' => 'Over the root ball, near the base of the plant, where the roots can reach the water. A large plant with a wide root ball may need two or more drippers spaced round it.' ),
						array( 'question' => 'What do I do with a drip kit in winter?', 'answer' => 'Take the timer, filter, regulator and backflow device off the tap and store them indoors. Open the end of the pipe so it drains, then cap it again.' ),
						array( 'question' => 'Why has one dripper stopped working?', 'answer' => 'Usually a blockage. Check and clean the drippers during the season, clean the filter, and flush the pipe after any repair. A clogged dripper can be soaked in water and cleared.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Garden watering methods', 'url' => 'https://www.rhs.org.uk/garden-jobs/garden-watering-methods' ),
						$rhs_balcony,
						array( 'title' => 'Colorado State University Extension — Drip irrigation for home gardens (fact sheet 4.702)', 'url' => 'https://extension.colostate.edu/topic-areas/yard-garden/drip-irrigation-home-gardens-4-702/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Water from the tap passes through a timer, which opens and closes it on a schedule, then a filter and a regulator that lowers the pressure. A thin pipe carries it along the pots, and a small dripper in each one lets it out slowly at the roots, so the surface of the compost stays drier and little is wasted.' ) .
					$h2( 'Choosing a kit and a routine' ) .
					$p( 'The kinds of kit, drip line and seep hose are compared in <a href="/gear/best-drip-irrigation-kit-for-pots/">the best drip irrigation kit for pots</a>. How much water pots need through the year is covered in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>, and other ways to cover a trip away are in <a href="/plant-care/watering-pots-when-on-holiday/">watering pots when you are on holiday</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (p. 122) describes kits that connect to a tap, with a timer feeding narrow pipes to drippers near each plant. The double check valve, adjusting the timing and the risk of washing out nutrients come from the RHS guide to watering methods, and the run-off point from the RHS guide to roof gardens and balconies. The order of parts at the tap, dripper placement, flushing, capping, cleaning and winter storage come from Colorado State University Extension. Grouping the pots, clipping the pipe down and softening it in warm water are practical points we added. We have not installed this exact kit ourselves.' ),
			),

			'make-a-humidity-tray'                     => array(
				'image_prompt' => 'A lemon tree in a terracotta pot with glossy dark green leaves and a few green and yellow lemons, standing on a wide shallow tray filled with grey gravel, water glinting between the stones just below their tops, in a bright cool conservatory in winter, no radiator nearby.' . $photo_end,
				'pin_prompt'   => 'Close view of water being poured from a small jug into a shallow tray of gravel under a potted lemon tree, the pot base resting on dry stones above the water line, photographed vertically.' . $pin_end,
				'title'        => 'Make a Humidity Tray for a Lemon Tree',
				'category'     => array( 'watering' ),
				'plants'       => array( 'lemon-tree-in-pot' ),
				'excerpt'      => 'Fill a wide, waterproof tray with gravel or clay granules, add water to just below the top of the stones, and stand the pot on them. As the water evaporates it moistens the dry air round a citrus brought indoors for winter, without leaving the compost sitting wet.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 10 minutes',
					'cost'           => 'Low',
					'size'           => 'A tray wider than the pot',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'The water must never reach the base of the pot. If it does, the compost soaks it up and stays waterlogged, which harms citrus roots.' ),
						array( 'point' => 'A tree, wet compost and a tray of gravel are heavy together. Assemble the tray where it will stand, and lift the tree onto it with help.' ),
						array( 'point' => 'Choose a tray with no cracks or holes, so water cannot seep onto the floor.' ),
					),
					'materials' => array(
						array( 'name' => 'Wide, shallow waterproof tray or saucer', 'quantity' => '1, wider than the pot', 'url' => '' ),
						array( 'name' => 'Gravel, pebbles, expanded clay granules or recycled lightweight aggregate', 'quantity' => 'Enough to fill the tray', 'url' => '' ),
						array( 'name' => 'Water, ideally rainwater', 'quantity' => 'To just below the top of the gravel', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Small jug or watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Place the tray', 'text' => 'Set the empty tray where the tree will spend the winter: a bright, cool room, away from radiators, fires and cold draughts.', 'tip' => '' ),
						array( 'title' => 'Fill with gravel', 'text' => 'Spread gravel, pebbles or clay granules across the tray in an even layer.', 'tip' => 'Rinse dusty gravel first.' ),
						array( 'title' => 'Add the water', 'text' => 'Pour water in slowly until the level sits just below the top of the stones, with the surface still dry.', 'tip' => '' ),
						array( 'title' => 'Stand the pot on top', 'text' => 'Lift the tree onto the gravel so the pot rests on dry stones above the water.', 'tip' => '' ),
						array( 'title' => 'Top it up', 'text' => 'Check the tray every few days and add water as it evaporates, always keeping the level below the top of the gravel.', 'tip' => 'Look at the level whenever you water the tree.' ),
					),
					'faq'       => array(
						array( 'question' => 'Why does a lemon tree need a humidity tray indoors?', 'answer' => 'Citrus prefers moister air than a centrally heated home usually has. Dry air, together with dry roots, can make a lemon drop its flowers before fruit sets. Water evaporating from the tray raises the humidity just round the plant.' ),
						array( 'question' => 'Can I use clay pellets instead of gravel?', 'answer' => 'Yes. The RHS lists gravel, expanded clay granules and recycled lightweight aggregate. Any of them holds the pot above the water while the water evaporates.' ),
						array( 'question' => 'Can the air round a plant be too humid?', 'answer' => 'Yes. Too much water combined with damp, still air can cause oedema, small raised corky patches under the leaves. Keep the water below the pot, do not overwater the compost, and let air move round the plant.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow citrus', 'url' => 'https://www.rhs.org.uk/fruit/citrus/grow-your-own' ),
						array( 'title' => 'RHS — Citrus problems', 'url' => 'https://www.rhs.org.uk/problems/citrus' ),
						array( 'title' => 'RHS — Leaf damage on houseplants', 'url' => 'https://www.rhs.org.uk/prevention-protection/leaf-damage-on-houseplants' ),
						array( 'title' => 'RHS — Winter care for houseplants', 'url' => 'https://www.rhs.org.uk/plants/types/houseplants/winter-interest-houseplants-care' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'The stones lift the pot clear of the water, so the roots stay out of it. Water slowly evaporating from the wet gravel adds moisture to the air right round the leaves, where heated rooms are driest. Standing several plants close together raises the humidity further, as they share the damp air.' ) .
					$h2( 'The rest of winter care' ) .
					$p( 'When to bring the tree in, how much to water it and how to feed it are covered in <a href="/plants/lemon-tree-in-pot/">how to grow a lemon tree in a pot</a>. Dry indoor air also suits <a href="/problems/red-spider-mite/">red spider mite</a>, so check the undersides of the leaves now and then.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (p. 222) advises standing a citrus pot on wet gravel in a centrally heated house, away from radiators and cold draughts. The materials, the water level and the warning about waterlogged compost come from the RHS citrus and houseplant leaf-damage guides; the wide tray and grouping plants come from the RHS guide to winter houseplant care, and oedema from the RHS leaf-damage guide. Checking the tray for leaks, lifting the tree with help and rinsing the gravel are common-sense points we added. We have not set up this exact tray ourselves.' ),
			),
		),
	),
);
