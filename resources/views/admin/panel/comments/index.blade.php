@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Comments</h2>
            <p class="text-muted mb-0">
                Kelola komentar blog
            </p>
        </div>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($comments as $comment)

                        <tr>

                            <td>
                                {{ $comments->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $comment->user->name ?? 'User deleted' }}
                            </td>

                            <td>
                                {{ $comment->post->title ?? 'Post deleted' }}
                            </td>

                            <td>
                                {{ \Illuminate\Support\Str::limit($comment->comment, 80) }}
                            </td>

                            <td>

                                @if($comment->status === 'approved')

                                    <span class="badge bg-success">
                                        Approved
                                    </span>

                                @elseif($comment->status === 'pending')

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Rejected
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $comment->created_at->format('d M Y H:i') }}
                            </td>

                            <td>

                                <a href="{{ route('admin.comments.edit', $comment) }}"
                                   class="btn btn-warning btn-sm">
                                    Moderasi
                                </a>

                                <form
                                    action="{{ route('admin.comments.destroy', $comment) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus komentar?')"
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

                                Belum ada komentar.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $comments->links() }}
            </div>

        </div>

    </div>

</div>

@endsection