@extends('dashboard')

@section('content')

<style>
    .checkout-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-light: #9ca3af;
        --page-border: #e5e7eb;
        --page-soft: #f8fafc;
        --page-radius: 16px;

        color: var(--page-text);
        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .checkout-header {
        margin-bottom: 30px;
    }

    .checkout-eyebrow {
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

    .checkout-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #ffde59;

        box-shadow: 0 0 0 4px rgba(255, 222, 89, .12);
    }

    .checkout-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .checkout-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       CARD
    ====================================================== */

    .checkout-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .checkout-card-header {
        display: flex;
        align-items: center;
        gap: 11px;

        padding: 20px 22px;

        border-bottom: 1px solid var(--page-border);
    }

    .checkout-card-icon {
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

    .checkout-card-title {
        margin: 0;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .checkout-card-description {
        margin: 3px 0 0;

        color: #9ca3af;

        font-size: 11px;
    }

    .checkout-card-body {
        padding: 22px;
    }


    /* =====================================================
       PLAN
    ====================================================== */

    .plan-box {
        padding: 18px;

        background: var(--page-soft);

        border: 1px solid #eef2f7;
        border-radius: 12px;
    }

    .plan-label {
        margin-bottom: 7px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .06em;
        text-transform: uppercase;
    }

    .plan-name {
        color: #111827;

        font-size: 20px;
        font-weight: 750;

        letter-spacing: -.02em;
    }

    .plan-description {
        margin-top: 5px;

        color: var(--page-muted);

        font-size: 11px;
        line-height: 1.5;
    }

    .plan-price {
        margin-top: 20px;

        color: #111827;

        font-size: 28px;
        line-height: 1;

        font-weight: 800;

        letter-spacing: -.03em;
    }

    .plan-price small {
        color: #9ca3af;

        font-size: 11px;
        font-weight: 500;

        letter-spacing: 0;
    }

    .trial-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        margin-top: 15px;
        padding: 6px 10px;

        border-radius: 7px;

        background: #ecfdf5;
        color: #047857;

        font-size: 10px;
        font-weight: 700;
    }


    /* =====================================================
       PAYMENT OPTION
    ====================================================== */

    .payment-option {
        position: relative;

        display: flex;
        align-items: center;
        gap: 13px;

        width: 100%;

        padding: 15px;

        margin-top: 5px;

        background: #fff;

        border: 1px solid #111827;
        border-radius: 12px;

        cursor: pointer;
    }

    .payment-option-icon {
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

    .payment-option-content {
        flex: 1;
    }

    .payment-title {
        color: #111827;

        font-size: 12px;
        font-weight: 700;
    }

    .payment-description {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
        line-height: 1.5;
    }

    .payment-check {
        width: 20px;
        height: 20px;

        flex: 0 0 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #111827;

        border: 1px solid #111827;
        border-radius: 50%;

        color: #fff;

        font-size: 10px;
    }


    /* =====================================================
       SUMMARY
    ====================================================== */

    .checkout-summary {
        padding: 17px 0 0;
    }

    .summary-divider {
        margin: 0 0 17px;

        border: 0;
        border-top: 1px solid #f0f1f3;
    }

    .summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        color: #6b7280;

        font-size: 11px;
    }

    .summary-row strong {
        color: #111827;

        font-size: 13px;
        font-weight: 700;
    }


    /* =====================================================
       BUTTON
    ====================================================== */

    .btn-payment {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        margin-top: 20px;
        padding: 12px 15px;

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
       ALERT
    ====================================================== */

    .checkout-alert {
        margin-bottom: 20px;

        padding: 12px 15px;

        background: #fef2f2;

        border: 1px solid #fecaca;
        border-radius: 10px;

        color: #b91c1c;

        font-size: 11px;
    }


    /* =====================================================
       MOBILE
    ====================================================== */

    @media (max-width: 768px) {

        .checkout-title {
            font-size: 25px;
        }

        .checkout-card-body {
            padding: 18px;
        }

        .checkout-card-header {
            padding: 18px;
        }

        .plan-price {
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid checkout-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="checkout-header">

    <div class="checkout-eyebrow">
        <span></span>
        Subscription
    </div>

    <h1 class="checkout-title">
        Pembayaran
    </h1>

    <p class="checkout-description">
        Selesaikan pembayaran untuk mengaktifkan paket Anda.
    </p>

</div>


{{-- =====================================================
     ERROR
====================================================== --}}

@if(session('error'))

    <div class="checkout-alert">
        <i class="bi bi-exclamation-circle me-1"></i>

        {{ session('error') }}
    </div>

@endif


<div class="row g-4">

    {{-- =================================================
         PLAN
    ================================================== --}}

    <div class="col-lg-7">

        <div class="checkout-card">

            <div class="checkout-card-header">

                <div class="checkout-card-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>

                    <h2 class="checkout-card-title">
                        Detail Paket
                    </h2>

                    <p class="checkout-card-description">
                        Paket subscription yang Anda pilih.
                    </p>

                </div>

            </div>


            <div class="checkout-card-body">

                <div class="plan-box">

                    <div class="plan-label">
                        Subscription Plan
                    </div>

                    <div class="plan-name">
                        {{ $plan->name }}
                    </div>

                    <div class="plan-description">
                        {{ $plan->description }}
                    </div>

                    <div class="plan-price">

                        Rp {{ number_format($plan->price, 0, ',', '.') }}

                        <small>
                            / paket
                        </small>

                    </div>


                    @if($plan->trial_days > 0)

                        <div class="trial-badge">

                            <i class="bi bi-gift"></i>

                            Trial {{ $plan->trial_days }} hari

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- =================================================
         PAYMENT
    ================================================== --}}

    <div class="col-lg-5">

        <div class="checkout-card">

            <div class="checkout-card-header">

                <div class="checkout-card-icon">
                    <i class="bi bi-credit-card"></i>
                </div>

                <div>

                    <h2 class="checkout-card-title">
                        Metode Pembayaran
                    </h2>

                    <p class="checkout-card-description">
                        Pilih metode pembayaran yang tersedia.
                    </p>

                </div>

            </div>


            <div class="checkout-card-body">

                <form
                    method="POST"
                    action="{{ route('subscription.subscribe', $plan->slug) }}"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="payment_method"
                        value="qris"
                    >


                    {{-- QRIS --}}

                    <label class="payment-option">

                        <div class="payment-option-icon">
                            <i class="bi bi-qr-code"></i>
                        </div>

                        <div class="payment-option-content">

                            <div class="payment-title">
                                QRIS
                            </div>

                            <div class="payment-description">
                                Bayar menggunakan aplikasi yang mendukung QRIS.
                            </div>

                        </div>

                        <div class="payment-check">
                            <i class="bi bi-check"></i>
                        </div>

                    </label>


                    {{-- SUMMARY --}}

                    <div class="checkout-summary">

                        <hr class="summary-divider">

                        <div class="summary-row">

                            <span>
                                Total Pembayaran
                            </span>

                            <strong>
                                Rp {{ number_format($plan->price, 0, ',', '.') }}
                            </strong>

                        </div>

                    </div>


                    {{-- BUTTON --}}

                    <button
                        type="submit"
                        class="btn-payment"
                    >

                        <span>
                            Bayar Sekarang
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </button>


                    <div class="payment-secure">

                        <i class="bi bi-shield-check me-1"></i>

                        Pembayaran diproses dengan aman melalui Midtrans.

                    </div>

                </form>

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
