<?php
/**
 * Demo content for previews (WordPress Playground, local installs): plant
 * guides, problem guides, and Plant Care articles.
 *
 * Nothing here runs on its own: call natura_core_import_demo() from WP-CLI or
 * a Playground blueprint. Existing guides with the same address are left as
 * they are, so running it twice changes nothing.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Creates the demo guides, published, with their photos.
 *
 * @param string $image_base Folder or URL holding cherry-tomato.jpg,
 *                           genovese-basil.jpg and balcony-strawberry.jpg.
 * @return int[] IDs of the guides created.
 */
function natura_core_import_demo( string $image_base ): array {
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$admins = get_users(
		array(
			'role'   => 'administrator',
			'number' => 1,
			'fields' => 'ID',
		)
	);
	$author = $admins ? (int) $admins[0] : 0;

	// Plants first, so problem guides and projects can link to them.
	$sets = array(
		'plant'   => natura_core_demo_plants(),
		'problem' => natura_core_demo_problems(),
		'post'    => natura_core_demo_articles(),
		'project' => natura_core_demo_projects(),
		'gear'    => natura_core_demo_gear(),
	);

	$created = array();
	foreach ( $sets as $kind => $guides ) {
		foreach ( $guides as $slug => $guide ) {
			$post_id = natura_core_create_guide( $kind, $slug, $guide, 'publish', $image_base, $author );
			if ( ! is_wp_error( $post_id ) ) {
				$created[] = $post_id;
			}
		}
	}

	return $created;
}

/**
 * Sets a demo guide's main photo, when it names one.
 *
 * @param int                  $post_id    Guide ID.
 * @param array<string, mixed> $guide      Demo guide with optional image and image_alt.
 * @param string               $image_base Image folder or URL.
 */
function natura_core_demo_set_photo( int $post_id, array $guide, string $image_base ): void {
	if ( empty( $guide['image'] ) ) {
		return;
	}
	$image_id = natura_core_demo_attach_image( trailingslashit( $image_base ) . $guide['image'], $post_id, (string) ( $guide['image_alt'] ?? '' ) );
	if ( $image_id ) {
		set_post_thumbnail( $post_id, $image_id );
	}
}

/**
 * Saves a demo guide's lists and Pinterest image. Product rows may name an
 * image file under the image folder; it is added to the media library.
 *
 * @param int    $post_id    Guide.
 * @param array  $lists      Lists, keyed by field.
 * @param string $pin        Pinterest image file, or ''.
 * @param string $image_base Image folder or URL.
 */
function natura_core_demo_save_fields( int $post_id, array $lists, string $pin, string $image_base ): void {
	foreach ( $lists as $key => $rows ) {
		foreach ( $rows as &$row ) {
			if ( ! empty( $row['image'] ) ) {
				$row['image'] = (string) natura_core_demo_attach_image( trailingslashit( $image_base ) . $row['image'], $post_id, $row['name'] ?? '' );
			}
		}
		unset( $row );
		update_post_meta( $post_id, natura_core_meta_key( $key ), $rows );
	}

	if ( $pin ) {
		$pin_id = natura_core_demo_attach_image( trailingslashit( $image_base ) . $pin, $post_id, '' );
		if ( $pin_id ) {
			update_post_meta( $post_id, natura_core_meta_key( 'pin_image' ), $pin_id );
		}
	}
}

/**
 * Adds an image to the media library from a local file or a URL.
 *
 * @param string $source  Path or URL.
 * @param int    $post_id Guide the image belongs to.
 * @param string $alt     Alternative text.
 */
function natura_core_demo_attach_image( string $source, int $post_id, string $alt ): int {
	if ( is_readable( $source ) ) {
		$tmp = wp_tempnam( basename( $source ) );
		copy( $source, $tmp );
	} else {
		$tmp = download_url( $source );
		if ( is_wp_error( $tmp ) ) {
			return 0;
		}
	}

	$image_id = media_handle_sideload(
		array(
			'name'     => basename( wp_parse_url( $source, PHP_URL_PATH ) ?: $source ),
			'tmp_name' => $tmp,
		),
		$post_id
	);

	if ( is_wp_error( $image_id ) ) {
		wp_delete_file( $tmp );
		return 0;
	}

	update_post_meta( $image_id, '_wp_attachment_image_alt', $alt );

	return (int) $image_id;
}

/**
 * Paragraph block.
 *
 * @param string $text Text, may contain inline HTML.
 */
function natura_core_demo_p( string $text ): string {
	return "<!-- wp:paragraph -->\n<p>{$text}</p>\n<!-- /wp:paragraph -->\n\n";
}

/**
 * Heading block (level 2).
 *
 * @param string $text Heading.
 */
function natura_core_demo_h2( string $text ): string {
	return "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">{$text}</h2>\n<!-- /wp:heading -->\n\n";
}

/**
 * List block.
 *
 * @param string[] $items Items, may contain inline HTML.
 */
function natura_core_demo_list( array $items ): string {
	$html = '';
	foreach ( $items as $item ) {
		$html .= "<!-- wp:list-item -->\n<li>{$item}</li>\n<!-- /wp:list-item -->\n";
	}

	return "<!-- wp:list -->\n<ul class=\"wp-block-list\">{$html}</ul>\n<!-- /wp:list -->\n\n";
}

/**
 * The demo guides.
 *
 * @return array<string, array>
 */
