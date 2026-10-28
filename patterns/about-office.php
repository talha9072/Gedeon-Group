<?php
/**
 * Title: About Office
 * Slug: gedeon-group/about-office
 * Categories: gedeon-sections
 * Keywords: office, location, london
 * Description: "Our London Location" — the London office card and Dubai, Singapore and Miami (coming soon).
 *
 * @package Gedeon_Group
 */

$gedeon_group_contact = gedeon_group_contact();

$gedeon_group_cards = gedeon_group_image_card(
    'office-london.webp',
    'London',
    gedeon_group_block_h(3, 'gg-image-card__title', 'London, UK')
    . gedeon_group_block_p('gg-image-card__text', 'Our London office provides a central point of contact for owners, captains, professional advisers and project partners.')
    . gedeon_group_block_list(
        'gg-image-card__details',
        array(
            '<a href="' . esc_url($gedeon_group_contact['map']) . '" target="_blank" rel="noreferrer noopener">' . esc_html($gedeon_group_contact['address']) . '</a>',
            '<a href="' . esc_attr($gedeon_group_contact['phone_uri']) . '">' . esc_html($gedeon_group_contact['phone']) . '</a>',
            '<a href="mailto:' . esc_attr($gedeon_group_contact['email']) . '">' . esc_html($gedeon_group_contact['email']) . '</a>',
        )
    ),
    'gg-image-card--office'
);
foreach (array('dubai' => 'Dubai', 'singapore' => 'Singapore', 'miami' => 'Miami') as $gedeon_group_city => $gedeon_group_name) {
    $gedeon_group_cards .= gedeon_group_image_card(
        'office-' . $gedeon_group_city . '.webp',
        $gedeon_group_name,
        gedeon_group_block_h(3, 'gg-image-card__title', 'Coming Soon')
        . gedeon_group_block_p('gg-image-card__text', 'Additional office locations will be added here once confirmed.'),
        'gg-image-card--office'
    );
}

$gedeon_group_inner = gedeon_group_listing_heading('Where to Find Us', 'Our London Location')
    . gedeon_group_block_group('gg-grid gg-grid--4 gg-office__grid', $gedeon_group_cards);

echo gedeon_group_block_section('gg-office', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
