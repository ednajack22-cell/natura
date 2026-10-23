<?php
/**
 * Place guide, e.g. "How to grow food on a balcony" (/small-spaces/balconies/).
 *
 * The article layout (inc/guide.php): summary, photo, numbered sections, a
 * sticky sidebar, FAQ and sources. Then, across the page, the plant guides
 * that suit the place and the existing guides chosen for it (inc/spaces.php).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_crumbs   = natura_space_breadcrumbs( true );
	$natura_layout   = natura_guide_inserts( __( 'What you need', 'natura' ) );
	$natura_prepared = natura_prepare_content( (string) apply_filters( 'the_content', get_the_content() ), $natura_layout['inserts'], $natura_layout['keep'] );
	?>
	<main id="main-content" class="guide-page article-page space-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php
		natura_the_guide_header(
			array(
				'crumbs'  => $natura_crumbs,
				'tag'     => __( 'Small Spaces', 'natura' ),
				'tag_url' => (string) get_post_type_archive_link( 'space' ),
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

		<?php natura_the_space_plants( (int) get_the_ID() ); ?>
		<?php natura_the_space_related( (int) get_the_ID() ); ?>
		<?php natura_the_guide_end_ad(); ?>
	</main>
	<?php
endwhile;

get_footer();
