<?php
/**
 * Starter guides, batch 7: pests and plant troubles. Slugs and snails,
 * whitefly, spider mites, powdery mildew and plants running to seed.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), pp. 238–239
 * and 242–243; see design/sources/BACKYARD-HARVEST.md. No pesticide or
 * fungicide is recommended: the RHS advises against them for home
 * gardeners, says no to slug pellets of any kind, and the book's slug
 * pellets and insecticidal soaps are not reused. Timing in the text is
 * given by season, not by month.
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
	'name'   => __( 'Pests and plant troubles', 'natura-core' ),
	'guides' => array(
		'problem' => array(

			'slugs-and-snails' => array(
				'image_prompt' => 'Close-up at dusk of a terracotta trough of young butterhead lettuce on a damp balcony floor, several soft green leaves chewed into ragged holes, a shiny silvery slime trail across the rim of the pot, a brown garden snail with a coiled shell on one leaf, a scooped-out half grapefruit skin lying cut side down beside the trough. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A pot of young lettuce on a wet patio at evening with ragged holes in the leaves, a snail on the pot rim and glistening slime trails on the paving, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Seedlings Vanish Overnight? (Slugs and Snails in Pots)',
				'excerpt'      => 'Ragged holes in soft leaves, seedlings eaten down to stumps and silvery trails in the morning point to slugs and snails, which feed at night. Protect the young and tender plants, pick the culprits off by flashlight on damp evenings, and use traps rather than pellets.',
				'plants'       => array( 'lettuce-in-pots', 'salad-greens-in-pots', 'arugula-in-pots', 'spinach-in-pots', 'bok-choy-in-pots', 'radishes-in-pots' ),
				'parts'        => array( 'leaves', 'stems', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Slugs feeding at night',
							'sign'     => 'Irregular holes chewed in soft leaves, seedlings disappearing, and dried slime trails on the pot, the leaves or the floor',
							'check'    => 'Go out with a flashlight an hour or two after dark, ideally on a mild, damp evening, and look on the leaves, under the rim of the pot and beneath saucers. Only a few kinds of slug eat living plants; the gray field slug (called the netted field slug in the UK) and the brown soil slug are among the usual ones. Clusters of small, round, pearly eggs on the surface of the potting mix belong to slugs or snails.',
							'fix'      => 'Pick them off by hand into a container and move them to a compost heap or a wilder spot, or leave them out for birds. Set traps near the pots and empty them every morning.',
							'recovery' => 'Chewed leaves stay holed, but an established plant soon makes new ones. Seedlings eaten to the base rarely regrow, so sow again or plant out a sturdier young plant.',
						),
						array(
							'cause'    => 'Snails climbing up from walls and paving',
							'sign'     => 'The same damage, often higher up the plant or on pots raised on shelves and railings',
							'check'    => 'Look in their daytime hiding places: behind stacked pots, in wall crevices, under planters and in the gap between a trough and its bracket. Snails can pull back completely into a coiled shell.',
							'fix'      => 'Hand-pick them during the evening search. Snails rarely come into contact with the nematode control sold for slugs, so hand-picking and traps are the methods that work against them.',
							'recovery' => 'Some snails return to their favorite patch after being moved, so keep checking for a few evenings after a clear-out.',
						),
						array(
							'cause'    => 'Evening watering and soft young growth',
							'sign'     => 'Damage that is worst after you water at night, or on plants just set out as tiny seedlings',
							'check'    => 'Wet potting mix and leaves overnight make it easy for slugs and snails to travel and feed. Very young seedlings and soft, lush leaves are what they target first.',
							'fix'      => 'Water early in the morning instead. Raise seedlings in small pots until they are sturdy before planting them out, and cover new transplants with a cloche.',
							'recovery' => 'Older, tougher plants usually outgrow occasional nibbling.',
						),
					),
					'products' => array(
						array( 'name' => 'Headlamp', 'badge' => '', 'note' => 'Leaves both hands free for nighttime searches.', 'url' => '' ),
						array( 'name' => 'Slug trap', 'badge' => '', 'note' => 'Ready-made traps are sold by garden centers and mail-order suppliers. Empty them every morning.', 'url' => '' ),
						array( 'name' => 'Slug nematodes (Phasmarhabditis hermaphrodita)', 'badge' => '', 'note' => 'A biological control watered into moist potting mix between 41 and 68 °F (5–20 °C). It targets slugs only and should be used where there is a real problem. It is sold in the UK and Europe, but Oregon State University Extension notes that it is not registered by the EPA in the United States, so American gardeners cannot buy it.', 'url' => '' ),
						array( 'name' => 'Cloche', 'badge' => '', 'note' => 'Shelters young transplants while they toughen up.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do copper tape and eggshells keep slugs off pots?', 'answer' => 'The evidence is weak. Some studies found copper repels slugs, but an RHS trial in realistic garden conditions saw no drop in slug damage from copper tape, bark mulch, eggshells, sharp grit or wool pellets. Many other barriers have never been tested scientifically. Rely on hand-picking, traps and protecting young plants instead.' ),
						array( 'question' => 'Are slug pellets safe if they are organic?', 'answer' => 'The RHS advises against slug pellets of every kind, organic ones included, because they harm garden wildlife. Natura never recommends metaldehyde pellets, which are no longer allowed in the UK.' ),
						array( 'question' => 'How do I make a beer trap for a balcony pot?', 'answer' => 'Push a small jar into the potting mix near the plants you want to protect, with the rim just above the surface, and part-fill it with beer. Half an orange, grapefruit or melon skin, scooped out and laid cut side down, works as a hiding trap too. Check and empty both every morning.' ),
						array( 'question' => 'Should I try to get rid of every slug?', 'answer' => 'No. Most slugs and snails feed on dead leaves and help break down waste, and they feed birds, frogs, toads, ground beetles and, in the UK, hedgehogs. Protect the plants that are most at risk, such as seedlings and salads, and accept a little damage elsewhere.' ),
						array( 'question' => 'When should I use slug nematodes?', 'answer' => 'Where they are sold, as in the UK, use them from spring to early fall, when the potting mix is moist and between 41 and 68 °F (5–20 °C). Water them in during the evening. They affect all slugs, including harmless ones, so use them only around vulnerable crops. They are not registered for sale in the United States.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Slugs and snails', 'url' => 'https://www.rhs.org.uk/biodiversity/slugs-and-snails' ),
						array( 'title' => 'RHS — How to grow lettuces', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — Successional sowing', 'url' => 'https://www.rhs.org.uk/vegetables/successional-sowing' ),
						array( 'title' => 'Oregon State University Extension — OSU researchers discover nematode that could help control invasive slugs', 'url' => 'https://extension.oregonstate.edu/news/osu-researchers-discover-nematode-could-help-control-invasive-slugs' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep slugs and snails off your pots' ) .
					$list(
						array(
							'On mild, damp evenings, search the pots with a flashlight and collect what you find.',
							'Water in the morning so the surface of the potting mix is drier by nightfall.',
							'Grow seedlings on in small pots until they are sturdy, then plant them out under a cloche.',
							'Clear out hiding places close to the pots, such as stacked empty containers and old saucers.',
							'Set a beer trap or a half citrus skin beside the most tempting crops and empty it each morning.',
							'Skip slug pellets entirely, and never use metaldehyde.',
						)
					),
			),

			'whiteflies' => array(
				'image_prompt' => 'Close-up of the underside of a tomato leaf, compound and serrated, on a plant in a large pot in a sunny sunroom, dozens of tiny white-winged insects resting on it and a few flying off, flat pale oval scale-like nymphs on the leaf surface, a glossy sticky sheen and patches of black sooty mold on a leaf below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A potted tomato plant by a bright window with a small cloud of white flies lifting off a leaf that has been brushed, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Tiny White Flies on My Tomato and Pepper Plants?',
				'excerpt'      => 'If a cloud of tiny white insects flies up when you brush a tomato, pepper or cucumber leaf, the plant has greenhouse whitefly (called glasshouse whitefly in the UK), a sap feeder that thrives in warmth indoors and under cover. Check new plants before bringing them in, give good ventilation, and use the parasitic wasp Encarsia formosa early in the season.',
				'plants'       => array( 'cherry-tomato', 'bell-peppers-in-pots', 'chili-peppers-in-pots', 'cucumbers-in-pots', 'kale-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Greenhouse whitefly',
							'sign'     => 'White-winged insects about 1/16 in (1.5 mm) long that rise in a cloud when the plant is disturbed; sticky leaves; black sooty mold',
							'check'    => 'Turn the leaves over. Besides the adults, you may see flat, oval, creamy white scales stuck to the underside: these are the young stages. Black scales have been killed by a parasitic wasp. White specks on the upper surface are more likely to be the cast skins of aphids.',
							'fix'      => 'In a sunroom, greenhouse or porch, introduce the parasitic wasp Encarsia formosa, sold by mail order, before the plants are badly affected: it cannot give instant results. Ventilate well to slow sooty mold. If the plant is one that tolerates outdoor conditions in summer, moving it outside lets natural predators and cooler weather slow the whitefly down.',
							'recovery' => 'Plants pick up once numbers fall; the wasp\'s progress is easy to follow because the young whitefly it attacks turn black.',
						),
						array(
							'cause'    => 'Whitefly brought in on new plants',
							'sign'     => 'An attack that starts soon after you bought a plant or brought one indoors',
							'check'    => 'Whitefly often arrives on new plants. Look under the leaves before you buy, and again before you put a plant next to your others.',
							'fix'      => 'Keep new plants apart for a while so any eggs and young can hatch and be seen. Remove plants you no longer want, as fewer host plants means fewer whitefly.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Cabbage whitefly on kale',
							'sign'     => 'The same small white flies, but on kale or another cabbage-family plant outdoors, mostly on the outer leaves',
							'check'    => 'This is a different species that feeds only on brassicas and is present all year. Greenhouse whitefly does not feed on brassicas outdoors.',
							'fix'      => 'Usually tolerate it, as it seldom harms the parts you eat. On kale, where the young leaves are picked, remove the worst outer leaves and encourage ladybugs and ground beetles. Native parasitic wasps often keep it at low levels; the Encarsia formosa sold for greenhouses does not attack it.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Encarsia formosa parasitic wasps', 'badge' => '', 'note' => 'A biological control for greenhouse whitefly under cover. Order it before numbers build up.', 'url' => '' ),
						array( 'name' => 'Yellow sticky sheets', 'badge' => '', 'note' => 'For monitoring under cover only: they show whether whitefly is present but do not control it, and they also catch helpful insects. The RHS does not recommend them outdoors.', 'url' => '' ),
						array( 'name' => 'Hand lens', 'badge' => '', 'note' => 'Helps you tell whitefly scales from aphid skins.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is whitefly a problem on tomatoes grown outdoors?', 'answer' => 'Not usually. Greenhouse whitefly likes warmth, so it is mainly found indoors, in greenhouses and sunrooms. Outdoor plants can be affected in warm summers, and the insect does not normally survive a UK winter outside.' ),
						array( 'question' => 'Can I squash whitefly like aphids?', 'answer' => 'Not easily. The RHS notes that whitefly adults are hard to remove by hand because they fly off as soon as the leaf moves. Under cover, a parasitic wasp introduced early is the established control.' ),
						array( 'question' => 'Why does whitefly get out of hand so fast indoors?', 'answer' => 'It breeds without mating, each female can lay more than 200 eggs, and in warmth the life cycle is short: about three weeks at 70 °F (21 °C), against several months at 50 °F (10 °C). In a heated room it can keep going all winter.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Glasshouse whitefly', 'url' => 'https://www.rhs.org.uk/biodiversity/glasshouse-whitefly' ),
						array( 'title' => 'RHS — Cabbage whitefly', 'url' => 'https://www.rhs.org.uk/biodiversity/cabbage-whitefly' ),
						array( 'title' => 'RHS — Indoor plants: sap-feeding insects', 'url' => 'https://www.rhs.org.uk/biodiversity/indoor-plants-sap-feeding-insects' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent whitefly' ) .
					$list(
						array(
							'Inspect the undersides of leaves on every new plant, and keep it apart from the others for a while.',
							'Open windows or vents on warm days: moving air slows sooty mold.',
							'Order Encarsia formosa early if your tomatoes, peppers or cucumbers live under cover.',
							'Clear out dead leaves and plant debris, which can shelter sap feeders.',
							'Do not mistake cabbage whitefly on kale for a disaster: it rarely harms the crop. For green or black clusters on shoot tips, see the <a href="/problems/aphids-container-plants/">aphids guide</a>.',
						)
					),
			),

			'spider-mites' => array(
				'image_prompt' => 'Close-up of an eggplant plant in a large black pot by a sunny sunroom window, its broad soft leaves finely speckled with pale dots and turning dull and bronzed, fine silk webbing strung between a leaf and the stem, tiny yellowish-green mites visible on the webbing. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A cucumber leaf in a pot on a hot balcony, its surface mottled with countless pale specks, a thin veil of webbing at the leaf edge, photographed vertically against a soft blurred background. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Leaves Covered in Tiny Pale Speckles and Fine Webbing?',
				'excerpt'      => 'A fine pale mottling across the upper side of the leaves, sometimes with silk webbing, is the work of the two-spotted spider mite (glasshouse red spider mite in the UK), a tiny sap feeder that loves hot, dry air. Raise the humidity around the plant, clear away hiding places in winter, and use a predatory mite if numbers build up.',
				'plants'       => array( 'cherry-tomato', 'cucumbers-in-pots', 'eggplant-in-pots', 'bell-peppers-in-pots', 'chili-peppers-in-pots', 'peach-tree-in-pot', 'grapevine-in-pot', 'lemon-tree-in-pot' ),
				'parts'        => array( 'leaves', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Two-spotted spider mite (glasshouse red spider mite)',
							'sign'     => 'Fine pale speckling on the upper leaf surface; leaves that lose their green, dry up and drop early; fine webbing in bad attacks',
							'check'    => 'Look at the underside of a mottled leaf with a ×10 hand lens. The mites are under 1/25 in (1 mm) long and, despite the UK name, yellowish-green with two dark patches; they turn orange-red only in fall and winter. You will also see white cast skins and round eggs. In the UK, the mite is active from early spring to mid-fall.',
							'fix'      => 'Spray the plants with water regularly and keep the air around them humid; this lowers the risk but will not clear the mites by itself. For a real outbreak, buy the predatory mite Phytoseiulus persimilis, which eats every stage of the pest and can also work on outdoor plants in summer. Release it in sheltered spots on the infested plants.',
							'recovery' => 'Leaves that have lost their color do not turn green again, but new growth is clean once the mites are under control. A plant that is badly damaged can die, so act early.',
						),
						array(
							'cause'    => 'Hot, dry, crowded conditions',
							'sign'     => 'Damage that spreads fast in a heatwave, a sunny conservatory or a group of pots packed tightly together',
							'check'    => 'Warm, dry air lets the mites breed quickly: at 70 °F (21 °C) one generation takes about 12 days, against about 55 days at 50 °F (10 °C). Outdoors, the mite can become a problem on balconies in hot, dry summers.',
							'fix'      => 'Space the pots out, ventilate, and keep the potting mix from drying out in hot spells. Move the worst-affected plant away from healthy ones.',
							'recovery' => 'Plants that are not badly weakened pick up when conditions are cooler and more humid.',
						),
						array(
							'cause'    => 'Mites that survived the winter',
							'sign'     => 'Mottling appears again in spring on the same plants or in the same spot',
							'check'    => 'Mature females shelter over winter in cracks, canes, stakes, plant ties, potting mix and dead leaves, then come out in early spring to feed and lay eggs.',
							'fix'      => 'Before spring, throw away old ties, clean canes and stakes, and sweep up plant debris around the pots. In late summer, remove plants that are heavily infested before the mites go into hiding.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Phytoseiulus persimilis predatory mites', 'badge' => '', 'note' => 'The most widely used biological control for red spider mite, sold by mail order.', 'url' => '' ),
						array( 'name' => '×10 hand lens', 'badge' => '', 'note' => 'The mites are too small to identify easily without one.', 'url' => '' ),
						array( 'name' => 'Hand mister', 'badge' => '', 'note' => 'For spraying leaves with water to raise humidity.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Why is it called red spider mite if the mites look green?', 'answer' => 'Red spider mite is the UK name. For most of the year the mites are yellowish-green with two darker spots, which is why they are called two-spotted spider mites. They only turn orange-red in fall and winter, or when the plant they are on is too damaged to feed them.' ),
						array( 'question' => 'Will misting alone get rid of spider mites?', 'answer' => 'No. Regular spraying with water and humid air make conditions less comfortable for the mites and reduce the risk, but they do not control an established population. Combine them with a predatory mite.' ),
						array( 'question' => 'How do I tell the pest from the predatory mite I released?', 'answer' => 'With a hand lens. Phytoseiulus is orange-red, pear-shaped and moves quickly, often tapping the leaf with its front legs. The pest is slower, more rectangular and, in summer, yellowish-green with two dark marks.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Glasshouse red spider mite', 'url' => 'https://www.rhs.org.uk/biodiversity/glasshouse-red-spider-mite' ),
						array( 'title' => 'RHS — Indoor plants: sap-feeding insects', 'url' => 'https://www.rhs.org.uk/biodiversity/indoor-plants-sap-feeding-insects' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent spider mites' ) .
					$list(
						array(
							'From early spring, turn a few leaves over each week and check with a hand lens.',
							'In hot weather, mist the leaves and leave some space between pots.',
							'Do not let pots dry out in a heatwave, when the mites multiply fastest.',
							'At the end of the season, clean canes and stakes and throw away old ties and dead leaves.',
							'Order predatory mites as soon as you spot the first mottled leaves.',
						)
					),
			),

			'powdery-mildew' => array(
				'image_prompt' => 'Close-up of a zucchini plant in a large round pot on a sunny patio against a brick wall, its big lobed leaves covered in spreading white, dusty-looking patches of powdery mildew, a young green zucchini and a yellow flower below the leaves still healthy. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A pot of pea plants climbing a bamboo-cane tepee on a balcony, several leaves dusted with a white powdery coating next to clean green ones, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Zucchini and Pea Leaves Look Dusted With Flour? (Powdery Mildew)',
				'excerpt'      => 'A white, dusty coating that spreads over leaves, stems and sometimes fruit is powdery mildew, a fungal disease that weakens plants and is worst on dry roots in still, humid air. Keep pots evenly watered, give plants space and air, and cut off infected growth early.',
				'plants'       => array( 'zucchini-in-pots', 'cucumbers-in-pots', 'peas-in-pots', 'gooseberries-in-pots', 'currants-in-pots', 'grapevine-in-pot', 'apple-tree-in-pot' ),
				'parts'        => array( 'leaves', 'stems', 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Pots drying out between waterings',
							'sign'     => 'White powdery patches, mostly on the upper side of the leaves, appearing in summer after dry spells',
							'check'    => 'Plants that go through repeated, on-and-off drought stress are more likely to be infected. Potting mix in pots dries much faster than soil in the ground, so check it daily in warm weather.',
							'fix'      => 'Water regularly so the potting mix never dries right out; a mulch on the surface helps hold moisture. Pick off or cut out infected leaves and shoots as soon as you see them.',
							'recovery' => 'Leaves that are badly covered stay marked and may die back. With steady watering, new growth is often much cleaner.',
						),
						array(
							'cause'    => 'Still, humid air',
							'sign'     => 'Mildew worst on plants pushed against a wall, fence or balcony screen, or packed closely together',
							'check'    => 'The spores need humid but not wet conditions, so stagnant air in a sheltered corner suits them. Climbers trained against walls are often heavily affected.',
							'fix'      => 'Move pots away from walls where you can, leave gaps between them, and prune to keep plants open. Choose a sunny spot for susceptible crops.',
							'recovery' => 'Better air movement slows the spread to new leaves.',
						),
						array(
							'cause'    => 'Soft, overfed growth',
							'sign'     => 'Mildew on lush, fast-growing shoot tips and young leaves, which may be curled or distorted',
							'check'    => 'Too much fertilizer, especially nitrogen, produces sappy growth that powdery mildew attacks easily.',
							'fix'      => 'Feed at the normal rate for the crop and do not add extra nitrogen.',
							'recovery' => 'Growth that comes after you cut back on feeding is firmer and less prone.',
						),
					),
					'products' => array(
						array( 'name' => 'Mildew-resistant seed', 'badge' => '', 'note' => 'Seed catalogs mark varieties of zucchini, cucumber and other crops with resistance to powdery mildew.', 'url' => '' ),
						array( 'name' => 'Clean pruners', 'badge' => '', 'note' => 'For cutting out infected shoots promptly.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will powdery mildew spread from my zucchini to my apple tree?', 'answer' => 'Unlikely. Most powdery mildews attack only a small group of related plants; the one on peas, for example, is a different species from the one on apples. It can still pass between plants of the same group, such as zucchini and cucumbers.' ),
						array( 'question' => 'Should I spray a fungicide or a homemade remedy?', 'answer' => 'The RHS recommends not using fungicides, organic ones included, because they can harm wildlife and soil health, and it does not recommend homemade sprays, which are unregulated and untested. Good watering, spacing and hygiene come first.' ),
						array( 'question' => 'Is it better to water over the leaves or at the base?', 'answer' => 'Watering at the base is the safe routine for pots. Powdery mildew dislikes direct water, so the RHS notes that overhead watering in mid-morning during dry weather can reduce it, but avoid wetting leaves early in the morning or in the evening, as long-wet leaves favour other diseases.' ),
						array( 'question' => 'What should I do with infected leaves in fall?', 'answer' => 'Collect and destroy fallen infected leaves rather than leaving them on or around the pot. Some powdery mildews survive winter on fallen leaves and release spores the next spring.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Powdery mildews', 'url' => 'https://www.rhs.org.uk/disease/powdery-mildews' ),
						array( 'title' => 'RHS — Gooseberry mildew', 'url' => 'https://www.rhs.org.uk/disease/gooseberry-mildew' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent powdery mildew' ) .
					$list(
						array(
							'Keep the potting mix evenly moist through summer (see <a href="/plant-care/how-often-to-water-container-plants/">how often to water pots</a>).',
							'Stand susceptible crops in full sun, with space around each pot.',
							'Avoid tucking zucchini, peas and gooseberries into a still corner against a wall.',
							'Go easy on high-nitrogen feeds (feeding routine: <a href="/plant-care/how-to-fertilize-container-plants/">how to feed container plants</a>).',
							'Cut out the first infected leaves straight away, and clear up fallen ones in fall.',
							'Pick mildew-resistant varieties when you buy seed.',
						)
					) .
					$p( 'On gooseberries, and sometimes late in the season on blackcurrants, the white coating is usually American gooseberry mildew. It spends the winter in the buds and shoot tips, and on fallen blackcurrant leaves, so snip off affected tips as soon as you see them and clear the leaves in fall. Prune the bush to an open shape so air moves through it, and choose a resistant variety; the <a href="/plants/gooseberries-in-pots/">gooseberry guide</a> names some.' ),
			),

			'plants-bolting' => array(
				'image_prompt' => 'A rectangular trough on a sunny balcony with three lettuces that have bolted, each sending up a tall, narrow central stem crowded with small pointed leaves and topped with tight flower buds, the lower leaves loose and starting to yellow, a pot of cilantro behind with feathery leaves and small white flower umbels. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A single lettuce in a pot that has shot up into a tall flowering stem next to a young leafy lettuce in a second pot, photographed vertically on a balcony. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Has My Lettuce Suddenly Shot Up and Started to Flower?',
				'excerpt'      => 'A leafy crop that suddenly grows a tall stem and flowers has bolted, or run to seed, usually because of dry potting mix, heat, a cold spell or longer days. You cannot reverse it, but sowing at the right time, steady watering, light summer shade and bolt-resistant varieties keep it at bay.',
				'plants'       => array( 'lettuce-in-pots', 'spinach-in-pots', 'cilantro-in-pots', 'salad-greens-in-pots', 'arugula-in-pots', 'bok-choy-in-pots', 'beets-in-pots', 'swiss-chard-in-pots', 'dill-in-pots' ),
				'parts'        => array( 'whole-plant', 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Dry potting mix',
							'sign'     => 'Plants bolt during a hot, dry spell, often after wilting once or twice',
							'check'    => 'Dryness encourages bolting, especially in arugula and spinach, and containers dry out faster than beds. Lettuce leaves also turn bitter.',
							'fix'      => 'Water steadily so the potting mix stays moist, and move summer pots into light shade.',
							'recovery' => 'A plant that has started to bolt will not go back to leafy growth. Pick what is still usable straight away and sow again.',
						),
						array(
							'cause'    => 'Longer days in late spring and summer',
							'sign'     => 'Spring-sown lettuce and spinach run to seed as midsummer approaches, even when well watered',
							'check'    => 'Lettuce, spinach and some radishes are long-day plants: lengthening days tell them to flower. For a spring-sown annual this is natural, but stress makes it happen early.',
							'fix'      => 'Sow small batches often so younger plants replace those that bolt, and choose varieties described as slow to bolt for summer sowings.',
							'recovery' => '',
						),
						array(
							'cause'    => 'A cold spell or early sowing',
							'sign'     => 'Beets, onions, leeks or chard flower in their first season, after a cold start',
							'check'    => 'These crops normally flower in their second year. A long cold spell early on, often while they are still young, can trigger flowering in the first year, although you only see it as the plant nears maturity.',
							'fix'      => 'Wait for steadier weather before sowing, raise early plants under cover, or cover early sowings with row cover or a cloche. For early beets, use a bolt-resistant variety such as \'Boltardy\'.',
							'recovery' => 'On chard, cutting off the flower stems keeps leaves coming for a little longer before the plant is spent.',
						),
						array(
							'cause'    => 'Root disturbance and overcrowding',
							'sign'     => 'Transplanted spinach, or a crowded pot of arugula, bolts soon after',
							'check'    => 'Moving spinach can stress it into bolting, and overcrowded arugula flowers sooner.',
							'fix'      => 'Sow spinach straight into its final pot, and thin arugula so each plant has room.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Warm nights for Asian greens',
							'sign'     => 'Bok choy and other Asian greens sown in early summer flower before they are ready',
							'check'    => 'Several of these crops bolt once nights stay above about 50–55 °F (10–13 °C).',
							'fix'      => 'Sow Asian greens from midsummer onward, or in spring with protection from cold snaps.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Bolt-resistant seed', 'badge' => '', 'note' => 'Look for "slow to bolt" or "bolt-resistant" on the packet, especially for early or summer sowings.', 'url' => '' ),
						array( 'name' => 'Shade cloth', 'badge' => '', 'note' => 'Light shade over summer salads helps keep them cooler.', 'url' => '' ),
						array( 'name' => 'Row cover (frost cloth)', 'badge' => '', 'note' => 'Protects early sowings from cold spells.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I still eat a plant that has bolted?', 'answer' => 'Often, but the leaves of lettuce and other salads turn bitter once flowering starts. Cilantro and arugula flowers are edible, and the seed of cilantro, sold as coriander, can be harvested once it forms. Root crops such as beets stop swelling.' ),
						array( 'question' => 'Can I cut the flower stem off to stop bolting?', 'answer' => 'It buys a little time on some crops: on chard and cilantro, removing flower stems as they appear prolongs leaf picking for a while, and leeks should have the stalk removed before they turn tough. It does not reverse bolting, and the plant will try to flower again.' ),
						array( 'question' => 'Why do my plants bolt even though I water them?', 'answer' => 'Water is only one trigger. Longer days, cold spells while the plants were young, warm nights for Asian greens, transplanting and crowding can all set off flowering. Bolting starts inside the plant well before you see the stem.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Bolting', 'url' => 'https://www.rhs.org.uk/vegetables/bolting' ),
						array( 'title' => 'RHS — How to grow lettuces', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — How to grow spinach', 'url' => 'https://www.rhs.org.uk/vegetables/spinach/grow-your-own' ),
						array( 'title' => 'RHS — How to grow coriander', 'url' => 'https://www.rhs.org.uk/herbs/coriander/grow-your-own' ),
						array( 'title' => 'RHS — How to grow rocket', 'url' => 'https://www.rhs.org.uk/vegetables/rocket/grow-your-own' ),
						array( 'title' => 'RHS — Successional sowing', 'url' => 'https://www.rhs.org.uk/vegetables/successional-sowing' ),
					),
				),
				'content'      =>
					$h2( 'How to stop crops running to seed' ) .
					$list(
						array(
							'Sow little and often so a fresh batch is always coming on: see <a href="/plant-care/succession-planting-small-spaces/">succession planting in small spaces</a>.',
							'Keep summer pots of leaves moist and in light shade (watering routine: <a href="/plant-care/how-often-to-water-container-plants/">how often to water pots</a>).',
							'Choose varieties sold as slow to bolt for early and midsummer sowings.',
							'Sow spinach where it will grow, and thin crowded seedlings.',
							'Wait until midsummer to sow bok choy and other Asian greens, or sow them in spring under row cover.',
						)
					) .
					$h2( 'Crop-by-crop advice' ) .
					$p( 'Each growing guide explains the best sowing times and varieties for that crop: <a href="/plants/lettuce-in-pots/">lettuce</a>, <a href="/plants/spinach-in-pots/">spinach</a>, <a href="/plants/cilantro-in-pots/">cilantro</a>, <a href="/plants/salad-greens-in-pots/">cut-and-come-again salad greens</a>, <a href="/plants/arugula-in-pots/">arugula</a> and <a href="/plants/bok-choy-in-pots/">bok choy</a>.' ),
			),
		),
	),
);
