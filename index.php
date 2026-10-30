<?php
/**
 * Thrive Psychiatry & Wellness — Homepage
 *
 * Stack: Tailwind CSS (Play CDN for the build/review phase — swap for a compiled
 * build before launch), vanilla JS, no framework.
 *
 * Content notes for the team:
 *  - Stock photos (assets/img/stock-*.webp) are placeholders. Replace with real Thrive
 *    photography from Jennifer's shared Drive (office, Weston, team, ExoMind room).
 *  - Testimonial / Google Reviews / video slots are layout placeholders — do not ship
 *    invented quotes. Wire to a reviews widget + real videos.
 *  - Contact + quiz forms post nowhere yet (see FORM_ENDPOINT). Route through a
 *    HIPAA-appropriate form provider before launch.
 */

require __DIR__ . '/inc/site.php';

const FORM_ENDPOINT = '#'; // TODO: HIPAA-compliant form handler

// Ordered by Jennifer's service priority. TMS is rendered as the featured card.
// Card photos are Unsplash placeholders: ADHD by Compare Fibre, Medication by Alef Morais,
// Mood by Brooke Cagle, Evaluations by Christina @ wocintechchat.com.
$services = [
    [
        'slug'  => 'tms',
        'title' => 'TMS with ExoMind',
        'blurb' => 'A modern, medication-free treatment for depression that hasn\'t lifted with medication alone. Sit back, relax, and get on with your day.',
        'short' => 'Medication-free depression treatment',
        'icon'  => 'zap',
        'tag'   => 'Free consultation',
    ],
    [
        'slug'  => 'adhd',
        'title' => 'ADHD Evaluations & Treatment',
        'blurb' => 'Thorough, in-person evaluations for teens and adults, followed by a treatment plan that fits your work, school and family life.',
        'short' => 'In-person evaluations for teens & adults',
        'icon'  => 'target',
        'image' => 'service-adhd.webp',
        'pos'   => 'object-[30%_center]',
    ],
    [
        'slug'  => 'medication-management',
        'title' => 'Medication Management',
        'blurb' => 'Thoughtful prescribing and real follow-up. We adjust together, and you can text us between visits.',
        'short' => 'Thoughtful prescribing, real follow-up',
        'icon'  => 'pill',
        'image' => 'service-medication.webp',
        'pos'   => 'object-[center_30%]',
    ],
    [
        'slug'  => 'mood-disorders',
        'title' => 'Depression, Anxiety & Mood',
        'blurb' => 'Care for depression, anxiety, bipolar and other mood disorders, centered on getting you back to the life you want.',
        'short' => 'Depression, anxiety, bipolar & more',
        'icon'  => 'sun',
        'image' => 'service-mood.webp',
        'pos'   => 'object-[center_25%]',
    ],
    [
        'slug'  => 'psychiatric-evaluations',
        'title' => 'Comprehensive Psychiatric Evaluations',
        'blurb' => 'A full 90-minute first visit, so we understand your whole story before we make any recommendations.',
        'short' => 'A full 90-minute first visit',
        'icon'  => 'clipboard',
        'image' => 'service-evaluations.webp',
        'pos'   => 'object-[center_35%]',
    ],
];

$also_treat = ['Anxiety', 'Insomnia', 'Bipolar Disorder', 'Brain Fog', 'Cognitive Decline', 'Anger Management', 'Schizophrenia', 'Substance Use'];

$faqs = [
    [
        'q' => 'Do you take my insurance?',
        'a' => 'We accept Aetna, Blue Cross Blue Shield, Cigna, Humana, Medicare, Tricare and United Healthcare/Optum. Not sure about your plan? Text us and we\'ll check for you.',
    ],
    [
        'q' => 'Is the TMS consultation really free?',
        'a' => 'Yes. Your TMS consultation is free, with no obligation. We\'ll talk through your history, explain how ExoMind works, and help you decide if it\'s a good fit.',
    ],
    [
        'q' => 'Can I be seen by telehealth?',
        'a' => 'Many visits can be done by secure video in Arizona and Washington. ADHD and substance use evaluations need to be in person, and follow-ups can usually be done by telehealth.',
    ],
    [
        'q' => 'Why is the first appointment 90 minutes?',
        'a' => 'Because you deserve to be heard. A longer first visit lets us understand your history, your goals and what\'s getting in your way, so your plan is actually built around you.',
    ],
    [
        'q' => 'Can I really text you?',
        'a' => 'Yes. Text ' . $practice['phone'] . ' for scheduling, questions and quick follow-ups. Please don\'t text in an emergency. Call or text 988 instead.',
    ],
    [
        'q' => 'Do you have evening or weekend appointments?',
        'a' => 'Yes. We see patients into the evening several days a week and offer select Saturday appointments, so care fits around work, school and family.',
    ],
];

$page_title = 'Thrive Psychiatry & Wellness | TMS, ADHD & Psychiatry in Mesa, AZ & Vancouver, WA';
$page_description = 'Personal psychiatric care that takes its time. ExoMind TMS, ADHD evaluations, medication management and mood disorder treatment in Mesa, AZ and Vancouver, WA. 90-minute first visits, text-friendly, evenings and Saturdays.';
require __DIR__ . '/inc/head.php';
?>
<body id="top" class="bg-cream font-sans text-ink antialiased pb-20 lg:pb-0">

<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2">Skip to content</a>

<!-- Utility bar -->
<div class="bg-grape-900 text-[13px] text-grape-100">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-2 sm:px-6">
        <p class="flex items-center gap-2">
            <span class="relative flex h-2 w-2"><span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-60 motion-reduce:hidden"></span><span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span></span>
            <span><span class="font-medium text-white">Accepting new patients</span><span class="hidden sm:inline"> · Arizona &amp; Washington · In Person &amp; Telehealth</span></span>
        </p>
        <div class="flex items-center gap-4">
            <a href="#locations" class="hidden items-center gap-1.5 hover:text-white md:inline-flex"><?= icon('pin', 'h-3.5 w-3.5 text-sun-300') ?>Mesa, AZ</a>
            <a href="#locations" class="hidden items-center gap-1.5 hover:text-white md:inline-flex"><?= icon('pin', 'h-3.5 w-3.5 text-sun-300') ?>Vancouver, WA</a>
            <span class="hidden h-3.5 w-px bg-white/20 md:block"></span>
            <a href="<?= e($practice['portal']) ?>" class="font-medium hover:text-white" target="_blank" rel="noopener">Patient Portal</a>
        </div>
    </div>
</div>

<!-- Header -->
<header id="site-header" class="sticky top-0 z-50 border-b border-transparent bg-white/95 backdrop-blur-md transition-shadow duration-300">
    <div class="hdr-inner mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-3 sm:px-6">
        <a href="#top" class="flex shrink-0 items-center" aria-label="Thrive Psychiatry & Wellness home">
            <img src="assets/img/logo-tight.webp" alt="Thrive Psychiatry & Wellness" class="hdr-logo h-14 w-auto sm:h-[60px]" width="478" height="392">
        </a>

        <nav class="relative hidden items-center gap-1 lg:flex" aria-label="Main">
            <!-- Services mega menu -->
            <div class="group" data-mega>
                <button type="button" class="nav-link inline-flex items-center gap-1 rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700" aria-expanded="false" aria-haspopup="true" data-mega-btn data-spy="services">
                    Services <?= icon('chevron', 'h-4 w-4 transition-transform duration-200 group-hover:rotate-180') ?>
                </button>
                <div class="mega-panel invisible absolute left-0 top-full w-[760px] translate-y-2 pt-3 opacity-0 transition duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                    <div class="grid grid-cols-5 gap-2 overflow-hidden rounded-3xl bg-white p-3 shadow-lift ring-1 ring-grape-100">
                        <?php $tms = $services[0]; ?>
                        <a href="#tms" class="group/tms relative col-span-2 flex flex-col overflow-hidden rounded-2xl bg-grape-700 p-5 text-white">
                            <div class="sunburst pointer-events-none absolute -right-24 -top-16 h-28 w-60 opacity-20"></div>
                            <span class="relative w-fit rounded-full bg-sun-300 px-2.5 py-0.5 text-[11px] font-bold uppercase tracking-wider text-grape-900"><?= e($tms['tag']) ?></span>
                            <span class="relative mt-3 font-display text-xl font-semibold"><?= e($tms['title']) ?></span>
                            <span class="relative mt-1 text-sm text-grape-100"><?= e($tms['short']) ?></span>
                            <img src="assets/img/exomind-patient.webp" alt="" class="relative mt-4 h-28 w-full rounded-xl bg-white object-cover object-[70%_center]">
                            <span class="relative mt-4 inline-flex items-center gap-1.5 text-sm font-bold text-sun-300">Explore TMS <?= icon('arrow', 'h-4 w-4 transition group-hover/tms:translate-x-1') ?></span>
                        </a>
                        <div class="col-span-3 flex flex-col">
                            <div class="grid flex-1 gap-1">
                                <?php foreach (array_slice($services, 1) as $s): ?>
                                    <a href="#get-started" data-service="<?= e($s['title']) ?>" class="group/item flex items-start gap-3 rounded-2xl p-3 transition hover:bg-grape-50">
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sunrise-100 text-sunrise-600 transition group-hover/item:bg-sunrise-500 group-hover/item:text-white"><?= icon($s['icon'], 'h-5 w-5') ?></span>
                                        <span>
                                            <span class="block font-bold text-grape-900"><?= e($s['title']) ?></span>
                                            <span class="block text-sm text-ink/60"><?= e($s['short']) ?></span>
                                        </span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <a href="#services" class="mt-1 flex items-center justify-between rounded-2xl bg-cream px-4 py-3 text-sm font-medium text-ink/70 transition hover:text-grape-700">
                                <span>Anxiety, insomnia, brain fog &amp; more</span>
                                <span class="inline-flex items-center gap-1 font-bold text-grape-600">All services <?= icon('arrow', 'h-4 w-4') ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#tms" class="nav-link rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700" data-spy="tms">TMS / ExoMind</a>
            <a href="#why-thrive" class="nav-link rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700" data-spy="why-thrive">Why Thrive</a>
            <a href="#about" class="nav-link rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700" data-spy="about">About</a>
            <a href="#locations" class="nav-link rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700" data-spy="locations">Locations</a>
            <a href="#faq" class="nav-link rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700" data-spy="faq">FAQ</a>
        </nav>

        <div class="flex items-center gap-2 sm:gap-3">
            <a href="sms:<?= $practice['phone_raw'] ?>" class="group hidden items-center gap-2.5 rounded-full py-1.5 pl-1.5 pr-4 ring-1 ring-grape-100 transition hover:bg-grape-50 hover:ring-grape-200 xl:inline-flex">
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-grape-600 text-white"><?= icon('message', 'h-4 w-4') ?></span>
                <span class="leading-tight">
                    <span class="block text-[11px] font-medium uppercase tracking-wider text-ink/50">Text us</span>
                    <span class="block text-sm font-bold text-grape-900"><?= e($practice['phone']) ?></span>
                </span>
            </a>
            <a href="#get-started" class="group hidden items-center gap-2 rounded-full bg-sunrise-500 px-6 py-3 font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-sunrise-600 sm:inline-flex">
                Get Started <?= icon('arrow', 'h-4 w-4 transition group-hover:translate-x-0.5') ?>
            </a>
            <button id="menu-btn" type="button" class="flex h-11 w-11 items-center justify-center rounded-full bg-grape-50 text-grape-800 transition hover:bg-grape-100 lg:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
                <span data-open><?= icon('menu', 'h-6 w-6') ?></span>
                <span data-close class="hidden"><?= icon('x', 'h-6 w-6') ?></span>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <nav id="mobile-menu" class="hidden max-h-[calc(100vh-7rem)] overflow-y-auto border-t border-grape-100 bg-white lg:hidden" aria-label="Mobile">
        <div class="mx-auto max-w-7xl px-4 pb-6 pt-4 sm:px-6">
            <p class="px-1 text-xs font-bold uppercase tracking-widest text-sunrise-600">Services</p>
            <div class="mt-2 grid gap-1 sm:grid-cols-2">
                <?php foreach ($services as $i => $s): ?>
                    <a href="<?= $i === 0 ? '#tms' : '#get-started' ?>" <?= $i ? 'data-service="' . e($s['title']) . '"' : '' ?> class="flex items-center gap-3 rounded-2xl p-2.5 transition hover:bg-grape-50 <?= $i === 0 ? 'bg-grape-50' : '' ?>">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl <?= $i === 0 ? 'bg-grape-600 text-sun-300' : 'bg-sunrise-100 text-sunrise-600' ?>"><?= icon($s['icon'], 'h-5 w-5') ?></span>
                        <span class="leading-tight">
                            <span class="block font-bold text-grape-900"><?= e($s['title']) ?></span>
                            <span class="block text-sm text-ink/60"><?= e($s['short']) ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-x-4 border-t border-grape-50 pt-4 text-lg font-medium">
                <a href="#why-thrive" class="py-2.5">Why Thrive</a>
                <a href="#about" class="py-2.5">About</a>
                <a href="#locations" class="py-2.5">Locations</a>
                <a href="#faq" class="py-2.5">FAQ</a>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-3">
                <a href="sms:<?= $practice['phone_raw'] ?>" class="flex items-center justify-center gap-2 rounded-full py-3 font-bold text-grape-700 ring-1 ring-grape-200"><?= icon('message', 'h-5 w-5') ?>Text us</a>
                <a href="tel:<?= $practice['phone_raw'] ?>" class="flex items-center justify-center gap-2 rounded-full py-3 font-bold text-grape-700 ring-1 ring-grape-200"><?= icon('phone', 'h-5 w-5') ?>Call</a>
            </div>
            <a href="#get-started" class="mt-3 flex items-center justify-center gap-2 rounded-full bg-sunrise-500 py-3.5 font-bold text-white">Get Started <?= icon('arrow', 'h-5 w-5') ?></a>
        </div>
    </nav>
</header>

<main id="main">

    <!-- ============ HERO ============ -->
    <!-- Background: Luigi Ritchie / Unsplash (Superstition Mountains, near Mesa AZ). TODO swap for real Thrive / Mesa photography -->
    <section class="relative isolate flex min-h-[640px] items-center overflow-hidden bg-grape-900 lg:min-h-[760px]">
        <img src="assets/img/hero-superstition-2560.webp" srcset="assets/img/hero-superstition-1280.webp 1280w, assets/img/hero-superstition-2560.webp 2560w" sizes="100vw" alt="Hiker on a desert trail toward the Superstition Mountains near Mesa, Arizona, at golden hour" class="absolute inset-0 -z-20 h-full w-full object-cover object-[55%_center] lg:object-[center_55%]" fetchpriority="high">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-grape-900/95 via-grape-900/75 to-grape-900/50 lg:via-grape-900/50 lg:to-transparent"></div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-40 bg-gradient-to-t from-grape-900/70 to-transparent"></div>

        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 lg:py-28">
            <div class="max-w-2xl">
                <p class="reveal mb-6 inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-1.5 text-sm font-medium text-white ring-1 ring-white/25 backdrop-blur">
                    <span class="h-2 w-2 rounded-full bg-sun-300"></span>
                    Psychiatry &amp; Wellness in Mesa, AZ &amp; Vancouver, WA
                </p>
                <h1 class="reveal font-display text-5xl font-semibold leading-[1.02] tracking-tight text-white sm:text-6xl xl:text-7xl">
                    Don't just get by.<br>
                    <span class="relative inline-block text-sun-300">
                        Thrive.
                        <svg class="absolute -bottom-2 left-0 w-full text-sunrise-400" viewBox="0 0 200 12" fill="none" preserveAspectRatio="none" aria-hidden="true"><path d="M2 9c40-6 120-8 196-3" stroke="currentColor" stroke-width="5" stroke-linecap="round"/></svg>
                    </span>
                </h1>
                <p class="reveal mt-7 max-w-xl text-lg leading-relaxed text-white/85 sm:text-xl">
                    Personal psychiatric care that actually takes the time to know you, with modern treatments like <strong class="text-white">ExoMind TMS</strong> to help you get back to work, family, friends and everything you love.
                </p>
                <div class="reveal mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="#get-started" class="group inline-flex items-center justify-center gap-2 rounded-full bg-sunrise-500 px-8 py-4 text-lg font-bold text-white shadow-lift transition hover:-translate-y-0.5 hover:bg-sunrise-600">
                        Get Started <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?>
                    </a>
                    <a href="#tms" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white/70 px-8 py-4 text-lg font-bold text-white transition hover:border-white hover:bg-white hover:text-grape-900">
                        Free TMS Consultation
                    </a>
                </div>

                <ul class="reveal mt-10 grid grid-cols-2 gap-x-6 gap-y-3 text-sm font-medium text-white/90 sm:flex sm:flex-wrap">
                    <li class="flex items-center gap-2"><span class="text-sun-300"><?= icon('clock', 'h-5 w-5') ?></span>90-Minute First Visits</li>
                    <li class="flex items-center gap-2"><span class="text-sun-300"><?= icon('message', 'h-5 w-5') ?></span>Text-Friendly</li>
                    <li class="flex items-center gap-2"><span class="text-sun-300"><?= icon('moon', 'h-5 w-5') ?></span>Evenings &amp; Saturdays</li>
                    <li class="flex items-center gap-2"><span class="text-sun-300"><?= icon('video', 'h-5 w-5') ?></span>In-Person or Telehealth</li>
                </ul>
            </div>
        </div>

    </section>
    <!-- ============ SERVICES ============ -->
    <section id="services" class="scroll-mt-24 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div class="reveal max-w-2xl">
                <p class="font-bold uppercase tracking-widest text-sunrise-600">What we treat</p>
                <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">Find the care you're looking for</h2>
                <p class="mt-4 text-lg text-ink/70">Pick a service to learn more. No digging through menus.</p>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($services as $i => $s): ?>
                    <?php if ($i === 0): ?>
                        <!-- Featured: TMS -->
                        <a href="#tms" class="reveal group relative overflow-hidden rounded-[2rem] bg-grape-700 p-8 text-white shadow-lift transition hover:-translate-y-1 md:col-span-2 lg:row-span-2 lg:col-span-1 flex flex-col">
                            <div class="sunburst pointer-events-none absolute -right-16 -top-10 h-48 w-80 opacity-30"></div>
                            <span class="relative inline-flex w-fit items-center gap-1.5 rounded-full bg-sun-300 px-3 py-1 text-xs font-bold uppercase tracking-wider text-grape-900"><?= e($s['tag']) ?></span>
                            <span class="relative mt-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-sun-300"><?= icon($s['icon'], 'h-7 w-7') ?></span>
                            <h3 class="relative mt-5 font-display text-3xl font-semibold"><?= e($s['title']) ?></h3>
                            <p class="relative mt-3 text-grape-100"><?= e($s['blurb']) ?></p>
                            <img src="assets/img/exomind-patient.webp" alt="Patient relaxing during an ExoMind treatment" class="relative mt-6 w-full rounded-2xl bg-white object-cover lg:mt-auto">
                            <span class="relative mt-6 inline-flex items-center gap-2 font-bold text-sun-300">Explore TMS <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?></span>
                        </a>
                    <?php else: ?>
                        <a href="#get-started" data-service="<?= e($s['title']) ?>" class="reveal group relative isolate flex min-h-[22rem] flex-col justify-end overflow-hidden rounded-[2rem] p-7 text-white shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lift">
                            <img src="assets/img/<?= e($s['image']) ?>" alt="" loading="lazy" class="absolute inset-0 -z-20 h-full w-full object-cover <?= $s['pos'] ?> transition duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-grape-900/95 from-10% via-grape-900/50 via-40% to-transparent to-65%"></div>
                            <span class="absolute left-6 top-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-grape-900/35 text-sun-300 ring-1 ring-white/25 backdrop-blur-md transition group-hover:bg-sunrise-500 group-hover:text-white group-hover:ring-sunrise-500"><?= icon($s['icon'], 'h-6 w-6') ?></span>
                            <h3 class="font-display text-2xl font-semibold leading-tight"><?= e($s['title']) ?></h3>
                            <p class="mt-1.5 text-white/80"><?= e($s['short']) ?></p>
                            <span class="mt-4 inline-flex items-center gap-2 font-bold text-sun-300">Learn More <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="reveal mt-10 flex flex-wrap items-center gap-2">
                <span class="mr-2 font-medium text-ink/60">We also help with:</span>
                <?php foreach ($also_treat as $t): ?>
                    <span class="rounded-full bg-white px-4 py-1.5 text-sm font-medium text-grape-800 ring-1 ring-grape-100"><?= e($t) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============ WHY THRIVE ============ -->
    <section id="why-thrive" class="scroll-mt-24 bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-16 px-4 sm:px-6 lg:grid-cols-12 lg:gap-20">
            <div class="reveal lg:col-span-5">
                <div class="lg:sticky lg:top-36">
                    <p class="font-bold uppercase tracking-widest text-sunrise-600">Why Thrive</p>
                    <h2 class="mt-4 font-display text-4xl font-semibold leading-[1.05] tracking-tight text-grape-900 sm:text-5xl lg:text-6xl">Felt rushed somewhere else?<br><span class="text-grape-600">Not here.</span></h2>
                    <p class="mt-6 max-w-md text-lg leading-relaxed text-ink/65">
                        We take the time to understand you, we answer when you reach out, and we make decisions with you, not for you.
                    </p>
                    <a href="#get-started" class="group mt-8 inline-flex items-center gap-2 font-bold text-grape-700">
                        <span class="border-b-2 border-sunrise-400 pb-0.5 transition group-hover:border-grape-600">Get Started</span>
                        <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="reveal flex flex-wrap items-end gap-x-6 gap-y-2">
                    <span data-count="90" class="bg-gradient-to-br from-sunrise-400 via-sunrise-500 to-grape-600 bg-clip-text pr-3 font-display text-[8rem] font-semibold leading-[0.8] tracking-tighter text-transparent sm:text-[11rem]">90</span>
                    <p class="pb-2">
                        <span class="block font-display text-2xl font-semibold text-grape-900 sm:text-3xl">minute first visit.</span>
                        <span class="mt-1 block text-ink/50">Most practices give you about 15.</span>
                    </p>
                </div>

                <dl class="mt-12 border-t border-grape-100">
                    <?php
                    $diffs = [
                        ['30 min', 'Every follow-up leaves room for real conversation.'],
                        ['Text us', 'Questions, refills or rescheduling. We reply fast.'],
                        ['After hours', 'Evenings until 8pm, plus select Saturdays.'],
                        ['Together', 'Shared decisions, built around your goals.'],
                    ];
                    foreach ($diffs as [$label, $copy]): ?>
                        <div class="reveal group grid gap-1 border-b border-grape-100 py-7 sm:grid-cols-[13rem_1fr] sm:items-baseline sm:gap-8">
                            <dt class="font-display text-2xl font-semibold text-grape-900 transition-colors group-hover:text-sunrise-600"><?= e($label) ?></dt>
                            <dd class="text-lg text-ink/60"><?= e($copy) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
    </section>

    <!-- ============ TMS / EXOMIND ============ -->
    <section id="tms" class="scroll-mt-24 relative overflow-hidden bg-grape-900 py-16 text-white lg:py-24">
        <div class="sunburst pointer-events-none absolute -bottom-10 left-1/2 h-72 w-[56rem] -translate-x-1/2 opacity-[0.12]"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
            <div class="grid gap-14 lg:grid-cols-2 lg:items-center">
                <div class="reveal">
                    <p class="inline-flex items-center gap-2 rounded-full bg-sun-300 px-4 py-1.5 text-sm font-bold uppercase tracking-wider text-grape-900">TMS consultations are free</p>
                    <h2 class="mt-6 font-display text-4xl font-semibold tracking-tight sm:text-5xl">When medication isn't enough, <span class="text-sun-300">there's ExoMind.</span></h2>
                    <p class="mt-5 text-lg leading-relaxed text-grape-100">
                        ExoMind is a modern form of Transcranial Magnetic Stimulation (TMS). It uses gentle magnetic pulses to stimulate areas of the brain involved in mood. It's non-invasive and medication-free, and you can get back to your day right after each session.
                    </p>
                    <!-- TODO: confirm session length, course length & clearance language with ExoMind-approved materials -->
                    <ul class="mt-8 grid gap-4 sm:grid-cols-2">
                        <?php foreach (['Non-invasive, no anesthesia', 'Medication-free option', 'Drive yourself home', 'Back to your day right away'] as $b): ?>
                            <li class="flex items-start gap-3"><span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-sunrise-500"><?= icon('check', 'h-4 w-4') ?></span><span class="font-medium"><?= e($b) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                        <button type="button" data-open-quiz class="inline-flex items-center justify-center gap-2 rounded-full bg-sunrise-500 px-8 py-4 text-lg font-bold text-white shadow-lift transition hover:-translate-y-0.5 hover:bg-sunrise-600">
                            Take the TMS Quiz
                        </button>
                        <a href="#get-started" data-service="TMS with ExoMind" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white/40 px-8 py-4 text-lg font-bold transition hover:border-white hover:bg-white hover:text-grape-900">
                            Book a Free Consultation
                        </a>
                    </div>
                </div>

                <div class="reveal relative">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-lift">
                        <img src="assets/img/exomind-patient.webp" alt="Woman seated comfortably in the ExoMind TMS chair" class="w-full object-cover">
                    </div>
                    <div class="absolute -bottom-8 -right-2 w-1/2 overflow-hidden rounded-2xl border-4 border-grape-900 shadow-lift sm:-right-6">
                        <img src="assets/img/exomind-applicator.webp" alt="Close-up of the ExoMind applicator" class="w-full object-cover">
                    </div>
                </div>
            </div>

            <!-- TMS Quiz -->
            <div id="tms-quiz" class="mt-24 hidden scroll-mt-28 rounded-[2rem] bg-white p-6 text-ink shadow-lift sm:p-10" aria-live="polite">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="font-bold uppercase tracking-widest text-sunrise-600">TMS Quiz</p>
                        <h3 class="mt-1 font-display text-2xl font-semibold text-grape-900 sm:text-3xl">Could ExoMind be right for you?</h3>
                    </div>
                    <p class="shrink-0 text-sm font-medium text-ink/60"><span data-quiz-step>1</span> / <span data-quiz-total>5</span></p>
                </div>
                <div class="mt-5 h-2 rounded-full bg-grape-50"><div data-quiz-progress class="h-2 w-[20%] rounded-full bg-sunrise-500 transition-all duration-500"></div></div>

                <div data-quiz-body class="mt-8"></div>

                <p class="mt-8 text-xs text-ink/50">This quiz is for information only and isn't a diagnosis. If you're in crisis, call or text 988.</p>
            </div>
        </div>
    </section>

    <!-- ============ ABOUT ============ -->
    <section id="about" class="scroll-mt-24 py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-14 px-4 sm:px-6 lg:grid-cols-12">
            <div class="reveal relative lg:col-span-5">
                <div class="absolute -left-4 -top-4 h-full w-full rounded-[2rem] bg-sun-300"></div>
                <img src="assets/img/jennifer.webp" alt="Jennifer Anderson, psychiatric nurse practitioner and founder of Thrive" class="relative aspect-[4/5] w-full rounded-[2rem] object-cover shadow-lift">
            </div>
            <div class="reveal lg:col-span-7">
                <p class="font-bold uppercase tracking-widest text-sunrise-600">Meet your provider</p>
                <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">Hi, I'm Jennifer.</h2>
                <p class="mt-2 font-medium text-grape-600">Psychiatric Nurse Practitioner · Founder, Thrive Psychiatry &amp; Wellness</p>
                <!-- TODO: replace with Jennifer's own bio/voice from the onboarding form -->
                <div class="mt-6 space-y-4 text-lg leading-relaxed text-ink/75">
                    <p>I started Thrive because I believe people deserve more than a quick appointment and a prescription. When you sit down with me, we take the time to understand your story, your goals and what's been getting in your way.</p>
                    <p>My goal isn't just for you to feel "less bad." It's for you to get back to <strong class="text-grape-800">living</strong>: showing up for your family, enjoying your friends, doing well at work and school, and feeling like yourself again.</p>
                </div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#get-started" class="inline-flex items-center gap-2 rounded-full bg-grape-600 px-7 py-3.5 font-bold text-white transition hover:-translate-y-0.5 hover:bg-grape-700">Request a Consultation <?= icon('arrow', 'h-5 w-5') ?></a>
                    <a href="sms:<?= $practice['phone_raw'] ?>" class="inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 font-bold text-grape-700 ring-1 ring-grape-200 transition hover:ring-grape-400"><?= icon('message', 'h-5 w-5') ?> Text the Office</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ HOW IT WORKS ============ -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-16 px-4 sm:px-6 lg:grid-cols-12 lg:gap-20">
            <div class="reveal lg:col-span-5">
                <p class="font-bold uppercase tracking-widest text-sunrise-600">How it works</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-[1.05] tracking-tight text-grape-900 sm:text-5xl lg:text-6xl">Getting started is easy.</h2>
                <p class="mt-6 max-w-md text-lg leading-relaxed text-ink/65">Three simple steps from first hello to feeling like yourself again.</p>
                <!-- TODO: swap for a real Thrive photo (office / team with patients) -->
                <div class="relative mt-10 hidden lg:block">
                    <div class="absolute -bottom-4 -right-4 h-full w-full rounded-[2rem] bg-sun-200"></div>
                    <img src="assets/img/stock-3.webp" alt="Couple smiling and sharing coffee at home" loading="lazy" class="relative aspect-[4/3] w-full rounded-[2rem] object-cover">
                </div>
            </div>

            <div class="lg:col-span-7 lg:pt-4">
                <?php
                $steps = [
                    ['About 1 minute', 'Reach out your way', 'Text, call or send a quick form. No phone tag. We\'ll get back to you fast.'],
                    ['90 minutes', 'Your first visit', 'In person or by video. We get to know you, your history, and what you want from life, without watching the clock.'],
                    ['30-min follow-ups', 'Start thriving', 'A plan built with you, from medication to ExoMind TMS, with texting in between visits.'],
                ];
                $lastStep = count($steps) - 1;
                ?>
                <ol>
                    <?php foreach ($steps as $n => [$time, $t, $c]): ?>
                        <li class="reveal relative flex gap-6 sm:gap-8 <?= $n < $lastStep ? 'pb-12' : '' ?>">
                            <?php if ($n < $lastStep): ?>
                                <span class="absolute bottom-0 left-7 top-14 w-px bg-gradient-to-b from-sunrise-300 to-grape-300" aria-hidden="true"></span>
                            <?php endif; ?>
                            <span class="relative z-10 flex h-14 w-14 shrink-0 items-center justify-center rounded-full font-display text-xl font-semibold <?= $n === $lastStep ? 'bg-sunrise-500 text-white shadow-lift' : 'bg-white text-grape-700 ring-1 ring-grape-200' ?>">
                                <?= $n === $lastStep ? icon('sun', 'h-6 w-6') : $n + 1 ?>
                            </span>
                            <div class="pt-1">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-grape-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-grape-700"><?= icon('clock', 'h-3.5 w-3.5') ?><?= e($time) ?></span>
                                <h3 class="mt-3 font-display text-2xl font-semibold text-grape-900 sm:text-3xl"><?= e($t) ?></h3>
                                <p class="mt-2 max-w-lg text-lg leading-relaxed text-ink/60"><?= e($c) ?></p>
                                <?php if ($n === 0): ?>
                                    <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2 font-bold text-grape-700">
                                        <a href="sms:<?= $practice['phone_raw'] ?>" class="group inline-flex items-center gap-1.5"><span class="border-b-2 border-sunrise-400 pb-0.5 transition group-hover:border-grape-600">Text us</span><?= icon('arrow', 'h-4 w-4 transition group-hover:translate-x-1') ?></a>
                                        <a href="tel:<?= $practice['phone_raw'] ?>" class="group inline-flex items-center gap-1.5"><span class="border-b-2 border-sunrise-400 pb-0.5 transition group-hover:border-grape-600">Call</span><?= icon('arrow', 'h-4 w-4 transition group-hover:translate-x-1') ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>

                <div class="reveal mt-12 flex flex-col gap-4 border-t border-grape-100 pt-10 sm:ml-[5.5rem] sm:flex-row sm:items-center">
                    <a href="#get-started" class="group inline-flex shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-full bg-sunrise-500 px-8 py-4 font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-sunrise-600">Get Started <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?></a>
                    <p class="text-sm text-ink/55">In person in Mesa &amp; Vancouver, or by video anywhere in AZ &amp; WA.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ REVIEWS ============ -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div class="reveal flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="font-bold uppercase tracking-widest text-sunrise-600">Real people, real lives</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">What our patients say</h2>
                </div>
                <div class="flex items-center gap-3 rounded-2xl bg-white px-5 py-3 shadow-soft">
                    <span class="font-display text-xl font-semibold text-ink">Google</span>
                    <span class="flex text-sun-400">
                        <?php for ($k = 0; $k < 5; $k++): ?><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
                    </span>
                    <span class="text-sm text-ink/60">Reviews</span>
                </div>
            </div>

            <!-- Google Reviews widget mounts here. Placeholder cards below show the layout only. -->
            <div id="google-reviews" class="mt-12 grid gap-5 md:grid-cols-3">
                <?php for ($r = 0; $r < 3; $r++): ?>
                    <figure class="reveal flex flex-col rounded-[2rem] bg-white p-8 shadow-soft ring-1 ring-grape-100">
                        <span class="flex text-sun-400">
                            <?php for ($k = 0; $k < 5; $k++): ?><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
                        </span>
                        <blockquote class="mt-4 flex-1 text-lg italic text-ink/40">[Patient review pulled from Google Reviews]</blockquote>
                        <figcaption class="mt-6 text-sm font-bold text-ink/40">[Reviewer name] · Google</figcaption>
                    </figure>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- ============ LOCATIONS ============ -->
    <section id="locations" class="scroll-mt-24 bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div class="reveal max-w-2xl">
                <p class="font-bold uppercase tracking-widest text-sunrise-600">Locations</p>
                <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">Two states. Same personal care.</h2>
                <p class="mt-4 text-lg text-ink/70">See us in person or by secure telehealth anywhere in Arizona or Washington.</p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-5">
                <article class="reveal rounded-[2rem] bg-grape-50 p-8 lg:col-span-3">
                    <div class="flex flex-wrap items-center gap-3">
                        <h3 class="font-display text-3xl font-semibold text-grape-900">Mesa, Arizona</h3>
                        <span class="rounded-full bg-sunrise-500 px-3 py-1 text-xs font-bold uppercase tracking-wider text-white">ExoMind TMS here</span>
                    </div>
                    <div class="mt-6 grid gap-8 sm:grid-cols-2">
                        <div class="space-y-4">
                            <p class="flex gap-3"><span class="text-grape-600"><?= icon('pin') ?></span><span><?= e($practice['mesa_addr']) ?><br><?= e($practice['mesa_city']) ?></span></p>
                            <p class="flex gap-3"><span class="text-grape-600"><?= icon('phone') ?></span><a href="tel:<?= $practice['phone_raw'] ?>" class="font-medium hover:text-grape-600"><?= e($practice['phone']) ?></a></p>
                            <a href="<?= e($practice['maps']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-bold text-grape-600 hover:text-grape-800">Get Directions <?= icon('arrow', 'h-5 w-5') ?></a>
                        </div>
                        <!-- TODO: confirm current hours with Jennifer (old site lists conflicting schedules) -->
                        <dl class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-1.5 text-sm">
                            <?php foreach (['Mon' => '11am – 8pm', 'Tue' => '10am – 8pm', 'Wed' => 'Closed', 'Thu' => '10am – 8pm', 'Fri' => '9am – 6pm', 'Sat' => '10am – 5pm (select)', 'Sun' => 'Closed'] as $d => $h): ?>
                                <dt class="font-bold text-grape-900"><?= $d ?></dt><dd class="text-ink/70"><?= e($h) ?></dd>
                            <?php endforeach; ?>
                        </dl>
                    </div>
                </article>

                <article class="reveal flex flex-col rounded-[2rem] bg-sunrise-100/70 p-8 lg:col-span-2">
                    <h3 class="font-display text-3xl font-semibold text-grape-900">Vancouver, Washington</h3>
                    <p class="mt-4 text-ink/75">Jennifer continues to see patients in Southwest Washington through in-person and telehealth visits.</p>
                    <!-- TODO: add Vancouver address / visit schedule once confirmed -->
                    <p class="mt-4 flex gap-3"><span class="text-grape-600"><?= icon('video') ?></span>Telehealth available statewide</p>
                    <a href="#get-started" data-location="Vancouver, WA" class="mt-auto inline-flex items-center gap-2 pt-6 font-bold text-grape-600 hover:text-grape-800">Request a Vancouver Appointment <?= icon('arrow', 'h-5 w-5') ?></a>
                </article>
            </div>

            <div class="reveal mt-10 rounded-[2rem] p-6 ring-1 ring-grape-100 sm:p-8">
                <p class="font-display text-lg font-semibold text-grape-900">Insurance we accept</p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <?php foreach (['Aetna', 'Blue Cross Blue Shield', 'Cigna', 'Humana', 'Medicare', 'Tricare', 'United Healthcare / Optum'] as $ins): ?>
                        <span class="rounded-full bg-cream px-4 py-2 text-sm font-medium"><?= e($ins) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ FAQ ============ -->
    <section id="faq" class="scroll-mt-24 py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-3">
            <div class="reveal">
                <p class="font-bold uppercase tracking-widest text-sunrise-600">FAQ</p>
                <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl">Questions? We've got you.</h2>
                <p class="mt-4 text-lg text-ink/70">Don't see yours? <a href="sms:<?= $practice['phone_raw'] ?>" class="font-bold text-grape-600 underline decoration-sunrise-400 decoration-2 underline-offset-4">Text us</a>, we're quick.</p>
            </div>
            <div class="space-y-3 lg:col-span-2">
                <?php foreach ($faqs as $f): ?>
                    <details class="reveal group rounded-2xl bg-white shadow-soft ring-1 ring-grape-100 open:ring-grape-300">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-display text-lg font-semibold text-grape-900">
                            <?= e($f['q']) ?>
                            <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-sunrise-100 text-sunrise-600 transition-transform"><?= icon('plus', 'h-5 w-5') ?></span>
                        </summary>
                        <p class="px-6 pb-6 text-ink/75"><?= e($f['a']) ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============ GET STARTED (FORM) ============ -->
    <?php
    $field = 'mt-1 w-full border-0 border-b border-grape-200 bg-transparent px-0 py-2.5 text-lg text-ink placeholder:text-ink/30 focus:border-grape-600 focus:outline-none focus:ring-0';
    $label = 'text-xs font-bold uppercase tracking-widest text-ink/45';
    ?>
    <section id="get-started" class="scroll-mt-24 bg-grape-900 py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-14 px-4 sm:px-6 lg:grid-cols-12 lg:gap-20">
            <div class="reveal text-white lg:col-span-5">
                <p class="font-bold uppercase tracking-widest text-sun-300">Get started</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-[1.05] tracking-tight sm:text-5xl lg:text-6xl">Ready to start <span class="text-sun-300">thriving?</span></h2>
                <p class="mt-6 max-w-md text-lg leading-relaxed text-white/70">Leave a few details and we'll reach out the way you prefer. It takes about a minute.</p>
                <a href="sms:<?= $practice['phone_raw'] ?>" class="group mt-10 inline-flex items-center gap-2 text-lg font-bold">
                    <span class="text-white/60">or text us</span>
                    <span class="border-b-2 border-sunrise-400 pb-0.5 transition group-hover:border-sun-300"><?= e($practice['phone']) ?></span>
                </a>
            </div>

            <form id="contact-form" action="<?= FORM_ENDPOINT ?>" method="post" class="reveal rounded-[2rem] bg-white p-7 sm:p-10 lg:col-span-7">
                <div class="grid gap-x-8 gap-y-7 sm:grid-cols-2">
                    <label class="block">
                        <span class="<?= $label ?>">Name</span>
                        <input required name="name" autocomplete="name" placeholder="First & last" class="<?= $field ?>">
                    </label>
                    <label class="block">
                        <span class="<?= $label ?>">Mobile phone</span>
                        <input required name="phone" type="tel" autocomplete="tel" placeholder="(480) 000-0000" class="<?= $field ?>">
                    </label>
                    <label class="block">
                        <span class="<?= $label ?>">Interested in</span>
                        <select id="f-service" name="service" class="<?= $field ?> cursor-pointer">
                            <?php foreach ($services as $s): ?><option><?= e($s['title']) ?></option><?php endforeach; ?>
                            <option>Not sure yet</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="<?= $label ?>">Location</span>
                        <select id="f-location" name="location" class="<?= $field ?> cursor-pointer">
                            <option>Mesa, AZ</option>
                            <option>Vancouver, WA</option>
                            <option>Telehealth (AZ or WA)</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="<?= $label ?>">Email <span class="normal-case tracking-normal font-normal">(optional)</span></span>
                        <input name="email" type="email" autocomplete="email" placeholder="you@email.com" class="<?= $field ?>">
                    </label>
                    <fieldset>
                        <legend class="<?= $label ?>">Reach me by</legend>
                        <div class="mt-3 flex gap-2">
                            <?php foreach (['Text', 'Call', 'Email'] as $k => $m): ?>
                                <label class="cursor-pointer">
                                    <input type="radio" name="contact_pref" value="<?= $m ?>" class="peer sr-only" <?= $k === 0 ? 'checked' : '' ?>>
                                    <span class="inline-block rounded-full px-4 py-1.5 text-sm font-bold text-ink/60 ring-1 ring-grape-200 transition peer-checked:bg-grape-900 peer-checked:text-white peer-checked:ring-grape-900 peer-focus-visible:ring-2 peer-focus-visible:ring-grape-500"><?= $m ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>
                    <label class="block sm:col-span-2">
                        <span class="<?= $label ?>">Message <span class="normal-case tracking-normal font-normal">(optional)</span></span>
                        <textarea name="message" rows="3" placeholder="Anything you'd like us to know, like the best time to reach you" class="<?= $field ?> resize-y"></textarea>
                    </label>
                </div>

                <div class="mt-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                    <label class="flex max-w-xs items-start gap-3 text-sm text-ink/55">
                        <input required type="checkbox" name="consent" class="mt-0.5 h-4 w-4 shrink-0 rounded border-grape-300 text-grape-600 focus:ring-grape-500">
                        <span>OK to contact me by text, call or email. Msg &amp; data rates may apply; reply STOP to opt out. Please don't share medical details here. <a href="/privacy" class="font-bold text-grape-700 underline underline-offset-2">Privacy Policy</a></span>
                    </label>
                    <button type="submit" class="group inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-sunrise-500 px-8 py-4 font-bold text-white transition hover:-translate-y-0.5 hover:bg-sunrise-600">
                        Request a Consultation <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?>
                    </button>
                </div>
                <p data-form-success class="mt-6 hidden text-center font-medium text-grape-700">Thanks! We'll be in touch soon, usually the same business day.</p>
            </form>
        </div>
    </section>
