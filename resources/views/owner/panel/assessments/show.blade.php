@extends('dashboard')

@section('content')

<div class="container-fluid">


{{-- =====================================================
     HEADER
====================================================== --}}
<div class="d-flex justify-content-between align-items-start mb-4">

    <div>
        <div class="text-muted small mb-1">
            Assessment
        </div>

        <h2 class="fw-bold mb-1">
            {{ $assessment->title }}
        </h2>

        <div class="text-muted">
            Kelola informasi, soal, PIN, dan akses peserta.
        </div>
    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('owner.assessments.edit', $assessment) }}"
            class="btn btn-outline-dark"
        >
            ✏️ Edit
        </a>

        <a
            href="{{ route('owner.assessments.index') }}"
            class="btn btn-light border"
        >
            ← Kembali
        </a>

    </div>

</div>


{{-- =====================================================
     SUCCESS
====================================================== --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show mb-4">

        <div class="d-flex align-items-center">

            <span class="me-2">✓</span>

            <div>
                {{ session('success') }}
            </div>

        </div>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
        ></button>

    </div>

@endif


<div class="row g-4">


    {{-- =====================================================
         INFORMASI ASSESSMENT
    ====================================================== --}}
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-bottom p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="fw-bold mb-1">
                            Informasi Assessment
                        </h5>

                        <div class="text-muted small">
                            Detail assessment yang sedang dikelola.
                        </div>
                    </div>

                    @if($assessment->status === 'active')

                        <span class="badge bg-success px-3 py-2">
                            Aktif
                        </span>

                    @elseif($assessment->status === 'draft')

                        <span class="badge bg-warning text-dark px-3 py-2">
                            Draft
                        </span>

                    @else

                        <span class="badge bg-secondary px-3 py-2">
                            Tidak Aktif
                        </span>

                    @endif

                </div>

            </div>


            <div class="card-body p-4">


                {{-- NAMA --}}
                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        Nama Assessment
                    </div>

                    <div class="fs-5 fw-semibold">
                        {{ $assessment->title }}
                    </div>

                </div>


                {{-- ID --}}
                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        ID Assessment
                    </div>

                    <div class="d-flex align-items-center gap-2">

                        <code class="px-2 py-1 bg-light border rounded">
                            {{ $assessment->id }}
                        </code>

                        <span class="text-muted small">
                            ID unik assessment
                        </span>

                    </div>

                </div>


                {{-- DESKRIPSI --}}
                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        Deskripsi
                    </div>

                    <div class="text-secondary">

                        @if($assessment->description)

                            {!! nl2br(e($assessment->description)) !!}

                        @else

                            <span class="text-muted">
                                Tidak ada deskripsi.
                            </span>

                        @endif

                    </div>

                </div>


                <div class="row g-4">


                    {{-- KATEGORI --}}
                    <div class="col-md-6">

                        <div class="border rounded p-3 h-100">

                            <div class="text-muted small mb-1">
                                Kategori
                            </div>

                            <div class="fw-semibold">
                                {{ $assessment->category ?: '-' }}
                            </div>

                        </div>

                    </div>


                    {{-- DURASI --}}
                    <div class="col-md-6">

                        <div class="border rounded p-3 h-100">

                            <div class="text-muted small mb-1">
                                Durasi
                            </div>

                            <div class="fw-semibold">
                                {{ $assessment->duration }} menit
                            </div>

                        </div>

                    </div>


                    {{-- PASSING SCORE --}}
                    <div class="col-md-6">

                        <div class="border rounded p-3 h-100">

                            <div class="text-muted small mb-1">
                                Passing Score
                            </div>

                            <div class="fw-semibold">
                                {{ number_format($assessment->passing_score, 2) }}
                            </div>

                        </div>

                    </div>


                    {{-- JUMLAH SOAL --}}
                    <div class="col-md-6">

                        <div class="border rounded p-3 h-100">

                            <div class="text-muted small mb-1">
                                Jumlah Soal
                            </div>

                            <div class="fw-semibold">

                                {{ $assessment->questions->count() }}

                                <span class="text-muted fw-normal">
                                    soal
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                <hr class="my-4">


                {{-- WAKTU --}}
                <div class="row g-4">

                    <div class="col-md-6">

                        <div class="text-muted small mb-1">
                            Waktu Mulai
                        </div>

                        <div class="fw-semibold">

                            @if($assessment->start_at)

                                {{ $assessment->start_at->format('d M Y, H:i') }}

                            @else

                                <span class="text-muted">
                                    Tidak ditentukan
                                </span>

                            @endif

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="text-muted small mb-1">
                            Waktu Berakhir
                        </div>

                        <div class="fw-semibold">

                            @if($assessment->end_at)

                                {{ $assessment->end_at->format('d M Y, H:i') }}

                            @else

                                <span class="text-muted">
                                    Tidak ditentukan
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}
    <div class="col-lg-4">


        {{-- =================================================
             PIN
        ================================================== --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>

                        <div class="text-muted small">
                            PIN Assessment
                        </div>

                        <h5 class="fw-bold mb-0">
                            PIN Peserta
                        </h5>

                    </div>

                    <span class="badge bg-light text-dark border">
                        6 Digit
                    </span>

                </div>


                <div
                    class="border rounded text-center py-3 mb-3"
                    style="background:#f8f9fa;"
                >

                    <div
                        class="fw-bold"
                        style="
                            font-size:34px;
                            letter-spacing:7px;
                        "
                    >
                        {{ $assessment->pin ?: '------' }}
                    </div>

                </div>


                <div class="text-muted small mb-3">
                    Gunakan PIN ini bersama link assessment
                    untuk mengakses assessment.
                </div>


                <form
                    method="POST"
                    action="{{ route(
                        'owner.assessments.regenerate-pin',
                        $assessment
                    ) }}"
                    onsubmit="return confirm('Buat PIN baru untuk assessment ini?')"
                >

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-outline-dark w-100"
                    >
                        ↻ Buat PIN Baru
                    </button>

                </form>

            </div>

        </div>


        {{-- =================================================
             LINK PESERTA
        ================================================== --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body p-4">

                <div class="mb-3">

                    <div class="text-muted small">
                        Akses Peserta
                    </div>

                    <h5 class="fw-bold mb-1">
                        Link Assessment
                    </h5>

                    <div class="text-muted small">
                        Bagikan link berikut kepada peserta.
                    </div>

                </div>


                <div class="input-group mb-2">

                    <input
                        type="text"
                        id="assessmentLink"
                        class="form-control"
                        value="{{ route(
                            'assessment.participant.show',
                            ['assessment' => $assessment->id]
                        ) }}"
                        readonly
                    >

                    <button
                        type="button"
                        class="btn btn-dark"
                        onclick="copyAssessmentLink()"
                    >
                        Salin
                    </button>

                </div>


                <div
                    id="copyMessage"
                    class="text-success small"
                    style="display:none;"
                >
                    ✓ Link berhasil disalin.
                </div>

            </div>

        </div>


        {{-- =================================================
             SOAL
        ================================================== --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start mb-3">

                    <div>

                        <div class="text-muted small">
                            Bank Soal
                        </div>

                        <h5 class="fw-bold mb-1">
                            Soal Assessment
                        </h5>

                    </div>

                    <a
                        href="{{ route(
                            'owner.questions.create',
                            ['assessment_id' => $assessment->id]
                        ) }}"
                        class="btn btn-sm btn-dark"
                    >
                        + Tambah
                    </a>

                </div>


                <div class="d-flex align-items-end gap-2">

                    <div
                        class="fw-bold"
                        style="font-size:32px;"
                    >
                        {{ $assessment->questions->count() }}
                    </div>

                    <div class="text-muted mb-1">
                        soal
                    </div>

                </div>


                @if($assessment->questions->count() > 0)

                    <div class="mt-3">

                        <a
                            href="{{ route(
                                'owner.questions.index'
                            ) }}"
                            class="btn btn-light border w-100"
                        >
                            Kelola Semua Soal →
                        </a>

                    </div>

                @else

                    <div class="text-muted small mt-2">
                        Belum ada soal pada assessment ini.
                    </div>

                @endif

            </div>

        </div>

    </div>

</div>


</div>

<script>

function copyAssessmentLink() {

    const input =
        document.getElementById('assessmentLink');

    const message =
        document.getElementById('copyMessage');

    navigator.clipboard
        .writeText(input.value)
        .then(function () {

            message.style.display = 'block';

            setTimeout(function () {
                message.style.display = 'none';
            }, 2500);

        })
        .catch(function () {

            input.select();
            document.execCommand('copy');

            message.style.display = 'block';

        });

}

</script>

@endsection
