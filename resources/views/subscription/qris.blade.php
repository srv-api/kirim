@extends('dashboard')

@section('content')

<style>
    .qris-page {
        max-width: 560px;
        margin: 0 auto;
        padding: 35px 15px 50px;
        color: #111827;
        text-align: center;
    }

    .qris-header {
        margin-bottom: 25px;
    }

    .qris-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 9px;
        color: #9ca3af;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .qris-eyebrow span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #22c55e;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, .10);
    }

    .qris-title {
        margin: 0;
        font-size: 28px;
        line-height: 1.2;
        font-weight: 800;
        letter-spacing: -.04em;
    }

    .qris-description {
        margin: 8px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    /* QR */
    .qris-box {
        width: 310px;
        max-width: 100%;
        margin: 0 auto 22px;
        padding: 14px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
    }

    .qris-box img {
        display: block;
        width: 100%;
        height: auto;
        border-radius: 7px;
    }

    /* AMOUNT */
    .qris-amount-label {
        margin-top: 4px;
        color: #9ca3af;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .07em;
        text-transform: uppercase;
    }

    .qris-amount {
        margin-top: 4px;
        color: #111827;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 800;
        letter-spacing: -.04em;
    }

    .qris-order {
        margin-top: 7px;
        color: #9ca3af;
        font-size: 10px;
    }

    .qris-order strong {
        color: #6b7280;
        font-weight: 650;
    }

    /* STATUS */
    .qris-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 18px;
        padding: 7px 12px;
        background: #fefce8;
        border: 1px solid #fef08a;
        border-radius: 999px;
        color: #854d0e;
        font-size: 10px;
        font-weight: 700;
    }

    .qris-status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #eab308;
        animation: qrisPulse 1.5s infinite;
    }

    @keyframes qrisPulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: .4;
            transform: scale(.75);
        }
    }

    /* INSTRUCTION */
    .qris-instruction {
        max-width: 450px;
        margin: 24px auto 0;
        padding: 14px 16px;
        background: #f8fafc;
        border: 1px solid #eef2f7;
        border-radius: 13px;
        text-align: left;
    }

    .qris-instruction-title {
        color: #111827;
        font-size: 11px;
        font-weight: 750;
    }

    .qris-instruction-text {
        margin-top: 4px;
        color: #6b7280;
        font-size: 10px;
        line-height: 1.6;
    }

    /* SECURE */
    .qris-secure {
        margin-top: 17px;
        color: #9ca3af;
        font-size: 9px;
    }

    /* ERROR */
    .qris-error {
        max-width: 450px;
        margin: 0 auto 22px;
        padding: 15px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 12px;
        color: #b91c1c;
        font-size: 11px;
        line-height: 1.5;
    }

    @media (max-width: 576px) {
        .qris-page {
            padding: 25px 10px 35px;
        }

        .qris-title {
            font-size: 24px;
        }

        .qris-box {
            width: 275px;
            padding: 12px;
        }

        .qris-amount {
            font-size: 26px;
        }

        .qris-instruction {
            margin-top: 20px;
        }
    }
</style>

<div class="container-fluid">

    <div class="qris-page">

        {{-- HEADER --}}
        <div class="qris-header">

            <div class="qris-eyebrow">
                <span></span>
                Secure Payment
            </div>

            <h1 class="qris-title">
                Bayar dengan QRIS
            </h1>

            <p class="qris-description">
                Scan QR Code menggunakan aplikasi pembayaran Anda.
            </p>

        </div>

        @php
            $qrUrl = null;

            foreach (($transaction->payment_data['actions'] ?? []) as $action) {
                if (($action['name'] ?? '') === 'generate-qr-code') {
                    $qrUrl = $action['url'] ?? null;
                    break;
                }
            }
        @endphp

        {{-- QR CODE --}}
        @if($qrUrl)

            <div class="qris-box">
                <img
                    src="{{ $qrUrl }}"
                    alt="QRIS Payment QR Code"
                >
            </div>

        @else

            <div class="qris-error">
                <i class="bi bi-exclamation-circle me-1"></i>
                QR Code pembayaran tidak tersedia.
                Silakan coba kembali atau hubungi administrator.
            </div>

        @endif

        {{-- AMOUNT --}}
        <div class="qris-amount-label">
            Total Pembayaran
        </div>

        <div class="qris-amount">
            Rp {{ number_format(
                $transaction->gross_amount,
                0,
                ',',
                '.'
            ) }}
        </div>

        {{-- ORDER ID --}}
        <div class="qris-order">
            Order ID:
            <strong>{{ $transaction->order_id }}</strong>
        </div>

        {{-- STATUS --}}
        @if($qrUrl)

            <div class="qris-status">
                <span class="qris-status-dot"></span>
                Menunggu pembayaran
            </div>

        @endif

        {{-- INSTRUCTION --}}
        <div class="qris-instruction">

            <div class="qris-instruction-title">
                <i class="bi bi-phone me-1"></i>
                Cara melakukan pembayaran
            </div>

            <div class="qris-instruction-text">
                Buka aplikasi pembayaran yang mendukung QRIS,
                pilih menu Scan QR, kemudian arahkan kamera
                ke QR Code di atas. Setelah pembayaran berhasil,
                transaksi akan diproses secara otomatis.
            </div>

        </div>

        {{-- SECURE --}}
        <div class="qris-secure">
            <i class="bi bi-shield-check me-1"></i>
            Pembayaran diproses dengan aman melalui Midtrans.
        </div>

    </div>

</div>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection
