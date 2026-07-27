@extends('dashboard')

@section('content')
<h2>Dashboard Absensi</h2>

<div class="row mt-4">
    <!-- Card Total Attendance -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Attendance</h5>
                <p class="card-text fs-3">{{ $totalAttendance }}</p>
            </div>
        </div>
    </div>

    <!-- Card Today Attendance -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Attendance Hari Ini</h5>
                <p class="card-text fs-3">{{ $todayAttendance }}</p>
            </div>
        </div>
    </div>

    <!-- Card Device Connection -->
    <div class="col-md-4">
        <div class="card text-white {{ $isConnected ? 'bg-success' : 'bg-danger' }} mb-3">
            <div class="card-body">
                <h5 class="card-title">Koneksi Mesin</h5>
                <p class="card-text fs-5">{{ $isConnected ? 'Terhubung' : 'Tidak Terhubung' }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Tombol Aksi (hanya muncul jika user punya permission) -->
<div class="mb-3">
    @can('zkteco.sync')
    <form action="{{ route('zkteco.sync-attendance') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success">Sync Attendance</button>
    </form>
    @endcan

    @can('zkteco.test')
    <a href="{{ route('zkteco.test-connection') }}" class="btn btn-info">Test Connection</a>
    @endcan

    @can('zkteco.add_user')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
        Add User
    </button>
    @endcan
</div>

<!-- Device Info -->
@if($deviceInfo)
<div class="card mt-3">
    <div class="card-header">Informasi Mesin</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>Device Name:</strong> {{ $deviceInfo['DeviceName'] ?? '-' }}</li>
            <li class="list-group-item"><strong>Serial Number:</strong> {{ $deviceInfo['SerialNumber'] ?? '-' }}</li>
            <li class="list-group-item"><strong>Firmware Version:</strong> {{ $deviceInfo['FirmwareVersion'] ?? '-' }}</li>
            <li class="list-group-item"><strong>MAC Address:</strong> {{ $deviceInfo['MacAddress'] ?? '-' }}</li>
            <li class="list-group-item"><strong>IP Address:</strong> {{ $deviceInfo['IP'] ?? '-' }}</li>
        </ul>
    </div>
</div>
@endif

<!-- Table Attendance Terbaru -->
<div class="card mt-4">
    <div class="card-header">Data Absensi Harian</div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->user_id }}</td>
                    <td>{{ $attendance->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->masuk)->format('H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->pulang)->format('H:i:s') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data attendance</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('zkteco.add-user') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah User Mesin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">UID</label>
                    <input type="number" name="uid" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">UserID</label>
                    <input type="text" name="userid" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password (Opsional)</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role (Opsional)</label>
                    <input type="number" name="role" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah User</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </form>
  </div>
</div>

@endsection