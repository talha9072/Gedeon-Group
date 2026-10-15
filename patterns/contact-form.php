<?php
/**
 * Title: Contact Form
 * Slug: gedeon-group/contact-form
 * Categories: gedeon-sections
 * Keywords: contact, form, enquiry, address
 * Description: "How Can We Support You?" copy and contact details beside the enquiry form.
 *
 * @package Gedeon_Group
 */

$gedeon_group_contact = gedeon_group_contact();
$gedeon_group_details = array(
    array('location', 'Visit Us', '<a href="' . esc_url($gedeon_group_contact['map']) . '" target="_blank" rel="noreferrer noopener">15 Hanover Square, 6th Floor,<br>London W1S 1HS, England</a>'),
    array('phone', 'Call Us', '<a href="' . esc_attr($gedeon_group_contact['phone_uri']) . '">' . esc_html($gedeon_group_contact['phone']) . '</a>'),
    array('email', 'Email Us', '<a href="mailto:' . esc_attr($gedeon_group_contact['email']) . '">' . esc_html($gedeon_group_contact['email']) . '</a>'),
);

$gedeon_group_list = '';
foreach ($gedeon_group_details as [$gedeon_group_icon, $gedeon_group_label, $gedeon_group_value]) {
    $gedeon_group_list .= gedeon_group_block_group(
        'gg-contact__detail gg-contact__detail--' . $gedeon_group_icon,
        gedeon_group_block_h(3, 'gg-contact__label', $gedeon_group_label)
        . gedeon_group_block_p('gg-contact__value', $gedeon_group_value)
    );
}

$gedeon_group_inner = gedeon_group_block_group(
    'gg-contact__info',
    gedeon_group_block_p('gg-eyebrow', 'Speak With Our Team')
    . gedeon_group_block_h(2, 'gg-title', 'How Can We<br>Support You?')
    . gedeon_group_block_p('gg-contact__text', 'Every enquiry begins with understanding the vessel, the assistance required and the owner’s priorities. Provide a brief outline using the form, or contact Gedeon Group directly. Information supplied through the website will be used to review and respond to your enquiry.')
    . gedeon_group_block_group('gg-contact__details', $gedeon_group_list)
)
    . gedeon_group_block_group('gg-contact__panel', "<!-- wp:shortcode -->\n[gedeon_contact_form]\n<!-- /wp:shortcode -->");

echo gedeon_group_block_section('gg-contact', $gedeon_group_inner, array('anchor' => 'contact-form')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
