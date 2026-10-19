<?php
/**
 * Plant guide helpers: quick facts, plant type, and breadcrumbs. The helpers
 * every guide shares are in content.php.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The quick facts that have a value, in display order.
 *
 * @return array<int, array{label: string, value: string, icon: string}>
 */
function natura_plant_quick_facts(): array {
	$labels = array(
		'sun'        => array( __( 'Sun', 'natura' ), 'sun' ),
		'pot_size'   => array( __( 'Pot size', 'natura' ), 'pot' ),
		'watering'   => array( __( 'Water', 'natura' ), 'drop' ),
		'harvest'    => array( __( 'Harvest', 'natura' ), 'basket' ),
		'difficulty' => array( __( 'Difficulty', 'natura' ), 'gauge' ),
		'season'     => array( __( 'Season', 'natura' ), 'calendar' ),
	);

	$facts = array();
	foreach ( $labels as $key => list( $label, $icon ) ) {
		$value = (string) natura_field( $key );
		if ( '' !== $value ) {
			$facts[] = array(
				'label' => $label,
				'value' => $value,
				'icon'  => $icon,
			);
		}
	}

	$cold = natura_plant_hardiness_text( (string) natura_field( 'hardiness' ) );
	if ( '' !== $cold ) {
		$facts[] = array(
			'label' => __( 'Cold hardiness', 'natura' ),
			'value' => $cold,
			'icon'  => 'frost',
		);
	}

	return $facts;
}

/**
 * The RHS hardiness rating with the matching USDA zones and temperature,
 * e.g. "Down to 14 °F (−10 °C) · USDA zone 8b+ · RHS H4".
 *
 * The zones follow the RHS's own table of equivalents (rhs.org.uk, "RHS
 * hardiness rating"): the coldest USDA zone listed for each rating is where
 * the plant survives winter outdoors.
 *
 * @param string $rating RHS rating, H1a–H7.
 */
function natura_plant_hardiness_text( string $rating ): string {
	$zones = array(
		'H1a' => '13',
		'H1b' => '13',
		'H1c' => '12',
		'H2'  => '11',
		'H3'  => '9b',
		'H4'  => '8b',
		'H5'  => '7b',
		'H6'  => '6b',
		'H7'  => '',
	);
	$ratings = function_exists( 'natura_rhs_ratings' ) ? natura_rhs_ratings() : array();
	if ( ! isset( $zones[ $rating ], $ratings[ $rating ] ) ) {
		return '';
	}
	$min = $ratings[ $rating ]['min'];
	if ( null === $min ) {
		/* translators: %s: RHS rating, H7. */
		return sprintf( __( 'Very hardy, below −4 °F (−20 °C) · RHS %s', 'natura' ), $rating );
	}

	/* translators: 1: temperature in °F, 2: temperature in °C, 3: USDA zone, e.g. 8b, 4: RHS rating. */
	return sprintf( __( 'Down to %1$s °F (%2$s °C) · USDA zone %3$s+ · RHS %4$s', 'natura' ), natura_temperature_number( $min * 9 / 5 + 32 ), natura_temperature_number( $min ), $zones[ $rating ], $rating );
}

/**
 * A temperature for display, rounded, with a true minus sign.
 *
 * @param float $value Degrees.
 */
function natura_temperature_number( float $value ): string {
	$value = (int) round( $value );

	return $value < 0 ? '−' . abs( $value ) : (string) $value;
}

/**
 * When to sow and plant, counted from the reader's frost dates (US extension
 * advice stored in the guide's timing fields).
 *
 * @param int $post_id Plant ID; the current post when 0.
 * @return array<string, string> Activity label => when.
 */
function natura_plant_timing( int $post_id = 0 ): array {
	if ( ! function_exists( 'natura_core_plant_timing' ) ) {
		return array();
	}
	$post_id = $post_id ?: (int) get_the_ID();
	$rows    = array();
	foreach ( array(
		'start_indoors' => __( 'Start seeds indoors', 'natura' ),
		'sow_outdoors'  => __( 'Sow outdoors', 'natura' ),
		'plant_out'     => __( 'Plant outside', 'natura' ),
		'fall_sow'      => __( 'Sow or plant in fall', 'natura' ),
		'harvest_days'  => __( 'First harvest', 'natura' ),
	) as $key => $label ) {
		$range = natura_core_plant_timing( $post_id, $key );
		if ( null === $range ) {
			continue;
		}
		if ( 'harvest_days' === $key ) {
			/* translators: %s: number of days, e.g. "60–80". */
			$rows[ $key ] = sprintf( __( 'about %s days', 'natura' ), natura_range_text( $range[0], $range[1] ) );
			continue;
		}
		$rows[ $key ] = natura_frost_weeks_text( $range, 'fall_sow' === $key ? __( 'your first fall frost', 'natura' ) : __( 'your last spring frost', 'natura' ) );
	}

	return $rows;
}

/**
 * "6–8 weeks before your last spring frost", "up to 2 weeks after", etc.
 *
 * @param int[]  $range Weeks, from and to; minus means before.
 * @param string $frost Which frost, e.g. "your last spring frost".
 */
function natura_frost_weeks_text( array $range, string $frost ): string {
	list( $from, $to ) = $range;
	if ( $to <= 0 ) {
		if ( 0 === $from && 0 === $to ) {
			/* translators: %s: frost, e.g. "your last spring frost". */
			return sprintf( __( 'once %s has passed', 'natura' ), $frost );
		}
		/* translators: 1: weeks, e.g. "6–8", 2: frost. */
		return sprintf( __( '%1$s weeks before %2$s', 'natura' ), natura_range_text( abs( $to ), abs( $from ) ), $frost );
	}
	if ( $from >= 0 ) {
		if ( 0 === $from ) {
			/* translators: 1: frost, 2: weeks. */
			return sprintf( __( 'from %1$s to %2$s weeks after', 'natura' ), $frost, (string) $to );
		}
		/* translators: 1: weeks, e.g. "1–2", 2: frost. */
		return sprintf( __( '%1$s weeks after %2$s', 'natura' ), natura_range_text( $from, $to ), $frost );
	}

	/* translators: 1: weeks before, 2: weeks after, 3: frost. */
	return sprintf( __( 'from %1$s weeks before to %2$s weeks after %3$s', 'natura' ), (string) abs( $from ), (string) $to, $frost );
}

/**
 * "6–8", or "6" when both ends match.
 *
 * @param int $a Lower number.
 * @param int $b Higher number.
 */
function natura_range_text( int $a, int $b ): string {
	return $a === $b ? (string) $a : $a . '–' . $b;
}

/**
 * The plant's main type (Vegetables, Herbs, Fruit), if any.
 */
function natura_plant_type(): ?WP_Term {
	$terms = get_the_terms( get_the_ID(), 'plant_type' );

	return is_array( $terms ) && $terms ? $terms[0] : null;
}

/**
 * Breadcrumb trail for a plant guide.
 *
 * @return array<int, array{name: string, url: string}>
 */
function natura_plant_breadcrumbs(): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Plants', 'natura' ), (string) get_post_type_archive_link( 'plant' ) ),
	);

	$type = natura_plant_type();
	if ( $type ) {
		$trail[] = natura_crumb( $type->name, (string) get_term_link( $type ) );
	}

	$trail[] = natura_crumb( get_the_title(), (string) get_permalink() );

	return $trail;
}

/**
 * The planting calendar of the current plant guide: for each activity, the
 * months it applies to (from the Planting calendar box of the guide).
 *
 * @return array<string, array{label: string, months: int[]}>
 */
function natura_plant_calendar(): array {
	if ( ! function_exists( 'natura_core_plant_months' ) ) {
		return array();
	}
	$rows = array();
	foreach ( array(
		'sow'     => __( 'Sow', 'natura' ),
		'plant'   => __( 'Plant out', 'natura' ),
		'harvest' => __( 'Harvest', 'natura' ),
	) as $activity => $label ) {
		$months = natura_core_plant_months( (int) get_the_ID(), $activity );
		if ( $months ) {
			$rows[ $activity ] = array(
				'label'  => $label,
				'months' => $months,
			);
		}
	}

	return $rows;
}

/**
 * Prints the planting calendar: one row per activity, one cell per month,
 * this month highlighted. A real table, so screen readers read it by row and
 * column.
 *
 * @param array<string, array{label: string, months: int[]}> $calendar Planting calendar.
 */
function natura_the_plant_calendar( array $calendar ): void {
	$timing = natura_plant_timing();
	if ( ( ! $calendar && ! $timing ) || ! natura_section_enabled( 'guide_calendar' ) ) {
		return;
	}
	$now = (int) wp_date( 'n' );
	?>
	<section class="plant-calendar" aria-labelledby="plant-calendar-title">
		<h2 id="plant-calendar-title"><?php esc_html_e( 'When to plant', 'natura' ); ?></h2>
		<?php if ( $timing ) : ?>
			<dl class="plant-timing">
				<?php foreach ( $timing as $key => $when ) : ?>
					<div class="is-<?php echo esc_attr( $key ); ?>">
						<dt><?php echo esc_html( natura_plant_timing_label( $key ) ); ?></dt>
						<dd><?php echo esc_html( $when ); ?></dd>
					</div>
				<?php endforeach; ?>
			</dl>
			<p class="plant-calendar-note"><?php esc_html_e( 'Counted from your own frost dates, so it works in every USDA zone. Your local extension office or a frost-date lookup gives your average last spring and first fall frost.', 'natura' ); ?></p>
		<?php endif; ?>
		<?php if ( $calendar ) : ?>
			<?php if ( $timing ) : ?>
				<details class="plant-calendar-uk">
					<summary><?php esc_html_e( 'UK calendar by month', 'natura' ); ?></summary>
			<?php endif; ?>
			<div class="plant-calendar-scroll">
				<table>
					<caption class="screen-reader-text"><?php esc_html_e( 'Months to sow, plant out, and harvest in the UK', 'natura' ); ?></caption>
					<thead>
						<tr>
							<td></td>
							<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
								<?php $natura_date = mktime( 12, 0, 0, $m, 15, 2026 ); ?>
								<th scope="col"<?php echo $m === $now ? ' class="is-now"' : ''; ?>>
									<abbr title="<?php echo esc_attr( wp_date( 'F', $natura_date ) ); ?>"><?php echo esc_html( mb_substr( wp_date( 'M', $natura_date ), 0, 1 ) ); ?></abbr>
								</th>
							<?php endfor; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $calendar as $activity => $row ) : ?>
							<tr class="is-<?php echo esc_attr( $activity ); ?>">
								<th scope="row"><?php echo esc_html( $row['label'] ); ?></th>
								<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
									<?php $on = in_array( $m, $row['months'], true ); ?>
									<td class="<?php echo esc_attr( trim( ( $on ? 'is-on' : '' ) . ( $m === $now ? ' is-now' : '' ) ) ); ?>"><span class="screen-reader-text"><?php echo $on ? esc_html__( 'Yes', 'natura' ) : esc_html__( 'No', 'natura' ); ?></span></td>
								<?php endfor; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<p class="plant-calendar-note">
				<?php echo esc_html( natura_calendar_climate_note() ); ?>
				<?php if ( function_exists( 'natura_core_calendar_url' ) ) : ?>
					<a href="<?php echo esc_url( natura_core_calendar_url( $now ) ); ?>">
						<?php
						/* translators: %s: month name. */
						echo esc_html( sprintf( __( 'Everything to sow and harvest in %s (UK)', 'natura' ), wp_date( 'F' ) ) );
						?>
					</a>
				<?php endif; ?>
			</p>
			<?php if ( $timing ) : ?>
				</details>
			<?php endif; ?>
		<?php endif; ?>
	</section>
	<?php
}

