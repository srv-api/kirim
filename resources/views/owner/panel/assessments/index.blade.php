@extends('dashboard')

@section('content')

<style>
    .assessment-page {
        padding-bottom: 30px;
    }

    .page-header {
        margin-bottom: 28px;
    }

    .page-title {
        font-size: 25px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 5px;
        letter-spacing: -0.3px;
    }

    .page-description {
        color: #6b7280;
        font-size: 14px;
        margin: 0;
    }

    .btn-add {
        background: #111827;
        color: #fff;
        border: 0;
        padding: 10px 17px;
        border-radius: 7px;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-add:hover {
        background: #000;
        color: #fff;
    }

    /* STATISTIC */

    .stat-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 18px 20px;
        height: 100%;
    }

    .stat-label {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 7px;
    }

    .stat-value {
        color: #111827;
        font-size: 25px;
        font-weight: 700;
        line-height: 1;
    }

    .stat-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f3f4f6;
        font-size: 18px;
    }

    /* MAIN CARD */

    .assessment-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-toolbar {
        padding: 17px 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .toolbar-title {
        font-size: 15px;
        font-weight: 650;
        color: #111827;
        margin: 0;
    }

    .toolbar-description {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 2px;
    }

    /* TABLE */

    .assessment-table {
        margin: 0;
    }

    .assessment-table thead th {
        background: #f9fafb;
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        border-bottom: 1px solid #e5e7eb;
        padding: 13px 18px;
        white-space: nowrap;
    }

    .assessment-table tbody td {
        padding: 16px 18px;
        border-bottom: 1px solid #f0f1f3;
        color: #374151;
        font-size: 14px;
        vertical-align: middle;
    }

    .assessment-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .assessment-table tbody tr:hover {
        background: #fafafa;
    }

    .number-column {
        width: 55px;
        color: #9ca3af !important;
        font-size: 13px !important;
    }

    .assessment-name {
        color: #111827;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .assessment-slug {
        color: #9ca3af;
        font-size: 12px;
    }

    .category-text {
        color: #4b5563;
    }

    .duration-text,
    .passing-text {
        color: #374151;
        font-weight: 500;
    }

    /* STATUS */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-active {
        color: #166534;
        background: #f0fdf4;
    }

    .status-draft {
        color: #92400e;
        background: #fffbeb;
    }

    .status-inactive {
        color: #4b5563;
        background: #f3f4f6;
    }

    /* ACTION */

    .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .action-btn {
        border: 1px solid #e5e7eb;
        background: #fff;
        color: #4b5563;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        transition: .15s;
    }

    .action-btn:hover {
        background: #f9fafb;
        color: #111827;
        border-color: #d1d5db;
    }

    .action-edit:hover {
        color: #1d4ed8;
        border-color: #bfdbfe;
        background: #eff6ff;
    }

    .action-delete:hover {
        color: #b91c1c;
        border-color: #fecaca;
        background: #fef2f2;
    }

    /* EMPTY */

    .empty-state {
        padding: 70px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 54px;
        height: 54px;
        margin: 0 auto 15px;
        border-radius: 10px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .empty-title {
        color: #111827;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .empty-description {
        color: #9ca3af;
        font-size: 13px;
        margin-bottom: 18px;
    }

    /* ALERT */

    .custom-alert {
        border-radius: 8px;
        border: 1px solid;
        font-size: 13px;
    }

    /* FOOTER */

    .table-footer {
        padding: 15px 20px;
        border-top: 1px solid #e5e7eb;
        background: #fff;
    }

    @media (max-width: 768px) {

        .page-header {
            align-items: flex-start !important;
            gap: 15px;
            flex-direction: column;
        }

        .btn-add {
            width: 100%;
        }

        .card-toolbar {
            align-items: flex-start;
            flex-direction: column;
            gap: 4px;
        }

        .assessment-table {
            min-width: 950px;
        }

    }
</style>

<div class="container-fluid assessment-page">


{{-- HEADER --}}
<div class="page-header d-flex justify-content-between align-items-center">

    <div>
        <h2 class="page-title">
            Assessment
        </h2>

        <p class="page-description">
            Kelola assessment dan soal yang tersedia.
        </p>
    </div>

    <a href="{{ route('owner.assessments.create') }}"
       class="btn btn-add">

        + Tambah Assessment

    </a>

</div>


{{-- ALERT SUCCESS --}}
@if(session('success'))

    <div class="alert alert-success custom-alert alert-dismissible fade show mb-4">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- ALERT ERROR --}}
