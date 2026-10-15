<?php
/**
 * Title: About Hero
 * Slug: gedeon-group/about-hero
 * Categories: gedeon-sections
 * Keywords: about, hero
 * Description: About page hero.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_page_hero( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup, escaped when built.
    array(
        'image'   => 'about-hero.webp',
        'eyebrow' => 'About Gedeon Group',
        'title'   => 'Vessel Management with Clarity',
        'lead'    => 'A tailored management partner for owners seeking better oversight, coordinated support and confidence across megayachts, passenger yachts and river cruise vessels.',
    )
);
