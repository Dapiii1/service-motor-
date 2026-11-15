
@extends('layouts.app')

@section('title', $config['title'])

@section('content')

<style>
/* =========================================
   MOTОCARE - PREMIUM DATA MANAGEMENT
   NAVY BLUE + ELECTRIC BLUE + CYAN
========================================= */

.index-page {
    animation: pageEnter .5s ease;
}

@keyframes pageEnter {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* PAGE HEADER */

.data-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 18px;
    margin-bottom: 25px;
}

.data-heading-left {
    display: flex;
    align-items: center;
    gap: 13px;
}

.data-heading-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: linear-gradient(135deg,#3478F6,#13C5C8);
    color: white;
    font-size: 21px;
    box-shadow: 0 6px 16px rgba(52,120,246,.25);
}

.data-heading .page-title {
    color: #101E39;
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 5px;
}

.data-heading .page-subtitle {
    color: #8290a5;
    font-size: 13px;
}

.btn-add-data {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 12px 19px;
    border: none;
    border-radius: 11px;
    background: linear-gradient(110deg,#3478F6,#2457CB);
    color: white;
    text-decoration: none;
    font-size: 13px;
    font-weight: 750;
    box-shadow: 0 6px 16px rgba(52,120,246,.23);
    transition: .3s;
}

.btn-add-data:hover {
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 22px rgba(52,120,246,.32);
}

/* MAIN CARD */

.data-card {
    position: relative;
    overflow: hidden;
    background: white;
    border: 1px solid #e1eafa;
    border-radius: 19px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(16,30,57,.06);
    transition: .3s;
}

.data-card:hover {
    box-shadow: 0 15px 35px rgba(16,30,57,.09);
}

.data-card-accent {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(
        90deg,
        #101E39,
        #3478F6,
        #13C5C8
    );
}

/* CARD HEADER */

.data-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 17px;
    margin-bottom: 23px;
}

.data-card-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.data-card-title-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #eaf1ff;
    color: #3478F6;
    font-size: 19px;
}

.data-card-title h5 {
    color: #101E39;
    font-size: 16px;
    font-weight: 800;
    margin-bottom: 5px;
}

.data-card-title small {
    color: #8290a5;
    font-size: 12px;
}

/* SEARCH */

.data-search {
    position: relative;
    width: 260px;
}

.data-search i {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    color: #8290a5;
    pointer-events: none;
}

.data-search input {
    width: 100%;
    height: 43px;
    padding: 10px 14px 10px 39px;
    border: 1px solid #dfe8f5;
    border-radius: 10px;
    background: #f8faff;
    color: #263b5b;
    font-size: 12px;
    transition: .25s;
}

.data-search input:focus {
    outline: none;
    border-color: #3478F6;
    background: white;
    box-shadow: 0 0 0 4px rgba(52,120,246,.11);
}

/* TABLE */

.data-table {
    min-width: 700px;
    margin-bottom: 0;
    vertical-align: middle;
}

.data-table thead th {
    padding: 16px 13px;
    background: #eaf1fc;
    color: #344d73;
    border: none;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .5px;
    text-transform: uppercase;
    white-space: nowrap;
}

.data-table thead th:first-child {
    border-radius: 9px 0 0 9px;
}

.data-table thead th:last-child {
    border-radius: 0 9px 9px 0;
}

.data-table tbody td {
    padding: 16px 13px;
    color: #26374e;
    font-size: 13px;
    border-bottom: 1px solid #edf1f7;
}

.data-table tbody tr {
    transition: .2s;
}

.data-table tbody tr:nth-child(even) {
    background: #fafcff;
}

.data-table tbody tr:hover {
    background: #edf5ff;
}

.data-table tbody tr:last-child td {
    border-bottom: none;
}

.data-number {
    color: #8290a5 !important;
    font-weight: 750;
}

/* BADGES */

.data-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 12px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 750;
    white-space: nowrap;
}

.badge-blue {
    background: #e8f0ff;
    color: #2868dc;
}

.badge-green {
    background: #e3f8ed;
    color: #16965b;
}

.badge-cyan {
    background: #e0f8f8;
    color: #079a9c;
}

.badge-orange {
    background: #fff1df;
    color: #d8891e;
}

/* ACTION */

.action-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-action {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: white;
    font-size: 14px;
    transition: .25s;
}

.btn-edit {
    color: #3478F6;
    border: 1px solid #3478F6;
}

.btn-edit:hover {
    color: white;
    background: #3478F6;
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(52,120,246,.2);
}

.btn-delete {
    color: #ef5350;
    border: 1px solid #ef5350;
    cursor: pointer;
}

.btn-delete:hover {
    color: white;
    background: #ef5350;
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(239,83,80,.2);
}

/* EMPTY STATE */

.data-empty {
    padding: 50px 20px;
    text-align: center;
}

.data-empty-icon {
    width: 76px;
    height: 76px;
    margin: 0 auto 17px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 23px;
    background: linear-gradient(135deg,#eaf2ff,#e1f9fa);
    color: #3478F6;
    font-size: 33px;
}

.data-empty h5 {
    color: #101E39;
    font-weight: 800;
    font-size: 17px;
}

.data-empty p {
    color: #8290a5;
    font-size: 13px;
}

/* FOOTER */

.data-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 23px;
    padding-top: 19px;
    border-top: 1px solid #edf1f7;
}

.data-footer small {
    color: #8290a5;
    font-size: 12px;
}

.data-footer .pagination {
    margin: 0;
    gap: 4px;
}

.data-footer .page-link {
    border: 1px solid #e1e9f5;
    border-radius: 8px;
    padding: 8px 12px;
    background: #f8faff;
    color: #3478F6;
    font-size: 12px;
}

.data-footer .page-item.active .page-link {
    background: #3478F6;
    border-color: #3478F6;
    color: white;
}

.data-footer .page-item.disabled .page-link {
    color: #aab6c6;
}

.search-empty {
    display: none;
    padding: 30px;
    text-align: center;
    color: #8290a5;
    font-size: 13px;
}

.search-empty i {
    display: block;
    margin-bottom: 10px;
    font-size: 30px;
    color: #aabbd4;
}

/* RESPONSIVE */

