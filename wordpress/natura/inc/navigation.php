<?php
/**
 * Menus: reading them, rendering them, and creating sensible defaults.
 *
 * The menus are ordinary WordPress menus (Appearance → Menus), so an editor can
 * rename, reorder, or add entries without touching code. This file turns them
 * into the markup the design needs: a desktop bar with dropdowns, and a
 * full-height sheet on phones.
 *
 * Two levels are supported. A top-level entry with children gets a dropdown on
 * desktop and an accordion on phones; the menu item "Description" field (turn
 * it on under Screen Options) becomes the line under each title.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The menu a fresh install starts with, and the fallback when no menu is
 * assigned to a location.
 *
 * Articles sit beside the task sections because the site is built from both:
 * explanatory writing, and pages that answer one practical question.
 *
 * URLs are relative to the site root. The content sections will become post
 * type archives at the same addresses, so the links keep working.
 *
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_default_primary_menu(): array {
	$tool = static fn( string $title, string $slug, string $description ): array => array(
		'title'       => $title,
		'url'         => '/tools/' . $slug . '/',
		'description' => $description,
		'children'    => array(),
	);

	return array(
		array(
			'title'       => __( 'Plants', 'natura' ),
			'url'         => '/plants/',
			'description' => __( 'How to grow each plant, and when.', 'natura' ),
			'children'    => array(
				array( 'title' => __( 'All plant guides', 'natura' ), 'url' => '/plants/', 'description' => __( 'Complete growing profiles for every plant we cover.', 'natura' ), 'children' => array() ),
				$tool( __( 'Plant finder', 'natura' ), 'plant-finder', __( 'Match plants to your light, space, and care time.', 'natura' ) ),
				$tool( __( 'What to plant this month', 'natura' ), 'planting-calendar', __( "This month's tasks for your climate and space.", 'natura' ) ),
				array( 'title' => __( 'Planting calendars', 'natura' ), 'url' => '/planting-calendars/', 'description' => __( 'Month-by-month calendars by climate.', 'natura' ), 'children' => array() ),
			),
		),
		array(
			'title'       => __( 'Problems', 'natura' ),
			'url'         => '/problems/',
			'description' => __( 'Something looks wrong. Work out what it is.', 'natura' ),
			'children'    => array(),
		),
		array(
			'title'       => __( 'Projects', 'natura' ),
			'url'         => '/projects/',
			'description' => __( 'Step-by-step builds for balconies and containers.', 'natura' ),
			'children'    => array(),
		),
		array(
			'title'       => __( 'Articles', 'natura' ),
			'url'         => '/articles/',
			'description' => __( 'Why things happen: light, water, soil, temperature.', 'natura' ),
			'children'    => array(),
		),
		array(
			'title'       => __( 'Tools', 'natura' ),
			'url'         => '/tools/',
			'description' => __( 'Work out the number instead of guessing it.', 'natura' ),
			'children'    => array(
				$tool( __( 'Plant finder', 'natura' ), 'plant-finder', __( 'Match plants to your light, space, and care time.', 'natura' ) ),
				$tool( __( 'Pot size calculator', 'natura' ), 'pot-size-calculator', __( 'Estimate a practical container range.', 'natura' ) ),
				$tool( __( 'Watering routine', 'natura' ), 'watering-calculator', __( 'A soil-check routine you can actually follow.', 'natura' ) ),
				$tool( __( 'Frost risk check', 'natura' ), 'frost-risk', __( 'Read a forecast low without false precision.', 'natura' ) ),
				$tool( __( 'Monthly planting tasks', 'natura' ), 'planting-calendar', __( 'What to do this month, for your conditions.', 'natura' ) ),
				$tool( __( 'Garden planner', 'natura' ), 'garden-planner', __( 'Lay out a compact, reachable growing space.', 'natura' ) ),
				$tool( __( 'Observation guide', 'natura' ), 'guided-diagnosis', __( 'Turn symptoms into a checklist worth acting on.', 'natura' ) ),
				$tool( __( 'My garden profile', 'natura' ), 'garden-profile', __( 'Save your conditions once; every tool uses them.', 'natura' ) ),
			),
		),
		array(
			'title'       => __( 'Gear', 'natura' ),
			'url'         => '/gear/',
			'description' => __( 'What to buy, with the criteria and the commercial relationship stated.', 'natura' ),
			'children'    => array(),
		),
	);
}

/**
 * Footer columns: each top-level entry is a heading, its children the links.
 *
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_default_footer_menu(): array {
	$link = static fn( string $title, string $url ): array => array(
		'title'       => $title,
		'url'         => $url,
		'description' => '',
		'children'    => array(),
	);

	return array(
		array(
			'title'       => __( 'Plants', 'natura' ),
			'url'         => '/plants/',
			'description' => '',
			'children'    => array(
				$link( __( 'All plant guides', 'natura' ), '/plants/' ),
				$link( __( 'Planting calendars', 'natura' ), '/planting-calendars/' ),
				$link( __( 'Plant finder', 'natura' ), '/tools/plant-finder/' ),
			),
		),
		array(
			'title'       => __( 'Read & solve', 'natura' ),
			'url'         => '/articles/',
			'description' => '',
			'children'    => array(
				$link( __( 'Articles', 'natura' ), '/articles/' ),
				$link( __( 'Plant problems', 'natura' ), '/problems/' ),
				$link( __( 'Projects', 'natura' ), '/projects/' ),
				$link( __( 'Tools', 'natura' ), '/tools/' ),
				$link( __( 'Gear', 'natura' ), '/gear/' ),
			),
		),
		array(
			'title'       => __( 'Natura', 'natura' ),
			'url'         => '/about/',
			'description' => '',
			'children'    => array(
				$link( __( 'About', 'natura' ), '/about/' ),
				$link( __( 'Editorial policy', 'natura' ), '/editorial-policy/' ),
				$link( __( 'Contact', 'natura' ), '/contact/' ),
			),
		),
	);
}

/**
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_default_legal_menu(): array {
	$link = static fn( string $title, string $url ): array => array(
		'title'       => $title,
		'url'         => $url,
		'description' => '',
		'children'    => array(),
	);

	return array(
		$link( __( 'Privacy', 'natura' ), '/privacy-policy/' ),
		$link( __( 'Legal notice', 'natura' ), '/legal-notice/' ),
		$link( __( 'Commercial disclosure', 'natura' ), '/commercial-disclosure/' ),
	);
}

/**
 * Reads the menu assigned to a location as a two-level tree, or returns the
 * default when none is assigned.
 *
 * @param string $location Menu location.
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_menu_tree( string $location ): array {
	$locations = get_nav_menu_locations();
	$items     = empty( $locations[ $location ] ) ? false : wp_get_nav_menu_items( $locations[ $location ] );

	if ( ! $items ) {
		$defaults = array(
			'primary' => 'natura_default_primary_menu',
			'footer'  => 'natura_default_footer_menu',
			'legal'   => 'natura_default_legal_menu',
		);
		$tree     = isset( $defaults[ $location ] ) ? call_user_func( $defaults[ $location ] ) : array();

		return natura_absolute_menu_urls( $tree );
	}

	$tree     = array();
	$children = array();

	foreach ( $items as $item ) {
		$entry = array(
			'title'       => $item->title,
			'url'         => $item->url,
			'description' => trim( (string) $item->description ),
			'children'    => array(),
		);

		if ( (int) $item->menu_item_parent === 0 ) {
			$tree[ (int) $item->ID ] = $entry;
		} else {
			$children[ (int) $item->menu_item_parent ][] = $entry;
		}
	}

	foreach ( $children as $parent_id => $entries ) {
		if ( isset( $tree[ $parent_id ] ) ) {
			$tree[ $parent_id ]['children'] = $entries;
		}
	}

	return array_values( $tree );
}

/**
 * Turns root-relative default URLs into full URLs for this site.
 *
 * @param array $tree Menu tree.
 */
