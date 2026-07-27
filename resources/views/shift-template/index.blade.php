@extends('dashboard')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Work Shift</h3>
    <a href="{{ route('shift-template.create') }}" class="btn btn-primary">
        Tambah Shift
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
<div class="card-body table-responsive">

<table class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Nama Shift</th>
<th>Jam Masuk</th>
<th>Jam Pulang</th>
<th>Toleransi Telat</th>
<th>Hari Kerja</th>
<th>Status</th>
<th width="150">Action</th>
</tr>
</thead>

<tbody>
@forelse($shifts as $shift)

<tr>
<td>{{ $loop->iteration }}</td>

<td>{{ $shift->name }}</td>

<td>{{ $shift->start_time }}</td>

<td>{{ $shift->end_time }}</td>

<td>{{ $shift->late_tolerance }} menit</td>

<td>
@if($shift->work_days)
{{ implode(', ', $shift->work_days) }}
@endif
</td>

<td>
@if($shift->is_active)
<span class="badge bg-success">Aktif</span>
@else
<span class="badge bg-danger">Nonaktif</span>
@endif
</td>

<td>

<a href="{{ route('shift-template.edit',$shift->id) }}" 
class="btn btn-sm btn-warning">
Edit
</a>

<form action="{{ route('shift-template.destroy',$shift->id) }}" 
method="POST" style="display:inline">
@csrf
@method('DELETE')

<button onclick="return confirm('Hapus shift ini?')" 
class="btn btn-sm btn-danger">
Delete
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="8" class="text-center">
Belum ada data shift
</td>
</tr>

@endforelse
</tbody>

</table>

</div>
</div>

@endsection