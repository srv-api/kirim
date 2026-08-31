@extends('dashboard')

@section('content')

<style>
    .assessment-edit-page {
        padding-bottom: 40px;
        color: #111827;
    }

    /* HEADER */
    .edit-header {
        margin-bottom: 28px;
    }

    .edit-eyebrow {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: #9ca3af;
        margin-bottom: 6px;
    }

    .edit-title {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -.5px;
        margin: 0 0 5px;
        color: #111827;
    }

    .edit-description {
        margin: 0;
        font-size: 14px;
        color: #6b7280;
    }

    /* BUTTON */
    .btn-modern {
        border-radius: 8px;
        padding: 9px 15px;
        font-size: 13px;
        font-weight: 600;
        transition: all .18s ease;
    }

    .btn-dark-modern {
        background: #111827;
        border: 1px solid #111827;
        color: #fff;
    }

    .btn-dark-modern:hover {
        background: #000;
        border-color: #000;
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-light-modern {
        background: #fff;
        border: 1px solid #e5e7eb;
        color: #374151;
    }

    .btn-light-modern:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #111827;
    }

    /* ALERT */
    .modern-alert {
        border: 1px solid;
        border-radius: 9px;
        font-size: 13px;
        padding: 13px 15px;
    }

    /* FORM CARD */
    .form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #eef0f2;
        background: #fff;
    }

    .form-card-title {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 3px;
    }

    .form-card-subtitle {
        font-size: 12px;
        color: #9ca3af;
        margin: 0;
    }

    .form-card-body {
        padding: 26px 24px;
    }

    /* FORM */
    .form-section {
        margin-bottom: 24px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .form-label-modern {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 7px;
    }

    .form-control-modern,
    .form-select-modern {
        width: 100%;
        min-height: 42px;
        border: 1px solid #dfe3e8;
        border-radius: 8px;
        background: #fff;
        color: #111827;
        font-size: 14px;
        padding: 9px 12px;
        outline: none;
        transition: border-color .18s ease,
                    box-shadow .18s ease;
    }

    .form-control-modern::placeholder {
        color: #b0b5bd;
    }

    .form-control-modern:focus,
    .form-select-modern:focus {
        border-color: #9ca3af;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, .06);
    }

    textarea.form-control-modern {
        min-height: 110px;
        resize: vertical;
        line-height: 1.6;
    }

    .input-group-modern {
        display: flex;
    }

    .input-group-modern .form-control-modern {
        border-radius: 8px 0 0 8px;
    }

    .input-addon {
        min-width: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 12px;
        border: 1px solid #dfe3e8;
        border-left: 0;
        border-radius: 0 8px 8px 0;
        background: #f9fafb;
        color: #6b7280;
        font-size: 13px;
    }

    .form-help {
        display: block;
        margin-top: 6px;
        color: #9ca3af;
        font-size: 12px;
    }

    .field-error {
        color: #b91c1c;
        font-size: 12px;
        margin-top: 6px;
    }

    /* SECTION DIVIDER */
    .form-divider {
        height: 1px;
        background: #eef0f2;
        margin: 28px 0;
    }

    /* BUTTON FOOTER */
    .form-actions {
        padding-top: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* MOBILE */
    @media (max-width: 768px) {

        .edit-header {
            align-items: flex-start !important;
            flex-direction: column;
            gap: 15px;
        }

        .edit-title {
            font-size: 23px;
        }

        .edit-header .btn-modern {
            width: 100%;
        }

        .form-card-body {
            padding: 20px 18px;
        }

        .form-card-header {
            padding: 18px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn-modern {
            width: 100%;
        }
    }
</style>

<div class="container-fluid assessment-edit-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="edit-header d-flex justify-content-between align-items-center">

    <div>

        <div class="edit-eyebrow">
            Assessment
        </div>

        <h1 class="edit-title">
            Edit Assessment
        </h1>

        <p class="edit-description">
            Perbarui informasi dan pengaturan assessment.
        </p>

    </div>

    <a
        href="{{ route('owner.assessments.show', $assessment) }}"
        class="btn btn-modern btn-light-modern"
    >
        ← Kembali
    </a>

</div>


{{-- =====================================================
     ERROR
====================================================== --}}

@if ($errors->any())

    <div class="alert alert-danger modern-alert mb-4">

        <div class="fw-semibold mb-1">
            Periksa kembali data yang dimasukkan.
        </div>

        <ul class="mb-0 ps-3">

            @foreach ($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


{{-- =====================================================
     SUCCESS
====================================================== --}}

@if (session('success'))

    <div class="alert alert-success modern-alert mb-4">

        {{ session('success') }}

    </div>

@endif


{{-- =====================================================
     FORM
====================================================== --}}

<div class="form-card">

    <div class="form-card-header">

        <h2 class="form-card-title">
            Informasi Assessment
        </h2>

        <p class="form-card-subtitle">
            Kelola detail dasar, penilaian, status, dan periode assessment.
        </p>

    </div>


    <div class="form-card-body">

        <form
            method="POST"
            action="{{ route('owner.assessments.update', $assessment) }}"
        >

            @csrf
            @method('PUT')


            {{-- =================================================
                 INFORMASI DASAR
            ================================================== --}}

            <div class="form-section">

                <label class="form-label-modern">
                    Judul Assessment
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control-modern"
                    value="{{ old('title', $assessment->title) }}"
                    placeholder="Masukkan judul assessment"
                    required
                >

                @error('title')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <div class="form-section">

                <label class="form-label-modern">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    class="form-control-modern"
                    placeholder="Jelaskan tujuan atau gambaran assessment"
                >{{ old('description', $assessment->description) }}</textarea>

                @error('description')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <div class="form-section">

                <label class="form-label-modern">
                    Kategori
                </label>

                <input
                    type="text"
                    name="category"
                    class="form-control-modern"
                    value="{{ old('category', $assessment->category) }}"
                    placeholder="Contoh: Pemrograman"
                >

                @error('category')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <div class="form-divider"></div>


            {{-- =================================================
                 PENGATURAN
            ================================================== --}}

            <div class="row">

                <div class="col-md-4">

                    <div class="form-section">

                        <label class="form-label-modern">
                            Durasi
                        </label>

                        <div class="input-group-modern">

                            <input
                                type="number"
                                name="duration"
                                class="form-control-modern"
                                value="{{ old('duration', $assessment->duration) }}"
                                min="1"
                                required
                            >

                            <span class="input-addon">
                                Menit
                            </span>

                        </div>

                        <small class="form-help">
                            Waktu pengerjaan assessment.
                        </small>

                        @error('duration')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="form-section">

                        <label class="form-label-modern">
                            Passing Score
                        </label>

                        <div class="input-group-modern">

                            <input
                                type="number"
                                name="passing_score"
                                class="form-control-modern"
                                value="{{ old('passing_score', $assessment->passing_score) }}"
                                min="0"
                                max="100"
                                step="0.01"
                                required
                            >

                            <span class="input-addon">
                                %
                            </span>

                        </div>

                        <small class="form-help">
                            Nilai minimum untuk dinyatakan lulus.
                        </small>

                        @error('passing_score')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="form-section">

                        <label class="form-label-modern">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select-modern"
                            required
                        >

                            <option
                                value="draft"
                                {{ old('status', $assessment->status) === 'draft' ? 'selected' : '' }}
                            >
                                Draft
                            </option>

                            <option
                                value="active"
                                {{ old('status', $assessment->status) === 'active' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="inactive"
                                {{ old('status', $assessment->status) === 'inactive' ? 'selected' : '' }}
                            >
                                Tidak Aktif
                            </option>

                        </select>

                        <small class="form-help">
                            Tentukan status publikasi assessment.
                        </small>

                        @error('status')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

            </div>


            <div class="form-divider"></div>


            {{-- =================================================
                 PERIODE
            ================================================== --}}

            <div class="mb-3">

                <div class="form-card-title mb-1">
                    Periode Assessment
                </div>

                <div class="form-card-subtitle">
                    Tentukan kapan assessment mulai dan berakhir.
                </div>

            </div>


            <div class="row">

                <div class="col-md-6">

                    <div class="form-section">

                        <label class="form-label-modern">
                            Mulai Assessment
                        </label>

                        <input
                            type="datetime-local"
                            name="start_at"
                            class="form-control-modern"
                            value="{{ old(
                                'start_at',
                                $assessment->start_at
                                    ? $assessment->start_at->format('Y-m-d\TH:i')
                                    : ''
                            ) }}"
                        >

                        <small class="form-help">
                            Kosongkan jika assessment dapat dimulai kapan saja.
                        </small>

                        @error('start_at')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="form-section">

                        <label class="form-label-modern">
                            Selesai Assessment
                        </label>

                        <input
                            type="datetime-local"
                            name="end_at"
                            class="form-control-modern"
                            value="{{ old(
                                'end_at',
                                $assessment->end_at
                                    ? $assessment->end_at->format('Y-m-d\TH:i')
                                    : ''
                            ) }}"
                        >

                        <small class="form-help">
                            Kosongkan jika tidak memiliki batas waktu.
                        </small>

                        @error('end_at')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

            </div>


            {{-- =================================================
                 ACTION
            ================================================== --}}

            <div class="form-divider"></div>

            <div class="form-actions">

                <a
                    href="{{ route('owner.assessments.show', $assessment) }}"
                    class="btn btn-modern btn-light-modern"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-modern btn-dark-modern"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>


</div>

@endsection
