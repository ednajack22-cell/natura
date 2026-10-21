<?php
/**
 * Starter guides, batch 6 (berries and figs): a blueberry bush, a compact
 * raspberry and a fig tree in containers.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011), only where
 * the RHS agrees; see design/sources/BACKYARD-HARVEST.md. The 'months' data
 * is the UK calendar. These guides carry no 'timing': the US extension pages
 * checked give planting advice by season, not in weeks from the last frost.
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
	'name'   => __( 'Berries and figs', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'blueberries-in-pots'  => array(
				'title'   => 'How to Grow Blueberries in Pots',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'balcony', 'patio' ),
				'months'  => array(
					'plant'   => array( 10, 11, 12, 1, 2, 3 ),
					'harvest' => array( 7, 8, 9 ),
				),
				'excerpt' => 'Blueberries need acid conditions, so a pot of peat-free ericaceous (acid) potting mix watered with rainwater is often the easiest way to grow them. Start a young bush in a container 12 in (30 cm) across, give it sun or light shade, and pick the berries from midsummer into early fall.',
				'facts'   => array(
					'short_name'     => 'Blueberry',
					'botanical_name' => 'Vaccinium corymbosum and hybrids',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun for the best crop; a fair crop in partial shade',
					'pot_size'       => '12 in (30 cm) across for a young bush; 18–20 in (45–50 cm) for a larger one',
					'hardiness'      => 'H6 (\'Sunshine Blue\', \'Duke\'); H7 (\'Bluetta\')',
					'watering'       => 'Rainwater, enough to keep the potting mix slightly moist',
					'harvest'        => 'Midsummer to early fall, over several weeks',
					'season'         => 'Plant from mid-fall to early spring, while dormant',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Blueberries want an acid root run with a pH of 4.5 to 5.5: fill the pot with soil-based, peat-free ericaceous potting mix.' ),
						array( 'point' => 'Water with rainwater from a rain barrel; hard tap water slowly makes the potting mix less acid.' ),
						array( 'point' => 'From spring to late summer, give a liquid fertilizer made for acid-loving plants every two or three weeks, and no more.' ),
						array( 'point' => 'One bush will fruit, but two or three different varieties side by side give heavier crops.' ),
						array( 'point' => 'After the second year, prune in late winter so that a third of the stems are old, a third middle-aged and a third young.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Sunshine Blue', 'note' => 'Named by the RHS as a compact variety for pots. A semi-evergreen bush about 1½–3 ft (0.5–1 m) tall, rated H6.' ),
						array( 'name' => 'Bluetta', 'note' => 'Named by the RHS as a compact variety for pots. A deciduous, spreading bush about 1½–3 ft (0.5–1 m) tall, rated H7.' ),
						array( 'name' => 'Duke', 'note' => 'RHS Award of Garden Merit. It flowers late but crops early, so the RHS suggests it for colder areas.' ),
						array( 'name' => 'Spartan', 'note' => 'RHS Award of Garden Merit. Large, sweet berries early to mid-season.' ),
						array( 'name' => 'Pink Lemonade', 'note' => 'Mentioned by the RHS for its pink berries, a change from the usual blue.' ),
						array( 'name' => 'Northsky, Chippewa, Northcountry', 'note' => 'Half-high blueberries that the RHS picks out as particularly good in pots.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot 12 in (30 cm) across, then 18–20 in (45–50 cm), with drainage holes', 'badge' => '', 'note' => 'Start small and move the bush up as it grows.', 'url' => '' ),
						array( 'name' => 'Soil-based, peat-free ericaceous potting mix', 'badge' => '', 'note' => 'Keeps the roots in the acid range blueberries need.', 'url' => '' ),
						array( 'name' => 'Rain barrel', 'badge' => '', 'note' => 'Rainwater does not push up the pH as hard tap water does.', 'url' => '' ),
						array( 'name' => 'Liquid fertilizer for acid-loving plants', 'badge' => '', 'note' => 'Every two or three weeks from spring to late summer.', 'url' => '' ),
						array( 'name' => 'Composted pine bark', 'badge' => '', 'note' => 'A low-pH mulch for the top of the pot in late winter.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Can I water my blueberry with tap water?', 'answer' => 'Only if there is no other choice, for example in a drought when the rain barrel is empty. Tap water is usually alkaline, especially in hard water areas, and used week after week it raises the pH of the potting mix. Rainwater keeps it acid.' ),
						array( 'question' => 'Do I need more than one blueberry bush to get fruit?', 'answer' => 'No. Most blueberries are partially self-fertile, so a single bush will crop. Plants that are cross-pollinated give larger harvests, though, so if you have room for two or three pots, choose different varieties.' ),
						array( 'question' => 'Which blueberry stays small enough for a balcony?', 'answer' => 'The RHS names \'Sunshine Blue\' and \'Bluetta\' as compact varieties that suit containers; both reach about 1½–3 ft (0.5–1 m). It also picks out the half-high blueberries \'Northsky\', \'Chippewa\' and \'Northcountry\' for pots.' ),
						array( 'question' => 'Should I protect blueberry flowers from frost?', 'answer' => 'Yes, if a late frost is forecast while the bush is in flower. Move the pot under cover for the night, or drape it with row cover or an old bedsheet, then uncover it in the morning so insects can visit the flowers.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow blueberries', 'url' => 'https://www.rhs.org.uk/fruit/blueberries/grow-your-own' ),
						array( 'title' => 'RHS — Fruit in containers', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/containers' ),
						array( 'title' => 'RHS — Vaccinium \'Sunshine Blue\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/216497/vaccinium-sunshine-blue-(f)/details' ),
						array( 'title' => 'RHS — Vaccinium corymbosum \'Bluetta\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/46036/vaccinium-corymbosum-bluetta-(f)/details' ),
						array( 'title' => 'RHS — Vaccinium corymbosum \'Duke\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/57014/duke-agm/details' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Why blueberries suit a pot' ) .
					$p( 'Blueberries only thrive with their roots in acid conditions, ideally between pH 4.5 and 5.5. Most garden soil is not that acid, but a container lets you give the plant exactly what it wants. The bushes are also good-looking all year: white, bell-shaped flowers in spring that pollinators love, blue fruit in summer, and on deciduous varieties, orange, red and purple fall leaves.' ) .
					$p( 'Most blueberries are partially self-fertile, so one bush will fruit on its own. If you have space for more pots, grow two or three different varieties together for bigger harvests.' ) .

					$h2( 'Which pot, potting mix and spot' ) .
					$p( 'Give a young bush a container at least 12 in (30 cm) across, and move it on to one 18–20 in (45–50 cm) across once it is larger. Fill with a soil-based, peat-free ericaceous (acid) potting mix. Do not use ordinary all-purpose potting mix or add manure or mushroom compost: both make the mix less acid. For a closer look at what container potting mix does, see <a href="/potting-mix-for-containers/">potting mix for containers</a>.' ) .
					$p( 'Pick a sheltered position in sun or light shade. A bush in partial shade still gives a reasonable crop, but full sun means more berries and brighter fall color.' ) .

					$h2( 'Planting a blueberry' ) .
					$p( 'The bush settles in best while it is dormant, from mid-fall to early spring. Potted plants can go in at other times too, but not during hot, dry spells or when the potting mix is frozen. Set the plant so the roots are only just covered, firm the potting mix lightly and water it in with rainwater.' ) .

					$h2( 'Rainwater, feed and an acid mulch' ) .
					$p( 'In a pot, a blueberry needs regular watering to keep the potting mix slightly moist. Use rainwater from a rain barrel. Tap water is usually alkaline, particularly in hard water areas, and if you use it all the time it gradually raises the pH of the potting mix. Keep tap water for a drought when there is nothing else. For how often to check pots in general, see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .
					$p( 'From spring to late summer, give a liquid fertilizer made for acid-loving plants every two or three weeks. Do not overdo it: blueberries dislike too much fertilizer. In late winter or early spring, spread a 2–3 in (5–7.5 cm) layer of low-pH organic matter on top of the potting mix, such as composted or chipped pine bark, composted pine needles or leaf mold. It helps hold the moisture in and keeps conditions acid.' ) .

					$h2( 'Frost on the flowers, and winter' ) .
					$p( 'The RHS rates blueberries as hardy in the UK, but in colder areas a late frost can damage the flowers. When frost is forecast during flowering, move the pot under cover overnight, or cover the bush with row cover or an old bedsheet, and remove it in the morning so pollinating insects can get in.' ) .
					$p( 'Bushes in pots can suffer in a very cold or very wet winter. If heavy rain keeps the potting mix sodden, move the pot somewhere more sheltered, such as against the house wall under the eaves. For wrapping and grouping pots in a freeze, see <a href="/protect-pots-in-winter/">how to protect pots in winter</a>.' ) .

					$h2( 'Pruning: keep a mix of old and young stems' ) .
					$p( 'In the first two years, prune only to remove crossing or damaged branches. After that, prune while the bush is dormant, from late fall to early spring, ideally in late winter. By then you can tell the buds apart: fat buds will flower and fruit, while small, flat ones make leaves and shoots. Keep branches with plenty of fat buds.' ) .
					$p( 'A mature bush should be made up of roughly one third old stems, one third middle-aged stems and one third young stems. Each year, take out:' ) .
					$list(
						array(
							'dead, diseased, damaged, weak or rubbing stems, and any that touch the ground;',
							'the twiggy tips of branches that fruited last year, cut back to a low, strong bud facing upwards;',
							'up to a quarter of the oldest, thickest stems, cut at the base or just above a strong young shoot low down, so that new stems come up from below.',
						)
					) .

					$h2( 'Picking blueberries and keeping birds off' ) .
					$p( 'Berries begin to ripen from midsummer and turn from green to a dusky blue when they are ready. They do not all ripen together, so look over the bush regularly for several weeks and pull ripe berries off one at a time.' ) .
					$p( 'Birds find blueberries as quickly as you do. Once the fruit colors, stretch plastic-free or reused netting over canes or poles above the bush, pulled tight and fixed firmly so no bird or other wildlife gets caught. Pests to watch for in pots include aphids and black vine weevil; see <a href="/problems/aphids-container-plants/">aphids on container plants</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting in ordinary all-purpose potting mix instead of an ericaceous one.',
							'Watering with hard tap water all summer, so the potting mix slowly loses its acidity.',
							'Mulching with manure or mushroom compost, which are alkaline.',
							'Feeding too often or too strongly: blueberries prefer a light hand.',
							'Picking the whole bush at once: the berries ripen a few at a time.',
						)
					),
				'image_prompt' => 'A compact blueberry bush about 28 in (70 cm) tall growing in a round, dark gray glazed pot about 18 in (45 cm) across on a sunny balcony with a wooden deck, in midsummer. Small oval, smooth-edged green leaves on slender woody stems; clusters of round berries at different stages, some still green, some pinkish, most dusky blue with a pale powdery bloom. A rain barrel is softly blurred in the background. Late-afternoon sunlight, the berry clusters in sharp focus. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact blueberry bush in a dark gray glazed pot on a sunny balcony in summer, with small oval green leaves and clusters of dusky blue berries with a pale bloom, a few still green, filling the lower two thirds of the frame. The top third is calm, softly blurred pale sky and railing. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'raspberries-in-pots'  => array(
				'title'   => 'How to Grow Raspberries in Pots',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun', 'part-shade' ),
				'space'   => array( 'balcony', 'patio' ),
				'months'  => array(
					'plant'   => array( 11, 12, 1, 2, 3 ),
					'harvest' => array( 6, 7, 8, 9, 10 ),
				),
				'excerpt' => 'Choose a compact, dwarf raspberry and plant one cane in a pot at least 16 in (40 cm) wide and 12 in (30 cm) deep, in a sunny, sheltered spot. Tie the stems to stakes, water and feed through the season, and prune each year according to whether your raspberry fruits in summer or in fall.',
				'facts'   => array(
					'short_name'     => 'Raspberry',
					'botanical_name' => 'Rubus idaeus',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun; light shade gives a smaller crop',
					'pot_size'       => 'At least 16 in (40 cm) wide and 12 in (30 cm) deep',
					'hardiness'      => 'H6',
					'watering'       => 'Keep the potting mix consistently moist through the growing season',
					'harvest'        => 'Early summer to mid-fall, depending on the type',
					'season'         => 'Plant from late fall to early spring, while dormant',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Only compact varieties suit a pot; the RHS names the dwarf \'Ruby Beauty\' for containers.' ),
						array( 'point' => 'Plant a single cane in the middle of a 16 in (40 cm) pot, in two thirds peat-free all-purpose potting mix and one third soil-based potting mix.' ),
						array( 'point' => 'Push in sturdy bamboo stakes at planting time and tie the new stems to them as they grow.' ),
						array( 'point' => 'Feed once a month with an organic all-purpose liquid fertilizer from spring to fall.' ),
						array( 'point' => 'Summer-bearing types are pruned straight after picking; fall-bearing types are cut to the ground in late winter.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Ruby Beauty', 'note' => 'A dwarf variety that the RHS recommends for containers. It grows about 1½–3 ft (0.5–1 m) tall and wants full sun.' ),
						array( 'name' => 'All Gold', 'note' => 'RHS Award of Garden Merit. Fall-bearing, with sweet yellow berries; suggested by the RHS for small spaces and suitable for double cropping.' ),
						array( 'name' => 'Autumn Treasure', 'note' => 'A fall-bearing variety the RHS suggests when space is short.' ),
						array( 'name' => 'Malling Jewel', 'note' => 'RHS Award of Garden Merit. A summer-bearing variety on fairly compact plants, with large, juicy berries.' ),
						array( 'name' => 'Polka', 'note' => 'RHS Award of Garden Merit. Fall-bearing, with good flavor; stout plants that need little support.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 16 in (40 cm) wide and 12 in (30 cm) deep, with drainage holes', 'badge' => '', 'note' => 'Room for a single cane.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix and soil-based potting mix', 'badge' => '', 'note' => 'Mix two parts all-purpose to one part soil-based.', 'url' => '' ),
						array( 'name' => 'Sturdy bamboo stakes and soft twine', 'badge' => '', 'note' => 'To hold the stems upright in wind.', 'url' => '' ),
						array( 'name' => 'Organic all-purpose liquid fertilizer', 'badge' => '', 'note' => 'Once a month in the growing season.', 'url' => '' ),
						array( 'name' => 'Certified virus-free raspberry plant', 'badge' => '', 'note' => 'Raspberries catch viruses easily, so start clean.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Are summer-bearing or fall-bearing raspberries better in a pot?', 'answer' => 'Fall-bearing raspberries are generally smaller and less vigorous, at about 4–5 ft (1.2–1.5 m), easier to prune, and fruit in their first year. Summer-bearing types usually reach about 6 ft (1.8 m) and fruit from their second summer. For a container, a dwarf variety such as \'Ruby Beauty\' is the safest choice.' ),
						array( 'question' => 'Does one raspberry plant produce fruit on its own?', 'answer' => 'Yes. Raspberries are self-fertile, so a single plant in a pot will crop without a partner.' ),
						array( 'question' => 'What are the dry, brown patches on my raspberries?', 'answer' => 'Probably raspberry beetle. Its grubs feed at the stalk end of the fruit, leaving grayish-brown dried patches, and may be found inside. The RHS suggests tolerating some damage, as often only part of the crop is affected and later berries suffer less, and encouraging birds, hedgehogs and ground beetles that eat the pest.' ),
						array( 'question' => 'How long will a raspberry plant keep cropping?', 'answer' => 'With good care and the right pruning, raspberries keep fruiting well for up to ten years. Start with plants certified free of viruses, as infected canes lose vigour and crop poorly.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow raspberries', 'url' => 'https://www.rhs.org.uk/fruit/raspberries/grow-your-own' ),
						array( 'title' => 'RHS — Raspberry beetle', 'url' => 'https://www.rhs.org.uk/biodiversity/raspberry-beetle' ),
						array( 'title' => 'RHS — Rubus idaeus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/16137/rubus-idaeus/details' ),
						array( 'title' => 'RHS — Rubus idaeus [Ruby Beauty]', 'url' => 'https://www.rhs.org.uk/plants/347371/rubus-idaeus-ruby-beauty-nr7-(f)/details' ),
					),
				),
				'content' =>
					$h2( 'Summer-bearing or fall-bearing raspberries?' ) .
					$p( 'Raspberries come in two groups, and the difference matters for pruning. Summer-bearing raspberries (floricanes) crop on stems that grew the year before; they usually reach about 6 ft (1.8 m) and start fruiting in their second summer. Fall-bearing raspberries (primocanes) crop on stems that grew the same year; they are usually 4–5 ft (1.2–1.5 m) tall, less vigorous and fruit in their first year.' ) .
					$p( 'In a container, size is what counts. The RHS recommends a compact, dwarf variety such as \'Ruby Beauty\', which stays at about 1½–3 ft (0.5–1 m). Raspberries are self-fertile, so one plant is enough. Check the label to see which group your variety belongs to before you prune.' ) .

					$h2( 'Pot, potting mix and position' ) .
					$p( 'Use a pot at least 16 in (40 cm) wide and 12 in (30 cm) deep. Fill it with a blend of about two thirds peat-free all-purpose potting mix and one third soil-based mix (a peat-free John Innes No. 3 if you garden in the UK). Why the two are combined is explained in <a href="/potting-mix-for-containers/">potting mix for containers</a>.' ) .
					$p( 'Sun gives the best crop. Raspberries still fruit in light shade, but the plants are smaller, less healthy and give fewer berries. Shelter matters on a balcony: strong wind keeps pollinating insects away and can snap the thin side-branches that carry the fruit.' ) .

					$h2( 'Planting one cane' ) .
					$p( 'Plant while the cane is dormant, from late fall to early spring, when the potting mix is not frozen; late fall is a good moment. Buy plants certified as virus-free. Set a single cane in the center of the pot at the depth it grew before, using the old soil mark on the stem as a guide. Push in sturdy bamboo stakes for support at the same time, and tie in new stems as they grow.' ) .
					$p( 'Most newly planted raspberries should be cut down to 10 in (25 cm) straight away. The exception is summer-bearing raspberries sold as \'long canes\': leave those unpruned, or you lose that summer\'s fruit.' ) .

					$h2( 'Water and feed' ) .
					$p( 'Raspberries have shallow roots, and in a pot they rely on you. Through the growing season keep the potting mix consistently moist, ideally with rainwater from a rain barrel, especially in hard water areas, and water in the cooler part of the day, preferably the morning. For the general routine, see <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .
					$p( 'Feed once a month during the growing season with an organic all-purpose liquid fertilizer.' ) .

					$h2( 'How to prune each type' ) .
					$p( 'Left alone, a raspberry turns into a thicket and spreads by suckers. Prune once a year:' ) .
					$list(
						array(
							'<strong>Summer-bearing:</strong> as soon as you finish picking, cut every stem that has fruited down to the level of the potting mix. Keep the strongest new green stems from this year, the RHS suggests six to eight per plant, tie them to the stakes about 4 in (10 cm) apart, and cut out the rest. These carry next summer\'s crop. If any are taller than the support, loop them over and tie them, then trim them back to a bud in late winter.',
							'<strong>Fall-bearing:</strong> in late winter, cut all the old stems to the level of the potting mix. New ones appear in late winter or early spring and fruit later that year. In early summer, thin crowded stems so the rest are about 4 in (10 cm) apart.',
							'<strong>Suckers:</strong> pull out any new canes that come up where you do not want them.',
						)
					) .
					$p( 'Established fall-bearing raspberries growing strongly can be pruned for two crops: in late winter, keep six to eight of the strongest stems and remove only their top part, which fruited; cut the rest to the base. The shortened stems give a modest crop in summer, after which you cut them down, and the new stems crop in fall. The RHS names \'Joan J\' and \'Polka\' as good for this.' ) .

					$h2( 'When and how to pick' ) .
					$p( 'Early summer-bearing varieties ripen from early summer, later ones into early fall. Fall-bearing raspberries start in late summer and often carry on well into fall. Pick often, on a dry day, when the berries are richly colored, plump and come away with a gentle pull: damp fruit soon goes moldy. Lay them in a shallow bowl only two or three layers deep so the bottom ones are not crushed.' ) .
					$p( 'If birds or squirrels raid the plant, cover it with plastic-free or reused netting raised on stakes, kept taut so no animal is trapped.' ) .

					$h2( 'Pests and problems' ) .
					$list(
						array(
							'<strong>Raspberry beetle:</strong> in the UK, the adults lay eggs on the flowers from late spring to midsummer, and the grubs leave dry, grayish-brown patches at the stalk end of ripe berries. The RHS advises accepting a little damage: later berries are usually less affected, and birds, hedgehogs and ground beetles all help keep numbers down.',
							'<strong>Viruses:</strong> stunted, distorted plants. Aphids and other sap-sucking insects spread them, so remove affected plants quickly and only take new plants from recently bought, certified stock.',
							'<strong>Magnesium deficiency:</strong> leaves yellow between the veins, sometimes with reddish-brown tints. See <a href="/problems/yellow-leaves-container-plants/">yellow leaves on container plants</a>.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Putting a full-size summer-bearing raspberry in a pot: choose a dwarf or compact variety.',
							'Pruning both types the same way: summer-bearing types lose last year\'s stems after picking, fall-bearing types lose everything in late winter.',
							'Cutting back \'long canes\' at planting, which removes the first summer\'s fruit.',
							'Picking wet berries, which go moldy quickly.',
							'Taking suckers from old plants: viruses travel with them.',
						)
					),
				'image_prompt' => 'A compact raspberry plant about 32 in (80 cm) tall growing in a large charcoal-gray plastic pot about 16 in (40 cm) wide on a sunny, sheltered balcony in midsummer. Upright green canes are tied to two bamboo stakes with soft twine. The leaves are compound, with three to five oval, toothed leaflets, mid-green on top and paler underneath. Ripe, plump red raspberries and a few unripe pale green ones hang from short side-branches. A small shallow bowl holds freshly picked berries on the decking beside the pot. Morning sun, the fruit in sharp focus. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a compact raspberry plant in a large pot on a sunny balcony in summer, its canes tied to bamboo stakes, with toothed compound leaves and ripe red raspberries in the lower two thirds of the frame. The top third is calm, softly blurred pale wall and sky. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),

			'fig-tree-in-pot'      => array(
				'title'   => 'How to Grow a Fig Tree in a Pot',
				'type'    => 'fruit',
				'sun'     => array( 'full-sun' ),
				'space'   => array( 'balcony', 'patio' ),
				'months'  => array(
					'plant'   => array( 3, 4 ),
					'harvest' => array( 7, 8, 9 ),
				),
				'excerpt' => 'A fig crops better with its roots held in, which makes a pot a good home for it: start with one about 1 ft (30 cm) wide and deep, in the warmest, sunniest spot you have. In a cool climate such as the UK, only the tiny figs that form at the shoot tips in late summer ripen the next year, so protect them from frost over winter and remove larger unripe fruit in fall.',
				'facts'   => array(
					'short_name'     => 'Fig',
					'botanical_name' => 'Ficus carica',
					'difficulty'     => 'Moderate',
					'sun'            => 'Full sun, warm and sheltered; ideally against a south-facing wall',
					'pot_size'       => 'About 1 ft (30 cm) wide and deep at first, then only slightly larger every couple of years',
					'hardiness'      => 'H4',
					'watering'       => 'A steady supply in the growing season; check daily in hot weather',
					'harvest'        => 'Midsummer to early fall, as single ripe fruits',
					'season'         => 'Plant in spring',
				),
				'lists'   => array(
					'key_points' => array(
						array( 'point' => 'Restricted roots mean fewer leaves and more fruit, so do not move a fig into a pot much bigger than the last one.' ),
						array( 'point' => 'Use a good-quality, peat-free, soil-based potting mix and stand the pot in full sun against a warm wall.' ),
						array( 'point' => 'Feed every two weeks with an organic high-potassium liquid fertilizer until the figs begin to ripen.' ),
						array( 'point' => 'Keep the pea-sized fruitlets at the shoot tips safe from hard frost: they are next year\'s crop.' ),
						array( 'point' => 'Prune in spring and pinch out shoot tips in early summer, then stop by midsummer.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Little Miss Figgy', 'note' => 'Described by the RHS as a compact variety, ideal for containers, with sweet, burgundy figs. Rated H4.' ),
						array( 'name' => 'Brown Turkey', 'note' => 'RHS Award of Garden Merit. The best-known fig in the UK, listed by the RHS as suited to pots. Rated H4.' ),
						array( 'name' => 'White Marseilles', 'note' => 'Hardy and reliable according to the RHS, with large, sweet, pale green figs; listed as suited to pots. Rated H4.' ),
						array( 'name' => 'Brunswick', 'note' => 'Listed by the RHS among the figs suited to containers.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot about 1 ft (30 cm) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Move up only a little at a time: figs fruit better when slightly cramped.', 'url' => '' ),
						array( 'name' => 'Peat-free, soil-based potting mix', 'badge' => '', 'note' => 'Holds its structure for years in a pot.', 'url' => '' ),
						array( 'name' => 'Organic high-potassium liquid fertilizer', 'badge' => '', 'note' => 'Every two weeks until the fruit starts to ripen.', 'url' => '' ),
						array( 'name' => 'Row cover or burlap', 'badge' => '', 'note' => 'For wrapping the tree if it cannot go under cover in winter.', 'url' => '' ),
						array( 'name' => 'Gardening gloves', 'badge' => '', 'note' => 'Fig sap irritates skin, especially in sunlight.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Why is my fig covered in hard green fruit that never ripens?', 'answer' => 'In a cool climate such as the UK, a fig carries two sets of fruit. Those that form on new shoots in late spring and early summer rarely have time to ripen outdoors: they stay hard and green. Remove any bigger than a pea in mid-fall. Only the pea-sized figs at the shoot tips survive winter and ripen the following summer.' ),
						array( 'question' => 'Does a fig tree need a pollinator?', 'answer' => 'No. The figs grown in the UK develop without fertilization, so a single tree crops on its own.' ),
						array( 'question' => 'Why is my potted fig dropping its fruit in spring?', 'answer' => 'Usually because the potting mix dried out. Figs in containers need regular watering from spring onwards; a tree that goes short can shed both fruit and leaves.' ),
						array( 'question' => 'Where should a potted fig spend the winter?', 'answer' => 'In fall, move it into an unheated greenhouse, shed or porch and keep it there until all danger of frost has passed in spring. If it has to stay outside, wrap it to protect the tiny fruitlets at the shoot tips, which carry next year\'s crop.' ),
						array( 'question' => 'How can I tell when a fig is ripe?', 'answer' => 'The skin turns soft and the fruit hangs limply from the branch. It may split when squeezed gently, or show a drop of sugary liquid at the eye, the small opening at the base. Figs do not ripen further once picked, so wait for these signs.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow figs', 'url' => 'https://www.rhs.org.uk/fruit/figs/grow-your-own' ),
						array( 'title' => 'RHS — Fig pruning and training', 'url' => 'https://www.rhs.org.uk/fruit/figs/fig-pruning-and-training' ),
						array( 'title' => 'RHS — Fruit in containers', 'url' => 'https://www.rhs.org.uk/fruit/fruit-trees/containers' ),
						array( 'title' => 'RHS — Ficus carica \'Brown Turkey\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/56327/ficus-carica-brown-turkey-(f)/details' ),
						array( 'title' => 'RHS — Ficus carica [Little Miss Figgy]', 'url' => 'https://www.rhs.org.uk/plants/387720/little-miss-figgy-lmf01-pbr/details' ),
						$book,
					),
				),
				'content' =>
					$h2( 'Why a fig does well in a container' ) .
					$p( 'Left to grow freely, a fig becomes a large, leafy tree with big, hand-shaped leaves and not much fruit. Holding its roots in check slows the leafy growth and pushes the plant into fruiting, and a pot does exactly that. A potted fig can be kept as a small bush, a standard on a clear stem or a multi-stemmed shrub, and in cooler areas the pot can be moved under cover for winter. No pollinator is needed: the figs develop without fertilization.' ) .

					$h2( 'How figs fruit in a cool climate' ) .
					$p( 'Understanding this saves most of the disappointment. In a cool climate such as the UK, a fig produces two crops, but outdoors only one usually ripens:' ) .
					$list(
						array(
							'<strong>The crop you eat</strong> starts in late summer as tiny embryo figs at the tips of the shoots. They stay pea-sized through winter, grow on in spring and ripen the following summer. Because they sit at the shoot tips, frost can kill them.',
							'<strong>The second crop</strong> forms on new shoots in late spring and early summer. Outdoors it seldom ripens and stays hard and green. Remove any of these larger than a pea in mid-fall: they will not ripen the next year either.',
						)
					) .

					$h2( 'Pot, potting mix and position' ) .
					$p( 'Start a young tree in a pot around 1 ft (30 cm) wide and deep, filled with good-quality, peat-free, soil-based potting mix (UK gardeners can use a peat-free John Innes No. 3); see <a href="/potting-mix-for-containers/">potting mix for containers</a> for why soil-based mixes last longer. Spring is the best time to plant, so the tree has a whole season to settle.' ) .
					$p( 'Figs need warmth and sun to ripen their fruit. Choose the warmest, most sheltered place you have, ideally in front of a south-facing wall, which gives off heat.' ) .
					$p( 'Every couple of years in early spring, repot into a container only slightly larger than the last; a fig that is overpotted fruits less. When the pot is as large as you can move, keep it, but each repotting time remove the loose potting mix, trim the roots lightly and refill with fresh. In the years in between, swap the top layer of potting mix for new.' ) .

					$h2( 'Watering and feeding' ) .
					$p( 'A fig needs a steady supply of moisture from spring to fall. Pot-grown trees dry out quickly, so check daily in hot, dry weather and keep the potting mix evenly moist; a thirsty fig sheds leaves and fruit. Too much water does harm as well, so never leave the pot standing in a saucer of water, least of all in winter. General routines are in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .
					$p( 'Every two weeks through the growing season, give an organic, high-potassium liquid fertilizer, such as a tomato fertilizer, and stop once the figs begin to ripen in late summer. Overfeeding only produces more leaves.' ) .

					$h2( 'Getting the fruitlets through winter' ) .
					$p( 'The mature wood of most figs copes with frost, but hard frost damages the young shoot tips and the fruitlets on them, which would ruin next year\'s crop. In fall, move a potted fig into an unheated greenhouse, shed or porch, and bring it out again once all danger of frost has passed in spring. If that is not possible, wrap the branches in straw or bracken held in place with row cover or burlap. General advice on pots in cold weather is in <a href="/protect-pots-in-winter/">how to protect pots in winter</a>.' ) .

					$h2( 'Pruning a fig bush in a pot' ) .
					$p( 'Prune twice a year. Wear gloves: the sap irritates skin, and the RHS notes it is harmful to skin in sunlight. Work from the bottom of the tree upwards so it does not drip on you.' ) .
					$list(
						array(
							'<strong>In spring</strong>, once hard frosts are over but before growth starts, cut frost-damaged, crossing or weak branches back to 1 in (2.5 cm) stubs. On older trees, cut one or two long, bare branches back to 2–3 in (5–8 cm) stubs so new shoots grow from low down. Remove branches entirely where you want no regrowth, such as in a crowded center. Keep the shoots that carry tiny fruitlets.',
							'<strong>In early summer</strong>, pinch out the tips of young shoots once they have five or six leaves. This makes the tree branch and form embryo figs at the new tips.',
							'<strong>From midsummer</strong>, stop pruning. Shoots that grow after that have no time to form fruit for next year.',
						)
					) .

					$h2( 'Harvesting and protecting ripe figs' ) .
					$p( 'Most trees ripen one crop at the end of summer. A fig is ready when the skin is soft and it hangs limply; it may split if squeezed gently or show a drop of sweet liquid at the eye. It will not ripen further once picked, so be patient. Hold the stalk and pull the fruit away from the branch, then eat it soon after.' ) .
					$p( 'As soon as the fruit starts to ripen, birds and squirrels take an interest. Cover the tree with plastic-free or reused netting, held off the fruit with canes and kept taut. Figs are usually healthy, although the fig leaf skeletoniser, a caterpillar that rolls and grazes the leaves, has been established in the UK since 2014, and under glass scale insects and spider mites can appear.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Moving a fig into a much bigger pot: it grows leaves instead of fruit.',
							'Pruning after midsummer, which removes the shoots that would carry next year\'s figs.',
							'Leaving large green figs on in fall: they will not ripen and only the pea-sized ones matter.',
							'Leaving the pot outside unprotected in a hard frost, so the fruitlets are killed.',
							'Picking too early: figs do not ripen off the tree.',
						)
					),
				'image_prompt' => 'A small bush-trained fig tree about 4 ft (1.2 m) tall in a large, frost-proof terracotta pot about 18 in (45 cm) wide, standing in front of a warm, south-facing brick wall on a sunny patio in late summer. Large, deeply lobed, hand-shaped leaves with three to five rounded lobes, rough and mid-green; several pear-shaped figs, some soft and purple-brown and hanging limply, others still green. A sharp close focus on a ripe fig with a tiny drop of liquid at its base. Warm late-afternoon light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
				'pin_prompt'   => 'Vertical photograph of a small fig tree in a terracotta pot against a sunny brick wall in late summer, with large lobed, hand-shaped leaves and ripe purple-brown, pear-shaped figs in the lower two thirds of the frame. The top third is calm, softly blurred warm brick wall. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			),
		),
	),
);
