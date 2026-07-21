<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Green Darma Pharmaceuticals</title>
    
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
            min-height: 100vh;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
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
        <div class="sidebar-brand d-flex align-items-center">
            <i class="bi bi-capsule-capsule text-success me-2 fs-3"></i>
            <span>Green Darma Admin</span>
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
                <h4 class="mb-0 fw-bold brand-font text-dark">@yield('page-title', 'Dashboard')</h4>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-success btn-sm rounded-pill px-3">
                    <i class="bi bi-globe me-1"></i> View Live Site
                </a>
                <div class="vr mx-1"></div>
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-success-subtle text-success fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        {{ substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div>
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
    @stack('scripts')
</body>
</html>
