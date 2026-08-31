@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       PROFILE PAGE
    ====================================================== */

    .profile-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .profile-header {
        margin-bottom: 30px;
    }

    .profile-eyebrow {
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

    .profile-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
    }

    .profile-title {
        margin: 0;

        color: var(--page-text);

        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;

        letter-spacing: -.035em;
    }

    .profile-description {
        margin: 7px 0 0;

        color: var(--page-muted);

        font-size: 13px;
    }


    /* =====================================================
       ALERT
    ====================================================== */

    .profile-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;

        padding: 12px 14px;

        border-radius: 10px;

        font-size: 12px;
    }

    .profile-alert i {
        margin-top: 1px;

        font-size: 14px;
    }

    .profile-alert .btn-close {
        margin-left: auto;

        padding: 5px;

        font-size: 9px;
    }

    .profile-alert ul {
        padding-left: 18px;
    }


    /* =====================================================
       PROFILE CARD
    ====================================================== */

    .profile-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .profile-card-body {
        padding: 28px 24px;
    }


    /* =====================================================
       AVATAR
    ====================================================== */

    .profile-avatar {
        width: 88px;
        height: 88px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 17px;

        border-radius: 50%;

        background: #111827;
        color: #fff;

        font-size: 30px;
        font-weight: 750;

        letter-spacing: -.03em;
    }


    /* =====================================================
       PROFILE IDENTITY
    ====================================================== */

    .profile-name {
        margin: 0;

        color: #111827;

        font-size: 18px;
        font-weight: 750;

        letter-spacing: -.02em;
    }

    .profile-email {
        margin: 5px 0 13px;

        color: #9ca3af;

        font-size: 12px;
    }


    /* =====================================================
       ROLE
    ====================================================== */

    .profile-role {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 10px;

        border-radius: 20px;

        background: #f3f4f6;

        color: #374151;

        font-size: 10px;
        font-weight: 700;
    }

    .profile-role i {
        font-size: 10px;
    }


    /* =====================================================
       PROFILE META
    ====================================================== */

    .profile-divider {
        margin: 22px 0;

        border: 0;
        border-top: 1px solid #f0f1f3;

        opacity: 1;
    }

    .profile-meta {
        text-align: left;

        margin-bottom: 18px;
    }

    .profile-meta:last-child {
        margin-bottom: 0;
    }

    .profile-meta-label {
        display: block;

        margin-bottom: 5px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 650;

        letter-spacing: .02em;
    }

    .profile-meta-value {
        color: #374151;

        font-size: 12px;
        font-weight: 600;
    }


    /* =====================================================
       REFERRAL
    ====================================================== */

    .referral-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 10px;
    }

    .referral-code {
        color: #111827;

        font-size: 13px;
        font-weight: 750;

        letter-spacing: 2px;
    }

    .btn-copy-referral {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 6px 10px;

        border: 1px solid #e5e7eb;
        border-radius: 8px;

        background: #fff;
        color: #6b7280;

        font-size: 10px;
        font-weight: 650;

        transition: all .15s ease;
    }

    .btn-copy-referral:hover {
        background: #f9fafb;

        border-color: #d1d5db;

        color: #111827;
    }


    /* =====================================================
       FORM CARD
    ====================================================== */

    .profile-form-card {
        background: #fff;

        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);

        overflow: hidden;
    }

    .profile-form-header {
        display: flex;
        align-items: center;

        gap: 11px;

        padding: 20px 22px;

        border-bottom: 1px solid var(--page-border);
    }

    .profile-form-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #f3f4f6;
        color: #374151;

        font-size: 14px;
    }

    .profile-form-title {
        margin: 0;

        color: #111827;

        font-size: 14px;
        font-weight: 700;
    }

    .profile-form-description {
        margin: 3px 0 0;

        color: #9ca3af;

        font-size: 11px;
    }

    .profile-form-body {
        padding: 24px 22px;
    }


    /* =====================================================
       FORM
    ====================================================== */

    .profile-form-label {
        display: block;

        margin-bottom: 7px;

        color: #374151;

        font-size: 11px;
        font-weight: 700;
    }

    .profile-form-control {
        min-height: 40px;

        padding: 9px 11px;

        border: 1px solid #e5e7eb;
        border-radius: 9px;

        background: #fff;
        color: #111827;

        font-size: 12px;

        box-shadow: none;

        transition: all .15s ease;
    }

    .profile-form-control::placeholder {
        color: #b0b5bd;
    }

    .profile-form-control:focus {
        border-color: #cbd5e1;

        box-shadow: 0 0 0 3px rgba(15, 23, 42, .05);
    }


    /* =====================================================
       PASSWORD SECTION
    ====================================================== */

    .password-section {
        margin-top: 26px;
        padding-top: 24px;

        border-top: 1px solid #f0f1f3;
    }

    .password-title {
        margin: 0 0 4px;

        color: #111827;

        font-size: 13px;
        font-weight: 700;
    }

    .password-description {
        margin: 0 0 18px;

        color: #9ca3af;

        font-size: 11px;
    }


    /* =====================================================
       SUBMIT
    ====================================================== */

    .profile-submit-wrapper {
        display: flex;
        justify-content: flex-end;

        margin-top: 24px;
        padding-top: 20px;

        border-top: 1px solid #f0f1f3;
    }

    .btn-profile-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 10px 15px;

        border: 0;
        border-radius: 10px;

        background: #111827;
        color: #fff;

        font-size: 11px;
        font-weight: 650;

        transition: all .18s ease;
    }

    .btn-profile-submit:hover {
        background: #000;
        color: #fff;

        transform: translateY(-1px);

        box-shadow: 0 7px 18px rgba(15, 23, 42, .12);
    }

    .btn-profile-submit i {
        font-size: 13px;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .profile-title {
            font-size: 25px;
        }

        .profile-card-body {
            padding: 25px 20px;
        }

        .profile-form-body {
            padding: 22px 18px;
        }

        .profile-submit-wrapper {
            justify-content: stretch;
        }

        .btn-profile-submit {
            width: 100%;

            justify-content: center;
        }

    }

