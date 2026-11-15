
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
/* =========================================
   MOTOCARE DASHBOARD - MODERN BLUE THEME
========================================= */

.mc-dashboard {
    --navy: #101E39;
    --blue: #246BFD;
    --cyan: #16C8D8;
    --soft-bg: #edf3ff;
    color: var(--navy);
}

/* BACKGROUND */

.mc-dashboard {
    position: relative;
    isolation: isolate;
}

.mc-dashboard::before {
    content: "";
    position: absolute;
    width: 350px;
    height: 350px;
    top: -100px;
    right: -70px;
    background: radial-gradient(circle, rgba(36,107,253,.13), transparent 70%);
    z-index: -1;
    pointer-events: none;
}

/* HEADER */

.mc-dashboard .page-title {
    font-size: 30px;
    font-weight: 800;
    color: var(--navy);
    letter-spacing: -1px;
}

.mc-dashboard .page-subtitle {
    color: #7b8ba8;
    font-size: 14px;
    margin-top: 5px;
}

/* STAT CARD */

.mc-dashboard .stat-card {
    position: relative;
    overflow: hidden;
    background: linear-gradient(145deg, #ffffff, #f0f5ff);
    border: 1px solid #dce7fb;
    border-radius: 20px;
    padding: 23px;
    min-height: 148px;
    box-shadow: 0 7px 22px rgba(16,30,57,.055);
    transition: all .35s ease;
}

.mc-dashboard .stat-card::before {
    content: "";
    position: absolute;
    width: 125px;
    height: 125px;
    top: -65px;
    right: -35px;
    border-radius: 50%;
    background: rgba(36,107,253,.06);
    transition: .4s;
}

.mc-dashboard .stat-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 16px 30px rgba(36,107,253,.15);
    border-color: #a9c6ff;
}

.mc-dashboard .stat-card:hover::before {
    transform: scale(1.6);
}

.mc-dashboard .stat-icon {
    width: 46px;
    height: 46px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 15px;
    font-size: 21px;
    margin-bottom: 15px;
    box-shadow: 0 5px 13px rgba(36,107,253,.12);
}

.mc-dashboard .stat-number {
    font-size: 29px;
    font-weight: 800;
    color: var(--navy);
    line-height: 1.2;
}

.mc-dashboard .stat-label {
    font-size: 13px;
    font-weight: 600;
    color: #8291aa;
    margin-top: 5px;
}

.mc-dashboard .stat-arrow {
    position: absolute;
    right: 20px;
    bottom: 20px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e8f0ff;
    color: var(--blue);
    transition: .3s;
}

.mc-dashboard .stat-card:hover .stat-arrow {
    background: var(--blue);
    color: white;
    transform: translateX(4px);
}

/* PANEL */

.mc-dashboard .panel {
    position: relative;
    overflow: hidden;
    background: rgba(255,255,255,.94);
    border: 1px solid #dce7f8;
    border-radius: 20px;
    padding: 23px;
    box-shadow: 0 8px 25px rgba(16,30,57,.055);
    transition: .3s;
}

.mc-dashboard .panel:hover {
    box-shadow: 0 12px 28px rgba(16,30,57,.09);
}

.mc-dashboard .panel-accent {
    position: absolute;
    height: 4px;
    top: 0;
    left: 0;
    right: 0;
    background: linear-gradient(90deg, var(--navy), var(--blue), var(--cyan));
}

.mc-dashboard .panel h5,
.mc-dashboard .panel h6 {
    color: var(--navy);
}

/* WELCOME PANEL */

.mc-dashboard .welcome-panel {
    background:
        radial-gradient(circle at 95% 15%, rgba(36,107,253,.13), transparent 35%),
        linear-gradient(135deg, #ffffff 30%, #edf4ff 100%);
    min-height: 220px;
}

.mc-dashboard .welcome-icon {
    width: 45px;
    height: 45px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--navy), var(--blue));
    color: white;
    font-size: 21px;
    margin-right: 10px;
    box-shadow: 0 6px 15px rgba(36,107,253,.25);
}

.mc-dashboard .welcome-decoration {
    position: absolute;
    right: 25px;
    bottom: -25px;
    font-size: 125px;
    color: rgba(36,107,253,.08);
    transform: rotate(-15deg);
    pointer-events: none;
}

/* BUTTON */

.mc-dashboard .btn-primary {
    background: linear-gradient(120deg, var(--navy), var(--blue));
    border: none;
    border-radius: 10px;
    padding: 10px 17px;
    font-size: 13px;
    font-weight: 600;
    box-shadow: 0 5px 13px rgba(36,107,253,.2);
    transition: .3s;
}

.mc-dashboard .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 9px 20px rgba(36,107,253,.35);
    background: linear-gradient(120deg, var(--blue), #4b8aff);
}

.mc-dashboard .btn-outline-primary {
    border: 1px solid var(--blue);
    color: var(--blue);
    border-radius: 10px;
    padding: 10px 17px;
    font-size: 13px;
    font-weight: 600;
    transition: .3s;
}

.mc-dashboard .btn-outline-primary:hover {
    background: var(--blue);
    color: white;
    transform: translateY(-3px);
}

/* QUICK MENU */

.mc-dashboard .quick-link {
    display: block;
    padding: 13px 15px;
    background: #f1f5fc;
    border: 1px solid #e5ecf7;
    border-radius: 12px;
    color: var(--navy);
    text-decoration: none;
    font-size: 13px;
    font-weight: 650;
    transition: .3s;
}

.mc-dashboard .quick-link:hover {
    background: linear-gradient(100deg, #e5edff, #f2f7ff);
    border-color: #b9d0ff;
    color: var(--blue);
    transform: translateX(5px);
}

.mc-dashboard .quick-link .arrow {
    float: right;
    transition: .3s;
}

.mc-dashboard .quick-link:hover .arrow {
    transform: translateX(5px);
}

/* TABLE */

.mc-dashboard .table {
    margin-bottom: 0;
    vertical-align: middle;
}

.mc-dashboard .table thead th {
    background: #eaf1ff;
    color: #405779;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .5px;
    padding: 15px 12px;
    border: none;
    white-space: nowrap;
}

.mc-dashboard .table tbody td {
    padding: 17px 12px;
    font-size: 13px;
    border-bottom: 1px solid #edf1f7;
    color: #34445f;
}

.mc-dashboard .table tbody tr {
    transition: .2s;
}

.mc-dashboard .table tbody tr:hover {
    background: #f4f7ff;
}

.mc-dashboard .plate-badge {
    background: linear-gradient(120deg, var(--navy), var(--blue));
    color: white;
    border-radius: 20px;
    padding: 6px 11px;
    font-size: 11px;
    font-weight: 700;
}

.mc-dashboard .btn-see-all {
    background: #edf3ff;
    color: var(--navy);
    border: 1px solid #e0eaff;
    border-radius: 10px;
    padding: 9px 15px;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: .3s;
}

.mc-dashboard .btn-see-all:hover {
    background: var(--navy);
    color: white;
}

/* EMPTY STATE */

.mc-dashboard .empty-state {
    text-align: center;
    padding: 35px 15px;
}

.mc-dashboard .empty-state i {
    font-size: 40px;
    color: #9eb8e8;
}

.mc-dashboard .empty-state p {
    color: #8795aa;
    font-size: 13px;
}

/* ANIMATION */

@keyframes mcFadeUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.mc-dashboard .animate-card {
    animation: mcFadeUp .6s ease both;
}

.mc-dashboard .delay-1 { animation-delay: .1s; }
.mc-dashboard .delay-2 { animation-delay: .2s; }
.mc-dashboard .delay-3 { animation-delay: .3s; }
.mc-dashboard .delay-4 { animation-delay: .4s; }

/* RESPONSIVE */

@media(max-width:768px) {
    .mc-dashboard .page-title {
        font-size: 25px;
    }

    .mc-dashboard .panel {
        padding: 18px;
    }

    .mc-dashboard .stat-card {
        padding: 18px;
    }

    .mc-dashboard .welcome-decoration {
        font-size: 85px;
        right: 10px;
    }
}

@media(prefers-reduced-motion: reduce) {
    .mc-dashboard *,
    .mc-dashboard *::before,
    .mc-dashboard *::after {
        animation: none !important;
        transition: none !important;
    }
}
</style>


<div class="mc-dashboard">

    {{-- HEADER --}}

    <div class="mb-4 animate-card">

        <div class="page-title">
            <i class="bi bi-speedometer2 me-2"
               style="color:#246BFD"></i>
            Dashboard
        </div>

        <div class="page-subtitle">
            Selamat datang di MotoCare.
            Berikut ringkasan aktivitas bengkel kamu.
        </div>

    </div>


    {{-- STATISTIK --}}

    <div class="row g-4 mb-4">

        <div class="col-xl-3 col-sm-6">
            <div class="stat-card animate-card">

                <div class="stat-icon"
                     style="background:#e5efff;color:#246BFD">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div class="stat-number">
                    {{ $totalPelanggan }}
                </div>

                <div class="stat-label">
                    Total Pelanggan
                </div>

                <div class="stat-arrow">
                    <i class="bi bi-arrow-right"></i>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-sm-6">
            <div class="stat-card animate-card delay-1">

                <div class="stat-icon"
                     style="background:#dcf9fa;color:#0caaa9">
                    <i class="bi bi-bicycle"></i>
                </div>

                <div class="stat-number">
                    {{ $totalKendaraan }}
                </div>

                <div class="stat-label">
                    Total Kendaraan
                </div>

                <div class="stat-arrow"
                     style="background:#dcf9fa;color:#0caaa9">
                    <i class="bi bi-arrow-right"></i>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-sm-6">
            <div class="stat-card animate-card delay-2">

                <div class="stat-icon"
                     style="background:#fff0dc;color:#ed9b2e">
                    <i class="bi bi-gear-wide-connected"></i>
                </div>

                <div class="stat-number">
                    {{ $totalService }}
                </div>

                <div class="stat-label">
                    Total Service
                </div>

                <div class="stat-arrow"
                     style="background:#fff0dc;color:#ed9b2e">
                    <i class="bi bi-arrow-right"></i>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-sm-6">
            <div class="stat-card animate-card delay-3">

                <div class="stat-icon"
                     style="background:#eee7ff;color:#8251dc">
                    <i class="bi bi-wallet2"></i>
                </div>

                <div class="stat-number">
                    {{ $totalPembayaran }}
                </div>

                <div class="stat-label">
                    Total Pembayaran
                </div>

                <div class="stat-arrow"
                     style="background:#eee7ff;color:#8251dc">
                    <i class="bi bi-arrow-right"></i>
                </div>

            </div>
        </div>

    </div>


    {{-- WELCOME DAN MENU CEPAT --}}

    <div class="row g-4 mb-4">

        <div class="col-lg-8">

            <div class="panel welcome-panel h-100 animate-card">

                <div class="panel-accent"></div>

                <div class="welcome-decoration">
                    <i class="bi bi-tools"></i>
                </div>

                <div class="position-relative" style="z-index:2">

                    <h5 class="fw-bold mb-3 d-flex align-items-center">

                        <span class="welcome-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </span>

                        Selamat Datang di MotoCare!

                    </h5>

                    <p class="text-secondary mb-4"
                       style="font-size:14px;line-height:1.8;max-width:650px">

                        MotoCare adalah sistem informasi pelayanan
                        bengkel motor yang membantu mengelola data
                        pelanggan, kendaraan, pendaftaran service,
                        mekanik, dan pembayaran dalam satu aplikasi.

                    </p>

                    <div class="d-flex flex-wrap gap-2">

                        <a href="{{ route('crud.create','pelanggan') }}"
                           class="btn btn-primary">

                            <i class="bi bi-person-plus-fill me-2"></i>
                            Tambah Pelanggan

                        </a>

                        <a href="{{ route('crud.create','daftar-service') }}"
                           class="btn btn-outline-primary">

                            <i class="bi bi-clipboard-plus me-2"></i>
                            Daftarkan Service

                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- MENU CEPAT --}}

        <div class="col-lg-4">

            <div class="panel h-100 animate-card delay-1">

                <div class="panel-accent"></div>

                <h6 class="fw-bold mb-4">

                    <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                    Menu Cepat

                </h6>

                <div class="d-grid gap-3">

                    <a href="{{ route('crud.index','pelanggan') }}"
                       class="quick-link">

                        <i class="bi bi-people-fill text-primary me-2"></i>
                        Kelola Pelanggan

                        <i class="bi bi-arrow-right arrow"></i>

                    </a>


                    <a href="{{ route('crud.index','kendaraan') }}"
                       class="quick-link">

                        <i class="bi bi-bicycle text-info me-2"></i>
                        Kelola Kendaraan

                        <i class="bi bi-arrow-right arrow"></i>

                    </a>


                    <a href="{{ route('crud.index','pembayaran') }}"
                       class="quick-link">

                        <i class="bi bi-wallet2 text-success me-2"></i>
                        Kelola Pembayaran

                        <i class="bi bi-arrow-right arrow"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- SERVICE TERBARU --}}

    <div class="panel animate-card delay-2">

        <div class="panel-accent"></div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h5 class="fw-bold mb-1">

                    <i class="bi bi-list-columns-reverse me-2"
                       style="color:#246BFD"></i>

                    Service Terbaru

                </h5>

                <small class="text-secondary">
                    Lima pendaftaran service terakhir
                </small>

            </div>


            <a href="{{ route('crud.index','daftar-service') }}"
               class="btn-see-all">

                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>

            </a>

        </div>


        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>PELANGGAN</th>
                        <th>PLAT KENDARAAN</th>
                        <th>KELUHAN</th>
                        <th>TANGGAL SERVICE</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($serviceTerbaru as $service)

                        <tr>

                            <td class="fw-bold">
                                #{{ $service->id }}
                            </td>


                            <td class="fw-semibold">
                                {{ $service->pelanggan->nama_lengkap ?? '-' }}
                            </td>


                            <td>

                                <span class="plate-badge">
                                    {{ $service->kendaraan->no_plat ?? '-' }}
                                </span>

                            </td>


                            <td>
                                {{ $service->keluhan }}
                            </td>


                            <td class="fw-semibold">

                                <i class="bi bi-calendar3 me-1"
                                   style="color:#246BFD"></i>

                                {{ \Carbon\Carbon::parse($service->tanggal_service)->format('d/m/Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty-state">

                                    <i class="bi bi-clipboard-x"></i>

                                    <h5 class="fw-bold text-dark mt-2">
                                        Belum Ada Service
                                    </h5>

                                    <p>
                                        Data service akan muncul di sini.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
