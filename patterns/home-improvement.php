<?php
/**
 * Title: Home Continuous Improvement
 * Slug: gedeon-group/home-improvement
 * Categories: gedeon-sections
 * Keywords: people, sustainability, innovation
 * Description: Three performance pillars — people, sustainability and digital — with focus areas and a group capability bar.
 *
 * @package Gedeon_Group
 */

$gedeon_group_pillars = array(
    array('People &amp; Culture', 'The best place to build a life and career at sea.', 'Exceptional guest service begins with respected, rested and well-developed people.', array('Predictable life', 'Proper rest &amp; manning', 'Career pathways', 'Crew voice')),
    array('Sustainability &amp; Efficiency', 'Responsible performance that can be measured.', 'Environmental responsibility should be built into daily operations, project design and investment decisions.', array('Fuel &amp; energy', 'Shore power', 'HVAC &amp; heat recovery', 'Water &amp; waste')),
    array('Innovation &amp; Digital', 'A living platform for continuous improvement.', 'Technology should remove friction, reveal risk and improve decisions—without replacing human hospitality.', array('Predictive maintenance', 'Fleet dashboards', 'Smart guest environments', 'Cybersecurity &amp; resilience')),
);

$gedeon_group_cards = '';
foreach ($gedeon_group_pillars as [$gedeon_group_label, $gedeon_group_title, $gedeon_group_text, $gedeon_group_focus]) {
    $gedeon_group_cards .= gedeon_group_block_group(
        'gg-card gg-card--pillar',
        gedeon_group_block_p('gg-card__label', $gedeon_group_label)
        . gedeon_group_block_h(3, 'gg-card__title', $gedeon_group_title)
        . gedeon_group_block_p('gg-card__text', $gedeon_group_text)
        . gedeon_group_block_list('gg-card__focus', $gedeon_group_focus)
    );
}

$gedeon_group_inner = gedeon_group_block_heading('The platform continues to improve', 'People, responsible performance<br class="gg-br"> and better decisions every day.')
    . gedeon_group_block_group('gg-grid gg-grid--3 gg-improvement__grid', $gedeon_group_cards)
    . gedeon_group_block_p('gg-bar', 'INTEGRATED GEDEON HOLDING CAPABILITY • GEDEON BLUE • GEDEON CAPITAL');

echo gedeon_group_block_section('gg-improvement', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
