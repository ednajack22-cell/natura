<?php
/**
 * Tools: the hub (/tools/) and each tool (/tools/plant-finder/, …).
 *
 * Natura Core routes /tools/ and /tools/{slug}/; this file says which tools
 * exist and presents them. From the review of current tools (design/TOOLS.md):
 * the tool comes first, without a sign-up box or an ad above it; it answers
 * from the site's own guides, never from invented figures; and it works
 * without JavaScript where it can.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Every tool: slug => title, one line, what the reader needs, group, icon,
 * and the address (tools outside /tools/, like the calendar, give theirs).
 *
 * @return array<string, array{title: string, text: string, needs: string, group: string, icon: string, url?: string}>
 */
function natura_tools(): array {
	return array(
		'plant-finder'      => array(
			'title' => __( 'Plant finder', 'natura' ),
			'text'  => __( 'Which plants suit your light, your space, and your experience.', 'natura' ),
			'needs' => __( 'How many hours of direct sun your spot gets', 'natura' ),
			'group' => 'choose',
			'icon'  => 'lens',
		),
		'planting-calendar' => array(
			'title' => __( 'Planting calendar', 'natura' ),
			'text'  => __( 'What to sow, plant out, and harvest in pots, month by month.', 'natura' ),
			'needs' => __( 'Nothing: it opens on this month', 'natura' ),
			'group' => 'choose',
			'icon'  => 'calendar',
			'url'   => function_exists( 'natura_core_calendar_url' ) ? natura_core_calendar_url() : '',
		),
	);
}

/**
 * The tool groups of the hub, in order.
 *
 * @return array<string, string>
 */
function natura_tool_groups(): array {
	return array(
		'choose' => __( 'Choose and plan', 'natura' ),
		'care'   => __( 'Calculate and care', 'natura' ),
		'fix'    => __( 'Check and fix', 'natura' ),
	);
}

/**
 * The tools shown on the site: those switched on in Natura Options, with a
 * working address.
 *
 * @return array<string, array{title: string, text: string, needs: string, group: string, icon: string, url: string}>
 */
function natura_active_tools(): array {
	$tools = array();
	foreach ( natura_tools() as $slug => $tool ) {
		if ( ! natura_section_enabled( 'tool_' . str_replace( '-', '_', $slug ) ) ) {
			continue;
		}
		$tool['url'] = $tool['url'] ?? home_url( '/tools/' . $slug . '/' );
		if ( '' !== $tool['url'] ) {
			$tools[ $slug ] = $tool;
		}
	}

	return $tools;
}

/**
 * The tool shown on the current page: its slug, '' on the hub, or null when
 * the page is not a tools page.
 */
function natura_current_tool(): ?string {
	if ( ! function_exists( 'natura_core_is_tools' ) || ! natura_core_is_tools() ) {
		return null;
	}

	return sanitize_key( (string) get_query_var( 'natura_tool' ) );
}

/*
 * A tool that does not exist or is switched off is a 404, like any missing
 * page.
 */
add_action(
	'template_redirect',
	static function (): void {
		$slug = natura_current_tool();
		if ( null === $slug || '' === $slug ) {
			return;
		}
		$tools = natura_active_tools();
		// The calendar's old address under /tools/ leads to the calendar.
		if ( isset( $tools[ $slug ] ) && isset( natura_tools()[ $slug ]['url'] ) ) {
			wp_safe_redirect( $tools[ $slug ]['url'], 301 );
			exit;
		}
		if ( ! isset( $tools[ $slug ] ) ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			nocache_headers();
		}
	}
);

add_filter(
	'template_include',
	static function ( string $template ): string {
		if ( null === natura_current_tool() || is_404() ) {
			return $template;
		}

		return locate_template( 'tools.php' ) ?: $template;
	}
);

/**
 * The title of a tools page.
 *
 * @param string $slug Tool slug, '' for the hub.
 */
function natura_tool_page_title( string $slug ): string {
	if ( 'plant-finder' === $slug ) {
		return __( 'Plant finder: what to grow in your pots', 'natura' );
	}
	$tools = natura_tools();

	return isset( $tools[ $slug ] ) ? $tools[ $slug ]['title'] : __( 'Tools for growing in pots', 'natura' );
}

/**
 * The introduction of a tools page, set in Natura Options.
 *
 * @param string $slug Tool slug, '' for the hub.
 */
function natura_tool_intro( string $slug ): string {
	$key = '' === $slug ? 'natura_tools_intro' : 'natura_tool_intro_' . str_replace( '-', '_', $slug );

	return natura_home_setting( $key );
}

/**
 * The address of a tools page.
 *
 * @param string $slug Tool slug, '' for the hub.
 */
function natura_tool_url( string $slug ): string {
	return home_url( '' === $slug ? '/tools/' : '/tools/' . $slug . '/' );
}

/**
 * The breadcrumb trail of a tools page.
 *
 * @param string $slug Tool slug, '' for the hub.
 * @return array<int, array{name: string, url: string}>
 */
function natura_tool_breadcrumbs( string $slug ): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Tools', 'natura' ), natura_tool_url( '' ) ),
	);
	if ( '' !== $slug && isset( natura_tools()[ $slug ] ) ) {
		$trail[] = natura_crumb( natura_tools()[ $slug ]['title'], natura_tool_url( $slug ) );
	}

	return $trail;
}

add_filter(
	'document_title_parts',
	static function ( array $parts ): array {
		$slug = natura_current_tool();
		if ( null !== $slug && ! is_404() ) {
			$parts['title'] = natura_tool_page_title( $slug );
		}
		return $parts;
	}
);

add_action(
	'wp_head',
	static function (): void {
		$slug = natura_current_tool();
		if ( null === $slug || is_404() || natura_seo_plugin_active() ) {
			return;
		}
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( natura_tool_url( $slug ) ) );
		if ( natura_tool_intro( $slug ) ) {
			printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_strip_all_tags( natura_tool_intro( $slug ) ) ) );
		}
		printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( natura_tool_page_title( $slug ) ) );
		printf( '<meta property="og:url" content="%s">' . "\n", esc_url( natura_tool_url( $slug ) ) );
	}
);

/*
 * A filtered plant finder is one of many near-identical pages: kept out of
 * search results, with its canonical pointing at the plain finder.
 */
add_filter(
	'wp_robots',
	static function ( array $robots ): array {
		if ( 'plant-finder' === natura_current_tool() && natura_finder_filters() ) {
			$robots['noindex'] = true;
			$robots['follow']  = true;
		}
		return $robots;
	}
);

/**
 * Structured data of a tools page: the breadcrumb, and on a tool page a
 * WebApplication (free, runs in the browser).
 *
 * @param string $slug Tool slug, '' for the hub.
 */
function natura_tool_structured_data( string $slug ): string {
	if ( natura_seo_plugin_active() ) {
		return '';
	}
	$graph = array( natura_breadcrumb_data( natura_tool_breadcrumbs( $slug ) ) );
	if ( '' !== $slug ) {
		$graph[] = array(
			'@type'               => 'WebApplication',
			'name'                => natura_tools()[ $slug ]['title'] ?? '',
			'url'                 => natura_tool_url( $slug ),
			'description'         => natura_tool_intro( $slug ),
			'applicationCategory' => 'LifestyleApplication',
			'operatingSystem'     => 'Any',
			'isAccessibleForFree' => true,
		);
	}

	return natura_json_ld( $graph );
}

/* ---------------------------------------------------------------------------
   Plant finder
   --------------------------------------------------------------------------- */

/**
 * The finder's questions: key => label, and choices value => label. Choices
 * come from the site's own terms and fields, so the finder never offers an
 * answer no guide has.
 *
 * @return array<string, array{label: string, hint: string, choices: array<string, string>}>
 */
function natura_finder_questions(): array {
	$questions = array();
	$terms     = static function ( string $taxonomy ): array {
		if ( ! taxonomy_exists( $taxonomy ) ) {
			return array();
		}
		$found = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
			)
		);

		return is_wp_error( $found ) ? array() : wp_list_pluck( $found, 'name', 'slug' );
	};

	$questions['light'] = array(
		'label'   => __( 'How much direct sun does your spot get?', 'natura' ),
		'hint'    => __( 'Count the hours of direct sun on a clear day in summer.', 'natura' ),
		'choices' => $terms( 'plant_sun' ),
	);
	$questions['space'] = array(
		'label'   => __( 'Where will the pots go?', 'natura' ),
		'hint'    => '',
		'choices' => $terms( 'plant_space' ),
	);
	$questions['type']  = array(
		'label'   => __( 'What would you like to grow?', 'natura' ),
		'hint'    => '',
		'choices' => $terms( 'plant_type' ),
	);
	$questions['level'] = array(
		'label'   => __( 'How much experience do you have?', 'natura' ),
		'hint'    => '',
		'choices' => array(
			'Easy'     => __( 'Beginner: easy plants only', 'natura' ),
			'Moderate' => __( 'Some: easy or moderate', 'natura' ),
		),
	);
	$questions['now']   = array(
		'label'   => __( 'When do you want to start?', 'natura' ),
		'hint'    => '',
		'choices' => array(
			/* translators: %s: month name. */
			'1' => sprintf( __( 'This month (%s)', 'natura' ), wp_date( 'F' ) ),
		),
	);

	return array_filter( $questions, static fn( array $q ): bool => (bool) $q['choices'] );
}

/**
 * The answers in the address (?light=full-sun&space=balcony…), checked
 * against the choices offered.
 *
 * @return array<string, string>
 */
function natura_finder_filters(): array {
	static $filters = null;
	if ( null !== $filters ) {
		return $filters;
	}
	$filters = array();
	if ( 'plant-finder' !== natura_current_tool() ) {
		return $filters;
	}
	foreach ( natura_finder_questions() as $key => $question ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only search form.
		$value = isset( $_GET[ $key ] ) ? sanitize_text_field( wp_unslash( (string) $_GET[ $key ] ) ) : '';
		if ( '' !== $value && isset( $question['choices'][ $value ] ) ) {
			$filters[ $key ] = $value;
		}
	}

	return $filters;
}

/**
 * The plant guides that match the answers, by name.
 *
 * @param array<string, string> $filters Answers.
 */
function natura_finder_query( array $filters ): WP_Query {
	$tax  = array( 'relation' => 'AND' );
	$meta = array( 'relation' => 'AND' );
	foreach ( array(
		'light' => 'plant_sun',
		'space' => 'plant_space',
		'type'  => 'plant_type',
	) as $key => $taxonomy ) {
		if ( isset( $filters[ $key ] ) ) {
			$tax[] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $filters[ $key ],
			);
		}
	}
	if ( isset( $filters['level'] ) ) {
		$meta[] = array(
			'key'     => '_natura_difficulty',
			'value'   => 'Easy' === $filters['level'] ? array( 'Easy' ) : array( 'Easy', 'Moderate' ),
			'compare' => 'IN',
		);
	}
	if ( isset( $filters['now'] ) ) {
		$month  = (int) wp_date( 'n' );
		$meta[] = array(
			'relation' => 'OR',
			array(
				'key'   => '_natura_sow_month',
				'value' => $month,
			),
			array(
				'key'   => '_natura_plant_month',
				'value' => $month,
			),
		);
	}

	return new WP_Query(
		array(
			'post_type'      => 'plant',
			'posts_per_page' => 60,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'no_found_rows'  => true,
			'tax_query'      => $tax, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- small table, cached by the page cache.
			'meta_query'     => $meta, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
		)
	);
}
