<?php
/**
 * The Plant Care section page (/plant-care/), after the Stitch "Plant Care &
 * Diagnostics Hub" mock-up.
 *
 * Readers come here with one of two questions: "what is wrong with my plant?"
 * or "how do I look after it?". The dark panel answers the first: each problem
 * guide, by what the reader can see. Three checks come next, because most
 * problems in pots are found before anything is sprayed or fed. Then each
 * topic shows its latest articles. Sections without content are not shown,
 * and no link appears twice.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_crumbs   = natura_plant_care_trail();
$natura_problems = post_type_exists( 'problem' ) ? new WP_Query(
	array(
		'post_type'           => 'problem',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
	)
) : null;
$natura_has_problems = $natura_problems && $natura_problems->have_posts();
$natura_topics       = natura_topics();
$natura_checks       = array(
	array(
		'icon'  => 'drop',
		'title' => __( 'Feel the compost at root depth', 'natura' ),
		'text'  => __( 'Push a finger 5 cm into the pot, or use a moisture meter in deep containers. Wet compost days after watering means the roots are short of air; dust-dry compost means they are short of water.', 'natura' ),
	),
	array(
		'icon'  => 'roots',
		'title' => __( 'Look at the roots', 'natura' ),
		'text'  => __( 'Ease the plant out of its pot. Healthy roots are firm and pale. Brown, soft roots with a sour smell are rotting; a solid mat of roots means the pot is too small.', 'natura' ),
	),
	array(
		'icon'  => 'lens',
		'title' => __( 'Turn the leaves over', 'natura' ),
		'text'  => __( 'Most pests hide under the leaves and where they join the stem. Look for insects, fine webbing, sticky patches, or eggs before you blame the soil.', 'natura' ),
	),
);
?>
<main id="main-content" class="plant-archive plant-care">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<p class="tag"><?php esc_html_e( 'Plant Care', 'natura' ); ?></p>
			<h1><?php esc_html_e( 'Container plant care and problem guides', 'natura' ); ?></h1>
			<p><?php echo esc_html( natura_plant_care_intro() ); ?></p>
		</header>

		<?php natura_the_topic_chips(); ?>

		<?php if ( $natura_has_problems ) : ?>
			<section class="doctor-panel" aria-labelledby="care-doctor-title">
				<div class="doctor-intro">
					<p class="tag tag-dark"><?php natura_the_icon( 'lens' ); ?> <?php esc_html_e( 'Find the cause', 'natura' ); ?></p>
					<h2 id="care-doctor-title"><?php esc_html_e( 'What is wrong with your plant?', 'natura' ); ?></h2>
					<p class="doctor-subtitle"><?php esc_html_e( 'Start from what you can see.', 'natura' ); ?></p>
					<p><?php esc_html_e( 'Each guide lists the likely causes in order, with the clue that points to each one, how to confirm it, and what to do.', 'natura' ); ?></p>
				</div>
				<div class="doctor-card">
					<p class="label"><?php esc_html_e( 'Choose the closest match', 'natura' ); ?></p>
					<ul class="symptom-grid">
						<?php
						while ( $natura_problems->have_posts() ) :
							$natura_problems->the_post();
							?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<strong><?php the_title(); ?></strong>
									<?php if ( has_excerpt() ) : ?>
										<span><?php echo esc_html( wp_trim_words( get_the_excerpt(), 14 ) ); ?></span>
									<?php endif; ?>
								</a>
							</li>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</ul>
					<?php if ( $natura_problems->found_posts > $natura_problems->post_count ) : ?>
						<a class="button button-accent" href="<?php echo esc_url( natura_problems_url() ); ?>">
							<?php
							/* translators: %d: number of problem guides. */
							printf( esc_html__( 'All %d plant problems', 'natura' ), (int) $natura_problems->found_posts );
							?>
							<?php natura_the_icon( 'arrow' ); ?>
						</a>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<section class="checks-panel" aria-labelledby="care-checks-title">
			<div class="checks-intro">
				<p class="label"><?php esc_html_e( 'Before you treat anything', 'natura' ); ?></p>
				<h2 id="care-checks-title"><?php esc_html_e( 'Three checks that find most problems', 'natura' ); ?></h2>
				<p><?php esc_html_e( 'Feeding or spraying a plant before you know the cause often makes things worse. These take five minutes.', 'natura' ); ?></p>
			</div>
			<ol class="checks-list">
				<?php foreach ( $natura_checks as $natura_index => $natura_check ) : ?>
					<li>
						<span class="checks-head">
							<span class="label"><?php echo esc_html( sprintf( '%02d', $natura_index + 1 ) ); ?></span>
							<?php natura_the_icon( $natura_check['icon'] ); ?>
						</span>
						<strong><?php echo esc_html( $natura_check['title'] ); ?></strong>
						<span><?php echo esc_html( $natura_check['text'] ); ?></span>
					</li>
				<?php endforeach; ?>
			</ol>
		</section>

		<?php if ( $natura_has_problems ) : ?>
			<?php echo natura_ad_slot( __( 'Plant Care, after the checks', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
		<?php endif; ?>

		<?php foreach ( $natura_topics as $natura_topic ) : ?>
			<?php
			$natura_articles = new WP_Query(
				array(
					'post_type'           => 'post',
					'cat'                 => $natura_topic->term_id,
					'posts_per_page'      => 3,
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				)
			);
			if ( ! $natura_articles->have_posts() ) {
				continue;
			}
			$natura_heading_id = 'care-topic-' . $natura_topic->slug;
			?>
			<section class="care-section" aria-labelledby="<?php echo esc_attr( $natura_heading_id ); ?>">
				<div class="section-intro">
					<div>
						<p class="label"><?php esc_html_e( 'Topic', 'natura' ); ?></p>
						<h2 id="<?php echo esc_attr( $natura_heading_id ); ?>"><?php echo esc_html( $natura_topic->name ); ?></h2>
					</div>
					<?php if ( $natura_topic->description ) : ?>
						<p><?php echo esc_html( $natura_topic->description ); ?></p>
					<?php endif; ?>
				</div>
				<div class="post-grid">
					<?php
					while ( $natura_articles->have_posts() ) :
						$natura_articles->the_post();
						get_template_part( 'template-parts/post-card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php if ( $natura_topic->count > $natura_articles->post_count ) : ?>
					<a class="text-link" href="<?php echo esc_url( (string) get_term_link( $natura_topic ) ); ?>">
						<?php
						/* translators: 1: number of articles, 2: topic. */
						printf( esc_html__( 'All %1$d articles on %2$s', 'natura' ), (int) $natura_topic->count, esc_html( mb_strtolower( $natura_topic->name ) ) );
						?>
						<?php natura_the_icon( 'arrow' ); ?>
					</a>
				<?php endif; ?>
			</section>
		<?php endforeach; ?>
	</div>
</main>
<?php
get_footer();
