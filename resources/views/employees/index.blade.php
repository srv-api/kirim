@extends('dashboard')

@section('content')

<h2 class="mb-4">Employee Management</h2>

<div class="mb-3 d-flex justify-content-between">
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Employee</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $key => $emp)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->position }}</td>
            <td>{{ $emp->phone }}</td>
            <td>
                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
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