@extends('dashboard')

@section('content')

<h3>Ajuan Time Off</h3>

<form action="{{ route('timeoff.store') }}" method="POST" class="mb-4">
@csrf

<div class="row">

<div class="col-md-3">
<label>Employee</label>
<select name="employee_id" class="form-control">

@foreach($employees as $emp)
<option value="{{ $emp->id }}">
{{ $emp->name }}
</option>
@endforeach

</select>
</div>

<div class="col-md-2">
<label>Type</label>
<select name="type" class="form-control">

<option value="paid">Paid Time Off</option>
<option value="unpaid">Unpaid Leave</option>
<option value="perdin">Perdin</option>
<option value="sick">Cuti Sakit</option>
<option value="married">Married Time Off</option>

</select>
</div>

<div class="col-md-2">
<label>Start</label>
<input type="date" name="start_date" class="form-control">
</div>

<div class="col-md-2">
<label>End</label>
<input type="date" name="end_date" class="form-control">
</div>

<div class="col-md-2">
<label>Reason</label>
<input type="text" name="reason" class="form-control">
</div>

<div class="col-md-1 d-flex align-items-end">
<button class="btn btn-success w-100">
Submit
</button>
</div>

</div>

</form>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>Employee</th>
<th>Type</th>
<th>Start</th>
<th>End</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($timeoffs as $to)

<tr>

<td>{{ $to->employee->name }}</td>

<td>{{ $to->type }}</td>

<td>{{ $to->start_date }}</td>

<td>{{ $to->end_date }}</td>

<td>{{ $to->status }}</td>

<td>

@if($to->status=='pending')

<form action="{{ route('timeoff.approve',$to->id) }}" method="POST" style="display:inline">
@csrf
<button class="btn btn-success btn-sm">Approve</button>
</form>

<form action="{{ route('timeoff.reject',$to->id) }}" method="POST" style="display:inline">
@csrf
<button class="btn btn-danger btn-sm">Reject</button>
</form>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection