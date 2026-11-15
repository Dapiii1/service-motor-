
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">
    <div class="page-title">Dashboard</div>
    <div class="page-subtitle">
        Selamat datang di sistem manajemen bengkel MotoCare.
        Berikut ringkasan data bengkel kamu.
    </div>
</div>

<div class="row g-3 mb-4">

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:#e8f0ff;color:#3478f6">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-number">{{ $totalPelanggan }}</div>
            <div class="stat-label">Total Pelanggan</div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:#e1f8f7;color:#0caaa9">
                <i class="bi bi-bicycle"></i>
            </div>
            <div class="stat-number">{{ $totalKendaraan }}</div>
            <div class="stat-label">Total Kendaraan</div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fff2df;color:#ed9b2e">
                <i class="bi bi-gear-wide-connected"></i>
            </div>
            <div class="stat-number">{{ $totalService }}</div>
            <div class="stat-label">Total Service</div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:#e7f8ed;color:#23a45b">
                <i class="bi bi-wallet2"></i>
            </div>
            <div class="stat-number">{{ $totalPembayaran }}</div>
            <div class="stat-label">Total Pembayaran</div>
        </div>
    </div>

</div>

<div class="panel mb-4">

    <h5 class="fw-bold mb-2">Selamat Datang di MotoCare!</h5>

    <p class="text-secondary small mb-3">
        Sistem informasi pelayanan bengkel motor untuk mengelola
        pelanggan, kendaraan, service, mekanik, dan pembayaran
        dalam satu aplikasi.
    </p>

    <div class="d-flex flex-wrap gap-2">

        <a href="{{ route('crud.create','pelanggan') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Pelanggan
        </a>

        <a href="{{ route('crud.create','daftar-service') }}"
           class="btn btn-outline-primary">
            <i class="bi bi-clipboard-plus me-1"></i>
            Daftarkan Service
        </a>

    </div>

</div>

<div class="panel">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h6 class="fw-bold mb-1">Service Terbaru</h6>
            <small class="text-secondary">Riwayat pendaftaran service</small>
        </div>

        <a href="{{ route('crud.index','daftar-service') }}"
           class="btn btn-light">
            Lihat Semua <i class="bi bi-arrow-right"></i>
        </a>
    </div>

    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Kendaraan</th>
                    <th>Keluhan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @forelse($serviceTerbaru as $service)
                    <tr>
                        <td>#{{ $service->id }}</td>

                        <td class="fw-semibold">
                            {{ $service->pelanggan->nama_lengkap ?? '-' }}
                        </td>

                        <td>
                            {{ $service->kendaraan->no_plat ?? '-' }}
                        </td>

                        <td>
                            {{ $service->keluhan }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($service->tanggal_service)->format('d/m/Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="bi bi-clipboard-x"></i>
                                Belum ada data service.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection
