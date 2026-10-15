<?php
/**
 * Title: Careers FAQ
 * Slug: gedeon-group/careers-faq
 * Categories: gedeon-sections
 * Keywords: faq, careers, vacancies
 * Description: Questions about careers at Gedeon Group.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_faq( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Questions About Careers at Gedeon Group',
    'Find information about current vacancies, future opportunities, recruitment data and approved application routes.',
    array(
        array('Are there any current vacancies?', 'There are no current vacancies published by Gedeon Group.'),
        array('Where will future opportunities be listed?', 'Approved vacancies will be published on this Careers page with the relevant role information and application method.'),
        array('Can I submit a speculative application?', 'Speculative applications are not currently requested. Please wait for an approved vacancy and its application instructions.'),
        array('What information will a vacancy include?', 'Each published vacancy should include the role title, location, responsibilities, requirements, application method and closing date.'),
        array('How will recruitment data be handled?', 'Recruitment privacy information will be provided with any vacancy before applications are accepted.'),
        array('Do you accept agency submissions?', 'Agency submissions are not requested unless an approved vacancy specifically states otherwise.'),
        array('How will applicants be contacted?', 'The application instructions for each published vacancy will explain the communication and selection process.'),
        array('How can I monitor future opportunities?', 'Check this page for approved vacancies and application details.'),
    )
);
