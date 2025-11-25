<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Bimbel Master</title>

     <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
    @include('partials.sidebar-admin')
    </div>

    <!-- Main Content -->
    <div class="main-content">

        {{-- TOP NAVBAR --}}
        @include('partials.topbar-admin')

        {{-- INI TEMPAT KONTEN MASUK --}}
        <div class="content-wrapper p-4">
            @yield('content')
        </div>

    </div>

</body>

</html>