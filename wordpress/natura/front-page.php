<?php
/**
 * Home page.
 *
 * Short on purpose: most readers arrive deep in the site from Pinterest or
 * search, and come here to find a second guide. So the page answers "where is
 * the thing I want?" fast: a search field, plant types, guides, then the
 * latest care articles. Sections without content are not shown, and no link
 * appears twice.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_types  = natura_home_plant_types();
$natura_plants = post_type_exists( 'plant' ) ? new WP_Query(
	array(
		'post_type'           => 'plant',
		'posts_per_page'      => 8,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
) : null;
$natura_posts  = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
$natura_collage = $natura_plants ? array_slice( array_filter( array_map( 'get_post_thumbnail_id', wp_list_pluck( $natura_plants->posts, 'ID' ) ) ), 0, 3 ) : array();
$natura_pin     = natura_home_setting( 'natura_pinterest_url' );
$natura_signup  = natura_home_setting( 'natura_newsletter_code' );
?>
<main id="main-content" class="home">
	<section class="home-hero">
		<div class="site-container home-hero-inner<?php echo count( $natura_collage ) === 3 ? ' has-collage' : ''; ?>">
			<div class="home-hero-text">
				<h1><?php echo esc_html( natura_home_setting( 'natura_home_title' ) ); ?></h1>
				<p class="home-intro"><?php echo esc_html( natura_home_setting( 'natura_home_intro' ) ); ?></p>
				<?php get_search_form( array( 'natura_context' => 'hero' ) ); ?>
			</div>
			<?php if ( count( $natura_collage ) === 3 ) : ?>
				<div class="home-collage" aria-hidden="true">
					<?php foreach ( $natura_collage as $natura_index => $natura_image_id ) : ?>
						<?php
						echo wp_get_attachment_image(
							$natura_image_id,
							'natura-card',
							false,
							array(
								'alt'           => '',
								'sizes'         => '(min-width: 1024px) 260px, 1px',
								'loading'       => 0 === $natura_index ? 'eager' : 'lazy',
								'fetchpriority' => 0 === $natura_index ? 'high' : 'auto',
							)
						);
						?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( count( $natura_types ) > 1 ) : ?>
		<section class="site-container home-section" aria-labelledby="home-types-title">
			<h2 id="home-types-title"><?php esc_html_e( 'What do you want to grow?', 'natura' ); ?></h2>
			<div class="type-tiles">
				<?php foreach ( $natura_types as $natura_type ) : ?>
					<a class="type-tile" href="<?php echo esc_url( (string) get_term_link( $natura_type['term'] ) ); ?>">
						<?php if ( $natura_type['image_id'] ) : ?>
							<?php echo wp_get_attachment_image( $natura_type['image_id'], 'natura-card', false, array( 'alt' => '', 'sizes' => '(min-width: 1024px) 400px, 50vw' ) ); ?>
						<?php endif; ?>
						<span class="type-tile-text">
							<strong><?php echo esc_html( $natura_type['term']->name ); ?></strong>
							<small>
								<?php
								/* translators: %d: number of guides. */
								printf( esc_html( _n( '%d guide', '%d guides', $natura_type['term']->count, 'natura' ) ), (int) $natura_type['term']->count );
								?>
							</small>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $natura_plants && $natura_plants->have_posts() ) : ?>
		<section class="site-container home-section" aria-labelledby="home-plants-title">
			<div class="section-heading">
				<h2 id="home-plants-title"><?php esc_html_e( 'Plant growing guides', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"><?php esc_html_e( 'See all plants', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
			</div>
			<div class="plant-grid">
				<?php
				while ( $natura_plants->have_posts() ) :
					$natura_plants->the_post();
					get_template_part( 'template-parts/plant-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

	<div class="site-container">
		<?php echo natura_ad_slot( __( 'Home page, after the plant guides', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
	</div>

	<?php if ( $natura_posts->have_posts() ) : ?>
		<section class="site-container home-section" aria-labelledby="home-posts-title">
			<div class="section-heading">
				<h2 id="home-posts-title"><?php esc_html_e( 'Latest from Plant Care', 'natura' ); ?></h2>
				<?php if ( get_option( 'page_for_posts' ) ) : ?>
					<a class="text-link" href="<?php echo esc_url( (string) get_permalink( (int) get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'All articles', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="post-grid">
				<?php
				while ( $natura_posts->have_posts() ) :
					$natura_posts->the_post();
					get_template_part( 'template-parts/post-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $natura_pin || $natura_signup || current_user_can( 'edit_theme_options' ) ) : ?>
		<section class="site-container home-section home-follow">
			<?php if ( $natura_signup ) : ?>
				<div class="follow-card follow-newsletter">
					<h2><?php esc_html_e( 'Monthly planting reminder', 'natura' ); ?></h2>
					<p><?php echo esc_html( natura_home_setting( 'natura_newsletter_text' ) ); ?></p>
					<?php echo do_shortcode( $natura_signup ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output of the editor-configured form plugin. ?>
				</div>
			<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>
				<div class="follow-card follow-placeholder">
					<h2><?php esc_html_e( 'Newsletter block (visible to administrators only)', 'natura' ); ?></h2>
					<p><?php esc_html_e( 'Add your email form shortcode under Appearance → Customize → Natura: home page to show a "Monthly planting reminder" signup here.', 'natura' ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( $natura_pin ) : ?>
				<div class="follow-card follow-pinterest">
					<?php natura_the_icon( 'pin' ); ?>
					<h2><?php esc_html_e( 'Ideas for your balcony, every week', 'natura' ); ?></h2>
					<p><?php esc_html_e( 'Planting plans, small-space layouts, and quick fixes, saved to boards you can come back to.', 'natura' ); ?></p>
					<a class="button button-pinterest" href="<?php echo esc_url( $natura_pin ); ?>" target="_blank" rel="noopener me">
						<?php esc_html_e( 'Follow on Pinterest', 'natura' ); ?>
						<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span>
					</a>
				</div>
			<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>
				<div class="follow-card follow-placeholder">
					<h2><?php esc_html_e( 'Pinterest block (visible to administrators only)', 'natura' ); ?></h2>
					<p><?php esc_html_e( 'Add your Pinterest profile address under Appearance → Customize → Natura: home page to show a "Follow on Pinterest" block here.', 'natura' ); ?></p>
				</div>
			<?php endif; ?>
		</section>
	<?php endif; ?>
</main>
<?php
get_footer();
