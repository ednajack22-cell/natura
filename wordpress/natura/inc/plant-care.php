<?php
/**
 * Plant Care helpers: the section page, problem guides, and article topics.
 *
 * The addresses and fields come from the Natura Core plugin. Without it,
 * articles and their categories still display; the section page and problem
 * guides simply do not exist.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Whether the current page is the Plant Care section page (/plant-care/).
 */
function natura_is_plant_care_section(): bool {
	return function_exists( 'natura_core_is_plant_care_section' ) && natura_core_is_plant_care_section();
}

/**
 * Address of the section page.
 */
function natura_plant_care_url(): string {
	return home_url( '/plant-care/' );
}

/**
 * Address of the problem guide list.
 */
function natura_problems_url(): string {
	return (string) ( get_post_type_archive_link( 'problem' ) ?: home_url( '/problems/' ) );
}

/**
 * Introduction of the section page, also its meta description.
 */
function natura_plant_care_intro(): string {
	return natura_home_setting( 'natura_intro_plant_care' );
}

/**
 * Introduction of the problem guide list, also its meta description.
 */
function natura_problems_intro(): string {
	return natura_home_setting( 'natura_intro_problems' );
}

add_filter(
	'natura_archive_description',
	static fn( string $text, string $type ): string => 'problem' === $type ? natura_problems_intro() : ( 'plant' === $type ? natura_home_setting( 'natura_intro_plants' ) : $text ),
	10,
	2
);

add_filter(
	'template_include',
	static function ( string $template ): string {
		if ( natura_is_plant_care_section() ) {
			return locate_template( 'plant-care.php' ) ?: $template;
		}
		return $template;
	}
);

add_filter(
	'document_title_parts',
	static function ( array $parts ): array {
		if ( natura_is_plant_care_section() ) {
			$parts['title'] = __( 'Plant Care', 'natura' );
		}
		return $parts;
	}
);

/**
 * The first two breadcrumbs of every Plant Care page.
 *
 * @return array<int, array{name: string, url: string}>
 */
function natura_plant_care_trail(): array {
	return array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Plant Care', 'natura' ), natura_plant_care_url() ),
	);
}

/**
 * Breadcrumbs for the problem list, or for one problem guide when $current
 * is true.
 *
 * @param bool $current Whether the trail ends with the current problem guide.
 * @return array<int, array{name: string, url: string}>
 */
function natura_problem_breadcrumbs( bool $current = true ): array {
	$trail   = natura_plant_care_trail();
	$trail[] = natura_crumb( __( 'Plant problems', 'natura' ), natura_problems_url() );

	if ( $current ) {
		$trail[] = natura_crumb( get_the_title(), (string) get_permalink() );
	}

	return $trail;
}

/**
 * The topic of the current article: its first category other than the
 * default one, when it has one.
 */
function natura_post_topic(): ?WP_Term {
	$categories = get_the_category();
	if ( ! $categories ) {
		return null;
	}

	$default = (int) get_option( 'default_category' );
	foreach ( $categories as $category ) {
		if ( $category->term_id !== $default ) {
			return $category;
		}
	}

	return $categories[0];
}

/**
 * Breadcrumbs for one topic page, or for one article.
 *
 * @param WP_Term|null $topic Topic, or null for the current article.
 * @return array<int, array{name: string, url: string}>
 */
function natura_topic_breadcrumbs( ?WP_Term $topic = null ): array {
	$trail = natura_plant_care_trail();

	if ( $topic ) {
		$trail[] = natura_crumb( $topic->name, (string) get_term_link( $topic ) );
		return $trail;
	}

	$article_topic = natura_post_topic();
	if ( $article_topic ) {
		$trail[] = natura_crumb( $article_topic->name, (string) get_term_link( $article_topic ) );
	}
	$trail[] = natura_crumb( get_the_title(), (string) get_permalink() );

	return $trail;
}

/**
 * Topics that have at least one article, in menu order: the topics the plugin
 * creates first, then any others by name.
 *
 * @return WP_Term[]
 */
function natura_topics(): array {
	$terms = get_terms(
		array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
			'orderby'    => 'name',
		)
	);
	if ( is_wp_error( $terms ) ) {
		return array();
	}

	$order = array_flip( array( 'watering', 'soil-feeding', 'light-position', 'seasonal-care', 'grow-your-own-food' ) );
	usort(
		$terms,
		static fn( WP_Term $a, WP_Term $b ): int => ( $order[ $a->slug ] ?? 99 ) <=> ( $order[ $b->slug ] ?? 99 )
	);

	return $terms;
}

