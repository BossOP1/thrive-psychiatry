<?php
/**
 * Cookie consent banner. Included once per page, just before </body>.
 *
 * The site itself sets no tracking cookies. Third-party embeds that do (the Google Map) are written as
 * <iframe data-consent-src="..."> and only load after the visitor accepts. To add analytics later, wrap it in
 * window.thriveConsent.onAccept(() => { ...load script... }) so it also waits for consent.
 *
 * The choice is kept in localStorage ("thrive-cookie-consent": "accepted" | "declined").
 * Any element with [data-cookie-settings] reopens the banner.
 */
?>
<div id="cookie-banner" role="dialog" aria-live="polite" aria-label="Cookie consent" hidden class="fixed inset-x-3 bottom-[5.5rem] z-[60] mx-auto max-w-3xl rounded-3xl bg-white p-5 shadow-lift ring-1 ring-grape-100 sm:inset-x-6 sm:p-6 lg:bottom-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:gap-6">
        <div class="flex-1">
            <p class="font-display text-lg font-semibold text-grape-900">We value your privacy</p>
            <p class="mt-1 text-sm leading-relaxed text-ink/70">We use cookies that keep this site working. With your OK, we'll also load an embedded Google Map, which may set its own cookies. See our <a href="/privacy#cookies" class="font-bold text-grape-600 underline decoration-sunrise-400 underline-offset-2">Privacy Policy</a>.</p>
        </div>
        <div class="flex shrink-0 gap-2">
            <button type="button" data-cookie-choice="declined" class="flex-1 rounded-full px-5 py-2.5 text-sm font-bold text-grape-700 ring-1 ring-grape-200 transition hover:bg-grape-50 sm:flex-none">Decline</button>
            <button type="button" data-cookie-choice="accepted" class="flex-1 rounded-full bg-grape-600 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-grape-700 sm:flex-none">Accept</button>
        </div>
    </div>
</div>

<script>
(() => {
    const KEY = 'thrive-cookie-consent';
    const banner = document.getElementById('cookie-banner');
    const read = () => { try { return localStorage.getItem(KEY); } catch (e) { return null; } };
    const write = (v) => { try { localStorage.setItem(KEY, v); } catch (e) { /* storage blocked: choice lasts this page only */ } };
    const waiting = [];
    let choice = read();

    // Third-party embeds wait for consent; a placeholder offers to load them
    const loadEmbeds = () => document.querySelectorAll('iframe[data-consent-src]').forEach((f) => {
        if (!f.src) f.src = f.dataset.consentSrc;
        const ph = f.parentElement.querySelector('[data-consent-placeholder]');
        if (ph) ph.remove();
        f.hidden = false;
    });

    const apply = () => {
        if (choice === 'accepted') {
            loadEmbeds();
            waiting.splice(0).forEach((fn) => fn());
        }
    };

    window.thriveConsent = {
        get: () => choice,
        onAccept: (fn) => (choice === 'accepted' ? fn() : waiting.push(fn)),
    };

    document.querySelectorAll('[data-cookie-choice]').forEach((b) => b.addEventListener('click', () => {
        choice = b.dataset.cookieChoice;
        write(choice);
        banner.hidden = true;
        apply();
    }));
    document.querySelectorAll('[data-cookie-settings]').forEach((b) => b.addEventListener('click', (ev) => {
        ev.preventDefault();
        banner.hidden = false;
    }));

    if (choice) apply(); else banner.hidden = false;
})();
</script>
