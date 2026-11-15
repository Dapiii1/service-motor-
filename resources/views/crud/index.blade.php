
@extends('layouts.app')

@section('title', $config['title'])

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

    <div>
        <div class="page-title">{{ $config['title'] }}</div>
        <div class="page-subtitle">
            Kelola dan pantau informasi {{ strtolower($config['title']) }}.
        </div>
    </div>

    <a href="{{ route('crud.create',$module) }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Tambah Data Baru
    </a>

</div>

<div class="panel">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">

        <div>
            <h6 class="fw-bold mb-1">Daftar {{ $config['title'] }}</h6>
            <small class="text-secondary">
                Total {{ $records->total() }} data tersimpan
            </small>
        </div>

        <div class="position-relative">
            <i class="bi bi-search position-absolute"
               style="left:12px;top:11px;color:#8793a6"></i>

            <input type="text"
                   id="searchTable"
                   class="form-control"
                   placeholder="Cari data..."
                   style="padding-left:35px;width:220px">
        </div>

    </div>

    <div class="table-responsive">

        <table class="table" id="dataTable">

            <thead>
                <tr>
                    <th style="width:55px">No</th>

                    @foreach($config['columns'] as $column)
                        <th>{{ $column['label'] }}</th>
                    @endforeach

                    <th style="min-width:125px">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($records as $record)

                    <tr>

                        <td class="text-secondary">
                            {{ $records->firstItem() + $loop->index }}
                        </td>

                        @foreach($config['columns'] as $column)

                            <td>
                                @php
                                    $value = data_get($record,$column['key']);
                                @endphp

                                @if($column['key'] === 'biaya_service')
                                    <span class="fw-bold text-success">
                                        Rp {{ number_format((float)$value,0,',','.') }}
                                    </span>

                                @elseif($column['key'] === 'jenis_pembayaran')
                                    <span class="badge rounded-pill {{ $value === 'Cash' ? 'text-bg-success' : 'text-bg-info' }}">
                                        {{ $value ?? '-' }}
                                    </span>

                                @elseif($column['key'] === 'jenis_kendaraan')
                                    <span class="badge rounded-pill text-bg-primary">
                                        {{ $value ?? '-' }}
                                    </span>

                                @else
                                    {{ $value ?: '-' }}
                                @endif

                            </td>

                        @endforeach

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('crud.edit',[$module,$record->id]) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   title="Edit data">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('crud.destroy',[$module,$record->id]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus data">
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="{{ count($config['columns']) + 2 }}">

                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h6 class="fw-bold text-dark">Belum Ada Data</h6>
                                <p class="small">
                                    Silakan tambahkan data baru untuk memulai.
                                </p>
                                <a href="{{ route('crud.create',$module) }}"
                                   class="btn btn-primary">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Tambah Sekarang
                                </a>
                            </div>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">

        <small class="text-secondary">
            Menampilkan {{ $records->count() }} dari {{ $records->total() }} data
        </small>

        {{ $records->links() }}

    </div>

</div>

<script>
document.getElementById('searchTable').addEventListener('input', function() {

    let keyword = this.value.toLowerCase();

    document.querySelectorAll('#dataTable tbody tr').forEach(function(row) {

        row.style.display =
            row.innerText.toLowerCase().includes(keyword) ? '' : 'none';

    });

});
</script>

@endsection
