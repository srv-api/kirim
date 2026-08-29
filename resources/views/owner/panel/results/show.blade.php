@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Detail Hasil Assessment
            </h3>

            <p class="text-muted mb-0">
                Informasi lengkap hasil peserta.
            </p>

        </div>

        <a
            href="{{ route('owner.results.index') }}"
            class="btn btn-outline-secondary"
        >

            ← Kembali

        </a>

    </div>


    <div class="row g-4">

        {{-- =================================================
             INFORMASI PESERTA
        ================================================== --}}

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white">

                    <strong>
                        👤 Informasi Peserta
                    </strong>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <small class="text-muted">
                                Nama Peserta
                            </small>

                            <div class="fw-bold fs-5">

                                {{
                                    $result->participant->name
                                    ?? '-'
                                }}

                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                ID Peserta
                            </small>

                            <div class="fw-bold">

                                #{{ $result->participant_id }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMASI ASSESSMENT
            ================================================== --}}

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <strong>
                        📝 Assessment
                    </strong>

                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted">
                            Nama Assessment
                        </small>

                        <div class="fw-bold fs-5">

                            {{
                                $result->assessment->title
                                ?? '-'
                            }}

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <small class="text-muted">
                                Total Soal
                            </small>

                            <div class="fw-bold">

                                {{
                                    $result->total_questions
                                }}

                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Jawaban Benar
                            </small>

                            <div class="fw-bold">

                                {{
                                    $result->correct_answers
                                }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             NILAI
        ================================================== --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm text-center">

                <div class="card-body py-5">

                    <div class="text-muted mb-2">

                        Nilai Assessment

                    </div>

                    <div
                        class="fw-bold display-3
                        {{ $result->status === 'passed'
                            ? 'text-success'
                            : 'text-danger'
                        }}"
                    >

                        {{
                            number_format(
                                $result->score,
                                0
                            )
                        }}

                    </div>


                    <div class="text-muted mb-4">

                        Passing Score:
                        {{
                            $result->assessment->passing_score
                            ?? 0
                        }}

                    </div>


                    @if($result->status === 'passed')

                        <div
                            class="alert alert-success mb-0"
                        >

                            🎉 Peserta dinyatakan
                            <strong>LULUS</strong>

                        </div>

                    @else

                        <div
                            class="alert alert-danger mb-0"
                        >

                            Peserta dinyatakan
                            <strong>TIDAK LULUS</strong>

                        </div>

                    @endif

                </div>

            </div>


            {{-- WAKTU --}}

            <div class="card border-0 shadow-sm mt-4">

                <div class="card-body">

                    <small class="text-muted">

                        Waktu Submit

                    </small>

                    <div class="fw-semibold mt-1">

                        {{
                            $result->created_at
                            ? $result->created_at
                                ->format(
                                    'd F Y, H:i'
                                )
                            : '-'
                        }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection