<?php
/**
 * Home page, from the review of twelve gardening home pages
 * (design/benchmark/, summed up in design/BLUEPRINT.md). The content sites
 * that lead the niche (Gerbeaud, Gardening Know How, GrowVeg, Balcony Garden
 * Web, Gardeners' World) share a few rules, followed here:
 *
 * - one large photo per section, for the lead story; elsewhere medium cards
 *   (photo above, title below) and lists with small thumbnails;
 * - topics as text buttons, not photo tiles;
 * - colour bands to separate sections, and little empty space.
 *
 * Order: opening band (title, search, photo), topic bar, new on Natura (lead
 * guide and a list), this month, more growing guides, the page's one ad,
 * plant problems, affiliate picks, Pinterest ideas, more Plant Care
 * articles, who writes Natura and the newsletter. Each section appears only
 * when it has content, and nothing is invented.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_plants   = post_type_exists( 'plant' ) ? get_posts(
	array(
		'post_type'      => 'plant',
		'posts_per_page' => 9,
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
		'posts_per_page' => 6,
		'no_found_rows'  => true,
	)
);

// New on Natura: the newest plant guide with a photo leads; the list beside it
// shows the next newest plant guides and articles (problems have their own band).
$natura_lead = null;
foreach ( $natura_plants as $natura_plant ) {
	if ( has_post_thumbnail( $natura_plant ) ) {
		$natura_lead = $natura_plant;
		break;
	}
}
$natura_others = array_values(
	array_filter(
		array_merge( $natura_plants, $natura_posts ),
		static fn( WP_Post $item ): bool => ! $natura_lead || $item->ID !== $natura_lead->ID
	)
);
usort( $natura_others, static fn( WP_Post $a, WP_Post $b ): int => strcmp( $b->post_date, $a->post_date ) );
$natura_list  = array_slice( $natura_others, 0, 4 );
$natura_shown = array_merge( array( $natura_lead ? $natura_lead->ID : 0 ), wp_list_pluck( $natura_list, 'ID' ) );

// Further down, only what the list did not already show.
$natura_more_plants = array_slice( array_values( array_filter( $natura_plants, static fn( WP_Post $item ): bool => ! in_array( $item->ID, $natura_shown, true ) ) ), 0, 4 );
$natura_more_posts  = array_slice( array_values( array_filter( $natura_posts, static fn( WP_Post $item ): bool => ! in_array( $item->ID, $natura_shown, true ) ) ), 0, 3 );

$natura_hero_photo = natura_home_hero_photo();
if ( ! $natura_hero_photo && $natura_lead ) {
	$natura_hero_photo = (int) get_post_thumbnail_id( $natura_lead );
}

$natura_month   = natura_home_this_month();
$natura_topics  = natura_home_topics( 8 );
$natura_author  = natura_home_author();
$natura_picks   = natura_home_picks( 3 );
$natura_pins    = natura_home_pins( 5 );
$natura_pin_url = natura_home_setting( 'natura_pinterest_url' );
$natura_signup  = natura_home_setting( 'natura_newsletter_code' );
?>
<main id="main-content" class="home">
	<?php echo natura_home_structured_data(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>

	<?php // 1. Opening band: the promise and the search on the left, a real photo on the right. ?>
	<section class="home-hero<?php echo $natura_hero_photo ? ' has-photo' : ''; ?>">
		<div class="home-hero-text">
			<div class="home-hero-inner">
				<p class="label"><?php esc_html_e( 'Balconies · Patios · Windowsills', 'natura' ); ?></p>
				<h1><?php echo esc_html( natura_home_setting( 'natura_home_title' ) ); ?></h1>
				<p class="home-intro"><?php echo esc_html( natura_home_setting( 'natura_home_intro' ) ); ?></p>
				<?php get_search_form( array( 'natura_context' => 'hero' ) ); ?>
			</div>
		</div>
		<?php if ( $natura_hero_photo ) : ?>
			<div class="home-hero-media">
				<?php
				echo wp_get_attachment_image(
					$natura_hero_photo,
					'large',
					false,
					array(
						'alt'           => '',
						'sizes'         => '(min-width: 1024px) 50vw, 100vw',
						'loading'       => 'eager',
						'fetchpriority' => 'high',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</section>

	<?php // 2. Topic bar: text buttons with the number of guides. ?>
	<?php if ( count( $natura_topics ) >= 2 ) : ?>
		<nav class="topic-bar" aria-label="<?php esc_attr_e( 'Browse by topic', 'natura' ); ?>">
			<div class="site-container">
				<ul>
					<?php foreach ( $natura_topics as $natura_topic ) : ?>
						<li>
							<a href="<?php echo esc_url( $natura_topic['url'] ); ?>">
								<?php natura_the_icon( $natura_topic['icon'] ); ?>
								<span><?php echo esc_html( $natura_topic['name'] ); ?></span>
								<small><?php echo esc_html( number_format_i18n( $natura_topic['count'] ) ); ?></small>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</nav>
	<?php endif; ?>

	<?php // 3. New on Natura: one lead guide with a large photo, the next ones as a list. ?>
	<?php if ( $natura_lead ) : ?>
		<section class="site-container home-section" aria-labelledby="home-new-title">
			<div class="home-head">
				<h2 id="home-new-title"><?php esc_html_e( 'New on Natura', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"><?php esc_html_e( 'All plant guides', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
			</div>
			<div class="lead-layout<?php echo $natura_list ? ' has-list' : ''; ?>">
				<?php
				setup_postdata( $GLOBALS['post'] = $natura_lead ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- restored by wp_reset_postdata() below.
				$natura_lead_pin = natura_pinterest_save_url();
				?>
				<article class="lead-card">
					<div class="lead-card-media">
						<?php the_post_thumbnail( 'large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 720px, 100vw' ) ); ?>
						<?php if ( $natura_lead_pin ) : ?>
							<a class="pin-button pin-button-small" href="<?php echo esc_url( $natura_lead_pin ); ?>" target="_blank" rel="noopener">
								<?php natura_the_icon( 'pin' ); ?>
								<span><?php esc_html_e( 'Save', 'natura' ); ?></span>
								<span class="screen-reader-text"><?php esc_html_e( 'this guide to Pinterest (opens in a new tab)', 'natura' ); ?></span>
							</a>
						<?php endif; ?>
					</div>
					<p class="label"><?php echo esc_html( natura_home_kicker( $natura_lead ) ); ?></p>
					<h3><a class="lead-card-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if ( has_excerpt() ) : ?>
						<p class="lead-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
					<?php endif; ?>
				</article>
				<?php wp_reset_postdata(); ?>

				<?php if ( $natura_list ) : ?>
					<ul class="thumb-list">
						<?php foreach ( $natura_list as $natura_item ) : ?>
							<li>
								<a href="<?php echo esc_url( get_permalink( $natura_item ) ); ?>">
									<?php if ( has_post_thumbnail( $natura_item ) ) : ?>
										<?php echo get_the_post_thumbnail( $natura_item, 'thumbnail', array( 'alt' => '' ) ); ?>
									<?php endif; ?>
									<span>
										<span class="label"><?php echo esc_html( natura_home_kicker( $natura_item ) ); ?></span>
										<strong><?php echo esc_html( get_the_title( $natura_item ) ); ?></strong>
									</span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 4. This month: from the guides' planting calendars, plus Customizer extras. ?>
	<?php if ( $natura_month['groups'] ) : ?>
		<section class="home-season" aria-labelledby="home-season-title">
			<div class="site-container season-layout">
				<div class="season-intro">
					<p class="label"><?php esc_html_e( 'What to do now', 'natura' ); ?></p>
					<h2 id="home-season-title">
						<?php
						/* translators: %s: month name, e.g. "October". */
						printf( esc_html__( 'In your pots this %s', 'natura' ), esc_html( $natura_month['month'] ) );
						?>
					</h2>
					<p><?php esc_html_e( 'For a temperate climate such as the UK or northern Europe. Each guide has its own planting calendar.', 'natura' ); ?></p>
				</div>
				<?php foreach ( $natura_month['groups'] as $natura_group ) : ?>
					<div class="season-column">
						<h3><span class="season-badge season-badge-<?php echo esc_attr( $natura_group['key'] ); ?>"><?php echo esc_html( $natura_group['label'] ); ?></span></h3>
						<ul<?php echo 'also' === $natura_group['key'] ? ' class="season-chips"' : ''; ?>>
							<?php foreach ( $natura_group['items'] as $natura_item ) : ?>
								<li>
									<?php if ( $natura_item['url'] ) : ?>
										<a href="<?php echo esc_url( $natura_item['url'] ); ?>">
									<?php else : ?>
										<span class="season-item">
									<?php endif; ?>
										<?php
										if ( $natura_item['image'] ) {
											echo wp_get_attachment_image( $natura_item['image'], 'thumbnail', false, array( 'alt' => '' ) );
										}
										?>
										<span><?php echo esc_html( $natura_item['name'] ); ?></span>
									<?php echo $natura_item['url'] ? '</a>' : '</span>'; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 5. More growing guides: medium cards, photo above the title. ?>
	<?php if ( count( $natura_more_plants ) >= 2 ) : ?>
		<section class="site-container home-section" aria-labelledby="home-guides-title">
			<div class="home-head">
				<h2 id="home-guides-title"><?php esc_html_e( 'More growing guides', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"><?php esc_html_e( 'See all plants', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
			</div>
			<div class="mini-grid">
				<?php
				foreach ( $natura_more_plants as $natura_item ) {
					setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					get_template_part( 'template-parts/plant-card-compact' );
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 6. The page's one ad, after the first useful content. ?>
	<div class="site-container home-ad">
		<?php echo natura_ad_slot( __( 'Home page, after the guides', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
	</div>

	<?php // 7. Plant problems ?>
	<?php if ( $natura_problems ) : ?>
		<section class="home-doctor" aria-labelledby="home-doctor-title">
			<div class="site-container home-doctor-inner">
				<div class="home-doctor-intro">
					<p class="label"><?php esc_html_e( 'Plant problems', 'natura' ); ?></p>
					<h2 id="home-doctor-title"><?php esc_html_e( 'Something wrong with a plant?', 'natura' ); ?></h2>
					<p class="doctor-subtitle"><?php esc_html_e( 'Start from what you can see: each guide lists the likely causes, how to check them, and what to do.', 'natura' ); ?></p>
					<a class="button button-light" href="<?php echo esc_url( natura_problems_url() ); ?>"><?php esc_html_e( 'All plant problems', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
				</div>
				<ul class="symptom-rows">
					<?php foreach ( $natura_problems as $natura_problem ) : ?>
						<?php
						setup_postdata( $GLOBALS['post'] = $natura_problem ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						$natura_causes = natura_problem_causes();
						?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<span class="symptom-photo"><?php the_post_thumbnail( 'thumbnail', array( 'alt' => '' ) ); ?></span>
								<?php endif; ?>
								<span class="symptom-text">
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

	<?php // 8. Affiliate picks, from the guides' shopping lists; disclosure before the first link. ?>
	<?php if ( $natura_picks ) : ?>
		<section class="site-container home-section home-picks" aria-labelledby="home-picks-title">
			<div class="home-head">
				<div>
					<p class="label"><?php esc_html_e( 'Our picks', 'natura' ); ?></p>
					<h2 id="home-picks-title"><?php esc_html_e( 'What we use on a small balcony', 'natura' ); ?></h2>
				</div>
				<p class="picks-note">
					<?php
					printf(
						/* translators: %s: link to the disclosure page. */
						esc_html__( 'Affiliate links: we may earn a commission at no extra cost to you. %s', 'natura' ),
						'<a href="' . esc_url( natura_disclosure_url() ) . '">' . esc_html__( 'How we choose products', 'natura' ) . '</a>'
					);
					?>
				</p>
			</div>
			<ul class="product-list">
				<?php
				foreach ( $natura_picks as $natura_pick ) {
					natura_the_product_card( $natura_pick );
				}
				?>
			</ul>
		</section>
	<?php endif; ?>

	<?php // 9. Pinterest ideas, with the guides' vertical images. ?>
	<?php if ( count( $natura_pins ) >= 2 ) : ?>
		<section class="home-pins" aria-labelledby="home-pins-title">
			<div class="site-container home-pins-inner">
				<div class="home-pins-intro">
					<p class="label label-pinterest"><?php natura_the_icon( 'pin' ); ?> <?php esc_html_e( 'Visual guides', 'natura' ); ?></p>
					<h2 id="home-pins-title"><?php esc_html_e( 'Save ideas for later', 'natura' ); ?></h2>
					<p><?php esc_html_e( 'Each guide has a one-page summary made for your Pinterest boards.', 'natura' ); ?></p>
					<?php if ( $natura_pin_url ) : ?>
						<a class="pin-button home-pins-follow" href="<?php echo esc_url( $natura_pin_url ); ?>" target="_blank" rel="noopener me">
							<?php natura_the_icon( 'pin' ); ?>
							<span><?php esc_html_e( 'Follow Natura on Pinterest', 'natura' ); ?></span>
							<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span>
						</a>
					<?php endif; ?>
				</div>
				<ul class="pin-scroller">
					<?php foreach ( $natura_pins as $natura_item ) : ?>
						<li>
							<a href="<?php echo esc_url( get_permalink( $natura_item ) ); ?>">
								<?php echo wp_get_attachment_image( absint( natura_field( 'pin_image', $natura_item->ID ) ), 'medium', false, array( 'alt' => '', 'sizes' => '(min-width: 1024px) 200px, 45vw' ) ); ?>
								<span><?php echo esc_html( get_the_title( $natura_item ) ); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php // 10. More Plant Care articles (those the list above did not show). ?>
	<?php if ( count( $natura_more_posts ) >= 2 ) : ?>
		<section class="site-container home-section" aria-labelledby="home-posts-title">
			<div class="home-head">
				<h2 id="home-posts-title"><?php esc_html_e( 'More from Plant Care', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( natura_plant_care_url() ); ?>"><?php esc_html_e( 'All of Plant Care', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
			</div>
			<div class="post-grid">
				<?php
				foreach ( $natura_more_posts as $natura_item ) {
					setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					get_template_part( 'template-parts/post-card' );
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 11. Who writes Natura (a real person, for readers and for Google) and the newsletter. ?>
	<?php if ( $natura_author || $natura_signup ) : ?>
		<section class="home-closing">
			<div class="site-container home-closing-inner<?php echo ( $natura_author && $natura_signup ) ? ' has-two' : ''; ?>">
				<?php if ( $natura_author ) : ?>
					<div class="author-card" aria-labelledby="home-author-title">
						<?php if ( $natura_author['photo'] ) : ?>
							<?php echo wp_get_attachment_image( $natura_author['photo'], 'thumbnail', false, array( 'class' => 'author-card-photo', 'alt' => '' ) ); ?>
						<?php else : ?>
							<span class="avatar avatar-large" aria-hidden="true"><?php echo esc_html( mb_strtoupper( mb_substr( $natura_author['name'], 0, 1 ) ) ); ?></span>
						<?php endif; ?>
						<div>
							<p class="label"><?php esc_html_e( 'Who writes Natura', 'natura' ); ?></p>
							<h2 id="home-author-title"><?php echo esc_html( $natura_author['name'] ); ?></h2>
							<?php if ( $natura_author['role'] ) : ?>
								<p class="author-card-role"><?php echo esc_html( $natura_author['role'] ); ?></p>
							<?php endif; ?>
							<p><?php echo esc_html( $natura_author['bio'] ); ?></p>
							<?php if ( $natura_author['url'] ) : ?>
								<a class="text-link" href="<?php echo esc_url( $natura_author['url'] ); ?>"><?php esc_html_e( 'How we write and test our guides', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $natura_signup ) : ?>
					<div class="newsletter-card" aria-labelledby="home-newsletter-title">
						<div>
							<p class="label"><?php esc_html_e( 'Newsletter', 'natura' ); ?></p>
							<h2 id="home-newsletter-title"><?php esc_html_e( 'Monthly planting reminder', 'natura' ); ?></h2>
							<p><?php echo esc_html( natura_home_setting( 'natura_newsletter_text' ) ); ?></p>
						</div>
						<div class="newsletter-form"><?php echo do_shortcode( $natura_signup ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output of the editor-configured form plugin. ?></div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php
	// Administrators only: what is still missing, in one line rather than empty boxes.
	if ( current_user_can( 'edit_theme_options' ) ) {
		$natura_missing = array_filter(
			array(
				$natura_author ? '' : __( 'Who writes Natura', 'natura' ),
				$natura_signup ? '' : __( 'Newsletter form', 'natura' ),
				$natura_pin_url ? '' : __( 'Pinterest profile', 'natura' ),
				natura_home_hero_photo() ? '' : __( 'Opening photo', 'natura' ),
			)
		);
		if ( $natura_missing ) {
			printf(
				'<p class="site-container admin-note">%1$s <a href="%2$s">%3$s</a></p>',
				esc_html(
					sprintf(
						/* translators: %s: list of home page settings. */
						__( 'Visible to administrators only. Hidden until you fill them in: %s.', 'natura' ),
						implode( ', ', $natura_missing )
					)
				),
				esc_url( admin_url( 'customize.php?autofocus[section]=natura_home' ) ),
				esc_html__( 'Open the Customizer', 'natura' )
			);
		}
	}
	?>
</main>
<?php
get_footer();
