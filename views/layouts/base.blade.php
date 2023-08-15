@php
    $colorMap = [
        'red' => '#ab3225',
        'blue' => '#0063cf',
        'green' => '#00af0e',
        'purple' => '#7d00d5',
        'orange' => '#ca8400',
        'yellow' => '#c1bb00',
        'aqua' => '#00d2d5',
        'pink' => '#dd00b1',
    ];

    $theme = theme_config('color', 'aqua');
    $themeColor = $colorMap[$theme] ?? $theme;
@endphp
<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="{{ $themeColor }}">
    <meta name="author" content="Azuriom">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ theme_asset('js/clipboard.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-tilt/dist/vanilla-tilt.min.js" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ theme_asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
    @include('elements.theme-color', ['color' => $themeColor])
</head>

<body data-bs-theme="dark">
<div id="app">
    @yield('app')
</div>

<footer class="mt-auto">
    @include('elements.footer')
</footer>

@stack('footer-scripts')

</body>
</html>
