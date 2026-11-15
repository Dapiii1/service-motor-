
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') | MotoCare</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        /* =====================================
           MOTOCARE GLOBAL THEME
        ===================================== */

        :root {
            --navy: #101E39;
            --navy-light: #1B3158;
            --blue: #3478F6;
            --blue-dark: #2457CB;
            --cyan: #13C5C8;
            --bg: #EDF3FC;
            --white: #ffffff;
            --text: #25344b;
            --muted: #8290a5;
            --border: #e6edf7;
            --green: #20b477;
            --orange: #f5a623;
            --purple: #8875F7;
            --red: #ef5350;
        }

        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-size: 15px;
        }


        /* =====================================
           SIDEBAR PREMIUM
        ===================================== */

        .sidebar {
            width: 265px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;

            display: flex;
            flex-direction: column;

            padding: 25px 14px;

            background:
                radial-gradient(
                    circle at 10% 5%,
                    rgba(52,120,246,.32),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 100% 75%,
                    rgba(19,197,200,.10),
                    transparent 35%
                ),
                linear-gradient(
                    160deg,
                    #1B3158 0%,
                    #101E39 55%,
                    #080F20 100%
                );

            border-right: 1px solid rgba(255,255,255,.09);

            box-shadow:
                8px 0 35px rgba(16,30,57,.20);

            overflow: hidden;
        }


        /* LOGO BRAND */

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 5px 7px 25px;
            margin-bottom: 12px;

            color: white;

            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;

            display: grid;
            place-items: center;

            border-radius: 14px;

            background: linear-gradient(
                135deg,
                #3478F6,
                #13C5C8
            );

            font-size: 23px;

            box-shadow:
                0 0 20px rgba(52,120,246,.45),
                0 8px 22px rgba(19,197,200,.18);

            transition: .35s;
        }

        .brand-icon:hover {
            transform: rotate(-10deg) scale(1.08);
        }

        .brand h5 {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .brand small {
            color: #aab8cf;
            font-size: 11px;
        }


        /* MENU TITLE */

        .menu-title {
            color: #829BC1;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.8px;
            margin: 15px 10px 18px;
        }

        .menu-title::after {
            content: "";
            display: inline-block;
            width: 24px;
            height: 1px;
            background: rgba(255,255,255,.25);
            margin-left: 8px;
            vertical-align: middle;
        }


        /* NAVIGATION */

        .sidebar nav {
            position: relative;
            z-index: 2;
        }

        .sidebar .nav-link {
            position: relative;

            display: flex;
            align-items: center;
            gap: 13px;

            min-height: 48px;
            padding: 13px 13px;

            margin-bottom: 9px;

            color: #B7C7DF;

            font-size: 13px;
            font-weight: 600;

            border-radius: 12px;
            border: 1px solid transparent;

            text-decoration: none;

            transition: all .3s ease;
        }

        .sidebar .nav-link i {
            width: 23px;
            flex-shrink: 0;

            font-size: 19px;
            text-align: center;

            transition: .3s;
        }


        /* WARNA IKON SETIAP MENU */

        .sidebar nav .nav-link:nth-of-type(1) i {
            color: #8CB5FF;
        }

        .sidebar nav .nav-link:nth-of-type(2) i {
            color: #65D9D2;
        }

        .sidebar nav .nav-link:nth-of-type(3) i {
            color: #91C8FF;
        }

        .sidebar nav .nav-link:nth-of-type(4) i {
            color: #FFBF72;
        }

        .sidebar nav .nav-link:nth-of-type(5) i {
            color: #B8A5FF;
        }

        .sidebar nav .nav-link:nth-of-type(6) i {
            color: #6EE5A5;
        }


        /* HOVER EFFECT */

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.12);

            color: white;

            transform: translateX(5px);

            box-shadow:
                0 5px 15px rgba(0,0,0,.12);
        }

        .sidebar .nav-link:hover i {
            color: white;
            transform: scale(1.13);
        }


        /* ACTIVE MENU */

        .sidebar .nav-link.active {
            background: linear-gradient(
                110deg,
                #3478F6,
                #2056C8
            );

            color: white;

            border: 1px solid rgba(255,255,255,.18);

            box-shadow:
                0 7px 22px rgba(52,120,246,.40),
                inset 0 1px 0 rgba(255,255,255,.20);

            transform: translateX(3px);
        }

        .sidebar .nav-link.active i {
            color: white !important;
        }

        .sidebar .nav-link.active::after {
            content: "";

            position: absolute;
            right: 0;
            top: 10px;
            bottom: 10px;

            width: 3px;

            border-radius: 5px 0 0 5px;

            background: white;
        }


        /* SIDEBAR FOOTER */

        .sidebar-footer {
            position: relative;
            z-index: 2;

            margin-top: auto;

            color: #91A5C5;

            font-size: 10px;

            border-top: 1px solid rgba(255,255,255,.13);

            padding: 18px 5px 0;

            line-height: 1.9;
        }

        .sidebar-footer i {
            color: #6FA2FF;
        }


        /* =====================================
           MAIN CONTENT
        ===================================== */

        .main {
            margin-left: 265px;
            min-height: 100vh;
        }


        /* TOPBAR */

        .topbar {
            min-height: 85px;

            padding: 15px 38px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: rgba(255,255,255,.94);

            border-bottom: 1px solid var(--border);

            position: sticky;
            top: 0;
            z-index: 900;

            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            box-shadow:
                0 3px 18px rgba(16,30,57,.035);
        }

        .topbar h6 {
            margin: 0;
            font-size: 17px;
            font-weight: 800;
            color: var(--navy);
        }

        .topbar small {
            font-size: 12px;
            color: var(--muted);
        }


        /* ADMIN AVATAR */

        .user-avatar {
            width: 44px;
            height: 44px;

            border-radius: 50%;

            display: grid;
            place-items: center;

            background: linear-gradient(
                135deg,
                #E8F0FF,
                #DCEAFF
            );

            color: var(--blue);

            font-size: 17px;
            font-weight: 800;

            border: 1px solid #DCE8FF;

            box-shadow: 0 4px 12px rgba(52,120,246,.10);
        }


        /* CONTENT BACKGROUND */

        .content {
            padding: 38px;
            min-height: calc(100vh - 85px);

            background:
                radial-gradient(
                    circle at 92% 0%,
                    rgba(52,120,246,.13),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 4% 88%,
                    rgba(19,197,200,.07),
                    transparent 27%
                ),
                linear-gradient(
                    135deg,
                    #EDF3FC,
                    #F6F8FF
                );
        }


        /* =====================================
           PAGE TITLE
        ===================================== */

        .page-title {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -.7px;
            color: var(--navy);
            margin-bottom: 7px;
        }

        .page-subtitle {
            font-size: 15px;
            color: #71839E;
            line-height: 1.7;
        }


        /* =====================================
           PANELS
        ===================================== */

        .panel {
            position: relative;
            overflow: hidden;

            background: rgba(255,255,255,.96);

            border: 1px solid #DCE7F5;
            border-radius: 20px;

            padding: 28px;

            box-shadow:
                0 10px 30px rgba(16,30,57,.055);

            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .panel:hover {
            box-shadow:
                0 15px 38px rgba(16,30,57,.09);
        }

        .panel-accent {
            height: 4px;

            position: absolute;
            top: 0;
            left: 0;

            width: 100%;

            background: linear-gradient(
                90deg,
                #101E39,
                #3478F6,
                #13C5C8
            );
        }


        /* =====================================
           STATISTICS CARD
        ===================================== */

        .stat-card {
            position: relative;
            overflow: hidden;

            height: 100%;

            background: linear-gradient(
                145deg,
                #FFFFFF,
                #F0F5FF
            );

            border: 1px solid #DCE8F8;
            border-radius: 19px;

            padding: 25px;

            box-shadow:
                0 8px 25px rgba(16,30,57,.055);

            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .stat-card::after {
            content: "";

            position: absolute;

            width: 115px;
            height: 115px;

            right: -38px;
            top: -43px;

            border-radius: 50%;

            background: rgba(52,120,246,.055);

            pointer-events: none;
        }

        .stat-card:hover {
            transform: translateY(-6px);

            box-shadow:
                0 15px 32px rgba(52,120,246,.13);
        }

        .stat-icon {
            width: 53px;
            height: 53px;

            display: grid;
            place-items: center;

            border-radius: 15px;

            font-size: 24px;

            box-shadow:
                0 6px 17px rgba(52,120,246,.22);
        }

        .stat-number {
            font-size: 34px;
            font-weight: 800;

            margin: 16px 0 5px;

            color: var(--navy);
        }

        .stat-label {
            font-size: 14px;
            color: var(--muted);
            font-weight: 600;
        }


        /* =====================================
           TABLE
        ===================================== */

        .table {
            font-size: 14px;
            vertical-align: middle;
            margin-bottom: 0;
        }

        .table thead th {
            background: #EAF1FC;
            color: #344D73;

            font-size: 12px;
            font-weight: 800;

            letter-spacing: .6px;
            text-transform: uppercase;

            padding: 18px 15px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;
        }

        .table tbody td {
            font-size: 14px;
            padding: 18px 15px;

            border-color: #edf1f7;

            font-weight: 500;
        }

        .table tbody tr {
            transition: .2s;
        }

        .table tbody tr:nth-child(even) {
            background: #F9FBFF;
        }

        .table tbody tr:hover {
            background: #EDF5FF;
        }


        /* =====================================
           BUTTONS
        ===================================== */

        .btn {
            font-size: 14px;
            padding: 11px 17px;

            border-radius: 10px;
            font-weight: 700;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .btn-primary {
            background: linear-gradient(
                115deg,
                #3478F6,
                #2457CB
            );

            border: none;

            box-shadow:
                0 6px 17px rgba(52,120,246,.23);
        }

        .btn-primary:hover {
            background: linear-gradient(
                115deg,
                #2868E8,
                #1D4EBB
            );

            transform: translateY(-2px);

            box-shadow:
                0 10px 23px rgba(52,120,246,.32);
        }

        .btn-outline-primary,
        .btn-outline-danger {
            padding: 9px 12px;
        }

        .btn-light {
            background: #F3F6FB;
            border: 1px solid var(--border);
        }


        /* =====================================
           FORMS CRUD
        ===================================== */

        .form-label {
            font-size: 14px;
            font-weight: 700;
            color: #34445c;
            margin-bottom: 9px;
        }

        .form-control,
        .form-select {
            font-size: 15px;

            padding: 13px 15px;

            border: 1px solid #DCE6F4;
            border-radius: 11px;

            min-height: 48px;

            background: #F9FBFF;
            color: #172B4D;
        }

        textarea.form-control {
            min-height: 110px;
        }

        .form-control:focus,
        .form-select:focus {
            background: white;
            border-color: #3478F6;

            box-shadow:
                0 0 0 4px rgba(52,120,246,.12);
        }

        .form-control::placeholder {
            color: #a3adbc;
            font-size: 14px;
        }


        /* =====================================
           BADGES
        ===================================== */

        .badge {
            font-size: 12px;
            font-weight: 700;
            padding: 8px 12px;
            border-radius: 20px;
            letter-spacing: .1px;
        }


        /* =====================================
           SEARCH
        ===================================== */

        #searchTable {
            font-size: 14px;
            width: 270px !important;

            padding: 12px 15px 12px 40px !important;

            border-radius: 10px;
        }


        /* =====================================
           ALERT
        ===================================== */

        .alert {
            font-size: 14px;
            padding: 16px 20px;
            border-radius: 13px;
        }


        /* =====================================
           PAGINATION
        ===================================== */

        .pagination {
            margin: 0;
            gap: 3px;
        }

        .pagination .page-link {
            font-size: 13px;
            padding: 9px 14px;

            border-radius: 8px;

            border-color: #DFE8F5;
            color: var(--blue);
        }

        .pagination .active .page-link {
            background: var(--blue);
            border-color: var(--blue);
            color: white;
        }


        /* =====================================
           EMPTY STATE
        ===================================== */

        .empty-state {
            text-align: center;
            padding: 55px 20px;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 55px;
            display: block;
            margin-bottom: 15px;
            color: #a9b9d1;
        }


        /* =====================================
           SCROLLBAR
        ===================================== */

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #EDF3FC;
        }

        ::-webkit-scrollbar-thumb {
            background: #A8BDDC;
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #3478F6;
        }


        /* =====================================
           ANIMATION
        ===================================== */

        @keyframes motoFadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .panel,
        .stat-card {
            animation: motoFadeUp .4s ease both;
        }


        /* =====================================
           RESPONSIVE
        ===================================== */

        @media(max-width: 768px) {

            .sidebar {
                width: 78px;
                padding: 20px 9px;
            }

            .brand {
                justify-content: center;
                padding: 5px 0 30px;
            }

            .brand h5,
            .brand small,
            .sidebar .nav-link span,
            .menu-title,
            .sidebar-footer {
                display: none;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 14px 5px;
            }

            .sidebar .nav-link i {
                font-size: 22px;
            }

            .sidebar .nav-link:hover {
                transform: none;
            }

            .main {
                margin-left: 78px;
            }

            .topbar {
                padding: 15px;
            }

            .content {
                padding: 22px 14px;
            }

            .page-title {
                font-size: 25px;
            }

            .panel {
                padding: 18px;
            }

            .table {
                min-width: 650px;
            }

            #searchTable {
                width: 100% !important;
            }
        }


        /* =====================================
           REDUCED MOTION
        ===================================== */

        @media(prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
                scroll-behavior: auto !important;
            }
        }

    </style>

</head>

<body>

    <!-- =====================================
         SIDEBAR
    ====================================== -->

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


        <div class="menu-title">
            MENU UTAMA
        </div>


        <nav>

            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>

            </a>


            <!-- PELANGGAN -->

            <a href="{{ route('crud.index','pelanggan') }}"
               class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}">

                <i class="bi bi-people-fill"></i>
                <span>Data Pelanggan</span>

            </a>


            <!-- KENDARAAN -->

            <a href="{{ route('crud.index','kendaraan') }}"
               class="nav-link {{ request()->is('kendaraan*') ? 'active' : '' }}">

                <i class="bi bi-bicycle"></i>
                <span>Data Kendaraan</span>

            </a>


            <!-- DAFTAR SERVICE -->

            <a href="{{ route('crud.index','daftar-service') }}"
               class="nav-link {{ request()->is('daftar-service*') ? 'active' : '' }}">

                <i class="bi bi-clipboard-check-fill"></i>
                <span>Daftar Service</span>

            </a>


            <!-- DATA SERVICE -->

            <a href="{{ route('crud.index','data-service') }}"
               class="nav-link {{ request()->is('data-service*') ? 'active' : '' }}">

                <i class="bi bi-gear-wide-connected"></i>
                <span>Data Service</span>

            </a>


            <!-- PEMBAYARAN -->

            <a href="{{ route('crud.index','pembayaran') }}"
               class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}">

                <i class="bi bi-wallet2"></i>
                <span>Pembayaran</span>

            </a>

        </nav>


        <!-- FOOTER SIDEBAR -->

        <div class="sidebar-footer">

            <i class="bi bi-shield-check"></i>

            MotoCare Management System

            <br>

            © {{ date('Y') }} All Rights Reserved

        </div>

    </aside>


    <!-- =====================================
         MAIN CONTENT
    ====================================== -->

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">

            <div>

                <h6>Service Motor Management</h6>

                <small>
                    Kelola bengkel lebih mudah dan cepat
                </small>

            </div>


            <div class="d-flex align-items-center gap-3">

                <div class="text-end d-none d-sm-block">

                    <div style="font-size:14px;font-weight:700">
                        Administrator
                    </div>

                    <small>Admin</small>

                </div>

                <div class="user-avatar">
                    A
                </div>

            </div>

        </header>


        <!-- PAGE CONTENT -->

        <section class="content">


            <!-- SUCCESS NOTIFICATION -->

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            <!-- ERROR NOTIFICATION -->

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="bi bi-exclamation-circle me-2"></i>
                        Periksa kembali data:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- DYNAMIC CONTENT -->

            @yield('content')


        </section>

    </main>


    <!-- BOOTSTRAP JAVASCRIPT -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
