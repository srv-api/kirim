@extends('dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Profile
        </h2>

        <p class="text-muted mb-0">
            Kelola informasi akun Anda.
        </p>

    </div>


    {{-- =====================================================
         ALERT SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm">
            {{ session('success') }}
        </div>

    @endif


    {{-- =====================================================
         VALIDATION ERROR
    ====================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row g-4">


        {{-- =================================================
             PROFILE CARD
        ================================================== --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">


                    {{-- AVATAR --}}

                    <div
                        class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                        style="
                            width:100px;
                            height:100px;
                            border-radius:50%;
                            background:#111;
                            color:#fff;
                            font-size:36px;
                            font-weight:700;
                        "
                    >

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>


                    {{-- NAME --}}

                    <h4 class="fw-bold mb-1">
                        {{ $user->name }}
                    </h4>


                    {{-- EMAIL --}}

                    <p class="text-muted mb-3">
                        {{ $user->email }}
                    </p>


                    {{-- ROLE --}}

                    @if($user->hasRole('owner'))

                        <span class="badge bg-dark">
                            Owner
                        </span>

                    @elseif($user->hasRole('superadmin'))

                        <span class="badge bg-dark">
                            Super Admin
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            User
                        </span>

                    @endif


                    <hr class="my-4">


                    {{-- WHATSAPP --}}

                    <div class="text-start mb-3">

                        <small class="text-muted d-block">
                            WhatsApp
                        </small>

                        <span class="fw-semibold">
                            {{ $user->whatsapp }}
                        </span>

                    </div>


                    {{-- REFERRAL --}}

                    <div class="text-start">

                        <small class="text-muted d-block">
                            Kode Referral
                        </small>

                        <div class="d-flex align-items-center justify-content-between">

                            <span
                                class="fw-bold"
                                style="letter-spacing:2px;"
                            >
                                {{ $user->referral_code }}
                            </span>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-dark"
                                onclick="copyReferral()"
                            >
                                Salin
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             FORM PROFILE
        ================================================== --}}

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-1">
                        Informasi Profile
                    </h5>

                    <p class="text-muted small mb-4">
                        Perbarui informasi akun Anda.
                    </p>


                    <form
                        method="POST"
                        action="{{ route('owner.profile.update') }}"
                    >

                        @csrf

                        @method('PUT')


                        {{-- NAME --}}

                        <div class="mb-3">

                            <label
                                for="name"
                                class="form-label fw-semibold"
                            >
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $user->name) }}"
                                required
                            >

                        </div>


                        {{-- EMAIL --}}

                        <div class="mb-3">

                            <label
                                for="email"
                                class="form-label fw-semibold"
                            >
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $user->email) }}"
                                required
                            >

                        </div>


                        {{-- WHATSAPP --}}

                        <div class="mb-3">

                            <label
                                for="whatsapp"
                                class="form-label fw-semibold"
                            >
                                WhatsApp
                            </label>

                            <input
                                type="text"
                                id="whatsapp"
                                name="whatsapp"
                                class="form-control"
                                value="{{ old('whatsapp', $user->whatsapp) }}"
                                required
                            >

                        </div>


                        <hr class="my-4">


                        {{-- PASSWORD --}}

                        <h6 class="fw-bold mb-1">
                            Ubah Password
                        </h6>

                        <p class="text-muted small mb-3">
                            Kosongkan jika tidak ingin mengubah password.
                        </p>


                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <label
                                    for="password"
                                    class="form-label fw-semibold"
                                >
                                    Password Baru
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Minimal 8 karakter"
                                >

                            </div>


                            <div class="col-md-6 mb-3">

                                <label
                                    for="password_confirmation"
                                    class="form-label fw-semibold"
                                >
                                    Konfirmasi Password
                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Ulangi password"
                                >

                            </div>

                        </div>


                        {{-- SUBMIT --}}

                        <div class="d-flex justify-content-end mt-3">

                            <button
                                type="submit"
                                class="btn btn-dark px-4"
                            >
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

function copyReferral()
{
    const referral =
        @json($user->referral_code);

    navigator.clipboard.writeText(referral);

    alert('Kode referral berhasil disalin.');
}

</script>

@endsection
