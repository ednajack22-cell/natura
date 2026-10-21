<?php
/**
 * Stand-in covers: until the site owner adds their own photos, each guide
 * without a main photo gets a drawn cover (a leaf pattern in the colours of
 * its section) and a Pinterest image with its real title. They are plain
 * illustrations, never presented as photos, and they are marked so the
 * owner can find and replace them: the health report lists them.
 *
 * Drawn with PHP's GD extension. Text comes from glyph sheets of the site's
 * fonts (Newsreader and Inter, SIL Open Font License, see
 * assets/covers/OFL.txt), so it works without FreeType.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/** Meta key set on every stand-in cover attachment. */
const NATURA_CORE_COVER_META = '_natura_cover';

/**
 * Whether this server can draw covers.
 */
function natura_core_covers_available(): bool {
	return function_exists( 'imagecreatetruecolor' ) && function_exists( 'imagecreatefrompng' ) && function_exists( 'imagejpeg' );
}

/**
 * Colours and label of each section's covers.
 *
 * @param string $kind Post type.
 * @return array{label: string, ground: int[], leaves: int[][], accent: int[]}
 */
function natura_core_cover_style( string $kind ): array {
	$styles = array(
		'plant'   => array( __( 'Growing guide', 'natura-core' ), array( 27, 59, 43 ), array( array( 45, 77, 60 ), array( 63, 99, 76 ), array( 92, 128, 96 ) ), array( 228, 185, 79 ) ),
		'problem' => array( __( 'Problems & fixes', 'natura-core' ), array( 122, 52, 24 ), array( array( 146, 66, 33 ), array( 168, 85, 48 ), array( 190, 110, 70 ) ), array( 255, 219, 206 ) ),
		'post'    => array( __( 'Plant care', 'natura-core' ), array( 58, 82, 62 ), array( array( 78, 104, 80 ), array( 101, 128, 99 ), array( 130, 156, 120 ) ), array( 229, 236, 228 ) ),
		'gear'    => array( __( 'Gear guide', 'natura-core' ), array( 15, 42, 29 ), array( array( 33, 62, 46 ), array( 52, 84, 64 ), array( 155, 68, 31 ) ), array( 228, 185, 79 ) ),
		'project' => array( __( 'DIY project', 'natura-core' ), array( 141, 101, 33 ), array( array( 160, 119, 47 ), array( 180, 139, 64 ), array( 70, 92, 60 ) ), array( 251, 249, 242 ) ),
	);
	$style  = $styles[ $kind ] ?? $styles['plant'];

	return array(
		'label'  => $style[0],
		'ground' => $style[1],
		'leaves' => $style[2],
		'accent' => $style[3],
	);
}

/**
 * Draws a leaf pattern over an image area.
 *
 * Drawn at twice the size and scaled down, as GD does not smooth filled
 * shapes. The same seed always gives the same pattern.
 *
 * @param array  $style  Cover style.
 * @param int    $width  Width in pixels.
 * @param int    $height Height in pixels.
 * @param string $seed   Seed, such as the guide address.
 * @return GdImage
 */
function natura_core_cover_pattern( array $style, int $width, int $height, string $seed ) {
	$scale = 2;
	$w     = $width * $scale;
	$h     = $height * $scale;
	$big   = imagecreatetruecolor( $w, $h );
	imagealphablending( $big, true );
	imagefill( $big, 0, 0, imagecolorallocate( $big, ...$style['ground'] ) );

	mt_srand( crc32( $seed ) );
	$cell = (int) round( 210 * $scale );
	for ( $y = -$cell / 2; $y < $h + $cell / 2; $y += $cell * 0.8 ) {
		for ( $x = -$cell / 2; $x < $w + $cell / 2; $x += $cell * 0.9 ) {
			$tone  = $style['leaves'][ mt_rand( 0, count( $style['leaves'] ) - 1 ) ];
			$color = imagecolorallocatealpha( $big, $tone[0], $tone[1], $tone[2], mt_rand( 0, 30 ) );
			$vein  = imagecolorallocatealpha( $big, ...array_merge( $style['ground'], array( 60 ) ) );
			$cx    = $x + mt_rand( -$cell / 3, $cell / 3 );
			$cy    = $y + mt_rand( -$cell / 3, $cell / 3 );
			$len   = mt_rand( (int) ( $cell * 0.55 ), (int) ( $cell * 1.05 ) );
			$angle = deg2rad( mt_rand( 0, 359 ) );
			natura_core_cover_leaf( $big, $cx, $cy, $len, $len * mt_rand( 28, 42 ) / 100, $angle, $color, $vein, $scale );
		}
	}

	// A few round seeds between the leaves.
	$seed_color = imagecolorallocatealpha( $big, ...array_merge( $style['accent'], array( 70 ) ) );
	for ( $i = 0; $i < 9; $i++ ) {
		$r = mt_rand( 6, 14 ) * $scale;
		imagefilledellipse( $big, mt_rand( 0, $w ), mt_rand( 0, $h ), $r, $r, $seed_color );
	}

	$image = imagecreatetruecolor( $width, $height );
	imagecopyresampled( $image, $big, 0, 0, 0, 0, $width, $height, $w, $h );
	imagedestroy( $big );

	return $image;
}

/**
 * Draws one leaf: a pointed oval with a midrib, turned by an angle.
 *
 * @param GdImage $image  Image.
 * @param float   $cx     Base of the leaf, x.
 * @param float   $cy     Base of the leaf, y.
 * @param float   $length Length.
 * @param float   $width  Widest point.
 * @param float   $angle  Angle in radians.
 * @param int     $color  Fill.
 * @param int     $vein   Midrib colour.
 * @param int     $scale  Drawing scale.
 */
function natura_core_cover_leaf( $image, float $cx, float $cy, float $length, float $width, float $angle, int $color, int $vein, int $scale ): void {
	$cos    = cos( $angle );
	$sin    = sin( $angle );
	$points = array();
	$steps  = 24;
	foreach ( array( 1, -1 ) as $side ) {
		for ( $i = 0; $i <= $steps; $i++ ) {
			$t        = 1 === $side ? $i / $steps : 1 - $i / $steps;
			$along    = $t * $length;
			$across   = $side * ( $width / 2 ) * pow( sin( M_PI * $t ), 0.85 ) * ( 1 - 0.25 * $t );
			$points[] = (int) round( $cx + $along * $cos - $across * $sin );
			$points[] = (int) round( $cy + $along * $sin + $across * $cos );
		}
	}
	imagefilledpolygon( $image, $points, $color );

	imagesetthickness( $image, 2 * $scale );
	imageline( $image, (int) round( $cx - 0.12 * $length * $cos ), (int) round( $cy - 0.12 * $length * $sin ), (int) round( $cx + 0.9 * $length * $cos ), (int) round( $cy + 0.9 * $length * $sin ), $vein );
	imagesetthickness( $image, 1 );
}

/**
 * Letter metrics of a cover face (see includes/cover-glyphs.php).
 *
 * @param string $face serif or sans.
 * @return array{size: int, ascent: int, glyphs: array<string, array>, kerning: array<string, float>}
 */
function natura_core_cover_face( string $face ): array {
	static $faces = null;
	if ( null === $faces ) {
		$faces = require __DIR__ . '/cover-glyphs.php';
	}

	return $faces[ 'serif' === $face ? 'serif' : 'sans' ];
}

/**
 * The glyph sheet of a face, in one colour. Sheets are kept for the request.
 *
 * @param string $face  serif or sans.
 * @param int[]  $color Red, green, blue.
 * @return GdImage|false
 */
function natura_core_cover_sheet( string $face, array $color ) {
	static $sheets = array();
	$key = $face . implode( ',', $color );
	if ( ! isset( $sheets[ $key ] ) ) {
		$sheet = imagecreatefrompng( dirname( __DIR__ ) . '/assets/covers/glyphs-' . ( 'serif' === $face ? 'serif' : 'sans' ) . '.png' );
		if ( $sheet ) {
			imagealphablending( $sheet, false );
			imagesavealpha( $sheet, true );
			imagefilter( $sheet, IMG_FILTER_COLORIZE, $color[0], $color[1], $color[2] );
		}
		$sheets[ $key ] = $sheet;
	}

	return $sheets[ $key ];
}

/**
 * Letters of a text, with any letter missing from the sheets replaced.
 *
 * @param string $text Text.
 * @param array  $font Face metrics.
 * @return string[]
 */
function natura_core_cover_letters( string $text, array $font ): array {
	$letters = preg_split( '//u', $text, -1, PREG_SPLIT_NO_EMPTY );

	return array_map( static fn( string $letter ): string => isset( $font['glyphs'][ $letter ] ) ? $letter : '?', $letters ? $letters : array() );
}

/**
 * Width of a text.
 *
 * @param string $face    serif or sans.
 * @param float  $size    Letter size in pixels.
 * @param string $text    Text.
 * @param float  $spacing Extra space between letters, in pixels.
 */
function natura_core_cover_text_width( string $face, float $size, string $text, float $spacing = 0 ): float {
	$font  = natura_core_cover_face( $face );
	$scale = $size / $font['size'];
	$width = 0.0;
	$last  = '';
	foreach ( natura_core_cover_letters( $text, $font ) as $letter ) {
		$width += ( $font['glyphs'][ $letter ][6] + ( $font['kerning'][ $last . $letter ] ?? 0 ) ) * $scale + $spacing;
		$last   = $letter;
	}

	return max( 0.0, $width - $spacing );
}

/**
 * Writes a text from the glyph sheets.
 *
 * @param GdImage $image    Image.
 * @param string  $face     serif or sans.
 * @param float   $size     Letter size in pixels.
 * @param float   $x        Left.
 * @param float   $baseline Baseline.
 * @param int[]   $color    Red, green, blue.
 * @param string  $text     Text.
 * @param float   $spacing  Extra space between letters, in pixels.
 */
function natura_core_cover_text( $image, string $face, float $size, float $x, float $baseline, array $color, string $text, float $spacing = 0 ): void {
	$font  = natura_core_cover_face( $face );
	$sheet = natura_core_cover_sheet( $face, $color );
	if ( ! $sheet ) {
		return;
	}
	$scale = $size / $font['size'];
	$last  = '';
	imagealphablending( $image, true );
	foreach ( natura_core_cover_letters( $text, $font ) as $letter ) {
		list( $gx, $gy, $gw, $gh, $ox, $oy, $advance ) = $font['glyphs'][ $letter ];
		$x += ( $font['kerning'][ $last . $letter ] ?? 0 ) * $scale;
		if ( '' !== trim( $letter ) ) {
			imagecopyresampled( $image, $sheet, (int) round( $x + $ox * $scale ), (int) round( $baseline + $oy * $scale ), $gx, $gy, (int) round( $gw * $scale ), (int) round( $gh * $scale ), $gw, $gh );
		}
		$x   += $advance * $scale + $spacing;
		$last = $letter;
	}
}

/**
 * Splits a text into lines no wider than a width.
 *
 * @param string $text  Text.
 * @param string $face  serif or sans.
 * @param float  $size  Letter size in pixels.
 * @param int    $width Width in pixels.
 * @return string[]
 */
function natura_core_cover_wrap( string $text, string $face, float $size, int $width ): array {
	$lines = array();
	$line  = '';
	foreach ( preg_split( '/\s+/', trim( $text ) ) as $word ) {
		$try = '' === $line ? $word : $line . ' ' . $word;
		if ( '' !== $line && natura_core_cover_text_width( $face, $size, $try ) > $width ) {
			$lines[] = $line;
			$line    = $word;
		} else {
			$line = $try;
		}
	}
	if ( '' !== $line ) {
		$lines[] = $line;
	}

	return $lines;
}

/**
 * Upper-case form of a label.
 *
 * @param string $label Label.
 */
function natura_core_cover_caps( string $label ): string {
	return function_exists( 'mb_strtoupper' ) ? mb_strtoupper( $label ) : strtoupper( $label );
}

/**
 * Draws the main cover, 1200 × 800: the leaf pattern and, in the middle, a
 * round label with the section name. The label stays inside the area every
 * card crop keeps (4:3, 16:10, 3:2).
 *
 * @param string $kind Post type.
 * @param string $seed Guide address.
 * @return GdImage
 */
function natura_core_draw_cover( string $kind, string $seed ) {
	$style = natura_core_cover_style( $kind );
	$image = natura_core_cover_pattern( $style, 1200, 800, $seed );

	// Round label, drawn large and scaled down for a smooth edge.
	$d     = 300;
	$badge = imagecreatetruecolor( $d * 2, $d * 2 );
	imagealphablending( $badge, false );
	imagesavealpha( $badge, true );
	imagefill( $badge, 0, 0, imagecolorallocatealpha( $badge, 0, 0, 0, 127 ) );
	imagealphablending( $badge, true );
	imagefilledellipse( $badge, $d, $d, $d * 2 - 2, $d * 2 - 2, imagecolorallocate( $badge, 251, 249, 242 ) );
	imagesetthickness( $badge, 4 );
	imageellipse( $badge, $d, $d, $d * 2 - 44, $d * 2 - 44, imagecolorallocate( $badge, ...$style['ground'] ) );
	imagecopyresampled( $image, $badge, 600 - $d / 2, 400 - $d / 2, 0, 0, $d, $d, $d * 2, $d * 2 );
	imagedestroy( $badge );

	$ink  = array( 3, 37, 23 );
	$clay = array( 155, 68, 31 );

	$name = 'natura';
	natura_core_cover_text( $image, 'serif', 62, 600 - natura_core_cover_text_width( 'serif', 62, $name ) / 2, 405, $ink, $name );

	$label = natura_core_cover_caps( $style['label'] );
	natura_core_cover_text( $image, 'sans', 17, 600 - natura_core_cover_text_width( 'sans', 17, $label, 2.5 ) / 2, 448, $clay, $label, 2.5 );

	return $image;
}

/**
 * Draws the Pinterest image, 1000 × 1500: the leaf pattern on top and the
 * guide's title below, with the section name and the site name.
 *
 * @param string $kind  Post type.
 * @param string $seed  Guide address.
 * @param string $title Guide title.
 * @param string $site  Site name.
 * @return GdImage
 */
function natura_core_draw_pin( string $kind, string $seed, string $title, string $site ) {
	$style = natura_core_cover_style( $kind );
	$image = imagecreatetruecolor( 1000, 1500 );
	imagefill( $image, 0, 0, imagecolorallocate( $image, 251, 249, 242 ) );

	$top = natura_core_cover_pattern( $style, 1000, 760, $seed );
	imagecopy( $image, $top, 0, 0, 0, 0, 1000, 760 );
	imagedestroy( $top );

	$ink  = array( 3, 37, 23 );
	$soft = array( 66, 72, 67 );
	$clay = array( 155, 68, 31 );

	// Section label under a band across the bottom of the pattern.
	imagefilledrectangle( $image, 0, 760, 999, 767, imagecolorallocate( $image, ...$style['accent'] ) );
	natura_core_cover_text( $image, 'sans', 27, 80, 850, $clay, natura_core_cover_caps( $style['label'] ), 4 );

	// The title, as large as fits between the label and the footer rule.
	$size  = 94;
	$lines = natura_core_cover_wrap( $title, 'serif', $size, 840 );
	$step  = (int) round( $size * 1.25 );
	while ( count( $lines ) * $step > 440 && $size > 48 ) {
		$size -= 5;
		$lines = natura_core_cover_wrap( $title, 'serif', $size, 840 );
		$step  = (int) round( $size * 1.25 );
	}
	$lines = array_slice( $lines, 0, (int) floor( 440 / $step ) );
	$y     = 880 + $step;
	foreach ( $lines as $line ) {
		natura_core_cover_text( $image, 'serif', $size, 80, $y, $ink, $line );
		$y += $step;
	}

	imagefilledrectangle( $image, 80, 1372, 920, 1373, imagecolorallocate( $image, 220, 214, 203 ) );
	natura_core_cover_text( $image, 'serif', 46, 80, 1438, $ink, $site );
	$more = __( 'Growing food in pots', 'natura-core' );
	natura_core_cover_text( $image, 'sans', 23, 920 - natura_core_cover_text_width( 'sans', 23, $more ), 1432, $soft, $more );

	return $image;
}

