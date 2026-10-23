<?php
/**
 * Starter guides, batch 32 (Small Spaces): the place guide for rooftops and
 * roof terraces. A place guide is a hub: it gives the advice that is
 * particular to growing food on a private roof terrace or a building's roof
 * (permission and structural load, carrying everything up, strong wind,
 * heat and fast drying, protecting the roof's drains and waterproofing,
 * lightweight containers, the edge, crops for full exposure and the year on
 * a roof) and links to the guides that already explain watering, potting
 * mix, pots, supports and winter care. Commercial rooftop farms are out of
 * scope. There is no plant tag for roofs: the site does not claim a plant
 * suits a roof unless a source says so, so crops are discussed by type and
 * only where a source names them.
 * Written for the United States first (American spelling and terms,
 * imperial units first), adapted for the UK.
 *
 * Facts come from these pages, all checked 23 October 2026: RHS Roof
 * gardens and balconies, Greening balconies and roof gardens, and How to
 * water containers; Brooklyn Botanic Garden (Medi Blum), Start a Rooftop
 * Container Garden (from its handbook Green Roofs and Rooftop Gardens);
 * Cornell Small Farms Program, Roof Top Gardening; Cornell University (Steve
 * Reiners), No yard? Grow vegetables (and more) in containers; Colorado State
 * University Extension, Container Gardens; Oregon State University
 * Extension, Container gardening; University of Washington Botanic Gardens,
 * Elisabeth C. Miller Library, Vegetables to grow on roof gardens (which
 * summarizes the rooftop section of Michael Guerra's The Edible Container
 * Garden). No load figure is given, because none of the sources states one
 * for a roof: every source sends the reader to a structural engineer or
 * surveyor. The only figures are the black-roof temperature the Brooklyn
 * Botanic Garden reports for New York City and the UK minimum handrail
 * height the RHS gives. Seasons replace month names.
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
	'name'   => __( 'Small Spaces: rooftops and roof terraces', 'natura-core' ),
	'guides' => array(
		'space' => array(
			'rooftops-and-roof-terraces' => array(
				'image_prompt' => 'A private roof terrace on top of a city apartment building in early summer, wooden deck tiles laid over a pale roof surface, a slatted wooden screen along one side, long low plastic troughs of lettuce, Swiss chard with red stems and green onions placed against the low perimeter wall, a bush tomato in a large square planter tied to a sturdy stake, a self-watering planter of bush beans, a coiled drip irrigation line running between the pots from an outdoor faucet, a metal bistro table strapped to a railing post, water tanks and neighboring rooftops softly blurred in the background, bright midday sun.' . $photo_end,
				'pin_prompt'   => 'A sunny rooftop vegetable garden photographed vertically: low troughs of leafy greens and herbs along a perimeter wall, a bush tomato in a square planter tied to a stake, pots standing on wooden deck tiles, a slatted screen behind them and a wide city skyline under a clear sky.' . $pin_end,
				'title'        => 'How to Grow Food on a Rooftop or Roof Terrace',
				'short_name'   => 'Rooftops & roof terraces',
				'order'        => 2,
				'space_term'   => '',
				'excerpt'      => 'Get written permission and have a structural engineer or surveyor confirm what the roof can carry before you bring up a single pot. Then plan for strong wind, intense sun and heat, a water supply, and keeping the roof drains and waterproofing clear.',
				'related'      => array(
					'post'    => array(
						'watering-pots-in-a-heat-wave',
						'how-to-choose-pots-for-vegetables',
						'protect-pots-in-winter',
						'cloches-and-mini-greenhouses-on-a-balcony',
					),
					'project' => array(
						'set-up-a-drip-irrigation-kit',
						'self-watering-pot',
						'make-a-planter-from-a-recycled-container',
					),
					'problem' => array( 'leaf-scorch' ),
					'gear'    => array(
						'best-drip-irrigation-kit-for-pots',
						'best-grow-bags',
					),
				),
				'lists'        => array(
					'products' => array(
						array( 'name' => 'Rubber mats or wooden deck tiles', 'note' => 'A buffer under the containers that helps them drain and protects the roofing.', 'url' => '' ),
						array( 'name' => 'Lightweight plastic or fiberglass troughs', 'note' => 'Lighter than terracotta or concrete, and a long, low shape resists tipping.', 'url' => '' ),
						array( 'name' => 'Self-watering planters', 'note' => 'A reservoir in the base stretches the time between waterings in sun and wind.', 'url' => '' ),
						array( 'name' => 'Drip irrigation kit with a timer', 'note' => 'Worth it if the roof has its own faucet; lead the runoff to a drain.', 'url' => '' ),
						array( 'name' => 'Slatted or mesh screen', 'note' => 'Filters the wind; fix it to well-supported anchors.', 'url' => '' ),
						array( 'name' => 'Straps or ties for furniture and tall plants', 'note' => 'Keep chairs, cans and tools from being lifted by a gust.', 'url' => '' ),
					),
					'faq'      => array(
						array( 'question' => 'Do I need permission to garden on the roof of my apartment building?', 'answer' => 'Yes. Roof access is not always part of a lease or a unit, so ask the landlord, co-op board, condo association or building superintendent first, and get the answer in writing. In the UK, a roof garden may also need planning permission, particularly if a handrail has to be added.' ),
						array( 'question' => 'Can I build a raised bed on a roof terrace?', 'answer' => 'Only if a structural engineer or surveyor has confirmed the roof can carry it. A raised bed holds a large volume of damp soil, so it needs a professional design, often on a false floor that carries the weight to the walls. Individual lightweight containers are the simpler option.' ),
						array( 'question' => 'How do I water a rooftop garden with no faucet on the roof?', 'answer' => 'Ask whether an outdoor faucet can be added, since a roof garden is hard to keep going without one. A rain barrel is the next option, but a full one is very heavy, so it needs the engineer\'s and the building\'s approval. If you can only carry water up, keep to a few large containers or self-watering planters.' ),
						array( 'question' => 'Does a dark roof make pots too hot for vegetables?', 'answer' => 'It can. A black roof gets much hotter than a white or silver one in summer sun. Plan for it: expect to water more often, group pots so their leaves shade the potting mix, keep them away from pale walls that reflect light onto them, and favor plants that tolerate heat.' ),
						array( 'question' => 'Is food grown on a city roof safe to eat?', 'answer' => 'Rooftops, like any urban garden, catch airborne pollution, especially near busy roads. Wash everything you harvest carefully before eating it.' ),
					),
					'sources'  => array(
						array( 'title' => 'RHS — Roof gardens and balconies', 'url' => 'https://www.rhs.org.uk/garden-design/roof-gardens-balconies' ),
						array( 'title' => 'RHS — Greening balconies and roof gardens', 'url' => 'https://www.rhs.org.uk/garden-inspiration/garden-types/balconies-roof-gardens' ),
						array( 'title' => 'RHS — How to water containers', 'url' => 'https://www.rhs.org.uk/container-gardening/how-to-water-containers' ),
						array( 'title' => 'Brooklyn Botanic Garden (Medi Blum) — Start a Rooftop Container Garden', 'url' => 'https://www.bbg.org/gardening/article/start_a_rooftop_container_garden' ),
						array( 'title' => 'Cornell Small Farms Program — Roof Top Gardening', 'url' => 'https://smallfarms.cornell.edu/es/recursos/guide-to-urban-farming/roof-top-gardening/' ),
						array( 'title' => 'Cornell University (Steve Reiners) — No yard? Grow vegetables (and more) in containers', 'url' => 'https://cals.cornell.edu/school-integrative-plant-science/school-sections/horticulture-section/outreach-and-extension/pandemic-vegetable-gardening/pandemic-vegetable-gardening-2021-archive/no-yard-grow-vegetables-and-more-containers' ),
						array( 'title' => 'Colorado State University Extension — Container Gardens', 'url' => 'https://extension.colostate.edu/resource/container-gardens/' ),
						array( 'title' => 'Oregon State University Extension — Container gardening: Grow vegetables even without yard space', 'url' => 'https://extension.oregonstate.edu/news/container-gardening-grow-vegetables-even-without-yard-space' ),
						array( 'title' => 'University of Washington, Elisabeth C. Miller Library — Vegetables to grow on roof gardens', 'url' => 'https://depts.washington.edu/hortlib/pal/vegetables-to-grow-on-roof-gardens' ),
					),
				),
				'content'      =>
					$p( 'A roof can be the sunniest, most open growing space in a city, and that is both its gift and its challenge. Everything you grow sits on top of somebody\'s building, in full wind and full sun, often a long climb from the nearest faucet. This guide covers what is different about growing food up there, on a private roof terrace or a shared building roof. For balconies, see <a href="/small-spaces/balconies/">how to grow food on a balcony</a>; the general skills of pot growing have their own guides, linked as you go.' ) .

					$h2( 'Is the roof yours to use, and can it take the weight?' ) .
					$p( 'Start with permission. In a shared building, roof rights are not always part of a lease or an apartment, so the Brooklyn Botanic Garden advises checking with the landlord, co-op board, condo association or superintendent before anything else. Ask, too, whether repairs or recoating are coming up: heavy planters that roofers would have to shift are a poor investment that year. In the UK, the RHS adds that a roof garden may need planning permission.' ) .
					$p( 'Then find out what the roof can carry. A roof garden depends entirely on the structure beneath it, and wet potting mix, plants, furniture and the people enjoying them all add up. The RHS recommends asking a chartered structural engineer or a surveyor what is possible, and having them confirm that the roof is waterproof too; Cornell\'s Small Farms Program likewise points rooftop growers to engineering requirements and building codes before they start. Do not rely on rules of thumb: the answer depends on your roof.' ) .
					$list(
						array(
							'<strong>Put weight where the structure is strongest.</strong> The RHS suggests standing the heaviest containers next to load-bearing walls or over a load-bearing beam or joist rather than in the middle of an unsupported span. Ask your engineer where those are.',
							'<strong>Spread the load with a professional design.</strong> Decking built as a "false floor", partly or fully raised above the roof, can carry the weight across to the surrounding walls, according to the RHS. It suggests an architect who specializes in roof gardens for anything complex.',
							'<strong>Raised beds are a structural project.</strong> Our <a href="/diy-projects/build-a-small-raised-bed-on-a-patio/">raised bed for a patio</a> is designed for ground level only. On a roof, build one only to an engineer\'s plan.',
						)
					) .

					$h2( 'Plan how soil, pots and water get up there' ) .
					$p( 'Every bag of potting mix, every pot and every can of water has to travel up the stairs or the elevator, and back down at the end of the season. Choose the route before you choose the containers. A soilless potting mix is two to three times lighter than one containing soil, according to Colorado State University Extension, which makes it easier on both the roof and your back.' ) .
					$p( 'Water is the deciding factor. The RHS says a roof garden needs a water supply, ideally an outside faucet, or at least a rain barrel fed from a downspout. The Brooklyn Botanic Garden points out that a full rain barrel is heavy, so it needs a secure, approved spot and the building\'s permission. If all you can do is carry water up from your apartment, it suggests keeping to a few plants, perhaps drought-tolerant ones; <a href="/gear/best-watering-can-for-a-balcony/">our watering can guide</a> helps there.' ) .

					$h2( 'Shelter your plants and tie everything down' ) .
					$p( 'Roofs are gusty, most of all where no neighboring building breaks the wind. Wind snaps stems, tips containers and dries plants out: Cornell recommends protecting container vegetables from wind because it raises their water demand, and leaves that turn brown and crisp at the edges after a blustery spell usually have <a href="/problems/leaf-scorch/">leaf scorch</a>. Walk the roof on a breezy day to find the most exposed corners.' ) .
					$list(
						array(
							'<strong>Use what shelter already exists.</strong> The RHS suggests making use of parapets, walls and fences. If there is no windbreak, the Brooklyn Botanic Garden suggests a well-secured trellis or low containers set along the perimeter walls.',
							'<strong>Filter the wind.</strong> Slatted or mesh screens slow it down, while a solid barrier can create turbulence behind it, as the RHS explains. Make sure every screen and trellis is fixed to well-supported anchors.',
							'<strong>Choose stable shapes.</strong> Long, low planters keep the center of gravity down. For trees and other tall plants, the Brooklyn Botanic Garden prefers square planters set against a windbreak over top-heavy, vase-shaped pots. Colorado State notes that a tall plant needs a heavier container to stay upright.',
							'<strong>Secure tall plants and climbers.</strong> The RHS says they need fixing firmly to the building or to rails. See <a href="/supports-for-climbing-crops/">which support for which climbing crop</a>.',
							'<strong>Strap down the rest.</strong> Light chairs, watering cans, tools and bags of supplies can be lifted by a gust and could hurt someone, so the Brooklyn Botanic Garden advises securing all of them.',
							'<strong>Keep away from vents and machinery.</strong> Air-conditioning units and intake fans are not windbreaks: their hot exhaust can scorch plants and may be a fire risk, according to the Brooklyn Botanic Garden.',
						)
					) .
					$p( 'In the UK, the RHS notes that a roof without a perimeter wall or handrail may need one, which can bring planning permission into play; the UK minimum handrail height is 3 ft 7 in (1.1 m). Wherever you live, ask the building owner and your engineer what edge protection the roof needs before you garden near it.' ) .

					$h2( 'Plan for strong sun, heat and fast drying' ) .
					$p( 'Most roofs get more than six hours of direct sun a day, the Brooklyn Botanic Garden notes, which suits sun-loving crops. If neighboring towers shade yours for most of the day, choose crops for shade instead; <a href="/what-to-grow-on-a-shady-balcony/">what to grow on a shady balcony</a> applies on a roof too.' ) .
					$p( 'The roof surface itself adds heat. A black roof is much hotter than a white or silver one, and the Brooklyn Botanic Garden reports black roofs in New York City reaching 170 °F (77 °C) on very hot days. Colorado State warns that light reflected off pale walls and paving can scald plants, especially in a west-facing position. The RHS adds that metal pots heat up in sun and bake the potting mix inside.' ) .
					$list(
						array(
							'<strong>Expect to water more.</strong> In summer, rooftop containers often need watering at least daily, and the RHS says twice a day is common, with leaf scorch still possible in well-watered plants. Routines are in <a href="/how-often-to-water-container-plants/">how often to water container plants</a> and <a href="/watering-pots-in-a-heat-wave/">keeping pots alive in a heat wave</a>.',
							'<strong>Go big.</strong> Wide, deep containers dry out more slowly and leave room for roots, according to the RHS.',
							'<strong>Group the pots.</strong> Standing them together raises the humidity around the plants and lets leaves shade the potting mix, as the RHS suggests.',
							'<strong>Automate if you can.</strong> The Brooklyn Botanic Garden notes that many roof gardeners run drip irrigation from a faucet on the roof, and the RHS calls an automatic system the ideal for larger roof gardens. Our <a href="/gear/best-drip-irrigation-kit-for-pots/">drip kit buying guide</a> compares the types, and <a href="/diy-projects/set-up-a-drip-irrigation-kit/">the drip kit project</a> walks through the setup. Self-watering planters, with a reservoir in the base, also stretch the time between waterings; you can <a href="/diy-projects/self-watering-pot/">make a self-watering pot</a>.',
							'<strong>Mulch, but shelter first.</strong> The RHS suggests a layer of bark or gravel on the potting mix to slow moisture loss. Cornell points out that most of the water a container plant loses goes through its leaves, which mulch cannot stop, so wind shelter does more. See <a href="/how-to-mulch-pots/">how to mulch pots</a>.',
						)
					) .

					$h2( 'Protect the roof: drains and waterproofing' ) .
					$p( 'The roof keeps the building below dry, and a garden must never compromise that. Put a buffer such as rubber mats or wooden decking under your containers: the Brooklyn Botanic Garden says this helps them drain and protects the roofing. The RHS also recommends raising containers off the surface so their roots do not sit waterlogged.' ) .
					$list(
						array(
							'<strong>Keep every drain and gutter clear.</strong> Never stand pots over a roof drain, and sweep up dead leaves and spilled potting mix before they clog it, as the Brooklyn Botanic Garden advises.',
							'<strong>Send runoff where it should go.</strong> If you install irrigation, the RHS says excess water should flow to a drainpipe outlet.',
							'<strong>Weed the containers.</strong> Wind carries seeds onto roofs, and the Brooklyn Botanic Garden warns of volunteers such as mugwort, clover and even maple seedlings taking hold in planters. Pull them while small.',
						)
					) .

					$h2( 'Choose lightweight containers and potting mix' ) .
					$p( 'Weight runs through every decision on a roof. The RHS suggests fiberglass, plastic or lightweight metal containers, which also lose moisture more slowly than terracotta; the Brooklyn Botanic Garden prefers plastic or lightweight wood to terra-cotta or concrete. Each pot needs plenty of drainage holes. Fabric grow bags are light to carry up; see <a href="/gear/best-grow-bags/">the best grow bags</a>. Budget planters such as kiddie pools, buckets and recycling bins with holes drilled in the base also work, as the Brooklyn Botanic Garden suggests; <a href="/diy-projects/make-a-planter-from-a-recycled-container/">make a planter from a recycled container</a> shows how. Materials are compared in <a href="/how-to-choose-pots-for-vegetables/">how to choose pots for vegetables</a>.' ) .
					$p( 'For the potting mix, there is a trade-off. A soil-based mix (in the UK, a peat-free John Innes No. 3) holds water better and lasts for long-term plantings, but it is heavier; a soilless mix is lighter but dries faster, and the RHS warns that a container filled with it may need fixing so it does not blow over. The Brooklyn Botanic Garden calls a lightweight mix a must on any roof. What each type offers is covered in <a href="/potting-mix-for-containers/">potting mix for containers</a> and <a href="/gear/best-potting-mix-for-containers/">the best potting mix to buy</a>. Decking and lightweight furniture also lighten the overall load, the RHS notes.' ) .

					$h2( 'What grows well in full exposure' ) .
					$p( 'The Brooklyn Botanic Garden calls sunny rooftops great spots for edible plants and favors drought- and heat-tolerant ones, while admitting that finding what thrives on your roof is partly trial and error. The RHS gives a useful rule: plants that cope with wind and sun usually have narrow, gray, hairy or waxy leaves, and low-growing plants dodge the worst of the wind. It also suggests creating shelter first, with screens or tough plants, so that more tender crops can grow in the calmer pocket behind them.' ) .
					$p( 'For food crops in rooftop containers, the University of Washington\'s Miller Library summarizes a book on edible container gardening that names compact, shallower-rooted vegetables as the best candidates:' ) .
					$list(
						array(
							'<strong>Leafy crops:</strong> lettuce, Swiss chard, mustard and other Asian greens. See <a href="/plants/lettuce-in-pots/">lettuce</a>, <a href="/plants/swiss-chard-in-pots/">Swiss chard</a> and <a href="/plants/asian-greens-in-pots/">Asian greens</a>.',
							'<strong>Roots and bulbs:</strong> radishes, shallots, potatoes and dwarf carrots and beets. See <a href="/plants/radishes-in-pots/">radishes</a>, <a href="/plants/potatoes-in-bags/">potatoes in bags</a> and <a href="/plants/carrots-in-pots/">carrots</a>.',
							'<strong>Fruiting crops:</strong> bush tomatoes, eggplant, zucchini and squash, plus runner beans. See <a href="/plants/eggplant-in-pots/">eggplant</a> and <a href="/plants/zucchini-in-pots/">zucchini</a>. Tie them in well against the wind.',
						)
					) .
					$p( 'The same source finds cabbage, cauliflower, Brussels sprouts, kale, parsnips and other deep-rooted vegetables harder to manage. Whatever you grow, look for compact varieties named in each plant guide.' ) .
					$p( 'Height brings some advantages. The RHS notes fewer slugs and snails up high, the Brooklyn Botanic Garden notes there are no deer, and both report bees and other pollinators reaching rooftop gardens. One thing to remember: urban roofs, especially near busy roads, collect airborne pollution, so the Brooklyn Botanic Garden advises washing everything you pick carefully before eating it. For pests that do arrive, follow <a href="/natural-pest-control-on-a-balcony/">our pesticide-free pest plan</a>.' ) .

					$h2( 'The rooftop year and stretching the season' ) .
					$list(
						array(
							'<strong>Spring and fall</strong> are the best times to plant perennials and fruit bushes, according to the RHS, so they settle in before the harshest weather. The Brooklyn Botanic Garden describes a roof as harsher than ground level in every season, so harden off young plants carefully; see <a href="/how-to-harden-off-seedlings/">how to harden off seedlings</a>.',
							'<strong>Summer</strong> is the season of daily watering and heat. Plan for vacations early: <a href="/watering-pots-when-on-holiday/">how to water pots when you go on vacation</a>.',
							'<strong>Fall and early spring:</strong> cloches, hoop tunnels and row cover add shelter and a little warmth to stretch the season. On a roof, secure every cover so the wind cannot lift it, in line with the Brooklyn Botanic Garden\'s advice to fasten down all garden supplies. See <a href="/cloches-and-mini-greenhouses-on-a-balcony/">cloches and mini greenhouses</a> and <a href="/diy-projects/make-a-hoop-tunnel-for-a-trough/">make a hoop tunnel for a trough</a>.',
							'<strong>Winter</strong> on a roof can be bleak. The Brooklyn Botanic Garden suggests bringing small plants indoors, giving large perennials extra mulch and wrapping containerized woody plants in burlap. The RHS says containers still need water whenever they are not frozen. See <a href="/protect-pots-in-winter/">protect pots in winter</a> and <a href="/diy-projects/wrap-pots-for-winter/">wrap pots for winter</a>.',
						)
					) .

					$h2( 'Common mistakes to avoid' ) .
					$list(
						array(
							'Carrying pots up before the building owner has said yes and an engineer has checked the load.',
							'Filling a raised bed on a roof that was never assessed for one.',
							'Counting on hauling water by hand for a large garden.',
							'Standing pots over a roof drain, or letting leaves and potting mix wash into it.',
							'Leaving chairs, cans and tools loose on a windy roof.',
							'Planting against an air-conditioning unit because it looks like shelter.',
						)
					),
			),
		),
	),
);
