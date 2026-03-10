<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('messages.meta.default_title'))</title>
    <meta name="description" content="@yield('description', __('messages.meta.default_description'))" />
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon_io/favicon.ico') }}" />
    <meta name="theme-color" content="#2d5016" />
    <meta name="msapplication-TileColor" content="#2d5016" />
    
    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}?v={{ config('app.asset_version', '1') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ config('app.asset_version', '1') }}" />
    
    {{-- Preload critical banner images for current page --}}
    @if(request()->routeIs('home'))
        <link rel="preload" as="image" href="{{ asset('assets/banners/home.png') }}" />
    @elseif(request()->routeIs('products.*'))
        <link rel="preload" as="image" href="{{ asset('assets/banners/products.png') }}" />
    @elseif(request()->routeIs('contact'))
        <link rel="preload" as="image" href="{{ asset('assets/banners/contact.png') }}" />
    @elseif(request()->routeIs('company.about'))
        <link rel="preload" as="image" href="{{ asset('assets/banners/about.png') }}" />
    @elseif(request()->routeIs('company.sustainability'))
        <link rel="preload" as="image" href="{{ asset('assets/banners/sustainability-policy.png') }}" />
    @elseif(request()->routeIs('company.sustainability.cert-report'))
        <link rel="preload" as="image" href="{{ asset('assets/banners/sustainability-cert-report.jpeg') }}" />
    @endif
    
    @stack('styles')
    @stack('preload')
</head>
<body class="page">
    <header>
        <div class="container">
            <nav class="nav">
                <a href="{{ route('home') }}" class="brand">
                    <img src="{{ asset('assets/logo_crc.png') }}" alt="Cisadane Raya Chemical Logo" />
                </a>
                <button
                    class="nav-toggle"
                    type="button"
                    aria-label="Toggle navigation"
                    data-nav-toggle
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="nav-links" data-nav-links>
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('messages.nav.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('company.about') }}" class="{{ request()->routeIs('company.about') ? 'active' : '' }}">{{ __('messages.nav.our_commitment') }}</a>
                    </li>
                    <li class="nav-dropdown nav-dropdown-only">
                        <button
                            type="button"
                            class="nav-dropdown-trigger {{ request()->routeIs('company.sustainability') || request()->routeIs('company.sustainability.cert-report') ? 'active' : '' }}"
                            aria-expanded="false"
                            aria-haspopup="true"
                            aria-label="{{ __('messages.nav.sustainability_aria') }}"
                        >
                            {{ __('messages.nav.sustainability') }}
                            <span class="nav-dropdown-caret" aria-hidden="true">▼</span>
                        </button>
                        <ul class="nav-dropdown-menu">
                            <li>
                                <a href="{{ route('company.sustainability') }}">{{ __('messages.nav.sustainability_policy') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('company.sustainability.cert-report') }}">{{ __('messages.nav.cert_report') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">{{ __('messages.nav.products') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('messages.nav.contact_us') }}</a>
                    </li>
                    <li class="nav-lang-switcher">
                        <a href="{{ route('locale.switch', ['locale' => 'en']) }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}" hreflang="en">EN</a>
                        <span aria-hidden="true">|</span>
                        <a href="{{ route('locale.switch', ['locale' => 'id']) }}" class="{{ app()->getLocale() === 'id' ? 'active' : '' }}" hreflang="id">ID</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid footer-grid-two">
                <div>
                    <div class="brand">
                        <img src="{{ asset('assets/logo_crc.png') }}" alt="Cisadane Raya Chemical Logo" style="height: 40px;" />
                    </div>
                    <p class="footer-text">
                        {{ __('messages.footer.tagline') }}
                    </p>
                </div>
                <div class="footer-links-right">
                    <h3 class="footer-heading">{{ __('messages.footer.quick_links') }}</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('company.about') }}">{{ __('messages.footer.about_us') }}</a></li>
                        <li><a href="{{ route('products.index') }}">{{ __('messages.footer.products') }}</a></li>
                        <li><a href="{{ route('contact') }}">{{ __('messages.footer.contact') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ __('messages.footer.copyright', ['year' => date('Y')]) }}</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}?v={{ config('app.asset_version', '1') }}"></script>
    @stack('scripts')
    @stack('modals')
</body>
</html>
