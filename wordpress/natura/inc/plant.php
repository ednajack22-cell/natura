<?php
/**
 * Plant guide helpers: field access, table of contents, in-content
 * placements, breadcrumbs, Pinterest, and structured data.
 *
 * Fields are stored by the Natura Core plugin. Everything here reads them with
 * plain get_post_meta(), so the theme never breaks when the plugin is off; the
 * guide simply shows fewer panels.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * One plant field.
 *
 * @param string   $key     Field key, without the prefix.
 * @param int|null $post_id Plant ID, current post by default.
 * @return mixed
 */
function natura_plant_field( string $key, ?int $post_id = null ) {
	return get_post_meta( $post_id ?? get_the_ID(), '_natura_' . $key, true );
}

/**
 * One repeating plant field, always as a list of rows.
 *
 * @param string   $key     Field key, without the prefix.
 * @param int|null $post_id Plant ID, current post by default.
 */
function natura_plant_list( string $key, ?int $post_id = null ): array {
	$rows = natura_plant_field( $key, $post_id );

	return is_array( $rows ) ? array_values( array_filter( $rows, 'is_array' ) ) : array();
}

/**
 * The quick facts that have a value, in display order.
 *
 * @return array<int, array{label: string, value: string}>
 */
function natura_plant_quick_facts(): array {
	$labels = array(
		'sun'        => __( 'Sun', 'natura' ),
		'pot_size'   => __( 'Pot size', 'natura' ),
		'watering'   => __( 'Water', 'natura' ),
		'harvest'    => __( 'Harvest', 'natura' ),
		'difficulty' => __( 'Difficulty', 'natura' ),
		'season'     => __( 'Season', 'natura' ),
	);

	$facts = array();
	foreach ( $labels as $key => $label ) {
		$value = (string) natura_plant_field( $key );
		if ( '' !== $value ) {
			$facts[] = array(
				'label' => $label,
				'value' => $value,
			);
		}
	}

	return $facts;
}

/**
 * The plant's main type (Vegetables, Herbs, Fruit), if any.
 */
function natura_plant_type(): ?WP_Term {
	$terms = get_the_terms( get_the_ID(), 'plant_type' );

	return is_array( $terms ) && $terms ? $terms[0] : null;
}

/**
 * Prepares the guide body: gives every H2 an anchor for the table of contents,
 * and places the shopping list and an ad between sections.
 *
 * The shopping list follows the second section, once the reader knows what
 * the plant needs. The ad follows the fourth, well inside the article, never
 * above the first useful answer.
 *
 * @param string $html     Rendered content.
 * @param string $products Shopping list markup.
 * @return array{html: string, toc: array<int, array{id: string, title: string}>}
 */
function natura_prepare_plant_content( string $html, string $products ): array {
	$toc  = array();
	$used = array();

	$html = preg_replace_callback(
		'/<h2([^>]*)>(.*?)<\/h2>/is',
		static function ( array $match ) use ( &$toc, &$used ): string {
			$title = trim( wp_strip_all_tags( $match[2] ) );
			if ( preg_match( '/\sid=["\']([^"\']+)["\']/', $match[1], $existing ) ) {
				$id = $existing[1];
			} else {
				$base = sanitize_title( $title ) ?: 'section';
				$id   = $base;
				for ( $n = 2; isset( $used[ $id ] ); $n++ ) {
					$id = $base . '-' . $n;
				}
				$match[1] .= ' id="' . esc_attr( $id ) . '"';
			}
			$used[ $id ] = true;
			$toc[]       = array(
				'id'    => $id,
				'title' => $title,
			);

			return '<h2' . $match[1] . '>' . $match[2] . '</h2>';
		},
		$html
	);

	$sections = preg_split( '/(?=<h2[\s>])/i', (string) $html );
	$inserts  = array(
		2 => $products,
		4 => natura_ad_slot( __( 'Inside the guide, after the fourth section', 'natura' ) ),
	);

	$out = '';
	foreach ( $sections as $index => $section ) {
		$out .= $section;
		// $sections[0] is any text before the first H2.
		if ( isset( $inserts[ $index ] ) ) {
			$out .= $inserts[ $index ];
			unset( $inserts[ $index ] );
		}
	}

	// A short guide still gets its shopping list, at the end.
	if ( isset( $inserts[2] ) ) {
		$out .= $inserts[2];
	}

	return array(
		'html' => $out,
		'toc'  => $toc,
	);
}

/**
 * Shopping list markup, or nothing when the list is empty.
 */
function natura_plant_products_box(): string {
	$products = natura_plant_list( 'products' );
	if ( ! $products ) {
		return '';
	}

	$has_links = (bool) array_filter( array_column( $products, 'url' ) );

	ob_start();
	?>
	<aside class="plant-products" aria-labelledby="plant-products-title">
		<h2 id="plant-products-title" class="plant-products-title"><?php esc_html_e( 'What you need', 'natura' ); ?></h2>
		<ul>
			<?php foreach ( $products as $product ) : ?>
				<li>
					<div>
						<strong><?php echo esc_html( $product['name'] ?? '' ); ?></strong>
						<?php if ( ! empty( $product['note'] ) ) : ?>
							<span><?php echo esc_html( $product['note'] ); ?></span>
						<?php endif; ?>
					</div>
					<?php if ( ! empty( $product['url'] ) ) : ?>
						<a class="button button-buy" href="<?php echo esc_url( $product['url'] ); ?>" rel="sponsored nofollow noopener" target="_blank">
							<?php esc_html_e( 'See price', 'natura' ); ?>
							<span class="screen-reader-text">
								<?php
								/* translators: %s: product name. */
								printf( esc_html__( 'for %s (opens in a new tab)', 'natura' ), esc_html( $product['name'] ?? '' ) );
								?>
							</span>
						</a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php if ( $has_links ) : ?>
			<p class="plant-products-note"><?php esc_html_e( 'Some links are affiliate links: we may earn a commission, at no extra cost to you.', 'natura' ); ?></p>
		<?php endif; ?>
	</aside>
	<?php
	return (string) ob_get_clean();
}

