@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Tambah Post</h2>
            <p class="text-muted">
                Buat artikel baru
            </p>
        </div>

        <a href="{{ route('admin.posts.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form method="POST"
          action="{{ route('admin.posts.store') }}">

        @csrf

        <div class="row">

            {{-- MAIN CONTENT --}}
            <div class="col-md-8">

                <div class="card mb-4">

                    <div class="card-body">

                        <div class="mb-3">

                            <label class="form-label">
                                Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Excerpt
                            </label>

                            <textarea
                                name="excerpt"
                                rows="4"
                                class="form-control"
                            >{{ old('excerpt') }}</textarea>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Content
                            </label>

                            <textarea
                                name="content"
                                rows="15"
                                class="form-control"
                                required
                            >{{ old('content') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            {{-- SIDEBAR --}}
            <div class="col-md-4">

                <div class="card mb-4">

                    <div class="card-header">
                        Publish
                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select">

                                <option value="draft">
                                    Draft
                                </option>

                                <option value="published">
                                    Published
                                </option>

                                <option value="archived">
                                    Archived
                                </option>

                            </select>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Published At
                            </label>

                            <input
                                type="datetime-local"
                                name="published_at"
                                class="form-control"
                            >

                        </div>

                    </div>

                </div>


                <div class="card mb-4">

                    <div class="card-header">
                        Category
                    </div>

                    <div class="card-body">

                        <select name="category_id"
                                class="form-select">

                            <option value="">
                                -- Pilih Category --
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <div class="card mb-4">

                    <div class="card-header">
                        Tags
                    </div>

                    <div class="card-body">

                        <input
                            type="text"
                            name="tags"
                            class="form-control"
                            placeholder="Laravel, PHP, Web"
                            value="{{ old('tags') }}"
                        >

                        <small class="text-muted">
                            Pisahkan dengan koma.
                        </small>

                    </div>

                </div>


                <div class="card mb-4">

                    <div class="card-header">
                        Featured Image
                    </div>

                    <div class="card-body">

                        <input
                            type="text"
                            name="featured_image"
                            class="form-control"
                            placeholder="URL gambar"
                            value="{{ old('featured_image') }}"
                        >

                    </div>

                </div>


                <button class="btn btn-primary w-100">
                    Simpan Post
                </button>

            </div>

        </div>

    </form>

</div>

@endsection