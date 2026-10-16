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

	return $facts;
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
 * What to do with this plant this month ("Harvest", "Sow and plant out"),
 * or '' when nothing is due.
 *
 * @param array<string, array{label: string, months: int[]}> $calendar Planting calendar.
 */
function natura_plant_this_month( array $calendar ): string {
	$month = (int) wp_date( 'n' );
	$due   = array();
	foreach ( $calendar as $row ) {
		if ( in_array( $month, $row['months'], true ) ) {
			$due[] = $row['label'];
		}
	}
	if ( ! $due ) {
		return '';
	}

	/* translators: 1: month name, 2: activities, e.g. "Sow, Harvest". */
	return sprintf( __( 'In %1$s: %2$s', 'natura' ), wp_date( 'F' ), mb_strtolower( implode( ', ', $due ) ) );
}

/**
 * Prints the planting calendar: one row per activity, one cell per month,
 * this month highlighted. A real table, so screen readers read it by row and
 * column.
 *
 * @param array<string, array{label: string, months: int[]}> $calendar Planting calendar.
 */
function natura_the_plant_calendar( array $calendar ): void {
	if ( ! $calendar || ! natura_section_enabled( 'guide_calendar' ) ) {
		return;
	}
	$now = (int) wp_date( 'n' );
	?>
	<section class="plant-calendar" aria-labelledby="plant-calendar-title">
		<h2 id="plant-calendar-title"><?php esc_html_e( 'Planting calendar', 'natura' ); ?></h2>
		<div class="plant-calendar-scroll">
			<table>
				<caption class="screen-reader-text"><?php esc_html_e( 'Months to sow, plant out, and harvest, for a temperate climate', 'natura' ); ?></caption>
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
		<p class="plant-calendar-note"><?php esc_html_e( 'For a temperate climate such as the UK or northern Europe. In a warmer area, start a few weeks earlier; in a colder one, later.', 'natura' ); ?></p>
	</section>
	<?php
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

