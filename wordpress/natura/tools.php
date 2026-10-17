<?php
/**
 * Tools: the hub (/tools/) or one tool (/tools/plant-finder/).
 *
 * Each tool has its own part in template-parts/tools/{slug}.php. The page
 * frame is shared: breadcrumb, title, introduction, the tool, then one ad
 * below it, never above (design/TOOLS.md).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_slug  = (string) natura_current_tool();
$natura_tools = natura_active_tools();
?>
<main id="main-content" class="tools-page<?php echo '' !== $natura_slug ? ' tool-' . esc_attr( $natura_slug ) : ''; ?>">
	<?php echo natura_tool_structured_data( $natura_slug ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( natura_tool_breadcrumbs( $natura_slug ) ); ?>

	<div class="site-container">
		<header class="page-intro tools-intro">
			<p class="tools-kicker"><?php natura_the_icon( '' === $natura_slug ? 'gauge' : $natura_tools[ $natura_slug ]['icon'] ); ?> <?php echo '' === $natura_slug ? esc_html__( 'Free tools', 'natura' ) : esc_html__( 'Free tool', 'natura' ); ?></p>
			<h1><?php echo esc_html( natura_tool_page_title( $natura_slug ) ); ?></h1>
			<?php if ( natura_tool_intro( $natura_slug ) ) : ?>
				<p><?php echo esc_html( natura_tool_intro( $natura_slug ) ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( '' === $natura_slug ) : ?>
			<?php if ( $natura_tools ) : ?>
				<?php foreach ( natura_tool_groups() as $natura_group => $natura_group_label ) : ?>
					<?php $natura_in_group = array_filter( $natura_tools, static fn( array $tool ): bool => $natura_group === $tool['group'] ); ?>
					<?php if ( $natura_in_group ) : ?>
						<section class="tool-group" aria-labelledby="tools-<?php echo esc_attr( $natura_group ); ?>">
							<h2 id="tools-<?php echo esc_attr( $natura_group ); ?>"><?php echo esc_html( $natura_group_label ); ?></h2>
							<ul class="tool-grid">
								<?php foreach ( $natura_in_group as $natura_tool ) : ?>
									<li class="tool-card">
										<span class="tool-card-icon"><?php natura_the_icon( $natura_tool['icon'] ); ?></span>
										<h3><a href="<?php echo esc_url( $natura_tool['url'] ); ?>"><?php echo esc_html( $natura_tool['title'] ); ?></a></h3>
										<p><?php echo esc_html( $natura_tool['text'] ); ?></p>
										<p class="tool-card-needs"><strong><?php esc_html_e( 'You need:', 'natura' ); ?></strong> <?php echo esc_html( $natura_tool['needs'] ); ?></p>
										<span class="tool-card-open" aria-hidden="true"><?php esc_html_e( 'Open the tool', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						</section>
					<?php endif; ?>
				<?php endforeach; ?>
				<?php natura_the_share_bar( 'share_tools', __( 'Share these tools', 'natura' ) ); ?>
				<p class="tools-privacy"><?php natura_the_icon( 'check' ); ?> <span><?php esc_html_e( 'Free, with no account. Nothing you enter in a tool is saved.', 'natura' ); ?></span></p>
			<?php else : ?>
				<p class="empty-state"><?php esc_html_e( 'No tool is switched on yet.', 'natura' ); ?></p>
			<?php endif; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/tools/' . $natura_slug ); ?>
			<?php
			// "Result" only once the reader has answered; before that, the tool itself.
			$natura_shared = natura_share_context();
			natura_the_share_bar( 'share_tools', ( $natura_shared && str_contains( $natura_shared['url'], '?' ) ) ? __( 'Share this result', 'natura' ) : __( 'Share this tool', 'natura' ) );
			?>
			<?php echo natura_ad_slot( __( 'Tool page, below the tool', 'natura' ), 'in-content', 'ads_tools' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
			<?php
			$natura_others = array_diff_key( $natura_tools, array( $natura_slug => true ) );
			if ( $natura_others ) :
				?>
				<nav class="tool-others" aria-labelledby="tool-others-title">
					<h2 id="tool-others-title"><?php esc_html_e( 'Other tools', 'natura' ); ?></h2>
					<ul>
						<?php foreach ( $natura_others as $natura_tool ) : ?>
							<li><a href="<?php echo esc_url( $natura_tool['url'] ); ?>"><?php natura_the_icon( $natura_tool['icon'] ); ?> <?php echo esc_html( $natura_tool['title'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
