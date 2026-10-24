<?php
/**
 * Starter guides, batch 29 (supports and climbing crops): seven DIY projects
 * adapted from sources: a pea net in a trough, vertical strings for
 * tomatoes and cucumbers, wires on a balcony wall, netting a fruit bush, a
 * hoop tunnel for a trough, a cordon red currant and a squash grown upwards.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the two differ, the RHS is
 * followed. Written for the United States first: timing in the text is
 * counted from the reader's frost dates or given by season. UK-only items
 * are labeled as such.
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

$rhs_balcony = array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' );
$rhs_mesh    = array( 'title' => 'RHS — Insect-proof mesh', 'url' => 'https://www.rhs.org.uk/prevention-protection/insect-proof-mesh' );
$rhs_redcur  = array( 'title' => 'RHS — How to grow redcurrants', 'url' => 'https://www.rhs.org.uk/fruit/redcurrants/grow-your-own' );
$rhs_veg_sup = array( 'title' => 'RHS — Making creative and sustainable veg supports', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/creative-veg-supports' );

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Supports and climbing crops', 'natura-core' ),
	'guides' => array(
		'project' => array(
			'make-a-pea-netting-support'         => array(
				'image_prompt' => 'A long, deep gray plastic trough on a sunny balcony floor against a brick wall, three bamboo canes pushed in along the back with a fourth cane tied across their tops, green plastic-free jute netting stretched taut between them, young pea plants about 16 in (40 cm) tall with paired rounded blue-green leaflets, large leafy stipules and fine curling tendrils gripping the mesh, a few white pea flowers, late spring light.' . $photo_end,
				'pin_prompt'   => 'Close view of pea tendrils coiled around the strands of a taut garden net above a balcony trough, flat green snow pea pods hanging below, photographed vertically.' . $pin_end,
				'title'        => 'Make a Pea Netting Support for a Trough',
				'category'     => array( 'supports' ),
				'plants'       => array( 'peas-in-pots' ),
				'excerpt'      => 'Push canes deep into the back of a trough at least 18 in (45 cm) wide, tie a cane across their tops, and stretch netting or chicken wire tightly between them before you sow or plant. Pea tendrils need lots of small strands to grip, so a taut net as tall as the variety gets suits them far better than a single cane.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 30 minutes',
					'cost'           => 'Low',
					'size'           => 'One trough at least 18 in (45 cm) wide; net as tall as the variety',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'A net covered in pea foliage behaves like a sail. Stand the trough against a wall in the most sheltered corner, with the net running parallel to the wall.' ),
						array( 'point' => 'Push the canes well down into the potting mix and tie the top cross-cane firmly, so the frame cannot rock loose in a gust. Tall varieties up to 6 ft (1.8 m) get top-heavy, which is why short ones suit a balcony better.' ),
						array( 'point' => 'Keep the trough and its netting inside the balcony, on the floor. Never tie the net to the railing or let it lean over the edge.' ),
						array( 'point' => 'A long trough of wet potting mix is heavy. Fill it where it will stay, close to a load-bearing wall.' ),
						array( 'point' => 'Fit caps or small upturned pots over the cane tips, at eye height they are easy to walk into.' ),
					),
					'materials' => array(
						array( 'name' => 'Trough with drainage holes, at least 18 in (45 cm) wide', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'quantity' => 'Enough to fill the trough', 'url' => '' ),
						array( 'name' => 'Bamboo canes, a little taller than the variety\'s final height', 'quantity' => '3–4, plus 1 for the top', 'url' => '' ),
						array( 'name' => 'Pea netting (plastic-free or reused) or chicken wire', 'quantity' => 'Length of the trough × height of the canes', 'url' => '' ),
						array( 'name' => 'Soft garden twine', 'quantity' => '1 ball', 'url' => '' ),
						array( 'name' => 'Cane caps or small upturned pots', 'quantity' => 'One per cane', 'url' => '' ),
						array( 'name' => 'Pea seed or young plants of a dwarf or short variety', 'quantity' => 'Enough for one row', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Gloves, if you use chicken wire', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Check the height on the packet', 'text' => 'Pea varieties range from about 18 in (45 cm) to 6 ft (1.8 m). Pick a dwarf or short one for a container, and plan a net at least as tall as the packet says the plants will grow.', 'tip' => 'The shortest dwarf peas can manage with a few twiggy sticks pushed in between them instead of a net.' ),
						array( 'title' => 'Fill the trough in place', 'text' => 'Set the trough against the wall where it will stay, then fill it with peat-free all-purpose potting mix.', 'tip' => '' ),
						array( 'title' => 'Push in the uprights', 'text' => 'Push a cane deep into the potting mix at each end of the trough, close to the back edge, and one or two more in between.', 'tip' => '' ),
						array( 'title' => 'Tie a cane across the top', 'text' => 'Lay a cane along the tops of the uprights and lash it to each one with twine. This crossbar holds the frame square and gives the top of the net something to hang from.', 'tip' => '' ),
						array( 'title' => 'Stretch the net', 'text' => 'Tie the net to the crossbar first, then pull it down and tie it to each upright at intervals, finishing just above the potting mix. Keep it taut: slack netting sags under the crop and flaps in the wind.', 'tip' => 'Chicken wire is stiffer and needs fewer ties, but wear gloves to handle cut ends.' ),
						array( 'title' => 'Sow or plant along the net', 'text' => 'Sow or plant your peas in a row along the foot of the net. Spacing, depth and timing are in the peas growing guide; a strip of peas raised in a gutter can also be slid in here.', 'tip' => '' ),
						array( 'title' => 'Guide the first shoots', 'text' => 'Young plants sometimes lean away from the net. Tie them loosely to it, or tuck them against it, until the tendrils take hold.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Why do peas need netting rather than a cane?', 'answer' => 'Peas hold on with thin, curling tendrils that need lots of small things to wrap around. A smooth cane gives them almost nothing to grip, whereas netting, chicken wire or branched twigs offer a hold every inch or so.' ),
						array( 'question' => 'When should the pea net go in?', 'answer' => 'At sowing or planting time, or at the latest as soon as the seedlings come up. Putting it in later risks damaging roots and leaves seedlings flopping before they have anything to climb.' ),
						array( 'question' => 'Pigeons keep stripping my pea plants. What can I do?', 'answer' => 'Pigeons like pea leaves. The RHS suggests a netting cage over the plants; on a trough, a second net draped over a few canes and fastened taut all around keeps them off without trapping them.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						$rhs_veg_sup,
						$rhs_balcony,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Each pea tendril reaches out, touches something thin and coils around it. A tight net gives every tendril a strand within reach, so the plants pull themselves upward and hold the pods up where they are easy to see and pick.' ) .
					$h2( 'Growing the peas' ) .
					$p( 'Which peas to choose, when to sow and how to water and fertilize them are covered in <a href="/plants/peas-in-pots/">how to grow peas in pots</a>. To start a whole row indoors and move it into the trough in one piece, see <a href="/diy-projects/sow-peas-in-a-gutter/">make a gutter seed tray for peas</a>. Pole beans twine around smooth canes instead, so they suit a <a href="/diy-projects/make-a-bean-tepee-in-a-pot/">bean tepee</a> better than a net.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 88–89 and 132) explains why tendril climbers need netting or twiggy sticks, and advises tying new growth to the support at first. The RHS guide to peas gives the heights, the container width, putting supports in at planting time and making them sturdy in windy places. The cane crossbar is adapted from an RHS adviser\'s feature on veg supports. The cane caps and the advice on where to stand the trough are safety points we added. Natura has not built this exact frame.' ),
			),

			'make-a-string-support-for-tomatoes' => array(
				'image_prompt' => 'Two cordon tomato plants in a peat-free grow bag on a sunny, sheltered balcony against a pale stucco wall, each main stem spiraled loosely around a vertical length of natural jute string running up to the wooden crossbar of a sturdy freestanding frame, compound serrated leaves, yellow star-shaped flowers and trusses of green and red cherry tomatoes, summer light.' . $photo_end,
				'pin_prompt'   => 'A tomato stem wound loosely around a taut vertical string, a truss of ripening red tomatoes beside it, the string rising out of frame to an overhead bar, a balcony wall behind, photographed vertically.' . $pin_end,
				'title'        => 'Make a String Support for Tomatoes and Cucumbers',
				'category'     => array( 'supports' ),
				'plants'       => array( 'cherry-tomato', 'cucumbers-in-pots' ),
				'excerpt'      => 'Hang a length of strong twine from a sturdy overhead bar for each plant and anchor the lower end under the root ball, or with a loose loop around the base of the stem. As the plant grows, wind the string gently around the top of the main stem, keeping it slack enough for the stem to thicken.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 30 minutes, plus a few minutes each week',
					'cost'           => 'Low',
					'size'           => 'One string per plant; a 12–18 in (30–45 cm) pot or half a grow bag each',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'The overhead bar carries the full weight of plants loaded with fruit. Use a solid freestanding frame that cannot tip, or a hook fixed into a solid ceiling or wall, and only with the landlord\'s or building manager\'s permission.' ),
						array( 'point' => 'Never tie the strings to the balcony railing or to anything on its outer side. Keep the plants and their frame wholly inside the balcony.' ),
						array( 'point' => 'Tall tomatoes in pots are top-heavy. Place them in a warm, sheltered spot, ideally against a sunny wall, out of the strongest wind.' ),
						array( 'point' => 'A grow bag or large pot of wet potting mix is heavy. Stand it near a load-bearing wall and check the weight limit of your balcony.' ),
					),
					'materials' => array(
						array( 'name' => 'Strong natural garden twine', 'quantity' => 'One length per plant, from the bar to the potting mix plus 20 in (50 cm)', 'url' => '' ),
						array( 'name' => 'Freestanding frame with a crossbar, or a hook or bar fixed into a solid structure overhead', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Grow bag or pots 12–18 in (30–45 cm) wide', 'quantity' => 'One pot per plant, or one bag per two', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based or all-purpose potting mix', 'quantity' => 'Enough to fill the pots', 'url' => '' ),
						array( 'name' => 'Cordon tomato or outdoor cucumber plants', 'quantity' => 'As many as you have strings', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Stepladder, used on level ground and never next to the railing', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Set up the overhead bar', 'text' => 'Put the frame in its final, warm and sheltered position, or fix your overhead support, before the plants go in. Check it is steady and level.', 'tip' => '' ),
						array( 'title' => 'Tie on the strings', 'text' => 'Tie one string to the bar above each planting position, so it hangs straight down to the potting mix.', 'tip' => 'A knot that can be undone, such as a bow or a slip knot, lets you adjust the tension later.' ),
						array( 'title' => 'Anchor the bottom at planting time', 'text' => 'Dig the planting hole, lay the lower end of the string across the bottom and set the root ball on top of it, so the plant holds the string down. Fill in, firm and water.', 'tip' => 'If the plant is already in, tie a loose, non-slip loop around the base of the stem instead, below the lowest leaves.' ),
						array( 'title' => 'Leave some slack', 'text' => 'The string should not be drum-tight. A little slack makes it easy to wind around the stem without pulling the plant up.', 'tip' => '' ),
						array( 'title' => 'Wind the stem as it grows', 'text' => 'Every few days, gently twist the string around the top of the main stem, always in the same direction, so the stem spirals up it. Never tie it tight: the stem gets thicker as it grows.', 'tip' => 'Cucumbers cling with tendrils once started, but tie the stems in at first and again if they come loose.' ),
						array( 'title' => 'Stop at the top', 'text' => 'When a tomato reaches the bar, stop it by pinching out the growing tip. Side-shoot removal and stopping are explained in the tomato growing guide.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Which plants suit a vertical string?', 'answer' => 'Single-stemmed (cordon) tomatoes, cucumbers and melons. Bush tomatoes do not need it: they stay compact and only need a short cane if a laden stem starts to droop.' ),
						array( 'question' => 'Is a string better than a cane for tomatoes?', 'answer' => 'Neither is better; both work. A cane needs tying at intervals, while a string only needs winding around the stem, which is quicker and leaves no ties to cut into it. Strings do need something solid overhead to hang from.' ),
						array( 'question' => 'Do tomatoes climb strings on their own?', 'answer' => 'No. Tomatoes have no tendrils and do not twine, so you have to wind the string around the main stem by hand as it grows.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — Crops in pots', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/crops-in-pots' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						$rhs_balcony,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A cordon tomato is one long stem with nothing to hold on with. The string gives it a straight line to follow: held at the top by the bar and at the bottom by the root ball, it takes the plant\'s weight as you spiral the stem around it. There is nothing to tie and re-tie as the plant grows.' ) .
					$h2( 'Growing the plants' ) .
					$p( 'Planting, pinching out side-shoots, watering and fertilizing are in <a href="/plants/cherry-tomato/">how to grow cherry tomatoes in pots</a> and <a href="/plants/cucumbers-in-pots/">how to grow cucumbers in pots</a>. On an open balcony, choose a cucumber bred for growing outdoors (sold in the UK as a ridge cucumber).' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 88–89, 103 and 118) recommends vertical strings tied to frames for cucumbers, vining tomatoes and melons, and warns against tying stems tightly. The RHS tomato guide describes burying the string under the root ball, leaving it slack and winding it around the stem, and gives the pot size; an RHS adviser\'s crops-in-pots feature shows the loop around the stem and the frame on top. Using a freestanding frame or a permitted fixing, and keeping clear of the railing, are balcony safety points we added. This exact layout has not been tested by Natura.' ),
			),

			'fix-a-wire-trellis-to-a-wall'       => array(
				'image_prompt' => 'A sunny brick balcony wall fitted with horizontal galvanized wires held about 2 in (5 cm) off the bricks by screw-in vine eyes, a large pot of outdoor cucumber with broad rough heart-shaped leaves and coiled tendrils climbing a cane tied to the wires, a second pot with a young currant cordon tied to an upright cane, early summer light.' . $photo_end,
				'pin_prompt'   => 'Close view of a metal vine eye in a brick wall holding a taut galvanized wire, a soft twine tie looping a young green stem to it, leaves blurred behind, photographed vertically.' . $pin_end,
				'title'        => 'Fix Wires or Trellis to a Balcony Wall',
				'category'     => array( 'supports' ),
				'plants'       => array( 'cucumbers-in-pots', 'currants-in-pots', 'green-beans-in-pots', 'runner-beans-in-pots' ),
				'excerpt'      => 'Screw vine eyes into a solid wall and run taut galvanized wires through them, about 12–18 in (30–45 cm) apart and about 2 in (5 cm) out from the surface, so climbers and trained fruit in pots below have something to cling to. Ask the landlord or building manager first, and put the wires up before the plants arrive.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => 'Half a day',
					'cost'           => 'Low',
					'size'           => 'To fit your wall; wires 12–18 in (30–45 cm) apart',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Get written permission from the landlord, condo or homeowners\' association, or building manager before you drill a balcony wall. Many leases and building rules forbid fixings on the exterior wall.' ),
						array( 'point' => 'Fix only into solid masonry, with anchors and screws suited to it. Never fix to the balcony railing, a glass panel, siding or a thin partition.' ),
						array( 'point' => 'A wall covered in leaves and fruit catches a lot of wind. Use strong wire and fixings, check them every spring, and keep the plants trimmed within the wires.' ),
						array( 'point' => 'Before drilling, check for hidden electric cables and pipes with a detector, and wear safety glasses.' ),
						array( 'point' => 'Pots of wet potting mix against the wall add weight to the balcony. Stand the heaviest near the load-bearing wall and check the balcony\'s weight limit.' ),
					),
					'materials' => array(
						array( 'name' => 'Screw-in vine eyes with masonry anchors', 'quantity' => 'Two per wire, plus one every 5–6½ ft (1.5–2 m) on long runs', 'url' => '' ),
						array( 'name' => 'Galvanized wire, 9–12 gauge (2–3 mm thick)', 'quantity' => 'Enough for all the wires', 'url' => '' ),
						array( 'name' => 'Wire tensioners (optional)', 'quantity' => 'One per wire', 'url' => '' ),
						array( 'name' => 'Or: wooden trellis panel and thick wooden furring strips', 'quantity' => '1 panel, 2–3 strips', 'url' => '' ),
						array( 'name' => 'Soft natural twine', 'quantity' => '1 ball', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Drill with a masonry bit', 'url' => '' ),
						array( 'name' => 'Cable and pipe detector', 'url' => '' ),
						array( 'name' => 'Level, tape measure and pencil', 'url' => '' ),
						array( 'name' => 'Pliers or wire cutters', 'url' => '' ),
						array( 'name' => 'Safety glasses and gloves', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Get permission and plan', 'text' => 'With permission in hand, choose the sunniest stretch of solid wall. Measure the height of your pots and decide how far up the wires should go.', 'tip' => 'Red and white currants also crop against a north-facing wall, with later, less sweet fruit.' ),
						array( 'title' => 'Mark the lowest wire', 'text' => 'Mark a level line about 1 ft (30 cm) above the potting mix surface of the pots that will stand below. That is where the first wire goes.', 'tip' => '' ),
						array( 'title' => 'Mark the rest', 'text' => 'Mark further level lines 12–18 in (30–45 cm) apart above the first. For trained currants, a wider spacing of 16–24 in (40–60 cm) is enough.', 'tip' => '' ),
						array( 'title' => 'Drill and fit the vine eyes', 'text' => 'Check for cables and pipes, then drill at each end of every line, insert the anchors and screw in the vine eyes so they stand about 2 in (5 cm) out from the wall. On long runs, add one in the middle.', 'tip' => 'The gap lets air move behind the plants and stems wrap around the wire.' ),
						array( 'title' => 'Thread and tighten the wires', 'text' => 'Fix the wire to one end vine eye, thread it through any middle ones, and pull it taut at the far end, using a tensioner if you have one. Repeat for every wire.', 'tip' => 'Fold back the cut ends of the wire so they cannot scratch.' ),
						array( 'title' => 'Or fit a trellis on furring strips', 'text' => 'Instead of wires, screw thick wooden furring strips to the wall and screw a trellis panel to them, so it sits clear of the surface. Keep the bottom of the trellis off the potting mix so it does not rot.', 'tip' => '' ),
						array( 'title' => 'Set the pots and tie in', 'text' => 'Stand the pots in front of the wires and lean a cane from each pot to the lowest wire. Tie the plant to the cane, and the cane and stems to the wires, with soft natural twine.', 'tip' => 'Plastic ties and wire can cut into stems and leaves.' ),
					),
					'faq'       => array(
						array( 'question' => 'Which crops can climb wires on a balcony wall?', 'answer' => 'Outdoor cucumbers and pole beans will climb them, while red currants and white currants can be trained flat against them as cordons or fans. A grapevine in a pot is a different case: our grapevine guide trains it as a freestanding standard.' ),
						array( 'question' => 'Can I fix a trellis to a rented balcony?', 'answer' => 'Only with the landlord\'s permission, and often the building\'s too. If you cannot drill, a freestanding post-and-wire or trellis screen is an option on a sheltered balcony, as long as it stands firmly on the floor and well away from the railing.' ),
						array( 'question' => 'Why should the wires stand away from the wall?', 'answer' => 'A gap of about 2 in (5 cm) lets air circulate behind the leaves and gives tendrils and twining stems room to wrap around the wire.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Climbers: pruning and training on planting', 'url' => 'https://www.rhs.org.uk/plants/types/climbers/pruning-training-on-planting' ),
						array( 'title' => 'RHS — How to grow climbers and wall shrubs', 'url' => 'https://www.rhs.org.uk/plants/types/climbers/growing-guide' ),
						array( 'title' => 'RHS — Grapes: rod and spur pruning', 'url' => 'https://www.rhs.org.uk/fruit/grapes/rod-and-spur-pruning-system' ),
						$rhs_redcur,
						$rhs_balcony,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A sunny wall is warm and sheltered, and it takes up no floor space. Taut horizontal wires turn it into a frame: tendrils wrap around them, twining stems climb canes tied to them, and trained fruit can be tied flat against them.' ) .
					$h2( 'Pots against a wall' ) .
					$p( 'Under an overhang, rain rarely reaches pots by a wall, so check them often; see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>. For trained fruit, see <a href="/diy-projects/train-a-cordon-redcurrant/">train a red currant as a cordon</a>; for climbing vegetables, see <a href="/plants/cucumbers-in-pots/">cucumbers in pots</a> and <a href="/plants/runner-beans-in-pots/">runner beans in pots</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 88–89, 198, 203 and 221) suggests fitting fences and trellis with wires, spaced about 1 ft (30 cm) apart for vines and wall fruit, and stresses supports strong enough for the wind. The spacing, the 2 in (5 cm) gap, vine eyes, trellis on wooden strips and soft twine come from the RHS guides to climbers; the wire thickness from the RHS grape guide; the currant spacing from the RHS redcurrant guide. Permission, solid fixings, the cable check and keeping off the railing are safety points we added. We have not put up this exact set of wires.' ),
			),

			'net-a-fruit-bush'                   => array(
				'image_prompt' => 'A red currant bush in a large dark gray pot on a sunny patio, covered by fine dark green netting pulled taut over four tall bamboo canes with small caps on their tips, the net gathered and tied with twine around the pot just below the rim, glossy strings of red berries visible through the mesh, lobed toothed green leaves, summer light.' . $photo_end,
				'pin_prompt'   => 'A potted blueberry bush under a taut net on four canes on a balcony, clusters of dusty blue berries inside the mesh, photographed vertically.' . $pin_end,
				'title'        => 'Net a Fruit Bush in a Pot',
				'category'     => array( 'supports' ),
				'plants'       => array( 'currants-in-pots', 'blueberries-in-pots', 'gooseberries-in-pots' ),
				'excerpt'      => 'Push four canes into the pot around the bush, a little taller than it, and stretch plastic-free or reused netting over them as soon as the berries start to color. Pull the net taut and tie it securely around the pot, so birds cannot reach the fruit or get caught in loose folds.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 20 minutes',
					'cost'           => 'Low',
					'size'           => 'One bush in a pot at least 18 in (45 cm) wide',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Loose netting traps and kills birds. Keep the net taut, with no baggy folds or gaps at the bottom, and look it over every day while it is on.' ),
						array( 'point' => 'A netted bush catches more wind. Stand the pot on the floor against a wall, and never hang or tie the net to the railing.' ),
						array( 'point' => 'Cap the cane tips so nobody can catch an eye on them when picking.' ),
						array( 'point' => 'Take the net off after the harvest, so it does not tear in winter storms or blow off the balcony.' ),
					),
					'materials' => array(
						array( 'name' => 'Plastic-free or reused fruit netting, big enough to cover the bush and reach below the pot rim', 'quantity' => '1 piece', 'url' => '' ),
						array( 'name' => 'Bamboo canes, about 1 ft (30 cm) taller than the bush once pushed in', 'quantity' => '4', 'url' => '' ),
						array( 'name' => 'Cane caps or small upturned pots', 'quantity' => '4', 'url' => '' ),
						array( 'name' => 'Garden twine or soft cord', 'quantity' => '1 ball', 'url' => '' ),
						array( 'name' => 'Clothespins (optional)', 'quantity' => 'A few', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Time it right', 'text' => 'Net the bush as soon as the first berries start to change color, before birds discover them.', 'tip' => 'In the UK, where bullfinches visit, they may also peck currant buds in late winter, so a net then can help too.' ),
						array( 'title' => 'Put in four canes', 'text' => 'Push four canes deep into the potting mix just inside the rim, evenly spaced around the bush, so their tops stand clear of the highest branches. Cap the tips.', 'tip' => 'Push them in between roots, not through the base of the bush.' ),
						array( 'title' => 'Drape the net', 'text' => 'Throw the netting over the canes so it hangs evenly on all sides and reaches below the rim of the pot all around.', 'tip' => 'Clothespins hold the net on the cane tops while you work.' ),
						array( 'title' => 'Pull it taut and tie it around the pot', 'text' => 'Gather the lower edge under the rim, pull out any slack, and tie it firmly around the pot with twine. Check there is no gap a bird could squeeze through.', 'tip' => '' ),
						array( 'title' => 'Pick through a flap', 'text' => 'To harvest, untie one side, pick, and tie it back straight away.', 'tip' => '' ),
						array( 'title' => 'Remove after the harvest', 'text' => 'Once the last berries are picked, take the net off, shake out any leaves and store it dry for next year.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'When should I put a net over a fruit bush?', 'answer' => 'When the berries first start to change color, as the RHS advises. In the UK, where birds such as bullfinches peck the buds, the bush may also need covering in late winter.' ),
						array( 'question' => 'What kind of netting is safe for birds?', 'answer' => 'Plastic-free or reused netting, put up taut and fastened securely at the base. Wildlife gets caught in loose or badly secured nets, so the way you fix it matters as much as the material.' ),
						array( 'question' => 'Is a fruit cage worth it on a patio?', 'answer' => 'For several bushes kept together, a temporary or permanent fruit cage saves netting each one. For one or two pots, netting each bush is simpler.' ),
					),
					'sources'   => array(
						$rhs_redcur,
						$rhs_mesh,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Birds go for soft fruit as it ripens. A net held clear of the branches on canes keeps them out while leaving room for the fruit to swell and for you to see when it is ready. The tied base matters most: a bird that slips in underneath can get tangled trying to get out.' ) .
					$h2( 'Growing the bushes' ) .
					$p( 'Planting, pruning, fertilizing and picking are in <a href="/plants/currants-in-pots/">currants in pots</a>, <a href="/plants/blueberries-in-pots/">blueberries in pots</a> and <a href="/plants/gooseberries-in-pots/">gooseberries in pots</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 87, 120 and 236) describes four stakes around a bush, a net put on before the fruit colors, and edges held down so birds are not trapped. The RHS redcurrant guide gives plastic-free or reused netting, taut, from the first color change, and mentions bullfinches in late winter; the RHS page on insect-proof mesh explains the risk to wildlife from loose nets. Tying the net around the pot, capping the canes and the daily check are common-sense points we added. Natura has not tested this exact cover.' ),
			),

			'make-a-hoop-tunnel-for-a-trough'    => array(
				'image_prompt' => 'A long wooden trough on a balcony floor against a wall, covered by a low tunnel of fine white insect netting stretched over four arched wire hoops, the netting edges tucked into the potting mix along the rim and the ends gathered and tied, feathery carrot seedlings and small kale plants visible inside, soft morning light.' . $photo_end,
				'pin_prompt'   => 'A trough of young carrots and bok choy under an arched insect netting tunnel on a balcony, one end folded back to show the plants, photographed vertically.' . $pin_end,
				'title'        => 'Make a Hoop Tunnel for a Trough',
				'category'     => array( 'supports' ),
				'plants'       => array( 'carrots-in-pots', 'kale-in-pots', 'bok-choy-in-pots', 'arugula-in-pots' ),
				'excerpt'      => 'Push stiff wire hoops into a trough about every 1 ft (30 cm) and cover them with insect-proof mesh against flying pests, or with row cover against frost. Leave slack for growth, keep the cover off the leaves, and seal every edge so nothing can creep in underneath.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 30 minutes',
					'cost'           => 'Low',
					'size'           => 'One trough; one hoop every 1 ft (30 cm)',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Mesh and row cover catch the wind. Keep the tunnel low, tie or tuck every edge, and stand the trough on the floor against a wall, away from the railing.' ),
						array( 'point' => 'A loose cover can trap birds as well as blow away. Seal the edges fully so there are no gaps or flapping folds.' ),
						array( 'point' => 'Cut wire hoops leave sharp ends. File them or bend them over before use.' ),
						array( 'point' => 'Check that a trough full of potting mix is not too heavy for its spot; place it near a load-bearing wall.' ),
					),
					'materials' => array(
						array( 'name' => 'Wire hoops, bought or bent from thick wire or bendable plastic pipe', 'quantity' => 'One per 1 ft (30 cm) of trough, plus one', 'url' => '' ),
						array( 'name' => 'Insect-proof mesh (standard 1.3–1.4 mm, about 1/20 in, or fine 0.8 mm, about 1/32 in)', 'quantity' => 'Long and wide enough to cover the hoops and tuck in', 'url' => '' ),
						array( 'name' => 'Row cover (frost cloth), plastic-free if possible (for frost)', 'quantity' => 'Same size as the mesh', 'url' => '' ),
						array( 'name' => 'Garden twine and clothespins', 'quantity' => 'A few', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Wire cutters and a file', 'url' => '' ),
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Gloves', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Choose the cover', 'text' => 'For carrot rust fly, cabbage maggot flies and cabbage white butterflies, standard 1.3–1.4 mm mesh is enough. For flea beetles, aphids and whiteflies, use fine 0.8 mm mesh, which warms the crop more. For frost, use row cover instead.', 'tip' => '' ),
						array( 'title' => 'Bend the hoops', 'text' => 'Bend each length of wire or pipe into an arch wide enough to straddle the trough and tall enough to hold the cover clear of the fully grown crop.', 'tip' => '' ),
						array( 'title' => 'Push them in', 'text' => 'Push both ends of each hoop down into the potting mix just inside the long sides of the trough, one about every 1 ft (30 cm).', 'tip' => '' ),
						array( 'title' => 'Lay the cover over', 'text' => 'Drape the mesh or row cover over the hoops without stretching it. Leave some slack along the top so the plants have room to grow.', 'tip' => 'Pulling mesh tight over hoops can widen the holes and let small insects through.' ),
						array( 'title' => 'Seal the sides', 'text' => 'Tuck the long edges at least 2 in (5 cm) down into the potting mix all along the inside of the rim, or wrap them under the trough and tie them around it with twine.', 'tip' => '' ),
						array( 'title' => 'Close the ends', 'text' => 'Gather each end, twist it and tie it with twine, then pull it gently so the cover sits snugly.', 'tip' => '' ),
						array( 'title' => 'Open briefly, close quickly', 'text' => 'Lift one side to weed, thin or pick, then seal it again straight away. Take row cover off during the day when the weather is mild, and put it back on cold nights.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Can I leave a mesh tunnel over strawberries or zucchini?', 'answer' => 'Not while they flower. Insect-pollinated crops such as strawberries and zucchini need bees and other insects to reach the flowers, so they are unsuited to mesh during flowering.' ),
						array( 'question' => 'Does insect mesh protect plants from frost?', 'answer' => 'Very little. Mesh is far more open than row cover, so it gives wind, rain and hail protection but hardly any warmth. Heavier grades of row cover give about 4 °F (2 °C) of frost protection.' ),
						array( 'question' => 'Why must the cover stay off the leaves?', 'answer' => 'Insects can lay eggs through mesh where it rests on the foliage. Hoops tall enough to hold it clear avoid this.' ),
						array( 'question' => 'Are there downsides to growing under mesh?', 'answer' => 'The air underneath is more humid, which can encourage gray mold, downy mildew, slugs and snails. Pests already in the potting mix will also be shut in, so use fresh mix and do not grow the same crop in the trough year after year.' ),
					),
					'sources'   => array(
						$rhs_mesh,
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						array( 'title' => 'RHS — Carrot fly', 'url' => 'https://www.rhs.org.uk/biodiversity/carrot-rust-fly' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A tunnel cloche is just a flexible cover held up on hoops. With mesh it is a physical barrier that keeps egg-laying flies, butterflies and beetles off without spraying anything; with row cover it traps a little warmth on cold nights. The hoops hold the cover clear of the plants, and the sealed edges do the real work.' ) .
					$h2( 'Which crops it helps' ) .
					$p( 'It suits low crops in troughs: <a href="/plants/carrots-in-pots/">carrots</a>, <a href="/plants/kale-in-pots/">kale</a>, <a href="/plants/bok-choy-in-pots/">bok choy</a> and <a href="/plants/arugula-in-pots/">arugula</a>. To recognize the pests it keeps out, see <a href="/problems/caterpillars-on-brassicas/">caterpillars on brassicas</a> and <a href="/problems/flea-beetle-holes-in-leaves/">flea beetle holes in leaves</a>. For a sturdier shelter with a lid, see <a href="/diy-projects/make-a-mini-cold-frame/">make a mini cold frame</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 103, 136 and 168) describes rigid wire hoops about every 1 ft (30 cm), net or row cover laid over and held down, fine netting against cabbage whites, and row cover taken off by day. The RHS pages on insect-proof mesh and cloches give the mesh sizes, sealing the edges at least 2 in (5 cm) deep, leaving slack, keeping mesh off the leaves, the pollination warning and the hoop materials; the RHS carrot fly page finds a complete cover works better than a barrier. Sealing the edges inside a trough and filing the wire are our own adaptations. We have not tried this exact tunnel.' ),
			),

			'train-a-cordon-redcurrant'          => array(
				'image_prompt' => 'A single-stemmed red currant cordon about 5 ft (1.5 m) tall growing in a large terra-cotta-colored pot against a sunny balcony wall, its straight main stem tied to an upright bamboo cane fixed to horizontal wires, short side-shoots along the stem carrying hanging strings of glossy translucent red berries, three- to five-lobed toothed green leaves, the lowest part of the stem bare, midsummer light.' . $photo_end,
				'pin_prompt'   => 'A slim red currant cordon in a pot against a wall, strings of red berries hanging along its single stem from top to bottom, photographed vertically.' . $pin_end,
				'title'        => 'Train a Red Currant as a Cordon in a Pot',
				'category'     => array( 'vertical' ),
				'plants'       => array( 'currants-in-pots' ),
				'excerpt'      => 'A cordon is a red currant grown as one upright stem, tied to a tall cane, with short fruiting spurs along its length: it fits a pot and a narrow strip of wall. Cut the side-shoots back to five leaves in summer and to one or two buds in winter, and shorten the leader each winter until it reaches the height you want.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => 'An hour to plant, then 15 minutes in summer and winter',
					'cost'           => 'Low',
					'size'           => 'Pot at least 18 in (45 cm) wide; about 5 ft 6 in (1.7 m) tall',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'A tall cane in a pot acts as a lever in the wind. Tie it to wall wires, or to a firm fixing on the wall, in at least two places, and keep the pot against the wall on the floor.' ),
						array( 'point' => 'Drill a balcony wall for wires only with the landlord\'s or building\'s permission, and only into solid masonry. Never use the railing as a support.' ),
						array( 'point' => 'An 18 in (45 cm) pot of soil-based potting mix is heavy, especially when wet. Put it in place before filling, near a load-bearing wall.' ),
						array( 'point' => 'Cap the top of the cane: at 5 ft 6 in (1.7 m) it is at face height.' ),
					),
					'materials' => array(
						array( 'name' => 'One-year-old red currant or white currant cutting, or a pre-trained cordon', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Pot with drainage holes, at least 18 in (45 cm) wide', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'A soil-based potting mix (in the UK, a peat-free John Innes No. 3)', 'quantity' => 'Enough to fill the pot', 'url' => '' ),
						array( 'name' => 'Sturdy bamboo cane, 5 ft 6 in (1.7 m)', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Wall wires or another firm fixing for the cane', 'quantity' => '1 set', 'url' => '' ),
						array( 'name' => 'Soft natural twine', 'quantity' => '1 ball', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Sharp, clean hand pruners', 'url' => '' ),
						array( 'name' => 'Trowel', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Put up the support first', 'text' => 'Fix horizontal wires to the wall, or another firm anchor point, before planting. Stand the empty pot in front of them, in sun or light shade and out of strong wind.', 'tip' => 'A north-facing wall works, but the fruit ripens later and is less sweet.' ),
						array( 'title' => 'Plant in the dormant season', 'text' => 'While the plant is dormant, from late fall to early spring, fill the pot with peat-free soil-based potting mix and plant the currant at the depth it grew before. Push the cane in beside it, tie the cane to the wires, and water well.', 'tip' => 'To convert a young bush, keep one strong upright shoot and cut the rest back to 1 in (2.5 cm).' ),
						array( 'title' => 'First winter cut', 'text' => 'Tie the main stem to the cane. Shorten last season\'s growth on this leader by a quarter to a half, cut every other shoot back to one bud, and keep the bottom 6–8 in (15–20 cm) of stem clear of shoots.', 'tip' => 'Pre-trained cordons may already have had this cut.' ),
						array( 'title' => 'Summer prune', 'text' => 'In midsummer, keep tying the leader to the cane. When side-shoots have seven or eight leaves, cut them back to five. Pinch any regrowth back to one leaf.', 'tip' => 'Cutting back soft summer growth also lets air into the plant.' ),
						array( 'title' => 'Every winter after', 'text' => 'Shorten the leader\'s new growth by a quarter, or by half if it is weak, cutting above a bud on the opposite side from last year\'s cut to keep the stem straight. Cut the side-shoots you pruned in summer back to one or two buds.', 'tip' => '' ),
						array( 'title' => 'Hold it at the height you want', 'text' => 'Once the cordon reaches the top of the cane, cut the leader\'s new growth back hard each winter, to one bud. On older cordons, thin out crowded clusters of spurs.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Why train a currant as a cordon instead of a bush?', 'answer' => 'A bush gives the bigger crop, but it is wide. A cordon fits a narrow space against a wall or fence, which makes it particularly suitable for a container on a balcony or patio.' ),
						array( 'question' => 'Can a currant cordon have two upright stems?', 'answer' => 'Yes, that is a double cordon. After winter planting, keep two almost opposite side-shoots 6–10 in (15–25 cm) above the potting mix and cut the main stem just above the higher one. Train them out at a shallow angle, then upright on canes once they are 8–10 in (20–25 cm) long, and prune each arm like a single cordon.' ),
						array( 'question' => 'Can blackcurrants be grown as cordons?', 'answer' => 'This method is for red and white currants, which crop on spurs along older wood. Black currants fruit best on young stems and are pruned in a different way, explained in currants in pots. The RHS also lists gooseberries among the fruits often grown as cordons.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Redcurrants and whitecurrants: pruning and training', 'url' => 'https://www.rhs.org.uk/fruit/redcurrants/redcurrant-pruning-and-training' ),
						$rhs_redcur,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'On red and white currants, flower buds appear where the previous summer\'s growth starts, and on stubby spurs along the older branches. A cordon keeps one permanent upright stem lined with those spurs. Summer pruning stops it from bushing out; winter pruning shapes the spurs and steers the leader up the cane. The result is a slim column of fruit that you can pick from one side.' ) .
					$h2( 'Looking after a potted currant' ) .
					$p( 'Watering, fertilizing, repotting and frost protection for flowers are covered in <a href="/plants/currants-in-pots/">how to grow currants in pots</a>; protect the ripening fruit with <a href="/diy-projects/net-a-fruit-bush/">a taut net</a>. For putting wires on a wall, see <a href="/diy-projects/fix-a-wire-trellis-to-a-wall/">fix wires or trellis to a balcony wall</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 118, 140, 203, 206 and 221) notes that currants fruit for years in large patio pots or as space-saving cordons on a fence, and gives the summer cut to five leaves and the winter cuts. The step-by-step training, the cane height, the double cordon and the advice that cordons suit containers come from the RHS guide to pruning and training red and white currants; the pot, potting mix and planting season from the RHS redcurrant guide. Tying the cane in two places and capping it are safety points we added. This cordon has not been grown by Natura.' ),
			),

			'grow-a-squash-up-a-trellis-in-a-pot' => array(
				'image_prompt' => 'A trailing winter squash climbing a sturdy wooden trellis fixed to a sunny balcony wall above a large black container, broad rounded lobed leaves, a bright yellow trumpet-shaped flower, and two small round orange-red squashes the size of a grapefruit each resting in a hammock of reused citrus netting tied to the trellis, late summer light.' . $photo_end,
				'pin_prompt'   => 'A small orange squash hanging in a netting sling on a trellis, large lobed leaves around it, a balcony wall behind, photographed vertically.' . $pin_end,
				'title'        => 'Grow a Squash up a Trellis in a Pot',
				'category'     => array( 'vertical' ),
				'plants'       => array( 'winter-squash-in-pots' ),
				'excerpt'      => 'Choose a trailing squash with small fruits, set it in a container 18 in (45 cm) wide or more once all danger of frost has passed, and tie its stems to a strong trellis, wires or tepee as they grow. Once the fruits get heavy, cradle each one in a sling of netting or burlap tied to the support.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => 'An hour to set up, then weekly tying in',
					'cost'           => 'Low',
					'size'           => 'Container at least 18 in (45 cm) wide, plus a tall, strong support',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Squash fruits are heavy and the leaves are large. The trellis or frame must be strong enough for the plant and its crop, and any wall fixings need permission and solid masonry.' ),
						array( 'point' => 'Never let the vine climb the railing or trail over the edge: a fruit falling from a balcony could hurt someone below.' ),
						array( 'point' => 'A tall frame clothed in big leaves catches the wind. Use the most sheltered sunny spot, against a wall, and check the ties after windy weather.' ),
						array( 'point' => 'A large container of wet potting mix is heavy. Place it before filling, near a load-bearing wall.' ),
					),
					'materials' => array(
						array( 'name' => 'Container with drainage holes, at least 18 in (45 cm) wide', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'quantity' => 'Enough to fill the container', 'url' => '' ),
						array( 'name' => 'Strong trellis or wall wires, or a sturdy tepee of canes or hazel stakes', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Trailing, small-fruited squash seed or a young plant', 'quantity' => '1 plant', 'url' => '' ),
						array( 'name' => 'Soft natural twine', 'quantity' => '1 ball', 'url' => '' ),
						array( 'name' => 'Reused citrus netting bags or pieces of burlap, for slings', 'quantity' => 'One per fruit', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Knife or hand pruners, for harvesting', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Pick a trailing variety', 'text' => 'Only trailing squashes climb: bush types stay low and will not. Smaller-fruited ones are the best choice for growing upward, because heavy fruit strains the plant and the support.', 'tip' => 'Check the packet for the words trailing or climbing.' ),
						array( 'title' => 'Start seeds indoors in spring', 'text' => 'In mid-spring, sow one seed on its side, ½ in (13 mm) deep, in a 3 in (7.5 cm) pot, and keep it at 65–70 °F (18–21 °C). Or buy a young plant in late spring.', 'tip' => '' ),
						array( 'title' => 'Set up the support', 'text' => 'Fix the trellis or wires to the wall behind the container, or push a sturdy tepee deep into it, before planting. Fill the container with peat-free potting mix in its final, warm, sunny spot.', 'tip' => '' ),
						array( 'title' => 'Plant out after the frost', 'text' => 'Harden the plant off, then plant it in the center of the container once all danger of frost has passed. Firm it gently and water well.', 'tip' => 'Leave space around the container so air can move around the leaves.' ),
						array( 'title' => 'Tie in as it grows', 'text' => 'Every few days, guide the long stems onto the support and tie them loosely with soft twine. Tendrils help, but the heavy stems still need ties.', 'tip' => '' ),
						array( 'title' => 'Sling the fruits', 'text' => 'When a fruit starts to swell, slip a piece of netting or burlap under it like a hammock and tie both ends to the support, so the stalk does not take all the weight.', 'tip' => '' ),
						array( 'title' => 'Fertilize, then harvest before frost', 'text' => 'Once the first fruits swell, give a high-potassium liquid fertilizer every 10–14 days. Leave winter squashes on the plant as long as possible, then cut them with at least 4 in (10 cm) of stalk before any frost, and set them in the sun for a week or two to harden the skins.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Which squash varieties can be trained upwards in a pot?', 'answer' => 'Backyard Harvest names \'Sweet Dumpling\', with fruit the size of tennis balls, as one that can be grown in containers up a tepee, and \'Uchiki Kuri\', a small pumpkin-like squash, as one that can be trained upward where space is short. An RHS adviser has also grown butternut and turban squashes as climbers. Check that a variety is still sold before planning on it.' ),
						array( 'question' => 'Is a pot really big enough for a squash?', 'answer' => 'The RHS is cautious: squashes need plenty of room and most do best in the ground, though smaller varieties can be grown in large containers. Growing one upward saves floor space, but it still needs a container at least 18 in (45 cm) wide and generous watering.' ),
						array( 'question' => 'Can anything else share the container?', 'answer' => 'Early on, a few fast salad greens or radishes can fill the bare potting mix around the base and be picked before the squash spreads.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow squashes', 'url' => 'https://www.rhs.org.uk/vegetables/squash/grow-your-own' ),
						array( 'title' => 'RHS — How to grow pumpkins', 'url' => 'https://www.rhs.org.uk/vegetables/pumpkins/grow-your-own' ),
						$rhs_veg_sup,
						$rhs_balcony,
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A trailing squash sends out stems that would sprawl for several yards (meters) across the ground. Tied to a vertical support, the same stems take up a strip of wall instead of a square of floor, and the fruits hang clear of the floor. The price is a sturdy support and regular tying in.' ) .
					$h2( 'Care in a container' ) .
					$p( 'A big squash plant in a pot is thirsty, especially once it fruits, and dry potting mix encourages <a href="/problems/powdery-mildew/">powdery mildew</a>; see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>. Starting seeds and moving young plants outside follow the same pattern as for <a href="/plants/zucchini-in-pots/">zucchini in pots</a>; see also <a href="/how-to-start-seeds-indoors/">how to start seeds indoors</a> and <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 88, 112, 115 and 125) suggests training small-fruited winter squashes up tepees or trellis where space is short, names two varieties for this, and shows quick salads grown around the base of tepees. The RHS squash and pumpkin guides give the container size, sowing, planting after frost, fertilizing, harvesting and the need for strong supports and netting under heavy fruit; the slings and the butternut and turban examples come from an RHS adviser\'s feature on veg supports. Keeping the vine off the railing is a safety point we added. We have not grown a squash this way ourselves.' ),
			),
		),
	),
);
