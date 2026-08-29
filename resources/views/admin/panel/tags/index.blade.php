@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Tags</h2>
            <p class="text-muted mb-0">
                Kelola tag artikel blog
            </p>
        </div>

        <a href="{{ route('admin.posts.index') }}"
           class="btn btn-primary">
            📝 Posts
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

        </div>

    @endif


    {{-- TAGS --}}
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>Daftar Tags</strong>

            <span class="badge bg-dark">
                {{ $tags->count() }} Tags
            </span>

        </div>


        <div class="card-body">

            @if($tags->count())

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>
                                <th width="60">#</th>
                                <th>Tag</th>
                                <th width="150">Jumlah Post</th>
                                <th width="120">Action</th>
                            </tr>

                        </thead>

                        <tbody>

                        @foreach($tags as $tag => $count)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <span class="badge bg-primary fs-6">
                                        #{{ $tag }}
                                    </span>

                                </td>

                                <td>

                                    <span class="badge bg-secondary">
                                        {{ $count }} Post
                                    </span>

                                </td>

                                <td>

                                    <form
    action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <input
                                            type="hidden"
                                            name="tag"
                                            value="{{ $tag }}"
                                        >

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tag ini akan dihapus dari semua artikel. Lanjutkan?')"
                                        >
                                            🗑 Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-center py-5">

                    <div style="font-size: 50px;">
                        🏷️
                    </div>

                    <h5 class="mt-3">
                        Belum ada tag
                    </h5>

                    <p class="text-muted">
                        Tag akan muncul otomatis setelah kamu menambahkan tag pada artikel.
                    </p>

                    <a href="{{ route('admin.posts.create') }}"
                       class="btn btn-primary">
                        Buat Post
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection