<?php
/**
 * DIY project, e.g. "Make a self-watering pot from two containers".
 *
 * Top to bottom (design/DIY.md): header with the affiliate note before any
 * link, photo, at a glance (difficulty, time, cost, size), where the
 * instructions come from, before you start (balcony checks), materials and
 * tools, one ad, numbered steps with photo and tip, the plants to grow in
 * it, the project's own text, then share, FAQ, sources, and author.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_category = natura_project_category();
	$natura_crumbs   = natura_project_breadcrumbs( $natura_category, true );
	$natura_facts    = natura_project_facts();
	$natura_method   = natura_project_method();
	$natura_checks   = array_filter( array_map( static fn( array $row ): string => trim( (string) ( $row['point'] ?? '' ) ), natura_field_list( 'checks' ) ) );
	$natura_steps    = natura_project_steps();
	$natura_plants   = natura_section_enabled( 'project_plants' ) ? natura_project_plants() : array();
	$natura_related  = get_posts(
		array(
			'post_type'      => 'project',
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'no_found_rows'  => true,
		)
	);
	?>
	<main id="main-content" class="guide-page project-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php
		natura_the_guide_header(
			array(
				'crumbs'  => $natura_crumbs,
				/* translators: %s: category, e.g. "Watering". */
				'tag'     => $natura_category ? sprintf( __( 'DIY project · %s', 'natura' ), $natura_category->name ) : __( 'DIY project', 'natura' ),
				'tag_url' => $natura_category ? (string) get_term_link( $natura_category ) : (string) get_post_type_archive_link( 'project' ),
			)
		);
		?>

		<div class="site-container guide-layout">
			<article <?php post_class( 'guide-main' ); ?>>
				<?php natura_the_guide_photo(); ?>

				<?php if ( $natura_facts && natura_section_enabled( 'project_glance' ) ) : ?>
					<section class="glance" aria-labelledby="glance-title">
						<h2 id="glance-title"><?php esc_html_e( 'At a glance', 'natura' ); ?></h2>
						<dl class="glance-facts">
							<?php foreach ( $natura_facts as $natura_fact ) : ?>
								<div>
									<dt><?php natura_the_icon( $natura_fact['icon'] ); ?> <?php echo esc_html( $natura_fact['label'] ); ?></dt>
									<dd><?php echo esc_html( $natura_fact['value'] ); ?></dd>
								</div>
							<?php endforeach; ?>
							<?php if ( $natura_steps ) : ?>
								<div>
									<dt><?php natura_the_icon( 'check' ); ?> <?php esc_html_e( 'Steps', 'natura' ); ?></dt>
									<dd><?php echo esc_html( number_format_i18n( count( $natura_steps ) ) ); ?></dd>
								</div>
							<?php endif; ?>
						</dl>
					</section>
				<?php endif; ?>

				<?php if ( natura_section_enabled( 'project_method' ) ) : ?>
					<p class="gear-method is-<?php echo 'built' === $natura_method['key'] ? 'tested' : 'researched'; ?>">
						<strong><?php natura_the_icon( 'built' === $natura_method['key'] ? 'check' : 'lens' ); ?> <?php echo esc_html( $natura_method['label'] ); ?></strong>
						<span><?php echo esc_html( $natura_method['text'] ); ?></span>
					</p>
				<?php endif; ?>

				<?php if ( $natura_checks && natura_section_enabled( 'project_checks' ) ) : ?>
					<section class="project-checks" aria-labelledby="project-checks-title">
						<h2 id="project-checks-title"><?php esc_html_e( 'Before you start', 'natura' ); ?></h2>
						<ul>
							<?php foreach ( $natura_checks as $natura_check ) : ?>
								<li><?php natura_the_icon( 'check' ); ?><span><?php echo esc_html( $natura_check ); ?></span></li>
							<?php endforeach; ?>
						</ul>
					</section>
				<?php endif; ?>

				<?php if ( natura_section_enabled( 'project_materials' ) && ( natura_field_list( 'materials' ) || natura_field_list( 'tools' ) ) ) : ?>
					<section class="project-needs" aria-labelledby="project-needs-title">
						<h2 id="project-needs-title"><?php esc_html_e( 'What you need', 'natura' ); ?></h2>
						<div class="project-needs-grid">
							<?php natura_the_project_list( 'materials', __( 'Materials', 'natura' ) ); ?>
							<?php natura_the_project_list( 'tools', __( 'Tools', 'natura' ) ); ?>
						</div>
					</section>
				<?php endif; ?>

				<?php echo natura_ad_slot( __( 'DIY project, before the steps', 'natura' ), 'in-content', 'ads_projects' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>

				<?php if ( $natura_steps ) : ?>
					<section class="project-steps" aria-labelledby="project-steps-title">
						<h2 id="project-steps-title"><?php esc_html_e( 'Step by step', 'natura' ); ?></h2>
						<ol>
							<?php foreach ( $natura_steps as $natura_index => $natura_step ) : ?>
								<li id="<?php echo esc_attr( $natura_step['id'] ); ?>" class="project-step<?php echo $natura_step['image'] ? ' has-image' : ''; ?>">
									<h3>
										<span class="project-step-number">
											<?php
											/* translators: %d: step number. */
											echo esc_html( sprintf( __( 'Step %d', 'natura' ), $natura_index + 1 ) );
											?>
										</span>
										<?php echo esc_html( $natura_step['title'] ); ?>
									</h3>
									<?php if ( $natura_step['image'] ) : ?>
										<figure><?php echo wp_get_attachment_image( $natura_step['image'], 'medium_large', false, array( 'loading' => 'lazy', 'sizes' => '(min-width: 1024px) 760px, 100vw' ) + natura_no_pin() ); ?></figure>
									<?php endif; ?>
									<?php if ( $natura_step['text'] ) : ?>
										<p><?php echo esc_html( $natura_step['text'] ); ?></p>
									<?php endif; ?>
									<?php if ( $natura_step['tip'] ) : ?>
										<p class="project-tip"><strong><?php esc_html_e( 'Tip:', 'natura' ); ?></strong> <?php echo esc_html( $natura_step['tip'] ); ?></p>
									<?php endif; ?>
								</li>
								<?php
								// A second ad only in long projects, after step 4 (two in the text at most).
								$natura_ad = ( 3 === $natura_index && count( $natura_steps ) > 6 ) ? natura_ad_slot( __( 'DIY project, after step 4', 'natura' ), 'in-content', 'ads_projects' ) : '';
								if ( $natura_ad ) {
									echo '<li class="project-step-ad">' . $natura_ad . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
								}
								?>
							<?php endforeach; ?>
						</ol>
					</section>
				<?php endif; ?>

				<?php if ( '' !== trim( get_the_content() ) ) : ?>
					<div class="entry-content guide-content">
						<?php the_content(); ?>
					</div>
				<?php endif; ?>

				<?php if ( $natura_plants ) : ?>
					<section class="project-plants" aria-labelledby="project-plants-title">
						<h2 id="project-plants-title"><?php esc_html_e( 'What to grow in it', 'natura' ); ?></h2>
						<div class="mini-grid">
							<?php
							foreach ( $natura_plants as $natura_item ) {
								setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
								get_template_part( 'template-parts/plant-card-compact' );
							}
							wp_reset_postdata();
							?>
						</div>
					</section>
				<?php endif; ?>

				<?php natura_the_share_bar( 'share_guides', __( 'Made it? Share it', 'natura' ) ); ?>
				<?php natura_the_faq_and_sources(); ?>
				<?php natura_the_author_box(); ?>
			</article>

			<?php natura_the_guide_sidebar( 'project' ); ?>
		</div>

		<?php
		natura_the_related( 'project-related-title', __( 'Keep building', 'natura' ), __( 'More DIY projects', 'natura' ), $natura_related, 'template-parts/project-card', 'problem-grid' );
		natura_the_guide_end_ad();
		?>
	</main>
	<?php
endwhile;

get_footer();
