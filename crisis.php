<?php
/**
 * Crisis resources. Served at /crisis. Insurers require crisis outreach info on the site.
 * Numbers checked October 2026: 988 Lifeline, AZ statewide line (Solari), SW WA line (Clark County).
 */

require __DIR__ . '/inc/site.php';

$page_title = 'Crisis Resources | Thrive Psychiatry & Wellness';
$page_description = 'Free, 24/7 mental health crisis lines for Arizona and Southwest Washington, including 988, the Arizona Statewide Crisis Line and the Southwest Washington Crisis Line.';

$lines = [
    [
        'name'  => '988 Suicide & Crisis Lifeline',
        'where' => 'Nationwide',
        'copy'  => 'Free, confidential support for anyone in emotional distress or a suicidal crisis. Veterans and service members can press 1 after dialing.',
        'ways'  => [
            ['phone', 'Call', '988', 'tel:988'],
            ['message', 'Text', '988', 'sms:988'],
            ['arrow', 'Chat', '988lifeline.org', 'https://988lifeline.org/chat/'],
        ],
    ],
    [
        'name'  => 'Arizona Statewide Crisis Line',
        'where' => 'Arizona · Mesa patients',
        'copy'  => 'Free crisis counseling for children and adults anywhere in Arizona, and can send a mobile crisis team to you.',
        'ways'  => [
            ['phone', 'Call', '1-844-534-HOPE (4673)', 'tel:18445344673'],
            ['message', 'Text', 'HOPE to 4HOPE (44673)', 'sms:44673'],
        ],
    ],
    [
        'name'  => 'Southwest Washington Crisis Line',
        'where' => 'Clark, Skamania & Klickitat counties · Vancouver patients',
        'copy'  => 'Free behavioral health crisis support, including mobile crisis outreach, for Southwest Washington.',
        'ways'  => [
            ['phone', 'Call', '1-800-626-8137', 'tel:18006268137'],
            ['phone', 'TTY', '1-866-835-2755', 'tel:18668352755'],
        ],
    ],
];

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/page-header.php';
?>

<main id="main">

    <!-- Emergency -->
    <section class="bg-grape-900 py-16 text-white lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6">
            <p class="font-bold uppercase tracking-widest text-sun-300">Crisis resources</p>
            <h1 class="mt-3 font-display text-5xl font-semibold leading-[1.05] tracking-tight sm:text-6xl">You don't have to wait.<br><span class="text-sun-300">Help is available 24/7.</span></h1>
            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-white/80 sm:text-xl">If you or someone you love is struggling right now, the free lines below are open every hour of every day, including nights, weekends and holidays.</p>

            <div class="mt-10 flex flex-col gap-4 rounded-[2rem] bg-sunrise-500 p-7 sm:flex-row sm:items-center sm:justify-between sm:p-8">
                <div>
                    <p class="font-display text-2xl font-semibold sm:text-3xl">In immediate danger?</p>
                    <p class="mt-1 text-lg text-white/90">Call 911 or go to the nearest emergency room.</p>
                </div>
                <a href="tel:911" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-white px-8 py-4 text-lg font-bold text-grape-900"><?= icon('phone', 'h-5 w-5') ?> 911</a>
            </div>
        </div>
    </section>

    <!-- Crisis lines -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6">
            <h2 class="font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">24/7 crisis lines</h2>
            <div class="mt-10 grid gap-5">
                <?php foreach ($lines as $l): ?>
                    <article class="rounded-[2rem] bg-white p-7 shadow-soft ring-1 ring-grape-100 sm:p-9">
                        <p class="text-sm font-bold uppercase tracking-wider text-sunrise-600"><?= e($l['where']) ?></p>
                        <h3 class="mt-2 font-display text-2xl font-semibold text-grape-900 sm:text-3xl"><?= e($l['name']) ?></h3>
                        <p class="mt-2 max-w-2xl text-lg text-ink/65"><?= e($l['copy']) ?></p>
                        <dl class="mt-6 grid gap-4 sm:grid-cols-3">
                            <?php foreach ($l['ways'] as [$ic, $how, $label, $href]): ?>
                                <div class="flex items-center gap-3">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-grape-50 text-grape-700"><?= icon($ic, 'h-5 w-5') ?></span>
                                    <div class="leading-tight">
                                        <dt class="text-xs font-bold uppercase tracking-widest text-ink/45"><?= e($how) ?></dt>
                                        <dd class="mt-1 font-bold text-grape-900"><a href="<?= e($href) ?>" <?= strpos($href, 'http') === 0 ? 'target="_blank" rel="noopener"' : '' ?> class="hover:text-grape-600"><?= e($label) ?></a></dd>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Thrive is not a crisis service -->
            <div class="mt-10 rounded-[2rem] bg-grape-50 p-7 sm:p-9">
                <p class="font-display text-2xl font-semibold text-grape-900">A note about our office</p>
                <p class="mt-3 text-lg leading-relaxed text-ink/70"><?= e($practice['name']) ?> is not an emergency or crisis service. We can't respond to emergencies by phone, text, email or our website form, so please don't wait for a call back from us. Reach out to one of the lines above, or call 911. Once you're safe, we're here to help with ongoing care.</p>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/inc/page-footer.php'; ?>
