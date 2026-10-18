<?php
/**
 * Finds duplicate content between Natura starter guides, from the command
 * line (no WordPress needed):
 *
 *   php wordpress/tools/check-duplicates.php                 # every guide
 *   php wordpress/tools/check-duplicates.php batch-15-*.php  # only pairs with these files
 *
 * Reports repeated addresses, titles that are too close, FAQ questions asked
 * twice, and any run of 12 words (a repeated sentence) shared by two guides. Exits 1 when it finds
 * something.
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

// Every guide, keyed "kind:slug", with the file it comes from.
$guides = array();
$demo   = array(
	'plant'   => natura_core_demo_plants(),
	'problem' => natura_core_demo_problems(),
	'post'    => natura_core_demo_articles(),
	'gear'    => natura_core_demo_gear(),
	'project' => natura_core_demo_projects(),
);
$errors = array();
$seen   = array();
$add    = function ( string $kind, string $slug, array $guide, string $file ) use ( &$guides, &$errors, &$seen ) {
	if ( isset( $seen[ $slug ] ) ) {
		$errors[] = "Address used twice: {$slug} ({$seen[ $slug ]} and {$file})";
	}
	$seen[ $slug ]             = $file;
	$guides[ "{$kind}:{$slug}" ] = array( $guide, $file );
};
foreach ( $demo as $kind => $set ) {
	foreach ( $set as $slug => $guide ) {
		$add( $kind, $slug, $guide, 'demo-content.php' );
	}
}
foreach ( glob( $core . 'starter/*.php' ) as $path ) {
	$batch = require $path;
	foreach ( $batch['guides'] ?? array() as $kind => $set ) {
		foreach ( $set as $slug => $guide ) {
			$add( $kind, $slug, $guide, basename( $path ) );
		}
	}
}

// Files to focus on: only pairs that involve one of them are reported.
$focus = array_map( 'basename', array_slice( $argv, 1 ) );
$wants = function ( string $a, string $b ) use ( $guides, $focus ) {
	return ! $focus || in_array( $guides[ $a ][1], $focus, true ) || in_array( $guides[ $b ][1], $focus, true );
};

/**
 * Lower-case words of a text, without HTML.
 *
 * @param string $text Text.
 * @return string[]
 */
function natura_words( string $text ): array {
	$text = strtolower( html_entity_decode( wp_strip( $text ), ENT_QUOTES ) );
	return preg_split( '/[^a-z0-9°½¼¾]+/u', $text, -1, PREG_SPLIT_NO_EMPTY );
}

/**
 * Strips tags and block comments.
 *
 * @param string $html HTML.
 */
function wp_strip( string $html ): string {
	return trim( preg_replace( '/\s+/', ' ', strip_tags( preg_replace( '/<!--.*?-->/s', ' ', $html ) ) ) );
}

/**
 * Every reader-visible sentence of a guide, except sources, products and
 * image prompts.
 *
 * @param array $guide Guide data.
 * @return string[]
 */
function natura_texts( array $guide ): array {
	$texts = array( $guide['excerpt'] ?? '' );
	foreach ( preg_split( '/<\/(p|li|h2)>/', $guide['content'] ?? '' ) as $chunk ) {
		$texts[] = wp_strip( $chunk );
	}
	$walk = function ( $value, $key ) use ( &$texts, &$walk ) {
		if ( in_array( $key, array( 'sources', 'products', 'url', 'image', 'materials', 'tools' ), true ) ) {
			return;
		}
		if ( is_array( $value ) ) {
			foreach ( $value as $k => $v ) {
				$walk( $v, $k );
			}
		} elseif ( is_string( $value ) ) {
			$texts[] = $value;
		}
	};
	$walk( $guide['lists'] ?? array(), '' );
	return array_filter( $texts );
}

// Titles: same words once "how to grow ... in pots" is removed.
$stop   = array_flip( array( 'how', 'to', 'grow', 'in', 'a', 'an', 'the', 'pots', 'pot', 'container', 'containers', 'for', 'my', 'and', 'of', 'on', 'your', 'are', 'is', 'why', 'what', 'make', 'best' ) );
$titles = array();
foreach ( $guides as $key => list( $guide ) ) {
	$titles[ $key ] = array_keys( array_diff_key( array_flip( natura_words( $guide['title'] ?? '' ) ), $stop ) );
}
$keys = array_keys( $guides );
foreach ( $keys as $i => $a ) {
	foreach ( array_slice( $keys, $i + 1 ) as $b ) {
		if ( ! $wants( $a, $b ) || ! $titles[ $a ] || ! $titles[ $b ] ) {
			continue;
		}
		$common = count( array_intersect( $titles[ $a ], $titles[ $b ] ) );
		$union  = count( array_unique( array_merge( $titles[ $a ], $titles[ $b ] ) ) );
		if ( $common / $union >= 0.6 ) {
			$errors[] = "Titles too close: {$a} \"{$guides[ $a ][0]['title']}\" / {$b} \"{$guides[ $b ][0]['title']}\"";
		}
	}
}

// FAQ questions asked twice.
$questions = array();
foreach ( $guides as $key => list( $guide ) ) {
	foreach ( $guide['lists']['faq'] ?? array() as $faq ) {
		$q = implode( ' ', natura_words( $faq['question'] ?? '' ) );
		if ( isset( $questions[ $q ] ) && $questions[ $q ] !== $key && $wants( $questions[ $q ], $key ) ) {
			$errors[] = "Same FAQ question in {$questions[ $q ]} and {$key}: {$faq['question']}";
		}
		$questions[ $q ] = $key;
	}
}

// Runs of 12 words shared by two guides.
$shingles = array();
foreach ( $guides as $key => list( $guide ) ) {
	foreach ( natura_texts( $guide ) as $text ) {
		$words = natura_words( $text );
		for ( $i = 0; $i + 12 <= count( $words ); $i++ ) {
			$run = implode( ' ', array_slice( $words, $i, 12 ) );
			$shingles[ $run ][ $key ] = true;
		}
	}
}
$shared = array();
foreach ( $shingles as $run => $owners ) {
	$owners = array_keys( $owners );
	foreach ( $owners as $i => $a ) {
		foreach ( array_slice( $owners, $i + 1 ) as $b ) {
			if ( $wants( $a, $b ) ) {
				$shared[ "{$a} / {$b}" ][] = $run;
			}
		}
	}
}
foreach ( $shared as $pair => $runs ) {
	$errors[] = 'Shared wording ' . $pair . ' (' . count( $runs ) . '): "' . $runs[0] . '"';
}

echo count( $guides ) . " guides checked\n";
foreach ( $errors as $error ) {
	echo "- {$error}\n";
}
exit( $errors ? 1 : 0 );
