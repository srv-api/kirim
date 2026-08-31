@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       RESULTS PAGE
    ====================================================== */

    .results-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .results-header {
        margin-bottom: 30px;
    }

    .results-eyebrow {
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

    .results-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
    }

    .results-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .results-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       SUMMARY
    ====================================================== */

    .results-summary {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 14px;

        margin-bottom: 22px;
    }

    .result-stat-card {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 18px 20px;

        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: 14px;

        transition: all .15s ease;
    }

    .result-stat-card:hover {
        border-color: #d1d5db;

        transform: translateY(-1px);

        box-shadow: 0 6px 18px rgba(15, 23, 42, .04);
    }

    .result-stat-label {
        margin-bottom: 5px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .06em;
        text-transform: uppercase;
    }

    .result-stat-value {
        color: #111827;

        font-size: 24px;
        line-height: 1;

        font-weight: 750;

        letter-spacing: -.03em;
    }

    .result-stat-card.passed .result-stat-value {
        color: #059669;
    }

    .result-stat-card.failed .result-stat-value {
        color: #dc2626;
    }

    .result-stat-icon {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f3f4f6;

        color: #6b7280;

        font-size: 15px;
    }

    .result-stat-card.passed .result-stat-icon {
        background: #ecfdf5;
        color: #059669;
    }

    .result-stat-card.failed .result-stat-icon {
        background: #fef2f2;
        color: #dc2626;
    }


    /* =====================================================
       FILTER CARD
    ====================================================== */

    .results-filter-card {
        margin-bottom: 22px;

        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .results-filter-body {
        padding: 18px 20px;
    }

    .results-filter-body .form-label {
        margin-bottom: 6px;

        color: #6b7280;

        font-size: 11px;
        font-weight: 650;
    }

    .results-filter-body .form-control,
    .results-filter-body .form-select {
        min-height: 38px;

        border-color: #e5e7eb;
        border-radius: 9px;

        color: #374151;

        font-size: 12px;

        box-shadow: none;
    }

    .results-filter-body .form-control:focus,
    .results-filter-body .form-select:focus {
        border-color: #9ca3af;

        box-shadow: 0 0 0 3px rgba(107, 114, 128, .08);
    }

    .btn-filter-result {
        min-height: 38px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        padding: 9px 14px;

        border: 0;
        border-radius: 9px;

        background: #111827;
        color: #fff;

        font-size: 11px;
        font-weight: 650;

        transition: all .15s ease;
    }

    .btn-filter-result:hover {
        background: #000;

        color: #fff;

        transform: translateY(-1px);
    }


    /* =====================================================
       MAIN TABLE CARD
    ====================================================== */

    .results-table-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }


    /* =====================================================
       TOOLBAR
    ====================================================== */

    .results-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 20px 22px;

        border-bottom: 1px solid var(--page-border);
    }

    .toolbar-heading {
        display: flex;
        align-items: center;

        gap: 11px;
    }

    .toolbar-icon {
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

    .toolbar-title {
        margin: 0;

        color: var(--page-text);

        font-size: 14px;
        font-weight: 700;
    }

    .toolbar-description {
        margin: 3px 0 0;

        color: #9ca3af;

        font-size: 11px;
    }

    .toolbar-count {
        padding: 5px 9px;

        border-radius: 20px;

        background: #f8fafc;
        border: 1px solid #eef0f3;

        color: #6b7280;

        font-size: 10px;
        font-weight: 650;
    }


    /* =====================================================
       TABLE
    ====================================================== */

    .results-table {
        margin: 0;
    }

    .results-table thead th {
        padding: 12px 18px;

        background: #fafafa;

        border-bottom: 1px solid var(--page-border);

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .07em;

        text-transform: uppercase;

        white-space: nowrap;
    }

    .results-table tbody td {
        padding: 15px 18px;

        border-bottom: 1px solid #f3f4f6;

        color: #374151;

        font-size: 13px;

        vertical-align: middle;
    }

    .results-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .results-table tbody tr {
        transition: background .15s ease;
    }

    .results-table tbody tr:hover {
        background: #fafafa;
    }


    /* =====================================================
       NUMBER
    ====================================================== */

    .number-column {
        width: 55px;

        color: #9ca3af !important;

        font-size: 11px !important;
        font-weight: 500;
    }


    /* =====================================================
       PARTICIPANT
    ====================================================== */

    .participant-name {
        color: var(--page-text);

        font-size: 13px;
        font-weight: 650;

        line-height: 1.4;
    }

    .participant-id {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       ASSESSMENT
    ====================================================== */

    .assessment-name {
        color: var(--page-text);

        font-size: 13px;
        font-weight: 650;

        line-height: 1.4;
    }

    .assessment-id {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       SCORE
    ====================================================== */

    .result-score {
        color: #111827;

        font-size: 14px;
        font-weight: 750;
    }

    .result-score-unit {
        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       ANSWERS
    ====================================================== */

    .answer-wrapper {
        text-align: center;
    }

    .answer-value {
        color: #374151;

        font-size: 12px;
        font-weight: 650;
    }

    .answer-divider {
        color: #d1d5db;
    }

    .answer-total {
        color: #9ca3af;

        font-size: 11px;
    }


    /* =====================================================
       STATUS
    ====================================================== */

    .result-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 10px;
        font-weight: 700;

        white-space: nowrap;
    }

    .result-status.passed {
        color: #047857;
        background: #ecfdf5;
    }

    .result-status.failed {
        color: #b91c1c;
        background: #fef2f2;
    }

    .result-status i {
        font-size: 10px;
    }


    /* =====================================================
       DATE
    ====================================================== */

    .result-date {
        color: #374151;

        font-size: 12px;
        font-weight: 550;
    }

    .result-time {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       ACTION
    ====================================================== */

    .result-actions {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .result-action {
        width: 31px;
        height: 31px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #e5e7eb;
        border-radius: 8px;

        background: #fff;
        color: #6b7280;

        font-size: 12px;

        text-decoration: none;

        transition: all .15s ease;
    }

    .result-action:hover {
        color: #374151;

        background: #f3f4f6;

        border-color: #d1d5db;
    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .results-empty {
        padding: 70px 20px;

        text-align: center;
    }

    .results-empty-icon {
        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 14px;

        border-radius: 13px;

        background: #f8fafc;

        border: 1px solid #eef0f3;

        color: #9ca3af;

        font-size: 19px;
    }

    .results-empty-title {
        margin-bottom: 5px;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .results-empty-description {
        max-width: 340px;

        margin: 0 auto;

        color: #9ca3af;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =====================================================
       PAGINATION
    ====================================================== */

    .results-pagination {
        padding: 15px 20px;

        border-top: 1px solid var(--page-border);

        background: #fff;
    }

    .results-pagination .pagination {
        margin-bottom: 0;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .results-header {
            align-items: flex-start !important;

            flex-direction: column;

            gap: 15px;
        }

        .results-title {
            font-size: 25px;
        }

        .results-summary {
            grid-template-columns: 1fr;
        }

        .results-toolbar {
            align-items: flex-start;

            flex-direction: column;

            gap: 12px;
        }

        .results-table {
            min-width: 1050px;
        }

        .result-actions {
            justify-content: flex-start;
        }

    }

</style>

<div class="container-fluid results-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="results-header">

    <div class="results-eyebrow">

        <span></span>

        Assessment Management

    </div>

    <h1 class="results-title">
        Hasil Assessment
    </h1>

    <p class="results-description">
        Lihat dan pantau seluruh hasil assessment peserta.
    </p>

</div>


{{-- =====================================================
     SUMMARY
====================================================== --}}

<div class="results-summary">


    {{-- TOTAL --}}

    <div class="result-stat-card">

        <div>

            <div class="result-stat-label">
                Total Peserta
            </div>

            <div class="result-stat-value">
                {{ number_format($totalResults) }}
            </div>

        </div>

        <div class="result-stat-icon">

            <i class="bi bi-people"></i>

        </div>

    </div>


    {{-- PASSED --}}

    <div class="result-stat-card passed">

        <div>

            <div class="result-stat-label">
                Lulus
            </div>

            <div class="result-stat-value">
                {{ number_format($passedResults) }}
            </div>

        </div>

        <div class="result-stat-icon">

            <i class="bi bi-check-circle"></i>

        </div>

    </div>


    {{-- FAILED --}}

    <div class="result-stat-card failed">

        <div>

            <div class="result-stat-label">
                Tidak Lulus
            </div>

            <div class="result-stat-value">
                {{ number_format($failedResults) }}
            </div>

        </div>

        <div class="result-stat-icon">

            <i class="bi bi-x-circle"></i>

        </div>

    </div>

</div>


{{-- =====================================================
     FILTER
====================================================== --}}

<div class="results-filter-card">

    {{-- FILTER BODY --}}

    <div class="results-filter-body">

        <form method="GET">

            <div class="row g-3">


                {{-- SEARCH --}}

                <div class="col-md-4">

                    <label class="form-label">
                        Cari
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Nama peserta atau assessment..."
                        value="{{ request('search') }}"
                    >

                </div>


                {{-- ASSESSMENT --}}

                <div class="col-md-3">

                    <label class="form-label">
                        Assessment
                    </label>

                    <select
                        name="assessment_id"
                        class="form-select"
                    >

                        <option value="">
                            Semua Assessment
                        </option>

                        @foreach($assessments as $assessment)

                            <option
                                value="{{ $assessment->id }}"
                                @selected(
                                    request('assessment_id')
                                    == $assessment->id
                                )
                            >
                                {{ $assessment->title }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- STATUS --}}

                <div class="col-md-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="passed"
                            @selected(
                                request('status') === 'passed'
                            )
                        >
                            Lulus
                        </option>

                        <option
                            value="failed"
                            @selected(
                                request('status') === 'failed'
                            )
                        >
                            Tidak Lulus
                        </option>

                    </select>

                </div>


                {{-- BUTTON --}}

                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn-filter-result w-100"
                    >

                        <i class="bi bi-search"></i>

                        Filter

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     MAIN TABLE
====================================================== --}}

<div class="results-table-card">


    {{-- =================================================
         TOOLBAR
    ================================================== --}}

    <div class="results-toolbar">

        <div class="toolbar-heading">

            <div class="toolbar-icon">

                <i class="bi bi-bar-chart"></i>

            </div>


            <div>

                <h2 class="toolbar-title">
                    Daftar Hasil
                </h2>

                <p class="toolbar-description">
                    Semua hasil assessment peserta.
                </p>

            </div>

        </div>


        <div class="toolbar-count">

            {{ number_format($results->total()) }}

            hasil

        </div>

    </div>


    {{-- =================================================
         TABLE
    ================================================== --}}

    <div class="table-responsive">

        <table class="table results-table align-middle">

            <thead>

                <tr>

                    <th class="number-column">
                        #
                    </th>

                    <th>
                        Peserta
                    </th>

                    <th>
                        Assessment
                    </th>

                    <th class="text-center">
                        Nilai
                    </th>

                    <th class="text-center">
                        Jawaban
                    </th>

                    <th class="text-center">
                        Status
                    </th>

                    <th>
                        Tanggal
                    </th>

                    <th class="text-center">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($results as $result)

                    <tr>


                        {{-- NUMBER --}}

                        <td class="number-column">

                            {{ $results->firstItem() + $loop->index }}

                        </td>


                        {{-- PARTICIPANT --}}

                        <td>

                            <div class="participant-name">

                                {{
                                    $result->participant->name
                                    ?? '—'
                                }}

                            </div>

                            <div class="participant-id">

                                Peserta #{{ $result->participant_id }}

                            </div>

                        </td>


                        {{-- ASSESSMENT --}}

                        <td>

                            <div class="assessment-name">

                                {{
                                    $result->assessment->title
                                    ?? '—'
                                }}

                            </div>

                            <div class="assessment-id">

                                Assessment #{{ $result->assessment_id }}

                            </div>

                        </td>


                        {{-- SCORE --}}

                        <td class="text-center">

                            <span class="result-score">

                                {{
                                    number_format(
                                        $result->score,
                                        0
                                    )
                                }}

                            </span>

                            <span class="result-score-unit">
                                poin
                            </span>

                        </td>


                        {{-- ANSWERS --}}

                        <td class="text-center">

                            <div class="answer-wrapper">

                                <span class="answer-value">

                                    {{ $result->correct_answers }}

                                </span>

                                <span class="answer-divider">
                                    /
                                </span>

                                <span class="answer-total">

                                    {{ $result->total_questions }}

                                </span>

                            </div>

                        </td>


                        {{-- STATUS --}}

                        <td class="text-center">

                            @if($result->status === 'passed')

                                <span class="result-status passed">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Lulus

                                </span>

                            @else

                                <span class="result-status failed">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Tidak Lulus

                                </span>

                            @endif

                        </td>


                        {{-- DATE --}}

                        <td>

                            <div class="result-date">

                                {{
                                    $result->created_at
                                    ? $result->created_at->format('d M Y')
                                    : '—'
                                }}

                            </div>

                            <div class="result-time">

                                {{
                                    $result->created_at
                                    ? $result->created_at->format('H:i')
                                    : ''
                                }}

                            </div>

                        </td>


                        {{-- ACTION --}}

                        <td>

                            <div class="result-actions">

                                <a
                                    href="{{ route(
                                        'owner.results.show',
                                        $result->id
                                    ) }}"
                                    class="result-action"
                                    title="Lihat Detail"
                                >

                                    <i class="bi bi-eye"></i>

                                </a>

                            </div>

                        </td>

                    </tr>


                @empty


                    {{-- EMPTY STATE --}}

                    <tr>

                        <td colspan="8">

                            <div class="results-empty">

                                <div class="results-empty-icon">

                                    <i class="bi bi-bar-chart"></i>

                                </div>

                                <div class="results-empty-title">

                                    Belum ada hasil assessment

                                </div>

                                <p class="results-empty-description">

                                    Hasil assessment akan muncul
                                    setelah peserta menyelesaikan
                                    assessment.

                                </p>

                            </div>

                        </td>

                    </tr>


                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =================================================
         PAGINATION
    ================================================== --}}

    @if($results->hasPages())

        <div class="results-pagination">

            {{ $results->links() }}

        </div>

    @endif


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
