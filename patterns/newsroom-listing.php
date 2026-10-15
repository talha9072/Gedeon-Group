<?php
/**
 * Title: Newsroom Listing
 * Slug: gedeon-group/newsroom-listing
 * Categories: gedeon-sections
 * Keywords: newsroom, featured, posts, categories
 * Description: The latest post as a featured story, the category filter and the paginated article grid.
 *
 * @package Gedeon_Group
 */

$gedeon_group_page = get_page_by_path('newsroom');

$gedeon_group_inner = gedeon_group_block_p('gg-news__label gg-news__label--featured', 'Featured Story')
    . '<!-- wp:query {"queryId":31,"query":{"perPage":1,"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"gg-featured"} -->
<div class="wp-block-query gg-featured"><!-- wp:post-template -->
<!-- wp:group {"className":"gg-feature-card","layout":{"type":"default"}} -->
<div class="wp-block-group gg-feature-card"><!-- wp:post-featured-image {"isLink":true,"className":"gg-feature-card__media"} /-->

<!-- wp:group {"className":"gg-feature-card__body","layout":{"type":"default"}} -->
<div class="wp-block-group gg-feature-card__body"><!-- wp:group {"className":"gg-post-meta","layout":{"type":"default"}} -->
<div class="wp-block-group gg-post-meta"><!-- wp:post-terms {"term":"category"} /-->

<!-- wp:paragraph -->
<p>Featured</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"className":"gg-feature-card__title"} /-->

<!-- wp:post-excerpt {"excerptLength":30,"className":"gg-feature-card__excerpt"} /-->

<!-- wp:read-more {"content":"Read the full article","className":"gg-post-card__link"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->'
    . gedeon_group_category_filter_markup($gedeon_group_page ? get_permalink($gedeon_group_page) : home_url('/newsroom/'))
    . gedeon_group_post_grid_markup(32, false, 1);

echo gedeon_group_block_section('gg-news gg-news--newsroom', $gedeon_group_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
