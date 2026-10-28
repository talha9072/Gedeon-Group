<?php
/**
 * Title: Home Hero
 * Slug: gedeon-group/home-hero
 * Categories: gedeon-sections
 * Keywords: hero, home, maritime
 * Description: Home hero with the approved Gedeon Group logo, positioning line, headline, lead and two actions.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_page_hero( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup, escaped when built.
    array(
        'class'   => 'gg-hero--home',
        'image'   => 'home-hero.webp',
        'eyebrow' => 'GEDEON GROUP / MARITIME • YACHTING • CRUISE',
        'title'   => 'LUXURY HOSPITALITY AT SEA.<br>MARITIME EXCELLENCE BEHIND IT.',
        'lead'    => 'Full-scope management for private yachts, passenger yachts and river cruise vessels—from daily operations to newbuildings, conversions and long-term asset strategy.',
        'buttons' => array(
            array('Explore our capabilities', '#capabilities'),
            array('Discuss your vessel', home_url('/contact/'), 'is-style-outline gg-button--secondary'),
        ),
    )
);
