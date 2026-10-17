<?php
/**
 * Planting calendar: the year (/calendar/) or one month (/calendar/october/).
 *
 * Month page, top to bottom (design/CALENDAR.md):
 *  1. breadcrumb, month strip (RHS);
 *  2. title, climate note, jump links with counts (Gerbeaud's "at a glance");
 *  3. one section per action, each plant with light and pot size;
 *  4. one ad, after the first section only;
 *  5. jobs for pots this month, set in Natura Options;
 *  6. previous and next month.
 *
 * Year page: the twelve-month table of every plant (Promesse de Fleurs,
 * Roots), then the months as links.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_month    = natura_core_calendar_month();
$natura_crumbs   = natura_calendar_breadcrumbs( $natura_month );
$natura_actions  = natura_calendar_activities();
$natura_is_today = $natura_month === (int) wp_date( 'n' );
?>
<main id="main-content" class="calendar-page">
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<?php natura_the_month_strip( $natura_month ); ?>

		<?php
		if ( $natura_month ) :
			$natura_data  = natura_calendar_month( $natura_month );
			$natura_name  = natura_month_name( $natura_month );
			$natura_jobs  = natura_section_enabled( 'calendar_jobs' ) ? natura_calendar_jobs( $natura_month ) : array();
			$natura_prev  = 1 === $natura_month ? 12 : $natura_month - 1;
			$natura_next  = 12 === $natura_month ? 1 : $natura_month + 1;
			$natura_first = true;
			echo natura_calendar_structured_data( $natura_month, $natura_data['plants'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG.
			?>
			<header class="page-intro calendar-intro">
				<p class="calendar-kicker"><?php natura_the_icon( 'calendar' ); ?> <?php echo $natura_is_today ? esc_html__( 'This month', 'natura' ) : esc_html__( 'Planting calendar', 'natura' ); ?></p>
				<h1><?php echo esc_html( natura_calendar_title( $natura_month ) ); ?></h1>
				<?php if ( natura_calendar_climate_note() ) : ?>
					<p class="calendar-climate"><?php natura_the_icon( 'sun' ); ?><span><?php echo esc_html( natura_calendar_climate_note() ); ?></span></p>
				<?php endif; ?>
			</header>

			<?php // Jump links only help when there is more than one section to jump to. ?>
			<?php if ( count( $natura_data['groups'] ) > 1 && natura_section_enabled( 'calendar_summary' ) ) : ?>
				<nav class="calendar-summary" aria-label="<?php esc_attr_e( 'On this page', 'natura' ); ?>">
					<?php foreach ( $natura_data['groups'] as $natura_key => $natura_ids ) : ?>
						<a class="is-<?php echo esc_attr( $natura_key ); ?>" href="#<?php echo esc_attr( $natura_key ); ?>">
							<?php natura_the_icon( $natura_actions[ $natura_key ]['icon'] ); ?>
							<span><?php echo esc_html( $natura_actions[ $natura_key ]['label'] ); ?></span>
							<strong><?php echo esc_html( number_format_i18n( count( $natura_ids ) ) ); ?></strong>
						</a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<?php if ( $natura_data['groups'] ) : ?>
				<?php foreach ( $natura_data['groups'] as $natura_key => $natura_ids ) : ?>
					<section class="calendar-group is-<?php echo esc_attr( $natura_key ); ?>" id="<?php echo esc_attr( $natura_key ); ?>" aria-labelledby="<?php echo esc_attr( $natura_key ); ?>-title">
						<h2 id="<?php echo esc_attr( $natura_key ); ?>-title"><?php natura_the_icon( $natura_actions[ $natura_key ]['icon'] ); ?> <?php echo esc_html( sprintf( $natura_actions[ $natura_key ]['heading'], $natura_name ) ); ?></h2>
						<ul class="cal-grid">
							<?php
							foreach ( $natura_ids as $natura_id ) {
								natura_the_calendar_card( $natura_id );
							}
							?>
						</ul>
					</section>
					<?php
					// One ad, between the first and second sections: never before the answer.
					if ( $natura_first && count( $natura_data['groups'] ) > 1 ) {
						echo natura_ad_slot( __( 'Calendar, after the first section', 'natura' ), 'in-content', 'ads_calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
					}
					$natura_first = false;
					?>
				<?php endforeach; ?>
			<?php else : ?>
				<p class="empty-state">
					<?php
					/* translators: %s: month name. */
					echo esc_html( sprintf( __( 'No plant guide has sowing, planting out, or harvest set for %s yet.', 'natura' ), $natura_name ) );
					?>
				</p>
			<?php endif; ?>

			<?php if ( $natura_jobs ) : ?>
				<section class="calendar-jobs" aria-labelledby="calendar-jobs-title">
					<h2 id="calendar-jobs-title">
						<?php
						/* translators: %s: month name. */
						echo esc_html( sprintf( __( 'Jobs for your pots in %s', 'natura' ), $natura_name ) );
						?>
					</h2>
					<ul>
						<?php foreach ( $natura_jobs as $natura_job ) : ?>
							<li><?php natura_the_icon( 'check' ); ?><span><?php echo esc_html( $natura_job ); ?></span></li>
						<?php endforeach; ?>
					</ul>
				</section>
			<?php endif; ?>

			<?php natura_the_share_bar( 'share_calendar', __( 'Share this month', 'natura' ) ); ?>

			<nav class="calendar-pager" aria-label="<?php esc_attr_e( 'Other months', 'natura' ); ?>">
				<a class="is-prev" href="<?php echo esc_url( natura_core_calendar_url( $natura_prev ) ); ?>" rel="prev"><span><?php esc_html_e( 'Previous month', 'natura' ); ?></span><?php echo esc_html( natura_month_name( $natura_prev ) ); ?></a>
				<a class="is-year" href="<?php echo esc_url( natura_core_calendar_url() ); ?>"><?php esc_html_e( 'The whole year', 'natura' ); ?></a>
				<a class="is-next" href="<?php echo esc_url( natura_core_calendar_url( $natura_next ) ); ?>" rel="next"><span><?php esc_html_e( 'Next month', 'natura' ); ?></span><?php echo esc_html( natura_month_name( $natura_next ) ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
			</nav>

		<?php
		else :
			$natura_year  = natura_calendar_year();
			$natura_today = (int) wp_date( 'n' );
			echo natura_calendar_structured_data( 0, array_keys( $natura_year ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG.
			?>
			<header class="page-intro calendar-intro">
				<p class="calendar-kicker"><?php natura_the_icon( 'calendar' ); ?> <?php esc_html_e( 'Month by month', 'natura' ); ?></p>
				<h1><?php echo esc_html( natura_calendar_title( 0 ) ); ?></h1>
				<p><?php echo esc_html( natura_home_setting( 'natura_calendar_intro' ) ); ?></p>
				<a class="button button-primary calendar-now" href="<?php echo esc_url( natura_core_calendar_url( $natura_today ) ); ?>">
					<?php
					/* translators: %s: month name. */
					echo esc_html( sprintf( __( 'What to do in %s', 'natura' ), natura_month_name( $natura_today ) ) );
					?>
					<?php natura_the_icon( 'arrow' ); ?>
				</a>
			</header>

			<?php if ( $natura_year && natura_section_enabled( 'calendar_year_table' ) ) : ?>
				<section class="year-calendar" aria-labelledby="year-calendar-title">
					<h2 id="year-calendar-title"><?php esc_html_e( 'Every plant, every month', 'natura' ); ?></h2>
					<ul class="year-legend" aria-hidden="true">
						<?php foreach ( $natura_actions as $natura_key => $natura_action ) : ?>
							<li class="is-<?php echo esc_attr( $natura_key ); ?>"><i></i><?php echo esc_html( $natura_action['label'] ); ?></li>
						<?php endforeach; ?>
					</ul>
					<div class="year-calendar-scroll">
						<table>
							<caption class="screen-reader-text"><?php esc_html_e( 'Months to sow, plant out, and harvest each plant', 'natura' ); ?></caption>
							<thead>
								<tr>
									<th scope="col"><?php esc_html_e( 'Plant', 'natura' ); ?></th>
									<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
										<th scope="col"<?php echo $m === $natura_today ? ' class="is-now"' : ''; ?>>
											<a href="<?php echo esc_url( natura_core_calendar_url( $m ) ); ?>"><abbr title="<?php echo esc_attr( natura_month_name( $m ) ); ?>"><?php echo esc_html( mb_substr( natura_month_name( $m, 'M' ), 0, 1 ) ); ?></abbr></a>
										</th>
									<?php endfor; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $natura_year as $natura_id => $natura_row ) : ?>
									<tr>
										<th scope="row"><a href="<?php echo esc_url( (string) get_permalink( $natura_id ) ); ?>"><?php echo esc_html( natura_plant_short_name( $natura_id ) ); ?></a></th>
										<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
											<?php
											$natura_due = array_keys( array_filter( $natura_row, static fn( array $months ): bool => in_array( $m, $months, true ) ) );
											?>
											<td<?php echo $m === $natura_today ? ' class="is-now"' : ''; ?>>
												<?php foreach ( $natura_due as $natura_key ) : ?>
													<i class="is-<?php echo esc_attr( $natura_key ); ?>"></i>
												<?php endforeach; ?>
												<span class="screen-reader-text"><?php echo esc_html( $natura_due ? implode( ', ', array_map( static fn( string $key ): string => $natura_actions[ $key ]['label'], $natura_due ) ) : __( 'Nothing', 'natura' ) ); ?></span>
											</td>
										<?php endfor; ?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</section>
			<?php elseif ( ! $natura_year ) : ?>
				<p class="empty-state"><?php esc_html_e( 'No plant guide has a planting calendar yet. Tick the months in the Planting calendar box of each guide.', 'natura' ); ?></p>
			<?php endif; ?>

			<?php natura_the_share_bar( 'share_calendar', __( 'Share the planting calendar', 'natura' ) ); ?>

			<section class="year-months" aria-labelledby="year-months-title">
				<h2 id="year-months-title"><?php esc_html_e( 'Month by month', 'natura' ); ?></h2>
				<ul>
					<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
						<?php $natura_count = count( natura_calendar_month( $m )['plants'] ); ?>
						<li<?php echo $m === $natura_today ? ' class="is-now"' : ''; ?>>
							<a href="<?php echo esc_url( natura_core_calendar_url( $m ) ); ?>">
								<strong><?php echo esc_html( natura_month_name( $m ) ); ?></strong>
								<span>
									<?php
									/* translators: %s: number of plants. */
									echo esc_html( sprintf( _n( '%s plant', '%s plants', $natura_count, 'natura' ), number_format_i18n( $natura_count ) ) );
									?>
								</span>
							</a>
						</li>
					<?php endfor; ?>
				</ul>
			</section>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
