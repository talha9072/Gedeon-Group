<?php
/**
 * Title: Careers Hero
 * Slug: gedeon-group/careers-hero
 * Categories: gedeon-sections
 * Keywords: careers, hero
 * Description: Careers page hero.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_page_hero( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup, escaped when built.
    array(
        'image'   => 'careers-hero.webp',
        'eyebrow' => 'Careers at Gedeon Group',
        'title'   => 'Build Your Career',
        'lead'    => 'Join a professional environment centred on sound judgement, clear communication, accountability and exceptional client service.',
    )
);
