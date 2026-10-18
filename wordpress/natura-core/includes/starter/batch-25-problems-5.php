<?php
/**
 * Starter guides, batch 25: fruit, pea and leek pests. Pea moth, pea and
 * bean weevil, leek moth, birds, wasps, codling moth, brown rot and tomato
 * ghost spot.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from two university extension pages for ghost spot (the RHS has no
 * page on it), and from Jo Whittingham, Backyard Harvest (DK, 2011),
 * pp. 236–244; see design/sources/BACKYARD-HARVEST.md. Only controls the
 * RHS describes for home gardeners are given: barriers, hand methods,
 * pheromone traps and nematodes. The RHS lists no fungicide for brown rot
 * or grey mould. How to build a net stays in the net-a-fruit-bush project
 * and is linked, not repeated. Months are for a temperate climate such as
 * the UK.
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
	'name'   => __( 'Fruit, pea and leek pests', 'natura-core' ),
	'guides' => array(
		'problem' => array(

			'pea-moth' => array(
				'image_prompt' => 'A hand holding a freshly split green pea pod over a balcony table in July, showing a row of round green peas with one pea half eaten and a small creamy white caterpillar with tiny dark dots curled beside it, a few crumbs of brown droppings in the pod, a trough of tall pea plants with white flowers and green pods climbing netting on canes in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A trough of climbing pea plants on a sunny balcony, covered with fine white insect-proof mesh held on canes, with an opened pea pod showing a small pale caterpillar on the table in front, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Eating the Peas Inside My Pods? (Pea Moth)',
				'excerpt'      => 'A small creamy caterpillar with dark dots, found among half-eaten peas and crumbly droppings when you shell them, is the larva of the pea moth. Nothing can be done once it is inside, so next year cover flowering peas with fleece or insect-proof mesh, or sow so they flower before or after June and July.',
				'plants'       => array( 'peas-in-pots' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Pea moth caterpillars feeding in the pod',
							'sign'     => 'Shelled pods hold one or more creamy white caterpillars, up to 14 mm long with small dark dots, eating into the peas, with heaps of droppings close by',
							'check'    => 'The moth is small and grey-brown, about 15 mm across the wings, and you are unlikely to notice it. It is active from June to July and seeks out pea plants in flower, laying its eggs there. The caterpillars bore into the young pods and feed on the seeds.',
							'fix'      => 'Throw away the spoiled peas and eat the clean ones. The RHS describes prevention only: plan before you sow next year, using a cover or a change of timing (see below).',
							'recovery' => 'The plant itself is not harmed, and pods that escaped the moth are fine.',
						),
						array(
							'cause'    => 'Earlier damage, caterpillar already gone',
							'sign'     => 'Peas with chewed hollows and droppings in the pod, but no caterpillar',
							'check'    => 'Once fully fed, in mid to late summer, the caterpillars leave the pod and drop into the soil or compost to pupate, so late-picked pods may show only the damage.',
							'fix'      => 'As above: prevention next season.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Insect-proof mesh or horticultural fleece', 'badge' => '', 'note' => 'Drape over the pea supports while the plants flower so the moths cannot lay eggs.', 'url' => '' ),
						array( 'name' => 'Mangetout or quick-maturing pea seed', 'badge' => '', 'note' => 'Mangetout is picked before the seeds swell; fast varieties can be timed to flower outside June and July.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will covering my peas stop them setting pods?', 'answer' => 'No. Peas pollinate themselves, so the RHS points out that keeping bees and other insects off with fleece or mesh does not reduce the crop. Keep the cover on through flowering, when the moths lay their eggs.' ),
						array( 'question' => 'Does pea moth attack mangetout?', 'answer' => 'The RHS says mangetout types, eaten as flat pods before the seeds develop, should not be affected, since the caterpillars feed on the peas themselves.' ),
						array( 'question' => 'When should I sow peas to dodge pea moth?', 'answer' => 'Choose a quick-maturing variety and sow it early or late, so that it flowers before or after June and July, when the female moths are laying. Peas flowering in midsummer are the ones at risk.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Pea moth', 'url' => 'https://www.rhs.org.uk/biodiversity/pea-moth' ),
						array( 'title' => 'RHS — Insect-proof mesh', 'url' => 'https://www.rhs.org.uk/prevention-protection/insect-proof-mesh' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep pea moth out of your pods' ) .
					$list(
						array(
							'Cover peas that will flower in June or July with fleece or insect-proof mesh, tucked in all round the trough or pot.',
							'Sow a fast variety early in spring or in early summer so that it flowers outside the moth\'s laying period; sowing and supports are in <a href="/plants/peas-in-pots/">how to grow peas in pots</a>.',
							'Grow mangetout if pea moth spoils your shelling peas every year.',
							'Ragged, torn leaves rather than spoiled peas point to pigeons: see <a href="/problems/birds-eating-fruit/">birds pecking fruit and seedlings</a>. Notched leaf edges are <a href="/problems/pea-and-bean-weevil/">pea and bean weevil</a>.',
						)
					),
			),

			'pea-and-bean-weevil' => array(
				'image_prompt' => 'Close-up of young broad bean plants in a 30 cm terracotta pot on a patio in April, their oval grey-green leaflets with neat rows of small U-shaped notches bitten from the edges, one tiny grey-brown weevil about 5 mm long resting on a leaf edge, damp compost below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Young pea and broad bean seedlings in pots on a spring balcony, photographed vertically, with a close view of a leaf edge scalloped by small rounded notches. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Biting Little Notches Out of My Broad Bean and Pea Leaves? (Pea and Bean Weevil)',
				'excerpt'      => 'Neat U-shaped notches around the edges of broad bean and pea leaves in spring are made by the pea and bean weevil, a 4–5 mm grey-brown beetle. It looks alarming but rarely affects the crop: keep young plants growing strongly and the damage usually needs no action.',
				'plants'       => array( 'fava-beans-in-pots', 'peas-in-pots' ),
				'parts'        => array( 'leaves', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Adult pea and bean weevils',
							'sign'     => 'A series of rounded notches along the leaf margins and at the shoot tips, from April to July',
							'check'    => 'The weevils are greyish brown and 4–5 mm long. They fall to the ground when disturbed, so you will often see the bites but not the beetles.',
							'fix'      => 'Usually nothing. The RHS says the leaf area lost is small even when the foliage looks heavily nibbled, and established plants tolerate it.',
							'recovery' => 'Plants grow on normally. Only small seedlings that are badly eaten may be held back for a while.',
						),
						array(
							'cause'    => 'Weevil larvae on the roots',
							'sign'     => 'Nothing visible above ground',
							'check'    => 'The larvae are creamy white, legless grubs with pale brown heads. They feed underground on the nitrogen-fixing nodules on the roots. There is one generation a year, and new adults appear in late summer.',
							'fix'      => 'No action is needed: the RHS says root feeding does not usually affect growth in gardens.',
							'recovery' => '',
						),
						array(
							'cause'    => 'A cold, dry spring',
							'sign'     => 'Seedlings that sit still and look stunted, with or without notches',
							'check'    => 'The RHS notes that cold dry spells check growth more than the weevils do. Feel the compost: pots dry out quickly in spring winds.',
							'fix'      => 'Keep seedlings watered so they grow quickly through the vulnerable stage, and cover them with fleece or a cloche to help them outgrow the damage; the routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Horticultural fleece or a cloche', 'badge' => '', 'note' => 'Shelters young plants so they grow away from the damage.', 'url' => '' ),
						array( 'name' => 'Small pots or modules for sowing', 'badge' => '', 'note' => 'Raise sturdy young plants before moving them to their final container.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Should I spray broad beans with notched leaves?', 'answer' => 'No. The RHS says control is usually unnecessary because the plants tolerate the feeding. Healthy, well-watered seedlings are the best defence.' ),
						array( 'question' => 'Is the pea and bean weevil related to vine weevil?', 'answer' => 'Yes, both are broad-nosed weevils, but they behave differently. Pea and bean weevil grubs nibble root nodules of peas and beans with little effect, while vine weevil grubs eat the roots of many pot plants. See <a href="/problems/black-vine-weevil/">vine weevil</a> if you find C-shaped grubs in a pot.' ),
						array( 'question' => 'How can I give beans a head start if weevils are bad here?', 'answer' => 'The book suggests raising young plants in small pots before planting them out, so they are bigger when the weevils find them; see <a href="/plant-care/how-to-start-seeds-indoors/">how to sow seeds indoors</a>.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Pea and bean weevils', 'url' => 'https://www.rhs.org.uk/biodiversity/pea-and-bean-weevils' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to help peas and beans shrug off weevils' ) .
					$list(
						array(
							'Raise seedlings in small pots and move them into their final container once they are sturdy.',
							'Keep the compost moist in dry spring weather, so plants grow quickly past the seedling stage.',
							'Use fleece or a cloche in cold spells; harden plants off afterwards, as in <a href="/plant-care/how-to-harden-off-seedlings/">how to harden off seedlings</a>.',
							'Irregular holes with slime trails are <a href="/problems/slugs-and-snails/">slugs and snails</a>, not weevils. More on the crops is in <a href="/plants/fava-beans-in-pots/">broad beans in pots</a> and <a href="/plants/peas-in-pots/">peas in pots</a>.',
						)
					),
			),

			'leek-moth' => array(
				'image_prompt' => 'Close-up of leeks growing in a deep 30 cm round container on a balcony in late summer, the blue-green flat leaves showing pale whitish papery patches and a small net-like white silk cocoon stuck to one leaf, a leaf split open to reveal a tunnel inside the stem. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A deep pot of leeks on a sunny balcony covered with fine insect-proof mesh on hoops, with one damaged leek leaf in front showing white patches and a silk cocoon, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Leek Leaves Have White Patches and Tunnels? (Leek Moth and Allium Leaf Miner)',
				'excerpt'      => 'White patches on leek, onion or garlic leaves, followed by tunnels in the stems and rotting, come from small caterpillars of the leek moth or maggots of the allium leaf miner. Squash any silk cocoons you see, and keep the pot under fine insect-proof mesh while the insects are laying.',
				'plants'       => array( 'leeks-in-pots', 'onions-and-shallots-in-pots', 'garlic-in-pots', 'chives-in-pots' ),
				'parts'        => array( 'leaves', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Leek moth caterpillars',
							'sign'     => 'White patches where the inside of the leaf has been eaten, then tunnels in leek stems or in onion, shallot and garlic bulbs; small white net-like cocoons on the leaves',
							'check'    => 'Split a damaged leaf. Leek moth caterpillars are creamy white with brown heads and small legs, up to 11 mm long when fully grown. They feed in May to June and again, in larger numbers, from August to October. Young caterpillars mine the leaves; older ones bore into the stems.',
							'fix'      => 'Look over the foliage for the silk cocoons and crush them. Leave ground beetles and rove beetles alone: they eat some of the pupae.',
							'recovery' => 'Young leeks can be killed, and damaged tissue often rots.',
						),
						array(
							'cause'    => 'Allium leaf miner maggots',
							'sign'     => 'Lines of tiny white dots along the leaves first, then twisted leaves, then rotting stems or bulbs, especially in autumn',
							'check'    => 'The dots are feeding punctures made by the adult fly. Its larvae are white maggots with no head or legs, and brown pupae about 3 mm long sit inside the stems and bulbs. The flies are most active from March to April and September to November, and also attack chives.',
							'fix'      => 'Pull and dispose of badly rotted plants, pupae and all. Protect the next crop with fine mesh at the times above.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Rot following the damage',
							'sign'     => 'Soft, smelly, slimy stems and bulbs',
							'check'    => 'Fungi and bacteria move into tissue damaged by either insect. The rot is often the first thing you notice.',
							'fix'      => 'Discard rotting plants. Do not refill the same container with alliums next year: pupae left in the old compost can hatch under a new cover. Start with fresh peat-free compost, as in <a href="/plant-care/potting-mix-for-containers/">compost for containers</a>.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Fine insect-proof mesh (about 0.8 mm) and hoops', 'badge' => '', 'note' => 'The RHS rates this size against leaf miners as well as moths. Secure the edges all round the pot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I tell leek moth from allium leaf miner?', 'answer' => 'Look at the larva. Leek moth caterpillars have a brown head and small legs and pupate in silk cocoons on the leaves. Leaf miner maggots have no visible head or legs, and leave small brown pupae inside the stem.' ),
						array( 'question' => 'How long should mesh stay over my leeks?', 'answer' => 'Against leek moth, the RHS advises keeping it on for the whole growing season. Against allium leaf miner alone, cover during the fly\'s egg-laying peaks in spring and autumn.' ),
						array( 'question' => 'Can allium leaf miner get into a pot of chives?', 'answer' => 'Yes. The RHS lists chives among its hosts, along with leeks, onions, shallots and garlic. Keep fine mesh over the pot in the spring and autumn laying periods.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Leek moth', 'url' => 'https://www.rhs.org.uk/biodiversity/leek-moth' ),
						array( 'title' => 'RHS — Allium leaf miner', 'url' => 'https://www.rhs.org.uk/biodiversity/allium-leaf-miner' ),
						array( 'title' => 'RHS — Insect-proof mesh', 'url' => 'https://www.rhs.org.uk/prevention-protection/insect-proof-mesh' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to protect leeks and onions in pots' ) .
					$list(
						array(
							'Cover the container with fine mesh on hoops from planting, before the first moths or flies arrive, and weigh or tie the edges down.',
							'Check the leaves weekly from May and squash any silk cocoons.',
							'Use fresh compost for alliums each year rather than replanting the same pot.',
							'Orange spots instead of white patches mean <a href="/problems/rust-on-leaves/">rust</a>. Growing advice is in <a href="/plants/leeks-in-pots/">leeks in pots</a>.',
						)
					),
			),

			'birds-eating-fruit' => array(
				'image_prompt' => 'A strawberry planter on a sunny balcony in June with ripe red strawberries, two of them pecked open with ragged holes, a blackbird perched on the balcony railing nearby, a frame of bamboo canes beside the planter ready for netting. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A balcony strawberry planter protected by taut dark netting stretched over a cane frame and tied round the pot, ripe red berries visible underneath, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Pecking My Strawberries and Pulling Up My Seedlings? (Birds)',
				'excerpt'      => 'Fruit with pecked holes or missing altogether, seedlings tugged out and leaves torn to the stalks are usually the work of birds, with pigeons the main leaf eaters. A physical barrier is the only reliable answer: taut netting on a frame for fruit, fleece or mesh for seedlings, put on before the birds find the crop.',
				'plants'       => array( 'balcony-strawberry', 'cherry-tree-in-pot', 'currants-in-pots', 'blueberries-in-pots', 'fig-tree-in-pot', 'grapevine-in-pot', 'plum-tree-in-pot', 'peas-in-pots', 'kale-in-pots', 'lettuce-in-pots' ),
				'parts'        => array( 'flowers-fruit', 'leaves', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Birds on ripening fruit',
							'sign'     => 'Strawberries, cherries, currants, figs, grapes or plums with beak-sized holes, or picked clean just as they colour',
							'check'    => 'Damage starts as the fruit ripens. Cherries and soft fruit are favourite targets. Squirrels raid strawberries and figs too.',
							'fix'      => 'Before the fruit colours, cover the plant with plastic-free or reused netting held above the fruit on canes, pulled taut and fastened firmly at the bottom; <a href="/diy-projects/net-a-fruit-bush/">net a fruit bush</a> shows the steps. Chicken wire over the frame also keeps squirrels off strawberries.',
							'recovery' => 'Fruit already pecked can still be eaten if you cut out the damage soon, but wounds let in <a href="/problems/brown-rot/">brown rot</a> and wasps.',
						),
						array(
							'cause'    => 'Birds on seedlings and young plants',
							'sign'     => 'Seedlings pulled up or snipped off, young lettuces pecked, new onion sets or garlic cloves lifted out of the pot',
							'check'    => 'This happens mostly in early spring, before plants have rooted firmly.',
							'fix'      => 'Cover freshly sown or planted pots with fleece, a cloche or fine mesh until the plants are established. Push lifted sets or cloves back in.',
							'recovery' => 'Resow any gaps.',
						),
						array(
							'cause'    => 'Pigeons on leaves',
							'sign'     => 'Kale, cabbage or pea leaves torn to shreds, often with only the stalks and main veins left',
							'check'    => 'Pigeons feed on many plants but are especially fond of the cabbage family and peas.',
							'fix'      => 'Keep fine-mesh netting or insect-proof mesh over the crop on hoops or canes. Mesh also keeps out caterpillars.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Plastic-free or reused netting', 'badge' => '', 'note' => 'Stretched taut over a frame, never draped loose on the plant.', 'url' => '' ),
						array( 'name' => 'Galvanised wire mesh with 1 cm gaps', 'badge' => '', 'note' => 'The RHS suggests stapling it to small wooden frames: heavier, but it does not tear and lasts for years.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece or a cloche', 'badge' => '', 'note' => 'Shields seedlings in early spring.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can netting hurt birds?', 'answer' => 'Yes, if it is loose. Birds get caught in slack or badly anchored nets and can be injured or killed. Keep the net taut, close every gap at the base, and check it daily. Very fine mesh, firmly secured, is among the safer options.' ),
						array( 'question' => 'Should I leave the net on after picking?', 'answer' => 'No. The RHS suggests removing it once the crop is in, so birds can come back and eat pests on the plants.' ),
						array( 'question' => 'Do I have to protect every plum on the tree?', 'answer' => 'Not always. The RHS notes that established plum trees often crop so well that some fruit can be shared with the birds. Net single branches if you only want part of the crop.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cherries', 'url' => 'https://www.rhs.org.uk/fruit/cherries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow plums', 'url' => 'https://www.rhs.org.uk/fruit/plums/grow-your-own' ),
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — How to grow lettuce', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — Insect-proof mesh', 'url' => 'https://www.rhs.org.uk/prevention-protection/insect-proof-mesh' ),
						array( 'title' => 'RHS — How to go plastic-free in your garden', 'url' => 'https://www.rhs.org.uk/garden-inspiration/get-gardening/how-to-go-plastic-free-in-your-garden' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep birds off your crops' ) .
					$list(
						array(
							'Protect fruit before it starts to colour, as the RHS advises for cherries and soft fruit.',
							'Use a frame so the net sits clear of the fruit, and tie the bottom edge round the pot.',
							'Cover new sowings and young salads in early spring, and keep mesh over kale and peas where pigeons visit.',
							'A small tree or bush in a pot can also spend the ripening weeks in a fruit cage or under cover.',
						)
					),
			),

			'wasps-on-fruit' => array(
				'image_prompt' => 'Ripe purple plums hanging on a small plum tree in a large 50 cm pot on a sunny patio in late August, one plum split with two yellow-and-black striped wasps feeding at the soft flesh, a nearby bunch of fruit enclosed in a pale muslin bag. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A potted grapevine on a sunny balcony in late summer with bunches of dark grapes, some wrapped in fine pale muslin bags tied at the stalk, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'How Do I Stop Wasps Eating My Plums, Grapes and Figs?',
				'excerpt'      => 'Social wasps turn to sweet, ripe fruit in late summer, biting into thin-skinned plums, grapes and pears and widening holes in apples. Slip fine mesh bags over the best bunches and fruits, pick carefully, and leave nests alone where you can: earlier in the year the same wasps eat caterpillars and aphids.',
				'plants'       => array( 'plum-tree-in-pot', 'grapevine-in-pot', 'fig-tree-in-pot', 'pear-tree-in-pot', 'apple-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Social wasps on soft-skinned fruit',
							'sign'     => 'Hollowed-out grapes, plums or pears with wasps feeding inside, from late summer',
							'check'    => 'In early summer the colony needs insects to feed its grubs. Later, as the nest passes its peak, the workers seek sugar instead, and on soft skins they can start the damage themselves.',
							'fix'      => 'Enclose some bunches or fruits in bags of muslin, old nylon tights or similar fine mesh, tied at the stalk.',
							'recovery' => 'Bagged fruit ripens normally. Cut away damaged parts of other fruit and use it soon.',
						),
						array(
							'cause'    => 'Wasps widening existing wounds',
							'sign'     => 'Apples with deep cavities and wasps inside, usually where there was already a peck mark',
							'check'    => 'Tough-skinned fruit such as apples is rarely broken into by wasps alone; birds or other animals usually make the first hole.',
							'fix'      => 'Protect fruit from birds first (see <a href="/problems/birds-eating-fruit/">birds pecking fruit and seedlings</a>).',
							'recovery' => '',
						),
						array(
							'cause'    => 'Fallen or overripe fruit nearby',
							'sign'     => 'Wasps gathering around windfalls in saucers, on the patio or under the pot',
							'check'    => 'Fruit on the ground is full of sugar and draws wasps in.',
							'fix'      => 'Move fallen fruit away from where children and pets play. The book suggests leaving a few damaged fruits well away from the plant to draw the wasps off.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Muslin fruit bags or clean old nylon tights', 'badge' => '', 'note' => 'Fine enough to keep wasps out of a grape bunch or a single fruit.', 'url' => '' ),
						array( 'name' => 'Gardening gloves', 'badge' => '', 'note' => 'For picking when wasps may be hidden in the fruit.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do wasp traps protect fruit?', 'answer' => 'The RHS describes a home-made trap: a jam jar half-filled with water and a little jam, covered with paper with a pencil-sized hole. Wasps go in and drown. It also says it is not clear whether traps reduce local numbers or simply attract more wasps from further away, so bagging fruit is the surer protection.' ),
						array( 'question' => 'Should I get rid of a wasp nest near my fruit?', 'answer' => 'Where possible, leave it. The RHS treats wasps as useful predators and pollinators, and every nest dies out in late summer or autumn. Wasps sting to defend a nest that is disturbed, so keep clear of the entrance.' ),
						array( 'question' => 'How do I pick figs without getting stung?', 'answer' => 'Look before you reach in. Wasps often feed inside cracks in ripe fruit, especially figs, pears and apples, and may sting if squeezed. Wear gloves and pick fruit as it ripens.' ),
						array( 'question' => 'What if I see a hornet with only one yellow stripe?', 'answer' => 'It may be a yellow-legged (Asian) hornet, a non-native species. The RHS advises not to go near it or its nest, and to report the sighting through the official non-native species channels.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Wasps including hornets', 'url' => 'https://www.rhs.org.uk/biodiversity/wasps-including-hornets' ),
						array( 'title' => 'RHS — Fruit: harvesting', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/harvesting' ),
						array( 'title' => 'RHS — What to do with your fallen fruit', 'url' => 'https://www.rhs.org.uk/garden-inspiration/grow-your-own/what-to-do-with-fallen-fruit' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to share less fruit with wasps' ) .
					$list(
						array(
							'Bag the best grape bunches and plums as they begin to soften.',
							'Keep birds off the fruit, since their pecks give wasps a way in.',
							'Clear windfalls from saucers and the floor around the pot.',
							'Do not disturb nests in compost bins, wall cavities or hedges; they are empty by late autumn.',
						)
					),
			),

			'codling-moth' => array(
				'image_prompt' => 'A ripe red and green apple cut in half on a wooden balcony table in August, showing a brown tunnel through the flesh to the core with dark crumbly droppings and a small white caterpillar with a brown head near the pips, a dwarf apple tree in a large pot in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A dwarf apple tree in a large container on a sunny patio with ripening apples and a small triangular pheromone trap hanging from a branch, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Is There a Worm in My Apples or Plums? (Codling Moth and Plum Moth)',
				'excerpt'      => 'A small caterpillar in the core of an apple or pear, with a tunnel and brown droppings, is codling moth; a pink one by a plum stone is its relative, the plum moth. Most trees lose only a few fruits, so accept some damage, encourage birds and beetles, and hang a pheromone trap in May to see when the moths are flying.',
				'plants'       => array( 'apple-tree-in-pot', 'pear-tree-in-pot', 'plum-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Codling moth (apples and pears)',
							'sign'     => 'A small hole in the side or at the eye end of a ripe apple or pear; inside, a tunnel to the core with droppings, and sometimes a white caterpillar with a brown head',
							'check'    => 'Moths lay eggs on or near the young fruit from June to mid-July. Each caterpillar feeds in the core for about four weeks, then leaves to spend the winter in leaf litter or under loose bark. Damaged fruit tends to ripen and fall early.',
							'fix'      => 'Tolerate a few spoiled fruits where you can. Hang a codling moth pheromone trap in the tree in early May, count the catch each week and follow the trap\'s instructions to time any further step. In September to October, after the caterpillars have left the fruit, a nematode biological control can be sprayed on the trunk, branches and the compost below.',
							'recovery' => 'Often only a small share of the crop is affected.',
						),
						array(
							'cause'    => 'Plum moth (plums, damsons and gages)',
							'sign'     => 'The first plums to ripen are slightly misshapen, with a pale pink, brown-headed caterpillar up to 12 mm long and light brown droppings around the stone',
							'check'    => 'Affected fruits ripen first, so damage can look worse early in the season; later fruit is usually much cleaner. Clear gum around the stone is a separate physiological problem, not the moth.',
							'fix'      => 'As for codling moth: tolerate some losses, hang a plum moth trap in early May, and use nematodes in September to October if needed.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Apple sawfly (young apples)',
							'sign'     => 'Fruitlets in late May and June with a hole oozing dark droppings, which then drop; or ripe apples with a ribbon-like scar running round the skin',
							'check'    => 'The larva tunnels under the skin of the young fruit before burrowing in. Scarred apples are usually still edible.',
							'fix'      => 'Usually no action: losses are light and can even act as useful fruit thinning on a heavily laden tree.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Codling moth or plum moth pheromone trap', 'badge' => '', 'note' => 'Hang in the tree in early May. Mainly for monitoring; on a tree with no others nearby it may catch enough males to cut egg numbers.', 'url' => '' ),
						array( 'name' => 'Fruit and vegetable protection nematodes', 'badge' => '', 'note' => 'A mail-order biological control for September to October, after the caterpillars leave the fruit.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will one pheromone trap clear codling moth from my apple tree?', 'answer' => 'Rarely. The RHS says these traps mainly show when the males are flying. On an isolated tree they may catch enough males to reduce fertile eggs, but moths from neighbouring gardens can still arrive.' ),
						array( 'question' => 'Can birds get stuck in a pheromone trap?', 'answer' => 'Traps are designed to keep birds out, but the RHS suggests adding a little bird netting around the trap to lower the risk further.' ),
						array( 'question' => 'Are nematodes worth it for one tree on a balcony?', 'answer' => 'Maybe not. The treatment kills caterpillars sheltering on the tree in autumn but gives no protection from moths flying in next year, so it is less useful where apples or plums grow in nearby gardens.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Codling moth', 'url' => 'https://www.rhs.org.uk/biodiversity/codling-moth' ),
						array( 'title' => 'RHS — Plum moth', 'url' => 'https://www.rhs.org.uk/biodiversity/plum-moth' ),
						array( 'title' => 'RHS — Apple sawfly', 'url' => 'https://www.rhs.org.uk/biodiversity/apple-sawfly' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep codling and plum moth damage low' ) .
					$list(
						array(
							'Hang a pheromone trap in early May and check it weekly.',
							'Welcome birds, ground beetles and other predators; leave some leaf litter where they can hunt.',
							'Damaged apples tend to drop early: pick them up and look for the exit hole.',
							'Holes in fruit let in <a href="/problems/brown-rot/">brown rot</a>; small sunken brown spots under the skin without a tunnel are <a href="/problems/bitter-pit/">bitter pit</a>. Tree care is in <a href="/plants/apple-tree-in-pot/">apple tree in a pot</a> and <a href="/plants/plum-tree-in-pot/">plum tree in a pot</a>.',
						)
					),
			),

			'brown-rot' => array(
				'image_prompt' => 'Close-up of a small plum tree in a large patio container in late summer, one plum on the branch covered in a spreading brown rot with rings of buff-cream raised pustules, a shrivelled dark mummified fruit hanging beside it, healthy purple plums nearby. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A rotting apple on a potted apple tree with concentric rings of pale buff spore pustules on brown skin, photographed vertically against soft green leaves. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Plums and Apples Rotting on the Tree? (Brown Rot)',
				'excerpt'      => 'Fruit that turns brown and soft from a wound, then sprouts rings of buff pustules or shrivels on the branch, has brown rot, a fungus of apples, pears, plums, cherries and other tree fruit. There is no garden fungicide for it: remove every rotten fruit straight away and prevent the wounds that let it in.',
				'plants'       => array( 'plum-tree-in-pot', 'apple-tree-in-pot', 'pear-tree-in-pot', 'cherry-tree-in-pot', 'peach-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Brown rot fungi entering through wounds',
							'sign'     => 'A brown rot spreading out from a hole or crack, from midsummer onwards, with buff-coloured pustules often arranged in rings, mainly in wet weather',
							'check'    => 'Look for the original wound: a bird peck, a codling moth hole or a scab crack. The rot can also pass from one fruit to its neighbour where they touch in a cluster.',
							'fix'      => 'Pick off and dispose of every rotten fruit as soon as you see it. Bury it at least 30 cm (1 ft) deep or put it in the council green waste if your council accepts it; do not leave it on the tree or in the pot.',
							'recovery' => 'Healthy fruit on the same tree ripens normally once the infected ones are removed.',
						),
						array(
							'cause'    => 'Mummified fruit left from last year',
							'sign'     => 'Dry, shrivelled fruits hanging on the branches in winter, sometimes with small sunken patches on the bark where they touch',
							'check'    => 'The fungus survives the winter in mummies and these small cankers, then releases spores in spring.',
							'fix'      => 'Remove every mummy you can find during winter, and cut out any cankered spurs.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Blossom wilt',
							'sign'     => 'In spring, flowers and leaves on whole fruiting spurs turn brown and wither soon after flowering',
							'check'    => 'The same fungi cause this at flowering time. How bad it is changes a lot from year to year with the weather at blossom time.',
							'fix'      => 'Prune out and dispose of affected spurs where practical, which reduces the fungus available to infect fruit later.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Sharp, clean secateurs', 'badge' => '', 'note' => 'For cutting out wilted spurs and cankers.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused fruit netting', 'badge' => '', 'note' => 'Fewer bird pecks means fewer ways in for the fungus.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I spray against brown rot?', 'answer' => 'No. The RHS says no fungicides are available to amateur gardeners for brown rot. Hygiene and preventing wounds are the controls.' ),
						array( 'question' => 'Which plums resist brown rot?', 'answer' => 'The RHS names \'Czar\', \'Jefferson\', \'Ontario\' and \'President\' as having some resistance. Ask whether a variety is suited to a pot before you buy it.' ),
						array( 'question' => 'Can I put rotten plums in my home compost?', 'answer' => 'The RHS recommends burying brown-rotted fruit at least 30 cm deep or sending it to council green waste, so the fungus does not carry over. On a balcony, the green waste bin is usually the practical choice.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Brown rot', 'url' => 'https://www.rhs.org.uk/disease/brown-rot' ),
						array( 'title' => 'RHS — Codling moth', 'url' => 'https://www.rhs.org.uk/biodiversity/codling-moth' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to stop brown rot spreading' ) .
					$list(
						array(
							'Check fruit every few days as it ripens and take off any with a brown patch.',
							'Strip mummies off the tree in winter.',
							'Protect fruit from birds and keep codling moth numbers down, as in <a href="/problems/codling-moth/">worms in apples and plums</a>.',
							'Look closely at tight clusters, where rot passes from one fruit to the next.',
							'A fuzzy grey coat on soft fruit is <a href="/problems/gray-mold/">grey mould</a>, not brown rot. Plum care is in <a href="/plants/plum-tree-in-pot/">plum tree in a pot</a>.',
						)
					),
			),

			'tomato-ghost-spot' => array(
				'image_prompt' => 'Close-up of a truss of cherry tomatoes on a plant in a 30 litre pot on a sheltered balcony, some fruit still green and some ripening red, with several faint pale whitish rings a few millimetres across on the green fruit and yellowish rings on a red one, each ring with a tiny dark speck in the centre. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A tomato plant in a large pot on a sunny balcony, photographed vertically, with a close view of a green tomato marked by small pale ghostly rings. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Pale Rings on My Tomatoes? (Ghost Spot)',
				'excerpt'      => 'Small pale rings, white on green tomatoes and yellowish on ripe ones, often with a tiny dark speck in the middle, are ghost spot: grey mould spores that landed on the fruit and failed to infect it. The fruit is safe to eat, but it is a sign that the fungus is close, so improve air flow and clear away dead leaves and flowers.',
				'plants'       => array( 'cherry-tomato' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Grey mould spores that did not take hold',
							'sign'     => 'Faint pale halos about 3–8 mm across on the fruit skin, several on one tomato, sometimes with a small dark fleck at the centre',
							'check'    => 'The rings are caused by Botrytis cinerea, the grey mould fungus. When a spore lands on the fruit and conditions do not suit it, the infection stops and leaves only the ring. Cool, humid weather and fruit that stays wet favour it.',
							'fix'      => 'No treatment is needed for the marked fruit. Remove dead and dying leaves, flowers and any rotting fruit from the plant and the pot, and give the plant more air.',
							'recovery' => 'The spots do not go on to rot, and the tomato is fine to eat.',
						),
						array(
							'cause'    => 'Grey mould nearby',
							'sign'     => 'Fuzzy grey-brown mould on old flowers, leaves or stems of the same plant',
							'check'    => 'Ghost spots warn that grey mould spores are being produced close by. If conditions stay damp, the fungus can attack fruit and stems directly.',
							'fix'      => 'Bag and remove the mouldy parts carefully, as the spores spread easily; see <a href="/problems/gray-mold/">grey mould</a>. The RHS lists no fungicide for it.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Soft garden twine and a cane', 'badge' => '', 'note' => 'Tying the plant in keeps fruit and leaves off wet compost and lets air through.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I eat tomatoes with ghost spot?', 'answer' => 'Yes. The rings are only skin marks left by a failed infection; the flesh does not rot.' ),
						array( 'question' => 'Is ghost spot the same as tomato blight?', 'answer' => 'No. Ghost spot gives small, neat pale rings on otherwise firm fruit. Blight causes brown rotting patches on leaves, stems and fruit that spread fast; see <a href="/problems/tomato-blight/">tomato blight</a>.' ),
						array( 'question' => 'Why do my tomatoes get ghost spot under cover?', 'answer' => 'Greenhouses, porches and covered balconies can stay humid, which suits the grey mould fungus. Open vents and doors on mild days, avoid splashing the fruit when watering, and do not crowd the pots.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Grey mould', 'url' => 'https://www.rhs.org.uk/disease/gray-mold' ),
						array( 'title' => 'UConn Extension — Fungal leaf and fruit spots of tomatoes II', 'url' => 'https://ipm.cahnr.uconn.edu/fungal-leaf-fruit-spots-of-tomatoes-ii/' ),
						array( 'title' => 'Pacific Northwest Plant Disease Management Handbook — Tomato, gray mold (ghost spot)', 'url' => 'https://pnwhandbooks.org/node/3618' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent ghost spot on tomatoes' ) .
					$list(
						array(
							'Water the compost rather than the leaves and fruit, so the plant stays dry.',
							'Space pots apart and remove some lower leaves so air moves round the trusses.',
							'Keep the pot and the floor around it tidy: pick up fallen leaves, petals and spoiled fruit.',
							'Growing details are in <a href="/plants/cherry-tomato/">cherry tomatoes in pots</a>; dark sunken patches at the base of the fruit are <a href="/problems/blossom-end-rot/">blossom end rot</a>.',
						)
					),
			),
		),
	),
);
