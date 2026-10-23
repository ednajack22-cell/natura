<?php
/**
 * Starter guides, batch 36 (Small Spaces): the place guide Community gardens.
 * A place guide is a hub: it explains what is particular to growing food on
 * a shared site (what a community garden or allotment is, how to find a plot
 * and wait for one, the rules, planning and watering a plot you cannot visit
 * every day, sharing with neighbors, soil on urban sites) and links to the
 * guides that already cover the general skills. No plant tag is attached,
 * so the theme shows no plant list; the text names crop groups only.
 * Written for the United States first (American spelling and terms,
 * imperial units first), then the UK.
 *
 * Facts come from these pages, all checked 23 October 2026: University of
 * Missouri Extension, Community Gardening Toolkit (MP906); UC Cooperative
 * Extension Los Angeles County, Community Garden Start-Up Guide (with its
 * sample gardener contract); UC Master Gardeners of Orange County,
 * Community Gardens; University of Minnesota Extension, Community garden
 * start-up guide; UW-Madison Extension Milwaukee County, Garden Rules and
 * Guidelines; UGA Extension Fulton County, Community Gardens; American
 * Community Gardening Association home page; University of Illinois
 * Extension, Starting a Garden: Begin with a Plan; UF/IFAS Gardening
 * Solutions, Designing Your Vegetable Garden; Iowa State University
 * Extension, Watering the Home Vegetable Garden; RHS, Allotment: getting
 * started; National Allotment Society, How to Get an Allotment Plot in the
 * UK, How to Find an Allotment, and What to Do While on an Allotment Waiting
 * List; GOV.UK, Apply for an allotment. The only waiting-list figure used
 * (about 174,000 people in Britain) is the one the National Allotment
 * Society gives, with its own caveat that it comes from earlier national
 * research. Plot sizes, rules and fees differ from garden to garden, so the
 * text gives the sources' examples as examples. Seasons replace month names.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

$p    = 'natura_core_demo_p';
$h2   = 'natura_core_demo_h2';
$list = 'natura_core_demo_list';

$photo_end = ' Photorealistic, natural light, shallow depth of field, no text, no people\'s faces, no logos.';
$pin_end   = ' Vertical 2:3, photorealistic, empty space at the top for text, no text in the image.';

return array(
	'name'   => __( 'Small Spaces: Community gardens', 'natura-core' ),
	'guides' => array(
		'space' => array(
			'community-gardens' => array(
				'image_prompt' => 'A city community garden in early summer, seen along a wide grass path between rows of rented plots: in the foreground a tidy plot about ten feet square edged with boards, with short rows of lettuce and beets at the front, bush beans in the middle and staked tomatoes at the back, the soil covered with straw mulch; a coiled green hose beside a shared faucet on a post, a wooden tool shed and a compost bin made of pallets in the middle distance, neighboring plots with pole beans on tall frames, a chain-link fence and apartment buildings softly blurred behind, morning sun.' . $photo_end,
				'pin_prompt'   => 'A well-kept plot in an urban community garden photographed vertically from the path: low leafy crops at the front, bush beans in the middle and tomatoes on stakes at the back, straw mulch on the soil, a watering can on the path, a shared tool shed and apartment buildings softly blurred behind.' . $pin_end,
				'title'        => 'How to Get a Community Garden Plot and Grow Food on It',
				'short_name'   => 'Community gardens',
				'order'        => 6,
				'space_term'   => '',
				'excerpt'      => 'Ask your city parks department, your county Extension office or a local garden group in the US, or your local council for an allotment in the UK, and expect a waiting list. Once you have a plot, plan for regular visits, deep weekly watering and the garden\'s shared rules.',
				'related'      => array(
					'post'    => array(
						'succession-planting-small-spaces',
						'seeds-or-young-plants',
						'best-vegetables-for-beginners-in-pots',
						'supports-for-climbing-crops',
						'how-to-store-your-harvest',
					),
					'problem' => array( 'slugs-and-snails' ),
					'project' => array( 'build-a-small-raised-bed-on-a-patio' ),
					'gear'    => array( 'best-hand-tools-for-container-gardening' ),
				),
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Rain gauge', 'note' => 'Shows how much of the weekly inch of water the rain has already given your plot.', 'url' => '' ),
						array( 'name' => 'Soaker hose', 'note' => 'Wets the soil slowly at root level, if your garden allows you to leave one in the plot.', 'url' => '' ),
						array( 'name' => 'Weed-free straw or shredded leaves', 'note' => 'A loose mulch that keeps moisture in and weeds down between visits.', 'url' => '' ),
						array( 'name' => 'Tool tote or small cart', 'note' => 'Carries hand tools, seeds and your harvest between home and the plot.', 'url' => '' ),
						array( 'name' => 'Padlock or cable lock', 'note' => 'For anything you are allowed to leave at the plot, such as a storage box.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'What is the difference between a community garden and an allotment?', 'answer' => 'In the US, a community garden is usually a shared site split into plots that neighbors rent, run by a city, an Extension office or the gardeners themselves. In the UK, an allotment is a plot rented from the local council or an allotment association, on a site protected by allotment law. The UK also has community gardens, run by charities or groups, which often have shorter waits.' ),
						array( 'question' => 'How long is the wait for a community garden plot?', 'answer' => 'It depends entirely on the site. UC Master Gardeners in Orange County, California, note that most local community gardens there have a waiting list. In the UK, the National Allotment Society says waits range from a short time to several years in busy areas. Joining the lists for several sites, where that is allowed, and accepting a half plot can shorten the wait.' ),
						array( 'question' => 'Can I use pesticides or weed killers on a community garden plot?', 'answer' => 'Often not, or only with permission. Many gardens ban weed killers outright, and some ask you to avoid synthetic pesticides or to get the garden manager\'s approval first, partly so that sprays do not reach other people\'s food. Read your garden\'s rules before you buy anything, and ask your Extension office about non-chemical options.' ),
						array( 'question' => 'What happens if I cannot look after my plot for a few weeks?', 'answer' => 'Tell the garden coordinator before you go and ask a plot neighbor to water and pick ripe crops for you. Gardens usually reclaim plots that look abandoned, after one or more written warnings, so silence is the risk rather than a short absence.' ),
						array( 'question' => 'Can I plant a fruit tree or put up a shed on my plot?', 'answer' => 'Only if the rules or the tenancy agreement allow it. Some US gardens ask you to get explicit permission before planting trees or building any structure, and the RHS advises checking an allotment lease for limits on fruit trees, sheds, greenhouses and polytunnels before you take on the plot.' ),
					),
					'sources'  => array(
						array( 'title' => 'University of Missouri Extension — Community Gardening Toolkit (MP906)', 'url' => 'https://extension.missouri.edu/publications/mp906' ),
						array( 'title' => 'UC Cooperative Extension Los Angeles County — Community Garden Start-Up Guide', 'url' => 'https://ucanr.edu/sites/default/files/2011-05/97080.pdf' ),
						array( 'title' => 'UC Master Gardeners of Orange County — Community Gardens', 'url' => 'https://ucanr.edu/site/uc-master-gardeners-orange-county/community-gardens' ),
						array( 'title' => 'University of Minnesota Extension — Community garden start-up guide', 'url' => 'https://extension.umn.edu/about/our-stories/news/community-garden-start-up-guide' ),
						array( 'title' => 'UW-Madison Extension Milwaukee County — Garden Rules and Guidelines', 'url' => 'https://milwaukee.extension.wisc.edu/urban-agriculture/community-garden-rental-new/2015-garden-plot-rules-and-guidelines/' ),
						array( 'title' => 'UGA Extension Fulton County — Community Gardens', 'url' => 'https://extension.uga.edu/county-offices/fulton/community-gardens.html' ),
						array( 'title' => 'American Community Gardening Association', 'url' => 'https://www.communitygarden.org/' ),
						array( 'title' => 'University of Illinois Extension — Starting a Garden: Begin with a Plan', 'url' => 'https://extension.illinois.edu/blogs/good-growing/2020-03-24-starting-garden-begin-plan' ),
						array( 'title' => 'UF/IFAS Gardening Solutions — Designing Your Vegetable Garden', 'url' => 'https://gardeningsolutions.ifas.ufl.edu/plants/edibles/vegetables/designing-your-vegetable-garden/' ),
						array( 'title' => 'Iowa State University Extension — Watering the Home Vegetable Garden', 'url' => 'https://yardandgarden.extension.iastate.edu/how-to/watering-home-vegetable-garden' ),
						array( 'title' => 'RHS — Allotment: getting started', 'url' => 'https://www.rhs.org.uk/advice/grow-your-own/allotments/allotments-getting-started' ),
						array( 'title' => 'National Allotment Society — How to Get an Allotment Plot in the UK', 'url' => 'https://thenas.org.uk/How%20to%20get%20-%20Allotment' ),
						array( 'title' => 'National Allotment Society — How to Find an Allotment', 'url' => 'https://thenas.org.uk/findinganallotment' ),
						array( 'title' => 'National Allotment Society — What to Do While on an Allotment Waiting List', 'url' => 'https://thenas.org.uk/Allotment-Waiting-List' ),
						array( 'title' => 'GOV.UK — Apply for an allotment', 'url' => 'https://www.gov.uk/apply-allotment' ),
					),
				),
				'content'      =>
					$p( 'If your home has no yard and too little sun on the balcony, a plot in a shared garden gives you real ground to grow in. It also comes with things a home garden does not: a waiting list, a set of rules, a faucet you share with others and a trip each time you want to weed or pick. This guide covers those points, in the US first and then in the UK. The skills you use on any vegetable patch, such as sowing, supporting and storing the harvest, have their own guides, linked as you go.' ) .

					$h2( 'What is a community garden in the US?' ) .
					$p( 'University of Missouri Extension describes the usual neighborhood community garden as a piece of land divided into plots for individuals and families. Each gardener prepares, plants, tends and harvests their own plot, and the food is normally eaten at home or given away rather than sold. The land may be borrowed, rented or owned by the gardeners, and tools, water, compost, seeds and plants are often shared.' ) .
					$p( 'Someone has to run the site, and that is often the gardeners themselves: a leader or two and a committee who assign plots, organize workdays to mow and repair, and enforce the rules. Other gardens are managed by a city parks and recreation department or a county Extension office, which rents out the plots for a yearly fee. You will also find communal gardens, where nobody has a plot of their own and the group shares both the work and the harvest.' ) .
					$p( 'Plot sizes vary from site to site. As examples, the University of California\'s start-up guide suggests in-ground plots from 10 by 10 ft (3 by 3 m) up to 20 by 20 ft (6 by 6 m), and raised-bed plots no more than 4 ft (1.2 m) wide so you can reach the middle without stepping on the soil.' ) .

					$h2( 'Allotments and community gardens in the UK' ) .
					$p( 'In the UK, the usual route is an allotment. Most are provided by the local council, and the National Allotment Society explains that these statutory sites are governed by the Allotment Acts and protected from easy redevelopment. A full plot is traditionally 10 rods, about 300 square yards (250 sq m), according to the RHS, but half plots are usually available and are a much more manageable start.' ) .
					$p( 'The society also describes two other kinds of growing space. Temporary or "meanwhile" sites sit on council land earmarked for another use and come with short agreements. Private sites run by landowners, charities or groups, often called community gardens or grow-your-own schemes, usually cost more than a council plot but may have a shorter wait or none at all.' ) .

					$h2( 'How to find a plot and get on the waiting list' ) .
					$p( 'In the US, there is no single list, so try several routes:' ) .
					$list(
						array(
							'<strong>Your city or county parks department.</strong> UC Master Gardeners in Orange County, California, note that parks and recreation departments run some of the gardens there, while others are grassroots projects or belong to apartment complexes.',
							'<strong>Your county Extension office.</strong> Some Extension offices rent out plots themselves, as UGA Extension does in Fulton County, Georgia, and Master Gardener volunteers often know the local gardens.',
							'<strong>The American Community Gardening Association.</strong> Its website has an interactive map where gardens can be listed and searched.',
							'<strong>Churches, nonprofits and apartment buildings.</strong> Missouri Extension lists all of these as homes for neighborhood gardens.',
						)
					) .
					$p( 'Expect to wait: the Orange County Master Gardeners say most of the community gardens they list have a waiting list. Some gardens assign plots first come, first served, and fees and plot sizes differ even within one county.' ) .
					$p( 'In the UK, start with your local council, which GOV.UK says will either give you a plot or put your name on a waiting list. The National Allotment Society suggests searching the council website for "allotments" and contacting the allotments officer; some sites are run by allotment associations or private landlords instead, so search for local associations too. The society gives the wait as anything from a short time to several years where demand is high, and cites earlier national research that found around 174,000 people on council waiting lists across Britain. It suggests applying to several sites where the rules allow, accepting a half plot or an overgrown one, confirming your interest each year and answering offers quickly. When a plot comes up, you are usually invited to view it and asked to decide within about one to two weeks.' ) .

					$h2( 'Rules you will be asked to follow' ) .
					$p( 'Every garden writes its own rules, and you usually sign them, along with a liability waiver, before you get a plot. These come up again and again in the Extension examples:' ) .
					$list(
						array(
							'<strong>Keep the plot tended.</strong> You water, weed and harvest your own plot and usually the path beside it. Neglected plots get warnings, then are cleared and given to the next person on the list.',
							'<strong>Plant soon.</strong> The UC sample contract asks gardeners to plant within two weeks of getting a plot.',
							'<strong>Stay inside your boundary.</strong> Plants and belongings stay within your plot, never in the walkways, and some gardens set a height limit, such as 6 ft (1.8 m) in the UC sample contract.',
							'<strong>Limit chemicals.</strong> Weed killers are often banned, and pesticides may need the garden manager\'s approval.',
							'<strong>Share the water fairly.</strong> Do not leave a hose or sprinkler running while you are away from it, and report leaking faucets.',
							'<strong>Help with the shared work.</strong> Many gardens expect you to attend a minimum number of workdays to keep your plot the next year.',
							'<strong>Ask before building or planting trees.</strong> Sheds, greenhouses, fences and trees often need explicit permission. In the UK, the RHS suggests checking the lease for these limits before you accept a plot.',
							'<strong>Clear up at the end of the season.</strong> Some gardens set a fall clear-out date by which stakes, string, fabric and other belongings must go home.',
						)
					) .

					$h2( 'Plan a small plot to grow food' ) .
					$p( 'Before you sow, sketch the plot on paper. Most vegetables need at least 6 hours of direct sun a day, as Illinois Extension notes, so see where shade from fences, trees or a neighbor\'s tall crops falls over the day. Then arrange crops by height and by how long they stay in the ground:' ) .
					$list(
						array(
							'<strong>Tall crops on the north side.</strong> Illinois Extension and UF/IFAS both suggest putting tall crops such as staked tomatoes along the north edge, medium ones in the middle and low ones on the south side, so nothing shades its neighbors. Remember that your north edge may be someone else\'s south edge, and a tall row there can shade their plot.',
							'<strong>Group crops by how long they take.</strong> Put quick crops together so that when they finish, a whole strip is free for a second sowing. UF/IFAS suggests tucking fast crops such as radishes between slow ones that will need the room later. <a href="/succession-planting-small-spaces/">Succession planting</a> shows how to keep each strip busy.',
							'<strong>Perennials to one side.</strong> Crops that stay for years, such as asparagus, rhubarb or strawberries, go along one edge so they are not in the way when you prepare the rest of the plot each season. Check first that your garden lets you keep plants from year to year.',
							'<strong>Grow up.</strong> Beans, peas and cucumbers on a support use little ground; see <a href="/supports-for-climbing-crops/">which support for which climbing crop</a>, and keep tall frames clear of the shared path.',
							'<strong>Do not plant too much.</strong> UF/IFAS warns that gardens often yield more than you expect. A smaller area kept weeded beats a large one you cannot keep up with.',
						)
					) .
					$p( 'Rotate crop families too: UF/IFAS advises growing the same vegetable in the same spot no more than once every three years. If the plot is partly shaded, the RHS suggests leafy crops such as lettuce, chard and kale, which manage with some shade. For starting crops, <a href="/seeds-or-young-plants/">seeds or young plants</a> compares sowing with buying transplants.' ) .

					$h2( 'Water and weed a plot you cannot visit every day' ) .
					$p( 'A shared plot is out of sight, so build the routine around visits. Missouri Extension encourages gardeners to come two or three times a week during the growing season so weeds, pests and disease do not get ahead of them, and one Georgia garden asks for care at least once a week.' ) .
					$list(
						array(
							'<strong>Water deeply, not often.</strong> Iowa State Extension says most vegetable gardens need about 1 inch (2.5 cm) of water a week from rain and watering combined, and that one thorough soaking a week usually works better than frequent light sprinkles. Aim to wet the soil 6 to 12 in (15 to 30 cm) down, where most roots are, and check by digging a small hole.',
							'<strong>Mulch once the soil warms.</strong> Iowa State suggests several inches of mulch such as weed-free straw, shredded leaves or grass clippings in late spring, after the soil has warmed. It keeps moisture in, cuts the weeds and means less work on each visit. Check your garden\'s rules, as some ban plastic or other non-biodegradable mulches.',
							'<strong>Go slowly with the hose.</strong> Hand watering often wets only the surface and runs off, according to Iowa State, so water at the base of the plants and pause to let it soak in. Where the rules allow, a soaker hose or drip line delivers water slowly to the roots.',
							'<strong>Weed every visit.</strong> Weeds compete with crops for water, and a few minutes each time is easier than a cleared jungle later.',
							'<strong>Cover the soil in the off-season.</strong> The UC start-up guide notes that weeds flourish when gardeners stay away in winter, and suggests a thick layer of mulch or hay over plots you will not tend.',
						)
					) .
					$p( 'Young plants and seedlings have shallow roots and need water more often than established ones, so plan an extra visit or ask a neighbor in the first weeks after planting. Pots you keep at home follow a different routine, set out in <a href="/how-often-to-water-container-plants/">how often to water container plants</a>.' ) .

					$h2( 'Be a good plot neighbor' ) .
					$p( 'A community garden works when people trust each other. Missouri Extension describes community gardening as being as much about community as about gardening, and the rules above exist mostly to keep the peace. A few habits help:' ) .
					$list(
						array(
							'Harvest only from your own plot, unless the plot holder has said you may.',
							'Return shared tools clean and to their place, and leave the faucet and hose as you found them.',
							'Keep tall crops and sprawling vines from shading or spilling onto the plots next to you; UW-Madison Extension in Milwaukee names corn and sunflowers as examples to place with care.',
							'Put only plant material on the shared compost pile, and take trash home.',
							'Pick crops as they ripen, and tell the coordinator or a neighbor when you will be away so someone can harvest. Missouri Extension suggests a system for exactly this.',
							'Share extra produce with neighbors or a food pantry. Missouri Extension notes that pantries welcome fresh produce, but call first to check their hours.',
							'Come to workdays and meetings. They are the easiest way to learn from experienced gardeners, and in the UK, volunteering on a site can help you hear about plots that come free.',
						)
					) .

					$h2( 'Test the soil on an urban site' ) .
					$p( 'City land often has a past. Minnesota Extension advises testing for lead, and possibly other contaminants, where a garden sits near older buildings, railroad tracks or busy roads, or on a former industrial site, and Missouri Extension notes that some urban sites need raised beds filled with new soil. Ask the garden coordinator whether the soil has been tested and when; Minnesota suggests a new test if the last one is more than five years old or unknown. A soil test also shows the pH and nutrients, which the RHS recommends checking before you add lime or fertilizer to an allotment. What to do with the results is covered in <a href="/small-spaces/patios-and-small-yards/">our patios and small yards guide</a>, which explains urban soil in more detail.' ) .

					$h2( 'Grow on a balcony while you wait' ) .
					$p( 'A waiting list is a good time to practice. The National Allotment Society suggests growing salad greens, tomatoes, peppers and bush beans in pots at home, sketching a plan for your future plot and volunteering at a community garden or school garden to learn from others. A balcony or windowsill teaches you sowing, watering and timing on a small scale: start with <a href="/small-spaces/balconies/">how to grow food on a balcony</a> and <a href="/best-vegetables-for-beginners-in-pots/">the best vegetables for beginners in pots</a>.' ) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Accepting a plot without reading the rules, the fees and the clear-out date.',
							'Taking on more ground than you can visit and weed each week.',
							'Planting tall crops on the south side, where they shade your own plot and your neighbor\'s.',
							'Watering a little every visit instead of soaking the soil deeply.',
							'Leaving a hose running unattended or tools out of place.',
							'Going away for weeks without telling the coordinator or a neighbor.',
							'Building a raised bed or planting a fruit tree before asking permission.',
						)
					),
			),
		),
	),
);
