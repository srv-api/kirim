@extends('dashboard')

@section('content')

<style>

.checkout-page {
    --page-text: #111827;
    --page-muted: #6b7280;
    --page-border: #e5e7eb;
    --page-radius: 16px;

    color: var(--page-text);
    padding-bottom: 35px;
}

.checkout-header {
    margin-bottom: 25px;
}

.checkout-header h2 {
    margin: 0;
    font-size: 25px;
    font-weight: 700;
}

.checkout-header p {
    margin-top: 6px;
    color: var(--page-muted);
}

.checkout-card {
    background: #fff;
    border: 1px solid var(--page-border);
    border-radius: var(--page-radius);
    padding: 25px;
}

.plan-name {
    font-size: 20px;
    font-weight: 700;
}

.plan-description {
    color: var(--page-muted);
    margin-top: 5px;
}

.price {
    font-size: 28px;
    font-weight: 800;
    margin-top: 20px;
}

.payment-option {
    border: 1px solid var(--page-border);
    border-radius: 14px;
    padding: 18px;
    margin-top: 20px;
    cursor: pointer;
}

.payment-option.active {
    border-color: #111827;
}

.payment-option input {
    margin-right: 10px;
}

.payment-title {
    font-weight: 700;
}

.payment-description {
    color: var(--page-muted);
    font-size: 14px;
    margin-left: 25px;
    margin-top: 4px;
}

.btn-payment {
    width: 100%;
    border: 0;
    border-radius: 12px;
    background: #111827;
    color: white;
    padding: 14px;
    font-weight: 700;
    margin-top: 25px;
}

</style>

<div class="checkout-page">

    <div class="checkout-header">

        <h2>Pembayaran</h2>

        <p>
            Selesaikan pembayaran untuk mengaktifkan paket Anda.
        </p>

    </div>

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif

    <div class="row g-4">

        <div class="col-lg-7">

            <div class="checkout-card">

                <div class="plan-name">
                    {{ $plan->name }}
                </div>

                <div class="plan-description">
                    {{ $plan->description }}
                </div>

                <div class="price">
                    Rp {{ number_format($plan->price, 0, ',', '.') }}
                </div>

                @if($plan->trial_days > 0)

                    <div class="text-success mt-2">
                        Trial {{ $plan->trial_days }} hari
                    </div>

                @endif

            </div>

        </div>

        <div class="col-lg-5">

            <div class="checkout-card">

                <h5 class="mb-3">
                    Metode Pembayaran
                </h5>

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

                    <label class="payment-option active">

                        <input
                            type="radio"
                            checked
                        >

                        <span class="payment-title">
                            QRIS
                        </span>

                        <div class="payment-description">
                            Bayar menggunakan aplikasi yang mendukung QRIS.
                        </div>

                    </label>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">

                        <span>
                            Total
                        </span>

                        <strong>
                            Rp {{ number_format($plan->price, 0, ',', '.') }}
                        </strong>

                    </div>

                    <button
                        type="submit"
                        class="btn-payment"
                    >
                        Bayar Sekarang
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection