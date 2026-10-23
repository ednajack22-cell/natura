<?php
/**
 * Starter guides, batch 8 (seedlings, feeding and simple projects): four
 * Plant Care articles on sowing indoors, hardening off, feeding and
 * repotting, and four DIY projects adapted from sources.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026), from university extension food-safety guidance for sprouts, and
 * from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the RHS and the book differ,
 * the RHS is followed. Written for the United States first (American
 * spelling and terms, imperial units first), adapted for the UK; timing
 * in the text is given by season or frost date, not by month.
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

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Seedlings, feeding and simple projects', 'natura-core' ),
	'guides' => array(
		'post'    => array(
			'how-to-start-seeds-indoors'     => array(
				'image_prompt' => 'A bright south-facing kitchen windowsill in early spring with a black plastic seed tray and a row of small square pots of peat-free seed-starting mix, some showing tiny tomato and chili pepper seedlings with two smooth oval seed leaves, a clear plastic propagator lid set aside, wooden plant labels with handwritten dates.' . $photo_end,
				'pin_prompt'   => 'Hands sprinkling a thin pinch of seed over the flat, firmed surface of a small pot of fine peat-free seed-starting mix on a windowsill, a seed packet and a wooden label beside it, photographed vertically from above.' . $pin_end,
				'title'        => 'How to Start Seeds Indoors on a Windowsill',
				'topic'        => 'light-position',
				'excerpt'      => 'Fill a tray or small pot with peat-free seed-starting mix, firm it, scatter the seed thinly, cover it no deeper than the seed is wide, water from below or with a fine spray, and keep it warm, at around 64 °F (18 °C) for most seeds. Uncover the seedlings as soon as they appear, give them your brightest window, and move them into their own pots once they can be handled.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Seed tray, module tray or small pots with drainage holes', 'note' => 'Trays for fine seed, modules and pots for larger seed. Clean food containers with holes punched in the base also work.', 'url' => '' ),
						array( 'name' => 'Peat-free seed-starting mix', 'note' => 'Fine and low in nutrients. Sifted peat-free all-purpose potting mix is an alternative.', 'url' => '' ),
						array( 'name' => 'Propagator lid or clear plastic tray', 'note' => 'Keeps the mix moist until germination. Remove it once the seedlings are up.', 'url' => '' ),
						array( 'name' => 'Watering can with a fine rose', 'note' => 'Turn the rose upwards for a gentle spray that does not wash the seed about.', 'url' => '' ),
						array( 'name' => 'Pots 3–3½ in (7.5–9 cm) across', 'note' => 'For pricking out each seedling into a pot of its own.', 'url' => '' ),
						array( 'name' => 'Labels and a pencil', 'note' => 'Write the crop and the sowing date on each pot.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'When should I start seeds indoors?', 'answer' => 'It depends on the crop, so check the packet. Crops that need a long season, such as chili peppers, can be started in late winter. Most tender vegetables are started in spring, to go outside once your last spring frost has passed. Winter salad greens can be sown in fall.' ),
						array( 'question' => 'How deep should I sow seeds in a pot?', 'answer' => 'As a rule, cover them with sifted mix to about their own depth, and no more unless the packet says so. Large seeds such as beans go deeper, in a hole made with a dibber or pencil.' ),
						array( 'question' => 'Can I still use an old packet of seeds?', 'answer' => 'Look at the date on the packet first. Seeds germinate less well as they age, so an old packet may give a patchy result and leave you sowing again later in the season.' ),
						array( 'question' => 'Do I need a heated propagator?', 'answer' => 'No. A warm, sunny windowsill is enough for most seeds. A propagator with a thermostat helps with crops that want steady warmth to germinate, such as chili peppers.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to sow seeds indoors', 'url' => 'https://www.rhs.org.uk/propagation/seed-indoors' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow chilli peppers', 'url' => 'https://www.rhs.org.uk/vegetables/chilli-pepper/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — Seed sowing techniques', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/vegetable-basics/seed-sowing-techniques' ),
						array( 'title' => 'RHS — How plants sense the environment', 'url' => 'https://www.rhs.org.uk/advice/understanding-plants/how-plants-sense-the-environment' ),
						array( 'title' => 'RHS — Nutrition: feeding plants', 'url' => 'https://www.rhs.org.uk/garden-jobs/nutrition-feeding-plants' ),
						$book,
					),
				),
				'content'      =>
					$p( 'You do not need a greenhouse to raise your own plants. A sunny windowsill gives seeds the warmth and shelter they need, and lets you start tender crops weeks before it is warm enough outside. Tomatoes, chili peppers and zucchini, salad greens, herbs and many flowers can all begin life indoors.' ) .

					$h2( 'What you need' ) .
					$p( 'Shallow seed trays suit small seeds; module trays and small pots suit bigger ones. Anything with drainage holes will do, including clean food tubs. Use peat-free seed-starting mix, which is fine-textured and low in nutrients so it does not harm young roots, or sift some peat-free all-purpose potting mix. You also need a clear cover, labels, and a warm, bright place: the RHS suggests a south- or west-facing windowsill.' ) .

					$h2( 'Sow, step by step' ) .
					$list(
						array(
							'Fill the tray or pot to just below the rim, pressing the mix into the corners.',
							'Firm it gently with the base of another pot so the surface sits about ½ in (1 cm) below the rim and is level.',
							'Tip a little seed into your palm and scatter a small pinch thinly across the surface. Place large seeds one by one, or push them into holes made with a dibber or pencil.',
							'Cover with a thin layer of sifted mix, usually no deeper than the seed itself.',
							'Water with an upturned fine rose, or stand the pot in a tray of water until the surface darkens, then lift it out.',
							'Label it with the crop and the date.',
							'Put a propagator lid, a sheet of glass or a clear plastic tray on top and keep it somewhere warm.',
						)
					) .

					$h2( 'Warmth and the first days' ) .
					$p( 'Most seeds germinate at about 64 °F (18 °C), but packets vary, so read them. Some seedlings show within a few days. The moment they do, take the cover off. Keep the mix just damp by watering lightly every few days: it should never dry out completely, nor sit soggy. Once they are up, seedlings grow better slightly cooler than the seeds needed to germinate.' ) .
					$p( 'Warmth-loving vegetables want a little more. RHS figures put tomatoes at about 64 °F (18 °C), zucchini at 65–70 °F (18–21 °C), and chili peppers and cucumbers at about 70 °F (21 °C), which a heated propagator or a warm room makes easier to hold.' ) .
					$p( 'Windowsills can get chilly after dark. On frosty nights, lift the pots off the sill into the room and put them back in the morning.' ) .

					$h2( 'Light from one side' ) .
					$p( 'Seedlings bend towards the window. Give them light from all round by turning the pots every day or two, or by standing them in a <a href="/projects/make-a-seedling-light-box/">foil-lined light box</a>. If yours have already grown tall and thin, see <a href="/problems/leggy-seedlings/">why seedlings go tall, pale and floppy</a>.' ) .

					$h2( 'Prick out into their own pots' ) .
					$p( 'When the seedlings are big enough to handle, move each one into its own 3–3½ in (7.5–9 cm) pot or a cell of a module tray so they do not crowd each other. Hold a seedling lightly by one of its first leaves, never by the stem, and ease the roots out from below with a pencil or dibber. Set it in a hole in the new potting mix, firm gently and water. Later, move plants into larger pots as they fill these.' ) .
					$p( 'Seedlings in peat-free mix benefit from a weak feed once their first leaves have formed; see <a href="/how-to-fertilize-container-plants/">how to feed container plants</a>.' ) .

					$h2( 'If seedlings collapse' ) .
					$p( 'Seedlings that suddenly fall over at soil level usually have damping off. Our guide to <a href="/problems/damping-off-seedlings/">collapsing seedlings</a> explains how to prevent it.' ) .

					$h2( 'Before they go outside' ) .
					$p( 'Plants raised indoors need two to three weeks to get used to outdoor life before they are planted out, and tender crops must wait until your last spring frost has passed. Our step-by-step guide to <a href="/how-to-harden-off-seedlings/">hardening off seedlings</a> shows how to do it on a balcony.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Burying small seeds too deep: a dusting of mix is usually enough.',
							'Leaving the lid on after germination.',
							'Watering on a schedule rather than when the mix starts to dry.',
							'Leaving seedlings in a crowded tray for weeks instead of pricking them out.',
							'Lifting seedlings by the stem instead of by a leaf.',
						)
					),
			),

			'how-to-harden-off-seedlings'  => array(
				'image_prompt' => 'Young tomato, zucchini and bush bean plants in small pots grouped on the floor of a sheltered sunny balcony against a south-facing brick wall, a roll of white row cover beside them, a tray to carry them back indoors, late spring morning light.' . $photo_end,
				'pin_prompt'   => 'A tray of young vegetable plants in small pots standing by a balcony door in spring sunshine, half covered by a sheet of white row cover, photographed vertically.' . $pin_end,
				'title'        => 'How to Harden Off Seedlings on a Balcony or Patio',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'Hardening off means getting plants raised indoors used to cooler air, wind and lower humidity over two to three weeks before they are planted out. Put them outside in a sheltered spot by day and bring them in at night, then leave them out for longer, under row cover, until they stay out uncovered.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Row cover (frost cloth)', 'note' => 'Two layers in the first week, then one. Heavier grades give about 4 °F (2 °C) of frost protection.', 'url' => '' ),
						array( 'name' => 'A tray or crate', 'note' => 'Carries a batch of small pots in and out in one trip.', 'url' => '' ),
						array( 'name' => 'Cold frame', 'note' => 'Optional. Its lid lets you increase the fresh air step by step.', 'url' => '' ),
						array( 'name' => 'Clothespins or small weights', 'note' => 'Keep row cover from blowing off on a windy balcony.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do I need to harden off plants I bought from a garden center?', 'answer' => 'Often, yes. Young plants raised under cover in a nursery need the same gradual introduction to outdoor conditions as plants you raised yourself.' ),
						array( 'question' => 'Does hardening off make tender plants frost-proof?', 'answer' => 'No. It toughens the leaves and slows growth, but tomatoes, zucchini and beans are still killed by frost. Keep them inside, or covered, until your last spring frost has passed.' ),
						array( 'question' => 'Do hardy seedlings such as peas need hardening off?', 'answer' => 'Yes, if they were raised indoors, but they adjust faster than half-hardy or tender plants.' ),
						array( 'question' => 'What if a cold night damages my plants?', 'answer' => 'Cut out the damaged growth and carry on with the hardening-off routine.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Hardening off tender plants', 'url' => 'https://www.rhs.org.uk/prevention-protection/hardening-off-tender-plants' ),
						array( 'title' => 'RHS — Seed sowing techniques', 'url' => 'https://www.rhs.org.uk/advice/beginners-guide/vegetable-basics/seed-sowing-techniques' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'      =>
					$p( 'A seedling that has lived on a warm windowsill has soft leaves that have never felt wind, cold nights or dry air. Put it straight outside and the shock can stop it growing for weeks. Hardening off makes the move gradual, so the leaves thicken and grow a waxier surface and the plant carries on growing once it is planted.' ) .

					$h2( 'Which plants need it' ) .
					$p( 'Any plant raised indoors or under glass: your own seedlings, and young plants bought from a nursery. Hardy crops such as peas and lettuce adapt more quickly; half-hardy and tender ones such as tomatoes, chili peppers, zucchini and beans take longer. The warmer they were grown, the longer they need.' ) .

					$h2( 'When to start' ) .
					$p( 'Count back from your planting-out date. The process usually takes two to three weeks. Tender plants should not go out for good before your last spring frost, so look up the average date for your area. In the UK it usually falls in late spring in southern England, and later in the north and in Scotland. Hardening off does not make a frost-tender plant hardy.' ) .

					$h2( 'A three-week routine without a cold frame' ) .
					$list(
						array(
							'<strong>Day one:</strong> choose a dull, overcast day to move plants out of a propagator; they wilt less.',
							'<strong>Week one:</strong> stand the pots in a sheltered spot in front of a south-facing wall, under two layers of row cover. Bring them in every evening.',
							'<strong>Week two:</strong> take away one layer of row cover. Toward the end of the week, uncover them during the day.',
							'<strong>Week three:</strong> if the weather is mild, leave them out overnight under row cover. By the end of the week they can stay out uncovered.',
							'<strong>Then:</strong> plant them into their final containers.',
						)
					) .
					$p( 'The RHS also describes a quicker version for vegetables, about 10–14 days: start with a warm, still day outside, back in at night, then whole days out under row cover. Keep an old curtain or spare row cover handy for a sudden frost late in spring.' ) .

					$h2( 'With a cold frame' ) .
					$p( 'A cold frame makes it easier. In the first week, prop the lid open a little by day and close it at night. Over the next two weeks, open it wider each day until it comes off altogether. You can <a href="/projects/make-a-mini-cold-frame/">build a small frame for a balcony</a>.' ) .

					$h2( 'Balcony points' ) .
					$p( 'Strong wind is one of the main limits on a balcony, and young plants are the most exposed to it. Use the most sheltered corner you have, behind a wall or solid end panel, and weigh or clip the row cover down. Small pots on a high balcony can be blown over, so stand them on the floor in a tray, never on the railing or a ledge.' ) .

					$h2( 'Problems to watch for' ) .
					$list(
						array(
							'Cold damage after a chilly night: cut off the damaged growth and keep going.',
							'Aphids, which can multiply quickly in warm spells.',
						)
					),
			),

			'how-to-fertilize-container-plants' => array(
				'image_prompt' => 'A watering can with diluted liquid seaweed feed being poured at the base of a fruiting cherry tomato plant in a large pot on a sunny balcony, a bottle of feed with a blank label and a measuring cap on the floor beside it, summer light.' . $photo_end,
				'pin_prompt'   => 'Liquid plant feed being measured into a watering can next to pots of tomatoes, beans and herbs on a sunny patio, photographed vertically.' . $pin_end,
				'title'        => 'How to Feed Container Plants',
				'topic'        => 'soil-feeding',
				'excerpt'      => 'The food in fresh potting mix runs low about six weeks after planting, so from then on feed fruit and vegetables in pots with a liquid fertilizer about every two weeks from mid-spring to the end of summer. Use a high-potassium feed such as tomato feed once fruiting crops flower, follow the dose on the label, and stop feeding once summer ends.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'General-purpose liquid feed', 'note' => 'For leafy crops and young plants. Seaweed-based feeds are an organic option.', 'url' => '' ),
						array( 'name' => 'High-potassium liquid feed (tomato feed)', 'note' => 'For tomatoes, chili peppers, beans and other fruiting crops once they flower.', 'url' => '' ),
						array( 'name' => 'Controlled-release fertilizer granules', 'note' => 'Mixed into potting mix for shrubs, fruit bushes and other long-term pots.', 'url' => '' ),
						array( 'name' => 'Liquid fertilizer for acid-loving plants (ericaceous feed)', 'note' => 'For acid-loving plants such as blueberries.', 'url' => '' ),
						array( 'name' => 'Measuring jug or the cap on the bottle', 'note' => 'Measure every time: too strong a feed can damage roots.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is homemade comfrey or nettle feed good enough for pots?', 'answer' => 'Yes. The RHS lists nettle and comfrey feeds alongside bought organic feeds. Because they are weaker, give them weekly to fruit and vegetables rather than every two weeks.' ),
						array( 'question' => 'What do the three numbers on a fertilizer label mean?', 'answer' => 'They are the proportions of nitrogen (N), phosphorus (P) and potassium (K). Nitrogen drives leaves and stems, phosphorus roots and shoots, and potassium flowers and fruit.' ),
						array( 'question' => 'Can I feed too much?', 'answer' => 'Yes. Extra nitrogen gives lush, soft growth that copes badly with poor weather and attracts pests and diseases, and too much fertilizer harms the life in the potting mix. Use the smallest dose that gives the crop you want.' ),
						array( 'question' => 'Do herbs in pots need feeding?', 'answer' => 'Mediterranean herbs such as thyme, sage and rosemary need very little.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Nutrition: feeding plants', 'url' => 'https://www.rhs.org.uk/garden-jobs/nutrition-feeding-plants' ),
						array( 'title' => 'RHS — Fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertilisers' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Hanging baskets', 'url' => 'https://www.rhs.org.uk/container-gardening/hanging-baskets' ),
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'A plant in the ground can send roots out in search of food. A plant in a pot has only the potting mix you gave it, and every watering washes some of the nutrients out of the drainage holes. That is why the RHS, which says most garden plants need little or no fertilizer, makes an exception for containers, and especially for fruit and vegetables in them.' ) .

					$h2( 'When to start' ) .
					$p( 'Fresh potting mix contains enough food for the first few weeks. The RHS suggests starting to feed about six weeks after planting, when it begins to run out. The bag usually says how long its added fertilizer lasts, so check it. Seedlings are the exception: once their first leaves have formed, a weak liquid feed helps them along, ideally one higher in nitrogen than potassium.' ) .

					$h2( 'How often' ) .
					$p( 'Feed through the growing season, from mid-spring to the end of summer. As a guide from the RHS:' ) .
					$list(
						array(
							'<strong>Fruit and vegetables</strong> such as tomatoes, cucumbers, beans and chili peppers: a liquid feed every two weeks, or weekly with a homemade feed.',
							'<strong>Summer bedding and edible flowers:</strong> three or four liquid feeds over the summer.',
							'<strong>Fruit bushes, trees and other perennials:</strong> a liquid feed once a month, or a controlled-release fertilizer mixed in each spring.',
							'<strong>Acid-loving plants</strong> such as blueberries: a liquid feed for acid-loving plants (ericaceous feed), or seaweed feed with added iron, once a month.',
						)
					) .
					$p( 'Once summer ends, stop. Late feeding produces soft new growth that has no time to toughen before winter. Short-lived summer plants can carry on until early fall.' ) .

					$h2( 'Which feed' ) .
					$p( 'Liquid feeds act fast and suit pots best. A general-purpose feed contains nitrogen, phosphorus and potassium; with soilless potting mix, choose one that also lists trace elements. Once fruiting crops start to flower, switch to a high-potassium feed such as tomato feed, because potassium supports flowering and fruiting. The RHS gives beans in containers a high-potassium feed every two weeks from the first flowers.' ) .
					$p( 'Organic feeds based on seaweed, or homemade nettle and comfrey feeds, work too; they are weaker, so use them more often. Dry granules and pellets release food slowly and are best mixed into the potting mix when you plant, top-dress or <a href="/how-to-repot-container-plants/">repot</a>.' ) .

					$h2( 'How to feed without harm' ) .
					$list(
						array(
							'Read the label and measure the dose. Never make it stronger.',
							'Water a dry pot first, then feed. Feed poured onto dry potting mix can damage the roots.',
							'Pour liquid feed onto the potting mix, not over the leaves, unless the label says it is a foliar feed. On leaves, spray on a dull day so they do not scorch.',
							'Keep granules away from stems and leaves.',
						)
					) .

					$h2( 'Hanging baskets and window boxes' ) .
					$p( 'Small containers run out of food and water fastest. Water hanging baskets of edibles before every feed, and give them a liquid feed now and then from mid-spring to the end of summer. Winter baskets do not need feeding.' ) .

					$h2( 'If the leaves change color' ) .
					$p( 'Pale, yellow or purplish leaves can mean the plant lacks a nutrient, but watering is a more common cause in pots; our guide to <a href="/problems/yellow-leaves-container-plants/">yellow leaves on container plants</a> helps you tell which.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Feeding a plant you have just potted into fresh potting mix.',
							'Guessing the dose instead of measuring it.',
							'Keeping fruiting crops on a high-nitrogen feed once they flower: nitrogen pushes leaves, while potassium supports flowers and fruit.',
							'Feeding through fall and winter.',
						)
					),
			),

			'how-to-repot-container-plants' => array(
				'image_prompt' => 'A young potted bay tree lifted out of its plastic pot on a balcony potting tray, its root ball showing white roots circling the outside, a slightly larger terracotta pot beside it part-filled with fresh dark peat-free potting mix, a trowel and a pair of pruners nearby.' . $photo_end,
				'pin_prompt'   => 'Hands lowering a plant with a tidy root ball into a new pot of peat-free potting mix on a patio table, photographed vertically from above.' . $pin_end,
				'title'        => 'How to Repot Container Plants',
				'topic'        => 'soil-feeding',
				'excerpt'      => 'Repot a long-lived container plant every three to five years, ideally in spring, when its roots circle the pot or grow out of the holes. Move it into a pot no more than a third larger, or trim the roots and put it back in the same pot with fresh peat-free potting mix.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'New pot with drainage holes', 'note' => 'No more than a third larger than the old one; for small pots, 1–2 in (2.5–5 cm) wider and deeper.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'note' => 'Suits most plants in containers.', 'url' => '' ),
						array( 'name' => 'Peat-free soil-based potting mix', 'note' => 'For shrubs and fruit trees that stay in the same pot for years. Heavier, which matters on a balcony.', 'url' => '' ),
						array( 'name' => 'Old knife, pruners or pruning saw', 'note' => 'For freeing a stuck root ball and trimming roots.', 'url' => '' ),
						array( 'name' => 'Controlled-release fertilizer', 'note' => 'Mixed into the fresh potting mix of long-term plants.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How do I know a plant needs repotting?', 'answer' => 'Lift it out of its pot and look. Roots spiralling round the bottom and sides, or poking out of the drainage holes, mean it is short of room. Growth slowing down despite feeding and watering is another sign.' ),
						array( 'question' => 'Why not move it straight into a much bigger pot?', 'answer' => 'A pot far too big holds a mass of potting mix the roots cannot reach, which stays wet. This is called overpotting. Go up gradually instead.' ),
						array( 'question' => 'Can I repot in fall?', 'answer' => 'It is best avoided. Growth slows or stops in fall and winter, so fresh potting mix around the roots stays too wet. Spring, as growth starts, is ideal, and early to midsummer also works for many plants.' ),
						array( 'question' => 'What if my plant is already in the largest pot I can manage?', 'answer' => 'Trim its roots and return it to the same pot with fresh potting mix. A light trim of up to about 15% of the roots every few years keeps many plants healthy in the same container.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to repot a plant', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-repot-a-plant' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Roots in a pot have nowhere else to go. In time they fill the container, and the potting mix itself slumps as it breaks down, holding less air, water and food. Growth slows, and a dense mat of roots can block drainage so the mix stays saturated and the roots rot. Repotting gives them room and a fresh, open mix again.' ) .

					$h2( 'When to repot' ) .
					$p( 'Most long-lived container plants need it every three to five years; vigorous plants and small pots need it sooner. Spring, when plants start into growth, is the best time, and early to midsummer is fine for many. Avoid fall and winter, when the roots are barely active.' ) .
					$p( 'Young plants that will end up in a large container are best moved up in stages, through progressively bigger pots, rather than planted into the final pot straight away.' ) .

					$h2( 'Bigger pot, or the same pot?' ) .
					$p( 'If the plant is still meant to grow, move it into a pot no more than a third larger than the current one. For pots under 10 in (25 cm) across, that means one about 1–2 in (2.5–5 cm) wider and deeper. Bigger jumps leave wet, unused potting mix around the roots.' ) .
					$p( 'If it is as big as you want it, or the pot is already as heavy as your balcony can sensibly take, root-prune it and replant into the same container. On a balcony, remember that soil-based potting mix and big pots add a lot of weight; see <a href="/how-to-arrange-pots-in-a-small-space/">how to arrange pots in a small space</a>.' ) .

					$h2( 'How to repot, step by step' ) .
					$list(
						array(
							'<strong>Take the plant out.</strong> Hold the pot down and pull upwards by the sturdy main stems. If it sticks, lay the pot on its side and ease the plant out, or support it with one hand and tip it upside down. It slides out more easily when the potting mix is fairly dry. A plant stuck fast in a pot that narrows at the top may need a knife run around the inside.',
							'<strong>Look at the roots.</strong> Tease out roots that circle the root ball. Cut off any that are soft and rotten and watch for black vine weevil grubs in the potting mix.',
							'<strong>Trim if it is going back in the same pot.</strong> Cut away up to a quarter of the outer roots of a pot-bound plant, or slice a layer off one side or the base of a very congested root ball. Reducing a large root ball over a few years is less of a shock.',
							'<strong>Put fresh potting mix in the base</strong> and firm it lightly, so the top of the root ball will sit just below the rim.',
							'<strong>Fill around the sides</strong> with fresh potting mix, firming as you go to remove air pockets. Cover the top roots lightly, without piling mix against the stems.',
							'<strong>Water thoroughly</strong> with a fine rose until water runs from the drainage holes.',
						)
					) .

					$h2( 'Which potting mix' ) .
					$p( 'Peat-free all-purpose potting mix suits most container plants. For shrubs, fruit trees and bushes that will stay put for years, a soil-based potting mix holds its structure longer; in the UK, choose a peat-free John Innes No. 3. Mixing a controlled-release fertilizer into the new mix feeds long-term plants for the season.' ) .

					$h2( 'Refreshing without repotting' ) .
					$p( 'In the years between repotting, or for pots too big to lift, you can replace just the top layer of potting mix; this, and what to do with the old mix, is covered in <a href="/potting-mix-for-containers/">filling, refreshing and reusing potting mix in pots</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Jumping several pot sizes at once.',
							'Repotting in late fall or winter.',
							'Burying the stem deeper than it was before.',
							'Leaving circling roots wound tight instead of teasing them out.',
							'Forgetting the first long soak after repotting.',
						)
					),
			),
		),

		'project' => array(
			'grow-sprouts-in-a-jar' => array(
				'image_prompt' => 'A large clean glass jar lying tilted at an angle on a dish rack on a kitchen counter, out of direct sun, its neck covered with cheesecloth held by a rubber band, filled about a third with mung bean sprouts with short white shoots, a second jar of alfalfa sprouts with tiny green tips beside it.' . $photo_end,
				'pin_prompt'   => 'Two glass sprouting jars with cheesecloth tops on a bright kitchen counter, one with crisp white bean sprouts and one with fine green alfalfa sprouts, photographed vertically.' . $pin_end,
				'title'        => 'Make a Jar for Sprouting Seeds',
				'category'     => array( 'planters' ),
				'plants'       => array(),
				'excerpt'      => 'Stretch cheesecloth over the neck of a clean jar, soak seeds sold for sprouting, then rinse and drain them twice a day; most are ready in two to six days. Raw sprouts carry a food-poisoning risk from the seed itself, so follow the safety advice here, and cook them for anyone at higher risk.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => '10 minutes to set up; a few minutes twice a day for 2–6 days',
					'cost'           => 'Low',
					'size'           => 'One large glass jar',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Use only seed sold specifically for sprouting, never garden seed packets, which may be treated.' ),
						array( 'point' => 'Young children, older people and anyone whose immune system is weakened should not eat raw sprouts. Cook them until steaming hot instead.' ),
						array( 'point' => 'Keep the jar away from food preparation areas, away from pets, and out of busy corners of the kitchen.' ),
						array( 'point' => 'Throw away any sprouts that look slimy or discolored.' ),
					),
					'materials' => array(
						array( 'name' => 'Large glass jar', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Cheesecloth or fine cotton cloth', 'quantity' => 'A square big enough to cover the neck', 'url' => '' ),
						array( 'name' => 'Strong rubber band', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Seeds sold for sprouting (mung beans, alfalfa, aduki beans or a broccoli mix)', 'quantity' => 'Enough to fill about a third of the jar once swollen', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Bowl or dish rack to drain the jar at an angle', 'url' => '' ),
						array( 'name' => 'Sieve', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Clean the jar', 'text' => 'Wash the jar and cloth thoroughly before every batch.', 'tip' => '' ),
						array( 'title' => 'Rinse the seed', 'text' => 'Rinse the seed under running cold water. Then cover it with water in a bowl and skim off any seeds that float, loose seed coats and bits of debris.', 'tip' => 'Researchers at the University of California link most contamination to this floating material.' ),
						array( 'title' => 'Soak', 'text' => 'Put the seed in the jar, filling no more than about a third so the sprouts have room. Fill with cold water, cover the neck with cheesecloth and a rubber band, and leave to soak for 6–12 hours.', 'tip' => '' ),
						array( 'title' => 'Drain', 'text' => 'Pour the water out through the cheesecloth and stand the jar tilted, neck down, so every drop can run away. Keep it somewhere airy and out of direct sun.', 'tip' => 'Seeds go moldy more easily in a closed cupboard than in a well-ventilated spot.' ),
						array( 'title' => 'Rinse twice a day', 'text' => 'Morning and evening, fill the jar with cold water through the cheesecloth, swirl, and drain completely again.', 'tip' => 'Only white mung bean sprouts need to be kept dark; other seeds sprout in daylight.' ),
						array( 'title' => 'Harvest', 'text' => 'Beans and peas are usually ready in 2–4 days, smaller seeds such as alfalfa in 4–6. Taste them at different stages to find what you like. Let them dry for a few hours, then keep them in the fridge.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Are home-grown sprouts safer than shop-bought ones?', 'answer' => 'Not necessarily. In outbreaks linked to sprouts, the seed was usually the source, and bacteria on it can multiply during sprouting even in a clean kitchen. That is why cooking is advised for people at higher risk.' ),
						array( 'question' => 'What is the difference between sprouts and microgreens?', 'answer' => 'Sprouts grow in water in a jar and are eaten whole, root and all, after a few days. Microgreens are sown in potting mix, grown in light for a week or more, and cut above the mix. See our guide to microgreens on a windowsill.' ),
						array( 'question' => 'Which seeds are easiest to start with?', 'answer' => 'Mung beans and aduki beans are quick, usually ready in 2–4 days. Alfalfa has a mild, nutty taste and takes 4–6 days.' ),
					),
					'sources'   => array(
						array( 'title' => 'University of California ANR — Growing seed sprouts at home (Publication 8151)', 'url' => 'https://ucanr.edu/sites/default/files/2024-02/393187.pdf' ),
						array( 'title' => 'Penn State Extension — What you should know about sprouts', 'url' => 'https://extension.psu.edu/what-you-should-know-about-sprouts' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Sprouting seeds need only water, air and warmth. A jar with a cloth top lets you soak them, then drain them so they stay moist without sitting in water. Rinsing twice a day keeps them fresh and stops them drying out. No potting mix and no window are needed, so you can do it on a kitchen counter at any time of year.' ) .
					$p( 'If you would rather grow tiny seedlings in potting mix and cut them, that is a different crop: see <a href="/plants/microgreens-on-a-windowsill/">microgreens on a windowsill</a>.' ) .
					$h2( 'Food safety' ) .
					$p( 'Raw sprouts have been linked to outbreaks of food poisoning from Salmonella and E. coli. Extension services at the University of California and Penn State explain that the seed is usually the source, and that the warm, wet conditions of sprouting also suit bacteria. Cooking sprouts greatly reduces the risk, and both advise that young children, older people and people with weakened immune systems should not eat them raw. Buy seed sold for sprouting, keep the jar clean, and discard any that turn slimy or discolored.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The jar, cloth and rinse routine follow Backyard Harvest (pp. 36–37). The seed rinsing, hygiene and safety points follow the University of California and Penn State extension guidance. We have not built this exact version ourselves.' ),
			),

			'make-a-seedling-light-box'     => array(
				'image_prompt' => 'A small cardboard box on a sunny windowsill with its front side cut away facing the window glass and its back and sides lined with shiny kitchen foil, a tray of straight, sturdy young tomato seedlings inside lit evenly from all sides, a waterproof tray under the pots.' . $photo_end,
				'pin_prompt'   => 'A foil-lined cardboard box with its open side facing a bright window and young seedlings standing upright inside, photographed vertically from the room side.' . $pin_end,
				'title'        => 'Make a Seedling Light Box from a Cardboard Box',
				'category'     => array( 'planters' ),
				'plants'       => array( 'cherry-tomato', 'chili-peppers-in-pots', 'bell-peppers-in-pots', 'genovese-basil' ),
				'excerpt'      => 'Cut the front off a small cardboard box, line the inside with kitchen foil and stand your seedlings in it with the open side facing the window. The foil bounces light back onto the room side of the plants, so they grow straighter instead of leaning towards the glass.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 15 minutes',
					'cost'           => 'Low',
					'size'           => 'To fit your seed tray and windowsill',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Wet cardboard goes soft and grows mold: stand the pots in a waterproof tray inside the box and never water into the cardboard.' ),
						array( 'point' => 'Make sure the box sits fully on the sill and cannot tip off when you open a window.' ),
						array( 'point' => 'Cut away from your hand with a craft knife, on a board.' ),
					),
					'materials' => array(
						array( 'name' => 'Small cardboard box, a little larger than your seed tray', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Aluminum foil', 'quantity' => 'Enough to line the back, sides and base', 'url' => '' ),
						array( 'name' => 'Glue stick or tape', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Shallow waterproof tray', 'quantity' => '1', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Craft knife or strong scissors', 'url' => '' ),
						array( 'name' => 'Cutting board', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Choose the box', 'text' => 'Pick a box that holds your tray or pots with a little room to spare and fits on the windowsill. Its sides should be higher than the seedlings will grow in the next few weeks.', 'tip' => '' ),
						array( 'title' => 'Cut away the front', 'text' => 'Remove the top flaps and cut out one long side completely. That open side will face the window.', 'tip' => '' ),
						array( 'title' => 'Line it with foil', 'text' => 'Glue or tape foil, shiny side out, over the inside of the back wall, the two ends and the base.', 'tip' => '' ),
						array( 'title' => 'Add the tray', 'text' => 'Put a waterproof tray in the base, then stand the seed pots in it.', 'tip' => '' ),
						array( 'title' => 'Set it in the window', 'text' => 'Place the box on your brightest windowsill, open side to the glass, so daylight enters and bounces back off the foil onto the shaded side of the seedlings.', 'tip' => 'The RHS suggests a south- or west-facing windowsill for raising seedlings.' ),
						array( 'title' => 'Keep turning', 'text' => 'Turn the pots every day or two all the same, and lift the whole box into the room on frosty nights, when windowsills turn cold.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Is a light box as good as a grow light?', 'answer' => 'No. It only redirects the daylight your window already gets, so seedlings get light from more sides. Where the window is simply too dim, the RHS suggests adding a simple grow light.' ),
						array( 'question' => 'Can I leave seeds in the box before they come up?', 'answer' => 'Yes, as long as they are warm enough to germinate. The box matters most once the seedlings appear and start reaching for light.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How plants sense the environment', 'url' => 'https://www.rhs.org.uk/advice/understanding-plants/how-plants-sense-the-environment' ),
						array( 'title' => 'RHS — How to sow seeds indoors', 'url' => 'https://www.rhs.org.uk/propagation/seed-indoors' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Plants grow towards light, a response called phototropism. On a windowsill all the light comes from one side, so seedlings bend that way and can end up crooked and weak. The foil reflects some of the window light back onto the room side, so the seedlings receive light from more directions and grow more upright.' ) .
					$p( 'The box helps prevent leaning; it does not fix seedlings that have already stretched. For that, see <a href="/problems/leggy-seedlings/">tall, pale and floppy seedlings</a>, and for the whole sowing method, <a href="/how-to-start-seeds-indoors/">how to sow seeds indoors</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The cardboard box with its front cut away and its back lined with foil is described in Backyard Harvest (p. 13). The RHS explains why seedlings lean and advises giving them all-round light. We added the waterproof tray and the other checks. We have not built this exact version ourselves.' ),
			),

			'plant-a-vegetable-hanging-basket' => array(
				'image_prompt' => 'A wire hanging basket lined with coir hanging from a strong black wall bracket screwed into a brick wall on a sunny, sheltered patio, planted with a trailing cherry tomato in the center, loose-leaf lettuce and thyme around the edge, small red and green tomatoes hanging over the rim, summer light.' . $photo_end,
				'pin_prompt'   => 'A productive hanging basket with a trailing tomato, salad greens and herbs spilling over a coir liner, hanging on a sturdy bracket against a sunny wall, photographed vertically.' . $pin_end,
				'title'        => 'Plant a Vegetable Hanging Basket',
				'category'     => array( 'vertical' ),
				'plants'       => array( 'cherry-tomato', 'salad-greens-in-pots', 'lettuce-in-pots', 'balcony-strawberry', 'thyme-in-pots', 'arugula-in-pots' ),
				'excerpt'      => 'Line a basket, fill it with peat-free potting mix and plant a trailing tomato or upright herbs in the middle with salad greens, strawberries or trailing herbs round the edge. A watered basket is heavy, so hang it from a strong bracket fixed into a solid wall, in a sunny, sheltered spot you can reach safely.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About an hour',
					'cost'           => 'Low',
					'size'           => 'One basket; most hold a single tomato plant',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'A basket full of wet potting mix and plants is heavy. Use a bracket and fixings made for hanging baskets, screwed into solid masonry, and check them, the chains and the hook each spring.' ),
						array( 'point' => 'Never hang a basket outside the railing or over a path or a neighbor\'s balcony, where it could fall or drip on someone.' ),
						array( 'point' => 'Hang it where you can water it without leaning over a railing or standing on a chair.' ),
						array( 'point' => 'Soil-based potting mix adds weight. For a one-season basket, peat-free all-purpose potting mix is enough.' ),
					),
					'materials' => array(
						array( 'name' => 'Hanging basket with chains', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Liner (coir, jute, or moss from your own lawn)', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'quantity' => 'Enough to fill the basket', 'url' => '' ),
						array( 'name' => 'Slow-release fertilizer', 'quantity' => 'As the label says for the volume of mix', 'url' => '' ),
						array( 'name' => 'Young plants: one trailing tomato, or compact herbs, plus salad greens or strawberries', 'quantity' => '4–6 small plants', 'url' => '' ),
						array( 'name' => 'Wall bracket and fixings rated for a hanging basket', 'quantity' => '1', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Wide, short pot to stand the basket on while planting', 'url' => '' ),
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Watering can with a fine rose', 'url' => '' ),
						array( 'name' => 'Drill and level for the bracket', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Steady the basket', 'text' => 'Sit the basket on a wide, short pot so it stays level while you work.', 'tip' => '' ),
						array( 'title' => 'Line it', 'text' => 'Fit a coir or jute liner. If you use moss raked from your lawn, press a layer about ½ in (1.5 cm) thick against the frame. Avoid bought sphagnum moss unless it comes from a sustainable source.', 'tip' => '' ),
						array( 'title' => 'Fill and add food', 'text' => 'Half-fill with peat-free potting mix and stir in slow-release fertilizer at the rate on the pack.', 'tip' => '' ),
						array( 'title' => 'Plant the sides (optional)', 'text' => 'Cut small holes in the liner at least 4 in (10 cm) above the base. Wrap the root ball of a small plant such as a lettuce or strawberry in a twist of newspaper, push it through from outside, and cover the roots with potting mix.', 'tip' => 'Planting through the sides fills the basket out faster, but it is not essential.' ),
						array( 'title' => 'Plant the top', 'text' => 'Put the upright plant, or the single tomato, in the center and the trailing or low plants around the edge, close together. Fill the gaps with potting mix, leaving no big pockets, and stop about 2 in (5 cm) below the rim so there is room for water.', 'tip' => '' ),
						array( 'title' => 'Water, then hang', 'text' => 'Water slowly and thoroughly with a fine rose. Hang the basket outside once your last spring frost has passed, in a sunny, sheltered spot.', 'tip' => 'Fix and test the bracket before you lift the basket up.' ),
					),
					'faq'       => array(
						array( 'question' => 'Which vegetables grow best in a hanging basket?', 'answer' => 'Trailing tomatoes, strawberries, salad greens such as loose-leaf lettuce and arugula, and compact herbs like thyme and marjoram. Dwarf or trailing kinds, and crops you pick young, suit a basket best.' ),
						array( 'question' => 'How often does a vegetable basket need water?', 'answer' => 'Check it every day in summer; in hot weather it may need water twice a day. Nudge the basket from below: if it feels light, water it. A basket that dries out completely is hard to rewet, so water slowly.' ),
						array( 'question' => 'How many tomato plants fit in a basket?', 'answer' => 'Usually one. A tomato needs a lot of water and food, and most baskets hold only enough potting mix for a single plant.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to plant a hanging basket', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-plant-a-hanging-basket' ),
						array( 'title' => 'RHS — Hanging baskets', 'url' => 'https://www.rhs.org.uk/container-gardening/hanging-baskets' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A basket puts crops at eye level, close to the kitchen door, and uses wall space instead of floor space. Upright plants go in the middle and trailing ones round the edge so the basket fills out quickly. Because baskets hold little potting mix, they dry out faster than any other container, and watering is the main job.' ) .
					$h2( 'Care through the summer' ) .
					$list(
						array(
							'Check the potting mix every day, and water before the plants droop. If they do wilt, hold a bucket underneath while you water and pour the run-off back in.',
							'If the basket is too heavy to lift down, water it in place with a hose on a gentle spray.',
							'Water first, then feed. From mid-spring to the end of summer, give a liquid feed now and then, switching tomatoes to a high-potassium feed once they flower. See <a href="/how-to-fertilize-container-plants/">how to feed container plants</a>.',
							'Pick often: salad greens and herbs keep producing when cut young.',
						)
					) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The planting method and the choice of crops come from Backyard Harvest (pp. 116–117) and the RHS guides to hanging baskets. Where they differ, on feeding, we follow the RHS. The bracket, weight and position checks are common-sense safety points we added for balconies. We have not built this exact version ourselves.' ),
			),

			'make-a-bean-tepee-in-a-pot'    => array(
				'image_prompt' => 'A large heavy plastic container at least 30 in (75 cm) wide on a sunny, sheltered balcony floor against a wall, five tall bamboo canes pushed into the potting mix in a circle and tied together at the top with garden twine, pole bean plants with heart-shaped leaves twining up the canes, some hanging green pods, summer light.' . $photo_end,
				'pin_prompt'   => 'A bamboo-cane tepee in a wide pot on a patio covered in climbing bean plants with red flowers and long green pods, photographed vertically from a low angle.' . $pin_end,
				'title'        => 'Make a Bean Tepee in a Pot',
				'category'     => array( 'supports' ),
				'plants'       => array( 'green-beans-in-pots', 'runner-beans-in-pots' ),
				'excerpt'      => 'Push five canes into a heavy container at least 30 in (75 cm) across and 18 in (45 cm) deep, tie them together at the top and again lower down, and sow or plant one or two climbing beans at the foot of each cane. On a balcony, choose the most sheltered spot and stop the beans at the top of the canes so the tepee does not become top-heavy.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 30 minutes',
					'cost'           => 'Low',
					'size'           => 'Container at least 30 in (75 cm) across and 18 in (45 cm) deep',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'A tepee covered in beans catches the wind like a sail. Use a wide, heavy container that will not tip over, and put it in the most sheltered spot you have, against a wall and away from the railing.' ),
						array( 'point' => 'Tie the canes firmly where they cross and again lower down, so the frame cannot splay out under the weight of the crop.' ),
						array( 'point' => 'Check that the canes clear any balcony or ceiling above.' ),
						array( 'point' => 'A large pot of wet potting mix is very heavy. On a balcony, stand it near a load-bearing wall.' ),
						array( 'point' => 'On an exposed site, bush beans, which need no tepee, are the safer choice.' ),
					),
					'materials' => array(
						array( 'name' => 'Container with drainage holes, at least 30 in (75 cm) across and 18 in (45 cm) deep', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Bamboo canes or hazel poles, 8 ft (2.5 m)', 'quantity' => '5', 'url' => '' ),
						array( 'name' => 'Garden twine', 'quantity' => '1 ball', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose or soil-based potting mix', 'quantity' => 'Enough to fill the container', 'url' => '' ),
						array( 'name' => 'Pole bean or runner bean seed, or young plants', 'quantity' => '1–2 per cane', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors', 'url' => '' ),
						array( 'name' => 'Watering can', 'url' => '' ),
						array( 'name' => 'Stepladder, used on level ground and never against a railing', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Fill the container', 'text' => 'Put the container in its final, sheltered, sunny spot first, because it will be too heavy to move once full. Fill it with peat-free all-purpose or soil-based potting mix.', 'tip' => '' ),
						array( 'title' => 'Push in the canes', 'text' => 'Push five canes deep into the potting mix in a circle near the edge, about 6 in (15 cm) apart at the base, angling them inwards.', 'tip' => 'The RHS advises putting supports in before sowing or planting.' ),
						array( 'title' => 'Tie the top and the middle', 'text' => 'Gather the tops where they cross and bind them tightly with twine. Add a second ring of twine around the canes lower down to stop the frame buckling outwards.', 'tip' => '' ),
						array( 'title' => 'Sow or plant', 'text' => 'Once all danger of frost has passed, sow beans 2 in (5 cm) deep, one or two at the foot of each cane, and thin to the strongest. Or plant young plants raised indoors, once hardened off.', 'tip' => 'For an earlier crop, start seeds indoors in mid-spring; see how to start seeds indoors.' ),
						array( 'title' => 'Tie in the young shoots', 'text' => 'Loosely tie each young plant to its cane so it starts climbing the right way. After that, the stems twine around the canes on their own; tie in any that blow loose.', 'tip' => '' ),
						array( 'title' => 'Stop them at the top', 'text' => 'When the beans reach the tops of the canes, pinch or cut off the tips. This encourages side shoots lower down, keeps the pods within reach and stops the tepee getting top-heavy.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Can I grow climbing beans in a smaller pot?', 'answer' => 'The RHS gives at least 30 in (75 cm) across and 18 in (45 cm) deep for climbing beans. In a smaller pot, grow bush beans or dwarf runner beans, which need no supports and suit containers 12–18 in (30–45 cm) wide.' ),
						array( 'question' => 'Do beans in a pot need feeding?', 'answer' => 'Yes. In a container, give them a high-potassium liquid feed, such as tomato feed, every two weeks from the first flowers, and water generously once they flower.' ),
						array( 'question' => 'Can I grow anything else up a tepee?', 'answer' => 'Peas and sweet peas also climb tepees, but peas hold on with tendrils and need twiggy sticks or netting added to grip.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow French beans', 'url' => 'https://www.rhs.org.uk/vegetables/french-beans/grow-your-own' ),
						array( 'title' => 'RHS — How to grow runner beans', 'url' => 'https://www.rhs.org.uk/vegetables/runner-beans/grow-your-own' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Climbing beans twist their stems around smooth upright supports, so a ring of canes tied at the top gives them all the height they need from one container. Growing upwards gives a large crop from a small patch of floor, which is why a tepee suits a patio or balcony.' ) .
					$h2( 'Wind on a balcony' ) .
					$p( 'On a balcony the wind is often the biggest problem, and a tall frame clothed in leaves feels all of it. Choose the most sheltered place, behind a wall or solid panel; a slatted screen filters wind better than a solid one. Heavier containers, and soil-based potting mix, resist toppling; if your pot is light, the RHS suggests fixing it so it cannot blow over. Check the ties after every windy spell.' ) .
					$h2( 'Water and picking' ) .
					$p( 'Beans in containers dry out quickly and need generous watering, especially once they flower and set pods. Pick the pods young and often, every few days at the peak, or the plants stop flowering. For growing details, see <a href="/plants/green-beans-in-pots/">green beans in pots</a> and <a href="/plants/runner-beans-in-pots/">runner beans in pots</a>.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Tepees in large containers are described in Backyard Harvest (pp. 84 and 88–89), including tying the canes at the top and lower down. Container size, cane height, spacing, sowing and stopping the plants follow the RHS guides to French (green) and runner beans. We added the balcony checks. We have not built this exact version ourselves.' ),
			),
		),
	),
);
