<?php
/**
 * Title: Post Hero
 * Slug: gedeon-group/post-hero
 * Categories: gedeon-sections
 * Inserter: no
 * Description: Single post header over the featured image — category, title and meta.
 *
 * @package Gedeon_Group
 */

?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"minHeight":776,"minHeightUnit":"px","isDark":true,"tagName":"section","align":"full","className":"gg-hero gg-hero--editorial gg-hero--post","layout":{"type":"default"}} -->
<section class="wp-block-cover alignfull gg-hero gg-hero--editorial gg-hero--post" style="min-height:776px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><?php echo gedeon_group_block_image('gg-hero__logo', get_theme_file_uri('assets/img/gedeon-group-logo-vertical.png'), 'Gedeon Group', 370, 199); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup. ?>

<!-- wp:group {"className":"gg-hero__content","layout":{"type":"default"}} -->
<div class="wp-block-group gg-hero__content"><!-- wp:post-terms {"term":"category","className":"gg-hero__eyebrow"} /-->

<!-- wp:post-title {"level":1,"className":"gg-hero__title"} /-->

<!-- wp:group {"className":"gg-post-meta gg-post-meta--hero","layout":{"type":"default"}} -->
<div class="wp-block-group gg-post-meta gg-post-meta--hero"><!-- wp:post-date {"format":"j F Y"} /-->

<!-- wp:post-time-to-read {"displayAsRange":false} /-->

<!-- wp:paragraph -->
<p>Gedeon Group</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></section>
<!-- /wp:cover -->
