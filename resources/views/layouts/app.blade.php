<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="Borgo Fantino affitta residenze e alloggi in montagna.">
    <meta name="keywords" content="case in affitto, affitti brevi, montagna, Borgo Fanitno">
    <meta name="author" content="Emanuele Macera">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph (Facebook & LinkedIn) -->
    <meta property="og:title" content="@yield('title') - {{ config('app.name') }}">
    <meta property="og:description" content="Borgo Fantino affitta residenze e alloggi in montagna.">
    <meta property="og:image" content="{{ asset('assets/logo/logo.WebP') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') - {{ config('app.name') }}">
    <meta name="twitter:description" content="Borgo Fantino affitta residenze e alloggi in montagna.">
    <meta name="twitter:image" content="{{ asset('assets/logo/logo.WebP') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/logo/phone-logo.WebP') }}" type="image/webp">
    <link rel="apple-touch-icon" href="{{ asset('assets/logo/phone-logo.WebP') }}">

    <!-- Vite -->
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ])

    <!-- CSS -->
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ route('css.common') }}?v={{ optional($style->updated_at)->timestamp }}">
    <link rel="stylesheet" href="{{ route('css.custom') }}?v={{ config('app.version') }}">
    
    <!-- JavaScript (defer/async per migliori prestazioni) -->
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Google Analytics -->

    <!-- ShinyStat (Asincrono per evitare rallentamenti) -->

    <!-- CookieYes Banner -->

</head>
<body>
    <div>
        @include('layouts.partials.navbar')
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
