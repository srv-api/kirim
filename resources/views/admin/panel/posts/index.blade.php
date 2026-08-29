@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Posts</h2>
            <p class="text-muted mb-0">
                Kelola artikel blog
            </p>
        </div>

        <a href="{{ route('admin.posts.create') }}"
           class="btn btn-primary">
            + Tambah Post
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- SEARCH & FILTER --}}
    <div class="card mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.posts.index') }}">

                <div class="row g-2">

                    <div class="col-md-6">

                        <input
                            type="text"
                            name="q"
                            value="{{ request('q') }}"
                            class="form-control"
                            placeholder="Cari artikel..."
                        >

                    </div>

                    <div class="col-md-3">

                        <select name="status"
                                class="form-select">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="published"
                                {{ request('status') === 'published' ? 'selected' : '' }}>
                                Published
                            </option>

                            <option value="draft"
                                {{ request('status') === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="archived"
                                {{ request('status') === 'archived' ? 'selected' : '' }}>
                                Archived
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3">

                        <button class="btn btn-dark">
                            Search
                        </button>

                        <a href="{{ route('admin.posts.index') }}"
                           class="btn btn-outline-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th width="60">#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Published</th>
                            <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($posts as $post)

                        <tr>

                            <td>
                                {{ $posts->firstItem() + $loop->index }}
                            </td>

                            <td>

                                <strong>
                                    {{ $post->title }}
                                </strong>

                                <br>

                                <small class="text-muted">
                                    /{{ $post->slug }}
                                </small>

                            </td>

                            <td>

                                @if($post->category)
                                    <span class="badge bg-info">
                                        {{ $post->category->name }}
                                    </span>
                                @else
                                    <span class="text-muted">
                                        -
                                    </span>
                                @endif

                            </td>

                            <td>

                                @if($post->status === 'published')

                                    <span class="badge bg-success">
                                        Published
                                    </span>

                                @elseif($post->status === 'draft')

                                    <span class="badge bg-warning text-dark">
                                        Draft
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Archived
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ number_format($post->views) }}
                            </td>

                            <td>

                                @if($post->published_at)
                                    {{ $post->published_at->format('d M Y') }}
                                @else
                                    -
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('admin.posts.edit', $post) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.posts.destroy', $post) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus post ini?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5 text-muted">

                                Belum ada artikel.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $posts->links() }}

            </div>

        </div>

    </div>

</div>

@endsection