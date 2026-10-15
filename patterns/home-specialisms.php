<?php
/**
 * Title: Home Vessel Specialisms
 * Slug: gedeon-group/home-specialisms
 * Categories: gedeon-sections
 * Keywords: specialisms, vessels, experience standard
 * Description: Four specialism cards and the four-part Gedeon Experience Standard.
 *
 * @package Gedeon_Group
 */

$gedeon_group_specialisms = array(
    array('MegaYachts', 'Managing a complex private asset with precision.', 'Integrated management for large private yachts where technical performance, owner priorities and guest experience must operate as one.'),
    array('Passenger Yachts', 'Hospitality-led operations at passenger scale.', 'Guest-focused operating models combining safe operations, hotel services, crew coordination and consistent standards.'),
    array('River Cruise Vessels', 'Boutique hospitality. Specialised river operations.', 'Purpose-built operating platforms that combine intimate service, local complexity and dependable vessel performance.'),
    array('Owner Representation &amp; Responsibility', 'Clear accountability around the owner’s priorities.', 'Owner priorities stay central through clear responsibility across teams, partners, shipyards and specialist advisers.'),
);
$gedeon_group_standard = array(
    array('Comfort', 'Temperature, air quality, water pressure, lighting, noise and vibration.'),
    array('Responsiveness', 'Requests anticipated and resolved through clear ownership and empowered teams.'),
    array('Reliability', 'Every guest-facing promise supported by dependable technical and hotel operations.'),
    array('Personalisation', 'Consent-based preferences, seamless handovers and service supported by reliable operating data.'),
);

$gedeon_group_cards = '';
foreach ($gedeon_group_specialisms as [$gedeon_group_label, $gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_cards .= gedeon_group_block_group(
        'gg-card gg-card--specialism',
        gedeon_group_block_p('gg-card__label', $gedeon_group_label)
        . gedeon_group_block_h(3, 'gg-card__title', $gedeon_group_title)
        . gedeon_group_block_p('gg-card__text', $gedeon_group_text)
    );
}

$gedeon_group_standards = '';
foreach ($gedeon_group_standard as [$gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_standards .= gedeon_group_block_group(
        'gg-card gg-card--standard',
        gedeon_group_block_rule('gg-card__rule')
        . gedeon_group_block_h(3, 'gg-card__title', $gedeon_group_title)
        . gedeon_group_block_p('gg-card__text', $gedeon_group_text)
    );
}

$gedeon_group_inner = gedeon_group_block_heading('Designing around the vessel', 'Designed around the vessel<br class="gg-br"> and the experience it exists to deliver.')
    . gedeon_group_block_group('gg-grid gg-grid--4 gg-specialisms__grid', $gedeon_group_cards)
    . gedeon_group_block_p('gg-eyebrow gg-specialisms__standard', 'The Gedeon experience standard')
    . gedeon_group_block_group('gg-grid gg-grid--4 gg-specialisms__standards', $gedeon_group_standards);

echo gedeon_group_block_section('gg-specialisms', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
