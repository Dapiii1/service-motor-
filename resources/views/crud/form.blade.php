
@extends('layouts.app')

@section('title', $config['title'])

@section('content')

<style>
    /* =====================================
       MOTОCARE FORM PREMIUM
    ===================================== */

    .form-page {
        animation: formAppear .45s ease;
    }

    @keyframes formAppear {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-wrapper {
        max-width: 1050px;
    }

    .form-premium-card {
        background: #fff;
        border: 1px solid #dce7f5;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(16,30,57,.07);
        position: relative;
    }

    .form-top-line {
        height: 5px;
        background: linear-gradient(
            90deg,
            #101E39,
            #3478F6,
            #13C5C8
        );
    }

    /* FORM HEADER */

    .form-header {
        display: flex;
        align-items: center;
        gap: 17px;
        padding: 27px 30px;
        border-bottom: 1px solid #edf1f7;
        background: linear-gradient(
            110deg,
            #ffffff,
            #f4f8ff
        );
    }

    .form-header-icon {
        width: 58px;
        height: 58px;
        flex-shrink: 0;
        display: grid;
        place-items: center;
        border-radius: 17px;
        background: linear-gradient(
            135deg,
            #3478F6,
            #13C5C8
        );
        color: white;
        font-size: 25px;
        box-shadow: 0 7px 18px rgba(52,120,246,.25);
    }

    .form-header h5 {
        color: #101E39;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .form-header small {
        color: #8290a5;
        font-size: 13px;
    }

    .form-body {
        padding: 30px;
    }

    /* LABEL */

    .form-premium-card .form-label {
        color: #263b5b;
        font-size: 13px;
        font-weight: 750;
        margin-bottom: 10px;
    }

    .required-star {
        color: #ef5350;
        margin-left: 3px;
    }

    .optional-label {
        color: #93a0b3;
        font-size: 11px;
        font-weight: 500;
        margin-left: 4px;
    }

    /* INPUT */

    .form-premium-card .form-control,
    .form-premium-card .form-select {
        min-height: 49px;
        padding: 12px 15px;
        background-color: #f8faff;
        border: 1px solid #dce6f4;
        border-radius: 11px;
        color: #243751;
        font-size: 13px;
        transition: all .25s ease;
    }

    .form-premium-card textarea.form-control {
        min-height: 125px;
        resize: vertical;
    }

    .form-premium-card .form-control:hover,
    .form-premium-card .form-select:hover {
        border-color: #a9c7fa;
        background: #fff;
    }

    .form-premium-card .form-control:focus,
    .form-premium-card .form-select:focus {
        background: white;
        border-color: #3478F6;
        box-shadow: 0 0 0 4px rgba(52,120,246,.12);
        outline: none;
    }

    .form-premium-card .form-control::placeholder {
        color: #a3afc0;
    }

    /* RADIO CARDS */

    .radio-option {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 17px;
        min-height: 58px;
        background: #f7f9fd;
        border: 1px solid #e0e8f4;
        border-radius: 12px;
        cursor: pointer;
        transition: all .25s ease;
    }

    .radio-option:hover {
        background: #eff5ff;
        border-color: #8bb4ff;
        transform: translateY(-2px);
    }

    .radio-option:has(input:checked) {
        background: #edf4ff;
        border-color: #3478F6;
        box-shadow: 0 4px 13px rgba(52,120,246,.10);
    }

    .radio-option input {
        accent-color: #3478F6;
        width: 17px;
        height: 17px;
        cursor: pointer;
    }

    .radio-option span {
        color: #344763;
        font-size: 13px;
        font-weight: 650;
    }

    /* PREVIEW */

    .preview-field {
        background: #edf4ff !important;
        border: 1px dashed #9bbcf5 !important;
        color: #2457CB !important;
        font-weight: 650;
    }

    .preview-note {
        color: #8190a5;
        font-size: 11px;
        margin-top: 7px;
    }

    /* SECTION */

    .form-section-label {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #101E39;
        font-weight: 800;
        font-size: 13px;
        margin-bottom: 23px;
    }

    .form-section-label i {
        color: #3478F6;
        font-size: 17px;
    }

    /* FOOTER BUTTONS */

    .form-footer {
        padding-top: 24px;
        margin-top: 30px;
        border-top: 1px solid #edf1f7;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .btn-form-save {
        background: linear-gradient(
            110deg,
            #3478F6,
            #2457CB
        );
        color: white;
        border: none;
        padding: 13px 23px;
        border-radius: 11px;
        font-weight: 750;
        font-size: 13px;
        box-shadow: 0 6px 17px rgba(52,120,246,.24);
        transition: all .25s ease;
    }

    .btn-form-save:hover {
        background: linear-gradient(
            110deg,
            #2868e8,
            #1c4cb7
        );
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 23px rgba(52,120,246,.32);
    }

    .btn-form-back {
        background: #f1f5fb;
        color: #344763;
        border: 1px solid #dfe7f2;
        padding: 12px 21px;
        border-radius: 11px;
        font-weight: 700;
        font-size: 13px;
        transition: .25s;
    }

    .btn-form-back:hover {
        background: #e5edfa;
        color: #101E39;
        transform: translateY(-2px);
    }

    .form-error {
        color: #e34e5a;
        font-size: 12px;
        display: block;
        margin-top: 7px;
    }

    @media(max-width: 768px) {
        .form-header {
            padding: 21px 18px;
        }

        .form-body {
            padding: 21px 17px;
        }

        .form-footer {
            flex-direction: column;
        }

        .form-footer .btn {
            width: 100%;
        }

        .form-header-icon {
            width: 49px;
            height: 49px;
        }
    }
</style>


<div class="form-page">

    <!-- PAGE TITLE -->

    <div class="mb-4">

        <div class="page-title">
            {{ $record ? 'Edit Data' : 'Tambah Data' }}
        </div>

        <div class="page-subtitle">
            {{ $record
                ? 'Perbarui informasi data yang sudah tersimpan.'
                : 'Lengkapi formulir berikut untuk menambahkan data baru.' }}
        </div>

    </div>


    <div class="form-wrapper">

        <div class="form-premium-card">

            <div class="form-top-line"></div>


            <!-- HEADER FORM -->

            <div class="form-header">

                <div class="form-header-icon">
                    <i class="bi bi-clipboard-data-fill"></i>
                </div>

                <div>

                    <h5>
                        {{ $config['title'] }}
                    </h5>

                    <small>
                        {{ $record
                            ? 'Formulir edit data MotoCare'
                            : 'Formulir penambahan data baru MotoCare' }}
                    </small>

                </div>

            </div>


            <!-- FORM BODY -->

            <div class="form-body">

                <div class="form-section-label">

                    <i class="bi bi-pencil-square"></i>

                    INFORMASI DATA

                </div>


                <form method="POST"
                      action="{{ $record
                        ? route('crud.update',[$module,$record->id])
                        : route('crud.store',$module) }}">

                    @csrf

                    @if($record)
                        @method('PUT')
                    @endif


                    <div class="row g-4">

                        @foreach($fields as $field)

                            @php
                                $name = $field['name'];

                                $value = old(
                                    $name,
                                    $record?->{$name}
                                );

                                $optional = in_array($name, [
                                    'sparepart_pengganti',
                                    'keterangan'
                                ]);
                            @endphp


                            <div class="{{ in_array($field['type'], ['textarea','radio']) ? 'col-12' : 'col-md-6' }}">

                                <!-- LABEL -->

                                <label class="form-label">

                                    {{ $field['label'] }}

                                    @if(!$optional)

                                        <span class="required-star">*</span>

                                    @else

                                        <span class="optional-label">
                                            (Opsional)
                                        </span>

                                    @endif

                                </label>


                                <!-- TEXTAREA -->

                                @if($field['type'] === 'textarea')

                                    <textarea
                                        name="{{ $name }}"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Masukkan {{ strtolower($field['label']) }}"
                                        @unless($optional) required @endunless>{{ $value }}</textarea>


                                <!-- SELECT -->

                                @elseif($field['type'] === 'select')

                                    <select
                                        name="{{ $name }}"
                                        id="{{ $name }}"
                                        class="form-select"
                                        @unless($optional) required @endunless>

                                        <option value="">
                                            -- Pilih {{ $field['label'] }} --
                                        </option>

                                        @foreach(($options[$name] ?? []) as $option)

                                            <option
                                                value="{{ $option['value'] }}"
                                                data-pelanggan="{{ $option['pelanggan_id'] ?? '' }}"
                                                data-nama="{{ $option['nama'] ?? '' }}"
                                                data-keluhan="{{ $option['keluhan'] ?? '' }}"
                                                @selected((string)$value === (string)$option['value'])>

                                                {{ $option['label'] }}

                                            </option>

                                        @endforeach

                                    </select>


                                <!-- RADIO -->

                                @elseif($field['type'] === 'radio')

                                    <div class="row g-3">

                                        @foreach($field['options'] as $option)

                                            <div class="col-md-4">

                                                <label class="radio-option h-100">

                                                    <input
                                                        type="radio"
                                                        name="{{ $name }}"
                                                        value="{{ $option }}"
                                                        @checked((string)$value === (string)$option)
                                                        required>

                                                    <span>
                                                        {{ $option }}
                                                    </span>

                                                </label>

                                            </div>

                                        @endforeach

                                    </div>


                                <!-- INPUT -->

                                @else

                                    <input
                                        type="{{ $field['type'] }}"
                                        name="{{ $name }}"
                                        class="form-control"
                                        value="{{ $value }}"
                                        placeholder="Masukkan {{ strtolower($field['label']) }}"
                                        @unless($optional) required @endunless>

                                @endif


                                <!-- VALIDATION -->

                                @error($name)

                                    <small class="form-error">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </small>

                                @enderror

                            </div>

                        @endforeach


                        <!-- NAMA PELANGGAN OTOMATIS -->

                        @if($module === 'daftar-service')

                            <div class="col-12">

                                <label class="form-label">
                                    <i class="bi bi-person-check-fill text-primary me-1"></i>
                                    Nama Pelanggan
                                </label>

                                <input
                                    type="text"
                                    id="nama_pelanggan_preview"
                                    class="form-control preview-field"
                                    readonly
                                    placeholder="Otomatis setelah pelanggan dipilih">

                                <div class="preview-note">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Nama pelanggan akan ditampilkan secara otomatis.
                                </div>

                            </div>

                        @endif


                        <!-- KELUHAN OTOMATIS -->

                        @if($module === 'data-service')

                            <div class="col-12">

                                <label class="form-label">
                                    <i class="bi bi-tools text-primary me-1"></i>
                                    Keluhan Kendaraan
                                </label>

                                <input
                                    type="text"
                                    id="keluhan_preview"
                                    class="form-control preview-field"
                                    readonly
                                    placeholder="Otomatis setelah ID service dipilih">

                                <div class="preview-note">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Informasi keluhan mengikuti data pendaftaran service.
                                </div>

                            </div>

                        @endif

                    </div>


                    <!-- BUTTON FOOTER -->

                    <div class="form-footer">

                        <button type="submit" class="btn btn-form-save">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            {{ $record ? 'Simpan Perubahan' : 'Simpan Data' }}

                        </button>


                        <a href="{{ route('crud.index',$module) }}"
                           class="btn btn-form-back">

                            <i class="bi bi-arrow-left me-2"></i>

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<!-- =====================================
     JAVASCRIPT OTOMATIS
===================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const pelanggan = document.getElementById('pelanggan_id');

    const kendaraan = document.getElementById('kendaraan_id');

    const nama = document.getElementById('nama_pelanggan_preview');


    /* FILTER KENDARAAN BERDASARKAN PEMILIK */

    if (pelanggan && kendaraan) {

        const semuaKendaraan = Array.from(kendaraan.options)
            .slice(1)
            .map(option => option.cloneNode(true));


        function filterKendaraan() {

            const pelangganId = pelanggan.value;

            const kendaraanLama = kendaraan.value;

            kendaraan.innerHTML = '';

            const placeholder = document.createElement('option');

            placeholder.value = '';

            placeholder.textContent = '-- Pilih Kendaraan --';

            kendaraan.appendChild(placeholder);


            semuaKendaraan.forEach(function (option) {

                if (option.dataset.pelanggan === pelangganId) {

                    kendaraan.appendChild(option.cloneNode(true));

                }

            });


            if ([...kendaraan.options].some(
                option => option.value === kendaraanLama
            )) {

                kendaraan.value = kendaraanLama;

            }

        }


        pelanggan.addEventListener('change', filterKendaraan);

        if (pelanggan.value) {

            filterKendaraan();

        }

    }


    /* NAMA PELANGGAN OTOMATIS */

    if (pelanggan && nama) {

        function updateNama() {

            nama.value =
                pelanggan.selectedOptions[0]?.dataset.nama || '';

        }

        pelanggan.addEventListener('change', updateNama);

        updateNama();

    }


    /* KELUHAN OTOMATIS */

    const daftarService =
        document.getElementById('daftar_service_id');

    const keluhan =
        document.getElementById('keluhan_preview');


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
