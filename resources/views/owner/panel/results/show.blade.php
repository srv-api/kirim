@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       RESULT DETAIL PAGE
    ====================================================== */

    .result-detail-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .result-detail-header {
        margin-bottom: 30px;
    }

    .result-detail-eyebrow {
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

    .result-detail-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
    }

    .result-detail-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .result-detail-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       BACK BUTTON
    ====================================================== */

    .btn-result-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 9px 13px;

        border: 1px solid #e5e7eb;
        border-radius: 9px;

        background: #fff;
        color: #6b7280;

        font-size: 11px;
        font-weight: 650;

        text-decoration: none;

        transition: all .15s ease;
    }

    .btn-result-back:hover {
        background: #f9fafb;
        border-color: #d1d5db;

        color: #111827;
    }

    .btn-result-back i {
        font-size: 12px;
    }


    /* =====================================================
       INFORMATION CARD
    ====================================================== */

    .result-info-card {
        margin-bottom: 18px;

        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .result-card-header {
        display: flex;
        align-items: center;
        gap: 11px;

        padding: 18px 20px;

        border-bottom: 1px solid var(--page-border);
    }

    .result-card-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #f3f4f6;
        color: #374151;

        font-size: 14px;
    }

    .result-card-title {
        margin: 0;

        color: var(--page-text);

        font-size: 14px;
        font-weight: 700;
    }

    .result-card-description {
        margin: 3px 0 0;

        color: #9ca3af;

        font-size: 11px;
    }

    .result-card-body {
        padding: 20px;
    }


    /* =====================================================
       INFORMATION ITEM
    ====================================================== */

    .result-info-label {
        margin-bottom: 5px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .05em;
        text-transform: uppercase;
    }

    .result-info-value {
        color: #111827;

        font-size: 14px;
        font-weight: 650;

        line-height: 1.45;
    }

    .result-info-value.large {
        font-size: 16px;
    }

    .result-info-secondary {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       SCORE CARD
    ====================================================== */

    .result-score-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .result-score-body {
        padding: 28px 20px;

        text-align: center;
    }

    .result-score-label {
        margin-bottom: 7px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .07em;
        text-transform: uppercase;
    }

    .result-score {
        margin-bottom: 6px;

        font-size: 54px;
        line-height: 1;

        font-weight: 750;

        letter-spacing: -.05em;
    }

    .result-score.passed {
        color: #059669;
    }

    .result-score.failed {
        color: #dc2626;
    }

    .result-passing {
        color: #9ca3af;

        font-size: 11px;
    }


    /* =====================================================
       STATUS
    ====================================================== */

    .result-status-box {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 8px;

        margin-top: 22px;

        padding: 11px 14px;

        border-radius: 10px;

        font-size: 11px;
    }

    .result-status-box.passed {
        background: #ecfdf5;

        color: #047857;
    }

    .result-status-box.failed {
        background: #fef2f2;

        color: #b91c1c;
    }

    .result-status-box i {
        font-size: 13px;
    }


    /* =====================================================
       SUBMIT TIME
    ====================================================== */

    .result-submit-card {
        margin-top: 18px;

        padding: 17px 20px;

        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);
    }

    .result-submit-heading {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .result-submit-icon {
        width: 32px;
        height: 32px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #f3f4f6;
        color: #6b7280;

        font-size: 13px;
    }

    .result-submit-label {
        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .05em;
        text-transform: uppercase;
    }

    .result-submit-value {
        margin-top: 3px;

        color: #374151;

        font-size: 12px;
        font-weight: 600;
    }


    /* =====================================================
       SCORE SUMMARY
    ====================================================== */

    .score-summary {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 12px;

        margin-top: 20px;
    }

    .score-summary-item {
        padding: 14px;

        border: 1px solid #f0f1f3;
        border-radius: 10px;

        background: #fafafa;
    }

    .score-summary-label {
        margin-bottom: 4px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 650;
    }

    .score-summary-value {
        color: #111827;

        font-size: 17px;
        font-weight: 750;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .result-detail-header {
            align-items: flex-start !important;

            flex-direction: column;

            gap: 15px;
        }

        .result-detail-title {
            font-size: 25px;
        }

        .btn-result-back {
            width: 100%;

            justify-content: center;
        }

        .score-summary {
            grid-template-columns: 1fr;
        }

    }

</style>

<div class="container-fluid result-detail-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="result-detail-header d-flex justify-content-between align-items-center">

    <div>

        <div class="result-detail-eyebrow">

            <span></span>

            Assessment Management

        </div>

        <h1 class="result-detail-title">
            Detail Hasil Assessment
        </h1>

        <p class="result-detail-description">
            Informasi lengkap hasil assessment peserta.
        </p>

    </div>


    <a
        href="{{ route('owner.results.index') }}"
        class="btn-result-back"
    >

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>


{{-- =====================================================
     CONTENT
====================================================== --}}

<div class="row g-4">


    {{-- =================================================
         LEFT CONTENT
    ================================================== --}}

    <div class="col-lg-8">


        {{-- =================================================
             PESERTA
        ================================================== --}}

        <div class="result-info-card">

            <div class="result-card-header">

                <div class="result-card-icon">

                    <i class="bi bi-person"></i>

                </div>

                <div>

                    <h2 class="result-card-title">
                        Informasi Peserta
                    </h2>

                    <p class="result-card-description">
                        Data peserta yang mengerjakan assessment.
                    </p>

                </div>

            </div>


            <div class="result-card-body">

                <div class="row g-4">

                    <div class="col-md-6">

                        <div class="result-info-label">
                            Nama Peserta
                        </div>

                        <div class="result-info-value large">

                            {{
                                $result->participant->name
                                ?? '—'
                            }}

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="result-info-label">
                            ID Peserta
                        </div>

                        <div class="result-info-value">

                            #{{ $result->participant_id }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             ASSESSMENT
        ================================================== --}}

        <div class="result-info-card">

            <div class="result-card-header">

                <div class="result-card-icon">

                    <i class="bi bi-file-earmark-text"></i>

                </div>

                <div>

                    <h2 class="result-card-title">
                        Assessment
                    </h2>

                    <p class="result-card-description">
                        Informasi assessment yang dikerjakan peserta.
                    </p>

                </div>

            </div>


            <div class="result-card-body">


                <div class="mb-4">

                    <div class="result-info-label">
                        Nama Assessment
                    </div>

                    <div class="result-info-value large">

                        {{
                            $result->assessment->title
                            ?? '—'
                        }}

                    </div>

                </div>


                <div class="score-summary">


                    <div class="score-summary-item">

                        <div class="score-summary-label">
                            Total Soal
                        </div>

                        <div class="score-summary-value">

                            {{ $result->total_questions }}

                        </div>

                    </div>


                    <div class="score-summary-item">

                        <div class="score-summary-label">
                            Jawaban Benar
                        </div>

                        <div class="score-summary-value">

                            {{ $result->correct_answers }}

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>


    {{-- =================================================
         RIGHT CONTENT
    ================================================== --}}

    <div class="col-lg-4">


        {{-- =================================================
             SCORE
        ================================================== --}}

        <div class="result-score-card">

            <div class="result-score-body">

                <div class="result-score-label">
                    Nilai Assessment
                </div>


                <div
                    class="result-score
                    {{ $result->status === 'passed'
                        ? 'passed'
                        : 'failed'
                    }}"
                >

                    {{
                        number_format(
                            $result->score,
                            0
                        )
                    }}

                </div>


                <div class="result-passing">

                    Passing Score:

                    <strong>

                        {{
                            $result->assessment->passing_score
                            ?? 0
                        }}

                    </strong>

                </div>


                {{-- STATUS --}}

                @if($result->status === 'passed')

                    <div class="result-status-box passed">

                        <i class="bi bi-check-circle-fill"></i>

                        <span>

                            Peserta dinyatakan
                            <strong>LULUS</strong>

                        </span>

                    </div>

                @else

                    <div class="result-status-box failed">

                        <i class="bi bi-x-circle-fill"></i>

                        <span>

                            Peserta dinyatakan
                            <strong>TIDAK LULUS</strong>

                        </span>

                    </div>

                @endif

            </div>

        </div>


        {{-- =================================================
             SUBMIT TIME
        ================================================== --}}

        <div class="result-submit-card">

            <div class="result-submit-heading">

                <div class="result-submit-icon">

                    <i class="bi bi-clock"></i>

                </div>

                <div>

                    <div class="result-submit-label">
                        Waktu Submit
                    </div>

                    <div class="result-submit-value">

                        {{
                            $result->created_at
                            ? $result->created_at->format(
                                'd F Y, H:i'
                            )
                            : '—'
                        }}

                    </div>

                </div>

            </div>

        </div>

    </div>

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