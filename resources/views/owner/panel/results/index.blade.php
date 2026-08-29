@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Hasil Assessment
            </h3>

            <p class="text-muted mb-0">
                Lihat seluruh hasil assessment peserta.
            </p>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="row g-4 mb-4">

        {{-- TOTAL --}}

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="text-muted mb-2">
                        Total Peserta
                    </div>

                    <div class="fs-2 fw-bold">
                        {{ $totalResults }}
                    </div>

                </div>

            </div>

        </div>


        {{-- LULUS --}}

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="text-muted mb-2">
                        Lulus
                    </div>

                    <div class="fs-2 fw-bold text-success">
                        {{ $passedResults }}
                    </div>

                </div>

            </div>

        </div>


        {{-- GAGAL --}}

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="text-muted mb-2">
                        Tidak Lulus
                    </div>

                    <div class="fs-2 fw-bold text-danger">
                        {{ $failedResults }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3">

                    {{-- SEARCH --}}

                    <div class="col-md-4">

                        <label class="form-label">
                            Cari
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Nama peserta atau assessment..."
                            value="{{ request('search') }}"
                        >

                    </div>


                    {{-- ASSESSMENT --}}

                    <div class="col-md-3">

                        <label class="form-label">
                            Assessment
                        </label>

                        <select
                            name="assessment_id"
                            class="form-select"
                        >

                            <option value="">
                                Semua Assessment
                            </option>

                            @foreach($assessments as $assessment)

                                <option
                                    value="{{ $assessment->id }}"
                                    @selected(
                                        request('assessment_id')
                                        == $assessment->id
                                    )
                                >

                                    {{ $assessment->title }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- STATUS --}}

                    <div class="col-md-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option value="">
                                Semua Status
                            </option>

                            <option
                                value="passed"
                                @selected(
                                    request('status')
                                    === 'passed'
                                )
                            >
                                Lulus
                            </option>

                            <option
                                value="failed"
                                @selected(
                                    request('status')
                                    === 'failed'
                                )
                            >
                                Tidak Lulus
                            </option>

                        </select>

                    </div>


                    {{-- BUTTON --}}

                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-dark w-100"
                        >

                            🔍 Filter

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="ps-4">
                                No
                            </th>

                            <th>
                                Peserta
                            </th>

                            <th>
                                Assessment
                            </th>

                            <th class="text-center">
                                Nilai
                            </th>

                            <th class="text-center">
                                Benar
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($results as $result)

                            <tr>

                                {{-- NOMOR --}}

                                <td class="ps-4 text-muted">

                                    {{
                                        $results->firstItem()
                                        + $loop->index
                                    }}

                                </td>


                                {{-- PESERTA --}}

                                <td>

                                    <div class="fw-semibold">

                                        {{
                                            $result->participant->name
                                            ?? '-'
                                        }}

                                    </div>

                                    <small class="text-muted">

                                        Peserta
                                        #{{ $result->participant_id }}

                                    </small>

                                </td>


                                {{-- ASSESSMENT --}}

                                <td>

                                    <div class="fw-semibold">

                                        {{
                                            $result->assessment->title
                                            ?? '-'
                                        }}

                                    </div>

                                    <small class="text-muted">

                                        ID:
                                        {{ $result->assessment_id }}

                                    </small>

                                </td>


                                {{-- NILAI --}}

                                <td class="text-center">

                                    <span class="fw-bold fs-5">

                                        {{
                                            number_format(
                                                $result->score,
                                                0
                                            )
                                        }}

                                    </span>

                                </td>


                                {{-- BENAR --}}

                                <td class="text-center">

                                    {{
                                        $result->correct_answers
                                    }}

                                    /

                                    {{
                                        $result->total_questions
                                    }}

                                </td>


                                {{-- STATUS --}}

                                <td class="text-center">

                                    @if(
                                        $result->status
                                        === 'passed'
                                    )

                                        <span class="badge bg-success">

                                            LULUS

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            TIDAK LULUS

                                        </span>

                                    @endif

                                </td>


                                {{-- TANGGAL --}}

                                <td>

                                    <div>

                                        {{
                                            $result->created_at
                                            ? $result->created_at
                                                ->format('d M Y')
                                            : '-'
                                        }}

                                    </div>

                                    <small class="text-muted">

                                        {{
                                            $result->created_at
                                            ? $result->created_at
                                                ->format('H:i')
                                            : ''
                                        }}

                                    </small>

                                </td>


                                {{-- AKSI --}}

                                <td class="text-center">

                                    <a
                                        href="{{ route(
                                            'owner.results.show',
                                            $result->id
                                        ) }}"
                                        class="btn btn-sm btn-outline-dark"
                                    >

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <div
                                        style="font-size: 45px;"
                                        class="mb-2"
                                    >
                                        📊
                                    </div>

                                    <div class="fw-semibold">

                                        Belum ada hasil assessment

                                    </div>

                                    <small class="text-muted">

                                        Hasil akan muncul setelah peserta
                                        menyelesaikan assessment.

                                    </small>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PAGINATION --}}

        @if($results->hasPages())

            <div class="card-footer bg-white">

                {{ $results->links() }}

            </div>

        @endif

    </div>

</div>

@endsection