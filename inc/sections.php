<?php
/**
 * Shared section markup used by several patterns: page heroes, CTAs, FAQ and cards.
 *
 * Each function returns block markup (see inc/blocks.php) built from the shared Figma
 * components, so one component looks the same on every page that uses it.
 *
 * @package Gedeon_Group
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Standard page hero (Figma "Corporate / Maritime Hero Content"): approved vertical logo,
 * eyebrow, H1, lead and actions, centred over a full-bleed image.
 *
 * Args: image, eyebrow, title, lead, buttons (array of [label, url, class]), class, height.
 */
function gedeon_group_page_hero(array $args): string
{
    $args = wp_parse_args(
        $args,
        array(
            'class'   => '',
            'height'  => 866,
            'buttons' => array(array(__('Explore our capabilities', 'gedeon-group'), home_url('/contact/'))),
        )
    );

    $inner = gedeon_group_block_image('gg-hero__logo', get_theme_file_uri('assets/img/gedeon-group-logo-vertical.png'), __('Gedeon Group', 'gedeon-group'), 370, 199)
        . gedeon_group_block_p('gg-hero__eyebrow', $args['eyebrow'])
        . gedeon_group_block_h(1, 'gg-hero__title', $args['title'])
        . gedeon_group_block_p('gg-hero__lead', $args['lead'])
        . ($args['buttons'] ? gedeon_group_block_buttons('gg-hero__actions', $args['buttons']) : '');

    return gedeon_group_block_cover(trim('gg-hero ' . $args['class']), get_theme_file_uri('assets/img/' . $args['image']), $inner, $args['height']);
}

/**
 * Editorial hero (News Archive, Newsroom): centred logo, left-aligned eyebrow, title and lead.
 */
function gedeon_group_editorial_hero(string $image, string $eyebrow, string $title, string $lead, string $class = ''): string
{
    $inner = gedeon_group_block_image('gg-hero__logo', get_theme_file_uri('assets/img/gedeon-group-logo-vertical.png'), __('Gedeon Group', 'gedeon-group'), 370, 199)
        . gedeon_group_block_group(
            'gg-hero__content',
            gedeon_group_block_p('gg-hero__eyebrow', $eyebrow)
            . gedeon_group_block_h(1, 'gg-hero__title', $title)
            . gedeon_group_block_p('gg-hero__lead', $lead)
        );

    return gedeon_group_block_cover(trim('gg-hero gg-hero--editorial ' . $class), get_theme_file_uri('assets/img/' . $image), $inner, 776);
}

/**
 * Closing CTA shown above the footer on every page (Figma "Global Closing CTA / Explore").
 */
function gedeon_group_closing_cta(): string
{
    $inner = gedeon_group_block_p('gg-eyebrow', __('Confidential enquiries welcomed', 'gedeon-group'))
        . gedeon_group_block_h(2, 'gg-title', __('Let’s build the next standard at sea or river.', 'gedeon-group'))
        . gedeon_group_block_p('gg-intro', __('Across private yachts, passenger yachts and river cruise vessels, Gedeon supports full management, newbuildings, conversions and major refurbishments around one question: what should the vessel make possible for the owner, the guest and the crew?', 'gedeon-group'))
        . gedeon_group_block_buttons('gg-closing__actions', array(array(__('Explore our capabilities', 'gedeon-group'), home_url('/contact/'))));

    return gedeon_group_block_cover('gg-closing', get_theme_file_uri('assets/img/home-hero.webp'), gedeon_group_block_group('gg-container', $inner), 360);
}

/**
 * Mid-page CTA (Figma "ND / Global / Mid-page CTA"): heading left, copy and button right.
 *
 * Args: image, eyebrow, title, text, button label, button url.
 */
function gedeon_group_mid_cta(array $args): string
{
    $args = wp_parse_args(
        $args,
        array(
            'eyebrow' => __('Speak to our team', 'gedeon-group'),
            'label'   => __('Start a conversation', 'gedeon-group'),
            'url'     => home_url('/contact/'),
        )
    );

    $inner = gedeon_group_block_group(
        'gg-mid-cta__heading',
        gedeon_group_block_p('gg-eyebrow', $args['eyebrow'])
        . gedeon_group_block_h(2, 'gg-title', $args['title'])
        . gedeon_group_block_rule('gg-mid-cta__rule')
    )
        . gedeon_group_block_group(
            'gg-mid-cta__body',
            gedeon_group_block_p('gg-mid-cta__text', $args['text'])
            . gedeon_group_block_buttons('gg-mid-cta__actions', array(array($args['label'], $args['url'], 'gg-button--alt')))
        );

    return gedeon_group_block_cover('gg-mid-cta', get_theme_file_uri('assets/img/' . $args['image']), gedeon_group_block_group('gg-container', $inner), 340);
}

/**
 * FAQ section: heading and a numbered accordion of native <details> blocks.
 *
 * @param string $title Section title.
 * @param string $intro Supporting line.
 * @param array  $items array(question, answer) pairs.
 */
function gedeon_group_faq(string $title, string $intro, array $items): string
{
    $list = '';
    foreach ($items as [$question, $answer]) {
        $list .= sprintf(
            "<!-- wp:details {\"className\":\"gg-faq__item\"} -->\n<details class=\"wp-block-details gg-faq__item\"><summary>%s</summary><!-- wp:paragraph {\"className\":\"gg-faq__answer\"} -->\n<p class=\"gg-faq__answer\">%s</p>\n<!-- /wp:paragraph --></details>\n<!-- /wp:details -->",
            $question,
            $answer
        );
    }

    $inner = gedeon_group_block_group(
        'gg-heading gg-faq__heading',
        gedeon_group_block_p('gg-eyebrow', __('Frequently asked questions', 'gedeon-group'))
        . gedeon_group_block_h(2, 'gg-title', $title)
        . gedeon_group_block_p('gg-intro', $intro)
    )
        . gedeon_group_block_group('gg-faq__list', $list);

    return gedeon_group_block_section('gg-faq', $inner, array('anchor' => 'faq'));
}

/**
 * Numbered card used by Capabilities, Lifecycle, Values and vessel priorities.
 *
 * @param string $class Extra classes.
 * @param string $num   Number label.
 * @param string $title Title.
 * @param string $text  Body.
 * @param int    $level Heading level.
 */
function gedeon_group_card(string $class, string $num, string $title, string $text, int $level = 3): string
{
    return gedeon_group_block_group(
        'gg-card ' . $class,
        gedeon_group_block_p('gg-card__num', $num)
        . gedeon_group_block_h($level, 'gg-card__title', $title)
        . gedeon_group_block_p('gg-card__text', $text)
    );
}

/**
 * Image card used by About (team, office) and Careers.
 *
 * @param string $image  Image file in assets/img.
 * @param string $alt    Image alt.
 * @param string $body   Inner block markup below the image.
 * @param string $class  Extra classes.
 */
function gedeon_group_image_card(string $image, string $alt, string $body, string $class = ''): string
{
    return gedeon_group_block_group(
        trim('gg-image-card ' . $class),
        gedeon_group_block_image('gg-image-card__media', get_theme_file_uri('assets/img/' . $image), $alt)
        . gedeon_group_block_group('gg-image-card__body', $body)
    );
}

/**
 * Centred listing heading with the short divider below (Team, Office, Careers).
 */
function gedeon_group_listing_heading(string $eyebrow, string $title): string
{
    return gedeon_group_block_group(
        'gg-heading gg-heading--listing',
        gedeon_group_block_p('gg-eyebrow', $eyebrow)
        . gedeon_group_block_h(2, 'gg-title', $title)
        . gedeon_group_block_rule('gg-heading__divider')
    );
}
