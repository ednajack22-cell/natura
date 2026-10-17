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
		'pot-size-calculator' => array(
			'title' => __( 'Pot size calculator', 'natura' ),
			'text'  => __( 'How much compost a pot or trough holds, how many bags to buy, and the pot size each plant needs.', 'natura' ),
			'needs' => __( 'A tape measure: the width and depth of your pot', 'natura' ),
			'group' => 'care',
			'icon'  => 'pot',
		),
		'watering-calculator' => array(
			'title' => __( 'Watering routine', 'natura' ),
			'text'  => __( 'When to check your pots and how to water them, for your season, pots, and spot.', 'natura' ),
			'needs' => __( 'Your pots\' size and material, and how sunny the spot is', 'natura' ),
			'group' => 'care',
			'icon'  => 'drop',
		),
		'frost-risk'        => array(
			'title' => __( 'Frost risk check', 'natura' ),
			'text'  => __( 'Type tonight\'s forecast low and see which of your plants are below their limit.', 'natura' ),
			'needs' => __( 'Tonight\'s lowest temperature from your weather forecast', 'natura' ),
			'group' => 'fix',
			'icon'  => 'sun',
		),
		'guided-diagnosis'  => array(
			'title' => __( 'Symptom checker', 'natura' ),
			'text'  => __( 'Pick the plant and where the trouble shows, and see the likely causes before you treat anything.', 'natura' ),
			'needs' => __( 'A close look at the leaves, fruit, stems, and compost', 'natura' ),
			'group' => 'fix',
			'icon'  => 'leaf',
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
	if ( 'pot-size-calculator' === $slug ) {
		return __( 'Pot size calculator: how much compost does your pot hold?', 'natura' );
	}
	if ( 'watering-calculator' === $slug ) {
		return __( 'Watering routine: when to water plants in pots', 'natura' );
	}
	if ( 'frost-risk' === $slug ) {
		return __( 'Frost risk check: are my pots safe tonight?', 'natura' );
	}
	if ( 'guided-diagnosis' === $slug ) {
		return __( 'Symptom checker: what is wrong with my plant?', 'natura' );
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
	}
);

/*
 * A tool page with answers in its address is one of many near-identical
 * pages: kept out of search results, with its canonical pointing at the
 * plain tool.
 */
add_filter(
	'wp_robots',
	static function ( array $robots ): array {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- only checks whether answers are present.
		if ( natura_current_tool() && array_filter( array_map( 'is_string', $_GET ) ) ) {
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

/* ---------------------------------------------------------------------------
   Symptom checker
   --------------------------------------------------------------------------- */

/**
 * The checker's questions: the plants that have at least one problem guide,
 * and the places on a plant where those problems show.
 *
 * @return array<string, array{label: string, hint: string, choices: array<string, string>}>
 */
function natura_diagnosis_questions(): array {
	$questions = array();
	if ( ! post_type_exists( 'problem' ) ) {
		return $questions;
	}

	$plant_ids = array();
	foreach ( get_posts(
		array(
			'post_type'      => 'problem',
			'posts_per_page' => 200,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	) as $problem_id ) {
		$plant_ids = array_merge( $plant_ids, array_map( 'absint', (array) get_post_meta( (int) $problem_id, '_natura_plant' ) ) );
	}
	$plants = array();
	foreach ( array_unique( $plant_ids ) as $plant_id ) {
		if ( $plant_id && 'publish' === get_post_status( $plant_id ) ) {
			$plants[ get_post_field( 'post_name', $plant_id ) ] = natura_plant_short_name( $plant_id );
		}
	}
	asort( $plants, SORT_NATURAL | SORT_FLAG_CASE );

	$parts = taxonomy_exists( 'problem_part' ) ? get_terms(
		array(
			'taxonomy'   => 'problem_part',
			'hide_empty' => true,
		)
	) : array();

	$questions['plant'] = array(
		'label'   => __( 'Which plant is it?', 'natura' ),
		'hint'    => '',
		'choices' => $plants,
	);
	$questions['part']  = array(
		'label'   => __( 'Where do you see the problem?', 'natura' ),
		'hint'    => __( 'Look at the whole plant, including the undersides of the leaves and the compost.', 'natura' ),
		'choices' => is_wp_error( $parts ) ? array() : wp_list_pluck( $parts, 'name', 'slug' ),
	);

	return array_filter( $questions, static fn( array $q ): bool => (bool) $q['choices'] );
}

/**
 * The answers in the address, checked against the choices offered.
 *
 * @return array<string, string>
 */
function natura_diagnosis_answers(): array {
	$answers = array();
	foreach ( natura_diagnosis_questions() as $key => $question ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only search form.
		$value = isset( $_GET[ $key ] ) ? sanitize_text_field( wp_unslash( (string) $_GET[ $key ] ) ) : '';
		if ( '' !== $value && isset( $question['choices'][ $value ] ) ) {
			$answers[ $key ] = $value;
		}
	}

	return $answers;
}

/**
 * The problem guides that match the answers.
 *
 * @param array<string, string> $answers Answers.
 */
function natura_diagnosis_query( array $answers ): WP_Query {
	$args = array(
		'post_type'      => 'problem',
		'posts_per_page' => 30,
		'orderby'        => 'title',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	);
	if ( isset( $answers['plant'] ) ) {
		$plant = get_page_by_path( $answers['plant'], OBJECT, 'plant' );
		// phpcs:disable WordPress.DB.SlowDBQuery -- a handful of rows, cached by the page cache.
		$args['meta_key']   = '_natura_plant';
		$args['meta_value'] = $plant ? $plant->ID : 0;
		// phpcs:enable
	}
	if ( isset( $answers['part'] ) ) {
		$args['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
			array(
				'taxonomy' => 'problem_part',
				'field'    => 'slug',
				'terms'    => $answers['part'],
			),
		);
	}

	return new WP_Query( $args );
}

/**
 * Prints one question of a tool form: a fieldset of chips, "Any" first.
 *
 * @param string                                                     $key      Answer name in the address.
 * @param array{label: string, hint: string, choices: array<string, string>} $question Question.
 * @param array<string, string>                                      $answers  Current answers.
 * @param bool                                                       $any      Offer "Any" first.
 */
function natura_the_tool_question( string $key, array $question, array $answers, bool $any = true ): void {
	?>
	<fieldset class="finder-question">
		<legend><?php echo esc_html( $question['label'] ); ?></legend>
		<?php if ( $question['hint'] ) : ?>
			<p class="finder-hint"><?php echo esc_html( $question['hint'] ); ?></p>
		<?php endif; ?>
		<div class="finder-choices">
			<?php if ( $any ) : ?>
				<label>
					<input type="radio" name="<?php echo esc_attr( $key ); ?>" value=""<?php checked( ! isset( $answers[ $key ] ) ); ?>>
					<span><?php esc_html_e( 'Any', 'natura' ); ?></span>
				</label>
			<?php endif; ?>
			<?php foreach ( $question['choices'] as $value => $label ) : ?>
				<label>
					<input type="radio" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( (string) $value ); ?>"<?php checked( ( $answers[ $key ] ?? null ) === (string) $value ); ?>>
					<span><?php echo esc_html( $label ); ?></span>
				</label>
			<?php endforeach; ?>
		</div>
	</fieldset>
	<?php
}

/* ---------------------------------------------------------------------------
   Pot size calculator
   --------------------------------------------------------------------------- */

/**
 * Common bag sizes: litres => label. UK bags are sold in litres, US bags in
 * cubic feet (1 cu ft = 28.3 L).
 *
 * @return array<int, string>
 */
function natura_pot_bags(): array {
	return array(
		10 => '10 L',
		20 => '20 L',
		28 => '1 cu ft (28 L)',
		40 => '40 L',
		42 => '1.5 cu ft (42 L)',
		50 => '50 L',
		57 => '2 cu ft (57 L)',
		70 => '70 L',
	);
}

/**
 * The calculator's measurements from the address, checked: shape, unit,
 * sizes (top, bottom, length, depth), and bag size in litres.
 *
 * @return array{shape: string, unit: string, top: float, bottom: float, length: float, depth: float, bag: int}
 */
function natura_pot_input(): array {
	// phpcs:disable WordPress.Security.NonceVerification.Recommended -- read-only calculator.
	$text   = static fn( string $key ): string => isset( $_GET[ $key ] ) ? sanitize_text_field( wp_unslash( (string) $_GET[ $key ] ) ) : '';
	$number = static function ( string $key ) use ( $text ): float {
		$value = (float) str_replace( ',', '.', $text( $key ) );

		return ( $value > 0 && $value < 1000 ) ? $value : 0.0;
	};
	$input  = array(
		'shape'  => in_array( $text( 'shape' ), array( 'round', 'square', 'trough' ), true ) ? $text( 'shape' ) : 'round',
		'unit'   => 'in' === $text( 'unit' ) ? 'in' : 'cm',
		'top'    => $number( 'top' ),
		'bottom' => $number( 'bottom' ),
		'length' => $number( 'length' ),
		'depth'  => $number( 'depth' ),
		'bag'    => isset( natura_pot_bags()[ (int) $text( 'bag' ) ] ) ? (int) $text( 'bag' ) : 40,
	);
	// phpcs:enable

	return $input;
}

/**
 * The volume of the pot in litres, or 0 when a measurement is missing.
 *
 * Round pot: a cylinder, or a truncated cone when the bottom is narrower.
 * Square pot: a cuboid, or a truncated pyramid. Trough: length × width ×
 * depth. Inches are converted at 2.54 cm.
 *
 * @param array{shape: string, unit: string, top: float, bottom: float, length: float, depth: float, bag: int} $input Measurements.
 */
function natura_pot_litres( array $input ): float {
	$scale  = 'in' === $input['unit'] ? 2.54 : 1.0;
	$top    = $input['top'] * $scale;
	$bottom = ( $input['bottom'] > 0 ? $input['bottom'] : $input['top'] ) * $scale;
	$depth  = $input['depth'] * $scale;
	$length = $input['length'] * $scale;
	if ( $top <= 0 || $depth <= 0 ) {
		return 0.0;
	}

	switch ( $input['shape'] ) {
		case 'trough':
			$cm3 = $length > 0 ? $length * $top * $depth : 0.0;
			break;
		case 'square':
			$cm3 = $depth / 3 * ( $top * $top + $bottom * $bottom + $top * $bottom );
			break;
		default:
			$r1  = $top / 2;
			$r2  = $bottom / 2;
			$cm3 = M_PI * $depth / 3 * ( $r1 * $r1 + $r1 * $r2 + $r2 * $r2 );
	}

	return $cm3 / 1000;
}

/**
 * The plant guides that give a pot size, by name.
 *
 * @return array<int, array{name: string, url: string, size: string}>
 */
function natura_pot_sizes_from_guides(): array {
	$rows = array();
	foreach ( get_posts(
		array(
			'post_type'      => 'plant',
			'posts_per_page' => 200,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	) as $id ) {
		$size = trim( (string) natura_field( 'pot_size', (int) $id ) );
		if ( '' !== $size ) {
			$rows[] = array(
				'name' => natura_plant_short_name( (int) $id ),
				'url'  => (string) get_permalink( (int) $id ),
				'size' => $size,
			);
		}
	}
	usort( $rows, static fn( array $a, array $b ): int => strcasecmp( $a['name'], $b['name'] ) );

	return $rows;
}

/* ---------------------------------------------------------------------------
   Frost risk check
   --------------------------------------------------------------------------- */

/**
 * The RHS hardiness ratings: the lowest temperature (°C) of each band, and
 * what it means. Source: RHS hardiness rating (rhs.org.uk/advice/rhs-hardiness-rating).
 * H7 has no lower limit in the table ("below −20 °C").
 *
 * @return array<string, array{min: float|null, text: string}>
 */
function natura_rhs_ratings(): array {
	return array(
		'H1a' => array( 'min' => 15.0, 'text' => __( 'under glass all year', 'natura' ) ),
		'H1b' => array( 'min' => 10.0, 'text' => __( 'outdoors in summer only', 'natura' ) ),
		'H1c' => array( 'min' => 5.0, 'text' => __( 'outdoors in summer only', 'natura' ) ),
		'H2'  => array( 'min' => 1.0, 'text' => __( 'tender: will not survive being frozen', 'natura' ) ),
		'H3'  => array( 'min' => -5.0, 'text' => __( 'half hardy: at risk from early frosts', 'natura' ) ),
		'H4'  => array( 'min' => -10.0, 'text' => __( 'hardy in an average winter', 'natura' ) ),
		'H5'  => array( 'min' => -15.0, 'text' => __( 'hardy in a cold winter', 'natura' ) ),
		'H6'  => array( 'min' => -20.0, 'text' => __( 'hardy in a very cold winter', 'natura' ) ),
		'H7'  => array( 'min' => null, 'text' => __( 'very hardy', 'natura' ) ),
	);
}

/**
 * The forecast low from the address, in °C, or null when not given.
 *
 * @return array{low: float|null, unit: string, typed: string}
 */
function natura_frost_input(): array {
	// phpcs:disable WordPress.Security.NonceVerification.Recommended -- read-only check.
	$unit  = isset( $_GET['unit'] ) && 'f' === sanitize_key( wp_unslash( (string) $_GET['unit'] ) ) ? 'f' : 'c';
	$typed = isset( $_GET['low'] ) ? trim( sanitize_text_field( wp_unslash( (string) $_GET['low'] ) ) ) : '';
	// phpcs:enable
	$typed = str_replace( array( ',', '−' ), array( '.', '-' ), $typed );
	$low   = null;
	if ( is_numeric( $typed ) ) {
		$value = (float) $typed;
		$value = 'f' === $unit ? ( $value - 32 ) * 5 / 9 : $value;
		$low   = ( $value >= -40 && $value <= 45 ) ? $value : null;
	}

	return array(
		'low'   => $low,
		'unit'  => $unit,
		'typed' => $typed,
	);
}

/**
 * The plant guides with an RHS hardiness rating, coldest-sensitive first.
 *
 * @return array<int, array{name: string, url: string, rating: string, min: float|null, text: string}>
 */
function natura_frost_plants(): array {
	$ratings = natura_rhs_ratings();
	$rows    = array();
	foreach ( get_posts(
		array(
			'post_type'      => 'plant',
			'posts_per_page' => 200,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	) as $id ) {
		$rating = (string) natura_field( 'hardiness', (int) $id );
		if ( isset( $ratings[ $rating ] ) ) {
			$rows[] = array(
				'name'   => natura_plant_short_name( (int) $id ),
				'url'    => (string) get_permalink( (int) $id ),
				'rating' => $rating,
				'min'    => $ratings[ $rating ]['min'],
				'text'   => $ratings[ $rating ]['text'],
			);
		}
	}
	usort(
		$rows,
		static fn( array $a, array $b ): int => array( -( $a['min'] ?? -99 ), $a['name'] ) <=> array( -( $b['min'] ?? -99 ), $b['name'] )
	);

	return $rows;
}

/**
 * A temperature in the reader's unit, e.g. "5 °C" or "41 °F".
 *
 * @param float  $celsius Temperature in °C.
 * @param string $unit    c or f.
 */
function natura_temperature( float $celsius, string $unit ): string {
	return 'f' === $unit
		? number_format_i18n( round( $celsius * 9 / 5 + 32 ) ) . ' °F'
		: number_format_i18n( round( $celsius ) ) . ' °C';
}

/* ---------------------------------------------------------------------------
   Watering routine
   --------------------------------------------------------------------------- */

/**
 * The routine's questions; every one has an answer, the season defaulting to
 * the current month.
 *
 * @return array<string, array{label: string, hint: string, choices: array<string, string>}>
 */
function natura_watering_questions(): array {
	return array(
		'season'   => array(
			'label'   => __( 'Time of year', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'grow'   => __( 'Spring to autumn', 'natura' ),
				'winter' => __( 'Winter', 'natura' ),
			),
		),
		'size'     => array(
			'label'   => __( 'Your pots', 'natura' ),
			'hint'    => __( 'A large pot holds more compost, so it dries out more slowly.', 'natura' ),
			'choices' => array(
				'small' => __( 'Mostly small pots', 'natura' ),
				'large' => __( 'Mostly large pots or troughs', 'natura' ),
			),
		),
		'material' => array(
			'label'   => __( 'Made of', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'terracotta' => __( 'Unglazed terracotta', 'natura' ),
				'other'      => __( 'Plastic, glazed, or metal', 'natura' ),
			),
		),
		'sun'      => array(
			'label'   => __( 'Their spot', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'sun'   => __( 'Full sun', 'natura' ),
				'shade' => __( 'Some shade', 'natura' ),
			),
		),
		'heat'     => array(
			'label'   => __( 'The weather now', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'normal' => __( 'Mild', 'natura' ),
				'hot'    => __( 'Hot spell', 'natura' ),
			),
		),
		'shelter'  => array(
			'label'   => __( 'Are they under eaves, a balcony above, or against a wall?', 'natura' ),
			'hint'    => __( 'These spots stay dry when it rains.', 'natura' ),
			'choices' => array(
				'no'  => __( 'No, they get the rain', 'natura' ),
				'yes' => __( 'Yes, rain barely reaches them', 'natura' ),
			),
		),
	);
}

/**
 * The answers from the address, each defaulting to its first choice (the
 * season to this month's).
 *
 * @return array<string, string>
 */
function natura_watering_answers(): array {
	$month   = (int) wp_date( 'n' );
	$answers = array();
	foreach ( natura_watering_questions() as $key => $question ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only tool.
		$value           = isset( $_GET[ $key ] ) ? sanitize_key( wp_unslash( (string) $_GET[ $key ] ) ) : '';
		$default         = 'season' === $key ? ( in_array( $month, array( 11, 12, 1, 2 ), true ) ? 'winter' : 'grow' ) : (string) array_key_first( $question['choices'] );
		$answers[ $key ] = isset( $question['choices'][ $value ] ) ? $value : $default;
	}

	return $answers;
}

/**
 * The routine for the answers: headed steps, each built only from RHS
 * advice (Watering; Growing plants in containers). No fixed schedule: the
 * RHS warns against routines like "once a week".
 *
 * @param array<string, string> $a Answers.
 * @return array<int, array{title: string, points: string[]}>
 */
function natura_watering_routine( array $a ): array {
	$fast  = 'small' === $a['size'] || 'sun' === $a['sun'] || 'terracotta' === $a['material'];
	$check = array();
	if ( 'grow' === $a['season'] ) {
		$check[] = __( 'Check the compost every day.', 'natura' );
		if ( 'hot' === $a['heat'] ) {
			$check[] = $fast
				? __( 'In this heat, check in the morning and again in the evening: small pots in full sun can need water up to twice a day.', 'natura' )
				: __( 'Hot weather dries every pot faster: check daily without fail.', 'natura' );
		}
	} else {
		$check[] = __( 'Rain is often enough in winter. Check the compost during dry, windy spells.', 'natura' );
		$check[] = __( 'Take away trays and saucers so pots never stand in water, and raise pots on feet so they drain.', 'natura' );
	}
	if ( 'yes' === $a['shelter'] ) {
		$check[] = __( 'Your pots are in a rain shadow: they need checking even after it rains.', 'natura' );
	}

	$why = array();
	if ( 'small' === $a['size'] ) {
		$why[] = __( 'Small pots hold little compost, so they dry out fastest. Fewer, larger pots are less work.', 'natura' );
	}
	if ( 'terracotta' === $a['material'] ) {
		$why[] = __( 'Unglazed terracotta is porous: it loses water through its sides and dries out faster than plastic.', 'natura' );
	}
	if ( 'sun' === $a['sun'] && 'grow' === $a['season'] ) {
		$why[] = __( 'Full sun dries pots fastest, especially smaller ones.', 'natura' );
	}
	if ( 'grow' === $a['season'] ) {
		$why[] = __( 'A tray or saucer under each pot in summer catches the water that runs through.', 'natura' );
	}

	$steps = array(
		array(
			'title'  => __( 'When to check', 'natura' ),
			'points' => $check,
		),
		array(
			'title'  => __( 'How to tell if a pot needs water', 'natura' ),
			'points' => array(
				__( 'Push a finger into the compost. Water when it is dry 2–3 cm (1 in) below the surface, not before.', 'natura' ),
				__( 'Avoid a fixed routine such as "once a week": the need changes with the weather and the size of the plant.', 'natura' ),
			),
		),
		array(
			'title'  => __( 'How to water', 'natura' ),
			'points' => array(
				__( 'Water early in the morning if you can: less is lost to evaporation. Evening is the next best time; avoid the heat of the day.', 'natura' ),
				__( 'Water the compost, not the leaves, slowly and thoroughly, so the whole rootball is moist.', 'natura' ),
			),
		),
	);
	if ( $why ) {
		$steps[] = array(
			'title'  => __( 'Why your pots dry out the way they do', 'natura' ),
			'points' => $why,
		);
	}

	return $steps;
}

/* ---------------------------------------------------------------------------
   Sharing a tool result
   --------------------------------------------------------------------------- */

/**
 * The share images of a tool: the vertical Pinterest image set in Natura
 * Options, or the one shipped with the theme; and the landscape preview.
 *
 * @param string $slug Tool slug, '' for the tools page.
 * @return array{image: string, pin: string}
 */
function natura_tool_images( string $slug ): array {
	$name   = '' === $slug ? 'tools' : $slug;
	$base   = get_template_directory() . '/assets/images/share/';
	$uri    = get_template_directory_uri() . '/assets/images/share/';
	$custom = natura_share_image_url( absint( get_theme_mod( 'natura_tool_pin_' . str_replace( '-', '_', $name ) ) ) );

	return array(
		'image' => file_exists( $base . $name . '.jpg' ) ? $uri . $name . '.jpg' : '',
		'pin'   => $custom ? $custom : ( file_exists( $base . $name . '-pin.jpg' ) ? $uri . $name . '-pin.jpg' : '' ),
	);
}

/**
 * What a tool page shares: the result's own address (answers included) and
 * a title that says what the result is, e.g. "3 plants for pots: Full sun ·
 * Balcony".
 *
 * @param string $slug Tool slug, '' for the tools page.
 * @return array{url: string, title: string, text: string, image: string, pin: string, kind: string}
 */
function natura_tool_share( string $slug ): array {
	$url     = natura_tool_url( $slug );
	$title   = natura_tool_page_title( $slug );
	$answers = array();

	switch ( $slug ) {
		case 'plant-finder':
			$answers = natura_finder_filters();
			if ( $answers ) {
				$labels = array();
				foreach ( natura_finder_questions() as $key => $question ) {
					if ( isset( $answers[ $key ] ) ) {
						$labels[] = $question['choices'][ $answers[ $key ] ];
					}
				}
				$count = natura_finder_query( $answers )->post_count;
				/* translators: 1: number of plants, 2: answers, e.g. "Full sun · Balcony". */
				$title = sprintf( _n( '%1$s plant for pots: %2$s', '%1$s plants for pots: %2$s', $count, 'natura' ), number_format_i18n( $count ), implode( ' · ', $labels ) );
			}
			break;
		case 'guided-diagnosis':
			$answers = natura_diagnosis_answers();
			if ( $answers ) {
				$labels = array();
				foreach ( natura_diagnosis_questions() as $key => $question ) {
					if ( isset( $answers[ $key ] ) ) {
						$labels[] = $question['choices'][ $answers[ $key ] ];
					}
				}
				/* translators: %s: answers, e.g. "Cherry tomato · Leaves". */
				$title = sprintf( __( 'What is wrong with my plant? %s', 'natura' ), implode( ' · ', $labels ) );
			}
			break;
		case 'pot-size-calculator':
			$input  = natura_pot_input();
			$litres = natura_pot_litres( $input );
			if ( $litres > 0 ) {
				$answers = array_filter(
					array(
						'shape'  => $input['shape'],
						'unit'   => $input['unit'],
						'top'    => $input['top'] ? (string) $input['top'] : '',
						'bottom' => $input['bottom'] ? (string) $input['bottom'] : '',
						'length' => $input['length'] ? (string) $input['length'] : '',
						'depth'  => (string) $input['depth'],
						'bag'    => (string) $input['bag'],
					)
				);
				/* translators: %s: volume in litres. */
				$title = sprintf( __( 'This pot holds about %s litres of compost', 'natura' ), number_format_i18n( $litres < 10 ? round( $litres, 1 ) : round( $litres ), $litres < 10 ? 1 : 0 ) );
			}
			break;
		case 'frost-risk':
			$input = natura_frost_input();
			if ( null !== $input['low'] ) {
				$answers = array(
					'low'  => $input['typed'],
					'unit' => $input['unit'],
				);
				$below   = count( array_filter( natura_frost_plants(), static fn( array $plant ): bool => null !== $plant['min'] && $input['low'] < $plant['min'] ) );
				$title   = $below
					/* translators: 1: temperature, 2: number of plants. */
					? sprintf( _n( 'Frost check at %1$s: %2$s plant to protect', 'Frost check at %1$s: %2$s plants to protect', $below, 'natura' ), natura_temperature( $input['low'], $input['unit'] ), number_format_i18n( $below ) )
					/* translators: %s: temperature. */
					: sprintf( __( 'Frost check at %s: every plant within its limit', 'natura' ), natura_temperature( $input['low'], $input['unit'] ) );
			}
			break;
		case 'watering-calculator':
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- only checks whether the form was sent.
			if ( isset( $_GET['season'] ) ) {
				$answers = natura_watering_answers();
				$title   = __( 'My watering routine for pots, based on RHS advice', 'natura' );
			}
			break;
	}

	$images = natura_tool_images( $slug );

	return array(
		'url'   => $answers ? add_query_arg( array_map( 'rawurlencode', $answers ), $url ) : $url,
		'title' => $title,
		'text'  => natura_tool_intro( $slug ),
		'image' => $images['image'],
		'pin'   => $images['pin'],
		'kind'  => 'tool',
	);
}
