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

    <!-- CSS di Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Altri stili -->
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ route('css.common') }}?v={{ optional($style->updated_at)->timestamp }}">
    <link rel="stylesheet" href="{{ route('css.custom') }}?v={{ config('app.version') }}">

</head>
<body>
    <div>
        @include('layouts.partials.navbar')
        @yield('app-content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
