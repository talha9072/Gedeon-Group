<?php
/**
 * Title: Careers Listing
 * Slug: gedeon-group/careers-listing
 * Categories: gedeon-sections
 * Keywords: careers, vacancies, jobs
 * Description: "Current Career Opportunities" — vacancy cards (no current vacancies).
 *
 * Duplicate a card and change its title, text and link when a vacancy is approved.
 *
 * @package Gedeon_Group
 */

$gedeon_group_cards = '';
for ($gedeon_group_i = 0; $gedeon_group_i < 6; $gedeon_group_i++) {
    $gedeon_group_cards .= gedeon_group_image_card(
        'careers-hero.webp',
        '',
        gedeon_group_block_p('gg-image-card__label', 'Careers')
        . gedeon_group_block_h(3, 'gg-image-card__title', 'No Current Vacancies')
        . gedeon_group_block_p('gg-image-card__text', 'There are no current vacancies at Gedeon Group. Future opportunities will be published here when available.')
        . gedeon_group_block_p('gg-link-arrow gg-image-card__link', '<a href="#faq">Learn more</a>'),
        'gg-image-card--career'
    );
}

$gedeon_group_inner = gedeon_group_listing_heading('Join Our Team', 'Current Career Opportunities')
    . gedeon_group_block_group('gg-grid gg-grid--3 gg-careers__grid', $gedeon_group_cards);

echo gedeon_group_block_section('gg-careers', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
