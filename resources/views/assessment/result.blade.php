<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">


<meta
    name="viewport"
    content="width=device-width, initial-scale=1"
>

<title>Hasil Assessment</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
>


</head>

<body class="bg-light">

<div class="container py-5">


<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="text-center mb-4">

            <div
                class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-dark text-white"
                style="width:70px;height:70px;font-size:32px;"
            >
                ✓
            </div>

            <h2 class="fw-bold mb-2">
                Assessment Selesai
            </h2>

            <p class="text-muted mb-0">
                Jawaban Anda telah berhasil disimpan.
            </p>

        </div>


        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-md-5">

                {{-- ASSESSMENT --}}

                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        Assessment
                    </div>

                    <h4 class="fw-bold mb-0">
                        {{ $result->assessment->title }}
                    </h4>

                </div>


                {{-- PESERTA --}}

                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        Nama Peserta
                    </div>

                    <div class="fw-semibold">
                        {{ $result->participant->name }}
                    </div>

                </div>


                <hr>


                {{-- NILAI --}}

                <div class="text-center py-4">

                    <div class="text-muted small mb-2">
                        Nilai Anda
                    </div>

                    <div
                        class="fw-bold"
                        style="font-size:64px;line-height:1;"
                    >
                        {{ number_format($result->score, 2) }}
                    </div>

                    <div class="text-muted mt-2">
                        dari 100
                    </div>

                </div>


                {{-- STATUS --}}

                <div class="text-center mb-4">

                    @if($result->status === 'passed')

                        <span class="badge bg-success px-4 py-2">
                            LULUS
                        </span>

                    @else

                        <span class="badge bg-danger px-4 py-2">
                            TIDAK LULUS
                        </span>

                    @endif

                </div>


                {{-- DETAIL NILAI --}}

                <div class="row g-3">

                    <div class="col-md-4">

                        <div class="border rounded p-3 text-center">

                            <div class="text-muted small">
                                Total Soal
                            </div>

                            <div class="fw-bold fs-4">
                                {{ $result->total_questions }}
                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="border rounded p-3 text-center">

                            <div class="text-muted small">
                                Jawaban Benar
                            </div>

                            <div class="fw-bold fs-4 text-success">
                                {{ $result->correct_answers }}
                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="border rounded p-3 text-center">

                            <div class="text-muted small">
                                Passing Score
                            </div>

                            <div class="fw-bold fs-4">
                                {{ number_format($result->assessment->passing_score, 2) }}
                            </div>

                        </div>

                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="text-center mt-5">

                    <p class="text-muted small mb-0">
                        Terima kasih telah mengikuti assessment.
                    </p>

                </div>

            </div>

        </div>


        <div class="text-center text-muted small mt-4">
            Assessment System
        </div>

    </div>

</div>


</div>

</body>
</html>
