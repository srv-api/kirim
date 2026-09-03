@extends('dashboard')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Pilih Paket</h2>

    <div class="row g-4">

        @foreach($plans as $plan)

            <div class="col-md-4">

                <div class="card h-100">

                    <div class="card-body">

                        <h4>
                            {{ $plan->name }}
                        </h4>

                        <p class="text-muted">
                            {{ $plan->description }}
                        </p>

                        <h3 class="mb-3">
                            Rp {{ number_format($plan->price, 0, ',', '.') }}
                        </h3>

                        <p>
                            {{ $plan->duration_days }} hari
                        </p>

                        @if($plan->trial_days > 0)

                            <p class="text-success">
                                Trial {{ $plan->trial_days }} hari
                            </p>

                        @endif

                        <a
                            href="{{ route('subscription.checkout', $plan->slug) }}"
                            class="btn btn-dark w-100"
                        >
                            Pilih Paket
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection