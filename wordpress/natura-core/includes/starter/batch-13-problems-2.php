<?php
/**
 * Starter guides, batch 13: more plant problems. Caterpillars and flea
 * beetles on brassicas, two seedling problems, and four fruiting problems.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026), from the University of Minnesota and Penn State extension pages
 * cited in the flower-drop guide, from the University of Wisconsin–Madison
 * and University of Minnesota extension pages cited in the caterpillar and
 * blight guides (checked 19 October 2026), and from Jo Whittingham, Backyard
 * Harvest (DK, 2011), pp. 16, 137 and 236–244; see
 * design/sources/BACKYARD-HARVEST.md. No fungicide is recommended: the RHS
 * lists none for UK home gardeners against damping off, tomato blight or
 * leaf mold, University of Minnesota Extension does not recommend sprays for
 * late blight in home gardens, and splitting is not a pest or disease. The
 * only insecticide named is Bacillus thuringiensis var. kurstaki, which
 * University of Wisconsin–Madison Extension lists for home gardeners.
 * Seasons replace month names; UK timings are labeled as such.
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
				'image_prompt' => 'Close-up of a curly kale plant with crinkled blue-green leaves growing in a 12-inch (30 cm) terracotta pot on a sunny balcony, several outer leaves chewed with ragged holes, a group of yellow and black hairy large white butterfly caterpillars feeding on one leaf, small dark droppings on the leaf below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A pot of curly kale on a balcony with holed leaves and yellow and black caterpillars on one leaf, a clutch of tiny yellow skittle-shaped eggs on the underside of another leaf, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Eating My Kale and Cabbage Leaves? (Cabbage Caterpillars)',
				'excerpt'      => 'Holes in the leaves of kale, cabbage, bok choy or nasturtiums, with green or yellow-and-black caterpillars and their droppings, are the work of cabbage white butterflies (the imported cabbageworm) and moths such as the cabbage looper or, in the UK, the cabbage moth. Pick off the eggs and caterpillars every few days, and cover the pot with fine netting that does not touch the leaves.',
				'plants'       => array( 'kale-in-pots', 'bok-choy-in-pots', 'nasturtiums-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Large white butterfly caterpillars',
							'sign'     => 'Yellow and black caterpillars with obvious hairs, feeding in groups, mostly on the outer leaves',
							'check'    => 'Look on both sides of the leaves for clusters of yellow, skittle-shaped eggs. In the UK, the caterpillars are most often seen in early to midsummer and again from late summer into early fall. They also feed on nasturtiums. The large white is a UK and European pest: in the United States, University of Wisconsin–Madison Extension names the imported cabbageworm, the cabbage looper and the diamondback moth as the caterpillar pests of cabbage-family crops.',
							'fix'      => 'Pick off the egg clusters and the caterpillars by hand. If you find small yellow silk cocoons next to a shriveled caterpillar, leave them: they belong to a tiny parasitic wasp that kills the caterpillars.',
							'recovery' => 'Eaten leaves stay holed. Once the caterpillars are gone, the plant keeps growing and you can go on picking the leaves that were not damaged.',
						),
						array(
							'cause'    => 'Small white butterfly caterpillars (imported cabbageworm)',
							'sign'     => 'Pale green caterpillars covered in short, velvety hairs; holes in the outer leaves and sometimes in the heart of a cabbage',
							'check'    => 'Small whites lay single yellow eggs on the undersides of leaves, so turn the leaves over to look. In the US this butterfly is called the imported cabbageworm; University of Wisconsin–Madison Extension describes its caterpillars as velvety green, up to 1 in (2.5 cm) long, with a faint yellow stripe down the back. These caterpillars can bore into the center of a cabbage, so check the heart as well as the outer leaves. Green-veined white caterpillars look similar but are found more often on wild plants than in gardens.',
							'fix'      => 'Pick off eggs and caterpillars every few days. Cover the pot with fine netting or row cover to stop the butterflies laying more eggs.',
							'recovery' => 'Damaged leaves do not heal; remove the worst of them and keep checking the new growth.',
						),
						array(
							'cause'    => 'Cabbage moth caterpillars (UK)',
							'sign'     => 'Yellowish-green or brownish-green caterpillars with no obvious hairs, often inside the heart of the plant',
							'check'    => 'Look for clusters of white, round eggs on either side of the leaves. In the UK, cabbage moth caterpillars are active from midsummer to early fall.',
							'fix'      => 'Pick off the egg clusters and the caterpillars. Net the plants from spring so the moths cannot lay eggs on them.',
							'recovery' => 'Leaves the caterpillars have tunneled into are best removed. Healthy outer growth is still worth picking.',
						),
						array(
							'cause'    => 'Diamondback moth caterpillars',
							'sign'     => 'Small green caterpillars, about ½ in (1 cm) long when fully grown, that leave thin see-through windows in the leaves and drop off when disturbed',
							'check'    => 'These caterpillars turn up from midsummer onwards and can be numerous. In the UK the moth flies in from abroad and is not known to survive the winter, so it is still uncommon in gardens. In the United States, University of Wisconsin–Madison Extension describes it as an important pest of cabbage-family crops.',
							'fix'      => 'Shake or pick the caterpillars off over a tray, and keep the plants netted.',
							'recovery' => 'The windowed patches stay. New leaves grow normally once the caterpillars are gone.',
						),
					),
					'products' => array(
						array( 'name' => 'Fine insect-proof mesh or netting', 'badge' => '', 'note' => 'Stops butterflies and moths laying eggs on the plants. It must not touch the leaves.', 'url' => '' ),
						array( 'name' => 'Floating row cover', 'badge' => '', 'note' => 'An alternative to mesh for covering young plants.', 'url' => '' ),
						array( 'name' => 'Short stakes or hoops', 'badge' => '', 'note' => 'Hold the net clear of the leaves on a pot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Why did I still find eggs under the netting?', 'answer' => 'The net was probably touching the leaves. Butterflies and moths can lay their eggs through netting that rests on the plant, so hold it clear on stakes or hoops.' ),
						array( 'question' => 'Do I need to spray?', 'answer' => 'Usually not. The RHS suggests tolerating small numbers where you can, because the caterpillars feed birds and wasps. Hand-picking and netting are the main controls. In the UK, a biological control made of nematodes is sold for caterpillars; the RHS advises using it with care, only when there is a specific problem, in cool, damp weather. In the US, University of Wisconsin–Madison Extension names Bacillus thuringiensis var. kurstaki (Bt), an organic option, as particularly useful against small imported cabbageworms, and notes that broad-spectrum sprays harm the insects that prey on them.' ),
						array( 'question' => 'When should I start checking?', 'answer' => 'From spring onwards, so you can act before numbers build up. In the UK, white butterfly caterpillars are most often seen in early to midsummer and again from late summer into early fall, and cabbage moth caterpillars from midsummer to early fall.' ),
						array( 'question' => 'Are the caterpillars on my nasturtiums the same pest?', 'answer' => 'Yes. Large white butterfly caterpillars feed on nasturtiums as well as on kale, cabbage and other brassicas, so check and net them in the same way.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Cabbage caterpillars', 'url' => 'https://www.rhs.org.uk/biodiversity/cabbage-caterpillars' ),
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cabbages', 'url' => 'https://www.rhs.org.uk/vegetables/cabbages/grow-your-own' ),
						array( 'title' => 'University of Wisconsin–Madison Extension — Imported cabbageworm', 'url' => 'https://hort.extension.wisc.edu/articles/imported-cabbageworm/' ),
						array( 'title' => 'University of Wisconsin–Madison Extension — Caterpillar pests of cole crops', 'url' => 'https://hort.extension.wisc.edu/articles/caterpillar-pests-cole-crops/' ),
						array( 'title' => 'University of Wisconsin–Madison Extension — Diamondback moth', 'url' => 'https://hort.extension.wisc.edu/articles/diamondback-moth/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent caterpillar damage' ) .
					$list(
						array(
							'Cover brassicas with fine netting or row cover from spring, held on stakes or hoops so it does not touch the leaves.',
							'On a balcony, a compact kale growing in a pot 12 in (30 cm) or more across and deep is easy to net completely.',
							'White butterflies fluttering around your plants are a sign they are laying eggs: check the leaves that day.',
							'Turn the leaves over every few days and rub off any eggs before they hatch.',
							'Leave the yellow cocoons of the parasitic wasp where you find them.',
						)
					),
			),

			'flea-beetle-holes-in-leaves' => array(
				'image_prompt' => 'Close-up of young radish and arugula seedlings in a shallow trough on a sunny balcony, the small rounded leaves peppered with dozens of tiny round pits and pin holes, some dried to pale brown spots, a couple of tiny shiny black beetles on one leaf. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A trough of arugula and radish seedlings with leaves full of tiny round holes, a piece of fine white insect mesh folded back at one end, photographed vertically on a balcony. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Tiny Holes in My Radish and Arugula Leaves?',
				'excerpt'      => 'Lots of tiny, round holes in the leaves of radish, arugula, bok choy or young kale are made by flea beetles, small shiny beetles that jump away when you touch the plant. On bigger plants the damage is mostly cosmetic; seedlings are most at risk, and insect-proof mesh keeps the beetles off.',
				'plants'       => array( 'radishes-in-pots', 'salad-greens-in-pots', 'bok-choy-in-pots', 'kale-in-pots', 'nasturtiums-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Flea beetles',
							'sign'     => 'Small round holes and pits in the leaves, often not going right through; the damaged spots dry and turn pale brown',
							'check'    => 'Brush your hand over the leaves and watch: the beetles are about 1/10 in (2–3 mm) long, black or metallic green or blue, some with a yellow stripe, and they leap away when disturbed. They attack brassicas and their relatives, including radish, arugula, bok choy, kale and nasturtiums. They come out in mid-spring to feed on seedlings, and in late summer more can arrive from nearby farm crops.',
							'fix'      => 'On larger plants, tolerate them: the effect on the parts you eat is usually small, and you can discard the worst outer leaves. Cover seedlings and young plants with insect-proof mesh or row cover. Birds, frogs and ground beetles eat flea beetles and their grubs.',
							'recovery' => 'The holes stay, but older plants are only held back when there are a lot of beetles. The leaves are still fine to eat.',
						),
						array(
							'cause'    => 'Flea beetle grubs in the potting mix',
							'sign'     => 'Nothing visible on the plant; you may find small whitish-brown grubs among the roots when you empty the pot',
							'check'    => 'The grubs live in the soil and feed on roots, then turn into adults in midsummer.',
							'fix'      => 'Nothing to treat. Root feeding by the grubs does not usually cause noticeable damage in gardens.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Caterpillars rather than flea beetles',
							'sign'     => 'Larger, ragged holes, with caterpillars or their droppings on the leaves',
							'check'    => 'Flea beetle holes are tiny and round. If the holes are bigger and you can see green or yellow-and-black caterpillars, the culprit is cabbage white butterflies or moths such as the cabbage looper.',
							'fix'      => 'Pick off the caterpillars and their eggs, and cover the plants with fine netting. See the guide to cabbage caterpillars.',
							'recovery' => 'Damaged leaves stay holed; new growth is clean once the caterpillars are removed.',
						),
					),
					'products' => array(
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Fine enough to keep tiny beetles off seedlings. Cover the pot at sowing time.', 'url' => '' ),
						array( 'name' => 'Floating row cover', 'badge' => '', 'note' => 'Another way to cover young brassicas.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I eat leaves with flea beetle holes?', 'answer' => 'Yes. The damage is only cosmetic. If you want unmarked leaves, grow the crop under insect-proof mesh.' ),
						array( 'question' => 'Do flea beetles damage radish roots?', 'answer' => 'The adults feed on the leaves. Their grubs feed on roots, but in gardens this does not usually cause significant damage.' ),
						array( 'question' => 'When are flea beetles worst?', 'answer' => 'In spring and summer. The adults spend winter in leaf litter and come out in mid-spring, when seedlings are most at risk. In late summer, more beetles can move into gardens from farm crops such as canola (oilseed rape).' ),
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
							'Cover pots of radish, arugula and bok choy with insect-proof mesh as soon as you sow, especially for spring sowings.',
							'Use a pot at least 12 in (30 cm) wide for bok choy: smaller containers dry out too fast. A wide, shallow trough is also easy to cover with one piece of mesh.',
							'Check seedlings from mid-spring, when the beetles come out of winter shelter.',
							'Accept a few holes on larger plants: they do not stop the crop.',
						)
					),
			),

			'damping-off-seedlings' => array(
				'image_prompt' => 'A seed tray of young tomato seedlings with two smooth oval seed leaves on a bright kitchen windowsill, a patch in the middle of the tray where several seedlings have collapsed flat, their stems thin and pinched at the base, a faint white fungal fuzz on the potting mix around them, healthy upright seedlings at the edges. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A small pot of seedlings on a windowsill where a cluster has toppled over at soil level next to upright healthy seedlings, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Seedlings Collapsing? (Damping Off)',
				'excerpt'      => 'Seedlings that suddenly fall over and rot, often under a fuzz of white mold, have damping off, caused by fungi and fungus-like organisms that live in soil and dirty water. Collapsed seedlings cannot be saved, so sow again thinly in fresh seed-starting mix and clean pots, water less, and give the seedlings fresh air.',
				'plants'       => array( 'cherry-tomato', 'chili-peppers-in-pots', 'bell-peppers-in-pots', 'salad-greens-in-pots', 'lettuce-in-pots', 'genovese-basil' ),
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
							'cause'    => 'Wet potting mix and damp, still air',
							'sign'     => 'Mix that never dries on the surface, condensation under the lid, and whitish mold on the fallen seedlings',
							'check'    => 'Is the lid or plastic bag still on after the seedlings came up? Are you watering every day whether the mix needs it or not?',
							'fix'      => 'Take off the lid or cover as soon as the seedlings appear. Water lightly, only when needed, and never leave the mix waterlogged. Keep them well ventilated, for example by opening a window nearby on mild days.',
							'recovery' => 'Seedlings that have already fallen will die. Drier mix and moving air protect the rest.',
						),
						array(
							'cause'    => 'Infected potting mix, pots or water',
							'sign'     => 'Seeds fail to come up, or come up patchily, and the problem returns with every sowing',
							'check'    => 'Are you reusing old pots and trays, using homemade compost or garden soil, or watering with rainwater from an open rain barrel? These can all carry the organisms that cause damping off.',
							'fix'      => 'Use fresh, commercial peat-free seed-starting mix. Use new pots, or wash old ones, scrub off the soil and treat them with a garden disinfectant before drying. Never reuse a pot or tray where damping off has happened. Water seedlings with tap water, or keep the rain barrel covered.',
							'recovery' => 'A fresh sowing in clean pots and mix usually comes up evenly.',
						),
						array(
							'cause'    => 'Slow growth in cool, dull weather',
							'sign'     => 'Losses in early spring, when seedlings sit for weeks without growing much',
							'check'    => 'Damping off is most damaging when light levels and temperatures are low and seedlings grow slowly. Early indoor sowings are most at risk.',
							'fix'      => 'Germinate seeds somewhere warm (most need around 64 °F / 18 °C), then move the seedlings to the brightest spot you have, such as a south- or west-facing windowsill.',
							'recovery' => 'Seedlings that grow away quickly soon pass the stage when damping off is a risk.',
						),
					),
					'products' => array(
						array( 'name' => 'Peat-free seed-starting mix', 'badge' => '', 'note' => 'Fresh, bagged mix is usually free of damping-off organisms.', 'url' => '' ),
						array( 'name' => 'New seed trays or small pots', 'badge' => '', 'note' => 'Or wash and disinfect old ones before each sowing.', 'url' => '' ),
						array( 'name' => 'Seed tray with a clear lid (propagator)', 'badge' => '', 'note' => 'Helps seeds germinate. Take the lid off once the seedlings are up.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is there a spray for damping off?', 'answer' => 'No. The RHS says no fungicides are available to home gardeners in the UK for damping off, which is why clean pots, fresh mix, thin sowing and careful watering matter so much.' ),
						array( 'question' => 'Can damping off happen outdoors?', 'answer' => 'Yes. It is mainly a problem when starting seeds early indoors or in a greenhouse, but seedlings sown straight into pots or the ground outside can be affected too.' ),
						array( 'question' => 'Can I save seedlings that have fallen over?', 'answer' => 'No. Once a seedling has collapsed it will rot. Remove it, and protect the rest by drying the mix a little and letting air move around them.' ),
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
							'Sow in fresh, peat-free seed-starting mix, never garden soil.',
							'Use new or well-washed pots and trays.',
							'Scatter seed thinly, and prick seedlings out into their own pots once they can be handled.',
							'Remove lids and covers as soon as the seedlings appear.',
							'Water lightly and only when the mix needs it.',
							'Use tap water, or keep the rain barrel covered.',
						)
					),
			),

			'leggy-seedlings' => array(
				'image_prompt' => 'A seed tray of young tomato seedlings on a kitchen windowsill, the seedlings tall and thin with long bare stems and small oval seed leaves, all leaning sharply towards the window glass, morning light coming from one side. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Thin, stretched tomato seedlings in small pots leaning towards a bright window, a cardboard box lined with aluminum foil standing beside them, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Seedlings Tall, Pale and Floppy?',
				'excerpt'      => 'Seedlings that grow tall and thin, with long gaps between the leaves, and lean towards the window are stretching for light; gardeners call them leggy. Move them to the brightest spot you have, turn them regularly, take off any cover once they are up, and keep them a little cooler.',
				'plants'       => array( 'cherry-tomato', 'chili-peppers-in-pots', 'bell-peppers-in-pots', 'green-beans-in-pots' ),
				'parts'        => array( 'stems', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Not enough light',
							'sign'     => 'Tall, spindly stems with long gaps between the leaves',
							'check'    => 'In low light, plants stretch: the sections of stem between the leaves grow longer than normal. Seedlings set back from the glass, or started early in the year when days are short, are most likely to suffer.',
							'fix'      => 'Move the seedlings as close to your brightest window as you can, such as a south- or west-facing windowsill. If no window is bright enough, a simple grow light helps.',
							'recovery' => 'The stretched stems stay long, but new growth is more compact once the light improves.',
						),
						array(
							'cause'    => 'Light from one side only',
							'sign'     => 'All the seedlings lean the same way, towards the window',
							'check'    => 'Seedlings bend towards light. On a windowsill the light comes from one side, so they grow crooked.',
							'fix'      => 'Turn the pots or tray regularly. For more even light, stand them in a cardboard box with the front cut away and the back lined with aluminum foil, which reflects light onto the shaded side.',
							'recovery' => 'Seedlings straighten as they grow once the light reaches them from all sides.',
						),
						array(
							'cause'    => 'Kept warm and covered after germination',
							'sign'     => 'Seedlings still under a lid, bag or heated propagator days after they came up',
							'check'    => 'Seeds need warmth to germinate, but seedlings need to be kept cooler once they are up.',
							'fix'      => 'Take the cover off as soon as the seedlings appear. Grow bell pepper and chili pepper seedlings on at 60–64 °F (16–18 °C) in bright light, and tomato seedlings at a minimum of 60 °F (16 °C).',
							'recovery' => 'New growth comes through sturdier once the seedlings are cooler and uncovered.',
						),
						array(
							'cause'    => 'Seedlings crowded together',
							'sign'     => 'Many seedlings in one pot, all competing upwards',
							'check'    => 'Seedlings that are not moved on in time crowd and shade each other.',
							'fix'      => 'Prick them out into their own small pots, about 3–3½ in (7.5–9 cm), once they are big enough to handle. When you move a leggy tomato seedling, plant it deeper, so the first pair of leaves sits just above the potting mix.',
							'recovery' => 'The buried part of a tomato stem makes extra roots.',
						),
					),
					'products' => array(
						array( 'name' => 'Simple grow light', 'badge' => '', 'note' => 'Gives all-round light where a windowsill is too dim.', 'url' => '' ),
						array( 'name' => 'Small pots, 3–3½ in (7.5–9 cm)', 'badge' => '', 'note' => 'For pricking out seedlings so they do not crowd each other.', 'url' => '' ),
						array( 'name' => 'Cardboard box and aluminum foil', 'badge' => '', 'note' => 'A homemade light box that stops seedlings leaning.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I save leggy tomato seedlings?', 'answer' => 'Yes. When you pot them on, plant them deeper, so the first pair of leaves is just above the surface of the mix. Do the same when you plant them in their final pot: the buried stem makes more roots.' ),
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
				'excerpt'      => 'Tomatoes split when the water supply swings from dry to wet: the fruit swells suddenly and the skin cracks. Plants in pots are most at risk, so keep the potting mix evenly moist, feed regularly, and pick ripe fruit promptly after heavy rain.',
				'plants'       => array( 'cherry-tomato', 'radishes-in-pots', 'carrots-in-pots', 'beets-in-pots' ),
				'parts'        => array( 'flowers-fruit', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Uneven watering',
							'sign'     => 'Ripening fruit cracks or splits, usually in late summer',
							'check'    => 'Has the pot dried out and then been given a big drink? Water supply is especially variable in pots and grow bags. Curling leaves are a sign that a tomato plant has been short of water.',
							'fix'      => 'Water to keep the potting mix evenly moist all the time. Pots dry out quickly, so check daily and be ready to water every day in hot weather. Grow one plant per 12–18 in (30–45 cm) pot, which holds more water than a small one.',
							'recovery' => 'Fruit already split will not mend. Pick it and use it quickly, before gray mold gets into the cracks. Fruit that swells under steady watering is less likely to split.',
						),
						array(
							'cause'    => 'Heavy rain after a dry spell',
							'sign'     => 'Many fruits split at once, a day or two after a downpour',
							'check'    => 'Outdoors, rain can undo careful watering: the fruit takes up a sudden rush of water.',
							'fix'      => 'Water in dry spells so the mix is not parched when rain comes. There is no remedy for a flood of rain, but picking ripe fruit promptly reduces the losses.',
							'recovery' => 'Later fruit should be fine once the weather settles.',
						),
						array(
							'cause'    => 'Swings in temperature',
							'sign'     => 'Rough, russeted skin, or corky scars and uneven hollows in the fruit (called catfacing)',
							'check'    => 'These marks come from changing temperatures rather than water. Catfacing happens when temperatures swing widely early in the season as the fruit sets.',
							'fix'      => 'Outdoors there is little you can do: managing temperature is almost impossible. In a greenhouse, avoid extremes with ventilation and shading.',
							'recovery' => 'Catfacing becomes less common as nights get warmer in late summer. The marked fruit is still usable.',
						),
						array(
							'cause'    => 'Splitting in radishes, carrots and beets',
							'sign'     => 'Roots with deep cracks running lengthways, usually from the top',
							'check'    => 'The cause is the same: a burst of water after dry weather makes the roots swell faster than they can cope with. Large-rooted carrots split more than small ones.',
							'fix'      => 'Water regularly so the roots grow at a steady rate. Pull split roots as soon as you notice them and use them quickly.',
							'recovery' => 'Split roots can be eaten if used promptly, before soft rots take hold. Clean any soil out of the cracks first.',
						),
					),
					'products' => array(
						array( 'name' => 'Pot 12–18 in (30–45 cm) across, with drainage holes', 'badge' => '', 'note' => 'One tomato plant per pot: a bigger volume of potting mix dries out less quickly.', 'url' => '' ),
						array( 'name' => 'High-potash liquid tomato fertilizer', 'badge' => '', 'note' => 'Feed container tomatoes every 10–14 days once the first fruits start to swell.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is splitting a disease?', 'answer' => 'No. It is a physiological disorder, caused by growing conditions rather than a pest or disease. Sprays will not help, and there is no chemical treatment.' ),
						array( 'question' => 'Should I pick tomatoes before rain?', 'answer' => 'Picking ripe fruit promptly after heavy rain reduces losses. At the end of the season, when nights are cool and splitting is hard to avoid, pick the fruit and ripen it indoors in a warm, dark place.' ),
						array( 'question' => 'Does feeding help?', 'answer' => 'Regular feeding keeps the plant growing well. Tomato fertilizers are high in potassium, which encourages good fruit. For tomatoes in pots, feed every 10–14 days once the first fruits start to swell.' ),
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
							'Grow each tomato plant in a pot at least 12–18 in (30–45 cm) across, in a warm, sunny, sheltered spot.',
							'Check the potting mix every day in summer and water before it dries out, not after.',
							'Water in dry spells so a sudden downpour does not land on parched mix.',
							'Feed container tomatoes every 10–14 days with a high-potash fertilizer once the fruit starts to swell.',
							'Pick ripe fruit promptly, especially after heavy rain.',
						)
					),
			),

			'tomato-blight' => array(
				'image_prompt' => 'A tomato plant in a large pot on a wet patio after rain, several of its serrated leaves collapsed with spreading dark brown watery patches, brown streaks on one stem, and green fruit with brown, greasy-looking patches, healthy plants blurred in the background, overcast daylight. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Close-up of a tomato leaf with a dark brown, water-soaked patch and a faint white fuzz on the underside, green tomatoes with brown patches below it, photographed vertically on a patio. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Tomato Leaves Turning Brown and Rotting? (Tomato Blight)',
				'excerpt'      => 'If tomato leaves suddenly develop watery brown patches that spread fast in wet weather, and brown marks appear on the stems and fruit, the plant probably has late blight. Picking off leaves only slows it slightly and sprays are not recommended for home gardeners, so use the healthy fruit quickly, throw the plant out rather than composting it, and grow a resistant variety next year.',
				'plants'       => array( 'cherry-tomato', 'potatoes-in-bags' ),
				'parts'        => array( 'leaves', 'stems', 'flowers-fruit', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Tomato blight (late blight)',
							'sign'     => 'Watery rot that spreads quickly through the leaves, which collapse, shrivel and turn brown; brown marks on leaf stalks and stems; brown patches on green fruit, and ripe fruit rotting fast',
							'check'    => 'Blight follows wet weather: its spores need the leaves to stay wet for several hours to infect. The RHS links it to warm, wet spells; University of Minnesota Extension says it favors cool, damp conditions of 60–70 °F (16–21 °C), and that long hot, dry spells can halt it. In humid conditions a fine white growth can appear under the leaves. Outdoor tomatoes are most at risk. In the US, the USAblight website, linked by University of Minnesota Extension, reports regional outbreaks. In the UK, outbreaks can start in early summer, usually earliest in the South West, and the BlightSpy website shows when the weather in your area favors blight.',
							'fix'      => 'Bag up infected plants for your municipal yard-waste (green-waste) collection, where there is one, rather than the home compost bin. Use the fruit as soon as you can: green fruit from badly affected plants often rots if you try to ripen it indoors, so turning it into chutney or sauce straight away may be better. Clean stakes and supports with a garden disinfectant before using them again.',
							'recovery' => 'The plant will not recover. Picking off the first affected leaves may slow the disease very slightly, but it will not stop it.',
						),
						array(
							'cause'    => 'Tomato leaf mold (a look-alike)',
							'sign'     => 'Yellow blotches on the upper side of the lower leaves, with pale grayish-brown mold underneath',
							'check'    => 'Blight produces white growth under the leaves; leaf mold is grayish-brown. Leaf mold does not cause brown marks on the stems or widespread fruit rot, and it is much less common outdoors than in greenhouses.',
							'fix'      => 'Pick off infected leaves as soon as you see them. Give plants plenty of air, avoid wetting the leaves when watering (especially in the evening), do not let the potting mix dry out, and remove some lower leaves once fruit has set. Clear away the plants and debris at the end of the season.',
							'recovery' => 'Leaf mold weakens plants and cuts the crop, but it does not rot them like blight.',
						),
					),
					'products' => array(
						array( 'name' => 'Blight-resistant tomato seed', 'badge' => '', 'note' => 'Resistant varieties are not immune, but they can still crop when others fail.', 'url' => '' ),
						array( 'name' => 'Garden disinfectant', 'badge' => '', 'note' => 'For cleaning stakes and supports that touched blighted plants.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is there a spray for tomato blight?', 'answer' => 'Not one that is recommended for home gardeners. University of Minnesota Extension does not recommend pesticide sprays for late blight in the home garden, and the RHS says no fungicides are currently available to home gardeners in the UK. Prevention, quick removal of infected plants and resistant varieties are what you can do.' ),
						array( 'question' => 'Can I compost blighted plants?', 'answer' => 'No. New strains of blight may form long-lived resting spores that can survive home composting. Use a municipal yard-waste collection instead where you have one, as large-scale composting reaches temperatures that kill them.' ),
						array( 'question' => 'Can I reuse the potting mix from a blighted pot?', 'answer' => 'Better not for tomatoes. The RHS advises against growing tomatoes the next year in soil or potting mix from a blight-affected crop. Spread it somewhere you will not grow tomatoes or potatoes.' ),
						array( 'question' => 'Which tomatoes resist blight?', 'answer' => 'Many varieties are sold as blight-resistant; check the seed packet. In RHS trials at Wisley in 2021, a bad blight year in England, \'Crimson Crush\' and \'Mountain Magic\' performed very well while susceptible varieties failed. No variety is completely immune.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Tomato blight', 'url' => 'https://www.rhs.org.uk/disease/tomato-blight' ),
						array( 'title' => 'RHS — Tomato leaf mould', 'url' => 'https://www.rhs.org.uk/disease/tomato-leaf-mould' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'University of Minnesota Extension — Late blight of tomato and potato', 'url' => 'https://extension.umn.edu/disease-management/late-blight' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to reduce the risk of blight' ) .
					$list(
						array(
							'Choose a variety sold as blight-resistant, especially if your tomatoes grow outside.',
							'Water the potting mix, not the leaves, and water in the morning so any wet leaves dry quickly: blight needs wet leaves to infect.',
							'Watch the weather from early summer. After damp spells, check the leaves, stems and fruit every day.',
							'Do not reuse potting mix from a blighted plant for next year\'s tomatoes; spread it where no tomatoes or potatoes will grow.',
							'Clean stakes and supports with a garden disinfectant before reuse.',
						)
					),
			),

			'flowers-dropping-off' => array(
				'image_prompt' => 'A bell pepper plant with glossy dark green oval leaves in a 12-inch (30 cm) pot on a hot, sunny balcony, a few small white star-shaped flowers open on the plant and several withered yellowed flowers and buds lying on the dry potting mix below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A cherry tomato plant in a pot on a sunny balcony with clusters of small yellow star-shaped flowers, some flower stalks bare and a few dropped yellow flowers on the potting mix, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are the Flowers Falling Off My Tomatoes and Peppers?',
				'excerpt'      => 'Flowers that wither and drop before they set fruit are usually a sign of stress: dry potting mix, very hot days and nights, hunger, or too few pollinating insects. Keep pots evenly moist, water daily in hot weather, feed once flowering starts, and give plants a sunny, sheltered spot.',
				'plants'       => array( 'cherry-tomato', 'bell-peppers-in-pots', 'chili-peppers-in-pots', 'green-beans-in-pots' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Dry potting mix',
							'sign'     => 'Flower buds fall off, and the mix is dry below the surface',
							'check'    => 'Bell pepper and chili flower buds may drop if the plants get too dry, and plants in pots dry out very quickly in summer. Beans are thirsty too, especially once they start to flower and form pods.',
							'fix'      => 'Check the potting mix every day and be ready to water daily in hot, dry weather. Use a pot big enough to hold water between waterings: at least 12 in (30 cm) wide for bell peppers, about 9 in (22 cm) for a chili, 12–18 in (30–45 cm) for a tomato or for bush beans.',
							'recovery' => 'Buds that have dropped are lost; keep the mix evenly moist to protect the flowers still to come.',
						),
						array(
							'cause'    => 'Very hot days and nights',
							'sign'     => 'Flowers wither or drop during or soon after a heat wave, even though the plants look healthy',
							'check'    => 'Tomatoes under sustained heat, above about 85 °F (29 °C) by day and 70 °F (21 °C) at night, often drop their flowers without being pollinated. Heat 7–15 days before flowering can also make flowers abort. Bell peppers fruit less above 86 °F (30 °C). Bean flowers can abort in very hot weather, especially if the mix is dry, and hot nights in particular stop runner bean pollen working.',
							'fix'      => 'Keep watering well during hot spells. In a greenhouse, ventilate and shade the plants. Outdoors there is little you can do about the weather.',
							'recovery' => 'Tomatoes produce new flowers frequently, so fruit sets again once the heat breaks. Runner beans usually start cropping again as nights cool in early fall.',
						),
						array(
							'cause'    => 'Not enough pollination',
							'sign'     => 'Flowers open normally but fall without forming fruit, especially in cold, wet or windy weather',
							'check'    => 'Bad weather keeps bees and other pollinating insects away. Plants in an exposed spot get fewer visits.',
							'fix'      => 'Grow plants in a sheltered spot, which encourages bees to visit. For tomatoes, lightly tap or shake the flowers when they are fully open to move the pollen; misting the flowers can also help. Do not mist runner bean flowers: it does not help pod set and may put bees off. Avoid spraying insecticides on flowering plants, as they also kill bees.',
							'recovery' => 'Fruit sets on the next flowers once pollination improves. Green bean flowers pollinate themselves, so they rely less on insects.',
						),
						array(
							'cause'    => 'Hungry plants',
							'sign'     => 'Plants have been in the same potting mix for weeks without feeding and flower poorly',
							'check'    => 'Poor fertility can also make flowers abort and drop.',
							'fix'      => 'Feed peppers and chilies in pots weekly with a high-potassium liquid fertilizer as soon as flowering starts. Feed container tomatoes every 10–14 days with a high-potassium fertilizer once the first fruits start to swell, and give beans a tomato fertilizer once the first flowers appear.',
							'recovery' => 'Later flowers should set better with regular feeding.',
						),
						array(
							'cause'    => 'Pods or fruit left on the plant too long',
							'sign'     => 'Bean plants stop flowering, or chilies produce few new flowers',
							'check'    => 'If bean pods are left to swell and make seed, the plant stops producing more. Leaving chilies to ripen on the plant early in the season also discourages new flowers.',
							'fix'      => 'Pick runner beans every two to three days, and green beans regularly. Pick chilies while still green early in the season, and leave later fruits to ripen.',
							'recovery' => 'Regular picking keeps new flowers coming.',
						),
					),
					'products' => array(
						array( 'name' => 'High-potassium liquid fertilizer', 'badge' => '', 'note' => 'Start once flowering begins on peppers and chilies, or once fruit swells on tomatoes.', 'url' => '' ),
						array( 'name' => 'Large pot with drainage holes', 'badge' => '', 'note' => 'More potting mix holds more water between waterings.', 'url' => '' ),
						array( 'name' => 'Watering can with a rose', 'badge' => '', 'note' => 'For a daily check and water in hot weather.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is it normal for some flowers to drop?', 'answer' => 'Yes. Even in ideal conditions, more than half of runner bean flowers may not set pods. The crop only drops noticeably when far more than half fail.' ),
						array( 'question' => 'Should I spray the flowers with water?', 'answer' => 'For tomatoes, light misting of the flowers can help pollination, as can tapping them gently. For runner beans, no: misting has not been shown to help and may deter bees.' ),
						array( 'question' => 'Can I grow peppers outside on a balcony?', 'answer' => 'In a warm, sheltered spot, yes, once night temperatures stay above 54 °F (12 °C). They grow better above 59 °F (15 °C) and usually give fewer fruits outdoors than in a greenhouse.' ),
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
							'Use a pot big enough to hold water for a day: 12–18 in (30–45 cm) for a tomato, at least 12 in (30 cm) for a bell pepper.',
							'Look at the potting mix daily in summer, and water before it dries out.',
							'Give plants a warm, sunny spot that is sheltered from wind, so bees visit.',
							'Start a high-potassium fertilizer when flowering begins.',
							'Pick beans every few days and keep picking ripe fruit.',
						)
					),
			),
		),
	),
);
