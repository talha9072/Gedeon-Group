<?php
/**
 * Title: Search Hero
 * Slug: gedeon-group/search-hero
 * Categories: gedeon-sections
 * Inserter: no
 * Description: Editorial hero for search results.
 *
 * @package Gedeon_Group
 */

$gedeon_group_inner = gedeon_group_block_image('gg-hero__logo', get_theme_file_uri('assets/img/gedeon-group-logo-vertical.png'), 'Gedeon Group', 370, 199)
    . gedeon_group_block_group(
        'gg-hero__content',
        gedeon_group_block_p('gg-hero__eyebrow', 'Search')
        . '<!-- wp:query-title {"type":"search","level":1,"className":"gg-hero__title"} /-->'
        . gedeon_group_block_p('gg-hero__lead', 'Articles from the Gedeon Group newsroom that match your search.')
    );

echo gedeon_group_block_cover('gg-hero gg-hero--editorial', get_theme_file_uri('assets/img/news-hero.webp'), $gedeon_group_inner, 776); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
