@extends('dashboard')

@section('content')

<h2 class="mb-4">User Management</h2>

<div class="mb-3 d-flex justify-content-between">
    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    <a href="{{ route('users.sync-from-device') }}" class="btn btn-secondary">Sync from Device</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                    <span class="badge bg-info text-dark">{{ $role->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection