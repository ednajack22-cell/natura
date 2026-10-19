<?php
/**
 * Plant Care article, e.g. "How often to water container plants".
 *
 * Same layout as a plant guide (inc/guide.php): summary, photo, numbered
 * sections with the shopping list and the Pinterest image between them, a
 * sticky sidebar, and "Read next" (more articles on the same topic first).
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

				<?php natura_the_share_bar( 'share_guides', __( 'Found this useful? Share it', 'natura' ) ); ?>
				<?php natura_the_faq_and_sources(); ?>
				<?php natura_the_author_box(); ?>
				<?php natura_the_read_next(); ?>
			</article>

			<?php natura_the_guide_sidebar(); ?>
		</div>

		<?php
		natura_the_guide_end_ad();
		?>
	</main>
	<?php
endwhile;

get_footer();
