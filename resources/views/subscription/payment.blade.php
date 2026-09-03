@extends('dashboard')

@section('content')

<style>
    .payment-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-light: #9ca3af;
        --page-border: #e5e7eb;
        --page-soft: #f8fafc;
        --page-radius: 16px;

        padding-bottom: 35px;
    }

    /* =====================================================
       HEADER
    ====================================================== */

    .payment-header {
        margin-bottom: 30px;
    }

    .payment-eyebrow {
        display: flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 7px;

        color: var(--page-light);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .payment-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;
        background: #ffde59;

        box-shadow: 0 0 0 4px rgba(255, 222, 89, .12);
    }

    .payment-title {
        margin: 0;

        color: var(--page-text);
        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .payment-description {
        margin: 7px 0 0;

        color: var(--page-muted);
        font-size: 13px;
    }


    /* =====================================================
       PAYMENT CARD
    ====================================================== */

    .payment-card {
        background: #fff;
        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);
        overflow: hidden;
    }

    .payment-card-header {
        display: flex;
        align-items: center;
        gap: 11px;

        padding: 20px 22px;

        border-bottom: 1px solid var(--page-border);
    }

    .payment-card-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #ffde59;
        color: #111827;

        font-size: 14px;
    }

    .payment-card-title {
        margin: 0;

        color: #111827;
        font-size: 14px;
        font-weight: 700;
    }

    .payment-card-description {
        margin: 3px 0 0;

        color: #9ca3af;
        font-size: 11px;
    }

    .payment-card-body {
        padding: 22px;
    }


    /* =====================================================
       PAYMENT METHOD
    ====================================================== */

    .payment-method {
        position: relative;

        display: flex;
        align-items: center;
        gap: 13px;

        width: 100%;

        padding: 15px;

        margin-bottom: 10px;

        background: #fff;

        border: 1px solid #111827;
        border-radius: 12px;
    }

    .payment-method-icon {
        width: 40px;
        height: 40px;

        flex: 0 0 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f3f4f6;
        color: #111827;

        font-size: 17px;
    }

    .payment-method-content {
        flex: 1;
    }

    .payment-method-name {
        color: #111827;

        font-size: 12px;
        font-weight: 700;
    }

    .payment-method-text {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
        line-height: 1.5;
    }

    .payment-check {
        width: 20px;
        height: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex: 0 0 20px;

        background: #111827;

        border: 1px solid #111827;
        border-radius: 50%;

        color: #fff;

        font-size: 10px;
    }


    /* =====================================================
       PAYMENT BUTTON
    ====================================================== */

    .btn-payment {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        margin-top: 20px;
        padding: 11px 15px;

        border: 0;
        border-radius: 10px;

        background: #111827;
        color: #fff;

        font-size: 11px;
        font-weight: 700;

        transition: all .18s ease;

        cursor: pointer;
    }

    .btn-payment:hover {
        background: #000;
        color: #fff;

        transform: translateY(-1px);

        box-shadow: 0 7px 18px rgba(15, 23, 42, .12);
    }

    .payment-secure {
        margin-top: 12px;

        color: #9ca3af;

        font-size: 9px;
        line-height: 1.5;

        text-align: center;
    }


    /* =====================================================
       SUMMARY
    ====================================================== */

    .payment-summary {
        padding: 22px;

        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);
    }

    .summary-title {
        margin: 0 0 20px;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .summary-plan {
        padding: 14px;

        background: var(--page-soft);

        border: 1px solid #eef2f7;
        border-radius: 11px;
    }

    .summary-plan-name {
        color: #111827;

        font-size: 12px;
        font-weight: 700;
    }

    .summary-plan-price {
        margin-top: 5px;

        color: #6b7280;

        font-size: 10px;
        line-height: 1.5;
    }

    .summary-divider {
        margin: 18px 0;

        border: 0;
        border-top: 1px solid #f0f1f3;
    }

    .summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        margin-bottom: 12px;

        color: #6b7280;

        font-size: 11px;
    }

    .summary-value {
        color: #374151;

        font-weight: 600;

        text-align: right;
    }

    .summary-total {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .summary-total-label {
        color: #111827;

        font-size: 12px;
        font-weight: 700;
    }

    .summary-total-value {
        color: #111827;

        font-size: 19px;
        font-weight: 800;

        letter-spacing: -.02em;
    }


    /* =====================================================
       MOBILE
    ====================================================== */

    @media (max-width: 991px) {
        .payment-summary {
            margin-top: 0;
        }
    }

    @media (max-width: 768px) {

        .payment-title {
            font-size: 25px;
        }

        .payment-card-body,
        .payment-summary {
            padding: 18px;
        }

        .payment-card-header {
            padding: 18px;
        }

        .payment-method {
            padding: 13px;
        }

        .summary-total-value {
            font-size: 17px;
        }
    }
</style>

<div class="container-fluid payment-page">

{{-- =====================================================
     HEADER
====================================================== --}}

<div class="payment-header">

    <div class="payment-eyebrow">
        <span></span>
        Payment
    </div>

    <h1 class="payment-title">
        Pembayaran
    </h1>

    <p class="payment-description">
        Selesaikan pembayaran subscription Anda menggunakan QRIS.
    </p>

</div>


<div class="row g-4">

    {{-- =================================================
         PAYMENT METHOD
    ================================================== --}}

    <div class="col-lg-8">

        <div class="payment-card">

            <div class="payment-card-header">

                <div class="payment-card-icon">
                    <i class="bi bi-qr-code"></i>
                </div>

                <div>
                    <h2 class="payment-card-title">
                        Metode Pembayaran
                    </h2>

                    <p class="payment-card-description">
                        Pembayaran saat ini tersedia melalui QRIS.
                    </p>
                </div>

            </div>


            <div class="payment-card-body">

                {{-- QRIS --}}

                <div class="payment-method">

                    <div class="payment-method-icon">
                        <i class="bi bi-qr-code"></i>
                    </div>

                    <div class="payment-method-content">

                        <div class="payment-method-name">
                            QRIS
                        </div>

                        <div class="payment-method-text">
                            Bayar dengan scan QRIS menggunakan aplikasi pembayaran Anda.
                        </div>

                    </div>

                    <div class="payment-check">
                        <i class="bi bi-check"></i>
                    </div>

                </div>


                {{-- PAYMENT FORM --}}

                <form
                    method="POST"
                    action="{{ route('subscription.subscribe', $plan->slug) }}"
                    id="payment-form"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="payment_method"
                        value="qris"
                    >

                    <button
                        type="submit"
                        class="btn-payment"
                    >

                        <span>
                            Bayar dengan QRIS
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </button>

                </form>


                <div class="payment-secure">

                    <i class="bi bi-shield-check me-1"></i>

                    Pembayaran Anda diproses dengan aman melalui Midtrans.

                </div>

            </div>

        </div>

    </div>


    {{-- =================================================
         ORDER SUMMARY
    ================================================== --}}

    <div class="col-lg-4">

        <div class="payment-summary">

            <h2 class="summary-title">
                Ringkasan Pesanan
            </h2>


            {{-- PLAN --}}

            <div class="summary-plan">

                <div class="summary-plan-name">
                    {{ $plan->name ?? 'Plus' }}
                </div>

                <div class="summary-plan-price">
                    {{ $plan->description ?? 'Premium Subscription' }}
                </div>

            </div>


            <hr class="summary-divider">


            {{-- PRICE --}}

            <div class="summary-row">

                <span>
                    Harga Paket
                </span>

                <span class="summary-value">
                    IDR {{ number_format($plan->price ?? 349000, 0, ',', '.') }}
                </span>

            </div>


            {{-- PROMOTION --}}

            <div class="summary-row">

                <span>
                    Promotion
                </span>

                <span class="summary-value">
                    IDR 0
                </span>

            </div>


            {{-- VAT --}}

            <div class="summary-row">

                <span>
                    VAT
                </span>

                <span class="summary-value">
                    IDR 0
                </span>

            </div>


            <hr class="summary-divider">


            {{-- TOTAL --}}

            <div class="summary-total">

                <span class="summary-total-label">
                    Total
                </span>

                <span class="summary-total-value">
                    IDR {{ number_format($plan->price ?? 349000, 0, ',', '.') }}
                </span>

            </div>

        </div>

    </div>

</div>

</div>

{{-- BOOTSTRAP ICONS --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection
