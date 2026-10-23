<?php
/**
 * Checks every internal link in the Natura guides (demo and starter) against
 * the guides that exist, from the command line:
 *
 *   php wordpress/tools/check-links.php
 *
 * Addresses: plants /plants/{slug}/, problems /problems/{slug}/, projects
 * /projects/{slug}/, gear /gear/{slug}/, place guides /small-spaces/{slug}/,
 * Plant Care articles /{slug}/. Lists and tools (/plants/, /plant-care/…,
 * /tools/…, /calendar/…) are accepted as they are. Exits 1 on a broken link.
 *
 * @package NaturaCore
 */

if ( PHP_SAPI !== 'cli' ) {
	exit;
}

define( 'ABSPATH', __DIR__ . '/' );
function __( $text ) {
	return $text;
}
function esc_html__( $text ) {
	return $text;
}
function esc_url( $url ) {
	return $url;
}

$core = dirname( __DIR__ ) . '/natura-core/includes/';
require $core . 'demo-content.php';

$guides = array(
	'plant'   => natura_core_demo_plants(),
	'problem' => natura_core_demo_problems(),
	'post'    => natura_core_demo_articles(),
	'gear'    => natura_core_demo_gear(),
	'project' => natura_core_demo_projects(),
	'space'   => array(),
);
foreach ( glob( $core . 'starter/*.php' ) as $path ) {
	$batch = require $path;
	foreach ( $batch['guides'] ?? array() as $kind => $set ) {
		$guides[ $kind ] = array_merge( $guides[ $kind ] ?? array(), $set );
	}
}

$bases = array(
	'plants'       => 'plant',
	'problems'     => 'problem',
	'projects'     => 'project',
	'gear'         => 'gear',
	'small-spaces' => 'space',
);
$lists = '#^/(plants|problems|projects|gear|small-spaces|plant-care|tools|calendar)(/(vegetables|herbs|fruit|sun/[a-z-]+|space/[a-z-]+|category/[a-z-]+|watering|soil-feeding|light-position|seasonal-care|[a-z-]+-calculator|plant-finder|frost-risk|guided-diagnosis|[a-z]+))?/$#';

$broken = 0;
$count  = 0;
foreach ( $guides as $kind => $set ) {
	foreach ( $set as $slug => $guide ) {
		$text = (string) ( $guide['content'] ?? '' ) . wp_json_encode_lite( $guide['lists'] ?? array() );
		preg_match_all( '#href=\\\\?"(/[^"\\\\]*)\\\\?"#', $text, $found );
		foreach ( array_unique( $found[1] ) as $url ) {
			++$count;
			$parts = array_values( array_filter( explode( '/', $url ) ) );
			$ok    = false;
			if ( 2 === count( $parts ) && isset( $bases[ $parts[0] ] ) ) {
				$ok = isset( $guides[ $bases[ $parts[0] ] ][ $parts[1] ] );
			} elseif ( 1 === count( $parts ) ) {
				$ok = isset( $guides['post'][ $parts[0] ] ) || isset( $bases[ $parts[0] ] ) || in_array( $parts[0], array( 'plant-care', 'tools', 'calendar' ), true );
			}
			if ( ! $ok && preg_match( $lists, $url ) ) {
				$ok = true;
			}
			if ( ! $ok ) {
				++$broken;
				echo "- {$kind}:{$slug} links to {$url}\n";
			}
		}
	}
}

/**
 * JSON of the lists, so links inside FAQ answers are checked too.
 *
 * @param mixed $value Value.
 */
function wp_json_encode_lite( $value ): string {
	return (string) json_encode( $value, JSON_UNESCAPED_SLASHES );
}

echo "{$count} links checked, {$broken} broken\n";
exit( $broken ? 1 : 0 );
