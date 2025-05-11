<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Member - Univers Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            color: #004AAD;
            margin-bottom: 24px;
            text-align: center;
            font-size: 28px;
            font-weight: 700;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: border-color 0.2s;
        }
        input:focus {
            border-color: #004AAD;
            outline: none;
        }
        .btn-submit {
            background-color: #004AAD;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #003080;
        }
        .login-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
        }
        .login-link a {
            color: #004AAD;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Registrasi Member</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">No. Telepon</label>
        <input type="text" id="phone" name="phone" required>

        <label for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit" class="btn-submit">Daftar Sekarang</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
    </div>
</div>

</body>
</html>