@media(max-width:768px) {

    .data-heading {
        align-items: flex-start;
    }

    .data-heading-left {
        align-items: flex-start;
    }

    .data-heading .page-title {
        font-size: 19px;
    }

    .btn-add-data {
        width: 100%;
        justify-content: center;
    }

    .data-card {
        padding: 18px 14px;
    }

    .data-card-header {
        align-items: stretch;
    }

    .data-search {
        width: 100%;
    }

    .data-footer {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>


<div class="index-page">

    <!-- PAGE HEADER -->

    <div class="data-heading">

        <div class="data-heading-left">

            <div class="data-heading-icon">

                @if($module === 'pelanggan')
                    <i class="bi bi-people-fill"></i>
                @elseif($module === 'kendaraan')
                    <i class="bi bi-bicycle"></i>
                @elseif($module === 'daftar-service')
                    <i class="bi bi-clipboard-check-fill"></i>
                @elseif($module === 'data-service')
                    <i class="bi bi-gear-wide-connected"></i>
                @elseif($module === 'pembayaran')
                    <i class="bi bi-wallet2"></i>
                @else
                    <i class="bi bi-grid-fill"></i>
                @endif

            </div>

            <div>

                <div class="page-title">
                    {{ $config['title'] }}
                </div>

                <div class="page-subtitle">
                    Kelola dan pantau informasi {{ strtolower($config['title']) }}.
                </div>

            </div>

        </div>

        <a href="{{ route('crud.create',$module) }}"
           class="btn-add-data">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah Data Baru

        </a>

    </div>


    <!-- MAIN DATA CARD -->

    <div class="data-card">

        <div class="data-card-accent"></div>


        <!-- CARD HEADER -->

        <div class="data-card-header">

            <div class="data-card-title">

                <div class="data-card-title-icon">

                    <i class="bi bi-list-columns-reverse"></i>

                </div>

                <div>

                    <h5>
                        Daftar {{ $config['title'] }}
                    </h5>

                    <small>
                        Total {{ $records->total() }} data tersimpan
                    </small>

                </div>

            </div>


            <!-- SEARCH -->

            <div class="data-search">

                <input
                    type="text"
                    id="searchTable"
                    placeholder="Cari data..."
                    autocomplete="off">

                <i class="bi bi-search"></i>

            </div>

        </div>


        <!-- DATA TABLE -->

        <div class="table-responsive">

            <table class="table data-table" id="dataTable">

                <thead>

                    <tr>

                        <th style="width:65px">
                            No
                        </th>

                        @foreach($config['columns'] as $column)

                            <th>
                                {{ $column['label'] }}
                            </th>

                        @endforeach

                        <th style="min-width:110px">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($records as $record)

                        <tr>

                            <td class="data-number">
                                {{ $records->firstItem() + $loop->index }}
                            </td>


                            @foreach($config['columns'] as $column)

                                @php
                                    $value = data_get($record,$column['key']);
                                @endphp

                                <td>

                                    @if($column['key'] === 'biaya_service')

                                        <span class="fw-bold" style="color:#16965b">
                                            Rp {{ number_format((float)$value,0,',','.') }}
                                        </span>

                                    @elseif($column['key'] === 'jenis_pembayaran')

                                        <span class="data-badge {{ $value === 'Cash' ? 'badge-green' : 'badge-cyan' }}">

                                            <i class="bi {{ $value === 'Cash' ? 'bi-cash-stack' : 'bi-credit-card' }}"></i>

                                            {{ $value ?? '-' }}

                                        </span>

                                    @elseif($column['key'] === 'jenis_kendaraan')

                                        <span class="data-badge badge-blue">

                                            <i class="bi bi-bicycle"></i>

                                            {{ $value ?? '-' }}

                                        </span>

                                    @elseif($column['key'] === 'tanggal_service')

                                        <span>

                                            <i class="bi bi-calendar3 text-primary me-1"></i>

                                            {{ $value ? \Carbon\Carbon::parse($value)->format('d/m/Y') : '-' }}

                                        </span>

                                    @else

                                        {{ $value ?: '-' }}

                                    @endif

                                </td>

                            @endforeach


                            <!-- ACTION BUTTONS -->

                            <td>

                                <div class="action-group">

                                    <a href="{{ route('crud.edit',[$module,$record->id]) }}"
                                       class="btn-action btn-edit"
                                       title="Edit Data">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    <form action="{{ route('crud.destroy',[$module,$record->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-action btn-delete"
                                                title="Hapus Data">

                                            <i class="bi bi-trash3"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="{{ count($config['columns']) + 2 }}">

                                <div class="data-empty">

                                    <div class="data-empty-icon">

                                        <i class="bi bi-inbox"></i>

                                    </div>

                                    <h5>
                                        Belum Ada Data
                                    </h5>

                                    <p>
                                        Silakan tambahkan data baru untuk memulai.
                                    </p>

                                    <a href="{{ route('crud.create',$module) }}"
                                       class="btn-add-data">

                                        <i class="bi bi-plus-lg"></i>

                                        Tambah Data

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>


            <div class="search-empty" id="searchEmpty">

                <i class="bi bi-search"></i>

                Tidak ditemukan data yang cocok.

            </div>

        </div>


        <!-- FOOTER -->

        <div class="data-footer">

            <small>

                Menampilkan {{ $records->count() }}
                dari {{ $records->total() }} data

            </small>

            {{ $records->links() }}

        </div>

    </div>

</div>


<!-- SEARCH JAVASCRIPT -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const search = document.getElementById('searchTable');

    const table = document.getElementById('dataTable');

    const empty = document.getElementById('searchEmpty');

    if (!search || !table || !empty) return;

    search.addEventListener('input', function () {

        const keyword = this.value.toLowerCase().trim();

        const rows = table.querySelectorAll('tbody tr');

        let visibleCount = 0;

        let hasData = false;

        rows.forEach(function (row) {

            if (row.querySelector('.data-empty')) return;

            hasData = true;

            const match = row.innerText.toLowerCase().includes(keyword);

            row.style.display = match ? '' : 'none';

            if (match) {
                visibleCount++;
            }

        });

        empty.style.display =
            keyword !== '' && hasData && visibleCount === 0
                ? 'block'
                : 'none';

    });

});

</script>

@endsection
