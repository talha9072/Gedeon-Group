<?php
/**
 * Title: About Team
 * Slug: gedeon-group/about-team
 * Categories: gedeon-sections
 * Keywords: team, people, director, profile
 * Description: "The Team Behind Gedeon Group" — Stein Johnsen's photo beside his profile and three focus points.
 *
 * @package Gedeon_Group
 */

$gedeon_group_focus = array(
    array('Owner relationships', 'A single, trusted point of contact focused on the owner’s long-term objectives.'),
    array('International perspective', 'Experience supporting internationally connected families, family offices and cross-border structures.'),
    array('Accountable oversight', 'Clear responsibility and consistent reporting across every vessel Gedeon Group manages.'),
);

$gedeon_group_items = '';
foreach ($gedeon_group_focus as $gedeon_group_index => [$gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_items .= gedeon_group_block_group(
        'gg-team__focus',
        gedeon_group_block_p('gg-team__focus-number', sprintf('%02d', $gedeon_group_index + 1))
        . gedeon_group_block_group(
            'gg-team__focus-text',
            gedeon_group_block_h(3, 'gg-team__focus-title', $gedeon_group_title)
            . gedeon_group_block_p('gg-team__focus-body', $gedeon_group_text)
        )
    );
}

$gedeon_group_inner = gedeon_group_block_image('gg-team__photo', get_theme_file_uri('assets/img/team-stein-johnsen.webp'), 'Stein Johnsen, Director of Gedeon Group')
    . gedeon_group_block_group(
        'gg-team__profile',
        gedeon_group_block_p('gg-eyebrow', 'The Team Behind Gedeon Group')
        . gedeon_group_block_h(2, 'gg-title', 'Stein Johnsen')
        . gedeon_group_block_p('gg-team__role', 'Director')
        . gedeon_group_block_rule('gg-team__rule')
        . gedeon_group_block_p('gg-team__text', 'Stein works closely with owners, families and their advisers to make sure every vessel is managed around the owner’s priorities. With a background in advising internationally connected families and family offices, he brings a long-term, relationship-led approach to how Gedeon Group supports each vessel.')
        . gedeon_group_block_p('gg-team__text', 'He believes the best results come from understanding the people behind the asset, and from working alongside existing captains, crews and advisers rather than around them.')
        . gedeon_group_block_group('gg-team__focus-list', $gedeon_group_items)
    );

echo gedeon_group_block_section('gg-team', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
