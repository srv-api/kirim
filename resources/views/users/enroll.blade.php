@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-fingerprint"></i> 
                        Enroll Fingerprint: {{ $user->name }}
                    </h5>
                </div>

                <div class="card-body">
                    <!-- Device Status -->
                    <div class="alert {{ $deviceStatus['connected'] ? 'alert-success' : 'alert-danger' }}">
                        <i class="fas {{ $deviceStatus['connected'] ? 'fa-check-circle' : 'fa-exclamation-triangle' }}"></i>
                        Status Mesin: {{ $deviceStatus['connected'] ? 'Terhubung' : 'Tidak Terhubung' }}
                        @if(!$deviceStatus['connected'] && isset($deviceStatus['error']))
                            <br><small>{{ $deviceStatus['error'] }}</small>
                        @endif
                    </div>

                    <!-- User Info -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>Informasi User:</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="150">UID</td>
                                    <td><strong>{{ $user->uid }}</strong></td>
                                </tr>
                                <tr>
                                    <td>User ID</td>
                                    <td><strong>{{ $user->user_id }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        @switch($user->role)
                                            @case(0) User Biasa @break
                                            @case(1) Supervisor @break
                                            @case(2) Admin @break
                                            @default Role {{ $user->role }}
                                        @endswitch
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Registered Fingers -->
                    @if(!empty($registeredFingers))
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> Jari yang sudah terdaftar:</h6>
                        <ul class="mb-0">
                            @foreach($registeredFingers as $fingerId)
                                <li>
                                    Jari {{ $fingerId }} ({{ $fingerIds[$fingerId] ?? 'Unknown' }})
                                    <button class="btn btn-sm btn-danger ml-2 delete-finger" 
                                            data-finger="{{ $fingerId }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Instructions -->
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle"></i> Petunjuk Enroll:</h6>
                        <ol class="mb-0">
                            <li>Pastikan mesin fingerprint dalam keadaan menyala dan terhubung</li>
                            <li>Pilih jari yang akan didaftarkan</li>
                            <li>Klik tombol "Mulai Enroll"</li>
                            <li>Tempelkan jari Anda pada mesin fingerprint sebanyak 3 kali</li>
                            <li>Tunggu hingga muncul pesan "Enroll Berhasil"</li>
                            <li>Jika gagal, coba lagi dengan jari yang berbeda</li>
                        </ol>
                    </div>

                    <!-- Enroll Form -->
                    <div class="form-group">
                        <label for="finger_id">Pilih Jari:</label>
                        <select class="form-control" id="finger_id">
                            @foreach($fingerIds as $id => $name)
                                <option value="{{ $id }}" 
                                    {{ in_array($id, $registeredFingers) ? 'disabled' : '' }}>
                                    Jari {{ $id }} - {{ $name }}
                                    {{ in_array($id, $registeredFingers) ? '(Sudah terdaftar)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-lg" id="startEnroll" 
                                {{ !$deviceStatus['connected'] ? 'disabled' : '' }}>
                            <i class="fas fa-play"></i> Mulai Enroll
                        </button>
                        
                        <a href="{{ route('users.confirm-fingerprint', $user) }}" 
                           class="btn btn-success btn-lg"
                           onclick="return confirm('Konfirmasi bahwa fingerprint sudah terdaftar?')">
                            <i class="fas fa-check"></i> Konfirmasi Selesai
                        </a>
                        
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <!-- Enroll Status -->
                    <div id="enrollStatus" class="mt-4" style="display: none;">
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                <h6 class="mb-0"><i class="fas fa-spinner fa-pulse"></i> Status Enroll</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="spinner-border text-primary mb-3" role="status"></div>
                                    <p id="statusMessage" class="lead">Menunggu proses enroll...</p>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                             style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Result -->
                    <div id="enrollResult" class="mt-4" style="display: none;">
                        <div class="alert alert-success">
                            <h5><i class="fas fa-check-circle"></i> Enroll Berhasil!</h5>
                            <p id="resultMessage"></p>
                        </div>
                    </div>

                    <!-- Error -->
                    <div id="enrollError" class="mt-4" style="display: none;">
                        <div class="alert alert-danger">
                            <h5><i class="fas fa-times-circle"></i> Enroll Gagal!</h5>
                            <p id="errorMessage"></p>
                            <button class="btn btn-warning" onclick="location.reload()">
                                <i class="fas fa-redo"></i> Coba Lagi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Fingerprint Modal -->
<div class="modal fade" id="deleteFingerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Fingerprint</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus fingerprint ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    let checkInterval = null;
    let progressInterval = null;
    let progress = 0;
    let currentFingerId = null;
    
    // Start Enroll
    $('#startEnroll').click(function() {
        const fingerId = $('#finger_id').val();
        const button = $(this);
        
        if ($('#finger_id option:selected').prop('disabled')) {
            alert('Jari ini sudah terdaftar. Pilih jari lain atau hapus yang lama.');
            return;
        }
        
        currentFingerId = fingerId;
        
        // Show status
        $('#enrollStatus').show();
        $('#enrollResult').hide();
        $('#enrollError').hide();
        
        // Disable button
        button.prop('disabled', true).html('<i class="fas fa-spinner fa-pulse"></i> Memproses...');
        
        // Start progress animation
        progress = 0;
        progressInterval = setInterval(function() {
            progress = (progress + 1) % 101;
            $('.progress-bar').css('width', progress + '%');
        }, 100);
        
        // Send enroll request
        $.ajax({
            url: '{{ route("users.start-enroll", $user) }}',
            method: 'POST',
            data: {
                finger_id: fingerId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#statusMessage').text(response.message || 'Proses enroll dimulai...');
                
                // Start checking status
                if (checkInterval) clearInterval(checkInterval);
                checkInterval = setInterval(checkStatus, 3000);
            },
            error: function(xhr) {
                clearInterval(progressInterval);
                button.prop('disabled', false).html('<i class="fas fa-play"></i> Mulai Enroll');
                
                let message = 'Gagal memulai proses enroll';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                
                $('#enrollStatus').hide();
                $('#enrollError').show();
                $('#errorMessage').text(message);
            }
        });
    });
    
    // Check status function
    function checkStatus() {
        $.ajax({
            url: '{{ route("users.check-enroll-status", $user) }}',
            method: 'GET',
            success: function(response) {
                if (response.completed) {
                    clearInterval(checkInterval);
                    clearInterval(progressInterval);
                    
                    $('#enrollStatus').hide();
                    $('#enrollResult').show();
                    $('#resultMessage').text(response.message);
                    
                    // Reset button
                    $('#startEnroll').prop('disabled', false)
                        .html('<i class="fas fa-play"></i> Mulai Enroll');
                    
                    // Disable the enrolled finger
                    if (currentFingerId) {
                        $('#finger_id option[value="' + currentFingerId + '"]')
                            .prop('disabled', true)
                            .text($('#finger_id option[value="' + currentFingerId + '"]').text() + ' (Sudah terdaftar)');
                    }
                    
                    // Reload after 3 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else {
                    $('#statusMessage').text(response.message || 'Menunggu proses enroll...');
                }
            },
            error: function() {
                $('#statusMessage').text('Gagal cek status, mencoba lagi...');
            }
        });
    }
    
    // Delete fingerprint
    let deleteFingerId = null;
    
    $('.delete-finger').click(function() {
        deleteFingerId = $(this).data('finger');
        $('#deleteFingerModal').modal('show');
    });
    
    $('#confirmDelete').click(function() {
        if (!deleteFingerId) return;
        
        $.ajax({
            url: '{{ route("users.delete-fingerprint", $user) }}',
            method: 'DELETE',
            data: {
                finger_id: deleteFingerId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#deleteFingerModal').modal('hide');
                if (response.success) {
                    location.reload();
                } else {
                    alert('Gagal menghapus: ' + response.message);
                }
            },
            error: function() {
                $('#deleteFingerModal').modal('hide');
                alert('Gagal menghapus fingerprint');
            }
        });
    });
    
    // Clean up on page unload
    $(window).on('beforeunload', function() {
        if (checkInterval) clearInterval(checkInterval);
        if (progressInterval) clearInterval(progressInterval);
    });
});
</script>
@endpush
@endsection