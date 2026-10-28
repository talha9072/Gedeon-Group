<?php
/**
 * Vessel-type pages (Private Yachts, Passenger Yachts, River Passenger Ships).
 *
 * The three Figma pages share one layout: hero, introduction, priorities, how we work,
 * mid-page CTA, outcome, support, other vessel types and the closing CTA. The copy for each
 * page lives in gedeon_group_vessel_content(); gedeon_group_vessel_page() builds the blocks.
 *
 * @package Gedeon_Group
 */

if (! defined('ABSPATH')) {
    exit;
}

function gedeon_group_vessel_content(string $key): array
{
    $content = array(
        'megayachts' => array(
            'hero'       => array('private-yachts-hero.webp', 'Private Yachts', 'Private Yacht Management,<br>Built Around the Owner', 'Integrated technical, operational, crew, financial, charter and insurance support for complex private yachts, coordinated through one accountable management relationship.'),
            'intro'      => array('Private Yacht Management', 'Precision Behind Every Owner Experience', 'Large private yachts demand coordinated technical performance, discretion and service.', array('Gedeon brings the technical, operational, crew, financial and administrative disciplines together around one owner-led operating plan.', 'The result is clear responsibility, consistent standards and a management structure designed to protect the yacht, the programme and the experience on board.')),
            'priorities' => array('Private Yacht Priorities', 'A Management Platform Built for Private Yacht Ownership', 'The management model is shaped around the owner, the yacht and the programme, with every discipline working to one standard.', array(
                array('Owner Representation', 'Owner priorities remain central across captains, managers, shipyards, advisers and specialist partners.'),
                array('Technical Reliability', 'Maintenance, engineering and hotel systems are coordinated around safe, reliable operation and guest comfort.'),
                array('Crew &amp; Hospitality', 'Crew structure, service culture and onboard standards are managed as part of the operating platform.'),
                array('Financial Control', 'Budgets, approvals, procurement and reporting are kept visible so decisions stay informed and controlled.'),
            )),
            'process'    => array('From Owner Priorities to Daily Execution', 'The operating structure is defined around how the owner wants to use the yacht, then translated into clear responsibilities, standards, approvals and reporting.', array(
                array('Understand the programme', 'Review cruising plans, owner preferences, technical profile, crew structure and service expectations.'),
                array('Define the standards', 'Agree responsibilities, approval routes, reporting rhythms and the service standard expected on board.'),
                array('Coordinate specialists', 'Bring technical, operational, crew, financial and external partners into one working structure.'),
                array('Report clearly', 'Keep performance, decisions, risk and expenditure visible through concise owner-focused reporting.'),
            )),
            'cta'        => 'megayachts-cta.webp',
            'outcome'    => array('Owner Outcome', 'One Team Around the Owner’s Priorities', 'Complexity stays behind the scenes while the owner retains clear visibility, confidence and control.', array(
                array('Discreet oversight', 'Clear responsibility without unnecessary noise around the owner.'),
                array('Consistent standards', 'Technical, crew and service disciplines work to one agreed operating standard.'),
                array('Clear visibility', 'Reporting keeps performance, cost and decisions visible without operational clutter.'),
            )),
            'support'    => array('megayachts-feature.webp', 'Private yacht underway along a coastline', 'Global Private Yacht Support', 'Wherever the Programme Takes You', 'Gedeon coordinates owners, captains, shipyards and specialist partners across the yacht’s operating programme, maintaining continuity as locations and requirements change.', array(
                array('International cruising', 'Operational planning and support that follows the yacht across regions and seasons.'),
                array('Shipyard coordination', 'Clear owner representation through maintenance periods, refits and technical works.'),
                array('Specialist network', 'Trusted technical, legal, insurance and service partners coordinated around the yacht.'),
            )),
        ),
        'passenger'  => array(
            'hero'       => array('passenger-hero.webp', 'Passenger Yachts', 'Hospitality-Led Operations<br>at Passenger Scale', 'Coordinated vessel management for passenger yachts where safe marine operations, hotel services, crew culture and guest experience must perform as one.'),
            'intro'      => array('Passenger Yacht Operations', 'One Operating Platform for Guests, Crew and Vessel', 'Passenger yacht operations succeed when marine discipline and hospitality work together.', array('Gedeon coordinates the vessel, hotel operation, crew structure and commercial support around the experience the yacht is intended to deliver.', 'This creates clear accountability behind the scenes while guests experience a consistent, considered and professionally managed journey.')),
            'priorities' => array('Passenger Yacht Priorities', 'An Operating Platform Built Around the Guest Journey', 'Marine, hotel and guest-facing operations are brought into one coordinated platform so service quality is supported by dependable vessel performance.', array(
                array('Guest Journey', 'Service standards, itineraries and onboard touchpoints are coordinated around a clear guest experience.'),
                array('Marine &amp; Technical', 'Navigation, engineering, maintenance and compliance support safe, reliable passenger operations.'),
                array('Hotel Operations', 'Housekeeping, food and beverage, provisioning and hotel systems are managed as part of the vessel operation.'),
                array('Crew &amp; Service Culture', 'Crew planning, welfare, training and service culture support consistent delivery across every voyage.'),
            )),
            'process'    => array('Translate the Guest Promise into the Operating Plan', 'The operating model starts with the passenger experience, then aligns marine operations, hotel services, crew structure and reporting around that standard.', array(
                array('Understand the concept', 'Review the vessel, passenger profile, itinerary, service proposition and operational constraints.'),
                array('Define service standards', 'Set clear expectations for comfort, hospitality, responsiveness, safety and presentation.'),
                array('Integrate vessel &amp; hotel', 'Coordinate marine, technical and hotel teams so operational decisions support the guest journey.'),
                array('Measure &amp; improve', 'Use reporting, feedback and operating data to strengthen consistency over time.'),
            )),
            'cta'        => 'passenger-cta.webp',
            'outcome'    => array('Guest Outcome', 'Reliable Operations Guests Never Have to Notice', 'The guest experience remains calm and consistent because the operating disciplines behind it are aligned.', array(
                array('Comfort', 'Technical and hotel systems support a stable, comfortable environment throughout the journey.'),
                array('Responsiveness', 'Clear ownership allows guest and operational requests to be handled quickly and professionally.'),
                array('Consistency', 'Service, safety and presentation standards are maintained across teams and voyages.'),
            )),
            'support'    => array('passenger-feature.webp', 'Passenger yacht moored in a marina', 'Passenger Yacht Support', 'Built Around the Full Guest Journey', 'From itinerary planning to onboard service and technical readiness, the operating model is coordinated around what guests experience and what the vessel needs to deliver reliably.', array(
                array('Itinerary &amp; readiness', 'Voyage planning, vessel readiness and guest requirements are aligned before departure.'),
                array('Hotel &amp; supply', 'Provisioning, housekeeping and hotel systems are coordinated with operational requirements.'),
                array('Service continuity', 'Crew handovers, reporting and operating standards support a consistent experience over time.'),
            )),
        ),
        'river'      => array(
            'hero'       => array('river-hero.webp', 'River Passenger Ships', 'Reliable River Operations,<br>Exceptional Guest Service', 'Integrated management for river passenger vessels, combining technical and nautical reliability, hotel operations, crew coordination and clear owner oversight.'),
            'intro'      => array('River Passenger Operations', 'Designed for the Realities of River Service', 'River passenger operations depend on precise coordination between route, vessel, crew and hotel service.', array('Gedeon brings nautical, technical, hotel, crew and administrative disciplines into one operating structure built around the vessel’s route and passenger programme.', 'The objective is dependable service, clear accountability and a consistent onboard experience across changing ports, schedules and operating conditions.')),
            'priorities' => array('River Passenger Priorities', 'An Operating Platform Built for River Service', 'Nautical, technical and hotel operations are coordinated around the demands of scheduled river service and a consistent passenger experience.', array(
                array('Technical &amp; Nautical', 'Navigation, engineering, maintenance and compliance are coordinated around safe, reliable river operations.'),
                array('Hotel &amp; Hospitality', 'Hotel operations, catering, provisioning and guest service are aligned with the passenger journey.'),
                array('Owner Representation', 'Owner representation supports newbuildings, refurbishments, refits and major vessel projects.'),
                array('Charter &amp; Insurance', 'Charter readiness, commercial coordination and insurance support are managed around the vessel programme.'),
            )),
            'process'    => array('Plan Around the Route, Vessel and Guest Experience', 'The operating model begins with the river programme and the passenger proposition, then aligns nautical, technical, hotel and crew responsibilities around those requirements.', array(
                array('Review the route', 'Understand schedules, ports, route constraints, operating windows and passenger requirements.'),
                array('Define operating standards', 'Set clear expectations for navigation, technical reliability, guest service, safety and reporting.'),
                array('Coordinate vessel &amp; shore', 'Align onboard teams, shore support, suppliers and local interfaces around the sailing programme.'),
                array('Track performance', 'Use concise reporting to keep reliability, guest service, cost and operational issues visible.'),
            )),
            'cta'        => 'river-cta.webp',
            'outcome'    => array('Passenger Outcome', 'A Consistent Standard Across Every Sailing', 'Passengers experience calm, reliable service while the operational complexity of river travel is managed behind the scenes.', array(
                array('Safe operations', 'Nautical planning and clear operating standards support reliable river service.'),
                array('Guest comfort', 'Technical and hotel systems are managed around a stable, comfortable onboard environment.'),
                array('Owner visibility', 'Performance, cost and operational priorities remain visible through regular reporting.'),
            )),
            'support'    => array('river-feature.webp', 'River passenger ships moored along a quay', 'River Operations', 'Local Complexity, Centrally Coordinated', 'River operations require close coordination between vessel teams, ports, shore support and local service partners. Gedeon keeps those moving parts connected through one management structure.', array(
                array('Route constraints', 'Operating plans account for route conditions, schedules and local navigation requirements.'),
                array('Port &amp; shore interfaces', 'Local suppliers, turnaround activity and shore-side support are coordinated with the vessel team.'),
                array('Scheduled reliability', 'Maintenance, crew planning and reporting support dependable service across the operating season.'),
            )),
        ),
    );

    return $content[$key];
}

/**
 * Full block markup for one vessel page.
 *
 * @param string $key megayachts (Private Yachts) | passenger | river.
 */
function gedeon_group_vessel_page(string $key): string
{
    $c   = gedeon_group_vessel_content($key);
    $num = static fn (int $i): string => sprintf('%02d', $i + 1);

    // 01 Hero.
    [$image, $eyebrow, $title, $lead] = $c['hero'];
    $out = gedeon_group_page_hero(
        array(
            'class'   => 'gg-hero--vessel',
            'image'   => $image,
            'eyebrow' => $eyebrow,
            'title'   => $title,
            'lead'    => $lead,
        )
    );

    // 02 Introduction.
    [$eyebrow, $title, $lead, $paragraphs] = $c['intro'];
    $out .= gedeon_group_block_section(
        'gg-vessel-intro',
        gedeon_group_block_group(
            'gg-vessel-intro__heading',
            gedeon_group_block_p('gg-eyebrow', $eyebrow)
            . gedeon_group_block_h(2, 'gg-title', $title)
            . gedeon_group_block_rule('gg-vessel-intro__rule')
            . gedeon_group_block_p('gg-vessel-intro__lead', $lead)
        )
        . gedeon_group_block_group(
            'gg-vessel-intro__copy',
            implode('', array_map(static fn ($p) => gedeon_group_block_p('gg-vessel-intro__text', $p), $paragraphs))
        )
    );

    // 03 Priorities.
    [$eyebrow, $title, $intro, $cards] = $c['priorities'];
    $grid = '';
    foreach ($cards as $i => [$card_title, $card_text]) {
        $grid .= gedeon_group_card('gg-card--priority', $num($i), $card_title, $card_text);
    }
    $out .= gedeon_group_block_section(
        'gg-priorities',
        gedeon_group_block_heading($eyebrow, $title, $intro, false, 'gg-priorities__heading')
        . gedeon_group_block_group('gg-grid gg-grid--4 gg-priorities__grid', $grid)
    );

    // 04 How we work.
    [$title, $intro, $steps] = $c['process'];
    $list = '';
    foreach ($steps as $i => [$step_title, $step_text]) {
        $list .= gedeon_group_block_group(
            'gg-step',
            gedeon_group_block_p('gg-step__num', $num($i))
            . gedeon_group_block_rule('gg-step__rule')
            . gedeon_group_block_h(3, 'gg-step__title', $step_title)
            . gedeon_group_block_p('gg-step__text', $step_text)
        );
    }
    $out .= gedeon_group_block_section(
        'gg-process',
        gedeon_group_block_heading('How We Work', $title, $intro, false, 'gg-process__heading')
        . gedeon_group_block_group('gg-grid gg-grid--4 gg-process__steps', $list)
    );

    // Mid-page CTA.
    $out .= gedeon_group_mid_cta(
        array(
            'image' => $c['cta'],
            'title' => 'Your Vessel. Your Priorities.<br class="gg-br"> One Trusted Partner.',
            'text'  => 'Whether you are reviewing an existing operation, planning the next phase of a vessel or looking for long-term management support, Gedeon brings the right expertise together with clarity, discretion and care.',
        )
    );

    // 05 Outcome.
    [$eyebrow, $title, $intro, $items] = $c['outcome'];
    $list = '';
    foreach ($items as [$item_title, $item_text]) {
        $list .= gedeon_group_block_group(
            'gg-outcome',
            gedeon_group_block_rule('gg-outcome__rule')
            . gedeon_group_block_h(3, 'gg-outcome__title', $item_title)
            . gedeon_group_block_p('gg-outcome__text', $item_text)
        );
    }
    $out .= gedeon_group_block_section(
        'gg-outcomes',
        gedeon_group_block_heading($eyebrow, $title, $intro, true, 'gg-outcomes__heading')
        . gedeon_group_block_group('gg-grid gg-grid--3 gg-outcomes__grid', $list)
    );

    // 06 Support.
    [$image, $alt, $eyebrow, $title, $text, $rows] = $c['support'];
    $list = '';
    foreach ($rows as $i => [$row_title, $row_text]) {
        $list .= gedeon_group_block_group(
            'gg-support__row',
            gedeon_group_block_p('gg-support__num', $num($i))
            . gedeon_group_block_h(3, 'gg-support__title', $row_title)
            . gedeon_group_block_p('gg-support__text', $row_text)
        );
    }
    $out .= gedeon_group_block_section(
        'gg-support',
        gedeon_group_block_image('gg-support__image', get_theme_file_uri('assets/img/' . $image), $alt, 560, 480)
        . gedeon_group_block_group(
            'gg-support__copy',
            gedeon_group_block_p('gg-eyebrow', $eyebrow)
            . gedeon_group_block_h(2, 'gg-title', $title)
            . gedeon_group_block_rule('gg-support__rule')
            . gedeon_group_block_p('gg-support__intro', $text)
            . gedeon_group_block_group('gg-support__list', $list)
        )
    );

    // Other vessel types.
    $cards = '';
    foreach (gedeon_group_vessel_types() as $other => $vessel) {
        if ($other === $key) {
            continue;
        }
        $cards .= gedeon_group_block_group(
            'gg-other-vessel',
            gedeon_group_block_image('gg-other-vessel__image', get_theme_file_uri('assets/img/' . $vessel['image']), '', 240, 280)
            . gedeon_group_block_group(
                'gg-other-vessel__body',
                gedeon_group_block_p('gg-other-vessel__label', esc_html($vessel['label']))
                . gedeon_group_block_h(3, 'gg-other-vessel__title', '<a href="' . esc_url($vessel['url']) . '">' . esc_html($vessel['name']) . '</a>')
                . gedeon_group_block_p('gg-other-vessel__text', esc_html($vessel['summary']))
            )
        );
    }
    $out .= gedeon_group_block_section(
        'gg-other-vessels',
        gedeon_group_block_heading('Other Vessel Types', 'Explore Gedeon by Vessel Type', 'The same management platform, adapted to different operating realities.', false, 'gg-other-vessels__heading')
        . gedeon_group_block_group('gg-other-vessels__grid', $cards)
    );

    return $out . gedeon_group_closing_cta();
}
