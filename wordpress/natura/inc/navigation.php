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
 * Builds one menu entry.
 *
 * @param string $title       Label.
 * @param string $url         Root-relative URL.
 * @param string $description Line shown under the label.
 * @param array  $children    Child entries.
 */
function natura_menu_entry( string $title, string $url, string $description = '', array $children = array() ): array {
	return array(
		'title'       => $title,
		'url'         => $url,
		'description' => $description,
		'children'    => $children,
	);
}

/**
 * The menu a fresh install starts with, and the fallback when no menu is
 * assigned to a location.
 *
 * One rule: every page appears once. The earlier menu listed the plant finder
 * under both Plants and Tools, and the same monthly calendar under three
 * different names, so readers could not tell the entries apart.
 *
 *  - Plants is browsed by kind, the way readers search ("herbs for a balcony").
 *  - Plant Care holds everything about looking after a plant: the problem
 *    guides first, then articles grouped by topic. Separate "Problems" and
 *    "Articles" entries covered the same ground, and readers could not tell
 *    which one to open. The topic links will be post category archives.
 *  - Labels say what is behind them: "DIY Projects" for the step-by-step
 *    builds, "Gear" for equipment.
 *  - Tools holds everything interactive, the planting calendar included.
 *  - A dropdown never repeats its parent. On phones, where the parent is a
 *    toggle rather than a link, the sheet adds "All …" by itself.
 *
 * URLs are relative to the site root. The content sections will become post
 * type and category archives at the same addresses, so the links keep working.
 *
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_default_primary_menu(): array {
	return array(
		natura_menu_entry(
			__( 'Plants', 'natura' ),
			'/plants/',
			__( 'How to grow each plant in a pot or small space.', 'natura' ),
			array(
				natura_menu_entry( __( 'Vegetables', 'natura' ), '/plants/vegetables/', __( 'Tomatoes, peppers, salads, beans, and more.', 'natura' ) ),
				natura_menu_entry( __( 'Herbs', 'natura' ), '/plants/herbs/', __( 'Basil, mint, thyme, and kitchen herbs.', 'natura' ) ),
				natura_menu_entry( __( 'Fruit', 'natura' ), '/plants/fruit/', __( 'Strawberries and compact fruit for containers.', 'natura' ) ),
			)
		),
		natura_menu_entry(
			__( 'Plant Care', 'natura' ),
			'/plant-care/',
			__( 'Keep plants healthy, and fix what goes wrong.', 'natura' ),
			array(
				natura_menu_entry( __( 'Plant problems', 'natura' ), '/problems/', __( 'Yellow leaves, pests, wilting: find the cause.', 'natura' ) ),
				natura_menu_entry( __( 'Watering', 'natura' ), '/plant-care/watering/', __( 'How much, how often, and how to check.', 'natura' ) ),
				natura_menu_entry( __( 'Soil & feeding', 'natura' ), '/plant-care/soil-feeding/', __( 'Compost, fertiliser, and repotting.', 'natura' ) ),
				natura_menu_entry( __( 'Light & position', 'natura' ), '/plant-care/light-position/', __( 'Sun, shade, wind, and where to put pots.', 'natura' ) ),
				natura_menu_entry( __( 'Seasonal care', 'natura' ), '/plant-care/seasonal-care/', __( 'What changes through the year.', 'natura' ) ),
			)
		),
		natura_menu_entry( __( 'DIY Projects', 'natura' ), '/projects/', __( 'Step-by-step builds: herb troughs, salad crates, and more.', 'natura' ) ),
		natura_menu_entry(
			__( 'Tools', 'natura' ),
			'/tools/',
			__( 'Calendars and calculators that answer one question each.', 'natura' ),
			array(
				natura_menu_entry( __( 'Planting calendar', 'natura' ), '/tools/planting-calendar/', __( 'What to sow and plant this month, by climate.', 'natura' ) ),
				natura_menu_entry( __( 'Plant finder', 'natura' ), '/tools/plant-finder/', __( 'Which plants suit your light and space.', 'natura' ) ),
				natura_menu_entry( __( 'Pot size calculator', 'natura' ), '/tools/pot-size-calculator/', __( 'How big a container each plant needs.', 'natura' ) ),
				natura_menu_entry( __( 'Watering routine', 'natura' ), '/tools/watering-calculator/', __( 'When to check the soil, and how.', 'natura' ) ),
				natura_menu_entry( __( 'Frost risk check', 'natura' ), '/tools/frost-risk/', __( 'Whether tonight\'s low is a risk for your plants.', 'natura' ) ),
				natura_menu_entry( __( 'Garden planner', 'natura' ), '/tools/garden-planner/', __( 'Lay out a small space you can reach.', 'natura' ) ),
				natura_menu_entry( __( 'Symptom checker', 'natura' ), '/tools/guided-diagnosis/', __( 'Note what you see before you treat.', 'natura' ) ),
			)
		),
		natura_menu_entry( __( 'Gear', 'natura' ), '/gear/', __( 'Pots, soil, and kit compared, with clear criteria.', 'natura' ) ),
	);
}

/**
 * Footer columns: each top-level entry is a heading, its children the links.
 *
 * The header already lists every section, so the footer does not repeat it.
 * It carries what the header does not: the most searched plant guides, and
 * the pages about the site.
 *
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_default_footer_menu(): array {
	return array(
		natura_menu_entry(
			__( 'Popular guides', 'natura' ),
			'/plants/',
			'',
			array(
				natura_menu_entry( __( 'Cherry tomatoes in pots', 'natura' ), '/plants/cherry-tomato/' ),
				natura_menu_entry( __( 'Basil on a windowsill', 'natura' ), '/plants/genovese-basil/' ),
				natura_menu_entry( __( 'Balcony strawberries', 'natura' ), '/plants/balcony-strawberry/' ),
				natura_menu_entry( __( 'Yellow leaves', 'natura' ), '/problems/yellow-leaves-container-plants/' ),
			)
		),
		natura_menu_entry(
			__( 'About Natura', 'natura' ),
			'/about/',
			'',
			array(
				natura_menu_entry( __( 'About us', 'natura' ), '/about/' ),
				natura_menu_entry( __( 'How we write and test', 'natura' ), '/editorial-policy/' ),
				natura_menu_entry( __( 'Contact', 'natura' ), '/contact/' ),
			)
		),
	);
}

/**
 * @return array<int, array{title: string, url: string, description: string, children: array}>
 */
