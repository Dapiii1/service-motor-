
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') | MotoCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #101d35;
            --navy-light: #1b2b49;
            --blue: #3478f6;
            --cyan: #19c3c8;
            --bg: #f4f7fb;
            --text: #26354b;
            --muted: #8793a6;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
            margin: 0;
        }

        .sidebar {
            width: 255px;
            min-height: 100vh;
            background: var(--navy);
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 18px;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
            color: white;
        }

        .brand-icon {
            background: linear-gradient(135deg, #3478f6, #19c3c8);
            width: 42px;
            height: 42px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 22px;
        }

        .brand h5 {
            margin: 0;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .brand small {
            color: #aab8cf;
            font-size: 10px;
        }

        .menu-title {
            color: #8495b2;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 18px 12px 10px;
        }

        .sidebar .nav-link {
            color: #b7c4d8;
            padding: 13px 14px;
            border-radius: 10px;
            margin: 4px 0;
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 13px;
            font-weight: 500;
            transition: .2s;
        }

        .sidebar .nav-link i {
            font-size: 18px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: linear-gradient(90deg, #3478f6, #2865d9);
            box-shadow: 0 5px 15px #3478f644;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 25px;
            left: 22px;
            right: 22px;
            color: #aab8cf;
            font-size: 11px;
            border-top: 1px solid #ffffff20;
            padding-top: 17px;
        }

        .main {
            margin-left: 255px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            height: 76px;
            padding: 0 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #edf0f5;
        }

        .topbar h6 {
            margin: 0;
            font-weight: 700;
        }

        .user-avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            background: #e8f0ff;
            color: var(--blue);
            display: grid;
            place-items: center;
            font-weight: 800;
        }

        .content {
            padding: 32px 35px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 7px;
            color: var(--navy);
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 13px;
        }

        .panel {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 17px;
            padding: 24px;
            box-shadow: 0 5px 22px #1b2b4908;
        }

        .stat-card {
            border: 1px solid #edf0f5;
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 5px 20px #1b2b4908;
            height: 100%;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            font-size: 21px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            margin: 15px 0 3px;
            color: var(--navy);
        }

        .stat-label {
            font-size: 12px;
            color: var(--muted);
        }

        .btn-primary {
            background: var(--blue);
            border-color: var(--blue);
            border-radius: 9px;
            padding: 10px 17px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #225fdb;
        }

        .btn {
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
        }

        .form-control, .form-select {
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            padding: 11px 13px;
            font-size: 13px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px #3478f61a;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #34445c;
        }

        .table {
            font-size: 12px;
            vertical-align: middle;
        }

        .table thead th {
            background: #f6f8fc;
            color: #65748b;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 15px 12px;
            border-bottom: 1px solid #e9edf4;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 12px;
            border-color: #f0f2f6;
        }

        .table tbody tr:hover {
            background: #f8faff;
        }

        .alert {
            border-radius: 12px;
            font-size: 13px;
        }

        .empty-state {
            text-align: center;
            padding: 45px 15px;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 42px;
            display: block;
            margin-bottom: 12px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination .page-link {
            font-size: 12px;
            border-radius: 7px;
            margin: 0 3px;
            color: var(--blue);
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .brand {
                padding: 5px 6px 25px;
            }

            .brand h5, .brand small,
            .sidebar .nav-link span,
            .menu-title, .sidebar-footer {
                display: none;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 13px 5px;
            }

            .sidebar .nav-link i {
                font-size: 21px;
            }

            .main {
                margin-left: 75px;
            }

            .content {
                padding: 20px 12px;
            }

            .topbar {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-wrench-adjustable"></i>
        </div>

        <div>
            <h5>MOTOCARE</h5>
            <small>Service Management</small>
        </div>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav>
        <a href="{{ url('/dashboard') }}"
           class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('crud.index','pelanggan') }}"
           class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            <span>Data Pelanggan</span>
        </a>

        <a href="{{ route('crud.index','kendaraan') }}"
           class="nav-link {{ request()->is('kendaraan*') ? 'active' : '' }}">
            <i class="bi bi-bicycle"></i>
            <span>Data Kendaraan</span>
        </a>

        <a href="{{ route('crud.index','daftar-service') }}"
           class="nav-link {{ request()->is('daftar-service*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check-fill"></i>
            <span>Daftar Service</span>
        </a>

        <a href="{{ route('crud.index','data-service') }}"
           class="nav-link {{ request()->is('data-service*') ? 'active' : '' }}">
            <i class="bi bi-gear-wide-connected"></i>
            <span>Data Service</span>
        </a>

        <a href="{{ route('crud.index','pembayaran') }}"
           class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}">
            <i class="bi bi-wallet2"></i>
            <span>Pembayaran</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <i class="bi bi-shield-check"></i>
        MotoCare Management System
        <br>© {{ date('Y') }} All Rights Reserved
    </div>

</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h6>Service Motor Management</h6>
            <small class="text-secondary" style="font-size:11px">
                Kelola bengkel lebih mudah dan cepat
            </small>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="text-end d-none d-sm-block">
                <div style="font-size:12px;font-weight:700">Administrator</div>
                <small class="text-secondary" style="font-size:10px">Admin</small>
            </div>
            <div class="user-avatar">A</div>
        </div>
    </header>

    <section class="content">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong><i class="bi bi-exclamation-circle me-2"></i>
                    Periksa kembali data:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