/**
 * Prints the Plant Care chips: the section page, problem guides, then every
 * topic.
 *
 * @param WP_Term|null $current     Current topic, if any.
 * @param bool         $on_problems Whether the reader is on the problem list.
 */
function natura_the_topic_chips( ?WP_Term $current = null, bool $on_problems = false ): void {
	$topics = natura_topics();
	if ( ! $topics ) {
		return;
	}
	?>
	<nav class="filter-chips" aria-label="<?php esc_attr_e( 'Plant Care topics', 'natura' ); ?>">
		<a href="<?php echo esc_url( natura_plant_care_url() ); ?>"<?php echo natura_is_plant_care_section() ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'All care guides', 'natura' ); ?></a>
		<a href="<?php echo esc_url( natura_problems_url() ); ?>"<?php echo $on_problems ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Plant problems', 'natura' ); ?></a>
		<?php foreach ( $topics as $topic ) : ?>
			<a href="<?php echo esc_url( (string) get_term_link( $topic ) ); ?>"<?php echo ( $current && $current->term_id === $topic->term_id ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $topic->name ); ?></a>
		<?php endforeach; ?>
	</nav>
	<?php
}

/**
 * Causes of the current problem guide that have a name.
 *
 * @return array<int, array{cause: string, sign: string, check: string, fix: string, recovery: string, id: string}>
 */
function natura_problem_causes(): array {
	$causes = array();
	foreach ( natura_field_list( 'causes' ) as $index => $row ) {
		$cause = trim( (string) ( $row['cause'] ?? '' ) );
		if ( '' === $cause ) {
			continue;
		}
		$causes[] = array(
			'cause'    => $cause,
			'sign'     => (string) ( $row['sign'] ?? '' ),
			'check'    => (string) ( $row['check'] ?? '' ),
			'fix'      => (string) ( $row['fix'] ?? '' ),
			'recovery' => (string) ( $row['recovery'] ?? '' ),
			'id'       => 'cause-' . ( $index + 1 ),
		);
	}

	return $causes;
}

/**
 * Plant guides the current problem affects, published only.
 *
 * @return int[]
 */
function natura_problem_plant_ids(): array {
	$ids = array_map( 'absint', (array) get_post_meta( get_the_ID(), '_natura_plant' ) );

	return array_values( array_filter( $ids, static fn( int $id ): bool => $id && 'publish' === get_post_status( $id ) ) );
}

/**
 * Problem guides that list a plant as affected.
 *
 * @param int $plant_id Plant guide ID.
 * @param int $limit    Maximum number of guides.
 */
function natura_plant_problems( int $plant_id, int $limit = 3 ): ?WP_Query {
	if ( ! post_type_exists( 'problem' ) ) {
		return null;
	}

	return new WP_Query(
		array(
			'post_type'           => 'problem',
			'posts_per_page'      => $limit,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'meta_key'            => '_natura_plant', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- indexed key, a handful of rows.
			'meta_value'          => $plant_id, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
		)
	);
}

/**
 * Prints the dark band that sends readers from plant lists to the problem
 * guides, as in the Stitch "Plant Library" mock-up.
 */
function natura_the_problem_band(): void {
	if ( ! natura_section_enabled( 'list_problem_band' ) || ! post_type_exists( 'problem' ) || ! wp_count_posts( 'problem' )->publish ) {
		return;
	}
	?>
	<aside class="cta-band" aria-labelledby="cta-band-title">
		<span class="path-icon"><?php natura_the_icon( 'lens' ); ?></span>
		<div>
			<p class="label"><?php esc_html_e( 'Plant problems', 'natura' ); ?></p>
			<h2 id="cta-band-title"><?php esc_html_e( 'Plant looking unwell?', 'natura' ); ?></h2>
			<p><?php esc_html_e( 'Yellow leaves, wilting, spots on the fruit: find the likely cause and what to do, before you spray or feed.', 'natura' ); ?></p>
		</div>
		<a class="button button-accent" href="<?php echo esc_url( natura_problems_url() ); ?>"><?php esc_html_e( 'Find the cause', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
	</aside>
	<?php
}
