<?php
/**
 * Starter guides, batch 19: hidden pests, moulds and hungry plants. Four
 * sap or root feeders (mealybugs, root aphids, vine weevil, scale insects),
 * grey mould, leaf scorch, and three questions about feeding problems:
 * yellow between the veins, pale stunted plants, and few flowers or fruit.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), pp. 237–245;
 * see design/sources/BACKYARD-HARVEST.md. The book's named treatments are
 * not reused. Biological controls are the ones the RHS lists for home
 * gardeners; the RHS lists no fungicide for grey mould. The general
 * yellow-leaves guide, the flower-drop guide and the feeding routine stay
 * on their own pages and are linked, not repeated. Months are for a
 * temperate climate such as the UK.
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
	'name'   => __( 'Hidden pests, moulds and hungry plants', 'natura-core' ),
	'guides' => array(
		'problem' => array(

			'mealybugs' => array(
				'image_prompt' => 'Close-up of a lemon tree branch with glossy, oval, dark green leaves, growing in a 35 cm terracotta pot on a bright conservatory windowsill in winter, small tufts of white cotton-like wax tucked into the joints where leaf stalks meet the stem, a few soft oval whitish insects visible, a faint sticky shine and a little black sooty mould on a leaf below. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A potted lemon tree on a bright windowsill indoors, photographed vertically, with a close view of one stem where white fluffy wax clusters sit in the leaf joints and a lower leaf looks shiny and speckled black. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is the White Fluffy Stuff on My Lemon Tree? (Mealybugs)',
				'excerpt'      => 'Tufts of white, cotton-like wax in the leaf joints, with sticky or blackened leaves below, mean mealybugs: soft, sap-sucking insects of plants kept indoors or under glass. Keep the plant apart from others, remove what you can reach and clear away dead leaves; a badly infested plant is often easier to replace.',
				'plants'       => array( 'lemon-tree-in-pot', 'grapevine-in-pot', 'peach-tree-in-pot', 'cherry-tomato' ),
				'parts'        => array( 'leaves', 'stems', 'roots-compost' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Glasshouse mealybugs on shoots and leaves',
							'sign'     => 'White waxy fluff in leaf joints, leaf sheaths, between twining stems or under loose bark; flat, oval insects up to 4 mm long underneath',
							'check'    => 'Lift the wax gently with a cocktail stick. The insects, which can be pinkish but look white under their powdery coat, or their orange-pink eggs, will be beneath it. In the UK these mealybugs live almost only on houseplants and plants under glass, including citrus, grapevines, peaches and tomatoes, and they breed all year in warm rooms.',
							'fix'      => 'Remove the clusters you can get at, and pick up dead leaves and prunings, which can carry insects or eggs. The RHS points out that hand removal is hard because mealybugs hide in tight crevices, so check the plant every week or two and repeat.',
							'recovery' => 'Plants tolerate a few mealybugs. Large colonies weaken the plant, slow its growth and can make leaves fall early, so act before numbers build up.',
						),
						array(
							'cause'    => 'Honeydew and sooty mould from the colony',
							'sign'     => 'Leaves and stems sticky to the touch, later dusted with a black, powdery film',
							'check'    => 'Mealybugs pass excess sugar out as honeydew, and sooty moulds grow on it. Scale insects, aphids and whitefly cause the same stickiness, so look for the white wax in the leaf joints before deciding it is mealybug.',
							'fix'      => 'Tackle the insects. The black film is a sign of them, not a separate disease. Good ventilation also helps check sooty moulds.',
							'recovery' => 'New leaves stay clean once the colony is under control.',
						),
						array(
							'cause'    => 'Root mealybugs',
							'sign'     => 'A plant that grows poorly for no clear reason, with white waxy patches among the roots when you tip it out',
							'check'    => 'Several root mealybug species feed on the roots of house and greenhouse plants. The golden root mealybug is yellow and, unlike the others, survives outdoors on roots all year. White wax on roots can also be root aphids.',
							'fix'      => 'Compare with the signs of root aphids. Where the roots are heavily colonised, the RHS says it can be simpler to dispose of the plant than try to clear it.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Brought in on a new plant',
							'sign'     => 'Mealybugs first appear on a plant you bought recently, or on its neighbours',
							'check'    => 'Female mealybugs cannot fly and do not crawl far, so they nearly always arrive on another plant.',
							'fix'      => 'Look over new plants carefully, especially in the leaf joints, and keep them apart from your other plants for at least a month before they join the collection.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Hand lens', 'badge' => '', 'note' => 'Shows the insects and their pink eggs under the wax.', 'url' => '' ),
						array( 'name' => 'Cryptolaemus ladybird (biological control)', 'badge' => '', 'note' => 'For a greenhouse or conservatory from May to September, when it is warm enough for the ladybird to work.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Will standing my lemon tree outside in summer help with mealybugs?', 'answer' => 'It can. The RHS suggests moving plants that cope with UK outdoor conditions outside, where predators can reach the insects and cooler weather slows their breeding. Citrus is stood outside in summer anyway; bring it back in before nights get cold.' ),
						array( 'question' => 'Why do some of the mealybugs on my plant look bigger and move faster?', 'answer' => 'If a biological control has been used, they may be larvae of the Cryptolaemus ladybird, which look like large mealybugs. Leave them: both the larvae and the adult beetles eat mealybugs and their eggs.' ),
						array( 'question' => 'Is there a spray for mealybugs on indoor plants?', 'answer' => 'The RHS advises starting with hand removal, hygiene and biological controls. Indoors, if you still need a spray, it suggests short-lived products such as plant oils or natural pyrethrum, applied thoroughly and used as the label allows for the plant. The waxy coat makes mealybugs hard to reach, and it may not be possible to clear them completely.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Glasshouse mealybugs', 'url' => 'https://www.rhs.org.uk/biodiversity/mealybug' ),
						array( 'title' => 'RHS — Indoor plants: sap-feeding insects', 'url' => 'https://www.rhs.org.uk/biodiversity/indoor-plants-sap-feeding-insects' ),
						array( 'title' => 'RHS — Citrus problems', 'url' => 'https://www.rhs.org.uk/problems/citrus' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep mealybugs out' ) .
					$list(
						array(
							'Check the leaf joints of every new plant before it goes next to your others, and keep it apart for a month.',
							'Look over a <a href="/plants/lemon-tree-in-pot/">lemon tree in a pot</a> regularly while it is indoors for winter, when it is out of reach of predators.',
							'Clear dead leaves and prunings from pots, saucers and windowsills.',
							'Sticky leaves with brown bumps rather than white wax point to <a href="/problems/scale-insects/">scale insects</a>; clusters of soft green or black insects on shoot tips are more likely <a href="/problems/aphids-container-plants/">aphids</a>.',
						)
					),
			),

			'root-aphids' => array(
				'image_prompt' => 'A loose-leaf lettuce lifted out of a 25 cm plastic pot on a balcony table in late summer, its root ball turned on its side to show fine white roots dusted with a greyish-white waxy powder and tiny pale yellow aphids, the lettuce leaves slightly limp, a second healthy lettuce in a pot behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A wilting lettuce in a pot on a sunny balcony next to its root ball held in a trowel, the roots coated in white wax with tiny pale aphids, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Do My Lettuces Wilt When the Compost Is Still Moist? (Root Aphids)',
				'excerpt'      => 'Lettuces, beans or carrots that flag in warm weather, stop growing or lose colour although the compost is damp may have root aphids: tiny yellowish, greenish or brown aphids, often under white wax, feeding on the roots. Tip the plant out to look, wash off the old compost and repot, and keep the plant well watered and fed.',
				'plants'       => array( 'lettuce-in-pots', 'salad-leaves-in-pots', 'french-beans-in-pots', 'runner-beans-in-pots', 'carrots-in-pots' ),
				'parts'        => array( 'roots-compost', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Lettuce root aphid',
							'sign'     => 'Lettuces wilt on warm days, grow slowly and turn an unhealthy colour, then lose leaves early',
							'check'    => 'Ease the plant out of its pot. Pale yellow or whitish aphids, 2–3 mm long, with a greyish wax among the roots, are lettuce root aphids. Winged ones fly in from poplar trees in midsummer, numbers are highest in August, and some stay in the soil over winter.',
							'fix'      => 'Shake and rinse the old compost off the roots and replant in fresh peat-free compost. The RHS warns that a few aphids may survive unnoticed, so keep watching the plant. Water and feed it well to reduce the stress on the roots.',
							'recovery' => 'Large colonies do the most harm to young plants, so check those first.',
						),
						array(
							'cause'    => 'Bean root aphid',
							'sign'     => 'French or runner beans that lack vigour, sometimes with ants busy at the base of the plant',
							'check'    => 'These aphids are small (about 1.6–2.7 mm), round, hairy and a dirty yellowish white, dusted with wax. Ants often tend them for their honeydew.',
							'fix'      => 'Good care usually eases the symptoms: keep the compost evenly moist and feed regularly. Check the roots of young plants before you plant them out.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Carrot root aphid and cabbage root aphid',
							'sign'     => 'Weak carrots, or brassicas that wilt; dense colonies wrapped in white woolly wax on the roots',
							'check'    => 'Carrot root aphids move from poplar to carrot roots in summer and return to the trees in autumn. A related species feeds on the roots of the cabbage family.',
							'fix'      => 'Remove the worst plants with as much of the infested root as you can and bury it or add it to a compost heap. Do not sow the same crop in that compost for a year.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Dry compost, or root mealybugs',
							'sign'     => 'The same wilting and stunting, but no aphids on the roots',
							'check'    => 'Drought can cause the same symptoms, so always look at the roots before blaming aphids. White wax on roots can also be root mealybugs, which are found mainly on house and greenhouse plants.',
							'fix'      => 'If the root ball is dry, soak it and water more often. For white wax with no aphids, see the mealybug guide.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Insect-proof mesh', 'badge' => '', 'note' => 'Covering pots from May to August stops winged root aphids landing.', 'url' => '' ),
						array( 'name' => 'Lettuce seed of a tolerant variety', 'badge' => '', 'note' => 'Some lettuces are advertised as tolerant of root aphid.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Which lettuces are less troubled by root aphid?', 'answer' => 'The RHS mentions several cultivars sold as tolerant of root aphid: Debby, Lakeland, Beatrice, Avon Defiance, Avon Crisp and Salad Bowl.' ),
						array( 'question' => 'Why are there ants in my bean pot?', 'answer' => 'They may be tending root aphids. Ants feed on the aphids\' honeydew, guard their eggs and can even carry the aphids through the soil from one plant to another.' ),
						array( 'question' => 'Can I grow lettuce again in compost that had root aphids?', 'answer' => 'Not straight away. The RHS recommends leaving a year before growing susceptible plants in the same soil, and some lettuce root aphids stay in the soil over winter. Start the next sowing in fresh compost.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Root aphids', 'url' => 'https://www.rhs.org.uk/biodiversity/root-aphids' ),
						array( 'title' => 'RHS — Glasshouse mealybugs', 'url' => 'https://www.rhs.org.uk/biodiversity/mealybug' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep root aphids away from your pots' ) .
					$list(
						array(
							'Slide plug plants and new pot plants out of their containers and look at the roots before planting.',
							'Cover lettuces, salads and carrots with insect-proof mesh from May to August.',
							'Keep pots well watered in summer: stressed roots show the damage sooner. Our <a href="/plant-care/how-often-to-water-container-plants/">watering guide</a> explains how to check.',
							'Use fresh compost for the next lettuce or carrot sowing; <a href="/plant-care/compost-for-containers/">compost for containers</a> covers refreshing old compost.',
							'For aphids on leaves and shoot tips, see <a href="/problems/aphids-container-plants/">aphids on container plants</a>.',
						)
					),
			),

			'grey-mould' => array(
				'image_prompt' => 'Close-up of a strawberry plant with three-lobed toothed leaves growing in a 30 cm terracotta pot on a balcony in a damp, overcast early summer, one ripening red strawberry covered in soft fuzzy grey-brown mould and slightly collapsed, healthy red and white berries hanging beside it. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A strawberry pot on a balcony with one berry rotted under fuzzy grey mould among healthy ripe fruit, photographed vertically with soft overcast light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Is the Fuzzy Grey Mould on My Strawberries? (Grey Mould)',
				'excerpt'      => 'A soft rot covered in fuzzy grey-brown mould on strawberries, lettuce, tomatoes or flowers is grey mould, caused by the fungus Botrytis cinerea, which thrives in damp, still air. No fungicide is approved for gardeners, so remove affected parts carefully, clear away dead material, and give pots space and air.',
				'plants'       => array( 'balcony-strawberry', 'lettuce-in-pots', 'cherry-tomato', 'courgettes-in-pots', 'cucumbers-in-pots', 'french-beans-in-pots', 'raspberries-in-pots', 'grapevine-in-pot' ),
				'parts'        => array( 'flowers-fruit', 'leaves', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Infection that starts at flowering',
							'sign'     => 'Strawberries or grapes that rot soft and brown as they ripen, then grow grey fuzz',
							'check'    => 'The fungus can get into the flowers without any wound and sit inside the young fruit, showing nothing until the fruit ripens and its sugar rises. This is very noticeable on strawberries.',
							'fix'      => 'Remove dead and dying flowers and rotting fruit as soon as you see them. Spores scatter very easily, so slip a bag over the fruit before you pull it off, then bin it.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Damp air, crowding and evening watering',
							'sign'     => 'Grey fuzz on leaves, buds and flowers in cool, humid spells, especially where pots are packed together or under cover',
							'check'    => 'In humid air the infection spreads fast; when the air is drier it may stay as separate spots. Lettuces in cool, humid summers, plants under glass, and dense groups of pots are most at risk.',
							'fix'      => 'Space pots so air moves between them and open greenhouse or cold-frame vents. Water early in the day rather than in the evening, so the leaves are not damp overnight.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Wounds and stressed plants',
							'sign'     => 'Mould starting at a broken stem, a torn leaf or a split fruit',
							'check'    => 'On green parts, the fungus usually needs a wound or a stressed plant to get in, although it can attack healthy plants in very humid weather.',
							'fix'      => 'Cut out damaged growth and keep plants steadily watered and fed so they are not under stress. Pick split tomatoes quickly.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Infected debris left lying around',
							'sign'     => 'Grey mould returns in the same spot; tiny black, seed-like bodies on dead flowers or leaves',
							'check'    => 'Those black bodies (sclerotia) let the fungus survive for a long time before producing new spores. Its airborne spores are always about, and it lives happily on dead plant material.',
							'fix'      => 'Pick dead leaves and fallen fruit off the compost and out of saucers. Throw away plants that have been killed or badly affected.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Small bags', 'badge' => '', 'note' => 'Enclose a mouldy fruit or flower before you remove it so the spores stay inside.', 'url' => '' ),
						array( 'name' => 'Watering can with a long spout', 'badge' => '', 'note' => 'Lets you water the compost in the morning without wetting the fruit and leaves.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is there a fungicide for grey mould?', 'answer' => 'No. The RHS says no fungicides are approved for use against grey mould by gardeners. Hygiene, spacing and ventilation are the controls.' ),
						array( 'question' => 'Why do my strawberries look fine when green but rot as they ripen?', 'answer' => 'Grey mould often infects the flowers and waits inside the developing fruit. It only breaks out as the fruit ripens and becomes sweeter.' ),
						array( 'question' => 'What are the little black specks on my mouldy flowers?', 'answer' => 'Resting bodies of the fungus, called sclerotia. They can lie dormant and later produce new spores, so bin the material rather than leaving it on the pot.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Grey mould', 'url' => 'https://www.rhs.org.uk/disease/grey-mould' ),
						array( 'title' => 'RHS — How to grow lettuce', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent grey mould in pots' ) .
					$list(
						array(
							'Leave gaps between pots and thin crowded plants so air can move.',
							'Water in the morning, onto the compost; the routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>.',
							'Take off fading flowers, damaged leaves and rotting fruit every few days, and bag them as you remove them.',
							'Open vents on greenhouses and cold frames whenever the weather allows.',
							'Pick <a href="/problems/tomatoes-splitting/">split tomatoes</a> before mould gets into the cracks.',
						)
					),
			),

			'vine-weevil' => array(
				'image_prompt' => 'A strawberry plant tipped out of a 25 cm black plastic pot on a patio table in autumn, its root ball broken open to show several plump, creamy-white, legless C-shaped grubs with pale brown heads among chewed roots, the strawberry leaves wilted, a trowel beside it. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Close view of creamy-white C-shaped vine weevil grubs in dark compost beside the roots of a potted strawberry, with the wilted plant above, photographed vertically on a patio. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the White C-Shaped Grubs in My Pots? (Vine Weevil)',
				'excerpt'      => 'Plump, white, legless grubs curled into a C with a light brown head, found among the roots of a plant that wilted and died, are vine weevil larvae, and plants in containers suffer most. Pick out the grubs when you repot, and water a nematode biological control into the compost in late summer.',
				'plants'       => array( 'balcony-strawberry' ),
				'parts'        => array( 'roots-compost', 'leaves', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Vine weevil grubs eating the roots',
							'sign'     => 'A pot plant wilts and collapses between autumn and spring although it has been watered',
							'check'    => 'Tip the plant out. The grubs are up to 10 mm (about 3/8 in) long, creamy white, legless and curved, with pale brown heads, and lie among the roots. They also bore into cyclamen and begonia tubers and the bases of cacti and succulents. Most losses happen from September to March, as the grubs reach full size.',
							'fix'      => 'Repot the plant, picking out as many grubs as you can find from the roots and the compost. Then use the nematode control described below.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Adult vine weevils feeding on leaves',
							'sign'     => 'Irregular notches eaten from the leaf edges in summer, especially on strawberries and thick, evergreen leaves',
							'check'    => 'Go out with a torch on a mild spring or summer evening. The adults are dull black beetles about 9 mm (5/16 in) long, pear-shaped from above, with small dirty-yellow flecks. They cannot fly but climb well, and they hide in dark places by day, for example under pots. Every adult is a female that can lay several hundred eggs in spring and summer.',
							'fix'      => 'Pick the adults off by hand at night, or shake plants over a sheet or upturned umbrella. Under glass, sticky barriers round pots trap them.',
							'recovery' => 'Notched leaves look untidy but rarely affect growth. The adults matter because each one can lay several hundred eggs.',
						),
						array(
							'cause'    => 'Something else in the compost',
							'sign'     => 'Small, round, yellowish-brown balls in the compost of a nursery plant',
							'check'    => 'Vine weevil eggs are brown and less than 1 mm across, so they are almost impossible to see. Larger round yellow-brown pellets are usually the controlled-release fertiliser added by the nursery.',
							'fix'      => 'Leave the pellets where they are: they feed the plant.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Vine weevil nematodes (biological control)', 'badge' => '', 'note' => 'Microscopic worms that infect the grubs. Sold in sachets and by mail order; suitable for containers and edible plants.', 'url' => '' ),
						array( 'name' => 'Torch', 'badge' => '', 'note' => 'For finding the adult beetles on mild evenings.', 'url' => '' ),
						array( 'name' => 'Nematode trap for adult weevils', 'badge' => '', 'note' => 'Placed under damaged plants in summer; adults hide inside by day and are infected.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'When should I water in vine weevil nematodes?', 'answer' => 'The RHS suggests August or early September, while the compost is warm and before the grubs are big enough to do serious harm. Steinernema species need a compost temperature of 5–20 °C (41–68 °F) and Heterorhabditis species 12–20 °C (54–68 °F).' ),
						array( 'question' => 'Are vine weevil nematodes safe to use on strawberries?', 'answer' => 'Yes. The RHS says they can be used on all edible and ornamental plants. Because they can infect other small animals, use them only where you have a real problem. They work best in open, light composts and poorly in dry or heavy ones.' ),
						array( 'question' => 'Why are pots worse affected than plants in the ground?', 'answer' => 'The RHS notes that container plants, outdoors or under cover, are the most likely to be badly damaged.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Vine weevil', 'url' => 'https://www.rhs.org.uk/biodiversity/vine-weevil' ),
						array( 'title' => 'RHS — Biological control in the garden', 'url' => 'https://www.rhs.org.uk/prevention-protection/biological-control-garden' ),
					),
				),
				'content'      =>
					$h2( 'How to protect pots from vine weevil' ) .
					$list(
						array(
							'Look for notched leaf edges on strawberries from spring to late summer: they show adults are laying eggs nearby.',
							'Check under pots and in dark corners of the balcony, where the adults rest by day.',
							'Treat pots that have had grubs with nematodes in August or early September.',
							'When you repot or refresh compost, look through the roots for grubs; <a href="/plant-care/compost-for-containers/">compost for containers</a> covers refreshing.',
							'Birds, frogs, toads and ground beetles eat vine weevils, so leave them be.',
						)
					),
			),

			'scale-insects' => array(
				'image_prompt' => 'Close-up of the underside of a glossy, dark green, leathery bay leaf from a clipped bay tree in a 40 cm grey pot on a patio, several flat, oval, pale yellow-brown scale insects about 4 mm long lined along the midrib, the upper surface of a lower leaf sticky and partly coated in black sooty mould. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A bay tree in a pot on a patio, photographed vertically, with one leaf turned over to show flat brown scale insects along the central vein and blackened sticky leaves below. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'What Are the Brown Bumps Under My Bay and Lemon Leaves? (Scale Insects)',
				'excerpt'      => 'Flat or domed brown bumps stuck along the veins and stems, with sticky, blackened leaves, are scale insects: sap feeders hidden under a waxy shell. Healthy plants tolerate a few, so scrape off what you see, let predators help outdoors, and judge success by whether the new growth stays clean.',
				'plants'       => array( 'bay-tree-in-pot', 'lemon-tree-in-pot', 'grapevine-in-pot' ),
				'parts'        => array( 'leaves', 'stems' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Soft scale',
							'sign'     => 'Flat, oval, pale yellow-brown scales up to 4 mm long near the midribs of leaves and on stems; a lot of honeydew',
							'check'    => 'Soft scale is very common on bay and citrus, and also on ivy and ferns. Its waxy cover repels liquids. In warm conditions it breeds all year, so plants indoors or under glass can build up large numbers.',
							'fix'      => 'Remove adult scales by hand when you see them. On a plant kept indoors, the nematode Steinernema feltiae is sold as a biological control for soft scale. The RHS asks for care with it because it can infect other small animals, though indoors that risk is small.',
							'recovery' => 'Light infestations do little harm to a well-tended plant. Consider replacing one that is severely affected.',
						),
						array(
							'cause'    => 'Scales with white egg masses',
							'sign'     => 'White, waxy, fibrous tufts on stems or under leaves in early summer, next to the shells',
							'check'    => 'Cushion scales and some others lay their eggs outside the shell under white wax. It is easily mistaken for mealybug or woolly aphid; look for the brown shells beside it.',
							'fix'      => 'Rub off the egg masses as well as the adults. Newly hatched young crawl over the plant before they settle, so check again a few weeks later.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Outdoor scale species',
							'sign'     => 'Scales on the bark of fruit trees, bushes or the stems of a grapevine',
							'check'    => 'More than 25 species of scale live in British gardens. Most outdoor ones have one generation a year. On a grapevine under glass, the scales can hide under loose outer bark.',
							'fix'      => 'Tolerate light numbers and encourage predators: some ladybirds, parasitoid wasps and birds eat scale insects. On a vine, peel back loose bark to find hidden scales.',
							'recovery' => 'Large populations slow growth, so keep checking the shoots each season.',
						),
					),
					'products' => array(
						array( 'name' => 'Soft cloth or old toothbrush', 'badge' => '', 'note' => 'For scraping scales and egg masses off leaves and stems.', 'url' => '' ),
						array( 'name' => 'Steinernema feltiae nematodes (biological control)', 'badge' => '', 'note' => 'For soft scale, best used on plants indoors.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How can I tell if scale insects are dead?', 'answer' => 'You often cannot by looking: dead scales stay firmly stuck to the plant. The RHS suggests judging any treatment by the new growth. If fresh leaves and shoots stay free of scales, it has worked.' ),
						array( 'question' => 'Will scraping scale off by hand be enough?', 'answer' => 'For a few scales, yes. On a heavily infested plant it may not bring numbers down much, because the young are tiny and easy to miss. Keep checking and removing them.' ),
						array( 'question' => 'Can nematodes control scale on a lemon tree indoors?', 'answer' => 'They can help against soft scale, the common species on citrus and bay. The RHS lists the nematode Steinernema feltiae for it and notes that indoors the risk to other insects is small.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Scale insects', 'url' => 'https://www.rhs.org.uk/biodiversity/scale-insects' ),
						array( 'title' => 'RHS — Soft scale', 'url' => 'https://www.rhs.org.uk/biodiversity/soft-scale' ),
						array( 'title' => 'RHS — Indoor plants: sap-feeding insects', 'url' => 'https://www.rhs.org.uk/biodiversity/indoor-plants-sap-feeding-insects' ),
					),
				),
				'content'      =>
					$h2( 'How to keep scale insects in check' ) .
					$list(
						array(
							'Turn the leaves of a <a href="/plants/bay-tree-in-pot/">bay tree</a> or <a href="/plants/lemon-tree-in-pot/">lemon tree</a> over every few weeks and look along the central vein.',
							'Treat sticky leaves as a warning: something is feeding above them.',
							'Inspect new plants before they join the others; adult scales do not move, so they arrive on bought plants.',
							'Keep plants well watered and fed: healthy plants carry light numbers without harm.',
							'White fluff in leaf joints without shells is more likely <a href="/problems/mealybugs/">mealybugs</a>.',
						)
					),
			),

			'leaf-scorch' => array(
				'image_prompt' => 'A clipped bay tree with leathery, glossy dark green oval leaves in a 40 cm terracotta pot on a high, open balcony in summer, the leaves on the sunny, windward side of the crown dry and brown at the edges and in patches, the leaves on the shaded side still green, a slatted wooden screen at one end of the balcony. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A potted bay tree on a bright windy balcony, photographed vertically, showing crisp brown leaf edges on the exposed side and green leaves on the sheltered side. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Have My Leaves Gone Brown and Crisp After Hot Sun or Wind?',
				'excerpt'      => 'Dry brown patches or edges on the leaves facing the sun or the wind are scorch: the leaves lost water faster than the roots could replace it. Shelter the plant, keep the compost moist, and avoid splashing hairy leaves in bright sun; most plants grow out of it.',
				'plants'       => array( 'bay-tree-in-pot', 'apple-tree-in-pot' ),
				'parts'        => array( 'leaves', 'flowers-fruit' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Hot sun and heatwaves',
							'sign'     => 'Brown patches on the leaves on the sunny side, while lower leaves, inner leaves and the shaded side stay green',
							'check'    => 'Did the damage appear after a hot spell, on a plant that gets sun all day? On apples, the fruit on the most exposed side can also get a reddish-brown, flattened burnt patch.',
							'fix'      => 'Move pots out of the strongest midday sun in a heatwave, and check the compost more often in hot weather.',
							'recovery' => 'Scorched leaves stay brown, but the plant usually grows out of it. Pay extra attention to watering and feeding afterwards.',
						),
						array(
							'cause'    => 'Water droplets on hairy leaves',
							'sign'     => 'Small burnt spots soon after watering in bright sunshine',
							'check'    => 'Research cited by the RHS suggests droplets sitting on hairy leaves can focus sunlight and burn the tissue. Smooth leaves are unlikely to be harmed, because water runs off them.',
							'fix'      => 'Water the compost, not the leaves, and avoid the hottest part of the day.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Strong or cold wind',
							'sign'     => 'Browning on the top and windward side of the plant; torn leaves, and buds, flowers or leaves dropping',
							'check'    => 'Wind dries leaves out. Roof gardens and balconies are often windy and sunny, and a solid wall can cause turbulence on its sheltered side. In winter, cold winds scorch evergreens, leaving dry brown leaves.',
							'fix'      => 'Shelter the plant with a slatted or mesh screen that filters the wind, or a temporary windbreak of wind-reduction netting stretched between canes. Low plants suffer less in exposed spots.',
							'recovery' => 'New leaves come through normally once the plant is sheltered.',
						),
						array(
							'cause'    => 'Roots that cannot keep up',
							'sign'     => 'Scorch even in moderate weather, with compost that is often dry or, the opposite, waterlogged',
							'check'    => 'Scorch happens whenever water leaves the leaves faster than the roots take it up. Dry compost, sodden compost that damages the roots, frost and salty coastal wind can all cause it. On a balcony, leaves can scorch even when the plants are well watered.',
							'fix'      => 'Use a pot of good width and depth, and in summer be ready to water twice a day. A layer of gravel or slate on the compost helps hold moisture. Make sure water can drain away.',
							'recovery' => '',
						),
						array(
							'cause'    => 'A leaf feed sprayed in sunshine',
							'sign'     => 'Scorched patches after a foliar feed, for example Epsom salts',
							'check'    => 'Foliar feeds can scorch leaves in sunny weather.',
							'fix'      => 'Spray leaf feeds only when it is dull and overcast, or early or late in the day.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Wind-reduction netting', 'badge' => '', 'note' => 'Stretched between canes, it filters wind rather than blocking it.', 'url' => '' ),
						array( 'name' => 'Gravel or slate chippings', 'badge' => '', 'note' => 'A mulch on top of the compost slows drying.', 'url' => '' ),
						array( 'name' => 'Wide, deep container', 'badge' => '', 'note' => 'Holds more water for windy, hot days.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is a solid screen or a slatted one better on a windy balcony?', 'answer' => 'Slatted or mesh. The RHS explains that a solid wall can create turbulence on its sheltered side, while a screen that lets some air through slows the wind and makes a calmer spot behind it.' ),
						array( 'question' => 'Should I pick off scorched leaves?', 'answer' => 'There is usually no need. Removing them one by one is impractical on a large plant, badly damaged ones often fall on their own, and the plant grows new leaves. Cut out shoots that have died.' ),
						array( 'question' => 'Can I water my plants in full sun?', 'answer' => 'It is better to water the compost early or late in the day. If you do water in bright sun, keep the water off the leaves, especially hairy ones, where droplets can focus the light.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Weather damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/weather-damage' ),
						array( 'title' => 'RHS — Acer leaf scorch', 'url' => 'https://www.rhs.org.uk/problems/acer-leaf-scorch' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — Preventing winter damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/preventing-winter-damage' ),
						array( 'title' => 'RHS — Nutrient deficiencies', 'url' => 'https://www.rhs.org.uk/prevention-protection/nutrient-deficiencies' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to prevent scorch on a sunny, windy balcony' ) .
					$list(
						array(
							'Use existing walls and screens for shelter, and add a slatted screen or netting on the windward side.',
							'Choose wide, deep pots that do not dry out between waterings; the routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>.',
							'Water the compost early or late in the day, not the leaves at midday.',
							'Before winter, move evergreens such as bay out of cold winds; see <a href="/plant-care/protect-pots-in-winter/">how to protect pots in winter</a>.',
						)
					),
			),

			'yellow-between-the-veins' => array(
				'image_prompt' => 'Close-up of an older, lower leaf on a cherry tomato plant growing in a 30 cm pot on a sunny balcony in late summer, the compound leaf with toothed leaflets showing yellow tissue between dark green veins, a few reddish-brown tints and small dead brown patches, healthy green upper leaves and trusses of red cherry tomatoes behind. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A potted blueberry bush with small oval leaves on a balcony, photographed vertically, its youngest leaves at the shoot tips pale yellow between green veins while older leaves stay green. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Leaves Yellow Between Green Veins?',
				'excerpt'      => 'Yellowing between the veins while the veins stay green usually points to a shortage of magnesium, iron or manganese. Older leaves first suggests magnesium, often after heavy tomato feeding; the youngest leaves first suggests iron, typically on lime-hating plants in the wrong compost or watered with hard tap water.',
				'plants'       => array( 'cherry-tomato', 'grapevine-in-pot', 'raspberries-in-pots', 'apple-tree-in-pot', 'plum-tree-in-pot', 'blueberries-in-pots' ),
				'parts'        => array( 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Magnesium shortage',
							'sign'     => 'Older leaves yellow between the veins, sometimes with reddish-brown tints, then brown dead patches and early leaf fall',
							'check'    => 'Common on tomatoes, apples, plums, grapevines and raspberries. Plants take up potassium in preference to magnesium, so lots of high-potassium feed such as tomato feed can bring it on.',
							'fix'      => 'For a quick boost, dissolve 20 g of Epsom salts in 1 litre of water and wet the leaves with a sprayer or watering can, two or three times at two-week intervals. Do it only on a dull, overcast day, as the spray can scorch leaves in sun. Keep tomato feed to the dose on the label.',
							'recovery' => 'Damaged leaves keep their pattern; new leaves come through green. On tomatoes, if only the oldest leaves are marked and the plant is vigorous, there is no cause for concern.',
						),
						array(
							'cause'    => 'Iron shortage (lime-induced chlorosis)',
							'sign'     => 'The youngest leaves at the shoot tips turn yellow between the veins first; on lime-hating plants the leaf edges can also brown',
							'check'    => 'Iron is harder for roots to take up in alkaline conditions. Lime-hating (ericaceous) plants such as blueberries suffer in ordinary compost, or when watered for a long time with hard tap water.',
							'fix'      => 'Repot lime-haters into peat-free ericaceous compost, removing as much old compost as you can, and water with rainwater. As a short-term fix for pots, use a liquid seaweed feed containing sequestered iron.',
							'recovery' => 'New growth greens up once the roots can reach iron again.',
						),
						array(
							'cause'    => 'Manganese shortage',
							'sign'     => 'Yellowing between the veins that starts on mature leaves rather than the newest ones',
							'check'    => 'Manganese, like iron, becomes less available in alkaline compost, so it also affects lime-hating plants. Its pattern resembles magnesium shortage, which is why the RHS notes that some deficiencies are hard to tell apart.',
							'fix'      => 'For suspected manganese shortage, the RHS suggests a foliar feed containing manganese sulphate. For lime-haters, move them into ericaceous compost.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Root stress or a virus',
							'sign'     => 'Yellow patterns that are mottled, streaked or ringed rather than neatly between the veins, or yellowing on a plant that is too wet or too dry',
							'check'    => 'Viruses often cause mosaics, mottles and rings. Any root stress, from under- or over-watering, can also bring on deficiency symptoms.',
							'fix'      => 'Put the watering right first. For other kinds of yellowing, start with the general yellow-leaves guide.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'Epsom salts (magnesium sulphate)', 'badge' => '', 'note' => 'Dissolved at 20 g per litre for a leaf spray against magnesium shortage.', 'url' => '' ),
						array( 'name' => 'Liquid seaweed feed with sequestered iron', 'badge' => '', 'note' => 'A short-term fix for iron shortage in pots.', 'url' => '' ),
						array( 'name' => 'Peat-free ericaceous compost', 'badge' => '', 'note' => 'The long-term answer for blueberries and other lime-haters.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I tell magnesium shortage from iron shortage?', 'answer' => 'Look at which leaves turned first. Magnesium and manganese shortages show on older leaves; iron shortage shows on the youngest leaves at the shoot tips.' ),
						array( 'question' => 'Can too much tomato feed cause yellow leaves?', 'answer' => 'Yes. Tomato feed is rich in potassium, and plants take up potassium in preference to magnesium, so overdoing it can cause magnesium shortage. Follow the dose on the label.' ),
						array( 'question' => 'Should I give Epsom salts as a preventive?', 'answer' => 'Only feed for a deficiency you can see. The RHS advises using fertiliser when you know a plant is missing a specific nutrient.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Nutrient deficiencies', 'url' => 'https://www.rhs.org.uk/prevention-protection/nutrient-deficiencies' ),
						array( 'title' => 'RHS — Chlorosis', 'url' => 'https://www.rhs.org.uk/problems/chlorosis' ),
						array( 'title' => 'RHS — Tomato leaf problems', 'url' => 'https://www.rhs.org.uk/problems/tomatoes-leaf-problems' ),
						array( 'title' => 'RHS — Leaf damage on houseplants', 'url' => 'https://www.rhs.org.uk/prevention-protection/leaf-damage-on-houseplants' ),
						array( 'title' => 'RHS — How to grow blueberries', 'url' => 'https://www.rhs.org.uk/fruit/blueberries/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to avoid yellowing between the veins' ) .
					$list(
						array(
							'Grow <a href="/plants/blueberries-in-pots/">blueberries</a> and other lime-haters in peat-free ericaceous compost, and water them with rainwater.',
							'Use tomato feed at the label dose, not stronger; the routine is in <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.',
							'Keep the compost evenly moist, since stressed roots take up nutrients poorly.',
							'If the whole leaf is yellow, or the veins are yellow too, go to <a href="/problems/yellow-leaves-container-plants/">why container plant leaves turn yellow</a>.',
						)
					),
			),

			'pale-stunted-plants' => array(
				'image_prompt' => 'A wooden trough of Swiss chard and lettuce on a balcony railing in midsummer, the plants small and spindly with pale yellow-green leaves, the oldest outer leaves the palest with a faint pink tint, compost slightly shrunk from the sides of the trough, a lush dark green chard plant in a fresh pot beside it for comparison. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Two pots of leafy greens side by side on a balcony, photographed vertically: one small and pale yellow-green, the other full and dark green. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Are My Plants in Pots Stunted and Pale Green?',
				'excerpt'      => 'Container plants that stay small and spindly with pale leaves, the oldest ones paler first, have usually run out of nitrogen: compost in pots runs short after a few months and watering washes it out. A general-purpose liquid feed corrects it, but rule out cold, waterlogging, drought and root pests first.',
				'plants'       => array( 'salad-leaves-in-pots', 'lettuce-in-pots', 'swiss-chard-in-pots', 'kale-in-pots', 'spinach-in-pots', 'genovese-basil' ),
				'parts'        => array( 'whole-plant', 'leaves' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Nitrogen shortage',
							'sign'     => 'Spindly, stunted plants with pale yellow-green leaves, sometimes tinged pink; the yellowing starts low down and creeps upwards',
							'check'    => 'Nitrogen drives leafy growth and washes out of compost easily with watering. Compost in containers can be short of it after a few months of use. Leafy crops show it quickly; peas and beans are the exception, as they are rarely short of nitrogen.',
							'fix'      => 'Give a general-purpose liquid feed at the strength on the label.',
							'recovery' => 'Leaves that are already pale stay pale; new leaves come through greener once the plant is fed regularly.',
						),
						array(
							'cause'    => 'Phosphorus held back by cold, wet compost',
							'sign'     => 'Stunted young plants with purple colouring on the older leaves, which later turn a dull yellow',
							'check'    => 'Often seen on young tomatoes and other tender plants put out while the weather is still cold. Soggy compost, especially in cool weather, stops the roots taking up phosphorus.',
							'fix'      => 'Do not overwater pots in cool weather, and keep tender plants under cover until the end of May or early June. Liquid feed regularly with a general-purpose fertiliser.',
							'recovery' => 'Growth picks up as the weather warms and the compost drains.',
						),
						array(
							'cause'    => 'Growing conditions that mimic hunger',
							'sign'     => 'Pale, slow plants that do not respond to feeding',
							'check'    => 'Drought, waterlogging, too little light and poor establishment can all look like a deficiency. Feeding cannot help roots that are too wet, too dry or too cold.',
							'fix'      => 'Check the compost at root depth and the drainage holes, and move the pot to a brighter spot if it is shaded for most of the day.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Crowded roots or root pests',
							'sign'     => 'Roots circling the pot, or grubs or waxy aphids among them when you tip the plant out',
							'check'    => 'A root-bound plant dries out quickly and runs short of food. Root feeders such as vine weevil grubs and root aphids also cause yellowing and poor growth.',
							'fix'      => 'Pot on into the next size up, or replace some of the old compost if the pot cannot get bigger. For root pests, see the vine weevil and root aphid guides.',
							'recovery' => '',
						),
					),
					'products' => array(
						array( 'name' => 'General-purpose liquid feed', 'badge' => '', 'note' => 'Supplies nitrogen to hungry plants in pots.', 'url' => '' ),
						array( 'name' => 'Pot one size larger', 'badge' => '', 'note' => 'For a plant whose roots have filled its container.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can overfeeding stunt plants too?', 'answer' => 'Yes. Too much nitrogen fertiliser damages plants: the RHS describes dark green leaves with stunted growth as a sign of excess. Lush, soft growth from overfeeding is also more open to pests and diseases.' ),
						array( 'question' => 'Why are my young tomato plants purple underneath?', 'answer' => 'Purple tints on the older leaves of young tomatoes put out in cold weather point to phosphorus being held back by cold, wet compost. Keep them warmer, water less in cool spells and feed with a general-purpose fertiliser.' ),
						array( 'question' => 'Do my pea and bean pots need a nitrogen feed?', 'answer' => 'Rarely. Peas and beans are the exception among crops that run short of nitrogen. Give them the feed recommended in their own guide.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Nutrient deficiencies', 'url' => 'https://www.rhs.org.uk/prevention-protection/nutrient-deficiencies' ),
						array( 'title' => 'RHS — Chlorosis', 'url' => 'https://www.rhs.org.uk/problems/chlorosis' ),
						array( 'title' => 'RHS — Nutrition and feeding plants', 'url' => 'https://www.rhs.org.uk/garden-jobs/nutrition-feeding-plants' ),
						array( 'title' => 'RHS — Fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertilisers' ),
						array( 'title' => 'RHS — Non-flowering woody plants', 'url' => 'https://www.rhs.org.uk/problems/non-flowering-woody-plants' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to keep container plants growing strongly' ) .
					$list(
						array(
							'Potting compost feeds plants for about six to eight weeks after potting; plan feeds after that with <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.',
							'Check moisture before you feed: hungry-looking plants are often too wet or too dry.',
							'Pot on plants whose roots fill the container.',
							'Seedlings that are tall and pale rather than short and pale are short of light: see <a href="/problems/leggy-seedlings/">leggy seedlings</a>.',
							'For yellow leaves on an otherwise normal-sized plant, start with <a href="/problems/yellow-leaves-container-plants/">yellow leaves on container plants</a>.',
						)
					),
			),

			'few-flowers-or-fruit' => array(
				'image_prompt' => 'A large courgette plant in a 45 cm black pot on a sunny patio in early summer, big lobed, slightly prickly dark green leaves with silver markings, several bright yellow male flowers on long thin stalks and no small courgettes forming at the base of any flower. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'A lush, leafy courgette plant in a pot on a patio with large green leaves and only a couple of yellow flowers, photographed vertically from slightly above. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
				'title'        => 'Why Is My Plant All Leaves and No Flowers or Fruit?',
				'excerpt'      => 'Plenty of leaves but few flowers or fruit usually comes down to too much nitrogen, too little potassium, a shady or cold spot, or a plant that is still too young. Switch to a high-potassium feed once flowering is due, give the pot full sun and shelter, and keep picking.',
				'plants'       => array( 'courgettes-in-pots', 'cucumbers-in-pots', 'cherry-tomato', 'lemon-tree-in-pot' ),
				'parts'        => array( 'flowers-fruit', 'whole-plant' ),
				'lists'        => array(
					'causes'   => array(
						array(
							'cause'    => 'Too much nitrogen',
							'sign'     => 'Large, lush, dark green leaves and soft growth, but very few flowers',
							'check'    => 'Have you been using a high-nitrogen feed, or adding manure? Excess nitrogen pushes leaves at the expense of flowers.',
							'fix'      => 'Stop the high-nitrogen feed. Fruiting crops do better on a feed richer in potassium once they reach flowering size.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Potassium shortage',
							'sign'     => 'Leaves tinged yellow or purple-red, with browning that starts at the edges of mature leaves, and poor flowering and fruiting',
							'check'    => 'Potassium (potash) supports flowering and fruiting. It washes out of light, sandy soils easily, and the RHS notes that crops in containers may need extra.',
							'fix'      => 'Use a potassium-rich liquid feed such as a tomato feed or a seaweed-based feed, at the dose on the label. Do not overdo it: too much potassium cuts magnesium uptake.',
							'recovery' => '',
						),
						array(
							'cause'    => 'Only male flowers on courgettes and cucumbers',
							'sign'     => 'Plenty of flowers on thin stalks, but none with a tiny fruit behind the petals',
							'check'    => 'Young plants often make only male flowers early in the season; females, which have a small swelling behind the flower, follow later. Cold nights, dull weather and poor conditions delay them. In hot weather the reverse can happen, with few male flowers.',
							'fix'      => 'Wait, keep watering regularly, give a high-potassium feed to vigorous plants, and protect plants on cold early-summer nights with fleece. Avoid shade and overcrowding.',
							'recovery' => 'Male and female flowers usually even out as the season goes on.',
						),
						array(
							'cause'    => 'Fruit that starts but does not develop',
							'sign'     => 'Tiny courgettes or cucumbers that swell only at the stalk end, then shrivel and rot at the flower end',
							'check'    => 'Usually poor pollination in cold, dull weather when few bees are flying, a plant too young to carry fruit, or a stressed plant. Leaving mature fruit on the plant also slows new fruit set.',
							'fix'      => 'Hand-pollinate: pick a male flower, remove its petals and press it into the centre of a female flower. One male flower can pollinate several females. Feed and water pots regularly, and pick fruit young and often.',
							'recovery' => 'Fruit set improves as the weather warms, and slows naturally in autumn.',
						),
						array(
							'cause'    => 'Too little sun, a cramped pot, or a young plant',
							'sign'     => 'A plant that has never flowered well, or a lemon tree raised from a pip',
							'check'    => 'Sun-loving plants in shade are reluctant to flower. Root-bound plants dry out and go hungry. Citrus can fail to flower from lack of light, lack of feeding, erratic watering or low temperatures, and a lemon raised from a pip often takes seven to ten years to fruit.',
							'fix'      => 'Move the pot to the sunniest sheltered spot you have, pot on a root-bound plant, and feed citrus with a proprietary citrus fertiliser through the growing season.',
							'recovery' => 'Grafted citrus can flower and fruit after two or three years.',
						),
					),
					'products' => array(
						array( 'name' => 'High-potassium liquid feed (tomato feed)', 'badge' => '', 'note' => 'For fruiting crops once they flower. Follow the label dose.', 'url' => '' ),
						array( 'name' => 'Small soft paintbrush', 'badge' => '', 'note' => 'An alternative to using a whole male flower when hand-pollinating.', 'url' => '' ),
						array( 'name' => 'Horticultural fleece', 'badge' => '', 'note' => 'For courgettes and cucumbers on cold nights in early summer.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I hand-pollinate courgettes in a pot?', 'answer' => 'Find a male flower, the one with no small fruit at its base. Pick it, pull off the petals to expose the pollen, and press it into the centre of an open female flower. One male flower will do several females.' ),
						array( 'question' => 'Will a lemon tree grown from a pip ever fruit?', 'answer' => 'It may, but slowly. The RHS says seed-raised citrus has to pass through a juvenile stage and takes on average seven to ten years to fruit, while grafted plants can fruit after two or three.' ),
						array( 'question' => 'Is my tomato short of potassium or just short of sun?', 'answer' => 'Look at the leaves. Potassium shortage shows as yellow or purple-red tints with browning from the edges of mature leaves. If the leaves look healthy, work through the other causes on this page: sun, warmth, feeding and pot size.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Nutrient deficiencies', 'url' => 'https://www.rhs.org.uk/prevention-protection/nutrient-deficiencies' ),
						array( 'title' => 'RHS — Courgette, marrow, pumpkin and squash problems', 'url' => 'https://www.rhs.org.uk/problems/courgette-marrow-pumpkin-and-squash' ),
						array( 'title' => 'RHS — Non-flowering woody plants', 'url' => 'https://www.rhs.org.uk/problems/non-flowering-woody-plants' ),
						array( 'title' => 'RHS — Citrus problems', 'url' => 'https://www.rhs.org.uk/problems/citrus' ),
						array( 'title' => 'RHS — Fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertilisers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How to get more flowers and fruit from pots' ) .
					$list(
						array(
							'Give fruiting crops the sunniest, most sheltered spot on the balcony or patio.',
							'Switch from a general feed to a high-potassium one when flowering starts; timings are in <a href="/plant-care/how-to-feed-container-plants/">how to feed container plants</a>.',
							'Pot on plants whose roots fill the container.',
							'Pick courgettes and cucumbers young, and often.',
							'If flowers open and then fall off, the causes are different: see <a href="/problems/flowers-dropping-off/">why flowers drop off</a>.',
						)
					),
			),
		),
	),
);
