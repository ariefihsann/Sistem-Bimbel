<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CodeC Learning | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}" />
</head>
<body class="register-page bg-body-secondary">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="/" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>CodeC</b> Learning</h1>
                </a>
            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Daftar akun baru</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="input-group mb-1">
                        <div class="form-floating @error('name') is-invalid @enderror">
                            <input 
                                id="name" 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autofocus 
                                placeholder="Nama Lengkap" 
                            />
                            <label for="name">Nama Lengkap</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>
                    @error('name')
                        <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-1">
                        <div class="form-floating @error('email') is-invalid @enderror">
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                placeholder="Email" 
                            />
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    @error('email')
                        <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-1">
                        <div class="form-floating @error('password') is-invalid @enderror">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control" 
                                name="password" 
                                required 
                                placeholder="Password" 
                            />
                            <label for="password">Password</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    @error('password')
                        <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input 
                                id="password_confirmation" 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                required 
                                placeholder="Ulangi Password" 
                            />
                            <label for="password_confirmation">Ulangi Password</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                            </div>
                        </div>
                    </div>
                </form>

                <p class="mb-0 mt-3 text-center">
                    <a href="{{ route('login') }}" class="text-center">Saya sudah punya akun</a>
                </p>
            </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
</body>
</html>