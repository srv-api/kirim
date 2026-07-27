@extends('dashboard')

@section('content')

<h1>Edit Role</h1>

<form method="POST" action="{{ route('roles.update',$role->id) }}">

@csrf
@method('PUT')

<div class="mb-3">
<label>Role Name</label>
<input type="text" name="name" value="{{ $role->name }}" class="form-control">
</div>

<h3>Permissions</h3>

@foreach($permissions as $permission)

<div class="form-check">

<input
type="checkbox"
name="permissions[]"
value="{{ $permission->name }}"
class="form-check-input"

{{ $role->hasPermissionTo($permission->name) ? 'checked':'' }}

>

<label class="form-check-label">
{{ $permission->name }}
</label>

</div>

@endforeach

<br>

<button class="btn btn-primary">Update</button>

</form>

@endsection