@extends('dashboard')

@section('content')

<h3>Edit Work Shift</h3>

<div class="card">
<div class="card-body">

<form action="{{ route('shift_template.update',$shift->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Nama Shift</label>

<input type="text" name="name" class="form-control"
value="{{ $shift->name }}" required>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label>Jam Masuk</label>

<input type="time" name="start_time" class="form-control"
value="{{ $shift->start_time }}" required>

</div>

<div class="col-md-6 mb-3">
<label>Jam Pulang</label>

<input type="time" name="end_time" class="form-control"
value="{{ $shift->end_time }}" required>

</div>

</div>

<div class="mb-3">

<label>Toleransi Telat</label>

<input type="number" name="late_tolerance"
class="form-control"
value="{{ $shift->late_tolerance }}">

</div>

<div class="mb-3">

<label>Status</label>
<br>

<input type="checkbox" name="is_active"
value="1"
{{ $shift->is_active ? 'checked' : '' }}>

Aktif

</div>

<button class="btn btn-primary">
Update
</button>

<a href="{{ route('shift-template.index') }}" 
class="btn btn-secondary">
Kembali
</a>

</form>

</div>
</div>

@endsection