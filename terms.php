<?php
/**
 * Terms of Use (website). Served at /terms.
 *
 * TODO: have the practice's attorney review before launch, especially the governing law
 * and liability sections.
 */

require __DIR__ . '/inc/site.php';

$page_title = 'Terms of Use | Thrive Psychiatry & Wellness';
$page_description = 'The terms that apply when you use the Thrive Psychiatry & Wellness website.';
$legal_title = 'Terms of Use';
$legal_updated = 'October 30, 2026';

require __DIR__ . '/inc/legal-header.php';
?>
            <h2>Agreement to these terms</h2>
            <p>This website is run by <?= e($practice['name']) ?> LLC ("Thrive," "we," "us"). By using it, you agree to these Terms of Use and our <a href="/privacy">Privacy Policy</a>. If you don't agree, please don't use the website.</p>

            <h2>Not medical advice</h2>
            <p>The content on this website, including service descriptions, FAQs and the TMS quiz, is for general information only. It isn't medical advice, a diagnosis or a substitute for an evaluation by a qualified provider. Always talk with a provider about your own situation before making decisions about your care.</p>

            <h2>Not for emergencies</h2>
            <p><strong>Don't use this website, our contact form or text messaging for emergencies.</strong> If you are in crisis or thinking about harming yourself, call or text 988, call 911, or go to the nearest emergency room.</p>

            <h2>No provider-patient relationship</h2>
            <p>Using this website, sending a form, taking the quiz or texting us doesn't create a provider-patient relationship. That relationship begins only once you've completed intake and been seen by a Thrive provider.</p>

            <h2>Appointments and communication</h2>
            <p>Submitting a form is a request to be contacted, not a confirmed appointment. Availability, insurance coverage and whether a service is right for you are confirmed when we speak with you. Text messaging is offered for scheduling, quick questions and follow-ups, as described in our <a href="/privacy">Privacy Policy</a>.</p>

            <h2>Links to other sites</h2>
            <p>This website links to sites we don't control, including our patient portal and map directions. We aren't responsible for their content, availability or privacy practices, and your use of them is subject to their own terms.</p>

            <h2>Our content</h2>
            <p>The text, logo, design and other content on this website belong to Thrive or are used with permission. You may view and share pages for personal, non-commercial use, but you may not copy, change or reuse our content for other purposes without our written permission. ExoMind and other product names belong to their respective owners.</p>

            <h2>Using the website responsibly</h2>
            <p>Please don't submit false information, try to disrupt or gain unauthorized access to the website, or use it for any unlawful purpose.</p>

            <h2>Disclaimers</h2>
            <p>We work to keep this website accurate and up to date, but it is provided "as is," without warranties of any kind. Treatment results vary from person to person, and nothing on this website is a guarantee of any outcome.</p>

            <h2>Limitation of liability</h2>
            <p>To the fullest extent allowed by law, Thrive isn't liable for any indirect, incidental or consequential damages arising from your use of this website. This doesn't limit any responsibilities we have to you as a patient under applicable law.</p>

            <h2>Governing law</h2>
            <p>These terms are governed by the laws of the State of Arizona, without regard to its conflict of law rules.</p>

            <h2>Changes to these terms</h2>
            <p>We may update these terms from time to time. When we do, we'll change the "Last updated" date at the top of this page. Continuing to use the website means you accept the updated terms.</p>

            <h2>Contact us</h2>
            <p>Questions about these terms? Call or text <a href="tel:<?= $practice['phone_raw'] ?>"><?= e($practice['phone']) ?></a>, or write to us at <?= e($practice['name']) ?>, <?= e($practice['mesa_addr']) ?>, <?= e($practice['mesa_city']) ?>.</p>
<?php require __DIR__ . '/inc/legal-footer.php'; ?>
