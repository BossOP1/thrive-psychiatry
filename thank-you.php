<?php
/**
 * Thank-you page shown after the contact form is sent. Served at /thank-you.
 * When the HIPAA-compliant form provider is set up, point its success redirect here.
 */

require __DIR__ . '/inc/site.php';

$page_title = 'Thank You | Thrive Psychiatry & Wellness';
$page_description = 'Thanks for reaching out to Thrive Psychiatry & Wellness. We\'ll be in touch soon.';
$page_noindex = true;

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/page-header.php';
?>

<main id="main">

    <!-- Confirmation -->
    <section class="relative isolate overflow-hidden bg-grape-900 py-20 text-white lg:py-28">
        <div class="sunburst pointer-events-none absolute -bottom-10 left-1/2 -z-10 h-72 w-[56rem] -translate-x-1/2 opacity-[0.12]"></div>
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6">
            <span class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-sunrise-500 shadow-lift"><?= icon('check', 'h-10 w-10') ?></span>
            <p class="mt-8 font-bold uppercase tracking-widest text-sun-300">Request received</p>
            <h1 class="mt-3 font-display text-5xl font-semibold leading-[1.05] tracking-tight sm:text-6xl">Thank you.<br><span class="text-sun-300">We'll be in touch soon.</span></h1>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-white/80 sm:text-xl">We'll reach out the way you asked, usually the same business day. Taking this first step matters, and we're glad you did.</p>
            <div class="mt-10 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="/" class="group inline-flex items-center justify-center gap-2 rounded-full bg-sunrise-500 px-8 py-4 text-lg font-bold text-white shadow-lift transition hover:-translate-y-0.5 hover:bg-sunrise-600">
                    Back to Home <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?>
                </a>
                <a href="sms:<?= $practice['phone_raw'] ?>" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white/40 px-8 py-4 text-lg font-bold transition hover:border-white hover:bg-white hover:text-grape-900">
                    <?= icon('message', 'h-5 w-5') ?> Text <?= e($practice['phone']) ?>
                </a>
            </div>
        </div>
    </section>

    <!-- What happens next -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6">
            <div class="text-center">
                <p class="font-bold uppercase tracking-widest text-sunrise-600">What happens next</p>
                <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">Here's what to expect</h2>
            </div>
            <ol class="mt-12 grid gap-5 md:grid-cols-3">
                <?php
                $steps = [
                    ['message', 'We reach out', 'A member of our team will text, call or email you, whichever you chose, to answer questions and check your insurance.'],
                    ['calendar', 'We book your first visit', 'We\'ll find a time that works for you, in person in Mesa or by telehealth anywhere in Arizona or Washington.'],
                    ['clock', 'Your 90-minute visit', 'We take the time to understand your story and goals, then build a plan together. No rushing.'],
                ];
                foreach ($steps as $n => [$ic, $title, $copy]): ?>
                    <li class="rounded-[2rem] bg-white p-8 shadow-soft ring-1 ring-grape-100">
                        <div class="flex items-center justify-between">
                            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sunrise-100 text-sunrise-600"><?= icon($ic, 'h-6 w-6') ?></span>
                            <span class="font-display text-4xl font-semibold text-grape-100"><?= $n + 1 ?></span>
                        </div>
                        <h3 class="mt-6 font-display text-2xl font-semibold text-grape-900"><?= e($title) ?></h3>
                        <p class="mt-2 text-ink/65"><?= e($copy) ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>

            <!-- TMS nudge -->
            <div class="mt-10 flex flex-col items-start justify-between gap-6 rounded-[2rem] bg-grape-50 p-8 sm:flex-row sm:items-center">
                <div>
                    <p class="font-display text-2xl font-semibold text-grape-900">Curious about ExoMind TMS?</p>
                    <p class="mt-1 text-ink/65">Consultations are free. Learn how this medication-free depression treatment works while you wait.</p>
                </div>
                <a href="/#tms" class="group inline-flex shrink-0 items-center gap-2 rounded-full bg-grape-600 px-7 py-3.5 font-bold text-white transition hover:-translate-y-0.5 hover:bg-grape-700">
                    Explore TMS <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?>
                </a>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/inc/page-footer.php'; ?>
