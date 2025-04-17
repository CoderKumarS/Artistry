<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Artistry - Online Art Gallery">
    <meta name="keywords" content="Art, Gallery, Online, Artists, Community">
    <meta name="author" content="Artistry Team">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Artistry') }} - @yield('title', 'Online Art Gallery')</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body class="font-sans antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a]">
    <div class="relative flex min-h-screen flex-col" id="app">
        @include('layouts.navigation')

        <main class="flex-1" id="main-content">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    @stack('scripts')
</body>
<script>
    (function() {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    })();
</script>

</html>
