<?php
/**
 * Title: Thank You Message
 * Slug: gedeon-group/status-thank-you
 * Categories: gedeon-sections
 * Description: Enquiry received confirmation with a link home.
 *
 * @package Gedeon_Group
 */

$gedeon_group_inner = gedeon_group_block_p('gg-eyebrow', 'Enquiry Received')
    . gedeon_group_block_h(1, 'gg-status__title', 'Thank You')
    . gedeon_group_block_p('gg-status__text', 'A member of the Gedeon Group team will review your message and contact you shortly to discuss your vessel management, charter, insurance or project requirements and the appropriate next steps.')
    . gedeon_group_block_buttons('gg-status__actions', array(array('Return home', home_url('/'), 'gg-button--return')));

echo gedeon_group_block_cover('gg-status gg-status--thanks', get_theme_file_uri('assets/img/home-hero.webp'), $gedeon_group_inner, 1080); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
