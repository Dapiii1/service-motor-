
@extends('layouts.app')

@section('title', $config['title'])

@section('content')

<div class="card shadow-sm p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>{{ $config['title'] }}</h4>

        <a href="{{ route('crud.create',$module) }}"
           class="btn btn-primary">
            + Tambah Data
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>

                    @foreach($config['columns'] as $column)
                        <th>{{ $column['label'] }}</th>
                    @endforeach

                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($records as $record)
                    <tr>
                        <td>{{ $records->firstItem() + $loop->index }}</td>

                        @foreach($config['columns'] as $column)
                            <td>
                                {{ data_get($record,$column['key']) ?? '-' }}
                            </td>
                        @endforeach

                        <td>
                            <a href="{{ route('crud.edit',[$module,$record->id]) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('crud.destroy',[$module,$record->id]) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="{{ count($config['columns']) + 2 }}"
                            class="text-center">
                            Belum ada data.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{ $records->links() }}

</div>

@endsection
