<?php
/**
 * Title: Home Vessel Lifecycle
 * Slug: gedeon-group/home-lifecycle
 * Categories: gedeon-sections
 * Keywords: lifecycle, newbuild, refit
 * Description: Seven lifecycle stages from vision to renewal, with a closing line.
 *
 * @package Gedeon_Group
 */

$gedeon_group_stages = array(
    array('01', 'Vision', 'Business case and operating concept.'),
    array('02', 'Design', 'Specification and owner requirements.'),
    array('03', 'Tender', 'Yard, contract and commercial strategy.'),
    array('04', 'Build', 'Supervision, control and readiness.'),
    array('05', 'Deliver', 'Trials, handover and warranty.'),
    array('06', 'Manage', 'Safe, efficient, guest-led operation.'),
    array('07', 'Renew', 'Refit, conversion and fleet growth.'),
);

$gedeon_group_cards = '';
foreach ($gedeon_group_stages as [$gedeon_group_num, $gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_cards .= gedeon_group_card('gg-card--stage', $gedeon_group_num, $gedeon_group_title, $gedeon_group_text);
}

$gedeon_group_inner = gedeon_group_block_heading(
    'Complete vessel lifecycle',
    'One partner from vision<br class="gg-br"> to fleet expansion.',
    'Continuity of standards, data, supplier relationships and culture creates long-term value. Gedeon can remain accountable from the earliest owner brief through operation, renewal and fleet growth.'
)
    . gedeon_group_block_group('gg-grid gg-grid--7 gg-lifecycle__grid', $gedeon_group_cards)
    . gedeon_group_block_p('gg-lifecycle__note', 'The lifecycle model reduces handover risk and allows every new vessel to benefit from the operating knowledge of the fleet before it.');

echo gedeon_group_block_section('gg-lifecycle gg-section--image', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