function natura_core_demo_plants(): array {
	$p    = 'natura_core_demo_p';
	$h2   = 'natura_core_demo_h2';
	$list = 'natura_core_demo_list';

	return array(
		'cherry-tomato'      => array(
			'image_prompt' => 'A cherry tomato plant tied to a bamboo cane in a 30-litre terracotta pot on a sunny balcony, trusses of small round red and green tomatoes, yellow star-shaped flowers, compound serrated leaves, late summer light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'A single cherry tomato plant heavy with ripe red trusses in a large pot against a warm balcony wall, photographed vertically from low down. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'     => 'How to Grow Cherry Tomatoes in Pots',
			'type'      => 'vegetables',
			// From the guide: 6–8 hours of sun, a big pot on a sunny balcony.
			'sun'       => array( 'full-sun' ),
			'space'     => array( 'balcony' ),
			'image'     => 'cherry-tomato.jpg',
			'pin'       => 'demo/pin-cherry-tomato.jpg',
			// Temperate climate (UK): sow indoors, plant out after the last frost.
			'months'    => array(
				'sow'     => array( 2, 3, 4 ),
				'plant'   => array( 5, 6 ),
				'harvest' => array( 7, 8, 9, 10 ),
			),
			'image_alt' => 'A cherry tomato plant with red and green fruit in a terracotta pot on a sunny balcony',
			'excerpt'   => 'Cherry tomatoes are one of the most rewarding crops for a sunny balcony. Give them a big pot, a sturdy support, and steady watering, and a single plant can keep you picking for months.',
			'facts'     => array(
				'short_name'     => 'Cherry tomato',
				'botanical_name' => 'Solanum lycopersicum var. cerasiforme',
				'difficulty'     => 'Moderate',
				'sun'            => '6–8 hours of direct sun',
				'pot_size'       => '20–30 L (5–8 gal) per plant',
				// RHS plant page for Solanum lycopersicum.
				'hardiness'      => 'H1c',
				'watering'       => 'Deeply, when the top 2–3 cm is dry',
				'harvest'        => '60–80 days after planting out',
				'season'         => 'Late spring to early autumn',
			),
			'lists'     => array(
				// Key points and varieties repeat only what the guide explains.
				'key_points' => array(
					array( 'point' => 'One plant per 20–30 litre pot, with drainage holes.' ),
					array( 'point' => 'Plant out after the last frost, in six to eight hours of direct sun.' ),
					array( 'point' => 'Water when the top 2–3 cm of compost is dry, and never let it dry out completely.' ),
					array( 'point' => 'Once the first flowers open, feed weekly with a high-potash tomato feed.' ),
					array( 'point' => 'Pick fruit when fully coloured, every couple of days.' ),
				),
				'varieties'  => array(
					array( 'name' => 'Sungold', 'note' => 'Cordon: one tall stem up to 1.5–2 m on a cane, cropping over a long season. For a sunny, sheltered wall.' ),
					array( 'name' => 'Gardener\'s Delight', 'note' => 'Cordon: one tall stem on a cane, side shoots pinched out. More fruit from the same floor space.' ),
					array( 'name' => 'Tumbling Tom', 'note' => 'Trailing: compact, no pinching, made for hanging baskets and the edge of a balcony box.' ),
				),
				'products' => array(
					array( 'name' => 'Fabric grow pot, 25–30 litres', 'badge' => 'Best for balconies', 'note' => 'Light to move, drains freely, and big enough to last a summer heatwave.', 'url' => 'https://www.example.com/fabric-pot', 'image' => 'demo/product-fabric-pot.jpg' ),
					array( 'name' => 'Peat-free container compost', 'badge' => '', 'note' => 'Holds water better than garden soil and drains freely.', 'url' => 'https://www.example.com/compost', 'image' => 'demo/product-compost.jpg' ),
					array( 'name' => 'Liquid tomato feed (high potash)', 'badge' => 'Start at first flowers', 'note' => 'Feeds the fruit rather than the leaves.', 'url' => 'https://www.example.com/tomato-feed', 'image' => 'demo/product-liquid-feed.jpg' ),
					array( 'name' => 'Soft jute garden twine', 'badge' => '', 'note' => 'Ties the stem to its cane without cutting into it.', 'url' => 'https://www.example.com/twine', 'image' => 'demo/product-twine.jpg' ),
				),
				'faq'      => array(
					array( 'question' => 'Can I grow cherry tomatoes indoors?', 'answer' => 'Yes, on a very sunny windowsill, but expect fewer fruit than outdoors. Indoor light is weaker, so a grow light helps. Tap the flower trusses gently every few days, because there is no wind or insects to pollinate them.' ),
					array( 'question' => 'How many cherry tomato plants can I put in one pot?', 'answer' => 'One plant per 20–30 litre pot. Two plants sharing a pot compete for water and food, and both crop less than one plant on its own.' ),
					array( 'question' => 'Why are the flowers falling off?', 'answer' => 'Flower drop usually follows very hot or cold nights, irregular watering, or poor pollination. Keep the compost evenly moist and give the plant a gentle shake on warm, dry days.' ),
					array( 'question' => 'Do I need to remove the side shoots?', 'answer' => 'Only on cordon (tall, single-stem) varieties. Bush and trailing varieties are left to branch freely; removing their shoots removes fruit.' ),
				),
				'sources'  => array(
					array( 'title' => 'RHS — How to grow tomatoes', 'url' => 'https://www.rhs.org.uk/vegetables/tomatoes/grow-your-own' ),
					array( 'title' => 'University of Minnesota Extension — Growing tomatoes in home gardens', 'url' => 'https://extension.umn.edu/vegetables/growing-tomatoes' ),
				),
			),
			'content'   =>
				$h2( 'Choose a variety that suits a pot' ) .
				$p( 'Cherry tomatoes come in two main shapes, and the difference decides how you will grow them.' ) .
				$list(
					array(
						'<strong>Cordon (tall) varieties</strong> grow on a single stem up to 1.5–2 m. They need a tall cane and regular pinching, and they crop over a long season. \'Sungold\' and \'Gardener\'s Delight\' are popular examples.',
						'<strong>Bush and trailing varieties</strong> stay compact and need little attention. Trailing types such as \'Tumbling Tom\' are made for hanging baskets and the edge of a balcony box.',
					)
				) .
				$p( 'On a small or windy balcony, a bush or trailing variety is the easier choice. If you have a sheltered, sunny wall, a cordon gives you more fruit from the same floor space.' ) .

				$h2( 'Pick the right pot and compost' ) .
				$p( 'Pot size is where most container tomatoes go wrong. A plant in full fruit can drink several litres a day in summer, and a small pot simply cannot hold that much water.' ) .
				$list(
					array(
						'Use at least 20 litres per plant, and 30 litres for cordon varieties.',
						'Check there are drainage holes. Tomatoes hate sitting in water.',
						'Light-coloured pots stay cooler in full sun than black plastic.',
						'Fill with fresh, peat-free container compost rather than garden soil, which packs down hard in a pot.',
					)
				) .

				$h2( 'When and where to plant' ) .
				$p( 'Tomatoes are tender. Plant outside only after your last frost, once nights stay above about 10 °C (50 °F). Before that, give young plants a week of hardening off: outside during the day, back inside at night.' ) .
				$p( 'Choose the sunniest spot you have, ideally with six to eight hours of direct sun. A position against a warm wall, sheltered from strong wind, is ideal. Plant slightly deeper than the plant sat in its nursery pot; tomatoes grow new roots along the buried stem.' ) .

				$h2( 'Support and pinch out' ) .
				$p( 'Push a cane or spiral support into the pot at planting time, then tie the stem loosely to it every 20–30 cm as it grows.' ) .
				$p( 'On cordon varieties, pinch out the side shoots that appear where a leaf meets the main stem. Do it while they are small, every few days. When the plant reaches the top of its support, or has set five or six trusses of flowers, pinch out the growing tip so the plant puts its energy into ripening fruit. Bush and trailing varieties need none of this.' ) .

				$h2( 'Water deeply and regularly' ) .
				$p( 'Steady moisture is the single most important thing. Check the compost every day in summer by pushing a finger in: water when the top 2–3 cm feels dry, and keep going until water runs from the drainage holes. In a heatwave, a large plant may need watering morning and evening.' ) .
				$p( 'Irregular watering is linked to two common problems: fruit that splits after a heavy drink, and blossom end rot, a dark patch at the base of the fruit. Both are far less likely when the compost never dries out completely. Water the compost, not the leaves, ideally in the morning.' ) .

				$h2( 'Feed once the flowers open' ) .
				$p( 'Fresh compost feeds the plant for its first few weeks. Once the first flowers open, start a liquid tomato feed high in potash, following the dilution on the label, usually once a week. Avoid high-nitrogen feeds at this stage: they produce lush leaves at the expense of fruit.' ) .

				$h2( 'Harvest' ) .
				$p( 'Pick cherry tomatoes when they are fully coloured and give slightly to a gentle squeeze. Picking every couple of days encourages the plant to keep ripening more fruit. At the end of the season, before the first frost, pick any green fruit and let it ripen indoors in a bowl.' ) .

				$h2( 'Common mistakes to avoid' ) .
				$list(
					array(
						'A pot that is too small: the plant wilts every afternoon and crops poorly.',
						'Watering in bursts: a dry day followed by a soaking leads to split fruit.',
						'Too little sun: lots of leaves, few flowers.',
						'Planting out too early: a cold night can set young plants back by weeks.',
						'Removing side shoots on a bush variety: you remove the fruit with them.',
					)
				),
		),
		'genovese-basil'     => array(
			'image_prompt' => 'A bushy Genovese basil plant with large glossy bright green leaves in a terracotta pot on a sunny kitchen windowsill, pinched shoot tips showing side shoots, soft morning light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'A lush basil plant in a terracotta pot on a wooden windowsill, a few picked leaves beside it, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'     => 'How to Grow Basil in Pots',
			'type'      => 'herbs',
			// From the guide: 6+ hours of sun, a bright windowsill, then the balcony.
			'sun'       => array( 'full-sun' ),
			'space'     => array( 'windowsill', 'balcony' ),
			'image'     => 'genovese-basil.jpg',
			'months'    => array(
				'sow'     => array( 3, 4, 5, 6 ),
				'plant'   => array( 6 ),
				'harvest' => array( 6, 7, 8, 9 ),
			),
			'image_alt' => 'A bushy Genovese basil plant in a cream ceramic pot by a window',
			'excerpt'   => 'Basil loves warmth and hates cold, wet roots. Grow it in a sunny, sheltered spot and pinch it often for a bushy plant that keeps producing leaves all summer.',
			'facts'     => array(
				'short_name'     => 'Basil',
				'botanical_name' => 'Ocimum basilicum \'Genovese\'',
				'difficulty'     => 'Easy',
				'sun'            => '6+ hours of sun',
				'pot_size'       => '3–5 L per plant',
				// RHS plant page for Ocimum basilicum.
				'hardiness'      => 'H1c',
				'watering'       => 'When the top of the compost is dry',
				'harvest'        => '3–4 weeks after planting',
				'season'         => 'Early summer to early autumn',
			),
			'lists'     => array(
				'key_points' => array(
					array( 'point' => 'Keep basil above 15 °C: indoors until nights are reliably warm.' ),
					array( 'point' => 'Pick the top pair of leaves from each stem, and remove flower buds.' ),
					array( 'point' => 'Water at the base, in the morning, when the top of the compost is dry.' ),
				),
			),
			'content'   =>
				$h2( 'Give basil warmth' ) .
				$p( 'Basil grows best above 15 °C (60 °F). Keep it indoors on a bright windowsill until nights are reliably warm, then move it to the sunniest, most sheltered corner of the balcony.' ) .
				$h2( 'Pinch for a bushy plant' ) .
				$p( 'Pick the top pair of leaves from each stem, just above a pair of side shoots. The plant branches at that point, and you get more leaves over the season. Remove flower buds as they appear.' ) .
				$h2( 'Water at the base' ) .
				$p( 'Water when the top of the compost feels dry, in the morning, and avoid wetting the leaves. Basil sitting in cold, wet compost is the most common reason it collapses.' ),
		),
		'balcony-strawberry' => array(
			'image_prompt' => 'Strawberry plants with trifoliate serrated leaves, white flowers and ripe red berries hanging over the edge of a balcony planter, straw tucked under the fruit, sunny early summer light. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'Ripe red strawberries hanging from a hanging pot on a sunny balcony railing, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'     => 'How to Grow Strawberries on a Balcony',
			'type'      => 'fruit',
			// From the guide: 6–8 hours of sun, grown on a balcony.
			'sun'       => array( 'full-sun' ),
			'space'     => array( 'balcony' ),
			'image'     => 'balcony-strawberry.jpg',
			'months'    => array(
				'plant'   => array( 3, 4, 5, 8, 9 ),
				'harvest' => array( 6, 7, 8, 9, 10 ),
			),
			'image_alt' => 'Ripe strawberries hanging from a plant in a weathered terracotta bowl',
			'excerpt'   => 'Strawberries crop well in pots, troughs, and hanging baskets. Everbearing varieties give you fruit from early summer into autumn from just a few plants.',
			'facts'     => array(
				'short_name'     => 'Strawberry',
				'botanical_name' => 'Fragaria × ananassa',
				'difficulty'     => 'Easy',
				'sun'            => '6–8 hours of sun',
				'pot_size'       => '3 L per plant, or 3 plants per 30 cm pot',
				// RHS plant page for Fragaria × ananassa.
				'hardiness'      => 'H6',
				'watering'       => 'Keep evenly moist while fruiting',
				'harvest'        => 'Early summer to autumn',
				'season'         => 'Plant in spring or early autumn',
			),
			'lists'     => array(
				'key_points' => array(
					array( 'point' => 'Choose everbearing varieties: fruit from early summer until autumn.' ),
					array( 'point' => 'Plant with the crown exactly at the surface of the compost.' ),
					array( 'point' => 'Water regularly while flowering and fruiting; feed every two weeks with a high-potash feed.' ),
				),
			),
			'content'   =>
				$h2( 'Choose everbearing plants' ) .
				$p( 'Everbearing (day-neutral) varieties crop in flushes from early summer until autumn, which suits a small space better than a single June harvest.' ) .
				$h2( 'Plant with the crown at soil level' ) .
				$p( 'Set each plant so the crown, where the leaves meet the roots, sits exactly at the surface. Buried crowns rot; exposed roots dry out.' ) .
				$h2( 'Keep fruit off the soil' ) .
				$p( 'Hanging baskets and tall pots keep fruit clean and away from slugs. Water regularly while plants are flowering and fruiting, and feed every two weeks with a high-potash feed.' ),
		),
	);
}

/**
 * The demo problem guides.
 *
 * @return array<string, array>
 */
function natura_core_demo_problems(): array {
	$p    = 'natura_core_demo_p';
	$h2   = 'natura_core_demo_h2';
	$list = 'natura_core_demo_list';

	return array(
		'yellow-leaves-container-plants' => array(
			'image_prompt' => 'A tomato plant in a terracotta pot with several lower leaves turned pale yellow while the upper leaves stay green, on a balcony floor, a watering can in the background. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'Close view of a yellowing lower leaf on a potted plant next to healthy green leaves, balcony background blurred. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'   => 'Why Are the Leaves on My Container Plants Turning Yellow?',
			'image'     => 'demo/problem-yellow-leaves.jpg',
			'image_alt' => 'A tomato plant in a terracotta pot with yellowing lower leaves and green upper leaves',
			'excerpt' => 'In pots, yellow leaves most often come down to water: too much, or too little. If watering is right, look at where the yellow appears: evenly on the oldest leaves points to hungry compost, and yellow between green veins to a lack of magnesium.',
			'plants'  => array( 'cherry-tomato', 'genovese-basil', 'balcony-strawberry' ),
			'parts'   => array( 'leaves' ),
			'pin'     => 'demo/pin-yellow-leaves.jpg',
			'lists'   => array(
				'causes'   => array(
					array(
						'cause'    => 'Too much water',
						'sign'     => 'Lower leaves yellow and soft, compost still wet days after watering',
						'check'    => 'Push a finger 3–5 cm into the compost. If it is still wet a day or two after watering, the roots are short of air. Look under the pot: a blocked drainage hole or a saucer full of water keeps the bottom of the pot waterlogged. Roots that are brown, soft, or smell sour have started to rot.',
						'fix'      => 'Empty the saucer and make sure water can drain freely; raise the pot on feet if it sits flat. Wait until the top few centimetres are dry before watering again. If the roots have rotted, trim the soft ones away and repot into fresh compost in a pot with drainage holes.',
						'recovery' => 'New leaves should come through healthy within two to three weeks. Leaves that are already yellow will not turn green again.',
					),
					array(
						'cause'    => 'Too little water',
						'sign'     => 'Leaves yellow with dry, crisp brown edges; compost shrinking from the sides of the pot',
						'check'    => 'Lift the pot: a dry pot feels much lighter than a watered one. Compost that has pulled away from the sides, or water that runs straight through and out of the bottom, means the root ball has dried out.',
						'fix'      => 'Stand the pot in a bucket or sink of water for 20–30 minutes so the whole root ball rewets, then let it drain. From then on, check the compost every day in warm weather and water before it dries out completely.',
						'recovery' => 'Wilting usually recovers within hours of a good soak. Crisp, brown leaves stay damaged.',
					),
					array(
						'cause'    => 'Hungry compost (nitrogen shortage)',
						'sign'     => 'The oldest leaves turn evenly pale yellow first; new growth is small and pale',
						'check'    => 'Container plants use up the food in fresh compost within a few weeks, and watering washes out what is left. If the plant has been in the same compost for more than six weeks without feeding, and the yellowing is even across the leaf, veins included, starting at the bottom of the plant, it is probably hungry.',
						'fix'      => 'Start a liquid feed at the dilution given on the label. Use a balanced feed for leafy plants such as basil; for tomatoes and strawberries, switch to a high-potash feed once they flower.',
						'recovery' => 'New leaves should look greener within one to two weeks of regular feeding.',
					),
					array(
						'cause'    => 'Magnesium shortage',
						'sign'     => 'Yellow between the veins of older leaves, while the veins stay green',
						'check'    => 'Look closely at an older leaf: a pattern of green veins on a yellow background is typical. It is common on tomatoes in pots, especially when they are fed heavily with high-potash feed, because potassium competes with magnesium.',
						'fix'      => 'Spray the leaves with Epsom salts (magnesium sulphate) at the dilution given on the pack, in the evening or on a dull day so the leaves do not scorch. Keep feeding as before, but do not exceed the dose on the tomato feed label.',
						'recovery' => 'New leaves come through normal. The patterned leaves stay as they are.',
					),
					array(
						'cause'    => 'Old leaves ageing naturally',
						'sign'     => 'Only one or two of the lowest leaves turn yellow; the rest of the plant looks healthy',
						'check'    => 'If new growth is green and vigorous and only the oldest leaves at the base are yellowing, slowly, one at a time, the plant is simply shedding leaves it no longer needs.',
						'fix'      => 'Nothing to treat. Pick off the yellow leaves to keep the plant tidy and let air reach the base.',
						'recovery' => '',
					),
				),
				'products' => array(
					array( 'name' => 'Soil moisture meter', 'note' => 'Reads the compost at root depth, where a finger cannot reach in a deep pot.', 'url' => '' ),
					array( 'name' => 'Pot feet', 'note' => 'Lift the pot off the floor so water can drain away.', 'url' => '' ),
					array( 'name' => 'Balanced liquid plant feed', 'note' => 'For hungry compost in leafy plants.', 'url' => '', 'image' => 'demo/product-liquid-feed.jpg' ),
					array( 'name' => 'Epsom salts (magnesium sulphate)', 'note' => 'Only if the leaves show yellow between green veins.', 'url' => '' ),
				),
				'faq'      => array(
					array( 'question' => 'Will yellow leaves turn green again?', 'answer' => 'Usually not. Once a leaf has turned fully yellow, it stays yellow. What matters is that new leaves come through green after you fix the cause.' ),
					array( 'question' => 'Should I cut off yellow leaves?', 'answer' => 'Yes, once you have found the cause. Remove leaves that are fully yellow; leave partly green ones for now, as they still feed the plant.' ),
					array( 'question' => 'Can a plant have more than one of these problems?', 'answer' => 'Yes. A plant whose roots sat in wet compost cannot take up food well, so it can look hungry too. Fix the watering first, then feed.' ),
				),
				'sources'  => array(
					array( 'title' => 'RHS — Nutrient deficiencies', 'url' => 'https://www.rhs.org.uk/prevention-protection/nutrient-deficiencies' ),
					array( 'title' => 'RHS — Chlorosis', 'url' => 'https://www.rhs.org.uk/problems/chlorosis' ),
					array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
				),
			),
			'content' =>
				$h2( 'How to prevent yellow leaves in pots' ) .
				$list(
					array(
						'Use pots with drainage holes, and never leave them standing in water.',
						'Check the compost before you water, rather than watering on a fixed day.',
						'Start feeding about six weeks after potting into fresh compost, earlier for hungry crops such as tomatoes.',
						'Repot into fresh compost every spring, or replace the top few centimetres in large pots.',
					)
				),
		),
		'blossom-end-rot'                => array(
			'image_prompt' => 'A green tomato with a dark sunken leathery patch at its base, still on the plant in a pot, next to healthy unblemished fruit, realistic and not gross. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'Close-up of tomatoes on a potted plant, one with a dark patch at the base, soft daylight. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'   => 'Why Do My Tomatoes Have Black Bottoms? (Blossom End Rot)',
			'image'     => 'demo/problem-blossom-end-rot.jpg',
			'image_alt' => 'A green tomato with a dark sunken patch at its base, next to healthy fruit',
			'excerpt' => 'A dark, sunken patch at the base of tomato fruit is blossom end rot. It is not a disease: the fruit is short of calcium because the plant\'s water supply was uneven. Steady watering protects the fruit that forms next.',
			'plants'  => array( 'cherry-tomato' ),
			'parts'   => array( 'flowers-fruit' ),
			'lists'   => array(
				'causes'   => array(
					array(
						'cause'    => 'Uneven watering',
						'sign'     => 'A sunken, leathery patch at the base of the fruit, often on the first trusses',
						'check'    => 'Calcium travels into the fruit with water. When the compost dries out, even for a short time, the fruit at the end of the supply line goes short first. If the pot has dried out between waterings in the last few weeks, this is the most likely cause.',
						'fix'      => 'Water before the compost dries out, every day in hot weather, until water runs from the drainage holes. Remove the affected fruit: it will not recover. Calcium sprays are not a fix, as the fruit takes up very little calcium through its skin.',
						'recovery' => 'Fruit that forms once watering is steady normally ripens without the patch. Expect two to three weeks before you see clean fruit.',
					),
					array(
						'cause'    => 'A pot that is too small',
						'sign'     => 'The plant wilts every afternoon, even when watered in the morning',
						'check'    => 'A large tomato plant can drink several litres a day in summer. A pot under about 20 litres cannot hold enough water to last from one watering to the next.',
						'fix'      => 'Move the plant into a pot of 20–30 litres, or grow the next plants in one. Until then, water morning and evening in hot weather, or stand the pot in a deep saucer that you top up and empty again before the evening.',
						'recovery' => 'Fruit set after the move should be clean.',
					),
					array(
						'cause'    => 'Feeding dry compost',
						'sign'     => 'The patches appeared soon after a feed given to a dry plant',
						'check'    => 'Fertiliser poured onto dry compost makes a concentrated solution that slows water uptake, which has the same effect as drought.',
						'fix'      => 'Always water first if the compost is dry, then feed. Use the dilution on the label, never stronger.',
						'recovery' => 'New fruit should be clean within two to three weeks.',
					),
				),
				'products' => array(
					array( 'name' => 'Pot of 20–30 litres with drainage holes', 'note' => 'Holds enough water to last between waterings.', 'url' => '' ),
					array( 'name' => 'Self-watering pot or reservoir', 'note' => 'Evens out the water supply on hot days.', 'url' => '' ),
				),
				'faq'      => array(
					array( 'question' => 'Can I eat a tomato with blossom end rot?', 'answer' => 'Yes, if you cut away the damaged part and the rest of the fruit is firm. Discard any fruit that has gone soft or mouldy.' ),
					array( 'question' => 'Should I add eggshells or calcium to the compost?', 'answer' => 'It rarely helps. Fresh container compost usually holds enough calcium; the problem is getting it into the fruit, and that depends on steady watering.' ),
				),
				'sources'  => array(
					array( 'title' => 'RHS — Blossom end rot', 'url' => 'https://www.rhs.org.uk/problems/blossom-end-rot' ),
					array( 'title' => 'Iowa State University Extension — Blossom end rot', 'url' => 'https://yardandgarden.extension.iastate.edu/encyclopedia/blossom-end-rot' ),
				),
			),
			'content' =>
				$h2( 'Which plants get it' ) .
				$p( 'Tomatoes are the plants most often affected, followed by peppers. Plants in pots and grow bags are more at risk than plants in the ground, because their roots have a small volume of compost to draw water from.' ),
		),
	);
}

