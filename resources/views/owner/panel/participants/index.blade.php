@extends('dashboard')

@section('content')

<style>

/* =====================================================
   PARTICIPANTS PAGE
====================================================== */

.participants-page {

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

.participants-header {
    margin-bottom: 28px;
}

.participants-eyebrow {

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

.participants-eyebrow span {

    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: #059669;

    box-shadow:
        0 0 0 4px rgba(5, 150, 105, .08);
}

.participants-title {

    margin: 0;

    color: var(--page-text);

    font-size: 28px;
    line-height: 1.2;

    font-weight: 750;

    letter-spacing: -.035em;
}

.participants-description {

    margin: 7px 0 0;

    color: var(--page-muted);

    font-size: 13px;
}


/* =====================================================
   FILTER CARD
====================================================== */

.participants-filter {

    margin-bottom: 18px;

    background: #fff;

    border: 1px solid var(--page-border);

    border-radius: var(--page-radius);

    overflow: hidden;
}

.participants-filter-body {

    padding: 20px 24px;
}


/* =====================================================
   FILTER GROUP
====================================================== */

.participant-filter-group {
    margin-bottom: 0;
}

.participant-filter-label {

    display: block;

    margin-bottom: 7px;

    color: #374151;

    font-size: 11px;
    font-weight: 700;

    letter-spacing: .04em;

    text-transform: uppercase;
}


/* =====================================================
   INPUT WRAPPER
====================================================== */

.participant-input-wrap {
    position: relative;
}

.participant-input-icon {

    position: absolute;

    top: 50%;
    left: 13px;

    z-index: 2;

    transform: translateY(-50%);

    color: #9ca3af;

    font-size: 13px;

    pointer-events: none;
}


/* =====================================================
   INPUT
====================================================== */

.participant-input {

    width: 100%;

    min-height: 42px;

    padding: 9px 12px 9px 38px;

    border: 1px solid #dfe3e8;

    border-radius: 9px;

    background: #fff;

    color: #111827;

    font-size: 13px;

    box-shadow: none;

    transition:
        border-color .15s ease,
        box-shadow .15s ease;
}

.participant-input::placeholder {
    color: #b6bbc3;
}

.participant-input:hover {
    border-color: #cbd0d7;
}

.participant-input:focus {

    border-color: #9ca3af;

    box-shadow:
        0 0 0 3px rgba(17, 24, 39, .05);

    outline: none;
}


/* =====================================================
   SEARCH BUTTON
====================================================== */

.btn-participant-search {

    width: 100%;

    min-height: 42px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 7px;

    padding: 9px 14px;

    border: 1px solid #111827;

    border-radius: 9px;

    background: #111827;

    color: #fff;

    font-size: 12px;

    font-weight: 650;

    transition: all .18s ease;
}

.btn-participant-search:hover {

    border-color: #000;

    background: #000;

    color: #fff;

    transform: translateY(-1px);

    box-shadow:
        0 7px 18px rgba(15, 23, 42, .12);
}


/* =====================================================
   TABLE CARD
====================================================== */

.participants-table-card {

    background: #fff;

    border: 1px solid var(--page-border);

    border-radius: var(--page-radius);

    overflow: hidden;
}


/* =====================================================
   TABLE HEADER
====================================================== */

.participants-table-header {

    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding: 18px 24px;

    border-bottom: 1px solid var(--page-border);

    background: #fff;
}

.participants-table-heading {

    display: flex;

    align-items: center;

    gap: 11px;
}

.participants-table-icon {

    width: 36px;
    height: 36px;

    flex: 0 0 36px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #f3f4f6;

    color: #374151;

    font-size: 15px;
}

.participants-table-title {

    margin: 0;

    color: #111827;

    font-size: 14px;

    font-weight: 700;
}

.participants-table-subtitle {

    margin: 3px 0 0;

    color: #9ca3af;

    font-size: 10px;
}


/* =====================================================
   TABLE
====================================================== */

.participants-table {

    width: 100%;

    margin: 0;

    border-collapse: separate;

    border-spacing: 0;

    color: #374151;

    font-size: 12px;
}

.participants-table thead th {

    padding: 12px 14px;

    border-bottom: 1px solid #eef0f3;

    background: #fafafa;

    color: #9ca3af;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: .05em;

    text-transform: uppercase;

    white-space: nowrap;
}

.participants-table thead th:first-child {
    padding-left: 24px;
}

.participants-table thead th:last-child {
    padding-right: 24px;
}

.participants-table tbody td {

    padding: 15px 14px;

    border-bottom: 1px solid #f1f5f9;

    vertical-align: middle;
}

.participants-table tbody tr:last-child td {
    border-bottom: 0;
}

.participants-table tbody tr {

    transition:
        background-color .15s ease;
}

.participants-table tbody tr:hover {
    background: #fafafa;
}


/* =====================================================
   NUMBER
====================================================== */

.participant-number {

    padding-left: 24px !important;

    color: #9ca3af;

    font-size: 11px;

    font-weight: 600;
}


/* =====================================================
   PARTICIPANT
====================================================== */

.participant-profile {

    display: flex;

    align-items: center;

    gap: 11px;

    min-width: 190px;
}

.participant-avatar {

    width: 38px;
    height: 38px;

    flex: 0 0 38px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #111827;

    color: #fff;

    font-size: 12px;

    font-weight: 700;
}

.participant-name {

    margin: 0;

    color: #111827;

    font-size: 12px;

    font-weight: 650;

    line-height: 1.4;
}

.participant-id {

    display: block;

    margin-top: 2px;

    color: #9ca3af;

    font-size: 10px;
}


/* =====================================================
   ASSESSMENT
====================================================== */

.participant-assessment {

    min-width: 160px;
}

.participant-assessment-title {

    color: #374151;

    font-size: 12px;

    font-weight: 650;

    line-height: 1.4;
}

.participant-assessment-id {

    display: block;

    margin-top: 3px;

    color: #9ca3af;

    font-size: 10px;
}


/* =====================================================
   SCORE
====================================================== */

.participant-score {

    display: inline-flex;

    align-items: baseline;

    gap: 2px;

    color: #111827;
}

.participant-score-value {

    font-size: 15px;

    font-weight: 750;
}

.participant-score-label {

    color: #9ca3af;

    font-size: 9px;
}


/* =====================================================
   CORRECT ANSWERS
====================================================== */

.participant-correct {

    color: #374151;

    font-size: 12px;

    font-weight: 650;

    white-space: nowrap;
}

.participant-correct-total {
    color: #9ca3af;

    font-weight: 500;
}


/* =====================================================
   STATUS
====================================================== */

.participant-status {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    min-width: 88px;

    justify-content: center;

    padding: 5px 9px;

    border-radius: 7px;

    font-size: 9px;

    font-weight: 700;

    letter-spacing: .03em;
}

.participant-status::before {

    content: "";

    width: 5px;
    height: 5px;

    border-radius: 50%;
}

.participant-status.passed {

    background: #ecfdf5;

    color: #047857;
}

.participant-status.passed::before {
    background: #10b981;
}

.participant-status.failed {

    background: #fef2f2;

    color: #b91c1c;
}

.participant-status.failed::before {
    background: #ef4444;
}


/* =====================================================
   DATE
====================================================== */

.participant-date {

    min-width: 90px;

    color: #374151;

    font-size: 11px;

    line-height: 1.5;
}

.participant-time {

    display: block;

    color: #9ca3af;

    font-size: 10px;
}


/* =====================================================
   EMPTY STATE
====================================================== */

.participants-empty {

    padding: 55px 20px !important;

    text-align: center;
}

.participants-empty-icon {

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 14px;

    border-radius: 12px;

    background: #f3f4f6;

    color: #9ca3af;

    font-size: 20px;
}

.participants-empty-title {

    margin-bottom: 4px;

    color: #374151;

    font-size: 13px;

    font-weight: 700;
}

.participants-empty-text {

    color: #9ca3af;

    font-size: 10px;
}


/* =====================================================
   PAGINATION
====================================================== */

.participants-pagination {

    padding: 15px 24px;

    border-top: 1px solid var(--page-border);

    background: #fafafa;
}

.participants-pagination .pagination {
    margin: 0;
}

.participants-pagination .page-link {

    border-color: #e5e7eb;

    color: #6b7280;

    font-size: 11px;

    box-shadow: none;
}

.participants-pagination .page-link:hover {

    background: #f9fafb;

    color: #111827;

    border-color: #d1d5db;
}

.participants-pagination .page-item.active .page-link {

    border-color: #111827;

    background: #111827;

    color: #fff;
}


/* =====================================================
   SUMMARY
====================================================== */

.participants-summary {

    margin-top: 18px;
}

.participant-summary-card {

    height: 100%;

    padding: 18px 20px;

    background: #fff;

    border: 1px solid var(--page-border);

    border-radius: 14px;
}

.participant-summary-top {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

    margin-bottom: 11px;
}

.participant-summary-label {

    color: #9ca3af;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: .04em;

    text-transform: uppercase;
}

.participant-summary-icon {

    width: 30px;
    height: 30px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #f3f4f6;

    color: #6b7280;

    font-size: 12px;
}

.participant-summary-value {

    color: #111827;

    font-size: 25px;

    line-height: 1;

    font-weight: 750;

    letter-spacing: -.03em;
}


/* =====================================================
   RESPONSIVE
====================================================== */

@media (max-width: 992px) {

    .participants-table-card {
        overflow: hidden;
    }

    .participants-table {
        min-width: 900px;
    }

    .participants-table-wrapper {
        overflow-x: auto;
    }

}


@media (max-width: 768px) {

    .participants-header {
        margin-bottom: 22px;
    }

    .participants-title {
        font-size: 25px;
    }

    .participants-filter-body {
        padding: 18px;
    }

    .participants-table-header {
        padding: 16px 18px;
    }

    .participants-pagination {
        padding: 14px 18px;
    }

    .participants-summary {
        margin-top: 14px;
    }

}


/* =====================================================
   SMALL MOBILE
====================================================== */

@media (max-width: 576px) {

    .participants-page {
        padding-left: 0;
        padding-right: 0;
    }

    .participants-title {
        font-size: 23px;
    }

    .participants-description {
        font-size: 12px;
    }

    .participants-filter {
        border-radius: 12px;
    }

    .participants-table-card {
        border-radius: 12px;
    }

    .participants-table-header {
        align-items: flex-start;
    }

    .participant-summary-card {
        padding: 16px;
    }

}

</style>

<div class="container-fluid participants-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="participants-header">

    <div class="participants-eyebrow">

        <span></span>

        Assessment Management

    </div>

    <h1 class="participants-title">

        Data Peserta

    </h1>

    <p class="participants-description">

        Daftar peserta yang telah mengikuti assessment.

    </p>

</div>


{{-- =====================================================
     FILTER
====================================================== --}}

<div class="participants-filter">

    <div class="participants-filter-body">

        <form method="GET">

            <div class="row g-3">


                {{-- SEARCH --}}

                <div class="col-md-5">

                    <div class="participant-filter-group">

                        <label class="participant-filter-label">

                            Cari Peserta

                        </label>

                        <div class="participant-input-wrap">

                            <i class="bi bi-search participant-input-icon"></i>

                            <input
                                type="text"
                                name="search"
                                class="participant-input"
                                placeholder="Cari nama peserta..."
                                value="{{ request('search') }}"
                            >

                        </div>

                    </div>

                </div>


                {{-- ASSESSMENT --}}

                <div class="col-md-5">

                    <div class="participant-filter-group">

                        <label class="participant-filter-label">

                            ID Assessment

                        </label>

                        <div class="participant-input-wrap">

                            <i class="bi bi-clipboard-check participant-input-icon"></i>

                            <input
                                type="text"
                                name="assessment"
                                class="participant-input"
                                placeholder="Masukkan ID assessment..."
                                value="{{ request('assessment') }}"
                            >

                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}

                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn-participant-search"
                    >

                        <i class="bi bi-search"></i>

                        Cari

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     TABLE CARD
====================================================== --}}

<div class="participants-table-card">


    {{-- =================================================
         TABLE HEADER
    ================================================== --}}

    <div class="participants-table-header">

        <div class="participants-table-heading">

            <div class="participants-table-icon">

                <i class="bi bi-people"></i>

            </div>

            <div>

                <h2 class="participants-table-title">

                    Daftar Peserta

                </h2>

                <p class="participants-table-subtitle">

                    Riwayat hasil assessment peserta

                </p>

            </div>

        </div>

    </div>


    {{-- =================================================
         TABLE
    ================================================== --}}

    <div class="participants-table-wrapper table-responsive">

        <table class="participants-table">

            <thead>

                <tr>

                    <th>
                        No
                    </th>

                    <th>
                        Nama Peserta
                    </th>

                    <th>
                        Assessment
                    </th>

                    <th class="text-center">
                        Nilai
                    </th>

                    <th class="text-center">
                        Benar
                    </th>

                    <th class="text-center">
                        Status
                    </th>

                    <th>
                        Tanggal
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($participants as $item)

                    <tr>


                        {{-- NOMOR --}}

                        <td class="participant-number">

                            {{
                                $participants->firstItem()
                                + $loop->index
                            }}

                        </td>


                        {{-- PESERTA --}}

                        <td>

                            <div class="participant-profile">

                                <div class="participant-avatar">

                                    {{
                                        strtoupper(
                                            substr(
                                                $item->participant->name ?? '?',
                                                0,
                                                1
                                            )
                                        )
                                    }}

                                </div>

                                <div>

                                    <div class="participant-name">

                                        {{
                                            $item->participant->name
                                            ?? '-'
                                        }}

                                    </div>

                                    <span class="participant-id">

                                        ID Peserta:
                                        #{{ $item->participant_id }}

                                    </span>

                                </div>

                            </div>

                        </td>


                        {{-- ASSESSMENT --}}

                        <td>

                            <div class="participant-assessment">

                                <div class="participant-assessment-title">

                                    {{
                                        $item->assessment->title
                                        ?? '-'
                                    }}

                                </div>

                                <span class="participant-assessment-id">

                                    ID:
                                    {{ $item->assessment_id }}

                                </span>

                            </div>

                        </td>


                        {{-- NILAI --}}

                        <td class="text-center">

                            <div class="participant-score">

                                <span class="participant-score-value">

                                    {{
                                        number_format(
                                            $item->score,
                                            0
                                        )
                                    }}

                                </span>

                                <span class="participant-score-label">

                                    / 100

                                </span>

                            </div>

                        </td>


                        {{-- JAWABAN BENAR --}}

                        <td class="text-center">

                            <div class="participant-correct">

                                {{ $item->correct_answers }}

                                <span class="participant-correct-total">

                                    /

                                    {{ $item->total_questions }}

                                </span>

                            </div>

                        </td>


                        {{-- STATUS --}}

                        <td class="text-center">

                            @if($item->status === 'passed')

                                <span class="participant-status passed">

                                    LULUS

                                </span>

                            @else

                                <span class="participant-status failed">

                                    TIDAK LULUS

                                </span>

                            @endif

                        </td>


                        {{-- TANGGAL --}}

                        <td>

                            <div class="participant-date">

                                {{
                                    $item->created_at
                                    ? $item->created_at->format('d M Y')
                                    : '-'
                                }}

                                @if($item->created_at)

                                    <span class="participant-time">

                                        {{
                                            $item->created_at->format('H:i')
                                        }}

                                    </span>

                                @endif

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="participants-empty"
                        >

                            <div class="participants-empty-icon">

                                <i class="bi bi-people"></i>

                            </div>

                            <div class="participants-empty-title">

                                Belum ada peserta

                            </div>

                            <div class="participants-empty-text">

                                Data peserta akan muncul setelah seseorang
                                menyelesaikan assessment.

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

    @if($participants->hasPages())

        <div class="participants-pagination">

            {{ $participants->links() }}

        </div>

    @endif

