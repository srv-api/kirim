<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Kirim | Cek Resi</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #0b2b5c, #1a4b8c);
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
            padding: 12px 0;
        }
        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
        }
        .navbar-custom .nav-link {
            font-weight: 500;
            margin: 0 8px;
            border-radius: 30px;
            padding: 8px 18px;
            transition: 0.2s;
        }
        .navbar-custom .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: #fff !important;
        }
        .navbar-custom .nav-link.active {
            background: rgba(255,255,255,0.2);
        }

        .hero-track {
            background: linear-gradient(145deg, #0a1e3c, #0b2b5c);
            padding: 80px 0 70px;
            position: relative;
            overflow: hidden;
        }
        .hero-track .badge-light {
            background: rgba(255,255,255,0.12) !important;
            color: #ffd966 !important;
            backdrop-filter: blur(4px);
        }

        .search-input-group {
            border-radius: 60px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 12px 40px rgba(0,0,0,0.25);
            display: flex;
            align-items: center;
        }
        .search-input-group input {
            padding: 18px 24px;
            font-size: 1.1rem;
            border: none;
            outline: none;
            background: transparent;
            flex: 1;
        }
        .search-input-group .form-select {
            border: none;
            background: transparent;
            width: auto;
            min-width: 100px;
            padding: 16px 8px;
            font-weight: 500;
            color: #0f172a;
        }
        .btn-search {
            background: linear-gradient(135deg, #f9b81b, #f5a623);
            border: none;
            font-weight: 700;
            padding: 14px 40px;
            color: #1a2a4a;
            transition: 0.3s;
        }
        .btn-search:hover {
            transform: scale(1.02);
        }
        .btn-search:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .form-helper {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            margin-top: 16px;
        }

        .feature-card {
            border: none;
            border-radius: 24px;
            background: #ffffff;
            transition: 0.3s ease;
            box-shadow: 0 8px 24px rgba(0,0,0,0.04);
        }
        .feature-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 48px rgba(0,40,80,0.12);
        }
        .feature-card .icon-wrap {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #eef4ff, #dce6f5);
            border-radius: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 2.2rem;
            color: #1a4b8c;
        }

        .track-result {
            border-radius: 28px;
            overflow: hidden;
            border: none;
            background: #ffffff;
            box-shadow: 0 16px 48px rgba(0,0,0,0.06);
            animation: slideUp 0.5s ease;
            margin-top: 30px;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .track-result .card-header {
            background: #f8fafc;
            padding: 20px 28px;
            border-bottom: 1px solid #e2e8f0;
        }
        .track-result .card-body {
            padding: 28px;
        }

        .info-card {
            background: #f8fafc;
            border-radius: 16px;
            padding: 16px 20px;
            height: 100%;
        }
        .info-card .label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 600;
        }
        .info-card .value {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 4px;
        }
        .info-card .value .copy-btn {
            background: transparent;
            border: none;
            color: #94a3b8;
            padding: 4px 8px;
            border-radius: 8px;
            transition: 0.2s;
            cursor: pointer;
        }
        .info-card .value .copy-btn:hover {
            color: #3b82f6;
            background: rgba(59,130,246,0.1);
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .badge-status .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }
        .badge-status.in-transit {
            background: rgba(59,130,246,0.12);
            color: #2563eb;
        }
        .badge-status.in-transit .dot {
            background: #3b82f6;
            animation: pulse-dot 1.5s infinite;
        }
        .badge-status.delivered {
            background: rgba(34,197,94,0.12);
            color: #16a34a;
        }
        .badge-status.delivered .dot {
            background: #22c55e;
        }
        .badge-status.pending {
            background: rgba(234,179,8,0.12);
            color: #ca8a04;
        }
        .badge-status.pending .dot {
            background: #eab308;
            animation: pulse-dot 1.5s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 12px;
            margin: 16px 0 8px;
        }
        .info-grid .info-item {
            background: #f8fafc;
            padding: 10px 14px;
            border-radius: 12px;
            text-align: center;
        }
        .info-grid .info-item .info-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 500;
        }
        .info-grid .info-item .info-value {
            font-weight: 600;
            color: #0f172a;
            font-size: 0.9rem;
            margin-top: 2px;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 8px;
            bottom: 8px;
            width: 2px;
            background: linear-gradient(to bottom, #3b82f6, #94a3b8);
        }
        .timeline-item {
            position: relative;
            padding: 12px 0 12px 24px;
            border: none;
            background: transparent;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -22px;
            top: 18px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #3b82f6;
            border: 3px solid #fff;
            box-shadow: 0 0 0 3px #3b82f6;
        }
        .timeline-item:last-child::before {
            background: #22c55e;
            box-shadow: 0 0 0 3px #22c55e;
        }
        .timeline-item .time {
            font-weight: 600;
            color: #0f172a;
            font-size: 0.9rem;
        }
        .timeline-item .desc {
            color: #64748b;
            font-size: 0.95rem;
            margin-top: 2px;
            padding-left: 24px;
        }
        .badge-latest {
            display: inline-block;
            background: #22c55e;
            color: #fff;
            font-size: 0.7rem;
            padding: 2px 12px;
            border-radius: 50px;
            font-weight: 500;
            margin-top: 6px;
            margin-left: 24px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
        }
        .action-buttons .btn-action {
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #475569;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }
        .action-buttons .btn-action:hover {
            background: #f8fafc;
            transform: translateY(-2px);
        }
        .action-buttons .btn-action.success {
            background: #22c55e;
            border-color: #22c55e;
            color: #fff;
        }
        .action-buttons .btn-action.success:hover {
            background: #16a34a;
        }

        .alert-custom {
            border-radius: 16px;
            border: none;
        }
        .alert-custom.alert-danger {
            background: rgba(239,68,68,0.1);
            border-left: 4px solid #ef4444;
            color: #991b1b;
        }

        .footer-custom {
            background: #0b1a2e;
            color: rgba(255,255,255,0.7);
            padding: 28px 0;
            margin-top: 60px;
        }
        .footer-custom a {
            color: #ffd966;
            text-decoration: none;
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        .toast-custom {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
            border: none;
            min-width: 300px;
        }

        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0b2b5c, #1a4b8c);
            color: #fff;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            display: none;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
            z-index: 999;
            cursor: pointer;
        }
        .scroll-top.show {
            display: flex;
        }
        .scroll-top:hover {
            transform: translateY(-3px);
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @media (max-width: 768px) {
            .hero-track { padding: 60px 0; }
            .search-input-group { flex-wrap: wrap; border-radius: 30px; padding: 8px; }
            .search-input-group input { padding: 14px 18px; font-size: 1rem; width: 100%; }
            .search-input-group .form-select { min-width: 80px; padding: 12px 8px; font-size: 0.9rem; }
            .btn-search { padding: 12px 24px; font-size: 0.9rem; flex: 1; justify-content: center; }
            .track-result .card-header { padding: 16px 20px; flex-direction: column; align-items: flex-start; gap: 8px; }
            .track-result .card-body { padding: 20px; }
            .info-grid { grid-template-columns: repeat(2, 1fr); }
            .action-buttons .btn-action { flex: 1; justify-content: center; min-width: 80px; }
            .toast-container { top: 16px; right: 16px; left: 16px; }
            .toast-custom { min-width: auto; width: 100%; }
        }

        @media (max-width: 480px) {
            .hero-track h1 { font-size: 1.8rem; }
            .search-input-group input { font-size: 0.9rem; padding: 12px 14px; }
            .btn-search { padding: 10px 16px; font-size: 0.8rem; }
            .track-result .card-body { padding: 16px; }
            .info-grid { grid-template-columns: 1fr 1fr; gap: 6px; }
        }

        @media print {
            .navbar-custom, .footer-custom, .scroll-top,
            .action-buttons, .form-helper, .features-section,
            .btn-search, .copy-btn, .share-btn {
                display: none !important;
            }
            .hero-track { padding: 40px 0; background: #fff !important; }
            .hero-track h1 { color: #0f172a !important; }
            .track-result { box-shadow: none !important; border: 1px solid #e2e8f0 !important; }
        }
    </style>
</head>
<body>

    <!-- ======= NAVBAR ======= -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">
                <i class="fas fa-box me-2"></i>Kirim
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link text-white {{ request()->routeIs('about') ? 'active' : '' }}">
                            <i class="fas fa-info-circle me-1"></i> Blog
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ======= HERO ======= -->
    <section class="hero-track text-center text-white" id="hero">
        <div class="container">
            <span class="badge badge-light px-4 py-2 mb-4 d-inline-block pulse-animation">
                <i class="fas fa-truck me-2"></i> Tracking Pengiriman
            </span>
            <h1 class="display-4 fw-bold mb-3">Cek Status Pengiriman</h1>
            <p class="lead text-white-50 mb-5" style="max-width:540px; margin:0 auto 2rem;">
                Masukkan nomor resi untuk melihat status pengiriman secara <strong>real-time</strong>.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('tracking.search') }}" method="POST" id="trackingForm">
                        @csrf
                        <div class="search-input-group">
                            <input
                                type="text"
                                class="form-control"
                                name="resi"
                                id="resiInput"
                                placeholder="Masukkan nomor resi"
                                value="{{ old('resi') }}"
                                required
                                autofocus
                            />
                            <select name="courier" class="form-select" id="courierSelect">
                                <option value="jne" {{ old('courier') == 'jne' ? 'selected' : '' }}>JNE</option>
                                <option value="pos" {{ old('courier') == 'pos' ? 'selected' : '' }}>POS</option>
                                <option value="tiki" {{ old('courier') == 'tiki' ? 'selected' : '' }}>TIKI</option>
                                <option value="jnt" {{ old('courier') == 'jnt' ? 'selected' : '' }}>J&T</option>
                                <option value="sicepat" {{ old('courier') == 'sicepat' ? 'selected' : '' }}>SiCepat</option>
                                <option value="ninja" {{ old('courier') == 'ninja' ? 'selected' : '' }}>Ninja</option>
                                <option value="lion" {{ old('courier') == 'lion' ? 'selected' : '' }}>Lion</option>
                                <option value="wahana" {{ old('courier') == 'wahana' ? 'selected' : '' }}>Wahana</option>
                                <option value="spx" {{ old('courier') == 'spx' ? 'selected' : '' }}>SPX (Shopee)</option>
                            </select>
                            <button class="btn-search" type="submit" id="submitBtn">
                                <i class="fas fa-search me-2"></i> Cek Resi
                            </button>
                        </div>
                    </form>
                    <div class="form-helper" id="resiFormatHelper">
                        <i class="fas fa-info-circle me-1"></i>
                        <span id="formatHint">Contoh: 582230008329223 (JNE)</span>
                        <span class="mx-2">|</span>
                        <kbd class="bg-dark text-white-50 px-2 py-1 rounded">Ctrl + /</kbd>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= ERROR ======= -->
    @if(session('error'))
    <div class="container mt-4">
        <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endif

 <!-- ======= HASIL TRACKING ======= -->
@if(session('tracking'))
@php $track = session('tracking'); @endphp
<div class="container" id="trackingResult">
    <div class="track-result">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i> Hasil Tracking</h5>
            <span class="badge bg-light text-dark"><i class="far fa-clock me-1"></i> {{ now()->format('d/m/Y H:i') }}</span>
        </div>
        <div class="card-body">

            <!-- Info Utama -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="label"><i class="fas fa-barcode me-1"></i> Nomor Resi</div>
                        <div class="value">
                            {{ $track['resi'] }}
                            <button class="copy-btn" data-text="{{ $track['resi'] }}" title="Salin">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="label"><i class="fas fa-truck me-1"></i> Kurir</div>
                        <div class="value">{{ $track['courier'] }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="label"><i class="fas fa-info-circle me-1"></i> Status</div>
                        <div class="value">
                            @php
                                $status = $track['status_raw'] ?? $track['status'];
                                $class = match(strtoupper($status)) {
                                    'DELIVERED', 'SELESAI' => 'delivered',
                                    'PENDING' => 'pending',
                                    default => 'in-transit'
                                };
                            @endphp
                            <span class="badge-status {{ $class }}">
                                <span class="dot"></span> {{ $track['status'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Tambahan -->
            @php
                $showInfo = false;
                if(isset($track['date']) && $track['date'] != '' && $track['date'] != '-') $showInfo = true;
                if(isset($track['weight']) && $track['weight'] != '' && $track['weight'] != '-') $showInfo = true;
                if(isset($track['amount']) && $track['amount'] != '' && $track['amount'] != '-') $showInfo = true;
                if(isset($track['origin']) && $track['origin'] != '' && $track['origin'] != '-') $showInfo = true;
                if(isset($track['destination']) && $track['destination'] != '' && $track['destination'] != '-') $showInfo = true;
                if(isset($track['service']) && $track['service'] != '' && $track['service'] != '-') $showInfo = true;
            @endphp

            @if($showInfo)
            <div class="info-grid">
                @if(isset($track['date']) && $track['date'] != '' && $track['date'] != '-')
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-calendar"></i> Tanggal</div>
                    <div class="info-value">
                        @php
                            try {
                                echo \Carbon\Carbon::parse($track['date'])->format('d F Y H:i');
                            } catch (\Exception $e) {
                                echo $track['date'];
                            }
                        @endphp
                    </div>
                </div>
                @endif

                @if(isset($track['weight']) && $track['weight'] != '' && $track['weight'] != '-')
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-weight-hanging"></i> Berat</div>
                    <div class="info-value">{{ $track['weight'] }}</div>
                </div>
                @endif

                @if(isset($track['amount']) && $track['amount'] != '' && $track['amount'] != '-')
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-money-bill"></i> Biaya</div>
                    <div class="info-value">
                        @php
                            $amount = preg_replace('/[^0-9]/', '', $track['amount']);
                            $amount = (float) $amount;
                        @endphp
                        @if($amount > 0)
                            Rp {{ number_format($amount, 0, ',', '.') }}
                        @else
                            {{ $track['amount'] }}
                        @endif
                    </div>
                </div>
                @endif

                @if(isset($track['origin']) && $track['origin'] != '' && $track['origin'] != '-')
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-map-marker-alt"></i> Asal</div>
                    <div class="info-value">{{ $track['origin'] }}</div>
                </div>
                @endif

                @if(isset($track['destination']) && $track['destination'] != '' && $track['destination'] != '-')
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-flag-checkered"></i> Tujuan</div>
                    <div class="info-value">{{ $track['destination'] }}</div>
                </div>
                @endif

                @if(isset($track['service']) && $track['service'] != '' && $track['service'] != '-')
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-tag"></i> Layanan</div>
                    <div class="info-value">{{ $track['service'] }}</div>
                </div>
                @endif
            </div>
            @endif

            <hr>

            <!-- Timeline Riwayat -->
            <div class="mb-2">
                <h6 class="fw-bold"><i class="fas fa-history me-2"></i> Riwayat Pengiriman</h6>
            </div>

            @if(isset($track['history']) && count($track['history']) > 0)
            <ul class="list-group list-group-flush timeline">
                @foreach($track['history'] as $index => $item)
                <li class="list-group-item timeline-item {{ $loop->last ? 'border-0' : '' }}">
                    <div class="time">
                        <i class="far fa-calendar-alt"></i>
                        @php
                            try {
                                echo \Carbon\Carbon::parse($item['date'])->format('d F Y H:i');
                            } catch (\Exception $e) {
                                echo $item['date'];
                            }
                        @endphp
                    </div>
                    <div class="desc">
                        <i class="fas fa-chevron-right"></i> {{ $item['desc'] }}
                        @if(isset($item['location']) && $item['location'] != '')
                            <br><small class="text-muted"><i class="fas fa-map-pin me-1"></i> {{ $item['location'] }}</small>
                        @endif
                    </div>
                    @if($loop->last)
                    <div class="badge-latest"><i class="fas fa-check-circle me-1"></i> Terakhir diperbarui</div>
                    @endif
                </li>
                @endforeach
            </ul>
            @else
            <div class="text-center py-4 text-muted">
                <i class="fas fa-info-circle me-2"></i> Belum ada riwayat pengiriman
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button onclick="window.print()" class="btn-action">
                    <i class="fas fa-print"></i> Cetak
                </button>
                <button class="btn-action success share-btn" data-resi="{{ $track['resi'] }}">
                    <i class="fas fa-share-alt"></i> Bagikan
                </button>
                <a href="{{ route('home') }}" class="btn-action">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- ======= FITUR ======= -->
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-4">
                    <div class="icon-wrap"><i class="fas fa-map-pin"></i></div>
                    <h5>Tracking Real-Time</h5>
                    <p class="text-muted">Pantau posisi paket secara langsung dengan update terbaru.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-4">
                    <div class="icon-wrap"><i class="fas fa-bolt"></i></div>
                    <h5>Proses Cepat</h5>
                    <p class="text-muted">Hasil pencarian muncul hanya dalam hitungan detik.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-4">
                    <div class="icon-wrap"><i class="fas fa-lock"></i></div>
                    <h5>Aman & Terenkripsi</h5>
                    <p class="text-muted">Data pengiriman diproses secara aman.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= FOOTER ======= -->
    <footer class="footer-custom text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}">PT Kirim Mengirim Terkirim</a></p>
        </div>
    </footer>

    <!-- ======= TOAST ======= -->
    <div class="toast-container">
        <div class="toast toast-custom" id="notificationToast">
            <div class="toast-header">
                <strong class="me-auto" id="toastTitle">Notifikasi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body" id="toastMessage">Pesan</div>
        </div>
    </div>

    <!-- ======= SCROLL TOP ======= -->
    <button class="scroll-top" id="scrollTopBtn"><i class="fas fa-arrow-up"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Format hint
            const courierSelect = document.getElementById('courierSelect');
            const formatHint = document.getElementById('formatHint');
            const formats = {
                'jne': 'Contoh: 582230008329223 (JNE)',
                'pos': 'Contoh: 1234567890 (POS)',
                'tiki': 'Contoh: 1234567890 (TIKI)',
                'jnt': 'Contoh: 1234567890 (J&T)',
                'sicepat': 'Contoh: 1234567890 (SiCepat)',
                'ninja': 'Contoh: 1234567890 (Ninja)',
                'lion': 'Contoh: 1234567890 (Lion)',
                'wahana': 'Contoh: 1234567890 (Wahana)',
                'spx': 'Contoh: 066777683056 (SPX)'
            };
            if (courierSelect && formatHint) {
                formatHint.textContent = formats[courierSelect.value] || 'Masukkan nomor resi';
                courierSelect.addEventListener('change', function() {
                    formatHint.textContent = formats[this.value] || 'Masukkan nomor resi';
                });
            }

            // Auto dismiss alert
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(el) {
                    let btn = el.querySelector('.btn-close');
                    if (btn) btn.click();
                });
            }, 5000);

            // Loading
            document.getElementById('trackingForm')?.addEventListener('submit', function() {
                let btn = this.querySelector('.btn-search');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memproses...';
                btn.disabled = true;
            });

            // Copy
            document.querySelectorAll('.copy-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    let text = this.dataset.text;
                    navigator.clipboard.writeText(text).then(function() {
                        showToast('Berhasil!', 'Nomor resi disalin!', 'success');
                    }).catch(function() {
                        let ta = document.createElement('textarea');
                        ta.value = text;
                        document.body.appendChild(ta);
                        ta.select();
                        document.execCommand('copy');
                        document.body.removeChild(ta);
                        showToast('Berhasil!', 'Nomor resi disalin!', 'success');
                    });
                });
            });

            // Share
            document.querySelectorAll('.share-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    let resi = this.dataset.resi;
                    let text = 'Cek status pengiriman resi ' + resi + ' di ' + window.location.href;
                    if (navigator.share) {
                        navigator.share({ title: 'Tracking Resi', text: text });
                    } else {
                        navigator.clipboard.writeText(text).then(function() {
                            showToast('Berhasil!', 'Link disalin!', 'success');
                        });
                    }
                });
            });

            // Scroll top
            let scrollBtn = document.getElementById('scrollTopBtn');
            window.addEventListener('scroll', function() {
                scrollBtn.classList.toggle('show', window.scrollY > 300);
            });
            scrollBtn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Toast
            function showToast(title, message, type) {
                let el = document.getElementById('notificationToast');
                document.getElementById('toastTitle').textContent = title;
                document.getElementById('toastMessage').textContent = message;
                let colors = { success: '#28a745', error: '#dc3545', info: '#0d6efd' };
                document.getElementById('toastTitle').style.color = colors[type] || colors.info;
                new bootstrap.Toast(el, { delay: 3000 }).show();
            }

            // Keyboard shortcut
            document.addEventListener('keydown', function(e) {
                if (e.ctrlKey && e.key === '/') {
                    e.preventDefault();
                    let input = document.getElementById('resiInput');
                    if (input) { input.focus();
                        input.select(); }
                }
            });

            // Auto focus
            let input = document.getElementById('resiInput');
            if (input && !input.value) {
                setTimeout(function() { input.focus(); }, 500);
            }

            // Validasi input
            let resiInput = document.getElementById('resiInput');
            if (resiInput) {
                resiInput.addEventListener('input', function() {
                    this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
                });
            }

            // Scroll ke hasil
            let result = document.getElementById('trackingResult');
            if (result) {
                setTimeout(function() {
                    result.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 300);
            }

        });
    </script>

</body>
</html>