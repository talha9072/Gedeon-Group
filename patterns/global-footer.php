<?php
/**
 * Title: Global Footer
 * Slug: gedeon-group/global-footer
 * Categories: gedeon-sections
 * Block Types: core/template-part/footer
 * Inserter: no
 * Description: Footer with the Gedeon Group logo and summary, Company, Vessel Types, Resources and Connect columns, and the legal row.
 *
 * @package Gedeon_Group
 */

$gedeon_group_contact = gedeon_group_contact();
$gedeon_group_columns = array(
    __('Company', 'gedeon-group')   => array(
        array(__('About Us', 'gedeon-group'), home_url('/about/')),
        array(__('Contact Us', 'gedeon-group'), home_url('/contact/')),
    ),
    __('Vessel Types', 'gedeon-group') => array_map(
        static fn (array $vessel): array => array($vessel['name'], $vessel['url']),
        array_values(gedeon_group_vessel_types())
    ),
    __('Resources', 'gedeon-group') => array(
        array(__('Newsroom', 'gedeon-group'), home_url('/newsroom/')),
        array(__('Careers', 'gedeon-group'), home_url('/careers/')),
    ),
);
?>
<!-- wp:group {"tagName":"div","align":"full","className":"gg-footer","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull gg-footer"><!-- wp:group {"className":"gg-footer__container","layout":{"type":"default"}} -->
<div class="wp-block-group gg-footer__container"><!-- wp:group {"className":"gg-footer__accent","layout":{"type":"default"}} -->
<div class="wp-block-group gg-footer__accent"></div>
<!-- /wp:group -->

<!-- wp:group {"className":"gg-footer__main","layout":{"type":"default"}} -->
<div class="wp-block-group gg-footer__main"><!-- wp:group {"className":"gg-footer__brand","layout":{"type":"default"}} -->
<div class="wp-block-group gg-footer__brand"><!-- wp:image {"sizeSlug":"full","linkDestination":"custom","className":"gg-footer__logo"} -->
<figure class="wp-block-image size-full gg-footer__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo gedeon_group_img('gedeon-group-logo-horizontal.png'); ?>" alt="<?php esc_attr_e('Gedeon Group home', 'gedeon-group'); ?>"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"gg-footer__tagline"} -->
<p class="gg-footer__tagline"><?php esc_html_e('Gedeon Group provides tailored vessel management across megayachts, passenger yachts and river passenger ships, coordinating operational, technical, financial and administrative support needs.', 'gedeon-group'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php foreach ($gedeon_group_columns as $gedeon_group_heading => $gedeon_group_links) : ?>

<!-- wp:group {"tagName":"nav","className":"gg-footer__col","layout":{"type":"default"}} -->
<nav class="wp-block-group gg-footer__col"><!-- wp:heading {"level":2,"className":"gg-footer__heading"} -->
<h2 class="wp-block-heading gg-footer__heading"><?php echo esc_html($gedeon_group_heading); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"gg-footer__links"} -->
<ul class="wp-block-list gg-footer__links"><?php foreach ($gedeon_group_links as [$gedeon_group_label, $gedeon_group_url]) : ?><!-- wp:list-item -->
<li><a href="<?php echo esc_url($gedeon_group_url); ?>"><?php echo esc_html($gedeon_group_label); ?></a></li>
<!-- /wp:list-item --><?php endforeach; ?></ul>
<!-- /wp:list --></nav>
<!-- /wp:group --><?php endforeach; ?>

<!-- wp:group {"className":"gg-footer__col gg-footer__col--connect","layout":{"type":"default"}} -->
<div class="wp-block-group gg-footer__col gg-footer__col--connect"><!-- wp:heading {"level":2,"className":"gg-footer__heading"} -->
<h2 class="wp-block-heading gg-footer__heading"><?php esc_html_e('Connect', 'gedeon-group'); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"gg-footer__contact"} -->
<ul class="wp-block-list gg-footer__contact"><!-- wp:list-item {"className":"gg-footer__contact-email"} -->
<li class="gg-footer__contact-email"><a href="mailto:<?php echo esc_attr($gedeon_group_contact['email']); ?>"><?php echo esc_html($gedeon_group_contact['email']); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"gg-footer__contact-phone"} -->
<li class="gg-footer__contact-phone"><a href="<?php echo esc_attr($gedeon_group_contact['phone_uri']); ?>"><?php echo esc_html($gedeon_group_contact['phone']); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"gg-footer__contact-address"} -->
<li class="gg-footer__contact-address"><a href="<?php echo esc_url($gedeon_group_contact['map']); ?>" target="_blank" rel="noreferrer noopener">15 Hanover Square, 6th Floor,<br>London W1S 1HS, England</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"gg-footer__legal","layout":{"type":"default"}} -->
<div class="wp-block-group gg-footer__legal"><!-- wp:paragraph {"className":"gg-footer__copyright"} -->
<p class="gg-footer__copyright">© <?php echo esc_html(gmdate('Y')); ?> Gedeon Group. All rights reserved.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"gg-footer__legal-links"} -->
<p class="gg-footer__legal-links"><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'gedeon-group'); ?></a><a href="https://webhostingguru.io/" target="_blank" rel="noreferrer noopener">Design By Web Hosting Guru</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
