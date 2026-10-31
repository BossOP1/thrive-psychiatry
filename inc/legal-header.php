<?php
/**
 * Opening layout for legal pages. Set $page_title, $page_description, $legal_title
 * and $legal_updated before requiring this, then output the page body and
 * require legal-footer.php.
 */
require __DIR__ . '/head.php';
require __DIR__ . '/page-header.php';
?>

<main id="main" class="py-16 lg:py-24">
    <div class="mx-auto max-w-3xl px-4 sm:px-6">
        <p class="font-bold uppercase tracking-widest text-sunrise-600">Legal</p>
        <h1 class="mt-3 font-display text-4xl font-semibold tracking-tight text-grape-900 sm:text-5xl"><?= e($legal_title) ?></h1>
        <p class="mt-4 text-ink/55">Last updated <?= e($legal_updated) ?></p>

        <article class="mt-12 rounded-[2rem] bg-white p-7 text-lg leading-relaxed text-ink/75 shadow-soft ring-1 ring-grape-100 sm:p-12 [&_a]:font-bold [&_a]:text-grape-700 [&_a]:underline [&_a]:decoration-sunrise-400 [&_a]:underline-offset-2 [&_h2]:mt-12 [&_h2]:font-display [&_h2]:text-2xl [&_h2]:font-semibold [&_h2]:text-grape-900 first:[&_h2]:mt-0 [&_li]:mt-2 [&_p]:mt-4 [&_strong]:text-grape-900 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:pl-6">
