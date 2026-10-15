<?php
/**
 * Title: About Ownership CTA
 * Slug: gedeon-group/about-cta
 * Categories: gedeon-sections
 * Keywords: cta, ownership support
 * Description: Dark image panel — "Clear Oversight. Confident Ownership." with the capabilities button.
 *
 * @package Gedeon_Group
 */

$gedeon_group_panel = gedeon_group_block_cover(
    'gg-dark-cta',
    get_theme_file_uri('assets/img/cta-dark.webp'),
    gedeon_group_block_group(
        'gg-dark-cta__copy',
        gedeon_group_block_p('gg-eyebrow', 'Ownership Support')
        . gedeon_group_block_h(2, 'gg-title', 'Clear Oversight. Confident<br class="gg-br"> Ownership.')
        . gedeon_group_block_rule('gg-dark-cta__rule')
    )
    . gedeon_group_block_buttons('gg-dark-cta__actions', array(array('Explore our capabilities', home_url('/contact/')))),
    260,
    'div'
);

echo gedeon_group_block_section('gg-dark-cta-section', $gedeon_group_panel); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
