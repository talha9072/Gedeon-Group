<?php
/**
 * Title: Contact FAQ
 * Slug: gedeon-group/contact-faq
 * Categories: gedeon-sections
 * Keywords: faq, contact, enquiries
 * Description: Questions about contacting Gedeon Group.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_faq( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Questions About Contacting Gedeon Group',
    'Find practical information about enquiries, contact details, confidentiality and the next steps after you get in touch.',
    array(
        array('What information should I include in my enquiry?', 'Provide a brief overview of the vessel or requirement, the service needed, any relevant timing and the best way to contact you. Avoid sending unnecessary sensitive information through the form.'),
        array('What services can I enquire about?', 'You can enquire about vessel management, charter management, private yacht charter planning, insurance coordination and vessel projects.'),
        array('How will my enquiry be handled?', 'Your message will be reviewed to understand the requirement and identify the appropriate next step or person to respond.'),
        array('Can a captain or professional adviser contact you?', 'Yes. Owners, captains, crews and professional advisers may contact Gedeon Group about an authorised vessel or project requirement.'),
        array('Can I request a confidential conversation?', 'Yes. Use the form or the published contact details and provide only the information needed to arrange an initial discussion.'),
        array('Where is Gedeon Group based?', 'The published office is at 15 Hanover Square, 6th Floor, London W1S 1HS, England.'),
        array('What happens after the initial discussion?', 'The scope, responsibilities, communication process and approval requirements are clarified before any support arrangement begins.'),
        array('How can I contact the team directly?', 'Email <a href="mailto:info@gedeon-uk.com">info@gedeon-uk.com</a> or call <a href="tel:+442039668489">+44 (0)203 966 8489</a>.'),
    )
);
