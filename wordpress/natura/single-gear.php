<?php
/**
 * Buying guide, e.g. "The best compost for pots".
 *
 * Top to bottom (design/GEAR.md): header with the affiliate note before any
 * link, how the picks were chosen, "Our picks at a glance" (the answer),
 * what to look for, the comparison table, one ad, a section per pick, the
 * guide's own text, then share, FAQ, sources, and author.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_category = natura_gear_category();
	$natura_crumbs   = natura_gear_breadcrumbs( $natura_category, true );
	$natura_picks    = natura_gear_picks();
	$natura_method   = natura_gear_method();
	$natura_criteria = array_filter( natura_field_list( 'criteria' ), static fn( array $row ): bool => '' !== trim( (string) ( $row['name'] ?? '' ) ) );
	$natura_labels   = natura_gear_spec_labels( $natura_picks );
	$natura_related  = $natura_category ? get_posts(
		array(
			'post_type'      => 'gear',
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'no_found_rows'  => true,
			'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				array(
					'taxonomy' => 'gear_category',
					'terms'    => $natura_category->term_id,
				),
			),
		)
	) : array();
	?>
	<main id="main-content" class="guide-page gear-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php echo natura_gear_structured_data( $natura_picks ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php
		natura_the_guide_header(
			array(
				'crumbs'  => $natura_crumbs,
				/* translators: %s: category, e.g. "Compost & feed". */
				'tag'     => $natura_category ? sprintf( __( 'Buying guide · %s', 'natura' ), $natura_category->name ) : __( 'Buying guide', 'natura' ),
				'tag_url' => $natura_category ? (string) get_term_link( $natura_category ) : (string) get_post_type_archive_link( 'gear' ),
			)
		);
		?>

		<div class="site-container guide-layout">
			<article <?php post_class( 'guide-main' ); ?>>
				<?php natura_the_guide_photo(); ?>

				<?php if ( natura_section_enabled( 'gear_method' ) ) : ?>
					<p class="gear-method is-<?php echo esc_attr( $natura_method['key'] ); ?>">
						<strong><?php natura_the_icon( 'tested' === $natura_method['key'] ? 'check' : 'lens' ); ?> <?php echo esc_html( $natura_method['label'] ); ?></strong>
						<span><?php echo esc_html( $natura_method['text'] ); ?></span>
					</p>
				<?php endif; ?>

				<?php if ( $natura_picks && natura_section_enabled( 'gear_glance' ) ) : ?>
					<section class="gear-glance" aria-labelledby="gear-glance-title">
						<h2 id="gear-glance-title"><?php esc_html_e( 'Our picks at a glance', 'natura' ); ?></h2>
						<ol>
							<?php foreach ( $natura_picks as $natura_pick ) : ?>
								<li>
									<div>
										<?php if ( $natura_pick['best_for'] ) : ?>
											<span class="gear-best"><?php echo esc_html( $natura_pick['best_for'] ); ?></span>
										<?php endif; ?>
										<a href="#<?php echo esc_attr( $natura_pick['id'] ); ?>"><?php echo esc_html( $natura_pick['name'] ); ?></a>
									</div>
									<?php natura_the_price_button( $natura_pick, 'button-small' ); ?>
								</li>
							<?php endforeach; ?>
						</ol>
					</section>
				<?php endif; ?>

				<?php if ( $natura_criteria && natura_section_enabled( 'gear_criteria' ) ) : ?>
					<section class="gear-criteria" aria-labelledby="gear-criteria-title">
						<h2 id="gear-criteria-title"><?php esc_html_e( 'What to look for', 'natura' ); ?></h2>
						<dl>
							<?php foreach ( $natura_criteria as $natura_point ) : ?>
								<div>
									<dt><?php natura_the_icon( 'check' ); ?> <?php echo esc_html( $natura_point['name'] ); ?></dt>
									<?php if ( ! empty( $natura_point['why'] ) ) : ?>
										<dd><?php echo esc_html( $natura_point['why'] ); ?></dd>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</dl>
					</section>
				<?php endif; ?>

				<?php if ( count( $natura_picks ) > 1 && $natura_labels && natura_section_enabled( 'gear_table' ) ) : ?>
					<section class="gear-compare" aria-labelledby="gear-compare-title">
						<h2 id="gear-compare-title"><?php esc_html_e( 'Compared side by side', 'natura' ); ?></h2>
						<div class="gear-compare-scroll" tabindex="0" role="region" aria-labelledby="gear-compare-title">
							<table>
								<thead>
									<tr>
										<th scope="col"><?php esc_html_e( 'Pick', 'natura' ); ?></th>
										<?php foreach ( $natura_labels as $natura_label ) : ?>
											<th scope="col"><?php echo esc_html( $natura_label ); ?></th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ( $natura_picks as $natura_pick ) : ?>
										<tr>
											<th scope="row"><a href="#<?php echo esc_attr( $natura_pick['id'] ); ?>"><?php echo esc_html( $natura_pick['name'] ); ?></a></th>
											<?php foreach ( $natura_labels as $natura_label ) : ?>
												<td><?php echo esc_html( $natura_pick['specs'][ $natura_label ] ?? '—' ); ?></td>
											<?php endforeach; ?>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</section>
				<?php endif; ?>

				<?php echo natura_ad_slot( __( 'Buying guide, after the comparison', 'natura' ), 'in-content', 'ads_gear' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>

				<?php foreach ( $natura_picks as $natura_index => $natura_pick ) : ?>
					<section class="gear-pick" id="<?php echo esc_attr( $natura_pick['id'] ); ?>" aria-labelledby="<?php echo esc_attr( $natura_pick['id'] ); ?>-title">
						<div class="gear-pick-head">
							<?php if ( $natura_pick['best_for'] ) : ?>
								<span class="gear-best"><?php echo esc_html( $natura_pick['best_for'] ); ?></span>
							<?php endif; ?>
							<h2 id="<?php echo esc_attr( $natura_pick['id'] ); ?>-title"><span><?php echo esc_html( (string) ( $natura_index + 1 ) ); ?>.</span> <?php echo esc_html( $natura_pick['name'] ); ?></h2>
						</div>
						<div class="gear-pick-body<?php echo $natura_pick['image'] ? ' has-image' : ''; ?>">
							<?php if ( $natura_pick['image'] ) : ?>
								<figure class="gear-pick-media">
									<?php echo wp_get_attachment_image( $natura_pick['image'], 'medium', false, array( 'alt' => $natura_pick['name'], 'loading' => 'lazy', 'sizes' => '(min-width: 1024px) 240px, 40vw' ) + natura_no_pin() ); ?>
								</figure>
							<?php endif; ?>
							<div class="gear-pick-text">
								<?php if ( $natura_pick['verdict'] ) : ?>
									<p class="gear-verdict"><?php echo esc_html( $natura_pick['verdict'] ); ?></p>
								<?php endif; ?>
								<?php natura_the_price_button( $natura_pick ); ?>
							</div>
						</div>
						<?php if ( $natura_pick['pros'] || $natura_pick['cons'] ) : ?>
							<div class="gear-proscons">
								<?php if ( $natura_pick['pros'] ) : ?>
									<div class="is-pros">
										<h3><?php esc_html_e( 'Good', 'natura' ); ?></h3>
										<ul>
											<?php foreach ( $natura_pick['pros'] as $natura_line ) : ?>
												<li><?php echo esc_html( $natura_line ); ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
								<?php if ( $natura_pick['cons'] ) : ?>
									<div class="is-cons">
										<h3><?php esc_html_e( 'Watch out', 'natura' ); ?></h3>
										<ul>
											<?php foreach ( $natura_pick['cons'] as $natura_line ) : ?>
												<li><?php echo esc_html( $natura_line ); ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if ( $natura_pick['specs'] ) : ?>
							<dl class="gear-specs">
								<?php foreach ( $natura_pick['specs'] as $natura_label => $natura_value ) : ?>
									<div>
										<dt><?php echo esc_html( $natura_label ); ?></dt>
										<dd><?php echo esc_html( $natura_value ); ?></dd>
									</div>
								<?php endforeach; ?>
							</dl>
						<?php endif; ?>
					</section>
					<?php
					// A second ad only in long guides, after the third pick (BLUEPRINT: two in the text at most).
					if ( 2 === $natura_index && count( $natura_picks ) > 4 ) {
						echo natura_ad_slot( __( 'Buying guide, after the third pick', 'natura' ), 'in-content', 'ads_gear' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
					}
					?>
				<?php endforeach; ?>

				<?php if ( '' !== trim( get_the_content() ) ) : ?>
					<div class="entry-content guide-content">
						<?php the_content(); ?>
					</div>
				<?php endif; ?>

				<?php natura_the_share_bar( 'share_guides', __( 'Found this useful? Share it', 'natura' ) ); ?>
				<?php natura_the_faq_and_sources(); ?>
				<?php natura_the_author_box(); ?>
			</article>

			<?php natura_the_guide_sidebar( 'gear' ); ?>
		</div>

		<?php
		natura_the_related( 'gear-related-title', __( 'Buying guides', 'natura' ), __( 'More buying guides', 'natura' ), $natura_related, 'template-parts/gear-card', 'gear-grid' );
		natura_the_guide_end_ad();
		?>
	</main>
	<?php
endwhile;

get_footer();
