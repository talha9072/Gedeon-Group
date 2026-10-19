<?php
/**
 * Title: Global Header
 * Slug: gedeon-group/global-header
 * Categories: gedeon-sections
 * Block Types: core/template-part/header
 * Inserter: no
 * Description: Translucent site header with the Gedeon Group logo, vessel-led navigation and Contact us button.
 *
 * @package Gedeon_Group
 */

$gedeon_group_nav = array(
    array(__('Home', 'gedeon-group'), home_url('/')),
);
foreach (gedeon_group_vessel_types() as $gedeon_group_vessel) {
    $gedeon_group_nav[] = array($gedeon_group_vessel['name'], $gedeon_group_vessel['url']);
}
$gedeon_group_nav[] = array(__('About', 'gedeon-group'), home_url('/about/'));
$gedeon_group_nav[] = array(__('Careers', 'gedeon-group'), home_url('/careers/'));
$gedeon_group_nav[] = array(__('Contact', 'gedeon-group'), home_url('/contact/'), 'gg-nav-contact');
?>
<!-- wp:group {"align":"full","className":"gg-header","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group alignfull gg-header"><!-- wp:image {"sizeSlug":"full","linkDestination":"custom","className":"gg-header__logo"} -->
<figure class="wp-block-image size-full gg-header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo gedeon_group_img('gedeon-group-logo-horizontal.png'); ?>" alt="<?php esc_attr_e('Gedeon Group home', 'gedeon-group'); ?>"/></a></figure>
<!-- /wp:image -->

<!-- wp:navigation {"overlayBackgroundColor":"page","overlayTextColor":"white","className":"gg-header__nav","layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
<?php foreach ($gedeon_group_nav as $gedeon_group_item) : ?>
<!-- wp:navigation-link {"label":"<?php echo esc_attr($gedeon_group_item[0]); ?>","url":"<?php echo esc_url($gedeon_group_item[1]); ?>","kind":"custom","isTopLevelLink":true<?php echo isset($gedeon_group_item[2]) ? ',"className":"' . esc_attr($gedeon_group_item[2]) . '"' : ''; ?>} /-->
<?php endforeach; ?>
<!-- /wp:navigation -->

<!-- wp:buttons {"className":"gg-header__cta"} -->
<div class="wp-block-buttons gg-header__cta"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact us', 'gedeon-group'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
