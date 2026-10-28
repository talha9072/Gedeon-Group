<?php
/**
 * Title: Contact Hero
 * Slug: gedeon-group/contact-hero
 * Categories: gedeon-sections
 * Keywords: contact, hero
 * Description: Contact page hero.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_page_hero( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup, escaped when built.
    array(
        'image'   => 'contact-hero.webp',
        'eyebrow' => 'Contact',
        'title'   => 'Begin a Confidential Conversation',
        'lead'    => 'Speak with our team about vessel management, charter support, projects, insurance or another requirement relating to a private yacht, passenger yacht or river cruise vessel.',
        'buttons' => array(array('Explore our capabilities', '#contact-form')),
    )
);
