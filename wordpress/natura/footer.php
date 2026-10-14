<?php
/**
 * Site footer: brand, link columns, legal links.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_columns = natura_menu_tree( 'footer' );
$natura_legal   = natura_menu_tree( 'legal' );
?>
<footer class="site-footer">
	<div class="site-container">
		<div class="footer-grid">
			<div class="footer-brand">
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="brand-mark"><?php natura_the_icon( 'leaf' ); ?></span>
					<span class="brand-text"><span class="brand-name"><?php bloginfo( 'name' ); ?></span></span>
				</a>
				<p><?php esc_html_e( 'Independent, source-aware gardening guidance for balconies, patios, containers, and indoor spaces.', 'natura' ); ?></p>
			</div>
			<?php foreach ( $natura_columns as $natura_column ) : ?>
				<nav class="footer-column" aria-label="<?php echo esc_attr( $natura_column['title'] ); ?>">
					<h2><?php echo esc_html( $natura_column['title'] ); ?></h2>
					<ul>
						<?php foreach ( $natura_column['children'] as $natura_link ) : ?>
							<li><a href="<?php echo esc_url( $natura_link['url'] ); ?>"><?php echo esc_html( $natura_link['title'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endforeach; ?>
		</div>
		<div class="footer-bottom">
			<span>
				<?php
				/* translators: 1: year, 2: site name. */
				printf( esc_html__( '© %1$s %2$s', 'natura' ), esc_html( wp_date( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
				?>
			</span>
			<?php if ( $natura_legal ) : ?>
				<nav aria-label="<?php esc_attr_e( 'Legal information', 'natura' ); ?>">
					<?php foreach ( $natura_legal as $natura_link ) : ?>
						<a href="<?php echo esc_url( $natura_link['url'] ); ?>"><?php echo esc_html( $natura_link['title'] ); ?></a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
