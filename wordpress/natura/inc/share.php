<?php
/**
 * Sharing: the "Share" bar and the previews that social apps show.
 *
 * Every page a reader might pass on (guides, tool results, calendar months,
 * plant lists) gets:
 *  - Open Graph and Twitter tags, so WhatsApp, Facebook, Messenger, X and
 *    Pinterest show a title, a line of text, and a picture;
 *  - a "Share" bar: the phone's own share sheet (WhatsApp, Instagram,
 *    Messages…), then Pinterest, WhatsApp, Facebook, email, and Copy link.
 *
 * The bar is plain links: no script from Facebook or Pinterest is loaded, so
 * the page stays fast and sets none of their cookies. A tool result shares
 * its own address, answers included, while Google still gets the plain tool
 * as canonical.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The address of an image for sharing: the original upload (usually JPEG),
 * which every network reads, rather than the WebP copies the pages use.
 *
 * @param int $id Attachment ID.
 */
function natura_share_image_url( int $id ): string {
	if ( ! $id ) {
		return '';
	}
	$original = wp_get_original_image_url( $id );

	return $original ? (string) $original : (string) wp_get_attachment_image_url( $id, 'full' );
}

/**
 * What the current page shares: address, title, one line of text, a
 * landscape picture for link previews, and a vertical picture for Pinterest.
 * Null where there is nothing to share (search, 404, admin pages).
 *
 * @return array{url: string, title: string, text: string, image: string, pin: string, kind: string}|null
 */
function natura_share_context(): ?array {
	static $context = false;
	if ( false !== $context ) {
		return $context;
	}
	$context  = null;
	$fallback = natura_share_image_url( natura_home_hero_photo() );

	if ( is_singular( natura_guide_post_types() ) ) {
		$image   = natura_share_image_url( (int) get_post_thumbnail_id() );
		$context = array(
			'url'   => (string) get_permalink(),
			'title' => get_the_title(),
			'text'  => wp_strip_all_tags( get_the_excerpt() ),
			'image' => $image,
			'pin'   => natura_pin_image_url(),
			'kind'  => 'guide',
		);
	} elseif ( function_exists( 'natura_current_tool' ) && null !== natura_current_tool() && ! is_404() ) {
		$context = natura_tool_share( (string) natura_current_tool() );
	} elseif ( function_exists( 'natura_is_calendar' ) && natura_is_calendar() ) {
		$month  = natura_core_calendar_month();
		$plants = $month ? natura_calendar_month( $month )['plants'] : array_keys( natura_calendar_year() );
		$image  = $plants ? natura_share_image_url( (int) get_post_thumbnail_id( $plants[0] ) ) : '';
		$context = array(
			'url'   => natura_core_calendar_url( $month ),
			'title' => natura_calendar_title( $month ),
			'text'  => natura_calendar_description( $month ),
			'image' => $image,
			'pin'   => $image,
			'kind'  => 'calendar',
		);
	} elseif ( is_tax( array( 'plant_type', 'plant_sun', 'plant_space' ) ) || is_post_type_archive( 'plant' ) ) {
		$term  = get_queried_object();
		$first = $GLOBALS['wp_query']->posts[0] ?? null;
		$image = $first instanceof WP_Post ? natura_share_image_url( (int) get_post_thumbnail_id( $first ) ) : '';
		if ( $term instanceof WP_Term ) {
			$title = 'plant_type' === $term->taxonomy
				/* translators: %s: plant type, e.g. "Herbs". */
				? sprintf( __( '%s to grow in pots', 'natura' ), $term->name )
				: natura_condition_title( $term );
			$text  = $term->description;
			$url   = (string) get_term_link( $term );
		} else {
			$title = __( 'Plants to grow in pots', 'natura' );
			$text  = natura_home_setting( 'natura_intro_plants' );
			$url   = (string) get_post_type_archive_link( 'plant' );
		}
		$context = array(
			'url'   => $url,
			'title' => $title,
			'text'  => $text ? $text : natura_home_setting( 'natura_intro_plants' ),
			'image' => $image,
			'pin'   => $image,
			'kind'  => 'list',
		);
	}

	if ( $context ) {
		$context['image'] = $context['image'] ? $context['image'] : $fallback;
		$context['pin']   = $context['pin'] ? $context['pin'] : $context['image'];
		$context['text']  = wp_strip_all_tags( $context['text'] );
	}

	return $context;
}

