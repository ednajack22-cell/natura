<?php
/**
 * Writes design/IMAGE-PROMPTS.md: for every starter guide, the file names to
 * give its images and the prompts to generate them in the site's photo
 * style (natura-core/includes/image-prompts.php). From the command line (no
 * WordPress needed):
 *
 *   php wordpress/tools/make-image-prompts.php
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
require $core . 'image-prompts.php';

$labels = array(
	'plant'   => 'Plants',
	'problem' => 'Plant problems',
	'post'    => 'Plant Care articles',
	'gear'    => 'Gear',
	'project' => 'DIY Projects',
	'space'   => 'Small Spaces',
);
$sets   = array_fill_keys( array_keys( $labels ), array() );
$demo   = array(
	'plant'   => natura_core_demo_plants(),
	'problem' => natura_core_demo_problems(),
	'post'    => natura_core_demo_articles(),
	'gear'    => natura_core_demo_gear(),
	'project' => natura_core_demo_projects(),
);
foreach ( $demo as $kind => $set ) {
	$sets[ $kind ] = $set;
}
foreach ( glob( $core . 'starter/*.php' ) as $path ) {
	$batch = require $path;
	foreach ( $batch['guides'] ?? array() as $kind => $set ) {
		foreach ( $set as $slug => $guide ) {
			$sets[ $kind ][ $slug ] = $guide;
		}
	}
}

$out   = array();
$out[] = '# Prompts pour les images';
$out[] = '';
$out[] = 'Généré par `php wordpress/tools/make-image-prompts.php` (ne pas modifier à la main).';
$out[] = '';
$out[] = 'Style : photo documentaire non mise en scène, finition semi-mate, grain de film, mise au point profonde, sans flou ni brillance. Lumière de jour couvert par défaut, lumière latérale de fin d\'après-midi pour les sujets ensoleillés, lumière de fenêtre à l\'intérieur ; sol sec par défaut, humide après la pluie ou l\'arrosage.';
$out[] = '';
$out[] = 'Pour chaque fiche : la **photo principale** (paysage 3:2, par exemple 1536 × 1024 px) et l\'**image Pinterest** (portrait 2:3, 1000 × 1500 px). Enregistrez chaque image sous le nom indiqué (`.jpg`, `.png` ou `.webp`), puis importez-les toutes depuis Outils → Natura starter guides → « Import your images » : chaque image se place sur sa fiche grâce à son nom et remplace l\'image provisoire.';

$count = 0;
foreach ( $labels as $kind => $label ) {
	if ( ! $sets[ $kind ] ) {
		continue;
	}
	$out[] = '';
	$out[] = '## ' . $label;
	foreach ( $sets[ $kind ] as $slug => $guide ) {
		$photo = natura_core_image_prompt( (string) ( $guide['image_prompt'] ?? '' ), 'photo' );
		$pin   = natura_core_image_prompt( (string) ( $guide['pin_prompt'] ?? $guide['image_prompt'] ?? '' ), 'pin' );
		if ( '' === $photo ) {
			continue;
		}
		++$count;
		$out[] = '';
		$out[] = '### ' . $guide['title'];
		$out[] = '';
		$out[] = '**Photo principale : `' . $slug . '-photo.jpg`**';
		$out[] = '';
		$out[] = '```';
		$out[] = $photo;
		$out[] = '```';
		$out[] = '';
		$out[] = '**Image Pinterest : `' . $slug . '-pin.jpg`**';
		$out[] = '';
		$out[] = '```';
		$out[] = $pin;
		$out[] = '```';
		$out[] = '';
		$out[] = 'Texte alternatif conseillé : ' . ( $guide['image_alt'] ?? $guide['title'] );
	}
}

file_put_contents( dirname( __DIR__ ) . '/design/IMAGE-PROMPTS.md', implode( "\n", $out ) . "\n" );
echo $count . " guides written to design/IMAGE-PROMPTS.md\n";
