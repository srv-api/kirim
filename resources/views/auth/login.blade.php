<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link
    rel="icon"
    type="image/x-icon"
    href="{{ asset('logo.png') }}"
>
    <title>Testhink - Masuk</title>

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
            rgba(0, 0, 0, .75)
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
           LOGO Y
        ========================= */

        .brand {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffde59;
            color: #000000;

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

        .login-card {
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            margin-bottom: 35px;
        }

        .login-header h2 {
            font-size: 32px;
            font-weight: 600;

            letter-spacing: -1.5px;

            margin-bottom: 9px;
        }

        .login-header p {
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
           FORM
        ========================= */

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;

            margin-bottom: 9px;

            font-size: 13px;
            font-weight: 500;

            color: #222;
        }

        .input-wrapper {
            position: relative;
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

        .password-input {
            padding-right: 65px;
        }

        /* =========================
           SHOW PASSWORD
        ========================= */

        .toggle-password {
            position: absolute;

            top: 50%;
            right: 14px;

            transform: translateY(-50%);

            border: 0;

            background: transparent;

            color: #777;

            font-family: inherit;
            font-size: 12px;
            font-weight: 500;

            cursor: pointer;
        }

        .toggle-password:hover {
            color: #111;
        }

        .field-error {
            margin-top: 7px;

            color: #c62828;

            font-size: 12px;
        }

        /* =========================
           OPSI
        ========================= */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 4px 0 25px;
        }

        .remember {
            display: flex;
            align-items: center;

            gap: 8px;

            color: #666;

            font-size: 12px;

            cursor: pointer;
        }

        .remember input {
            width: 15px;
            height: 15px;

            cursor: pointer;

            accent-color: #111;
        }

        .forgot {
            color: #111;

            font-size: 12px;
            font-weight: 500;

            text-decoration: none;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        /* =========================
           TOMBOL
        ========================= */

        .login-button {
            width: 100%;
            height: 52px;

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

        .login-button:hover {
            background: #292929;

            transform: translateY(-1px);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .register-link {
    margin-top: 20px;
    text-align: center;

    font-size: 13px;
    color: #777;
}

.register-link a {
    color: #000;
    font-weight: 600;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

        /* =========================
           FOOTER
        ========================= */

        .login-footer {
            margin-top: 30px;

            text-align: center;

            color: #aaa;

            font-size: 11px;
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

            .login-header h2 {
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
                Masuk untuk melanjutkan ke dashboard
                dan mengelola semuanya dalam satu tempat.
            </p>

        </div>

    </section>


    {{-- =========================
         BAGIAN KANAN
    ========================== --}}

    <section class="right">

        <div class="login-card">

            <div class="login-header">

                <h2>Masuk</h2>
            </div>


            {{-- PESAN ERROR SESSION --}}

            @if(session('error'))

                <div class="alert">
                    {{ session('error') }}
                </div>

            @endif


            {{-- PESAN VALIDASI --}}

            @if($errors->any())

                <div class="alert">
                    {{ $errors->first() }}
                </div>

            @endif


            {{-- FORM LOGIN --}}

            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


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
                        autofocus
                        required
                    >

                    @error('email')

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

                    <div class="input-wrapper">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control password-input"
                            placeholder="Masukkan kata sandi"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                        >
                            Tampilkan
                        </button>

                    </div>

                    @error('password')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- OPSI --}}

                <div class="form-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if(Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >
                            Lupa kata sandi?
                        </a>

                    @endif

                </div>


                {{-- TOMBOL LOGIN --}}

                <button
                    type="submit"
                    class="login-button"
                >
                    Masuk
                </button>

            </form>
            <div class="register-link">
            Belum punya akun?
            <a href="{{ route('register') }}">
                Daftar
            </a>
        </div>


            <div class="login-footer">
                © {{ date('Y') }} Hak cipta dilindungi.
            </div>

        </div>

    </section>

</div>


<script>

    const passwordInput =
        document.getElementById('password');

    const togglePassword =
        document.getElementById('togglePassword');


    togglePassword.addEventListener('click', function () {

        const isPassword =
            passwordInput.type === 'password';


        passwordInput.type =
            isPassword ? 'text' : 'password';


        togglePassword.textContent =
            isPassword ? 'Sembunyikan' : 'Tampilkan';

    });

</script>

</body>

</html>