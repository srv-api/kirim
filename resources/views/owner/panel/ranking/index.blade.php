@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">
                🏆 Ranking Peserta
            </h3>

            <p class="text-muted mb-0">
                Ranking peserta berdasarkan nilai tertinggi.
            </p>

        </div>

    </div>


    {{-- =====================================================
         TABLE CARD
    ====================================================== --}}

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="100">
                                Ranking
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

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($rankings as $index => $ranking)

                            @php

                                $position =
                                    $rankings->firstItem()
                                    + $index;

                            @endphp


                            <tr>

                                {{-- =====================
                                     RANKING
                                ====================== --}}

                                <td>

                                    @if($position == 1)

                                        <span class="fs-4">
                                            🥇
                                        </span>

                                    @elseif($position == 2)

                                        <span class="fs-4">
                                            🥈
                                        </span>

                                    @elseif($position == 3)

                                        <span class="fs-4">
                                            🥉
                                        </span>

                                    @else

                                        <span class="fw-bold">

                                            #{{ $position }}

                                        </span>

                                    @endif

                                </td>


                                {{-- =====================
                                     PESERTA
                                ====================== --}}

                                <td>

                                    <div class="fw-semibold">

                                        {{
                                            $ranking->participant->name
                                            ?? '-'
                                        }}

                                    </div>

                                    <small class="text-muted">

                                        ID Peserta:
                                        {{
                                            $ranking->participant_id
                                        }}

                                    </small>

                                </td>


                                {{-- =====================
                                     ASSESSMENT
                                ====================== --}}

                                <td>

                                    {{
                                        $ranking->assessment->title
                                        ?? '-'
                                    }}

                                </td>


                                {{-- =====================
                                     NILAI
                                ====================== --}}

                                <td class="text-center">

                                    <span class="fw-bold fs-5">

                                        {{
                                            number_format(
                                                $ranking->score,
                                                2
                                            )
                                        }}

                                    </span>

                                </td>


                                {{-- =====================
                                     JAWABAN BENAR
                                ====================== --}}

                                <td class="text-center">

                                    {{
                                        $ranking->correct_answers
                                    }}

                                    /

                                    {{
                                        $ranking->total_questions
                                    }}

                                </td>


                                {{-- =====================
                                     STATUS
                                ====================== --}}

                                <td class="text-center">

                                    @if($ranking->status === 'passed')

                                        <span class="badge bg-success">

                                            LULUS

                                        </span>

                                    @elseif($ranking->status === 'failed')

                                        <span class="badge bg-danger">

                                            TIDAK LULUS

                                        </span>

                                    @else

                                        <span class="badge bg-secondary">

                                            {{
                                                strtoupper(
                                                    $ranking->status
                                                )
                                            }}

                                        </span>

                                    @endif

                                </td>


                                {{-- =====================
                                     TANGGAL
                                ====================== --}}

                                <td>

                                    {{
                                        $ranking->created_at
                                        ? $ranking->created_at
                                            ->format(
                                                'd M Y H:i'
                                            )
                                        : '-'
                                    }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5 text-muted"
                                >

                                    <div class="fs-1 mb-2">

                                        🏆

                                    </div>

                                    <div class="fw-semibold">

                                        Belum ada data ranking

                                    </div>

                                    <small>

                                        Hasil assessment peserta
                                        akan muncul di halaman ini.

                                    </small>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- =====================================================
             PAGINATION
        ====================================================== --}}

        @if($rankings->hasPages())

            <div class="card-footer bg-white">

                {{
                    $rankings->links()
                }}

            </div>

        @endif

    </div>

</div>

@endsection