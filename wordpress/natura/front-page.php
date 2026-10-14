<?php
/**
 * Home page: photo-led, like the leading gardening sites (Gardeners' World,
 * RHS, Epic Gardening; see design/benchmark/). Every block carries a photo
 * from the guides themselves, and the brand colours carry whole bands.
 *
 * Order (BLUEPRINT.md): opening photo with the title and search, featured
 * guides, this month, explore by topic, popular guides, the page's one ad,
 * plant problems, affiliate picks, Pinterest ideas, latest articles, who
 * writes Natura and the newsletter.
 *
 * Money blocks: one ad only, well below the first answer; affiliate picks
 * come from the guides' own shopping lists with the disclosure next to them;
 * Pinterest blocks use the guides' real vertical images. Each section appears
 * only when it has content, and nothing is invented.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_plants   = post_type_exists( 'plant' ) ? get_posts(
	array(
		'post_type'      => 'plant',
		'posts_per_page' => 7,
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

// Featured guides: the three newest plant guides with a photo; the grid of
// popular guides further down shows the others, so no guide appears twice.
$natura_featured = array();
$natura_grid     = array();
foreach ( $natura_plants as $natura_plant ) {
	if ( count( $natura_featured ) < 3 && has_post_thumbnail( $natura_plant ) ) {
		$natura_featured[] = $natura_plant;
	} else {
		$natura_grid[] = $natura_plant;
	}
}
$natura_grid = array_slice( $natura_grid, 0, 4 );

$natura_hero_photo = natura_home_hero_photo();
if ( ! $natura_hero_photo && $natura_featured ) {
	$natura_hero_photo = (int) get_post_thumbnail_id( $natura_featured[0] );
}

$natura_month   = natura_home_this_month();
$natura_topics  = natura_home_topics( 6 );
$natura_author  = natura_home_author();
$natura_picks   = natura_home_picks( 3 );
$natura_pins    = natura_home_pins( 6 );
$natura_pin_url = natura_home_setting( 'natura_pinterest_url' );
$natura_signup  = natura_home_setting( 'natura_newsletter_code' );

// "This month" cards are the plant guides; the Customizer extras follow as a list.
$natura_month_cards = array();
$natura_month_extra = array();
foreach ( $natura_month['groups'] as $natura_group ) {
	foreach ( $natura_group['items'] as $natura_item ) {
		if ( 'also' === $natura_group['key'] ) {
			$natura_month_extra[] = $natura_item;
		} else {
			$natura_month_cards[] = $natura_item + array(
				'activity' => $natura_group['key'],
				'label'    => $natura_group['label'],
			);
		}
	}
}
$natura_month_cards = array_slice( $natura_month_cards, 0, 8 );
?>
<main id="main-content" class="home">
	<?php echo natura_home_structured_data(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>

	<?php // 1. Opening photo with the title, the search, and the main ways in. ?>
	<section class="home-hero<?php echo $natura_hero_photo ? ' has-photo' : ''; ?>">
		<?php
		if ( $natura_hero_photo ) {
			echo wp_get_attachment_image(
				$natura_hero_photo,
				'full',
				false,
				array(
					'class'         => 'home-hero-photo',
					'alt'           => '',
					'sizes'         => '100vw',
					'loading'       => 'eager',
					'fetchpriority' => 'high',
				)
			);
		}
		?>
		<div class="site-container home-hero-inner">
			<p class="label"><?php esc_html_e( 'Balconies · Patios · Windowsills', 'natura' ); ?></p>
			<h1><?php echo esc_html( natura_home_setting( 'natura_home_title' ) ); ?></h1>
			<p class="home-intro"><?php echo esc_html( natura_home_setting( 'natura_home_intro' ) ); ?></p>
			<?php get_search_form( array( 'natura_context' => 'hero' ) ); ?>
			<?php if ( $natura_topics ) : ?>
				<ul class="hero-links" aria-label="<?php esc_attr_e( 'Popular sections', 'natura' ); ?>">
					<?php foreach ( array_slice( $natura_topics, 0, 4 ) as $natura_topic ) : ?>
						<li><a href="<?php echo esc_url( $natura_topic['url'] ); ?>"><?php echo esc_html( $natura_topic['name'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>

	<?php // 2. Featured guides: one large, two beside it. ?>
	<?php if ( $natura_featured ) : ?>
		<section class="site-container home-section home-featured" aria-labelledby="home-featured-title">
			<div class="home-head">
				<h2 id="home-featured-title"><?php esc_html_e( 'Start with these guides', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"><?php esc_html_e( 'All plant guides', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
			</div>
			<div class="feature-mosaic feature-mosaic-<?php echo count( $natura_featured ); ?>">
				<?php foreach ( $natura_featured as $natura_index => $natura_item ) : ?>
					<?php
					setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- restored by wp_reset_postdata() below.
					$natura_is_main = 0 === $natura_index;
					$natura_pin     = $natura_is_main ? natura_pinterest_save_url() : '';
					?>
					<article class="feature-tile<?php echo $natura_is_main ? ' feature-tile-main' : ''; ?>">
						<?php
						the_post_thumbnail(
							$natura_is_main ? 'large' : 'medium_large',
							array(
								'alt'   => '',
								'sizes' => $natura_is_main ? '(min-width: 1024px) 800px, 100vw' : '(min-width: 1024px) 420px, 100vw',
							)
						);
						?>
						<div class="feature-tile-text">
							<p class="feature-tile-kicker"><?php echo esc_html( natura_home_kicker( $natura_item ) ); ?></p>
							<h3><a class="feature-tile-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php if ( $natura_is_main && has_excerpt() ) : ?>
								<p class="feature-tile-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
							<?php endif; ?>
						</div>
						<?php if ( $natura_pin ) : ?>
							<a class="pin-button pin-button-small" href="<?php echo esc_url( $natura_pin ); ?>" target="_blank" rel="noopener">
								<?php natura_the_icon( 'pin' ); ?>
								<span><?php esc_html_e( 'Save', 'natura' ); ?></span>
								<span class="screen-reader-text"><?php esc_html_e( 'this guide to Pinterest (opens in a new tab)', 'natura' ); ?></span>
							</a>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // 3. This month: from the guides' planting calendars, plus Customizer extras. ?>
	<?php if ( $natura_month_cards || $natura_month_extra ) : ?>
		<section class="home-season" aria-labelledby="home-season-title">
			<div class="site-container">
				<div class="home-head">
					<div>
						<p class="label"><?php esc_html_e( 'What to do now', 'natura' ); ?></p>
						<h2 id="home-season-title">
							<?php
							/* translators: %s: month name, e.g. "October". */
							printf( esc_html__( 'This month in your pots: %s', 'natura' ), esc_html( $natura_month['month'] ) );
							?>
						</h2>
					</div>
				</div>
				<div class="season-body<?php echo ( $natura_month_cards && $natura_month_extra ) ? ' has-also' : ''; ?>">
					<?php if ( $natura_month_cards ) : ?>
						<ul class="season-cards">
							<?php foreach ( $natura_month_cards as $natura_item ) : ?>
								<li>
									<a class="season-card" href="<?php echo esc_url( $natura_item['url'] ); ?>">
										<span class="season-card-media">
											<?php
											if ( $natura_item['image'] ) {
												echo wp_get_attachment_image( $natura_item['image'], 'medium', false, array( 'alt' => '' ) );
											}
											?>
										</span>
										<span class="season-badge season-badge-<?php echo esc_attr( $natura_item['activity'] ); ?>"><?php echo esc_html( $natura_item['label'] ); ?></span>
										<strong><?php echo esc_html( $natura_item['name'] ); ?></strong>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( $natura_month_extra ) : ?>
						<div class="season-also">
							<h3><?php esc_html_e( 'Also now', 'natura' ); ?></h3>
							<ul class="season-chips">
								<?php foreach ( $natura_month_extra as $natura_item ) : ?>
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
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php // 4. Explore by topic: photo tiles. ?>
	<?php if ( count( $natura_topics ) >= 3 ) : ?>
		<nav class="site-container home-section" aria-labelledby="home-topics-title">
			<div class="home-head">
				<h2 id="home-topics-title"><?php esc_html_e( 'Explore by topic', 'natura' ); ?></h2>
			</div>
			<ul class="topic-tiles">
				<?php foreach ( $natura_topics as $natura_topic ) : ?>
					<li>
						<a class="topic-tile" href="<?php echo esc_url( $natura_topic['url'] ); ?>">
							<?php echo wp_get_attachment_image( $natura_topic['image'], 'medium_large', false, array( 'alt' => '', 'sizes' => '(min-width: 1024px) 400px, 50vw' ) ); ?>
							<span class="topic-tile-text">
								<strong><?php echo esc_html( $natura_topic['name'] ); ?></strong>
								<span>
									<?php
									/* translators: %d: number of guides. */
									echo esc_html( sprintf( _n( '%d guide', '%d guides', $natura_topic['count'], 'natura' ), $natura_topic['count'] ) );
									?>
								</span>
							</span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	<?php endif; ?>

	<?php // 5. More plant guides ?>
	<?php if ( count( $natura_grid ) >= 2 ) : ?>
		<section class="site-container home-section" aria-labelledby="home-guides-title">
			<div class="home-head">
				<h2 id="home-guides-title"><?php esc_html_e( 'Popular growing guides', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"><?php esc_html_e( 'See all plants', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
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

	<?php // 8. Affiliate picks, from the guides' shopping lists. ?>
	<?php if ( $natura_picks ) : ?>
		<section class="site-container home-section home-picks" aria-labelledby="home-picks-title">
			<div class="home-head">
				<div>
					<p class="label"><?php esc_html_e( 'Our picks', 'natura' ); ?></p>
					<h2 id="home-picks-title"><?php esc_html_e( 'What we use on a small balcony', 'natura' ); ?></h2>
				</div>
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
			<ul class="product-list">
				<?php
				foreach ( $natura_picks as $natura_pick ) {
					natura_the_product_card( $natura_pick, 'medium' );
				}
				?>
			</ul>
		</section>
	<?php endif; ?>

	<?php // 9. Pinterest ideas, with the guides' vertical images. ?>
	<?php if ( count( $natura_pins ) >= 2 ) : ?>
		<section class="home-pins" aria-labelledby="home-pins-title">
			<div class="site-container">
				<div class="home-head">
					<div>
						<p class="label label-pinterest"><?php natura_the_icon( 'pin' ); ?> <?php esc_html_e( 'Visual guides', 'natura' ); ?></p>
						<h2 id="home-pins-title"><?php esc_html_e( 'Save ideas for later', 'natura' ); ?></h2>
					</div>
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
								<?php echo wp_get_attachment_image( absint( natura_field( 'pin_image', $natura_item->ID ) ), 'medium_large', false, array( 'alt' => '', 'sizes' => '(min-width: 1024px) 240px, 45vw' ) ); ?>
								<span><?php echo esc_html( get_the_title( $natura_item ) ); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php // 10. Latest care articles ?>
	<?php if ( $natura_posts ) : ?>
		<section class="site-container home-section" aria-labelledby="home-posts-title">
			<div class="home-head">
				<h2 id="home-posts-title"><?php esc_html_e( 'Latest care articles', 'natura' ); ?></h2>
				<a class="text-link" href="<?php echo esc_url( natura_plant_care_url() ); ?>"><?php esc_html_e( 'All of Plant Care', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
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
