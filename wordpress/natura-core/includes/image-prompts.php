<?php
/**
 * Image prompts in the site's photo style: unstaged documentary photographs
 * with a semi-matte film finish, deep focus, and no synthetic shine (the
 * "raw organic photography" rules). Each guide describes its subject; this
 * file turns that description into the full prompt for an image generator.
 *
 * Plain PHP with no WordPress call, so tools/make-image-prompts.php can use
 * it from the command line.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * The subject of a guide's prompt, without the old style words: the generic
 * ending, light descriptions (the style sets the light), blurred
 * backgrounds and glossy surfaces.
 *
 * @param string $prompt Prompt written in the guide.
 */
function natura_core_prompt_subject( string $prompt ): string {
	$subject = (string) preg_replace( '/\s*(?:Photorealistic,|Vertical 2:3,).*$/s', '', $prompt );

	$light   = '(?:(?:soft|warm|bright|cool|pale|late|early|summer|spring|autumn|fall|winter|morning|midday|afternoon|evening|overcast|golden|sunny|low|natural|indirect|side|window)(?:,?\s+|-))+(?:light|sunlight|sunshine|sun)\b(?:\s+from the window)?';
	$subject = (string) preg_replace( '/(?:^|(?<=\.))\s*' . $light . '\.\s*/i', ' ', $subject );
	$subject = (string) preg_replace( '/,?\s*(?:with|in|under)?\s*' . $light . '\b/i', '', $subject );
	$subject = (string) preg_replace( '/\b(?:softly |slightly )?blurred\s+/i', '', $subject );
	$subject = (string) preg_replace( '/\s+(?:softly |slightly )?blurred\b/i', '', $subject );
	$subject = (string) preg_replace( '/,?\s*sunlight coming through [^,.]*/i', '', $subject );
	$subject = (string) preg_replace( '/\bdew on the leaves,?\s*/i', '', $subject );
	$subject = str_ireplace( array( 'in the soft background', 'glossy', 'glistening', 'glistens' ), array( 'in the background', 'smooth', 'damp', 'shows' ), $subject );

	$subject = (string) preg_replace( '/\s+,/', ',', $subject );
	$subject = (string) preg_replace( '/,\s*(?=[,.;])/', '', $subject );
	$subject = (string) preg_replace( '/(^|\.)\s*,\s*/', '$1 ', $subject );
	$subject = (string) preg_replace_callback( '/(^|\.\s+)([a-z])/', static fn( array $m ): string => $m[1] . strtoupper( $m[2] ), $subject );
	$subject = (string) preg_replace( '/\s{2,}/', ' ', $subject );
	$subject = trim( $subject );

	return '' === $subject || '.' === substr( $subject, -1 ) ? $subject : $subject . '.';
}

/**
 * The full prompt for a guide's main photo or Pinterest image.
 *
 * @param string $prompt Prompt written in the guide.
 * @param string $format photo (landscape 3:2) or pin (portrait 2:3).
 */
function natura_core_image_prompt( string $prompt, string $format = 'photo' ): string {
	$subject = natura_core_prompt_subject( $prompt );
	if ( '' === $subject ) {
		return '';
	}
	$lower = strtolower( $subject );

	// Light: open shade by default; side light where the guide asks for sun.
	if ( preg_match( '/\b(windowsill|window sill|indoors|indoor|kitchen|countertop|counter|shelf|grow light|room)\b/', $lower ) ) {
		$light = 'flat diffused daylight from a nearby window, soft even shadows, strictly side-lit, zero backlighting';
	} elseif ( preg_match( '/\b(sunny|full sun|sun-baked|scorched)\b/', $lower ) ) {
		$light = 'late afternoon low-angle warm daylight, strictly side-lit at 45 degrees with zero backlighting, long diagonal cast shadows, no glowing leaf edges';
	} else {
		$light = 'overcast cloudy day, flat diffused ambient daylight, soft even shadows, zero backlighting, no glowing leaf edges';
	}

	// Soil and leaves: dry by default; wet after rain or watering.
	if ( preg_match( '/\b(rain|rainy|raindrops|rain-soaked|wet|downpour)\b/', $lower ) ) {
		$ground = 'dark rain-soaked clumpy potting mix and damp pebbles, irregular flat wet films on matte leaves with only a few asymmetrical rainwater drops clinging to lower leaf tips and edges, tiny dark mud splatters on lower stems, no uniform spherical beads, no sparkle';
	} elseif ( preg_match( '/\b(water|watering|watered|drip|dripping|soaked|soaking|moist|hose)\b/', $lower ) ) {
		$ground = 'dark damp clumpy potting mix around the stems drying lighter toward the edges, uneven wet streaks and a few heavy irregular water drops hanging from leaf edges, tiny mud specks on the bottom leaves, no uniform spherical beads';
	} else {
		$ground = 'dry crumbly potting mix with bits of bark and a few small pebbles at the surface, dull non-reflective leaves with fine natural texture and slight insect nibbles';
	}

	// Staging: pots and tools only where the guide shows them.
	$staging = 'unstaged amateur documentary photograph, candid angle, asymmetrical natural framing, no plant labels, no text markers, no neat piles of spilled soil';
	if ( ! preg_match( '/\b(pot|pots|planter|container|trough|box|bag|bucket|tray)\b/', $lower ) ) {
		$staging .= ', no aligned pots';
	}
	if ( ! preg_match( '/\b(pruners|shears|scissors|trowel|drill|saw|screwdriver|watering can|tool|tools|knife|snips)\b/', $lower ) ) {
		$staging .= ', no posed tools';
	}

	$finish = 'true photographic semi-matte finish, lifted faded shadow blacks, soft rolled-off highlights, low micro-contrast, muted desaturated earth and sage-green tones, no neon greens, zero specular shine, subtle 35mm Kodak Portra 400 film grain, raw unedited field snapshot, 35mm lens at f/8, deep focus, no background blur, no bokeh, no text, no logos, no people\'s faces';

	$frame = 'pin' === $format ? 'Vertical 2:3 photograph.' : 'Landscape 3:2 photograph.';

	return $frame . ' ' . $subject . ' ' . ucfirst( $staging ) . '. ' . ucfirst( $light ) . '. ' . ucfirst( $ground ) . '. ' . ucfirst( $finish ) . '.';
}
