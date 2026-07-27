@extends('layouts.app')

@section('title','Cek Resi')

@section('content')

<section class="py-5 text-center text-white" style="background: linear-gradient(135deg,#000,#1a1a1a);">
    <div class="container">

        <span class="badge bg-light text-dark px-3 py-2 mb-3">
            🚚 Tracking Pengiriman
        </span>

        <h1 class="display-4 fw-bold mb-3">
            Cek Status Pengiriman
        </h1>

        <p class="lead text-white-50 mb-5">
            Masukkan nomor resi untuk melihat status pengiriman secara real-time.
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <form action="{{ route('tracking.search') }}" method="POST">
                    @csrf

                    <div class="input-group input-group-lg shadow">

                        <input
                            type="text"
                            class="form-control border-0"
                            name="resi"
                            placeholder="Contoh : JP1234567890"
                            required>

                        <button class="btn btn-warning px-4">
                            🔍 Cek Resi
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
</section>

<div class="container py-5">

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center p-4">

                    <div class="display-5 mb-3">
                        📍
                    </div>

                    <h4 class="fw-bold">
                        Tracking Real-Time
                    </h4>

                    <p class="text-muted">
                        Pantau posisi paket secara langsung dengan update terbaru.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center p-4">

                    <div class="display-5 mb-3">
                        ⚡
                    </div>

                    <h4 class="fw-bold">
                        Proses Cepat
                    </h4>

                    <p class="text-muted">
                        Hasil pencarian muncul hanya dalam hitungan detik.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center p-4">

                    <div class="display-5 mb-3">
                        🔒
                    </div>

                    <h4 class="fw-bold">
                        Aman
                    </h4>

                    <p class="text-muted">
                        Data pengiriman diproses secara aman dan terenkripsi.
                    </p>

                </div>
            </div>
        </div>

    </div>

</div>

@if(session('tracking'))

<div class="container pb-5">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Hasil Tracking
            </h5>
        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">
                    <strong>Nomor Resi</strong><br>
                    {{ session('tracking.resi') }}
                </div>

                <div class="col-md-6">
                    <strong>Status</strong><br>
                    <span class="badge bg-success">
                        {{ session('tracking.status') }}
                    </span>
                </div>

            </div>

            <hr>

            <ul class="list-group list-group-flush">

                @foreach(session('tracking.history') as $item)

                <li class="list-group-item">

                    <div class="fw-bold">
                        {{ $item['date'] }}
                    </div>

                    <div class="text-muted">
                        {{ $item['desc'] }}
                    </div>

                </li>

                @endforeach

            </ul>

        </div>

    </div>

</div>

@endif

@endsection