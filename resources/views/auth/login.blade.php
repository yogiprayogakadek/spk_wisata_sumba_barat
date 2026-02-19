<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login — SPK Wisata Sumba Barat</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/styles.css') }}" />
    <script src="{{ asset('assets/backend/js/vendor.min.js') }}"></script>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f0f4f8;
        }

        /* ── LEFT PANEL ── */
        .login-left {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 48px;
            overflow: hidden;
            min-height: 100vh;
        }

        .login-left-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    to bottom,
                    rgba(10, 40, 60, 0.25) 0%,
                    rgba(10, 40, 60, 0.75) 60%,
                    rgba(5, 20, 35, 0.92) 100%
                ),
                url('https://images.unsplash.com/photo-1596402184320-417e7178b2cd?w=1200&q=80') center/cover no-repeat;
        }

        .login-left-content {
            position: relative;
            z-index: 2;
            color: #fff;
        }

        .spk-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 99px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #fff;
            margin-bottom: 20px;
        }

        .spk-badge span {
            width: 6px;
            height: 6px;
            background: #4ade80;
            border-radius: 50%;
            display: inline-block;
        }

        .login-left-title {
            font-size: clamp(26px, 3vw, 38px);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 14px;
            color: #fff;
        }

        .login-left-title em {
            font-style: normal;
            color: #fbbf24;
        }

        .login-left-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.75);
            line-height: 1.7;
            max-width: 420px;
            margin-bottom: 32px;
        }

        .wisata-stats {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .wisata-stat-item {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 14px;
            padding: 14px 20px;
            text-align: center;
            min-width: 100px;
        }

        .wisata-stat-item .stat-num {
            font-size: 22px;
            font-weight: 800;
            color: #fbbf24;
            line-height: 1;
        }

        .wisata-stat-item .stat-lbl {
            font-size: 11px;
            color: rgba(255,255,255,0.7);
            margin-top: 4px;
            font-weight: 500;
        }

        /* ── RIGHT PANEL ── */
        .login-right {
            width: 460px;
            flex-shrink: 0;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 44px;
            position: relative;
            box-shadow: -8px 0 40px rgba(0,0,0,0.08);
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 36px;
        }

        .login-logo img {
            height: 38px;
            width: auto;
        }

        .login-logo-text {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.2;
        }

        .login-logo-text small {
            display: block;
            font-size: 11px;
            font-weight: 500;
            color: #64748b;
        }

        .login-heading {
            font-size: 24px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .login-subheading {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap iconify-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #94a3b8;
            pointer-events: none;
        }

        .input-wrap input {
            width: 100%;
            padding: 11px 14px 11px 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            color: #1e293b;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        .input-wrap input:focus {
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }

        .input-wrap input.is-invalid {
            border-color: #ef4444;
        }

        .invalid-msg {
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
        }

        .register-link-row {
            text-align: center;
            font-size: 13px;
            color: #64748b;
            margin-top: 16px;
        }

        .register-link-row a {
            color: #6366f1;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link-row a:hover { text-decoration: underline; }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
            color: #cbd5e1;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #f1f5f9;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(99,102,241,0.35);
        }

        .btn-login:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99,102,241,0.4);
        }

        .btn-login:active { transform: translateY(0); }

        .login-footer {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #f1f5f9;
            text-align: center;
        }

        .login-footer p {
            font-size: 12px;
            color: #94a3b8;
        }

        .login-footer strong {
            color: #6366f1;
        }

        /* Alert error */
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #dc2626;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .login-left { display: none; }
            .login-right { width: 100%; box-shadow: none; }
        }
    </style>
</head>

<body>

    {{-- LEFT PANEL --}}
    <div class="login-left">
        <div class="login-left-bg"></div>
        <div class="login-left-content">
            <div class="spk-badge">
                <span></span>
                Sistem Pendukung Keputusan
            </div>
            <h1 class="login-left-title">
                Temukan Wisata Terbaik<br>
                di <em>Sumba Barat</em>
            </h1>
            <p class="login-left-desc">
                Platform cerdas berbasis metode <strong style="color:#fbbf24;">Simple Additive Weighting (SAW)</strong>
                untuk merekomendasikan destinasi wisata terbaik di Kabupaten Sumba Barat, Nusa Tenggara Timur.
            </p>
            <div class="wisata-stats">
                <div class="wisata-stat-item">
                    <div class="stat-num">SAW</div>
                    <div class="stat-lbl">Metode</div>
                </div>
                <div class="wisata-stat-item">
                    <div class="stat-num">NTT</div>
                    <div class="stat-lbl">Provinsi</div>
                </div>
                <div class="wisata-stat-item">
                    <div class="stat-num">🏝️</div>
                    <div class="stat-lbl">Wisata Alam</div>
                </div>
                <div class="wisata-stat-item">
                    <div class="stat-num">🤝</div>
                    <div class="stat-lbl">Budaya Lokal</div>
                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="login-right">

        <div class="login-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Sumba Barat">
            <div class="login-logo-text">
                SPK Wisata
                <small>Kabupaten Sumba Barat</small>
            </div>
        </div>

        <h2 class="login-heading">Selamat Datang 👋</h2>
        <p class="login-subheading">Masuk ke panel administrasi sistem rekomendasi wisata</p>

        {{-- Error Alert --}}
        @if ($errors->any())
            <div class="alert-error">
                <iconify-icon icon="solar:danger-circle-bold-duotone" style="font-size:18px;flex-shrink:0;"></iconify-icon>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        @if (session('status'))
            <div class="alert-error" style="background:#f0fdf4;border-color:#bbf7d0;color:#16a34a;">
                <iconify-icon icon="solar:check-circle-bold-duotone" style="font-size:18px;flex-shrink:0;"></iconify-icon>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if (session('success'))
            <div class="alert-error" style="background:#f0fdf4;border-color:#bbf7d0;color:#16a34a;">
                <iconify-icon icon="solar:check-circle-bold-duotone" style="font-size:18px;flex-shrink:0;"></iconify-icon>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <div class="input-wrap">
                    <iconify-icon icon="solar:letter-bold-duotone"></iconify-icon>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@example.com"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>
                @error('email')
                    <div class="invalid-msg">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <iconify-icon icon="solar:lock-password-bold-duotone"></iconify-icon>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                        required
                        autocomplete="current-password"
                    >
                </div>
                @error('password')
                    <div class="invalid-msg">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login">
                <iconify-icon icon="solar:login-3-bold-duotone" style="font-size:20px;"></iconify-icon>
                Masuk ke Sistem
            </button>
        </form>

        <div class="divider">atau</div>

        <div class="register-link-row">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </div>

        <div class="login-footer">
            <p>© {{ date('Y') }} <strong>SPK Wisata Sumba Barat</strong>. All rights reserved.</p>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
</body>

</html>