function natura_absolute_menu_urls( array $tree ): array {
	foreach ( $tree as &$entry ) {
		if ( str_starts_with( $entry['url'], '/' ) ) {
			$entry['url'] = home_url( $entry['url'] );
		}
		$entry['children'] = natura_absolute_menu_urls( $entry['children'] );
	}

	return $tree;
}

/**
 * The path of the current request, with a trailing slash.
 */
function natura_current_path(): string {
	$request = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '/';
	$path    = (string) wp_parse_url( $request, PHP_URL_PATH );

	return trailingslashit( $path ?: '/' );
}

/**
 * Whether a URL points at the current page.
 *
 * @param string $url Menu entry URL.
 */
function natura_is_current_url( string $url ): bool {
	$path = wp_parse_url( $url, PHP_URL_PATH );

	return is_string( $path ) && trailingslashit( $path ) === natura_current_path();
}

/**
 * Whether the reader is inside a menu entry's section: on its page, below it,
 * or on one of its children.
 *
 * @param array $entry Menu entry.
 */
function natura_is_current_section( array $entry ): bool {
	$current = natura_current_path();

	foreach ( array_merge( array( $entry ), $entry['children'] ) as $candidate ) {
		$path = wp_parse_url( $candidate['url'], PHP_URL_PATH );
		if ( ! is_string( $path ) || '' === $path || '/' === $path ) {
			continue;
		}
		if ( str_starts_with( $current, trailingslashit( $path ) ) ) {
			return true;
		}
	}

	return false;
}

/**
 * `aria-current="page"` when the URL is the current page.
 *
 * @param string $url Menu entry URL.
 */
function natura_aria_current( string $url ): string {
	return natura_is_current_url( $url ) ? ' aria-current="page"' : '';
}

/**
 * Prints the desktop menu bar.
 */
