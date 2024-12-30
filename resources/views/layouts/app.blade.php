<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tournaments</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('internal-head-scripts')
        @stack('internal-head-styles')
    </head>
    <body class="font-sans bg-indigo-50 flex items-center justify-center h-full">
        <main class="bg-white max-w-[500px] w-[50%] p-[24px] rounded-md">
            @yield('content')
        </main>
        @stack('internal-body-scripts')
        @stack('internal-body-styles')
    </body>
</html>