function natura_default_legal_menu(): array {
	return array(
		natura_menu_entry( __( 'Privacy', 'natura' ), '/privacy-policy/' ),
		natura_menu_entry( __( 'Legal notice', 'natura' ), '/legal-notice/' ),
		natura_menu_entry( __( 'Affiliate disclosure', 'natura' ), '/commercial-disclosure/' ),
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
	$current = natura_section_paths();

	foreach ( array_merge( array( $entry ), $entry['children'] ) as $candidate ) {
		$path = wp_parse_url( $candidate['url'], PHP_URL_PATH );
		if ( ! is_string( $path ) || '' === $path || '/' === $path ) {
			continue;
		}
		foreach ( $current as $current_path ) {
			if ( str_starts_with( $current_path, trailingslashit( $path ) ) ) {
				return true;
			}
		}
	}

	return false;
}

/**
 * The paths the current page belongs to: its own, plus, for an article, its
 * topic. Articles keep short addresses (/how-often-to-water/), but they sit in
 * Plant Care, so the menu marks that section.
 *
 * @return string[]
 */
function natura_section_paths(): array {
	$paths = array( natura_current_path() );

	if ( is_singular( 'post' ) && function_exists( 'natura_post_topic' ) ) {
		$topic = natura_post_topic();
		$path  = $topic ? wp_parse_url( (string) get_term_link( $topic ), PHP_URL_PATH ) : null;
		if ( is_string( $path ) && '' !== $path ) {
			$paths[] = trailingslashit( $path );
		}
	}

	return $paths;
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
								<li>
									<a href="<?php echo esc_url( $entry['url'] ); ?>"<?php echo natura_aria_current( $entry['url'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute. ?>>
										<?php
										/* translators: %s: menu entry title, e.g. "Plants". */
										printf( esc_html__( 'All %s', 'natura' ), esc_html( mb_strtolower( $entry['title'] ) ) );
										?>
									</a>
								</li>
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
