@extends('dashboard')

@section('content')

<style>

.qris-page {
    max-width: 550px;
    margin: 40px auto;
}

.qris-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 30px;
    text-align: center;
}

.qris-title {
    font-size: 24px;
    font-weight: 700;
}

.qris-description {
    color: #6b7280;
    margin-top: 8px;
}

.qris-box {
    margin: 25px auto;
    width: 300px;
    max-width: 100%;
}

.qris-box img {
    width: 100%;
    height: auto;
    display: block;
}

.qris-amount {
    font-size: 26px;
    font-weight: 800;
}

.qris-order {
    color: #6b7280;
    font-size: 14px;
    margin-top: 8px;
}

</style>

<div class="qris-page">

    <div class="qris-card">

        <div class="qris-title">
            Bayar dengan QRIS
        </div>

        <div class="qris-description">
            Scan QR Code menggunakan aplikasi pembayaran Anda.
        </div>

        @php

            $qrUrl = null;

            foreach (
                ($transaction->payment_data['actions'] ?? [])
                as $action
            ) {

                if (
                    ($action['name'] ?? '') ===
                    'generate-qr-code'
                ) {
                    $qrUrl = $action['url'] ?? null;
                    break;
                }

            }

        @endphp
        <!-- <pre style="
    text-align: left;
    background: #111827;
    color: #fff;
    padding: 20px;
    border-radius: 12px;
    overflow: auto;
    font-size: 12px;
">{{ json_encode(
    $transaction->payment_data,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
) }}</pre> -->
        @if($qrUrl)

            <div class="qris-box">

                <img
                    src="{{ $qrUrl }}"
                    alt="QRIS Payment"
                >

            </div>

        @else

            <div class="alert alert-danger mt-4">
                QR Code pembayaran tidak tersedia.
            </div>

        @endif

        <div class="qris-amount">

            Rp {{ number_format(
                $transaction->gross_amount,
                0,
                ',',
                '.'
            ) }}

        </div>

        <div class="qris-order">

            Order ID:
            {{ $transaction->order_id }}

        </div>

        <div class="alert alert-info mt-4">

            Setelah pembayaran berhasil,
            status transaksi akan diperbarui otomatis.

        </div>

    </div>

</div>

@endsection