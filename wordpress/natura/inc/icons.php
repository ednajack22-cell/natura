<?php
/**
 * Inline SVG icons. Decorative: hidden from assistive technology, so the
 * element around each icon must carry the accessible name.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the markup for one icon.
 *
 * @param string $name  Icon name.
 * @param string $class Optional class for the <svg>.
 */
function natura_icon( string $name, string $class = '' ): string {
	$paths = array(
		'leaf'    => '<path d="M20.5 3.5C12 3.4 5.8 6.2 4.2 11.4c-1.1 3.5.7 7.4 4.4 8.5 4.8 1.5 9.8-3.2 11.9-16.4Z" stroke="currentColor" stroke-width="1.7"/><path d="M5 19c2.8-4.6 6.6-7.7 11.7-10" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'search'  => '<circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.7"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'menu'    => '<path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'close'   => '<path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'chevron' => '<path d="m7 10 5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
		'arrow'   => '<path d="M5 12h14M14 7l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
	);

	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}

	$class_attribute = $class ? ' class="' . esc_attr( $class ) . '"' : '';

	return '<svg' . $class_attribute . ' viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

/**
 * Prints one icon. The SVG markup is a fixed string from the list above.
 *
 * @param string $name  Icon name.
 * @param string $class Optional class for the <svg>.
 */
function natura_the_icon( string $name, string $class = '' ): void {
	echo natura_icon( $name, $class ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed markup, attribute escaped above.
}