</main>

<!-- ============ FOOTER ============ -->
<?php $flink = 'text-white/60 transition hover:text-white'; ?>
<footer class="bg-ink text-white/60">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <!-- Closing line -->
        <div class="flex flex-col gap-8 border-b border-white/10 py-14 lg:flex-row lg:items-end lg:justify-between">
            <p class="font-display text-4xl font-semibold leading-[1.05] tracking-tight text-white sm:text-5xl">Don't just get by.<br><span class="text-sun-300">Thrive.</span></p>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a href="#get-started" class="group inline-flex items-center justify-center gap-2 rounded-full bg-sunrise-500 px-7 py-3.5 font-bold text-white transition hover:-translate-y-0.5 hover:bg-sunrise-600">Get Started <?= icon('arrow', 'h-5 w-5 transition group-hover:translate-x-1') ?></a>
                <a href="sms:<?= $practice['phone_raw'] ?>" class="inline-flex items-center justify-center gap-2 rounded-full px-7 py-3.5 font-bold text-white ring-1 ring-white/25 transition hover:bg-white hover:text-ink"><?= icon('message', 'h-5 w-5') ?> Text <?= e($practice['phone']) ?></a>
            </div>
        </div>

        <!-- Columns -->
        <div class="grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-12">
            <div class="lg:col-span-3">
                <img src="assets/img/logo-light.webp" alt="Thrive Psychiatry & Wellness" class="h-16 w-auto" width="478" height="392" loading="lazy">
                <p class="mt-5 max-w-xs leading-relaxed">Personal psychiatric care that takes its time, so you can get back to living.</p>
            </div>
            <div class="lg:col-span-3">
                <p class="text-xs font-bold uppercase tracking-widest text-white/40">Services</p>
                <ul class="mt-4 space-y-2.5">
                    <?php foreach ($services as $i => $s): ?>
                        <li><a href="<?= $i === 0 ? '#tms' : '#get-started' ?>" <?= $i ? 'data-service="' . e($s['title']) . '"' : '' ?> class="<?= $flink ?>"><?= e(str_replace(' with ExoMind', '', $s['title'])) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="lg:col-span-2">
                <p class="text-xs font-bold uppercase tracking-widest text-white/40">Practice</p>
                <ul class="mt-4 space-y-2.5">
                    <li><a href="#why-thrive" class="<?= $flink ?>">Why Thrive</a></li>
                    <li><a href="#about" class="<?= $flink ?>">About Jennifer</a></li>
                    <li><a href="#faq" class="<?= $flink ?>">FAQ</a></li>
                    <li><a href="<?= e($practice['portal']) ?>" target="_blank" rel="noopener" class="<?= $flink ?>">Patient Portal</a></li>
                </ul>
            </div>
            <div class="sm:col-span-2 lg:col-span-4">
                <p class="text-xs font-bold uppercase tracking-widest text-white/40">Locations</p>
                <div class="mt-4 grid gap-6 sm:grid-cols-2">
                    <div>
                        <p class="font-bold text-white">Mesa, AZ</p>
                        <p class="mt-1 leading-relaxed"><?= e($practice['mesa_addr']) ?><br><?= e($practice['mesa_city']) ?></p>
                        <a href="<?= e($practice['maps']) ?>" target="_blank" rel="noopener" class="mt-2 inline-flex items-center gap-1.5 text-sm font-bold text-sun-300 hover:text-white">Directions <?= icon('arrow', 'h-4 w-4') ?></a>
                    </div>
                    <div>
                        <p class="font-bold text-white">Vancouver, WA</p>
                        <p class="mt-1 leading-relaxed">In person &amp; telehealth</p>
                        <a href="tel:<?= $practice['phone_raw'] ?>" class="mt-2 inline-flex text-sm font-bold text-sun-300 hover:text-white"><?= e($practice['phone']) ?></a>
                    </div>
                </div>
                <iframe src="<?= e($practice['maps_embed']) ?>" title="Map of Thrive Psychiatry & Wellness in Mesa, AZ" class="mt-6 h-48 w-full rounded-2xl border-0" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Crisis -->
        <p class="flex items-start gap-3 rounded-2xl bg-white/5 px-5 py-4 text-sm leading-relaxed">
            <span class="mt-0.5 text-sunrise-400"><?= icon('heart', 'h-5 w-5') ?></span>
            <span><strong class="text-white">In crisis?</strong> Call or text <a href="tel:988" class="font-bold text-white underline decoration-sunrise-400 underline-offset-2">988</a>, AZ Crisis Line <a href="tel:18445344673" class="font-bold text-white underline decoration-sunrise-400 underline-offset-2">(844) 534-4673</a>, SW WA Crisis Line <a href="tel:18006268137" class="font-bold text-white underline decoration-sunrise-400 underline-offset-2">1-800-626-8137</a>, or 911.</span>
        </p>

        <!-- Legal -->
        <div class="flex flex-col justify-between gap-3 py-8 text-sm text-white/40 sm:flex-row">
            <p>&copy; <?= date('Y') ?> Thrive Psychiatry &amp; Wellness LLC</p>
            <p class="flex gap-6"><a href="/privacy" class="hover:text-white">Privacy Policy</a><a href="/terms" class="hover:text-white">Terms</a><a href="#top" class="hover:text-white">Back to top ↑</a></p>
        </div>
    </div>
