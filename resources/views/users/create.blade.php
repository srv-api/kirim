@extends('dashboard')

@section('content')

<h2 class="mb-4">Tambah User Baru</h2>

<a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Kembali ke Users</a>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Roles</label>
        <div class="form-check">
            @foreach($roles as $role)
            <input type="checkbox" 
                   name="roles[]" 
                   value="{{ $role->name }}" 
                   class="form-check-input"
                   id="role-{{ $role->id }}"
                   {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
            <label class="form-check-label" for="role-{{ $role->id }}">
                {{ $role->name }}
            </label>
            <br>
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection