@extends('dashboard')

@section('content')

<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Detail Soal
        </h2>

        <p class="text-muted mb-0">

            {{ $question->assessment?->title }}

        </p>

    </div>


    <div>

        <a
            href="{{ route('owner.questions.edit', $question) }}"
            class="btn btn-dark"
        >

            Edit

        </a>


        <a
            href="{{ route('owner.questions.index') }}"
            class="btn btn-outline-secondary"
        >

            ← Kembali

        </a>

    </div>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body">

        <div class="mb-4">

            <h5 class="fw-bold">

                {{ $question->question }}

            </h5>

        </div>


        @foreach([
            'A' => $question->option_a,
            'B' => $question->option_b,
            'C' => $question->option_c,
            'D' => $question->option_d,
        ] as $key => $option)

            <div
                class="border rounded p-3 mb-2
                {{ $question->correct_answer === $key ? 'border-success' : '' }}"
            >

                <div class="d-flex justify-content-between">

                    <div>

                        <strong>

                            {{ $key }}.

                        </strong>

                        {{ $option }}

                    </div>


                    @if($question->correct_answer === $key)

                        <span class="badge bg-success">

                            Jawaban Benar

                        </span>

                    @endif

                </div>

            </div>

        @endforeach


        <hr>


        <div>

            <strong>

                Poin:

            </strong>

            {{ $question->points }}

        </div>

    </div>

</div>


</div>

@endsection
