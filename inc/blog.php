<?php
/**
 * Newsroom and News Archive: card markup, category filter, related posts and Query Loop helpers.
 *
 * Posts are rendered by core blocks (Query Loop, Post Template, Post Title …); these helpers
 * only build the shared block markup and adapt core output to the design ("6 MIN READ").
 *
 * @package Gedeon_Group
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Category filter row order, as in the Figma "Editorial / Category Filter".
 */
function gedeon_group_news_categories(): array
{
    return array(
        'news-insights' => __('News &amp; Insights', 'gedeon-group'),
        'announcements' => __('Announcements', 'gedeon-group'),
        'press-media'   => __('Press &amp; Media', 'gedeon-group'),
        'maritime'      => __('Maritime', 'gedeon-group'),
        'projects'      => __('Projects', 'gedeon-group'),
    );
}

/**
 * Time to Read: "6 minutes" → "6 min read", as used in every card and post header.
 */
function gedeon_group_time_to_read(string $block_content): string
{
    return (string) preg_replace('/>\s*(\d+)\s+minutes?\s*</u', '>$1 min read<', $block_content);
}
add_filter('render_block_core/post-time-to-read', 'gedeon_group_time_to_read');

/**
 * Related posts: a Query Loop whose query carries `"ggRelated":true` shows other posts,
 * preferring the current post's categories and never the post being read.
 *
 * @param array    $query Query vars built from the block.
 * @param WP_Block $block The Post Template block instance.
 */
function gedeon_group_related_posts_query(array $query, WP_Block $block): array
{
    if (empty($block->context['query']['ggRelated']) || ! is_singular('post')) {
        return $query;
    }

    $post_id                      = get_queried_object_id();
    $query['post__not_in']        = array($post_id);
    $query['ignore_sticky_posts'] = true;

    $categories = wp_get_post_categories($post_id);
    if ($categories) {
        $in_category = get_posts(
            array(
                'post_type'      => 'post',
                'category__in'   => $categories,
                'post__not_in'   => array($post_id),
                'posts_per_page' => (int) ($query['posts_per_page'] ?? 3),
                'fields'         => 'ids',
            )
        );
        // Only narrow to the category when it can fill the row; otherwise show the latest posts.
        if (count($in_category) >= (int) ($query['posts_per_page'] ?? 3)) {
            $query['category__in'] = $categories;
        }
    }

    return $query;
}
add_filter('query_loop_block_query_vars', 'gedeon_group_related_posts_query', 10, 2);

/**
 * Query Loops that skip posts with `offset` (the Newsroom grid skips the featured story)
 * would otherwise count those posts towards pagination and end on an empty page.
 */
function gedeon_group_offset_query_vars(array $query, $block = null): array
{
    // Core adds perPage × (page − 1) to the offset on later pages, so read the block's own
    // offset: only those posts are really skipped.
    $skipped = $block instanceof WP_Block
        ? (int) ($block->context['query']['offset'] ?? 0)
        : (int) ($query['offset'] ?? 0);

    if ($skipped) {
        $query['gg_skipped'] = $skipped;
    }

    return $query;
}
add_filter('query_loop_block_query_vars', 'gedeon_group_offset_query_vars', 20, 2);

function gedeon_group_offset_found_posts(int $found_posts, WP_Query $query): int
{
    $skipped = (int) $query->get('gg_skipped');

    return $skipped ? max(0, $found_posts - $skipped) : $found_posts;
}
add_filter('found_posts', 'gedeon_group_offset_found_posts', 10, 2);

/**
 * Categories dropdown: "Select Category" → "All Categories", as in the News Archive design.
 */
function gedeon_group_categories_dropdown_label(string $block_content): string
{
    return str_replace(
        '>' . esc_html__('Select Category') . '<',
        '>' . esc_html__('All Categories', 'gedeon-group') . '<',
        $block_content
    );
}
add_filter('render_block_core/categories', 'gedeon_group_categories_dropdown_label');

/**
 * Search results only list posts, so the News Archive search stays an article search.
 */
function gedeon_group_search_posts_only(WP_Query $query): void
{
    if (! is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', 'post');
    }
}
add_action('pre_get_posts', 'gedeon_group_search_posts_only');

/**
 * Block markup for one article card (Figma "Editorial Card", 416 × 496), shared by the
 * Newsroom, News Archive and related posts.
 *
 * @param string $class Extra class.
 */
function gedeon_group_post_card_markup(string $class = ''): string
{
    $class = trim('gg-post-card ' . $class);

    ob_start();
    ?>
<!-- wp:group {"className":"<?php echo esc_attr($class); ?>","layout":{"type":"default"}} -->
<div class="wp-block-group <?php echo esc_attr($class); ?>"><!-- wp:post-featured-image {"isLink":true,"className":"gg-post-card__media"} /-->

<!-- wp:group {"className":"gg-post-card__body","layout":{"type":"default"}} -->
<div class="wp-block-group gg-post-card__body"><!-- wp:group {"className":"gg-post-meta","layout":{"type":"default"}} -->
<div class="wp-block-group gg-post-meta"><!-- wp:post-terms {"term":"category"} /-->

<!-- wp:post-time-to-read {"displayAsRange":false} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"className":"gg-post-card__title"} /-->

