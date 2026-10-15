<?php
/**
 * Title: 404 Message
 * Slug: gedeon-group/status-404
 * Categories: gedeon-sections
 * Inserter: no
 * Description: Page not found message with a link home.
 *
 * @package Gedeon_Group
 */

$gedeon_group_inner = gedeon_group_block_p('gg-status__code', '404')
    . gedeon_group_block_h(1, 'gg-status__title', 'Page Not Found')
    . gedeon_group_block_rule('gg-status__rule')
    . gedeon_group_block_p('gg-status__text', 'The page you are looking for may have been moved, renamed or is no longer available. Please return to the homepage to continue exploring our vessel management, charter, insurance and project services.')
    . gedeon_group_block_buttons('gg-status__actions', array(array('Return home', home_url('/'), 'gg-button--return')));

echo gedeon_group_block_cover('gg-status gg-status--404', get_theme_file_uri('assets/img/home-hero.webp'), $gedeon_group_inner, 1080); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
