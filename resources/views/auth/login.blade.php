<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Madura Mart</title>
    <style>
        body { font-family: ui-sans-serif, system-ui, sans-serif; background: #FDFDFC; color: #1B1B18; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .card { width: 100%; max-width: 420px; padding: 32px; border-radius: 16px; background: white; box-shadow: 0 20px 40px rgba(0,0,0,.05); }
        h1 { margin: 0 0 16px; font-size: 1.75rem; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input { width: 100%; padding: 12px 14px; margin-bottom: 18px; border: 1px solid #D9D9D4; border-radius: 10px; font-size: 0.95rem; }
        button { width: 100%; padding: 12px 14px; border: none; border-radius: 10px; background: #F53003; color: white; font-weight: 700; cursor: pointer; }
        .link { display: block; margin-top: 14px; text-align: center; color: #1B1B18; text-decoration: none; }
        .error { margin-bottom: 18px; color: #B91C1C; font-size: 0.95rem; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Sign In</h1>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>

            <button type="submit">Sign In</button>
        </form>

        <a class="link" href="/">Kembali ke halaman utama</a>
    </div>
</body>
</html>
