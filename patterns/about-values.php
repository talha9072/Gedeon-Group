<?php
/**
 * Title: About Values
 * Slug: gedeon-group/about-values
 * Categories: gedeon-sections
 * Keywords: values, principles
 * Description: "What guides us" — four numbered value cards.
 *
 * @package Gedeon_Group
 */

$gedeon_group_values = array(
    array('01', 'Discretion', 'Sensitive ownership, operational and financial information is handled with appropriate care and confidentiality.'),
    array('02', 'Clarity', 'Owners, captains and advisers should understand what is happening, what requires attention and who is responsible.'),
    array('03', 'Accountability', 'Responsibilities, approvals and reporting procedures are clearly defined from the beginning.'),
    array('04', 'Collaboration', 'Effective yacht management depends on constructive cooperation between the owner and specialist staff.'),
);

$gedeon_group_cards = '';
foreach ($gedeon_group_values as [$gedeon_group_num, $gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_cards .= gedeon_group_card('gg-card--value', $gedeon_group_num, $gedeon_group_title, $gedeon_group_text);
}

$gedeon_group_inner = gedeon_group_block_heading(
    'What Guides Us',
    'A Professional Standard',
    'Our work is guided by principles that support effective vessel management and lasting professional relationships.'
)
    . gedeon_group_block_group('gg-grid gg-grid--4 gg-values__grid', $gedeon_group_cards);

echo gedeon_group_block_section('gg-values', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
