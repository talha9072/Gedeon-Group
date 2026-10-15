<?php
/**
 * Title: Related Yachting Insights
 * Slug: gedeon-group/post-related
 * Categories: gedeon-sections
 * Inserter: no
 * Description: Three related articles below a post, preferring the post's category.
 *
 * @package Gedeon_Group
 */

$gedeon_group_query = '<!-- wp:query {"queryId":41,"query":{"perPage":3,"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"ggRelated":true},"className":"gg-related__query"} -->
<div class="wp-block-query gg-related__query"><!-- wp:post-template {"className":"gg-post-grid"} -->
' . gedeon_group_post_card_markup('gg-post-card--related') . '
<!-- /wp:post-template --></div>
<!-- /wp:query -->';

echo gedeon_group_block_section( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'gg-related',
    gedeon_group_block_heading('Related Yachting Insights', 'Related Yachting Insights', '', true, 'gg-related__heading') . $gedeon_group_query
);
