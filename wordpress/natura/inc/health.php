<?php
/**
 * Content health: what each guide is missing, and how well each topic is
 * covered (Natura Options → Content health).
 *
 * Topical authority comes from covering a subject in depth with complete,
 * sourced, well-linked guides. This screen turns that into a to-do list:
 * every published guide is checked against what the theme can use (summary,
 * photo, Pinterest image, sources, links to other guides, the data the
 * lists and tools read), and every topic is counted against the six guides
 * a list needs before it is shown to Google.
 *
 * Read-only: it changes nothing, and only users who can edit theme options
 * see it.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Words below which a guide's own text counts as short. A guideline for
 * guides that answer a question in depth, not a rule from Google.
 */
const NATURA_SHORT_GUIDE_WORDS = 500;

/**
 * The checks for one guide: label => whether it passes. Only checks that
 * apply to its type.
 *
 * @param WP_Post $post Published guide.
 * @return array<string, bool>
 */
function natura_guide_checks( WP_Post $post ): array {
	$id      = (int) $post->ID;
	$content = (string) $post->post_content;
	$home    = wp_parse_url( home_url(), PHP_URL_HOST );
	$links   = 0;
	if ( preg_match_all( '/<a\s[^>]*href=["\']([^"\']+)["\']/i', $content, $matches ) ) {
		foreach ( $matches[1] as $href ) {
			$host = wp_parse_url( $href, PHP_URL_HOST );
			if ( str_starts_with( $href, '/' ) || $host === $home ) {
				++$links;
			}
		}
	}
	$words = str_word_count( wp_strip_all_tags( strip_shortcodes( $content ) ) );

	$checks = array(
		__( 'Summary (excerpt)', 'natura' )     => '' !== trim( (string) $post->post_excerpt ),
		__( 'Main photo', 'natura' )            => has_post_thumbnail( $id ),
		__( 'Pinterest image', 'natura' )       => (bool) absint( natura_field( 'pin_image', $id ) ),
		__( 'Sources', 'natura' )               => (bool) natura_field_list( 'sources', $id ),
		__( 'Links to other guides', 'natura' ) => $links > 0,
	);
	// Problem guides and buying guides carry most of their answer in fields, not in the text.
	if ( in_array( $post->post_type, array( 'plant', 'post' ), true ) ) {
		/* translators: %d: number of words. */
		$checks[ sprintf( __( 'At least %d words of text', 'natura' ), NATURA_SHORT_GUIDE_WORDS ) ] = $words >= NATURA_SHORT_GUIDE_WORDS;
	}

	switch ( $post->post_type ) {
		case 'plant':
			$checks[ __( 'Sun and space', 'natura' ) ]         = taxonomy_exists( 'plant_sun' ) && has_term( '', 'plant_sun', $id ) && has_term( '', 'plant_space', $id );
			$checks[ __( 'Planting calendar', 'natura' ) ]     = function_exists( 'natura_core_plant_months' ) && ( natura_core_plant_months( $id, 'sow' ) || natura_core_plant_months( $id, 'plant' ) || natura_core_plant_months( $id, 'harvest' ) );
			$checks[ __( 'RHS hardiness rating', 'natura' ) ]  = '' !== (string) natura_field( 'hardiness', $id );
			$checks[ __( 'In short (key points)', 'natura' ) ] = (bool) natura_field_list( 'key_points', $id );
			$checks[ __( 'Questions & answers', 'natura' ) ]   = (bool) natura_field_list( 'faq', $id );
			break;
		case 'problem':
			$checks[ __( 'Likely causes with "What you see"', 'natura' ) ] = (bool) array_filter( array_column( natura_field_list( 'causes', $id ), 'sign' ) );
			$checks[ __( 'Plants affected', 'natura' ) ]                  = (bool) get_post_meta( $id, '_natura_plant' );
			$checks[ __( 'Where it shows', 'natura' ) ]                   = taxonomy_exists( 'problem_part' ) && has_term( '', 'problem_part', $id );
			break;
		case 'post':
			$checks[ __( 'Plant Care topic', 'natura' ) ] = (bool) array_filter( wp_get_post_categories( $id ), static fn( int $cat ): bool => (int) get_option( 'default_category' ) !== $cat );
			break;
		case 'gear':
			$checks[ __( 'At least two picks', 'natura' ) ]   = count( natura_field_list( 'picks', $id ) ) >= 2;
			$checks[ __( 'What to look for', 'natura' ) ]     = (bool) natura_field_list( 'criteria', $id );
			$checks[ __( 'Gear category', 'natura' ) ]        = has_term( '', 'gear_category', $id );
			break;
	}

	return $checks;
}

/**
 * Every published guide with what it is missing, most gaps first.
 *
 * @return array<int, array{post: WP_Post, missing: string[], total: int}>
 */
function natura_content_health(): array {
	$rows = array();
	$posts = get_posts(
		array(
			'post_type'      => array_filter( natura_guide_post_types(), 'post_type_exists' ),
			'post_status'    => 'publish',
			'posts_per_page' => 500,
			'no_found_rows'  => true,
		)
	);
	foreach ( $posts as $post ) {
		$checks = natura_guide_checks( $post );
		$rows[] = array(
			'post'    => $post,
			'missing' => array_keys( array_filter( $checks, static fn( bool $ok ): bool => ! $ok ) ),
			'total'   => count( $checks ),
		);
	}
	usort( $rows, static fn( array $a, array $b ): int => count( $b['missing'] ) <=> count( $a['missing'] ) );

	return $rows;
}

