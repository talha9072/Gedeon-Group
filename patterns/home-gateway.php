<?php
/**
 * Title: Home Vessel Type Gateway
 * Slug: gedeon-group/home-gateway
 * Categories: gedeon-sections
 * Keywords: vessel types, megayachts, passenger yachts, river
 * Description: Three vessel-type cards — MegaYachts, Passenger Yachts and River Passenger Ships — each linking to its page.
 *
 * @package Gedeon_Group
 */

$gedeon_group_vessels = gedeon_group_vessel_types();
$gedeon_group_cards   = array(
    array('megayachts', '01', 'Private-vessel management at megayacht scale.', 'Technical, nautical and operational management, owner representation and coordinated support—tailored to the unique demands of megayacht ownership.', 'Explore MegaYachts'),
    array('passenger', '02', 'Hospitality-led operations at passenger scale.', 'Integrated technical, hotel and guest operations, with clear owner representation and coordinated commercial support.', 'Explore Passenger Yachts'),
    array('river', '03', 'River operations.<br>Exceptional guest service.', 'Technical and nautical management for river routes, supported by hotel operations, owner representation and insurance coordination.', 'Explore River Vessels'),
);

$gedeon_group_inner = gedeon_group_block_rule('gg-gateway__rule')
    . gedeon_group_block_group(
        'gg-heading gg-gateway__heading',
        gedeon_group_block_p('gg-eyebrow', 'Three vessel types. One management partner.')
        . gedeon_group_block_h(2, 'gg-title', 'From Megayachts to River Vessels')
        . gedeon_group_block_p('gg-intro', 'Technical and nautical management, hospitality, owner representation, charter and insurance support—<br class="gg-br">adapted to the operating realities of each vessel type.')
    );

$gedeon_group_list = '';
foreach ($gedeon_group_cards as [$gedeon_group_key, $gedeon_group_num, $gedeon_group_title, $gedeon_group_text, $gedeon_group_cta]) {
    $gedeon_group_vessel = $gedeon_group_vessels[$gedeon_group_key];
    $gedeon_group_list  .= gedeon_group_block_group(
        'gg-vessel-card gg-vessel-card--' . $gedeon_group_key,
        gedeon_group_block_group(
            'gg-vessel-card__media',
            gedeon_group_block_p('gg-vessel-card__num', $gedeon_group_num)
            . gedeon_group_block_p('gg-vessel-card__label', esc_html($gedeon_group_vessel['label']))
        )
        . gedeon_group_block_h(3, 'gg-vessel-card__title', $gedeon_group_title)
        . gedeon_group_block_p('gg-vessel-card__text', $gedeon_group_text)
        . gedeon_group_block_buttons('gg-vessel-card__actions', array(array(esc_html($gedeon_group_cta), $gedeon_group_vessel['url'], 'gg-vessel-card__button')))
    );
}

$gedeon_group_inner .= gedeon_group_block_group('gg-gateway__grid', $gedeon_group_list)
    . gedeon_group_block_rule('gg-gateway__rule gg-gateway__rule--bottom');

echo gedeon_group_block_group('gg-gateway', gedeon_group_block_group('gg-gateway__container', $gedeon_group_inner), 'section', array('align' => 'full')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
