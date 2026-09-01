@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       CHECKOUT PAGE
    ====================================================== */

    .checkout-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

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

        color: #9ca3af;
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
       CHECKOUT CARD
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
        padding: 24px 22px;
    }


    /* =====================================================
       PLAN CARD
    ====================================================== */

    .plan-card {
        padding: 22px;

        background: #f8fafc;

        border: 1px solid #eef2f7;
        border-radius: 14px;
    }

    .plan-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 20px;
    }

    .plan-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;
        margin-bottom: 9px;

        border-radius: 6px;

        background: #ffde59;
        color: #111827;

        font-size: 9px;
        font-weight: 800;

        letter-spacing: .08em;
    }

    .plan-name {
        margin: 0 0 5px;

        color: #111827;

        font-size: 21px;
        font-weight: 750;

        letter-spacing: -.02em;
    }

    .plan-description {
        margin: 0;

        color: #9ca3af;

        font-size: 11px;
        line-height: 1.5;
    }

    .plan-price {
        color: #111827;

        font-size: 24px;
        font-weight: 800;

        white-space: nowrap;
        letter-spacing: -.03em;
    }

    .plan-price span {
        font-size: 10px;
        font-weight: 600;
    }

    .plan-price small {
        color: #9ca3af;

        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0;
    }


    /* =====================================================
       DIVIDER
    ====================================================== */

    .checkout-divider {
        margin: 22px 0;

        border: 0;
        border-top: 1px solid #e5e7eb;

        opacity: 1;
    }


    /* =====================================================
       FEATURES
    ====================================================== */

    .features-title {
        margin-bottom: 13px;

        color: #374151;

        font-size: 11px;
        font-weight: 700;
    }

    .features-list {
        display: grid;
        grid-template-columns: 1fr 1fr;

        gap: 12px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 9px;

        color: #4b5563;

        font-size: 11px;
    }

    .feature-icon {
        width: 22px;
        height: 22px;

        flex: 0 0 22px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 7px;

        background: #ffde59;
        color: #111827;

        font-size: 10px;
    }


    /* =====================================================
       PROMOTION
    ====================================================== */

    .promotion-box {
        display: flex;
        align-items: flex-start;
        gap: 11px;

        margin-top: 20px;
        padding: 13px 14px;

        background: #fffdf0;

        border: 1px solid #f5e8a8;
        border-radius: 10px;
    }

    .promotion-icon {
        width: 30px;
        height: 30px;

        flex: 0 0 30px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: #ffde59;
        color: #111827;

        font-size: 13px;
    }

    .promotion-title {
        margin-bottom: 2px;

        color: #111827;

        font-size: 11px;
        font-weight: 700;
    }

    .promotion-text {
        color: #9ca3af;

        font-size: 10px;
        line-height: 1.5;
    }


    /* =====================================================
       ORDER SUMMARY
    ====================================================== */

    .summary-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .summary-header {
        padding: 20px 22px;

        border-bottom: 1px solid var(--page-border);
    }

    .summary-title {
        margin: 0;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .summary-body {
        padding: 22px;
    }

    .summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-bottom: 13px;

        color: #6b7280;

        font-size: 11px;
    }

    .summary-row:last-child {
        margin-bottom: 0;
    }

    .summary-value {
        color: #374151;

        font-weight: 600;
    }

    .summary-promotion {
        color: #059669;

        font-weight: 700;
    }

    .summary-divider {
        margin: 18px 0;

        border: 0;
        border-top: 1px solid #f0f1f3;

        opacity: 1;
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
       SUBMIT
    ====================================================== */

    .checkout-submit-wrapper {
        margin-top: 20px;
    }

    .btn-checkout {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        padding: 11px 15px;

        border: 0;
        border-radius: 10px;

        background: #111827;
        color: #fff;

        font-size: 11px;
        font-weight: 700;

        transition: all .18s ease;
    }

    .btn-checkout:hover {
        background: #000;
        color: #fff;

        transform: translateY(-1px);

        box-shadow: 0 7px 18px rgba(15, 23, 42, .12);
    }

    .btn-checkout i {
        font-size: 13px;
    }


    /* =====================================================
       TERMS
    ====================================================== */

    .checkout-terms {
        margin-top: 13px;

        color: #9ca3af;

        font-size: 9px;
        line-height: 1.6;

        text-align: center;
    }

    .checkout-terms a {
        color: #6b7280;

        font-weight: 600;

        text-decoration: none;
    }

    .checkout-terms a:hover {
        color: #111827;
        text-decoration: underline;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .checkout-title {
            font-size: 25px;
        }

        .checkout-card-body,
        .summary-body {
            padding: 20px 18px;
        }

        .plan-header {
            flex-direction: column;
        }

        .plan-price {
            font-size: 21px;
        }

        .features-list {
            grid-template-columns: 1fr;
        }

    }

</style>

<div class="container-fluid checkout-page">


{{-- HEADER --}}

<div class="checkout-header">

    <div class="checkout-eyebrow">
        <span></span>
        Subscription
    </div>

    <h1 class="checkout-title">
        Checkout
    </h1>

    <p class="checkout-description">
        Pilih paket dan lanjutkan proses upgrade akun Anda.
    </p>

</div>


{{-- ALERT --}}

@if(session('success'))

    <div
        class="alert alert-success mb-4"
        role="alert"
    >
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
    </div>

@endif


@if($errors->any())

    <div
        class="alert alert-danger mb-4"
        role="alert"
    >
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ $errors->first() }}
    </div>

