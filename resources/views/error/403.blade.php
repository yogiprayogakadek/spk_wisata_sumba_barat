<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | SPK Wisata Sumba Barat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8B4513;
            --primary-light: #CD853F;
            --accent: #D4A853;
            --accent-light: #F0C878;
            --dark: #0f172a;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #020617;
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Responsive Background Landscape */
        .bg-gradient {
            position: fixed;
            inset: 0;
            z-index: -1;
            background: 
                radial-gradient(circle at 20% 20%, rgba(139, 69, 19, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(212, 168, 83, 0.1) 0%, transparent 40%),
                linear-gradient(135deg, #020617 0%, #0f172a 100%);
        }

        .stars-container {
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events: none;
        }

        .star {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            opacity: 0.3;
            animation: twinkle var(--duration) ease-in-out infinite;
        }

        @keyframes twinkle {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .main-container {
            width: 100%;
            max-width: 1200px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .glass-card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: clamp(2rem, 5vw, 4rem);
            text-align: center;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeInScale 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .error-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            background: rgba(212, 168, 83, 0.1);
            border: 1px solid rgba(212, 168, 83, 0.2);
            border-radius: 100px;
            color: var(--accent-light);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }

        .error-badge::before {
            content: '';
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent);
        }

        .error-code {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(6rem, 20vw, 10rem);
            font-weight: 800;
            line-height: 1;
            margin-bottom: 1rem;
            background: linear-gradient(to bottom, #fff 30%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        }

        .error-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #fff;
            line-height: 1.2;
        }

        .error-msg {
            font-size: clamp(0.9rem, 3vw, 1.1rem);
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 2.5rem;
            max-width: 500px;
            margin-inline: auto;
        }

        .error-msg strong {
            color: var(--accent-light);
            font-weight: 500;
        }

        .sumba-quote {
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid var(--accent);
            padding: 1.5rem;
            border-radius: 4px 16px 16px 4px;
            text-align: left;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .sumba-quote::after {
            content: '“';
            position: absolute;
            top: -10px;
            right: 10px;
            font-size: 5rem;
            color: rgba(212, 168, 83, 0.1);
            font-family: serif;
        }

        .sumba-quote p {
            font-size: 0.95rem;
            font-style: italic;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .sumba-quote span {
            font-size: 0.8rem;
            color: var(--accent);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--accent);
            color: #000;
            box-shadow: 0 4px 15px rgba(212, 168, 83, 0.3);
        }

        .btn-primary:hover {
            background: var(--accent-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 168, 83, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border: 1px solid var(--glass-border);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        /* Ornaments */
        .ornament {
            position: fixed;
            width: clamp(200px, 40vw, 400px);
            opacity: 0.03;
            pointer-events: none;
            z-index: 0;
        }

        .ornament-tl { top: -100px; left: -100px; }
        .ornament-br { bottom: -100px; right: -100px; transform: rotate(180deg); }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .actions {
                flex-direction: column;
            }
            .btn {
                width: 100%;
            }
            .glass-card {
                padding: 2rem 1.5rem;
                border-radius: 0;
                background: transparent;
                border: none;
                backdrop-filter: none;
                box-shadow: none;
            }
            body {
                background-color: #020617;
            }
        }
    </style>
</head>

<body>
    <div class="bg-gradient"></div>
    <div class="stars-container" id="stars"></div>

    <!-- Sumba Pattern Ornaments -->
    <svg class="ornament ornament-tl" viewBox="0 0 200 200" fill="currentColor">
        <path d="M0 0h200v200H0z" fill="none"/>
        <path d="M100 0L0 100l100 100 100-100L100 0zm0 40l60 60-60 60-60-60 60-60zM40 100l60-60 60 60-60 60-60-60z" fill="var(--accent)"/>
    </svg>
    <svg class="ornament ornament-br" viewBox="0 0 200 200" fill="currentColor">
        <path d="M0 0h200v200H0z" fill="none"/>
        <path d="M100 0L0 100l100 100 100-100L100 0zm0 40l60 60-60 60-60-60 60-60zM40 100l60-60 60 60-60 60-60-60z" fill="var(--accent)"/>
    </svg>

    <main class="main-container">
        <div class="glass-card">
            <div class="error-badge">Akses Ditolak</div>
            
            <h1 class="error-code">403</h1>
            
            <h2 class="error-title">Halaman Terproteksi</h2>
            
            <p class="error-msg">
                Sepertinya Anda tidak memiliki izin untuk mengakses area ini. Silakan kembali atau hubungi <strong>Administrator</strong> jika Anda memerlukan bantuan.
            </p>

            <div class="sumba-quote">
                <p>"Keindahan Sumba Barat terbuka bagi semua, namun ketertiban adalah kunci pelestariannya."</p>
                <span>— SPK WISATA SUMBA BARAT</span>
            </div>

            <div class="actions">
                <a href="{{ url()->previous() }}" class="btn btn-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-outline">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Beranda
                </a>
            </div>
        </div>
    </main>

    <script>
        const starsContainer = document.getElementById('stars');
        const count = 100;

        for (let i = 0; i < count; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            const size = Math.random() * 2 + 1;
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.left = `${Math.random() * 100}%`;
            star.style.top = `${Math.random() * 100}%`;
            star.style.setProperty('--duration', `${Math.random() * 3 + 2}s`);
            star.style.animationDelay = `${Math.random() * 5}s`;
            starsContainer.appendChild(star);
        }
    </script>
</body>

</html>
