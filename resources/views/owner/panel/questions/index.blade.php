@extends('dashboard')

@section('content')

<div class="container-fluid">


{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Soal Assessment
        </h2>

        <p class="text-muted mb-0">
            Kelola soal yang digunakan dalam assessment.
        </p>
    </div>

    <a href="{{ route('owner.questions.create') }}"
       class="btn btn-dark px-3">

        + Tambah Soal

    </a>

</div>


{{-- SUCCESS --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- ERROR --}}
@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show"
         role="alert">

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- TABLE --}}
<div class="card border shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h6 class="fw-semibold mb-1">
                    Daftar Soal
                </h6>

                <small class="text-muted">
                    {{ $questions->total() }} soal tersedia
                </small>
            </div>

        </div>

    </div>


    <div class="card-body p-0">

        @if($questions->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="70"
                                class="ps-4">
                                No
                            </th>

                            <th width="200">
                                Assessment
                            </th>

                            <th>
                                Pertanyaan
                            </th>

                            <th width="130">
                                Tipe
                            </th>

                            <th width="100">
                                Nilai
                            </th>

                            <th width="210"
                                class="text-end pe-4">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($questions as $question)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="ps-4 text-muted">

                                    {{ $questions->firstItem() + $loop->index }}

                                </td>


                                {{-- ASSESSMENT --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $question->assessment?->title ?? '-' }}

                                    </div>

                                </td>


                                {{-- PERTANYAAN --}}
                                <td>

                                    <div style="max-width: 500px;">

                                        {{ \Illuminate\Support\Str::limit(
                                            $question->question,
                                            100
                                        ) }}

                                    </div>

                                </td>


                                {{-- TIPE --}}
                                <td>

                                    @if($question->type === 'multiple_choice')

                                        <span class="badge bg-light text-dark border">
                                            Pilihan Ganda
                                        </span>

                                    @else

                                        <span class="badge bg-light text-dark border">
                                            Free Text
                                        </span>

                                    @endif

                                </td>


                                {{-- NILAI --}}
                                <td>

                                    <span class="fw-semibold">

                                        {{ $question->score }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-1">

                                        <a href="{{ route(
                                            'owner.questions.show',
                                            $question
                                        ) }}"
                                           class="btn btn-sm btn-outline-secondary">

                                            Lihat

                                        </a>


                                        <a href="{{ route(
                                            'owner.questions.edit',
                                            $question
                                        ) }}"
                                           class="btn btn-sm btn-outline-primary">

                                            Edit

                                        </a>


                                        <form
                                            action="{{ route(
                                                'owner.questions.destroy',
                                                $question
                                            ) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus soal ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                            >

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- EMPTY STATE --}}

            <div class="text-center py-5">

                <h5 class="fw-semibold mb-2">
                    Belum ada soal
                </h5>

                <p class="text-muted mb-3">
                    Belum ada soal yang ditambahkan ke assessment.
                </p>

                <a href="{{ route('owner.questions.create') }}"
                   class="btn btn-dark">

                    + Tambah Soal

                </a>

            </div>

        @endif

    </div>


    {{-- PAGINATION --}}
    @if($questions->hasPages())

        <div class="card-footer bg-white border-top py-3">

            {{ $questions->links() }}

        </div>

    @endif

</div>


</div>

@endsection
