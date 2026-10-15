<?php
/**
 * Title: Home Capabilities
 * Slug: gedeon-group/home-capabilities
 * Categories: gedeon-sections
 * Keywords: capabilities, management, cards
 * Description: Eight numbered capability cards over the coastline image, with an accountability bar.
 *
 * @package Gedeon_Group
 */

$gedeon_group_capabilities = array(
    array('01', 'Technical Management', 'Reliability, maintenance and hotel systems managed as one operating environment.'),
    array('02', 'Marine Operations', 'Safe navigation, compliance, planning and professional bridge operations.'),
    array('03', 'Safety &amp; Compliance', 'Practical governance that protects guests, crew, reputation and asset value.'),
    array('04', 'Crew Management', 'Recruitment, development, welfare and retention built around service culture.'),
    array('05', 'Hotel Operations', 'Hospitality standards, provisioning and service systems aligned to the guest journey.'),
    array('06', 'Procurement &amp; Supply', 'Transparent purchasing, supplier control and dependable global logistics.'),
    array('07', 'Finance Management', 'Clear budgets, reporting, controls and owner-focused financial visibility.'),
    array('08', 'Charter &amp; Trips', 'Commercial readiness and seamless itinerary execution without compromising standards.'),
);

$gedeon_group_cards = '';
foreach ($gedeon_group_capabilities as [$gedeon_group_num, $gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_cards .= gedeon_group_card('gg-card--capability', $gedeon_group_num, $gedeon_group_title, $gedeon_group_text);
}

$gedeon_group_inner = gedeon_group_block_heading(
    'One coordinated operating plan',
    'One clear, accountable relationship.',
    'The scope of a vessel should not create fragmented accountability. Gedeon brings the management platform together around the owner’s priorities.'
)
    . gedeon_group_block_group('gg-grid gg-grid--4 gg-capabilities__grid', $gedeon_group_cards)
    . gedeon_group_block_p('gg-bar', 'ONE MANAGEMENT PLAN • ONE OPERATING RHYTHM • ONE CLEAR ACCOUNTABILITY');

echo gedeon_group_block_section('gg-capabilities gg-section--image', $gedeon_group_inner, array('anchor' => 'capabilities')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
