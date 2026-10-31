<?php
/**
 * Opening <body> and simple site header for inner pages. Requires head.php first.
 */
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
