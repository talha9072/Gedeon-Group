<?php
/**
 * Gedeon Group theme functions.
 *
 * @package Gedeon_Group
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once get_theme_file_path('inc/blocks.php');
require_once get_theme_file_path('inc/sections.php');
require_once get_theme_file_path('inc/vessels.php');
require_once get_theme_file_path('inc/contact-form.php');
require_once get_theme_file_path('inc/blog.php');

function gedeon_group_setup(): void
{
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style(array('assets/css/frontend.css', 'assets/css/home.css', 'assets/css/pages.css', 'assets/css/news.css', 'assets/css/editor.css'));

    register_block_pattern_category(
        'gedeon-sections',
        array(
            'label' => __('Gedeon Sections', 'gedeon-group'),
        )
    );
}
add_action('after_setup_theme', 'gedeon_group_setup');

function gedeon_group_enqueue_assets(): void
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('gedeon-group-frontend', get_theme_file_uri('assets/css/frontend.css'), array(), $version);
    wp_enqueue_style('gedeon-group-home', get_theme_file_uri('assets/css/home.css'), array('gedeon-group-frontend'), $version);
    wp_enqueue_style('gedeon-group-pages', get_theme_file_uri('assets/css/pages.css'), array('gedeon-group-frontend'), $version);
    wp_enqueue_style('gedeon-group-news', get_theme_file_uri('assets/css/news.css'), array('gedeon-group-frontend'), $version);

    wp_enqueue_script(
        'gedeon-group-pagination',
        get_theme_file_uri('assets/js/pagination.js'),
        array(),
        $version,
        array(
            'in_footer' => true,
            'strategy'  => 'defer',
        )
    );
}
add_action('wp_enqueue_scripts', 'gedeon_group_enqueue_assets');

/**
 * Cache-bust theme images and icons with the theme version.
 *
 * The server caches these files in browsers for a long time, so artwork replaced under the
 * same file name would keep showing the old version to returning visitors.
 *
 * @param string $url  Resolved file URL.
 * @param string $file Path relative to the theme root.
 */
function gedeon_group_version_theme_images(string $url, string $file): string
{
    if (! preg_match('#^/?assets/(img|icons)/.+\.[a-z0-9]+$#i', $file)) {
        return $url;
    }

    return add_query_arg('ver', wp_get_theme()->get('Version'), $url);
}
add_filter('theme_file_uri', 'gedeon_group_version_theme_images', 10, 2);

/**
 * Preload the self-hosted Montserrat file so above-the-fold text renders without a font swap.
 */
function gedeon_group_preload_fonts(): void
{
    printf(
        '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
        esc_url(get_theme_file_uri('assets/fonts/montserrat-latin-variable.woff2'))
    );
}
add_action('wp_head', 'gedeon_group_preload_fonts', 1);

/**
 * Site icon from the approved Gedeon Group mark.
 *
 * Used on the front end, the login screen and wp-admin until a Site Icon is chosen in
 * Settings → General, which then takes over.
 */
function gedeon_group_site_icon(): void
{
    if (has_site_icon()) {
        return;
    }

    $version = wp_get_theme()->get('Version');
    $icon    = static fn (int $size): string => esc_url(add_query_arg('ver', $version, get_theme_file_uri("assets/favicon/icon-{$size}.png")));

    printf('<link rel="icon" href="%s" sizes="32x32">' . "\n", $icon(32));
    printf('<link rel="icon" href="%s" sizes="192x192">' . "\n", $icon(192));
    printf('<link rel="apple-touch-icon" href="%s">' . "\n", $icon(180));
    printf('<meta name="msapplication-TileImage" content="%s">' . "\n", $icon(270));
}
add_action('wp_head', 'gedeon_group_site_icon');
add_action('admin_head', 'gedeon_group_site_icon');
add_action('login_head', 'gedeon_group_site_icon');

/**
 * Theme image URL, for patterns.
 *
 * @param string $file File name inside assets/img.
 */
function gedeon_group_img(string $file): string
{
    return esc_url(get_theme_file_uri('assets/img/' . $file));
}

/**
 * The three vessel types: one map shared by the header, footer, Home gateway and the
 * "other vessel types" cards, so every link points to the same page.
 */
function gedeon_group_vessel_types(): array
{
    return array(
        'megayachts' => array(
            'name'    => __('MegaYachts', 'gedeon-group'),
            'label'   => __('MEGAYACHTS', 'gedeon-group'),
            'url'     => home_url('/megayachts/'),
            'image'   => 'megayachts-hero.webp',
            'summary' => __('Private-vessel management for complex yachts where technical performance, owner priorities and guest experience operate as one.', 'gedeon-group'),
        ),
        'passenger'  => array(
            'name'    => __('Passenger Yachts', 'gedeon-group'),
            'label'   => __('PASSENGER YACHTS', 'gedeon-group'),
            'url'     => home_url('/passenger-yachts/'),
            'image'   => 'passenger-hero.webp',
            'summary' => __('Hospitality-led operations combining marine reliability, hotel services, crew coordination and a consistent guest experience.', 'gedeon-group'),
        ),
        'river'      => array(
            'name'    => __('River Passenger Ships', 'gedeon-group'),
            'label'   => __('RIVER PASSENGER SHIPS', 'gedeon-group'),
            'url'     => home_url('/river-passenger-ships/'),
            'image'   => 'river-hero.webp',
            'summary' => __('Technical, nautical and hotel operations coordinated around scheduled river service and passenger comfort.', 'gedeon-group'),
        ),
    );
}

/**
 * Public contact details, shared by the footer, Contact page and About office card.
 */
function gedeon_group_contact(): array
{
    return array(
        'email'     => 'info@gedeon-uk.com',
        'phone'     => '+44 (0)203 966 8489',
        'phone_uri' => 'tel:+442039668489',
        'address'   => '15 Hanover Square, 6th Floor, London W1S 1HS, England',
        'map'       => 'https://www.google.com/maps/search/?api=1&query=15+Hanover+Square%2C+6th+Floor%2C+London+W1S+1HS%2C+England',
    );
}
