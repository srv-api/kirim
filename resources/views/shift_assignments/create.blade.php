@extends('dashboard')

@section('content')

<h3>Tambah Jadwal Dinas</h3>

<form action="{{ route('shift-assignments.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Employee</label>

<select name="employee_id" class="form-control">

@foreach($employees as $employee)

<option value="{{ $employee->id }}">
{{ $employee->name }}
</option>

@endforeach

</select>
</div>


<div class="mb-3">
<label>Shift</label>

<select name="shift_template_id" class="form-control">

@foreach($shifts as $shift)

<option value="{{ $shift->id }}">
{{ $shift->name }} 
({{ $shift->start_time }} - {{ $shift->end_time }})
</option>

@endforeach

</select>

</div>


<div class="mb-3">
<label>Tanggal</label>

<input type="date" name="date" class="form-control">
</div>


<button class="btn btn-success">
Simpan
</button>

</form>

@endsection