/**
 * Label of a timing row.
 *
 * @param string $key Timing key.
 */
function natura_plant_timing_label( string $key ): string {
	$labels = array(
		'start_indoors' => __( 'Start seeds indoors', 'natura' ),
		'sow_outdoors'  => __( 'Sow outdoors', 'natura' ),
		'plant_out'     => __( 'Plant outside', 'natura' ),
		'fall_sow'      => __( 'Sow or plant in fall', 'natura' ),
		'harvest_days'  => __( 'First harvest', 'natura' ),
	);

	return $labels[ $key ] ?? '';
}

/**
 * Prints "In short": the guide's key points, the answer in five lines.
 */
function natura_the_key_points(): void {
	$points = array_filter( array_map( static fn( array $row ): string => trim( (string) ( $row['point'] ?? '' ) ), natura_field_list( 'key_points' ) ) );
	if ( ! $points || ! natura_section_enabled( 'guide_key_points' ) ) {
		return;
	}
	?>
	<section class="key-points" aria-labelledby="key-points-title">
		<h2 id="key-points-title"><?php esc_html_e( 'In short', 'natura' ); ?></h2>
		<ul>
			<?php foreach ( $points as $point ) : ?>
				<li><?php natura_the_icon( 'check' ); ?><span><?php echo esc_html( $point ); ?></span></li>
			<?php endforeach; ?>
		</ul>
	</section>
	<?php
}

/**
 * The guide's varieties to try that have a name.
 *
 * @return array<int, array{name: string, note: string, url: string, image: int}>
 */
function natura_plant_varieties(): array {
	if ( ! natura_section_enabled( 'guide_varieties' ) ) {
		return array();
	}
	$varieties = array();
	foreach ( natura_field_list( 'varieties' ) as $row ) {
		$name = trim( (string) ( $row['name'] ?? '' ) );
		if ( '' !== $name ) {
			$varieties[] = array(
				'name'  => $name,
				'note'  => (string) ( $row['note'] ?? '' ),
				'url'   => (string) ( $row['url'] ?? '' ),
				'image' => absint( $row['image'] ?? 0 ),
			);
		}
	}

	return $varieties;
}

/**
 * Prints "Varieties to try" as cards. A link is treated as an affiliate link
 * (sponsored, opens in a new tab), and the guide's affiliate notice covers it.
 */
function natura_the_varieties(): void {
	$varieties = natura_plant_varieties();
	if ( ! $varieties ) {
		return;
	}
	?>
	<section class="varieties" id="plant-varieties" aria-labelledby="plant-varieties-title">
		<h2 id="plant-varieties-title"><?php esc_html_e( 'Varieties to try', 'natura' ); ?></h2>
		<ul class="variety-list">
			<?php foreach ( $varieties as $variety ) : ?>
				<li class="variety-card<?php echo $variety['image'] ? ' has-image' : ''; ?>">
					<?php if ( $variety['image'] ) : ?>
						<?php echo wp_get_attachment_image( $variety['image'], 'thumbnail', false, array( 'alt' => '', 'sizes' => '96px', 'loading' => 'lazy' ) + natura_no_pin() ); ?>
					<?php endif; ?>
					<div>
						<h3><?php echo esc_html( $variety['name'] ); ?></h3>
						<?php if ( $variety['note'] ) : ?>
							<p><?php echo esc_html( $variety['note'] ); ?></p>
						<?php endif; ?>
						<?php if ( $variety['url'] ) : ?>
							<a class="text-link" href="<?php echo esc_url( $variety['url'] ); ?>" rel="sponsored nofollow noopener" target="_blank">
								<?php esc_html_e( 'Find seeds or plants', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?>
								<span class="screen-reader-text">
									<?php
									/* translators: %s: variety name. */
									printf( esc_html__( 'for %s (opens in a new tab)', 'natura' ), esc_html( $variety['name'] ) );
									?>
								</span>
							</a>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
	<?php
}

