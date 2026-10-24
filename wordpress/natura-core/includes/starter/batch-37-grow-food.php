<?php
/**
 * Starter guides, batch 37 (Grow your own food, part 1): two Plant Care
 * articles in the "Grow your own food" topic, on the crops that give the
 * most food from a pot and on perennial food plants that stay in a pot for
 * years.
 *
 * Facts come from the pages listed in each guide (all checked 24 October
 * 2026): the RHS, Cornell Cooperative Extension, Kansas State University
 * Research and Extension, Colorado State University Extension, Penn State
 * Extension, University of Kentucky Cooperative Extension, Oregon State
 * University Extension, UMass Amherst Extension and University of Illinois
 * Extension. No yield, weight or money figure is given unless a source states
 * it, and it is then attributed. Pot sizes and RHS hardiness ratings for
 * single plants are the ones given in each plant's own guide; the USDA zone
 * equivalents follow the RHS hardiness rating table. Timing is given by
 * season, never by month.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

$p    = 'natura_core_demo_p';
$h2   = 'natura_core_demo_h2';
$list = 'natura_core_demo_list';

$rhs_veg_pots  = array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' );
$rhs_herb_pots = array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' );
$rhs_chives    = array( 'title' => 'RHS — How to grow chives', 'url' => 'https://www.rhs.org.uk/herbs/chives/grow-your-own' );
$csu_pots      = array( 'title' => 'Colorado State University Extension — Container gardens', 'url' => 'https://extension.colostate.edu/resource/container-gardens/' );

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Grow your own food (1)', 'natura-core' ),
	'guides' => array(
		'post' => array(
			'most-productive-crops-for-pots' => array(
				'image_prompt' => 'A sunny apartment balcony in midsummer with a row of large containers: a pole bean plant with heart-shaped leaves and hanging green pods climbing a bamboo teepee, a cherry tomato plant tied to a stake with trusses of small red and orange fruit, a wide trough of loose-leaf lettuce and red-stemmed Swiss chard with a few outer leaves freshly cut, and a compact zucchini plant with large lobed leaves and one small glossy fruit; a pair of garden scissors and a small basket of picked beans and tomatoes on the balcony floor.' . $photo_end,
				'pin_prompt'   => 'Close view of a balcony corner packed with productive containers: green bean pods hanging from a climbing plant on bamboo canes above, a cherry tomato plant heavy with ripe red fruit in the middle, and a trough of cut-and-come-again salad greens and rainbow chard at the bottom, warm summer light, photographed vertically.' . $pin_end,
				'title'        => 'The Crops That Give the Most Food From a Pot',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'The most food per pot comes from crops you pick again and again over a long season: cut-and-come-again leaves, chard, pole beans, peas, cherry tomatoes, compact zucchini and herbs you trim. Sweet corn and cabbage tie up a big pot for one small harvest.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Tall canes or a sturdy trellis', 'note' => 'Lets pole beans, peas and cucumbers grow up instead of out, so one pot carries a taller, longer-cropping plant.', 'url' => '' ),
						array( 'name' => 'Sharp garden scissors or snips', 'note' => 'For cutting leaves, herb tips and cucumbers cleanly instead of tearing them.', 'url' => '' ),
						array( 'name' => 'Large container, 18 in (45 cm) wide or more', 'note' => 'The RHS size for most vegetables; a bigger pot dries out and runs short of food less often.', 'url' => '' ),
						array( 'name' => 'General-purpose liquid fertilizer', 'note' => 'Plants that keep cropping all season keep using food from a small volume of potting mix.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can sweet corn be grown in a container at all?', 'answer' => 'It can be tried, but several extension services, including Penn State, Kentucky and Oregon State, say it is not well suited to pots. The plants are tall and need to stand in a block so wind can pollinate them, and the RHS says each plant usually carries just two cobs.' ),
						array( 'question' => 'Is a cabbage worth a pot on a small balcony?', 'answer' => 'Only if you really want one. The RHS says cabbages take about four to six months to be ready, and Cornell suggests one plant per 5-gallon (19-liter) pot, so the container gives a single head over most of the season. Leaves such as chard or kale give pickings for far longer from the same space.' ),
						array( 'question' => 'Should I leave some zucchini on the plant to grow big?', 'answer' => 'No, if you want more fruit. The RHS says zucchini left on the plant quickly turn into marrows, and that picking them small, at about 4–5 in (10–12 cm), keeps a plant cropping for longer.' ),
						array( 'question' => 'What does "bush," "patio" or "compact" on a seed packet mean for a pot?', 'answer' => 'They mark varieties bred to stay small. Cornell and Colorado State extension both advise choosing them for containers, and Colorado State calls them prolific producers that need little room. Check the packet for the final plant size anyway, since some still need a stake.' ),
						array( 'question' => 'Can I grow something else in the same pot as a tomato?', 'answer' => 'Yes, for a few weeks. Kansas State and Cornell suggest sowing quick salad crops or radishes around a young tomato or pepper; they are picked before the bigger plant needs all the room.' ),
					),
					'sources'  => array(
						$rhs_veg_pots,
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chard', 'url' => 'https://www.rhs.org.uk/vegetables/chard/grow-your-own' ),
						array( 'title' => 'RHS — How to grow kale', 'url' => 'https://www.rhs.org.uk/vegetables/kale/grow-your-own' ),
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow runner beans', 'url' => 'https://www.rhs.org.uk/vegetables/runner-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow basil', 'url' => 'https://www.rhs.org.uk/herbs/basil/grow-your-own' ),
						$rhs_chives,
						array( 'title' => 'RHS — How to grow cabbages', 'url' => 'https://www.rhs.org.uk/vegetables/cabbages/grow-your-own' ),
						array( 'title' => 'RHS — How to grow sweetcorn', 'url' => 'https://www.rhs.org.uk/vegetables/sweetcorn/grow-your-own' ),
						array( 'title' => 'Cornell Cooperative Extension — Vegetable and herb gardening in containers (PDF)', 'url' => 'https://dlc.cce.cornell.edu/pluginfile.php/376640/mod_resource/content/1/Vegetable%20and%20Herb%20Gardening%20in%20Containers.pdf' ),
						array( 'title' => 'Kansas State University Research and Extension — Growing vegetables in pots (MF2873, PDF)', 'url' => 'https://bookstore.ksre.ksu.edu/pubs/MF2873.pdf' ),
						$csu_pots,
						array( 'title' => 'Penn State Extension — Container vegetable gardening: four keys to success', 'url' => 'https://extension.psu.edu/container-vegetable-gardening-four-keys-to-success' ),
						array( 'title' => 'University of Kentucky College of Agriculture — Containers can provide fresh produce using little space', 'url' => 'https://news.ca.uky.edu/article/containers-can-provide-fresh-produce-using-little-space' ),
						array( 'title' => 'Oregon State University Extension — No yard? Grow vegetables in containers', 'url' => 'https://extension.oregonstate.edu/node/146716' ),
					),
				),
				'content'      =>
					$p( 'Some crops give you one harvest and then they are done; others keep producing for months if you keep picking. In a small space, that difference decides how much you eat from each pot. This guide sorts crops by how much they give for the room they take, and explains how to pick so plants carry on cropping. If you are just starting, read <a href="/best-vegetables-for-beginners-in-pots/">the best vegetables for beginners</a> first; to keep pots of quick crops coming in batches, see <a href="/succession-planting-small-spaces/">succession planting</a>.' ) .

					$h2( 'What makes a crop productive in a pot?' ) .
					$list(
						array(
							'<strong>You pick it many times.</strong> Leaves that regrow, and plants that set new pods or fruit as you take the ripe ones, fill the kitchen for weeks from one sowing.',
							'<strong>It crops over a long season.</strong> The RHS notes that climbing beans take longer to start than dwarf ones but then go on producing from midsummer into early fall.',
							'<strong>It grows up, not out.</strong> Climbers trained on canes or a trellis use the height of a balcony instead of its floor.',
							'<strong>It is bred for containers.</strong> Colorado State University Extension describes compact varieties as prolific producers that need very little room.',
						)
					) .
					$p( 'Root space matters as much as the crop. The RHS suggests containers at least 18 in (45 cm) wide and deep for vegetables; anything smaller needs watering and feeding far more often. For sizes crop by crop, see <a href="/how-to-choose-pots-for-vegetables/">how to choose pots for vegetables</a>.' ) .

					$h2( 'Which leaves can you cut again and again?' ) .
					$list(
						array(
							'<strong>Cut-and-come-again salad greens:</strong> the RHS says you can start snipping when the plants are about 4 in (10 cm) tall, taking a few outer leaves so new ones grow from the center, or cutting loose-leaf lettuce back to a 1 in (2.5 cm) stump to resprout. See <a href="/plants/salad-greens-in-pots/">salad greens in pots</a>.',
							'<strong>Swiss chard:</strong> the RHS calls it productive and says the leaves can be picked over a long season; take outer leaves with their whole stalk, cut at the base. See <a href="/plants/swiss-chard-in-pots/">Swiss chard in pots</a>.',
							'<strong>Kale:</strong> picked over many months, and the RHS notes that regular picking encourages more leaves. Choose a compact variety for a pot. See <a href="/plants/kale-in-pots/">kale in pots</a>.',
							'<strong>Beets:</strong> a bonus crop, since the RHS says young beet leaves can be cooked like spinach while the roots grow. See <a href="/plants/beets-in-pots/">beets in pots</a>.',
						)
					) .
					$p( 'Spinach gives quick pickings too, but the RHS notes that it soon runs to seed, so it suits small, repeated sowings better than a long harvest from one pot.' ) .

					$h2( 'Why climbing beans and peas give so much' ) .
					$p( 'Kansas State University Research and Extension notes that pole beans yield more for the area they take than bush beans, as long as you trellis them. The RHS makes the same point for climbing green beans and runner beans: growing upward, they give a large crop from a small patch of ground, and they keep producing into early fall if picked regularly. Dwarf beans crop quickly but only for a few weeks.' ) .
					$p( 'The catch is the container: pole beans need a big, heavy pot and tall supports, which <a href="/plants/green-beans-in-pots/">green beans in pots</a> and <a href="/plants/runner-beans-in-pots/">runner beans in pots</a> explain, along with <a href="/supports-for-climbing-crops/">which support suits which climber</a>. Peas also climb and keep forming pods while you pick them every few days; the RHS adds that young pea shoots are good in salads. See <a href="/plants/peas-in-pots/">peas in pots</a>.' ) .

					$h2( 'Fruiting crops that keep cropping all summer' ) .
					$list(
						array(
							'<strong>Cherry tomatoes:</strong> the RHS finds small-fruited tomatoes the easiest, fastest to fruit and most prolific, and University of Kentucky Extension points out that a tomato produces a good number of fruit in a small area. Cornell also advises leaning toward cherry and small tomatoes rather than beefsteaks in containers. See <a href="/plants/cherry-tomato/">cherry tomatoes in pots</a>.',
							'<strong>Cucumbers:</strong> trained up a support, they take little floor space. The RHS says mini and small-fruited varieties give lots of fruit that is ready sooner than long types, and that regular harvesting encourages more. See <a href="/plants/cucumbers-in-pots/">cucumbers in pots</a>.',
							'<strong>Zucchini:</strong> a big plant, which is why Penn State Extension lists it with crops better suited to the ground. The RHS says a compact or bush variety still manages in a container at least 18 in (45 cm) wide, and that frequent picking of small fruit gives a long cropping period. See <a href="/plants/zucchini-in-pots/">zucchini in pots</a>.',
						)
					) .

					$h2( 'Herbs you trim instead of pull' ) .
					$p( 'Colorado State University Extension notes that harvesting herb leaves regularly prolongs the useful life of the plant. The RHS advises taking a few shoot tips from each basil plant, which keeps it bushy and productive, and snipping chives often so fresh leaves keep coming. See <a href="/plants/genovese-basil/">basil</a>, <a href="/plants/chives-in-pots/">chives</a> and <a href="/plants/parsley-in-pots/">parsley</a>. Herbs that come back every year are covered in <a href="/perennial-food-plants-for-pots/">perennial food plants for pots</a>.' ) .

					$h2( 'Which crops take a big pot for one harvest?' ) .
					$p( 'These are not impossible in a container, but they give much less food per pot and per season than the crops above.' ) .
					$list(
						array(
							'<strong>Sweet corn:</strong> Penn State and Kentucky extension say it is better suited to the ground, and Oregon State that it may not be practical on a balcony. The RHS explains that corn is wind-pollinated and must be planted in a block for the cobs to fill, and that each plant usually bears two cobs.',
							'<strong>Cabbage:</strong> the RHS says cabbages are ready in about four to six months, and Cornell suggests one plant per 5-gallon (19-liter) pot. Cornell adds a way to get more from it: after cutting the first head, cut a cross in the top of the remaining stem, and it can sprout a few smaller heads.',
							'<strong>Winter squash:</strong> Penn State lists it with the crops better grown in the ground, and Cornell gives a vine a spread of about 6 × 6 ft (1.8 × 1.8 m). A <a href="/plants/winter-squash-in-pots/">compact variety in a large pot</a> or a plant <a href="/diy-projects/grow-a-squash-up-a-trellis-in-a-pot/">trained up a trellis</a> is the small-space version.',
							'<strong>Garlic:</strong> Cornell gives it about 220–300 days from planting to harvest. It fits a deep pot well, but that pot is busy for most of a year. See <a href="/plants/garlic-in-pots/">garlic in pots</a>.',
						)
					) .

					$h2( 'How to choose a variety for a container' ) .
					$p( 'Cornell and Colorado State extension both suggest looking for the words "bush," "patio," "dwarf" or "compact" on the packet or label, and reading the description for the final plant size. Colorado State names examples such as \'Patio\' and \'Tiny Tim\' tomatoes and \'Spacemaster\' cucumber. Penn State adds that "determinate" tomatoes are the compact, bushy kind, and that compact plants such as tomatoes, pole beans and cucumbers may still need a stake or trellis. Oregon State University Extension mentions miniature varieties, such as \'Thumbelina\' carrots, for small spaces.' ) .

					$h2( 'Fit a quick crop around a slow one' ) .
					$p( 'A large pot has more surface than one young plant uses. Kansas State suggests sowing lettuce and radishes around a newly planted tomato or pepper and picking them before the bigger plant grows to full size; Cornell suggests quick herbs, leafy greens and radishes around slower fruiting crops in the same way. When a crop finishes, sow or plant the next one straight away; the timing is explained in <a href="/succession-planting-small-spaces/">succession planting</a>.' ) .

					$h2( 'How to pick so plants keep producing' ) .
					$list(
						array(
							'<strong>Pick young and often.</strong> Beans, peas, zucchini and cucumbers slow down when pods or fruit are left to mature. Check them every few days in summer.',
							'<strong>Never leave fruit to grow huge.</strong> The RHS warns that zucchini left on the plant soon become marrows; pick everything at a usable size, even if you have to give some away.',
							'<strong>Take outer leaves first.</strong> Leave the growing center of chard, kale and salad greens to make new leaves.',
							'<strong>Cut, do not tug.</strong> The RHS advises cutting cucumbers off with a clean blade rather than pulling them.',
							'<strong>Remove flower stems on leafy crops.</strong> The RHS says cutting off the first flower stems on chard keeps it producing leaves a little longer.',
							'<strong>Keep up water and food.</strong> A plant that cropped all summer has emptied its potting mix. The RHS suggests a general-purpose liquid feed every two weeks for vegetables in containers; see <a href="/how-to-fertilize-container-plants/">how to feed container plants</a> and <a href="/how-often-to-water-container-plants/">how often to water</a>.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Filling the space with crops that give one harvest, then nothing for months.',
							'Choosing a full-size variety when a bush, patio or compact one exists.',
							'Planting climbers without a support in place, so they sprawl and crop poorly.',
							'Going away for a week at the peak of the season and coming back to tough pods and marrows.',
							'Squeezing a big cropper into a small pot, where it dries out daily and gives little.',
						)
					),
			),

			'perennial-food-plants-for-pots' => array(
				'image_prompt' => 'A sheltered patio against a warm brick wall with a group of mature food plants in large, frost-proof glazed and terracotta pots raised on pot feet: a clump of chives with purple pompom flowers, a silvery-gray sage, an upright rosemary with needle-like leaves, a blueberry bush with clusters of blue berries, a rhubarb plant with large crinkled leaves and red stalks, and a small fig tree with broad lobed leaves, late summer afternoon light.' . $photo_end,
				'pin_prompt'   => 'A tall cluster of long-lived food plants in big pots on a small patio: a young fig tree with lobed leaves at the back, a blueberry bush with ripe blue berries in the middle, and pots of thyme, chives and oregano in front, soft evening light, photographed vertically.' . $pin_end,
				'title'        => 'Food Plants You Plant Once: Perennial Crops for Pots',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'Perennial herbs such as chives, thyme, sage, rosemary, mint and oregano, plus rhubarb, strawberries, blueberries, fruit bushes and dwarf fruit trees, crop for years in a pot. Give them a large container, fresh potting mix every year or two, steady feeding and roots kept from freezing.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Frost-proof container, 18–20 in (45–50 cm) wide', 'note' => 'The RHS size for most fruit; perennial herbs manage in less.', 'url' => '' ),
						array( 'name' => 'Soil-based potting mix', 'note' => 'Holds its structure for years; in the UK, a peat-free John Innes No. 3.', 'url' => '' ),
						array( 'name' => 'Controlled-release fertilizer', 'note' => 'Mixed in at planting, top-dressing or repotting to feed long-term plants through the season.', 'url' => '' ),
						array( 'name' => 'Pot feet', 'note' => 'Keep drainage holes clear so the mix does not sit wet through winter.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I grow asparagus in a pot?', 'answer' => 'It is not a good candidate. The RHS describes asparagus as a crop for a dedicated, permanent bed of several square yards, with plants up to 18 in (45 cm) apart, cropping for about 20 years after two or three years of waiting. That is a lot of root room for a container. Rhubarb is the long-lived vegetable that suits a large pot.' ),
						array( 'question' => 'Why do perennial herbs survive in the ground but die in a pot?', 'answer' => 'Usually because of the roots. UMass Extension explains that roots are much less cold-hardy than shoots, and that the root ball in an unprotected pot can get almost as cold as the air. Waterlogged mix in winter does the rest. Ground soil buffers both.' ),
						array( 'question' => 'How often should strawberry plants in a pot be replaced?', 'answer' => 'The RHS advises replanting strawberries every three or four years, as older plants crop less well and disease builds up. Many varieties make runners, small plantlets you can root to replace the old plants.' ),
						array( 'question' => 'Does the hardiness rating on a plant label apply to pots?', 'answer' => 'Not quite. RHS ratings describe the lowest winter temperature a plant usually survives, and the RHS adds that plants in pots are more vulnerable: even many fully hardy (H6) plants in containers are damaged unless protected. Treat a potted plant as a little less hardy than its label says.' ),
						array( 'question' => 'Should perennial herbs be planted in fall?', 'answer' => 'Spring is safer. The RHS advises waiting until the weather warms in late spring before buying herb plants, because herbs planted in winter are prone to root damage in cold, wet potting mix.' ),
					),
					'sources'  => array(
						$rhs_herb_pots,
						array( 'title' => 'RHS — Fruit in containers', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/containers' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Hardiness rating', 'url' => 'https://www.rhs.org.uk/plants/trials-awards/award-of-garden-merit/rhs-hardiness-rating' ),
						$rhs_chives,
						array( 'title' => 'RHS — How to grow mint', 'url' => 'https://www.rhs.org.uk/herbs/mint/grow-your-own' ),
						array( 'title' => 'RHS — How to grow rhubarb', 'url' => 'https://www.rhs.org.uk/vegetables/rhubarb/grow-your-own' ),
						array( 'title' => 'RHS — How to grow asparagus', 'url' => 'https://www.rhs.org.uk/vegetables/asparagus/grow-your-own' ),
						array( 'title' => 'RHS — How to grow strawberries', 'url' => 'https://www.rhs.org.uk/fruit/strawberries/grow-your-own' ),
						array( 'title' => 'RHS — How to grow blueberries', 'url' => 'https://www.rhs.org.uk/fruit/blueberries/grow-your-own' ),
						$rhs_veg_pots,
						array( 'title' => 'UMass Amherst Extension — Overwintering containerized perennials', 'url' => 'https://www.umass.edu/agriculture-food-environment/greenhouse-floriculture/fact-sheets/overwintering-containerized-perennials' ),
						array( 'title' => 'University of Illinois Extension — How to grow fruits, vegetables, herbs in container gardens (PDF)', 'url' => 'https://extension.illinois.edu/sites/default/files/how_to_grow_fruits_vegetables_herbs_in_containers.pdf' ),
						$csu_pots,
					),
				),
				'content'      =>
					$p( 'Annual vegetables start again from seed every year. Perennial food plants stay: a pot of chives, a blueberry bush or a fig can crop for years with no sowing at all. In return they ask for a pot big enough to live in, fresh potting mix now and then, steady feeding and roots that survive the winter. This guide covers which plants to choose and what keeps them going in a container; for quick annual crops, see <a href="/most-productive-crops-for-pots/">the crops that give the most food from a pot</a>.' ) .

					$h2( 'Why a pot is harder on a perennial than the ground' ) .
					$p( 'Soil in the ground keeps roots at a steadier temperature. UMass Extension explains that roots are far less cold-hardy than shoots, and that in a pot most roots lie against the thin wall, where research found the root ball can drop close to air temperature. University of Illinois Extension makes the same point: plants above ground miss the warmth of the soil. The RHS hardiness table notes that potted plants are at greater risk, and that many fully hardy (H6) plants in containers are damaged without protection.' ) .
					$p( 'So pick plants rated a step hardier than your winters need, and plan where each pot will spend the cold months before you buy it.' ) .

					$h2( 'Perennial herbs for pots' ) .
					$p( 'The RHS names mint, oregano, rosemary, thyme and sage among herbs that can live outside all year once established. Ratings below are those given in each plant guide, with the RHS table\'s USDA zone equivalent in brackets.' ) .
					$list(
						array(
							'<strong><a href="/plants/chives-in-pots/">Chives</a>:</strong> H6 (zones 6b–7a). A clump that dies back in winter and regrows each spring; sun or partial shade.',
							'<strong><a href="/plants/mint-in-pots/">Mint</a>:</strong> H7 (6a and colder). Grown in its own pot because it spreads. The RHS notes that mint is not the happiest herb in a pot: lift it and replant generous pieces of root in fresh potting mix whenever it looks straggly.',
							'<strong><a href="/plants/oregano-in-pots/">Oregano</a>:</strong> H6 (6b–7a).',
							'<strong><a href="/plants/thyme-in-pots/">Thyme</a>:</strong> H5 (7b–8a).',
							'<strong><a href="/plants/sage-in-pots/">Sage</a>:</strong> H5 (7b–8a). With rosemary, one of the larger herbs the RHS says can stay in the same container for several years before repotting.',
							'<strong><a href="/plants/rosemary-in-pots/">Rosemary</a>:</strong> H4 (8b–9a). Needs more winter shelter in a pot.',
							'<strong><a href="/plants/french-tarragon-in-pots/">French tarragon</a>:</strong> H4 (8b–9a). Dies back in winter.',
							'<strong><a href="/plants/sorrel-in-pots/">Sorrel</a></strong> and <strong><a href="/plants/lemon-balm-in-pots/">lemon balm</a>:</strong> both H7 (6a and colder).',
							'<strong><a href="/plants/bay-tree-in-pot/">Bay</a>:</strong> H4 (8b–9a). A small evergreen tree; the RHS suggests a soil-based mix for it.',
						)
					) .
					$p( 'For all of them, the RHS recommends deep pots where roots can stay undisturbed, a potting mix opened up with up to a quarter grit, and a balanced fertilizer for leafy growth rather than a high-potassium one that pushes flowers. Buy plants once the weather has warmed in late spring.' ) .

					$h2( 'Rhubarb, and why not asparagus' ) .
					$p( '<a href="/plants/rhubarb-in-a-pot/">Rhubarb</a> lives for many years and the RHS suggests a compact variety for a container; its plant guide gives a pot at least 20 in (50 cm) deep and wide, and a rating of H5 (7b–8a). The RHS advises dividing an established clump about every five years to keep it cropping, which also gives you new plants.' ) .
					$p( 'Asparagus is the other famous perennial vegetable, but the RHS describes it as a crop for a dedicated, permanent bed of several square yards, so it is not suggested here for pots.' ) .

					$h2( 'Fruit that stays for years' ) .
					$list(
						array(
							'<strong><a href="/plants/balcony-strawberry/">Strawberries</a>:</strong> H6 (6b–7a). The RHS advises replanting every three or four years; runners from your own plants can replace the old ones.',
							'<strong><a href="/plants/blueberries-in-pots/">Blueberries</a>:</strong> H6–H7 depending on the variety. They need acidic, ericaceous potting mix; Illinois Extension gives a pH of about 4.8 to 5.2 for good cropping. The RHS names compact \'Bluetta\' and \'Sunshine Blue\' as best for containers. See <a href="/acidic-potting-mix-for-pots/">acidic potting mix</a>.',
							'<strong>Bush and cane fruit:</strong> <a href="/plants/raspberries-in-pots/">raspberries</a>, <a href="/plants/currants-in-pots/">currants</a>, <a href="/plants/gooseberries-in-pots/">gooseberries</a> and <a href="/plants/blackberries-in-pots/">blackberries</a> are all H6 (6b–7a) in their guides. Illinois Extension warns that berries bred small for containers may have cold-hardiness issues.',
							'<strong>Fruit trees:</strong> apples, pears and cherries are H6, plums H5, <a href="/plants/fig-tree-in-pot/">figs</a>, peaches and apricots H4, and the <a href="/plants/lemon-tree-in-pot/">lemon</a> only H2 (zone 11), so it winters indoors. To compare trees before buying, read <a href="/how-to-choose-a-fruit-tree-for-a-pot/">choosing a fruit tree for a pot</a>.',
						)
					) .

					$h2( 'Pot size and potting mix for the long term' ) .
					$p( 'The RHS suggests pots 18–20 in (45–50 cm) across for most fruit; perennial herbs manage in less, as each plant guide shows. Because the plant will stay put, use a mix that keeps its structure: the RHS notes that a soil-based potting mix does not rot down like organic material and lasts about three to four years (in the UK, a peat-free John Innes No. 3). The RHS also suggests a soil-based mix, or multipurpose mix with a third grit added, for fruit. A heavy pot is also more stable, though weight matters on a balcony.' ) .

					$h2( 'How often to repot, top-dress and feed' ) .
					$list(
						array(
							'<strong>Fruit:</strong> the RHS suggests moving it up a pot size every year or two after leaf fall. Once it is in its final pot, root-prune it every other year and replace about 30% of the mix, and in the years between replace the top layer. The steps are in <a href="/how-to-repot-container-plants/">how to repot container plants</a>, and the top layer in <a href="/potting-mix-for-containers/">refreshing potting mix</a>.',
							'<strong>Herbs:</strong> rosemary and sage can go several years; mint needs fresh mix far more often.',
							'<strong>Feeding:</strong> for long-term pot plants, the RHS suggests adding a controlled-release fertilizer at planting, top-dressing or repotting. For fruit it gives a choice: controlled-release pellets, or a high-potassium liquid feed every two weeks. Feeding usually stops after late summer until mid-spring. See <a href="/how-to-fertilize-container-plants/">how to feed container plants</a>.',
						)
					) .

					$h2( 'Getting the roots through winter' ) .
					$p( 'The full method is in <a href="/protect-pots-in-winter/">how to protect pots in winter</a> and <a href="/diy-projects/wrap-pots-for-winter/">wrap pots for winter</a>. What matters most for perennials is an even temperature: UMass Extension notes that repeated freezing and thawing raises the risk of losing plants. The RHS suggests placing potted herbs where they cannot freeze solid, get soaked by rain or dry out, such as in the rain shadow of a wall, in a cold frame or an open-fronted shed. Colorado State University Extension, writing for very cold winters, suggests an unheated garage or shed with water about once a month.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Choosing a plant only just hardy enough for your area and leaving its pot in the open all winter.',
							'Leaving a perennial in the same tired potting mix for years without top-dressing.',
							'Planting new herbs in cold, wet potting mix in winter.',
							'Giving blueberries ordinary potting mix, or regular tap water, which the RHS says raises the pH over time; use rainwater where you can.',
							'Keeping strawberry plants long after they stop cropping well.',
						)
					),
			),
		),
	),
);
