@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Edit Post</h2>
            <p class="text-muted mb-0">
                Edit artikel blog
            </p>
        </div>

        <a href="{{ route('admin.posts.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>


    {{-- VALIDATION ERROR --}}
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
          action="{{ route('admin.posts.update', $post) }}">

        @csrf
        @method('PUT')

        <div class="row">

            {{-- =========================
                 MAIN CONTENT
            ========================== --}}
            <div class="col-md-8">

                <div class="card mb-4">

                    <div class="card-header">
                        Artikel
                    </div>

                    <div class="card-body">

                        {{-- TITLE --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title', $post->title) }}"
                                required
                            >

                        </div>


                        {{-- SLUG --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Slug
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $post->slug }}"
                                disabled
                            >

                            <small class="text-muted">
                                Slug akan dibuat otomatis dari title.
                            </small>

                        </div>


                        {{-- EXCERPT --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Excerpt
                            </label>

                            <textarea
                                name="excerpt"
                                rows="4"
                                class="form-control"
                            >{{ old('excerpt', $post->excerpt) }}</textarea>

                        </div>


                        {{-- CONTENT --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Content
                            </label>

                            <textarea
                                name="content"
                                rows="18"
                                class="form-control"
                                required
                            >{{ old('content', $post->content) }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================
                 SIDEBAR
            ========================== --}}
            <div class="col-md-4">

                {{-- STATUS --}}
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

                                <option value="draft"
                                    {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="published"
                                    {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>
                                    Published
                                </option>

                                <option value="archived"
                                    {{ old('status', $post->status) === 'archived' ? 'selected' : '' }}>
                                    Archived
                                </option>

                            </select>

                        </div>


                        {{-- PUBLISHED AT --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Published At
                            </label>

                            <input
                                type="datetime-local"
                                name="published_at"
                                class="form-control"
                                value="{{ old(
                                    'published_at',
                                    $post->published_at
                                        ? $post->published_at->format('Y-m-d\TH:i')
                                        : ''
                                ) }}"
                            >

                        </div>

                    </div>

                </div>


                {{-- CATEGORY --}}
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
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                {{-- TAGS --}}
                <div class="card mb-4">

                    <div class="card-header">
                        Tags
                    </div>

                    <div class="card-body">

                        @php

                            $tags = $post->tags ?? [];

                            if (is_string($tags)) {
                                $tags = json_decode($tags, true) ?? [];
                            }

                        @endphp

                        <input
                            type="text"
                            name="tags"
                            class="form-control"
                            value="{{ old('tags', implode(', ', $tags)) }}"
                            placeholder="Laravel, PHP, Web"
                        >

                        <small class="text-muted">
                            Pisahkan tag dengan koma.
                        </small>

                    </div>

                </div>


                {{-- FEATURED IMAGE --}}
                <div class="card mb-4">

                    <div class="card-header">
                        Featured Image
                    </div>

                    <div class="card-body">

                        <input
                            type="text"
                            name="featured_image"
                            class="form-control"
                            value="{{ old('featured_image', $post->featured_image) }}"
                            placeholder="URL gambar"
                        >

                        @if($post->featured_image)

                            <div class="mt-3">

                                <img
                                    src="{{ $post->featured_image }}"
                                    class="img-fluid rounded"
                                    alt="{{ $post->title }}"
                                >

                            </div>

                        @endif

                    </div>

                </div>


                {{-- SUBMIT --}}
                <button
                    type="submit"
                    class="btn btn-primary w-100"
                >
                    Update Post
                </button>

            </div>

        </div>

    </form>

</div>

@endsection