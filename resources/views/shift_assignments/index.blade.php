@extends('dashboard')

@section('content')

<h3>
Jadwal Dinas
({{ $start->format('d M Y') }} - {{ $end->format('d M Y') }})
</h3>

<style>

.roster-table{
    table-layout:auto;
    font-size:11px;
}

.roster-table th,
.roster-table td{
    padding:2px !important;
    vertical-align:middle;
}

.roster-table th{
    white-space:nowrap;
}

.roster-table td{
    text-align:center;
}

.shift-select{
    width:100%;
    border:none;
    background:transparent;
    outline:none;
    text-align:center;
    font-size:11px;
    padding:0;
    appearance:none;
    -webkit-appearance:none;
    -moz-appearance:none;
}

</style>


{{-- FORM CREATE --}}

<form action="{{ route('shift-assignments.store') }}" method="POST" class="mb-4">
@csrf

<div class="row">

<div class="col-md-4">
<label>Employee</label>

<select name="employee_id" class="form-control" required>

@foreach($employees as $emp)

<option value="{{ $emp->id }}">
{{ $emp->name }}
</option>

@endforeach

</select>

</div>


<div class="col-md-4">

<label>Shift</label>

<select name="shift_template_id" class="form-control" required>

@foreach($shifts as $shift)

<option value="{{ $shift->id }}">

{{ $shift->name }}
({{ $shift->start_time }} - {{ $shift->end_time }})

</option>

@endforeach

</select>

</div>


<div class="col-md-3">

<label>Tanggal</label>

<input type="date" name="date" class="form-control" required>

</div>


<div class="col-md-1 d-flex align-items-end">

<button class="btn btn-success w-100">
Save
</button>

</div>

</div>

</form>



<div class="table-responsive">

<table class="table table-bordered roster-table">

<thead class="table-dark">

<tr>

<th style="min-width:160px">Nama</th>

@foreach($dates as $date)

<th>

{{ \Carbon\Carbon::parse($date)->format('d') }}

</th>

@endforeach

</tr>

</thead>


<tbody>

@foreach($employees as $emp)

<tr>

<td class="text-start">

{{ $emp->name }}

</td>


@foreach($dates as $date)

@php

$shift = $assignments
->where('employee_id',$emp->id)
->where('date',$date)
->first();

@endphp


<td>

<select
class="shift-select"
data-employee="{{ $emp->id }}"
data-date="{{ $date }}"
>

<option value="">-</option>

@foreach($shifts as $s)

<option value="{{ $s->id }}"
{{ $shift && $shift->shift_template_id == $s->id ? 'selected' : '' }}>

{{ $s->name }}

</option>

@endforeach

</select>

</td>

@endforeach


</tr>

@endforeach

</tbody>

</table>

</div>



<script>

document.querySelectorAll('.shift-select').forEach(select => {

select.addEventListener('change', function(){

let employee = this.dataset.employee
let date = this.dataset.date
let shift = this.value

fetch("{{ route('shift-assignments.store') }}",{

method:"POST",

headers:{
'Content-Type':'application/json',
'X-CSRF-TOKEN':'{{ csrf_token() }}'
},

body:JSON.stringify({

employee_id:employee,
shift_template_id:shift,
date:date

})

})

.then(res=>res.json())
.then(data=>{

console.log('saved')

})

})

})

</script>

@endsection