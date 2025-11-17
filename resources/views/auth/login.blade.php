<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CodeC | Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" media="print" onload="this.media='all'" />
    <!--end::Fonts-->
    
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!-- 
      PATH SUDAH DIPERBAIKI: 
      Ini mengasumsikan Arif meletakkan file AdminLTE di folder public/adminlte/ 
      Jika path-nya beda, sesuaikan di sini.
    -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}" />
    
</head>
<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="/" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>CodeC Learning</b></h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login untuk memulai sesi Anda</p>

                <!-- 
                  FORM SUDAH DIPERBAIKI:
                  1. 'action' mengarah ke route 'login' (dari Breeze)
                  2. 'method' adalah 'POST'
                  3. @csrf ditambahkan (Wajib untuk keamanan Laravel)
                -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- INPUT EMAIL SUDAH DIPERBAIKI -->
                    <div class="input-group mb-1">
                        <div class="form-floating @error('email') is-invalid @enderror">
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                placeholder="Email" />
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <!-- MENAMPILKAN ERROR EMAIL JIKA ADA -->
                    @error('email')
                        <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror


                    <!-- INPUT PASSWORD SUDAH DIPERBAIKI -->
                    <div class="input-group mb-1">
                        <div class="form-floating @error('password') is-invalid @enderror">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control" 
                                name="password" 
                                required 
                                placeholder="Password" />
                            <label for="password">Password</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <!-- MENAMPILKAN ERROR PASSWORD JIKA ADA -->
                    @error('password')
                         <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror

                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8 d-inline-flex align-items-center">
                            <div class="form-check">
                                <!-- INPUT REMEMBER ME SUDAH DIPERBAIKI -->
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                                <label class="form-check-label" for="remember"> Ingat Saya </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

                <!-- Hapus Social Auth (Kita tidak pakai ini) -->
                <!-- 
                <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    ...
                </div>
                -->

                <!-- LINK SUDAH DIPERBAIKI (Mengarah ke Route Breeze) -->
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center"> Daftar akun baru </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- PATH SCRIPT SUDAH DIPERBAIKI -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <!-- (Hapus script OverlayScrollbars Configure jika tidak perlu) -->
    
</body>
</html>