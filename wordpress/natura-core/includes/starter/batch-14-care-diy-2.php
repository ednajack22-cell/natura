<?php
/**
 * Starter guides, batch 14 (small-space growing): six Plant Care articles
 * on layout, succession planting, vacation watering, green tomatoes, storing
 * herbs and saving seed, and three DIY projects adapted from sources.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from the RHS pages listed in each guide (checked 17 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the two differ, the RHS is
 * followed. Seasons replace the UK month names.
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
	'name'   => __( 'Small-space growing', 'natura-core' ),
	'guides' => array(
		'post'    => array(
			'how-to-arrange-pots-in-a-small-space'  => array(
				'image_prompt' => 'A narrow sunny balcony laid out for food growing: a bush tomato in a large plastic pot against the back wall, a low trough of salad greens and scallions in front, a metal tiered plant stand with herb pots climbing the side wall, pots raised on pot feet, a slatted screen at one end, late morning summer light.' . $photo_end,
				'pin_prompt'   => 'A small balcony corner seen from the doorway, with tiered shelves of herb pots, a wide trough of lettuce and radishes on the floor and a tall tomato in a large pot by the wall, photographed vertically.' . $pin_end,
				'title'        => 'How to Arrange Pots in a Small Space',
				'topic'        => 'light-position',
				'excerpt'      => 'Put the sun-lovers in your sunniest, most sheltered spot, the heaviest pots by a load-bearing wall, and the shade-tolerant leaves where the light is weaker. Then fill every gap in time as well as space: sow quick crops between slow ones, and follow each finished crop with another.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'A few large containers rather than many small ones', 'note' => 'Large pots dry out more slowly, so they need less watering.', 'url' => '' ),
						array( 'name' => 'Pot feet', 'note' => 'Raise containers off the floor so the roots do not get waterlogged.', 'url' => '' ),
						array( 'name' => 'Tiered plant stand', 'note' => 'Uses height against a wall for small herb pots.', 'url' => '' ),
						array( 'name' => 'Slatted or mesh screen', 'note' => 'Filters wind instead of creating eddies like a solid wall.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'note' => 'Lighter than soil-based potting mix for short-term crops.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How much weight can my balcony take?', 'answer' => 'Only a qualified structural engineer can tell you; in the UK, the RHS suggests a chartered structural engineer or a surveyor. Large containers full of wet potting mix are heavy, so check the limit before you add big pots, and stand the heaviest ones near load-bearing walls.' ),
						array( 'question' => 'What can I grow on a balcony without direct sun?', 'answer' => 'If the spot gets plenty of light but no direct sun, leafy crops are the better choice: an RHS adviser suggests mizuna, mibuna, spinach and radishes. Parsley and mint also grow in partial shade. Keep tomatoes, chilies and other fruiting crops for the sunniest place.' ),
						array( 'question' => 'What is intercropping?', 'answer' => 'Sowing a fast crop, such as radishes, lettuce or scallions, between slower plants. The quick crop is picked before the slow one needs the room, so you get two harvests from one container.' ),
						array( 'question' => 'Why do my balcony pots dry out even after rain?', 'answer' => 'An overhang from the balcony above often stops rain reaching the pots, and wind and sun dry potting mix quickly. Check the mix with your finger rather than relying on the weather.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — How to grow edibles on your balcony (Julie Henderson)', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/how-to-grow-edibles-on-your-balcony' ),
						array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — How to grow veg when you\'re short on space', 'url' => 'https://www.rhs.org.uk/garden-inspiration/grow-your-own/how-to-grow-veg-small-spaces' ),
						array( 'title' => 'RHS — How to grow radishes', 'url' => 'https://www.rhs.org.uk/vegetables/radishes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — Wind scorch and damage', 'url' => 'https://www.rhs.org.uk/prevention-protection/wind-scorch' ),
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						$book,
					),
				),
				'content'      =>
					$p( 'On a balcony or patio every square foot counts, and so does every week of the growing season. A good layout answers four questions: where the sun falls, where the wind comes from, how much weight the floor can carry, and how to keep each container producing from spring to fall.' ) .

					$h2( 'Start with weight and safety' ) .
					$p( 'Large containers full of wet potting mix are heavy. Before you plan big pots on a balcony or roof, find out what it can carry: ask a qualified structural engineer (in the UK, the RHS advises a chartered structural engineer or a surveyor). Stand the heaviest containers near load-bearing walls, which take more weight than unsupported areas.' ) .
					$p( 'Soil-based potting mix holds water better but weighs more; peat-free all-purpose potting mix is lighter but needs replacing each year. Tall, narrow pots blow over easily, especially with tall plants in them: put them in a sheltered spot, and fix any trellis or screen with well-supported fixings.' ) .

					$h2( 'Map the sun' ) .
					$p( 'You probably have only one aspect, so choose plants that suit it. Watch where the sun falls through the day before you place anything. Containers facing south or west dry out faster than those facing north or east, so the sunniest spot is also the thirstiest.' ) .
					$list(
						array(
							'<strong>Sunniest, most sheltered spot:</strong> tomatoes, which want your warmest, sunniest place out of the wind, and chilies.',
							'<strong>Bright but no direct sun:</strong> leafy crops. An RHS adviser suggests mizuna, mibuna, spinach and radishes for this kind of balcony.',
							'<strong>Part shade:</strong> parsley and mint both grow in sun or partial shade.',
						)
					) .

					$h2( 'Work with the wind' ) .
					$p( 'Strong wind and sun are the main limits on a balcony. Use any shelter you already have, such as a wall or a solid end panel. If you add a screen, choose a slatted or mesh one: a solid barrier causes turbulence on the sheltered side, while a permeable one filters the wind. Low-growing plants suffer less wind damage in exposed places.' ) .
					$p( 'Wind also knocks things over. Stand pots against a sheltered house wall where you can, but not in a gap between buildings, where the wind is squeezed and blows harder. Pots filled with light peat-free potting mix may need fixing in place on an exposed balcony. Tie tall plants to a stake as they grow, and peg or weigh down plastic cloches and covers: the RHS warns that a cloche which is not well anchored can blow away.' ) .

					$h2( 'Use height' ) .
					$p( 'When the floor is full, go up. Tiered shelves and plant stands hold small herb pots against a wall; planting pockets hung on a wall or railing take salad greens; a galvanized wire cage holds up a tomato or pepper and still lets light through. Place tall plants where they will not shade the smaller crops around them.' ) .

					$h2( 'Choose fewer, bigger containers' ) .
					$p( 'Large containers dry out more slowly than small ones, so they are less work. On a balcony that also means fewer pots to trip over. Raise containers on pot feet so the roots do not sit in water, and remember that an overhang above often stops rain reaching them.' ) .

					$h2( 'Grow quick crops between slow ones' ) .
					$p( 'Intercropping means sowing a fast crop in the gaps around a slow one. The quick crop is picked before the main crop needs the space. In a large container, put the main plant in first, with its stake, so you do not disturb the small crop later. Then sow around it.' ) .
					$list(
						array(
							'Radishes and salad greens suit gaps between slower crops such as peas and potatoes.',
							'Scallions fit between onions and carrots.',
							'Lettuce can be cut as baby leaves within weeks.',
							'Bok choy grows fast and can also be cut young.',
						)
					) .
					$p( 'Keep intercropped containers well watered and fed, because two crops are sharing one pot of potting mix.' ) .

					$h2( 'Fill the gaps in time: catch crops and follow-on crops' ) .
					$p( 'Catch-cropping fills a container that would otherwise sit empty between two longer crops. Keep a few packets of fast seed to hand, such as radishes, beets and bok choy, which can be ready in six to eight weeks. The RHS suggests pairs that work in containers:' ) .
					$list(
						array(
							'Peas, followed by salad greens for late summer.',
							'Fava beans, followed in early or midsummer by beets.',
							'Spinach, followed by zucchini in early summer.',
							'Scallions, followed in midsummer by finger carrots.',
							'Early carrots, followed by bush beans for early fall.',
						)
					) .
					$p( 'For a steady supply of quick crops through the season, sow little and often: see our guide to succession planting.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Adding big pots without knowing your balcony\'s weight limit.',
							'Putting fruiting crops in the shade and leafy crops in the hottest spot.',
							'Using a solid screen that makes the wind swirl.',
							'Many small pots that dry out in a day: fewer, larger containers are easier.',
							'Leaving a pot empty after a harvest: sow a quick crop instead.',
						)
					),
			),

			'succession-planting-small-spaces'        => array(
				'image_prompt' => 'Three matching window boxes on a sunny balcony ledge showing salad greens at three stages: freshly sown potting mix with tiny seedlings, young leaves about 2 in (5 cm) tall, and a full box of mixed lettuce and arugula ready to cut, summer daylight.' . $photo_end,
				'pin_prompt'   => 'Three small pots of lettuce at different stages, from seedlings to leaves ready to pick, lined up on a bright kitchen windowsill, photographed vertically.' . $pin_end,
				'title'        => 'Succession Planting: How to Grow Little and Often in a Small Space',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'Instead of sowing a whole packet at once, sow a small batch of quick crops every two to four weeks from spring to late summer. You get a steady supply of fresh leaves and roots, with no glut and no empty pots.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Two or three troughs or pots at least 12 in (30 cm) wide', 'note' => 'One for each batch, so a new sowing is always coming on.', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix or seed-starting mix', 'note' => 'Fresh mix for each sowing.', 'url' => '' ),
						array( 'name' => 'Mixed salad green seed', 'note' => 'Mixed packets are especially useful in small spaces.', 'url' => '' ),
						array( 'name' => 'Plant labels and a pencil or waterproof marker', 'note' => 'Note the date on each sowing.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How often should I sow?', 'answer' => 'Every two weeks is the usual rhythm, but anything from one to four weeks works depending on the crop and the weather. A good sign is when the previous batch is well developed: about four true leaves on leafy crops, or peas about 2 in (5 cm) high.' ),
						array( 'question' => 'Which crops do not need succession sowing?', 'answer' => 'Crops that fruit over a long period, such as tomatoes, peppers and eggplants, crops that store well, such as onions, and long-season winter vegetables. One sowing or planting is enough for these.' ),
						array( 'question' => 'Why did two sowings mature at the same time?', 'answer' => 'Weather changes growth rates. After a cold spell followed by warm weather, batches sown two weeks apart can catch up with each other. Sowing when the last batch is well developed, rather than by the calendar, helps.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Successional sowing', 'url' => 'https://www.rhs.org.uk/vegetables/successional-sowing' ),
						array( 'title' => 'RHS — Vegetables in containers', 'url' => 'https://www.rhs.org.uk/vegetables/containers' ),
						array( 'title' => 'RHS — How to grow salad leaves', 'url' => 'https://www.rhs.org.uk/vegetables/salad-leaves/grow-your-own' ),
						array( 'title' => 'RHS — How to grow lettuces', 'url' => 'https://www.rhs.org.uk/vegetables/lettuce/grow-your-own' ),
						array( 'title' => 'RHS — How to grow rocket', 'url' => 'https://www.rhs.org.uk/vegetables/rocket/grow-your-own' ),
						array( 'title' => 'RHS — How to grow radishes', 'url' => 'https://www.rhs.org.uk/vegetables/radishes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow coriander', 'url' => 'https://www.rhs.org.uk/herbs/coriander/grow-your-own' ),
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Sow a whole packet of lettuce in one go and you get thirty lettuces in the same two weeks, then nothing. Succession planting means sowing small batches at regular intervals, so a new batch is ready as the last one finishes. In a small space it also keeps every container working.' ) .

					$h2( 'Which crops to sow little and often' ) .
					$p( 'Quick-maturing crops that do not keep well are the ones to sow in small batches:' ) .
					$list(
						array(
							'<strong>Salad greens and lettuce:</strong> sow a small batch every few weeks; each cut-and-come-again sowing gives two or three pickings.',
							'<strong>Arugula:</strong> salad arugula is short-lived, so sow small batches every few weeks.',
							'<strong>Radishes:</strong> small batches every few weeks in spring and late summer.',
							'<strong>Cilantro:</strong> it runs to seed quickly, so for leaves sow small batches about every month.',
							'<strong>Scallions, carrots, bush beans, peas and spinach.</strong>',
						)
					) .
					$p( 'Crops prone to bolting, such as cilantro, arugula and spinach, benefit most, because each batch only lasts a short time.' ) .

					$h2( 'Crops that do not need it' ) .
					$p( 'Tomatoes, peppers and eggplants fruit over a long period, so one planting is enough. Onions and pumpkins store well. Long-season winter vegetables such as leeks and Brussels sprouts are picked over months. Keen growers sometimes sow zucchini or cucumbers in two batches to keep plants cropping well into fall.' ) .

					$h2( 'How often to sow' ) .
					$p( 'Outdoors, sow every one to four weeks from mid-spring to late summer; every two weeks is usual. Lettuce may need sowing only every three weeks in early spring, but weekly in warm, moist summer weather. The first sowings of spring can be started indoors in early spring.' ) .
					$p( 'Rather than following the calendar, you can sow the next batch when the last one is well developed: when leafy crops have about four true leaves, peas are about 2 in (5 cm) high, or beans about 4 in (10 cm) tall.' ) .

					$h2( 'A simple plan for a balcony' ) .
					$list(
						array(
							'Use two or three troughs or pots, each at least 12 in (30 cm) wide, in peat-free potting mix.',
							'Sow the first one thinly, label it with the date, and keep it watered.',
							'When its seedlings are well developed, sow the second container.',
							'When the first container is finished, empty it, refill with fresh potting mix, and sow again.',
							'Harvest whole plants as soon as they are at their best, to free space and light for the next batch.',
						)
					) .
					$p( 'Baby vegetable varieties and packets of mixed salad green seed are especially useful where space is short. Late in summer, if you re-sow a container that has already grown a crop, fresh potting mix or a general-purpose fertilizer gives the new batch enough food.' ) .

					$h2( 'Herbs too' ) .
					$p( 'Annual herbs such as basil and cilantro flower and die in their first season. Sowing a fresh batch every three to four weeks from spring gives you plants to pick all summer.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Sowing the whole packet at once: you get a glut, then a gap.',
							'Sowing too thickly: sow thinly in short rows or small patches.',
							'Letting seedlings dry out: keep each batch watered, especially in dry spells.',
							'Sowing bolting-prone crops in a heatwave: they run to seed. Sow in a cooler, shadier spot in summer.',
							'Watching only the calendar: check how the last batch is growing.',
						)
					),
			),

			'watering-pots-when-on-holiday'         => array(
				'image_prompt' => 'Pots of herbs and a bush tomato grouped closely together in the shade of a balcony wall, standing in wide trays of water, a bucket of water beside them with cotton cords running from it into the potting mix of two pots, summer afternoon light.' . $photo_end,
				'pin_prompt'   => 'A bucket of water on a patio with several cotton cords leading from it into pots of basil and parsley grouped around it, photographed vertically from slightly above.' . $pin_end,
				'title'        => 'How to Water Pots When You Go on Vacation',
				'topic'        => 'watering',
				'excerpt'      => 'For a few days away in summer, a thorough watering and a move into the shade are often enough. For longer, group your pots, give them a reservoir to draw on with wicks or trays, and test it before you go; for more than a couple of weeks, ask a neighbor.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Capillary matting', 'note' => 'Works as a wick from a water reservoir, or as a mat for small pots.', 'url' => '' ),
						array( 'name' => 'Cotton cord', 'note' => 'Runs water from a bucket into the potting mix.', 'url' => '' ),
						array( 'name' => 'Deep trays or saucers', 'note' => 'Hold a little extra water under the pots while you are away.', 'url' => '' ),
						array( 'name' => 'Bark or gravel mulch', 'note' => 'Slows moisture loss from the surface of the potting mix.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'How long can pots go without water?', 'answer' => 'There is no fixed answer. In summer dry spells pots may need water every day or two, and small pots in full sun dry fastest. A thorough watering and a move to the shade may cover a short absence; for longer, set up a reservoir or ask someone to water.' ),
						array( 'question' => 'Should I buy self-watering pots for my vacation?', 'answer' => 'The RHS sees self-watering containers as a long-term way of growing rather than a quick fix for a vacation, and advises against repotting just for a short absence.' ),
						array( 'question' => 'Can I leave pots standing in water?', 'answer' => 'Only for the time you are away. Normally, empty saucers a few hours after watering, because potting mix that stays saturated can rot the roots.' ),
						array( 'question' => 'What about the crops that ripen while I am away?', 'answer' => 'Ask whoever waters to pick them. Regular picking keeps crops such as peas producing.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'RHS — Container maintenance', 'url' => 'https://www.rhs.org.uk/container-gardening/maintenance' ),
						array( 'title' => 'RHS — Houseplants: holiday care', 'url' => 'https://www.rhs.org.uk/plants/types/houseplants/holiday-care' ),
						array( 'title' => 'RHS — How to care for school and office gardens during holidays', 'url' => 'https://www.rhs.org.uk/garden-inspiration/get-gardening/caring-for-school-gardens-in-summer' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Plants in pots rely on you for water. In a summer dry spell they may need it every day or every other day, and in hot weather the RHS suggests checking them twice a day. A week away can undo a season\'s work unless you plan for it.' ) .

					$h2( 'Short trips: water well and move to the shade' ) .
					$p( 'For a few days in summer, a thorough watering just before you leave may be enough. Water slowly until the potting mix is soaked, then move the pots somewhere cooler and shadier. Pots on a balcony facing north or east dry out more slowly than those facing south or west.' ) .

					$h2( 'Group your pots together' ) .
					$p( 'Pots placed close together shade each other\'s potting mix and raise the humidity around them, so they need less water. Move them out of the wind, away from the hottest spot, and away from any overhang that stops rain reaching them.' ) .

					$h2( 'Give them a reservoir' ) .
					$p( 'For longer absences, give the plants a store of water to draw on:' ) .
					$list(
						array(
							'<strong>Bucket and wicks:</strong> fill a bucket with water and run cotton cords from the water into the potting mix of each pot. Larger containers and thirsty plants need several wicks.',
							'<strong>Capillary matting wick:</strong> for a large single pot, put one end of a strip of capillary matting in a container of water and tuck the other end well into the pot.',
							'<strong>Trays:</strong> stand pots in a tray or deep saucer and fill it before you leave.',
						)
					) .
					$p( 'Set the system up a few days early and watch it: small reservoirs can run dry, and wicks can slip out of pots that are not well tucked in. Too much water can cause rots such as gray mold; too little can lead to powdery mildew and spider mites.' ) .

					$h2( 'Mulch the potting mix' ) .
					$p( 'A layer of compost, bark chips or gravel on top of the potting mix slows the loss of water from the surface. Most water is still lost through the leaves, so mulch helps but does not replace watering.' ) .

					$h2( 'Before you go' ) .
					$list(
						array(
							'Pick everything that is ripe or nearly ripe.',
							'Water every pot thoroughly.',
							'Group the pots in the shade, out of the wind.',
							'Set up wicks or trays, and check they work.',
							'Small pots can stand together on capillary matting with one end in a tray or sink of water.',
						)
					) .

					$h2( 'For longer trips: ask a neighbor' ) .
					$p( 'If you are away for more than a couple of weeks, the RHS suggests asking a trusted neighbor, friend or relative to water. Invite them to pick any fruit and vegetables that ripen while you are away: regular picking keeps crops such as peas flowering and podding.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Leaving pots in full sun on a hot balcony.',
							'Trusting rain: light showers rarely wet the potting mix more than an inch or two (a few centimeters) down.',
							'Setting up wicks on the morning you leave, with no time to test them.',
							'Leaving pots standing in full saucers once you are back: empty them.',
						)
					),
			),

			'how-to-ripen-green-tomatoes'           => array(
				'image_prompt' => 'Green and partly red cherry and salad tomatoes in a wooden fruit bowl with two ripe yellow bananas, on a kitchen table near a window, a few tomatoes already turning orange, fall afternoon light.' . $photo_end,
				'pin_prompt'   => 'A bush tomato plant in a large pot on a balcony in fall, laden with green and a few red fruits on its stems, photographed vertically.' . $pin_end,
				'title'        => 'How to Ripen Green Tomatoes at the End of the Season',
				'topic'        => 'seasonal-care',
				'excerpt'      => 'When cold weather stops tomatoes ripening outside, pick the green fruit and keep it somewhere warm, or put it in a drawer or bag with a banana. Move pots of bush tomatoes under cover before frost, and use fruit from blighted plants straight away.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Paper bags', 'note' => 'Hold green tomatoes with a ripe banana.', 'url' => '' ),
						array( 'name' => 'Cloche or row cover', 'note' => 'Buffers late-ripening bush tomatoes in pots against early frosts.', 'url' => '' ),
						array( 'name' => 'Clean pruners', 'note' => 'Cut whole trusses or plants without tearing the stems.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Why does a banana help tomatoes ripen?', 'answer' => 'Ripe bananas give off a natural gas that speeds up ripening in other fruit. Put green tomatoes in a drawer, paper bag or fruit bowl with a banana.' ),
						array( 'question' => 'Can I ripen green tomatoes from a plant with blight?', 'answer' => 'It is risky. Fruit from badly affected plants is likely to be infected even if it looks fine, and much of it may rot indoors. Use it straight away, for example in chutney or sauce.' ),
						array( 'question' => 'Will green peppers and chilies ripen indoors too?', 'answer' => 'No. Unlike tomatoes, peppers and chilies do not ripen further once picked. Chilies can be frozen whole.' ),
						array( 'question' => 'Should I strip the leaves to let the sun reach the fruit?', 'answer' => 'Keep it to a minimum. The RHS warns that removing leaves can upset the plant and make ripening problems more likely; never remove leaves above the lowest truss of ripening fruit.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — Tomatoes: fruit ripening problems', 'url' => 'https://www.rhs.org.uk/problems/tomatoes-fruit-ripening-problems' ),
						array( 'title' => 'RHS — Tomato blight', 'url' => 'https://www.rhs.org.uk/disease/tomato-blight' ),
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Outdoor tomatoes start ripening from midsummer, and in a cool fall many fruits are still green when the nights turn cold. You do not have to lose them: green tomatoes keep ripening after picking if they are warm enough.' ) .

					$h2( 'Help the last fruit ripen on the plant' ) .
					$p( 'In summer, outdoor cordon tomatoes are stopped once they have set four trusses, by removing the growing tip two leaves above the top truss. Stopping the plant helps it put its energy into fruit rather than leaves.' ) .
					$p( 'Resist stripping off the leaves. The RHS says de-leafing should be kept to a minimum and never go higher than the lowest truss of ripening fruit, because it can upset the plant and cause ripening problems.' ) .
					$p( 'A cloche over a bush tomato buffers the temperature and takes the edge off the first frosts.' ) .

					$h2( 'Bring pots under cover before frost' ) .
					$p( 'This is where growing in pots pays off. A bush tomato in a container can simply be moved under cover, such as into a porch, sunroom or unheated room, and the fruit keeps ripening on the plant. Cordon plants can be cut down and either hung up or laid flat somewhere light, such as a greenhouse, garage or sunroom.' ) .

					$h2( 'Ripen picked fruit indoors' ) .
					$list(
						array(
							'Pick the fruit with its stalk on.',
							'Keep it somewhere warm and dark, or put it in a drawer, paper bag or fruit bowl with a ripe banana.',
							'Check every few days and use the tomatoes as they color. Remove any that start to rot.',
						)
					) .
					$p( 'Some patches may never ripen. Hard green areas on the shoulder of the fruit, called greenback, stay hard while the rest ripens; they are usually caused by too much light and heat or too little potassium during the summer.' ) .

					$h2( 'If the plant has blight' ) .
					$p( 'Tomato blight causes brown patches on the leaves and stems, watery brown patches on green fruit, and rapid rotting of riper fruit. Once a plant has a lot of blight, many fruits are probably infected even if they look clean, and they may rot after you bring them in. Use them straight away instead, in chutney or sauce. Do not compost blighted plants: put them in your municipal yard-waste (green-waste) collection, where there is one.' ) .

					$h2( 'Peppers and chilies are different' ) .
					$p( 'Peppers and chilies do not ripen further once picked. Green peppers do not keep well, but chilies can be frozen whole and used as needed.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Waiting for the first frost before acting.',
							'Stripping all the leaves to expose the fruit.',
							'Ripening fruit from blighted plants and losing it to rot.',
							'Composting blighted plants.',
						)
					),
			),

			'how-to-dry-and-freeze-herbs'           => array(
				'image_prompt' => 'Small bunches of sage, rosemary and bay hanging upside down from a wooden rail in a bright, airy room, an ice-cube tray of chopped green parsley and mint frozen in water on the table below, glass jars of dried leaves beside it.' . $photo_end,
				'pin_prompt'   => 'An ice-cube tray filled with chopped fresh herbs in water next to a pot of flat-leaf parsley and a pot of mint on a kitchen windowsill, photographed vertically from above.' . $pin_end,
				'title'        => 'How to Dry and Freeze Herbs From Your Pots',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'Woody herbs such as sage, rosemary and bay dry well: hang sprigs somewhere warm, dark and airy, then store the leaves in an airtight jar. Soft herbs such as mint, parsley and basil keep their flavour better frozen, chopped into ice-cube trays.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Silicone or plastic ice-cube trays', 'note' => 'For chopped herbs frozen in water.', 'url' => '' ),
						array( 'name' => 'Small airtight glass jars', 'note' => 'For dried leaves.', 'url' => '' ),
						array( 'name' => 'Garden twine', 'note' => 'For tying sprigs into bunches to hang.', 'url' => '' ),
						array( 'name' => 'Freezer bags and labels', 'note' => 'Store the frozen cubes, labeled with the herb and date.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Is it better to dry or freeze herbs?', 'answer' => 'It depends on the herb. Woody herbs like sage, rosemary and bay dry well. For mint, the RHS says freezing keeps the flavour better than drying, and dried parsley has less flavour than fresh. Soft herbs such as basil and cilantro do not dry well.' ),
						array( 'question' => 'Can I dry herbs in the kitchen?', 'answer' => 'It is better not to: steam from cooking slows drying. Choose a warm, dark, well-ventilated room instead.' ),
						array( 'question' => 'How long do dried bay leaves keep?', 'answer' => 'Use them within a few months, before the flavour starts to fade. Freezing bay leaves keeps the flavour for longer.' ),
						array( 'question' => 'When should I harvest herbs for storing?', 'answer' => 'Pick in fall, before pot-grown herbs die back or suffer in winter. For evergreen sage and rosemary, the soft new growth of late spring and summer has the best flavour.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Herbs in containers', 'url' => 'https://www.rhs.org.uk/herbs/containers' ),
						array( 'title' => 'RHS — How to grow mint', 'url' => 'https://www.rhs.org.uk/herbs/mint/grow-your-own' ),
						array( 'title' => 'RHS — How to grow parsley', 'url' => 'https://www.rhs.org.uk/herbs/parsley/grow-your-own' ),
						array( 'title' => 'RHS — How to grow sage', 'url' => 'https://www.rhs.org.uk/herbs/sage/grow-your-own' ),
						array( 'title' => 'RHS — How to grow rosemary', 'url' => 'https://www.rhs.org.uk/herbs/rosemary/grow-your-own' ),
						array( 'title' => 'RHS — How to grow bay', 'url' => 'https://www.rhs.org.uk/herbs/bay/grow-your-own' ),
						array( 'title' => 'RHS — How to grow coriander', 'url' => 'https://www.rhs.org.uk/herbs/coriander/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Many herbs in pots die back or struggle in winter. The RHS suggests harvesting them in fall and storing them for winter cooking. The method depends on the herb: woody herbs dry well, soft herbs are better frozen.' ) .

					$h2( 'Which herbs to dry and which to freeze' ) .
					$list(
						array(
							'<strong>Dry:</strong> sage, rosemary, bay and marjoram, which have woody stems and fairly dry leaves.',
							'<strong>Freeze:</strong> mint, parsley, basil and cilantro. Basil and cilantro do not dry well; mint and parsley keep more flavour frozen than dried.',
							'<strong>Sage</strong> can be either dried or frozen.',
						)
					) .

					$h2( 'How to dry herbs' ) .
					$list(
						array(
							'Cut healthy sprigs.',
							'Tie them in small bunches and hang them in a warm, dark, well-ventilated place. Avoid the kitchen: steam from cooking stops them drying properly.',
							'Leave them until the leaves are completely dry. Parsley takes a few weeks.',
							'Strip or crush the leaves and store them in an airtight jar.',
						)
					) .
					$p( 'Bay leaves can simply be left to dry in a warm room. To keep them flat and easy to store whole, dry them between the pages of an old book with a weight on top. Use dried bay within a few months, before the flavour fades.' ) .

					$h2( 'How to freeze herbs in ice cubes' ) .
					$list(
						array(
							'Pick and wash the leaves, then chop them finely.',
							'Fill an ice-cube tray with the chopped herbs and top up with water.',
							'Freeze, then tip the cubes into a freezer bag, squeeze out the air, and label it with the herb and the date.',
							'Drop a cube straight into soups, sauces and stews as you cook.',
						)
					) .
					$p( 'Bay leaves can also be frozen whole, which keeps their flavour longer than drying.' ) .

					$h2( 'Keep picking fresh as long as you can' ) .
					$p( 'Rosemary, sage and bay are evergreen and can be picked all year. Mint dies back in winter, but a pot brought indoors in fall and kept on a sunny windowsill can carry on giving leaves. Parsley in a pot can also be moved indoors for later harvests. Freshly picked cilantro leaves keep for a few days in the fridge.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Drying herbs in a steamy kitchen.',
							'Storing leaves before they are completely dry: moisture lets mold develop.',
							'Trying to dry basil and cilantro: freeze them instead.',
							'Forgetting to label frozen cubes: chopped green herbs look alike once frozen.',
						)
					),
			),

			'how-to-save-seeds-from-your-plants'    => array(
				'image_prompt' => 'Dry, papery pea and bean pods and a cut-open ripe red tomato with its seeds spread on paper towel on a wooden balcony table, small labeled paper envelopes beside them, a pot of flowering lettuce in the background, late summer light.' . $photo_end,
				'pin_prompt'   => 'Hand-labeled paper seed envelopes and a small glass jar of dried bean seeds on a wooden table beside a pot of dry pea pods, photographed vertically.' . $pin_end,
				'title'        => 'How to Save Seeds From Your Plants',
				'topic'        => 'grow-your-own-food',
				'excerpt'      => 'Peas, beans, tomatoes, lettuce and many herbs give seed you can sow next year: let a few pods or fruits ripen fully, collect them on a dry day, dry the seed and store it in labeled paper envelopes in a cool, dry place. Skip F1 hybrids, which do not come true from seed.',
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Small paper envelopes or bags', 'note' => 'Paper lets the seed stay dry.', 'url' => '' ),
						array( 'name' => 'Airtight box or jar', 'note' => 'Holds the envelopes in a cool, dry place.', 'url' => '' ),
						array( 'name' => 'Silica gel sachets', 'note' => 'Absorb extra moisture in the storage box.', 'url' => '' ),
						array( 'name' => 'Fine sieve or tea strainer', 'note' => 'For rinsing tomato seed and removing chaff.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Can I save seed from F1 hybrid plants?', 'answer' => 'You can, but there is little point: the seedlings will not be like the parent plant. Save seed from varieties that are not F1 hybrids.' ),
						array( 'question' => 'Can I pick pods early and let them ripen indoors?', 'answer' => 'Seed must be ripe on the plant first: unripe pods will not ripen once picked. If a wet summer threatens pods that have already ripened, pick them and finish drying them indoors.' ),
						array( 'question' => 'How do I know if old seed is still good?', 'answer' => 'For medium to large seeds such as peas and beans, put them in a jar of water. Seeds that sink are likely to be alive; those that float are dead.' ),
						array( 'question' => 'Why did my saved zucchini seed give odd fruit?', 'answer' => 'Zucchini and pumpkins cross-pollinate easily, so their seed is often a mix of two varieties and the fruit can be misshapen. Peas, beans and tomatoes, which mostly pollinate themselves, are easier.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Seed: collecting and storing', 'url' => 'https://www.rhs.org.uk/propagation/seed-collecting-storing' ),
						array( 'title' => 'RHS School Gardening — Tips on saving your own seeds', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/planet-friendly/tips-on-saving-your-own-seeds' ),
						array( 'title' => 'RHS — Saving beans for free plants next year', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/sowing-holey-beans' ),
						array( 'title' => 'RHS — How to grow coriander', 'url' => 'https://www.rhs.org.uk/herbs/coriander/grow-your-own' ),
						array( 'title' => 'RHS — How to grow rocket', 'url' => 'https://www.rhs.org.uk/vegetables/rocket/grow-your-own' ),
						$book,
					),
				),
				'content'      =>
					$p( 'Saving seed gives you a second crop from the same plants, and it lets you choose the plants that did best in your conditions. In a small space it means leaving a few plants or pods unharvested, so plan which ones before the end of summer.' ) .

					$h2( 'Choose the right plants' ) .
					$list(
						array(
							'Save seed only from healthy, vigorous plants, and from the best of them.',
							'Avoid F1 hybrids: their seedlings will not be like the parent.',
							'Plants that mostly pollinate themselves, such as peas, beans and tomatoes, usually come true. Zucchini and pumpkins cross easily with other varieties nearby.',
							'Basil crosses easily too: if you grow two varieties, let only one flower.',
						)
					) .

					$h2( 'Let the plants flower and ripen' ) .
					$p( 'Leaf and root crops are normally picked before they flower, so leave a few plants in the pot to bloom and set seed. Lettuce runs to seed readily; collect from the strongest plants. Seed is often set about two months after flowering, and is ready when the seedheads change color, usually from green to brown, but before they open and drop the seed.' ) .

					$h2( 'Peas and beans' ) .
					$p( 'Leave the last few pods on the plant to dry until they are brown and papery; leaving only the last ones lets the plant keep cropping for longer. Shell the dry seeds into a paper bag or envelope. If the weather turns wet, pick the ripe pods, spread them out indoors to finish drying, then shell them.' ) .

					$h2( 'Tomatoes' ) .
					$list(
						array(
							'Let a good fruit ripen fully on the plant, then pick it and cut it open.',
							'Scoop out the seeds. The RHS suggests leaving them to ferment for three days to remove the jelly-like coating.',
							'Rinse them in a fine sieve under cold water.',
							'Spread them on paper towel in a warm place to dry for a few days.',
						)
					) .

					$h2( 'Lettuce, arugula and herbs' ) .
					$p( 'Arugula and lettuce form seed in small pods or seedheads: collect them when they turn brown, then dry them before shaking or crushing out the seed. Cilantro, whose seeds are sold as coriander, and dill are grown for their seeds as well as their leaves. For coriander seed, cut whole stems with ripe brown seeds into a paper bag, then dry the seeds on paper in a warm room for about a week.' ) .

					$h2( 'Dry, clean and store' ) .
					$list(
						array(
							'Collect on a dry day, straight into paper bags or trays lined with newspaper.',
							'Dry seedheads on a warm windowsill until the seed comes out easily.',
							'Remove the chaff (bits of pod and seedhead) with a sieve or tea strainer: it can carry mold, pests and disease.',
							'Make sure the seed is completely dry, then put it in a paper envelope labeled with the plant name and date.',
							'Keep the envelopes in an airtight container with a silica gel sachet, somewhere cool and dry and safe from mice. The RHS stores seed in a refrigerator at 41 °F (5 °C).',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Saving seed from F1 hybrids.',
							'Picking pods before the seed is ripe.',
							'Storing damp seed, which goes moldy.',
							'Forgetting to label envelopes.',
							'Saving from two varieties of a crop that crosses easily, grown side by side.',
						)
					),
			),
		),

		'project' => array(
			'sow-peas-in-a-gutter'                  => array(
				'image_prompt' => 'A length of plastic rain gutter, its ends blocked, filled with peat-free potting mix and two rows of young pea seedlings about 6 in (15 cm) tall with paired rounded leaves and tendrils, resting on a sunny indoor windowsill, a large balcony trough with twiggy pea sticks visible through the window.' . $photo_end,
				'pin_prompt'   => 'Hands sliding a strip of pea seedlings from a plastic gutter into a shallow trench in a wide trough of potting mix on a balcony, photographed vertically from above.' . $pin_end,
				'title'        => 'Make a Gutter Seed Tray for Peas',
				'category'     => array( 'planters' ),
				'plants'       => array( 'peas-in-pots' ),
				'excerpt'      => 'Sow peas indoors in a length of plastic gutter, then slide the whole row into a large trough when the seedlings are ready. Peas dislike root disturbance, and the gutter lets you move them in one piece.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'Under an hour',
					'cost'           => 'Low',
					'size'           => 'One gutter length, cut to fit your trough',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'A gutter full of wet potting mix is heavy and awkward: carry it level, with two hands, and keep it off the balcony railing.' ),
						array( 'point' => 'The trough the peas go into must be at least 18 in (45 cm) wide, with drainage holes, and heavy enough not to tip when the peas grow tall and catch the wind.' ),
						array( 'point' => 'Cut the gutter outside or on a protected surface, and file off sharp edges.' ),
					),
					'materials' => array(
						array( 'name' => 'Plastic rain gutter', 'quantity' => 'One length, a little shorter than your trough', 'url' => '' ),
						array( 'name' => 'Gutter end caps, or strong waterproof tape', 'quantity' => '2', 'url' => '' ),
						array( 'name' => 'Peat-free all-purpose potting mix', 'quantity' => 'Enough to fill the gutter and the trough', 'url' => '' ),
						array( 'name' => 'Pea seed, dwarf variety', 'quantity' => '1 packet', 'url' => '' ),
						array( 'name' => 'Large trough at least 18 in (45 cm) wide', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Twiggy pea sticks or short stakes', 'quantity' => 'Enough to line the row', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Fine-toothed saw', 'url' => '' ),
						array( 'name' => 'Drill with a small bit', 'url' => '' ),
						array( 'name' => 'Watering can with a fine rose', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Cut the gutter', 'text' => 'Measure the inside length of your trough and cut the gutter a little shorter, so it will fit inside it.', 'tip' => 'Two short lengths are easier to handle than one long one.' ),
						array( 'title' => 'Block the ends and add drainage', 'text' => 'Fit end caps or tape over both ends. Drill a few small holes along the base so extra water can drain.', 'tip' => 'Stand the gutter on a tray indoors to catch drips.' ),
						array( 'title' => 'Fill with potting mix', 'text' => 'Fill the gutter with peat-free all-purpose potting mix and firm it lightly.', 'tip' => '' ),
						array( 'title' => 'Sow two rows', 'text' => 'In late winter or early spring, sow the peas in a double row, about 3 in (7.5 cm) apart. Push each seed in and cover it with potting mix, then water gently.', 'tip' => 'Sowing indoors also keeps the seed safe from mice.' ),
						array( 'title' => 'Grow on in good light', 'text' => 'Keep the gutter on a bright windowsill or in a porch and water regularly. Windowsills can turn cold at night: on frosty nights, move the gutter into the room.', 'tip' => '' ),
						array( 'title' => 'Harden off', 'text' => 'When the plants are about 8 in (20 cm) tall, get them used to outdoor conditions over two to three weeks: outside by day in a sheltered spot, back in at night.', 'tip' => '' ),
						array( 'title' => 'Slide them into the trough', 'text' => 'Fill the trough with potting mix and scoop out a shallow trench the size of the gutter. Water the peas, ease the mix and plants out of the gutter in one strip, and slide them into the trench. Firm gently and water well.', 'tip' => 'Tilt the gutter slightly and coax the mix out with a flat hand.' ),
						array( 'title' => 'Add supports', 'text' => 'Push twiggy sticks or short stakes in along the row for the peas to climb.', 'tip' => '' ),
					),
					'faq'       => array(
						array( 'question' => 'Why sow peas in a gutter?', 'answer' => 'Peas dislike having their roots disturbed. A gutter gives you a ready-made row that slides into place in one piece.' ),
						array( 'question' => 'Can I grow peas in a container at all?', 'answer' => 'Yes, smaller and dwarf varieties, especially fast snow peas (mangetout), in a container at least 18 in (45 cm) wide. The harvest will be fairly small, and the potting mix needs regular watering to keep powdery mildew away.' ),
						array( 'question' => 'Can I use the gutter for pea shoots?', 'answer' => 'Yes. Pea shoots can be sown indoors at any time of year and cut within a few weeks, so a gutter on a windowsill works well for them.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						array( 'title' => 'RHS — Hardening off tender plants', 'url' => 'https://www.rhs.org.uk/prevention-protection/hardening-off-tender-plants' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'The gutter is a long, narrow seed tray. The peas germinate and grow indoors, safe from cold, wet soil and mice, and form a strip of roots and potting mix that holds together. When they are ready, you slide the whole row into its final container without pulling the plants apart.' ) .
					$h2( 'Care after planting' ) .
					$p( 'Peas in a container need regular watering, and a good soaking when they start to flower. Once the first flowers appear, feed every two weeks with a high-potassium liquid fertilizer such as tomato fertilizer. Pick the pods often, or the plants stop flowering.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'The gutter method appears in Backyard Harvest (pp. 27 and 62) and in the RHS guide to growing peas. We have adapted it for a balcony trough and added the safety checks; spacing and timing follow the RHS. We have not built this exact version ourselves.' ),
			),

			'make-a-bottle-watering-funnel'         => array(
				'image_prompt' => 'A clear plastic beverage bottle cut in half, its top half pushed neck-down into the potting mix beside a young zucchini plant in a large black pot on a sunny patio, water being poured into the funnel from a watering can spout.' . $photo_end,
				'pin_prompt'   => 'A half plastic bottle used as a funnel, sunk neck-down into a large pot next to a bush tomato plant on a balcony, photographed vertically.' . $pin_end,
				'title'        => 'Make a Bottle Watering Funnel',
				'category'     => array( 'watering' ),
				'plants'       => array( 'cherry-tomato', 'zucchini-in-pots', 'raspberries-in-pots' ),
				'excerpt'      => 'Cut a plastic bottle in half and sink the top half neck-down into the potting mix next to a thirsty plant. Water poured into it goes straight down to the roots instead of running off the surface.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Beginner',
					'time'           => 'About 10 minutes',
					'cost'           => 'Low',
					'size'           => 'One bottle per plant',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Use the funnel in a large container: there must be room for the bottle neck without crushing the main roots.' ),
						array( 'point' => 'Water poured into the funnel still drains out of the pot. Make sure it cannot drip onto a neighbor\'s balcony or the sidewalk below.' ),
						array( 'point' => 'Cut plastic leaves a sharp edge: cut on a stable surface, away from your hand, and fold tape over the rim.' ),
					),
					'materials' => array(
						array( 'name' => 'Plastic beverage bottle, washed, label removed', 'quantity' => '1 per plant', 'url' => '' ),
						array( 'name' => 'Waterproof tape', 'quantity' => 'A short strip per bottle', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Scissors or a craft knife', 'url' => '' ),
						array( 'name' => 'Gloves', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Cut the bottle', 'text' => 'Remove the cap. Cut the bottle in half around its middle. Keep the top half, with the neck.', 'tip' => 'Recycle the bottom half, or use it as a cloche for a seedling.' ),
						array( 'title' => 'Cover the edge', 'text' => 'Fold a strip of tape over the cut rim so it is not sharp.', 'tip' => '' ),
						array( 'title' => 'Sink it beside the plant', 'text' => 'Push the neck down into the potting mix next to the plant, so the funnel stands upright with its rim just above the surface.', 'tip' => 'Do it at planting time, so you do not push it through established roots.' ),
						array( 'title' => 'Water through it', 'text' => 'Fill the funnel and let the water sink in, then fill it again if the potting mix is dry a third of the way down the pot.', 'tip' => 'Water in the early morning or evening, when less is lost to evaporation.' ),
					),
					'faq'       => array(
						array( 'question' => 'Will the funnel water my plants while I am away?', 'answer' => 'No. It only channels the water you pour in at the time; it does not store water. For vacations, see our guide to watering pots when you are away.' ),
						array( 'question' => 'Which plants benefit most?', 'answer' => 'Thirsty plants in large containers, such as tomatoes, zucchini and soft fruit, where water tends to run off a dry surface or over the leaves.' ),
						array( 'question' => 'Can I use a small plant pot instead of a bottle?', 'answer' => 'Yes. A small pot sunk beside the plant works the same way, and the RHS suggests one for cucumbers so that water goes down to the roots instead of sitting around the base of the stem, where it can cause rot. Liquid fertilizer poured into the pot or funnel reaches the roots in the same way.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS School Gardening — Teach pupils how to water plants correctly', 'url' => 'https://www.rhs.org.uk/education-learning/school-gardening/resources/planet-friendly/watering-plants' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'Water given at the base of a plant soaks down to its roots, where it is needed. Poured onto dry potting mix or over the leaves, much of it runs off or evaporates. The funnel channels each can of water straight into the root zone.' ) .
					$h2( 'Good watering still matters' ) .
					$p( 'Check the potting mix before you water: push a finger about a third of the way down the pot, and water if it is dry at that depth. Water slowly and thoroughly, and stop just before water runs out of the drainage holes. A light shower rarely wets the mix more than an inch or two (a few centimeters) down.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Half plastic bottles used as watering funnels appear in Backyard Harvest (p. 122), and the RHS school gardening guide suggests sinking upside-down bottles with the bottoms cut off next to thirsty plants. We have adapted the idea for a pot on a balcony and added the checks. We have not built this exact version ourselves.' ),
			),

			'make-a-mini-cold-frame'                => array(
				'image_prompt' => 'A small home-made wooden cold frame on the floor of a sunny balcony against the house wall, its clear rigid plastic lid sloping down towards the front and propped slightly open with a wooden block, trays of lettuce and pea seedlings inside, spring morning light.' . $photo_end,
				'pin_prompt'   => 'A compact wooden cold frame with a clear sloping lid on a balcony, lid propped open, young seedlings visible inside, photographed vertically from the front.' . $pin_end,
				'title'        => 'Make a Mini Cold Frame for a Balcony',
				'category'     => array( 'planters' ),
				'plants'       => array( 'salad-greens-in-pots', 'lettuce-in-pots', 'peas-in-pots' ),
				'excerpt'      => 'A wooden box with a clear, sloping lid makes a small cold frame for hardening off seedlings, starting salads early and sheltering young plants from wind and light frost. On a balcony, use rigid clear plastic rather than glass, and fix the frame down.',
				'facts'        => array(
					'project_method' => 'adapted',
					'difficulty'     => 'Intermediate',
					'time'           => 'An afternoon',
					'cost'           => 'Low',
					'size'           => 'To fit your space and your seed trays',
				),
				'lists'        => array(
					'checks'    => array(
						array( 'point' => 'Never use glass on a balcony: a broken pane can fall. Use rigid clear plastic.' ),
						array( 'point' => 'Gusts of wind are the main cause of damage to light frames. Fix the frame to something solid or weigh it down, and keep the lid secured whenever it is open.' ),
						array( 'point' => 'Stand the frame on the floor against the wall, never on a railing or ledge.' ),
						array( 'point' => 'Clear snow off the lid: its weight can break it.' ),
					),
					'materials' => array(
						array( 'name' => 'Wooden box or crate, or planks to make one', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Rigid clear plastic sheet, a little larger than the box top', 'quantity' => '1', 'url' => '' ),
						array( 'name' => 'Hinges with short screws', 'quantity' => '2', 'url' => '' ),
						array( 'name' => 'Wooden block or notched stick', 'quantity' => '1, to prop the lid', 'url' => '' ),
						array( 'name' => 'Hook and eye catch', 'quantity' => '1', 'url' => '' ),
					),
					'tools'     => array(
						array( 'name' => 'Saw', 'url' => '' ),
						array( 'name' => 'Drill and screwdriver', 'url' => '' ),
						array( 'name' => 'Pencil and ruler', 'url' => '' ),
						array( 'name' => 'Gloves and safety glasses', 'url' => '' ),
					),
					'steps'     => array(
						array( 'title' => 'Size the box', 'text' => 'Choose or build a box that holds your seed trays with a little room to spare, and that fits your balcony floor without blocking the way.', 'tip' => '' ),
						array( 'title' => 'Cut the slope', 'text' => 'Mark the two short sides so the back is higher than the front, and cut along the lines. The lid will slope towards the front, so rain runs off and light reaches the plants.', 'tip' => 'Put the high side against the wall.' ),
						array( 'title' => 'Fit the lid', 'text' => 'Lay the clear plastic sheet over the top and fix it to the high back edge with two hinges. Drill pilot holes in the plastic first so it does not crack.', 'tip' => '' ),
						array( 'title' => 'Add a prop and a catch', 'text' => 'Use a wooden block or notched stick to hold the lid partly open, and fit a hook and eye so the lid cannot be lifted by the wind.', 'tip' => 'A lid that can be set at different openings makes ventilation easy.' ),
						array( 'title' => 'Place and secure it', 'text' => 'Stand the frame in the sunniest spot against the wall and fix or weigh it down.', 'tip' => '' ),
						array( 'title' => 'Use it to harden off', 'text' => 'In the first week, open the lid slightly by day and close it at night. Then, for about two more weeks, raise it a little further each day until it is off completely, then plant out.', 'tip' => 'Open the lid on warm days so the plants do not overheat.' ),
					),
					'faq'       => array(
						array( 'question' => 'What can I use a cold frame for?', 'answer' => 'Hardening off seedlings in spring, giving tender crops such as tomatoes and chilies extra warmth, raising seedlings, and sheltering young plants from cool, unsettled fall weather and mild frosts.' ),
						array( 'question' => 'Will it protect plants from hard frost?', 'answer' => 'Only from mild frosts. A lining of bubble wrap adds some insulation in winter but cuts light and ventilation.' ),
						array( 'question' => 'Is a cloche the same thing?', 'answer' => 'A cloche is smaller and easier to move, and covers single plants or rows. It gives less frost protection than a cold frame. A cut-down plastic bottle makes a simple cloche for one seedling.' ),
					),
					'sources'   => array(
						array( 'title' => 'RHS — Coldframes and mini-greenhouses', 'url' => 'https://www.rhs.org.uk/garden-features/coldframes-and-mini-greenhouses' ),
						array( 'title' => 'RHS — Hardening off tender plants', 'url' => 'https://www.rhs.org.uk/prevention-protection/hardening-off-tender-plants' ),
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						$book,
					),
				),
				'content'      =>
					$h2( 'How it works' ) .
					$p( 'A cold frame is a low box with a clear, sloping lid. It traps the sun\'s warmth, keeps off wind and heavy rain, and lets you control how much fresh air reaches the plants by opening the lid. It is a halfway house between indoors and the open balcony.' ) .
					$h2( 'Ventilation is the key' ) .
					$p( 'On a sunny day a closed frame can get too hot, and still, damp air encourages fungal diseases such as gray mold. Open the lid on warm days and close it on cold nights. Makeshift frames work well as long as you take care with ventilation.' ) .
					$h2( 'Where these instructions come from' ) .
					$p( 'Backyard Harvest (pp. 13, 15 and 67) describes cold frames made from recycled materials, with a sloping lid, placed against a sunny wall for warmth and frost protection. The RHS guide to coldframes covers lids, ventilation and anchoring against wind. We have adapted these into a small frame for a balcony, with the safety checks added. We have not built this exact version ourselves.' ),
			),
		),
	),
);
