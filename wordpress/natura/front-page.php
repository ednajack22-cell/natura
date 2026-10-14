<?php
/**
 * Home page, from the Stitch "Natura - Mobile Homepage (390px)" screen.
 *
 * Mobile first: most readers come from Pinterest on a phone. Order:
 * hero with a featured guide (Pinterest Save on the photo), what is in season,
 * three ways in, popular guides, one ad, plant problems, affiliate picks,
 * Pinterest ideas, latest articles, newsletter.
 *
 * Money blocks follow wordpress/design/BLUEPRINT.md: one ad only, well below
 * the first answer; affiliate picks come from the guides' own shopping lists,
 * with the disclosure next to them; Pinterest blocks use the guides' real
 * vertical images. Each section appears only when it has content, and
 * nothing is invented.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_plants   = post_type_exists( 'plant' ) ? get_posts(
	array(
		'post_type'      => 'plant',
		'posts_per_page' => 5,
		'no_found_rows'  => true,
	)
) : array();
$natura_problems = post_type_exists( 'problem' ) ? get_posts(
	array(
		'post_type'      => 'problem',
		'posts_per_page' => 3,
		'no_found_rows'  => true,
	)
) : array();
$natura_posts    = get_posts(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'no_found_rows'  => true,
	)
);

// The hero shows the newest guide with a photo; the grid below shows the others.
$natura_hero = null;
foreach ( $natura_plants as $natura_index => $natura_plant ) {
	if ( has_post_thumbnail( $natura_plant ) ) {
		$natura_hero = $natura_plant;
		unset( $natura_plants[ $natura_index ] );
		break;
	}
}
$natura_grid    = array_slice( array_values( $natura_plants ), 0, 4 );
$natura_season  = natura_home_season();
$natura_picks   = natura_home_picks( 3 );
$natura_pins    = natura_home_pins( 6 );
$natura_pin_url = natura_home_setting( 'natura_pinterest_url' );
$natura_signup  = natura_home_setting( 'natura_newsletter_code' );
$natura_counts  = array(
	'plant'   => post_type_exists( 'plant' ) ? (int) wp_count_posts( 'plant' )->publish : 0,
	'problem' => post_type_exists( 'problem' ) ? (int) wp_count_posts( 'problem' )->publish : 0,
);
?>
<main id="main-content" class="home">

	<?php // 1. Hero ?>
	<section class="home-hero">
		<div class="site-container home-hero-inner<?php echo $natura_hero ? ' has-photo' : ''; ?>">
			<div class="home-hero-text">
				<p class="label"><?php esc_html_e( 'Balconies · Patios · Windowsills', 'natura' ); ?></p>
				<h1><?php echo esc_html( natura_home_setting( 'natura_home_title' ) ); ?></h1>
				<p class="home-intro"><?php echo esc_html( natura_home_setting( 'natura_home_intro' ) ); ?></p>
				<?php get_search_form( array( 'natura_context' => 'hero' ) ); ?>
			</div>

			<?php if ( $natura_hero ) : ?>
				<?php
				setup_postdata( $GLOBALS['post'] = $natura_hero ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- restored by wp_reset_postdata() below.
				$natura_hero_pin = natura_pinterest_save_url();
				?>
				<figure class="hero-feature">
					<?php
					the_post_thumbnail(
						'large',
						array(
							'alt'           => '',
							'sizes'         => '(min-width: 1024px) 560px, 100vw',
							'loading'       => 'eager',
							'fetchpriority' => 'high',
						)
					);
					?>
					<figcaption class="hero-feature-caption">
						<span class="label"><?php esc_html_e( 'Featured guide', 'natura' ); ?></span>
						<a class="hero-feature-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</figcaption>
					<?php if ( $natura_hero_pin ) : ?>
						<a class="pin-button pin-button-small" href="<?php echo esc_url( $natura_hero_pin ); ?>" target="_blank" rel="noopener">
							<?php natura_the_icon( 'pin' ); ?>
							<span><?php esc_html_e( 'Save', 'natura' ); ?></span>
							<span class="screen-reader-text"><?php esc_html_e( 'this guide to Pinterest (opens in a new tab)', 'natura' ); ?></span>
						</a>
					<?php endif; ?>
				</figure>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</section>

	<?php // 2. What's in season ?>
	<?php if ( $natura_season ) : ?>
		<section class="season-strip" aria-labelledby="home-season-title">
			<div class="site-container">
				<div class="season-head">
					<h2 id="home-season-title" class="label"><?php esc_html_e( 'What\'s in season', 'natura' ); ?></h2>
					<span><?php esc_html_e( 'Sow and plant now', 'natura' ); ?></span>
				</div>
				<ul class="season-chips">
					<?php foreach ( $natura_season as $natura_item ) : ?>
						<li>
							<?php if ( $natura_item['url'] ) : ?>
								<a href="<?php echo esc_url( $natura_item['url'] ); ?>"><?php echo esc_html( $natura_item['name'] ); ?></a>
							<?php else : ?>
								<span><?php echo esc_html( $natura_item['name'] ); ?></span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php // 3. Three ways in ?>
	<nav class="site-container home-section home-entries" aria-label="<?php esc_attr_e( 'Where to start', 'natura' ); ?>">
		<a class="entry-row" href="<?php echo esc_url( (string) ( get_post_type_archive_link( 'plant' ) ?: home_url( '/plants/' ) ) ); ?>">
			<span class="path-icon"><?php natura_the_icon( 'pot' ); ?></span>
			<span class="entry-text">
				<span class="label"><?php esc_html_e( 'Growing guides', 'natura' ); ?></span>
				<strong><?php esc_html_e( 'Choose a plant', 'natura' ); ?></strong>
				<span>
					<?php
					echo esc_html(
						$natura_counts['plant']
							/* translators: %d: number of plant guides. */
							? sprintf( _n( '%d plant that grows well in a pot.', '%d plants that grow well in pots.', $natura_counts['plant'], 'natura' ), $natura_counts['plant'] )
							: __( 'Plants that grow well in pots.', 'natura' )
					);
					?>
				</span>
			</span>
			<?php natura_the_icon( 'arrow', 'entry-arrow' ); ?>
		</a>
		<a class="entry-row" href="<?php echo esc_url( natura_problems_url() ); ?>">
			<span class="path-icon path-icon-accent"><?php natura_the_icon( 'lens' ); ?></span>
			<span class="entry-text">
				<span class="label"><?php esc_html_e( 'Yellow leaves · Wilting · Pests', 'natura' ); ?></span>
				<strong><?php esc_html_e( 'Solve a problem', 'natura' ); ?></strong>
				<span><?php esc_html_e( 'Find the likely cause from what you can see.', 'natura' ); ?></span>
			</span>
			<?php natura_the_icon( 'arrow', 'entry-arrow' ); ?>
		</a>
		<a class="entry-row" href="<?php echo esc_url( natura_plant_care_url() ); ?>">
			<span class="path-icon"><?php natura_the_icon( 'drop' ); ?></span>
			<span class="entry-text">
				<span class="label"><?php esc_html_e( 'Watering · Compost · Feeding', 'natura' ); ?></span>
				<strong><?php esc_html_e( 'Look after your pots', 'natura' ); ?></strong>
				<span><?php esc_html_e( 'The habits that keep container plants healthy.', 'natura' ); ?></span>
			</span>
			<?php natura_the_icon( 'arrow', 'entry-arrow' ); ?>
		</a>
	</nav>

	<?php // 4. Popular growing guides ?>
	<?php if ( count( $natura_grid ) >= 2 ) : ?>
		<section class="site-container home-section" aria-labelledby="home-guides-title">
			<div class="home-head">
				<h2 id="home-guides-title"><?php esc_html_e( 'Popular growing guides', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"><?php esc_html_e( 'See all plants', 'natura' ); ?></a>
			</div>
			<div class="mini-grid">
				<?php
				foreach ( $natura_grid as $natura_item ) {
					setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					get_template_part( 'template-parts/plant-card-compact' );
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 5. The page's one ad, after the first useful content. ?>
	<div class="site-container home-ad">
		<?php echo natura_ad_slot( __( 'Home page, after the popular guides', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
	</div>

	<?php // 6. Plant problems ?>
	<?php if ( $natura_problems ) : ?>
		<section class="home-doctor" aria-labelledby="home-doctor-title">
			<div class="site-container home-doctor-inner">
				<div class="home-doctor-intro">
					<p class="label"><?php esc_html_e( 'Plant problems', 'natura' ); ?></p>
					<h2 id="home-doctor-title"><?php esc_html_e( 'Something wrong with a plant?', 'natura' ); ?></h2>
					<p class="doctor-subtitle"><?php esc_html_e( 'Start from what you can see', 'natura' ); ?></p>
				</div>
				<ul class="symptom-rows">
					<?php foreach ( $natura_problems as $natura_problem ) : ?>
						<?php
						setup_postdata( $GLOBALS['post'] = $natura_problem ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						$natura_causes = natura_problem_causes();
						?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<span>
									<strong><?php the_title(); ?></strong>
									<?php if ( $natura_causes ) : ?>
										<span>
											<?php
											/* translators: %s: most likely cause. */
											printf( esc_html__( 'Most often: %s', 'natura' ), esc_html( mb_strtolower( $natura_causes[0]['cause'] ) ) );
											?>
										</span>
									<?php endif; ?>
								</span>
								<?php natura_the_icon( 'chevron', 'symptom-chevron' ); ?>
							</a>
						</li>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php // 7. Affiliate picks, from the guides' shopping lists. ?>
	<?php if ( $natura_picks ) : ?>
		<section class="site-container home-section product-box home-picks" aria-labelledby="home-picks-title">
			<p class="label"><?php esc_html_e( 'Our picks', 'natura' ); ?></p>
			<h2 id="home-picks-title"><?php esc_html_e( 'Our picks for balcony growers', 'natura' ); ?></h2>
			<ul class="product-list">
				<?php
				foreach ( $natura_picks as $natura_pick ) {
					natura_the_product_card( $natura_pick );
				}
				?>
			</ul>
			<p class="picks-note">
				<?php
				printf(
					/* translators: %s: link to the disclosure page. */
					esc_html__( 'Affiliate links: we may earn a commission at no extra cost to you. %s', 'natura' ),
					'<a href="' . esc_url( natura_disclosure_url() ) . '">' . esc_html__( 'How we choose products', 'natura' ) . '</a>'
				);
				?>
			</p>
		</section>
	<?php endif; ?>

	<?php // 8. Pinterest ideas, with the guides' vertical images. ?>
	<?php if ( count( $natura_pins ) >= 2 ) : ?>
		<section class="home-pins" aria-labelledby="home-pins-title">
			<div class="site-container">
				<p class="label label-pinterest"><?php natura_the_icon( 'pin' ); ?> <?php esc_html_e( 'Visual guides', 'natura' ); ?></p>
				<h2 id="home-pins-title"><?php esc_html_e( 'Save ideas for later', 'natura' ); ?></h2>
				<ul class="pin-scroller">
					<?php foreach ( $natura_pins as $natura_item ) : ?>
						<li>
							<a href="<?php echo esc_url( get_permalink( $natura_item ) ); ?>">
								<?php echo wp_get_attachment_image( absint( natura_field( 'pin_image', $natura_item->ID ) ), 'medium', false, array( 'alt' => '' ) ); ?>
								<span><?php echo esc_html( get_the_title( $natura_item ) ); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php if ( $natura_pin_url ) : ?>
					<a class="pin-button pin-button-wide home-pins-follow" href="<?php echo esc_url( $natura_pin_url ); ?>" target="_blank" rel="noopener me">
						<?php natura_the_icon( 'pin' ); ?>
						<span><?php esc_html_e( 'Follow Natura on Pinterest', 'natura' ); ?></span>
						<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span>
					</a>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 9. Latest care articles ?>
	<?php if ( $natura_posts ) : ?>
		<section class="site-container home-section" aria-labelledby="home-posts-title">
			<div class="home-head">
				<h2 id="home-posts-title"><?php esc_html_e( 'Latest care articles', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( natura_plant_care_url() ); ?>"><?php esc_html_e( 'All of Plant Care', 'natura' ); ?></a>
			</div>
			<div class="post-grid">
				<?php
				foreach ( $natura_posts as $natura_item ) {
					setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					get_template_part( 'template-parts/post-card' );
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 10. Newsletter ?>
	<?php if ( $natura_signup ) : ?>
		<section class="site-container home-section newsletter-card" aria-labelledby="home-newsletter-title">
			<div>
				<h2 id="home-newsletter-title"><?php esc_html_e( 'Monthly planting reminder', 'natura' ); ?></h2>
				<p><?php echo esc_html( natura_home_setting( 'natura_newsletter_text' ) ); ?></p>
			</div>
			<div class="newsletter-form"><?php echo do_shortcode( $natura_signup ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output of the editor-configured form plugin. ?></div>
		</section>
	<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>
		<section class="site-container home-section newsletter-card follow-placeholder">
			<div>
				<h2><?php esc_html_e( 'Newsletter block (visible to administrators only)', 'natura' ); ?></h2>
				<p><?php esc_html_e( 'Add your email form shortcode under Appearance → Customize → Natura: home page to show the "Monthly planting reminder" signup here. The Pinterest profile address and the "What\'s in season" list are set there too.', 'natura' ); ?></p>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php
get_footer();
