@extends('dashboard')

@section('content')

<h3>Edit Jadwal Dinas</h3>

<form action="{{ route('shift-assignments.update',$assignment->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Employee</label>

<select name="employee_id" class="form-control">

@foreach($employees as $employee)

<option value="{{ $employee->id }}"
{{ $assignment->employee_id == $employee->id ? 'selected' : '' }}>

{{ $employee->name }}

</option>

@endforeach

</select>

</div>


<div class="mb-3">

<label>Shift</label>

<select name="shift_template_id" class="form-control">

@foreach($shifts as $shift)

<option value="{{ $shift->id }}"
{{ $assignment->shift_template_id == $shift->id ? 'selected' : '' }}>

{{ $shift->name }}

</option>

@endforeach

</select>

</div>


<div class="mb-3">

<label>Tanggal</label>

<input type="date"
name="date"
value="{{ $assignment->date }}"
class="form-control">

</div>


<button class="btn btn-success">
Update
</button>

</form>

@endsection