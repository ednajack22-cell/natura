<?php
/**
 * Plant Care article, e.g. "How often to water container plants".
 *
 * Same layout as a plant guide (inc/guide.php): summary, photo, numbered
 * sections with the shopping list and the Pinterest image between them, a
 * sticky sidebar, then more articles on the same topic.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_crumbs   = natura_topic_breadcrumbs();
	$natura_topic    = natura_post_topic();
	$natura_layout   = natura_guide_inserts( __( 'What you need', 'natura' ) );
	$natura_prepared = natura_prepare_content( (string) apply_filters( 'the_content', get_the_content() ), $natura_layout['inserts'], $natura_layout['keep'] );
	$natura_related  = $natura_topic ? get_posts(
		array(
			'post_type'      => 'post',
			'cat'            => $natura_topic->term_id,
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'no_found_rows'  => true,
		)
	) : array();
	?>
	<main id="main-content" class="guide-page article-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php
		natura_the_guide_header(
			array(
				'crumbs'  => $natura_crumbs,
				'tag'     => $natura_topic ? $natura_topic->name : __( 'Plant Care', 'natura' ),
				'tag_url' => $natura_topic ? (string) get_term_link( $natura_topic ) : natura_plant_care_url(),
			)
		);
		?>

		<div class="site-container guide-layout">
			<article <?php post_class( 'guide-main' ); ?>>
				<?php natura_the_guide_photo(); ?>
				<?php natura_the_guide_toc( $natura_prepared['toc'] ); ?>

				<div class="entry-content guide-content is-numbered">
					<?php echo $natura_prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content, plus escaped theme markup. ?>
				</div>

				<?php natura_the_faq_and_sources(); ?>
				<?php natura_the_author_box(); ?>
			</article>

			<?php natura_the_guide_sidebar( 'post' ); ?>
		</div>

		<?php
		if ( $natura_topic ) {
			/* translators: %s: topic, e.g. "watering". */
			natura_the_related( 'article-related-title', __( 'Keep reading', 'natura' ), sprintf( __( 'More on %s', 'natura' ), mb_strtolower( $natura_topic->name ) ), $natura_related, 'template-parts/post-card', 'post-grid' );
		}
		natura_the_guide_end_ad();
		?>
	</main>
	<?php
endwhile;

get_footer();
