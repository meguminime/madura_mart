<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Madura Mart</title>
    <link rel="icon" type="image/png" href="{{ asset('be/assets/img/Morgana-removebg-preview.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Soft UI Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('be/assets/css/soft-ui-dashboard.css') }}">

    <style>
        /* ── Root: matched to dashboard palette (purple/magenta gradient) ── */
        :root {
            --brand-gradient: linear-gradient(195deg, #7928CA 0%, #FF0080 100%);
            --brand-purple:   #7928CA;
            --brand-pink:     #FF0080;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            margin: 0;
            background: #f8f9fa;
            display: flex;
            align-items: stretch;
        }

        /* ─────────── Split layout ─────────── */
        .lw { display: flex; width: 100%; min-height: 100vh; }

        /* LEFT — gradient brand panel */
        .brand-panel {
            width: 42%;
            background: var(--brand-gradient);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2.5rem;
            position: relative;
            overflow: hidden;
        }
        .brand-panel::before,
        .brand-panel::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }
        .brand-panel::before { width: 440px; height: 440px; top: -130px; right: -170px; }
        .brand-panel::after  { width: 300px; height: 300px; bottom: -90px; left: -110px; }

        .brand-inner { position: relative; z-index: 1; text-align: center; }

        .brand-logo {
            width: 76px; height: 76px;
            background: rgba(255,255,255,0.18);
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem;
            border: 1.5px solid rgba(255,255,255,0.28);
            backdrop-filter: blur(8px);
        }
        .brand-logo svg { width: 40px; height: 40px; fill: #fff; }

        .brand-title {
            font-size: 2rem; font-weight: 700; color: #fff;
            letter-spacing: -0.02em; margin: 0 0 .5rem;
        }
        .brand-sub {
            font-size: .975rem; color: rgba(255,255,255,0.72);
            margin: 0; line-height: 1.65;
        }

        /* Stat bubbles — decorative, echoes dashboard stat cards */
        .bubbles { display: flex; flex-wrap: wrap; justify-content: center; margin-top: 2.5rem; gap: .5rem; }
        .bubble {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255,255,255,0.13);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 14px;
            padding: .55rem 1rem;
            backdrop-filter: blur(6px);
        }
        .bubble-icon {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.2);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
        }
        .bubble-icon svg { width: 17px; height: 17px; fill: #fff; }
        .bubble-label { font-size: .73rem; color: rgba(255,255,255,0.65); margin-bottom: 1px; }
        .bubble-val   { font-size: .9rem;  font-weight: 700; color: #fff; }

        /* RIGHT — form panel */
        .form-panel {
            flex: 1;
            display: flex; align-items: center; justify-content: center;
            padding: 2.5rem 2rem;
            background: #f8f9fa;
        }

        .login-card {
            width: 100%; max-width: 420px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.08), 0 4px 16px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        /* Gradient accent strip at top of card — matches dashboard header */
        .card-accent { height: 5px; background: var(--brand-gradient); }

        .card-body  { padding: 2.25rem 2rem 1.75rem; }

        /* Breadcrumb — mirrors "Pages / Dashboard" in the dashboard header */
        .crumb      { font-size: .75rem; color: #9aa0ac; font-weight: 500; margin: 0 0 .2rem; }
        .crumb span { color: #344767; }

        .card-title {
            font-size: 1.4rem; font-weight: 700; color: #344767;
            letter-spacing: -0.015em; margin: 0 0 1.75rem;
        }

        /* Form fields */
        .fgroup { margin-bottom: 1.1rem; }
        .flabel {
            display: block;
            font-size: .72rem; font-weight: 700;
            color: #344767;
            letter-spacing: .05em; text-transform: uppercase;
            margin-bottom: .35rem;
        }
        .finput {
            display: block; width: 100%;
            padding: .72rem 1rem;
            font-size: .875rem; font-family: 'Plus Jakarta Sans', sans-serif;
            color: #344767;
            background: #f8f9fa;
            border: 1.5px solid #e9ecef;
            border-radius: 10px;
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .finput::placeholder { color: #adb5bd; }
        .finput:focus {
            background: #fff;
            border-color: var(--brand-purple);
            box-shadow: 0 0 0 3px rgba(121,40,202,.12);
        }
        .finput.is-invalid {
            border-color: #ea0606;
            box-shadow: 0 0 0 3px rgba(234,6,6,.1);
        }

        /* Error alert */
        .err-alert {
            display: flex; gap: .75rem; align-items: flex-start;
            background: #fff5f5;
            border: 1px solid #feb2b2;
            border-left: 4px solid #ea0606;
            border-radius: 10px;
            padding: .85rem 1rem;
            margin-bottom: 1.25rem;
        }
        .err-icon { flex-shrink: 0; margin-top: 1px; }
        .err-icon svg { width: 15px; height: 15px; fill: #ea0606; }
        .err-title { font-size: .78rem; font-weight: 700; color: #c53030; margin-bottom: .25rem; }
        .err-list   { list-style: none; padding: 0; margin: 0; }
        .err-list li { font-size: .78rem; color: #c53030; line-height: 1.55; }
        .err-list li::before { content: '• '; }

        /* Submit button */
        .btn-submit {
            display: block; width: 100%;
            padding: .875rem 1.5rem;
            background: var(--brand-gradient);
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .9rem; font-weight: 700;
            letter-spacing: .02em;
            border: none; border-radius: 10px;
            cursor: pointer;
            margin-top: 1.75rem;
            transition: transform .18s, box-shadow .18s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(121,40,202,.38);
        }
        .btn-submit:active { transform: translateY(0); box-shadow: none; }

        /* Card footer */
        .card-foot {
            text-align: center;
            font-size: .76rem; color: #9aa0ac;
            padding: 1rem 2rem 1.5rem;
            border-top: 1px solid #f0f0f0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .brand-panel { display: none; }
        }
    </style>
</head>

<body>
<div class="lw">

    {{-- ═══════ LEFT · Brand Panel ═══════ --}}
    <div class="brand-panel">
        <div class="brand-inner">

            <div class="brand-logo">
                {{-- Logo Madura Mart (Morgana) --}}
                <img
                    src="{{ asset('be/assets/img/Morgana-removebg-preview.png') }}"
                    alt="Madura Mart"
                    style="width: 56px; height: 56px; object-fit: contain; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.18));">
            </div>

            <h1 class="brand-title">Madura Mart</h1>
            <p class="brand-sub">Platform manajemen distribusi<br>dan penjualan terpadu</p>

            {{-- Decorative stat bubbles — echoes the dashboard stat cards --}}
            <div class="bubbles">
                <div class="bubble">
                    <div class="bubble-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="bubble-label">Clients</div>
                        <div class="bubble-val">+3,462</div>
                    </div>
                </div>
                <div class="bubble">
                    <div class="bubble-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="bubble-label">Sales</div>
                        <div class="bubble-val">$103,430</div>
                    </div>
                </div>
                <div class="bubble">
                    <div class="bubble-icon">
                        <img src="{{ asset('be/assets/img/Morgana-removebg-preview.png') }}"
                             alt="Madura Mart"
                             style="width:20px;height:20px;object-fit:contain;filter:brightness(0) invert(1);">
                    </div>
                    <div>
                        <div class="bubble-label">Products</div>
                        <div class="bubble-val">36K</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ═══════ RIGHT · Form Panel ═══════ --}}
    <div class="form-panel">
        <div class="login-card">

            <div class="card-accent"></div>

            <div class="card-body">

                {{-- Breadcrumb mirrors "Pages / Dashboard" in the dashboard header --}}
                <p class="crumb">Pages / <span>Sign In</span></p>
                <h2 class="card-title">Sign In</h2>

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="err-alert" role="alert">
                        <div class="err-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="err-title">Terjadi kesalahan</div>
                            <ul class="err-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Login Form — DO NOT alter name, action, method, or @csrf --}}
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="fgroup">
                        <label for="email" class="flabel">Email Address</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="finput @error('email') is-invalid @enderror"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus>
                    </div>

                    <div class="fgroup">
                        <label for="password" class="flabel">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="finput @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            required>
                    </div>

                    <button type="submit" class="btn-submit">Sign In</button>

                </form>

            </div>

            <div class="card-foot">
                &copy; {{ date('Y') }} <strong>Madura Mart</strong>. All rights reserved.
            </div>

        </div>
    </div>

</div>

<script src="{{ asset('be/assets/js/core/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('be/assets/js/soft-ui-dashboard.min.js') }}"></script>
</body>
</html>