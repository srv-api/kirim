<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        Masukkan PIN - {{ $assessment->title }}
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-light">


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5 text-center">


                    {{-- ICON --}}

                    <div
                        class="mb-3"
                        style="font-size: 42px;"
                    >
                        🔐
                    </div>


                    {{-- TITLE --}}

                    <h3 class="fw-bold">
                        {{ $assessment->title }}
                    </h3>


                    <p class="text-muted">
                        Masukkan PIN 6 digit untuk
                        mulai mengerjakan assessment.
                    </p>


                    {{-- ERROR SESSION --}}

                    @if(session('error'))

                        <div class="alert alert-danger text-start">

                            {{ session('error') }}

                        </div>

                    @endif


                    {{-- FORM PIN --}}

                    <form
                        method="POST"
                        action="{{ route(
                            'assessment.verify-pin',
                            ['assessment' => $assessment->id]
                        ) }}"
                    >

                        @csrf


                        <div class="mb-3">


                            <input
                                type="text"
                                name="pin"
                                id="pin"
                                class="form-control form-control-lg text-center @error('pin') is-invalid @enderror"
                                maxlength="6"
                                minlength="6"
                                inputmode="numeric"
                                pattern="[0-9]{6}"
                                autocomplete="off"
                                placeholder="000000"
                                style="
                                    letter-spacing: 10px;
                                    font-size: 28px;
                                    font-weight: bold;
                                "
                                required
                                autofocus
                            >


                            @error('pin')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>


                        <button
                            type="submit"
                            class="btn btn-dark btn-lg w-100"
                        >

                            Masuk Assessment

                        </button>


                    </form>


                    {{-- KEMBALI --}}

                    <a
                        href="{{ route(
                            'assessment.participant.show',
                            ['assessment' => $assessment->id]
                        ) }}"
                        class="btn btn-link mt-3"
                    >

                        ← Kembali

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>


<script>

const pinInput = document.getElementById('pin');

pinInput.addEventListener('input', function () {

    this.value = this.value
        .replace(/\D/g, '')
        .slice(0, 6);

});

</script>


</body>

</html>