/**
 * The demo Plant Care articles.
 *
 * @return array<string, array>
 */
function natura_core_demo_articles(): array {
	$p    = 'natura_core_demo_p';
	$h2   = 'natura_core_demo_h2';
	$list = 'natura_core_demo_list';

	return array(
		'how-often-to-water-container-plants' => array(
			'image_prompt' => 'A metal watering can with a long spout watering the base of herbs and a tomato plant in pots on a sunny balcony, water soaking into dark compost. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'A hand-held watering can pouring water at the base of a potted herb on a balcony, photographed vertically, early morning light. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'   => 'How Often Should You Water Container Plants?',
			'image'     => 'demo/article-watering.jpg',
			'image_alt' => 'A metal watering can watering herbs and tomatoes in pots on a sunny balcony',
			'excerpt' => 'There is no fixed schedule: check the compost, and water when the top few centimetres are dry. In summer that can mean every day for large plants in full sun, and once a week for small ones in shade.',
			'topic'   => 'watering',
			'lists'   => array(
				'products' => array(
					array( 'name' => 'Watering can with a long spout and a rose', 'note' => 'Reaches the back of a balcony box and waters gently.', 'url' => '' ),
					array( 'name' => 'Soil moisture meter', 'note' => 'Useful for deep pots, where the top can be dry and the bottom wet.', 'url' => '' ),
				),
				'faq'      => array(
					array( 'question' => 'Is it better to water in the morning or the evening?', 'answer' => 'The morning is best: plants have water for the hottest part of the day, and the leaves dry quickly. In a heatwave, water large plants in the evening as well.' ),
					array( 'question' => 'Do plants in pots need watering when it rains?', 'answer' => 'Often, yes. Leaves can shed rain away from the pot, and pots under a balcony above may get none at all. Check the compost rather than the weather.' ),
				),
				'sources'  => array(
					array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
					array( 'title' => 'RHS — Ten top tips for peat-free growing success', 'url' => 'https://www.rhs.org.uk/advice/peat/peat-free-tips' ),
				),
			),
			'content' =>
				$h2( 'Check the compost, not the calendar' ) .
				$p( 'How quickly a pot dries out depends on the weather, the size of the pot, and how big the plant has grown. A plant that needed water once a week in May may need it every day in July. So instead of watering on fixed days, check before you water.' ) .
				$h2( 'The finger test' ) .
				$p( 'Push a finger into the compost up to the second knuckle, about 3–5 cm. If it feels dry at that depth, water. If it feels damp, wait and check again the next day. Some peat-free composts look dry on the surface while still moist below, so always check below the surface.' ) .
				$h2( 'Water until it drains' ) .
				$p( 'When you water, keep going until water runs out of the drainage holes. A splash every day wets only the top of the pot and leaves the roots at the bottom dry. Empty the saucer after half an hour so the roots do not sit in water.' ) .
				$h2( 'What makes a pot dry out faster' ) .
				$list(
					array(
						'<strong>Small pots:</strong> they hold less water, and dry out first.',
						'<strong>Terracotta:</strong> unglazed clay loses water through its sides.',
						'<strong>Sun and wind:</strong> a sunny, windy balcony can dry a pot in a day.',
						'<strong>Big plants:</strong> a tomato in full fruit drinks far more than a young plant.',
					)
				) .
				$h2( 'When you go away' ) .
				$p( 'Group pots together in the shade, water them well the evening before you leave, and stand them in deep saucers. For longer trips, a self-watering pot or a simple drip system is more reliable than asking plants to wait.' ),
		),
		'compost-for-containers'              => array(
			'image_prompt' => 'An open bag of peat-free container compost beside empty terracotta pots and a trowel on a balcony floor, dark crumbly compost spilling slightly. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'Close view of crumbly dark peat-free compost filling a terracotta pot, photographed vertically from above. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'   => 'Which Compost Should You Use in Pots?',
			'image'     => 'demo/article-compost.jpg',
			'image_alt' => 'Hands filling a terracotta pot with dark peat-free compost on a potting bench',
			'excerpt' => 'Use fresh, peat-free container compost, never garden soil. Multipurpose compost suits vegetables, herbs, and summer plants; a soil-based peat-free mix suits shrubs and fruit that stay in the same pot for years.',
			'topic'   => 'soil-feeding',
			'pin'     => 'demo/pin-compost.jpg',
			'lists'   => array(
				'products' => array(
					array( 'name' => 'Peat-free multipurpose compost', 'badge' => 'For vegetables and herbs', 'note' => 'Light and open; refresh it every year.', 'url' => 'https://www.example.com/compost', 'image' => 'demo/product-compost.jpg' ),
					array( 'name' => 'Horticultural grit', 'badge' => '', 'note' => 'Mix in about a fifth for thyme, rosemary, and sage.', 'url' => 'https://www.example.com/grit' ),
				),
				'faq'     => array(
					array( 'question' => 'Can I reuse last year\'s compost?', 'answer' => 'Not for hungry crops like tomatoes: its food is used up and its structure has broken down. Mix it into garden beds or a compost heap, and start pots with fresh compost.' ),
					array( 'question' => 'Do I need to add grit?', 'answer' => 'For Mediterranean herbs such as thyme and rosemary, yes: mixing in about a fifth grit helps the compost drain. Most vegetables do not need it.' ),
				),
				'sources' => array(
					array( 'title' => 'RHS — Peat-free compost choices', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/peat-free' ),
					array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
				),
			),
			'content' =>
				$h2( 'Why not garden soil?' ) .
				$p( 'In a pot, garden soil packs down into a dense block that drains poorly and holds little air. It can also bring in weed seeds, pests, and diseases. Container compost is made to stay open and drain freely while holding water.' ) .
				$h2( 'Multipurpose or soil-based?' ) .
				$list(
					array(
						'<strong>Peat-free multipurpose compost</strong> is light and suits plants that spend one season in their pot: vegetables, herbs, and summer flowers.',
						'<strong>Peat-free soil-based compost</strong>, such as a peat-free John Innes No. 3, is heavier and holds food longer. Use it for shrubs, fruit bushes, and anything that stays in the same pot for several years. Traditional John Innes contains peat, so check the bag says peat-free.',
					)
				) .
				$h2( 'When to start feeding' ) .
				$p( 'Fresh compost contains enough food for the first few weeks. After that, container plants rely on you: start a liquid feed at the dilution given on the label, more often for hungry crops such as tomatoes. Plants in peat-free compost may need feeding a little more often.' ) .
				$h2( 'Refresh compost every year' ) .
				$p( 'Repot plants that stay in their containers each spring, or, in pots too big to move, scrape away the top few centimetres and replace them with fresh compost mixed with a slow-release feed.' ),
		),
	);
}

/**
 * The demo buying guide. Product types, not brands, and every line taken from
 * the RHS advice already used in the compost article: a demo must not invent
 * products, tests, or prices. No shop links.
 *
 * @return array<string, array>
 */
function natura_core_demo_gear(): array {
	$p  = 'natura_core_demo_p';
	$h2 = 'natura_core_demo_h2';

	return array(
		'best-compost-for-pots' => array(
			'image_prompt' => 'Three small heaps of different composts, peat-free multi-purpose, soil-based and ericaceous, on a wooden board next to terracotta pots on a patio. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'Bags of peat-free compost and a terracotta pot on a sunny patio, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'     => 'The Best Compost for Pots: Which Type to Buy',
			'category'  => array( 'compost-feed' ),
			'method'    => 'researched',
			'image'     => 'demo/article-compost.jpg',
			'image_alt' => 'Hands filling a terracotta pot with dark peat-free compost on a potting bench',
			'excerpt'   => 'For most pots, buy a fresh, peat-free multipurpose compost. Choose a peat-free soil-based compost for shrubs and fruit that stay in the same pot for years, and add grit for Mediterranean herbs.',
			'pin'       => 'demo/pin-compost.jpg',
			'lists'     => array(
				'criteria' => array(
					array( 'name' => 'Peat-free on the bag', 'why' => 'Traditional John Innes and many older mixes contain peat. Check that the bag says peat-free.' ),
					array( 'name' => 'How long the plant stays in the pot', 'why' => 'One season (vegetables, herbs, summer flowers): a light multipurpose compost. Several years (shrubs, fruit bushes): a heavier soil-based compost that holds food longer.' ),
					array( 'name' => 'Fresh, not last year\'s', 'why' => 'Used compost has lost its food and its open structure. Hungry crops such as tomatoes need fresh compost.' ),
				),
				'picks'    => array(
					array(
						'name'     => 'Peat-free multipurpose compost',
						'best_for' => 'Best for vegetables, herbs, and summer pots',
						'verdict'  => 'The everyday choice for plants that spend one season in their pot. It is light, so pots stay easy to move, and it drains freely while holding water.',
						'pros'     => "Light: easy to carry up to a balcony\nSuits most one-season crops",
						'cons'     => "Holds food for the first few weeks only: start feeding after that\nBreaks down over a season: refresh it every year",
						'specs'    => "Weight: Light\nBest for: One-season plants\nFeeding: After the first few weeks",
						'image'    => 'demo/product-compost.jpg',
					),
					array(
						'name'     => 'Peat-free soil-based compost',
						'best_for' => 'Best for shrubs and fruit that stay for years',
						'verdict'  => 'Heavier and holds food longer, which suits plants that stay in the same container for several years, such as fruit bushes. A peat-free John Innes No. 3 is this type.',
						'pros'     => "Holds food longer\nIts weight steadies tall plants in pots",
						'cons'     => 'Heavy: a large pot is hard to move, which counts on a balcony',
						'specs'    => "Weight: Heavy\nBest for: Plants that stay for years\nFeeding: Holds food longer",
					),
					array(
						'name'     => 'Horticultural grit',
						'best_for' => 'Best for thyme, rosemary, and sage',
						'verdict'  => 'Not a compost but an addition: mixing in about a fifth grit helps compost drain for Mediterranean herbs. Most vegetables do not need it.',
						'pros'     => 'Improves drainage for herbs that dislike wet roots',
						'cons'     => 'Not needed for most vegetables',
						'specs'    => "Weight: Heavy\nBest for: Mediterranean herbs\nFeeding: None (mix about a fifth into compost)",
					),
				),
				'faq'      => array(
					array( 'question' => 'Can I use garden soil in pots?', 'answer' => 'No. In a pot, garden soil packs down into a dense block that drains poorly and holds little air, and it can bring in weed seeds, pests, and diseases.' ),
					array( 'question' => 'Can I reuse last year\'s compost?', 'answer' => 'Not for hungry crops like tomatoes: its food is used up and its structure has broken down. Start pots with fresh compost.' ),
				),
				'sources'  => array(
					array( 'title' => 'RHS — Peat-free compost choices', 'url' => 'https://www.rhs.org.uk/soil-composts-mulches/peat-free' ),
					array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
				),
			),
			'content'   =>
				$h2( 'How we chose' ) .
				$p( 'This guide compares types of compost, not brands. Each pick and each line comes from RHS advice on composts and container growing, listed in the sources. We have not run our own trial of these products.' ) .
				$h2( 'When to start feeding' ) .
				$p( 'Fresh compost contains enough food for the first few weeks. After that, container plants rely on you: start a liquid feed at the dilution given on the label, more often for hungry crops such as tomatoes.' ),
		),
	);
}

/**
 * The demo DIY project. Adapted, in our own words, from the self-watering
 * planter Jessica Walliser describes on Savvy Gardening (cited in Sources),
 * with the balcony checks added; the method says so. The picture is a
 * diagram, not a photo of a build we did not make.
 *
 * @return array<string, array>
 */
function natura_core_demo_projects(): array {
	$p  = 'natura_core_demo_p';
	$h2 = 'natura_core_demo_h2';

	return array(
		'self-watering-pot' => array(
			'image_prompt' => 'A homemade self-watering pot made from two plastic containers, the inner pot holding a young tomato plant, a strip of cotton wick visible through a side fill hole, on a balcony. Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.',
			'pin_prompt'   => 'A DIY self-watering container with a basil plant on a sunny balcony, side fill hole visible, photographed vertically. Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.',
			'title'     => 'Make a Self-Watering Pot From Two Containers',
			'category'  => array( 'watering' ),
			'image'     => 'demo/project-self-watering.jpg',
			'image_alt' => 'Diagram of a self-watering pot: a planting container standing on bricks inside a second container, with a towel wick reaching into the water below',
			'pin'       => 'demo/pin-self-watering.jpg',
			'plants'    => array( 'cherry-tomato', 'genovese-basil' ),
			'excerpt'   => 'Two identical plastic containers, a few bricks, and an old cotton towel make a pot that waters itself from a reservoir underneath. No drilling: a utility knife and scissors are enough.',
			'facts'     => array(
				'project_method' => 'adapted',
				'difficulty'     => 'Beginner',
				'time'           => 'Under an hour',
				'cost'           => 'Low',
				'size'           => 'The size of the containers you use',
			),
			'lists'     => array(
				'checks'    => array(
					array( 'point' => 'Water is heavy: every litre in the reservoir weighs about a kilo, on top of the wet compost. Check what your balcony can carry before you build with large containers.' ),
					array( 'point' => 'The overflow hole lets extra water out after heavy rain. Stand the pot where that water cannot drip onto a balcony or a passer-by below.' ),
					array( 'point' => 'Cut away from your hand, on a stable surface, and wear gloves when using the utility knife.' ),
				),
				'materials' => array(
					array( 'name' => 'Plastic containers or storage bins of the same type and size', 'quantity' => '2' ),
					array( 'name' => 'Old cotton hand towel', 'quantity' => '1' ),
					array( 'name' => 'Bricks or blocks', 'quantity' => 'Enough for two or three short columns' ),
					array( 'name' => 'Potting compost mixed half and half with garden compost', 'quantity' => 'Enough to fill one container' ),
				),
				'tools'     => array(
					array( 'name' => 'Utility knife' ),
					array( 'name' => 'Scissors' ),
					array( 'name' => 'Gloves' ),
				),
				'steps'     => array(
					array( 'title' => 'Cut the wick hole', 'text' => 'Cut a hole about 5 cm (2 in) square near the centre of the base of one container. This one will hold the compost: call it the planting container.', 'tip' => 'The hole does not need to be exactly in the middle.' ),
					array( 'title' => 'Make the wick', 'text' => 'Cut the cotton towel lengthways into four strips of roughly the same width.', 'tip' => '' ),
					array( 'title' => 'Build the reservoir', 'text' => 'Put the second container where the pot will stay, on a firm, level surface. Stack bricks or blocks inside it in two or three columns, 10 to 20 cm (4 to 8 in) high. Keep the centre free, under the wick hole.', 'tip' => 'Taller columns make a bigger reservoir, so you refill less often.' ),
					array( 'title' => 'Cut the fill and overflow hole', 'text' => 'In the side of the outer container, cut a hole about 5 cm (2 in) square with its top level with the top of the bricks. You will pour water in here, and extra water will run out here.', 'tip' => '' ),
					array( 'title' => 'Fill the reservoir', 'text' => 'Pour water into the outer container up to the bottom of that hole.', 'tip' => '' ),
					array( 'title' => 'Put the planting container in', 'text' => 'Lower the planting container into the outer one so that its base rests on the bricks.', 'tip' => '' ),
					array( 'title' => 'Thread the wick', 'text' => 'Push one end of all four towel strips down through the wick hole until they hang a little deeper than the bricks are tall, into the water. Spread the top ends across the base of the planting container in a cross.', 'tip' => 'The strips soak up water at once if they reach it.' ),
					array( 'title' => 'Fill and plant', 'text' => 'Fill the planting container with the compost mix, leaving 2 to 3 cm (about 1 in) below the rim. Plant, then water from the top once to settle the compost. From then on, refill through the side hole.', 'tip' => '' ),
				),
				'faq'       => array(
					array( 'question' => 'How often do I refill the reservoir?', 'answer' => 'It depends on the size of the reservoir, the plants, and the weather. Look into the fill hole: when you no longer see water, refill it up to the bottom of the hole.' ),
					array( 'question' => 'Do I still need to water from the top?', 'answer' => 'Only once, right after planting, to settle the compost. After that the wick draws water up from the reservoir.' ),
				),
				'sources'   => array(
					array( 'title' => 'Savvy Gardening (Jessica Walliser) — How to make a DIY self-watering planter', 'url' => 'https://savvygardening.com/diy-self-watering-planter/' ),
					array( 'title' => 'RHS — Growing plants in containers', 'url' => 'https://www.rhs.org.uk/container-gardening/growing-plants-in-containers' ),
				),
			),
			'content'   =>
				$h2( 'How it works' ) .
				$p( 'The planting container stands on bricks above a reservoir of water. Strips of cotton towel hang from its base into the water and draw it up into the compost as the roots use it, so the compost stays moist without the roots standing in water. A hole in the side lets you refill the reservoir and lets extra rain run out.' ) .
				$h2( 'Where these instructions come from' ) .
				$p( 'This is the method Jessica Walliser describes on Savvy Gardening, in our own words and with the checks a balcony needs added. We have not built this exact version ourselves; the source is listed below.' ),
		),
	);
}
