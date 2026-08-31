@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       RANKING PAGE
    ====================================================== */

    .ranking-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .ranking-header {
        margin-bottom: 30px;
    }

    .ranking-eyebrow {
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

    .ranking-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
    }

    .ranking-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .ranking-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       MAIN CARD
    ====================================================== */

    .ranking-table-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }


    /* =====================================================
       TOOLBAR
    ====================================================== */

    .ranking-toolbar {
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

    .ranking-table {
        margin: 0;
    }

    .ranking-table thead th {
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

    .ranking-table tbody td {
        padding: 15px 18px;

        border-bottom: 1px solid #f3f4f6;

        color: #374151;

        font-size: 13px;

        vertical-align: middle;
    }

    .ranking-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .ranking-table tbody tr {
        transition: background .15s ease;
    }

    .ranking-table tbody tr:hover {
        background: #fafafa;
    }


    /* =====================================================
       RANKING
    ====================================================== */

    .ranking-column {
        width: 85px;
    }

    .ranking-position {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 34px;
        height: 30px;

        padding: 0 8px;

        border-radius: 8px;

        background: #f3f4f6;

        color: #374151;

        font-size: 11px;
        font-weight: 700;
    }

    .ranking-position.top-one {
        background: #fffbeb;
        color: #b45309;
    }

    .ranking-position.top-two {
        background: #f9fafb;
        color: #6b7280;
    }

    .ranking-position.top-three {
        background: #fff7ed;
        color: #c2410c;
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
        color: #374151;

        font-size: 12px;
        font-weight: 550;

        line-height: 1.5;
    }


    /* =====================================================
       SCORE
    ====================================================== */

    .score-wrapper {
        display: inline-flex;
        align-items: baseline;

        gap: 4px;
    }

    .score-value {
        color: #111827;

        font-size: 14px;
        font-weight: 750;
    }

    .score-unit {
        color: #9ca3af;

        font-size: 9px;
    }


    /* =====================================================
       ANSWER
    ====================================================== */

    .answer-value {
        color: #374151;

        font-size: 12px;
        font-weight: 650;
    }

    .answer-divider {
        margin: 0 2px;

        color: #d1d5db;
    }

    .answer-total {
        color: #9ca3af;

        font-size: 11px;
    }


    /* =====================================================
       STATUS
    ====================================================== */

    .ranking-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 10px;
        font-weight: 700;

        white-space: nowrap;
    }

    .ranking-status.passed {
        background: #ecfdf5;

        color: #047857;
    }

    .ranking-status.failed {
        background: #fef2f2;

        color: #b91c1c;
    }

    .ranking-status.other {
        background: #f3f4f6;

        color: #6b7280;
    }

    .ranking-status i {
        font-size: 10px;
    }


    /* =====================================================
       DATE
    ====================================================== */

    .ranking-date {
        color: #374151;

        font-size: 12px;
        font-weight: 550;
    }

    .ranking-time {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .ranking-empty {
        padding: 70px 20px;

        text-align: center;
    }

    .ranking-empty-icon {
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

    .ranking-empty-title {
        margin-bottom: 5px;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .ranking-empty-description {
        max-width: 340px;

        margin: 0 auto;

        color: #9ca3af;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =====================================================
       PAGINATION
    ====================================================== */

    .ranking-pagination {
        padding: 15px 20px;

        border-top: 1px solid var(--page-border);

        background: #fff;
    }

    .ranking-pagination .pagination {
        margin-bottom: 0;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .ranking-title {
            font-size: 25px;
        }

        .ranking-toolbar {
            align-items: flex-start;

            flex-direction: column;

            gap: 12px;
        }

        .ranking-table {
            min-width: 900px;
        }

    }

</style>

<div class="container-fluid ranking-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="ranking-header">

    <div class="ranking-eyebrow">

        <span></span>

        Assessment Management

    </div>

    <h1 class="ranking-title">
        Ranking Peserta
    </h1>

    <p class="ranking-description">
        Ranking peserta berdasarkan nilai assessment tertinggi.
    </p>

</div>


{{-- =====================================================
     MAIN TABLE
====================================================== --}}

<div class="ranking-table-card">


    {{-- =================================================
         TOOLBAR
    ================================================== --}}

    <div class="ranking-toolbar">

        <div class="toolbar-heading">

            <div class="toolbar-icon">

                <i class="bi bi-trophy"></i>

            </div>


            <div>

                <h2 class="toolbar-title">
                    Daftar Ranking
                </h2>

                <p class="toolbar-description">
                    Peserta dengan hasil assessment terbaik.
                </p>

            </div>

        </div>


        <div class="toolbar-count">

            {{ number_format($rankings->total()) }}

            peserta

        </div>

    </div>


    {{-- =================================================
         TABLE
    ================================================== --}}

    <div class="table-responsive">

        <table class="table ranking-table align-middle">

            <thead>

                <tr>

                    <th class="ranking-column">
                        Ranking
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

                </tr>

            </thead>


            <tbody>

                @forelse($rankings as $index => $ranking)

                    @php

                        $position =
                            $rankings->firstItem()
                            + $index;

                    @endphp


                    <tr>


                        {{-- =================================================
                             RANKING
                        ================================================== --}}

                        <td>

                            @if($position == 1)

                                <span class="ranking-position top-one">

                                    <i class="bi bi-trophy-fill me-1"></i>

                                    #1

                                </span>

                            @elseif($position == 2)

                                <span class="ranking-position top-two">

                                    <i class="bi bi-award-fill me-1"></i>

                                    #2

                                </span>

                            @elseif($position == 3)

                                <span class="ranking-position top-three">

                                    <i class="bi bi-award-fill me-1"></i>

                                    #3

                                </span>

                            @else

                                <span class="ranking-position">

                                    #{{ $position }}

                                </span>

                            @endif

                        </td>


                        {{-- =================================================
                             PARTICIPANT
                        ================================================== --}}

                        <td>

                            <div class="participant-name">

                                {{
                                    $ranking->participant->name
                                    ?? '—'
                                }}

                            </div>

                            <div class="participant-id">

                                ID Peserta:
                                {{ $ranking->participant_id }}

                            </div>

                        </td>


                        {{-- =================================================
                             ASSESSMENT
                        ================================================== --}}

                        <td>

                            <div class="assessment-name">

                                {{
                                    $ranking->assessment->title
                                    ?? '—'
                                }}

                            </div>

                        </td>


                        {{-- =================================================
                             SCORE
                        ================================================== --}}

                        <td class="text-center">

                            <div class="score-wrapper">

                                <span class="score-value">

                                    {{
                                        number_format(
                                            $ranking->score,
                                            2
                                        )
                                    }}

                                </span>

                                <span class="score-unit">
                                    poin
                                </span>

                            </div>

                        </td>


                        {{-- =================================================
                             ANSWERS
                        ================================================== --}}

                        <td class="text-center">

                            <span class="answer-value">

                                {{ $ranking->correct_answers }}

                            </span>

                            <span class="answer-divider">
                                /
                            </span>

                            <span class="answer-total">

                                {{ $ranking->total_questions }}

                            </span>

                        </td>


                        {{-- =================================================
                             STATUS
                        ================================================== --}}

                        <td class="text-center">

                            @if($ranking->status === 'passed')

                                <span class="ranking-status passed">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Lulus

                                </span>

                            @elseif($ranking->status === 'failed')

                                <span class="ranking-status failed">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Tidak Lulus

                                </span>

                            @else

                                <span class="ranking-status other">

                                    <i class="bi bi-dash-circle"></i>

                                    {{ strtoupper($ranking->status) }}

                                </span>

                            @endif

                        </td>


                        {{-- =================================================
                             DATE
                        ================================================== --}}

                        <td>

                            <div class="ranking-date">

                                {{
                                    $ranking->created_at
                                    ? $ranking->created_at->format(
                                        'd M Y'
                                    )
                                    : '—'
                                }}

                            </div>

                            <div class="ranking-time">

                                {{
                                    $ranking->created_at
                                    ? $ranking->created_at->format(
                                        'H:i'
                                    )
                                    : ''
                                }}

                            </div>

                        </td>

                    </tr>


                @empty


                    {{-- =================================================
                         EMPTY STATE
                    ================================================== --}}

                    <tr>

                        <td colspan="7">

                            <div class="ranking-empty">

                                <div class="ranking-empty-icon">

                                    <i class="bi bi-trophy"></i>

                                </div>

                                <div class="ranking-empty-title">

                                    Belum ada data ranking

                                </div>

                                <p class="ranking-empty-description">

                                    Hasil assessment peserta
                                    akan muncul di halaman ini
                                    setelah tersedia.

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

    @if($rankings->hasPages())

        <div class="ranking-pagination">

            {{ $rankings->links() }}

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
