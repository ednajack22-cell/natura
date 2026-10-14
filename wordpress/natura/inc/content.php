<?php
/**
 * Helpers shared by every guide (plants, problems, articles): fields, table of
 * contents, in-content placements, shopping list, breadcrumbs, Pinterest,
 * Open Graph, and structured data.
 *
 * Fields are stored by the Natura Core plugin. Everything here reads them with
 * plain get_post_meta(), so the theme never breaks when the plugin is off; the
 * page simply shows fewer panels.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * One field.
 *
 * @param string   $key     Field key, without the prefix.
 * @param int|null $post_id Post ID, current post by default.
 * @return mixed
 */
function natura_field( string $key, ?int $post_id = null ) {
	return get_post_meta( $post_id ?? get_the_ID(), '_natura_' . $key, true );
}

/**
 * One repeating field, always as a list of rows.
 *
 * @param string   $key     Field key, without the prefix.
 * @param int|null $post_id Post ID, current post by default.
 */
function natura_field_list( string $key, ?int $post_id = null ): array {
	$rows = natura_field( $key, $post_id );

	return is_array( $rows ) ? array_values( array_filter( $rows, 'is_array' ) ) : array();
}

/**
 * Prepares a guide body: gives every H2 an anchor for the table of contents,
 * and places boxes and ads between sections.
 *
 * @param string             $html    Rendered content.
 * @param array<int, string> $inserts Markup to place after section N (1 = after the first H2 section).
 * @param int[]              $keep    Inserts to add at the end when the guide is too short to reach them.
 * @return array{html: string, toc: array<int, array{id: string, title: string}>}
 */
function natura_prepare_content( string $html, array $inserts, array $keep = array() ): array {
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

	$out = '';
	foreach ( $sections as $index => $section ) {
		$out .= $section;
		// $sections[0] is any text before the first H2.
		if ( isset( $inserts[ $index ] ) ) {
			$out .= $inserts[ $index ];
			unset( $inserts[ $index ] );
		}
	}

	foreach ( $keep as $index ) {
		$out .= $inserts[ $index ] ?? '';
	}

	return array(
		'html' => $out,
		'toc'  => $toc,
	);
}

/**
 * Shopping list markup, or nothing when the list is empty.
 *
 * @param string $title Box heading.
 */