</div>


{{-- =====================================================
     SUMMARY
====================================================== --}}

<div class="row g-3 participants-summary">


    {{-- TOTAL PESERTA --}}

    <div class="col-md-4">

        <div class="participant-summary-card">

            <div class="participant-summary-top">

                <div class="participant-summary-label">

                    Total Peserta

                </div>

                <div class="participant-summary-icon">

                    <i class="bi bi-people"></i>

                </div>

            </div>

            <div class="participant-summary-value">

                {{ $participants->total() }}

            </div>

        </div>

    </div>


    {{-- HALAMAN INI --}}

    <div class="col-md-4">

        <div class="participant-summary-card">

            <div class="participant-summary-top">

                <div class="participant-summary-label">

                    Peserta di Halaman Ini

                </div>

                <div class="participant-summary-icon">

                    <i class="bi bi-list-check"></i>

                </div>

            </div>

            <div class="participant-summary-value">

                {{ $participants->count() }}

            </div>

        </div>

    </div>


    {{-- TOTAL ASSESSMENT --}}

    <div class="col-md-4">

        <div class="participant-summary-card">

            <div class="participant-summary-top">

                <div class="participant-summary-label">

                    Total Assessment

                </div>

                <div class="participant-summary-icon">

                    <i class="bi bi-clipboard-check"></i>

                </div>

            </div>

            <div class="participant-summary-value">

                {{
                    $participants
                        ->pluck('assessment_id')
                        ->unique()
                        ->count()
                }}

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
