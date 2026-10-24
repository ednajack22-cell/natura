<?php
/**
 * The site's own pages: About, How we write, Contact, Privacy policy and
 * Affiliate disclosure. AdSense reviewers and affiliate programs look for
 * them, and the theme links them from the footer.
 *
 * The texts are ready to use, except the details only the site owner can
 * give (name, place, email, dates…): those are filled with example values,
 * set in bold and colored, so they are easy to find and replace in the
 * editor before the site goes live. Pages are created as drafts and never
 * overwrite a page the owner already has.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * An example value to replace: bold and colored, with the editor's own
 * "Highlight" format so it stays colored in the block editor too.
 *
 * @param string $text Example value.
 */
function natura_core_fill( string $text ): string {
	return '<strong><mark style="background-color:rgba(0, 0, 0, 0);color:#a3123f" class="has-inline-color">' . $text . '</mark></strong>';
}

/**
 * A paragraph block.
 *
 * @param string $html Paragraph HTML.
 */
function natura_core_block_p( string $html ): string {
	return "<!-- wp:paragraph -->\n<p>" . $html . "</p>\n<!-- /wp:paragraph -->\n\n";
}

/**
 * A heading block (level 2).
 *
 * @param string $text Heading.
 */
function natura_core_block_h2( string $text ): string {
	return "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">" . $text . "</h2>\n<!-- /wp:heading -->\n\n";
}

/**
 * A bulleted list block.
 *
 * @param string[] $items Items' HTML.
 */
function natura_core_block_ul( array $items ): string {
	$html = '';
	foreach ( $items as $item ) {
		$html .= "<!-- wp:list-item -->\n<li>" . $item . "</li>\n<!-- /wp:list-item -->\n";
	}

	return "<!-- wp:list -->\n<ul class=\"wp-block-list\">" . $html . "</ul>\n<!-- /wp:list -->\n\n";
}

/**
 * The five pages, keyed by their Natura Options → Pages setting.
 *
 * @return array<string, array{slug: string, title: string, content: string}>
 */
function natura_core_site_pages(): array {
	$f       = 'natura_core_fill';
	$name    = $f( 'Maya Green' );
	$email   = $f( 'hello@yourdomain.com' );
	$updated = $f( 'October 24, 2026' );

	return array(
		'about'      => array(
			'slug'    => 'about',
			'title'   => 'About Natura',
			'content' => natura_core_block_p( 'Natura is for people who want to grow some of their own food in the space a city gives them: a balcony, a patio, a rooftop, a windowsill, or a plot in a community garden. Every guide answers one practical question, in plain words, from reliable sources.' )
				. natura_core_block_h2( 'Who writes Natura' )
				. natura_core_block_p( 'Hi, I’m ' . $name . '. I grow vegetables, herbs, and strawberries in pots on a ' . $f( '65 sq ft (6 m²) southwest-facing balcony in Philadelphia' ) . ', and I have been doing it since ' . $f( '2019' ) . '.' )
				. natura_core_block_p( $f( 'I started with one tomato plant and a bag of potting mix. The first summer taught me more about wind, watering, and pot sizes than any book, and Natura is the site I wish I had found then.' ) )
				. natura_core_block_h2( 'What you will find here' )
				. natura_core_block_ul(
					array(
						'<a href="/small-spaces/">Small Spaces</a>: what changes from one place to another, from the weight on a balcony to the rules of a community garden.',
						'<a href="/plants/">Plants</a>: one guide per plant, with the pot size, the sun it needs, and when to sow, plant, and harvest.',
						'<a href="/plant-care/">Plant Care</a>: watering, soil, feeding, seasonal care, growing your own food, and what to do when a plant looks unwell.',
						'<a href="/diy-projects/">DIY Projects</a>: planters, supports, and simple builds for small spaces.',
						'<a href="/tools/">Tools</a>: the planting calendar, the plant finder, and other quick helpers.',
					)
				)
				. natura_core_block_h2( 'Who Natura is for' )
				. natura_core_block_p( 'Natura is written first for gardeners in the United States, then for those in the United Kingdom. Planting times are given from your last spring frost and first fall frost rather than by month, so the advice works wherever you live.' )
				. natura_core_block_h2( 'How the guides are made' )
				. natura_core_block_p( 'Each guide is based on university extension services, the Royal Horticultural Society, and other reliable references, listed at the end of the guide. Read <a href="/editorial-policy/">How we write and check our guides</a> for the details.' )
				. natura_core_block_p( 'A question, a correction, or an idea for a guide? <a href="/contact/">Get in touch</a>.' ),
		),
		'editorial'  => array(
			'slug'    => 'editorial-policy',
			'title'   => 'How We Write and Check Our Guides',
			'content' => natura_core_block_p( 'Every guide on Natura should help you grow something, and be right. This page explains how the guides are written, where the advice comes from, and how they are kept up to date.' )
				. natura_core_block_h2( 'Where the advice comes from' )
				. natura_core_block_p( 'Guides are based on sources that test and publish growing advice:' )
				. natura_core_block_ul(
					array(
						'university extension services in the United States, such as the cooperative extension programs of land-grant universities;',
						'the Royal Horticultural Society (RHS) in the United Kingdom;',
						'government sources such as the USDA and the EPA;',
						'seed companies and plant breeders for variety details.',
					)
				)
				. natura_core_block_p( 'The sources used are listed at the end of each guide, so you can read them yourself.' )
				. natura_core_block_h2( 'How a guide is written' )
				. natura_core_block_ul(
					array(
						'One guide answers one question. When another guide already explains a step in detail, we link to it instead of repeating it.',
						'Numbers (pot sizes, spacing, temperatures, days to harvest) come from the sources, not from guesswork.',
						'Planting times are given from your frost dates, so they suit both US and UK gardeners.',
						'When a guide draws on our own growing, it says so. ' . $f( 'Most of the vegetables and herbs on Natura also grow on Maya’s balcony.' ),
					)
				)
				. natura_core_block_h2( 'What we never do' )
				. natura_core_block_ul(
					array(
						'We never invent reviews, ratings, test results, or experts.',
						'We never promise a harvest or a cure: plants depend on weather, light, and care.',
						'We never give medical advice about eating or using plants.',
						'Brands cannot pay to be included in a guide or to change what it says.',
					)
				)
				. natura_core_block_h2( 'Updates and corrections' )
				. natura_core_block_p( 'Guides are reviewed when sources change and when readers point out a problem. Each guide shows the date it was last updated. If you spot a mistake, <a href="/contact/">tell us</a>: we check it against the sources and correct the guide.' )
				. natura_core_block_h2( 'Ads and affiliate links' )
				. natura_core_block_p( 'Natura is free to read. It is paid for by ads, clearly labeled “Advertisement”, and by affiliate links to products. Ads and commissions never decide what a guide recommends. Read our <a href="/affiliate-disclosure/">affiliate disclosure</a>.' ),
		),
		'contact'    => array(
			'slug'    => 'contact',
			'title'   => 'Contact',
			'content' => natura_core_block_p( 'The best way to reach Natura is by email:' )
				. natura_core_block_p( '<a href="mailto:hello@yourdomain.com">' . $email . '</a>' )
				. natura_core_block_p( 'I read every message and usually reply within ' . $f( 'three working days' ) . '.' )
				. natura_core_block_h2( 'What to write about' )
				. natura_core_block_ul(
					array(
						'<strong>A mistake in a guide.</strong> Tell us which guide and what looks wrong; a link to a source helps.',
						'<strong>A question about growing.</strong> Say what you grow, in what size of pot, where, and what you see. A photo helps.',
						'<strong>An idea for a guide.</strong> If a question is not answered on Natura yet, we would like to hear it.',
					)
				)
				. natura_core_block_h2( 'Before you write' )
				. natura_core_block_p( 'Natura does not publish paid guest posts or sell links. For anything about your personal data, see the <a href="/privacy-policy/">privacy policy</a>.' ),
		),
		'privacy'    => array(
			'slug'    => 'privacy-policy',
			'title'   => 'Privacy Policy',
			'content' => natura_core_block_p( 'Last updated: ' . $updated . '.' )
				. natura_core_block_p( 'This policy explains what information is collected when you visit Natura, why, and the choices you have.' )
				. natura_core_block_h2( 'Who runs this site' )
				. natura_core_block_p( 'Natura is run by ' . $name . ', ' . $f( 'Philadelphia, Pennsylvania, United States' ) . '. You can contact us at ' . $email . '.' )
				. natura_core_block_h2( 'What we collect' )
				. natura_core_block_ul(
					array(
						'<strong>Server logs.</strong> Like every website, our host, ' . $f( 'your hosting company' ) . ', records technical data such as your IP address, browser, and the pages you request, to keep the site running and secure.',
						'<strong>Emails you send us.</strong> We keep them only as long as needed to answer you.',
						'<strong>Newsletter.</strong> If you sign up, your email address is kept by our newsletter provider, ' . $f( 'your newsletter provider' ) . ', only to send you the newsletter. Every email has a link to unsubscribe.',
					)
				)
				. natura_core_block_p( 'The frost dates you enter in “What to plant now” stay in your own browser. They are never sent to us.' )
				. natura_core_block_h2( 'Advertising' )
				. natura_core_block_p( 'Natura shows ads served by Google AdSense. Google and its partners use cookies to show ads based on your visits to this and other websites. You can learn <a href="https://policies.google.com/technologies/partner-sites">how Google uses information from sites that use its services</a>, and turn off personalized ads in <a href="https://adssettings.google.com/">Google’s Ad Settings</a>. ' . $f( 'Visitors in the European Economic Area, the United Kingdom, and Switzerland are asked for their consent before these cookies are used.' ) )
				. natura_core_block_h2( 'Analytics' )
				. natura_core_block_p( 'We use ' . $f( 'Google Analytics' ) . ' to count visits and see which guides are read, so we know what to improve. ' . $f( 'In the European Economic Area, the United Kingdom, and Switzerland, analytics cookies are only set if you accept them.' ) )
				. natura_core_block_h2( 'Affiliate links' )
				. natura_core_block_p( 'Some links go to shops such as Amazon. If you click one, the shop may set a cookie to know that you came from Natura, and pay us a small commission if you buy. See our <a href="/affiliate-disclosure/">affiliate disclosure</a>.' )
				. natura_core_block_h2( 'Sharing on Pinterest and other networks' )
				. natura_core_block_p( 'The share buttons are simple links. Nothing is sent to Pinterest, Facebook, or any other network unless you click one.' )
				. natura_core_block_h2( 'Your rights' )
				. natura_core_block_p( 'Depending on where you live (for example California or another US state with a privacy law, the United Kingdom, or the European Union), you can ask to see, correct, or delete the personal information we hold about you, and object to its use. Write to ' . $email . ' and we will answer within the time the law allows.' )
				. natura_core_block_h2( 'Children' )
				. natura_core_block_p( 'Natura is not directed at children under 13, and we do not knowingly collect their information.' )
				. natura_core_block_h2( 'Changes to this policy' )
				. natura_core_block_p( 'When this policy changes, the date at the top changes too.' ),
		),
		'disclosure' => array(
			'slug'    => 'affiliate-disclosure',
			'title'   => 'Affiliate Disclosure',
			'content' => natura_core_block_p( 'Natura is free to read. To pay for it, some links on the site are affiliate links: if you click one and buy something, we may earn a small commission, at no extra cost to you.' )
				. natura_core_block_p( '<strong>As an Amazon Associate I earn from qualifying purchases.</strong>' )
				. natura_core_block_p( 'Natura may also take part in the affiliate programs of ' . $f( 'other garden retailers and seed companies' ) . '.' )
				. natura_core_block_h2( 'How we choose products' )
				. natura_core_block_ul(
					array(
						'A product is recommended because it does the job described in the guide, not because it pays a commission.',
						'Buying guides explain the criteria first (size, material, drainage, weight), so you can judge any product yourself.',
						'We do not write prices on the site, because they change: the “Check price” buttons show the current price at the shop.',
						'Brands cannot pay to be included or to change a recommendation.',
					)
				)
				. natura_core_block_h2( 'How to recognize these links' )
				. natura_core_block_p( 'A notice appears before the first affiliate link of a page. Ads are labeled “Advertisement”. In line with the US Federal Trade Commission’s guidance, we tell you about these links before you click them.' )
				. natura_core_block_p( 'Questions about this page? <a href="/contact/">Contact us</a>.' ),
		),
	);
}

