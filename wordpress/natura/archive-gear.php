<?php
/**
 * Gear: every buying guide (/gear/) or one category
 * (/gear/category/compost-feed/).
 *
 * From the Stitch "Gear & Reviews Hub" mock-up, without its invented figures:
 * the affiliate note first, categories as chips, the newest guide large, the
 * others as cards, then how we choose products (design/GEAR.md).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_category   = is_tax( 'gear_category' ) ? get_queried_object() : null;
$natura_category   = $natura_category instanceof WP_Term ? $natura_category : null;
$natura_crumbs     = natura_gear_breadcrumbs( $natura_category );
$natura_categories = get_terms(
	array(
		'taxonomy'   => 'gear_category',
		'hide_empty' => true,
	)
);
$natura_featured   = ! $natura_category && ! is_paged() && natura_section_enabled( 'gear_featured' ) && $GLOBALS['wp_query']->post_count > 2;
?>
<main id="main-content" class="plant-archive gear-archive">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1>
				<?php
				if ( $natura_category ) {
					/* translators: %s: category, e.g. "Potting mix & fertilizer". */
					echo esc_html( sprintf( __( '%s: buying guides', 'natura' ), $natura_category->name ) );
				} else {
					esc_html_e( 'Gear for growing in pots', 'natura' );
				}
				?>
			</h1>
			<p><?php echo esc_html( $natura_category && $natura_category->description ? $natura_category->description : natura_home_setting( 'natura_gear_intro' ) ); ?></p>
		</header>

		<p class="affiliate-note gear-note">
			<?php
			printf(
				/* translators: %s: link to the disclosure page. */
				esc_html__( 'Buying guides can contain affiliate links: if you buy through them, we may earn a commission at no extra cost to you. Every guide says whether we tested the picks or researched them. %s', 'natura' ),
				'<a href="' . esc_url( natura_disclosure_url() ) . '">' . esc_html__( 'How we choose products', 'natura' ) . '</a>'
			);
			?>
		</p>

		<?php if ( ! is_wp_error( $natura_categories ) && count( $natura_categories ) > 1 ) : ?>
			<nav class="filter-chips" aria-label="<?php esc_attr_e( 'Gear categories', 'natura' ); ?>">
				<a href="<?php echo esc_url( (string) get_post_type_archive_link( 'gear' ) ); ?>"<?php echo $natura_category ? '' : ' aria-current="page"'; ?>><?php esc_html_e( 'All', 'natura' ); ?></a>
				<?php foreach ( $natura_categories as $natura_term ) : ?>
					<a href="<?php echo esc_url( (string) get_term_link( $natura_term ) ); ?>"<?php echo ( $natura_category && $natura_category->term_id === $natura_term->term_id ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $natura_term->name ); ?> <span class="chip-count"><?php echo esc_html( number_format_i18n( $natura_term->count ) ); ?></span></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<?php
			if ( $natura_featured ) :
				the_post();
				?>
				<div class="gear-featured"><?php get_template_part( 'template-parts/gear-card' ); ?></div>
			<?php endif; ?>
			<div class="problem-grid gear-grid">
				<?php
				$natura_count = 0;
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/gear-card' );
					++$natura_count;
					natura_the_list_break( $natura_count );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
			<?php natura_the_share_bar( 'share_lists', __( 'Share this list', 'natura' ) ); ?>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'No buying guides here yet.', 'natura' ); ?></p>
		<?php endif; ?>

		<?php if ( natura_section_enabled( 'gear_how' ) && natura_home_setting( 'natura_gear_how' ) ) : ?>
			<section class="gear-how" aria-labelledby="gear-how-title">
				<h2 id="gear-how-title"><?php esc_html_e( 'How we choose products', 'natura' ); ?></h2>
				<ul>
					<?php foreach ( natura_lines( natura_home_setting( 'natura_gear_how' ) ) as $natura_line ) : ?>
						<li><?php natura_the_icon( 'check' ); ?><span><?php echo esc_html( $natura_line ); ?></span></li>
					<?php endforeach; ?>
				</ul>
				<p>
					<a class="text-link" href="<?php echo esc_url( natura_page_url( 'editorial', '/editorial-policy/' ) ); ?>"><?php esc_html_e( 'How we write and test', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
					<a class="text-link" href="<?php echo esc_url( natura_disclosure_url() ); ?>"><?php esc_html_e( 'Affiliate disclosure', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
				</p>
			</section>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
