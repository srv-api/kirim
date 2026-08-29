@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Buat Assessment
        </h3>

        <p class="text-muted">
            PIN 6 digit akan dibuat otomatis.
        </p>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                method="POST"
                action="{{ route(
                    'owner.assessments.store'
                ) }}"
            >

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Judul Assessment
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="form-control"
                        required
                    >

                    @error('title')

                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control"
                    >{{ old('description') }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        class="form-control"
                    >

                </div>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Durasi
                        </label>

                        <input
                            type="number"
                            name="duration"
                            value="{{ old(
                                'duration',
                                60
                            ) }}"
                            min="1"
                            class="form-control"
                            required
                        >

                        <small class="text-muted">
                            Menit
                        </small>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Passing Score
                        </label>

                        <input
                            type="number"
                            name="passing_score"
                            value="{{ old(
                                'passing_score',
                                70
                            ) }}"
                            min="0"
                            max="100"
                            class="form-control"
                            required
                        >

                    </div>


                    <div class="col-md-4 mb-3">

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
                                @selected(
                                    old('status') === 'draft'
                                )
                            >
                                Draft
                            </option>

                            <option
                                value="active"
                                @selected(
                                    old('status') === 'active'
                                )
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                @selected(
                                    old('status') === 'inactive'
                                )
                            >
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Mulai
                        </label>

                        <input
                            type="datetime-local"
                            name="start_at"
                            value="{{ old('start_at') }}"
                            class="form-control"
                        >

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Selesai
                        </label>

                        <input
                            type="datetime-local"
                            name="end_at"
                            value="{{ old('end_at') }}"
                            class="form-control"
                        >

                    </div>

                </div>

                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-dark"
                    >
                        Buat Assessment
                    </button>

                    <a
                        href="{{ route(
                            'owner.assessments.index'
                        ) }}"
                        class="btn btn-outline-secondary"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection