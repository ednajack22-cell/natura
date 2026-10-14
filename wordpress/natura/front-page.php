<?php
/**
 * Home page, after the Stitch "Botanical Editorial" mock-up.
 *
 * Most readers arrive deep in the site from Pinterest or search, and come here
 * to find a second guide. So the page answers "where is the thing I want?":
 * three ways in (grow, fix, look after), the guides, the problem guides, the
 * latest care articles, then every subject. Sections without content are not
 * shown, no link appears twice, and nothing is invented: no statistics, no
 * badges, no experts the site does not have.
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
		'posts_per_page' => 6,
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

// The hero photo is the newest guide with a photo; it links to that guide,
// which is then left out of the lists below.
$natura_hero = null;
foreach ( $natura_plants as $natura_index => $natura_plant ) {
	if ( has_post_thumbnail( $natura_plant ) ) {
		$natura_hero = $natura_plant;
		unset( $natura_plants[ $natura_index ] );
		break;
	}
}
$natura_plants   = array_values( $natura_plants );
$natura_featured = array_shift( $natura_plants );
$natura_side     = array_slice( $natura_plants, 0, 3 );

$natura_counts = array(
	'plant'   => post_type_exists( 'plant' ) ? (int) wp_count_posts( 'plant' )->publish : 0,
	'problem' => post_type_exists( 'problem' ) ? (int) wp_count_posts( 'problem' )->publish : 0,
	'post'    => (int) wp_count_posts( 'post' )->publish,
);
$natura_subjects = natura_home_subjects();
$natura_pin      = natura_home_setting( 'natura_pinterest_url' );
$natura_signup   = natura_home_setting( 'natura_newsletter_code' );
?>
<main id="main-content" class="home">
	<section class="home-hero">
		<div class="site-container home-hero-inner<?php echo $natura_hero ? ' has-photo' : ''; ?>">
			<div class="home-hero-text">
				<p class="tag"><?php esc_html_e( 'Balconies · Patios · Windowsills', 'natura' ); ?></p>
				<h1><?php echo esc_html( natura_home_setting( 'natura_home_title' ) ); ?></h1>
				<p class="home-intro"><?php echo esc_html( natura_home_setting( 'natura_home_intro' ) ); ?></p>
				<?php get_search_form( array( 'natura_context' => 'hero' ) ); ?>
			</div>

			<?php if ( $natura_hero ) : ?>
				<a class="hero-feature" href="<?php echo esc_url( get_permalink( $natura_hero ) ); ?>">
					<?php
					echo get_the_post_thumbnail(
						$natura_hero,
						'large',
						array(
							'alt'           => '',
							'sizes'         => '(min-width: 1024px) 560px, 100vw',
							'loading'       => 'eager',
							'fetchpriority' => 'high',
						)
					);
					?>
					<span class="hero-feature-caption">
						<span class="label"><?php esc_html_e( 'Featured guide', 'natura' ); ?></span>
						<strong><?php echo esc_html( get_the_title( $natura_hero ) ); ?></strong>
						<?php $natura_hero_sun = (string) natura_field( 'sun', $natura_hero->ID ); ?>
						<?php if ( $natura_hero_sun ) : ?>
							<span><?php echo esc_html( $natura_hero_sun ); ?></span>
						<?php endif; ?>
					</span>
				</a>
			<?php endif; ?>
		</div>
	</section>

	<section class="home-band" aria-labelledby="home-paths-title">
		<div class="site-container">
			<div class="section-intro">
				<div>
					<p class="label"><?php esc_html_e( 'Start here', 'natura' ); ?></p>
					<h2 id="home-paths-title"><?php esc_html_e( 'Three ways to a healthier balcony', 'natura' ); ?></h2>
				</div>
				<p><?php esc_html_e( 'Pick a plant that suits your space, find out what is wrong with one, or learn the habits that keep pots thriving.', 'natura' ); ?></p>
			</div>
			<div class="path-grid">
				<a class="path-card" href="<?php echo esc_url( (string) ( get_post_type_archive_link( 'plant' ) ?: home_url( '/plants/' ) ) ); ?>">
					<span class="path-icon"><?php natura_the_icon( 'pot' ); ?></span>
					<span class="label"><?php esc_html_e( 'Growing guides', 'natura' ); ?></span>
					<strong><?php esc_html_e( 'Choose a plant', 'natura' ); ?></strong>
					<span class="path-text"><?php esc_html_e( 'Vegetables, herbs, and fruit that crop well in containers, with the pot size, sun, and watering each one needs.', 'natura' ); ?></span>
					<span class="path-more">
						<?php
						echo esc_html(
							$natura_counts['plant']
								/* translators: %d: number of plant guides. */
								? sprintf( _n( 'Browse %d plant guide', 'Browse %d plant guides', $natura_counts['plant'], 'natura' ), $natura_counts['plant'] )
								: __( 'Browse the plant guides', 'natura' )
						);
						?>
						<?php natura_the_icon( 'arrow' ); ?>
					</span>
				</a>
				<a class="path-card path-card-accent" href="<?php echo esc_url( natura_problems_url() ); ?>">
					<span class="path-icon"><?php natura_the_icon( 'lens' ); ?></span>
					<span class="label"><?php esc_html_e( 'Problem guides', 'natura' ); ?></span>
					<strong><?php esc_html_e( 'Solve a problem', 'natura' ); ?></strong>
					<span class="path-text"><?php esc_html_e( 'Yellow leaves, wilting, or fruit that will not ripen: the likely causes, how to tell them apart, and what to do.', 'natura' ); ?></span>
					<span class="path-more">
						<?php
						echo esc_html(
							$natura_counts['problem']
								/* translators: %d: number of problem guides. */
								? sprintf( _n( 'See %d plant problem', 'See %d plant problems', $natura_counts['problem'], 'natura' ), $natura_counts['problem'] )
								: __( 'See the plant problems', 'natura' )
						);
						?>
						<?php natura_the_icon( 'arrow' ); ?>
					</span>
				</a>
				<a class="path-card" href="<?php echo esc_url( natura_plant_care_url() ); ?>">
					<span class="path-icon"><?php natura_the_icon( 'drop' ); ?></span>
					<span class="label"><?php esc_html_e( 'Plant care', 'natura' ); ?></span>
					<strong><?php esc_html_e( 'Look after your pots', 'natura' ); ?></strong>
					<span class="path-text"><?php esc_html_e( 'Watering, compost and feeding, light and position, and what changes through the seasons.', 'natura' ); ?></span>
					<span class="path-more"><?php esc_html_e( 'Read the care guides', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
				</a>
			</div>
		</div>
	</section>

	<?php if ( $natura_featured ) : ?>
		<section class="site-container home-section" aria-labelledby="home-guides-title">
			<div class="section-bar">
				<h2 id="home-guides-title"><?php esc_html_e( 'Plant growing guides', 'natura' ); ?></h2>
			</div>
			<div class="feature-layout<?php echo $natura_side ? '' : ' is-single'; ?>">
				<?php
				setup_postdata( $GLOBALS['post'] = $natura_featured ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				get_template_part( 'template-parts/feature-card', null, array( 'size' => 'large' ) );
				?>
				<?php if ( $natura_side ) : ?>
					<div class="feature-list">
						<?php
						foreach ( $natura_side as $natura_item ) {
							setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
							get_template_part( 'template-parts/feature-card', null, array( 'size' => 'small' ) );
						}
						?>
					</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif; ?>

	<div class="site-container">
		<?php echo natura_ad_slot( __( 'Home page, after the plant guides', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
	</div>

	<?php if ( $natura_problems ) : ?>
		<section class="site-container home-section" aria-labelledby="home-doctor-title">
			<div class="doctor-panel">
				<div class="doctor-intro">
					<p class="tag tag-dark"><?php natura_the_icon( 'lens' ); ?> <?php esc_html_e( 'Plant problems', 'natura' ); ?></p>
					<h2 id="home-doctor-title"><?php esc_html_e( 'Something wrong with a plant?', 'natura' ); ?></h2>
					<p class="doctor-subtitle"><?php esc_html_e( 'Start from what you can see.', 'natura' ); ?></p>
					<p><?php esc_html_e( 'Each guide lists the likely causes in order, the clue that points to each one, how to confirm it, and what to do. Check before you spray or feed: most problems in pots come down to water.', 'natura' ); ?></p>
				</div>
				<div class="doctor-card">
					<p class="label"><?php esc_html_e( 'Choose the closest match', 'natura' ); ?></p>
					<ul class="symptom-grid">
						<?php foreach ( $natura_problems as $natura_problem ) : ?>
							<li>
								<a href="<?php echo esc_url( get_permalink( $natura_problem ) ); ?>">
									<strong><?php echo esc_html( get_the_title( $natura_problem ) ); ?></strong>
									<?php if ( has_excerpt( $natura_problem ) ) : ?>
										<span><?php echo esc_html( wp_trim_words( get_the_excerpt( $natura_problem ), 14 ) ); ?></span>
									<?php endif; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $natura_posts ) : ?>
		<section class="site-container home-section" aria-labelledby="home-posts-title">
			<div class="section-intro">
				<div>
					<p class="label"><?php esc_html_e( 'Plant care', 'natura' ); ?></p>
					<h2 id="home-posts-title"><?php esc_html_e( 'Latest care articles', 'natura' ); ?></h2>
				</div>
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

	<?php if ( count( $natura_subjects ) > 1 ) : ?>
		<section class="home-band home-section" aria-labelledby="home-subjects-title">
			<div class="site-container">
				<div class="section-intro">
					<div>
						<p class="label"><?php esc_html_e( 'Browse', 'natura' ); ?></p>
						<h2 id="home-subjects-title"><?php esc_html_e( 'Browse by subject', 'natura' ); ?></h2>
					</div>
				</div>
				<ul class="subject-grid">
					<?php foreach ( $natura_subjects as $natura_subject ) : ?>
						<li>
							<a href="<?php echo esc_url( $natura_subject['url'] ); ?>">
								<span class="path-icon"><?php natura_the_icon( $natura_subject['icon'] ); ?></span>
								<strong><?php echo esc_html( $natura_subject['name'] ); ?></strong>
								<span><?php echo esc_html( $natura_subject['count'] ); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $natura_pin || $natura_signup || current_user_can( 'edit_theme_options' ) ) : ?>
		<section class="site-container home-section home-follow">
			<?php if ( $natura_signup ) : ?>
				<div class="follow-card follow-newsletter">
					<div>
						<p class="label"><?php esc_html_e( 'Once a month', 'natura' ); ?></p>
						<h2><?php esc_html_e( 'Monthly planting reminder', 'natura' ); ?></h2>
						<p><?php echo esc_html( natura_home_setting( 'natura_newsletter_text' ) ); ?></p>
					</div>
					<div class="follow-form"><?php echo do_shortcode( $natura_signup ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output of the editor-configured form plugin. ?></div>
				</div>
			<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>
				<div class="follow-card follow-placeholder">
					<h2><?php esc_html_e( 'Newsletter block (visible to administrators only)', 'natura' ); ?></h2>
					<p><?php esc_html_e( 'Add your email form shortcode under Appearance → Customize → Natura: home page to show a "Monthly planting reminder" signup here.', 'natura' ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( $natura_pin ) : ?>
				<div class="follow-card follow-pinterest">
					<div>
						<p class="label"><?php esc_html_e( 'Pinterest', 'natura' ); ?></p>
						<h2><?php esc_html_e( 'Ideas for your balcony, every week', 'natura' ); ?></h2>
						<p><?php esc_html_e( 'Planting plans, small-space layouts, and quick fixes, saved to boards you can come back to.', 'natura' ); ?></p>
					</div>
					<a class="button button-pinterest" href="<?php echo esc_url( $natura_pin ); ?>" target="_blank" rel="noopener me">
						<?php natura_the_icon( 'pin' ); ?>
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