function natura_desktop_navigation(): void {
	$tree = natura_menu_tree( 'primary' );
	if ( ! $tree ) {
		return;
	}
	?>
	<nav class="desktop-nav" aria-label="<?php esc_attr_e( 'Main menu', 'natura' ); ?>">
		<ul>
			<?php
			foreach ( $tree as $index => $entry ) :
				$has_menu = ! empty( $entry['children'] );
				$classes  = array( 'nav-item' );
				if ( $has_menu ) {
					$classes[] = 'has-menu';
				}
				if ( natura_is_current_section( $entry ) ) {
					$classes[] = 'is-current';
				}
				$panel_id = 'nav-panel-' . $index;
				?>
				<li class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
					<a class="nav-link" href="<?php echo esc_url( $entry['url'] ); ?>"<?php echo natura_aria_current( $entry['url'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute. ?>><?php echo esc_html( $entry['title'] ); ?></a>
					<?php if ( $has_menu ) : ?>
						<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
							<?php natura_the_icon( 'chevron' ); ?>
							<span class="screen-reader-text">
								<?php
								/* translators: %s: menu entry title. */
								printf( esc_html__( 'Show %s submenu', 'natura' ), esc_html( $entry['title'] ) );
								?>
							</span>
						</button>
						<div class="nav-dropdown<?php echo count( $entry['children'] ) > 4 ? ' nav-dropdown-wide' : ''; ?>" id="<?php echo esc_attr( $panel_id ); ?>">
							<?php foreach ( $entry['children'] as $child ) : ?>
								<a href="<?php echo esc_url( $child['url'] ); ?>"<?php echo natura_aria_current( $child['url'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute. ?>>
									<strong><?php echo esc_html( $child['title'] ); ?></strong>
									<?php if ( $child['description'] ) : ?>
										<span><?php echo esc_html( $child['description'] ); ?></span>
									<?php endif; ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<?php
}

/**
 * Prints the menu inside the mobile sheet.
 */
function natura_mobile_navigation(): void {
	$tree = natura_menu_tree( 'primary' );
	if ( ! $tree ) {
		return;
	}
	?>
	<nav aria-label="<?php esc_attr_e( 'Mobile menu', 'natura' ); ?>">
		<ul class="mobile-nav">
			<?php foreach ( $tree as $entry ) : ?>
				<li<?php echo natura_is_current_section( $entry ) ? ' class="is-current"' : ''; ?>>
					<?php if ( empty( $entry['children'] ) ) : ?>
						<a class="mobile-nav-link" href="<?php echo esc_url( $entry['url'] ); ?>"<?php echo natura_aria_current( $entry['url'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute. ?>>
							<span><?php echo esc_html( $entry['title'] ); ?><?php if ( $entry['description'] ) : ?><small><?php echo esc_html( $entry['description'] ); ?></small><?php endif; ?></span>
						</a>
					<?php else : ?>
						<details class="mobile-nav-group">
							<summary class="mobile-nav-link">
								<span><?php echo esc_html( $entry['title'] ); ?><?php if ( $entry['description'] ) : ?><small><?php echo esc_html( $entry['description'] ); ?></small><?php endif; ?></span>
								<?php natura_the_icon( 'chevron' ); ?>
							</summary>
							<ul>
								<?php foreach ( $entry['children'] as $child ) : ?>
									<li><a href="<?php echo esc_url( $child['url'] ); ?>"<?php echo natura_aria_current( $child['url'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute. ?>><?php echo esc_html( $child['title'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</details>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<?php
}

/**
 * Creates the default menus on first activation, so they appear under
 * Appearance → Menus ready to edit instead of living only in code.
 *
 * Locations that already have a menu are left alone.
 */
function natura_install_default_menus(): void {
	$menus = array(
		'primary' => array( __( 'Main menu', 'natura' ), natura_default_primary_menu() ),
		'footer'  => array( __( 'Footer columns', 'natura' ), natura_default_footer_menu() ),
		'legal'   => array( __( 'Legal links', 'natura' ), natura_default_legal_menu() ),
	);

	$locations = get_nav_menu_locations();

	foreach ( $menus as $location => list( $name, $tree ) ) {
		if ( ! empty( $locations[ $location ] ) && wp_get_nav_menu_object( $locations[ $location ] ) ) {
			continue;
		}

		$existing = wp_get_nav_menu_object( $name );
		$menu_id  = $existing ? (int) $existing->term_id : wp_create_nav_menu( $name );
		if ( is_wp_error( $menu_id ) ) {
			continue;
		}

		if ( ! $existing ) {
			natura_add_menu_entries( $menu_id, $tree, 0 );
		}

		$locations[ $location ] = $menu_id;
	}

	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Adds a tree of entries to a menu as custom links.
 *
 * @param int   $menu_id   Menu term ID.
 * @param array $tree      Entries.
 * @param int   $parent_id Parent menu item ID.
 */
function natura_add_menu_entries( int $menu_id, array $tree, int $parent_id ): void {
	foreach ( $tree as $entry ) {
		$item_id = wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'       => $entry['title'],
				'menu-item-url'         => home_url( $entry['url'] ),
				'menu-item-description' => $entry['description'],
				'menu-item-parent-id'   => $parent_id,
				'menu-item-type'        => 'custom',
				'menu-item-status'      => 'publish',
			)
		);

		if ( ! is_wp_error( $item_id ) && ! empty( $entry['children'] ) ) {
			natura_add_menu_entries( $menu_id, $entry['children'], (int) $item_id );
		}
	}
}

add_action( 'after_switch_theme', 'natura_install_default_menus' );