/**
 * Topics and how many published guides each has: plant types, light and
 * space, Plant Care topics, gear categories.
 *
 * @return array<string, array<int, array{name: string, count: int, url: string}>>
 */
function natura_topic_coverage(): array {
	$groups = array();
	$sets   = array(
		__( 'Plant types', 'natura' )        => 'plant_type',
		__( 'Light', 'natura' )              => 'plant_sun',
		__( 'Growing spaces', 'natura' )     => 'plant_space',
		__( 'Plant Care topics', 'natura' )  => 'category',
		__( 'Gear categories', 'natura' )    => 'gear_category',
	);
	foreach ( $sets as $label => $taxonomy ) {
		if ( ! taxonomy_exists( $taxonomy ) ) {
			continue;
		}
		$terms = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
				'exclude'    => 'category' === $taxonomy ? array( (int) get_option( 'default_category' ) ) : array(),
			)
		);
		if ( is_wp_error( $terms ) || ! $terms ) {
			continue;
		}
		$groups[ $label ] = array_map(
			static fn( WP_Term $term ): array => array(
				'name'  => $term->name,
				'count' => (int) $term->count,
				'url'   => (string) get_term_link( $term ),
			),
			$terms
		);
	}

	return $groups;
}

/**
 * Prints the Content health tab.
 *
 * @param array{title: string, intro: string} $section Tab.
 */
function natura_render_health_tab( array $section ): void {
	$rows     = natura_content_health();
	$complete = count( array_filter( $rows, static fn( array $row ): bool => ! $row['missing'] ) );
	$coverage = natura_topic_coverage();
	$labels   = array();
	foreach ( natura_guide_post_types() as $type ) {
		$object = get_post_type_object( $type );
		if ( $object ) {
			$labels[ $type ] = $object->labels->singular_name;
		}
	}
	?>
	<div class="natura-section-head">
		<h2><?php echo esc_html( $section['title'] ); ?></h2>
		<p><?php echo esc_html( $section['intro'] ); ?></p>
	</div>

	<div class="natura-dashboard natura-health-summary">
		<section class="natura-box">
			<h3><?php esc_html_e( 'Guides', 'natura' ); ?></h3>
			<p class="natura-big">
				<?php
				/* translators: 1: complete guides, 2: all guides. */
				echo esc_html( sprintf( __( '%1$d of %2$d complete', 'natura' ), $complete, count( $rows ) ) );
				?>
			</p>
			<p class="description"><?php esc_html_e( 'A guide is complete when it has everything the theme can use. Links to other guides are the ones you write in the text: they matter most to Google.', 'natura' ); ?></p>
		</section>
		<section class="natura-box">
			<h3><?php esc_html_e( 'How to read this', 'natura' ); ?></h3>
			<p class="description"><?php esc_html_e( 'Start with the guides at the top of the list: they miss the most. Then grow the topics marked "Fewer than 6": a list with fewer than six guides is kept out of Google.', 'natura' ); ?></p>
		</section>
	</div>

	<section class="natura-box">
		<h3><?php esc_html_e( 'What each guide is missing', 'natura' ); ?></h3>
		<?php if ( ! $rows ) : ?>
			<p><?php esc_html_e( 'No published guide yet.', 'natura' ); ?></p>
		<?php else : ?>
			<table class="widefat striped natura-health">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Guide', 'natura' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Type', 'natura' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Missing', 'natura' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<td>
								<a href="<?php echo esc_url( (string) get_edit_post_link( $row['post']->ID ) ); ?>"><strong><?php echo esc_html( get_the_title( $row['post'] ) ); ?></strong></a>
								<br><a href="<?php echo esc_url( (string) get_permalink( $row['post'] ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'natura' ); ?></a>
							</td>
							<td><?php echo esc_html( $labels[ $row['post']->post_type ] ?? $row['post']->post_type ); ?></td>
							<td>
								<?php if ( $row['missing'] ) : ?>
									<ul class="natura-missing">
										<?php foreach ( $row['missing'] as $item ) : ?>
											<li><?php echo esc_html( $item ); ?></li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<span class="natura-complete"><span class="dashicons dashicons-yes" aria-hidden="true"></span> <?php esc_html_e( 'Complete', 'natura' ); ?></span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</section>

	<section class="natura-box">
		<h3><?php esc_html_e( 'How well each topic is covered', 'natura' ); ?></h3>
		<?php foreach ( $coverage as $group => $terms ) : ?>
			<h4><?php echo esc_html( $group ); ?></h4>
			<ul class="natura-coverage">
				<?php foreach ( $terms as $term ) : ?>
					<li class="<?php echo $term['count'] >= NATURA_MIN_INDEXED_PLANTS ? 'is-ok' : 'is-thin'; ?>">
						<a href="<?php echo esc_url( $term['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $term['name'] ); ?></a>
						<span>
							<?php
							/* translators: %d: number of guides. */
							echo esc_html( sprintf( _n( '%d guide', '%d guides', $term['count'], 'natura' ), $term['count'] ) );
							if ( $term['count'] < NATURA_MIN_INDEXED_PLANTS ) {
								echo ' · ' . esc_html__( 'Fewer than 6', 'natura' );
							}
							?>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endforeach; ?>
	</section>
	<?php
}
