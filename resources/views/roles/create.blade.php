<h1>Create Role</h1>

<form method="POST" action="{{ route('roles.store') }}">

@csrf

<input type="text" name="name" placeholder="Role Name">

<h3>Permissions</h3>

@foreach($permissions as $permission)

<label>

<input type="checkbox" name="permissions[]" value="{{ $permission->name }}">

{{ $permission->name }}

</label>

<br>

@endforeach

<button type="submit">Save</button>

</form>