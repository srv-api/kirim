@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Role Management</h2>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
            Tambah Role
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($roles as $role)

                        <tr>
                            <td>
                                <strong>{{ $role->name }}</strong>
                            </td>

                            <td>
                                @forelse($role->permissions as $permission)
                                    <span class="badge bg-success me-1">
                                        {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-muted">
                                        Tidak ada permission
                                    </span>
                                @endforelse
                            </td>

                            <td>

                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.roles.destroy', $role->id) }}"
                                      method="POST"
                                      style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus role?')">
                                        Delete
                                    </button>

                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Belum ada role.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection