<?php
/**
 * Starter guides, batch 13: more plant problems. Caterpillars and flea
 * beetles on brassicas, two seedling problems, and four fruiting problems.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026), from the University of Minnesota and Penn State extension pages
 * cited in the flower-drop guide, and from Jo Whittingham, Backyard Harvest
 * (DK, 2011), pp. 16, 137 and 236–244; see design/sources/BACKYARD-HARVEST.md.
 * No pesticide is recommended: the RHS lists no fungicide for home
 * gardeners against damping off, tomato blight or leaf mould, and splitting
 * is not a pest or disease. Months are for a temperate climate such as the UK.
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
	'name'   => __( 'More plant problems', 'natura-core' ),
	'guides' => array(
		'problem' => array(

			'caterpillars-on-brassicas' => array(
				'image_prompt' => 'Close-up of a curly kale plant with crinkled blue-green leaves growing in a 30 cm terracotta pot on a sunny balcony, several outer leaves chewed with ragged holes, a group of yellow and black hairy large white butterfly caterpillars feeding on one leaf, small dark droppings on the leaf below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A pot of curly kale on a balcony with holed leaves and yellow and black caterpillars on one leaf, a clutch of tiny yellow skittle-shaped eggs on the underside of another leaf, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Eating My Kale and Cabbage Leaves? (Cabbage Caterpillars)',
				'excerpt'      => 'Holes in the leaves of kale, cabbage, pak choi or nasturtiums, with green or yellow-and-black caterpillars and their droppings, are the work of cabbage white butterflies and cabbage moths. Pick off the eggs and caterpillars every few days, and cover the pot with fine netting that does not touch the leaves.',
				'plants'       => array( 'kale-in-pots', 'pak-choi-in-pots', 'nasturtiums-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Large white butterfly caterpillars',
							'sign'     => 'Yellow and black caterpillars with obvious hairs, feeding in groups, mostly on the outer leaves',
							'check'    => 'Look on both sides of the leaves for clusters of yellow, skittle-shaped eggs. The caterpillars are most often seen in June to July and again in August to September. They also feed on nasturtiums.',
							'fix'      => 'Pick off the egg clusters and the caterpillars by hand. If you find small yellow silk cocoons next to a shrivelled caterpillar, leave them: they belong to a tiny parasitic wasp that kills the caterpillars.',
							'recovery' => 'Eaten leaves stay holed. Once the caterpillars are gone, the plant keeps growing and you can go on picking the leaves that were not damaged.',
						),
						array(
							'cause'    => 'Small white butterfly caterpillars',
							'sign'     => 'Pale green caterpillars covered in short, velvety hairs; holes in the outer leaves and sometimes in the heart of a cabbage',
							'check'    => 'Small whites lay single yellow eggs on the undersides of leaves, so turn the leaves over to look. These caterpillars can bore into the centre of a cabbage, so check the heart as well as the outer leaves. Green-veined white caterpillars look similar but are found more often on wild plants than in gardens.',
							'fix'      => 'Pick off eggs and caterpillars every few days. Cover the pot with fine netting or fleece to stop the butterflies laying more eggs.',
							'recovery' => 'Damaged leaves do not heal; remove the worst of them and keep checking the new growth.',
						),
						array(
							'cause'    => 'Cabbage moth caterpillars',
							'sign'     => 'Yellowish-green or brownish-green caterpillars with no obvious hairs, often inside the heart of the plant',
							'check'    => 'Look for clusters of white, round eggs on either side of the leaves. Cabbage moth caterpillars are active from July to September.',
							'fix'      => 'Pick off the egg clusters and the caterpillars. Net the plants from spring so the moths cannot lay eggs on them.',
							'recovery' => 'Leaves the caterpillars have tunnelled into are best removed. Healthy outer growth is still worth picking.',
						),
						array(
							'cause'    => 'Diamond-back moth caterpillars',
							'sign'     => 'Small green caterpillars, about 1 cm (½ in) long when fully grown, that leave thin see-through windows in the leaves and drop off when disturbed',
							'check'    => 'These caterpillars turn up from midsummer onwards and can be numerous. The moth flies in from abroad and is not known to survive UK winters, so it is still uncommon in gardens.',
							'fix'      => 'Shake or pick the caterpillars off over a tray, and keep the plants netted.',
							'recovery' => 'The windowed patches stay. New leaves grow normally once the caterpillars are gone.',
						),
					),
					'products' => array(
						array( 'name' => 'Fine insect-proof mesh or netting', 'badge' => '', 'note' => 'Stops butterflies and moths laying eggs on the plants. It must not touch the leaves.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece', 'badge' => '', 'note' => 'An alternative to mesh for covering young plants.', 'url' => '' ),
						array( 'name' => 'Short canes or hoops', 'badge' => '', 'note' => 'Hold the net clear of the leaves on a pot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Why did I still find eggs under the netting?', 'answer' => 'The net was probably touching the leaves. Butterflies and moths can lay their eggs through netting that rests on the plant, so hold it clear on canes or hoops.' ),
						array( 'question' => 'Do I need to spray?', 'answer' => 'Usually not. The RHS suggests tolerating small numbers where you can, because the caterpillars feed birds and wasps. Hand-picking and netting are the main controls. A biological control made of nematodes is sold for caterpillars; the RHS advises using it with care, only when there is a specific problem, in cool, damp weather.' ),
						array( 'question' => 'When should I start checking?', 'answer' => 'From spring onwards, so you can act before numbers build up. White butterfly caterpillars are most often seen in June to July and again in August to September, and cabbage moth caterpillars from July to September.' ),
						array( 'question' => 'Are the caterpillars on my nasturtiums the same pest?', 'answer' => 'Yes. Large white butterfly caterpillars feed on nasturtiums as well as on kale, cabbage and other brassicas, so check and net them in the same way.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Cabbage caterpillars', 'url' => 'https://www.rhs.org.uk/biodiversity/cabbage-caterpillars' ),
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cabbages', 'url' => 'https://www.rhs.org.uk/vegetables/cabbages/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent caterpillar damage' ) .
					$list(
						array(
							'Cover brassicas with fine netting or fleece from spring, held on canes or hoops so it does not touch the leaves.',
							'On a balcony, a compact kale in a pot of at least 30 cm (1 ft) wide and deep is easy to net completely.',
							'White butterflies fluttering around your plants are a sign they are laying eggs: check the leaves that day.',
							'Turn the leaves over every few days and rub off any eggs before they hatch.',
							'Leave the yellow cocoons of the parasitic wasp where you find them.',
						)
					),
			),

			'flea-beetle-holes-in-leaves' => array(
				'image_prompt' => 'Close-up of young radish and rocket seedlings in a shallow trough on a sunny balcony, the small rounded leaves peppered with dozens of tiny round pits and pin holes, some dried to pale brown spots, a couple of tiny shiny black beetles on one leaf. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A trough of rocket and radish seedlings with leaves full of tiny round holes, a piece of fine white insect mesh folded back at one end, photographed vertically on a balcony. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Tiny Holes in My Radish and Rocket Leaves?',
				'excerpt'      => 'Lots of tiny, round holes in the leaves of radish, rocket, pak choi or young kale are made by flea beetles, small shiny beetles that jump away when you touch the plant. On bigger plants the damage is mostly cosmetic; seedlings are most at risk, and insect-proof mesh keeps the beetles off.',
				'plants'       => array( 'radishes-in-pots', 'salad-leaves-in-pots', 'pak-choi-in-pots', 'kale-in-pots', 'nasturtiums-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Flea beetles',
							'sign'     => 'Small round holes and pits in the leaves, often not going right through; the damaged spots dry and turn pale brown',
							'check'    => 'Brush your hand over the leaves and watch: the beetles are 2–3 mm (about 1/10 in) long, black or metallic green or blue, some with a yellow stripe, and they leap away when disturbed. They attack brassicas and their relatives, including radish, rocket, pak choi, kale and nasturtiums. They come out in mid-spring to feed on seedlings, and in late summer more can arrive from nearby farm crops.',
							'fix'      => 'On larger plants, tolerate them: the effect on the parts you eat is usually small, and you can discard the worst outer leaves. Cover seedlings and young plants with insect-proof mesh or fleece. Birds, frogs and ground beetles eat flea beetles and their grubs.',
							'recovery' => 'The holes stay, but older plants are only held back when there are a lot of beetles. The leaves are still fine to eat.',
						),
						array(
							'cause'    => 'Flea beetle grubs in the compost',
							'sign'     => 'Nothing visible on the plant; you may find small whitish-brown grubs among the roots when you empty the pot',
							'check'    => 'The grubs live in the soil and feed on roots, then turn into adults in midsummer.',
							'fix'      => 'Nothing to treat. Root feeding by the grubs does not usually cause noticeable damage in gardens.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Caterpillars rather than flea beetles',
							'sign'     => 'Larger, ragged holes, with caterpillars or their droppings on the leaves',
							'check'    => 'Flea beetle holes are tiny and round. If the holes are bigger and you can see green or yellow-and-black caterpillars, the culprit is cabbage white butterflies or cabbage moths.',
							'fix'      => 'Pick off the caterpillars and their eggs, and cover the plants with fine netting. See the guide to cabbage caterpillars.',
							'recovery' => 'Damaged leaves stay holed; new growth is clean once the caterpillars are removed.',
						),
					),
					'products' => array(
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Fine enough to keep tiny beetles off seedlings. Cover the pot at sowing time.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece', 'badge' => '', 'note' => 'Another way to cover young brassicas.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I eat leaves with flea beetle holes?', 'answer' => 'Yes. The damage is only cosmetic. If you want unmarked leaves, grow the crop under insect-proof mesh.' ),
						array( 'question' => 'Do flea beetles damage radish roots?', 'answer' => 'The adults feed on the leaves. Their grubs feed on roots, but in gardens this does not usually cause significant damage.' ),
						array( 'question' => 'When are flea beetles worst?', 'answer' => 'In spring and summer. The adults spend winter in leaf litter and come out in mid-spring, when seedlings are most at risk. In late summer, more beetles can move into gardens from farm crops such as oilseed rape.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Flea beetles on brassicas and allied plants', 'url' => 'https://www.rhs.org.uk/biodiversity/flea-beetles-on-brassicas-and-allied-plants' ),
						array( 'title' => 'RHS — How to grow pak choi', 'url' => 'https://www.rhs.org.uk/vegetables/pak-choi/grow-your-own' ),
						array( 'title' => 'RHS — Cabbage caterpillars', 'url' => 'https://www.rhs.org.uk/biodiversity/cabbage-caterpillars' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent flea beetle damage' ) .
					$list(
						array(
							'Cover pots of radish, rocket and pak choi with insect-proof mesh as soon as you sow, especially for spring sowings.',
							'Use a pot at least 30 cm (1 ft) wide for pak choi: smaller containers dry out too fast. A wide, shallow trough is also easy to cover with one piece of mesh.',
							'Check seedlings from mid-spring, when the beetles come out of winter shelter.',
							'Accept a few holes on larger plants: they do not stop the crop.',
						)
					),
			),

			'damping-off-seedlings' => array(
				'image_prompt' => 'A seed tray of young tomato seedlings with two smooth oval seed leaves on a bright kitchen windowsill, a patch in the middle of the tray where several seedlings have collapsed flat, their stems thin and pinched at the base, a faint white fungal fuzz on the compost around them, healthy upright seedlings at the edges. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A small pot of seedlings on a windowsill where a cluster has toppled over at compost level next to upright healthy seedlings, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Seedlings Collapsing? (Damping Off)',
				'excerpt'      => 'Seedlings that suddenly fall over and rot, often under a fuzz of white mould, have damping off, caused by fungi and fungus-like organisms that live in soil and dirty water. Collapsed seedlings cannot be saved, so sow again thinly in fresh compost and clean pots, water less, and give the seedlings fresh air.',
				'plants'       => array( 'cherry-tomato', 'chillies-in-pots', 'sweet-peppers-in-pots', 'salad-leaves-in-pots', 'lettuce-in-pots', 'genovese-basil' ),
				'parts'        => array( 'stems', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Seedlings sown too thickly',
							'sign'     => 'A patch of seedlings collapses and the gap spreads across the tray',
							'check'    => 'If the seedlings are touching each other, the air between them stays damp and the disease spreads from plant to plant.',
							'fix'      => 'Remove the collapsed seedlings. Sow the next batch thinly and evenly, and prick seedlings out into their own small pots as soon as they are big enough to handle.',
							'recovery' => 'Collapsed seedlings do not recover. Seedlings that are still upright and spaced out may carry on growing.',
						),
						array(
							'cause'    => 'Wet compost and damp, still air',
							'sign'     => 'Compost that never dries on the surface, condensation under the lid, and whitish mould on the fallen seedlings',
							'check'    => 'Is the lid or plastic bag still on after the seedlings came up? Are you watering every day whether the compost needs it or not?',
							'fix'      => 'Take off the lid or cover as soon as the seedlings appear. Water lightly, only when needed, and never leave the compost waterlogged. Keep them well ventilated, for example by opening a window nearby on mild days.',
							'recovery' => 'Seedlings that have already fallen will die. Drier compost and moving air protect the rest.',
						),
						array(
							'cause'    => 'Infected compost, pots or water',
							'sign'     => 'Seeds fail to come up, or come up patchily, and the problem returns with every sowing',
							'check'    => 'Are you reusing old pots and trays, using garden compost or soil, or watering with rainwater from an open butt? These can all carry the organisms that cause damping off.',
							'fix'      => 'Use fresh, commercial peat-free seed compost. Use new pots, or wash old ones, scrub off the soil and treat them with a garden disinfectant before drying. Never reuse a pot or tray where damping off has happened. Water seedlings with tap water, or keep the water butt covered.',
							'recovery' => 'A fresh sowing in clean pots and compost usually comes up evenly.',
						),
						array(
							'cause'    => 'Slow growth in cool, dull weather',
							'sign'     => 'Losses in early spring, when seedlings sit for weeks without growing much',
							'check'    => 'Damping off is most damaging when light levels and temperatures are low and seedlings grow slowly. Early indoor sowings are most at risk.',
							'fix'      => 'Germinate seeds somewhere warm (most need around 18 °C / 64 °F), then move the seedlings to the brightest spot you have, such as a south- or west-facing windowsill.',
							'recovery' => 'Seedlings that grow away quickly soon pass the stage when damping off is a risk.',
						),
					),
					'products' => array(
						array( 'name' => 'Peat-free seed compost', 'badge' => '', 'note' => 'Fresh, bagged compost is usually free of damping-off organisms.', 'url' => '' ),
						array( 'name' => 'New seed trays or small pots', 'badge' => '', 'note' => 'Or wash and disinfect old ones before each sowing.', 'url' => '' ),
						array( 'name' => 'Propagator with a lid', 'badge' => '', 'note' => 'Helps seeds germinate. Take the lid off once the seedlings are up.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is there a spray for damping off?', 'answer' => 'No. No fungicides are available to home gardeners for damping off, which is why clean pots, fresh compost, thin sowing and careful watering matter so much.' ),
						array( 'question' => 'Can damping off happen outdoors?', 'answer' => 'Yes. It is mainly a problem when sowing early indoors or under glass, but seedlings sown straight into pots or the ground outside can be affected too.' ),
						array( 'question' => 'Can I save seedlings that have fallen over?', 'answer' => 'No. Once a seedling has collapsed it will rot. Remove it, and protect the rest by drying the compost a little and letting air move around them.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Damping off', 'url' => 'https://www.rhs.org.uk/disease/damping-off' ),
						array( 'title' => 'RHS — How to sow seeds indoors', 'url' => 'https://www.rhs.org.uk/propagation/seed-indoors' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent damping off' ) .
					$list(
						array(
							'Sow in fresh, peat-free seed compost, never garden soil.',
							'Use new or well-washed pots and trays.',
							'Scatter seed thinly, and prick seedlings out into their own pots once they can be handled.',
							'Remove lids and covers as soon as the seedlings appear.',
							'Water lightly and only when the compost needs it.',
							'Use tap water, or keep the water butt covered.',
						)
					),
			),

			'leggy-seedlings' => array(
				'image_prompt' => 'A seed tray of young tomato seedlings on a kitchen windowsill, the seedlings tall and thin with long bare stems and small oval seed leaves, all leaning sharply towards the window glass, morning light coming from one side. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Thin, stretched tomato seedlings in small pots leaning towards a bright window, a cardboard box lined with kitchen foil standing beside them, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Seedlings Tall, Pale and Floppy?',
				'excerpt'      => 'Seedlings that grow tall and thin, with long gaps between the leaves, and lean towards the window are stretching for light; gardeners call them leggy. Move them to the brightest spot you have, turn them regularly, take off any cover once they are up, and keep them a little cooler.',
				'plants'       => array( 'cherry-tomato', 'chillies-in-pots', 'sweet-peppers-in-pots', 'french-beans-in-pots' ),
				'parts'        => array( 'stems', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Not enough light',
							'sign'     => 'Tall, spindly stems with long gaps between the leaves',
							'check'    => 'In low light, plants stretch: the sections of stem between the leaves grow longer than normal. Seedlings set back from the glass, or raised early in the year when days are short, are most likely to suffer.',
							'fix'      => 'Move the seedlings as close to your brightest window as you can, such as a south- or west-facing windowsill. If no window is bright enough, a simple grow light helps.',
							'recovery' => 'The stretched stems stay long, but new growth is more compact once the light improves.',
						),
						array(
							'cause'    => 'Light from one side only',
							'sign'     => 'All the seedlings lean the same way, towards the window',
							'check'    => 'Seedlings bend towards light. On a windowsill the light comes from one side, so they grow crooked.',
							'fix'      => 'Turn the pots or tray regularly. For more even light, stand them in a cardboard box with the front cut away and the back lined with kitchen foil, which reflects light onto the shaded side.',
							'recovery' => 'Seedlings straighten as they grow once the light reaches them from all sides.',
						),
						array(
							'cause'    => 'Kept warm and covered after germination',
							'sign'     => 'Seedlings still under a lid, bag or heated propagator days after they came up',
							'check'    => 'Seeds need warmth to germinate, but seedlings need to be kept cooler once they are up.',
							'fix'      => 'Take the cover off as soon as the seedlings appear. Grow sweet pepper and chilli seedlings on at 16–18 °C (60–64 °F) in bright light, and tomato seedlings at a minimum of 16 °C (60 °F).',
							'recovery' => 'New growth comes through sturdier once the seedlings are cooler and uncovered.',
						),
						array(
							'cause'    => 'Seedlings crowded together',
							'sign'     => 'Many seedlings in one pot, all competing upwards',
							'check'    => 'Seedlings that are not moved on in time crowd and shade each other.',
							'fix'      => 'Prick them out into their own small pots, about 7.5–9 cm (3–3½ in), once they are big enough to handle. When you move a leggy tomato seedling, plant it deeper, so the first pair of leaves sits just above the compost.',
							'recovery' => 'The buried part of a tomato stem makes extra roots.',
						),
					),
					'products' => array(
						array( 'name' => 'Simple grow light', 'badge' => '', 'note' => 'Gives all-round light where a windowsill is too dim.', 'url' => '' ),
						array( 'name' => 'Small pots, 7.5–9 cm', 'badge' => '', 'note' => 'For pricking out seedlings so they do not crowd each other.', 'url' => '' ),
						array( 'name' => 'Cardboard box and kitchen foil', 'badge' => '', 'note' => 'A home-made light box that stops seedlings leaning.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I save leggy tomato seedlings?', 'answer' => 'Yes. When you pot them on, plant them deeper, so the first pair of leaves is just above the compost surface. Do the same when you plant them in their final pot: the buried stem makes more roots.' ),
						array( 'question' => 'Does brushing seedlings make them stronger?', 'answer' => 'It can help. The RHS explains that plants which are handled or brushed produce more of the hormone ethylene, which shortens stem growth and gives stockier plants. Some species respond more than others.' ),
						array( 'question' => 'Is a windowsill bright enough for seedlings?', 'answer' => 'A sunny windowsill is fine for germinating seeds. After that, seedlings need light from all sides: turn them regularly, or add a simple grow light if the window is not bright.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How plants respond to light and environment', 'url' => 'https://www.rhs.org.uk/advice/understanding-plants/how-plants-sense-the-environment' ),
						array( 'title' => 'RHS — How to sow seeds indoors', 'url' => 'https://www.rhs.org.uk/propagation/seed-indoors' ),
						array( 'title' => 'RHS — Seed sowing techniques', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/vegetable-basics/seed-sowing-techniques' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow sweet peppers', 'url' => 'https://www.rhs.org.uk/vegetables/peppers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to grow short, sturdy seedlings' ) .
					$list(
						array(
							'Give seedlings the brightest windowsill you have, as close to the glass as possible.',
							'Take off lids, bags and propagator covers as soon as the seedlings come up.',
							'Turn pots and trays regularly, or use a foil-lined box or a grow light.',
							'Keep seedlings cooler than the seeds needed to germinate.',
							'Prick out into small pots before seedlings crowd each other.',
						)
					),
			),

			'tomatoes-splitting' => array(
				'image_prompt' => 'Close-up of a truss of ripe red cherry tomatoes on a plant in a large pot on a sunny patio, two of the fruits with fresh cracks and splits running down the skin, the rest smooth and glossy, green serrated tomato leaves around them. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A cherry tomato plant in a pot on a balcony with a truss of ripe fruit, some split open, a watering can beside the pot, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Tomatoes Splitting?',
				'excerpt'      => 'Tomatoes split when the water supply swings from dry to wet: the fruit swells suddenly and the skin cracks. Plants in pots are most at risk, so keep the compost evenly moist, feed regularly, and pick ripe fruit promptly after heavy rain.',
				'plants'       => array( 'cherry-tomato', 'radishes-in-pots', 'carrots-in-pots', 'beetroot-in-pots' ),
				'parts'        => array( 'flowers-fruit', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Uneven watering',
							'sign'     => 'Ripening fruit cracks or splits, usually in late summer',
							'check'    => 'Has the pot dried out and then been given a big drink? Water supply is especially variable in pots and growing bags. Curling leaves are a sign that a tomato plant has been short of water.',
							'fix'      => 'Water to keep the compost evenly moist all the time. Pots dry out quickly, so check daily and be ready to water every day in hot weather. Grow one plant per 30–45 cm (12–18 in) pot, which holds more water than a small one.',
							'recovery' => 'Fruit already split will not mend. Pick it and use it quickly, before grey mould gets into the cracks. Fruit that swells under steady watering is less likely to split.',
						),
						array(
							'cause'    => 'Heavy rain after a dry spell',
							'sign'     => 'Many fruits split at once, a day or two after a downpour',
							'check'    => 'Outdoors, rain can undo careful watering: the fruit takes up a sudden rush of water.',
							'fix'      => 'Water in dry spells so the compost is not parched when rain comes. There is no remedy for a flood of rain, but picking ripe fruit promptly reduces the losses.',
							'recovery' => 'Later fruit should be fine once the weather settles.',
						),
						array(
							'cause'    => 'Swings in temperature',
							'sign'     => 'Rough, russeted skin, or corky scars and uneven hollows in the fruit (called catfacing)',
							'check'    => 'These marks come from changing temperatures rather than water. Catfacing happens when temperatures swing widely early in the season as the fruit sets.',
							'fix'      => 'Outdoors there is little you can do: managing temperature is almost impossible. Under glass, avoid extremes with ventilation and shading.',
							'recovery' => 'Catfacing becomes less common as nights get warmer in late summer. The marked fruit is still usable.',
						),
						array(
							'cause'    => 'Splitting in radishes, carrots and beetroot',
							'sign'     => 'Roots with deep cracks running lengthways, usually from the top',
							'check'    => 'The cause is the same: a burst of water after dry weather makes the roots swell faster than they can cope with. Large-rooted carrots split more than small ones.',
							'fix'      => 'Water regularly so the roots grow at a steady rate. Pull split roots as soon as you notice them and use them quickly.',
							'recovery' => 'Split roots can be eaten if used promptly, before soft rots take hold. Clean any soil out of the cracks first.',
						),
					),
					'products' => array(
						array( 'name' => 'Pot of 30–45 cm with drainage holes', 'badge' => '', 'note' => 'One tomato plant per pot: a bigger volume of compost dries out less quickly.', 'url' => '' ),
						array( 'name' => 'High-potash liquid tomato feed', 'badge' => '', 'note' => 'Feed container tomatoes every 10–14 days once the first fruits start to swell.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is splitting a disease?', 'answer' => 'No. It is a physiological disorder, caused by growing conditions rather than a pest or disease. Sprays will not help, and there is no chemical treatment.' ),
						array( 'question' => 'Should I pick tomatoes before rain?', 'answer' => 'Picking ripe fruit promptly after heavy rain reduces losses. At the end of the season, when nights are cool and splitting is hard to avoid, pick the fruit and ripen it indoors in a warm, dark place.' ),
						array( 'question' => 'Does feeding help?', 'answer' => 'Regular feeding keeps the plant growing well. Tomato feeds are high in potassium, which encourages good fruit. For tomatoes in pots, feed every 10–14 days once the first fruits start to swell.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Tomatoes: fruit splitting and cracking', 'url' => 'https://www.rhs.org.uk/problems/tomatoes-fruit-splitting-and-cracking' ),
						array( 'title' => 'RHS — Root vegetables: splitting', 'url' => 'https://www.rhs.org.uk/problems/root-vegetables-splitting' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent splitting' ) .
					$list(
						array(
							'Grow each tomato plant in a pot at least 30–45 cm (12–18 in) across, in a warm, sunny, sheltered spot.',
							'Check the compost every day in summer and water before it dries out, not after.',
							'Water in dry spells so a sudden downpour does not land on parched compost.',
							'Feed container tomatoes every 10–14 days with a high-potash feed once the fruit starts to swell.',
							'Pick ripe fruit promptly, especially after heavy rain.',
						)
					),
			),

			'tomato-blight' => array(
				'image_prompt' => 'A tomato plant in a large pot on a wet patio after rain, several of its serrated leaves collapsed with spreading dark brown watery patches, brown streaks on one stem, and green fruit with brown, greasy-looking patches, healthy plants blurred in the background, overcast daylight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Close-up of a tomato leaf with a dark brown, water-soaked patch and a faint white fuzz on the underside, green tomatoes with brown patches below it, photographed vertically on a patio. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Tomato Leaves Turning Brown and Rotting? (Tomato Blight)',
				'excerpt'      => 'If tomato leaves suddenly develop watery brown patches that spread fast in warm, wet weather, and brown marks appear on the stems and fruit, the plant probably has blight. Picking off leaves only slows it slightly and no fungicide is available to home gardeners, so use the healthy fruit quickly, bin the plant rather than composting it, and grow a resistant variety next year.',
				'plants'       => array( 'cherry-tomato', 'potatoes-in-bags' ),
				'parts'        => array( 'leaves', 'stems', 'flowers-fruit', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Tomato blight (late blight)',
							'sign'     => 'Watery rot that spreads quickly through the leaves, which collapse, shrivel and turn brown; brown marks on leaf stalks and stems; brown patches on green fruit, and ripe fruit rotting fast',
							'check'    => 'Blight follows warm, wet weather: its spores need the leaves to stay wet for several hours to infect. In humid conditions a fine white growth can appear under the leaves. In the UK outbreaks can start from June, usually earliest in the South West. Outdoor tomatoes are most at risk. The BlightSpy website shows when the weather in your area favours blight.',
							'fix'      => 'Bag up infected plants for the council green-waste collection rather than the compost bin. Use the fruit as soon as you can: green fruit from badly affected plants often rots if you try to ripen it indoors, so turning it into chutney or sauce straight away may be better. Clean canes and supports with a garden disinfectant before using them again.',
							'recovery' => 'The plant will not recover. Picking off the first affected leaves may slow the disease very slightly, but it will not stop it.',
						),
						array(
							'cause'    => 'Tomato leaf mould (a look-alike)',
							'sign'     => 'Yellow blotches on the upper side of the lower leaves, with pale greyish-brown mould underneath',
							'check'    => 'Blight produces white growth under the leaves; leaf mould is greyish-brown. Leaf mould does not cause brown marks on the stems or widespread fruit rot, and it is much less common outdoors than in greenhouses.',
							'fix'      => 'Pick off infected leaves as soon as you see them. Give plants plenty of air, avoid wetting the leaves when watering (especially in the evening), do not let the compost dry out, and remove some lower leaves once fruit has set. Clear away the plants and debris at the end of the season.',
							'recovery' => 'Leaf mould weakens plants and cuts the crop, but it does not rot them like blight.',
						),
					),
					'products' => array(
						array( 'name' => 'Blight-resistant tomato seed', 'badge' => '', 'note' => 'Resistant varieties are not immune, but they can still crop when others fail.', 'url' => '' ),
						array( 'name' => 'Garden disinfectant', 'badge' => '', 'note' => 'For cleaning canes and supports that touched blighted plants.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is there a spray for tomato blight?', 'answer' => 'No. There are currently no fungicides available to home gardeners against blight. Prevention, quick removal of infected plants and resistant varieties are what you can do.' ),
						array( 'question' => 'Can I compost blighted plants?', 'answer' => 'No. New strains of blight may form long-lived resting spores that can survive home composting. Use the council green-waste collection instead, as municipal composting reaches temperatures that kill them.' ),
						array( 'question' => 'Can I reuse the compost from a blighted pot?', 'answer' => 'Better not for tomatoes. The RHS advises against growing tomatoes the next year in soil or compost from a blight-affected crop. Spread it somewhere you will not grow tomatoes or potatoes.' ),
						array( 'question' => 'Which tomatoes resist blight?', 'answer' => 'Many varieties are sold as blight-resistant; check the seed packet. In RHS trials at Wisley in 2021, a bad blight year, \'Crimson Crush\' and \'Mountain Magic\' performed very well while susceptible varieties failed. No variety is completely immune.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Tomato blight', 'url' => 'https://www.rhs.org.uk/disease/tomato-blight' ),
						array( 'title' => 'RHS — Tomato leaf mould', 'url' => 'https://www.rhs.org.uk/disease/tomato-leaf-mould' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to reduce the risk of blight' ) .
					$list(
						array(
							'Choose a variety sold as blight-resistant, especially if your tomatoes grow outside.',
							'Water the compost, not the leaves: blight needs wet leaves to infect.',
							'Watch the weather from June. After warm, wet spells, check the leaves, stems and fruit every day.',
							'Do not reuse compost from a blighted plant for next year\'s tomatoes; spread it where no tomatoes or potatoes will grow.',
							'Clean canes and supports with a garden disinfectant before reuse.',
						)
					),
			),

			'flowers-dropping-off' => array(
				'image_prompt' => 'A sweet pepper plant with glossy dark green oval leaves in a 30 cm pot on a hot, sunny balcony, a few small white star-shaped flowers open on the plant and several withered yellowed flowers and buds lying on the dry compost below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A cherry tomato plant in a pot on a sunny balcony with clusters of small yellow star-shaped flowers, some flower stalks bare and a few dropped yellow flowers on the compost, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are the Flowers Falling Off My Tomatoes and Peppers?',
				'excerpt'      => 'Flowers that wither and drop before they set fruit are usually a sign of stress: dry compost, very hot days and nights, hunger, or too few pollinating insects. Keep pots evenly moist, water daily in hot weather, feed once flowering starts, and give plants a sunny, sheltered spot.',
				'plants'       => array( 'cherry-tomato', 'sweet-peppers-in-pots', 'chillies-in-pots', 'french-beans-in-pots' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Dry compost',
							'sign'     => 'Flower buds fall off, and the compost is dry below the surface',
							'check'    => 'Pepper and chilli flower buds may drop if the plants get too dry, and plants in pots dry out very quickly in summer. Beans are thirsty too, especially once they start to flower and form pods.',
							'fix'      => 'Check the compost every day and be ready to water daily in hot, dry weather. Use a pot big enough to hold water between waterings: at least 30 cm (1 ft) wide for sweet peppers, about 22 cm (9 in) for a chilli, 30–45 cm (12–18 in) for a tomato or for dwarf beans.',
							'recovery' => 'Buds that have dropped are lost; keep the compost evenly moist to protect the flowers still to come.',
						),
						array(
							'cause'    => 'Very hot days and nights',
							'sign'     => 'Flowers wither or drop during or soon after a heatwave, even though the plants look healthy',
							'check'    => 'Tomatoes under sustained heat, above about 29 °C (85 °F) by day and 21 °C (70 °F) at night, often drop their flowers without being pollinated. Heat 7–15 days before flowering can also make flowers abort. Sweet peppers fruit less above 30 °C (86 °F). Bean flowers can abort in very hot weather, especially if the compost is dry, and hot nights in particular stop runner bean pollen working.',
							'fix'      => 'Keep watering well during hot spells. Under glass, ventilate and shade the plants. Outdoors there is little you can do about the weather.',
							'recovery' => 'Tomatoes produce new flowers frequently, so fruit sets again once the heat breaks. Runner beans usually start cropping again as nights cool in September.',
						),
						array(
							'cause'    => 'Not enough pollination',
							'sign'     => 'Flowers open normally but fall without forming fruit, especially in cold, wet or windy weather',
							'check'    => 'Bad weather keeps bees and other pollinating insects away. Plants in an exposed spot get fewer visits.',
							'fix'      => 'Grow plants in a sheltered spot, which encourages bees to visit. For tomatoes, lightly tap or shake the flowers when they are fully open to move the pollen; misting the flowers can also help. Do not mist runner bean flowers: it does not help pod set and may put bees off. Avoid spraying insecticides on flowering plants, as they also kill bees.',
							'recovery' => 'Fruit sets on the next flowers once pollination improves. French bean flowers pollinate themselves, so they rely less on insects.',
						),
						array(
							'cause'    => 'Hungry plants',
							'sign'     => 'Plants have been in the same compost for weeks without feeding and flower poorly',
							'check'    => 'Poor fertility can also make flowers abort and drop.',
							'fix'      => 'Feed peppers and chillies in pots weekly with a high-potassium liquid feed as soon as flowering starts. Feed container tomatoes every 10–14 days with a high-potassium feed once the first fruits start to swell, and give beans a tomato feed once the first flowers appear.',
							'recovery' => 'Later flowers should set better with regular feeding.',
						),
						array(
							'cause'    => 'Pods or fruit left on the plant too long',
							'sign'     => 'Bean plants stop flowering, or chillies produce few new flowers',
							'check'    => 'If bean pods are left to swell and make seed, the plant stops producing more. Leaving chillies to ripen on the plant early in the season also discourages new flowers.',
							'fix'      => 'Pick runner beans every two to three days, and French beans regularly. Pick chillies while still green early in the season, and leave later fruits to ripen.',
							'recovery' => 'Regular picking keeps new flowers coming.',
						),
					),
					'products' => array(
						array( 'name' => 'High-potassium liquid feed', 'badge' => '', 'note' => 'Start once flowering begins on peppers and chillies, or once fruit swells on tomatoes.', 'url' => '' ),
						array( 'name' => 'Large pot with drainage holes', 'badge' => '', 'note' => 'More compost holds more water between waterings.', 'url' => '' ),
						array( 'name' => 'Watering can with a rose', 'badge' => '', 'note' => 'For a daily check and water in hot weather.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is it normal for some flowers to drop?', 'answer' => 'Yes. Even in ideal conditions, more than half of runner bean flowers may not set pods. The crop only drops noticeably when far more than half fail.' ),
						array( 'question' => 'Should I spray the flowers with water?', 'answer' => 'For tomatoes, light misting of the flowers can help pollination, as can tapping them gently. For runner beans, no: misting has not been shown to help and may deter bees.' ),
						array( 'question' => 'Can I grow peppers outside on a balcony?', 'answer' => 'In a warm, sheltered spot, yes, once night temperatures stay above 12 °C (54 °F). They grow better above 15 °C (59 °F) and usually give fewer fruits outdoors than under glass.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to grow sweet peppers', 'url' => 'https://www.rhs.org.uk/vegetables/peppers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — Runner beans: failure to set pods', 'url' => 'https://www.rhs.org.uk/problems/runner-beans-failure-to-set-pods' ),
						array( 'title' => 'RHS — How to grow runner beans', 'url' => 'https://www.rhs.org.uk/vegetables/runner-beans/grow-your-own' ),
						array( 'title' => 'University of Minnesota Extension — How excessive heat affects the vegetable garden', 'url' => 'https://extension.umn.edu/planting-and-growing-guides/how-excessive-heat-affects-vegetable-garden' ),
						array( 'title' => 'Penn State Extension — Heat stress and tomatoes', 'url' => 'https://extension.psu.edu/heat-stress-and-tomatoes' ),
					),
				),
				'content'      =>
					$h2( 'How to keep flowers on the plant' ) .
					$list(
						array(
							'Use a pot big enough to hold water for a day: 30–45 cm (12–18 in) for a tomato, at least 30 cm (1 ft) for a sweet pepper.',
							'Look at the compost daily in summer, and water before it dries out.',
							'Give plants a warm, sunny spot that is sheltered from wind, so bees visit.',
							'Start a high-potassium feed when flowering begins.',
							'Pick beans every few days and keep picking ripe fruit.',
						)
					),
			),
		),
	),
);
