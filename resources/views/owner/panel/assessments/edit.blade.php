blade
@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Edit Assessment</h3>
            <p class="text-muted mb-0">
                Perbarui informasi assessment
            </p>
        </div>

        <a href="{{ route('owner.assessments.show', $assessment) }}"
           class="btn btn-secondary">
            ← Kembali
        </a>

    </div>


    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- SUCCESS --}}
    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Informasi Assessment
            </h5>

        </div>


        <div class="card-body">

            <form method="POST"
                  action="{{ route('owner.assessments.update', $assessment) }}">

                @csrf

                @method('PUT')


                {{-- TITLE --}}
                <div class="mb-3">

                    <label class="form-label">
                        Judul Assessment
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $assessment->title) }}"
                        placeholder="Masukkan judul assessment"
                        required
                    >

                </div>


                {{-- DESCRIPTION --}}
                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan deskripsi assessment"
                    >{{ old('description', $assessment->description) }}</textarea>

                </div>


                {{-- CATEGORY --}}
                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <input
                        type="text"
                        name="category"
                        class="form-control"
                        value="{{ old('category', $assessment->category) }}"
                        placeholder="Contoh: Pemrograman"
                    >

                </div>


                {{-- DURATION --}}
                <div class="mb-3">

                    <label class="form-label">
                        Durasi
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="duration"
                            class="form-control"
                            value="{{ old('duration', $assessment->duration) }}"
                            min="1"
                            required
                        >

                        <span class="input-group-text">
                            Menit
                        </span>

                    </div>

                </div>


                {{-- PASSING SCORE --}}
                <div class="mb-3">

                    <label class="form-label">
                        Passing Score
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="passing_score"
                            class="form-control"
                            value="{{ old('passing_score', $assessment->passing_score) }}"
                            min="0"
                            max="100"
                            step="0.01"
                            required
                        >

                        <span class="input-group-text">
                            %
                        </span>

                    </div>

                </div>


                {{-- STATUS --}}
                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option
                            value="draft"
                            {{ old('status', $assessment->status) === 'draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="active"
                            {{ old('status', $assessment->status) === 'active' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="inactive"
                            {{ old('status', $assessment->status) === 'inactive' ? 'selected' : '' }}
                        >
                            Tidak Aktif
                        </option>

                    </select>

                </div>


                {{-- START AT --}}
                <div class="mb-3">

                    <label class="form-label">
                        Mulai Assessment
                    </label>

                    <input
                        type="datetime-local"
                        name="start_at"
                        class="form-control"
                        value="{{ old(
                            'start_at',
                            $assessment->start_at
                                ? $assessment->start_at->format('Y-m-d\TH:i')
                                : ''
                        ) }}"
                    >

                </div>


                {{-- END AT --}}
                <div class="mb-4">

                    <label class="form-label">
                        Selesai Assessment
                    </label>

                    <input
                        type="datetime-local"
                        name="end_at"
                        class="form-control"
                        value="{{ old(
                            'end_at',
                            $assessment->end_at
                                ? $assessment->end_at->format('Y-m-d\TH:i')
                                : ''
                        ) }}"
                    >

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('owner.assessments.show', $assessment) }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

