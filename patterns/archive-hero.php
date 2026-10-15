<?php
/**
 * Title: Archive Hero
 * Slug: gedeon-group/archive-hero
 * Categories: gedeon-sections
 * Inserter: no
 * Description: Editorial hero for category and date archives — archive title and description.
 *
 * @package Gedeon_Group
 */

$gedeon_group_inner = gedeon_group_block_image('gg-hero__logo', get_theme_file_uri('assets/img/gedeon-group-logo-vertical.png'), 'Gedeon Group', 370, 199)
    . gedeon_group_block_group(
        'gg-hero__content',
        gedeon_group_block_p('gg-hero__eyebrow', 'News Archive')
        . '<!-- wp:query-title {"type":"archive","showPrefix":false,"level":1,"className":"gg-hero__title"} /-->'
        . '<!-- wp:term-description {"className":"gg-hero__lead"} /-->'
    );

echo gedeon_group_block_cover('gg-hero gg-hero--editorial', get_theme_file_uri('assets/img/news-hero.webp'), $gedeon_group_inner, 776); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
