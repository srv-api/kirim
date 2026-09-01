@extends('dashboard')

@section('content')

<style>

    .payment-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }

    .payment-header {
        margin-bottom: 30px;
    }

    .payment-eyebrow {
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

    .payment-method {
        position: relative;

        display: flex;
        align-items: center;
        gap: 13px;

        width: 100%;

        padding: 15px;

        margin-bottom: 10px;

        background: #fff;

        border: 1px solid #e5e7eb;
        border-radius: 12px;

        cursor: pointer;

        transition: all .15s ease;
    }

    .payment-method:hover {
        border-color: #d1d5db;
        background: #fafafa;
    }

    .payment-method.active {
        border-color: #111827;
        background: #fafafa;
    }

    .payment-method-radio {
        position: absolute;

        opacity: 0;
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
    }

    .payment-check {
        width: 20px;
        height: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #d1d5db;
        border-radius: 50%;

        color: transparent;

        font-size: 10px;
    }

    .payment-method.active .payment-check {
        background: #111827;
        border-color: #111827;
        color: #fff;
    }

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

        background: #f8fafc;

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

    @media (max-width: 768px) {

        .payment-title {
            font-size: 25px;
        }

        .payment-card-body,
        .payment-summary {
            padding: 18px;
        }

    }

</style>


<div class="container-fluid payment-page">

    {{-- HEADER --}}

    <div class="payment-header">

        <div class="payment-eyebrow">
            <span></span>
            Payment
        </div>

        <h1 class="payment-title">
            Pembayaran
        </h1>

        <p class="payment-description">
            Pilih metode pembayaran untuk menyelesaikan subscription Anda.
        </p>

    </div>


    <div class="row g-4">

        {{-- PAYMENT METHOD --}}

        <div class="col-lg-8">

            <div class="payment-card">

                <div class="payment-card-header">

                    <div class="payment-card-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>

                    <div>

                        <h2 class="payment-card-title">
                            Metode Pembayaran
                        </h2>

                        <p class="payment-card-description">
                            Pilih metode pembayaran yang tersedia.
                        </p>

                    </div>

                </div>


                <div class="payment-card-body">

                    {{-- BANK TRANSFER --}}

                    <label class="payment-method active">

                        <input
                            type="radio"
                            name="payment_method"
                            value="bank_transfer"
                            class="payment-method-radio"
                            checked
                        >

                        <div class="payment-method-icon">
                            <i class="bi bi-bank"></i>
                        </div>

                        <div class="payment-method-content">

                            <div class="payment-method-name">
                                Bank Transfer
                            </div>

                            <div class="payment-method-text">
                                Transfer melalui rekening bank.
                            </div>

                        </div>

                        <div class="payment-check">
                            <i class="bi bi-check"></i>
                        </div>

                    </label>


                    {{-- E-WALLET --}}

                    <label class="payment-method">

                        <input
                            type="radio"
                            name="payment_method"
                            value="ewallet"
                            class="payment-method-radio"
                        >

                        <div class="payment-method-icon">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div class="payment-method-content">

                            <div class="payment-method-name">
                                E-Wallet
                            </div>

                            <div class="payment-method-text">
                                Bayar menggunakan e-wallet.
                            </div>

                        </div>

                        <div class="payment-check">
                            <i class="bi bi-check"></i>
                        </div>

                    </label>


                    {{-- QRIS --}}

                    <label class="payment-method">

                        <input
                            type="radio"
                            name="payment_method"
                            value="qris"
                            class="payment-method-radio"
                        >

                        <div class="payment-method-icon">
                            <i class="bi bi-qr-code"></i>
                        </div>

                        <div class="payment-method-content">

                            <div class="payment-method-name">
                                QRIS
                            </div>

                            <div class="payment-method-text">
                                Bayar dengan scan QRIS.
                            </div>

                        </div>

                        <div class="payment-check">
                            <i class="bi bi-check"></i>
                        </div>

                    </label>


                    {{-- CREDIT CARD --}}

                    <label class="payment-method">

                        <input
                            type="radio"
                            name="payment_method"
                            value="credit_card"
                            class="payment-method-radio"
                        >

                        <div class="payment-method-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>

                        <div class="payment-method-content">

                            <div class="payment-method-name">
                                Credit / Debit Card
                            </div>

                            <div class="payment-method-text">
                                Bayar menggunakan kartu debit atau kredit.
                            </div>

                        </div>

                        <div class="payment-check">
                            <i class="bi bi-check"></i>
                        </div>

                    </label>


                    <form
                        method="POST"
                        action="{{ route('subscription.subscribe', $plan->slug) }}"
                        id="payment-form"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="payment_method"
                            id="selected-payment-method"
                            value="bank_transfer"
                        >

                        <button
                            type="submit"
                            class="btn-payment"
                        >

                            <span>
                                Bayar Sekarang
                            </span>

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </form>


                    <div class="payment-secure">

                        <i class="bi bi-shield-check me-1"></i>

                        Pembayaran Anda diproses dengan aman.

                    </div>

                </div>

            </div>

        </div>


        {{-- SUMMARY --}}

        <div class="col-lg-4">

            <div class="payment-summary">

                <h2 class="summary-title">
                    Ringkasan Pesanan
                </h2>


                <div class="summary-plan">

                    <div class="summary-plan-name">
                        {{ $plan->name ?? 'Plus' }}
                    </div>

                    <div class="summary-plan-price">
                        {{ $plan->description ?? 'Premium Subscription' }}
                    </div>

                </div>


                <hr class="summary-divider">


                <div class="summary-row">

                    <span>
                        Harga Paket
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

                    <span class="summary-value">
                        - IDR {{ number_format($plan->price ?? 349000, 0, ',', '.') }}
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
                        Total
                    </span>

                    <span class="summary-total-value">
                        IDR 0
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    document.querySelectorAll('.payment-method').forEach(method => {

        method.addEventListener('click', function () {

            document.querySelectorAll('.payment-method')
                .forEach(item => item.classList.remove('active'));

            this.classList.add('active');

            const radio = this.querySelector('input[type="radio"]');

            radio.checked = true;

            document.getElementById('selected-payment-method').value =
                radio.value;

        });

    });

</script>


<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection