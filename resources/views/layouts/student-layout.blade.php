<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')  {{-- kalau kamu pakai head terpisah --}}
</head>
<body>

    {{-- SIDEBAR SISWA --}}
    @include('partials.sidebar-student')

    <div class="main-content">
        {{-- TOPBAR --}}
        @include('partials.topbar-student')

        {{-- CONTENT --}}
        @yield('content')
    </div>

</body>
</html>
