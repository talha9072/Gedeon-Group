<?php
/**
 * Contact form: [gedeon_contact_form] shortcode and its admin-post handler.
 *
 * Dependency-free on purpose — the site needs one enquiry form. Submissions are validated,
 * checked against a nonce and a honeypot, emailed to the site admin (filterable), then the
 * visitor is redirected to the Thank You page.
 *
 * @package Gedeon_Group
 */

if (! defined('ABSPATH')) {
    exit;
}

const GEDEON_GROUP_CONTACT_ACTION = 'gedeon_group_contact';

/**
 * Render the form. Errors come back as ?contact=<code> after a failed submission.
 */
function gedeon_group_contact_form_shortcode($atts = array()): string
{
    $atts = shortcode_atts(array('type' => 'general'), $atts, 'gedeon_contact_form');
    $type = in_array($atts['type'], array('general', 'careers'), true) ? $atts['type'] : 'general';

    $messages = array(
        'invalid' => __('Please complete all required fields with a valid email address.', 'gedeon-group'),
        'failed'  => __('Sorry, your message could not be sent. Please try again or email us directly.', 'gedeon-group'),
    );
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display-only status flag.
    $status = isset($_GET['contact']) ? sanitize_key(wp_unslash($_GET['contact'])) : '';

    $fields = array(
        array('first_name', __('First Name', 'gedeon-group'), 'text', __('Add your first name here', 'gedeon-group'), 'given-name', true),
        array('last_name', __('Last Name', 'gedeon-group'), 'text', __('Add your last name here', 'gedeon-group'), 'family-name', true),
        array('email', __('Email Address', 'gedeon-group'), 'email', __('Add your email address here', 'gedeon-group'), 'email', true),
        array('phone', __('Phone', 'gedeon-group'), 'tel', __('Add your phone number here', 'gedeon-group'), 'tel', false),
    );

    ob_start();
    ?>
    <form class="gg-form gg-form--<?php echo esc_attr($type); ?>" id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <?php if (isset($messages[$status])) : ?>
            <p class="gg-form__notice" role="alert"><?php echo esc_html($messages[$status]); ?></p>
        <?php endif; ?>
        <input type="hidden" name="action" value="<?php echo esc_attr(GEDEON_GROUP_CONTACT_ACTION); ?>">
        <input type="hidden" name="enquiry_type" value="<?php echo esc_attr($type); ?>">
        <input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink()); ?>">
        <?php wp_nonce_field(GEDEON_GROUP_CONTACT_ACTION, 'gg_contact_nonce'); ?>
        <div class="gg-form__hp" aria-hidden="true">
            <label for="gg-company-website"><?php esc_html_e('Leave this field empty', 'gedeon-group'); ?></label>
            <input type="text" id="gg-company-website" name="company_website" tabindex="-1" autocomplete="off">
        </div>
        <div class="gg-form__grid">
            <?php foreach ($fields as [$name, $label, $input_type, $placeholder, $autocomplete, $required]) : ?>
                <div class="gg-form__field gg-form__field--<?php echo esc_attr($name); ?>">
                    <label for="gg-<?php echo esc_attr($name); ?>"><?php echo esc_html($label); ?></label>
                    <input
                        type="<?php echo esc_attr($input_type); ?>"
                        id="gg-<?php echo esc_attr($name); ?>"
                        name="<?php echo esc_attr($name); ?>"
                        placeholder="<?php echo esc_attr($placeholder); ?>"
                        autocomplete="<?php echo esc_attr($autocomplete); ?>"
                        <?php echo $required ? 'required' : ''; ?>
                    >
                </div>
            <?php endforeach; ?>
            <div class="gg-form__field gg-form__field--interest">
                <label for="gg-interest"><?php esc_html_e('Interested In', 'gedeon-group'); ?></label>
                <select id="gg-interest" name="interest">
                    <option value=""><?php esc_html_e('Choose from list', 'gedeon-group'); ?></option>
                    <?php foreach (gedeon_group_enquiry_interests() as $interest) : ?>
                        <option value="<?php echo esc_attr($interest); ?>"><?php echo esc_html($interest); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="gg-form__field gg-form__field--message">
                <label for="gg-message"><?php esc_html_e('Message', 'gedeon-group'); ?></label>
                <textarea id="gg-message" name="message" rows="6" placeholder="<?php esc_attr_e('Write your message here', 'gedeon-group'); ?>" required></textarea>
            </div>
        </div>
        <div class="gg-form__actions">
            <button type="submit" class="wp-element-button gg-button--alt"><?php esc_html_e('Submit enquiry', 'gedeon-group'); ?></button>
        </div>
    </form>
    <?php
    return (string) ob_get_clean();
}
add_shortcode('gedeon_contact_form', 'gedeon_group_contact_form_shortcode');

/**
 * Handle a submission from logged-in and anonymous visitors.
 */
function gedeon_group_handle_contact_form(): void
{
    $back = isset($_POST['redirect_to']) ? esc_url_raw(wp_unslash($_POST['redirect_to'])) : home_url('/contact/');
    $back = wp_validate_redirect($back, home_url('/contact/'));

    $nonce = isset($_POST['gg_contact_nonce']) ? sanitize_text_field(wp_unslash($_POST['gg_contact_nonce'])) : '';
    if (! wp_verify_nonce($nonce, GEDEON_GROUP_CONTACT_ACTION)) {
        wp_safe_redirect(add_query_arg('contact', 'failed', $back) . '#contact-form');
        exit;
    }

    // Honeypot filled in: pretend success so bots learn nothing.
    if (! empty($_POST['company_website'])) {
        wp_safe_redirect(home_url('/thank-you/'));
        exit;
    }

    $data = array(
        'first_name' => sanitize_text_field(wp_unslash($_POST['first_name'] ?? '')),
        'last_name'  => sanitize_text_field(wp_unslash($_POST['last_name'] ?? '')),
        'email'      => sanitize_email(wp_unslash($_POST['email'] ?? '')),
        'phone'      => sanitize_text_field(wp_unslash($_POST['phone'] ?? '')),
        'interest'   => in_array(wp_unslash($_POST['interest'] ?? ''), gedeon_group_enquiry_interests(), true) ? wp_unslash($_POST['interest']) : '',
        'message'    => sanitize_textarea_field(wp_unslash($_POST['message'] ?? '')),
    );

    if ('' === $data['first_name'] || '' === $data['last_name'] || ! is_email($data['email']) || '' === $data['message']) {
        wp_safe_redirect(add_query_arg('contact', 'invalid', $back) . '#contact-form');
        exit;
    }

    $type    = 'careers' === sanitize_key(wp_unslash($_POST['enquiry_type'] ?? '')) ? 'careers' : 'general';
    $to      = apply_filters('gedeon_group_contact_recipient', get_option('admin_email'), $type);
    $subject = sprintf(
        /* translators: %s: sender's full name */
        'careers' === $type ? __('New careers enquiry from %s', 'gedeon-group') : __('New website enquiry from %s', 'gedeon-group'),
        $data['first_name'] . ' ' . $data['last_name']
    );
    $body = sprintf(
        "Name: %s %s\nEmail: %s\nPhone: %s\n\n%s\n",
        $data['first_name'],
        $data['last_name'],
        $data['email'],
        $data['phone'] ?: '-',
        $data['interest'] ?: '-',
        $data['message']
    );
    $headers = array('Reply-To: ' . $data['first_name'] . ' ' . $data['last_name'] . ' <' . $data['email'] . '>');

    if (! wp_mail($to, $subject, $body, $headers)) {
        wp_safe_redirect(add_query_arg('contact', 'failed', $back) . '#contact-form');
        exit;
    }

    wp_safe_redirect(home_url('/thank-you/'));
    exit;
}
add_action('admin_post_' . GEDEON_GROUP_CONTACT_ACTION, 'gedeon_group_handle_contact_form');
add_action('admin_post_nopriv_' . GEDEON_GROUP_CONTACT_ACTION, 'gedeon_group_handle_contact_form');

/**
 * Options for the "Interested In" list on the contact form.
 */
function gedeon_group_enquiry_interests(): array
{
    return apply_filters(
        'gedeon_group_enquiry_interests',
        array(
            __('Vessel Management', 'gedeon-group'),
            __('Charter Management', 'gedeon-group'),
            __('Private Yacht Charter Planning', 'gedeon-group'),
            __('Insurance Coordination', 'gedeon-group'),
            __('Vessel Projects', 'gedeon-group'),
            __('Other', 'gedeon-group'),
        )
    );
}
