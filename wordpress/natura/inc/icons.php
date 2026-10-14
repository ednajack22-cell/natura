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
		'pot'     => '<path d="M5 10h14l-1.6 9.2a1.5 1.5 0 0 1-1.5 1.3H8.1a1.5 1.5 0 0 1-1.5-1.3L5 10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M4 10h16M12 10V6.5m0 0C12 4.6 10.4 3 8.5 3 8.5 4.9 10.1 6.5 12 6.5Zm0 0c0-1.9 1.6-3.5 3.5-3.5 0 1.9-1.6 3.5-3.5 3.5Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
		'lens'    => '<circle cx="10.5" cy="10.5" r="6" stroke="currentColor" stroke-width="1.7"/><path d="m15 15 5 5M10.5 7.5v6M7.5 10.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'drop'    => '<path d="M12 3.5s-6 6.6-6 11a6 6 0 0 0 12 0c0-4.4-6-11-6-11Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9.2 15a2.9 2.9 0 0 0 2.8 2.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
		'roots'   => '<path d="M12 3v8m0 0-4 4m4-4 4 4m-4-4v9M8 15l-2 4m2-4 1 5m7-5 2 4m-2-4-1 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
		'pin'     => '<path d="M12 2.5a9.5 9.5 0 0 0-3.46 18.35c-.08-.75-.16-1.9.03-2.72l1.13-4.8s-.29-.58-.29-1.43c0-1.34.78-2.34 1.75-2.34.82 0 1.22.62 1.22 1.36 0 .83-.53 2.07-.8 3.22-.23.96.48 1.75 1.43 1.75 1.72 0 3.04-1.81 3.04-4.43 0-2.32-1.67-3.94-4.04-3.94-2.76 0-4.38 2.07-4.38 4.2 0 .83.32 1.73.72 2.21.08.1.09.18.07.28l-.27 1.09c-.04.18-.14.21-.32.13-1.2-.56-1.95-2.31-1.95-3.72 0-3.03 2.2-5.81 6.35-5.81 3.33 0 5.92 2.37 5.92 5.55 0 3.31-2.09 5.98-4.99 5.98-.97 0-1.89-.5-2.2-1.1l-.6 2.28c-.22.83-.8 1.88-1.2 2.52A9.5 9.5 0 1 0 12 2.5Z" fill="currentColor"/>',
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
