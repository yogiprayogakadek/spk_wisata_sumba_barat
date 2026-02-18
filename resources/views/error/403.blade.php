<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | SPK Wisata Sumba Barat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #8B4513;
            --primary-light: #CD853F;
            --accent: #D4A853;
            --accent-light: #F0C878;
            --dark: #1a0f00;
            --text-light: #f5ede0;
            --text-muted: #c9a87a;
        }

        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
        }

        /* Background landscape Sumba Barat */
        .bg-landscape {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at 20% 80%, rgba(139, 69, 19, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(212, 168, 83, 0.2) 0%, transparent 50%),
                linear-gradient(
                    180deg,
                    #0d1b2a 0%,
                    #1a2f4a 20%,
                    #2d4a6e 35%,
                    #3d6b8a 45%,
                    #8B6914 55%,
                    #6b4c10 65%,
                    #4a3008 80%,
                    #1a0f00 100%
                );
        }

        /* Bukit savana */
        .hills {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1;
        }

        .hill-svg {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Bintang di langit */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            z-index: 1;
            pointer-events: none;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle var(--dur, 3s) ease-in-out infinite;
            animation-delay: var(--delay, 0s);
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.3); }
        }

        /* Bulan */
        .moon {
            position: fixed;
            top: 8%;
            right: 12%;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #fff9e6, #f0c040);
            box-shadow:
                0 0 30px 10px rgba(240, 192, 64, 0.3),
                0 0 80px 30px rgba(240, 192, 64, 0.1);
            z-index: 2;
            animation: moonGlow 4s ease-in-out infinite;
        }

        @keyframes moonGlow {
            0%, 100% { box-shadow: 0 0 30px 10px rgba(240, 192, 64, 0.3), 0 0 80px 30px rgba(240, 192, 64, 0.1); }
            50% { box-shadow: 0 0 40px 15px rgba(240, 192, 64, 0.5), 0 0 100px 40px rgba(240, 192, 64, 0.2); }
        }

        /* Konten utama */
        .error-container {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 2rem;
            max-width: 680px;
            width: 100%;
        }

        .error-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(212, 168, 83, 0.15);
            border: 1px solid rgba(212, 168, 83, 0.4);
            color: var(--accent-light);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 100px;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(8px);
        }

        .error-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        .error-code {
            font-family: 'Playfair Display', serif;
            font-size: clamp(7rem, 18vw, 12rem);
            font-weight: 700;
            line-height: 1;
            background: linear-gradient(135deg, var(--accent-light) 0%, var(--accent) 40%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            text-shadow: none;
            filter: drop-shadow(0 4px 20px rgba(212, 168, 83, 0.3));
            animation: floatCode 6s ease-in-out infinite;
        }

        @keyframes floatCode {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 1rem auto 1.5rem;
            max-width: 300px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 168, 83, 0.5), transparent);
        }

        .divider-icon {
            font-size: 1.2rem;
            color: var(--accent);
        }

        .error-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.4rem, 4vw, 2rem);
            font-weight: 700;
            color: var(--text-light);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .error-description {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 0.75rem;
            font-weight: 300;
        }

        .error-description strong {
            color: var(--accent-light);
            font-weight: 500;
        }

        .sumba-quote {
            display: inline-block;
            margin: 1.25rem 0 2rem;
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.04);
            border-left: 3px solid var(--accent);
            border-radius: 0 8px 8px 0;
            text-align: left;
            backdrop-filter: blur(8px);
        }

        .sumba-quote p {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-style: italic;
            line-height: 1.7;
        }

        .sumba-quote span {
            display: block;
            margin-top: 6px;
            font-size: 0.75rem;
            color: var(--accent);
            font-style: normal;
            font-weight: 500;
            letter-spacing: 0.05em;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary-light) 100%);
            color: var(--dark);
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(212, 168, 83, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(212, 168, 83, 0.5);
            color: var(--dark);
        }

        .btn-secondary-custom {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: rgba(255, 255, 255, 0.06);
            color: var(--text-light);
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
        }

        .btn-secondary-custom:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(212, 168, 83, 0.4);
            color: var(--accent-light);
            transform: translateY(-2px);
        }

        /* Ornamen khas Sumba */
        .sumba-ornament {
            position: fixed;
            opacity: 0.06;
            z-index: 1;
            pointer-events: none;
        }

        .ornament-left {
            left: -60px;
            top: 50%;
            transform: translateY(-50%);
            width: 280px;
            height: 280px;
        }

        .ornament-right {
            right: -60px;
            top: 50%;
            transform: translateY(-50%);
            width: 280px;
            height: 280px;
        }

        /* Partikel debu savana */
        .particles {
            position: fixed;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(212, 168, 83, 0.6);
            animation: drift var(--dur, 8s) linear infinite;
            animation-delay: var(--delay, 0s);
            left: var(--x, 50%);
            bottom: -10px;
        }

        @keyframes drift {
            0% { transform: translateY(0) translateX(0) scale(1); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 0.5; }
            100% { transform: translateY(-100vh) translateX(var(--drift, 30px)) scale(0.3); opacity: 0; }
        }

        @media (max-width: 480px) {
            .error-container { padding: 1.5rem 1rem; }
            .moon { width: 55px; height: 55px; top: 5%; right: 8%; }
            .action-buttons { flex-direction: column; align-items: center; }
            .btn-primary-custom, .btn-secondary-custom { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- Background -->
    <div class="bg-landscape"></div>

    <!-- Bulan -->
    <div class="moon"></div>

    <!-- Bintang -->
    <div class="stars" id="stars"></div>

    <!-- Partikel -->
    <div class="particles" id="particles"></div>

    <!-- Bukit Savana SVG -->
    <div class="hills">
        <svg class="hill-svg" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,320 L0,220 Q120,120 240,180 Q360,240 480,160 Q600,80 720,140 Q840,200 960,130 Q1080,60 1200,120 Q1320,180 1440,100 L1440,320 Z" fill="#2a1800" opacity="0.9"/>
            <path d="M0,320 L0,260 Q180,180 360,230 Q540,280 720,200 Q900,120 1080,190 Q1260,260 1440,180 L1440,320 Z" fill="#1a0f00" opacity="1"/>
            <!-- Pohon lontar kiri -->
            <line x1="180" y1="260" x2="180" y2="200" stroke="#3d2200" stroke-width="4"/>
            <ellipse cx="180" cy="195" rx="18" ry="30" fill="#2d4a10" opacity="0.8"/>
            <line x1="162" y1="205" x2="140" y2="185" stroke="#2d4a10" stroke-width="3"/>
            <line x1="198" y1="205" x2="220" y2="185" stroke="#2d4a10" stroke-width="3"/>
            <!-- Pohon lontar kanan -->
            <line x1="1260" y1="240" x2="1260" y2="175" stroke="#3d2200" stroke-width="4"/>
            <ellipse cx="1260" cy="170" rx="18" ry="30" fill="#2d4a10" opacity="0.8"/>
            <line x1="1242" y1="180" x2="1220" y2="160" stroke="#2d4a10" stroke-width="3"/>
            <line x1="1278" y1="180" x2="1300" y2="160" stroke="#2d4a10" stroke-width="3"/>
        </svg>
    </div>

    <!-- Ornamen Sumba -->
    <svg class="sumba-ornament ornament-left" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <rect x="10" y="10" width="180" height="180" fill="none" stroke="#D4A853" stroke-width="3"/>
        <rect x="30" y="30" width="140" height="140" fill="none" stroke="#D4A853" stroke-width="2"/>
        <path d="M10,100 L100,10 L190,100 L100,190 Z" fill="none" stroke="#D4A853" stroke-width="2"/>
        <circle cx="100" cy="100" r="30" fill="none" stroke="#D4A853" stroke-width="2"/>
        <path d="M70,100 L100,70 L130,100 L100,130 Z" fill="#D4A853" opacity="0.5"/>
    </svg>
    <svg class="sumba-ornament ornament-right" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <rect x="10" y="10" width="180" height="180" fill="none" stroke="#D4A853" stroke-width="3"/>
        <rect x="30" y="30" width="140" height="140" fill="none" stroke="#D4A853" stroke-width="2"/>
        <path d="M10,100 L100,10 L190,100 L100,190 Z" fill="none" stroke="#D4A853" stroke-width="2"/>
        <circle cx="100" cy="100" r="30" fill="none" stroke="#D4A853" stroke-width="2"/>
        <path d="M70,100 L100,70 L130,100 L100,130 Z" fill="#D4A853" opacity="0.5"/>
    </svg>

    <!-- Konten Error -->
    <div class="error-container">
        <div class="error-badge">Akses Ditolak</div>

        <div class="error-code">403</div>

        <div class="divider">
            <div class="divider-line"></div>
            <div class="divider-icon">✦</div>
            <div class="divider-line"></div>
        </div>

        <h1 class="error-title">Halaman Ini Tidak Dapat Diakses</h1>

        <p class="error-description">
            Seperti keindahan <strong>Pantai Nihiwatu</strong> dan <strong>Bukit Wairinding</strong> di Sumba Barat<br>
            yang hanya bisa dinikmati oleh mereka yang memiliki izin,<br>
            halaman ini pun hanya terbuka bagi yang berwenang.
        </p>

        <div class="sumba-quote">
            <p>"Anda tidak memiliki hak akses untuk melihat halaman ini. Hubungi administrator jika Anda merasa ini adalah kesalahan."</p>
            <span>— SPK Wisata Sumba Barat</span>
        </div>

        <div class="action-buttons">
            <a href="{{ url()->previous() }}" class="btn-primary-custom">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('dashboard') }}" class="btn-secondary-custom">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Ke Dashboard
            </a>
        </div>
    </div>

    <script>
        // Generate bintang
        const starsContainer = document.getElementById('stars');
        for (let i = 0; i < 80; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            const size = Math.random() * 2.5 + 0.5;
            star.style.cssText = `
                width: ${size}px;
                height: ${size}px;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                --dur: ${Math.random() * 3 + 2}s;
                --delay: ${Math.random() * 4}s;
            `;
            starsContainer.appendChild(star);
        }

        // Generate partikel debu
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 18; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.cssText = `
                --x: ${Math.random() * 100}%;
                --dur: ${Math.random() * 10 + 6}s;
                --delay: ${Math.random() * 8}s;
                --drift: ${(Math.random() - 0.5) * 80}px;
            `;
            particlesContainer.appendChild(particle);
        }
    </script>
</body>
</html>
