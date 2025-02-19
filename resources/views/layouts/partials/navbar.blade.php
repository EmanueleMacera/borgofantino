<!-- Navbar Blade Template -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <div class="d-flex flex-nowrap align-items-center">

            <!-- Mobile Admin Sidebar Hamburger -->
            @auth
                <button id="sidebarToggle" class="button-toggle me-2">
                    <i class="fa fa-bars"></i>
                </button>
            @endauth

            <a class="navbar-brand" href="{{ url('/') }}">
                <picture>
                    <source media="(max-width: 767px)" srcset="{{ asset('assets/logo/phone-logo.WebP') }}">
                    <img src="{{ asset('assets/logo/logo.WebP') }}" alt="{{ __('general.website_name') }}">
                </picture>
            </a>
        </div>

        <button class="button-toggle" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('general.toggle_navigation') }}">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(isset($style->navbar_links) && is_array($style->navbar_links))
                    @foreach ($style->navbar_links as $linkData)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $linkData['link'] }}">{{ __($linkData['name']) }}</a>
                        </li>
                    @endforeach
                @endif

                <!-- Language Switcher -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img class="flag" src="{{ asset('assets/flags/' . app()->getLocale() . '.WebP') }}" alt="{{ app()->getLocale() }}">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        @foreach (config('app.available_locales') as $locale => $language)
                            <li>
                                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['lang' => $locale]) }}">
                                    <img class="flag" src="{{ asset('assets/flags/' . $locale . '.WebP') }}" alt="{{ $language }}">
                                    {{ $language }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Authenticated User Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ __('general.admin_area') }}</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link">{{ __('general.logout') }}</button>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