/**
 * The page already at a site page's address, if any.
 *
 * @param string $slug Address.
 */
function natura_core_site_page_existing( string $slug ): ?WP_Post {
	$page = get_page_by_path( $slug, OBJECT, 'page' );

	return $page instanceof WP_Post && 'trash' !== $page->post_status ? $page : null;
}

/**
 * Whether a page is WordPress's own sample privacy policy, never edited:
 * Natura's version may then replace its text.
 *
 * @param WP_Post $page Page.
 */
function natura_core_is_sample_privacy_page( WP_Post $page ): bool {
	return (int) get_option( 'wp_page_for_privacy_policy' ) === (int) $page->ID
		&& 'draft' === $page->post_status
		&& $page->post_date_gmt === $page->post_modified_gmt;
}

/**
 * The site pages not yet on the site (WordPress's untouched sample privacy
 * policy counts as missing).
 *
 * @return string[] Page keys.
 */
function natura_core_missing_site_pages(): array {
	$missing = array();
	foreach ( natura_core_site_pages() as $key => $page ) {
		$existing = natura_core_site_page_existing( $page['slug'] );
		if ( ! $existing || ( 'privacy' === $key && natura_core_is_sample_privacy_page( $existing ) ) ) {
			$missing[] = $key;
		}
	}

	return $missing;
}

