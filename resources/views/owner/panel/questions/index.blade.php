@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       QUESTIONS PAGE
    ====================================================== */

    .questions-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .questions-header {
        margin-bottom: 30px;
    }

    .questions-eyebrow {
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

    .questions-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
    }

    .questions-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .questions-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       ADD BUTTON
    ====================================================== */

    .btn-add-question {
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

    .btn-add-question:hover {
        background: #000;
        color: #fff;

        transform: translateY(-1px);

        box-shadow: 0 7px 18px rgba(15, 23, 42, .12);
    }

    .btn-add-question i {
        font-size: 14px;
    }


    /* =====================================================
       ALERT
    ====================================================== */

    .question-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        padding: 12px 14px;

        border-radius: 10px;

        font-size: 12px;
    }

    .question-alert i {
        margin-top: 1px;

        font-size: 14px;
    }

    .question-alert .btn-close {
        margin-left: auto;

        padding: 5px;

        font-size: 9px;
    }


    /* =====================================================
       MAIN CARD
    ====================================================== */

    .questions-table-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }


    /* =====================================================
       TOOLBAR
    ====================================================== */

    .questions-toolbar {
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

    .questions-table {
        margin: 0;
    }

    .questions-table thead th {
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

    .questions-table tbody td {
        padding: 15px 18px;

        border-bottom: 1px solid #f3f4f6;

        color: #374151;

        font-size: 13px;

        vertical-align: middle;
    }

    .questions-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .questions-table tbody tr {
        transition: background .15s ease;
    }

    .questions-table tbody tr:hover {
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
       ASSESSMENT
    ====================================================== */

    .assessment-name {
        color: var(--page-text);

        font-size: 13px;
        font-weight: 650;

        line-height: 1.4;
    }


    /* =====================================================
       QUESTION
    ====================================================== */

    .question-text {
        max-width: 500px;

        color: #4b5563;

        font-size: 12px;

        line-height: 1.55;
    }


    /* =====================================================
       TYPE
    ====================================================== */

    .question-type {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 10px;
        font-weight: 700;

        white-space: nowrap;
    }

    .question-type.multiple {
        color: #374151;
        background: #f3f4f6;
    }

    .question-type.text {
        color: #92400e;
        background: #fffbeb;
    }

    .question-type i {
        font-size: 10px;
    }


    /* =====================================================
       SCORE
    ====================================================== */

    .score-wrapper {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .score-value {
        color: #111827;

        font-size: 12px;
        font-weight: 700;
    }

    .score-unit {
        color: #9ca3af;

        font-size: 10px;
    }


    /* =====================================================
       ACTION
    ====================================================== */

    .question-actions {
        display: flex;
        align-items: center;

        gap: 5px;
    }

    .question-action {
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

    .question-action:hover {
        color: #111827;

        background: #f9fafb;

        border-color: #d1d5db;
    }

    .question-action.view:hover {
        color: #374151;

        background: #f3f4f6;
    }

    .question-action.edit:hover {
        color: #2563eb;

        background: #eff6ff;

        border-color: #bfdbfe;
    }

    .question-action.delete {
        cursor: pointer;
    }

    .question-action.delete:hover {
        color: #dc2626;

        background: #fef2f2;

        border-color: #fecaca;
    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .questions-empty {
        padding: 70px 20px;

        text-align: center;
    }

    .questions-empty-icon {
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

    .questions-empty-title {
        margin-bottom: 5px;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .questions-empty-description {
        max-width: 340px;

        margin: 0 auto 18px;

        color: #9ca3af;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =====================================================
       PAGINATION
    ====================================================== */

    .questions-pagination {
        padding: 15px 20px;

        border-top: 1px solid var(--page-border);

        background: #fff;
    }

    .questions-pagination .pagination {
        margin-bottom: 0;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .questions-header {
            align-items: flex-start !important;

            flex-direction: column;

            gap: 15px;
        }

        .questions-title {
            font-size: 25px;
        }

        .btn-add-question {
            width: 100%;

            justify-content: center;
        }

        .questions-toolbar {
            align-items: flex-start;

            flex-direction: column;

            gap: 12px;
        }

        .questions-table {
            min-width: 950px;
        }

        .question-actions {
            justify-content: flex-start;
        }

    }

</style>

<div class="container-fluid questions-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="questions-header d-flex justify-content-between align-items-center">

    <div>

        <div class="questions-eyebrow">

            <span></span>

            Assessment Management

        </div>

        <h1 class="questions-title">
            Soal Assessment
        </h1>

        <p class="questions-description">
            Kelola pertanyaan dan soal yang digunakan dalam assessment.
        </p>

    </div>


    <a
        href="{{ route('owner.questions.create') }}"
        class="btn-add-question"
    >

        <i class="bi bi-plus-lg"></i>

        <span>
            Tambah Soal
        </span>

    </a>

</div>


{{-- =====================================================
     ALERT SUCCESS
====================================================== --}}

@if(session('success'))

    <div
        class="alert alert-success question-alert alert-dismissible fade show mb-4"
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
     ALERT ERROR
====================================================== --}}

@if(session('error'))

    <div
        class="alert alert-danger question-alert alert-dismissible fade show mb-4"
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
        class="alert alert-danger question-alert mb-4"
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
     MAIN TABLE
====================================================== --}}

<div class="questions-table-card">


    {{-- =================================================
         TOOLBAR
    ================================================== --}}

    <div class="questions-toolbar">

        <div class="toolbar-heading">

            <div class="toolbar-icon">

                <i class="bi bi-question-circle"></i>

            </div>


            <div>

                <h2 class="toolbar-title">
                    Daftar Soal
                </h2>

                <p class="toolbar-description">
                    Semua pertanyaan yang telah dibuat.
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

        <table class="table questions-table align-middle">

            <thead>

                <tr>

                    <th class="number-column">
                        #
                    </th>

                    <th>
                        Assessment
                    </th>

                    <th>
                        Pertanyaan
                    </th>

                    <th>
                        Tipe
                    </th>

                    <th>
                        Nilai
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


                        {{-- ASSESSMENT --}}

                        <td>

                            <div class="assessment-name">

                                {{ $question->assessment?->title ?? '—' }}

                            </div>

                        </td>


                        {{-- QUESTION --}}

                        <td>

                            <div class="question-text">

                                {{ \Illuminate\Support\Str::limit(
                                    $question->question,
                                    100
                                ) }}

                            </div>

                        </td>


                        {{-- TYPE --}}

                        <td>

                            @if($question->type === 'multiple_choice')

                                <span class="question-type multiple">

                                    <i class="bi bi-list-check"></i>

                                    Pilihan Ganda

                                </span>

                            @else

                                <span class="question-type text">

                                    <i class="bi bi-input-cursor-text"></i>

                                    Free Text

                                </span>

                            @endif

                        </td>


                        {{-- SCORE --}}

                        <td>

                            <div class="score-wrapper">

                                <span class="score-value">

                                    {{ $question->score }}

                                </span>

                                <span class="score-unit">
                                    poin
                                </span>

                            </div>

                        </td>


                        {{-- ACTION --}}

                        <td>

                            <div class="question-actions">


                                {{-- VIEW --}}

                                <a
                                    href="{{ route(
                                        'owner.questions.show',
                                        $question
                                    ) }}"
                                    class="question-action view"
                                    title="Lihat Soal"
                                >

                                    <i class="bi bi-eye"></i>

                                </a>


                                {{-- EDIT --}}

                                <a
                                    href="{{ route(
                                        'owner.questions.edit',
                                        $question
                                    ) }}"
                                    class="question-action edit"
                                    title="Edit Soal"
                                >

                                    <i class="bi bi-pencil"></i>

                                </a>


                                {{-- DELETE --}}

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'owner.questions.destroy',
                                        $question
                                    ) }}"
                                    onsubmit="return confirm(
                                        'Yakin ingin menghapus soal ini?'
                                    )"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="question-action delete"
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

                        <td colspan="6">

                            <div class="questions-empty">

                                <div class="questions-empty-icon">

                                    <i class="bi bi-question-circle"></i>

                                </div>

                                <div class="questions-empty-title">

                                    Belum ada soal

                                </div>

                                <p class="questions-empty-description">

                                    Belum ada soal yang dibuat.
                                    Tambahkan soal pertama untuk mulai
                                    membangun assessment.

                                </p>

                                <a
                                    href="{{ route(
                                        'owner.questions.create'
                                    ) }}"
                                    class="btn-add-question"
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

        <div class="questions-pagination">

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
