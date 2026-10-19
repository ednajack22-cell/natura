<?php
/**
 * Starter guides, batch 3: Mediterranean herbs and cilantro for pots
 * (thyme, rosemary, sage, cilantro).
 *
 * Facts from the RHS pages listed in each guide (checked 18 October 2026),
 * with hardiness ratings taken only from the RHS plant pages. The cilantro
 * pot size comes from University of Wisconsin-Madison Extension, because the
 * RHS gives none. Jo Whittingham, Backyard Harvest (DK, 2011), pages 64-65,
 * is used only where the RHS agrees. The 'timing' data (weeks from the last
 * spring frost) comes from University of Minnesota Extension (thyme,
 * rosemary, sage) and University of Illinois Extension (cilantro), checked
 * 18 October 2026. The 'months' data is the UK calendar.
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

$herb_pots = array(
	'title' => 'RHS — Herbs in containers',
	'url'   => 'https://www.rhs.org.uk/herbs/containers',
);

$umn_herbs = array(
	'title' => 'University of Minnesota Extension — Growing herbs in home gardens',
	'url'   => 'https://extension.umn.edu/garden-and-home/yard-and-garden/gardening-in-minnesota/growing-herbs',
);

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Mediterranean herbs and cilantro', 'natura-core' ),
	'guides' => array(
		'plant' => array(
			'thyme-in-pots'     => array(
				'title'        => 'How to Grow Thyme in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'start_indoors' => array( -8, -6 ),
					'plant_out'     => array( 0, 0 ),
				),
				'excerpt'      => 'One thyme plant needs only a small pot, at least 6 in (15 cm) across and 4 in (10 cm) deep, filled with gritty, peat-free, soil-based potting mix and set in the hottest, brightest corner you have. Snip it all year, trim it lightly in spring and after flowering, and keep winter rain off the pot.',
				'facts'        => array(
					'short_name'     => 'Thyme',
					'botanical_name' => 'Thymus vulgaris',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, the warmer the better',
					'pot_size'       => 'At least 6 in (15 cm) wide and 4 in (10 cm) deep per plant',
					'hardiness'      => 'H5',
					'watering'       => 'Rarely; only in hot, dry spells once settled',
					'harvest'        => 'All year; tastiest from late spring to summer',
					'season'         => 'Evergreen perennial; plant out after your last spring frost, from mid-spring to early summer',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'A pot 6 in (15 cm) wide and 4 in (10 cm) deep is enough for one thyme, as long as the base has plenty of holes.' ),
						array( 'point' => 'Bushy types such as common thyme are easier to pick from than low, creeping ones.' ),
						array( 'point' => 'Too much water is a bigger risk than too little: the roots rot in damp potting mix.' ),
						array( 'point' => 'A topping of grit keeps the stems off wet potting mix and looks neat.' ),
						array( 'point' => 'Old plants turn woody: root a few cuttings every few years to replace them.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Common thyme (Thymus vulgaris)', 'note' => 'RHS Award of Garden Merit. A bushy, dwarf shrub up to about 1 ft (30 cm) tall with well-flavored, dark gray-green leaves. The RHS rates it H5.' ),
						array( 'name' => 'Broad-leaved thyme (Thymus pulegioides)', 'note' => 'Award of Garden Merit. Rounded leaves with a good flavor, popular in the kitchen.' ),
						array( 'name' => 'Caraway thyme (Thymus herba-barona)', 'note' => 'Award of Garden Merit. Earthy, slightly spicy leaves that taste of caraway.' ),
						array( 'name' => 'Lemon Curd', 'note' => 'Award of Garden Merit. Low-growing, with lemon-scented leaves. The RHS rates it H4, a little less hardy than common thyme.' ),
						array( 'name' => 'Sparkling Bright', 'note' => 'Award of Garden Merit. Variegated leaves edged in white.' ),
						array( 'name' => 'Snowdrift', 'note' => 'Award of Garden Merit. A low, creeping thyme with mid-green leaves and white flowers.' ),
					),
					'products'   => array(
						array( 'name' => 'Terracotta pot, 6 in (15 cm) or wider, with drainage holes', 'badge' => '', 'note' => 'Enough for one plant; a wider pot takes two or three different thymes.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'The base of the mix; stir grit into it before planting.', 'url' => '' ),
						array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Up to a quarter of the volume in the potting mix, plus a thin layer on top.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How can I get more thyme plants for free?', 'answer' => 'Root cuttings: softwood ones from new growth in spring or early summer, semi-ripe ones in summer. Or look around the edge of an established plant for low stems that have rooted where they touch the potting mix, and pot them up. Creeping, mat-forming thymes can simply be divided in spring or fall.' ),
						array( 'question' => 'Why has my thyme gone woody and bare in the middle?', 'answer' => 'Shrubby thymes become straggly after several years, especially if they are never trimmed. Cutting hard into the old wood often fails because the stems may not sprout again. Root some cuttings or layer a low stem, then replace the old plant.' ),
						array( 'question' => 'Is thyme from seed worth it?', 'answer' => 'Only if you want lots of plants, for example to fill a long trough. Seedlings can take about a year before they are big enough to pick from, and seed collected from a named variety will not come true. For one or two pots, a young plant is quicker.' ),
						array( 'question' => 'Can I eat thyme flowers?', 'answer' => 'Yes. The tiny pink, mauve or white flowers taste like the leaves and add color scattered over a salad. Bees love them too, so leave some on the plant.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow thyme', 'url' => 'https://www.rhs.org.uk/herbs/thyme/grow-your-own' ),
						array( 'title' => 'RHS — Thymus vulgaris (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/18213/thymus-vulgaris/details' ),
						array( 'title' => 'RHS — Thymus \'Lemon Curd\' (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/277282/lemon-curd/details' ),
						array( 'title' => 'RHS — Rosemary beetle', 'url' => 'https://www.rhs.org.uk/biodiversity/rosemary-beetle' ),
						$umn_herbs,
						$herb_pots,
						$book,
					),
				),
				'content'      =>
					$h2( 'Bushy or creeping: which thyme to buy' ) .
					$p( 'Garden centers sell dozens of thymes, with scents that range from classic savory to lemon, orange and caraway. They fall into two groups. Bushy kinds, such as common thyme (Thymus vulgaris), make small mounded shrubs up to about 1 ft (30 cm) tall. Creeping kinds, such as Thymus serpyllum, hug the surface and spill over the rim of a pot.' ) .
					$p( 'For cooking, choose a bushy type: the upright sprigs are much easier to cut. Creeping thymes are lovely at the edge of a mixed pot, and both groups flower in summer. Most varieties are sold only as plants, so a specialist herb nursery has the widest range.' ) .

					$h2( 'A small pot, gritty potting mix, full sun' ) .
					$p( 'Thyme is one of the few herbs happy in a small container. One plant needs a pot at least 6 in (15 cm) wide and 4 in (10 cm) deep, and the base should be well drilled with holes. A peat-free soil-based potting mix (in the UK, a peat-free John Innes No. 2) suits it; stir in horticultural grit, up to a quarter of the volume. Why grit matters, and how to refresh an old mix, is covered in <a href="/plant-care/potting-mix-for-containers/">potting mix for containers</a>.' ) .
					$p( 'Then give it the sunniest, warmest spot you have: a south- or west-facing ledge, the top step of a patio, or the front of a balcony. Finish with a thin layer of grit or fine gravel on the surface; it lifts the low stems off damp potting mix, which could otherwise make them rot. Set new plants outside once the danger of frost has passed, from mid-spring to early summer, and harden off any raised indoors first.' ) .

					$h2( 'Start thyme from seed' ) .
					$p( 'Seed is the cheap way to raise many plants, but expect to wait about a year before the first proper picking.' ) .
					$list(
						array(
							'In spring, 6–8 weeks before your last frost, fill small pots or a module tray with moist peat-free seed-starting mix.',
							'Scatter the tiny seeds thinly on the surface and leave them uncovered.',
							'Keep them somewhere bright at 59–68 °F (15–20 °C); they usually come up within a couple of weeks.',
							'Water carefully, because seedlings kept too wet can collapse (see <a href="/problems/damping-off-seedlings/">damping off</a>).',
							'Once each seedling has several leaves, move it into its own 3 in (7.5 cm) pot of soil-based potting mix, and plant it out after your last frost, when well rooted.',
						)
					) .

					$h2( 'Watering: less than you think' ) .
					$p( 'Once settled, thyme copes with drought and rarely needs a drink, except in a pot during hot, dry weather. Soggy potting mix is the real danger, above all in winter, when wet roots rot. Let the surface dry between waterings; the general routine for pots is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>. Thyme also dislikes being smothered by bigger neighbors or buried under fallen leaves, so keep it at the front of a group.' ) .

					$h2( 'Trim, pick and replace' ) .
					$p( 'Snip young shoots whenever you need them. Thyme is evergreen, so there is something to pick in every season, though the soft growth of late spring and summer has the strongest flavor. Regular cutting also keeps the plant compact.' ) .
					$p( 'Give bushy thymes a light trim in mid- to late spring, after flowering, or both. Avoid cutting into bare old wood, which may not sprout again. Creeping thymes only need the faded flowers shaved off. After several years, shrubby plants still go straggly: take softwood cuttings in spring or early summer, or semi-ripe ones in summer, and grow on a replacement. Creeping kinds can be divided in spring or fall. Thyme keeps a strong flavor when dried: see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Winter and pests' ) .
					$p( 'Common thyme is rated H5 by the RHS, so most widely sold kinds survive a UK winter outside. Check the label all the same: less hardy thymes, such as Thymus cilicicus, need a porch or greenhouse until spring. In a wet winter, stand the pot by a wall where rain does not reach. More ideas are in <a href="/plant-care/protect-pots-in-winter/">how to protect pots in winter</a>.' ) .
					$p( 'Few animals like the taste of thyme. Slugs and snails may nibble young shoots, and rosemary beetles and sage leafhoppers can mark the leaves, but the damage is rarely serious.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Watering on a schedule: water only when the potting mix has dried and the weather is hot.',
							'Using a saucer that holds water: thyme roots must never stand wet.',
							'Choosing a creeping variety for the kitchen: bushy kinds are easier to harvest.',
							'Hacking an old plant back to bare stems: replace it with a rooted cutting instead.',
							'Hiding it behind taller pots: it needs full sun and dislikes being smothered.',
						)
					),
				'image_prompt' => 'A compact, bushy common thyme plant with tiny, narrow, gray-green leaves on thin woody stems, dotted with small pale pink flowers, growing in a 6-inch terracotta pot topped with fine gray grit, on a sunny balcony ledge in warm summer light, a creeping thyme spilling over the edge of a second small pot beside it.' . $photo_end,
				'pin_prompt'   => 'A small terracotta pot of bushy thyme with tiny gray-green leaves and pale pink flowers on a sunny patio step, a few freshly snipped sprigs lying beside the pot, photographed vertically from slightly above.' . $pin_end,
			),

			'rosemary-in-pots'  => array(
				'title'        => 'How to Grow Rosemary in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5 ),
					'plant'   => array( 3, 4, 5 ),
					'harvest' => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'plant_out' => array( 0, 0 ),
				),
				'excerpt'      => 'Rosemary needs a container of 1 ft (30 cm) or more across and deep, peat-free soil-based potting mix with added grit, and a sunny position; it must never sit in waterlogged potting mix. Cut it back lightly once a year after flowering, pick sprigs in any season, and protect the pot from hard frost and winter rain.',
				'facts'        => array(
					'short_name'     => 'Rosemary',
					'botanical_name' => 'Salvia rosmarinus (formerly Rosmarinus officinalis)',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun, sheltered from cold wind',
					'pot_size'       => 'At least 1 ft (30 cm) wide and deep',
					'hardiness'      => 'H4',
					'watering'       => 'In dry spells; never let the potting mix become waterlogged',
					'harvest'        => 'Any season; softest growth in late spring and summer',
					'season'         => 'Evergreen shrub; plant in spring, after your last frost',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Allow a pot of 1 ft (30 cm) or more across and deep: rosemary is a shrub, not a small herb.' ),
						array( 'point' => 'Spring, once the danger of frost has passed and the weather warms, is the best time to pot it up.' ),
						array( 'point' => 'Pick a trailing variety to spill over a balcony edge, or an upright one for a tall pot.' ),
						array( 'point' => 'Trim once a year after flowering, but never back into old, leafless wood.' ),
						array( 'point' => 'In the UK, buy British-grown plants: rosemary is a high-risk host of the bacterial disease Xylella fastidiosa.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Foxtail', 'note' => 'RHS Award of Garden Merit. Semi-trailing, arching stems that make a low dome, with pale blue spring flowers. Rated H4.' ),
						array( 'name' => 'Miss Jessopp\'s Upright', 'note' => 'Award of Garden Merit. Vigorous, vertical growth and light blue flowers. Suits a tall pot or a clipped shape.' ),
						array( 'name' => 'Rosea', 'note' => 'Award of Garden Merit. Upright, with pale pink flowers.' ),
						array( 'name' => 'Capri', 'note' => 'A low, trailing rosemary that the RHS gives as an example of the spreading type.' ),
						array( 'name' => 'Green Ginger', 'note' => 'Grown for its distinctly gingery scent.' ),
						array( 'name' => 'Lady in White', 'note' => 'A white-flowered rosemary.' ),
					),
					'products'   => array(
						array( 'name' => 'Frost-resistant pot at least 1 ft (30 cm) wide and deep', 'badge' => '', 'note' => 'With plenty of drainage holes; the plant stays outside all year.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'Lasts for years in a pot, which suits a long-lived shrub.', 'url' => '' ),
						array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Mix in up to a quarter by volume.', 'url' => '' ),
						array( 'name' => 'Frost cloth (row cover)', 'badge' => '', 'note' => 'To throw over the plant on the coldest nights.', 'url' => '' ),
						array( 'name' => 'Hand pruners', 'badge' => '', 'note' => 'For the yearly trim and for cutting woody sprigs.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'How cold can rosemary in a pot get?', 'answer' => 'The RHS rates rosemary H4, hardy through most of the UK, and says well-established plants have survived about 18 °F (-8 °C). A pot is more exposed than the ground, because the whole root ball can freeze. Group pots together, wrap the container, and cover the plant with frost cloth, burlap or an old sheet when a hard frost is forecast.' ),
						array( 'question' => 'Why is my potted rosemary dying in winter?', 'answer' => 'Most often the potting mix is too wet. Cold, soggy roots rot. Check the drainage holes are clear, take away any saucer, and move the pot under the eaves or against a wall where rain does not reach.' ),
						array( 'question' => 'What are the shiny striped beetles on my rosemary?', 'answer' => 'Rosemary beetles: metallic insects about ¼ in (6–7 mm) long with purple and green stripes, with grayish larvae. They feed mostly from late summer to spring. Healthy plants usually cope, so the RHS suggests tolerating them, or tapping the branches over a sheet of newspaper and removing the beetles by hand.' ),
						array( 'question' => 'How long does a rosemary plant last?', 'answer' => 'Even with yearly trimming, the RHS suggests replacing rosemary with a young plant every seven or eight years, once it has turned woody and bare at the base. It roots easily from cuttings, so you can grow your own replacement.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow rosemary', 'url' => 'https://www.rhs.org.uk/herbs/rosemary/grow-your-own' ),
						array( 'title' => 'RHS — Salvia rosmarinus (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/384211/salvia-rosmarinus/details' ),
						array( 'title' => 'RHS — Salvia rosmarinus \'Foxtail\'', 'url' => 'https://www.rhs.org.uk/plants/384083/foxtail-agm/details' ),
						array( 'title' => 'RHS — Rosemary beetle', 'url' => 'https://www.rhs.org.uk/biodiversity/rosemary-beetle' ),
						$umn_herbs,
						$herb_pots,
						$book,
					),
				),
				'content'      =>
					$h2( 'Rosemary is a shrub: plan for it' ) .
					$p( 'Rosemary is an evergreen Mediterranean shrub with needle-like, aromatic leaves and small blue, mauve, pink or white flowers in spring that bees visit eagerly. You may still see it labeled Rosmarinus officinalis, its old name; botanists now call it Salvia rosmarinus. Because it is woody and long-lived, it needs a bigger, sturdier pot than soft herbs, and it can stay in that pot for several years before it needs repotting.' ) .

					$h2( 'Upright or trailing?' ) .
					$p( 'Varieties differ in shape, flower color and even scent. Upright kinds such as \'Miss Jessopp\'s Upright\' grow tall and narrow, which suits a deep pot by a door. Low, trailing kinds such as \'Capri\', or the semi-trailing \'Foxtail\', arch over the rim and look good at the front of a balcony. \'Rosea\' has pale pink flowers, \'Lady in White\' white ones, and \'Green Ginger\' smells of ginger.' ) .
					$p( 'Rosemary is sold all year, from small plug plants to shrubs in nursery pots of about ½–¾ gallon (2–3 litres). In the UK, choose British-grown plants where you can: the RHS lists rosemary as a high-risk host of Xylella fastidiosa, a bacterial disease, and buying home-grown stock reduces the risk of bringing it in. Seed is available too, but plants take several years to reach picking size.' ) .

					$h2( 'Pot it up in spring' ) .
					$p( 'Spring, once the danger of frost has passed and the weather starts to warm, is the best moment to plant. Go for a container that measures 1 ft (30 cm) or more both across and in depth, drilled with several holes underneath. Fill it with peat-free soil-based potting mix blended with horticultural grit, up to a quarter of the volume. Set the plant so the top of its root ball is only just covered. Stand the pot in full sun; a spot sheltered from cold winds keeps the foliage in better shape through winter.' ) .

					$h2( 'Water and feed' ) .
					$p( 'In the ground, established rosemary hardly ever needs watering. In a container the potting mix dries fast in hot, sunny weather, so water during dry spells, especially in the first year, but never leave it waterlogged. The basics are in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>. After a year or more in the same pot, scatter a little general-purpose granular fertilizer on the surface in late spring or early summer.' ) .

					$h2( 'Prune once a year, after flowering' ) .
					$p( 'Left alone, rosemary grows leggy and woody with a bare base. Each year, once the flowers fade, trim it back lightly to keep it bushy and full of fresh shoots. Stay within the leafy growth: old wood rarely regrows, and a heavily pruned plant usually does not recover. Upright varieties can be clipped into a neat shape.' ) .
					$p( 'Because old plants decline, root a few cuttings every so often: softwood cuttings from new growth in late spring or summer, or semi-ripe cuttings in summer. Low stems can also be pegged into a pot of potting mix in spring or fall to root while still attached.' ) .

					$h2( 'Pick sprigs any time' ) .
					$p( 'Rosemary keeps its leaves all year, so you can cut a sprig whenever a recipe calls for it. Shoots made in late spring and summer are softer and taste better than old, tough ones. Cut evenly around the plant so it keeps a good shape. The woody stems dry well; the method is in <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Get it through winter' ) .
					$p( 'Rosemary is rated H4, hardy through most of the UK, yet harsh frost and cold wind can still burn the shoots or kill a young plant. A pot is the weak point, since the potting mix and roots can freeze solid in a long cold spell. Group pots together, wrap the container in old blankets or reused bubble wrap, and throw frost cloth, burlap or an old sheet over the plant when a severe frost is due. Rain is the other enemy: move the pot into the rain shadow of a building, even in a mild winter. See also <a href="/plant-care/protect-pots-in-winter/">how to protect pots in winter</a>.' ) .

					$h2( 'Rosemary beetle and other pests' ) .
					$p( 'The rosemary beetle is a shiny insect about ¼ in (6–7 mm) long, striped metallic purple and green; its grayish larvae have darker stripes. Both eat the leaves and flowers, mostly from late summer to spring, and also feed on sage, thyme and lavender. Healthy plants usually shrug it off, so the RHS advises tolerating it. To keep numbers down, hold a sheet of newspaper under the plant, tap the branches and pick up what falls. Sage leafhoppers, which leave pale mottling, scale insects and the harmless froth of spittlebugs may also turn up.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Using a small herb pot: rosemary needs at least 1 ft (30 cm) of width and depth.',
							'Leaving the pot in winter rain: cold, wet roots rot.',
							'Cutting back into bare wood: the stems seldom regrow.',
							'Skipping the yearly trim: the plant becomes leggy and bare at the base.',
							'Keeping one plant forever: replace it with a rooted cutting after seven or eight years.',
						)
					),
				'image_prompt' => 'An upright rosemary shrub about 2 ft tall with dense, dark green, needle-like leaves that are silvery underneath and a scattering of small pale blue flowers, growing in a 14-inch frost-resistant terracotta pot on a sunny patio against a warm brick wall in spring.' . $photo_end,
				'pin_prompt'   => 'A trailing rosemary with arching stems of dark green needle-like leaves and small pale blue flowers spilling over a tall gray pot on a sunny balcony, a pair of hand pruners and a few cut sprigs on the floor beside it, photographed vertically.' . $pin_end,
			),

			'sage-in-pots'      => array(
				'title'        => 'How to Grow Sage in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun' ),
				'space'        => array( 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 3, 4, 5 ),
					'plant'   => array( 3, 4, 5 ),
					'harvest' => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'start_indoors' => array( -8, -6 ),
					'plant_out'     => array( 0, 0 ),
				),
				'excerpt'      => 'Culinary sage grows happily for years in a container 12 in (30 cm) or more across and as deep, in gritty peat-free soil-based potting mix, in a warm, sunny spot out of strong wind. Keep the mix just moist in summer, prune lightly each spring, and replace the plant with a cutting when it turns woody after six or seven years.',
				'facts'        => array(
					'short_name'     => 'Sage',
					'botanical_name' => 'Salvia officinalis',
					'difficulty'     => 'Easy',
					'sun'            => 'Full sun in a sheltered spot',
					'pot_size'       => 'At least 12 in (30 cm) wide and deep',
					'hardiness'      => 'H5',
					'watering'       => 'Check often in summer; slightly moist, never saturated',
					'harvest'        => 'Year round; best leaves in spring and summer',
					'season'         => 'Evergreen perennial; plant in spring, after your last frost',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Give each plant a container at least 12 in (30 cm) across and 12 in deep, with gritty peat-free soil-based potting mix.' ),
						array( 'point' => 'Shelter matters: sage wants sun and protection from strong wind.' ),
						array( 'point' => 'In summer, aim for potting mix that is slightly moist, not wet and not bone dry.' ),
						array( 'point' => 'Prune lightly every year in mid- to late spring, and cut off faded flower stems in late summer.' ),
						array( 'point' => 'Plan a replacement: sage gets woody and straggly after six or seven years.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Common sage (Salvia officinalis)', 'note' => 'RHS Award of Garden Merit. The standard culinary sage, with soft, gray-green leaves. Rated H5. Also sold as seed.' ),
						array( 'name' => 'Purpurascens (purple sage)', 'note' => 'Award of Garden Merit. Dusky purple-gray leaves and mauve-blue flowers.' ),
						array( 'name' => 'Icterina', 'note' => 'Award of Garden Merit. Leaves variegated yellow and green, with a good flavor.' ),
						array( 'name' => 'Berggarten', 'note' => 'Award of Garden Merit. Large gray-green leaves with a strong flavor, and purple-blue flowers.' ),
						array( 'name' => 'Kew Gold', 'note' => 'A compact variety, useful where space is short.' ),
						array( 'name' => 'Tricolor', 'note' => 'Variegated leaves tinged with pink.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot at least 12 in (30 cm) wide and deep, with drainage holes', 'badge' => '', 'note' => 'Room for one plant to grow for several years.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'badge' => '', 'note' => 'Holds its structure for years in a pot.', 'url' => '' ),
						array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Mix in up to a quarter by volume.', 'url' => '' ),
						array( 'name' => 'General-purpose granular fertilizer', 'badge' => '', 'note' => 'A light sprinkle once a year, from the second year.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Is pineapple sage the same as kitchen sage?', 'answer' => 'No. Several plants have sage in their name, including pineapple sage (Salvia elegans), Russian sage and Turkish sage, but the standard culinary sage is Salvia officinalis, also called common sage. Colored-leaf varieties such as \'Purpurascens\' and \'Icterina\' are forms of the same plant and can be used the same way.' ),
						array( 'question' => 'Can I pick sage in winter?', 'answer' => 'Yes, sage is evergreen. To keep the leaves in good condition through the cold months, move the pot to a sheltered spot or cover the plant with frost cloth in the worst weather. Spring and summer growth has the best flavor.' ),
						array( 'question' => 'Should I cut the flowers off my sage?', 'answer' => 'You can enjoy them first: the blue or purple summer flowers draw in bees. Then trim the faded flower stems in late summer to keep the plant tidy.' ),
						array( 'question' => 'What is the white powder on my sage leaves?', 'answer' => 'A white, dusty coating on leaves and stems is likely to be powdery mildew, a fungal disease that the RHS lists among sage problems. Pick off the worst-affected leaves; on a healthy plant in a sunny spot it is rarely serious.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow sage', 'url' => 'https://www.rhs.org.uk/herbs/sage/grow-your-own' ),
						array( 'title' => 'RHS — Salvia officinalis (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/16356/salvia-officinalis/details' ),
						array( 'title' => 'RHS — Salvia officinalis \'Purpurascens\'', 'url' => 'https://www.rhs.org.uk/plants/153600/purpurascens-agm/details' ),
						$umn_herbs,
						$herb_pots,
						$book,
					),
				),
				'content'      =>
					$h2( 'Which sage to grow' ) .
					$p( 'Culinary sage, Salvia officinalis, is a drought-tolerant evergreen shrub with soft, gray-green, finely veined leaves and an earthy, slightly peppery taste. Mature plants reach 1–3 ft (30–90 cm) high and wide, depending on the variety, which is why sage needs a bigger pot than thyme.' ) .
					$p( 'Colored-leaf forms are just as good to eat and brighten a balcony: purple \'Purpurascens\', yellow-edged \'Icterina\' and pink-tinged \'Tricolor\'. \'Berggarten\' has large leaves with a strong flavor, and \'Kew Gold\' stays compact. Young plants are easiest to find in spring and early summer, and bigger plants in nursery pots of about ½–¾ gallon (2–3 litres) are sold all year.' ) .

					$h2( 'Choose a large pot in a sheltered sun trap' ) .
					$p( 'A single sage needs a pot no smaller than 12 in (30 cm) in width and depth, with several holes in the base, then add peat-free soil-based potting mix mixed with horticultural grit, up to a quarter of the volume (more on mixes in <a href="/plant-care/potting-mix-for-containers/">potting mix for containers</a>). Plant in spring after your last frost, as the days warm up, keeping the top of the root ball only lightly covered.' ) .
					$p( 'Sage wants warmth and full sun, but it also likes shelter: a corner of a balcony screened from strong wind is ideal. It looks good grouped with other sun-lovers such as <a href="/plants/thyme-in-pots/">thyme</a>, <a href="/plants/rosemary-in-pots/">rosemary</a> and <a href="/plants/oregano-in-pots/">oregano</a>.' ) .

					$h2( 'Starting from seed' ) .
					$p( 'Common sage can be raised from seed, though plants need at least a year to reach picking size, so most people buy a plant or root a cutting.' ) .
					$list(
						array(
							'Start seeds indoors in spring, 6–8 weeks before your last frost, in small pots or a module tray filled with damp peat-free seed-starting mix.',
							'Cover the seed with a thin layer of fine mix.',
							'Put the pots in a covered seed tray, or slip them into a plastic bag on a warm windowsill. Seedlings should appear in about two weeks.',
							'Pot them on into larger modules or pots as they grow, and keep them warm and bright.',
							'Harden them off and move them outside after your last frost, once they are at least 4 in (10 cm) tall.',
						)
					) .

					$h2( 'Watering and feeding through the year' ) .
					$p( 'Sage in the ground manages on rainfall once established, but potting mix in a container dries quickly. Through summer, check it regularly and aim to keep it slightly moist rather than soaked; the general routine is in <a href="/plant-care/how-often-to-water-container-plants/">how often to water container plants</a>. In winter the risk flips: heavy rain rots the roots, so move the pot into the rain shadow of a wall.' ) .
					$p( 'A sage that has been in the same pot for over a year benefits from a sprinkle of general-purpose granular fertilizer in late spring or early summer. That is all the feeding it needs.' ) .

					$h2( 'Prune in spring for fresh leaves' ) .
					$p( 'Every year in mid- to late spring, cut established plants back lightly. This keeps them compact and pushes out a flush of tender new leaves. Without it, older plants sprawl and open up with a bare center. Do not cut hard into bare wood, as old stems may not reshoot. In late summer, remove the faded flower stems.' ) .
					$p( 'Even with good pruning, sage tends to become woody and straggly after six or seven years. Take softwood cuttings from new growth in late spring or early summer, or peg a low stem into a pot of potting mix in spring or fall, and you will always have a young plant ready to take over.' ) .

					$h2( 'Harvesting sage' ) .
					$p( 'Pick single leaves or whole young shoots whenever you need them; regular picking keeps the plant bushy. The fresh growth of spring and summer tastes best, but the leaves are there all winter too. Sage is at its best used fresh, and it also dries and freezes well: see <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.' ) .

					$h2( 'Pests and diseases' ) .
					$p( 'Sage is generally healthy in a sunny spot with free-draining potting mix. Rosemary beetles, sage leafhoppers and plant bugs may chew or mottle the leaves, but the damage is seldom serious enough to need control: just pick off spoiled leaves. Powdery mildew can leave a white, dusty coating. For the striped beetle, see the rosemary beetle section in <a href="/plants/rosemary-in-pots/">how to grow rosemary in pots</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Planting in a small pot: sage can reach 3 ft (90 cm) across.',
							'Letting the potting mix swing between dust-dry and soaked in summer: keep it evenly, slightly moist.',
							'Leaving it out in winter downpours: shelter the pot from rain.',
							'Pruning hard into old wood instead of trimming lightly each spring.',
							'Buying an ornamental salvia for cooking: look for Salvia officinalis on the label.',
						)
					),
				'image_prompt' => 'A bushy culinary sage plant with soft, oblong, gray-green leaves with a finely wrinkled texture, beside a smaller purple sage with dusky purple-gray leaves, both in 12-inch terracotta pots on a sheltered, sunny balcony in late spring, short spikes of violet-blue flowers just opening.' . $photo_end,
				'pin_prompt'   => 'A large terracotta pot of gray-green culinary sage with soft oblong leaves on a sunny patio table, a small bunch of picked sage leaves tied with twine beside it, photographed vertically against a pale wall.' . $pin_end,
			),

			'cilantro-in-pots' => array(
				'title'        => 'How to Grow Cilantro in Pots',
				'type'         => 'herbs',
				'sun'          => array( 'full-sun', 'part-shade' ),
				'space'        => array( 'windowsill', 'balcony', 'patio' ),
				'months'       => array(
					'sow'     => array( 2, 3, 4, 5, 6, 7, 8, 9, 10 ),
					'plant'   => array( 4, 5, 6 ),
					'harvest' => array( 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				),
				'timing'       => array(
					'sow_outdoors' => array( 0, 0 ),
				),
				'excerpt'      => 'Cilantro is an annual you sow straight into its pot, a few seeds every few weeks, because each batch soon runs to flower. Give it light shade at midday in summer, keep the potting mix just moist, and you can start cutting leaves in as little as ten weeks.',
				'facts'        => array(
					'short_name'     => 'Cilantro',
					'botanical_name' => 'Coriandrum sativum',
					'difficulty'     => 'Easy',
					'sun'            => 'Sun or light shade; out of midday sun in summer for leaves',
					'pot_size'       => 'At least 4–6 in (10–15 cm) deep, holding about 2 gallons (7.5 litres)',
					'hardiness'      => 'H5',
					'watering'       => 'Check daily in pots; keep the potting mix just moist',
					'harvest'        => 'Leaves from 4–6 in (10–15 cm) tall, often within 10 weeks; seeds (coriander) later',
					'season'         => 'Annual; sow outdoors from your last spring frost, then every few weeks into fall',
				),
				'lists'        => array(
					'key_points' => array(
						array( 'point' => 'Sow where it will grow: cilantro dislikes being transplanted.' ),
						array( 'point' => 'Space the large seeds about 2 in (5 cm) apart on the surface and cover lightly.' ),
						array( 'point' => 'For leaves in summer, put the pot somewhere cooler, out of the midday sun.' ),
						array( 'point' => 'Take a few leaves from each plant, then let them recover for a couple of weeks.' ),
						array( 'point' => 'Pinch out flower stems as they appear if you want more leaves.' ),
					),
					'varieties'  => array(
						array( 'name' => 'Cruiser', 'note' => 'RHS Award of Garden Merit. Compact, with large, tasty leaves and slow to bolt. Its tidy habit makes it well suited to containers.' ),
						array( 'name' => 'Calypso', 'note' => 'Award of Garden Merit. Slow to bolt, with a long cropping period, especially in summer.' ),
						array( 'name' => 'Confetti', 'note' => 'Award of Garden Merit. Feathery foliage with a milder, slightly sweet flavor.' ),
						array( 'name' => 'Filtro', 'note' => 'Award of Garden Merit. A vigorous variety giving plentiful aromatic leaves.' ),
					),
					'products'   => array(
						array( 'name' => 'Pot or trough with drainage holes, about 2 gallons (7.5 litres) or more', 'badge' => '', 'note' => 'Deeper is fine if you want plants to ripen seed.', 'url' => '' ),
						array( 'name' => 'Peat-free potting mix', 'badge' => '', 'note' => 'For sowing straight into the pot outdoors.', 'url' => '' ),
						array( 'name' => 'Seed of a slow-bolting cilantro', 'badge' => '', 'note' => 'Varieties bred for leaf, such as \'Cruiser\' or \'Calypso\'.', 'url' => '' ),
						array( 'name' => 'Cloche or row cover', 'badge' => '', 'note' => 'For fall sowings and cold spells after planting.', 'url' => '' ),
					),
					'faq'        => array(
						array( 'question' => 'Is cilantro the same plant as coriander?', 'answer' => 'Yes. University of Illinois Extension explains that the leaves are called cilantro and the seeds coriander, but both come from one plant, Coriandrum sativum. The RHS calls the whole plant coriander and also lists the name Chinese parsley. Leaves, flowers and seeds are all edible.' ),
						array( 'question' => 'Why does my grocery store cilantro die so quickly?', 'answer' => 'Those pots are made for a short harvest. They hold many thin, crowded seedlings that tend to catch fungal diseases or flower early. Split the clump into small groups and repot them promptly, and the plants may carry on for a while. The RHS advises keeping store-bought cilantro indoors, in containers, to limit the risk of spreading pests and diseases.' ),
						array( 'question' => 'Why is my cilantro flowering already?', 'answer' => 'Hot, dry weather makes cilantro bolt: it flowers and stops making leaves. In a pot the potting mix dries quickly, so check it daily, move the pot out of the midday sun, cut off flower stems as they form, and sow a slow-bolting variety. Keep a fresh batch coming every few weeks.' ),
						array( 'question' => 'Can I grow coriander seeds on a balcony?', 'answer' => 'Yes. Sow in full sun in spring or early summer so the seeds have time to ripen, and thin the plants to about 8 in (20 cm) apart. Green, unripe seeds have a milder taste; most cooks wait until they are brown.' ),
					),
					'sources'    => array(
						array( 'title' => 'RHS — How to grow coriander', 'url' => 'https://www.rhs.org.uk/herbs/coriander/grow-your-own' ),
						array( 'title' => 'RHS — Coriandrum sativum (hardiness rating)', 'url' => 'https://www.rhs.org.uk/plants/4371/coriandrum-sativum/details' ),
						array( 'title' => 'RHS — Coriandrum sativum \'Cruiser\'', 'url' => 'https://www.rhs.org.uk/plants/337964/cruiser-agm/details' ),
						array( 'title' => 'University of Illinois Extension — Cilantro', 'url' => 'https://extension.illinois.edu/herbs/cilantro' ),
						array( 'title' => 'University of Wisconsin-Madison Extension — Growing vegetables in containers', 'url' => 'https://hort.extension.wisc.edu/articles/growing-vegetables-containers/' ),
						$herb_pots,
						$book,
					),
				),
				'content'      =>
					$h2( 'Why cilantro behaves differently' ) .
					$p( 'Unlike thyme, rosemary or sage, cilantro is not a shrub that lasts for years. It is a fast annual: it grows leaves, flowers, sets seed and dies, often within a single summer. Hot, dry weather speeds that up. So the secret is not one perfect plant but a small pot sown again and again, with each batch picked while it is leafy. The seeds of the same plant are the spice coriander.' ) .

					$h2( 'Pot size and position' ) .
					$p( 'Cilantro is a small plant. University of Wisconsin-Madison Extension puts it with lettuce and radishes: a container holding at least about 2 gallons (7.5 litres) and 4–6 in (10–15 cm) deep. Any trough or pot of that size with drainage holes will do. Fill it with peat-free potting mix.' ) .
					$p( 'Where you put the pot depends on what you want. For leaves, part shade is more productive, and in summer a cooler spot out of the midday sun slows flowering. For seeds, choose full sun.' ) .

					$h2( 'Sow cilantro where it will grow' ) .
					$p( 'Cilantro resents being moved, and seedlings kept indoors for long grow leggy, so sowing in the final pot outdoors works best.' ) .
					$list(
						array(
							'Firm the surface of the potting mix lightly.',
							'Place the large, round seeds one by one, about 2 in (5 cm) apart.',
							'Cover them with a little potting mix and water gently.',
							'Expect seedlings in one to three weeks, depending on the temperature.',
							'For seed crops, thin the plants to 8 in (20 cm) apart.',
						)
					) .
					$p( 'Sow outdoors once the danger of frost has passed, and keep sowing through summer into fall. For leaves, sow a small batch every 3–4 weeks, as University of Illinois Extension suggests; the method is explained in <a href="/plant-care/succession-planting-small-spaces/">succession planting</a>. A late batch under a cloche, or in a greenhouse, keeps leaves coming into early winter. If you bought young plants instead, harden them off and set them about 4 in (10 cm) apart after your last frost, with row cover handy in cold weather.' ) .

					$h2( 'Cilantro on a windowsill' ) .
					$p( 'From late winter you can sow into pots or small trays of peat-free seed-starting mix on a warm, sunny sill. Germination takes two to three weeks; thin the seedlings to 2 in (5 cm) once you can handle them. Indoor cilantro is short-lived: in low light it turns pale, and in heat or dry potting mix it bolts. A bright but fairly cool spot helps, and keep in mind that the plants can smell unpleasant in a closed room. For the quickest crop of all, cut the seedlings after a couple of weeks as <a href="/plants/microgreens-on-a-windowsill/">microgreens</a>.' ) .

					$h2( 'Water to delay bolting' ) .
					$p( 'Pots dry out much faster than garden soil, and dry potting mix is the quickest way to make cilantro flower. Check the pot every day and water so the mix stays just moist, but not soggy: cilantro dislikes waterlogged roots too. Early morning or evening watering, ideally with stored rainwater, loses less to evaporation. If you want leaves rather than seeds, snap off flower stems as soon as they start, so the plant keeps putting its energy into foliage.' ) .

					$h2( 'Harvest leaves, flowers and seeds' ) .
					$list(
						array(
							'<strong>Leaves:</strong> start when plants are 4–6 in (10–15 cm) tall, which can be as little as ten weeks from sowing. Take a few leaves from each plant, leave them a couple of weeks to recover, then pick again. A bunch keeps for a few days in the fridge. Cilantro does not dry well; freezing is covered in <a href="/plant-care/how-to-dry-and-freeze-herbs/">how to dry and freeze herbs</a>.',
							'<strong>Flowers:</strong> every plant flowers in the end. Scatter the small white or pale purple flowers on salads, or leave them to set seed.',
							'<strong>Seeds:</strong> use them green for a milder flavor, or wait until they turn brown. Saving and storing them is explained in <a href="/plant-care/how-to-save-seeds-from-your-plants/">how to save seeds</a>; keep a few for next year\'s sowings.',
						)
					) .

					$h2( 'Slugs, snails and aphids' ) .
					$p( 'Cilantro is usually trouble-free. The main threat is slugs and snails eating seedlings and young plants, particularly in damp weather, so check the pot at dusk and remove any you find. Aphids sometimes gather on the shoots: see <a href="/problems/aphids-container-plants/">aphids on container plants</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Raising seedlings in modules and moving them later: cilantro sulks when transplanted.',
							'Sowing a whole packet at once: sow small batches every few weeks instead.',
							'Putting summer sowings in the hottest spot: leaves last longer out of the midday sun.',
							'Stripping every plant in one go: take a few leaves from each and let them regrow.',
							'Expecting a grocery store pot to last: divide and repot it quickly, or sow your own.',
						)
					),
				'image_prompt' => 'A rectangular trough of young cilantro plants with bright green, flat, lobed lower leaves and a few finer feathery upper leaves, growing densely in dark peat-free potting mix on a balcony in dappled midday shade, one plant just showing a small umbel of tiny white flowers, summer daylight.' . $photo_end,
				'pin_prompt'   => 'A pot of leafy cilantro with bright green, flat, lobed leaves on a bright kitchen windowsill, a few cut stems lying on a wooden board in front, photographed vertically with soft daylight from the window.' . $pin_end,
			),
		),
	),
);
