<?php
/**
 * Opening layout for legal pages. Set $page_title, $page_description, $legal_title
 * and $legal_updated before requiring this, then output the page body and
 * require legal-footer.php.
 */
require __DIR__ . '/head.php';
?>
<body class="bg-cream font-sans text-ink antialiased">

<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2">Skip to content</a>

<header class="border-b border-grape-100 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-3 sm:px-6">
        <a href="/" class="flex shrink-0 items-center" aria-label="Thrive Psychiatry & Wellness home">
            <img src="assets/img/logo-tight.webp" alt="Thrive Psychiatry & Wellness" class="h-14 w-auto sm:h-[60px]" width="478" height="392">
        </a>
        <div class="flex items-center gap-2 sm:gap-3">
            <a href="/" class="hidden rounded-full px-4 py-2.5 font-medium text-ink/80 transition hover:text-grape-700 sm:inline-flex">Back to Home</a>
            <a href="/#get-started" class="group inline-flex items-center gap-2 rounded-full bg-sunrise-500 px-6 py-3 font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-sunrise-600">
                Get Started <?= icon('arrow', 'h-4 w-4 transition group-hover:translate-x-0.5') ?>
            </a>
        </div>
    </div>
</header>

<main id="main" class="py-16 lg:py-24">
    <div class="mx-auto max-w-3xl px-4 sm:px-6">
        <p class="font-bold uppercase tracking-widest text-sunrise-600">Legal</p>
        <h1 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl"><?= e($legal_title) ?></h1>
        <p class="mt-4 text-ink/55">Last updated <?= e($legal_updated) ?></p>

        <article class="mt-12 rounded-[2rem] bg-white p-7 text-lg leading-relaxed text-ink/75 shadow-soft ring-1 ring-grape-100 sm:p-12 [&_a]:font-bold [&_a]:text-grape-700 [&_a]:underline [&_a]:decoration-sunrise-400 [&_a]:underline-offset-2 [&_h2]:mt-12 [&_h2]:font-display [&_h2]:text-2xl [&_h2]:font-semibold [&_h2]:text-grape-900 first:[&_h2]:mt-0 [&_li]:mt-2 [&_p]:mt-4 [&_strong]:text-grape-900 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:pl-6">
