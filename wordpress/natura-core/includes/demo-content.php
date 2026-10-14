<?php
/**
 * Demo plant guides for previews (WordPress Playground, local installs).
 *
 * Nothing here runs on its own: call natura_core_import_demo() from WP-CLI or
 * a Playground blueprint. Existing guides with the same address are left as
 * they are, so running it twice changes nothing.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Creates the demo guides.
 *
 * @param string $image_base Folder or URL holding cherry-tomato.jpg,
 *                           genovese-basil.jpg and balcony-strawberry.jpg.
 * @return int[] IDs of the guides created.
 */
function natura_core_import_demo( string $image_base ): array {
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$created = array();
	$admins  = get_users(
		array(
			'role'   => 'administrator',
			'number' => 1,
			'fields' => 'ID',
		)
	);
	$author  = $admins ? (int) $admins[0] : 0;

	foreach ( natura_core_demo_plants() as $slug => $plant ) {
		if ( get_page_by_path( $slug, OBJECT, 'plant' ) ) {
			continue;
		}

		$post_id = wp_insert_post(
			array(
				'post_type'    => 'plant',
				'post_status'  => 'publish',
				'post_author'  => $author,
				'post_name'    => $slug,
				'post_title'   => $plant['title'],
				'post_excerpt' => $plant['excerpt'],
				'post_content' => $plant['content'],
			),
			true
		);
		if ( is_wp_error( $post_id ) ) {
			continue;
		}

		wp_set_object_terms( $post_id, $plant['type'], 'plant_type' );

		foreach ( $plant['facts'] as $key => $value ) {
			update_post_meta( $post_id, natura_core_meta_key( $key ), $value );
		}
		foreach ( $plant['lists'] as $key => $rows ) {
			update_post_meta( $post_id, natura_core_meta_key( $key ), $rows );
		}

		$image_id = natura_core_demo_attach_image( trailingslashit( $image_base ) . $plant['image'], $post_id, $plant['image_alt'] );
		if ( $image_id ) {
			set_post_thumbnail( $post_id, $image_id );
		}

		$created[] = $post_id;
	}

	return $created;
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
			'title'     => 'How to Grow Cherry Tomatoes in Pots',
			'type'      => 'vegetables',
			'image'     => 'cherry-tomato.jpg',
			'image_alt' => 'A cherry tomato plant with red and green fruit in a terracotta pot on a sunny balcony',
			'excerpt'   => 'Cherry tomatoes are one of the most rewarding crops for a sunny balcony. Give them a big pot, a sturdy support, and steady watering, and a single plant can keep you picking for months.',
			'facts'     => array(
				'botanical_name' => 'Solanum lycopersicum var. cerasiforme',
				'difficulty'     => 'Moderate',
				'sun'            => '6–8 hours of direct sun',
				'pot_size'       => '20–30 L (5–8 gal) per plant',
				'watering'       => 'Deeply, when the top 2–3 cm is dry',
				'harvest'        => '60–80 days after planting out',
				'season'         => 'Late spring to early autumn',
			),
			'lists'     => array(
				'products' => array(
					array( 'name' => 'Pot of 20–30 litres with drainage holes', 'note' => 'Smaller pots dry out within hours in summer heat.', 'url' => '' ),
					array( 'name' => 'Bamboo cane or tomato spiral, 1.5 m', 'note' => 'Put it in at planting time so you do not damage the roots later.', 'url' => '' ),
					array( 'name' => 'Peat-free container compost', 'note' => 'Holds water better than garden soil and drains freely.', 'url' => '' ),
					array( 'name' => 'Liquid tomato feed (high potash)', 'note' => 'Start once the first flowers open.', 'url' => '' ),
					array( 'name' => 'Soft garden twine', 'note' => 'Ties the stem without cutting into it.', 'url' => '' ),
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
			'title'     => 'How to Grow Basil in Pots',
			'type'      => 'herbs',
			'image'     => 'genovese-basil.jpg',
			'image_alt' => 'A bushy Genovese basil plant in a cream ceramic pot by a window',
			'excerpt'   => 'Basil loves warmth and hates cold, wet roots. Grow it in a sunny, sheltered spot and pinch it often for a bushy plant that keeps producing leaves all summer.',
			'facts'     => array(
				'botanical_name' => 'Ocimum basilicum \'Genovese\'',
				'difficulty'     => 'Easy',
				'sun'            => '6+ hours of sun',
				'pot_size'       => '3–5 L per plant',
				'watering'       => 'When the top of the compost is dry',
				'harvest'        => '3–4 weeks after planting',
				'season'         => 'Early summer to early autumn',
			),
			'lists'     => array(),
			'content'   =>
				$h2( 'Give basil warmth' ) .
				$p( 'Basil grows best above 15 °C (60 °F). Keep it indoors on a bright windowsill until nights are reliably warm, then move it to the sunniest, most sheltered corner of the balcony.' ) .
				$h2( 'Pinch for a bushy plant' ) .
				$p( 'Pick the top pair of leaves from each stem, just above a pair of side shoots. The plant branches at that point, and you get more leaves over the season. Remove flower buds as they appear.' ) .
				$h2( 'Water at the base' ) .
				$p( 'Water when the top of the compost feels dry, in the morning, and avoid wetting the leaves. Basil sitting in cold, wet compost is the most common reason it collapses.' ),
		),
		'balcony-strawberry' => array(
			'title'     => 'How to Grow Strawberries on a Balcony',
			'type'      => 'fruit',
			'image'     => 'balcony-strawberry.jpg',
			'image_alt' => 'Ripe strawberries hanging from a plant in a weathered terracotta bowl',
			'excerpt'   => 'Strawberries crop well in pots, troughs, and hanging baskets. Everbearing varieties give you fruit from early summer into autumn from just a few plants.',
			'facts'     => array(
				'botanical_name' => 'Fragaria × ananassa',
				'difficulty'     => 'Easy',
				'sun'            => '6–8 hours of sun',
				'pot_size'       => '3 L per plant, or 3 plants per 30 cm pot',
				'watering'       => 'Keep evenly moist while fruiting',
				'harvest'        => 'Early summer to autumn',
				'season'         => 'Plant in spring or early autumn',
			),
			'lists'     => array(),
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
