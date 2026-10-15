<?php
/**
 * Title: About FAQ
 * Slug: gedeon-group/about-faq
 * Categories: gedeon-sections
 * Keywords: faq, questions
 * Description: Questions about Gedeon Group.
 *
 * @package Gedeon_Group
 */

echo gedeon_group_faq( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Questions About Gedeon Group',
    'Find answers about Gedeon Group, its team, London office, management approach and how services are structured around each vessel.',
    array(
        array('What does Gedeon Group provide?', 'Tailored vessel management and coordinated operational, technical, financial and administrative support structured around the vessel, its programme and the owner’s priorities.'),
        array('How is the management approach tailored to each vessel?', 'We begin by understanding the vessel, its intended use, existing team, reporting needs and approval process, then define the support and responsibilities required.'),
        array('How is the team supporting a vessel structured?', 'The support structure is based on the vessel, its programme, existing captain and crew, and the agreed operational, technical, financial or project requirements. Gedeon works alongside the onboard team and coordinates relevant specialists where needed.'),
        array('Where is the Gedeon Group office?', 'The published office is at 15 Hanover Square, 6th Floor, London W1S 1HS, England. The team can also be contacted on +44 (0)203 966 8489 or at info@gedeon-uk.com.'),
        array('Can you support charter activity and yacht projects?', 'Yes. The website includes charter management, private charter planning, insurance coordination and support for new builds, conversions, dry-dock periods and specialist projects.'),
        array('How are reporting and approvals organised?', 'Reporting, responsibilities and approval procedures are agreed at the outset so the owner, captain and relevant advisers understand what requires attention and who is responsible.'),
        array('How is confidential information handled?', 'Sensitive ownership, operational and financial information is handled with appropriate care, discretion and confidentiality.'),
        array('How do I begin a conversation?', 'Send a brief outline through the contact form or use the published telephone and email details. A team member will review the enquiry and discuss the appropriate next steps.'),
    )
);
