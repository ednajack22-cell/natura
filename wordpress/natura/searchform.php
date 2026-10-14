<?php
/**
 * Search form. Used in the header (wide screens), in the mobile sheet, and
 * anywhere get_search_form() is called.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_context = $args['natura_context'] ?? 'content';
$natura_field   = 'search-' . sanitize_key( $natura_context );
$natura_class   = array(
	'header' => 'header-search-form',
	'mobile' => 'mobile-search',
	'hero'   => 'search-form search-form-large',
)[ $natura_context ] ?? 'search-form';
?>
<form class="<?php echo esc_attr( $natura_class ); ?>" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $natura_field ); ?>"><?php esc_html_e( 'Search Natura', 'natura' ); ?></label>
	<?php natura_the_icon( 'search' ); ?>
	<input id="<?php echo esc_attr( $natura_field ); ?>" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search plants, problems…', 'natura' ); ?>" maxlength="120">
	<button type="submit"><?php esc_html_e( 'Search', 'natura' ); ?></button>
</form>
