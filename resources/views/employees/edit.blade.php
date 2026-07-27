@extends('dashboard')

@section('content')
<h2>Edit Employee</h2>
<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" value="{{ $employee->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ $employee->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Job Level</label>
        <select name="job_level_id" class="form-control" required>
            <option value="">-- Pilih Job Level --</option>
            @foreach($jobLevels as $level)
                <option value="{{ $level->id }}" 
                    {{ isset($employee) && $employee->job_level_id == $level->id ? 'selected' : '' }}>
                    {{ $level->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Relasi User</label>
        <select name="user_id" class="form-control">
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Departemen</label>
        <select name="department_id" class="form-control" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}" {{ $employee->department_id == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection