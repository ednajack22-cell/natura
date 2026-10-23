<?php
/**
 * Starter guides, batch 34 (Small Spaces): the place guide for windowsills
 * and indoor growing. A place guide is a hub: it gives the advice that is
 * particular to growing food inside the home (how much light really reaches
 * a sill, cold or hot glass, drafts and dry heated air, grow lights, water
 * near floors and furniture, the pests that thrive indoors, and window boxes
 * fixed outside the glass) and links to the guides that already explain
 * which crops suit a sill, starting seeds, watering and each pest. The
 * plants that suit a windowsill are listed by the theme from the
 * "windowsill" plant tag, so the text has no plant-by-plant list.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from these pages, all checked 23 October 2026: University of
 * Minnesota Extension, Lighting for indoor plants and starting seeds; Iowa
 * State University Extension and Outreach, Growing Herbs Indoors, How to Care
 * for Houseplants, and Growing Indoor Plants Under Supplemental Lights;
 * University of Missouri Extension, Lighting Indoor Houseplants (G6515) and
 * Growing Herbs at Home (G6470); Penn State Extension, Growing Herbs
 * Indoors; Illinois Extension, Houseplants: Lighting; Colorado State
 * University Extension, Fungus Gnats as Houseplant and Indoor Pests; RHS
 * Beautiful winter houseplants and care tips, How to grow microgreens
 * (school gardening), How to grow chilli peppers, Roof gardens and
 * balconies, and Gardening when you rent. Grow-light distances and hours
 * are given only as the sources state them; where they differ, each source
 * is named.
 * No fixing or load figure is given for window boxes, because none of the
 * sources states one. Seasons replace month names. Only prevention and hand
 * methods are given for pests; no insecticide is recommended.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

$p    = 'natura_core_demo_p';
$h2   = 'natura_core_demo_h2';
$list = 'natura_core_demo_list';

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Small Spaces: windowsills and indoors', 'natura-core' ),
	'guides' => array(
		'space' => array(
			'windowsills-and-indoors' => array(
				'image_prompt' => 'A deep, painted wooden kitchen windowsill in winter daylight, seen from inside the room: a row of herb pots (basil with broad glossy leaves, curly parsley, a clump of chives) standing in a long waterproof tray right against the glass, a shallow tray of dense green microgreens beside them, and on a shelf next to the window a slim LED grow light bar hanging a short way above a trough of loose-leaf lettuce, its cord plugged into a timer, sheer curtain pulled fully open.' . $photo_end,
				'pin_prompt'   => 'A bright kitchen window photographed vertically from inside: pots of basil, parsley and chives in a waterproof tray close to the glass, a tray of microgreens in front, and a small LED grow light shining down on a trough of lettuce on a shelf to one side.' . $pin_end,
				'title'        => 'How to Grow Food on a Windowsill and Indoors',
				'short_name'   => 'Windowsills & indoors',
				'order'        => 4,
				'space_term'   => 'windowsill',
				'excerpt'      => 'Stand pots right against your brightest window, because light fades within a few feet of the glass, and turn them often. Where daylight falls short, hang a grow light 6 to 12 in (15–30 cm) above herbs and salad crops on a timer, and keep plants clear of cold glass, heaters and drafts.',
				'related'      => array(
					'post'    => array(
						'vegetables-on-a-windowsill',
						'how-to-start-seeds-indoors',
						'overwatered-or-underwatered',
					),
					'problem' => array(
						'leggy-seedlings',
						'whiteflies',
						'aphids-container-plants',
					),
					'project' => array(
						'plant-a-herb-window-box',
						'grow-sprouts-in-a-jar',
						'make-a-humidity-tray',
					),
				),
				'lists'        => array(
					'products' => array(
						array( 'name' => 'LED grow light with adjustable height', 'note' => 'Lets you keep the light a set distance above the leaves as plants grow.', 'url' => '' ),
						array( 'name' => 'Plug-in 24-hour timer, grounded', 'note' => 'Switches the light on and off at the same times every day.', 'url' => '' ),
						array( 'name' => 'Deep saucers or a long waterproof tray', 'note' => 'Protect the sill, furniture and floor from water draining out of the pots.', 'url' => '' ),
						array( 'name' => 'Cache pot (decorative outer pot)', 'note' => 'Hides a plain pot with drainage holes; tip out any water that collects inside it.', 'url' => '' ),
						array( 'name' => 'Yellow sticky cards', 'note' => 'Catch adult fungus gnats and show you whether they are present.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How far from a window can I grow herbs indoors?', 'answer' => 'Not far. Light fades quickly as you move back into a room, and Iowa State notes that spots more than a few feet from even a bright window are often too dim for houseplants, let alone sun-loving herbs. Keep food plants on the sill or right beside the glass, or add a grow light.' ),
						array( 'question' => 'How many hours a day should a grow light be on for herbs and salad greens?', 'answer' => 'University of Minnesota Extension suggests 12 to 14 hours a day in total for lettuce and herbs, and Iowa State gives 12 to 16 hours for herbs. Illinois Extension advises no more than 16 hours, as plants need a dark rest too. Use a timer so the hours stay the same every day.' ),
						array( 'question' => 'Can I use an ordinary household bulb instead of a grow light?', 'answer' => 'Iowa State mentions a compact fluorescent bulb in a task lamp as a setup for a few pots. When you shop, remember that lumens only describe how bright a bulb looks to people. Plants use mainly red and blue light, so University of Minnesota Extension suggests checking the label for the type of light and a plant measure such as PPF. White or balanced grow lights suit most crops.' ),
						array( 'question' => 'What are the tiny black flies around my indoor pots?', 'answer' => 'Usually fungus gnats. The adults are harmless and do not bite; their larvae live in the top few inches of damp potting mix. Let the top 1 to 2 in (2.5–5 cm) of mix dry out between waterings and put yellow sticky cards at the edge of the pot to trap the adults.' ),
						array( 'question' => 'Should I move herbs off the windowsill on cold nights?', 'answer' => 'Tender ones, yes. Windowsills get cold at night, and a pot shut between a closed curtain and the window gets very cold. Penn State notes that basil cannot survive below 50 °F (10 °C) and should not stay on a windowsill in winter. Lift pots into the room or leave the curtain open.' ),
						array( 'question' => 'Do herbs grown indoors taste as strong as outdoor ones?', 'answer' => 'Often a little milder. Iowa State notes that many herbs grown inside are less intensely flavored than those grown outdoors, though they still taste of themselves, and Missouri Extension adds that indoor herbs are less productive. Perennial herbs do better if they spend summer outside.' ),
					),
					'sources'  => array(
						array( 'title' => 'University of Minnesota Extension — Lighting for indoor plants and starting seeds', 'url' => 'https://extension.umn.edu/planting-and-growing-guides/lighting-indoor-plants' ),
						array( 'title' => 'Iowa State University Extension and Outreach — Growing Herbs Indoors', 'url' => 'https://yardandgarden.extension.iastate.edu/how-to/growing-herbs-indoors' ),
						array( 'title' => 'Iowa State University Extension and Outreach — How to Care for Houseplants', 'url' => 'https://yardandgarden.extension.iastate.edu/how-to/how-care-houseplants' ),
						array( 'title' => 'Iowa State University Extension and Outreach — Growing Indoor Plants Under Supplemental Lights', 'url' => 'https://yardandgarden.extension.iastate.edu/how-to/growing-indoor-plants-under-supplemental-lights' ),
						array( 'title' => 'University of Missouri Extension — Lighting Indoor Houseplants (G6515)', 'url' => 'https://extension.missouri.edu/publications/g6515' ),
						array( 'title' => 'University of Missouri Extension — Growing Herbs at Home (G6470)', 'url' => 'https://extension.missouri.edu/publications/g6470' ),
						array( 'title' => 'Penn State Extension — Growing Herbs Indoors', 'url' => 'https://extension.psu.edu/growing-herbs-indoors' ),
						array( 'title' => 'Illinois Extension — Houseplants: Lighting', 'url' => 'https://extension.illinois.edu/houseplants/lighting' ),
						array( 'title' => 'Colorado State University Extension — Fungus Gnats as Houseplant and Indoor Pests', 'url' => 'https://extension.colostate.edu/resource/fungus-gnats-as-houseplant-and-indoor-pests/' ),
						array( 'title' => 'RHS — Beautiful winter houseplants and care tips', 'url' => 'https://www.rhs.org.uk/plants/types/houseplants/winter-interest-houseplants-care' ),
						array( 'title' => 'RHS — How to grow microgreens (school gardening)', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/food-growing/growing-microgreens' ),
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — Gardening when you rent', 'url' => 'https://www.rhs.org.uk/garden-inspiration/garden-types/how-to-garden-when-you-rent' ),
					),
				),
				'content'      =>
					$p( 'Growing food inside is container growing with one big handicap and a few small ones. The handicap is light: Iowa State points out that even the brightest windowsill gets only a fraction of the light found anywhere outdoors, and less still in winter, when days are short and the sun sits low. The smaller ones are cold or hot glass, dry heated air, and water that has to stay off your floors. This guide deals with those. The crops that cope indoors are listed below it, each with its own growing guide.' ) .

					$h2( 'How much light really reaches your windowsill?' ) .
					$p( 'Light is the factor that limits indoor food growing most, so judge it before you sow. The direction of the window is only the start. Iowa State lists the other things that cut the light: the size of the window, curtains and sheers, tinted films, a roof overhang outside, and trees, walls or buildings close by. Your eyes are a poor guide, because they adjust to dim rooms, as Missouri Extension notes.' ) .
					$list(
						array(
							'<strong>South-facing windows</strong> give the brightest light for the longest time, and Missouri and the University of Minnesota both rate a south or southwest window as the place for plants that need high light. Culinary herbs such as basil and thyme are in that group.',
							'<strong>East- and west-facing windows</strong> can work well too, according to Iowa State, if they are bright and unshaded.',
							'<strong>North-facing windows</strong> suit only plants that manage with low light, which rules out most food crops unless you add a grow light.',
						)
					) .
					$p( 'Distance matters as much as direction. Light drops fast as you move away from the glass: Iowa State says spots more than a few feet back from even a bright window are often too dim for houseplants, and that the areas just to either side of a window are darker than they look. Keep food plants on the sill itself or pressed up to the window, and open the curtains fully by day.' ) .
					$p( 'Iowa State suggests most herbs grown indoors want about eight hours of direct light a day, with some managing on six. Plants that are short of light tell you: the University of Minnesota and Missouri describe stretched stems with long gaps between the leaves, small or pale leaves, and lower leaves that yellow and drop. On seedlings, that is <a href="/problems/leggy-seedlings/">tall, pale and floppy growth</a>.' ) .
					$p( 'Light through a window also comes from one side, so plants lean toward it. Penn State advises rotating windowsill pots often so every side gets its share; a <a href="/projects/make-a-seedling-light-box/">foil-lined light box</a> helps seedlings too.' ) .

					$h2( 'Cold glass, hot glass and drafts' ) .
					$p( 'A windowsill swings between extremes that the middle of a room never sees. The RHS warns that houseplants left on windowsills or shut behind curtains on winter nights can be damaged by cold, and Iowa State adds that a plant trapped between curtain and pane can get very warm in the sun by day and quite cold at night. Penn State notes that basil cannot survive below 50 °F (10 °C) and should not spend winter nights on a sill.' ) .
					$list(
						array(
							'<strong>Keep pots on the room side of the curtain</strong> at night, or lift tender plants into the room until morning.',
							'<strong>Aim for steady warmth.</strong> Penn State suggests rooms of at least 65 to 70 °F (18–21 °C) by day and 55 to 60 °F (13–16 °C) at night for herbs.',
							'<strong>Watch the hot side too.</strong> A bright south window in late spring, summer and early fall can scorch plants that do not need full sun, as Missouri notes, and the University of Minnesota points out that sunny spots are warm and dry pots faster.',
							'<strong>Avoid drafts.</strong> Iowa State advises keeping indoor plants away from warm air blowing from a heat register and cold air from an outside door in winter. The RHS adds that radiators and fires can crisp leaves.',
						)
					) .

					$h2( 'Dry heated air' ) .
					$p( 'Iowa State notes that most homes have very low humidity in winter, and Penn State adds that homes with central forced-air heating are the driest. Dry air can mean slow growth and brown leaf tips. Group pots together so they share moist air, or stand them on a tray of wet pebbles with the pot base above the water; a <a href="/projects/make-a-humidity-tray/">humidity tray</a> shows how. Iowa State says misting does not raise humidity for more than a few minutes. If a room is too humid instead, Penn State suggests a fan, or a window opened a little in warm weather, to keep air moving.' ) .

					$h2( 'Grow lights for food crops' ) .
					$p( 'Where no window is bright enough, or in the short days of winter, a grow light makes indoor food growing possible. Iowa State describes setups from a compact fluorescent bulb in a task lamp for a few pots to a plug-in 4 ft (1.2 m) LED shop light for a larger collection.' ) .
					$list(
						array(
							'<strong>Type:</strong> LEDs are the most energy efficient and long-lasting, and give off little heat, though they cost more to buy; fluorescent tubes are cheaper up front but use more energy and wear out sooner. The University of Minnesota and Missouri both advise against incandescent bulbs, which waste energy and run hot, and the University of Minnesota adds that their light makes plants stretch.',
							'<strong>Color:</strong> plants use mainly red and blue light. The University of Minnesota suggests blue or mixed light for leafy greens and seedlings, and white or balanced light for most crops at any stage. Lumens describe brightness to the human eye, so look for the type of light and a plant measure such as PPF on the label.',
							'<strong>Distance:</strong> light weakens quickly as it travels, so keep the lamp close. The University of Minnesota gives 6 to 12 in (15–30 cm) above the leaves for lettuce and herbs, and 4 to 6 in (10–15 cm) for seedlings, raising the light as they grow. Iowa State and Penn State give the same 6 to 12 in for herbs. A light on chains or an adjustable stand makes this easy, as Missouri notes.',
							'<strong>Hours:</strong> the University of Minnesota suggests 12 to 14 hours of light a day in total for lettuce and herbs, and 16 to 18 for seedlings; Iowa State gives 12 to 16 hours for herbs. Missouri adds that the light works best running at the same time as the window light, rather than only early or late in the day, and Illinois advises no more than 16 hours, so plants get a rest.',
							'<strong>Timer and safety:</strong> a timer keeps the hours regular. Because there is water around the plants, Missouri recommends a grounded, three-prong cord or adapter.',
							'<strong>Reflect the light back:</strong> white paint or foil around the growing area helps, according to Missouri, and so does spacing pots so they do not shade one another.',
						)
					) .
					$p( 'For raising young plants under lights, see <a href="/how-to-start-seeds-indoors/">how to start seeds indoors</a>.' ) .

					$h2( 'What grows well indoors' ) .
					$p( 'Quick, small and leafy crops repay a windowsill best; big plants and deep-rooted crops do not fit. <a href="/vegetables-on-a-windowsill/">Vegetables on a windowsill</a> compares the options crop by crop, and the plant guides listed below this page give the details. In short:' ) .
					$list(
						array(
							'<strong>Microgreens and shoots</strong> need only a shallow tray and can be sown at any time of year, as the RHS notes; see <a href="/plants/microgreens-on-a-windowsill/">microgreens on a windowsill</a>. Sprouts need no potting mix at all: <a href="/projects/grow-sprouts-in-a-jar/">grow sprouts in a jar</a>.',
							'<strong>Soft herbs</strong> are the classic indoor crop. Iowa State suggests growing each kind of herb in its own pot, because one pot rarely suits them all, and names some, such as rosemary and sage, as harder indoors because they need more light or suffer from spider mites.',
							'<strong>Salad greens</strong> grown as cut-and-come-again leaves suit a trough on a bright sill or under a grow light.',
							'<strong>Compact fruiting crops:</strong> the RHS says compact chili varieties can be grown on a sunny windowsill indoors, so give them your brightest, warmest spot.',
							'<strong>Mushrooms</strong> can be grown indoors from a kit; see <a href="/plants/mushrooms-from-a-kit/">mushrooms from a kit</a>.',
						)
					) .
					$p( 'Missouri Extension notes that perennial herbs are more productive if they spend summer outdoors. If you move pots outside for the warm months, Penn State advises starting them in partial shade and giving them more light every few days; the same method is set out in <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>. Bring them back in before frost.' ) .

					$h2( 'Water without harming sills and floors' ) .
					$p( 'Indoor pots still need drainage holes. Iowa State says a layer of gravel in the bottom does not replace them; to use a pretty pot without holes, set a plain pot inside it as a cache pot. Then plan for the water that drains through:' ) .
					$list(
						array(
							'Stand every pot on a saucer or in a tray to protect the sill, furniture and floor, as Iowa State advises.',
							'Tip out water left in the saucer or cache pot after about 30 to 45 minutes; the RHS suggests checking cache pots 10 minutes after watering. Missouri warns never to leave herbs standing in water.',
							'For a thorough soak without spills, Iowa State suggests carrying pots to the sink or bathtub and letting them drain there before you put them back.',
							'Check, rather than water on a fixed day. With less light and cooler rooms in winter, plants use less water, as the RHS and the University of Minnesota both note. <a href="/overwatered-or-underwatered/">Overwatered or underwatered?</a> shows how to tell, and <a href="/how-often-to-water-container-plants/">how often to water container plants</a> covers the routine.',
						)
					) .
					$p( 'Indoor plants need only light feeding: Iowa State suggests half or quarter strength, and none in winter. <a href="/how-to-fertilize-container-plants/">How to feed container plants</a> explains the rest.' ) .

					$h2( 'Pests that like it indoors' ) .
					$p( 'Indoors, some pests keep breeding all year: Colorado State notes that fungus gnats reproduce continuously on indoor plants at room temperature. Check the undersides of leaves whenever you water, and remove pests by hand while numbers are small. Penn State advises cultural and hand methods for herbs, because you pick and eat them fresh, and reminds you to wash leaves before cooking.' ) .
					$list(
						array(
							'<strong>Fungus gnats:</strong> small black flies that hover around pots, often gathering at window frames. Colorado State explains that the adults are harmless and do not bite; their larvae live in the top 2 to 3 in (5–8 cm) of damp potting mix. The main fix is to let the top 1 to 2 in (2.5–5 cm) dry out between waterings. Yellow sticky cards trap adults, a slice of raw potato pressed into the mix reveals larvae within a few days, and old potting mix that stays wet should be replaced, as Colorado State advises. See <a href="/how-to-repot-container-plants/">how to repot container plants</a>.',
							'<strong>Aphids:</strong> Penn State suggests trimming off infested shoots and putting them in the trash; see <a href="/problems/aphids-container-plants/">aphids</a>.',
							'<strong>Whiteflies:</strong> if tiny white insects fly up when you brush the leaves, see <a href="/problems/whiteflies/">tiny white flies</a>.',
							'<strong>Spider mites:</strong> Iowa State names them as a common problem on some herbs grown indoors; see <a href="/problems/spider-mites/">pale speckles and fine webbing</a>. For citrus or bay brought in for winter, see also <a href="/problems/mealybugs/">mealybugs</a> or <a href="/problems/scale-insects/">scale insects</a>.',
						)
					) .
					$p( 'Colorado State notes that plants that spent summer outdoors often bring fungus gnats in with them, so look over every pot before it comes back inside in fall.' ) .

					$h2( 'Window boxes outside the glass' ) .
					$p( 'A box fixed to the outside of a window gets full outdoor light rather than the fraction that passes through the glass, which suits sun-loving herbs. It also hangs over whatever lies below. The RHS reminds you that containers full of potting mix weigh a considerable amount, and that any fixings must be well supported. Fix the brackets into solid wall and check the empty box cannot slide or tip before you fill it; <a href="/projects/plant-a-herb-window-box/">plant a herb window box</a> goes through it step by step. If you rent, ask permission first: the RHS notes that tenants may have to remove anything they add. On an apartment balcony, see the rules in <a href="/small-spaces/balconies/">growing food on a balcony</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Setting pots on a table a few feet from the window, where the light is far weaker than it looks.',
							'Leaving tender herbs between the curtain and the cold glass overnight.',
							'Placing pots next to a heat register, radiator or drafty door.',
							'Hanging a grow light too high, or leaving it on day and night.',
							'Watering on a fixed day in winter, so the potting mix stays wet and fungus gnats move in.',
							'Leaving water standing in saucers and cache pots.',
							'Fixing a window box to a wall without checking the brackets first, or without the landlord\'s permission.',
						)
					),
			),
		),
	),
);
