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

    <title>Testhink - Lupa Kata Sandi</title>

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

        .right {
            width: 50%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }

        .header {
            margin-bottom: 35px;
        }

        .header h2 {
            font-size: 32px;
            font-weight: 600;
            letter-spacing: -1.5px;
            margin-bottom: 9px;
        }

        .header p {
            color: #777;
            font-size: 14px;
            line-height: 1.7;
        }

        .alert {
            padding: 13px 15px;
            margin-bottom: 22px;

            border-left: 3px solid #111;

            background: #f7f7f7;

            color: #333;

            font-size: 13px;

            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        label {
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

        .form-control:focus {
            border-color: #111;

            box-shadow:
                0 0 0 3px rgba(0, 0, 0, .06);
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .field-error {
            margin-top: 7px;
            color: #c62828;
            font-size: 12px;
        }

        .button {
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

        .button:hover {
            background: #292929;
            transform: translateY(-1px);
        }

        .button:active {
            transform: translateY(0);
        }

        .back {
            margin-top: 20px;

            text-align: center;

            font-size: 13px;
            color: #777;
        }

        .back a {
            color: #000;
            font-weight: 600;
            text-decoration: none;
        }

        .back a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 30px;

            text-align: center;

            color: #aaa;

            font-size: 11px;
        }

        @media (max-width: 800px) {

            .container {
                flex-direction: column;
            }

            .left {
                width: 100%;
                min-height: 300px;

                padding: 35px 28px;
            }

            .right {
                width: 100%;
                min-height: auto;

                padding: 45px 25px 35px;
            }

            .left h1 {
                font-size: 40px;
                letter-spacing: -2px;
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

            .header h2 {
                font-size: 28px;
            }
        }
    </style>

</head>

<body>

<div class="container">

    <section class="left">

        <div class="left-content">

            <div class="brand">
                T
            </div>

            <h1>
                Think Beyond.
            </h1>

            <p>
                Jangan khawatir. Masukkan email akun kamu
                untuk mendapatkan tautan untuk mengatur ulang
                kata sandi.
            </p>

        </div>

    </section>


    <section class="right">

        <div class="card">

            <div class="header">

                <h2>
                    Lupa kata sandi?
                </h2>

                <p>
                    Masukkan email yang terdaftar pada akun kamu.
                    Kami akan mengirimkan link untuk membuat kata
                    sandi baru.
                </p>

            </div>


            @if(session('status'))

                <div class="alert">
                    {{ session('status') }}
                </div>

            @endif


            @if($errors->any())

                <div class="alert">
                    {{ $errors->first() }}
                </div>

            @endif


            <form
                method="POST"
                action="{{ route('password.email') }}"
            >

                @csrf

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


                <button
                    type="submit"
                    class="button"
                >
                    Kirim Link Reset
                </button>

            </form>


            <div class="back">

                <a href="{{ route('login') }}">
                    Kembali ke halaman masuk
                </a>

            </div>


            <div class="footer">
                © {{ date('Y') }} Hak cipta dilindungi.
            </div>

        </div>

    </section>

</div>

</body>

</html>