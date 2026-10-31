<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($page_title) ?></title>
    <meta name="description" content="<?= e($page_description) ?>">
<?php if (!empty($page_noindex)): ?>
    <meta name="robots" content="noindex">
<?php endif; ?>
    <link rel="icon" href="assets/img/logo.webp">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght,SOFT@9..144,500..800,50&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Pulled from the Thrive logo
                        grape: { 50: '#F6F0FD', 100: '#EBDDFB', 200: '#D5B8F6', 400: '#9F5BE6', 500: '#8231D9', 600: '#7020C4', 700: '#5A16A0', 800: '#43107A', 900: '#2A0A4D' },
                        sunrise: { 100: '#FFEBD3', 300: '#FDBA6B', 400: '#F99E38', 500: '#F28A1C', 600: '#D97008' },
                        sun: { 200: '#FFE89A', 300: '#FFD84D', 400: '#FFC61A' },
                        ink: '#1E1230',
                        cream: '#FFF9F1',
                    },
                    fontFamily: {
                        display: ['Fraunces', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        soft: '0 10px 40px -12px rgba(42, 10, 77, 0.18)',
                        lift: '0 24px 60px -18px rgba(42, 10, 77, 0.35)',
                    },
                },
            },
        };
    </script>
    <style>
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.is-visible { opacity: 1; transform: none; }
        @media (prefers-reduced-motion: reduce) {
            .reveal { opacity: 1; transform: none; transition: none; }
            html { scroll-behavior: auto; }
        }
        details > summary::-webkit-details-marker { display: none; }
        details[open] .faq-icon { transform: rotate(45deg); }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; left: 1rem; right: 1rem; bottom: .35rem; height: 2px; border-radius: 2px; background: #F28A1C; transform: scaleX(0); transform-origin: left; transition: transform .25s ease; }
        .nav-link:hover::after, .nav-link[aria-current="true"]::after { transform: scaleX(1); }
        .nav-link[aria-current="true"] { color: #5A16A0; }
        #site-header.is-scrolled { box-shadow: 0 8px 30px -12px rgba(42, 10, 77, .25); border-color: #EBDDFB; }
        .hdr-inner, .hdr-logo { transition: padding .3s ease, height .3s ease; }
        #site-header.is-scrolled .hdr-inner { padding-top: .5rem; padding-bottom: .5rem; }
        #site-header.is-scrolled .hdr-logo { height: 3rem; }
        [data-mega].is-dismissed .mega-panel { visibility: hidden !important; opacity: 0 !important; }
        .sunburst { background: radial-gradient(circle at 50% 100%, #FFC61A 0 22%, transparent 22.5%), repeating-conic-gradient(from -90deg at 50% 100%, #F99E38 0 6deg, transparent 6deg 18deg); }
    </style>
</head>
