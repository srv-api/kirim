<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        {{ $assessment->title }} - Selesai
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


            {{-- HEADER --}}

            <div class="text-center mb-4">

                <div
                    class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-3"
                    style="
                        width: 70px;
                        height: 70px;
                        font-size: 32px;
                    "
                >
                    ✓
                </div>

                <h2 class="fw-bold mb-2">
                    Assessment Selesai
                </h2>

                <p class="text-muted mb-0">
                    Semua jawaban Anda telah tersimpan.
                </p>

            </div>


            {{-- FORM PESERTA --}}

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <form
                        method="POST"
                        action="{{ route(
                            'assessment.submit',
                            $assessment->id
                        ) }}"
                    >

                        @csrf


                        {{-- NAMA LENGKAP --}}

                        <div class="mb-4">

                            <label
                                for="name"
                                class="form-label fw-semibold"
                            >
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan nama lengkap"
                                required
                            >

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- SUBMIT --}}

                        <button
                            type="submit"
                            class="btn btn-dark w-100 py-2"
                        >
                            Kirim Assessment
                        </button>


                    </form>

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="text-center text-muted small mt-4">

                {{ $assessment->title }}

            </div>


        </div>

    </div>

</div>


</body>

</html>

