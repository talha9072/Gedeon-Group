<?php
/**
 * Title: Home Positioning
 * Slug: gedeon-group/home-positioning
 * Categories: gedeon-sections
 * Keywords: positioning, hospitality, maritime
 * Description: Positioning statement with four numbered principles and a closing quote.
 *
 * @package Gedeon_Group
 */

$gedeon_group_points = array(
    array('01', 'Guest-first operations', 'Technical and marine decisions measured by their impact on comfort and the guest journey.'),
    array('02', 'People-first culture', 'A crew model built around respect, rest, development, retention and pride.'),
    array('03', 'Full-lifecycle capability', 'Operation, newbuilding, conversion, refurbishment, delivery and optimisation.'),
    array('04', 'Scalable fleet platform', 'Standards, systems and governance designed to grow with the owner’s future fleet.'),
);

$gedeon_group_items = '';
foreach ($gedeon_group_points as [$gedeon_group_num, $gedeon_group_title, $gedeon_group_text]) {
    $gedeon_group_items .= gedeon_group_block_group(
        'gg-point',
        gedeon_group_block_p('gg-point__num', $gedeon_group_num)
        . gedeon_group_block_h(3, 'gg-point__title', $gedeon_group_title)
        . gedeon_group_block_p('gg-point__text', $gedeon_group_text)
    );
}

$gedeon_group_inner = gedeon_group_block_group(
    'gg-heading',
    gedeon_group_block_rule()
    . gedeon_group_block_p('gg-eyebrow', 'The maritime partner behind exceptional experiences at sea.')
)
    . gedeon_group_block_group(
        'gg-positioning__grid',
        gedeon_group_block_group(
            'gg-positioning__copy',
            gedeon_group_block_h(2, 'gg-positioning__title', '<em>Hospitality led maritime management</em><br>not conventional ship management.')
            . gedeon_group_block_p('gg-positioning__text', 'Gedeon unites maritime discipline, luxury hospitality, human-centred crew management and complete vessel-lifecycle capability in one accountable platform. Our role is to make operational complexity invisible, protect the asset and create the conditions in which exceptional guest experiences can be delivered consistently.')
        )
        . gedeon_group_block_group('gg-positioning__points', $gedeon_group_items)
    )
    . gedeon_group_block_p('gg-positioning__quote', '“Luxury is what the guest feels. Excellence is everything they never have to notice.”');

echo gedeon_group_block_section('gg-positioning', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
