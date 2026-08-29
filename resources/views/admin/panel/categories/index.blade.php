@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Categories</h2>
            <p class="text-muted mb-0">
                Kelola kategori artikel blog
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="btn btn-primary">
            + Tambah Category
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th width="60">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Posts</th>
                            <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>
                                {{ $categories->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <strong>
                                    {{ $category->name }}
                                </strong>
                            </td>

                            <td>
                                <code>
                                    {{ $category->slug }}
                                </code>
                            </td>

                            <td>
                                <span class="badge bg-info">
                                    {{ $category->posts_count }}
                                </span>
                            </td>

                            <td>

                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus category ini?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="text-center py-5 text-muted">
                                Belum ada category.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            {{ $categories->links() }}

        </div>

    </div>

</div>

@endsection