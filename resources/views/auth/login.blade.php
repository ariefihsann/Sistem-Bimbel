<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CodeC Master</title>
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

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: var(--white);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            min-height: 600px;
        }

        .login-left {
            flex: 1;
            background: var(--gradient);
            color: var(--white);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
        }

        .login-left-content {
            position: relative;
            z-index: 1;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo i {
            margin-right: 12px;
            font-size: 2.2rem;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .features-list {
            list-style: none;
            margin-top: 30px;
        }

        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .features-list li i {
            margin-right: 12px;
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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
            background: rgba(255, 255, 255, 0.1);
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

        .login-right {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h2 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .login-header p {
            color: var(--secondary);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #E2E8F0;
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--light);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
        }

        .form-input.error {
            border-color: #E53E3E;
        }

        .error-message {
            color: #E53E3E;
            font-size: 0.875rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
        }

        .error-message i {
            margin-right: 5px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 8px;
            width: 18px;
            height: 18px;
            accent-color: var(--accent);
        }

        .remember-me label {
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .forgot-password {
            color: var(--accent);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            background: var(--gradient);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.3);
            margin-bottom: 20px;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(49, 130, 206, 0.4);
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #E2E8F0;
        }

        .divider span {
            padding: 0 15px;
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-button {
            flex: 1;
            padding: 12px;
            border: 2px solid #E2E8F0;
            border-radius: 10px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .social-button:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        .social-button i {
            font-size: 1.2rem;
            margin-right: 8px;
        }

        .social-button.google i {
            color: #DB4437;
        }

        .social-button.github i {
            color: #333;
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

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }

            .login-left {
                padding: 30px;
            }

            .login-right {
                padding: 30px;
            }

            .welcome-text h1 {
                font-size: 2rem;
            }

            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Left Side - Branding & Info -->
        <div class="login-left">
            <div class="floating-elements">
                <div class="floating-element"></div>
                <div class="floating-element"></div>
                <div class="floating-element"></div>
            </div>
            <div class="login-left-content">
                <div class="logo">
                    <i class="fas fa-code"></i>
                    CodeC Master
                </div>
                <div class="welcome-text">
                    <h1>Selamat Datang Kembali!</h1>
                    <p>Masuk ke akun Anda untuk melanjutkan perjalanan belajar pemrograman C.</p>
                </div>
                <ul class="features-list">
                    <li>
                        <i class="fas fa-check"></i>
                        Akses ke semua materi pembelajaran
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        Konsultasi dengan mentor ahli
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        Progress tracking yang detail
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        Komunitas developer pemula
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="login-header">
                <h2>Masuk ke Akun</h2>
                <p>Silakan masuk dengan informasi akun Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Masukkan alamat email Anda">
                    <!-- Error messages would appear here -->
                    <!-- <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        Email yang dimasukkan tidak valid
                    </div> -->
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Masukkan password Anda">
                    <!-- Error messages would appear here -->
                    <!-- <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        Password yang dimasukkan salah
                    </div> -->
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me">Ingat saya</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        Lupa password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-button">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

                <!-- Register Link -->
                <div class="register-link">
                    @if (Route::has('register'))
                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    @endif
                </div>

                <!-- Divider -->
                <div class="divider">
                    <span>Atau masuk dengan</span>
                </div>

                <!-- Social Login -->
                <div class="social-login">
                    <button type="button" class="social-button google">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="social-button github">
                        <i class="fab fa-github"></i> GitHub
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Simple form validation animation
        document.addEventListener('DOMContentLoaded', function() {
            const formInputs = document.querySelectorAll('.form-input');

            formInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.classList.add('error');
                    } else {
                        this.classList.remove('error');
                    }
                });
            });

            // Add loading state to login button
            const loginButton = document.querySelector('.login-button');
            const loginForm = document.querySelector('form');

            loginForm.addEventListener('submit', function() {
                loginButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                loginButton.disabled = true;
            });
        });
    </script>
</body>

</html>