/*
 * Link previews. Guides and the home page print their own Open Graph tags
 * (content.php, home.php); this adds them for tools, calendar pages and plant
 * lists, and the Twitter card everywhere a page can be shared.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( natura_seo_plugin_active() ) {
			return;
		}
		$context = natura_share_context();
		if ( $context && 'guide' !== $context['kind'] ) {
			$tags = array(
				'og:type'        => 'website',
				'og:title'       => $context['title'],
				'og:description' => $context['text'],
				'og:url'         => $context['url'],
				'og:site_name'   => get_bloginfo( 'name' ),
				'og:image'       => $context['image'],
			);
			foreach ( $tags as $property => $content ) {
				if ( $content ) {
					printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
				}
			}
		}
		if ( $context || is_front_page() ) {
			echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
		}
	},
	20
);

/**
 * The share links for a context: label => [address, icon, class].
 *
 * @param array{url: string, title: string, text: string, image: string, pin: string, kind: string} $context Shared page.
 * @return array<string, array{url: string, icon: string, class: string, label: string}>
 */
function natura_share_links( array $context ): array {
	$links = array();
	if ( $context['pin'] ) {
		$links['pinterest'] = array(
			'url'   => add_query_arg(
				array(
					'url'         => rawurlencode( $context['url'] ),
					'media'       => rawurlencode( $context['pin'] ),
					'description' => rawurlencode( $context['title'] . ( $context['text'] ? ' — ' . $context['text'] : '' ) ),
				),
				'https://www.pinterest.com/pin/create/button/'
			),
			'icon'  => 'pin',
			'class' => 'is-pinterest',
			'label' => __( 'Pinterest', 'natura' ),
		);
	}
	$links['whatsapp'] = array(
		'url'   => 'https://wa.me/?text=' . rawurlencode( $context['title'] . ' ' . $context['url'] ),
		'icon'  => 'whatsapp',
		'class' => 'is-whatsapp',
		'label' => __( 'WhatsApp', 'natura' ),
	);
	$links['facebook'] = array(
		'url'   => 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $context['url'] ),
		'icon'  => 'facebook',
		'class' => 'is-facebook',
		'label' => __( 'Facebook', 'natura' ),
	);
	$links['email']    = array(
		'url'   => 'mailto:?subject=' . rawurlencode( $context['title'] ) . '&body=' . rawurlencode( $context['text'] . "\n\n" . $context['url'] ),
		'icon'  => 'mail',
		'class' => 'is-email',
		'label' => __( 'Email', 'natura' ),
	);

	return $links;
}

/**
 * Prints the "Share" bar for the current page.
 *
 * @param string $switch  Show/Hide switch in Natura Options.
 * @param string $heading Heading of the bar.
 */
function natura_the_share_bar( string $switch, string $heading = '' ): void {
	$context = natura_share_context();
	if ( ! $context || ! natura_section_enabled( $switch ) ) {
		return;
	}
	wp_enqueue_script( 'natura-share', get_template_directory_uri() . '/assets/js/share.js', array(), NATURA_VERSION, true );
	$id = wp_unique_id( 'share-' );
	?>
	<aside class="share-bar" aria-labelledby="<?php echo esc_attr( $id ); ?>">
		<h2 id="<?php echo esc_attr( $id ); ?>"><?php natura_the_icon( 'share' ); ?> <?php echo esc_html( $heading ? $heading : __( 'Share this page', 'natura' ) ); ?></h2>
		<div class="share-buttons">
			<button type="button" class="share-button share-native" data-title="<?php echo esc_attr( $context['title'] ); ?>" data-text="<?php echo esc_attr( $context['text'] ); ?>" data-url="<?php echo esc_url( $context['url'] ); ?>" hidden>
				<?php natura_the_icon( 'share' ); ?> <?php esc_html_e( 'Share', 'natura' ); ?>
			</button>
			<?php foreach ( natura_share_links( $context ) as $link ) : ?>
				<a class="share-button <?php echo esc_attr( $link['class'] ); ?>" href="<?php echo esc_url( $link['url'], array( 'https', 'mailto' ) ); ?>"<?php echo 'is-email' === $link['class'] ? '' : ' target="_blank" rel="noopener nofollow"'; ?>>
					<?php natura_the_icon( $link['icon'] ); ?> <?php echo esc_html( $link['label'] ); ?>
					<?php if ( 'is-email' !== $link['class'] ) : ?>
						<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span>
					<?php endif; ?>
				</a>
			<?php endforeach; ?>
			<button type="button" class="share-button share-copy" data-url="<?php echo esc_url( $context['url'] ); ?>" data-done="<?php esc_attr_e( 'Link copied', 'natura' ); ?>">
				<?php natura_the_icon( 'link' ); ?> <span><?php esc_html_e( 'Copy link', 'natura' ); ?></span>
			</button>
		</div>
		<p class="share-status screen-reader-text" role="status"></p>
	</aside>
	<?php
}
