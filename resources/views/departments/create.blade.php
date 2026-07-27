@extends('dashboard')

@section('content')
<h1>Tambah Department</h1>

<form method="POST" action="{{ route('departments.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection