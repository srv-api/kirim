@extends('dashboard')

@section('content')

<style>

/* =====================================================
   TUG OF WAR PAGE
====================================================== */

.tug-page {
    --page-text: #111827;
    --page-muted: #6b7280;
    --page-border: #e5e7eb;
    --page-radius: 16px;

    padding-bottom: 35px;
}


/* =====================================================
   HEADER
====================================================== */

.tug-header {
    margin-bottom: 30px;
}

.tug-eyebrow {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 7px;

    color: #9ca3af;

    font-size: 11px;
    font-weight: 700;

    letter-spacing: .08em;
    text-transform: uppercase;
}

.tug-eyebrow span {
    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: #059669;

    box-shadow:
        0 0 0 4px rgba(5, 150, 105, .08);
}

.tug-title {
    margin: 0;

    color: var(--page-text);

    font-size: 28px;
    line-height: 1.2;

    font-weight: 750;

    letter-spacing: -.035em;
}

.tug-description {
    margin: 7px 0 0;

    color: var(--page-muted);

    font-size: 13px;
}


/* =====================================================
   ADD BUTTON
====================================================== */

.btn-add-tug {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 10px 15px;

    border: 0;
    border-radius: 10px;

    background: #111827;
    color: #fff;

    font-size: 12px;
    font-weight: 650;

    text-decoration: none;

    transition: all .18s ease;
}

.btn-add-tug:hover {
    background: #000;
    color: #fff;

    transform: translateY(-1px);

    box-shadow:
        0 7px 18px rgba(15, 23, 42, .12);
}

.btn-add-tug i {
    font-size: 14px;
}


/* =====================================================
   ALERT
====================================================== */

.tug-alert {
    display: flex;
    align-items: flex-start;
    gap: 10px;

    padding: 12px 14px;

    border-radius: 10px;

    font-size: 12px;
}

.tug-alert i {
    margin-top: 1px;
    font-size: 14px;
}

.tug-alert .btn-close {
    margin-left: auto;

    padding: 5px;

    font-size: 9px;
}


/* =====================================================
   MAIN CARD
====================================================== */

.tug-table-card {
    background: #fff;

    border: 1px solid var(--page-border);

    border-radius: var(--page-radius);

    overflow: hidden;
}


/* =====================================================
   TOOLBAR
====================================================== */

.tug-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 20px 22px;

    border-bottom: 1px solid var(--page-border);
}

.toolbar-heading {
    display: flex;
    align-items: center;

    gap: 11px;
}

.toolbar-icon {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #f3f4f6;
    color: #374151;

    font-size: 14px;
}

.toolbar-title {
    margin: 0;

    color: var(--page-text);

    font-size: 14px;
    font-weight: 700;
}

.toolbar-description {
    margin: 3px 0 0;

    color: #9ca3af;

    font-size: 11px;
}

.toolbar-count {
    padding: 5px 9px;

    border-radius: 20px;

    background: #f8fafc;

    border: 1px solid #eef0f3;

    color: #6b7280;

    font-size: 10px;
    font-weight: 650;
}


/* =====================================================
   TABLE
====================================================== */

.tug-table {
    margin: 0;
}

.tug-table thead th {
    padding: 12px 18px;

    background: #fafafa;

    border-bottom: 1px solid var(--page-border);

    color: #9ca3af;

    font-size: 10px;
    font-weight: 700;

    letter-spacing: .07em;

    text-transform: uppercase;

    white-space: nowrap;
}

.tug-table tbody td {
    padding: 15px 18px;

    border-bottom: 1px solid #f3f4f6;

    color: #374151;

    font-size: 13px;

    vertical-align: middle;
}

.tug-table tbody tr:last-child td {
    border-bottom: 0;
}

.tug-table tbody tr {
    transition: background .15s ease;
}

.tug-table tbody tr:hover {
    background: #fafafa;
}


/* =====================================================
   NUMBER
====================================================== */

.number-column {
    width: 55px;

    color: #9ca3af !important;

    font-size: 11px !important;

    font-weight: 500;
}


/* =====================================================
   QUESTION
====================================================== */

.tug-question-text {
    max-width: 450px;

    color: #111827;

    font-size: 13px;
    line-height: 1.55;

    font-weight: 600;
}


/* =====================================================
   ANSWERS
====================================================== */

.tug-answer-list {
    display: flex;
    flex-direction: column;

    gap: 4px;

    min-width: 220px;
}

.tug-answer {
    display: flex;
    align-items: center;

    gap: 7px;

    color: #6b7280;

    font-size: 11px;

    line-height: 1.4;
}

.tug-answer-letter {
    width: 20px;
    height: 20px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    flex: 0 0 20px;

    border-radius: 6px;

    background: #f3f4f6;

    color: #6b7280;

    font-size: 9px;

    font-weight: 700;
}