/**
 * Adds a drawn image to the media library and marks it as a stand-in.
 *
 * @param GdImage $image   Image.
 * @param string  $name    File name.
 * @param int     $post_id Guide.
 * @param string  $alt     Alternative text.
 */
function natura_core_cover_attach( $image, string $name, int $post_id, string $alt ): int {
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$tmp = wp_tempnam( $name );
	imagejpeg( $image, $tmp, 84 );
	imagedestroy( $image );

	$image_id = media_handle_sideload(
		array(
			'name'     => $name,
			'tmp_name' => $tmp,
		),
		$post_id
	);
	if ( is_wp_error( $image_id ) ) {
		wp_delete_file( $tmp );
		return 0;
	}
	update_post_meta( $image_id, '_wp_attachment_image_alt', $alt );
	update_post_meta( $image_id, NATURA_CORE_COVER_META, 1 );

	return (int) $image_id;
}

/**
 * Gives a guide a stand-in main photo and Pinterest image, where it has
 * none. Images the owner added are never replaced.
 *
 * @param int $post_id Guide.
 * @return int Number of images added.
 */
function natura_core_add_covers( int $post_id ): int {
	$post = get_post( $post_id );
	if ( ! $post || ! natura_core_covers_available() ) {
		return 0;
	}
	$added = 0;
	$slug  = $post->post_name ? $post->post_name : (string) $post_id;

	if ( ! has_post_thumbnail( $post ) ) {
		// Decorative: the pattern says nothing the title does not.
		$cover = natura_core_cover_attach( natura_core_draw_cover( $post->post_type, $slug ), $slug . '-cover.jpg', $post_id, '' );
		if ( $cover ) {
			set_post_thumbnail( $post_id, $cover );
			++$added;
		}
	}

	$pin_key = natura_core_meta_key( 'pin_image' );
	if ( ! get_post_meta( $post_id, $pin_key, true ) ) {
		$title = html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' );
		$site  = html_entity_decode( get_bloginfo( 'name' ), ENT_QUOTES, 'UTF-8' );
		$pin   = natura_core_cover_attach( natura_core_draw_pin( $post->post_type, $slug, $title, $site ? $site : 'Natura' ), $slug . '-pin.jpg', $post_id, $title );
		if ( $pin ) {
			update_post_meta( $post_id, $pin_key, $pin );
			++$added;
		}
	}

	return $added;
}

/**
 * Whether an image is a stand-in cover.
 *
 * @param int $attachment_id Attachment.
 */
function natura_core_is_cover( int $attachment_id ): bool {
	return $attachment_id > 0 && (bool) get_post_meta( $attachment_id, NATURA_CORE_COVER_META, true );
}

/**
 * Guides of the Natura types that still lack a main photo or a Pinterest
 * image, oldest first.
 *
 * @param int $limit Most to return; -1 for all.
 * @return int[]
 */
function natura_core_guides_without_images( int $limit = -1 ): array {
	$types = array_values( array_filter( array( 'plant', 'problem', 'post', 'gear', 'project' ), 'post_type_exists' ) );

	return get_posts(
		array(
			'post_type'      => $types,
			'post_status'    => array( 'publish', 'draft', 'pending', 'future', 'private' ),
			'posts_per_page' => $limit,
			'orderby'        => 'ID',
			'order'          => 'ASC',
			'fields'         => 'ids',
			'no_found_rows'  => true,
			'meta_query'     => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query -- admin tool only.
				'relation' => 'OR',
				array(
					'key'     => '_thumbnail_id',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key'     => natura_core_meta_key( 'pin_image' ),
					'compare' => 'NOT EXISTS',
				),
				array(
					'key'     => natura_core_meta_key( 'pin_image' ),
					'value'   => array( '', '0' ),
					'compare' => 'IN',
				),
			),
		)
	);
}