</footer>

<!-- Mobile action bar -->
<div class="fixed inset-x-0 bottom-0 z-40 grid grid-cols-3 border-t border-grape-100 bg-white/95 text-sm font-bold backdrop-blur lg:hidden">
    <a href="sms:<?= $practice['phone_raw'] ?>" class="flex flex-col items-center gap-1 py-3 text-grape-700"><?= icon('message', 'h-5 w-5') ?>Text</a>
    <a href="tel:<?= $practice['phone_raw'] ?>" class="flex flex-col items-center gap-1 py-3 text-grape-700"><?= icon('phone', 'h-5 w-5') ?>Call</a>
    <a href="#get-started" class="flex flex-col items-center justify-center gap-1 bg-sunrise-500 py-3 text-white"><?= icon('calendar', 'h-5 w-5') ?>Get Started</a>
</div>

<script>
(() => {
    // Mobile menu
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');
    const toggleMenu = (open) => {
        menu.classList.toggle('hidden', !open);
        btn.setAttribute('aria-expanded', open);
        btn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        btn.querySelector('[data-open]').classList.toggle('hidden', open);
        btn.querySelector('[data-close]').classList.toggle('hidden', !open);
    };
    btn.addEventListener('click', () => toggleMenu(menu.classList.contains('hidden')));
    menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => toggleMenu(false)));

    // Header: compact + shadow once scrolled
    const header = document.getElementById('site-header');
    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 40);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    // Services mega menu: hover/focus opens via CSS; hide after a choice until the pointer leaves
    const mega = document.querySelector('[data-mega]');
    const megaBtn = mega.querySelector('[data-mega-btn]');
    mega.addEventListener('mouseenter', () => megaBtn.setAttribute('aria-expanded', 'true'));
    mega.addEventListener('mouseleave', () => { mega.classList.remove('is-dismissed'); megaBtn.setAttribute('aria-expanded', 'false'); });
    mega.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        mega.classList.add('is-dismissed');
        document.activeElement.blur();
    }));
    megaBtn.addEventListener('click', () => {
        mega.classList.remove('is-dismissed');
        megaBtn.setAttribute('aria-expanded', 'true');
    });
    document.addEventListener('keydown', (ev) => {
        if (ev.key !== 'Escape') return;
        if (mega.contains(document.activeElement)) { document.activeElement.blur(); megaBtn.setAttribute('aria-expanded', 'false'); }
        if (!menu.classList.contains('hidden')) toggleMenu(false);
    });

    // Highlight the nav item for the section in view
    const spyLinks = document.querySelectorAll('[data-spy]');
    const spy = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            spyLinks.forEach(l => l.setAttribute('aria-current', l.dataset.spy === entry.target.id));
        });
    }, { rootMargin: '-45% 0px -50% 0px' });
    spyLinks.forEach(l => { const sec = document.getElementById(l.dataset.spy); if (sec) spy.observe(sec); });

    // Count a number up from 15 when it scrolls into view
    const countUp = (el) => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        const end = Number(el.dataset.count), start = 15, dur = 1200, t0 = performance.now();
        const tick = (t) => {
            const p = Math.min((t - t0) / dur, 1);
            el.textContent = Math.round(start + (end - start) * (1 - Math.pow(1 - p, 3)));
            if (p < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    // Scroll reveal
    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            entry.target.querySelectorAll('[data-count]').forEach(countUp);
            io.unobserve(entry.target);
        });
    }, { threshold: 0.15 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));

    // Prefill form from service cards / location links
    const fService = document.getElementById('f-service');
    const fLocation = document.getElementById('f-location');
    document.querySelectorAll('[data-service]').forEach(el => el.addEventListener('click', () => fService.value = el.dataset.service));
    document.querySelectorAll('[data-location]').forEach(el => el.addEventListener('click', () => fLocation.value = el.dataset.location));

    // Contact form (front-end only until FORM_ENDPOINT is wired)
    const form = document.getElementById('contact-form');
    form.addEventListener('submit', (ev) => {
        if (form.getAttribute('action') !== '#') return;
        ev.preventDefault();
        form.querySelector('[data-form-success]').classList.remove('hidden');
        form.querySelector('button[type=submit]').disabled = true;
    });

    // TMS Quiz
    const questions = [
        'Have you been diagnosed with depression, or do you think you may be depressed?',
        'Have you tried at least one antidepressant medication?',
        'Are you still struggling with symptoms, or have side effects been hard to live with?',
        'Is depression getting in the way of work, family, friends or the things you enjoy?',
        'Would you be interested in a non-invasive, medication-free option?',
    ];
    const quiz = document.getElementById('tms-quiz');
    const body = quiz.querySelector('[data-quiz-body]');
    const stepEl = quiz.querySelector('[data-quiz-step]');
    const progress = quiz.querySelector('[data-quiz-progress]');
    quiz.querySelector('[data-quiz-total]').textContent = questions.length;
    let step = 0, yes = 0;

    const choiceBtn = (label, val) =>
        `<button type="button" data-answer="${val}" class="rounded-full px-8 py-3.5 text-lg font-bold ring-2 transition ${val ? 'bg-grape-600 text-white ring-grape-600 hover:bg-grape-700' : 'text-grape-700 ring-grape-200 hover:ring-grape-500'}">${label}</button>`;

    const render = () => {
        progress.style.width = `${((step + 1) / questions.length) * 100}%`;
        if (step < questions.length) {
            stepEl.textContent = step + 1;
            body.innerHTML = `<p class="font-display text-xl font-semibold text-grape-900 sm:text-2xl">${questions[step]}</p>
                <div class="mt-6 flex flex-wrap gap-3">${choiceBtn('Yes', 1)}${choiceBtn('No', 0)}</div>`;
            return;
        }
        const good = yes >= 3;
        body.innerHTML = `<div class="rounded-2xl ${good ? 'bg-sun-200/60' : 'bg-grape-50'} p-6 sm:p-8">
                <p class="font-display text-2xl font-semibold text-grape-900">${good ? 'You may be a great candidate for ExoMind TMS.' : 'Let’s talk about your options.'}</p>
                <p class="mt-3 text-ink/75">${good
                    ? 'Based on your answers, TMS could be worth exploring. Book a free, no-pressure consultation and we’ll walk you through it.'
                    : 'TMS may or may not be the right fit, but we offer many ways forward. Reach out and we’ll help you find the right next step.'}</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="#get-started" data-service="TMS with ExoMind" class="rounded-full bg-sunrise-500 px-7 py-3.5 font-bold text-white hover:bg-sunrise-600">${good ? 'Book my free consultation' : 'Get started'}</a>
                    <button type="button" data-restart class="rounded-full px-7 py-3.5 font-bold text-grape-700 ring-2 ring-grape-200 hover:ring-grape-500">Retake quiz</button>
                </div>
            </div>`;
        body.querySelector('[data-service]').addEventListener('click', () => fService.value = 'TMS with ExoMind');
    };

    body.addEventListener('click', (ev) => {
        const ans = ev.target.closest('[data-answer]');
        if (ans) { yes += Number(ans.dataset.answer); step++; render(); }
        if (ev.target.closest('[data-restart]')) { step = 0; yes = 0; render(); }
    });

    document.querySelectorAll('[data-open-quiz]').forEach(b => b.addEventListener('click', () => {
        quiz.classList.remove('hidden');
        step = 0; yes = 0; render();
        quiz.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }));
})();
</script>
</body>
</html>
