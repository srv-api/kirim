<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #fff;
            color: #111;
        }

        .container {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           KIRI
        ========================= */

        .left {
            width: 50%;
            min-height: 100vh;

            position: relative;

            display: flex;
            align-items: flex-end;

            padding: 60px;

            color: #fff;

            background:
                linear-gradient(
                    135deg,
                    rgba(0, 0, 0, .35),
                    rgba(0, 0, 0, .78)
                ),
                url('{{ asset('images/berandalogin.png') }}');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .left-content {
            position: relative;
            z-index: 2;

            max-width: 500px;
        }

        /* =========================
           LOGO
        ========================= */

        .brand {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffde59;
            color: #000;

            border-radius: 50%;

            font-size: 22px;
            font-weight: 800;

            line-height: 1;

            margin-bottom: 30px;
        }

        .left h1 {
            font-size: clamp(42px, 5vw, 64px);
            line-height: 1;

            font-weight: 600;

            letter-spacing: -3px;

            margin-bottom: 20px;
        }

        .left p {
            max-width: 420px;

            font-size: 14px;
            line-height: 1.8;

            color: rgba(255, 255, 255, .72);
        }

        /* =========================
           KANAN
        ========================= */

        .right {
            width: 50%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
        }

        .register-card {
            width: 100%;
            max-width: 520px;
        }

        .register-header {
            margin-bottom: 30px;
        }

        .register-header h2 {
            font-size: 32px;
            font-weight: 600;

            letter-spacing: -1.5px;

            margin-bottom: 9px;
        }

        .register-header p {
            color: #777;
            font-size: 14px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 13px 15px;

            margin-bottom: 22px;

            border-left: 3px solid #111;

            background: #f7f7f7;

            color: #333;

            font-size: 13px;

            border-radius: 4px;
        }

        /* =========================
           FORM GRID
        ========================= */

        .register-form {
            display: grid;

            grid-template-columns: 1fr 1fr;

            column-gap: 16px;
            row-gap: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            margin-bottom: 9px;

            font-size: 13px;
            font-weight: 500;

            color: #222;
        }

        .form-control {
            width: 100%;
            height: 52px;

            padding: 0 15px;

            border: 1px solid #dedede;
            border-radius: 8px;

            outline: none;

            background: #fff;
            color: #111;

            font-family: inherit;
            font-size: 14px;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-control:focus {
            border-color: #111;

            box-shadow:
                0 0 0 3px rgba(0, 0, 0, .06);
        }

        .field-error {
            margin-top: 7px;

            color: #c62828;

            font-size: 12px;
        }

        /* =========================
           BUTTON
        ========================= */

        .register-button {
            grid-column: 1 / -1;

            width: 100%;
            height: 52px;

            margin-top: 4px;

            border: none;
            border-radius: 8px;

            background: #111;
            color: #fff;

            font-family: inherit;
            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            transition:
                background .2s ease,
                transform .2s ease;
        }

        .register-button:hover {
            background: #292929;

            transform: translateY(-1px);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* =========================
           LOGIN LINK
        ========================= */

        .login-link {
            margin-top: 22px;

            text-align: center;

            font-size: 12px;

            color: #777;
        }

        .login-link a {
            color: #111;

            font-weight: 600;

            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* =========================
           FOOTER
        ========================= */

        .register-footer {
            margin-top: 25px;

            text-align: center;

            color: #aaa;

            font-size: 11px;
        }

        .optional {
    color: #999;
    font-size: 11px;
    font-weight: 400;
    margin-left: 4px;
}

.referral-group {
    grid-column: 1 / -1;
}

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {

            .container {
                flex-direction: column;
            }

            .left {
                width: 100%;
                min-height: 300px;

                padding: 35px 28px;
            }

            .left h1 {
                font-size: 40px;
                letter-spacing: -2px;
            }

            .left p {
                font-size: 13px;
            }

            .brand {
                width: 42px;
                height: 42px;

                margin-bottom: 22px;
            }

            .right {
                width: 100%;
                min-height: auto;

                padding: 45px 25px 35px;
            }

            .register-card {
                max-width: 520px;
            }
        }

        @media (max-width: 600px) {

            .register-form {
                grid-template-columns: 1fr;
            }

            .register-button {
                grid-column: auto;
            }
        }

        @media (max-width: 480px) {

            .left {
                min-height: 250px;

                padding: 28px 22px;
            }

            .left h1 {
                font-size: 34px;
            }

            .right {
                padding: 38px 22px;
            }

            .register-header h2 {
                font-size: 28px;
            }
        }
    </style>

</head>

<body>

<div class="container">

    {{-- =========================
         BAGIAN KIRI
    ========================== --}}

    <section class="left">

        <div class="left-content">

            <div class="brand">
                T
            </div>

            <h1>
                Think Beyond.
            </h1>

            <p>
                Daftarkan akun Anda untuk mulai menggunakan
                Testhink Dashboard dan mengelola semuanya dalam satu tempat.
            </p>

        </div>

    </section>


    {{-- =========================
         BAGIAN KANAN
    ========================== --}}

    <section class="right">

        <div class="register-card">

            <div class="register-header">

                <h2>Daftar</h2>

                <p>
                    Buat akun baru untuk melanjutkan.
                </p>

            </div>


            {{-- ERROR --}}

            @if($errors->any())

                <div class="alert">
                    {{ $errors->first() }}
                </div>

            @endif


            {{-- FORM DAFTAR --}}

            <form
                method="POST"
                action="{{ route('register.store') }}"
                class="register-form"
            >

                @csrf


                {{-- NAMA LENGKAP --}}

                <div class="form-group">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Nama lengkap"
                        autocomplete="name"
                        required
                    >

                    @error('name')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        required
                    >

                    @error('email')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- NO WHATSAPP --}}

                <div class="form-group">

                    <label for="whatsapp">
                        No. WhatsApp
                    </label>

                    <input
                        type="tel"
                        id="whatsapp"
                        name="whatsapp"
                        class="form-control"
                        value="{{ old('whatsapp') }}"
                        placeholder="08xxxxxxxxxx"
                        autocomplete="tel"
                        required
                    >

                    @error('whatsapp')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label for="password">
                        Kata Sandi
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan kata sandi"
                        autocomplete="new-password"
                        required
                    >

                    @error('password')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                {{-- KODE REFERRAL --}}

<div class="form-group referral-group">

    <label for="referral_code">
        Kode Referral
        <span class="optional">(Opsional)</span>
    </label>

    <input
        type="text"
        id="referral_code"
        name="referral_code"
        class="form-control"
        value="{{ old('referral_code', request('ref')) }}"
        placeholder="Masukkan kode referral"
        autocomplete="off"
    >

    @error('referral_code')

        <div class="field-error">
            {{ $message }}
        </div>

    @enderror

</div>


                {{-- BUTTON --}}

                <button
                    type="submit"
                    class="register-button"
                >
                    Daftar
                </button>

            </form>


            {{-- LOGIN --}}

            <div class="login-link">

                Sudah memiliki akun?

                <a href="{{ route('login') }}">
                    Masuk
                </a>

            </div>


            <div class="register-footer">
                © {{ date('Y') }} Hak cipta dilindungi.
            </div>

        </div>

    </section>

</div>

</body>

</html>