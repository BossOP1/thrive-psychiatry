<?php
/**
 * Crisis line notice shown in every footer. Insurers require crisis outreach info
 * on the site; the full list lives on /crisis.
 */
$crisis_link = 'font-bold text-white underline decoration-sunrise-400 underline-offset-2';
?>
        <!-- Crisis -->
        <div class="flex flex-col gap-3 rounded-2xl bg-white/5 px-5 py-4 text-sm leading-relaxed sm:flex-row sm:items-start sm:justify-between">
            <p class="flex items-start gap-3">
                <span class="mt-0.5 text-sunrise-400"><?= icon('heart', 'h-5 w-5') ?></span>
                <span><strong class="text-white">In crisis?</strong> Call or text <a href="tel:988" class="<?= $crisis_link ?>">988</a>, AZ Crisis Line <a href="tel:18445344673" class="<?= $crisis_link ?>">1-844-534-4673</a>, SW WA Crisis Line <a href="tel:18006268137" class="<?= $crisis_link ?>">1-800-626-8137</a>, or 911.</span>
            </p>
            <a href="/crisis" class="inline-flex shrink-0 items-center gap-1.5 pl-8 font-bold text-sun-300 hover:text-white sm:pl-0">All crisis resources <?= icon('arrow', 'h-4 w-4') ?></a>
        </div>
