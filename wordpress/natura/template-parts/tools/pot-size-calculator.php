<?php
/**
 * Pot size calculator: the volume of a round pot, a square pot, or a trough
 * (straight or tapered), the number of bags of potting mix to buy, and the
 * pot size each plant guide recommends. Inches by default (centimeters on
 * request); the volume in US gallons first, liters in brackets.
 *
 * Worked out on the server from a plain GET form, so it works without
 * JavaScript; a few lines of script only hide the fields a shape does not
 * use. The result is exact geometry, not an estimate (design/TOOLS.md).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_input  = natura_pot_input();
$natura_litres = natura_pot_litres( $natura_input );
$natura_url    = natura_tool_url( 'pot-size-calculator' );
$natura_sizes  = natura_pot_sizes_from_guides();
$natura_unit   = 'in' === $natura_input['unit'] ? __( 'in', 'natura' ) : __( 'cm', 'natura' );
$natura_value  = static fn( float $value ): string => $value > 0 ? (string) round( $value, 1 ) : '';
?>
<form class="finder pot-calculator" method="get" action="<?php echo esc_url( $natura_url . '#results' ); ?>" data-shape="<?php echo esc_attr( $natura_input['shape'] ); ?>">
	<?php
	natura_the_tool_question(
		'shape',
		array(
			'label'   => __( 'What shape is the container?', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'round'  => __( 'Round pot', 'natura' ),
				'square' => __( 'Square pot', 'natura' ),
				'trough' => __( 'Trough or window box', 'natura' ),
			),
		),
		array( 'shape' => $natura_input['shape'] ),
		false
	);
	natura_the_tool_question(
		'unit',
		array(
			'label'   => __( 'Measured in', 'natura' ),
			'hint'    => '',
			'choices' => array(
				'in' => __( 'Inches', 'natura' ),
				'cm' => __( 'Centimeters', 'natura' ),
			),
		),
		array( 'unit' => $natura_input['unit'] ),
		false
	);
	?>
	<fieldset class="finder-question pot-sizes">
		<legend><?php esc_html_e( 'Measure inside the rim', 'natura' ); ?></legend>
		<p class="finder-hint"><?php esc_html_e( 'Measure the inside of the container. For a tapered pot, add the width across the bottom too.', 'natura' ); ?></p>
		<div class="pot-fields">
			<label class="pot-field" data-for="round square trough">
				<span><?php esc_html_e( 'Width across the top', 'natura' ); ?></span>
				<input type="number" name="top" inputmode="decimal" min="1" max="999" step="any" value="<?php echo esc_attr( $natura_value( $natura_input['top'] ) ); ?>" required>
			</label>
			<label class="pot-field" data-for="round square">
				<span><?php esc_html_e( 'Width across the bottom (optional)', 'natura' ); ?></span>
				<input type="number" name="bottom" inputmode="decimal" min="1" max="999" step="any" value="<?php echo esc_attr( $natura_value( $natura_input['bottom'] ) ); ?>">
			</label>
			<label class="pot-field" data-for="trough">
				<span><?php esc_html_e( 'Length (troughs)', 'natura' ); ?></span>
				<input type="number" name="length" inputmode="decimal" min="1" max="999" step="any" value="<?php echo esc_attr( $natura_value( $natura_input['length'] ) ); ?>">
			</label>
			<label class="pot-field" data-for="round square trough">
				<span><?php esc_html_e( 'Depth', 'natura' ); ?></span>
				<input type="number" name="depth" inputmode="decimal" min="1" max="999" step="any" value="<?php echo esc_attr( $natura_value( $natura_input['depth'] ) ); ?>" required>
			</label>
		</div>
	</fieldset>
	<div class="finder-question">
		<label class="pot-field pot-bag">
			<span><?php esc_html_e( 'Size of the potting mix bags you buy', 'natura' ); ?></span>
			<select name="bag">
				<?php foreach ( natura_pot_bag_groups() as $natura_group => $natura_group_label ) : ?>
					<optgroup label="<?php echo esc_attr( $natura_group_label ); ?>">
						<?php foreach ( natura_pot_bags() as $natura_bag_key => $natura_bag ) : ?>
							<?php if ( $natura_group === $natura_bag['group'] ) : ?>
								<option value="<?php echo esc_attr( (string) $natura_bag_key ); ?>"<?php selected( $natura_input['bag'], (string) $natura_bag_key ); ?>><?php echo esc_html( $natura_bag['label'] ); ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</optgroup>
				<?php endforeach; ?>
			</select>
		</label>
	</div>
	<div class="finder-actions">
		<button type="submit" class="button button-primary"><?php natura_the_icon( 'pot' ); ?> <?php esc_html_e( 'Work it out', 'natura' ); ?></button>
	</div>
</form>
<script>
/* Show only the measurements the chosen shape uses; without script, all are shown. */
( function () {
	var form = document.currentScript.previousElementSibling;
	function update() {
		var shape = ( form.querySelector( 'input[name="shape"]:checked' ) || {} ).value || 'round';
		form.querySelectorAll( '.pot-field[data-for]' ).forEach( function ( field ) {
			var used = field.getAttribute( 'data-for' ).split( ' ' ).indexOf( shape ) > -1;
			field.hidden = ! used;
			field.querySelector( 'input' ).disabled = ! used;
		} );
		form.querySelector( 'input[name="length"]' ).required = 'trough' === shape;
	}
	form.addEventListener( 'change', update );
	update();
}() );
</script>

<section class="finder-results" id="results" aria-labelledby="pot-results-title" aria-live="polite">
	<?php if ( $natura_litres > 0 ) : ?>
		<?php
		$natura_bag  = natura_pot_bags()[ $natura_input['bag'] ];
		$natura_bags = (int) ceil( $natura_litres / $natura_bag['liters'] );
		?>
		<div class="pot-result">
			<h2 id="pot-results-title">
				<?php
				/* translators: %s: volume, e.g. "2.6 gallons (9.8 liters)". */
				echo esc_html( sprintf( __( 'This container holds about %s', 'natura' ), natura_pot_volume( $natura_litres ) ) );
				?>
			</h2>
			<dl class="pot-figures">
				<div>
					<dt><?php esc_html_e( 'In quarts (dry)', 'natura' ); ?></dt>
					<dd><?php echo esc_html( number_format_i18n( $natura_litres / 1.101, 1 ) ); ?></dd>
				</div>
				<div>
					<dt>
						<?php
						/* translators: %s: bag size, e.g. "16 quarts (17.6 liters)". */
						echo esc_html( sprintf( __( 'Bags of %s', 'natura' ), $natura_bag['label'] ) );
						?>
					</dt>
					<dd><?php echo esc_html( number_format_i18n( $natura_bags ) ); ?></dd>
				</div>
				<?php if ( $natura_litres < $natura_bag['liters'] ) : ?>
					<div>
						<dt><?php esc_html_e( 'Pots like this per bag', 'natura' ); ?></dt>
						<dd><?php echo esc_html( number_format_i18n( (int) floor( $natura_bag['liters'] / $natura_litres ) ) ); ?></dd>
					</div>
				<?php endif; ?>
			</dl>
			<p class="pot-note"><?php esc_html_e( 'This is the full volume to the rim. Fill to just below the rim so water can soak in, and allow a little extra: fresh potting mix settles after the first watering.', 'natura' ); ?></p>
		</div>
	<?php else : ?>
		<h2 id="pot-results-title" class="screen-reader-text"><?php esc_html_e( 'Result', 'natura' ); ?></h2>
		<?php // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- only checks whether the form was sent. ?>
		<?php if ( isset( $_GET['depth'] ) ) : ?>
			<p class="empty-state"><?php esc_html_e( 'Enter the width and depth (and the length for a trough) to see the volume.', 'natura' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
</section>

<?php if ( $natura_sizes ) : ?>
	<section class="pot-guides" aria-labelledby="pot-guides-title">
		<h2 id="pot-guides-title"><?php esc_html_e( 'Pot size for each plant', 'natura' ); ?></h2>
		<p><?php esc_html_e( 'From our growing guides. A bigger pot holds more water, so it dries out more slowly.', 'natura' ); ?></p>
		<div class="pot-guides-scroll">
			<table>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Plant', 'natura' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Pot size', 'natura' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $natura_sizes as $natura_row ) : ?>
						<tr>
							<th scope="row"><a href="<?php echo esc_url( $natura_row['url'] ); ?>"><?php echo esc_html( $natura_row['name'] ); ?></a></th>
							<td><?php echo esc_html( $natura_row['size'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>
<?php endif; ?>
