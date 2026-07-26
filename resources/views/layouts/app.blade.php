<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', $seoSetting?->meta_title ?? 'Green Darma Pharmaceuticals | Leading Healthcare Solutions')</title>
    <meta name="description" content="@yield('meta_description', $seoSetting?->meta_description ?? 'Green Darma Pharmaceuticals - High quality pharmaceutical products and clinical healthcare solutions in Bangladesh.')">
    <meta name="keywords" content="@yield('meta_keywords', $seoSetting?->keywords ?? 'Green Darma, Pharmaceuticals Bangladesh, Medicated Soap, Permethrin, Luliconazole, Probiotic')">
    <link rel="canonical" href="@yield('canonical_url', request()->url())">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=2">

    <!-- OpenGraph & Social Cards -->
    <meta property="og:title" content="@yield('title', $seoSetting?->meta_title ?? 'Green Darma Pharmaceuticals')">
    <meta property="og:description" content="@yield('meta_description', $seoSetting?->meta_description ?? 'Healthcare & Pharmaceutical Platform')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="@yield('og_image', asset($seoSetting?->og_image ?? 'favicon.ico'))">

    <!-- Organization & SearchAction JSON-LD Schema -->
    @php
        $seoService = new \App\Services\SeoService();
        $orgSchema = $seoService->generateOrganizationSchema();
        $searchSchema = $seoService->generateWebsiteSearchSchema();
    @endphp
    <script type="application/ld+json">
        {!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode($searchSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @stack('schema')

    <!-- Fonts & Bootstrap 5 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --gdp-primary: #1b4d3e;
            --gdp-primary-hover: #13382d;
            --gdp-secondary: #2c8562;
            --gdp-accent: #e8f5e9;
            --gdp-bg: #f8fafc;
            --gdp-dark: #0f172a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gdp-bg);
            color: #334155;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Poppins', sans-serif;
        }

        /* Header Navbar */
        .navbar-main {
            background: #ffffff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
            border-bottom: 1px solid #e2e8f0;
        }

        .navbar-brand-logo {
            font-weight: 800;
            font-size: 1.35rem;
            color: var(--gdp-primary);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-link-public {
            font-weight: 600;
            color: #475569;
            padding: 0.6rem 1.1rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link-public:hover, .nav-link-public.active {
            color: var(--gdp-primary);
            background-color: var(--gdp-accent);
        }

        /* Search Autocomplete Dropdown */
        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            z-index: 1050;
            display: none;
            max-height: 380px;
            overflow-y: auto;
            border: 1px solid #e2e8f0;
        }

        .search-result-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #334155;
            transition: background 0.15s;
        }

        .search-result-item:hover {
            background-color: var(--gdp-accent);
            color: var(--gdp-primary);
        }

        /* Product Cards */
        .card-product {
            border: none;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .card-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.08);
        }

        .card-product-img-wrapper {
            height: 210px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 1rem;
        }

        .card-product-img {
            max-height: 180px;
            max-width: 100%;
            object-fit: contain;
        }

        .btn-gdp-primary {
            background-color: var(--gdp-primary);
            color: #ffffff;
            font-weight: 600;
            border: none;
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-gdp-primary:hover {
            background-color: var(--gdp-primary-hover);
            color: #ffffff;
        }

        /* Footer */
        footer {
            background: var(--gdp-dark);
            color: #94a3b8;
            margin-top: auto;
        }

        footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a:hover {
            color: #ffffff;
        }

        .footer-heading {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1.2rem;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Header & Topbar -->
    <header class="sticky-top">
        <!-- Top Bar -->
        <div class="bg-success text-white py-1 fs-8" style="background-color: var(--gdp-primary) !important;">
            <div class="container text-center">
                <i class="bi bi-shield-check me-1"></i> Official Digital Registry | Green Darma Pharmaceuticals
            </div>
        </div>

        <!-- Main Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-main py-2">
            <div class="container">
                <a class="navbar-brand-logo d-flex align-items-center me-4" href="{{ url('/') }}">
                    @if($companySetting?->logo)
                        <img src="{{ asset($companySetting->logo) }}" alt="Green Darma Pharmaceuticals Logo" class="me-2" style="max-height: 44px; width: auto; object-fit: contain;">
                    @else
                        <i class="bi bi-capsule-capsule fs-2 text-success me-2"></i>
                    @endif
                    <span>Green Darma</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPublic">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarPublic">
                    <!-- Nav Links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-public {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-public {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-public {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-public {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="pt-5 pb-3">
        <div class="container">
            <div class="row g-4 pb-4 border-bottom border-secondary">
                <!-- Col 1: Brand Info -->
                <div class="col-12 col-md-4">
                    <div class="navbar-brand-logo text-white d-flex align-items-center mb-3">
                        @if($companySetting?->logo)
                            <img src="{{ asset($companySetting->logo) }}" alt="Green Darma Pharmaceuticals Logo" class="me-2" style="max-height: 44px; width: auto; object-fit: contain;">
                        @else
                            <i class="bi bi-capsule-capsule fs-2 text-success me-2"></i>
                        @endif
                        <span>Green Darma</span>
                    </div>
                    <p class="fs-7 text-slate-400 mb-3">
                        {{ $companySetting->about ?? 'Green Darma Pharmaceuticals is dedicated to developing, manufacturing, and marketing clinical-grade pharmaceutical preparations in Bangladesh.' }}
                    </p>
                    <a href="https://www.facebook.com/share/19HW9S44TA/" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center gap-2 mt-3 pt-2 text-decoration-none opacity-90 hover-opacity">
                        <img src="{{ asset('images/webbuilderstudio-logo.png') }}" alt="WEBbuilder Studio Logo" class="rounded shadow-sm" style="height: 32px; width: auto; object-fit: contain;">
                        <span class="fs-8 text-slate-400 fw-medium">Made by <strong class="text-white">WEBbuilderstudio BD</strong></span>
                    </a>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="col-6 col-md-2">
                    <div class="footer-heading">Quick Links</div>
                    <ul class="list-unstyled fs-7 mb-0">
                        <li class="mb-2"><a href="{{ url('/') }}">Home Page</a></li>
                        <li class="mb-2"><a href="{{ route('products.index') }}">Products Catalog</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}">About Company</a></li>
                        <li class="mb-2"><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li class="mb-2"><a href="{{ route('terms') }}">Terms of Use</a></li>
                        <li class="mb-2"><a href="{{ route('admin.login') }}">Admin Login</a></li>
                    </ul>
                </div>

                <!-- Col 3: Product Portfolio -->
                <div class="col-6 col-md-3">
                    <div class="footer-heading">Featured Products</div>
                    <ul class="list-unstyled fs-7 mb-0">
                        <li class="mb-2"><a href="{{ route('products.show', 'scabicod-soap') }}">Scabicod Soap</a></li>
                        <li class="mb-2"><a href="{{ route('products.show', 'tinea-soap') }}">Tinea Soap</a></li>
                        <li class="mb-2"><a href="{{ route('products.show', 'scabvar-lotion') }}">SCABVAR Lotion</a></li>
                        <li class="mb-2"><a href="{{ route('products.show', 'greenstar-shampoo') }}">Greenstar Shampoo</a></li>
                        <li class="mb-2"><a href="{{ route('products.show', 'x-corel-g-tablet') }}">X-Corel G Tablet</a></li>
                    </ul>
                </div>

                <!-- Col 4: Address Info -->
                <div class="col-12 col-md-3">
                    <div class="footer-heading">Headquarters</div>
                    <div class="fs-7 mb-2"><i class="bi bi-geo-alt-fill text-success me-2"></i> {{ $companySetting->address ?? 'Corporate Head Office, Dhaka, Bangladesh' }}</div>
                </div>
            </div>

            <!-- Copyright Footer Bar -->
            <div class="pt-3 text-center fs-8 text-slate-500">
                {{ $companySetting->footer_text ?? '© 2026 Green Darma Pharmaceuticals. All rights reserved.' }}
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



    @stack('scripts')
</body>
</html>
