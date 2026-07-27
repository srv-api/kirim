@extends('dashboard')

@section('content')

<h4>Tambah Work Shift</h4>

<form action="{{ route('shift-template.store') }}" method="POST">
@csrf

<div class="mb-3">
<label>Nama Shift</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Jam Masuk</label>
<input type="time" name="start_time" class="form-control" required>
</div>

<div class="mb-3">
<label>Jam Pulang</label>
<input type="time" name="end_time" class="form-control" required>
</div>

<div class="mb-3">
<label>Toleransi Telat (Menit)</label>
<input type="number" name="late_tolerance" class="form-control">
</div>

<div class="mb-3">
<label>Hari Kerja</label><br>

<label><input type="checkbox" name="work_days[]" value="mon"> Senin</label>
<label><input type="checkbox" name="work_days[]" value="tue"> Selasa</label>
<label><input type="checkbox" name="work_days[]" value="wed"> Rabu</label>
<label><input type="checkbox" name="work_days[]" value="thu"> Kamis</label>
<label><input type="checkbox" name="work_days[]" value="fri"> Jumat</label>
<label><input type="checkbox" name="work_days[]" value="sat"> Sabtu</label>
<label><input type="checkbox" name="work_days[]" value="sun"> Minggu</label>

</div>

<button class="btn btn-primary">Simpan</button>

</form>

@endsection