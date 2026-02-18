<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar — SPK Wisata Sumba Barat</title>

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
                    rgba(10, 40, 60, 0.20) 0%,
                    rgba(10, 40, 60, 0.70) 55%,
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

        .steps-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .step-num {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(251,191,36,0.2);
            border: 1.5px solid rgba(251,191,36,0.5);
            color: #fbbf24;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .step-text {
            padding-top: 5px;
        }

        .step-text strong {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 2px;
        }

        .step-text span {
            font-size: 12px;
            color: rgba(255,255,255,0.6);
        }

        /* ── RIGHT PANEL ── */
        .login-right {
            width: 480px;
            flex-shrink: 0;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 44px;
            position: relative;
            box-shadow: -8px 0 40px rgba(0,0,0,0.08);
            overflow-y: auto;
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 32px;
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
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
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

        .input-wrap .toggle-pw {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #94a3b8;
            cursor: pointer;
            pointer-events: all;
            transition: color 0.15s;
        }

        .input-wrap .toggle-pw:hover { color: #6366f1; }

        .input-wrap input.has-toggle {
            padding-right: 42px;
        }

        .invalid-msg {
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
        }

        /* Password strength */
        .pw-strength-wrap {
            margin-top: 8px;
        }

        .pw-strength-bars {
            display: flex;
            gap: 4px;
            margin-bottom: 4px;
        }

        .pw-bar {
            flex: 1;
            height: 4px;
            border-radius: 99px;
            background: #e2e8f0;
            transition: background 0.3s;
        }

        .pw-bar.weak   { background: #ef4444; }
        .pw-bar.medium { background: #f59e0b; }
        .pw-bar.strong { background: #22c55e; }

        .pw-strength-label {
            font-size: 11px;
            color: #94a3b8;
            font-weight: 500;
        }

        .btn-register {
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
            margin-top: 4px;
        }

        .btn-register:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99,102,241,0.4);
        }

        .btn-register:active { transform: translateY(0); }

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

        .login-link-row {
            text-align: center;
            font-size: 13px;
            color: #64748b;
        }

        .login-link-row a {
            color: #6366f1;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link-row a:hover { text-decoration: underline; }

        .login-footer {
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
            text-align: center;
        }

        .login-footer p {
            font-size: 12px;
            color: #94a3b8;
        }

        .login-footer strong { color: #6366f1; }

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

        .terms-note {
            font-size: 11.5px;
            color: #94a3b8;
            text-align: center;
            margin-top: 12px;
            line-height: 1.6;
        }

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
                Bergabung &amp; Mulai<br>
                Jelajahi <em>Wisata Sumba</em>
            </h1>
            <p class="login-left-desc">
                Daftarkan akun Anda untuk mengakses sistem rekomendasi wisata berbasis
                <strong style="color:#fbbf24;">Simple Additive Weighting (SAW)</strong>
                dan temukan destinasi terbaik di Kabupaten Sumba Barat.
            </p>
            <div class="steps-list">
                <div class="step-item">
                    <div class="step-num">1</div>
                    <div class="step-text">
                        <strong>Buat Akun</strong>
                        <span>Isi data diri dan buat password yang aman</span>
                    </div>
                </div>
                <div class="step-item">
                    <div class="step-num">2</div>
                    <div class="step-text">
                        <strong>Masuk ke Sistem</strong>
                        <span>Login menggunakan email dan password Anda</span>
                    </div>
                </div>
                <div class="step-item">
                    <div class="step-num">3</div>
                    <div class="step-text">
                        <strong>Lihat Rekomendasi</strong>
                        <span>Dapatkan rekomendasi wisata terbaik berbasis SAW</span>
                    </div>
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

        <h2 class="login-heading">Buat Akun Baru ✨</h2>
        <p class="login-subheading">Lengkapi data di bawah untuk mendaftar ke sistem</p>

        @if ($errors->any())
            <div class="alert-error">
                <iconify-icon icon="solar:danger-circle-bold-duotone" style="font-size:18px;flex-shrink:0;"></iconify-icon>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <div class="input-wrap">
                    <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Nama lengkap Anda"
                        class="{{ $errors->has('nama') ? 'is-invalid' : '' }}"
                        required
                        autofocus
                        autocomplete="name"
                    >
                </div>
                @error('nama')
                    <div class="invalid-msg">{{ $message }}</div>
                @enderror
            </div>

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
                        placeholder="email@example.com"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        required
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
                        placeholder="Minimal 8 karakter"
                        class="has-toggle {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        required
                        autocomplete="new-password"
                        oninput="checkStrength(this.value)"
                    >
                    <iconify-icon icon="solar:eye-bold-duotone" class="toggle-pw" onclick="togglePw('password', this)"></iconify-icon>
                </div>
                <div class="pw-strength-wrap" id="strengthWrap" style="display:none;">
                    <div class="pw-strength-bars">
                        <div class="pw-bar" id="bar1"></div>
                        <div class="pw-bar" id="bar2"></div>
                        <div class="pw-bar" id="bar3"></div>
                        <div class="pw-bar" id="bar4"></div>
                    </div>
                    <div class="pw-strength-label" id="strengthLabel"></div>
                </div>
                @error('password')
                    <div class="invalid-msg">{{ $message }}</div>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="input-wrap">
                    <iconify-icon icon="solar:shield-check-bold-duotone"></iconify-icon>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password Anda"
                        class="has-toggle {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                        required
                        autocomplete="new-password"
                    >
                    <iconify-icon icon="solar:eye-bold-duotone" class="toggle-pw" onclick="togglePw('password_confirmation', this)"></iconify-icon>
                </div>
                @error('password_confirmation')
                    <div class="invalid-msg">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-register">
                <iconify-icon icon="solar:user-plus-bold-duotone" style="font-size:20px;"></iconify-icon>
                Daftar Sekarang
            </button>

            <p class="terms-note">
                Dengan mendaftar, Anda menyetujui penggunaan data untuk keperluan sistem rekomendasi wisata.
            </p>
        </form>

        <div class="divider">atau</div>

        <div class="login-link-row">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk di sini</a>
        </div>

        <div class="login-footer">
            <p>© {{ date('Y') }} <strong>SPK Wisata Sumba Barat</strong>. All rights reserved.</p>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script>
        function togglePw(id, icon) {
            const input = document.getElementById(id);
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            icon.setAttribute('icon', isHidden ? 'solar:eye-closed-bold-duotone' : 'solar:eye-bold-duotone');
        }

        function checkStrength(val) {
            const wrap = document.getElementById('strengthWrap');
            const label = document.getElementById('strengthLabel');
            const bars = [
                document.getElementById('bar1'),
                document.getElementById('bar2'),
                document.getElementById('bar3'),
                document.getElementById('bar4'),
            ];

            bars.forEach(b => b.className = 'pw-bar');

            if (!val) { wrap.style.display = 'none'; return; }
            wrap.style.display = 'block';

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const cls = score <= 1 ? 'weak' : score <= 2 ? 'medium' : 'strong';
            const lbl = score <= 1 ? '⚠ Lemah' : score <= 2 ? '~ Sedang' : '✓ Kuat';
            const col = score <= 1 ? '#ef4444' : score <= 2 ? '#f59e0b' : '#22c55e';

            for (let i = 0; i < score; i++) bars[i].classList.add(cls);
            label.textContent = lbl;
            label.style.color = col;
        }
    </script>
</body>

</html>
