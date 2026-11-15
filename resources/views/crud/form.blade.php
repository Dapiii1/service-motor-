
@extends('layouts.app')

@section('title', $config['title'])

@section('content')

<div class="card shadow-sm p-4">

    <h4 class="mb-4">
        {{ $record ? 'Edit' : 'Tambah' }} {{ $config['title'] }}
    </h4>

    <form method="POST"
          action="{{ $record
              ? route('crud.update',[$module,$record->id])
              : route('crud.store',$module) }}">

        @csrf

        @if($record)
            @method('PUT')
        @endif

        @foreach($fields as $field)

            @php
                $name = $field['name'];
                $value = old($name, $record?->{$name});
            @endphp

            <div class="mb-3">

                <label class="form-label fw-bold">
                    {{ $field['label'] }}
                </label>

                @if($field['type'] === 'textarea')

                    <textarea name="{{ $name }}"
                              class="form-control"
                              rows="3">{{ $value }}</textarea>

                @elseif($field['type'] === 'select')

                    <select name="{{ $name }}"
                            id="{{ $name }}"
                            class="form-select"
                            required>

                        <option value="">-- Pilih {{ $field['label'] }} --</option>

                        @foreach(($options[$name] ?? []) as $option)
                            <option value="{{ $option['value'] }}"
                                data-nama="{{ $option['nama'] ?? '' }}"
                                data-keluhan="{{ $option['keluhan'] ?? '' }}"
                                @selected((string)$value === (string)$option['value'])>

                                {{ $option['label'] }}
                            </option>
                        @endforeach

                    </select>

                @elseif($field['type'] === 'radio')

                    @foreach($field['options'] as $option)

                        <div class="form-check form-check-inline">

                            <input type="radio"
                                   class="form-check-input"
                                   name="{{ $name }}"
                                   value="{{ $option }}"
                                   @checked($value === $option)
                                   required>

                            <label class="form-check-label">
                                {{ $option }}
                            </label>

                        </div>

                    @endforeach

                @else

                    <input type="{{ $field['type'] }}"
                           name="{{ $name }}"
                           class="form-control"
                           value="{{ $value }}"
                           required>

                @endif

            </div>

        @endforeach

        @if($module === 'daftar-service')
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Pelanggan</label>
                <input type="text" id="nama_pelanggan_preview"
                       class="form-control" readonly>
            </div>
        @endif

        @if($module === 'data-service')
            <div class="mb-3">
                <label class="form-label fw-bold">Keluhan Kendaraan</label>
                <input type="text" id="keluhan_preview"
                       class="form-control" readonly>
            </div>
        @endif

        <button class="btn btn-primary">
            Simpan Data
        </button>

        <a href="{{ route('crud.index',$module) }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const pelanggan = document.getElementById('pelanggan_id');
    const nama = document.getElementById('nama_pelanggan_preview');

    if (pelanggan && nama) {
        function updateNama() {
            nama.value = pelanggan.selectedOptions[0]?.dataset.nama || '';
        }

        pelanggan.addEventListener('change', updateNama);
        updateNama();
    }

    const daftarService = document.getElementById('daftar_service_id');
    const keluhan = document.getElementById('keluhan_preview');

    if (daftarService && keluhan) {
        function updateKeluhan() {
            keluhan.value =
                daftarService.selectedOptions[0]?.dataset.keluhan || '';
        }

        daftarService.addEventListener('change', updateKeluhan);
        updateKeluhan();
    }
});
</script>

@endsection
