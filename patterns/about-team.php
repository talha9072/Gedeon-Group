<?php
/**
 * Title: About Team
 * Slug: gedeon-group/about-team
 * Categories: gedeon-sections
 * Keywords: team, people, profiles
 * Description: "The Team Behind Gedeon Group" — three profile cards.
 *
 * @package Gedeon_Group
 */

$gedeon_group_cards = '';
foreach (array('team-1.webp', 'team-2.webp', 'team-3.webp') as $gedeon_group_image) {
    $gedeon_group_cards .= gedeon_group_image_card(
        $gedeon_group_image,
        '',
        gedeon_group_block_h(3, 'gg-image-card__title', 'Team Profiles Coming Soon')
        . gedeon_group_block_p('gg-image-card__text', 'Approved names, roles, biographies and photographs will be published here.'),
        'gg-image-card--profile'
    );
}

$gedeon_group_inner = gedeon_group_listing_heading('Meet Our People', 'The Team Behind Gedeon Group')
    . gedeon_group_block_group('gg-grid gg-grid--3 gg-team__grid', $gedeon_group_cards);

echo gedeon_group_block_section('gg-team', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
