<?php
/**
 * Privacy Policy (website). Served at /privacy.
 *
 * TODO: have the practice's attorney / compliance contact review before launch, and add
 * a privacy contact email if Jennifer wants one listed.
 */

require __DIR__ . '/inc/site.php';

$page_title = 'Privacy Policy | Thrive Psychiatry & Wellness';
$page_description = 'How Thrive Psychiatry & Wellness collects, uses and protects information shared through our website, forms and text messages.';
$legal_title = 'Privacy Policy';
$legal_updated = 'October 30, 2026';

require __DIR__ . '/inc/legal-header.php';
?>
            <h2>Who we are</h2>
            <p>This website is run by <?= e($practice['name']) ?> LLC ("Thrive," "we," "us"), a psychiatric practice with an office at <?= e($practice['mesa_addr']) ?>, <?= e($practice['mesa_city']) ?>, serving patients in Arizona and Washington. This policy explains what information we collect through this website, our forms and our text messaging, and how we use it.</p>

            <h2>Your health information</h2>
            <p>Once you become a patient, the health information we keep about you is protected under HIPAA and handled as described in our <strong>Notice of Privacy Practices</strong>. You'll receive a copy when you start care, and you can ask for one at any time by calling or texting <a href="tel:<?= $practice['phone_raw'] ?>"><?= e($practice['phone']) ?></a>. If this policy and the Notice of Privacy Practices ever differ about your health information, the Notice of Privacy Practices applies.</p>

            <h2>Information we collect</h2>
            <p><strong>Information you give us.</strong> When you fill out our contact form, we collect your name, mobile phone number, email address, the service and location you're interested in, how you'd like us to reach you, and any message you include. If you text or call us, we receive your phone number and what you send.</p>
            <p><strong>Information collected automatically.</strong> Like most websites, our hosting provider and the services that deliver our fonts and page code may receive basic technical information when you visit, such as your IP address, browser type, device type and the pages you view.</p>
            <p>Please don't include detailed medical information in our website form. We'll talk through your history privately once we're in touch.</p>

            <h2>How we use your information</h2>
            <ul>
                <li>To respond to your request and schedule a consultation or appointment</li>
                <li>To contact you the way you asked us to: text, call or email</li>
                <li>To send appointment reminders and practice updates you've agreed to receive</li>
                <li>To keep our website secure and working properly</li>
                <li>To meet our legal and professional obligations</li>
            </ul>

            <h2>Text messaging</h2>
            <p>When you give us your mobile number and agree to be contacted, you consent to receive text messages from Thrive about your inquiry, scheduling, appointment reminders and follow-ups. Message frequency varies. Message and data rates may apply. Reply <strong>STOP</strong> at any time to stop receiving texts, or <strong>HELP</strong> for help. Consent to receive texts is not a condition of receiving care.</p>
            <p><strong>We do not sell, rent or share your mobile phone number or text messaging consent with third parties for their marketing purposes.</strong></p>
            <p>Text messaging isn't for emergencies. If you are in crisis, call or text 988, or call 911.</p>

            <h2>How we share information</h2>
            <p>We do not sell your personal information. We only share it:</p>
            <ul>
                <li>With service providers who help us run the practice, such as our hosting, scheduling, patient portal and messaging providers, who may only use it to provide services to us</li>
                <li>When required by law, or to protect the safety of you or others</li>
                <li>As described in our Notice of Privacy Practices, once you're a patient</li>
            </ul>

            <h2>How we protect information</h2>
            <p>We use reasonable administrative, technical and physical safeguards to protect the information you share with us. No method of sending information over the internet is completely secure, so please use our patient portal or a phone call for anything sensitive.</p>

            <h2>Children</h2>
            <p>This website isn't directed to children under 13. Care for minors is arranged with a parent or legal guardian.</p>

            <h2>Your choices</h2>
            <p>You can ask us to update or delete the contact information you sent through this website, or stop contacting you, by calling or texting <a href="tel:<?= $practice['phone_raw'] ?>"><?= e($practice['phone']) ?></a>. You can opt out of text messages at any time by replying STOP. Rights to your health records are explained in our Notice of Privacy Practices.</p>

            <h2>Links to other sites</h2>
            <p>Our website links to other sites, including our patient portal and map directions. Those sites have their own privacy policies, and we aren't responsible for how they handle information.</p>

            <h2>Changes to this policy</h2>
            <p>We may update this policy from time to time. When we do, we'll change the "Last updated" date at the top of this page.</p>

            <h2>Contact us</h2>
            <p>Questions about this policy? Call or text <a href="tel:<?= $practice['phone_raw'] ?>"><?= e($practice['phone']) ?></a>, or write to us at <?= e($practice['name']) ?>, <?= e($practice['mesa_addr']) ?>, <?= e($practice['mesa_city']) ?>.</p>
<?php require __DIR__ . '/inc/legal-footer.php'; ?>
