<?php
/**
 * Plant guide: the main landing page from Pinterest and search.
 *
 * Layout from wordpress/design/BLUEPRINT.md (inc/guide.php): the answer first
 * (title, summary, photo, "At a glance"), then the numbered guide with its
 * shopping list and Pinterest image, a sticky sidebar, and, at the end, the
 * problems this plant is prone to and more plants.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_type     = natura_plant_type();
	$natura_facts    = natura_plant_quick_facts();
	$natura_calendar = natura_plant_calendar();
	$natura_crumbs   = natura_plant_breadcrumbs();
	$natura_layout   = natura_guide_inserts( __( 'What you need', 'natura' ) );
	$natura_prepared = natura_prepare_content( (string) apply_filters( 'the_content', get_the_content() ), $natura_layout['inserts'], $natura_layout['keep'] );
	$natura_problems = natura_plant_problems( get_the_ID(), 3 );
	$natura_more     = get_posts(
		array(
			'post_type'      => 'plant',
			'posts_per_page' => 4,
			'post__not_in'   => array( get_the_ID() ),
			'orderby'        => 'rand',
			'no_found_rows'  => true,
		)
	);
	?>
	<main id="main-content" class="guide-page plant-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php
		natura_the_guide_header(
			array(
				'crumbs'    => $natura_crumbs,
				/* translators: %s: plant type, e.g. "Vegetables". */
				'tag'       => $natura_type ? sprintf( __( 'Growing guide · %s', 'natura' ), $natura_type->name ) : __( 'Growing guide', 'natura' ),
				'tag_url'   => $natura_type ? (string) get_term_link( $natura_type ) : '',
				'botanical' => (string) natura_field( 'botanical_name' ),
				'now'       => '',
			)
		);
		?>

		<div class="site-container guide-layout">
			<article <?php post_class( 'guide-main' ); ?>>
				<?php natura_the_guide_photo(); ?>

				<?php natura_the_key_points(); ?>

				<?php if ( $natura_facts && natura_section_enabled( 'guide_glance' ) ) : ?>
					<section class="glance" aria-labelledby="glance-title">
						<h2 id="glance-title"><?php esc_html_e( 'At a glance', 'natura' ); ?></h2>
						<dl class="glance-facts">
							<?php foreach ( $natura_facts as $natura_fact ) : ?>
								<div>
									<dt><?php natura_the_icon( $natura_fact['icon'] ); ?> <?php echo esc_html( $natura_fact['label'] ); ?></dt>
									<dd><?php echo esc_html( $natura_fact['value'] ); ?></dd>
								</div>
							<?php endforeach; ?>
						</dl>
					</section>
				<?php endif; ?>

				<?php natura_the_plant_conditions(); ?>

				<?php natura_the_plant_calendar( $natura_calendar ); ?>

				<?php natura_the_guide_toc( $natura_prepared['toc'] ); ?>

				<div class="entry-content guide-content is-numbered">
					<?php echo $natura_prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content, plus escaped theme markup. ?>
				</div>

				<?php natura_the_varieties(); ?>
				<?php natura_the_share_bar( 'share_guides', __( 'Found this useful? Share it', 'natura' ) ); ?>
				<?php natura_the_faq_and_sources(); ?>
				<?php natura_the_author_box(); ?>
			</article>

			<?php natura_the_guide_sidebar( 'plant' ); ?>
		</div>

		<?php
		natura_the_related( 'plant-problems-title', __( 'Troubleshooting', 'natura' ), __( 'Common problems', 'natura' ), $natura_problems ? $natura_problems->posts : array(), 'template-parts/problem-card', 'problem-grid' );
		natura_the_related( 'plant-related-title', __( 'Keep growing', 'natura' ), __( 'More plants to grow', 'natura' ), $natura_more, 'template-parts/plant-card', 'plant-grid' );
		natura_the_guide_end_ad();
		?>
	</main>
	<?php
endwhile;

get_footer();
