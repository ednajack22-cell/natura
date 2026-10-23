<?php
/**
 * Starter guides, batch 30 (buying guides): eight gear guides for growing
 * in pots, comparing types of product, never brands or models.
 *
 * Facts come from the RHS pages listed in each guide (checked 18 October
 * 2026) and from Jo Whittingham, Backyard Harvest (DK, 2011); see
 * design/sources/BACKYARD-HARVEST.md. Where the two differ, the RHS is
 * followed. No prices, ratings or test results: Natura has not tried
 * these products. Written for the United States first, with US product
 * names; UK-only rules are labeled as such.
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
	'name'   => __( 'Buying guides: kit for pots', 'natura-core' ),
	'guides' => array(
		'gear' => array(

			'best-watering-can-for-a-balcony' => array(
				'image_prompt' => 'A plain unbranded galvanized metal watering can with its long spout and a detachable round rose resting beside it, next to terra-cotta pots of herbs and a trough of young salad greens on a sunny balcony with a railing.' . $photo_end,
				'pin_prompt'   => 'A plain metal watering can with a fine rose gently watering a tray of seedlings on a balcony table, photographed vertically with soft morning light.' . $pin_end,
				'title'    => 'The Best Watering Can for a Balcony: What to Look For',
				'category' => array( 'watering' ),
				'method'   => 'researched',
				'excerpt'  => 'For pots on a balcony, pick a watering can you can carry easily when it is part full, with a rose (sprinkler head) you can take off. A can that comes with both a fine and a coarse rose covers everything from seed trays to large tubs.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'A rose that comes off', 'why' => 'With the rose removed you can pour straight onto the potting mix at the base of the plant, where the roots are. Put it back on for seeds and seedlings, which a heavy stream would wash out of place.' ),
						array( 'name' => 'Fine and coarse roses', 'why' => 'Backyard Harvest calls a can with detachable fine and coarse roses indispensable, especially if you raise crops from seed. The fine one gives the gentle shower that seed trays need.' ),
						array( 'name' => 'A weight you can manage', 'why' => 'The RHS advises filling a can only to a weight you can carry comfortably and making more trips. On a balcony you may carry it through the apartment, so a can that feels balanced when half full matters more than a big one.' ),
						array( 'name' => 'What it is made of', 'why' => 'The RHS names metal cans as the most durable and environmentally friendly option.' ),
						array( 'name' => 'Where you will fill it', 'why' => 'Check that the can fits under the faucet or rain barrel spigot you will use. The RHS points out that cans fit easily under a rain barrel spigot, which makes rainwater simple to use.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Watering can with detachable fine and coarse roses',
							'best_for' => 'Best for most balconies, especially if you sow seeds',
							'verdict'  => 'One can does every job: the fine rose for seed trays, the coarse one for a general soak, and no rose at all when you want to direct water at the base of a plant. It is the can the RHS and Backyard Harvest both describe for pots.',
							'pros'     => "Fine rose waters seeds without washing them away\nRose off: water goes straight to the roots\nA fine rose can also apply a diluted foliar fertilizer",
							'cons'     => "Keep the rose off for grown plants: water on the leaves can spread fungal disease\nA full can is heavy: fill it part way",
							'specs'    => "Roses: Fine and coarse, detachable\nBest for: Seeds, seedlings and pots",
						),
						array(
							'name'     => 'Metal watering can',
							'best_for' => 'Best for a can that lasts',
							'verdict'  => 'The RHS rates metal as the most durable and most environmentally friendly material for a can. Look for one that also takes a detachable rose.',
							'pros'     => "Most durable option, according to the RHS\nMost environmentally friendly option, according to the RHS",
							'cons'     => 'Like any can, heavy when full: carry less and make more trips',
							'specs'    => "Material: Metal\nBest for: Everyday watering of pots",
						),
						array(
							'name'     => 'Bucket or tub for dunking small pots',
							'best_for' => 'Best for small pots and windowsill herbs',
							'verdict'  => 'Not a can but a useful extra. The RHS suggests dunking small pots in a bucket or tub of water as a way to water them without waste.',
							'pros'     => 'Soaks small pots thoroughly with little water lost',
							'cons'     => 'Only practical for pots small enough to lift',
							'specs'    => 'Best for: Small pots',
						),
						array(
							'name'     => 'Garden hose with a gentle spray setting',
							'best_for' => 'Best for gardeners who cannot lift a can',
							'verdict'  => 'The RHS prefers a can wherever possible, but a hose helps when carrying cans is difficult. It is mainly an option for a patio with an outdoor faucet (hose bib).',
							'pros'     => 'Lighter to use than carrying cans',
							'cons'     => "Does not show how much water you are using\nIn the UK, outdoor faucets need a double check valve to meet water regulations",
							'specs'    => "Needs: An outdoor faucet (hose bib)\nBest for: Gardeners who cannot carry a can",
						),
					),
					'faq'      => array(
						array( 'question' => 'Should I water pots with the rose on or off?', 'answer' => 'Off, for plants that are already growing: pour gently onto the potting mix close to the base so the water reaches the roots and the leaves stay dry. Use a fine rose for seeds and young seedlings.' ),
						array( 'question' => 'Is a hose better than a watering can for a balcony?', 'answer' => 'Usually not. The RHS calls the watering can the most water-efficient method with the most control, and suggests a hose mainly for people who find carrying cans hard.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Garden watering methods', 'url' => 'https://www.rhs.org.uk/garden-jobs/garden-watering-methods' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'RHS — Watering', 'url' => 'https://www.rhs.org.uk/garden-jobs/watering' ),
						array( 'title' => 'RHS — Fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertilisers' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'These picks are kinds of watering can, not particular brands. Every point comes from the RHS watering guides and from Backyard Harvest (pp. 19 and 42–43), listed under Sources; we have not put any can through a trial of our own.' ) .
					$h2( 'Once you have your can' ) .
					$p( 'When and how much to water is explained in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>, and going away in summer is covered in <a href="/watering-pots-when-on-holiday/">watering pots when you are on vacation</a>.' ),
			),

			'best-drip-irrigation-kit-for-pots' => array(
				'image_prompt' => 'A simple unbranded drip watering kit on a sunny patio: a battery hose timer on an outdoor faucet, thin black supply tubing running along a row of large pots of tomatoes and peppers, with a small dripper staked into the potting mix of each pot.' . $photo_end,
				'pin_prompt'   => 'Close view of a small dripper staked into the potting mix of a pot holding a tomato plant, thin black tubing leading away along a balcony floor, photographed vertically.' . $pin_end,
				'title'    => 'The Best Drip Irrigation Kit for Pots: Types Compared',
				'category' => array( 'watering' ),
				'method'   => 'researched',
				'excerpt'  => 'If you have an outdoor faucet, a drip kit with a timer and one dripper per pot is the most useful type for a balcony or patio. It puts water at the roots on a schedule, though it costs more to set up than a can and is made of plastic.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'A faucet to connect to', 'why' => 'The kits described by the RHS and Backyard Harvest connect to a faucet on the main water supply. In the UK, the RHS adds, outdoor faucets must have a double check valve to meet water regulations; many new ones have one built in.' ),
						array( 'name' => 'A timer', 'why' => 'A timer turns the water on and off for you, which is the point of a kit when you are out or away. Some systems also take a rain sensor or can be controlled from a phone.' ),
						array( 'name' => 'Drippers you can place at each pot', 'why' => 'Drippers deliver water slowly at the root zone. They are made to give a set amount, for example about half a gallon (2 liters) an hour per dripper, so you can match them to the size of each pot.' ),
						array( 'name' => 'Food-safe plastic', 'why' => 'The RHS notes that drip lines are usually made from food-grade plastics such as LDPE or PVC and are considered safe for edible plants. For soaker hoses, it advises avoiding porous rubber and hoses made from recycled tires on crops you eat.' ),
						array( 'name' => 'Where the extra water goes', 'why' => 'On a roof garden or balcony, the RHS advises making sure any runoff from an irrigation system flows to a drain outlet.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Faucet-fed drip kit with a timer and individual drippers',
							'best_for' => 'Best for a balcony or patio with an outdoor faucet',
							'verdict'  => 'The classic kit: a timer on the faucet feeds water through narrow tubing to a dripper beside each plant. It suits a group of pots of different sizes because each dripper sits where you put it.',
							'pros'     => "Water goes straight to the roots, so the potting mix surface stays drier\nThe timer waters while you are out\nDrippers give a set flow you can plan around",
							'cons'     => "Costs more to set up than a can\nPlastic that is hard to recycle and can break down into microplastics",
							'specs'    => "Water supply: Outdoor faucet\nControl: Timer\nDelivery: One dripper per plant",
						),
						array(
							'name'     => 'Drip line with built-in emitters',
							'best_for' => 'Best for a long row of troughs',
							'verdict'  => 'Tubing with emitters at equal spacing along its length. The RHS describes it as pressure-regulated, so watering stays even over long runs. It suits troughs lined up along a wall better than scattered pots.',
							'pros'     => "Pressure-regulated: even watering along the run\nLong-lasting\nUsually made from food-grade plastic",
							'cons'     => "Higher setup cost\nFixed emitter spacing may not line up with separate pots",
							'specs'    => "Water supply: Outdoor faucet\nDelivery: Emitters spaced along the line",
						),
						array(
							'name'     => 'Soaker hose',
							'best_for' => 'Best for one long raised planter on a patio',
							'verdict'  => 'A hose that lets water seep out along its whole length. It is cheap and simple, but the RHS notes water hardly spreads sideways from it, so it only waters what it runs past. For separate pots, drippers do the job better.',
							'pros'     => "Relatively cheap and easy to lay\nWaters plants in a row accurately",
							'cons'     => "Can clog with minerals in hard water\nNot pressure-regulated: uneven on a slope\nAvoid porous rubber and recycled-tire hoses for edible crops",
							'specs'    => "Delivery: Along the whole hose\nMaterial to look for: Food-grade PU, PE, HDPE or LDPE",
						),
					),
					'faq'      => array(
						array( 'question' => 'Can a drip kit overwater my pots?', 'answer' => 'Yes. The RHS warns that too much water washes nutrients down out of reach of the roots. Check that only the root zone is damp and adjust the timer as the weather changes.' ),
						array( 'question' => 'Is a soaker hose or a dripper better for pots?', 'answer' => 'For separate pots, a dripper in each one. A soaker hose wets only the strip of potting mix it lies on, so it suits one long planter rather than a group of pots.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Garden watering methods', 'url' => 'https://www.rhs.org.uk/garden-jobs/garden-watering-methods' ),
						array( 'title' => 'RHS — Watering', 'url' => 'https://www.rhs.org.uk/garden-jobs/watering' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'We compare kinds of watering system here, never named kits. The details come from the RHS guide to garden watering methods and from the watering kits described in Backyard Harvest (p. 122), all listed below. Natura has not installed or run any of these systems as a test.' ) .
					$h2( 'Before you rely on it' ) .
					$p( 'Run a new kit for a few days while you are at home and check the potting mix in each pot. Other ways to keep pots going while you travel are in <a href="/watering-pots-when-on-holiday/">watering pots when you are on vacation</a>, and you can also <a href="/projects/self-watering-pot/">make a self-watering pot</a>.' ),
			),

			'best-liquid-fertilizer-for-vegetables-in-pots' => array(
				'image_prompt' => 'Two plain unlabeled bottles of liquid plant fertilizer and a measuring cap beside a metal watering can, next to a large pot of fruiting tomato plants on a sunny balcony.' . $photo_end,
				'pin_prompt'   => 'A measuring cap of brown liquid fertilizer being poured into a watering can, with potted vegetables behind on a balcony, photographed vertically.' . $pin_end,
				'title'    => 'The Best Liquid Fertilizer for Vegetables in Pots',
				'category' => array( 'compost-feed' ),
				'method'   => 'researched',
				'excerpt'  => 'Buy two liquid fertilizers: a high-potassium one, such as tomato fertilizer, for crops grown for their fruit, and a general-purpose one for leafy and root crops. A seaweed-based organic fertilizer is a gentler choice with a smaller carbon footprint.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'Liquid rather than granules', 'why' => 'The RHS says liquid fertilizers act faster and are best used for plants in containers. Dry granules and pellets release food slowly and are mixed into the potting mix instead.' ),
						array( 'name' => 'The N-P-K figures on the label', 'why' => 'Nitrogen (N) supports leaves and stems, phosphorus (P) roots and shoots, potassium (K) flowers and fruit. Fruiting crops want a fertilizer higher in K; leafy crops do well on a general-purpose fertilizer.' ),
						array( 'name' => 'The figure in brackets', 'why' => 'Labels often give phosphorus and potassium as oxides, followed by the actual element in brackets. The RHS explains that the bracketed figures are the useful ones, so a fertilizer can be less "balanced" than its headline numbers suggest.' ),
						array( 'name' => 'A stated nutrient content', 'why' => 'Some products are sold as plant foods without saying what they contain. The RHS advises caution: they may hold very little nutrient.' ),
						array( 'name' => 'Organic or inorganic', 'why' => 'Organic fertilizers such as seaweed are usually less concentrated and have a smaller carbon footprint. Inorganic fertilizers are stronger and faster, with a higher environmental cost and more harm if overdosed.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'High-potassium liquid fertilizer (tomato fertilizer)',
							'best_for' => 'Best for tomatoes, peppers, beans and other fruiting crops',
							'verdict'  => 'The fertilizer most container vegetables need once they flower. Potassium supports flowering and fruiting, and Backyard Harvest recommends a high-potash fertilizer for fruiting crops in pots through the growing season.',
							'pros'     => "Supports flowers and fruit\nSold in organic and inorganic versions",
							'cons'     => 'Not the best match for leafy and root crops',
							'specs'    => "Main nutrient: Potassium (K)\nBest for: Fruiting crops",
						),
						array(
							'name'     => 'General-purpose liquid fertilizer',
							'best_for' => 'Best for salad greens, chard, beets and herbs',
							'verdict'  => 'A compound fertilizer with nitrogen, phosphorus and potassium that supports leaves, shoots and roots. Backyard Harvest suggests a balanced fertilizer for root and leaf crops in containers.',
							'pros'     => "Covers leafy and root crops\nSome also add trace elements",
							'cons'     => 'Read the bracketed figures: some are higher in nitrogen than the name suggests',
							'specs'    => "Main nutrients: Nitrogen, phosphorus and potassium\nBest for: Leaf and root crops",
						),
						array(
							'name'     => 'Seaweed-based organic liquid fertilizer',
							'best_for' => 'Best for organic growers',
							'verdict'  => 'Made from seaweed, a plant source. The RHS suggests seaweed as an organic liquid fertilizer for containers through the growing season. It is milder than an inorganic fertilizer.',
							'pros'     => "Usually a smaller carbon footprint than inorganic fertilizers\nLiquid organic fertilizers act faster than dry organic ones",
							'cons'     => 'Less concentrated than inorganic fertilizers',
							'specs'    => "Type: Organic, plant-based\nBest for: Any container crop",
						),
						array(
							'name'     => 'Concentrated inorganic liquid or water-soluble powder',
							'best_for' => 'Best for a quick boost',
							'verdict'  => 'Synthetic fertilizers sold as liquids or powders to dissolve. The RHS describes them as more concentrated and faster acting than organic fertilizers, which also makes the dose more important.',
							'pros'     => 'Fast acting and concentrated',
							'cons'     => "Higher environmental impact\nOverdosing can damage plants and pollute water",
							'specs'    => "Type: Inorganic\nBest for: Fast results; follow the label exactly",
						),
						array(
							'name'     => 'High-nitrogen liquid fertilizer for seedlings',
							'best_for' => 'Best for seedlings in peat-free seed-starting mix',
							'verdict'  => 'Peat-free seed-starting mix holds little food, and the RHS suggests a fertilizer high in nitrogen and low in potassium once seedlings start to grow. A general-purpose liquid fertilizer still helps if you have no other.',
							'pros'     => 'Matches what young seedlings need',
							'cons'     => 'Nitrogen-rich feeding gives soft, lush growth that pests and bad weather damage more easily',
							'specs'    => "Main nutrient: Nitrogen (N)\nBest for: Seedlings and young plants",
						),
					),
					'faq'      => array(
						array( 'question' => 'Can I use tomato fertilizer on peppers and zucchini?', 'answer' => 'Yes. Tomato fertilizer is a high-potassium fertilizer, and potassium supports flowering and fruiting, so it suits other crops grown for their fruit once they start to flower.' ),
						array( 'question' => 'Is a plant food with no nutrient figures on the label any good?', 'answer' => 'Be careful. The RHS warns that products sold without a stated nutrient content may contain very little. Choose one that lists its N, P and K.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Fertilisers', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertilisers' ),
						array( 'title' => 'RHS — Fertiliser labels explained', 'url' => 'https://www.rhs.org.uk/garden-jobs/fertiliser-labels-explained' ),
						array( 'title' => 'RHS — Nutrition: feeding plants', 'url' => 'https://www.rhs.org.uk/garden-jobs/nutrition-feeding-plants' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'This guide sorts liquid fertilizers by type and leaves brands aside. Each pick rests on the RHS pages on fertilizers, labels and feeding, plus Backyard Harvest (pp. 17, 84 and 120), all in the Sources list. We have not trialed any fertilizer ourselves.' ) .
					$h2( 'Using the fertilizer' ) .
					$p( 'When to start, how often to fertilize and how to avoid harm are explained in <a href="/how-to-fertilize-container-plants/">how to fertilize container plants</a>. If you would rather make your own, see <a href="/projects/make-comfrey-liquid-fertilizer/">make a comfrey liquid fertilizer</a>.' ),
			),

			'best-grow-bags' => array(
				'image_prompt' => 'A plain unprinted plastic grow bag of potting mix lying flat on a sunny patio against a warm brick wall, planted through holes in the top with two young tomato plants tied to canes, with basil filling the gap between them.' . $photo_end,
				'pin_prompt'   => 'Two tomato plants with green trusses growing in a flat grow bag of potting mix against a sunny wall on a balcony, photographed vertically.' . $pin_end,
				'title'    => 'The Best Grow Bags for a Balcony or Patio',
				'category' => array( 'pots-planters' ),
				'method'   => 'researched',
				'excerpt'  => 'Choose a peat-free grow bag, the kind that is a bag of potting mix you plant straight into: a standard one takes two tomato, eggplant or cucumber plants, or two or three bell peppers. For deeper roots, a bag of peat-free soil-based potting mix cut in half and stood on end makes two tall planting pockets.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'Peat-free potting mix inside', 'why' => 'The RHS recommends peat-free grow bags (sold in the UK as growing bags). Check the bag says peat-free; the mix inside is the whole growing medium.' ),
						array( 'name' => 'How many plants it must hold', 'why' => 'The RHS gives two tomatoes, two eggplants or two cucumbers per standard bag, and two or three peppers. One or two compact zucchini plants also fit.' ),
						array( 'name' => 'Depth for the roots', 'why' => 'A flat bag is shallow. An RHS adviser cuts bags of soil-based potting mix in half and stands them on end for a deeper root run.' ),
						array( 'name' => 'Room to support the plants', 'why' => 'Tall tomatoes need a cane or a string for support from the day you plant. A bag laid against a wall or under a frame makes that easier.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Standard peat-free grow bag',
							'best_for' => 'Best for tomatoes, peppers, eggplants and cucumbers',
							'verdict'  => 'The simplest way to grow summer crops on a hard floor. Backyard Harvest calls grow bags very versatile, indoors or out, and the RHS lists them for tomatoes, peppers, eggplants, cucumbers, zucchini, lettuce, basil and strawberries.',
							'pros'     => "Ready to plant: cut holes in the top\nHolds two or three fruiting plants\nSuits low crops too, such as lettuce and strawberries",
							'cons'     => "The water supply can vary a lot in a bag: check it often\nMake drainage slits in the base before planting",
							'specs'    => "Plants per bag: Two tomatoes, eggplants or cucumbers; two or three peppers\nPotting mix: Peat-free",
						),
						array(
							'name'     => 'Bag of peat-free soil-based potting mix, cut in half and stood on end',
							'best_for' => 'Best for deeper roots in a small space',
							'verdict'  => 'An RHS adviser grows tomatoes in bags of peat-free soil-based potting mix cut in two and stood upright, which gives each plant a deeper root run than a traditional flat bag.',
							'pros'     => "Deeper root run than a flat bag\nTwo planting pockets from one bag",
							'cons'     => 'Soil-based potting mix is heavy, so plan where the bags will stand',
							'specs'    => "Plants per bag: Two (one per half)\nPotting mix: Peat-free, soil-based",
						),
						array(
							'name'     => 'Large pot of 12–18 in (30–45 cm)',
							'best_for' => 'Best when a bag will not fit',
							'verdict'  => 'The alternative the RHS gives for a single tomato. A tall pot takes up less floor than a bag, which can suit a narrow balcony.',
							'pros'     => 'Fits a corner or a narrow strip of floor',
							'cons'     => 'One tomato per pot, against two per standard bag',
							'specs'    => "Plants: One tomato\nSize: 12–18 in (30–45 cm)",
						),
					),
					'faq'      => array(
						array( 'question' => 'Does a grow bag need drainage holes?', 'answer' => 'Yes. Cut holes in the top for the plants and make slits in the base so extra water can drain away.' ),
						array( 'question' => 'What can I grow in the gaps of a tomato grow bag?', 'answer' => 'The RHS suggests sun-loving herbs such as basil or cilantro, or nasturtiums to trail over the sides.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — Grow your own tomatoes in a pot', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/containers/may-edible-container-idea' ),
						array( 'title' => 'RHS — Crops in pots', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/crops-in-pots' ),
						array( 'title' => 'RHS — Fast-growing tomatoes', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/fast-tomatoes' ),
						array( 'title' => 'RHS — Tomato splitting and cracking', 'url' => 'https://www.rhs.org.uk/problems/tomatoes-fruit-splitting-and-cracking' ),
						array( 'title' => 'RHS — How to grow peppers', 'url' => 'https://www.rhs.org.uk/vegetables/peppers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow aubergines', 'url' => 'https://www.rhs.org.uk/vegetables/aubergines/grow-your-own' ),
						array( 'title' => 'RHS — How to grow cucumbers', 'url' => 'https://www.rhs.org.uk/vegetables/cucumbers/grow-your-own' ),
						array( 'title' => 'RHS — How to grow courgettes', 'url' => 'https://www.rhs.org.uk/vegetables/courgettes/grow-your-own' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'Here we weigh up kinds of grow bag rather than brands. The facts come from RHS crop guides and Backyard Harvest (pp. 85, 99 and 114), as listed in Sources. None of these bags has been through a trial by Natura.' ) .
					$h2( 'After planting' ) .
					$p( 'For the crop itself, see <a href="/plants/cherry-tomato/">cherry tomatoes in pots</a> or <a href="/plants/bell-peppers-in-pots/">bell peppers in pots</a>; uneven watering is a common cause of <a href="/problems/tomatoes-splitting/">split tomatoes</a>, and other containers are compared in <a href="/how-to-choose-pots-for-vegetables/">how to choose pots for vegetables</a>.' ),
			),

			'best-plant-supports-for-pots' => array(
				'image_prompt' => 'Large pots on a sunny balcony with a bamboo cane tepee carrying pole beans, twiggy pea brush holding young pea plants, and a single tall bamboo stake with a cordon tomato tied in with soft green twine.' . $photo_end,
				'pin_prompt'   => 'A bamboo cane tepee in a large pot with pole bean plants twining up, tied at the top with twine, on a balcony, photographed vertically.' . $pin_end,
				'title'    => 'The Best Plant Supports for Pots: Canes, Netting and Ties',
				'category' => array( 'tools-supports' ),
				'method'   => 'researched',
				'excerpt'  => 'Match the support to the way the plant climbs: bamboo canes (stakes) for beans and tomatoes, netting or twiggy sticks for peas, and soft garden twine to tie them in. Whatever you choose must take the weight of the full-grown crop and the wind on your balcony.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'How the crop climbs', 'why' => 'Peas hold on with tendrils and need lots of small places to grip. Beans twine around a smooth upright. Tomatoes have no way of holding on and must be tied in as they grow.' ),
						array( 'name' => 'Strength for the full crop and the wind', 'why' => 'Backyard Harvest stresses that a support must carry the weight of fully grown plants, especially in an exposed spot. The RHS adds that supports for tall plants must be well anchored so they do not blow over.' ),
						array( 'name' => 'Ties that will not cut', 'why' => 'The RHS prefers soft garden twine to wire or plastic, which can damage stems and leaves. Tie loosely so stems can move in the wind.' ),
						array( 'name' => 'Put it in early', 'why' => 'Supports go in at planting or before the plants grow much. Added later, they are hard to fit without damaging the stems.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Bamboo canes (stakes), single or as a tepee',
							'best_for' => 'Best for pole beans and tomatoes',
							'verdict'  => 'A tall single cane suits a cordon tomato; several pushed in around a large pot and tied at the top make a tepee for beans. Backyard Harvest says even a tepee can be built in a big patio container.',
							'pros'     => "Smooth canes suit twining beans\nEasy to add another cane as plants grow",
							'cons'     => "A tall cane can make a pot top-heavy: stand it somewhere sheltered\nA laden tepee needs tying at the top and lower down",
							'specs'    => "Best for: Beans, cordon tomatoes\nTie with: Soft twine",
						),
						array(
							'name'     => 'Plastic trellis netting or chicken wire on canes',
							'best_for' => 'Best for tall peas',
							'verdict'  => 'The RHS suggests netting or chicken wire attached to posts or canes for taller pea varieties. Pea tendrils grip netting very securely.',
							'pros'     => "Gives tendrils many places to hold\nWorks for most climbing and sprawling crops",
							'cons'     => 'Needs firm canes or posts to stretch it between',
							'specs'    => "Best for: Peas and other climbers with tendrils\nFix to: Canes, posts or a fence",
						),
						array(
							'name'     => 'Twiggy pea sticks (pea brush)',
							'best_for' => 'Best for short peas',
							'verdict'  => 'Well-branched sticks pushed in among the plants. The RHS says a few twiggy sticks are enough for shorter pea varieties, and Backyard Harvest notes they can be cut from any stemmy shrub.',
							'pros'     => "Many small branches for tendrils\nCan be cut from prunings",
							'cons'     => 'Too short for tall varieties',
							'specs'    => 'Best for: Short peas',
						),
						array(
							'name'     => 'Vertical string from an overhead support',
							'best_for' => 'Best for cordon tomatoes and cucumbers',
							'verdict'  => 'A string hung from a frame above, with the bottom end under the root ball. The RHS advises leaving it slightly slack and winding it around the main stem as the plant grows.',
							'pros'     => "Takes up almost no floor space\nEasy to wind the stem around as it grows",
							'cons'     => 'Needs a strong, well-fixed frame overhead',
							'specs'    => 'Best for: Single-stemmed tomatoes, cucumbers, melons',
						),
						array(
							'name'     => 'Soft garden twine',
							'best_for' => 'Best for tying plants in',
							'verdict'  => 'The RHS recommends 3-ply soft twine for small plants and 5-ply for larger ones. Tie with a figure-eight loop so the string sits between stem and cane and stops them rubbing.',
							'pros'     => 'Gentler on stems than wire or plastic ties',
							'cons'     => 'Tied too tightly, it can still damage stems: check ties as plants grow',
							'specs'    => 'Grades: 3-ply for small plants, 5-ply for larger ones',
						),
						array(
							'name'     => 'Wires or trellis on a wall',
							'best_for' => 'Best for climbers against a balcony wall',
							'verdict'  => 'For permanent climbers, the RHS suggests taut wires held by vine eyes 12–18 in (30–45 cm) apart, or trellis fixed on wooden strips, held about 2 in (5 cm) off the wall.',
							'pros'     => 'Uses wall space and gives shelter',
							'cons'     => 'Fixings must be strong: check what your building allows',
							'specs'    => "Wire spacing: 12–18 in (30–45 cm)\nGap from wall: About 2 in (5 cm)",
						),
					),
					'faq'      => array(
						array( 'question' => 'Can I use plastic ties instead of twine?', 'answer' => 'The RHS prefers soft garden twine: wire and plastic ties can damage stems and leaves.' ),
						array( 'question' => 'Do bush tomatoes need a support?', 'answer' => 'Less than cordons. Bush (determinate) types are compact, but the RHS says they may need short canes if they grow large or carry a heavy crop.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Perennials: staking for support', 'url' => 'https://www.rhs.org.uk/plants/types/perennials/staking' ),
						array( 'title' => 'RHS — Climbers: training and pruning on planting', 'url' => 'https://www.rhs.org.uk/plants/types/climbers/pruning-training-on-planting' ),
						array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						array( 'title' => 'RHS — How to grow peas', 'url' => 'https://www.rhs.org.uk/vegetables/peas/grow-your-own' ),
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'The picks are types of support and tie, with no brands named. They are drawn from the RHS guides on staking, climbers, tomatoes and peas, and from Backyard Harvest (pp. 88–89 and 118), which appear in the Sources list. We have run no trial of our own on them.' ) .
					$h2( 'Building one' ) .
					$p( 'Step-by-step instructions for a cane tepee are in <a href="/projects/make-a-bean-tepee-in-a-pot/">make a bean tepee in a pot</a>, and the crop guides for <a href="/plants/peas-in-pots/">peas</a> and <a href="/plants/runner-beans-in-pots/">runner beans</a> say when to put them up.' ),
			),

			'best-hand-tools-for-container-gardening' => array(
				'image_prompt' => 'A small set of plain unbranded hand tools laid on a wooden balcony table beside terra-cotta pots: a sturdy hand trowel, a small hand fork, a pair of bypass hand pruners, a wooden dibble and a ball of garden twine.' . $photo_end,
				'pin_prompt'   => 'A hand trowel, hand fork and hand pruners resting on the rim of a large pot of herbs on a sunny balcony, photographed vertically.' . $pin_end,
				'title'    => 'The Best Hand Tools for Container Gardening',
				'category' => array( 'tools-supports' ),
				'method'   => 'researched',
				'excerpt'  => 'For pots you need only a few small tools: a sturdy trowel, a hand fork, a pair of hand pruners and something to make holes for seeds. Spades, rakes and other big tools are for open ground.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'Only what pots need', 'why' => 'Backyard Harvest points out that if you grow only in containers, you can do without the large tools needed to cultivate open soil.' ),
						array( 'name' => 'Size and weight that suit you', 'why' => 'Choose tools of a size and weight that fit your build and strength, so the work stays manageable.' ),
						array( 'name' => 'Quality over quantity', 'why' => 'A few good tools, looked after, are worth more than many cheap ones. Buy the best you can reasonably afford.' ),
						array( 'name' => 'Blades you can keep sharp and clean', 'why' => 'The RHS says sharp tools are safer and more efficient than blunt ones, and cleaning them after use helps stop diseases spreading. Check whether the pruners can be taken apart for maintenance.' ),
						array( 'name' => 'Metal that resists rust', 'why' => 'Many modern tools are stainless steel, which is less likely to rust, though the RHS notes this depends on the quality of the metal.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Sturdy hand trowel',
							'best_for' => 'Best for planting and potting',
							'verdict'  => 'The one tool every container grower uses. Backyard Harvest calls the trowel essential for planting out and for removing weeds.',
							'pros'     => "Plants, pots up and fills containers\nLifts weeds from the potting mix",
							'cons'     => 'Clean and dry it after use so the metal does not rust',
							'specs'    => 'Best for: Planting, potting, weeding',
						),
						array(
							'name'     => 'Hand fork (hand cultivator)',
							'best_for' => 'Best for weeding and loosening potting mix in tight spots',
							'verdict'  => 'Backyard Harvest recommends an ergonomic hand fork for weeding in tight spots, where a trowel is clumsy among the stems.',
							'pros'     => "Works between plants in a crowded pot\nLifts weeds with their roots",
							'cons'     => 'Brush soil off after use: soil left on tools can carry diseases',
							'specs'    => 'Best for: Weeding, loosening the potting mix surface',
						),
						array(
							'name'     => 'Hand pruners (secateurs)',
							'best_for' => 'Best for pruning fruit and cutting crops',
							'verdict'  => 'Essential if you grow fruit, and handy for harvesting. Backyard Harvest says they cut new growth and woody stems up to pencil thickness; thicker stems need loppers. The RHS suggests a good pair for pruning and a cheaper second pair for rougher jobs.',
							'pros'     => "Clean cuts on stems up to pencil thickness\nSaves your kitchen scissors from blunting",
							'cons'     => 'Blunt blades crush stems and damage plants: keep them sharp',
							'specs'    => 'Cuts: Green growth and woody stems up to pencil thickness',
						),
						array(
							'name'     => 'Dibble (dibber)',
							'best_for' => 'Best for sowing and pricking out',
							'verdict'  => 'A small stick for making holes in potting mix when sowing large seeds or moving seedlings. The RHS notes a pencil, a plant label or a chopstick can do the same job.',
							'pros'     => 'Makes neat holes at the right depth',
							'cons'     => 'Easy to replace with something you already own',
							'specs'    => 'Best for: Sowing, transplanting seedlings',
						),
						array(
							'name'     => 'Pocket diamond sharpener',
							'best_for' => 'Best for keeping hand pruners sharp',
							'verdict'  => 'The RHS describes diamond-coated blocks and pocket tools as ideal for sharpening pruners and knives, including on the go. Whetstones and sharpening steels also work.',
							'pros'     => "Small enough to store with your tools\nSharpens pruners that cannot be taken apart",
							'cons'     => 'Sharpen the angled side only: the flat side affects the cut',
							'specs'    => 'For: Hand pruners, knives and other blades',
						),
					),
					'faq'      => array(
						array( 'question' => 'Do I need a spade or a full-size fork for container growing?', 'answer' => 'No. Backyard Harvest notes that if you grow only in pots, you can skip the large tools used to cultivate open ground. A trowel and a hand fork cover the work.' ),
						array( 'question' => 'How do I look after hand pruners?', 'answer' => 'Clean dried sap off the blades with a scouring pad or steel wool, oil the pivot, and sharpen the angled side of the blade. The RHS suggests cleaning tools after every use; wear gloves when using oil and steel wool.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Sharpening hand tools', 'url' => 'https://www.rhs.org.uk/garden-jobs/sharpening-tools' ),
						array( 'title' => 'RHS — Cleaning hand tools', 'url' => 'https://www.rhs.org.uk/garden-jobs/cleaning-tools' ),
						array( 'title' => 'RHS — How to grow tomatoes (glossary: dibber)', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'No brands appear here: the guide compares kinds of hand tool. What we say about each comes from the RHS advice on cleaning and sharpening tools and from Backyard Harvest (pp. 19, 141, 171 and 217), all cited in Sources. Natura has not tested these tools.' ) .
					$h2( 'The rest of the kit' ) .
					$p( 'Choosing a watering can has its own guide, <a href="/gear/best-watering-can-for-a-balcony/">the best watering can for a balcony</a>, and canes and ties are compared in <a href="/gear/best-plant-supports-for-pots/">the best plant supports for pots</a>.' ),
			),

			'best-mini-greenhouse-for-a-balcony' => array(
				'image_prompt' => 'A tall narrow unbranded mini-greenhouse with a clear zip-up plastic cover, the front rolled up, standing against a sunny balcony wall with tomato plants in a grow bag of potting mix inside, its frame tied to a wall hook; a glass bell cloche over a lettuce in a pot beside it.' . $photo_end,
				'pin_prompt'   => 'A small mini-greenhouse with its clear cover partly open on a sunny balcony, young tomato and pepper plants inside, photographed vertically.' . $pin_end,
				'title'    => 'The Best Mini-Greenhouse for a Balcony, and When a Cloche Will Do',
				'category' => array( 'tools-supports' ),
				'method'   => 'researched',
				'excerpt'  => 'For tomatoes in a grow bag, a tall mini-greenhouse with a zip-up cover is the space-saving choice, as long as it stands against a wall and is firmly anchored. For a single small plant, a bell cloche is often enough.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'Anchoring against wind', 'why' => 'The RHS names gusts of wind as the main cause of damage to frames and mini-greenhouses. Lightweight ones must be staked or tied down, which on a balcony means a secure fixing point.' ),
						array( 'name' => 'Ventilation you can adjust', 'why' => 'Many mini-greenhouses lack a way to vary the ventilation, which leads to damaging swings in temperature. Look for vents or a cover that rolls up in stages.' ),
						array( 'name' => 'A cover you can replace', 'why' => 'The RHS warns that plastic covers are often hard to replace, so a cheap model can turn out a poor investment.' ),
						array( 'name' => 'Glass or plastic', 'why' => 'The RHS rates glass above plastic for these structures, and glass cloches keep more warmth at night.' ),
						array( 'name' => 'Shelves and shade', 'why' => 'Shelves add space but shade the plants below, which does not suit raising young plants.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Tall mini-greenhouse with a zip-up plastic cover',
							'best_for' => 'Best for tomatoes and peppers on a balcony',
							'verdict'  => 'Backyard Harvest recommends taller models for tomatoes in grow bags in a sunny, sheltered spot, and notes they pack away when not needed. An RHS adviser uses one to keep rain off outdoor tomatoes. Stand it against a wall: an exposed one gives uneven conditions inside.',
							'pros'     => "Covers taller plants than a cold frame\nSmall footprint\nPacks away out of season",
							'cons'     => "Must be anchored securely\nOften little control over ventilation\nPlastic covers can be hard to replace",
							'specs'    => "Cover: Plastic, zip-up\nBest for: Tall tender crops",
						),
						array(
							'name'     => 'Mini-greenhouse with rigid or glazed panels',
							'best_for' => 'Best for a sheltered patio corner',
							'verdict'  => 'Some mini-greenhouses use rigid plastic sheets or glass instead of a loose cover. The RHS prefers glass to plastic, but glass is heavy and can break, so weigh up the weight and safety on a balcony.',
							'pros'     => "Firmer than a loose cover\nGlass is the RHS's preferred material",
							'cons'     => "Heavy, and glass can break\nStill needs anchoring and ventilation",
							'specs'    => 'Panels: Rigid plastic or glass',
						),
						array(
							'name'     => 'Cold frame with an opening lid',
							'best_for' => 'Best for hardening off and raising young plants',
							'verdict'  => 'A low box with a sloping, clear lid. The RHS wants lids that are robust, easy to open and set at different heights, so you can let air in while keeping heavy rain off.',
							'pros'     => "Ideal halfway house for hardening off\nLid controls ventilation",
							'cons'     => "Too low for tall crops\nLight frames need staking down",
							'specs'    => "Height: Low\nBest for: Seedlings and young plants",
						),
						array(
							'name'     => 'Bell cloche',
							'best_for' => 'Best for a single pot or plant',
							'verdict'  => 'The simplest cover, made to sit over one plant. Glass ones need no weighting down; plastic ones are usually staked. If there are no vent holes, raise the edge slightly for air.',
							'pros'     => "Easy to move to wherever it is needed\nGlass keeps more warmth at night",
							'cons'     => "Covers only one plant\nInsect-pollinated crops under cover need ventilation on warm, still days",
							'specs'    => "Material: Glass or plastic\nCovers: One plant",
						),
						array(
							'name'     => 'Cut-down plastic bottle',
							'best_for' => 'Best for one seedling, at no cost',
							'verdict'  => 'Both the RHS and Backyard Harvest suggest cut-off plastic bottles over individual seedlings. They are a stopgap rather than a long-term cover.',
							'pros'     => 'Uses something you already have',
							'cons'     => "Must be well anchored\nSuffers from condensation; take it off promptly",
							'specs'    => 'Covers: One seedling',
						),
					),
					'faq'      => array(
						array( 'question' => 'Will a plastic mini-greenhouse keep frost off?', 'answer' => 'Only light frost. The RHS says these structures protect young plants from cooler weather and mild frosts, not hard ones. A layer of bubble wrap inside adds some insulation but cuts light and ventilation.' ),
						array( 'question' => 'Where should a mini-greenhouse stand on a balcony?', 'answer' => 'Against a wall, in a sunny, sheltered spot, fixed so wind cannot lift it. The RHS notes that one exposed on every side gives uneven conditions inside.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Coldframes and mini-greenhouses', 'url' => 'https://www.rhs.org.uk/garden-features/coldframes-and-mini-greenhouses' ),
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						array( 'title' => 'RHS — Crops in pots', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/features/crops-in-pots' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'We look at kinds of cover and frame in this guide and name no brands. It draws on the RHS guides to cold frames, mini-greenhouses and cloches, together with Backyard Harvest (pp. 12–13 and 86), which are listed under Sources. We have not set up any of these to test them.' ) .
					$h2( 'Using it well' ) .
					$p( 'Open it on warm days and close it on cold nights. Moving plants outside gradually is explained in <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>, and a homemade option is <a href="/projects/make-a-mini-cold-frame/">make a mini cold frame for a balcony</a>.' ),
			),

			'best-crop-covers' => array(
				'image_prompt' => 'A long balcony trough of young carrots and salad greens covered by fine white insect netting stretched over wire hoops and staked at the edges, next to a pot of chard under a loose layer of white row cover, on a bright balcony.' . $photo_end,
				'pin_prompt'   => 'Fine insect netting over wire hoops on a trough of young vegetables on a sunny balcony, photographed vertically.' . $pin_end,
				'title'    => 'Row Cover or Insect Mesh: The Best Crop Covers for Pots',
				'category' => array( 'tools-supports' ),
				'method'   => 'researched',
				'excerpt'  => 'Buy insect-proof mesh to keep pests such as carrot rust fly off your crops, and row cover (frost cloth) to add a little warmth and shelter from wind. If you need new row cover, the RHS recommends a plastic-free one.',
				'lists'    => array(
					'criteria' => array(
						array( 'name' => 'What you want to keep out', 'why' => 'Row cover is mainly for warmth and shelter; insect-proof mesh is mainly for pests and gives protection without much rise in temperature. Both help against wind and hail.' ),
						array( 'name' => 'The weight of row cover', 'why' => 'Row cover is sold by weight per area. Lightweight cover of about 0.5 oz per sq yd (17 g per m²) lets more light through and suits young crops; heavier cover of about 1 oz per sq yd (35 g per m²) gives more protection to tender plants.' ),
						array( 'name' => 'How long it will last', 'why' => 'The RHS warns that polypropylene row cover is not durable: light grades may last only a year before breaking into small pieces. Woven covers last much longer.' ),
						array( 'name' => 'What it is made of', 'why' => 'In the UK, polypropylene row cover and polyethylene covers cannot currently go in council (curbside) recycling. The RHS suggests reusing old row cover or buying plastic-free options made from plant materials or sheep\'s wool.' ),
						array( 'name' => 'A size you can reuse', 'why' => 'Covers cut to small, exact sizes are harder to reuse. A piece that fits several of your troughs will serve longer.' ),
					),
					'picks'    => array(
						array(
							'name'     => 'Insect-proof mesh (insect netting)',
							'best_for' => 'Best for carrots, cabbage-family crops and leafy crops',
							'verdict'  => 'The cover to buy against flying pests. RHS research found that covering the whole crop with insect-proof mesh is the most effective way to stop carrot rust fly. Backyard Harvest lays mesh over wire hoops spaced every 1 ft (30 cm), anchored at the edges.',
							'pros'     => "Keeps out flying pests\nLittle rise in temperature, so it can stay on in summer\nShelters crops from wind and hail",
							'cons'     => 'Take it off insect-pollinated crops such as strawberries and zucchini while they flower',
							'specs'    => "Main use: Pests\nSupport: Wire hoops about 1 ft (30 cm) apart",
						),
						array(
							'name'     => 'Plastic-free row cover (plant-based or sheep\'s wool)',
							'best_for' => 'Best choice if you are buying new row cover',
							'verdict'  => 'The RHS calls plastic-free fleece (row cover) the most sustainable option. It does the same job as ordinary row cover, though it handles differently; wool is heavier.',
							'pros'     => "Most sustainable choice, according to the RHS\nGives warmth and wind shelter like other row cover",
							'cons'     => 'Handles differently from polypropylene row cover; wool is heavier',
							'specs'    => "Material: Plant-based fiber or sheep's wool\nMain use: Warmth and shelter",
						),
						array(
							'name'     => 'Lightweight polypropylene row cover (about 0.5 oz per sq yd)',
							'best_for' => 'Best for seedlings and early sowings',
							'verdict'  => 'Very light, so it lies straight on the plants without hoops and lets plenty of light through. Covered crops can be ready about two weeks earlier, according to the RHS.',
							'pros'     => "Good light penetration\nNo hoops needed",
							'cons'     => "Light grades may last only one year before breaking up\nPlastic-based and hard to recycle",
							'specs'    => "Weight: About 0.5 oz per sq yd (17 g per m²)\nMain use: Bringing on young crops",
						),
						array(
							'name'     => 'Heavyweight polypropylene row cover (about 1 oz per sq yd)',
							'best_for' => 'Best for tender plants on cold nights',
							'verdict'  => 'A thicker grade for more cold protection. Row cover can also be doubled up for extra frost protection. Without sun, the temperature under any cover soon falls to that outside, so it shelters rather than heats.',
							'pros'     => "More cold protection than lightweight row cover\nCan be layered",
							'cons'     => "Lets less light through\nPlastic-based",
							'specs'    => "Weight: About 1 oz per sq yd (35 g per m²)\nMain use: Cold protection",
						),
						array(
							'name'     => 'Woven polyethylene cover',
							'best_for' => 'Best for a cover that lasts for years',
							'verdict'  => 'A soft woven cover that the RHS says lasts at least five years, stands up to foxes and can be rinsed clean. Its makers claim it behaves like lightweight row cover.',
							'pros'     => "Lasts at least five years\nCan be rinsed clean",
							'cons'     => 'Still a plastic product',
							'specs'    => "Lifespan: At least five years\nMain use: Shelter and pest protection",
						),
					),
					'faq'      => array(
						array( 'question' => 'Does row cover need hoops to hold it up?', 'answer' => 'No. Row cover is light enough to lay straight over the plants. Mesh and netting are often stretched over wire hoops so they sit clear of the leaves.' ),
						array( 'question' => 'Can I leave insect mesh on all summer?', 'answer' => 'Yes, on crops that do not need insects to pollinate them, such as carrots and leafy crops. It gives protection without a big rise in temperature. Uncover strawberries and zucchini while they flower.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Fleece and crop covers', 'url' => 'https://www.rhs.org.uk/prevention-protection/fleece-and-crop-covers' ),
						array( 'title' => 'RHS — Cloches', 'url' => 'https://www.rhs.org.uk/prevention-protection/cloches' ),
						array( 'title' => 'RHS — How to grow carrots', 'url' => 'https://www.rhs.org.uk/vegetables/carrots/grow-your-own' ),
						$book,
					),
				),
				'content'  =>
					$h2( 'How we chose' ) .
					$p( 'This is a comparison of cover types, not of brands. Its facts come from the RHS guides to fleece (row cover), crop covers and cloches, the RHS carrot guide and Backyard Harvest (pp. 102–103 and 168), all named in Sources. Natura has not used these covers in a trial.' ) .
					$h2( 'Where to go next' ) .
					$p( 'Protecting the pots themselves in a cold snap is covered in <a href="/protect-pots-in-winter/">how to protect pots in winter</a>; for pests that mesh keeps out, see <a href="/problems/caterpillars-on-brassicas/">caterpillars on brassicas</a> and <a href="/plants/carrots-in-pots/">carrots in pots</a>.' ),
			),
		),
	),
);
