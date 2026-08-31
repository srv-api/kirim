@extends('dashboard')

@section('content')

<style>
    /* =====================================================
       ASSESSMENT DASHBOARD
    ====================================================== */

    .assessment-dashboard {
        --dash-text: #111827;
        --dash-muted: #6b7280;
        --dash-light: #f8fafc;
        --dash-border: #e5e7eb;
        --dash-primary: #111827;
        --dash-success: #059669;
        --dash-blue: #2563eb;
        --dash-radius: 16px;
    }

    .assessment-dashboard * {
        box-sizing: border-box;
    }

    /* HEADER */

    .dashboard-header {
        margin-bottom: 32px;
    }

    .dashboard-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--dash-muted);
        margin-bottom: 8px;
    }

    .dashboard-eyebrow span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--dash-success);
        box-shadow: 0 0 0 4px rgba(5, 150, 105, .10);
    }

    .dashboard-title {
        margin: 0;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 750;
        letter-spacing: -.035em;
        color: var(--dash-text);
    }

    .dashboard-subtitle {
        margin: 8px 0 0;
        color: var(--dash-muted);
        font-size: 14px;
    }

    .period-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        background: #fff;
        border: 1px solid var(--dash-border);
        border-radius: 12px;
    }

    .period-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffde59;
        color: #374151;
        font-size: 16px;
    }

    .period-label {
        display: block;
        font-size: 11px;
        color: var(--dash-muted);
        margin-bottom: 1px;
    }

    .period-value {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: var(--dash-text);
    }


    /* =====================================================
       STAT CARDS
    ====================================================== */

    .stat-card {
        position: relative;
        height: 100%;
        padding: 22px;
        background: #fff;
        border: 1px solid var(--dash-border);
        border-radius: var(--dash-radius);
        transition: all .2s ease;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        border-color: #d1d5db;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .06);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .stat-label {
        color: var(--dash-muted);
        font-size: 13px;
        font-weight: 500;
    }

    .stat-number {
        margin-top: 8px;
        color: var(--dash-text);
        font-size: 30px;
        line-height: 1;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .stat-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #ffde59;
        border: 1px solid #eef0f3;
        color: #374151;
        font-size: 18px;
    }

    .stat-footer {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 22px;
        font-size: 12px;
    }

    .stat-highlight {
        font-weight: 700;
    }

    .stat-description {
        color: var(--dash-muted);
    }


    /* =====================================================
       SECTION CARD
    ====================================================== */

    .dashboard-card {
        height: 100%;
        background: #fff;
        border: 1px solid var(--dash-border);
        border-radius: var(--dash-radius);
        overflow: hidden;
    }

    .dashboard-card-body {
        padding: 22px;
    }

    .section-heading {
        margin-bottom: 20px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        margin: 0;
        color: var(--dash-text);
        font-size: 15px;
        font-weight: 700;
        letter-spacing: -.01em;
    }

    .section-title i {
        color: #6b7280;
        font-size: 16px;
    }

    .section-description {
        margin: 5px 0 0;
        color: var(--dash-muted);
        font-size: 12px;
    }


    /* =====================================================
       STATUS CARDS
    ====================================================== */

    .status-card {
        position: relative;
        height: 100%;
        padding: 22px;
        background: #fff;
        border: 1px solid var(--dash-border);
        border-radius: var(--dash-radius);
    }

    .status-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .status-label {
        font-size: 13px;
        color: var(--dash-muted);
    }

    .status-number {
        margin-top: 8px;
        font-size: 28px;
        font-weight: 750;
        color: var(--dash-text);
        letter-spacing: -.03em;
    }

    .status-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 15px;
    }

    .status-icon.active {
        color: #047857;
        background: #ecfdf5;
    }

    .status-icon.draft {
        color: #6b7280;
        background: #f3f4f6;
    }

    .status-icon.completed {
        color: #2563eb;
        background: #eff6ff;
    }

    .status-divider {
        margin: 18px 0 13px;
        border-top: 1px solid #f0f1f3;
    }

    .status-description {
        color: var(--dash-muted);
        font-size: 12px;
        line-height: 1.6;
    }


    /* =====================================================
       TODAY
    ====================================================== */

    .today-card {
        padding: 20px 22px;
        background: #fff;
        border: 1px solid var(--dash-border);
        border-radius: var(--dash-radius);
    }

    .today-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .today-label {
        font-size: 13px;
        color: var(--dash-muted);
    }

    .today-value {
        margin-top: 7px;
        font-size: 27px;
        font-weight: 750;
        color: var(--dash-text);
        letter-spacing: -.03em;
    }

    .today-value small {
        font-size: 12px;
        font-weight: 500;
        color: var(--dash-muted);
        letter-spacing: 0;
    }

    .today-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffde59;
        color: #374151;
        font-size: 18px;
    }


    /* =====================================================
       CHART
    ====================================================== */

    .chart-wrapper {
        position: relative;
        height: 310px;
    }

    .chart-wrapper-small {
        position: relative;
        height: 250px;
    }


    /* =====================================================
       TABLE
    ====================================================== */

    .assessment-table {
        margin-bottom: 0;
    }

    .assessment-table thead th {
        padding: 10px 12px;
        border-bottom: 1px solid var(--dash-border);
        color: #9ca3af;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .assessment-table tbody td {
        padding: 14px 12px;
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
        font-size: 13px;
        vertical-align: middle;
    }

    .assessment-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .assessment-name {
        color: var(--dash-text);
        font-weight: 600;
    }

    .assessment-date {
        color: var(--dash-muted);
        font-size: 12px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
    }

    .status-badge::before {
        content: "";
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-badge.active {
        color: #047857;
        background: #ecfdf5;
    }

    .status-badge.completed {
        color: #2563eb;
        background: #eff6ff;
    }

    .status-badge.draft {
        color: #6b7280;
        background: #f3f4f6;
    }


    /* =====================================================
       QUICK MENU
    ====================================================== */

    .quick-menu {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .quick-item {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 66px;
        padding: 12px;
        text-decoration: none;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all .2s ease;
    }

    .quick-item:hover {
        color: inherit;
        text-decoration: none;
        background: #f9fafb;
        border-color: #d1d5db;
        transform: translateY(-1px);
    }

    .quick-icon {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #ffde59;
        color: #374151;
        font-size: 16px;
    }

    .quick-text {
        min-width: 0;
    }

    .quick-title {
        display: block;
        color: var(--dash-text);
        font-size: 12px;
        font-weight: 700;
    }

    .quick-subtitle {
        display: block;
        margin-top: 2px;
        color: var(--dash-muted);
        font-size: 10px;
    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .empty-state {
        padding: 45px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 46px;
        height: 46px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #f8fafc;
        color: #9ca3af;
        font-size: 18px;
    }

    .empty-state p {
        margin: 0;
        color: var(--dash-muted);
        font-size: 13px;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 767px) {

        .dashboard-header {
            margin-bottom: 24px;
        }

        .dashboard-title {
            font-size: 25px;
        }

        .period-card {
            display: none;
        }

        .stat-card,
        .status-card,
        .today-card {
            padding: 18px;
        }

        .stat-number {
            font-size: 27px;
        }

        .chart-wrapper {
            height: 260px;
        }

        .chart-wrapper-small {
            height: 220px;
        }

        .dashboard-card-body {
            padding: 18px;
        }

    }
</style>


<div class="container-fluid assessment-dashboard">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="dashboard-header d-flex justify-content-between align-items-center">

        <div>

            <div class="dashboard-eyebrow">
                <span></span>
                Assessment Workspace
            </div>

            <h1 class="dashboard-title">
                Dashboard
            </h1>

            <p class="dashboard-subtitle">
                Ringkasan aktivitas assessment dan perkembangan peserta.
            </p>

        </div>

        <div class="period-card">

            <div class="period-icon">
                <i class="bi bi-calendar3"></i>
            </div>

            <div>

                <span class="period-label">
                    Periode
                </span>

                <span class="period-value">
                    {{ $currentMonth }} {{ $currentYear }}
                </span>

            </div>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="row g-3 mb-4">

        {{-- ASSESSMENT --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Assessment
                        </div>

                        <div class="stat-number">
                            {{ number_format($totalAssessments) }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </div>

                </div>

                <div class="stat-footer">

                    <span class="stat-highlight text-success">
                        {{ number_format($activeAssessments) }}
                    </span>

                    <span class="stat-description">
                        assessment aktif
                    </span>

                </div>

            </div>

        </div>


        {{-- QUESTIONS --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Soal
                        </div>

                        <div class="stat-number">
                            {{ number_format($totalQuestions) }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>

                </div>

                <div class="stat-footer">

                    <span class="stat-description">
                        Soal yang tersedia dalam sistem
                    </span>

                </div>

            </div>

        </div>


        {{-- PARTICIPANTS --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Peserta
                        </div>

                        <div class="stat-number">
                            {{ number_format($totalParticipants) }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-people"></i>
                    </div>

                </div>

                <div class="stat-footer">

                    <span class="stat-highlight text-primary">
                        {{ number_format($monthParticipants) }}
                    </span>

                    <span class="stat-description">
                        peserta bulan ini
                    </span>

                </div>

            </div>

        </div>


        {{-- RESULTS --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Hasil Assessment
                        </div>

                        <div class="stat-number">
                            {{ number_format($totalResults) }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-bar-chart"></i>
                    </div>

                </div>

                <div class="stat-footer">

                    <span class="stat-highlight text-success">
                        {{ number_format($monthResults) }}
                    </span>

                    <span class="stat-description">
                        hasil bulan ini
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STATUS
    ====================================================== --}}

    <div class="row g-3 mb-4">

        {{-- ACTIVE --}}

        <div class="col-lg-4">

            <div class="status-card">

                <div class="status-head">

                    <div>

                        <div class="status-label">
                            Assessment Aktif
                        </div>

                        <div class="status-number">
                            {{ number_format($activeAssessments) }}
                        </div>

                    </div>

                    <div class="status-icon active">
                        <i class="bi bi-check-circle"></i>
                    </div>

                </div>

                <div class="status-divider"></div>

                <div class="status-description">
                    Assessment yang saat ini tersedia dan dapat
                    dikerjakan oleh peserta.
                </div>

            </div>

        </div>


        {{-- DRAFT --}}

        <div class="col-lg-4">

            <div class="status-card">

                <div class="status-head">

                    <div>

                        <div class="status-label">
                            Assessment Draft
                        </div>

                        <div class="status-number">
                            {{ number_format($draftAssessments) }}
                        </div>

                    </div>

                    <div class="status-icon draft">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                </div>

                <div class="status-divider"></div>

                <div class="status-description">
                    Assessment yang masih dalam tahap penyusunan
                    dan belum dipublikasikan.
                </div>

            </div>

        </div>


        {{-- COMPLETED --}}

        <div class="col-lg-4">

            <div class="status-card">

                <div class="status-head">

                    <div>

                        <div class="status-label">
                            Assessment Selesai
                        </div>

                        <div class="status-number">
                            {{ number_format($completedAssessments) }}
                        </div>

                    </div>

                    <div class="status-icon completed">
                        <i class="bi bi-check2-all"></i>
                    </div>

                </div>

                <div class="status-divider"></div>

                <div class="status-description">
                    Assessment yang telah selesai digunakan
                    atau diselesaikan.
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         TODAY
    ====================================================== --}}

    <div class="row g-3 mb-4">

        <div class="col-lg-6">

            <div class="today-card">

                <div class="today-content">

                    <div>

                        <div class="today-label">
                            Peserta Hari Ini
                        </div>

                        <div class="today-value">
                            {{ number_format($todayParticipants) }}

                            <small>
                                peserta
                            </small>
                        </div>

                    </div>

                    <div class="today-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>

                </div>

            </div>

        </div>


        <div class="col-lg-6">

            <div class="today-card">

                <div class="today-content">

                    <div>

                        <div class="today-label">
                            Assessment Dikerjakan Hari Ini
                        </div>

                        <div class="today-value">
                            {{ number_format($todayResults) }}

                            <small>
                                pengerjaan
                            </small>
                        </div>

                    </div>

                    <div class="today-icon">
                        <i class="bi bi-activity"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         CHART
    ====================================================== --}}

    <div class="row g-3 mb-4">

        {{-- PARTICIPANT CHART --}}

        <div class="col-lg-8">

            <div class="dashboard-card">

                <div class="dashboard-card-body">

                    <div class="section-heading">

                        <h5 class="section-title">

                            <i class="bi bi-graph-up"></i>

                            Aktivitas Peserta

                        </h5>

                        <p class="section-description">
                            Jumlah peserta berdasarkan aktivitas setiap bulan.
                        </p>

                    </div>

                    <div class="chart-wrapper">

                        <canvas id="participantChart"></canvas>

                    </div>

                </div>

            </div>

        </div>


        {{-- RESULT CHART --}}

        <div class="col-lg-4">

            <div class="dashboard-card">

                <div class="dashboard-card-body">

                    <div class="section-heading">

                        <h5 class="section-title">

                            <i class="bi bi-pie-chart"></i>

                            Pengerjaan Assessment

                        </h5>

                        <p class="section-description">
                            Perbandingan aktivitas assessment.
                        </p>

                    </div>

                    <div class="chart-wrapper-small">

                        <canvas id="resultChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RECENT + QUICK MENU
    ====================================================== --}}

    <div class="row g-3 mb-4">


        {{-- RECENT ASSESSMENTS --}}

        <div class="col-lg-7">

            <div class="dashboard-card">

                <div class="dashboard-card-body">

                    <div class="section-heading">

                        <h5 class="section-title">

                            <i class="bi bi-clock-history"></i>

                            Assessment Terbaru

                        </h5>

                        <p class="section-description">
                            Assessment yang baru ditambahkan ke sistem.
                        </p>

                    </div>


                    @if($recentAssessments->count() > 0)

                        <div class="table-responsive">

                            <table class="table assessment-table align-middle">

                                <thead>

                                    <tr>

                                        <th>
                                            Assessment
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                        <th>
                                            Dibuat
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($recentAssessments as $assessment)

                                        <tr>

                                            <td>

                                                <div class="assessment-name">
                                                    {{ $assessment->title ?? $assessment->name ?? 'Assessment' }}
                                                </div>

                                            </td>

                                            <td>

                                                @php

                                                    $status = strtolower(
                                                        $assessment->status ?? 'draft'
                                                    );

                                                @endphp


                                                @if($status === 'active')

                                                    <span class="status-badge active">
                                                        Aktif
                                                    </span>

                                                @elseif($status === 'completed')

                                                    <span class="status-badge completed">
                                                        Selesai
                                                    </span>

                                                @else

                                                    <span class="status-badge draft">
                                                        Draft
                                                    </span>

                                                @endif

                                            </td>

                                            <td>

                                                <span class="assessment-date">

                                                    @if($assessment->created_at)

                                                        {{ $assessment->created_at->format('d M Y') }}

                                                    @else

                                                        —

                                                    @endif

                                                </span>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>

                            <p>
                                Belum ada assessment.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- QUICK MENU --}}

        <div class="col-lg-5">

            <div class="dashboard-card">

                <div class="dashboard-card-body">

                    <div class="section-heading">

                        <h5 class="section-title">

                            <i class="bi bi-grid"></i>

                            Akses Cepat

                        </h5>

                        <p class="section-description">
                            Menu utama untuk mengelola assessment.
                        </p>

                    </div>


                    <div class="quick-menu">


                        {{-- ASSESSMENT --}}

                        <a
                            href="{{ route('owner.assessments.index') }}"
                            class="quick-item"
                        >

                            <div class="quick-icon">
                                <i class="bi bi-clipboard-check"></i>
                            </div>

                            <div class="quick-text">

                                <span class="quick-title">
                                    Assessment
                                </span>

                                <span class="quick-subtitle">
                                    Kelola assessment
                                </span>

                            </div>

                        </a>


                        {{-- QUESTIONS --}}

                        <a
                            href="{{ route('owner.questions.index') }}"
                            class="quick-item"
                        >

                            <div class="quick-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>

                            <div class="quick-text">

                                <span class="quick-title">
                                    Soal
                                </span>

                                <span class="quick-subtitle">
                                    Kelola bank soal
                                </span>

                            </div>

                        </a>


                        {{-- PARTICIPANTS --}}

                        <a
                            href="{{ route('owner.participants.index') }}"
                            class="quick-item"
                        >

                            <div class="quick-icon">
                                <i class="bi bi-people"></i>
                            </div>

                            <div class="quick-text">

                                <span class="quick-title">
                                    Peserta
                                </span>

                                <span class="quick-subtitle">
                                    Data peserta
                                </span>

                            </div>

                        </a>


                        {{-- RESULTS --}}

                        <a
                            href="{{ route('owner.results.index') }}"
                            class="quick-item"
                        >

                            <div class="quick-icon">
                                <i class="bi bi-bar-chart"></i>
                            </div>

                            <div class="quick-text">

                                <span class="quick-title">
                                    Hasil
                                </span>

                                <span class="quick-subtitle">
                                    Lihat hasil assessment
                                </span>

                            </div>

                        </a>

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


{{-- =====================================================
     CHART.JS
====================================================== --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | PARTICIPANT CHART
    |--------------------------------------------------------------------------
    */

    const participantCanvas =
        document.getElementById('participantChart');

    if (participantCanvas) {

        new Chart(participantCanvas, {

            type: 'line',

            data: {

                labels: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Agu',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Des'
                ],

                datasets: [{

                    label: 'Peserta',

                    data: @json($monthlyParticipants),

                    borderWidth: 2,

                    tension: 0.4,

                    fill: true,

                    pointRadius: 3,

                    pointHoverRadius: 5

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {
                    intersect: false,
                    mode: 'index'
                },

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        padding: 12,

                        displayColors: false

                    }

                },

                scales: {

                    x: {

                        grid: {
                            display: false
                        },

                        border: {
                            display: false
                        },

                        ticks: {
                            color: '#9ca3af',
                            font: {
                                size: 11
                            }
                        }

                    },

                    y: {

                        beginAtZero: true,

                        border: {
                            display: false
                        },

                        grid: {
                            color: '#f1f5f9'
                        },

                        ticks: {

                            precision: 0,

                            color: '#9ca3af',

                            font: {
                                size: 11
                            }

                        }

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | RESULT CHART
    |--------------------------------------------------------------------------
    */

    const resultCanvas =
        document.getElementById('resultChart');

    if (resultCanvas) {

        new Chart(resultCanvas, {

            type: 'doughnut',

            data: {

                labels: [
                    'Bulan Ini',
                    'Hari Ini'
                ],

                datasets: [{

                    data: [

                        {{ $monthResults }},

                        {{ $todayResults }}

                    ],

                    borderWidth: 0,

                    spacing: 3,

                    hoverOffset: 5

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '72%',

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            usePointStyle: true,

                            pointStyle: 'circle',

                            padding: 18,

                            color: '#6b7280',

                            font: {
                                size: 11
                            }

                        }

                    },

                    tooltip: {

                        padding: 12

                    }

                }

            }

        });

    }

});

</script>

@endsection