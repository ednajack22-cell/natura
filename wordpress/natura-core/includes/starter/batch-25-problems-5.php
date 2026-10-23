<?php
/**
 * Starter guides, batch 25: fruit, pea and leek pests. Pea moth, pea leaf
 * weevil, leek moth, birds, wasps, codling moth, brown rot and tomato ghost
 * spot. Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from the UC IPM, Cornell Cooperative Extension, Penn State
 * Extension, University of Minnesota Extension and University of Georgia
 * pages cited in the pea moth, pea leaf weevil, leek moth, wasp, codling
 * moth and brown rot guides (checked 19 October 2026), from two university
 * extension pages for ghost spot (the RHS has no page on it), and from Jo
 * Whittingham, Backyard Harvest (DK, 2011), pp. 236–244; see
 * design/sources/BACKYARD-HARVEST.md. Controls are the barriers, hand
 * methods, traps, bagging and biological controls the RHS or a US extension
 * describes for home gardeners; UK-only pests and controls are labeled as
 * such. The only fungicide mention is for brown rot, where University of
 * Minnesota Extension allows one for home orchards after sanitation has
 * failed; the RHS lists none for UK gardeners. How to build a net stays in
 * the net-a-fruit-bush project and is linked, not repeated. Seasons replace
 * the UK month names.
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
				'image_prompt' => 'A hand holding a freshly split green pea pod over a balcony table in early summer, showing a row of round green peas with one pea half eaten and a small creamy white caterpillar with tiny dark dots curled beside it, a few crumbs of brown droppings in the pod, a trough of tall pea plants with white flowers and green pods climbing netting on stakes in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A trough of climbing pea plants on a sunny balcony, covered with fine white insect-proof mesh held on stakes, with an opened pea pod showing a small pale caterpillar on the table in front, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Eating the Peas Inside My Pods? (Pea Moth)',
				'excerpt'      => 'A small creamy caterpillar with dark dots, found among half-eaten peas and crumbly droppings when you shell them, is the larva of the pea moth. Nothing can be sprayed once it is inside, so pick out the larvae and spoiled pods now, and next year cover flowering peas with row cover or insect-proof mesh, or sow so they flower before or after early and midsummer.',
				'plants'       => array( 'peas-in-pots' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Pea moth caterpillars feeding in the pod',
							'sign'     => 'Shelled pods hold one or more creamy white caterpillars, up to about 1/2 in (14 mm) long with small dark dots, eating into the peas, with heaps of droppings close by',
							'check'    => 'The moth is small and gray-brown, about 5/8 in (15 mm) across the wings, and you are unlikely to notice it. In the UK it is active in early and midsummer and seeks out pea plants in flower, laying its eggs there. The caterpillars bore into the young pods and feed on the seeds.',
							'fix'      => 'Throw away the spoiled peas and eat the clean ones. UC IPM, in California, says no insecticides are registered against pea moth on peas, and advises picking off the larvae and removing damaged pods. The RHS describes prevention only: plan before you sow next year, using a cover or a change of timing (see below).',
							'recovery' => 'The plant itself is not harmed, and pods that escaped the moth are fine.',
						),
						array(
							'cause'    => 'Earlier damage, caterpillar already gone',
							'sign'     => 'Peas with chewed hollows and droppings in the pod, but no caterpillar',
							'check'    => 'Once fully fed, in mid to late summer, the caterpillars leave the pod and drop into the soil or potting mix to pupate, so late-picked pods may show only the damage.',
							'fix'      => 'As above: prevention next season.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Insect-proof mesh or row cover', 'badge' => '', 'note' => 'Drape over the pea supports while the plants flower so the moths cannot lay eggs.', 'url' => '' ),
						array( 'name' => 'Snow pea or quick-maturing pea seed', 'badge' => '', 'note' => 'Snow peas (mangetout) are picked before the seeds swell; fast varieties can be timed to flower outside the moth\'s early to midsummer laying period.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will covering my peas stop them setting pods?', 'answer' => 'No. Peas pollinate themselves, so the RHS points out that keeping bees and other insects off with row cover or mesh does not reduce the crop. Keep the cover on through flowering, when the moths lay their eggs.' ),
						array( 'question' => 'Does pea moth attack snow peas?', 'answer' => 'The RHS says mangetout types (snow peas), eaten as flat pods before the seeds develop, should not be affected, since the caterpillars feed on the peas themselves.' ),
						array( 'question' => 'When should I sow peas to dodge pea moth?', 'answer' => 'Choose a quick-maturing variety and sow it early or late, so that it flowers before or after early and midsummer, when the female moths are laying. Peas flowering in midsummer are the ones at risk.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Pea moth', 'url' => 'https://www.rhs.org.uk/biodiversity/pea-moth' ),
						array( 'title' => 'RHS — Insect-proof mesh', 'url' => 'https://www.rhs.org.uk/prevention-protection/insect-proof-mesh' ),
						array( 'title' => 'UC IPM — Pea moth', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/pea-moth/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep pea moth out of your pods' ) .
					$list(
						array(
							'Cover peas that will flower in early or midsummer with row cover or insect-proof mesh, tucked in all around the trough or pot.',
							'Sow a fast variety early in spring or in early summer so that it flowers outside the moth\'s laying period; sowing and supports are in <a href="/plants/peas-in-pots/">how to grow peas in pots</a>.',
							'Grow snow peas if pea moth spoils your shelling peas every year.',
							'Ragged, torn leaves rather than spoiled peas point to pigeons: see <a href="/problems/birds-eating-fruit/">birds pecking fruit and seedlings</a>. Notched leaf edges are the <a href="/problems/pea-and-bean-weevil/">pea leaf weevil</a>.',
						)
					),
			),

			'pea-and-bean-weevil' => array(
				'image_prompt' => 'Close-up of young fava bean plants in a 12 in (30 cm) terracotta pot on a patio in spring, their oval gray-green leaflets with neat rows of small U-shaped notches bitten from the edges, one tiny gray-brown weevil about 3/16 in (5 mm) long resting on a leaf edge, damp potting mix below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Young pea and fava bean seedlings in pots on a spring balcony, photographed vertically, with a close view of a leaf edge scalloped by small rounded notches. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Biting Little Notches Out of My Fava Bean and Pea Leaves? (Pea Leaf Weevil)',
				'excerpt'      => 'Neat U-shaped notches around the edges of fava bean and pea leaves in spring are made by the pea leaf weevil (called the pea and bean weevil in the UK), a grayish-brown beetle about 3/16 in (4–5 mm) long. It looks alarming but rarely affects the crop: cover seedlings and keep young plants growing strongly, and the damage usually needs no action.',
				'plants'       => array( 'fava-beans-in-pots', 'peas-in-pots' ),
				'parts'        => array( 'leaves', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Adult pea leaf weevils',
							'sign'     => 'A series of rounded notches along the leaf margins and at the shoot tips, from mid-spring to midsummer',
							'check'    => 'The weevils are grayish brown and about 3/16 in (4–5 mm) long; UC IPM gives about 1/5 in. They fall to the ground when disturbed, so you will often see the bites but not the beetles.',
							'fix'      => 'Usually nothing. The RHS says the leaf area lost is small even when the foliage looks heavily nibbled, and established plants tolerate it. UC IPM says the worst injury is at the seedling stage, when severe infestations can chew young plants off at ground level, and that once plants are past the six-leaf stage treatment is not normally necessary.',
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
							'check'    => 'The RHS notes that cold dry spells check growth more than the weevils do. Feel the potting mix: pots dry out quickly in spring winds.',
							'fix'      => 'Keep seedlings watered so they grow quickly through the vulnerable stage, and cover them with row cover or a cloche to help them outgrow the damage; the routine is in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Row cover or a cloche', 'badge' => '', 'note' => 'Shelters young plants so they grow away from the damage; UC IPM recommends a protective cloth over seedlings.', 'url' => '' ),
						array( 'name' => 'Small pots or cell trays for sowing', 'badge' => '', 'note' => 'Raise sturdy young plants before moving them to their final container.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Should I spray fava beans with notched leaves?', 'answer' => 'No. The RHS says control is usually unnecessary because the plants tolerate the feeding, and UC IPM says treatment is not normally needed once plants pass the six-leaf stage. Healthy, well-watered seedlings are the best defense.' ),
						array( 'question' => 'Is the pea leaf weevil related to black vine weevil?', 'answer' => 'Yes, both are broad-nosed weevils, but they behave differently. Pea leaf weevil grubs nibble root nodules of peas and beans with little effect, while black vine weevil grubs eat the roots of many potted plants. See <a href="/problems/black-vine-weevil/">black vine weevil</a> if you find C-shaped grubs in a pot.' ),
						array( 'question' => 'How can I give beans a head start if weevils are bad here?', 'answer' => 'The book suggests raising young plants in small pots before planting them out, so they are bigger when the weevils find them; see <a href="/how-to-start-seeds-indoors/">how to start seeds indoors</a>.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Pea and bean weevils', 'url' => 'https://www.rhs.org.uk/biodiversity/pea-and-bean-weevils' ),
						array( 'title' => 'UC IPM — Pea leaf weevil', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/pea-leaf-weevil' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to help peas and beans shrug off weevils' ) .
					$list(
						array(
							'Raise seedlings in small pots and move them into their final container once they are sturdy.',
							'Keep the potting mix moist in dry spring weather, so plants grow quickly past the seedling stage.',
							'Use row cover or a cloche over seedlings and in cold spells; harden plants off afterwards, as in <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>.',
							'Irregular holes with slime trails are <a href="/problems/slugs-and-snails/">slugs and snails</a>, not weevils. More on the crops is in <a href="/plants/fava-beans-in-pots/">fava beans in pots</a> and <a href="/plants/peas-in-pots/">peas in pots</a>.',
						)
					),
			),

			'leek-moth' => array(
				'image_prompt' => 'Close-up of leeks growing in a deep 12 in (30 cm) round container on a balcony in late summer, the blue-green flat leaves showing pale whitish papery patches and a small net-like white silk cocoon stuck to one leaf, a leaf split open to reveal a tunnel inside the stem. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A deep pot of leeks on a sunny balcony covered with fine insect-proof mesh on hoops, with one damaged leek leaf in front showing white patches and a silk cocoon, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Leek Leaves Have White Patches and Tunnels? (Leek Moth and Allium Leafminer)',
				'excerpt'      => 'White patches on leek, onion or garlic leaves, followed by tunnels in the stems and rotting, come from small caterpillars of the leek moth or maggots of the allium leafminer, two pests from Europe now found in parts of the northeastern US. Squash any silk cocoons you see, and keep the pot under fine insect-proof mesh or row cover while the insects are laying.',
				'plants'       => array( 'leeks-in-pots', 'onions-and-shallots-in-pots', 'garlic-in-pots', 'chives-in-pots' ),
				'parts'        => array( 'leaves', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Leek moth caterpillars',
							'sign'     => 'White patches where the inside of the leaf has been eaten, then tunnels in leek stems or in onion, shallot and garlic bulbs; small white net-like cocoons on the leaves',
							'check'    => 'Split a damaged leaf. Leek moth caterpillars are creamy white to creamy yellow with brown heads and small legs, up to just under 1/2 in (11 mm) long when fully grown. In the UK they feed in late spring and early summer and again, in larger numbers, from late summer to mid-fall. Young caterpillars mine the leaves; older ones bore into the stems. Cornell Cooperative Extension reports the first US sighting in Plattsburgh, New York, in 2009, and notes that the adults spend the winter in plant debris.',
							'fix'      => 'Look over the foliage for the silk cocoons and crush them, along with any caterpillars you find. Leave ground beetles and rove beetles alone: they eat some of the pupae. At the end of the season, clear away old allium leaves and debris, where the adults overwinter.',
							'recovery' => 'Young leeks can be killed, and damaged tissue often rots.',
						),
						array(
							'cause'    => 'Allium leafminer maggots',
							'sign'     => 'Lines of tiny white dots along the leaves first, then twisted leaves, then rotting stems or bulbs, especially in fall',
							'check'    => 'The dots are feeding punctures made by the adult fly. Its larvae are white maggots with no head or legs, and brown pupae about 1/8 in (3 mm) long sit inside the stems and bulbs. In the UK the flies are most active in early to mid-spring and again from early to late fall, and also attack chives. Penn State Extension reports it in Pennsylvania since 2015 and in nearby states, with a spring and a fall flight.',
							'fix'      => 'Pull and dispose of badly rotted plants, pupae and all. Protect the next crop with fine mesh or floating row cover at the times above. Penn State Extension also suggests planting garlic as late in fall as you can, so it has made little growth before winter when the fall flight lays its eggs.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Rot following the damage',
							'sign'     => 'Soft, smelly, slimy stems and bulbs',
							'check'    => 'Fungi and bacteria move into tissue damaged by either insect. The rot is often the first thing you notice.',
							'fix'      => 'Discard rotting plants. Do not refill the same container with alliums next year: pupae left in the old potting mix can hatch under a new cover. Start with fresh peat-free potting mix, as in <a href="/potting-mix-for-containers/">potting mix for containers</a>.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Fine insect-proof mesh (about 1/32 in, or 0.8 mm) and hoops', 'badge' => '', 'note' => 'The RHS rates this size against leafminers as well as moths. Secure the edges all around the pot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I tell leek moth from allium leafminer?', 'answer' => 'Look at the larva. Leek moth caterpillars have a brown head and small legs and pupate in silk cocoons on the leaves. Leafminer maggots have no visible head or legs, and leave small brown pupae inside the stem.' ),
						array( 'question' => 'How long should mesh stay over my leeks?', 'answer' => 'Against leek moth, the RHS advises keeping it on for the whole growing season, and Cornell Cooperative Extension advises putting row cover on right after planting. The moths fly at night, so Cornell notes the cover can come off briefly by day for weeding. Against allium leafminer alone, cover during the fly\'s egg-laying peaks in spring and fall.' ),
						array( 'question' => 'Can allium leafminer get into a pot of chives?', 'answer' => 'Yes. The RHS and Penn State Extension both list chives among its hosts, along with leeks, onions, shallots and garlic. Keep fine mesh over the pot in the spring and fall laying periods.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Leek moth', 'url' => 'https://www.rhs.org.uk/biodiversity/leek-moth' ),
						array( 'title' => 'RHS — Allium leaf miner', 'url' => 'https://www.rhs.org.uk/biodiversity/allium-leaf-miner' ),
						array( 'title' => 'RHS — Insect-proof mesh', 'url' => 'https://www.rhs.org.uk/prevention-protection/insect-proof-mesh' ),
						array( 'title' => 'Cornell Cooperative Extension of Clinton County — Leek moth 2010 update', 'url' => 'https://www.uvm.edu/d10-files/documents/2024-06/leekmoth2011.pdf' ),
						array( 'title' => 'Penn State Extension — Plant garlic late to avoid allium leafminer', 'url' => 'https://extension.psu.edu/plant-garlic-late-to-avoid-allium-leafminer' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to protect leeks and onions in pots' ) .
					$list(
						array(
							'Cover the container with fine mesh or row cover on hoops from planting, before the first moths or flies arrive, and weigh or tie the edges down.',
							'Check the leaves weekly from late spring and squash any silk cocoons.',
							'Use fresh potting mix for alliums each year rather than replanting the same pot, and clear away old leaves at the end of the season.',
							'Orange spots instead of white patches mean <a href="/problems/rust-on-leaves/">rust</a>. Growing advice is in <a href="/plants/leeks-in-pots/">leeks in pots</a>.',
						)
					),
			),

			'birds-eating-fruit' => array(
				'image_prompt' => 'A strawberry planter on a sunny balcony in early summer with ripe red strawberries, two of them pecked open with ragged holes, a songbird perched on the balcony railing nearby, a frame of bamboo stakes beside the planter ready for netting. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A balcony strawberry planter protected by taut dark netting stretched over a stake frame and tied around the pot, ripe red berries visible underneath, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Pecking My Strawberries and Pulling Up My Seedlings? (Birds)',
				'excerpt'      => 'Fruit with pecked holes or missing altogether, seedlings tugged out and leaves torn to the stalks are usually the work of birds, with pigeons the main leaf eaters. A physical barrier is the only reliable answer: taut netting on a frame for fruit, row cover or mesh for seedlings, put on before the birds find the crop.',
				'plants'       => array( 'balcony-strawberry', 'cherry-tree-in-pot', 'currants-in-pots', 'blueberries-in-pots', 'fig-tree-in-pot', 'grapevine-in-pot', 'plum-tree-in-pot', 'peas-in-pots', 'kale-in-pots', 'lettuce-in-pots' ),
				'parts'        => array( 'flowers-fruit', 'leaves', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Birds on ripening fruit',
							'sign'     => 'Strawberries, cherries, currants, figs, grapes or plums with beak-sized holes, or picked clean just as they color',
							'check'    => 'Damage starts as the fruit ripens. Cherries and soft fruit are favorite targets. Squirrels raid strawberries and figs too.',
							'fix'      => 'Before the fruit colors, cover the plant with plastic-free or reused netting held above the fruit on stakes, pulled taut and fastened firmly at the bottom; <a href="/projects/net-a-fruit-bush/">net a fruit bush</a> shows the steps. Chicken wire over the frame also keeps squirrels off strawberries.',
							'recovery' => 'Fruit already pecked can still be eaten if you cut out the damage soon, but wounds let in <a href="/problems/brown-rot/">brown rot</a> and wasps.',
						),
						array(
							'cause'    => 'Birds on seedlings and young plants',
							'sign'     => 'Seedlings pulled up or snipped off, young lettuces pecked, new onion sets or garlic cloves lifted out of the pot',
							'check'    => 'This happens mostly in early spring, before plants have rooted firmly.',
							'fix'      => 'Cover freshly sown or planted pots with row cover, a cloche or fine mesh until the plants are established. Push lifted sets or cloves back in.',
							'recovery' => 'Resow any gaps.',
						),
						array(
							'cause'    => 'Pigeons on leaves',
							'sign'     => 'Kale, cabbage or pea leaves torn to shreds, often with only the stalks and main veins left',
							'check'    => 'Pigeons feed on many plants but are especially fond of the cabbage family and peas.',
							'fix'      => 'Keep fine-mesh netting or insect-proof mesh over the crop on hoops or stakes. Mesh also keeps out caterpillars.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Plastic-free or reused netting', 'badge' => '', 'note' => 'Stretched taut over a frame, never draped loose on the plant.', 'url' => '' ),
						array( 'name' => 'Galvanized wire mesh (hardware cloth) with 3/8 in (1 cm) gaps', 'badge' => '', 'note' => 'The RHS suggests stapling it to small wooden frames: heavier, but it does not tear and lasts for years.', 'url' => '' ),
						array( 'name' => 'Row cover or a cloche', 'badge' => '', 'note' => 'Shields seedlings in early spring.', 'url' => '' ),
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
							'Protect fruit before it starts to color, as the RHS advises for cherries and soft fruit.',
							'Use a frame so the net sits clear of the fruit, and tie the bottom edge around the pot.',
							'Cover new sowings and young salad greens in early spring, and keep mesh over kale and peas where pigeons visit.',
							'A small tree or bush in a pot can also spend the ripening weeks in a fruit cage or under cover.',
						)
					),
			),

			'wasps-on-fruit' => array(
				'image_prompt' => 'Ripe purple plums hanging on a small plum tree in a large 20 in (50 cm) pot on a sunny patio in late summer, one plum split with two yellow-and-black striped wasps feeding at the soft flesh, a nearby bunch of fruit enclosed in a pale muslin bag. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A potted grapevine on a sunny balcony in late summer with bunches of dark grapes, some wrapped in fine pale muslin bags tied at the stalk, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'How Do I Stop Wasps Eating My Plums, Grapes and Figs?',
				'excerpt'      => 'Social wasps, chiefly yellowjackets in the US, turn to sweet, ripe fruit in late summer, biting into thin-skinned plums, grapes and pears and widening holes in apples. Slip fine mesh bags over the best bunches and fruits, pick carefully, and leave nests alone where you can: earlier in the year the same wasps eat caterpillars and aphids.',
				'plants'       => array( 'plum-tree-in-pot', 'grapevine-in-pot', 'fig-tree-in-pot', 'pear-tree-in-pot', 'apple-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Social wasps on soft-skinned fruit',
							'sign'     => 'Hollowed-out grapes, plums or pears with wasps feeding inside, from late summer',
							'check'    => 'In early summer the colony needs insects to feed its grubs. Later, as the nest passes its peak, the workers seek sugar instead, and on soft skins they can start the damage themselves. UC IPM describes the same shift in yellowjackets, which by fall are mainly scavengers at ripe and overripe fruit.',
							'fix'      => 'Enclose some bunches or fruits in bags of muslin, old nylon pantyhose or similar fine mesh, tied at the stalk.',
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
							'sign'     => 'Wasps gathering around fallen fruit in saucers, on the patio or under the pot',
							'check'    => 'Fruit on the ground is full of sugar and draws wasps in.',
							'fix'      => 'Pick up fallen fruit, as UC IPM advises, and move it away from where children and pets play. The book suggests leaving a few damaged fruits well away from the plant to draw the wasps off.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Muslin fruit bags or clean old nylon pantyhose', 'badge' => '', 'note' => 'Fine enough to keep wasps out of a grape bunch or a single fruit.', 'url' => '' ),
						array( 'name' => 'Gardening gloves', 'badge' => '', 'note' => 'For picking when wasps may be hidden in the fruit.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do wasp traps protect fruit?', 'answer' => 'Not reliably. The RHS describes a homemade trap: a jam jar half-filled with water and a little jam, covered with paper with a pencil-sized hole. Wasps go in and drown. It also says it is not clear whether traps reduce local numbers or simply attract more wasps from farther away. UC IPM says store-bought yellowjacket lure traps can cut the number of foraging workers nearby but do not eliminate large populations. Bagging fruit is the surer protection.' ),
						array( 'question' => 'Should I get rid of a wasp nest near my fruit?', 'answer' => 'Where possible, leave it. The RHS treats wasps as useful predators and pollinators, and UC IPM says most social wasps should be protected where they nest away from people, because they kill large numbers of pest insects. Every nest dies out in late summer or fall. Wasps sting to defend a nest that is disturbed, so keep clear of the entrance.' ),
						array( 'question' => 'How do I pick figs without getting stung?', 'answer' => 'Look before you reach in. Wasps often feed inside cracks in ripe fruit, especially figs, pears and apples, and may sting if squeezed. Wear gloves and pick fruit as it ripens.' ),
						array( 'question' => 'What if I see a hornet with only one yellow stripe?', 'answer' => 'It may be a yellow-legged hornet (Vespa velutina, called the Asian hornet in the UK), a non-native species. Do not go near it or its nest. In the UK, the RHS advises reporting the sighting through the official non-native species channels. In the US, it was first confirmed in Savannah, Georgia, in 2023, and the Georgia Department of Agriculture, the USDA and the University of Georgia ask the public to report sightings; your local extension office can help.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Wasps including hornets', 'url' => 'https://www.rhs.org.uk/biodiversity/wasps-including-hornets' ),
						array( 'title' => 'RHS — Fruit: harvesting', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/harvesting' ),
						array( 'title' => 'RHS — What to do with your fallen fruit', 'url' => 'https://www.rhs.org.uk/garden-inspiration/grow-your-own/what-to-do-with-fallen-fruit' ),
						array( 'title' => 'UC IPM — Yellowjackets and other social wasps', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/yellowjackets-and-other-social-wasps/' ),
						array( 'title' => 'University of Georgia Extension — Non-native yellow-legged hornet confirmed in Georgia', 'url' => 'https://site.extension.uga.edu/colquitthomeowners/2023/09/non-native-yellow-legged-hornet-confirmed-in-georgia-u-s-for-the-first-time' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to share less fruit with wasps' ) .
					$list(
						array(
							'Bag the best grape bunches and plums as they begin to soften.',
							'Keep birds off the fruit, since their pecks give wasps a way in.',
							'Clear fallen fruit from saucers and the floor around the pot.',
							'Do not disturb nests in compost bins, wall cavities or hedges; they are empty by late fall.',
						)
					),
			),

			'codling-moth' => array(
				'image_prompt' => 'A ripe red and green apple cut in half on a wooden balcony table in late summer, showing a brown tunnel through the flesh to the core with dark crumbly droppings and a small white caterpillar with a brown head near the seeds, a dwarf apple tree in a large pot in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A dwarf apple tree in a large container on a sunny patio with ripening apples and a small triangular pheromone trap hanging from a branch, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Is There a Worm in My Apples or Plums? (Codling Moth and Plum Moth)',
				'excerpt'      => 'A small caterpillar in the core of an apple or pear, with a tunnel and brown droppings, is codling moth; in the UK, a pink one by a plum stone is its relative, the plum moth, while in the US a grub in a plum is more often the plum curculio. Most trees lose only a few fruits, so accept some damage, bag the best fruit, and hang a pheromone trap in spring to see when the moths are flying.',
				'plants'       => array( 'apple-tree-in-pot', 'pear-tree-in-pot', 'plum-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Codling moth (apples and pears)',
							'sign'     => 'A small hole in the side or at the blossom end of a ripe apple or pear; inside, a tunnel to the core with droppings, and sometimes a white to light pink caterpillar with a dark brown head',
							'check'    => 'Moths lay eggs on or near the young fruit in early to midsummer in the UK; in California, UC IPM reports two to four generations a year. Each caterpillar feeds in the core for about four weeks, then leaves to spend the winter in leaf litter or under loose bark. Damaged fruit tends to ripen and fall early.',
							'fix'      => 'Tolerate a few spoiled fruits where you can, and pick off and destroy infested fruit promptly, along with any that drop. On a small tree, UC IPM recommends bagging: when the fruit is 1/2–1 in across, about 4–6 weeks after bloom, thin to one fruit per cluster, slip each through a slit cut in the bottom of a paper lunch bag, staple the bag shut and remove it as the fruit begins to ripen. Hang a codling moth pheromone trap in the tree in spring, count the catch each week and follow the trap\'s instructions to time any further step. In the UK, the RHS also suggests a nematode biological control sprayed on the trunk, branches and the potting mix below in early to mid-fall, after the caterpillars have left the fruit.',
							'recovery' => 'Often only a small share of the crop is affected.',
						),
						array(
							'cause'    => 'Plum moth (plums, damsons and gages; UK)',
							'sign'     => 'The first plums to ripen are slightly misshapen, with a pale pink, brown-headed caterpillar up to 1/2 in (12 mm) long and light brown droppings around the stone',
							'check'    => 'Affected fruits ripen first, so damage can look worse early in the season; later fruit is usually much cleaner. Clear gum around the stone is a separate physiological problem, not the moth. In the US, Penn State Extension describes the plum curculio instead: a snout beetle whose yellowish-white, brown-headed larva, about 1/4 in long, feeds in the center of plums and other fruit. Look for a crescent-shaped cut in the skin where the egg was laid; infested fruit often drops early.',
							'fix'      => 'For plum moth in the UK: tolerate some losses, hang a plum moth trap in mid-spring, and use nematodes in early to mid-fall if needed. For plum curculio, Penn State Extension notes the beetle is commoner on trees next to woods and fence rows, and lists kaolin clay as a way to reduce it; pick up dropped fruit.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Apple sawfly (young apples)',
							'sign'     => 'Fruitlets in late spring and early summer with a hole oozing dark droppings, which then drop; or ripe apples with a ribbon-like scar running around the skin',
							'check'    => 'The larva tunnels under the skin of the young fruit before burrowing in. Scarred apples are usually still edible.',
							'fix'      => 'Usually no action: losses are light and can even act as useful fruit thinning on a heavily laden tree.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Codling moth or plum moth pheromone trap', 'badge' => '', 'note' => 'Hang in the tree in spring. Mainly for monitoring; on a tree with no others nearby it may catch enough males to cut egg numbers.', 'url' => '' ),
						array( 'name' => 'Paper lunch bags and a stapler', 'badge' => '', 'note' => 'For bagging young apples and pears, as UC IPM describes.', 'url' => '' ),
						array( 'name' => 'Fruit and vegetable protection nematodes (UK)', 'badge' => '', 'note' => 'A mail-order biological control for early to mid-fall, after the caterpillars leave the fruit.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will one pheromone trap clear codling moth from my apple tree?', 'answer' => 'Rarely. The RHS says these traps mainly show when the males are flying, and UC IPM agrees they are chiefly for monitoring. On an isolated tree they may catch enough males to reduce fertile eggs, but moths from neighboring yards can still arrive.' ),
						array( 'question' => 'Can birds get stuck in a pheromone trap?', 'answer' => 'Traps are designed to keep birds out, but the RHS suggests adding a little bird netting around the trap to lower the risk further.' ),
						array( 'question' => 'Are nematodes worth it for one tree on a balcony?', 'answer' => 'Maybe not. The treatment, sold in the UK, kills caterpillars sheltering on the tree in fall but gives no protection from moths flying in next year, so it is less useful where apples or plums grow in nearby yards. Bagging the fruit protects it without sprays, even in a bad year, UC IPM says.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Codling moth', 'url' => 'https://www.rhs.org.uk/biodiversity/codling-moth' ),
						array( 'title' => 'RHS — Plum moth', 'url' => 'https://www.rhs.org.uk/biodiversity/plum-moth' ),
						array( 'title' => 'RHS — Apple sawfly', 'url' => 'https://www.rhs.org.uk/biodiversity/apple-sawfly' ),
						array( 'title' => 'UC IPM — Codling moth', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/codling-moth/' ),
						array( 'title' => 'Penn State Extension — Plum curculio in the home fruit planting', 'url' => 'https://extension.psu.edu/plum-curculio-in-the-home-fruit-planting' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep codling and plum moth damage low' ) .
					$list(
						array(
							'Hang a pheromone trap in spring and check it weekly.',
							'Bag young apples and pears on a small tree once they are 1/2–1 in across.',
							'Welcome birds, ground beetles and other predators; leave some leaf litter where they can hunt.',
							'Damaged apples tend to drop early: pick them up and look for the exit hole.',
							'Holes in fruit let in <a href="/problems/brown-rot/">brown rot</a>; small sunken brown spots under the skin without a tunnel are <a href="/problems/bitter-pit/">bitter pit</a>. Tree care is in <a href="/plants/apple-tree-in-pot/">apple tree in a pot</a> and <a href="/plants/plum-tree-in-pot/">plum tree in a pot</a>.',
						)
					),
			),

			'brown-rot' => array(
				'image_prompt' => 'Close-up of a small plum tree in a large patio container in late summer, one plum on the branch covered in a spreading brown rot with rings of buff-cream raised pustules, a shriveled dark mummified fruit hanging beside it, healthy purple plums nearby. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A rotting apple on a potted apple tree with concentric rings of pale buff spore pustules on brown skin, photographed vertically against soft green leaves. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Plums and Apples Rotting on the Tree? (Brown Rot)',
				'excerpt'      => 'Fruit that turns brown and soft from a wound, then sprouts rings of buff pustules or shrivels on the branch, has brown rot, a fungus of apples, pears, plums, cherries and other tree fruit. Remove every rotten fruit straight away and prevent the wounds that let it in: hygiene is the main control, and in the UK there is no garden fungicide for it.',
				'plants'       => array( 'plum-tree-in-pot', 'apple-tree-in-pot', 'pear-tree-in-pot', 'cherry-tree-in-pot', 'peach-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Brown rot fungi entering through wounds',
							'sign'     => 'A brown rot spreading out from a hole or crack, from midsummer onwards, with buff-colored pustules often arranged in rings, mainly in wet weather',
							'check'    => 'Look for the original wound: a bird peck, a codling moth hole or a scab crack. The rot can also pass from one fruit to its neighbor where they touch in a cluster.',
							'fix'      => 'Pick off and dispose of every rotten fruit as soon as you see it. The RHS suggests burying it at least 1 ft (30 cm) deep or putting it in your municipal yard-waste collection (council green waste in the UK) if it accepts it; do not leave it on the tree or in the pot.',
							'recovery' => 'Healthy fruit on the same tree ripens normally once the infected ones are removed.',
						),
						array(
							'cause'    => 'Mummified fruit left from last year',
							'sign'     => 'Dry, shriveled fruits hanging on the branches in winter, sometimes with small sunken patches on the bark where they touch',
							'check'    => 'The fungus survives the winter in mummies and these small cankers, then releases spores in spring.',
							'fix'      => 'Remove every mummy you can find during winter, before the buds break, and cut out any cankered spurs.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Blossom wilt',
							'sign'     => 'In spring, flowers and leaves on whole fruiting spurs turn brown and wither soon after flowering',
							'check'    => 'The same fungi cause this at flowering time. How bad it is changes a lot from year to year with the weather at blossom time. University of Minnesota Extension notes that blossoms killed by brown rot usually stay on the branch, often with a drop of sticky gum, while frost-killed blossoms fall.',
							'fix'      => 'Prune out and dispose of affected spurs where practical, which reduces the fungus available to infect fruit later.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Sharp, clean pruning shears', 'badge' => '', 'note' => 'For cutting out wilted spurs and cankers.', 'url' => '' ),
						array( 'name' => 'Plastic-free or reused fruit netting', 'badge' => '', 'note' => 'Fewer bird pecks means fewer ways in for the fungus.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I spray against brown rot?', 'answer' => 'Start with hygiene: in the UK, the RHS says no fungicides are available to amateur gardeners for brown rot, so removing rotten fruit and preventing wounds are the controls. In the US, University of Minnesota Extension also puts cleanup and pruning first. Only if a tree has still had severe fruit rot in earlier years does it suggest a fungicide labeled for the crop, sprayed from 2–3 weeks before harvest and used exactly as the label says.' ),
						array( 'question' => 'Which plums resist brown rot?', 'answer' => 'The RHS names \'Czar\', \'Jefferson\', \'Ontario\' and \'President\' as having some resistance. Ask whether a variety is suited to a pot and to your area before you buy it.' ),
						array( 'question' => 'Can I put rotten plums in my home compost?', 'answer' => 'The RHS recommends burying brown-rotted fruit at least 1 ft (30 cm) deep or sending it to green waste collection, so the fungus does not carry over. On a balcony, the yard-waste or green waste bin is usually the practical choice.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Brown rot', 'url' => 'https://www.rhs.org.uk/disease/brown-rot' ),
						array( 'title' => 'RHS — Codling moth', 'url' => 'https://www.rhs.org.uk/biodiversity/codling-moth' ),
						array( 'title' => 'University of Minnesota Extension — Brown rot of stone fruit', 'url' => 'https://extension.umn.edu/plant-diseases/brown-rot-stone-fruit' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to stop brown rot spreading' ) .
					$list(
						array(
							'Check fruit every few days as it ripens and take off any with a brown patch.',
							'Strip mummies off the tree in winter, and pick up fallen fruit in summer.',
							'Protect fruit from birds and keep codling moth numbers down, as in <a href="/problems/codling-moth/">worms in apples and plums</a>.',
							'Look closely at tight clusters, where rot passes from one fruit to the next.',
							'A fuzzy gray coat on soft fruit is <a href="/problems/gray-mold/">gray mold</a>, not brown rot. Plum care is in <a href="/plants/plum-tree-in-pot/">plum tree in a pot</a>.',
						)
					),
			),

			'tomato-ghost-spot' => array(
				'image_prompt' => 'Close-up of a cluster of cherry tomatoes on a plant in an 8 gallon (30 litre) pot on a sheltered balcony, some fruit still green and some ripening red, with several faint pale whitish rings about 1/4 in across on the green fruit and yellowish rings on a red one, each ring with a tiny dark speck in the center. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A tomato plant in a large pot on a sunny balcony, photographed vertically, with a close view of a green tomato marked by small pale ghostly rings. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Pale Rings on My Tomatoes? (Ghost Spot)',
				'excerpt'      => 'Small pale rings, white on green tomatoes and yellowish on ripe ones, often with a tiny dark speck in the middle, are ghost spot: gray mold spores that landed on the fruit and failed to infect it. The fruit is safe to eat, but it is a sign that the fungus is close, so improve air flow and clear away dead leaves and flowers.',
				'plants'       => array( 'cherry-tomato' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Gray mold spores that did not take hold',
							'sign'     => 'Faint pale halos about 1/8–5/16 in (3–8 mm) across on the fruit skin, several on one tomato, sometimes with a small dark fleck at the center',
							'check'    => 'The rings are caused by Botrytis cinerea, the gray mold fungus. When a spore lands on the fruit and conditions do not suit it, the infection stops and leaves only the ring. Cool, humid weather and fruit that stays wet favor it.',
							'fix'      => 'No treatment is needed for the marked fruit. Remove dead and dying leaves, flowers and any rotting fruit from the plant and the pot, and give the plant more air.',
							'recovery' => 'The spots do not go on to rot, and the tomato is fine to eat.',
						),
						array(
							'cause'    => 'Gray mold nearby',
							'sign'     => 'Fuzzy gray-brown mold on old flowers, leaves or stems of the same plant',
							'check'    => 'Ghost spots warn that gray mold spores are being produced close by. If conditions stay damp, the fungus can attack fruit and stems directly.',
							'fix'      => 'Bag and remove the moldy parts carefully, as the spores spread easily; see <a href="/problems/gray-mold/">gray mold</a>. The RHS lists no fungicide for it for UK gardeners; good air flow and hygiene are the controls.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Soft garden twine and a stake', 'badge' => '', 'note' => 'Tying the plant in keeps fruit and leaves off wet potting mix and lets air through.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I eat tomatoes with ghost spot?', 'answer' => 'Yes. The rings are only skin marks left by a failed infection; the flesh does not rot.' ),
						array( 'question' => 'Is ghost spot the same as tomato blight?', 'answer' => 'No. Ghost spot gives small, neat pale rings on otherwise firm fruit. Blight causes brown rotting patches on leaves, stems and fruit that spread fast; see <a href="/problems/tomato-blight/">tomato blight</a>.' ),
						array( 'question' => 'Why do my tomatoes get ghost spot under cover?', 'answer' => 'Greenhouses, porches and covered balconies can stay humid, which suits the gray mold fungus. Open vents and doors on mild days, avoid splashing the fruit when watering, and do not crowd the pots.' ),
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
							'Water the potting mix rather than the leaves and fruit, so the plant stays dry.',
							'Space pots apart and remove some lower leaves so air moves around the fruit clusters.',
							'Keep the pot and the floor around it tidy: pick up fallen leaves, petals and spoiled fruit.',
							'Growing details are in <a href="/plants/cherry-tomato/">cherry tomatoes in pots</a>; dark sunken patches at the base of the fruit are <a href="/problems/blossom-end-rot/">blossom end rot</a>.',
						)
					),
			),
		),
	),
);
