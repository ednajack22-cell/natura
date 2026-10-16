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
				<p><?php echo esc_html( natura_home_setting( 'natura_footer_text' ) ); ?></p>
				<?php $natura_pin_profile = natura_section_enabled( 'site_footer_follow' ) ? natura_home_setting( 'natura_pinterest_url' ) : ''; ?>
				<?php if ( $natura_pin_profile ) : ?>
					<a class="pin-button footer-follow" href="<?php echo esc_url( $natura_pin_profile ); ?>" target="_blank" rel="noopener me">
						<?php natura_the_icon( 'pin' ); ?>
						<span><?php esc_html_e( 'Follow us on Pinterest', 'natura' ); ?></span>
						<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span>
					</a>
				<?php endif; ?>
				<?php $natura_profiles = natura_section_enabled( 'site_footer_social' ) ? array_diff_key( natura_social_profiles(), array( 'Pinterest' => '' ) ) : array(); ?>
				<?php if ( $natura_profiles ) : ?>
					<ul class="footer-social" aria-label="<?php esc_attr_e( 'Natura on social networks', 'natura' ); ?>">
						<?php foreach ( $natura_profiles as $natura_network => $natura_profile ) : ?>
							<li><a href="<?php echo esc_url( $natura_profile ); ?>" target="_blank" rel="noopener me"><?php echo esc_html( $natura_network ); ?><span class="screen-reader-text"> <?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
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
