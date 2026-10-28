<?php
/**
 * Title: About Introduction
 * Slug: gedeon-group/about-intro
 * Categories: gedeon-sections
 * Keywords: about, approach, introduction
 * Description: Two overlapping images beside "Our Approach" copy.
 *
 * @package Gedeon_Group
 */

$gedeon_group_inner = gedeon_group_block_group(
    'gg-about-intro__media',
    gedeon_group_block_image('gg-about-intro__image', get_theme_file_uri('assets/img/about-hero.webp'), 'Private yacht at anchor in calm water', 455, 365)
    . gedeon_group_block_image('gg-about-intro__image gg-about-intro__image--inset', get_theme_file_uri('assets/img/about-intro-secondary.webp'), 'Crew member on deck of a yacht', 230, 245)
)
    . gedeon_group_block_group(
        'gg-about-intro__copy',
        gedeon_group_block_p('gg-eyebrow', 'Our Approach')
        . gedeon_group_block_h(2, 'gg-title', 'A Management Partner Focused on Your Priorities')
        . gedeon_group_block_p('gg-about-intro__text', 'Gedeon Group was established to provide owners with a professional and personal approach to vessel management. Rather than adding unnecessary layers, we create a clear structure around the existing operation. We work alongside captains, crews and specialist teams across private yachts, passenger yachts and river cruise vessels, ensuring relevant information reaches the right people at the right time.')
        . gedeon_group_block_p('gg-about-intro__text', 'Our approach begins with understanding the vessel, its programme and the owner’s expectations. Across private yachts, passenger yachts and river cruise vessels, responsibilities, reporting procedures and decision-making processes can then be structured around the vessel’s actual requirements. The result is practical oversight that supports safe, efficient operation while allowing the owner to focus on the experience of ownership.')
    );

echo gedeon_group_block_section('gg-about-intro', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