.tug-answer.correct {
    color: #111827;

    font-weight: 650;
}

.tug-answer.correct .tug-answer-letter {
    background: #dcfce7;

    color: #15803d;
}


/* =====================================================
   STATUS
====================================================== */

.tug-status {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 5px 9px;

    border-radius: 20px;

    font-size: 10px;

    font-weight: 700;

    white-space: nowrap;
}

.tug-status.active {
    color: #166534;

    background: #f0fdf4;
}

.tug-status.inactive {
    color: #6b7280;

    background: #f3f4f6;
}

.tug-status-dot {
    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: currentColor;
}


/* =====================================================
   ORDER
====================================================== */

.tug-order {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    min-width: 30px;

    height: 28px;

    padding: 0 8px;

    border-radius: 8px;

    background: #f8fafc;

    border: 1px solid #eef0f3;

    color: #6b7280;

    font-size: 11px;

    font-weight: 700;
}


/* =====================================================
   ACTION
====================================================== */

.tug-actions {
    display: flex;

    align-items: center;

    gap: 5px;
}

.tug-action {
    width: 31px;
    height: 31px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border: 1px solid #e5e7eb;

    border-radius: 8px;

    background: #fff;

    color: #6b7280;

    font-size: 12px;

    text-decoration: none;

    transition: all .15s ease;
}

.tug-action:hover {
    color: #111827;

    background: #f9fafb;

    border-color: #d1d5db;
}

.tug-action.edit:hover {
    color: #2563eb;

    background: #eff6ff;

    border-color: #bfdbfe;
}

.tug-action.delete {
    cursor: pointer;
}

.tug-action.delete:hover {
    color: #dc2626;

    background: #fef2f2;

    border-color: #fecaca;
}


/* =====================================================
   EMPTY STATE
====================================================== */

.tug-empty {
    padding: 70px 20px;

    text-align: center;
}

.tug-empty-icon {
    width: 52px;
    height: 52px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 14px;

    border-radius: 13px;

    background: #f8fafc;

    border: 1px solid #eef0f3;

    color: #9ca3af;

    font-size: 19px;
}

.tug-empty-title {
    margin-bottom: 5px;

    color: #111827;

    font-size: 14px;

    font-weight: 700;
}

.tug-empty-description {
    max-width: 340px;

    margin: 0 auto 18px;

    color: #9ca3af;

    font-size: 12px;

    line-height: 1.6;
}


/* =====================================================
   PAGINATION
====================================================== */

.tug-pagination {
    padding: 15px 20px;

    border-top: 1px solid var(--page-border);

    background: #fff;
}

.tug-pagination .pagination {
    margin-bottom: 0;
}


/* =====================================================
   RESPONSIVE
====================================================== */

@media (max-width: 768px) {

    .tug-header {
        align-items: flex-start !important;

        flex-direction: column;

        gap: 15px;
    }

    .tug-title {
        font-size: 25px;
    }

    .btn-add-tug {
        width: 100%;

        justify-content: center;
    }

    .tug-toolbar {
        align-items: flex-start;

        flex-direction: column;

        gap: 12px;
    }

    .tug-table {
        min-width: 1050px;
    }

    .tug-actions {
        justify-content: flex-start;
    }

}

</style>


