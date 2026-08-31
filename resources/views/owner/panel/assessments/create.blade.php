@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       CREATE ASSESSMENT
    ====================================================== */

    .create-assessment-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-soft: #f8fafc;
        --page-radius: 16px;

        padding-bottom: 40px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .create-header {
        margin-bottom: 28px;
    }

    .create-eyebrow {
        display: flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 7px;

        color: #9ca3af;

        font-size: 11px;
        font-weight: 700;

        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .create-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow:
            0 0 0 4px rgba(5, 150, 105, .08);
    }

    .create-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;

        font-weight: 750;

        letter-spacing: -.035em;
    }

    .create-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       FORM CARD
    ====================================================== */

    .create-card {
        background: #fff;

        border: 1px solid var(--page-border);

        border-radius: var(--page-radius);

        overflow: hidden;
    }


    /* =====================================================
       CARD HEADER
    ====================================================== */

    .create-card-header {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 20px 24px;

        border-bottom: 1px solid var(--page-border);
    }

    .create-card-icon {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f3f4f6;

        color: #374151;

        font-size: 16px;
    }

    .create-card-title {
        margin: 0;

        color: var(--page-text);

        font-size: 14px;
        font-weight: 700;
    }

    .create-card-description {
        margin: 3px 0 0;

        color: #9ca3af;

        font-size: 11px;
    }


    /* =====================================================
       FORM BODY
    ====================================================== */

    .create-card-body {
        padding: 26px 24px;
    }


    /* =====================================================
       FORM SECTION
    ====================================================== */

    .form-section {
        margin-bottom: 28px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .form-section-title {
        display: flex;
        align-items: center;
        gap: 7px;

        margin-bottom: 17px;

        color: #374151;

        font-size: 12px;
        font-weight: 700;

        letter-spacing: .01em;
    }

    .form-section-title i {
        color: #9ca3af;

        font-size: 13px;
    }

    .form-section-title::after {
        content: "";

        flex: 1;

        height: 1px;

        margin-left: 4px;

        background: #f1f5f9;
    }


    /* =====================================================
       FORM GROUP
    ====================================================== */

    .assessment-form-group {
        margin-bottom: 18px;
    }

    .assessment-form-group:last-child {
        margin-bottom: 0;
    }

    .assessment-label {
        display: block;

        margin-bottom: 7px;

        color: #374151;

        font-size: 12px;
        font-weight: 650;
    }

    .required-mark {
        color: #dc2626;
        margin-left: 2px;
    }


    /* =====================================================
       INPUT
    ====================================================== */

    .assessment-input,
    .assessment-select,
    .assessment-textarea {

        width: 100%;

        border: 1px solid #dfe3e8;

        border-radius: 9px;

        background: #fff;

        color: #111827;

        font-size: 13px;

        transition:
            border-color .15s ease,
            box-shadow .15s ease,
            background .15s ease;
    }

    .assessment-input,
    .assessment-select {

        min-height: 42px;

        padding: 9px 12px;
    }

    .assessment-textarea {

        min-height: 110px;

        padding: 11px 12px;

        resize: vertical;

        line-height: 1.6;
    }

    .assessment-input::placeholder,
    .assessment-textarea::placeholder {
        color: #b6bbc3;
    }

    .assessment-input:hover,
    .assessment-select:hover,
    .assessment-textarea:hover {
        border-color: #cbd0d7;
    }

    .assessment-input:focus,
    .assessment-select:focus,
    .assessment-textarea:focus {

        border-color: #9ca3af;

        background: #fff;

        box-shadow:
            0 0 0 3px rgba(17, 24, 39, .05);

        outline: none;
    }


    /* =====================================================
       INPUT WITH SUFFIX
    ====================================================== */

    .input-with-suffix {
        position: relative;
    }

    .input-with-suffix .assessment-input {
        padding-right: 65px;
    }

    .input-suffix {
        position: absolute;

        top: 0;
        right: 12px;

        height: 100%;

        display: flex;
        align-items: center;

        color: #9ca3af;

        font-size: 11px;

        pointer-events: none;
    }


    /* =====================================================
       HELPER
    ====================================================== */

    .assessment-help {
        display: flex;
        align-items: flex-start;
        gap: 5px;

        margin-top: 6px;

        color: #9ca3af;

        font-size: 10px;

        line-height: 1.5;
    }

    .assessment-help i {
        margin-top: 1px;
        font-size: 10px;
    }


    /* =====================================================
       ERROR
    ====================================================== */

    .assessment-error {
        margin-top: 6px;

        color: #dc2626;

        font-size: 11px;
    }

    .assessment-input.is-invalid,
    .assessment-select.is-invalid,
    .assessment-textarea.is-invalid {
        border-color: #fca5a5;
    }


    /* =====================================================
       STATUS INFO
    ====================================================== */

    .status-info {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        margin-top: 8px;

        padding: 11px 12px;

        border: 1px solid #eef0f3;

        border-radius: 9px;

        background: #ffde59;

        color: #000;

        font-size: 10px;

        line-height: 1.5;
    }

    .status-info i {
        color: #9ca3af;

        font-size: 13px;
    }


 


    /* =====================================================
       FORM FOOTER
    ====================================================== */

    .create-card-footer {

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        padding: 18px 24px;

        border-top: 1px solid var(--page-border);

        background: #fafafa;
    }

    .footer-note {
        display: flex;
        align-items: center;
        gap: 6px;

        color: #9ca3af;

        font-size: 10px;
    }

    .footer-note i {
        font-size: 11px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }


    /* =====================================================
       BUTTONS
    ====================================================== */

    .btn-cancel-assessment,
    .btn-save-assessment {

        min-height: 39px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        padding: 8px 14px;

        border-radius: 9px;

        font-size: 12px;
        font-weight: 650;

        text-decoration: none;

        transition: all .18s ease;
    }

    .btn-cancel-assessment {

        border: 1px solid #e5e7eb;

        background: #fff;

        color: #6b7280;
    }

    .btn-cancel-assessment:hover {

        color: #111827;

        background: #f9fafb;

        border-color: #d1d5db;
    }

    .btn-save-assessment {

        border: 1px solid #111827;

        background: #111827;

        color: #fff;
    }

    .btn-save-assessment:hover {

        background: #000;

        border-color: #000;

        color: #fff;

        transform: translateY(-1px);

        box-shadow:
            0 7px 18px rgba(15, 23, 42, .12);
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .create-header {
            margin-bottom: 22px;
        }

        .create-title {
            font-size: 25px;
        }

        .create-card-header,
        .create-card-body,
        .create-card-footer {
            padding-left: 18px;
            padding-right: 18px;
        }

        .create-card-footer {

            align-items: stretch;

            flex-direction: column;
        }

        .footer-note {
            justify-content: center;
        }

        .form-actions {
            width: 100%;
        }

        .btn-cancel-assessment,
        .btn-save-assessment {
            flex: 1;
        }

    }

</style>


<div class="container-fluid create-assessment-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="create-header">

        <div class="create-eyebrow">
            <span></span>
            Assessment Management
        </div>

        <h1 class="create-title">
            Buat Assessment
        </h1>

        <p class="create-description">
            Buat assessment baru dan tentukan pengaturan pengerjaannya.
        </p>

    </div>


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="create-card">


        {{-- =================================================
             CARD HEADER
        ================================================== --}}

        <div class="create-card-header">

            <div class="create-card-icon">

                <i class="bi bi-clipboard-plus"></i>

            </div>

            <div>

                <h2 class="create-card-title">
                    Informasi Assessment
                </h2>

                <p class="create-card-description">
                    Lengkapi informasi utama assessment.
                </p>

            </div>

        </div>


        {{-- =================================================
             FORM
        ================================================== --}}

        <form
            method="POST"
            action="{{ route('owner.assessments.store') }}"
        >

            @csrf


            <div class="create-card-body">



                {{-- =================================================
                     BASIC INFORMATION
                ================================================== --}}

                <div class="form-section">

                    <div class="form-section-title">

                        <i class="bi bi-info-circle"></i>

                        Informasi Dasar

                    </div>


                    {{-- TITLE --}}

                    <div class="assessment-form-group">

                        <label class="assessment-label">

                            Judul Assessment

                            <span class="required-mark">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="assessment-input @error('title') is-invalid @enderror"
                            placeholder="Contoh: Assessment Kompetensi Dasar"
                            required
                            autofocus
                        >

                        @error('title')

                            <div class="assessment-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- DESCRIPTION --}}

                    <div class="assessment-form-group">

                        <label class="assessment-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="assessment-textarea @error('description') is-invalid @enderror"
                            placeholder="Jelaskan tujuan atau informasi mengenai assessment ini..."
                        >{{ old('description') }}</textarea>

                        @error('description')

                            <div class="assessment-error">
                                {{ $message }}
                            </div>

                        @enderror

                        <div class="assessment-help">

                            <i class="bi bi-info-circle"></i>

                            <span>
                                Deskripsi akan membantu peserta memahami
                                tujuan assessment.
                            </span>

                        </div>

                    </div>


                    {{-- CATEGORY --}}

                    <div class="assessment-form-group">

                        <label class="assessment-label">

                            Kategori

                        </label>

                        <input
                            type="text"
                            name="category"
                            value="{{ old('category') }}"
                            class="assessment-input @error('category') is-invalid @enderror"
                            placeholder="Contoh: Kompetensi, Psikologi, Akademik"
                        >

                        @error('category')

                            <div class="assessment-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- =================================================
                     ASSESSMENT SETTINGS
                ================================================== --}}

                <div class="form-section">

                    <div class="form-section-title">

                        <i class="bi bi-sliders"></i>

                        Pengaturan Assessment

                    </div>


                    <div class="row">


                        {{-- DURATION --}}

                        <div class="col-md-4">

                            <div class="assessment-form-group">

                                <label class="assessment-label">

                                    Durasi

                                    <span class="required-mark">
                                        *
                                    </span>

                                </label>

                                <div class="input-with-suffix">

                                    <input
                                        type="number"
                                        name="duration"
                                        value="{{ old('duration', 60) }}"
                                        min="1"
                                        class="assessment-input @error('duration') is-invalid @enderror"
                                        required
                                    >

                                    <span class="input-suffix">
                                        menit
                                    </span>

                                </div>

                                @error('duration')

                                    <div class="assessment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        {{-- PASSING SCORE --}}

                        <div class="col-md-4">

                            <div class="assessment-form-group">

                                <label class="assessment-label">

                                    Passing Score

                                    <span class="required-mark">
                                        *
                                    </span>

                                </label>

                                <div class="input-with-suffix">

                                    <input
                                        type="number"
                                        name="passing_score"
                                        value="{{ old('passing_score', 70) }}"
                                        min="0"
                                        max="100"
                                        class="assessment-input @error('passing_score') is-invalid @enderror"
                                        required
                                    >

                                    <span class="input-suffix">
                                        %
                                    </span>

                                </div>

                                @error('passing_score')

                                    <div class="assessment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        {{-- STATUS --}}

                        <div class="col-md-4">

                            <div class="assessment-form-group">

                                <label class="assessment-label">

                                    Status

                                    <span class="required-mark">
                                        *
                                    </span>

                                </label>

                                <select
                                    name="status"
                                    class="assessment-select @error('status') is-invalid @enderror"
                                    required
                                >

                                    <option
                                        value="draft"
                                        @selected(old('status', 'draft') === 'draft')
                                    >
                                        Draft
                                    </option>

                                    <option
                                        value="active"
                                        @selected(old('status') === 'active')
                                    >
                                        Active
                                    </option>

                                    <option
                                        value="inactive"
                                        @selected(old('status') === 'inactive')
                                    >
                                        Inactive
                                    </option>

                                </select>

                                @error('status')

                                    <div class="assessment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>


                    <div class="status-info">

                        <i class="bi bi-lightbulb"></i>

                        <span>
                            Gunakan status <strong>Draft</strong> jika
                            assessment masih dalam tahap penyusunan.
                            Pilih <strong>Active</strong> ketika assessment
                            sudah siap dikerjakan peserta.
                        </span>

                    </div>

                </div>


                {{-- =================================================
                     SCHEDULE
                ================================================== --}}

                <div class="form-section">

                    <div class="form-section-title">

                        <i class="bi bi-calendar3"></i>

                        Jadwal Pengerjaan

                    </div>


                    <div class="row">


                        {{-- START --}}

                        <div class="col-md-6">

                            <div class="assessment-form-group">

                                <label class="assessment-label">

                                    Mulai

                                </label>

                                <input
                                    type="datetime-local"
                                    name="start_at"
                                    value="{{ old('start_at') }}"
                                    class="assessment-input @error('start_at') is-invalid @enderror"
                                >

                                @error('start_at')

                                    <div class="assessment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <div class="assessment-help">

                                    <i class="bi bi-info-circle"></i>

                                    <span>
                                        Kosongkan jika assessment dapat
                                        dimulai kapan saja.
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- END --}}

                        <div class="col-md-6">

                            <div class="assessment-form-group">

                                <label class="assessment-label">

                                    Selesai

                                </label>

                                <input
                                    type="datetime-local"
                                    name="end_at"
                                    value="{{ old('end_at') }}"
                                    class="assessment-input @error('end_at') is-invalid @enderror"
                                >

                                @error('end_at')

                                    <div class="assessment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <div class="assessment-help">

                                    <i class="bi bi-info-circle"></i>

                                    <span>
                                        Tentukan batas akhir pengerjaan
                                        jika diperlukan.
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 FOOTER
            ================================================== --}}

            <div class="create-card-footer">

                <div class="footer-note">

                    <i class="bi bi-lock"></i>

                    Data assessment akan disimpan secara aman.

                </div>


                <div class="form-actions">

                    <a
                        href="{{ route('owner.assessments.index') }}"
                        class="btn-cancel-assessment"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn-save-assessment"
                    >

                        <i class="bi bi-check-lg"></i>

                        Buat Assessment

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     BOOTSTRAP ICONS
====================================================== --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection

