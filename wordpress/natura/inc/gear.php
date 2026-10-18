<?php
/**
 * Gear: buying guides and their lists. Data from Natura Core (includes/gear.php).
 *
 * From the review of Gardeners' World, Which?, Bob Vila, and Reviewed
 * (design/GEAR.md): the answer first ("Our picks at a glance", each with who
 * it is best for), then what to look for, a comparison table, and one
 * section per pick with verdict, pros and cons, and specs. Unlike most of
 * them, Natura says plainly whether the picks were tested or researched,
 * shows no star ratings it did not measure, and writes no prices.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Lines of a multi-line field, trimmed, empty ones dropped.
 *
 * @param string $text Field value.
 * @return string[]
 */
function natura_lines( string $text ): array {
	return array_values( array_filter( array_map( 'trim', preg_split( '/\R/', $text ) ?: array() ) ) );
}

/**
 * The picks of the current buying guide, with pros, cons, and specs split
 * into lines, and an anchor for each.
 *
 * @return array<int, array{name: string, best_for: string, verdict: string, pros: string[], cons: string[], specs: array<string, string>, url: string, image: int, id: string}>
 */
function natura_gear_picks(): array {
	$picks = array();
	foreach ( natura_field_list( 'picks' ) as $index => $row ) {
		$name = trim( (string) ( $row['name'] ?? '' ) );
		if ( '' === $name ) {
			continue;
		}
		$specs = array();
		foreach ( natura_lines( (string) ( $row['specs'] ?? '' ) ) as $line ) {
			$parts = array_map( 'trim', explode( ':', $line, 2 ) );
			if ( 2 === count( $parts ) && '' !== $parts[0] && '' !== $parts[1] ) {
				$specs[ $parts[0] ] = $parts[1];
			}
		}
		$picks[] = array(
			'name'     => $name,
			'best_for' => trim( (string) ( $row['best_for'] ?? '' ) ),
			'verdict'  => trim( (string) ( $row['verdict'] ?? '' ) ),
			'pros'     => natura_lines( (string) ( $row['pros'] ?? '' ) ),
			'cons'     => natura_lines( (string) ( $row['cons'] ?? '' ) ),
			'specs'    => $specs,
			'url'      => (string) ( $row['url'] ?? '' ),
			'image'    => absint( $row['image'] ?? 0 ),
			'id'       => 'pick-' . ( $index + 1 ),
		);
	}

	return $picks;
}

/**
 * How the current guide's picks were chosen: label and the sentence that
 * explains it.
 *
 * @return array{key: string, label: string, text: string}
 */
function natura_gear_method(): array {
	$key = 'tested' === natura_field( 'method' ) ? 'tested' : 'researched';

	return 'tested' === $key
		? array(
			'key'   => $key,
			'label' => __( 'Tested by us', 'natura' ),
			'text'  => __( 'We used every pick in this guide ourselves before recommending it.', 'natura' ),
		)
		: array(
			'key'   => $key,
			'label' => __( 'Researched, not tested', 'natura' ),
			'text'  => __( 'We have not tested these products ourselves. The picks come from the sources listed at the end of this guide.', 'natura' ),
		);
}

/**
 * The "Check price" link of a pick: sponsored, opens the shop.
 *
 * @param array{name: string, url: string} $pick  Pick.
 * @param string                           $class Extra class.
 */
function natura_the_price_button( array $pick, string $class = '' ): void {
	if ( '' === $pick['url'] ) {
		return;
	}
	?>
	<a class="button button-buy <?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( $pick['url'] ); ?>" target="_blank" rel="sponsored nofollow noopener">
		<?php esc_html_e( 'Check price', 'natura' ); ?>
		<span class="screen-reader-text">
			<?php
			/* translators: %s: product name. */
			echo esc_html( sprintf( __( 'of %s (opens in a new tab)', 'natura' ), $pick['name'] ) );
			?>
		</span>
	</a>
	<?php
}

/**
 * The spec labels of a set of picks, in the order they first appear: the
 * columns of the comparison table.
 *
 * @param array<int, array{specs: array<string, string>}> $picks Picks.
 * @return string[]
 */
function natura_gear_spec_labels( array $picks ): array {
	$labels = array();
	foreach ( $picks as $pick ) {
		foreach ( array_keys( $pick['specs'] ) as $label ) {
			$labels[ $label ] = true;
		}
	}

	return array_keys( $labels );
}

/**
 * Structured data of a buying guide's picks: an ItemList of their names,
 * in order. No Product or Review markup: there are no measured ratings or
 * prices to describe, and Google's rules forbid inventing them.
 *
 * @param array<int, array{name: string}> $picks Picks.
 */
function natura_gear_structured_data( array $picks ): string {
	if ( ! $picks || natura_seo_plugin_active() ) {
		return '';
	}

	return natura_json_ld(
		array(
			array(
				'@type'           => 'ItemList',
				'name'            => get_the_title(),
				'itemListElement' => array_map(
					static fn( array $pick, int $i ): array => array(
						'@type'    => 'ListItem',
						'position' => $i + 1,
						'name'     => $pick['name'],
					),
					$picks,
					array_keys( $picks )
				),
			),
		)
	);
}

/**
 * The breadcrumb trail of a buying guide or a gear list.
 *
 * @param WP_Term|null $category Category, when there is one.
 * @param bool         $current  Add the current guide.
 * @return array<int, array{name: string, url: string}>
 */
function natura_gear_breadcrumbs( ?WP_Term $category = null, bool $current = false ): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Gear', 'natura' ), (string) get_post_type_archive_link( 'gear' ) ),
	);
	if ( $category ) {
		$trail[] = natura_crumb( $category->name, (string) get_term_link( $category ) );
	}
	if ( $current ) {
		$trail[] = natura_crumb( get_the_title(), (string) get_permalink() );
	}

	return $trail;
}

/**
 * The main category of the current buying guide.
 */
function natura_gear_category(): ?WP_Term {
	$terms = get_the_terms( (int) get_the_ID(), 'gear_category' );

	return is_array( $terms ) && $terms ? $terms[0] : null;
}

/*
 * Gear lists with fewer guides than the indexing threshold stay out of
 * search results (AGENTS.md), like plant lists.
 */
add_filter(
	'wp_robots',
	static function ( array $robots ): array {
		if ( is_tax( 'gear_category' ) ) {
			$term = get_queried_object();
			if ( ! $term instanceof WP_Term || $term->count < NATURA_MIN_INDEXED_PLANTS ) {
				$robots['noindex'] = true;
				$robots['follow']  = true;
			}
		}
		return $robots;
	}
);

add_filter(
	'document_title_parts',
	static function ( array $parts ): array {
		if ( is_post_type_archive( 'gear' ) ) {
			$parts['title'] = __( 'Gear for growing in pots: buying guides', 'natura' );
		} elseif ( is_tax( 'gear_category' ) ) {
			/* translators: %s: category, e.g. "Potting mix & fertilizer". */
			$parts['title'] = sprintf( __( '%s: buying guides', 'natura' ), single_term_title( '', false ) );
		}
		return $parts;
	}
);

add_filter(
	'natura_archive_description',
	static function ( string $text, string $type ): string {
		return 'gear' === $type ? natura_home_setting( 'natura_gear_intro' ) : $text;
	},
	10,
	2
);
