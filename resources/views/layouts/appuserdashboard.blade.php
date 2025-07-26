<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Asden Perú')</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/svg+xml" media="(prefers-color-scheme:dark)" href="/favicon-dark.svg">

    <style>
        body {
            display: none;
        }
    </style>
    @if (env('APP_ENV') === 'local')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <link rel="stylesheet" href="{{ asset('build/assets/app-s0AMyXtl.css') 
    }}">
    <script src="{{ asset('build/assets/app-B7YmdWv4.js') }}" defer>
    </script>
    @endif
</head>

<body>
    <!-- Navbar Global -->
    <x-navbaruser />
    <main class="mt-16">
        @yield('userdashboard')
    </main>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('token');
        const role = localStorage.getItem('role')
        const verified = localStorage.getItem('verified');

        if (!token) {
            window.location.href = "/login";
        } else if (token) {
            document.body.style.display = "block";
        }
    });
</script>


</html>