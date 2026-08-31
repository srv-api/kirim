@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       ASSESSMENT PAGE
    ====================================================== */

    .assessment-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-soft: #f8fafc;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }



    /* =====================================================
       HEADER
    ====================================================== */

    .assessment-header {
        margin-bottom: 30px;
    }

    .assessment-eyebrow {
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

    .assessment-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
    }

    .assessment-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .assessment-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }



    /* =====================================================
       ADD BUTTON
    ====================================================== */

    .btn-add-assessment {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 10px 15px;

        border: 0;
        border-radius: 10px;

        background: #262711;
        color: #fff;

        font-size: 12px;
        font-weight: 650;

        text-decoration: none;

        transition: all .18s ease;
    }

    .btn-add-assessment:hover {
        background: #000;
        color: #fff;

        transform: translateY(-1px);

        box-shadow: 0 7px 18px rgba(15, 23, 42, .12);
    }

    .btn-add-assessment i {
        font-size: 14px;
    }



    /* =====================================================
       ALERT
    ====================================================== */

    .assessment-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        padding: 12px 14px;

        border-radius: 10px;

        font-size: 12px;
    }

    .assessment-alert i {
        margin-top: 1px;
        font-size: 14px;
    }

    .assessment-alert .btn-close {
        margin-left: auto;
        padding: 5px;
        font-size: 9px;
    }



    /* =====================================================
       STATISTICS
    ====================================================== */

    .assessment-stat {
        position: relative;

        height: 100%;

        padding: 20px;

        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;

        transition: all .2s ease;
    }

    .assessment-stat:hover {
        transform: translateY(-2px);

        border-color: #d1d5db;

        box-shadow: 0 12px 30px rgba(15, 23, 42, .05);
    }

    .assessment-stat-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .assessment-stat-label {
        color: var(--page-muted);

        font-size: 12px;
        font-weight: 500;
    }

    .assessment-stat-value {
        margin-top: 7px;

        color: var(--page-text);

        font-size: 29px;
        line-height: 1;

        font-weight: 750;

        letter-spacing: -.04em;
    }

    .assessment-stat-icon {
        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #f8fafc;
        border: 1px solid #f1f5f9;

        color: #374151;

        font-size: 17px;
    }

    .assessment-stat-bottom {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-top: 19px;

        color: #9ca3af;

        font-size: 11px;
    }

    .assessment-stat-bottom i {
        font-size: 10px;
    }



    /* =====================================================
       MAIN CARD
    ====================================================== */

    .assessment-table-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }



    /* =====================================================
       TOOLBAR
    ====================================================== */

    .assessment-toolbar {
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

    .assessment-table {
        margin: 0;
    }

    .assessment-table thead th {
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

    .assessment-table tbody td {
        padding: 15px 18px;

        border-bottom: 1px solid #f3f4f6;

        color: #374151;

        font-size: 13px;

        vertical-align: middle;
    }

    .assessment-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .assessment-table tbody tr {
        transition: background .15s ease;
    }

    .assessment-table tbody tr:hover {
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
       ASSESSMENT INFO
    ====================================================== */

    .assessment-name {
        color: var(--page-text);

        font-size: 13px;
        font-weight: 650;

        margin-bottom: 3px;
    }

    .assessment-slug {
        color: #9ca3af;

        font-size: 10px;

        font-family:
            ui-monospace,
            SFMono-Regular,
            Menlo,
            Monaco,
            Consolas,
            monospace;
    }

    .category-text {
        color: #4b5563;

        font-size: 12px;
    }

    .duration-text,
    .passing-text {
        color: #374151;

        font-size: 12px;
        font-weight: 600;
    }

    .unit-text {
        color: #9ca3af;

        font-size: 11px;
        font-weight: 400;
    }



    /* =====================================================
       STATUS
    ====================================================== */

    .assessment-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 10px;
        font-weight: 700;
    }

    .assessment-status::before {
        content: "";

        width: 5px;
        height: 5px;

        border-radius: 50%;

        background: currentColor;
    }

    .status-active {
        color: #047857;
        background: #ecfdf5;
    }

    .status-draft {
        color: #92400e;
        background: #fffbeb;
    }

    .status-inactive {
        color: #6b7280;
        background: #f3f4f6;
    }



    /* =====================================================
       ACTION
    ====================================================== */

    .assessment-actions {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .assessment-action {
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

    .assessment-action:hover {
        color: #111827;
        background: #f9fafb;
        border-color: #d1d5db;
    }

    .assessment-action.view:hover {
        color: #374151;
        background: #f3f4f6;
    }

    .assessment-action.edit:hover {
        color: #2563eb;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    .assessment-action.delete {
        cursor: pointer;
    }

    .assessment-action.delete:hover {
        color: #dc2626;
        background: #fef2f2;
        border-color: #fecaca;
    }



    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .assessment-empty {
        padding: 70px 20px;

        text-align: center;
    }

    .assessment-empty-icon {
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

    .assessment-empty-title {
        margin-bottom: 5px;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .assessment-empty-description {
        max-width: 340px;

        margin: 0 auto 18px;

        color: #9ca3af;

        font-size: 12px;
        line-height: 1.6;
    }



    /* =====================================================
       PAGINATION
    ====================================================== */

    .assessment-pagination {
        padding: 15px 20px;

        border-top: 1px solid var(--page-border);

        background: #fff;
    }

    .assessment-pagination .pagination {
        margin-bottom: 0;
    }



    /* =====================================================
       DELETE CONFIRMATION MODAL
    ====================================================== */

    .delete-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;

        display: none;
        align-items: center;
        justify-content: center;

        padding: 16px;

        background: rgba(17, 24, 39, .45);

        opacity: 0;

        transition: opacity .2s ease;
    }

    .delete-modal.show {
        display: flex;
        opacity: 1;
    }

    .delete-modal-box {
        width: 100%;
        max-width: 380px;

        background: #fff;

        border-radius: 12px;

        padding: 24px;

        box-shadow:
            0 20px 60px rgba(0, 0, 0, .18);

        transform: translateY(10px) scale(.98);

        transition: .2s ease;
    }

    .delete-modal.show .delete-modal-box {
        transform: translateY(0) scale(1);
    }

    .delete-modal-title {
        margin: 0 0 7px;

        font-size: 17px;
        font-weight: 700;

        color: #212529;
    }

    .delete-modal-text {
        margin: 0;

        font-size: 12px;
        line-height: 1.6;

        color: #6c757d;
    }

    .delete-modal-name {
        margin-top: 10px;

        padding: 9px 10px;

        border-radius: 7px;

        background: #f8f9fa;

        border: 1px solid #edf0f2;

        color: #343a40;

        font-size: 12px;
        font-weight: 600;

        overflow-wrap: anywhere;
    }

    .delete-modal-actions {
        display: flex;
        justify-content: flex-end;

        gap: 8px;

        margin-top: 22px;
    }

    .delete-modal-actions button {
        border-radius: 6px;

        padding: 8px 13px;

        font-size: 11px;
        font-weight: 600;

        cursor: pointer;
    }

    .delete-cancel {
        background: #fff;

        color: #495057;

        border: 1px solid #dee2e6;
    }

    .delete-cancel:hover {
        background: #f8f9fa;
    }

    .delete-confirm {
        background: #dc2626;

        color: #fff;

        border: 1px solid #dc2626;
    }

    .delete-confirm:hover {
        background: #b91c1c;

        border-color: #b91c1c;
    }

    .delete-confirm:disabled {
        opacity: .65;

        cursor: not-allowed;
    }



    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .assessment-header {
            align-items: flex-start !important;

            flex-direction: column;

            gap: 15px;
        }

        .assessment-title {
            font-size: 25px;
        }

        .btn-add-assessment {
            width: 100%;

            justify-content: center;
        }

        .assessment-toolbar {
            align-items: flex-start;

            flex-direction: column;

            gap: 12px;
        }

        .assessment-table {
            min-width: 900px;
        }

        .assessment-actions {
            justify-content: flex-start;
        }

    }


    @media (max-width: 600px) {

        .delete-modal-box {
            max-width: 100%;

            padding: 20px;
        }

        .delete-modal-title {
            font-size: 16px;
        }

        .delete-modal-text {
            font-size: 11px;
        }

    }

</style>



<div class="container-fluid assessment-page">



    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="assessment-header d-flex justify-content-between align-items-center">

        <div>

            <div class="assessment-eyebrow">

                <span></span>

                Assessment Management

            </div>

            <h1 class="assessment-title">

                Assessment

            </h1>

            <p class="assessment-description">

                Kelola assessment, kategori, durasi, dan status pengerjaan.

            </p>

        </div>



        <a
            href="{{ route('owner.assessments.create') }}"
            class="btn-add-assessment"
        >

            <i class="bi bi-plus-lg"></i>

            <span>
                Tambah Assessment
            </span>

        </a>

    </div>



    {{-- =====================================================
         ALERT SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div
            class="alert alert-success assessment-alert alert-dismissible fade show mb-4"
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
            class="alert alert-danger assessment-alert alert-dismissible fade show mb-4"
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
            class="alert alert-danger assessment-alert mb-4"
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
         STATISTICS
    ====================================================== --}}

    <div class="row g-3 mb-4">



        {{-- TOTAL --}}

        <div class="col-md-4">

            <div class="assessment-stat">

                <div class="assessment-stat-content">

                    <div>

                        <div class="assessment-stat-label">

                            Total Assessment

                        </div>

                        <div class="assessment-stat-value">

                            {{ $assessments->total() }}

                        </div>

                    </div>

                    <div class="assessment-stat-icon">

                        <i class="bi bi-clipboard-check"></i>

                    </div>

                </div>

                <div class="assessment-stat-bottom">

                    <i class="bi bi-layers"></i>

                    <span>
                        Seluruh assessment
                    </span>

                </div>

            </div>

        </div>



        {{-- ACTIVE --}}

        <div class="col-md-4">

            <div class="assessment-stat">

                <div class="assessment-stat-content">

                    <div>

                        <div class="assessment-stat-label">

                            Assessment Aktif

                        </div>

                        <div class="assessment-stat-value">

                            {{ $assessments->where('status', 'active')->count() }}

                        </div>

                    </div>

                    <div class="assessment-stat-icon">

                        <i class="bi bi-check-circle"></i>

                    </div>

                </div>

                <div class="assessment-stat-bottom">

                    <i class="bi bi-broadcast"></i>

                    <span>
                        Sedang tersedia
                    </span>

                </div>

            </div>

        </div>



        {{-- DRAFT --}}

        <div class="col-md-4">

            <div class="assessment-stat">

                <div class="assessment-stat-content">

                    <div>

                        <div class="assessment-stat-label">

                            Assessment Draft

                        </div>

                        <div class="assessment-stat-value">

                            {{ $assessments->where('status', 'draft')->count() }}

                        </div>

                    </div>

                    <div class="assessment-stat-icon">

                        <i class="bi bi-pencil-square"></i>

                    </div>

                </div>

                <div class="assessment-stat-bottom">

                    <i class="bi bi-clock"></i>

                    <span>
                        Masih dalam penyusunan
                    </span>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         MAIN TABLE
    ====================================================== --}}

    <div class="assessment-table-card">



        {{-- =================================================
             TOOLBAR
        ================================================== --}}

        <div class="assessment-toolbar">

            <div class="toolbar-heading">

                <div class="toolbar-icon">

                    <i class="bi bi-list-ul"></i>

                </div>

                <div>

                    <h2 class="toolbar-title">

                        Daftar Assessment

                    </h2>

                    <p class="toolbar-description">

                        Semua assessment yang telah dibuat.

                    </p>

                </div>

            </div>



            <div class="toolbar-count">

                {{ $assessments->total() }}

                assessment

            </div>

        </div>



        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-responsive">

            <table class="table assessment-table align-middle">

                <thead>

                    <tr>

                        <th class="number-column">
                            #
                        </th>

                        <th>
                            Assessment
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Durasi
                        </th>

                        <th>
                            Passing Score
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

                    @forelse($assessments as $assessment)

                        <tr>



                            {{-- NUMBER --}}

                            <td class="number-column">

                                {{ $assessments->firstItem() + $loop->index }}

                            </td>



                            {{-- ASSESSMENT --}}

                            <td>

                                <div class="assessment-name">

                                    {{ $assessment->title }}

                                </div>

                                <div class="assessment-slug">

                                    /{{ $assessment->slug }}

                                </div>

                            </td>



                            {{-- CATEGORY --}}

                            <td>

                                <span class="category-text">

                                    {{ $assessment->category ?? '—' }}

                                </span>

                            </td>



                            {{-- DURATION --}}

                            <td>

                                <span class="duration-text">

                                    {{ $assessment->duration }}

                                </span>

                                <span class="unit-text">

                                    menit

                                </span>

                            </td>



                            {{-- PASSING SCORE --}}

                            <td>

                                <span class="passing-text">

                                    {{ $assessment->passing_score }}%

                                </span>

                            </td>



                            {{-- STATUS --}}

                            <td>

                                @if($assessment->status === 'active')

                                    <span class="assessment-status status-active">

                                        Aktif

                                    </span>

                                @elseif($assessment->status === 'draft')

                                    <span class="assessment-status status-draft">

                                        Draft

                                    </span>

                                @else

                                    <span class="assessment-status status-inactive">

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>



                            {{-- ACTION --}}

                            <td>

                                <div class="assessment-actions">



                                    {{-- VIEW --}}

                                    <a
                                        href="{{ route(
                                            'owner.assessments.show',
                                            $assessment
                                        ) }}"
                                        class="assessment-action view"
                                        title="Lihat"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>



                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'owner.assessments.edit',
                                            $assessment
                                        ) }}"
                                        class="assessment-action edit"
                                        title="Edit"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>



                                    {{-- DELETE --}}

                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'owner.assessments.destroy',
                                            $assessment
                                        ) }}"
                                        class="delete-assessment-form"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="assessment-action delete"
                                            title="Hapus"
                                            data-delete-id="{{ $assessment->id }}"
                                            data-delete-title="{{ $assessment->title }}"
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

                                <div class="assessment-empty">

                                    <div class="assessment-empty-icon">

                                        <i class="bi bi-clipboard"></i>

                                    </div>

                                    <div class="assessment-empty-title">

                                        Belum ada assessment

                                    </div>

                                    <p class="assessment-empty-description">

                                        Belum ada assessment yang dibuat.
                                        Tambahkan assessment pertama untuk
                                        mulai mengelola soal dan peserta.

                                    </p>

                                    <a
                                        href="{{ route(
                                            'owner.assessments.create'
                                        ) }}"
                                        class="btn-add-assessment"
                                    >

                                        <i class="bi bi-plus-lg"></i>

                                        Tambah Assessment

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

        @if($assessments->hasPages())

            <div class="assessment-pagination">

                {{ $assessments->links() }}

            </div>

        @endif



    </div>

</div>



{{-- =====================================================
     DELETE CONFIRMATION MODAL
====================================================== --}}

<div
    class="delete-modal"
    id="deleteModal"
>

    <div
        class="delete-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteModalTitle"
    >

        {{-- TITLE --}}

        <h3
            class="delete-modal-title"
            id="deleteModalTitle"
        >

            Hapus Assessment?

        </h3>



        {{-- DESCRIPTION --}}

        <p class="delete-modal-text">

            Apakah Anda yakin ingin menghapus assessment ini?

            Tindakan ini tidak dapat dibatalkan.

        </p>



        {{-- ASSESSMENT NAME --}}

        <div
            class="delete-modal-name"
            id="deleteAssessmentName"
        >

        </div>



        {{-- ACTIONS --}}

        <div class="delete-modal-actions">

            <button
                type="button"
                class="delete-cancel"
                id="cancelDelete"
            >

                Batal

            </button>



            <button
                type="button"
                class="delete-confirm"
                id="confirmDelete"
            >

                Ya, Hapus

            </button>

        </div>

    </div>

</div>



{{-- =====================================================
     BOOTSTRAP ICONS
====================================================== --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>



{{-- =====================================================
     DELETE MODAL JAVASCRIPT
====================================================== --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /*
        |--------------------------------------------------------------------------
        | ELEMENT
        |--------------------------------------------------------------------------
        */

        const deleteModal =
            document.getElementById(
                'deleteModal'
            );


        const deleteAssessmentName =
            document.getElementById(
                'deleteAssessmentName'
            );


        const cancelDelete =
            document.getElementById(
                'cancelDelete'
            );


        const confirmDelete =
            document.getElementById(
                'confirmDelete'
            );


        let activeDeleteForm = null;



        /*
        |--------------------------------------------------------------------------
        | OPEN DELETE MODAL
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.delete-assessment-form'
            )
            .forEach(
                function (form) {


                    const button =
                        form.querySelector(
                            '[data-delete-id]'
                        );


                    if (!button) {
                        return;
                    }



                    button.addEventListener(
                        'click',
                        function (event) {


                            /*
                            | Jangan submit form terlebih dahulu
                            */

                            event.preventDefault();



                            /*
                            | Simpan form yang akan dihapus
                            */

                            activeDeleteForm =
                                form;



                            /*
                            | Ambil nama assessment
                            */

                            const title =
                                button.getAttribute(
                                    'data-delete-title'
                                );



                            deleteAssessmentName.textContent =
                                title ||
                                'Assessment ini';



                            /*
                            | Tampilkan modal
                            */

                            deleteModal.classList.add(
                                'show'
                            );


                        }
                    );


                }
            );



        /*
        |--------------------------------------------------------------------------
        | CANCEL DELETE
        |--------------------------------------------------------------------------
        */

        if (cancelDelete) {

            cancelDelete.addEventListener(
                'click',
                function () {


                    deleteModal.classList.remove(
                        'show'
                    );


                    activeDeleteForm = null;


                }
            );

        }



        /*
        |--------------------------------------------------------------------------
        | CONFIRM DELETE
        |--------------------------------------------------------------------------
        */

        if (confirmDelete) {

            confirmDelete.addEventListener(
                'click',
                function () {


                    /*
                    | Pastikan ada form aktif
                    */

                    if (!activeDeleteForm) {
                        return;
                    }



                    /*
                    | Disable button
                    */

                    confirmDelete.disabled =
                        true;



                    /*
                    | Ubah teks button
                    */

                    confirmDelete.innerHTML =
                        'Menghapus...';



                    /*
                    | Submit form DELETE
                    */

                    activeDeleteForm.submit();


                }
            );

        }



        /*
        |--------------------------------------------------------------------------
        | CLICK BACKDROP
        |--------------------------------------------------------------------------
        */

        if (deleteModal) {

            deleteModal.addEventListener(
                'click',
                function (event) {


                    if (
                        event.target ===
                        deleteModal
                    ) {


                        deleteModal.classList.remove(
                            'show'
                        );


                        activeDeleteForm = null;


                    }

                }
            );

        }



        /*
        |--------------------------------------------------------------------------
        | ESC KEY
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'keydown',
            function (event) {


                if (
                    event.key === 'Escape' &&
                    deleteModal &&
                    deleteModal.classList.contains(
                        'show'
                    )
                ) {


                    deleteModal.classList.remove(
                        'show'
                    );


                    activeDeleteForm = null;


                }

            }
        );


    }
);

</script>

@endsection