@extends('dashboard')

@section('content')
<h1>Edit Department</h1>

<form method="POST" action="{{ route('departments.update', $department->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $department->description }}</textarea>
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection