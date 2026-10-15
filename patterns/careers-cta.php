<?php
/**
 * Title: Careers CTA
 * Slug: gedeon-group/careers-cta
 * Categories: gedeon-sections
 * Keywords: cta, contact
 * Description: Mid-page call to action — "Your Yacht. Your Priorities. One Trusted Partner."
 *
 * @package Gedeon_Group
 */

echo gedeon_group_mid_cta( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup, escaped when built.
    array(
        'image' => 'cta-mid.webp',
        'title' => 'Your Yacht. Your Priorities.<br class="gg-br"> One Trusted Partner.',
        'text'  => 'Whether you are managing a yacht, planning a charter, overseeing a project or looking for specialist guidance, Gedeon Group brings the right expertise together with clarity, discretion and care.',
    )
);
