@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Data Peserta
            </h3>

            <p class="text-muted mb-0">
                Daftar peserta yang telah mengikuti assessment.
            </p>

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

                    <div class="col-md-5">

                        <label class="form-label">
                            Cari Peserta
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama peserta..."
                            value="{{ request('search') }}"
                        >

                    </div>


                    {{-- ASSESSMENT --}}

                    <div class="col-md-5">

                        <label class="form-label">
                            ID Assessment
                        </label>

                        <input
                            type="text"
                            name="assessment"
                            class="form-control"
                            placeholder="Masukkan ID assessment..."
                            value="{{ request('assessment') }}"
                        >

                    </div>


                    {{-- BUTTON --}}

                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-dark w-100"
                        >

                            🔍 Cari

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
                                Nama Peserta
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

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($participants as $item)

                            <tr>

                                {{-- NOMOR --}}

                                <td class="ps-4 text-muted">

                                    {{
                                        $participants->firstItem()
                                        + $loop->index
                                    }}

                                </td>


                                {{-- PESERTA --}}

                                <td>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3"
                                            style="
                                                width: 42px;
                                                height: 42px;
                                            "
                                        >

                                            {{
                                                strtoupper(
                                                    substr(
                                                        $item->participant->name ?? '?',
                                                        0,
                                                        1
                                                    )
                                                )
                                            }}

                                        </div>


                                        <div>

                                            <div class="fw-semibold">

                                                {{
                                                    $item->participant->name
                                                    ?? '-'
                                                }}

                                            </div>

                                            <small class="text-muted">

                                                ID Peserta:
                                                #{{ $item->participant_id }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- ASSESSMENT --}}

                                <td>

                                    <div class="fw-semibold">

                                        {{
                                            $item->assessment->title
                                            ?? '-'
                                        }}

                                    </div>

                                    <small class="text-muted">

                                        ID:
                                        {{
                                            $item->assessment_id
                                        }}

                                    </small>

                                </td>


                                {{-- NILAI --}}

                                <td class="text-center">

                                    <span class="fw-bold fs-5">

                                        {{
                                            number_format(
                                                $item->score,
                                                0
                                            )
                                        }}

                                    </span>

                                </td>


                                {{-- JAWABAN BENAR --}}

                                <td class="text-center">

                                    {{
                                        $item->correct_answers
                                    }}

                                    /

                                    {{
                                        $item->total_questions
                                    }}

                                </td>


                                {{-- STATUS --}}

                                <td class="text-center">

                                    @if($item->status === 'passed')

                                        <span class="badge bg-success px-3 py-2">

                                            LULUS

                                        </span>

                                    @else

                                        <span class="badge bg-danger px-3 py-2">

                                            TIDAK LULUS

                                        </span>

                                    @endif

                                </td>


                                {{-- TANGGAL --}}

                                <td>

                                    <div>

                                        {{
                                            $item->created_at
                                            ? $item->created_at->format(
                                                'd M Y'
                                            )
                                            : '-'
                                        }}

                                    </div>

                                    <small class="text-muted">

                                        {{
                                            $item->created_at
                                            ? $item->created_at->format(
                                                'H:i'
                                            )
                                            : ''
                                        }}

                                    </small>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5 text-muted"
                                >

                                    <div
                                        style="font-size: 48px;"
                                        class="mb-3"
                                    >
                                        👥
                                    </div>

                                    <div class="fw-semibold">

                                        Belum ada peserta

                                    </div>

                                    <small>

                                        Data peserta akan muncul setelah
                                        seseorang menyelesaikan assessment.

                                    </small>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PAGINATION --}}

        @if($participants->hasPages())

            <div class="card-footer bg-white">

                {{ $participants->links() }}

            </div>

        @endif

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="row mt-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted mb-1">

                        Total Peserta

                    </div>

                    <div class="fs-3 fw-bold">

                        {{ $participants->total() }}

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted mb-1">

                        Peserta di Halaman Ini

                    </div>

                    <div class="fs-3 fw-bold">

                        {{ $participants->count() }}

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted mb-1">

                        Total Assessment

                    </div>

                    <div class="fs-3 fw-bold">

                        {{
                            $participants
                                ->pluck('assessment_id')
                                ->unique()
                                ->count()
                        }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection