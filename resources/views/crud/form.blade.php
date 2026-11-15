
@extends('layouts.app')

@section('title', $config['title'])

@section('content')

<div class="mb-4">

    <div class="page-title">
        {{ $record ? 'Edit Data' : 'Tambah Data' }}
    </div>

    <div class="page-subtitle">
        {{ $record ? 'Perbarui informasi yang sudah tersimpan.' : 'Lengkapi formulir berikut untuk menambahkan data baru.' }}
    </div>

</div>

<div class="panel" style="max-width:850px">

    <div class="d-flex align-items-center gap-3 mb-4 pb-3"
         style="border-bottom:1px solid #edf0f5">

        <div class="stat-icon"
             style="background:#e8f0ff;color:#3478f6">
            <i class="bi bi-clipboard-data"></i>
        </div>

        <div>
            <h6 class="fw-bold mb-1">{{ $config['title'] }}</h6>
            <small class="text-secondary">
                {{ $record ? 'Formulir edit data' : 'Formulir data baru' }}
            </small>
        </div>

    </div>

    <form method="POST"
          action="{{ $record
              ? route('crud.update',[$module,$record->id])
              : route('crud.store',$module) }}">

        @csrf

        @if($record)
            @method('PUT')
        @endif

        <div class="row g-3">

            @foreach($fields as $field)

                @php
                    $name = $field['name'];
                    $value = old($name, $record?->{$name});
                @endphp

                <div class="{{ in_array($field['type'],['textarea','radio']) ? 'col-12' : 'col-md-6' }}">

                    <label class="form-label">
                        {{ $field['label'] }}

                        @if(!in_array($name,['sparepart_pengganti','keterangan']))
                            <span class="text-danger">*</span>
                        @else
                            <small class="text-secondary">(Opsional)</small>
                        @endif
                    </label>

                    @if($field['type'] === 'textarea')

                        <textarea name="{{ $name }}"
                                  class="form-control"
                                  rows="3"
                                  @if(!in_array($name,['sparepart_pengganti','keterangan'])) required @endif
                                  placeholder="Masukkan {{ strtolower($field['label']) }}">{{ $value }}</textarea>

                    @elseif($field['type'] === 'select')

                        <select name="{{ $name }}"
                                id="{{ $name }}"
                                class="form-select"
                                required>

                            <option value="">-- Pilih {{ $field['label'] }} --</option>

                            @foreach(($options[$name] ?? []) as $option)

                                <option value="{{ $option['value'] }}"
                                        data-pelanggan="{{ $option['pelanggan_id'] ?? '' }}"
                                        data-nama="{{ $option['nama'] ?? '' }}"
                                        data-keluhan="{{ $option['keluhan'] ?? '' }}"
                                        @selected((string)$value === (string)$option['value'])>

                                    {{ $option['label'] }}

                                </option>

                            @endforeach

                        </select>

                    @elseif($field['type'] === 'radio')

                        <div class="d-flex flex-wrap gap-3">

                            @foreach($field['options'] as $option)

                                <label class="border rounded-3 p-3 flex-fill"
                                       style="cursor:pointer;background:#f8faff">

                                    <input type="radio"
                                           class="form-check-input me-2"
                                           name="{{ $name }}"
                                           value="{{ $option }}"
                                           @checked($value === $option)
                                           required>

                                    <span class="small fw-semibold">
                                        {{ $option }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    @else

                        <input type="{{ $field['type'] }}"
                               name="{{ $name }}"
                               class="form-control"
                               value="{{ $value }}"
                               placeholder="Masukkan {{ strtolower($field['label']) }}"
                               required>

                    @endif

                    @error($name)
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

            @endforeach

            @if($module === 'daftar-service')

                <div class="col-12">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text"
                           id="nama_pelanggan_preview"
                           class="form-control"
                           readonly
                           placeholder="Otomatis setelah pelanggan dipilih">
                </div>

            @endif

            @if($module === 'data-service')

                <div class="col-12">
                    <label class="form-label">Keluhan Kendaraan</label>
                    <input type="text"
                           id="keluhan_preview"
                           class="form-control"
                           readonly
                           placeholder="Otomatis setelah ID service dipilih">
                </div>

            @endif

        </div>

        <div class="d-flex flex-wrap gap-2 mt-4 pt-3"
             style="border-top:1px solid #edf0f5">

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-2"></i>
                {{ $record ? 'Simpan Perubahan' : 'Simpan Data' }}
            </button>

            <a href="{{ route('crud.index',$module) }}"
               class="btn btn-light border">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>

        </div>

    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const pelanggan = document.getElementById('pelanggan_id');
    const kendaraan = document.getElementById('kendaraan_id');
    const nama = document.getElementById('nama_pelanggan_preview');

    // Dropdown kendaraan mengikuti pelanggan
    if (pelanggan && kendaraan) {

        const semuaKendaraan = Array.from(kendaraan.options);

        function filterKendaraan() {

            const pelangganId = pelanggan.value;
            const kendaraanTerpilih = kendaraan.value;

            kendaraan.innerHTML = '';

            const placeholder = document.createElement('option');
            placeholder.value = '';
            placeholder.textContent = '-- Pilih Kendaraan --';
            kendaraan.appendChild(placeholder);

            semuaKendaraan.slice(1).forEach(function(option) {

                if (option.dataset.pelanggan === pelangganId) {

                    kendaraan.appendChild(option.cloneNode(true));

                }

            });

            if ([...kendaraan.options].some(o => o.value === kendaraanTerpilih)) {
                kendaraan.value = kendaraanTerpilih;
            }
        }

        pelanggan.addEventListener('change', filterKendaraan);

        if (pelanggan.value) {
            filterKendaraan();
        }
    }

    // Nama pelanggan otomatis
    if (pelanggan && nama) {

        function updateNama() {
            nama.value =
                pelanggan.selectedOptions[0]?.dataset.nama || '';
        }

        pelanggan.addEventListener('change', updateNama);
        updateNama();
    }

    // Keluhan otomatis
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
