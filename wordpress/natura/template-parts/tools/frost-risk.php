<?php
/**
 * Frost risk check: tonight's forecast low against the RHS hardiness rating
 * of each plant guide.
 *
 * The limit of each plant is the lowest temperature of its RHS rating band
 * (H1c: 5 °C, H3: −5 °C…), as set in its guide. The tool adds no margin of
 * its own; it explains instead why a pot can be colder than the forecast
 * (Met Office: ground frost) and links to both sources.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_input  = natura_frost_input();
$natura_plants = natura_frost_plants();
$natura_url    = natura_tool_url( 'frost-risk' );
$natura_low    = $natura_input['low'];
$natura_unit   = $natura_input['unit'];
$natura_below  = null === $natura_low ? array() : array_filter( $natura_plants, static fn( array $plant ): bool => null !== $plant['min'] && $natura_low < $plant['min'] );
?>
<form class="finder frost-form" method="get" action="<?php echo esc_url( $natura_url . '#results' ); ?>">
	<div class="finder-question">
		<label class="pot-field frost-low">
			<span><?php esc_html_e( 'Tonight\'s lowest temperature, from your forecast', 'natura' ); ?></span>
			<input type="number" name="low" inputmode="decimal" step="any" min="-40" max="113" value="<?php echo esc_attr( $natura_input['typed'] ); ?>" required>
		</label>
	</div>
	<?php
	natura_the_tool_question(
		'unit',
		array(
			'label'   => __( 'In', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'c' => __( 'Degrees Celsius (°C)', 'natura' ),
				'f' => __( 'Degrees Fahrenheit (°F)', 'natura' ),
			),
		),
		array( 'unit' => $natura_unit ),
		false
	);
	?>
	<div class="finder-actions">
		<button type="submit" class="button button-primary"><?php natura_the_icon( 'sun' ); ?> <?php esc_html_e( 'Check my plants', 'natura' ); ?></button>
	</div>
</form>

<section class="finder-results" id="results" aria-labelledby="frost-results-title" aria-live="polite">
	<?php if ( null !== $natura_low ) : ?>
		<div class="pot-result frost-result<?php echo $natura_below ? ' is-risk' : ''; ?>">
			<h2 id="frost-results-title">
				<?php
				if ( ! $natura_plants ) {
					esc_html_e( 'No plant guide has an RHS hardiness rating yet', 'natura' );
				} elseif ( $natura_below ) {
					/* translators: 1: number of plants, 2: temperature. */
					echo esc_html( sprintf( _n( '%1$s plant is below its limit at %2$s', '%1$s plants are below their limit at %2$s', count( $natura_below ), 'natura' ), number_format_i18n( count( $natura_below ) ), natura_temperature( $natura_low, $natura_unit ) ) );
				} else {
					/* translators: %s: temperature. */
					echo esc_html( sprintf( __( 'At %s, every plant is within its RHS rating', 'natura' ), natura_temperature( $natura_low, $natura_unit ) ) );
				}
				?>
			</h2>
			<?php if ( $natura_below ) : ?>
				<p class="pot-note"><?php esc_html_e( 'Move these pots indoors, into a porch or greenhouse, or against a house wall under fleece for the night.', 'natura' ); ?></p>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<h2 id="frost-results-title" class="screen-reader-text"><?php esc_html_e( 'Result', 'natura' ); ?></h2>
	<?php endif; ?>

	<?php if ( $natura_plants ) : ?>
		<div class="pot-guides frost-table">
			<h2><?php esc_html_e( 'How much cold each plant takes', 'natura' ); ?></h2>
			<div class="pot-guides-scroll">
				<table>
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'Plant', 'natura' ); ?></th>
							<th scope="col"><?php esc_html_e( 'RHS rating and limit', 'natura' ); ?></th>
							<?php if ( null !== $natura_low ) : ?>
								<th scope="col"><?php esc_html_e( 'Tonight', 'natura' ); ?></th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $natura_plants as $natura_plant ) : ?>
							<?php $natura_at_risk = null !== $natura_low && null !== $natura_plant['min'] && $natura_low < $natura_plant['min']; ?>
							<tr<?php echo $natura_at_risk ? ' class="is-risk"' : ''; ?>>
								<th scope="row"><a href="<?php echo esc_url( $natura_plant['url'] ); ?>"><?php echo esc_html( $natura_plant['name'] ); ?></a></th>
								<td>
									<strong><?php echo esc_html( $natura_plant['rating'] ); ?> · <?php echo null === $natura_plant['min'] ? esc_html__( 'below −20 °C', 'natura' ) : esc_html( natura_temperature( $natura_plant['min'], $natura_unit ) ); ?></strong>
									<span class="frost-meaning"><?php echo esc_html( $natura_plant['text'] ); ?></span>
								</td>
								<?php if ( null !== $natura_low ) : ?>
									<td><?php echo $natura_at_risk ? '<span class="frost-flag">' . esc_html__( 'Protect', 'natura' ) . '</span>' : esc_html__( 'Within its limit', 'natura' ); ?></td>
								<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php else : ?>
		<p class="empty-state"><?php esc_html_e( 'Set the RHS hardiness rating in the Quick facts of each plant guide, and the plants appear here.', 'natura' ); ?></p>
	<?php endif; ?>

	<div class="frost-notes">
		<h2><?php esc_html_e( 'Before you trust the number', 'natura' ); ?></h2>
		<ul>
			<li><?php esc_html_e( 'A forecast gives the air temperature above the ground. On a clear, still night the ground, and the top of a pot, can freeze while the air stays above 0 °C: a ground frost.', 'natura' ); ?></li>
			<li><?php esc_html_e( 'RHS ratings are a guide to the lowest temperature a plant is likely to withstand. In a pot, the roots have far less soil around them than in the ground, so treat the rating as the best case.', 'natura' ); ?></li>
			<li><?php esc_html_e( 'Plants rated H1 are not only at risk from frost: they need warm nights, so they stay indoors until nights are reliably above their limit.', 'natura' ); ?></li>
		</ul>
		<p class="frost-sources">
			<?php esc_html_e( 'Sources:', 'natura' ); ?>
			<a href="https://www.rhs.org.uk/advice/rhs-hardiness-rating" rel="noopener" target="_blank"><?php esc_html_e( 'RHS hardiness rating', 'natura' ); ?></a> ·
			<a href="https://weather.metoffice.gov.uk/learn-about/weather/types-of-weather/frost-and-ice/frost" rel="noopener" target="_blank"><?php esc_html_e( 'Met Office: what is frost?', 'natura' ); ?></a>
		</p>
	</div>
</section>
