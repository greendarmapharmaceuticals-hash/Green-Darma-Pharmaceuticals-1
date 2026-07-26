<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Green Darma Pharmaceuticals</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=2">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --gdp-primary: #1b4d3e;
            --gdp-primary-light: #2c8562;
            --gdp-accent: #e8f5e9;
            --gdp-bg: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gdp-bg);
            color: #334155;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background: #ffffff;
            height: 100vh;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--gdp-primary);
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .menu-header {
            padding: 0.5rem 1.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.5px;
        }

        .nav-link-admin {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #475569;
            font-weight: 500;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.2s ease;
        }

        .nav-link-admin i {
            font-size: 1.25rem;
            margin-right: 0.75rem;
            color: #64748b;
        }

        .nav-link-admin:hover, .nav-link-admin.active {
            background-color: var(--gdp-accent);
            color: var(--gdp-primary);
            border-left-color: var(--gdp-primary);
        }

        .nav-link-admin:hover i, .nav-link-admin.active i {
            color: var(--gdp-primary);
        }

        /* Content Area */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease-in-out;
        }

        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main-content {
            padding: 2rem;
            flex: 1;
        }

        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(2px);
            z-index: 1040;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-backdrop.show {
            display: block;
            opacity: 1;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0 !important;
            }

            .top-navbar {
                padding: 0.75rem 1rem;
            }

            .main-content {
                padding: 1rem;
            }
        }

        /* Card & Button Aesthetics */
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
            background: #ffffff;
        }

        .btn-gdp {
            background-color: var(--gdp-primary);
            color: #ffffff;
            font-weight: 600;
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            border: none;
            transition: all 0.2s;
        }

        .btn-gdp:hover {
            background-color: var(--gdp-primary-light);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-lg-custom {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        .badge-status {
            font-weight: 600;
            padding: 0.4em 0.8em;
            border-radius: 6px;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                @if(isset($companySetting) && $companySetting?->logo)
                    <img src="{{ asset($companySetting->logo) }}" alt="Logo" class="me-2" style="max-height: 38px; width: auto; object-fit: contain;">
                @else
                    <i class="bi bi-capsule-capsule text-success me-2 fs-3"></i>
                @endif
                <span class="fs-6 fw-bold">Green Darma Admin</span>
            </div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-header">Main Menu</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="nav-link-admin {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-prescription2"></i> Products CRUD
            </a>
            <a href="{{ route('admin.categories.index') }}" class="nav-link-admin {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Categories
            </a>
            <a href="{{ route('admin.media.index') }}" class="nav-link-admin {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> Media Library
            </a>
            <a href="{{ route('admin.messages.index') }}" class="nav-link-admin {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i> Contact Messages
                @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                @if($unread > 0)
                    <span class="badge bg-danger rounded-pill ms-auto">{{ $unread }}</span>
                @endif
            </a>

            <div class="menu-header mt-3">Settings & SEO</div>
            <a href="{{ route('admin.company.index') }}" class="nav-link-admin {{ request()->routeIs('admin.company.*') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Company Info
            </a>
            <a href="{{ route('admin.seo.index') }}" class="nav-link-admin {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                <i class="bi bi-search"></i> SEO Settings
            </a>

            <div class="menu-header mt-3">Account</div>
            <a href="{{ route('admin.profile.index') }}" class="nav-link-admin {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-gear"></i> Profile & Security
            </a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link-admin text-danger">
                <i class="bi bi-box-arrow-right text-danger"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <header class="top-navbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-lg-none me-2 border shadow-sm" id="sidebarToggle" type="button" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-4 text-success"></i>
                </button>
                <h4 class="mb-0 fw-bold brand-font text-dark fs-5 fs-md-4">@yield('page-title', 'Dashboard')</h4>
            </div>

            <div class="d-flex align-items-center gap-2 gap-md-3">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-success btn-sm rounded-pill px-2 px-md-3 fs-8 fs-md-7">
                    <i class="bi bi-globe me-1"></i> <span class="d-none d-sm-inline">View Live Site</span><span class="d-sm-none">Live Site</span>
                </a>
                <div class="vr mx-1"></div>
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-success-subtle text-success fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        {{ substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="d-none d-md-block">
                        <div class="fw-bold fs-7 lh-1">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</div>
                        <small class="text-muted fs-8">Super Admin</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="main-content">
            <!-- Toast Notifications -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show card-custom border-0 border-start border-success border-4 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show card-custom border-0 border-start border-danger border-4 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show card-custom mb-4" role="alert">
                    <div class="fw-bold mb-1"><i class="bi bi-x-circle-fill me-1"></i> Please check the form for errors:</div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            let backdrop = document.querySelector('.sidebar-backdrop');

            if (!backdrop) {
                backdrop = document.createElement('div');
                backdrop.className = 'sidebar-backdrop';
                document.body.appendChild(backdrop);
            }

            function openSidebar() {
                sidebar.classList.add('show');
                backdrop.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.remove('show');
                backdrop.classList.remove('show');
                document.body.style.overflow = '';
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function () {
                    if (sidebar.classList.contains('show')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            backdrop.addEventListener('click', closeSidebar);

            const navLinks = sidebar.querySelectorAll('.nav-link-admin');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (window.innerWidth < 992) {
                        closeSidebar();
                    }
                });
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth >= 992) {
                    closeSidebar();
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