/**
 * Creates the missing site pages as drafts and links them in Natura Options
 * → Pages where no page is chosen yet.
 *
 * @param int $author Author ID.
 * @return int Number of pages created or filled.
 */
function natura_core_create_site_pages( int $author ): int {
	$pages = natura_core_site_pages();
	$done  = 0;
	foreach ( natura_core_missing_site_pages() as $key ) {
		$page     = $pages[ $key ];
		$existing = natura_core_site_page_existing( $page['slug'] );
		$data     = array(
			'post_type'    => 'page',
			'post_status'  => 'draft',
			'post_author'  => $author,
			'post_name'    => $page['slug'],
			'post_title'   => $page['title'],
			'post_content' => $page['content'],
		);
		if ( $existing ) {
			$data['ID'] = $existing->ID;
		}
		$id = wp_insert_post( wp_slash( $data ), true );
		if ( is_wp_error( $id ) ) {
			continue;
		}
		++$done;
		if ( ! absint( get_theme_mod( 'natura_page_' . $key ) ) ) {
			set_theme_mod( 'natura_page_' . $key, (int) $id );
		}
		if ( 'privacy' === $key ) {
			update_option( 'wp_page_for_privacy_policy', (int) $id );
		}
	}

	return $done;
}

add_action(
	'admin_post_natura_create_site_pages',
	static function (): void {
		if ( ! current_user_can( 'edit_others_pages' ) || ! current_user_can( 'edit_theme_options' ) ) {
			wp_die( esc_html__( 'You are not allowed to create these pages.', 'natura-core' ), 403 );
		}
		check_admin_referer( 'natura_create_site_pages' );

		$done = natura_core_create_site_pages( get_current_user_id() );

		wp_safe_redirect( add_query_arg( 'site_pages', $done, admin_url( 'tools.php?page=natura-starter-guides' ) ) );
		exit;
	}
);