function natura_products_box( string $title ): string {
	$products = natura_field_list( 'products' );
	if ( ! $products ) {
		return '';
	}

	$has_links = (bool) array_filter( array_column( $products, 'url' ) );

	ob_start();
	?>
	<aside class="plant-products" aria-labelledby="plant-products-title">
		<h2 id="plant-products-title" class="plant-products-title"><?php echo esc_html( $title ); ?></h2>
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
 * The image used for Pinterest: the dedicated vertical image when the guide
 * has one, or the main photo.
 */
function natura_pin_image_url(): string {
	$pin_id = absint( natura_field( 'pin_image' ) );
	$url    = $pin_id ? wp_get_attachment_image_url( $pin_id, 'full' ) : get_the_post_thumbnail_url( null, 'full' );

	return $url ?: '';
}

/**
 * Link that opens Pinterest's "Save" dialog. A plain link: no Pinterest
 * script, so no third-party code and no tracking until the reader clicks.
 */
function natura_pinterest_save_url(): string {
	$image = natura_pin_image_url();
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
 * One breadcrumb.
 *
 * @param string $name Label.
 * @param string $url  Address.
 * @return array{name: string, url: string}
 */
function natura_crumb( string $name, string $url ): array {
	return array(
		'name' => $name,
		'url'  => $url,
	);
}

/**
 * Prints a breadcrumb trail. The last entry is the current page.
 *
 * @param array<int, array{name: string, url: string}> $trail Trail from natura_*_breadcrumbs().
 */
function natura_the_breadcrumbs( array $trail ): void {
	?>
	<nav class="site-container breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'natura' ); ?>">
		<ol>
			<?php foreach ( $trail as $index => $crumb ) : ?>
				<li>
					<?php if ( $index < count( $trail ) - 1 ) : ?>
						<a href="<?php echo esc_url( $crumb['url'] ); ?>"><?php echo esc_html( $crumb['name'] ); ?></a>
					<?php else : ?>
						<span aria-current="page"><?php echo esc_html( $crumb['name'] ); ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ol>
	</nav>
	<?php
}

/**
 * Prints the "By … · Updated …" line of the current guide.
 */
function natura_the_byline(): void {
	$updated = '<time datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';

	echo '<p class="plant-byline">';
	if ( get_the_author() ) {
		/* translators: 1: author name, 2: date. */
		printf( esc_html__( 'By %1$s · Updated %2$s', 'natura' ), esc_html( get_the_author() ), $updated ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
	} else {
		/* translators: %s: date. */
		printf( esc_html__( 'Updated %s', 'natura' ), $updated ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
	}
	echo '</p>';
}

/**
 * Whether an SEO plugin already prints titles, Open Graph tags, canonicals,
 * and the main structured data. The theme then stays out of its way.
 */
function natura_seo_plugin_active(): bool {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) || class_exists( 'The_SEO_Framework\Load' );
}

/**
 * Post types that are guides: they get Open Graph tags and structured data.
 */
function natura_guide_post_types(): array {
	return array( 'plant', 'problem', 'post' );
}

/**
 * Open Graph tags for guides when no SEO plugin is active. Pinterest reads
 * them for Rich Pins: title, description, and image on every pin.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( ! is_singular( natura_guide_post_types() ) || natura_seo_plugin_active() ) {
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
 * BreadcrumbList data for a trail.
 *
 * @param array<int, array{name: string, url: string}> $trail Breadcrumb trail.
 */
function natura_breadcrumb_data( array $trail ): array {
	$items = array();
	foreach ( $trail as $position => $crumb ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position + 1,
			'name'     => $crumb['name'],
			'item'     => $crumb['url'],
		);
	}

	return array(
		'@type'           => 'BreadcrumbList',
		'itemListElement' => $items,
	);
}

/**
 * A JSON-LD script for a graph, or nothing when the graph is empty.
 *
 * @param array $graph Entities.
 */
function natura_json_ld( array $graph ): string {
	if ( ! $graph ) {
		return '';
	}

	return '<script type="application/ld+json">' . wp_json_encode(
		array(
			'@context' => 'https://schema.org',
			'@graph'   => array_values( $graph ),
		),
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG
	) . '</script>';
}

/**
 * Structured data for the current guide.
 *
 * The article and breadcrumb are left to an SEO plugin when one is active, to
 * avoid publishing the same entity twice. The FAQ comes from fields no SEO
 * plugin knows about, so it is always the theme's.
 *
 * @param array<int, array{name: string, url: string}> $trail Breadcrumb trail.
 */
function natura_structured_data( array $trail ): string {
	$graph = array();

	if ( ! natura_seo_plugin_active() ) {
		$graph[] = array_filter(
			array(
				'@type'            => 'Article',
				'headline'         => get_the_title(),
				'description'      => wp_strip_all_tags( get_the_excerpt() ),
				'image'            => get_the_post_thumbnail_url( null, 'full' ) ?: null,
				'datePublished'    => get_the_date( 'c' ),
				'dateModified'     => get_the_modified_date( 'c' ),
				'author'           => array(
					'@type' => 'Person',
					'name'  => get_the_author(),
				),
				'publisher'        => array(
					'@type' => 'Organization',
					'name'  => get_bloginfo( 'name' ),
				),
				'mainEntityOfPage' => get_permalink(),
			)
		);
		$graph[] = natura_breadcrumb_data( $trail );
	}

	$faq = natura_field_list( 'faq' );
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

	return natura_json_ld( $graph );
}

/**
 * Structured data for a list page: its breadcrumb, unless an SEO plugin
 * prints one.
 *
 * @param array<int, array{name: string, url: string}> $trail Breadcrumb trail.
 */
function natura_list_structured_data( array $trail ): string {
	return natura_seo_plugin_active() ? '' : natura_json_ld( array( natura_breadcrumb_data( $trail ) ) );
}

/**
 * Canonical address and description for list pages when no SEO plugin
 * prints them. WordPress prints a canonical for single pages only.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( natura_seo_plugin_active() || is_singular() || is_front_page() || is_search() || is_404() ) {
			return;
		}

		$page = max( 1, (int) get_query_var( 'paged' ) );
		$url  = '';
		$text = '';

		if ( function_exists( 'natura_is_plant_care_section' ) && natura_is_plant_care_section() ) {
			$url  = natura_plant_care_url();
			$text = natura_plant_care_intro();
		} elseif ( is_category() || is_tax() ) {
			$term = get_queried_object();
			$url  = $term instanceof WP_Term ? (string) get_term_link( $term ) : '';
			$text = $term instanceof WP_Term ? $term->description : '';
		} elseif ( is_post_type_archive() ) {
			$type = (string) get_query_var( 'post_type' );
			$url  = (string) get_post_type_archive_link( $type );
			$text = (string) apply_filters( 'natura_archive_description', '', $type );
		}

		if ( ! $url ) {
			return;
		}
		if ( $page > 1 ) {
			$url = trailingslashit( $url ) . user_trailingslashit( 'page/' . $page, 'paged' );
		}

		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
		if ( $text && 1 === $page ) {
			printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_strip_all_tags( $text ) ) );
		}
	}
);

/**
 * Prints the FAQ and sources of the current guide.
 */
function natura_the_faq_and_sources(): void {
	$faq     = natura_field_list( 'faq' );
	$sources = natura_field_list( 'sources' );

	if ( $faq ) :
		?>
		<section class="plant-faq" id="plant-faq" aria-labelledby="plant-faq-title">
			<h2 id="plant-faq-title"><?php esc_html_e( 'Questions & answers', 'natura' ); ?></h2>
			<?php foreach ( $faq as $row ) : ?>
				<details>
					<summary><?php echo esc_html( $row['question'] ?? '' ); ?></summary>
					<p><?php echo esc_html( $row['answer'] ?? '' ); ?></p>
				</details>
			<?php endforeach; ?>
		</section>
		<?php
	endif;

	if ( $sources ) :
		?>
		<section class="plant-sources" aria-labelledby="plant-sources-title">
			<h2 id="plant-sources-title"><?php esc_html_e( 'Sources', 'natura' ); ?></h2>
			<ul>
				<?php foreach ( $sources as $source ) : ?>
					<li>
						<?php if ( ! empty( $source['url'] ) ) : ?>
							<a href="<?php echo esc_url( $source['url'] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $source['title'] ?? '' ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $source['title'] ?? '' ); ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php
	endif;
}

/**
 * Prints the table of contents and the Pinterest button beside a guide.
 *
 * @param array<int, array{id: string, title: string}> $toc     Sections.
 * @param string                                       $label   Heading, e.g. "In this guide".
 * @param string                                       $pin_url Pinterest save link, or empty.
 */
function natura_the_toc( array $toc, string $label, string $pin_url ): void {
	if ( natura_field_list( 'faq' ) ) {
		$toc[] = array(
			'id'    => 'plant-faq',
			'title' => __( 'Questions & answers', 'natura' ),
		);
	}
	?>
	<aside class="plant-toc-wrap">
		<details class="plant-toc">
			<summary><?php echo esc_html( $label ); ?></summary>
			<ol>
				<?php foreach ( $toc as $entry ) : ?>
					<li><a href="#<?php echo esc_attr( $entry['id'] ); ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
				<?php endforeach; ?>
			</ol>
		</details>
		<?php if ( $pin_url ) : ?>
			<a class="pin-button pin-button-wide" href="<?php echo esc_url( $pin_url ); ?>" target="_blank" rel="noopener">
				<?php natura_the_icon( 'pin' ); ?>
				<span><?php esc_html_e( 'Save this guide', 'natura' ); ?></span>
				<span class="screen-reader-text"><?php esc_html_e( 'to Pinterest (opens in a new tab)', 'natura' ); ?></span>
			</a>
		<?php endif; ?>
	</aside>
	<?php
}

/**
 * Prints the main photo with its Pinterest button.
 *
 * @param string $pin_url Pinterest save link, or empty.
 */
function natura_the_hero_media( string $pin_url ): void {
	if ( ! has_post_thumbnail() ) {
		return;
	}
	?>
	<figure class="plant-hero-media">
		<?php
		the_post_thumbnail(
			'large',
			array(
				'sizes'         => '(min-width: 1024px) 560px, 100vw',
				'fetchpriority' => 'high',
				'loading'       => 'eager',
			)
		);
		?>
		<?php if ( $pin_url ) : ?>
			<a class="pin-button" href="<?php echo esc_url( $pin_url ); ?>" target="_blank" rel="noopener">
				<?php natura_the_icon( 'pin' ); ?>
				<span><?php esc_html_e( 'Save', 'natura' ); ?></span>
				<span class="screen-reader-text"><?php esc_html_e( 'this guide to Pinterest (opens in a new tab)', 'natura' ); ?></span>
			</a>
		<?php endif; ?>
	</figure>
	<?php
}