</style>

<div class="container-fluid profile-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="profile-header">

    <div class="profile-eyebrow">

        <span></span>

        Account Management

    </div>

    <h1 class="profile-title">
        Profile
    </h1>

    <p class="profile-description">
        Kelola informasi akun dan keamanan password Anda.
    </p>

</div>


{{-- =====================================================
     ALERT SUCCESS
====================================================== --}}

@if(session('success'))

    <div
        class="alert alert-success profile-alert alert-dismissible fade show mb-4"
        role="alert"
    >

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
        ></button>

    </div>

@endif


{{-- =====================================================
     VALIDATION ERROR
====================================================== --}}

@if($errors->any())

    <div
        class="alert alert-danger profile-alert mb-4"
        role="alert"
    >

        <i class="bi bi-exclamation-triangle-fill"></i>

        <div>

            <div class="fw-semibold mb-1">
                Terdapat beberapa kesalahan:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    </div>

@endif


<div class="row g-4">


    {{-- =================================================
         PROFILE CARD
    ================================================== --}}

    <div class="col-lg-4">

        <div class="profile-card h-100">

            <div class="profile-card-body">


                {{-- AVATAR --}}

                <div class="profile-avatar">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                {{-- NAME --}}

                <div class="text-center">

                    <h2 class="profile-name">

                        {{ $user->name }}

                    </h2>


                    {{-- EMAIL --}}

                    <p class="profile-email">

                        {{ $user->email }}

                    </p>


                    {{-- ROLE --}}

                    @if($user->hasRole('owner'))

                        <span class="profile-role">

                            <i class="bi bi-shield-check"></i>

                            Owner

                        </span>

                    @elseif($user->hasRole('superadmin'))

                        <span class="profile-role">

                            <i class="bi bi-shield-check"></i>

                            Super Admin

                        </span>

                    @else

                        <span class="profile-role">

                            <i class="bi bi-person"></i>

                            User

                        </span>

                    @endif

                </div>


                <hr class="profile-divider">


                {{-- WHATSAPP --}}

                <div class="profile-meta">

                    <span class="profile-meta-label">

                        WhatsApp

                    </span>

                    <span class="profile-meta-value">

                        {{ $user->whatsapp ?? '—' }}

                    </span>

                </div>


                {{-- REFERRAL --}}

                <div class="profile-meta">

                    <span class="profile-meta-label">

                        Kode Referral

                    </span>

                    <div class="referral-wrapper">

                        <span class="referral-code">

                            {{ $user->referral_code ?? '—' }}

                        </span>

                        @if($user->referral_code)

                            <button
                                type="button"
                                class="btn-copy-referral"
                                onclick="copyReferral()"
                                title="Salin kode referral"
                            >

                                <i class="bi bi-copy"></i>

                                Salin

                            </button>

                        @endif

                    </div>

                </div>


            </div>

        </div>

    </div>


    {{-- =================================================
         FORM PROFILE
    ================================================== --}}

    <div class="col-lg-8">

        <div class="profile-form-card">


            {{-- FORM HEADER --}}

            <div class="profile-form-header">

                <div class="profile-form-icon">

                    <i class="bi bi-person-gear"></i>

                </div>

                <div>

                    <h2 class="profile-form-title">

                        Informasi Profile

                    </h2>

                    <p class="profile-form-description">

                        Perbarui informasi akun Anda.

                    </p>

                </div>

            </div>


            {{-- FORM BODY --}}

            <div class="profile-form-body">

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
                            class="profile-form-label"
                        >

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control profile-form-control"
                            value="{{ old('name', $user->name) }}"
                            required
                        >

                    </div>


                    {{-- EMAIL --}}

                    <div class="mb-3">

                        <label
                            for="email"
                            class="profile-form-label"
                        >

                            Email

                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control profile-form-control"
                            value="{{ old('email', $user->email) }}"
                            required
                        >

                    </div>


                    {{-- WHATSAPP --}}

                    <div class="mb-3">

                        <label
                            for="whatsapp"
                            class="profile-form-label"
                        >

                            WhatsApp

                        </label>

                        <input
                            type="text"
                            id="whatsapp"
                            name="whatsapp"
                            class="form-control profile-form-control"
                            value="{{ old('whatsapp', $user->whatsapp) }}"
                            required
                        >

                    </div>


                    {{-- PASSWORD SECTION --}}

                    <div class="password-section">

                        <h3 class="password-title">

                            Ubah Password

                        </h3>

                        <p class="password-description">

                            Kosongkan jika tidak ingin mengubah password.

                        </p>


                        <div class="row g-3">


                            {{-- NEW PASSWORD --}}

                            <div class="col-md-6">

                                <label
                                    for="password"
                                    class="profile-form-label"
                                >

                                    Password Baru

                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control profile-form-control"
                                    placeholder="Minimal 8 karakter"
                                >

                            </div>


                            {{-- CONFIRM PASSWORD --}}

                            <div class="col-md-6">

                                <label
                                    for="password_confirmation"
                                    class="profile-form-label"
                                >

                                    Konfirmasi Password

                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control profile-form-control"
                                    placeholder="Ulangi password"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- SUBMIT --}}

                    <div class="profile-submit-wrapper">

                        <button
                            type="submit"
                            class="btn-profile-submit"
                        >

                            <i class="bi bi-check2"></i>

                            Simpan Perubahan

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>


</div>


</div>

{{-- =====================================================
COPY REFERRAL
====================================================== --}}

<script>

function copyReferral()
{
    const referral = @json($user->referral_code);

    navigator.clipboard.writeText(referral)
        .then(function () {

            alert('Kode referral berhasil disalin.');

        });
}

</script>

{{-- =====================================================
BOOTSTRAP ICONS
====================================================== --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection
