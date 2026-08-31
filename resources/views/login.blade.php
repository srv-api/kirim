<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * { box-sizing: border-box; margin:0; padding:0; font-family: Arial,sans-serif; }

        body, html { height: 100%; }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* sisi kiri gambar */
        .left {
            flex: 1;
            background-image: url('{{ asset("images/login-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .left::before {
            content:"";
            position:absolute;
            top:0; left:0; right:0; bottom:0;
            background: rgba(0,0,0,0.5); /* overlay */
        }

        .left-content {
            position: relative;
            text-align: center;
            z-index: 1;
            padding: 20px;
        }

        .left-content h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .left-content p {
            font-size: 18px;
        }

        /* sisi kanan form */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .login-card {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .login-card label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .login-card input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .login-card button {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #3490dc;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-card button:hover {
            background-color: #2779bd;
        }

        .login-card .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        .login-card p {
            text-align: center;
            color: #888;
            margin-top: 15px;
        }

        /* responsive */
        @media(max-width: 768px) {
            .container { flex-direction: column; }
            .left { height: 250px; }
            .right { flex: none; padding: 20px; }
        }
    </style>
</head>

<body>
<div class="container">
    <div class="left">
        <div class="left-content">
            <h1>Welcome Back!</h1>
            <p>Sign in to access your dashboard</p>
        </div>
    </div>

    <div class="right">
        <div class="login-card">
            <h2>Login</h2>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
