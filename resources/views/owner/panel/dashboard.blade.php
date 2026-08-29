@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                📊 Dashboard Assessment
            </h2>

            <p class="text-muted mb-0">
                Ringkasan sistem assessment
                {{ $currentMonth }} {{ $currentYear }}
            </p>

        </div>

        <div class="text-end">

            <small class="text-muted">
                Periode
            </small>

            <div class="fw-bold">
                {{ $currentMonth }} {{ $currentYear }}
            </div>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="row g-3 mb-4">


        {{-- ASSESSMENT --}}

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Total Assessment
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($totalAssessments) }}
                            </h3>

                        </div>

                        <div class="fs-1">
                            📝
                        </div>

                    </div>

                    <div class="mt-3">

                        <span class="text-success">
                            {{ number_format($activeAssessments) }}
                        </span>

                        <small class="text-muted">
                            assessment aktif
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- QUESTIONS --}}

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Total Soal
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($totalQuestions) }}
                            </h3>

                        </div>

                        <div class="fs-1">
                            📚
                        </div>

                    </div>

                    <div class="mt-3">

                        <small class="text-muted">
                            Soal yang tersedia
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- PARTICIPANTS --}}

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Total Peserta
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($totalParticipants) }}
                            </h3>

                        </div>

                        <div class="fs-1">
                            👥
                        </div>

                    </div>

                    <div class="mt-3">

                        <span class="text-primary">
                            {{ number_format($monthParticipants) }}
                        </span>

                        <small class="text-muted">
                            peserta bulan ini
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- RESULTS --}}

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Hasil Assessment
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($totalResults) }}
                            </h3>

                        </div>

                        <div class="fs-1">
                            📊
                        </div>

                    </div>

                    <div class="mt-3">

                        <span class="text-success">
                            {{ number_format($monthResults) }}
                        </span>

                        <small class="text-muted">
                            hasil bulan ini
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STATUS ASSESSMENT
    ====================================================== --}}

    <div class="row g-3 mb-4">


        {{-- ACTIVE --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Assessment Aktif
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($activeAssessments) }}
                            </h3>

                        </div>

                        <span class="fs-2">
                            🟢
                        </span>

                    </div>

                    <hr>

                    <small class="text-muted">
                        Assessment yang dapat dikerjakan peserta.
                    </small>

                </div>

            </div>

        </div>


        {{-- DRAFT --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Assessment Draft
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($draftAssessments) }}
                            </h3>

                        </div>

                        <span class="fs-2">
                            📝
                        </span>

                    </div>

                    <hr>

                    <small class="text-muted">
                        Assessment yang masih dalam tahap penyusunan.
                    </small>

                </div>

            </div>

        </div>


        {{-- COMPLETED --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Assessment Selesai
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">
                                {{ number_format($completedAssessments) }}
                            </h3>

                        </div>

                        <span class="fs-2">
                            ✅
                        </span>

                    </div>

                    <hr>

                    <small class="text-muted">
                        Assessment yang telah diselesaikan.
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         TODAY
    ====================================================== --}}

    <div class="row g-3 mb-4">


        {{-- PARTICIPANT TODAY --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Peserta Hari Ini
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">

                                {{ number_format($todayParticipants) }}

                                <small class="fs-6 text-muted">
                                    peserta
                                </small>

                            </h3>

                        </div>

                        <span class="fs-2">
                            👤
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- RESULT TODAY --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Assessment Dikerjakan Hari Ini
                            </small>

                            <h3 class="fw-bold mt-2 mb-0">

                                {{ number_format($todayResults) }}

                                <small class="fs-6 text-muted">
                                    pengerjaan
                                </small>

                            </h3>

                        </div>

                        <span class="fs-2">
                            🎯
                        </span>

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

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-1">
                        📈 Aktivitas Peserta
                    </h5>

                    <small class="text-muted">
                        Jumlah peserta setiap bulan
                    </small>

                    <div
                        class="mt-3"
                        style="height:320px;"
                    >

                        <canvas id="participantChart"></canvas>

                    </div>

                </div>

            </div>

        </div>


        {{-- RESULT CHART --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-1">
                        🎯 Pengerjaan Assessment
                    </h5>

                    <small class="text-muted">
                        Aktivitas pengerjaan per bulan
                    </small>

                    <div
                        class="mt-4"
                        style="height:230px;"
                    >

                        <canvas id="resultChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RECENT ASSESSMENTS
    ====================================================== --}}

    <div class="row g-3 mb-4">


        <div class="col-lg-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="mb-3">

                        <h5 class="fw-bold mb-1">
                            📝 Assessment Terbaru
                        </h5>

                        <small class="text-muted">
                            Assessment yang baru dibuat
                        </small>

                    </div>


                    @if($recentAssessments->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-sm align-middle">

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

                                                <div class="fw-semibold">
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

                                                    <span class="badge bg-success">
                                                        Aktif
                                                    </span>

                                                @elseif($status === 'completed')

                                                    <span class="badge bg-primary">
                                                        Selesai
                                                    </span>

                                                @else

                                                    <span class="badge bg-secondary">
                                                        Draft
                                                    </span>

                                                @endif

                                            </td>

                                            <td>

                                                @if($assessment->created_at)

                                                    {{ $assessment->created_at->format('d/m/Y') }}

                                                @else

                                                    -

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="text-center py-5">

                            <div class="fs-1">
                                📝
                            </div>

                            <p class="text-muted mb-0">
                                Belum ada assessment.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- =================================================
             QUICK MENU
        ================================================== --}}

        <div class="col-lg-5">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-1">
                        ⚡ Akses Cepat
                    </h5>

                    <small class="text-muted">
                        Kelola sistem assessment
                    </small>


                    <div class="row g-2 mt-3">


                        <div class="col-6">

                            <a
                                href="{{ route('owner.assessments.index') }}"
                                class="btn btn-light border w-100 py-3"
                            >

                                <div class="fs-4">
                                    📝
                                </div>

                                <small>
                                    Assessment
                                </small>

                            </a>

                        </div>


                        <div class="col-6">

                            <a
                                href="{{ route('owner.questions.index') }}"
                                class="btn btn-light border w-100 py-3"
                            >

                                <div class="fs-4">
                                    📚
                                </div>

                                <small>
                                    Soal
                                </small>

                            </a>

                        </div>


                        <div class="col-6">

                            <a
                                href="{{ route('owner.participants.index') }}"
                                class="btn btn-light border w-100 py-3"
                            >

                                <div class="fs-4">
                                    👥
                                </div>

                                <small>
                                    Peserta
                                </small>

                            </a>

                        </div>


                        <div class="col-6">

                            <a
                                href="{{ route('owner.results.index') }}"
                                class="btn btn-light border w-100 py-3"
                            >

                                <div class="fs-4">
                                    📊
                                </div>

                                <small>
                                    Hasil
                                </small>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</div>


{{-- =====================================================
     CHART.JS
====================================================== --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {


    // =====================================================
    // PARTICIPANT CHART
    // =====================================================

    const participantCanvas =
        document.getElementById('participantChart');

    if (participantCanvas) {

        new Chart(
            participantCanvas,
            {
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

                    datasets: [

                        {
                            label: 'Peserta',

                            data: @json($monthlyParticipants),

                            borderWidth: 2,

                            tension: 0.35,

                            fill: false
                        }

                    ]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    plugins: {

                        legend: {
                            display: true
                        }

                    },

                    scales: {

                        y: {

                            beginAtZero: true,

                            ticks: {
                                precision: 0
                            }

                        }

                    }

                }

            }
        );

    }


    // =====================================================
    // RESULT CHART
    // =====================================================

    const resultCanvas =
        document.getElementById('resultChart');

    if (resultCanvas) {

        new Chart(
            resultCanvas,
            {
                type: 'doughnut',

                data: {

                    labels: [
                        'Pengerjaan Bulan Ini',
                        'Pengerjaan Hari Ini'
                    ],

                    datasets: [

                        {
                            data: [

                                {{ $monthResults }},

                                {{ $todayResults }}

                            ],

                            borderWidth: 1

                        }

                    ]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    plugins: {

                        legend: {

                            position: 'bottom'

                        }

                    }

                }

            }
        );

    }

});

</script>

@endsection