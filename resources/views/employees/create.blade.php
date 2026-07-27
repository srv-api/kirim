@extends('dashboard')

@section('content')
<h2>{{ isset($employee) ? 'Edit' : 'Tambah' }} Employee</h2>

<form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
    @csrf
    @if(isset($employee))
        @method('PUT')
    @endif

    <div class="row">
        <!-- Nama -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required
                    value="{{ isset($employee) ? $employee->name : old('name') }}">
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                    value="{{ isset($employee) ? $employee->email : old('email') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Job Level -->
        <div class="col-md-6">
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
        </div>

        <!-- Departemen -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select name="department_id" class="form-control" required>
                    <option value="">-- Pilih Departemen --</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}"
                            {{ isset($employee) && $employee->department_id == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control"
            value="{{ isset($employee) ? $employee->phone : old('phone') }}">
    </div>

    <!-- Relasi User -->
    <div class="mb-3">
        <label class="form-label">Relasi User</label>
        <select name="user_id" class="form-control">
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}"
                    {{ isset($employee) && $employee->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<!-- Tabs Section -->
<div class="mt-4">
    <ul class="nav nav-tabs" id="employeeTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                type="button" role="tab" aria-controls="details" aria-selected="true">
                Detail Employee
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history"
                type="button" role="tab" aria-controls="history" aria-selected="false">
                Riwayat
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings"
                type="button" role="tab" aria-controls="settings" aria-selected="false">
                Pengaturan
            </button>
        </li>
    </ul>
    <div class="tab-content p-3 border border-top-0" id="employeeTabContent">
<!-- Detail Employee Tab -->
<div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
    <form action="{{ isset($employee) ? route('employees.details.update', $employee->id) : '#' }}" method="POST">
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif

        <div class="row">
            <!-- NIK -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control"
                        value="{{ isset($employee) ? $employee->nik : old('nik') }}">
                </div>
            </div>

            <!-- NPWP -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">NPWP</label>
                    <input type="text" name="npwp" class="form-control"
                        value="{{ isset($employee) ? $employee->npwp : old('npwp') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Employee Type -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Employee Type</label>
                    <select name="employee_type" class="form-control">
                        <option value="">-- Pilih Employee Type --</option>
                        <option value="Tetap" {{ isset($employee) && $employee->employee_type == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="Kontrak" {{ isset($employee) && $employee->employee_type == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        <option value="Magang" {{ isset($employee) && $employee->employee_type == 'Magang' ? 'selected' : '' }}>Magang</option>
                        <option value="Freelance" {{ isset($employee) && $employee->employee_type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>
            </div>

            <!-- No Badge ID -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">No Badge ID</label>
                    <input type="text" name="badge_id" class="form-control"
                        value="{{ isset($employee) ? $employee->badge_id : old('badge_id') }}">
                </div>
            </div>
        </div>

        <!-- Tambahan Field Lain (opsional) -->
        <div class="row">
            <!-- Alamat -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control"
                        value="{{ isset($employee) ? $employee->address : old('address') }}">
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control"
                        value="{{ isset($employee) ? $employee->birth_date : old('birth_date') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Jenis Kelamin -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ isset($employee) && $employee->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ isset($employee) && $employee->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- Status Pernikahan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Status Pernikahan</label>
                    <select name="marital_status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="Single" {{ isset($employee) && $employee->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ isset($employee) && $employee->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan Detail</button>
    </form>
</div>
        <!-- Riwayat Tab -->
        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
            <p>Riwayat pekerjaan atau aktivitas employee.</p>
        </div>

        <!-- Pengaturan Tab -->
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <p>Pengaturan terkait employee atau akses user.</p>
        </div>
    </div>
</div>
@endsection