<!-- wp:post-excerpt {"excerptLength":20,"className":"gg-post-card__excerpt"} /-->

<!-- wp:read-more {"content":"Read article","className":"gg-post-card__link"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
    <?php
    return trim((string) ob_get_clean());
}

/**
 * Category filter row: "All stories" plus the five categories; the current one is highlighted.
 *
 * @param string $all_url Where "All stories" points.
 */
function gedeon_group_category_filter_markup(string $all_url): string
{
    $current = is_category() ? get_queried_object()->slug : '';
    $links   = sprintf(
        '<a href="%s"%s>%s</a>',
        esc_url($all_url),
        '' === $current ? ' aria-current="page"' : '',
        esc_html__('All stories', 'gedeon-group')
    );
    foreach (gedeon_group_news_categories() as $slug => $name) {
        $term = get_category_by_slug($slug);
        if (! $term) {
            continue;
        }
        $links .= sprintf(
            '<a href="%s"%s>%s</a>',
            esc_url(get_category_link($term)),
            $slug === $current ? ' aria-current="page"' : '',
            $name
        );
    }

    return gedeon_group_block_p('gg-news-filter', $links);
}

/**
 * Query Loop with the article grid and numbered pagination.
 *
 * @param int  $query_id Unique id per page.
 * @param bool $inherit  Use the main query (archive, search templates).
 * @param int  $offset   Posts to skip (featured story).
 */
function gedeon_group_post_grid_markup(int $query_id, bool $inherit, int $offset = 0): string
{
    $query = array(
        'queryId' => $query_id,
        'query'   => array(
            'perPage'  => 6,
            'pages'    => 0,
            'offset'   => $offset,
            'postType' => 'post',
            'order'    => 'desc',
            'orderBy'  => 'date',
            'author'   => '',
            'search'   => '',
            'exclude'  => array(),
            'sticky'   => '',
            'inherit'  => $inherit,
        ),
        'className' => 'gg-news__query',
    );

    return '<!-- wp:query ' . wp_json_encode($query, JSON_UNESCAPED_SLASHES) . " -->\n"
        . '<div class="wp-block-query gg-news__query"><!-- wp:post-template {"className":"gg-post-grid"} -->' . "\n"
        . gedeon_group_post_card_markup() . "\n"
        . "<!-- /wp:post-template -->\n\n"
        . "<!-- wp:query-no-results -->\n"
        . gedeon_group_block_p('gg-news__empty', esc_html__('No articles have been published here yet. Approved company updates and vessel-management guidance will appear here when available.', 'gedeon-group')) . "\n"
        . "<!-- /wp:query-no-results -->\n\n"
        . '<!-- wp:query-pagination {"paginationArrow":"arrow","className":"gg-pagination","layout":{"type":"flex","justifyContent":"center"}} -->' . "\n"
        . '<!-- wp:query-pagination-previous {"label":"Previous"} /-->' . "\n\n"
        . '<!-- wp:query-pagination-numbers {"midSize":1} /-->' . "\n\n"
        . '<!-- wp:query-pagination-next {"label":"Next"} /-->' . "\n"
        . "<!-- /wp:query-pagination --></div>\n"
        . '<!-- /wp:query -->';
}

/**
 * News Archive listing: heading, article search, category dropdown, filter row and grid.
 *
 * @param bool   $inherit Use the main query (archive, search templates).
 * @param string $title   Section title.
 */
function gedeon_group_news_archive_markup(bool $inherit, string $title): string
{
    $archive = get_page_by_path('news-archive');
    $all_url = $archive ? get_permalink($archive) : home_url('/news-archive/');

    $inner = gedeon_group_block_p('gg-news__label', esc_html__('News Archive', 'gedeon-group'))
        . gedeon_group_block_h(2, 'gg-title gg-news__title', $title)
        . gedeon_group_block_group(
            'gg-news__tools',
            '<!-- wp:search {"label":"' . esc_attr__('Search articles', 'gedeon-group') . '","showLabel":false,"placeholder":"' . esc_attr__('Search articles…', 'gedeon-group') . '","buttonText":"' . esc_attr__('Search', 'gedeon-group') . '","buttonPosition":"no-button","className":"gg-news__search"} /-->'
            . '<!-- wp:categories {"displayAsDropdown":true,"showEmpty":true,"className":"gg-news__categories"} /-->'
        )
        . gedeon_group_category_filter_markup($all_url)
        . gedeon_group_post_grid_markup($inherit ? 21 : 22, $inherit);

    return gedeon_group_block_section('gg-news', $inner);
}
