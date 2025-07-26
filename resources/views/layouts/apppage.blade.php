<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Asden Perú')</title>
    <meta name="description" content="@yield('description', 'Asociación sin fines de lucro dedicada a contribuir al desarrollo Socioeconómico y ambiental en el Perú')">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/svg+xml" media="(prefers-color-scheme:dark)" href="/favicon-dark.svg">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <meta property="og:url" content="https://asdenperu.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Asden Perú - Asociación para el desarrollo socioeconómico">
    <meta property="og:description" content="Asociación sin fines de lucro dedicada a contribuir al desarrollo Socioeconómico y ambiental en el Perú">
    <meta property="og:image" content="https://asdenperu.com/Logo.png">
    <meta property="og:locale" content="es_PE">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="asdenperu.com">
    <meta property="twitter:url" content="https://asdenperu.com">
    <meta name="twitter:title" content="Asden Perú - Asociación para el desarrollo socioeconómico">
    <meta name="twitter:description" content="Asociación sin fines de lucro dedicada a contribuir al desarrollo Socioeconómico y ambiental en el Perú">
    <meta name="twitter:image" content="https://asdenperu.com/Logo.png">

    <meta name="google-site-verification" content="IAgdjmaaEPvboK3c2h1Ao7kwUOVftg_jmiMxD0nfahU" />

    @if (env('APP_ENV') === 'local')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <link rel="stylesheet" href="{{ asset('build/assets/app-s0AMyXtl.css') 
    }}">
    <script src="{{ asset('build/assets/app-B7YmdWv4.js') }}" defer>
    </script>
    @endif

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1/lite-youtube.min.js"></script>
</head>

<body x-data class="antialiased">
    <!-- Navbar Global -->
    <x-navbar />
    <div id="donate-colab" class="fixed bottom-0 left-0 right-0 z-50 flex flex-col md:flex-none">
        <a href="{{ route('collaborate') }}"
            class="w-full md:w-auto text-center text-xs md:text-base bg-red-800 text-white hover:text-red-800 hover:bg-red-100 uppercase tracking-widest py-3 px-5 z-50 transition-colors
                md:fixed md:left-0 md:top-1/2 rotate-0 md:-rotate-90 md:-ml-16">
            Donar Ahora
        </a>
        <a href="{{ route('subscriptions') }}"
            class="w-full md:w-auto text-center text-xs md:text-base bg-[#1474B3] text-white hover:bg-[#e2f2fc] hover:text-[#1474B3] uppercase tracking-widest py-3 px-5 z-50 transition-colors
                md:fixed md:right-0 md:top-1/4 rotate-0 md:-rotate-90 md:-mr-14">
            Hazte Socio
        </a>
    </div>
    <!-- Contenido de la página -->
    <main class="pt-10">
        @yield('content')
    </main>


    <!-- Footer Global -->
    <x-footer />
    <x-modal.modal id="miModal" />

</body>

</html>
<script>
    const sideButtons = document.getElementById('donate-colab')
    const actualPath = window.location.pathname
    if (actualPath === "/collaborate" || actualPath === "/subscriptions") {
        sideButtons.classList.add('hidden')
    }
</script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .lite-youtube-fallback {
        aspect-ratio: 16 / 9;
        /* matches YouTube player */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 1em;
        padding: 1em;
        background-color: #000;
        color: #fff;
        text-decoration: none;
    }

    /* right-facing triangle "Play" icon */
    .lite-youtube-fallback::before {
        display: block;
        content: '';
        border: solid transparent;
        border-width: 2em 0 2em 3em;
        border-left-color: red;
    }

    .lite-youtube-fallback:hover::before {
        border-left-color: #fff;
    }

    .lite-youtube-fallback:focus {
        outline: 2px solid red;
    }
</style>