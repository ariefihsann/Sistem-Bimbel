<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeC Master - Bimbingan Belajar Pemrograman C</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2D3748;
            --secondary: #4A5568;
            --accent: #3182CE;
            --accent-light: #4299E1;
            --light: #F7FAFC;
            --dark: #1A202C;
            --success: #38A169;
            --white: #FFFFFF;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --gradient: linear-gradient(135deg, #3182CE 0%, #2C5AA0 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--light);
            color: var(--primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header dan Navigasi */
        header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        header.scrolled {
            padding: 5px 0;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            transition: var(--transition);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
            display: flex;
            align-items: center;
        }

        .logo span {
            color: var(--primary);
        }

        .logo i {
            margin-right: 10px;
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--accent);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .cta-button {
            background: var(--gradient);
            color: var(--white);
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.3);
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(49, 130, 206, 0.4);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            animation: fadeInUp 1s ease;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: var(--dark);
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: var(--secondary);
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .secondary-button {
            background-color: transparent;
            color: var(--accent);
            border: 2px solid var(--accent);
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .secondary-button:hover {
            background-color: var(--accent);
            color: var(--white);
            transform: translateY(-3px);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
        }

        .floating-element {
            position: absolute;
            background: rgba(49, 130, 206, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background-color: var(--white);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--gradient);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-title p {
            color: var(--secondary);
            max-width: 600px;
            margin: 30px auto 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--white);
            font-size: 30px;
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon {
            transform: rotateY(180deg);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .feature-card p {
            color: var(--secondary);
        }

        /* Pricing Section */
        .pricing {
            padding: 100px 0;
            background-color: var(--light);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .pricing-card {
            background-color: var(--white);
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .pricing-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .pricing-card:hover::before {
            opacity: 0.05;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .pricing-card.popular {
            border: 2px solid var(--accent);
            transform: scale(1.05);
        }

        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }

        .popular-tag {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--accent);
            color: var(--white);
            padding: 5px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .pricing-card h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .price {
            font-size: 3rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 30px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        .price span {
            font-size: 1rem;
            color: var(--secondary);
            align-self: flex-end;
            margin-bottom: 10px;
        }

        .pricing-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .pricing-features li {
            padding: 10px 0;
            border-bottom: 1px solid #E2E8F0;
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pricing-features li i {
            color: var(--success);
            margin-right: 10px;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        /* Testimonials */
        .testimonials {
            padding: 100px 0;
            background-color: var(--white);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background-color: var(--light);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 4rem;
            color: rgba(49, 130, 206, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: var(--secondary);
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--gradient);
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: bold;
            font-size: 1.2rem;
            overflow: hidden;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            color: var(--dark);
            margin-bottom: 5px;
        }

        .author-info p {
            color: var(--secondary);
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: var(--gradient);
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            max-width: 600px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: var(--white);
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--white);
            position: relative;
            display: inline-block;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background: var(--accent);
            bottom: -8px;
            left: 0;
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #CBD5E0;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .footer-links a i {
            margin-right: 8px;
            width: 16px;
            text-align: center;
        }

        .footer-links a:hover {
            color: var(--white);
            transform: translateX(5px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #4A5568;
            color: #CBD5E0;
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-buttons a {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <!-- Header & Navigation -->
    <header id="header">
        <div class="container">
            <nav>
                <div class="logo">
                    <i class="fas fa-code"></i>
                    Code<span>C</span> Master
                </div>
                <div class="nav-links">
                    <a href="#home">Beranda</a>
                    <a href="#features">Fitur</a>
                    <a href="#pricing">Harga</a>
                    <a href="#testimonials">Testimoni</a>
                    <a href="#contact">Kontak</a>
                </div>
                <a href="{{ route('login') }}" class="cta-button">Daftar Sekarang</a>
                <div class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1>Pelajari Teorinya, Taklukkan Soalnya.</h1>
                <p>CodeC Master adalah platform belajar mandiri terlengkap untuk Pemrograman C. Kuasai C dari dasar hingga tingkat lanjut melalui materi terstruktur dan bank soal dinamis yang menguji pemahaman Anda secara langsung.</p>
                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="cta-button">Mulai Belajar</a>
                    <a href="#features" class="secondary-button">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Mengapa Memilih CodeC Master?</h2>
                <p>Kami menyediakan berbagai fitur unggulan untuk memastikan kesuksesan Anda dalam belajar pemrograman C</p>
            </div>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Kurikulum Terstruktur</h3>
                    <p>Materi disusun secara sistematis dari dasar hingga konsep pemrograman C yang kompleks.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3>Materi dari Praktisi</h3>
                    <p>Seluruh materi dan soal disusun oleh para profesional yang aktif berkecimpung di industri pemrograman.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Praktik Langsung</h3>
                    <p>Belajar dengan project nyata dan latihan coding yang menantang untuk mengasah kemampuan.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Sesi Bantuan Personal</h3>
                    <p>Sesi tanya jawab privat dengan asisten ahli untuk membedah dan memecahkan masalah kode Anda.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-file-code"></i>
                    </div>
                    <h3>Materi Terupdate</h3>
                    <p>Konten pembelajaran selalu diperbarui mengikuti perkembangan teknologi terbaru.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Sertifikat Penyelesaian</h3>
                    <p>Dapatkan sertifikat setelah menyelesaikan program untuk meningkatkan portofolio Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-title">
                <h2>Pilih Level Belajar Anda</h2>
                <p>Mulai perjalanan coding Anda dengan kurikulum terstruktur dari dasar hingga mahir</p>
            </div>

            <!-- Code Typing Animation -->
            <div class="code-typing-container">
                <div class="code-terminal">
                    <div class="terminal-header">
                        <div class="terminal-dots">
                            <span class="dot red"></span>
                            <span class="dot yellow"></span>
                            <span class="dot green"></span>
                        </div>
                        <span class="terminal-title">code_master.c</span>
                    </div>
                    <div class="terminal-body">
                        <div class="code-line">
                            <span class="prompt">$</span>
                            <span id="typed-text" class="typed-text"></span>
                            <span class="cursor">|</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Level Cards -->
            <div class="level-cards">
                <div class="level-card">
                    <div class="level-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Pemula</h3>
                    <div class="level-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Dasar Pemrograman C</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Struktur Data Sederhana</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Latihan Coding Interaktif</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Forum Diskusi</span>
                        </div>
                    </div>
                    <button class="level-select-btn">
                        Mulai Belajar
                    </button>
                </div>

                <div class="level-card popular">
                    <div class="popular-badge">Paling Populer</div>
                    <div class="level-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Menengah</h3>
                    <div class="level-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Semua Fitur Level Pemula</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Struktur Data Kompleks</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Project Real-world</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Code Review</span>
                        </div>
                    </div>
                    <button class="level-select-btn">
                        Mulai Belajar
                    </button>
                </div>

                <div class="level-card">
                    <div class="level-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3>Lanjutan</h3>
                    <div class="level-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Semua Fitur Level Menengah</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Algoritma Kompleks</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Konsultasi 1-on-1</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Sertifikat Penyelesaian</span>
                        </div>
                    </div>
                    <button class="level-select-btn">
                        Mulai Belajar
                    </button>
                </div>
            </div>
        </div>

        <style>
            .pricing {
                padding: 100px 0;
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            }

            .code-typing-container {
                max-width: 600px;
                margin: 0 auto 60px;
            }

            .code-terminal {
                background: #1a1b26;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            .terminal-header {
                background: #2a2b3a;
                padding: 15px 20px;
                display: flex;
                align-items: center;
                border-bottom: 1px solid #3a3b4a;
            }

            .terminal-dots {
                display: flex;
                gap: 8px;
                margin-right: 15px;
            }

            .dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
            }

            .dot.red {
                background: #ff5f57;
            }

            .dot.yellow {
                background: #ffbd2e;
            }

            .dot.green {
                background: #28c940;
            }

            .terminal-title {
                color: #a9b1d6;
                font-family: 'Courier New', monospace;
                font-size: 0.9rem;
            }

            .terminal-body {
                padding: 30px;
                font-family: 'Courier New', monospace;
                min-height: 120px;
                display: flex;
                align-items: center;
            }

            .code-line {
                display: flex;
                align-items: center;
                font-size: 1.1rem;
            }

            .prompt {
                color: #bb9af7;
                margin-right: 10px;
                font-weight: bold;
            }

            .typed-text {
                color: #9aa5ce;
            }

            .cursor {
                color: #7dcfff;
                font-weight: bold;
                animation: blink 1s infinite;
                margin-left: 2px;
            }

            .level-cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 30px;
                margin-top: 30px;
            }

            .level-card {
                background: white;
                border-radius: 15px;
                padding: 30px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                position: relative;
                border: 2px solid transparent;
            }

            .level-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            }

            .level-card.popular {
                border-color: #3182CE;
                transform: scale(1.05);
            }

            .level-card.popular:hover {
                transform: scale(1.05) translateY(-10px);
            }

            .popular-badge {
                position: absolute;
                top: -12px;
                left: 50%;
                transform: translateX(-50%);
                background: #3182CE;
                color: white;
                padding: 5px 20px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 600;
            }

            .level-icon {
                width: 70px;
                height: 70px;
                background: linear-gradient(135deg, #3182CE 0%, #2C5AA0 100%);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 20px;
                font-size: 1.5rem;
                color: white;
            }

            .level-card h3 {
                font-size: 1.4rem;
                margin-bottom: 20px;
                color: #2D3748;
            }

            .level-features {
                margin-bottom: 25px;
            }

            .feature-item {
                display: flex;
                align-items: center;
                margin-bottom: 12px;
                color: #4A5568;
                text-align: left;
            }

            .feature-item i {
                color: #38A169;
                margin-right: 10px;
                min-width: 16px;
            }

            .level-select-btn {
                background: linear-gradient(135deg, #3182CE 0%, #2C5AA0 100%);
                color: white;
                border: none;
                padding: 12px 30px;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                width: 100%;
                font-size: 0.95rem;
            }

            .level-select-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(49, 130, 206, 0.4);
            }

            @keyframes blink {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0;
                }
            }

            @media (max-width: 768px) {
                .level-cards {
                    grid-template-columns: 1fr;
                }

                .level-card.popular {
                    transform: scale(1);
                }

                .level-card.popular:hover {
                    transform: translateY(-10px);
                }

                .code-terminal {
                    margin: 0 -20px;
                    border-radius: 0;
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const codeSnippets = [
                    'printf("Selamat datang di CodeC Master!\\n");',
                    'printf("Pilih level belajar Anda...\\n");',
                    'printf("Mulai journey coding Anda!\\n");',
                    'printf("Master C programming dengan ahli!\\n");',
                    'printf("Dari dasar hingga mahir...\\n");',
                    'printf("Bergabung dengan komunitas developer!\\n");'
                ];

                const typedTextElement = document.getElementById('typed-text');
                let currentSnippet = 0;
                let currentChar = 0;
                let isDeleting = false;
                let isPaused = false;

                function type() {
                    const currentText = codeSnippets[currentSnippet];

                    if (isDeleting) {
                        // Backspace effect - menghapus karakter satu per satu
                        typedTextElement.textContent = currentText.substring(0, currentChar - 1);
                        currentChar--;

                        // Jika sudah menghapus semua, lanjut ke snippet berikutnya
                        if (currentChar === 0) {
                            isDeleting = false;
                            currentSnippet = (currentSnippet + 1) % codeSnippets.length;
                            isPaused = true;

                            // Tunggu sebentar sebelum mulai mengetik lagi
                            setTimeout(() => {
                                isPaused = false;
                            }, 800);
                        }
                    } else {
                        // Typing effect - mengetik karakter satu per satu
                        typedTextElement.textContent = currentText.substring(0, currentChar + 1);
                        currentChar++;

                        // Jika sudah selesai mengetik, tunggu lalu mulai hapus
                        if (currentChar === currentText.length) {
                            isPaused = true;

                            // Tunggu sebentar sebelum mulai menghapus
                            setTimeout(() => {
                                isPaused = false;
                                isDeleting = true;
                            }, 1500);
                        }
                    }

                    // Atur kecepatan typing/backspace
                    const typingSpeed = isDeleting ? 40 : 80; // Backspace lebih cepat
                    setTimeout(type, typingSpeed);
                }

                // Start typing animation setelah delay awal
                setTimeout(type, 1000);

                // Interaksi ketika klik tombol level
                const levelButtons = document.querySelectorAll('.level-select-btn');
                levelButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const level = this.closest('.level-card').querySelector('h3').textContent;
                        const messages = {
                            'Pemula': 'printf("Memulai level Pemula...\\n");',
                            'Menengah': 'printf("Loading level Menengah...\\n");',
                            'Lanjutan': 'printf("Initializing level Lanjutan...\\n");'
                        };

                        // Simpan state saat ini
                        const originalSnippet = codeSnippets[currentSnippet];
                        const originalChar = currentChar;
                        const originalDeleting = isDeleting;
                        const originalPaused = isPaused;

                        // Ganti dengan pesan khusus level
                        codeSnippets[currentSnippet] = messages[level];
                        currentChar = 0;
                        isDeleting = false;
                        isPaused = false;

                        // Reset ke state semula setelah 3 detik
                        setTimeout(() => {
                            codeSnippets[currentSnippet] = originalSnippet;
                            currentChar = originalChar;
                            isDeleting = originalDeleting;
                            isPaused = originalPaused;
                        }, 3000);
                    });
                });
            });
        </script>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Mereka?</h2>
                <p>Testimoni dari siswa yang telah berhasil menguasai pemrograman C bersama kami</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card fade-in">
                    <p class="testimonial-text">"CodeC Master membantu saya memahami konsep pointer dan memory management dalam C yang sebelumnya sangat membingungkan. Sekarang saya lebih percaya diri dalam coding!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Ahmad Rizki">
                        </div>
                        <div class="author-info">
                            <h4>Ahmad Rizki</h4>
                            <p>Mahasiswa Teknik Informatika</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card fade-in">
                    <p class="testimonial-text">"Metode pengajaran yang sistematis dan mentor yang responsif membuat proses belajar C menjadi menyenangkan. Saya berhasil menyelesaikan project akhir dengan nilai memuaskan."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Sari Melati">
                        </div>
                        <div class="author-info">
                            <h4>Sari Melati</h4>
                            <p>Fresh Graduate</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card fade-in">
                    <p class="testimonial-text">"Sebagai programmer yang ingin switch career, saya memilih CodeC Master untuk memperdalam pemahaman tentang C. Hasilnya, saya berhasil diterima di perusahaan teknologi ternama."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Dian Pratama">
                        </div>
                        <div class="author-info">
                            <h4>Dian Pratama</h4>
                            <p>Software Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="contact">
        <div class="container">
            <div class="cta-content">
                <h2>Siap Menguasai Pemrograman C?</h2>
                <p>Jangan ragu untuk memulai perjalanan coding Anda. Daftar sekarang dan dapatkan akses ke materi pembelajaran berkualitas tinggi.</p>
                <a href="#pricing" class="cta-button">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>CodeC Master</h3>
                    <p>Platform bimbingan belajar pemrograman C terpercaya dengan metode pembelajaran yang efektif dan mentor berpengalaman.</p>
                </div>
                <div class="footer-column">
                    <h3>Tautan Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#home"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="#features"><i class="fas fa-chevron-right"></i> Fitur</a></li>
                        <li><a href="#pricing"><i class="fas fa-chevron-right"></i> Harga</a></li>
                        <li><a href="#testimonials"><i class="fas fa-chevron-right"></i> Testimoni</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak Kami</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-envelope"></i> info@codecmaster.com</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i> +62 21 1234 5678</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Ikuti Kami</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i> YouTube</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 CodeC Master. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            // Header scroll effect
            window.addEventListener('scroll', function() {
                const header = document.getElementById('header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Fade in elements on scroll
            const fadeElements = document.querySelectorAll('.fade-in');

            const fadeInOnScroll = function() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;

                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                    }
                });
            };

            // Check on load
            fadeInOnScroll();

            // Check on scroll
            window.addEventListener('scroll', fadeInOnScroll);

            // Mobile menu toggle
            const mobileMenu = document.querySelector('.mobile-menu');
            const navLinks = document.querySelector('.nav-links');

            mobileMenu.addEventListener('click', function() {
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });

                        // Close mobile menu if open
                        if (window.innerWidth <= 768) {
                            navLinks.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>