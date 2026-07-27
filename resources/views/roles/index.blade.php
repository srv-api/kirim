@extends('dashboard')

@section('content')

<h2>Role Management</h2>
<a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Tambah Role</a>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
<th>Role</th>
<th>Permissions</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($roles as $role)
<tr>
<td>{{ $role->name }}</td>
<td>
@foreach($role->permissions as $permission)
<span class="badge bg-success">{{ $permission->name }}</span>
@endforeach
</td>
<td>
<a href="{{ route('roles.edit',$role->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('roles.destroy',$role->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus role?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>

@endsection