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

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">


                    <span class="badge bg-dark mb-3">
                        Assessment
                    </span>


                    <h1 class="fw-bold">
                        {{ $assessment->title }}
                    </h1>


                    @if($assessment->category)

                        <div class="text-muted mb-3">
                            {{ $assessment->category }}
                        </div>

                    @endif


                    <div class="mb-4">

                        {!! nl2br(
                            e(
                                $assessment->description
                            )
                        ) !!}

                    </div>


                    <div class="row g-3 mb-4">

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                <small class="text-muted">
                                    Durasi
                                </small>

                                <div class="fw-bold">
                                    {{ $assessment->duration }}
                                    menit
                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                <small class="text-muted">
                                    Passing Score
                                </small>

                                <div class="fw-bold">
                                    {{ $assessment->passing_score }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                <small class="text-muted">
                                    Status
                                </small>

                                <div class="fw-bold">
                                    {{ ucfirst(
                                        $assessment->status
                                    ) }}
                                </div>

                            </div>

                        </div>

                    </div>


                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif


                    @if(
                        $assessment->status === 'active'
                    )

                        <a
    href="{{ route(
        'assessment.participant.start',
        ['assessment' => $assessment->id]
    ) }}"
    class="btn btn-dark btn-lg w-100"
>
    Mulai Assessment →
</a>

                    @else

                        <button
                            class="btn btn-secondary btn-lg w-100"
                            disabled
                        >
                            Assessment Belum Aktif
                        </button>

                    @endif


                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>