@if(session('error'))

    <div class="alert alert-danger custom-alert alert-dismissible fade show mb-4">

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- VALIDATION --}}
@if($errors->any())

    <div class="alert alert-danger custom-alert mb-4">

        <ul class="mb-0 ps-3">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


{{-- STATISTIC --}}
<div class="row g-3 mb-4">

    <div class="col-md-4">

        <div class="stat-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <div class="stat-label">
                        Total Assessment
                    </div>

                    <div class="stat-value">
                        {{ $assessments->total() }}
                    </div>

                </div>

                <div class="stat-icon">
                    📝
                </div>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="stat-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <div class="stat-label">
                        Assessment Aktif
                    </div>

                    <div class="stat-value">
                        {{ $assessments->where('status', 'active')->count() }}
                    </div>

                </div>

                <div class="stat-icon">
                    ✓
                </div>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="stat-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <div class="stat-label">
                        Draft
                    </div>

                    <div class="stat-value">
                        {{ $assessments->where('status', 'draft')->count() }}
                    </div>

                </div>

                <div class="stat-icon">
                    ◷
                </div>

            </div>

        </div>

    </div>

</div>


{{-- MAIN TABLE --}}
<div class="assessment-card">

    {{-- TOOLBAR --}}
    <div class="card-toolbar">

        <div>

            <div class="toolbar-title">
                Daftar Assessment
            </div>

            <div class="toolbar-description">
                Semua assessment yang telah dibuat.
            </div>

        </div>

    </div>


    {{-- TABLE --}}
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

                                {{ $assessment->category ?? '-' }}

                            </span>

                        </td>


                        {{-- DURATION --}}
                        <td>

                            <span class="duration-text">

                                {{ $assessment->duration }}

                                <span class="text-muted fw-normal">
                                    menit
                                </span>

                            </span>

                        </td>


                        {{-- PASSING --}}
                        <td>

                            <span class="passing-text">

                                {{ $assessment->passing_score }}%

                            </span>

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if($assessment->status === 'active')

                                <span class="status-badge status-active">

                                    <span class="status-dot"></span>

                                    Aktif

                                </span>

                            @elseif($assessment->status === 'draft')

                                <span class="status-badge status-draft">

                                    <span class="status-dot"></span>

                                    Draft

                                </span>

                            @else

                                <span class="status-badge status-inactive">

                                    <span class="status-dot"></span>

                                    Tidak Aktif

                                </span>

                            @endif

                        </td>


                        {{-- ACTION --}}
                        <td>

                            <div class="action-group">

                                {{-- DETAIL --}}
                                <a href="{{ route(
                                    'owner.assessments.show',
                                    $assessment
                                ) }}"
                                   class="action-btn">

                                    Lihat

                                </a>


                                {{-- EDIT --}}
                                <a href="{{ route(
                                    'owner.assessments.edit',
                                    $assessment
                                ) }}"
                                   class="action-btn action-edit">

                                    Edit

                                </a>


                                {{-- DELETE --}}
                                <form method="POST"
                                      action="{{ route(
                                          'owner.assessments.destroy',
                                          $assessment
                                      ) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus assessment ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn action-delete">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    📝
                                </div>

                                <div class="empty-title">
                                    Belum ada assessment
                                </div>

                                <div class="empty-description">
                                    Buat assessment pertama untuk mulai menambahkan soal.
                                </div>

                                <a href="{{ route(
                                    'owner.assessments.create'
                                ) }}"
                                   class="btn btn-add">

                                    + Tambah Assessment

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- PAGINATION --}}
    @if($assessments->hasPages())

        <div class="table-footer">

            {{ $assessments->links() }}

        </div>

    @endif

</div>


</div>

@endsection