@endif


<div class="row g-4">

    {{-- LEFT --}}

    <div class="col-lg-8">

        {{-- PLAN --}}

        <div class="checkout-card mb-4">

            <div class="checkout-card-header">

                <div class="checkout-card-icon">
                    <i class="bi bi-stars"></i>
                </div>

                <div>

                    <h2 class="checkout-card-title">
                        Paket Subscription
                    </h2>

                    <p class="checkout-card-description">
                        Detail paket yang akan Anda gunakan.
                    </p>

                </div>

            </div>


            <div class="checkout-card-body">

                <div class="plan-card">

                    <div class="plan-header">

                        <div>

                            <div class="plan-badge">
                                PREMIUM
                            </div>

                            <h2 class="plan-name">
                                {{ $plan->name ?? 'Plus' }}
                            </h2>

                            <p class="plan-description">
                                {{ $plan->description ?? 'Dapatkan fitur assessment yang lebih lengkap.' }}
                            </p>

                        </div>


                        <div class="plan-price">

                            <span>IDR</span>

                            {{ number_format($plan->price ?? 349000, 0, ',', '.') }}

                            <small>
                                /bulan
                            </small>

                        </div>

                    </div>


                    <hr class="checkout-divider">


                    {{-- FEATURES --}}

                    <div class="features-title">
                        Fitur yang Anda dapatkan
                    </div>

                    <div class="features-list">

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="bi bi-check"></i>
                            </div>

                            <span>
                                Assessment lebih lengkap
                            </span>

                        </div>


                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="bi bi-check"></i>
                            </div>

                            <span>
                                Peserta lebih banyak
                            </span>

                        </div>


                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="bi bi-check"></i>
                            </div>

                            <span>
                                Analitik assessment
                            </span>

                        </div>


                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="bi bi-check"></i>
                            </div>

                            <span>
                                Ranking peserta
                            </span>

                        </div>

                    </div>


                    {{-- PROMOTION --}}

                    <div class="promotion-box">

                        <div class="promotion-icon">
                            <i class="bi bi-stars"></i>
                        </div>

                        <div>

                            <div class="promotion-title">
                                Promo tersedia
                            </div>

                            <div class="promotion-text">
                                Dapatkan harga khusus untuk bulan pertama subscription Anda.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- RIGHT --}}

    <div class="col-lg-4">

        <div class="summary-card">

            <div class="summary-header">

                <h2 class="summary-title">
                    Ringkasan Pesanan
                </h2>

            </div>


            <div class="summary-body">

                <div class="summary-row">

                    <span>
                        {{ $plan->name ?? 'Plus' }}
                    </span>

                    <span class="summary-value">

                        IDR
                        {{ number_format($plan->price ?? 349000, 0, ',', '.') }}

                    </span>

                </div>


                <div class="summary-row">

                    <span>
                        Promotion
                    </span>

                    <span class="summary-promotion">

                        - IDR
                        {{ number_format($plan->price ?? 349000, 0, ',', '.') }}

                    </span>

                </div>


                <div class="summary-row">

                    <span>
                        VAT (11%)
                    </span>

                    <span class="summary-value">
                        IDR 0
                    </span>

                </div>


                <hr class="summary-divider">


                <div class="summary-total">

                    <span class="summary-total-label">
                        Due today
                    </span>

                    <span class="summary-total-value">
                        IDR 0
                    </span>

                </div>


                {{-- SUBSCRIBE --}}

                <div class="checkout-submit-wrapper">
                <a
                    href="{{ route('subscription.payment', $plan->slug ?? 'plus') }}"
                    class="btn-checkout"
                >
                    <span>Subscribe</span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                </div>


                <div class="checkout-terms">

                    IDR 0 untuk bulan pertama, kemudian
                    IDR {{ number_format(($plan->price ?? 349000) * 1.11, 0, ',', '.') }}/bulan.

                    Berlangganan akan diperpanjang secara otomatis sampai dibatalkan.

                </div>

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
