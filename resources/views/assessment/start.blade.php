<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        {{ $assessment->title }}
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-5 text-center">

                    <span class="badge bg-dark mb-3">
                        Assessment
                    </span>

                    <h2 class="fw-bold mb-3">
                        {{ $assessment->title }}
                    </h2>

                    @if($assessment->description)

                        <p class="text-muted">
                            {{ $assessment->description }}
                        </p>

                    @endif


                    <div class="row g-3 my-4">

                        {{-- JUMLAH SOAL --}}
                        <div class="col-6">

                            <div class="border rounded p-3">

                                <div class="fw-bold fs-4">

                                    {{ $questions->count() }}

                                </div>

                                <small class="text-muted">
                                    Jumlah Soal
                                </small>

                            </div>

                        </div>


                        {{-- DURASI --}}
                        <div class="col-6">

                            <div class="border rounded p-3">

                                <div class="fw-bold fs-4">

                                    {{ $assessment->duration }}
                                    menit

                                </div>

                                <small class="text-muted">
                                    Durasi
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================
                         PIN
                    ========================================== --}}

                    <form
                        action="{{ route(
                            'assessment.verify-pin',
                            ['assessment' => $assessment->id]
                        ) }}"
                        method="POST"
                    >

                        @csrf

                        <div class="mb-3 text-start">

                            <label
                                for="pin"
                                class="form-label fw-semibold"
                            >
                                PIN Assessment
                            </label>

                            <input
                                type="text"
                                name="pin"
                                id="pin"
                                class="form-control form-control-lg text-center"
                                maxlength="6"
                                inputmode="numeric"
                                autocomplete="off"
                                placeholder="Masukkan PIN"
                                required
                            >

                        </div>


                        @if(session('error'))

                            <div class="alert alert-danger text-start">

                                {{ session('error') }}

                            </div>

                        @endif


                        <button
                            type="submit"
                            class="btn btn-dark btn-lg px-5 w-100"
                        >

                            Mulai Assessment →

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>