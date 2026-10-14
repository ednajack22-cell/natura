<?php
/**
 * The Plant Care section page (/plant-care/).
 *
 * Readers come here with one of two questions: "what is wrong with my plant?"
 * or "how do I look after it?". Problem guides answer the first and come
 * first; then each topic shows its latest articles and a link to the rest.
 * Sections without content are not shown, and no link appears twice.
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
$natura_topics   = natura_topics();
$natura_has_any  = ( $natura_problems && $natura_problems->have_posts() ) || $natura_topics;
?>
<main id="main-content" class="plant-archive plant-care">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1><?php esc_html_e( 'Plant Care', 'natura' ); ?></h1>
			<p><?php echo esc_html( natura_plant_care_intro() ); ?></p>
		</header>

		<?php if ( $natura_problems && $natura_problems->have_posts() ) : ?>
			<section class="care-section" aria-labelledby="care-problems-title">
				<div class="section-heading">
					<h2 id="care-problems-title"><?php esc_html_e( 'Something wrong with a plant?', 'natura' ); ?></h2>
					<?php if ( $natura_problems->found_posts > $natura_problems->post_count ) : ?>
						<a class="text-link" href="<?php echo esc_url( natura_problems_url() ); ?>">
							<?php
							/* translators: %d: number of problem guides. */
							printf( esc_html__( 'All %d plant problems', 'natura' ), (int) $natura_problems->found_posts );
							?>
							<?php natura_the_icon( 'arrow' ); ?>
						</a>
					<?php endif; ?>
				</div>
				<div class="problem-grid">
					<?php
					while ( $natura_problems->have_posts() ) :
						$natura_problems->the_post();
						get_template_part( 'template-parts/problem-card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</section>

			<?php echo natura_ad_slot( __( 'Plant Care, after the problems', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
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
				<div class="section-heading">
					<h2 id="<?php echo esc_attr( $natura_heading_id ); ?>"><?php echo esc_html( $natura_topic->name ); ?></h2>
					<?php if ( $natura_topic->count > $natura_articles->post_count ) : ?>
						<a class="text-link" href="<?php echo esc_url( (string) get_term_link( $natura_topic ) ); ?>">
							<?php
							/* translators: %d: number of articles. */
							printf( esc_html__( 'All %d articles', 'natura' ), (int) $natura_topic->count );
							?>
							<?php natura_the_icon( 'arrow' ); ?>
						</a>
					<?php endif; ?>
				</div>
				<?php if ( $natura_topic->description ) : ?>
					<p class="care-section-intro"><?php echo esc_html( $natura_topic->description ); ?></p>
				<?php endif; ?>
				<div class="post-grid">
					<?php
					while ( $natura_articles->have_posts() ) :
						$natura_articles->the_post();
						get_template_part( 'template-parts/post-card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</section>
		<?php endforeach; ?>

		<?php if ( ! $natura_has_any ) : ?>
			<p class="empty-state"><?php esc_html_e( 'The first Plant Care guides are on their way.', 'natura' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
