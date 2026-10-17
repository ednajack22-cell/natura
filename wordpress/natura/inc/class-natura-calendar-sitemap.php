<?php
/**
 * Calendar pages in the core sitemap (/wp-sitemap-calendar-1.xml): the year
 * and each month, once it lists enough plants to be indexed.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Sitemap provider for the planting calendar.
 */
class Natura_Calendar_Sitemap extends WP_Sitemaps_Provider {

	/**
	 * Sets the provider's name, used in the sitemap address.
	 */
	public function __construct() {
		$this->name        = 'calendar';
		$this->object_type = 'calendar';
	}

	/**
	 * The calendar addresses worth indexing.
	 *
	 * @param int    $page_num       Page of the sitemap.
	 * @param string $object_subtype Unused.
	 * @return array<int, array{loc: string}>
	 */
	public function get_url_list( $page_num, $object_subtype = '' ) {
		if ( 1 !== (int) $page_num ) {
			return array();
		}
		$urls = array();
		if ( count( natura_calendar_year() ) >= NATURA_MIN_INDEXED_PLANTS ) {
			$urls[] = array( 'loc' => natura_core_calendar_url() );
		}
		for ( $m = 1; $m <= 12; $m++ ) {
			if ( count( natura_calendar_month( $m )['plants'] ) >= NATURA_MIN_INDEXED_PLANTS ) {
				$urls[] = array( 'loc' => natura_core_calendar_url( $m ) );
			}
		}

		return $urls;
	}

	/**
	 * One page is enough for thirteen addresses; none while no calendar page
	 * is worth indexing, so the sitemap index never links to an empty page.
	 *
	 * @param string $object_subtype Unused.
	 */
	public function get_max_num_pages( $object_subtype = '' ) {
		return $this->get_url_list( 1 ) ? 1 : 0;
	}
}