<div class="container-fluid tug-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="tug-header d-flex justify-content-between align-items-center">

        <div>

            <div class="tug-eyebrow">

                <span></span>

                Game Management

            </div>


            <h1 class="tug-title">

                Tug Of War

            </h1>


            <p class="tug-description">

                Kelola soal yang digunakan dalam permainan tarik tambang.

            </p>

        </div>


        <a
            href="{{ route('owner.tug-questions.create') }}"
            class="btn-add-tug"
        >

            <i class="bi bi-plus-lg"></i>

            <span>
                Tambah Soal
            </span>

        </a>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div
            class="alert alert-success tug-alert alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-check-circle-fill"></i>

            <span>
                {{ session('success') }}
            </span>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         ERROR
    ====================================================== --}}

    @if(session('error'))

        <div
            class="alert alert-danger tug-alert alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-exclamation-circle-fill"></i>

            <span>
                {{ session('error') }}
            </span>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         VALIDATION
    ====================================================== --}}

    @if($errors->any())

        <div
            class="alert alert-danger tug-alert mb-4"
            role="alert"
        >

            <i class="bi bi-exclamation-triangle-fill"></i>

            <div>

                <div class="fw-semibold mb-1">
                    Terdapat beberapa kesalahan:
                </div>

                <ul class="mb-0 ps-3">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    @endif


    {{-- =====================================================
         MAIN CARD
    ====================================================== --}}

    <div class="tug-table-card">


        {{-- =================================================
             TOOLBAR
        ================================================== --}}

        <div class="tug-toolbar">

            <div class="toolbar-heading">

                <div class="toolbar-icon">

                    <i class="bi bi-arrows-collapse"></i>

                </div>


                <div>

                    <h2 class="toolbar-title">

                        Daftar Soal Tug Of War

                    </h2>


                    <p class="toolbar-description">

                        Semua pertanyaan yang tersedia untuk permainan.

                    </p>

                </div>

            </div>


            <div class="toolbar-count">

                {{ number_format($questions->total()) }}

                soal

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-responsive">

            <table class="table tug-table align-middle">

                <thead>

                    <tr>

                        <th class="number-column">
                            #
                        </th>

                        <th>
                            Pertanyaan
                        </th>

                        <th>
                            Pilihan Jawaban
                        </th>

                        <th>
                            Jawaban Benar
                        </th>

                        <th>
                            Urutan
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($questions as $question)

                        <tr>


                            {{-- NUMBER --}}

                            <td class="number-column">

                                {{ $questions->firstItem() + $loop->index }}

                            </td>


                            {{-- QUESTION --}}

                            <td>

                                <div class="tug-question-text">

                                    {{ \Illuminate\Support\Str::limit(
                                        $question->question,
                                        100
                                    ) }}

                                </div>

                            </td>


                            {{-- ANSWERS --}}

                            <td>

                                <div class="tug-answer-list">


                                    {{-- A --}}

                                    <div class="tug-answer
                                        {{ $question->correct_answer === 'a'
                                            ? 'correct'
                                            : '' }}"
                                    >

                                        <span class="tug-answer-letter">
                                            A
                                        </span>

                                        <span>
                                            {{ $question->answer_a }}
                                        </span>

                                    </div>


                                    {{-- B --}}

                                    <div class="tug-answer
                                        {{ $question->correct_answer === 'b'
                                            ? 'correct'
                                            : '' }}"
                                    >

                                        <span class="tug-answer-letter">
                                            B
                                        </span>

                                        <span>
                                            {{ $question->answer_b }}
                                        </span>

                                    </div>


                                    {{-- C --}}

                                    <div class="tug-answer
                                        {{ $question->correct_answer === 'c'
                                            ? 'correct'
                                            : '' }}"
                                    >

                                        <span class="tug-answer-letter">
                                            C
                                        </span>

                                        <span>
                                            {{ $question->answer_c }}
                                        </span>

                                    </div>


                                    {{-- D --}}

                                    <div class="tug-answer
                                        {{ $question->correct_answer === 'd'
                                            ? 'correct'
                                            : '' }}"
                                    >

                                        <span class="tug-answer-letter">
                                            D
                                        </span>

                                        <span>
                                            {{ $question->answer_d }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- CORRECT ANSWER --}}

                            <td>

                                <span class="tug-status active">

                                    <span class="tug-status-dot"></span>

                                    Jawaban
                                    {{ strtoupper(
                                        $question->correct_answer
                                    ) }}

                                </span>

                            </td>


                            {{-- ORDER --}}

                            <td>

                                <span class="tug-order">

                                    {{ $question->order }}

                                </span>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if($question->is_active)

                                    <span class="tug-status active">

                                        <span class="tug-status-dot"></span>

                                        Aktif

                                    </span>

                                @else

                                    <span class="tug-status inactive">

                                        <span class="tug-status-dot"></span>

                                        Nonaktif

                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}

                            <td>

                                <div class="tug-actions">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'owner.tug-questions.edit',
                                            $question
                                        ) }}"
                                        class="tug-action edit"
                                        title="Edit Soal"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'owner.tug-questions.destroy',
                                            $question
                                        ) }}"
                                        onsubmit="return confirm(
                                            'Yakin ingin menghapus soal Tug Of War ini?'
                                        )"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="tug-action delete"
                                            title="Hapus Soal"
                                        >

                                            <i class="bi bi-trash3"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty


                        {{-- EMPTY STATE --}}

                        <tr>

                            <td colspan="7">

                                <div class="tug-empty">

                                    <div class="tug-empty-icon">

                                        <i class="bi bi-arrows-collapse"></i>

                                    </div>


                                    <div class="tug-empty-title">

                                        Belum ada soal

                                    </div>


                                    <p class="tug-empty-description">

                                        Belum ada soal Tug Of War yang dibuat.

                                        Tambahkan soal pertama untuk mulai
                                        menggunakan permainan tarik tambang.

                                    </p>


                                    <a
                                        href="{{ route(
                                            'owner.tug-questions.create'
                                        ) }}"
                                        class="btn-add-tug"
                                    >

                                        <i class="bi bi-plus-lg"></i>

                                        Tambah Soal

                                    </a>

                                </div>

                            </td>

                        </tr>


                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($questions->hasPages())

            <div class="tug-pagination">

                {{ $questions->links() }}

            </div>

        @endif


    </div>

</div>


{{-- =====================================================
     BOOTSTRAP ICONS
====================================================== --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection
