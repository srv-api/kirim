@extends('dashboard')

@section('content')
<h1>Departments</h1>
<a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Tambah Department</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $dept)
        <tr>
            <td>{{ $dept->name }}</td>
            <td>{{ $dept->description }}</td>
            <td>
                <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection