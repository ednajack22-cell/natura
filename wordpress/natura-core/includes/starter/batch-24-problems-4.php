<?php
/**
 * Starter guides, batch 24: viruses, mildews, rusts and root pests.
 * Cucumber mosaic virus, downy mildew, rust, leaf spots, potato scab,
 * bitter pit, imported currantworm (gooseberry sawfly) and carrot rust fly.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from the University of Massachusetts Amherst fact sheet on bean
 * halo blight (the RHS has no page on it), from the University of
 * Minnesota, Cornell University, Pacific Northwest Pest Management
 * Handbooks, Washington State University and University of California
 * extension pages cited in the cucumber mosaic virus, potato scab, bitter
 * pit, currantworm and carrot rust fly guides (checked 19 October 2026),
 * and from Jo Whittingham, Backyard Harvest (DK, 2011), pp. 49, 78–80,
 * 123, 237–243; see design/sources/BACKYARD-HARVEST.md. The book's named
 * sprays are not reused: the RHS lists no fungicide for UK home gardeners
 * against any of the diseases here on edible crops, so the controls are
 * hygiene, spacing, steady watering, resistant varieties, hand removal, the
 * nematode biological controls the RHS names (labeled UK) and the low-risk
 * options a US extension lists for home gardeners. The plant guides keep
 * one sentence and a link; each page here owns the diagnosis. Seasons
 * replace the UK month names; UK timings are labeled as such.
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
	'name'   => __( 'Viruses, mildews, rusts and root pests', 'natura-core' ),
	'guides' => array(
		'problem' => array(

			'cucumber-mosaic-virus' => array(
				'image_prompt' => 'A zucchini plant in an 18 in (45 cm) black plastic container on a sunny balcony in early summer, its large lobed leaves showing a patchy yellow and green mosaic, several younger leaves small, crinkled and curled downwards, the plant short and squat compared with a healthy zucchini in the pot beside it, one small zucchini fruit twisted and lumpy with pale yellow blotches. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Close vertical view of a zucchini leaf with a yellow and green mosaic pattern and downward-curling edges, a stunted plant in a pot on a balcony behind it and a small misshapen fruit at the base. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Zucchini Leaves Mottled and the Fruit Twisted? (Cucumber Mosaic Virus)',
				'excerpt'      => 'A yellow and green mosaic on the leaves, small crinkled leaves that curl down, a squat plant and lumpy, misshapen fruit point to cucumber mosaic virus, which aphids carry from plant to plant. There is no cure, so take the plant out promptly, wash your hands and tools, and grow a resistant variety next time.',
				'plants'       => array( 'zucchini-in-pots', 'cucumbers-in-pots', 'eggplant-in-pots', 'spinach-in-pots', 'lettuce-in-pots' ),
				'parts'        => array( 'leaves', 'flowers-fruit', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Cucumber mosaic virus (CMV) brought in by aphids',
							'sign'     => 'Yellowish patches or a green and yellow mottle on the leaves; new leaves smaller, distorted and turned down at the edges; a stunted plant with short gaps between the leaves; fewer fruits, and those it makes are distorted',
							'check'    => 'Look at the shoot tips and under the leaves for aphids, which are the main carriers. Despite the name, the virus attacks a very wide range of plants: University of Minnesota Extension says it can infect plants from more than forty families, including tomato, lettuce and spinach, and the RHS adds zucchini, cucumbers and celery, as well as flowers such as lilies, delphiniums and primulas. Expect it while plants are growing fast in spring and summer.',
							'fix'      => 'There is nothing to spray: no chemical controls viruses. Lift the whole plant, roots included, out of its pot straight away and throw it away, so it cannot act as a source for your other plants.',
							'recovery' => 'An infected plant does not get better. Fresh plants of a resistant variety are the way to keep cropping.',
						),
						array(
							'cause'    => 'Virus carried on hands and tools',
							'sign'     => 'More plants show the mottle after you have been picking, pinching out or tying in along a row of pots',
							'check'    => 'Aphids do most of the spreading, but the RHS notes that CMV can also travel on fingers, knives and pruners.',
							'fix'      => 'Wash your hands and tools with soap and water after touching a plant you suspect, before you handle healthy ones.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Weeds that harbor the virus',
							'sign'     => 'Mottled plants keep appearing although you remove them, with weeds growing in or around the pots',
							'check'    => 'University of Minnesota Extension explains that perennial weeds let mosaic viruses survive from one season to the next. In the UK, the RHS names groundsel and chickweed as especially likely to carry CMV, and some weeds hold it without showing any symptoms.',
							'fix'      => 'Pull weeds out of pots, gravel and paving cracks nearby, and keep doing so through the season.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Look-alikes: mites or herbicide',
							'sign'     => 'Mottled or yellowing leaves, but with fine pale speckling and webbing, or with stunting and twisting that started after a new soil mix',
							'check'    => 'Spider mites also mottle zucchini leaves, mostly in hot summers. Herbicide (weed killer) can stunt and distort growth and yellow the leaves; the RHS has traced cases to manure carrying hormone weed killer residues.',
							'fix'      => 'For speckles and webbing, see <a href="/problems/spider-mites/">spider mites</a>. If you added manure to the pot, suspect that before blaming a virus.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Seed of a resistant zucchini or cucumber', 'badge' => '', 'note' => 'Look for CMV in the disease-resistance codes in the seed catalog; resistance to one mosaic virus does not cover the others.', 'url' => '' ),
						array( 'name' => 'Hand lens', 'badge' => '', 'note' => 'For spotting aphids on shoot tips before the virus has a chance to spread.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Which zucchini and cucumbers resist cucumber mosaic virus?', 'answer' => 'Check the disease codes in your seed catalog: University of Minnesota Extension notes that resistance is specific to each virus, so a variety resistant to another mosaic virus may not resist CMV. In the UK, the RHS names zucchini Supremo and Defender, bush marrow or zucchini Badger Cross, Zebra Cross and Tiger Cross, cucumbers Bush Champion, Crispy Salad, Jazzer, Paskia, Petita and Country Fair, and eggplant Bonica. They show some resistance, not immunity.' ),
						array( 'question' => 'Will killing the aphids stop cucumber mosaic virus?', 'answer' => 'Not reliably. The RHS says using insecticides to cut down aphid transmission is not practical, and University of Minnesota Extension warns that sprays against aphids often kill their natural enemies, so aphid numbers can rise afterwards. Remove infected plants quickly, keep weeds down and grow resistant varieties.' ),
						array( 'question' => 'Can the virus pass from my zucchini to other pots?', 'answer' => 'Yes. CMV has a very wide host range among vegetables and flowers, including spinach and lettuce, though fruit crops are rarely attacked. That is why the RHS advises destroying suspect plants promptly.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Cucumber mosaic virus', 'url' => 'https://www.rhs.org.uk/disease/cucumber-mosaic-virus' ),
						array( 'title' => 'RHS — Plant viruses', 'url' => 'https://www.rhs.org.uk/disease/plant-viruses' ),
						array( 'title' => 'RHS — Courgette, marrow, pumpkin and squash problems', 'url' => 'https://www.rhs.org.uk/problems/courgette-marrow-pumpkin-and-squash' ),
						array( 'title' => 'University of Minnesota Extension — Cucurbit viruses', 'url' => 'https://extension.umn.edu/disease-management/cucurbit-viruses' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep cucumber mosaic virus out of your pots' ) .
					$list(
						array(
							'Choose a resistant variety when you sow <a href="/plants/zucchini-in-pots/">zucchini in pots</a> or <a href="/plants/cucumbers-in-pots/">cucumbers in pots</a>.',
							'Check shoot tips for aphids every few days in spring and summer; <a href="/problems/aphids-container-plants/">aphids on container plants</a> explains how to deal with them.',
							'Keep weeds out of pots and the paving around them, perennial weeds above all.',
							'Wash hands and tools after handling any plant that looks mottled.',
							'Take out a mottled, stunted plant as soon as you are sure, rather than waiting to see if it improves.',
						)
					),
			),

			'downy-mildew' => array(
				'image_prompt' => 'A loose-leaf green lettuce in a 12 in (30 cm) terracotta pot on a damp balcony in late summer, one outer leaf folded back to show its underside with a fuzzy whitish mold in angular patches between the veins, the upper surfaces of the outer leaves marked with pale yellow angular blotches, some edges turning brown, the heart of the lettuce still fresh and green, droplets on the leaves. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close-up of an outer lettuce leaf folded back, showing angular yellow patches on top and white downy mold beneath, the potted lettuce on a wet balcony in soft overcast light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Lettuce Leaves Have Angular Yellow Blotches With Mold Underneath? (Downy Mildew)',
				'excerpt'      => 'Yellow patches on top of a leaf, often with straight edges along the veins, and a fuzzy white, gray or purple mold in the same spot underneath are downy mildew, a disease of long spells of wet leaves. Remove affected leaves at once, give pots space and water in the morning; the RHS lists no fungicide for home gardeners in the UK.',
				'plants'       => array( 'lettuce-in-pots', 'salad-greens-in-pots', 'spinach-in-pots', 'kale-in-pots', 'radishes-in-pots', 'turnips-in-pots', 'green-onions-in-pots', 'chives-in-pots' ),
				'parts'        => array( 'leaves', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Lettuce downy mildew',
							'sign'     => 'Angular yellow patches on the upper side of lettuce leaves, a whitish fuzz under each one, and later brown, dead patches',
							'check'    => 'Turn a leaf over: the mold sits exactly beneath the yellow patch. In the UK, outdoor lettuces get it from early summer to mid-fall; lettuces under glass can get it at any time of year. It often stays on the outer leaves.',
							'fix'      => 'Pick off affected leaves as soon as you see them, before they release spores. If only the outer leaves are hit, cut the heart to eat and throw away the rest of the plant.',
							'recovery' => 'Dead patches are often taken over by <a href="/problems/gray-mold/">gray mold</a>, so do not leave damaged leaves on the plant.',
						),
						array(
							'cause'    => 'Brassica downy mildew on kale, radishes, turnips and their relatives',
							'sign'     => 'Seedlings covered in a whitish coating that die quickly; on bigger plants, yellow angular patches on top with white fuzz beneath, and sometimes browning inside radish roots',
							'check'    => 'Young plants are most at risk in spring, especially under cover; maturing plants outdoors in summer and early fall. White blister, another leaf disease of brassicas, often turns up alongside it.',
							'fix'      => 'Thin or space plants more widely so air moves between them, and take out infected plants promptly rather than letting them rot in the pot.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Onion downy mildew on green onions and chives',
							'sign'     => 'Leaves yellow and die back from the tip, with a white, then purplish mold in damp weather, later blackened by other molds',
							'check'    => 'It is worst in cool, wet seasons, and closely sown green onions are especially vulnerable.',
							'fix'      => 'Remove and throw away affected plants; do not compost them. The RHS advises not growing onions in the same soil for five years, so start the next sowing in fresh potting mix.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Leaves that stay wet, and crowded pots',
							'sign'     => 'Outbreaks after wet weeks, under a cold frame or cloche, or where pots are pushed together',
							'check'    => 'Downy mildew needs long periods of leaf wetness to infect, and many kinds make their spores at night, so leaves damp overnight are ideal for it.',
							'fix'      => 'Water early in the day and aim at the potting mix, open frames and vents when you can, keep weeds down and leave space between pots.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Lettuce seed of a resistant variety', 'badge' => '', 'note' => 'The RHS gives Leny and Lettony as examples in the UK; elsewhere, check seed catalogs for downy mildew resistance.', 'url' => '' ),
						array( 'name' => 'Fresh peat-free potting mix', 'badge' => '', 'note' => 'For the next crop of the same kind, as resting spores stay in old mix.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I tell downy mildew from powdery mildew?', 'answer' => 'Powdery mildew forms a white, dusty coating, mostly on top of the leaf, and can strike in dry summers. Downy mildew shows as a discolored patch on top with mold underneath, and needs wet leaves. They are unrelated organisms. For the dusty kind, see our powdery mildew guide.' ),
						array( 'question' => 'Can I reuse potting mix after a downy mildew outbreak?', 'answer' => 'Not for the same crop. As diseased leaves rot they release tough resting spores that can last in soil for up to five years and infect the roots of the next plants of that kind. Each downy mildew attacks only a narrow group of related plants, so use that mix for a different crop and give the next lettuces fresh potting mix.' ),
						array( 'question' => 'Do resistant lettuces always stay clean?', 'answer' => 'No. Lettuce downy mildew has many races and new ones keep appearing that overcome resistance in older varieties. Resistant varieties still help; check current seed catalogs for the latest.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Downy mildews', 'url' => 'https://www.rhs.org.uk/disease/downy-mildews' ),
						array( 'title' => 'RHS — Lettuce downy mildew', 'url' => 'https://www.rhs.org.uk/disease/lettuce-downy-mildew' ),
						array( 'title' => 'RHS — Brassica downy mildew', 'url' => 'https://www.rhs.org.uk/disease/brassica-downy-mildew' ),
						array( 'title' => 'RHS — Onion downy mildew', 'url' => 'https://www.rhs.org.uk/disease/onion-downy-mildew' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent downy mildew in pots' ) .
					$list(
						array(
							'Sow thinly and thin early, so each plant has air around it.',
							'Water in the morning, onto the potting mix; <a href="/how-often-to-water-container-plants/">how often to water container plants</a> covers the routine.',
							'Check the undersides of outer leaves after wet spells and pick off any with mold.',
							'Use fresh potting mix for the next <a href="/plants/lettuce-in-pots/">lettuces</a>, green onions or brassicas after an outbreak.',
							'A white powder on top of leaves in dry weather is a different disease: see <a href="/problems/powdery-mildew/">powdery mildew</a>.',
						)
					),
			),

			'rust-on-leaves' => array(
				'image_prompt' => 'Close-up of leek leaves growing in a deep 16 in (40 cm) gray container on a sunny patio in early fall, the long flat blue-green leaves dotted with many small, raised, bright orange pustules on both sides, a little orange dust on the leaf surface, a bush bean in a pot in the background with a few rusty brown spots on its heart-shaped leaves. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close-up of a leek leaf in a patio container covered in raised bright orange rust pustules, soft fall light, the rest of the leeks blurred below. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Orange Pustules on My Leeks, Beans or Plum Tree? (Rust)',
				'excerpt'      => 'Small raised spots that burst into orange, brown or black dust, usually under the leaf or on both sides, are rust, a group of fungi that each attack only a few related plants. Pick off the first few affected leaves, do not overfeed with nitrogen, avoid crowding, and clear up fallen leaves; often the crop is barely affected.',
				'plants'       => array( 'leeks-in-pots', 'garlic-in-pots', 'chives-in-pots', 'green-beans-in-pots', 'runner-beans-in-pots', 'fava-beans-in-pots', 'plum-tree-in-pot', 'pear-tree-in-pot', 'raspberries-in-pots', 'blueberries-in-pots' ),
				'parts'        => array( 'leaves', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Leek rust on leeks, garlic and chives',
							'sign'     => 'Bright orange, raised pustules on both sides of the leaves, from midsummer to late fall, that split open to release orange dust',
							'check'    => 'Bad attacks make leaves shrivel early and weaken the plant. The RHS has found that the form on leeks does not infect chives and the other way round, but garlic can catch both. Onions are rarely badly hit in the UK.',
							'fix'      => 'Rust is worse where there is plenty of nitrogen and little potassium, so go easy on high-nitrogen fertilizers. Do not crowd plants, and throw away all the leaves and debris when you finish harvesting.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Bean rust on green beans and runner beans',
							'sign'     => 'Pale raised spots on top of the leaf with small white pustules beneath, then tiny brown and finally black pustules, sometimes on the pods',
							'check'    => 'Older leaves show it first. Heavy rust usually builds up after midsummer, too late to cut the crop much, but warm, wet or humid summers raise the risk. Fava beans get a different rust: small, dusty, dark brown spots, often with a pale yellow ring.',
							'fix'      => 'Pick off affected leaves as soon as you notice them and thin dense growth. Throw away badly affected plants, which shed huge numbers of spores, clear fallen leaves at the end of the season and do not save seed from rusty plants.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Plum rust and pear rust',
							'sign'     => 'Plum: tiny dark brown pustules under the leaves with small yellow spots above, in late summer and fall. Pear: bright orange spots on top of the leaves in summer, with brown, gall-like growths forming underneath',
							'check'    => 'Plum rust comes late, does little harm and does not affect the fruit; it spends part of its life on Anemone coronaria. Pear rust needs junipers to complete its life cycle, and its spores travel a long way in the air.',
							'fix'      => 'Usually leave plum rust alone, but gather fallen leaves in fall. On a pear, do not strip a heavily spotted tree, which the RHS warns may do more harm than good; cut out any cankers on the branches.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Raspberry rust and blueberry rust',
							'sign'     => 'Raspberry: yellow pustules on the upper side of the lowest leaves in spring, then many tiny orange ones beneath, turning black in fall. Blueberry: spots on top with yellow-orange pustules beneath in late summer and early fall',
							'check'    => 'Both make leaves fall early in bad attacks. Raspberry rust is worst in long wet spells and among crowded canes. Raspberries affected usually still give a reasonable crop.',
							'fix'      => 'Remove the first few infected leaves only; taking off many does more harm than good on raspberries. Keep canes uncrowded, feed without overdoing it, and pick up fallen leaves from the pot and saucer in fall.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Balanced all-purpose fertilizer', 'badge' => '', 'note' => 'Avoids the soft, nitrogen-rich growth that rusts colonize easily.', 'url' => '' ),
						array( 'name' => 'Leek seed of a variety sold as rust-tolerant', 'badge' => '', 'note' => 'Suppliers sometimes claim a degree of resistance; check current catalogs.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is the rust on my mint the same as on my leeks?', 'answer' => 'No. Rust fungi have very narrow host ranges, so the species on mint is not the one on leeks or beans. Mint rust also attacks marjoram and savory; our mint growing guide explains how to deal with it.' ),
						array( 'question' => 'Should I strip every leaf that has rust on it?', 'answer' => 'Only while it is a handful of leaves. Picking off the first few can slow the disease, but removing leaves in large numbers weakens the plant more than the rust does.' ),
						array( 'question' => 'Is there a spray for rust on vegetables and fruit?', 'answer' => 'Not one this guide recommends. In the UK, the RHS says no fungicides with good activity against rust on edible crops are available to home gardeners, and recommends against fungicides generally. Spacing, sensible feeding and clearing debris are the controls.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Rust diseases', 'url' => 'https://www.rhs.org.uk/disease/rust-diseases' ),
						array( 'title' => 'RHS — Leek rust', 'url' => 'https://www.rhs.org.uk/disease/leek-rust' ),
						array( 'title' => 'RHS — Runner and French bean rust', 'url' => 'https://www.rhs.org.uk/disease/runner-and-french-bean-rust' ),
						array( 'title' => 'RHS — Broad bean rust', 'url' => 'https://www.rhs.org.uk/disease/broad-bean-rust' ),
						array( 'title' => 'RHS — Tree rusts', 'url' => 'https://www.rhs.org.uk/disease/tree-rusts' ),
						array( 'title' => 'RHS — Pear rust', 'url' => 'https://www.rhs.org.uk/disease/pear-rust' ),
						array( 'title' => 'RHS — Raspberry rust', 'url' => 'https://www.rhs.org.uk/disease/raspberry-rust' ),
						array( 'title' => 'RHS — Blueberry rust', 'url' => 'https://www.rhs.org.uk/disease/blueberry-rust' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep rust down in pots' ) .
					$list(
						array(
							'Feed steadily rather than heavily; <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a> has the routine.',
							'Leave space between pots of leeks, garlic and beans so the leaves dry quickly after rain.',
							'Clear rusty leaves and debris at the end of the crop or at leaf fall, and do not grow the same crop in that potting mix straight away.',
							'For orange spots on mint or oregano, see <a href="/plants/mint-in-pots/">mint in pots</a>.',
						)
					),
			),

			'leaf-spots' => array(
				'image_prompt' => 'A bush bean plant in a 12 in (30 cm) terracotta pot on a balcony in a cool, damp early summer, several heart-shaped leaflets showing small dark brown dead spots each surrounded by a wide pale yellow-green halo, one pod with a reddish-brown water-soaked mark, healthy leaves higher up the plant. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close-up of a bean leaflet with dark brown spots ringed by yellow halos, a potted bean plant on a balcony behind it in soft light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Leaves Have Brown Spots With a Yellow Ring? (Leaf Spots)',
				'excerpt'      => 'Small brown or black spots, sometimes ringed with yellow or falling out to leave holes, are leaf spots caused by bacteria or fungi that spread in rain splash and on fallen leaves. Pick off spotted leaves, water the potting mix rather than the foliage, clear up leaf litter, and start beans from clean seed.',
				'plants'       => array( 'green-beans-in-pots', 'runner-beans-in-pots', 'currants-in-pots', 'gooseberries-in-pots', 'cherry-tree-in-pot', 'plum-tree-in-pot' ),
				'parts'        => array( 'leaves', 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Halo blight on green beans and runner beans',
							'sign'     => 'Tiny water-soaked spots under the leaves that turn brown and dead, each with a yellow halo; red or brown water-soaked marks on stems and pods',
							'check'    => 'It is a bacterial disease of cool weather and often appears soon after seedlings come up. It starts from infected seed or old bean debris, and splashing water spreads it.',
							'fix'      => 'Pick off spotted leaves and water at the base of the plant, never over the top. Avoid handling plants while they are wet. Next time, start from fresh, clean seed rather than seed saved from these plants.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Currant and gooseberry leaf spot',
							'sign'     => 'From about early summer, many very small dark brown or black spots that merge until large areas of leaf turn brown; leaves drop early and fruit may shrivel',
							'check'    => 'The fungus survives the winter on fallen leaves and starts new infections in spring; rain splashes it around in summer. It is worst on weak bushes.',
							'fix'      => 'Pick up every fallen leaf from the pot, saucer and surrounding floor in fall and throw it away. Keep the bush well fed and never let the potting mix dry out completely, so it is not weakened.',
							'recovery' => 'Early leaf fall weakens the bush further. After a bad year, the RHS suggests feeding to help the new leaves grow away well the following season.',
						),
						array(
							'cause'    => 'Shothole on cherries and plums',
							'sign'     => 'Small round brown spots from early summer that drop out, leaving the leaf peppered with holes',
							'check'    => 'On plums and cherries this is often bacterial canker. Look along the branches for sunken patches of dead bark, often oozing gum. On cherries, purple spots, blotchy yellow leaves and white flecks under the spots in wet weather point to a fungal cherry leaf spot instead.',
							'fix'      => 'For bacterial canker, the RHS advises pruning only in mid- to late summer, cutting cankers back to healthy wood. For cherry leaf spot, collect and dispose of fallen leaves.',
							'recovery' => 'Shothole is worse in wet years and often much lighter in a dry season.',
						),
						array(
							'cause'    => 'Spots on fava beans',
							'sign'     => 'Small round red-brown spots that darken and spread in cool, damp weather, or dusty dark brown spots ringed with pale yellow',
							'check'    => 'The first is chocolate spot, the second fava bean rust.',
							'fix'      => 'See <a href="/plants/fava-beans-in-pots/">fava beans in pots</a> for chocolate spot and <a href="/problems/rust-on-leaves/">rust</a> for the dusty spots.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Fresh bean seed', 'badge' => '', 'note' => 'Halo blight is carried on seed, so start from a new packet rather than your own saved seed after an attack.', 'url' => '' ),
						array( 'name' => 'Currant or gooseberry of a resistant variety', 'badge' => '', 'note' => 'In the UK, the RHS lists black currants such as Ben Connan and Ben Hope and red currant Rondom as showing some resistance to leaf spot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How can I tell a bacterial leaf spot from a fungal one?', 'answer' => 'Backyard Harvest describes bacterial spots as dead patches with a yellow halo, spread by splashing water, and fungal spots as round gray or brown marks, sometimes with tiny black dots in them. Either way, remove the spotted leaves and keep water off the foliage.' ),
						array( 'question' => 'Is there a spray for leaf spot on currants or plums?', 'answer' => 'Not one this guide recommends. In the UK, the RHS lists no fungicide for home gardeners against currant and gooseberry leaf spot, and no spray against bacterial canker. Clearing fallen leaves, pruning at the right time and keeping plants vigorous are the controls.' ),
						array( 'question' => 'Will halo blight ruin the whole bean crop?', 'answer' => 'It can. Spots on the pods spoil them, and severe infections can destroy a crop entirely. Do not keep seed from affected plants, because infected seed carries the bacteria into next year\'s plants.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Currant and gooseberry leaf spot', 'url' => 'https://www.rhs.org.uk/disease/currant-and-gooseberry-leaf-spot' ),
						array( 'title' => 'RHS — Bacterial canker', 'url' => 'https://www.rhs.org.uk/disease/bacterial-canker' ),
						array( 'title' => 'RHS — Cherry leaf scorch and leaf spot', 'url' => 'https://www.rhs.org.uk/disease/cherry-leaf-scorch-and-leaf-spot' ),
						array( 'title' => 'RHS — Broad bean chocolate spot', 'url' => 'https://www.rhs.org.uk/disease/broad-bean-chocolate-spot' ),
						array( 'title' => 'UMass Amherst Extension — Bean, halo blight', 'url' => 'https://ag.umass.edu/vegetable/fact-sheets/bean-halo-blight' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent leaf spots on pot-grown crops' ) .
					$list(
						array(
							'Water the potting mix, not the leaves, and do it early in the day.',
							'Space bean pots so foliage dries quickly, and leave wet plants alone.',
							'Sweep fallen leaves off the pot and the balcony floor in fall under fruit bushes and trees.',
							'Feed and water <a href="/plants/currants-in-pots/">currants</a> and <a href="/plants/gooseberries-in-pots/">gooseberries</a> steadily, as weak bushes suffer most.',
							'Prune <a href="/plants/plum-tree-in-pot/">plums</a> and <a href="/plants/cherry-tree-in-pot/">cherries</a> in summer, not winter.',
						)
					),
			),

			'potato-scab' => array(
				'image_prompt' => 'A heap of freshly tipped-out potatoes on a sheet beside an emptied fabric potato grow bag on a patio in summer, several pale-skinned tubers marked with raised, rough, corky brown patches, one tuber with a sunken brown scab with a papery edge, peat-free potting mix still clinging to them, a trowel at the side. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close-up of a few pale potatoes with rough, raised brown scabby patches, resting on dark potting mix next to a fabric grow bag on a patio. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Potatoes Have Rough, Scabby Skins? (Potato Scab)',
				'excerpt'      => 'Raised, rough, corky patches on the skin are common scab, which is worse when the potting mix dries out as the tubers form; sunken, powdery scabs with papery edges are powdery scab, which is worse in wet conditions. Light scab is skin-deep, so peel and eat the potatoes, and keep the next bag evenly moist but well drained.',
				'plants'       => array( 'potatoes-in-bags', 'radishes-in-pots', 'beets-in-pots', 'turnips-in-pots' ),
				'parts'        => array( 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Common scab (Streptomyces bacteria)',
							'sign'     => 'Raised, rough patches on the skin of the tubers, seen at harvest and lasting through storage',
							'check'    => 'Think back to early summer: common scab is worse when the mix is dry just as the tubers are forming. It is also worse in alkaline conditions; Cornell University notes that it is strongly suppressed at a soil pH of 5.2 or lower. It can mark beets, radishes, rutabagas and turnips as well.',
							'fix'      => 'Keep the bag evenly moist through tuber formation. Cornell University says moist soil during the 2 to 6 weeks after tubers start to form inhibits infection; the RHS suggests starting to water two to three weeks after the shoots appear and keeping it up for about four weeks. A bag needs checking more often than the ground. Do not add lime or manure.',
							'recovery' => 'Light scab only affects the skin and makes little difference to eating quality. Severe attacks can crack the skin and let the tubers rot.',
						),
						array(
							'cause'    => 'Powdery scab (Spongospora)',
							'sign'     => 'Irregular brown raised areas or hollows with papery edges, full of dusty brown spores; bad attacks can distort the tuber',
							'check'    => 'This one is worse in wet conditions, because its spores need water to swim and infect. It can also infect tomato roots.',
							'fix'      => 'Make sure the bag drains freely and does not sit in a saucer of water; <a href="/plants/potatoes-in-bags/">potatoes in bags</a> covers drainage holes.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Scab brought in on seed potatoes',
							'sign'     => 'Scab on a first crop in fresh potting mix',
							'check'    => 'Rules limit scab on certified seed potatoes, but low levels are allowed, and Cornell University notes that even tubers without visible lesions can carry it.',
							'fix'      => 'Buy certified seed potatoes, look them over before planting and leave out any with visible scab.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Look-alike: black scurf',
							'sign'     => 'Hard, raised, black patches that scrape or rub off easily, leaving the skin underneath sound',
							'check'    => 'This is a soil fungus, Rhizoctonia solani, not scab. It does not feed on the tuber, and affected potatoes store without rotting.',
							'fix'      => 'Scrub or peel them. Do not plant heavily affected tubers as seed, because the fungus can attack the new shoots; lifting earlier means fewer black patches form.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Seed potatoes of a scab-resistant variety', 'badge' => '', 'note' => 'In the US, Cornell University names Superior as the standard for resistance in the Northeast; in the UK, the British Potato Variety Database scores varieties for disease resistance.', 'url' => '' ),
						array( 'name' => 'Fabric potato grow bag', 'badge' => '', 'note' => 'Pick one with drainage holes in the base, as powdery scab is worse in wet conditions.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Which potato varieties resist scab?', 'answer' => 'For common scab in the US, Cornell University names Superior, Keuka Gold, Lehigh, Pike and Marcy as resistant, and Chieftain, Eva, Reba, Andover and Russet Burbank as moderately resistant; none is immune. In the UK, the RHS names Accent, Arran Pilot, Juliette, Golden Wonder, King Edward, Pentland Crown and Pentland Javelin for common scab, and Desiree, Hermes, King Edward, Pixie and Sante as showing some resistance to powdery scab.' ),
						array( 'question' => 'Can I still eat potatoes with scab on them?', 'answer' => 'Yes, in most cases. Light attacks of either scab stay in the skin and hardly affect eating quality, so peel them. Use badly cracked ones first, as they are more likely to rot in storage.' ),
						array( 'question' => 'Could very lumpy scabbed potatoes be wart disease?', 'answer' => 'Severe powdery scab can look like potato wart, a serious disease that is now very rare in the UK. In the UK, wart is notifiable, so if you suspect it, contact the plant health authority listed on the UK Plant Health Information Portal.' ),
						array( 'question' => 'Can I grow potatoes again in potting mix from a scabby crop?', 'answer' => 'Better not. Both scab organisms live in soil, the common scab bacteria freely and powdery scab as spores. Give the next potatoes, and any beets, radishes or turnips, fresh potting mix.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Potato scabs', 'url' => 'https://www.rhs.org.uk/disease/potato-scabs' ),
						array( 'title' => 'RHS — Potato black scurf and stem canker', 'url' => 'https://www.rhs.org.uk/disease/potato-black-scurf-and-stem-canker' ),
						array( 'title' => 'RHS — How to grow potatoes', 'url' => 'https://www.rhs.org.uk/vegetables/potatoes/grow-your-own' ),
						array( 'title' => 'Cornell University — Potato scab', 'url' => 'https://www.vegetables.cornell.edu/pest-management/disease-factsheets/potato-scab' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to grow cleaner potatoes in a bag' ) .
					$list(
						array(
							'Start each bag with fresh peat-free potting mix and certified seed tubers without visible scab.',
							'From a few weeks after the shoots appear, check the bag every day or two and water before it dries; <a href="/how-often-to-water-container-plants/">how often to water container plants</a> explains how to test it.',
							'Never stand the bag in water, and keep the drainage holes clear.',
							'Do not add lime or manure to potato potting mix.',
							'Choose a variety with scab resistance if your last crop was scabby.',
						)
					),
			),

			'bitter-pit' => array(
				'image_prompt' => 'A dwarf apple tree in a 20 in (50 cm) terracotta pot on a sunny patio in early fall, close view of two ripe green and red apples on a branch, their skins dotted with small, slightly sunken dark brown spots, one apple on the table beside the pot cut in half to show small brown, dry flecks just under the skin, pale green oval serrated leaves around. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photo of a potted apple tree on a patio with a halved apple in the foreground showing brown flecks under the skin and small sunken spots on the peel. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Apples Have Small Sunken Brown Spots? (Bitter Pit)',
				'excerpt'      => 'Small sunken spots on the skin with dry brown flesh underneath, sometimes appearing only after picking, are bitter pit, a disorder caused by too little calcium reaching the fruit. In a pot the usual cause is an uneven water supply, so water steadily, mulch the potting mix and avoid heavy nitrogen or potassium feeding.',
				'plants'       => array( 'apple-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Uneven watering',
							'sign'     => 'Small, sunken pits on the skin, with discolored, dry flesh just beneath; in bad cases brown flecks run through the apple and it tastes bitter',
							'check'    => 'Bitter pit is more common after hot, dry summers and in seasons when rainfall and temperature swing a lot. An irregular water supply stops calcium being taken up and moved around the tree. Potting mix in a container dries out much faster than garden soil.',
							'fix'      => 'Never let the potting mix dry out between waterings in summer, above all in dry spells, and lay a mulch over the surface to hold moisture; see <a href="/how-to-mulch-pots/">how to mulch pots</a>.',
							'recovery' => 'Affected apples will not improve, but steady watering protects the next crop.',
						),
						array(
							'cause'    => 'Too much nitrogen, potassium or magnesium',
							'sign'     => 'Pitted fruit on a young, fast-growing tree that has been fed generously',
							'check'    => 'Heavy use of nitrogen, potassium or magnesium fertilizers can cause or worsen bitter pit. It is rarely down to a real shortage of calcium in the potting mix.',
							'fix'      => 'Use a balanced, all-purpose fertilizer and do not add extra ammonium sulfate or potassium sulfate. Light summer pruning reduces the leaf area and sends more calcium to the fruit; avoid pruning hard.',
							'recovery' => '',
						),
						array(
							'cause'    => 'A susceptible variety',
							'sign'     => 'The same tree gets bitter pit most years, especially large-fruited varieties',
							'check'    => 'The Pacific Northwest Pest Management Handbooks list Honeycrisp, Northern Spy, Gravenstein, Grimes Golden and Baldwin as very susceptible, and Delicious, Gala and Winesap as fairly resistant. In the UK, the RHS lists Bramley\'s Seedling, Cox\'s Orange Pippin, Egremont Russet, Hamling\'s Seedling, Meridian, Merton Worcester, Newton Wonder and Warner\'s King as particularly prone, and says Jonagold and Gala appear unaffected.',
							'fix'      => 'Be extra careful with watering and feeding on a prone variety, or choose a less prone one when you buy a new tree.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Picking too early',
							'sign'     => 'Spots that appear a few weeks into storage',
							'check'    => 'Unripe apples are more likely to be low in calcium, and the disorder often shows up only after the fruit has been stored.',
							'fix'      => 'Leave the apples on the tree until fully ripe. If the tree has a history of bitter pit, freeze or cook the fruit rather than storing it.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Balanced all-purpose fertilizer', 'badge' => '', 'note' => 'Avoids the excess nitrogen or potassium that makes bitter pit worse.', 'url' => '' ),
						array( 'name' => 'Bark or compost mulch', 'badge' => '', 'note' => 'Slows the drying of the potting mix between waterings.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I still use apples with bitter pit?', 'answer' => 'Bitter pit is a disorder, not an infection. Where the brown flecks sit just under the skin you can peel them away; badly affected flesh is unpleasant. Cook spotted fruit soon after picking, before the problem gets worse, as the sugar hides any bitterness.' ),
						array( 'question' => 'Do calcium sprays prevent bitter pit?', 'answer' => 'They help. The Pacific Northwest Pest Management Handbooks advise five summer sprays about a month apart of calcium chloride or calcium nitrate at no more than 5 lb per 100 gallons (about 0.8 oz per gallon, or 6 g per litre), with a surfactant, never in hot weather, and covering the fruit, because stronger sprays burn leaves and fruit. In the UK, the RHS suggests about 1⅓ oz of calcium nitrate per gallon of water (10 g per litre), sprayed finely onto the leaves from early summer to early fall, only in the evening and below 70 °F (21 °C) to avoid marking the skins; do not mix it with other products, and test a branch first, waiting five days, as a few varieties are sensitive.' ),
						array( 'question' => 'Does bitter pit spread from tree to tree?', 'answer' => 'No. It is caused by too little calcium reaching the fruit, not by a fungus or bacterium, so it cannot pass between trees.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Bitter pit in apples', 'url' => 'https://www.rhs.org.uk/problems/bitter-pit-in-apples' ),
						array( 'title' => 'RHS — How to grow apples', 'url' => 'https://www.rhs.org.uk/fruit/apples/grow-your-own' ),
						array( 'title' => 'Pacific Northwest Pest Management Handbooks — Apple: bitter pit', 'url' => 'https://pnwhandbooks.org/plantdisease/host-disease/apple-malus-spp-bitter-pit' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent bitter pit on a potted apple tree' ) .
					$list(
						array(
							'Water a potted <a href="/plants/apple-tree-in-pot/">apple tree</a> on a steady routine through summer, more often in hot, dry spells; <a href="/how-often-to-water-container-plants/">how often to water container plants</a> has the method.',
							'Keep a mulch on top of the potting mix.',
							'Feed with a balanced fertilizer rather than high-nitrogen or high-potassium products; <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a> explains the routine.',
							'Pick only when the apples are fully ripe.',
							'Dark sunken patches at the base of tomatoes and peppers come from the same calcium problem: see <a href="/problems/blossom-end-rot/">blossom end rot</a>.',
						)
					),
			),

			'gooseberry-sawfly' => array(
				'image_prompt' => 'A gooseberry bush in an 18 in (45 cm) glazed blue pot on a patio in late spring, the lower and central branches stripped to bare leaf stalks and ribs, a few remaining lobed green leaves along the outer shoots, several pale green caterpillar-like larvae with many small black spots and black heads feeding along a leaf edge, small green gooseberries hanging below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close-up of green, black-spotted sawfly larvae eating a gooseberry leaf, the potted bush with bare stems behind on a sunny patio. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is Stripping All the Leaves Off My Gooseberry Bush? (Imported Currantworm)',
				'excerpt'      => 'Pale green, caterpillar-like larvae, often covered in black spots, that strip a gooseberry or red or white currant from the middle outwards are the imported currantworm, called gooseberry sawfly in the UK. Look low in the center of the bush from mid-spring and pick them off by hand; spray only if numbers build up, with a product a US extension or the RHS accepts for home gardeners.',
				'plants'       => array( 'gooseberries-in-pots', 'currants-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Imported currantworm (common gooseberry sawfly in the UK)',
							'sign'     => 'Larvae up to ¾ in (20 mm) long, pale green with many black spots and black heads; leaves eaten down to the ribs, starting in the middle of the bush',
							'check'    => 'Females lay eggs under leaves low down in the center, so the young larvae go unseen until they have worked their way up and out. Washington State University Extension suggests checking in mid-spring for small holes in the center leaves, and notes that a second generation may follow in early to midsummer. In the UK, the RHS says it can have three generations a year: mid-spring to early summer, midsummer, and late summer to early fall.',
							'fix'      => 'Part the branches and pick larvae off by hand into a tub, or pick off the infested leaves. Go over the bush again for each new generation.',
							'recovery' => 'Plants usually survive being stripped completely, but the crop may suffer, and a bush defoliated this year can crop poorly next year.',
						),
						array(
							'cause'    => 'Pale spotted gooseberry sawfly (UK)',
							'sign'     => 'Spotted larvae a little smaller than the common species, with pale green heads, in late spring and early summer only',
							'check'    => 'The RHS describes it in UK gardens. It has a single generation a year, so damage stops after early summer.',
							'fix'      => 'Hand-pick during late spring and early summer.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Small gooseberry sawfly (UK)',
							'sign'     => 'Plain pale green larvae from mid-spring onwards, with fresh damage through the summer',
							'check'    => 'The RHS says it can fit in up to four generations a year in the UK. The adult is small, about ³⁄₁₆ in (5 mm), black with pale yellow legs.',
							'fix'      => 'Check every week or two through summer and remove the larvae you find.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Look-alikes: moth caterpillars or mildew',
							'sign'     => 'Chewed leaves without spotted green larvae, or leaves and shoot tips coated in white powder that turns brown',
							'check'    => 'Some moth caterpillars also eat gooseberry and currant leaves. A powdery coating with twisted shoot tips is American gooseberry mildew, not an insect.',
							'fix'      => 'Pick off caterpillars by hand too. For the white coating, see <a href="/problems/powdery-mildew/">powdery mildew</a>.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Insecticidal soap', 'badge' => '', 'note' => 'One of the organic options Washington State University Extension lists for home gardeners in Washington; use it only when larvae are present.', 'url' => '' ),
						array( 'name' => 'Nematode biological control for fruit and vegetables (UK)', 'badge' => '', 'note' => 'Sold in the UK by mail order and in some garden centers; applied in cool, damp weather.', 'url' => '' ),
						array( 'name' => 'Small tub or jar', 'badge' => '', 'note' => 'For collecting larvae as you pick them off.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is there a spray or biological control for currantworms?', 'answer' => 'In the US, Washington State University Extension puts hand-picking first and lists insecticidal soap and spinosad, both organic, among products legal for home gardeners in Washington, to be used only when larvae or damage are present; the Pacific Northwest Pest Management Handbooks warn that spinosad is toxic to bees for a few hours after spraying, so never spray open flowers. In the UK, a pathogenic nematode sold for fruit and vegetable protection can be watered onto affected bushes, where it infects the larvae with a bacterial disease; apply it in cool, damp weather, and only when there is a real problem, as it can also affect other insects.' ),
						array( 'question' => 'Does sawfly attack all currant bushes?', 'answer' => 'The RHS lists gooseberries and red and white currants as the plants these sawflies feed on, and Washington State University Extension describes the imported currantworm on currants and gooseberries.' ),
						array( 'question' => 'Should I try to get rid of every sawfly?', 'answer' => 'No need. The RHS suggests tolerating them where you can, as they are part of a healthy garden. Birds, wasps and ground beetles eat them; step in by hand only when damage gets serious.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Gooseberry sawfly', 'url' => 'https://www.rhs.org.uk/biodiversity/gooseberry-sawfly' ),
						array( 'title' => 'RHS — American gooseberry mildew', 'url' => 'https://www.rhs.org.uk/disease/gooseberry-mildew' ),
						array( 'title' => 'Washington State University Extension — Currant, gooseberry: Imported currantworm', 'url' => 'https://hortsense.cahnrs.wsu.edu/fact-sheet/currant-gooseberry-imported-currantworm/' ),
						array( 'title' => 'Pacific Northwest Pest Management Handbooks — Currant and gooseberry: imported currant worm', 'url' => 'https://pnwhandbooks.org/insect/small-fruit/currant-gooseberry/currant-gooseberry-imported-currant-worm' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to stay ahead of currantworms' ) .
					$list(
						array(
							'From mid-spring, look low down in the middle of <a href="/plants/gooseberries-in-pots/">potted gooseberries</a> and <a href="/plants/currants-in-pots/">red and white currants</a>, where the first larvae feed.',
							'Prune to keep the center of the bush open: the RHS notes this makes sawfly easier to control as well as reducing mildew.',
							'Check again in midsummer and late summer for the later generations.',
							'Leave birds and ground beetles to help, and save sprays or nematodes for heavy attacks.',
						)
					),
			),

			'carrot-rust-fly' => array(
				'image_prompt' => 'Freshly pulled orange carrots lying on a wooden balcony table next to a deep 14 in (35 cm) container of carrots covered with fine white insect-proof mesh, two of the carrots scarred with rusty brown rings and tunnels, one cut lengthways to show a narrow tunnel with a slender creamy-yellow maggot inside, feathery green carrot tops still attached. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical close-up of a carrot cut open to show rusty brown tunnels and a thin creamy maggot, more carrots and a mesh-covered pot on a balcony behind. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Carrots Riddled With Rusty Brown Tunnels? (Carrot Rust Fly)',
				'excerpt'      => 'Rusty brown scars ringing the root and narrow tunnels inside, sometimes with slender creamy-yellow maggots, are carrot rust fly damage, called carrot fly in the UK. Lift and check the crop, do not store damaged roots, use fresh potting mix next time and keep the pot fully covered with insect-proof mesh.',
				'plants'       => array( 'carrots-in-pots', 'parsley-in-pots' ),
				'parts'        => array( 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Carrot rust fly maggots',
							'sign'     => 'Rusty brown rings and scars on the outside of the tap root; tunnels inside, some holding thin, creamy-yellow maggots no more than about ⅜ in (9 mm) long; young seedlings may die',
							'check'    => 'Cut a damaged root lengthways. Newly hatched maggots eat the fine roots first, then bore into the main root; the brown scars are tunnels near the surface that have collapsed. University of California notes there are no signs above ground. In the UK, eggs are laid in late spring and early summer and again in late summer and early fall. Parsnips, parsley, celery and celeriac are attacked too.',
							'fix'      => 'Lift the crop and sort it, harvesting all of it at once rather than a few roots at a time, as University of California advises. In the UK, a nematode biological control can be watered into the potting mix against young larvae: the RHS names Steinernema feltiae for spring and S. carpocapsae for summer, or a mixed fruit and vegetable product.',
							'recovery' => 'Tunneled roots do not heal. They are open to rots and keep poorly, so use any sound parts soon and do not store them.',
						),
						array(
							'cause'    => 'Flies hatching from last year\'s potting mix',
							'sign'     => 'Damage under a mesh cover that was on from sowing',
							'check'    => 'Carrot rust fly spends the winter as larvae or pupae in the soil. If carrots or parsley grew in the same mix last year, adults can emerge inside the cover.',
							'fix'      => 'Use fresh potting mix for each carrot sowing, and do not follow carrots with parsley in the same pot. The RHS stresses that netting only works with this kind of rotation.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Gaps in protection, or sowing at the wrong time',
							'sign'     => 'Damage on a pot that was left open, uncovered for weeding, or protected by a fence or a raised position alone',
							'check'    => 'The flies are weak and fly low, and the smell of crushed carrot foliage draws egg-laying females in. RHS research found a complete mesh cover more effective than a barrier around the crop. University of California suggests sowing to avoid the egg-laying periods: in early summer in cold areas, and in late winter or late summer where winters are mild.',
							'fix'      => 'Follow the prevention steps in <a href="/plants/carrots-in-pots/">carrots in pots</a>, which covers mesh, sowing and timing.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Look-alikes: split, forked or aphid-infested roots',
							'sign'     => 'Damaged roots with no rusty tunnels or maggots',
							'check'    => 'Roots split when the moisture level swings a lot, and fork on stones. White woolly wax on the fine roots is carrot root aphid.',
							'fix'      => 'Keep pots evenly watered and use stone-free potting mix. For waxy roots, see <a href="/problems/root-aphids/">root aphids</a>.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Insect-proof mesh or row cover', 'badge' => '', 'note' => 'A cover over the whole pot, sealed at the edges.', 'url' => '' ),
						array( 'name' => 'Nematodes for carrot fly (UK)', 'badge' => '', 'note' => 'Sold in the UK by mail order from biological control suppliers; they also affect other soil insects.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will a tall pot or a raised balcony keep carrot rust fly off?', 'answer' => 'Do not rely on height. Barriers are often recommended because the flies keep low, but RHS research comparing 24 in (60 cm) and 3 ft (90 cm) barriers with a full mesh cover found the complete cover worked better. Cover the pot whatever its height.' ),
						array( 'question' => 'Which other plants does carrot rust fly attack?', 'answer' => 'Parsnips, parsley, celery and celeriac, all relatives of the carrot. Keep potted parsley in fresh potting mix too if carrots in the same spot were damaged.' ),
						array( 'question' => 'Can I store carrots with a few tunnels in them?', 'answer' => 'No. The tunnels let rots in, and the damage shortens how long the roots keep. Peel off damaged areas, eat the sound parts soon and store only clean roots; University of California also advises against leaving carrots in the ground over winter.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Carrot fly', 'url' => 'https://www.rhs.org.uk/biodiversity/carrot-rust-fly' ),
						array( 'title' => 'RHS — Testing barrier methods for the protection of carrots from the carrot fly', 'url' => 'https://www.rhs.org.uk/science/plant-health-in-gardens/entomology/rhs-projects-on-plant-pests/carrot-fly-barrier' ),
						array( 'title' => 'RHS — How to grow carrots', 'url' => 'https://www.rhs.org.uk/vegetables/carrots/grow-your-own' ),
						array( 'title' => 'University of California IPM — Carrot rust fly', 'url' => 'https://ipm.ucanr.edu/home-and-landscape/carrot-rust-fly/' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to avoid carrot rust fly damage next time' ) .
					$list(
						array(
							'Fill the pot with fresh peat-free potting mix for every carrot sowing; <a href="/potting-mix-for-containers/">potting mix for containers</a> explains how to reuse old mix for other crops.',
							'Cover, sow and time the crop as set out in <a href="/plants/carrots-in-pots/">carrots in pots</a>.',
							'Grow parsley in its own fresh potting mix, away from last year\'s carrot pots.',
						)
					),
			),
		),
	),
);
