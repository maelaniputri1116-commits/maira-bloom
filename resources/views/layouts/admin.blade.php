
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin MAIRA BLOOM')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #e8c6cd;
            --pink-dark: #bd8995;
            --ivory: #f7f2e9;
            --sage: #a8b8a0;
            --dark: #463d3d;
            --muted: #8c8180;
            --sidebar: 255px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #faf8f6;
            color: var(--dark);
            font-family: 'DM Sans', sans-serif;
        }

        .admin-sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: var(--sidebar);
            background: var(--dark);
            color: white;
            padding: 27px 18px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            font: 600 27px 'Playfair Display', serif;
            color: white;
            text-decoration: none;
            padding: 0 12px;
        }

        .sidebar-brand span { color: var(--pink); }

        .sidebar-caption {
            color: #c9b8b5;
            font-size: 10px;
            letter-spacing: 3px;
            padding: 5px 13px 28px;
        }

        .sidebar-label {
            color: #b8aaa7;
            font-size: 10px;
            letter-spacing: 2px;
            padding: 12px 13px;
            text-transform: uppercase;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            margin: 3px 0;
            border-radius: 9px;
            color: #eee5e2;
            text-decoration: none;
            font-size: 13px;
            transition: .2s;
        }

        .sidebar-link i { font-size: 17px; }

        .sidebar-link:hover,
        .sidebar-link.active {
            color: var(--dark);
            background: var(--pink);
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #665b59;
            padding-top: 17px;
        }

        .admin-main {
            margin-left: var(--sidebar);
            min-height: 100vh;
        }

        .admin-topbar {
            height: 76px;
            background: white;
            border-bottom: 1px solid #eee8e4;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 34px;
        }

        .admin-content { padding: 32px 34px 45px; }

        .page-heading {
            font: 600 32px 'Playfair Display', serif;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 13px;
        }

        .stat-card {
            background: white;
            border: 1px solid #f0eae6;
            border-radius: 15px;
            padding: 22px;
            height: 100%;
            box-shadow: 0 5px 18px rgba(70,61,61,.035);
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 20px;
            background: var(--ivory);
            color: var(--dark);
        }

        .stat-number {
            font: 600 31px 'Playfair Display', serif;
            margin-top: 13px;
        }

        .admin-panel {
            background: white;
            border: 1px solid #f0eae6;
            border-radius: 15px;
            padding: 23px;
            box-shadow: 0 5px 18px rgba(70,61,61,.035);
        }

        .btn-maira {
            background: var(--dark);
            color: white;
            border: 0;
            border-radius: 8px;
            padding: 10px 17px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-maira:hover {
            background: var(--pink-dark);
            color: white;
        }

        .btn-soft {
            background: var(--ivory);
            color: var(--dark);
            border: 1px solid #eee4dc;
            border-radius: 8px;
        }

        .table thead th {
            background: #faf6f2;
            color: #776b68;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .7px;
            padding: 14px 12px;
            border-bottom: 1px solid #eee8e4;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 12px;
            vertical-align: middle;
            font-size: 13px;
        }

        .product-thumb {
            width: 54px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
        }

        .form-control, .form-select {
            border-color: #e9e1dc;
            border-radius: 8px;
            padding: 11px 12px;
            font-size: 13px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--pink-dark);
            box-shadow: 0 0 0 .2rem rgba(189,137,149,.13);
        }

        .mobile-menu { display: none; }

        @media (max-width: 900px) {
            .admin-sidebar {
                width: 72px;
                padding: 22px 10px;
            }

            .sidebar-brand {
                font-size: 0;
                padding: 0;
                text-align: center;
            }

            .sidebar-brand:first-letter { font-size: 24px; }
            .sidebar-caption, .sidebar-label, .sidebar-link span,
            .sidebar-bottom .sidebar-link span { display: none; }

            .sidebar-link {
                justify-content: center;
                padding: 13px 5px;
            }

            .admin-main { margin-left: 72px; }
            .admin-content { padding: 23px 17px; }
            .admin-topbar { padding: 0 18px; }
        }

        @media (max-width: 575px) {
            .page-heading { font-size: 26px; }
            .admin-topbar { height: 65px; }
            .admin-content { padding: 20px 12px; }
            .admin-panel { padding: 15px; }
        }
    </style>

    @stack('styles')
</head>
<body>

<aside class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        MAIRA <span>BLOOM</span>
    </a>
    <div class="sidebar-caption">FLORIST ADMINISTRATION</div>

    <div class="sidebar-label">MAIN MENU</div>

    <a href="{{ route('admin.dashboard') }}"
       class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2"></i><span>Dashboard</span>
    </a>

    <a href="{{ route('admin.produk.index') }}"
       class="sidebar-link {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
        <i class="bi bi-flower1"></i><span>Kelola Produk</span>
    </a>

    <a href="{{ route('admin.kategori.index') }}"
       class="sidebar-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i><span>Kelola Kategori</span>
    </a>

    <div class="sidebar-bottom">
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
            <i class="bi bi-globe"></i><span>Lihat Website</span>
        </a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link w-100 border-0 bg-transparent text-start">
                <i class="bi bi-box-arrow-left"></i><span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<div class="admin-main">
    <header class="admin-topbar">
        <div>
            <span class="fw-semibold">Admin Panel</span>
            <span class="text-muted small ms-2">/ @yield('breadcrumb', 'Dashboard')</span>
        </div>

        <div class="d-flex align-items-center gap-2">
            <div class="text-end d-none d-sm-block">
                <div class="small fw-semibold">{{ auth()->user()->name }}</div>
                <div class="text-muted" style="font-size:11px;">Administrator</div>
            </div>
            <div class="rounded-circle d-grid place-items-center"
                 style="width:38px;height:38px;background:#e8c6cd;color:#463d3d;place-items:center;">
                <i class="bi bi-person-fill"></i>
            </div>
        </div>
    </header>

    <main class="admin-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
