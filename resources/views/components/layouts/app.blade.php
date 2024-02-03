<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    <wireui:scripts/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-200 text-slate-700">
<livewire:layout.navigation/>
<div class="mx-auto max-w-6xl">
    <div class="bg-white bg-opacity-50 px-2 pt-4 pb-6 md:px-4">
        {{ $slot }}
    </div>
    <x-footer/>
</div>
</body>
</html>
