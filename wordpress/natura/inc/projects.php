<?php
/**
 * DIY Projects: step-by-step builds. Data from Natura Core
 * (includes/projects.php).
 *
 * From the review of Home Depot, Bunnings, This Old House, Bob Vila, and
 * Savvy Gardening (design/DIY.md): difficulty and time first, materials and
 * tools as a checklist, numbered steps with a photo and a tip each. Natura
 * adds what those pages leave out on a balcony (weight, where water drains,
 * wind), says whether the project was built by us or adapted from a source,
 * and links the plants to grow in it.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The current project's facts at a glance: label, value, icon.
 *
 * @return array<int, array{label: string, value: string, icon: string}>
 */
function natura_project_facts(): array {
	$facts = array();
	foreach ( array(
		'difficulty' => array( __( 'Difficulty', 'natura' ), 'gauge' ),
		'time'       => array( __( 'Time', 'natura' ), 'calendar' ),
		'cost'       => array( __( 'Cost', 'natura' ), 'basket' ),
		'size'       => array( __( 'Finished size', 'natura' ), 'pot' ),
	) as $key => list( $label, $icon ) ) {
		$value = trim( (string) natura_field( $key ) );
		if ( '' !== $value ) {
			$facts[] = array(
				'label' => $label,
				'value' => $value,
				'icon'  => $icon,
			);
		}
	}

	return $facts;
}

/**
 * Where the current project's instructions come from: label and sentence.
 *
 * @return array{key: string, label: string, text: string}
 */
function natura_project_method(): array {
	return 'built' === natura_field( 'project_method' )
		? array(
			'key'   => 'built',
			'label' => __( 'Built by us', 'natura' ),
			'text'  => __( 'We made this project ourselves, following these steps.', 'natura' ),
		)
		: array(
			'key'   => 'adapted',
			'label' => __( 'Adapted from a source', 'natura' ),
			'text'  => __( 'These instructions are adapted from the source listed at the end of this page. We have not built this exact version ourselves.', 'natura' ),
		);
}

/**
 * The steps of the current project that have a title or text, with anchors.
 *
 * @return array<int, array{title: string, text: string, tip: string, image: int, id: string}>
 */
function natura_project_steps(): array {
	$steps = array();
	foreach ( natura_field_list( 'steps' ) as $row ) {
		$title = trim( (string) ( $row['title'] ?? '' ) );
		$text  = trim( (string) ( $row['text'] ?? '' ) );
		if ( '' === $title && '' === $text ) {
			continue;
		}
		$steps[] = array(
			'title' => $title,
			'text'  => $text,
			'tip'   => trim( (string) ( $row['tip'] ?? '' ) ),
			'image' => absint( $row['image'] ?? 0 ),
			'id'    => 'step-' . ( count( $steps ) + 1 ),
		);
	}

	return $steps;
}

/**
 * The plant guides a project suggests, published only.
 *
 * @return WP_Post[]
 */
function natura_project_plants(): array {
	$ids = array_filter( array_map( 'absint', (array) get_post_meta( (int) get_the_ID(), '_natura_project_plant' ) ) );

	return $ids ? get_posts(
		array(
			'post_type'      => 'plant',
			'post__in'       => $ids,
			'orderby'        => 'post__in',
			'posts_per_page' => 6,
			'no_found_rows'  => true,
		)
	) : array();
}

/**
 * The main category of the current project.
 */
function natura_project_category(): ?WP_Term {
	$terms = get_the_terms( (int) get_the_ID(), 'project_category' );

	return is_array( $terms ) && $terms ? $terms[0] : null;
}

/**
 * The breadcrumb trail of a project or a project list.
 *
 * @param WP_Term|null $category Category, when there is one.
 * @param bool         $current  Add the current project.
 * @return array<int, array{name: string, url: string}>
 */
function natura_project_breadcrumbs( ?WP_Term $category = null, bool $current = false ): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'DIY Projects', 'natura' ), (string) get_post_type_archive_link( 'project' ) ),
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
 * Prints a materials or tools checklist, with optional shop links.
 *
 * @param string $key   materials or tools.
 * @param string $title Heading.
 */
function natura_the_project_list( string $key, string $title ): void {
	$rows = array_filter( natura_field_list( $key ), static fn( array $row ): bool => '' !== trim( (string) ( $row['name'] ?? '' ) ) );
	if ( ! $rows ) {
		return;
	}
	?>
	<div class="project-list">
		<h3><?php echo esc_html( $title ); ?></h3>
		<ul>
			<?php foreach ( $rows as $row ) : ?>
				<li>
					<?php natura_the_icon( 'check' ); ?>
					<span>
						<?php echo esc_html( $row['name'] ); ?>
						<?php if ( ! empty( $row['quantity'] ) ) : ?>
							<span class="project-qty"><?php echo esc_html( $row['quantity'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $row['url'] ) ) : ?>
							<a class="project-shop" href="<?php echo esc_url( $row['url'] ); ?>" target="_blank" rel="sponsored nofollow noopener"><?php esc_html_e( 'Check price', 'natura' ); ?><span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span></a>
						<?php endif; ?>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}

/*
 * Project lists with fewer projects than the indexing threshold stay out of
 * search results, like plant and gear lists.
 */
add_filter(
	'wp_robots',
	static function ( array $robots ): array {
		if ( is_tax( 'project_category' ) ) {
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
		if ( is_post_type_archive( 'project' ) ) {
			$parts['title'] = __( 'DIY projects for balcony and container gardens', 'natura' );
		} elseif ( is_tax( 'project_category' ) ) {
			/* translators: %s: category, e.g. "Watering". */
			$parts['title'] = sprintf( __( 'DIY projects: %s', 'natura' ), single_term_title( '', false ) );
		}
		return $parts;
	}
);

add_filter(
	'natura_archive_description',
	static function ( string $text, string $type ): string {
		return 'project' === $type ? natura_home_setting( 'natura_projects_intro' ) : $text;
	},
	10,
	2
);