/**
 * The image used for Pinterest: the dedicated vertical image, or the main photo.
 */
function natura_plant_pin_image_url(): string {
	$pin_id = absint( natura_plant_field( 'pin_image' ) );
	$url    = $pin_id ? wp_get_attachment_image_url( $pin_id, 'full' ) : get_the_post_thumbnail_url( null, 'full' );

	return $url ?: '';
}

/**
 * Link that opens Pinterest's "Save" dialog. A plain link: no Pinterest
 * script, so no third-party code and no tracking until the reader clicks.
 */
function natura_pinterest_save_url(): string {
	$image = natura_plant_pin_image_url();
	if ( ! $image ) {
		return '';
	}

	return add_query_arg(
		array(
			'url'         => rawurlencode( get_permalink() ),
			'media'       => rawurlencode( $image ),
			'description' => rawurlencode( wp_strip_all_tags( get_the_title() . ' — ' . get_the_excerpt() ) ),
		),
		'https://www.pinterest.com/pin/create/button/'
	);
}

/**
 * Breadcrumb trail for a plant guide.
 *
 * @return array<int, array{name: string, url: string}>
 */
function natura_plant_breadcrumbs(): array {
	$trail = array(
		array(
			'name' => __( 'Home', 'natura' ),
			'url'  => home_url( '/' ),
		),
		array(
			'name' => __( 'Plants', 'natura' ),
			'url'  => (string) get_post_type_archive_link( 'plant' ),
		),
	);

	$type = natura_plant_type();
	if ( $type ) {
		$trail[] = array(
			'name' => $type->name,
			'url'  => (string) get_term_link( $type ),
		);
	}

	$trail[] = array(
		'name' => get_the_title(),
		'url'  => get_permalink(),
	);

	return $trail;
}

/**
 * Whether an SEO plugin already prints titles, Open Graph tags, and the main
 * structured data. The theme then stays out of its way.
 */
function natura_seo_plugin_active(): bool {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) || class_exists( 'The_SEO_Framework\Load' );
}

/**
 * Open Graph tags for plant guides when no SEO plugin is active. Pinterest
 * reads them for Rich Pins: title, description, and image on every pin.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( ! is_singular( 'plant' ) || natura_seo_plugin_active() ) {
			return;
		}

		$tags = array(
			'og:type'        => 'article',
			'og:title'       => get_the_title(),
			'og:description' => wp_strip_all_tags( get_the_excerpt() ),
			'og:url'         => get_permalink(),
			'og:site_name'   => get_bloginfo( 'name' ),
			'og:image'       => get_the_post_thumbnail_url( null, 'full' ),
		);

		foreach ( $tags as $property => $content ) {
			if ( $content ) {
				printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
			}
		}
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_strip_all_tags( get_the_excerpt() ) ) );
	}
);

/**
 * Structured data for a plant guide.
 *
 * The article and breadcrumb are left to an SEO plugin when one is active, to
 * avoid publishing the same entity twice. The FAQ comes from fields no SEO
 * plugin knows about, so it is always the theme's.
 */
function natura_plant_structured_data(): string {
	$graph = array();

	if ( ! natura_seo_plugin_active() ) {
		$graph[] = array_filter(
			array(
				'@type'         => 'Article',
				'headline'      => get_the_title(),
				'description'   => wp_strip_all_tags( get_the_excerpt() ),
				'image'         => get_the_post_thumbnail_url( null, 'full' ) ?: null,
				'datePublished' => get_the_date( 'c' ),
				'dateModified'  => get_the_modified_date( 'c' ),
				'author'        => array(
					'@type' => 'Person',
					'name'  => get_the_author(),
				),
				'publisher'     => array(
					'@type' => 'Organization',
					'name'  => get_bloginfo( 'name' ),
				),
				'mainEntityOfPage' => get_permalink(),
			)
		);

		$items = array();
		foreach ( natura_plant_breadcrumbs() as $position => $crumb ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $position + 1,
				'name'     => $crumb['name'],
				'item'     => $crumb['url'],
			);
		}
		$graph[] = array(
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $items,
		);
	}

	$faq = natura_plant_list( 'faq' );
	if ( $faq ) {
		$graph[] = array(
			'@type'      => 'FAQPage',
			'mainEntity' => array_map(
				static fn( array $row ): array => array(
					'@type'          => 'Question',
					'name'           => $row['question'] ?? '',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $row['answer'] ?? '',
					),
				),
				$faq
			),
		);
	}

	if ( ! $graph ) {
		return '';
	}

	return '<script type="application/ld+json">' . wp_json_encode(
		array(
			'@context' => 'https://schema.org',
			'@graph'   => $graph,
		),
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG
	) . '</script>';
}
